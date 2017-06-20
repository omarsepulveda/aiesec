<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Activar usuarios</title>
    </head>
    <body>
        
        <div id="container">
            <h1>Activar usuarios </h1>
            <div id="body">
                <table class="table table-striped" border="2" >
                    <tr>
                        <th>Correo </th>
                        <th>Nombre</th>
                        <th>Foto</th>
                        <th>Activar</th>

                    </tr>
                    <?php
                    
                   // foreach ($correo as $fila) {
                        ?>
                        <tr>
                            <th><?= $fila->email; ?></th>
                            <th><?= $fila->nombres; ?></th>
                       <!--  <img src="<?php echo sprintf("data:image/jpg;base64", base64_decode($fila->FOTO));?>" />-->
                           
     
                                
                            <th><img src="data:image/jpeg;base64,<?php= echo base64_decode($fila->foto); ?>"/></th> 
                            <th><a href="">Acivar</a></th>

                        </tr>
                        <?php
                 //  }
                    ?>  
                </table>

            </div>
        </div>

    </body>
</html>
