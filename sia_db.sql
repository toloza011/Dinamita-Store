-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-03-2020 a las 15:09:06
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sia_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id_admin` int(11) NOT NULL,
  `nombre_admin` varchar(200) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritos`
--

CREATE TABLE `carritos` (
  `id_carrito` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_juego` int(11) DEFAULT NULL,
  `id_subscripcion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carritos`
--

INSERT INTO `carritos` (`id_carrito`, `id`, `id_juego`, `id_subscripcion`) VALUES
(47, 6, 10, NULL),
(49, 6, 6, NULL),
(50, 6, NULL, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(9, 'Rol'),
(18, 'Sangre'),
(13, 'Sigilo'),
(10, 'Simuladores'),
(19, 'Supervivencia'),
(11, 'Terror');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_cl` varchar(200) NOT NULL,
  `fono` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `id`, `nombre_cl`, `fono`) VALUES
(3, 6, 'Cliente', 123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigos`
--

CREATE TABLE `codigos` (
  `id_codigo` int(11) NOT NULL,
  `id_juego` int(11) DEFAULT NULL,
  `id_subscripcion` int(11) DEFAULT NULL,
  `codigo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `codigos`
--

INSERT INTO `codigos` (`id_codigo`, `id_juego`, `id_subscripcion`, `codigo`) VALUES
(1, 10, NULL, 'jashkdgasdjhgsdajk'),
(2, 4, NULL, 'ljhgfsdgfghfdg'),
(3, 4, NULL, 'etrretertretert'),
(4, 3, NULL, 'zzzzzzzzzzz'),
(5, 3, NULL, 'cxxxxxxxxxxxx'),
(6, 9, NULL, 'gggggggggg'),
(7, 9, NULL, 'yjytjjytjy'),
(9, 3, NULL, 'asdasdasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imagen` int(11) NOT NULL,
  `url` varchar(500) NOT NULL,
  `id_juego` int(11) DEFAULT NULL,
  `id_subscripcion` int(11) DEFAULT NULL,
  `id_oferta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `juegos` (
  `id_juego` int(11) NOT NULL,
  `nombre_juego` varchar(200) NOT NULL,
  `precio_juego` int(11) DEFAULT NULL,
  `stock_juego` int(11) DEFAULT NULL,
  `descripcion_juego` varchar(500) DEFAULT NULL,
  `url_juego` varchar(500) NOT NULL,
  `id_plataforma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id_juego`, `nombre_juego`, `precio_juego`, `stock_juego`, `descripcion_juego`, `url_juego`, `id_plataforma`) VALUES
(2, 'Celeste', 9500, 0, 'Ayuda a Madeline a sobrevivir a los demonios de su interior en su viaje hasta la cima de la montaña Celeste, en este ajustadísimo plataforma, obra de los creadores de TowerFall. Enfréntate a cientos de desafíos diseñados a mano, devela retorcidos secretos y, y reconstruye el misterio de la montaña.', 'assets/media/juegos/Celeste.png', 1),
(3, 'Dark Souls 3', 10000, 1, 'Dark Souls continúa redefiniendo los límites con el nuevo y ambicioso capítulo de esta serie revolucionaria, tan aclamada por la crítica. ¡Prepárate para sumergirte en la oscuridad!', 'assets/media/juegos/DarkSouls3.jpg', 2),
(4, 'Assassins Creed Origins', 25000, 0, 'ASSASSIN’S CREED® ORIGINS ES UN NUEVO COMIENZO *¡Discovery Tour by Assassin’s Creed®: Antiguo Egipto está ya disponible como actualización gratuita!* El esplendor y el misterio del antiguo Egipto se desdibujan en una cruenta lucha por el poder.', 'assets/media/juegos/AssassinCreedO.jpg', 2),
(5, 'Batman Arkham Knight', 3000, 0, 'Batman™: Arkham Knight es la épica conclusión de la galardonada trilogía de Arkham, creada por Rocksteady Studios. El título, desarrollado en exclusiva para plataformas de nueva generación, presenta la espectacular versión del batmóvil imaginada por Rocksteady.', 'assets/media/juegos/BatmanAK.jpg', 1),
(6, 'Borderlands 3', 30000, 0, '¡Descubre el shooter cooperativo original, repleto de mejoras! Encarna a uno de los cuatro mercenarios de gatillo fácil, equípate con tropecientas armas y adéntrate en el planeta desértico de Pandora.', 'assets/media/juegos/Borderlands3.jpg', 1),
(7, ' Devil May Cry 5', 12000, 0, 'El cazademonios definitivo vuelve con estilo en el juego que los fans de la acción estaban esperando.', 'assets/media/juegos/DevilMaycry5.png', 1),
(8, 'No Man\'s Sky', 15000, 0, 'No Man\'s Sky es un juego de ciencia ficción sobre exploración y supervivencia en un universo infinito generado de forma procedimental.', 'assets/media/juegos/NoManSky.png', 1),
(9, 'Daed by Daylight', 9500, 0, 'Dead by Daylight es un juego de horror de multijugador (4 contra 1) en el que un jugador representa el rol del asesino despiadado y los 4 restantes juegan como supervivientes que intentan escapar de él para evitar ser capturados y asesinados.', 'assets/media/juegos/DeadByDaylight.jpg', 1),
(10, 'Resident Evil 2', 15000, 0, 'Publicado originalmente en 1998, Resident Evil 2, uno de los juegos más icónicos de todos los tiempos, regresa completamente reinventado para las consolas de nueva generación.', 'assets/media/juegos/ResidentEvil2.png', 1),
(11, 'Shadow of the Tomb Raider', 8000, 0, 'Mientras Lara Croft trata de salvar el mundo de un apocalipsis maya, deberá convertirse en la saqueadora de tumbas que está destinada a ser.', 'assets/media/juegos/TombRaider.jpg', 2),
(12, 'Minecraft', 1500, 0, 'Minecraft es un videojuego de construcción, de tipo «mundo abierto» o sandbox', 'assets/media/juegos/Minecraft.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos_categoria`
--

CREATE TABLE `juegos_categoria` (
  `id_juego` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `juegos_categoria`
--

INSERT INTO `juegos_categoria` (`id_juego`, `id_categoria`) VALUES
(2, 7),
(3, 1),
(3, 9),
(4, 2),
(5, 17),
(6, 9),
(6, 14),
(7, 1),
(8, 2),
(9, 11),
(9, 12),
(9, 18),
(9, 19),
(10, 11),
(10, 17),
(11, 1),
(11, 2),
(12, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `ofertas` (
  `id_oferta` int(11) NOT NULL,
  `descripcion_oferta` varchar(500) DEFAULT NULL,
  `nombre_oferta` varchar(200) NOT NULL,
  `url_oferta` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ofertas`
--

INSERT INTO `ofertas` (`id_oferta`, `descripcion_oferta`, `nombre_oferta`, `url_oferta`) VALUES
(2, 'juegos al 50%', 'Oferta relampago', 'sdfsddfssdfdfssdf'),
(3, 'Juegos al 20%', 'Ofertas XD', 'asddsaasdsad'),
(4, 'Juegos free', 'Promo super mega duper super fantastica', 'asdasdasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataformas`
--

CREATE TABLE `plataformas` (
  `id_plataforma` int(11) NOT NULL,
  `nombre_plataforma` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `id_juego` int(11) NOT NULL,
  `id_oferta` int(11) NOT NULL,
  `time_oferta` int(11) DEFAULT NULL COMMENT 'tiempo en horas',
  `descuento` int(11) DEFAULT NULL COMMENT 'porcentaje de descuento'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `promociones`
--

INSERT INTO `promociones` (`id_juego`, `id_oferta`, `time_oferta`, `descuento`) VALUES
(3, 4, 2, 100),
(7, 3, 4, 20),
(11, 2, 2, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subscripciones`
--

CREATE TABLE `subscripciones` (
  `id_subscripcion` int(11) NOT NULL,
  `precio_subscripcion` int(11) DEFAULT NULL,
  `tipo_subscripcion` varchar(20) DEFAULT NULL,
  `url_subscripcion` varchar(500) NOT NULL,
  `id_plataforma` int(11) NOT NULL,
  `stock_suscripcion` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subscripciones`
--

INSERT INTO `subscripciones` (`id_subscripcion`, `precio_subscripcion`, `tipo_subscripcion`, `url_subscripcion`, `id_plataforma`, `stock_suscripcion`) VALUES
(3, 2500, '1 mes', 'assets/media/subs/Nintendo.png', 5, 0),
(4, 5300, '3 meses', 'assets/media/subs/Nintendo.png', 5, 0),
(5, 13500, '12 meses', 'assets/media/subs/Nintendo.png', 5, 0),
(6, 6000, '1 mes', 'assets/media/subs/Xbox.jpg', 3, 0),
(7, 17900, '3 meses', 'assets/media/subs/PS.jpg', 4, 0),
(8, 35900, '12 meses', 'assets/media/subs/PS.jpg', 4, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Admin', 'demo_admin@gmail.com', NULL, '$2y$10$pXZii2ci4xSIcqRiN0/XKemxpAW/rFtWknGwT5WrlLlmTWeS3c63W', NULL, '2020-02-24 07:45:50', '2020-02-24 07:45:50'),
(6, 'Cliente', 'demo_cliente@gmail.com', NULL, '$2y$10$pXZii2ci4xSIcqRiN0/XKemxpAW/rFtWknGwT5WrlLlmTWeS3c63W', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_cliente` int(11) NOT NULL,
  `id_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_cliente`, `id_codigo`) VALUES
(3, 1),
(3, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD PRIMARY KEY (`id_carrito`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`),
  ADD UNIQUE KEY `nombre_categoria` (`nombre_categoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `codigos`
--
ALTER TABLE `codigos`
  ADD PRIMARY KEY (`id_codigo`),
  ADD KEY `id_juego` (`id_juego`),
  ADD KEY `id_subscripcion` (`id_subscripcion`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `id_juego` (`id_juego`),
  ADD KEY `id_subscripcion` (`id_subscripcion`),
  ADD KEY `id_oferta` (`id_oferta`);

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`id_juego`);

--
-- Indices de la tabla `juegos_categoria`
--
ALTER TABLE `juegos_categoria`
  ADD PRIMARY KEY (`id_juego`,`id_categoria`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`id_oferta`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `plataformas`
--
ALTER TABLE `plataformas`
  ADD PRIMARY KEY (`id_plataforma`),
  ADD UNIQUE KEY `nombre_plataforma` (`nombre_plataforma`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`id_juego`,`id_oferta`),
  ADD KEY `id_oferta` (`id_oferta`);

--
-- Indices de la tabla `subscripciones`
--
ALTER TABLE `subscripciones`
  ADD PRIMARY KEY (`id_subscripcion`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_cliente`,`id_codigo`),
  ADD KEY `id_codigo` (`id_codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carritos`
--
ALTER TABLE `carritos`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `codigos`
--
ALTER TABLE `codigos`
  MODIFY `id_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `id_juego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `id_oferta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `plataformas`
--
ALTER TABLE `plataformas`
  MODIFY `id_plataforma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `subscripciones`
--
ALTER TABLE `subscripciones`
  MODIFY `id_subscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD CONSTRAINT `administradores_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_codigo`) REFERENCES `codigos` (`id_codigo`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
