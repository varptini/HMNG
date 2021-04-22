<?php
include '../controller/EmpleadoDAOController.php';

if(isset($_POST['inputIdEmpleado'])){
    
    $empleadoController = new empleadoDAOController();
    
    if($empleadoController ->validarEmpleadoAsignadoUsuario($_POST['inputIdEmpleado'])){
        echo 'existeUsuario';
    }else{
        $empleadoController ->eliminarEmpleado($_POST['inputIdEmpleado']);
    }
        
    
}
