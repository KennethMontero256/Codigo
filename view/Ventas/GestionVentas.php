<input type="hidden" id="sucursal" value="<?php echo $_SESSION['idSucursal'];?>">
<div class="menuLateral">	
	<p>Mostrar por:</p>
	<ul>
		<li><a href="#" id="">Ventas del día</a></li>
		<li><a href="#" id="">Busqueda de ventas </a></li>
	</ul>
</div>
<div class="contenedorSecundario">
    <div class="venta">
    	<div class="encabezadoVenta">
    		<label>Sucursal:<?php echo $_SESSION["nombreSucursal"];?></label><br>
    		<label>Empleado <?php echo $_SESSION["nombre"];?></label><br>
    		<label>Fecha: <?php echo date("Y-m-d");?></label><br>
    	</div>
    	<ul>
    		<li>
		    	<table class="tbEstandar tbUnida" style="width:97%;">
		    			<tbody>
		    				<tr class="tr">
		    					<td># de linea</td>
		    					<td>Descripción</td>
		    					<td>Precio</td>
		    					<td>Cantidad</td>
		    					<td>Total de linea</td>
		    					<td></td>
		    				</tr>
		    			</tbody>
		    	</table>
		    		<div class="listaCompra" style="width:97%;">
		    		<table class="tbUnida">
		    			<tbody>
		    				<tr>
		    					<td>1</td>
		    					<td>Mani japones</td>
		    					<td>5200</td>
		    					<td>100g</td>
		    					<td><img class="icon-colon" src="../../imagenes/colones.png" width="50">500</td>
		    					<td><a href="#"> <span class="icon-bin2"></span></a></td>
		    				</tr>
		    			</tbody>
		    		</table>
		    	</div>
		    	<table class="tbUnida" style="width:97%;">
		    			<tbody style="min-height:280px;">
		    				<tr>
		    					<td></td>
		    					<td></td>
		    					<td></td>
		    					<td>Total:</td>
		    					<td></td>
		    					<td></td>
		    				</tr>
		    			</tbody>
		    	</table>
	    	</li>
	    	<li>
		    	<div class="fIngresoDetalle">
		    		<form name="fRealizarVenta">
		    		
		    			<p>Ingreso del detalle</p>
		    			<input type="text" class="inputShadow" name="abrev" id="abrevProducto" placeholder="Abreviatura">
						<input type="text" class="inputShadow" name="cantidad" placeholder="Cantidad">
						
						<input type="submit" class="btn-submit" value="Agregar"/>
						<a href="#" class="btn-submit">Terminar venta</a>
		    		
		    		</form>
		    	</div>
	    	</li>
    	</ul>
    </div>     
</div>
<script>
	$(document).ready(function(){
	$('#abrevProducto').autocomplete({
		source:'../../Business/ControladoraProducto.php?metodo=getPrecio&idSucursal='+$("#sucursal").val(), 
		minLength: 1
	    });
	});
</script>

