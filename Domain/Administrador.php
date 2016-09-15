<?php


  class Administrador
  {
    private $idAdmin;
    private $nombre;

    function __construct($idAdmin, $nombre)
    {
      $this -> idAdmin = $idAdmin;
      $this -> nombre = $nombre;
    }

    function __toString(){

      return "<table> <tr>".
          "<td>".$this -> idAdmin."</td>".
          "<td>".$this -> nombre."</td>".
        "</tr> </table>";
    }

}

?>
