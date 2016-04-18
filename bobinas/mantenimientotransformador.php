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
    $sql_str = "SELECT transformador.marca_tran,transformador.nplaca_tran,transformador.kva_tran,transformador.tp_tran,
        transformador.ts_tran,transformador.tipo_acc_tran,transformador.fe_acor_tran,transformador.fe_ter_tran,
        transformador.estado,cliente.cedula,CONCAT(cliente.nom_cliente,' ',cliente.apellido) as cliente,
        
        lista_veri_trans.lista_lista,lista_veri_trans.observacion_lista,pruebas_ini_tran.ff,pruebas_ini_tran.ff1,
        
        pruebas_ini_tran.ff2,pruebas_ini_tran.fn,pruebas_ini_tran.fn1,pruebas_ini_tran.x,
        pruebas_ini_tran.y,pruebas_ini_tran.z,pruebas_ini_tran.megueo,
        pruebas_ini_tran.ff3,pruebas_ini_tran.ff4,pruebas_ini_tran.ff5,pruebas_ini_tran.x1,pruebas_ini_tran.y1,
        pruebas_ini_tran.z1,
        
        estado_transformador.tension_aplicada,estado_transformador.encube,
        estado_transformador.tension_aplicada2,estado_transformador.amperaje,
        estado_transformador.voltaje_de_salida,estado_transformador.pintura,estado_transformador.observaciones,
        
        estado_transformador.ff11,estado_transformador.ff12,estado_transformador.ff13,estado_transformador.ff14,
        estado_transformador.ff15,estado_transformador.ff21,estado_transformador.ff22,estado_transformador.ff23,
        estado_transformador.ff24,estado_transformador.ff25,estado_transformador.ff31,estado_transformador.ff32,
        estado_transformador.ff33,estado_transformador.ff34,estado_transformador.ff35,estado_transformador.fn1,
        estado_transformador.fn2,estado_transformador.fn3,estado_transformador.fn4,estado_transformador.fn5,
        estado_transformador.corto_circuito_x,estado_transformador.corto_circuito_y,
        estado_transformador.corto_circuito_z,estado_transformador.corto_circuito_n,
        estado_transformador.seco_30_ab,estado_transformador.seco_30_at,estado_transformador.seco_60_at,
        estado_transformador.seco_60_bt,estado_transformador.aceite_30_ab,estado_transformador.aceite_30_at,
        estado_transformador.aceite_30_bt,
        
        estado_aceite_trans.pasada_arena,estado_aceite_trans.observaciones as obser,estado_aceite_trans.escala_chispometro,
        estado_aceite_trans.temperatura_max, 
        
        estado_aceite_trans.tiempo_filtro,estado_aceite_trans.color,estado_aceite_trans.tiempo_reposo_ini,
        estado_aceite_trans.kv1,estado_aceite_trans.kv2,estado_aceite_trans.kv3,estado_aceite_trans.kv4,
        estado_aceite_trans.kv5,estado_aceite_trans.kv6,estado_aceite_trans.kv_total,
        estado_aceite_trans.tiempo_reposo1,estado_aceite_trans.tiempo_reposo2,estado_aceite_trans.tiempo_reposo3,
        estado_aceite_trans.tiempo_reposo4,estado_aceite_trans.tiempo_reposo5,estado_aceite_trans.tiempo_reposo6,
        estado_aceite_trans.tiempo_reposo_total,estado_aceite_trans.aceite_trans 
        
        from transformador    
        
        INNER JOIN cliente on cliente.id = transformador.idclie_tran
        INNER JOIN lista_veri_trans on lista_veri_trans.id_tra_lista = transformador.id_tran
        INNER JOIN pruebas_ini_tran on pruebas_ini_tran.id_trans = transformador.id_tran
        INNER JOIN estado_transformador on estado_transformador.id_trans = transformador.id_tran
        INNER JOIN estado_aceite_trans on estado_aceite_trans.id_trans = transformador.id_tran
        WHERE transformador.id_tran = ".$val;
    
        $sql = $conn->getConn()->prepare($sql_str);
        $sql->execute();
        $resultado = $sql->fetchAll();
            foreach ($resultado as $row) {
                //transformador
                $marca_tran             = $row['marca_tran'];
                $nplaca_tran            = $row['nplaca_tran'];
                $kva_tran               = $row['kva_tran'];
                $tp_tran                = $row['tp_tran'];
                $ts_tran                = $row['ts_tran'];
                $tipo_acc_tran          = $row['tipo_acc_tran'];
                $fe_acor_tran           = $row['fe_acor_tran'];
                $fe_ter_tran            = $row['fe_ter_tran'];
                $cedula                 = $row['cedula'];
                $cliente                = $row['cliente'];
                $lista_lista            = $row['lista_lista'];
                $observacion_lista      = $row['observacion_lista'];
                $ff                     = $row['ff'];
                $ff1                    = $row['ff1'];
                $ff3                    = $row['ff3'];
                $ff4                    = $row['ff4'];
                $ff5                    = $row['ff5'];
                $x1                     = $row['x1'];
                $y1                     = $row['y1'];
                $z1                     = $row['z1'];
                $tension_aplicada       = $row['tension_aplicada'];
                $tension_aplicada2      = $row['tension_aplicada2'];
                $amperaje               = $row['amperaje'];
                $encube                 = $row['encube'];
                $voltaje_de_salida      = $row['voltaje_de_salida'];
                $pintura                = $row['pintura'];
                $observaciones          = $row['observaciones'];
                $pasada_arena           = $row['pasada_arena'];
                $obser                  = $row['obser'];
                $escala_chispometro     = $row['escala_chispometro'];
                $temperatura_max        = $row['temperatura_max'];
                $ff2                    = $row['ff2'];
                $fn                     = $row['fn'];
                $fn1                    = $row['fn1'];
                $x                      = $row['x'];
                $y                      = $row['y'];
                $z                      = $row['z'];
                $megueo                 = $row['megueo'];
                
                $ff11                   = $row['ff11'];
                $ff12                   = $row['ff12'];
                $ff13                   = $row['ff13'];
                $ff14                   = $row['ff14'];
                $ff15                   = $row['ff15'];
                $ff21                   = $row['ff21'];
                $ff22                   = $row['ff22'];
                $ff23                   = $row['ff23'];
                $ff24                   = $row['ff24'];
                $ff25                   = $row['ff25'];
                $ff31                   = $row['ff31'];
                $ff32                   = $row['ff32'];
                $ff33                   = $row['ff33'];
                $ff34                   = $row['ff34'];
                $ff35                   = $row['ff35'];
                $fn2                   = $row['fn2'];
                $fn3                   = $row['fn3'];
                $fn4                   = $row['fn4'];
                $fn5                   = $row['fn5'];
                $corto_circuito_x                   = $row['corto_circuito_x'];
                $corto_circuito_y                   = $row['corto_circuito_y'];
                $corto_circuito_z                   = $row['corto_circuito_z'];
                $corto_circuito_n                   = $row['corto_circuito_n'];
                $seco_30_ab                   = $row['seco_30_ab'];
                $seco_30_at                   = $row['seco_30_at'];
                $seco_60_at                   = $row['seco_60_at'];
                $seco_60_bt                   = $row['seco_60_bt'];
                $aceite_30_ab                   = $row['aceite_30_ab'];
                $aceite_30_at                   = $row['aceite_30_at'];
                $aceite_30_bt                   = $row['aceite_30_bt'];
                
                $tiempo_filtro                   = $row['tiempo_filtro'];
                $color                   = $row['color'];
                $tiempo_reposo_ini                   = $row['tiempo_reposo_ini'];
                $kv1                   = $row['kv1'];
                $kv2                   = $row['kv2'];
                $kv3                   = $row['kv3'];
                $kv4                   = $row['kv4'];
                $kv5                   = $row['kv5'];
                $kv6                   = $row['kv6'];
                $kv_total                   = $row['kv_total'];
                $tiempo_reposo1                   = $row['tiempo_reposo1'];
                $tiempo_reposo2                   = $row['tiempo_reposo2'];
                $tiempo_reposo3                   = $row['tiempo_reposo3'];
                $tiempo_reposo4                   = $row['tiempo_reposo4'];
                $tiempo_reposo6                   = $row['tiempo_reposo6'];
                $tiempo_reposo_total                   = $row['tiempo_reposo_total'];
                $aceite_trans                   = $row['aceite_trans'];
                
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
$pdf->Cell(180,120,'DATOS DEL TRANSFORMADOR',0,1,'C');

$pdf->SetFont($letra,'B',$tamaño);
$pdf->Cell(90,-90,'MARCA DEL TRANSFORMADOR:  '.$marca_tran,0,0,'L');
$pdf->Cell(90,-90,'PLACA DEL TRANSFORMADOR:  '.$nplaca_tran,0,1,'L');

$pdf->Cell(90,100,'KVA:  '.$kva_tran,0,0,'L');
$pdf->Cell(90,100,'TP:  '.$tp_tran,0,1,'L');

$pdf->Cell(90,-90,'TS:  '.$ts_tran,0,0,'L');
$pdf->Cell(90,-90,'ACCION:  '.$tipo_acc_tran,0,1,'L');

$pdf->Cell(90,100,'FECHA ACORDADA DE ENTREGA:  '.$fe_acor_tran,0,0,'L');
$pdf->Cell(90,100,'FECHA DE TERMINACION:  '.$fe_ter_tran,0,1,'L');

$pdf->Ln();
        
$pdf->SetFont($letra,'B',12);
$pdf->Cell(180,10,'LISTA DE VERIFICACION',1,1,'C');

$pdf->SetFont($letra,'B',$tamaño);
$pdf->Cell(90,20,'LISTA DE VERIFICACION:  '.$lista_lista,0,0,'L');
$pdf->Cell(90,20,'ACCION:  '.$observacion_lista,0,1,'L');

$pdf->Cell(90,-10,'FF:  '.$ff,0,0,'L');
$pdf->Cell(90,-10,'FF:  '.$ff1,0,1,'L');

$pdf->Cell(90,20,'FF:  '.$ff3,0,0,'L');
$pdf->Cell(90,20,'FF:  '.$ff4,0,1,'L');

$pdf->Cell(90,-10,'FF:  '.$ff5,0,0,'L');
$pdf->Cell(90,-10,'FF:  '.$ff2,0,1,'L');

$pdf->Cell(90,20,'FF:  '.$fn,0,0,'L');
$pdf->Cell(90,20,'FF:  '.$fn1,0,1,'L');

$pdf->Cell(90,-10,'X:  '.$x,0,0,'L');
$pdf->Cell(90,-10,'Y:  '.$y,0,1,'L');

$pdf->Cell(90,20,'Z:  '.$x,0,0,'L');
$pdf->Cell(90,20,'MEGUEO:  '.$megueo,0,1,'L');

$pdf->Cell(90,-10,'X1:  '.$x1,0,0,'L');
$pdf->Cell(90,-10,'Y1:  '.$y1,0,1,'L');

$pdf->Cell(90,20,'Z1:  '.$z1,0,1,'L');

$pdf->Ln(190);

$pdf->SetFont($letra,'B',12);
$pdf->Cell(180,10,'ESTADO DEL TRANSFORMADOR',1,1,'C');

$pdf->SetFont($letra,'B',$tamaño);

$pdf->Cell(90,30,'FF:  '.$ff11,0,0,'L');
$pdf->Cell(90,30,'FF:  '.$ff12,0,1,'L');

$pdf->Cell(90,-20,'FF:  '.$ff13,0,0,'L');
$pdf->Cell(90,-20,'FF:  '.$ff14,0,1,'L');

$pdf->Cell(90,30,'FF:  '.$ff15,0,0,'L');
$pdf->Cell(90,30,'FF:  '.$ff21,0,1,'L');

$pdf->Cell(90,-20,'FF:  '.$ff22,0,0,'L');
$pdf->Cell(90,-20,'FF:  '.$ff23,0,1,'L');

$pdf->Cell(90,30,'FF:  '.$ff24,0,0,'L');
$pdf->Cell(90,30,'FF:  '.$ff25,0,1,'L');

$pdf->Cell(90,-20,'FF:  '.$ff31,0,0,'L');
$pdf->Cell(90,-20,'FF:  '.$ff32,0,1,'L');

$pdf->Cell(90,30,'FF:  '.$ff33,0,0,'L');
$pdf->Cell(90,30,'FF:  '.$ff34,0,1,'L');

$pdf->Cell(90,-20,'FF:  '.$ff35,0,0,'L');
$pdf->Cell(90,-20,'FN:  '.$fn2,0,1,'L');

$pdf->Cell(90,30,'FN:  '.$fn3,0,0,'L');
$pdf->Cell(90,30,'FN:  '.$fn4,0,1,'L');

$pdf->Cell(90,-20,'FN:  '.$fn5,0,0,'L');
$pdf->Cell(90,-20,'CORTO CIRCUITO X:  '.$corto_circuito_x,0,1,'L');

$pdf->Cell(90,30,'CORTO CIRCUITO Y:  '.$corto_circuito_y,0,0,'L');
$pdf->Cell(90,30,'CORTO CIRCUITO Z:  '.$corto_circuito_z,0,1,'L');

$pdf->Cell(90,-20,'CORTO CIRCUITO N:  '.$corto_circuito_n,0,0,'L');
$pdf->Cell(90,-20,'SECO 30 AB:  '.$seco_30_ab,0,1,'L');

$pdf->Cell(90,30,'SECO 30 AT:  '.$seco_30_at,0,0,'L');
$pdf->Cell(90,30,'SECO 60 AT:  '.$seco_60_at,0,1,'L');

$pdf->Cell(90,-20,'SECO 60 BT:  '.$seco_60_bt,0,0,'L');
$pdf->Cell(90,-20,'ACEITE 30 AB:  '.$aceite_30_ab,0,1,'L');

$pdf->Cell(90,30,'ACEITE 30 AT:  '.$aceite_30_at,0,0,'L');
$pdf->Cell(90,30,'ACEITE 30 BT:  '.$aceite_30_bt,0,1,'L');

$pdf->Cell(90,-20,'TENSION APLICADA:  '.$tension_aplicada,0,0,'L');
$pdf->Cell(90,-20,'TENSION APLICADA:  '.$tension_aplicada2,0,1,'L');

$pdf->Cell(90,30,'AMPERAJE:  '.$amperaje,0,0,'L');
$pdf->Cell(90,30,'ENCUBE:  '.$encube,0,1,'L');

$pdf->Cell(90,-20,'VOLTAJE:  '.$voltaje_de_salida,0,0,'L');
$pdf->Cell(90,-20,'PINTURA:  '.$pintura,0,1,'L');

$pdf->Cell(90,30,'OBSERVACION:  '.$observaciones,0,1,'L');

$pdf->Ln(190);

$pdf->SetFont($letra,'B',12);
$pdf->Cell(180,10,'ESTADO DEL ACEITE TRANSFORMADOR',1,1,'C');

$pdf->SetFont($letra,'B',$tamaño);

$pdf->Cell(90,30,'TIEMPO FILTRO:  '.$tiempo_filtro,0,0,'L');
$pdf->Cell(90,30,'COLOR:  '.$color,0,1,'L');

$pdf->Cell(90,-20,'TIEMPO REPOSO INICIAL:  '.$tiempo_reposo_ini,0,0,'L');
$pdf->Cell(90,-20,'KV1:  '.$kv1,0,1,'L');

$pdf->Cell(90,30,'KV2:  '.$kv2,0,0,'L');
$pdf->Cell(90,30,'KV3:  '.$kv3,0,1,'L');

$pdf->Cell(90,-20,'KV4:  '.$kv4,0,0,'L');
$pdf->Cell(90,-20,'KV5:  '.$kv5,0,1,'L');

$pdf->Cell(90,30,'KV6:  '.$kv6,0,0,'L');
$pdf->Cell(90,30,'KV TOTAL:  '.$kv_total,0,1,'L');

$pdf->Cell(90,-20,'TIEMPO REPOSO 1:  '.$tiempo_reposo1,0,0,'L');
$pdf->Cell(90,-20,'TIEMPO REPOSO 2:  '.$tiempo_reposo2,0,1,'L');

$pdf->Cell(90,30,'TIEMPO REPOSO 3:  '.$tiempo_reposo4,0,0,'L');
$pdf->Cell(90,30,'TIEMPO REPOSO 4:  '.$tiempo_reposo6,0,1,'L');

$pdf->Cell(90,-20,'TIEMPO REPOSO TOTAL:  '.$tiempo_reposo_total,0,0,'L');
$pdf->Cell(90,-20,'ACEITE TRANSFORMADOR:  '.$aceite_trans,0,1,'L');

$pdf->Cell(90,30,'PASADO POR ARENAS:  '.$pasada_arena,0,0,'L');
$pdf->Cell(90,30,'SEGUNDA OBSERVACION:  '.$obser,0,1,'L');

$pdf->Cell(90,-20,'ESCALA DE CHISPOMETRO:  '.$escala_chispometro,0,0,'L');
$pdf->Cell(90,-20,'TEMPERATURA MAXIMA:  '.$temperatura_max,0,1,'L');

$pdf->Output();
