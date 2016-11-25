$(document).ready(function(){
    alertify.set('notifier','position', 'top-left');

	$("#bSubmitFrmLoginAdm").on("click",function(e){
        e.preventDefault();
        var formulario = document.frmLoginAdm;
        if(formulario.username.value.trim().length != 0 && formulario.password.value.trim().length != 0){
           formulario.submit(); 
        }else{
            $(".mensajes").text("Los campos no pueden estar vacios");
        }

    });
    /*Cambio de contrasenia*/
    $(".btnCambioPass").on("click",function(e){
       e.preventDefault();
       mostr_ocultr("frmCambiarPass");
       
    });

    $(".btnFrmPass").on("click",function(e){
        e.preventDefault();
        var accion = this.getAttribute("href");

        if(accion =="act"){
            var pass = $(".inptPass");
            /*Si hay algun campo vacio envia false*/
            if(estaVacio(pass)){
                convertMD5(pass[0].value.trim());
            }else{
                $("#lblMsj").text("Por favor, asegurese de no dejar espacios en blanco."); 
            }
        }else{
            if(accion == "can"){
                mostr_ocultr("frmCambiarPass");
                limpiarFormActualizarPassword();
            }
        }
    });
    
    function cambiarPassword(passNueva){
        var pass = $(".inptPass");
        $("#lblMsj").text("");
        if(estaVacio(pass)){
            if(!esIgual(pass[1].value.trim(), pass[0].value.trim())){
                if(esIgual($("#key").val(), passNueva)){
                    if((esIgual(pass[1].value.trim(), pass[2].value.trim())) && tieneMayuscula(pass[1].value.trim()) 
                       && tieneMinuscula(pass[1].value.trim()) && tieneNumero(pass[1].value.trim())
                       && cumpleCantidadCaracteres(pass[1].value.trim(), pass[2].value.trim())){
                       actualizarPassword($("#key1").val(), pass[1].value.trim());
                    }else{
                        $("#lblMsj").text("Debe asegurese de cumplir con los requisitos de contraseña.");
                    }
                }else{
                    $("#lblMsj").text("La contraseña que ingreso en el primer campo no "+
                        "coincide con la que inició sesión.\nCorrijala para poder efectuar los cambios.");
                }
            }else{
                $("#lblMsj").text("La nueva contraseña no puede ser igual, a la anterior.");
            }
        }else{
           $("#lblMsj").text("Por favor, asegurese de no dejar espacios en blanco."); 
        }
    }
    function estaVacio(campos){
        var respuesta = false;
        var cont = 0;
        for (var i = 0; i< campos.length; i++) {
             if ((campos[i].value).trim().length != 0){
                cont ++;
            }   
        }

        if(campos.length == cont){
           respuesta = true; 
        }

        return respuesta;   
    }
    function actualizarPassword(cedula, nuevaPass){
        alert(nuevaPass);
        $.ajax({
            url:'../../Business/ControladoraEmpleado.php?metodo=actualizarPass&cedula='+cedula+'&pass='+nuevaPass,
            type:'GET',
            data:{},
            success: function(responseText){
                if(responseText > 0){
                    myRedirect("http://localhost:5034/Codigo/index.php","cerrarSesion","true",
                        "mensaje","Su contraseña ha sido cambiada, el inicio de sesión es requerido.");
                }else{
                    myRedirect("http://localhost:5034/Codigo/index.php","cerrarSesion","true",
                        "mensaje","Existió un problema al cambiar la contraseña, vuelva a iniciar de sesión.");
                }
            }
        });
    }

    var myRedirect = function(redirectUrl, arg, value, arg2, value2) {
                    var form = $('<form action="' + redirectUrl + '" method="post">' +
            '<input type="hidden" name="'+ arg +'" value="' + value + '"></input>' + 
            '<input type="hidden" name="'+ arg2 +'" value="' + value2 + '"></input>'+'</form>');
            $('body').append(form);
            $(form).submit();
    };

    function convertMD5(string){
        
        $.ajax({
            url:'../../Business/ControladoraEmpleado.php?metodo=changeMD5&pass='+string,
            type:'GET',
            data:{},
            success: function(responseText){
               cambiarPassword(responseText);
            }
        });
    }

    function limpiarFormActualizarPassword(){
        $(".inptPass")[0].value="";
        $(".inptPass")[1].value="";
        $(".inptPass")[2].value="";
        $("#lblMsj").text("");
    }

    function esIgual(pass1, pass2){
        var respuesta = false;
        
        if(pass1 == pass2){
            respuesta = true;
        }

        return respuesta;
    }

    function tieneMayuscula(pass){
        var respuesta = false;
        var letras_mayusculas="ABCDEFGHYJKLMNÑOPQRSTUVWXYZ";
        for (var i = 0; i< pass.length; i++) {
             if (letras_mayusculas.indexOf(pass.charAt(i),0)!=-1){
                respuesta = true;
            }   
        }

        return respuesta;
    }

    function tieneMinuscula(pass){
        var letras="abcdefghyjklmnñopqrstuvwxyz";
        var respuesta = false;
        for (var i = 0; i< pass.length; i++) {
            if (letras.indexOf(pass.charAt(i),0)!=-1){
                respuesta = true;
            }
        }
        return respuesta;
    }

    function tieneNumero(pass){
        var respuesta = false;
        var numeros="0123456789";
        for (var i = 0; i< pass.length; i++) {
            if (numeros.indexOf(pass.charAt(i),0)!=-1){
                respuesta = true;
            }
        }

        return respuesta;
    }

    function cumpleCantidadCaracteres(pass1, pass2){
        var respuesta = false;
        
        if(pass1.length >= 4 && pass2.length >= 4 ){
            respuesta = true;
        }

        return respuesta;
    }
    /*Cambio de contrasenia*/
    /*funciones FAB*/
    $(".fabInventario").on("click",function(e){
         e.preventDefault();
        alert("");
        $(".menu-fab").show();
    });
    /*End funciones FAB*/
    $('.opBarNav').on('click',function(e){
		e.preventDefault();
		var opcion = this.getAttribute("href");

		if(opcion == "pedido"){
			cargar_pagina("#contenedorGlobal", "../empleados/modulo_pedidos.php");
		}else{
			if(opcion == "caja"){
				cargar_pagina("#contenedorGlobal", "../Ventas/GestionVentas.php");
                
				$(".xdsoft_datetimepicker").remove();
			}else{
                if(opcion == "invent"){
                   cargar_pagina("#contenedorGlobal", "../Producto/GestionInventario.php");
                    $(".xdsoft_datetimepicker").remove();
                }
            }
		}

	   });
    

    $(".btn-cancel").on('click',function(e){
        e.preventDefault();
        var opcion = this.getAttribute("href");
        
        if(opcion == "frmAddEmpleado"){
            mostr_ocultr("frmAddEmpleado");
        }

    });

	function cargar_pagina(lugarACargar,nombrePagina){
		$(lugarACargar).load(nombrePagina);
		$(lugarACargar).fadeIn(1000);
	}

	function mostr_ocultr(id){
		
        if ( $("#"+id).is(":visible")){
             $("#"+id).hide('slow');
           
        }else{
            $("#"+id).show('slow');
        }
    }

    /*Administrar empleados*/
    $("#addNewEmpleado").on("click",function(e){
        e.preventDefault();
        $(".bRegEmpleado").text("Registrar");
        $(".bRegEmpleado").attr("href", "frmAddEmpleado");
        limpiarFormAddEmpleado();
        llenarSelectSucursal();
        mostr_ocultr("frmAddEmpleado");
    });


    $(".bRegEmpleado").on("click",function(e){
        e.preventDefault();
        var opcion = this.getAttribute("href");
        var formulario = document.frmAddEmpleado;
        var empleado = new Object();
        
        if(opcion == "frmAddEmpleado"){
            if(validarFormEmpleado()){
                empleado.cedula = formulario.cedula.value.trim();
                empleado.nombre = formulario.nombreEmpl.value.trim();
                empleado.telf = formulario.telf.value.trim();
                empleado.idSucursal = formulario.selectSucursal.value;
                empleado.contrasenia = empleado.nombre.substr(0,1)+empleado.cedula.substr(0,3);
                if($('input:checkbox[name=emplHabl]:checked').val()==undefined){
                    empleado.disponible = "0";
                }else{
                    empleado.disponible = "1";
                }
                enviarAjax("../../Business/ControladoraEmpleado.php?metodo=addEmpleado",JSON.stringify(empleado));
                limpiarFormAddEmpleado();
                mensajeExito("Empleado agregado..");
            }else{
                alert("Hay algunos errores");
            }
        }else{
            if(formulario.cedula.value.trim().length > 0 && 
                formulario.nombreEmpl.value.trim().length > 0 &&
                formulario.telf.value.trim().length > 0 ){
                
                empleado.cedula = formulario.cedula.value.trim();
                empleado.nombre = formulario.nombreEmpl.value.trim();
                empleado.telf = formulario.telf.value.trim();
                empleado.sucursal = formulario.selectSucursal.value;
                if($('input:checkbox[name=emplHabl]:checked').val()==undefined){
                        empleado.habilitado = "0";
                    }else{
                        empleado.habilitado = "1";
                }
                enviarAjax("../../Business/ControladoraEmpleado.php?metodo=editEmpleado",JSON.stringify(empleado));
                limpiarFormAddEmpleado();
                mensajeExito(empleado.nombre+" ha sido actualizado.");
            }else{
                alertify.error("Aseguere de no haber dejado ningun campo vacio.");
            }
        }
       
    });

    function limpiarFormAddEmpleado(){
        var formulario = document.frmAddEmpleado;
        formulario.cedula.value = "";
        formulario.nombreEmpl.value = "";
        formulario.telf.value = "";
        $('#selectSucursal > option[value="0"]').attr('selected', 'selected');
        $("input:checkbox[name=emplHabl]").prop("checked", false);
    }

    function validarFormEmpleado(){
        var respuesta = false;
        var formulario = document.frmAddEmpleado;
        
        if(formulario.cedula.value.trim().length !=0 && formulario.nombreEmpl.value.trim().length !=0 && 
            formulario.telf.value.trim().length !=0){
            respuesta = true;
        }
        return respuesta;
    }

    function llenarSelectSucursal(){
        var opciones= '<option value="0">Ninguna</option>';
         $.ajax({
            url:'../../Business/sucursalController.php?accion=mostrarSucursales',
            type:'GET',
            data:{},
            success: function(responseText){
               var data = JSON.parse(responseText);
               $.each(data, function(i, item) {
                   opciones += '<option value="'+ data[i].id + '">' + data[i].nombre + '</option>'; 
               });

                $("#selectSucursal").empty().append(opciones);
            }
        });
    } 

    function enviarAjax(direccionServer, datos){
        var resultado="";
        $.ajax({
            url:direccionServer,
            type:'GET',
            data:{arrayDatos:datos},
            success: function(responseText){
                resultado = responseText;
                 mostrarEmpleados();
            }
        }); 

        return resultado;
    }
    
   
    /*Fin administrar empleados*/

    function mensajeExito(mensaje){
        alertify.success(mensaje);
    }

    function limpiarTablaPorId(id){
       $("#"+id+" tbody tr").each(function (index){
            $(this).remove();
        }); 
    }

    function mostrarEmpleados(){
        $("#contenedorAdministrador").empty();
        cargar_pagina("#contenedorAdministrador","../administracion/administrar_empleados.php");
    }

    function cargar_pagina(lugarACargar,nombrePagina){
        $(lugarACargar).load(nombrePagina);
        $(lugarACargar).fadeIn(1000);
    }

    });







