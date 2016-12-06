$('#btnFabPedido').unbind();
$(".liPedido").unbind();
$(".bBuscarLista").unbind();

$("#opTodosLosPedidos a").addClass("seleccionadoA");
$("#opTodosLosPedidos a span").addClass("seleccionadoSpan");

$('#btnFabPedido').on('click',function(e){
		e.preventDefault();
		e.stopPropagation();
	    $(".listColCategorias").empty();
		llenarListaProductos($("#keySucursal").val());
		mostr_ocultr("frmPedidoSucur");
	});
    
    $(".liPedido").on("click",function(){
        $("#opListarPedidoMenuLateral").val($(this).attr("data-tipoPedido"));

        $(".liPedido a").removeClass("seleccionadoA");
        $(".liPedido a span").removeClass("seleccionadoSpan");

        $("#"+$(this).attr('id')+" a").addClass("seleccionadoA");
        $("#"+$(this).attr('id')+" a span").addClass("seleccionadoSpan");
    });
    

    $(".bBuscarLista").on("click", function(e){
        e.preventDefault();
        var tipoBusqueda = this.getAttribute("href");
        if(tipoBusqueda == "mes"){

            if ( $(".tablaListarPedidos").is(":visible")){
                $(".tablaListarPedidos").hide();
                $("#cntLoad").fadeIn("slow", function() {
                    listarPedidosByMes();
                });
            }else{
                $("#cntLoad").fadeIn("slow", function() {
                    listarPedidosByMes();
                });
            }
           
        }else{
            if(tipoBusqueda == "fecha"){
                if($.trim($("#fechaInicio").val()).length ==0 || $.trim($("#fechaFinal").val()).length ==0 ){
                    alertify.error("Para hacer una busqueda de ingresar las fechas.");
                }else{
                    if ( $(".tablaListarPedidos").is(":visible")){
                        $(".tablaListarPedidos").hide();
                        $("#cntLoad").fadeIn("slow", function() {
                            listarPedidosByRangoFechas();
                        });
                    }else{
                       $("#cntLoad").fadeIn("slow", function() {
                        listarPedidosByRangoFechas();
                        });
                    }
                }
            } 
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

    function procesarPedido(){
    	var pedido = new Object();
		var listaLineaPedido = [];

		pedido["empleado"] = $("#cedulaEmpleado").val();
		pedido["sucursal"] = $("#keySucursal").val();
        pedido["mensaje"] = $("#msjConversacion").val().trim();

		$("#tbFacturaPedido tbody tr").each(function (index) 
        {
        	var codProducto = $(this).attr("id");
            var cantidad = 0 ;
            
            $(this).children("td").each(function (index2) 
            {
                switch (index2) 
                {
                    case 1:
                    	var cadena = $(this).text();
                        cantidad = cadena.substr(0, cadena.length-1);
                        break;
                }
            });
            
            var lineaPedido = {producto:codProducto, cantidad:cantidad}; 
            listaLineaPedido.push(lineaPedido);
        });
        realizarPedido(JSON.stringify(pedido), JSON.stringify(listaLineaPedido));
    }
    
    function realizarPedido(pedido, detallePedido){
        $.ajax({
            url:"../../Business/ControladoraPedido.php?metodo=agregarPedido",
            type:'GET',
            data:{pedido:pedido, detallePedido:detallePedido},
            success: function(responseText){
               limpiarFormPedido();
               alertify.success("Su pedido ha sido enviado.");
            }
        });
    }

    /*Eventos botones para realizar o cancelar pedido*/
    $(".btnPedido").on("click",function(e){
    	e.preventDefault();
    	var opcion = this.getAttribute("href");

    	if(opcion == "do"){
            if($("#tbFacturaPedido tr").length>0){
    		  procesarPedido();
            }else{
                alertify.error("No se puede realizar el pedido, debido a que "+
                                "no se ha insertado ningun producto al pedido.");
            }
    	}else{
    		preguntaCancelarPedido();
    	}
    });

    function preguntaCancelarPedido(){
    	
    	if($("#tbFacturaPedido tr").length>0){
    		alertify.confirm('Tostador', 'Presione cancelar, si no va a realiar la solicitud del pedido.', 
    			function(){ }
                , function(){ 
                	limpiarFormPedido();
    				mostr_ocultr("frmPedidoSucur");
                }
                ).set('labels', {ok:'Seguir aquí', cancel:'Cancelar'});;
    	}else{
    		limpiarFormPedido();
    		mostr_ocultr("frmPedidoSucur");
    	}
    }

    function limpiarFormPedido(){
        $("#msjConversacion").val("");
        limpiarTabla("tbFacturaPedido");
    }

    function listarPedidosByRangoFechas(){
        var usuario = ($("#cedulaPedidoPorFecha").is(':checked'))?$("#cedulaPedidoPorFecha").attr("data-key"):0;
        
        $(".bodyTablaPedido").load("../../view/empleados/listar_pedidos.php?metodo=rangoFechas&"+
            "tipoPedido="+$("#opListarPedidoMenuLateral").val()+"&fechaInicio="
            +getFechaFormatoGringo($("#fechaInicio").val().trim())+"&fechaFinal="+ getFechaFormatoGringo($("#fechaFinal").val().trim())+
            "&usuario="+usuario);
    }

    function listarPedidosByMes(){
        var usuario = ($("#cedulaPedidoPorFecha").is(':checked'))?$("#cedulaPedidoPorFecha").attr("data-key"):0;
        
        $(".bodyTablaPedido").load("../../view/empleados/listar_pedidos.php?metodo=mes&"+
            "tipoPedido="+$("#opListarPedidoMenuLateral").val()+"&mes="+colocarCero($("#mesPedido").val())
            +"&anio="+$("#anioPedido").val()+"&usuario="+usuario);
    }

    function colocarCero(num){
        var res = "";
        
        if(num < 10){
            res = "0" + num.toString();
        }else{
            res = num.toString();
        }

        return res;
    }

    function getFechaFormatoGringo(fecha){
        var res1 = fecha.split("/");
        var fechaFormatoGringo = res1[2]+"-"+res1[1]+"-"+res1[0];
        return fechaFormatoGringo;
    }

    function limpiarTabla(id){
    	$("#"+id+" tbody tr").each(function (index){
            $(this).remove();
        }); 
    }

    
    
