<?php

  class Sucursal
  {
    private $cedulaJuridica;
    private $direccion;
    private $telefono;

    function __construct($cedulaJuridica, $direccion, $telefono)
    {
      $this -> cedulaJuridica = $cedulaJuridica;
      $this -> direccion = $direccion;
      $this -> telefono = $telefono;
    }

    function __toString(){

      return "<table> <tr>".
          "<td>".$this -> cedulaJuridica."</td>".
          "<td>".$this -> direccion."</td>".
          "<td>".$this -> telefono."</td>".
        "</tr> </table>";
    }

}

?>
