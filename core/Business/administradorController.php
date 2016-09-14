<?php
  session_start();

	if(isset($_POST['id']))
  {
    //include("core/Domain/Administrador.php");
    $_SESSION['id'] = 1313;
    $conexion = new Data();
    $_POST['id'] = 1313;
    $registro = mysqli_query($conexion,"SELECT * FROM Administrador WHERE ID = '$_POST[id]' ") or die("Error al cargar Registro único".mysqli_error($conexion));

    include("view/administrador/administrador.php");
    mysqli_close($conexion);
  }else {
    include("view/administrador/login.php");
  }
 ?>
