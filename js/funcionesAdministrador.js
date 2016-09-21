
$(document).ready(function() {
    $(".012").click(function (e) {
      alert("");
      e.preventDefault();
      listaSucursales(this.getAttribute("href"));
    });
    $(".btnEditSucr").click(function (e) {
      e.preventDefault();
      editarSucursal(this.getAttribute("href"));
    });
});

function listaSucursales(accion){
  var capa = document.getElementById("contenedor");
  document.getElementById("contenedor").innerHTML = "Cargando...";
  $(capa).load("?clase=sucursalController&&accion="+accion);
}

function editarSucursal(accion){
  var capa = document.getElementById("contenedorLista");
  document.getElementById("contenedorLista").innerHTML = "Cargando...";
  $(capa).load("?clase=sucursalController&&accion="+accion);
}
