<?php
session_start();

if (!isset($_SESSION['id_persona'])) {  //SI NO SE HA INICIADO SESION  CON EL ID ENTONCES REDIERECCIONAR AL INDEX 
        echo '<script> document.location.href="../../index.php"';       
}

    $lista = $_SESSION["listaProductos"];
    $categorias = $_SESSION["listaCategorias"];
    $marcas = $_SESSION["listaMarca"];

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
            <table border="0">
                <tr>
                    <td>  <a href="../../CONTROLADOR/Mantenimiento_controlador.php?op=2"><img src="../../img/MANTENIMIENTOS/persona.png" width="90" height="90"></a>Personas</td>
                </tr>
                <tr>
                    <td>  <a href="../../CONTROLADOR/Mantenimiento_controlador.php?op=3.php"><img src="../../img/MANTENIMIENTOS/producto.PNG" width="90" height="90"></a>Productos</td>
                </tr>
                <tr>
                    <td> <a href="../../CONTROLADOR/Mantenimiento_controlador.php?op=4.php" ><img src="../../img/MANTENIMIENTOS/categria.png" width="90" height="90"></a>Categorias</td>
                </tr>
                <tr>
                    <td>  <a href="../../CONTROLADOR/Mantenimiento_controlador.php?op=5"><img src="../../img/MANTENIMIENTOS/ETIQUETA.jpg" width="90" height="90"></a>Marca</td>
                </tr>
                <tr> 
                    <td>  <a href="../../CONTROLADOR/Mantenimiento_controlador.php?op=6"><img src="../../img/MANTENIMIENTOS/pedidos.PNG" width="90" height="90"></a>Pedidos</td>
                </tr>
                <tr> 
                    <td>  <a id="cerrar" href="#"><img src="../../img/MANTENIMIENTOS/salir.PNG" width="90" height="90"></a>Salir</td>
                </tr>
            </table>
        </div>


        <div style="height:50px"></div>
    <center><h3>Productos</h3> </center>


    <!-----------------------------------------------------------------Ejemplo tabla con DataTables----------------------------------------------------------------->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form name="form" method="POST" action="../../CONTROLADOR/Mantenimiento_controlador.php?op=11">
                    <div class="table-responsive">        
                        <table   style="font-size: small" id="example" class="table table-striped table-bordered" style="width:100%">

                            <thead>

                            <th>ID_producto</th>
                            <th>pro_nombre</th>
                            <th>pro_precio</th>
                            <th>pro_stock</th>
                            <th>pro_descripcion</th>
                            <th>pro_imagen</th>
                            <th>pro_marca</th>
                            <th>pro_categoria</th>

                            <th></th>
                            <th></th>
                            </thead> 
                            <tbody>



                                <?php
                                foreach ($lista as $persona) {
                                    ?>                
                                    <tr>
                                        <td><?php echo $persona["ID_producto"]; ?></td>
                                        <td><?php echo $persona['pro_nombre']; ?></td>
                                        <td><?php echo $persona['pro_precio']; ?></td>
                                        <td><?php echo $persona['pro_stock']; ?></td>
                                        <td><?php echo $persona['pro_descripcion']; ?></td>
                                        <td> <center><img  width="70" height="70" src="../../img/PRODUCTOS/<?php echo $persona['pro_imagen']; ?>"></center></td>
                                <td><?php echo $persona['marca_nombre']; ?></td>
                                <td><?php echo $persona['cat_nombre']; ?></td>

                                <td> <a href="../../MODIFICACIONES/Menu_Modificar_Productos.php?
                                        id_producto=<?php echo $persona["ID_producto"]; ?>
                                        &pro_nombre=<?php echo $persona['pro_nombre']; ?>
                                        &pro_precio=<?php echo $persona['pro_precio']; ?>
                                        &pro_stock=<?php echo $persona['pro_stock']; ?>
                                        &pro_descripcion=<?php echo $persona['pro_descripcion']; ?>
                                        &marca_nombre=<?php echo $persona['marca_nombre']; ?>
                                        &cat_nombre=<?php echo $persona['cat_nombre']; ?>
                                        " 
                                        class="btn btn-success">Modificar</a>  </td>

                                <td> <a href="../../CONTROLADOR/Mantenimiento_controlador.php?op=8&ID_producto=<?php echo $persona["ID_producto"]; ?>"  class="btn btn-danger">Eliminar</a>  </td>

                                </tr>
                                <?php
                            }
                            ?> 

                            </tbody>

                        </table>
                        <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar Producto</button>
                        <input type="submit" class="btn btn-warning" value="Agregar Imagen">
                    </div>
                </form>
            </div>            
        </div> 
    </div>  




    <!-------------------------------------------------------TODO ESTO SALE AL PRESIONAR EL BOTON DE AGREGAR DEL BOOSTRAP-------------------------------------------------------------->


    <form name="formInsertar" id="formInsertar" action="../../CONTROLADOR/Mantenimiento_controlador.php">

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Persona</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nombre:</label>
                            <input  name="nombre"type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Precio:</label>
                            <input name="precio"  type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Stock:</label>
                            <input  name="stock" type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Descripcion:</label>
                            <textarea  name="descripcion" class="form-control" id="message-text"></textarea>
                        </div>
                        <div class="form-group" >
                            <label>Seleccione Marca</label>
                            <select class="form-control" name="id_marca" >
                                <?php
                                foreach ($marcas as $fila) {

                                    echo "<option value='" . $fila['ID_marca'] . "'>" . $fila['marca_nombre'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group" >
                            <label>Seleccione Categoria</label>
                            <select class="form-control" name="id_categoria" >
                                <?php
                                foreach ($categorias as $fila) {

                                    echo "<option value='" . $fila['ID_categoria'] . "'>" . $fila['cat_nombre'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>


                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                        <input type="hidden" value="10" name="op">
                        <input type="submit" value="enviar" id="boton" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </div>
    </form>      
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