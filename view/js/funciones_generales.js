$(document).ready(function(){

	$('.opBarNav').on('click',function(e){
		 e.preventDefault();
		var opcion = this.getAttribute("href");
		if(opcion = "pedido"){
			alert("Attribute href: "+opcion);
		}
	});
});