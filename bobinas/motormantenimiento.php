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
    $sql_str = "SELECT motorl.num_serie_motor,motorl.marca,motorl.hp,motorl.kw,motorl.rpm,motorl.n_fases,"
            . "motorl.cotizado, motorl.autorizado,motorl.accion,motorl.fe_termi,motorl.fe_acord,motorl.revicion,"
            . "motorl.estado, cliente.cedula,CONCAT(cliente.nom_cliente,' ',cliente.apellido) as cliente, "
            . "mantenimiento_motor.amp,mantenimiento_motor.voltios,mantenimiento_motor.balineras,"
            . "mantenimiento_motor.sello_mecanico, mantenimiento_motor.cap_arranque,mantenimiento_motor.cap_marcha,"
            . "mantenimiento_motor.otros,mantenimiento_motor.p_finales, mantenimiento_motor.observaciones "
            . "from mantenimiento_motor "
            . "INNER JOIN motorl on motorl.id_motores = mantenimiento_motor.id_motor "
            . "INNER JOIN cliente ON cliente.id = motorl.id_cliente "
            . "WHERE mantenimiento_motor.id_motor = ".$val;
    
        $sql = $conn->getConn()->prepare($sql_str);
        $sql->execute();
        $resultado = $sql->fetchAll();
            foreach ($resultado as $row) {
                $amp                    = $row['amp'];
                $voltios                = $row['voltios'];
                $balineras              = $row['balineras'];
                $sello_mecanico         = $row['sello_mecanico'];
                $cap_arranque           = $row['cap_arranque'];
                $cap_marcha             = $row['cap_marcha'];
                $otros                  = $row['otros'];
                $p_finales              = $row['p_finales'];
                $observaciones          = $row['observaciones'];
                //Motor
                $num_serie_motor        = $row['num_serie_motor'];
                $marca                  = $row['marca'];
                $hp                     = $row['hp'];
                $kw                     = $row['kw'];
                $rpm                    = $row['rpm'];
                $n_fases                = $row['n_fases'];
                $cotizado               = $row['cotizado'];
                $autorizado             = $row['autorizado'];
                $accion                 = $row['accion'];
                $fe_termi               = $row['fe_termi'];
                $revicion               = $row['revicion'];
                $estado                 = $row['estado'];
                $cliente                = $row['cliente'];
                $cedula                 = $row['cedula'];
            }    
    
}
////////Imagen
$pdf->Image('Logo/logo.png',85,20,30);

$pdf->SetFont($letra,'B',10);
$pdf->Cell(0,80,'CL 18 12-37 VALLEDUPAR, COLOMBIA',0,1,'C');
$pdf->Cell(0,-70,'Tel: (57) (5) 5713808',0,1,'C');

$pdf->SetFont($letra,'B',12);
$pdf->Cell(180,120,'DATOS DEL CLIENTE',0,1,'C');

$pdf->SetFont($letra,'B',$tamaño);
$pdf->Cell(90,-90,'CLIENTE:  '.$cliente,0,0,'L');
$pdf->Cell(80,-90,'CEDULA:  '.$cedula,0,1,'L');

$pdf->SetFont($letra,'B',12);
$pdf->Cell(180,120,'DATOS DEL MOTOR',0,1,'C');

$pdf->SetFont($letra,'B',$tamaño);
$pdf->Cell(90,-90,'SERIE DEL MOTOR:  '.$num_serie_motor,0,0,'L');
$pdf->Cell(90,-90,'MARCA DEL MOTOR:  '.$marca,0,1,'L');

$pdf->Cell(90,100,'HP:  '.$hp,0,0,'L');
$pdf->Cell(90,100,'KW:  '.$kw,0,1,'L');

$pdf->Cell(90,-90,'RPM:  '.$rpm,0,0,'L');
$pdf->Cell(90,-90,'# DE FASES:  '.$n_fases,0,1,'L');

$pdf->Cell(90,100,'COTIZADO:  '.$cotizado,0,0,'L');
$pdf->Cell(90,100,'AUTORIZADO:  '.$autorizado,0,1,'L');

$pdf->Cell(90,-90,'ACCIOM:  '.$accion,0,0,'L');
$pdf->Cell(90,-90,'FECHA TERMINACION:  '.$fe_termi,0,1,'L');

$pdf->Cell(90,100,'ESTADO:  '.$estado,0,1,'L');
$pdf->Ln(70);

$pdf->SetFont($letra,'B',12);
$pdf->Cell(180,10,'DATOS DEL MANTENIMIENTO DEL MOTOR',1,1,'C');

$pdf->SetFont($letra,'B',$tamaño);

$pdf->Cell(90,30,'AMP:  '.$amp,0,0,'L');
$pdf->Cell(80,30,'VOLTIOS:  '.$voltios,0,1,'L');

$pdf->Cell(90,-20,'BALINERAS:  '.$balineras,0,0,'L');
$pdf->Cell(90,-20,'SELLO MECANICO:  '.$sello_mecanico,0,1,'L');

$pdf->Cell(90,30,'CAPACITADOR DE ARRANQUE:  '.$cap_arranque,0,0,'L');
$pdf->Cell(80,30,'CAPACITADOR DE MARCHA:  '.$cap_marcha,0,1,'L');

$pdf->Cell(90,-20,'OTROS:  '.$otros,0,0,'L');
$pdf->Cell(90,-20,'PRUEBA FINALES:  '.$p_finales,0,1,'L');

$pdf->Cell(90,30,'OBSERVACIONES:  '.$observaciones,0,0,'L');

$pdf->Output();

