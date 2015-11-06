<?php
$app->post('/prueba','prueba_ini_transformadorDao');

function prueba_ini_transformadorDao(){
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $prueba = new Prueba_ini_transformador();
    $pDao = new Prueba_ini_transformadorDao();
    
    
        
    $prueba->setFf($p->Ff);
    $prueba->setFf1($p->Ff1);
    $prueba->setFf2($p->Ff2);
    $prueba->setFf3($p->Ff3);
    $prueba->setFf4($p->Ff4);
    $prueba->setFf5($p->Ff5);
    $prueba->setFn($p->Fn);
    $prueba->setFn1($p->Fn1);
    $prueba->setX($p->X);
    $prueba->setX1($p->X1);
    $prueba->setY($p->Y);
    $prueba->setY1($p->Y1);
    $prueba->setZ($p->Z);
    $prueba->setZ1($p->Z1);
    $prueba->setMegueo($p->Megueo);
    $prueba->setId_trans($p->Id_trans);

    $res = $pDao->guardaprueba($prueba);
    
    
    echo json_encode(array("estado"=>$res));
    
}


