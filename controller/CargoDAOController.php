<?php
include '../model/CargoDAO.php';

class CargoDAOController{
    
    function insertarCargo($NombreCargo,$DescripcionCargo){
         $obj = new cargoDAO();
         return $obj->insertarCargo($NombreCargo,$DescripcionCargo);
     }
     
     function validarCargoExiste($NombreCargo){
         $obj = new cargoDAO();
         return $obj->validarCargoExiste($NombreCargo);
    }
    function validarCargoAsignadoUsuario($Cargoid){
         $obj = new cargoDAO();
         return $obj->validarCargoAsignadoUsuario($Cargoid);
     }
     
     function eliminarCargo($Cargoid){
          $obj = new cargoDAO();
         return $obj->eliminarCargo($Cargoid);
     }
     function actualizarCargo($id,$nombre,$descripcion){
          $obj = new cargoDAO();
         return $obj->actualizarCargo($id,$nombre,$descripcion);
     }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

