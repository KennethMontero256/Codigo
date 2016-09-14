<?php

include_once '../Domain/Producto.php';
include_once '../Data/DataProducto.php';
$codigo= $_POST ['codigo'];
$nombre= $_POST['nombre'];
$stock= $_POST ['cantdad'];
//$select = $_POST['select'];
$producto = new Producto();
$producto->setNombre($nombre);
$producto->setCodigoProducto($codigo);
$producto->setStock($stock);



setProductos($producto);
