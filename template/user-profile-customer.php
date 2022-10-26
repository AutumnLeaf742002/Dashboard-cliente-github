﻿<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mash Able - Premium Admin Template</title>
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
    <!-- <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> -->
    <link href="../../../../css.css?family=Mada:300,400,500,600,700" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="../bower_components/bootstrap/css/bootstrap.min.css">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Date-time picker css -->
    <link rel="stylesheet" type="text/css" href="assets/pages/advance-elements/css/bootstrap-datetimepicker.css">
    <!-- Date-range picker css  -->
    <link rel="stylesheet" type="text/css" href="../bower_components/bootstrap-daterangepicker/css/daterangepicker.css">
    <!-- Date-Dropper css -->
    <link rel="stylesheet" type="text/css" href="../bower_components/datedropper/css/datedropper.min.css">
    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="../bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <!-- flag icon framework css -->
    <link rel="stylesheet" type="text/css" href="assets/pages/flag-icon/flag-icon.min.css">
    <!-- Menu-Search css -->
    <link rel="stylesheet" type="text/css" href="assets/pages/menu-search/css/component.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">


    <link rel="stylesheet" type="text/css" href="assets/css/linearicons.css">
    <link rel="stylesheet" type="text/css" href="assets/css/simple-line-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/css/ionicons.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
</head>

<body>

        <?php
            if(isset($_GET))
            {
                include_once "backend/php/connection.php";
                include_once "backend/php/commands.php";
    
                $id_cl = $_GET["id_cl"] ?? 1;
                $id_co = $_GET["id_co"] ?? 1;
    
                $oCon = connect();
                $sql_cl = "SELECT * FROM clientes WHERE Id = $id_cl";
                $sql_co = "SELECT * FROM co_aplicantes WHERE Id = $id_co";
    
                $res_cl = select($oCon, $sql_cl);
                $res_co = select($oCon, $sql_co);

            }
        ?>

    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div></div>
        </div>
    </div>
    <!-- Pre-loader end -->

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
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
                                    <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
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
                                <li class="header-notification lng-dropdown">
                                    
                            
                                <li class="header-notification">
                                    <a href="#!">
                                        <i class="ti-bell"></i>
                                        <span class="badge">5</span>
                                    </a>
                                    <ul class="show-notification">
                                        <li>
                                            <h6>Notifications</h6>
                                            <label class="label label-danger">Nuevo Mensaje</label>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="d-flex align-self-center" src="assets/images/user.png" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">Carlos Castillo</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="d-flex align-self-center" src="assets/images/user.png" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">Joseph William</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="d-flex align-self-center" src="assets/images/user.png" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">Sara Soudein</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                
                                <li class="user-profile header-notification">
                                    <a href="#!">
                                        <img src="assets/images/user.png" alt="User-Profile-Image">
                                        <span>Carlos Castillo</span>
                                        <i class="ti-angle-down"></i>
                                    </a>
                                    <ul class="show-notification profile-notification">
                                        <li>
                                            <a href="#!">
                                                <i class="ti-settings"></i> Settings
                                            </a>
                                        </li>
                                        <li>
                                            <a href="user-profile.html">
                                                <i class="ti-user"></i> Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="email-inbox.html">
                                                <i class="ti-email"></i> My Messages
                                            </a>
                                        </li>
                                        <li>
                                            <a href="auth-lock-screen.html">
                                                <i class="ti-lock"></i> Lock Screen
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#!">
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
                                            <img class="round" src="../../../../avatar/81b58502541f9445253f30497e53c280.png?s=50&d=identicon&r=G" alt="Sara Soueidan">
                                            <h3>Sara Soueidan</h3>
                                        </a>
                                        <a class="dummy-media-object" href="#!">
                                            <img class="round" src="../../../../avatar/9bc7250110c667cd35c0826059b81b75.jpeg?s=50&d=identicon&r=G" alt="Shaun Dona">
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
                                    <input type="text" class="form-control  search-text" placeholder="Search Friend" id="search-friends">
                                    <div class="form-icon">
                                        <i class="icofont icofont-search"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="main-friend-list">
                                <div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-circle" src="assets/images/avatar-1.png" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Josephin Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="2" data-status="online" data-username="Lary Doe" data-toggle="tooltip" data-placement="left" title="Lary Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-circle" src="assets/images/task/task-u1.jpg" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Lary Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="3" data-status="online" data-username="Alice" data-toggle="tooltip" data-placement="left" title="Alice">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-circle" src="assets/images/avatar-2.png" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alice</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="4" data-status="online" data-username="Alia" data-toggle="tooltip" data-placement="left" title="Alia">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-circle" src="assets/images/task/task-u2.jpg" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alia</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="5" data-status="online" data-username="Suzen" data-toggle="tooltip" data-placement="left" title="Suzen">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-circle" src="assets/images/task/task-u3.jpg" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Suzen</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="6" data-status="offline" data-username="Michael Scofield" data-toggle="tooltip" data-placement="left" title="Michael Scofield">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-circle" src="assets/images/avatar-3.png" alt="Generic placeholder image">
                                        <div class="live-status bg-danger"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Michael Scofield</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="7" data-status="online" data-username="Irina Shayk" data-toggle="tooltip" data-placement="left" title="Irina Shayk">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-circle" src="assets/images/avatar-4.png" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Irina Shayk</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="8" data-status="offline" data-username="Sara Tancredi" data-toggle="tooltip" data-placement="left" title="Sara Tancredi">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-circle" src="assets/images/avatar-5.png" alt="Generic placeholder image">
                                        <div class="live-status bg-danger"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Sara Tancredi</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="9" data-status="online" data-username="Samon" data-toggle="tooltip" data-placement="left" title="Samon">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-circle" src="assets/images/avatar-1.png" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Samon</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="10" data-status="online" data-username="Daizy Mendize" data-toggle="tooltip" data-placement="left" title="Daizy Mendize">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-circle" src="assets/images/task/task-u3.jpg" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Daizy Mendize</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="11" data-status="offline" data-username="Loren Scofield" data-toggle="tooltip" data-placement="left" title="Loren Scofield">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-circle" src="assets/images/avatar-3.png" alt="Generic placeholder image">
                                        <div class="live-status bg-danger"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Loren Scofield</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="12" data-status="online" data-username="Shayk" data-toggle="tooltip" data-placement="left" title="Shayk">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-circle" src="assets/images/avatar-4.png" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Shayk</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="13" data-status="offline" data-username="Sara" data-toggle="tooltip" data-placement="left" title="Sara">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-circle" src="assets/images/task/task-u3.jpg" alt="Generic placeholder image">
                                        <div class="live-status bg-danger"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Sara</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="14" data-status="online" data-username="Doe" data-toggle="tooltip" data-placement="left" title="Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-circle" src="assets/images/avatar-1.png" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="15" data-status="online" data-username="Lary" data-toggle="tooltip" data-placement="left" title="Lary">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-circle" src="assets/images/task/task-u1.jpg" alt="Generic placeholder image">
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
                        <img class="media-object img-circle m-t-5" src="assets/images/avatar-1.png" alt="Generic placeholder image">
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
                            <img class="media-object img-circle m-t-5" src="assets/images/avatar-2.png" alt="Generic placeholder image">
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

                        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Navigation</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li>
                                <a href="dashboard-project.html">
                                    <span class="pcoded-micon"><i class="ti-home"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                </a>
                                
                            </li>
                            <li class="">
                                <a href="user-card.html">
                                    <span class="pcoded-micon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-briefcase" viewBox="0 0 16 16">
                                        <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z"/>
                                      </svg></span>
                                    <span class="pcoded-mtext" data-i18n="nav.dash.default">Vendedores</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                          
                            <li id="menu-clientes">
                                <a href="crm-contact.html">
                                    <span class="pcoded-micon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                      </svg></span>
                                    <span class="pcoded-mtext" data-i18n="nav.dash.default">Clientes</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="event-full-calender.html">
                                <span class="pcoded-micon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                                    <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                  </svg></span>
                                <span class="pcoded-mtext" data-i18n="nav.dash.default">Crear Citas</span>
                                <span class="pcoded-mcaret"></span>
                            </a>  
                            <li id="">
                                <a href="chat.html">
                                    <span class="pcoded-micon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                                        <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                        <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"/>
                                      </svg></span>
                                    <span class="pcoded-mtext" data-i18n="nav.dash.default">Chat</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                            
                </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">

                            <!-- Main body start -->
                            <div class="main-body user-profile">
                                <div class="page-wrapper">
                                <!-- Page-header start -->
                                    <div class="page-header">
                                        <div class="row align-items-end">
                                            <div class="col-sm-8">
                                                <div class="page-header-title">
                                                    <div class="d-inline">
                                                        <h4>Perfil de clientes</h4>
                                                        <span>Toda la informacion del cliente se encuentra en este perfil</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="page-header-breadcrumb">
                                                    <ul class="breadcrumb-title">
                                                <li class="breadcrumb-item">
                                                    <a href="index.html">
                                                        <i class="icofont icofont-home"></i>
                                                    </a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#!">User Profile</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#!">User Profile</a>
                                                </li>
                                            </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-header end -->
                                
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <!--profile cover start-->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="cover-profile">
                                                    <div class="profile-bg-img">
                                                        <img class="profile-bg-img img-fluid" src="assets/images/user-profile/bg-img1.jpg" alt="bg-img">
                                                        <div class="card-block user-info">
                                                            <div class="col-md-12">
                                                                <div class="media-left" style="display: flex; justify-content: center; margin-bottom: 15px;">

                                                                    <style>
                                                                        .img-cliente{

                                                                            width: 15%;
                                                                        }

                                                                        @media screen and (max-width: 450px) {
    
                                                                            .img-cliente{

                                                                                width: 35%;
                                                                            }
                                                                        }
}
                                                                    </style>

                                                                    <img class="img-cliente" src="Avatars/avatar-<?php echo $res_cl[0]["Avatar"];?>.svg" alt="user-img">
                                                                </div>
                                                                <div class="media-body row">
                                                                    <div class="col-lg-12">
                                                                        <div class="user-title">
                                                                            <h2>
                                                                                <?php
                                                                                    echo $res_cl[0]["Primer_nombre"];
                                                                                ?>
                                                                            </h2>
                                                                            <span class="text-white">Cliente</span>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!--profile cover end-->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <!-- tab header start -->
                                                <div class="tab-header">
                                                    <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-toggle="tab" href="#personal" role="tab">Informacion Personal</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#binfo" role="tab">informacion de co aplicante</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#contacts" role="tab">User's Contacts</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#review" role="tab">Reviews</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                    </ul>
                                                    
                                                </div>
                                                <!-- tab header end -->
                                                <!-- tab content start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="card-header-text">Estado del cliente</h5> 
                                                        <button id="boton-editar-perfil" class="btn btn-primary"></i>Editar</button>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="view-info">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="general-info">
                                                                        <div class="row">
                                                                            <div class="col-lg-12 col-xl-6">
                                                                                <div class="table-responsive">
                                                                                    <table class="table m-0">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <th scope="row">Analista asignado</th>
                                                                                                <td>
                                                                                                    <?php echo $res_cl[0]["Nombre_representante"]; ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th scope="row">Cantidad Fiananciada</th>
                                                                                                <td>
                                                                                                    <?php echo $res_cl[0]["Cantidad_financiada"]; ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <!-- end of table col-lg-6 -->
                                                                            <div class="col-lg-12 col-xl-6">
                                                                            <div class="table-responsive">
                                                                                <table class="table">
                                                                                    <tbody>
                                                                                            <tr>
                                                                                                <th scope="row">Estatus</th>
                                                                                                <td>
                                                                                                    <span class="label label-warning">Pendiente </span>
                                                                                                    <label class="label label-md label-danger">Cancelado</label>
                                                                                                    <label class="label label-md label-success">Competado</label>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <th>Fecha de mantenimiento</th>
                                                                                            <td>04/12/1995</td>
                                                                                            </tr>
                                                                                        
                                                                                    </tbody>
                                                                                </table>
                                                                                </div>
                                                                            </div>
                                                                            <!-- end of table col-lg-6 -->
                                                                        </div>
                                                                        <!-- end of row -->
                                                                    </div>
                                                                    <!-- end of general info -->
                                                                </div>
                                                                <!-- end of col-lg-12 -->
                                                            </div>
                                                            <!-- end of row -->
                                                        </div>
                                                        <!-- end of view-info -->
                                                        
                                                    </div>
                                                    <!-- end of card-block -->
                                                     </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                            <!-- Main-body start -->
                                                    <div class="main-body">
                                                        <div class="page-wrapper">
                                                            <!-- Page header start -->
                                                            
                                                            
                                                            <!-- Page header end -->
                                                            <!-- Page body start -->
                                                            <div class="page-body">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                    
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Page body end -->
                                                        </div>
                                                    </div>
                                                    <!-- Main-body end -->
                
                                                    </div>
                                                </div>
                                                <div class="tab-content">
                                                    <!-- tab panel personal start -->
                                                    
                                                    <div class="tab-pane active" id="personal" role="tabpanel">
                                                        <!-- personal card start -->
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5 class="card-header-text">Informacion Cliente</h5>
                                                            </div>
                                                            <div class="card-block">
                                                                <div class="view-info">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="general-info">
                                                                                <div class="row">
                                                                                    <div class="col-lg-12 col-xl-6">
                                                                                        <div class="table-responsive">
                                                                                            <table class="table m-0">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <th scope="row">Primer Nombre</th>
                                                                                                        <td>
                                                                                                            <?php echo $res_cl[0]["Primer_nombre"]; ?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Apellido</th>
                                                                                                        <td>
                                                                                                            <?php echo $res_cl[0]["Apellido"];?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Fecha de nacimiento</th>
                                                                                                        <td>
                                                                                                            <?php echo $res_cl[0]["Fecha_nacimiento"];?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Numero de seguro social</th>
                                                                                                        <td>
                                                                                                            <?php echo $res_cl[0]["N_seguro_social"];?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Numero de Licencia de Conducir</th>
                                                                                                        <td>
                                                                                                            <?php echo $res_cl[0]["N_licencia_conducir"];?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Estado</th>
                                                                                                        <td>
                                                                                                            <?php echo $res_cl[0]["Estado"];?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Vencimiento</th>
                                                                                                        <td>
                                                                                                            <?php echo $res_cl[0]["Vencimiento"];?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Direccion</th>
                                                                                                        <td>
                                                                                                            <?php echo $res_cl[0]["Direccion"];?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">tiempo en esa direccion</th>
                                                                                                        <td>
                                                                                                            <?php echo $res_cl[0]["Cuanto_tiempo"];?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Correo</th>
                                                                                                        <td>
                                                                                                            <?php echo $res_cl[0]["Correo"];?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- end of table col-lg-6 -->
                                                                                    <div class="col-lg-12 col-xl-6">
                                                                                    <div class="table-responsive">
                                                                                        <table class="table">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <th scope="row">Ciudad</th>
                                                                                                    <td>
                                                                                                            <?php echo $res_cl[0]["Ciudad"];?>
                                                                                                        </td>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">Estado</th>
                                                                                                    <td>
                                                                                                        <?php echo $res_cl[0]["Estado_ciudad"];?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">Zip</th>
                                                                                                    <td>
                                                                                                        <?php echo $res_cl[0]["Zip"];?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">Telefono de casa</th>
                                                                                                    <td>
                                                                                                        <?php echo $res_cl[0]["Telefono_casa"];?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">Telefono Celular</th>
                                                                                                    <td>
                                                                                                        <?php echo $res_cl[0]["Telefono_celular"];?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">Direccion Anterior</th>
                                                                                                    <td>
                                                                                                        <?php echo $res_cl[0]["Direccion_anterior"];?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">Ciudad Anterior</th>
                                                                                                    <td>
                                                                                                        <?php echo $res_cl[0]["Ciudad_anterior"];?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">Estado Anterior</th>
                                                                                                    <td>
                                                                                                        <?php echo $res_cl[0]["Estado_anterior"];?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">Zip Anterior</th>
                                                                                                    <td>
                                                                                                        <?php echo $res_cl[0]["Zip_anterior"];?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                
                                                                                            </tbody>
                                                                                        </table>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- end of table col-lg-6 -->
                                                                                </div>
                                                                                <!-- end of row -->
                                                                            </div>
                                                                            <!-- end of general info -->
                                                                        </div>
                                                                        <!-- end of col-lg-12 -->
                                                                    </div>
                                                                    <!-- end of row -->
                                                                </div>
                                                                <!-- end of view-info -->
                                                                
                                                            </div>
                                                            <!-- end of card-block -->
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                    <!-- Main-body start -->
                                                                <div class="main-body">
                                                                    <div class="page-wrapper">

                                                                        
                                                                        <!-- Page header end -->
                                                                        <!-- Page body start -->
                                                                        <div class="page-body">
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- Page body end -->
                                                                    </div>
                                                                </div>
                                                                <!-- Main-body end -->
                                                                
                                                            </div>
                                                        </div>
                                                        <!-- personal card end-->
                                                        <!-- personal card start -->
                                                        <div id="informacion-de-empleo" class="card">
                                                            <div class="card-header">
                                                                <h5 class="card-header-text">Informacion de empleo</h5>
                                                            </div>
                                                            <div class="card-block">
                                                                <div class="view-info">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="general-info">
                                                                                <div class="row">
                                                                                    <div class="col-lg-12 col-xl-6">
                                                                                        <div class="table-responsive">
                                                                                            <table class="table m-0">
                                                                                                <!--Inicio informacion de empleo-->
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <th scope="row">Nombre empleo</th>
                                                                                                        <td>
                                                                                                            <?php echo $res_cl[0]["Nombre_empleo"];?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Direccion empleo</th>
                                                                                                        <td>
                                                                                                            <?php echo $res_cl[0]["Direccion_empleo"];?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Tiempo empleo</th>
                                                                                                        <td>
                                                                                                            <?php echo $res_cl[0]["Tiempo_empleo"];?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Posicion empleo</th>
                                                                                                        <td>
                                                                                                            <?php echo $res_cl[0]["Posicion_empleo"];?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Ingreso bruto</th>
                                                                                                        <td>
                                                                                                            <?php echo $res_cl[0]["Ingreso_bruto"];?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Número de telefono del empleo anterio</th>
                                                                                                        <td>
                                                                                                            <?php echo $res_cl[0]["N_telefono_empleo_anterior"];?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Cantidad de la fuente ingreso extra</th>
                                                                                                        <td>
                                                                                                            <?php echo $res_cl[0]["Cantidad_fuente_ingreso_extra"];?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!--fin informacion de empleo-->
                                                                                    <!-- end of table col-lg-6 -->
                                                                                    <div class="col-lg-12 col-xl-6">
                                                                                    <div class="table-responsive">
                                                                                        <table class="table">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <th scope="row">Tipo ingreso</th>
                                                                                                    <td>
                                                                                                        <?php echo $res_cl[0]["Tipo_ingreso"];?>
                                                                                                    </td>
                                                                                                <tr>
                                                                                                    <th scope="row">Cantidad de la fuente ingreso extra</th>
                                                                                                    <td>
                                                                                                        <?php echo $res_cl[0]["Cantidad_fuente_ingreso_extra"];?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">Empleador anterior</th>
                                                                                                    <td>
                                                                                                        <?php echo $res_cl[0]["Empleador_anterior"];?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">Ciudad empleo anterior</th>
                                                                                                    <td>
                                                                                                        <?php echo $res_cl[0]["Ciudad_empleo_anterior"];?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">Estado empleo anterior</th>
                                                                                                    <td>
                                                                                                        <?php echo $res_cl[0]["Estado_empleo_anterior"];?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">Zip Empleo Anterior</th>
                                                                                                    <td>
                                                                                                        <?php echo $res_cl[0]["Zip_empleo_anterior"];?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">Fuente de ingreso extra</th>
                                                                                                    <td>
                                                                                                        <?php echo $res_cl[0]["Fuente_ingreso_extra"];?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                
                                                                                            </tbody>
                                                                                        </table>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- end of table col-lg-6 -->
                                                                                </div>
                                                                                <!-- end of row -->
                                                                            </div>
                                                                            <!-- end of general info -->
                                                                        </div>
                                                                        <!-- end of col-lg-12 -->
                                                                    </div>
                                                                    <!-- end of row -->
                                                                </div>
                                                            
                                                                <!-- end of view-info -->
                                                                
                                                            </div>


                                                            <!-- end of card-block -->
                                                            
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                    <!-- Main-body start -->
                                                                        <!--inicio informacion de referencia-->
                                                            <!-- personal card start -->
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h5 class="card-header-text">INFORMACIÓN Y REFERENCIAS DE LA HIPOTECA</h5>
                                                                </div>
                                                                <div class="card-block">
                                                                    <div class="view-info">
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <div class="general-info">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-12 col-xl-6">
                                                                                            <div class="table-responsive">
                                                                                                <table class="table m-0">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <th scope="row">Estado de la hipoteca</th>
                                                                                                            <td>
                                                                                                                <?php
                                                                                                                    $id_estado_hipoteca = select($oCon, 'SELECT Estado FROM estado_hipoteca WHERE Id = '.$res_cl[0]["Id_hipoteca_estado"].' ');
                                                                                                                    if($id_estado_hipoteca[0]["Estado"] != "Default")
                                                                                                                    {
                                                                                                                        echo $id_estado_hipoteca[0]["Estado"];
                                                                                                                    }
                                                                                                                    else
                                                                                                                    {
                                                                                                                        echo "";
                                                                                                                    }
                                                                                                                    
                                                                                                                ?>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <th scope="row">Tipo de residencia de la hipoteca</th>
                                                                                                            <td>
                                                                                                                <?php
                                                                                                                        $id_tipo_residencia = select($oCon, 'SELECT Tipo FROM tipo_residencia_hipoteca WHERE Id = '.$res_cl[0]["Id_tipo_residencia_hipoteca"].' ');
                                                                                                                        if($id_tipo_residencia[0]["Tipo"] != "Default")
                                                                                                                        {
                                                                                                                            echo $id_tipo_residencia[0]["Tipo"];
                                                                                                                        }
                                                                                                                        else
                                                                                                                        {
                                                                                                                            echo "";
                                                                                                                        }
                                                                                                                        
                                                                                                                    ?>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <th scope="row">Direccion de la hipoteca</th>
                                                                                                            <td>
                                                                                                                <?php echo $res_cl[0]["Direccion_hipoteca"];?>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <th scope="row">Pago de lahipoteca</th>
                                                                                                            <td>
                                                                                                                <?php echo $res_cl[0]["Pago_hipoteca"];?>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <th scope="row">Número de telefono de hipoteca</th>
                                                                                                            <td>
                                                                                                                <?php echo $res_cl[0]["N_telefono_hipoteca"];?>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <th scope="row">Referencia pariente nombre 1</th>
                                                                                                            <td>
                                                                                                                <?php echo $res_cl[0]["Referencia_pariente_nombre_1"];?>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <th scope="row">Referencia pariente direccion 1</th>
                                                                                                            <td>
                                                                                                                <?php echo $res_cl[0]["Referencia_pariente_direccion_1"];?>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!-- end of table col-lg-6 -->
                                                                                        <div class="col-lg-12 col-xl-6">
                                                                                        <div class="table-responsive">
                                                                                            <table class="table">
                                                                                                <tbody>
                                                                                                        <tr>
                                                                                                            <th scope="row">Referencia pariente telefono 1</th>
                                                                                                            <td>
                                                                                                                <?php echo $res_cl[0]["Referencia_pariente_telefono_1"];?>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <th scope="row">Referencia pariente relacion 1</th>
                                                                                                            <td>
                                                                                                                <?php echo $res_cl[0]["Referencia_pariente_relacion_1"];?>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <th scope="row">Referencia pariente nombre 2</th>
                                                                                                            <td>
                                                                                                                <?php echo $res_cl[0]["Referencia_pariente_nombre_2"];?>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <th scope="row">Referencia pariente direccion 2</th>
                                                                                                            <td>
                                                                                                                <?php echo $res_cl[0]["Referencia_pariente_direccion_2"];?>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <th scope="row">Referencia pariente telefono 2</th>
                                                                                                            <td>
                                                                                                                <?php echo $res_cl[0]["Referencia_pariente_telefono_2"];?>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <th scope="row">Referencia pariente relacion 2</th>
                                                                                                            <td>
                                                                                                                <?php echo $res_cl[0]["Referencia_pariente_relacion_2"];?>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <th scope="row">fecha de creacion de este registro</th>
                                                                                                            <td>
                                                                                                                <?php echo $res_cl[0]["Fecha_creacion_registro"];?>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!-- end of table col-lg-6 -->
                                                                                    </div>
                                                                                    <!-- end of row -->
                                                                                </div>
                                                                                <!-- end of general info -->
                                                                            </div>
                                                                            <!-- end of col-lg-12 -->
                                                                        </div>
                                                                        <!-- end of row -->
                                                                    </div>
                                                                    <!-- end of view-info -->
                                                                    
                                                                </div>
                                                                <!-- end of card-block -->
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                        <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page header start -->
                                    
                                    
                                    <!-- Page header end -->
                                    <!-- Page body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                            
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page body end -->
                                </div>
                            </div>
                            <!-- Main-body end -->
                            
                                                                </div>
                                                            </div>
                                                            <!-- personal card end-->
                                                                <!--fin informacion de referencia-->
                        <div class="main-body">
                            <div class="page-wrapper">
                                
                                
                                <!-- Page header end -->
                                <!-- Page body start -->
                                <div class="page-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                           
                                               
                                        </div>
                                    </div>
                                </div>
                                <!-- Page body end -->
                            </div>
                        </div>
                        <!-- Main-body end -->
                        
                                                            </div>
                                                        </div>
                                                        <!-- personal card end-->
                                                    </div>
                                                    <!-- tab pane personal end -->
                                                    <!-- tab pane info start -->
                                                    <div class="tab-pane" id="binfo" role="tabpanel">
                                                            <!--Inicio informacion de co-aplicante-->
                                                        <!-- personal card start -->
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5 class="card-header-text">Informacion de co-aplicante</h5>
                                                            </div>
                                                            <div class="card-block">
                                                                <div class="view-info">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="general-info">
                                                                                <div class="row">
                                                                                    <div class="col-lg-12 col-xl-6">
                                                                                        <div class="table-responsive">
                                                                                            <table class="table m-0">
                                                                                                <tbody>

                                                                                                    <?php
                                                                                                    
                                                                                                        if(count($res_co) > 0)
                                                                                                        {
                                                                                                            $con_co = true;
                                                                                                        }
                                                                                                        else{
                                                                                                            $con_co = false;
                                                                                                        }

                                                                                                    ?>

                                                                                                    <tr>
                                                                                                        <th scope="row">Primer Nombre</th>
                                                                                                        <td>
                                                                                                            <?php
                                                                                                                if($con_co == true)
                                                                                                                {
                                                                                                                    echo $res_co[0]["C_Primer_nombre"];
                                                                                                                }
                                                                                                                else if($con_co == false)
                                                                                                                {
                                                                                                                    echo ""; 
                                                                                                                }
                                                                                                            ?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Apellido</th>
                                                                                                        <td>
                                                                                                            <?php
                                                                                                                if($con_co == true)
                                                                                                                {
                                                                                                                    echo $res_co[0]["C_Apellido"];
                                                                                                                }
                                                                                                                else if($con_co == false)
                                                                                                                {
                                                                                                                    echo ""; 
                                                                                                                }
                                                                                                            ?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Numero de seguro social</th>
                                                                                                        <td>
                                                                                                            <?php
                                                                                                                if($con_co == true)
                                                                                                                {
                                                                                                                    echo $res_co[0]["C_N_seguro_social"];
                                                                                                                }
                                                                                                                else if($con_co == false)
                                                                                                                {
                                                                                                                    echo ""; 
                                                                                                                }
                                                                                                            ?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Numero de Licencia de Conducir</th>
                                                                                                        <td>
                                                                                                            <?php
                                                                                                                if($con_co == true)
                                                                                                                {
                                                                                                                    echo $res_co[0]["C_N_licencia_conducir"];
                                                                                                                }
                                                                                                                else if($con_co == false)
                                                                                                                {
                                                                                                                    echo ""; 
                                                                                                                }
                                                                                                            ?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Estado</th>
                                                                                                        <td>
                                                                                                            <?php
                                                                                                                if($con_co == true)
                                                                                                                {
                                                                                                                    echo $res_co[0]["C_Estado"];
                                                                                                                }
                                                                                                                else if($con_co == false)
                                                                                                                {
                                                                                                                    echo ""; 
                                                                                                                }
                                                                                                            ?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Vencimiento</th>
                                                                                                        <td>
                                                                                                            <?php
                                                                                                                if($con_co == true)
                                                                                                                {
                                                                                                                    echo $res_co[0]["C_Vencimiento"];
                                                                                                                }
                                                                                                                else if($con_co == false)
                                                                                                                {
                                                                                                                    echo ""; 
                                                                                                                }
                                                                                                            ?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Direccion</th>
                                                                                                        <td>
                                                                                                            <?php
                                                                                                                if($con_co == true)
                                                                                                                {
                                                                                                                    echo $res_co[0]["C_Direccion"];
                                                                                                                }
                                                                                                                else if($con_co == false)
                                                                                                                {
                                                                                                                    echo ""; 
                                                                                                                }
                                                                                                            ?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Fuente de ingreso extra</th>
                                                                                                        <td>
                                                                                                            <?php
                                                                                                                if($con_co == true)
                                                                                                                {
                                                                                                                    echo $res_co[0]["C_Fuente_ingreso_extra"];
                                                                                                                }
                                                                                                                else if($con_co == false)
                                                                                                                {
                                                                                                                    echo ""; 
                                                                                                                }
                                                                                                            ?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Zip empleo anterior</th>
                                                                                                        <td>
                                                                                                            <?php
                                                                                                                if($con_co == true)
                                                                                                                {
                                                                                                                    echo $res_co[0]["C_Zip_empleo_anterior"];
                                                                                                                }
                                                                                                                else if($con_co == false)
                                                                                                                {
                                                                                                                    echo ""; 
                                                                                                                }
                                                                                                            ?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Telefono Celular</th>
                                                                                                        <td>
                                                                                                            <?php
                                                                                                                if($con_co == true)
                                                                                                                {
                                                                                                                    echo $res_co[0]["C_Telefono_celular"];
                                                                                                                }
                                                                                                                else if($con_co == false)
                                                                                                                {
                                                                                                                    echo ""; 
                                                                                                                }
                                                                                                            ?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Zip</th>
                                                                                                        <td>
                                                                                                            <?php
                                                                                                                if($con_co == true)
                                                                                                                {
                                                                                                                    echo $res_co[0]["C_Zip"];
                                                                                                                }
                                                                                                                else if($con_co == false)
                                                                                                                {
                                                                                                                    echo ""; 
                                                                                                                }
                                                                                                            ?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Ciudad</th>
                                                                                                        <td>
                                                                                                            <?php
                                                                                                                if($con_co == true)
                                                                                                                {
                                                                                                                    echo $res_co[0]["C_Ciudad"];
                                                                                                                }
                                                                                                                else if($con_co == false)
                                                                                                                {
                                                                                                                    echo ""; 
                                                                                                                }
                                                                                                            ?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- end of table col-lg-6 -->
                                                                                    <div class="col-lg-12 col-xl-6">
                                                                                    <div class="table-responsive">
                                                                                        <table class="table">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <th scope="row">Ciudad empleo anterior</th>
                                                                                                    <td>
                                                                                                        <?php
                                                                                                            if($con_co == true)
                                                                                                            {
                                                                                                                echo $res_co[0]["C_Ciudad_empleo_anterior"];
                                                                                                            }
                                                                                                            else if($con_co == false)
                                                                                                            {
                                                                                                                echo ""; 
                                                                                                            }
                                                                                                        ?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <th scope="row">Estado empleo anterior</th>
                                                                                                    <td>
                                                                                                        <?php
                                                                                                            if($con_co == true)
                                                                                                            {
                                                                                                                echo $res_co[0]["C_Estado_empleo_anterior"];
                                                                                                            }
                                                                                                            else if($con_co == false)
                                                                                                            {
                                                                                                                echo ""; 
                                                                                                            }
                                                                                                        ?>
                                                                                                    </td>
                                                                                                <tr>
                                                                                                    <th scope="row">Empleador anterior</th>
                                                                                                    <td>
                                                                                                        <?php
                                                                                                            if($con_co == true)
                                                                                                            {
                                                                                                                echo $res_co[0]["C_Empleador_anterior"];
                                                                                                            }
                                                                                                            else if($con_co == false)
                                                                                                            {
                                                                                                                echo ""; 
                                                                                                            }
                                                                                                        ?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">Tipo de ingreso</th>
                                                                                                    <td>
                                                                                                        <?php
                                                                                                            if($con_co == true)
                                                                                                            {
                                                                                                                echo $res_co[0]["C_Tipo_ingreso"];
                                                                                                            }
                                                                                                            else if($con_co == false)
                                                                                                            {
                                                                                                                echo ""; 
                                                                                                            }
                                                                                                        ?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">Posicion empleo</th>
                                                                                                    <td>
                                                                                                        <?php
                                                                                                            if($con_co == true)
                                                                                                            {
                                                                                                                echo $res_co[0]["C_Posicion_empleo"];
                                                                                                            }
                                                                                                            else if($con_co == false)
                                                                                                            {
                                                                                                                echo ""; 
                                                                                                            }
                                                                                                        ?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">Tiempo en el empleo</th>    
                                                                                                    <td>
                                                                                                        <?php
                                                                                                            if($con_co == true)
                                                                                                            {
                                                                                                                echo $res_co[0]["C_Tiempo_empleo"];
                                                                                                            }
                                                                                                            else if($con_co == false)
                                                                                                            {
                                                                                                                echo ""; 
                                                                                                            }
                                                                                                        ?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">Direccion Empleo</th>
                                                                                                    <td>
                                                                                                        <?php
                                                                                                            if($con_co == true)
                                                                                                            {
                                                                                                                echo $res_co[0]["C_Direccion_empleo"];
                                                                                                            }
                                                                                                            else if($con_co == false)
                                                                                                            {
                                                                                                                echo ""; 
                                                                                                            }
                                                                                                        ?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">Nombre empleo </th>
                                                                                                    <td>
                                                                                                        <?php
                                                                                                            if($con_co == true)
                                                                                                            {
                                                                                                                echo $res_co[0]["C_Nombre_empleo"];
                                                                                                            }
                                                                                                            else if($con_co == false)
                                                                                                            {
                                                                                                                echo ""; 
                                                                                                            }
                                                                                                        ?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">Zip Anterior</th>
                                                                                                    <td>
                                                                                                        <?php
                                                                                                            if($con_co == true)
                                                                                                            {
                                                                                                                echo $res_co[0]["C_Zip_anterior"];
                                                                                                            }
                                                                                                            else if($con_co == false)
                                                                                                            {
                                                                                                                echo ""; 
                                                                                                            }
                                                                                                        ?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">Estado Anterior</th>
                                                                                                    <td>
                                                                                                        <?php
                                                                                                            if($con_co == true)
                                                                                                            {
                                                                                                                echo $res_co[0]["C_Estado_anterior"];
                                                                                                            }
                                                                                                            else if($con_co == false)
                                                                                                            {
                                                                                                                echo ""; 
                                                                                                            }
                                                                                                        ?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">Ciudad Anterior</th>
                                                                                                    <td>
                                                                                                        <?php
                                                                                                            if($con_co == true)
                                                                                                            {
                                                                                                                echo $res_co[0]["C_Ciudad_anterior"];
                                                                                                            }
                                                                                                            else if($con_co == false)
                                                                                                            {
                                                                                                                echo ""; 
                                                                                                            }
                                                                                                        ?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">Telefono Casa</th>
                                                                                                    <td>
                                                                                                        <?php
                                                                                                            if($con_co == true)
                                                                                                            {
                                                                                                                echo $res_co[0]["C_Telefono_casa"];
                                                                                                            }
                                                                                                            else if($con_co == false)
                                                                                                            {
                                                                                                                echo ""; 
                                                                                                            }
                                                                                                        ?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">Estado Ciudad</th>
                                                                                                    <td>
                                                                                                        <?php
                                                                                                            if($con_co == true)
                                                                                                            {
                                                                                                                echo $res_co[0]["C_Estado_ciudad"];
                                                                                                            }
                                                                                                            else if($con_co == false)
                                                                                                            {
                                                                                                                echo ""; 
                                                                                                            }
                                                                                                        ?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">Tiempo en la vivienda</th>
                                                                                                    <td>
                                                                                                        <?php
                                                                                                            if($con_co == true)
                                                                                                            {
                                                                                                                echo $res_co[0]["C_Cuanto_tiempo"];
                                                                                                            }
                                                                                                            else if($con_co == false)
                                                                                                            {
                                                                                                                echo ""; 
                                                                                                            }
                                                                                                        ?>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                    <!-- end of table col-lg-6 -->
                                                                                </div>
                                                                                <!-- end of row -->
                                                                            </div>
                                                                            <!-- end of general info -->
                                                                        </div>
                                                                        <!-- end of col-lg-12 -->
                                                                    </div>
                                                                    <!-- end of row -->
                                                                    
                                                                </div>
                                                                <!-- end of view-info -->
                                                               <!--fin informacion de referencia-->
                                                            </div>
                                                            <!-- end of card-block -->
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                    <!-- Main-body start -->
                                                            </div>
                                                        </div>
                                                        <!-- personal card end-->
                                                    </div>
                                                      
                                                    <!-- tab pane info end -->
                                                    <!-- tab pane contact start -->
                                                    <div class="tab-pane" id="contacts" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                
                                                                <!-- user contact card left side start -->
                                                                <div class="card">
                                                                    <div class="card-header contact-user"> 
                                                                        <h4>Analista Asignado</h4>
                                                                    </div>
                                                                    <div class="card-header contact-user">
                                                                        <img class="img-circle" src="assets/images/user-profile/contact-user.jpg" alt="contact-user">
                                                                        
                                                                        <h4>Angelica Ramos</h4>
                                                                    </div>
                                                                    <div class="card-block">
                                                                        <ul class="list-group list-contacts">
                                                                            <li class="list-group-item active"><a href="#">All Contacts</a></li>
                                                                            <li class="list-group-item"><a href="#">Recent Contacts</a></li>
                                                                            <li class="list-group-item"><a href="#">Favourite Contacts</a></li>
                                                                        </ul>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h4 class="card-title">Contacts<span class="f-15"> (100)</span></h4>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                                <!-- user contact card left side end -->
                                                            </div>
                                                            <div class="col-lg-9">
                                                                <div class="row">
                                                                    <!--Poner algo aqui-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <!-- tab content end -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                            </div>
                            <!-- Main body end -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
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
    <!-- Bootstrap date-time-picker js -->
    <script type="text/javascript" src="assets/pages/advance-elements/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="../bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="assets/pages/advance-elements/bootstrap-datetimepicker.min.js"></script>
    <!-- Date-range picker js -->
    <script type="text/javascript" src="../bower_components/bootstrap-daterangepicker/js/daterangepicker.js"></script>
    <!-- Date-dropper js -->
    <script type="text/javascript" src="../bower_components/datedropper/js/datedropper.min.js"></script>
    <!-- data-table js -->
    <script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <!-- ck editor -->
    <script src="assets/pages/ckeditor/ckeditor.js"></script>
    <!-- echart js -->
    <script src="assets/pages/chart/echarts/js/echarts-all.js" type="text/javascript"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="../bower_components/i18next/js/i18next.min.js"></script>
    <script type="text/javascript" src="../bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="../bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="../bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="assets/js/script.js"></script>
    <script src="assets/pages/user-profile.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/demo-12.js"></script>
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/js/jquery.mousewheel.min.js"></script>
</body>

</html>