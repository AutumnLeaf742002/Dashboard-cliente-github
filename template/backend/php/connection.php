<?php

    function connect()
    {
        
        if(!isset($oCon))
        {
            $host = "localhost";
            $user = "qscbkfcv_dashboard-pasteur-user";
            $password = "qscbkfcv_dashboard";
            $db = "qscbkfcv_dashboard";
            $host_info = "mysql:hos=$host;dbname=$db;charset=utf8";

            try 
            {
                $oCon = new PDO($host_info, $user, $password);
                return $oCon;
            } 
            catch (PDOException $ex) {
                return "Error".$ex;
            }
        }
        else
        {
            return $oCon;
        }
        
    }

?>