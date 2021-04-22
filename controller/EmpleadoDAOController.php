<?php
include '../model/EmpleadoDAO.php';

class empleadoDAOController{
     function insertarEmpleado($NombreEmpleado, $DireccionEmpleado,$TelefonoEmpleado, $EmailEmpleado, $CelularEmpleado,$fechaNacEmpleado){
         $obj = new empleadoDAO();
         return $obj->insertarEmpleado($NombreEmpleado, $DireccionEmpleado,$TelefonoEmpleado, $EmailEmpleado, $CelularEmpleado,$fechaNacEmpleado);
     }
     
     function validarEmpleadoExiste($NombreEmpleado){
         $obj = new empleadoDAO();
         return $obj->validarEmpleadoExiste($NombreEmpleado);
    }
     
     function actualizarEmpleado($idEmpleado, $NombreEmpleado, $DireccionEmpleado, $TelefonoEmpleado, $EmailEmpleado, $CelularEmpleado,$fechaNacEmpleado) {
        $obj = new empleadoDAO();
        return $obj->actualizarEmpleado($idEmpleado, $NombreEmpleado, $DireccionEmpleado, $TelefonoEmpleado, $EmailEmpleado, $CelularEmpleado,$fechaNacEmpleado);
     }
//     
    function validarEmpleadoAsignadoUsuario($Empleadoid){
        $obj = new empleadoDAO();
         return $obj->validarEmpleadoAsignadoUsuario($Empleadoid);
    }
     
     function eliminarEmpleado($Empleadoid){
         $obj = new empleadoDAO();
         return $obj->eliminarEmpleado($Empleadoid);
     }
}