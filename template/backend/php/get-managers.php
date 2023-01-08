<?php

    session_start();
    $rol = $_SESSION["rol"]??0;

    include_once "connection.php";
    include_once "commands.php";

    $oCon = connect();
    $sql = "SELECT * FROM managers";
    $res = select($oCon, $sql);

    foreach($res as $item)
    {
        if($rol == "1")
        {
            echo' 
            <option value="'.$item["Id"].'">
                '.$item["Name"].'
            </option>
            ';
        }
    }
    
?>