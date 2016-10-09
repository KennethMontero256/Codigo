<?php

  class Producto
  {
    private $codigo;
    private $nombre;
    private $stock;
    private $precio;
    private $unidadMedida;
    private $proveedor;
    private $idSucursal;
    private $idCategoria;
    private $abreviatura;

    function __constructLleno($codigo, $nombre, $stock, $precio)
    {
      $this -> codigo = $codigo;
      $this -> nombre = $nombre;
      $this -> stock = $stock;
      $this -> precio = $precio;
    }
    
    
    function __construct(){
        
    }

    function __toString(){

      return "<table> <tr>".
          "<td>".$this -> codigo."</td>".
          "<td>".$this -> nombre."</td>".
          "<td>".$this -> stock."</td>".
          "<td>".$this -> precio."</td>".
        "</tr> </table>";
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getUnidadMedida() {
        return $this->unidadMedida;
    }

    function getProveedor() {
        return $this->proveedor;
    }

    function getIdSucursal() {
        return $this->idSucursal;
    }

    function getIdCategoria() {
        return $this->idCategoria;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setUnidadMedida($unidadMedida) {
        $this->unidadMedida = $unidadMedida;
    }

    function setProveedor($proveedor) {
        $this->proveedor = $proveedor;
    }

    function setIdSucursal($idSucursal) {
        $this->idSucursal = $idSucursal;
    }

    function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

        
    function getCodigoProducto() {
        return $this->codigo;
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

    function setCodigoProducto($codigo) {
        $this->codigo = $codigo;
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
    function setAbreviatura($abreviatura){
        $this->abreviatura=$abreviatura;
    }
    function getAbreviatura(){
        return $this->abreviatura;
    }

}

?>
