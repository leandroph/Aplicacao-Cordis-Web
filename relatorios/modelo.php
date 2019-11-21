<?php 
require_once "../fpdf/fpdf.php";
//https://www.youtube.com/watch?v=6L42UzcZdjo
$pdf = new FPDF();
$pdf->AddPage();

$arquivo = "relatorio.pdf";

$tipo_pdf = "I";

$pdf->Output($arquivo, $tipo_pdf);
?>

