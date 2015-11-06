<?php

$app->post('/cliente','registrarcliente');
$app->put('/cliente','modificarcliente');
$app->get('/cliente','maxidcliente');
$app->get('/cliente/:idcli/:idtra','verdatosclientes');
$app->get('/cliente/:id','consultardatos');
$app->get('/clientes/avanzada/:peticion','consultaavanzada');

function registrarcliente(){
    
    $c = new Clientes();
    $cDao = new ClienteDao();
    $bytes = openssl_random_pseudo_bytes(4,$cstrong );
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $c->setCedula($p->Cedula);
    $c->setNom_cliente($p->Nom_cliente);
    $c->setTelefono($p->Telefono);
    $c->setDireccion($p->Direccion);
    $c->setApellido($p->Apellido);
    $c->setFecha_ingre($p->Fecha_ingre);
    $c->setCiudad($p->Ciudad);
    $c->setSerial(bin2hex($bytes));
    $res = $cDao->RegistrarCliente($c);
    
    echo json_encode(array("estados"=>$res));
    
    if($res==1){
        $maxId = $cDao->MaxId();
    
        $us = new Usuario();
        $usuDao = new UsuarioDao();

        $us->setCedula($p->Cedula);
        $us->setNom_usu($p->Nom_cliente." ".$p->Apellido);
        $us->setUsuario($p->Cedula);
        $us->setTelefono($p->Telefono);
        $us->setPass(bin2hex($bytes));
        $us->setFoto("fotos_perfil.jpg");
        $us->setEmail("null");
        $us->setEstado("Activo");
        $us->setIdcliente($maxId->getId_cliente());
        $us->setId_tp_usu('7');

        $usuDao->AgregarUsuario($us);
    }
    
    
    
}
/*
 * Controlador de modificar datos en 
 * clienteDao
 */
function modificarcliente(){
    
    $c = new Clientes();
    $cDao = new ClienteDao();
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $c->setId_cliente($p->Id_cliente);
    $c->setNom_cliente($p->Nom_cliente);
    $c->setTelefono($p->Telefono);
    $c->setDireccion($p->Direccion);
    $c->setCiudad($p->Ciudad);
    $c->setFecha_ingre($p->Fecha_ingre);
    $c->setApellido($p->Apellido);
    
    $res = $cDao->ModificarCliente($c);
    
    echo json_encode(array("estados"=>$res));
    
}

function maxidcliente(){
    
    $cDao = new ClienteDao();
    
    $res = $cDao->MaxIdCliente();
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}

function verdatosclientes($idcli,$idtra){
    
    $cDao = new ClienteDao();
    
    $res = $cDao->VerDatosClientes($idcli, $idtra);
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}

function consultardatos($id){
    
    $cDao = new ClienteDao();
    
    $res = $cDao->ConsultarDatos($id);
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}

function consultaavanzada($peticion){
    
    $cDao = new ClienteDao();
    
    $res = $cDao->buscarCliente($peticion);
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}