<?php
include('ReporteGeneral.php');
include('BD/conexionbd.php');

$id = $_GET['idCat'];

$sqlProdutos = "SELECT p.CodigoP,p.NombreP,p.Precio,c.IdCategoria FROM productos
    AS p INNER JOIN categorias AS c ON p.IdCategoria= c.IdCategoria WHERE
    c.IdCategoria = '$id' ";
$resulProductos = $conexion->query($sqlProdutos);

$pdf = new PDF('L', 'mm', 'letter');
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Arial', 'B', 16);/* tipo letra,style,size ITALIC BOLD U=SUBRAYADA*/
$pdf->Cell(0, 12, 'Lista de Productos', 0, 1, 'C');
$pdf->Ln(10);

/* Encabezado de la tabla */
$pdf->SetFillColor(232, 232, 230);
$pdf->SetFont('Times', 'B', 14);
$pdf->Cell(40, 12, 'CODIGO', 1, 0, 'C', 1);
$pdf->Cell(190, 12, 'PRODUCTO', 1, 0, 'C', 1);
$pdf->Cell(30, 12, 'Precio', 1, 1, 'C', 1);
/* SAlto de linea */
/* cuerpo de la tabla */

$pdf->SetFont('Arial', '', 12);
while ($registro = $resulProductos->fetch_array(MYSQLI_BOTH)) {
    $pdf->Cell(40, 12, $registro['CodigoP'], 1, 0, 'L');
    $pdf->Cell(190, 12, $registro['NombreP'], 1, 0, 'L');
    $pdf->Cell(30, 12, $registro['Precio'], 1, 1, 'R');
    /* SALTO DE LINEA 1 */
}

$pdf->Output();
