<?php

  class Categoria
  {
    private $codigoCategoria;
    private $nombre;
    private $unidadMedida;

    function __construct($codigoCategoria, $nombre, $unidadMedida)
    {
      $this -> codigoCategoria = $codigoCategoria;
      $this -> nombre = $nombre;
      $this -> unidadMedida = $unidadMedida;
    }

    function __toString(){

      return "<table> <tr>".
          "<td>".$this -> codigoCategoria."</td>".
          "<td>".$this -> nombre."</td>".
          "<td>".$this -> unidadMedida."</td>".
        "</tr> </table>";
    }

}

?>
