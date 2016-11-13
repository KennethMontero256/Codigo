<?php

class Data extends mysqli {

  private $conexion;

  public function Data() {
    try{

      $this->conexion = new mysqli('68.178.217.43', 'ucrgrupo4', 'Grupo#4LkF!', 'ucrgrupo4');
      
      if ($this->conexion->ping()) {
      } else {
          $mensaje = "Error de conexión a la base de datos.\nSi desea, vaya al inicio e intente de nuevo o ingrese mas tarde.";
    
          header('Location: Error.php?mensaje='+$mensaje);
      }
    }catch (mysqli_sql_exception $e){
      
    }
  }

  public function recorrer($query) {
    return mysqli_fetch_array($query);
  }

  public function getConexion(){
    return $this->conexion;
  }

}

function getConnection(){

    $mysqli = new mysqli('68.178.217.43', 'ucrgrupo4', 'Grupo#4LkF!', 'ucrgrupo4');

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    return $mysqli;
}

?>