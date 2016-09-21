<?php
  //require "../Data/DataSucursal.php";
  $dataSucursal = new Data();

  switch ($_GET['accion']) {

    case 'mostrar':
      $registros = mysqli_query($dataSucursal,"SELECT * FROM sucursal") or die("Error al cargar registros ".mysqli_error($conexion));
      include("view/administrador/sucursales.php");
      break;

<<<<<<< HEAD
    case 'mostrarSucursales':
      echo  $dataSucursal->getSucursales();
    break;

    case 'editar':
      echo "Opcion inhabilitada!";
=======
    case 'editarSucursal':
      $sucursal = mysqli_query($dataSucursal,"SELECT * FROM sucursal WHERE id = '$_GET[codigo]' ") or die("Error al cargar registros ".mysqli_error($conexion));
      include("view/administracion/editarSucursal.php");
>>>>>>> 1dc226a5b89c9b22e6ad3407a73fdc116463f5c7
      break;

    case 'addSucursal':
      $dataSucursal->insertarSucursal($_REQUEST["arrayDatos"]);
      break;

    default:
      echo "Peticion inexistente!";
      break;
  }
 ?>
