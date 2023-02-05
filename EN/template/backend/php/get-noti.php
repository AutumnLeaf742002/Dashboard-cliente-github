<?php

    if(!empty($_POST))
    {
        include_once "connection.php";
        include_once "commands.php";

        $oCon = connect();

        session_start();
        $id_logued = $_SESSION["id"];
        $rol = $_SESSION["rol"];

        if($rol == "3")
        {
            $sql = "SELECT * FROM clientes WHERE Nombre_representante = $id_logued";
        }
        else if($rol == "1")
        {
            $sql = "SELECT * FROM clientes";
        }
        else if($rol == "2")
        {
            $sql = "SELECT clientes.*, offices.Name_office as office FROM clientes JOIN analyst ON analyst.Id = clientes.Nombre_representante JOIN managers ON managers.Id = analyst.Id_supervisor JOIN offices ON clientes.Id_office = offices.Id WHERE managers.Id = $id_logued";
        }

        $res = select($oCon, $sql);   

        echo "
            <li>
                <h6>Notifications</h6>
            </li>
        ";

        $count = 0;

        foreach($res as $item)
        {

            $res_id_co = select($oCon, "SELECT Id FROM co_aplicantes WHERE C_N_serie_cliente = '".$item["N_serie_cliente"]."'");

            if(is_array($res_id_co))
            {
                if(count($res_id_co) > 0)
                {
                    $id_co = $res_id_co[0]["Id"];
                }
                else
                {
                    $id_co = 0;
                }
            }
            else
            {
                $id_co = 0;
            }

            $fecha_actual = strtotime(date("Y-m-d"));
            $fecha_bd = strtotime($item["Fecha_mantenimiento"]);
            $diferencia_en_segundos = $fecha_bd - $fecha_actual;
            $diferencia_en_dias = $diferencia_en_segundos / 86400;

            if($item["Fecha_mantenimiento"] != "")
            {
                if($diferencia_en_dias <= 5 && $diferencia_en_dias > 0) 
                { 
                    echo '
                        <li style="cursor: pointer;" onclick="go_perfil('.$item["Id"].', '.$id_co.')">
                            <div class="media">
                                <img class="d-flex align-self-center" src="Avatars/avatar-'.$item["Avatar"].'.svg" alt="Generic placeholder image">
                                <div class="media-body">
                                    <h5 class="notification-user">'.$item["Primer_nombre"].'</h5>
                                    <p class="notification-msg">Maintenance to be performed next to 5 days or less.</p>
                                </div>
                            </div>
                        </li>
                    ';

                    $count ++;
                }
                else if($diferencia_en_dias <= 0) 
                {
                    echo '
                        <li style="cursor: pointer;" onclick="go_perfil('.$item["Id"].', '.$id_co.')">
                            <div class="media">
                                <img class="d-flex align-self-center" src="Avatars/avatar-'.$item["Avatar"].'.svg" alt="Generic placeholder image">
                                <div class="media-body">
                                    <h5 class="notification-user">'.$item["Primer_nombre"].'</h5>
                                    <p class="notification-msg">Delayed maintenance.</p>
                                </div>
                            </div>
                        </li>
                    ';

                    $count ++;
                }
            }
        }

        echo " -- $count";
    }
    else
    {
        header("location: ../../login.html");
    }

?>