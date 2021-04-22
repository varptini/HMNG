<?php
include '../controller/AlmacenDAOController.php';





    
    
if (isset($_POST["inputNombreAlmacen"]) || isset($_POST["inputDireccionAlmacen"]) || isset($_POST["inputEmailAlmacen"]) || isset($_POST["inputTelefonoAlmacen"]) || isset($_POST["inputEncargadoAlmacen"])) {
 
    if (trim($_POST["inputNombreAlmacen"]) == "" || trim($_POST["inputDireccionAlmacen"]) == "" || trim($_POST["inputEmailAlmacen"]) == ""  || trim($_POST["inputTelefonoAlmacen"]) == "" || trim($_POST["inputEncargadoAlmacen"]) == "") {
        echo "false";
        
    } else {
        $almacenCont =  new AlmacenDAOController();
        if($almacenCont->validarAlmacenExiste($_POST["inputNombreAlmacen"])){
            echo "existe";
        }else{
             $almacenCont =  new AlmacenDAOController();
            if ($almacenCont->insertarAlmacen($_POST["inputNombreAlmacen"], $_POST["inputDireccionAlmacen"], $_POST["inputEmailAlmacen"], $_POST["inputTelefonoAlmacen"], $_POST["inputEncargadoAlmacen"])) {
                echo "true";
            } else {
                echo "false";
            }
        }    
    }
} else {
    echo "false";
}

