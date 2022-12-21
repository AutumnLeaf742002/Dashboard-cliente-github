<?php

    if(isset($_POST))
    {
        include_once "connection.php";
        include_once "commands.php";

        $id = $_POST["vmekmsi23xmfvwe155"];

        $oCon = connect();
        $sql = "SELECT Name, Mail, Cell, User, Foto, Id FROM analyst WHERE Id_supervisor = $id";
        
        $res = select($oCon, $sql);

        if(count($res) > 0)
        {
            foreach($res as $item)
            {

                echo'
                    <tr class="hover" style="cursor: pointer;" onclick="perfil_analist('.$item["Id"].')">
                        <td>
                            <img src="./backend/php/img-analist/'.$item["Foto"].'" class="d-inline-block img-circle" alt="tbl">
                        </td>
                        <td class="pro-name">
                            '.$item["Name"].'
                        </td>
                        <td>
                            '.$item["Mail"].'
                        </td>
                        <td>
                            '.$item["Cell"].'
                        </td>
                        <td>
                            '.$item["User"].'
                        </td>  
                    </tr>';
            }

            echo '<a id="final"></a>';
        }
        else
        {
            // si no hay nada en la tabla, devuelve none
            echo '<h6>Este Manager no posee Analistas</h6>';
        }
    }
    else
    {
        header("location: crm-contact.html");
    }
?>