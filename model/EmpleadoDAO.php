<?php
include '../entidades/empleado.php';
include '../db/accesoHMNG.php';


class empleadoDAO{
    
    function insertarEmpleado($NombreEmpleado, $DireccionEmpleado,$TelefonoEmpleado, $EmailEmpleado, $CelularEmpleado,$fechaNacEmpleado){
       
        $pdo = AcessoDB::getConnectionPDO();
        
        $empleado = new empleado();
        $empleado->empleadonombrecompleto=$NombreEmpleado;
        $empleado->empleadodireccion=$DireccionEmpleado;
        $empleado->empleadotelefono=$TelefonoEmpleado;
        $empleado->empleadoemail=$EmailEmpleado;
        $empleado->empleadocelular =$CelularEmpleado;
        $empleado->empleadofechanacimiento =$fechaNacEmpleado;
 
        
        

        $sql = "INSERT INTO empleado (EmpleadoNombre, EmpleadoDireccion, EmpleadoTelefono, EmpleadoCorreo, EmpleadoCelular, EmpleadoFechaNacimiento) VALUES('".$empleado->empleadonombrecompleto."', '".$empleado->empleadodireccion."', '".$empleado->empleadotelefono."', '".$empleado->empleadoemail."', '".$empleado->empleadocelular."', '".$empleado->empleadofechanacimiento."')";
        $stmt = $pdo->prepare($sql);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
    }
    
    function validarEmpleadoExiste($nombreEmpleado){
        $pdo = AcessoDB::getConnectionPDO();
        
        $empleado = new empleado();
        $empleado->empleadonombrecompleto=$nombreEmpleado;
        
        $sql = "SELECT * FROM empleado WHERE EmpleadoNombre='".$empleado->empleadonombrecompleto."'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $fila = $stmt->rowCount();
        
        if($fila > 0){
            return true;
        }else{
            return false;
        }  
    }
    function validarEmpleadoAsignadoUsuario($Empleadoid){
        $pdo = AcessoDB::getConnectionPDO();
        
        $empleado = new empleado();
        $empleado->empleadoid=$Empleadoid;
        
        $sql = "SELECT * FROM usuario WHERE Empleado_idEmpleado='".$empleado->empleadoid."'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $fila = $stmt->rowCount();
        
        if($fila > 0){
            return true;
        }else{
            return false;
        }  
    }
    function eliminarEmpleado($Empleadoid){
        $pdo = AcessoDB::getConnectionPDO();
        
        $empleado = new empleado();
        $empleado->empleadoid=$Empleadoid;
        
        $sql = "DELETE FROM empleado WHERE idEmpleado='".$empleado->empleadoid."'";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        } 
    }
    
//    function validarUsuarioExisteId($usuarioid){
//        $pdo = accesoDB::getConecctionPDO();
//        
//        $usuario = new empleado();
//        $usuario->usuarioid=$usuarioid;
//        
//        $sql = "SELECT UsuarioId FROM usuario WHERE UsuarioId='".$usuario->usuarioid."'";
//        $stmt = $pdo->prepare($sql);
//        $stmt->execute();
//        $fila = $stmt->rowCount();
//        
//        if($fila > 0){
//            return true;
//        }else{
//            return false;
//        }  
//    }
//    
//    
    function actualizarEmpleado($idEmpleado, $NombreEmpleado, $DireccionEmpleado, $TelefonoEmpleado, $EmailEmpleado, $CelularEmpleado,$fechaNacEmpleado){
        $pdo = AcessoDB::getConnectionPDO();
        
        $empleado = new empleado();
        $empleado ->empleadoid=$idEmpleado;
        $empleado->empleadonombrecompleto=$NombreEmpleado;
        $empleado->empleadodireccion=$DireccionEmpleado;
        $empleado->empleadotelefono=$TelefonoEmpleado;
        $empleado->empleadoemail=$EmailEmpleado;
        $empleado->empleadocelular =$CelularEmpleado;
        $empleado->empleadofechanacimiento =$fechaNacEmpleado;

        $sql = "UPDATE empleado SET "
                . " EmpleadoNombre = '" .$empleado->empleadonombrecompleto. "',"
                . " EmpleadoDireccion = '" .$empleado->empleadodireccion. "',"
                . " EmpleadoTelefono = '" .$empleado->empleadotelefono. "',"
                . " EmpleadoCorreo = '" . $empleado->empleadoemail . "',"
                . " EmpleadoCelular = '" . $empleado->empleadocelular. "',"
                . " EmpleadoFechaNacimiento = '" .$empleado->empleadofechanacimiento. "'"
                . " WHERE idEmpleado ='" .$empleado ->empleadoid."'";
//        print_r($sql);
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
//    
//    function eliminarUsuario($usuarioid){
//        $pdo = accesoDB::getConecctionPDO();
//        
//        $usuario = new empleado();
//        $usuario->usuarioid=$usuarioid;
//        
//        $sql = "DELETE FROM usuario WHERE UsuarioId='".$usuario->usuarioid."'";
//        $stmt = $pdo->prepare($sql);
//        if ($stmt->execute()) {
//            return true;
//        } else {
//            return false;
//        }
//    }
    
}

