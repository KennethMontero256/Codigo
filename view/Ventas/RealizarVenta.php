<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <?php
        include_once '../../Data/DataVenta.php';
        include_once '../../Data/DataProducto.php';
        include_once '../../Domain/Producto.php';
        ?>
        <title>Caja</title>
        
        <script type="text/javascript" src="../../js/jquery-3.1.0.js"></script>
        <script type="text/javascript" src="../../js/funcionesVenta.js"></script>
        <script type="text/javascript" src="../../js/alertify/alertify.js"></script>
        <link rel="stylesheet" href="../../js/alertify/css/themes/default.css">
        
    </head>
    <body>
        <?php
        $totalventas = getTotalVentas();
        $hoy = getdate();
        //print_r($hoy);
        $d = $hoy['mday'];
        $m = $hoy['mon'];
        $y = $hoy['year'];
        $productos = getProductos();
        $status = isset($_GET['status']);
        if ($status) {
            if ($status = 1) {
                echo "<script type='text/javascript'>.alert('submitted successfully!')</script>";
            } else {
                echo "<script type='text/javascript'>alert('failed!')</script>";
            }
        }
        ?>
        
        
        
        
        <form method="post" action="../../Business/insertarProducto.php" accept-charset="UTF-8">
            <div id="contenedorVenta">
                <div id="informacionVenta">

                    <label>codigo:</label>
                    <input id="codigo" name="codigo" type="text" value="<?php print_r($totalventas + 1); ?>" readonly> 

                    <label>Sucursal:</label>
                    <input type="text" name="sucursal" value="<?php ?>" readonly>

                    <label>Fecha y hora</label>
                    <input type="datetime" name="fecha" value="<?php echo $d . ' ' . $m . ' ' . $y ?>" readonly>

                    <label>Empleado:</label>
                    <input type="text" name="empleado" value="" readonly>
                </div>

                <div id="detalle">
                    <div id="producto0" style="display: none;">
                        <label id="lbCod">Codigo producto:</label>
                        <input type="text" value="" id="codigoProducto" name="cod[]">

                        <input type="text" value="" id="hidden" name="hcombo[]" hidden>

                        <label id="lbNombre">Nombre producto:</label>
                        <select id="comboProductos" onclick="getPrecio(this)" name="combo[]">
                            <ul>

                                <option>
                                    Seleccione un producto
                                </option>

                                <?php
                                for ($i = 0; $i < count($productos); $i++) {
                                    echo '<option value="' . $productos[$i]->getCodigoProducto() . '">' . $productos[$i]->getNombre() . '</option>';
                                }
                                ?>
                            </ul>
                        </select>

                        <label id="lbCantidad">Cantidad</label>
                        <input id="cantidad" name="cantidad[]" value="0" type="number"   min="0" onclick="totalLinea(this)" onchange="totalLinea(this)" onkeydown="totalLinea(this)">

                        <label id="lbPrecio">Precio:</label>
                        <input id="precio" name="precio[]" type="number" readonly >

                        <label id="lbTotal">Total Linea</label>
                        <input id="total" name="total[]" type="number" value="" readonly oninput="sumaTotal()">

                        <input id="delete" type="button" value="X" onclick="deleteDiv(this)">
                    </div>

                </div>
                <input type="button" value="+" onclick="duplicate2()">
                <input type="text" name="sumaTotal" readonly id="sumatotal">
            </div>
            <input type="submit">
        </form>
    </body>
</html>
