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
            . "WHERE mantenimiento_motor.id_motor = 6";
    
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


$pdf->Output();

