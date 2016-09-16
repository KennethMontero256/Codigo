<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Venta{
    
    private $codigo;
    private $idSucursal;
    private $fechaHora;
    private $idEmpleado;
    
    function __construct() {
        
    }
    function getCodigo() {
        return $this->codigo;
    }

    function getIdSucursal() {
        return $this->idSucursal;
    }

    function getFechaHora() {
        return $this->fechaHora;
    }

    function getIdEmpleado() {
        return $this->idEmpleado;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setIdSucursal($idSucursal) {
        $this->idSucursal = $idSucursal;
    }

    function setFechaHora($fechaHora) {
        $this->fechaHora = $fechaHora;
    }

    function setIdEmpleado($idEmpleado) {
        $this->idEmpleado = $idEmpleado;
    }


}