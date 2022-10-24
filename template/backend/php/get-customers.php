<?php

    if(isset($_GET))
    {
        include_once "connection.php";
        include_once "commands.php";

        $oCon = connect();
        $sql = "SELECT Avatar, Primer_nombre, N_seguro_social, N_licencia_conducir, Estado, Vencimiento, Direccion FROM clientes";
        
        $res = select($oCon, $sql);

        if(count($res) > 0)
        {
            foreach($res as $item)
            {
                echo'
                    <tr>
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
            echo 'none';
        }
    }
?>