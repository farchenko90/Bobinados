<?php

$app->post('/mantenimiento','registrarmantenimiento');
$app->get('/mantenimiento/:num','verestadomantenimiento');
$app->put('/mantenimiento','actualizarmantenimiento');

function registrarmantenimiento(){
    
    $man = new MantenimientoMotor();
    $mDao = new MantenimientoMotorDao();
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $man->setId_motor($p->Id_motor);
    $man->setId_usuario($p->Id_usuario);
    $man->setAmp($p->Amp);
    $man->setVoltios($p->Voltios);
    $man->setBalineras($p->Balineras);
    $man->setSello_mecanico($p->Sello_mecanico);
    $man->setCap_arranque($p->Cap_arranque);
    $man->setCap_marcha($p->Cap_marcha);
    $man->setOtros($p->otros);
    $man->setP_finales($p->P_finales);
    $man->setObservaciones($p->Observaciones);
    
    $res = $mDao->RegistrarMantenimiento($man);
    
    echo json_encode(array("estados"=>$res));
    
}

function actualizarmantenimiento(){
    
    $man = new MantenimientoMotor();
    $mDao = new MantenimientoMotorDao();
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $man->setAmp($p->Amp);
    $man->setVoltios($p->Voltios);
    $man->setBalineras($p->Balineras);
    $man->setSello_mecanico($p->Sello_mecanico);
    $man->setCap_arranque($p->Cap_arranque);
    $man->setCap_marcha($p->Cap_marcha);
    $man->setOtros($p->otros);
    $man->setP_finales($p->P_finales);
    $man->setObservaciones($p->Observaciones);
    $man->setId_motor($p->Id_motor);
    
    $res = $mDao->ActualizarMantenimiento($man);
    
    echo json_encode(array("estados"=>$res));
    
}

function verestadomantenimiento($num){
    
    $mDao = new MantenimientoMotorDao();
    
    $res = $mDao->VerEstadoMantenimiento($num);
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}