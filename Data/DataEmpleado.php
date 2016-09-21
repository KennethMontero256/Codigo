<?php
	include_once ("Data.php");
	
	class DataEmpleado {

		var $conexion;

		public function DataEmpleado(){
			$mysqli = new Data();
			$this->conexion = $mysqli->getConexion();
		}

		public function insertarEmpleado($arrayDatos){
			$query = "INSERT INTO empleado (cedula,nombre,telefono) VALUES ();"; 
			$result = $this->conexion->query($query);
		}

		public function getEmpleados(){
			$query = "CALL ucrgrupo4.paObtenerEmpleados();"; 
			$result = $this->conexion->query($query);

			if ($result) {
			   $index = 0;
			   while ($row = $result->fetch_assoc()) {
				   	$data[$index]["cedula"] = $row['cedula'];
				   	$data[$index]["nombre"] = $row['nombre'];

				   	$index ++;
		    	}
		    return json_encode($data);
			}
		}

	}

?>