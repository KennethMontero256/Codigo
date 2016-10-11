<?php
    session_start();
    include_once '../../Data/DataCategoria.php';
    $dataCategoria = new DataCategoria();
    $categorias = $dataCategoria->getCategoria(0);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="">
    <script type="text/javascript" src="../../js/gestion_inventario.js"></script>
</head>
<body>
    <div class="contenedorAdmInventario">
        <div class="menuLateral">
            <p>Gestión de:</p>
            <ul>
                <li>
                    <a href="shProductos" data-id="<?php echo $_SESSION["idSucursal"];?>" class="shListaInventario"><span class="icon-database"></span>Productos</a>
                </li>
                <li>
                    <a href="shCategoria" data-id="0" class="shListaInventario"><span class="icon-location-arrow"></span>Categorias</a>
                </li>
            </ul>
        </div>
        <div id="contenedorListas" class="contenedorSecundario">
            
        </div>
    </div>
    <div style="display: none;" class="contenedorModal" id="formProducto">
        <form method="post" action="" name="formProducto" id="fProducto" accept-charset="UTF-8">
            <label>Sucursal <?php echo $_SESSION["nombreSucursal"];?></label>
            <input type="hidden" name="sucursal" value="<?php echo $_SESSION["idSucursal"];?>">
            <input type="hidden" name="codigo" value="0">
            
            <label>Nombre</label>
            <input type="text" class="inputShadow " name="nombre"> 
            

            <label>Abreviatura</label>
            <input type="text" class="inputShadow" name="abrev"> 
                        
            <label>Stock</label>
            <input type="text" class="inputShadow solo-numero" name="stock"> 
            
            <label>Precio</label>
            <input type="text" class="inputShadow solo-numero" name="precio">           
           
            <label>Unidad de Medida</label>
            <select id="unidadMedida">
                <ul>
                    <option value="n">No definido</option>
                    <option value="k">Kilo</option>
                    <option value="u">Unidad</option>
                </ul>
            </select>
 
            <label>Proveedor</label>
            <select id="proveedor">
                <option value="i">Interno</option>
                <option value="e">Externo</option>
            </select>
           
            <label>Categoria</label>
            <select id="categoria">
                    <?php
                        foreach (json_decode($categorias) as $categoria) {
                            echo "<option value='".$categoria->id."'>".$categoria->nombre."</option>";
                        }
                    ?>
            </select>
               
            <label>Tamaño</label>
            <select id="tamanio">
                <option value="n">No definido</option>
                <option value="p">Pequeño</option>
                <option value="g">Grande</option>
            </select>
            <div class="opsFProducto">
               <a href="add" class="opFormProducto btn-submit"><span class="icon-">Agregar</span></a>
               <a href="can" class="opFormProducto btn-submit"><span class="icon-">Cancelar</span></a>
            </div>
        </form>
    </div>
    <div class="addCategoria contenedorModal" id="formCategoria" style="display: none;">
    	<div class="formDModal">
            <input type="hidden" id="idCategoria" value="">
            <label>Agregar nueva categoria</label>
        	<input type="text" id="nomCategoria" class="inputShadow" placeholder="Ingrese el nombre de la categoria">
        	<a href="add" class="opFormCategoria btn-submit" data-actualizar="" id="actualizarCategoria"><span class="icon-plus2">Agregar</span></a>
            <a href="can" class="opFormCategoria btn-submit"><span class="icon-">Cancelar</span></a>
        </div>
    </div>
	<!--Opciones para agregar categoria o producto -->
    <div class="opsProducto" style="display: none;">
    	<ul>
    		<li><a href="#"><span class="i"></span>Producto</a></li>
    		<li><a href="#"><span class="i"></span>Categoria</a></li>
    	</ul>
    	<a href="#" class=""><span class="icon-plus2"></span></a>
    </div>
    <a class='flotante' id="fabInventario" href='#'><span class="icon-plus"></span></a>
    <div class="menu-fab" style="display: none;">
        <ul>
            <li class="dropLi"><a class='dropA opMenuFab' href='#formProducto'>Producto</a></li>
            <li class="dropLi"><a class='dropA opMenuFab' href='#formCategoria'>Categoria</a></li>
        </ul>
    </div>
    <script>
        $(document).ready(function (){
          $('.solo-numero').keyup(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '');
          });
        });
    </script>
</body>
</html>	