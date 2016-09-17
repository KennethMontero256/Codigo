<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Inicio</title>
	<link rel="stylesheet" type="text/css" href="../../css/Roboto/WebFont/roboto_regular_macroman/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="../../css/estiloBarraNavegacion.css">
    <link rel="stylesheet" type="text/css" href="../../css/estilo_principal.css">
    <link rel="stylesheet" type="text/css" href="../../css/iconosFuente/style.css">
	<script type="text/javascript" src="../../js/jquery-3.1.0.js"></script>
</head>
<body>
	<?php
		include("barraNavegacionPrincipal.php");
	?>
	<div id="contenedorAdministrador">
		<?php
			include("administrar_sucursales.php");
		?>
	</div>
	<script type="text/javascript" src="../../js/funciones_generales.js"></script>
</body>
</html>