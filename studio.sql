/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.31-MariaDB : Database - db_studio
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_studio` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_studio`;

/*Table structure for table `tb_booking` */

DROP TABLE IF EXISTS `tb_booking`;

CREATE TABLE `tb_booking` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `id_studio` int(12) DEFAULT NULL,
  `id_user` int(12) DEFAULT NULL,
  `tgl_booking` date DEFAULT NULL,
  `tgl_jam_booking` datetime DEFAULT NULL,
  `mulai_booking` int(12) DEFAULT NULL,
  `selesai_booking` int(12) DEFAULT NULL,
  `biaya_booking` int(6) DEFAULT NULL,
  `status` enum('pending','batal','selesai') DEFAULT NULL,
  `kode_unik` varchar(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_alert` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `t_booking_ibfk_1` (`mulai_booking`),
  KEY `t_booking_ibfk_2` (`selesai_booking`),
  KEY `id_studio` (`id_studio`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `tb_booking_ibfk_3` FOREIGN KEY (`id_studio`) REFERENCES `tb_studio` (`id`),
  CONSTRAINT `tb_booking_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  CONSTRAINT `tb_booking_ibfk_5` FOREIGN KEY (`mulai_booking`) REFERENCES `tb_jam` (`id`),
  CONSTRAINT `tb_booking_ibfk_6` FOREIGN KEY (`selesai_booking`) REFERENCES `tb_jam` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

/*Data for the table `tb_booking` */

insert  into `tb_booking`(`id`,`id_studio`,`id_user`,`tgl_booking`,`tgl_jam_booking`,`mulai_booking`,`selesai_booking`,`biaya_booking`,`status`,`kode_unik`,`created_at`,`updated_at`,`status_alert`) values 
(58,25,20,'2018-05-25','2018-05-25 10:00:00',1,3,60000,'pending','16b65a','2018-05-24 19:14:59','2018-05-24 19:14:59',NULL);

/*Table structure for table `tb_gallery` */

DROP TABLE IF EXISTS `tb_gallery`;

CREATE TABLE `tb_gallery` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `id_studio_musik` int(12) DEFAULT NULL,
  `foto_studio` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_studio_musik` (`id_studio_musik`),
  CONSTRAINT `tb_gallery_ibfk_1` FOREIGN KEY (`id_studio_musik`) REFERENCES `tb_studio_musik` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_gallery` */

/*Table structure for table `tb_jam` */

DROP TABLE IF EXISTS `tb_jam`;

CREATE TABLE `tb_jam` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `jam` varchar(5) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `tb_jam` */

insert  into `tb_jam`(`id`,`jam`,`created_at`,`updated_at`) values 
(1,'10:00','2018-05-25 00:33:32','0000-00-00 00:00:00'),
(2,'11:00','2018-05-25 03:04:12','0000-00-00 00:00:00'),
(3,'12:00','2018-05-25 03:04:15','0000-00-00 00:00:00'),
(4,'13:00','2018-05-25 03:05:07','0000-00-00 00:00:00'),
(5,'14:00','2018-05-25 03:05:07','0000-00-00 00:00:00'),
(6,'15:00','2018-05-25 03:05:08','0000-00-00 00:00:00'),
(7,'16:00','2018-05-25 03:05:08','0000-00-00 00:00:00'),
(8,'17:00','2018-05-25 03:05:09','0000-00-00 00:00:00'),
(9,'18:00','2018-05-25 03:05:09','0000-00-00 00:00:00'),
(10,'19:00','2018-05-25 03:05:11','0000-00-00 00:00:00'),
(11,'20:00','2018-05-25 03:05:12','0000-00-00 00:00:00'),
(12,'21:00','2018-05-25 03:05:12','0000-00-00 00:00:00'),
(13,'22:00','2018-05-25 03:05:13','0000-00-00 00:00:00'),
(14,'23:00','2018-05-25 03:05:13','0000-00-00 00:00:00');

/*Table structure for table `tb_penyewa` */

DROP TABLE IF EXISTS `tb_penyewa`;

CREATE TABLE `tb_penyewa` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `id_user` int(12) DEFAULT NULL,
  `nama_penyewa` varchar(100) DEFAULT NULL,
  `telp_penyewa` varchar(12) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `tb_penyewa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tb_penyewa` */

insert  into `tb_penyewa`(`id`,`id_user`,`nama_penyewa`,`telp_penyewa`,`created_at`,`updated_at`) values 
(1,1,'sadsda','123123','2018-03-29 15:42:40','2018-03-29 15:42:40'),
(2,3,'asd','123123','2018-03-29 15:51:45','2018-03-29 15:51:45'),
(3,4,'asdasd','123123','2018-03-29 16:43:45','2018-03-29 16:43:45'),
(4,5,'asdasd','123123','2018-03-29 16:44:31','2018-03-29 16:44:31'),
(5,16,'Anjay','0293213213','2018-03-31 11:16:22','2018-03-31 11:16:22'),
(6,19,'sad',NULL,'2018-04-06 17:21:25','2018-04-06 17:21:25'),
(7,20,'anjuy',NULL,'2018-04-07 06:47:59','2018-04-07 06:47:59');

/*Table structure for table `tb_saved_studio` */

DROP TABLE IF EXISTS `tb_saved_studio`;

CREATE TABLE `tb_saved_studio` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `id_studio_musik` int(12) DEFAULT NULL,
  `id_penyewa` int(12) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_penyewa` (`id_penyewa`),
  KEY `id_studio_musik` (`id_studio_musik`),
  CONSTRAINT `tb_saved_studio_ibfk_1` FOREIGN KEY (`id_penyewa`) REFERENCES `tb_penyewa` (`id`),
  CONSTRAINT `tb_saved_studio_ibfk_2` FOREIGN KEY (`id_studio_musik`) REFERENCES `tb_studio_musik` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_saved_studio` */

/*Table structure for table `tb_studio` */

DROP TABLE IF EXISTS `tb_studio`;

CREATE TABLE `tb_studio` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `id_studio_musik` int(12) DEFAULT NULL,
  `nama_studio` varchar(50) DEFAULT NULL,
  `biaya_booking` int(6) DEFAULT NULL,
  `deskripsi_studio` text,
  `foto_studio` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('aktif','tidak aktif') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_studio_musik` (`id_studio_musik`),
  CONSTRAINT `tb_studio_ibfk_1` FOREIGN KEY (`id_studio_musik`) REFERENCES `tb_studio_musik` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `tb_studio` */

insert  into `tb_studio`(`id`,`id_studio_musik`,`nama_studio`,`biaya_booking`,`deskripsi_studio`,`foto_studio`,`created_at`,`updated_at`,`status`) values 
(1,1,'Studio 1',30000,'mantpa','a.jpg',NULL,NULL,'aktif'),
(2,1,'Studio 2',30000,'sadadsadsad','b.jpg',NULL,NULL,'aktif'),
(3,1,'Studio VIP',30000,'dsadsadsda','c.jpg',NULL,NULL,'aktif'),
(4,2,'Studio 1',30000,NULL,'a.jpg',NULL,NULL,'aktif'),
(5,2,'Studio 2',30000,NULL,'b.jpg',NULL,NULL,'aktif'),
(6,2,'Studio VIP',30000,NULL,'c.jpg',NULL,NULL,'aktif'),
(7,3,'Studio 1',30000,NULL,'a.jpg',NULL,NULL,'aktif'),
(8,3,'Studio 2',30000,NULL,'b.jpg',NULL,NULL,'aktif'),
(9,3,'Studio VIP',30000,NULL,'c.jpg',NULL,NULL,'aktif'),
(11,5,'Studio 1',50000,NULL,'a.jpg',NULL,NULL,'aktif'),
(12,5,'Studio 2',40000,NULL,'b.jpg',NULL,NULL,'aktif'),
(13,5,'Studio VIP',40000,NULL,'c.jpg',NULL,NULL,'aktif'),
(14,6,'Studio 1',30000,NULL,'a.jpg',NULL,NULL,'aktif'),
(15,6,'Studio 2',30000,NULL,'b.jpg',NULL,NULL,'aktif'),
(16,6,'Studio VIP',30000,NULL,'c.jpg',NULL,NULL,'aktif'),
(17,7,'Studio 1',30000,NULL,'a.jpg',NULL,NULL,'aktif'),
(18,7,'Studio 2',30000,NULL,'b.jpg',NULL,NULL,'aktif'),
(19,7,'Studio VIP',30000,NULL,'c.jpg',NULL,NULL,'aktif'),
(20,8,'Studio 1',30000,NULL,'a.jpg',NULL,NULL,'aktif'),
(21,8,'Studio 2',30000,NULL,'b.jpg',NULL,NULL,'aktif'),
(22,8,'Studio VIP',30000,NULL,'c.jpg',NULL,NULL,'aktif'),
(23,9,'Studio 1',30000,'Mantap','a.jpg',NULL,'2018-05-23 09:40:35','tidak aktif'),
(24,9,'Studio 2',30000,'Gilek','b.jpg',NULL,'2018-05-23 22:42:14','aktif'),
(25,9,'Studio VIP',30000,'anjaye','c.jpg',NULL,'2018-05-23 22:41:39','aktif'),
(26,9,'Studio A',30000,'sadsadasd','a.jpg','2018-05-23 07:26:34','2018-05-23 07:26:34','aktif'),
(27,9,'Studio 55',50000,'mantap',NULL,'2018-05-23 22:33:09','2018-05-23 22:33:09','aktif'),
(28,9,'Studio 54',32000,'manads',NULL,'2018-05-23 22:35:14','2018-05-23 22:42:25','tidak aktif'),
(29,9,'Studio 54',32222,'manads',NULL,'2018-05-23 22:35:36','2018-05-23 22:39:42','tidak aktif'),
(30,9,'Studio 54',32222,'manads',NULL,'2018-05-23 22:35:57','2018-05-23 22:39:35','tidak aktif'),
(31,9,'Studio 54',32222,'manads',NULL,'2018-05-23 22:36:53','2018-05-23 22:38:17','tidak aktif'),
(32,9,'Studio 54',32222,'manads',NULL,'2018-05-23 22:37:10','2018-05-23 22:39:29','tidak aktif'),
(33,10,'Studio B',70000,'yoiyoiyoiy',NULL,'2018-05-24 00:26:47','2018-05-24 00:26:47','aktif'),
(34,9,'Studio k',30000,'sadasd','upload','2018-05-24 10:25:04','2018-05-24 10:26:27','aktif'),
(35,14,'Studio 1',30000,'Gitar 5 biji','1527177449.jpg','2018-05-24 15:57:29','2018-05-24 15:57:29','aktif');

/*Table structure for table `tb_studio_musik` */

DROP TABLE IF EXISTS `tb_studio_musik`;

CREATE TABLE `tb_studio_musik` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `id_user` int(12) DEFAULT NULL,
  `nama_studio_musik` varchar(100) DEFAULT NULL,
  `telp_studio` varchar(20) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_ktp` varchar(50) DEFAULT NULL,
  `foto_ktp` varchar(100) DEFAULT NULL,
  `foto_studio_musik` varchar(100) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jam_buka` int(3) DEFAULT NULL,
  `jam_tutup` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `jam_buka` (`jam_buka`),
  KEY `jam_tutup` (`jam_tutup`),
  CONSTRAINT `tb_studio_musik_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  CONSTRAINT `tb_studio_musik_ibfk_2` FOREIGN KEY (`jam_buka`) REFERENCES `tb_jam` (`id`),
  CONSTRAINT `tb_studio_musik_ibfk_3` FOREIGN KEY (`jam_tutup`) REFERENCES `tb_jam` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `tb_studio_musik` */

insert  into `tb_studio_musik`(`id`,`id_user`,`nama_studio_musik`,`telp_studio`,`alamat`,`no_ktp`,`foto_ktp`,`foto_studio_musik`,`lokasi`,`kota`,`provinsi`,`kecamatan`,`lat`,`lng`,`created_at`,`updated_at`,`jam_buka`,`jam_tutup`) values 
(1,8,'Jazz Studio','08312321321','sda','123213','1522433553.jpg','a.jpg','Gg. Kenari II, Dangin Puri Kaja, Denpasar Utara, Kota Denpasar, Bali 80234, Indonesia','Ampang','Selangor','Ampang Waterfront',3.1433588,101.773909,'2018-03-30 04:21:41','2018-03-30 04:21:41',NULL,NULL),
(2,9,'Ae Studio','08312321321','sda','12321','1522433553.jpg','b.jpg','Jalan Pantai Sindu, Sanur, Denpasar City, Bali, Indonesia','Ampang','Selangor','Ampang Waterfront',3.1433588,101.773909,'2018-03-30 04:36:48','2018-03-30 04:36:48',NULL,NULL),
(3,12,'Batu Studio','08312321321','sadsad','13213123','1522433553.jpg','c.jpg','Jalan Raja Laut, Chow Kit, Kuala Lumpur, Federal Territory of Kuala Lumpur, Malaysia','Kuala Lumpur','Wilayah Persekutuan Kuala Lumpur','Chow Kit',3.1625348,101.69584129999998,'2018-03-30 04:41:35','2018-03-30 04:41:35',NULL,NULL),
(5,14,'Yoi Studio','08312321321','asdsad','123123','1522433553.jpg','d.jpg','Jalan Pantai Sindu, Sanur, Denpasar City, Bali, Indonesia','Denpasar Selatan','Kota Denpasar','Sanur',-8.6843308,115.26170679999996,'2018-03-30 17:37:36','2018-03-30 17:37:36',NULL,NULL),
(6,15,'Yoman','08312321321','asdsad','12321','1522433553.jpg','e.jpg','Jl. Raya Kampus Unud Blok r No.88, Jimbaran, Kuta Sel., Kabupaten Badung, Bali 80361, Indonesia','Malaysia','89800','Sabah',5.229830959979384,115.64174963377297,'2018-03-30 18:12:34','2018-03-30 18:12:34',NULL,NULL),
(7,17,'Mantap Studio','08312321321','asdsad','123123','1522500061.jpg','f.jpg','jalan danau tonda','Indonesia','73652','Kalimantan Tengah',-1.7083898439393579,115.2436637878418,'2018-03-31 12:41:04','2018-03-31 12:41:04',NULL,NULL),
(8,18,'Slem Studio','08312321321','asdsad','17283612783621783','1522663258.jpg','g.jpg','Jl. Raya Kampus Unud Blok r No.88, Jimbaran, Kuta Sel., Kabupaten Badung, Bali 80361, Indonesia','Jimbaran','Kuta Selatan','Jalan Raya Kampus Unud',-8.796302899999999,115.17681780000001,'2018-04-02 10:01:00','2018-04-02 10:01:00',NULL,NULL),
(9,20,'Rock Studio','08312321321',NULL,'12321321','1526898701.png','f.jpg','Jl. Bleng Bong Sari, Jimbaran, Kuta Sel., Kabupaten Badung, Bali 80361, Indonesia','Kota Denpasar','Bali','Denpasar Selatan',-8.6846958,115.25709389999999,'2018-04-07 12:49:00','2018-05-24 09:55:09',NULL,NULL),
(10,20,'Cool Studio','08312321321',NULL,NULL,'1526898701.png','g.jpg','Jl. Bleng Bong Sari, Jimbaran, Kuta Sel., Kabupaten Badung, Bali 80361, Indonesia','Kota Denpasar','Bali','Denpasar Selatan',-8.6846938,115.25709649999999,'2018-05-23 23:16:22','2018-05-24 10:11:46',NULL,NULL),
(11,20,'Njay Studio','08312321321',NULL,'31232131231312','1527152620.jpg','c.jpg','Jl. Bleng Bong Sari, Jimbaran, Kuta Sel., Kabupaten Badung, Bali 80361, Indonesia','Kabupaten Badung','Bali','Kuta Selatan',-8.7983979,115.1728786,'2018-05-24 09:03:40','2018-05-24 09:03:40',NULL,NULL),
(12,20,'Asda Studio','08312321321',NULL,'213123','1527152965.jpg','b.jpg','Jl. Bleng Bong Sari, Jimbaran, Kuta Sel., Kabupaten Badung, Bali 80361, Indonesia','Kabupaten Badung','Bali','Kuta Selatan',-8.798375499999999,115.1728589,'2018-05-24 09:09:25','2018-05-24 09:09:25',NULL,NULL),
(13,20,'Ui Studio','08921312321',NULL,NULL,NULL,'a.jpg','Jl. Bleng Bong Sari, Jimbaran, Kuta Sel., Kabupaten Badung, Bali 80361, Indonesia','Kabupaten Badung','Bali','Kuta Selatan',-8.7983101,115.17287580000001,'2018-05-24 09:58:28','2018-05-24 09:58:28',NULL,NULL),
(14,24,'Hanuman Studio','0893213212',NULL,'55352131299','1527177325.jpg','1527177325.jpg','Panjer, Kota Denpasar, Bali, Indonesia','Denpasar Timur','Kota Denpasar','Sumerta Kelod',-8.6664729,115.23337700000002,'2018-05-24 15:55:26','2018-05-24 15:55:26',NULL,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `foto_user` varchar(100) DEFAULT NULL,
  `previlege` tinyint(4) DEFAULT NULL,
  `verified` tinyint(4) DEFAULT NULL,
  `confirmed` tinyint(4) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `banned` tinyint(4) DEFAULT NULL,
  `status_online` enum('online','offline') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`email`,`password`,`name`,`telp`,`alamat`,`foto_user`,`previlege`,`verified`,`confirmed`,`remember_token`,`created_at`,`updated_at`,`banned`,`status_online`) values 
(1,'admin','$2y$10$VVBMJFDP2K/NHvcjzGywrOnq4I2uwS9amJe2Jz1/z19U9UKJxTia6','admin','083213213',NULL,'admin.png',2,NULL,NULL,'WCPLAt6BrfUFZN1LBuaw3TJjXucZaQ0YrOFLSMrxmGpIaro1Iavdw99wHjXq','2018-05-21 17:13:35','2018-03-29 15:42:39',NULL,NULL),
(2,'gusyana12asd24@gmail.com','$2y$10$Mw2Y4cGA8M5jBBeDi1mk8OEXVP/.f..2q8gOZ3BxpsE9JI5JCezka','dsa','083213213',NULL,NULL,0,0,1,NULL,'2018-05-23 05:06:39','2018-05-17 13:14:11',NULL,NULL),
(3,'gusyana1224@gmail.com','$2y$10$r4BXr/n2eAoTX5ijx/.nI./hD0eb57TAaLhdbMDKqGX2TbKJCC6ca','asd','083213213',NULL,NULL,0,0,0,'PmI5Ky8XDd3sE0W6fpu6D7lzCZROG9J9bRisFvzVp6YgrUT6xK5uPAr0Mlm1','2018-05-24 08:49:31','2018-05-24 00:39:19',NULL,'offline'),
(4,'asd@ads.asd','$2y$10$a5gku.jukG6uWkqbe4mPSe1RTV1y1hZSfz3SRck6ZKFwNsqtEZtw.','asdasd','083213213',NULL,NULL,0,0,0,NULL,'2018-05-23 05:06:38','2018-05-21 07:36:48',NULL,NULL),
(5,'asd@a2ds.asd','$2y$10$jFo02zX7PjZtmVGGgEgex.FZCqUuEC0IgiXusygdqx.cVTcuGc7tC','asdasd','083213213',NULL,NULL,0,0,0,'uuh1iGA9LfWTab0Yb9WQNUALceRawgmV66c8RZuuXLeSlYM3gTQfuXbn5CQh','2018-05-23 05:06:38','2018-03-29 16:44:31',NULL,NULL),
(8,'asd@ads.asd','$2y$10$bg08QHmIV0JwftfWFMNnpuFwOendUKbT6AIStGAIqSvYjDbn91bvi','sadsad','087943343',NULL,'aa.jpg',1,0,0,NULL,'2018-04-11 14:33:09','2018-03-31 17:08:52',NULL,NULL),
(9,'asd@ads.asd','$2y$10$D9p5dUanL3gTJaVwPwE8o.Gh0/73cTI2xoO9E5dYLoK/CGJPZlPqa','sadsad','083213213',NULL,'ab.jpg',1,0,0,'clJfE6NT9rAOlBjFJlZjvvgIxFkFfPwikNUbsTKtnyItWGsu6RydUlauV27A','2018-04-11 14:33:16','2018-03-31 17:12:37',NULL,NULL),
(12,'sadsad@sadsa.sdasd','$2y$10$nUkRoQKsOT0bqymxhqf6u.HjPr2uOEbpb79gRMj2Nr4Zwk52cNvQG','ssadsad','087367433',NULL,'ac.jpg',1,0,1,'BU5gEl4ODiUcf4IaOM7cNQR0r2PoEwnERmE8troahj9PGa6SZkMqpKLdmoP1','2018-04-11 14:33:18','2018-03-31 17:12:30',NULL,NULL),
(14,'asd@ads.asdasdsad','$2y$10$.Nt92vLcsoIUbApDQ41ABOEirKfiFURwpqgov7vASXdqQVJXH7k8.','Yoi','083213213',NULL,'ad.jpg',1,0,1,'tR6xAtxWz42TS2xejmeDfmVNKTDR6iHDulz2KUHzfXneLqmzyyLiI5uvXnBU','2018-04-11 14:33:20','2018-03-31 18:30:21',NULL,NULL),
(15,'asd@ads.asd123','$2y$10$DRUBOwLT.VqratrTMkjmxuQZ3UN08glS/8KuCQBGJJ/eH9.bNX2Da','asdsad','083213213',NULL,'ae.jpg',1,0,1,'oqwBEcbAgWBDHCn7Ld1rZH792vQOoBTJTrSsPH1qEPIv1OrfSvCVIL5YEQDc','2018-04-11 14:33:22','2018-03-31 17:10:22',NULL,NULL),
(16,'a@b.cd','$2y$10$PZtLGWOQOnzef7yZ90AarO54hRYstt0VRKwNrVfwAjnfPJPjAkIQ6','Anjay','083213213',NULL,NULL,0,NULL,0,'YrDLWsMrLYskyt7o3wK7GDWT9RI6Bb5BwKU2VIJG4PmLrwsfyNFgkTTXPXfi','2018-05-21 15:47:20','2018-05-21 07:47:20',NULL,NULL),
(17,'mimplig123@gmail.com','$2y$10$YX4CIbjillAa4zjZGKv0aeL9L7pdamKwnBQKpbhyEk71qIbseXbe2','Mantap Studio','083213122',NULL,'af.jpg',1,1,1,'MPqZ7gU0zQm71HpZuoF6vAlbw8HoTc8FSavmwgDMf3LcQcJhW5ILdcFwTDxm','2018-04-11 14:33:25','2018-04-02 08:24:24',NULL,NULL),
(18,'baguspramana17@gmail.com','$2y$10$F02ZpCDHgz9VYQ7a1Tt76O8/7UpK.bwi.L.AvbmBnThuCypVLsqha','anjing','083213213',NULL,'ag.jpg',1,0,1,'17HcJsCOof2dQq6lhasm1sjsPGzQSXKLpN7sDrjvOIcKZ2MY3uFf7iy8kA4s','2018-04-11 14:33:27','2018-04-02 10:00:58',NULL,NULL),
(19,'asdsad@sd.dsaasd','$2y$10$7.0KFkPviDQqMnJ..HLMVeHCamkPY6mtEKiRmjrt3SwykOEdH.iIe','sad','083213213',NULL,NULL,0,NULL,NULL,'KAldsSoxEF2JOlbe7JQs4cqyZp264KN5aPX0uPmwOE6OrrpxyZAkajseArDi','2018-04-11 14:32:33','2018-04-06 17:21:25',NULL,NULL),
(20,'gusyana124@gmail.com','$2y$10$GjHQEsJwsLDTaF9wUb9TvOEfLxeYeelKP000tsmIchF6Xe6GBNBIK','anjuy','0932131234','Jalan Tondano, Gang Agung No.3','ah.jpg',1,1,1,'ntJFFPAdCNjxEedASb3LPr7cIMKcVfSfYQ5Yoy23pV5dm3WHASVhEnKjKBvc','2018-05-25 05:17:11','2018-05-24 21:17:11',0,'online'),
(21,'saddasdsasa@dsa.asd','$2y$10$nLPRTO0/7KRBJiIUwPCx6uwbwJICv20FWXSlm6WTHIumZ6kiIvYVG','anjing',NULL,NULL,NULL,0,1,1,NULL,'2018-05-15 17:27:24','2018-05-07 06:21:30',NULL,NULL),
(22,'sadsa2@sasd.asd','$2y$10$IVxrQnxyFuGjCRqrwEgnUeOJsfvfx0kVd5WPLM/w5Ua.uMZy/Kc/u','nasi',NULL,NULL,NULL,0,NULL,NULL,'9E0LXImDfKWSfClGkFRWeCOvqcgWBglB4cU42lx1iZT1mKblX9jiCUh6KzRu','2018-05-23 13:21:07','2018-05-23 05:13:12',NULL,NULL),
(23,'sadsa2@sasd.asd2','$2y$10$ii9Gaug0sTsFz9flI7RWHehNArtvGW.OUO.qWCJWOobI31PScI0Mq','sada','123123',NULL,NULL,0,0,0,'tIcF27KVm5ZrIevotMt7x7XivpGalppDVdAR4OvgxqBW27vzMvSJiwyoTFqZ','2018-05-24 06:06:43','2018-05-23 20:07:01',NULL,'offline'),
(24,'mimplig12@gmail.com','$2y$10$r37.ouZe1xQgduPiqhYoTOxqOkNL8xJrVDJAlsyC2BIV/8lvmr0LG',NULL,'0893213212',NULL,NULL,1,0,0,'DbATW9xshCZNsi0MPVl0tKqfXkPGKebZS1Ew1uj0zduGzm5UjSOzGmML3iVI','2018-05-25 00:05:49','2018-05-24 16:05:49',NULL,'offline');

/*!50106 set global event_scheduler = 1*/;

/* Event structure for event `cancel_booking` */

/*!50106 DROP EVENT IF EXISTS `cancel_booking`*/;

DELIMITER $$

/*!50106 CREATE DEFINER=`root`@`localhost` EVENT `cancel_booking` ON SCHEDULE EVERY 1 SECOND STARTS '2017-11-05 00:19:35' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
	UPDATE tb_booking
	SET `status` = 'batal'
	WHERE tgl_jam_booking < DATE_SUB(NOW(), INTERVAL 30 minute)
	AND `status` = 'pending';
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
