<?php

$app->post('/asiganarempleado','Asiganarempleado');
$app->get('/empleadosasignado/:id','mostrarempleadoasignados');

function Asiganarempleado(){
    
    $uDao = new TrabajadoresAsignadosDao();
    $user = new TrabajdoresAsignados();
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $user->setIdjefe($p->Idjefe);
    $user->setIdempleado($p->Idempleado);

    $res = $uDao->registrarasignados($user);
    
    
    
    echo json_encode(array("estados"=>$res));
    
}

function mostrarempleadoasignados($id){
    
    $uDao = new TrabajadoresAsignadosDao();
    
    $res = $uDao->mostrarempleadoasignados($id);
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}

