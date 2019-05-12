-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 07, 2019 at 03:47 PM
-- Server version: 5.7.23
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ledger`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`) VALUES
(1, 'Rong Chen'),
(2, 'Xeron'),
(3, 'VS'),
(4, 'Emeka Dogo');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ArticleNum` varchar(20) NOT NULL,
  `quantityTotal` int(5) NOT NULL,
  `quantityPerCarton` mediumint(9) NOT NULL,
  `PricePerArt` mediumint(9) NOT NULL,
  `PricePerCart` mediumint(9) NOT NULL,
  `companyId` int(11) NOT NULL,
  `DateCreated` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `ArticleNum`, `quantityTotal`, `quantityPerCarton`, `PricePerArt`, `PricePerCart`, `companyId`, `DateCreated`) VALUES
(1, '2B14', 2, 2, 2, 4, 1, '2019-02-27'),
(2, '77po', 3, 3, 3, 9, 1, '2019-02-20'),
(3, 'A8090', 100, 24, 1200, 28800, 3, '2019-02-20'),
(4, '56Kl', 80, 67, 67, 4489, 2, '2019-02-21'),
(5, '2B14', 100, 24, 1000, 24000, 1, '2019-02-07'),
(6, 'uuu', 44, 33, 55, 1815, 1, '2019-02-13'),
(7, 'ytu78', 10, 10, 5, 50, 3, '2019-03-20'),
(8, 'tyu78', 10, 90, 5, 450, 1, '2019-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bills` int(11) NOT NULL DEFAULT '0',
  `paymentsMade` mediumint(9) NOT NULL DEFAULT '0',
  `paymentsDate` date DEFAULT NULL,
  `itemId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `bills`, `paymentsMade`, `paymentsDate`, `itemId`) VALUES
(1, 8, 6, '2019-02-20', 1),
(2, 27, 29, '2019-02-21', 2),
(3, 2880000, 1000000, '2019-02-21', 3),
(4, 359120, 200000, '2019-02-12', 4),
(5, 2400000, 0, NULL, 5),
(6, 79860, 1000000, '2019-02-15', 6),
(7, 500, 0, NULL, 7),
(8, 4500, 4566666, '2019-03-12', 8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
