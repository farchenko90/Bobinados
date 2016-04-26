<?php

$app->post('/marca','registrarmarca');
$app->get('/marca','listamarcas');
$app->get('/marca/:id','getById');
$app->put('/updatemarca/:id','updatemarca');
$app->delete('/borrarmarca/:id','deletemarca');

function registrarmarca(){
    
    $marca = new Marcamotor();
    $marDao = new MarcamotorDao();
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $marca->setNombre($p->Nombre);
    $res = $marDao->registrar($marca);
    echo json_encode(array("estado"=>$res));
    
}

function listamarcas(){
    $rDao = new MarcamotorDao();
    
    $res = $rDao->listamarcas();
    
    echo json_encode($res,JSON_PRETTY_PRINT);
}

function getById($id){
    $rDao = new MarcamotorDao();
    
    $res = $rDao->getbyid($id);
    
    echo json_encode($res,JSON_PRETTY_PRINT);
}

function updatemarca($id){
    
    $marca = new Marcamotor();
    $marDao = new MarcamotorDao();
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $marca->setNombre($p->nombre);
    $res = $marDao->update($id, $marca);
    
    echo json_encode(array("estado"=>$res));
    
}

function deletemarca($id){
    
    $cDao = new MarcamotorDao();

    $res = $cDao->deletemarca($id);

    echo json_encode(array("estado"=>$res));
    
}