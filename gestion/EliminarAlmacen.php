<?php
include '../controller/AlmacenDAOController.php';

if(isset($_POST['inputIdAlmacen'])){
    
    $almacenController = new AlmacenDAOController();
    
    if($almacenController ->validarAlmacenAsignadoInsumo($_POST['inputIdAlmacen'])){
        echo 'existeInsumo';
    }else{
        $almacenController ->eliminarAlmacen($_POST['inputIdAlmacen']);
    }
        
    
}



