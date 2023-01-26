<?php

    $r = false;
    session_start();

    if($_SESSION["rol"] == "1" || $_SESSION["rol"] == "2")
    {
        $r = true;
    }
    
    if(!empty($_POST) && $r == true)
    {
        include_once "connection.php";
        include_once "commands.php";

        $oCon = connect();

        $id_a = $_POST["id_a"]??0;
        $id_a = trim($id_a);

        $name = $_POST["name"]??"";
        $mail = $_POST["mail"]??"";
        $cell = $_POST["cell"]??"";
        $carnet = $_POST["carnet"]??"";
        $comision = $_POST["comision"]??"";
        $start_date = $_POST["start_date"]??"";
        $recruiter = $_POST["recruiter"]??"";
        $office = $_POST["office"]??"";
        $user = $_POST["user"]??"";

        $name = trim($name);
        $name = ucfirst($name);
        $mail = trim($mail);
        $mail = strtolower($mail);
        $cell = trim($cell);
        $carnet = trim($carnet);
        $comision = trim($comision);
        $start_date =trim($start_date);
        $recruiter = trim($recruiter);
        $office = trim($office);
        $user = trim($user);

        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) 
        {
            if($carnet == "")
            {
                define("sql", "CALL sp_edit_analist(".$id_a.", '".$name."', '".$mail."', '".$cell."', NULL, '".$start_date."', '".$recruiter."', '".$comision."', '".$user."');");

            }
            else
            {
                define("sql", "CALL sp_edit_analist(".$id_a.", '".$name."', '".$mail."', '".$cell."', '".$carnet."', '".$start_date."', '".$recruiter."', '".$comision."', '".$user."');");
            }

            $res = command($oCon, sql);

            echo $res;
        }
        else 
        {
            echo "mf";
        }
    }
    else
    {
        header("location: ../../Analistas.html");
    }

?>