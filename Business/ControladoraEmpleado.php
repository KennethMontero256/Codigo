<?php
	
	require "../Data/DataEmpleado.php";
	$dataEmpleado = new DataEmpleado();

	switch ($_REQUEST['metodo']) {
		case 'addSucursal':
			
			break;
		case 'mostrarEmpleadoNombre':

  			echo $dataEmpleado->getEmpleados();
			break;
		default:
			
			break;
	}

?>