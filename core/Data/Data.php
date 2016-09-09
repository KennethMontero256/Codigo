<?php

class Data {

  public function conexion(){

    $conexion=new mysqli("localhost", "root", "", "el_tostador") or die("Error de Conexion DB!");
    return $conexion;
  }

  public function recorrer($query) {
    return mysqli_fetch_array($query);
  }

}

?>
