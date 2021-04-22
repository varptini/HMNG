<?php
include '../entidades/almacen.php';
include '../db/accesoHMNG.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AlmacenDAO
 *
 * @author varpt
 */
class AlmacenDAO {
    //put your code here
    
    function insertarAlmacen($almacennombre, $almacendireccion,$almacenemail, $almacentelefono, $almacenencargado){
       
        $pdo = AcessoDB::getConnectionPDO();
        
        $almacen = new almacen();
        $almacen->almacenNombre=$almacennombre;
        $almacen->almacenDireccion=$almacendireccion;
        $almacen->almacenEmail=$almacenemail;
        $almacen->almacenTelefono=$almacentelefono;
        $almacen->almacenEncargado=$almacenencargado;
        
 
        
        

        $sql = "INSERT INTO almacen (AlmacenNombre, AlmacenDireccion, AlmacenEmail, AlmacenTelefono, AlmacenEncargado) VALUES('"
                .$almacen->almacenNombre."', '"
                .$almacen->almacenDireccion."', '"
                .$almacen->almacenEmail."', '"
                .$almacen->almacenTelefono."', '"
                .$almacen->almacenEncargado."')";
        $stmt = $pdo->prepare($sql);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
    }
    
    function validarAlmacenExiste($almacennombre){
        $pdo = AcessoDB::getConnectionPDO();
        
        $almacen = new almacen();
        $almacen->almacenNombre=$almacennombre;
        
        $sql = "SELECT * FROM almacen WHERE AlmacenNombre='".$almacen->almacenNombre."'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $fila = $stmt->rowCount();
        
        if($fila > 0){
            return true;
        }else{
            return false;
        }  
    }
    function validarAlmacenAsignadoInsumo($IdAlamcen){
        $pdo = AcessoDB::getConnectionPDO();
        
        $almacen = new almacen();
        $almacen->almacenId=$IdAlamcen;
        
        $sql = "SELECT * FROM insumos WHERE Almacen_idAlmacen ='".$almacen->almacenId."'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $fila = $stmt->rowCount();
        
        if($fila > 0){
            return true;
        }else{
            return false;
        }  
    }
    
    function eliminarAlmacen($IdAlamcen){
        $pdo = AcessoDB::getConnectionPDO();
        
        $almacen = new almacen();
        $almacen->almacenId=$IdAlamcen;
        
        $sql = "DELETE FROM almacen WHERE idAlmacen ='".$almacen->almacenId."'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $fila = $stmt->rowCount();
        
        if($fila > 0){
            return true;
        }else{
            return false;
        }  
    }
    function actualizarAlmacen($idAlmacen,$almacennombre, $almacendireccion,$almacenemail, $almacentelefono, $almacenencargado){
        
        $pdo = AcessoDB::getConnectionPDO();
        
        $almacen = new almacen();
        $almacen->almacenId=$idAlmacen;
        $almacen->almacenNombre=$almacennombre;
        $almacen->almacenDireccion=$almacendireccion;
        $almacen->almacenEmail=$almacenemail;
        $almacen->almacenTelefono=$almacentelefono;
        $almacen->almacenEncargado=$almacenencargado;
        
 
        
        

        $sql = "UPDATE almacen SET "
                . " AlmacenNombre = '" .$almacen->almacenNombre. "',"
                . " AlmacenDireccion = '" .$almacen->almacenDireccion. "',"
                . " AlmacenEmail = '" .$almacen->almacenEmail. "',"
                . " AlmacenTelefono = '" . $almacen->almacenTelefono . "',"
                . " AlmacenEncargado = '" . $almacen->almacenEncargado. "' "
                . " WHERE idAlmacen ='" .$almacen->almacenId."'";
        $stmt = $pdo->prepare($sql);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
    }
}
