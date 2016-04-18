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
    $sql_str = "SELECT motorl.num_serie_motor,motorl.marca,motorl.hp,motorl.kw,motorl.rpm,motorl.n_fases,
            motorl.cotizado, motorl.autorizado,motorl.accion,motorl.fe_termi,motorl.fe_acord,motorl.revicion,
            motorl.estado, cliente.cedula,CONCAT(cliente.nom_cliente,' ',cliente.apellido) as cliente,
            rebobinado_trifasico.largo,rebobinado_trifasico.sello,rebobinado_trifasico.paso,rebobinado_trifasico.retenedor,
            rebobinado_trifasico.espiras,rebobinado_trifasico.balinera,rebobinado_trifasico.calibre,rebobinado_trifasico.peso_bobina,
            rebobinado_trifasico.peso_total,rebobinado_trifasico.fibra,rebobinado_trifasico.num_ranura,rebobinado_trifasico.num_bobina,
            rebobinado_trifasico.num_bobina_grupo,rebobinado_trifasico.observacion,rebobinado_trifasico.sugerencia from rebobinado_trifasico
            INNER JOIN motorl on motorl.id_motores = rebobinado_trifasico.id_motor 
            INNER JOIN cliente ON cliente.id = motorl.id_cliente 
            WHERE rebobinado_trifasico.id_motor = ".$val;
            
        $sql = $conn->getConn()->prepare($sql_str);
        $sql->execute();
        $resultado = $sql->fetchAll();
            foreach ($resultado as $row) {
                $largo                  = $row['largo'];
                $sello                  = $row['sello'];
                $paso                   = $row['paso'];
                $retenedor              = $row['retenedor'];
                $espiras                = $row['espiras'];
                $calibre                = $row['calibre'];
                $peso_bobina            = $row['peso_bobina'];
                $peso_total             = $row['peso_total'];
                $num_ranura             = $row['num_ranura'];
                $num_bobina             = $row['num_bobina'];
                $num_bobina_grupo       = $row['num_bobina_grupo'];
                $observacion            = $row['observacion'];
                $sugerencia             = $row['sugerencia'];
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

$pdf->Cell(90,100,'ESTADO:  '.$estado,0,0,'L');

$pdf->Ln(180);

$pdf->SetFont($letra,'B',12);
$pdf->Cell(180,10,'DATOS DEL MOTOR TRIFASICO',1,1,'C');

$pdf->SetFont($letra,'B',$tamaño);

$pdf->Cell(90,30,'LARGO:  '.$largo,0,0,'L');
$pdf->Cell(80,30,'SELLO:  '.$sello,0,1,'L');

$pdf->Cell(90,-20,'PASO:  '.$paso,0,0,'L');
$pdf->Cell(90,-20,'RETENEDOR:  '.$retenedor,0,1,'L');

$pdf->Cell(90,30,'ESPIRAS:  '.$espiras,0,0,'L');
$pdf->Cell(80,30,'CALIBRE:  '.$calibre,0,1,'L');

$pdf->Cell(90,-20,'PESO BOBINA:  '.$peso_bobina,0,0,'L');
$pdf->Cell(90,-20,'PESO TOTAL:  '.$peso_total,0,1,'L');

$pdf->Cell(90,30,'NUMERO DE RANURAS:  '.$num_ranura,0,0,'L');
$pdf->Cell(80,30,'NUMERO DE BOBINAS:  '.$num_bobina,0,1,'L');

$pdf->Cell(90,-20,'NUMERO BOBINA GRUPO:  '.$num_bobina_grupo,0,0,'L');
$pdf->Cell(90,-20,'OBSERVACION:  '.$observacion,0,1,'L');

$pdf->Cell(90,30,'SUGERENCIA:  '.$sugerencia,0,0,'L');

$pdf->Output();

