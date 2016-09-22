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


function uploadImage($Dni, $Url, $categoria) {
    $idImagen;
    $conn = getConnection();
    $sql = "INSERT INTO imagenesArtista(dniArtista,urlImagen,tipo) VALUES (" . $Dni . ",'".$Url."',1);";
    if ($conn->query($sql) === TRUE) {
        $idImagen = $conn->insert_id;
        echo "img " . $sql;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
     $sql = "INSERT INTO habilidad VALUES(".$idImagen.", ".$categoria.");";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}