$(document).ready(function(){
setInterval(mostrarEmpleadosBySucursal(),1000);
function mostrarEmpleadosBySucursal(){
  $.ajax({
    url:"../../Business/ControladoraEmpleado.php?metodo=empleadosBySucursal",
    type:'GET',
    data:{},
    success: function(responseText){
      alert(responseText);
      var data = JSON.parse(responseText);
      limpiarTablaPorId("tablaEmpleados");
    
      $.each(data, function(i, item) {
        var nuevaFila = "<tr>";
        nuevaFila += "<td>"+data[i].nombre+"</td>";
                        
        nuevaFila +="<td><a href='#' data-id="+data[i].cedula+" class='icono eliminarEmpl'>+<span class='icon-bin2'></span></a></td>";
        nuevaFila +="<td><a href='#' class='icono'><span class='icon-pencil'></span></a></td>";
                        nuevaFila += "</tr>";

        $("#tablaEmpleados").append(nuevaFila);
      }); 
    }
  }); 
}
});