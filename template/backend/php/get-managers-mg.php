<?php

    if(isset($_GET))
    {
        include_once "connection.php";
        include_once "commands.php";

        $oCon = connect();
        $sql = "SELECT * FROM managers";
        $res = select($oCon, $sql);

        foreach($res as $item)
        {

            $oficina = select($oCon, 'SELECT * FROM offices WHERE Id = '.$item["Id_office"]);

            echo '<div class="col-lg-12 col-xl-4">
            <div class="card user-card">
                <div class="">
                    <div class="card-header-img" style="overflow: hidden; width: 200px; height: 200px; border: 2px solid #f2f2f2; border-radius: 50%; margin: auto auto;">
                        <img style="height: auto; width: 100%; object-fit: cover;" class="img-fluid" src="./assets/images/user-redondo.svg">
                    </div>
                    <h4 class="my-2">
                        '.$item["Name"].'
                    </h4>
                    <h5>
                        '.$item["Mail"].'
                    </h5>
                    <h5>
                        Oficina '.$oficina[0]["Name_office"].'
                    </h5>
                    <h4>Manager</h4>
                </div>
                
                <div class="set-btn">
                    <a href="user-profile-manager.php?vmekmsi23xmfvwe155='.$item["Id"].'" class="btn btn-success btn-outline-success waves-effect waves-light"><i class="icofont icofont-user m-r-5"></i>Ver Perfil</a>
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