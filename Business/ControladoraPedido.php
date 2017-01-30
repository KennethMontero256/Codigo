<?php
	require "../Data/DataPedido.php";
    $dataPedido = new DataPedido();

    switch ($_REQUEST["metodo"]) {
    	case 'agregarPedido':
    		$dataPedido->agregarPedido($_REQUEST["pedido"], $_REQUEST["detallePedido"]);
    		break;
        case 'sumarPedidoInventario':
            echo $dataPedido->sumarPedidoInventario($_REQUEST["pedido"], $_REQUEST["sucursal"]);
            break;
        case 'estaSumado':
            echo $dataPedido->estaSumadoPedido($_REQUEST["pedido"]);
            break;
        case 'marcarRecibido':
            echo $dataPedido->marcarRecibido($_REQUEST["pedido"]);
            break;
    	default:
    		echo "ERROR, no se encontro el metodo";
    		break;
    }

?>