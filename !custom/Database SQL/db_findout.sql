/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.28-MariaDB : Database - db_findout
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_findout` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_findout`;

/*Table structure for table `tb_admin` */

DROP TABLE IF EXISTS `tb_admin`;

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_admin` */

/*Table structure for table `tb_category` */

DROP TABLE IF EXISTS `tb_category`;

CREATE TABLE `tb_category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_category` */

/*Table structure for table `tb_event` */

DROP TABLE IF EXISTS `tb_event`;

CREATE TABLE `tb_event` (
  `id_event` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_date` date NOT NULL,
  `end_time` time NOT NULL,
  `location` varchar(100) NOT NULL,
  `ticket_price` int(11) NOT NULL,
  `description` text NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `id_event_organizer` bigint(20) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `event_status` enum('pending','active','disable') NOT NULL,
  `saved` int(11) NOT NULL DEFAULT '0',
  `id_admin` int(11) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_event`),
  KEY `longitude` (`lng`),
  KEY `latitude` (`lat`),
  KEY `id_event_organizer` (`id_event_organizer`),
  KEY `id_admin` (`id_admin`),
  KEY `id_kategori` (`id_category`),
  CONSTRAINT `tb_event_ibfk_1` FOREIGN KEY (`id_event_organizer`) REFERENCES `tb_event_organizer` (`id_event_organizer`),
  CONSTRAINT `tb_event_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`),
  CONSTRAINT `tb_event_ibfk_3` FOREIGN KEY (`id_category`) REFERENCES `tb_category` (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_event` */

/*Table structure for table `tb_event_image` */

DROP TABLE IF EXISTS `tb_event_image`;

CREATE TABLE `tb_event_image` (
  `id_event_image` int(11) NOT NULL AUTO_INCREMENT,
  `id_event` int(11) DEFAULT NULL,
  `event_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `id_event_image` (`id_event_image`),
  KEY `id_event` (`id_event`),
  CONSTRAINT `tb_event_image_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `tb_event` (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_event_image` */

/*Table structure for table `tb_event_organizer` */

DROP TABLE IF EXISTS `tb_event_organizer`;

CREATE TABLE `tb_event_organizer` (
  `id_event_organizer` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(30) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_event_organizer`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_event_organizer` */

/*Table structure for table `tb_saved_event` */

DROP TABLE IF EXISTS `tb_saved_event`;

CREATE TABLE `tb_saved_event` (
  `id_saved` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_event` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_saved`),
  KEY `id_user` (`id_user`),
  KEY `id_event` (`id_event`),
  CONSTRAINT `tb_saved_event_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  CONSTRAINT `tb_saved_event_ibfk_2` FOREIGN KEY (`id_event`) REFERENCES `tb_event` (`id_event`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_saved_event` */

/*Table structure for table `tb_ticket` */

DROP TABLE IF EXISTS `tb_ticket`;

CREATE TABLE `tb_ticket` (
  `id_ticket` int(11) NOT NULL,
  `id_event` bigint(20) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ticket`),
  KEY `id_event` (`id_event`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `tb_ticket_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `tb_event` (`id_event`),
  CONSTRAINT `tb_ticket_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_ticket` */

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `birth_day` date DEFAULT NULL,
  `regis_date` date DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_user` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
