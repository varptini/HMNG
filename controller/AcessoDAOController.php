<?php
include '../model/AcessoDAO.php';

class AcessoDAOController{
    function loginUsuario($usuario) {
        $obj = new AcessoDAO();
        return $obj->loginUsuario($usuario);
    }
    function ObtenerNombreUsuario($idusuario){
        $obj = new AcessoDAO();
        return $obj->ObtenerNombreUsuario($idusuario);
    }
    function ObtenerPuesto($idPuesto) {
        $obj = new AcessoDAO();
        return $obj->ObtenerPuesto($idPuesto);
    }
     public function AsignarNombreUsuario($nombreuser){
        $obj = new AcessoDAO();
        return $obj->AsignarNombreUsuario($nombreuser);
    }
    function ObtenerIdServico($Puesto){
        $obj = new AcessoDAO();
        return $obj->ObtenerIdServico($Puesto);
    }
}
