<?php
include '../entidades/empleado.php';
include '../entidades/usuario.php';
include '../db/accesoHMNG.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of perfilDAO
 *
 * @author varpt
 */
class perfilDAO {
    //put your code here
    function actualizarPerfil($idEmpleado, $DireccionEmpleado, $TelefonoEmpleado, $EmailEmpleado, $CelularEmpleado,$fechaNacEmpleado){
        $pdo = AcessoDB::getConnectionPDO();
        
        $empleado = new empleado();
        $empleado ->empleadoid=$idEmpleado;
        $empleado->empleadodireccion=$DireccionEmpleado;
        $empleado->empleadotelefono=$TelefonoEmpleado;
        $empleado->empleadoemail=$EmailEmpleado;
        $empleado->empleadocelular =$CelularEmpleado;
        $empleado->empleadofechanacimiento =$fechaNacEmpleado;

        $sql = "UPDATE empleado SET "
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
    function actualizarClave($id,$clave){
        $pdo = AcessoDB::getConnectionPDO();
        
        $usuario = new usuario();
        $usuario ->usuarioid=$id;
        $usuario->usuariocontrasenia=$clave;
        

        $sql = "UPDATE usuario SET UsuarioContrasena = '".$usuario ->usuariocontrasenia. "' WHERE idUsuario = ".$usuario->usuarioid."";
//        print_r($sql);
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
