$(document).ready(function(){
	/*Submenu Gestion inventario*/
    $(".shListaInventario").on("click",function(e){
        e.preventDefault();
        var mostrar = this.getAttribute("href");
        $("#contenedorListas").load("../Producto/Listar.php?metodo="+mostrar+"&id="+$(this).data("id"));
        
    });
    /*Submenu Gestion inventario*/
    $("#fabInventario").on("click",function(e){
    	e.preventDefault();
    	if($(".menu-fab").is(":visible")){
        	$(".menu-fab").hide();
    	}else{
    		$(".menu-fab").show();
    	}
        
    });
    
     $(".menu-fab").hover(function(){
        $(".menu-fab").show();
	    },function(){
	    	$(".menu-fab").hide();
    });
    /*evento para opciones de submenu del FAB*/
     $(".opMenuFab").on("click",function(e){
        e.preventDefault();
        var formulario = this.getAttribute("href");
        $(formulario).show();
     })

    /*pFormCategoria*/
    
    $(".opFormCategoria").on("click",function(e){
        e.preventDefault();
        var accion = this.getAttribute("href");
        if(accion == "add"){
            var cat = $("#nomCategoria").val();
            if(cat.trim().length > 4 ){
                addCategoria(cat);
            }else{
                alert("Debe ingresar almenos 4 caracteres");
            }
        }else{
            if(accion == "can"){
                $("#nomCategoria").val("");
                $("#formCategoria").hide();
                $("#actualizarCategoria").text("Agregar");
            }
        }
    });

    function addCategoria(nombreCategoria){
        $.ajax({
            url:"../../Business/ControladoraCategoria.php?metodo=insertar",
            type:'GET',
            data:{nombre:nombreCategoria},
            success: function(responseText){
                alert("Se ha insertado la nueva categoria");
                actualizarListado("shCategoria", "0");
                $("#nomCategoria").val("");
            }
        }); 
    }
    /*fin metodos add categoria*/

    function actualizarListado(mostrar,id){
        $("#contenedorListas").load("../Producto/Listar.php?metodo="+mostrar+"&id="+id);
    }

    /*Metodos IMEC producto*/

    $(".opFormProducto").on("click",function(e){
        e.preventDefault();
        var accion = this.getAttribute("href");
        if(accion == "add"){
            if(validaFormProducto()){
                alert("No se puede ingresar el producto \nHay campos vacios. ");
            }else{
                var form = document.formProducto;
                addProducto(form.codigo.value,form.nombre.value, form.abrev.value, form.stock.value,form.precio.value,$("#unidadMedida").val(), $("#proveedor").val(),$("#tamanio").val(), form.sucursal.value, $("#categoria").val());
            }
        }else{
            if(accion == "can"){
                limpiarFormProducto();
                $("#formProducto").hide();
            }
        }
    });

    function validaFormProducto(){
        var respuesta = false;
        $("#fProducto").find(':input').each(function() {
            if($(this).is( "[type=text]" )){
                var str = $(this).val();
                if(str.trim().length == 0){
                    respuesta = true;
                }
            }
        });
        return respuesta;
    }

    function limpiarFormProducto(){
        $("#fProducto").find(':input').each(function() {
            if($(this).is( "[type=text]" )){
                $(this).val("");
            }
        });
    }

    function addProducto(codigo,nombre,abreviatura,stock,precio,unidadMedida,proveedor,tamanio,idSucursal,idCategoria){
        alert(codigo+"-"+nombre+"-"+abreviatura+"-"+stock+"-"+precio+"-"+unidadMedida+"-"+proveedor+"-"+tamanio
            +"-"+idSucursal+"-"+idCategoria);
        $.ajax({
            url:"../../Business/ControladoraProducto.php?metodo=insertarActualizar",
            type:'GET',
            data:{codigo:codigo,nombre:nombre,abreviatura:abreviatura,stock:stock,precio:precio,unidadMedida:unidadMedida,
                proveedor:proveedor,tamanio:tamanio,idSucursal:idSucursal,idCategoria:idCategoria},
            success: function(responseText){
                alert("Se ha agregado un nuevo producto");
                actualizarListado("shProductos", idSucursal);
                limpiarFormProducto();
            }
        }); 
    }
});