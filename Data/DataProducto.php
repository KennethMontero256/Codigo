<?php


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

/*function setProductos(){
    
    $mysqli = getConnection();
    $sql = "INSERT INTO producto (codigo,nombre,stock,unidadMedida,precio,proveedor"."idSucursal,idCategoria) VALUES (?,?,?,?,?,?,?,?)";
}*/


function setProductos($producto){
    
    $mysqli = getConnection();
    
    $sql = "insert into producto (codigo, nombre, stock, unidadMedia, precio, proveedor, idSucursal, idCategoria, abreviatura)
			values('".$producto->getCodigo()."','".$producto->getNombre()."', ".$producto->getStock().", '".$producto->getUnidadMedida()."',".$producto->getPrecio().", '".$producto->getProveedor()."', ".$producto->getIdSucursal().", ".$producto->getIdCategoria().", '".$producto->getAbreviatura()."')";

                
    if ($mysqli->query($sql) === TRUE) {
          echo 'ingreso';
        
    } else {
        echo 'error'.$sql." ".$mysqli->error;
    }

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

