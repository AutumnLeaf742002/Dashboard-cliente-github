<?php

    if(!empty($_POST))
    {
        include_once "connection.php";
        include_once "commands.php";

        $oCon = connect();
        $id = $_POST["id"]??0;
        define("sql", "DELETE FROM analyst WHERE Id = ".$id."; CALL sp_reset_auto();");
        $res = command($oCon, sql);

        echo $res;
    }
    else
    {
        header("location: ../../login.html");
    }

?>