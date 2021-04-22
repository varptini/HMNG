<?php

include '../controller/InsumoDAOController.php';
//print $_POST["inputInsumoId"];
//print $_POST["inputinsumoCantidadAgregar"];
//print $_POST["inputInsumoFechaCad"];
//print $_POST["inputInsumoCodBarras"];
$time = strtotime($_POST["inputInsumoFechaCad"]);
$newformat = date('Y-m-d',$time);
//echo $newformat;

if (isset($_POST["inputInsumoId"]) || isset($_POST["inputinsumoCantidadAgregar"]) || isset($_POST["inputInsumoFechaCad"])|| isset($_POST["inputInsumoCodBarras"])) {
    if (trim($_POST["inputInsumoId"]) == "" || trim($_POST["inputinsumoCantidadAgregar"]) == ""|| trim($_POST["inputInsumoFechaCad"]) == ""|| trim($_POST["inputInsumoCodBarras"]) == "") {
        echo "false";
    } else {
        $InsumoController = new insumoDAOController();
        if($InsumoController->validarServicioCodigoBar($_POST["inputInsumoCodBarras"],$_POST["inputInsumoId"])){
                $InsumoController =  new insumoDAOController();
                if ($InsumoController->AgregarExistencia_InsumoRegistrado_ExisteCod($_POST["inputInsumoId"], $_POST["inputinsumoCantidadAgregar"],$_POST["inputInsumoCodBarras"])) {
                    echo "RegistroConCodigo";
                } else {
                    echo "false";
                }
        }else{
                $InsumoController =  new insumoDAOController();
                if ($InsumoController->Agregar_ExistenciaInsumoRegistrado_NoCodigo($_POST["inputInsumoId"],trim($_POST["inputInsumoCodBarras"]),$newformat,$_POST["inputinsumoCantidadAgregar"])) {
                    echo "RegistroSinCodigo";
                } else {
                    echo "false";
                }
        }              
    }
} else {
    echo "false";
}
