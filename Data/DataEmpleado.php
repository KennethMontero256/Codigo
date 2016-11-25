<?php

include_once ("Data.php");

class DataEmpleado {

    var $conexion;

    function __construct() {
        $mysqli = new Data();
        $this->conexion = $mysqli->getConexion();
    }

    public function getEmpleadosBySucursal() {
<<<<<<< HEAD
        $sentencia = $this->conexion->stmt_init();
        $sentencia->prepare("CALL paGetEmpleadosBySucursal();");

        $sentencia->execute();
        $sentencia->bind_result($idSucursal, $nombreSucursal, $cedula, $nombre, $habilitado, $telefono);

        $empleados = array();

        while($sentencia->fetch()){
            array_push($empleados, array("idSucursal"=>$idSucursal,"nombreSucursal"=>$nombreSucursal, "cedula"=>$cedula,"nombre"=>$nombre, "habilitado"=>$habilitado, "telefono"=>$telefono));
=======
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
>>>>>>> 0566012c6bcad2418fb0db2ce0396037812c902e
        }
        mysqli_close($this->conexion);
    }

    public function insertarEmpleado($arrayDatos) {
        $empleado = json_decode($arrayDatos);

        $sentencia = $this->conexion->stmt_init();
        $sentencia->prepare("CALL paInsertarEmpleado(?,?,?,?,?,?,?,?)");

        $cedula = $empleado->cedula;
        $nombre = $empleado->nombre;
        $telefono = $empleado->telf;
        $contrasenia = md5($empleado->contrasenia);
        $fechaIngreso = date("Y") . "-" . date("m") . "-" . date("d");
        $habilitado = $empleado->disponible;
        $tipoEmpleado = "e";
        $idSucursal = $empleado->idSucursal;
        $sentencia->bind_param("ssssssss", $cedula, $nombre, $telefono, $contrasenia, $fechaIngreso, $habilitado, $tipoEmpleado, $idSucursal);

        $sentencia->execute();
        $sentencia->close();
        mysqli_close($this->conexion);
    }

    public function getEmpleados() {
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

    public function getEmpleadoById($cedula) {
        $sentencia = $this->conexion->stmt_init();
        $sentencia->prepare("CALL ucrgrupo4.paGetEmpleadosByCedula(?);");

        $cedulaEmpleado = $cedula;
        $sentencia->bind_param("s", $cedulaEmpleado);

        $sentencia->execute();
        $sentencia->bind_result($cedula, $nombre, $telefono, $fechaIngreso, $habilitado, $idSucursal, $nombreSucursal);
        $empleados = array();

        while ($sentencia->fetch()) {
            array_push($empleados, "cedula" => $cedula, "nombre" => $nombre, "telefono" => $telefono, "fechaIngreso" => $fechaIngreso, "habilitado" => $habilitado, "idSucursal" => $idSucursal, "nombreSucursal" => $nombreSucursal);
        }
        $sentencia->close();
        return json_encode($empleados);
        mysqli_close($this->conexion);
    }

    public function eliminarEmpleado($cedula) {
        $sentencia = $this->conexion->stmt_init();
        $sentencia->prepare("CALL paEliminarEmpleado(?)");

        $cedulaEmpleado = $cedula;
        $sentencia->bind_param("s", $cedulaEmpleado);

        $sentencia->execute();
        $afectados = mysqli_affected_rows($this->conexion);
        mysqli_close($this->conexion);

        return $afectados;
    }

<<<<<<< HEAD
    public function actualizarPass($cedula, $nuevaPass){
        $sentencia = $this->conexion->stmt_init();
        $sentencia->prepare("CALL paActualizarPassword(?,?)");

        $cedulaEmpleado = $cedula;
        $pass = $nuevaPass;
        $sentencia->bind_param("ss", $cedulaEmpleado, $pass);

        $sentencia->execute();
        $afectados = mysqli_affected_rows($this->conexion);
        mysqli_close($this->conexion);

        return $afectados;
    }

    public function editEmpleado($arrayDatos){
        $empleado = json_decode($arrayDatos);

        $sentencia = $this->conexion->stmt_init();
        $sentencia->prepare("CALL paEditEmpleado(?,?,?,?,?)");

        $cedula = $empleado->cedula;
        $nombre = $empleado->nombre;
        $telefono = $empleado->telf;
        $habilitado = $empleado->habilitado;
        $idSucursal = $empleado->sucursal;
        
        $sentencia->bind_param("sssss", $cedula, $nombre, $telefono, $habilitado, $idSucursal );

        $sentencia->execute();
        $afectados = mysqli_affected_rows($this->conexion);
        mysqli_close($this->conexion);

        return $afectados;
    }

=======
>>>>>>> 0566012c6bcad2418fb0db2ce0396037812c902e
}

?>