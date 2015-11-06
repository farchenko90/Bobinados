<?php
$app->post('/rebobinado','guardarrebobinados');
$app->get('/rebobinado/:num','verestadorebobinado');
$app->put('/rebobinado','modificarbobinados');

function guardarrebobinados(){
    
    $re = new Rebobinado();
    $rDao = new RebobinadoDao();
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $re->setId_motor($p->Id_motor);
    $re->setId_usuario($p->Id_usuario);
    $re->setV($p->V);
    $re->setAm($p->Am);
    $re->setBalinera_ref($p->Balinera_ref);
    $re->setCap_marcha($p->Cap_marcha);
    $re->setLargo($p->Largo);
    $re->setConexiones($p->Conexiones);
    $re->setCap_arranque($p->Cap_arranque);
    $re->setSello_mecanico($p->Sello_mecanico);
    $re->setArr_paso($p->Arr_paso);
    $re->setArr_espiras($p->Arr_espiras);
    $re->setArr_calibre($p->Arr_calibre);
    $re->setArr_peso_por_bobina($p->Arr_peso_por_bobina);
    $re->setMar_paso($p->Mar_paso);
    $re->setMar_espira($p->Mar_espira);
    $re->setMar_calibre($p->Mar_calibre);
    $re->setMar_peso_por_bobina($p->Mar_peso_por_bobina);
    $re->setNum_ranura($p->Num_ranura);
    $re->setObservaciones($p->Observaciones);
    $re->setSugerencia($p->Sugerencia);
    
    $res = $rDao->GuardarRebobinados($re);
    
    echo json_encode(array("estados"=>$res));
    
}

function modificarbobinados(){
    
    $re = new Rebobinado();
    $rDao = new RebobinadoDao();
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $re->setV($p->V);
    $re->setAm($p->Am);
    $re->setBalinera_ref($p->Balinera_ref);
    $re->setCap_marcha($p->Cap_marcha);
    $re->setLargo($p->Largo);
    $re->setConexiones($p->Conexiones);
    $re->setCap_arranque($p->Cap_arranque);
    $re->setSello_mecanico($p->Sello_mecanico);
    $re->setArr_paso($p->Arr_paso);
    $re->setArr_espiras($p->Arr_espiras);
    $re->setArr_calibre($p->Arr_calibre);
    $re->setArr_peso_por_bobina($p->Arr_peso_por_bobina);
    $re->setMar_paso($p->Mar_paso);
    $re->setMar_espira($p->Mar_espira);
    $re->setMar_calibre($p->Mar_calibre);
    $re->setMar_peso_por_bobina($p->Mar_peso_por_bobina);
    $re->setNum_ranura($p->Num_ranura);
    $re->setObservaciones($p->Observaciones);
    $re->setSugerencia($p->Sugerencia);
    $re->setId_motor($p->Id_motor);
    
    $res = $rDao->ActualizarRebobinados($re);
    
    echo json_encode(array("estados"=>$res));
    
}

function verestadorebobinado($num){
    
    $rDao = new RebobinadoDao();
    
    $res = $rDao->VerEstadoRebobinado($num);
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}


