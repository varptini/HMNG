<?php
include '../controller/ServicioDAOController.php';

//    print $_POST["inputNombreCargo"];
//    print $_POST["textareaDescripcionCargo"];
    
if (isset($_POST["inputNombreServicio"]) || isset($_POST["textareaDescripcionServicio"]) ) {

    if (trim($_POST["inputNombreServicio"]) == "") {
        echo "false";  
    } else {
//    print $_POST["inputNombreCargo"];
//    print $_POST["textareaDescripcionCargo"];
        $ServicioCont = new ServicioDAOController();
        if($ServicioCont->validarServicioExiste($_POST["inputNombreServicio"])){
            echo "existe";
        }else{
            $ServicioCont =  new ServicioDAOController();
            if ($ServicioCont->insertarServicio($_POST["inputNombreServicio"], $_POST["textareaDescripcionServicio"])) {
                echo "true";
            } else {
                echo "false";
            }
        }    
    }
} else {
    echo "false";
}
