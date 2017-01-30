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
      var sucursal = "";
      var cont = 0;

      $.each(data, function(i, item) {
        sucursal = data[i].nombreSucursal;
        if(data[i].nombreSucursal == "z"){
          sucursal = "Sucursal no definida."
        }
        var nuevaFila = "<tr>";

        if(cont == 0){
          nuevaFila += "<td colspan='2'>"+sucursal+"</td><td></td><td></td>";
          cont ++;
        }else{
          if(data[i-1].nombreSucursal != data[i].nombreSucursal){
            nuevaFila += "<td>"+sucursal+"</td><td></td><td></td>";
          }
        }
        nuevaFila += "</tr>";
        $("#tablaEmpleados").append(nuevaFila);
        nuevaFila = "<tr>";
        nuevaFila +="<td><a href='' class='linkMostrarEmpleado' data-id='"+data[i].cedula+"'>"+data[i].nombre+"</a></td>";
        nuevaFila +="<td><a href='"+data[i].nombre+"' data-id='"+data[i].cedula+"' class='icono eliminarEmpl'><span class='icon-bin2'></span></a></td>";
        nuevaFila +="<td><a href='#' data-id='"+data[i].cedula+"' data-nombre='"+data[i].nombre+"' data-telefono='"+data[i].telefono+"' data-sucursal='"+data[i].idSucursal+"' data-habilitado='"+data[i].habilitado+"' class='icono btnEditEmpleado'><span class='icon-pencil'></span></a></td>";
        nuevaFila += "</tr>";
        $("#tablaEmpleados").append(nuevaFila);
      });
      /*Se redefinen los metodos para que se reflejen los 
        cambios en el DOM
      */
      agregarEventoEliminarEmpleado(); 
      editarEmpleado();
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
      $("a.linkMostrarEmpleado").off('click');
        $("a.linkMostrarEmpleado").on('click', function(e) {
             e.preventDefault();
            var id = $(this).attr("data-id");
            cargar_pagina("#contentTablaEmpleados", "../administracion/mostrar_empleados.php?cedula="+id);
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
    function cargar_pagina(lugarACargar,nombrePagina){
    $(lugarACargar).load(nombrePagina);
    $(lugarACargar).fadeIn(1000);
  }

  function editarEmpleado(){
    $("a.btnEditEmpleado").off('click');
    $("a.btnEditEmpleado").on("click",function(e){
      e.preventDefault();
      llenarSelectSucursal(this);
      $(".bRegEmpleado").attr("href", "frmEditEmpleado");
    });
  }

  function cargarFormEditEmpleado(obj){
    var form = document.frmAddEmpleado;

    $(".bRegEmpleado").text("Actualizar");
    form.cedula.value = $(obj).attr("data-id");
    form.nombreEmpl.value = $(obj).attr("data-nombre");
    form.telf.value = $(obj).attr("data-telefono");
    form.selectSucursal.value = $(obj).attr("data-sucursal");
    form.emplHabl.checked = ($(obj).attr("data-habilitado") == 1)?true:false;

    mostr_ocultr("frmAddEmpleado");
  }

  function mostr_ocultr(id){
        if ( $("#"+id).is(":visible")){
             $("#"+id).hide('slow');
           
        }else{
            $("#"+id).show('slow');
        }
    }

  function llenarSelectSucursal(obj){
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
                cargarFormEditEmpleado(obj);
            }
        });
    } 
});