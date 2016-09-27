<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once '../../Data/DataVenta.php';
        include_once '../../Domain/Venta.php';
        
        $ventas = getVentas();
        //var_dump($ventas);
        ?>
    </body>
    
    <div id="tabla">
        <table class="striped">
            <tr class="header">
                <td>codigo</td>
                <td>Sucursal</td>
                <td>Fecha</td>
                <td>Empleado</td>
            </t r>
            <?php
            
            for ($i = 0; $i < count($ventas); $i++) {
                echo "<tr id=".$ventas[$i]->getCodigo()." onclick=>";
                echo "<td>" . $ventas[$i]->getCodigo() . "</td>";
                echo "<td>" . $ventas[$i]->getIdSucursal() . "</td>";
                echo "<td>" . $ventas[$i]->getFechaHora() . "</td>";
                echo "<td>" . $ventas[$i]->getIdEmpleado() . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</html>
