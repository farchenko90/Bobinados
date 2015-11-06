<?php

class BobinadoSegundarioDao {

    public function GuardarSecundario(BobinadoSegundario $bo){
        $conn = new conexion();
        $sec = -1;
        try {
            if($conn->conectar()){
                $str_sql = "Insert into bobinadosecundario(tipoconductor,medidasconductor,capas,espiracapas,bobina,n2,"
                        . "aislamientocapa,refrigeracion,calibrefibra,bisel,observacion,estado,idrepa) values("
                        ."'".$bo->getTipoconductor()."',"
                        ."'".$bo->getMedidasconductor()."',"
                        ."'".$bo->getCapas()."',"
                        ."'".$bo->getEspiracapas()."',"
                        ."'".$bo->getBobinas()."',"
                        ."'".$bo->getN2()."',"
                        ."'".$bo->getAislamientocapa()."',"
                        ."'".$bo->getRefrigeracion()."',"
                        ."'".$bo->getCalibrefibra()."',"
                        ."'".$bo->getBisel()."',"
                        ."'".$bo->getObservacion()."',"
                        ."'".$bo->getEstado()."',"
                        ."".$bo->getIdrepa().");";
                $sql  = $conn->getConn()->prepare($str_sql);
                $sec = $sql->execute(); 
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $sec;
    }
    
    public function ActualizarSecundario(BobinadoSegundario $bo){
        $conn = new conexion();
        $sec = -1;
        try {
            if($conn->conectar()){
                $str_sql = "Update bobinadosecundario set "
                        ."bobinadosecundario.tipoconductor = '".$bo->getTipoconductor()."',"
                        ."bobinadosecundario.medidasconductor = '".$bo->getMedidasconductor()."',"
                        ."bobinadosecundario.capas = '".$bo->getCapas()."',"
                        ."bobinadosecundario.espiracapas = '".$bo->getEspiracapas()."',"
                        ."bobinadosecundario.bobina = '".$bo->getBobinas()."',"
                        ."bobinadosecundario.n2 = '".$bo->getN2()."',"
                        ."bobinadosecundario.aislamientocapa = '".$bo->getAislamientocapa()."',"
                        ."bobinadosecundario.refrigeracion = '".$bo->getRefrigeracion()."',"
                        ."bobinadosecundario.calibrefibra = '".$bo->getCalibrefibra()."',"
                        ."bobinadosecundario.bisel = '".$bo->getBisel()."',"
                        ."bobinadosecundario.observacion = '".$bo->getObservacion()."' "
                        ."where bobinadosecundario.id = ".$bo->getId();
                $sql  = $conn->getConn()->prepare($str_sql);
                $sec = $sql->execute(); 
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $sec;
    }
    
    function Tablabobinadosecundario($id){
        $conn = new conexion();
        $mot = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT cliente.nom_cliente,cliente.fecha_ingre,transformador.nplaca_tran,bobinadosecundario.capas,"
                        . "bobinadosecundario.tipoconductor,bobinadosecundario.medidasconductor,bobinadosecundario.estado,"
                        . "bobinadosecundario.id as idsegundario,"
                        . "transformador.tipo_acc_tran, usuarios.nom_usu from reparacion_trans "
                        . "INNER JOIN bobinadosecundario on bobinadosecundario.idrepa = reparacion_trans.id_repa "
                        . "INNER JOIN transformador on transformador.id_tran = reparacion_trans.idtran_repa "
                        . "INNER JOIN cliente ON transformador.idclie_tran = cliente.id "
                        . "INNER JOIN usuarios ON usuarios.id_usu = transformador.idusu_tran "
                        . "WHERE reparacion_trans.id_repa = ".$id;
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $mot[] = array(
                        "NomCliente"    => $row['nom_cliente'],
                        "Idsegundario"  => $row['idsegundario'],
                        "Fecha"         => $row['fecha_ingre'],
                        "Placa"         => $row['nplaca_tran'],
                        "MConductor"    => $row['medidasconductor'],
                        "TConductor"    => $row['tipoconductor'],
                        "Capas"         => $row['capas'],
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
    
    public function getbobinasegundario($id){
        $conn = new conexion();
        $pri = null;
        try {
            if($conn->conectar()){
                $sql_str = "Select bobinadosecundario.*, bobinadosecundario.id as idsegundario from bobinadosecundario "
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
