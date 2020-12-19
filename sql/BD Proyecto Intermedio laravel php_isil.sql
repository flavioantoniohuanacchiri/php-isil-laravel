-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-12-2020 a las 01:13:46
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `php_isil`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atributos`
--

CREATE TABLE `atributos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('ACTIVO','INACTIVO','0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `atributotipo_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `atributos`
--

INSERT INTO `atributos` (`id`, `codigo`, `nombre`, `estado`, `atributotipo_id`, `created_at`, `updated_at`) VALUES
(1, 'AT001', 'COLOR', '1', 3, '2020-12-18 21:47:08', '2020-12-18 21:47:08'),
(2, 'AT002', 'METROS CUBICOS', '1', 5, '2020-12-18 21:47:28', '2020-12-18 21:47:28'),
(3, 'AT003', 'LARGO', '1', 4, '2020-12-18 21:52:17', '2020-12-18 21:52:17'),
(4, 'AT004', 'ANCHO', '1', 4, '2020-12-18 21:52:39', '2020-12-18 21:52:39'),
(5, 'AT005', 'ALTO', '1', 4, '2020-12-18 21:52:56', '2020-12-18 21:52:56'),
(6, 'AT006', 'KILOMETROS', '1', 6, '2020-12-18 21:53:16', '2020-12-18 21:53:16'),
(7, 'AT007', 'METROS', '1', 6, '2020-12-18 21:53:36', '2020-12-18 21:53:36'),
(8, 'AT008', 'FECHA DE VENCIMIENTO', '1', 7, '2020-12-18 21:53:53', '2020-12-18 21:53:53'),
(9, 'AT009', 'MINUTOS', '1', 8, '2020-12-18 21:54:07', '2020-12-18 21:54:07'),
(10, 'AT010', 'HORAS', '1', 8, '2020-12-18 21:54:24', '2020-12-18 21:54:24'),
(11, 'AT011', 'TEXTURA', '1', 9, '2020-12-18 21:54:37', '2020-12-18 21:54:37'),
(12, 'AT012', 'MATERIAL', '1', 9, '2020-12-18 21:54:51', '2020-12-18 21:54:51'),
(13, 'AT013', 'FORMA', '1', 9, '2020-12-18 21:55:05', '2020-12-18 21:55:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atributo_tipos`
--

CREATE TABLE `atributo_tipos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('ACTIVO','INACTIVO','0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `atributo_tipos`
--

INSERT INTO `atributo_tipos` (`id`, `codigo`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'TA001', 'TAMAÑO', '1', '2020-12-18 21:36:06', '2020-12-18 21:36:39'),
(2, 'TA002', 'PESO', '1', '2020-12-18 21:36:24', '2020-12-18 21:36:47'),
(3, 'TA003', 'COLOR', '1', '2020-12-18 21:37:29', '2020-12-18 21:37:29'),
(4, 'TA004', 'MEDIDA', '1', '2020-12-18 21:37:41', '2020-12-18 21:37:41'),
(5, 'TA005', 'ESPACIO', '1', '2020-12-18 21:38:06', '2020-12-18 21:38:06'),
(6, 'TA006', 'LONGITUD', '1', '2020-12-18 21:45:49', '2020-12-18 21:45:49'),
(7, 'TA007', 'FECHA', '1', '2020-12-18 21:46:02', '2020-12-18 21:46:02'),
(8, 'TA008', 'TIEMPO', '1', '2020-12-18 21:46:15', '2020-12-18 21:46:15'),
(9, 'TA009', 'MATERIAL', '1', '2020-12-18 21:46:26', '2020-12-18 21:46:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `business`
--

CREATE TABLE `business` (
  `id` bigint(20) NOT NULL,
  `name` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `address` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ubigeo` varchar(6) COLLATE utf8_spanish_ci DEFAULT NULL,
  `number_identifer` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `business`
--

INSERT INTO `business` (`id`, `name`, `address`, `ubigeo`, `number_identifer`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Flavio Antonio Huanacchiri Castillo', NULL, NULL, '10459683483', 1, '2020-12-03 01:21:10', '2020-12-03 01:21:10', NULL),
(2, 'Fernando Jacobo Quiroz Cabanillas', NULL, NULL, '10435350378', 1, '2020-12-03 01:23:41', '2020-12-03 01:23:41', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('ACTIVO','INACTIVO','0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'LIMPIEZA', '1', '2020-12-18 21:55:25', '2020-12-18 21:55:25'),
(2, 'GALLETAS', '1', '2020-12-18 21:55:37', '2020-12-18 21:55:37'),
(3, 'LACTEOS', '1', '2020-12-18 21:55:46', '2020-12-18 21:55:46'),
(4, 'ACEITES', '1', '2020-12-18 21:55:56', '2020-12-18 21:55:56'),
(5, 'LEGUMBRES', '1', '2020-12-18 21:56:08', '2020-12-18 21:56:08'),
(6, 'CONSTRUCCION', '1', '2020-12-18 21:56:20', '2020-12-18 21:56:20'),
(7, 'GASEOSAS', '1', '2020-12-18 21:56:28', '2020-12-18 21:56:28'),
(8, 'BEBIDAS ALCOHOLICAS', '1', '2020-12-18 21:56:42', '2020-12-18 21:56:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coin`
--

CREATE TABLE `coin` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `symbol` varchar(10) DEFAULT NULL,
  `change_type` decimal(10,2) DEFAULT 1.00,
  `status` tinyint(2) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(16, '2014_10_12_000000_create_users_table', 1),
(17, '2014_10_12_100000_create_password_resets_table', 1),
(18, '2019_08_19_000000_create_failed_jobs_table', 1),
(19, '2020_12_17_220312_create_categorias_table', 1),
(20, '2020_12_17_234513_create_atributo_tipos_table', 1),
(21, '2020_12_18_001727_create_atributos_table', 1),
(22, '2020_12_18_022100_create_productos_table', 1),
(23, '2020_12_18_024652_create_producto_atributos_table', 1),
(24, '2020_12_18_101709_create_ventas_table', 1),
(25, '2020_12_18_101734_create_venta_productos_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `module_id` bigint(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `class_icon` varchar(100) DEFAULT NULL,
  `order` int(11) DEFAULT 0,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `userid_created_at` bigint(20) DEFAULT NULL,
  `userid_updated_at` bigint(20) DEFAULT NULL,
  `userid_deleted_at` bigint(20) DEFAULT NULL,
  `user_created_at` varchar(255) DEFAULT NULL,
  `user_updated_at` varchar(255) DEFAULT NULL,
  `user_deleted_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` decimal(15,2) DEFAULT 0.00,
  `estado` enum('ACTIVO','INACTIVO','0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `nombre`, `precio`, `estado`, `categoria_id`, `created_at`, `updated_at`) VALUES
(1, 'PR001', 'GASEOSA INKA KOLA 3 LITROS', '1.00', '1', 7, '2020-12-18 22:00:53', '2020-12-18 22:00:53'),
(2, 'PR002', 'CERVEZA CRISTAL - 620ML', '1.00', '1', 8, '2020-12-18 22:01:36', '2020-12-18 22:01:36'),
(3, 'PR003', 'CAJA GALLETES GN', '1.00', '1', 2, '2020-12-18 22:36:54', '2020-12-18 22:36:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_atributos`
--

CREATE TABLE `producto_atributos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `atributo_id` bigint(20) UNSIGNED NOT NULL,
  `valor` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_venta`
--

CREATE TABLE `producto_venta` (
  `venta_id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto_venta`
--

INSERT INTO `producto_venta` (`venta_id`, `producto_id`, `quantity`, `created_at`, `updated_at`) VALUES
(2, 1, 2, NULL, NULL),
(2, 2, 3, NULL, NULL),
(1, 2, 1, NULL, NULL),
(1, 1, 1, NULL, NULL),
(1, 2, 1, NULL, NULL),
(14, 1, 1, NULL, NULL),
(14, 2, 2, NULL, NULL),
(14, 3, 3, NULL, NULL),
(14, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `module_id` varchar(100) DEFAULT NULL,
  `order` int(11) DEFAULT 0,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `userid_created_at` bigint(20) DEFAULT NULL,
  `userid_updated_at` bigint(20) DEFAULT NULL,
  `userid_deleted_at` bigint(20) DEFAULT NULL,
  `user_created_at` varchar(255) DEFAULT NULL,
  `user_updated_at` varchar(255) DEFAULT NULL,
  `user_deleted_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profile`
--

INSERT INTO `profile` (`id`, `name`, `module_id`, `order`, `status`, `created_at`, `updated_at`, `deleted_at`, `userid_created_at`, `userid_updated_at`, `userid_deleted_at`, `user_created_at`, `user_updated_at`, `user_deleted_at`) VALUES
(1, 'SUPERADMIN', '4', 0, 1, '2020-12-08 02:40:03', '2020-12-14 21:41:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'MODERADOR', '3', 0, 1, '2020-12-08 02:40:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'SOPORTE', '2', 0, 1, '2020-12-15 02:30:22', '2020-12-16 19:51:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profile_module`
--

CREATE TABLE `profile_module` (
  `id` bigint(20) NOT NULL,
  `profile_id` int(11) DEFAULT NULL,
  `module_id` bigint(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `userid_created_at` bigint(20) DEFAULT NULL,
  `userid_updated_at` bigint(20) DEFAULT NULL,
  `userid_deleted_at` bigint(20) DEFAULT NULL,
  `user_created_at` varchar(255) DEFAULT NULL,
  `user_updated_at` varchar(255) DEFAULT NULL,
  `user_deleted_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profile_id` int(11) DEFAULT NULL,
  `business_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(2) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `profile_id`, `business_id`, `name`, `user_name`, `full_name`, `last_name`, `document_number`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 0, 'Marizza Sanca', 'msanca', 'Marizza', 'Sanca', '46992018', 'marizza.sanca@jmasoluciones.com', NULL, '$2y$10$cdKVwR.xFaaRR2gAekCmiOOZ/sNwbqQSoDrovhvX73jvK0dR86.6S', NULL, 1, '2020-12-08 03:46:37', '2020-12-08 02:45:56', NULL),
(2, NULL, 1, 'Flavio Antonio Huanacchiri Castillo', 'fhuanacchiri', 'Flavio Antonio', 'Huanacchiri Castillo', '45968348', 'flavio.huanacchiri@gmail.com', NULL, '$2y$10$M8JHXjGFwPRUC.RqQSQRje7AOjvlvOhKxlgzhs9wixCDIA1kMbtT2', 'Sk9JgQ7qG4sYPFp2RU9QEmzZNJzD4VPxl2MF6IfwbLpbgJX5CSCAYyzKa0q7', 1, '2020-12-08 05:27:59', '2020-12-15 01:07:48', NULL),
(3, 1, 2, 'Julio Julio', 'jcalderon', 'Julio', 'Calderon', '45165398', 'juliocalderon@gmail.com', NULL, '$2y$10$7IIKyajPy1GfJ1LkLJ6XO.zwLldsVcC8YpRoWvr86mqj7cWly1udS', 'FSqcp7Fd0onZShkvYcvGETf059gEPclwJXC1ZDNkc1XpNlaAc9Dbvri63Ltp', 1, '2020-12-08 02:52:17', '2020-12-17 00:35:04', NULL),
(4, 2, NULL, 'Lucía Quinto', 'lqa', 'Lucía', 'Quinto', '12345678', 'lucia.30.qa@gmail.com', NULL, '$2y$10$3dqt4uHt8Zi24Ck9V5w36Oxcj.hkIclKS1Cz1X5/yS8l7g6ZTolhW', NULL, 1, '2020-12-08 17:26:33', '2020-12-10 01:02:45', '2020-12-09 20:02:45'),
(5, 1, 0, 'Lucía Quinto Ascurra', 'lquinto', 'Lucía', 'Quinto Ascurra', '72446512', 'lquinto@isil.pe', NULL, '$2y$10$iE0kMtFjhuMmvCv3MJx/DOl3UDRB2soue14EjEl9uNpDlV9vAIRdy', NULL, 1, '2020-12-08 18:22:12', '2020-12-10 01:02:41', '2020-12-09 20:02:41'),
(6, NULL, NULL, 'Lucía A. Quinto Ascurra', NULL, NULL, NULL, NULL, 'luciaqa@gmail.com', NULL, '$2y$10$VQyjdSdTEgFcDVnDEkTjF.iqIqvpFvUkCLCsjeFZrgm6ns4YUpJDm', NULL, 1, '2020-12-10 00:05:43', '2020-12-10 00:05:43', NULL),
(9, 3, 3, 'Prueba Prueba', 'prueba', 'Prueba', 'Prueba', '78945612', 'prueba@prueba.com', NULL, '$2y$10$B5NVaNKXQDtkH/BECsqbKuUpQi6dQtXW2l1RNcoDcUgfnjLv6Athm', NULL, 1, '2020-12-17 00:38:57', '2020-12-17 00:45:37', '2020-12-16 19:45:37'),
(10, 2, NULL, 'Prueba 2 Prueba 2', 'prueba2', 'Prueba 2', 'Prueba 2', '65789423', 'prueba2@prueba2.com', NULL, '$2y$10$pDPDT7sxBVvFDi0VXqKE5uVJGyWaclmLdR/42A09G9Ul/x0vBr0xO', NULL, 1, '2020-12-17 00:42:26', '2020-12-17 00:44:31', '2020-12-16 19:44:31'),
(11, 3, 3, 'Prueba3 Prueba3', 'prueba3', 'Prueba3', 'Prueba3', '45685236', 'prueba3@prueba3.com', NULL, '$2y$10$WHU1WSr8lED68Dhu4BuhI.U8rWIYPdf4zFRJ0qwzrcVmznlhvna2S', NULL, 0, '2020-12-17 00:45:09', '2020-12-17 00:49:05', '2020-12-16 19:49:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_cliente` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_cliente` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `nombre_cliente`, `email_cliente`, `created_at`, `updated_at`) VALUES
(1, 'FERNANDO QUIROZ', 'fquiroz@isil.pe', '2020-12-18 22:37:17', '2020-12-18 22:37:17'),
(2, 'LUCIA QUINTO', 'lquinto@isil.pe', '2020-12-18 22:42:28', '2020-12-18 22:42:28'),
(14, 'FER', 'fquiroz@isil.pe', '2020-12-18 23:16:16', '2020-12-18 23:16:16');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `atributos`
--
ALTER TABLE `atributos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `atributos_atributo_tipo_id_foreign` (`atributotipo_id`);

--
-- Indices de la tabla `atributo_tipos`
--
ALTER TABLE `atributo_tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `coin`
--
ALTER TABLE `coin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `producto_atributos`
--
ALTER TABLE `producto_atributos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_atributos_producto_id_foreign` (`producto_id`),
  ADD KEY `producto_atributos_atributo_id_foreign` (`atributo_id`);

--
-- Indices de la tabla `producto_venta`
--
ALTER TABLE `producto_venta`
  ADD KEY `producto_venta_venta_id_foreign` (`venta_id`),
  ADD KEY `producto_venta_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profile_module`
--
ALTER TABLE `profile_module`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `IDX_DOCUMENT_NUMBER` (`document_number`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `atributos`
--
ALTER TABLE `atributos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `atributo_tipos`
--
ALTER TABLE `atributo_tipos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `business`
--
ALTER TABLE `business`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `coin`
--
ALTER TABLE `coin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto_atributos`
--
ALTER TABLE `producto_atributos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `profile_module`
--
ALTER TABLE `profile_module`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `atributos`
--
ALTER TABLE `atributos`
  ADD CONSTRAINT `atributos_atributo_tipo_id_foreign` FOREIGN KEY (`atributotipo_id`) REFERENCES `atributo_tipos` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `producto_atributos`
--
ALTER TABLE `producto_atributos`
  ADD CONSTRAINT `producto_atributos_atributo_id_foreign` FOREIGN KEY (`atributo_id`) REFERENCES `atributos` (`id`),
  ADD CONSTRAINT `producto_atributos_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `producto_venta`
--
ALTER TABLE `producto_venta`
  ADD CONSTRAINT `producto_venta_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `producto_venta_venta_id_foreign` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
