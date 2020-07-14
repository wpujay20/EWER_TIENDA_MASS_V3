
<?php

if (!isset($_SESSION)) {
    session_start();
}

require_once '../DAO/PersonaDAO.php';
require_once '../DAO/PedidoDAO.php';

$opciones = $_REQUEST['op'];

switch ($opciones) {
    case 1: { //permite llenar la lista de productos
            unset($_SESSION['lista']);

            $objPersona = new PersonaDAO();
            $lista = $objPersona->ListarProductos();
            $_SESSION['lista'] = $lista;
            //var_dump($lista);
            echo '<script>  document.location.href="../VISTAS/MenuCompras.php"; </script>';

            break;
        }
    case 2: { //Listando Pedidos Que el Cliente ha Registrado
            $id_perso = $_SESSION['id_persona'];
            $objPedidoDAO = new PedidoDAO();
            $ListaPedidos = $objPedidoDAO->ListarPedidosRealizadosPorParteDelCliente($id_perso);
            $_SESSION['ListaPedidos'] = $ListaPedidos;


            echo '<script>  document.location.href="../VISTAS/PedidosRealizados.php"; </script>';
            break;
        }

    case 3: {
            # Aquí se hará la función para el TICKET

            $idP = $_REQUEST['pedidoID'];

            $objPedidoDAO = new PedidoDAO();
            $ListaPorIDdp = $objPedidoDAO->ListarDetallePedidoPorID($idP);
            $_SESSION['ListaDetalle'] = $ListaPorIDdp;
            echo '<script>  document.location.href="../VISTAS/PedidosRealizados.php"; </script>';

            break;
        }
    case 4: {
            $idP = $_REQUEST['pedidoID'];
            $objPedidoDAO = new PedidoDAO();
            $ListaPorIDdp = $objPedidoDAO->ListarDetallePedidoPorID($idP);
            $_SESSION['ListaDetalle'] = $ListaPorIDdp;
            echo '<script>  document.location.href="../VISTAS/MANTENIMIENTOS/PedidosMantenimientos.php"; </script>';
        }
}
?>


