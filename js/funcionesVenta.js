/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var i = 0;

function duplicate2() {
    var myDiv = document.getElementById("producto0"); //Obtiene el objeto por el id
    var divPops = document.getElementById("detalle"); //Obtiene le padre del div
    var divClone = myDiv.cloneNode(true); // crea un clon profundo
    divClone.id = "producto" + ++i; // mantiene un contador para crear divs con id diferente
    divClone.style.display = '';
    divPops.appendChild(divClone); //agrega el clone al padre

    hijos = divClone.childNodes;
    for (j = 0; j < hijos.length; j++) {
        hijos[j].id = hijos[j].id + i;
    }

}

function getValueComboToInput(e) {

    var eId = e.id;
    var vector = eId.split("");
    var numero = vector[vector.length - 1];

    var combo = document.getElementById("comboProductos" + numero);
    var value = combo.options[combo.selectedIndex].value;
    var text = combo.options[combo.selectedIndex].innerHTML;
    var hidden = document.getElementById("hidden" + numero);
    var input = document.getElementById("codigoProducto" + numero);
    input.value = value;
    hidden.value = text;

}

function deleteDiv(e) {


    var eId = e.id;
    var vector = eId.split("");
    var numero = vector[vector.length - 1];
    //var divpops = document.getElementById("producto"+numero);
    //window.alert(divpops.id);
    document.getElementById("producto" + numero).remove();

}

function getPrecio(e) {
    var eId = e.id;
    var vector = eId.split("");
    var numero = vector[vector.length - 1];
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("precio" + numero).value = this.responseText;
            //window.alert('entro');
        }
    };

    xmlhttp.open("GET", "../../Data/getPrecioAjax.php?cod=" + e.value, true);
    xmlhttp.send();

    getValueComboToInput(e);
    totalLinea(e);
}

function totalLinea(e) {
    var eId = e.id;
    var vector = eId.split("");
    var numero = vector[vector.length - 1];
    var cantidad = document.getElementById("cantidad" + numero).value;
    var precio = document.getElementById("precio" + numero).value;
    var totalLinea = cantidad * precio;
    document.getElementById("total" + numero).value = totalLinea;
    sumaTotal();
}

function sumaTotal() {
    //window.alert('entro');
    var divPops = document.getElementById("detalle"); //Obtiene le padre del div
    hijos = divPops.childNodes;
    var cantidadLineas = hijos.length - 2;
    var suma = 0;
    suma = parseInt(suma);
    for (j = 1; j < cantidadLineas; j++) {
        var numero = parseInt(document.getElementById("total" + j).value);
        suma = suma + numero;
        //window.alert(document.getElementById("precio"+j).value);
    }

    document.getElementById("sumatotal").value = suma;
}


$(function(){
    $('.run').click(function(event){
        alertify.alert('this is an alert!').show();
    });
});