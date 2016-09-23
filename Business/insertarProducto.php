<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../Domain/Venta.php';
include_once '../Domain/LineaVenta.php';
include_once '../Data/DataVenta.php';


$codigoVenta = $_POST['codigo'];
$sucursal = $_POST['sucursal'];
$fecha = $_POST['fecha'];
$empleado = $_POST['empleado'];
$cods = [];
foreach($_POST['cod'] as $value) {
    array_push($cods, $value);
}

$combo = [];
foreach($_POST['hcombo'] as $value) {
    array_push($combo, $value);
}

$cantidad = [];
foreach($_POST['cantidad'] as $value) {
    array_push($cantidad, $value);
}

$precio = [];
foreach($_POST['precio'] as $value) {
    array_push($precio, $value);
}

$total = [];
foreach($_POST['total'] as $value) {
    array_push($total, $value);
}

$sumaTotal = $_POST['sumaTotal'];

$lineas = [];

$venta = new Venta();
$venta->setCodigo($codigoVenta);
$venta->setIdSucursal($sucursal);
$venta->setFechaHora($fecha);

for ($i = 1; $i < count($cods); $i++) {
    $linea = new LineaVenta();
    $linea->setCodigoVenta($codigoVenta);
    $linea->setIdSucursal($sucursal);
    $linea->setCodigoProducto($cods[$i]);
    $linea->setCantidad($cantidad[$i]);
    $linea->setTotalLinea($total[$i]);
    array_push($lineas, $linea);
    
}


insertVenta($venta, $lineas);
header("Location: ../index.php");
die();