<?php

    if(!empty($_POST))
    {
        session_start();

        echo $_SESSION["rol"];
    }
    else
    {
        header("location: ../../login.html");
    }

?>