<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Resister - PRELOG</title>
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

        <link href="CSS/EstiloRegister.css" rel="stylesheet">

        <!-- Favicon -->
        <link rel="shortcut icon" href="#">



        <!-- TODO ESTE BLOQUE NOS PERMITE HACER LAS VALIDACIONES DE LOS FORMULARIOS EN TIEMPO REAL -->
        <script src="js/jquery.js"></script>
        <script src="JAVASCRIPT/Jquery/jquery.validate.min.js"></script>
        <script src="JAVASCRIPT/ValidarFormularios.js"></script>

        <!-- ************************************************************************************ -->
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
                                <li><a href="index.php">Inicio</a></li>

                                <li class="dropdown">

                                </li>
                                <li><a href="LoginCliente.php">Login</a></li>
                                <li class="active"><a href="RegistraCliente.php">Registrate</a></li>
                            </ul>

                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </header>

            <!-- main content -->
            <div class="main-content2">
                <div class="container">
                    <!-- register area -->

                    <!-- heading -->
                    <h3>Registrate,como nuestro cliente</h3>
                    <!-- paragraph -->
                    <p>Completa tus datos correctamente </p>
                     <script type='text/javascript'>

                function consultar() {
                    var documento = 'DNI';
                    var usuario = '10447915125';
                    var password = '985511933';
                    var nro_documento = $("#el_dni").val();
                    $.ajax({
                        type: 'GET',
                        dataType: "json",
                        url: 'https://www.facturacionelectronica.us/facturacion/controller/ws_consulta_rucdni_v2.php',
                        data: {documento: documento, usuario: usuario, password: password, nro_documento: nro_documento}
                    })
                            .done(function (data) {
                                //console.log(data.result);
                               // $("#nruc").val(data.result.DNI);
                                $("#apellido").val(data.result.Paterno+" "+data.result.Materno);
                                $("#apes").val(data.result.Paterno+" "+data.result.Materno);
                              //  $("#telf").val(data.result.Materno);
                                $("#nombre").val(data.result.Nombre);
                                $("#nomb").val(data.result.Nombre);
                              //  $("#Tipo").val(data.result.FechaNac);
                                //$("#sexo").val(data.result.Sexo);
                            })
                            .fail(function (data) {
                                console.log(data);
                            });
                }



                    </script>


                    <form name="form" id="form" action="CONTROLADOR/Registro_Login_Controlador.php" method="POST">
                        <input type="hidden" name="op" value="1">
                        <input type="hidden" name="nomb" id="nomb">
                        <input type="hidden" name="apes" id="apes">
                        <div>
                            <label for="exampleInputName1"> Nombre </label>
                            <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Ingrese Nombre" disabled="disabled">

                        </div>
                        <div>
                            <label for="exampleInputName1"> Apellido </label>
                            <input name="apellido" type="text" class="form-control" id="apellido" placeholder="Ingrese Apellido" disabled="disabled">
                        </div>
                        <div>
                            <label for="email" for="exampleInputName1"> E-mail </label>
                            <input name="e_mail" type="text" class="form-control" id="e_mail" placeholder="Ingrese Correo" >
                        </div>

                        <div>
                            <label for="exampleInputName1"> DNI </label>
                            <input name="el_dni" type="text" class="form-control" id="el_dni" placeholder="Ingrese DNI"><br>
                            <input type="button" id="validar" value="Validar" onclick="consultar()">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Numero Cel</label>
                            <input name="numero_cel"  type="input" class="form-control" id="numero_cel" placeholder="Ingrese telefono">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Direccion</label>
                            <input  name="Direccion"  type="text" class="form-control" id="Direccion" placeholder="Ingrese direccion">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input  name="pass1" type="password" class="form-control" id="pass1" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2">Re-Password</label>
                            <input name="pass2"  type="password" class="form-control" id="pass2" placeholder="Re-Password">
                        </div>

                        <input   type="submit" name="Enviar" id="Enviar" value="Enviar" class="btn btn-warning">
                        <!-- LLEVAREMOS LOS DATOS AL CONTROLADOR REGISTRO_LOGIN_CONTROLADOR -->
                        &nbsp;

                    </form>

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
