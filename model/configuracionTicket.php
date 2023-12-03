<?php

require_once('../utils/tcpdf/tecnickcom/tcpdf/tcpdf.php');

// Crear un nuevo documento PDF
$pdf = new TCPDF();

// Agregar una página
$pdf->AddPage();

// Escribir el contenido
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(0, 10, 'Detalles de la compra:', 0, 1);
$pdf->Ln();

// Supongamos que tienes los detalles de la compra en variables como $productos, $total, $cliente, etc.
// Aquí un ejemplo de cómo podrías mostrarlos en el PDF
$pdf->Cell(0, 10, 'Productos:', 0, 1);
foreach ($productos as $producto) {
    $pdf->Cell(0, 10, $producto['nombre'] . ' - ' . $producto['precio'], 0, 1);
}
$pdf->Cell(0, 10, 'Total: $' . $total, 0, 1);
$pdf->Cell(0, 10, 'Cliente: ' . $cliente['nombre'], 0, 1);

// Generar el archivo PDF
$pdf->Output('factura.pdf', 'D');

?>