<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
<<<<<<< HEAD
	<link rel="stylesheet" href="">
</head>
<body>
	
</body>
</html>
=======
	<script type="text/javascript" src="../../js/jquery-3.1.0.js"></script>
</head>
<body>
	<div class="contenedorSucursales">
		<p>Empleados</p>
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
		
		<form action="" method="get" accept-charset="utf-8" class="frmAdd">
			<p>Formulario para empleado</p>
			<input type="text" name="" placeholder="Cédula">
			<input type="text" name="" placeholder="Nombre completo">
			<input type="text" name="" placeholder="Teléfono">
			<span class="etiqueta">Agregar sucursal de trabajo</span>
			<select name="">
				<option value="">Cariari</option>
				<option value="">Guápiles</option>
			</select>
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
>>>>>>> refs/remotes/origin/master
