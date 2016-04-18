<?php

$app->get('/departamento','departamentos');

function departamentos(){
    
    $rDao = new DepartamentoDao();
    
    $res = $rDao->listadepartamentos();
    
    echo json_encode($res,JSON_PRETTY_PRINT);
    
}