DROP DATABASE rrhh_abtl;
CREATE DATABASE rrhh_abtl;
USE rrhh_abtl;

CREATE TABLE IF NOT EXISTS usuarios(
PRIMARY KEY(usuario_id),
usuario_id INT UNSIGNED AUTO_INCREMENT,
primer_nombre VARCHAR(20) NOT NULL,
segundo_nombre VARCHAR(20) NOT NULL,
primer_apellido VARCHAR(20) NOT NULL,
segundo_apellido VARCHAR(20) NOT NULL,
numero_documento BIGINT NOT NULL UNIQUE,
contraseña VARCHAR(32) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1;

CREATE INDEX numero_documento_idx ON usuarios(numero_documento);

CREATE TABLE IF NOT EXISTS cargos_usuarios(
PRIMARY KEY(cargo_usuario_id),
cargo_usuario_id INT UNSIGNED AUTO_INCREMENT,
cargo_usuario VARCHAR(70) NOT NULL,
usuario_fk INT UNSIGNED,
FOREIGN KEY (usuario_fk) REFERENCES usuarios(usuario_id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1;

CREATE INDEX cargo_usuario_idx ON cargos_usuarios(cargo_usuario);

CREATE TABLE IF NOT EXISTS fotos_usuarios(
PRIMARY KEY(foto_usuario_id),
foto_usuario_id INT UNSIGNED AUTO_INCREMENT,
nombre_foto_usuario VARCHAR(70) NOT NULL DEFAULT 'avatar.webp',
ruta_foto_usuario TEXT NOT NULL DEFAULT '/views/profile_images/avatar.webp',
usuario_fk INT UNSIGNED,
FOREIGN KEY (usuario_fk) REFERENCES usuarios(usuario_id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=ascii AUTO_INCREMENT=1;

CREATE INDEX foto_usuario_idx ON fotos_usuarios(nombre_foto_usuario);

CREATE TABLE IF NOT EXISTS firmas_usuarios(
PRIMARY KEY(firma_usuario_id),
firma_usuario_id INT UNSIGNED AUTO_INCREMENT,
firma_usuario VARCHAR(4) NOT NULL,
usuario_fk INT UNSIGNED,
FOREIGN KEY (usuario_fk) REFERENCES usuarios(usuario_id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1;

CREATE INDEX firma_usuario_idx ON firmas_usuarios(firma_usuario);

CREATE TABLE IF NOT EXISTS estatus_usuarios(
PRIMARY KEY(estatus_usuario_id),
estatus_usuario_id INT UNSIGNED AUTO_INCREMENT,
estatus_usuario ENUM('ACTIVO','INACTIVO') NOT NULL DEFAULT 'INACTIVO',
usuario_fk INT UNSIGNED,
FOREIGN KEY (usuario_fk) REFERENCES usuarios(usuario_id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1;

CREATE INDEX estatus_usuario_idx ON estatus_usuarios(estatus_usuario);

# REGISTROS TABLA USUARIOS

INSERT INTO usuarios(usuario_id, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, numero_documento, contraseña)
VALUES (1,'DEIVER','ALEXANDER','MARTINEZ','ROSALES','22798946','68c5b415b5d6dadd0c6a04f796fefba4'),
(2,'AURA','ISBER','BRICEÑO','GONZALEZ','12300838','25f9e794323b453885f5181f1b624d0b'),
(3,'KEIDDER','YAMILETH','MARTINEZ','','14163214','bfb38ed83010e210ac9deb66163c08fe'),
(4, 'MARIOXI','ANDREA','GONZALEZ','CASTILLO','18841964','1f1aa391b97cbeca5f15e50c9edda8f4'),
(5, 'MEIZON','ULISES','GUARDIA','PEREZ','28185234','34348d1736500113aab7ab30df5bc9f3'),
(6, 'YUDERXY','DEL VALLE','FIGUERA','GUZMAN','19829392','bdb8a5ad39f7c33ebec5769d0fc0a743'),
(7, 'ALSUHAIL','STEPHANY','SEIJAS','MENDOZA','25227967', 'ae840492ffc8b984d3ae8f425ec0040c'),
(8, 'THAELY','SABRINA','GALLARDO','MORENO','16812115','8f800a6825a5622424987b013681de79'),
(9, 'ROSMERY','ALEXANDRA','DELGADO','CELIS','26427230','baddc9a7b887d973e6498aa9f377e922'),
(10, 'ANDERSON','NAHUM','SEQUERA','RIVERO','29615206','8d975b3cf0f0bf01c61f82b8cf2fbbcb'),
(11, 'MARIANGELA','NAZARETH','DIAZ','PEREIRA','29801466','b65bc76c61845cd35da5df50ab931f62');

INSERT INTO cargos_usuarios(cargo_usuario_id, usuario_fk, cargo_usuario)
VALUES(1,1,'ANALISTA DE PROGRAMACIÓN'),
(2,2,'DIRECTORA'),
(3,3,'SECRETARIO I'),
(4,4,'ANALISTA DE RECURSOS HUMANOS I'),
(5,5,'SECRETARIO'),
(6,6,'ANALISTA DE RECURSOS HUMANOS'),
(7,7,'SECRETARIA'),
(8,8,'ANALISTA DE RECURSOS HUMANOS II'),
(9,9,'AUXILIAR DE ANALISTA INTEGRAL'),
(10,10,'AUXILIAR DE RECURSOS HUMANOS I'),
(11,11,'AUXILIAR SECRETARIAL');

INSERT INTO fotos_usuarios(foto_usuario_id, usuario_fk, nombre_foto_usuario, ruta_foto_usuario)
VALUES('1','1','22798946.webp','/views/resources/uploads/profiles_images/1/22798946.webp'),
('2','2','avatar.webp','/views/resources/uploads/profiles_images/default/avatar.webp'),
('3','3','avatar.webp','/views/resources/uploads/profiles_images/default/avatar.webp'),
('4','4','avatar.webp','/views/resources/uploads/profiles_images/default/avatar.webp'),
('5','5','avatar.webp','/views/resources/uploads/profiles_images/default/avatar.webp'),
('6','6','avatar.webp','/views/resources/uploads/profiles_images/default/avatar.webp'),
('7','7','avatar.webp','/views/resources/uploads/profiles_images/default/avatar.webp'),
('8','8','avatar.webp','/views/resources/uploads/profiles_images/default/avatar.webp'),
('9','9','avatar.webp','/views/resources/uploads/profiles_images/default/avatar.webp'),
('10','10','avatar.webp','/views/resources/uploads/profiles_images/default/avatar.webp'),
('11','11','avatar.webp','/views/resources/uploads/profiles_images/default/avatar.webp');

INSERT INTO firmas_usuarios(firma_usuario_id, usuario_fk, firma_usuario)
VALUES('1','1','damr'),
('2','2','aibg'),
('3','3','kym'),
('4','4','magc'),
('5','5','mugp'),
('6','6','ydfg'),
('7','7','assm'),
('8','8','tsgm'),
('9','9','radc'),
('10','10','ansr'),
('11','11','mndp');

INSERT INTO estatus_usuarios(estatus_usuario_id, usuario_fk, estatus_usuario)
VALUES('1','1','ACTIVO'),
('2','2','ACTIVO'),
('3','3','ACTIVO'),
('4','4','ACTIVO'),
('5','5','ACTIVO'),
('6','6','ACTIVO'),
('7','7','ACTIVO'),
('8','8','ACTIVO'),
('9','9','ACTIVO'),
('10','10','ACTIVO'),
('11','11','ACTIVO');

# CONSULTAS E INSERSIONES TABLA USUARIOS Y SUS DEPENDENCIAS

SELECT primer_nombre, primer_apellido, ruta_foto_usuario, cargo_usuario FROM usuarios u
INNER JOIN cargos_usuarios cu ON u.usuario_id = cu.usuario_fk
INNER JOIN fotos_usuarios fu ON u.usuario_id = fu.usuario_fk
where usuario_id = 1;

SELECT numero_documento, contraseña, estatus_usuario FROM usuarios u
INNER JOIN estatus_usuarios eu ON u.usuario_id = eu.estatus_usuario_id 
WHERE numero_documento = 22798946 AND contraseña = "68c5b415b5d6dadd0c6a04f796fefba4" AND estatus_usuario = "ACTIVO";

SELECT primer_nombre, primer_apellido, cargo_usuario, ruta_foto_usuario FROM usuarios u
INNER JOIN cargos_usuarios cu ON u.usuario_id = cu.cargo_usuario_id 
INNER JOIN fotos_usuarios fu ON u.usuario_id = fu.foto_usuario_id
WHERE usuario_id=1;

UPDATE usuarios u
INNER JOIN cargos_usuarios cu ON u.usuario_id = cu.usuario_fk
INNER JOIN fotos_usuarios fu ON u.usuario_id = fu.usuario_fk
INNER JOIN firmas_usuarios fiu ON u.usuario_id = fiu.usuario_fk
INNER JOIN estatus_usuarios eu ON u.usuario_id = eu.usuario_fk
SET u.primer_nombre = 'DEIVER', u.segundo_nombre = 'ALEXANDER', u.primer_apellido = 'MARTINEZ', 
u.segundo_apellido = 'ROSALES', u.numero_documento = '22798946', u.contraseña = '68c5b415b5d6dadd0c6a04f796fefba4', 
cu.cargo_usuario = 'ANALISTA DE PROGRAMACIÓN', fu.foto_usuario = '22798946.webp', eu.estatus_usuario = 'ACTIVO', 
eu.estatus_usuario = 'ACTIVO'
WHERE usuario_id = 1;

# TABLAS DE LOS TRABAJADORES

CREATE TABLE IF NOT EXISTS trabajadores(
PRIMARY KEY (trabajador_id),
trabajador_id INT UNSIGNED AUTO_INCREMENT,
fecha_ingreso DATE,
fecha_egreso DATE NULL,
categoria ENUM('ACTIVO','EGRESADO','JUBILADO','INCAPACITADO','COMISION DE SERVICIO') NOT NULL,
estatus ENUM('EMPLEADO','OBRERO','ALTO FUNCIONARIO','ALTO NIVEL','CONTRATADO') NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS documentos_identidad_trabajadores(
PRIMARY KEY (id_documento_identidad),
id_documento_identidad INT UNSIGNED AUTO_INCREMENT,
primer_nombre VARCHAR(20) NOT NULL,
segundo_nombre VARCHAR(20) NULL,
primer_apellido VARCHAR(20) NOT NULL,
segundo_apellido VARCHAR(20) NULL,
tipo_documento ENUM('V','E') NOT NULL,
numero_documento CHAR(8) UNIQUE NOT NULL,
estado_civil ENUM('SOLTERO','SOLTERA','CASADO','CASADA','DIVORCIADO','DIVORCIADA','VIUDO','VIUDA') NOT NULL,
fecha_nacimiento DATE NOT NULL,
pais_nacimiento VARCHAR(30) NOT NULL,
sexo ENUM('MASCULINO','FEMENINO') NOT NULL,
trabajador_fk INT UNSIGNED,
FOREIGN KEY (trabajador_fk) REFERENCES trabajadores(trabajador_id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE INDEX documentos_identidad_trabajadores_idx ON documentos_identidad_trabajadores(numero_documento);

CREATE TABLE IF NOT EXISTS cargos_trabajadores(
PRIMARY KEY(cargo_trabajador_id),
cargo_trabajador_id INT UNSIGNED AUTO_INCREMENT,
dependencia TEXT NOT NULL,
cargo_trabajador TEXT NOT NULL,
fecha_inicio_cargo DATE NOT NULL,
fecha_fin_cargo DATE NULL,
trabajador_fk INT UNSIGNED,
FOREIGN KEY (trabajador_fk) REFERENCES trabajadores(trabajador_id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREAte INDEX cargos_trabajadores_idx ON cargos_trabajadores(cargo_trabajador);

CREATE TABLE IF NOT EXISTS escala_remuneracion_trabajadores(
PRIMARY KEY (escala_remuneracion_id),
escala_remuneracion_id INT UNSIGNED AUTO_INCREMENT,
escala_remuneracion VARCHAR(5),
trabajador_fk INT UNSIGNED,
FOREIGN KEY (trabajador_fk) REFERENCES trabajadores(trabajador_id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS sueldos_trabajadores(
PRIMARY KEY (sueldo_trabajador_id),
sueldo_trabajador_id INT UNSIGNED AUTO_INCREMENT,
sueldo_base DECIMAL(5,2) UNSIGNED,
prima_hijo DECIMAL(5,2) UNSIGNED,
prima_profesionalizacion INT(2) UNSIGNED,
prima_antiguedad DECIMAL(4,2) UNSIGNED,
sueldo_total_mensual DECIMAL(5,2) UNSIGNED,
trabajador_fk INT UNSIGNED,
FOREIGN KEY (trabajador_fk) REFERENCES trabajadores(trabajador_id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS cargos_ejercidos(
PRIMARY KEY (cargo_ejercido_id),
cargo_ejercido_id INT UNSIGNED AUTO_INCREMENT,
direccion_adscrita TEXT,
cargo TEXT,
fecha_inicio DATE,
fecha_fin DATE,
trabajador_fk INT UNSIGNED,
FOREIGN KEY (trabajador_fk) REFERENCES trabajadores(trabajador_id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


insert into sueldos_trabajadores(sueldo_trabajador_id,sueldo_base,prima_hijo,prima_profesionalizacion,prima_antiguedad) 
VALUES(1,246.00,0.00,25,1.00),
	  (2,192.00,25.00,20,3.00);

SELECT FORMAT(sueldo_total_mensual, 2,'es_ES') as sueldo_total_mensual from sueldos_trabajadores;

SELECT * from sueldos_trabajadores;

update sueldos_trabajadores set sueldo_total_mensual = sueldo_base + prima_profesionalizacion / 100 * sueldo_base + prima_antiguedad / 100 * sueldo_base +
prima_hijo where sueldo_trabajador_id > 0;

# TABLAS DE CONSULTA

CREATE TABLE IF NOT EXISTS consulta_dependencias(
primary key(consulta_dependencia_id),
consulta_dependencia_id INT UNSIGNED AUTO_INCREMENT,
dependencia VARCHAR(100) UNIQUE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE INDEX dependencia_idx ON consulta_dependencias(dependencia);

INSERT INTO consulta_dependencias(consulta_dependencia_id, dependencia) VALUES 
(1, 'DIRECCIÓN DE SISTEMAS Y TECNOLOGÍA DE LA INFORMACIÓN'),
(2, 'DIRECCIÓN DE PRENSA'),
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
(70, 'DIRECCIÓN DE SALUD'),
(72, 'OFICINA GENERAL DE GOBIERNO');

CREATE TABLE IF NOT EXISTS consulta_cargos(
PRIMARY KEY(id_consulta_cargo),
id_consulta_cargo INT UNSIGNED AUTO_INCREMENT,
cargo TEXT UNIQUE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO consulta_cargos(id_consulta_cargo, cargo) VALUES
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

CREATE TABLE paises (
id int(11) NOT NULL AUTO_INCREMENT,
iso char(2) DEFAULT NULL,
nombre VARCHAR(80) NOT NULL,
PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
 
INSERT INTO `paises` (`id`, `nombre`) VALUES
(1, 'Australia'),
(2, 'Austria'),
(3, 'Azerbaiyán'),
(4, 'Anguilla'),
(5, 'Argentina'),
(6, 'Armenia'),
(7, 'Bielorrusia'),
(8, 'Belice'),
(9, 'Bélgica'),
(10, 'Bermudas'),
(11, 'Bulgaria'),
(12, 'Brasil'),
(13, 'Reino Unido'),
(14, 'Hungría'),
(15, 'Vietnam'),
(16, 'Haiti'),
(17, 'Guadalupe'),
(18, 'Alemania'),
(19, 'Países Bajos, Holanda'),
(20, 'Grecia'),
(21, 'Georgia'),
(22, 'Dinamarca'),
(23, 'Egipto'),
(24, 'Israel'),
(25, 'India'),
(26, 'Irán'),
(27, 'Irlanda'),
(28, 'España'),
(29, 'Italia'),
(30, 'Kazajstán'),
(31, 'Camerún'),
(32, 'Canadá'),
(33, 'Chipre'),
(34, 'Kirguistán'),
(35, 'China'),
(36, 'Costa Rica'),
(37, 'Kuwait'),
(38, 'Letonia'),
(39, 'Libia'),
(40, 'Lituania'),
(41, 'Luxemburgo'),
(42, 'México'),
(43, 'Moldavia'),
(44, 'Mónaco'),
(45, 'Nueva Zelanda'),
(46, 'Noruega'),
(47, 'Polonia'),
(48, 'Portugal'),
(49, 'Reunión'),
(50, 'Rusia'),
(51, 'El Salvador'),
(52, 'Eslovaquia'),
(53, 'Eslovenia'),
(54, 'Surinam'),
(55, 'Estados Unidos'),
(56, 'Tadjikistan'),
(57, 'Turkmenistan'),
(58, 'Islas Turcas y Caicos'),
(59, 'Turquía'),
(60, 'Uganda'),
(61, 'Uzbekistán'),
(62, 'Ucrania'),
(63, 'Finlandia'),
(64, 'Francia'),
(65, 'República Checa'),
(66, 'Suiza'),
(67, 'Suecia'),
(68, 'Estonia'),
(69, 'Corea del Sur'),
(70, 'Japón'),
(71, 'Croacia'),
(72, 'Rumanía'),
(73, 'Hong Kong'),
(74, 'Indonesia'),
(75, 'Jordania'),
(76, 'Malasia'),
(77, 'Singapur'),
(78, 'Taiwan'),
(79, 'Bosnia y Herzegovina'),
(80, 'Bahamas'),
(81, 'Chile'),
(82, 'Colombia'),
(83, 'Islandia'),
(84, 'Corea del Norte'),
(85, 'Macedonia'),
(86, 'Malta'),
(87, 'Pakistán'),
(88, 'Papúa-Nueva Guinea'),
(89, 'Perú'),
(90, 'Filipinas'),
(91, 'Arabia Saudita'),
(92, 'Tailandia'),
(93, 'Emiratos árabes Unidos'),
(94, 'Groenlandia'),
(95, 'Venezuela'),
(96, 'Zimbabwe'),
(97, 'Kenia'),
(98, 'Algeria'),
(99, 'Líbano'),
(100, 'Botsuana'),
(101, 'Tanzania'),
(102, 'Namibia'),
(103, 'Ecuador'),
(104, 'Marruecos'),
(105, 'Ghana'),
(106, 'Siria'),
(107, 'Nepal'),
(108, 'Mauritania'),
(109, 'Seychelles'),
(110, 'Paraguay'),
(111, 'Uruguay'),
(112, 'Congo (Brazzaville)'),
(113, 'Cuba'),
(114, 'Albania'),
(115, 'Nigeria'),
(116, 'Zambia'),
(117, 'Mozambique'),
(119, 'Angola'),
(120, 'Sri Lanka'),
(121, 'Etiopía'),
(122, 'Túnez'),
(123, 'Bolivia'),
(124, 'Panamá'),
(125, 'Malawi'),
(126, 'Liechtenstein'),
(127, 'Bahrein'),
(128, 'Barbados'),
(130, 'Chad'),
(131, 'Man, Isla de'),
(132, 'Jamaica'),
(133, 'Malí'),
(134, 'Madagascar'),
(135, 'Senegal'),
(136, 'Togo'),
(137, 'Honduras'),
(138, 'República Dominicana'),
(139, 'Mongolia'),
(140, 'Irak'),
(141, 'Sudáfrica'),
(142, 'Aruba'),
(143, 'Gibraltar'),
(144, 'Afganistán'),
(145, 'Andorra'),
(147, 'Antigua y Barbuda'),
(149, 'Bangladesh'),
(151, 'Benín'),
(152, 'Bután'),
(154, 'Islas Virgenes Británicas'),
(155, 'Brunéi'),
(156, 'Burkina Faso'),
(157, 'Burundi'),
(158, 'Camboya'),
(159, 'Cabo Verde'),
(164, 'Comores'),
(165, 'Congo (Kinshasa)'),
(166, 'Cook, Islas'),
(168, 'Costa de Marfil'),
(169, 'Djibouti, Yibuti'),
(171, 'Timor Oriental'),
(172, 'Guinea Ecuatorial'),
(173, 'Eritrea'),
(175, 'Feroe, Islas'),
(176, 'Fiyi'),
(178, 'Polinesia Francesa'),
(180, 'Gabón'),
(181, 'Gambia'),
(184, 'Granada'),
(185, 'Guatemala'),
(186, 'Guernsey'),
(187, 'Guinea'),
(188, 'Guinea-Bissau'),
(189, 'Guyana'),
(193, 'Jersey'),
(195, 'Kiribati'),
(196, 'Laos'),
(197, 'Lesotho'),
(198, 'Liberia'),
(200, 'Maldivas'),
(201, 'Martinica'),
(202, 'Mauricio'),
(205, 'Myanmar'),
(206, 'Nauru'),
(207, 'Antillas Holandesas'),
(208, 'Nueva Caledonia'),
(209, 'Nicaragua'),
(210, 'Níger'),
(212, 'Norfolk Island'),
(213, 'Omán'),
(215, 'Isla Pitcairn'),
(216, 'Qatar'),
(217, 'Ruanda'),
(218, 'Santa Elena'),
(219, 'San Cristobal y Nevis'),
(220, 'Santa Lucía'),
(221, 'San Pedro y Miquelón'),
(222, 'San Vincente y Granadinas'),
(223, 'Samoa'),
(224, 'San Marino'),
(225, 'San Tomé y Príncipe'),
(226, 'Serbia y Montenegro'),
(227, 'Sierra Leona'),
(228, 'Islas Salomón'),
(229, 'Somalia'),
(232, 'Sudán'),
(234, 'Swazilandia'),
(235, 'Tokelau'),
(236, 'Tonga'),
(237, 'Trinidad y Tobago'),
(239, 'Tuvalu'),
(240, 'Vanuatu'),
(241, 'Wallis y Futuna'),
(242, 'Sáhara Occidental'),
(243, 'Yemen'),
(246, 'Puerto Rico');

# CONSULTAS

SELECT primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, tipo_documento, numero_documento, DAY(fecha_ingreso) AS dia_ingreso, MONTH(fecha_ingreso) AS mes_ingreso, YEAR(fecha_ingreso) AS ano_ingreso, cargo, direccion_adscrita, escala_remuneracion, sueldo FROM trabajadores 
INNER JOIN documentos_identidad ON trabajadores.trabajador_id = documentos_identidad.id_documento_identidad
INNER JOIN sueldos_trabajadores ON trabajadores.trabajador_id = sueldos_trabajadores.sueldos_trabajadores_id
INNER JOIN cargos_ejercidos ON trabajadores.trabajador_id = cargos_ejercidos.cargo_ejercido_id
INNER JOIN escala_remuneracion ON trabajadores.trabajador_id = escala_remuneracion.escala_remuneracion_id
WHERE numero_documento = 22798946;


UPDATE trabajadores t 
INNER JOIN documentos_identidad di ON t.trabajador_id = di.id_documento_identidad
INNER JOIN cargos_ejercidos ce ON t.trabajador_id = ce.cargo_ejercido_id
INNER JOIN escala_remuneracion er ON t.trabajador_id = er.escala_remuneracion_id
INNER JOIN sueldos_trabajadores st ON t.trabajador_id = st.sueldos_trabajadores_id 
SET t.fecha_ingreso = '1994-10-30', t.fecha_egreso = '1994-10-30', t.categoria = 'INCAPACITADO', t.estatus = 'CONTRATADO',
di.primer_nombre = 'jheynder', di.segundo_nombre = 'jose', di.primer_apellido = 'celis', di.segundo_apellido = 'chacoa', di.tipo_documento = 'E', di.numero_documento = '7',
di.estado_civil = 'SOLTERA', di.fecha_nacimiento = '1994-10-30', di.pais_nacimiento = 'ANGOLA', di.sexo = 'FEMENINO',
ce.fecha_inicio = '1994-10-30', ce.fecha_fin = '1994-10-30', ce.direccion_adscrita = 'SOCIALES', ce.cargo = 'NINGUNO',
er.escala_remuneracion = 'BI-III',
st.sueldo = '500,20'
WHERE trabajador_id = '6';

DELETE t, di FROM trabajadores t 
LEFT JOIN documentos_identidad di ON t.trabajador_id = di.id_documento_identidad 
LEFT JOIN cargos_ejercidos ce ON t.trabajador_id = ce.cargo_ejercido_id
LEFT JOIN escala_remuneracion er ON t.trabajador_id = er.escala_remuneracion_id
LEFT JOIN sueldos_trabajadores st ON t.trabajador_id = st.sueldos_trabajadores_id
WHERE t.trabajador_id = 1;

