<?php

$app->post('/marca','registrarmarca');
$app->get('/marca','listamarcas');

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