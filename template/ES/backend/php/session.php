<?php

    if(!empty($_POST))
    {
        include_once "commands.php";

        session_start();
        
        if(empty($_SESSION["user"]) == false && empty($_SESSION["rol"]) == false && empty($_SESSION["id"]) == false)
        {
            echo "True";
        }
        else
        {
            echo "False";
        }
    }
    else
    {
        header("location: crm-contact.html");
    }

?>