<html>
    <head>
        <?php
            include_once '../../core/Data/DataProducto.php';
            $productos= getProductos();
            
        ?>
    </head>
    
    <body>
        
       <script>   
                        var i = 0;

function duplicate2(){
    var myDiv = document.getElementById("producto0"); //Obtiene el objeto por el id
    var divPops = document.getElementById("detalle"); //Obtiene le padre del div
    var divClone = myDiv.cloneNode(true); // crea un clon profundo
    divClone.id = "producto" + ++i; // mantiene un contador para crear divs con id diferente
    divPops.appendChild(divClone); //agrega el clone al padre
    
    hijos = divClone.childNodes;
    for (j = 0; j < hijos.length; j++) { 
        hijos[j].id = hijos[j].id + i; 
    }
    
}

function getValueComboToInput(){
    var combo = document.getElementById("comboSucursal");
    var value = combo.options[combo.selectedIndex].value;
    var input = document.getElementById("codigoProducto");
    input.value = value;
    
}

function deleteDiv(e){
    
    
    var eId = e.id;
    var vector = eId.split("");
    var numero = vector[vector.length-1];
    //var divpops = document.getElementById("producto"+numero);
    //window.alert(divpops.id);
    document.getElementById("producto"+numero).remove();
    
}

function delete_row(e)
{
    e.parentNode.removeChild(e.parentNode);
}


            </script> 
        <form method="post" action="../../core/Business/ProductoControlador.php">
 
<!-
            
            <div id="contenedorProducto">

            <div id="informacionProducto">

                <label>codigo:</label>
                <input id="codigo" type="text" value="<?php print_r($totalventas); ?>" readonly> 

                <label>Sucursal:</label>
                  <select id="comboSucursal" onclick="getValueComboToInput()">
                        <ul>
                            <?php
                            for ($i = 0; $i < count($productos); $i++) {
                                echo '<option value="' . $productos[$i]->getCodigoProducto() . '">' . $productos[$i]->getSucursal() . '</option>';
                            }
                            ?>
                        </ul>
                    </select>

                <label>Fecha y hora</label>
                <input type="datetime" value="<?php echo $d . ' ' . $m . ' ' . $y ?>" readonly>

             

            </div>

          
            
            
            <div id="detalle">
                <div id="producto0">

                    <label id="lbCod">Codigo producto:</label>
                    <input id="codigo" type="text" value="" id="codigoProducto">
                    
                    <label id="lbnombre">Nombre producto:</label>
                    <input id="nombre" type="text">
                  
                    
                    <label id="lbCantidad">Cantidad</label>
                    <input id="cantdad" type="number">
                    
                 
                    
                    <input id="delete" type="button" value="X" onclick="deleteDiv(this)">
                </div>
                
                
            </div>
            <input type="button" onclick="duplicate2()">
        </div>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
            
        </form>
        
    </body>
    
</html>
    
    