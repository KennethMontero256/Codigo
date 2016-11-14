
<div class="contenedorModal">
	<div class="contentFrmCambioPass">
		<p class="tituloP">Cambio de contraseña</p>
		<div class="labelMsj">
			<label>*Las contraseñas deben de cumplir como mínimo<br>
					con 4 caractres, distinta a la contraseña de<br> 
					inicio, un caracter en minúscula, un caracter<br> 
					en mayúscula y un número.<br> 
			</label>
			<label id="lblMsj" style="color:#e53935"></label>
		</div>
		<input type="hidden" id="key1" value="<?php echo $_SESSION["cedula"];?>">
		<input type="hidden" id="key" value="<?php echo $_SESSION["pass"];?>">
		<input type="password" class="inputShadow inptPass" placeholder="Contraseña con la que inició sesión">
		<input type="password" class="inputShadow inptPass" placeholder="Nueva contraseña">
		<input type="password" class="inputShadow inptPass" placeholder="Repetir nueva contraseña">
		<div class="footCambioPass">
			<a href="act" class="btn-submit btnFrmPass">Actualizar</a>
			<a href="can" class="btn-submit btnFrmPass">Cancelar</a>
		</div>
	</div>
</div>