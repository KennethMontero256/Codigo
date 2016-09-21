<?php
	require "../../core.php";
	session_start();
    $mensaje = "";

    if(isset($_SESSION["idAdmin"])){
    	header("location: pagina_inicio.php");
    }

	if(!empty($_POST)){
		$conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if ($conexion->connect_error) {
			die("La conexion falló: " . $conexion->connect_error);
		}else{
			$user = $_POST["username"];
			$pass = $_POST["password"];
			$sql = "SELECT id,nombre FROM administrador WHERE nombre='$user' AND contrasenia = MD5('$pass');";

			$result = $conexion->query($sql);

			if ($result->num_rows > 0) {
	            while ($row = $result->fetch_assoc()) {
	                $_SESSION["idAdmin"] = $row["id"];
	                $_SESSION["nombreAdmin"]= $row["nombre"];
	                header("location: pagina_inicio.php");
	            }
        	}else{
        		$mensaje = "Usuario incorrecto";
        	}
		}
	}
   
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Inicio</title>
	<link rel="stylesheet" href="../../css/estilo_principal.css">
	<script type="text/javascript" src="../../js/jquery-1.12.3.js"></script>
</head>
<body>
	<?php  
		include("../empleados/barraInicial.php");
	?>
	<div class="form-login">
		<form action="login.php" method="POST" name="frmLoginAdm" accept-charset="utf-8">
			<p>Formulario de acceso</p>
			<p class="mensajes"><?php echo $mensaje;?></p>
			<input type="text" name="username" placeholder="Usuario">
			<input type="password" name="password" minlength=4 placeholder="Contraseña">
			<input type="hidden" name="modo" value="login">
			<div class="layout-btns">
				<a href="pagina_inicio.php" id="bSubmitFrmLoginAdm" class="btn-submit">Ingresar</a>
				<a href="recuperarContraAdministrador.php" id="">Recuperar usuario</a>
			<div>
		</form>
	</div>
	<script type="text/javascript" src="../../js/funciones_generales.js"></script>
</body>
</html>