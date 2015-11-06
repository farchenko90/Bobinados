<?php


class ClienteDao {
    /*
     * Registramos al cliente de la accion de guardar motores
     * 
     */
    public function RegistrarCliente(Clientes $c){
        $conn = new conexion();
        $cli = -1;
        try {
            if($conn->conectar()){
                $str_sql = "Insert into bobinados.cliente(cedula,nom_cliente,direccion,telefono,fecha_ingre,ciudad,apellido,serial) "
                        . "values("
                        ."'".$c->getCedula()."',"
                        ."'".$c->getNom_cliente()."',"
                        ."'".$c->getDireccion()."',"
                        ."'".$c->getTelefono()."',"
                        ."'".$c->getFecha_ingre()."',"
                        ."'".$c->getCiudad()."',"
                        ."'".$c->getApellido()."',"
                        ."'".$c->getSerial()."');";
                $sql  = $conn->getConn()->prepare($str_sql);
                $cli = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $cli;
    }
    /*
     * modificar datos del cliente 
     * en la ventana modal de menu_admin_motores_edit
     */
    public function ModificarCliente(Clientes $c){
        $conn = new conexion();
        $cli = -1;
        try {
            if($conn->conectar()){
                $str_sql = "Update cliente set nom_cliente='".$c->getNom_cliente()."',"
                        . "direccion='".$c->getDireccion()."',telefono='".$c->getTelefono()."',"
                        . "fecha_ingre='".$c->getFecha_ingre()."',ciudad='".$c->getCiudad()."',"
                        . "apellido='".$c->getApellido()."' "
                        . "where id=".$c->getId_cliente()."";
                $sql  = $conn->getConn()->prepare($str_sql);
                $cli = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $cli;
    }
    
    public function MaxIdCliente(){
        $conn = new conexion();
        $cli = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT MAX(id) as id from cliente ";
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $cli[] = array(
                        "Id"   => $row['id']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $cli;
    }
    /*
     * Ver datos del cliente
     */
    public function VerDatosClientes($idcli,$idtra){
        $conn = new conexion();
        $cli = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT cliente.nom_cliente,cliente.fecha_ingre,transformador.marca_tran from cliente 
                INNER JOIN transformador on cliente.id = transformador.idclie_tran and 
                transformador.idclie_tran = ".$idcli." and transformador.id_tran = ".$idtra;
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $cli[] = array(
                        "Nombre"   => $row['nom_cliente'],
                        "Fecha"    => $row['fecha_ingre'],
                        "Marca"    => $row['marca_tran']  
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $cli;
    }
    /*
     * Consultar cliente por medio del id del transformador
     */
    public function ConsultarDatos($id){
        $conn = new conexion();
        $cli = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT cliente.id,cliente.nom_cliente FROM transformador INNER JOIN cliente on "
                        . "cliente.id = transformador.idclie_tran AND transformador.id_tran = ".$id;
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $cli[] = array(
                        "Id"       => $row['id'],
                        "Nombre"   => $row['nom_cliente']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $cli;
    }
    
    public function buscarCliente($peticion){
        $conn = new conexion();
        $cli = null;
        try {
            if($conn->conectar()){
                $str_sql = "Select cliente.id,cliente.nom_cliente,cliente.telefono,cliente.direccion,cliente.cedula,"
                        . "cliente.ciudad,cliente.apellido "
                        . "from cliente "
                        . "where cliente.cedula = '$peticion'";
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $cli = array(
                        "Id"       => $row['id'],
                        "Nombre"   => $row['nom_cliente'],
                        "Telefono" => $row['telefono'],
                        "Apellidos"=> $row['apellido'],
                        "Direccion"=> $row['direccion'],
                        "Ciudad"   => $row['ciudad'],
                        "Cedula"   => $row['cedula']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $cli;
    }
    
    public function MaxId(){
        $conn = new conexion();
        //$cli = null;
        try {
            if($conn->conectar()){
                $str_sql = "Select max(id) as id from cliente";
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                $cliente = null;
                foreach ($resultado as $row){
                    $cliente = new Clientes();
                    $cliente->setId_cliente($row['id']);
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $cliente;
    }
    
}
