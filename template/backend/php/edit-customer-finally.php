<?php

    if(!empty($_POST))
    {
        include_once "connection.php";
        include_once "commands.php";

        $oCon = connect();
        $sql = $_POST["sql"];
        $res = command($oCon, $sql);

        echo $res;
    }

?>