<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'Data.php';


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

function setProductos($producto){
    
    $mysqli = getConnection();
    $codigo = $producto -> getCodigoProducto();
    $nombre = $producto -> getNombre();
    $stock = $producto -> getStock();
    $precio = $producto-> getPrecio();
    
    $sql = "INSERT INTO producto (codigo,nombre) VALUES (".$codigo.",".$nombre.")";
                
      if ($mysqli->query($sql) === TRUE) {
          echo 'ingreso';
        
    } else {
        echo 'error';
    }
    
   




}
function insertarProducto($producto){
    
    
    
}


















































