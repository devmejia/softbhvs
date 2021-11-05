<!DOCTYPE html>
<html lang="es-Es">
<head>
    <title><?php echo SITE_NAME;?> | <?php echo $view; ?></title>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Banco de Hojas de Vida para las personas de San Bernardo del Viento">
    <meta name="keywords" content=", hoja, vida, CV, Curriculum Vitae, hoja de vida, curriculum, vitae, empleo, laboral, trabajo, ejercer, cargo, puesto, labor">
    <meta name="author" content="EdinsonMejiaDev">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo base_url(); ?>assets/images/favicon/site.webmanifest">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/icon/themify-icons/themify-icons.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/icon/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/icon/icofont/css/icofont.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/pages/flag-icon/flag-icon.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/pages/menu-search/css/component.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/pages/dashboard/horizontal-timeline/css/style.css">

    <!-- datatable -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <!-- ./datatable -->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-multiselect/dist/css/bootstrap-multiselect.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bower_components/multiselect/css/multi-select.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/dropify/dist/css/dropify.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bower_components/sweetalert/dist/sweetalert.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/color/color-1.css" id="color" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/linearicons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/simple-line-icons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/ionicons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery.mCustomScrollbar.css">
</head>
<body>
    <div class="theme-loader">
        <div class="ball-scale">
            <div></div>
        </div>
    </div>

    <input type="hidden" id="baseurl" value="<?php echo base_url();?>">

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <!-- nav cabecera -->
            <nav class="navbar header-navbar pcoded-header" header-theme="theme5">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <a href="index-2.html">
                            <img class="img-fluid" src="<?php echo base_url();?>assets/images/logo.png" alt="Theme-Logo" />
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
                            <ul class="nav-right">
                                <li class="user-profile header-notification">
                                    <a href="#!">
                                        <img src="<?php echo base_url();?>assets/images/user.png" alt="User-Profile-Image">
                                        <span><?php echo $this->session->userdata('nickname');?></span>
                                        <i class="ti-angle-down"></i>
                                    </a>
                                    <ul class="show-notification profile-notification">
                                        <li>
                                            <a href="user-profile.html">
                                                <i class="ti-user"></i> Perfil
                                            </a>
                                        </li>
                                        <li>
                                            <a href="auth-lock-screen.html">
                                                <i class="ti-lock"></i> Cambiar contraseña
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('login/logout');?>">
                                                <i class="ti-layout-sidebar-left"></i> Cerrar sesión
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </nav>
            <!-- ./ nav cabecera -->

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                    <!--  nav izquierda -->
                    <nav class="pcoded-navbar" pcoded-header-position="relative">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="">
                                <div class="main-menu-header">
                                    <img class="img-40" src="<?php echo base_url();?>assets/images/user.png" alt="User-Profile-Image">
                                    <div class="user-details">
                                        <span><?php echo $this->session->userdata('nickname');?></span>
                                        <span id="more-details">Administrador<i class="ti-angle-down"></i></span>
                                    </div>
                                </div>
                                <div class="main-menu-content">
                                    <ul>
                                        <li class="more-details">
                                            <a href="user-profile.html"><i class="ti-user"></i>Perfil</a>
                                            <a href="#!"><i class="ti-lock"></i>Cambiar contraseña</a>
                                            <a href="#!"><i class="ti-layout-sidebar-left"></i>Cerrar sesión</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation" menu-title-theme="theme1">Navegación</div>
                            
                            <!-- Menu  -->
                            <ul id="lista_menu" class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu <?php echo $itemview == "dashboard" ? 'active' : '' ?> nonedropdown">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-home"></i></span>
                                        <span class="pcoded-mtext">Inicio</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="pcoded-hasmenu <?php echo $itemview == "addcandidatos" || $itemview == "listcandidatos" ? 'active pcoded-trigger complete' : '' ?> <?php echo $itemview == "profilecandidatos" || $itemview == "editcandidatos" ? 'active':''?>">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-user"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.page_layout.main">Candidatos</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="<?php echo $itemview == "addcandidatos" ? 'active' : '' ?>">
                                            <a href="<?php echo base_url('candidatos/add');?>" data-i18n="nav.page_layout.bottom-menu">
                                                <span class="themifyIcon"><i class="ti-angle-right"></i></span>
                                                <span class="mtext">Agregar candidato</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="<?php echo $itemview == "listcandidatos" ? 'active' : '' ?>">
                                            <a href="<?php echo base_url('candidatos');?>" data-i18n="nav.page_layout.box-layout">
                                                <span class="themifyIcon"><i class="ti-angle-right"></i></span>
                                                <span class="mtext">Listar candidatos</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-crown"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.page_layout.main">Lideres</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="menu-bottom.html" data-i18n="nav.page_layout.bottom-menu">
                                                <span class="themifyIcon"><i class="ti-angle-right"></i></span>
                                                <span class="mtext">Agregar lider</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="box-layout.html" data-i18n="nav.page_layout.box-layout">
                                                <span class="themifyIcon"><i class="ti-angle-right"></i></span>
                                                <span class="mtext">Listar lideres</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="icofont icofont-badge"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.page_layout.main">Profesiones</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="menu-bottom.html" data-i18n="nav.page_layout.bottom-menu">
                                                <span class="themifyIcon"><i class="ti-angle-right"></i></span>
                                                <span class="mtext">Agregar profesión</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="box-layout.html" data-i18n="nav.page_layout.box-layout">
                                                <span class="themifyIcon"><i class="ti-angle-right"></i></span>
                                                <span class="mtext">Listar profesión</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-settings"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.page_layout.main">Configuración</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="menu-bottom.html" data-i18n="nav.page_layout.bottom-menu">
                                                <span class="themifyIcon"><i class="ti-angle-right"></i></span>
                                                <span class="mtext">Generos</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="box-layout.html" data-i18n="nav.page_layout.box-layout">
                                                <span class="themifyIcon"><i class="ti-angle-right"></i></span>
                                                <span class="mtext">Tipo documentos</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class=" ">
                                    <a href="widget.html" data-i18n="nav.widget.main">
                                        <span class="pcoded-micon"><i class="icofont icofont-info"></i></span>
                                        <span class="pcoded-mtext">Acerca de</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <!--  ./ Menu -->

                        </div>
                    </nav>
                    <!-- ./ nav izquierda -->

                    <!-- Contenedor -->
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">