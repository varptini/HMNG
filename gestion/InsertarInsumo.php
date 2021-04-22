<?php
include '../controller/InsumoDAOController.php';

//    print $_POST["inputInsumoDescripcion"];
    if (isset($_POST["inputInsumoNombreComercial"]) || isset($_POST["inputInsumoNombreGenerico"]) || isset($_POST["inputInsumoDescripcion"]) || isset($_POST["selectInsumoUnidadMedida"]) || isset($_POST["inputinsumoCantidadMinima"])|| isset($_POST["selectInsumoAlmacen"])) {

        if (trim($_POST["inputInsumoNombreComercial"]) == "" || trim($_POST["inputInsumoNombreGenerico"]) == ""  || trim($_POST["inputInsumoDescripcion"]) == "" ) {
            echo "false";     
        } else {
            $insumoCont =  new insumoDAOController();
                if ($insumoCont->Agregar_InsumoNoRegistrado($_POST["inputInsumoNombreComercial"],$_POST["inputInsumoNombreGenerico"],$_POST["inputInsumoDescripcion"],$_POST["selectInsumoUnidadMedida"],$_POST["inputinsumoCantidadMinima"],$_POST["selectInsumoAlmacen"])) {
                    echo "verdadero";
                } else {
                    echo "false";
                }
              
        }
    } else {
        echo "false";
    }
 
    
