<?php

class MotorDao {
    /*
     * registrar Motor del dialogo
     */
    public function RegistrarMotor(Motor $m){
        $conn = new conexion();
        $mot = -1;
        try {
            if($conn->conectar()){
                $str_sql = "Insert into motorl(num_serie_motor,marca,hp,kw,rpm,n_fases,accion,revicion,cotizado,autorizado,"
                        . "fe_acord,fe_termi,id_usu,id_cliente,estado,estado2,foto) values("
                        ."'".$m->getNum_serie_motor()."',"
                        ."'".$m->getMarca()."',"
                        ."'".$m->getHp()."',"
                        ."'".$m->getKw()."',"
                        ."'".$m->getRpm()."',"
                        ."'".$m->getN_fases()."',"
                        ."'".$m->getAccion()."',"
                        ."'".$m->getRevicion()."',"
                        ."'".$m->getCotizado()."',"
                        ."'".$m->getAutorizado()."',"
                        ."'".$m->getFe_acord()."',"
                        ."'".$m->getFe_term()."',"
                        ."".$m->getId_usu().","
                        ."".$m->getId_cliente().","
                        ."'".$m->getEstado()."',"
                        ."'".$m->getEstado2()."',"
                        ."'".$m->getFoto()."');";
                $sql  = $conn->getConn()->prepare($str_sql);
                $mot = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $mot;
    }
    /*
     * Estos son los datos para la tabla de motores
     */
    function TablaMotores(){
        $conn = new conexion();
        $mot = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT motorl.num_serie_motor,motorl.marca,cliente.nom_cliente,motorl.fe_termi,motorl.id_motores,motorl.hp,motorl.kw,motorl.n_fases,
                    motorl.fe_acord,motorl.estado,motorl.accion,usuarios.nom_usu from motorl INNER JOIN cliente 
                    on cliente.id = motorl.id_cliente INNER JOIN usuarios on usuarios.id_usu = motorl.id_usu and 
                    motorl.estado2 = 'Activo'";
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $mot[] = array(
                        "Num_serie" => $row['num_serie_motor'],
                        "Marca"     => $row['marca'],
                        "IdMotor"   => $row['id_motores'],
                        "Cliente"   => $row['nom_cliente'],
                        "Fe_Ter"    => $row['fe_termi'],
                        "Fe_Acor"   => $row['fe_acord'],
                        "Estado"    => $row['estado'],
                        "Accion"    => $row['accion'],
                        "Nom_Usu"   => $row['nom_usu'],
                        "Hp"        => $row['hp'],
                        "Kw"        => $row['kw'],
                        "Fases"     => $row['n_fases']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $mot;
    }
    /*
     * tabla para los trabajadores
     */
    function tablamotoresempleados($id){
        $conn = new conexion();
        $mot = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT motorl.num_serie_motor,motorl.marca,cliente.nom_cliente,motorl.fe_termi,motorl.id_motores,"
                        . "motorl.fe_acord,motorl.estado,motorl.accion,usuarios.nom_usu from "
                        . "motorl INNER JOIN cliente on cliente.id = motorl.id_cliente and motorl.estado2 = 'Activo' "
                        . "INNER JOIN usuarios on usuarios.id_usu = motorl.id_usu and usuarios.id_usu = ".$id;
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $mot[] = array(
                        "Num_serie"     => $row['num_serie_motor'],
                        "Marca"         => $row['marca'], 
                        "IdMotor"       => $row['id_motores'],
                        "Cliente"       => $row['nom_cliente'],
                        "Fe_Ter"        => $row['fe_termi'],
                        "Fe_Acor"       => $row['fe_acord'],
                        "Estado"        => $row['estado'],
                        "Accion"        => $row['accion'],
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
    /*
     * Esta es la consulta para saber si es un 
     * rebobinado o un mantenimiento al motor
     */
    public function ConsultarReboMante($id){
        $conn = new conexion();
        $mot = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT accion,num_serie_motor,estado,n_fases from motorl where id_motores = '".$id."'";
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $mot[] = array(
                        "Accion"           => $row['accion'],
                        "Num_serie_motor"  => $row['num_serie_motor'],
                        "Estado"           => $row['estado'],
                        "Fase"             => $row['n_fases'] 
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $mot;
    }
    
    public function VerDatosMotor($id){
        $conn = new conexion();
        $motor = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT motorl.marca,motorl.hp,motorl.kw,motorl.rpm,motorl.n_fases,motorl.accion,"
                        . "motorl.revicion,motorl.cotizado, motorl.autorizado,motorl.fe_acord,motorl.fe_termi,"
                        . "usuarios.nom_usu,cliente.nom_cliente,cliente.apellido,cliente.direccion,cliente.ciudad,cliente.telefono,"
                        . "cliente.fecha_ingre as fingreso,cliente.id,cliente.cedula,motorl.foto,usuarios.id_usu from motorl "
                        . "INNER JOIN usuarios on "
                        . "usuarios.id_usu = motorl.id_usu INNER JOIN cliente on cliente.id = motorl.id_cliente "
                        . "and motorl.id_motores = '".$id."'";
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $motor[] = array(
                        "Marca"      => $row['marca'],
                        "Hp"         => $row['hp'],
                        "Kw"         => $row['kw'],
                        "Rpm"        => $row['rpm'],
                        "Fases"      => $row['n_fases'],
                        "Accion"     => $row['accion'],
                        "Revicion"   => $row['revicion'],
                        "Cotizado"   => $row['cotizado'],
                        "Autorizado" => $row['autorizado'],
                        "Fe_acord"   => $row['fe_acord'],
                        "Fe_termi"   => $row['fe_termi'],
                        "Nom_usu"    => $row['nom_usu'],
                        "Cliente"    => $row['nom_cliente'],
                        "Apellido"   => $row['apellido'],
                        "Direccion"  => $row['direccion'],
                        "Ciudad"     => $row['ciudad'],
                        "Telefono"   => $row['telefono'],
                        "Fecha_ing"  => $row['fingreso'],
                        "Id_cliente" => $row['id'],
                        "Cedula"     => $row['cedula'],
                        "Foto"       => $row['foto'],
                        "Id_usu"     => $row['id_usu']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $motor;
    }

    public function ModificarMotores(Motor $m){
        $conn = new conexion();
        $mot = -1;
        try {
            if($conn->conectar()){
                $str_sql = "Update motorl set marca='".$m->getMarca()."',hp=".$m->getHp().","
                        . "kw=".$m->getKw().",rpm=".$m->getRpm().",n_fases=".$m->getN_fases().","
                        . "cotizado=".$m->getCotizado().",autorizado='".$m->getAutorizado()."',"
                        . "accion='".$m->getAccion()."',fe_termi='".$m->getFe_term()."',fe_acord='".$m->getFe_term()."',"
                        . "revicion='".$m->getRevicion()."',foto='".$m->getFoto()."', "
                        . "id_usu = ".$m->getId_usu()." "
                        . "where id_motores = ".$m->getId_motores()."";
                $sql = $conn->getConn()->prepare($str_sql);
                $mot = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $mot;
    }
    
    public function CambiarEstadoMotor(Motor $m){
        $conn = new conexion();
        $mot = -1;
        try {
            if($conn->conectar()){
                $str_sql = "Update motorl set estado='".$m->getEstado()."' "
                        . "where id_motores='".$m->getId_motores()."'";
                $sql = $conn->getConn()->prepare($str_sql);
                $mot = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $mot;
    }
    
    public function ObtenerFecha($id){
        $conn = new conexion();
        $mot = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT motorl.fe_termi from motorl WHERE motorl.id_usu = ".$id;
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $mot[] = array(
                        "FeEntrega"  => $row['fe_termi']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $mot;
    }
    
    public function EliminarMotor(Motor $mo){
        $conn = new conexion();
        $mot = -1;
        try {
            if($conn->conectar()){
                $str_sql = "Update motorl set estado2='".$mo->getEstado2()."' where id_motores=".$mo->getId_motores();
                $sql = $conn->getConn()->prepare($str_sql);
                $mot = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $mot;
    }
    
    /*
     * ver datos del motor 
     */
    function motoresverdatos($id){
        $conn = new conexion();
        $mot = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT motorl.num_serie_motor,motorl.marca,cliente.nom_cliente,motorl.fe_termi,motorl.id_motores,"
                        . "motorl.fe_acord,motorl.estado,motorl.accion,usuarios.nom_usu from "
                        . "motorl INNER JOIN cliente on cliente.id = motorl.id_cliente "
                        . "INNER JOIN usuarios on usuarios.id_usu = motorl.id_usu and motorl.id_motores = ".$id;
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $mot[] = array(
                        "Num_serie"     => $row['num_serie_motor'],
                        "Marca"         => $row['marca'], 
                        "IdMotor"       => $row['id_motores'],
                        "Cliente"       => $row['nom_cliente'],
                        "Fe_Ter"        => $row['fe_termi'],
                        "Fe_Acor"       => $row['fe_acord'],
                        "Estado"        => $row['estado'],
                        "Accion"        => $row['accion'],
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
    
    /*
     * Estos son los datos para el historial
     */
    function TablaHistorial(){
        $conn = new conexion();
        $mot = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT motorl.num_serie_motor,motorl.marca,cliente.nom_cliente,motorl.fe_termi,motorl.id_motores,
                    motorl.fe_acord,motorl.estado,motorl.accion,usuarios.nom_usu from motorl INNER JOIN cliente 
                    on cliente.id = motorl.id_cliente INNER JOIN usuarios on usuarios.id_usu = motorl.id_usu and 
                    motorl.estado2 = 'Inactivo'";
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $mot[] = array(
                        "Num_serie" => $row['num_serie_motor'],
                        "Marca"     => $row['marca'],
                        "IdMotor"   => $row['id_motores'],
                        "Cliente"   => $row['nom_cliente'],
                        "Fe_Ter"    => $row['fe_termi'],
                        "Fe_Acor"   => $row['fe_acord'],
                        "Estado"    => $row['estado'],
                        "Accion"    => $row['accion'],
                        "Nom_Usu"   => $row['nom_usu']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $mot;
    }
    
}
