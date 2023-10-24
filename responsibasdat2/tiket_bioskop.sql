/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.27-MariaDB : Database - tiket_bioskop
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tiket_bioskop` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `tiket_bioskop`;

/*Table structure for table `film` */

DROP TABLE IF EXISTS `film`;

CREATE TABLE `film` (
  `id_film` varchar(25) NOT NULL,
  `judul_film` varchar(255) DEFAULT NULL,
  `sutradara` varchar(255) DEFAULT NULL,
  `pemain_utama` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `durasi` varchar(255) DEFAULT NULL,
  `poster` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_film`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `film` */

insert  into `film`(`id_film`,`judul_film`,`sutradara`,`pemain_utama`,`genre`,`durasi`,`poster`) values 
('F1','Dear Nathan','Indra Gunawan','Amanda Rawles','Drama Remaja','1 jam 35 menit','dearnathan.jpg'),
('F10','Mars Needs Moms','Simon Wells','Seth Green','Fiksi Ilmiah','1 jam 32 menit','marsneedsmoms.jpg'),
('F11','R: Raja, Ratu & Rahasia','Findo Purwono HW','Aurora Ribero','Drama','1 jam 38 menit','rajaratudanrahasia.jpg'),
('F12','Flipped','Rob Reiner','Madeline Carroll','Roman','1 jam 30 menit','flipped.jpg'),
('F2','Beauty and the Best','Andri Sofyansyah','Andania Suri','Drama Komedi Remaja','1 jam 42 menit','BeautyandtheBest.jpg'),
('F3','Total Chaos','Angling Sagaran','Ricky Harun','Drama Komedi Romantis','1 jam 20 menit','totalchaos.jpg'),
('F4','Hannah Montana: The Movie','Peter Chelsom','Miley Cyrus','Komedi Musikal','1 jam 42 menit','hannahmontana.jpg'),
('F5','Bridge to Terabithia','Gabor Csupo','Josh Hutcherson','Fantasi','1 jam 36 menit','bridgetoterabithia.jpg'),
('F6','The Adventures of Tintin: The Secret of the Unicorn','Steven Spielberg','Jamie Bell','Petualangan','1 jam 47 menit','tintin.jpg'),
('F7','Her Blue Sky','Tatsuyuki Nagai','Shion Wakayama','Animasi','1 jam 47 menit','herbluesky.jpg'),
('F8','Ralph Breaks the Internet','Rich Moore','John C. Reilly','Komedi','1 jam 56 menit','ralph.jpg'),
('F9','Turning Red','Domee Shi','Rosalie Chiang','Komedi','1 jam 40 menit','turningred.jpg');

/*Table structure for table `jadwal_tayang` */

DROP TABLE IF EXISTS `jadwal_tayang`;

CREATE TABLE `jadwal_tayang` (
  `id_jadwal` varchar(25) NOT NULL,
  `id_film` varchar(25) NOT NULL,
  `id_studio` varchar(25) NOT NULL,
  `tanggal_tayang` date DEFAULT NULL,
  `jam_tayang` time DEFAULT NULL,
  `harga_tiket` int(11) DEFAULT NULL,
  `jumlah_tiket_tersedia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_jadwal`),
  KEY `id_film` (`id_film`),
  KEY `id_studio` (`id_studio`),
  CONSTRAINT `jadwal_tayang_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `jadwal_tayang_ibfk_2` FOREIGN KEY (`id_studio`) REFERENCES `studio` (`id_studio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `jadwal_tayang` */

insert  into `jadwal_tayang`(`id_jadwal`,`id_film`,`id_studio`,`tanggal_tayang`,`jam_tayang`,`harga_tiket`,`jumlah_tiket_tersedia`) values 
('J1','F1','STD1','2023-04-05','16:00:00',35000,72),
('J10','F10','STD5','2023-04-09','19:00:00',35000,75),
('J11','F11','STD5','2023-04-14','15:00:00',35000,75),
('J12','F11','STD6','2023-04-12','17:00:00',35000,73),
('J13','F12','STD6','2023-04-14','16:00:00',35000,75),
('J2','F2','STD1','2023-04-05','19:00:00',35000,69),
('J3','F3','STD2','2023-04-06','12:00:00',35000,72),
('J4','F4','STD2','2023-04-06','15:00:00',35000,74),
('J5','F5','STD3','2023-04-07','16:00:00',35000,75),
('J6','F6','STD3','2023-04-07','19:00:00',35000,75),
('J7','F7','STD4','2023-04-08','12:00:00',35000,75),
('J8','F8','STD4','2023-04-08','15:00:00',35000,73),
('J9','F9','STD5','2023-04-09','16:00:00',35000,73);

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(25) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `nomor_telepon` varchar(20) DEFAULT NULL,
  `alamat_email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pelanggan` */

insert  into `pelanggan`(`id_pelanggan`,`nama_pelanggan`,`nomor_telepon`,`alamat_email`) values 
('P1','Hana Safitri','081234567890','hansaft@gmail.com'),
('P2','Felix Lee','089887766554','felixlee@gmail.com'),
('P3','Nicha Yontararak','085463721855','nicha@gmail.com'),
('P4','Kai Huening','081278453021','itskai@gmail.com'),
('P5','Avril Ramona','084738291023','avrilr@gmail.com'),
('P6','Joel Smith','081456829356','joel@gmail.com'),
('P7','Alexander Gibbs','081672890156','alexg123@gmail.com');

/*Table structure for table `studio` */

DROP TABLE IF EXISTS `studio`;

CREATE TABLE `studio` (
  `id_studio` varchar(25) NOT NULL,
  `nama_studio` varchar(255) NOT NULL,
  `kapasitas_studio` varchar(25) DEFAULT NULL,
  `tipe_studio` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_studio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `studio` */

insert  into `studio`(`id_studio`,`nama_studio`,`kapasitas_studio`,`tipe_studio`) values 
('STD1','Studio 291','66','Dolby Atmos'),
('STD2','Studio 292','69','Dolby Atmos'),
('STD3','Studio 293','75','Dolby Atmos'),
('STD4','Studio 294','75','Dolby Atmos'),
('STD5','Studio 295','75','Dolby Atmos'),
('STD6','Studio 296','72','Dolby Atmos');

/*Table structure for table `transaksi_pembelian_tiket` */

DROP TABLE IF EXISTS `transaksi_pembelian_tiket`;

CREATE TABLE `transaksi_pembelian_tiket` (
  `id_transaksi` varchar(25) NOT NULL,
  `id_film` varchar(25) NOT NULL,
  `id_jadwal` varchar(25) NOT NULL,
  `id_studio` varchar(25) NOT NULL,
  `id_pelanggan` varchar(25) NOT NULL,
  `jumlah_tiket` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `waktu_pembelian` datetime DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `id_film` (`id_film`),
  KEY `id_studio` (`id_studio`),
  KEY `id_jadwal` (`id_jadwal`),
  KEY `id_pelanggan` (`id_pelanggan`),
  CONSTRAINT `transaksi_pembelian_tiket_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `transaksi_pembelian_tiket_ibfk_2` FOREIGN KEY (`id_studio`) REFERENCES `studio` (`id_studio`),
  CONSTRAINT `transaksi_pembelian_tiket_ibfk_3` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_tayang` (`id_jadwal`),
  CONSTRAINT `transaksi_pembelian_tiket_ibfk_4` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `transaksi_pembelian_tiket` */

insert  into `transaksi_pembelian_tiket`(`id_transaksi`,`id_film`,`id_jadwal`,`id_studio`,`id_pelanggan`,`jumlah_tiket`,`total_harga`,`waktu_pembelian`) values 
('T1','F1','J1','STD1','P1',2,70000,'2023-04-05 14:25:00'),
('T2','F1','J1','STD1','P2',1,35000,'2023-04-05 14:44:10'),
('T3','F2','J2','STD1','P3',2,70000,'2023-04-05 15:00:05'),
('T4','F2','J2','STD1','P4',4,140000,'2023-04-05 17:35:33'),
('T5','F3','J9','STD2','P6',2,70000,'2023-04-06 23:00:00'),
('T6','F3','J3','STD2','P5',3,105000,'2023-04-06 23:46:00'),
('T7','F4','J4','STD2','P4',1,35000,'2023-04-07 07:25:00'),
('T8','F4','J8','STD6','P7',1,35000,'2023-04-07 13:29:00'),
('T9','F12','J12','STD6','P7',1,35000,'2023-04-12 10:48:00');

/* Trigger structure for table `transaksi_pembelian_tiket` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `update_jumlah_tiket` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `update_jumlah_tiket` AFTER INSERT ON `transaksi_pembelian_tiket` FOR EACH ROW BEGIN
		UPDATE jadwal_tayang
		SET jumlah_tiket_tersedia = jumlah_tiket_tersedia - NEW.jumlah_tiket
		WHERE id_jadwal = NEW.id_jadwal;
    END */$$


DELIMITER ;

/* Trigger structure for table `transaksi_pembelian_tiket` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `update_kapasitas_studio` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `update_kapasitas_studio` AFTER INSERT ON `transaksi_pembelian_tiket` FOR EACH ROW BEGIN
	UPDATE Studio SET kapasitas_studio = kapasitas_studio - NEW.Jumlah_Tiket WHERE Id_Studio = NEW.Id_Studio;
    END */$$


DELIMITER ;

/* Function  structure for function  `hitung_tiket_terjual` */

/*!50003 DROP FUNCTION IF EXISTS `hitung_tiket_terjual` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `hitung_tiket_terjual`(id_jadwal varchar(25)) RETURNS int(11)
BEGIN
	    DECLARE jumlah_tiket_terjual INT;
	    SELECT COUNT(*) INTO jumlah_tiket_terjual FROM transaksi_pembelian_tiket WHERE Id_Jadwal = id_jadwal;
	    RETURN jumlah_tiket_terjual;
    END */$$
DELIMITER ;

/* Function  structure for function  `hitung_total_pendapatan` */

/*!50003 DROP FUNCTION IF EXISTS `hitung_total_pendapatan` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `hitung_total_pendapatan`(tanggal_tayang DATE, judul_film VARCHAR(255)) RETURNS decimal(10,2)
BEGIN
	DECLARE total DECIMAL(10,2);
	SELECT SUM(P.jumlah_tiket * J.harga_tiket) INTO total
	FROM transaksi_pembelian_tiket P
	INNER JOIN jadwal_tayang J ON P.ID_Jadwal = J.id_jadwal
	INNER JOIN Film F ON P.ID_Film = F.id_film
	WHERE J.Tanggal_Tayang = tanggal_tayang AND F.judul_film = judul_film;
	RETURN total;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `delete_film` */

/*!50003 DROP PROCEDURE IF EXISTS  `delete_film` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_film`(idFilm varchar(25))
BEGIN
		delete from film
		where idFilm = id_film;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `delete_jadwal_tayang` */

/*!50003 DROP PROCEDURE IF EXISTS  `delete_jadwal_tayang` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_jadwal_tayang`(idJadwal varchar(25))
BEGIN
		delete from jadwal_tayang
		where idJadwal = id_jadwal;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `delete_pelanggan` */

/*!50003 DROP PROCEDURE IF EXISTS  `delete_pelanggan` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_pelanggan`(idPelanggan varchar(25))
BEGIN
		delete from pelanggan
		where idPelanggan = id_pelanggan;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `delete_studio` */

/*!50003 DROP PROCEDURE IF EXISTS  `delete_studio` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_studio`(idStudio varchar(25))
BEGIN
		delete from studio
		where idStudio = id_studio;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `delete_transaksi_pembelian_tiket` */

/*!50003 DROP PROCEDURE IF EXISTS  `delete_transaksi_pembelian_tiket` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_transaksi_pembelian_tiket`(idTransaksi varchar(25))
BEGIN
		delete from transaksi_pembelian_tiket
		where idTransaksi = id_transaksi;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `insert_film` */

/*!50003 DROP PROCEDURE IF EXISTS  `insert_film` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_film`(
	    id_film varchar(25),
	    judul_film varchar(255),
	    sutradara varchar(255),
	    pemain_utama varchar(255),
	    genre varchar(255),
	    durasi varchar(255),
	    poster varchar(255)
    )
BEGIN
		insert into film values(
			id_film,
			judul_film,
			sutradara,
			pemain_utama,
			genre,
			durasi,
			poster	
		);
	END */$$
DELIMITER ;

/* Procedure structure for procedure `insert_jadwal_tayang` */

/*!50003 DROP PROCEDURE IF EXISTS  `insert_jadwal_tayang` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_jadwal_tayang`(
	    id_jadwal varchar(25),
	    id_film varchar(25),
	    id_studio varchar(25),
	    tanggal_tayang date,
	    jam_tayang time,
	    harga_tiket int,
	    jumlah_tiket_tersedia int
    )
BEGIN
		insert into jadwal_tayang values (
			id_jadwal,
			id_film,
			id_studio,
			tanggal_tayang,
			jam_tayang,
			harga_tiket,
			jumlah_tiket_tersedia
		);
	END */$$
DELIMITER ;

/* Procedure structure for procedure `insert_pelanggan` */

/*!50003 DROP PROCEDURE IF EXISTS  `insert_pelanggan` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_pelanggan`(
	    id_pelanggan varchar(25),
	    nama_pelanggan varchar(255),
	    nomor_telepon varchar(20),
	    alamat_email varchar(255)
    )
BEGIN
		insert into pelanggan values (
			id_pelanggan,
			nama_pelanggan,
			nomor_telepon,
			alamat_email
		);
	END */$$
DELIMITER ;

/* Procedure structure for procedure `insert_studio` */

/*!50003 DROP PROCEDURE IF EXISTS  `insert_studio` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_studio`(
	    id_studio varchar(25),
	    nama_studio varchar(255),
	    kapasitas_studio varchar(25),
	    tipe_studio varchar(255)
    )
BEGIN
		INSERT INTO studio VALUES(
			id_studio,
			nama_studio,
			kapasitas_studio,
			tipe_studio
		);
	END */$$
DELIMITER ;

/* Procedure structure for procedure `insert_transaksi_pembelian_tiket` */

/*!50003 DROP PROCEDURE IF EXISTS  `insert_transaksi_pembelian_tiket` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_transaksi_pembelian_tiket`(
	    id_transaksi varchar(25),
	    id_film varchar(25),
	    id_jadwal varchar(25),
	    id_studio varchar(25),
	    id_pelanggan varchar(25),
	    jumlah_tiket int,
	    total_harga int,
	    waktu_pembelian datetime
    )
BEGIN
		insert into transaksi_pembelian_tiket values (
			id_transaksi,
			id_film,
			id_jadwal,
			id_studio,
			id_pelanggan,
			jumlah_tiket,
			total_harga,
			waktu_pembelian
		);
	END */$$
DELIMITER ;

/* Procedure structure for procedure `tampil_pembelian_tiket` */

/*!50003 DROP PROCEDURE IF EXISTS  `tampil_pembelian_tiket` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `tampil_pembelian_tiket`(IN `waktu_pembelian` DATETIME)
BEGIN
		SELECT
		T.ID_Transaksi,
		P.Nama_Pelanggan,
		T.Waktu_Pembelian,
		J.Tanggal_Tayang,
		J.Jam_Tayang,
		F.Judul_Film,
		S.Nama_Studio,
		S.Tipe_Studio,
		T.Jumlah_Tiket,
		J.Harga_Tiket * T.Jumlah_Tiket AS Total_Harga
	FROM
		transaksi_pembelian_Tiket T
		INNER JOIN Jadwal_Tayang J ON T.ID_Jadwal = J.ID_Jadwal
		INNER JOIN Film F ON T.ID_Film = F.ID_Film
		INNER JOIN Studio S ON T.ID_Studio = S.ID_Studio
		INNER JOIN Pelanggan P ON T.ID_Pelanggan = P.ID_Pelanggan
	WHERE
		T.Waktu_Pembelian = waktu_pembelian;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `update_film` */

/*!50003 DROP PROCEDURE IF EXISTS  `update_film` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `update_film`(
	    idFilm VARCHAR(25),
	    judulFilm VARCHAR(255),
	    strd VARCHAR(255),
	    pemainUtama VARCHAR(255),
	    gnr VARCHAR(255),
	    drs VARCHAR(255),
	    pstr VARCHAR(255)
    )
BEGIN
		update film set
		id_film = idFilm,
		judul_film = judulFilm,
		sutradara = strd,
		pemain_utama = pemainUtama,
		genre = gnr,
		durasi = drs,
		poster = pstr 
		where id_film = idFilm;	
	END */$$
DELIMITER ;

/* Procedure structure for procedure `update_jadwal_tayang` */

/*!50003 DROP PROCEDURE IF EXISTS  `update_jadwal_tayang` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `update_jadwal_tayang`(
	    idJadwal VARCHAR(25),
	    idFilm VARCHAR(25),
	    idStudio VARCHAR(25),
	    tgltayang DATE,
	    jamtayang TIME,
	    hargatiket INT,
	    jmltikettersedia INT    
    )
BEGIN
		update jadwal_tayang set
		id_jadwal = idJadwal,
		id_film = idFilm,
		id_studio = idStudio,
		tanggal_tayang = tgltayang,
		jam_tayang = jamtayang,
		harga_tiket = hargatiket,
		jumlah_tiket_tersedia = jmltikettersedia 
		where id_jadwal = idJadwal;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `update_pelanggan` */

/*!50003 DROP PROCEDURE IF EXISTS  `update_pelanggan` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `update_pelanggan`(
	    idPelanggan VARCHAR(25),
	    namaPelanggan VARCHAR(255),
	    nomorTelepon VARCHAR(20),
	    alamatEmail VARCHAR(255)
    )
BEGIN
		update pelanggan set
		id_pelanggan = idPelanggan,
		nama_pelanggan = namaPelanggan,
		nomor_telepon = nomorTelepon,
		alamat_email = alamatEmail
		where id_pelanggan = idPelanggan;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `update_studio` */

/*!50003 DROP PROCEDURE IF EXISTS  `update_studio` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `update_studio`(
	idStudio VARCHAR(25),
	namaStudio VARCHAR(255),
	kapasitasStudio VARCHAR(25),
	tipeStudio VARCHAR(255)
    )
BEGIN
		update studio set
		id_studio = idStudio,
		nama_studio = namaStudio,
		kapasitas_studio = kapasitasStudio,
		tipe_studio = tipeStudio
		where id_studio = idStudio;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `update_transaksi_pembelian_tiket` */

/*!50003 DROP PROCEDURE IF EXISTS  `update_transaksi_pembelian_tiket` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `update_transaksi_pembelian_tiket`(
	    idTransaksi VARCHAR(25),
	    idFilm VARCHAR(25),
	    idJadwal VARCHAR(25),
	    idStudio VARCHAR(25),
	    idPelanggan VARCHAR(25),
	    jmltiket INT,
	    totalHarga INT,
	    waktubeli DATETIME    
    )
BEGIN
		UPDATE transaksi_pembelian_tiket set
		id_transaksi = idTransaksi,
		id_film = idFilm,
		id_jadwal = idJadwal,
		id_studio = idStudio,
		id_pelanggan = idPelanggan,
		jumlah_tiket = jmltiket,
		total_harga = totalHarga,
		waktu_pembelian = waktubeli
		where id_transaksi = idTransaksi;
	END */$$
DELIMITER ;

/*Table structure for table `daftar_jadwal_tayang` */

DROP TABLE IF EXISTS `daftar_jadwal_tayang`;

/*!50001 DROP VIEW IF EXISTS `daftar_jadwal_tayang` */;
/*!50001 DROP TABLE IF EXISTS `daftar_jadwal_tayang` */;

/*!50001 CREATE TABLE  `daftar_jadwal_tayang`(
 `id_jadwal` varchar(25) ,
 `judul_film` varchar(255) ,
 `tanggal_tayang` date ,
 `jam_tayang` time ,
 `nama_studio` varchar(255) ,
 `tipe_studio` varchar(255) ,
 `harga_tiket` int(11) 
)*/;

/*Table structure for table `view_jumlah_tiket_terjual` */

DROP TABLE IF EXISTS `view_jumlah_tiket_terjual`;

/*!50001 DROP VIEW IF EXISTS `view_jumlah_tiket_terjual` */;
/*!50001 DROP TABLE IF EXISTS `view_jumlah_tiket_terjual` */;

/*!50001 CREATE TABLE  `view_jumlah_tiket_terjual`(
 `id_jadwal` varchar(25) ,
 `tanggal_tayang` date ,
 `judul_film` varchar(255) ,
 `jumlah_tiket_terjual` bigint(21) 
)*/;

/*View structure for view daftar_jadwal_tayang */

/*!50001 DROP TABLE IF EXISTS `daftar_jadwal_tayang` */;
/*!50001 DROP VIEW IF EXISTS `daftar_jadwal_tayang` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `daftar_jadwal_tayang` AS select `j`.`id_jadwal` AS `id_jadwal`,`f`.`judul_film` AS `judul_film`,`j`.`tanggal_tayang` AS `tanggal_tayang`,`j`.`jam_tayang` AS `jam_tayang`,`t`.`nama_studio` AS `nama_studio`,`t`.`tipe_studio` AS `tipe_studio`,`j`.`harga_tiket` AS `harga_tiket` from ((`jadwal_tayang` `j` join `studio` `t` on(`j`.`id_studio` = `t`.`id_studio`)) join `film` `f` on(`j`.`id_film` = `f`.`id_film`)) */;

/*View structure for view view_jumlah_tiket_terjual */

/*!50001 DROP TABLE IF EXISTS `view_jumlah_tiket_terjual` */;
/*!50001 DROP VIEW IF EXISTS `view_jumlah_tiket_terjual` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jumlah_tiket_terjual` AS (select `j`.`id_jadwal` AS `id_jadwal`,`j`.`tanggal_tayang` AS `tanggal_tayang`,`f`.`judul_film` AS `judul_film`,count(0) AS `jumlah_tiket_terjual` from ((`jadwal_tayang` `j` join `film` `f` on(`j`.`id_film` = `f`.`id_film`)) join `transaksi_pembelian_tiket` `p` on(`j`.`id_jadwal` = `p`.`id_jadwal`)) group by `j`.`id_jadwal`) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
