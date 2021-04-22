<?php
include '../controller/ServicioDAOController.php';

if (isset($_POST["inputIdServicio"]) || isset($_POST["inputNombreServicio"]) || isset($_POST["textareaDescripcionServicio"])) {
    if (trim($_POST["inputIdServicio"]) == "" || trim($_POST["inputNombreServicio"]) == "" || trim($_POST["textareaDescripcionServicio"]) == "") {
        echo "false";
    } else {
        $ServicioController = new ServicioDAOController();
        if($ServicioController->actualizarServicio($_POST["inputIdServicio"], $_POST["inputNombreServicio"], $_POST["textareaDescripcionServicio"])){
            echo 'actualizado';
        }else{
            echo 'false';
        }              
    }
} else {
    echo "false";
}
