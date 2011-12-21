-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 18, 2011 at 05:52 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

CREATE TABLE IF NOT EXISTS `akses` (
  `hak` text NOT NULL,
  `skrip` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `Code` int(4) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Code`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`Code`, `nama`, `jumlah`) VALUES
(1, 'zhiro', 290),
(2, 'tes', 10),
(3, '', 0),
(4, '', 0),
(5, 'zhiro 1', 10),
(6, '', 0),
(7, '', 0),
(8, 'zhiro2', 23),
(9, 'zhiro3', 0),
(10, 'zhiro', 0),
(11, 'zhiro5', 0),
(12, 'zhiro', 0),
(13, 'zhiro', 0),
(14, 'zhiro', 0),
(15, 'zhiro', 0),
(16, 'zhiro', 0),
(17, 'rubi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_beli`
--

CREATE TABLE IF NOT EXISTS `tabel_beli` (
  `id_beli` int(5) NOT NULL AUTO_INCREMENT,
  `tanggal` char(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` double NOT NULL,
  `toko` varchar(30) NOT NULL,
  PRIMARY KEY (`id_beli`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tabel_beli`
--

INSERT INTO `tabel_beli` (`id_beli`, `tanggal`, `nama`, `jumlah`, `harga`, `toko`) VALUES
(2, '13/03/11', 'tes', 10, 1000000, 'coba'),
(3, '25/03/11', 'zhiro', 100, 95000, 'PT. Bahagia'),
(4, '25/03/11', 'zhiro 1', 10, 1000000, 'PT. Bahagia'),
(5, '28/03/11', 'zhiro2', 100, 1000000, 'bagus'),
(7, '30/03/11', 'zhiro', 100, 1000000, 'bagus');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_jual`
--

CREATE TABLE IF NOT EXISTS `tabel_jual` (
  `id_jual` int(10) NOT NULL AUTO_INCREMENT,
  `tanggal` char(10) NOT NULL,
  `nama` text NOT NULL,
  `jumlah` float NOT NULL,
  `harga` double NOT NULL,
  `diskon` double NOT NULL,
  `toko` char(30) NOT NULL,
  `id_nota` char(15) NOT NULL,
  PRIMARY KEY (`id_jual`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `tabel_jual`
--

INSERT INTO `tabel_jual` (`id_jual`, `tanggal`, `nama`, `jumlah`, `harga`, `diskon`, `toko`, `id_nota`) VALUES
(30, '28/03/11', 'zhiro2', 100, 0, 0, '', '7/28/03/11'),
(29, '28/03/11', 'zhiro2', 100, 0, 0, '', '6/28/03/11'),
(28, '28/03/11', 'zhiro2', 100, 0, 0, '', '5/28/03/11'),
(27, '28/03/11', 'zhiro2', 100, 0, 0, '', '4/28/03/11'),
(26, '28/03/11', 'zhiro2', 100, 0, 0, '', '3/28/03/11'),
(25, '28/03/11', 'zhiro', 100, 0, 0, '', '2/28/03/11'),
(23, '18/03/11', 'sdfgh', 654, 765, 0, '', '1/18/03/11'),
(24, '28/03/11', 'zhiro', 10, 80000, 0, '', '1/28/03/11'),
(22, '18/03/11', 'sdg', 443, 56, 0, '', '1/18/03/11'),
(21, '18/03/11', 'mhfg', 454565, 5, 0, '', '1/18/03/11'),
(31, '29/03/11', 'zhiro2', 19, 0, 0, '', '1/29/03/11'),
(32, '29/03/11', 'zhiro2', 10, 0, 0, '', '2/29/03/11'),
(33, '29/03/11', 'zhiro2', 10, 0, 0, '', '3/29/03/11');

-- --------------------------------------------------------

--
-- Table structure for table `table_nota`
--

CREATE TABLE IF NOT EXISTS `table_nota` (
  `no` int(10) NOT NULL AUTO_INCREMENT,
  `id_nota` char(15) NOT NULL,
  `tanggal` char(10) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `table_nota`
--

INSERT INTO `table_nota` (`no`, `id_nota`, `tanggal`) VALUES
(14, '3/28/03/11', '28/03/11'),
(13, '2/28/03/11', '28/03/11'),
(12, '1/28/03/11', '28/03/11'),
(11, '1/27/03/11', '27/03/11'),
(10, '1/25/03/11', '25/03/11'),
(9, '1/18/03/11', '18/03/11'),
(15, '4/28/03/11', '28/03/11'),
(16, '5/28/03/11', '28/03/11'),
(17, '6/28/03/11', '28/03/11'),
(18, '7/28/03/11', '28/03/11'),
(19, '1/29/03/11', '29/03/11'),
(20, '2/29/03/11', '29/03/11'),
(21, '3/29/03/11', '29/03/11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` text NOT NULL,
  `password` text NOT NULL,
  `kategori` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
