-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-04-2020 a las 18:14:19
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gdlwebcamp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) UNSIGNED NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `editado` datetime NOT NULL,
  `nivel` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id_admin`, `usuario`, `nombre`, `password`, `editado`, `nivel`) VALUES
(3, 'admin', 'admin', '$2y$12$/D1QLJKVXlMCwjvzNWnXhOs2pc1dDR324XqEZ.JHHda5g0o/E.F5.', '0000-00-00 00:00:00', 1),
(4, 'jose ', 'jose', '$2y$12$.MEc/Bki0Tm71vFo5oKIX.avQkSA7FCNGloH23Q67JR93b3UTS9da', '0000-00-00 00:00:00', 0),
(5, 'phool123', 'phool123', '$2y$12$gmdOhrihH7E.HiJHKcHzhuveZ9TI2Md5eqD/dsJlUakiSjNzkLaqm', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_evento`
--

CREATE TABLE `categoria_evento` (
  `id_categoria` tinyint(10) UNSIGNED NOT NULL,
  `cat_evento` varchar(50) NOT NULL,
  `icono` varchar(15) NOT NULL,
  `editado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria_evento`
--

INSERT INTO `categoria_evento` (`id_categoria`, `cat_evento`, `icono`, `editado`) VALUES
(1, 'Seminario', 'fa-university', '0000-00-00 00:00:00'),
(2, 'Conferencias', 'fa-comment', '0000-00-00 00:00:00'),
(3, 'Talleres', 'fa-code', '0000-00-00 00:00:00'),
(5, 'Mentorias', 'fab fa-amilia', '2020-04-10 22:40:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `evento_id` tinyint(10) UNSIGNED NOT NULL,
  `nombre_evento` varchar(60) NOT NULL,
  `fecha_evento` date NOT NULL,
  `hora_evento` time NOT NULL,
  `id_cat_evento` tinyint(10) UNSIGNED NOT NULL,
  `id_inv` tinyint(10) UNSIGNED NOT NULL,
  `clave` varchar(10) NOT NULL,
  `editado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`, `editado`) VALUES
(5, 'Responsive Web Design', '2016-12-09', '10:00:00', 3, 1, 'taller_01', '0000-00-00 00:00:00'),
(6, 'Flexbox', '2016-12-09', '12:00:00', 3, 2, 'taller_02', '0000-00-00 00:00:00'),
(7, 'HTML5 y CSS3', '2016-12-09', '14:00:00', 3, 3, 'taller_03', '0000-00-00 00:00:00'),
(8, 'Drupal', '2016-12-09', '17:00:00', 3, 4, 'taller_04', '0000-00-00 00:00:00'),
(9, 'WordPress', '2016-12-09', '19:00:00', 3, 5, 'taller_05', '0000-00-00 00:00:00'),
(11, 'Tecnologías del Futuro', '2016-12-09', '17:00:00', 2, 1, 'conf_02', '0000-00-00 00:00:00'),
(12, 'Seguridad en la Web', '2016-12-09', '19:00:00', 2, 2, 'conf_03', '0000-00-00 00:00:00'),
(13, 'Diseño UI y UX para móviles', '2016-12-09', '10:00:00', 1, 6, 'sem_01', '0000-00-00 00:00:00'),
(15, 'PHP y MySQL', '2016-12-10', '12:00:00', 3, 2, 'taller_07', '0000-00-00 00:00:00'),
(16, 'JavaScript Avanzado', '2016-12-10', '14:00:00', 3, 3, 'taller_08', '0000-00-00 00:00:00'),
(17, 'SEO en Google', '2016-12-10', '17:00:00', 3, 4, 'taller_09', '0000-00-00 00:00:00'),
(18, 'De Photoshop a HTML5 y CSS3', '2016-12-10', '19:00:00', 3, 5, 'taller_10', '0000-00-00 00:00:00'),
(19, 'PHP Intermedio y Avanzado', '2016-12-10', '21:00:00', 3, 6, 'taller_11', '0000-00-00 00:00:00'),
(21, 'Los mejores lugares para encontrar trabajo', '2016-12-10', '17:00:00', 2, 1, 'conf_05', '0000-00-00 00:00:00'),
(22, 'Pasos para crear un negocio rentable ', '2016-12-10', '19:00:00', 2, 2, 'conf_06', '0000-00-00 00:00:00'),
(24, 'Diseño UI y UX para móviles', '2016-12-10', '17:00:00', 1, 5, 'sem_03', '0000-00-00 00:00:00'),
(25, 'Laravel', '2016-12-11', '10:00:00', 3, 1, 'taller_12', '0000-00-00 00:00:00'),
(26, 'Crea tu propia API', '2016-12-11', '10:00:00', 3, 2, 'taller_26', '0000-00-00 00:00:00'),
(28, 'Creando Plantillas para WordPress', '2016-12-11', '17:00:00', 3, 4, 'taller_15', '0000-00-00 00:00:00'),
(29, 'Tiendas Virtuales en Magento', '2016-12-11', '19:00:00', 3, 5, 'taller_16', '0000-00-00 00:00:00'),
(30, 'Como hacer Marketing en línea', '2016-12-11', '10:00:00', 2, 6, 'conf_07', '0000-00-00 00:00:00'),
(31, '¿Con que lenguaje debo empezar?', '2016-12-11', '17:00:00', 2, 2, 'conf_08', '0000-00-00 00:00:00'),
(32, 'Frameworks y librerias Open Source', '2016-12-11', '19:00:00', 2, 3, 'conf_09', '0000-00-00 00:00:00'),
(33, 'Creando una App en Android en una mañana', '2016-12-11', '10:00:00', 1, 4, 'sem_04', '0000-00-00 00:00:00'),
(34, 'Creando una App en iOS en una tarde', '2016-12-11', '17:00:00', 1, 1, 'sem_05', '0000-00-00 00:00:00'),
(47, 'Seduccion 3D', '1970-01-01', '10:52:00', 1, 5, '47', '0000-00-00 00:00:00'),
(49, 'Simuladores de Negocios', '2020-03-29', '01:43:00', 1, 6, '', '0000-00-00 00:00:00'),
(51, 'Hacking PhoolDx', '2020-03-21', '09:48:00', 2, 2, '', '0000-00-00 00:00:00'),
(52, 'Lava platos', '2020-03-29', '18:51:00', 1, 3, '', '0000-00-00 00:00:00'),
(53, 'No guarda clave el registro ', '2020-04-05', '04:29:00', 2, 83, 'taller_21', '0000-00-00 00:00:00'),
(54, 'Evento array para insertar en registros', '2020-04-26', '07:02:00', 1, 83, 'nepe', '0000-00-00 00:00:00'),
(55, 'Troleanda123', '2020-03-26', '19:01:00', 1, 4, '4', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitados`
--

CREATE TABLE `invitados` (
  `invitado_id` tinyint(10) UNSIGNED NOT NULL,
  `nombre_invitado` varchar(30) NOT NULL,
  `apellido_invitado` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `url_imagen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `invitados`
--

INSERT INTO `invitados` (`invitado_id`, `nombre_invitado`, `apellido_invitado`, `descripcion`, `url_imagen`) VALUES
(1, 'Rafael', 'Bautista', 'Lorem insop tengo que traiar mi cuarto para el dia del padre estar happy este lorem insop no esta muy chetado.Tengo un 18 en el examne de medio curso del ingeniero walter baldeon canchaya en el cursos de redes y telecomunicaciones dos', 'invitado1.jpg'),
(2, 'Shari', 'Herrera', 'o.Tengo un 18 en el examne de medio curso del ingeniero walter baldeon canchaya en el cursos de redes y telecomunicaciones dos', 'invitado2.jpg'),
(3, 'Gregorio', 'Sanchez', 'Lorem insop tengo que traiar mi cuarto para el dia del padre estar happy este lorem insop no esta muy chetad', 'invitado3.jpg'),
(4, 'Susana', 'Rivera', 'ar happy este lorem insop no esta muy chetado.Tengo un 18 en el examne de medio ', 'invitado4.jpg'),
(5, 'Harold', 'Garcia', 'Lorem insop tengo que traiar mi cuarto para el dia del padre estar happy este lorem insop no esta muy chetado.Tengo un 18 en el examne de medio curso del ingeniero walter baldeon canchaya en el cursos de redes y telecomunicaciones dosLorem insop tengo que traiar mi cuarto para el dia del padre estar happy este lorem insop no esta muy chetado.Tengo un 18 en el examne de medio curso del ingeniero walter baldeon canchaya en el cursos de redes y telecomunicaciones dos', 'invitado5.jpg'),
(6, 'Susan', 'Sanchez', ' 18 en el examne de medio curso del ingeniero walter baldeon canchaya en el cursos de redes y telecomunicaciones dosLorem insop tengo que traiar mi cuarto para el dia del padre estar happy este lorem insop no esta muy chetado.Tengo un 18 en el examne de medio curso del ingeniero walter baldeon canchaya en el cursos de redes y telecomunicaciones dos', 'invitado6.jpg'),
(82, 'Phool', 'Herrera C.', 'Un inversinista de gama alta reconocido a nivel mundial, opera acciones sobre opciones y llego a la fama al operar opciones binarias.', 'Captura de pantalla (468).png'),
(83, 'El', 'Brayan', 'Un choro experimentado.', 'Captura de pantalla (112).png'),
(84, 'El', 'Brandom', 'Su bronca de el brayan,seguridad total para tu negocio.', 'Captura de pantalla (1).png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regalos`
--

CREATE TABLE `regalos` (
  `ID_regalo` int(11) UNSIGNED NOT NULL,
  `nombre_regalo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `regalos`
--

INSERT INTO `regalos` (`ID_regalo`, `nombre_regalo`) VALUES
(1, 'Pulsera'),
(2, 'Etiquetas'),
(3, 'Plumas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrados`
--

CREATE TABLE `registrados` (
  `ID_Registrado` bigint(20) UNSIGNED NOT NULL,
  `nombre_registrado` varchar(50) NOT NULL,
  `apellido_registrado` varchar(50) NOT NULL,
  `email_registrado` varchar(100) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `pases_articulos` longtext NOT NULL,
  `talleres_registrados` longtext NOT NULL,
  `regalo` int(11) UNSIGNED DEFAULT NULL,
  `total_pagado` varchar(50) NOT NULL,
  `pagado` int(1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registrados`
--

INSERT INTO `registrados` (`ID_Registrado`, `nombre_registrado`, `apellido_registrado`, `email_registrado`, `fecha_registro`, `pases_articulos`, `talleres_registrados`, `regalo`, `total_pagado`, `pagado`) VALUES
(278, 'ga', 'ga', '213@replay.com', '2017-04-07 09:56:14', '{\"un_dia\":{\"cantidad\":\"1\"},\"pase_completo\":{\"cantidad\":\"\"},\"pase_2dias\":{\"cantidad\":\"\"}}', '{\"eventos\":[\"9\"]}', 1, '10', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `categoria_evento`
--
ALTER TABLE `categoria_evento`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`evento_id`),
  ADD KEY `id_categoria` (`id_cat_evento`),
  ADD KEY `id_invitado` (`id_inv`);

--
-- Indices de la tabla `invitados`
--
ALTER TABLE `invitados`
  ADD PRIMARY KEY (`invitado_id`);

--
-- Indices de la tabla `regalos`
--
ALTER TABLE `regalos`
  ADD PRIMARY KEY (`ID_regalo`);

--
-- Indices de la tabla `registrados`
--
ALTER TABLE `registrados`
  ADD PRIMARY KEY (`ID_Registrado`),
  ADD KEY `regalo` (`regalo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categoria_evento`
--
ALTER TABLE `categoria_evento`
  MODIFY `id_categoria` tinyint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `evento_id` tinyint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `invitados`
--
ALTER TABLE `invitados`
  MODIFY `invitado_id` tinyint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de la tabla `regalos`
--
ALTER TABLE `regalos`
  MODIFY `ID_regalo` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `registrados`
--
ALTER TABLE `registrados`
  MODIFY `ID_Registrado` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_cat_evento`) REFERENCES `categoria_evento` (`id_categoria`),
  ADD CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`id_inv`) REFERENCES `invitados` (`invitado_id`);

--
-- Filtros para la tabla `registrados`
--
ALTER TABLE `registrados`
  ADD CONSTRAINT `registrados_ibfk_1` FOREIGN KEY (`regalo`) REFERENCES `regalos` (`id_regalo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
