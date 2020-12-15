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

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
