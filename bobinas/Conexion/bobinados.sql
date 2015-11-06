-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-10-2015 a las 02:34:32
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
  `id` bigint(20) NOT NULL,
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
  `idrepa` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bobinadoprimario`
--

INSERT INTO `bobinadoprimario` (`id`, `calibrealambre`, `espiracapa`, `tipo`, `aislamiento`, `refrigeracion`, `calibrefibra`, `bisel`, `largo`, `ancho`, `altura`, `n2`, `espiraltotal`, `tap`, `estado`, `idrepa`) VALUES
(5, '32', '43', 'Exterior', '12', '32', '32', '43', '12', '43', '43', '21', '32', '44', 'Terminado', 44);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bobinadosecundario`
--

CREATE TABLE IF NOT EXISTS `bobinadosecundario` (
  `id` bigint(20) NOT NULL,
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
  `idrepa` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bobinadosecundario`
--

INSERT INTO `bobinadosecundario` (`id`, `tipoconductor`, `medidasconductor`, `capas`, `espiracapas`, `bobina`, `n2`, `aislamientocapa`, `refrigeracion`, `calibrefibra`, `bisel`, `observacion`, `estado`, `idrepa`) VALUES
(9, '33', '43', '65', '43', '42', '32', '32', '54', '65', '65', 'nada de nada', 'Terminado', 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` bigint(20) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `nom_cliente` varchar(60) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `fecha_ingre` date NOT NULL,
  `ciudad` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `cedula`, `nom_cliente`, `direccion`, `telefono`, `fecha_ingre`, `ciudad`) VALUES
(2, '311', 'fabio', 'calle', '342', '2015-07-30', 'valledupar'),
(3, '2334', 'qw', 'eq', '342', '2015-07-31', 'qwe'),
(9, '8323434', 'jose carlos', 'calle falsa 123', '30039458', '2015-07-31', 'valledupar'),
(10, '2132442', 'pedro jimenez', 'las marias', '324234234', '2015-07-31', 'valledupar'),
(11, '108366423', 'Efrain', 'Calle falsa 123', '300323232', '2015-08-02', 'Valledupar'),
(12, '543', 'ert', 'ert', '53', '2015-08-06', 't'),
(13, '106526323', 'ana', 'calle 123', '30048859', '2015-08-06', 'valledupar'),
(14, '106526323', 'ana', 'calle 123', '30048859', '2015-08-06', 'valledupar'),
(15, '12234', 'ana', 'calle 124', '300434343', '2015-08-06', 'valledupar'),
(16, '12433', 'Ana', 'Calle falsa 123', '3048493', '2015-08-15', 'Valleduoar'),
(17, '324332', 'Jose', 'Calle 123', '3994773', '2015-08-15', 'Valledupa'),
(18, '312332', 'Jose', 'Calle falsa 123', '30043232', '2015-08-15', 'Valledupar'),
(19, '132343', 'Ana', 'Calle falsa 123', '30013232', '2015-08-15', 'Valledupar'),
(20, '3004332', 'Ana', 'Calle falsa 123', '30043233', '2015-08-15', 'Valledupar'),
(21, '143453', 'Ana', 'Calle falsa 123', '300432132', '2015-08-15', 'Valledupar'),
(22, '434', 'Pedro', 'Calle falsa 124', '4344', '2015-08-15', 'Valle'),
(23, '14234', 'Fabio', 'Calle falsa 123', '30040334', '2015-08-15', 'Valledupar'),
(24, '4232', 'erwew', '32', '234', '2015-08-15', 'rwe'),
(25, '106577253', 'Gilmar', 'calle falsa 123', '30012323', '2015-08-27', 'Valledupar'),
(26, '3242432', 'Erika', 'calle 1223', '3001232', '2015-08-31', 'Valledupar'),
(27, '8686', 'hhg', 'hf', '7867', '2015-08-31', 'hgh'),
(28, '1032432', 'Pepe', 'Calle 123', '324343', '2015-09-01', 'Valledupar');

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
  `id_trans` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_aceite_trans`
--

INSERT INTO `estado_aceite_trans` (`id`, `fecha`, `pasada_arena`, `tiempo_filtro`, `temperatura_max`, `color`, `tiempo_reposo_ini`, `kv1`, `kv2`, `kv3`, `kv4`, `kv5`, `kv6`, `kv_total`, `tiempo_reposo1`, `tiempo_reposo2`, `tiempo_reposo3`, `tiempo_reposo4`, `tiempo_reposo5`, `tiempo_reposo6`, `tiempo_reposo_total`, `escala_chispometro`, `aceite_trans`, `observaciones`, `estado`, `responsable`, `id_trans`) VALUES
(1, '2015-08-27', '32', '32', '32', 'gris', '32', '32', '23', '32', '32', '32', '32', '32', '32', '23', '32', '32', '32', '32', '32', '32', 'gasolina', 'ninguna', 'Terminado', 'Andres Camilo Rojas ', 17);

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
  `id_trans` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_transformador`
--

INSERT INTO `estado_transformador` (`id`, `tension_aplicada`, `ff11`, `ff12`, `ff13`, `ff14`, `ff15`, `ff21`, `ff22`, `ff23`, `ff24`, `ff25`, `ff31`, `ff32`, `ff33`, `ff34`, `ff35`, `fn1`, `fn2`, `fn3`, `fn4`, `fn5`, `corto_circuito_x`, `corto_circuito_y`, `corto_circuito_z`, `corto_circuito_n`, `seco_30_ab`, `seco_30_at`, `seco_30_bt`, `seco_60_ab`, `seco_60_at`, `seco_60_bt`, `aceite_30_ab`, `aceite_30_at`, `aceite_30_bt`, `aceite_60_ab`, `aceite_60_at`, `aceite_60_bt`, `encube`, `tension_aplicada2`, `amperaje`, `voltaje_de_salida`, `pintura`, `observaciones`, `estado`, `responsable`, `id_trans`) VALUES
(3, '21', '12', '21', '12', '12', '43', '43', '21', '21', '12', '21', '21', '21', '12', '32', '21', '21', '12', '12', '12', '12', '21', '12', '21', '1', '21', '21', '21', '12', '21', '21', '21', '21', '21', '21', '21', '1', '21', '21', '21', '21', 'nada', 'ninguna', 'Terminado', 'Andres Camilo Rojas ', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_veri_trans`
--

CREATE TABLE IF NOT EXISTS `lista_veri_trans` (
  `id_lista` bigint(20) NOT NULL,
  `lista_lista` varchar(30) NOT NULL,
  `cual_lista` varchar(30) NOT NULL,
  `observacion_lista` text NOT NULL,
  `id_tra_lista` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lista_veri_trans`
--

INSERT INTO `lista_veri_trans` (`id_lista`, `lista_lista`, `cual_lista`, `observacion_lista`, `id_tra_lista`) VALUES
(5, 'Falta De Mantenimiento', '', 'nada                                             ', 7),
(6, 'Efectos De Instalacion', '', 'nada                                             ', 7),
(7, 'Efectos De Instalacion', '', '  ninguno                                           ', 8),
(20, 'Sobretension', '', '  nada                                           ', 16),
(21, 'Efectos De Instalacion', '', '  nada                                           ', 16),
(22, 'Sobretension', '', '  nada                                          ', 17),
(23, 'Sobrecarga', '', '  nada                                          ', 17),
(24, 'Otros', 'ninguna', '   nada                                          ', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento_motor`
--

CREATE TABLE IF NOT EXISTS `mantenimiento_motor` (
  `id_mantenimiento` bigint(20) NOT NULL,
  `id_motor` bigint(20) NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `amp` varchar(30) DEFAULT NULL,
  `voltios` varchar(30) DEFAULT NULL,
  `balineras` varchar(30) DEFAULT NULL,
  `sello_mecanico` varchar(40) DEFAULT NULL,
  `cap_arranque` varchar(30) DEFAULT NULL,
  `cap_marcha` varchar(30) DEFAULT NULL,
  `otros` text,
  `p_finales` text,
  `observaciones` text
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mantenimiento_motor`
--

INSERT INTO `mantenimiento_motor` (`id_mantenimiento`, `id_motor`, `id_usuario`, `amp`, `voltios`, `balineras`, `sello_mecanico`, `cap_arranque`, `cap_marcha`, `otros`, `p_finales`, `observaciones`) VALUES
(8, 1, 1065622720, '12', '12', '12', '12', '12', '1', ' rw                                            ', '  rw                                           ', ' wre                                            '),
(9, 3, 1065622718, '32', '43', '43', 'si', 'no', 'si', '  ninguno                                           ', 'ninguna                                             ', 'nada                                             '),
(11, 6, 1065622718, '21', '21', '21', '21', '21', '21', ' nada vez                                           ', 'nada                                             ', 'nada                                             ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motorl`
--

CREATE TABLE IF NOT EXISTS `motorl` (
  `id_motores` bigint(20) NOT NULL,
  `num_serie_motor` varchar(30) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `hp` float NOT NULL,
  `kw` float NOT NULL,
  `rpm` float NOT NULL,
  `n_fases` int(11) NOT NULL,
  `cotizado` int(11) NOT NULL,
  `autorizado` varchar(50) NOT NULL,
  `id_usu` bigint(20) NOT NULL,
  `id_cliente` bigint(20) NOT NULL,
  `accion` varchar(40) NOT NULL,
  `fe_termi` date DEFAULT NULL,
  `fe_acord` date DEFAULT NULL,
  `revicion` varchar(5) NOT NULL,
  `estado` set('Sin Terminar','Terminado') NOT NULL,
  `estado2` set('Activo','Inactivo') NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `motorl`
--

INSERT INTO `motorl` (`id_motores`, `num_serie_motor`, `marca`, `hp`, `kw`, `rpm`, `n_fases`, `cotizado`, `autorizado`, `id_usu`, `id_cliente`, `accion`, `fe_termi`, `fe_acord`, `revicion`, `estado`, `estado2`, `foto`) VALUES
(1, 'ew2', 'we', 23, 23, 23, 23, 232, 'Elsy Maria Gomez Gomez', 1065622720, 2, 'Mantenimiento', '2015-07-31', '2015-07-31', 'si', 'Terminado', 'Inactivo', 'motor.jpg'),
(2, 'ert3', '34', 54, 34, 34, 34, 343, 'Elsy Maria Gomez Gomez', 267842, 3, 'Rebobinado', '2015-07-31', '2015-07-31', 'Si', 'Terminado', 'Inactivo', 'motor.jpg'),
(3, 'qw1', 'qw1', 12, 21, 32, 32, 200000, 'Elsy Maria Gomez Gomez', 1065622718, 9, 'Mantenimiento', '2015-08-03', '2015-08-03', 'Si', 'Terminado', 'Inactivo', 'motor.jpg'),
(4, 're43', 'rere', 43, 43, 43, 43, 43, 'Elsy Maria Gomez Gomez', 267842, 22, 'Rebobinado', '2015-08-20', '2015-08-20', 'Si', 'Terminado', 'Activo', 'motor.jpg'),
(5, '7uy', 'ty7', 87, 87, 87, 87, 20000, 'Elsy Maria Gomez Gomez', 267842, 27, 'Rebobinado', '2015-09-03', '2015-09-03', 'si', 'Terminado', 'Inactivo', 'motor.jpg'),
(6, 'ew32', 'ce32', 32, 2, 32, 32, 1800000, 'Elsy Maria Gomez Gomez', 1065622718, 28, 'Mantenimiento', '2015-09-04', '2015-09-04', 'Si', 'Terminado', 'Activo', 'motor.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebas_ini_tran`
--

CREATE TABLE IF NOT EXISTS `pruebas_ini_tran` (
  `id` bigint(20) NOT NULL,
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
  `id_trans` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pruebas_ini_tran`
--

INSERT INTO `pruebas_ini_tran` (`id`, `ff`, `ff1`, `ff2`, `ff3`, `ff4`, `ff5`, `fn`, `fn1`, `x`, `x1`, `y`, `y1`, `z`, `z1`, `megueo`, `id_trans`) VALUES
(5, '2', '32', '32', '32', '32', '32', '32', '32', '32', '32', '32', '32', '32', '32', 'Bueno', 16),
(6, '32', '32', '32', '32', '32', '32', '32', '2', '32', '3', '23', '32', '32', '2', 'Bueno', 17),
(7, '32', '12', '12', '21', '21', '21', '12', '12', '21', '21', '21', '21', '21', '21', 'Bueno', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rebobinado_motor`
--

CREATE TABLE IF NOT EXISTS `rebobinado_motor` (
  `id_rebobinado` bigint(20) NOT NULL,
  `id_motor` bigint(20) NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rebobinado_motor`
--

INSERT INTO `rebobinado_motor` (`id_rebobinado`, `id_motor`, `id_usuario`, `v`, `am`, `balineras_ref`, `cap_marcha`, `largo`, `conexiones`, `cap_arranque`, `sello_mecanico`, `arr_paso`, `arr_espiras`, `arr_calibre`, `arr_peso_por_bobina`, `mar_paso`, `mar_espira`, `mar_calibre`, `mar_peso_por_bobina`, `num_ranura`, `observaciones`, `sugerencias`) VALUES
(3, 2, 267842, '12', '31', '31', '13', '31', 110, '23', '21', '21', '12', '12', '12', '21', '12', '34', '43', '2', ' wr                                             ', 'eqw                                             '),
(4, 5, 267842, '87', '867', '867', '876', '876', 110, '86', '67', '87', '867', '867', '867', '876', '86', '87', '86', '67', 'nada                                             ', 'nada                                             '),
(6, 4, 267842, '54', '32', '32', '34', '4', 220, '32', '43', '23', '23', '32', '34', '32', '23', '32', '32', '321', 'nada                                             ', 'nada                                             ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparacion_trans`
--

CREATE TABLE IF NOT EXISTS `reparacion_trans` (
  `id_repa` bigint(20) NOT NULL,
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
  `idtran_repa` bigint(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reparacion_trans`
--

INSERT INTO `reparacion_trans` (`id_repa`, `largo_repa`, `ancho_repa`, `altu_repa`, `refri_repa`, `tipo_conductor`, `bisel_repa`, `n2`, `fibra_repa`, `bobinas`, `cali_repa`, `otros_repa`, `nsecuencia`, `potencia`, `vprimario`, `vsengundario`, `tipo`, `estado`, `idtran_repa`) VALUES
(34, '32', '43', '54', '54', NULL, '55', NULL, '65', NULL, '65', '76', '21', '32', '76', '56', 'Primaria', 'Terminado', 7),
(35, '76', '867', NULL, '56', '55', '56', '56', '56', '56', NULL, '56', '21', '32', '76', '56', 'Secundaria', 'Terminado', 7),
(38, '43', '354', '54', '54', NULL, '54', NULL, '54', NULL, '54', '54', '32', '32', '43', '43', 'Primaria', 'Terminado', 8),
(39, '432', '23', NULL, '23', '23', '34', '34', '43', '43', NULL, '34', '32', '32', '43', '43', 'Secundaria', 'Terminado', 8),
(44, '23', '32', '32', '23', NULL, '43', NULL, '123', NULL, '43', '12', '54', '65', '41', '43', 'Primaria', 'Terminado', 16),
(45, '', '', NULL, '', '', '', '', '', '', NULL, '', '221', '21', '12', '21', 'Secundaria', 'Terminado', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tp_usuarios`
--

CREATE TABLE IF NOT EXISTS `tp_usuarios` (
  `id_tp` int(11) NOT NULL,
  `nom_tp` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tp_usuarios`
--

INSERT INTO `tp_usuarios` (`id_tp`, `nom_tp`) VALUES
(1, 'Administrador'),
(2, 'Jefe Transformadores'),
(3, 'Jefe Motores'),
(4, 'Empleado Transformador'),
(5, 'Empleado Motores'),
(6, 'Sub Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transformador`
--

CREATE TABLE IF NOT EXISTS `transformador` (
  `id_tran` bigint(20) NOT NULL,
  `marca_tran` varchar(30) NOT NULL,
  `nplaca_tran` varchar(30) NOT NULL,
  `kva_tran` varchar(30) NOT NULL,
  `tp_tran` varchar(30) NOT NULL,
  `ts_tran` varchar(30) NOT NULL,
  `tipo_acc_tran` set('Reparacion','Mantenimiento') NOT NULL,
  `fe_acor_tran` date NOT NULL,
  `fe_ter_tran` date NOT NULL,
  `estado` set('Sin Terminar','Terminado') NOT NULL,
  `foto` varchar(20) NOT NULL,
  `estado2` enum('Activo','Inactivo') NOT NULL,
  `idclie_tran` bigint(20) NOT NULL,
  `idusu_tran` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `transformador`
--

INSERT INTO `transformador` (`id_tran`, `marca_tran`, `nplaca_tran`, `kva_tran`, `tp_tran`, `ts_tran`, `tipo_acc_tran`, `fe_acor_tran`, `fe_ter_tran`, `estado`, `foto`, `estado2`, `idclie_tran`, `idusu_tran`) VALUES
(7, 'xyz2', 'ewr2', '32', '43', '32', 'Reparacion', '2015-07-06', '2015-07-06', 'Terminado', 'transformador.jpg', 'Inactivo', 11, 43534),
(8, 're32', '232', '23', '37', '36', 'Reparacion', '2015-08-08', '2015-08-08', 'Terminado', 'transformador.jpg', 'Inactivo', 15, 424),
(16, '23we', 'we3', '23', '32', '32', 'Reparacion', '2015-08-20', '2015-08-20', 'Terminado', '192015114255.jpg', 'Activo', 24, 424),
(17, 'we32', '3ew', '32', '32', '32', 'Mantenimiento', '2015-08-29', '2015-08-29', 'Terminado', '278201516517.jpg', 'Activo', 25, 424),
(18, '32', '32', '23', '32', '3232', 'Mantenimiento', '2015-09-03', '2015-09-03', 'Sin Terminar', 'transformador.jpg', 'Inactivo', 26, 424);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usu` bigint(20) NOT NULL,
  `nom_usu` varchar(30) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `id_tp_usu` int(11) NOT NULL,
  `estado` set('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10694393494 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `nom_usu`, `usuario`, `pass`, `foto`, `email`, `telefono`, `id_tp_usu`, `estado`) VALUES
(424, 'Andres Camilo Rojas ', 'spike', 'spike', '2362015195225.jpg', 'spike@hotmail.com', '3003210344', 2, 'Activo'),
(43534, 'Roger Jimenez', '43534', 'roger', 'fotos_perfil.jpg', 'roger1@hotmail.com', '3120340343', 4, 'Activo'),
(267842, 'Luz  Odilia Chavez', 'yiyadani', 'dani', 'fotos_perfil.jpg', 'yiyadani@hotmail.com', '300746363', 3, 'Activo'),
(1065622718, 'Fabio Andres Rojas Gulloso', 'Farchenko', 'nani', '2662015164255.jpg', 'fandresrojas@outlook.com', '3226352020', 3, 'Activo'),
(1065622719, 'Elsy Maria Gomez Gomez', 'elsy maria', 'fabio', '98201514580.jpg', 'fandresroja@gmail.com', '3120340394', 1, 'Activo'),
(1065622720, 'fabio andres rojas gulloso', '1065622720', 'nani', '172015115140.jpg', 'fandresroja@hotmail.com', '3226352020', 5, 'Activo'),
(10694393493, 'Oswaldo Andre Rojas Gulloso', '10694393493', 'wando', 'fotos_perfil.jpg', 'oswa@gmail.com', '3003405958', 6, 'Activo');

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
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `num_serie_motor` (`id_motor`,`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `motorl`
--
ALTER TABLE `motorl`
  ADD PRIMARY KEY (`id_motores`),
  ADD UNIQUE KEY `id_cli` (`id_motores`),
  ADD KEY `id_usu` (`id_usu`,`id_cliente`),
  ADD KEY `id_cliente` (`id_cliente`) USING BTREE;

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
  ADD KEY `num_serie_motor` (`id_motor`,`id_usuario`),
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
-- Indices de la tabla `transformador`
--
ALTER TABLE `transformador`
  ADD PRIMARY KEY (`id_tran`),
  ADD KEY `idclie_tran` (`idclie_tran`),
  ADD KEY `idusu_tran` (`idusu_tran`),
  ADD KEY `idusu_tran_2` (`idusu_tran`),
  ADD KEY `idusu_tran_3` (`idusu_tran`),
  ADD KEY `idclie_tran_2` (`idclie_tran`),
  ADD KEY `idusu_tran_4` (`idusu_tran`),
  ADD KEY `idclie_tran_3` (`idclie_tran`),
  ADD KEY `idusu_tran_5` (`idusu_tran`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usu`),
  ADD KEY `id_tp_usu` (`id_tp_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bobinadoprimario`
--
ALTER TABLE `bobinadoprimario`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `bobinadosecundario`
--
ALTER TABLE `bobinadosecundario`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `estado_aceite_trans`
--
ALTER TABLE `estado_aceite_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `estado_transformador`
--
ALTER TABLE `estado_transformador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `lista_veri_trans`
--
ALTER TABLE `lista_veri_trans`
  MODIFY `id_lista` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `mantenimiento_motor`
--
ALTER TABLE `mantenimiento_motor`
  MODIFY `id_mantenimiento` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `motorl`
--
ALTER TABLE `motorl`
  MODIFY `id_motores` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `pruebas_ini_tran`
--
ALTER TABLE `pruebas_ini_tran`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `rebobinado_motor`
--
ALTER TABLE `rebobinado_motor`
  MODIFY `id_rebobinado` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `reparacion_trans`
--
ALTER TABLE `reparacion_trans`
  MODIFY `id_repa` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT de la tabla `tp_usuarios`
--
ALTER TABLE `tp_usuarios`
  MODIFY `id_tp` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `transformador`
--
ALTER TABLE `transformador`
  MODIFY `id_tran` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usu` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10694393494;
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
-- Filtros para la tabla `estado_aceite_trans`
--
ALTER TABLE `estado_aceite_trans`
  ADD CONSTRAINT `estado_aceite_trans_ibfk_1` FOREIGN KEY (`id_trans`) REFERENCES `transformador` (`id_tran`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `estado_transformador`
--
ALTER TABLE `estado_transformador`
  ADD CONSTRAINT `estado_transformador_ibfk_1` FOREIGN KEY (`id_trans`) REFERENCES `transformador` (`id_tran`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `lista_veri_trans`
--
ALTER TABLE `lista_veri_trans`
  ADD CONSTRAINT `lista_veri_trans_ibfk_1` FOREIGN KEY (`id_tra_lista`) REFERENCES `transformador` (`id_tran`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `mantenimiento_motor`
--
ALTER TABLE `mantenimiento_motor`
  ADD CONSTRAINT `mantenimiento_motor_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mantenimiento_motor_ibfk_3` FOREIGN KEY (`id_motor`) REFERENCES `motorl` (`id_motores`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `motorl`
--
ALTER TABLE `motorl`
  ADD CONSTRAINT `motorl_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `motorl_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pruebas_ini_tran`
--
ALTER TABLE `pruebas_ini_tran`
  ADD CONSTRAINT `pruebas_ini_tran_ibfk_1` FOREIGN KEY (`id_trans`) REFERENCES `transformador` (`id_tran`);

--
-- Filtros para la tabla `rebobinado_motor`
--
ALTER TABLE `rebobinado_motor`
  ADD CONSTRAINT `rebobinado_motor_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rebobinado_motor_ibfk_3` FOREIGN KEY (`id_motor`) REFERENCES `motorl` (`id_motores`);

--
-- Filtros para la tabla `reparacion_trans`
--
ALTER TABLE `reparacion_trans`
  ADD CONSTRAINT `reparacion_trans_ibfk_1` FOREIGN KEY (`idtran_repa`) REFERENCES `transformador` (`id_tran`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tp_usuarios`
--
ALTER TABLE `tp_usuarios`
  ADD CONSTRAINT `tp_usuarios_ibfk_1` FOREIGN KEY (`id_tp`) REFERENCES `usuarios` (`id_tp_usu`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_tp_usu`) REFERENCES `tp_usuarios` (`id_tp`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
