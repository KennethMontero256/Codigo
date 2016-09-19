<?php
	
	require "../Data/DataEmpleado.php";
	$dataEmpleado = new DataEmpleado();

	switch ($_REQUEST['metodo']) {
		case 'insertar':
			
			break;
		case 'mostrarEmpleadoNombre':

  			echo $dataEmpleado->getEmpleados();
			break;
		default:
			
			break;
	}

?>