<?php

$conexion = new Data();
$registro = mysqli_query($conexion,"SELECT * FROM sucursal") or die("Error al cargar Registro único".mysqli_error($conexion));
include("view/administracion/administrar_sucursales.php");
mysqli_close($conexion);

/*  session_start();

if(isset($_POST['id']))
{
  $conexion = new Data();
  $registro = mysqli_query($conexion,"SELECT * FROM sucursal") or die("Error al cargar Registro único".mysqli_error($conexion));

  include("view/administracion/administrar_sucursales.php");
  mysqli_close($conexion);
}else {
  include("view/administrador/login.php");
}
*/


  $conexion = new Data();
  $registro = mysqli_query($conexion,"SELECT * FROM sucursal") or die("Error al cargar Registro único".mysqli_error($conexion));
  include("view/administracion/administrar_sucursales.php");
  mysqli_close($conexion);

/*  session_start();

	if(isset($_POST['id']))
  {
    $conexion = new Data();
    $registro = mysqli_query($conexion,"SELECT * FROM sucursal") or die("Error al cargar Registro único".mysqli_error($conexion));

    include("view/administracion/administrar_sucursales.php");
    mysqli_close($conexion);
  }else {
    include("view/administrador/login.php");
  }
  */
 ?>
>>>>>>> 203e476e6c4021eab81ceeb1746e493065195151
