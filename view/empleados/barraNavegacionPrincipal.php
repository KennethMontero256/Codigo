<?php
    session_start();
    if(!isset($_SESSION["cedula"])){
      header("location: ../../../../../index.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../../css/estiloBarraNavegacion.css">
        <script type="text/javascript" src="../../js/jquery-3.1.0.js"></script>
        <script type="text/javascript" src="../../js/sticky_nav_bar.js"></script>
        <link rel="stylesheet" href="../../js/alertify/css/alertify.css">
        <link rel="stylesheet" href="../../js/alertify/css/themes/default.css">
        <script type="text/javascript" src="../../js/alertify/alertify.js"></script>
    </head>
    <body>
        <nav class="menu-static">
            <div class="logo-empresa">
                <a href="#">El Tostador</a>
            </div>
            <div class="opciones">
                <ul>
                    <li><a href="caja" class="opBarNav"><span class="icon-shopping-cart"></span>Caja</a></li>
                    <li><a href="invent" class="opBarNav"><span class="icon-clipboard"></span>Inventario</a></li>
                    <li><a href="pedido" class="opBarNav"><span class="icon-truck"></span>Pedidos</a></li>
                    <li><a href="opUsuario" class="opBarNav"><span class="icon-address-book"></span><?php echo $_SESSION["nombre"];?></a>
                        <ul>
                            <li><a href="#">Cambiar contraseña</a></li>
                            <li><a href="../../Business/logout.php">Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <script type="text/javascript" src="../../js/funciones_generales.js"></script>
    </body>

</html>