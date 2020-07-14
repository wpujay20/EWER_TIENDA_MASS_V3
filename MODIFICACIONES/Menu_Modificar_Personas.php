<?php
$id_persona = $_REQUEST['id_persona'];
$per_nombre = $_REQUEST['per_nombre'];
$per_apellido = $_REQUEST['per_apellido'];
$per_dni = $_REQUEST['per_dni'];
$usu_usuario = $_REQUEST['usu_usuario'];
$usu_password = $_REQUEST['usu_password'];
$per_numero = $_REQUEST['per_numero'];
$per_direccion = $_REQUEST['per_direccion'];
$id_tipo_usu = $_REQUEST['id_tipo_usu'];
if (!isset($_SESSION)) {
    session_start();
    $tipos = $_SESSION["tiposUsuario"];
}
?>

<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title> Actualizar Prouctos </title>

        <!-- Styles -->

        <link href="../CSS/bootstrap.min.css" rel="stylesheet">
        <link href="../CSS/font-awesome.min.css" rel="stylesheet">
        <link href="../CSS/style.css" rel="stylesheet">
        <link rel="shortcut icon" href="#">



    </head>
    <body>

    <center><h3 class="alert">Actualizar Personas </h3> </center>

    <div style="padding: 50px 250px 150px 250px; background-color: #f5ca72; box-shadow: -5px 23px 41px -22px;">

        <form name="form" method="post" action="../CONTROLADOR/Mantenimiento_controlador.php?op=25&id_persona=<?php echo $id_persona?>">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" class="form-control" name="nombre"  placeholder="nombre del producto" value= "<?php echo $per_nombre ?>">
            </div>
            <div class="form-group">
                <label>Apellido</label>
                <input type="text" class="form-control" name="apellido"  placeholder="nombre del producto" value= "<?php echo $per_apellido ?>">
            </div>
            <div class="form-group">
                <label >DNI</label>
                <input type="text" class="form-control" name="dni"  placeholder="Precio del Producto" value= "<?php echo $per_dni ?>">
            </div>

            <div class="form-group">
                <label >Correo</label>
                <input type="text" class="form-control" name="usuario"  placeholder="Stock" value= "<?php echo $usu_usuario ?>">
            </div>
            <div class="form-group">
                <label >Contraseña</label>
                <input type="text" class="form-control" name="password"  placeholder="Stock" value= "<?php echo $usu_password ?>">
            </div>
            <div class="form-group">
                <label >Numero celular</label>
                <input type="text" class="form-control" name="numero"  placeholder="Stock" value= "<?php echo $per_numero ?>">
            </div>
            <div class="form-group">
                <label >Direccion</label>
                <textarea  name="direccion"  class="form-control" rows="3"><?php echo $per_direccion ?> </textarea>
            </div>


            <div class="form-group" >
                <label>Seleccione Tipo de Usuario </label>
                <select class="form-control" name="id_tipo_usu">
                        <?php
                        foreach ($tipos as $fila) {
                            echo "<option value='" . $fila['id_tipo_usu'] . "'>" . $fila['rol'] . "</option>";
                        }
                        ?>
                </select>
            </div>

            <center>
                <!-- ESTE BOTON LO QUE HACE ES MANDAR TODOS LOS PARAMETROS MODIFICADOS AL CONTROLADOR CON EL OP = 7 , DONDE SE HARA LA ACTUALIZACION -->
                <input type="submit" name="actualizar" value="Actualizar" class="btn btn-success">


                <!-- ESTE OTRO SIMPLEMENTE TE MANDARA AL CONTROLADOR PERO CON EL OP = 3, EL CUAL HARA EL LISTADO DE LOS PRODUCTOS Y CARGARA UN ARRAY NUEVO-->
                <a href="../CONTROLADOR/Mantenimiento_controlador.php?op=2" class="btn btn-primary"> Cancelar</a></center>
        </form>


    </div>

    <script src="../js/jquery.js"></script>
    <!-- Bootstrap JS -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- Respond JS for IE8 -->
    <script src="../js/respond.min.js"></script>
    <!-- HTML5 Support for IE -->
    <script src="../js/html5shiv.js"></script>
    <!-- Custom JS -->
    <script src="../js/custom.js"></script>
</body>
</html>
<?php
/*
  TERMINAR LAS MODIFICAIONES
 *  */
?>