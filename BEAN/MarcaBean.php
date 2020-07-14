<?php

class MarcaBean {
    
    public $ID_marca;
    public $marca_nombre;
    public $marca_descripcion;
    
    
    function getID_marca() {
        return $this->ID_marca;
    }

    function getMarca_nombre() {
        return $this->marca_nombre;
    }

    function getMarca_descripcion() {
        return $this->marca_descripcion;
    }

    function setID_marca($ID_marca) {
        $this->ID_marca = $ID_marca;
    }

    function setMarca_nombre($marca_nombre) {
        $this->marca_nombre = $marca_nombre;
    }

    function setMarca_descripcion($marca_descripcion) {
        $this->marca_descripcion = $marca_descripcion;
    }


    
}