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

            echo '<div class="col-lg-12 col-xl-4" style="min-width: 250px;>
            <div class="card user-card">
                <div style="word-wrap: break-word !important; overflow: hidden !important;" class="">
                    <div class="card-header-img" style="overflow: hidden; width: 200px; height: 200px; border: 2px solid #f2f2f2; border-radius: 50%; margin: auto auto;">
                        <img style="height: auto; width: 100%; object-fit: cover;" class="img-fluid" src="./assets/images/user-redondo.svg">
                    </div>
                    <h4 class="my-2 text-center">
                        '.$item["Name"].'
                    </h4>
                    <h5 class="text-center w-100" style="word-wrap: break-word !important; overflow: hidden !important;">
                        '.$item["Mail"].'
                    </h5>
                    <h5 class="text-center w-100">
                        Office '.$oficina[0]["Name_office"].'
                    </h5>
                    <h4 class="text-center my-3">Manager</h4>
                </div>
                
                <div class="set-btn" style="display: flex; justify-content: center;">
                    <a href="user-profile-manager.php?vmekmsi23xmfvwe155='.$item["Id"].'" class="btn btn-success btn-outline-success waves-effect waves-light"><i class="icofont icofont-user m-r-5"></i>View profile</a>
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