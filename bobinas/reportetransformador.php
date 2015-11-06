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
    $sql_str = "Select transformador.marca_tran,transformador.nplaca_tran,transformador.tipo_acc_tran,"
            . "transformador.fe_acor_tran,transformador.fe_ter_tran,"
            . "cliente.nom_cliente,cliente.apellido,cliente.cedula,cliente.fecha_ingre,"
            . "cliente.telefono,cliente.ciudad,usuarios.nom_usu,cliente.direccion,cliente.serial "
            . "from transformador "
            . "inner join cliente on cliente.id = transformador.idclie_tran "
            . "inner join usuarios on usuarios.id_usu = transformador.idusu_tran "
            . "where transformador.id_tran = $val";
    
            $sql = $conn->getConn()->prepare($sql_str);
            $sql->execute();
            $resultado = $sql->fetchAll();
            
                foreach ($resultado as $row) {
                    $nummotor = $row['marca_tran'];
                    $marca = $row['nplaca_tran'];
                    $tipo = $row['tipo_acc_tran'];
                    //$revicion = $row['revicion'];
                    $fecaco = $row['fe_acor_tran'];
                    $feter = $row['fe_ter_tran'];
                    $serial = $row['serial'];
                    $resp = $row['nom_usu'];
                    $cli = $row['nom_cliente'];
                    $cli1 = $row['apellido'];
                    $ced = $row['cedula'];
                    $dir = $row['direccion'];
                    $tel = $row['telefono'];
                    $fech = $row['fecha_ingre'];
                    $ciu = $row['ciudad'];
                }
                
}



////////Imagen
$pdf->Image('Logo/logo.png',85,20,30);

$pdf->SetFont($letra,'B',10);
$pdf->Cell(0,80,'CL 18 12-37 VALLEDUPAR, COLOMBIA',0,1,'C');
$pdf->Cell(0,-70,'Tel: (57) (5) 5713808',0,1,'C');


$pdf->SetFont($letra,'B',12);
$pdf->Cell(180,110,'DATOS PERSONALES DEL CLIENTE',0,1,'C');

$pdf->SetFont($letra,'B',$tamaño);
$pdf->Cell(90,-90,'CLIENTE:  '.$cli." ".$cli1,0,0,'L');
$pdf->Cell(90,-90,'CEDULA:  '.$ced,0,1,'L');

//////

$pdf->Cell(90,110,'DIRECCION:  '.$dir,0,0,'L');
$pdf->Cell(90,110,'TELEFONO:  '.$tel,0,1,'L');

//////

$pdf->Cell(90,-90,'FECHA INGRESO:  '.$fech,0,0,'L');
$pdf->Cell(90,-90,'CIUDAD:  '.$ciu,0,1,'L');

$pdf->Cell(90,110,'CLAVE DE INGRESO:  '.$serial,0,1,'L');

//////

$pdf->SetFont($letra,'B',12);
$pdf->Cell(180,-90,'DATOS DEL TRANSFORMADOR',0,1,'C');

//////

$pdf->SetFont($letra,'B',$tamaño);

$pdf->Cell(90,110,'MARCA DEL TRANSFORMADO:  '.$nummotor,0,0,'L');
$pdf->Cell(90,110,'PLACA TRANSFORMADOR:  '.$marca,0,1,'L');

$pdf->Cell(90,-90,'TIPO DE ENTRADA:  '.$tipo,0,0,'L');
$pdf->Cell(90,-90,'RESPONSABLE:  '.$resp,0,1,'L'); 

$pdf->Cell(90,110,'FECHA ACOR. DE ENTREGA:  '.$fecaco,0,0,'L');
$pdf->Cell(90,110,'FECHA TERM. DEL SERVICIO:  '.$feter,0,1,'L');


$pdf->SetFont($letra,'B',10);
$pdf->Cell(180,-70,'  FIRMA AUTORIZADA   _______________________________________',0,1,'L');
$pdf->Cell(180,90,'  FIRMA DEL CLIENTE   _______________________________________',0,1,'L');


$pdf->Output();

