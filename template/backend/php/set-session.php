<?php

    if(!empty($_POST))
    {
        include_once "connection.php";
        include_once "commands.php";

        $oCon = connect();

        $user = $_POST["user"];
        $pass = $_POST["pass"];
        $rol = $_POST["rol"];
        $passE = encrypt($pass);

        if($rol == 1)
        {
            $sql = "SELECT * FROM administrators WHERE User = '$user' AND Password = '$passE' ";
        }
        else if($rol == 2)
        {
            $sql = "SELECT * FROM managers WHERE User = '$user' AND Password = '$passE' ";
        }
        else if($rol == 3)
        {
            $sql = "SELECT * FROM analyst WHERE User = '$user' AND Password = '$passE' ";
        }
        else
        {
            $sql = "nothing";
        }

        $res = select($oCon, $sql);

        if(count($res) == 1)
        {
            session_start();
            $_SESSION["user"] = $user;
            $_SESSION["rol"] = $rol;
            $_SESSION["id"] = $res[0]["Id"];
            echo "True";
        }
        else if(count($res) < 1)
        {
            echo "False";
        }
        else
        {
            echo "Error desconocido";
        }
    }
    else
    {
        header("location: crm-contact.html");
    }

?>