
<?php 
session_start();
?>
<html>
<head>

    <title>Lista del carrito</title>
</head>
<link href="../CSS/bootstrap.css" rel="stylesheet" type="text/css"/>
 <!-- Description, Keywords and Author -->
        <meta name="description" content="Your description">
        <meta name="keywords" content="Your,Keywords">
        <meta name="author" content="ResponsiveWebInc">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Styles -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../JAVASCRIPT/fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <link href="../CSS/estilo_MenuTienda.css" rel="stylesheet">
         <!-- Javascript files -->
        <!-- jQuery -->
       
        <!-- Bootstrap JS -->
        <script src="../js/bootstrap.min.js"></script>
        <!-- Respond JS for IE8 -->
        <script src="../js/respond.min.js"></script>
        <!-- HTML5 Support for IE -->
        <script src="../js/html5shiv.js"></script>
        <!-- Custom JS -->
        <script src="../js/custom.js"></script>

  <!-- REQUERIDO PARA EL DATATABLE -->
    <script src="../JAVASCRIPT/Jquery/jquery-3.3.1.min.js"></script>
    <script src="../JAVASCRIPT/popper/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../datatables/datatables.min.js"></script>
    <script type="text/javascript" src="../datatables/main.js"></script>



<body>
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

                            <a id="" type="submit" href="../CONTROLADOR/Controlador_Sesiones.php" class="btn btn-warning">
                                Cerrar Sesion
                            </a>
                        </form>

                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </header>
<center>
    <h3>Lista del carrito</h3>
</center>
 
<?php
 
if (!empty($_SESSION['CARRITO'])) {
    //var_dump($_SESSION['CARRITO']);
    // unset($_SESSION['CARRITO']);
    ?>



    <center>
          <a class="btn btn-success nav-link " href="MenuCompras.php">Regresar a Menu Compras</a>
            <br><br> <br><br>
        <div class="container"> 
          



            <table class="table table-hover  " style="font-size: larger">
                <thead  >
                    <tr class="text-center" > 
                        <th>ID</th>
                        <th>Nombre del Producto</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Categoria</th>
                        <th>Marca</th>
                        <th>cantidad</th>
                        <th>SubTotal</th>
                        <th>Opción</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>

                    <?php foreach ($_SESSION['CARRITO']as $producto => $indi) {
                        ?>
                        <tr>
                            <td  class="text-center"><?php echo number_format($indi['ID'], 0) ?></td>
                            <td  class="text-center"><?php echo $indi['P_NOMBRE'] ?></td>
                            <td  id="precio"class="text-center">S/  <?php echo number_format($indi['P_PRECIO'], 2) ?></td>
                            <td  class="text-center"><?php echo $indi['P_STOCK']; ?></td>
                            <td  class="text-center"><?php echo $indi['C_NOMBRE']; ?></td>
                            <td  class="text-center"><?php echo $indi['M_NOMBRE']; ?></td>
                            <td   class="boton"><?php echo $indi['P_CANTIDAD']; ?></td>
                            <td   id="subtotal" class="text-center">S/ <?php echo number_format($indi['P_PRECIO'] * $indi['P_CANTIDAD'], 2) ?></td>

                            <td   class="text-center"> 
                                <?php
                                ?>
                                <form action="../CONTROLADOR/PedioControlador.php" method="post">
                                    <input type="hidden" name="id" id="id" value="<?php echo number_format($indi['ID'], 0) ?>">
                                    <button class="btn btn-danger" type="submit "name="añadir_carro" value="Eliminar" >Eliminar </button>
                                </form>
                            </td>                             
                        </tr>

                        <?php
                        $total = $total + (number_format($indi['P_PRECIO'] * $indi['P_CANTIDAD'], 2));
                        $_SESSION['total'] = $total;
                    }
                    ?>
                    <tr>
                        <td colspan="7" align="right"><h3>Total</h3> </td>
                        <td align="right"><h3>S/.<?php echo number_format($total, 2); ?></h3></td>

                    </tr>
                    <tr>
                        <td colspan="7" align="right">

                            <form   action="Pagar.php" method="post">

                                <button class="btn btn btn-primary bnt-lg btn-block"
                                        name="btnAccion" 
                                        type="submit" > 
                                    Proceder a pagar>>
                                </button> 
                            </form>
                        </td>
                    </tr>
                </tbody>                
            </table> 

    </center></div>


<?php } else { ?>
    <div class="container">
        <a class="btn btn-success nav-link" href="MenuCompras.php">Regresar a Menu Compras</a>
        <br><br>


        <div class="alert alert-success">
            No hay productos en el carrito...
        </div>

    </div>

<?php } ?>
<!-- Modal: modalCart -->
    </body>
    </html>