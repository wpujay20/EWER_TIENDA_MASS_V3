<?php

class TipoUsuarioBean{
    
    public $id_tipo_usu;
    public $rol;
    public $descripcion;
    
    function getId_tipo_usu() {
        return $this->id_tipo_usu;
    }

    function getRol() {
        return $this->rol;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId_tipo_usu($id_tipo_usu) {
        $this->id_tipo_usu = $id_tipo_usu;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


    
}