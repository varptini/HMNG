<?php
include '../controller/UsuarioDAOController.php';

if (isset($_POST["inputIdUsuario"]) || isset($_POST["inputNombreUsuario"]) || isset($_POST["inputContraseñaUsuario"])|| isset($_POST["inputEstadoUsuario"])|| isset($_POST["inputCargoUsuario"]) || isset($_POST["inputIdEmpleado"])) {
    if (trim($_POST["inputIdUsuario"]) == "" || trim($_POST["inputNombreUsuario"]) == "" || trim($_POST["inputContraseñaUsuario"]) == ""|| trim($_POST["inputEstadoUsuario"]) == ""|| trim($_POST["inputCargoUsuario"]) == ""|| trim($_POST["inputIdEmpleado"]) == "") {
        echo "false";
    } else {
        $UduarioController = new usuarioDAOController();
        if($UduarioController->actualizarUsuario($_POST["inputIdUsuario"],$_POST["inputNombreUsuario"],$_POST["inputContraseñaUsuario"],$_POST["inputEstadoUsuario"],$_POST["inputCargoUsuario"],$_POST["inputIdEmpleado"])){
            echo 'exito';
        }else{
            echo 'false';
        }              
    }
} else {
    echo "false";
}






//print $_POST["inputIdEmpleado"];
//print $_POST["inputNombreEmpleado"];
//print $_POST["inputDireccionEmpleado"];
//print $_POST["inputTelefonoEmpleado"];
//print $_POST["inputEmailEmpleado"];
//print $_POST["inputCelularEmpleado"];
//print $_POST["inputfechaNacEmpleado"];
//
//
//
//
