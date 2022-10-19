<?php
    function select($oCon, $sql)
    {
        try
        {
            $state = $oCon->prepare($sql);
            $state->execute();
            $res = $state->fetchAll();
            return $res;
        }
        catch(Exception $ex)
        {
            return "Error: $ex";
        }
    }

    function command($oCon, $sql)
    {
        try
        {
            $state = $oCon->prepare($sql);
            $res = $state->execute();
            return "Correct";
        }
        catch(Exception $ex)
        {
            return "Error: $ex";
        }
    }

    function encrypt($pass)
    {
        $passE = hash('sha256', $pass);

        return $passE;
    }

    function get_date()
    {
        date_default_timezone_set("America/New_York");
        $date = date("g:ia - j/n/y");
        return $date;
    }

    function 
?>