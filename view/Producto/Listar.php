<?php
    session_start();
	include_once '../../Data/DataProducto.php';
	include_once '../../Data/DataCategoria.php';
?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <?php
            if($_REQUEST["metodo"] == "shProductos"){
                $dataProducto = new DataProducto();  
                $productos = $dataProducto->getProductosBySucursal($_SESSION["idSucursal"]);

                echo "<table>";
                foreach (json_decode($productos) as $producto) {
                    echo "<tr>";
                    echo "<td><a href='".$producto->codigo."'></a>".$producto->nombre."</a></td>";
                    echo "<td>".$producto->abreviatura."</td>";
                    echo "<td>".$producto->stock."</td>";
                    echo "<td>".$producto->precio."</td>";
                    echo "<td>".$producto->tamanio."</td>";
                    echo "<td>";
                    echo "<a href='".$producto->codigo."' data-nombre='".$producto->nombre."' class='eliminarPrdct'><span class='icon-bin2'></span></a>";
                    echo "</td>";
                    echo "<td>";
                    echo "<a href='".$producto->codigo."' data-nombre='".$producto->nombre."' data-abrev='".$producto->abreviatura."' data-precio='".$producto->precio."' data-stock='".$producto->stock."' data-undm='".$producto->unidadMedida."' data-proveedor='".$producto->proveedor."' data-categoria='".$producto->idCategoria."' data-tamanio='".$producto->tamanio."' class='editarPrdct'><span class='icon-pencil'></span></a>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }else{
                $dataCategoria = new DataCategoria();
                $categorias = $dataCategoria->getCategoria($_REQUEST["id"]);
                echo "<table>";
                foreach (json_decode($categorias) as $categoria) {
                    echo "<tr>";
                    echo "<td><a href='".$categoria->id."'></a>".$categoria->nombre."</a></td>";
                    echo "<td>";
                    echo "<a href='".$categoria->id."' data-nombre='".$categoria->nombre."' class='eliminarCategoria'><span class='icon-bin2'></span></a>";
                    echo "</td>";
                    echo "<td>";
                    echo "<a href='".$categoria->id."' data-nombre='".$categoria->nombre."' class='editarCategoria'><span class='icon-pencil'></span></a>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        ?>
        <script >
        $(document).ready(function(){
            $(".eliminarCategoria").off("click");
            $(".eliminarCategoria").on("click",function(e){
                e.preventDefault();
                alert("Funciona");
                var codigo = this.getAttribute("href");
                var nombre = $(this).data("nombre");
                alertify.confirm(
                        '¿Desea eliminar la categoria '+nombre+'<span style="color:blue;"></span>?', 
                        function(){
                            eliminarCategoria(codigo);
                        }, 
                        function(){ 
                        alertify.error('Cancelado');
                });
                });
            function eliminarCategoria(codigoCategoria){
                $.ajax({
                    url:"../../Business/ControladoraCategoria.php?metodo=eliminar",
                    type:'GET',
                    data:{id:codigoCategoria},
                    success: function(responseText){
                        if(responseText > 0 ){
                            alert("Se elimino la categoria");
                        }
                        actualizarListado("shCategoria", "0");
                    }
                }); 
            }
            function actualizarListado(mostrar,id){
                $("#contenedorListas").load("../Producto/Listar.php?metodo="+mostrar+"&id="+id);
            }

            $(".editarCategoria").on("click",function(e){
                e.preventDefault();
                var codigo = this.getAttribute("href");
                $("#actualizarCategoria").text("Actualizar");
                 $("#actualizarCategoria").attr("href","update");
                 $("#idCategoria").val(this.getAttribute("href"));
                $("#nomCategoria").val($(this).data("nombre"));
                $("#formCategoria").show();
            });
            $("#actualizarCategoria").on("click",function(e){
                 e.preventDefault();
                 var nom = $("#nomCategoria").val();
                actualizarCategoria( $("#idCategoria").val(), nom);
            });
            function actualizarCategoria(codigo, nombreCat){
               $.ajax({
                    url:"../../Business/ControladoraCategoria.php?metodo=actualizar",
                    type:'GET',
                    data:{id:codigo,nombre:nombreCat},
                    success: function(responseText){
                       alert("Se actualizó el nombre de la categoria");
                       $("#nomCategoria").val("");
                       $("#formCategoria").hide();
                       $("#actualizarCategoria").attr("href","add");
                       $("#actualizarCategoria").val("Agregar");
                        actualizarListado("shCategoria", "0");
                    }
                });  
            }

            /*Administrar productos*/

            $(".eliminarPrdct").on("click",function(e){
                e.preventDefault();
                var nombre = $(this).data("nombre");
                var codigo = this.getAttribute("href");
                 alertify.confirm(
                        '¿Desea eliminar el producto '+nombre+'<span style="color:blue;"></span>?', 
                        function(){
                            eliminarProducto(codigo);
                        }, 
                        function(){ 
                        alertify.error('Cancelado');
                });
            });

            function eliminarProducto(codigoProducto){

                $.ajax({
                    url:"../../Business/ControladoraProducto.php?metodo=eliminar",
                    type:'GET',
                    data:{codigoProducto:codigoProducto},
                    success: function(responseText){
                        if(responseText > 0 ){
                            alert("Se elimino el producto");
                        }
                        actualizarListado("shProductos", document.formProducto.sucursal.value);
                    }
                }); 
            }

            $(".editarPrdct").on("click",function(e){
                e.preventDefault();
                var form = document.formProducto;
                form.codigo.value = this.getAttribute("href");
                form.nombre.value = $(this).data("nombre");
                form.abrev.value = $(this).data("abrev");
                form.stock.value = $(this).data("stock");
                form.precio.value = $(this).data("precio");
                $("#unidadMedida").val($(this).data("undm"));
                $("#proveedor").val($(this).data("proveedor"));
                $("#categoria").val($(this).data("categoria"));
                $("#tamanio").val($(this).data("tamanio"));
                $("#formProducto").show();
            });

        }); 
        </script>
    </body>
</html>
