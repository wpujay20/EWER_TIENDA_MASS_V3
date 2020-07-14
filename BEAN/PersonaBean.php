<?php


class PersonaBean {
    
    public $id_persona;
    public $per_nombre;
    public $per_apellido;
    public $per_dni;   
    public $per_numero;
    public $per_direccion;
    public $per_email;


    function getId_persona() {
        return $this->id_persona;
    }

    function getPer_nombre() {
        return $this->per_nombre;
    }

    function getPer_apellido() {
        return $this->per_apellido;
    }

    function getPer_dni() {
        return $this->per_dni;
    }

    function getPer_numero() {
        return $this->per_numero;
    }

    function getPer_direccion() {
        return $this->per_direccion;
    }

    function getPer_email() {
        return $this->per_email;
    }

    function setId_persona($id_persona) {
        $this->id_persona = $id_persona;
    }

    function setPer_nombre($per_nombre) {
        $this->per_nombre = $per_nombre;
    }

    function setPer_apellido($per_apellido) {
        $this->per_apellido = $per_apellido;
    }

    function setPer_dni($per_dni) {
        $this->per_dni = $per_dni;
    }

    function setPer_numero($per_numero) {
        $this->per_numero = $per_numero;
    }

    function setPer_direccion($per_direccion) {
        $this->per_direccion = $per_direccion;
    }

    function setPer_email($per_email) {
        $this->per_email = $per_email;
    }


}
