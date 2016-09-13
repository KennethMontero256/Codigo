<?php

  include("core/Domain/Empleado.php");

  $empleado = new Empleado(3020300777, "Juan", 87013455);

  $conexion = new Data();

  $registro = mysqli_query($conexion,"SELECT * FROM empleado");

  include("view/modules/empleado.php");
  mysqli_close($conexion);

 ?>
