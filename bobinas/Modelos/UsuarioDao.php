<?php

class UsuarioDao {
    
    /*
     * Inicio de Sesion del tipo de usuario
     * con el rol
     */
    public function IniciarSesion(Usuario $usu){
        $conn = new conexion();
        $rol = 0;
        try {
            if($conn->conectar()){
                $str_sql = "Select usuarios.id_usu, usuarios.nom_usu,usuarios.usuario,usuarios.foto,tp_usuarios.nom_tp as rol,usuarios.idcliente from usuarios "
                        . "INNER JOIN tp_usuarios WHERE usuarios.id_tp_usu = tp_usuarios.id_tp "
                        . "and usuarios.usuario = '".$usu->getUsuario()."' and usuarios.pass = '".$usu->getPass()."' "
                        . "and estado = 'Activo'";
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $rol = 1;
                    session_start();
                    $_SESSION['id']     = $row['id_usu'];
                    //$_SESSION['idcli']  = $row['idcliente'];
                    $_SESSION['perfil'] = $row['usuario'];
                    $_SESSION['rol']    = $row['rol'];
                    $_SESSION['user']   = $row['nom_usu'];
                    $_SESSION['img']    = $row['foto'];
                }
            }
        } catch (Exception $exc) {
            $rol = -1;
            echo $exc->getMessage();
        }
        $conn->desconectar();
        return $rol;
    }
    /*
     * Editar cuenta del perfil
     */
    public function EditarCuenta(Usuario $usu){
        $conn = new conexion();
        $cue = -1;
        try {
            if($conn->conectar()){
                $str_sql = "Update usuarios set nom_usu = '".$usu->getNom_usu()."', "
                    . "usuario = '".$usu->getUsuario()."', email = '".$usu->getEmail()."', "
                    . "pass = '".$usu->getPass()."', foto = '".$usu->getFoto()."' "
                    . "where id_usu = ".$usu->getId_usu().";";
                $sql = $conn->getConn()->prepare($str_sql);
                $cue = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $conn->desconectar();
        return $cue;
    }
    /*
     * Consultamos la cuenta del perfil 
     * con todo sus datos
     */
    public function ConsultarCuenta($id){
        $conn = new conexion();
        $cuenta = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT usuarios.nom_usu,usuarios.usuario,usuarios.email,usuarios.pass,usuarios.foto,"
                        . "tp_usuarios.nom_tp,usuarios.id_usu "
                        . "from usuarios "
                        . "inner join tp_usuarios on tp_usuarios.id_tp = usuarios.id_tp_usu "
                        . "where usuarios.id_usu = ".$id." ";
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $user = new Usuario();
                    $user->mapear($row);
                    $cuenta[] = array(
                        "Nom_usu" => $user->getNom_usu(),
                        "Id_usu"  => $user->getId_usu(),
                        "Nom_tp"  => $row["nom_tp"],
                        "Usuario" => $user->getUsuario(),
                        "Email"   => $user->getEmail(),
                        "Pass"    => $user->getPass(),
                        "Foto"    => $user->getFoto()
                    );
                }
            }
        } catch (Exception $exc) {
            $cuenta = null;
            echo $exc->getMessage();
        }
        $conn->desconectar();
        return $cuenta;
    }
    /*
     * Agregamo un nuevo usuario al pagina
     */
    public function AgregarUsuario(Usuario $usu){
        $conn = new conexion();
        $user = -1;
        try {
            if($conn->conectar()){
                $str_sql = "Insert into usuarios(nom_usu,usuario,cedula,telefono,email,pass,foto,estado,"
                        . "id_tp_usu,tipo,idcliente) values("
                        ."'".$usu->getNom_usu()."',"
                        ."'".$usu->getUsuario()."',"
                        ."'".$usu->getCedula()."',"
                        ."'".$usu->getTelefono()."',"
                        ."'".$usu->getEmail()."',"
                        ."'".$usu->getPass()."',"
                        ."'".$usu->getFoto()."',"
                        ."'".$usu->getEstado()."',"
                        ."".$usu->getId_tp_usu().","
                        ."'".$usu->getTipo()."',"
                        ."".$usu->getIdcliente().");";
                $sql  = $conn->getConn()->prepare($str_sql);
                $user = $sql->execute();
               
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $conn->desconectar();
        return $user;
    }
    /*
     * Consultamos la cuenta del perfil y
     * agregamos los datos a la tabla
     * con todo sus datos
     */
    public function ConsultarCuentaTabla(){
        $conn = new conexion();
        $cuenta = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT usuarios.nom_usu,usuarios.id_usu,usuarios.telefono,usuarios.usuario,usuarios.email,usuarios.foto,"
                        . "tp_usuarios.nom_tp as tipo,usuarios.id_usu from usuarios INNER JOIN tp_usuarios "
                        . "where usuarios.id_tp_usu = tp_usuarios.id_tp and usuarios.id_tp_usu <> 1 "
                        . "and estado = 'Activo' and usuarios.id_tp_usu <> 7";
                
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $user = new Usuario();
                    $user->mapear1($row);
                    $cuenta[] = array(
                        "Nom_usu"  => $user->getNom_usu(),
                        "Usuario"  => $user->getUsuario(),
                        "Email"    => $user->getEmail(),
                        "Telefono" => $user->getTelefono(),
                        "Foto"     => $user->getFoto(),
                        "Cedula"   => $row['id_usu'],
                        "Tipo"     => $row['tipo'],
                        "Idusu"    => $row['id_usu'] 
                    );
                }
            }
        } catch (Exception $exc) {
            $cuenta = null;
            echo $exc->getMessage();
        }
        $conn->desconectar();
        return $cuenta;
    }
    /*
     * Consultamos los datos del usario para la ventana
     * modal 
     */
    public function ConsultarDatosUsuario($id){
        $conn = new conexion();
        $cuenta = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT usuarios.nom_usu,usuarios.idcliente,usuarios.pass,usuarios.email,usuarios.id_usu,usuarios.foto,usuarios.telefono, "
                        . "tp_usuarios.nom_tp as tipo,usuarios.id_tp_usu,usuarios.cedula from usuarios INNER JOIN tp_usuarios on "
                        . "usuarios.id_tp_usu = tp_usuarios.id_tp and usuarios.id_usu = ".$id;
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $cuenta[] = array(
                        "Nom_usu"  => $row['nom_usu'],
                        "Email"    => $row['email'],
                        "Id_usu"   => $row['id_usu'],
                        "Cedula"   => $row['cedula'],
                        "Foto"     => $row['foto'],
                        "Telefono" => $row['telefono'],
                        "Tipo"     => $row['tipo'],
                        "Pass"     => $row['pass'],
                        "Id_tipo"  => $row['id_tp_usu'],
                        "Id_cli"   => $row['idcliente'] 
                    );
                }
            }
        } catch (Exception $exc) {
            $cuenta = null;
            echo $exc->getMessage();
        }
        $conn->desconectar();
        return $cuenta;
    }
    /*
     * editamos en la sesion de administardor 
     * la informacion de cada usuario
     */
    public function EditarPerfil(Usuario $usu){
        $conn = new conexion();
        $per = -1;
        try {
            if($conn->conectar()){
                $str_sql = "Update usuarios set nom_usu = '".$usu->getNom_usu()."', "
                    . "telefono = '".$usu->getTelefono()."', email = '".$usu->getEmail()."', "
                    . "pass = '".$usu->getPass()."', "
                    . "id_tp_usu = ".$usu->getId_tp_usu()." "
                    . "where id_usu = ".$usu->getId_usu().";";
                $sql = $conn->getConn()->prepare($str_sql);
                $per = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $conn->desconectar();
        return $per;
    }
    
    public function CargaDatosSelect(){
        $conn = new conexion();
        $user = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT usuarios.nom_usu,usuarios.id_usu from usuarios where usuarios.id_tp_usu <> 1";
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $user[] = array(
                        "Nom_usu"   =>$row['nom_usu'],
                        "Id_usu"    =>$row['id_usu'] 
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $user;
    }
    
    public function EncargarMotorResponsable(){
        $conn = new conexion();
        $user = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT usuarios.nom_usu,usuarios.id_usu from usuarios "
                        . "WHERE usuarios.id_tp_usu = 3 and usuarios.estado = 'Activo' or usuarios.id_tp_usu = 5 and usuarios.estado = 'Activo'";
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $user[] = array(
                        "Nom_usu"   => $row['nom_usu'],
                        "Id_usu"    => $row['id_usu']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $user;
    }
    /*
     * carga dato del empleado transformador
     */
    public function CargarTransResponsable($id){
        $conn = new conexion();
        $user = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT usuarios.id_usu,usuarios.nom_usu from usuarios INNER JOIN transformador "
                        . "on transformador.idusu_tran = usuarios.id_usu and transformador.id_tran  = ".$id;
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $user[] = array(
                        "Nom_usu"   => $row['nom_usu'],
                        "Id_usu"    => $row['id_usu']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $user;
    }
    /*
     * lista de datos de los responsable
     */
    public function EncargarTransResponsable(){
        $conn = new conexion();
        $user = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT usuarios.nom_usu,usuarios.id_usu from usuarios "
                        . "WHERE usuarios.id_tp_usu = 2 and usuarios.estado = 'Activo' or usuarios.id_tp_usu = 4 and usuarios.estado = 'Activo'";
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $user[] = array(
                        "Nom_usu"   => $row['nom_usu'],
                        "Id_usu"    => $row['id_usu']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $user;
    }
    /*
     * Cambiamos el estado del usuario a inactivo
     * para eliminarlo
     */
    public function EliminarUsuario(Usuario $user){
        $conn = new conexion();
        $us = -1;
        try {
            if($conn->conectar()){
                $str_sql = "Update usuarios set estado='".$user->getEstado()."' where id_usu = ".$user->getId_usu();
                $sql = $conn->getConn()->prepare($str_sql);
                $us = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $us;
    }
    
    public function verClientes($id){
        $conn = new conexion();
        $cuenta = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT usuarios.nom_usu,usuarios.id_usu,usuarios.telefono,usuarios.usuario,usuarios.email,usuarios.foto,"
                        . "tp_usuarios.nom_tp as tipo,usuarios.idcliente,usuarios.id_usu from usuarios INNER JOIN tp_usuarios "
                        . "where usuarios.id_tp_usu = tp_usuarios.id_tp "
                        . "and estado = 'Activo' and usuarios.id_usu <> $id";
                
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $user = new Usuario();
                    $user->mapear1($row);
                    $cuenta[] = array(
                        "Id_cli"   => $row['idcliente'],
                        "Id_usu"   => $row['id_usu'], 
                        "Nom_usu"  => $user->getNom_usu(),
                        "Usuario"  => $user->getUsuario(),
                        "Email"    => $user->getEmail(),
                        "Telefono" => $user->getTelefono(),
                        "Foto"     => $user->getFoto(),
                        "Cedula"   => $row['id_usu'],
                        "Tipo"     => $row['tipo']    
                    );
                }
            }
        } catch (Exception $exc) {
            $cuenta = null;
            echo $exc->getMessage();
        }
        $conn->desconectar();
        return $cuenta;
    }
    
    public function chatcliente($id){
        $conn = new conexion();
        $user = null;
        try {
            if($conn->conectar()){
                $str_sql = "Select usuarios.idcliente,usuarios.id_usu,usuarios.nom_usu from usuarios "
                        . "where usuarios.idcliente = $id";
                        
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $user = array(
                        "Nom_usu"   => $row['nom_usu'],
                        "Id_usu"    => $row['id_usu'],
                        "Id_cli"    => $row['idcliente']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $user;
    }
    
    public function chatusuario($id){
        $conn = new conexion();
        $user = null;
        try {
            if($conn->conectar()){
                $str_sql = "Select usuarios.id_usu,usuarios.nom_usu,usuarios.idcliente from usuarios "
                        . "where usuarios.id_usu = $id";
                        
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $user = array(
                        "Nom_usu"   => $row['nom_usu'],
                        "Id_usu"    => $row['id_usu'],
                        "Id_cli"    => $row['idcliente']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $user;
    }
    
    
    public function ConsultarCuentausuariosistema(){
        $conn = new conexion();
        $cuenta = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT usuarios.nom_usu,usuarios.id_usu,usuarios.telefono,usuarios.usuario,usuarios.email,usuarios.foto,"
                        . "tp_usuarios.nom_tp as tipo from usuarios INNER JOIN tp_usuarios "
                        . "where usuarios.id_tp_usu = tp_usuarios.id_tp and usuarios.id_tp_usu <> 7 "
                        . "and estado = 'Activo'";
                
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $cuenta[] = array(
                        "Nom_usu"   => $row['nom_usu'],
                        "Id_user"    => $row['id_usu'],
                        "Cedula"     => $row['id_usu'],
                        "Foto"      => $row['foto'],
                        "Telefono"  => $row['telefono'],
                        "Usuario"   => $row['usuario'],
                        "Tipo"     => $row['tipo']
                    );
                }
            }
        } catch (Exception $exc) {
            $cuenta = null;
            echo $exc->getMessage();
        }
        $conn->desconectar();
        return $cuenta;
    }
    
    public function ConsultarDatosCliente($id){
        $conn = new conexion();
        $cuenta = null;
        try {
            if($conn->conectar()){
                $str_sql = "SELECT usuarios.nom_usu,usuarios.pass,usuarios.email,usuarios.id_usu,usuarios.foto,usuarios.telefono, "
                        . "tp_usuarios.nom_tp as tipo,usuarios.id_tp_usu,usuarios.cedula from usuarios INNER JOIN tp_usuarios on "
                        . "usuarios.id_tp_usu = tp_usuarios.id_tp and usuarios.idcliente = ".$id;
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $cuenta[] = array(
                        "Nom_usu"  => $row['nom_usu'],
                        "Email"    => $row['email'],
                        "Id_usu"   => $row['id_usu'],
                        "Cedula"   => $row['cedula'],
                        "Foto"     => $row['foto'],
                        "Telefono" => $row['telefono'],
                        "Tipo"     => $row['tipo'],
                        "Pass"     => $row['pass'],
                        "Id_tipo"  => $row['id_tp_usu']
                    );
                }
            }
        } catch (Exception $exc) {
            $cuenta = null;
            echo $exc->getMessage();
        }
        $conn->desconectar();
        return $cuenta;
    }
    
    
    public function empleadomotores(){
        $conn = new conexion();
        $user = null;
        try {
            if($conn->conectar()){
                $str_sql = "Select id_usu,nom_usu,usuario,id_tp_usu from usuarios where id_tp_usu = 5 and tipo = 'Sin Asignar'";
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $user[] = array(
                        "Id"     => $row['id_usu'],
                        "Nombre" => $row['nom_usu'],
                        "Id_tipo"=> $row['id_tp_usu']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $user;
    }
    
    public function empleadotransformado(){
        $conn = new conexion();
        $user = null;
        try {
            if($conn->conectar()){
                $str_sql = "Select id_usu,nom_usu,usuario,id_tp_usu from usuarios where id_tp_usu = 4 and tipo = 'Sin Asignar'";
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $user[] = array(
                        "Id"     => $row['id_usu'],
                        "Nombre" => $row['nom_usu'],
                        "Id_tipo"=> $row['id_tp_usu']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $user;
    }
    
    public function cambiartipo(Usuario $usu){
        $conn = new conexion();
        $per = -1;
        try {
            if($conn->conectar()){
                $str_sql = "Update usuarios set tipo = '".$usu->getTipo()."' "
                    . "where id_usu = ".$usu->getId_usu().";";
                $sql = $conn->getConn()->prepare($str_sql);
                $per = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $conn->desconectar();
        return $per;
    }
    
    public function validarcorreo($correo){
        $conn = new conexion();
        $user = null;
        try {
            if($conn->conectar()){
                $str_sql = "Select email,id_usu,nom_usu from usuarios where email = '$correo'";
                $sql = $conn->getConn()->prepare($str_sql);
                $sql->execute();
                $resultado = $sql->fetchAll();
                foreach ($resultado as $row){
                    $user = array(
                        "Id"     => $row['id_usu'],
                        "Nombre" => $row['nom_usu'],
                        "Id_tipo"=> $row['email']
                    );
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $user;
    }
    
    public function cambiarcontrasena(Usuario $usu){
        $conn = new conexion();
        $per = -1;
        try {
            if($conn->conectar()){
                $str_sql = "Update usuarios set pass = '".$usu->getPass()."' "
                    . "where id_usu = ".$usu->getId_usu().";";
                $sql = $conn->getConn()->prepare($str_sql);
                $per = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $conn->desconectar();
        return $per;
    }
    
    
        
}
