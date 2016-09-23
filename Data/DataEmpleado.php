<?php
	include_once ("Data.php");
	
	class DataEmpleado {

		var $conexion;

		public function DataEmpleado(){
			$mysqli = new Data();
			$this->conexion = $mysqli->getConexion();
		}
		public function getEmpleadosBySucursal(){
	        $query = "CALL ucrgrupo4.paGetEmpleadosBySucursal;"; 
	        $result = $this->conexion->query($query);

	        if ($result->num_rows > 0) {
	            $index = 0;
	            while ($row = $result->fetch_assoc()) {
	                $data[$index]["idSucursal"] = $row["idSucursal"];
	                $data[$index]["nombreSucursal"] = $row["nombreSucursal"];
	                $data[$index]["cedula"] = $row["cedula"];
	                $data[$index]["nombre"] = $row["nombre"];
	                $index ++;
	            }
	            return json_encode($data);
	        }
	        mysqli_close($this->conexion);
		}
		public function insertarEmpleado($arrayDatos){
			$empleado = json_decode($arrayDatos);

			$sentencia = $this->conexion->prepare("CALL paInsertarEmpleado(?,?,?,?,?,?,?,?)");
	        mysqli_stmt_bind_param($sentencia, "ssssssss", $cedula, $nombre, $telefono, $contrasenia, $fechaIngreso, $habilitado,$tipoEmpleado, $idSucursal);
	        $cedula = $empleado->cedula; 
	        $nombre = $empleado->nombre; 
	        $telefono = $empleado->telf; 
	        $contrasenia = md5($empleado->contrasenia); 
	        $fechaIngreso = date("Y")."-".date("m")."-".date("d"); 
	        $habilitado = $empleado->disponible; 
	        $tipoEmpleado = "e"; 
	        $idSucursal = $empleado->idSucursal;

	        $sentencia->execute();
	        $sentencia->close();
	        mysqli_close($this->conexion);
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