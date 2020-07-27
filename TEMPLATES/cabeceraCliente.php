<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Inicio</title>
        <!-- Description, Keywords and Author -->
        <meta name="description" content="Your description">
        <meta name="keywords" content="Your,Keywords">
        <meta name="author" content="ResponsiveWebInc">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">	
        <!-- Styles -->

<!--        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">		
        <link href="css/style.css" rel="stylesheet">-->
        <link rel="shortcut icon" href="#">
        
        <link href="CSS/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/style.css" rel="stylesheet" type="text/css"/>
        
        
    </head>
    <body>
        <input type="hidden" name="op">
        <div class="wrapper">
            <!-- header -->
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
                            <a class="navbar-brand" href="#"><img class="img-responsive" src="img/logo.png" alt="Logo" /></a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">

                                <li><a href=index.php>Inicio</a></li>
                                <li class="dropdown">
                                    <a href="CONTROLADOR/TiendaControlador.php?op=1" class="dropdown-toggle" >Realizar Compra</a>

                                </li>
                                <!--                                <li><a href="LoginCliente.php">Login</a></li>
                                                                <li><a href="RegistraCliente.php">Registrate Aqui</a></li>-->
                            </ul> 

                            <!--                    <form  name= "form" class="navbar-form navbar-right" role="search">
                                                    <a id="cerrar" class="btn btn-warning">Cerrar Sesion</a>
                                                    
                                                </form>-->

                            <?php
                            session_start();
                            if (!empty($_SESSION["id_usuario"])) {

                                echo ' <form  name= "form" class="navbar-form navbar-right" role="search">
                                    <a onclick="cerrar()" class="btn btn-warning">Cerrar Sesion</a>
                                </form>';
                            } else {
                                echo ' <ul class="nav navbar-nav"> 
                                <li><a href="LoginCliente.php">Login</a></li>
                                <li><a href="RegistraCliente.php">Registrate Aqui</a></li>
                            </ul>   ';
                            }
                            ?>



                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
              
                <script>
//                    function cerrar() {
//                        $(document).ready(function () {
//
//                            Swal.fire({
//                                title: "Cerrar la Sesion",
//                                html: '<h4><strong> ¿Estas Seguro? </strong></h4>',
//                                icon: "question",
//                                padding: '1rem',
//                                timer: 10000,
//                                timerProgressBar: true,
//                                position: 'center'
//
//                            });
//
//                            $("button").click(function () {
//                                //window.location.href="CONTROLADOR/Controlador_Sesiones.php";
//                                window.location.href = "CONTROLADOR/Controlador_Sesiones.php";
//
//                            });
//
//                        }); 
//                    }
 
                </script>
            </header>
