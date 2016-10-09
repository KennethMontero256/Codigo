<?php
	include_once '../../Data/DataProducto.php';
	$productos = getProductos();
	echo "<table>";
	for ($i=0; $i<count($productos); $i++) {
		echo "<tr>";
		echo "<td>".$productos[$i]->getCodigo()."</td>";
    	echo "<td>".$productos[$i]->."</td>";
    	echo "<td>".$productos[$i]->."</td>";
    	echo "<td>".$productos[$i]->."</td>";
    	echo "<td>".$productos[$i]->."</td>";
    	echo "<td>";
        echo "<a href='".$obj->id."'>Eliminar</a>";
    	echo "</td>";
    	echo "<td>";
        echo "<a href='".$obj->id."'>Modificar</a>";
    	echo "</td>";
    	echo "</tr>";
        echo '<option value="' . $proveedor[$i]->getCedulaProveedor() . '">' . $proveedor[$i]->getNombre() . '</option>';
    }

?>