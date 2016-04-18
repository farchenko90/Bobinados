<?php

$app->get('/municipio/:id','municipios');

function municipios($id){
    
    $rDao = new MunicipioDao();
    
    $res = $rDao->listamunicipios($id);
    
    echo json_encode($res,JSON_PRETTY_PRINT);
    
}

