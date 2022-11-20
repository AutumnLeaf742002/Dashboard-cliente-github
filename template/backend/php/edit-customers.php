<?php
    
    if(!empty($_POST))
    {

        $values = array();

        foreach($_POST as $item)
        {
            array_push($values, $item);
        }

        $sql = "UPDATE clientes 
        SET Nombre_representante = $values[0], 
        Cantidad_financiada = '$values[1]', 
        Estatus = $values[2],
        Fecha_mantenimiento = '$values[3]',
        Primer_nombre = '$values[4]',
        Apellido = '$values[5]',
        Fecha_nacimiento = '$values[6]', 
        N_seguro_social = '$values[7]',
        N_licencia_conducir = '$values[8]',
        Vencimiento = '$values[9]',
        Direccion = '$values[10]',
        Cuanto_tiempo = '$values[11]', 
        Ciudad = '$values[12]',
        Estado_ciudad = '$values[13]',
        Zip = '$values[14]',
        Telefono_casa = '$values[15]',
        Telefono_celular = '$values[16]', 
        Direccion_anterior = '$values[17]',
        Ciudad_anterior = '$values[18]',
        Estado_anterior = '$values[19]',
        Zip_anterior = '$values[20]',
        Correo = '$values[21]', 
        Nombre_empleo = '$values[22]',
        Direccion_empleo = '$values[23]',
        Tiempo_empleo = '$values[24]',
        Telefono_empleo = '$values[25]',
        Posicion_empleo = '$values[26]', 
        Ingreso_bruto = '$values[27]',
        Tipo_ingreso = '$values[28]',
        Empleador_anterior = '$values[29]',
        Fecha_empleo_anterior = '$values[30]',
        Ciudad_empleo_anterior = '$values[31]', 
        Estado_empleo_anterior = '$values[32]',
        Zip_empleo_anterior = '$values[33]',
        N_telefono_empleo_anterior = '$values[34]',
        Fuente_ingreso_extra = '$values[35]',
        Cantidad_fuente_ingreso_extra = '$values[36]', 
        Id_hipoteca_estado = $values[37],
        Id_tipo_residencia_hipoteca = $values[38],
        Direccion_hipoteca = '$values[39]',
        Propietario_hipoteca_titular = '$values[40]',
        Pago_hipoteca = '$values[41]', 
        N_telefono_hipoteca = '$values[42]',
        Referencia_pariente_nombre_1 = '$values[43]',
        Referencia_pariente_direccion_1 = '$values[44]',
        Referencia_pariente_telefono_1 = '$values[45]',
        Referencia_pariente_relacion_1 = '$values[46]', 
        Referencia_pariente_nombre_2 = '$values[47]',
        Referencia_pariente_direccion_2 = '$values[48]',
        Referencia_pariente_telefono_2 = '$values[49]',
        Referencia_pariente_relacion_2 = '$values[50]' WHERE Id = $values[51]";
        
        echo $sql;
    }

?>