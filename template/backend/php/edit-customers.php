<?php
    
    if(!empty($_POST))
    {
        $values = array();

        foreach($_POST as $item)
        {
            array_push($values, $item);
        }

        $sql = "UPDATE clientes SET nada = $values[0], 
        SET nada = '$values[1]', 
        SET nada = '$values[2]',
        SET nada = '$values[3]',
        SET nada = '$values[4]',
        SET nada = '$values[5]',
        SET nada = '$values[6]', 
        SET nada = '$values[7]',
        SET nada = '$values[8]',
        SET nada = '$values[9]',
        SET nada = '$values[10]',
        SET nada = '$values[11]', 
        SET nada = '$values[12]',
        SET nada = '$values[13]',
        SET nada = '$values[14]',
        SET nada = '$values[15]',
        SET nada = '$values[16]', 
        SET nada = '$values[17]',
        SET nada = '$values[18]',
        SET nada = '$values[19]',
        SET nada = '$values[20]',
        SET nada = '$values[21]', 
        SET nada = '$values[22]',
        SET nada = '$values[23]',
        SET nada = '$values[24]',
        SET nada = '$values[25]',
        SET nada = '$values[26]', 
        SET nada = '$values[27]',
        SET nada = '$values[28]',
        SET nada = '$values[29]',
        SET nada = '$values[30]',
        SET nada = '$values[31]', 
        SET nada = '$values[32]',
        SET nada = '$values[33]',
        SET nada = '$values[34]',
        SET nada = '$values[35]',
        SET nada = '$values[36]', 
        SET nada = '$values[37]',
        SET nada = '$values[38]',
        SET nada = '$values[39]',
        SET nada = '$values[40]',
        SET nada = '$values[41]', 
        SET nada = '$values[42]',
        SET nada = '$values[43]',
        SET nada = '$values[44]',
        SET nada = '$values[45]',
        SET nada = '$values[46]', 
        SET nada = '$values[47]',
        SET nada = '$values[48]',
        SET nada = '$values[49]',
        SET nada = '$values[50]' ";
        
        echo $values[1];
        
        // echo $sql;
    }

?>