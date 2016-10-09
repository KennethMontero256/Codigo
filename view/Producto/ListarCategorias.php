<?php
	include_once '../../Data/DataCategoria.php';
	$dataCategoria = new DataCategoria();
	//Parametro cero para que devuelva todos los registros de ta tb-Categoria
	$respuesta = json_decode($dataCategoria->getCategoria(0));

	echo "<table>";
	echo "<tr>";
	echo "<td>Nombre</td>";
	echo utf8_decode("<td>Acción</td>");
	echo utf8_decode("<td>Acción</td>");
	echo "</tr>";
	foreach ($respuesta as $obj) {
		echo "<tr>";
		echo "<td>";
        echo $obj->nombre;
    	echo "</td>";
    	echo "<td>";
        echo "<a href='".$obj->id."'>Eliminar</a>";
    	echo "</td>";
    	echo "<td>";
        echo "<a href='".$obj->id."'>Modificar</a>";
    	echo "</td>";
    	echo "</tr>";
    }
    echo "</table>";
?>