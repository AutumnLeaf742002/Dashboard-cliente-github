<?php

    if(!empty($_POST))
    {
        include_once "connection.php";
        include_once "commands.php";
        $oCon = connect();

        $id_cl = $_POST["id_cl"];
        $id_co = $_POST["id_co"];

        if($id_cl > 0)
        {
            if($id_co > 0)
            {
                define("sql", "DELETE FROM clientes WHERE id = $id_cl ; DELETE FROM co_aplicantes WHERE id = $id_co; ALTER TABLE clientes AUTO_INCREMENT = 1; ALTER TABLE co_aplicantes AUTO_INCREMENT = 1; ");
                $res = command($oCon, sql);
            }
            else
            {
                define("sql_s", "DELETE FROM clientes WHERE id = $id_cl; ALTER TABLE clientes AUTO_INCREMENT = 1; ALTER TABLE co_aplicantes AUTO_INCREMENT = 1; ");
                $res = command($oCon, sql_s);
            }

            echo $res;

        }
        else
        {
            echo "Ha ocurrido un error";
        }
        
    }

?>