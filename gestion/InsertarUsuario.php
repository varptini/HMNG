<?php
include '../controller/UsuarioDAOController.php';

    
    
if (isset($_POST["inputNombreEmpleado"]) || isset($_POST["inputNombreUsuario"]) || isset($_POST["inputContraseĆ±aUsuario"]) || isset($_POST["inputCargoUsuario"]) || isset($_POST["inputEstadoUsuario"])) {
 
    if (trim($_POST["inputNombreEmpleado"]) == "#" || trim($_POST["inputNombreUsuario"]) == "" || trim($_POST["inputContraseĆ±aUsuario"]) == ""  || trim($_POST["inputCargoUsuario"]) == "#" || trim($_POST["inputEstadoUsuario"]) == "#") {
        echo "false";
        
    } else {
        $usuarioCont =  new usuarioDAOController();
        if($usuarioCont->validarUsuarioExiste($_POST["inputNombreUsuario"])){
            echo "existe";
        }else{
            $usuarioCont =  new usuarioDAOController();
            if ($usuarioCont->insertarUsuario(utf8_decode($_POST["inputNombreUsuario"]), $_POST["inputContraseĆ±aUsuario"], $_POST["inputEstadoUsuario"], utf8_decode($_POST["inputNombreEmpleado"]), $_POST["inputCargoUsuario"])) {
                echo "true";
            } else {
                echo "false";
            }
        }    
    }
} else {
    echo "false";
}

