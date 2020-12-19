-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para php_isil
CREATE DATABASE IF NOT EXISTS `php_isil` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `php_isil`;

-- Volcando estructura para tabla php_isil.atributos
CREATE TABLE IF NOT EXISTS `atributos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('ACTIVO','INACTIVO','0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `atributotipo_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `atributos_atributo_tipo_id_foreign` (`atributotipo_id`),
  CONSTRAINT `atributos_atributo_tipo_id_foreign` FOREIGN KEY (`atributotipo_id`) REFERENCES `atributo_tipos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla php_isil.atributos: ~11 rows (aproximadamente)
DELETE FROM `atributos`;
/*!40000 ALTER TABLE `atributos` DISABLE KEYS */;
INSERT INTO `atributos` (`id`, `codigo`, `nombre`, `estado`, `atributotipo_id`, `created_at`, `updated_at`) VALUES
	(1, 'AT001', 'COLOR', '1', 3, '2020-12-18 16:47:08', '2020-12-18 16:47:08'),
	(2, 'AT002', 'METROS CUBICOS', '1', 5, '2020-12-18 16:47:28', '2020-12-18 16:47:28'),
	(3, 'AT003', 'LARGO', '1', 4, '2020-12-18 16:52:17', '2020-12-18 16:52:17'),
	(4, 'AT004', 'ANCHO', '1', 4, '2020-12-18 16:52:39', '2020-12-18 16:52:39'),
	(5, 'AT005', 'ALTO', '1', 4, '2020-12-18 16:52:56', '2020-12-18 16:52:56'),
	(6, 'AT006', 'KILOMETROS', '1', 6, '2020-12-18 16:53:16', '2020-12-18 16:53:16'),
	(7, 'AT007', 'METROS', '1', 6, '2020-12-18 16:53:36', '2020-12-18 16:53:36'),
	(8, 'AT008', 'FECHA DE VENCIMIENTO', '1', 7, '2020-12-18 16:53:53', '2020-12-18 16:53:53'),
	(9, 'AT009', 'MINUTOS', '1', 8, '2020-12-18 16:54:07', '2020-12-18 16:54:07'),
	(10, 'AT010', 'HORAS', '1', 8, '2020-12-18 16:54:24', '2020-12-18 16:54:24'),
	(11, 'AT011', 'TEXTURA', '1', 9, '2020-12-18 16:54:37', '2020-12-18 16:54:37'),
	(12, 'AT012', 'MATERIAL', '1', 9, '2020-12-18 16:54:51', '2020-12-18 16:54:51'),
	(13, 'AT013', 'FORMA', '1', 9, '2020-12-18 16:55:05', '2020-12-18 16:55:05');
/*!40000 ALTER TABLE `atributos` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil.atributo_tipos
CREATE TABLE IF NOT EXISTS `atributo_tipos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('ACTIVO','INACTIVO','0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla php_isil.atributo_tipos: ~9 rows (aproximadamente)
DELETE FROM `atributo_tipos`;
/*!40000 ALTER TABLE `atributo_tipos` DISABLE KEYS */;
INSERT INTO `atributo_tipos` (`id`, `codigo`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 'TA001', 'TAMAÑO', '1', '2020-12-18 16:36:06', '2020-12-18 16:36:39'),
	(2, 'TA002', 'PESO', '1', '2020-12-18 16:36:24', '2020-12-18 16:36:47'),
	(3, 'TA003', 'COLOR', '1', '2020-12-18 16:37:29', '2020-12-18 16:37:29'),
	(4, 'TA004', 'MEDIDA', '1', '2020-12-18 16:37:41', '2020-12-18 16:37:41'),
	(5, 'TA005', 'ESPACIO', '1', '2020-12-18 16:38:06', '2020-12-18 16:38:06'),
	(6, 'TA006', 'LONGITUD', '1', '2020-12-18 16:45:49', '2020-12-18 16:45:49'),
	(7, 'TA007', 'FECHA', '1', '2020-12-18 16:46:02', '2020-12-18 16:46:02'),
	(8, 'TA008', 'TIEMPO', '1', '2020-12-18 16:46:15', '2020-12-18 16:46:15'),
	(9, 'TA009', 'MATERIAL', '1', '2020-12-18 16:46:26', '2020-12-18 16:46:26');
/*!40000 ALTER TABLE `atributo_tipos` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil.business
CREATE TABLE IF NOT EXISTS `business` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `address` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ubigeo` varchar(6) COLLATE utf8_spanish_ci DEFAULT NULL,
  `number_identifer` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `status` tinyint(2) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla php_isil.business: ~2 rows (aproximadamente)
DELETE FROM `business`;
/*!40000 ALTER TABLE `business` DISABLE KEYS */;
INSERT INTO `business` (`id`, `name`, `address`, `ubigeo`, `number_identifer`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Flavio Antonio Huanacchiri Castillo', NULL, NULL, '10459683483', 1, '2020-12-03 01:21:10', '2020-12-03 01:21:10', NULL),
	(2, 'Fernando Jacobo Quiroz Cabanillas', NULL, NULL, '10435350378', 1, '2020-12-03 01:23:41', '2020-12-03 01:23:41', NULL);
/*!40000 ALTER TABLE `business` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('ACTIVO','INACTIVO','0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla php_isil.categorias: ~8 rows (aproximadamente)
DELETE FROM `categorias`;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 'LIMPIEZA', '1', '2020-12-18 16:55:25', '2020-12-18 16:55:25'),
	(2, 'GALLETAS', '1', '2020-12-18 16:55:37', '2020-12-18 16:55:37'),
	(3, 'LACTEOS', '1', '2020-12-18 16:55:46', '2020-12-18 16:55:46'),
	(4, 'ACEITES', '1', '2020-12-18 16:55:56', '2020-12-18 16:55:56'),
	(5, 'LEGUMBRES', '1', '2020-12-18 16:56:08', '2020-12-18 16:56:08'),
	(6, 'CONSTRUCCION', '1', '2020-12-18 16:56:20', '2020-12-18 16:56:20'),
	(7, 'GASEOSAS', '1', '2020-12-18 16:56:28', '2020-12-18 16:56:28'),
	(8, 'BEBIDAS ALCOHOLICAS', '1', '2020-12-18 16:56:42', '2020-12-18 16:56:42');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil.coin
CREATE TABLE IF NOT EXISTS `coin` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `symbol` varchar(10) DEFAULT NULL,
  `change_type` decimal(10,2) DEFAULT '1.00',
  `status` tinyint(2) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla php_isil.coin: ~0 rows (aproximadamente)
DELETE FROM `coin`;
/*!40000 ALTER TABLE `coin` DISABLE KEYS */;
/*!40000 ALTER TABLE `coin` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla php_isil.failed_jobs: ~0 rows (aproximadamente)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla php_isil.migrations: ~10 rows (aproximadamente)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil.module
CREATE TABLE IF NOT EXISTS `module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` bigint(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `class_icon` varchar(100) DEFAULT NULL,
  `order` int(11) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `userid_created_at` bigint(20) DEFAULT NULL,
  `userid_updated_at` bigint(20) DEFAULT NULL,
  `userid_deleted_at` bigint(20) DEFAULT NULL,
  `user_created_at` varchar(255) DEFAULT NULL,
  `user_updated_at` varchar(255) DEFAULT NULL,
  `user_deleted_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla php_isil.module: ~0 rows (aproximadamente)
DELETE FROM `module`;
/*!40000 ALTER TABLE `module` DISABLE KEYS */;
/*!40000 ALTER TABLE `module` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla php_isil.password_resets: ~0 rows (aproximadamente)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` decimal(15,2) DEFAULT '0.00',
  `estado` enum('ACTIVO','INACTIVO','0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `productos_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `productos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla php_isil.productos: ~3 rows (aproximadamente)
DELETE FROM `productos`;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`id`, `codigo`, `nombre`, `precio`, `estado`, `categoria_id`, `created_at`, `updated_at`) VALUES
	(1, 'PR001', 'GASEOSA INKA KOLA 3 LITROS', 1.00, '1', 7, '2020-12-18 17:00:53', '2020-12-18 17:00:53'),
	(2, 'PR002', 'CERVEZA CRISTAL - 620ML', 1.00, '1', 8, '2020-12-18 17:01:36', '2020-12-18 17:01:36'),
	(3, 'PR003', 'CAJA GALLETES GN', 1.00, '1', 2, '2020-12-18 17:36:54', '2020-12-18 17:36:54');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil.producto_atributos
CREATE TABLE IF NOT EXISTS `producto_atributos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `producto_id` bigint(20) unsigned NOT NULL,
  `atributo_id` bigint(20) unsigned NOT NULL,
  `valor` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `producto_atributos_producto_id_foreign` (`producto_id`),
  KEY `producto_atributos_atributo_id_foreign` (`atributo_id`),
  CONSTRAINT `producto_atributos_atributo_id_foreign` FOREIGN KEY (`atributo_id`) REFERENCES `atributos` (`id`),
  CONSTRAINT `producto_atributos_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla php_isil.producto_atributos: ~0 rows (aproximadamente)
DELETE FROM `producto_atributos`;
/*!40000 ALTER TABLE `producto_atributos` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto_atributos` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil.producto_venta
CREATE TABLE IF NOT EXISTS `producto_venta` (
  `venta_id` bigint(20) unsigned NOT NULL,
  `producto_id` bigint(20) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `producto_venta_venta_id_foreign` (`venta_id`),
  KEY `producto_venta_producto_id_foreign` (`producto_id`),
  CONSTRAINT `producto_venta_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `producto_venta_venta_id_foreign` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla php_isil.producto_venta: ~8 rows (aproximadamente)
DELETE FROM `producto_venta`;
/*!40000 ALTER TABLE `producto_venta` DISABLE KEYS */;
INSERT INTO `producto_venta` (`venta_id`, `producto_id`, `quantity`, `created_at`, `updated_at`) VALUES
	(1, 2, 1, NULL, NULL),
	(1, 1, 1, NULL, NULL),
	(1, 3, 1, NULL, NULL),
	(14, 1, 1, NULL, NULL),
	(14, 2, 2, NULL, NULL),
	(14, 3, 3, NULL, NULL),
	(2, 1, 2, NULL, NULL),
	(2, 2, 3, NULL, NULL);
/*!40000 ALTER TABLE `producto_venta` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil.profile
CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `order` int(11) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `userid_created_at` bigint(20) DEFAULT NULL,
  `userid_updated_at` bigint(20) DEFAULT NULL,
  `userid_deleted_at` bigint(20) DEFAULT NULL,
  `user_created_at` varchar(255) DEFAULT NULL,
  `user_updated_at` varchar(255) DEFAULT NULL,
  `user_deleted_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla php_isil.profile: ~2 rows (aproximadamente)
DELETE FROM `profile`;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` (`id`, `name`, `order`, `status`, `created_at`, `updated_at`, `deleted_at`, `userid_created_at`, `userid_updated_at`, `userid_deleted_at`, `user_created_at`, `user_updated_at`, `user_deleted_at`) VALUES
	(1, 'SUPERADMIN', 0, 1, '2020-12-07 21:40:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, 'MODERADOR', 0, 1, '2020-12-07 21:40:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil.profile_module
CREATE TABLE IF NOT EXISTS `profile_module` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) DEFAULT NULL,
  `module_id` bigint(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `userid_created_at` bigint(20) DEFAULT NULL,
  `userid_updated_at` bigint(20) DEFAULT NULL,
  `userid_deleted_at` bigint(20) DEFAULT NULL,
  `user_created_at` varchar(255) DEFAULT NULL,
  `user_updated_at` varchar(255) DEFAULT NULL,
  `user_deleted_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla php_isil.profile_module: ~0 rows (aproximadamente)
DELETE FROM `profile_module`;
/*!40000 ALTER TABLE `profile_module` DISABLE KEYS */;
/*!40000 ALTER TABLE `profile_module` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `full_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_id` int(11) DEFAULT NULL,
  `business_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla php_isil.users: ~1 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `full_name`, `last_name`, `user_name`, `document_number`, `profile_id`, `business_id`, `status`, `deleted_at`) VALUES
	(1, 'FERNANDO FERNANDO', 'fquiroz@isil.pe', NULL, '$2y$10$9vcWuft/lNhId567xGTeBuZyPtMsDDSUfN.ed2Bj6NtwhHN0BoiBK', NULL, '2020-12-18 16:44:10', '2020-12-18 16:44:10', 'FERNANDO', 'QUIROZ', 'fquiroz', '43535037', 1, NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil.ventas
CREATE TABLE IF NOT EXISTS `ventas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_cliente` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_cliente` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla php_isil.ventas: ~3 rows (aproximadamente)
DELETE FROM `ventas`;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` (`id`, `nombre_cliente`, `email_cliente`, `created_at`, `updated_at`) VALUES
	(1, 'FERNANDO QUIROZ', 'fquiroz@isil.pe', '2020-12-18 17:37:17', '2020-12-18 17:37:17'),
	(2, 'LUCIA QUINTO', 'lquinto@isil.pe', '2020-12-18 17:42:28', '2020-12-18 17:42:28'),
	(14, 'FER', 'fquiroz@isil.pe', '2020-12-18 18:16:16', '2020-12-18 18:16:16');
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
