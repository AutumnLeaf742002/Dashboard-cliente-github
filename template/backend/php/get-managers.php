<?php

    session_start();
    $rol = $_SESSION["rol"]??0;

    include_once "connection.php";
    include_once "commands.php";

    $oCon = connect();
    $sql = "SELECT managers.*, offices.Name_office as office FROM managers JOIN offices ON offices.Id = managers.Id_office";
    $res = select($oCon, $sql);

    foreach($res as $item)
    {
        if($rol == "1")
        {
            echo' 
            <option value="'.$item["Id"].'">
                '.$item["Name"].' ('.$item["office"].')
            </option>
            ';
        }
    }
    
?>