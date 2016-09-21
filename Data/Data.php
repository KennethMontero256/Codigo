<<<<<<< HEAD
ï»¿<?php

class Data extends mysqli {

  private $conexion;

  public function Data() {
    $this->conexion = new mysqli('68.178.217.43', 'ucrgrupo4', 'Grupo#4LkF!', 'ucrgrupo4');
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
=======
<?php

class Data extends mysqli {

  public function __construct() {
    parent::__construct(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    $this->connect_errno ? die('Error en la conexión a la base de datos') : null;
  }

  public function recorrer($query) {
    return mysqli_fetch_array($query);
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
>>>>>>> 1dc226a5b89c9b22e6ad3407a73fdc116463f5c7
