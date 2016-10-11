<?php
    include_once 'Data.php';
   
    class DataProducto{
        var $conexion;
        
        function __construct(){
            $mysqli = new Data();
            $this->conexion = $mysqli->getConexion();
        }
        
        public function insertarActualizarProducto($producto, $componentesProducto){
            $sentencia = $this->conexion->prepare("CALL paInsertarActualizarProducto(?,?,?,?,?,?,?,?,?,?)");
            mysqli_stmt_bind_param($sentencia, "ssssssssss", $codigo,$nombre, $abreviatura, $stock, $unidadMedida, $precio,$proveedor,$tamanio,$idSucursal,$idCategoria);

            $codigo=$producto->getCodigo();
            $nombre=$producto->getNombre();
            $stock=$producto->getStock();
            $precio=$producto->getPrecio();
            $unidadMedida=$producto->getUnidadMedida();
            $proveedor=$producto->getProveedor();
            $tamanio = $producto->getTamanio();
            $idSucursal=$producto->getIdSucursal();
            $idCategoria=$producto->getIdCategoria();
            $abreviatura=$producto->getAbreviatura();

            $sentencia->execute();
            $sentencia->close();

            if(!empty($componentesProducto)){
                $query = "SELECT codigo FROM producto ORDER BY codigo DESC LIMIT 1;";
                $result = $this->conexion->query($query);

                $codigoProducto = 0;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $codigoProducto = $row['codigo'];
                    }
                }
                $this->agregarProductosCompuestos($codigoProducto,$componentesProducto);
            }else{
                mysqli_close($this->conexion);
            }
        }

        public function agregarProductosCompuestos($codigoProducto, $componentes){
           
            $this->limpiarComponentesProducto($codigoProducto);
            $array = explode(",", $componentes);
            $longitud = count($array);
 
            //Recorro todos los elementos
            for($i=0; $i<$longitud; $i++){
                $stmt = $this->conexion->prepare("CALL paAgregarProductosProductoCompuesto(?,?)");
                mysqli_stmt_bind_param($stmt, "ss", $codigoPrdCompuesto, $codigoComponeProducto);
                $codigoPrdCompuesto = $codigoProducto;
                $codigoComponeProducto = $array[$i];
                $stmt->execute();
            }
            mysqli_close($this->conexion);
        }
        // antes de insertar los componentes de un producto, elimina todos los componentes que tiene actualmente
        public function limpiarComponentesProducto($codigoProducto){
            
            $sentencia = $this->conexion->prepare("CALL paEliminarComponentesProducto(?)");
            mysqli_stmt_bind_param($sentencia, "s", $codigo);
            $codigo = $codigoProducto;

            $sentencia->execute();
            $afectados =  mysqli_affected_rows($this->conexion);

            return $afectados;
        }

        public function getProductosBySucursal($idSucursal){
            $sentencia = $this->conexion->prepare("CALL paGetProductosBySucursal(?);");
            mysqli_stmt_bind_param($sentencia, "s", $codigo);
            $codigo = $idSucursal; 

            $sentencia->execute();
            
            if ($resultado = $sentencia->get_result()) {
                $index = 0;
                while ($row = $resultado->fetch_assoc()) {
                    $data[$index]["codigo"] = $row['codigo'];
                    $data[$index]["nombre"] = $row['nombre'];
                    $data[$index]["stock"] = $row['stock'];
                    $data[$index]["unidadMedida"] = $row['unidadMedida'];
                    $data[$index]["precio"] = $row['precio'];
                    $data[$index]["proveedor"] = $row['proveedor'];
                    $data[$index]["tamanio"] = $row['tamanio'];
                    $data[$index]["abreviatura"] = $row['abreviatura'];
                    $data[$index]["idCategoria"] = $row['idCategoria'];
                    $data[$index]["nombreCategoria"] = $row['nombreCategoria'];
                $index ++;
                }
            
            $sentencia->close();
            return json_encode($data);
            }
            mysqli_close($this->conexion);
        }

        public function getProductosProductoCompuesto($codigoProducto){
            $sentencia = $this->conexion->prepare("CALL paGetProductosProductoCompuesto(?);");
            mysqli_stmt_bind_param($sentencia, "s", $codigo);
            $codigo = $codigoProducto; 

            $sentencia->execute();
            
            if ($resultado = $sentencia->get_result()) {
                $index = 0;
                while ($row = $resultado->fetch_assoc()) {
                    $data[$index]["codigo"] = $row['codigo'];
                    $data[$index]["nombre"] = $row['nombre'];
                    $data[$index]["stock"] = $row['stock'];
                    $data[$index]["unidadMedida"] = $row['unidadMedida'];
                    $data[$index]["precio"] = $row['precio'];
                    $data[$index]["proveedor"] = $row['proveedor'];
                    $data[$index]["tamanio"] = $row['tamanio'];
                    $data[$index]["abreviatura"] = $row['abreviatura'];
                    $data[$index]["idCategoria"] = $row['idCategoria'];
                    $data[$index]["nombreCategoria"] = $row['nombreCategoria'];
                $index ++;
                }
            
            $sentencia->close();
            return json_encode($data);
            }
            mysqli_close($this->conexion);
        }
        //Elimina ya sea un producto compuesto o solo un producto
        public function eliminarProducto($codigoProducto){
            $sentencia = $this->conexion->prepare("CALL paEliminarProducto(?)");
            mysqli_stmt_bind_param($sentencia, "s", $codigo);
            $codigo = $codigoProducto;

            $sentencia->execute();
            $afectados =  mysqli_affected_rows($this->conexion);
            mysqli_close($this->conexion);

        return $afectados;
        }

    }

?>
