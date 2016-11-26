<?php
    session_start();
?>
	<div class="menuLateral">
		<p>Sección de:</p>
		<ul>
			<li><a href="#" id="opPedidoEspera">Pedidos en espera</a></li>
			<li><a href="#" id="opPedidoReal">Pedidos realizados</a></li>
		</ul>
	</div>
	<div class="contenedorSecundario">
	    
		<div class="contenidoPedidos">
			<p>Busqueda por filtro de fecha</p>
			<div class="barBusqueda">
				<label>De:</label>
				<input type="text" id="txtFecha1" class="fecha" placeholder="Seleccionar fecha">
				<label>a:</label>
				<input type="text" id="txtFecha2" class="fecha" placeholder="Seleccionar fecha">
				<a href="#" id="" class="btn-submit"><span class="icon-search"></span></a>
			</div>
			<div class="tabla">
			<table>
				<thead>
						<tr>
							<th>Código</th>
							<th>Fecha-hora</th>
						</tr>
					</thead>
			</table>
			<div class="detalleTablaPedido">
				<table>
					<tbody>
						<tr>
							<td>0987086</td>
							<td>07/08/2016 23434</td>
							<td>rastrear</td>
							<td><input type="checkbox" name=""></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>	
		</div>
	</div>
	<div class="contenedorModal" id="frmPedidoSucur" style="display:none;">
		<div class="contenedorPedidoSucr">
		<span class="icon-cross btnClosePedido"></span>
			<div class="facturaPedido colPedido">
				<div class="encbPedido">
					<p>Tostador <?php echo $_SESSION["nombreSucursal"];?></p>
					<p>Empleado <?php echo $_SESSION["nombre"];?></p>
					<p>Fecha: <?php echo date("d-m-Y"); ?></p>
				</div>
				<div class="detallePedido">
					<table class="tbEstandar">
						<tbody>
							<tr class="encabezadoTb">
								<td>Producto</td>
								<td>Cantidad</td>
								<td>Eliminar</td>
							</tr>
						</tbody>
					</table>
					<div class="tbDetallePedido">
					<table id="tbFacturaPedido" class="tbEstandar">
						<tbody>
							
						</tbody>
					</table>
					</div>
				</div>
			</div>
			<div class="frmInsertDetalle colPedido">
				<p class="tituloInsertPedido">Agregar producto al pedido</p>
				<div class="pedidoScroll">
				<div class="opPedido">
					<ul class="listColCategorias">
					  <!-- Aqui se añaden las tarjetas con 
					       los nombres de cada producto 
					       segun categoria
					    -->
					</ul>
				</div>
				</div>
			</div>
			<div class="footPedido">
				<a href="do" class="btnPedido btn-submit">Realizar</a>
				<a href="can" class="btnPedido btn-submit">Cancelar</a>
			</div>
		</div>
	</div>
	<a class='flotante' href='frmPedidoSucr'>Add</a>
	 <script>
            $(function() {
                $('.fecha').datetimepicker({
                    timepicker:false,
 					format:'d/m/Y'
                });
            });
        </script>
    <script type="text/javascript" src="../../js/gestion_pedidos.js"></script>
