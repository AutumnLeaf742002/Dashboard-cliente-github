<?php
    
    if(!empty($_POST))
    {
        $values = array();

        foreach($_POST as $item)
        {
            array_push($values, $item);
        }

        echo $values[16];

        $sql = "UPDATE clientes SET Primer_nombre = '',  ";
        // echo $sql;
    }

?>