<?php

include_once 'Data.php';
include 'Domain/Producto.php';

function getProductos(){
    $mysqli = getConnection();
    $sql = "SELECT * FROM producto;";
    $resultado = $mysqli->query($sql);
    $vector = [];
    if ($resultado->num_rows > 0) {
        // output data of each row
        while ($row = $resultado->fetch_assoc()) {
            $producto = new Producto();
            $producto->setCodigoProducto($row['codigo']);
            $producto->setNombre($row['nombre']);
            $producto->setStock($row['stock']);
            $producto->setPrecio($row['precio']);
            array_push($vector, $producto);
        }
    } else {
        echo "0 results";
    }
    $mysqli->close();     
    return $vector;
}

function setProductos(){
    
    $mysqli = getConnection();
    $sql = "INSERT INTO producto (codigo,nombre,stock,unidadMedida,precio,proveedor"."idSucursal,idCategoria) VALUES (?,?,?,?,?,?,?,?)";
function setProductos($producto){
    
    $mysqli = getConnection();
    $producto = new Producto();
    $codigo = $producto -> getCodigoProducto();
    $nombre = $producto -> getNombre();
    $stock = $producto -> getStock();
    $precio = $producto-> getPrecio();
    
    $sql = "insert into producto (codigo, nombre, stock, unidadMedia, precio, proveedor, idSucursal, idCategoria)
			values(".$codigo.",".$nombre.", ".$stock.", 'k', 5000, 'p', 1, 1)";

                
      if ($mysqli->query($sql) === TRUE) {
          echo 'ingreso';
        
    } else {
        echo 'error';
    }
    

}
function insertarProducto($producto){
    
}

function getPrecio($codigoProducto){
    $mysqli = getConnection();
    $sql = "SELECT precio FROM producto WHERE codigo =".$codigoProducto.";";
    $resultado = $mysqli->query($sql);
    $row = $resultado->fetch_assoc();
    $precio = $row['precio'];
    $mysqli->close();
    echo json_encode($precio);
}

