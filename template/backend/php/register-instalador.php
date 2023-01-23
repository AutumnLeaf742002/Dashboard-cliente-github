<?php

    if(!empty($_POST))
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