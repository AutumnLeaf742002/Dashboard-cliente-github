<?php

    if(!empty($_POST))
    {
        session_start();
        $rol_logued = $_SESSION["rol"];
        echo $rol_logued;
    }
    else
    {
        header("location: ../../login.html");
    }

?>