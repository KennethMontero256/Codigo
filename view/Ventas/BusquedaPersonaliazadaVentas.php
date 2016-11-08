<?php
	session_start();
	include_once '../../Data/DataVenta.php';
	$dataVenta = new DataVenta();

	if($_REQUEST["tipoBusqueda"] == "mes"){
		mostrarVentasPorMes($dataVenta, $_GET["mesVenta"], $_GET["anioVenta"]);
	}else{
		if($_REQUEST["tipoBusqueda"] == "fecha"){
			mostrarVentasPorFecha($_GET["fechaInicio"], $_GET["fechaFinal"]);
		}	
	}

	function mostrarVentasPorMes($dataVenta, $mes, $anio){
		echo "Mes: ".$mes."/".$anio;
		echo $dataVenta->getVentasByMes($_SESSION["idSucursal"], $_SESSION["cedula"], $mes, $anio);
	}

	function mostrarVentasPorFecha($fechaInicio, $fechaFinal){
		echo "Fecha: De: ".$fechaInicio." A: ".$fechaFinal;
	}
?>