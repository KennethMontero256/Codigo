<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'Data.php';

$codigoProducto= $_GET['cod'];

$mysqli = getConnection();
$sql = "SELECT precio FROM producto WHERE codigo ='" . $codigoProducto . "';";
$resultado = $mysqli->query($sql);
$row = $resultado->fetch_assoc();
$precio = $row['precio'];
$mysqli->close();
echo $precio;
