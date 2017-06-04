<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> 
<html lang="spanish" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Ingerso al sistema</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?> /../plantilla/assets/css/demo2.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?> /../plantilla/assets/css/estilos.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?> /../plantilla/assets/css/animate" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?> /../plantilla/assets/css/animate" />
        <link href="<?php echo base_url(); ?>/../plantilla/alertifyjs/css/alertify.css" rel="stylesheet"/>
        <script src="<?php echo base_url(); ?>/../plantilla/alertifyjs/alertify.js" type="text/javascript"></script>
        
    </head>
    <body>
        <?php
        if (isset($inicio)){
            ?>
        <script type="text/javascript">
                alertify.error("Datos incorrectos");
            </script>
            <?php
            
        }
        ?>
            <?php
        if (isset($registro)){
            ?>
        <script type="text/javascript">
                alertify.success("Registro exitoso");
            </script>
            <?php
            
        }
        ?>
        
        <div class="container">

            <header>
                <h1>AIESEC <span>AIESEC</span></h1>
                <nav class="codrops-demos">

                </nav>
            </header>
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="<?= base_url() . 'index.php/ingresocontroller/login' ?>" method="POST" autocomplete="on"> 
                                <h1>Ingreso al sistema</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" >Correo </label>
                                    <input id="username" name="EMAIL" required="required" type="text" placeholder="usuario@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p">Contraseña </label>
                                    <input id="password" name="CLAVE" required="required" type="password" placeholder="*********" /> 
                                </p>

                                <p class="keeplogin"> 
                                    <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
                                    <label for="loginkeeping">Mantener sesión iniciada</label>
                                </p>
                                <p class="login button"> 
                                    <input type="submit" value="Login" /> 
                                </p>

                                <p class="change_link">
                                    No está Regitrado?
                                    <a href="<?= base_url() . 'index.php/ingresocontroller/registro' ?>" class="to_register">Registrese aqui</a>
                                </p>

                            </form>


                        </div>
                    </div>  
            </section>
        </div>
    </body>
</html>