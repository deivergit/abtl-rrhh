-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-12-2023 a las 14:21:53
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rrhh_abtl`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos_ejercidos`
--

CREATE TABLE `cargos_ejercidos` (
  `cargo_ejercido_id` int(10) UNSIGNED NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `direccion_adscrita` varchar(150) NOT NULL,
  `cargo` varchar(150) NOT NULL,
  `trabajador_fk` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `cargos_ejercidos`
--

INSERT INTO `cargos_ejercidos` (`cargo_ejercido_id`, `fecha_inicio`, `fecha_fin`, `direccion_adscrita`, `cargo`, `trabajador_fk`) VALUES
(0, '2023-02-16', '0000-00-00', 'DIRECCIÓN DE CATASTRO MUNICIPAL', 'SECRETARIA', 0),
(1, '2021-01-01', '0000-00-00', 'DIRECCIÓN DE RECURSOS HUMANOS', 'ANALISTA DE RECURSOS HUMANOS I', 1),
(2, '2001-11-01', '0000-00-00', 'DIRECCIÓN DE RECURSOS HUMANOS', 'SECRETARIA', 2),
(3, '2020-01-02', '0000-00-00', 'DIRECCIÓN DE PROTOCOLO Y EVENTOS', 'AUXILIAR DE PROTOCOLO', 3),
(4, '2017-10-01', '0000-00-00', 'OFICINA DE TESORERÍA MUNICIPAL', 'AUXILIAR DE TESORERÍA', 4),
(5, '2021-12-15', '0000-00-00', 'DESPACHO DE LA ALCALDESA', 'ALCALDESA', 5),
(6, '2017-09-01', '0000-00-00', 'DESPACHO DE LA ALCALDESA', 'SINDICO PROCURADORA MUNICIPAL', 6),
(7, '2023-03-31', '0000-00-00', 'DIRECCIÒN DE CULTOS RELIGIOSOS', 'JEFA DEL CONCEJO PASTORAL', 7),
(8, '2023-07-07', '0000-00-00', 'SECRETARIA COORDINADORA DEL PODER POPULAR, COMUNAS Y CONSEJOS COMUNALES', 'DIRECTORA (ENCARGADA) DE COMUNAS Y CONSEJOS COMUNALES', 8),
(9, '2023-04-01', '0000-00-00', 'DIRECCIÓN DE SERVICIOS PÚBLICOS', 'JEFE DE MANTENIMIENTO VEHICULAR', 9),
(10, '2022-04-20', '0000-00-00', 'DIRECCIÓN DE SISTEMAS Y TECNOLOGÍA DE LA INFORMACIÓN', 'ANALISTA DE PROGRAMACIÓN', 10),
(11, '2023-06-06', '0000-00-00', 'DIRECCIÓN DE PRODUCCIÓN Y EVENTOS', 'JEFE DE LOGÍSTICA', 11),
(12, '2022-01-18', '0000-00-00', 'SECRETARIA COORDINADORA DEL PODER POPULAR, COMUNAS Y CONSEJOS COMUNALES', 'DIRECTORA (ENCARGADA) DE PARTICIPACION CIUDADANA', 12),
(13, '2022-07-19', '0000-00-00', 'DIRECCIÓN DE SERVICIOS PÚBLICOS', 'JEFE DE LA OFICINA DEL CEMENTERIO', 13),
(14, '2022-08-26', '0000-00-00', 'SECRETARIA COORDINADORA DE ECONOMIA PRODUCTIVA', 'DIRECTOR DE INDUSTRIAS Y COMERCIO', 14),
(15, '2020-05-28', '0000-00-00', 'SECRETARIA GENERAL DE GOBIERNO', 'DIRECTORA DE RECURSOS HUMANOS', 15),
(16, '2023-08-15', '0000-00-00', 'SECRETARIA COORDINADORA DE DERECHO A LA CIUDAD', 'DIRECTORA DE VIVIENDA Y HÁBITAT', 16),
(17, '2023-02-01', '0000-00-00', 'DESPACHO DE LA ALCALDESA', 'DIRECTORA (ENCARGADA) DE SERVICIOS GENERALES DEL PALACIO MUNICIPAL', 17),
(18, '2023-03-16', '0000-00-00', 'DESPACHO DE LA ALCALDESA', 'DIRECTORA (ENCARGADA) DE AUDITORIA INTERNA', 18),
(19, '2022-05-30', '0000-00-00', 'DIRECCIÓN DE ORNATO Y AMBIENTE', 'JEFA (ENCARGADA) DEL PARQUE ECOLÓGICO', 19),
(20, '2023-04-01', '0000-00-00', 'SECRETARIA COORDINADORA DE SEGURIDAD Y PAZ CIUDADANA', 'DIRECTOR (ENCARGADO) DE PREVENCIÓN DE RIESGOS Y PROTECCIÓN CIVIL', 20),
(21, '2023-02-01', '0000-00-00', 'DIRECCIÓN DE PLANIFICACIÓN Y PRESUPUESTO', 'JEFA (ENCARGADA) DE PRESUPUESTO', 21),
(22, '2022-10-01', '0000-00-00', 'DIRECCIÓN DE CATASTRO MUNICIPAL', 'JEFA (ENCARGADA) DE LA OFICINA MUNICIPAL DE REGULARIZACIÓN DE TENENCIA DE LA TIE', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta_cargos`
--

CREATE TABLE `consulta_cargos` (
  `id_consulta_cargo` int(10) UNSIGNED NOT NULL,
  `cargo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `consulta_cargos`
--

INSERT INTO `consulta_cargos` (`id_consulta_cargo`, `cargo`) VALUES
(1, 'DIRECTORA DE PARTICIPACIÓN CIUDADANA'),
(2, 'DIRECTORA DE AUDITORÍA INTERNA'),
(3, 'ASISTENTE ADMINISTRATIVO'),
(4, 'JEFE DE PROGRAMACIÓN'),
(5, 'ANALISTA DE PROGRAMACIÓN'),
(6, 'AUXILIAR DE PROGRAMACIÓN'),
(7, 'JEFE DE SOPORTE TÉCNICO'),
(8, 'ANALISTA DE SISTEMAS'),
(9, 'AUXILIAR DE SOPORTE'),
(10, 'AUXILIAR DE SOPORTE Y SISTEMAS'),
(11, 'JEFE DE REDES Y COMUNICACIONES'),
(12, 'ANALISTA DE REDES'),
(13, 'JEFE DE MEDIOS RADIALES'),
(14, 'JEFE DE REDES SOCIALES'),
(15, 'JEFE DE AUDIOVISUALES'),
(16, 'ANALISTA DE MEDIOS Y REDACCIÓN II'),
(17, 'ANALISTA DE MEDIOS Y REDACCIÓN I'),
(18, 'AUXILIAR DE PERIODISTA'),
(19, 'DISEÑADOR'),
(20, 'OPERADOR DE AUDIO'),
(21, 'AUXILIAR ADMINISTRATIVO'),
(22, 'VOZ OFICIAL'),
(23, 'ASISTENTE DE LA SECRETARIA'),
(24, 'TRANSPORTE'),
(26, 'DIRECTOR DE SISTEMAS Y TECNOLOGÍA DE LA INFORMACIÓN'),
(27, 'JEFA DEL CONCEJO PASTORAL'),
(28, 'DIRECTORA DE COMUNAS Y CONCEJOS COMUNALES'),
(29, 'JEFE DE MANTENIMIENTO VEHICULAR'),
(30, 'JEFE DE LOGÍSTICA'),
(31, 'JEFE DE LA OFICINA DEL CEMENTERIO'),
(32, 'DIRECTOR DE INDUSTRIAS Y COMERCIO'),
(33, 'DIRECTORA DE RECURSOS HUMANOS'),
(34, 'DIRECTORA DE SERVICIOS GENERALES DEL PALACIO MUNICIPAL'),
(35, 'SECRETARIA'),
(36, 'AUXILIAR DE PROTOCOLO'),
(37, 'AUXILIAR DE TESORERÍA'),
(38, 'PROTECCIÓN SOCIAL'),
(39, 'GUÍA PROTOCOLAR'),
(40, 'SECRETARIA II'),
(41, 'COMISIONADO'),
(42, 'PROMOTOR DE SALUD I'),
(43, 'AUXILIAR SECRETARIAL'),
(44, 'AUXILIAR DE PROMOTOR'),
(45, 'AUXILIAR DE PREVENCIÓN'),
(46, 'AUXILIAR DE ASISTENTE ADMINISTRATIVO'),
(47, 'AUXILIAR PROMOTORA DE EMPRENDIMIENTO'),
(48, 'AUXILIAR DE PROTECTORA SOCIAL'),
(49, 'AUXILIAR DE PROMOTOR DE EMPRENDIMIENTO'),
(50, 'OBRERO'),
(51, 'RECOLECTOR'),
(52, 'CHOFER'),
(53, 'OBRERA'),
(54, 'ELECTRICISTA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta_direcciones`
--

CREATE TABLE `consulta_direcciones` (
  `id_consulta_direccion` int(10) UNSIGNED NOT NULL,
  `direccion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `consulta_direcciones`
--

INSERT INTO `consulta_direcciones` (`id_consulta_direccion`, `direccion`) VALUES
(1, 'DIRECCIÓN DE SISTEMAS Y TECNOLOGÍA DE LA INFORMACIÓN'),
(2, 'DIRECCIÓN DE PRENSA'),
(3, 'DIRECCIÓN DE PROTOCOLO Y EVENTOS'),
(4, 'DIRECCIÓN DE RECURSOS HUMANOS'),
(5, 'DIRECCIÓN DE REGISTRO CIVIL'),
(6, 'DIRECCIÓN DE SERVICIOS GENERALES'),
(7, 'DIRECCIÓN DE SERVICIOS PÚBLICOS'),
(8, 'DIRECCIÓN DE ADMINISTRACIÓN'),
(9, 'DIRECCIÓN DE PRESUPUESTO'),
(10, 'DIRECCIÓN DE SINDICATURA'),
(11, 'DIRECCIÓN DE INGENIERÍA MUNICIPAL'),
(27, 'OFICINA DEL CONCEJO PASTORAL'),
(29, 'SECRETARIA DE DERECHO A LA CIUDAD'),
(56, 'SECRETARIA COORDINADORA DE COMUNICACIONES Y RELACIONES PÚBLICAS'),
(57, 'DIRECCIÓN DE PRODUCCIÓN Y EVENTOS'),
(58, 'DIRECCIÓN DE PARTICIPACIÓN CIUDADANA'),
(59, 'DESPACHO DE LA ALCALDESA'),
(61, 'SECRETARIA COORDINADORA DE ECONOMÍA PRODUCTIVA'),
(62, 'SECRETARIA GENERAL DE GOBIERNO'),
(64, 'DIRECCIÓN DE CATASTRO MUNICIPAL'),
(65, 'OFICINA DEL TERMINAL'),
(66, 'OFICINA DE TESORERÍA MUNICIPAL'),
(68, 'SECRETARIA COORDINADORA DE ASUNTOS SOCIALES Y GRANDES MISIONES'),
(69, 'DIRECCIÓN DE ATENCIÓN AL SOBERANO'),
(70, 'DIRECCIÓN DE SALUD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos_identidad`
--

CREATE TABLE `documentos_identidad` (
  `id_documento_identidad` int(10) UNSIGNED NOT NULL,
  `primer_nombre` varchar(20) DEFAULT NULL,
  `segundo_nombre` varchar(20) DEFAULT NULL,
  `primer_apellido` varchar(20) DEFAULT NULL,
  `segundo_apellido` varchar(20) DEFAULT NULL,
  `tipo_documento` enum('V','E') DEFAULT NULL,
  `numero_documento` varchar(50) NOT NULL,
  `estado_civil` enum('SOLTERO','SOLTERA','CASADO','CASADA','DIVORCIADO','DIVORCIADA','VIUDO','VIUDA') NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `pais_nacimiento` varchar(30) NOT NULL,
  `sexo` enum('MASCULINO','FEMENINO') NOT NULL,
  `trabajador_fk` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `documentos_identidad`
--

INSERT INTO `documentos_identidad` (`id_documento_identidad`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `tipo_documento`, `numero_documento`, `estado_civil`, `fecha_nacimiento`, `pais_nacimiento`, `sexo`, `trabajador_fk`) VALUES
(0, 'JEIMAR', 'VANESSA', 'ABREU', 'GUZMAN', 'V', '27913399', 'SOLTERA', '2001-07-20', 'VENEZUELA', 'FEMENINO', 0),
(1, 'MARIOXI', 'ANDREA', 'GONZÁLEZ', 'CASTILLO', 'V', '18841964', 'SOLTERA', '1988-02-24', 'VENEZUELA', 'FEMENINO', 1),
(2, 'MEIZON', 'ULISES', 'GUARDIA', 'PEREZ', 'V', '28185234', 'SOLTERO', '2001-06-15', 'VENEZUELA', 'MASCULINO', 2),
(3, 'CARLA', 'YOSMAR', 'AGUILAR', 'NAGUANAGUA', 'V', '29801195', 'SOLTERA', '2002-01-23', 'VENEZUELA', 'FEMENINO', 3),
(4, 'DAYALYS', 'ELIZABETH', 'ALFONZO', 'MORENO', 'V', '20484071', 'SOLTERA', '1992-05-21', 'VENEZUELA', 'FEMENINO', 4),
(5, 'DAYANA', '', 'BAEZ', 'BAEZ', 'V', '14326582', 'SOLTERA', '1976-10-29', 'VENEZUELA', 'FEMENINO', 5),
(6, 'ELYANNE', 'CAROLINA', 'MARTINEZ', 'RASQUIN', 'V', '15475822', 'SOLTERO', '1983-07-09', 'VENEZUELA', 'FEMENINO', 6),
(7, 'CARMEN', 'CAROLINA', 'ACOSTA', 'DE PEREIRA', 'V', '6662488', 'CASADA', '1970-10-12', 'VENEZUELA', 'FEMENINO', 7),
(8, 'IRIS', 'JOSEFINA', 'ACOSTA', 'IBARRA', 'V', '10077748', 'SOLTERA', '1969-07-20', 'VENEZUELA', 'FEMENINO', 8),
(9, 'LUIS', 'ALFREDO', 'APONTE', 'SERRANO', 'V', '13423462', 'SOLTERO', '1969-08-25', 'VENEZUELA', 'MASCULINO', 9),
(10, 'DEIVER', 'ALEXANDER', 'MARTINEZ', 'ROSALES', 'V', '22798946', 'SOLTERO', '1994-10-30', 'VENEZUELA', 'MASCULINO', 10),
(11, 'GABRIEL', 'ARTURO', 'ARCIA', 'MACERO', 'V', '31223987', 'SOLTERO', '2004-08-04', 'VENEZUELA', 'MASCULINO', 11),
(12, 'ALEIDA', 'MARIA', 'BARRIOS', 'ZAMBRANO', 'V', '13903304', 'SOLTERA', '1977-04-28', 'VENEZUELA', 'FEMENINO', 12),
(13, 'JOSE', 'AUGUSTO', 'BENITEZ', '', 'V', '22041763', 'SOLTERO', '1993-06-12', 'VENEZUELA', 'MASCULINO', 13),
(14, 'LEONARDO', 'ENRIQUE', 'BRACHO', 'PIMENTEL', 'V', '17226931', 'SOLTERO', '1985-05-31', 'VENEZUELA', 'MASCULINO', 14),
(15, 'AURA', 'ISBER', 'BRICEÑO', 'GONZÁLEZ', 'V', '12300838', 'SOLTERO', '1974-06-08', 'VENEZUELA', 'FEMENINO', 15),
(16, 'ANA', 'MARIA', 'CABRERA', 'SIERRA', 'V', '5091849', 'SOLTERO', '1980-06-16', 'VENEZUELA', 'FEMENINO', 16),
(17, 'MARTINA', 'YOLEISY', 'CABRERA', 'SIERRA', 'V', '16429499', 'SOLTERA', '1981-06-30', 'VENEZUELA', 'FEMENINO', 17),
(18, 'YANELIAMYR', '', 'BAUTISTA', 'MUÑOZ', 'V', '13409866', 'SOLTERA', '1977-04-14', 'VENEZUELA', 'FEMENINO', 18),
(19, 'REBECA', '', 'CABRILES', 'BARRIOS', 'V', '18842358', 'SOLTERA', '1988-09-02', 'VENEZUELA', 'FEMENINO', 19),
(20, 'JOSEPH', 'FROIBER', 'CHIRINOS', 'HERNÁNDEZ', 'V', '19122455', 'SOLTERO', '1990-01-25', 'VENEZUELA', 'MASCULINO', 20),
(21, 'MICHEL', 'KATERINE', 'CASTILLO', 'TOVAR', 'V', '25701072', 'SOLTERA', '1997-03-17', 'VENEZUELA', 'FEMENINO', 21),
(22, 'MIRTHA', 'YAJAIRA', 'CASTRILLO', 'MONTILLA', 'V', '18840478', 'SOLTERA', '1980-05-15', 'VENEZUELA', 'MASCULINO', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escala_remuneracion`
--

CREATE TABLE `escala_remuneracion` (
  `escala_remuneracion_id` int(10) UNSIGNED NOT NULL,
  `escala_remuneracion` varchar(10) DEFAULT NULL,
  `trabajador_fk` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `escala_remuneracion`
--

INSERT INTO `escala_remuneracion` (`escala_remuneracion_id`, `escala_remuneracion`, `trabajador_fk`) VALUES
(0, 'BI-II', 0),
(1, 'TI-III', 1),
(2, 'BI-II', 2),
(3, 'BI-III', 3),
(4, 'PII-IV', 4),
(5, 'PII-VII', 5),
(6, 'PIII-II', 6),
(7, 'BI-I', 7),
(8, 'BI-I', 8),
(9, 'BI-I', 9),
(10, 'PI-I', 10),
(11, 'BI-I', 11),
(12, 'BI-I', 12),
(13, 'BI-I', 13),
(14, 'BI-I', 14),
(15, 'BI-I', 15),
(16, 'BI-I', 16),
(17, 'BI-I', 17),
(18, 'BI-I', 18),
(19, 'BI-I', 19),
(20, 'BI-I', 20),
(21, 'BI-I', 21),
(22, 'BI-I', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id` int(11) NOT NULL,
  `iso` char(2) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `iso`, `nombre`) VALUES
(1, NULL, 'Australia'),
(2, NULL, 'Austria'),
(3, NULL, 'Azerbaiyán'),
(4, NULL, 'Anguilla'),
(5, NULL, 'Argentina'),
(6, NULL, 'Armenia'),
(7, NULL, 'Bielorrusia'),
(8, NULL, 'Belice'),
(9, NULL, 'Bélgica'),
(10, NULL, 'Bermudas'),
(11, NULL, 'Bulgaria'),
(12, NULL, 'Brasil'),
(13, NULL, 'Reino Unido'),
(14, NULL, 'Hungría'),
(15, NULL, 'Vietnam'),
(16, NULL, 'Haiti'),
(17, NULL, 'Guadalupe'),
(18, NULL, 'Alemania'),
(19, NULL, 'Países Bajos, Holanda'),
(20, NULL, 'Grecia'),
(21, NULL, 'Georgia'),
(22, NULL, 'Dinamarca'),
(23, NULL, 'Egipto'),
(24, NULL, 'Israel'),
(25, NULL, 'India'),
(26, NULL, 'Irán'),
(27, NULL, 'Irlanda'),
(28, NULL, 'España'),
(29, NULL, 'Italia'),
(30, NULL, 'Kazajstán'),
(31, NULL, 'Camerún'),
(32, NULL, 'Canadá'),
(33, NULL, 'Chipre'),
(34, NULL, 'Kirguistán'),
(35, NULL, 'China'),
(36, NULL, 'Costa Rica'),
(37, NULL, 'Kuwait'),
(38, NULL, 'Letonia'),
(39, NULL, 'Libia'),
(40, NULL, 'Lituania'),
(41, NULL, 'Luxemburgo'),
(42, NULL, 'México'),
(43, NULL, 'Moldavia'),
(44, NULL, 'Mónaco'),
(45, NULL, 'Nueva Zelanda'),
(46, NULL, 'Noruega'),
(47, NULL, 'Polonia'),
(48, NULL, 'Portugal'),
(49, NULL, 'Reunión'),
(50, NULL, 'Rusia'),
(51, NULL, 'El Salvador'),
(52, NULL, 'Eslovaquia'),
(53, NULL, 'Eslovenia'),
(54, NULL, 'Surinam'),
(55, NULL, 'Estados Unidos'),
(56, NULL, 'Tadjikistan'),
(57, NULL, 'Turkmenistan'),
(58, NULL, 'Islas Turcas y Caicos'),
(59, NULL, 'Turquía'),
(60, NULL, 'Uganda'),
(61, NULL, 'Uzbekistán'),
(62, NULL, 'Ucrania'),
(63, NULL, 'Finlandia'),
(64, NULL, 'Francia'),
(65, NULL, 'República Checa'),
(66, NULL, 'Suiza'),
(67, NULL, 'Suecia'),
(68, NULL, 'Estonia'),
(69, NULL, 'Corea del Sur'),
(70, NULL, 'Japón'),
(71, NULL, 'Croacia'),
(72, NULL, 'Rumanía'),
(73, NULL, 'Hong Kong'),
(74, NULL, 'Indonesia'),
(75, NULL, 'Jordania'),
(76, NULL, 'Malasia'),
(77, NULL, 'Singapur'),
(78, NULL, 'Taiwan'),
(79, NULL, 'Bosnia y Herzegovina'),
(80, NULL, 'Bahamas'),
(81, NULL, 'Chile'),
(82, NULL, 'Colombia'),
(83, NULL, 'Islandia'),
(84, NULL, 'Corea del Norte'),
(85, NULL, 'Macedonia'),
(86, NULL, 'Malta'),
(87, NULL, 'Pakistán'),
(88, NULL, 'Papúa-Nueva Guinea'),
(89, NULL, 'Perú'),
(90, NULL, 'Filipinas'),
(91, NULL, 'Arabia Saudita'),
(92, NULL, 'Tailandia'),
(93, NULL, 'Emiratos árabes Unidos'),
(94, NULL, 'Groenlandia'),
(95, NULL, 'Venezuela'),
(96, NULL, 'Zimbabwe'),
(97, NULL, 'Kenia'),
(98, NULL, 'Algeria'),
(99, NULL, 'Líbano'),
(100, NULL, 'Botsuana'),
(101, NULL, 'Tanzania'),
(102, NULL, 'Namibia'),
(103, NULL, 'Ecuador'),
(104, NULL, 'Marruecos'),
(105, NULL, 'Ghana'),
(106, NULL, 'Siria'),
(107, NULL, 'Nepal'),
(108, NULL, 'Mauritania'),
(109, NULL, 'Seychelles'),
(110, NULL, 'Paraguay'),
(111, NULL, 'Uruguay'),
(112, NULL, 'Congo (Brazzaville)'),
(113, NULL, 'Cuba'),
(114, NULL, 'Albania'),
(115, NULL, 'Nigeria'),
(116, NULL, 'Zambia'),
(117, NULL, 'Mozambique'),
(119, NULL, 'Angola'),
(120, NULL, 'Sri Lanka'),
(121, NULL, 'Etiopía'),
(122, NULL, 'Túnez'),
(123, NULL, 'Bolivia'),
(124, NULL, 'Panamá'),
(125, NULL, 'Malawi'),
(126, NULL, 'Liechtenstein'),
(127, NULL, 'Bahrein'),
(128, NULL, 'Barbados'),
(130, NULL, 'Chad'),
(131, NULL, 'Man, Isla de'),
(132, NULL, 'Jamaica'),
(133, NULL, 'Malí'),
(134, NULL, 'Madagascar'),
(135, NULL, 'Senegal'),
(136, NULL, 'Togo'),
(137, NULL, 'Honduras'),
(138, NULL, 'República Dominicana'),
(139, NULL, 'Mongolia'),
(140, NULL, 'Irak'),
(141, NULL, 'Sudáfrica'),
(142, NULL, 'Aruba'),
(143, NULL, 'Gibraltar'),
(144, NULL, 'Afganistán'),
(145, NULL, 'Andorra'),
(147, NULL, 'Antigua y Barbuda'),
(149, NULL, 'Bangladesh'),
(151, NULL, 'Benín'),
(152, NULL, 'Bután'),
(154, NULL, 'Islas Virgenes Británicas'),
(155, NULL, 'Brunéi'),
(156, NULL, 'Burkina Faso'),
(157, NULL, 'Burundi'),
(158, NULL, 'Camboya'),
(159, NULL, 'Cabo Verde'),
(164, NULL, 'Comores'),
(165, NULL, 'Congo (Kinshasa)'),
(166, NULL, 'Cook, Islas'),
(168, NULL, 'Costa de Marfil'),
(169, NULL, 'Djibouti, Yibuti'),
(171, NULL, 'Timor Oriental'),
(172, NULL, 'Guinea Ecuatorial'),
(173, NULL, 'Eritrea'),
(175, NULL, 'Feroe, Islas'),
(176, NULL, 'Fiyi'),
(178, NULL, 'Polinesia Francesa'),
(180, NULL, 'Gabón'),
(181, NULL, 'Gambia'),
(184, NULL, 'Granada'),
(185, NULL, 'Guatemala'),
(186, NULL, 'Guernsey'),
(187, NULL, 'Guinea'),
(188, NULL, 'Guinea-Bissau'),
(189, NULL, 'Guyana'),
(193, NULL, 'Jersey'),
(195, NULL, 'Kiribati'),
(196, NULL, 'Laos'),
(197, NULL, 'Lesotho'),
(198, NULL, 'Liberia'),
(200, NULL, 'Maldivas'),
(201, NULL, 'Martinica'),
(202, NULL, 'Mauricio'),
(205, NULL, 'Myanmar'),
(206, NULL, 'Nauru'),
(207, NULL, 'Antillas Holandesas'),
(208, NULL, 'Nueva Caledonia'),
(209, NULL, 'Nicaragua'),
(210, NULL, 'Níger'),
(212, NULL, 'Norfolk Island'),
(213, NULL, 'Omán'),
(215, NULL, 'Isla Pitcairn'),
(216, NULL, 'Qatar'),
(217, NULL, 'Ruanda'),
(218, NULL, 'Santa Elena'),
(219, NULL, 'San Cristobal y Nevis'),
(220, NULL, 'Santa Lucía'),
(221, NULL, 'San Pedro y Miquelón'),
(222, NULL, 'San Vincente y Granadinas'),
(223, NULL, 'Samoa'),
(224, NULL, 'San Marino'),
(225, NULL, 'San Tomé y Príncipe'),
(226, NULL, 'Serbia y Montenegro'),
(227, NULL, 'Sierra Leona'),
(228, NULL, 'Islas Salomón'),
(229, NULL, 'Somalia'),
(232, NULL, 'Sudán'),
(234, NULL, 'Swazilandia'),
(235, NULL, 'Tokelau'),
(236, NULL, 'Tonga'),
(237, NULL, 'Trinidad y Tobago'),
(239, NULL, 'Tuvalu'),
(240, NULL, 'Vanuatu'),
(241, NULL, 'Wallis y Futuna'),
(242, NULL, 'Sáhara Occidental'),
(243, NULL, 'Yemen'),
(246, NULL, 'Puerto Rico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sueldos_trabajadores`
--

CREATE TABLE `sueldos_trabajadores` (
  `sueldos_trabajadores_id` int(10) UNSIGNED NOT NULL,
  `sueldo` varchar(6) DEFAULT NULL,
  `trabajador_fk` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `sueldos_trabajadores`
--

INSERT INTO `sueldos_trabajadores` (`sueldos_trabajadores_id`, `sueldo`, `trabajador_fk`) VALUES
(0, '132,00', 0),
(1, '196,00', 1),
(2, '132.00', 2),
(3, '134,00', 3),
(4, '256,00', 4),
(5, '447,00', 5),
(6, '427,00', 6),
(7, '363,00', 7),
(8, '376,00', 8),
(9, '363,00', 9),
(10, '246,00', 10),
(11, '363,00', 11),
(12, '376,00', 12),
(13, '363,00', 13),
(14, '376,00', 14),
(15, '376,00', 15),
(16, '376,00', 16),
(17, '376,00', 17),
(18, '376,00', 18),
(19, '363,00', 19),
(20, '376,00', 20),
(21, '376,00', 21),
(22, '363,00', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

CREATE TABLE `trabajadores` (
  `trabajador_id` int(10) UNSIGNED NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_egreso` date DEFAULT NULL,
  `categoria` enum('ACTIVO','EGRESADO','JUBILADO','INCAPACITADO','COMISION DE SERVICIO') NOT NULL,
  `estatus` enum('EMPLEADO','OBRERO','ALTO FUNCIONARIO','ALTO NIVEL','CONTRATADO') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`trabajador_id`, `fecha_ingreso`, `fecha_egreso`, `categoria`, `estatus`) VALUES
(0, '2021-03-11', '0000-00-00', 'ACTIVO', 'EMPLEADO'),
(1, '2021-01-01', '0000-00-00', 'ACTIVO', 'EMPLEADO'),
(2, '2021-11-01', '0000-00-00', 'ACTIVO', 'EMPLEADO'),
(3, '2020-01-02', '0000-00-00', 'ACTIVO', 'EMPLEADO'),
(4, '2017-10-01', '0000-00-00', 'ACTIVO', 'EMPLEADO'),
(5, '2021-12-15', '0000-00-00', 'ACTIVO', 'ALTO FUNCIONARIO'),
(6, '2017-09-01', '0000-00-00', 'ACTIVO', 'ALTO FUNCIONARIO'),
(7, '2021-01-26', '0000-00-00', 'ACTIVO', 'ALTO NIVEL'),
(8, '2022-01-11', '0000-00-00', 'ACTIVO', 'ALTO NIVEL'),
(9, '2008-12-16', '0000-00-00', 'ACTIVO', 'ALTO NIVEL'),
(10, '2022-04-20', '0000-00-00', 'ACTIVO', 'CONTRATADO'),
(11, '2023-03-16', '0000-00-00', 'ACTIVO', 'ALTO NIVEL'),
(12, '2021-12-19', '0000-00-00', 'ACTIVO', 'ALTO NIVEL'),
(13, '2022-07-19', '0000-00-00', 'ACTIVO', 'ALTO NIVEL'),
(14, '2022-08-26', '0000-00-00', 'ACTIVO', 'ALTO NIVEL'),
(15, '2020-05-28', '0000-00-00', 'ACTIVO', 'ALTO NIVEL'),
(16, '2021-04-01', '0000-00-00', 'ACTIVO', 'ALTO NIVEL'),
(17, '2005-01-16', '0000-00-00', 'ACTIVO', 'ALTO NIVEL'),
(18, '2023-01-24', '0000-00-00', 'ACTIVO', 'ALTO NIVEL'),
(19, '2008-12-08', '0000-00-00', 'ACTIVO', 'ALTO NIVEL'),
(20, '2020-07-23', '0000-00-00', 'ACTIVO', 'ALTO NIVEL'),
(21, '2020-08-10', '0000-00-00', 'ACTIVO', 'ALTO NIVEL'),
(22, '2022-10-01', '0000-00-00', 'ACTIVO', 'ALTO NIVEL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `primer_nombre` varchar(45) NOT NULL,
  `primer_apellido` varchar(45) NOT NULL,
  `numero_documento` bigint(20) NOT NULL,
  `contraseña` varchar(32) NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `firma` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `primer_nombre`, `primer_apellido`, `numero_documento`, `contraseña`, `cargo`, `firma`) VALUES
(1, 'DEIVER', 'MARTINEZ', 22798946, '68c5b415b5d6dadd0c6a04f796fefba4', 'ANALISTA DE PROGRAMACION', 'dm'),
(2, 'AURA', 'BRICEÑO', 12300838, '202cb962ac59075b964b07152d234b70', 'DIRECTORA', 'ab'),
(3, 'KEIDDER', 'MARTINEZ', 14163214, 'bfb38ed83010e210ac9deb66163c08fe', 'SECRETARIO I', 'km'),
(4, 'MARIOXI', 'GONZALEZ', 18841964, '1f1aa391b97cbeca5f15e50c9edda8f4', 'ANALISTA DE RECURSOS HUMANOS 1', 'mg'),
(5, 'MEIZON', 'GUARDIA', 28185234, '34348d1736500113aab7ab30df5bc9f3', 'SECRETARIO', 'mg'),
(6, 'YUDERXY', 'FIGUERA', 19829392, 'bdb8a5ad39f7c33ebec5769d0fc0a743', 'ANALISTA DE RECURSOS HUMANOS', 'yf'),
(7, 'ALSUHAIL', 'SEIJAS', 25227967, 'ae840492ffc8b984d3ae8f425ec0040c', 'SECRETARIA', 'as'),
(8, 'THAELY', 'GALLARDO', 16812115, '8f800a6825a5622424987b013681de79', 'ANALISTA DE RECURSOS HUMANOS II', 'tg'),
(9, 'ROSMERY', 'DELGADO', 26427230, 'baddc9a7b887d973e6498aa9f377e922', 'AUXILIAR DE ANALISTA INTEGRAL', 'rm'),
(10, 'ANDERSON', 'SEQUERA', 29615206, '8d975b3cf0f0bf01c61f82b8cf2fbbcb', 'ANALISTA DE RECURSOS HUMANOS I', 'as'),
(11, 'MARIANGELA', 'DIAZ', 29801466, 'b65bc76c61845cd35da5df50ab931f62', 'AUXILIAR SECRETARIAL', 'md');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargos_ejercidos`
--
ALTER TABLE `cargos_ejercidos`
  ADD PRIMARY KEY (`cargo_ejercido_id`),
  ADD KEY `trabajador_fk` (`trabajador_fk`);

--
-- Indices de la tabla `consulta_cargos`
--
ALTER TABLE `consulta_cargos`
  ADD PRIMARY KEY (`id_consulta_cargo`);

--
-- Indices de la tabla `consulta_direcciones`
--
ALTER TABLE `consulta_direcciones`
  ADD PRIMARY KEY (`id_consulta_direccion`);

--
-- Indices de la tabla `documentos_identidad`
--
ALTER TABLE `documentos_identidad`
  ADD PRIMARY KEY (`id_documento_identidad`),
  ADD KEY `trabajador_fk` (`trabajador_fk`);

--
-- Indices de la tabla `escala_remuneracion`
--
ALTER TABLE `escala_remuneracion`
  ADD PRIMARY KEY (`escala_remuneracion_id`),
  ADD KEY `trabajador_fk` (`trabajador_fk`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sueldos_trabajadores`
--
ALTER TABLE `sueldos_trabajadores`
  ADD PRIMARY KEY (`sueldos_trabajadores_id`),
  ADD KEY `trabajador_fk` (`trabajador_fk`);

--
-- Indices de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`trabajador_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cargos_ejercidos`
--
ALTER TABLE `cargos_ejercidos`
  ADD CONSTRAINT `cargos_ejercidos_ibfk_1` FOREIGN KEY (`trabajador_fk`) REFERENCES `trabajadores` (`trabajador_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `documentos_identidad`
--
ALTER TABLE `documentos_identidad`
  ADD CONSTRAINT `documentos_identidad_ibfk_1` FOREIGN KEY (`trabajador_fk`) REFERENCES `trabajadores` (`trabajador_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `escala_remuneracion`
--
ALTER TABLE `escala_remuneracion`
  ADD CONSTRAINT `escala_remuneracion_ibfk_1` FOREIGN KEY (`trabajador_fk`) REFERENCES `trabajadores` (`trabajador_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sueldos_trabajadores`
--
ALTER TABLE `sueldos_trabajadores`
  ADD CONSTRAINT `sueldos_trabajadores_ibfk_1` FOREIGN KEY (`trabajador_fk`) REFERENCES `trabajadores` (`trabajador_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
