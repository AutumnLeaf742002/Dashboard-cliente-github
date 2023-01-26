<?php

    if(isset($_GET))
    {
        include_once "connection.php";
        include_once "commands.php";

        session_start();
        $oCon = connect();

        if($_SESSION["rol" ] == "2")
        {
            $id_m = $_SESSION["id"];
            $sql = "SELECT * FROM analyst WHERE Id_supervisor = $id_m";
        }
        else
        {
            $sql = "SELECT * FROM analyst";
        }

        $res = select($oCon, $sql);

        foreach($res as $item)
        {

            $oficina = select($oCon, 'SELECT * FROM offices WHERE Id = '.$item["Id_office"]);

            echo '<div class="col-lg-12 col-xl-4" style="min-width: 320px;">
            <div class="card user-card">
                <div style="word-wrap: break-word !important; overflow: hidden !important;" class="">
                    <div class="card-header-img" style="overflow: hidden; width: 200px; height: 200px; border: 2px solid #f2f2f2; border-radius: 50%; margin: auto auto;">
                        <img style="height: auto; width: 100%; object-fit: cover;" class="img-fluid" src="backend/php/img-analist/'.$item["Foto"].'">
                    </div>
                    <h4 class="my-2 text-center">
                        '.$item["Name"].'
                    </h4>
                    <h5 class="text-center w-100" style=" word-wrap: break-word !important; overflow: hidden !important;">
                        '.$item["Mail"].'
                    </h5>
                    <h5>
                        Oficina '.$oficina[0]["Name_office"].'
                    </h5>
                    <h4 class="text-center my-3">Seller</h4>
                </div>
                
                <div class="set-btn" style="display: flex; justify-content: center;">
                    <button onclick="go_edit_analist('.$item["Id"].')" type="button" class="btn btn-success btn-outline-success waves-effect waves-light"><i class="icofont icofont-user m-r-5"></i>VIEW PROFILE</button>
                </div>
            </div>
            </div>';
        }
    }
    else
    {
        header("location: ../../login.html");
    }
?>