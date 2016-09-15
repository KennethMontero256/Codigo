
$(document).ready(function() {
    $(".sucursales").click(function (e) {

        e.preventDefault();
        listaSucursales();
    });
});

function listaSucursales(){
  var capa = document.getElementById("contenedor");
  document.getElementById("contenedor").innerHTML = "Cargando...";
  $(capa).load("?clase=sucursalController");
}
