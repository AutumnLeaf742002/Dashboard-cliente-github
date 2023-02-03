<?php

    if(isset($_POST))
    {
        include_once "connection.php";
        include_once "commands.php";

        $id_analista = $_POST["ibwisaduiwd"];

        $oCon = connect();
        $sql = "SELECT clientes.*, offices.Name_office as office, estatus.Estatus as Estatus_cl, estatus.Color as Color FROM clientes JOIN offices ON clientes.Id_office = offices.Id JOIN estatus ON estatus.Id = clientes.Estatus WHERE Nombre_representante = $id_analista";
        
        $res = select($oCon, $sql);

        if(count($res) > 0)
        {
            foreach($res as $item)
            {
                $fecha_actual = strtotime(date("Y-m-d"));
                $fecha_bd = strtotime($item["Fecha_mantenimiento"]);
                $diferencia_en_segundos = $fecha_bd - $fecha_actual;
                $diferencia_en_dias = $diferencia_en_segundos / 86400;
                $color = "";

                if($item["Fecha_mantenimiento"] != "")
                {
                    if($diferencia_en_dias <= 5 && $diferencia_en_dias > 0) 
                    { 
                        $color = "1.99px solid #f1c40f";
                    }
                    else if($diferencia_en_dias <= 0) 
                    {
                        $color = "1.99px solid #e74c3c";
                    }
                }

                $n_serie = $item["N_serie_cliente"];
                $res_n_serie = select($oCon, "SELECT Id FROM co_aplicantes WHERE C_N_serie_cliente = '$n_serie'");
                $estatus = $item["Estatus"];

                if(count($res_n_serie) > 0)
                {
                    $id_co = $res_n_serie[0]["Id"];
                }
                else
                {
                    $id_co = 0;
                }

                if($estatus == 2 || $estatus == 15)
                {
                    echo'
                        <tr class="hover" style="cursor: pointer; border: '.$color.';">
                            <td onclick="perfil_cliente('.$item["Id"].', '.$id_co.')">
                                <img src="Avatars/avatar-'.$item["Avatar"].'.svg" class="d-inline-block img-circle " alt="tbl">
                            </td>
                            <td class="pro-name" onclick="perfil_cliente('.$item["Id"].', '.$id_co.')">
                                '.$item["Primer_nombre"].'
                            </td>
                            <td onclick="perfil_cliente('.$item["Id"].', '.$id_co.')">
                                '.$item["N_seguro_social"].'
                            </td>
                            <td onclick="perfil_cliente('.$item["Id"].', '.$id_co.')">
                                '.$item["office"].'
                            </td>
                            <td onclick="perfil_cliente('.$item["Id"].', '.$id_co.')">
                                '.$item["Direccion"].'
                            </td>
                            <td onclick="perfil_cliente('.$item["Id"].', '.$id_co.')">
                                '.$item["Fecha_mantenimiento"].'
                            </td>
                            <td onclick="perfil_cliente('.$item["Id"].', '.$id_co.')">
                                <p style="background-color: '.$item["Color"].'; margin: 0px; color: white; font-weight: bold; padding: 3px 5px; border-radius: 7px; text-align: center; font-size: 14px; display: flex; justify-content: center; max-width: 170px">
                                    '.$item["Estatus_cl"].'
                                </p>
                            </td>
                            <td>
                            </td>
                        </tr>';
                }
                else
                {
                    echo'
                        <tr class="hover" style="cursor: pointer; border: '.$color.';">
                            <td onclick="perfil_cliente('.$item["Id"].', '.$id_co.')">
                                <img src="Avatars/avatar-'.$item["Avatar"].'.svg" class="d-inline-block img-circle " alt="tbl">
                            </td>
                            <td class="pro-name" onclick="perfil_cliente('.$item["Id"].', '.$id_co.')">
                                '.$item["Primer_nombre"].'
                            </td>
                            <td onclick="perfil_cliente('.$item["Id"].', '.$id_co.')">
                                '.$item["N_seguro_social"].'
                            </td>
                            <td onclick="perfil_cliente('.$item["Id"].', '.$id_co.')">
                                '.$item["office"].'
                            </td>
                            <td onclick="perfil_cliente('.$item["Id"].', '.$id_co.')">
                                '.$item["Direccion"].'
                            </td>
                            <td onclick="perfil_cliente('.$item["Id"].', '.$id_co.')">
                                '.$item["Fecha_mantenimiento"].'
                            </td>
                            <td onclick="perfil_cliente('.$item["Id"].', '.$id_co.')">
                                <p style="background-color: '.$item["Color"].'; margin: 0px; color: white; font-weight: bold; padding: 3px 5px; border-radius: 7px; text-align: center; font-size: 14px; display: flex; justify-content: center; max-width: 170px">
                                    '.$item["Estatus_cl"].'
                                </p>
                            </td>
                            <td>
                                <button onclick="agendar_cita('.$item["Id"].')" class="btn-same btn btn-danger">agendar cita</button>
                            </td>
                        </tr>';
                }

            }

            echo '<a id="final"></a>';
        }
        else
        {
            // si no hay nada en la tabla, devuelve none
            echo '<h6>Este Analista no posee clientes</h6>';
        }
    }
    else
    {
        header("location: crm-contact.html");
    }
?>