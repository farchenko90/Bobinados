<?php


class TransformadorDao {
    
    public function GuardarTrasnformador(Transformador $tra){
        $conn = new conexion();
        $trans = -1;
        try {
            if($conn->conectar()){
                $str_sql = "Insert into transformador(marca_tran,nplaca_tran,kva_tran,tp_tran,ts_tran,tipo_acc_tran,"
                        . "fe_acor_tran,fe_ter_tran,estado,foto,idclie_tran,idusu_tran) values("
                        ."'".$tra->getMarca_tran()."',"
                        ."'".$tra->getNplaca_tran()."',"
                        ."'".$tra->getKva_tran()."',"
                        ."'".$tra->getTp_tran()."',"
                        ."'".$tra->getTs_tran()."',"
                        ."'".$tra->getTipo_acc_tran()."',"
                        ."'".$tra->getFe_acor_tran()."',"
                        ."'".$tra->getFe_ter_tran()."',"
                        ."'".$tra->getEstado()."',"
                        ."'".$tra->getFoto()."',"
                        ."".$tra->getIdClie_tran().","
                        ."".$tra->getIdusu_tran().");";
                $sql  = $conn->getConn()->prepare($str_sql);
                $trans = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $trans;
    }
    
    public function modificartransfirmador(Transformador $tra){
        
        $conn = new conexion();
        $trans = -1;
        try {
             if($conn->conectar()){
                $str_sql = "Update transformador set marca_tran='".$tra->getMarca_tran()."',"
                        . "nplaca_tran='".$tra->getNplaca_tran()."',kva_tran='".$tra->getKva_tran()."',"
                        . "tp_tran='".$tra->getTp_tran()."',ts_tran='".$tra->getTs_tran()."',"
                        . "tipo_acc_tran='".$tra->getTipo_acc_tran()."',fe_acor_tran='".$tra->getFe_acor_tran()."',"
                        . "fe_ter_tran='".$tra->getFe_ter_tran()."',foto='".$tra->getFoto()."', "
                        . "idusu_tran = ".$tra->getIdusu_tran()." "
                        . "where id_tran= ".$tra->getId_tran()."";
                        
                $sql  = $conn->getConn()->prepare($str_sql);
                $trans = $sql->execute();
             }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
            $conn->desconectar();
            return $trans;
    }
    
    public function ObtenerContador($id){
        $conn = new conexion();
        $tra = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT contador from transformador where id_tran=".$id;
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $tra[] = array(
                        "Contador"   => $row['contador']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $tra;
    }


    public function MaxId(){
        $conn = new conexion();
        $tra = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT MAX(id_tran) as id from transformador ";
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $tra[] = array(
                        "Id"   => $row['id']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $tra;
    }
    
    /*
     * Estos son los datos para la tabla de transformadores
     */
    function TablaTransformadores(){
        $conn = new conexion();
        $tran = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT transformador.id_tran,transformador.marca_tran,transformador.nplaca_tran,transformador.tipo_acc_tran,transformador.estado3,
                    cliente.nom_cliente,cliente.fecha_ingre,transformador.fe_acor_tran,transformador.fe_ter_tran,
                    transformador.estado,transformador.foto ,usuarios.nom_usu from transformador INNER JOIN 
                    usuarios on usuarios.id_usu = transformador.idusu_tran INNER JOIN cliente on 
                    cliente.id = transformador.idclie_tran and transformador.estado2='Activo'";
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $tran[] = array(
                        "Marca"         => $row['marca_tran'],
                        "Foto"          => $row['foto'],
                        "Placa"         => $row['nplaca_tran'],
                        "NomCliente"    => $row['nom_cliente'],
                        "Facor"         => $row['fecha_ingre'],
                        "Fterm"         => $row['fe_ter_tran'],
                        "Tipo"          => $row['tipo_acc_tran'],
                        "Estado"        => $row['estado'],
                        "NomUsu"        => $row['nom_usu'],
                        "Estado3"       => $row['estado3'],
                        "Id"            => $row['id_tran']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $tran;
    }
    /*
     * tabla de los empleado de los motores
     */
    function tablatransformadorempleados($id){
        $conn = new conexion();
        $mot = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT transformador.id_tran,transformador.marca_tran,transformador.nplaca_tran,"
                        . "transformador.tipo_acc_tran, cliente.nom_cliente,cliente.fecha_ingre,"
                        . "transformador.fe_acor_tran,transformador.fe_ter_tran, transformador.estado, transformador.foto,"
                        . "usuarios.nom_usu from transformador INNER JOIN usuarios on "
                        . "usuarios.id_usu = transformador.idusu_tran INNER JOIN cliente on "
                        . "cliente.id = transformador.idclie_tran and transformador.idusu_tran =".$id." "
                        . "and transformador.estado2='Activo'";
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $mot[] = array(
                        "Id"            => $row['id_tran'],
                        "Marca"         => $row['marca_tran'], 
                        "Foto"          => $row['foto'],
                        "Placa"         => $row['nplaca_tran'],
                        "Tipo"          => $row['tipo_acc_tran'],
                        "Nombre"        => $row['nom_cliente'],
                        "Fe_Acor"       => $row['fe_acor_tran'],
                        "Fe_ter"        => $row['fe_ter_tran'],
                        "Estado"        => $row['estado'],
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
    
    public function getalltransformador($id){
        $conn = new conexion();
        $tra = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT transformador.marca_tran,transformador.nplaca_tran,transformador.kva_tran,"
                        . "transformador.tp_tran, transformador.ts_tran,transformador.tipo_acc_tran,transformador.foto,"
                        . "transformador.fe_acor_tran,transformador.fe_ter_tran, transformador.id_tran,"
                        . "transformador.estado,transformador.idusu_tran,usuarios.nom_usu "
                        . "from transformador "
                        . "inner join usuarios on usuarios.id_usu = transformador.idusu_tran "
                        . "WHERE transformador.id_tran = ".$id;
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $tra[] = array(
                        "Marca"         => $row['marca_tran'],
                        "Estado"        => $row['estado'],
                        "Placa"         => $row['nplaca_tran'],
                        "Foto"          => $row['foto'],
                        "KVA"           => $row['kva_tran'],
                        "TP"            => $row['tp_tran'],
                        "TS"            => $row['ts_tran'],
                        "Tipo"          => $row['tipo_acc_tran'],
                        "Facor"         => $row['fe_acor_tran'],
                        "Fter"          => $row['fe_ter_tran'],
                        "Id"            => $row['id_tran'],
                        "Nomusu"        => $row['nom_usu'],
                        "Id_usu"        => $row['idusu_tran']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $tra;
    }
    
    public function VerDatostransformador($idcli,$idtra){
        $conn = new conexion();
        $tra = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT transformador.marca_tran,transformador.nplaca_tran from transformador "
                        . "WHERE transformador.idclie_tran = ".$idcli." AND transformador.id_tran = ".$idtra;
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $tra[] = array(
                        "Marca"   => $row['marca_tran'],
                        "Placa"   => $row['nplaca_tran']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $tra;
    }
    
    public function DatosTransfomadorrebobinado($id){
        $conn = new conexion();
        $tra = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT DISTINCT cliente.nom_cliente,cliente.fecha_ingre,reparacion_trans.nsecuencia,"
                        . "transformador.kva_tran, transformador.marca_tran,reparacion_trans.vsengundario,"
                        . "reparacion_trans.vprimario,reparacion_trans.potencia from transformador INNER JOIN cliente on "
                        . "cliente.id = transformador.idclie_tran INNER JOIN reparacion_trans on "
                        . "reparacion_trans.idtran_repa = transformador.id_tran WHERE reparacion_trans.id_repa = ".$id;
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $tra[] = array(
                        "NomCliente"    => $row['nom_cliente'],
                        "Fecha"         => $row['fecha_ingre'],
                        "NSecuencia"    => $row['nsecuencia'],
                        "KVA"           => $row['kva_tran'],
                        "Marca"         => $row['marca_tran'],
                        "Primario"      => $row['vprimario'],
                        "Segundario"    => $row['vsengundario'],
                        "Potencia"      => $row['potencia']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $tra;
    }
    
    public function cambiarestadotrans(Transformador $trans){
        $conn = new conexion();
        $tra = -1;
        try {
            if($conn->conectar()){
                $str_sql = "Update transformador set estado='".$trans->getEstado()."' where id_tran=".$trans->getId_tran();
                $sql  = $conn->getConn()->prepare($str_sql);
                $tra = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $tra;
    }

    public function cambiarestado3trans(Transformador $trans){
        $conn = new conexion();
        $tra = -1;
        try {
            if($conn->conectar()){
                $str_sql = "Update transformador set estado3='Terminado' where id_tran=".$trans->getId_tran();
                $sql  = $conn->getConn()->prepare($str_sql);
                $tra = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $tra;
    }
    
    public function datosdeeliminartransformador($id){
        $conn = new conexion();
        $tran = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT cliente.nom_cliente,transformador.marca_tran,transformador.nplaca_tran,"
                        . "transformador.estado,transformador.tipo_acc_tran from transformador INNER JOIN "
                        . "cliente on cliente.id = transformador.idclie_tran AND transformador.id_tran = ".$id;
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $tran = array(
                        "Cliente"   => $row['nom_cliente'],
                        "Marca"     => $row['marca_tran'],
                        "Placa"     => $row['nplaca_tran'],
                        "Estado"    => $row['estado'],
                        "Accion"    => $row['tipo_acc_tran']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $tran;
    }
    
    public function cambiarestadotranseliminado(Transformador $trans){
        $conn = new conexion();
        $tra = -1;
        try {
            if($conn->conectar()){
                $str_sql = "Update transformador set estado2='".$trans->getEstado2()."' where id_tran=".$trans->getId_tran();
                $sql  = $conn->getConn()->prepare($str_sql);
                $tra = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $tra;
    }
    
    function TablaTransformadoreshistorial(){
        $conn = new conexion();
        $tran = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT transformador.id_tran,transformador.marca_tran,transformador.nplaca_tran,transformador.tipo_acc_tran,
                    cliente.nom_cliente,cliente.fecha_ingre,transformador.fe_acor_tran,transformador.fe_ter_tran,
                    transformador.estado, usuarios.nom_usu from transformador INNER JOIN 
                    usuarios on usuarios.id_usu = transformador.idusu_tran INNER JOIN cliente on 
                    cliente.id = transformador.idclie_tran and transformador.estado2='Inactivo'";
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $tran[] = array(
                        "Marca"         => $row['marca_tran'],
                        "Placa"         => $row['nplaca_tran'],
                        "NomCliente"    => $row['nom_cliente'],
                        "Facor"         => $row['fecha_ingre'],
                        "Fterm"         => $row['fe_ter_tran'],
                        "Tipo"          => $row['tipo_acc_tran'],
                        "Estado"        => $row['estado'],
                        "NomUsu"        => $row['nom_usu'],
                        "Id"            => $row['id_tran']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $tran;
    }
    
    function transformador_reparacion(){
        $conn = new conexion();
        $tran = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT transformador.id_tran,transformador.marca_tran,transformador.nplaca_tran,transformador.tipo_acc_tran,
                    cliente.nom_cliente,cliente.fecha_ingre,transformador.fe_acor_tran,transformador.fe_ter_tran,
                    transformador.estado, usuarios.nom_usu,transformador.foto from transformador INNER JOIN 
                    usuarios on usuarios.id_usu = transformador.idusu_tran INNER JOIN cliente on 
                    cliente.id = transformador.idclie_tran and transformador.tipo_acc_tran='Reparacion'";
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $tran[] = array(
                        "Marca"         => $row['marca_tran'],
                        "Placa"         => $row['nplaca_tran'],
                        "NomCliente"    => $row['nom_cliente'],
                        "Facor"         => $row['fecha_ingre'],
                        "Fterm"         => $row['fe_ter_tran'],
                        "Tipo"          => $row['tipo_acc_tran'],
                        "Estado"        => $row['estado'],
                        "NomUsu"        => $row['nom_usu'],
                        "Foto"          => $row['foto'],
                        "Id"            => $row['id_tran']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $tran;
    }
    
    
}
