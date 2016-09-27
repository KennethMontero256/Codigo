<html>
    <head>
        <?php
            include_once '../../Data/DataProducto.php';
            include_once '../../Data/DataSucursal2.php';
            include_once '../../Domain/Sucursal.php';
            include_once '../../Domain/Categoria.php';
            include_once '../../Data/DataCategoria.php';
            include_once '../../Domain/Proveedor.php';
            include_once '../../Data/DataProveedor.php';
            $sucursal= getSucursal();
            $categorias = getCategoria();
            $proveedor = getProveedores();
            
            
            //var_dump($sucursal);
        ?>
                <script type="text/javascript" src="../../js/jquery-3.1.0.js"></script>
        <script type="text/javascript" src="../../js/ejemAlertify.js"></script>
        <script type="text/javascript" src="../../js/alertify/alertify.js"></script>
        <link rel="stylesheet" href="../../js/alertify/css/alertify.css">
        <link rel="stylesheet" href="../../js/alertify/css/themes/default.css">
        <script type="text/javascript" src="../../js/funcionesVenta.js"></script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
    </head>
    
    <body>
        <div tabindex="-1" class="search-container">
            <div class="pane-subheader pane-list-subheader subheader-search">
                        <button class="icon icon-search-morph">
                            <div class="icon icon-back-blue">
                    
                    </div>
                            <div class="icon icon-search">
                                
                            </div>
                        </button>
                <span>
                    
                </span>
                <div class="input-placeholder">Buscar un producto</div>
                            <label for="input-chatlist-search" class="cont-input-search">
                                <input type="text" class="input input-search" data-tab="2" dir="auto" title="Buscar o empezar un chat nuevo">
                            </label>
            </div>
        </div>
        <div>
            <form method="post" action="../../Business/ProductoControlador.php" accept-charset="UTF-8" id="fproductos">
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
                    <select name="unidadMedida">
                        <ul>
                            <option value="k">
                                Kilo
                            </option>
                              <option value="u">
                                Unidad
                            </option>
                        </ul>
                    </select>
                </div>
                
                <div>
                    <label>Precio</label>
                    <input type="text" name="precio"> 
                </div>
                
                <div>
                    <label>Proveedor</label>
                    <select id="" name="proveedor">
                        <ul>
                            <?php
                            for ($i = 0; $i < count($proveedor); $i++) {
                                echo '<option value="' . $proveedor[$i]->getCedulaProveedor() . '">' . $proveedor[$i]->getNombre() . '</option>';
                            }
                            ?>
                        </ul>
                    </select>
                    
                </div>
                
                <div>
                    <label>Sucursal</label>
                    <select id="" name="sucursal">
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
                    <select id="" name="categoria">
                        <ul>
                            <?php
                            for ($i = 0; $i < count($categorias); $i++) {
                                echo '<option value="' . $categorias[$i]->getCodigoCategoria() . '">' . $categorias[$i]->getNombre() . '</option>';
                            }
                            ?>
                        </ul>
                    </select>
                </div>
                
                
                
                <input type="button" class="alerta1" value="Agregar">
                
            </form>
        </div>
        
    </body>
    
</html>
    
    