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
		default:
			
			break;
	}

?>