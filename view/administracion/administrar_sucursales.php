<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<script type="text/javascript" src="../js/jquery-3.1.0.js"></script>
</head>
<body>
	<div class="contenedorSucursales">
		<p>Todas las Sucursales</p>
		<span class="addSucursal">Add</span>
		<div class="barBusqueda">
			<input type="text" id="txtBusqSucur" placeholder="Escribe el nombe de una sucursal">
		</div>
		<div class="contenedorListaSucursales">
			<table id="tablaListaSucursal">
				<tbody>
					<tr class="itemListaSucursal">
						<td><a href="012">Cariari</a></td>
						<td><a href="012" class="btnEditSucr">editar</a></td>
						<td><a href="012" class="btnEliminar">Eliminar</a></td>
					</tr>
					<tr class="itemListaSucursal">
						<td><a href="012">Guápiles</a></td>
						<td><a href="012">editar</a></td>
						<td><a href="012">Eliminar</a></td>
					</tr>
					<tr class="itemListaSucursal">
						<td><a href="012">Siquirres</a></td>
						<td><a href="012">editar</a></td>
						<td><a href="012">Eliminar</a></td>
					</tr>
					<tr class="itemListaSucursal">
						<td><a href="012">San josé</a></td>
						<td><a href="012">editar</a></td>
						<td><a href="012">Eliminar</a></td>
					</tr>
				</tbody>
			</table>
			
		</div>
	<div>
		<form action="" method="get" accept-charset="utf-8">
			<input type="text" name="" placeholder="Nombre de sucursal">
			<input type="text" name="" placeholder="Dirección">
			<input type="text" name="" placeholder="Teléfono">
			<select name="selectAdministrador">
				<option value="">Jason</option>
				<option value="">Jean</option>
				<option value="">Peter</option>
				<option value="">María</option>
			</select>
			<input type="text" id="" placeholder="Ingrese el nombre de algun empleado">
			<a href="">AddEmpleado</a>
			<table>
				<tbody>
					<tr>Juan smith</tr>
					<tr>Raquel patterson</tr>
				</tbody>
			</table>
			
			el estado de disponibilidad (habilitado o deshabilitado).
		</form>
	</div>
	</div class="" style="display:block;">

	<div>
	<script type="text/javascript" src="../js/jquery.tablefilter.js"></script>
	<script>
		$(function() {
			theTable = $("#tablaListaSucursal");
			$("#txtBusqSucur").keyup(function() {
				$.uiTableFilter(theTable, this.value);
			});
		});
	</script>
</body>
</html>