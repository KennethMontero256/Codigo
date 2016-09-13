<?php


  class Empleado
  {
    var $cedulaEmpleado;
    var $nombre;
    var $telefono;

    function __construct($cedulaEmpleado, $nombre, $telefono)
    {
      $this -> cedulaEmpleado = $cedulaEmpleado;
      $this -> nombre = $nombre;
      $this -> telefono = $telefono;
    }
    
    function __construc(){
        
    }

    public function __set($atributo, $valor) {
     if (property_exists(__CLASS__, $atributo)) {
       $this->$atributo = $valor;
     } else {
       echo $atributo;
     }
   }

   public function __get($atributo) {
     if (property_exists(__CLASS__, $atributo)) {
       return $this->$atributo;
     }else {
       return NULL;
     }
   }
   //
    function __toString(){

      return "<table> <tr>".
          "<td>".$this -> cedulaEmpleado."</td>".
          "<td>".$this -> nombre."</td>".
          "<td>".$this -> telefono."</td>".
        "</tr> </table>";
    }
    
    function getCedulaEmpleado() {
        return $this->cedulaEmpleado;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function setCedulaEmpleado($cedulaEmpleado) {
        $this->cedulaEmpleado = $cedulaEmpleado;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }



}

?>
