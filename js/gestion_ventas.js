$(document).ready(function(){
	//se controla el formulario cuando se ingresa una linea a la venta
	$( "#fRealizarVenta" ).submit(function(e) {
	  e.preventDefault();
	  var form = document.fRealizarVenta;
		if(form.abrev.value.trim().length != 0 && form.cantidad.value.trim().length != 0){
	  		procesarLineaProducto(form.abrev.value.trim());
	  	}else{
	  		alert("Para procesar la venta no debe dejar espacios en blanco.");
		}
	});

	function procesarLineaProducto(nomProducto){
		var producto = new Object();

		$.ajax({
            url:"../../Business/ControladoraProducto.php?metodo=getPrecioProducto&idSucursal="+
            $("#sucursal").val()+"&nombreProducto="+nomProducto,
            type:'GET',
            data:{},
            
            success: function(responseText){
                var data = JSON.parse(responseText);        
                producto["codigo"] = data[0].codigo;
			    producto["nombre"] = data[0].nombre;
			    producto["stock"] = data[0].stock;
			    producto["unidadMedida"] = data[0].unidadMedida;
			    producto["precio"] = data[0].precio;
			    producto["abrev"] = data[0].abrev;
			    //Despues de que se obtiene la info del producto se procesa los datos
			    procesarLinea(producto);
            }
        });
	}

	function procesarLinea(producto){
		//ver si hay inventario
		var form = document.fRealizarVenta;
		var cantidad = form.cantidad.value.trim();
		
		if(producto.unidadMedida == "k"){
			
			//digitado en gramos
			if(cantidad > 10){
				var stock = producto.stock * 1000;
				if(stock >= cantidad){
					agregarLineaVenta(producto,cantidad,"g");
				}else{
					alert("No hay suficiente inventario para abastecer la compra del producto: "+producto.nombre);
				}
			}else{
				//digitado en kilos
				if(producto.stock >= cantidad){
					agregarLineaVenta(producto,cantidad,"k");
				}else{
					alert("No hay suficiente inventario para abastecer la compra del producto: "+producto.nombre);
				}
			}
			
		}else{
			if(producto.unidadMedida == "u"){
				if(producto.stock >= cantidad){
					agregarLineaVenta(producto,cantidad,"u");
				}else{
					alert("No hay suficiente inventario para abastecer la compra del producto: "+producto.nombre);
				}
			}
		}
	}
	//tbListaDetalle
	function agregarLineaVenta(producto,cantidad,formatoIngresoCantidad){
		var trs = $("#tbListaDetalle tr").length;
	    var idTr = trs+1;
	    var totalLinea = 0;
	        
	    if(producto.unidadMedida == "k"){
	        if(formatoIngresoCantidad == "k"){
	        	totalLinea = parseFloat(((cantidad * 1000) * producto.precio)/1000); 
	        }else{
	        	if(formatoIngresoCantidad == "g"){
	        		totalLinea = parseFloat((cantidad * producto.precio)/1000); 
	        	}
	        }
	    }else{
	    	if(producto.unidadMedida == "u"){
	    		totalLinea = cantidad * producto.precio;
	    	}
	    }
		    
		var fila = "<tr id='"+idTr+"'>"
				  +"<td>"+"<input type='hidden' value='"+producto.codigo+"'>"+producto.nombre+"</td>"
				  +"<td>"+producto.precio+"</td>"
				  +"<td>"+cantidad+formatoIngresoCantidad+"</td>"
				  +"<td><img class='icon-colon' src='../../imagenes/colones.png' width='75'>"+totalLinea+"</td>"
				  +"<td><a href='#"+idTr+"' class='eliminarLinea'><span class='icon-bin2'></span></a></td>";
	    $("#tbListaDetalle").append(fila);
	    //despues de que se crea cada linea, se procede a dar el evento de eliminar linea del detalle
	    darEventoEliminarLinea();
	    limpiarFormAgregarDetalle();
	    actualizarTotales();
	}
	

	function darEventoEliminarLinea(){
		$(".eliminarLinea").off('click');
		$(".eliminarLinea").on("click",function(e){
			e.preventDefault();
			var idFila = this.getAttribute("href");
			$(idFila).remove();
		});
	}

	function limpiarFormAgregarDetalle(){
		$("#abrevProducto").focus();
		var form = document.fRealizarVenta;
		form.cantidad.value = "";
		form.abrev.value = "";
	}

	function actualizarTotales(){
		var subtotal = 0;
		$("#tbListaDetalle tbody tr").each(function (index) 
        {
            $(this).children("td").each(function (index2) 
            {
                switch (index2) 
                {
                    case 3: 
                    	alert("valor a sumar: "+$(this).text());
                    	subtotal = subtotal+ parseFloat($(this).text());
                        break;
                }
            });
            
        });
	$("#subtotal").text(subtotal);
	}
});