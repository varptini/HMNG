<?php
session_start();
$location = "Location:../view/index.php";
include '../controller/AcessoDAOController.php';
if(isset($_REQUEST['usuario'])&&isset($_REQUEST['clave'])){
    $usuario = $_REQUEST['usuario'];
    $clave = $_REQUEST['clave'];
    
    $obj = new AcessoDAOController();
    $login = $obj ->loginUsuario($usuario);
    if(count($login)>0){
        if($clave == $login[0]['usuariocontrasena']){

            $_SESSION["IdUser"]=$login[0]['idusuario'];
            $_SESSION["IdEmpleado"]=$login[0]['empleado_idempleado'];
            $_SESSION["ID"]=$login[0]['rol_idrol']; 
            
            $idPuesto = $login[0]['rol_idrol']; 
            
            $Puesto= $obj ->ObtenerPuesto($idPuesto);
            $idservicio=$obj ->ObtenerIdServico($Puesto[0]['rolnombre']);
//            print_r($idservicio);
            if(count($idservicio)>0){
                $_SESSION["Idservicio"]=$idservicio[0]["idservicios"];
            }
            
            $idusuario = $login[0]['empleado_idempleado'];
            $nombreuser = $obj ->ObtenerNombreUsuario($idusuario);
            
            if(count($nombreuser)>0){
                $_SESSION["Admin"]=$nombreuser[0]['empleadonombre'];
                $_SESSION['Rol']=$Puesto[0]['rolnombre'];
//                $_SESSION['CKFinder_UserRole'] = $Puesto[0]['rolnombre'];;
                $obj->AsignarNombreUsuario($_SESSION["Admin"]);
                $location="Location:../view/index.php";
            }

        }
    }
    else{
      $location="Location:../index.php";
}
}else{
      $location="Location:../index.php";
}

header($location);  
?>