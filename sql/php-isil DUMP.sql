-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.3.15-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para php-isil
CREATE DATABASE IF NOT EXISTS `php-isil` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `php-isil`;

-- Volcando estructura para tabla php-isil.attribute
CREATE TABLE IF NOT EXISTS `attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `attribute_type_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_attribute_attribute_type1_idx` (`attribute_type_id`),
  CONSTRAINT `fk_attribute_attribute_type1` FOREIGN KEY (`attribute_type_id`) REFERENCES `attribute_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla php-isil.attribute: ~3 rows (aproximadamente)
DELETE FROM `attribute`;
/*!40000 ALTER TABLE `attribute` DISABLE KEYS */;
INSERT INTO `attribute` (`id`, `code`, `name`, `status`, `attribute_type_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '124', 'Polo', 1, 1, '2020-12-20 07:57:00', '2020-12-21 18:02:08', '2020-12-21 18:02:08'),
	(2, '456', 'Zapato', 1, 1, '2020-12-20 08:00:33', '2020-12-20 08:03:17', '2020-12-20 08:03:17'),
	(3, '456', 'Papeleria', 1, 1, '2020-12-20 08:26:49', '2020-12-21 18:02:11', '2020-12-21 18:02:11'),
	(4, '1', '120gr', 1, 2, '2020-12-21 18:20:15', '2020-12-21 18:20:15', NULL),
	(5, '2', '380ml', 1, 2, '2020-12-21 18:28:22', '2020-12-21 18:28:22', NULL),
	(6, '3', '800 gr', 1, 2, '2020-12-21 18:28:43', '2020-12-21 18:28:43', NULL),
	(7, '4', '1000 gr', 1, 2, '2020-12-21 18:29:21', '2020-12-21 18:29:21', NULL),
	(8, '5', 'Rojo', 1, 3, '2020-12-21 18:30:54', '2020-12-21 18:30:54', NULL),
	(9, '6', 'Azul', 1, 3, '2020-12-21 18:31:07', '2020-12-21 18:31:07', NULL),
	(10, '7', 'Negro', 1, 3, '2020-12-21 18:31:21', '2020-12-21 18:31:21', NULL),
	(11, '8', 'A4', 1, 4, '2020-12-21 18:37:10', '2020-12-21 18:37:10', NULL),
	(12, '9', 'Carta', 1, 4, '2020-12-21 18:37:22', '2020-12-21 18:37:22', NULL);
/*!40000 ALTER TABLE `attribute` ENABLE KEYS */;

-- Volcando estructura para tabla php-isil.attribute_type
CREATE TABLE IF NOT EXISTS `attribute_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla php-isil.attribute_type: ~0 rows (aproximadamente)
DELETE FROM `attribute_type`;
/*!40000 ALTER TABLE `attribute_type` DISABLE KEYS */;
INSERT INTO `attribute_type` (`id`, `code`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '123', 'Small', 1, '2020-12-20 04:05:49', '2020-12-21 18:18:16', '2020-12-21 18:18:16'),
	(2, '1', 'Contenido', 1, '2020-12-21 18:19:41', '2020-12-21 18:19:41', NULL),
	(3, '2', 'Color', 1, '2020-12-21 18:30:30', '2020-12-21 18:30:30', NULL),
	(4, '3', 'Tamanio', 1, '2020-12-21 18:35:59', '2020-12-21 18:36:49', NULL);
/*!40000 ALTER TABLE `attribute_type` ENABLE KEYS */;

-- Volcando estructura para tabla php-isil.business
CREATE TABLE IF NOT EXISTS `business` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `number_identifer` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla php-isil.business: ~0 rows (aproximadamente)
DELETE FROM `business`;
/*!40000 ALTER TABLE `business` DISABLE KEYS */;
/*!40000 ALTER TABLE `business` ENABLE KEYS */;

-- Volcando estructura para tabla php-isil.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla php-isil.category: ~2 rows (aproximadamente)
DELETE FROM `category`;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Categoria', 1, '2020-12-20 05:48:17', '2020-12-20 05:48:24', '2020-12-20 05:48:24'),
	(2, 'Utiles', 1, '2020-12-20 05:48:40', '2020-12-20 05:48:40', NULL),
	(3, 'Limpieza', 1, '2020-12-20 06:41:38', '2020-12-20 06:41:38', NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Volcando estructura para tabla php-isil.client
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `document_type` varchar(9) NOT NULL,
  `document_number` varchar(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(9) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `status` tinyint(2) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla php-isil.client: ~2 rows (aproximadamente)
DELETE FROM `client`;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` (`id`, `first_name`, `last_name`, `full_name`, `document_type`, `document_number`, `address`, `phone`, `email`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Prueba', 'Prueba', 'Prueba Prueba', 'DNI', '44444444', 'Prueba', '99999999', 'prueba@prueba.com', 1, '2020-12-20 01:37:18', '2020-12-20 03:48:05', '2020-12-20 03:48:05'),
	(2, 'Prueba2', 'Prueba2', 'Prueba2 Prueba2', 'DNI', '44444445', 'Jr. Los papeles mojados 222', '9999999', 'hh@hh.com', 1, '2020-12-20 02:36:16', '2020-12-21 18:25:42', '2020-12-21 18:25:42'),
	(3, 'Cechilita', 'Jiron', 'Cechilita Jiron', 'Pasaporte', '55555555', 'Av. La Avenida 111', '34554454', 'prueba@isil.pe', 1, '2020-12-21 01:21:03', '2020-12-21 18:22:59', NULL),
	(4, 'Pepito', 'Comprador', 'Pepito Comprador', 'DNI', '75487854', 'Av. Javier Prado', '999878999', 'pepit@correito.com', 1, '2020-12-21 18:22:02', '2020-12-21 18:22:02', NULL);
/*!40000 ALTER TABLE `client` ENABLE KEYS */;

-- Volcando estructura para tabla php-isil.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla php-isil.failed_jobs: ~0 rows (aproximadamente)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Volcando estructura para tabla php-isil.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla php-isil.migrations: ~2 rows (aproximadamente)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla php-isil.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla php-isil.password_resets: ~0 rows (aproximadamente)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla php-isil.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_category_idx` (`category_id`),
  CONSTRAINT `fk_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla php-isil.product: ~4 rows (aproximadamente)
DELETE FROM `product`;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `code`, `name`, `status`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '123', 'Plumon', 1, 2, '2020-12-20 05:57:45', '2020-12-21 18:32:31', NULL),
	(2, '456', 'Lapicero', 1, 2, '2020-12-20 06:00:36', '2020-12-20 06:00:36', NULL),
	(3, '789', 'Cuaderno', 1, 2, '2020-12-20 21:16:26', '2020-12-21 17:58:37', NULL),
	(4, '1023', 'Vinifan', 1, 2, '2020-12-20 21:17:01', '2020-12-21 17:59:51', NULL),
	(5, '1024', 'Lejia', 1, 3, '2020-12-21 18:00:17', '2020-12-21 18:00:17', NULL),
	(6, '1025', 'Ace', 1, 3, '2020-12-21 18:00:28', '2020-12-21 18:00:28', NULL),
	(7, '1026', 'Alcohol Gel', 1, 3, '2020-12-21 18:01:13', '2020-12-21 18:01:13', NULL),
	(8, '1027', 'Jabon en Barra', 1, 3, '2020-12-21 18:01:31', '2020-12-21 18:01:31', NULL);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Volcando estructura para tabla php-isil.product_has_attribute
CREATE TABLE IF NOT EXISTS `product_has_attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_id` (`product_id`,`attribute_id`),
  KEY `fk_product_has_attribute_attribute1_idx` (`attribute_id`),
  KEY `fk_product_has_attribute_product1_idx` (`product_id`),
  CONSTRAINT `fk_product_has_attribute_attribute1` FOREIGN KEY (`attribute_id`) REFERENCES `attribute` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_has_attribute_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla php-isil.product_has_attribute: ~3 rows (aproximadamente)
DELETE FROM `product_has_attribute`;
/*!40000 ALTER TABLE `product_has_attribute` DISABLE KEYS */;
INSERT INTO `product_has_attribute` (`id`, `product_id`, `attribute_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(6, 8, 4, '2020-12-21 18:20:46', '2020-12-21 18:20:46', NULL),
	(7, 2, 8, '2020-12-21 18:31:33', '2020-12-21 18:31:33', NULL),
	(8, 1, 9, '2020-12-21 18:32:50', '2020-12-21 18:32:50', NULL),
	(9, 3, 9, '2020-12-21 18:33:43', '2020-12-21 18:39:10', '2020-12-21 18:39:10'),
	(10, 3, 11, '2020-12-21 18:38:00', '2020-12-21 18:38:00', NULL),
	(11, 5, 7, '2020-12-21 18:41:00', '2020-12-21 18:41:00', NULL),
	(12, 6, 6, '2020-12-21 18:41:15', '2020-12-21 18:41:27', NULL),
	(13, 4, 11, '2020-12-21 18:41:38', '2020-12-21 18:41:38', NULL);
/*!40000 ALTER TABLE `product_has_attribute` ENABLE KEYS */;

-- Volcando estructura para tabla php-isil.profile
CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(45) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla php-isil.profile: ~0 rows (aproximadamente)
DELETE FROM `profile`;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` (`id`, `rol`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Administrador', 1, '2020-12-21 03:46:14', '2020-12-21 03:46:14', NULL);
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;

-- Volcando estructura para tabla php-isil.provider
CREATE TABLE IF NOT EXISTS `provider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `document_type` varchar(3) NOT NULL,
  `document_number` varchar(11) NOT NULL,
  `giro` varchar(255) NOT NULL,
  `status` tinyint(2) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla php-isil.provider: ~0 rows (aproximadamente)
DELETE FROM `provider`;
/*!40000 ALTER TABLE `provider` DISABLE KEYS */;
INSERT INTO `provider` (`id`, `name`, `document_type`, `document_number`, `giro`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'ISIL', 'RUC', '20100134455', 'Educación', 1, '2020-12-20 05:54:53', '2020-12-20 05:55:14', NULL),
	(2, 'Taylor S.A', 'RUC', '22342321222', 'Industria', 1, '2020-12-21 18:26:50', '2020-12-21 18:26:50', NULL);
/*!40000 ALTER TABLE `provider` ENABLE KEYS */;

-- Volcando estructura para tabla php-isil.provider_has_products
CREATE TABLE IF NOT EXISTS `provider_has_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_provider` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_provider` (`id_provider`,`id_product`),
  KEY `fk_provider_has_products_product` (`id_product`),
  CONSTRAINT `fk_provider_has_products_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_provider_has_products_provider` FOREIGN KEY (`id_provider`) REFERENCES `provider` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla php-isil.provider_has_products: ~0 rows (aproximadamente)
DELETE FROM `provider_has_products`;
/*!40000 ALTER TABLE `provider_has_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `provider_has_products` ENABLE KEYS */;

-- Volcando estructura para tabla php-isil.sale
CREATE TABLE IF NOT EXISTS `sale` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `fcompra` datetime DEFAULT NULL,
  `total` decimal(18,5) NOT NULL DEFAULT 0.00000,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sale_client` (`id_client`),
  CONSTRAINT `fk_sale_client` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla php-isil.sale: ~13 rows (aproximadamente)
DELETE FROM `sale`;
/*!40000 ALTER TABLE `sale` DISABLE KEYS */;
INSERT INTO `sale` (`id`, `id_client`, `fcompra`, `total`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(15, 3, '2020-12-21 00:00:00', 35.00000, '2020-12-21 18:27:12', '2020-12-21 18:45:05', NULL),
	(16, 4, '2020-12-21 00:00:00', 66.00000, '2020-12-21 18:40:28', '2020-12-21 18:44:44', NULL);
/*!40000 ALTER TABLE `sale` ENABLE KEYS */;

-- Volcando estructura para tabla php-isil.sale_detail
CREATE TABLE IF NOT EXISTS `sale_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` decimal(18,5) NOT NULL DEFAULT 0.00000,
  `unit_price` decimal(18,5) NOT NULL DEFAULT 0.00000,
  `total` decimal(18,5) NOT NULL DEFAULT 0.00000,
  `sale_id` int(11) NOT NULL,
  `product_has_attribute_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sale_detail_sale1_idx` (`sale_id`),
  KEY `fk_sale_detail_product_has_attribute` (`product_has_attribute_id`),
  CONSTRAINT `fk_sale_detail_product_has_attribute` FOREIGN KEY (`product_has_attribute_id`) REFERENCES `product_has_attribute` (`id`),
  CONSTRAINT `fk_sale_detail_sale1` FOREIGN KEY (`sale_id`) REFERENCES `sale` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla php-isil.sale_detail: ~6 rows (aproximadamente)
DELETE FROM `sale_detail`;
/*!40000 ALTER TABLE `sale_detail` DISABLE KEYS */;
INSERT INTO `sale_detail` (`id`, `quantity`, `unit_price`, `total`, `sale_id`, `product_has_attribute_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(7, 5.00000, 3.00000, 15.00000, 15, 6, '2020-12-21 18:27:29', '2020-12-21 18:45:05', NULL),
	(8, 10.00000, 2.00000, 20.00000, 15, 10, '2020-12-21 18:39:43', '2020-12-21 18:39:43', NULL),
	(9, 1.00000, 15.00000, 15.00000, 16, 11, '2020-12-21 18:42:12', '2020-12-21 18:42:12', NULL),
	(10, 2.00000, 8.00000, 16.00000, 16, 12, '2020-12-21 18:42:47', '2020-12-21 18:42:47', NULL),
	(11, 10.00000, 3.00000, 30.00000, 16, 6, '2020-12-21 18:43:13', '2020-12-21 18:43:13', NULL),
	(12, 1.00000, 5.00000, 5.00000, 16, 8, '2020-12-21 18:44:43', '2020-12-21 18:44:43', NULL);
/*!40000 ALTER TABLE `sale_detail` ENABLE KEYS */;

-- Volcando estructura para tabla php-isil.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `document_number` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_id` int(11) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(2),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `FK_users_profile` (`profile_id`),
  CONSTRAINT `FK_users_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla php-isil.users: ~2 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `full_name`, `last_name`, `user_name`, `email`, `email_verified_at`, `document_number`, `profile_id`, `password`, `remember_token`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(7, 'Joseph Jimenez', 'Joseph', 'Jimenez', 'jjimenez', 'jjimenez@isil.pe', NULL, '44444444', 1, '$2y$10$P.WXt1DHcY0yMbuuP5vAee9DZqR5wem3HRFMOAzVdLQCjgSwPO/gS', NULL, 1, '2020-12-21 04:06:32', '2020-12-21 18:48:19', NULL),
	(8, 'Carlos Blondet', 'Carlos', 'Blondet', 'cblondet', 'cblondet@isil.pe', NULL, '44444445', 1, '$2y$10$rroS49Mk0q6nF2lu0NpIuupyAeBmm1aBUzPrtYM33GEI82rujF6ki', NULL, 1, '2020-12-21 04:21:21', '2020-12-21 17:57:39', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
