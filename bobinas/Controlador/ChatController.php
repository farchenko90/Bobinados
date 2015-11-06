<?php

$app->post('/chat','registrarchat');
$app->get('/chat/:idusu/:idcli','vermensaje');
$app->get('/chatcliente/:idcli/:idusu','vermensajecliente');
$app->get('/bandeja/:idusu/:nom','bandejaentrada');
$app->get('/bandejacliente/:idcli/:nomb','bandejaentradacliente');
$app->put('/estado/:idusu/:idcli','estadoVisto');
$app->delete('/chat/eliminar/:idusu/:user','borrarchat');
$app->delete('/chatcliente/eliminarcli/:id/:user','borrarchatcliente');
//$app->get('/contador/:idusu','contador');

function registrarchat(){
    
    $c = new Chat();
    $cDao = new ChatDao();
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $c->setMensaje($p->mensaje);
    $c->setIdusu($p->idusu);
    $c->setIdcli($p->idcli);
    $c->setNomusuario($p->nomusuario);
    $c->setFecha(date('Y-m-d'));
    $c->setHora(date('H:i:s'));
    $c->setArchivo($p->archivo);
    
    $res = $cDao->RegistrarChat($c);
    
    echo json_encode(array("estado"=>$res));
    
}

function vermensaje($idusu,$idcli){
    
    $cDao = new ChatDao();
    
    $res = $cDao->verMensaje($idusu,$idcli);
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}

function vermensajecliente($idcli,$idusu){
    
    $cDao = new ChatDao();
    
    $res = $cDao->verMensajeCliente($idcli,$idusu);
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}

function bandejaentrada($idusu,$nom){
    
    $cDao = new ChatDao();
    
    $res = $cDao->bandejaentrada($idusu,$nom);
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}

function bandejaentradacliente($idcli,$nombre) {
    
    $cDao = new ChatDao();
    
    $res = $cDao->bandejaentradacliente($idcli,$nombre);
    
    echo json_encode($res, JSON_PRETTY_PRINT);
}

function estadoVisto($idusu,$idcli){
    
    $c = new Chat();
    $cDao = new ChatDao();
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $c->setEstado("Visto");
    $c->setNomusuario($p->nomusuario);
    $res = $cDao->estadoVisto($c, $idusu, $idcli);
    
    echo json_encode(array("estado"=>$res));
    
}

function borrarchat($id,$user){
    
    $cDao = new ChatDao();

    $res = $cDao->borrarchatusuario($id,$user);

    echo json_encode(array("estado"=>$res));
    
}

function borrarchatcliente($id,$user){
    
    $cDao = new ChatDao();

    $res = $cDao->borrarchatcliente($id, $user);

    echo json_encode(array("estado"=>$res));
    
}

/*function contador($idusu){
    
    $cDao = new ChatDao();
    
    $res = $cDao->cantidadmensajes($idusu);
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}*/