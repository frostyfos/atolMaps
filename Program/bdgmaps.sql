-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2015 at 10:00 PM
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
  `password_admin` varchar(16) NOT NULL,
  PRIMARY KEY (`username_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username_admin`, `password_admin`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

DROP TABLE IF EXISTS `kecamatan`;
CREATE TABLE IF NOT EXISTS `kecamatan` (
  `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kecamatan` varchar(20) NOT NULL,
  `lat` varchar(25) NOT NULL,
  `long` varchar(25) NOT NULL,
  PRIMARY KEY (`id_kecamatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `long` varchar(25) NOT NULL,
  PRIMARY KEY (`id_kelurahan`),
  KEY `id_kecamatan` (`id_kecamatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `kelurahan`:
--   `id_kecamatan`
--       `kecamatan` -> `id_kecamatan`
--

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
  `password` varchar(16) NOT NULL,
  `status_akun` varchar(12) NOT NULL DEFAULT 'tidak aktif',
  PRIMARY KEY (`id_pengusaha`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pengusaha`
--

INSERT INTO `pengusaha` (`id_pengusaha`, `no_ktp`, `nama_pengusaha`, `alamat`, `ttl`, `jenis_kelamin`, `file_ktp`, `email`, `password`, `status_akun`) VALUES
(4, '123456789', 'Taryo Nugroho', 'Bandung', '2015-06-30', 'L', 'gambar/231.jpg', 'taryo@gmail.com', 'taryo', 'tidak aktif');

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
  PRIMARY KEY (`no_ktp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sektor_usaha`
--

DROP TABLE IF EXISTS `sektor_usaha`;
CREATE TABLE IF NOT EXISTS `sektor_usaha` (
  `id_sektor` int(11) NOT NULL,
  `sektor` varchar(30) NOT NULL,
  PRIMARY KEY (`id_sektor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skala_usaha`
--

DROP TABLE IF EXISTS `skala_usaha`;
CREATE TABLE IF NOT EXISTS `skala_usaha` (
  `id_skala` int(11) NOT NULL,
  `skala` enum('Mikro','Kecil','Menengah') NOT NULL,
  PRIMARY KEY (`id_skala`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `long` varchar(25) NOT NULL,
  `peta_usaha` varchar(30) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `usaha`:
--   `id_pengusaha`
--       `pengusaha` -> `id_pengusaha`
--   `id_skala`
--       `skala_usaha` -> `id_skala`
--   `id_sektor`
--       `sektor_usaha` -> `id_sektor`
--   `id_kelurahan`
--       `kelurahan` -> `id_kelurahan`
--

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
  ADD CONSTRAINT `usaha_ibfk_4` FOREIGN KEY (`id_skala`) REFERENCES `skala_usaha` (`id_skala`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usaha_ibfk_5` FOREIGN KEY (`id_sektor`) REFERENCES `sektor_usaha` (`id_sektor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usaha_ibfk_6` FOREIGN KEY (`id_kelurahan`) REFERENCES `kelurahan` (`id_kelurahan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
