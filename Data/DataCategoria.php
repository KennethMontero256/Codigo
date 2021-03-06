<?php
include_once ("Data.php");
    class DataCategoria{

        var $conexion;
        
        public function DataCategoria(){
            $mysqli = new Data();
            $this->conexion = $mysqli->getConexion();
        }

        public function agregarActualizarCategoria($categoria){
            $aux = true;
            
            try{
                $sentencia = $this->conexion->stmt_init();
                $sentencia->prepare("CALL paInsertarActualizarCategoria(?,?)");

                $nombre = $categoria->getNombre();
                $codigo = $categoria->getCodigo(); 
                $sentencia->bind_param("ss", $nombre, $codigo);

                $sentencia->execute();
                
                $sentencia->close();

            }catch(mysqli_sql_exception $e){
                $aux = false;
            }
                
            return  $aux;
        }

        public function eliminarCategoria($codigoCategoria){
            $sentencia = $this->conexion->stmt_init();
            $sentencia->prepare("CALL paEliminarCategoria(?)");
            $codigo = $codigoCategoria;
            $sentencia->bind_param("s", $codigo);

            $sentencia->execute();
            $afectados =  mysqli_affected_rows($this->conexion);
            mysqli_close($this->conexion);

        return $afectados;
        }

        public function getCategoria($codigoCategoria){

            $sentencia = $this->conexion->stmt_init();
            $sentencia->prepare("CALL paObtenerCategoria(?);");

            $codigo = $codigoCategoria;
            $sentencia->bind_param("s", $codigo); 

            $sentencia->execute();
            $sentencia->bind_result($id,$nombre);

            $array = array();

            while($sentencia->fetch()){

                array_push($array, array("id"=>$id,"nombre"=>$nombre));
            }
            
            $sentencia->close();
            return json_encode($array);
            
            mysqli_close($this->conexion);
        }

        public function actualizarPorNombre($nuevoNombre, $idNombre){
             $aux = true;
            try{
                $sql = "UPDATE categoria SET nombre = '$nuevoNombre' WHERE nombre like '$idNombre';";

                $this->conexion->query($sql);

                mysqli_close($this->conexion);
            }catch(mysqli_sql_exception $e){
                $aux = false;
            }

            return  $aux;
        }

        public function eliminarCategoriaPorNombre($idNombre){
             $aux = true;
            try{
                $sql = "DELETE FROM categoria WHERE nombre like '$idNombre';";

                $this->conexion->query($sql);

                mysqli_close($this->conexion);
            }catch(mysqli_sql_exception $e){
                $aux = false;
            }

            return  $aux;
        }
    }
?>
