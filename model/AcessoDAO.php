<?php
require_once '../db/accesoHMNG.php';
class AcessoDAO {
    public function loginUsuario($usuario) {
            try {
                $pdo = AcessoDB::getConnectionPDO();
                $sql = 'SELECT * FROM usuario WHERE UsuarioNombre = "'.$usuario.'" and UsuarioActivo = 1';
                $stmt = $pdo -> prepare($sql);
                $stmt->execute();                
                $response = $stmt->fetchAll();
                return $response;
            } catch (Exception $ex) {
                throw $ex;
            }
            
    }
    public function ObtenerNombreUsuario($idusuario) {
            try {
                $pdo = AcessoDB::getConnectionPDO();
                $sql = 'SELECT EmpleadoNombre FROM empleado WHERE idEmpleado = '.$idusuario.'';
                $stmt = $pdo -> prepare($sql);
                $stmt->execute();
                $response = $stmt->fetchAll();                 
                return $response;
                 
                
            } catch (Exception $ex) {
                throw $ex;
            }
            
    }
    public function AsignarNombreUsuario($Admin) {
            try {
                $pdo = AcessoDB::getConnectionPDO();
                $sql = 'SET @NombreEmpleado = "'.($Admin).'"';
                $stmt = $pdo -> prepare($sql);
                if($stmt->execute()){
                    return "true";
                }
////                $response = $stmt->fetchAll();                 
//                return $sql;
            } catch (Exception $ex) {
                throw $ex;
            }
            
    }
    public function ObtenerPuesto($idPuesto) {
            try {
                $pdo = AcessoDB::getConnectionPDO();
                $sql = 'SELECT RolNombre FROM rol WHERE idRol = '.$idPuesto.'';
                $stmt = $pdo -> prepare($sql);
                $stmt->execute();
                
                $response = $stmt->fetchAll();
                return $response;
                 
                
            } catch (Exception $ex) {
                throw $ex;
            }
            
    }
    public function ObtenerIdServico($Puesto) {
            try {
                $pdo = AcessoDB::getConnectionPDO();
                $sql = "SELECT idServicios FROM servicios WHERE ServiciosNombre LIKE '%".$Puesto."%'";
                $stmt = $pdo -> prepare($sql);
                $stmt->execute();
                
                $response = $stmt->fetchAll();
                return $response;
                 
                
            } catch (Exception $ex) {
                throw $ex;
            }
            
    }
}