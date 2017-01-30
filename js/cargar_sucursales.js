$(document).ready(function(){
setInterval(mostrarSucursalesAdmin(),1000);
function mostrarSucursalesAdmin(){
    var opciones= '';
    $.ajax({
        url:'../../Business/sucursalController.php?accion=mostrarSucursales',
        type:'GET',
        data:{},
        success: function(responseText){
            var data = JSON.parse(responseText);

            $("#tablaSoloLista tbody tr").each(function (index){
                $(this).remove();
            });

            $.each(data, function(i, item) {
                var nuevaFila = "<tr id='trTbSucursal"+data[i].id+"'>";
                nuevaFila += "<td>"+data[i].nombre+"</td>";

                if(data[i].disponible == 1){
                    nuevaFila += "<td>Sucursal habilitada</td>";
                }else{
                    nuevaFila += "<td>Sucursal deshabilitada</td>";
                }
                    nuevaFila +="<td><a href='trTbSucursal"+data[i].id+"' data-id="+data[i].id+" class='icono eliminarSucur'><span class='icon-bin2'></span></a></td>";
                    //nuevaFila +="<td><a href='?clase=sucursalController&accion=formEditarSucursal&codigo="+data[i].id+"' class='icono btnEditSucr'><span class='icon-pencil'></span></a></td>";
                    nuevaFila +="<td><a href='../../Business/sucursalController.php?accion=formEditarSucursal&codigo="+data[i].id+"' class='icono btnEditSucr'><span class='icon-pencil'></span></a></td>";
                    nuevaFila += "</tr>";

                    $("#tablaSoloLista").append(nuevaFila);
               });
                agregarEventoEliminarSucursal();
                editarSucursal();
            }
        });
    }

    function agregarEventoEliminarSucursal(){
        $("a.eliminarSucur").off('click');
        $("a.eliminarSucur").on('click', function(e) {
            var id = $(this).attr("data-id");
            e.preventDefault();
            alertify.confirm(
                '¿Desea eliminar la sucursal?',
                function(){
                    eliminarSucursal(id);
                },
                function(){
                alertify.error('Cancelado')
            });
        });
    }

    function eliminarSucursal(idSucursal){

         $.ajax({
            url:'../../Business/sucursalController.php?accion=borrarSucursal',
            type:'GET',
            data:{idSucursal:idSucursal},
            success: function(responseText){
                if(responseText>0){
                    alertify.success("Eliminada");
                }
                mostrarSucursalesAdmin();
            }
        });
    }
/*
    function editarSucursal(){
    $(".btnEditSucr").off('click');
    $(".btnEditSucr").on('click', function(e) {
        e.preventDefault();
          alert("editarSm.,m.,m.,mucursal");
        formEditarSucursal();
    });
}

function formEditarSucursal(){

  alert("formEditarSucursal");
  var dataForm = 'codigo=79&nombre=null';
    $.ajax({
      url: '../../Business/sucursalController.php?accion=editarSucursal',
      type: 'POST',
    data: dataForm,
    success: function(data) {
    alert(data);
    },
    error: function(){
    alert('Error en cargar_sucursales.js!');
    }
    });
  }*/

    function listaSucursales(accion){
        var capa = document.getElementById("contenedor");
        document.getElementById("contenedor").innerHTML = "Cargando...";
        $(capa).load("?clase=sucursalController&&accion="+accion);
    }

});
