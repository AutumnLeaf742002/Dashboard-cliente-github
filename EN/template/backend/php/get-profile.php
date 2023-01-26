<?php

    if(!empty($_POST))
    {
        include_once "connection.php";
        include_once "commands.php";

        session_start();
        $id = $_SESSION["id"] ?? "0";
        $rol = $_SESSION["rol"] ?? "0";

        $oCon = connect();

        if($rol == 1)
        {
            define("sql", "SELECT * FROM administrators WHERE Id = $id");
        }
        else if($rol == 2)
        {
            define("sql", "SELECT * FROM managers WHERE Id = $id");
        }
        else if($rol == 3)
        {
            define("sql", "SELECT * FROM analyst WHERE Id = $id");
        }
        else
        {
            define("sql", "nada");
        }

        $res = select($oCon, sql);

        if(count($res) == 1)
        {
            $nombre = trim($res[0]["Name"]);
            if($rol == 3)
            {
                echo '
                <div class="rounded-circle" style="overflow: hidden; display: inline-block; position: relative; width: 45px; height: 45px; margin-top: 5px">
                    <img style="width: 45px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);" class="img-fluid" src="backend/php/img-analist/'.$res[0]["Foto"].'" alt="User-Profile-Image">
                </div>
                <div class="" style="overflow: hidden; display: inline-block; position: relative; width: 55px; height: 45px; margin-top: 5px">
                    <span style="display: inline-block; postition: absolute !important; top: 0% !important; margin-bottom: 0px;">'.$nombre.'</span>
                    <i class="p-0 m-0 ti-angle-down"></i>                
                </div>
                ';
            }
            else
            {
                echo '
                    <img class="rounded m-2 img-fluid" src="assets/images/favicon.ico" alt="User-Profile-Image">
                    <span>'.$res[0]["Name"].'</span>
                    <i class="ti-angle-down"></i>
                    ';
            }
            
        }
        else
        {
            echo "Algun error";
        }
    }
    else
    {
        header("location: ../../crm-contact.html");
    }

?>