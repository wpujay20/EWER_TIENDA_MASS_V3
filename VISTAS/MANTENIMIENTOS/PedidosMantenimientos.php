<?php
session_start();
if (!isset($_SESSION['id_persona'])) {  //SI NO SE HA INICIADO SESION  CON EL ID ENTONCES REDIERECCIONAR AL INDEX 
    echo '<script> document.location.href="../../index.php"';
}
if (isset($_SESSION['Pedidos'])) {
    $pedidos = $_SESSION['Pedidos'];
}
//var_dump($pedidos);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title> Menu Pedidos </title>

        <!-- REQUERIDO PARA EL DATA TABLE -->

        <link rel="stylesheet" href="../../CSS/bootstrap.min.css">
        <link rel="stylesheet" href="../../datatables/main.css">  
        <link rel="stylesheet" type="text/css" href="../../datatables/datatables.min.css"/>
        <link rel="stylesheet"  type="text/css" href="../../datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

        <!-- REQUERIDO PARA EL EL SLIDER -->
        <link rel="stylesheet"  type="text/css" href="../../CSS/ADMIN_CSS/menu_mantenimientos.css">
  <link href="../../CSS/font-awesome.min.css" rel="stylesheet" type="text/css"/>



    </head>

    <body > 
        <header>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img class="img-responsive" src="../../img/logo.png" alt="Logo" /></a>
            </div>
            <br>
            <a class="h4 btn"  ><p class="fa fa-user"> Usuario: </p><?php echo $_SESSION["datosAdmin"][1]["per_nombre"] . " " . $_SESSION["datosAdmin"][1]["per_apellido"] ?></a>

        </header>   
        <!-----------------------------------------------------------------ZONA SLIDER----------------------------------------------------------------->

        <div id="menu">
            <?php include './opciones.php';?>
        </div>


        <div style="height:50px"></div>
    <center><h3>Pedidos</h3> </center>


    <!-----------------------------------------------------------------Ejemplo tabla con DataTables----------------------------------------------------------------->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form name="form" method="POST" action="../../CONTROLADOR/Mantenimiento_controlador.php?op=11">
                    <div class="table-responsive">        
                        <table   style="font-size: small" id="example" class="table table-striped table-bordered" style="width:100%">

                            <thead>

                            <th>ID_Pedido</th>
                            <th>Cliente</th>
                            <th>Email</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                            <th>Acciones</th>

                            </thead> 
                            <tbody>
                                <?php
                                foreach ($pedidos as $ped) {
                                    ?>
                                    <tr>
                                        <td><?php echo $ped['id_pedido']; ?></td>
                                        <td><?php echo $ped['per_nombre']; ?></td>
                                        <td><?php echo $ped['per_email']; ?></td>
                                        <td><?php echo $ped['pedido_estado']; ?></td>
                                        <td><?php echo $ped['pedido_fecha']; ?></td>

                                        <?php
                                        if ($ped['pedido_estado'] == 'Pendiente') {
                                            ?> 
                                            <td><a href="../../CONTROLADOR/Mantenimiento_controlador.php?op=27&pedidoID='<?php echo number_format($ped['id_pedido'], 0); ?>'"  class="btn btn-warning">Empacar</a>
                                                <a onclick="mostrar()" href="../../CONTROLADOR/TiendaControlador.php?op=4&pedidoID='<?php echo number_format($ped['id_pedido'], 0) ?>'"  class="btn btn-info">Ver Detalle</a>
                                            </td>

                                        <?php
                                        } else {
                                            if ($ped['pedido_estado'] == 'Empacando') {
                                                ?>
                                                <td>
                                                    <a href="../../CONTROLADOR/Mantenimiento_controlador.php?op=26&pedidoID='<?php echo number_format($ped['id_pedido'], 0); ?>'" class="btn btn-primary">Pedido Listo</a>
                                                    <a onclick="mostrar()" href="../../CONTROLADOR/TiendaControlador.php?op=4&pedidoID='<?php echo number_format($ped['id_pedido'], 0) ?>'"  class="btn btn-info">Ver Detalle</a>
                                                </td>

                                                <?php
                                            }else{
                                                if($ped['pedido_estado'] == 'Listo para recoger'){
                                            ?>
                                                <td>
                                                    <a href="../../CONTROLADOR/Mantenimiento_controlador.php?op=28&pedidoID='<?php echo number_format($ped['id_pedido'], 0); ?>'" class="btn btn-success">Pedido Entregado</a>
                                                    <a onclick="mostrar()" href="../../CONTROLADOR/TiendaControlador.php?op=4&pedidoID='<?php echo number_format($ped['id_pedido'], 0) ?>'"  class="btn btn-info">Ver Detalle</a>
                                                </td>
                                            <?php
                                                }else{
                                            ?>
                                                <td>
                                                    <a onclick="mostrar()" href="../../CONTROLADOR/TiendaControlador.php?op=4&pedidoID='<?php echo number_format($ped['id_pedido'], 0) ?>'"  class="btn btn-info">Ver Detalle</a>
                                                </td>
                                            <?php
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                </tr>
                            </tbody>

                        </table>

                    </div>
                </form>
            </div>            
        </div> 
    </div>  





    <!-- REQUERIDO PARA EL DATATABLE -->
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });

        function mostrar() {
            window.open('../../REPORTES/boleta.php', '_blank');

        }
    </script>
    <!-- REQUERIDO PARA EL DATATABLE -->
    <script src="../../JAVASCRIPT/Jquery/jquery-3.3.1.min.js"></script>
    <script src="../../JAVASCRIPT/popper/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../datatables/datatables.min.js"></script>    
    <script type="text/javascript" src="../../datatables/main.js"></script>  



    <!---  AQUI IMPOTAMOS EL JAVASCRIP DEL SLIDER DESPUES DE LA LIBRERIA EASING -->
    <script src="../../js/jquery.easing.1.3.js"></script>
    <script src="../../JAVASCRIPT/Slider.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script src="../../JAVASCRIPT/Cerrar_Sesion(Admin).js"></script>


</body>
</html>

