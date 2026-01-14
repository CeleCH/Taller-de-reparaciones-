
<?php
require('../fpdf/fpdf.php');
include("../config/conexion.php");

$id = $_GET['id'];

$orden = mysqli_fetch_assoc(
  mysqli_query($conexion, "
    SELECT o.*,
           c.nombre AS cliente,
           t.nombre AS tecnico
    FROM ordenes o
    JOIN clientes c ON o.cliente_id = c.id
    LEFT JOIN tecnicos t ON o.tecnico_id = t.id
    WHERE o.id = $id
  ")
);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,10,'Orden de Reparacion',0,1,'C');

$pdf->Ln(5);
$pdf->SetFont('Arial','',11);

$pdf->Cell(0,8,'Cliente: '.$orden['cliente'],0,1);
$pdf->Cell(0,8,'Tecnico: '.($orden['tecnico'] ?? 'Sin asignar'),0,1);
$pdf->Cell(0,8,'Estado: '.$orden['estado'],0,1);
$pdf->Cell(0,8,'Fecha: '.$orden['fecha_ingreso'],0,1);

$pdf->Ln(5);
$pdf->MultiCell(0,8,'Problema: '.$orden['problema']);

$pdf->Output();
