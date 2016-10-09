<?php
    include_once 'Data.php';
   
    class DataProducto{
        private var $conexion;
        
        function __construct(){
            $mysqli = new Data();
            $this->conexion = $mysqli->getConexion();
        }
        public function insertarActualizarProducto($producto){
            $sentencia = $this->conexion->prepare("CALL paInsertarActualizarProducto(?,?,?,?,?,?,?,?)");
            mysqli_stmt_bind_param($sentencia, "sssssssss", $codigo,$nombre,$stock,$precio,$unidadMedida,$proveedor,$tamanio,$idSucursal,$idCategoria, $abreviatura);

            $codigo=$producto->getCodigo();
            $nombre=$producto->getNombre();
            $stock=$producto->getStock();
            $precio=$producto->getPrecio();
            $unidadMedida=$producto->getUnidadMedida();
            $proveedor=$producto->getProveedor();
            $tamanio = $producto->;
            $idSucursal=$producto->getIdSucursal();
            $idCategoria=$producto->getIdCategoria();
            $abreviatura=$producto->getAbreviatura();

            $sentencia->execute();
            $sentencia->close();
            mysqli_close($this->conexion);
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
    }

?>
