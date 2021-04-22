<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of almacen
 *
 * @author varpt
 */
class almacen {
    
    public $almacenId;
    public $almacenNombre;
    public $almacenDireccion;
    public $almacenEmail;
    public $almacenTelefono;
    public $almacenEncargado;
    
    function getAlmacenid(){
         return $this->almacenId;
    }
    function getAlmacennombre(){
         return $this->almacenNombre;
    }
    function getAlmacendireccion(){
         return $this->almacenDireccion;
    }
    function getAlmacenemail(){
         return $this->almacenEmail;
    }
    function getAlmacentelefono(){
         return $this->almacenTelefono;
    }
    function getAlmacenencargado(){
         return $this->almacenEncargado;
    }
    
    
    function setAlmacenid($almacenid){
        $this->almacenId = $almacenid;
    } 
    function setAlmacennombre($almacennombre){
        $this->almacenNombre = $almacennombre;
    } 
    function setAlmacendireccion($almacendireccion){
        $this->almacenDireccion = $almacendireccion;
    } 
    function setAlmacenemail($almacenemail){
        $this->almacenEmail = $almacenemail;
    } 
    function setAlmacentelefono($almacentelefono){
        $this->almacenTelefono = $almacentelefono;
    } 
    function setAlmacenencargado($almacenencargado){
        $this->almacenEncargado = $almacenencargado;
    } 
}
