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
		case "empleadosBySucursal":
			echo $dataEmpleado->getEmpleadosBySucursal();
			break;
		case "eliminarEmpleado":
			echo $dataEmpleado->eliminarEmpleado($_REQUEST["cedula"]);
			break;
	    case "getEmpleadoByCedula":
	    	echo $dataEmpleado->getEmpleadoById($_REQUEST["cedula"]);
	    	break;
<<<<<<< HEAD
	    case 'actualizarPass':
	    	echo $dataEmpleado->actualizarPass($_REQUEST["cedula"], $_REQUEST["pass"]);
	    	break;
	    case 'editEmpleado':
	    	echo $dataEmpleado->editEmpleado($_REQUEST["arrayDatos"]);
	    	break;
	    case "changeMD5":
	    	echo md5($_REQUEST["pass"]);
	    	break;
=======
>>>>>>> 0566012c6bcad2418fb0db2ce0396037812c902e
		default:
			
			break;
	}

?>