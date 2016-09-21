<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <?php
        //include_once("../../core/Data/DataVenta.php");
        include_once '../../Data/DataVenta.php';
        include_once '../../Data/DataProducto.php';
        include_once '../../Domain/Producto.php';
        ?>
        <title>Caja</title>
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
                echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
            } else {
                echo "<script type='text/javascript'>alert('failed!')</script>";
            }
        }
        ?>
        
          <script>   
                        var i = 0;

function duplicate2(){
    var myDiv = document.getElementById("producto0"); //Obtiene el objeto por el id
    var divPops = document.getElementById("detalle"); //Obtiene le padre del div
    var divClone = myDiv.cloneNode(true); // crea un clon profundo
    divClone.id = "producto" + ++i; // mantiene un contador para crear divs con id diferente
    divClone.style.display = '';
    divPops.appendChild(divClone); //agrega el clone al padre
    
    hijos = divClone.childNodes;
    for (j = 0; j < hijos.length; j++) { 
        hijos[j].id = hijos[j].id + i; 
    }
    
}

function getValueComboToInput(e){
    
    var eId = e.id;
    var vector = eId.split("");
    var numero = vector[vector.length-1];
    
    var combo = document.getElementById("comboProductos"+numero);
    var value = combo.options[combo.selectedIndex].value;
    var text =  combo.options[combo.selectedIndex].innerHTML;
    var hidden = document.getElementById("hidden"+numero);
    var input = document.getElementById("codigoProducto"+numero);
    input.value = value;
    hidden.value = text;
    
}

function deleteDiv(e){
    
    
    var eId = e.id;
    var vector = eId.split("");
    var numero = vector[vector.length-1];
    //var divpops = document.getElementById("producto"+numero);
    //window.alert(divpops.id);
    document.getElementById("producto"+numero).remove();
    
}

function getPrecio(e){
    var eId = e.id;
    var vector = eId.split("");
    var numero = vector[vector.length-1];
    if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("precio"+numero).value = this.responseText;
                //window.alert('entro');
            }
        };
        
        xmlhttp.open("GET","../../Data/getPrecioAjax.php?cod="+e.value,true);
        xmlhttp.send();
        
        getValueComboToInput(e);
        totalLinea(e);
}

function totalLinea(e){
    var eId = e.id;
    var vector = eId.split("");
    var numero = vector[vector.length-1];
    var cantidad = document.getElementById("cantidad"+numero).value;
    var precio = document.getElementById("precio"+numero).value;
    var totalLinea = cantidad*precio;
    document.getElementById("total"+numero).value = totalLinea;
    sumaTotal();
}

function sumaTotal(){
    //window.alert('entro');
    var divPops = document.getElementById("detalle"); //Obtiene le padre del div
    hijos = divPops.childNodes;
    var cantidadLineas = hijos.length-2;
    var suma = 0;
    suma = parseInt(suma);
    for (j = 1; j < cantidadLineas; j++) {
        var numero = parseInt(document.getElementById("total"+j).value);
         suma = suma + numero;
         //window.alert(document.getElementById("precio"+j).value);
    }
    
    document.getElementById("sumatotal").value = suma;
    }



            </script> 
            
            <form method="post" action="../../Business/insertarProducto.php" accept-charset="UTF-8">
                <div id="contenedorVenta">
                    <div id="informacionVenta">

                        <label>codigo:</label>
                        <input id="codigo" name="codigo" type="text" value="<?php print_r($totalventas+1); ?>" readonly> 

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
