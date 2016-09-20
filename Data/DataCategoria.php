<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getCategoria(){
    $mysqli = getConnection();
    $sql = "SELECT * FROM categoria;";
    $resultado = $mysqli->query($sql);
    $vector = [];
    if ($resultado->num_rows > 0) {
        // output data of each row
        while ($row = $resultado->fetch_assoc()) {
            $categoria = new Categoria();
            $categoria->setCodigoCategoria($row['id']);
            $categoria->setNombre($row['nombre']);
            array_push($vector, $categoria);
        }
    } else {
        echo "0 results";
    }
    $mysqli->close();     
    return $vector;
}
