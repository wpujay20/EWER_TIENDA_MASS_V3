<?php

class CategoriaBean {
    
    public $ID_categoria;
    public $cat_nombre;
    public $cat_descripcion;
    
    
    function getID_categoria() {
        return $this->ID_categoria;
    }

    function getCat_nombre() {
        return $this->cat_nombre;
    }

    function getCat_descripcion() {
        return $this->cat_descripcion;
    }

    function setID_categoria($ID_categoria) {
        $this->ID_categoria = $ID_categoria;
    }

    function setCat_nombre($cat_nombre) {
        $this->cat_nombre = $cat_nombre;
    }

    function setCat_descripcion($cat_descripcion) {
        $this->cat_descripcion = $cat_descripcion;
    }


    
}