<?php

  class Producto
  {
    private $codigoProducto;
    private $nombre;
    private $stock;
    private $precio;

    function __construct($codigoProducto, $nombre, $stock, $precio)
    {
      $this -> codigoProducto = $codigoProducto;
      $this -> nombre = $nombre;
      $this -> stock = $stock;
      $this -> precio = $precio;
    }

    function __toString(){

      return "<table> <tr>".
          "<td>".$this -> codigoProducto."</td>".
          "<td>".$this -> nombre."</td>".
          "<td>".$this -> stock."</td>".
          "<td>".$this -> precio."</td>".
        "</tr> </table>";
    }

}

?>
