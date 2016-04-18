<?php

    include_once 'Slim/Slim.php';

    \Slim\Slim::registerAutoloader();
    $app = new \Slim\Slim();

    include_once 'Conexion/conexion.php';

    include_once 'Modelos/Usuario.php';
    include_once 'Modelos/Clientes.php';
    include_once 'Modelos/Motor.php';
    include_once 'Modelos/MantenimientoMotor.php';
    include_once 'Modelos/Rebobinado.php';
    include_once 'Modelos/Transformador.php';
    include_once 'Modelos/Lista_verificacion.php';
    include_once 'Modelos/Reparacion_Transformador.php';
    include_once 'Modelos/BobinadoPrimario.php';
    include_once 'Modelos/BobinadoSegundario.php';
    include_once 'Modelos/Prueba_ini_transformador.php';
    include_once 'Modelos/Chat.php';
    include_once 'Modelos/ChatUser.php';
    include_once 'Modelos/TrabajdoresAsignados.php';
    include_once 'Modelos/RebobinadoTrifasico.php';
    include_once 'Modelos/Marcamotor.php';
    include_once 'Modelos/Marcatrans.php';
    include_once 'Modelos/Departamento.php';
    include_once 'Modelos/Municipio.php';
    
    include_once 'Modelos/UsuarioDao.php';
    include_once 'Modelos/ClienteDao.php';
    include_once 'Modelos/MotorDao.php';
    include_once 'Modelos/MantenimientoMotorDao.php';
    include_once 'Modelos/RebobinadoDao.php';
    include_once 'Modelos/TransformadorDao.php';
    include_once 'Modelos/Lista_verificacionDao.php';
    include_once 'Modelos/Reparacion_TransformadorDao.php';
    include_once 'Modelos/BobinadoPrimarioDao.php';
    include_once 'Modelos/BobinadoSegundarioDao.php';
    include_once 'Modelos/Prueba_ini_transformadorDao.php';
    include_once 'Modelos/Estado_aceite_transDAO.php';
    include_once 'Modelos/Estado_transformadorDAO.php';
    include_once 'Modelos/ChatDao.php';
    include_once 'Modelos/ChatUserDao.php';
    include_once 'Modelos/TrabajadoresAsignadosDao.php';
    include_once 'Modelos/RebobinadoTrifasicoDao.php';
    include_once 'Modelos/MarcamotorDao.php';
    include_once 'Modelos/MarcatransDao.php';
    include_once 'Modelos/DepartamentoDao.php';
    include_once 'Modelos/MunicipioDao.php';
    
    include_once 'Controlador/UsuarioControl.php';
    include_once 'Controlador/ClienteControl.php';
    include_once 'Controlador/MotorControl.php';
    include_once 'Controlador/MantenimientoMotorControl.php';
    include_once 'Controlador/RebobinadoControl.php';
    include_once 'Controlador/TransformadorControl.php';
    include_once 'Controlador/Lista_verificacionControl.php';
    include_once 'Controlador/Reparacion_TransformadorControl.php';
    include_once 'Controlador/BobinadoPrimarioControl.php';
    include_once 'Controlador/BobinadoSecundarioControl.php';
    include_once 'Controlador/Prueba_ini_transformadorControl.php';
    include_once 'Controlador/Estado_aceite_transControl.php';
    include_once 'Controlador/Estado_transformadorControl.php';
    include_once 'Controlador/ChatController.php';
    include_once 'Controlador/ChatUserController.php';
    include_once 'Controlador/TrabajadoresAsiganadosControl.php';
    include_once 'Controlador/RebobinadoTrifasicoControl.php';
    include_once 'Controlador/MarcamotorControl.php';
    include_once 'Controlador/MarcatransControl.php';
    include_once 'Controlador/DepartamentoControl.php';
    include_once 'Controlador/MunicipioControl.php';

    $app->run();
