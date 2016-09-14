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
 
<!--            <select id="select" name="select">
                <?php
                        for ($index = 0; $index < count($productos); $index++) {
                            
                              echo '<option value="' . $productos[$i]->getCodigoProducto() . '">' . $productos[$i]->getNombre() . '</option>';
                            
                        }
                
                
                ?>
            </select>-->
            <input type="text" id="codigo" name="codigo">
            <input type="text" id="nombre" name="nombre">
            <input type="submit">
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
            
        </form>
        
    </body>
    
</html>
    
    