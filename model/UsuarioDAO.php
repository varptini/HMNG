<?php
include '../entidades/usuario.php';
include '../db/accesoHMNG.php';


class usuarioDAO{
    
    function insertarUsuario($usuarionombrecompleto, $usuariocontrasenia, $activousuario, $usuarionombreempleado, $usuariopuesto){
       
        $pdo = AcessoDB::getConnectionPDO();
        
        $usuario = new usuario();
        $usuario->usuarionombrecompleto=$usuarionombrecompleto;
        $usuario->usuariocontrasenia=$usuariocontrasenia;
        $usuario->usuarioactivo=$activousuario;
        $usuario->usuarionombreempleado=$usuarionombreempleado;
        $usuario->usuariopuesto =$usuariopuesto;
        

        $sql = "INSERT INTO usuario (UsuarioNombre, UsuarioContrasena, UsuarioActivo, Empleado_idEmpleado, Rol_idRol, UsuarioFechaCreacion) VALUES('".$usuario->usuarionombrecompleto."', '".$usuario->usuariocontrasenia."', '".$usuario->usuarioactivo."', '".$usuario->usuarionombreempleado."', '".$usuario->usuariopuesto."', now())";
        $stmt = $pdo->prepare($sql);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
    }
    
    function validarUsuarioExiste($usuarioNombre){
        $pdo = AcessoDB::getConnectionPDO();
        
        $usuario = new usuario();
        $usuario->usuarionombrecompleto=$usuarioNombre;
        
        $sql = "SELECT * FROM usuario WHERE UsuarioNombre='".$usuario->usuarionombrecompleto."'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $fila = $stmt->rowCount();
        
        if($fila > 0){
            return true;
        }else{
            return false;
        }  
    }
    
//    function validarUsuarioExisteId($usuarioid){
//        $pdo = accesoDB::getConecctionPDO();
//        
//        $usuario = new usuario();
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
    function actualizarUsuario($usuarioid, $usuarionombrecompleto, $usuariocontrasenia, $activousuario, $usuariopuesto,$usuarionombreempleado) {
        $pdo = AcessoDB::getConnectionPDO();
        
        $usuario = new usuario();
        $usuario->usuarioid=$usuarioid;
        $usuario->usuarionombrecompleto=$usuarionombrecompleto;
        $usuario->usuariocontrasenia=$usuariocontrasenia;
        $usuario->usuarioactivo=$activousuario;
        $usuario->usuarionombreempleado=$usuarionombreempleado;
        $usuario->usuariopuesto =$usuariopuesto;

        $sql = "UPDATE usuario SET "
                . "UsuarioNombre='" .$usuario->usuarionombrecompleto. "', "
                . "UsuarioContrasena='" .$usuario->usuariocontrasenia. "', "
                . "UsuarioActivo='" .$usuario->usuarioactivo. "',"
                . "Empleado_idEmpleado='" .$usuario->usuarionombreempleado . "', "
                . "Rol_idRol='" .$usuario->usuariopuesto. "'  "
                . " WHERE "
                . "idUsuario = '" .$usuario->usuarioid. "'";
//        print_r($sql);
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
//    
    function eliminarUsuario($usuarioid){
        $pdo = AcessoDB::getConnectionPDO();
        
        $usuario = new usuario();
        $usuario->usuarioid=$usuarioid;
        
        $sql = "DELETE FROM usuario WHERE idUsuario='".$usuario->usuarioid."'";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
}

