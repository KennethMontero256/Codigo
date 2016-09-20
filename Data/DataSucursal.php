<?php

	require ("Conexion.php");

	class DataSucursal extends Conexion{

		public function DataSucursal(){
			parent::__construct();
		}

		public function insertarSucursal($arrayDatos){
			$sucursal = json_decode($arrayDatos);
			
			$sentencia = $this->conexion->prepare("CALL paAgregarSucursal(?,?,?,?,?)"); 
			mysqli_stmt_bind_param($sentencia,"sssss", $nombre, $direccion, $telf, $disponible, $idAdmin);
			$nombre = $sucursal->nombre; 
			$direccion = htmlentities($sucursal->direccion, ENT_QUOTES,'UTF-8'); 
			$telf = $sucursal->telf;
			$disponible = $sucursal->disponible;
			$idAdmin = 1;

			$sentencia->execute();

			/*Obtiene la sucursal agregada*/
			$query = "SELECT id FROM sucursal ORDER BY id DESC LIMIT 1;";
			$result = $this->conexion->query($query);
			
			$idSucursal = 0;
			if ($result->num_rows > 0) {
			   while ($row = $result->fetch_assoc()) {
				   	$idSucursal = $row['id'];
		    	}
			}
			
			foreach(json_decode($sucursal->empleados) as $obj){
	        	echo "cedula: ".$obj->cedula."<br>";
	        	$stmt = $this->conexion->prepare("CALL paActualizarSucursalEmpleado(?,?)");
	        	mysqli_stmt_bind_param($stmt,"ss", $cedula, $idSucursal);
				$cedula = $obj->cedula;
				echo "Ultimo id: ".$idSucursal;
				$stmt->execute();
			}

			$this->closeConnection();
		}
	}

?>