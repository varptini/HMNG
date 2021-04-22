<?php
include '../controller/CargoDAOController.php';

if (isset($_POST["inputIdCargo"]) || isset($_POST["inputNombreCargo"]) || isset($_POST["textareaDescripcionCargo"])) {
    if (trim($_POST["inputIdCargo"]) == "" || trim($_POST["inputNombreCargo"]) == "" || trim($_POST["textareaDescripcionCargo"]) == "") {
        echo "false";
    } else {
        $CargoController = new CargoDAOController();
        if($CargoController->actualizarCargo($_POST["inputIdCargo"], $_POST["inputNombreCargo"], $_POST["textareaDescripcionCargo"])){
            echo 'true';
        }else{
            echo 'false';
        }              
    }
} else {
    echo "false";
}
