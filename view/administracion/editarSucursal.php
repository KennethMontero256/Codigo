<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

  	<script type="text/javascript" src="../js/jquery-3.1.0.js"></script>
  	<script type="text/javascript" src="../js/funcionesAdministrador.js"></script>
    <link rel="stylesheet" href="../css/estiloBarraNavegacion.css">
    <link rel="stylesheet" type="text/css" href="../css/estilo_principal.css">
  </head>

  <body>

    <form class="" action="index.html" method="POST">
      <?php if ($reg=mysqli_fetch_array($sucursal)){ ?>

          <a href="?clase=administradorController" class="lab">Todas las Sucursales</a>
          <br><br>
          <label>Nombre:</label>
          <input type="text" name="nombre" value="<?php  echo $reg['nombre']; ?>">
          <label>Dirección:</label>
          <input type="text" name="direccion" value="<?php  echo $reg['direccion']; ?>">
          <label>Teléfono:</label>
          <input type="text" name="telefono" value="<?php  echo $reg['telefono']; ?>">
          <input type="hidden" name="codigo" value="<?php  echo $reg['id']; ?>">
          <a href="text" class="btnFormEditSucr"> Guardar Cambios </a>
      <?php } ?>
    </form>
  </body>
</html>
