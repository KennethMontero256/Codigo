<?php 
	include_once ("Data.php");

	class DataPedido{
		var $conexion;

	    function __construct() {
	        $mysqli = new Data();
	        $this->conexion = $mysqli->getConexion();
	    }
	    /*Funciones para empleado*/
	    public function agregarPedido($encabezadoPedido, $detallePedido){
	    	$pedido = json_decode($encabezadoPedido);
	    	$date = new DateTime("now", new DateTimeZone('America/Costa_Rica'));
	    	$sentencia = $this->conexion->stmt_init();

            $sentencia->prepare("CALL paAgregarPedidoSucursal(?,?,?,?,?)");

            $sucursal = $pedido->sucursal;
            $empleado = $pedido->empleado;
            $fechaHora = $date->format('Y-m-d H:i:s');
            $visto = 0;
            $entregado = 0;
            $sentencia->bind_param("sssss",$sucursal, $empleado, $fechaHora, $visto, $entregado);

            $sentencia->execute();
            $sentencia->close();

            if(!empty($detallePedido)){
                $query = "SELECT id FROM pedido ORDER BY id DESC LIMIT 1;";
                $result = $this->conexion->query($query);
          
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $this->agregarDetallePedido($row['id'], $detallePedido);
                }
                
            }else{
                mysqli_close($this->conexion);
            }
	    }

	    public function agregarDetallePedido($pedido, $detallePedido){
	    	//se define la zona horaria para costa rica
	    	$date = new DateTime("now", new DateTimeZone('America/Costa_Rica'));
	    	$array = json_decode($detallePedido);
            
            //se recorre el array json que trae las lineas del detalle del pedido
            foreach ($array as $lineaPedido) {
                $sentencia = $this->conexion->stmt_init();
                $sentencia->prepare("CALL paAgregarDetallePedidoSucursal(?,?,?,?);");

                $codigoSucursal = $lineaPedido->sucursal;
                $idPedido = $pedido;
               	$codigoProducto = $lineaPedido->producto;
               	$cantidad = $lineaPedido->cantidad;

                $sentencia->bind_param("ssss", $codigoSucursal, $idPedido, $codigoProducto, $cantidad);

                $sentencia->execute();
            }
	    }


	}

?>