<?php
if (!isset($_SESSION)) {
    session_start();
    $lista = $_SESSION["listaProductos"];
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title> Menu Persona </title>

        <!-- REQUERIDO PARA EL DATA TABLE -->

        <link rel="stylesheet" href="../../CSS/bootstrap.min.css">
        <link rel="stylesheet" href="../../datatables/main.css">  
        <link rel="stylesheet" type="text/css" href="../../datatables/datatables.min.css"/>
        <link rel="stylesheet"  type="text/css" href="../../datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

        <!-- REQUERIDO PARA EL EL SLIDER -->
        <link rel="stylesheet"  type="text/css" href="../../CSS/ADMIN_CSS/menu_mantenimientos.css">



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
            <br>
        </header>   
        <!-----------------------------------------------------------------ZONA SLIDER----------------------------------------------------------------->

         <div id="menu">
            <?php include './opciones.php';?>
        </div>



        <div style="height:50px"></div>
    <center><h3>Menu Seleccion Imagenes </h3> </center>


    <!-----------------------------------------------------------------Ejemplo tabla con DataTables----------------------------------------------------------------->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form  action="../../CONTROLADOR/Mantenimiento_controlador.php"  method="post" enctype="multipart/form-data">                    

                    <div class="table-responsive">     
                        <table   style="font-size: small" id="example" class="table table-striped table-bordered" style="width:100%">

                            <thead>
                                <th></th>
                            <th>ID_producto</th>
                            <th>pro_nombre</th>
                            <th>pro_precio</th>
                            <th>pro_imagen</th>
                            <th>pro_marca</th>
                            <th>pro_categoria</th>
                            
                            </thead> 
                            <tbody>



                                <?php
                                foreach ($lista as $producto) {
                                    ?>                
                                    <tr>
                                        <td><center><input type="radio" name="modificador" value="<?php echo $producto["ID_producto"]; ?>" required="on" /></center></td>
                                        <td><?php echo $producto["ID_producto"]; ?></td>
                                        <td><?php echo $producto['pro_nombre']; ?></td>
                                        <td><?php echo $producto['pro_precio']; ?></td>
                                        <td> <center><img  width="70" height="70" src="../../img/PRODUCTOS/<?php echo $producto['pro_imagen']; ?>"></center></td>
                                        <td><?php echo $producto['marca_nombre']; ?></td>
                                        <td><?php echo $producto['cat_nombre']; ?></td>
                                    </tr>
                                <?php
                            }
                            ?> 

                            </tbody>

                        </table>

                        <input type="hidden" value="12" name="op">
                        
                        <br><input  class="form-control-file" type="file" name="pro_imagen"><br>
                        <input type="submit" class="btn btn-warning" value="Agregar Imagen">
                        
                    </div>



                </form>
            </div>            
        </div> 
    </div>  




    <!-------------------------------------------------------TODO ESTO SALE AL PRESIONAR EL BOTON DE AGREGAR DEL BOOSTRAP-------------------------------------------------------------->


    <!-- REQUERIDO PARA EL DATATABLE -->
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
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


<!---
TIENES PENSADO TERMINAR DE HACER LOS 2 PRIMEROS MANTENIMIENTOS
LOS DEMAS LOS HACE ROY

HACER EL CRUD DE PRODUCTOS
HACER LA INSERCION DE IMAGENES
HACER LA INTERACCION DE LOS CONTROLADORES
USAR EL BEAN Y EL DAO TAMBIEN

-->