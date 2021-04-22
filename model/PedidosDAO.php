<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../entidades/egresos.php';
include '../entidades/egresosdescripcion.php';
include '../entidades/servicio.php';
include '../entidades/empleado.php';
include '../entidades/insumo.php';
include '../db/accesoHMNG.php';
/**
 * Description of PedidosDAO
 *
 * @author varpt
 */
class PedidosDAO {
    
    function insertarEgresoTemporal($id,$idempleado,$idservicio){
       
        $pdo = AcessoDB::getConnectionPDO();
        
        $empleado = new empleado();
        $servicio = new servicio();
        $egreso = new egresos();
        
        $egreso->egresosId=$id;
        $empleado->empleadoid=$idempleado;
        $servicio->servicioId=$idservicio;

        

        $sql = "INSERT INTO egresostemporal (idEgresos,EgresosFechaRegistro,Empleado_idEmpleado,Servicios_idServicios)"
                . " VALUES('"
                .$egreso->egresosId."',"
                . "NOW(),"
                .$empleado->empleadoid.", "
                .$servicio->servicioId.")";
//                print_r($sql);
        $stmt = $pdo->prepare($sql);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
    }
    function insertarEgresoDescripcionTemporal($id,$idInsumo,$Cantidad){
        
       
        $pdo = AcessoDB::getConnectionPDO();
        
        $egresodescripcion = new egresosdescripcion();
        $insumo = new insumo();
        $egresodescripcion->egresosDescripcionId = $id;
        $insumo->insumoid = $idInsumo;
        $egresodescripcion->egresosDescripcionCantidad = $Cantidad;
       


        $sql = "INSERT INTO detalle_egresostemporal (egresos_idEgresos,Insumos_idInsumos,Detalle_EgresosCantidad)"
                . " VALUES('"
                .$egresodescripcion->egresosDescripcionId."',"
                .$insumo->insumoid.","
                .$egresodescripcion->egresosDescripcionCantidad.")";
//        print_r($sql);
        $stmt = $pdo->prepare($sql);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
    }
    
    function validarPedidoNombreExiste($nombreegreso){
        $pdo = AcessoDB::getConnectionPDO();
        
        $egreso = new egresos();
        $egreso->egresosId=$nombreegreso;
        
        $sql = 'SELECT * FROM egresostemporal WHERE idEgresos = "'.$egreso->egresosId.'"';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        
        $fila = $stmt->rowCount();
        
        if($fila > 0){
            return true;
        }else{
            return false;
        }  
    }
    public function generaIDPedido(){
            //Se define una cadena de caractares.
            //Os recomiendo desordenar las minúsculas, mayúsculas y números para mejorar la probabilidad.
            $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
            //Obtenemos la longitud de la cadena de caracteres
            $longitudCadena=strlen($cadena);

            //Definimos la variable que va a contener la contraseña
            $pass = "";
            //Se define la longitud de la contraseña, puedes poner la longitud que necesites
            //Se debe tener en cuenta que cuanto más larga sea más segura será.
            $longitudPass=10;

            //Creamos la contraseña recorriendo la cadena tantas veces como hayamos indicado
            for($i=1 ; $i<=$longitudPass ; $i++){
                //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
                $pos=rand(0,$longitudCadena-1);

                //Vamos formando la contraseña con cada carácter aleatorio.
                $pass .= substr($cadena,$pos,1);
            }
            return $pass;
        }
    function insertarEgreso($id){
       
        $pdo = AcessoDB::getConnectionPDO();
        
        $egreso = new egresos();
        
        $egreso->egresosId=$id;

        

        $sql = "INSERT INTO egresos "
                . "(idEgresos, EgresosFechaRegistro,Empleado_idEmpleado,Servicios_idServicios)"
                . " SELECT egresostemporal.idEgresos, egresostemporal.EgresosFechaRegistro,egresostemporal.Empleado_idEmpleado,egresostemporal.Servicios_idServicios "
                . "FROM egresostemporal  where "
                . "egresostemporal.idEgresos = '".$egreso->egresosId. "'";
//                print_r($sql);
        $stmt = $pdo->prepare($sql);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
    }
    function insertarEgresoDescripcion($id,$idInsumo,$Cantidad){
        
       
        $pdo = AcessoDB::getConnectionPDO();
        
        $egresodescripcion = new egresosdescripcion();
        $insumo = new insumo();
        $egresodescripcion->egresosDescripcionId = $id;
        $insumo->insumoid = $idInsumo;
        $egresodescripcion->egresosDescripcionCantidad = $Cantidad;
       


        $sql = "INSERT INTO detalle_egresos (egresos_idEgresos,Insumos_idInsumos,Detalle_EgresosCantidad)"
                . " VALUES('"
                .$egresodescripcion->egresosDescripcionId."',"
                .$insumo->insumoid.","
                .$egresodescripcion->egresosDescripcionCantidad.")";
//        print_r($sql);
        $stmt = $pdo->prepare($sql);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
    }
    function eliminaPedidoTemporal($idpedido){
        $pdo = AcessoDB::getConnectionPDO();
        
        $egreso = new egresos();
        $egreso->egresosId=$idpedido;

        $sql = "CALL EliminaPedidoTemporal('"
                .$egreso->egresosId."')";
//                print_r($sql);
        $stmt = $pdo->prepare($sql);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
    }
    
}