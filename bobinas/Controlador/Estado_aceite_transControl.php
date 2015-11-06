<?php

$app->post('/estadoAceiteTransformador/:idTrans','guardarEstadoAceiteTrans');
$app->put('/estadoAceiteTransformador/:id','updateEstadoAceiteTrans');
$app->delete('/estadoAceiteTransformador/:id','deleteEstadoAceiteTrans');
$app->get('/estadoAceiteTransformador/:idtrans','listaEstadoAceiteTrans');
$app->put('/estadoAceiteTransformador/estado/:id','cambiarestado');

function guardarEstadoAceiteTrans($idTrans){
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $estaAce = new Estado_aceite_transDAO();
    
    $res = $estaAce->insertar($p, $idTrans);
    
    echo json_encode(array("estado"=>$res));
    
}

function updateEstadoAceiteTrans($id){
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $estaAce = new Estado_aceite_transDAO();
    
    $res = $estaAce->update($p, $id);
    
    echo json_encode(array("estado"=>$res));
    
}

function deleteEstadoAceiteTrans($id){
    
    $estaAce = new Estado_aceite_transDAO();
    
    $res = $estaAce->delete($id);
    
    echo json_encode(array("estado"=>$res));
    
}

function listaEstadoAceiteTrans($idtrans){
    
    $estaAce = new Estado_aceite_transDAO();
    
    $res = $estaAce->lista($idtrans);
    
    echo json_encode($res);
    
}

function cambiarestado($id){
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $estaAce = new Estado_aceite_transDAO();
    
    $res = $estaAce->cambiarestado($id);
    
    echo json_encode(array("estado"=>$res));
    
}