<?php
include '../controller/UsuarioDAOController.php';

if(isset($_POST['inputIdUsuario'])){
    
    $UsuarioController = new usuarioDAOController();
    
    if($UsuarioController ->eliminarUsuario($_POST['inputIdUsuario'])){
        echo 'true';
    }else{
        echo 'false';
    }
        
    
}
