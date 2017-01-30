<?php
    session_start();
?>
	<div class="menuLateral">
		<p>Sección de:</p>
		<ul>
			<li class="liPedido" data-tipoPedido="todos" id="opTodosLosPedidos"><a href="#" ><span class="icon-spinner9"></span>Todos los pedidos</a></li>
			<li class="liPedido" data-tipoPedido="recibido" id="opPedidoRecibido"><a href="#" ><span class="icon-check"></span>Pedidos Recibidos</a></li>
			<li class="liPedido" data-tipoPedido="espera" id="opPedidoEspera"><a href="#"><span class="icon-clock"></span>Pedidos en espera</a></li>
			<input type="hidden" id="opListarPedidoMenuLateral" value="todos">
		</ul>
	</div>
	<div class="contenedorSecundario">
		<div class="contenidoPedidos">
			<div class="barBusquedaPedido">
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
            <select name="mes" id="mesPedido">
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
                echo "<select id='anioPedido'>";
                    for($i = 2016; $i<=2030; $i++){
                        echo "<option value='".$i."'>".$i."</option>";
                    }
                echo "</select>";
            ?>
            <label> y por usuario <input type="checkbox" id="cedulaPedidoPorMes" class="chckPedido" data-key='<?php echo $_SESSION["cedula"]; ?>'></label>
            <a href="mes" class="bBuscarLista btn-submit"><span class="icon-search"></span></a>
        </div>
        <div class="barBusqueda ventasPorFecha">
            <label>De:<input type="text" class="inputShadow fecha" id="fechaInicio" placeholder="Fecha de inicio"></label>
            <label>Hasta<input type="text" class="inputShadow fecha" id="fechaFinal" placeholder="Fecha final"></label>
            <label> y por usuario <input type="checkbox" id="cedulaPedidoPorFecha" class="chckPedido" data-key='<?php echo $_SESSION["cedula"]; ?>'></label>
            <a href="fecha" class="bBuscarLista btn-submit"><span class="icon-search"></span></a>
        </div>
			</div>
			<div class="contenedorCarga" id="cntLoad" style="display: none;">
                <div class="loader" id="loader">Cargando...</div>
 			</div>
			<div class="tablaListarPedidos" style="">
				<div class="headTablaPedido">
					<div class="trPedido">
						Lista de pedidos
					</div>
				</div>
				<div class="bodyTablaPedido">
				
			</div>
		</div>
	</div>
	<div class="contenedorModal" id="frmPedidoSucur" style="display:none;">
		<div class="contenedorPedidoSucr">
		<span class="icon-cross btnClosePedido"></span>
			<div class="facturaPedido colPedido">
				<div class="encbPedido">
					<p>Tostador <?php echo $_SESSION["nombreSucursal"];?></p>
					<p>Empleado <?php echo $_SESSION["nombre"];?></p>
					<p>Fecha: <?php echo date("d-m-Y"); ?></p>
				</div>
				<div class="detallePedido">
					<table class="tbEstandar">
						<tbody>
							<tr class="encabezadoTb">
								<td>Producto</td>
								<td>Cantidad</td>
								<td>Eliminar</td>
							</tr>
						</tbody>
					</table>
					<div class="tbDetallePedido">
					<table id="tbFacturaPedido" class="tbEstandar">
						<tbody>
							
						</tbody>
					</table>
					</div>
				</div>
			</div>
			<div class="frmInsertDetalle colPedido">
				<p class="tituloInsertPedido">Agregar producto al pedido</p>
				<div class="pedidoScroll">
				<div class="opPedido">
					<ul class="listColCategorias">
					  <!-- Aqui se añaden las tarjetas con 
					       los nombres de cada producto 
					       segun categoria
					    -->
					</ul>
				</div>
				</div>
			</div>
			<div class="footPedido">
				 <textarea id="msjConversacion" placeholder="Ingrese otras señas que son importantes para usted."></textarea>
				<a href="do" class="btnPedido btn-submit">Realizar</a>
				<a href="can" class="btnPedido btn-submit">Cancelar</a>
			</div>
		</div>
	</div>
	<a id="btnFabPedido" class='flotante' href='frmPedidoSucr'><span class="icon-plus"></span></a>
	 <script>
            $(function() {
                $('.fecha').datetimepicker({
                    timepicker:false,
 					format:'d/m/Y'
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
		            $(".chckPedido").prop('checked',false);
		        });
            });
        </script>
   
    <script type="text/javascript" src="../../js/gestion_pedidos.js"></script>
