<?php


  class Proveedor
  {
    private $cedulaProveedor;
    private $nombre;
    private $telefono;
    private $productos; //Este debe contener una lista de productos

    function __construct($cedulaProveedor, $nombre, $telefono, $productos)
    {
      $this -> cedulaProveedor = $cedulaProveedor;
      $this -> nombre = $nombre;
      $this -> telefono = $telefono;
      $this -> productos = $productos;
    }

    function __toString(){

      return "<table> <tr>".
          "<td>".$this -> cedulaProveedor."</td>".
          "<td>".$this -> nombre."</td>".
          "<td>".$this -> telefono."</td>".
          "<td>".$this -> productos."</td>".
        "</tr> </table>";
    }

}

?>
