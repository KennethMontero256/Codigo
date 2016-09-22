<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/Roboto/WebFont/roboto_regular_macroman/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="css/estiloBarraNavegacion.css">
    <link rel="stylesheet" type="text/css" href="css/estilo_principal.css">
    <link rel="stylesheet" type="text/css" href="css/iconosFuente/style.css">
  </head>

  <body>
	<nav class="navAdministrador">
	    <div class="logo-empresa">
			<img src="../../imagenes/coffee-cup-flat-incon.png" width="75">
			<a href="#">El Tostador</a>
		</div>
		<div class="opciones">
			<ul>
				<li><a href="admsucursal" class="opBarNav">Sucursales</a></li>
			    <li><a href="admempleado" class="opBarNav">Empleados</a></li>
    			<li><a href="admpedido" class="opBarNav">Pedidos</a></li>
    			<li><a href="opUsuario" class="opBarNav" >Administrador: <?php echo $_SESSION["nombre"];?></a>
					<ul>
						<li><a href="#">Cambiar contraseña</a></li>
						<li><a href="logout.php">Cerrar sesión</a></li>
					</ul>
				</li>
			</ul>
		</div>
	  </nav>
  </body>
</html>
