<?php

    if(isset($_POST))
    {
        // Llamada a los modulos que contienen la conexion a la base de datos y funciones de insercion
        include_once "commands.php";
        include_once "connection.php";

        // Obtencion de los datos enviados a traves de Ajax mediante register-customer.js
        $cl_1 = $_POST["cl_1"];
        $cl_2 = $_POST["cl_2"];
        $cl_3 = $_POST["cl_3"];
        $cl_4 = $_POST["cl_4"];
        $cl_5 = $_POST["cl_5"];
        $cl_6 = $_POST["cl_6"];
        $cl_7 = $_POST["cl_7"];
        $cl_8 = $_POST["cl_8"];
        $cl_9 = $_POST["cl_9"];
        $cl_10 = $_POST["cl_10"];
        $cl_11 = $_POST["cl_11"];
        $cl_12 = $_POST["cl_12"];
        $cl_13 = $_POST["cl_13"];
        $cl_14 = $_POST["cl_14"];
        $cl_15 = $_POST["cl_15"];
        $cl_16 = $_POST["cl_16"];
        $cl_17 = $_POST["cl_17"];
        $cl_18 = $_POST["cl_18"];
        $cl_19 = $_POST["cl_19"];
        $cl_20 = $_POST["cl_20"];
        $cl_21 = $_POST["cl_21"];
        $cl_22 = $_POST["cl_22"];
        $cl_23 = $_POST["cl_23"];
        $cl_24 = $_POST["cl_24"];
        $cl_25 = $_POST["cl_25"];
        $cl_26 = $_POST["cl_26"];
        $cl_27 = $_POST["cl_27"];
        $cl_28 = $_POST["cl_28"];
        $cl_29 = $_POST["cl_29"];
        $cl_30 = $_POST["cl_30"];
        $cl_31 = $_POST["cl_31"];
        $cl_32 = $_POST["cl_32"];
        $cl_33 = $_POST["cl_33"];
        $cl_34 = $_POST["cl_34"];
        $cl_35 = $_POST["cl_35"];
        $cl_36 = $_POST["cl_36"];
        $cl_37 = $_POST["cl_37"];
        $cl_38 = $_POST["cl_38"];
        $cl_39 = $_POST["cl_39"];
        $cl_40 = $_POST["cl_40"];
        $cl_41 = $_POST["cl_41"];
        $cl_42 = $_POST["cl_42"];
        $cl_43 = $_POST["cl_43"];
        $cl_44 = $_POST["cl_44"];
        $cl_45 = $_POST["cl_45"];
        $cl_46 = $_POST["cl_46"];
        $cl_47 = $_POST["cl_47"];
        $cl_48 = $_POST["cl_48"];
        $cl_49 = $_POST["cl_49"];
        $cl_50 = $_POST["cl_50"];
        $cl_51 = $_POST["cl_51"];

        $cl_cantidad_financiada = $_POST["cl_cantidad_financiada"];
        $cl_nombre_representante = $_POST["cl_nombre_representante"];
        $avatar_selected = $_POST["avatar_selected"];


        // Creacion del numero de serie para el cliente
        $n_serie = create_serie();

        // Inicializacion del objeto de coneccion
        $oCon = connect();


        // Declara una variable que busca el codigo de serie creado para ver si existe, si existe, crea otro codigo hasta que no exista
        $n_serie_existente = select($oCon, "SELECT N_serie_cliente FROM clientes WHERE N_serie_cliente = '$n_serie' ");

        if(count($n_serie_existente) > 0)
        {
            while($n_serie_existente[0]["N_serie_cliente"] == $n_serie)
            {
                $n_serie = create_serie();
            }
        }


        // Query de insercion de clientes
        $sql_cl = "INSERT INTO clientes (Id, Primer_nombre, Apellido, Fecha_nacimiento, N_seguro_social, N_licencia_conducir, Estado, Expedicion, Vencimiento, Direccion, Cuanto_tiempo, Ciudad, Estado_ciudad, Zip, Telefono_casa, Telefono_celular, Direccion_anterior, Ciudad_anterior, Estado_anterior, Zip_anterior, Correo, Nombre_empleo, Direccion_empleo, Tiempo_empleo, Telefono_empleo, Posicion_empleo, Ingreso_bruto, Tipo_ingreso, Empleador_anterior, Fecha_empleo_anterior, Ciudad_empleo_anterior, Estado_empleo_anterior, Zip_empleo_anterior, N_telefono_empleo_anterior, Fuente_ingreso_extra, Cantidad_fuente_ingreso_extra, Id_hipoteca_estado, Id_tipo_residencia_hipoteca, Propietario_hipoteca_titular, Direccion_hipoteca, Pago_hipoteca, N_telefono_hipoteca, Referencia_pariente_nombre_1, Referencia_pariente_direccion_1, Referencia_pariente_telefono_1, Referencia_pariente_relacion_1, Referencia_pariente_nombre_2, Referencia_pariente_direccion_2, Referencia_pariente_telefono_2, Referencia_pariente_relacion_2, Fecha_creacion_registro, Cantidad_financiada, Nombre_representante, Avatar, N_serie_cliente) VALUES (NULL, '$cl_1', '$cl_2', '$cl_3', '$cl_4', '$cl_5', '$cl_6', '$cl_7', '$cl_8', '$cl_9', '$cl_10', '$cl_11', '$cl_12', '$cl_13', '$cl_14', '$cl_15', '$cl_16', '$cl_17', '$cl_18', '$cl_19', '$cl_20', '$cl_21', '$cl_22', '$cl_23', '$cl_24', '$cl_25', '$cl_26', '$cl_27', '$cl_28', '$cl_29', '$cl_30', '$cl_31', '$cl_32', '$cl_33', '$cl_34', '$cl_35', $cl_36, $cl_37, '$cl_38', '$cl_39', '$cl_40', '$cl_41', '$cl_42', '$cl_43', '$cl_44', '$cl_45', '$cl_46', '$cl_47', '$cl_48', '$cl_49', '$cl_50', '$cl_cantidad_financiada', '$cl_nombre_representante', '$avatar_selected', '$n_serie') ";
        
        $res_co = "none";

        // Ejecutando el Query para agregar el cliente
        $res = command($oCon, $sql_cl);

        if($cl_51 == "si ")
        {
            // Si el usuario quiere agregar un co-aplicante, aqui se tomaran los datos de los campos del co-aplicante
            $co_1 = $_POST["co_1"];
            $co_2 = $_POST["co_2"];
            $co_3 = $_POST["co_3"];
            $co_4 = $_POST["co_4"];
            $co_5 = $_POST["co_5"];
            $co_6 = $_POST["co_6"];
            $co_7 = $_POST["co_7"];
            $co_8 = $_POST["co_8"];
            $co_9 = $_POST["co_9"];
            $co_10 = $_POST["co_10"];
            $co_11 = $_POST["co_11"];
            $co_12 = $_POST["co_12"];
            $co_13 = $_POST["co_13"];
            $co_14 = $_POST["co_14"];
            $co_15 = $_POST["co_15"];
            $co_16 = $_POST["co_16"];
            $co_17 = $_POST["co_17"];
            $co_18 = $_POST["co_18"];
            $co_19 = $_POST["co_19"];
            $co_20 = $_POST["co_20"];
            $co_21 = $_POST["co_21"];
            $co_22 = $_POST["co_22"];
            $co_23 = $_POST["co_23"];
            $co_24 = $_POST["co_24"];
            $co_25 = $_POST["co_25"];
            $co_26 = $_POST["co_26"];
            $co_27 = $_POST["co_27"];
            $co_28 = $_POST["co_28"];
            $co_29 = $_POST["co_29"];
            $co_30 = $_POST["co_30"];
            $co_31 = $_POST["co_31"];
            $co_32 = $_POST["co_32"];
            $co_33 = $_POST["co_33"];
            $co_34 = $_POST["co_34"];
            $co_35 = $_POST["co_35"];
            $co_36 = $_POST["co_36"];

            // Query de insercion para co-aplicantes
            $sql_co = "INSERT INTO co_aplicantes (Id, C_N_serie_cliente, Relacion_solicitante, C_Primer_nombre, C_Apellido, C_Fecha_nacimiento, C_N_seguro_social, C_N_licencia_conducir, C_Estado, C_Expedicion, C_Vencimiento, C_Direccion, C_Cuanto_tiempo, C_Ciudad, C_Estado_ciudad, C_Zip, C_Telefono_casa, C_Telefono_celular, C_Direccion_anterior, C_Ciudad_anterior, C_Estado_anterior, C_Zip_anterior, C_Correo, C_Nombre_empleo, C_Direccion_empleo, C_Tiempo_empleo, C_Telefono_empleo, C_Posicion_empleo, C_Ingreso_bruto, C_Tipo_ingreso, C_Empleador_anterior, C_Fecha_empleo_anterior, C_Ciudad_empleo_anterior, C_Estado_empleo_anterior, C_Zip_empleo_anterior, C_N_telefono_empleo_anterior, C_Fuente_ingreso_extra, C_Cantidad_fuente_ingreso_extra) VALUES (NULL, '$n_serie', '$co_1', '$co_2', '$co_3', '$co_4', '$co_5', '$co_6', '$co_7', '$co_8', '$co_9', '$co_10', '$co_11', '$co_12', '$co_13', '$co_14', '$co_15', '$co_16', '$co_17', '$co_18', '$co_19', '$co_20', '$co_21', '$co_22', '$co_23', '$co_24', '$co_25', '$co_26', '$co_27', '$co_28', '$co_29', '$co_30', '$co_31', '$co_32', '$co_33', '$co_34', '$co_35', '$co_36') ";
            
            // ejecutando la Query de insercion para co-aplicantes
            $res_co = command($oCon, $sql_co);
        }

        echo "status:$res - status:$res_co";
    }

?>