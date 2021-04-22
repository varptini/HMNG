<?php

include '../controller/EmpleadoDAOController.php';
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

if (isset($_POST["inputIdEmpleado"]) || isset($_POST["inputNombreEmpleado"]) || isset($_POST["inputDireccionEmpleado"])|| isset($_POST["inputTelefonoEmpleado"])|| isset($_POST["inputEmailEmpleado"])|| isset($_POST["inputCelularEmpleado"])|| isset($_POST["inputfechaNacEmpleado"])) {
    if (trim($_POST["inputIdEmpleado"]) == "" || trim($_POST["inputNombreEmpleado"]) == "" || trim($_POST["inputDireccionEmpleado"]) == ""|| trim($_POST["inputTelefonoEmpleado"]) == ""|| trim($_POST["inputEmailEmpleado"]) == ""|| trim($_POST["inputCelularEmpleado"]) == ""|| trim($_POST["inputfechaNacEmpleado"]) == "") {
        echo "false";
    } else {
        $EmpleadoController = new empleadoDAOController();
        if($EmpleadoController->actualizarEmpleado($_POST["inputIdEmpleado"],$_POST["inputNombreEmpleado"],$_POST["inputDireccionEmpleado"],$_POST["inputTelefonoEmpleado"],$_POST["inputEmailEmpleado"],$_POST["inputCelularEmpleado"],$_POST["inputfechaNacEmpleado"])){
            echo 'actualizado';
        }else{
            echo 'false';
        }              
    }
} else {
    echo "false";
}
