<?php

class usuario{
    public $usuarioid;
    public $usuarionombrecompleto;
    public $usuariocontrasenia;
    public $usuarioactivo;
    public $usuarionombreempleado;
    public $usuariopuesto;

    function getUsuarioid() {
        return $this->usuarioid;
    }

    function getUsuarionombrecompleto() {
        return $this->usuarionombrecompleto;
    }
    
    function getUsuariocontrasenia() {
        return $this->usuariocontrasenia;
    }
    
    function getUsuarioactivo() {
        return $this->usuarioactivo;
    }

    function getUsuarionombreempleado() {
        return $this->usuarionombreempleado;
    }

    function getUsuariopuesto() {
        return $this->usuariopuesto; ;
    }

    

    function setUsuarioid($usuarioid) {
        $this->usuarioid = $usuarioid;
    }

    function setUsuarionombrecompleto($usuarionombrecompleto) {
        $this->usuarionombrecompleto = $usuarionombrecompleto;
    }
    
    function setUsuariocontrasenia($usuariocontrasenia) {
        $this->usuariocontrasenia = $usuariocontrasenia;
    }

    function setUsuarioactivo($usuarioactivo) {
        $this->usuarioactivo = $usuarioactivo;
    }

    function setUsuarionombreempleado($usuarionombreempleado) {
        $this->usuarionombreempleado = $usuarionombreempleado;
    }

    function setUsuariopuesto($usuariopuesto) {
        $this->usuariopuesto = $usuariopuesto;
    }

  




}

