<?php

    session_start();
    if(!empty($_POST) && $_SESSION["rol"] == "1")
    {
        include_once "connection.php";
        include_once "commands.php";

        $oCon = connect();

        $id_m = $_POST["id_m"]??0;
        $id_m = trim($id_m);

        $name = $_POST["name"]??"";
        $mail = $_POST["mail"]??"";
        $cell = $_POST["cell"]??"";
        $carnet = $_POST["carnet"]??"";
        $office = $_POST["office"]??"";
        $user = $_POST["user"]??"";

        $name = trim($name);
        $name = ucfirst($name);
        $mail = trim($mail);
        $mail = strtolower($mail);
        $cell = trim($cell);
        $carnet = trim($carnet);
        $office = trim($office);
        $user = trim($user);

        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) 
        {
            if($carnet == "")
            {
                define("sql", "CALL sp_edit_manager(".$id_m.", '".$name."', '".$mail."', '".$cell."', NULL, ".$office.", '".$user."');");

            }
            else
            {
                define("sql", "CALL sp_edit_manager(".$id_m.", '".$name."', '".$mail."', '".$cell."', '".$carnet."', ".$office.", '".$user."');");
            }

            $res = command($oCon, sql);

            echo $res;
        }
        else
        {
            echo "mf";
        }
    }
    else
    {
        header("location: ../../managers.html");
    }

?>