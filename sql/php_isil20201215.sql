/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.7.32-ndb-7.6.16 : Database - php_isil
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`php_isil` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `php_isil`;

/*Table structure for table `business` */

DROP TABLE IF EXISTS `business`;

CREATE TABLE `business` (
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

/*Data for the table `business` */

insert  into `business`(`id`,`name`,`address`,`ubigeo`,`number_identifer`,`status`,`created_at`,`updated_at`,`deleted_at`) values (1,'Flavio Antonio Huanacchiri Castillo',NULL,NULL,'10459683483',1,'2020-12-03 01:21:10','2020-12-03 01:21:10',NULL),(2,'Fernando Jacobo Quiroz Cabanillas',NULL,NULL,'10435350378',1,'2020-12-03 01:23:41','2020-12-03 01:23:41',NULL);

/*Table structure for table `coin` */

DROP TABLE IF EXISTS `coin`;

CREATE TABLE `coin` (
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

/*Data for the table `coin` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1);

/*Table structure for table `module` */

DROP TABLE IF EXISTS `module`;

CREATE TABLE `module` (
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

/*Data for the table `module` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `profile` */

DROP TABLE IF EXISTS `profile`;

CREATE TABLE `profile` (
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

/*Data for the table `profile` */

insert  into `profile`(`id`,`name`,`order`,`status`,`created_at`,`updated_at`,`deleted_at`,`userid_created_at`,`userid_updated_at`,`userid_deleted_at`,`user_created_at`,`user_updated_at`,`user_deleted_at`) values (1,'SUPERADMIN',0,1,'2020-12-07 21:40:03',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'MODERADOR',0,1,'2020-12-07 21:40:08',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `profile_module` */

DROP TABLE IF EXISTS `profile_module`;

CREATE TABLE `profile_module` (
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

/*Data for the table `profile_module` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
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
  `status` tinyint(2) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `IDX_DOCUMENT_NUMBER` (`document_number`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`profile_id`,`business_id`,`name`,`user_name`,`full_name`,`last_name`,`document_number`,`email`,`email_verified_at`,`password`,`remember_token`,`status`,`created_at`,`updated_at`,`deleted_at`) values (1,2,1,'Marizza Sanca','msanca','Marizza','Sanca','46992018','marizza.sanca@jmasoluciones.com',NULL,'$2y$10$cdKVwR.xFaaRR2gAekCmiOOZ/sNwbqQSoDrovhvX73jvK0dR86.6S',NULL,1,'2020-12-07 22:46:37','2020-12-07 21:45:56',NULL),(2,NULL,1,'Flavio Huanacchiri','fhuanacchiri','Flavio Antonio','Huanacchiri Castillo','45968348','flavio.huanacchiri@gmail.com',NULL,'$2y$10$M8JHXjGFwPRUC.RqQSQRje7AOjvlvOhKxlgzhs9wixCDIA1kMbtT2','Sk9JgQ7qG4sYPFp2RU9QEmzZNJzD4VPxl2MF6IfwbLpbgJX5CSCAYyzKa0q7',1,'2020-12-08 00:27:59','2020-12-07 21:36:42',NULL),(3,1,2,'Julio Julio','jcalderon','Julio','Calderon','45165398','juliocalderon@gmail.com',NULL,'$2y$10$7IIKyajPy1GfJ1LkLJ6XO.zwLldsVcC8YpRoWvr86mqj7cWly1udS','GTH0dYKzTPPLwUrdhdZYYuwJ9gKw1UH0U7HxbzH5d1ALVum303lh2hRzfGoa',1,'2020-12-07 21:52:17','2020-12-09 19:50:46',NULL),(10,NULL,2,'Flavio2',NULL,NULL,NULL,NULL,'proyectos@jmasoluciones.com',NULL,'$2y$10$rZnK6d1ZS6Fc4pz92BMYguJpTWkqW3mCukAcyr0YmVcj51g1Kum.O',NULL,1,'2020-12-09 18:57:23','2020-12-09 18:57:23',NULL),(21,NULL,NULL,'Flavio3 Flavio3','fhuanacchiri3','Flavio3','Huanacchiri','44968348','limawebperu@gmail.com',NULL,'$2y$10$YD5ALiW855d8hKYVchRUq.aDkJMSOZnxwcKJmsPOnv4L4qQToTKUe',NULL,1,'2020-12-14 18:26:07','2020-12-14 18:26:07',NULL),(22,NULL,NULL,'Flavio2',NULL,NULL,NULL,NULL,'fahuanacchiri@isil.pe',NULL,'$2y$10$oCVbIgLiX6c3mMj7FmQXkeRyegLXqFy8q2VG09h6aBYXNy5wzWg2K',NULL,1,'2020-12-14 19:44:29','2020-12-14 19:44:29',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
