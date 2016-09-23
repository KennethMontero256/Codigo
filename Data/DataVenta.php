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

function insertVenta($venta, $lineas){
    $conn = getConnection();
    $sql = "insert into venta (idSucursal, fechahora, idEmpleado) values (1"./*$venta->getIdSucursal().*/",'".$venta->getFechaHora()."',304880050"./*$venta->getIdEmpleado().*/");"; //luego se agregaran esos valores
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    for ($i = 0; $i < count($lineas); $i++) {
        $sql = "insert into detalleVenta (codigoVenta, idSucursal, codigoProducto, cantidad, totalLinea) values (" . $lineas[$i]->getCodigoVenta() . ",1" ./* $lineas[$i]->getIdSucursal() .*/ ",'" . $lineas[$i]->getCodigoProducto() . "'," . $lineas[$i]->getCantidad(). "," . $lineas[$i]->getTotalLinea() . ");";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully \n";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}


function getVentas(){
    $mysqli = getConnection();
    $sql = "SELECT * FROM venta;";
    $resultado = $mysqli->query($sql);
    $vector = [];
    if ($resultado->num_rows > 0) {
        // output data of each row
        while ($row = $resultado->fetch_assoc()) {
            $venta  = new Venta();
            $venta->setCodigo($row['codigo']);
            $venta->setFechaHora($row['fechaHora']);
            $venta->setIdEmpleado($row['idEmpleado']);
            $venta->setIdSucursal($row['idSucursal']);
            array_push($vector, $venta);
        }
    } else {
        echo "0 results";
    }
    $mysqli->close();     
    return $vector;
}

