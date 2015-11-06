<?php

$app->post('/estadoTransformador/:idTrans','guardarEstadoTrans');
$app->put('/estadoTransformador/:id','updateEstadoTrans');
$app->delete('/estadoTransformador/:id','deleteEstadoTrans');
$app->get('/estadoTransformador/:idtrans','listaEstadoTrans');



function guardarEstadoTrans($idTrans){
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $estaAce = new Estado_transformadorDAO();
    
    $res = $estaAce->insertar($p, $idTrans);
    
    echo json_encode(array("estado"=>$res));
    
}

function updateEstadoTrans($id){
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $estaAce = new Estado_transformadorDAO();
    
    $res = $estaAce->update($p, $id);
    
    echo json_encode(array("estado"=>$res));
    
}

function deleteEstadoTrans($id){
    
    $estaAce = new Estado_transformadorDAO();
    
    $res = $estaAce->delete($id);
    
    echo json_encode(array("estado"=>$res));
    
}

function listaEstadoTrans($idtrans){
    
    $estaAce = new Estado_transformadorDAO();
    
    $res = $estaAce->lista($idtrans);
    
    echo json_encode($res);
    
}
