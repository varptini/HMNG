<?php
include '../controller/ServicioDAOController.php';

if(isset($_POST['inputIdServicio'])){
    
    $ServicioController = new ServicioDAOController();
    
    if($ServicioController ->validarServicioAsignado($_POST['inputIdServicio'])){
        echo 'existeAsignacion';
    }else{
        $ServicioController ->eliminarServicio($_POST['inputIdServicio']);
    }
        
    
}
