<?php
include '../controller/CargoDAOController.php';

if(isset($_POST['inputIdRol'])){
    
    $CargoController = new CargoDAOController();
    
    if($CargoController ->validarCargoAsignadoUsuario($_POST['inputIdRol'])){
        echo 'existeUsuario';
    }else{
        $CargoController ->eliminarCargo($_POST['inputIdRol']);
    }
        
    
}
