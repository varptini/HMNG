<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../entidades/servicio.php';
include '../db/accesoHMNG.php';
/**
 * Description of ServicioDAO
 *
 * @author varpt
 */
class ServicioDAO {
    //put your code here
    function insertarServicio($NombreServicio,$DescripcionServicio){
       
        $pdo = AcessoDB::getConnectionPDO();
        
        $servicio = new servicio();
        $servicio->servicioNombre=$NombreServicio;
        $servicio->servicioDescripcion=$DescripcionServicio;

        

        $sql = "INSERT INTO servicios (ServiciosNombre, ServiciosDescripcion) VALUES('".$servicio->servicioNombre."', '".$servicio->servicioDescripcion."')";
        $stmt = $pdo->prepare($sql);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
    }
    
    function validarServicioExiste($NombreServicio){
        $pdo = AcessoDB::getConnectionPDO();
        
        $servicio = new servicio();
        $servicio->servicioNombre=$NombreServicio;
        
        $sql = "SELECT * FROM servicios WHERE ServiciosNombre='".$servicio->servicioNombre."'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $fila = $stmt->rowCount();
        
        if($fila > 0){
            return true;
        }else{
            return false;
        }  
    }
    
    function eliminarServicio($Servicioid){
        $pdo = AcessoDB::getConnectionPDO();
        
        $servicio = new servicio();
        $servicio->servicioId=$Servicioid;
        
        $sql = "DELETE FROM servicios WHERE idServicios='".$servicio->servicioId."'";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        } 
    }
    function validarServicioAsignado($Servicioid){
        $pdo = AcessoDB::getConnectionPDO();
        
        $servicio = new servicio();
        $servicio->servicioId=$Servicioid;
        
        $sql = "SELECT * FROM egresos WHERE Servicios_idServicios = ".$servicio->servicioId."";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $fila = $stmt->rowCount();
        
        if($fila > 0){
            return true;
        }else{
            return false;
        }  
    }
    function actualizarServicio($Servicioid,$NombreServicio,$DescripcionServicio){
       
        $pdo = AcessoDB::getConnectionPDO();
        
        $servicio = new servicio();
        $servicio->servicioId=$Servicioid;
        $servicio->servicioNombre=$NombreServicio;
        $servicio->servicioDescripcion=$DescripcionServicio;
        
        $sql = "UPDATE servicios SET "
                . "ServiciosNombre = '".$servicio->servicioNombre."',"
                . "ServiciosDescripcion = '".$servicio->servicioDescripcion."' "
                . " WHERE "
                . "idServicios =". $servicio->servicioId."";
        $stmt = $pdo->prepare($sql);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
    }
}
