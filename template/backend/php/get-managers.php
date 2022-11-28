<?php
    include_once "connection.php";
    include_once "commands.php";

    $oCon = connect();
    $sql = "SELECT * FROM managers";
    $res = select($oCon, $sql);

    foreach($res as $item)
    {
        echo' 
        <option value="'.$item["Id"].'">
            '.$item["Name"].'
        </option>
        ';
    }
    
?>