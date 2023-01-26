<?php

    if(!empty($_POST))
    {
        include_once "connection.php";
        include_once "commands.php";
        $oCon = connect();

        define("sql", "SELECT instaladores.*, offices.Name_office as office FROM instaladores JOIN offices ON offices.Id = instaladores.Id_office;");

        $res = select($oCon, sql);
        if(is_array($res) == true)
        {
            if(count($res) > 0)
            {
                    foreach($res as $item)
                    {
                        echo '<div class="col-lg-12 col-xl-4">
                                <div class="card user-card">
                                    <div class="card-header-img">
                                        <img class="img-fluid img-circle"
                                            src="assets/images/user-card/card/installer.png"
                                            alt="card-img">
                                        <h4>'.$item["Nombre"].'</h4>
                                        <h5>'.$item["Cell"].'</h5>
                                        <h4>Instalador</h4>
                                        <h4>'.$item["office"].'</h4>
                                    </div>
                                </div>
                            </div>';
                    }
            }
        }

    }
    else
    {
        header("location: ../../login.html");
    }

?>