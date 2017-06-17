<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="<?php echo base_url('/../plantilla/assets/img/favicon.ico'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>AisecCam</title>


        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />


        <!-- Bootstrap core CSS     -->
        <link href="<?php echo base_url('/plantilla/assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="<?php echo base_url('/plantilla/assets/css/animate.min.css'); ?>" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="<?php echo base_url('/plantilla/assets/css/light-bootstrap-dashboard.css'); ?>" rel="stylesheet"/>


        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="<?php echo base_url('/plantilla/assets/css/demo.css'); ?>" rel="stylesheet" />

         <link href="<?php echo base_url('/plantilla/assets/css/pe-icon-7-stroke.css'); ?>" rel="stylesheet" />

</head>
<body>

    <div class="wrapper">
        <div class="sidebar" data-color="blue" data-image="<?php echo base_url('/plantilla/assets/img/aiesec.png'); ?>">

            <!--
        
                Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
                Tip 2: you can also add an image using data-image tag
        
            -->

            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="" class="simple-text">
                        EVENTOS
                    </a>
                </div>

                <ul class="nav">
                    <li class="active">
                       
                        <a href='<?php echo site_url('aieseccontroller/area_management') ?>'>
                            <i class="pe-7s-graph"></i>
                            <p>Area de trabajo</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('aieseccontroller/lugares_management'); ?>"> 
                            <i class="pe-7s-map-marker"></i>
                            <p>Lugares</p>
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo site_url('aieseccontroller/consultarCorrreo'); ?>"> 
                            <i class="pe-7s-map-marker"></i>
                            <p>consulta</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('aieseccontroller/detalles_management'); ?>">
                            <i class="pe-7s-note2"></i>
                            <p>Detalles de eventos</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('aieseccontroller/personas_management'); ?>">
                            <i class="pe-7s-user"></i>
                            <p>Usuarios</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('aieseccontroller/eventos_management'); ?>">
                            <i class="pe-7s-science"></i>
                            <p>Eventos</p>
                        </a>
                    </li>
                    <li>

                        <a href="<?php echo site_url('aieseccontroller/enviar_qr'); ?>">
                            <i class="pe-7s-rocket"></i>
                            <p>Enviar QR</p>
                        </a>
                    </li>
                    <li>
                        
                          <a href="https://drive.google.com/drive/u/0/folders/0B_kfJjQhO_dWOHBJN2RtbFJKb3c">
                            <i class="pe-7s-news-paper"></i>
                            <p>documentación</p>
                        </a>
                    </li>
                    <li class="active-pro">
                        <a href="<?php echo site_url('aieseccontroller/codigo_qr'); ?>">
                            <i class="pe-7s-bluetooth"></i>
                            <p>Generador de QR</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-panel" >
            <nav class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="navbar-header,colorChooser">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="">
                            <strong> <a class="navbar-brand" href="#"><font color="blue" size=20>AIESEC</font></strong>
                        </a>     
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-dashboard"></i>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret"></b>
                                    <span class="notification">5</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Notification 1</a></li>
                                    <li><a href="#">Notification 2</a></li>
                                    <li><a href="#">Notification 3</a></li>
                                    <li><a href="#">Notification 4</a></li>
                                    <li><a href="#">Another notification</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-search"></i>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="">
                                    Cuenta
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Dropdown
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?php echo site_url('ingresocontroller/cerrar_session') ?>">
                                    Cerrar sesión
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- en este sitio se a colocado la parte de imprimir de las tablas -->
            <div style='height:20px;'></div> 
            <?php foreach ($css_files as $file): ?>
                <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
            <?php endforeach; ?>
            <?php foreach ($js_files as $file): ?>
                <script src="<?php echo $file; ?>"></script>
            <?php endforeach; ?>
            <?php echo $output; ?>


        </div>
    

        <footer class="footer">
            <div class="container-fluid">

                <p class="copyright pull-right">
                    &copy; 2017 <a >Universidad Pedagógica y Tecnológica de Colombia</a>, Docente Mauro Callejas
                </p>
            </div>
        </footer>

    </div>
</div>

</html>
