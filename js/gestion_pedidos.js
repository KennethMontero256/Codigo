$(document).ready(function(){
	$('.flotante').on('click',function(e){
		 e.preventDefault();
		var opcion = this.getAttribute("href");
		
		if(opcion == "frmPedidoSucr"){
			$(".listColCategorias").empty();
		llenarListaProductos($("#keySucursal").val());
		
			mostr_ocultr("frmPedidoSucur");
		}

	});

	function mostr_ocultr(id){
		
        if ( $("#"+id).is(":visible")){
             $("#"+id).hide('slow');
           
        }else{
            $("#"+id).show('slow');
        }
    }

    /*Evento cerrar modal para hacer pedido*/
    $(".btnClosePedido").on("click",function(){
    	mostr_ocultr("frmPedidoSucur");
    });
    /*Evento cerrar modal para hacer pedido*/

    /*Se comunica con el server para obtener los datos q
     acompañan las categorias*/
    function llenarListaProductos(sucursal){
    	   $.ajax({
            url:'../../Business/ControladoraProducto.php?metodo=getPrdsCategoria&idSucursal='+sucursal,
            type:'GET',
            data:{},
            success: function(responseText){
                crearCardsCategoria(responseText);
            }
        });
    }
    /*Hace la separacion de los datos con respecto a las categorias
      se apoya de un metodo addToCatLi para añadirlos datos al card Categoria*/
    function crearCardsCategoria(cards){
    	var data = JSON.parse(cards);
    	
      	var cont = 0;
	    var foot = "</tbody></table></div></div></li>";
      	var filas = "";

    	$.each(data, function(i, item) {

	        if(cont == 0){
	        	filas += "<tr><td><span data-id='"+data[i].codigo+"' data-unidadMedida='"
	          		+data[i].unidadMedida+"' data-nombre='"+data[i].nombre+"' data-stock='"+data[i].stock+"' class='clickPrdCatPedido'>"
	          		+data[i].nombre+"</td><td>"+data[i].stock+data[i].unidadMedida+"</td></tr>";
	          cont ++;
	        }else{
	          if(data[i-1].nombreCategoria != data[i].nombreCategoria){
	          	addDatosToLi(data[i-1].nombreCategoria, data[i-1].idCategoria, filas);
	          	filas = "";	
	          }
	          filas += "<tr><td><span data-id='"+data[i].codigo+"' data-unidadMedida='"
	          		+data[i].unidadMedida+"' data-nombre='"+data[i].nombre+"' data-stock='"+data[i].stock+"' class='clickPrdCatPedido'>"
	          		+data[i].nombre+"</td><td>"+data[i].stock+data[i].unidadMedida+"</td></tr>";
	          
	          if(data.length-1 == i){
	          	addDatosToLi(data[i].nombreCategoria, data[i].idCategoria, filas);
	          }
	          
	        }
      });
    	/*finalmente, se agregan los eventos para los elementos creados*/
    	agregarEventos();
    }

    function addDatosToLi(cat,idCat,filas){
    	$(".listColCategorias").append("<li><div class='categoria'><p>"+cat+
	          							"</p><table>"+"<tbody><tr><td>Producto</td><td>"+
	          							"Stock</td></tr></tbody>"+"</table><div class='detListPrdCat'>"
	          							+"<table id='"+idCat+"'><tbody>"+filas+"</tbody></table></div></div></li>");	
    }
    /*-------------------------------------*/
    
    function agregarEventos(){
    	$(".clickPrdCatPedido").off("click");
    	$(".clickPrdCatPedido").on("click",function(){
    		mostrarInput(this);
    	});	
    }

    function mostrarInput(obj){
    	alertify.prompt( 
			'Tostador', 
			'', 
			'', 
			function(evt, value) { 
            	if(value.trim().length != 0){
            		if( isNaN(value.trim()) ) {
            			alertify.error('Por favor, no ingresar texto.');
					}else{
            			validarCantidad(obj, value.trim());
            		}
            	}else{
            		alertify.error('No se proceso la solicitud, porque no ingreso ningun valor.');
            	}
            }
            , function() {
            	alertify.success('Cancelado');
         	}
         ).set({transition:'zoom',message: 'Ingrese la cantidad que desea solicitar. Recuerde que la cantidad que ingrese'+
			' será solicitada con respecto a la unidad de medida con la que se registró'+
			' el producto.'}).show();
    }

    function validarCantidad(obj, cantidad){
    	switch($(obj).attr("data-unidadMedida")) {
		    case "k":
		        if(cantidad>=1){
		        	agregarLineaToPedido($(obj).attr("data-id"), $(obj).attr("data-nombre"), 
		        		cantidad, $(obj).attr("data-unidadMedida"));
		        }else{
		        	alertify.error("No se puede solicitar menos de un kilo.");
		        }
		        break;
		    case "g":
		    	if(cantidad>=100){
		        	agregarLineaToPedido($(obj).attr("data-id"), $(obj).attr("data-nombre"), 
		        		cantidad, $(obj).attr("data-unidadMedida"));
		        }else{
		        	alertify.error("No se puede solicitar menos de 100 gramos");
		        }   
		        break;
		    case "u":
		    	if(cantidad>=1){
		        	agregarLineaToPedido($(obj).attr("data-id"), $(obj).attr("data-nombre"), 
		        		cantidad, $(obj).attr("data-unidadMedida"));
		        }else{
		        	alertify.error("No se puede solicitar menos de una unidad.");
		        }   
		    	break;
		} 
    }

    function agregarLineaToPedido(id, nombre, cantidad, unidadMedida){
    	if(!estaEnTabla(id)){
	    	var fila = "<tr id='"+id+"'><td><span>"+nombre+"</span></td><td>"+cantidad+unidadMedida+
	    			"</td><td><a href='#' data-id='"+id+"' class='eliminarLineaPedido'><span class='icon-bin2'></span></a></td></tr>";
	    	$("#tbFacturaPedido").append(fila);
	    	darEventoEliminarLinea();
    	}else{
    		alert("ya exste");
    		modificarLineaPedido(id, cantidad+unidadMedida);
    	}
    }

    function estaEnTabla(id){
    	var respuesta = false;

    	$("#tbFacturaPedido tbody tr").each(function (index) 
        {
        	if($(this).attr("id") == id){
        		respuesta = true;
        	}
        });
        return respuesta;
    }

    function modificarLineaPedido(id, cantidad){
    	$("#tbFacturaPedido tbody tr").each(function (index) 
        {
        	if($(this).attr("id") == id){
	        	$(this).children("td").each(function (index2) 
	            {
	                switch (index2) 
	                {
	                    case 1:
	                    	$(this).text(cantidad);
	                        break;
	                }
	            });
        	}
        });
    }

    function darEventoEliminarLinea(){
    	$(".eliminarLineaPedido").off("click");
    	$(".eliminarLineaPedido").on("click",function(e){
    		e.preventDefault();
    		$("#"+$(this).attr("data-id")).remove();
    	});
    }

    function realizarPedido(){
    	var pedido = new Object();
		var listaLineaPedido = [];

		venta["idEmpleado"] = $("#cedulaEmpleado").val();
		venta["idSucursal"] = $("#keySucursal").val();

		$("#tbFacturaPedido tbody tr").each(function (index) 
        {
        	var idFila = $(this).attr("id");
        	var codProducto = $(this).attr("id");
            var precio = 0,cantidad = 0 ,totalLinea = 0;
            
            $(this).children("td").each(function (index2) 
            {
                switch (index2) 
                {
                    case 1:
                    	precio = $(this).text();
                        break;
                    case 2:
                    	var cadena = $(this).text();
                    	cantidad = cadena.substr(0, cadena.length-1);
                        break;
                    case 3:
                    	totalLinea = $(this).text();
                        break;
                }
            });
            
            var lineaVenta = {codigoProducto:codProducto, precio:precio, cantidad:cantidad, totalLinea:totalLinea}; 
            listaLineaVenta.push(lineaVenta);
        });

    }

    /*Eventos botones para realizar o cancelar pedido*/
    $(".btnPedido").on("click",function(e){
    	e.preventDefault();
    	var opcion = this.getAttribute("href");

    	if(opcion == "do"){
    		realizarPedido();
    	}else{
    		preguntaCancelarPedido();
    	}
    });

    function preguntaCancelarPedido(){
    	
    	if($("#tbFacturaPedido tr").length>0){
    		alertify.confirm('Tostador', 'Presione cancelar, si no va a realiar la solicitud del pedido.', 
    			function(){ }
                , function(){ 
                	limpiarTabla("tbFacturaPedido");
    				mostr_ocultr("frmPedidoSucur");
                }
                ).set('labels', {ok:'Seguir aquí', cancel:'Cancelar'});;
    	}else{
    		limpiarTabla("tbFacturaPedido");
    		mostr_ocultr("frmPedidoSucur");
    	}
    }

    function limpiarTabla(id){
    	$("#"+id+" tbody tr").each(function (index){
            $(this).remove();
        }); 
    }
});