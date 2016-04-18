<?php

$app->post('/transformador','guardartransformador');
$app->put('/transformador','modificartransformador');
$app->get('/contador/:id','obtenercontador');
$app->get('/transformador','maxid');
$app->get('/transformador/all/:id','getalltransformador');
$app->get('/tablatrans','tablatransformadores');
$app->get('/transformador/tablatrab/:id','tablatransformadorempleados');
$app->get('/transformador/:idcli/:idtra','verdatostransformador');
$app->get('/transformador/:id','datostransfomador');
$app->put('/transformador/estado','cambiarestadotrans');
$app->put('/transformador/estado3','cambiarestado3trans');
$app->get('/transformadorverdatos/:id','datosdeeliminartransformador');
$app->put('/transformador/estado2','cambiarestadotranseliminado');
$app->get('/transformado/historial','tablatransformadoreshistorial');
$app->get('/transformado/reparacion','tablatransformadoresreparacion');


function guardartransformador(){
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $t = new Transformador();
    $tDao = new TransformadorDao();
    
    $t->setMarca_tran($p->Marca_tran);
    $t->setNplaca_tran($p->Nplaca_tran);
    $t->setKva_tran($p->Kva_tran);
    $t->setTp_tran($p->Tp_tran);
    $t->setTs_tran($p->Ts_tran);
    $t->setTipo_acc_tran($p->Tipo_acc_tran);
    $t->setFe_acor_tran($p->Fe_acor_tran);
    $t->setFe_ter_tran($p->Fe_ter_tran);
    $t->setEstado("Sin Terminar");
    $t->setFoto($p->Foto);
    $t->setIdClie_tran($p->IdClie_tran);
    $t->setIdusu_tran($p->Idusu_tran);
    $t->setNs($p->Ns);
    
    $res = $tDao->GuardarTrasnformador($t);
    
    echo json_encode(array("estado"=>$res));
    
}

function modificartransformador(){
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $t = new Transformador();
    $tDao = new TransformadorDao();
    
    $t->setMarca_tran($p->Marca_tran);
    $t->setNplaca_tran($p->Nplaca_tran);
    $t->setKva_tran($p->Kva_tran);
    $t->setTp_tran($p->Tp_tran);
    $t->setTs_tran($p->Ts_tran);
    $t->setTipo_acc_tran($p->Tipo_acc_tran);
    $t->setFe_acor_tran($p->Fe_acor_tran);
    $t->setFe_ter_tran($p->Fe_ter_tran);
    $t->setFoto($p->Foto);
    $t->setIdusu_tran($p->Idusu_tran);
    $t->setId_tran($p->Id_tran);
    $t->setNs($p->Ns);
    
    $res = $tDao->modificartransfirmador($t);
    
    echo json_encode(array("estado"=>$res));
    
}

function getalltransformador($id){
    
    $tDao = new TransformadorDao();
    
    $res = $tDao->getalltransformador($id);
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}

function obtenercontador($id){
    
    $tDao = new TransformadorDao();
    
    $res = $tDao->ObtenerContador($id);
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}

function maxid(){
    
    $tDao = new TransformadorDao();
    
    $res = $tDao->MaxId();
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}

function tablatransformadores(){
    
    $tDao = new TransformadorDao();
    
    $res = $tDao->TablaTransformadores();
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}

function tablatransformadorempleados($id){
    
    $tDao = new TransformadorDao();
    
    $res = $tDao->tablatransformadorempleados($id);
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}

function verdatostransformador($idcli,$idtra){
    
    $tDao = new TransformadorDao();
    
    $res = $tDao->VerDatostransformador($idcli, $idtra);
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}

function datostransfomador($id){
    
    $tDao = new TransformadorDao();
    
    $res = $tDao->DatosTransfomadorrebobinado($id);
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}

function cambiarestadotrans(){
    
    $tr = new Transformador();
    $tDao = new TransformadorDao();
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $tr->setEstado("Terminado");
    $tr->setId_tran($p->Id_tran);
    
    $res = $tDao->cambiarestadotrans($tr);
    
    echo json_encode(array("estado"=>$res));
    
}

function cambiarestado3trans(){
    
    $tr = new Transformador();
    $tDao = new TransformadorDao();
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    //$tr->setEstado("Terminado");
    $tr->setId_tran($p->Id_tran);
    
    $res = $tDao->cambiarestado3trans($tr);
    
    echo json_encode(array("estado"=>$res));
    
}

function datosdeeliminartransformador($id){
    
    
    $tDao = new TransformadorDao();
    
    $res = $tDao->datosdeeliminartransformador($id);
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}

function cambiarestadotranseliminado(){
    
    $tr = new Transformador();
    $tDao = new TransformadorDao();
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $tr->setEstado2("Inactivo");
    $tr->setId_tran($p->Id_tran);
    
    $res = $tDao->cambiarestadotranseliminado($tr);
    
    echo json_encode(array("estado"=>$res));
    
}

function tablatransformadoreshistorial(){
    
    $tDao = new TransformadorDao();
    
    $res = $tDao->TablaTransformadoreshistorial();
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}

function tablatransformadoresreparacion(){
    
    $tDao = new TransformadorDao();
    
    $res = $tDao->transformador_reparacion();
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}