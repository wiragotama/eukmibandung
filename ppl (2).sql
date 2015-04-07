-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 07, 2015 at 04:18 PM
-- Server version: 5.6.16
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ppl`
--
CREATE DATABASE IF NOT EXISTS `ppl` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ppl`;

-- --------------------------------------------------------

--
-- Table structure for table `dinas`
--

CREATE TABLE IF NOT EXISTS `dinas` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL DEFAULT '123456789',
  PRIMARY KEY (`username`,`password`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dinas`
--

INSERT INTO `dinas` (`username`, `password`) VALUES
('admin', 'admin'),
('wiraganteng', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `dukcapil`
--

CREATE TABLE IF NOT EXISTS `dukcapil` (
  `ktp` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`ktp`,`username`,`password`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dukcapil`
--

INSERT INTO `dukcapil` (`ktp`, `username`, `password`) VALUES
('100', '100', '100'),
('153', '153', '153'),
('dede', 'dede', 'dede'),
('dummyIndustri', 'dummyIndustri', 'dummy'),
('dummyIndustri2', 'dummyIndustri2', 'dummy'),
('dummyUKM', 'dummyUKM', 'dummy'),
('dummyUKM2', 'dummyUKM2', 'dummy');

-- --------------------------------------------------------

--
-- Table structure for table `industri`
--

CREATE TABLE IF NOT EXISTS `industri` (
  `id_industri` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL DEFAULT '123456789',
  `no_registrasi` varchar(20) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `produk` text NOT NULL,
  `pemilik` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `kontak` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT '0',
  `jumlah_pemberi_rating` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_industri`,`no_registrasi`),
  KEY `no_registrasi` (`no_registrasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `industri`
--

INSERT INTO `industri` (`id_industri`, `username`, `password`, `no_registrasi`, `nama_perusahaan`, `produk`, `pemilik`, `alamat`, `deskripsi`, `kontak`, `rating`, `jumlah_pemberi_rating`) VALUES
(1, 'industri', 'industri', 'industri', 'industri', 'industri', 'industri', 'industri  ', 'industri  ', 'industri', 0, 0),
(2, 'dede', 'coba', 'dede', 'dede', 'coba', 'dede', ' coba  ', ' coba  ', 'coba', 0, 0),
(5, 'dede', 'dede', 'dede', 'linux', 'dede', 'dede', 'dede  ', 'dede  ', 'dede', 0, 0),
(6, '100', '100', '100', 'hehehe', 'hohoho', 'NA', 'NA ', 'NA ', 'NA', 0, 0),
(7, '100', '100', '100', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 0, 0),
(8, 'xx', 'xx', 'xx', 'xx', 'xx', 'xx', 'xx ', 'xx ', 'xx', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `perijinan`
--

CREATE TABLE IF NOT EXISTS `perijinan` (
  `no_registrasi` varchar(20) NOT NULL,
  `ktp` varchar(20) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  PRIMARY KEY (`no_registrasi`,`ktp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perijinan`
--

INSERT INTO `perijinan` (`no_registrasi`, `ktp`, `jenis`) VALUES
('100', '100', 'industri'),
('A153', '153', 'ukm'),
('dede', 'dede', 'ukm'),
('dummyIndustri', 'dummyIndustri', 'industri'),
('dummyIndustri2', 'dummyIndustri2', 'industri'),
('dummyUKM', 'dummyUKM', 'ukm'),
('dummyUKM2', 'dummyUKM2', 'ukm');

-- --------------------------------------------------------

--
-- Table structure for table `profit`
--

CREATE TABLE IF NOT EXISTS `profit` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `no_registrasi` int(11) NOT NULL,
  `profit` varchar(25) NOT NULL,
  `bulan` date NOT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `no_registrasi` (`no_registrasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ukm`
--

CREATE TABLE IF NOT EXISTS `ukm` (
  `id_ukm` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL DEFAULT '123456789',
  `no_registrasi` varchar(20) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `produk` text NOT NULL,
  `pemilik` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `kontak` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT '0',
  `jumlah_pemberi_rating` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_ukm`,`no_registrasi`),
  KEY `no_registrasi` (`no_registrasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `ukm`
--

INSERT INTO `ukm` (`id_ukm`, `username`, `password`, `no_registrasi`, `nama_perusahaan`, `produk`, `pemilik`, `alamat`, `deskripsi`, `kontak`, `rating`, `jumlah_pemberi_rating`) VALUES
(6, 'wira', '123456789', 'ulululululu', 'balada cinta', 'asdasdasdasd', 'wira', 'asd     ', 'asd     ', 'asd', 0, 0),
(7, 'ukm', 'ukm', 'wira', 'cin(t)a segitiga + wasit', 'huhu', 'hehe', 'hyhy   ', 'balada cinta', 'hoho', 0, 0),
(8, 'coba', 'coba', 'coba', 'darwin', 'coba', 'darwin', ' coba ', ' coba ', 'coba', 0, 0),
(10, 'dede', 'dede', 'dede', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 0, 0),
(11, 'dede', 'dede', 'dede', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 0, 0),
(12, '153', '153', 'A153', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 0, 0),
(13, 'dummyUKM', 'dummy', 'dummyUKM', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `verifikasi`
--

CREATE TABLE IF NOT EXISTS `verifikasi` (
  `id_verifikasi` int(11) NOT NULL AUTO_INCREMENT,
  `no_registrasi` varchar(20) NOT NULL,
  `username_dinas` varchar(20) NOT NULL DEFAULT 'admin',
  `status` varchar(20) NOT NULL DEFAULT 'not verified',
  PRIMARY KEY (`id_verifikasi`),
  UNIQUE KEY `no_registrasi` (`no_registrasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `verifikasi`
--

INSERT INTO `verifikasi` (`id_verifikasi`, `no_registrasi`, `username_dinas`, `status`) VALUES
(1, 'tes', 'wiraganteng', 'suspend'),
(3, 'darwin', 'wiraganteng', 'verified'),
(4, '100', 'wiraganteng', 'verified'),
(5, 'dummyUKM', 'admin', 'verified');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
