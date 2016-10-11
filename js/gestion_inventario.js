$(document).ready(function(){
	/*Submenu Gestion inventario*/
    $(".shListaInventario").on("click",function(e){
        e.preventDefault();
        var mostrar = this.getAttribute("href");
       
        	$("#contenedorGlobal").load("../Producto/ListarProductos.php?metodo="+mostrar+"&idSucursal"+$(this).data("id"));
                alert("Funciona");
    });
    /*Submenu Gestion inventario*/
});