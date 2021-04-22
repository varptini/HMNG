<?php
$usuario = $_REQUEST['usuario'];
$clave = $_REQUEST['clave'];

require_once '../controller/AcessoDAOController.php';
$obj = new AcessoDAOController();
$login = $obj ->loginUsuario($usuario);
if(count($login)>0){
    if($login[0]['usuarioactivo']==1){
        if($clave == $login[0]['usuariocontrasena']){
        echo 'Correcto'; 
        }else{
             echo 'Incorrecto'; 
        }
    }
    else{
        echo 'Desabilitado';   
    }
   
}else{
    echo 'Usuario';
}
?>