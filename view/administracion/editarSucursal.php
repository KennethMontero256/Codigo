<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="index.html" method="post">
      <?php
        if ($reg=mysqli_fetch_array($sucursal)) {
          echo $reg['id'];
        }
       ?>
      <input type="text" name="name" value="$sucursal[]">
    </form>
  </body>
</html>
