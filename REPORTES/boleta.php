<?php

ob_start();
unset($_SESSION['ListaDetalle']);
session_start();


require_once '../vendor/autoload.php';
require_once './example1/index.php';
require_once '../DAO/PedidoDAO.php';


$mpdf = new \Mpdf\Mpdf([
    "format" => "A4"
        ]);
//plantilla
//$mpdf->SetFooter('{PAGENO}');


 $ListaPorIDdp = $_SESSION['ListaDetalle'];

//$objPedidoDAO = new PedidoDAO();
//$ListaDetalle = $objPedidoDAO->ListarDetallePedidoPorID(32);
  
$plantilla = getPDF($ListaPorIDdp);
//css
$css = file_get_contents('./example1/style.css');
$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);

$mpdf->writeHtml($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);

 

$mpdf->Output("reporte", "I");

ob_end_flush();
// ob_end_flush();
?>