<?php

    if(!empty($_POST))
    {
        session_start();

        echo $_SESSION["rol"];
    }
    else
    {
        echo "fulanito";
    }

?>