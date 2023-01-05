<?php

    if(!empty($_POST))
    {
        include_once "connection.php";
        include_once "commands.php";

        session_start();
        $rol = $_SESSION["rol"];
        $id_s = $_SESSION["id"];

        $oCon = connect();
        $id = $_POST["id"]??0;

        if($id != 1)
        {
            if($rol == "1" && $id_s == $id)
            {
                echo "actual";
            }
            else
            {
                define("sql", "DELETE FROM administrators WHERE Id = ".$id."; CALL sp_reset_auto();");
                $res = command($oCon, sql);
                echo $res;
            }
        }
        else
        {
            echo "admin";
        }
    }
    else
    {
        header("location: ../../login.html");
    }

?>