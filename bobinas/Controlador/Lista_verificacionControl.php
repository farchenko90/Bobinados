<?php

$app->post('/lista','registrarlista');

function registrarlista(){
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $l = new Lista_verificacion();
    $lDao = new Lista_verificacionDao();
    
    //$id = $tra->MaxId();
    
    
    for($i =0; $i < count($p->Lista_lista); $i++){
        $l->setLista_lista($p->Lista_lista[$i]);
        $l->setId_tra_lista($p->Id_tra_lista);
        $l->setCual_lista($p->Cual_lista);
        $l->setObservacion_lista($p->Observacion_lista);
        $res = $lDao->RegistrarLista($l);
    }
    
    echo json_encode(array("estado"=>$res));
    
}

