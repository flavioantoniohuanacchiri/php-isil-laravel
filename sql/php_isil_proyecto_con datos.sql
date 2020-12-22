-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.14-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para php_isil_proyecto
CREATE DATABASE IF NOT EXISTS `php_isil_proyecto` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `php_isil_proyecto`;

-- Volcando estructura para tabla php_isil_proyecto.attribute
CREATE TABLE IF NOT EXISTS `attribute` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `attribute_type_id` int(10) DEFAULT NULL,
  `status` tinyint(2) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla php_isil_proyecto.attribute: ~4 rows (aproximadamente)
DELETE FROM `attribute`;
/*!40000 ALTER TABLE `attribute` DISABLE KEYS */;
INSERT INTO `attribute` (`id`, `code`, `name`, `attribute_type_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '4342', 'Rojo', 3, 1, '2020-12-20 12:04:14', '2020-12-20 12:04:14', NULL),
	(2, '4255', 'M', 2, 1, '2020-12-20 12:04:40', '2020-12-20 12:06:32', NULL),
	(3, '32423', 'Kilo', 1, 1, '2020-12-20 12:06:06', '2020-12-20 12:06:06', NULL),
	(4, '24447', 'L', 2, 1, '2020-12-20 12:08:42', '2020-12-20 12:08:42', NULL);
/*!40000 ALTER TABLE `attribute` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil_proyecto.attribute_type
CREATE TABLE IF NOT EXISTS `attribute_type` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `status` tinyint(2) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla php_isil_proyecto.attribute_type: ~4 rows (aproximadamente)
DELETE FROM `attribute_type`;
/*!40000 ALTER TABLE `attribute_type` DISABLE KEYS */;
INSERT INTO `attribute_type` (`id`, `code`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, NULL, 'Peso', 1, '2020-12-20 11:27:30', '2020-12-20 11:28:03', NULL),
	(2, NULL, 'Tamaño', 1, '2020-12-20 11:28:12', '2020-12-20 11:28:12', NULL),
	(3, NULL, 'Color', 1, '2020-12-20 11:28:23', '2020-12-20 11:30:08', NULL),
	(4, NULL, 'Tipo 3', 1, '2020-12-20 11:29:22', '2020-12-20 11:29:22', NULL);
/*!40000 ALTER TABLE `attribute_type` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil_proyecto.business
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla php_isil_proyecto.business: ~0 rows (aproximadamente)
DELETE FROM `business`;
/*!40000 ALTER TABLE `business` DISABLE KEYS */;
/*!40000 ALTER TABLE `business` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil_proyecto.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `status` tinyint(2) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla php_isil_proyecto.category: ~3 rows (aproximadamente)
DELETE FROM `category`;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Categoría 1', 1, '2020-12-18 21:45:09', '2020-12-19 16:11:58', NULL),
	(2, 'Categoría 2', 1, '2020-12-20 10:05:49', '2020-12-20 10:10:06', NULL),
	(3, 'Categoría 3', 1, '2020-12-20 10:09:50', '2020-12-20 10:09:50', NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil_proyecto.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `address` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `zip` varchar(5) COLLATE utf8_spanish_ci DEFAULT NULL,
  `document_number` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `document_type` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `status` tinyint(2) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `number_identifer` (`document_number`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla php_isil_proyecto.customer: ~3 rows (aproximadamente)
DELETE FROM `customer`;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` (`id`, `name`, `address`, `zip`, `document_number`, `document_type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Cliente01', 'Av. La Fontana 955, La Molina', '15024', '09643457', 'DNI', 1, '2020-12-19 17:33:58', '2020-12-20 18:53:07', NULL),
	(2, 'Cliente02', 'Av. la Mar 234, Miraflores', '15074', '34345567', 'DNI', 1, '2020-12-19 18:28:39', '2020-12-20 17:04:43', NULL),
	(3, 'Cliente 3', 'Av. La Fontana 1126, La Molina', '15024', '10234567345', 'RUC', 1, '2020-12-20 17:35:08', '2020-12-20 17:35:08', NULL);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil_proyecto.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla php_isil_proyecto.failed_jobs: ~0 rows (aproximadamente)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil_proyecto.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla php_isil_proyecto.migrations: ~3 rows (aproximadamente)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil_proyecto.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla php_isil_proyecto.password_resets: ~0 rows (aproximadamente)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil_proyecto.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `category_id` int(10) DEFAULT NULL,
  `attribute_id` int(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla php_isil_proyecto.product: ~8 rows (aproximadamente)
DELETE FROM `product`;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `code`, `name`, `status`, `category_id`, `attribute_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '74747', 'Producto 1', 1, 1, 3, '2020-12-20 09:38:33', '2020-12-20 09:44:32', NULL),
	(2, '4444', 'producto 2', 1, 1, 2, '2020-12-20 09:40:15', '2020-12-20 19:24:09', NULL),
	(3, '43448', 'Producto 3', 1, 2, 4, '2020-12-20 09:49:07', '2020-12-20 19:24:30', NULL),
	(4, '333', 'producto 4', 1, 1, 1, '2020-12-20 10:05:29', '2020-12-20 19:23:19', NULL),
	(5, '43246', 'Producto 5', 1, 2, 3, '2020-12-20 10:30:10', '2020-12-20 19:46:11', NULL),
	(6, '4555', 'Producto 6', 1, 3, 3, '2020-12-20 19:35:44', '2020-12-20 19:35:54', NULL),
	(7, '34335', 'Producto 5', 1, 2, 2, '2020-12-20 19:37:46', '2020-12-20 19:37:46', NULL),
	(8, '85757', 'Producto 8', 1, 3, 3, '2020-12-20 19:46:33', '2020-12-20 19:46:33', NULL);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil_proyecto.profile
CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla php_isil_proyecto.profile: ~6 rows (aproximadamente)
DELETE FROM `profile`;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'SUPERADMIN', 'Administrador con acceso total', 1, '2020-12-07 21:40:03', '2020-12-20 18:42:22', NULL),
	(2, 'ADMIN', 'Administrador de usuarios', 1, '2020-12-07 21:40:08', '2020-12-20 18:42:07', NULL),
	(3, 'LOGISTICA', 'Acceso a modificar lista de productos, categorías y atributos', 1, '2020-12-18 20:12:48', '2020-12-20 18:44:16', NULL),
	(4, 'VENDEDOR', 'Acceso a panel de ventas', 1, '2020-12-18 20:43:35', '2020-12-20 18:44:33', NULL),
	(5, 'AUDITOR', 'Acceso total  sin posibilidad de modificar', 1, '2020-12-18 20:47:23', '2020-12-20 18:41:44', NULL),
	(6, 'aaa', NULL, 1, '2020-12-19 19:50:42', '2020-12-19 19:50:48', '2020-12-19 19:50:48');
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil_proyecto.provider
CREATE TABLE IF NOT EXISTS `provider` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `address` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `zip` varchar(5) COLLATE utf8_spanish_ci DEFAULT NULL,
  `phone` varchar(9) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `document_number` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `status` tinyint(2) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `number_identifer` (`document_number`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla php_isil_proyecto.provider: ~5 rows (aproximadamente)
DELETE FROM `provider`;
/*!40000 ALTER TABLE `provider` DISABLE KEYS */;
INSERT INTO `provider` (`id`, `name`, `address`, `zip`, `phone`, `email`, `document_number`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Proveedor1', 'Av. La Fontana 955, La Molina', '15024', '017060000', 'eforno@isil.pe', '12345678901', 1, '2020-12-19 18:08:47', '2020-12-19 18:10:51', NULL),
	(2, 'Proveedor2', 'Av. Corregidor 234, La Molina', '15024', NULL, 'eee@gdgd.com', '11111222222', 0, '2020-12-19 18:19:10', '2020-12-20 17:18:36', NULL),
	(3, 'provvedor3', 'Av. La Fontana 955, La Molina', '15024', '017060000', 'ccccc@isil.pe', '111', 1, '2020-12-19 18:22:46', '2020-12-19 18:23:13', NULL),
	(4, 'Proveedor 6', NULL, NULL, NULL, 'correo@empress.com', '22222', 1, '2020-12-19 18:31:36', '2020-12-20 18:02:41', NULL),
	(5, 'Proveedor 5', NULL, NULL, NULL, 'hdhdgd@jdjd.com', '11111444433', 1, '2020-12-19 18:32:12', '2020-12-20 17:05:21', NULL);
/*!40000 ALTER TABLE `provider` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil_proyecto.sale
CREATE TABLE IF NOT EXISTS `sale` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL DEFAULT 0,
  `total` decimal(10,2) NOT NULL DEFAULT 1.00,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla php_isil_proyecto.sale: ~0 rows (aproximadamente)
DELETE FROM `sale`;
/*!40000 ALTER TABLE `sale` DISABLE KEYS */;
INSERT INTO `sale` (`id`, `customer_id`, `total`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 2, 45.50, '2020-12-20 20:05:03', '2020-12-20 20:46:10', NULL);
/*!40000 ALTER TABLE `sale` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil_proyecto.sale_detail
CREATE TABLE IF NOT EXISTS `sale_detail` (
  `sale_id` int(10) NOT NULL DEFAULT 0,
  `product_id` int(10) NOT NULL DEFAULT 0,
  `count` decimal(10,3) NOT NULL DEFAULT 1.000,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla php_isil_proyecto.sale_detail: ~0 rows (aproximadamente)
DELETE FROM `sale_detail`;
/*!40000 ALTER TABLE `sale_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `sale_detail` ENABLE KEYS */;

-- Volcando estructura para tabla php_isil_proyecto.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(2) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `IDX_DOCUMENT_NUMBER` (`document_number`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla php_isil_proyecto.users: ~15 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `profile_id`, `name`, `user_name`, `full_name`, `last_name`, `document_number`, `email`, `password`, `remember_token`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 4, 'Marizza Marizza', 'msanca', 'Marizza', 'Sanca', '46992018', 'marizza.sanca@jmasoluciones.com', '$2y$10$cdKVwR.xFaaRR2gAekCmiOOZ/sNwbqQSoDrovhvX73jvK0dR86.6S', NULL, 1, '2020-12-07 22:46:37', '2020-12-19 16:57:39', NULL),
	(2, 2, 'Flavio Antonio Flavio Antonio', 'fhuanacchiri', 'Flavio Antonio', 'Huanacchiri Castillo', '45968348', 'flavio.huanacchiri@gmail.com', '$2y$10$M8JHXjGFwPRUC.RqQSQRje7AOjvlvOhKxlgzhs9wixCDIA1kMbtT2', 'Sk9JgQ7qG4sYPFp2RU9QEmzZNJzD4VPxl2MF6IfwbLpbgJX5CSCAYyzKa0q7', 1, '2020-12-08 00:27:59', '2020-12-18 05:46:05', NULL),
	(3, 1, 'Julio Julio', 'jcalderon', 'Julio', 'Calderon', '45165398', 'juliocalderon@gmail.com', '$2y$10$7IIKyajPy1GfJ1LkLJ6XO.zwLldsVcC8YpRoWvr86mqj7cWly1udS', 'GTH0dYKzTPPLwUrdhdZYYuwJ9gKw1UH0U7HxbzH5d1ALVum303lh2hRzfGoa', 1, '2020-12-07 21:52:17', '2020-12-15 17:39:55', '2020-12-15 17:39:55'),
	(23, 1, 'Juan Juan', 'jquispe', 'Juan', 'Quispe', '98989898', 'jquispe@gmail.com', '$2y$10$6RM1edzlMnphsLVVgOkk5ucm5vGOnuY2mCQTCyM1UTEpWOc0UbhBm', NULL, 1, '2020-12-17 17:50:33', '2020-12-18 05:46:12', NULL),
	(24, 2, 'Pedro Pedro', 'pgonzales', 'Pedro', 'Gonzales', '56565656', 'pgonzales@gmail.com', '$2y$10$lnMdGP7ijSzP3y4xCCa1deNJnRc22ZGRzA2d39rVkKk4Ymw0HADYq', NULL, 1, '2020-12-18 05:16:19', '2020-12-18 05:17:53', '2020-12-18 05:34:55'),
	(25, 2, 'Vanessa Jimena Vanessa Jimena', 'varteta', 'Vanessa Jimena', 'Arteta Gonzales', '34567890', 'varteta@gmail.com', '$2y$10$0uZsJbDi4D1dEzWOm/xFuu.KVvJv4vJsi6rgQmbAE4SmS9.FLjH2q', NULL, 1, '2020-12-18 05:44:50', '2020-12-18 05:44:50', NULL),
	(26, 2, 'Andrea Teresa Andrea Teresa', 'averano', 'Andrea Teresa', 'Verano', '87878787', 'averano@gmail.com', '$2y$10$Wi6PMpbjDwhurRcJxdKnw.I5JUbpi5l11OUVnXBxUirDDHdCRBS8W', NULL, 1, '2020-12-18 05:49:03', '2020-12-18 05:49:03', NULL),
	(27, 3, 'Edson Edson', NULL, 'Edson', 'Forno', '98989899', 'efornoq@gmail.com', '$2y$10$W63ciD9HXbOuE0k3UZPhOeYZ4.XnpQtJF1Y3QzvXmzDUmPcwH3.VC', NULL, 1, '2020-12-18 09:48:32', '2020-12-20 18:47:28', NULL),
	(28, 1, 'aaa aaa', 'fhuanacchiriaa', 'aaa', 'Fornoaa', '12123344', 'efornoq@gmail.coms', '$2y$10$DoCYGlEDO0Z2FHYdR/Ee.OJ72J3kPzJBm.qgN7cipUm/dvB7r4A7m', NULL, 1, '2020-12-18 09:49:39', '2020-12-18 19:14:53', '2020-12-18 19:14:53'),
	(30, 1, 'aaa aaa', 'fhuanacchiriaa', 'aaa', 'Fornoaa', '121233422', 'efornoq@gmail.comtts', '$2y$10$COlEawBDS3OC4GotXT1rHe.uFIHNzVNpCDNtKLCS60hEzt.hYwmhu', NULL, 1, '2020-12-18 11:08:33', '2020-12-18 20:49:20', '2020-12-18 20:49:20'),
	(31, 1, '234 234', 'fhuanacchiri', '234', '234', '1234321', 'eforno@isil.pe', '$2y$10$29WWAq21dPdgcUbMxzhd7O3v1Gbp/0iArgIMFs5o7ON6W88t.bWI6', NULL, 1, '2020-12-18 11:09:18', '2020-12-18 19:14:36', '2020-12-18 19:14:36'),
	(32, 1, 'aaa aaa', 'aaaaaa', 'aaa', 'aaaa', '111111', 'aaa', '$2y$10$xE/WwHxC2BIyocvN4fqBgeXcZsMOBD1mO315AFiXs9pPcMURXwTIm', NULL, 1, '2020-12-18 12:53:43', '2020-12-20 21:15:09', NULL),
	(33, NULL, 'aa aa', 'aa', 'aa', 'aa', '096434', 'aa', '$2y$10$i.DjE1uVreP7B0DmrmDSue7jObNNX8I/zhXhhv44DqPEt1Zujt.fu', NULL, 1, '2020-12-18 13:04:38', '2020-12-18 19:14:42', '2020-12-18 19:14:42'),
	(34, 2, 'ABC ABC', 'erewrewer', 'ABC', 'CDE EFQ', '34443445', 'eforn@dhdhhd', '$2y$10$OlT7SZDNOjpfNOh4l5Q08u3npmZc3edj299MBPMDgiDvey1RmC4Ru', NULL, 1, '2020-12-19 17:01:36', '2020-12-19 17:01:36', NULL),
	(38, 3, 'Pedro Pedro', 'pperez', 'Pedro', 'PerezRozas', '84746553', 'pperez@gmail.com', '$2y$10$p8V1bKvJbOkoStNyNsivauYMIrq76MflopxeSo6fAUzIrV8KvWGjO', NULL, 1, '2020-12-20 21:18:50', '2020-12-20 21:18:50', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
