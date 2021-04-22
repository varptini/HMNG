<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of egresosdescripcion
 *
 * @author varpt
 */
class egresosdescripcion {
    public $egresosDescripcionId;
    public $egresosDescripcionCantidad;
    
    function getEgresosdescripcionid(){
         return $this->egresosDescripcionId;
    }
    function getEgresosdescripcioncantidad(){
         return $this->egresosFechaRegistro;
    }
    
    function setEgresosdescripcionid($egresosDescripcionId){
        $this->egresosDescripcionId = $egresosDescripcionId;
    }
    function setEgresosdescripcioncantidad($egresosDescripcionCantidad){
        $this->egresosDescripcionCantidad = $egresosDescripcionCantidad;
    }
}
