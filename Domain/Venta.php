<?php

    class Venta{
    
    private $codigo;
    private $idSucursal;
    private $fechaHora;
    private $idEmpleado;
    
    function __construct($codigo,$idSucursal,$fechaHora,$idEmpleado) {
        $this->$codigo = $codigo; 
        $this->$idSucursal = $idSucursal; 
        $this->$fechaHora = $fechaHora; 
        $this->$idEmpleado = $idEmpleado; 
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getIdSucursal() {
        return $this->idSucursal;
    }

    public function getFechaHora() {
        return $this->fechaHora;
    }

    public function getIdEmpleado() {
        return $this->idEmpleado;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setIdSucursal($idSucursal) {
        $this->idSucursal = $idSucursal;
    }

    public function setFechaHora($fechaHora) {
        $this->fechaHora = $fechaHora;
    }

    public function setIdEmpleado($idEmpleado) {
        $this->idEmpleado = $idEmpleado;
    }
}

?>