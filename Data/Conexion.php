<?php

	require ("../core.php");
	class Conexion {

		public $conexion;

		public function Conexion(){
			try{
				$this->conexion= new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
			}catch(Exception $e){
				
				$this->conexion= new mysqli("localhost","root","","tostador");

				if($this->conexion->connect_errno){
					echo "Disculpe, error de conexión a base de datos: ".$e->getMessage();
				}
				
			}
			
		}

		public function getConnection(){
			return $this->conexion;
		}

		public function closeConnection(){
			mysqli_close($this->conexion);
		}

	}
?>