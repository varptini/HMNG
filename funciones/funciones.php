<?php
require_once '../db/accesoHMNG.php';
class Listas{
    
        public function ListaEmpleados(){
            try {
                $pdo = AcessoDB::getConnectionPDO();
                $sql = 'SELECT * FROM empleado';
                $stmt = $pdo -> prepare($sql);
                $stmt->execute();                 
                return $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (Exception $ex) {
                throw $ex;
            }  
        }
        public function Bitacora(){
            try {
                $pdo = AcessoDB::getConnectionPDO();
                $sql = 'SELECT * FROM bitacora_insumos ORDER BY  BitacoraFecha DESC ';
                $stmt = $pdo -> prepare($sql);
                $stmt->execute();                 
                return $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (Exception $ex) {
                throw $ex;
            }  
        }
        public function ListaRoles(){
            try {
                $pdo = AcessoDB::getConnectionPDO();
                $sql = 'SELECT * FROM rol';
                $stmt = $pdo -> prepare($sql);
                $stmt->execute();                 
                return $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (Exception $ex) {
                throw $ex;
            }  
        }
        public function ListaUsuarios(){
            try {
                $pdo = AcessoDB::getConnectionPDO();
                $sql = 'SELECT idUsuario,UsuarioNombre, UsuarioContrasena, UsuarioActivo,UsuarioFechaCreacion ,e.idEmpleado as idempleado, e.EmpleadoNombre as nombre, r.RolNombre as rol 
                        FROM usuario,rol r, empleado e
                        WHERE Empleado_idEmpleado = e.idEmpleado and Rol_idRol = r.idRol' ;
                $stmt = $pdo -> prepare($sql);
                $stmt->execute();                 
                return $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (Exception $ex) {
                throw $ex;
            }  
        }
        public function ListaInsumos(){
            try {
                $pdo = AcessoDB::getConnectionPDO();
                $sql = 'SELECT * FROM insumos';
                $stmt = $pdo -> prepare($sql);
                $stmt->execute();                 
                return $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (Exception $ex) {
                throw $ex;
            }  
        }
        public function ListaInsumosExistenciaBaja(){
            try {
                $pdo = AcessoDB::getConnectionPDO();
                $sql = 'SELECT * FROM listainsumos_existenciabaja ORDER BY  InsumosExistencia LIMIT 50';
                $stmt = $pdo -> prepare($sql);
                $stmt->execute();                 
                return $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (Exception $ex) {
                throw $ex;
            }  
        }
        public function ListaInsumosCaducar(){
            try {
                $pdo = AcessoDB::getConnectionPDO();
                $sql = 'SELECT * FROM listainsumos_caducar ORDER BY  Insumos_DescripcionFechaCaducidad LIMIT 50';
                $stmt = $pdo -> prepare($sql);
                $stmt->execute();                 
                return $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (Exception $ex) {
                throw $ex;
            }  
        }
        public function ListaAlmacenes(){
            try {
                $pdo = AcessoDB::getConnectionPDO();
                $sql = 'SELECT * FROM almacen';
                $stmt = $pdo -> prepare($sql);
                $stmt->execute();                 
                return $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (Exception $ex) {
                throw $ex;
            }  
        }
        public function ListaPedidosTemporales(){
            try {
                $pdo = AcessoDB::getConnectionPDO();
                $sql = 'SELECT idEgresos,EgresosFechaRegistro,E.EmpleadoNombre as empleado,S.ServiciosNombre as servicio '
                        . 'FROM egresostemporal, empleado E, servicios S '
                        . 'Where E.idEmpleado = Empleado_idEmpleado and S.idServicios = Servicios_idServicios  ORDER BY  EgresosFechaRegistro ASC';
                $stmt = $pdo -> prepare($sql);
                $stmt->execute();                 
                return $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (Exception $ex) {
                throw $ex;
            }  
        }
        public function ListaPedidos(){
            try {
                $pdo = AcessoDB::getConnectionPDO();
                $sql = 'SELECT idEgresos,EgresosFechaRegistro,E.EmpleadoNombre as empleado,S.ServiciosNombre as servicio '
                        . 'FROM egresos, empleado E, servicios S '
                        . 'Where E.idEmpleado = Empleado_idEmpleado and S.idServicios = Servicios_idServicios ORDER BY  EgresosFechaRegistro DESC';
                $stmt = $pdo -> prepare($sql);
                $stmt->execute();                 
                return $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (Exception $ex) {
                throw $ex;
            }  
        }
        public function ListaPedidosSurtidos(){
            try {
                $pdo = AcessoDB::getConnectionPDO();
                $sql = 'SELECT idEgresos,EgresosFechaRegistro,E.EmpleadoNombre as empleado,S.ServiciosNombre as servicio '
                        . 'FROM egresos, empleado E, servicios S '
                        . 'Where E.idEmpleado = Empleado_idEmpleado and S.idServicios = Servicios_idServicios;';
                $stmt = $pdo -> prepare($sql);
                $stmt->execute();                 
                return $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (Exception $ex) {
                throw $ex;
            }  
        }
        public function ListaServicios(){
            try {
                $pdo = AcessoDB::getConnectionPDO();
                $sql = 'SELECT * FROM servicios';
                $stmt = $pdo -> prepare($sql);
                $stmt->execute();                 
                return $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (Exception $ex) {
                throw $ex;
            }  
        }
        public function BusquedaCargo($idCargo){
            try {
                $pdo = AcessoDB::getConnectionPDO();
                $sql = 'SELECT * FROM rol where idRol = "'.$idCargo.'"';
                $stmt = $pdo -> prepare($sql);
                $stmt->execute(); 
                $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt->closeCursor();
                return $response;
            } catch (Exception $ex) {
                throw $ex;
            }  
        }
        public function BusquedaEmpleado($idEmpleado){
            try {
                $pdo = AcessoDB::getConnectionPDO();
                $sql = 'SELECT * FROM empleado where idEmpleado = "'.$idEmpleado.'"';
                $stmt = $pdo -> prepare($sql);
                $stmt->execute(); 
                $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt->closeCursor();
                return $response;
            } catch (Exception $ex) {
                throw $ex;
            }  
        }
        public function BusquedaUsuario($idUsuario){
            try {
                $pdo = AcessoDB::getConnectionPDO();
                $sql = 'SELECT idUsuario,UsuarioNombre, UsuarioContrasena, UsuarioActivo,UsuarioFechaCreacion ,e.idEmpleado, e.EmpleadoNombre as nombre, r.RolNombre as rol 
                        FROM usuario,rol r, empleado e
                        WHERE Empleado_idEmpleado = e.idEmpleado and Rol_idRol = r.idRol and idUsuario = '.$idUsuario ;
                $stmt = $pdo -> prepare($sql);
                $stmt->execute();                 
                return $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (Exception $ex) {
                throw $ex;
            }  
        }
        public function BusquedaInsumo($idinsumo){
            try {
                $pdo = AcessoDB::getConnectionPDO();
                $sql = 'SELECT * FROM insumos where idInsumos = "'.$idinsumo.'"';
                $stmt = $pdo -> prepare($sql);
                $stmt->execute(); 
                $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt->closeCursor();
                return $response;
            } catch (Exception $ex) {
                throw $ex;
            }  
        }
        public function BusquedaAlmacen($idalmacen){
            try {
                $pdo = AcessoDB::getConnectionPDO();
                $sql = 'SELECT * FROM almacen where idAlmacen = "'.$idalmacen.'"';
                $stmt = $pdo -> prepare($sql);
                $stmt->execute(); 
                $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt->closeCursor();
                return $response;
            } catch (Exception $ex) {
                throw $ex;
            }  
        }
        public function BusquedaServico($idservico){
            try {
                $pdo = AcessoDB::getConnectionPDO();
                $sql = 'SELECT * FROM servicios where idServicios = "'.$idservico.'"';
                $stmt = $pdo -> prepare($sql);
                $stmt->execute(); 
                $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt->closeCursor();
                return $response;
            } catch (Exception $ex) {
                throw $ex;
            }  
        }
        public function BusquedaPedidoMostrar($idpedido){
            try {
                $pdo = AcessoDB::getConnectionPDO();
                $sql = 'SELECT '
                        . 'idEgresos as id,'
                        . 'EgresosFechaRegistro as fecha,'
                        . 'E.EmpleadoNombre as empleado,'
                        . 'S.ServiciosNombre as servicio '
                        . 'FROM egresostemporal, empleado E, servicios S '
                        . 'Where '
                        . 'idEgresos = "'.$idpedido.'" '
                        . 'and E.idEmpleado = Empleado_idEmpleado '
                        . 'and S.idServicios = Servicios_idServicios';
//                print_r($sql);
                $stmt = $pdo -> prepare($sql);
                $stmt->execute(); 
                $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt->closeCursor();
                return $response;
            } catch (Exception $ex) {
                throw $ex;
            }  
        }
        public function BusquedaPedidoinsumosMostrar($idpedido){
            try {
                $pdo = AcessoDB::getConnectionPDO();
                $sql = 'SELECT '
                        . 'I.idInsumos as insumoid,'
                        . 'I.InsumosNombreComercial as comercial,'
                        . 'I.InsumosNombreGenerico as generico,'
                        . 'I.InsumosDescripcion as descripcion,'
                        . 'I.InsumosUnidadMedida as medida,'
                        . 'Detalle_EgresosCantidad as cantidad '
                        . 'FROM detalle_egresostemporal, insumos I '
                        . 'Where '
                        . 'egresos_idEgresos ="'.$idpedido.'" '
                        . 'and I.idInsumos = Insumos_idInsumos;';
//                print_r($sql);
                $stmt = $pdo -> prepare($sql);
                $stmt->execute(); 
                $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt->closeCursor();
                return $response;
            } catch (Exception $ex) {
                throw $ex;
            }  
        }
        public function BusquedaPedidoVerificado($idpedido){
            try {
                $pdo = AcessoDB::getConnectionPDO();
                $sql = 'SELECT '
                        . 'idEgresos as id,'
                        . 'EgresosFechaRegistro as fecha,'
                        . 'E.EmpleadoNombre as empleado,'
                        . 'S.ServiciosNombre as servicio '
                        . 'FROM egresos, empleado E, servicios S '
                        . 'Where '
                        . 'idEgresos = "'.$idpedido.'" '
                        . 'and E.idEmpleado = Empleado_idEmpleado '
                        . 'and S.idServicios = Servicios_idServicios';
//                print_r($sql);
                $stmt = $pdo -> prepare($sql);
                $stmt->execute(); 
                $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt->closeCursor();
                return $response;
            } catch (Exception $ex) {
                throw $ex;
            }  
        }
        public function BusquedaPedidoinsumosVerificado($idpedido){
            try {
                $pdo = AcessoDB::getConnectionPDO();
                $sql = 'SELECT '
                        . 'I.idInsumos as insumoid,'
                        . 'I.InsumosNombreComercial as comercial,'
                        . 'I.InsumosNombreGenerico as generico,'
                        . 'I.InsumosDescripcion as descripcion,'
                        . 'I.InsumosUnidadMedida as medida,'
                        . 'Detalle_EgresosCantidad as cantidad '
                        . 'FROM detalle_egresos, insumos I '
                        . 'Where '
                        . 'egresos_idEgresos ="'.$idpedido.'" '
                        . 'and I.idInsumos = Insumos_idInsumos;';
//                print_r($sql);
                $stmt = $pdo -> prepare($sql);
                $stmt->execute(); 
                $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt->closeCursor();
                return $response;
            } catch (Exception $ex) {
                throw $ex;
            }  
        }
        public function DatosUsuario($idusuario) {
            try {
                $pdo = AcessoDB::getConnectionPDO();
                $sql = "SELECT idUsuario,UsuarioNombre, UsuarioContrasena, UsuarioActivo,UsuarioFechaCreacion , r.RolNombre as rol FROM usuario,rol r WHERE Rol_idRol = r.idRol and idUsuario = $idusuario" ;
//                print_r($sql);
                $stmt = $pdo -> prepare($sql);
                $stmt->execute();                 
                return $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $ex) {
                throw $ex;
            }
            
    }
    function BusquedaCodigoBar($CodigoBarras){
        try {
            $pdo = AcessoDB::getConnectionPDO();

            $sql = 'SELECT Insumos_idInsumos,Insumos_DescripcionFechaCaducidad FROM insumos_descripcion WHERE Insumos_DescripcionCodigoBarras = '.$CodigoBarras.'';
//            print_r($sql);
            $stmt = $pdo->prepare($sql);
            $stmt->execute();                
            return $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
        
        
    
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

