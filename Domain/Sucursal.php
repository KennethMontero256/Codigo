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

    function Delete() {
        $this->id = intval($_POST['id']);
        $query = "DELETE FROM foros WHERE id='$this->id';";
        $query .= "DELETE FROM temas WHERE id_foro='$this->id';";
        $this->db->multi_query($query);
        header('location: ?view=configforos&success=true');
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
