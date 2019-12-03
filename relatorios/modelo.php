<?php 

require_once "../fpdf/fpdf.php";
require_once "../php/negocio/class/Usuario.php";
require_once "../php/persistencia/UsuarioDAO.php";

$objUser = new Usuario();

//https://www.youtube.com/watch?v=6L42UzcZdjo
//http://henriquecorrea.com/news/Relatorios_em_PDF_com_PHP_usando_a_classe_FPDF

foreach($objUser-> as $usuarios){

}

$pdf = new FPDF();
$pdf->AddPage('P', 'A4');

//$pdf->Image('images/logo.png', -20);
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(80);
$pdf->Cell(30, 10, 'Pessoas', 0, 0, 'C');//'Pessoas' centralizado no meio da página
$pdf->Ln(20);

//CABEÇALHO DA TABELA
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(90, 7, 'Nome', 1);
$pdf->Cell(90, 7, 'Email', 1);
$pdf->Ln();

    

$arquivo = "relatorio.pdf";

$tipo_pdf = "I";

$pdf->Output($arquivo, $tipo_pdf);
?>

