<?php

class MantenimientoMotorDao {
    
    /*
     * Registrar mantenimientos de motores
     */
    public function RegistrarMantenimiento(MantenimientoMotor $m){
        $man = -1;
        $conn = new conexion();
        try {
            if($conn->conectar()){
                $str_sql = "Insert into mantenimiento_motor(id_motor,id_usuario,amp,voltios,balineras,sello_mecanico,"
                        . "cap_arranque,cap_marcha,otros,p_finales,observaciones) values("
                        ."" .$m->getId_motor().","
                        ."" .$m->getId_usuario().","
                        ."'".$m->getAmp()."',"
                        ."'".$m->getVoltios()."',"
                        ."'".$m->getBalineras()."',"
                        ."'".$m->getSello_mecanico()."',"
                        ."'".$m->getCap_arranque()."',"
                        ."'".$m->getCap_marcha()."',"
                        ."'".$m->getOtros()."',"
                        ."'".$m->getP_finales()."',"
                        ."'".$m->getObservaciones()."')";
                $sql  = $conn->getConn()->prepare($str_sql);
                $man = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $man;
    }
    
     /*
     * actualizar mantenimientos de motores
     */
    public function ActualizarMantenimiento(MantenimientoMotor $m){
        $man = -1;
        $conn = new conexion();
        try {
            if($conn->conectar()){
                $str_sql = "Update mantenimiento_motor set "
                        ."amp = '".$m->getAmp()."',"
                        ."voltios = '".$m->getVoltios()."',"
                        ."balineras = '".$m->getBalineras()."',"
                        ."sello_mecanico = '".$m->getSello_mecanico()."',"
                        ."cap_arranque = '".$m->getCap_arranque()."',"
                        ."cap_marcha = '".$m->getCap_marcha()."',"
                        ."otros = '".$m->getOtros()."',"
                        ."p_finales = '".$m->getP_finales()."',"
                        ."observaciones = '".$m->getObservaciones()."' "
                        ."where id_motor = ".$m->getId_motor();
                $sql  = $conn->getConn()->prepare($str_sql);
                $man = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $man;
    }
    
    public function VerEstadoMantenimiento($num){
        $man = null;
        $conn = new conexion();
        try {
            if($conn->conectar()){
                $str_sql = "SELECT mantenimiento_motor.amp,mantenimiento_motor.voltios,mantenimiento_motor.balineras,"
                        . "mantenimiento_motor.sello_mecanico,"
                        . "mantenimiento_motor.cap_arranque,mantenimiento_motor.cap_marcha,motorl.estado,"
                        . "mantenimiento_motor.otros,mantenimiento_motor.p_finales,mantenimiento_motor.observaciones "
                        . "from mantenimiento_motor INNER JOIN motorl on "
                        . "motorl.id_motores = mantenimiento_motor.id_motor and motorl.estado = 'Terminado' "
                        . "and mantenimiento_motor.id_motor = ".$num."";
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $man[] = array(
                        "Amp"            => $row['amp'],
                        "Voltios"        => $row['voltios'],
                        "Balineras"      => $row['balineras'],
                        "Sello"          => $row['sello_mecanico'],
                        "Arranque"       => $row['cap_arranque'],
                        "Marcha"         => $row['cap_marcha'],
                        "Estado"         => $row['estado'],
                        "Otros"          => $row['otros'],
                        "Pruebas"        => $row['p_finales'],
                        "Observa"        => $row['observaciones']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $man;
    }
    
}
