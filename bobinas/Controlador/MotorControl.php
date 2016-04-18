<?php

$app->post('/motor','registrarmotor');
$app->get('/motor','tablamotores');
$app->get('/motorhistorial','tablahistorial');
$app->get('/tablamotor/:id','tablamotoresempleados');
$app->get('/vermotor/:id','motoresverdatos');
$app->get('/fechamotor/:id','obtenerfecha');
$app->get('/motor/:id','manterebobinados');
$app->get('/motores/:id','verdatosmotor');
$app->put('/motor','modificarmotores');
$app->put('/motores','cambiarestadomotor');
$app->put('/elimotor','eliminarmotor');

function tablahistorial(){
    
    $uMotor = new MotorDao();
    
    $res = $uMotor->TablaHistorial();
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}

function tablamotores(){
    
    /*$destinatario = "fandresroja@gmail.com";
    $asunto  = "Prueba";
    $mensaje = "Mensaje de prueba enviado desde un script PHP desde el servidor";
    $headers = 'From: openalfa@openalfa.com' . "\r\n" .
            'Reply-To: openalfa@openalfa.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
    mail($destinatario,$asunto,$mensaje,$headers);*/

    $uMotor = new MotorDao();
    
    $res = $uMotor->TablaMotores();
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}

function tablamotoresempleados($id){
    
    $uMotor = new MotorDao();
    
    $res = $uMotor->tablamotoresempleados($id);
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}

function motoresverdatos($id){
    
    $uMotor = new MotorDao();
    
    $res = $uMotor->motoresverdatos($id);
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}

function obtenerfecha($id){
    
    $uMotor = new MotorDao();
    
    $res = $uMotor->ObtenerFecha($id);
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}

function manterebobinados($id){
    
    $uMotor = new MotorDao();
    
    $res = $uMotor->ConsultarReboMante($id);
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}

function registrarmotor(){
    
    $m = new Motor();
    $mDao = new MotorDao();
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $m->setNum_serie_motor($p->Num_serie_motor);
    $m->setMarca($p->Marca);
    $m->setHp($p->Hp);
    $m->setKw($p->Kw);
    $m->setRpm($p->Rpm);
    $m->setN_fases($p->N_fases);
    $m->setAccion($p->Accion);
    $m->setRevicion($p->revicion);
    $m->setCotizado($p->Cotizado);
    $m->setAutorizado($p->Autorizado);
    $m->setFe_acord($p->Fe_acord);
    $m->setFe_term($p->Fe_term);
    $m->setId_usu($p->Id_usu);
    $m->setId_cliente($p->Id_cliente);
    $m->setEstado("Sin Terminar");
    $m->setEstado2("Activo");
    $m->setFoto($p->Foto);
    $m->setNs($p->Ns);
    
    $res = $mDao->RegistrarMotor($m);
    
    echo json_encode(array("estados"=>$res));
    
}

function verdatosmotor($id){
    
    $mDao = new MotorDao();
    
    $res = $mDao->VerDatosMotor($id);
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}

function modificarmotores(){
    $m = new Motor();
    $mDao = new MotorDao();
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $m->setMarca($p->Marca);
    $m->setHp($p->Hp);
    $m->setKw($p->Kw);
    $m->setRpm($p->Rpm);
    $m->setN_fases($p->N_fases);
    $m->setAccion($p->Accion);
    $m->setRevicion($p->revicion);
    $m->setCotizado($p->Cotizado);
    $m->setAutorizado($p->Autorizado);
    $m->setFe_acord($p->Fe_acord);
    $m->setFe_term($p->Fe_term);
    $m->setFoto($p->Foto);
    $m->setId_motores($p->Id_motores);
    $m->setId_usu($p->Id_usu);
    $m->setNs($p->Ns);
    
    $res = $mDao->ModificarMotores($m);
    
    echo json_encode(array("estados"=>$res));
}

function cambiarestadomotor(){
    
    $m = new Motor();
    $mDao = new MotorDao();
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $m->setEstado("Terminado");
    $m->setId_motores($p->Id_motores);
    $res = $mDao->CambiarEstadoMotor($m);
    
    echo json_encode(array("estados"=>$res));
    
}

function eliminarmotor(){
    
    $m = new Motor();
    $mDao = new MotorDao();
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $m->setEstado2("Inactivo");
    $m->setId_motores($p->Id_motores);
    
    $res = $mDao->EliminarMotor($m);
    
    echo json_encode(array("estado"=>$res));
    
}
