<?php


class Lista_verificacionDao {
    
    public function RegistrarLista(Lista_verificacion $l){
        $conn = new conexion();
        $lis = -1;
        try {
            if($conn->conectar()){
                $str_sql = "Insert into lista_veri_trans(lista_lista,cual_lista,observacion_lista,id_tra_lista) values("
                        ."'".$l->getLista_lista()."',"
                        ."'".$l->getCual_lista()."',"
                        ."'".$l->getObservacion_lista()."',"
                        ."".$l->getId_tra_lista().");";
                $sql = $conn->getConn()->prepare($str_sql);
                $lis = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $lis;
    }
    
}
