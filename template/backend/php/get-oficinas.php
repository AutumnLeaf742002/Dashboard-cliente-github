<?php

    include_once "connection.php";
    include_once "commands.php";

    $oCon = connect();
    $sql = "SELECT * FROM offices";
    $res = select($oCon, $sql);

    foreach($res as $item)
    {
        echo' 
        <option value="'.$item["Id"].'">
            '.$item["Name_office"].'
        </option>
        ';
    }
?>