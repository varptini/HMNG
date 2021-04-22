<?php
include '../model/perfilDAO.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PerfilDAOController
 *
 * @author varpt
 */
class PerfilDAOController {
    //put your code here
    function actualizarPerfil($idEmpleado, $DireccionEmpleado, $TelefonoEmpleado, $EmailEmpleado, $CelularEmpleado,$fechaNacEmpleado) {
        $obj = new perfilDAO();
        return $obj->actualizarPerfil($idEmpleado, $DireccionEmpleado, $TelefonoEmpleado, $EmailEmpleado, $CelularEmpleado,$fechaNacEmpleado);
    }
    function actualizarClave($id,$clave){
        $obj = new perfilDAO();
        return $obj->actualizarClave($id,$clave);
    }
}
