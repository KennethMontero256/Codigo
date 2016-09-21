<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'Data.php';


function getSucursal() {
    $mysqli = getConnection();
    $sql = "SELECT * FROM Sucursal;";
    $resultado = $mysqli->query($sql);
    $vector = [];
    if ($resultado->num_rows > 0) {
        // output data of each row
        while ($row = $resultado->fetch_assoc()) {
            $sucursal = new Sucursal();
            $sucursal->setCedulaJuridica($row['id']);
            $sucursal->setNombre($row['nombre']);
            $sucursal->setDireccion($row['direccion']);
            $sucursal->setTelefono($row['telefono']);
            array_push($vector, $sucursal);
        }
    } else {
        echo "0 results";
    }
    $mysqli->close();
    return $vector;
}
