-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-11-2015 a las 17:29:17
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bobinados`
--
CREATE DATABASE IF NOT EXISTS `bobinados` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bobinados`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bobinadoprimario`
--

CREATE TABLE IF NOT EXISTS `bobinadoprimario` (
  `id` int(11) NOT NULL,
  `calibrealambre` varchar(30) NOT NULL,
  `espiracapa` varchar(30) NOT NULL,
  `tipo` set('Exterior','Interior') NOT NULL,
  `aislamiento` varchar(30) NOT NULL,
  `refrigeracion` varchar(30) NOT NULL,
  `calibrefibra` varchar(30) NOT NULL,
  `bisel` varchar(30) NOT NULL,
  `largo` varchar(30) NOT NULL,
  `ancho` varchar(30) NOT NULL,
  `altura` varchar(30) NOT NULL,
  `n2` varchar(30) NOT NULL,
  `espiraltotal` varchar(30) NOT NULL,
  `tap` varchar(30) NOT NULL,
  `estado` set('Sin Terminar','Terminado') NOT NULL,
  `idrepa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bobinadosecundario`
--

CREATE TABLE IF NOT EXISTS `bobinadosecundario` (
  `id` int(11) NOT NULL,
  `tipoconductor` varchar(30) NOT NULL,
  `medidasconductor` varchar(30) NOT NULL,
  `capas` varchar(30) NOT NULL,
  `espiracapas` varchar(30) NOT NULL,
  `bobina` varchar(30) NOT NULL,
  `n2` varchar(30) NOT NULL,
  `aislamientocapa` varchar(30) NOT NULL,
  `refrigeracion` varchar(30) NOT NULL,
  `calibrefibra` varchar(30) NOT NULL,
  `bisel` varchar(30) NOT NULL,
  `observacion` text NOT NULL,
  `estado` set('Sin Terminar','Terminado') NOT NULL,
  `idrepa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  `idusu` int(11) DEFAULT NULL,
  `idcli` int(11) DEFAULT NULL,
  `nomusuario` varchar(40) NOT NULL,
  `archivo` varchar(100) DEFAULT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estado` enum('Enviado','Visto') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`id`, `mensaje`, `idusu`, `idcli`, `nomusuario`, `archivo`, `fecha`, `hora`, `estado`) VALUES
(5, 'bien', 17, 4, 'Fabio Andres Rojas', 'null', '2015-11-03', '04:49:38', 'Visto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chatusuarios`
--

CREATE TABLE IF NOT EXISTS `chatusuarios` (
  `id` int(11) NOT NULL,
  `idusu1` int(11) NOT NULL,
  `idusu2` int(11) NOT NULL,
  `nomusuario` varchar(30) NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  `archivo` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estado` enum('Enviado','Visto') NOT NULL,
  `tipo` enum('Usuario') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `chatusuarios`
--

INSERT INTO `chatusuarios` (`id`, `idusu1`, `idusu2`, `nomusuario`, `mensaje`, `archivo`, `fecha`, `hora`, `estado`, `tipo`) VALUES
(16, 23, 17, 'wendy freite', 'hola', 'null', '2015-11-03', '03:53:52', 'Visto', 'Usuario'),
(21, 27, 17, 'Gilmar Ocampo Nieves', 'perro fabiooo', 'null', '2015-11-03', '06:29:26', 'Visto', 'Usuario'),
(23, 27, 17, 'Gilmar Ocampo Nieves', 'futbol.jpg', 'Archivo', '2015-11-03', '06:30:04', 'Visto', 'Usuario'),
(25, 17, 23, 'Fabio Andres Rojas', 'bdbd.zip', 'Archivo', '2015-11-04', '01:42:38', 'Enviado', 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `nom_cliente` varchar(60) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `fecha_ingre` date NOT NULL,
  `ciudad` varchar(60) NOT NULL,
  `serial` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `cedula`, `nom_cliente`, `apellido`, `direccion`, `telefono`, `fecha_ingre`, `ciudad`, `serial`) VALUES
(1, '7754343443', 'fabio', 'rojas', 'calle ', '654654654', '2015-10-29', 'et', '60312428'),
(2, '6321144444', 'daria', 'er', 'rer', '3543545444', '2015-10-29', 'tert', '9091977b'),
(3, '88665', 'red', 're', 're', '5345', '2015-10-29', 'rt', '938f97d9'),
(4, '1062773636', 'Jose Carlos', 'Jimenez', 'Calle falsa 123', '3084773636', '2015-10-29', 'Valledupar cesar', 'ffb43d7f'),
(5, '1065377483', 'Pedro Jose', 'Mejia', 'Calle 7C #21-07', '3084774488', '2015-10-29', 'Valledupar', '92301a9a'),
(6, '1083664773', 'Ricardo', 'Castro', 'calle 123', '3084774744', '2015-10-29', 'Valle', '2c342bb3'),
(7, '1065373713', 'Wilson', 'Perez', 'Calle falsa 123', '3404040044', '2015-10-30', 'Valledupar', 'fc2ed329');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_aceite_trans`
--

CREATE TABLE IF NOT EXISTS `estado_aceite_trans` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `pasada_arena` varchar(20) NOT NULL,
  `tiempo_filtro` varchar(20) NOT NULL,
  `temperatura_max` varchar(10) NOT NULL,
  `color` varchar(20) NOT NULL,
  `tiempo_reposo_ini` varchar(10) NOT NULL,
  `kv1` varchar(10) NOT NULL,
  `kv2` varchar(10) NOT NULL,
  `kv3` varchar(10) NOT NULL,
  `kv4` varchar(10) NOT NULL,
  `kv5` varchar(10) NOT NULL,
  `kv6` varchar(10) NOT NULL,
  `kv_total` varchar(20) NOT NULL,
  `tiempo_reposo1` varchar(20) NOT NULL,
  `tiempo_reposo2` varchar(20) NOT NULL,
  `tiempo_reposo3` varchar(20) NOT NULL,
  `tiempo_reposo4` varchar(20) NOT NULL,
  `tiempo_reposo5` varchar(20) NOT NULL,
  `tiempo_reposo6` varchar(20) NOT NULL,
  `tiempo_reposo_total` varchar(40) NOT NULL,
  `escala_chispometro` varchar(20) NOT NULL,
  `aceite_trans` varchar(30) NOT NULL,
  `observaciones` varchar(255) NOT NULL,
  `estado` enum('Sin Terminar','Terminado') NOT NULL,
  `responsable` varchar(30) NOT NULL,
  `id_trans` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_transformador`
--

CREATE TABLE IF NOT EXISTS `estado_transformador` (
  `id` int(11) NOT NULL,
  `tension_aplicada` varchar(10) NOT NULL,
  `ff11` varchar(20) NOT NULL,
  `ff12` varchar(20) NOT NULL,
  `ff13` varchar(20) NOT NULL,
  `ff14` varchar(20) NOT NULL,
  `ff15` varchar(20) NOT NULL,
  `ff21` varchar(20) NOT NULL,
  `ff22` varchar(20) NOT NULL,
  `ff23` varchar(20) NOT NULL,
  `ff24` varchar(20) NOT NULL,
  `ff25` varchar(20) NOT NULL,
  `ff31` varchar(20) NOT NULL,
  `ff32` varchar(20) NOT NULL,
  `ff33` varchar(20) NOT NULL,
  `ff34` varchar(20) NOT NULL,
  `ff35` varchar(20) NOT NULL,
  `fn1` varchar(20) NOT NULL,
  `fn2` varchar(20) NOT NULL,
  `fn3` varchar(20) NOT NULL,
  `fn4` varchar(20) NOT NULL,
  `fn5` varchar(20) NOT NULL,
  `corto_circuito_x` varchar(20) NOT NULL,
  `corto_circuito_y` varchar(20) NOT NULL,
  `corto_circuito_z` varchar(20) NOT NULL,
  `corto_circuito_n` varchar(20) NOT NULL,
  `seco_30_ab` varchar(20) NOT NULL,
  `seco_30_at` varchar(20) NOT NULL,
  `seco_30_bt` varchar(20) NOT NULL,
  `seco_60_ab` varchar(20) NOT NULL,
  `seco_60_at` varchar(20) NOT NULL,
  `seco_60_bt` varchar(20) NOT NULL,
  `aceite_30_ab` varchar(20) NOT NULL,
  `aceite_30_at` varchar(20) NOT NULL,
  `aceite_30_bt` varchar(20) NOT NULL,
  `aceite_60_ab` varchar(20) NOT NULL,
  `aceite_60_at` varchar(20) NOT NULL,
  `aceite_60_bt` varchar(20) NOT NULL,
  `encube` varchar(20) NOT NULL,
  `tension_aplicada2` varchar(20) NOT NULL,
  `amperaje` varchar(20) NOT NULL,
  `voltaje_de_salida` varchar(20) NOT NULL,
  `pintura` varchar(20) NOT NULL,
  `observaciones` varchar(255) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `responsable` varchar(45) NOT NULL,
  `id_trans` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_veri_trans`
--

CREATE TABLE IF NOT EXISTS `lista_veri_trans` (
  `id_lista` int(11) NOT NULL,
  `lista_lista` varchar(30) DEFAULT NULL,
  `cual_lista` varchar(30) DEFAULT NULL,
  `observacion_lista` text,
  `id_tra_lista` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lista_veri_trans`
--

INSERT INTO `lista_veri_trans` (`id_lista`, `lista_lista`, `cual_lista`, `observacion_lista`, `id_tra_lista`) VALUES
(1, 'Efectos De Instalacion', '', '                                             ', 1),
(2, 'Sobrecarga', '', '                                             ', 2),
(3, 'Sobrecarga', '', '                                             ', 2),
(4, 'Efectos De Instalacion', '', '                                             ', 3),
(5, 'Efectos De Instalacion', '', '                                             ', 3),
(6, 'Efectos De Instalacion', '', '                                             ', 3),
(7, 'Efectos De Instalacion', '', '                                             ', 3),
(8, 'Descarga Electrica', '', '                                             ', 4),
(9, 'Sobrecarga', '', '                                             ', 4),
(10, 'Sobrecarga', '', '   32                                          ', 5),
(11, 'Efectos De Instalacion', '', '   32                                          ', 5),
(12, 'Descarga Afmoferica', '', '                                             ', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento_motor`
--

CREATE TABLE IF NOT EXISTS `mantenimiento_motor` (
  `id_mantenimiento` int(11) NOT NULL,
  `id_motor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `amp` varchar(30) DEFAULT NULL,
  `voltios` varchar(30) DEFAULT NULL,
  `balineras` varchar(30) DEFAULT NULL,
  `sello_mecanico` varchar(40) DEFAULT NULL,
  `cap_arranque` varchar(30) DEFAULT NULL,
  `cap_marcha` varchar(30) DEFAULT NULL,
  `otros` text,
  `p_finales` text,
  `observaciones` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motorl`
--

CREATE TABLE IF NOT EXISTS `motorl` (
  `id_motores` int(11) NOT NULL,
  `num_serie_motor` varchar(30) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `hp` varchar(30) DEFAULT NULL,
  `kw` varchar(30) DEFAULT NULL,
  `rpm` varchar(30) DEFAULT NULL,
  `n_fases` varchar(15) DEFAULT NULL,
  `cotizado` varchar(11) DEFAULT NULL,
  `autorizado` varchar(50) DEFAULT NULL,
  `id_usu` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `accion` varchar(40) DEFAULT NULL,
  `fe_termi` date DEFAULT NULL,
  `fe_acord` date DEFAULT NULL,
  `revicion` varchar(5) DEFAULT NULL,
  `estado` set('Sin Terminar','Terminado') NOT NULL,
  `estado2` set('Activo','Inactivo') NOT NULL,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `motorl`
--

INSERT INTO `motorl` (`id_motores`, `num_serie_motor`, `marca`, `hp`, `kw`, `rpm`, `n_fases`, `cotizado`, `autorizado`, `id_usu`, `id_cliente`, `accion`, `fe_termi`, `fe_acord`, `revicion`, `estado`, `estado2`, `foto`) VALUES
(1, 'ew2', '32', '32', '32', '', '', '32', 'Fabio Andres Rojas', 27, 4, 'Rebobinado', '2015-11-06', '2015-11-07', 'si', 'Sin Terminar', 'Activo', 'motor.jpg'),
(2, 'wew3', '32', '32', '32', '32', '32', '', 'Fabio Andres Rojas', 27, 4, 'Rebobinado', '2015-11-01', '2015-11-01', 'si', 'Sin Terminar', 'Inactivo', 'motor.jpg'),
(3, 'e323', 'we32', '32', '23', '23', '3', '20000', 'Fabio Andres Rojas', 18, 4, 'Rebobinado', '2015-11-09', '2015-11-09', 'Si', 'Sin Terminar', 'Activo', ''),
(4, 'ew', 'zap', '32', '12', '23', '32', '12000', 'Fabio Andres rojas', 31, 7, 'Rebobinado', '2015-11-06', '2015-11-06', 'Si', 'Sin Terminar', 'Activo', ''),
(5, 'wew', '32', '', '', '', '', '', 'Fabio Andres Rojas', 18, 6, 'Rebobinado', '2015-11-07', '2015-11-07', 'si', 'Sin Terminar', 'Inactivo', 'motor.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebas_ini_tran`
--

CREATE TABLE IF NOT EXISTS `pruebas_ini_tran` (
  `id` int(11) NOT NULL,
  `ff` varchar(30) NOT NULL,
  `ff1` varchar(30) NOT NULL,
  `ff2` varchar(30) NOT NULL,
  `ff3` varchar(30) NOT NULL,
  `ff4` varchar(30) NOT NULL,
  `ff5` varchar(30) NOT NULL,
  `fn` varchar(30) NOT NULL,
  `fn1` varchar(30) NOT NULL,
  `x` varchar(30) NOT NULL,
  `x1` varchar(30) NOT NULL,
  `y` varchar(30) NOT NULL,
  `y1` varchar(20) NOT NULL,
  `z` varchar(30) NOT NULL,
  `z1` varchar(30) NOT NULL,
  `megueo` varchar(30) NOT NULL,
  `id_trans` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pruebas_ini_tran`
--

INSERT INTO `pruebas_ini_tran` (`id`, `ff`, `ff1`, `ff2`, `ff3`, `ff4`, `ff5`, `fn`, `fn1`, `x`, `x1`, `y`, `y1`, `z`, `z1`, `megueo`, `id_trans`) VALUES
(1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bueno', 1),
(2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bueno', 2),
(3, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bueno', 3),
(4, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bueno', 4),
(5, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bueno', 5),
(6, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bueno', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rebobinado_motor`
--

CREATE TABLE IF NOT EXISTS `rebobinado_motor` (
  `id_rebobinado` int(11) NOT NULL,
  `id_motor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `v` varchar(30) DEFAULT NULL,
  `am` varchar(30) DEFAULT NULL,
  `balineras_ref` varchar(40) DEFAULT NULL,
  `cap_marcha` varchar(40) DEFAULT NULL,
  `largo` varchar(20) DEFAULT NULL,
  `conexiones` int(11) DEFAULT NULL,
  `cap_arranque` varchar(30) DEFAULT NULL,
  `sello_mecanico` varchar(40) DEFAULT NULL,
  `arr_paso` varchar(40) DEFAULT NULL,
  `arr_espiras` varchar(40) DEFAULT NULL,
  `arr_calibre` varchar(40) DEFAULT NULL,
  `arr_peso_por_bobina` varchar(40) DEFAULT NULL,
  `mar_paso` varchar(40) DEFAULT NULL,
  `mar_espira` varchar(40) DEFAULT NULL,
  `mar_calibre` varchar(40) DEFAULT NULL,
  `mar_peso_por_bobina` varchar(40) DEFAULT NULL,
  `num_ranura` varchar(20) DEFAULT NULL,
  `observaciones` text,
  `sugerencias` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparacion_trans`
--

CREATE TABLE IF NOT EXISTS `reparacion_trans` (
  `id_repa` int(11) NOT NULL,
  `largo_repa` varchar(30) DEFAULT NULL,
  `ancho_repa` varchar(30) DEFAULT NULL,
  `altu_repa` varchar(30) DEFAULT NULL,
  `refri_repa` varchar(30) DEFAULT NULL,
  `tipo_conductor` varchar(30) DEFAULT NULL,
  `bisel_repa` varchar(30) DEFAULT NULL,
  `n2` varchar(30) DEFAULT NULL,
  `fibra_repa` varchar(30) DEFAULT NULL,
  `bobinas` varchar(30) DEFAULT NULL,
  `cali_repa` varchar(30) DEFAULT NULL,
  `otros_repa` text,
  `nsecuencia` varchar(30) NOT NULL,
  `potencia` varchar(30) DEFAULT NULL,
  `vprimario` varchar(30) NOT NULL,
  `vsengundario` varchar(30) NOT NULL,
  `tipo` set('Primaria','Secundaria') DEFAULT NULL,
  `estado` set('Terminado','Sin Terminar') NOT NULL,
  `idtran_repa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tp_usuarios`
--

CREATE TABLE IF NOT EXISTS `tp_usuarios` (
  `id_tp` int(11) NOT NULL,
  `nom_tp` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tp_usuarios`
--

INSERT INTO `tp_usuarios` (`id_tp`, `nom_tp`) VALUES
(1, 'Administrador'),
(2, 'Jefe Transformadores'),
(3, 'Jefe Motores'),
(4, 'Empleado Transformador'),
(5, 'Empleado Motores'),
(6, 'Sub Admin'),
(7, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadoresasignados`
--

CREATE TABLE IF NOT EXISTS `trabajadoresasignados` (
  `id` int(11) NOT NULL,
  `idjefe` int(11) DEFAULT NULL,
  `idempleado` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trabajadoresasignados`
--

INSERT INTO `trabajadoresasignados` (`id`, `idjefe`, `idempleado`) VALUES
(46, 34, 33);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transformador`
--

CREATE TABLE IF NOT EXISTS `transformador` (
  `id_tran` int(11) NOT NULL,
  `marca_tran` varchar(30) NOT NULL,
  `nplaca_tran` varchar(30) NOT NULL,
  `kva_tran` varchar(30) DEFAULT NULL,
  `tp_tran` varchar(30) DEFAULT NULL,
  `ts_tran` varchar(30) DEFAULT NULL,
  `tipo_acc_tran` set('Reparacion','Mantenimiento') DEFAULT NULL,
  `fe_acor_tran` date NOT NULL,
  `fe_ter_tran` date NOT NULL,
  `estado` set('Sin Terminar','Terminado') DEFAULT NULL,
  `foto` varchar(20) DEFAULT NULL,
  `estado2` enum('Activo','Inactivo') NOT NULL,
  `idclie_tran` int(11) NOT NULL,
  `idusu_tran` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `transformador`
--

INSERT INTO `transformador` (`id_tran`, `marca_tran`, `nplaca_tran`, `kva_tran`, `tp_tran`, `ts_tran`, `tipo_acc_tran`, `fe_acor_tran`, `fe_ter_tran`, `estado`, `foto`, `estado2`, `idclie_tran`, `idusu_tran`) VALUES
(1, 'ewrr', '3ew', '', '', '', 'Reparacion', '2015-11-06', '2015-11-06', 'Sin Terminar', 'transformador.jpg', 'Activo', 4, 30),
(2, '34', '43', '', '', '', 'Reparacion', '2015-11-05', '2015-11-05', 'Sin Terminar', 'transformador.jpg', 'Activo', 5, 19),
(3, 'w32', '32', '', '', '', 'Reparacion', '2015-11-06', '2015-11-06', 'Sin Terminar', 'transformador.jpg', 'Activo', 5, 19),
(4, 'ew', '32', '23', '', '', 'Reparacion', '2015-11-06', '2015-11-06', 'Sin Terminar', 'transformador.jpg', 'Activo', 7, 19),
(5, 'ew2', '32', '23', '', '', 'Reparacion', '2015-11-06', '2015-11-06', 'Sin Terminar', 'transformador.jpg', 'Activo', 7, 19),
(6, '43', '43', '', '', '', 'Reparacion', '2015-11-07', '2015-11-07', 'Sin Terminar', 'transformador.jpg', 'Activo', 6, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usu` int(11) NOT NULL,
  `cedula` varchar(12) NOT NULL,
  `nom_usu` varchar(30) NOT NULL,
  `usuario` varchar(30) DEFAULT NULL,
  `pass` varchar(30) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) NOT NULL,
  `id_tp_usu` int(11) NOT NULL,
  `estado` set('Activo','Inactivo') NOT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `tipo` enum('Sin Asignar','Asignado') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `cedula`, `nom_usu`, `usuario`, `pass`, `foto`, `email`, `telefono`, `id_tp_usu`, `estado`, `idcliente`, `tipo`) VALUES
(17, '1065622719', 'Fabio Andres Rojas', 'fabio90', '12345', '2810201522533.jpg', 'fandresroja@gmail.com', '309388321', 1, 'Activo', NULL, 'Sin Asignar'),
(18, '1065373773', 'Oswaldo Andres Rojas', '1065373773', 'oswaldo', 'fotos_perfil.jpg', 'oswal@gmail.com', '3093838333', 5, 'Activo', NULL, 'Sin Asignar'),
(19, '1086364553', 'Jose Carlos Jimenez', '1086364553', 'jose123', 'fotos_perfil.jpg', 'jose@gmail.com', '3029394733', 4, 'Activo', NULL, 'Sin Asignar'),
(23, '1065725577', 'wendy freite', 'wendy', '12345', 'fotos_perfil.jpg', 'wendy@gmail.com', '3006577388', 1, 'Activo', NULL, 'Sin Asignar'),
(24, '1062773636', 'Jose Carlos Jimenez', '1062773636', 'ffb43d7f', 'fotos_perfil.jpg', 'null', '3084773636', 7, 'Activo', 4, 'Sin Asignar'),
(25, '1065377483', 'Pedro Jose Mejia', '1065377483', '92301a9a', 'fotos_perfil.jpg', 'null', '3084774488', 7, 'Activo', 5, 'Sin Asignar'),
(26, '1083664773', 'Ricardo Castro Gomez', '1083664773', '2c342bb3', 'fotos_perfil.jpg', 'null', '3084774744', 7, 'Activo', 6, 'Sin Asignar'),
(27, '1065650321', 'Gilmar Ocampo Nieves', '1065650321', 'chester123', 'fotos_perfil.jpg', 'giocni@gmail.com', '3003773992', 3, 'Activo', NULL, 'Sin Asignar'),
(28, '1083773773', 'Tatiana Mejia', '1083773773', 'tatiana', 'fotos_perfil.jpg', 'tatiana@gmail.com', '3098283838', 6, 'Activo', NULL, 'Sin Asignar'),
(29, '1065373713', 'Wilson Perez', '1065373713', 'fc2ed329', 'fotos_perfil.jpg', 'null', '3404040044', 7, 'Activo', 7, 'Sin Asignar'),
(30, '1077399377', 'efrain Ovalle', '1077399377', '12345', 'fotos_perfil.jpg', 'efra@gmail.com', '4003883773', 4, 'Activo', NULL, 'Sin Asignar'),
(31, '1086666333', 'Tati Perez', '1086666333', '12345', 'fotos_perfil.jpg', 'tati@gmail.com', '4320848844', 3, 'Activo', NULL, 'Sin Asignar'),
(32, '1230084667', 'Jeffer Saurith', '1230084667', 'jefer123', 'fotos_perfil.jpg', 'jeffer@hotmail.com', '3009737228', 5, 'Activo', NULL, 'Sin Asignar'),
(33, '1077538299', 'Fabian Medina', '1077538299', '12345', 'fotos_perfil.jpg', 'fabian@gmail.com', '3088299330', 5, 'Activo', NULL, 'Asignado'),
(34, '1088636337', 'Andres RojasGulloso', '1088636337', 'spike', 'fotos_perfil.jpg', 'spike@gmail.com', '9939300337', 2, 'Activo', NULL, 'Sin Asignar');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bobinadoprimario`
--
ALTER TABLE `bobinadoprimario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idrepa` (`idrepa`);

--
-- Indices de la tabla `bobinadosecundario`
--
ALTER TABLE `bobinadosecundario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idrepa` (`idrepa`);

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idusu` (`idusu`),
  ADD KEY `idcli` (`idcli`),
  ADD KEY `idcli_2` (`idcli`);

--
-- Indices de la tabla `chatusuarios`
--
ALTER TABLE `chatusuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idusu1` (`idusu1`),
  ADD KEY `idusu2` (`idusu2`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`);

--
-- Indices de la tabla `estado_aceite_trans`
--
ALTER TABLE `estado_aceite_trans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_trans` (`id_trans`);

--
-- Indices de la tabla `estado_transformador`
--
ALTER TABLE `estado_transformador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_trans` (`id_trans`);

--
-- Indices de la tabla `lista_veri_trans`
--
ALTER TABLE `lista_veri_trans`
  ADD PRIMARY KEY (`id_lista`),
  ADD KEY `id_tra_lista` (`id_tra_lista`);

--
-- Indices de la tabla `mantenimiento_motor`
--
ALTER TABLE `mantenimiento_motor`
  ADD PRIMARY KEY (`id_mantenimiento`),
  ADD KEY `id_motor` (`id_motor`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_motor_2` (`id_motor`),
  ADD KEY `id_usuario_2` (`id_usuario`);

--
-- Indices de la tabla `motorl`
--
ALTER TABLE `motorl`
  ADD PRIMARY KEY (`id_motores`),
  ADD KEY `id_usu` (`id_usu`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `pruebas_ini_tran`
--
ALTER TABLE `pruebas_ini_tran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_trans` (`id_trans`);

--
-- Indices de la tabla `rebobinado_motor`
--
ALTER TABLE `rebobinado_motor`
  ADD PRIMARY KEY (`id_rebobinado`),
  ADD KEY `id_motor` (`id_motor`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `reparacion_trans`
--
ALTER TABLE `reparacion_trans`
  ADD PRIMARY KEY (`id_repa`),
  ADD KEY `idtran_repa` (`idtran_repa`);

--
-- Indices de la tabla `tp_usuarios`
--
ALTER TABLE `tp_usuarios`
  ADD PRIMARY KEY (`id_tp`);

--
-- Indices de la tabla `trabajadoresasignados`
--
ALTER TABLE `trabajadoresasignados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idjefe` (`idjefe`),
  ADD KEY `idempleado` (`idempleado`);

--
-- Indices de la tabla `transformador`
--
ALTER TABLE `transformador`
  ADD PRIMARY KEY (`id_tran`),
  ADD KEY `idclie_tran` (`idclie_tran`),
  ADD KEY `idusu_tran` (`idusu_tran`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usu`),
  ADD KEY `id_tp_usu` (`id_tp_usu`),
  ADD KEY `id_tp_usu_2` (`id_tp_usu`),
  ADD KEY `idcliente` (`idcliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bobinadoprimario`
--
ALTER TABLE `bobinadoprimario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `bobinadosecundario`
--
ALTER TABLE `bobinadosecundario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `chatusuarios`
--
ALTER TABLE `chatusuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `estado_aceite_trans`
--
ALTER TABLE `estado_aceite_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estado_transformador`
--
ALTER TABLE `estado_transformador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `lista_veri_trans`
--
ALTER TABLE `lista_veri_trans`
  MODIFY `id_lista` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `mantenimiento_motor`
--
ALTER TABLE `mantenimiento_motor`
  MODIFY `id_mantenimiento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `motorl`
--
ALTER TABLE `motorl`
  MODIFY `id_motores` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `pruebas_ini_tran`
--
ALTER TABLE `pruebas_ini_tran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `rebobinado_motor`
--
ALTER TABLE `rebobinado_motor`
  MODIFY `id_rebobinado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `reparacion_trans`
--
ALTER TABLE `reparacion_trans`
  MODIFY `id_repa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tp_usuarios`
--
ALTER TABLE `tp_usuarios`
  MODIFY `id_tp` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `trabajadoresasignados`
--
ALTER TABLE `trabajadoresasignados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT de la tabla `transformador`
--
ALTER TABLE `transformador`
  MODIFY `id_tran` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bobinadoprimario`
--
ALTER TABLE `bobinadoprimario`
  ADD CONSTRAINT `bobinadoprimario_ibfk_1` FOREIGN KEY (`idrepa`) REFERENCES `reparacion_trans` (`id_repa`);

--
-- Filtros para la tabla `bobinadosecundario`
--
ALTER TABLE `bobinadosecundario`
  ADD CONSTRAINT `bobinadosecundario_ibfk_1` FOREIGN KEY (`idrepa`) REFERENCES `reparacion_trans` (`id_repa`);

--
-- Filtros para la tabla `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`idusu`) REFERENCES `usuarios` (`id_usu`),
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`idcli`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `chatusuarios`
--
ALTER TABLE `chatusuarios`
  ADD CONSTRAINT `chatusuarios_ibfk_1` FOREIGN KEY (`idusu1`) REFERENCES `usuarios` (`id_usu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `chatusuarios_ibfk_2` FOREIGN KEY (`idusu2`) REFERENCES `usuarios` (`id_usu`);

--
-- Filtros para la tabla `estado_aceite_trans`
--
ALTER TABLE `estado_aceite_trans`
  ADD CONSTRAINT `estado_aceite_trans_ibfk_1` FOREIGN KEY (`id_trans`) REFERENCES `transformador` (`id_tran`);

--
-- Filtros para la tabla `estado_transformador`
--
ALTER TABLE `estado_transformador`
  ADD CONSTRAINT `estado_transformador_ibfk_1` FOREIGN KEY (`id_trans`) REFERENCES `transformador` (`id_tran`);

--
-- Filtros para la tabla `lista_veri_trans`
--
ALTER TABLE `lista_veri_trans`
  ADD CONSTRAINT `lista_veri_trans_ibfk_1` FOREIGN KEY (`id_tra_lista`) REFERENCES `transformador` (`id_tran`);

--
-- Filtros para la tabla `mantenimiento_motor`
--
ALTER TABLE `mantenimiento_motor`
  ADD CONSTRAINT `mantenimiento_motor_ibfk_1` FOREIGN KEY (`id_motor`) REFERENCES `motorl` (`id_motores`),
  ADD CONSTRAINT `mantenimiento_motor_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usu`);

--
-- Filtros para la tabla `motorl`
--
ALTER TABLE `motorl`
  ADD CONSTRAINT `motorl_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`),
  ADD CONSTRAINT `motorl_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `pruebas_ini_tran`
--
ALTER TABLE `pruebas_ini_tran`
  ADD CONSTRAINT `pruebas_ini_tran_ibfk_1` FOREIGN KEY (`id_trans`) REFERENCES `transformador` (`id_tran`);

--
-- Filtros para la tabla `rebobinado_motor`
--
ALTER TABLE `rebobinado_motor`
  ADD CONSTRAINT `rebobinado_motor_ibfk_1` FOREIGN KEY (`id_motor`) REFERENCES `motorl` (`id_motores`),
  ADD CONSTRAINT `rebobinado_motor_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usu`);

--
-- Filtros para la tabla `reparacion_trans`
--
ALTER TABLE `reparacion_trans`
  ADD CONSTRAINT `reparacion_trans_ibfk_1` FOREIGN KEY (`idtran_repa`) REFERENCES `transformador` (`id_tran`);

--
-- Filtros para la tabla `trabajadoresasignados`
--
ALTER TABLE `trabajadoresasignados`
  ADD CONSTRAINT `trabajadoresasignados_ibfk_1` FOREIGN KEY (`idjefe`) REFERENCES `usuarios` (`id_usu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `trabajadoresasignados_ibfk_2` FOREIGN KEY (`idempleado`) REFERENCES `usuarios` (`id_usu`);

--
-- Filtros para la tabla `transformador`
--
ALTER TABLE `transformador`
  ADD CONSTRAINT `transformador_ibfk_1` FOREIGN KEY (`idclie_tran`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `transformador_ibfk_2` FOREIGN KEY (`idusu_tran`) REFERENCES `usuarios` (`id_usu`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_tp_usu`) REFERENCES `tp_usuarios` (`id_tp`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
