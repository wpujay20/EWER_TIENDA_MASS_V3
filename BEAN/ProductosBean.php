<?php

class ProductosBean{
    
    public $ID_producto;
    public $pro_nombre;
    public $pro_precio;
    public $pro_stock;
    public $pro_descripcion;
    public $ID_marca;
    public $ID_categoria;
    
    public function getID_producto() {
        return $this->ID_producto;
    }

    public function getPro_nombre() {
        return $this->pro_nombre;
    }

    function getPro_precio() {
        return $this->pro_precio;
    }

    public function getPro_stock() {
        return $this->pro_stock;
    }

    public function getPro_descripcion() {
        return $this->pro_descripcion;
    }

    public function getID_marca() {
        return $this->ID_marca;
    }

    public function getID_categoria() {
        return $this->ID_categoria;
    }

    public function setID_producto($ID_producto) {
        $this->ID_producto = $ID_producto;
    }

    public function setPro_nombre($pro_nombre) {
        $this->pro_nombre = $pro_nombre;
    }

    public function setPro_precio($pro_precio) {
        $this->pro_precio = $pro_precio;
    }

    public function setPro_stock($pro_stock) {
        $this->pro_stock = $pro_stock;
    }

    public function setPro_descripcion($pro_descripcion) {
        $this->pro_descripcion = $pro_descripcion;
    }

    public function setID_marca($ID_marca) {
        $this->ID_marca = $ID_marca;
    }

    public function setID_categoria($ID_categoria) {
        $this->ID_categoria = $ID_categoria;
    }


    
}