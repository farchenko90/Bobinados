<?php

$app->post('/bobinapri','guardarbobinapri');
$app->put('/bobinaprimaria','actualizarbobina');
$app->get('/bobinapri/:id','tablabobinadoprimario');
$app->get('/bobinaprimario/:id','getbobinaprimario');

function guardarbobinapri(){
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $bo = new BobinadoPrimario();
    $bDao = new BobinadoPrimarioDao();
    
    $bo->setCalibrealambre($p->Calibrealambre);
    $bo->setEspiracapa($p->Espiracapa);
    $bo->setTipo($p->Tipo);
    $bo->setAislamiento($p->Aislamiento);
    $bo->setRefrigeracion($p->Refrigeracion);
    $bo->setCalibrefibra($p->Calibrefibra);
    $bo->setBisel($p->Bisel);
    $bo->setLargo($p->Largo);
    $bo->setAncho($p->Ancho);
    $bo->setAltura($p->Altura);
    $bo->setN2($p->N2);
    $bo->setEspirototal($p->Espirototal);
    $bo->setTap($p->Tap);
    $bo->setEstado("Terminado");
    $bo->setIdrepa($p->Idrepa);
    
    $res = $bDao->GuardarBobinaPri($bo);
    
    echo json_encode(array("estado"=>$res));
    
}

function actualizarbobina(){
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $bo = new BobinadoPrimario();
    $bDao = new BobinadoPrimarioDao();
    
    $bo->setCalibrealambre($p->Calibrealambre);
    $bo->setEspiracapa($p->Espiracapa);
    $bo->setTipo($p->Tipo);
    $bo->setAislamiento($p->Aislamiento);
    $bo->setRefrigeracion($p->Refrigeracion);
    $bo->setCalibrefibra($p->Calibrefibra);
    $bo->setBisel($p->Bisel);
    $bo->setLargo($p->Largo);
    $bo->setAncho($p->Ancho);
    $bo->setAltura($p->Altura);
    $bo->setN2($p->N2);
    $bo->setEspirototal($p->Espirototal);
    $bo->setTap($p->Tap);
    $bo->setId($p->Id);
    
    $res = $bDao->ActualizarBobinaPri($bo);
    
    echo json_encode(array("estado"=>$res));
    
}

function tablabobinadoprimario($id){
    
    $bDao = new BobinadoPrimarioDao(); 
    
    $res = $bDao->Tablabobinadoprimario($id);
    
    echo json_encode($res,JSON_PRETTY_PRINT);
    
}

function getbobinaprimario($id){
    
    $bDao = new BobinadoPrimarioDao(); 
    
    $res = $bDao->getbobinaprimario($id);
    
    echo json_encode($res,JSON_PRETTY_PRINT);
    
}
