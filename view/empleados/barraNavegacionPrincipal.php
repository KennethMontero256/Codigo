<?php
    session_start();
    if(!isset($_SESSION["cedula"])){
      header("location: ../../../../index.php");
    }
?>

    <nav class="menu-static">
        <div class="logo-empresa">
                <input type="hidden" id="nomSucursal" value="<?php echo $_SESSION["nombreSucursal"];?>">
                <input type="hidden" id="keySucursal" value="<?php echo $_SESSION["idSucursal"];?>">
                <input type="hidden" id="nomEmpleado" value="<?php echo $_SESSION["nombre"];?>">
                <input type="hidden" id="cedulaEmpleado" value="<?php echo $_SESSION["cedula"];?>">
                <a href="#">Tostador <?php echo $_SESSION["nombreSucursal"];?></a>
            </div>
            <div class="opciones">
                <ul>
                    <li><a href="caja" class="opBarNav"><span class="icon-shopping-cart icono-flat"></span>Caja</a></li>
                    <li><a href="invent" class="opBarNav"><span class="icon-clipboard icono-flat"></span>Inventario</a></li>
                    <li><a href="pedido" class="opBarNav"><span class="icon-truck icono-flat"></span>Pedidos</a></li>
                    <li><a href="opUsuario" class="opBarNav"><span class="icon-address-book icono-flat"></span><?php echo $_SESSION["nombre"];?></a>
                        <ul>
                            <li><a href="#" class="btnCambioPass">Cambiar contraseña</a></li>
                            <li><a href="../../Business/logout.php">Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
    </nav>
    