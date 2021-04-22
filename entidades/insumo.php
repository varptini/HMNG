<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of insumo
 *
 * @author varpt
 */
class insumo {
    public $insumoid;
    public $insumonombrecomercial;
    public $insumonombregenerico;
    public $insumodescripcion;
    public $insumounidadmedida;
    public $insumocantidadminima;
    public $insumoexistencia;
    public $idalmacen;

    function getInsumoid() {
        return $this->insumoid;
    }

    function getInsumonombrecomercial() {
        return $this->insumonombrecomercial;
    }
    
    function getInsumonombregenerico() {
        return $this->insumonombregenerico;
    }
    function getInsumodescripcion() {
        return $this->insumodescripcion;
    }
    
    function getInsumounidadmedida() {
        return $this->insumounidadmedida;
    }

    function getInsumocantidadminima() {
        return $this->insumocantidadminima;
    }

    function getInsumoexistencia() {
        return $this->insumoexistencia; ;
    }
    function getIdalmacen() {
        return $this->idalmacen; ;
    }

    

    function setInsumoid($insumoid) {
        $this->insumoid = $insumoid;
    }

    function setInsumonombrecomercial($insumonombrecomercial) {
        $this->insumonombrecomercial = $insumonombrecomercial;
    }
    
    function setInsumonombregenerico($insumonombregenerico) {
        $this->insumonombregenerico = $insumonombregenerico;
    }

    function setInsumodescripcion($insumodescripcion) {
        $this->insumodescripcion = $insumodescripcion;
    }
    function setInsumounidadmedida($insumounidadmedida) {
        $this->insumounidadmedida = $insumounidadmedida;
    }

    function setInsumocantidadminima($insumocantidadminima) {
        $this->insumocantidadminima = $insumocantidadminima;
    }

    function setInsumoexistencia($insumoexistencia) {
        $this->insumoexistencia = $insumoexistencia; ;
    }
    function setIdalmacen($idalmacen) {
        $this->idalmacen = $idalmacen; ;
    }
    
}
