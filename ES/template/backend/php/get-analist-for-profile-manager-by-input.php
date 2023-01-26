<?php

    if(isset($_POST))
    {
        $search = $_POST['search'] ?? "nada";
        $search = trim($search);
        $vmekmsi23xmfvwe155 = $_POST['vmekmsi23xmfvwe155'] ?? "nada";
        $vmekmsi23xmfvwe155 = trim($vmekmsi23xmfvwe155);

        include_once "connection.php";
        include_once "commands.php";
        
        $oCon = connect();
        // $sql = "SELECT * FROM clientes WHERE $filtro LIKE '%$search%' ";

        $sql = "SELECT * FROM analyst WHERE Id_supervisor = $vmekmsi23xmfvwe155 AND Name LIKE '%$search%' ";
        $res = select($oCon, $sql);

        if(count($res) <= 0)
        {
            $sql = "SELECT * FROM analyst WHERE Id_supervisor = $vmekmsi23xmfvwe155 AND Mail LIKE '%$search%' ";
            $res = select($oCon, $sql);

            if(count($res) <= 0)
            {
                $sql = "SELECT * FROM analyst WHERE Id_supervisor = $vmekmsi23xmfvwe155 AND Cell LIKE '%$search%' ";
                $res = select($oCon, $sql);

                if(count($res) <= 0)
                {
                    $sql = "SELECT * FROM analyst WHERE Id_supervisor = $vmekmsi23xmfvwe155 AND User LIKE '%$search%' ";
                    $res = select($oCon, $sql);
                }
            }
        }



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
        echo "";
    }
    else
    {
        header("location: crm-contact.html");
    }

?>