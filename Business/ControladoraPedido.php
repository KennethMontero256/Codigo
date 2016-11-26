<?php
	require "../Data/DataPedido.php";
    $dataPedido = new DataPedido();

    switch ($_REQUEST["metodo"]) {
    	case 'agregarPedido':
    		$dataPedido->agregarPedido($_REQUEST["pedido"], $_REQUEST["detallePedido"]);
    		break;
    	default:
    		echo "ERROR, no se encontro el metodo";
    		break;
    }

?>