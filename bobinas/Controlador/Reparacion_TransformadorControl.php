<?php

$app->post('/reparacion','guardarreparacion');
$app->put('/reparacion','modificareparacion');
$app->put('/reparacion/primaria','actualizarreparacionprimaria');
$app->put('/reparacion/secundaria','actualizarreparacionsecundaria');
$app->post('/reparacion2','guardarreparacion2');
$app->get('/reparacion/:id','tablareparacion');
$app->get('/reparacion2/:id','tiporeparacion');
$app->get('/reparacion/estado/:id1/:id2','reparacionterminado');
$app->get('/reparacion/datos/:id','reparacionTrans');
$app->get('/reparacion/cambiar/:id','cambiar');
$app->get('/repa/primario','getAllprimario');


function guardarreparacion(){
    
    $re = new Reparacion_Transformador();
    $rDao = new Reparacion_TransformadorDao();
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $re->setLargo_repa($p->Largo_repa);
    $re->setAncho_repa($p->Ancho_repa);
    $re->setAltu_repa($p->Altu_repa);
    $re->setRefri_repa($p->Refri_repa);
    $re->setBisel_repa($p->Bisel_repa);
    $re->setFibra_repa($p->Fibra_repa);
    $re->setCali_repa($p->Cali_repa);
    $re->setOtros_repa($p->Otros_repa);
    $re->setNsecuencia($p->Nsecuencia);
    $re->setPotencia($p->Potencia);
    $re->setVprimario($p->Vprimario);
    $re->setVsegundario($p->Vsegundario);
    $re->setEstado("Sin Terminar");
    $re->setIdtran_repa($p->Idtran_repa);
    
    $res = $rDao->GuardarReparacion($re,$re->setTipo("Primaria"));
    
    echo json_encode(array("estado"=>$res));
    
}

function actualizarreparacionprimaria(){
    
    $re = new Reparacion_Transformador();
    $rDao = new Reparacion_TransformadorDao();
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $re->setLargo_repa($p->Largo_repa);
    $re->setAncho_repa($p->Ancho_repa);
    $re->setAltu_repa($p->Altu_repa);
    $re->setRefri_repa($p->Refri_repa);
    $re->setBisel_repa($p->Bisel_repa);
    $re->setFibra_repa($p->Fibra_repa);
    $re->setCali_repa($p->Cali_repa);
    $re->setOtros_repa($p->Otros_repa);
    $re->setNsecuencia($p->Nsecuencia);
    $re->setPotencia($p->Potencia);
    $re->setVprimario($p->Vprimario);
    $re->setVsegundario($p->Vsegundario);
    $re->setId_repa($p->Id_repa);
    
    $res = $rDao->ActualizarReparacionprimaria($re);
    
    echo json_encode(array("estado"=>$res));
    
}

function modificareparacion(){
    
    $re = new Reparacion_Transformador();
    $rDao = new Reparacion_TransformadorDao();
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $re->setEstado("Terminado");
    $re->setId_repa($p->Id_repa);
    $res = $rDao->modificareparacion($re);
    
    echo json_encode(array("estado"=>$res));
}

function guardarreparacion2(){
    
    $re = new Reparacion_Transformador();
    $rDao = new Reparacion_TransformadorDao();
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $re->setLargo_repa($p->Largo_repa);
    $re->setAncho_repa($p->Ancho_repa);
    $re->setRefri_repa($p->Refri_repa);
    $re->setTipo_conductor($p->Tipo_conductor);
    $re->setBisel_repa($p->Bisel_repa);
    $re->setN2($p->N2); 
    $re->setFibra_repa($p->Fibra_repa);
    $re->setBobinas($p->Bobinas);
    $re->setOtros_repa($p->Otros_repa);
    $re->setNsecuencia($p->Nsecuencia);
    $re->setPotencia($p->Potencia);
    $re->setVprimario($p->Vprimario);
    $re->setVsegundario($p->Vsegundario);
    $re->setEstado("Sin Terminar");
    $re->setIdtran_repa($p->Idtran_repa);
    
    $res = $rDao->GuardarReparacion2($re,$re->setTipo("Secundaria"));
    
    echo json_encode(array("estado"=>$res));
    
}

function actualizarreparacionsecundaria(){
    
    $re = new Reparacion_Transformador();
    $rDao = new Reparacion_TransformadorDao();
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $re->setLargo_repa($p->Largo_repa);
    $re->setAncho_repa($p->Ancho_repa);
    $re->setRefri_repa($p->Refri_repa);
    $re->setTipo_conductor($p->Tipo_conductor);
    $re->setBisel_repa($p->Bisel_repa);
    $re->setN2($p->N2); 
    $re->setFibra_repa($p->Fibra_repa);
    $re->setBobinas($p->Bobinas);
    $re->setOtros_repa($p->Otros_repa);
    $re->setNsecuencia($p->Nsecuencia);
    $re->setPotencia($p->Potencia);
    $re->setVprimario($p->Vprimario);
    $re->setVsegundario($p->Vsegundario);
    $re->setId_repa($p->Id_repa);
    
    $res = $rDao->ActualizarReparacionsecundaria($re);
    
    echo json_encode(array("estado"=>$res));
    
}

function tablareparacion($id){
    
    $rDao = new Reparacion_TransformadorDao();
    
    $res = $rDao->TablaRepacion($id);
    
    echo json_encode($res,JSON_PRETTY_PRINT);
    
}

function tiporeparacion($id){
    
    $rDao = new Reparacion_TransformadorDao();
    
    $res = $rDao->tiporeparacion($id);
    
    echo json_encode($res,JSON_PRETTY_PRINT);
    
}

function reparacionterminado($id1,$id2){
    
    $rDao = new Reparacion_TransformadorDao();
    
    $res = $rDao->reparacionterminado($id1, $id2);
    
    echo json_encode($res,JSON_PRETTY_PRINT);
    
}

function reparacionTrans($id){
    
    $rDao = new Reparacion_TransformadorDao();
    
    $res = $rDao->Datosreparacion($id);
    
    echo json_encode($res,JSON_PRETTY_PRINT);
    
}

function cambiar($id){
    
    $rDao = new Reparacion_TransformadorDao();
    
    $res = $rDao->estadoTerminado($id);
    
    echo json_encode($res,JSON_PRETTY_PRINT);
}

function getAllprimario(){
    
    $rDao = new Reparacion_TransformadorDao();
    
    $res = $rDao->primarios();
    
    echo json_encode($res,JSON_PRETTY_PRINT);
    
}