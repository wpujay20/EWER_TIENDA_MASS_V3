<?php

session_start();
$mensaje = "";

if (isset($_REQUEST['añadir_carro'])) {
    switch ($_REQUEST["añadir_carro"]) {
        case "Agregar":{
        
                $ID         = $_REQUEST['p_id'];
                $P_NOMBRE   = $_REQUEST['p_nombre'];
                $P_PRECIO   = $_REQUEST['p_precio'];
                $P_STOCK    = $_REQUEST['p_stock'];
                $C_NOMBRE   = $_REQUEST['c_nombre'];
                $M_NOMBRE   = $_REQUEST['m_nombre'];
                $P_CANTIDAD = $_REQUEST['p_cantidad'];
                if ($P_STOCK > 0 || $P_STOCK > $P_CANTIDAD) {
                    if (!isset($_SESSION['CARRITO'])) {
                        $producto = array(
                            'ID'         => $ID,
                            'P_NOMBRE'   => $P_NOMBRE,
                            'P_PRECIO'   => $P_PRECIO,
                            'P_STOCK'    => $P_STOCK,
                            'C_NOMBRE'   => $C_NOMBRE,
                            'M_NOMBRE'   => $M_NOMBRE,
                            'P_CANTIDAD' => $P_CANTIDAD,
                        );
                        $_SESSION['CARRITO'][0] = $producto;
                        echo ' <script src="../JAVASCRIPT/Jquery/jquery-1.6.3.min.js"></script>
                         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
                         <script src="../JAVASCRIPT/ProductoAñadido.js"></script>';

                        // header('location:../VISTAS/MenuCompras.php');
                        //                    echo"<script>alert('El producto ha agregado al carrito');</script>";
                        //                    header('location:../VISTAS/carrito.php');
                    } else {
                        $idProductos = array_column($_SESSION['CARRITO'], "ID");

                        if (in_array($ID, $idProductos)) {
                            echo "<script>alert('El producto ya ha sido seleccionado..');</script>";
                            echo "<script>parent.jQuery.fancybox.close();</script>";

                            $mensaje = "";
                        } else {
                            $NumeroProductos = count($_SESSION['CARRITO']);
                            $producto        = array(
                                'ID'         => $ID,
                                'P_NOMBRE'   => $P_NOMBRE,
                                'P_PRECIO'   => $P_PRECIO,
                                'P_STOCK'    => $P_STOCK,
                                'C_NOMBRE'   => $C_NOMBRE,
                                'M_NOMBRE'   => $M_NOMBRE,
                                'P_CANTIDAD' => $P_CANTIDAD,
                            );
                            $_SESSION['CARRITO'][$NumeroProductos] = $producto;
                            echo ' <script src="../JAVASCRIPT/Jquery/jquery-1.6.3.min.js"></script>
                         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
                         <script src="../JAVASCRIPT/ProductoAñadido.js"></script>
                         ';

                            // header('location:../VISTAS/MenuCompras.php');
                            // echo"<script>parent.jQuery.fancybox.close();</script>";
                        }
                    }
                } else {
                    if ($P_STOCK <= 0) {
                        echo ' <script src="../JAVASCRIPT/Jquery/jquery-1.6.3.min.js"></script>
                         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
                         <script src="../JAVASCRIPT/StockAgotado.js"></script>
                         ';

                    } else {
                        if ($P_CANTIDAD > $P_STOCK) {

                            echo ' <script src="../JAVASCRIPT/Jquery/jquery-1.6.3.min.js"></script>
                         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
                         <script src="../JAVASCRIPT/CantidadProductoError.js"></script>
                         ';
                        }

                    }

                }

//                echo "<script> location.reload();'</script>";

                break;
            }
        case "Eliminar":{

                if (is_numeric($_REQUEST['id'])) {
                    $ID = $_REQUEST['id'];

                    foreach ($_SESSION['CARRITO'] as $indi => $producto) {
                        if ($producto['ID'] == $ID) {
                            unset($_SESSION['CARRITO'][$indi]);
                            echo "<script> alert('Elemento borrado...');</script>";
                            header('location:../VISTAS/carrito.php');
                        } else {
                            $mensaje .= "Upss... ID Incorecto" . $ID . "<br/>";
                        }
                    }
                }

                break;
            }
    }
}
