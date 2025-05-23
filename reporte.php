<?php
require('fpdf/fpdf.php');
require('conn.php'); // Archivo de conexión a la base de datos

class PDF extends FPDF
{
    function Header()
    {
        // Logo
        $this->Image('img/logo.png', 10, 6, 30); // Ajusta el logo según tu archivo
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, utf8_decode('Reporte de administrativo'), 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer()
    {
        // Pie de página
        $this->SetY(-15);
        $this->SetFont('Arial', '', 8);
        $this->Cell(0, 10, utf8_decode('Pág. ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
        $this->Cell(0, 10, date('d-m-Y'), 0, 0, 'R');
    }

    function FancyTable($header, $data)
    {
        // Colores, ancho de línea y fuente en negrita
        $this->SetFillColor(255, 102, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(255, 255, 255);
        $this->SetLineWidth(.3);
        $this->SetFont('Arial', 'B', 10);

        // Ancho de columnas
        $w = array(20, 30, 30, 65, 30, 40, 40, 40); // Ajusta los anchos según los datos

        // Cabecera
        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 7, utf8_decode($header[$i]), 1, 0, 'C', true);
        }
        $this->Ln();

        // Restaurar colores y fuente
        $this->SetFillColor(255);
        $this->SetTextColor(0);
        $this->SetFont('Arial', '', 9);

        // Datos
        $fill = false;
        foreach ($data as $row) {
            $this->Cell($w[0], 6, utf8_decode($row[0]), 'LR', 0, 'C', $fill);
            $this->Cell($w[1], 6, utf8_decode($row[1]), 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, utf8_decode($row[2]), 'LR', 0, 'L', $fill);
            $this->Cell($w[3], 6, utf8_decode($row[3]), 'LR', 0, 'L', $fill);
            $this->Cell($w[4], 6, utf8_decode($row[4]), 'LR', 0, 'R', $fill);
            $this->Cell($w[5], 6, utf8_decode($row[5]), 'LR', 0, 'L', $fill);
            $this->Cell($w[6], 6, utf8_decode($row[6]), 'LR', 0, 'L', $fill);
            $this->Cell($w[7], 6, utf8_decode($row[7]), 'LR', 0, 'L', $fill);
            $this->Ln();
            $fill = !$fill;
        }
        // Línea de cierre
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}

// Consulta a la base de datos
$sql = "SELECT ID_Reporte, Fecha, Hora, Actividades, Costo, Empleados, Servicios, Cliente 
        FROM reportes 
        ORDER BY ID_Reporte ASC";

$resultado = mysqli_query($conectar, $sql);

$data = [];
while ($row = mysqli_fetch_assoc($resultado)) {
    $data[] = [
        $row['ID_Reporte'], 
        $row['Fecha'], 
        $row['Hora'], 
        $row['Actividades'], 
        '$' . number_format($row['Costo'], 2), // Formato de moneda
        $row['Empleados'], 
        $row['Servicios'], 
        $row['Cliente']
    ];
}

// Crear el PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L'); // Cambiar a orientación horizontal
$pdf->FancyTable(
    ['ID', 'Fecha', 'Hora', 'Actividades', 'Costo', 'Empleados', 'Servicios', 'Cliente'], 
    $data
);
$pdf->Output();
?>
