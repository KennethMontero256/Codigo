
$(document).ready(function() {
    $(".012").click(function (e) {
      alert("K");
        e.preventDefault();
        listaSucursales(this.getAttribute("href"));
    });
});

function listaSucursales(accion){
  var capa = document.getElementById("contenedor");
  document.getElementById("contenedor").innerHTML = "Cargando...";
  $(capa).load("?clase=sucursalController&&accion="+accion);
}
