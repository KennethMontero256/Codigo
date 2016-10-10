<?php
	include_once '../Domain/Producto.php';
	require "../Data/DataProducto.php";
    $dataProducto = new DataProducto();

	switch ($_REQUEST["metodo"]) {
		case 'insertarActualizar':
		    $prds = "2,3";
			$dataProducto->insertarActualizarProducto(new Producto($_REQUEST["codigo"],$_REQUEST["nombre"],$_REQUEST["stock"], $_REQUEST["precio"],$_REQUEST["unidadMedida"],$_REQUEST["proveedor"],$_REQUEST["tamanio"], $_REQUEST["idSucursal"],$_REQUEST["idCategoria"], $_REQUEST["abreviatura"]), $prds);
			break;
		case 'eliminar':
			echo $dataProducto->eliminarProducto($_REQUEST["codigoProducto"]);
			break;
		case 'mostrarProductos':
			echo $dataProducto->getProductosBySucursal($_REQUEST["idSucursal"]);
			break;
		case 'mostrarProductosCompuestos':
			echo $dataProducto->getProductosProductoCompuesto($_REQUEST["codigoProducto"]);
			break;
		default:
			echo "Error, no se ha encontrado la accion";
			break;
	}
?>