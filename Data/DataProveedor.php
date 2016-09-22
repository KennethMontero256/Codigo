<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getProveedores(){
    $mysqli = getConnection();
    $sql = "select * from proveedor;";
    $resultado = $mysqli->query($sql);
    $vector = [];
    if ($resultado->num_rows > 0) {
        // output data of each row
        while ($row = $resultado->fetch_assoc()) {
            $gdfjh = new Proveedor();
            $proveedor = new Proveedor();
            $proveedor->setNombre($row['nombreCompleto']);
            $proveedor->setCedulaProveedor($row['cedulaJuridica']);
            array_push($vector, $proveedor);
        }
    } else {
        echo "0 results";
    }
    $mysqli->close();     
    return $vector;
}