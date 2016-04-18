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
    $sql_str = "Select rebobinado_motor.v,rebobinado_motor.am,rebobinado_motor.balineras_ref, "
            . "rebobinado_motor.cap_marcha,rebobinado_motor.largo,rebobinado_motor.conexiones, "
            . "rebobinado_motor.cap_arranque,rebobinado_motor.sello_mecanico,rebobinado_motor.arr_paso, "
            . "rebobinado_motor.arr_espiras,rebobinado_motor.arr_peso_por_bobina,rebobinado_motor.mar_paso, "
            . "rebobinado_motor.mar_espira,rebobinado_motor.mar_calibre,rebobinado_motor.mar_peso_por_bobina, "
            . "rebobinado_motor.num_ranura,rebobinado_motor.observaciones,rebobinado_motor.sugerencias, "
            . "motorl.num_serie_motor,motorl.marca,motorl.hp,motorl.kw,motorl.rpm,motorl.n_fases,motorl.cotizado, "
            . "motorl.autorizado,motorl.accion,motorl.fe_termi,motorl.fe_acord,motorl.revicion,motorl.estado, "
            . "cliente.cedula,CONCAT(cliente.nom_cliente,' ',cliente.apellido) as cliente "
            . "from rebobinado_motor "
            . "INNER JOIN motorl on motorl.id_motores = rebobinado_motor.id_motor "
            . "INNER JOIN cliente ON cliente.id = motorl.id_cliente "
            . "where rebobinado_motor.id_motor = ".$val;
    $sql = $conn->getConn()->prepare($sql_str);
        $sql->execute();
        $resultado = $sql->fetchAll();
            foreach ($resultado as $row) {
                $v                      = $row['v'];
                $am                     = $row['am'];
                $balineras_ref          = $row['balineras_ref'];
                $cap_marcha             = $row['cap_marcha'];
                $conexiones             = $row['conexiones'];
                $cap_arranque           = $row['cap_arranque'];
                $sello_mecanico         = $row['sello_mecanico'];
                $arr_paso               = $row['arr_paso'];
                $arr_espiras            = $row['arr_espiras'];
                $arr_peso_por_bobina    = $row['arr_peso_por_bobina'];
                $mar_paso               = $row['mar_paso'];
                $mar_espira             = $row['mar_espira'];
                $mar_calibre            = $row['mar_calibre'];
                $mar_peso_por_bobina    = $row['mar_peso_por_bobina'];
                $num_ranura             = $row['num_ranura'];
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
$pdf->Cell(180,10,'DATOS DEL REBOBINADO DEL MOTOR',1,1,'C');

$pdf->SetFont($letra,'B',$tamaño);
$pdf->Cell(90,30,'V:  '.$v,0,0,'L');
$pdf->Cell(80,30,'AM:  '.$am,0,1,'L');

$pdf->Cell(90,-20,'BALINERA REFERENCIA:  '.$balineras_ref,0,0,'L');
$pdf->Cell(90,-20,'CAPACITADOR DE MARCHA:  '.$cap_marcha,0,1,'L');

$pdf->Cell(90,30,'CONEXION:  '.$conexiones,0,0,'L');
$pdf->Cell(80,30,'CAPACITADOR ARRANQUE:  '.$cap_arranque,0,1,'L');

$pdf->Cell(90,-20,'SELLO MECANICO:  '.$sello_mecanico,0,0,'L');
$pdf->Cell(90,-20,'ARRANQUE PASO:  '.$arr_paso,0,1,'L');

$pdf->Cell(90,30,'ARRANQUE ESPIRAS:  '.$arr_espiras,0,0,'L');
$pdf->Cell(80,30,'ARRANQUE PESO POR BOBINA:  '.$arr_peso_por_bobina,0,1,'L');

$pdf->Cell(90,-20,'MARCA DE PASO:  '.$mar_paso,0,0,'L');
$pdf->Cell(90,-20,'MARCA DE ESPIRA:  '.$mar_espira,0,1,'L');

$pdf->Cell(90,30,'MARCA DE CALIBRE:  '.$mar_calibre,0,0,'L');
$pdf->Cell(80,30,'MARCA PESO POR BOBINA:  '.$mar_peso_por_bobina,0,1,'L');

$pdf->Output();