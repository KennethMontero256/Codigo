<?php
    session_start();
    /*Conexion a BD*/
	include_once '../../Data/Data.php';
	$conexion = new Data();

	/*Esquema de consulta*/
	$select = " SELECT p.id AS id, p.idSucursal AS sucursal, p.idEmpleado AS cedula, DATE_FORMAT(p.fechaHora, '%d/%m/%Y %H:%i:%S' ) AS fechaHora, p.visto AS visto, p.recibido AS recibido, p.nota AS nota, p.sumado_inventario AS sumado_inventario,e.nombre AS nomEmpleado ";

	$from = " FROM pedido AS p INNER JOIN empleado AS e ON p.idEmpleado = e.cedula";

	$where = " WHERE p.idSucursal=".$_SESSION["idSucursal"];

	switch ($_REQUEST["metodo"]) {
		
		case 'rangoFechas':

			busquedaPedidoPorRangoFechas($conexion, $select, $from, $where, $_REQUEST["tipoPedido"], $_REQUEST["usuario"], $_REQUEST["fechaInicio"], $_REQUEST["fechaFinal"]);
			break;

		case 'mes':
			busquedaPedidoPorMes($conexion, $select, $from, $where, $_REQUEST["tipoPedido"], $_REQUEST["usuario"], $_REQUEST["mes"], $_REQUEST["anio"]);
			break;
		case 'verDetallePedido':
			$datos = json_decode($_REQUEST["data"]);
			verDetalle($conexion, $datos->pedido,  $datos->fechaHora,  $datos->empleado);
			break;
		default:
			echo "Error interno.";
			break;
	}

	function verDetalle($conexion, $idPedido, $fechaHora, $nomEmpleado){
		$sql = "SELECT DATE_FORMAT(p.fechaHora, '%d/%m/%Y %H:%i:%S' ) AS fechaHora, prd.nombre AS nomProducto, prd.unidadMedida AS uMedida, dp.cantidad AS cantidad
				FROM pedido AS p
		        INNER JOIN detallepedido AS dp
		        ON  p.id=dp.idPedido
		        INNER JOIN producto AS prd
		        ON dp.idProducto=prd.codigo 
		        WHERE p.id = '$idPedido'";

		$result = $conexion->getConexion()->query($sql);

		if ($result->num_rows > 0) {
		   listarDetalle($result, $fechaHora, $nomEmpleado);
		} else {
		    echo "Ocurrió un error al mostrar el detalle del pedido.";
		}

		$conexion->getConexion()->close();
	}

	function busquedaPedidoPorMes($conexion, $select, $from, $where, $tipoPedido, $cedula, $mes, $anio){
		$where .= " AND DATE_FORMAT(p.fechaHora, '%Y-%m') = CONCAT('$anio', '-', '$mes') ";

		if($tipoPedido == "recibido"){
			$where .= " AND p.recibido=1";
		}else{
			if($tipoPedido == "espera"){
				$where .= " AND p.recibido=0 AND p.enviado=1";
			}
		}

		if($cedula != 0){
			$where .= " AND p.idEmpleado='$cedula'";
		}

		$where .= " ORDER BY DATE_FORMAT(p.fechaHora, '%m'), DATE_FORMAT( p.fechaHora, '%H:%i:%S' ) ASC;";

		realizarConsulta($select.$from.$where, $conexion);
	}

	function busquedaPedidoPorRangoFechas($conexion, $select, $from, $where, $tipoPedido, $cedula, $fechaInicial, $fechaFinal){
		$where .= " AND DATE( p.fechaHora ) BETWEEN  '$fechaInicial' AND '$fechaFinal'";

		if($tipoPedido == "recibido"){
			$where .= " AND p.recibido=1";
		}else{
			if($tipoPedido == "espera"){
				$where .= " AND p.recibido=0 AND p.enviado=1";
			}
		}

		if($cedula != 0){
			$where .= " AND p.idEmpleado='$cedula'";
		}

		$where .= " ORDER BY p.fechaHora ASC;";

		realizarConsulta($select.$from.$where, $conexion);
	}

	function realizarConsulta($sql,$conexion){
		$result = $conexion->getConexion()->query($sql);

		if ($result->num_rows > 0) {
		   listar($result);
		} else {
		    echo "Ningun resultado.";
		}
		$conexion->getConexion()->close();
	}

	function listar($result){
		$aux = "";
		$note = "";
        $checked = "";

		while($row = $result->fetch_assoc()) {
		    $aux .= '<div class="trPedido"><div class="infoPuntosPedido"> <div class="colImgAdorno"><span class="icon-clipboard"></span></div><div class="colTitular" data-keyPedido="'.$row["id"].'" data-fecha="'.$row["fechaHora"].'" data-nomEmpl="'.$row["nomEmpleado"].'">';
			$aux .= 'Hecho el: '. $row["fechaHora"] .' por  '. $row["nomEmpleado"] .'</div></div><div class="footTrPedido"><div class="notaPedido">';

			if(empty($row["nota"])){
				$note = "No hay ninguna nota para el pedido.";
			}else{
				$note = $row["nota"];
			}

			if($row["recibido"] == 1 ){
				$checked = "checked disabled";
			}


			$aux .= $note.'</div><div class="btnsExtra"><span class="textBntExtra btnSumarInvt" data-keyPedido="'.$row["id"].'" data-keySucursal="'.$row["sucursal"].'">Sumar a inventario <span class="icon-plus"></span></span><span class="textBntExtra bVistoAdmin" data-visto="'.$row["visto"].'">Visto por admin.<span class="icon-eye2"></span></span><span class="textBntExtra">Recibido<input type="checkbox" data-keyPedido="'.$row["id"].'" '.$checked.' class="chckTrPedido"></span></div></div></div>'; 
		}
		echo $aux;
	}

	function listarDetalle($result, $fechaHora, $nomEmpleado){
		$aux = '<div class="shDetallePedido"><div class="encabezado"><span class="icon-clipboard"></span><p>Hecho el '.$fechaHora.' por  '.$nomEmpleado.'</p></div><div><table class="tbEstandar"><tbody><tr><td style="background: #d23f31;color:#fff;">Nombre del producto</td><td style="background: #d23f31;color:#fff;">Cantidad solicitada</td></tr></tbody></table></div><div><table class="tbEstandar"><tbody>';

		while($row = $result->fetch_assoc()){
			$aux .= '<tr><td>'.$row["nomProducto"].'</td><td>'.$row["cantidad"].$row["uMedida"].'</td>';
		}

		$aux .= '</tbody></table></div></div>'; 
		echo $aux;

	}
?>
<script type="text/javascript">

	$("#cntLoad").fadeOut("slow", function() {
    	$(".tablaListarPedidos").show("slow");
	});

	$(".btnSumarInvt").on("click", function(){
		procesarSumaInventario($(this).attr("data-keyPedido"), $(this).attr("data-keySucursal"));
	});

	$(".colTitular").on("click", function(){
		var data = new Object();
		data.pedido = $(this).attr("data-keyPedido").toString();
		data.fechaHora = $(this).attr("data-fecha").toString().replace("/:/g", "-");
		data.empleado = $(this).attr("data-nomEmpl").toString();

		$.post("../../view/empleados/listar_pedidos.php", {metodo: "verDetallePedido", data:JSON.stringify(data)}, function(htmlexterno){
   				$(".bodyTablaPedido").html(htmlexterno);
    	});
	});

	$(".chckTrPedido").change(function(){
		if ($(this).is(':checked')) {
          procesarMarcaRecibido( $(this).attr("data-keyPedido").toString(), this);
        }
	});

	$(".bVistoAdmin").on("click", function(){
		var msj = "Este pedido, aun no ha sido visto por el administrador.";
		if($(this).attr("data-visto").toString() == 1){
			msj = "Este ya ha sido visto por el administrador.";
		}

		alert(msj);
	});

	function procesarSumaInventario(idPedido, idSucursal){
		alertify.confirm('Tostador', '¿Esta seguro de sumar las cantidades solicitadas en el pedido, a los productos respectivos en inventario?', 
    			function(){
    				preguntarSuma(idPedido, idSucursal);
    			}
                , function(){ 
                	alertify.success("Suma cancelada");
                }
                ).set('labels', {ok:'Sumar', cancel:'Cancelar suma'});
	}

	function sumarInventario(idPedido, idSucursal){
		$.ajax({
            url:"../../Business/ControladoraPedido.php?metodo=sumarPedidoInventario",
            type:'GET',
            data:{pedido:idPedido, sucursal:idSucursal},
            success: function(responseText){
            	if(responseText > 0){
               		alertify.success("Se ha sumado el pedido al inventario.");

           		}else{
           			alertify.error("No se ha podido realizar la suma del pedido al inventario, intente de nuevo mas tarde.");
           		}
            }
        });
	}

	function preguntarSuma(idPedido, idSucursal){
		$.ajax({
            url:"../../Business/ControladoraPedido.php?metodo=estaSumado",
            type:'GET',
            data:{pedido:idPedido},
            success: function(responseText){
               if(responseText > 0){
               		alertify.message("Ya se ha sumado este pedido.");
               }else{
               		sumarInventario(idPedido, idSucursal);
               }
            }
        });
	}

	function procesarMarcaRecibido(idPedido, obj){
		alertify.confirm('Tostador', 'Al marcar el pedido como recibido, indica que el mismo llegó a la sucursal y no podrá modificar esta opción. <br>¿Está seguro que este ha llegado?', 
    			function(){
    				marcarRecibido(idPedido, obj);
    			}
                , function(){ 
                	
                }
                ).set('labels', {ok:'Si, entendido', cancel:'No, cancelar'});
	}

	function marcarRecibido(idPedido, obj){
		$.ajax({
            url:"../../Business/ControladoraPedido.php?metodo=marcarRecibido",
            type:'GET',
            data:{pedido:idPedido},
            success: function(responseText){
            	if(responseText > 0){
               		alertify.success("El pedido se ha marcado como recibido en la sucursal.");
               		$(obj).prop('disabled', true);
           		}else{
           			alertify.error("El pedido no se marcó como recibido. Intente de nuevo mas tarde.");
           		}
            }
        });
	}

</script>