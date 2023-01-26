<?php
    
    $r = false;
    session_start();

    if($_SESSION["rol"] == "1" || $_SESSION["rol"] == "2")
    {
        $r = true;
    }

    if(!empty($_POST) && $r == true)
    {

        $values = array();

        foreach($_POST as $item)
        {
            $item = trim($item);
            array_push($values, $item);
        }

        $sql = "UPDATE co_aplicantes 
        SET Relacion_solicitante = '$values[0]', 
        C_Primer_nombre = '$values[1]',
        C_Apellido = '$values[2]',
        C_Fecha_nacimiento = '$values[3]', 
        C_N_seguro_social = '$values[4]',
        C_N_licencia_conducir = '$values[5]',
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
        C_Fecha_empleo_anterior = '$values[28]', 
        C_Ciudad_empleo_anterior = '$values[29]',
        C_Estado_empleo_anterior = '$values[30]',
        C_Zip_empleo_anterior = '$values[31]',
        C_N_telefono_empleo_anterior = '$values[32]',
        C_Fuente_ingreso_extra = '$values[33]',
        C_Cantidad_fuente_ingreso_extra = '$values[34]' WHERE C_N_serie_cliente = '$values[35]' ";
        
        echo $sql;
    }
    else
    {
        header("location: crm-contact.html");
    }

?>