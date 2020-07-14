<?php

 
class PedidoBean {
    
    public $id_pedido;
    public $id_persona;
    public $pedido_monto;
    public $pedido_fecha;
    public $pedido_estado;
    public $id_det_pedido;
    public $id_producto;
    public $det_pedido_cantidad;
    
    function getId_pedido() {
        return $this->id_pedido;
    }

    function getId_persona() {
        return $this->id_persona;
    }

    function getPedido_monto() {
        return $this->pedido_monto;
    }

    function getPedido_fecha() {
        return $this->pedido_fecha;
    }

    function getPedido_estado() {
        return $this->pedido_estado;
    }

    function getId_det_pedido() {
        return $this->id_det_pedido;
    }

    function getId_producto() {
        return $this->id_producto;
    }

    function getDet_pedido_cantidad() {
        return $this->det_pedido_cantidad;
    }

    function setId_pedido($id_pedido) {
        $this->id_pedido = $id_pedido;
    }

    function setId_persona($id_persona) {
        $this->id_persona = $id_persona;
    }

    function setPedido_monto($pedido_monto) {
        $this->pedido_monto = $pedido_monto;
    }

    function setPedido_fecha($pedido_fecha) {
        $this->pedido_fecha = $pedido_fecha;
    }

    function setPedido_estado($pedido_estado) {
        $this->pedido_estado = $pedido_estado;
    }

    function setId_det_pedido($id_det_pedido) {
        $this->id_det_pedido = $id_det_pedido;
    }

    function setId_producto($id_producto) {
        $this->id_producto = $id_producto;
    }

    function setDet_pedido_cantidad($det_pedido_cantidad) {
        $this->det_pedido_cantidad = $det_pedido_cantidad;
    }


    
}
