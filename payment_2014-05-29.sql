# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.1.44)
# Database: payment
# Generation Time: 2014-05-29 12:27:42 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table bill
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bill`;

CREATE TABLE `bill` (
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `bill` WRITE;
/*!40000 ALTER TABLE `bill` DISABLE KEYS */;

INSERT INTO `bill` (`bid`, `uid`, `id`, `amt`, `due`, `period`, `period_id`, `remaining`, `period_payment`, `title`, `start`, `due_day`, `grace_period`, `active`)
VALUES
	(1,NULL,2,7000.00,6640.00,72,3,68,90,'Ali Mazer Promisory Note','2014-01-01',1,10,1);

/*!40000 ALTER TABLE `bill` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table payment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `pid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `bid` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `memo` varchar(100) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;

INSERT INTO `payment` (`pid`, `bid`, `id`, `amount`, `date`, `memo`, `img`)
VALUES
	(1,1,2,90.00,'2014-01-22','Check #303',NULL),
	(2,1,2,90.00,'2014-02-25','Check #309',NULL),
	(30,1,2,90.00,'2014-04-10','Check #315','April2014_Mazer.jpg'),
	(29,1,2,90.00,'2014-03-11','Check #311','March14_Mazer_311.jpg');

/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table period
# ------------------------------------------------------------

DROP TABLE IF EXISTS `period`;

CREATE TABLE `period` (
  `period_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `period_type` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`period_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `period` WRITE;
/*!40000 ALTER TABLE `period` DISABLE KEYS */;

INSERT INTO `period` (`period_id`, `period_type`)
VALUES
	(1,'Daily'),
	(2,'Weekly'),
	(3,'Monthly'),
	(4,'Quartterly'),
	(5,'Anualy'),
	(6,'Bianualy');

/*!40000 ALTER TABLE `period` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table person
# ------------------------------------------------------------

DROP TABLE IF EXISTS `person`;

CREATE TABLE `person` (
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `person` WRITE;
/*!40000 ALTER TABLE `person` DISABLE KEYS */;

INSERT INTO `person` (`id`, `firstname`, `lastname`, `address1`, `address2`, `city`, `state`, `zip`, `email`)
VALUES
	(2,'Ali','Mazer','9896 Rickover Ct',NULL,'Manassas','VA',20109,'amazer55@gmail.com'),
	(3,'Eric','Sherred','2351 Eisenhower Ave','Apt 1019','Alexandria','VA',22314,'esherred@gmail.com');

/*!40000 ALTER TABLE `person` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`uid`, `id`, `username`, `password`)
VALUES
	(3,3,'ericsherred','2266abad8201f699f104');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
