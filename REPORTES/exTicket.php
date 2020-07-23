<?php
//activamos almacenamiento en el buffer
ob_start();
session_start();

if (empty($_SESSION['id_usuario'])) {
    echo "<center>Debe ingresar al sistema correctamente para vosualizar el reporte</center>";
} else {
    $ListaPorIDdp = $_SESSION['ListaDetalle'];
    if ($ListaPorIDdp != null) {
        unset($_SESSION['ListaDetalle']);
        session_start();
        $ListaPorIDdp = $_SESSION['ListaDetalle'];
//        var_dump($ListaPorIDdp);
    }
    ?>
    <html>
        <head>
            <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" href="../../CSS/ticket.css">
        </head>
        <!--<body onload="window.print();">
        -->
        <body>
            <?php
$empresa   = "Tecnology S.A.C.";
    $documento = "102589524";
    $direccion = "calle los alpes 120";
    $telefono  = "854715648";
    $email     = "angelinos257@gmail.com";
    ?>
            <div class="zona_impresion">
                <!--codigo imprimir-->
                <input type="hidden" name="detalles" id="detalles">
                <br>
                <table border="0" align="center" width="300px" >
                    <tr>
                        <td align="center">
                            <!--mostramos los datos de la empresa en el doc HTML-->
                            .::<strong> Mass</strong>::.<br>
                            <?php echo $documento; ?><br>
                            <?php echo $direccion . '-' . $telefono; ?><br>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">  </td>
                    </tr>
                    <tr>
                        <td align="center" colspan=""></td>
                    </tr>
                    <tr>
                        <!--mostramos los datos del cliente -->
                        <td>Cliente:
                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            N° de venta:
                        </td>
                    </tr>
                </table>
                <br>

                <!--mostramos lod detalles de la venta -->
                <center>


                    <table border="0" align="center" width="300px">
                        <tr>
                            <td>CANT.</td>
                            <td>DESCRIPCION</td>
                            <td align="right">IMPORTE</td>
                        </tr>
                        <tr>
                            <td colspan="3">=============================================</td>
                        </tr>
                        <?php
$total = 0;
    foreach ($ListaPorIDdp as $pro) {

        ?>
                            <!--mostramos los totales de la venta-->
                            <tr>
                                <td><?php echo $pro['det_pedido_cantidad']; ?></td>
                                <td><?php echo $pro['pro_nombre']; ?></td>
                                <td align='right'>S/<?php echo $pro['pro_precio'] * $pro['det_pedido_cantidad']; ?></td>
                            </tr>
                            <?php
$total = $total + $pro['pro_precio'] * $pro['det_pedido_cantidad'];
    }

    ?>
                            <tr>
                                <td>&nbsp;</td>
                                <td align="right"><b>TOTAL:</b></td>
                                <td align="right"><b>S/. <?php echo $total ?>  </b></td>
                            </tr>
                            <tr>
                                <td colspan="3">N° de articulos:  </td>
                            </tr>

                        <tr>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center">¡Gracias por su compra!</td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center"></td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center">Lima - Peru</td>
                        </tr>
                    </table>
                </center>
                <br>
            </div>
            <p>&nbsp;</p>
        </body>
    </html>



    <?php
}
ob_end_flush();
// ob_end_flush();
?>