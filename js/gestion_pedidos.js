$(document).ready(function(){
	$('.flotante').on('click',function(e){
		 e.preventDefault();
		
		var opcion = this.getAttribute("href");
		if(opcion == "frmPedidoSucr"){
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
});