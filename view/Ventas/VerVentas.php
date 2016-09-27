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
        
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </body>
    
    <div id="tabla">
        <table  class="table table-hover">
            <thead>
                <tr class="header">
                    <th>codigo</th>
                    <th>Sucursal</th>
                    <th>Fecha</th>
                    <th>Empleado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < count($ventas); $i++) {
                    echo "<tr id=".$ventas[$i]->getCodigo().">";
                    echo "<td>" . $ventas[$i]->getCodigo() . "</td>";
                    echo "<td>" . $ventas[$i]->getIdSucursal() . "</td>";
                    echo "<td>" . $ventas[$i]->getFechaHora() . "</td>";
                    echo "<td>" . $ventas[$i]->getIdEmpleado() . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</html>
