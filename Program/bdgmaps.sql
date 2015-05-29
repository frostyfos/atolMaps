-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2015 at 10:37 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE IF NOT EXISTS `desa` (
`id_desa` int(11) NOT NULL,
  `nama_desa` varchar(20) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `lat` varchar(25) NOT NULL,
  `long` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE IF NOT EXISTS `kecamatan` (
`id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(20) NOT NULL,
  `lat` varchar(25) NOT NULL,
  `long` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengusaha`
--

CREATE TABLE IF NOT EXISTS `pengusaha` (
`id_pengusaha` int(11) NOT NULL,
  `nama_pengusaha` varchar(20) NOT NULL,
  `username` varchar(17) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(16) NOT NULL,
  `username_admin` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sektor_usaha`
--

CREATE TABLE IF NOT EXISTS `sektor_usaha` (
  `id_sektor` int(11) NOT NULL,
  `sektor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skala_usaha`
--

CREATE TABLE IF NOT EXISTS `skala_usaha` (
  `id_skala` int(11) NOT NULL,
  `skala` enum('Mikro','Kecil','Menengah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `id_desa` int(11) NOT NULL,
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
  `gambar5` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`username_admin`);

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
 ADD PRIMARY KEY (`id_desa`), ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
 ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `pengusaha`
--
ALTER TABLE `pengusaha`
 ADD PRIMARY KEY (`id_pengusaha`), ADD KEY `username_admin` (`username_admin`);

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
 ADD PRIMARY KEY (`id_usaha`), ADD KEY `kecamatan` (`id_kecamatan`), ADD KEY `kecamatan_2` (`id_kecamatan`), ADD KEY `id_pengusaha` (`id_pengusaha`), ADD KEY `id_desa` (`id_desa`), ADD KEY `id_skala` (`id_skala`), ADD KEY `id_sektor` (`id_sektor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengusaha`
--
ALTER TABLE `pengusaha`
MODIFY `id_pengusaha` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usaha`
--
ALTER TABLE `usaha`
MODIFY `id_usaha` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `desa`
--
ALTER TABLE `desa`
ADD CONSTRAINT `desa_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengusaha`
--
ALTER TABLE `pengusaha`
ADD CONSTRAINT `pengusaha_ibfk_1` FOREIGN KEY (`username_admin`) REFERENCES `admin` (`username_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usaha`
--
ALTER TABLE `usaha`
ADD CONSTRAINT `usaha_ibfk_1` FOREIGN KEY (`id_pengusaha`) REFERENCES `pengusaha` (`id_pengusaha`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `usaha_ibfk_3` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `usaha_ibfk_4` FOREIGN KEY (`id_skala`) REFERENCES `skala_usaha` (`id_skala`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `usaha_ibfk_5` FOREIGN KEY (`id_sektor`) REFERENCES `sektor_usaha` (`id_sektor`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
