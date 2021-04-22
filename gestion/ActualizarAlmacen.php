<?php

include '../controller/AlmacenDAOController.php';
//print $_POST["inputIdAlmacen"];
//print $_POST["inputNombreAlmacen"];
//print $_POST["inputDireccionAlmacen"];
//print $_POST["inputTelefonoAlmacen"];
//print $_POST["inputEmailAlmacen"];
//print $_POST["inputEncargadoAlmacen"];
//
//
//
//

if (isset($_POST["inputIdAlmacen"]) || isset($_POST["inputNombreAlmacen"]) || isset($_POST["inputDireccionAlmacen"])|| isset($_POST["inputTelefonoAlmacen"])|| isset($_POST["inputEmailAlmacen"])|| isset($_POST["inputEncargadoAlmacen"])) {
    if (trim($_POST["inputNombreAlmacen"]) == "" || trim($_POST["inputDireccionAlmacen"]) == "" || trim($_POST["inputTelefonoAlmacen"]) == ""|| trim($_POST["inputEmailAlmacen"]) == ""|| trim($_POST["inputEncargadoAlmacen"]) == "") {
        echo "false";
    } else {
        $almacenController = new AlmacenDAOController();
        if($almacenController->actualizarAlmacen($_POST["inputIdAlmacen"],$_POST["inputNombreAlmacen"],$_POST["inputDireccionAlmacen"],$_POST["inputEmailAlmacen"],$_POST["inputTelefonoAlmacen"],$_POST["inputEncargadoAlmacen"])){
            echo 'actualizado';
        }else{
            echo 'false';
        }              
    }
} else {
    echo "false";
}