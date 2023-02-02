<?php

    if(!empty($_POST))
    {
        include_once "connection.php";
        include_once "commands.php";
        $oCon = connect();

        $id = $_POST["id"];
        $estado = $_POST["estado"];

        define("sql", "UPDATE citas SET Estado_cita = $estado WHERE Id = $id");
        $res = command($oCon, sql);

        echo $res;
    }
    else
    {
        header("location: ../../login.html");
    }

?>