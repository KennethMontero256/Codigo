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
        //include_once("../../core/Data/DataVenta.php");
        include_once '../../core/Data/DataVenta.php';
        ?>
        <title></title>
    </head>
    <body>
        <?php
        $totalventas = getTotalVentas();

        $hoy = getdate();
        //print_r($hoy);

        $d = $hoy['mday'];
        $m = $hoy['mon'];
        $y = $hoy['year'];
        
        
        ?>
        
        <div id="contenedorVenta">
<<<<<<< HEAD
            <div id="informacionVenta">

                 <label>codigo:</label>
                <input id="codigo" type="text" value="<?php print_r($totalventas); ?>" readonly> 

                <label>Sucursal:</label>
                <input type="text" value="<?php ?>" readonly>

                <label>Fecha y hora</label>
                <input type="datetime" value="<?php echo $d . ' ' . $m . ' ' . $y ?>" readonly>

                <label>Empleado:</label>
                <input type="text" value="" readonly>
                
            </div>
            
            <div id="detalle">
                <div id="producto">
                    
=======
<<<<<<< HEAD
            <div id="informacionVenta">
                 <div id="codigo" class="form-group ">
                    <label for="codigo">codigo:</label>
                    <input id="codigo" type="text" class="form-control" value="<?php echo $vector[0]->getNombre(); ?>" readonly> 
=======
            <div id="informacionVenta"
                 <div id="codigo">
                    <label>codigo:</label>
                    <input id="codigo" type="text" value="<?php echo 'nada' ?>" readonly> 
>>>>>>> 7087b32482ccc694ce2791a84882ffce8a02e3c0
>>>>>>> ce06e06185d4f80ff55fcd359fc49eadf026a10f
                </div>
            </div>
        </div>
        </div>
    </body>
</html>
