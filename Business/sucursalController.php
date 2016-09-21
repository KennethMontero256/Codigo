<?php
  include_once "../Data/DataSucursal.php";
  $dataSucursal = new DataSucursal();

  switch ($_GET['accion']) {

    case 'mostrar':
      $registros = mysqli_query($dataSucursal,"SELECT * FROM sucursal") or die("Error al cargar registros ".mysqli_error($conexion));
      include("view/administrador/sucursales.php");
      break;

    case 'mostrarSucursales':
      echo  $dataSucursal->getSucursales();
    break;

    case 'editarSucursal':
      $sucursal = mysqli_query($dataSucursal,"SELECT * FROM sucursal WHERE id = '$_GET[codigo]' ") or die("Error al cargar registros ".mysqli_error($conexion));
      include("view/administracion/editarSucursal.php");
      break;

    case 'addSucursal':
      $dataSucursal->insertarSucursal($_REQUEST["arrayDatos"]);
      break;

    case 'borrarSucursal':
      $dataSucursal->eliminarSucursal($_REQUEST["idSucursal"]);
      break;

    default:
      echo "Peticion inexistente!";
      break;
  }
 ?>
