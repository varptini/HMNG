<?php
include '../controller/PedidosDAOController.php';
$idpedido=$_POST["inputIdPedido"];
$idinsumo=$_POST["inputIdInsumo"];
$cantidad=$_POST["inputCantidadSurtida"];
$array = array_combine($idinsumo, $cantidad);
$value = false;
if (!empty($idinsumo) && is_array($idinsumo)){
    
    if ( !empty($cantidad) && is_array($cantidad)){
        
        
        $PedidoObj = new PedidosDAOController();

        if($PedidoObj->insertarEgreso($idpedido)){
            
            foreach($array as $idInsumo=>$Cantidad)
            {
                if($PedidoObj->insertarEgresoDescripcion($idpedido, $idInsumo, $Cantidad)){}else{$value = true;break;}
            }
            if($value==true){echo "error"; }else{$PedidoObj->eliminaPedidoTemporal($idpedido);}
        }else{
            
        }    
            
    }else{
        echo "false";
    } 
    
}else{
    echo "false";
}

