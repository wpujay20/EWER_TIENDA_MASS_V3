<?php
require_once '../BEAN/PedidoBean.php';

session_start();

$ListaPedidos = $_SESSION['ListaPedidos'];
//var_dump($ListaPedidos);
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Lista de compras</title>
        <!-- REQUERIDO PARA EL DATA TABLE -->

        <link rel="stylesheet" href="../CSS/bootstrap.min.css">
        <link rel="stylesheet" href="../datatables/main.css">
        <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css"/>
        <link rel="stylesheet"  type="text/css" href="../datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
        <!-- Description, Keywords and Author -->
        <meta name="description" content="Your description">
        <meta name="keywords" content="Your,Keywords">
        <meta name="author" content="ResponsiveWebInc">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Styles -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <link href="../CSS/estilo_MenuTienda.css" rel="stylesheet">


    </head>
    <?php
    if (!empty($_SESSION['ListaPedidos'])) {

    if (!isset($_SESSION["id_usuario"])) {
    //SI NO SE HA INICIADO SESION  CON EL ID ENTONCES REDIERECCIONAR AL INDEX
    echo '<script src="../JAVASCRIPT/RestringirTienda.js"></script>  ';
    echo '<script>  document.location.href="../index.php"; </script>';
    }
//SI SE HA INICIADO SESION ENTONCES...
    ?>

    <body  >


        <header>
            <!-- navigation -->
            <nav class="navbar navbar-default" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="../index.php"><img class="img-responsive" src="../img/logo.png" alt="Logo" /></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                        <ul class="nav navbar-nav">

                            <li><a href=../index.php>Inicio</a></li>
                            <li><a href=MenuCompras.php>Realizar Compras</a></li>
                            <li class="nav-item">
                                <input type="hidden"id="valor" value="<?php echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION["CARRITO"]); ?>">

                                <a class="nav-link" id="carrito"   href="carrito.php">Carrito(  <?php echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION["CARRITO"]); ?>)</a>
                            </li>
                            <li>
                                <a class="nav-link" id="carrito"   href="../CONTROLADOR/TiendaControlador.php?op=2">Mis Compras</a>

                            </li>

                        </ul>


                        <!--Falta avanzar-->
                        <form   class="navbar-form navbar-right" role="search">
                            <a id="cerrar2" type="submit"   class="btn btn-warning">
                                Cerrar Sesion
                            </a>
                        </form>

                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </header>

    <center>
        <h3>Lista de Compras Realizados</h3>
        <div class="container">
            <!-- Content here -->

            <form name="form" method="post">

                <div class="table-responsive">
                    <table     id="example" class="table table-striped table-bordered " style="width:100%">
                        <thead>
                            <tr>
                                <!-- <th>ID compra</th> -->
                                <th>Monto compra</th>
                                <th>Fecha del compra</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                        </thead>
                        <tbody>
                            <?php foreach ($ListaPedidos as $pedido) {
                            ?>
                            <tr>
                                <!-- <td ><?php // echo number_format($pedido['id_pedido'], 0)   ?> </td> -->
                                <td><?php echo $pedido['pedido_monto'] ?></td>
                                <td><?php echo $pedido['pedido_fecha'] ?> </td>
                                <td><?php echo $pedido['pedido_estado'] ?> </td>
                                <td>

                                    <a  class="btn btn-info" onclick="mostrar()"type="submit"  href="../CONTROLADOR/TiendaControlador.php?op=3&pedidoID='<?php echo number_format($pedido['id_pedido'], 0) ?> ?>'" >Mostrar
                                    </a>
                                </td>
                            </tr>
                            <?php }
                            ?>
                        </tbody>
 
                </tbody>
                </table>

            </form>
        </div>
        <script language=javascript>
            function mostrar() {
                window.open('../REPORTES/boleta.php', '_blank');
                
            }

        </script>
    </center>
    <?php ?>
    <!-- Javascript files -->
    <!-- jQuery -->
    <script src="../js/jquery-3.2.1.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="../JAVASCRIPT/SessionClose.js" type="text/javascript"></script>
    <script src="../JAVASCRIPT/Opcion_Cerrar_Sesion.js"></script>
    <?php } else { ?>
        <br>    <br>


        <div class="container">
            <a class="btn btn-success nav-link" href="MenuCompras.php">Regresar a Menu Compras</a>
            <br><br>


            <div class="alert alert-warning">
                <h3>  No hay Pedidos Registrados...    </h3>

            </div>

        </div>


    <?php } ?>
    <script>

            $(document).ready(function () {
                $('#tablaPedido').DataTable({
                    language: {
                        "sProcessing": "Procesando...",
                        "sLengthMenu": "Mostrar _MENU_ registros",
                        "sZeroRecords": "No se encontraron resultados",
                        "sEmptyTable": "Ningún dato disponible en esta tabla",
                        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix": "",
                        "sSearch": "Buscar:",
                        "sUrl": "",
                        "sInfoThousands": ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst": "Primero",
                            "sLast": "Último",
                            "sNext": "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        },
                        "buttons": {
                            "copy": "Copiar",
                            "colvis": "Visibilidad"
                        }
                    }
                });
            });

    </script>
    <!-- REQUERIDO PARA EL DATATABLE -->
    <script src="../JAVASCRIPT/Jquery/jquery-3.3.1.min.js"></script>
    <script src="../JAVASCRIPT/popper/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../datatables/datatables.min.js"></script>
    <script type="text/javascript" src="../datatables/main.js"></script>


    <br><br><br><br><br><br><br><br><br><br><br>

    <footer  style="width:100%">
        <div class="container" style="width:100%">
            <!-- This theme comes under Creative Commons Attribution 4.0 Unported. So don't remove below link back -->
            <p class="copy-right">Copyright &copy; 2020 <a href="#"> Tiendas Mass / www.masstiendasperu.com.pe</a>  Designed All rights reserved. </p>
        </div>
    </footer>
</body>
</html>