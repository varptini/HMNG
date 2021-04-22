<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../model/ServicioDAO.php';
/**
 * Description of ServicioDAOController
 *
 * @author varpt
 */
class ServicioDAOController {
    
    function insertarServicio($NombreServicio,$DescripcionServicio){
         $obj = new ServicioDAO();
         return $obj->insertarServicio($NombreServicio,$DescripcionServicio);
     }
     
     function validarServicioExiste($NombreServicio){
         $obj = new ServicioDAO();
         return $obj->validarServicioExiste($NombreServicio);
    }
    function validarServicioAsignado($Servicioid){
         $obj = new ServicioDAO();
         return $obj->validarServicioAsignado($Servicioid);
     }
     
     function eliminarServicio($Servicioid){
          $obj = new ServicioDAO();
         return $obj->eliminarServicio($Servicioid);
     }
     function actualizarServicio($id,$nombre,$descripcion){
          $obj = new ServicioDAO();
         return $obj->actualizarServicio($id,$nombre,$descripcion);
     }

}
