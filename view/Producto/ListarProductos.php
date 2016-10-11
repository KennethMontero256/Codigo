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
            echo $_REQUEST["metodo"];
            echo $_SESSION["idSucursal"];
            if($_REQUEST["metodo"] == "shProductos"){
                $dataProducto = new DataProducto();  
                $productos = $dataProducto->getProductosBySucursal($_SESSION["idSucursal"]);

                echo "<table>";
                foreach (json_decode($productos) as $producto) {
                    echo "<tr>";
                    echo "<td><a href='".$producto->getCodigoProducto()."'></a>".$producto->getNombre() ."</a></td>";
                    echo "<td>".$producto->getAbreviatura()."</td>";
                    echo "<td>".$producto->getStock()."</td>";
                    echo "<td>".$producto->getPrecio()."</td>";
                    echo "<td>".$producto->getTamanio()."</td>";
                    echo "<td>";
                    echo "<a href='".$producto->getCodigoProducto()."'><span class='icon-bin2'></span></a>";
                    echo "</td>";
                    echo "<td>";
                    echo "<a href='".$producto->getCodigoProducto()."'><span class='icon-pencil'></span></a>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }else{
                
            }
        ?>
    </body>
</html>