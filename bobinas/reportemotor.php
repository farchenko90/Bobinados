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
    $sql_str = "Select motorl.num_serie_motor,motorl.marca,motorl.autorizado,motorl.accion,motorl.fe_termi,"
            . "motorl.fe_acord,motorl.revicion,cliente.nom_cliente,cliente.apellido,cliente.cedula,cliente.fecha_ingre,"
            . "cliente.telefono,cliente.ciudad,usuarios.nom_usu,cliente.direccion,cliente.serial "
            . "from motorl "
            . "inner join cliente on cliente.id = motorl.id_cliente "
            . "inner join usuarios on usuarios.id_usu = motorl.id_usu "
            . "where motorl.id_motores = $val";
    
            $sql = $conn->getConn()->prepare($sql_str);
            $sql->execute();
            $resultado = $sql->fetchAll();
            
                foreach ($resultado as $row) {
                    $nummotor = $row['num_serie_motor'];
                    $marca = $row['marca'];
                    $tipo = $row['accion'];
                    $revicion = $row['revicion'];
                    $fecaco = $row['fe_acord'];
                    $feter = $row['fe_termi'];
                    $auto = $row['autorizado'];
                    $resp = $row['nom_usu'];
                    $cli = $row['nom_cliente'];
                    $cli1 = $row['apellido'];
                    $ced = $row['cedula'];
                    $dir = $row['direccion'];
                    $tel = $row['telefono'];
                    $fech = $row['fecha_ingre'];
                    $ciu = $row['ciudad'];
                    $serial = $row['serial'];
                }
                
}



////////Imagen
$pdf->Image('Logo/logo.png',85,20,30);

$pdf->SetFont($letra,'B',10);
$pdf->Cell(0,80,'CL 18 12-37 VALLEDUPAR, COLOMBIA',0,1,'C');
$pdf->Cell(0,-70,'Tel: (57) (5) 5713808',0,1,'C');

$pdf->SetFont($letra,'B',12);
$pdf->Cell(180,120,'DATOS PERSONALES DEL CLIENTE',0,1,'C');

$pdf->SetFont($letra,'B',$tamaño);
$pdf->Cell(90,-90,'CLIENTE:  '.$cli." ".$cli1,0,0,'L');
$pdf->Cell(80,-90,'CEDULA:  '.$ced,0,1,'L');

//////

$pdf->Cell(90,110,'DIRECCION:  '.$dir,0,0,'L');
$pdf->Cell(90,110,'TELEFONO:  '.$tel,0,1,'L');

//////

$pdf->Cell(90,-90,'FECHA INGRESO:  '.$fech,0,0,'L');
$pdf->Cell(90,-90,'CIUDAD:  '.$ciu,0,1,'L');

$pdf->Cell(67,110,'CLAVE DE INGRESO:  '.$serial,0,1,'L');

//////

$pdf->SetFont($letra,'B',12);
$pdf->Cell(180,-90,'DATOS DEL MOTOR',0,1,'C');

//////

$pdf->SetFont($letra,'B',$tamaño);

$pdf->Cell(90,110,'SERIE DEL MOTOR:  '.$nummotor,0,0,'L');
$pdf->Cell(90,110,'MARCA DEL MOTOR:  '.$marca,0,1,'L');

$pdf->Cell(90,-90,'TIPO DE ENTRADA:  '.$tipo,0,0,'L');
$pdf->Cell(90,-90,'REVISION:  '.$revicion,0,1,'L');

$pdf->Cell(90,110,'FECHA ACOR. DE ENTREGA:  '.$fecaco,0,0,'L');
$pdf->Cell(90,110,'FECHA TERM. DEL SERVICIO:  '.$feter,0,1,'L');

$pdf->Cell(90,-90,'AUTORIZADO:  '.$auto,0,0,'L');
$pdf->Cell(90,-90,'RESPONSABLE:  '.$resp,0,1,'L');


$pdf->SetFont($letra,'B',10);
$pdf->Cell(180,130,'  FIRMA AUTORIZADA   _______________________________________',0,1,'L');
$pdf->Cell(180,-100,'  FIRMA DEL CLIENTE   _______________________________________',0,1,'L');

$pdf->Output();

