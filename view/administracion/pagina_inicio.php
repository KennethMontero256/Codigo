<?php
	session_start();
	if(!isset($_SESSION["cedula"])){
		header("location: ../../index.php");
	}
?>

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
    <link rel="stylesheet" href="../../js/alertify/css/alertify.css">
    <link rel="stylesheet" href="../../js/alertify/css/themes/default.css">
	<script type="text/javascript" src="../../js/jquery-3.1.0.js"></script>
	<script type="text/javascript" src="../../js/jquery-1.12.3.js"></script>
	<script type="text/javascript" src="../../css/jquery-ui.css"></script>
	<script type="text/javascript" src="../../js/jquery-ui.js"></script>
<<<<<<< HEAD
        <link rel="stylesheet" href="../../js/alertify/css/alertify.css">
        <link rel="stylesheet" href="../../js/alertify/css/themes/default.css">
=======
	<script type="text/javascript" src="../../js/alertify/alertify.js"></script>
>>>>>>> 0566012c6bcad2418fb0db2ce0396037812c902e
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
<<<<<<< HEAD
	<div id="frmCambiarPass" style="display: none;">
		<?php 
	    	include("../empleados/cambiar_contrasenia.php");
	    ?>
    </div>
    <script type="text/javascript" src="../../js/alertify/alertify.js"></script>
	<script type="text/javascript" src="../../js/funciones_generales.js"></script>
	<script type="text/javascript" src="../../js/funcionesAdministrador.js"></script>
=======
	<script type="text/javascript" src="../../js/funcioKKnes_generales.js"></script>
	<script type="text/javascript" src="../../js/funcioneKKsAdministrador.js"></script>
>>>>>>> 0566012c6bcad2418fb0db2ce0396037812c902e
</body>
</html>
