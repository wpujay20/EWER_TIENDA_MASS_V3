<?php
 session_start();
if (!isset($_SESSION['id_persona'])) {  //SI NO SE HA INICIADO SESION  CON EL ID ENTONCES REDIERECCIONAR AL INDEX 
        echo '<script> document.location.href="../../index.php"';       
}


   
    $lista = $_SESSION["listaCategoria"];
  
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title> Categoria Producto </title>

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
           
        </header>   
        <!-----------------------------------------------------------------ZONA SLIDER----------------------------------------------------------------->

      <div id="menu">
            <?php include './opciones.php';?>
        </div>

        
        
        
        <div style="height:50px"></div>
    <center><h3>Categorias</h3> </center>


    <!-----------------------------------------------------------------Ejemplo tabla con DataTables----------------------------------------------------------------->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form name="form" method="POST">
                    <div class="table-responsive">        
                        <table   style="font-size: small" id="example" class="table table-striped table-bordered" style="width:100%">

                            <thead>

                            <th>ID_categoria</th>
                            <th>nombre</th>
                            <th>descripcion</th>


                            <th></th>
                            <th></th>
                            </thead> 
                            <tbody>
                                
                                <?php
                                foreach ($lista as $persona) {
                                    ?>                
                                    <tr>
                                        <td><?php echo $persona["ID_categoria"]; ?></td>
                                        <td><?php echo $persona['cat_nombre']; ?></td>
                                        <td><?php echo $persona['cat_descripcion']; ?></td>

               
                                        <td> <a href="../../MODIFICACIONES/Menu_Modificar_Categoria.php?
                                        ID_categoria=<?php echo $persona["ID_categoria"]; ?>
                                        &cat_nombre=<?php echo $persona['cat_nombre']; ?>
                                        &cat_descripcion=<?php echo $persona['cat_descripcion']; ?>
                                        
                                        " 
                                        class="btn btn-success">Modificar</a>  </td>

                                <td> <a href="../../CONTROLADOR/Mantenimiento_controlador.php?op=21&ID_categoria=<?php echo $persona["ID_categoria"]; ?>"  class="btn btn-danger">Eliminar</a>  </td>

                                </tr>
                                <?php
                            }
                            ?> 

                            </tbody>

                        </table>
                        <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar Categoria</button>
                     
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
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Marca</h5>
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
                            <label for="message-text" class="col-form-label">Descripcion:</label>
                            <textarea  name="descripcion" class="form-control" id="message-text"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                        <input type="hidden" value="16" name="op">
                        <input type="submit" value="Agregar" id="boton" class="btn btn-primary">
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

