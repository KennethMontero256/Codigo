<?php

  class Producto
  {
    private $codigoProducto;
    private $nombre;
    private $stock;
    private $precio;

    function __constructLleno($codigoProducto, $nombre, $stock, $precio)
    {
      $this -> codigoProducto = $codigoProducto;
      $this -> nombre = $nombre;
      $this -> stock = $stock;
      $this -> precio = $precio;
    }
    
    
    function __construct(){
        
    }

    function __toString(){

      return "<table> <tr>".
          "<td>".$this -> codigoProducto."</td>".
          "<td>".$this -> nombre."</td>".
          "<td>".$this -> stock."</td>".
          "<td>".$this -> precio."</td>".
        "</tr> </table>";
    }

    
    
    function getCodigoProducto() {
        return $this->codigoProducto;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getStock() {
        return $this->stock;
    }

    function getPrecio() {
        return $this->precio;
    }

    function setCodigoProducto($codigoProducto) {
        $this->codigoProducto = $codigoProducto;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setStock($stock) {
        $this->stock = $stock;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }


}

?>