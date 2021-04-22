<?php
include '../model/AlmacenDAO.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AlmacenDAOController
 *
 * @author varpt
 */
class AlmacenDAOController {
    function insertarAlmacen($almacennombre, $almacendireccion,$almacenemail, $almacentelefono, $almacenencargado){
         $obj = new AlmacenDAO();
         return $obj->insertarAlmacen($almacennombre, $almacendireccion,$almacenemail, $almacentelefono, $almacenencargado);
     }
     
     function validarAlmacenExiste($almacennombre){
         $obj = new AlmacenDAO();
         return $obj->validarAlmacenExiste($almacennombre);
    }
    function validarAlmacenAsignadoInsumo($IdAlamcen) {
         $obj = new AlmacenDAO();
         return $obj->validarAlmacenAsignadoInsumo($IdAlamcen);
    }
    function eliminarAlmacen($IdAlamcen){
        $obj = new AlmacenDAO();
        return $obj->eliminarAlmacen($IdAlamcen);
    }
    function actualizarAlmacen($idAlmacen,$almacennombre, $almacendireccion,$almacenemail, $almacentelefono, $almacenencargado){
         $obj = new AlmacenDAO();
         return $obj->actualizarAlmacen($idAlmacen,$almacennombre, $almacendireccion,$almacenemail, $almacentelefono, $almacenencargado);
     }
}


