<?php
session_start();


require '../vendor/autoload.php';
require_once '../vendor/stripe/stripe-php/init.php';
require_once '../BEAN/PedidoBean.php';
require_once '../DAO/PedidoDAO.php';



\Stripe\Stripe::setApiKey("sk_test_51Gv2cDIC1NF0bHGmSdJkmz1UA6fTotRLYT9Tr2eRjRJMA7uxJvZ9C5xWPhsgqcLI342UAoEi3csbZKDOqY1neE1Q002w5YDd0W");

// set up your tweaked Curl client
$curl = new \Stripe\HttpClient\CurlClient([CURLOPT_PROXY => '000webhost.com']);
// tell Stripe to use the tweaked client
\Stripe\ApiRequestor::setHttpClient($curl);


$idperso = $_SESSION['id_persona'];
//$charge=null;
if (!empty($_SESSION['CARRITO'])) {
    $amount = $_SESSION['total'];

    $token = $_POST["stripeToken"];
    $charge = \Stripe\Charge::create([
                "amount" => number_format($amount, 2, '', ''),
                "currency" => "PEN",
                "description" => "Consumibles",
                "source" => $token
    ]);
//Guarda el cargo creado en una variable sesion
    

    $_SESSION['pago'] = $charge;

    //INSERCIÓN DE DE DATOS A LA TABLA PEDIDO Y DETALLE DE PEDIDO
    $objPedBean = new PedidoBean;
    $objPedDAO = new PedidoDAO;
    $total = 0;
    $SID = session_id();
    $NumeroProductos = count($_SESSION['CARRITO']);
    foreach ($_SESSION['CARRITO'] as $producto => $indi) {
        $total = $total + ($indi['P_PRECIO'] * $indi['P_CANTIDAD']);
    }

    $objPedBean->setId_persona($idperso);
    $objPedBean->setPedido_monto($total);
    $objPedDAO->InsertarPedidoCli($objPedBean);

    foreach ($_SESSION['CARRITO'] as $producto => $indi) {
        $ID_PEDIDO = $objPedDAO->ObtenerIDMaxPedido();
        $objPedDAO->InsertarDetalleDePedido($indi['ID'], $ID_PEDIDO, $indi['P_CANTIDAD']);
        $stock = $indi['P_STOCK'];
        $updateStoke = $stock - $indi['P_CANTIDAD'];
        $objPedDAO->ModificarStock($updateStoke, $indi['ID']);
    }
    unset($_SESSION['CARRITO']);
    echo' <script src="../JAVASCRIPT/Jquery/jquery-1.6.3.min.js"></script>  
         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
          <script src="../JAVASCRIPT/PagoRealizado.js" type="text/javascript"></script>
                         ';
    

//Imprime los datos guardados del cargo    
    // echo "<pre>", print_r($charge), "</pre>";
}
?>
 
