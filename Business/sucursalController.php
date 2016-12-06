<?php

  include "../Data/DataSucursal.php";
  $dataSucursal = new DataSucursal();
  switch ($_GET['accion']) {

    case 'mostrar':
      $registros = mysqli_query($dataSucursal,"SELECT * FROM sucursal; ") or die("Error al cargar registros ".mysqli_error($conexion));
      include("../view/administrador/sucursales.php");
      break;

    case 'mostrarSucursales':
      echo  $dataSucursal->getSucursales();
    break;

    case 'formEditarSucursal':
      $dataSucursal = getConnection();
      $conexion = new mysqli('68.178.217.43', 'ucrgrupo4', 'Grupo#4LkF!', 'ucrgrupo4');
      $sucursal = mysqli_query($dataSucursal,"SELECT * FROM sucursal WHERE id = '$_GET[codigo]'; ") or die("Error al cargar registros para edicion".mysqli_error($conexion));
      //include("view/administracion/editarSucursal.php");
      //include("../view/administracion/editarSucursal.php") or die("ERROR NULL");
      include("../view/administracion/editarSucursal.php");

      break;

    case 'editarSucursal':
      $dataSucursal = getConnection();
      $conexion = new mysqli('68.178.217.43', 'ucrgrupo4', 'Grupo#4LkF!', 'ucrgrupo4');
  //  $sucursal = mysqli_query($dataSucursal,"UPDATE sucursal SET nombre='$_GET[nombre]', direccion='$_GET[direccion]', telefono='$_GET[telefono]' where id='$_GET[codigo]'; ") or die("Error al editar.");
    $sucursal = mysqli_query($dataSucursal,"UPDATE sucursal SET nombre='$_POST[nombre]', direccion= '$_POST[direccion]', telefono='$_POST[telefono]' where id='$_POST[codigo]'; ") or die("Error al editar.");
    $registro = mysqli_query($dataSucursal,"SELECT * FROM sucursal; ") or die("Error al cargar registros.");
      //include("sucursales.php");

      break;

    case 'addSucursal':
      echo $dataSucursal->insertarSucursal($_REQUEST["arrayDatos"]);
      break;

    case 'borrarSucursal':
     echo $dataSucursal->eliminarSucursal($_REQUEST["idSucursal"]);
      break;

    default:
      echo "Peticion inexistente!";
      break;
  }
 ?>
