<?php

	require ("Conexion.php");

	class DataSucursal extends Conexion{

		public function DataSucursal(){
			parent::__construct();
		}

		public function insertarSucursal($arrayDatos){
			
			$query = "INSERT INTO sucursal (nombre,direccion,telefono,disponible) VALUES ();"; 
			$result = $this->conexion->query($query);
		}

	}

?>