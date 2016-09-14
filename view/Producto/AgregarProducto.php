<html>
    <head>
        <?php
            include_once '../../core/Data/DataProducto.php';
            $productos= getProductos();
            
        ?>
    </head>
    
    <body>
        
        <label>
            
            
        </label>
        <form method="post" action="../../core/Business/ProductoControlador.php">
 
<!-
            
            <div id="contenedorProducto">

            <div id="informacionProducto">

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
                <div id="producto0">

                    <label id="lbCod">Codigo producto:</label>
                    <input id="codigo" type="text" value="" id="codigoProducto">
                    
                    <label id="lbNombre">Nombre producto:</label>
                    
                    <select id="comboProductos" onclick="getValueComboToInput()">
                        <ul>
                            <?php
                            for ($i = 0; $i < count($productos); $i++) {
                                echo '<option value="' . $productos[$i]->getCodigoProducto() . '">' . $productos[$i]->getSucursal() . '</option>';
                            }
                            ?>
                        </ul>
                    </select>
                    
                    <label id="lbCantidad">Cantidad</label>
                    <input id="cantdad" type="number">
                    
                 
                    
                    <input id="delete" type="button" value="X" onclick="deleteDiv(this)">
                </div>
                
                
            </div>
            <input type="button" onclick="duplicate2()">
        </div>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
            
        </form>
        
    </body>
    
</html>
    
    