<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../../CSS/Login_Vendendor.css">
        <link rel="icon" href="Favicon.png">
        <link href="../../CSS/EstiloRegister.css" rel="stylesheet">	
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="../../JAVASCRIPT/Jquery/jquery-1.6.3.min.js"></script>   
        <script src="../../JAVASCRIPT/Jquery/jquery.validate.min.js"></script>
        <script src="../../JAVASCRIPT/validarLoginAdmin.js"></script>
        <title>Login Admin</title>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="#">Login del Administrador</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../../index.php">Volver</a>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>

        <main class="login-form">
            <div class="cotainer">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Login</div>
                            <div class="card-body">

                                
<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

                                    
                                <form id="form" name="for "action="../../CONTROLADOR/Mantenimiento_controlador.php" method="POST">
                                    <input type="hidden" name="op" value="1">
                                    
                                    <div class="form-group row">
                                        <label for="correo_electronico" class="col-md-4 col-form-label text-md-right">correo_electronico</label>
                                        <div class="col-md-6">
                                            <input type="text" id="el_email" class="form-control" name="el_email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
                                        <div class="col-md-6">
                                            <input type="password" id="pass1" class="form-control" name="pass1">
                                        </div>
                                    </div>


                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" name="enviar" id="enviar" class="btn btn-primary">
                                            Ingresar
                                        </button>
                                    </div>
                                </form> 

<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
</body>
</html>