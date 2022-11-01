<?php

    if(isset($_POST))
    {
        $search = $_POST['search'] ?? "nada";
        $search = trim($search);

        include_once "connection.php";
        include_once "commands.php";
        
        $oCon = connect();
        // $sql = "SELECT * FROM clientes WHERE $filtro LIKE '%$search%' ";

        $sql = "SELECT * FROM clientes WHERE Primer_nombre LIKE '%$search%' ";
        $res = select($oCon, $sql);

        if(count($res) <= 0)
        {
            $sql = "SELECT * FROM clientes WHERE N_seguro_social LIKE '%$search%' ";
            $res = select($oCon, $sql);

            if(count($res) <= 0)
            {
                $sql = "SELECT * FROM clientes WHERE N_licencia_conducir LIKE '%$search%' ";
                $res = select($oCon, $sql);

                if(count($res) <= 0)
                {
                    $sql = "SELECT * FROM clientes WHERE Estado LIKE '%$search%' ";
                    $res = select($oCon, $sql);

                    if(count($res) <= 0)
                    {
                        $sql = "SELECT * FROM clientes WHERE Vencimiento LIKE '%$search%' ";
                        $res = select($oCon, $sql);

                        if(count($res) <= 0)
                        {
                            $sql = "SELECT * FROM clientes WHERE Direccion LIKE '%$search%' ";
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
                $n_serie = $item["N_serie_cliente"];
                $res_n_serie = select($oCon, "SELECT Id FROM co_aplicantes WHERE C_N_serie_cliente = '$n_serie'");

                
                if(count($res_n_serie) > 0)
                {
                    $id_co = $res_n_serie[0]["Id"];
                }
                else
                {
                    $id_co = 0;
                }

                echo'
                    <tr class="hover" style="cursor: pointer;" onclick="perfil_cliente('.$item["Id"].', '.$id_co.')">
                        <td>
                            <img src="Avatars/avatar-'.$item["Avatar"].'.svg" class="d-inline-block img-circle " alt="tbl">
                        </td>
                        <td class="pro-name">
                            '.$item["Primer_nombre"].'
                        </td>
                        <td>
                            '.$item["N_seguro_social"].'
                        </td>
                        <td>
                            '.$item["N_licencia_conducir"].'
                        </td>
                        <td>
                            '.$item["Estado"].'
                        </td>
                        <td>
                            '.$item["Vencimiento"].'
                        </td>
                        <td>
                            '.$item["Direccion"].'
                        </td>
                        
                    </tr>';
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

?>