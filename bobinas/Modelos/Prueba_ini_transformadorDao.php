<?php


class Prueba_ini_transformadorDao {

    public function guardaprueba(Prueba_ini_transformador $pru){
        $conn = new conexion();
        $prueba = -1;
        try {
            if($conn->conectar()){
                $str_sql = "Insert into pruebas_ini_tran(ff,ff1,ff2,ff3,ff4,ff5,fn,fn1,x,x1,y,y1,z,z1,"
                        ."megueo,id_trans) values("
                        ."'".$pru->getFf()."',"
                        ."'".$pru->getFf1()."',"
                        ."'".$pru->getFf2()."',"
                        ."'".$pru->getFf3()."',"
                        ."'".$pru->getFf4()."',"
                        ."'".$pru->getFf5()."',"
                        ."'".$pru->getFn()."',"
                        ."'".$pru->getFn1()."',"
                        ."'".$pru->getX()."',"
                        ."'".$pru->getX1()."',"
                        ."'".$pru->getY()."',"
                        ."'".$pru->getY1()."',"
                        ."'".$pru->getZ()."',"
                        ."'".$pru->getZ1()."',"
                        ."'".$pru->getMegueo()."',"
                        ."".$pru->getId_trans().");";
                $sql  = $conn->getConn()->prepare($str_sql);
                $prueba = $sql->execute();
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $conn->desconectar();
        return $prueba;
    }
    
}
