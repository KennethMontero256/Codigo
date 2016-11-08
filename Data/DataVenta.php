<?php 
    include_once 'Data.php';
    class DataVenta{
        var $conexion;
        
        function __construct(){
            $mysqli = new Data();
            $this->conexion = $mysqli->getConexion();
        }

        public function insertarVenta($venta, $listaDetalle){
            $sentencia = $this->conexion->stmt_init();
            $sentencia->prepare("CALL paInsertarVenta(?,?,?,?,?,?);");

            $idSucursal= $venta->getIdSucursal();
            $fechaHora= $venta->getFechaHora(); 
            $idEmpleado= $venta->getIdEmpleado();
            $impuestoVenta= $venta->getImpuestoVenta();
            $subtotal= $venta->getSubtotal(); 
            $total= $venta->getTotal();
            $sentencia->bind_param("ssssss",$idSucursal, $fechaHora, $idEmpleado, $impuestoVenta, $subtotal, $total);

            $sentencia->execute();
            $afectados =  mysqli_affected_rows($this->conexion);
            $sentencia->close();

            if(!empty($listaDetalle)){

                $query = "SELECT codigo FROM venta ORDER BY codigo DESC LIMIT 1;";
                $result = $this->conexion->query($query);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $this->insertarDetalle($row['codigo'], $listaDetalle);
                }
            }else{
                mysqli_close($this->conexion);
            }
        }

        public function insertarDetalle($codVenta, $listaDetalle){
            $array = json_decode($listaDetalle);
            foreach ($array as $lineaVenta) {
                $sentencia = $this->conexion->stmt_init();
                $sentencia->prepare("CALL paInsertarDetalleVenta(?,?,?,?,?);");

                $codigoVenta = $codVenta;
                $codigoProducto = $lineaVenta->codigoProducto;
                $precio = $lineaVenta->precio;
                $cantidad = $lineaVenta->cantidad;
                $totalLinea = $lineaVenta->totalLinea;
                $sentencia->bind_param("sssss",$codigoVenta, $codigoProducto, $precio, $cantidad, $totalLinea);

                $sentencia->execute();
            }
        }

        public function getVentasByMes($idSucursal, $cedulaEmpleado, $mes, $anio){
            $sentencia = $this->conexion->stmt_init();
            $sentencia->prepare("CALL paGetVentasByMes(?,?,?,?);");

            $sucursal = $idSucursal;
            $cedEmpleado = $cedulaEmpleado;
            $mesVenta = $mes;
            $anioVenta = $anio;

            $sentencia->bind_param("ssss",$idSucursal, $cedEmpleado , $mesVenta, $anioVenta);
            $sentencia->execute(); 
            $sentencia->bind_result($codigo, $fechaHora, $idEmpleado, $impuestoVenta, $subtotal,$total);
            $ventas = array();

            while($sentencia->fetch()){
                array_push($ventas, array("codigo"=>$codigo, "fecha"=>$fechaHora, "empleado"=>$idEmpleado, "iva"=>$impuestoVenta, "subtotal"=>$subtotal, "total"=>$total));
            }

            $sentencia->close();
            mysqli_close($this->conexion);

            return json_encode($ventas);
        }
        
        public function obtenerVentaPorFecha($sucursal, $fechaActual){
            $sentencia = $this->conexion->stmt_init();
            $sentencia->prepare("CALL paGetVentaPorFecha(?,?);");
            $idSucursal=$sucursal;
            $fecha=$fechaActual;
            $sentencia->bind_param("ss",$idSucursal,$fecha);
            $sentencia->execute();
            $sentencia->bind_result($codigo, $idEmpleado, $impuestoVenta, $subtotal, $total);
            $ventas = array();
            while($sentencia->fetch()){
                $venta = new Venta($codigo,$idSucursal,$fecha,$idEmpleado,$impuestoVenta,$subtotal,$total);
                array_push($ventas, $venta);
            }
            $sentencia->close();
            mysqli_close($this->conexion);
            return json_encode($ventas);
        }
        
        public function getProductosBySucursal($idSucursal){
            $sentencia = $this->conexion->stmt_init();
            $sentencia->prepare("CALL paGetProductosBySucursal(?);");

            $codigo = $idSucursal;
            $sentencia->bind_param("s", $codigo);

            $sentencia->execute();
            $sentencia->bind_result($codigoProducto, $nombre, $stock, $unidadMedida, $precio, $proveedor,$tamanio, $abreviatura, $idCategoria, $nombreCategoria);
            
            $productos = array();
            while($sentencia->fetch()){

                array_push($productos, array("codigo"=>$codigoProducto,"nombre"=>$nombre, "stock"=>$stock,"unidadMedida"=>$unidadMedida, "precio"=>$precio,"proveedor"=>$proveedor, "tamanio"=>$tamanio,"abreviatura"=>$abreviatura, "idCategoria"=>$idCategoria,"nombreCategoria"=>$nombreCategoria));
            }
            
            $sentencia->close();
            mysqli_close($this->conexion);

            return json_encode($productos);
        }
        
        

    }
?>