<?php
include '../model/PedidosDAO.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PedidosDAOController
 *
 * @author varpt
 */
class PedidosDAOController {
    //put your code here
    function insertarEgresoTemporal($id,$idempleado,$idservicio){
        $obj = new PedidosDAO();
        return $obj->insertarEgresoTemporal($id, $idempleado, $idservicio);
    }
    function insertarEgresoDescripcionTemporal($id,$idInsumo,$Cantidad){
        $obj = new PedidosDAO();
        return $obj->insertarEgresoDescripcionTemporal($id, $idInsumo, $Cantidad);
    }
    function validarPedidoNombreExiste($nombreegreso){
        $obj = new PedidosDAO();
        return $obj->validarPedidoNombreExiste($nombreegreso);
    }
    function generaIDPedido(){
        $obj = new PedidosDAO();
        return $obj->generaIDPedido();
    }
    function insertarEgreso($idpedido){
        $obj = new PedidosDAO();
        return $obj->insertarEgreso($idpedido);
    }
    function insertarEgresoDescripcion($id,$idInsumo,$Cantidad){
        $obj = new PedidosDAO();
        return $obj->insertarEgresoDescripcion($id, $idInsumo, $Cantidad);
    }
    function eliminaPedidoTemporal($idpedido){
        $obj = new PedidosDAO();
        return $obj->eliminaPedidoTemporal($idpedido);
    }
}
