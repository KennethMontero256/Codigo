<?php
	include_once '../Domain/Venta.php';
	require "../Data/DataVenta.php";
    $dataVenta = new DataVenta();

    switch ($_REQUEST["metodo"]) {
    	case 'agregarVenta':
    		
            $encabezado = json_decode($_REQUEST["encabezado"]);
        
            $dataVenta->insertarVenta(new Venta(0,$encabezado->idSucursal, $encabezado->fechaHora, $encabezado->idEmpleado, $encabezado->impuestoVenta, $encabezado->subtotal, $encabezado->total), $_REQUEST["detalleVenta"]);
    		break;
        case 'getVentasPorFecha':
            
            echo $dataVenta->obtenerVentaPorFecha($_REQUEST["idSucursal"], "2016-10-23");
            
            break;
    	default:
    		echo "ERROR, no se encontro el metodo";
    		break;
    }

?>