<input type="hidden" id="sucursal" value="<?php echo $_SESSION['idSucursal']; ?>">
<div class="menuLateral">	
    <p>Mostrar por:</p>
    <ul>
        <li><a href=".venta" class="linkBusquedaVentas">Caja</a></li>
        <li><a href="#" class="linkBusquedaVentas">Ventas del día</a></li>
        <li><a href=".listarVentas" class="linkBusquedaVentas">Busqueda de ventas </a></li>
    </ul>
</div>
<div class="contenedorSecundario">    
    <div class="listarVentas" style="display:none; padding: 15px;">
        <div class="configurarBusqueda">
            <label>Filtrar busqueda por: 
                <ul>
                    <li>
                        <input type="radio" name="filtroFecha" value="f" checked data-ver=".ventasPorFecha" data-esconder=".ventasPorMes"><label>Rango de fechas</label>
                    </li>
                    <li>
                        <input type="radio" name="filtroFecha" value="m" data-ver=".ventasPorMes" data-esconder=".ventasPorFecha"><label>Meses</label>
                    </li>
                </ul>
            </label>
        </div>
        <div class="barBusqueda ventasPorMes" style="display: none">
            <select name="mes" id="mesVenta">
                <option value="1">Enero</option>
                <option value="2">Febrero</option>
                <option value="3">Marzo</option>
                <option value="4">Abril</option>
                <option value="5">Mayo</option>
                <option value="6">Junio</option>
                <option value="7">Julio</option>
                <option value="8">Agosto</option>
                <option value="9">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
            <?php
                echo "<select id='anioVenta'>";
                    for($i = 2016; $i<=2030; $i++){
                        echo "<option value='".$i."'>".$i."</option>";
                    }
                echo "</select>";
            ?>
            <a href="mes" class="bBuscarLista btn-submit"><span class="icon-search"></span></a>
        </div>
        <div class="barBusqueda ventasPorFecha">
            <label>De:<input type="text" class="inputShadow fecha" id="fechaInicio" placeholder="Fecha de inicio"></label>
            <label>Hasta<input type="text" class="inputShadow fecha" id="fechaFinal" placeholder="Fecha de "></label>
            <a href="fecha" class="bBuscarLista btn-submit"><span class="icon-search"></span></a>
        </div>
        <div class="contenedorListaVentas">
            
        </div>
    </div>
    <div class="venta">
        <div class="encabezadoVenta">
            <label id="enbzNomSucursal"></label><br>
            <label id="enbzNomEmpleado"></label><br>
            <label>Fecha: <?php echo date("d-m-Y"); ?></label><br>
        </div>
        <ul>
            <li>
                <table class="tbEstandar tbUnida" style="width:97%;">
                    <tbody>
                        <tr class="tr">
                            <td>Descripción</td>
                            <td>Precio</td>
                            <td>Cantidad</td>
                            <td>Total de linea</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <div class="listaCompra" style="width:97%;">
                    <table class="tbUnida" id="tbListaDetalle">
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <table class="tbUnida" style="width:97%;">
                    <tbody style="min-height:280px;">
                        <tr>
                            <td></td>
                            <td></td>
                            <td style="text-align:initial;">Subtotal:  <img src='../../imagenes/colones.png' style="width:6%;"><label id="subtotal">0.0</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td style="text-align:initial;width:30%;">IVA:  <img src='../../imagenes/colones.png' style="width:6%;"><label id="iva">0.0</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td style="width:30%;text-align:initial;">Total:  <img src='../../imagenes/colones.png' style="width:6%;"><label id="total">0.0</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </li>
            <li>
                <div class="fIngresoDetalle">
                    <form name="fRealizarVenta" id="fRealizarVenta" method="POST">

                        <p>Ingreso del detalle</p>
                        <input type="text" class="inputShadow" name="abrev" id="abrevProducto" placeholder="Abreviatura">
                        <input type="text" class="inputShadow" name="cantidad" placeholder="Cantidad">

                        <input type="submit" class="btn-submit" value="Agregar"/>
                        <a href="#" class="btn-submit" id="bTerminarVenta">Terminar venta</a>

                    </form>
                </div>
            </li>
        </ul>
    </div>     
</div>
<script>
    $(document).ready(function () {
        $("#enbzNomSucursal").text("Sucursal " + $("#nomSucursal").val());
        $("#enbzNomEmpleado").text("Empleado " + $("#nomEmpleado").val());
        $('#abrevProducto').autocomplete({
            source: '../../Business/ControladoraProducto.php?metodo=getNombresProducto&idSucursal=' + $("#sucursal").val(),
            minLength: 1
        });

        $(".linkBusquedaVentas").on("click",function(e){
            e.preventDefault();
            var ver = this.getAttribute("href");
            if(ver == ".venta"){
                if($(ver).is(":visible")){
                    
                }else{
                    $(".listarVentas").hide();
                    $(ver).show();
                }
            }else{
                if($(ver).is(":visible")){
                    
                }else{
                    $(".venta").hide();
                    $(ver).show();
                }
            }
        });

        $("input[name=filtroFecha]").click(function () {
            if($($(this).data("esconder")).is(":visible")){
                $($(this).data("esconder")).hide();
                $($(this).data("ver")).show();
            }else{
                $($(this).data("ver")).show();
            }
            $("#fechaInicio").val("");
            $("#fechaFinal").val("");
        });

        $(".bBuscarLista").on("click",function(e){
            e.preventDefault();
            var tipoBusqueda = this.getAttribute("href");
            if(tipoBusqueda == "mes"){
                listarVentasByMes($("#mesVenta").val(), $("#anioVenta").val());
            }else{
               if(tipoBusqueda == "fecha"){
                    if($.trim($("#fechaInicio").val()).length ==0 || $.trim($("#fechaFinal").val()).length ==0 ){
                        alert("Para hacer una busqueda de ingresar las fechas.");
                    }else{
                        listarVentasByFecha($("#fechaInicio").val(), $("#fechaFinal").val());
                    }
                } 
            }
        });

        $('.fecha').datetimepicker({
                timepicker:false,
                format:'d/m/Y'
        });

        function listarVentasByMes(mes, anio){
            $(".contenedorListaVentas").load("../../view/Ventas/BusquedaPersonaliazadaVentas.php?tipoBusqueda=mes&mesVenta="+mes+"&anioVenta="+anio);
        }

        function listarVentasByFecha(fechaInicio, fechaFinal){
            var res1 = fechaInicio.split("/");
            var res2 = fechaFinal.split("/");
            var fechaInicioFormatoGringo = res1[2]+"-"+res1[1]+"-"+res1[0];
            var fechaFinalFormatoGringo = res2[2]+"-"+res2[1]+"-"+res2[0];
            $(".contenedorListaVentas").load("../../view/Ventas/BusquedaPersonaliazadaVentas.php?tipoBusqueda=fecha&fechaInicio="+fechaInicioFormatoGringo+"&fechaFinal="+fechaFinalFormatoGringo);
        }
    });
</script>
<script type="text/javascript" src="../../js/gestion_ventas.js"></script>

