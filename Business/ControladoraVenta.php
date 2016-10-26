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
<<<<<<< HEAD
            
            echo $dataVenta->obtenerVentaPorFecha($_REQUEST["idSucursal"], "2016-10-23");
            
=======
            $idSucursal = json_decode($_REQUEST["idSucursal"]);
            $fecha = json_decode($_REQUEST["fecha"]);
            $ventas = $dataVenta->obtenerVentaPorFecha($idSucursal, $fecha);
            echo $ventas;
>>>>>>> 2289a7cb6cb42889c449c097a9179009ddd89a5e
            break;
    	default:
    		echo "ERROR, no se encontro el metodo";
    		break;
    }

?>