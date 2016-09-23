$(document).ready(function(){
setInterval(mostrarEmpleadosBySucursal(),1000);

function mostrarEmpleadosBySucursal(){
  $.ajax({
    url:"../../Business/ControladoraEmpleado.php?metodo=empleadosBySucursal",
    type:'GET',
    data:{},
    success: function(responseText){
      var data = JSON.parse(responseText);
      limpiarTablaById("tablaEmpleados");
      
      var cont = 0;
      $.each(data, function(i, item) {
        var fila = "";
        var nuevaFila = "<tr>";
        nuevaFila += "<td>"+data[i].nombre+"</td>";
                        
        nuevaFila +="<td><a href='"+data[i].nombre+"' data-id='"+data[i].cedula+"' class='icono eliminarEmpl'><span class='icon-bin2'></span></a></td>";
        nuevaFila +="<td><a href='' class='icono'><span class='icon-pencil'></span></a></td>";
                        nuevaFila += "</tr>";

        $("#tablaEmpleados").append(nuevaFila);
      });
      agregarEventoEliminarEmpleado(); 
    }
  }); 
}
/*Eliminar empleado*/
    function agregarEventoEliminarEmpleado(){
       $("a.eliminarEmpl").off('click');
        $("a.eliminarEmpl").on('click', function(e) {
             e.preventDefault();
            var id = $(this).attr("data-id");
            var empleado = this.getAttribute("href");

            alertify.confirm(
                '¿Desea eliminar el empleado <span style="color:blue;">'+empleado+'</span>?', 
                function(){
                    eliminarEmpleado(id);
                }, 
                function(){ 
                alertify.error('Cancelado');
            });
        });
    }
    /*FIN----------ELIMINAR*/
  function eliminarEmpleado(identificacion){
    $.ajax({
      url:'../../Business/ControladoraEmpleado.php?metodo=eliminarEmpleado',
      type:'GET',
      data:{cedula:identificacion},
      success: function(responseText){
        if(responseText>0){
           mostrarEmpleadosBySucursal();
           alertify.success("Empleado eliminado");
        }else{
          alertify.error('Ocurrio un error inesperado');
        }
      }
    });
    } 
    function limpiarTablaById(id){
       $("#"+id+" tbody tr").each(function (index){
            $(this).remove();
        }); 
    }
});