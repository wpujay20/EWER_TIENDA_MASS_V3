<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once '../DAO/UsuarioDAO.php';
require_once '../DAO/MantenimientosDAO.php';
require_once '../BEAN/UsuarioBean.php';
require_once '../DAO/ProductosDAO.php';
require_once '../BEAN/ProductosBean.php';
require_once '../BEAN/MarcaBean.php';
require_once '../BEAN/CategoriaBean.php';
require_once '../BEAN/PersonaBean.php';
require_once '../DAO/PersonaDAO.php';
require_once '../DAO/PedidoDAO.php';

//)-------------------------------------ESTAS SON LAS LIBRERIAS PARA CARGAR LAS ALERTAS PERSONALIZADAS (NO BORRAR)-------------------------------------
echo' <script src="../JAVASCRIPT/Jquery/jquery-1.6.3.min.js"></script>  
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <link rel="stylesheet" href="../CSS/bootstrap.min.css">';
//)------------------------------------------------------------------------------------------------------------                     

$opciones = $_REQUEST['op'];


switch ($opciones) {

    case 1: { //SECCION PARA VALDAR EL LOGIN ADMIN
            $objUsuarioBean = new UsuarioBean();
            $objUsuarioDAO = new UsuarioDAO();

            $email = $_REQUEST['el_email'];
            $password = $_REQUEST['pass1'];

            $objUsuarioBean->setUsu_usuario($email);
            $objUsuarioBean->setUsu_password($password);
            $objUsuarioDAO->ValidarAdmin($objUsuarioBean);

            break;
        }

    case 2: {  //SECCION PARA OBTENER LA LISTA DE PERSONAS Y USUARIOS
            $objUsuarioDAO = new UsuarioDAO();
            $_SESSION["listaPersonas"] = $objUsuarioDAO->ListarPersonasMant();
            $_SESSION["tiposUsuario"] = $objUsuarioDAO->ListarTiposUsuario();

            echo '<script> document.location.href="../VISTAS/MANTENIMIENTOS/PersonasMantenimiento.php";</script>';


            break;
        }
    case 3: {   //SECCION PARA OBTENER LA LISTA DE PRODUCTOS , MARCAR  Y CATEGORIAS COMPLETAS
            unset($_SESSION["listaProductos"]);
            unset($_SESSION["listaCategorias"]);
            $objMantenimientosDAO = new MantenimientosDAO();
            $ProductosDAO = new ProductosDAO();
            $_SESSION["listaProductos"] = $objMantenimientosDAO->ListarProductosCompletos();
            $_SESSION["listaCategorias"] = $ProductosDAO->ListarCategorias();
            $_SESSION["listaMarca"] = $ProductosDAO->ListarMarcas();

            echo '<script> document.location.href="../VISTAS/MANTENIMIENTOS/ProductosMantenimientos.php";</script>';

            break;
        }
    case 4: {//LISTAR CATEGORIA
            unset($_SESSION["listaCategoria"]);
            $objMantenimientosDAO = new MantenimientosDAO();
            $_SESSION["listaCategoria"] = $objMantenimientosDAO->ListarCategoriasCompletos();


            echo '<script> document.location.href="../VISTAS/MANTENIMIENTOS/CategoriasMantenimientos.php";</script>';

            break;
        }
    case 5: { //LISTAR MARCA
            unset($_SESSION["listaMarca"]);
            $objMantenimientosDAO = new MantenimientosDAO();
            $_SESSION["listaMarca"] = $objMantenimientosDAO->ListarMarcasCompletos();

            echo '<script> document.location.href="../VISTAS/MANTENIMIENTOS/MarcasMantenimientos.php";</script>';

            break;
        }

    case 6: {//LISTAR PEDIDOS
            unset($_SESSION['Pedidos']);
            $objPedidoDAO = new PedidoDAO();
            $pedidos = $objPedidoDAO->ListarPedidos();
            $_SESSION['Pedidos'] = $pedidos;
            echo '<script> document.location.href="../VISTAS/MANTENIMIENTOS/PedidosMantenimientos.php";</script>';

            break;
        }

    case 7: { // MODIFICAR PRODUCTOS
            $objProductosBean = new ProductosBean();
            $objMantenimientosDAO = new MantenimientosDAO();

            $idproducto = $_REQUEST['id_producto'];
            $nombre_nuevo = $_REQUEST['nombre'];
            $precio_nuevo = $_REQUEST['precio'];
            $stock_nuevo = $_REQUEST['stock'];
            $descripcion_nuevo = $_REQUEST['descripcion'];
            $marcas_nuevo = $_REQUEST['id_marca'];
            $Categoria_nuevo = $_REQUEST['id_categoria'];

            $objProductosBean->setID_producto($idproducto);
            $objProductosBean->setPro_nombre($nombre_nuevo);
            $objProductosBean->setPro_precio($precio_nuevo);
            $objProductosBean->setPro_stock($stock_nuevo);
            $objProductosBean->setPro_descripcion($descripcion_nuevo);
            $objProductosBean->setID_marca($marcas_nuevo);
            $objProductosBean->setID_categoria($Categoria_nuevo);

            $estado = $objMantenimientosDAO->ActualizarProductos($objProductosBean);

            if ($estado > 0) {
                echo '<script src="../JAVASCRIPT/Actualizacion_Correcta.js"></script>';
            }

            break;
        }
    case 8: { // DESEAS ELIMINAR PRODUCTOS?
            $id_producto = $_REQUEST['ID_producto'];
            $_SESSION['ID_PORDUCTO'] = $id_producto;
            echo '<script src="../JAVASCRIPT/EliminarProducto(Admin).js"></script>';


            break;
        }

    case 9: { // SI QUIERO ELIMINAR PRODUCTOS?
            $objMantenimientosDAO = new MantenimientosDAO();
            $id_producto2 = $_SESSION['ID_PORDUCTO'];
            $estado = $objMantenimientosDAO->EliminarProductos($id_producto2);

            if ($estado > 0) {
                unset($_SESSION['ID_PORDUCTO']);
                echo '<script> document.location.href="Mantenimiento_controlador.php?op=3";</script>';
            } else {
                echo 'error al borrar';
            }
            break;
        }

    case 10: { // INSERTAR PRODUCTOS
            $objProductosBean = new ProductosBean();
            $objMantenimientosDAO = new MantenimientosDAO();

            $pro_nombre = $_REQUEST['nombre'];
            $pro_precio = $_REQUEST['precio'];
            $pro_stock = $_REQUEST['stock'];
            $pro_descripcion = $_REQUEST['descripcion'];
            $ID_marca = $_REQUEST['id_marca'];
            $ID_categoria = $_REQUEST['id_categoria'];



            $objProductosBean->setPro_nombre($pro_nombre);
            $objProductosBean->setPro_precio($pro_precio);
            $objProductosBean->setPro_stock($pro_stock);
            $objProductosBean->setPro_descripcion($pro_descripcion);
            $objProductosBean->setID_marca($ID_marca);
            $objProductosBean->setID_categoria($ID_categoria);


            $estado = $objMantenimientosDAO->InsertarProductos($objProductosBean);

            if ($estado > 0) {
                echo '<script> document.location.href="Mantenimiento_controlador.php?op=3";</script>';
            } else {
                echo 'error al insertar';
            }

            break;
        }
    case 11: { // INSERTAR IMAGEN DE PRODUCTOS
            unset($_SESSION["listaProductos"]);

            $objMantenimientosDAO = new MantenimientosDAO();
            $ProductosDAO = new ProductosDAO();
            $_SESSION["listaProductos"] = $objMantenimientosDAO->ListarProductosCompletos();

            echo '<script> document.location.href="../VISTAS/MANTENIMIENTOS/ImagenesMantenimiento.php";</script>';

            break;
        }


    case 12: { // VALIDACION DE IMAGENES AL SERVIDOR
            $id_producto = $_REQUEST['modificador']; //obtenermos el id del prodcuto por el radio button

            $nombre_img = $_FILES['pro_imagen']['name'];    //OBTENCION DE LOS DATOS  DE LA IMAGEN SELECCIONADA
            $tipo_img = $_FILES['pro_imagen']['type'];
            $tamaño_img = $_FILES['pro_imagen']['size'];
            $ubicacion_archivo = $_FILES['pro_imagen']['tmp_name'];

            //EL [DOCUMENT_ROOT] nos ayuda con la direccion segun el servidor que usemos, ya sea wamp o xamp o algun otro
            $carpeta_destino = $_SERVER["DOCUMENT_ROOT"] . "/EWER_TIENDA_MASS_V3/img/PRODUCTOS/";


            //EVALUACION DEL TAMAÑO DE IMAGEN
            if ($tamaño_img <= 2000000) {   //2mb
                if ($tipo_img == "image/jpeg" || $tipo_img == "image/jpg" || $tipo_img == "image/png") {

                    //ESTABLECEMOS A DONDE QUEREMOS ENVIAR LA IMAGEN QUE SE ENCUENTRA EN UNA UBICACION TEMPORARL (TEMPORA , DONNDE QUEREMOS)
                    move_uploaded_file($ubicacion_archivo, $carpeta_destino . $nombre_img);

                    $ProductosDAO = new ProductosDAO();
                    $estado = $ProductosDAO->ActualizarImagenDeProducto($id_producto, $nombre_img);

                    if ($estado > 0) {
                        echo '<script src="../JAVASCRIPT/Actualizacion_Correcta(IMAGEN).js"></script>';
                    }
                } else {
                    echo '<script src="../JAVASCRIPT/SoloArchivosDeImagen.js"></script>';
                }
            } else {
                echo '<script src="../JAVASCRIPT/ArchivoMuyGrande.js"></script>';
            }
            break;
        }

    case 13: { // INSERTAR MARCA
            $objMarcaBean = new MarcaBean();
            $objMantenimientosDAO = new MantenimientosDAO();

            $marca_nombre = $_REQUEST['nombre'];
            $marca_descripcion = $_REQUEST['descripcion'];


            $objMarcaBean->setMarca_nombre($marca_nombre);
            $objMarcaBean->setMarca_descripcion($marca_descripcion);

            $estado = $objMantenimientosDAO->InsertarMarca($objMarcaBean);

            if ($estado > 0) {
                echo '<script> document.location.href="Mantenimiento_controlador.php?op=5";</script>';
            } else {
                echo 'error al insertar';
            }

            break;
        }


    case 14: { // MODIFICAR MARCA
            $objMarcaBean = new MarcaBean();
            $objMantenimientosDAO = new MantenimientosDAO();

            $IDmarca = $_REQUEST['ID_marca'];
            $marca_nombre_nuevo = $_REQUEST['nombre'];
            $marca_descripcion_nuevo = $_REQUEST['descripcion'];


            $objMarcaBean->setID_marca($IDmarca);
            $objMarcaBean->setMarca_nombre($marca_nombre_nuevo);
            $objMarcaBean->setMarca_descripcion($marca_descripcion_nuevo);

            $estado = $objMantenimientosDAO->ActualizarMarca($objMarcaBean);

            if ($estado > 0) {
                echo '<script src="../JAVASCRIPT/Actualizacion_Correcta(MARCA).js"></script>';
            }

            break;
        }

    case 15: { // ELIMINAR MARCA
            $id_marca = $_REQUEST['ID_marca'];
            $_SESSION['ID_MARCA'] = $id_marca;
            echo '<script src="../JAVASCRIPT/EliminarMarca.js"></script>';

            break;
        }


    case 16: { // INSERTAR CATEGORIA
            $objCategoriaBean = new CategoriaBean();
            $objMantenimientosDAO = new MantenimientosDAO();

            $cat_nombre = $_REQUEST['nombre'];
            $cat_descripcion = $_REQUEST['descripcion'];


            $objCategoriaBean->setCat_nombre($cat_nombre);
            $objCategoriaBean->setCat_descripcion($cat_descripcion);

            $estado = $objMantenimientosDAO->InsertarCategoria($objCategoriaBean);

            if ($estado > 0) {
                echo '<script> document.location.href="Mantenimiento_controlador.php?op=4";</script>';
            } else {
                echo 'error al insertar';
            }

            break;
        }


    case 17: { // SI QUIERO ELIMINAR MARCA?
            $objMantenimientosDAO = new MantenimientosDAO();
            $id_marca2 = $_SESSION['ID_MARCA'];
            $estado = $objMantenimientosDAO->EliminarMarca($id_marca2);

            if ($estado > 0) {
                unset($_SESSION['ID_MARCA']);
                echo '<script> document.location.href="Mantenimiento_controlador.php?op=5";</script>';
            } else {
                echo '<script src="../JAVASCRIPT/ErrorBorrrarMarca(Admin).js"></script>';
            }
            break;
        }



    case 18: {//LISTAR CATEGORIA
            unset($_SESSION["listaCategoria"]);
            $objMantenimientosDAO = new MantenimientosDAO();
            $_SESSION["listaCategoria"] = $objMantenimientosDAO->ListarCategoriasCompletos();


            echo '<script> document.location.href="../VISTAS/MANTENIMIENTOS/CategoriasMantenimientos.php";</script>';

            break;
        }


    case 19: { // INSERTAR PERSONA-------------------------------------------------------------------------------------------
            $objPersonaBean = new PersonaBean();
            $objUsuarioBean = new UsuarioBean();
            $objUsuarioDAO = new UsuarioDAO();
            $objPersonaDAO = new PersonaDAO();
            $objMantenimientosDAO = new MantenimientosDAO();


            $per_nombre = $_REQUEST['Nombre'];
            $per_apellido = $_REQUEST['Apellido'];
            $per_dni = $_REQUEST['Dni'];
            $usu_usuario = $_REQUEST['Correo'];
            $usu_password = $_REQUEST['password'];
            $per_numero = $_REQUEST['Numero'];
            $per_direccion = $_REQUEST['Direccion'];
            $id_tipo_usu = $_REQUEST['id_tipo_usuario'];

            $objPersonaBean->setPer_nombre($per_nombre);
            $objPersonaBean->setPer_apellido($per_apellido);
            $objPersonaBean->setPer_dni($per_dni);
            $objPersonaBean->setPer_email($usu_usuario);
            $objPersonaBean->setPer_numero($per_numero);
            $objPersonaBean->setPer_direccion($per_direccion);

            $objUsuarioBean->setUsu_usuario($usu_usuario);
            $objUsuarioBean->setUsu_password($usu_password);
            $objUsuarioBean->setId_tipo_usuario($id_tipo_usu);

            $estado1 = $objPersonaDAO->InsertarPersona($objPersonaBean);

            if ($estado1 > 0) {
                $id = $objUsuarioDAO->ObtenerIDMax();
                $estado2 = $objUsuarioDAO->Agregar_usuario($id, $usu_usuario, $usu_password, $id_tipo_usu);

                if ($estado2 > 0) {


                    echo '<script src="../JAVASCRIPT/InsercionCorrecta(PERSONA).js"></script>';
                } else {
                    echo 'error al insertar';
                }
            }



            break;
        }




    case 20: { // MODIFICAR CATEGORIA
            $objCategoriaBean = new CategoriaBean();
            $objMantenimientosDAO = new MantenimientosDAO();

            $IDcategoria = $_REQUEST['ID_categoria'];
            $categoria_nombre_nuevo = $_REQUEST['nombre'];
            $categoria_descripcion_nuevo = $_REQUEST['descripcion'];


            $objCategoriaBean->setID_categoria($IDcategoria);
            $objCategoriaBean->setCat_nombre($categoria_nombre_nuevo);
            $objCategoriaBean->setCat_descripcion($categoria_descripcion_nuevo);

            $estado = $objMantenimientosDAO->ActualizarCategoria($objCategoriaBean);

            if ($estado > 0) {
                echo '<script src="../JAVASCRIPT/Actualizacion_Correcta(CATEGORIA).js"></script>';
            }

            break;
        }


    case 21: { // DESEAS ELIMINAR CATEGORIA?
            $ID_categoria = $_REQUEST['ID_categoria'];
            $_SESSION['ID_CATEGORIA'] = $ID_categoria;
            echo '<script src="../JAVASCRIPT/EliminarCategoria.js"></script>';


            break;
        }


    case 22: { // SI QUIERO ELIMINAR CATEGORIA?
            $objMantenimientosDAO = new MantenimientosDAO();
            $ID_categoria2 = $_SESSION['ID_CATEGORIA'];
            $estado = $objMantenimientosDAO->EliminarCategoria($ID_categoria2);

            if ($estado > 0) {
                unset($_SESSION['ID_CATEGORIA']);
                echo '<script> document.location.href="Mantenimiento_controlador.php?op=4";</script>';
            } else {
                echo '<script src="../JAVASCRIPT/ErrorBorrrarCategoria(Admin).js"></script>';
            }
            break;
        }


    case 23: { // QUIERES ELIMINAR PERSONA???????
            $id_persona = $_REQUEST['id_persona'];
            $_SESSION['ID_PERSONA'] = $id_persona;
            echo '<script src="../JAVASCRIPT/EliminarPersona.js"></script>';

            break;
        }

    case 24: { // SI QUIERO ELIMINAR PERSONA
            $objMantenimientosDAO = new MantenimientosDAO();
            $ID_persona = $_SESSION['ID_PERSONA'];
            $estado = $objMantenimientosDAO->EliminarUsuario($ID_persona);
            $estado2 = $objMantenimientosDAO->EliminarPersona($ID_persona);

            unset($_SESSION['ID_PERSONA']);
            echo '<script> document.location.href="Mantenimiento_controlador.php?op=2";</script>';

            break;
        }


    case 25: { // SI QUIERO MODIFICAR PERSONA
            $objMantenimientosDAO = new MantenimientosDAO();
            $objPersonaBean = new PersonaBean();
            $objUsuarioBean = new UsuarioBean();

            $id_persona = $_REQUEST['id_persona'];
            $per_nombre = $_REQUEST['nombre'];
            $per_apellido = $_REQUEST['apellido'];
            $per_dni = $_REQUEST['dni'];
            $usu_usuario = $_REQUEST['usuario'];
            $usu_password = $_REQUEST['password'];
            $per_numero = $_REQUEST['numero'];
            $per_direccion = $_REQUEST['direccion'];
            $id_tipo_usu = $_REQUEST['id_tipo_usu'];

            $objPersonaBean->setId_persona($id_persona);
            $objPersonaBean->setPer_nombre($per_nombre);
            $objPersonaBean->setPer_apellido($per_apellido);
            $objPersonaBean->setPer_dni($per_dni);
            $objPersonaBean->setPer_email($usu_usuario);
            $objPersonaBean->setPer_numero($per_numero);
            $objPersonaBean->setPer_direccion($per_direccion);

            $objUsuarioBean->setUsu_usuario($usu_usuario);
            $objUsuarioBean->setUsu_password($usu_password);
            $objUsuarioBean->setId_tipo_usuario($id_tipo_usu);

            $estado = $objMantenimientosDAO->ModififcarPersona_Usuario($objUsuarioBean, $objPersonaBean);

            if ($estado > 0) {
                echo '<script src="../JAVASCRIPT/Actualizacion_Correcta(PERSONA).js"></script>';
            }
            break;
        }
    case 26: {//PEDIDO LISTO
            $codped=$_REQUEST['pedidoID'];
            $objPedidoDAO=new PedidoDAO();
            $estado=$objPedidoDAO->PedidoListo($codped);
            
            if($estado>0){
                echo '<script src="../JAVASCRIPT/Pedido_Aceptado.js"></script>';
            }else{
                echo '<script src="../JAVASCRIPT/Error_Pedido.js"></script>';
            }
            break;
        }
    case 27:{//Empacar Pedido
            $codped=$_REQUEST['pedidoID'];
            $objPedidoDAO=new PedidoDAO();
            $estado=$objPedidoDAO->EmpacandoPedido($codped);
            if($estado>0){
                echo '<script src="../JAVASCRIPT/Pedido_Aceptado.js"></script>';
            }else{
                echo '<script src="../JAVASCRIPT/Error_Pedido.js"></script>';
            }
            break;
        }
    case 28:{//Entregar Pedido
            $codped=$_REQUEST['pedidoID'];
            $objPedidoDAO=new PedidoDAO();
            $estado=$objPedidoDAO->PedidoEntregado($codped);
            if($estado>0){
                echo '<script src="../JAVASCRIPT/Pedido_Aceptado.js"></script>';
            }else{
                echo '<script src="../JAVASCRIPT/Error_Pedido.js"></script>';
            }
            break;
    }
}
?>

<a href="../CONTROLADOR/Mantenimiento_controlador.php?op=5"

