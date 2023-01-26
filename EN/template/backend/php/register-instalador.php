<?php

    session_start();
    $rol_logued = $_SESSION["rol"];

    if(!empty($_POST) && $rol_logued == "1")
    {
        include_once "connection.php";
        include_once "commands.php";
        $oCon = connect();

        $name = $_POST["name"];
        $name = trim($name);
        $name = ucfirst($name);

        $cell = $_POST["cell"];
        $office = $_POST["office"];

        define("sql", "INSERT INTO instaladores (Nombre, Cell, Id_office) VALUES ('$name', '$cell', $office)");
        $res = command($oCon, sql);

        echo $res;
    }
    else
    {
        header("location: ../../login.html");
    }

?>