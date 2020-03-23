-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 23-03-2020 a las 02:08:50
-- Versión del servidor: 8.0.18
-- Versión de PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

DROP TABLE IF EXISTS `administradores`;
CREATE TABLE IF NOT EXISTS `administradores` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_admin` varchar(200) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_admin`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritos`
--

DROP TABLE IF EXISTS `carritos`;
CREATE TABLE IF NOT EXISTS `carritos` (
  `id_carrito` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `id_juego` int(11) DEFAULT NULL,
  `id_subscripcion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_carrito`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(200) NOT NULL,
  PRIMARY KEY (`id_categoria`),
  UNIQUE KEY `nombre_categoria` (`nombre_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Acción'),
(17, 'Atmosférico'),
(2, 'Aventura'),
(3, 'Carreras'),
(4, 'Casual'),
(12, 'Cooperativo'),
(5, 'Deportes'),
(15, 'Difícil'),
(6, 'Estrategia'),
(14, 'Humor'),
(7, 'Indie'),
(8, 'Multijugador masivo'),
(20, 'Mundo Abierto'),
(16, 'Primera Persona'),
(22, 'raros'),
(9, 'Rol'),
(18, 'Sangre'),
(13, 'Sigilo'),
(10, 'Simuladores'),
(19, 'Supervivencia'),
(11, 'Terror');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigos`
--

DROP TABLE IF EXISTS `codigos`;
CREATE TABLE IF NOT EXISTS `codigos` (
  `id_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `id_juego` int(11) DEFAULT NULL,
  `id_subscripcion` int(11) DEFAULT NULL,
  `codigo` varchar(500) NOT NULL,
  PRIMARY KEY (`id_codigo`),
  KEY `id_juego` (`id_juego`),
  KEY `id_subscripcion` (`id_subscripcion`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `codigos`
--

INSERT INTO `codigos` (`id_codigo`, `id_juego`, `id_subscripcion`, `codigo`) VALUES
(72, 5, NULL, 'ssadasdsa'),
(73, 5, NULL, 'sdasdsadsa'),
(74, 2, NULL, 'adsasdasdas'),
(76, 9, NULL, 'sadasdasdsa'),
(77, 9, NULL, 'sdasdsadsaddas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

DROP TABLE IF EXISTS `imagenes`;
CREATE TABLE IF NOT EXISTS `imagenes` (
  `id_imagen` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(500) NOT NULL,
  `id_juego` int(11) DEFAULT NULL,
  `id_subscripcion` int(11) DEFAULT NULL,
  `id_oferta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_imagen`),
  KEY `id_juego` (`id_juego`),
  KEY `id_subscripcion` (`id_subscripcion`),
  KEY `imagenes_ibfk_3` (`id_oferta`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id_imagen`, `url`, `id_juego`, `id_subscripcion`, `id_oferta`) VALUES
(4, 'assets/media/juegos/AsO1.jpg', 4, NULL, NULL),
(5, 'assets/media/juegos/B1.jpg', 5, NULL, NULL),
(6, 'assets/media/juegos/BL1.jpg', 6, NULL, NULL),
(7, 'assets/media/juegos/C1.png', 2, NULL, NULL),
(8, 'assets/media/juegos/DS1.jpg', 3, NULL, NULL),
(9, 'assets/media/juegos/Dead1.jpg', 9, NULL, NULL),
(10, 'assets/media/juegos/D1.png', 7, NULL, NULL),
(11, 'assets/media/juegos/N1.png', 8, NULL, NULL),
(12, 'assets/media/juegos/TombRaider-2.jpg', 11, NULL, NULL),
(13, 'assets/media/juegos/AsO2.jpg', 4, NULL, NULL),
(14, 'assets/media/juegos/AsO3.jpg', 4, NULL, NULL),
(15, 'assets/media/juegos/AsO4.jpg', 4, NULL, NULL),
(16, 'assets/media/juegos/DS2.jpg', 3, NULL, NULL),
(17, 'assets/media/juegos/C2.png', 2, NULL, NULL),
(18, 'assets/media/juegos/C3.png', 2, NULL, NULL),
(19, 'assets/media/juegos/C4.png', 2, NULL, NULL),
(20, 'assets/media/juegos/B2.jpg', 5, NULL, NULL),
(21, 'assets/media/juegos/B3.jpg', 5, NULL, NULL),
(22, 'assets/media/juegos/B4.jpg', 5, NULL, NULL),
(23, 'assets/media/juegos/M1.jpg', 12, NULL, NULL),
(24, 'assets/media/juegos/M2.jpg', 12, NULL, NULL),
(25, 'assets/media/juegos/M3.png', 12, NULL, NULL),
(27, 'assets/media/juegos/BL2.jpg', 6, NULL, NULL),
(28, 'assets/media/juegos/BL3.jpg', 6, NULL, NULL),
(29, 'assets/media/juegos/BL4.jpg', 6, NULL, NULL),
(30, 'assets/media/juegos/D2.png', 7, NULL, NULL),
(31, 'assets/media/juegos/D3.jpg', 7, NULL, NULL),
(32, 'assets/media/juegos/D4.png', 7, NULL, NULL),
(33, 'assets/media/juegos/N2.jpg', 8, NULL, NULL),
(34, 'assets/media/juegos/N3.jpg', 8, NULL, NULL),
(35, 'assets/media/juegos/N4.jpg', 8, NULL, NULL),
(36, 'assets/media/juegos/Dead2.jpg', 9, NULL, NULL),
(37, 'assets/media/juegos/Dead3.jpg', 9, NULL, NULL),
(38, 'assets/media/juegos/Dead4.jpg', 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

DROP TABLE IF EXISTS `juegos`;
CREATE TABLE IF NOT EXISTS `juegos` (
  `id_juego` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_juego` varchar(200) NOT NULL,
  `precio_juego` int(11) DEFAULT NULL,
  `stock_juego` int(11) DEFAULT NULL,
  `descripcion_juego` varchar(500) DEFAULT NULL,
  `url_juego` varchar(500) NOT NULL,
  `id_plataforma` int(11) NOT NULL,
  PRIMARY KEY (`id_juego`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id_juego`, `nombre_juego`, `precio_juego`, `stock_juego`, `descripcion_juego`, `url_juego`, `id_plataforma`) VALUES
(2, 'Celeste', 9500, 1, 'Ayuda a Madeline a sobrevivir a los demonios de su interior en su viaje hasta la cima de la montaña Celeste, en este ajustadísimo plataforma, obra de los creadores de TowerFall. Enfréntate a cientos de desafíos diseñados a mano, devela retorcidos secretos y, y reconstruye el misterio de la montaña.', 'assets/media/juegos/Celeste.png', 1),
(3, 'Dark Souls 3', 10000, 0, 'Dark Souls continúa redefiniendo los límites con el nuevo y ambicioso capítulo de esta serie revolucionaria, tan aclamada por la crítica. ¡Prepárate para sumergirte en la oscuridad!', 'assets/media/juegos/DarkSouls3.jpg', 2),
(4, 'Assassins Creed Origins', 25000, 0, 'ASSASSIN’S CREED® ORIGINS ES UN NUEVO COMIENZO *¡Discovery Tour by Assassin’s Creed®: Antiguo Egipto está ya disponible como actualización gratuita!* El esplendor y el misterio del antiguo Egipto se desdibujan en una cruenta lucha por el poder.', 'assets/media/juegos/AssassinCreedO.jpg', 2),
(5, 'Batman Arkham Knight', 3000, 2, 'Batman™: Arkham Knight es la épica conclusión de la galardonada trilogía de Arkham, creada por Rocksteady Studios. El título, desarrollado en exclusiva para plataformas de nueva generación, presenta la espectacular versión del batmóvil imaginada por Rocksteady.', 'assets/media/juegos/BatmanAK.jpg', 1),
(6, 'Borderlands 3', 30000, 0, '¡Descubre el shooter cooperativo original, repleto de mejoras! Encarna a uno de los cuatro mercenarios de gatillo fácil, equípate con tropecientas armas y adéntrate en el planeta desértico de Pandora.', 'assets/media/juegos/Borderlands3.jpg', 1),
(7, ' Devil May Cry 5', 12000, 0, 'El cazademonios definitivo vuelve con estilo en el juego que los fans de la acción estaban esperando.', 'assets/media/juegos/DevilMaycry5.png', 1),
(8, 'No Man\'s Sky', 15000, 0, 'No Man\'s Sky es un juego de ciencia ficción sobre exploración y supervivencia en un universo infinito generado de forma procedimental.', 'assets/media/juegos/NoManSky.png', 1),
(9, 'Daed by Daylight', 9500, 2, 'Dead by Daylight es un juego de horror de multijugador (4 contra 1) en el que un jugador representa el rol del asesino despiadado y los 4 restantes juegan como supervivientes que intentan escapar de él para evitar ser capturados y asesinados.', 'assets/media/juegos/DeadByDaylight.jpg', 1),
(10, 'Resident Evil 2', 15000, 0, 'Publicado originalmente en 1998, Resident Evil 2, uno de los juegos más icónicos de todos los tiempos, regresa completamente reinventado para las consolas de nueva generación.', 'assets/media/juegos/ResidentEvil2.png', 1),
(11, 'Shadow of the Tomb Raider', 8000, 0, 'Mientras Lara Croft trata de salvar el mundo de un apocalipsis maya, deberá convertirse en la saqueadora de tumbas que está destinada a ser.', 'assets/media/juegos/TombRaider.jpg', 2),
(12, 'Minecraft', 1500, 0, 'Minecraft es un videojuego de construcción, de tipo «mundo abierto» o sandbox', 'assets/media/juegos/Minecraft.png', 1),
(15, 'crash ', 0, 0, 'xd', 'assets/media/juegos/1584921730Videojuego Halo_xtrafondos.com (1).jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos_categoria`
--

DROP TABLE IF EXISTS `juegos_categoria`;
CREATE TABLE IF NOT EXISTS `juegos_categoria` (
  `id_juego` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_juego`,`id_categoria`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `juegos_categoria`
--

INSERT INTO `juegos_categoria` (`id_juego`, `id_categoria`) VALUES
(3, 1),
(7, 1),
(11, 1),
(4, 2),
(8, 2),
(11, 2),
(2, 7),
(3, 9),
(6, 9),
(9, 11),
(10, 11),
(9, 12),
(6, 14),
(5, 17),
(10, 17),
(15, 17),
(9, 18),
(9, 19),
(12, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

DROP TABLE IF EXISTS `ofertas`;
CREATE TABLE IF NOT EXISTS `ofertas` (
  `id_oferta` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_oferta` varchar(500) DEFAULT NULL,
  `nombre_oferta` varchar(200) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  PRIMARY KEY (`id_oferta`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ofertas`
--

INSERT INTO `ofertas` (`id_oferta`, `descripcion_oferta`, `nombre_oferta`, `fecha_inicio`, `fecha_fin`) VALUES
(2, 'juegos al 50%', 'Oferta relampago', '2020-03-15', '2020-03-15'),
(3, 'Juegos al 20%', 'Ofertas XD', '2020-03-15', '2020-03-15'),
(4, 'Juegos free', 'Promo super mega duper super fantastica', '2020-03-15', '2020-03-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataformas`
--

DROP TABLE IF EXISTS `plataformas`;
CREATE TABLE IF NOT EXISTS `plataformas` (
  `id_plataforma` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_plataforma` varchar(200) NOT NULL,
  PRIMARY KEY (`id_plataforma`),
  UNIQUE KEY `nombre_plataforma` (`nombre_plataforma`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `plataformas`
--

INSERT INTO `plataformas` (`id_plataforma`, `nombre_plataforma`) VALUES
(5, 'Nintendo '),
(2, 'Origin'),
(4, 'PlayStation'),
(1, 'Steam'),
(3, 'Xbox');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `populares`
--

DROP TABLE IF EXISTS `populares`;
CREATE TABLE IF NOT EXISTS `populares` (
  `id_populares` int(11) NOT NULL AUTO_INCREMENT,
  `orden_compra` int(11) NOT NULL,
  `id_juego` int(11) DEFAULT NULL,
  `id_subscripcion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_populares`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `populares`
--

INSERT INTO `populares` (`id_populares`, `orden_compra`, `id_juego`, `id_subscripcion`) VALUES
(1, 1, 7, NULL),
(2, 1, 7, NULL),
(3, 1, NULL, 3),
(4, 2, 3, NULL),
(5, 3, 7, NULL),
(6, 4, 5, NULL),
(7, 5, 4, NULL),
(8, 5, 4, NULL),
(9, 6, 7, NULL),
(10, 7, 7, NULL),
(11, 8, 7, NULL),
(12, 9, 9, NULL),
(13, 10, 4, NULL),
(14, 11, 4, NULL),
(15, 12, 9, NULL),
(16, 13, 9, NULL),
(17, 18, 4, NULL),
(18, 22, 2, NULL),
(19, 22, 2, NULL),
(20, 28, 6, NULL),
(21, 29, 5, NULL),
(22, 33, 7, NULL),
(23, 35, 7, NULL),
(24, 36, 15, NULL),
(25, 37, 15, NULL),
(26, 38, 15, NULL),
(27, 39, 15, NULL),
(28, 40, 7, NULL),
(29, 40, 15, NULL),
(30, 41, 6, NULL),
(31, 43, 6, NULL),
(32, 43, 7, NULL),
(33, 44, 7, NULL),
(34, 44, 6, NULL),
(35, 46, 7, NULL),
(36, 47, 6, NULL),
(37, 47, 15, NULL),
(38, 48, 6, NULL),
(39, 51, 15, NULL),
(40, 53, 7, NULL),
(41, 54, 5, NULL),
(42, 55, 7, NULL),
(43, 56, 7, NULL),
(44, 56, 2, NULL),
(45, 56, 15, NULL),
(46, 57, 7, NULL),
(47, 57, 2, NULL),
(48, 58, 7, NULL),
(49, 59, 7, NULL),
(50, 61, 7, NULL),
(51, 62, 7, NULL),
(52, 63, 7, NULL),
(53, 64, 9, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

DROP TABLE IF EXISTS `promociones`;
CREATE TABLE IF NOT EXISTS `promociones` (
  `id_juego` int(11) NOT NULL,
  `id_oferta` int(11) NOT NULL,
  `time_oferta` int(11) DEFAULT NULL COMMENT 'tiempo en horas',
  `descuento` int(11) DEFAULT NULL COMMENT 'porcentaje de descuento',
  PRIMARY KEY (`id_juego`,`id_oferta`),
  KEY `id_oferta` (`id_oferta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `promociones`
--

INSERT INTO `promociones` (`id_juego`, `id_oferta`, `time_oferta`, `descuento`) VALUES
(2, 3, NULL, 35),
(3, 4, 2, 100),
(4, 2, NULL, 50),
(6, 3, NULL, 52),
(12, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subscripciones`
--

DROP TABLE IF EXISTS `subscripciones`;
CREATE TABLE IF NOT EXISTS `subscripciones` (
  `id_subscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `precio_subscripcion` int(11) DEFAULT NULL,
  `tipo_subscripcion` varchar(20) DEFAULT NULL,
  `url_subscripcion` varchar(500) NOT NULL,
  `id_plataforma` int(11) NOT NULL,
  `stock_suscripcion` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_subscripcion`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subscripciones`
--

INSERT INTO `subscripciones` (`id_subscripcion`, `precio_subscripcion`, `tipo_subscripcion`, `url_subscripcion`, `id_plataforma`, `stock_suscripcion`) VALUES
(3, 2500, '1 mes', 'assets/media/juegos/Nintendo.png', 5, 0),
(4, 5301, '3 mesesasd', 'assets/media/juegos/1584247392WhatsApp Image 2020-03-03 at 10.18.04 PM.jpeg', 2, 0),
(5, 13500, '12 meses', 'assets/media/juegos/1584246989WhatsApp Image 2020-03-03 at 10.12.17 PM (1).jpeg', 5, 0),
(6, 6000, '1 mes', 'assets/media/juegos/Xbox.jpg', 3, 0),
(7, 17900, '3 meses', 'assets/media/juegos/PS.jpg', 4, 0),
(8, 35900, '12 meses', 'assets/media/juegos/PS.jpg', 4, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Admin', 'demo_admin@gmail.com', NULL, '$2y$10$pXZii2ci4xSIcqRiN0/XKemxpAW/rFtWknGwT5WrlLlmTWeS3c63W', NULL, '2020-02-24 07:45:50', '2020-02-24 07:45:50'),
(6, 'Clientexd', 'demo_cliente@gmail.com', NULL, '$2y$10$pXZii2ci4xSIcqRiN0/XKemxpAW/rFtWknGwT5WrlLlmTWeS3c63W', NULL, NULL, NULL),
(12, 'Esteban', 'estebantoloza1998@gmail.com', NULL, '$2y$10$w.Enl6T0ibiH/D43fr5qEuDlxAODo7UzslsAqJy.RRO6d3Emu.KoS', NULL, '2020-03-21 20:18:12', '2020-03-21 20:18:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `orden_compra` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`orden_compra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`orden_compra`, `id_usuario`, `fecha`) VALUES
(47, 12, '2020-03-23 00:56:15'),
(48, 12, '2020-03-23 01:04:46'),
(49, 12, '2020-03-23 01:05:12'),
(50, 12, '2020-03-23 01:06:41'),
(51, 12, '2020-03-23 01:13:10'),
(52, 12, '2020-03-23 01:13:59'),
(53, 12, '2020-03-23 01:15:52'),
(54, 12, '2020-03-23 01:19:54'),
(55, 12, '2020-03-23 01:26:52'),
(56, 12, '2020-03-23 01:31:17'),
(57, 12, '2020-03-23 01:34:38'),
(58, 12, '2020-03-23 01:36:51'),
(59, 12, '2020-03-23 01:39:16'),
(60, 6, '2020-03-23 01:52:07'),
(61, 6, '2020-03-23 01:53:57'),
(62, 6, '2020-03-23 01:58:03'),
(63, 6, '2020-03-23 02:01:07'),
(64, 12, '2020-03-23 02:06:13');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD CONSTRAINT `administradores_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `codigos`
--
ALTER TABLE `codigos`
  ADD CONSTRAINT `codigos_ibfk_1` FOREIGN KEY (`id_juego`) REFERENCES `juegos` (`id_juego`) ON DELETE CASCADE,
  ADD CONSTRAINT `codigos_ibfk_2` FOREIGN KEY (`id_subscripcion`) REFERENCES `subscripciones` (`id_subscripcion`) ON DELETE CASCADE;

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_ibfk_1` FOREIGN KEY (`id_juego`) REFERENCES `juegos` (`id_juego`) ON DELETE CASCADE,
  ADD CONSTRAINT `imagenes_ibfk_2` FOREIGN KEY (`id_subscripcion`) REFERENCES `subscripciones` (`id_subscripcion`) ON DELETE CASCADE,
  ADD CONSTRAINT `imagenes_ibfk_3` FOREIGN KEY (`id_oferta`) REFERENCES `ofertas` (`id_oferta`) ON DELETE CASCADE;

--
-- Filtros para la tabla `juegos_categoria`
--
ALTER TABLE `juegos_categoria`
  ADD CONSTRAINT `juegos_categoria_ibfk_1` FOREIGN KEY (`id_juego`) REFERENCES `juegos` (`id_juego`) ON DELETE CASCADE,
  ADD CONSTRAINT `juegos_categoria_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE CASCADE;

--
-- Filtros para la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD CONSTRAINT `promociones_ibfk_1` FOREIGN KEY (`id_juego`) REFERENCES `juegos` (`id_juego`) ON DELETE CASCADE,
  ADD CONSTRAINT `promociones_ibfk_2` FOREIGN KEY (`id_oferta`) REFERENCES `ofertas` (`id_oferta`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
