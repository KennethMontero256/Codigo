
$(document).ready(function() {
    $("a.sucursales").click(function (e) {

        e.preventDefault();
        listaSucursales();
    });
});

function listaSucursales(){

  var capa = document.getElementById("contenedor");
  document.getElementById("contenedor").innerHTML = "Lista Sucursales";
  $(capa).load("?clase=sucursalController");//
}
