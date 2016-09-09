<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <a href="?clase=indexController">Pagina Principal</a><br><br>

    Vista Empleado<br><br>
    <div>

      Impresion de un vector de ejemplo<br>
      <?php
        echo "Datos Empleado:<br>";
        echo $empleado->cedulaEmpleado."<br>";
        echo $empleado->nombre."<br>";
        echo $empleado->telefono."<br>";
      ?>
      <br>Impresion de una consulta a BD<br>
      <?php
      while ($reg=mysqli_fetch_array($registro))
      {
        echo "Cedula:".$reg["cedula"]."<br>";
        echo "Nombre:".$reg["nombre"]."<br>";
        echo "telefono:".$reg["telefono"]."<br>";
        echo "<br>";
      }

      ?>

    </div>
    <br>

  </body>
</html>
