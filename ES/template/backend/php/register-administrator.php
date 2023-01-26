<?php

    session_start();
    if(!empty($_POST) && $_SESSION["rol"] == "1")
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
        $usuario = $_POST["usuario"];
        $usuario = trim($usuario);
        $clave = $_POST["clave"];
        $clave = trim($clave);
        $clave = encrypt($clave); 

        $nombre = trim($nombre);

            if(strlen($nombre) <= 100 AND strlen($correo) <= 50 AND strlen($celular) <= 20 AND strlen($carnet) <= 20 AND strlen($usuario) <= 50 AND strlen($clave) <= 300)
            {
                if($carnet == "")
                {
                    $sql = "INSERT INTO `administrators` (`Id`, `Name`, `Mail`, `Cell`, `Carnet`, `Id_rol`, `User`, `Password`) VALUES (NULL, '$nombre', '$correo', '$celular', NULL, '1', '$usuario', '$clave');";
                }
                else
                {
                    $sql = "INSERT INTO `administrators` (`Id`, `Name`, `Mail`, `Cell`, `Carnet`, `Id_rol`, `User`, `Password`) VALUES (NULL, '$nombre', '$correo', '$celular', '$carnet', '1', '$usuario', '$clave');";
                }

                $res = command($oCon, $sql);

                if($res == "Correct")
                {
                    echo "Registro completado exitosamente";
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
                    else if(str_contains($res, "for key 'Mail'"))
                    {
                        echo "Este correo ya existe";
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
        header("location: crm-contact.html");
    }

?>