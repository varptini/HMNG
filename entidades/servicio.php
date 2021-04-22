<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of servicio
 *
 * @author varpt
 */
class servicio {
    //put your code here
    public $servicioId;
    public $servicioNombre;
    public $servicioDescripcion;
    
    function getServicioid(){
         return $this->servicioId;
    }
    function getServicionombre(){
         return $this->servicioNombre;
    }
    function getServiciodescripcion(){
         return $this->servicioDescripcion;
    }
    function setServicioid($servicioid){
        $this->servicioId = $servicioid;
    }
    function setServicionombre($servicionombre){
        $this->servicioNombre = $servicionombre;
    }
    function setServiciodescripcion($serviciodescripcion){
        $this->servicioDescripcion = $serviciodescripcion;
    }
}
