<?php

    if(!empty($_POST))
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
        $oficina = $_POST["oficina"];
        $oficina = trim($oficina);
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
                    $sql = "INSERT INTO `managers` (`Id`, `Name`, `Mail`, `Cell`, `Carnet`, `Id_office`, `Id_rol`, `User`, `Password`) VALUES (NULL, '$nombre', '$correo', '$celular', NULL, '$oficina', '2', '$usuario', '$clave');";
                }
                else
                {
                    $sql = "INSERT INTO `managers` (`Id`, `Name`, `Mail`, `Cell`, `Carnet`, `Id_office`, `Id_rol`, `User`, `Password`) VALUES (NULL, '$nombre', '$correo', '$celular', '$carnet', '$oficina', '2', '$usuario', '$clave');";                }

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
                    else if(str_contains($res, "for key 'Mail_2'"))
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