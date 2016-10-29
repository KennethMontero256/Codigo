<?php
	session_start();
	
	if($_REQUEST["tipoBusqueda"] == "mes"){
		mostrarVentasPorMes($_GET["mesVenta"], $_GET["anioVenta"]);
	}else{
		if($_REQUEST["tipoBusqueda"] == "fecha"){
			mostrarVentasPorFecha($_GET["fechaInicio"], $_GET["fechaFinal"]);
		}	
	}

	function mostrarVentasPorMes($mes,$anio){
		echo "Mes: ".$mes."/".$anio;
	}

	function mostrarVentasPorFecha($fechaInicio, $fechaFinal){
		echo "Fecha: De: ".$fechaInicio." A: ".$fechaFinal;
	}
?>