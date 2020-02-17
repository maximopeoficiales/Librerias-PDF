<?php

include('ReporteGeneral.php');
/* orientacion, unidad de medida, tamaño alto ancho o a4 letter etc*/
$pdf = new PDF();/* 'P','mm',array(90,180) */ 
$pdf->AddPage();/* 'L','letter',0 */
$pdf->AliasNbPages();/* activa el alias */
$pdf->SetFont('Arial','B',18);/* tipo letra,style,size ITALIC BOLD U=SUBRAYADA*/
$pdf->Cell(0,12,'Reporte 2',1,1,'C'); 



$pdf->Output();