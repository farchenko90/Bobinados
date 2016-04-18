<?php


class Reparacion_TransformadorDao {

    public function GuardarReparacion(Reparacion_Transformador $re,$tipo){
        $repa = -1;
        $conn = new conexion();
        try {
            if($conn->conectar()){
                $str_sql = "Insert into reparacion_trans(largo_repa,ancho_repa,altu_repa,refri_repa,bisel_repa,"
                        . "fibra_repa,cali_repa,otros_repa,nsecuencia,potencia,vprimario,vsengundario,tipo,estado,idtran_repa) values("
                        ."'".$re->getLargo_repa()."',"
                        ."'".$re->getAncho_repa()."',"
                        ."'".$re->getAltu_repa()."',"
                        ."'".$re->getRefri_repa()."',"
                        ."'".$re->getBisel_repa()."',"
                        ."'".$re->getFibra_repa()."',"
                        ."'".$re->getCali_repa()."',"
                        ."'".$re->getOtros_repa()."',"
                        ."'".$re->getNsecuencia()."',"
                        ."'".$re->getPotencia()."',"
                        ."'".$re->getVprimario()."',"
                        ."'".$re->getVsegundario()."',"
                        ."'".$re->getTipo()."',"
                        ."'".$re->getEstado()."',"
                        ."".$re->getIdtran_repa().");";
                $sql  = $conn->getConn()->prepare($str_sql);
                $repa = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $repa;
    }
    
    public function ActualizarReparacionprimaria(Reparacion_Transformador $re){
        $repa = -1;
        $conn = new conexion();
        try {
            if($conn->conectar()){
                $str_sql = "Update reparacion_trans set "
                        ."largo_repa = '".$re->getLargo_repa()."',"
                        ."ancho_repa = '".$re->getAncho_repa()."',"
                        ."altu_repa = '".$re->getAltu_repa()."',"
                        ."refri_repa = '".$re->getRefri_repa()."',"
                        ."bisel_repa = '".$re->getBisel_repa()."',"
                        ."fibra_repa = '".$re->getFibra_repa()."',"
                        ."cali_repa  = '".$re->getCali_repa()."',"
                        ."otros_repa = '".$re->getOtros_repa()."',"
                        ."nsecuencia = '".$re->getNsecuencia()."',"
                        ."potencia =  '".$re->getPotencia()."',"
                        ."vprimario = '".$re->getVprimario()."',"
                        ."vsengundario = '".$re->getVsegundario()."' "
                        ."where id_repa = ".$re->getId_repa();
                $sql  = $conn->getConn()->prepare($str_sql);
                $repa = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $repa;
    }
    
    public function modificareparacion(Reparacion_Transformador $re){
        $repa = -1;
        $conn = new conexion();
        try {
            if($conn->conectar()){
                $str_sql = "Update reparacion_trans set estado = '".$re->getEstado()."' where id_repa = ".$re->getId_repa();
                $sql  = $conn->getConn()->prepare($str_sql);
                $repa = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $repa;
    }
    
    public function GuardarReparacion2(Reparacion_Transformador $re,$tipo){
        $repa = -1;
        $conn = new conexion();
        try {
            if($conn->conectar()){
                $str_sql = "Insert into reparacion_trans(largo_repa,ancho_repa,refri_repa,tipo_conductor,bisel_repa,"
                        . "n2,fibra_repa,bobinas,otros_repa,nsecuencia,potencia,vprimario,vsengundario,tipo,estado,idtran_repa) values("
                        ."'".$re->getLargo_repa()."',"
                        ."'".$re->getAncho_repa()."',"
                        ."'".$re->getRefri_repa()."',"
                        ."'".$re->getTipo_conductor()."',"
                        ."'".$re->getBisel_repa()."',"
                        ."'".$re->getN2()."',"
                        ."'".$re->getFibra_repa()."',"
                        ."'".$re->getBobinas()."',"
                        ."'".$re->getOtros_repa()."',"
                        ."'".$re->getNsecuencia()."',"
                        ."'".$re->getPotencia()."',"
                        ."'".$re->getVprimario()."',"
                        ."'".$re->getVsegundario()."',"
                        ."'".$re->getTipo()."',"
                        ."'".$re->getEstado()."',"
                        ."".$re->getIdtran_repa().");";
                $sql  = $conn->getConn()->prepare($str_sql);
                $repa = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $repa;
    }
    
    public function ActualizarReparacionsecundaria(Reparacion_Transformador $re){
        $repa = -1;
        $conn = new conexion();
        try {
            if($conn->conectar()){
                $str_sql = "Update reparacion_trans set "
                        ."largo_repa = '".$re->getLargo_repa()."',"
                        ."ancho_repa = '".$re->getAncho_repa()."',"
                        ."refri_repa = '".$re->getRefri_repa()."',"
                        ."tipo_conductor = '".$re->getTipo_conductor()."',"
                        ."bisel_repa = '".$re->getBisel_repa()."',"
                        ."n2 = '".$re->getN2()."',"
                        ."fibra_repa = '".$re->getFibra_repa()."',"
                        ."bobinas = '".$re->getBobinas()."',"
                        ."otros_repa = '".$re->getOtros_repa()."',"
                        ."nsecuencia = '".$re->getNsecuencia()."',"
                        ."potencia =  '".$re->getPotencia()."',"
                        ."vprimario = '".$re->getVprimario()."',"
                        ."vsengundario = '".$re->getVsegundario()."' "
                        ."where id_repa = ".$re->getId_repa();
                $sql  = $conn->getConn()->prepare($str_sql);
                $repa = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $repa;
    }
    
    function TablaRepacion($id){
        $conn = new conexion();
        $rep = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT cliente.nom_cliente,cliente.fecha_ingre,reparacion_trans.tipo,transformador.nplaca_tran,"
                        . "reparacion_trans.vsengundario,reparacion_trans.vprimario,reparacion_trans.estado,transformador.id_tran,"
                        . "reparacion_trans.id_repa,transformador.tipo_acc_tran,usuarios.nom_usu,usuarios.id_tp_usu from transformador "
                        . "INNER JOIN cliente on "
                        . "cliente.id = transformador.idclie_tran INNER JOIN reparacion_trans on "
                        . "reparacion_trans.idtran_repa = transformador.id_tran INNER JOIN usuarios on "
                        . "usuarios.id_usu = transformador.idusu_tran WHERE transformador.id_tran = ".$id." ORDER BY reparacion_trans.tipo DESC";
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $rep[] = array(
                        "Id_tran"       => $row['id_tran'],
                        "Id"            => $row['id_repa'],
                        "Nom_cliente"   => $row['nom_cliente'],
                        "Fecha"         => $row['fecha_ingre'],
                        "Nplaca"        => $row['nplaca_tran'],
                        "TipoPS"        => $row['tipo'],
                        "primario"      => $row['vprimario'],
                        "segundario"    => $row['vsengundario'],
                        "Estado"        => $row['estado'],
                        "Tipo"          => $row['tipo_acc_tran'],
                        "Nom_usu"       => $row['nom_usu'],
                        "Id_usu"        => $row['id_tp_usu']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $rep;
    }
    
    public function tiporeparacion($id){
        $conn = new conexion();
        $rep = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT reparacion_trans.tipo from reparacion_trans WHERE reparacion_trans.id_repa = ".$id;
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $rep[] = array(
                        "Tipo" => $row['tipo'] 
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $rep;
    }
       
    function reparacionterminado($id1,$id2){
        $conn = new conexion();
        $rep = null;
        try {
            if($conn->conectar()){
                $str_sql = "(SELECT reparacion_trans.estado from reparacion_trans INNER JOIN bobinadoprimario on "
                        . "bobinadoprimario.idrepa = reparacion_trans.id_repa WHERE reparacion_trans.estado='Terminado' "
                        . "AND bobinadoprimario.idrepa = ".$id1.") "
                        . "UNION (SELECT reparacion_trans.estado from "
                        . "reparacion_trans INNER JOIN bobinadosecundario on "
                        . "bobinadosecundario.idrepa = reparacion_trans.id_repa "
                        . "WHERE reparacion_trans.estado='Terminado' AND bobinadosecundario.idrepa = ".$id2.")";
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $rep[] = array(
                        "Estado"         => $row['estado']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $rep;
    }
        
    public function Datosreparacion($id){
        $conn = new conexion();
        $rep = null;
        try {
            if($conn->conectar()){
                $str_sql = "Select reparacion_trans.* from reparacion_trans "
                        . "where id_repa = ".$id;
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
                $rep = $resultado;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $rep;
    }
    
    public function estadoTerminado($idtrans){
        $conn = new conexion();
        $rep = null;$est = null;$est1 = null;
        try {
            if($conn->conectar()){
                $str_sql = "Select reparacion_trans.id_repa from reparacion_trans where "
                        . "reparacion_trans.idtran_repa = $idtrans ";
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                
                for($i=0;$i<count($resultado);$i++){
                    
                    $cons = "select bobinadoprimario.estado from bobinadoprimario "
                            . "where bobinadoprimario.idrepa = ".$resultado[0][0]." and "
                            . "bobinadoprimario.estado = 'Terminado'";
                    $sql1 = $conn->getConn()->prepare($cons);
                    $sql1->execute();
                    $resultado1 = $sql1->fetchAll();
                    $est = $resultado1;
                    $rep['estado1'] = $est;
                            
                    $cons1 = "select bobinadosecundario.estado as est from bobinadosecundario "
                            . "where bobinadosecundario.idrepa = ".$resultado[1][0]." "
                            . "and bobinadosecundario.estado = 'Terminado'";
                    $sql2 = $conn->getConn()->prepare($cons1);
                    $sql2->execute();
                    $resultado2 = $sql2->fetchAll();
                    $est1 = $resultado2;
                    
                    $rep['estado2'] = $est1;
                    
                }
                
                
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $rep;
    }
    
    public function primarios(){
        
        $conn = new conexion();
        $rep = null;
        try {
            if($conn->conectar()){
                $str_sql = "Select reparacion_trans.* from reparacion_trans "
                        . "where tipo = 'Primaria'";
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
                $rep = $resultado;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $rep;
        
    }
    
}
