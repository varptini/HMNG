<?php
include '../model/UsuarioDAO.php';

class usuarioDAOController{
     function insertarUsuario($usuarionombrecompleto, $usuariocontrasenia, $activousuario, $usuarionombreempleado, $usuariopuesto){
         $obj = new usuarioDAO();
         return $obj->insertarUsuario($usuarionombrecompleto, $usuariocontrasenia, $activousuario, $usuarionombreempleado, $usuariopuesto);
     }
     
     function validarUsuarioExiste($usuarioNombre){
         $obj = new usuarioDAO();
         return $obj->validarUsuarioExiste($usuarioNombre);
     }
     
     function actualizarUsuario($usuarioid, $usuarionombrecompleto, $usuariocontrasenia, $activousuario, $usuarionombreempleado, $usuariopuesto) {
        $obj = new usuarioDAO();
        return $obj->actualizarUsuario($usuarioid, $usuarionombrecompleto, $usuariocontrasenia, $activousuario, $usuarionombreempleado, $usuariopuesto);
     }
//     
//     function validarUsuarioExisteId($usuarioid){
//         $obj = new usuarioDAO();
//         return $obj->validarUsuarioExisteId($usuarioid);
//     }
//     
     function eliminarUsuario($usuarioid){
         $obj = new usuarioDAO();
         return $obj->eliminarUsuario($usuarioid);
     }
}