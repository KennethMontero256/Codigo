<?php
  //require "../Data/DataSucursal.php";
  $dataSucursal = new Data();

  switch ($_GET['accion']) {

    case 'mostrar':
      $registros = mysqli_query($dataSucursal,"SELECT * FROM sucursal") or die("Error al cargar registros ".mysqli_error($conexion));
      include("view/administrador/sucursales.php");
      break;

    case 'editar':
      $sucursal = mysqli_query($dataSucursal,"SELECT * FROM sucursal WHERE id = '$_GET[codigo]' ") or die("Error al cargar registros ".mysqli_error($conexion));
      include("view/administracion/editarSucursal.php");
      break;

    case 'addSucursal':
      $dataSucursal->insertarSucursal($_REQUEST["arrayDatos"]);
      break;

    default:
      echo "Peticion inexistente!";
      break;
  }
 ?>
