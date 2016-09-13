<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <?php
        include_once '../../core/Data/DataVenta.php';
        ?>
        <title></title>
    </head>
    <body>
        <?php
        $vector = getTotalVentas();
        ?>
        
        <div id="contenedorVenta">
            <div id="informacionVenta"
                 <div id="codigo" class="form-group ">
                    <label for="codigo">codigo:</label>
                    <input id="codigo" type="text" class="form-control" value="<?php echo $vector[0]->getNombre(); ?>" readonly> 
                </div>
            </div>
        </div>
    </body>
</html>
