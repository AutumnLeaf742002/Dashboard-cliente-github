<?php

if(!empty($_POST))
{
    session_start();
    $rol = $_SESSION["rol"];
    echo $rol;
}

?>