-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 09, 2018 at 11:19 
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_saw`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin'),
('ahim', 'ahim08');

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE IF NOT EXISTS `alternatif` (
  `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `jabatan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_pegawai`, `nip`, `nama`, `jabatan`) VALUES
(1, '112', 'Ilham Samad', 'Staff Anjab'),
(2, '111', 'Zurina', 'Staff Humas'),
(3, '113', 'M. Hasan', 'Staff Hukum');

-- --------------------------------------------------------

--
-- Table structure for table `himpunan`
--

CREATE TABLE IF NOT EXISTS `himpunan` (
  `id_himpunan` int(11) NOT NULL AUTO_INCREMENT,
  `id_kriteria` int(11) NOT NULL,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nilai` float NOT NULL,
  PRIMARY KEY (`id_himpunan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `himpunan`
--

INSERT INTO `himpunan` (`id_himpunan`, `id_kriteria`, `nama`, `nilai`) VALUES
(1, 1, '>=85', 1),
(2, 1, '< 85 >=75', 0.75),
(3, 1, '< 75 >= 60', 0.5),
(4, 1, '<  60 >=45', 0.25),
(5, 1, '< 45', 0),
(6, 2, '>= 85', 1),
(7, 2, '< 85 >=75', 0.75),
(8, 2, '< 75 >= 60', 0.5),
(9, 2, '<  60 >=45', 0.25),
(10, 2, '< 45', 0),
(11, 3, '>= 85', 1),
(12, 3, '< 85 >=75', 0.75),
(13, 3, '< 75 >= 60', 0.5),
(14, 3, '<  60 >=45', 0.25),
(15, 3, '< 45', 0),
(16, 4, '>= 85', 1),
(17, 4, '< 85 >=75', 0.75),
(18, 4, '< 75 >= 60', 0.5),
(19, 4, '<  60 >=45', 0.25),
(20, 4, '< 45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi`
--

CREATE TABLE IF NOT EXISTS `klasifikasi` (
  `id_pegawai` int(11) NOT NULL,
  `id_himpunan` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `klasifikasi`
--

INSERT INTO `klasifikasi` (`id_pegawai`, `id_himpunan`) VALUES
(1, 18),
(1, 13),
(1, 8),
(1, 2),
(2, 20),
(2, 13),
(2, 10),
(2, 1),
(3, 19),
(3, 14),
(3, 8),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
  `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nilai` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `rata-rata` varchar(10) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama`, `nilai`, `rata-rata`) VALUES
(1, 'Kapasitas Intelektual', '30%', ''),
(2, 'Kapasitas Kepribadian', '20%', ''),
(3, 'Pola Kerja', '20%', ''),
(4, 'Kepemimpinan', '30%', '');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE IF NOT EXISTS `sub_kriteria` (
  `pendidikan_formal` varchar(10) NOT NULL,
  `pendidikan_teknis` varchar(10) NOT NULL,
  `pengalaman_kerja` varchar(10) NOT NULL,
  `disiplin` varchar(10) NOT NULL,
  `motivasi` varchar(10) NOT NULL,
  `etika` varchar(10) NOT NULL,
  `kejujuran` varchar(10) NOT NULL,
  `sistematis` varchar(10) NOT NULL,
  `analisis` varchar(10) NOT NULL,
  `kecermatan` varchar(10) NOT NULL,
  `tanggap` varchar(10) NOT NULL,
  `kerjasama` varchar(10) NOT NULL,
  `tanggungjawab` varchar(10) NOT NULL,
  `km_kerjasama` varchar(10) NOT NULL,
  `km_manajerial` varchar(10) NOT NULL,
  `pikiran` varchar(10) NOT NULL,
  `keteladanan` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_kriteria`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
