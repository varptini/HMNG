<?php
include '../controller/EmpleadoDAOController.php';

    
    
if (isset($_POST["inputNombreEmpleado"]) || isset($_POST["inputDireccionEmpleado"]) || isset($_POST["inputTelefonoEmpleado"]) || isset($_POST["inputEmailEmpleado"]) || isset($_POST["inputCelularEmpleado"]) || isset($_POST["inputfechaNacEmpleado"])) {
 
    if (trim($_POST["inputNombreEmpleado"]) == "" || trim($_POST["inputDireccionEmpleado"]) == "" || trim($_POST["inputTelefonoEmpleado"]) == ""  || trim($_POST["inputEmailEmpleado"]) == "" || trim($_POST["inputCelularEmpleado"]) == "" || trim($_POST["inputfechaNacEmpleado"]) == "") {
        echo "false";
        
    } else {
        $empleadoCont =  new empleadoDAOController();
        if($empleadoCont->validarEmpleadoExiste($_POST["inputNombreEmpleado"])){
            echo "existe";
        }else{
            $empleadoCont =  new empleadoDAOController();
            if ($empleadoCont->insertarEmpleado($_POST["inputNombreEmpleado"], $_POST["inputDireccionEmpleado"], $_POST["inputTelefonoEmpleado"], $_POST["inputEmailEmpleado"], $_POST["inputCelularEmpleado"], $_POST["inputfechaNacEmpleado"])) {
                echo "true";
            } else {
                echo "false";
            }
        }    
    }
} else {
    echo "false";
}

