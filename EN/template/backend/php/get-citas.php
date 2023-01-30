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

            echo'
            <tr>
                <td>'.$item["Id"].'</td>
                <td>'.$item["Primer_nombre"].' '.$item["Apellido"].' ('.$item["Telefono_celular"].')</td>
                <td>'.$item["Nombre"].' ('.$item["Cell"].')</td>
                <td>'.$item["Fecha"].'</td>
                <td>'.$item["Hora"].'</td>
                <td>'.$item["Direccion"].'</td>
                <td>'.$item["Estado"].'</td>
                <td>'.$agendador.'</th>
                <td>'.$item["Rol"].'</td>
            </tr>
            ';
        }
    }
    else
    {
        header("location: ../../login.html");
    }

?>