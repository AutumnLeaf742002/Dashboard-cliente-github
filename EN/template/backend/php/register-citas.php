<?php

    if(!empty($_POST))
    {
        include_once "connection.php";
        include_once "commands.php";
        $oCon = connect();
        session_start();
        $id_logued = $_SESSION["id"];
        $rol_logued = $_SESSION["rol"];

        $cliente = $_POST["cliente"];
        $instalador = $_POST["instalador"];
        $fecha = $_POST["fecha"];
        $hora = $_POST["hora"];
        $tipo_instalacion = $_POST["tipo_instalacion"];

        $cliente = trim($cliente);
        $instalador = trim($instalador);
        $fecha = trim($fecha);
        $hora = trim($hora);
        $tipo_instalacion = trim($tipo_instalacion);

        //confirmacion

        $res_office_instalador = select($oCon, "SELECT Id_office FROM instaladores WHERE Id = $instalador");
        $res_office_cliente = select($oCon, "SELECT Id_office FROM clientes WHERE Id = $cliente");

        if($res_office_cliente[0]["Id_office"] == $res_office_instalador[0]["Id_office"])
        {
            $confirmacion = true;

            $res_confirmacion = select($oCon, "SELECT * FROM citas WHERE Id_instalador = $instalador AND Estado_cita = 4");

            if(is_array($res_confirmacion) == true)
            {
                if(count($res_confirmacion) > 0)
                {
                    foreach($res_confirmacion as $item)
                    {
                        if($item["Fecha"] == $fecha)
                        {
                            $array_hora_b = explode(":", $item["Hora"]);
                            $array_hora_a = explode(":", $hora);
                            $total_b = (intval($array_hora_b[0])*60)+intval($array_hora_b[1]);
                            $total_a = (intval($array_hora_a[0])*60)+intval($array_hora_a[1]);
                            $diferencia = $total_a - $total_b;

                            if($diferencia >= 180 || $diferencia <= -180)
                            {
                                $confirmacion = true;
                            }
                            else
                            {
                                $confirmacion = false;
                                break;
                            }
                        }
                    }
                }
            }

            if($confirmacion == true)
            {
                //ejecucion

                $fecha_actual = strtotime(date("Y-m-d"));
                $fecha_bd = strtotime($fecha);
                $diferencia_en_segundos = $fecha_bd - $fecha_actual;
                $diferencia_en_dias = $diferencia_en_segundos / 86400;

                if($diferencia_en_dias >= -1)
                {
                    define("sql", "INSERT INTO citas (Id_cliente, Id_instalador, Fecha, Hora, Tipo_instalacion, Id_agendador, Rol, Estado_cita) VALUES ($cliente, '$instalador', '$fecha', '$hora', '$tipo_instalacion', $id_logued, $rol_logued, 4)");
                    $res = command($oCon, sql);

                    echo $res;
                }
                else
                {
                    echo "Solo puedes agendar una cita para hoy o fechas posteriores";
                }

                
            }
            else
            {
                echo "El Instalador estará ocupado con otra cita en esa hora";
            }
        }
        else
        {
            echo "La oficina del Cliente y el Instalador debe ser la misma";
        }


    }
    else
    {
        header("location: ../../login.html");
    }

?>