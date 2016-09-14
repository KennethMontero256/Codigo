<?php

include_once '../Domain/Producto.php';
include_once '../Data/DataProducto.php';
$codigo= $_POST ['codigo'];
$nombre= $_POST['nombre'];
//$select = $_POST['select'];
$producto = new Producto();
$producto->setNombre($nombre);
$producto->setCodigoProducto($codigo);

setProductos($producto);
