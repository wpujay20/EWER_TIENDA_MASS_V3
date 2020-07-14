<?php
$id_producto = $_REQUEST['id_producto'];
$pro_nombre = $_REQUEST['pro_nombre'];
$pro_precio = $_REQUEST['pro_precio'];
$pro_stock = $_REQUEST['pro_stock'];
$pro_descripcion = $_REQUEST['pro_descripcion'];
$marca_nombre = $_REQUEST['marca_nombre'];
$cat_nombre = $_REQUEST['cat_nombre'];

if (!isset($_SESSION)) {
    session_start();
    $lista = $_SESSION["listaProductos"];
    $categorias = $_SESSION["listaCategorias"];
    $marcas = $_SESSION["listaMarca"];
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
        
    <center><h3 class="alert">Actualizar Productos</h3> </center>

    <div style="padding: 50px 250px 150px 250px; background-color: #f5ca72; box-shadow: -5px 23px 41px -22px;">

        <form name="form" method="post" action="../CONTROLADOR/Mantenimiento_controlador.php?op=7&id_producto=<?php echo $id_producto?>">
            <div class="form-group">
                <label>Nombre del Producto</label>
                <input type="text" class="form-control" name="nombre"  placeholder="nombre del producto" value= "<?php echo $pro_nombre ?>">
            </div>
            <div class="form-group">
                <label >Precio del Producto</label>
                <input type="text" class="form-control" name="precio"  placeholder="Precio del Producto" value= "<?php echo $pro_precio ?>">
            </div>
            
            <div class="form-group">
                <label >Stock</label>
                <input type="text" class="form-control" name="stock"  placeholder="Stock" value= "<?php echo $pro_stock ?>">
            </div>
            <div class="form-group">
                <label >descripcion</label>
                <textarea  name="descripcion"  class="form-control" rows="3"><?php echo $pro_descripcion?> </textarea>
            </div>
            
            <div class="form-group" >
                <label>Seleccione Marca</label>
                <select class="form-control" name="id_marca" >
                   <?php
                   foreach ($marcas as $fila){
                  
                            echo "<option value='" . $fila['ID_marca'] . "'>" . $fila['marca_nombre'] ."</option>";

                        }     
                            ?>
                </select>
            </div>
               <div class="form-group" >
                <label>Seleccione Categoria</label>
                <select class="form-control" name="id_categoria">
                   <?php
                   foreach ($categorias as $fila){
                            echo "<option value='" . $fila['ID_categoria'] . "'>" . $fila['cat_nombre'] ."</option>";
                   } 
                    ?>
                </select>
                </div>
                
            <center> 
               <!-- ESTE BOTON LO QUE HACE ES MANDAR TODOS LOS PARAMETROS MODIFICADOS AL CONTROLADOR CON EL OP = 7 , DONDE SE HARA LA ACTUALIZACION -->
                <input type="submit" name="actualizar" value="Actualizar" class="btn btn-success">

                
               <!-- ESTE OTRO SIMPLEMENTE TE MANDARA AL CONTROLADOR PERO CON EL OP = 3, EL CUAL HARA EL LISTADO DE LOS PRODUCTOS Y CARGARA UN ARRAY NUEVO-->
                <a href="../CONTROLADOR/Mantenimiento_controlador.php?op=3" class="btn btn-primary"> Cancelar</a></center>
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