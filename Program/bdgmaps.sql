-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2015 at 10:18 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bdgmaps`
--
CREATE DATABASE IF NOT EXISTS `bdgmaps` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bdgmaps`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username_admin` varchar(20) NOT NULL,
  `password_admin` varchar(32) NOT NULL,
  PRIMARY KEY (`username_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username_admin`, `password_admin`) VALUES
('adm', 'fa61db9a31f047795b62b65ac357cb14'),
('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

DROP TABLE IF EXISTS `kecamatan`;
CREATE TABLE IF NOT EXISTS `kecamatan` (
  `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kecamatan` varchar(20) NOT NULL,
  `lat` varchar(50) NOT NULL,
  `lng` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kecamatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`, `lat`, `lng`) VALUES
(1, 'Batujajar', '55.676096800000000000', '12.568337100000008000'),
(2, 'Cihampelas', '-6.191115', '106.835983'),
(3, 'sad', 'asda', 'asda');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

DROP TABLE IF EXISTS `kelurahan`;
CREATE TABLE IF NOT EXISTS `kelurahan` (
  `id_kelurahan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelurahan` varchar(20) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `lat` varchar(25) NOT NULL,
  `lng` varchar(25) NOT NULL,
  PRIMARY KEY (`id_kelurahan`),
  KEY `id_kecamatan` (`id_kecamatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id_kelurahan`, `nama_kelurahan`, `id_kecamatan`, `lat`, `lng`) VALUES
(2, 'dari kecamatan1', 1, '5', '5'),
(3, 'dari kecamatan 2 jug', 1, '', '2'),
(5, 'TST', 1, 'lat', 'long'),
(6, 'Kecipluk2', 1, '1', '2'),
(7, '232', 1, '232', '2131');

-- --------------------------------------------------------

--
-- Table structure for table `pengusaha`
--

DROP TABLE IF EXISTS `pengusaha`;
CREATE TABLE IF NOT EXISTS `pengusaha` (
  `id_pengusaha` int(11) NOT NULL AUTO_INCREMENT,
  `no_ktp` varchar(17) NOT NULL,
  `nama_pengusaha` varchar(20) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `ttl` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `file_ktp` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status_akun` varchar(12) NOT NULL DEFAULT 'tidak aktif',
  PRIMARY KEY (`id_pengusaha`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `pengusaha`
--

INSERT INTO `pengusaha` (`id_pengusaha`, `no_ktp`, `nama_pengusaha`, `alamat`, `ttl`, `jenis_kelamin`, `file_ktp`, `email`, `password`, `status_akun`) VALUES
(14, '12344', 'Gordon', 'Amerika', '2015-06-17', 'L', '../gambar/../gambar/1.jpg', 'Gordon_Ramsay@HellsKitchen.com', '12345', 'tidak aktif'),
(15, 'tes2', 'tes', 'tes', '2015-06-22', '', '../gambar/../gambar/231.jpg', 'tes', 'tes', 'tidak aktif'),
(16, 'ada', 'asdadasd', 'asdad', '2015-06-24', '', '../gambar/../gambar/1.jpg', 'ds', 'sdasdasd', 'aktif'),
(17, 'asdas', 'asdadas', 'sdasd', '2015-06-16', '', '../gambar/../gambar/../gambar/', 'dasda', 'asd', 'aktif'),
(18, 'd', 'd', 'd', '2015-07-22', '', '../gambar/default.jpg', 'dsd', 'd', 'aktif'),
(19, 'usr1', 'asdasdsad', 'dasda', '2015-06-24', 'L', '../gambar/1.jpg', 'email@email.com', 'e10adc3949ba59abbe56e057f20f883e', 'aktif'),
(20, 'usr2', 'sdad', 'asdad', '2015-06-23', 'L', '../gambar/231.jpg', 'email@email.com', 'e10adc3949ba59abbe56e057f20f883e', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `reqpass`
--

DROP TABLE IF EXISTS `reqpass`;
CREATE TABLE IF NOT EXISTS `reqpass` (
  `no_ktp` varchar(17) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` varchar(6) NOT NULL DEFAULT 'Belum',
  `hash` varchar(32) NOT NULL,
  PRIMARY KEY (`no_ktp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reqpass`
--

INSERT INTO `reqpass` (`no_ktp`, `nama`, `email`, `status`, `hash`) VALUES
('123123', 'sikuda', 'winata.nando@gmail.com', 'Belum', '43fa7f58b7eac7ac872209342e62e8f1'),
('1234', 'fernando', 'winata.nando@gmail.com', 'Belum', '9cf81d8026a9018052c429cc4e56739b'),
('adsad', 'asdasdsad', 'winata.nando@gmail.com', 'Belum', '67c6a1e7ce56d3d6fa748ab6d9af3fd7'),
('asdas', 'sadasdasd', 'winata.nando@gmail.com', 'Belum', 'dc6a70712a252123c40d2adba6a11d84'),
('asdasd', 'asd', 'lumpiakuda@gmail.com', 'Belum', 'd709f38ef758b5066ef31b18039b8ce5'),
('dasas', 'asdasdsad', 'winata.nando@gmail.com', 'Belum', '07871915a8107172b3b5dc15a6574ad3'),
('s', 'dsasda', 'lumpiakuda@gmail.com', 'Belum', 'f9b902fc3289af4dd08de5d1de54f68f'),
('sad', 'asd', 'winata.nando@gmail.com', 'Belum', '55a7cf9c71f1c9c495413f934dd1a158'),
('sadasd', 'sada', 'lumpiakuda@gmail.com', 'Belum', 'a5771bce93e200c36f7cd9dfd0e5deaa');

-- --------------------------------------------------------

--
-- Table structure for table `sektor_usaha`
--

DROP TABLE IF EXISTS `sektor_usaha`;
CREATE TABLE IF NOT EXISTS `sektor_usaha` (
  `id_sektor` int(11) NOT NULL AUTO_INCREMENT,
  `sektor` varchar(30) NOT NULL,
  PRIMARY KEY (`id_sektor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sektor_usaha`
--

INSERT INTO `sektor_usaha` (`id_sektor`, `sektor`) VALUES
(2, 'Arsitektur'),
(3, 'Pasar Barang Seni'),
(4, 'Kerajinan'),
(5, 'Desain');

-- --------------------------------------------------------

--
-- Table structure for table `skala_usaha`
--

DROP TABLE IF EXISTS `skala_usaha`;
CREATE TABLE IF NOT EXISTS `skala_usaha` (
  `id_skala` int(11) NOT NULL AUTO_INCREMENT,
  `skala` varchar(10) NOT NULL,
  PRIMARY KEY (`id_skala`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `skala_usaha`
--

INSERT INTO `skala_usaha` (`id_skala`, `skala`) VALUES
(2, 'Kecil'),
(3, 'Menengah');

-- --------------------------------------------------------

--
-- Table structure for table `usaha`
--

DROP TABLE IF EXISTS `usaha`;
CREATE TABLE IF NOT EXISTS `usaha` (
  `id_usaha` int(11) NOT NULL AUTO_INCREMENT,
  `nama_usaha` varchar(30) NOT NULL,
  `id_pengusaha` int(11) NOT NULL,
  `produk_utama` varchar(30) NOT NULL,
  `alamat_usaha` varchar(50) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `lat` varchar(25) NOT NULL,
  `lng` varchar(25) NOT NULL,
  `peta_usaha` varchar(30) DEFAULT NULL,
  `id_skala` int(11) NOT NULL,
  `id_sektor` int(11) NOT NULL,
  `gambar1` varchar(40) NOT NULL,
  `gambar2` varchar(40) DEFAULT NULL,
  `gambar3` varchar(40) DEFAULT NULL,
  `gambar4` varchar(40) DEFAULT NULL,
  `gambar5` varchar(40) DEFAULT NULL,
  `status_usaha` varchar(12) NOT NULL DEFAULT 'tidak aktif',
  PRIMARY KEY (`id_usaha`),
  KEY `kecamatan` (`id_kecamatan`),
  KEY `kecamatan_2` (`id_kecamatan`),
  KEY `id_pengusaha` (`id_pengusaha`),
  KEY `id_desa` (`id_kelurahan`),
  KEY `id_skala` (`id_skala`),
  KEY `id_sektor` (`id_sektor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `usaha`
--

INSERT INTO `usaha` (`id_usaha`, `nama_usaha`, `id_pengusaha`, `produk_utama`, `alamat_usaha`, `id_kelurahan`, `id_kecamatan`, `telp`, `lat`, `lng`, `peta_usaha`, `id_skala`, `id_sektor`, `gambar1`, `gambar2`, `gambar3`, `gambar4`, `gambar5`, `status_usaha`) VALUES
(11, '1', 14, '1', '1', 7, 1, '1', '', '', NULL, 2, 2, '../gambar/../gambar/../gambar/../gambar/', '../gambar/../gambar/../gambar/../gambar/', '../gambar/../gambar/../gambar/../gambar/', '../gambar/../gambar/../gambar/../gambar/', '../gambar/../gambar/../gambar/../gambar/', 'aktif'),
(14, '121', 14, '1', '1', 7, 1, '1', '', '', '', 2, 2, '../gambar/../gambar/../gambar/../gambar/', '../gambar/../gambar/../gambar/../gambar/', '../gambar/../gambar/../gambar/../gambar/', '../gambar/../gambar/../gambar/../gambar/', '../gambar/../gambar/../gambar/../gambar/', 'aktif'),
(15, '123', 14, '1', '1', 7, 1, '1', '', '', '', 2, 2, '1.jpg', '231.jpg', '800px-Flag_of_Jihad.svg.png', '600px-ShababAdmin.svg.png', '208858_10151034928039274_779041448_n.jpg', 'aktif'),
(17, 'asd22', 14, 'as', 'Antapani, West Java, Indonesia', 7, 1, 'sa', '', '', '', 2, 2, '../gambar/800px-Flag_of_Jihad.svg.png', '231.jpg', '600px-ShababAdmin.svg.png', '../gambar/default.jpg', '../gambar/default.jpg', 'aktif'),
(18, 'sadasdsa', 14, 'asd', 'Asdar Wahyu Berkah, Bale Kambang, Special Capital ', 7, 1, 'asdsa', '', '', '', 2, 2, '../gambar/1.jpg', '../gambar/default.jpg', '../gambar/default.jpg', '../gambar/default.jpg', '../gambar/231.jpg', 'aktif');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD CONSTRAINT `kelurahan_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usaha`
--
ALTER TABLE `usaha`
  ADD CONSTRAINT `usaha_ibfk_1` FOREIGN KEY (`id_pengusaha`) REFERENCES `pengusaha` (`id_pengusaha`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usaha_ibfk_6` FOREIGN KEY (`id_kelurahan`) REFERENCES `kelurahan` (`id_kelurahan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usaha_ibfk_7` FOREIGN KEY (`id_sektor`) REFERENCES `sektor_usaha` (`id_sektor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usaha_ibfk_8` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usaha_ibfk_9` FOREIGN KEY (`id_skala`) REFERENCES `skala_usaha` (`id_skala`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
