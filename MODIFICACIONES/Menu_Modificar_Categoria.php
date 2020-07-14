<?php
require_once '../DAO/MantenimientosDAO.php';

$ID_categoria = $_REQUEST['ID_categoria'];
$cat_nombre = $_REQUEST['cat_nombre'];
$cat_descripcion = $_REQUEST['cat_descripcion'];


$objMantenimientosDAO = new MantenimientosDAO();

$lista = $objMantenimientosDAO->ListarCategoriasCompletos();

?>

<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title> Actualizar Categoria </title>

        <!-- Styles -->

        <link href="../CSS/bootstrap.min.css" rel="stylesheet">
        <link href="../CSS/font-awesome.min.css" rel="stylesheet">		
        <link href="../CSS/style.css" rel="stylesheet">
        <link rel="shortcut icon" href="#">



    </head>
    <body>
        
    <center><h3 class="alert">Actualizar Categoria</h3> </center>

    <div style="padding: 50px 250px 150px 250px; background-color: #f5ca72; box-shadow: -5px 23px 41px -22px;">

        <form name="form" method="post" action="../CONTROLADOR/Mantenimiento_controlador.php?op=20&ID_categoria=<?php echo $ID_categoria?>">
            <div class="form-group">
                <label>Nombre de la marca</label>
                <input type="text" class="form-control" name="nombre"  placeholder="Nombre de la categoria" value= "<?php echo $cat_nombre ?>">
            </div>
            <div class="form-group">
                <label >descripcion</label>
                <input type="text" class="form-control" name="descripcion"  placeholder="descripcion de la categoria" value= "<?php echo $cat_descripcion ?>">
            </div>
            
                           
            <center> 
               <!-- ESTE BOTON LO QUE HACE ES MANDAR TODOS LOS PARAMETROS MODIFICADOS AL CONTROLADOR CON EL OP = 7 , DONDE SE HARA LA ACTUALIZACION -->
                <input type="submit" name="actualizar" value="Actualizar" class="btn btn-success">

                
               <!-- ESTE OTRO SIMPLEMENTE TE MANDARA AL CONTROLADOR PERO CON EL OP = 3, EL CUAL HARA EL LISTADO DE LOS PRODUCTOS Y CARGARA UN ARRAY NUEVO-->
                <a href="../CONTROLADOR/Mantenimiento_controlador.php?op=4" class="btn btn-primary"> Cancelar</a></center>
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
TE HCE FALTA LAS MODIFICACIONES
 * DE ELIMINAR
 * LO QUE DEBES HACER ES UASR UN ALERTY FY PARA PODER VERIFICAR LA ELIMINACION DE UN PRODUCTO
 * SI ES SI ELIMINA
 * SINO NO
 * 
 * DEPSUES HACER LA INSERCION DE IMAGENES
 *  */

?>