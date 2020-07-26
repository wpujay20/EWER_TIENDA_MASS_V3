<?php 
session_start();

if (!isset($_SESSION['id_persona'])) {  //SI NO SE HA INICIADO SESION  CON EL ID ENTONCES REDIERECCIONAR AL INDEX 
        echo '<script> document.location.href="../../index.php"';       
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
     

        <!-- REQUERIDO PARA EL EL SLIDER -->
        <link rel="stylesheet"  type="text/css" href="../../CSS/ADMIN_CSS/menu_mantenimientos.css">



    </head>

    <body> 
        <header>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="MENU_PRINICIPAL_ADMIN.php"><img class="img-responsive" src="../../img/logo.png" alt="Logo" /></a>
            </div>
            <br>
            <br>
        </header>   

        <div id="menu">
            <?php include './opciones.php';?>
        </div>



        <div style="height:50px"></div>

        <!--Ejemplo tabla con DataTables-->
        


        <!-- REQUERIDO PARA EL DATATABLE -->

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