<?php

    if(!empty($_POST))
    {
        include_once "connection.php";
        include_once "commands.php";
        $oCon = connect();
        session_start();
        $id_logued = $_SESSION["id"];
        $rol_logued = $_SESSION["rol"];

        $id_cliente = $_POST["id_cliente"];
        $nombre_plomero = $_POST["nombre_plomero"];
        $apellido_plomero = $_POST["apellido_plomero"];
        $cell_plomero = $_POST["cell_plomero"];
        $fecha = $_POST["fecha"];
        $hora = $_POST["hora"];
        $direccion = $_POST["direccion"];
        $tipo_instalacion = $_POST["tipo_instalacion"];

        $id_cliente = trim($id_cliente);
        $nombre_plomero = trim($nombre_plomero);
        $nombre_plomero = ucfirst($nombre_plomero);
        $apellido_plomero = trim($apellido_plomero);
        $apellido_plomero = ucfirst($apellido_plomero);
        $cell_plomero = trim($cell_plomero);
        $fecha = trim($fecha);
        $hora = trim($hora);
        $direccion = trim($direccion);
        $tipo_instalacion = trim($tipo_instalacion);

        define("sql", "INSERT INTO citas (Id_cliente, Nombre_plomero, Apellido_plomero, Cell_plomero, Fecha, Hora, Direccion, Tipo_instalacion, Id_agendador, Rol, Estado_cita) VALUES ($id_cliente, '$nombre_plomero', '$apellido_plomero', '$cell_plomero', '$fecha', '$hora', '$direccion', '$tipo_instalacion', $id_logued, $rol_logued, 4)");
        $res = command($oCon, sql);

        echo $res;
    }
    else
    {
        header("location: ../../login.html");
    }

?>