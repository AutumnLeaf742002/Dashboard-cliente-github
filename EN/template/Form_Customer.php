<?php
    
        include_once "backend/php/connection.php";
        include_once "backend/php/commands.php";

        session_start();
        $id_logued = $_SESSION["id"];
        $rol_logued = $_SESSION["rol"];

        $oCon = connect();
        
        if($rol_logued == "1")
        {
            $sql = "SELECT * FROM analyst ORDER BY Name";
        }
        else if($rol_logued == "2")
        {
            $res_o_m = select($oCon, "SELECT Id_office FROM managers WHERE Id = $id_logued");
            $office_actual = $res_o_m[0]["Id_office"];

            $sql = "SELECT * FROM analyst WHERE Id_office = $office_actual ORDER BY Name";
        }
        else if($rol_logued == "3")
        {
            $sql = "SELECT * FROM analyst WHERE Id = $id_logued ORDER BY Name";
        }

        $res = select($oCon, $sql);
        
    ?>

<!DOCTYPE html>
<html lang="es">
    
<head>
    <script src="backend/js/session.js"></script>
    <title>Dashboard</title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Flat ui, Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="../../../../css.css?family=Mada:300,400,500,600,700" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="../bower_components/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <!-- flag icon framework css -->
    <link rel="stylesheet" type="text/css" href="assets/pages/flag-icon/flag-icon.min.css">
    <!-- Menu-Search css -->
    <link rel="stylesheet" type="text/css" href="assets/pages/menu-search/css/component.css">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="assets/pages/multi-step-sign-up/css/reset.min.css">
    <link rel="stylesheet" href="assets/pages/multi-step-sign-up/css/style.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- color .css -->
    <link rel="stylesheet" href="minimum-caracters.css">
</head>

<body class="multi-step-sign-up">

    <!-- Notificaciones -->

    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="../bower_components/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
   <!-- notify js Fremwork -->
    <link rel="stylesheet" type="text/css" href="../bower_components/pnotify/css/pnotify.css">
    <link rel="stylesheet" type="text/css" href="../bower_components/pnotify/css/pnotify.brighttheme.css">
    <link rel="stylesheet" type="text/css" href="../bower_components/pnotify/css/pnotify.buttons.css">
    <link rel="stylesheet" type="text/css" href="assets/pages/pnotify/notify.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--color css-->

    <!-- css para las notificaciones -->
    <link rel="stylesheet" href="alerts.css">

    <div class="card-block table-border-style container-notificaciones">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    
                    <!-- Notificacion aviso principal -->
                    <div class="brighttheme ui-pnotify-container brighttheme-notice ui-pnotify-shadow n-personal" id="n-personal-1" role="alert"
                        style="min-height: 16px;">
                        <div class="ui-pnotify-closer" aria-role="button" tabindex="0" title="Cerca"
                            style="cursor: pointer; visibility: hidden;">
                            <span class="brighttheme-icon-closer"></span>
                        </div>
                        <div class="ui-pnotify-sticker" aria-role="button" aria-pressed="false" tabindex="0" title="Stick"
                            style="cursor: pointer; visibility: hidden;">
                            <span class="brighttheme-icon-sticker" aria-pressed="false"></span>
                        </div>
                        <div class="ui-pnotify-icon"><span class="icofont icofont-info-circle"></span>
                        </div>
                        <button id="btn-n-personal-1" class="close" aria-label="close"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                            </svg>
                        </button>
                        <h4 class="ui-pnotify-title">
                            <font style="vertical-align: inherit;">
                                <font" style="vertical-align: inherit;">Aviso!</font>
                            </font>
                        </h4>
                        <div class="ui-pnotify-text" aria-role="alert">
                            <font style="vertical-align: inherit;">
                                <font id="mensaje-aviso-1" style="vertical-align: inherit;">Mensaje de aviso.</font>
                            </font>
                        </div>
                        <div class="ui-pnotify-action-bar" style="margin-top: 5px; clear: both; text-align: right; display: none;">
                    
                        </div>
                    </div>

                    <!-- Notificacion aviso de informacion -->
                    <div class="brighttheme ui-pnotify-container brighttheme-info ui-pnotify-shadow n-personal" id="n-personal-2" role="alert" style="min-height: 16px;">
                        <div class="ui-pnotify-closer" aria-role="button" tabindex="0" title="Cerca"
                            style="cursor: pointer; visibility: hidden;"><span class="brighttheme-icon-closer"></span>
                        </div>
                        <div class="ui-pnotify-sticker" aria-role="button" aria-pressed="false" tabindex="0" title="Stick"
                            style="cursor: pointer; visibility: hidden;"><span class="brighttheme-icon-sticker" aria-pressed="false"></span>
                        </div>
                        <div class="ui-pnotify-icon"><span class="icofont icofont-info-circle"></span>
                        </div>
                        <button id="btn-n-personal-2" class="close" aria-label="close"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                            </svg>
                        </button>
                        <h4 class="ui-pnotify-title">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Hecho!</font>
                            </font>
                        </h4>
                        <div class="ui-pnotify-text" aria-role="alert">
                            <font style="vertical-align: inherit;">
                                <font id="mensaje-aviso-2" style="vertical-align: inherit;">Mensaje de aviso.</font>
                            </font>
                        </div>
                        <div class="ui-pnotify-action-bar" style="margin-top: 5px; clear: both; text-align: right; display: none;">
                        </div>
                    </div>

                    <!-- Notificacion aviso de peligro -->
                    <div class="brighttheme ui-pnotify-container brighttheme-error ui-pnotify-shadow n-personal" id="n-personal-3" role="alert"
                        style="min-height: 16px;">
                        <div class="ui-pnotify-closer" aria-role="button" tabindex="0" title="Cerca"
                            style="cursor: pointer; visibility: hidden;">
                            <span class="brighttheme-icon-closer">
                    
                            </span>
                        </div>
                        <div class="ui-pnotify-sticker" aria-role="button" aria-pressed="false" tabindex="0" title="Stick"
                            style="cursor: pointer; visibility: hidden;">
                            <span class="brighttheme-icon-sticker" aria-pressed="false">
                    
                            </span>
                        </div>
                        <div class="ui-pnotify-icon">
                            <span class="icofont icofont-info-circle"></span>
                        </div>
                        <button id="btn-n-personal-3" class="close" aria-label="close"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                            </svg>
                        </button>
                        <h4 class="ui-pnotify-title">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Peligro</font>
                            </font>
                        </h4>
                        <div class="ui-pnotify-text" aria-role="alert">
                            <font style="vertical-align: inherit;">
                                <font id="mensaje-aviso-3" style="vertical-align: inherit;">Mensaje de aviso.</font>
                            </font>
                        </div>
                        <div class="ui-pnotify-action-bar" style="margin-top: 5px; clear: both; text-align: right; display: none;">
                        </div>
                    </div>

                </tbody>
            </table>
        </div>    
    </div>

    <!-- Notificaciones -->


    <form id="msform">
        <!-- progressbar -->
        <ul id="progressbar">
            <li class="active">Información del cliente</li>
            <li>Información de empleo e ingresos</li>
            <li>INFORMACIÓN DE LA HIPOTECA</li>
            <li>co-aplicante</li>
        </ul>
        <!-- fieldsets -->
        <!-- type text para escribir -->
        <!-- type password para contrasenas -->
        <fieldset style="position: relative;">
            <div style="position: absolute; top: 1%; left: 4%; cursor: pointer" title="Volver atras">
                <a style="text-decoration: none; color: black;" href="clientes.html">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                </a>
            </div>
            <img class="logo" src="assets/images/pasteur.png" alt="logo.png">
            
            <h3 class="fs-subtitle">Register a new customer</h3>
            <h5  class="fs-subtitle" style="display: inline;">The fields marked with<h5 style="color: red; display: inline;">*</h5>They are mandatory</h5>
            <br>
            </br>
            <div class="input-group">
                <input minlength="1" maxlength="50" id="cl_cantidad_financiada" type="text" class="cl_invalid form-control required" name="Primer_nombre" placeholder=" ">
                <label for="">Amount financed</label>
            </div>
            <div class="input-group">
                <select id="cl_nombre_representante" type="text" class="form-control form-personal cl_invalid" name="Primer_nombre">
                    <?php

                        foreach($res as $item)
                        {
                            $dwdsdw = select($oCon, 'SELECT Name_office FROM offices WHERE Id = '.$item["Id_office"]);
                            
                            echo '<option value="'.$item["Id"].'">'.$item["Name"].' - OFICINA: '.$dwdsdw[0]["Name_office"].'</option>';
                        }
                    
                    ?>
                </select>
            </div>
            <div class="input-group">
                <input minlength="1" maxlength="100" id="cl_1" type="text" class="cl_invalid form-control required" name="Primer_nombre" placeholder=" ">
                <label for="">First name</label>
            </div>
            <div class="input-group">
                <input minlength="1" maxlength="100" id="cl_2" type="text" class="cl_invalid form-control required" name="Apellido" placeholder=" ">
                <label for="">Last name</label>
            </div>   
            <div class="input-group">
                <input minlength="8" maxlength="8" id="cl_3" type="date" class="cl_invalid form-control required" name="Fecha de nacimiento" placeholder=" ">
                <label for="">Date of birth</label>
            </div> 
            
            <div class="input-group">
                <input minlength="8" maxlength="30" id="cl_4" type="text" class="form-control required" name="N_seguro_social" placeholder=" ">
                <label for="">Social Security number</label>
            </div>
            <div class="input-group">
                <!-- Opcional -->
                <input minlength="5" maxlength="30" id="cl_5" type="text" class="form-control" name="N_licencia_conducir" placeholder=" ">
                <label for="">Driver's license number</label>
            </div>
            <div class="input-group">
                <input minlength="1" maxlength="50" id="cl_6" type="text" class="cl_invalid form-control required" name="Estado" placeholder=" ">
                <label for="">Condition</label>
            </div>
            <div style="display: flex; flex-direction:column;" class="input-group">
                <input minlength="8" maxlength="8" id="cl_8" style="width: 100%;" type="date" class="cl_invalid form-control required" name="Vencimiento" placeholder=" ">
                <label for="">Expiration</label>
            </div>
            <div class="input-group">
                <input minlength="1" maxlength="300" id="cl_9" type="text" class="cl_invalid form-control required" name="Direccion " placeholder=" ">
                <label for="">Direction</label>
            </div>
            <div style="display: flex; flex-direction:column;" class="input-group">
                <input minlength="1" maxlength="50" id="cl_10" style="width: 100%;" type="text" class="cl_invalid form-control required" name="Cuanto_tiempo" placeholder=" ">
                <label for="">How long?</label>
            </div>
            <div class="input-group">
                <input minlength="1" maxlength="50" id="cl_11" type="text" class="cl_invalid form-control required" name="Ciudad" placeholder=" ">
                <label for="">City</label>
            </div>
            <div class="input-group">
                <input minlength="1" maxlength="50" id="cl_12" type="text" class="cl_invalid form-control required" name="Estado_ciudad" placeholder=" ">
                <label for="">State</label>
            </div>
            <div class="input-group">
                <input minlength="1" maxlength="30" id="cl_13" type="text" class="cl_invalid form-control required" name="Zip" placeholder=" ">
                <label for="">Zip</label>
            </div>
            <div class="input-group">
                <!-- Opcional -->
                <input minlength="10" maxlength="20"  id="cl_14" type="text" class="form-control" name="Telefono_casa" placeholder=" ">
                <label for="">home phone</label>
            </div>
            <div class="input-group">
                <input minlength="10" maxlength="20" id="cl_15" type="text" class="cl_invalid form-control required" name="Telefono_celular" placeholder=" ">
                <label for="">Cell phone</label>
            </div>
            <div class="input-group">
                <!-- Opcional -->
                <input minlength="1" maxlength="300" id="cl_16" type="text" class="form-control" name="Direccion_anterior" placeholder=" ">
                <label for="">Previous address (if it takes less than 3 years)</label>
            </div>
            <div class="input-group">
                <!-- Opcional -->
                <input minlength="1" maxlength="50" id="cl_17" type="text" class="form-control" name="Ciudad_anterior" placeholder=" ">
                <label for="">City</label>
            </div>
            <div class="input-group">
                <!-- Opcional -->
                <input minlength="1" maxlength="50" id="cl_18" type="text" class="form-control" name="Estado_anterior" placeholder=" ">
                <label for="">State</label>
            </div>
            <div class="input-group">
                <!-- Opcional -->
                <input minlength="1" maxlength="30" id="cl_19" type="text" class="form-control" name="Zip_anterior" placeholder=" ">
                <label for="">Zip</label>
            </div>
            <div class="input-group">
                <input minlength="1" maxlength="50" id="cl_20" type="text" class="cl_invalid form-control required" name="Correo" placeholder=" ">
                <label for="">Email</label>
            </div>
            <button type="button" name="next" class="btn btn-primary next" value="Next">Next</button>
        </fieldset>
        <fieldset>
            <img class="logo" src="assets/images/auth/logo.png" alt="logo.png">
            <h2 class="fs-title">Employment and income information</h2>
            <div class="input-group">
                <input minlength="1" maxlength="50" id="cl_21" type="text" class="cl_invalid form-control required" name="Nombre_empleo" placeholder=" ">
                <label for="">Job name</label>
            </div>
            <div class="input-group">
                <input minlength="1" maxlength="300" id="cl_22" type="text" class="cl_invalid form-control required" name="Direccion_empleo" placeholder=" ">
                <label for="">Direction</label>
            </div>
            <div style="display: flex; flex-direction:column;" class="input-group">
                <input minlength="1" maxlength="50" id="cl_23" style="width: 100%;" type="text" class="cl_invalid form-control required" name="Tiempo_empleo" placeholder=" ">
                <label for="">years of employment</label>
            </div>
            <div class="input-group">
                <input minlength="10" maxlength="20" id="cl_24" type="text" class="cl_invalid form-control required" name="N_telefono_empleo_anterio" placeholder=" ">
                <label for="">employment phone</label>
            </div>
            <div class="input-group">
                <input minlength="1" maxlength="50" id="cl_25" type="text" class="cl_invalid form-control required" name="Posicion_empleo" placeholder=" ">
                <label for="">Position</label>
            </div>
            <div class="input-group">
                <input minlength="1" maxlength="50" id="cl_26" type="text" class="cl_invalid form-control required" name="Ingreso_bruto" placeholder=" ">
                <label for="">Gross income</label>
            </div>
            <div class="input-group">
                <select id="cl_27" type="text" class="cl_invalid form-control required" name="Tipo_ingreso" placeholder=" ">
                <label for="">Type of income</label>
                    <option selected value="">
                    select type of income *(Required)
                    </option>
                    <option value="Mensual">
                    Monthly
                    </option>   
                    <option value="Anual">
                    Annual
                    </option>
                </select>
            </div>
            <div class="input-group">
                <!-- Opcional -->
                <input minlength="1" maxlength="100" id="cl_28" type="text" class="form-control" name="Empleador_anterior" placeholder="Previous employer (if less than 3 years old)">
            </div>
            <div style="display: flex; flex-direction:column;" class="input-group">
                <input minlength="1" maxlength="30" id="cl_29" style="width: 100%;" type="text" class="cl_invalid form-control required" name="fechas de empleo" placeholder=" ">
                <label for="">Dates of employment</label>
            </div>

            <div class="input-group">
                <input minlength="1" maxlength="100" id="cl_30" type="text" class="cl_invalid form-control required" name="Ciudad_empleo_anterior" placeholder=" ">
                <label for="">City</label>
            </div>

            <div class="input-group">
                <input minlength="1" maxlength="100" id="cl_31" type="text" class="cl_invalid form-control required" name="Estado_empleo_anterior" placeholder=" ">
                <label for="">State</label>
            </div>

            <div class="input-group">
                <input minlength="1" maxlength="30" id="cl_32" type="text" class="cl_invalid form-control required" name=" Zip_empleo_anterior" placeholder=" ">
                <label for="">Zip</label>
            </div>
            <div class="input-group">
                <!-- Opcional -->
                <input minlength="10" maxlength="20" id="cl_33" type="text" class="form-control" title=" SI TIENE MENOS DE 3 AÑOS" name=" N_telefono_empleo_anterio" placeholder=" ">
                <label for="">Telephone number of previous employment</label>
            </div>
            <div class="alpaca6" style="margin-bottom: 15px;">
                <a style="color: orange;">Separate alimony or child support is optional information and does not have to be reported if you do not elect to rely on that income on your credit application.
                    - can be empty</a>
            </div>
            <div class="input-group">
                <!-- Opcional -->
                <input minlength="1" maxlength="100" id="cl_34" type="text" class="form-control" title="LA PENSIÓN ALIMENTICIA O MANUTENCIÓN DE MENORES POR SEPARADO SON INFORMACIÓNES OPCIONALES." name="Fuente_ingreso_extra" placeholder="Otras fuentes de ingreso" >
            </div>
            <div class="input-group">
                <!-- Opcional -->
                <input minlength="1" maxlength="50" id="cl_35" type="text" class="form-control" title="LA PENSIÓN ALIMENTICIA O MANUTENCIÓN DE MENORES POR SEPARADO SON INFORMACIÓNES OPCIONALES." name="Cantidad_fuente_ingreso_extra" placeholder=" ">
                <label for="">Extra income amount</label>
            </div>
            <button type="button" name="previous" class="btn btn-inverse btn-outline-inverse previous" value="Previous">Previous</button>
            <button type="button" name="next" class="btn btn-primary next" value="Next">Next</button>
        </fieldset>
        <fieldset>
            <img class="logo" src="assets/images/auth/logo.png" alt="logo.png">
            <h3 class="fs-subtitle">MORTGAGE INFORMATION AND REFERENCES</h3>
            <div class="input-group">
                <!-- Opcional -->
                <select id="cl_36" type="text" class="form-control" name="Id_hipoteca_estado" placeholder=" ">
                    <option selected value="6">
                    Select Mortgage Status
                    </option>
                    <option value="1">
                    Paid
                    </option>
                    <option value="2">
                    Mortgaged
                    </option>
                    <option value="3">
                    Rented
                    </option>
                </select>
            </div>
            <div class="input-group">
                <!-- Opcional -->
                <select id="cl_37" type="text" class="form-control" name="Id_tipo_residencia_hipoteca" placeholder=" ">
                    <option selected value="6">
                    Select Mortgage Residence Type
                    </option>
                    <option value="1">
                    House
                    </option>
                    <option value="2">
                    Department
                    </option>
                    <option value="3">
                    Condominium
                    </option>
                    <option value="4">
                    Movil House
                    </option>
                </select>
            </div>
            <div class="input-group">
                <!-- Opcional -->
                <input minlength="1" maxlength="100" id="cl_38" type="text" class="form-control" name="Direccion_hipoteca" placeholder=" ">
                <label for="">Direction</label>
            </div>
            <div class="input-group">
                <!-- Opcional -->
                <input minlength="1" maxlength="100" id="cl_39" type="text" class="form-control" name="PROPIETARIO_O_HIPOTECA_TITULAR" placeholder=" ">
                <label for="">Owner or holder mortgage</label>
            </div>
            <div class="input-group">
                <!-- Opcional -->
                <input minlength="1" maxlength="30" id="cl_40" type="text" class="form-control" name="Pago_hipoteca" placeholder=" ">
                <label for="">Mortgage payment</label>
            </div>
            <div class="input-group">
                <!-- Opcional -->
                <input minlength="10" maxlength="30" id="cl_41" type="text" class="form-control" name="N_telefono_hipoteca" placeholder=" ">
                <label for="">Número de telefono de hipoteca</label>
            </div>


            <div class="alpaca6" style="margin-bottom: 15px;">
                <a>REFERENCES</a>
            </div>
            <div class="input-group">
                <input minlength="1" maxlength="100" id="cl_42" type="text" class="cl_invalid form-control required" name=" Referencia_pariente_nombre_1" placeholder=" ">
                <label for="">(1) Name of close relative</label>
            </div>
            <div class="input-group">
                <input minlength="1" maxlength="300" id="cl_43" type="text" class="cl_invalid form-control required" name="Referencia_pariente_direccion_1" placeholder=" ">
                <label for="">(1) Next of kin address</label>
            </div>
            <div class="input-group">
                <input minlength="10" maxlength="20" id="cl_44" type="text" class="cl_invalid form-control required" name=" Referencia_pariente_telefono_1" placeholder=" ">
                <label for="">(1) next of kin phone number</label>
            </div>
            <div class="input-group">
                <input minlength="1" maxlength="50" id="cl_45" type="text" class="cl_invalid form-control required" name="Referencia_pariente_relacion_1" placeholder=" ">
                <label for="">(1) Close relative relationship</label>
            </div>
            <div class="input-group">
                <input minlength="1" maxlength="100" id="cl_46" type="text" class="form-control" name="Referencia_pariente_nombre_2" placeholder=" ">
                <label for="">(2) Name of close relative</label>
            </div>
            <div class="input-group">
                <input minlength="1" maxlength="300" id="cl_47" type="text" class="form-control" name="Referencia_pariente_direccion_2" placeholder=" ">
                <label for="">(2) Next of kin address</label>
            </div>
            <div class="input-group">
                <input minlength="10" maxlength="20" id="cl_48" type="text" class="form-control" name="Referencia_pariente_telefono_2" placeholder=" ">
                <label for="">(2) Telephone number of next of kin</label>
            </div>
            <div class="input-group">
                <input minlength="1" maxlength="50" id="cl_49" type="text" class="form-control" name="Referencia_pariente_relacion_2" placeholder=" ">
                <label for="">(2) Relationship of close relative</label>
            </div>
            <div style="display: flex; flex-direction:column;" class="input-group">
                <input minlength="8" maxlength="8" id="cl_50" style="width: 100%;" type="date" class="cl_invalid form-control required" name="fecha_creacion_registro" placeholder=" ">
                <label for="">Record creation date</label>
            </div>
            <div class="alpaca6" style="margin-bottom: 15px;">
                <a>Application with co-applicant?</a>
            </div>
            <div class="cl_invalid alpaca1">
                <select id="cl_51" class="cl_invalid alpaca-control form-control" name="">
                    <option value="">To select</option> 
                    <option value="si">Yes</option>
                    <option value="no">Not</option>
                </select>
            </div>
            <div class="alpaca6" style="margin-bottom: 15px;">
            </div>
            <button type="button" name="previous" class="btn btn-inverse btn-outline-inverse previous" value="Previous">Anterior</button>
            <button type="button" name="next" class="btn btn-primary next" value="Next">Next</button>
        </fieldset>
        <fieldset>
            <img class="logo" src="assets/images/auth/logo.png" alt="logo.png">
            <h2 class="fs-title">CO-APPLICANT Information</h2>
            <div class="alpaca6" style="margin-bottom: 15px;">
                <a style="color: orange;">Fill these fields only if applicable</a>
            </div>
            <div class="input-group">
                <input minlength="1" maxlength="100" id="co_1" type="text" class="co_invalid form-control required" name="Relacion_del_solicitante" placeholder=" ">
                <label for="">Applicant Relationship</label>
            </div>
            <div class="input-group">
                <input minlength="1" maxlength="100" id="co_2" type="text" class="co_invalid form-control required" name="Primer_nombre" placeholder=" ">
                <label for="">First name</label>
            </div>
            <div class="input-group">
                <input minlength="1" maxlength="100" id="co_3" type="text" class="co_invalid form-control required" name="Apellido" placeholder=" ">
                <label for="">Last name</label>
            </div>
            <div class="input-group">
                <input minlength="8" maxlength="8" id="co_4" type="date" class="co_invalid form-control required" name="Fecha de nacimiento" placeholder=" ">
                <label for="">Date of birth</label>
            </div> 
            <div class="input-group">
                <input minlength="8" maxlength="30" id="co_5" type="text" class="co_invalid form-control required" name="N_seguro_social" placeholder=" ">
                <label for="">Social Security number</label>
            </div>
            <div class="input-group">
                <!-- Opcional -->
                <input minlength="5" maxlength="30" id="co_6" type="text" class="form-control" name="N_licencia_conducir" placeholder=" ">
                <label for="">Driver's license number</label>
            </div>
            <div class="input-group">
                <input minlength="1" maxlength="50" id="co_7" type="text" class="co_invalid form-control required" name="Estado" placeholder=" ">
                <label for="">Condition</label>
            </div>
            <div style="display: flex; flex-direction:column;" class="input-group">
                <input minlength="8" maxlength="8" id="co_9" style="width: 100%;" type="date" class="co_invalid form-control required" name="Vencimiento" placeholder=" ">
                <label for="">Expiration</label>
            </div>
            <div class="input-group">
                <input minlength="1" maxlength="300" id="co_10" type="text" class="co_invalid form-control required" name="Direccion " placeholder=" ">
                <label for="">Address</label>
            </div>
            <div style="display: flex; flex-direction:column;" class="input-group">
                <input minlength="1" maxlength="50" id="co_11" style="width: 100%;" type="text" class="co_invalid form-control required" name="Cuanto_tiempo" placeholder=" ">
                <label for="">How long?</label>
            </div>
            <div class="input-group">
                <input minlength="1" maxlength="50" id="co_12" type="text" class="co_invalid form-control required" name="Ciudad" placeholder="  ">
                <label for="">City</label>
            </div>
            <div class="input-group">
                <input minlength="1" maxlength="50" id="co_13" type="text" class="co_invalid form-control required" name="Estado_ciudad" placeholder=" ">
                <label for="">State</label>
            </div>
            <div class="input-group">
                <input minlength="1" maxlength="30" id="co_14" type="text" class="co_invalid form-control required" name="Zip" placeholder=" ">
                <label for="">Zip</label>
            </div>
            <div class="input-group">
                <!-- Opcional -->
                <input minlength="10" maxlength="20"  id="co_15" type="text" class="form-control" name="Telefono_casa" placeholder=" ">
                <label for="">home phone</label>
            </div>
            <div class="input-group">
                <input minlength="10" maxlength="20" id="co_16" type="text" class="co_invalid form-control required" name="Telefono_celular" placeholder=" ">
                <label for="">Cell phone</label>
            </div>
            <div class="input-group">
                <!-- Opcional -->
                <input minlength="1" maxlength="300" id="co_17" type="text" class="form-control" name="Direccion_anterior" placeholder=" ">
                <label for="">Previous address (if it takes less than 3 years)</label>
            </div>
            <div class="input-group">
                <!-- Opcional -->
                <input minlength="1" maxlength="50" id="co_18" type="text" class="form-control" name="Ciudad_anterior" placeholder=" ">
                <label for="">City</label>
            </div>
            <div class="input-group">
                <!-- Opcional -->
                <input minlength="1" maxlength="50" id="co_19" type="text" class="form-control" name="Estado_anterior" placeholder=" ">
                <label for="">state</label>
            </div>
            <div class="input-group">
                <!-- Opcional -->
                <input minlength="1" maxlength="30" id="co_20" type="text" class="form-control" name="Zip_anterior" placeholder=" ">
                <label for="">Zip</label>
            </div>
            <div class="input-group">
                <input minlength="1" maxlength="50" id="co_21" type="text" class="co_invalid form-control required" name="Correo" placeholder=" ">
                <label for="">Email</label>
            </div>

            <h2 class="fs-title">Employment and income information</h2>

            <div class="input-group">
                <input minlength="1" maxlength="50" id="co_22" type="text" class="co_invalid form-control required" name="Nombre_empleo" placeholder=" ">
                <label for="">Job name</label>
            </div>
            <div class="input-group">
                <input minlength="1" maxlength="300" id="co_23" type="text" class="co_invalid form-control required" name="Direccion_empleo" placeholder=" ">
                <label for="">Address</label>
            </div>
            <div style="display: flex; flex-direction:column;" class="input-group">
                <input minlength="1" maxlength="50" id="co_24" style="width: 100%;" type="text" class="co_invalid form-control required" name="Tiempo_empleo" placeholder=" ">
                <label for="">years of employment</label>
            </div>
            <div class="input-group">
                <input minlength="10" maxlength="20" id="co_25" type="text" class="co_invalid form-control required" name=" N_telefono_empleo_anterio" placeholder=" ">
                <label for="">employment phone</label>
            </div>
            <div class="input-group">
                <input minlength="1" maxlength="50" id="co_26" type="text" class="co_invalid form-control required" name="Posicion_empleo" placeholder=" ">
                <label for="">Position</label>
            </div>
            <div class="input-group">
                <input minlength="1" maxlength="50" id="co_27" type="text" class="co_invalid form-control required" name="Ingreso_bruto" placeholder=" ">
                <label for="">gross income</label>
            </div>
            <div class="input-group">
                <select id="co_28" type="text" class="co_invalid form-control" name="Tipo_ingreso required" placeholder=" ">
                    
                    <option selected value="default">
                    select type of income
                    </option>
                    <option value="Mensual">
                    Monthly
                    </option>
                    <option value="Anual">
                        Anual
                    </option>
                </select>
            </div>
            <div class="input-group">
                <!-- Opcional -->
                <input minlength="1" maxlength="100" id="co_29" type="text" class="form-control" name="Empleador_anterior" placeholder="Empleador anterior (si tiene menos de 3 años)">
            </div>
            <div style="display: flex; flex-direction:column;" class="input-group">
                <input minlength="1" maxlength="30" id="co_30" style="width: 100%;" type="text" class="co_invalid form-control required" name="fechas de empleo" placeholder="Fechas de empleo">
            </div>
            <!-- Opcional -->
            <div class="input-group">
                <input minlength="1" maxlength="100" id="co_31" type="text" class="co_invalid form-control required" name="Ciudad_empleo_anterior" placeholder="Ciudad">
            </div>
            <!-- Opcional -->
            <div class="input-group">
                <input minlength="1" maxlength="100" id="co_32" type="text" class="co_invalid form-control required" name="Estado_empleo_anterior" placeholder="Estado">
            </div>
            <!-- Opcional -->
            <div class="input-group">
                <input minlength="1" maxlength="30" id="co_33" type="text" class="co_invalid form-control required" name=" Zip_empleo_anterior" placeholder="Zip">
            </div>
            <div class="input-group">
                <!-- Opcional -->
                <input minlength="10" maxlength="20" id="co_34" type="text" class="form-control" title=" SI TIENE MENOS DE 3 AÑOS" name=" N_telefono_empleo_anterio" placeholder="Número de telefono del empleo anterio">
            </div>
            <div class="alpaca6" style="margin-bottom: 15px;">
                <a style="color: orange;">Separate alimony or child support is optional information and does not have to be reported if you do not elect to rely on that income on your credit application.
                     - can be empty</a>
            </div>
            <div class="input-group">
                <!-- Opcional -->
                <input minlength="1" maxlength="100" id="co_35" type="text" class="form-control" title="LA PENSIÓN ALIMENTICIA O MANUTENCIÓN DE MENORES POR SEPARADO SON INFORMACIÓNES OPCIONALES." name="Fuente_ingreso_extra" placeholder="Otras fuentes de ingreso" >
            </div>
            <div class="input-group">
                <!-- Opcional -->
                <input minlength="1" maxlength="50" id="co_36" type="text" class="form-control" title="LA PENSIÓN ALIMENTICIA O MANUTENCIÓN DE MENORES POR SEPARADO SON INFORMACIÓNES OPCIONALES." name="Cantidad_fuente_ingreso_extra" placeholder="$ Mensual">
            </div>
            <div class="alpaca6" style="margin-bottom: 15px;">
                <a>Select an avatar</a>
            </div>
            
            <div class="alpaca6" style="margin-bottom: 15px;">
                <div class=" avatar_invalid container-avatars">
                    <div class="container-4-avatar">
                        <img onclick="quitar_borde()" id="a-1" value="a1" src="Avatars/avatar-1.svg" alt="avatar-1" class="img-avatar-customer" id="avatar-1">
                        <img onclick="quitar_borde()" id="a-2" value="a2" src="Avatars/avatar-2.svg" alt="avatar-2" class="img-avatar-customer" id="avatar-2">
                        <img onclick="quitar_borde()" id="a-3" value="a3" src="Avatars/avatar-3.svg" alt="avatar-3" class="img-avatar-customer" id="avatar-3">
                        <img onclick="quitar_borde()" id="a-4" value="a4" src="Avatars/avatar-4.svg" alt="avatar-4" class="img-avatar-customer" id="avatar-4">
                    </div>
                    <div class="container-4-avatar">
                        <img onclick="quitar_borde()" id="a-5" value="a5" src="Avatars/avatar-5.svg" alt="avatar-5" class="img-avatar-customer" id="avatar-5">
                        <img onclick="quitar_borde()" id="a-6" value="a6" src="Avatars/avatar-6.svg" alt="avatar-6" class="img-avatar-customer" id="avatar-6">
                        <img onclick="quitar_borde()" id="a-7" value="a7" src="Avatars/avatar-7.svg" alt="avatar-7" class="img-avatar-customer" id="avatar-7">
                        <img onclick="quitar_borde()" id="a-8" value="a8" src="Avatars/avatar-8.svg" alt="avatar-8" class="img-avatar-customer" id="avatar-8">
                    </div>
                </div>
            </div>

            <button type="button" name="previous" class="btn btn-inverse btn-outline-inverse previous" value="Previous">Previous</button>
            <button id="btn-enviar-customer" type="button" name="next" class="btn btn-success waves-effect" value="submit">Enviar</button>
        </fieldset>
    </form>
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="../bower_components/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="../bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="../bower_components/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="../bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="../bower_components/modernizr/js/modernizr.js"></script>
    <script type="text/javascript" src="../bower_components/modernizr/js/css-scrollbars.js"></script>
    <!-- classie js -->
    <script type="text/javascript" src="../bower_components/classie/js/classie.js"></script>
    <script src='../../../../ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
    <script src="assets/pages/multi-step-sign-up/js/main.js"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="../bower_components/i18next/js/i18next.min.js"></script>
    <script type="text/javascript" src="../bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="../bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="../bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
    <script src="backend/js/register-customer.js"></script>
    <script src="alerts.js"></script>
    <script src="quitar-label.js"></script>

</body>

</html>
