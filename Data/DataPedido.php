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

            $sentencia->prepare("CALL paAgregarPedidoSucursal(?,?,?,?)");

            $sucursal = $pedido->sucursal;
            $empleado = $pedido->empleado;
            $fechaHora = $date->format('Y-m-d H:i:s');
            $nota = (empty($pedido->mensaje))?"Ninguna":$pedido->mensaje;
            $sentencia->bind_param("ssss",$sucursal, $empleado, $fechaHora, $nota);

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
                $sentencia->prepare("CALL paAgregarDetallePedidoSucursal(?,?,?);");

                $idPedido = $pedido;
               	$codigoProducto = $lineaPedido->producto;
               	$cantidad = $lineaPedido->cantidad;

                $sentencia->bind_param("sss", $idPedido, $codigoProducto, $cantidad);

                $sentencia->execute();
            }
	    }

        public function agregarMensajeConversacionPedido($mensaje){
            $sentencia = $this->conexion->stmt_init();
            $sentencia->prepare("CALL paAgregar(?,?,?);");

            $pedido = $idPedido;
            $empleado = $idEmpleado;
            $mensaje = $msj;

            $sentencia->bind_param("sss", $pedido , $empleado, $mensaje);

            $sentencia->execute();
        }

        public function sumarPedidoInventario($pedido, $sucursal){
            $sentencia = $this->conexion->stmt_init();
            $sentencia->prepare("CALL paGetLineaDetallePedido(?,?);");

            $idSucursal = $sucursal;
            $idPedido = $pedido;

            $sentencia->bind_param("ss", $idSucursal, $idPedido);

            $sentencia->execute();
            $sentencia->bind_result($codigoProducto, $cantidadASumar, $stock);

            $lineas = array();

            while($sentencia->fetch()){
                array_push($lineas, array('codigo'=>$codigoProducto, 'stockSumar'=>$cantidadASumar, 'stock'=>$stock));
            }
            
            $sentencia->close();
            
            $this->actualizarStock($lineas);

            $this->marcarSumado($pedido);

            return 1;
        }

        public function actualizarStock($data){
            
            foreach ($data as $lineaPedido) {
                $sentencia = $this->conexion->stmt_init();
                $sentencia->prepare("CALL paActualizarStockProducto(?,?,?);");

                $producto = $lineaPedido["codigo"];
                $nuevoStock = $lineaPedido["stockSumar"];
                $viejoStock = $lineaPedido["stock"];

                $sentencia->bind_param("sss", $producto, $nuevoStock, $viejoStock);
                $sentencia->execute();

                $sentencia->close();
            }
        }

        public function estaSumadoPedido($pedido){
            
            $aux = 0;
            $sql = "SELECT sumado_inventario FROM pedido WHERE id=$pedido;";
            $result = $this->conexion->query($sql);

            if ($result->num_rows > 0) {
               
                while($row = $result->fetch_assoc()) {
                    $aux = $row["sumado_inventario"];
                }

            } 

            mysqli_close($this->conexion);
            
            return $aux;
        }

        public function marcarRecibido($pedido){
            $sentencia = $this->conexion->stmt_init();
            $sentencia->prepare("CALL paMarcarRecibido(?)");

            $idPedido = $pedido;
            $sentencia->bind_param("s", $idPedido);

            $sentencia->execute();
            $afectados =  mysqli_affected_rows($this->conexion);

            $sentencia->close();
            
            mysqli_close($this->conexion);

            return $afectados;
        }

        public function marcarSumado($pedido){
            $sentencia = $this->conexion->stmt_init();
            $sentencia->prepare("CALL paMarcarPedidoSumado(?)");

            $idPedido = $pedido;
            $sentencia->bind_param("s", $idPedido);

            $sentencia->execute();
            $afectados =  mysqli_affected_rows($this->conexion);

            $sentencia->close();
            
            mysqli_close($this->conexion);

            return $afectados;
        }


	}

?>