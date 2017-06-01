<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>/../plantilla/assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>AisecCam</title>


        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />


        <!-- Bootstrap core CSS     -->
        <link href="<?php echo base_url(); ?>/../plantilla/assets/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="<?php echo base_url(); ?>/../plantilla/assets/css/animate.min.css" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="<?php echo base_url(); ?>/../plantilla/assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="<?php echo base_url(); ?>/../plantilla/assets/css/demo.css" rel="stylesheet" />


        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <div>
        <?php foreach ($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>
        <?php foreach ($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>
    </div>
    
</head>
<body>

    <div class="wrapper">
        <div class="sidebar" data-color="blue" data-image="<?php echo base_url(); ?>/../plantilla/assets/img/aiesec.png">

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
                            <i class="pe-7s-user"></i>
                            <p>Lugares</p>
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
                            <i class="pe-7s-news-paper"></i>
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
                            <i class="pe-7s-map-marker"></i>
                            <p>Enviar QR</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('aieseccontroller/generador_qr'); ?>">
                            <i class="pe-7s-bell"></i>
                            <p>Usuarios incritos a un ventos</p>
                        </a>
                    </li>
                    <li class="active-pro">
                        <a href="<?php echo site_url('aieseccontroller/codigo_qr'); ?>">
                            <i class="pe-7s-rocket"></i>
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
                                            <a href="<?php echo site_url('ingresocontroller/serrar_session') ?>">
                                                Salir
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                </div>
                                </nav>

                                <!-- en este sitio se a colocado la parte de imprimir de las tablas -->
                                <div style='height:20px;'></div>  
                                <div>
                                    <?php echo $output; ?>
                                </div>


                                <div class="content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div class="header">
                                                        <h4 class="title">hola  </h4>
                                                        <p class="category">Last Campaign Performance</p>
                                                    </div>
                                                    <div class="content">
                                                        <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                                                        <div class="footer">
                                                            <div class="legend">
                                                                <i class="fa fa-circle text-info"></i> Open
                                                                <i class="fa fa-circle text-danger"></i> Bounce
                                                                <i class="fa fa-circle text-warning"></i> Unsubscribe
                                                            </div>
                                                            <hr>
                                                            <div class="stats">
                                                                <i class="fa fa-clock-o"></i> Campaign sent 2 days ago
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-8">
                                                <div class="card">
                                                    <div class="header">
                                                        <h4 class="title">Users Behavior</h4>
                                                        <p class="category">24 Hours performance</p>
                                                    </div>
                                                    <div class="content">
                                                        <div id="chartHours" class="ct-chart"></div>
                                                        <div class="footer">
                                                            <div class="legend">

                                                            </div>
                                                            <hr>
                                                            <div class="stats">
                                                                <i class="fa fa-history"></i> Updated 3 minutes ago
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card ">
                                                    <div class="header">
                                                        <h4 class="title">2014 Sales</h4>
                                                        <p class="category">All products including Taxes</p>
                                                    </div>
                                                    <div class="content">
                                                        <div id="chartActivity" class="ct-chart"></div>

                                                        <hr>
                                                        <div class="stats">
                                                            <i class="fa fa-check"></i> Data information certified
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="card ">
                                                <div class="header">
                                                    <h4 class="title">Tasks</h4>
                                                    <p class="category">Backend development</p>
                                                </div>
                                                <div class="content">
                                                    <div class="table-full-width">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox">
                                                                            <input type="checkbox" value="" data-toggle="checkbox">
                                                                        </label>
                                                                    </td>
                                                                    <td>Sign contract for "What are conference organizers afraid of?"</td>
                                                                    <td class="td-actions text-right">
                                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                                            <i class="fa fa-edit"></i>
                                                                        </button>
                                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                                            <i class="fa fa-times"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox">
                                                                            <input type="checkbox" value="" data-toggle="checkbox" checked="">
                                                                        </label>
                                                                    </td>
                                                                    <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                                                    <td class="td-actions text-right">
                                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                                            <i class="fa fa-edit"></i>
                                                                        </button>
                                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                                            <i class="fa fa-times"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox">
                                                                            <input type="checkbox" value="" data-toggle="checkbox" checked="">
                                                                        </label>
                                                                    </td>
                                                                    <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                                                                    </td>
                                                                    <td class="td-actions text-right">
                                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                                            <i class="fa fa-edit"></i>
                                                                        </button>
                                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                                            <i class="fa fa-times"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox">
                                                                            <input type="checkbox" value="" data-toggle="checkbox">
                                                                        </label>
                                                                    </td>
                                                                    <td>Create 4 Invisible User Experiences you Never Knew About</td>
                                                                    <td class="td-actions text-right">
                                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                                            <i class="fa fa-edit"></i>
                                                                        </button>
                                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                                            <i class="fa fa-times"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox">
                                                                            <input type="checkbox" value="" data-toggle="checkbox">
                                                                        </label>
                                                                    </td>
                                                                    <td>Read "Following makes Medium better"</td>
                                                                    <td class="td-actions text-right">
                                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                                            <i class="fa fa-edit"></i>
                                                                        </button>
                                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                                            <i class="fa fa-times"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label class="checkbox">
                                                                            <input type="checkbox" value="" data-toggle="checkbox">
                                                                        </label>
                                                                    </td>
                                                                    <td>Unfollow 5 enemies from twitter</td>
                                                                    <td class="td-actions text-right">
                                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                                            <i class="fa fa-edit"></i>
                                                                        </button>
                                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                                            <i class="fa fa-times"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <div class="footer">
                                                        <hr>
                                                        <div class="stats">
                                                            <i class="fa fa-history"></i> Updated 3 minutes ago
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>



                                <footer class="footer">
                                    <div class="container-fluid">
                                        <nav class="pull-left">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        Home
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        Company
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        Portfolio
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        Blog
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                        <p class="copyright pull-right">
                                            &copy; 2017 <a href="http://www.uptc.com">Trabajo de campo</a>, Docente Mauro Callejas
                                        </p>
                                    </div>
                                </footer>

                                </div>
                                </div>


                                </body>

                                <!--   Core JS Files   -->
                                <script src="<?php echo base_url(); ?>/../plantilla/assets/js/jquery-1.10.2.js" type="text/javascript"></script>
                                <script src="<?php echo base_url(); ?>/../plantilla/assets/js/bootstrap.min.js" type="text/javascript"></script>

                                <!--  Checkbox, Radio & Switch Plugins -->
                                <script src="<?php echo base_url(); ?>/../plantilla/assets/js/bootstrap-checkbox-radio-switch.js"></script>

                                <!--  Charts Plugin -->
                                <script src="<?php echo base_url(); ?>/../plantilla/assets/js/chartist.min.js"></script>

                                <!--  Notifications Plugin    -->
                                <script src="<?php echo base_url(); ?>/../plantilla/assets/js/bootstrap-notify.js"></script>

                                <!--  Google Maps Plugin    -->
                                <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

                                <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
                                <script src="<?php echo base_url(); ?>/../plantilla/assets/js/light-bootstrap-dashboard.js"></script>

                                <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
                                <script src="<?php echo base_url(); ?>/../plantilla/assets/js/demo.js"></script>

                                <script type="text/javascript">
                                    $(document).ready(function () {

                                        demo.initChartist();

                                        $.notify({
                                            icon: 'pe-7s-gift', message: "Bienvenido a  <b>Eventos AIESEC</b> - el liderazgo es poder."

                                        }, {
                                            type: 'info',
                                            timer: 4000
                                        });

                                    });
                                </script>

                                </html>
