<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$app->post('/marcatrans','registrarmarcatran');
$app->get('/marcatrans','listamarcastrnas');
$app->get('/marcatrans/:id','getByIdtran');
$app->put('/updatemarcatran/:id','updatemarcatrans');
$app->delete('/borrarmarcatran/:id','deletemarcatran');

function registrarmarcatran(){
    
    $marca = new Marcatrans();
    $marDao = new MarcatransDao();
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $marca->setNombre($p->Nombre);
    $res = $marDao->registrarmarcatrans($marca);
    echo json_encode(array("estado"=>$res));
    
}

function listamarcastrnas(){
    $rDao = new MarcatransDao();
    
    $res = $rDao->listamarcastrans();
    
    echo json_encode($res,JSON_PRETTY_PRINT);
}

function getByIdtran($id){
    $rDao = new MarcatransDao();
    
    $res = $rDao->getbyidtrans($id);
    
    echo json_encode($res,JSON_PRETTY_PRINT);
}

function updatemarcatrans($id){
    
    $marca = new Marcatrans();
    $marDao = new MarcatransDao();
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $marca->setNombre($p->nombre);
    $res = $marDao->updatetrans($id, $marca);
    
    echo json_encode(array("estado"=>$res));
    
}

function deletemarcatran($id){
    
    $cDao = new MarcatransDao();

    $res = $cDao->deletemarca($id);

    echo json_encode(array("estado"=>$res));
    
}