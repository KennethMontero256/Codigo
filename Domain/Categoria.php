<?php

  class Categoria
  {
    private $codigoCategoria;
    private $nombre;
    private $unidadMedida;

    
    
    function __constructLleno($codigoCategoria, $nombre, $unidadMedida)
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
    
    function ejemplo(){
        
    }
    
    function __construct() {
        
    }

    function getCodigoCategoria() {
        return $this->codigoCategoria;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getUnidadMedida() {
        return $this->unidadMedida;
    }

    function setCodigoCategoria($codigoCategoria) {
        $this->codigoCategoria = $codigoCategoria;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setUnidadMedida($unidadMedida) {
        $this->unidadMedida = $unidadMedida;
    }


    
    

}

?>
