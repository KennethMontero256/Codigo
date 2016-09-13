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
        include_once '../../core/Data/DataProducto.php';
        include_once '../../core/Domain/Producto.php';
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
        
        $productos = getProductos();
        
        ?>
        
        <div id="contenedorVenta">

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

            <script>   
                        var i = 0;

function duplicate2(){
    var myDiv = document.getElementById("producto0"); //Obtiene el objeto por el id
    var divPops = document.getElementById("detalle"); //Obtiene le padre del div
    var divClone = myDiv.cloneNode(true); // crea un clon profundo
    divClone.id = "producto" + ++i; // mantiene un contador para crear divs con id diferente
    divPops.appendChild(divClone); //agrega el clone al padre
}
            </script> 
            
            
            <div id="detalle">
                <div id="producto0">

                    <label>Codigo producto:</label>
                    <input type="text" value="">
                    
                    <label>Nombre prodcuto:</label>
                    
                    <select>
                        <ul>
                            <?php
                            for ($i = 0; $i < count($productos); $i++) {
                                echo '<option value="' . $productos[$i]->getCodigoProducto() . '">' . $productos[$i]->getNombre() . '</option>';
                            }
                            ?>
                        </ul>
                    </select>
                    
                    <label>Cantidad</label>
                    <input type="number">
                    
                    <label>Total Linea</label>
                    <input type="number" value="" readonly>
                    
                    
                </div>
                
                
            </div>
            <input type="button" onclick="duplicate2()">
        </div>
        </div>
    </body>
</html>
