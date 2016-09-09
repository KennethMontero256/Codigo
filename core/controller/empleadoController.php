<?php

  include("core/model/Empleado.php");
  include("core/Data/Data.php");

  $empleado = new Empleado(3020300777, "Juan", 87013455);

  $db = new DataBase();
  $conexion = $db->conexion();

  $registro = mysqli_query($conexion,"SELECT * FROM empleado");

  include("view/modules/empleado.php");
  mysqli_close($conexion);

 ?>
