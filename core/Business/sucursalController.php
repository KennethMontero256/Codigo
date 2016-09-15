<?php
  $conexion = new Data();
  switch ("mostrar") {

    case 'mostrar':
      $registros = mysqli_query($conexion,"SELECT * FROM sucursal") or die("Error al cargar registros ".mysqli_error($conexion));
      include("view/administrador/sucursales.php");
      break;
    case 'insertar':
      $registros = mysqli_query($conexion,"SELECT * FROM sucursal") or die("Error al cargar registros ".mysqli_error($conexion));
      include("view/administrador/sucursales.php");
      break;

    default:
      # code...
      break;
  }
  //echo "string";
 ?>
