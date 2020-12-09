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
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `business` */

insert  into `business`(`id`,`name`,`address`,`ubigeo`,`number_identifer`,`created_at`,`updated_at`) values (1,'Flavio Antonio Huanacchiri Castillo',NULL,NULL,'10459683483','2020-12-03 01:21:10','2020-12-03 01:21:10'),(2,'Fernando Jacobo Quiroz Cabanillas',NULL,NULL,'10435350378','2020-12-03 01:23:41','2020-12-03 01:23:41');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) DEFAULT NULL,
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `IDX_DOCUMENT_NUMBER` (`document_number`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`profile_id`,`name`,`user_name`,`full_name`,`last_name`,`document_number`,`email`,`email_verified_at`,`password`,`remember_token`,`status`,`created_at`,`updated_at`) values (1,2,'Marizza Sanca','msanca','Marizza','Sanca','46992018','marizza.sanca@jmasoluciones.com',NULL,'$2y$10$cdKVwR.xFaaRR2gAekCmiOOZ/sNwbqQSoDrovhvX73jvK0dR86.6S',NULL,1,'2020-12-07 22:46:37','2020-12-07 21:45:56'),(2,NULL,'Flavio Huanacchiri','fhuanacchiri','Flavio Antonio','Huanacchiri Castillo','45968348','flavio.huanacchiri@gmail.com',NULL,'$2y$10$M8JHXjGFwPRUC.RqQSQRje7AOjvlvOhKxlgzhs9wixCDIA1kMbtT2','Sk9JgQ7qG4sYPFp2RU9QEmzZNJzD4VPxl2MF6IfwbLpbgJX5CSCAYyzKa0q7',1,'2020-12-08 00:27:59','2020-12-07 21:36:42'),(3,1,'Julio Julio','jcalderon','Julio','Calderon','45165398','juliocalderon@gmail.com',NULL,'$2y$10$7IIKyajPy1GfJ1LkLJ6XO.zwLldsVcC8YpRoWvr86mqj7cWly1udS','FSqcp7Fd0onZShkvYcvGETf059gEPclwJXC1ZDNkc1XpNlaAc9Dbvri63Ltp',1,'2020-12-07 21:52:17','2020-12-07 21:52:17');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
