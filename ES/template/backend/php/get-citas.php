<?php

    if(!empty($_POST))
    {
        include_once "connection.php";
        include_once "commands.php";
        $oCon = connect();
        session_start();
        $id_logued = $_SESSION["id"];
        $rol_logued = $_SESSION["rol"];

        if($rol_logued == "1")
        {
            define("sql", "SELECT citas.Id_agendador, citas.Id as Id, clientes.Primer_nombre as Primer_nombre, clientes.Apellido as Apellido, clientes.Telefono_celular as Telefono_celular, instaladores.Nombre as Nombre, instaladores.Cell as Cell, citas.Fecha as Fecha, citas.Hora as Hora, clientes.Direccion as Direccion, estados_citas.Estado as Estado, roles.Rol as Rol FROM citas JOIN clientes ON clientes.Id = citas.Id_cliente JOIN instaladores ON instaladores.Id = citas.Id_instalador JOIN estados_citas ON estados_citas.Id = citas.Estado_cita JOIN roles ON roles.Id = citas.Rol ORDER BY citas.Id DESC");
        }
        else if($rol_logued == "2")
        {
            // Consulta por si acaso pueden ver las citas de sus analistas SELECT citas.Id_agendador, citas.Id as Id, clientes.Primer_nombre as Primer_nombre, clientes.Apellido as Apellido, clientes.Telefono_celular as Telefono_celular, instaladores.Nombre as Nombre, instaladores.Cell as Cell, citas.Fecha as Fecha, citas.Hora as Hora, clientes.Direccion as Direccion, estados_citas.Estado as Estado, roles.Rol as Rol FROM citas JOIN clientes ON clientes.Id = citas.Id_cliente JOIN instaladores ON instaladores.Id = citas.Id_instalador JOIN estados_citas ON estados_citas.Id = citas.Estado_cita JOIN roles ON roles.Id = citas.Rol INNER JOIN analyst ON citas.Id_agendador = analyst.Id INNER JOIN managers ON analyst.Id_supervisor = managers.Id WHERE managers.Id = 1 OR (citas.Id_agendador = 1 AND citas.Rol = 'manager')
            define("sql", "SELECT citas.Id_agendador, citas.Id as Id, clientes.Primer_nombre as Primer_nombre, clientes.Apellido as Apellido, clientes.Telefono_celular as Telefono_celular, instaladores.Nombre as Nombre, instaladores.Cell as Cell, citas.Fecha as Fecha, citas.Hora as Hora, clientes.Direccion as Direccion, estados_citas.Estado as Estado, roles.Rol as Rol FROM citas JOIN clientes ON clientes.Id = citas.Id_cliente JOIN instaladores ON instaladores.Id = citas.Id_instalador JOIN estados_citas ON estados_citas.Id = citas.Estado_cita JOIN roles ON roles.Id = citas.Rol WHERE citas.Id_agendador = $id_logued AND citas.Rol = 2 ORDER BY citas.Id DESC");
        }
        else if($rol_logued == "3")
        {
            define("sql", "SELECT citas.Id_agendador, citas.Id as Id, clientes.Primer_nombre as Primer_nombre, clientes.Apellido as Apellido, clientes.Telefono_celular as Telefono_celular, instaladores.Nombre as Nombre, instaladores.Cell as Cell, citas.Fecha as Fecha, citas.Hora as Hora, clientes.Direccion as Direccion, estados_citas.Estado as Estado, roles.Rol as Rol FROM citas JOIN clientes ON clientes.Id = citas.Id_cliente JOIN instaladores ON instaladores.Id = citas.Id_instalador JOIN estados_citas ON estados_citas.Id = citas.Estado_cita JOIN roles ON roles.Id = citas.Rol WHERE citas.Id_agendador = $id_logued AND citas.Rol = 3 ORDER BY citas.Id DESC");
        }

        $res = select($oCon, sql);

        foreach($res as $item)
        {
            $id_agendador = $item["Id_agendador"];

            if($item["Rol"] == "administrator")
            {
                $res_agendador = select($oCon, "SELECT Name FROM administrators WHERE Id = $id_agendador");
                $agendador = $res_agendador[0]["Name"];
            }
            else if($item["Rol"] == "manager")
            {
                $res_agendador = select($oCon, "SELECT Name FROM managers WHERE Id = $id_agendador");
                $agendador = $res_agendador[0]["Name"];
            }
            else if($item["Rol"] == "analyst")
            {
                $res_agendador = select($oCon, "SELECT Name FROM analyst WHERE Id = $id_agendador");
                $agendador = $res_agendador[0]["Name"];
            }

            $estado = $item["Estado"];
            $color = "";

            if($estado == "Cancelado")
            {
                $color = "#e74c3c";
            }
            else if($estado == "Concluido")
            {
                $color = "#2ecc71";
            }
            else if($estado == "No estaba en casa")
            {
                $color = "#f1c40f";
            }
            else if($estado == "Pendiente")
            {
                $color = "#f1c40f";
            }

            echo'
            <tr>
                <td>'.$item["Id"].'</td>
                <td>'.$item["Primer_nombre"].' '.$item["Apellido"].' ('.$item["Telefono_celular"].')</td>
                <td>'.$item["Nombre"].' ('.$item["Cell"].')</td>
                <td>'.$item["Fecha"].'</td>
                <td>'.$item["Hora"].'</td>
                <td>'.$item["Direccion"].'</td>
                <td>
                    <p style="background-color: '.$color.'; margin: 0px; color: white; font-weight: bold; padding: 3px 5px; border-radius: 7px; text-align: center; font-size: 14px; display: flex; justify-content: center; max-width: 170px">
                        '.$item["Estado"].'
                    </p>
                </td>
                <td>'.$agendador.'</td>
                <td>'.$item["Rol"].'</td>
                <td> 
                    <select class="btn btn-primary auth-btn" onchange="cambiar_estado(event, '.$item["Id"].')"> 
                        <option selected value="">Seleccionar</option>
                        <option value="2">Concluido</option>
                        <option value="1">Cancelado</option>
                        <option value="3">No estaba en casa</option>
                        <option value="4">Pendiente</option>
                    </select>
                </td>
            </tr>
            ';
        }
    }
    else
    {
        header("location: ../../login.html");
    }

?>