<?php
	if(!empty($_REQUEST)){
		include_once "../../Data/DataEmpleado.php";
		$dataEmpleado = new DataEmpleado();
		$empleado = json_decode($dataEmpleado->getEmpleadoById($_REQUEST["cedula"]));
	}else{
		echo "Disculpe, sucedió un error al cargar los datos del empleado.";
	}
?>
<<<<<<< HEAD
=======

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Vista empleado</title>
	<link rel="stylesheet" href="">
</head>
<body>
>>>>>>> 0566012c6bcad2418fb0db2ce0396037812c902e
	<table id="showEmpleados">
		<p>Empleado:     <?php echo $empleado[0]->nombre;?></p>
		<tbody>
			<tr>
				<td>
					<p>Cédula:<?php echo $empleado[0]->cedula;?></p>
				</td>
				<td>
					<p>Sucursal Actual:<?php echo $empleado[0]->nombreSucursal;?></p>
				</td>
			</tr>
			<tr>
				<td>
					<p>Teléfono:<?php echo $empleado[0]->telefono;?></p>
				</td>
				<td>
					<p>Fecha de ingreso: <?php echo $empleado[0]->fechaIngreso;?></p>
				</td>
			</tr>
		</tbody>
	</table>
	<div class="footShowInfoEmpleado">
		<a href="#" class="volverListEmpleados"><span class="icon-arrow-left"></span></a>
<<<<<<< HEAD
		<a href="#" data-id="<?php echo $empleado[0]->cedula;?>" data-nombre="<?php echo $empleado[0]->nombre;?>" data-telefono="<?php echo $empleado[0]->telefono;?>" data-sucursal="<?php echo $empleado[0]->idSucursal;?>" data-habilitado="<?php echo $empleado[0]->habilitado;?>" class="btnEditEmpleado"><span class="icon-pencil"></span>Editar información</a>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
		$(".volverListEmpleados").on("click", function(e){
      		e.preventDefault();
      		alert("Redirecting....");
      		$("#contenedorAdministrador").empty();
        	cargar_pagina("#contenedorAdministrador","../administracion/administrar_empleados.php");

    	});

    	$("a.btnEditEmpleado").on("click", function(e){
      		e.preventDefault();
      		$(".bRegEmpleado").attr("href", "frmEditEmpleado");
   			llenarSelectSucursal(this);
    	});
    	
    	function cargar_pagina(lugarACargar,nombrePagina){
        	$(lugarACargar).load(nombrePagina);
        	$(lugarACargar).fadeIn(1000);
    	}

    	function cargarFormEditEmpleado(obj){
		    var form = document.frmAddEmpleado;

		    $(".bRegEmpleado").text("Actualizar");
		    form.cedula.value = $(obj).attr("data-id");
		    form.nombreEmpl.value = $(obj).attr("data-nombre");
		    form.telf.value = $(obj).attr("data-telefono");
		    form.selectSucursal.value = $(obj).attr("data-sucursal");
		    form.emplHabl.checked = ($(obj).attr("data-habilitado") == 1)?true:false;

		    mostr_ocultr("frmAddEmpleado");
	  	}

	  	function mostr_ocultr(id){
	        if ( $("#"+id).is(":visible")){
	             $("#"+id).hide('slow');
	           
	        }else{
	            $("#"+id).show('slow');
	        }
    	}

  		function llenarSelectSucursal(obj){
        	var opciones= '<option value="0">Ninguna</option>';
         	$.ajax({
            	url:'../../Business/sucursalController.php?accion=mostrarSucursales',
            	type:'GET',
            	data:{},
   	         	success: function(responseText){
               		var data = JSON.parse(responseText);
               		$.each(data, function(i, item) {
                   		opciones += '<option value="'+ data[i].id + '">' + data[i].nombre + '</option>'; 
             		});
            		$("#selectSucursal").empty().append(opciones);
                	cargarFormEditEmpleado(obj);
            	}
        	});
    } 
    });
	</script>
=======
		<a href="<?php echo $empleado[0]->cedula;?>" class=""><span class="icon-pencil"></span>Editar información</a>
	</div>
</body>
</html>
>>>>>>> 0566012c6bcad2418fb0db2ce0396037812c902e
