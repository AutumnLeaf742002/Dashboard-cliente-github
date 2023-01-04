<?php

    if(!empty($_POST))
    {
        include_once "connection.php";
        include_once "commands.php";

        $oCon = connect();

        $id_ad = $_POST["id_ad"]??0;
        $id_ad = trim($id_ad);

        $name = $_POST["name"]??"";
        $mail = $_POST["mail"]??"";
        $cell = $_POST["cell"]??"";
        $carnet = $_POST["carnet"]??"";
        $user = $_POST["user"]??"";

        $name = trim($name);
        $name = ucfirst($name);
        $mail = trim($mail);
        $mail = strtolower($mail);
        $cell = trim($cell);
        $carnet = trim($carnet);
        $user = trim($user);

        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) 
        {
            if($carnet == "")
            {
                define("sql", "CALL sp_edit_administrator(".$id_ad.", '".$name."', '".$mail."', '".$cell."', NULL, '".$user."');");

            }
            else
            {
                define("sql", "CALL sp_edit_administrator(".$id_ad.", '".$name."', '".$mail."', '".$cell."', '".$carnet."', '".$user."');");
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