/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.9-MariaDB : Database - koperasi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`koperasi` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `koperasi`;

/*Table structure for table `anggota` */

DROP TABLE IF EXISTS `anggota`;

CREATE TABLE `anggota` (
  `id_anggota` char(5) NOT NULL,
  `namaanggota` varchar(50) NOT NULL,
  `jk` char(2) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `hp` char(12) NOT NULL,
  PRIMARY KEY (`id_anggota`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `anggota` */

insert  into `anggota`(`id_anggota`,`namaanggota`,`jk`,`tempat_lahir`,`tgl_lahir`,`alamat`,`hp`) values ('A0001','Agus','L','bandung','1989-01-01','jl kalipah','089292929278');
insert  into `anggota`(`id_anggota`,`namaanggota`,`jk`,`tempat_lahir`,`tgl_lahir`,`alamat`,`hp`) values ('A0002','Gian','L','Tasikmalaya','2017-03-05','Tasikmalaya','081223487689');
insert  into `anggota`(`id_anggota`,`namaanggota`,`jk`,`tempat_lahir`,`tgl_lahir`,`alamat`,`hp`) values ('A0003','Gilang','L','Subang','2017-03-05','Subang','081276476667');
insert  into `anggota`(`id_anggota`,`namaanggota`,`jk`,`tempat_lahir`,`tgl_lahir`,`alamat`,`hp`) values ('A0004','Whita','P','Palembang','2017-03-01','Palembang','085567456444');

/*Table structure for table `jenis_simpan` */

DROP TABLE IF EXISTS `jenis_simpan`;

CREATE TABLE `jenis_simpan` (
  `id_jenis` char(5) NOT NULL,
  `jenis_simpanan` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `jenis_simpan` */

insert  into `jenis_simpan`(`id_jenis`,`jenis_simpanan`,`jumlah`) values ('J0002','Simpanan Wajib',30000);
insert  into `jenis_simpan`(`id_jenis`,`jenis_simpanan`,`jumlah`) values ('J0003','Simpanan Sukarela',0);

/*Table structure for table `pengambilan` */

DROP TABLE IF EXISTS `pengambilan`;

CREATE TABLE `pengambilan` (
  `id_ambil` char(5) NOT NULL,
  `tgl` date NOT NULL,
  `id_anggota` char(5) NOT NULL,
  `id_jenis` char(5) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id_ambil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `pengambilan` */

insert  into `pengambilan`(`id_ambil`,`tgl`,`id_anggota`,`id_jenis`,`jumlah`) values ('T0001','2017-04-04','A0001','J0002',50000);

/*Table structure for table `pesan` */

DROP TABLE IF EXISTS `pesan`;

CREATE TABLE `pesan` (
  `id_pesan` int(5) NOT NULL AUTO_INCREMENT,
  `id_anggota` char(5) NOT NULL,
  `isi_pesan` text NOT NULL,
  PRIMARY KEY (`id_pesan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pesan` */

/*Table structure for table `pesan_admin` */

DROP TABLE IF EXISTS `pesan_admin`;

CREATE TABLE `pesan_admin` (
  `id_pesan_a` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(5) NOT NULL,
  `isi_pesan` text,
  PRIMARY KEY (`id_pesan_a`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pesan_admin` */

/*Table structure for table `pinjaman_detail` */

DROP TABLE IF EXISTS `pinjaman_detail`;

CREATE TABLE `pinjaman_detail` (
  `id_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_pinjam` char(5) NOT NULL,
  `cicilan` smallint(6) NOT NULL,
  `angsuran` int(11) NOT NULL,
  `bunga` int(11) NOT NULL,
  `tgl_jatuh_tempo` date DEFAULT NULL,
  `tgl_bayar` date NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=MyISAM AUTO_INCREMENT=253 DEFAULT CHARSET=latin1;

/*Data for the table `pinjaman_detail` */

insert  into `pinjaman_detail`(`id_detail`,`id_pinjam`,`cicilan`,`angsuran`,`bunga`,`tgl_jatuh_tempo`,`tgl_bayar`,`jumlah_bayar`) values (191,'P0001',5,25000,3000,'2017-09-04','2017-09-04',28000);
insert  into `pinjaman_detail`(`id_detail`,`id_pinjam`,`cicilan`,`angsuran`,`bunga`,`tgl_jatuh_tempo`,`tgl_bayar`,`jumlah_bayar`) values (190,'P0001',4,25000,3000,'2017-08-04','2017-08-04',28000);
insert  into `pinjaman_detail`(`id_detail`,`id_pinjam`,`cicilan`,`angsuran`,`bunga`,`tgl_jatuh_tempo`,`tgl_bayar`,`jumlah_bayar`) values (189,'P0001',3,25000,3000,'2017-07-04','0000-00-00',0);
insert  into `pinjaman_detail`(`id_detail`,`id_pinjam`,`cicilan`,`angsuran`,`bunga`,`tgl_jatuh_tempo`,`tgl_bayar`,`jumlah_bayar`) values (188,'P0001',2,25000,3000,'2017-06-04','0000-00-00',0);
insert  into `pinjaman_detail`(`id_detail`,`id_pinjam`,`cicilan`,`angsuran`,`bunga`,`tgl_jatuh_tempo`,`tgl_bayar`,`jumlah_bayar`) values (192,'P0001',6,25000,3000,'2017-10-04','0000-00-00',0);
insert  into `pinjaman_detail`(`id_detail`,`id_pinjam`,`cicilan`,`angsuran`,`bunga`,`tgl_jatuh_tempo`,`tgl_bayar`,`jumlah_bayar`) values (187,'P0001',1,25000,3000,'2017-05-04','0000-00-00',0);
insert  into `pinjaman_detail`(`id_detail`,`id_pinjam`,`cicilan`,`angsuran`,`bunga`,`tgl_jatuh_tempo`,`tgl_bayar`,`jumlah_bayar`) values (234,'P0002',6,33333,4000,'2017-10-05','0000-00-00',0);
insert  into `pinjaman_detail`(`id_detail`,`id_pinjam`,`cicilan`,`angsuran`,`bunga`,`tgl_jatuh_tempo`,`tgl_bayar`,`jumlah_bayar`) values (233,'P0002',5,33333,4000,'2017-09-05','0000-00-00',0);
insert  into `pinjaman_detail`(`id_detail`,`id_pinjam`,`cicilan`,`angsuran`,`bunga`,`tgl_jatuh_tempo`,`tgl_bayar`,`jumlah_bayar`) values (232,'P0002',4,33333,4000,'2017-08-05','0000-00-00',0);
insert  into `pinjaman_detail`(`id_detail`,`id_pinjam`,`cicilan`,`angsuran`,`bunga`,`tgl_jatuh_tempo`,`tgl_bayar`,`jumlah_bayar`) values (231,'P0002',3,33333,4000,'2017-07-05','0000-00-00',0);
insert  into `pinjaman_detail`(`id_detail`,`id_pinjam`,`cicilan`,`angsuran`,`bunga`,`tgl_jatuh_tempo`,`tgl_bayar`,`jumlah_bayar`) values (230,'P0002',2,33333,4000,'2017-06-05','0000-00-00',0);
insert  into `pinjaman_detail`(`id_detail`,`id_pinjam`,`cicilan`,`angsuran`,`bunga`,`tgl_jatuh_tempo`,`tgl_bayar`,`jumlah_bayar`) values (229,'P0002',1,33333,4000,'2017-05-05','0000-00-00',0);
insert  into `pinjaman_detail`(`id_detail`,`id_pinjam`,`cicilan`,`angsuran`,`bunga`,`tgl_jatuh_tempo`,`tgl_bayar`,`jumlah_bayar`) values (252,'P0004',6,166667,20000,'2017-10-05','0000-00-00',0);
insert  into `pinjaman_detail`(`id_detail`,`id_pinjam`,`cicilan`,`angsuran`,`bunga`,`tgl_jatuh_tempo`,`tgl_bayar`,`jumlah_bayar`) values (251,'P0004',5,166667,20000,'2017-09-05','0000-00-00',0);
insert  into `pinjaman_detail`(`id_detail`,`id_pinjam`,`cicilan`,`angsuran`,`bunga`,`tgl_jatuh_tempo`,`tgl_bayar`,`jumlah_bayar`) values (250,'P0004',4,166667,20000,'2017-08-05','0000-00-00',0);
insert  into `pinjaman_detail`(`id_detail`,`id_pinjam`,`cicilan`,`angsuran`,`bunga`,`tgl_jatuh_tempo`,`tgl_bayar`,`jumlah_bayar`) values (249,'P0004',3,166667,20000,'2017-07-05','0000-00-00',0);
insert  into `pinjaman_detail`(`id_detail`,`id_pinjam`,`cicilan`,`angsuran`,`bunga`,`tgl_jatuh_tempo`,`tgl_bayar`,`jumlah_bayar`) values (248,'P0004',2,166667,20000,'2017-06-05','0000-00-00',0);
insert  into `pinjaman_detail`(`id_detail`,`id_pinjam`,`cicilan`,`angsuran`,`bunga`,`tgl_jatuh_tempo`,`tgl_bayar`,`jumlah_bayar`) values (247,'P0004',1,166667,20000,'2017-05-05','0000-00-00',0);
insert  into `pinjaman_detail`(`id_detail`,`id_pinjam`,`cicilan`,`angsuran`,`bunga`,`tgl_jatuh_tempo`,`tgl_bayar`,`jumlah_bayar`) values (246,'P0003',12,416667,100000,'2018-04-05','0000-00-00',0);
insert  into `pinjaman_detail`(`id_detail`,`id_pinjam`,`cicilan`,`angsuran`,`bunga`,`tgl_jatuh_tempo`,`tgl_bayar`,`jumlah_bayar`) values (245,'P0003',11,416667,100000,'2018-03-05','0000-00-00',0);
insert  into `pinjaman_detail`(`id_detail`,`id_pinjam`,`cicilan`,`angsuran`,`bunga`,`tgl_jatuh_tempo`,`tgl_bayar`,`jumlah_bayar`) values (244,'P0003',10,416667,100000,'2018-02-05','0000-00-00',0);
insert  into `pinjaman_detail`(`id_detail`,`id_pinjam`,`cicilan`,`angsuran`,`bunga`,`tgl_jatuh_tempo`,`tgl_bayar`,`jumlah_bayar`) values (243,'P0003',9,416667,100000,'2018-01-05','0000-00-00',0);
insert  into `pinjaman_detail`(`id_detail`,`id_pinjam`,`cicilan`,`angsuran`,`bunga`,`tgl_jatuh_tempo`,`tgl_bayar`,`jumlah_bayar`) values (242,'P0003',8,416667,100000,'2017-12-05','0000-00-00',0);
insert  into `pinjaman_detail`(`id_detail`,`id_pinjam`,`cicilan`,`angsuran`,`bunga`,`tgl_jatuh_tempo`,`tgl_bayar`,`jumlah_bayar`) values (241,'P0003',7,416667,100000,'2017-11-05','0000-00-00',0);
insert  into `pinjaman_detail`(`id_detail`,`id_pinjam`,`cicilan`,`angsuran`,`bunga`,`tgl_jatuh_tempo`,`tgl_bayar`,`jumlah_bayar`) values (240,'P0003',6,416667,100000,'2017-10-05','0000-00-00',0);
insert  into `pinjaman_detail`(`id_detail`,`id_pinjam`,`cicilan`,`angsuran`,`bunga`,`tgl_jatuh_tempo`,`tgl_bayar`,`jumlah_bayar`) values (239,'P0003',5,416667,100000,'2017-09-05','0000-00-00',0);
insert  into `pinjaman_detail`(`id_detail`,`id_pinjam`,`cicilan`,`angsuran`,`bunga`,`tgl_jatuh_tempo`,`tgl_bayar`,`jumlah_bayar`) values (238,'P0003',4,416667,100000,'2017-08-05','0000-00-00',0);
insert  into `pinjaman_detail`(`id_detail`,`id_pinjam`,`cicilan`,`angsuran`,`bunga`,`tgl_jatuh_tempo`,`tgl_bayar`,`jumlah_bayar`) values (237,'P0003',3,416667,100000,'2017-07-05','0000-00-00',0);
insert  into `pinjaman_detail`(`id_detail`,`id_pinjam`,`cicilan`,`angsuran`,`bunga`,`tgl_jatuh_tempo`,`tgl_bayar`,`jumlah_bayar`) values (236,'P0003',2,416667,100000,'2017-06-05','0000-00-00',0);
insert  into `pinjaman_detail`(`id_detail`,`id_pinjam`,`cicilan`,`angsuran`,`bunga`,`tgl_jatuh_tempo`,`tgl_bayar`,`jumlah_bayar`) values (235,'P0003',1,416667,100000,'2017-05-05','0000-00-00',0);

/*Table structure for table `pinjaman_header` */

DROP TABLE IF EXISTS `pinjaman_header`;

CREATE TABLE `pinjaman_header` (
  `id_pinjam` char(5) NOT NULL,
  `tgl` date NOT NULL,
  `id_anggota` char(5) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `lama` smallint(6) NOT NULL,
  `status` enum('T','S','Y') NOT NULL,
  PRIMARY KEY (`id_pinjam`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `pinjaman_header` */

insert  into `pinjaman_header`(`id_pinjam`,`tgl`,`id_anggota`,`jumlah`,`lama`,`status`) values ('P0001','2017-04-04','A0001',150000,6,'Y');
insert  into `pinjaman_header`(`id_pinjam`,`tgl`,`id_anggota`,`jumlah`,`lama`,`status`) values ('P0002','2017-04-05','A0001',200000,6,'Y');
insert  into `pinjaman_header`(`id_pinjam`,`tgl`,`id_anggota`,`jumlah`,`lama`,`status`) values ('P0003','2017-04-05','A0001',5000000,12,'Y');
insert  into `pinjaman_header`(`id_pinjam`,`tgl`,`id_anggota`,`jumlah`,`lama`,`status`) values ('P0004','2017-04-05','A0002',1000000,6,'Y');

/*Table structure for table `profile` */

DROP TABLE IF EXISTS `profile`;

CREATE TABLE `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `koperasi` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `hp` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `profile` */

insert  into `profile`(`id`,`koperasi`,`alamat`,`kota`,`hp`,`email`) values (1,'Koperasi Simpan Pinjam Produksi','Jl. industri selatan 1B No 1-4 blok HH Kawasan Industri Jababeka II Cikarang,Bekasi 17550','bekasi','081290065670','aguskusnawandara16@gmail.com');

/*Table structure for table `simpanan` */

DROP TABLE IF EXISTS `simpanan`;

CREATE TABLE `simpanan` (
  `id_simpanan` char(5) NOT NULL,
  `tgl` date NOT NULL,
  `id_anggota` char(5) NOT NULL,
  `id_jenis` char(5) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id_simpanan`),
  KEY `noanggota` (`id_anggota`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `simpanan` */

insert  into `simpanan`(`id_simpanan`,`tgl`,`id_anggota`,`id_jenis`,`jumlah`) values ('S0014','2017-05-01','A0005','J0002',50000);
insert  into `simpanan`(`id_simpanan`,`tgl`,`id_anggota`,`id_jenis`,`jumlah`) values ('S0013','2017-04-01','A0005','J0002',50000);
insert  into `simpanan`(`id_simpanan`,`tgl`,`id_anggota`,`id_jenis`,`jumlah`) values ('S0012','2017-04-11','A0004','J0003',200000);
insert  into `simpanan`(`id_simpanan`,`tgl`,`id_anggota`,`id_jenis`,`jumlah`) values ('S0011','2017-05-28','A0004','J0002',50000);
insert  into `simpanan`(`id_simpanan`,`tgl`,`id_anggota`,`id_jenis`,`jumlah`) values ('S0010','2017-03-28','A0004','J0002',50000);
insert  into `simpanan`(`id_simpanan`,`tgl`,`id_anggota`,`id_jenis`,`jumlah`) values ('S0009','2017-04-04','A0003','J0003',100000);
insert  into `simpanan`(`id_simpanan`,`tgl`,`id_anggota`,`id_jenis`,`jumlah`) values ('S0008','2017-05-07','A0003','J0002',50000);
insert  into `simpanan`(`id_simpanan`,`tgl`,`id_anggota`,`id_jenis`,`jumlah`) values ('S0007','2017-04-06','A0003','J0002',50000);
insert  into `simpanan`(`id_simpanan`,`tgl`,`id_anggota`,`id_jenis`,`jumlah`) values ('S0006','2017-04-13','A0002','J0003',200000);
insert  into `simpanan`(`id_simpanan`,`tgl`,`id_anggota`,`id_jenis`,`jumlah`) values ('S0005','2017-05-06','A0002','J0002',50000);
insert  into `simpanan`(`id_simpanan`,`tgl`,`id_anggota`,`id_jenis`,`jumlah`) values ('S0004','2017-04-06','A0002','J0002',50000);
insert  into `simpanan`(`id_simpanan`,`tgl`,`id_anggota`,`id_jenis`,`jumlah`) values ('S0003','2017-04-04','A0001','J0003',150000);
insert  into `simpanan`(`id_simpanan`,`tgl`,`id_anggota`,`id_jenis`,`jumlah`) values ('S0002','2017-05-01','A0001','J0002',50000);
insert  into `simpanan`(`id_simpanan`,`tgl`,`id_anggota`,`id_jenis`,`jumlah`) values ('S0001','2017-04-01','A0001','J0002',50000);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `namalengkap` varchar(100) DEFAULT NULL,
  `level` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`user_id`,`password`,`namalengkap`,`level`) values (0,'admin','21232f297a57a5a743894a0e4a801fc3','Administrator','super admin');
insert  into `users`(`id`,`user_id`,`password`,`namalengkap`,`level`) values (2,'A0001','d8578edf8458ce06fbc5bb76a58c5ca4','agus','anggota');
insert  into `users`(`id`,`user_id`,`password`,`namalengkap`,`level`) values (3,'A0002','427839dd15c75a05abd5da6563e06ca9','Gian','anggota');

/* Trigger structure for table `pinjaman_detail` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `kurangi_jumlah` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `kurangi_jumlah` AFTER INSERT ON `pinjaman_detail` FOR EACH ROW BEGIN
update pinjaman_header SET jumlah= jumlah - NEW.jumlah_bayar ;
END */$$


DELIMITER ;

/* Trigger structure for table `pinjaman_header` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `kurangi_pinjaman` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `kurangi_pinjaman` AFTER INSERT ON `pinjaman_header` FOR EACH ROW BEGIN 
UPDATE pinjaman_header SET jumlah=jumlah-New.jumlah WHERE id_pinjam=NEw.id_pinjam;
END */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
