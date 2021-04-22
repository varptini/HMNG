<?php

class empleado {
    public $empleadoid;
    public $empleadonombrecompleto;
    public $empleadodireccion;
    public $empleadotelefono;
    public $empleadoemail;
    public $empleadocelular;
    public $empleadofechanacimiento;

    function getEmpleadoid() {
        return $this->empleadoid;
    }

    function getEmpleadonombrecompleto() {
        return $this->empleadonombrecompleto;
    }
    
    function getEmpleadodireccion() {
        return $this->empleadodireccion;
    }
    function getEmpleadotelefono() {
        return $this->empleadotelefono;
    }
    
    function getEmpleadoemail() {
        return $this->empleadoemail;
    }

    function getEmpleadocelular() {
        return $this->empleadocelular;
    }

    function getEmpleadofechanacimiento() {
        return $this->empleadofechanacimiento; ;
    }

    

    function setEmpleadoid($empleadoid) {
        $this->empleadoid = $empleadoid;
    }

    function setEmpleadonombrecompleto($empleadonombrecompleto) {
        $this->empleadonombrecompleto = $empleadonombrecompleto;
    }
    
    function setEmpleadodireccion($empleadodireccion) {
        $this->empleadodireccion = $empleadodireccion;
    }

    function setEmpleadotelefono($empleadotelefono) {
        $this->empleadotelefono = $empleadotelefono;
    }

    function setEmpleadoemail($empleadoemail) {
        $this->empleadoemail = $empleadoemail;
    }

    function setEmpleadocelular($empleadocelular) {
        $this->empleadocelular = $empleadocelular;
    }
    
    function setEmpleadofechanacimiento($empleadofechanacimiento) {
        $this->empleadofechanacimiento = $empleadofechanacimiento;
    }

  




}

