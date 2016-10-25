$(document).ready(function () {
    function getVentasPorFecha(idSucursal, fecha) {
        $.ajax({
            url: '../../Business/ControladoraVenta.php?metodo=getVentasPorFecha',
            type: 'GET',
            data: {idSucursal: idSucursal, fecha: fecha},
            success: function (responseText) {
                var ventas = JSON.parse(responseText);
                alert(ventas);
            }
        });
    }
    
    $('#boton').click(function(){
        var idSucursal = $('#codigo').val();
        var fecha = $('#fecha').val();
        $.ajax({
            url: '../../Business/ControladoraVenta.php?metodo=getVentasPorFecha',
            type: 'GET',
            data: {idSucursal: idSucursal, fecha: fecha},
            success: function (responseText) {
                alert(responseText);
                var ventas = JSON.parse(responseText);
                alert(ventas);
            }
        });
    })
});