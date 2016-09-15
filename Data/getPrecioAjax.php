<?php

include_once 'Data.php';

$codigoProducto= $_GET['cod'];

$mysqli = getConnection();
$sql = "SELECT precio FROM producto WHERE codigo ='" . $codigoProducto . "';";
$resultado = $mysqli->query($sql);
$row = $resultado->fetch_assoc();
$precio = $row['precio'];
$mysqli->close();
echo $precio;

?>