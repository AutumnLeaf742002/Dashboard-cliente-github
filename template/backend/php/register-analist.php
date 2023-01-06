<?php

    $r = false;
    session_start();

    if($_SESSION["rol"] == "1" || $_SESSION["rol"] == "2")
    {
        $r = true;
    }


    if(!empty($_POST) && $r == true)
    {
        include_once "connection.php";
        include_once "commands.php";

        $oCon = connect();

        $nombre = $_POST["nombre"];
        $nombre = trim($nombre);
        $nombre = ucfirst($nombre);
        $correo = $_POST["correo"];
        $correo = trim($correo);
        $correo = strtolower($correo);
        $celular = $_POST["celular"];
        $celular = trim($celular);
        $carnet = $_POST["carnet"];
        $carnet = trim($carnet);
        $inicio = $_POST["inicio"];
        $inicio = trim($inicio);
        $reclutador = $_POST["reclutador"];
        $reclutador = trim($reclutador);
        $reclutador = ucfirst($reclutador);
        $oficina = $_POST["oficina"];
        $oficina = trim($oficina);
        $manager = $_POST["manager"];
        $manager = trim($manager);
        $usuario = $_POST["usuario"];
        $usuario = trim($usuario);
        $clave = $_POST["clave"];
        $clave = trim($clave);
        $clave = encrypt($clave);
        $foto = $_FILES["foto"];

        $n_foto = create_serie_n(70);

        if($foto["type"] == "image/jpeg" OR $foto["type"] == "image/jpg" OR $foto["type"] == "image/png")
        {
            $fotoDB = $n_foto.'-'.$foto["name"];

            if(strlen($nombre) <= 100 AND strlen($correo) <= 50 AND strlen($celular) <= 20 AND strlen($carnet) <= 20 AND strlen($inicio) <= 50 AND strlen($reclutador) <= 100 AND strlen($usuario) <= 50 AND strlen($clave) <= 300)
            {
                if($carnet == "")
                {
                    $sql = "INSERT INTO `analyst` (`Id`, `Name`, `Mail`, `Cell`, `Carnet`, `Start_date`, `Recruiter`, `Id_office`, `Id_supervisor`, `Id_rol`, `Comision`, `User`, `Password`, `Foto`) VALUES (NULL, '$nombre', '$correo', '$celular', NULL, '$inicio', '$reclutador', '$oficina', '$manager', '3', NULL, '$usuario', '$clave', '$fotoDB');";
                }
                else
                {
                    $sql = "INSERT INTO `analyst` (`Id`, `Name`, `Mail`, `Cell`, `Carnet`, `Start_date`, `Recruiter`, `Id_office`, `Id_supervisor`, `Id_rol`, `Comision`, `User`, `Password`, `Foto`) VALUES (NULL, '$nombre', '$correo', '$celular', '$carnet', '$inicio', '$reclutador', '$oficina', '$manager', '3', NULL, '$usuario', '$clave', '$fotoDB');";
                }

                $res = command($oCon, $sql);

                if($res == "Correct")
                {
                    echo "Registro completado exitosamente";

                    $ruta = 'img-analist/'.$n_foto.'-'.$foto["name"];
                    move_uploaded_file($foto["tmp_name"], $ruta);
                }
                else
                {
                    if(str_contains($res, "for key 'User'"))
                    {
                        echo "Este usuario ya existe";
                    }
                    else if(str_contains($res, "for key 'Cell'"))
                    {
                        echo "Este celular ya existe";
                    }
                    else if(str_contains($res, "for key 'Carnet'"))
                    {
                        echo "Este carnet ya existe";
                    }
                    else if(str_contains($res, "for key 'Mail_2'"))
                    {
                        echo "Este correo ya existe";
                    }
                    else if(str_contains($res, "for key 'Foto'"))
                    {
                        echo "A ocurrido un error con la foto, por favor seleccionela otra ves";
                    }
                    else
                    {
                        echo "Error desconocido $res";
                    }
                }
            }
        }
        else
        {
            echo "El archivo seleccionado no es una imagen, asegurate que la imagen sea de extension jepg, jpg o png";
        }
    }
    else
    {
        header("location: crm-contact.html");
    }

?>