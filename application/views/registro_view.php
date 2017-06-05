<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Formulario de registro</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?> /../plantilla/assets/css/demo2.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?> /../plantilla/assets/css/estilos.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?> /../plantilla/assets/css/animate" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?> /../plantilla/assets/css/animate" />

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?> /../plantilla/assets/css/registro.css" /> 
        <link href="<?php echo base_url(); ?>/../plantilla/alertifyjs/css/alertify.css" rel="stylesheet"/>
        <script src="<?php echo base_url(); ?>/../plantilla/alertifyjs/alertify.js" type="text/javascript"></script>
    </head>

    <body>
        <script type="text/javascript">
            
        function enviarFormulario(){
            var cedula=document.getElementById("documento").value;
            if(!cedula==""){
                document.getElementById("form-login").submit();
            }else{
               alertify.error("Digite cedula");
               
            }
            
        }
    </script>
        <?php
        if (isset($registro)){
            ?>
        <script type="text/javascript">
                alertify.error("El usuario ya existe");
            </script>
            <?php
        }
        ?>

        <div id="registrar">



        </div>
        <div id="envoltura">
            <div id="contenedor">


                <div id="cabecera">

                    <nav class="codrops-demos">
                        <h1><strong>Formulario para registrarse <span>AIESEC</span></strong></h1>

                    </nav>

                </div>

                <div id="cuerpo">

                    <form id="form-login"  action="<?= base_url() . 'index.php/ingresocontroller/registrar' ?>" method="post" >
                         <?php echo form_open('index.php/ingresocontroller/validacion'); ?>
                        <p><label for="documento">Documento:</label></p>
                        <input name="DOCUMENTO" type="text" id="documento" class="nombre"  required="Este campo es requerido" ceholder="Numero de documento" autofocus=""/></p>

                        <!--=============================================================================================-->
                        <!--La sisguientes 2 líneas son para agregar campos al formulario con sus respectivos labels-->
                        <!--Puedes usar tantas como necesites-->
                        <p><label for="nombres">Nombres:</label></p>
                        <input name="NOMBRES" required="Este campo es requerido" type="text" plarequired="Este campo es requerido" id="apellidos" class="apellidos" placeholder="Ingrese nombres" /></p>
                        <p><label for="nombres">Apellidos:</label></p>
                        <input name="APELLIDOS" required="Este campo es requerido" type="text" id="apellidos" class="apellidos" placeholder="Ingrese apellidos" /></p>
                        <p><label for="nombres">Tipo de asistente:</label></p>
                        <SELECT NAME="selCombo" SIZE=1 > 
                            <OPTION VALUE="Trabajador">Trabajador</OPTION>
                            <OPTION VALUE="No trabajador">No trabajador</OPTION>
                        </SELECT>
       <!-- <input name="TIPO" required="Este campo es requerido" type="text" id="apellidos" class="apellidos" placeholder="Tipo de documento" /></p>-->
                        <p><label for="nombres">Correo:</label></p>
                        <input name="EMAIL" required="Este campo es requerido" type="text" id="apellidos" class="apellidos" placeholder="correo@gemail.com" /></p>
                        <!--=============================================================================================-->

                        <p><label for="pass">Contraseña:</label></p>
                        <input name="CLAVE" required="Este campo es requerido" type="password" id="pass" class="pass" placeholder="Ingrese contraseña"/></p>

                        <p><label for="CLAVE1">Repetir contraseña:</label></p>
                        <input name="repass" required="Este campo es requerido" type="password" id="repass" class="repass" placeholder="Repite contraseña" /></p>

                    </form>
                    <p id="bot"><button onclick="enviarFormulario()" class="boton">Registrarse</button></p>
                </div>

                <div id="pie"> <button  id="boton" ><a href="<?= base_url() . 'index.php/ingresocontroller/login' ?>"</a>Regresar</a> </button></div>
            </div><!-- fin contenedor -->

        </div


    </body
    
</html>