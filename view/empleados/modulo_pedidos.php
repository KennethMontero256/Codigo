<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pedidos</title>
	<link rel="stylesheet" href="../css/estilo_principal.css">
</head>
<body>
	<?php
		include("barraNavegacionPrincipal.php");
	?>
	<div class="menuLateral">
		<p>Sección de:</p>
		<ul>
			<li><a href="#" id="opPedidoEspera">Pedidos en espera</a></li>
			<li><a href="#" id="opPedidoReal">Pedidos realizados</a></li>
		</ul>
	</div>
	<div class="contenedorPedidos">
		<div class="contenidoPedidos">
				
		</div>
	</div>
	<div class="contenedorModal">
		<div class="contenedorPedidoSucr">
			<form class="frmPedido" action="" method="get" accept-charset="utf-8">
				<table>
					<caption>Pedido #:000987</caption>
					<thead>
						<tr>
							<th>Sucursal: Cariari</th>
							<th>Fecha-hora: 12/09/2016 23:40 p.m.</th>
							
						</tr>
						<tr>
							<th>Empleado: Steven Mendez</th> 
							
						</tr>
						<tr>
							<th colspan="" rowspan="" headers="" scope="">Código</th>
							<th colspan="" rowspan="" headers="" scope="">Nombre</th>
							<th colspan="" rowspan="" headers="" scope="">Cantidad</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>00099</td>
							<td>Mani salado</td>
							<td>5300k</td>
						</tr>
						<tr>
							<td>00099</td>
							<td>Mani salado</td>
							<td>5300k</td>
						</tr>
						<tr>
							<td>00099</td>
							<td>Mani salado</td>
							<td>5300k</td>
						</tr>
						<tr>
							<td>00099</td>
							<td>Mani salado</td>
							<td>5300k</td>
						</tr>
						<tr>
							<td>00099</td>
							<td>Mani salado</td>
							<td>5300k</td>
						</tr>
						<tr>
							<td>00099</td>
							<td>Mani salado</td>
							<td>5300k</td>
						</tr>
						<tr>
							<td>00099</td>
							<td>Mani salado</td>
							<td>5300k</td>
						</tr>
						<tr>
							<td>00099</td>
							<td>Mani salado</td>
							<td>5300k</td>
						</tr>
						<tr>
							<td>00099</td>
							<td>Mani salado</td>
							<td>5300k</td>
						</tr>
						<tr>
							<td>00099</td>
							<td>Mani salado</td>
							<td>5300k</td>
						</tr>
						<tr>
							<td>00099</td>
							<td>Mani salado</td>
							<td>5300k</td>
						</tr>
						<tr>
							<td>00099</td>
							<td>Mani salado</td>
							<td>5300k</td>
						</tr>
						<tr>
							<td>00099</td>
							<td>Mani salado</td>
							<td>5300k</td>
						</tr>
					</tbody>
				</table>
			</form>	
		
			<div class="frmInsertDetalle">
				<input type="text" id="txtCodigo" placeholder="Código producto" class="inputShadow">
				<input type="text" id="txtCantidad" placeholder="Cantidad" class="inputShadow">
				<a href="" id="hacerPedidoSucursal" class="btn-flat">Agregar</a>

				<div class="opPedido">
					<a href="#" id="cancelarPedido" class="btn-submit">Realizar</a>
					<a href="" id="hacerPedidoSucursal" class="btn-submit">Cancelar</a>
				</div>
			</div>
		</div>
	</div>
	<a class='flotante' href='#' >Add</a>
</body>
</html>