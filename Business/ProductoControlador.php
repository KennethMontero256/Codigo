<?php

include_once '../Domain/Producto.php';
include_once '../Data/DataProducto.php';
$codigo= $_POST ['codigo'];
$nombre= $_POST['nombre'];
$stock= $_POST ['stock'];
$medida = $_POST['unidadMedida'];
$precio = $_POST['precio'];
$proveedor = $_POST['proveedor'];
$sucursal = $_POST['sucursal'];
$categoria = $_POST['categoria'];
//$select = $_POST['select'];
$producto = new Producto();
$producto->setNombre($nombre);
$producto->setCodigoProducto($codigo);
$producto->setStock($stock);;
$producto->setUnidadMedida($medida);
$producto->setPrecio($precio);
$producto->setProveedor($proveedor);
$producto->setIdSucursal($sucursal);
$producto->setIdCategoria($Categoria);

setProductos($producto);

