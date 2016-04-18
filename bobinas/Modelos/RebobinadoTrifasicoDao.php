<?php


class RebobinadoTrifasicoDao {
    
    /*
     * Registramos al cliente de la accion de guardar motores
     * 
     */
    public function RegistrarRebobinado(RebobinadoTrifasico $c){
        $conn = new conexion();
        $cli = -1;
        try {
            if($conn->conectar()){
                $str_sql = "Insert into bobinados.rebobinado_trifasico(largo,sello,paso,retenedor,espiras,balinera,"
                        . "calibre,peso_bobina,peso_total,fibra,num_ranura,num_bobina,num_bobina_grupo,observacion,"
                        . "sugerencia,id_motor,id_usuario) "
                        . "values("
                        ."'".$c->getLargo()."',"
                        ."'".$c->getSello()."',"
                        ."'".$c->getPaso()."',"
                        ."'".$c->getRetenedor()."',"
                        ."'".$c->getEspira()."',"
                        ."'".$c->getBalinera()."',"
                        ."'".$c->getCalibre()."',"
                        ."'".$c->getPeso_bobina()."',"
                        ."'".$c->getPeso_total()."',"
                        ."'".$c->getFibra()."',"
                        ."'".$c->getNum_ranura()."',"
                        ."'".$c->getNum_bobina()."',"
                        ."'".$c->getNum_bobina_grupo()."',"
                        ."'".$c->getObservacion()."',"
                        ."'".$c->getSugerencia()."',"
                        ."".$c->getId_motor().","
                        ."".$c->getId_usuario().");";
                $sql  = $conn->getConn()->prepare($str_sql);
                $cli = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $cli;
    }

    public function ActualizarRebobinado(RebobinadoTrifasico $rebo){
        $conn = new conexion();
        $re = -1;
        try {
            if($conn->conectar()){
                $str_sql = "Update rebobinado_trifasico set "
                        ."largo = '".$rebo->getLargo()."',"
                        ."sello = '".$rebo->getSello()."',"
                        ."paso ='".$rebo->getPaso()."',"
                        ."retenedor ='".$rebo->getRetenedor()."',"
                        ."espiras ='".$rebo->getEspira()."',"
                        ."balinera =".$rebo->getBalinera().","
                        ."calibre ='".$rebo->getCalibre()."',"
                        ."peso_bobina ='".$rebo->getPeso_bobina()."',"
                        ."peso_total ='".$rebo->getPeso_total()."',"
                        ."fibra ='".$rebo->getFibra()."',"
                        ."num_ranura ='".$rebo->getNum_ranura()."',"
                        ."num_bobina ='".$rebo->getNum_bobina()."',"
                        ."num_bobina_grupo ='".$rebo->getNum_bobina_grupo()."',"
                        ."observacion ='".$rebo->getObservacion()."',"
                        ."sugerencia ='".$rebo->getSugerencia()."' "
                        ."where id_motor = ".$rebo->getId_motor();
                $sql  = $conn->getConn()->prepare($str_sql);
                $re = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $re;
    }
    
    public function getAll($id){
        $conn = new conexion();
        $reb = null;
        try {
            if($conn->conectar()){
                $str_sql = "select * from rebobinado_trifasico where id_motor = ".$id;
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $reb = array(
                        "largo"             => $row['largo'],
                        "sello"             => $row['sello'],
                        "paso"              => $row['paso'],
                        "retenedor"         => $row['retenedor'],
                        "espiras"           => $row['espiras'],
                        "balinera"          => $row['balinera'],
                        "calibre"           => $row['calibre'],
                        "peso_bobina"       => $row['peso_bobina'],
                        "peso_total"        => $row['peso_total'],
                        "fibra"             => $row['fibra'],
                        "num_ranura"        => $row['num_ranura'],
                        "num_bobina"        => $row['num_bobina'],
                        "num_bobina_grupo"  => $row['num_bobina'],
                        "observacion"       => $row['observacion'],
                        "sugerencia"        => $row['sugerencia']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $reb;
    }

    
    
}