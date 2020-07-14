<?php
//TUVE QUE HACER ESTA BARBARIDAD NO TENIA OTRA OPCION XD


session_start();
require_once '../DAO/PersonaDAO.php';


$id = $_REQUEST["id"];
//unset($_SESSION['lista']);


if (!isset($_SESSION)) {
    session_start();
    $lista = $_SESSION["lista"];
}

$objPersona = new PersonaDAO();
$lista = $objPersona->ListarPorProductosPorID($id);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet">		
        <link href="../css/style.css" rel="stylesheet">
        <link href="../CSS/estilo_MenuTienda.css" rel="stylesheet">
      
    </head>
    <body>
       

        <?php
        foreach ($lista as $indice) {
            ?>
            <div class="tablaDetalleProductos"> 

                <form action="../CONTROLADOR/PedioControlador.php" method="post"  >
                    <input type="hidden"id="valor" value="<?php echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION["CARRITO"]); ?>">

                    
                    <table class="tablaDetalleProductos tabla" >
                        <tr>
                            <td rowspan="7">  <center>  
                            <img src="../img/PRODUCTOS/<?php echo $indice["pro_imagen"]; ?>" width="250" height="250">
                        </center> 
                        </td>


                        <th> Nombre </th>
                        <td> <?php echo $indice["pro_nombre"]; ?> </td>
                        </tr>
                        <tr>
                            <th> Precio</th>
                            <td> <?php echo $indice["pro_precio"]; ?> </td>

                        </tr>
                        <tr>
                            <th> Stock</th>
                            <td> <?php echo $indice["pro_stock"]; ?> </td>

                        </tr>
                        <tr>
                            <th> Descripcion</th>           
                            <td> <?php echo $indice["pro_descripcion"]; ?> </td>

                        </tr>
                        <tr>
                            <th> Seccion</th>
                            <td> <?php echo $indice["cat_nombre"]; ?> </td>
                        </tr>
                        <tr>
                            <th> Marca</th>
                            <td> <?php echo $indice["marca_nombre"]; ?> </td>
                        </tr>
                        <tr>
                            <th> Cantidad</th>
                            <td>
                                <input type="number" name="p_cantidad" id="p_cantidad" min="1"max="20" required="" >
                            </td>

                        </tr>
                        <tr>                          
                            <td colspan="4"> <center>
                            <input type="hidden" name="p_id" id="p_id" value="<?php echo $indice["ID_producto"]; ?>">
                            <input type="hidden" name="p_nombre" id="p_nombre" value="<?php echo $indice["pro_nombre"]; ?>">
                            <input type="hidden" name="p_precio" id="p_precio" value="<?php echo $indice["pro_precio"]; ?>">
                            <input type="hidden" name="p_stock" id="p_stock" value="<?php echo $indice["pro_stock"]; ?>">
                            <input type="hidden" name="p_descripcion" id=p_descripcion value="<?php echo $indice["pro_descripcion"]; ?>">
                            <input type="hidden" name="c_nombre" id="c_nombre" value="<?php echo $indice["cat_nombre"]; ?>">
                            <input type="hidden" name="m_nombre" id="m_nombre" value="<?php echo $indice["marca_nombre"]; ?>">
                             
                            <input type="hidden"  name="op"  value="1"   >

                            <button class=" btn btn-warning"  id ="añadir_carro" 
                                    name="añadir_carro" value="Agregar" 
                                    type="submit" >  Añadir a carrito

                            </button> </center></td>

                        </tr>
                    </table>

                </form> 
            </div>     
        <?php } ?> 

    </body>
</html>
