-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-09-2021 a las 21:47:24
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parroquia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividadrecibo`
--

CREATE TABLE `actividadrecibo` (
  `id_recibo` int(11) NOT NULL,
  `id_tipoActividad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id_asistencia` int(11) NOT NULL,
  `asi_estado` varchar(20) NOT NULL,
  `asi_descripcion` varchar(50) NOT NULL,
  `asi_nhoras` int(3) NOT NULL,
  `asi_fecharegistro` datetime NOT NULL,
  `asi_fechainicio` datetime NOT NULL,
  `asi_fechafin` datetime NOT NULL,
  `id_datosActividad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id_asistencia`, `asi_estado`, `asi_descripcion`, `asi_nhoras`, `asi_fecharegistro`, `asi_fechainicio`, `asi_fechafin`, `id_datosActividad`) VALUES
(3, 'En curso', 'nuevo', 5, '2021-03-16 23:11:30', '2021-08-26 23:11:23', '2021-08-11 23:11:52', 46),
(17, 'En curso', 'MMMjj', 8, '2021-08-13 00:00:00', '2021-08-20 13:08:00', '2021-08-20 13:08:00', 44),
(19, 'En curso', 'ooooo', 80, '2021-08-12 00:00:00', '2021-08-26 19:41:00', '2021-08-26 00:46:00', 45),
(20, 'Finalizado', 'misa privada de luz', 2, '2021-08-13 00:00:00', '2021-08-20 13:07:00', '2021-08-20 13:08:00', 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caritas`
--

CREATE TABLE `caritas` (
  `id_carita` int(11) NOT NULL,
  `car_fecha` date NOT NULL,
  `car_descripcion` varchar(100) NOT NULL,
  `car_tipobeneficio` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `caritas`
--

INSERT INTO `caritas` (`id_carita`, `car_fecha`, `car_descripcion`, `car_tipobeneficio`) VALUES
(1, '2021-03-16', 'juguetes para todos menos de 12', 'Juguetes'),
(2, '2021-04-17', 'El mercado es únicamente para los necesitados', 'Mercado'),
(6, '2021-08-10', 'mercado nuevo', 'Mercado full'),
(7, '2021-08-10', 'carita de prueba', 'prueba'),
(8, '2021-08-10', 'probando dos', 'dos'),
(9, '2021-08-13', 'nuevo beneficio', 'beneficio para jovenes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificados`
--

CREATE TABLE `certificados` (
  `id_certificado` int(11) NOT NULL,
  `id_tipoActividad` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `ce_fecha_registro` date NOT NULL,
  `ce_fecha_celebracion` date NOT NULL,
  `ce_pagina` varchar(25) NOT NULL,
  `ce_tomo` varchar(25) NOT NULL,
  `ce_nombre_bautizado` varchar(100) NOT NULL,
  `ce_intro_extra` varchar(50) DEFAULT NULL,
  `ce_nombre_padre` varchar(100) NOT NULL,
  `ce_nombre_madre` varchar(100) NOT NULL,
  `ce_testigos_padrinos` varchar(200) DEFAULT NULL,
  `ce_certifica` varchar(100) NOT NULL,
  `ce_fecha_nacimiento` date DEFAULT NULL,
  `ce_lugar_nacimiento` varchar(100) DEFAULT NULL,
  `ce_anio_civil` varchar(10) DEFAULT NULL,
  `ce_tomo_civil` varchar(25) DEFAULT NULL,
  `ce_pagina_civil` varchar(25) DEFAULT NULL,
  `ce_acta_civil` varchar(25) DEFAULT NULL,
  `ce_lugar_civil` varchar(100) DEFAULT NULL,
  `ce_fecha_civil` date DEFAULT NULL,
  `ce_numero` varchar(25) DEFAULT NULL,
  `ce_nombre_parroco` varchar(100) DEFAULT NULL,
  `ce_observacion` varchar(200) DEFAULT NULL,
  `ce_nota_marginal` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `certificados`
--

INSERT INTO `certificados` (`id_certificado`, `id_tipoActividad`, `id_usuario`, `ce_fecha_registro`, `ce_fecha_celebracion`, `ce_pagina`, `ce_tomo`, `ce_nombre_bautizado`, `ce_intro_extra`, `ce_nombre_padre`, `ce_nombre_madre`, `ce_testigos_padrinos`, `ce_certifica`, `ce_fecha_nacimiento`, `ce_lugar_nacimiento`, `ce_anio_civil`, `ce_tomo_civil`, `ce_pagina_civil`, `ce_acta_civil`, `ce_lugar_civil`, `ce_fecha_civil`, `ce_numero`, `ce_nombre_parroco`, `ce_observacion`, `ce_nota_marginal`) VALUES
(2, 3, 7, '2021-08-28', '2017-08-05', '524', '1', 'Alisson Pauler Quiñonez Muñoz', '', 'Wilithon Nery Quiñonez Hidalgo', 'Fátima Pilar Muñoz Contreras', 'Wilithon Quiñonez y Mercedes de Jesús Muñoz Contreras', 'P. Antonio Ceron SDS', '2027-05-17', 'Quito', '2017', '72', '33', '72', 'Quito', '2017-06-13', '1565', 'P. Luis Ospina Carmona SDS', 'Alisson, Paulet, Quiñonez, Muñoz', 'prueba actualizado'),
(7, 4, 10, '2021-08-03', '2021-08-12', '2', '', '', NULL, '', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 4, 1, '2021-08-17', '2021-08-18', '', '', '', NULL, '', '', NULL, '', '2021-08-18', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-26', NULL, NULL, NULL, NULL),
(9, 4, 1, '2021-08-17', '2021-08-18', '', '', '', NULL, '', '', NULL, '', '2021-08-18', NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-26', NULL, NULL, NULL, NULL),
(24, 10, 1, '2021-08-31', '2021-08-31', '21', '213', '', 'INTRO', '231', '123', '123', '21312', NULL, NULL, 'erw', '342', '32', '2342', '3242', '2021-08-21', '23', '231', '123', '1231'),
(25, 10, 1, '2021-08-31', '2021-10-26', '87', 'I', '', 'intra', 'Nombre novio ejemplo', 'Nombre de novuia ejemplo', 'Rocio y Cesar', 'P. Roberto Bravo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '255', 'P. Ricardo Bravo', 'Silvia, Aguirre', 'Jorge Rodrigo, cabrera'),
(26, 3, 1, '2021-09-02', '2021-09-16', '12', '12', 'Prueba', NULL, 'sdsd', 'sdsd', 'asdas', 'asdsada', '2021-09-23', 'sdsa', '123', '231', '123', '213', '213213sasAAS', '2021-09-24', '21212', 'Juan', 'asdd', 'asda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosactividad`
--

CREATE TABLE `datosactividad` (
  `id_datosActividad` int(11) NOT NULL,
  `act_tomo` int(10) DEFAULT NULL,
  `act_numero` int(10) DEFAULT NULL,
  `act_pagina` int(10) DEFAULT NULL,
  `act_fecharegistro` date DEFAULT NULL,
  `act_fechacelebracion` date NOT NULL,
  `act_nombres` varchar(40) NOT NULL,
  `act_apellidos` varchar(40) NOT NULL,
  `act_cedula` int(10) NOT NULL,
  `act_telefono` int(10) NOT NULL,
  `act_fechanacimiento` date NOT NULL,
  `act_descripcion` varchar(200) NOT NULL,
  `act_direccion` varchar(100) NOT NULL,
  `act_nombressolicitante` varchar(40) NOT NULL,
  `act_aporte` int(10) NOT NULL,
  `act_nombrespadre` varchar(40) NOT NULL,
  `act_apellidospadre` varchar(40) NOT NULL,
  `act_telefonopadre` int(10) NOT NULL,
  `act_direccionpadre` varchar(50) NOT NULL,
  `act_nombresmadre` varchar(40) NOT NULL,
  `act_apellidosmadre` varchar(40) NOT NULL,
  `act_telefonomadre` int(10) NOT NULL,
  `act_direccionmadre` varchar(100) NOT NULL,
  `act_nombrespadrino` varchar(40) NOT NULL,
  `act_apellidospadrino` varchar(40) NOT NULL,
  `act_civilpadrino` varchar(20) NOT NULL,
  `act_nombresmadrina` varchar(40) NOT NULL,
  `act_apellidosmadrina` varchar(40) NOT NULL,
  `act_civilmadrina` varchar(20) NOT NULL,
  `act_nombresnovia` varchar(40) NOT NULL,
  `act_apellidosnovia` varchar(40) NOT NULL,
  `act_cedulanovia` int(10) NOT NULL,
  `act_telefononovia` int(10) NOT NULL,
  `act_fechanacimientonovia` date NOT NULL,
  `act_nombrestest1novio` varchar(40) NOT NULL,
  `act_apellidostest1novio` varchar(40) NOT NULL,
  `act_direcciontest1novio` varchar(100) NOT NULL,
  `act_cedulatest1novio` int(10) NOT NULL,
  `act_nombrestest2novio` varchar(40) NOT NULL,
  `act_apellidostest2novio` varchar(40) NOT NULL,
  `act_direcciontest2novio` varchar(40) NOT NULL,
  `act_cedulatest2novio` int(10) NOT NULL,
  `act_nombrestest1novia` varchar(40) NOT NULL,
  `act_apellidostest1novia` varchar(40) NOT NULL,
  `act_direcciontest1novia` varchar(100) NOT NULL,
  `act_cedulatest1novia` int(10) NOT NULL,
  `act_nombrestest2novia` varchar(40) NOT NULL,
  `act_apellidostest2novia` varchar(40) NOT NULL,
  `act_direcciontest2novia` varchar(100) NOT NULL,
  `act_cedulatest2novia` int(10) NOT NULL,
  `act_actanacimiento` varchar(60) NOT NULL,
  `act_certificadobautismo` varchar(60) NOT NULL,
  `act_matrimoniopadrino` varchar(60) NOT NULL,
  `act_matrimoniomadrina` varchar(60) NOT NULL,
  `act_bautizonovio` varchar(60) NOT NULL,
  `act_bautizonovia` varchar(60) NOT NULL,
  `act_confirmacionnovio` varchar(60) NOT NULL,
  `act_confirmacionnovia` varchar(60) NOT NULL,
  `act_matrimoniocivil` varchar(60) NOT NULL,
  `act_pdfcedulanovio` varchar(60) NOT NULL,
  `act_pdfcedulanovia` varchar(60) NOT NULL,
  `act_pdfcedulatest1novio` varchar(60) NOT NULL,
  `act_pdfcedulatest2novio` varchar(60) NOT NULL,
  `act_pdfcedulatest1novia` int(11) NOT NULL,
  `act_pdfcedulatest2novia` int(11) NOT NULL,
  `act_nombresministro` varchar(30) NOT NULL,
  `act_apellidosministro` varchar(30) NOT NULL,
  `id_tipoActividad` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `ide_horario` int(11) NOT NULL,
  `act_pdfceertificadobautizo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datosactividad`
--

INSERT INTO `datosactividad` (`id_datosActividad`, `act_tomo`, `act_numero`, `act_pagina`, `act_fecharegistro`, `act_fechacelebracion`, `act_nombres`, `act_apellidos`, `act_cedula`, `act_telefono`, `act_fechanacimiento`, `act_descripcion`, `act_direccion`, `act_nombressolicitante`, `act_aporte`, `act_nombrespadre`, `act_apellidospadre`, `act_telefonopadre`, `act_direccionpadre`, `act_nombresmadre`, `act_apellidosmadre`, `act_telefonomadre`, `act_direccionmadre`, `act_nombrespadrino`, `act_apellidospadrino`, `act_civilpadrino`, `act_nombresmadrina`, `act_apellidosmadrina`, `act_civilmadrina`, `act_nombresnovia`, `act_apellidosnovia`, `act_cedulanovia`, `act_telefononovia`, `act_fechanacimientonovia`, `act_nombrestest1novio`, `act_apellidostest1novio`, `act_direcciontest1novio`, `act_cedulatest1novio`, `act_nombrestest2novio`, `act_apellidostest2novio`, `act_direcciontest2novio`, `act_cedulatest2novio`, `act_nombrestest1novia`, `act_apellidostest1novia`, `act_direcciontest1novia`, `act_cedulatest1novia`, `act_nombrestest2novia`, `act_apellidostest2novia`, `act_direcciontest2novia`, `act_cedulatest2novia`, `act_actanacimiento`, `act_certificadobautismo`, `act_matrimoniopadrino`, `act_matrimoniomadrina`, `act_bautizonovio`, `act_bautizonovia`, `act_confirmacionnovio`, `act_confirmacionnovia`, `act_matrimoniocivil`, `act_pdfcedulanovio`, `act_pdfcedulanovia`, `act_pdfcedulatest1novio`, `act_pdfcedulatest2novio`, `act_pdfcedulatest1novia`, `act_pdfcedulatest2novia`, `act_nombresministro`, `act_apellidosministro`, `id_tipoActividad`, `id_usuario`, `ide_horario`, `act_pdfceertificadobautizo`) VALUES
(4, 0, 0, 0, '0000-00-00', '0000-00-00', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', 0, 0, 0, ''),
(38, 0, 0, 0, '2021-08-10', '2021-08-26', 'ines de la torre', '', 0, 987678777, '0000-00-00', 'Misa numero uno', 'quito', 'Tita de la torre', 100, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', 0, 0, 0, ''),
(39, 0, 0, 0, '2021-08-13', '2021-08-27', '', '', 0, 0, '0000-00-00', 'n/a', '', '', 108, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 'Andraida', 'De la cruz', 8, 0, 0, ''),
(40, 0, 0, 0, '2021-08-12', '2021-08-12', '', '', 0, 0, '0000-00-00', 'nnn', '', '', 108, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 'Andraida', 'De la cruz', 7, 0, 0, ''),
(42, 0, 0, 0, '2021-08-10', '2021-08-25', 'Maria Juana velez', '', 0, 987654321, '0000-00-00', '', 'norte', 'Lucrecia velez', 0, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 'Andraida', 'De la cruz', 0, 0, 0, ''),
(43, 0, 0, 0, '2021-08-10', '2021-08-21', 'pedro mocayo juarez', '', 0, 2147483647, '0000-00-00', '', 'probando', 'leila moncayo juarez', 0, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', 0, 0, 0, ''),
(44, 0, 0, 0, '2021-08-10', '2021-08-19', 'rosa perez doe', '', 0, 90909090, '0000-00-00', '', 'norte', 'julio perez doe', 0, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 'Andraida', 'De la cruz', 5, 0, 0, ''),
(45, 0, 0, 0, '2021-08-10', '2021-08-30', 'Yoana maria luz', '', 0, 2147483647, '0000-00-00', '', 'norte de quito', 'Marcos Ramiro', 0, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 'Administrador', 'De la cruz', 5, 0, 0, ''),
(46, 0, 0, 0, '2021-08-10', '2021-08-24', 'chana dc', '', 0, 2147483647, '0000-00-00', '', 'norte', 'juana dc', 0, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 'Andraida', 'De la cruz', 5, 0, 0, ''),
(47, 0, 0, 0, '2021-08-11', '2021-08-25', 'lola perez', '', 0, 2147483647, '0000-00-00', '', 'quito', 'ines pinco', 0, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 'Andraida', 'De la cruz', 5, 0, 0, ''),
(49, 0, 0, 0, '2021-08-01', '2021-08-19', 'mauricia', 'pell', 0, 0, '0000-00-00', 'probando', '', '', 14, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 'Andrai', '', 1, 0, 0, ''),
(50, 0, 0, 0, '0000-00-00', '0000-00-00', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', 1, 0, 0, ''),
(51, 0, 0, 0, '2021-08-20', '2021-08-20', '', '', 0, 0, '0000-00-00', 'misa et al', '', '', 15, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 'Andraida', 'De la cruz', 1, 0, 0, ''),
(52, 0, 0, 0, '2021-08-20', '2021-08-20', 'yessi', '', 0, 988888888, '0000-00-00', '', 'norte', 'marina', 0, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 'Andraida', 'De la cruz', 5, 0, 0, ''),
(56, 0, 0, 0, '2021-08-23', '2021-08-24', '', '', 0, 0, '0000-00-00', 'nuevo retiro', '', '', 0, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', 9, 9, 0, ''),
(58, 0, 0, 0, '2021-08-23', '2021-08-31', '', '', 0, 0, '0000-00-00', 'retiro nuevo dos', '', '', 0, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', 9, 2, 0, ''),
(62, 0, 0, 0, '2021-08-24', '2021-08-12', '', '', 0, 0, '0000-00-00', 'aprueba esa opcion', '', '', 0, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', 9, 2, 0, ''),
(63, 0, 0, 0, '2021-08-27', '2021-08-27', '', '', 0, 0, '0000-00-00', 'es por objetivo de tal cosa', '', '', 1245, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 'Andraida', 'De la cruz', 1, 0, 1, ''),
(64, 0, 0, 0, '2021-08-27', '2021-08-27', '', '', 0, 0, '0000-00-00', 'Prueba', '', '', 212, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 'Andraida', 'De la cruz', 1, 0, 2, ''),
(65, 0, 0, 0, '2021-08-27', '2021-08-27', '', '', 0, 0, '0000-00-00', 'Prueba 3', '', '', 43, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 'Andraida', 'De la cruz', 1, 0, 3, ''),
(66, 0, 0, 0, '2021-08-27', '2021-08-27', '', '', 0, 0, '0000-00-00', '', '', '', 2, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 'Andraida', 'De la cruz', 1, 0, 0, ''),
(67, 0, 0, 0, '2021-08-27', '2021-08-27', '', '', 0, 0, '0000-00-00', 'dfghdhg', '', '', 2, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 'Andraida', 'De la cruz', 1, 0, 0, ''),
(68, 0, 0, 0, '2021-08-27', '2021-08-31', '', '', 0, 0, '0000-00-00', '', '', '', 4, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 'Andraida', 'De la cruz', 1, 0, 5, ''),
(69, 0, 0, 0, '2021-08-27', '2021-08-27', '', '', 0, 0, '0000-00-00', '', '', '', 4, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 'Andraida', 'De la cruz', 1, 0, 0, ''),
(70, 0, 0, 0, '2021-08-27', '2021-09-15', '', '', 0, 0, '0000-00-00', 'Misa por accion de gracia por el Hno. Pedro', '', '', 1, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 'Andraida', 'De la cruz', 1, 0, 4, ''),
(71, 0, 0, 0, '2021-08-28', '2021-08-28', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', 0, 0, 0, ''),
(72, 0, 0, 0, '2021-08-28', '2021-08-28', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', 0, 0, 0, ''),
(73, 0, 0, 0, '2021-08-28', '2021-08-27', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', 0, 0, 0, ''),
(74, 0, 0, 0, '2021-08-28', '2021-08-20', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', 0, 0, 0, ''),
(75, 0, 0, 0, '2021-08-28', '2021-08-12', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', 0, 0, 0, ''),
(76, 0, 0, 0, '2021-08-28', '2021-07-29', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', 0, 0, 0, ''),
(77, NULL, NULL, NULL, '2021-09-07', '2021-09-07', 'dsfdfss', 'dsdffdf', 0, 0, '2021-09-08', '', '', '', 0, 'dsdsgdg', 'dsfdgs', 98526, '', 'dsfdsfdsfs', 'fdsgsdghs', 12345454, '', 'fdsgsdgs', 'fdsdfsdf', '', 'sdgds', 'sdgdgdg', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 'sdgsdg', 'sdgdsg', 4, 1, 0, 'confirmaciones/rep_iva_ventas.pdf'),
(78, NULL, NULL, NULL, '2021-09-07', '2021-09-25', 'sadffafs', 'asfasf', 0, 0, '2021-09-24', '', '', '', 0, 'asfsafasf', 'sfaffs', 15454212, '', 'asfasfsa', 'asfsf', 1234356, '', 'asfsaf', 'asfasfsaf', '', 'sfsaf', 'asfsaf', '', '', '', 0, 0, '0000-00-00', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 'sfasf', 'asfasf', 4, 1, 0, 'confirmaciones/rep_factura_nueva.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donaciones`
--

CREATE TABLE `donaciones` (
  `id_donacion` int(11) NOT NULL,
  `don_horaFecha` datetime NOT NULL,
  `don_descripcion` varchar(150) NOT NULL,
  `don_monto` double NOT NULL,
  `don_comprobante` blob NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_actividad`
--

CREATE TABLE `horario_actividad` (
  `ide_horario` int(11) NOT NULL,
  `ide_tipoActividad` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horario_actividad`
--

INSERT INTO `horario_actividad` (`ide_horario`, `ide_tipoActividad`, `hora_inicio`, `hora_fin`) VALUES
(1, 1, '10:00:00', '11:00:00'),
(2, 1, '11:00:00', '12:00:00'),
(3, 3, '13:00:00', '14:00:00'),
(4, 1, '14:00:00', '15:00:00'),
(5, 1, '15:00:00', '16:00:00'),
(7, 2, '10:00:00', '11:00:00'),
(9, 2, '08:10:00', '09:10:00'),
(10, 3, '13:10:00', '14:20:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibo`
--

CREATE TABLE `recibo` (
  `id_recibo` int(11) NOT NULL,
  `rec_nombre` varchar(50) NOT NULL,
  `rec_fecha` date NOT NULL,
  `rec_concepto` varchar(100) NOT NULL,
  `rec_pdf` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recibo`
--

INSERT INTO `recibo` (`id_recibo`, `rec_nombre`, `rec_fecha`, `rec_concepto`, `rec_pdf`) VALUES
(1, 'Maria', '2021-03-25', 'misas ', 0x255044462d312e340d25e2e3cfd30d0a312030206f626a0d0a3c3c2f54797065202f50616765730d0a2f436f756e7420310d0a2f4b696473205b34203020525d0d0a3e3e0d0a656e646f626a0d0a322030206f626a0d0a3c3c2f54797065202f436174616c6f670d0a2f50616765732031203020520d0a2f4d65746164617461203136203020520d0a2f566965776572507265666572656e636573203c3c2f43656e74657257696e646f772066616c73650d0a2f446972656374696f6e202f4c32520d0a2f446973706c6179446f635469746c652066616c73650d0a2f46697457696e646f772066616c73650d0a2f486964654d656e756261722066616c73650d0a2f48696465546f6f6c6261722066616c73650d0a2f4869646557696e646f7755492066616c73650d0a2f4e6f6e46756c6c53637265656e506167654d6f6465202f5573654e6f6e650d0a2f5072696e7441726561202f43726f70426f780d0a2f5072696e74436c6970202f43726f70426f780d0a2f5072696e745363616c696e67202f41707044656661756c740d0a2f5669657741726561202f43726f70426f780d0a2f56696577436c6970202f43726f70426f780d0a3e3e0d0a2f506167654d6f6465202f5573654e6f6e650d0a3e3e0d0a656e646f626a0d0a332030206f626a0d0a3c3c2f466f6e74203c3c2f46312038203020520d0a3e3e0d0a3e3e0d0a656e646f626a0d0a342030206f626a0d0a3c3c2f54797065202f506167650d0a2f5265736f75726365732033203020520d0a2f506172656e742031203020520d0a2f4d65646961426f78205b302030203539352e33323030203834312e393230305d0d0a2f436f6e74656e74732035203020520d0a3e3e0d0a656e646f626a0d0a352030206f626a0d0a3c3c2f4c656e677468203231310d0a2f46696c746572205b2f466c6174654465636f64655d0d0a2f4465636f64655061726d73205b6e756c6c5d0d0a3e3e0d0a73747265616d0d0a78dac4933d0b02310c863be75764f4066bd2bbda661554703b2838888382badc899f08fe7adb535cea2ad7d2267d21cdc34b4b3807c6039ca18e8b341b7c00750221698a8305db78f0156b31d88015ab4b16f1eea7f62d6a608947604a42e99dc5f0844980d18cb122c2b07fb7a33453e2ad261f4b0d3a63b535290b2dac066a5aacc302a62132f683c6e475e544649cb15d0b1ea89bdaf48ee89ce67887d80c71570ccd0714d37657c7fe794bce414fbd435531440f7dfe062f6fe7766adbb9f927ffeaee1bd6f0020000ffff0300b336b6870d0a656e6473747265616d0d0a656e646f626a0d0a362030206f626a0d0a3c3c2f54797065202f466f6e7444657363726970746f720d0a2f466f6e7442426f78205b2d353032202d333132203132343020313032365d0d0a2f466f6e7446696c6532203130203020520d0a2f466f6e744e616d65202f4141414141412b43616c696272690d0a2f466c6167732033320d0a2f4974616c6963416e676c6520300d0a2f417363656e7420313032360d0a2f44657363656e74202d3331320d0a2f43617048656967687420300d0a2f5374656d5620300d0a2f434944536574203132203020520d0a3e3e0d0a656e646f626a0d0a372030206f626a0d0a3c3c2f54797065202f466f6e740d0a2f53756274797065202f434944466f6e7454797065320d0a2f572039203020520d0a2f466f6e7444657363726970746f722036203020520d0a2f42617365466f6e74202f4141414141412b43616c696272690d0a2f43494453797374656d496e666f203c3c2f5265676973747279202841646f6265290d0a2f4f72646572696e6720284964656e74697479290d0a2f537570706c656d656e7420310d0a3e3e0d0a2f434944546f4749444d6170203131203020520d0a3e3e0d0a656e646f626a0d0a382030206f626a0d0a3c3c2f54797065202f466f6e740d0a2f53756274797065202f54797065300d0a2f4e616d65202f46310d0a2f44657363656e64616e74466f6e7473205b37203020525d0d0a2f42617365466f6e74202f4141414141412b43616c696272690d0a2f456e636f64696e67202f4964656e746974792d480d0a2f546f556e69636f6465203133203020520d0a3e3e0d0a656e646f626a0d0a392030206f626a0d0a5b3332203332203232362036392036392034383820393720393720343739203938203938203532352031303120313031203439372031313020313130203532352031313220313132203532352031313420313134203334382031313520313135203339312031313620313136203333342031313720313137203532355d0d0a656e646f626a0d0a31302030206f626a0d0a3c3c2f4c656e67746820393034320d0a2f46696c746572205b2f466c6174654465636f64655d0d0a2f4465636f64655061726d73205b6e756c6c5d0d0a2f4c656e6774683120300d0a3e3e0d0a73747265616d0d0a78daac923d4c535114c77f14db0643056974303169b40ec4c4e8c28a938b8b6e46255a4b3f943e78967e62c14a550445abb5f899e2047111179581c43868e2a4111307e3eaa292a81b89ef79de7d85962638f96eee7de7f73fe7bebcf3bf37114f8668214f33fb83a984efc062bc157808ce85b01ed13a5d1fa7c075043cbb23b16c38ff7ef31ef016a0cd1f0d057a8bc6afedb06356f6744545f018afddc25f84fd512d9179e73476c1ce26e1bdb18160a0b4a567abf03ee16d5a20a3c7fc5f3b840f0afbf47848efee6cf92edc27dbbf81bb024689fae710671894ffcd7399494abce433a72848748f47ccf098a7bce22d9ff88f8f91756ab436bfc08517cc65f387312373deb9a94e29097937f86a8ad96e2e35684b46c96c37e65d1d6c547b3d8e0fa2fe6efa632e3bba2d36bb2c768c49dca676fc74578c3963b6c183c31ce518c7e9e12401e9bf9728a7c5993e6268f42bea975c44d6b0d009a90a4a9515d7aa06d065c649902425439778b04a56eeace224691919b20c718e1cc3d535ad949c64861467648e705e4ee602a32a5a79db4a818b5c92531be30ae3ffa4f1d56882ab5c9373bece8d75e3c935549471935b721f6e53668abb722f1ec87d5eabde51fa7d2a4ccb9db1726551a65564651778c3339e30c773e565505cb31d59f125ac3cd4c5839c7458a8fb63dbbff4aa5b23d2bbd5db44b5d38ce8a3753b52551fadca8254da5fb1cfc1faca70831345e9c18e6b1dd95456fdd7d47a57d651ff020000ffffb494cb4f13411cc77fd36d015b2b25c184e881a9234d0dad9e7c61c562776b7da05431696bc52d29b5f8c447f42f50938a572fa2627d607c651688168c4af01945453d9878345e3c186f860bd6dfced25a887a732799f97cbffbddd9cd6f7646b8857af49454e69c503acd74ffc667e13ceec04bd8eb55d5298b6cd045c1a5fe8562b657e8cb7005aee25af4092a8c86730db90faee3debe0137e116b6df5c4ac678076e8b95e3a0413f0cc020aee45db80739e1ffebde9ffc8129bfbfe80cc130dcc73fe4218ce049338aade03c40efd194fb4478861e85c7a8f594a19ec1733ca15ec22b1883b7f014d51bd1bf40350eefe1037c2476a477f015fb4918b77c8139d08467f230d6b907dab0fdc7cb320fe6426f7e227f3c3f218520455ac918d6358b55e92604cf8de2456ac16afe0cd53098ff21c571744f7eb2a47f66f3dffdb193278e1e397ca8ebe081fdfbf6eee94cef4e7524db77b5ed8cef884523db5bb76d0db76cd9dcbc69e386f5a17541450eac6df2af695ced5bd5b072c5f2654b972cf67adcaeba856c416d4d7595a3d26eb3ceaa282fb3982513018fc2822ae52e959b5d2c14f2ea9a25d04894182aa76805a7673855458c4e4ffa31999a91f41b497f31491cd4073eaf872a8cf2d732a339120b4790cfc82c4af937c1cd82cd2e21ec289c4e7c822a35699972a25285078fa5338a2ae37c9acd1a60810eabd7039ad5866843e26ed6a51177231160722b0d9a092aecfa6bb954a72492bc251c51e4f94e675478101073f1b2002f1773d14efd9be134d53c2399ee9c03dad5fad949964cc4235c4ae0431949c9644ef1aa7abe88c9fc17000000ffff7c54bf6fd350107eb115c8c0e0a1a0481e78d6c99522a70a523b3074b0e21f0465a0a1417a66b2ddb86a372606a6ccee3f7386a56cfd533a7484b173b97b7eb69a0a88ace4dd7df7e3bbfb9e33f97637a6912b9c429c6000546cf9b16f30c0a1ef80acef059187dfbf763d85f13cf39d7bc1471eb15f13e1dd5910376248f3791e73b9ba0e4549066e57aab5a528ddef229c05195a3923371df2f21323db0ee9d373f058aa2437cfd78b316e4b7930a5edebc7a7877089f67e5e9e5df06f51d510c7edded60ac3980e6161664d9a37338a2f721ae292d7b05238832fb807f336801c9235b83c553ac5a4e15e84223f3359384b62e625933a8f5b825c0b56eaa7387cb86d8ea4fbe3501c898c79e0ab8844d94f6ab539c7d7b9bba1fb792e95eb6198d1fa325055c62a8183935b6ae7e98e3a8b667b12dd05f3e4cffd9154966b67ac1639644a5f303f26c021b9b4c98ace8fa51ab8a20ba32e26824f3b75c8b0fd68c190cda9d1c2f532affdfc87926b380d7d1c3daae590a3e7d4f6f927b5369a094d6452c58f08ee141d1a82a6dadf795abc0bd39832462ce7a2836c9fde5cf2595446bb58c5b144712215549001dda1f044f16cbc6badeff21496abcf4aab6d6ec97ac76af1b7ad85c223b833ac88ee601ab89dacda7ea7edde5c3c81df773030afbade34c2f6f92abbcd401f86d155861f820cb00cc0639e07d366245e78eb3ca27735a5bf3b480b908e4cebe2fa61fb070000ffff4c564d6bdb4010dd556cebd3607208055d6cb63285400a3d955012a192a66e4ef107684d0f7215837bebb12d2de866a33fd2eb2ab9c8b9157aed4fe96f70dfeccaad85646bdfbc7d33bb9e99f587b28ae3f2d355b63a475d946274578a49fa2ad4c18fd3efe157f27dcc6ef8cd348194c5924af0cd6d15f3cd649e6e7bf8dfbe99a6f716b75e6789ac9ec2966efb8cc51ab5082590067d1a90d2180347f3c36dcc58a1ad2d0de8715e73a631678f7196d796c17ac6d1503b8a99054bcb58e23dbb05cc315861d8cf1ab6034b8f2c8f0c0709d34673558c3638f6dab113bb7160752d6c2941f7401ec175397b087897871534c71aae7951b971b8d54ae38659804958f10f43e4443b10823fb3f0d9ff15cce6e943c0a0af3fc148e842163e592187709e5cf5ef28ffbec9559949ea1eec04b98a9b2b2e2e98b2c40522ee04ca13cb44f92221fc92f04b837708b791f9fc84e3c7a6a65b66028d181593b2909b5a3b22c97ebddb4dd3c1eff08f1ca096dee399a7ca3dc5e1d68ede81774d4f06f85a15f982e260b394e6dad12897a8cbbd202823e542c16d14c078a3e750bd61528e5c5b08fd0a18ada3904a9e92d3f4a3d4f5da53ecad38579da1d16c0fc9d173591e8b17baf9a0d6bd684d5f2e626393d42021867026cd26d90122cf054c79d6373932412d9bc3c20b0db244cf6f0d97faf1c2c6c868594791dff5947b0641dcf4ee9f51cf6947b69426783d5a3704f8ee291f110d0fb6b29980dd816944b1e05e2354a2fe2499db9a8dc567b44e0a5a2bd930ab6e345ae07433f37d20e2e57eb2434dd06f347e19d4a69507d877b4847af7437c191c5ce81d74fa51feb170fb170000ffff7456cd6ed34010de7552120e86a4e2478a2f1baddc8b09012124520e89d436c895a84c5421bb10c9ae9b8050f9132fd00b97957ae635b6125538201ea107c4954879801e788020be59db815654f27ab3e399c9eecc7cfb0d80ca22755ea09f79ad5bd5f352db8895aadaff37c8e255b517b3115a6e4aac80990aced49bd820aa949b47d69667666e66b529c120964b038d4e09f0698abd88b4b0e5c0dc65172af17f9488a68d73557b58ac78beca92a9f48bb3cb978b659f069a41f776d643e02874d7a2565e397a1f9559a85046841235b92ae9658c1fd18891a4052c50fea83a02cd412ac25d143b1cf663d557d4a2a6491eb6fc9ff41bef8c4be082a378e0888ea30f02114722466bca9f84cda60334621663f4a932212a08b2f3043ba6554914953843a71239ba02621a2723d9048368ba81b2e8d31ecb396c98a39454dae0b60f65b85f01ec7c9af0bcf36432a2167a4c1df4c8d8f6b15d131df2e66c48607904b189250287ab6f975ea9a2067d187b88445d2d2bd151b88287608ff24afa34065511230993eac4c10a41f06915c151a678d925c50c02b49bd7ded1b0e2fe9598e7ad9729578d57ec6c10eaa0503178a21fef3d6ddd7c808f74783ed8098b7baa449f7d84b787aa72c85a686b3bccd363ec7d32758a84656690180ec9f1b5609b82879e3b88e98572b6c4d8ef0fa5ef4b5758895558873d665bec93fee8855f4104037683adf2e3e3ebebebd556e51b5f035f08be0d26e37cad77b56cd99346a32b27f72f1d96eafe17defadcad1c5a16ebcea7f393f67c7abadc699ff2f6cfd97456fb7552efb4efcd7ecceede717ad71af664bff1070000ffff5c974f6cdb541cc7dff3739e9f1b3bb19dbf8de3a67188b3366bb224cfa9d22eb11b4aa79575ac5aa9b4ada93469aa04b2b40d76aca68903e2d2038203dc39704048ed06e4b8c376e1504d485c60176e685225b4c32631d2f19e97012292f37dfed9bfefe1f3fdd97ace796ee987c045782f40bac7fb7d39f07c41da0b9849d6abe60eab87f5ea6195d9544f352e41bda88747322648521297ec9ae0569c76abd5ec092e754a764c086bb43ddf43ade6948092af2b3d819f43f4d35f97d13b232cdc2e799badc8542e9e547144c8678db9d365ede295f2e99a252109a308914eccf7edb783b7ec5f24dd4aa52d8310c34aa72c5d1afd1a89fdf934127bf1a618bcf81ce1c52def0df4c50411448c8753d9c9d9c5e2d9cd784213a3094d4f13c9d09513cb5ba38f5379ee914fa55e798dd6d8d6e21b00d02ea37f127ccba9efe72ac397bfdfd5e01ad33feec6c7aa86fa8ced01d6c2eb51ae82eecb72623a310d64901b42e2ab771c78df818f1ce838787208950375bdc2641f6f00efc8e3690c6e7ec002a91b9d4ebdaefd56e5bf260b64df090da20170601ab16e95b7df0bd475cc0d0e02e6c0f2f07812ec3b9a8751e6688bb6e3eab4dd2a32b6a9b0a0ff6f8976c509958c3ecbcccc64841da2924884fd1d63784054591465b63e2f40a24e88670cd320858af851a5400c3369983a397e5fd6f20923a749c70da29b6ca703b65e1e210ffd085aeccdff8c13f3a7e3fd42bfde475139431506886a8c16cd46f92aaec17374089ffb3150a9c4015480c6908205ce94ddbac059aa638dbed27bbc676128103fa9671e02aa5161f13e8580424a6b4bb34368faf14736b46dd17a525bed3e56d644507f4df7480f196f0f18e490ee83eaf6a03326ddec344e6d0f4c5f8d6620cd3c0cb89f1d1aa60360c3b4c83c6bd693a0b6aa741f07dc375bff0f736e5d1d84e4311b7dc7715d8cff19ee964b6bc2bf0f404fe4e39e927825954cb79aed79e469793357882d7eba7ee6c3f5b9deadafdfdb4d37ce77ba57cf3614a2c8a264f63777e8d54f369caff696aff50b972e2c5def6615056345b9ecad94577696cedd582dafd00bae69952ca24dc627ad5cc94a9c7cf7f6c683cc9c37b372b1bfcc32fa9265f473e42698055df03dcfe83bcf8313c5f67882dbe3896eff0d0000ffff64974f4cd3501cc7fb6f6bb7ceaeeba3d0ba4936241bec0d46000b23b0353a160643630c7f629c21821ecc22a0220a1c14b9182e1c3466f1c2c1e8cd080952e3c58309570f78c3c48b31d9c1b39a4c7cefb5e8122f7d7debfbedf0fd7ebedfa68eea784f54372cfa871954a1820ec1303a01b18b50436980d83768315ed343a95ee35484737558b4eb4d743898930b2974bbe51ac5906790110d293ab96fc3fd4ff96270d79e8be2415434f6a80bcf6e97d030e63b83d46e48e1aa718a23a61e3548c0a9103560570befe8cd07eaeb71ffb09fbaa6378a309fcbc510be6a5d4871f320ace961456819191a6ab9b23ed1f24aed1e37c3697330965d39939eecd1e96f0befd67281685feb0dc1c7731cef135cbd824fe03874a97e6ded3d299f7df87a6170756640899feefc5dbe30d13fbd8c7350441a97510e20fa9eaf901cc49346c698355880950361a4170091848cb44c60191338160992888445ffdcc9c2e7908148fa1dac6c37671d7ec1a6a0f53b3689ec45b2da91e0b0f8914862ef3eb7c131ef39fa2347735c2879101dd62a53d29cc4489e4a087950dd2fd6768d6dc067582437986188cd309bb8c45ee90ef98f68f200b92169951225c912e367a590a7520a114b3e60f4490648ebd0a8f523758d0c56bccb6e1a776dc1ab3183bc0678b61cd3abdb8db9b9f3e64c3ee9e34537cbb0bc688ccf9bb32f6ff6f5cf6f4e5f7f32d5f682bdb7387029dd843e16639191bbe3edea71959774e518f0fb445d03e9256be9f6db0783d95bcf26c1eae3f6c2d51e0ab576f9f017bb89d4efa42ca2bd5f919156005f32dd741c60c211b5c0e970e0100f9c0400877c40806f14657456c4fe881873d18b8e88d833113ddfa54cb4a51a658b769bdeb6e1b8de9cd70bae028560555219dce6b096758859a7200c6eb59111b15433a3d9437ffbdb061b83ece603ff91ae1a0659d94d41b149d6daf31de9952cdaea5a18f06e25d4507f42e60b4f472f2e1722ba2062724581f18f5ece364f8e55d78f7e61d704d1c3b21e51581c3b3770edd11466f80f000000ffff9af96f0af355602882ca898db07242d18c0b1a5a5cd0d0e282950f5cd060e302059bb828a488001716122069486981b58cf014f0c75946e02f22803a09151158020e771131294ec3c5d1410529044544a585d8357d7c037593ba40458431b888705377a972b68b3497627c59b6a7d95d40c944f99f1dac646079090c4866666090566ad9698afab4ac2f756d4cb111d67436fc372b38c226a50692469996836bca3650d86e29306554e38706293f3424f96141cb0f0d737e50d00a31380803939c832090008531831430c4551d38b5bdd4f845153c4541690fd88200a5bd23c0a07b084b75d21bb5c10ab972102a25204ab591020c122438028d8d6939131b270787b8ac8aa8a481a995327a5a5375b4b294e5555491e5616166644e129313e4e4e4e410d1f331ffbb0133b5359bb9a8f33373707171f24903c324f0ff5ba673c030f1641400e75b1e7d6f7b6f7fef7aeff5deac8ed020708486912334f302e9039b85a17c0128cd0da219ef38c8ab18a918f14883f2ae3428db4a83b2b234a81c90066565e95d8cdf1818fe1f70e002353b781c80e23c40e31cd480e6d9f3ace761e2d1bb6bcef55a30403041b04090d95cd05c50cce6b6a334aba697d80b48620586de5b4150732d56e0ad0030c463b5b5af40333cb815076142ca545573bdbb39825caf7318040504150499f920266adadcce019bc92af602968c817ab5c1c682ca57a4d8618195a49036b51e1b94cf268a147ba222c0783a671cd7e46710ee6a20c6c5c2c6cdcead6d1f66a1e56224adee10101ae8a0ae19541da4e261a529cacecccccccec5c6a964e6a9afe5a029aae110141aeca0cec8e70a000000ffff5c5a4b68135114bdf36626936927c96492669ab661f2ab69ad635b9a7e28b18df84b91b6888d0a5a82527061baaa9f859fad742b4550ba74a9425544b05aa8c58a18446deaa7b87055a1866e1414b17adfcb4c5a5c5ccecc23f72dee3b73eeb9bce491257ad01f377ce8f0eac3f55aacab715bb2c988b6f41d49759e1cd8a16835aae209a8dea02a0582015facad21d1d9148e6e4f8d50158efc5d27e3c21de88549c6f066f0c64cebd44ceb344deb344dcb569b16f34d4a74457799a55826e42ae999f6479c3023b192970a94da1d963d2e2c50879cc6ad4b79fcad9ed65da5bc9e9168c2bdbc542e674b9d5ab0655528f31a2d9aedcc6c86973b962316f3fa03760723e34e35dcbc53df3f960e5df168d41d5fb68dc32ab5659a67b5fb801e6ff03b4559148e87a2aa5b76341e9c1822ee70dc57e7959625853a69051fbc75be7878a36a342757c9a2bb166b34853e619a9fad742a03fb537582f23541f99a70d25182b98284caa60aeed7c3f2976f581534ac0a22fe645a411f68090d5b3c0ceb8b3030392dfbcc8144b5181c88a36ade770fb24ec568dccfd964b509cc44232d5b096e9af120cf5250361847fbb7762adbef6e5a31e604baba2b0bfcb4a4856af490d731789db524c91fae45f570eaad99b6be8bfb24bf8162a2c9954e75213b943a3d798a446dc1f8f37d38b7a7f158969cb35728d3001cbd5f9e15db3b729ed40f083ad905e4e3b54bafb6fc4d6382795ec0618c94ef27310936805bd8bcb1fcefae5311dcb8f81a27c0af709b2fc209210937f8df304a91067989ef113844ee4204dfa730670ee6b8a3a499acf037855dc237f1bc63d4b12e5d637b2b304ce779a0bd558556b80aa075c5d770aee766647ef761f2823c871e30c8a2859fa1877c822cf988f81ef18385cb8845c425c477886f11df20ce213e457c82380b5910c80a24314630f8cad318c62d8c250c11cee04e1c54633e077e320f7b31c630ce92f97f000000ffff34cc354e450100044020a1a0c7f5e3eeeeeeeeeeee10dcf5081c8123505071365e33d54eb29b0dfb0a3232d8fe05dd77f0181e168af8fc898a0f1f08fd467cc03bbcc12bbcc0333cc1233cc03ddcc12ddcc0355cc1255cc0399cc1299cc0311cc1211cc03eecc12eecc0366cc1266cc03aacc12aacc0322cc1222cc03cccc12cccc0344cc1244cc0388cc1288cc0300cc1200c403ff4412ff4403774412774403bb4412bb4403334412334403dd4412dd4403554412554403994412994403114412114403ee4412ee4403664412664403a84200d522105922109122101e2210e622106a203fc030000ffff34c6d5360300000050d35dfbff17d34c4e0cd3ddcd3093d3dded1cc7bd4ff72f41299732299512299622299402c9973cc9951cc9962cc9940c499780a4fd27f023dff2259ff221eff226aff222cff2248ff220f77227b77223d77225977221e77226a7722229399623399403d9973d49caae246447b6654be2b2291bb22e6bb22a2bb22c4bb2280b322f73322b33322d53322913322e63322a23322c43322803d22f31e9935ee991a8744b97744a8744a45ddaa4555aa4599a242c8dd220f55227b55223d552259512928ac82f000000ffff34d6374e0441180561153129193b7b0f022458711afce2bd11de7b6fafd0247b3c1a3d2a7af5f7cc01befff8f6e5cbf8343e8c77e3cd78355e8c67e3c978341e8c7be3ceb8356e8c6be3cab8342e8c73e3cc38354e8c63e3c838340e8c7d43f6207b903dc81e640fb207d983ec41f6207b903dc81e640fb207d983ec41f6207be81afa07fd83fe41ffa07fd03fe81ff40ffa07fd83fe41ffa07fd03fe81ff40ffa07fd83fe41ffa07fd03fe81ff40ffa07fd83fe41ffa07fd03fe81ff40fb207d983ec41eda076503ba81dd40e6a07b583da41edd0f9f98b5edf5e6986dbd5cca519a8b39b6ba7344375b6736d65364bd35f6723d77a662db39a5929ad913acba5d5a9b39459cc2ce4db7caeb94c378fb3a5355a6726339d99ca2f939989cc78191c6bf77e010000ffff24d7695b8d51140660e7c8902143d139e74d86448594b14c29191a349342a142fdbcfd6b50c6cc850899b5afee4ff7f5ac67aff57da727308efbb887bba1a43932268d620477701bb7308c217b37a51bb88e410ce01afa711557d0875ef4a01b5de844072ea31d6d680d494ba4059742d21ab9880b21698b9c0f49fc3fa79b710e4dba467b67d160ef0c4ee394972771c27a3dea701cc770d4b12338ecca21d4a2c6b183a8b67700fbb10f55a84405f63abd07e56eee46197639bd133bec6d4729b6a104097221d711c92213729d91626c35dc8222c3426cc626dd466c302cc07aacd3adc51ae4eb56631556866c576445c87647f2b0dc302da5b06c89d47ffc5b7a92fa2bfdc16ffcd2fd947e6001dff12d64fa225f43a637322f7dc167cce93e491ff101b3ba19bc377c87b77883d79ebc925e4ad3d20b3cc733dd533c317c8c294ce291270fa5078b000000ffff24d6c5521d511080e1baef3073790ab66c6145080ec125b8057797e0ee1adcdd1a770beefe3a34f5afbe6a3d67aaa6a6063ec5c65ff9101b3fe51dde48bec20b3cc3132d8ff040f21eeee0166e68b9862b92977001e7f01fcee83c253a816338a276080724f7610f766107b6e9dc22da840d588735b1da2b22d660651556601996601116601ee6c4aadf6bcb2c5b66609ada144cc2048cc3188cc2080cb36c882d833040ad1ffe411ff432d043d40d5dd049ad832dedd046ad155aa0199aa091ce06a27aa8835aa8816a3123942a3123954aa81033562987bf62fa2a6562eac7d8522aa69d5202c58c173157080562462bf98ce7412ee44036644126ab33184f873431a3945496a5d0990c4990087f2081b97888e366b18cc740349d51100911100e61f09b870ee5662110cc4307b13a908302c09febfa71902f5b7ce017788397180e8aa718df277888f1fd7abb8b51a1b88961abb8d2e202ce62e87f81e5279113fc20e928c617000000ffff2495576c13511045710c0176bdb6d7981a6068092509106ae8a67f20c1d74a80044880e440e083228538d9c434f143ef103a8400a63e7ae8bdf74ee8bdf7dec2b5eec7f19977e7cd58b66c6d0ed455f927415d943f17eaacfc61a893f275833a5201aa03d55ef9f07c77b4e3a9ad32fb406da8d6ca8cfe345a51a9caec0eb554666fa88532fb42cdd96b4635556612d48437539419fd608d9519fd6f36a21a723c99ef904425725903aa3e97d5a3ea520954bc32a3df521daa3677d6e2ce9a5c56835b84aaceb96a54552a8eaa425556de7e5025e5ed0f5554de015005aa3ce5a7ca513e0e981cf032f4506ecaa05cbca9f3a6c6b02c55862a4dc5f26629de2cc9d049c5500eaa44a0d83350a2fcf30c92bf9ec1f207f56ff00bfc44f603d977f00d7c055f907f069fd0fb88f307f01ebc036f91bf01afd17b85f34bf0023c07cfdc4179ea4e9327e03178041e227b00df07f7c05d9cefc045e036b8056e1ae972c34891ebf03563985c3512e40ab88cfa92912817c105701efd73c8ce1ac3e50cead3a84fa13e690c9513c610396ea4c931232847317b04fb0e834320507c10af07c07eb0cf3542f6ba46ca1ed72829748d96dd6017d8897c07d88ede36f4b62253600bd80c36e999b2510fc9063d5bd6ebb644f41c5907d68235a000ac06f97ab2ac8257821598590e2fd3d36529ea25a8178345a8f3b06b21762dc0aef9c8e681b9600e980d668199989b817dd3b59e324deb2553b5a04cd1f265b25620139df132c1992ae31da932ce0a5b6323612bd7b2ad9c886de9b643b7e3ec1e76961db18bec802f56cbb64256562464655a19d69848865518f31f0000ffffd45bcd6ed34010def50654e126eb429d34758a2321409101b507c44a80ba4a5b53084d932603494a537e4a0a4810b0bd9c90e8a5552f051ea1775fcccf810b8237c8239037680fbd875d479c9038c3ec6866bed148fb7de7d1eca08eb6cdafc1eb5040428c8b409023814381e7059e165843c21079414603f0c00f3d405ec5dbf2222f7135f2fa9e863c7c42ed663debb4ab96aa6fbca4e1be822ebc0cbbf0a2f31c9e49824fd9263c0937a1c336e071b8018fd84378c0eec33a5b8376b806f7580b56c316345903eecaf93bac0e10d6a1c6aab01256619995a12cfb4bac04b7c312dc628b70335c841bcc8505291ee58c5c3e470c45a09c934c90858bd316b7fad6a195405664fdb0c8493a694f6a059ac573cb59dccdbecdbecf123ad19bd0f844e1824b33bdcccfcc4126718a670a975c9436d2f9343195b6f452dd8df3ecfc30cf5c8eb5dae933e75c6a626adaa6b67060e21d44701e63840d99c8889cf9824ddb25dfb05a0d1d43187f4075a7f47504ad94a291ca6a8477a3b3351579b5151ddf8d10b4561b1f317ed78c4f0fa271753b12e3edbd3d34552c4553b5c627b2bf3f556c96a22d55731ed703552339d274dabef09d06bf8ec6fa638763c4fc6ef40c8d524ce9806a9c4af23465a734150629c25333575c9ab4939a0a832449f3a4ec287de7472b7597eab6aec1acbeac6b5c9f9d73b97e71dafd43e767a573f8b313b46568fb8113bb444d2c14745457b91f48ac9e883172fe6ac33199d67d69c1ef66e0fcd786ff1522bf000000ffffd4dbe55214000004e0bbc32eec42454551c15644ec130350c1eef6ecc21151ec7a2530b0bbbb5b6cb0c0c2c46fc6a77066bffdb1efb0ff6ffe1d76c215a1dd814868173bd9c176b6b1952d6c66131bc96303ebc9651d39ac650dd9ac66152b59c17296b194252c66110b89b080f9cc632e7398cd2c663283e94c632a5398cc24263281f18c632c59643286d18c228374d218c90886338c54861266088319c44006d09f7ea4d09764fa90446f7ad1931e74a71b5de942671249a0131de9403ced69471c6d69436b6269454b5a1043739ad1942634a6110d69407dea519768ea509b5ad4a406d5a94655aa50994ae10a1d458820814024680bfee137bff8c90fbe53ce37bef285cf7ca28c523ef281f7bce32d2514f386d7bce2252f78ce338a78ca131ef388873ce03ef7b8cb1d6e738b9bdce03ad7b8ca152e73898b5ce03ce738cb194e738a939ce038c738ca110e7388831ca090fdec632f7b28203f10f90b0000ffffecd5b75103400045415e6994a19c0aa880040f02e13dc248784f816c0f8470333b175ff0dff5edfee2930fde79e395179e79e29107eeb963ca845b6eb8e68a31975c70ce19a79c70cc11871cb0cf1ebbec30629b2d866cb2c13a6bacb2c2324b2ccecccd2e64ffd97ff69ffd67ffd97ff69ffd67ffd97ff69ffd67ffd97ff69ffd67ffd97ff368401a9006a40169401a9006a40169401a9006a40169401a9006a40169401a9006a40169401a9006a40169401a9006a40169401a9006a401d97ff69ffd67fbd97eb69fed67fbd97eb69fed67fbd9feff4ff0ab33f8dbcfff010000ffffa2183114172335cc4040223e0e000000ffff030006af332b0d0a656e6473747265616d0d0a656e646f626a0d0a31312030206f626a0d0a3c3c2f4c656e6774682034350d0a2f46696c746572205b2f466c6174654465636f64655d0d0a2f4465636f64655061726d73205b6e756c6c5d0d0a3e3e0d0a73747265616d0d0a78da6260a0103032500b3091a98f9981054cb362c8b001313b107330703270317003000000ffff0300054a00430d0a656e6473747265616d0d0a656e646f626a0d0a31322030206f626a0d0a3c3c2f4c656e6774682032360d0a2f46696c746572205b2f466c6174654465636f64655d0d0a2f4465636f64655061726d73205b6e756c6c5d0d0a3e3e0d0a73747265616d0d0a78da6260606068006216204e61da03000000ffff0300079701a70d0a656e6473747265616d0d0a656e646f626a0d0a31332030206f626a0d0a3c3c2f4c656e677468203231350d0a2f46696c746572205b2f466c6174654465636f64655d0d0a2f4465636f64655061726d73205b6e756c6c5d0d0a3e3e0d0a73747265616d0d0a78da6c50cb8ac3300cbce72b746ce9c17dd05b289494420e6d97cd1738b612048d6c14e790bfafed64f7b0ec1c2ca4991123abaabed54c01d49738d360808ed80a8e6e1283d0624f5c1c8e60c984b5cbaf19b42f543437f31870a8b973705a5476f2ab527dc732069961f3a4206e0b16bb42bdc4a210f7b0b966ec2afda65668a59bc9fb370ec801ce79826c733d2c6b8db3387a6d5034f75894fb880b94f7884bd2fee15757dbfd2387a54bae1f3e2d48b7550fed9f7a40309348cc924f53699ab210e3ef1f79e7932bc7fc000000ffff03002a6d6f2b0d0a656e6473747265616d0d0a656e646f626a0d0a31342030206f626a0d0a3c3c2f4372656174696f6e446174652028443a32303231303331363233333931335a290d0a2f4d6f64446174652028443a32303231303331363138333931362d303527303027290d0a2f43726561746f722028feff004e006900740072006f002000500072006f00200031003000200020005c2800310030002e00200035002e00200039002e00200039005c29290d0a2f417574686f722028feff0055005300450052290d0a2f50726f64756365722028feff004e006900740072006f002000500072006f00200031003000200020005c2800310030002e00200035002e00200039002e00200039005c29290d0a3e3e0d0a656e646f626a0d0a31352030206f626a0d0a3c3c2f54797065202f4d657461646174610d0a2f53756274797065202f584d4c0d0a2f4c656e67746820323334390d0a3e3e0d0a73747265616d0d0a3c3f787061636b657420626567696e3d27efbbbf272069643d2757354d304d7043656869487a7265537a4e54637a6b633964273f3e0a3c783a786d706d65746120783a786d70746b3d22332e312d3730312220786d6c6e733a783d2261646f62653a6e733a6d6574612f223e0a093c7264663a52444620786d6c6e733a7264663d22687474703a2f2f7777772e77332e6f72672f313939392f30322f32322d7264662d73796e7461782d6e7323223e0a09093c7264663a4465736372697074696f6e207264663a61626f75743d222220786d6c6e733a786d703d22687474703a2f2f6e732e61646f62652e636f6d2f7861702f312e302f223e0a0909093c786d703a437265617465446174653e323032312d30332d31365432333a33393a31335a3c2f786d703a437265617465446174653e0a0909093c786d703a43726561746f72546f6f6c3e4e6974726f2050726f20313020202831302e20352e20392e2039293c2f786d703a43726561746f72546f6f6c3e0a0909093c786d703a4d6f64696679446174653e323032312d30332d31365432333a33393a31335a3c2f786d703a4d6f64696679446174653e0a0909093c786d703a4d65746164617461446174653e323032312d30332d31365432333a33393a31335a3c2f786d703a4d65746164617461446174653e0a09093c2f7264663a4465736372697074696f6e3e0a09093c7264663a4465736372697074696f6e207264663a61626f75743d222220786d6c6e733a64633d22687474703a2f2f7075726c2e6f72672f64632f656c656d656e74732f312e312f223e0a0909093c64633a666f726d61743e6170706c69636174696f6e2f7064663c2f64633a666f726d61743e0a0909093c64633a63726561746f723e0a090909093c7264663a5365713e0a09090909093c7264663a6c692f3e0a090909093c2f7264663a5365713e0a0909093c2f64633a63726561746f723e0a0909093c64633a7469746c653e0a090909093c7264663a416c743e0a09090909093c7264663a6c6920786d6c3a6c616e673d22782d64656661756c74222f3e0a090909093c2f7264663a416c743e0a0909093c2f64633a7469746c653e0a0909093c64633a6465736372697074696f6e3e0a090909093c7264663a416c743e0a09090909093c7264663a6c6920786d6c3a6c616e673d22782d64656661756c74222f3e0a090909093c2f7264663a416c743e0a0909093c2f64633a6465736372697074696f6e3e0a09093c2f7264663a4465736372697074696f6e3e0a09093c7264663a4465736372697074696f6e207264663a61626f75743d222220786d6c6e733a7064663d22687474703a2f2f6e732e61646f62652e636f6d2f7064662f312e332f223e0a0909093c7064663a4b6579776f7264732f3e0a0909093c7064663a50726f64756365723e4e6974726f2050726f20313020202831302e20352e20392e2039293c2f7064663a50726f64756365723e0a09093c2f7264663a4465736372697074696f6e3e0a09093c7264663a4465736372697074696f6e207264663a61626f75743d222220786d6c6e733a786d704d4d3d22687474703a2f2f6e732e61646f62652e636f6d2f7861702f312e302f6d6d2f223e0a0909093c786d704d4d3a446f63756d656e7449443e757569643a37323635373166612d663236392d343633312d623832332d3764303732613366383462363c2f786d704d4d3a446f63756d656e7449443e0a09093c2f7264663a4465736372697074696f6e3e0a093c2f7264663a5244463e0a3c2f783a786d706d6574613e0a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a3c3f787061636b657420656e643d2777273f3e0d0a656e6473747265616d0d0a656e646f626a0d0a31362030206f626a0d0a3c3c2f54797065202f4d657461646174610d0a2f53756274797065202f584d4c0d0a2f4c656e67746820313536340d0a3e3e0d0a73747265616d0d0a3c3f787061636b657420626567696e3d22222069643d2257354d304d7043656869487a7265537a4e54637a6b633964223f3e3c783a786d706d65746120783a786d70746b3d22332e312d3730312220786d6c6e733a783d2261646f62653a6e733a6d6574612f223e3c7264663a52444620786d6c6e733a7264663d22687474703a2f2f7777772e77332e6f72672f313939392f30322f32322d7264662d73796e7461782d6e7323223e3c7264663a4465736372697074696f6e207264663a61626f75743d222220786d6c6e733a64633d22687474703a2f2f7075726c2e6f72672f64632f656c656d656e74732f312e312f2220786d6c6e733a7064663d22687474703a2f2f6e732e61646f62652e636f6d2f7064662f312e332f2220786d6c6e733a70646661457874656e73696f6e3d22687474703a2f2f7777772e6169696d2e6f72672f706466612f6e732f657874656e73696f6e2f2220786d6c6e733a7064666150726f70657274793d22687474703a2f2f7777772e6169696d2e6f72672f706466612f6e732f70726f7065727479232220786d6c6e733a70646661536368656d613d22687474703a2f2f7777772e6169696d2e6f72672f706466612f6e732f736368656d61232220786d6c6e733a7064666169643d22687474703a2f2f7777772e6169696d2e6f72672f706466612f6e732f69642f2220786d6c6e733a786d703d22687474703a2f2f6e732e61646f62652e636f6d2f7861702f312e302f223e3c786d703a437265617465446174653e323032312d30332d31365432333a33393a31335a3c2f786d703a437265617465446174653e0a3c786d703a43726561746f72546f6f6c3e4e6974726f2050726f20313020202831302e20352e20392e2039293c2f786d703a43726561746f72546f6f6c3e0a3c786d703a4d65746164617461446174653e323032312d30332d31365432333a33393a31335a3c2f786d703a4d65746164617461446174653e0a3c786d703a4d6f64696679446174653e323032312d30332d31365431383a33393a31362d30353a30303c2f786d703a4d6f64696679446174653e0a3c2f7264663a4465736372697074696f6e3e0a3c7264663a4465736372697074696f6e207264663a61626f75743d222220786d6c6e733a64633d22687474703a2f2f7075726c2e6f72672f64632f656c656d656e74732f312e312f223e3c64633a666f726d61743e6170706c69636174696f6e2f7064663c2f64633a666f726d61743e0a3c64633a63726561746f723e3c7264663a5365713e3c7264663a6c693e3c2f7264663a6c693e0a3c2f7264663a5365713e0a3c2f64633a63726561746f723e0a3c64633a7469746c653e3c7264663a416c743e3c7264663a6c6920786d6c3a6c616e673d22782d64656661756c74223e3c2f7264663a6c693e0a3c2f7264663a416c743e0a3c2f64633a7469746c653e0a3c64633a6465736372697074696f6e3e3c7264663a416c743e3c7264663a6c6920786d6c3a6c616e673d22782d64656661756c74223e3c2f7264663a6c693e0a3c2f7264663a416c743e0a3c2f64633a6465736372697074696f6e3e0a3c2f7264663a4465736372697074696f6e3e0a3c7264663a4465736372697074696f6e207264663a61626f75743d222220786d6c6e733a7064663d22687474703a2f2f6e732e61646f62652e636f6d2f7064662f312e332f223e3c7064663a4b6579776f7264733e3c2f7064663a4b6579776f7264733e0a3c7064663a50726f64756365723e4e6974726f2050726f20313020202831302e20352e20392e2039293c2f7064663a50726f64756365723e0a3c2f7264663a4465736372697074696f6e3e0a3c7264663a4465736372697074696f6e207264663a61626f75743d222220786d6c6e733a786d704d4d3d22687474703a2f2f6e732e61646f62652e636f6d2f7861702f312e302f6d6d2f223e3c786d704d4d3a446f63756d656e7449443e757569643a37323635373166612d663236392d343633312d623832332d3764303732613366383462363c2f786d704d4d3a446f63756d656e7449443e0a3c2f7264663a4465736372697074696f6e3e0a3c2f7264663a5244463e0a3c2f783a786d706d6574613e0a3c3f787061636b657420656e643d2277223f3e0d0a656e6473747265616d0d0a656e646f626a0d0a787265660d0a302031370d0a3030303030303030303020363535333520660d0a30303030303030303136203030303030206e0d0a30303030303030303738203030303030206e0d0a30303030303030343737203030303030206e0d0a30303030303030353233203030303030206e0d0a30303030303030363434203030303030206e0d0a30303030303030393537203030303030206e0d0a30303030303031313738203030303030206e0d0a30303030303031333936203030303030206e0d0a30303030303031353535203030303030206e0d0a30303030303031363939203030303030206e0d0a30303030303130383537203030303030206e0d0a30303030303131303034203030303030206e0d0a30303030303131313332203030303030206e0d0a30303030303131343530203030303030206e0d0a30303030303131373130203030303030206e0d0a30303030303134313530203030303030206e0d0a747261696c65720d0a3c3c2f4944205b28c3c3937b5c28da4677a0743b154c3cceb3ceb329203c42323533443841443037443939353146333838314442424542423134334535433e5d0d0a2f526f6f742032203020520d0a2f496e666f203134203020520d0a2f53697a652031370d0a3e3e0d0a7374617274787265660d0a31353830350d0a2525454f460d0a);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `rol_nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `rol_nombre`) VALUES
(1, 'Administrador '),
(3, 'Visitante'),
(4, 'Secretario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id_solicitud` int(11) NOT NULL,
  `sol_tipo` varchar(50) NOT NULL,
  `sol_horaFecha` datetime NOT NULL,
  `sol_estado` varchar(20) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoactividad`
--

CREATE TABLE `tipoactividad` (
  `id_tipoActividad` int(11) NOT NULL,
  `tip_descripcion` varchar(50) NOT NULL,
  `tip_valor` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipoactividad`
--

INSERT INTO `tipoactividad` (`id_tipoActividad`, `tip_descripcion`, `tip_valor`) VALUES
(1, 'Misa comunitaria', 0),
(2, 'Misa privada', 0),
(3, 'Bautismo', 0),
(4, 'Confirmación', 0),
(5, 'Visita', 0),
(9, 'Retiro', 0),
(10, 'Matrimonio', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usu_nombres` varchar(50) NOT NULL,
  `usu_apellidos` varchar(50) NOT NULL,
  `usu_cedula` int(10) NOT NULL,
  `usu_genero` varchar(50) NOT NULL,
  `usu_fechaNacimiento` date NOT NULL,
  `usu_telefono` int(10) NOT NULL,
  `usu_correo` varchar(40) NOT NULL,
  `usu_pass` varchar(30) NOT NULL,
  `usu_fechaRegistro` datetime NOT NULL,
  `usu_direccion` varchar(90) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usu_nombres`, `usu_apellidos`, `usu_cedula`, `usu_genero`, `usu_fechaNacimiento`, `usu_telefono`, `usu_correo`, `usu_pass`, `usu_fechaRegistro`, `usu_direccion`, `id_rol`) VALUES
(1, 'Andraida', 'De la cruz', 9489183, 'Femenino', '2000-05-07', 968669147, 'andraiida7@gmail.com', '12345', '2021-03-13 00:00:00', '', 1),
(2, 'ana', 'cruz', 98765432, 'Femenino', '2000-05-07', 968669147, 'andraiida7@gmail.com', '1234', '2021-05-14 21:44:13', 'quito', 3),
(3, 'juana', 'perez', 111111, 'Femenino', '2021-05-29', 1111111111, 'juana@hotmail.com', '123', '2021-05-30 00:00:00', 'jos', 4),
(5, 'Andraida', 'De la cruz', 123, 'Masculino', '2021-05-03', 123, 'actualizado@hotmail.com', '123', '2021-05-31 00:00:00', 'nuevo', 1),
(6, 'Rene', 'Matango', 1720231529, 'Femenino', '2021-05-10', 968669147, 'Rene@hotmail.com', '1234', '2021-05-31 00:00:00', 'quito', 4),
(7, 'Administrador', 'Principal', 1234567890, 'Masculino', '1992-06-11', 968669147, 'admin@gmail.com', '12345', '2021-08-09 00:00:00', 'quito', 1),
(8, 'javier', 'yungan', 1234567890, 'Masculino', '1995-07-09', 1234567890, 'javier@gmail.com', '12345', '2021-08-10 00:00:00', 'quito', 4),
(9, 'MELL', 'TECH', 1726352436, 'Femenino', '1999-02-01', 2147483647, 'MELL@GMAIL.COM', '123456789', '2021-08-21 00:00:00', 'LA RONDA', 3),
(10, 'jhome', 'techno', 1234545678, 'Femenino', '2021-08-13', 989897867, 'jhome@gmail.com', '12345', '2021-08-22 00:00:00', 'quito', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariocarita`
--

CREATE TABLE `usuariocarita` (
  `id_usuario` int(11) DEFAULT NULL,
  `id_carita` int(11) DEFAULT NULL,
  `uc_fechaAsistencia` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuariocarita`
--

INSERT INTO `usuariocarita` (`id_usuario`, `id_carita`, `uc_fechaAsistencia`) VALUES
(9, 2, '2021-08-22 00:00:00'),
(2, 1, '2021-08-22 00:00:00'),
(10, 6, '2021-08-22 23:28:43');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividadrecibo`
--
ALTER TABLE `actividadrecibo`
  ADD KEY `id_aporte` (`id_recibo`),
  ADD KEY `id_tipoActividad` (`id_tipoActividad`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id_asistencia`),
  ADD KEY `id_actividad` (`id_datosActividad`);

--
-- Indices de la tabla `caritas`
--
ALTER TABLE `caritas`
  ADD PRIMARY KEY (`id_carita`);

--
-- Indices de la tabla `certificados`
--
ALTER TABLE `certificados`
  ADD PRIMARY KEY (`id_certificado`),
  ADD KEY `id_aporte` (`id_tipoActividad`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `datosactividad`
--
ALTER TABLE `datosactividad`
  ADD PRIMARY KEY (`id_datosActividad`),
  ADD KEY `id_tipoActividad` (`id_tipoActividad`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `ide_horario` (`ide_horario`);

--
-- Indices de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  ADD PRIMARY KEY (`id_donacion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `horario_actividad`
--
ALTER TABLE `horario_actividad`
  ADD PRIMARY KEY (`ide_horario`),
  ADD KEY `id_tipoActividad` (`ide_tipoActividad`);

--
-- Indices de la tabla `recibo`
--
ALTER TABLE `recibo`
  ADD PRIMARY KEY (`id_recibo`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tipoactividad`
--
ALTER TABLE `tipoactividad`
  ADD PRIMARY KEY (`id_tipoActividad`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `usuariocarita`
--
ALTER TABLE `usuariocarita`
  ADD KEY `id_usuario` (`id_usuario`,`id_carita`),
  ADD KEY `id_carita` (`id_carita`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id_asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `caritas`
--
ALTER TABLE `caritas`
  MODIFY `id_carita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `certificados`
--
ALTER TABLE `certificados`
  MODIFY `id_certificado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `datosactividad`
--
ALTER TABLE `datosactividad`
  MODIFY `id_datosActividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  MODIFY `id_donacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `horario_actividad`
--
ALTER TABLE `horario_actividad`
  MODIFY `ide_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `recibo`
--
ALTER TABLE `recibo`
  MODIFY `id_recibo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipoactividad`
--
ALTER TABLE `tipoactividad`
  MODIFY `id_tipoActividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividadrecibo`
--
ALTER TABLE `actividadrecibo`
  ADD CONSTRAINT `fk_id_recibo` FOREIGN KEY (`id_recibo`) REFERENCES `recibo` (`id_recibo`),
  ADD CONSTRAINT `fk_id_tipoActividad` FOREIGN KEY (`id_tipoActividad`) REFERENCES `tipoactividad` (`id_tipoActividad`);

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `fk_id_datosActividad` FOREIGN KEY (`id_datosActividad`) REFERENCES `datosactividad` (`id_datosActividad`);

--
-- Filtros para la tabla `certificados`
--
ALTER TABLE `certificados`
  ADD CONSTRAINT `fk_id_tipoActividad2` FOREIGN KEY (`id_tipoActividad`) REFERENCES `tipoactividad` (`id_tipoActividad`),
  ADD CONSTRAINT `fk_id_usuario4` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `donaciones`
--
ALTER TABLE `donaciones`
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
