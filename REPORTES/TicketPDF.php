<?php
require_once '../../vendor/autoload.php';
require_once './example2/plantilla.php';

$mpdf = new \Mpdf\Mpdf([
    
]);
// plantilla html
$plantilla= getPlantilla();

//codigo css de la plantilla
$css = file_get_contents('./example2/style.css');
$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);

$mpdf->writeHtml($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);

$mpdf->Output("reporte","I");

?>