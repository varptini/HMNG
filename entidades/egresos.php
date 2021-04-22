<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of egresos
 *
 * @author varpt
 */
class egresos {
    public $egresosId;
    public $egresosFechaRegistro;
    
    function getEgresosid(){
         return $this->egresosId;
    }
    function getEgresosfecharegistro(){
         return $this->egresosFechaRegistro;
    }
    
    function setEgresosid($egresosid){
        $this->egresosId = $egresosid;
    }
    function setEgresofecharegistro($egresosfecharegistro){
        $this->egresosFechaRegistro = $egresosfecharegistro;
    }
    
}
