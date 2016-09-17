$(document).ready(function(){
	$('.opBarNav').on('click',function(e){
		e.preventDefault();
		var opcion = this.getAttribute("href");
		
		if(opcion == "pedido"){
			cargar_pagina("#contenedorGlobal", "../empleados/modulo_pedidos.php");
		}else{
			if(opcion == "caja"){
				cargar_pagina("#contenedorGlobal", "../Ventas/Venta.php");
				$(".xdsoft_datetimepicker").remove();
			}
		}

		/*Admnistrador*/
		if(opcion=="admsucursal"){
			alert("asd");
			cargar_pagina("#contenedorAdministrador", "../view/administracion/administrar_sucursales.php");
		}else{
			if(opcion=="admempleado"){
				cargar_pagina("#contenedorAdministrador", "../view/administracion/administrar_empleados.php");
			}
		}
	});

	$(".addSucursal").on("click",function(){
		mostr_ocultr("frmAddSucursal");
	});

	function cargar_pagina(lugarACargar,nombrePagina){
		$(lugarACargar).load(nombrePagina);
		$(lugarACargar).fadeIn(1000);
	}

	$('.flotante').on('click',function(e){
		 e.preventDefault();
		var opcion = this.getAttribute("href");
		if(opcion = "frmPedidoSucr"){
			mostr_ocultr("frmPedidoSucur");
		}
	});

	function mostr_ocultr(id){
        if ( $("#"+id).is (':hidden'))
            $("#"+id).show('slow');
        else
            $("#"+id).hide('slow');
    }
});