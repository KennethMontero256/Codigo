<?php
    session_start();
?>
	<div class="menuLateral">
		<p>Sección de:</p>
		<ul>
			<li><a href="#" id="opPedidoEspera">Pedidos en espera</a></li>
			<li><a href="#" id="opPedidoReal">Pedidos realizados</a></li>
		</ul>
	</div>
	<div class="contenedorSecundario">
	    
		<div class="contenidoPedidos">
			<p>Busqueda por filtro de fecha</p>
			<div class="barBusqueda">
				<label>De:</label>
				<input type="text" id="txtFecha1" class="fecha" placeholder="Seleccionar fecha">
				<label>a:</label>
				<input type="text" id="txtFecha2" class="fecha" placeholder="Seleccionar fecha">
				<a href="#" id="" class="btn-submit"><span class="icon-search"></span></a>
			</div>
			<div class="tabla">
			<table>
				<thead>
						<tr>
							<th>Código</th>
							<th>Fecha-hora</th>
						</tr>
					</thead>
			</table>
			<div class="detalleTablaPedido">
				<table>
					<tbody>
						<tr>
							<td>0987086</td>
							<td>07/08/2016 23434</td>
							<td>rastrear</td>
							<td><input type="checkbox" name=""></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>	
		</div>
	</div>
	<div class="contenedorModal" id="frmPedidoSucur" style="display:block;">
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
					<table class="tbEstandar">
						<tbody>
							<tr>
								<td>Mani</td>
								<td>100</td>
								<td><a href="#" class="eliminarLinea"><span class="icon-bin2"></span></a></td>
							</tr>
							<tr>
								<td>Mani</td>
								<td>100</td>
								<td><a href="#" class="eliminarLinea"><span class="icon-pencil"></span></a></td>
							</tr>
							<tr>
								<td>Mani</td>
								<td>100</td>
								<td><a href="#" class="eliminarLinea"><span class="icon-pencil"></span></a></td>
							</tr>
							<tr>
								<td>Mani</td>
								<td>100</td>
								<td><a href="#" class="eliminarLinea"><span class="icon-pencil"></span></a></td>
							</tr>
							<tr>
								<td>Mani</td>
								<td>100</td>
								<td><a href="#" class="eliminarLinea"><span class="icon-pencil"></span></a></td>
							</tr>
							<tr>
								<td>Mani</td>
								<td>100</td>
								<td><a href="#" class="eliminarLinea"><span class="icon-pencil"></span></a></td>
							</tr>
							<tr>
								<td>Mani</td>
								<td>100</td>
								<td><a href="#" class="eliminarLinea"><span class="icon-pencil"></span></a></td>
							</tr>
							<tr>
								<td>Mani</td>
								<td>100</td>
								<td><a href="#" class="eliminarLinea"><span class="icon-pencil"></span></a></td>
							</tr>
							<tr>
								<td>Mani</td>
								<td>100</td>
								<td><a href="#" class="eliminarLinea"><span class="icon-pencil"></span></a></td>
							</tr>
							<tr>
								<td>Mani</td>
								<td>100</td>
								<td><a href="#" class="eliminarLinea"><span class="icon-pencil"></span></a></td>
							</tr>
							<tr>
								<td>Mani</td>
								<td>100</td>
								<td><a href="#" class="eliminarLinea"><span class="icon-pencil"></span></a></td>
							</tr>
							<tr>
								<td>Mani</td>
								<td>100</td>
								<td><a href="#" class="eliminarLinea"><span class="icon-pencil"></span></a></td>
							</tr>
							<tr>
								<td>Mani</td>
								<td>100</td>
								<td><a href="#" class="eliminarLinea"><span class="icon-pencil"></span></a></td>
							</tr>
							<tr>
								<td>Mani</td>
								<td>100</td>
								<td><a href="#" class="eliminarLinea"><span class="icon-pencil"></span></a></td>
							</tr>
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
						<li>
							<div class="categoria">
							<p>Nombre Cate</p>
								<table>
									<tbody>
										<tr>
											<td>Categoria</td>
											<td>Stock</td>
										</tr>
									</tbody>
								</table>
								<div class="detListPrdCat">
								<table>
									<tbody>
										<tr>
											<td>Mani Carapiñado
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Sirope de cafe little bit
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Mani salado
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Mani salado
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Mani salado
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Mani salado
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Mani salado
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Mani salado
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Mani salado
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Mani salado
											</td>
											<td>10k</td>
										</tr>
									</tbody>
								</table>
								</div>
							</div>
						</li>
						<li>
							<div class="categoria">
							<p>Nombre Cate</p>
								<table>
									<tbody>
										<tr>
											<td>Categoria</td>
											<td>Stock</td>
										</tr>
									</tbody>
								</table>
								<div class="detListPrdCat">
								<table>
									<tbody>
										<tr>
											<td>Mani Carapiñado
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Sirope de cafe little bit
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Mani salado
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Mani salado
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Mani salado
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Mani salado
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Mani salado
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Mani salado
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Mani salado
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Mani salado
											</td>
											<td>10k</td>
										</tr>
									</tbody>
								</table>
								</div>
							</div>
						</li>
						<li>
							<div class="categoria">
							<p>Nombre Cate</p>
								<table>
									<tbody>
										<tr>
											<td>Categoria</td>
											<td>Stock</td>
										</tr>
									</tbody>
								</table>
								<div class="detListPrdCat">
								<table>
									<tbody>
										<tr>
											<td>Mani Carapiñado
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Sirope de cafe little bit
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Mani salado
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Mani salado
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Mani salado
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Mani salado
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Mani salado
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Mani salado
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Mani salado
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Mani salado
											</td>
											<td>10k</td>
										</tr>
									</tbody>
								</table>
								</div>
							</div>
						</li>
						<li>
							<div class="categoria">
							<p>Nombre Cate</p>
								<table>
									<tbody>
										<tr>
											<td>Categoria</td>
											<td>Stock</td>
										</tr>
									</tbody>
								</table>
								<div class="detListPrdCat">
								<table>
									<tbody>
										<tr>
											<td>Mani Carapiñado
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Sirope de cafe little bit
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Mani salado
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Mani salado
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Mani salado
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Mani salado
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Mani salado
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Mani salado
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Mani salado
											</td>
											<td>10k</td>
										</tr>
										<tr>
											<td>Mani salado
											</td>
											<td>10k</td>
										</tr>
									</tbody>
								</table>
								</div>
							</div>
						</li>
					</ul>
				</div>
				</div>
			</div>
			<div class="footPedido">
				<a href="do" class="btnPedido btn-submit">Realizar</a>
				<a href="can" class="btnPedido btn-submit">Cancelar</a>
			</div>
		</div>
	</div>
	<a class='flotante' href='frmPedidoSucr'>Add</a>
	 <script>
            $(function() {
                $('.fecha').datetimepicker({
                    timepicker:false,
 					format:'d/m/Y'
                });
            });
        </script>
    <script type="text/javascript" src="../../js/gestion_pedidos.js"></script>
