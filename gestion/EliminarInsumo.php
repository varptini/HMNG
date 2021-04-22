<?php
include '../controller/InsumoDAOController.php';

if(isset($_POST['inputIdInsumo'])){
    
    $InsumoController = new insumoDAOController();
    
    if($InsumoController ->validarInsumoStock($_POST['inputIdInsumo'])){
        echo 'existeStock';
    }else{
        if($InsumoController ->validarInsumoPedido($_POST['inputIdInsumo'])){
            echo 'existePedido';
        }else{
            $InsumoController ->eliminarInsumo($_POST['inputIdInsumo']);
        }
        
    }
        
    
}
