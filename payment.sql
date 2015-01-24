-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 24, 2015 at 03:53 PM
-- Server version: 5.1.44
-- PHP Version: 5.4.19

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `payment`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE IF NOT EXISTS `bill` (
  `bid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `amt` decimal(10,2) DEFAULT NULL,
  `due` decimal(10,2) DEFAULT NULL,
  `period` int(11) DEFAULT NULL,
  `period_id` int(2) DEFAULT NULL,
  `remaining` int(11) DEFAULT NULL,
  `period_payment` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `due_day` int(2) DEFAULT NULL,
  `grace_period` int(2) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bid`, `uid`, `id`, `amt`, `due`, `period`, `period_id`, `remaining`, `period_payment`, `title`, `start`, `due_day`, `grace_period`, `active`) VALUES
(1, NULL, 2, 7000.00, 6010.00, 72, 3, 61, 90, 'Ali Mazer Promisory Note', '2014-01-01', 1, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `pid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `bid` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `memo` varchar(100) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pid`, `bid`, `id`, `amount`, `date`, `memo`, `img`) VALUES
(1, 1, 2, 90.00, '2014-01-22', 'Check #303', NULL),
(2, 1, 2, 90.00, '2014-02-25', 'Check #309', NULL),
(30, 1, 2, 90.00, '2014-04-10', 'Check #315', 'April2014_Mazer.jpg'),
(29, 1, 2, 90.00, '2014-03-11', 'Check #311', 'March14_Mazer_311.jpg'),
(31, 1, 2, 90.00, '2014-05-09', 'Check #319', 'Mazer_May2014.jpg'),
(32, 1, 2, 90.00, '2014-06-07', 'Check #323', 'June2014_Mazer.jpg'),
(33, 1, 2, 90.00, '2014-07-09', 'Check #326', 'Mazer-July2014.JPG'),
(34, 1, 3, 90.00, '2014-08-06', 'Check #328', 'August2014_Mazer.png'),
(35, 1, 2, 90.00, '2014-09-06', 'Check #331', '2014_September_Mazer.jpeg'),
(36, 1, 2, 90.00, '2014-10-01', 'Need to input check', NULL),
(37, 1, 2, 90.00, '2014-11-06', 'Check #337', 'Mazer-Nov2014.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `period`
--

CREATE TABLE IF NOT EXISTS `period` (
  `period_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `period_type` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`period_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `period`
--

INSERT INTO `period` (`period_id`, `period_type`) VALUES
(1, 'Daily'),
(2, 'Weekly'),
(3, 'Monthly'),
(4, 'Quartterly'),
(5, 'Anualy'),
(6, 'Bianualy');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `address1` varchar(100) DEFAULT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `zip` int(5) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `firstname`, `lastname`, `address1`, `address2`, `city`, `state`, `zip`, `email`) VALUES
(2, 'Ali', 'Mazer', '9896 Rickover Ct', NULL, 'Manassas', 'VA', 20109, 'amazer55@gmail.com'),
(3, 'Eric', 'Sherred', '2351 Eisenhower Ave', 'Apt 1019', 'Alexandria', 'VA', 22314, 'esherred@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `id`, `username`, `password`) VALUES
(3, 3, 'ericsherred', '2266abad8201f699f104');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
