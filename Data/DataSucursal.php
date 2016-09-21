<?php

include_once 'Data.php';

class DataSucursal{

    private $mysqli;

    public function DataSucursal() {

        $this->mysqli = new Data();
    }

    public function insertarSucursal($arrayDatos) {
        $sucursal = json_decode($arrayDatos);
        
        $conexion = $this->mysqli->getConexion();
        $sentencia = $conexion->prepare("CALL paAgregarSucursal(?,?,?,?,?)");
        mysqli_stmt_bind_param($sentencia, "sssss", $nombre, $direccion, $telf, $disponible, $idAdmin);
        $nombre = $sucursal->nombre;
        $direccion = htmlentities($sucursal->direccion, ENT_QUOTES, 'UTF-8');
        $telf = $sucursal->telf;
        $disponible = $sucursal->disponible;
        $idAdmin = 1;

        $sentencia->execute();

        /* Obtiene la sucursal agregada */
        $query = "SELECT id FROM sucursal ORDER BY id DESC LIMIT 1;";
        $result = $conexion->query($query);

        $idSucursal = 0;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $idSucursal = $row['id'];
            }
        }

        foreach (json_decode($sucursal->empleados) as $obj) {
            echo "cedula: " . $obj->cedula . "<br>";
            $stmt = $conexion->prepare("CALL paActualizarSucursalEmpleado(?,?)");
            mysqli_stmt_bind_param($stmt, "ss", $cedula, $idSucursal);
            $cedula = $obj->cedula;
            echo "Ultimo id: " . $idSucursal;
            $stmt->execute();
        }

        mysqli_close($conexion);
    }
    
    public function getSucursales(){
        $conexion = $this->mysqli->getConexion();
        $query = "CALL ucrgrupo4.paMostrarSucursales;"; 
        
        $result = $conexion->query($query);

        if ($result->num_rows > 0) {
            $index = 0;
            while ($row = $result->fetch_assoc()) {
                $data[$index]["id"] = $row['id'];
                $data[$index]["nombre"] = $row['nombre'];
                $data[$index]["disponible"] = $row['disponible'];
                $index ++;
            }
            return json_encode($data);
        }
        mysqli_close($conexion);
    }

    public function eliminarSucursal($id){
        $conexion = $this->mysqli->getConexion();
        $query = "DELETE FROM sucursal WHERE id=$id"; 

        $result = $conexion->query($query);

        mysqli_close($conexion);

        return $result->num_rows;
    }

}



?>