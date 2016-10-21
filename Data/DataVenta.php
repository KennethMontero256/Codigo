<?php 
    include_once 'Data.php';

    class DataVenta{
        var $conexion;
        
        function __construct(){
            $mysqli = new Data();
            $this->conexion = $mysqli->getConexion();
        }

        public function insertarVenta($venta, $listaDetalle){
            $sentencia = $this->conexion->prepare("CALL paInsertarVenta(?,?,?,?,?,?)");
            mysqli_stmt_bind_param($sentencia, "ssssss",$idSucursal, $fechaHora, $idEmpleado, $impuestoVenta, $subtotal, $total);

            $idSucursal= $venta->getIdSucursal();
            $fechaHora= $venta->getFechaHora(); 
            $idEmpleado= $venta->getIdEmpleado();
            $impuestoVenta= $venta->getImpuestoVenta();
            $subtotal= $venta->getSubtotal(); 
            $total= $venta->getTotal();

            $sentencia->execute();
            $sentencia->close();

            if(!empty($listaDetalle)){
                $query = "SELECT codigo FROM venta ORDER BY codigo DESC LIMIT 1;";
                $result = $this->conexion->query($query);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $this->insertarDetalle($row['codigo'], $listaDetalle);
                }

                mysqli_close($this->conexion);
            }else{
                mysqli_close($this->conexion);
            }
        }

        public function insertarDetalle($codVenta, $listaDetalle){
            foreach (json_decode($listaDetalle) as $lineaVenta) {
                
                $sentencia = $this->conexion->prepare("CALL paInsertarDetalleVenta(?,?,?,?,?)");
                mysqli_stmt_bind_param($sentencia, "sssss",$codigoVenta, $codigoProducto, $precio, $cantidad, $totalLinea);

                $codigoVenta = $codVenta;
                $codigoProducto = $lineaVenta->codigoProducto;
                $precio = $lineaVenta->precio;
                $cantidad = $lineaVenta->cantidad;
                $totalLinea = $lineaVenta->totalLinea;

                $sentencia->execute();
                $sentencia->close();
            }
        }

        public function mostrar($idSucursal, $cedulaEmpleado){
            
        }

    }
?>