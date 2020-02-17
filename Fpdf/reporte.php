<?php /* Portrait Landscape */
require('fpdf/fpdf.php');

/* orientacion, unidad de medida, tamaño alto ancho o a4 letter etc*/
$pdf = new FPDF();/* 'P','mm',array(90,180) */ 
$pdf->AddPage();/* 'L','letter',0 */
$pdf->SetFont('Arial','B',18);/* tipo letra,style,size ITALIC BOLD U=SUBRAYADA*/
$pdf->Cell(120,12,'Hola Mundo',1,0,'C'); /* BORDER L LR BT */
/* ANCHO,ALTO,TEXTO,BORDE,SALTO DE LINEA,ALINEACION */
$pdf->Cell(0,12,'Hola Mundo',0,0,'C',0);
$pdf->Output('',"MiPrimerReporte.pdf",true);/* descarga automatica */
/* Si solo quiere mostrarlo no pongas nada */
?>
