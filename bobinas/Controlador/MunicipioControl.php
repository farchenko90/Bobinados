<?php

$app->get('/municipio/:id','municipios');
$app->get('/municipios','todomunicipio');
$app->post('/municipio','registrarmunicipio');

function municipios($id){
    
    $rDao = new MunicipioDao();
    
    $res = $rDao->listamunicipios($id);
    
    echo json_encode($res,JSON_PRETTY_PRINT);
    
}

function todomunicipio(){
    
    $rDao = new MunicipioDao();
    
    $res = $rDao->Allmunicipios();
    
    echo json_encode($res,JSON_PRETTY_PRINT);
    
}

function registrarmunicipio(){
    
    $marca = new Municipio();
    $marDao = new MunicipioDao();
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $marca->setNombreMunicipio($p->nombreMunicipio);
    $marca->setDepartamento_iddepartamento($p->departamento_iddepartamento);
    $res = $marDao->registrarmunicipio($marca);
    echo json_encode(array("estado"=>$res));
    
}

