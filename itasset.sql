-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 18, 2015 at 01:54 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `itasset`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_cat_asset`
--

CREATE TABLE IF NOT EXISTS `tb_cat_asset` (
  `id_category` int(1) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_cat_asset`
--

INSERT INTO `tb_cat_asset` (`id_category`, `category_name`) VALUES
(1, 'PC Desktop'),
(2, 'Printer'),
(3, 'Scanner'),
(4, 'UPS'),
(5, 'Network Device'),
(6, 'CCTV Device');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cat_maintain`
--

CREATE TABLE IF NOT EXISTS `tb_cat_maintain` (
  `id_category` int(1) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_cat_maintain`
--

INSERT INTO `tb_cat_maintain` (`id_category`, `category_name`) VALUES
(1, 'Cleaning'),
(2, 'Upgrade / Downgrade'),
(3, 'Service');

-- --------------------------------------------------------

--
-- Table structure for table `tb_maintain`
--

CREATE TABLE IF NOT EXISTS `tb_maintain` (
  `id_maintain` int(4) NOT NULL AUTO_INCREMENT,
  `id_asset` int(4) NOT NULL,
  `id_type` int(1) NOT NULL,
  `date` date NOT NULL,
  `desc` text,
  `remark` text,
  `id_mill` int(2) NOT NULL,
  PRIMARY KEY (`id_maintain`),
  KEY `id_asset` (`id_asset`),
  KEY `id_mill` (`id_mill`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_maintain`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_master_asset`
--

CREATE TABLE IF NOT EXISTS `tb_master_asset` (
  `id_asset` int(4) NOT NULL AUTO_INCREMENT,
  `id_category` int(1) NOT NULL,
  `sn` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `year` year(4) NOT NULL,
  `cost_center` int(10) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `room` varchar(50) NOT NULL,
  `os` varchar(50) DEFAULT NULL,
  `ram` varchar(10) DEFAULT NULL,
  `hdd` varchar(10) DEFAULT NULL,
  `processor` varchar(20) DEFAULT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `port` int(2) DEFAULT NULL,
  `id_mill` int(2) NOT NULL,
  PRIMARY KEY (`id_asset`),
  KEY `id_mill` (`id_mill`),
  KEY `id_category` (`id_category`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_master_asset`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_master_mill`
--

CREATE TABLE IF NOT EXISTS `tb_master_mill` (
  `id_mill` int(2) NOT NULL AUTO_INCREMENT,
  `id_plant` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_mill`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_master_mill`
--

INSERT INTO `tb_master_mill` (`id_mill`, `id_plant`, `name`) VALUES
(1, 7028, 'Bawen'),
(2, 7026, 'Demak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(2) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name_info` varchar(100) NOT NULL,
  `id_mill` int(2) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_plant` (`id_mill`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `name_info`, `id_mill`) VALUES
(1, 'admin', '118ccc63105b8dc3dc712d45461af2ae', 'Bawen Mill', 1),
(2, 'admindemak', 'eb949bd3377b91afef5cf3e4310de824', 'Demak Mill', 2);
