<?php

$app->post('/trifasico','registrartrifasico');
$app->put('/trifasico','modificarbobinadostrifasico');
$app->get('/trifasico/:id','getAllId');

function registrartrifasico(){
    
    $m = new RebobinadoTrifasico();
    $mDao = new RebobinadoTrifasicoDao();
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $m->setLargo($p->largo);
    $m->setSello($p->sello);
    $m->setPaso($p->paso);
    $m->setRetenedor($p->retenedor);
    $m->setEspira($p->espira);
    $m->setBalinera($p->balinera);
    $m->setCalibre($p->calibre);
    $m->setPeso_bobina($p->peso_bobina);
    $m->setPeso_total($p->peso_total);
    $m->setFibra($p->fibra);
    $m->setNum_ranura($p->num_ranura);
    $m->setNum_bobina($p->num_bobina);
    $m->setNum_bobina_grupo($p->num_bobina_grupo);
    $m->setObservacion($p->observacion);
    $m->setSugerencia($p->sugerencia);
    $m->setId_motor($p->id_motor);
    $m->setId_usuario($p->id_usuario);
    
    
    
    $res = $mDao->RegistrarRebobinado($m);
    
    echo json_encode(array("estados"=>$res));
    
}

function modificarbobinadostrifasico(){
    
    $m = new RebobinadoTrifasico();
    $mDao = new RebobinadoTrifasicoDao();
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $m->setLargo($p->largo);
    $m->setSello($p->sello);
    $m->setPaso($p->paso);
    $m->setRetenedor($p->retenedor);
    $m->setEspira($p->espira);
    $m->setBalinera($p->balinera);
    $m->setCalibre($p->calibre);
    $m->setPeso_bobina($p->peso_bobina);
    $m->setPeso_total($p->peso_total);
    $m->setFibra($p->fibra);
    $m->setNum_ranura($p->num_ranura);
    $m->setNum_bobina($p->num_bobina);
    $m->setNum_bobina_grupo($p->num_bobina_grupo);
    $m->setObservacion($p->observacion);
    $m->setSugerencia($p->sugerencia);
    $m->setId_motor($p->id_motor);
    
    $res = $mDao->ActualizarRebobinado($m);
    
    echo json_encode(array("estado"=>$res));
    
}

function getAllId($id){
    
    $mDao = new RebobinadoTrifasicoDao();
    
    $res = $mDao->getAll($id);
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}