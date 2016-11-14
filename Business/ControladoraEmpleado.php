<?php
	
	require "../Data/DataEmpleado.php";
	$dataEmpleado = new DataEmpleado();

	switch ($_REQUEST['metodo']) {
		case 'addEmpleado':
			echo $dataEmpleado->insertarEmpleado($_REQUEST["arrayDatos"]);
			break;
		case 'mostrarEmpleadoNombre':
  			echo $dataEmpleado->getEmpleados();
			break;
			/*Obtiene los empleados ordenados por sucursal*/
		case "empleadosBySucursal":
			echo $dataEmpleado->getEmpleadosBySucursal();
			break;
		case "eliminarEmpleado":
			echo $dataEmpleado->eliminarEmpleado($_REQUEST["cedula"]);
			break;
	    case "getEmpleadoByCedula":
	    	echo $dataEmpleado->getEmpleadoById($_REQUEST["cedula"]);
	    	break;
	    case 'actualizarPass':
	    	$cambio = $dataEmpleado->actualizarPass($_REQUEST["cedula"], md5($_REQUEST["pass"]));
	    	validarRespuesta($cambio);
	    	break;
	    case "changeMD5":
	    	echo md5($_REQUEST["pass"]);
	    	break;
		default:
			break;
	}

	function validarRespuesta($cambio){
		if($cambio > 0){
	    	header('Location: ../Data/Error.php?mensaje=Su contraseña ha sido cambiada exitosamente.');
	    }else{
	    	header('Location: ../Data/Error.php?mensaje=Sucedió un error, no se pudo cambiar la contraseña.');
	    }
	}
?>