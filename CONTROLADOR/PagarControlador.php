<?php

require_once '../DAO/PedidoDAO.php';
require_once '../VISTAS/carrito.php';
session_start();
$_SESSION['CARRITO'];

if ($_post) {

    $total = 0;

    foreach ($_SESSION['CARRITO'] as $producto => $indi) {
        $total = $total + ($indi['P_PRECIO'] * $indi['P_CANTIDAD']);
    }
    $_SESSION['monto'] = $total;


//        //Registrar Pedido
//        $SID = session_id();
//        $objpedidoDAO= new PedidoDAO();
//        
//        foreach ($_SESSION['CARRITO'] as $producto => $indi) {
//            $total = $total + ($indi['P_PRECIO'] * $indi['P_CANTIDAD']);
//            $objpedidoDAO->InsertarPedidoCli($objPedido);
//        }
}


