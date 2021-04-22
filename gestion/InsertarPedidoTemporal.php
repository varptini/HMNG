<?php
include '../controller/PedidosDAOController.php';

if (!empty($_POST["checkboxInsumos"]) && is_array($_POST["checkboxInsumos"])){
    
    if ( !empty($_POST["Cantidad"]) && is_array($_POST["Cantidad"])){
        

        $PedidoObj = new PedidosDAOController();
        $keys = $_POST['checkboxInsumos'];
        $values = $_POST['Cantidad'];
        $IDEmpleado =$_POST['inputPedidoNombreID'];
        $IDServicio = $_POST['inputPedidoServicioID'];
        $array = array_combine($keys, $values);
        $IdPedido = $PedidoObj->generaIDPedido();
        if($PedidoObj->validarPedidoNombreExiste($IdPedido)){
            $IdPedido = $PedidoObj->generaIDPedido();
        }
        if($PedidoObj->insertarEgresoTemporal($IdPedido, $IDEmpleado, $IDServicio)){
            foreach($array as $idInsumo=>$Cantidad)
            {
                $PedidoObj->insertarEgresoDescripcionTemporal($IdPedido, $idInsumo, $Cantidad);
            }
        }else{
            
        }    
            
    }else{
        echo "false";
    } 
    
}else{
    echo "false";
}


//ID Pedido  aaKIZlzzHL
//ID Empleado  4
//ID Servicio  4
//Fecha Registro  America/Mexico_City
//El insumo id 3 Requiere la cantidad de 5<br>
//El insumo id 4 Requiere la cantidad de 4<br>
//El insumo id 5 Requiere la cantidad de 5<br>

//ID Pedido  a8Szwvhqpu
//ID Empleado  4
//ID Servicio  4
//El insumo id 3 Requiere la cantidad de 10<br>
//El insumo id 4 Requiere la cantidad de 10<br>
//El insumo id 5 Requiere la cantidad de 10<br>
//El insumo id 6 Requiere la cantidad de 10<br>
//El insumo id 7 Requiere la cantidad de 10<br>
//
//
//ID Pedido  @VlJnPVtz2
//ID Empleado  4
//ID Servicio  4
//El insumo id 3 Requiere la cantidad de 34<br>
//El insumo id 4 Requiere la cantidad de 2<br>
//El insumo id 5 Requiere la cantidad de 100<br>
//El insumo id 46 Requiere la cantidad de 400<br>
//

//
//stdClass Object
//(
//    [aaKIZlzzHL] => Array
//        (
//            [0] => stdClass Object
//                (
//                    [IDEMpleado] => 4
//                    [IDServicio] => 4
//                    [FechaRegistro] => 2019-06-14
//                    [insumos] => stdClass Object
//                        (
//                            [3] => 5
//                            [4] => 4
//                            [5] => 5
//                        )
//
//                )
//
//        )
//
//    [a8Szwvhqpu] => Array
//        (
//            [0] => stdClass Object
//                (
//                    [IDEMpleado] => 4
//                    [IDServicio] => 4
//                    [FechaRegistro] => 2019-06-14
//                    [insumos] => stdClass Object
//                        (
//                            [3] => 10
//                            [4] => 10
//                            [5] => 10
//                            [6] => 10
//                            [7] => 10
//                        )
//
//                )
//
//        )
//
//    [@VlJnPVtz2] => Array
//        (
//            [0] => stdClass Object
//                (
//                    [IDEMpleado] => 4
//                    [IDServicio] => 4
//                    [FechaRegistro] => 2019-06-14
//                    [insumos] => stdClass Object
//                        (
//                            [3] => 34
//                            [4] => 2
//                            [5] => 100
//                            [46] => 400
//                        )
//
//                )
//
//        )
//
//)
//
