<?php

include '../controller/InsumoDAOController.php';
//print $_POST["inputInsumoId"];
//print $_POST["inputInsumoNombreComercial"];
//print $_POST["inputInsumoNombreGenerico"];
//print $_POST["inputInsumoDescripcion"];
//print $_POST["selectInsumoUnidadMedida"];
//print $_POST["inputinsumoCantidadMinima"];
//print $_POST["selectInsumoAlmacen"];
//
//
//
//

if (isset($_POST["inputInsumoId"]) || isset($_POST["inputInsumoNombreComercial"]) || isset($_POST["inputInsumoNombreGenerico"])|| isset($_POST["inputInsumoDescripcion"])|| isset($_POST["inputinsumoCantidadMinima"])|| isset($_POST["selectInsumoUnidadMedida"])|| isset($_POST["selectInsumoAlmacen"])) {
    if (trim($_POST["inputInsumoNombreComercial"]) == "" || trim($_POST["inputInsumoNombreGenerico"]) == ""|| trim($_POST["inputInsumoDescripcion"]) == ""|| trim($_POST["inputinsumoCantidadMinima"]) == "") {
        echo "false";
    } else {
        $InsumoController = new insumoDAOController();
        if($InsumoController->actualizarInsumo($_POST["inputInsumoId"],$_POST["inputInsumoNombreComercial"],$_POST["inputInsumoNombreGenerico"],$_POST["inputInsumoDescripcion"],$_POST["selectInsumoUnidadMedida"],$_POST["inputinsumoCantidadMinima"],$_POST["selectInsumoAlmacen"])){
            echo 'actualizado';
        }else{
            echo 'false';
        }              
    }
} else {
    echo "false";
}
