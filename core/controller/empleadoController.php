<?php

  include("core/model/Empleado.php");

  $empleado = new Empleado(3020300777, "Juan", 87013455);

  $data = new Data();

  $registro = mysqli_query($data,"SELECT * FROM empleado");

  include("view/modules/empleado.php");
  mysqli_close($data);

 ?>
