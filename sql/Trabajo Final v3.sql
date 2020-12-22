-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.14-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para php_isil
CREATE DATABASE IF NOT EXISTS `php_isil` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `php_isil`;

-- Volcando estructura para tabla php_isil.atributo
CREATE TABLE IF NOT EXISTS `atributo` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('ACTIVO','INACTIVO','0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `atributotipo_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `atributos_atributo_tipo_id_foreign` (`atributotipo_id`),
  CONSTRAINT `atributos_atributo_tipo_id_foreign` FOREIGN KEY (`atributotipo_id`) REFERENCES `atributo_tipo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla php_isil.atributo: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `atributo` DISABLE KEYS */;
INSERT INTO `atributo` (`id`, `codigo`, `nombre`, `estado`, `atributotipo_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'CA001', 'Largo', '1', 2, '2020-12-19 20:05:28', '2020-12-20 01:33:07', NULL),
	(2, 'CA002', 'Ancho', '1', 2, '2020-12-19 20:05:28', NULL, NULL),
	(3, 'CA003', 'Alto', '1', 2, '2020-12-19 20:05:28', NULL, NULL),
	(4, 'CA004', 'Fecha', '1', 3, '2020-12-19 20:05:28', NULL, NULL),
	(5, 'CA005', 'Hora', '1', 3, '2020-12-19 20:05:28', NULL, NULL),
	(6, 'CA006', 'Textura', '1', 1, '2020-12-19 20:05:28', NULL, NULL),
	(7, 'CA007', 'Material', '1', 1, '2020-12-19 20:05:28', '2020-12-20 01:15:53', NULL),
	(9, 'CA008', 'Garantia', '1', 3, '2020-12-20 14:34:58', '2020-12-20 14:35:47', '2020-12-20 14:35:47');
/*!40000 ALTER TABLE `atributo` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil.atributo_tipo
CREATE TABLE IF NOT EXISTS `atributo_tipo` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('ACTIVO','INACTIVO','0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla php_isil.atributo_tipo: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `atributo_tipo` DISABLE KEYS */;
INSERT INTO `atributo_tipo` (`id`, `codigo`, `nombre`, `estado`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'CAT001', 'Materiales', '1', '2020-12-19 20:00:06', '2020-12-20 01:17:12', NULL),
	(2, 'CAT002', 'Medida', '1', '2020-12-19 20:00:06', NULL, NULL),
	(3, 'CAT003', 'Tiempo', '1', '2020-12-19 20:00:06', NULL, NULL),
	(4, 'CAT004', 'Distancia', '1', '2020-12-19 20:00:06', NULL, NULL),
	(5, 'CAT005', 'Rendimiento', '1', '2020-12-20 14:41:12', '2020-12-20 14:41:36', NULL),
	(7, 'CAT06', 'Rendimiento4', '1', '2020-12-20 14:43:44', '2020-12-20 14:44:18', '2020-12-20 14:44:18');
/*!40000 ALTER TABLE `atributo_tipo` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil.business
CREATE TABLE IF NOT EXISTS `business` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `address` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ubigeo` varchar(6) COLLATE utf8_spanish_ci DEFAULT NULL,
  `number_identifer` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `status` tinyint(2) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla php_isil.business: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `business` DISABLE KEYS */;
INSERT INTO `business` (`id`, `name`, `address`, `ubigeo`, `number_identifer`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Flavio Antonio Huanacchiri Castillo', NULL, NULL, '10459683483', 1, '2020-12-03 01:21:10', '2020-12-03 01:21:10', NULL),
	(2, 'Fernando Jacobo Quiroz Cabanillas', NULL, NULL, '10435350378', 1, '2020-12-03 01:23:41', '2020-12-03 01:23:41', NULL);
/*!40000 ALTER TABLE `business` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('ACTIVO','INACTIVO','0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla php_isil.categoria: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`id`, `nombre`, `estado`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Perifericos', '1', '2020-12-19 20:21:25', '2020-12-20 01:31:18', NULL),
	(2, 'Monitores', '1', '2020-12-19 20:21:25', '2020-12-20 01:27:00', NULL),
	(3, 'Portatiles', '1', '2020-12-19 20:21:25', NULL, NULL),
	(4, 'Desktop', '1', '2020-12-19 20:21:25', '2020-12-20 01:26:25', NULL),
	(9, 'Accesorios', '1', '2020-12-20 01:26:01', '2020-12-20 01:26:01', NULL),
	(10, 'Otros Productos', '1', '2020-12-20 14:47:11', '2020-12-20 14:48:00', '2020-12-20 14:48:00');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil.coin
CREATE TABLE IF NOT EXISTS `coin` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `symbol` varchar(10) DEFAULT NULL,
  `change_type` decimal(10,2) DEFAULT 1.00,
  `status` tinyint(2) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla php_isil.coin: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `coin` DISABLE KEYS */;
/*!40000 ALTER TABLE `coin` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla php_isil.failed_jobs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla php_isil.migrations: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil.module
CREATE TABLE IF NOT EXISTS `module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `user_deleted_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla php_isil.module: ~0 rows (aproximadamente)
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
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` decimal(15,2) DEFAULT 0.00,
  `estado` enum('ACTIVO','INACTIVO','0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `proveedor_id` bigint(20) unsigned NOT NULL,
  `categoria_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `productos_categoria_id_foreign` (`categoria_id`),
  KEY `productos_proveedor_id_foreign` (`proveedor_id`),
  CONSTRAINT `productos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`),
  CONSTRAINT `productos_proveedor_id_foreign` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla php_isil.producto: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` (`id`, `codigo`, `nombre`, `precio`, `estado`, `proveedor_id`, `categoria_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'CP001', 'Laptop Dell G5', 5600.00, '1', 2, 3, '2020-12-19 21:30:53', '2020-12-20 02:46:20', NULL),
	(2, 'CP002', 'Monitor Lenovo UV', 300.00, '1', 1, 2, '2020-12-19 21:30:53', '2020-12-20 02:46:46', NULL),
	(3, 'CP003', 'Laptop Gamer GX', 4500.00, '1', 3, 3, '2020-12-20 10:46:20', NULL, NULL),
	(4, 'CP004', 'Monitor GX', 500.00, '1', 23, 2, '2020-12-20 10:46:20', '2020-12-20 14:59:15', '2020-12-20 14:59:15');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil.producto_atributo
CREATE TABLE IF NOT EXISTS `producto_atributo` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `producto_id` bigint(20) unsigned NOT NULL,
  `atributo_id` bigint(20) unsigned NOT NULL,
  `valor` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `producto_atributos_producto_id_foreign` (`producto_id`),
  KEY `producto_atributos_atributo_id_foreign` (`atributo_id`),
  CONSTRAINT `producto_atributos_atributo_id_foreign` FOREIGN KEY (`atributo_id`) REFERENCES `atributo` (`id`),
  CONSTRAINT `producto_atributos_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla php_isil.producto_atributo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `producto_atributo` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto_atributo` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil.producto_venta
CREATE TABLE IF NOT EXISTS `producto_venta` (
  `venta_id` bigint(20) unsigned NOT NULL,
  `producto_id` bigint(20) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `producto_venta_venta_id_foreign` (`venta_id`),
  KEY `producto_venta_producto_id_foreign` (`producto_id`),
  CONSTRAINT `producto_venta_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE CASCADE,
  CONSTRAINT `producto_venta_venta_id_foreign` FOREIGN KEY (`venta_id`) REFERENCES `venta` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla php_isil.producto_venta: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `producto_venta` DISABLE KEYS */;
INSERT INTO `producto_venta` (`venta_id`, `producto_id`, `quantity`, `created_at`, `updated_at`) VALUES
	(14, 1, 1, NULL, NULL),
	(14, 2, 2, NULL, NULL),
	(20, 1, 1, NULL, NULL),
	(21, 3, 2, NULL, NULL),
	(21, 1, 1, NULL, NULL),
	(21, 2, 1, NULL, NULL),
	(22, 1, 1, NULL, NULL);
/*!40000 ALTER TABLE `producto_venta` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil.profile
CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
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
  `user_deleted_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla php_isil.profile: ~2 rows (aproximadamente)
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
  `created_at` timestamp NULL DEFAULT current_timestamp(),
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
/*!40000 ALTER TABLE `profile_module` DISABLE KEYS */;
/*!40000 ALTER TABLE `profile_module` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil.proveedor
CREATE TABLE IF NOT EXISTS `proveedor` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `empresa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(2) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `IDX_DOCUMENT_NUMBER` (`document_number`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla php_isil.proveedor: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` (`id`, `empresa`, `contacto`, `document_number`, `email`, `email_verified_at`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Lenovo', 'Omar Vasquez', '2001004550', 'ovasquez@lenovo.com', NULL, 1, '2020-12-19 21:00:53', NULL, NULL),
	(2, 'Dell', 'Carla Fernandez', '2001004660', 'cfernandez@dell.com', NULL, 1, '2020-12-19 21:00:53', NULL, NULL),
	(3, 'HP', 'Sara Vega', '2001004776', 'svega@hp.com', NULL, 1, '2020-12-19 21:00:53', '2020-12-20 01:49:19', NULL),
	(23, 'Acer', 'Jose Garcia', '2001006962', 'jgarcia@acer.com', NULL, 1, '2020-12-20 01:48:45', '2020-12-20 01:48:45', NULL),
	(26, 'SUS', 'Moises Vega', '2001004780', 'mvega@sus.com', NULL, 1, '2020-12-20 14:11:36', '2020-12-20 14:11:49', '2020-12-20 14:11:49'),
	(28, 'Huawei', 'Maria Garcia', '200100444', 'mgarcia', NULL, 1, '2020-12-20 14:19:33', '2020-12-20 14:20:21', '2020-12-20 14:20:21'),
	(29, 'Intel', 'Emily Bai', '2001004555', 'ebai@intel.com', NULL, 1, '2020-12-20 14:24:20', '2020-12-20 14:27:07', NULL);
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `IDX_DOCUMENT_NUMBER` (`document_number`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla php_isil.users: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `profile_id`, `business_id`, `name`, `user_name`, `full_name`, `last_name`, `document_number`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 2, 1, 'Marizza Sanca', 'msanca', 'Marizza', 'Sanca', '46992018', 'marizza.sanca@jmasoluciones.com', NULL, '$2y$10$cdKVwR.xFaaRR2gAekCmiOOZ/sNwbqQSoDrovhvX73jvK0dR86.6S', NULL, 1, '2020-12-07 22:46:37', '2020-12-07 21:45:56', NULL),
	(2, NULL, 1, 'Flavio Huanacchiri', 'fhuanacchiri', 'Flavio Antonio', 'Huanacchiri Castillo', '45968348', 'flavio.huanacchiri@gmail.com', NULL, '$2y$10$M8JHXjGFwPRUC.RqQSQRje7AOjvlvOhKxlgzhs9wixCDIA1kMbtT2', 'Sk9JgQ7qG4sYPFp2RU9QEmzZNJzD4VPxl2MF6IfwbLpbgJX5CSCAYyzKa0q7', 1, '2020-12-08 00:27:59', '2020-12-07 21:36:42', NULL),
	(3, 1, 2, 'Julio Julio', 'jcalderon', 'Julio', 'Calderon', '45165398', 'juliocalderon@gmail.com', NULL, '$2y$10$7IIKyajPy1GfJ1LkLJ6XO.zwLldsVcC8YpRoWvr86mqj7cWly1udS', 'GTH0dYKzTPPLwUrdhdZYYuwJ9gKw1UH0U7HxbzH5d1ALVum303lh2hRzfGoa', 1, '2020-12-07 21:52:17', '2020-12-09 19:50:46', NULL),
	(10, NULL, 2, 'Flavio2', NULL, NULL, NULL, NULL, 'proyectos@jmasoluciones.com', NULL, '$2y$10$rZnK6d1ZS6Fc4pz92BMYguJpTWkqW3mCukAcyr0YmVcj51g1Kum.O', NULL, 1, '2020-12-09 18:57:23', '2020-12-09 18:57:23', NULL),
	(21, NULL, NULL, 'Flavio3 Flavio3', 'fhuanacchiri3', 'Flavio3', 'Huanacchiri', '44968348', 'limawebperu@gmail.com', NULL, '$2y$10$YD5ALiW855d8hKYVchRUq.aDkJMSOZnxwcKJmsPOnv4L4qQToTKUe', NULL, 1, '2020-12-14 18:26:07', '2020-12-14 18:26:07', NULL),
	(22, NULL, NULL, 'Flavio2', NULL, NULL, NULL, NULL, 'fahuanacchiri@isil.pe', NULL, '$2y$10$oCVbIgLiX6c3mMj7FmQXkeRyegLXqFy8q2VG09h6aBYXNy5wzWg2K', NULL, 1, '2020-12-14 19:44:29', '2020-12-14 19:44:29', NULL),
	(23, NULL, NULL, 'Katia', NULL, NULL, NULL, NULL, 'katyagarvich@gmail.com', NULL, '$2y$10$C/0LOTQZ1VGZmnl.N1EBk.Q6I56lEu4HWJ5DDO4pKmYI0IBro5ZTq', NULL, 1, '2020-12-19 16:02:12', '2020-12-19 16:02:12', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil.venta
CREATE TABLE IF NOT EXISTS `venta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_cliente` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_cliente` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` decimal(18,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla php_isil.venta: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
INSERT INTO `venta` (`id`, `nombre_cliente`, `email_cliente`, `total`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Katia Garvich', 'kgarvich@isil.pe', 1000.00, '2020-12-19 22:37:17', '2020-12-20 15:04:16', '2020-12-20 15:04:16'),
	(2, 'Edu Villegas', 'evillegas@isil.pe', 3000.00, '2020-12-19 22:37:17', NULL, NULL),
	(14, 'Olga Ramirez', 'oramirez@isil.pe', 5000.00, '2020-12-19 22:37:17', NULL, NULL),
	(17, 'Alfredo Pardon', 'apardon@isil.pe', NULL, '2020-12-20 04:06:09', '2020-12-20 04:06:09', NULL),
	(18, 'Carlos Blondet', 'cblondet@isil.pe', NULL, '2020-12-20 04:19:35', '2020-12-20 04:19:35', NULL),
	(20, 'Julio Calderon', 'jcalderon@isil.pe', NULL, '2020-12-20 05:04:14', '2020-12-20 05:04:14', NULL),
	(21, 'Edson Forno', 'eforno@isil.pe', NULL, '2020-12-20 15:02:56', '2020-12-20 15:02:56', NULL),
	(22, 'Katia Garvich', 'katyagarvich@gmail.com', NULL, '2020-12-20 15:41:47', '2020-12-20 15:43:00', '2020-12-20 15:43:00');
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
