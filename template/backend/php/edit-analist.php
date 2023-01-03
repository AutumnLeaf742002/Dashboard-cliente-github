<?php

    if(!empty($_POST))
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
        $mail = trim($mail);
        $cell = trim($cell);
        $carnet = trim($carnet);
        $comision = trim($comision);
        $start_date =trim($start_date);
        $recruiter = trim($recruiter);
        $office = trim($office);
        $user = trim($user);

        if($carnet == "")
        {
            define("sql", "CALL sp_edit_analist(".$id_a.", '".$name."', '".$mail."', '".$cell."', NULL, '".$start_date."', '".$recruiter."', ".$office.", '".$comision."', '".$user."');");

        }
        else
        {
            define("sql", "CALL sp_edit_analist(".$id_a.", '".$name."', '".$mail."', '".$cell."', '".$carnet."', '".$start_date."', '".$recruiter."', ".$office.", '".$comision."', '".$user."');");
        }

        $res = command($oCon, sql);

        echo $res;
    }
    else
    {
        header("location: ../../Analistas.html");
    }

?>