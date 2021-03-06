-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2018 at 04:56 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kp`
--

-- --------------------------------------------------------

--
-- Table structure for table `history_kelas`
--

CREATE TABLE IF NOT EXISTS `history_kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_induk` varchar(16) DEFAULT NULL,
  `kelas` varchar(16) NOT NULL,
  `absen` int(2) NOT NULL,
  `thnajar` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `kode` varchar(4) NOT NULL DEFAULT '',
  `nama` text NOT NULL,
  `is_continue` int(11) NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` VALUES('K001', 'KELENGKAPAN SERAGAM', 0);
INSERT INTO `kategori` VALUES('K002', 'KEBERSIHAN LINGKUNGAN ', 0);
INSERT INTO `kategori` VALUES('K003', 'KERAJINAN', 0);
INSERT INTO `kategori` VALUES('K004', 'KEDISIPLINAN AKADEMIK', 0);
INSERT INTO `kategori` VALUES('K005', 'KEJUJURAN AKADEMIK', 0);
INSERT INTO `kategori` VALUES('K006', 'ETIKA', 1);
INSERT INTO `kategori` VALUES('K007', 'MORALITAS', 1);
INSERT INTO `kategori` VALUES('K008', 'PERILAKU MENYIMPANG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `username` varchar(16) NOT NULL DEFAULT '',
  `password` varchar(16) NOT NULL,
  `nama` text NOT NULL,
  `jenis` varchar(16) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` VALUES('1001', '1001', 'WAKASEK 1001', 'WAKASEK');
INSERT INTO `member` VALUES('1002', '1002', 'GURU 1002', 'GURU');
INSERT INTO `member` VALUES('1003', '1003', 'WAKASEK 1003', 'WAKASEK');
INSERT INTO `member` VALUES('1004', '1004', 'GURU 1004', 'GURU');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran`
--

CREATE TABLE IF NOT EXISTS `pelanggaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `nomor_induk` varchar(16) NOT NULL,
  `kode_peraturan` varchar(4) DEFAULT NULL,
  `poin` int(11) NOT NULL,
  `hukuman` varchar(256) DEFAULT NULL,
  `keteragan` varchar(256) DEFAULT NULL,
  `flag_panggilortu` int(11) DEFAULT NULL,
  `flag_beritaacara` int(11) DEFAULT NULL,
  `flag_peringatan` int(11) DEFAULT NULL,
  `username` varchar(16) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `peraturan`
--

CREATE TABLE IF NOT EXISTS `peraturan` (
  `kode` varchar(4) NOT NULL DEFAULT '',
  `kode_kategori` varchar(4) NOT NULL,
  `nama` text NOT NULL,
  `poin` int(11) NOT NULL,
  `sp` int(11) NOT NULL,
  `keterangan` text,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peraturan`
--

INSERT INTO `peraturan` VALUES('P001', 'K001', 'SERAGAM TIDAK SESUAI KETENTUAN', 5, 0, NULL);
INSERT INTO `peraturan` VALUES('P002', 'K001', 'PESERTA DIDIK PUTRA: RAMBUT TIDAK SESUAI KETENTUAN SEKOLAH, DICAT, BERTINDIK, MEMAKAI KALUNG, CINCIN, ATAU GELANG', 5, 0, 'POIN 5 / MACAM PELANGGARAN.\r\nRAMBUT DIPOTONG/DIHITAMKAN, PERHIASAN DISITA DAN DIKEMBALIKAN SAAT RAPOR SEMESTER.');
INSERT INTO `peraturan` VALUES('P003', 'K001', 'PESERTA DIDIK PUTRI: BERTINDIK TIDAK SEWAJARNYA, MEMAKAI PERHIASAN BERLEBIHAN, MEMAKAI KUTEK, RAMBUT DICAT, MEMAKAI SOFTLENS BERWARNA', 5, 0, 'POIN 5 / MACAM PELANGGARAN. RAMBUT DIHITAMKAN, KUTEK DIHAPUS, PERHIASAN DISITA DAN DIKEMBALIKAN SAAT RAPOR SEMESTER.');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nomor_induk` varchar(16) NOT NULL,
  `nama` text NOT NULL,
  `kelas` varchar(16) NOT NULL,
  `absen` varchar(4) NOT NULL,
  `poin` int(11) NOT NULL,
  `sp` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`nomor_induk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` VALUES('18001', 'SISWA 1', 'X IPA 3', '1', 0, 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
