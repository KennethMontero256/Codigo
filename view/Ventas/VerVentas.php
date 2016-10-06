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
        <script type="text/javascript" src="../../js/jquery-3.1.0.js"></script>
        <script type="text/javascript" src="../../js/ejemAlertify.js"></script>
        <script type="text/javascript" src="../../js/alertify/alertify.js"></script>
        <link rel="stylesheet" href="../../js/alertify/css/alertify.css">
        <link rel="stylesheet" href="../../js/alertify/css/themes/default.css">
        <script type="text/javascript" src="../../js/verVentas.js"></script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Busqueda facturas</h2>
                <div id="custom-search-input">
                    <div class="input-group col-md-12">
                        <input type="text" class="form-control input-lg" placeholder="Buscar" />
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-lg" type="button">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    <div id="tabla" class="container">
        <table  class="table table-hover">
            <thead>
                <tr class="header">
                    <th>codigo</th>
                    <th>Sucursal</th>
                    <th>Fecha</th>
                    <th>Empleado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < count($ventas); $i++) {
                    echo "<tr id=linea".$i.">";
                    echo "<td id='codigo'>" . $ventas[$i]->getCodigo() . "</td>";
                    echo "<td id='sucursal'>" . $ventas[$i]->getIdSucursal() . "</td>";
                    echo "<td id='fecha'>" . $ventas[$i]->getFechaHora() . "</td>";
                    echo "<td id='empleado'>" . $ventas[$i]->getIdEmpleado() . "</td>";
                    echo "<td><input type='button' value='Borrar' id='borrar".$ventas[$i]->getCodigo()."' onclick='borrar(this)' > <input type='button' value='Modificar'></td>";
                    //echo "<td id='bModificar'><input type='button' value='Modificar'></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</html>
