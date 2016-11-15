<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Inicio</title>
	<link rel="stylesheet" type="text/css" href="../../css/estiloBarraNavegacion.css">
    <link rel="stylesheet" href="../../js/alertify/css/alertify.css">
    <link rel="stylesheet" href="../../js/alertify/css/themes/default.css">
  	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="../../css/Roboto/WebFont/roboto_regular_macroman/stylesheet.css">
	<link rel="stylesheet" type="text/css" href="../../css/estilo_principal.css">
    <link rel="stylesheet" type="text/css" href="../../css/iconosFuente/style.css">
    <script type="text/javascript" src="../../js/jquery-3.1.0.js"></script>
    <script type="text/javascript" src="../../js/sticky_nav_bar.js"></script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  	<script type="text/javascript" src="../../js/alertify/alertify.js"></script>
</head>
<body>
    <?php 
    	include("barraNavegacionPrincipal.php");
    ?>
	<div id="contenedorGlobal">
		<?php 
    		include("../Ventas/GestionVentas.php");
    	?>
	</div>
	<div id="frmCambiarPass" style="display:none;">
		<?php 
	    	include("cambiar_contrasenia.php");
	    ?>
    </div>
    <script type="text/javascript" src="../../js/funciones_generales.js"></script>
     <link rel="stylesheet" type="text/css" href="../../css/jquery.datetimepicker.css">
    <script type="text/javascript" src="../../js/jquery.datetimepicker.full.js"></script>
</body>
</html>