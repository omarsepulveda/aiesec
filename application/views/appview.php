<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Insert con codeIgniter</title>
      
    </head>
    <body>
        <div>
            <a href='<?php echo site_url('/app/listarUsuarios') ?>'>listar usuarios</a> 
            
            <a href='<?php echo site_url('/app/CargarTablaPersonas') ?>'>Usuarios</a>  
        </div>
        
        <div>
            <table border="1">
                <tr>
                    <td>
                        Nombres
                    </td>
                    <td>
                        Apellidos
                    </td>
                    <td>
                        Accion
                    </td>
                    <td>
                        Accion
                    </td>
                </tr>
                <?php foreach ($datos as $d){ ?>
                <tr>
                    <td>
                        <?=$d->nombres;?>
                    </td>
                    <td>
                        <?=$d->numeroDocumento;?>
                    </td>
                    <td>
                        <a href="">Modificar</a>
                    </td>
                    <td>
                        <a href="<?php echo site_url('/app/eliminarUsuario?cedula='.$d->numeroDocumento) ?>">Eliminar</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
        

        <form action="<?= base_url() . 'index.php/app/registrarUsuario' ?>"method="post">
            <h1>Ingreso de datos de usuario</h1>
            <label>Numero de documento</label><input type="text" name="numeroDocumento"></input><br/>
            <label>nombres</label><input type="text" name="nombres"></input><br/>
            <label>apellidos</label><input type="text" name="apellidos"></input><br/>
            <label>Tipo de ducumento</label><input type="text" name="tipoDocumento"></input><br/>
            <label>correo</label><input type="text" name="correo"></input><br/>
            <label>telefono</label><input type="text" name="telefono"></input><br/>
            <label>contrasena</label><input type="text" name="contrasena"></input><br/>
            <!--<label>area</label><input type="text" name="area"></input><br/> -->
            <input type="submit" value="Enviar" /><br/>
            <input type="button" value="Listar usuarios"/>
        </form>
    </body>
</html>