<?php

    $r = false;
    session_start();

    if($_SESSION["rol"] == "1" || $_SESSION["rol"] == "2")
    {
        $r = true;
    }

    if(!empty($_POST) && $r == true)
    {
        include_once "connection.php";
        include_once "commands.php";

        $oCon = connect();
        $sql = $_POST["sql"];

        if($sql != "n/d")
        {
            $res = command($oCon, $sql);
            echo $res;
        }
        else
        {
            echo "Something has gone wrong, reload the page and try again";
        }
    }
    else
    {
        header("location: login.html");
    }

?>