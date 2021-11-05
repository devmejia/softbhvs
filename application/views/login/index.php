<!DOCTYPE html>
<html lang="es">
<head>
    <title><?php echo SITE_NAME;?> | Admin</title>
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


    <!-- Fuentes/iconos -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/icon/themify-icons/themify-icons.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/icon/icofont/css/icofont.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bower_components/sweetalert/dist/sweetalert.css">
</head>

<body class="fix-menu">
    <section class="login p-fixed d-flex text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">

                    <div class="login-card card-block auth-body">
                        <?php 
                        $attributes = array('role' => 'form', 'class' => 'md-float-material', 'method' => 'POST');
                        echo form_open('login/login_action', $attributes)
                        ?>
                            <div class="text-center h1 text-white">
                                <img src="<?php echo base_url(); ?>assets/images/auth/logo.png" alt="logo.png" width="250" height="250" class="img-fluid">
                            </div>
                            <fieldset class="shadow">
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">Iniciar Sesión</h3>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                        if(validation_errors())
                                        {
                                            echo '<div class="form-control form-bg-danger m-b-10 pb-0">' . validation_errors() . '</div>';
                                        }
                                        ?>

                                        <?php 
                                        if ($this->session->flashdata('danger')) 
                                        {
                                            echo '<div class="form-control form-bg-danger m-b-10">' . $this->session->flashdata('danger') . '</div>';
                                        } 
                                        ?>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon4">
                                        <i class="icofont icofont-ui-user"></i>
                                    </span>
                                    <input type="text" class="form-control" name="username" placeholder="Usuario">
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                <span class="input-group-addon" id="basic-addon4">
                                        <i class="icofont icofont-lock"></i>
                                    </span>
                                    <input type="password" class="form-control" name="password" placeholder="Contraseña">
                                    <span class="md-line"></span>
                                </div>
                                <div class="row m-t-25 text-left">
                                    <div class="col-sm-7 col-xs-12">
                                        <div class="checkbox-fade fade-in-primary">
                                            <label>
                                                <input type="checkbox" value="">
                                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse">Recordarme</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-xs-12 forgot-phone text-right">
                                        <a href="forgot-password.html" class="text-right f-w-600 text-inverse"> Olvidó su contraseña?</a>
                                    </div>
                                </div>

                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Ingresar</button>
                                    </div>
                                </div>
                            </div>
                            </fieldset>
                        <?php
                        form_close();
                        ?>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Alerta!!</h1>
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

<?php if ($this->session->flashdata('alert-success-time')) { ?>
    <div id="type-alertsuccess-time">
        <input type="hidden" id="descalertsuccess-time" value="<?php echo $this->session->flashdata('alert-success-time'); ?>" />
    </div>
<?php } ?>

<?php if ( $this->session->flashdata('alert-danger-time') ) { ?>
    <div id="type-alertdanger-time">
        <input type="hidden" id="descalertdanger-time" value="<?php echo $this->session->flashdata('alert-danger-time'); ?>" />
    </div>
<?php } ?>


    <script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/tether/dist/js/tether.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/classie/classie.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/sweetalert/dist/sweetalert.min.js"></script>
    
    <?php if ( $this->session->flashdata('alert-success-time') ) { ?>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/swalsuccesstime.js"></script>
    <?php } ?>

    <?php if ( $this->session->flashdata('alert-danger-time') ) { ?>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/swaldangertime.js"></script>
    <?php } ?>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/modernizr/feature-detects/css-scrollbars.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/modalEffects.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/classie.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/i18next/i18next.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/jquery-i18next/jquery-i18next.min.js"></script>

</body>

</html>