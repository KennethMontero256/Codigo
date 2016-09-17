<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<script type="text/javascript" src="../../js/jquery-3.1.0.js"></script>
</head>
<body>
	<div class="contenedorSucursales">
		<p>Todas las Sucursales</p>
		<a class="addSucursal tooltip" data-tooltip="Agregar nuevo empleado"><span class="icon-plus2"></span></a>
		<div class="barBusqueda">
			<input type="text" id="txtBusqSucur" placeholder="Escribe el nombe de un empleado" class="inputShadow">
		</div>
		<div class="contenedorListaSucursales">
			<table id="tablaListaSucursal">
				<tbody>
					
				</tbody>
			</table>

		</div>
	<div class="contenedorModal" id="frmAddSucursal" name="frmAddSucursal" style="display:none;">
		
		<form action="" method="get" accept-charset="utf-8" class="frmAddSucursal">
			<p>Formulario para sucursal</p>
			<input type="text" name="" placeholder="Nombre de sucursal">
			<input type="text" name="" placeholder="Dirección">
			<input type="text" name="" placeholder="Teléfono">
			<span id="tituloSelect">Administrador principal</span><br>
			<input type="text" id="busEmpleado" placeholder="Ingrese el nombre de algun empleado">
			<a href="">AddEmpleado</a>
			<table>
				<tbody>
					<tr><td>Juan smith</td></tr>
					<tr><td>Raquel patterson</td></tr>
				</tbody>
			</table>
			<div class="contenedorSwitch">
			    <span>¿Habilitado?</span>
				<div class="switch">
				  <input id="cmn-toggle-7" class="cmn-toggle cmn-toggle-yes-no" type="checkbox">
				  <label for="cmn-toggle-7" data-on="Si" data-off="No"></label>
				</div>
			</div>
			<div class="footOpsFrm">
				<a href="frmAddSucursal" class="btn-submit">Registrar</a>
				<a href="frmAddSucursal" class="btn-submit btn-cancel">Cancelar</a>
			</div>
		</form>
	</div>
	
	<script type="text/javascript" src="../../js/funciones_generales.js"></script>
	<script type="text/javascript" src="../../js/jquery.tablefilter.js"></script>
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
