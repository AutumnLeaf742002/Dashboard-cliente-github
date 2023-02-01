<?php

    if(isset($_POST))
    {
        $search = $_POST['search'] ?? "nada";
        $search = trim($search);

        include_once "connection.php";
        include_once "commands.php";
        
        $oCon = connect();

        session_start();
        $id_logued = $_SESSION["id"];
        $rol = $_SESSION["rol"];

        if($rol == "3")
        {
            $sql = "SELECT Fecha_mantenimiento, Estatus, N_serie_cliente, clientes.Id, Avatar, Primer_nombre, N_seguro_social, offices.Name_office as office, Estado, Vencimiento, Direccion FROM clientes INNER JOIN offices ON clientes.Id_office = offices.Id WHERE Primer_nombre LIKE '%$search%' AND Nombre_representante = $id_logued";
        }
        else if($rol == "1")
        {
            $sql = "SELECT Fecha_mantenimiento, Estatus, N_serie_cliente, clientes.Id, Avatar, Primer_nombre, N_seguro_social, offices.Name_office as office, Estado, Vencimiento, Direccion FROM clientes INNER JOIN offices ON clientes.Id_office = offices.Id WHERE Primer_nombre LIKE '%$search%'";
        }
        else if($rol == "2")
        {
            $sql = "SELECT clientes.*, offices.Name_office as office FROM clientes JOIN analyst ON analyst.Id = clientes.Nombre_representante JOIN managers ON managers.Id = analyst.Id_supervisor JOIN offices ON clientes.Id_office = offices.Id WHERE managers.Id = $id_logued AND Primer_nombre LIKE '%$search%'";
        }

        $res = select($oCon, $sql);

        if(count($res) <= 0)
        {

            if($rol == "3")
            {
                $sql = "SELECT Fecha_mantenimiento, Estatus, N_serie_cliente, clientes.Id, Avatar, Primer_nombre, N_seguro_social, offices.Name_office as office, Estado, Vencimiento, Direccion FROM clientes INNER JOIN offices ON clientes.Id_office = offices.Id WHERE N_seguro_social LIKE '%$search%' AND Nombre_representante = $id_logued";
            }
            else if($rol == "1")
            {
                $sql = "SELECT Fecha_mantenimiento, Estatus, N_serie_cliente, clientes.Id, Avatar, Primer_nombre, N_seguro_social, offices.Name_office as office, Estado, Vencimiento, Direccion FROM clientes INNER JOIN offices ON clientes.Id_office = offices.Id WHERE N_seguro_social LIKE '%$search%' ";
            }
            else if($rol == "2")
            {
                $sql = "SELECT clientes.*, offices.Name_office as office FROM clientes JOIN analyst ON analyst.Id = clientes.Nombre_representante JOIN managers ON managers.Id = analyst.Id_supervisor JOIN offices ON clientes.Id_office = offices.Id WHERE managers.Id = $id_logued AND N_seguro_social LIKE '%$search%'";
            }

            $res = select($oCon, $sql);

            if(count($res) <= 0)
            {

                if($rol == "3")
                {
                    $sql = "SELECT Fecha_mantenimiento, Estatus, N_serie_cliente, clientes.Id, Avatar, Primer_nombre, N_seguro_social, offices.Name_office as office, Estado, Vencimiento, Direccion FROM clientes INNER JOIN offices ON clientes.Id_office = offices.Id WHERE offices.Name_office LIKE '%$search%' AND Nombre_representante = $id_logued";
                }
                else if($rol == "1")
                {
                    $sql = "SELECT Fecha_mantenimiento, Estatus, N_serie_cliente, clientes.Id, Avatar, Primer_nombre, N_seguro_social, offices.Name_office as office, Estado, Vencimiento, Direccion FROM clientes INNER JOIN offices ON clientes.Id_office = offices.Id WHERE offices.Name_office LIKE '%$search%' ";
                }
                else if($rol == "2")
                {
                    $sql = "SELECT clientes.*, offices.Name_office as office FROM clientes JOIN analyst ON analyst.Id = clientes.Nombre_representante JOIN managers ON managers.Id = analyst.Id_supervisor JOIN offices ON clientes.Id_office = offices.Id WHERE managers.Id = $id_logued AND offices.Name_office LIKE '%$search%'";
                }

                $res = select($oCon, $sql);

                if(count($res) <= 0)
                {

                    if($rol == "3")
                    {
                        $sql = "SELECT Fecha_mantenimiento, Estatus, N_serie_cliente, clientes.Id, Avatar, Primer_nombre, N_seguro_social, offices.Name_office as office, Estado, Vencimiento, Direccion FROM clientes INNER JOIN offices ON clientes.Id_office = offices.Id WHERE Estado LIKE '%$search%' AND Nombre_representante = $id_logued";
                    }
                    else if($rol == "1")
                    {
                        $sql = "SELECT Fecha_mantenimiento, Estatus, N_serie_cliente, clientes.Id, Avatar, Primer_nombre, N_seguro_social, offices.Name_office as office, Estado, Vencimiento, Direccion FROM clientes INNER JOIN offices ON clientes.Id_office = offices.Id WHERE Estado LIKE '%$search%' ";
                    }
                    else if($rol == "2")
                    {
                        $sql = "SELECT clientes.*, offices.Name_office as office FROM clientes JOIN analyst ON analyst.Id = clientes.Nombre_representante JOIN managers ON managers.Id = analyst.Id_supervisor JOIN offices ON clientes.Id_office = offices.Id WHERE managers.Id = $id_logued AND Estado LIKE '%$search%'";
                    }

                    $res = select($oCon, $sql);

                    if(count($res) <= 0)
                    {

                        if($rol == "3")
                        {
                            $sql = "SELECT Fecha_mantenimiento, Estatus, N_serie_cliente, clientes.Id, Avatar, Primer_nombre, N_seguro_social, offices.Name_office as office, Estado, Vencimiento, Direccion FROM clientes INNER JOIN offices ON clientes.Id_office = offices.Id WHERE Vencimiento LIKE '%$search%' AND Nombre_representante = $id_logued";
                        }
                        else if($rol == "1")
                        {
                            $sql = "SELECT Fecha_mantenimiento, Estatus, N_serie_cliente, clientes.Id, Avatar, Primer_nombre, N_seguro_social, offices.Name_office as office, Estado, Vencimiento, Direccion FROM clientes INNER JOIN offices ON clientes.Id_office = offices.Id WHERE Vencimiento LIKE '%$search%' ";
                        }
                        else if($rol == "2")
                        {
                            $sql = "SELECT clientes.*, offices.Name_office as office FROM clientes JOIN analyst ON analyst.Id = clientes.Nombre_representante JOIN managers ON managers.Id = analyst.Id_supervisor JOIN offices ON clientes.Id_office = offices.Id WHERE managers.Id = $id_logued AND Vencimiento LIKE '%$search%'";
                        }

                        $res = select($oCon, $sql);

                        if(count($res) <= 0)
                        {

                            if($rol == "3")
                            {
                                $sql = "SELECT Fecha_mantenimiento, Estatus, N_serie_cliente, clientes.Id, Avatar, Primer_nombre, N_seguro_social, offices.Name_office as office, Estado, Vencimiento, Direccion FROM clientes INNER JOIN offices ON clientes.Id_office = offices.Id WHERE Direccion LIKE '%$search%' AND Nombre_representante = $id_logued";
                            }
                            else if($rol == "1")
                            {
                                $sql = "SELECT Fecha_mantenimiento, Estatus, N_serie_cliente, clientes.Id, Avatar, Primer_nombre, N_seguro_social, offices.Name_office as office, Estado, Vencimiento, Direccion FROM clientes INNER JOIN offices ON clientes.Id_office = offices.Id WHERE Direccion LIKE '%$search%' ";
                            }
                            else if($rol == "2")
                            {
                                $sql = "SELECT clientes.*, offices.Name_office as office FROM clientes JOIN analyst ON analyst.Id = clientes.Nombre_representante JOIN managers ON managers.Id = analyst.Id_supervisor JOIN offices ON clientes.Id_office = offices.Id WHERE managers.Id = $id_logued AND Direccion LIKE '%$search%'";
                            }
                            $res = select($oCon, $sql);
                        }
                    }
                }
            }
        }



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
                                '.$item["Estado"].'
                            </td>
                            <td onclick="perfil_cliente('.$item["Id"].', '.$id_co.')">
                                '.$item["Vencimiento"].'
                            </td>
                            <td onclick="perfil_cliente('.$item["Id"].', '.$id_co.')">
                                '.$item["Direccion"].'
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
                                '.$item["Estado"].'
                            </td>
                            <td onclick="perfil_cliente('.$item["Id"].', '.$id_co.')">
                                '.$item["Vencimiento"].'
                            </td>
                            <td onclick="perfil_cliente('.$item["Id"].', '.$id_co.')">
                                '.$item["Direccion"].'
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
            echo '';
        }
        echo "";
    }
    else
    {
        header("location: crm-contact.html");
    }

?>