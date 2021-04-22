<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of insumodescripcion
 *
 * @author varpt
 */
class insumodescripcion {
    public $insumodescripcionid;
    public $insumodescripcioncodigobarras;
    public $insumodescripcionfecharegistro;
    public $insumodescripcionfechacaducidad;
    public $insumoid;


    
    function getInsumodescripcionid() {
        return $this->insumodescripcionid;
    }
    function getInsumodescripcioncodigobarras() {
        return $this->insumodescripcioncodigobarras;
    }
    
    function getInsumodescripcionfecharegistro() {
        return $this->insumodescripcionfecharegistro;
    }
     
    function getInsumodescripcionfechacaducidad() {
        return $this->insumodescripcionfechacaducidad;
    }
    function getInsumoid() {
        return $this->insumoid;
    }
    

    
    function setInsumodescripcionid($insumodescripcionid) {
        return $this->insumodescripcionid=$insumodescripcionid;
    }
    function setInsumodescripcioncodigobarras($insumodescripcioncodigobarras) {
        return $this->insumodescripcioncodigobarras=$insumodescripcioncodigobarras;
    }
    
    function setInsumodescripcionfecharegistro($insumodescripcionfecharegistro) {
        return $this->insumodescripcionfecharegistro=$insumodescripcionfecharegistro;
    }
     
    function setInsumodescripcionfechacaducidad($insumodescripcionfechacaducidad) {
        return $this->insumodescripcionfechacaducidad=$insumodescripcionfechacaducidad;
    }
    function setInsumoid($insumoid) {
        $this->insumoid = $insumoid;
    }
}
