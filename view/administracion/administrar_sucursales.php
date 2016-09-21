<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
<<<<<<< HEAD
	<script type="text/javascript" src="js/jquery-3.1.0.js"></script>
	<script type="text/javascript" src="js/funcionesAdministrador.js"></script>
	<script type="text/javascript" src="../../js/jquery-3.1.0.js"></script>
=======
>>>>>>> refs/remotes/origin/master
</head>
<body>
	<div class="contenedorSucursales">
		<p>Todas las Sucursales</p>
		<a class="addSucursal tooltip" data-tooltip="Agregar sucursal"><span class="icon-plus2"></span></a>
		<div class="barBusqueda">
			<input type="text" id="txtBusqSucur" placeholder="Escribe el nombe de una sucursal" class="inputShadow">
		</div>
		<div class="contenedorLista">
			<table id="tablaSoloLista">
				<tbody>
<<<<<<< HEAD

					<?php
	          while ($reg=mysqli_fetch_array($registro))
	          {
	            echo "<tr class=\"itemListaSucursal\">";
	            echo "<td><a href=\"012\">".$reg['nombre']."</a></td>";
	            echo "<td><a href=\"012\" class=\"btnEditSucr\">Editar</a></td>";
	            echo "<td><a href=\"012\" class=\"btnEditSucr\">Eliminra</a></td>";
	            echo "</tr>";
	          }
	        ?>
=======
					<tr class="itemListaSoloTabla">
						<td><a href="012">Cariari</a></td>
						<td><a href="012" class="btnEditSucr">editar</a></td>
						<td><a href="012" class="btnEliminar">Eliminar</a></td>
					</tr>
>>>>>>> refs/remotes/origin/master
					
				</tbody>
			</table>

		</div>
	<div class="contenedorModal" id="frmAddSucursal" name="frmAddSucursal" style="display:none;">
<<<<<<< HEAD

		<form action="" method="get" accept-charset="utf-8" class="frmAddSucursal">
=======
		
		<form name="frmAddSucursal" method="get" accept-charset="utf-8" class="frmAdd">
>>>>>>> refs/remotes/origin/master
			<p>Formulario para sucursal</p>
			<input type="text" name="nomSucursal" placeholder="Nombre de sucursal">
			<input type="text" name="direccion" placeholder="Dirección">
			<input type="text" name="telf" placeholder="Teléfono">
			<select name="" id="selectEmpleados">
			</select>
			<a href="AgregarEmpleado" id="addEmpleado">AddEmpleado</a>
			<table id="tbEmpleados">
				<tbody>
	
				</tbody>
			</table>
			<div class="contenedorSwitch">
			    <span>¿Habilitado?</span>
				<div class="switch">
				  <input id="cmn-toggle-7" name="habilitado" class="cmn-toggle cmn-toggle-yes-no" type="checkbox">
				  <label for="cmn-toggle-7" id="habilitado" data-on="Si" data-off="No"></label>
				</div>
			</div>
			<div class="footOpsFrm">
				<a href="frmAddSucursal" class="btn-submit" id="bRegistrarSucursal">Registrar</a>
				<a href="frmAddSucursal" class="btn-submit btn-cancel">Cancelar</a>
			</div>
		</form>
	</div>
<<<<<<< HEAD

	<script type="text/javascript" src="../../js/funciones_generales.js"></script>
	<script type="text/javascript" src="../../js/jquery.tablefilter.js"></script>

	<script type="text/javascript" src="js/funciones_generales.js"></script>
	<script type="text/javascript" src="js/jquery.tablefilter.js"></script>
=======
	<script type="text/javascript" src="../../js/jquery.tablefilter.js"></script>
>>>>>>> refs/remotes/origin/master
	<script>
		$(function() {
			theTable = $("#tablaSoloLista");
			$("#txtBusqSucur").keyup(function() {
				$.uiTableFilter(theTable, this.value);
			});
		});
	</script>
</body>
</html>
