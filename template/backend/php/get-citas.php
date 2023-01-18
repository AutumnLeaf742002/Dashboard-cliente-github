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
            define("sql", "SELECT citas.*, clientes.Primer_Nombre as nombre_cliente, clientes.Apellido as apellido_cliente, estados_citas.Estado as estado, roles.Rol as rol FROM citas JOIN clientes ON clientes.Id = citas.Id_cliente JOIN estados_citas ON estados_citas.Id = citas.Estado_cita JOIN roles ON roles.Id = citas.Rol ORDER BY clientes.Primer_nombre");
        }

        $res = select($oCon, sql);

        foreach($res as $item)
        {
            echo'
            <tr>
                <td>'.$item["Id"].'</td>
                <td>'.$item["nombre_cliente"].' '.$item["apellido_cliente"].'</td>
                <td>'.$item["Nombre_plomero"].' '.$item["Apellido_plomero"].' ('.$item["Cell_plomero"].')</td>
                <td>'.$item["Fecha"].'</td>
                <td>'.$item["Hora"].'</td>
                <td>'.$item["Direccion"].'</td>
                <td>'.$item["estado"].'</td>
                <td>'.$item["Id_agendador"].'</th>
                <td>'.$item["rol"].'</td>
            </tr>
            ';
        }
    }
    else
    {
        header("location: ../../login.html");
    }

?>