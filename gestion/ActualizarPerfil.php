<?php

include '../controller/PerfilDAOController.php';
//
//print $_POST["inputidPerfilEmpleado"];
//print $_POST["inputPerfilDireccion"];
//print $_POST["inputPerfilTelefono"];
//print $_POST["inputPerfilCorreo"];
//print $_POST["inputPerfilCelular"];
//print $_POST["inputPerfilFecha"];
//print $_POST["inputUsuarioId"];
//print $_POST["inputUsuarioContasena"];
//
//

if ( isset( $_POST["inputUsuarioContasena"]) || isset( $_POST["inputidPerfilEmpleado"]) || isset($_POST["inputPerfilDireccion"]) || isset($_POST["inputPerfilTelefono"])|| isset($_POST["inputPerfilCorreo"])|| isset($_POST["inputPerfilCelular"])|| isset($_POST["inputPerfilFecha"])) {
    if (trim($_POST["inputUsuarioContasena"]) == "" || trim($_POST["inputidPerfilEmpleado"]) == "" || trim($_POST["inputPerfilDireccion"]) == ""|| trim($_POST["inputPerfilTelefono"]) == ""|| trim($_POST["inputPerfilCorreo"]) == ""|| trim($_POST["inputPerfilCelular"]) == ""|| trim($_POST["inputPerfilFecha"]) == "") {
        echo "false";
    } else {
        $PerfilController = new PerfilDAOController();
        if($PerfilController->actualizarPerfil($_POST["inputidPerfilEmpleado"],$_POST["inputPerfilDireccion"],$_POST["inputPerfilTelefono"],$_POST["inputPerfilCorreo"],$_POST["inputPerfilCelular"],$_POST["inputPerfilFecha"])){
            if($PerfilController->actualizarClave($_POST["inputUsuarioId"],$_POST["inputUsuarioContasena"])){
                echo 'actualizado';
            }else{
                echo 'false';      
            }
            
        }else{
             echo 'false'; 
        }              
    }
} else {
    echo "false";
}
