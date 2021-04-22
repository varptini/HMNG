<?php
include '../controller/CargoDAOController.php';

//    print $_POST["inputNombreCargo"];
//    print $_POST["textareaDescripcionCargo"];
    
if (isset($_POST["inputNombreCargo"]) || isset($_POST["textareaDescripcionCargo"]) ) {

    if (trim($_POST["inputNombreCargo"]) == "") {
        echo "false";  
    } else {
//    print $_POST["inputNombreCargo"];
//    print $_POST["textareaDescripcionCargo"];
        $CargoCont =  new CargoDAOController();
        if($CargoCont->validarCargoExiste($_POST["inputNombreCargo"])){
            echo "existe";
        }else{
            $CargoCont =  new CargoDAOController();
            if ($CargoCont->insertarCargo($_POST["inputNombreCargo"], $_POST["textareaDescripcionCargo"])) {
                echo "true";
            } else {
                echo "false";
            }
        }    
    }
} else {
    echo "false";
}
