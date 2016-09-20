<html>
    <head>
        <?php
            include_once '../../Data/DataProducto.php';
            include_once '../../Data/DataSucursal2.php';
            include_once '../../Domain/Sucursal.php';
            include_once '../../Domain/Categoria.php';
            include_once '../../Data/DataCategoria.php';
            $sucursal= getSucursal();
            $categorias = getCategoria();
            
            
            //var_dump($sucursal);
        ?>
    </head>
    
    <body>
        <div>
            <form>
                <div id="">
                    <label>codigo</label>
                    <input type="text" name="codigo">
                </div>
                
                <div>
                    <label>Nombre</label>
                    <input type="text" name="nombre"> 
                </div>
                
                <div>
                    <label>Stock</label>
                    <input type="number" name="stock"> 
                </div>
                
                <div>
                    <label>Unidad de Medida</label>
                    <input type="text" name=unidadMedida> 
                </div>
                
                <div>
                    <label>Precio</label>
                    <input type="text" name="precio"> 
                </div>
                
                <div>
                    <label>Proveedor</label>
                    <input type="text" name="proveedor"> 
                </div>
                
                <div>
                    <label>Sucursal</label>
                    <select id="" name=sucursal"">
                        <ul>
                            <?php
                            for ($i = 0; $i < count($sucursal); $i++) {
                                echo '<option value="' . $sucursal[$i]->getCedulaJuridica() . '">' . $sucursal[$i]->getNombre() . '</option>';
                            }
                            ?>
                        </ul>
                    </select>

                </div>
                
                <div>
                    <label>Categoria</label>
                    <select id="" name=categoria"">
                        <ul>
                            <?php
                            for ($i = 0; $i < count($categorias); $i++) {
                                echo '<option value="' . $categorias[$i]->getCodigoCategoria() . '">' . $categorias[$i]->getNombre() . '</option>';
                            }
                            ?>
                        </ul>
                    </select>
                </div>
                
                
                
                <input type="submit">
            </form>
        </div>
        
    </body>
    
</html>
    
    