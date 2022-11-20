<?php

    if(isset($_GET))
    {
        include_once "connection.php";
        include_once "commands.php";

        $oCon = connect();
        $sql = "SELECT * FROM analyst";
        $res = select($oCon, $sql);

        foreach($res as $item)
        {

            $oficina = select($oCon, 'SELECT * FROM offices WHERE Id = '.$item["Id_office"]);

            echo '<div class="col-lg-12 col-xl-4">
            <div class="card user-card">
                <div class="">
                    <div class="card-header-img">
                        <img style="height: 200px; width: 200px; object-fit: cover;" class="img-fluid w-50 rounded-circle" src="backend/php/img-analist/'.$item["Foto"].'">
                    </div>
                    <h4>
                        '.$item["Name"].'
                    </h4>
                    <h5>
                        '.$item["Mail"].'
                    </h5>
                    <h5>
                        Oficina '.$oficina[0]["Name_office"].'
                    </h5>
                    <h4>Vendedor</h4>
                </div>
                
                <div class="set-btn">
                    <button type="button" class="btn btn-primary btn-outline-primary waves-effect waves-light m-r-15"><i class="icofont icofont-plus m-r-5" src="user-profile.html"> </i>Ver Clientes </button>
                    <button type="button" class="btn btn-success btn-outline-success waves-effect waves-light"><i class="icofont icofont-user m-r-5"></i>Ver Perfil</button>
                </div>
            </div>
            </div>';
        }
    }
?>