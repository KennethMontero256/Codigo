<?php
include_once ("Data.php");
    class DataCategoria{

        var $conexion;
        
        public function DataCategoria(){
            $mysqli = new Data();
            $this->conexion = $mysqli->getConexion();
        }

        public function agregarActualizarCategoria($categoria){
            
            $sentencia = $this->conexion->prepare("CALL paInsertarActualizarCategoria(?,?)");
            mysqli_stmt_bind_param($sentencia, "ss", $nombre, $codigo);
            $nombre = $categoria->getNombre();
            $codigo = $categoria->getCodigo(); 

            $sentencia->execute();
            $sentencia->close();
            mysqli_close($this->conexion);
        }

        public function eliminarCategoria($codigoCategoria){
            $sentencia = $this->conexion->prepare("CALL paEliminarCategoria(?)");
            mysqli_stmt_bind_param($sentencia, "s", $codigo);
            $codigo = $codigoCategoria;

            $sentencia->execute();
            $afectados =  mysqli_affected_rows($this->conexion);
            mysqli_close($this->conexion);

        return $afectados;
        }

        public function getCategoria($codigoCategoria){
            $sentencia = $this->conexion->prepare("CALL paObtenerCategoria(?);");
            mysqli_stmt_bind_param($sentencia, "s", $codigo);
            $codigo = $codigoCategoria; 

            $sentencia->execute();
            
            if ($resultado = $sentencia->get_result()) {
                $index = 0;
                while ($row = $resultado->fetch_assoc()) {
                    $data[$index]["id"] = $row['id'];
                    $data[$index]["nombre"] = $row['nombre'];
                $index ++;
                }
            
            $sentencia->close();
            return json_encode($data);
            }
            mysqli_close($this->conexion);
        }
    }
?>
