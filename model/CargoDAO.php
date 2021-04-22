<?php
include '../entidades/cargo.php';
include '../db/accesoHMNG.php';

class cargoDAO{
    
    function insertarCargo($NombreCargo,$DescripcionCargo){
       
        $pdo = AcessoDB::getConnectionPDO();
        
        $cargo = new cargo();
        $cargo->cargoNombre=$NombreCargo;
        $cargo->cargoDescripcion=$DescripcionCargo;

        

        $sql = "INSERT INTO rol (RolNombre, RolDescripcion) VALUES('".$cargo->cargoNombre."', '".$cargo->cargoDescripcion."')";
        $stmt = $pdo->prepare($sql);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
    }
    
    function validarCargoExiste($NombreCargo){
        $pdo = AcessoDB::getConnectionPDO();
        
        $cargo = new cargo();
        $cargo->cargoNombre=$NombreCargo;
        
        $sql = "SELECT * FROM rol WHERE RolNombre='".$cargo->cargoNombre."'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $fila = $stmt->rowCount();
        
        if($fila > 0){
            return true;
        }else{
            return false;
        }  
    }
    function validarCargoAsignadoUsuario($Cargoid){
        $pdo = AcessoDB::getConnectionPDO();
        
        $cargo = new cargo();
        $cargo->cargoId=$Cargoid;
        
        $sql = "SELECT * FROM usuario WHERE Rol_idRol='".$cargo->cargoId."'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $fila = $stmt->rowCount();
        
        if($fila > 0){
            return true;
        }else{
            return false;
        }  
    }
    function eliminarCargo($Cargoid){
        $pdo = AcessoDB::getConnectionPDO();
        
        $cargo = new cargo();
        $cargo->cargoId=$Cargoid;
        
        $sql = "DELETE FROM rol WHERE idRol='".$cargo->cargoId."'";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        } 
    }
    function actualizarCargo($IdCargo,$NombreCargo,$DescripcionCargo){
       
        $pdo = AcessoDB::getConnectionPDO();
        
        $cargo = new cargo();
        $cargo->cargoId=$IdCargo;
        $cargo->cargoNombre=$NombreCargo;
        $cargo->cargoDescripcion=$DescripcionCargo;

        
        $sql = "UPDATE rol SET "
                . "idRol =".$cargo->cargoId.","
                . "RolNombre = '".$cargo->cargoNombre."',"
                . "RolDescripcion = '".$cargo->cargoDescripcion."'"
                . "WHERE "
                . "idRol =".$cargo->cargoId."";
        $stmt = $pdo->prepare($sql);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
    }
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

