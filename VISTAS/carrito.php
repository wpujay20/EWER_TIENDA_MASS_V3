

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<!-- Button trigger modal--><script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<head>
    
    <title>Lista del carrito</title>
</head>
<center>

    <h3>Lista del carrito</h3>
</center>

<!--
Si la session CARRITO no está vacia, entonces va a imprimir los datos que el cliente a añadido al carrito
Pero si la session Existe, Nos mostrará que no hay productos añadidos.
-->
<!--
El empy() nos permite usar para saber y una variable está vacía o no
en este caso "if(!empty($_SESSION['CARRITO']))"
Decimos que si no está vacía. imprimirá los datos que el 
Cliente a deseado añadir a tu carrito
-->
<?php
session_start();
if (!empty($_SESSION['CARRITO'])) {
    //var_dump($_SESSION['CARRITO']);
    // unset($_SESSION['CARRITO']);
    ?>


    <center>
        <div class="container"> 
            <a class="btn btn-success nav-link" href="MenuCompras.php">Regresar a Menu Compras</a>



            <table class="table table-hover">
                <thead>
                    <tr> 
                        <th>ID</th>
                        <th>Nombre del Producto</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Categoria</th>
                        <th>Marca</th>
                        <th>cantidad</th>
                        <th>SubTotal</th>
                        <th>Opción</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>

                    <?php foreach ($_SESSION['CARRITO']as $producto => $indi) {
                        ?>
                        <tr>

                            <td width="20%" class="text-center"><?php echo number_format($indi['ID'], 0) ?></td>
                            <td width="20%" class="text-center"><?php echo $indi['P_NOMBRE'] ?></td>
                            <td width="20%" id="precio"class="text-center">S/  <?php echo number_format($indi['P_PRECIO'], 2) ?></td>
                            <td width="20%" class="text-center"><?php echo $indi['P_STOCK']; ?></td>
                            <td width="20%" class="text-center"><?php echo $indi['C_NOMBRE']; ?></td>
                            <td width="20%" class="text-center"><?php echo $indi['M_NOMBRE']; ?></td>
                            <td width="20%"  class="boton"><?php echo $indi['P_CANTIDAD']; ?></td>
                            <td  width="20%" id="subtotal" class="text-center">S/ <?php echo number_format($indi['P_PRECIO'] * $indi['P_CANTIDAD'], 2) ?></td>

                            <td width="40%" class="text-center"> 
                                <?php
                                ?>
                                <form action="../CONTROLADOR/PedioControlador.php" method="post">
                                    <input type="hidden" name="id" id="id" value="<?php echo number_format($indi['ID'], 0) ?>">
                                    <button class="btn btn-danger" type="submit "name="añadir_carro" value="Eliminar" >Eliminar </button>
                                </form>
                            </td>

                            <td><a><i class="fas fa-times"></i></a></td>
                        </tr>

                        <?php
                        $total = $total + (number_format($indi['P_PRECIO'] * $indi['P_CANTIDAD'], 2));
                        $_SESSION['total'] = $total;
                    }
                    ?>
                    <tr>
                        <td colspan="7" align="right"><h3>Total</h3> </td>
                        <td align="right"><h3>S/.<?php echo number_format($total, 2); ?></h3></td>
 
                    </tr>
                    <tr>

                        <td colspan="7">

                            <form   action="Pagar.php" method="post">

                                <button class="btn btn btn-primary bnt-lg btn-block"
                                        name="btnAccion" 
                                        type="submit" > 
                                    Proceder a pagar>>
                                </button> 
                            </form>
                        </td>
                    </tr>
                </tbody>                
            </table> 

    </center></div>


<?php } else { ?>
    <div class="container">
        <a class="btn btn-success nav-link" href="MenuCompras.php">Regresar a Menu Compras</a>
        <br><br>


        <div class="alert alert-success">
            No hay productos en el carrito...
        </div>

    </div>

<?php } ?>
<!-- Modal: modalCart -->
