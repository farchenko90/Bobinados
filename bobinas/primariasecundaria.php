<?php

require('./fpdf/fpdf.php');
include_once 'Conexion/conexion.php';


$letra = 'Arial';
$tamaño = 10;
$pdf = new FPDF();
$pdf->AddPage();

$val;
if(isset($_GET['uri'])){
    $val = $_GET['uri'];
}
$conn = new Conexion();
if($conn->conectar()){
    $sql_str = "SELECT reparacion_trans.refri_repa,reparacion_trans.tipo_conductor,reparacion_trans.bisel_repa,
        reparacion_trans.fibra_repa,reparacion_trans.potencia,reparacion_trans.vprimario,reparacion_trans.vsengundario,
        reparacion_trans.tipo,reparacion_trans.id_repa,reparacion_trans.nsecuencia,
        
        reparacion_trans.largo_repa,reparacion_trans.ancho_repa,reparacion_trans.altu_repa,reparacion_trans.n2,
        reparacion_trans.bobinas,reparacion_trans.cali_repa,reparacion_trans.otros_repa,reparacion_trans.potencia 
        FROM reparacion_trans where reparacion_trans.id_repa = $val";
    $sql = $conn->getConn()->prepare($sql_str);
    $sql->execute();
    $resultado = $sql->fetchAll();
    foreach ($resultado as $row) {
        $refri_repa             = $row['refri_repa'];
        $tipo_conductor         = $row['tipo_conductor'];
        $bisel_repa             = $row['bisel_repa'];
        $fibra_repa             = $row['fibra_repa'];
        $potencia               = $row['potencia'];
        $vprimario              = $row['vprimario'];
        $vsengundario           = $row['vsengundario'];
        $tipo                   = $row['tipo'];
        $nsecuencia             = $row['nsecuencia'];
        $largo_repa             = $row['largo_repa'];
        $ancho_repa             = $row['ancho_repa'];
        $altu_repa              = $row['altu_repa'];
        $bobina                 = $row['bobinas'];
        $cali_repa              = $row['cali_repa'];
        $otros_repa              = $row['otros_repa'];
    }
}

$pdf->Image('Logo/logo.png',85,20,30);

$pdf->SetFont($letra,'B',10);
$pdf->Cell(0,80,'CL 18 12-37 VALLEDUPAR, COLOMBIA',0,1,'C');
$pdf->Cell(0,-70,'Tel: (57) (5) 5713808',0,1,'C');

$pdf->SetFont($letra,'B',12);
$pdf->Cell(180,120,'DATOS DEL TRANSFORMADOR REPARACION',0,1,'C');

$pdf->SetFont($letra,'B',$tamaño);
$pdf->Cell(90,-90,'REFRIGERACION:  '.$refri_repa,0,0,'L');
$pdf->Cell(80,-90,'T. CONDUCTOR:  '.$tipo_conductor,0,1,'L');

$pdf->Cell(90,100,'BISEL:  '.$bisel_repa,0,0,'L');
$pdf->Cell(90,100,'FIBRA:  '.$fibra_repa,0,1,'L');

$pdf->Cell(90,-90,'POTENCIA:  '.$potencia,0,0,'L');
$pdf->Cell(80,-90,'V. PRIMARIO:  '.$vprimario,0,1,'L');

$pdf->Cell(90,100,'V. SECUNDARIO:  '.$vsengundario,0,0,'L');
$pdf->Cell(90,100,'TIPO:  '.$tipo,0,1,'L');

$pdf->Cell(90,-90,'N. SECUENCIA:  '.$nsecuencia,0,0,'L');
$pdf->Cell(80,-90,'LARGO:  '.$largo_repa,0,1,'L');

$pdf->Cell(90,100,'ANCHO:  '.$ancho_repa,0,0,'L');
$pdf->Cell(90,100,'ALTURA:  '.$altu_repa,0,1,'L');

$pdf->Cell(90,-90,'BOBINA:  '.$bobina,0,0,'L');
$pdf->Cell(80,-90,'CALBRE:  '.$cali_repa,0,1,'L');

$pdf->Cell(90,100,'OTRO:  '.$otros_repa,0,1,'L');

$pdf->Output();