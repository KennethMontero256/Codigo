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