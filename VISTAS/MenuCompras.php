
<html>
    <head>
        <meta charset="utf-8">
        <title>Menu Compras</title>
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


        
        
        <script src="../JAVASCRIPT/Jquery/jquery-1.6.3.min.js"></script>
        <script src="../JAVASCRIPT/fancybox/jquery.fancybox-1.3.4.js"></script>
        <script src="../JAVASCRIPT/fancybox01.js"></script>
        
    </head>
    <?php
    if (!isset($_SESSION["lista"])) {
        session_start();
        $lista = $_SESSION["lista"];
    }

//    if (!empty($_SESSION["ID_CLIENTE"])) {
//        session_start();
//        $ID_PERSONA = $_SESSION["ID_CLIENTE"];
//    }

    if (!isset($_SESSION["id_usuario"])) {  //SI NO SE HA INICIADO SESION  CON EL ID ENTONCES REDIERECCIONAR AL INDEX
        echo'<script src="../JAVASCRIPT/RestringirTienda.js"></script>  ';
        //  echo '<script>  document.location.href="../index.php"; </script>';
    }

//SI SE HA INICIADO SESION ENTONCES...
    ?>

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
                            <li class="nav-item">
                                <input type="hidden"id="valor" value="<?php echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION["CARRITO"]); ?>">

                                <a class="nav-link" id="carrito"   href="carrito.php">Carrito(  <?php echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION["CARRITO"]); ?>)</a>

                            </li>
                            <li>
                                <a class="nav-link" id="carrito"   href="../CONTROLADOR/TiendaControlador.php?op=2">Mis Pedidos</a>

                            </li>

                        </ul>


                        <!--Falta avanzar-->
                        <form  name= "form" class="navbar-form navbar-right" role="search">

                            <a id="cerrar" class="btn btn-warning">

                                Cerrar Sesion
                            </a>
                        </form>

                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </header>

        <div class="container">
            <center>
                <?php //if($mensaje!= "") {    ?>
                <div class="alert alert-success">
                    <?php //    echo $mensaje;     ?>

                    <a href="carrito.php" class="btn btn-success nav-link">Ver carrito </a>
                </div>
                <?php // }     ?>

                <div class="contenedorDeProductos">

                    <table class="tablaProductos" >
                        <?php
                        $num = 0;
                        foreach ($lista as $indice) {
                            if ($num == 3) {
                                echo"<tr>";
                                $num = 1;
                            } else {
                                $num++;
                            }
                            ?>
                            <td>
                                <div class="div_imagen">
                                    <img src="../img/PRODUCTOS/<?php echo $indice["pro_imagen"]; ?>" width="150" height="150">
                                    <br>
                                    <a class="iframe btn btn-warning"  name="elegir"
                                       href="../VISTAS/Detallar_Productos.php?id=<?php echo $indice["ID_producto"]; ?>&op=2"> visualizar </a>
                                </div>
                            </td>
                        <?php } ?>
                    </table>
                </div>
            </center>
        </div>
       

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

        <script src="../JAVASCRIPT/Opcion_Cerrar_Sesion.js"></script>
       
    </body>


    <footer>
        <div class="container">
            <!-- This theme comes under Creative Commons Attribution 4.0 Unported. So don't remove below link back -->
            <p class="copy-right">Copyright &copy; 2020 <a href="#"> Tiendas Mass / www.masstiendasperu.com.pe</a>  Designed All rights reserved. </p>
        </div>
    </footer>

</html>

