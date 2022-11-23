<?php
    
    if(!empty($_POST))
    {

        $values = array();

        foreach($_POST as $item)
        {
            $item = trim($item);
            array_push($values, $item);
        }

        $sql = "UPDATE co_aplicantes 
        SET Relacion_solicitante = '$values[0]', 
        Primer_nombre = '$values[1]',
        Apellido = '$values[2]',
        Fecha_nacimiento = '$values[3]', 
        N_seguro_social = '$values[4]',
        N_licencia_conducir = '$values[5]',
        C_Estado = '$values[6]',
        C_Vencimiento = '$values[7]',
        C_Direccion = '$values[8]', 
        C_Cuanto_tiempo = '$values[9]',
        C_Ciudad = '$values[10]',
        C_Estado_ciudad = '$values[11]',
        C_Zip = '$values[12]',
        C_Telefono_casa = '$values[13]', 
        C_Telefono_celular = '$values[14]',
        C_Direccion_anterior = '$values[15]',
        C_Ciudad_anterior = '$values[16]',
        C_Estado_anterior = '$values[17]',
        C_Zip_anterior = '$values[18]', 
        C_Correo = '$values[19]',
        C_Nombre_empleo = '$values[20]',
        C_Direccion_empleo = '$values[21]',
        C_Tiempo_empleo = '$values[22]',
        C_Telefono_empleo = '$values[23]', 
        C_Posicion_empleo = '$values[24]',
        C_Ingreso_bruto = '$values[25]',
        C_Tipo_ingreso = '$values[26]',
        C_Empleador_anterior = '$values[27]',
        posicion_28 = '$values[28]', 
        posicion_29 = '$values[29]',
        posicion_30 = '$values[30]',
        posicion_31 = '$values[31]',
        posicion_32 = '$values[32]',
        posicion_33 = '$values[33]' ";
        
        echo $sql;
    }

?>