<?php

$app->post('/chatuser','registrarchatusuarios');
$app->get('/chat/mensajesuser/:idusu1/:idusu2','vermensajeusuarios');
$app->put('/chatuser/estado/:idusu1/:idusu2','estadoVistousuarios');
$app->delete('/chatuser/eliminar/:idusu/:user','borrarchatusuarios');

function registrarchatusuarios(){
    
    $c = new ChatUser();
    $cDao = new ChatUserDao();
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $c->setMensaje($p->mensaje);
    $c->setIdusu1($p->idusu1);
    $c->setIdusu2($p->idusu2);
    $c->setNomusuario($p->nomusuario);
    $c->setFecha(date('Y-m-d'));
    $c->setHora(date('H:i:s'));
    $c->setArchivo($p->archivo);
    
    $res = $cDao->RegistrarChatuser($c);
    
    echo json_encode(array("estado"=>$res));
    
}

function vermensajeusuarios($idusu1,$idusu2){
    
    $cDao = new ChatUserDao();
    
    $res = $cDao->verMensajeusuarios($idusu1,$idusu2);
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}

function estadoVistousuarios($idusu1,$idusu2){
    
    $c = new ChatUser();
    $cDao = new ChatUserDao();
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $c->setEstado("Visto");
    $c->setNomusuario($p->nomusuario);
    $res = $cDao->estadoVisto($c, $idusu1, $idusu2);
    
    echo json_encode(array("estado"=>$res));
    
}

function borrarchatusuarios($id,$user){
    
    $cDao = new ChatUserDao();

    $res = $cDao->borrarchatusuario($id,$user);

    echo json_encode(array("estado"=>$res));
    
}
