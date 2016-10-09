<?php
    session_start();
     include_once '../../Data/DataProducto.php';
            include_once '../../Data/DataSucursal2.php';
            include_once '../../Domain/Sucursal.php';
            include_once '../../Domain/Categoria.php';
            include_once '../../Data/DataCategoria.php';
            include_once '../../Domain/Proveedor.php';
            include_once '../../Data/DataProveedor.php';
    $categorias = getCategoria();
    $proveedor = getProveedores();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
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