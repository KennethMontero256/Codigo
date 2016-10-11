<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
    <script type="text/javascript" src="../../js/gestion_inventario.js"></script>
</head>
<body>
    <div class="contenedorAdmInventario">
        <div class="">
            <ul>
                <li>
                    <a href="shProductos" data-id="<?php echo $_SESSION["idSucursal"];?>" class="shListaInventario"><span class="icon-">Productos</span></a>
                </li>
                <li>
                    <a href="shCategoria" class="shListaInventario"><span class="icon-">Categorias</span></a>
                </li>
            </ul>
        </div>
        <div class="contenidoShs">
            
        </div>
    </div>
    <div>
            <form method="post" action="../../Business/ProductoControlador.php" accept-charset="UTF-8" id="fproductos">
                <div class="">
                    <label>Sucursal <?php echo $_SESSION["nombreSucursal"];?></label>
                    <input type="hidden" name="sucursal" value="<?php echo $_SESSION["idSucursal"];?>">
                </div>
                <div id="">
                    <label>Código</label>
                    <input type="text" name="codigo">
                </div>
                    
                <div>
                    <label>Nombre</label>
                    <input type="text" name="nombre"> 
                </div>

                <div>
                    <label>Abreviatura</label>
                    <input type="text" name="abrev"> 
                </div>
                    
                <div>
                    <label>Stock</label>
                    <input type="number" name="stock"> 
                </div>
                    
                <div>
                    <label>Unidad de Medida</label>
                    <select name="unidadMedida">
                        <ul>
                            <option value="k">Kilo</option>
                            <option value="u">Unidad</option>
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
                       
                    </select>
                </div>
                    
                <div>
                    <label>Categoria</label>
                    <select id="" name="categoria">
                       
                    </select>
               </div>
            <input type="submit" value="Agregar">
            </form>
        </div>
    <div class="addCategoria">
    	<label for="">Agregar nueva categoria</label>
    	<input type="text" name="" value="" placeholder="">
    	<a href="#" class="bAddCategoria"><span class="icon-plus2"></span></a>
    </div>
	<!--Opciones para agregar categoria o producto -->
    <div class="opsProducto">
    	<ul>
    		<li><a href="#"><span class="i"></span>Producto</a></li>
    		<li><a href="#"><span class="i"></span>Categoria</a></li>
    	</ul>
    	<a href="#" class=""><span class="icon-plus2"></span></a>
    </div>

</body>
</html>	