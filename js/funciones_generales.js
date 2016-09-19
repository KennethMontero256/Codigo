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
			$("#contenedorAdministrador").empty();
			cargar_pagina("#contenedorAdministrador", "../administracion/administrar_sucursales.php");
		}else{
			if(opcion=="admempleado"){
				$("#contenedorAdministrador").empty();
				cargar_pagina("#contenedorAdministrador","../administracion/administrar_empleados.php");
			}
		}
	});

	$(".icono").on('click',function(e){
    	e.preventDefault();
    	alert("adsf");
    	var idFila = this.getAttribute("href");
    	var nombre, cedula;
        
        $("#"+idFila).children("td").each(function (index2)
        {
            switch (index2) 
            {
                case 0: nombre = $(this).text();
                break;
                case 2: cedula = $(this).text();
                break;
            }
        });
        $("#"+idFila).remove();
        addOpSelect(cedula, nombre);
    });

	$(".addSucursal").on("click",function(){
		llenarSelectEmpleados();
		mostr_ocultr("frmAddSucursal");
	});

	$("#addEmpleado").on("click",function(e){
		e.preventDefault();
		addEmpleadoTb();
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

    /*Enviar formulario Agregar Sucursal*/

    $("#bRegistrarSucursal").on('click',function(e){
    	e.preventDefault();
    	if(validar_form_addsucursal()==false){
    		
    	}else{
    		notif({
                    'type': 'error',
                    'msg': 'Algunos campos estan vacios',
                    'position': 'right',
                    'timeout': 600000
            });
    	}
    });
    
    function validar_form_addsucursal(){
    	var formulario=document.frmAddSucursal;
    	var respuesta = false;
    	if(formulario.nomSucursal.value.length == 0){
    		respuesta = true;
    	}else{
    		if(formulario.direccion.value.length == 0){
    			respuesta = true;
    		}else{
    			if(formulario.telf.value.length == 0){
    				respuesta = true;
    			}
    		}
    	}
    	return respuesta;
    }

    function obtenerEmpleadosTabla(){
    	var empleados=[];
    	$("#tbEmpleados tbody tr").each(function (index) 
        {
            var nombre, cedula;
            $(this).children("td").each(function (index2) 
            {
                switch (index2) 
                {
                    case 0: nombre = $(this).text();
                            break;
                    case 1: cedula = $(this).text();
                            break;
                }
            });
            item = {}
        	item ["cedula"] = cedula;
        	item ["nombre"] = nombre;
        	empleados.push(item);
            alert(nombre + ' - ' + cedula);
        });
        alert("Empleados: "+JSON.stringify(empleados));
    }

    function llenarSelectEmpleados(){
		var opciones= '';
    	 $.ajax({
            url:'../../Business/ControladoraEmpleado.php?metodo=mostrarEmpleadoNombre',
            type:'GET',
            data:{},
            success: function(responseText){
               var data = JSON.parse(responseText);
               $.each(data, function(i, item) {
				   opciones += '<option value="'+ data[i].cedula + '">' + data[i].nombre + '</option>';	
			   });
			   $("#selectEmpleados").append(opciones);
            }
        });
    }

    function addEmpleadoTb(){
    	if($("#selectEmpleados option:selected").html()!=undefined){
	        var trs = $("#tbEmpleados tr").length;
	        var idTr = trs+1;

	        var nuevaFila = "<tr id='trTbEmpl"+idTr+"'>";
			nuevaFila += "<td>"+$("#selectEmpleados option:selected").html()+"</td>";
			nuevaFila +="<td><a href='trTbEmpl"+idTr+"' class='icono eliminar removerOpTbEmpl'><span class='icon-bin2'></span></a></td>";
			nuevaFila += "<td class='ocultaTd'>"+$("#selectEmpleados").val()+"</td>";
			nuevaFila += "</tr>";

			eliminarOpSelect($("#selectEmpleados").val());
			$("#tbEmpleados").append(nuevaFila);
		}else{
			mostrarMsjError("No hay empleados para añadir");
		}
    }

    function eliminarOpSelect(valor){
    	$("#selectEmpleados").find("option[value='"+valor+"']").remove(); 
    }

    function addOpSelect(value,descrip){
    	$('#selectEmpleados').append('<option value="'+value+'">'+descrip+'</option>');  
    }


    function mostrarMsjError(mensaje){
    	notif({
                    'type': 'error',
                    'msg': mensaje,
                    'position': 'right',
                    'timeout': 200000
            });
    }
    
    function createJSON(jsonArray,clave,valor) {
    	jsonArray = [];
  
        item = {}
        item [clave] = valor;

        jsonArray.push(item);
	}


});




