<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LineaVenta{
    
    private $idDetalle;
    private $codigoVenta;
    private $idSucursal;
    private $codigoProducto;
    private $cantidad;
    private $totalLinea;
    
    function __construct() {
        
    }

    function getIdDetalle() {
        return $this->idDetalle;
    }

    function getCodigoVenta() {
        return $this->codigoVenta;
    }

    function getIdSucursal() {
        return $this->idSucursal;
    }

    function getCodigoProducto() {
        return $this->codigoProducto;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getTotalLinea() {
        return $this->totalLinea;
    }

    function setIdDetalle($idDetalle) {
        $this->idDetalle = $idDetalle;
    }

    function setCodigoVenta($codigoVenta) {
        $this->codigoVenta = $codigoVenta;
    }

    function setIdSucursal($idSucursal) {
        $this->idSucursal = $idSucursal;
    }

    function setCodigoProducto($codigoProducto) {
        $this->codigoProducto = $codigoProducto;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setTotalLinea($totalLinea) {
        $this->totalLinea = $totalLinea;
    }


}