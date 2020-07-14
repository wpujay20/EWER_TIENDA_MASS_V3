<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login - PRELOG</title>
        <!-- Description, Keywords and Author -->
        <meta name="description" content="Your description">
        <meta name="keywords" content="Your,Keywords">
        <meta name="author" content="ResponsiveWebInc">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Styles -->
        <!-- Bootstrap CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Font awesome CSS -->
        <link href="css/font-awesome.min.css" rel="stylesheet">		
        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">

        <!-- Favicon -->
        <link href="CSS/EstiloRegister.css" rel="stylesheet">	
        <link rel="shortcut icon" href="#">
        <script src="js/jquery.js"></script>
        <script src="JAVASCRIPT/Jquery/jquery.validate.min.js"></script>
        <script src="JAVASCRIPT/validarLogin.js"></script>
    </head>

    <body>

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
                                <li><a href="index.php">Incio</a></li>

                                <li class="active"><a href="LoginCliente.php">Login</a></li>
                                <li><a href="RegistraCliente.php">Registrate</a></li>
                            </ul>

                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </header>

            <!-- main content -->
            <div class="main-content">
                <div class="container">
                    <!-- login area -->
                    <div class="login-area">
                        <!-- heading -->
                        <h3>Ingresa con tu cuenta de cliente</h3>
                        <!-- paragraph -->
                        <a href="RegistraCliente.php" style="font-family: cursive; color: black"><p>Si eres nuevo, entonces pasa a registrarte</p></a>
                       
                        
              <!-- ******************************************************************************************************************************* -->             
                        <form  id="formLogin" name="formLogin" action="CONTROLADOR/Registro_Login_Controlador.php">
                            <input type="hidden" name="op" value="2">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre de Usuario</label>
                                <input type="text" class="form-control" name="el_email" id="el_email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input  name="pass1" type="password" class="form-control" id="pass1" placeholder="Password">
                            </div>
                            <input type="submit" name="enviar" id="enviar" value="Login" class="btn btn-warning">
                        </form>
            <!-- ******************************************************************************************************************************* -->             
     
                        
                    </div>
                </div>
            </div>

            <!-- footer -->
            <footer>
                <div class="container">
                    <!-- This theme comes under Creative Commons Attribution 4.0 Unported. So don't remove below link back -->
                    <p class="copy-right">Copyright &copy; 2014 <a href="#">Your Site</a> | Designed By : <a href="http://www.indioweb.in/portfolio">IndioWeb</a>, All rights reserved. </p>
                </div>
            </footer>
        </div>		

        <!-- Javascript files -->
        <!-- jQuery -->
        <!-- Bootstrap JS -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Respond JS for IE8 -->
        <script src="js/respond.min.js"></script>
        <!-- HTML5 Support for IE -->
        <script src="js/html5shiv.js"></script>
        <!-- Custom JS -->
        <script src="js/custom.js"></script>
        

    </body>	
</html>