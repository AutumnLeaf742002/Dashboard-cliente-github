<?php
    if(!empty($_GET))
    {   
        if($_GET["d"] == true)
        {
            session_start();
            session_destroy();
            header("location: login.html");
        }
    }
    else
    {
        header("location: login.html");
    }
?>