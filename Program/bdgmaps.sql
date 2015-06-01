-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2015 at 08:12 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

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

CREATE TABLE IF NOT EXISTS `admin` (
  `username_admin` varchar(20) NOT NULL,
  `password_admin` varchar(16) NOT NULL
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

CREATE TABLE IF NOT EXISTS `kecamatan` (
`id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(20) NOT NULL,
  `lat` varchar(25) NOT NULL,
  `long` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`, `lat`, `long`) VALUES
(1, 'Batujajar', '-6.9153153', '107.49777519999998'),
(2, 'Cihampelas', '-6.947939300000000000', '107.497264999999970000');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE IF NOT EXISTS `kelurahan` (
`id_kelurahan` int(11) NOT NULL,
  `nama_kelurahan` varchar(20) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `lat` varchar(25) NOT NULL,
  `long` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id_kelurahan`, `nama_kelurahan`, `id_kecamatan`, `lat`, `long`) VALUES
(1, 'Cihampelas', 2, '-6.9200000', '107.4688900');

-- --------------------------------------------------------

--
-- Table structure for table `pengusaha`
--

CREATE TABLE IF NOT EXISTS `pengusaha` (
`id_pengusaha` int(11) NOT NULL,
  `no_ktp` varchar(17) NOT NULL,
  `nama_pengusaha` varchar(20) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `ttl` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `file_ktp` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(16) NOT NULL,
  `status_akun` varchar(12) NOT NULL DEFAULT 'tidak aktif'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengusaha`
--

INSERT INTO `pengusaha` (`id_pengusaha`, `no_ktp`, `nama_pengusaha`, `alamat`, `ttl`, `jenis_kelamin`, `file_ktp`, `email`, `password`, `status_akun`) VALUES
(4, '123456789', 'Taryo Nugroho', 'Bandung', '2015-06-30', 'L', 'gambar/231.jpg', 'taryo@gmail.com', 'taryo', 'tidak aktif');

-- --------------------------------------------------------

--
-- Table structure for table `reqpass`
--

CREATE TABLE IF NOT EXISTS `reqpass` (
  `no_ktp` varchar(17) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` varchar(6) NOT NULL DEFAULT 'Belum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sektor_usaha`
--

CREATE TABLE IF NOT EXISTS `sektor_usaha` (
`id_sektor` int(11) NOT NULL,
  `sektor` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sektor_usaha`
--

INSERT INTO `sektor_usaha` (`id_sektor`, `sektor`) VALUES
(1, 'Periklanan'),
(2, 'Arsitektur'),
(3, 'Pasar Barang Seni'),
(4, 'Kerajinan'),
(5, 'Desain');

-- --------------------------------------------------------

--
-- Table structure for table `skala_usaha`
--

CREATE TABLE IF NOT EXISTS `skala_usaha` (
`id_skala` int(11) NOT NULL,
  `skala` enum('Mikro','Kecil','Menengah') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skala_usaha`
--

INSERT INTO `skala_usaha` (`id_skala`, `skala`) VALUES
(1, 'Mikro'),
(2, 'Kecil'),
(3, 'Menengah');

-- --------------------------------------------------------

--
-- Table structure for table `usaha`
--

CREATE TABLE IF NOT EXISTS `usaha` (
`id_usaha` int(11) NOT NULL,
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
  `status_usaha` varchar(12) NOT NULL DEFAULT 'tidak aktif'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usaha`
--

INSERT INTO `usaha` (`id_usaha`, `nama_usaha`, `id_pengusaha`, `produk_utama`, `alamat_usaha`, `id_kelurahan`, `id_kecamatan`, `telp`, `lat`, `long`, `peta_usaha`, `id_skala`, `id_sektor`, `gambar1`, `gambar2`, `gambar3`, `gambar4`, `gambar5`, `status_usaha`) VALUES
(1, 'Agung', 4, 'Batik', 'Cihampelas', 1, 2, '08999999999', '-6.9200000', '107.4688900', 'belum', 2, 4, 'masih dummy', NULL, NULL, NULL, NULL, 'tidak aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`username_admin`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
 ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
 ADD PRIMARY KEY (`id_kelurahan`), ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `pengusaha`
--
ALTER TABLE `pengusaha`
 ADD PRIMARY KEY (`id_pengusaha`);

--
-- Indexes for table `reqpass`
--
ALTER TABLE `reqpass`
 ADD PRIMARY KEY (`no_ktp`);

--
-- Indexes for table `sektor_usaha`
--
ALTER TABLE `sektor_usaha`
 ADD PRIMARY KEY (`id_sektor`);

--
-- Indexes for table `skala_usaha`
--
ALTER TABLE `skala_usaha`
 ADD PRIMARY KEY (`id_skala`);

--
-- Indexes for table `usaha`
--
ALTER TABLE `usaha`
 ADD PRIMARY KEY (`id_usaha`), ADD KEY `kecamatan` (`id_kecamatan`), ADD KEY `kecamatan_2` (`id_kecamatan`), ADD KEY `id_pengusaha` (`id_pengusaha`), ADD KEY `id_desa` (`id_kelurahan`), ADD KEY `id_skala` (`id_skala`), ADD KEY `id_sektor` (`id_sektor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
MODIFY `id_kelurahan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pengusaha`
--
ALTER TABLE `pengusaha`
MODIFY `id_pengusaha` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sektor_usaha`
--
ALTER TABLE `sektor_usaha`
MODIFY `id_sektor` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `skala_usaha`
--
ALTER TABLE `skala_usaha`
MODIFY `id_skala` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usaha`
--
ALTER TABLE `usaha`
MODIFY `id_usaha` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
