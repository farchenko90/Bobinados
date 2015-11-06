<?php

$app->post('/secundario','guardarsecundario');
$app->get('/secundario/:id','tablabobinadosecundario');
$app->get('/bobinasecundario/:id','getbobinasegundario');
$app->put('/bobinasegundaria','actualizarsegundaria');

function guardarsecundario(){
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $bo = new BobinadoSegundario();
    $bDao = new BobinadoSegundarioDao();
    
    $bo->setTipoconductor($p->Tipoconductor);
    $bo->setMedidasconductor($p->Medidasconductor);
    $bo->setCapas($p->Capas);
    $bo->setEspiracapas($p->Espiracapas);
    $bo->setBobinas($p->Bobinas);
    $bo->setN2($p->N2);
    $bo->setAislamientocapa($p->Aislamientocapa);
    $bo->setRefrigeracion($p->Refrigeracion);
    $bo->setCalibrefibra($p->Calibrefibra);
    $bo->setBisel($p->Bisel);
    $bo->setObservacion($p->Observacion);
    $bo->setEstado("Terminado");
    $bo->setIdrepa($p->Idrepa);
    
    $res = $bDao->GuardarSecundario($bo);
    
    echo json_encode(array("estado"=>$res));
    
}

function actualizarsegundaria(){
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $bo = new BobinadoSegundario();
    $bDao = new BobinadoSegundarioDao();
    
    $bo->setTipoconductor($p->Tipoconductor);
    $bo->setMedidasconductor($p->Medidasconductor);
    $bo->setCapas($p->Capas);
    $bo->setEspiracapas($p->Espiracapas);
    $bo->setBobinas($p->Bobinas);
    $bo->setN2($p->N2);
    $bo->setAislamientocapa($p->Aislamientocapa);
    $bo->setRefrigeracion($p->Refrigeracion);
    $bo->setCalibrefibra($p->Calibrefibra);
    $bo->setBisel($p->Bisel);
    $bo->setObservacion($p->Observacion);
    $bo->setId($p->Id);
    
    $res = $bDao->ActualizarSecundario($bo);
    
    echo json_encode(array("estado"=>$res));
    
}


function tablabobinadosecundario($id){
    
    $bDao = new BobinadoSegundarioDao(); 
    
    $res = $bDao->Tablabobinadosecundario($id);
    
    echo json_encode($res,JSON_PRETTY_PRINT);
    
}

function getbobinasegundario($id){
    
    $bDao = new BobinadoSegundarioDao(); 
    
    $res = $bDao->getbobinasegundario($id);
    
    echo json_encode($res,JSON_PRETTY_PRINT);
    
}