
	<div class="contenedorSucursales">
		<p>Todas las Sucursales</p>
		<a id="addSucursal" class="add tooltip" data-tooltip="Agregar sucursal"><span class="icon-plus2"></span></a>
		<div class="barBusqueda">
			<input type="text" id="txtBusqSucur" placeholder="Escribe el nombe de una sucursal" class="inputShadow">
		</div>
		<div id="contenedorLista" class="contenedorLista">
			<table id="tablaSoloLista" class="listaCnNombres">
				<tbody>
				</tbody>
			</table>

		</div>
	<div class="contenedorModal" id="frmAddSucursal" name="frmAddSucursal" style="display:none;">
		<form name="frmAddSucursal" method="get" accept-charset="utf-8" class="frmAdd">

			<p>Formulario para sucursal</p>
			<input type="text" name="nomSucursal" placeholder="Nombre de sucursal">
			<input type="text" name="direccion" placeholder="Dirección">
			<input type="text" id="telfSucursal" name="telf" placeholder="Teléfono">

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
	<script type="text/javascript" src="../../js/cargar_sucursales.js"></script>
	<script type="text/javascript" src="../../js/funciones_adminSucursal.js"></script>
	<script type="text/javascript" src="../../js/jquery.tablefilter.js"></script>

	<script>
		$(function() {
			theTable = $("#tablaSoloLista");
			$("#txtBusqSucur").keyup(function() {
				$.uiTableFilter(theTable, this.value);
			});

			$("#telfSucursal")
	        .mask("9999-9999")
	        .focusout(function (event) {  
	            var target, phone, element;  
	            target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
	            phone = target.value.replace(/\D/g, '');
	            element = $(target);  
	            element.unmask();  
	            if(phone.length > 10) {  
	                element.mask("9999-9999");  
	            } else {  
	                element.mask("9999-9999");  
	            }  
	        });

		});
	</script>

