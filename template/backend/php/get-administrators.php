<?php

    if(isset($_GET))
    {
        include_once "connection.php";
        include_once "commands.php";

        $oCon = connect();
        $sql = "SELECT * FROM administrators";
        $res = select($oCon, $sql);

        foreach($res as $item)
        {
            echo '<div class="col-lg-12 col-xl-4">
            <div class="card user-card">
                <div class="">
                    <h4 class="my-2">
                        '.$item["Name"].'
                    </h4>
                    <h5>
                        '.$item["Mail"].'
                    </h5>
                    <h4>Administrador</h4>
                </div>
                
                <div class="set-btn">
                    <button type="button" class="btn btn-primary btn-outline-primary waves-effect waves-light m-r-15"><i class="icofont icofont-plus m-r-5" src="user-profile.html"> </i>Ver Clientes </button>
                    <button type="button" class="btn btn-success btn-outline-success waves-effect waves-light"><i class="icofont icofont-user m-r-5"></i>Ver Perfil</button>
                </div>
            </div>
            </div>';
        }
    }
    else
    {
        header("location: crm-contact.html");
    }
?>