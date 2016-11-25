
$(document).ready(function() {
    $(".012").click(function (e) {

      e.preventDefault();
      listaSucursales(this.getAttribute("href"));
    });

    $(".btnFormEditSucr").click(function (e) {
      e.preventDefault();
      editarSucursal(this.getAttribute("href"));
    });

    $(".editarSucursal").click(function (e) {
      e.preventDefault();
      editarSucursal(this.getAttribute("href"));
    });

});

function listaSucursales(accion){
  var capa = document.getElementById("contenedor");
  document.getElementById("contenedor").innerHTML = "Cargando...";
  $(capa).load("?clase=sucursalController&&accion="+accion);
}

function formEditarSucursal(accion){
  var capa = document.getElementById("contenedorLista");
  document.getElementById("contenedorLista").innerHTML = "Cargando...";
  $(capa).load("?clase=sucursalController&accion="+accion);

}

function editarSucursal(codigo){

    var codigoForm=document.getElementsByName("codigo")[0].value;
    var nombreForm=document.getElementsByName("nombre")[0].value;
    var direccionForm=document.getElementsByName("direccion")[0].value;
    var telefonoForm=document.getElementsByName("telefono")[0].value;

    $.ajax({

      url: '../Business/sucursalController.php?accion=editarSucursal',
      type: 'POST',
      data: {codigo:codigoForm, nombre:nombreForm, direccion:direccionForm, telefono:telefonoForm},

      success: function(data) {
        alert("Modificado!");
        location.href="../view/administracion/pagina_inicio.php";
      },
      error: function(){
        alert('Error en cargar_sucursales.js!');
      }
    });
      //
}
