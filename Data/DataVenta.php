<?php 
    include_once 'Data.php';

    class DataVenta{
        var $conexion;
        
        function __construct(){
            $mysqli = new Data();
            $this->conexion = $mysqli->getConexion();
        }

        public function insertar($venta, $listaDetalle){

        }

        public function mostrar($idSucursal, $cedulaEmpleado){
            
        }

    }
?>