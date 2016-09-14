<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administrador</title>
  </head>
  <body>

    <?php
      if ($reg=mysqli_fetch_array($registro))
      {
        echo "Código:".$reg["id"]."<br>";
        echo "Usuario:".$reg["nombre"]."<br>";
        echo "<br>";
      }else {
        echo "Usuario administrador inexistente!";
      }
    ?>
    <a href="?clase=logout">Cerrar sesión</a>

  </body>
</html>
