<?php

class BobinadoPrimarioDao {
    
    public function GuardarBobinaPri(BobinadoPrimario $b){
        $conn = new conexion();
        $bob = -1;
        try {
            if($conn->conectar()){
                $str_sql = "Insert into bobinadoprimario(calibrealambre,espiracapa,tipo,aislamiento,refrigeracion,calibrefibra,"
                        . "bisel,largo,ancho,altura,n2,espiraltotal,tap,estado,idrepa) values("
                        ."'".$b->getCalibrealambre()."',"
                        ."'".$b->getEspiracapa()."',"
                        ."'".$b->getTipo()."',"
                        ."'".$b->getAislamiento()."',"
                        ."'".$b->getRefrigeracion()."',"
                        ."'".$b->getCalibrefibra()."',"
                        ."'".$b->getBisel()."',"
                        ."'".$b->getLargo()."',"
                        ."'".$b->getAncho()."',"
                        ."'".$b->getAltura()."',"
                        ."'".$b->getN2()."',"
                        ."'".$b->getEspirototal()."',"
                        ."'".$b->getTap()."',"
                        ."'".$b->getEstado()."',"
                        ."".$b->getIdrepa().");";
                $sql  = $conn->getConn()->prepare($str_sql);
                $bob = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $bob;
    }
    
    public function ActualizarBobinaPri(BobinadoPrimario $b){
        $conn = new conexion();
        $bob = -1;
        try {
            if($conn->conectar()){  
                $str_sql = "Update bobinadoprimario set "
                        ."calibrealambre = '".$b->getCalibrealambre()."',"
                        ."espiracapa = '".$b->getEspiracapa()."',"
                        ."tipo = '".$b->getTipo()."',"
                        ."aislamiento = '".$b->getAislamiento()."',"
                        ."refrigeracion = '".$b->getRefrigeracion()."',"
                        ."calibrefibra = '".$b->getCalibrefibra()."',"
                        ."bisel = '".$b->getBisel()."',"
                        ."largo = '".$b->getLargo()."',"
                        ."ancho = '".$b->getAncho()."',"
                        ."altura = '".$b->getAltura()."',"
                        ."n2 = '".$b->getN2()."',"
                        ."espiraltotal = '".$b->getEspirototal()."',"
                        ."tap = '".$b->getTap()."' "
                        ."where  id = ".$b->getId();
                $sql  = $conn->getConn()->prepare($str_sql);
                $bob = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $bob;
    }
    
    function Tablabobinadoprimario($id){
        $conn = new conexion();
        $mot = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT cliente.nom_cliente,cliente.fecha_ingre,transformador.nplaca_tran,reparacion_trans.id_repa,"
                        . "bobinadoprimario.calibrealambre, bobinadoprimario.espiracapa, bobinadoprimario.tipo,"
                        . "bobinadoprimario.id as idprimario,"
                        . "bobinadoprimario.estado,transformador.tipo_acc_tran, usuarios.nom_usu from reparacion_trans "
                        . "INNER JOIN bobinadoprimario on bobinadoprimario.idrepa = reparacion_trans.id_repa "
                        . "INNER JOIN transformador on transformador.id_tran = reparacion_trans.idtran_repa "
                        . "INNER JOIN cliente ON transformador.idclie_tran = cliente.id "
                        . "INNER JOIN usuarios ON usuarios.id_usu = transformador.idusu_tran "
                        . "WHERE reparacion_trans.id_repa = ".$id;
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $mot[] = array(
                        "Idrepa"        => $row['id_repa'],
                        "Idprimario"    => $row['idprimario'],
                        "NomCliente"    => $row['nom_cliente'],
                        "Fecha"         => $row['fecha_ingre'],
                        "Placa"         => $row['nplaca_tran'],
                        "CAlambre"      => $row['calibrealambre'],
                        "EspiraCapa"    => $row['espiracapa'],
                        "Tipo"          => $row['tipo'],
                        "Estado"        => $row['estado'],
                        "TAccion"       => $row['tipo_acc_tran'],
                        "Nom_Usu"       => $row['nom_usu']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $mot;
    }
    
    public function getbobinaprimario($id){
        $conn = new conexion();
        $pri = null;
        try {
            if($conn->conectar()){
                $sql_str = "Select bobinadoprimario.* from bobinadoprimario "
                        . "where id = ".$id;
                $sql = $conn->getConn()->prepare($sql_str);
                $sql->execute();
                $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
                $pri = $resultado;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $pri;
    }
    
}
