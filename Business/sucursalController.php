<?php
  require "../Data/DataSucursal.php";
  $dataSucursal = new DataSucursal();

  switch ($_GET['accion']) {

    case 'mostrar':
      $registros = mysqli_query($conexion,"SELECT * FROM sucursal") or die("Error al cargar registros ".mysqli_error($conexion));
      include("view/administrador/sucursales.php");
      break;

    case 'editar':
      echo "Opcion inhabilitada!";
      break;

    case 'addSucursal': 
      $dataSucursal->insertarSucursal($_REQUEST["arrayDatos"]);
      break;

    default:
      # code...
      break;
  }
<<<<<<< HEAD
  
=======
>>>>>>> refs/remotes/origin/master
 ?>
