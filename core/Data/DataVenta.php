<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//include("../Domain/Empleado.php");
//include_once ("../Data/Data.php");
include_once 'Data.php';




function getTotalVentas() {
    $conn = getConnection();
    $sql = "SELECT COUNT(codigo) FROM venta;";
    $resultado = $conn->query($sql);
    $row = $resultado->fetch_assoc();
    $totalVentas = $row['COUNT(codigo)'];
    $conn->close();
    return $totalVentas;
}

/*
function ejemplo(){
    
    $mysqli = getConnection();
    $sql = "select * from empleado;";
    $resultado = $mysqli->query($sql);
    $vector = [];
    if ($resultado->num_rows > 0) {
        // output data of each row
        while ($row = $resultado->fetch_assoc()) {
            $empleado = new Empleado();
            $empleado->setCedulaEmpleado($row['cedula']);
            $empleado->setNombre($row['nombre']);
            $empleado->setTelefono($row['telefono']);
            array_push($vector, $empleado);
        }
    } else {
        echo "0 results";
    }
    $mysqli->close();     
    return $vector;
    
    
} */

