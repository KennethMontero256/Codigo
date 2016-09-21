<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="index.html" method="post">
      <?php if ($reg=mysqli_fetch_array($sucursal)){ ?>

          <label>Nombre:</label>
          <input type="text" name="name" value="<?php  echo $reg['nombre']; ?>">
          <label>Dirección:</label>
          <input type="text" name="name" value="<?php  echo $reg['direccion']; ?>">
          <label>Teléfono:</label>
          <input type="text" name="name" value="<?php  echo $reg['telefono']; ?>">
          <a href="#" class="editar"></a>
      <?php } ?>
    </form>
  </body>
</html>
