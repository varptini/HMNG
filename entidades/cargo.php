<?php

class cargo{
    
    public $cargoId;
    public $cargoNombre;
    public $cargoDescripcion;
    
    function getCargoid(){
         return $this->cargoId;
    }
    function getCargonombre(){
         return $this->cargoNombre;
    }
    function getCargodescripcion(){
         return $this->cargoDescripcion;
    }
    function setCargoid($cargoid){
        $this->cargoId = $cargoid;
    }
    function setCargonombre($cargonombre){
        $this->cargoNombre = $cargonombre;
    }
    function setCargodescripcion($cargodescripcion){
        $this->cargoDescripcion = $cargodescripcion;
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

