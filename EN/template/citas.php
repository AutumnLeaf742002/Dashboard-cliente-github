<?php

    error_reporting(E_ERROR);

    include_once "backend/php/connection.php";
    include_once "backend/php/commands.php";
    $oCon = connect();
    session_start();

    $id_logued = $_SESSION["id"];
    $rol_logued = $_SESSION["rol"];

    $create = false;
    $cl = 0;

    $url_en = "../../EN/template/citas.php";
    $url_es = "../../ES/template/citas.php";

    if(!empty($_GET))
    {
        $url = $_SERVER['REQUEST_URI'];
        $url = explode("EN", $url);
        $url_es = "../../ES$url[1]";
        $url_en = "../../EN$url[1]";

        $create = true;
        $cl = $_GET["cl"]??0;

        if($rol_logued != "1")
        {
            $stay = false;

            if($rol_logued == "3")
            {
                $res_clientes_analista = select($oCon, "SELECT * FROM clientes WHERE Nombre_representante = $id_logued");
            }
            if($rol_logued == "2")
            {
                $res_clientes_analista = select($oCon, "SELECT clientes.* FROM clientes INNER JOIN analyst ON clientes.Nombre_representante = analyst.Id INNER JOIN managers ON analyst.Id_supervisor = managers.Id WHERE managers.Id = $id_logued");
            }

            foreach($res_clientes_analista as $item)
            {
                if($cl == $item["Id"])
                {
                    $stay = true;
                }
            }

            if($stay == false)
            {
                header("location: login.html");
            }
        }
        else
        {
            $res_clientes_analista = select($oCon, "SELECT * FROM clientes WHERE Nombre_representante = $id_logued");
        }

    }

    $res_cl = select($oCon, "SELECT Primer_nombre, Estatus, Id_office FROM clientes WHERE Id = $cl");
    $cl_office = $res_cl[0]["Id_office"];

    $estatus = $res_cl[0]["Estatus"];

    if($estatus == 15 || $estatus == 2)
    {
        header("location: clientes.html");
    }

    define("sql_instalador", "SELECT instaladores.*, offices.Name_office FROM instaladores JOIN offices ON offices.Id = instaladores.Id_office WHERE instaladores.Id_office = $cl_office");
    $res_instaladores = select($oCon, sql_instalador);

    $options_instaladores = "";

    foreach($res_instaladores as $item)
    {
        $options_instaladores .= '<option value="'.$item["Id"].'">'.$item["Nombre"].'</option>';
    }

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <script src="backend/js/session.js"></script>
    <!-- <script src="coming-soon.js"></script> -->
    <title>Citas</title>
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
    <meta name="keywords"
        content="Flat ui, Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
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
    <!-- Calender css -->
    <link rel="stylesheet" type="text/css" href="../bower_components/fullcalendar/css/fullcalendar.css">
    <link rel="stylesheet" type="text/css" href="../bower_components/fullcalendar/css/fullcalendar.print.css"
        media='print'>
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--color css-->

    <link rel="stylesheet" type="text/css" href="assets/css/linearicons.css">
    <link rel="stylesheet" type="text/css" href="assets/css/simple-line-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/css/ionicons.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="./assets/css/citas.css">
</head>

<body>


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
                                <font" style="vertical-align: inherit;">Warning!</font>
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
                                <font style="vertical-align: inherit;">Done!</font>
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
                                <font style="vertical-align: inherit;">Danger!</font>
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


    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div></div>
        </div>
    </div>
    <!-- Pre-loader end -->

    <div id="pcoded" class="pcoded">
        <div class=""></div><!--clase que da overlay al hacer clic en menu a nivel movil pcoded-overlay-box-->
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <a class="mobile-search morphsearch-search" href="#">
                            <i class="ti-search"></i>
                        </a>
                        <a href="index.html">
                            <img class="img-fluid" src="assets/images/pasteur.png" alt="Theme-Logo">
                        </a>
                        <a class="mobile-options">
                            <i class="ti-more"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <div>
                            <ul class="nav-left">
                                <li>
                                    <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a>
                                    </div>
                                </li>

                                <li>
                                    <a href="#!" onclick="javascript:toggleFullScreen()">
                                        <i class="ti-fullscreen"></i>
                                    </a>
                                </li>
                            </ul>
                            </li>
                            </ul>
                            <ul class="nav-right">
                                <!--inicio multi-lenguaje-->
                                <li class="header-notification lng-dropdown">
                                    <a href="#" id="dropdown-active-item">
                                    <i class="flag-icon flag-icon-gb m-r-5"></i> English
                                    </a>
                                    <ul class="show-notification">
                                        <li>
                                            <a href="<?php echo $url_en; ?>" data-lng="en">
                                                <i class="flag-icon flag-icon-gb m-r-5"></i> English
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $url_es; ?>" data-lng="es">
                                                <i class="flag-icon flag-icon-es m-r-5"></i> Español
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                </li>
                                <li class="header-notification">
                                    <a href="#" id="a-number">
                                        <i class="ti-bell"></i>
                                        <span id="set-number" class="badge">1</span>
                                    </a>
                                    <ul class="show-notification" id="container-noti">
                                        <li>
                                            <h6>notifications</h6>
                                        </li>
                                        <li>
                                            <h6>There are no notifications at this time</h6>
                                        </li>
                                    </ul>
                                </li>

                                <script src="backend/js/get-noti.js"></script>

                                <li class="user-profile header-notification">
                                    <a href="#!" id="info_profile" class="p-0" style="position: relative;">
                                        <img src="assets/images/user-redondo.svg" alt="User-Profile-Image">
                                        <span>Cargando...</span>
                                        <i class="ti-angle-down"></i>
                                    </a>
                                    <ul class="show-notification profile-notification">
                                        <li>
                                            <a href="profile-admin.php">
                                                <i class="ti-user"></i> Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="destroy.php?d=true">
                                                <i class="ti-layout-sidebar-left"></i> Logout
                                            </a>
                                        </li>
                                    </ul>
                                               
                                </li>
                            </ul>
                            <!-- search -->
                            <div id="morphsearch" class="morphsearch">
                                <form class="morphsearch-form">
                                    <input class="morphsearch-input" type="search" placeholder="Search...">
                                    <button class="morphsearch-submit" type="submit">Search</button>
                                </form>
                                <div class="morphsearch-content">
                                    <div class="dummy-column">
                                        <h2>People</h2>
                                        <a class="dummy-media-object" href="#!">
                                            <img class="round"
                                                src="../../../../avatar/81b58502541f9445253f30497e53c280.png?s=50&d=identicon&r=G"
                                                alt="Sara Soueidan">
                                            <h3>Sara Soueidan</h3>
                                        </a>
                                        <a class="dummy-media-object" href="#!">
                                            <img class="round"
                                                src="../../../../avatar/9bc7250110c667cd35c0826059b81b75.jpeg?s=50&d=identicon&r=G"
                                                alt="Shaun Dona">
                                            <h3>Shaun Dona</h3>
                                        </a>
                                    </div>
                                    <div class="dummy-column">
                                        <h2>Popular</h2>
                                        <a class="dummy-media-object" href="#!">
                                            <img src="assets/images/avatar-1.png" alt="PagePreloadingEffect">
                                            <h3>Page Preloading Effect</h3>
                                        </a>
                                        <a class="dummy-media-object" href="#!">
                                            <img src="assets/images/avatar-1.png" alt="DraggableDualViewSlideshow">
                                            <h3>Draggable Dual-View Slideshow</h3>
                                        </a>
                                    </div>
                                    <div class="dummy-column">
                                        <h2>Recent</h2>
                                        <a class="dummy-media-object" href="#!">
                                            <img src="assets/images/avatar-1.png" alt="TooltipStylesInspiration">
                                            <h3>Tooltip Styles Inspiration</h3>
                                        </a>
                                        <a class="dummy-media-object" href="#!">
                                            <img src="assets/images/avatar-1.png" alt="NotificationStyles">
                                            <h3>Notification Styles Inspiration</h3>
                                        </a>
                                    </div>
                                </div>
                                <!-- /morphsearch-content -->
                                <span class="morphsearch-close"><i class="icofont icofont-search-alt-1"></i></span>
                            </div>
                            <!-- search end -->
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Sidebar chat start -->
            <div id="sidebar" class="users p-chat-user showChat">
                <div class="had-container">
                    <div class="card card_main p-fixed users-main">
                        <div class="user-box">
                            <div class="card-block">
                                <div class="right-icon-control">
                                    <input type="text" class="form-control  search-text" placeholder="Search Friend"
                                        id="search-friends">
                                    <div class="form-icon">
                                        <i class="icofont icofont-search"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="main-friend-list">
                                <div class="media userlist-box" data-id="1" data-status="online"
                                    data-username="Josephin Doe" data-toggle="tooltip" data-placement="left"
                                    title="Josephin Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-circle" src="assets/images/avatar-1.png"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Josephin Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="2" data-status="online"
                                    data-username="Lary Doe" data-toggle="tooltip" data-placement="left"
                                    title="Lary Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-circle" src="assets/images/task/task-u1.jpg"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Lary Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="3" data-status="online" data-username="Alice"
                                    data-toggle="tooltip" data-placement="left" title="Alice">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-circle" src="assets/images/avatar-2.png"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alice</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="4" data-status="online" data-username="Alia"
                                    data-toggle="tooltip" data-placement="left" title="Alia">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-circle" src="assets/images/task/task-u2.jpg"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alia</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="5" data-status="online" data-username="Suzen"
                                    data-toggle="tooltip" data-placement="left" title="Suzen">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-circle" src="assets/images/task/task-u3.jpg"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Suzen</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="6" data-status="offline"
                                    data-username="Michael Scofield" data-toggle="tooltip" data-placement="left"
                                    title="Michael Scofield">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-circle" src="assets/images/avatar-3.png"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-danger"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Michael Scofield</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="7" data-status="online"
                                    data-username="Irina Shayk" data-toggle="tooltip" data-placement="left"
                                    title="Irina Shayk">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-circle" src="assets/images/avatar-4.png"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Irina Shayk</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="8" data-status="offline"
                                    data-username="Sara Tancredi" data-toggle="tooltip" data-placement="left"
                                    title="Sara Tancredi">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-circle" src="assets/images/avatar-5.png"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-danger"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Sara Tancredi</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="9" data-status="online" data-username="Samon"
                                    data-toggle="tooltip" data-placement="left" title="Samon">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-circle" src="assets/images/avatar-1.png"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Samon</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="10" data-status="online"
                                    data-username="Daizy Mendize" data-toggle="tooltip" data-placement="left"
                                    title="Daizy Mendize">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-circle" src="assets/images/task/task-u3.jpg"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Daizy Mendize</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="11" data-status="offline"
                                    data-username="Loren Scofield" data-toggle="tooltip" data-placement="left"
                                    title="Loren Scofield">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-circle" src="assets/images/avatar-3.png"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-danger"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Loren Scofield</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="12" data-status="online" data-username="Shayk"
                                    data-toggle="tooltip" data-placement="left" title="Shayk">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-circle" src="assets/images/avatar-4.png"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Shayk</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="13" data-status="offline" data-username="Sara"
                                    data-toggle="tooltip" data-placement="left" title="Sara">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-circle" src="assets/images/task/task-u3.jpg"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-danger"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Sara</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="14" data-status="online" data-username="Doe"
                                    data-toggle="tooltip" data-placement="left" title="Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-circle" src="assets/images/avatar-1.png"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="15" data-status="online" data-username="Lary"
                                    data-toggle="tooltip" data-placement="left" title="Lary">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-circle" src="assets/images/task/task-u1.jpg"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Lary</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar inner chat start-->
            <div class="showChat_inner">
                <div class="media chat-inner-header">
                    <a class="back_chatBox">
                        <i class="icofont icofont-rounded-left"></i> Josephin Doe
                    </a>
                </div>
                <div class="media chat-messages">
                    <a class="media-left photo-table" href="#!">
                        <img class="media-object img-circle m-t-5" src="assets/images/avatar-1.png"
                            alt="Generic placeholder image">
                    </a>
                    <div class="media-body chat-menu-content">
                        <div class="">
                            <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                </div>
                <div class="media chat-messages">
                    <div class="media-body chat-menu-reply">
                        <div class="">
                            <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                    <div class="media-right photo-table">
                        <a href="#!">
                            <img class="media-object img-circle m-t-5" src="assets/images/avatar-2.png"
                                alt="Generic placeholder image">
                        </a>
                    </div>
                </div>
                <div class="chat-reply-box p-b-20">
                    <div class="right-icon-control">
                        <input type="text" class="form-control search-text" placeholder="Share Your Thoughts">
                        <div class="form-icon">
                            <i class="icofont icofont-paper-plane"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar inner chat end-->
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">

                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Navegación</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li>
                                    <!--Roles-->
                                    <a id="   " href="dashboard-project.html">
                                        <span class="pcoded-micon"><i class="ti-home"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                    </a>
                                <li class="pcoded-hasmenu r_analist">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" class="bi bi-person-badge-fill"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z" />
                                            </svg></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.page_layout.main">Roles</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                </li>
                                <li class="r_manager">
                                    <a href="administradores.html">
                                        <span class="pcoded-micon"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" class="bi bi-briefcase"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z" />
                                            </svg></span>
                                        <span class="" data-i18n="nav.dash.default"><svg class="svg-roles"
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                                                <path
                                                    d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                                <path
                                                    d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z" />
                                            </svg>Administrators</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="r_manager">
                                    <a href="managers.html">
                                        <span class="pcoded-micon"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" class="bi bi-briefcase"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z" />
                                            </svg></span>
                                        <span class="" data-i18n="nav.dash.default"><svg class="svg-roles"
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-person-video2" viewBox="0 0 16 16">
                                                <path d="M10 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                                <path
                                                    d="M2 1a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2ZM1 3a1 1 0 0 1 1-1h2v2H1V3Zm4 10V2h9a1 1 0 0 1 1 1v9c0 .285-.12.543-.31.725C14.15 11.494 12.822 10 10 10c-3.037 0-4.345 1.73-4.798 3H5Zm-4-2h3v2H2a1 1 0 0 1-1-1v-1Zm3-1H1V8h3v2Zm0-3H1V5h3v2Z" />
                                            </svg>Managers</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="Analistas.html">
                                        <span class="pcoded-micon"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" class="bi bi-briefcase"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z" />
                                            </svg></span>
                                        <span class="" data-i18n="nav.dash.default"><svg class="svg-roles"
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-briefcase" viewBox="0 0 16 16">
                                                <path
                                                    d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z" />
                                            </svg>Analysts</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <!--Roles-->
                            <li id="">
                                <a href="clientes.html">
                                    <span class="pcoded-micon"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-person-circle"
                                            viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            <path fill-rule="evenodd"
                                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                        </svg></span>
                                    <span class="pcoded-mtext" data-i18n="nav.dash.default">Customers</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>

                            <li class="crear-citas">
                                <a href="citas.php">
                                    <span class="pcoded-micon"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-calendar-check"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                            <path
                                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                        </svg></span>
                                    <span class="pcoded-mtext" data-i18n="nav.dash.default">Appointment</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            <li class="r_analist r_manager" id="">
                            <a href="Instaladores.php">
                                <span class="pcoded-micon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tools" viewBox="0 0 16 16">
                                    <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0Zm9.646 10.646a.5.5 0 0 1 .708 0l2.914 2.915a.5.5 0 0 1-.707.707l-2.915-2.914a.5.5 0 0 1 0-.708ZM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11Z"/>
                                  </svg></span>
                                <span class="pcoded-mtext" data-i18n="nav.dash.default">Installers</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                            </li>
                            </ul>
                        </div>
                    </nav>
                    <!-- contenido -->
                    <!--register-->
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="col-md-12">
                                            <div class="col-md-12">

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">

                                                    <?php
                                                    
                                                        if($create == true)
                                                        {
                                                            echo '
                                                            <!-- inicio div de registro de analista -->
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h5>register appointment</h5>
                                                                    
                                                                </div>
                                                                <div class="card-block">
                                                                    <p>
                                                                    Click the button to Schedule a new appointment
                                                                    </p>
                                                                    <p class="text-center">
                                                                        <button type="button" class="btn btn-primary auth-btn"
                                                                            data-toggle="modal"
                                                                            data-target="#register">Register</button>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <!-- final div de registro de analista -->
                                                            ';
                                                        }
                                                    
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Page-body end -->
                                    </div>
                                    <!--register-->

                                    <!-- Table header styling table start -->
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>SCHEDULED APPOINTMENTS</h5>
                                            <span>Viewing scheduled appointments</span>
                                            
                                        </div>
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                                <table class="table table-styling">
                                                    <thead>
                                                        <tr class="table-primary">
                                                            <th>ID</th>
                                                            <th>Customer</th>
                                                            <th>installer</th>
                                                            <th>Date</th>
                                                            <th>Hour</th>
                                                            <th>Address</th>
                                                            <th>Status</th>
                                                            <th>Planner ID</th>
                                                            <th>Rol</th>
                                                            <th>Change status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbody_citas">
                                                        <tr>
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Table header styling table end -->
                                    <!-- <div class="contain-all">
                            <div class="contain-menu">
                                <div class="div-create">
                                    <div class="icon">
                                        +
                                    </div>
                                    <h1 class="p">
                                        Crear cita
                                    </h1>
                                </div>
                            </div>
    
                            <div class="contain-calender">
                                <div class="contain-calender-header">
                                    <div class="f-l">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                        </svg>
                                    </div>
                                    <div class="f-r">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                    </div>
                                    <div class="contain-month">
                                        <p>
                                            Septiembre 2020
                                        </p>
                                    </div>
                                    <div class="filtro">
                                        <select class="form-control">
                                            <option value="">
                                                2020
                                            </option>
                                            <option value="">
                                                2021
                                            </option>
                                            <option value="">
                                                2022
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="contain-days">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>
                                                    Lunes
                                                </th>
                                                <th>
                                                    Martes
                                                </th>
                                                <th>
                                                    Miercoles
                                                </th>
                                                <th>
                                                    Jueves
                                                </th>
                                                <th>
                                                    Viernes
                                                </th>
                                                <th>
                                                    Sabado
                                                </th>
                                                <th>
                                                    Domingo
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>

                                    <div class="contain-day">
                                        <div class="h-day" id="lunes">
                                            <div class="d">
                                                1
                                            </div>
                                            <div class="d">
                                                2
                                            </div>
                                            <div class="d">
                                                3
                                            </div>
                                        </div>
                                        <div class="h-day">
                                            <div class="d">
                                                1
                                            </div>
                                            <div class="d">
                                                2
                                            </div>
                                            <div class="d">
                                                3
                                            </div>
                                        </div>
                                        <div class="h-day">
                                            <div class="d">
                                                1
                                            </div>
                                            <div class="d">
                                                2
                                            </div>
                                            <div class="d">
                                                3
                                            </div>
                                        </div>
                                        <div class="h-day">
                                            <div class="d">
                                                1
                                            </div>
                                            <div class="d">
                                                2
                                            </div>
                                            <div class="d">
                                                3
                                            </div>
                                        </div>
                                        <div class="h-day">
                                            <div class="d">
                                                1
                                            </div>
                                            <div class="d">
                                                2
                                            </div>
                                            <div class="d">
                                                3
                                            </div>
                                        </div>
                                        <div class="h-day">
                                            <div class="d">
                                                1
                                            </div>
                                            <div class="d">
                                                2
                                            </div>
                                            <div class="d">
                                                3
                                            </div>
                                        </div>
                                        <div class="h-day">
                                            <div class="d">
                                                1
                                            </div>
                                            <div class="d">
                                                2
                                            </div>
                                            <div class="d">
                                                3
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> -->

                                    <!--popup de registro-->
                                    <!-- inicio de formulario de registro de analista -->
                                    <div id="register" class="modal fade" role="dialog"
                                        style="z-index: 4999 !important;">
                                        <div class="modal-dialog">
                                            <div class="login-card card-block login-card-modal">
                                                <?php
                                                    if($create == true)
                                                    {
                                                        echo '
                                                    <div class="auth-box">
                                                    <div class="row m-b-20">
                                                        <div class="col-md-12">
                                                            <div class="text-center">
                                                                <img src="assets/images/pasteur.png" alt="logo.png">
                                                            </div>
                                                            <h3 class="text-center txt-primary">Register a new appointment</h3>
                                                            
                                                            <h5 class="fs-subtitle text-center">The fields marked with <p class="text-center" style="color: red; display: inline;">*</p> are mandatory</h5>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <!-- Comentario debajo del type text -->
                                                    <div class="input-group">
                                                        <input id="cliente" readonly style="display: none;" value="'.$cl.'">
                                                        <input type="text" class="form-control required"
                                                            placeholder=" " readonly
                                                            value="'.$res_cl[0]["Primer_nombre"].'">
                                                        <span class="md-line"></span>
                                                        <label for="">Customer selected</label>
                                                    </div>

                                                    <div class="input-group">
                                                        <select class="form-control" id="instalador">
                                                            <option selected value="">Select an Installer</option>
                                                            '.$options_instaladores.'
                                                        </select>
                                                    </div>

                                                    <div class="input-group">
                                                        <input type="date" class="form-control required"
                                                            placeholder=" "
                                                            id="fecha">
                                                        <span class="md-line"></span>
                                                        <label for="">Date</label>
                                                    </div>
                                                    <div class="input-group">
                                                        <input type="time" class="form-control required"
                                                            placeholder=" "
                                                            id="hora">
                                                        <span class="md-line"></span>
                                                        <label for="">Hour</label>
                                                    </div>
                                                    
                                                    <div class="input-group">
                                                        <select class="form-control required" id="tipo_instalacion">
                                                            <option selected value="">
                                                                Select an installation type *
                                                            </option>
                                                            <option value="Panel Solar">
                                                                Solar panel
                                                            </option>
                                                            <option value="Filtros de Agua">
                                                                Water filters
                                                            </option>
                                                        <select>
                                                    </div>
                                                    <!--inicio subir archivos-->
                                                    <!--final subir archivos-->
                                                    <div class="row m-t-25 text-left">
                                                        <div class="col-md-12">
                                                            <div class="checkbox-fade fade-in-primary">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row m-t-15">
                                                            <div class="col-md-12">
                                                                <button onclick="register_cita()"
                                                                    class="btn btn-primary btn-md btn-block waves-effect text-center">
                                                                    SCHEDULE APPOINTMENT
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                        </div>
                                                    </div>
                                                    ';
                                                    }
                                                ?>
                                                <!-- final formulario de registro de analista-->
                                                <!--popup de regsitro-->
                                                <!-- contenido -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Required Jquery -->
                        <script type="text/javascript" src="../bower_components/jquery/js/jquery.min.js"></script>
                        <script type="text/javascript" src="../bower_components/jquery-ui/js/jquery-ui.min.js"></script>
                        <script type="text/javascript" src="../bower_components/popper.js/js/popper.min.js"></script>
                        <script type="text/javascript" src="../bower_components/bootstrap/js/bootstrap.min.js"></script>
                        <!-- jquery slimscroll js -->
                        <script type="text/javascript"
                            src="../bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
                        <!-- modernizr js -->
                        <script type="text/javascript" src="../bower_components/modernizr/js/modernizr.js"></script>
                        <script type="text/javascript"
                            src="../bower_components/modernizr/js/css-scrollbars.js"></script>
                        <!-- classie js -->
                        <script type="text/javascript" src="../bower_components/classie/js/classie.js"></script>
                        <!--classic JS-->
                        <script type="text/javascript" src="assets/js/classie.js"></script>
                        <!-- calender js -->
                        <script type="text/javascript" src="../bower_components/moment/js/moment.min.js"></script>
                        <script type="text/javascript"
                            src="../bower_components/fullcalendar/js/fullcalendar.min.js"></script>
                        <!-- i18next.min.js -->
                        <script type="text/javascript" src="../bower_components/i18next/js/i18next.min.js"></script>
                        <script type="text/javascript"
                            src="../bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
                        <script type="text/javascript"
                            src="../bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
                        <script type="text/javascript"
                            src="../bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
                        <!-- Custom js -->
                        <script type="text/javascript" src="assets/pages/full-calender/calendar.js"></script>
                        <script type="text/javascript" src="assets/js/script.js"></script>
                        <script src="assets/js/pcoded.min.js"></script>
                        <script src="assets/js/demo-12.js"></script>
                        <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
                        <script src="assets/js/jquery.mousewheel.min.js"></script>
                        <script src="backend/js/register-citas.js"></script>
                        <script src="backend/js/remove-elements.js"></script>
                        <script src="alerts.js"></script>
                        <script src="backend/js/get-profile.js"></script>
</body>

</html>