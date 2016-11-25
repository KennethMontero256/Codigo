<?php
	session_start();
	include_once '../../Data/DataVenta.php';
	$dataVenta = new DataVenta();
	$ventas = "";
	if($_REQUEST["tipoBusqueda"] == "mes"){
		mostrarVentasPorMes($dataVenta, $_GET["mesVenta"], $_GET["anioVenta"]);
	}else{
		if($_REQUEST["tipoBusqueda"] == "fecha"){
			mostrarVentasPorFecha($_GET["fechaInicio"], $_GET["fechaFinal"]);
		}	
	}

	function mostrarVentasPorMes($dataVenta, $mes, $anio){
		echo "<div>Mes: ".$mes."/".$anio."</div>";
		imprimirVentas($dataVenta->getVentasByMes($_SESSION["idSucursal"], $_SESSION["cedula"], $mes, $anio));
	}

	function mostrarVentasPorFecha($fechaInicio, $fechaFinal){
		echo "Fecha: De: ".$fechaInicio." A: ".$fechaFinal."-> sucursal: ".$_SESSION["idSucursal"];
		$dataVenta = new DataVenta();

		echo $dataVenta->getVentasByRangoFechas($_SESSION["idSucursal"], 0, "'".$fechaInicio."'", "'".$fechaFinal."'");
	}

	function imprimirVentas($ventas){
		$lista = json_decode($ventas);
		if(!empty($lista)){
		echo "  <table class='tbEstandar tbUnida' style='width:97%;'>
                    <tbody>
                        <tr class='tr'>
                            <td>Fecha y hora</td>
                            <td>Empleado</td>
                            <td>IVA</td>
                            <td>Subtotal</td>
                            <td>Total</td>
                        </tr>
                    </tbody>
                </table>
                <div class='' style='width:97%;'>
                    <table class='tbEstandar tbUnida' id=''>
                        <tbody>";
            $filas = "";
            foreach ($lista as $venta) {
            	$filas .= "<tr>";
            	$filas .= "	<td>".$venta->fecha."</td>";
				$filas .= "	<td>".$venta->empleado."</td>";
				$filas .= "	<td><img src='../../imagenes/colones.png' width='10'>".$venta->iva."</td>";
				$filas .= "	<td><img src='../../imagenes/colones.png' width='10'>".$venta->subtotal."</td>";
				$filas .= "	<td><img src='../../imagenes/colones.png' width='10'>".$venta->total."</td>";
            	$filas .= "</tr>";
            }
        echo $filas;
        echo    "</tbody>";
        echo   "</table>";
        echo    "</div>";
    	}else{
    		echo "<div class='mensajeSys'><span>No se encontraron ventas para esta busqueda.</span></div>";
    	}
	}
?>