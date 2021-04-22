<?php
include '../controller/UsuarioDAOController.php';

    
    
if (isset($_POST["inputNombreEmpleado"]) || isset($_POST["inputNombreUsuario"]) || isset($_POST["inputContraseñaUsuario"]) || isset($_POST["inputCargoUsuario"]) || isset($_POST["inputEstadoUsuario"])) {
 
    if (trim($_POST["inputNombreEmpleado"]) == "#" || trim($_POST["inputNombreUsuario"]) == "" || trim($_POST["inputContraseñaUsuario"]) == ""  || trim($_POST["inputCargoUsuario"]) == "#" || trim($_POST["inputEstadoUsuario"]) == "#") {
        echo "false";
        
    } else {
        $usuarioCont =  new usuarioDAOController();
        if($usuarioCont->validarUsuarioExiste($_POST["inputNombreUsuario"])){
            echo "existe";
        }else{
            $usuarioCont =  new usuarioDAOController();
            if ($usuarioCont->insertarUsuario(utf8_decode($_POST["inputNombreUsuario"]), $_POST["inputContraseñaUsuario"], $_POST["inputEstadoUsuario"], utf8_decode($_POST["inputNombreEmpleado"]), $_POST["inputCargoUsuario"])) {
                echo "true";
            } else {
                echo "false";
            }
        }    
    }
} else {
    echo "false";
}

