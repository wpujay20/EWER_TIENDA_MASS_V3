<?php
  

 class DetallePedidoBean {
    protected $id_det_pedido;
    protected $id_producto;
    protected $id_pedido;
    protected $cantidad_pedido;
    
    function __construct($id_det_pedido, $id_producto, $id_pedido, $cantidad_pedido) {
        $this->id_det_pedido = $id_det_pedido;
        $this->id_producto = $id_producto;
        $this->id_pedido = $id_pedido;
        $this->cantidad_pedido = $cantidad_pedido;
    }

        function getId_det_pedido() {
        return $this->id_det_pedido;
    }

    function getId_producto() {
        return $this->id_producto;
    }

    function getId_pedido() {
        return $this->id_pedido;
    }

    function getCantidad_pedido() {
        return $this->cantidad_pedido;
    }

    function setId_det_pedido($id_det_pedido) {
        $this->id_det_pedido = $id_det_pedido;
    }

    function setId_producto($id_producto) {
        $this->id_producto = $id_producto;
    }

    function setId_pedido($id_pedido) {
        $this->id_pedido = $id_pedido;
    }

    function setCantidad_pedido($cantidad_pedido) {
        $this->cantidad_pedido = $cantidad_pedido;
    }


    
}
