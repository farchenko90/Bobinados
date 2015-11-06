<?php
$app->post('/usuario','iniciosesion');
$app->put('/usuario','editarcuenta');
$app->get('/usuario/:id','consultacuenta');
$app->get('/user','consultacuentatabla');
$app->get('/user/cliente/:id','consultaclientestabla');
$app->post('/user','agregarusuario');
$app->get('/user/:id','consultardatosusuario');
$app->get('/user/cliente/:id','consultardatoscliente');
$app->put('/user','editarperfil');
$app->get('/usuario','cargadatosselect');
$app->get('/responsable','encargaradminresponsable');
$app->get('/encargadotra','encargartransresponsable');
$app->get('/encargadotra/:id','cargartransresponsable');
$app->put('/cambiar','eliminarusuario');
$app->get('/user/chatcli/:id','chatcliente');
$app->get('/user/chatusuario/:id','chatusuario');
$app->get('/tablauser/chattablauser','tablausuario');
$app->get('/empleadosmotor','empleadomotores');
$app->get('/empleadostrans','empleadotrans');
$app->put('/cambiartipo','cambiartipo');

/*
 * Controlador del inicio sesion del
 * UsuarioDao 
 */
function iniciosesion(){
    
    $uDao = new UsuarioDao();
    $user = new Usuario();
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $user->setUsuario($p->Usuario);
    $user->setPass($p->Pass);
    
    $res = $uDao->IniciarSesion($user);
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}
/*
 * Controlador de editar cuenta de perfil
 * del UsuarioDao
 */
function editarcuenta(){
    
    $uDao = new UsuarioDao();
    $user = new Usuario();
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $user->setNom_usu($p->Nom_usu);
    $user->setUsuario($p->Usuario);
    $user->setEmail($p->Email);
    $user->setPass($p->Pass);
    $user->setFoto($p->Foto);
    $user->setId_usu($p->Id_usu);
    
    $res = $uDao->EditarCuenta($user);
    
    echo json_encode(array("estado"=>$res));
    
}
/*
 * Controlador de consulta perfil
 * del usuarioDao
 */
function consultacuenta($id){
    
    $uDao = new UsuarioDao();
    
    $res = $uDao->ConsultarCuenta($id);
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}
/*
 * Controlador de agregar un usuario 
 * del usuarioDao
 */
function agregarusuario(){
    
    $uDao = new UsuarioDao();
    $user = new Usuario();
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $user->setNom_usu($p->Nom_usu);
    $user->setUsuario($p->Usuario);
    $user->setCedula($p->Cedula);
    $user->setTelefono($p->Telefono);
    $user->setEmail($p->Email);
    $user->setPass($p->Pass);
    $user->setFoto($p->Foto);
    $user->setEstado("Activo");
    $user->setIdcliente("null");
    $user->setId_tp_usu($p->Id_tp_usu);
    
    $res = $uDao->AgregarUsuario($user);
    
    echo json_encode(array("estados"=>$res));
    
}

/*
 * Controlador de consulta perfil para la tabla
 * del usuarioDao
 */
function consultacuentatabla(){
    
    $uDao = new UsuarioDao();
    
    $res = $uDao->ConsultarCuentaTabla();
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}

function consultaclientestabla($id){
    
    $uDao = new UsuarioDao();
    
    $res = $uDao->verClientes($id);
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}

/*
 * Controlador de consultar datos del usuario
 * del modelo usuariodao
 */
function consultardatosusuario($id){
    
    $uDao = new UsuarioDao();
    
    $res = $uDao->ConsultarDatosUsuario($id);
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}
/*
 * Controlador de editar usuario
 * del UsuarioDao
 */
function editarperfil(){
    
    $uDao = new UsuarioDao();
    $user = new Usuario();
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $user->setNom_usu($p->Nom_usu);
    $user->setEmail($p->Email);
    $user->setTelefono($p->Telefono);
    $user->setPass($p->Pass);
    $user->setId_tp_usu($p->Id_tp_usu);
    $user->setId_usu($p->Id_usu);
    
    $res = $uDao->EditarPerfil($user);
    
    echo json_encode(array("estado"=>$res));
    
}

function cargadatosselect(){
    
    $uDao = new UsuarioDao();
    
    $res = $uDao->CargaDatosSelect();
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}
/*
 * encargar jefe de motores o empleado motores responsable 
 */
function encargaradminresponsable(){
    
    $uDao = new UsuarioDao();
    
    $res = $uDao->EncargarMotorResponsable();
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}

/*
 * encargar jefe de motores o empleado motores responsable 
 */
function encargartransresponsable(){
    
    $uDao = new UsuarioDao();
    
    $res = $uDao->EncargarTransResponsable();
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}

function cargartransresponsable($id){
    
    $uDao = new UsuarioDao();
    
    $res = $uDao->CargarTransResponsable($id);
    
    echo json_encode($res,JSON_PRETTY_PRINT);
    
}
/*
 * cambiar estado del responsable porque ya no existe 
 * en la tabla
 */
function eliminarusuario(){
    
    $user = new Usuario();
    $uDao = new UsuarioDao();
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
    $user->setEstado("Inactivo");
    $user->setId_usu($p->Id_usu);
    
    $res = $uDao->EliminarUsuario($user);
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}

function chatcliente($id){
    
    $uDao = new UsuarioDao();
    
    $res = $uDao->chatcliente($id);
    
    echo json_encode($res,JSON_PRETTY_PRINT);
    
}

function chatusuario($id){
    
    $uDao = new UsuarioDao();
    
    $res = $uDao->chatusuario($id);
    
    echo json_encode($res,JSON_PRETTY_PRINT);
    
}

function tablausuario(){
    
    $uDao = new UsuarioDao();
    
    $res = $uDao->ConsultarCuentausuariosistema();
    
    echo json_encode($res,JSON_PRETTY_PRINT);
    
}

function consultardatoscliente($id){
    
    $uDao = new UsuarioDao();
    
    $res = $uDao->ConsultarDatosCliente($id);
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}

function empleadomotores(){
    
    $uDao = new UsuarioDao();
    
    $res = $uDao->empleadomotores();
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}

function empleadotrans(){
    
    $uDao = new UsuarioDao();
    
    $res = $uDao->empleadotransformado();
    
    echo json_encode($res, JSON_PRETTY_PRINT);
    
}

function cambiartipo() {
    
    $uDao = new UsuarioDao();
    $user = new Usuario();
    
    $r = \Slim\Slim::getInstance()->request(); //pedimos a Slim que nos mande el request
    $p = json_decode($r->getBody()); //como el request esta en json lo decodificamos
    
        
    $user->setTipo("Asignado");
    $user->setId_usu($p->Id_usu);

    $res = $uDao->cambiartipo($user);
        
    
    
    
    echo json_encode(array("estado"=>$res));
    
}