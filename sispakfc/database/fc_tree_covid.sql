/*
SQLyog Ultimate v9.50 
MySQL - 5.5.5-10.1.29-MariaDB : Database - fc_tree_covid
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `tb_admin` */

DROP TABLE IF EXISTS `tb_admin`;

CREATE TABLE `tb_admin` (
  `user` varchar(16) NOT NULL,
  `pass` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_admin` */

insert  into `tb_admin`(`user`,`pass`) values ('admin','admin'),('user','user');

/*Table structure for table `tb_diagnosa` */

DROP TABLE IF EXISTS `tb_diagnosa`;

CREATE TABLE `tb_diagnosa` (
  `kode_diagnosa` varchar(16) NOT NULL,
  `nama_diagnosa` varchar(255) DEFAULT NULL,
  `detail` text,
  `solusi` text,
  PRIMARY KEY (`kode_diagnosa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_diagnosa` */

insert  into `tb_diagnosa`(`kode_diagnosa`,`nama_diagnosa`,`detail`,`solusi`) values ('D01','Pasien Dalam Pengawasan (PDP)','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n- Lorem ipsum dolor sit amet\r\n- Lorem ipsum dolor sit amet\r\n- Lorem ipsum dolor sit amet','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),('D02','Orang Dalam Pemantauan (ODP)','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n- Lorem ipsum dolor sit amet\r\n- Lorem ipsum dolor sit amet\r\n- Lorem ipsum dolor sit amet','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),('D03','Orang dengan Resiko Rendah Terkena COVID-19','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n- Lorem ipsum dolor sit amet\r\n- Lorem ipsum dolor sit amet\r\n- Lorem ipsum dolor sit amet','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),('D04','Nagatif','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n- Lorem ipsum dolor sit amet\r\n- Lorem ipsum dolor sit amet\r\n- Lorem ipsum dolor sit amet','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

/*Table structure for table `tb_gejala` */

DROP TABLE IF EXISTS `tb_gejala`;

CREATE TABLE `tb_gejala` (
  `kode_gejala` varchar(16) NOT NULL,
  `nama_gejala` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kode_gejala`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_gejala` */

insert  into `tb_gejala`(`kode_gejala`,`nama_gejala`) values ('G001','Mengalami Demam / Riwayat Demam'),('G002','Mengalami Batuk / Pilek / Sakit Tenggorokan / Sesak Napas'),('G003','Mengalami ISPA Berat / Pneumonia Berat'),('G004','Memiliki Riwayat perjalanan atau tinggal di luar negeri yang melaporkan transmisi local 14 hari sebelum muncul gejala'),('G005','Memiliki Riwayat perjalanan atau tinggal di area transmisi local di Indonesia 14 hari sebelum muncul gejala'),('G006','Memiliki Riwayat kontak langsung dengan kasus konfirmasi atau probable COVID-19');

/*Table structure for table `tb_konsultasi` */

DROP TABLE IF EXISTS `tb_konsultasi`;

CREATE TABLE `tb_konsultasi` (
  `id_rule` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(16) DEFAULT NULL,
  `jawaban` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id_rule`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_konsultasi` */

insert  into `tb_konsultasi`(`id_rule`,`kode`,`jawaban`) values (1,'G001','Ya'),(2,'G002','Tidak');

/*Table structure for table `tb_rule` */

DROP TABLE IF EXISTS `tb_rule`;

CREATE TABLE `tb_rule` (
  `id_rule` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(16) DEFAULT NULL,
  `jenis` varchar(16) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `child` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id_rule`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `tb_rule` */

insert  into `tb_rule`(`id_rule`,`kode`,`jenis`,`parent`,`child`) values (1,'G001','tanya',0,'ya'),(2,'G002','tanya',1,'ya'),(3,'G003','tanya',2,'ya'),(4,'G004','tanya',3,'ya'),(5,'G005','tanya',4,'ya'),(6,'G006','tanya',5,'ya'),(7,'D01','diagnosa',6,'ya'),(8,'D01','diagnosa',6,'tidak'),(9,'D01','diagnosa',5,'tidak'),(10,'D03','diagnosa',4,'tidak'),(11,'G004','tanya',3,'tidak'),(12,'G005','tanya',11,'ya'),(13,'D02','diagnosa',12,'ya'),(14,'D02','diagnosa',12,'tidak'),(15,'D03','diagnosa',11,'tidak'),(16,'D04','diagnosa',2,'tidak'),(17,'D04','diagnosa',1,'tidak');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
