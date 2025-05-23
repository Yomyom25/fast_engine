<?php
require('fpdf/fpdf.php');
require('conn.php'); // Archivo de conexión a la base de datos

class PDF extends FPDF
{
    function Header()
    {
        $this->Image('img/logo.png', 10, 6, 30); // Ajusta el logo según tu archivo
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, utf8_decode('Reporte Administrativo'), 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', '', 8);
        $this->Cell(0, 10, utf8_decode('Pág. ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
        $this->Cell(0, 10, date('d-m-Y'), 0, 0, 'R');
    }

    function FancyTable($header, $data)
    {
        $this->SetFillColor(255, 102, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(255, 255, 255);
        $this->SetLineWidth(.3);
        $this->SetFont('Arial', 'B', 10);

        $w = array(20, 30, 30, 65, 30, 40, 40, 40);

        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 7, utf8_decode($header[$i]), 1, 0, 'C', true);
        }
        $this->Ln();

        $this->SetFillColor(255);
        $this->SetTextColor(0);
        $this->SetFont('Arial', '', 9);

        $fill = false;
        foreach ($data as $row) {
            foreach ($row as $key => $value) {
                $align = is_numeric($value) ? 'R' : 'L';
                $this->Cell($w[$key], 6, utf8_decode($value), 'LR', 0, $align, $fill);
            }
            $this->Ln();
            $fill = !$fill;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}

// Consulta a la base de datos con joins para obtener los nombres en lugar de las IDs
$sql = "
    SELECT 
        r.ID_Reporte, 
        r.Fecha, 
        r.Hora, 
        r.Costo, 
        e.Nombre_Empleado AS Empleado, 
        s.Nombre_Servicio AS Servicio, 
        c.Nombre_Cliente AS Cliente
    FROM reportes r
    JOIN empleados e ON r.Empleados = e.ID_Empleado
    JOIN servicios s ON r.Servicios = s.ID_Servicio
    JOIN clientes c ON r.Cliente = c.ID_Cliente
    ORDER BY r.ID_Reporte ASC";

$resultado = mysqli_query($conectar, $sql);

$data = [];
while ($row = mysqli_fetch_assoc($resultado)) {
    $data[] = [
        $row['ID_Reporte'],
        $row['Fecha'],
        $row['Hora'],
        '$' . number_format($row['Costo'], 2), // Formato de moneda
        $row['Empleado'],
        $row['Servicio'],
        $row['Cliente']
    ];
}

// Crear el PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L');
$pdf->FancyTable(
    ['ID', 'Fecha', 'Hora', 'Costo', 'Empleado', 'Servicio', 'Cliente'], 
    $data
);
$pdf->Output();
?>
