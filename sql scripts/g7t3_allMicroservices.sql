-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 28, 2020 at 08:21 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `g7t3_booking`
--
CREATE DATABASE IF NOT EXISTS `g7t3_booking` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `g7t3_booking`;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_mobile` varchar(8) NOT NULL,
  `provider_mobile` varchar(8) NOT NULL,
  `provider_name` varchar(128) DEFAULT NULL,
  `provider_service` varchar(128) NOT NULL,
  `booking_time` varchar(5) NOT NULL,
  `booking_date` varchar(10) NOT NULL,
  `booking_price` double(5,2) NOT NULL,
  `booking_status` int(1) DEFAULT NULL,
  `booking_payment_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50000008 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `customer_mobile`, `provider_mobile`, `provider_name`, `provider_service`, `booking_time`, `booking_date`, `booking_price`, `booking_status`, `booking_payment_status`) VALUES
(50000001, '91239123', '2', NULL, 'Strumming', '19:00', 'fri', 35.67, 0, 0),
(50000002, '81112222', '2', NULL, 'Fingserstyle', '16:21', 'tue', 16.21, 1, 0),
(50000003, '91239123', '1', NULL, 'Feeding', '18:00', 'fri', 45.00, 0, 0),
(50000004, '91239123', '2', NULL, 'Strumming', '19:00', 'fri', 35.67, 0, 0),
(50000005, '91239123', '2', NULL, 'Piano', '17:44', 'thu', 17.44, 0, 0),
(50000006, '91239123', '3', 'Chantel', 'Disappoint Boys', '18:41', 'tue', 18.41, 0, 0),
(50000007, '91239123', '1', 'Agnes Lam', 'Feeding', '18:00', 'fri', 45.00, 0, 0);
--
-- Database: `g7t3_customer`
--
CREATE DATABASE IF NOT EXISTS `g7t3_customer` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `g7t3_customer`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_mobile` varchar(8) NOT NULL,
  `customer_name` varchar(128) NOT NULL,
  `customer_address` varchar(256) NOT NULL,
  PRIMARY KEY (`customer_mobile`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Database: `g7t3_payment`
--
CREATE DATABASE IF NOT EXISTS `g7t3_payment` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `g7t3_payment`;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `booking_price` int(11) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12345679 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `booking_id`, `booking_price`) VALUES
(12345678, 50000001, 12);
--
-- Database: `g7t3_review`
--
CREATE DATABASE IF NOT EXISTS `g7t3_review` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `g7t3_review`;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `booking_id` int(11) NOT NULL,
  `review_star` int(11) NOT NULL,
  `review_comment` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`booking_id`, `review_star`, `review_comment`) VALUES
(50000001, 1, 'bad svc'),
(50000002, 5, 'Hehe Haha'),
(50000006, 5, 'Good gf svc.');
--
-- Database: `g7t3_serviceprovider`
--
CREATE DATABASE IF NOT EXISTS `g7t3_serviceprovider` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `g7t3_serviceprovider`;

-- --------------------------------------------------------

--
-- Table structure for table `serviceprovider`
--

DROP TABLE IF EXISTS `serviceprovider`;
CREATE TABLE IF NOT EXISTS `serviceprovider` (
  `provider_mobile` varchar(8) NOT NULL,
  `provider_name` varchar(128) NOT NULL,
  `provider_service1` varchar(256) NOT NULL,
  `provider_service2` varchar(256) DEFAULT NULL,
  `provider_service3` varchar(256) DEFAULT NULL,
  `provider_price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`provider_mobile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `serviceprovider`
--

INSERT INTO `serviceprovider` (`provider_mobile`, `provider_name`, `provider_service1`, `provider_service2`, `provider_service3`, `provider_price`) VALUES
('54444442', 'Testing Add', 'HP', 'Lenovo', 'Logitech', '800.10'),
('65544444', 'Sun Dogs', 'Sun Tanning', 'Makan', 'Alcohol', '234.66'),
('65553333', '12345678', 'Pur', 'Bark', '', '45.60'),
('90000000', 'Impawssible', 'Showering', 'Petting', '', '25.99'),
('98765432', 'What The Fluff', 'Showering ', 'Blowing', 'Feeding', '50.01');
--
-- Database: `g7t3_serviceprovidertrial`
--
CREATE DATABASE IF NOT EXISTS `g7t3_serviceprovidertrial` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `g7t3_serviceprovidertrial`;

-- --------------------------------------------------------

--
-- Table structure for table `serviceprovider_trial`
--

DROP TABLE IF EXISTS `serviceprovider_trial`;
CREATE TABLE IF NOT EXISTS `serviceprovider_trial` (
  `provider_mobile` varchar(8) NOT NULL COMMENT 'Serial number for the service provider.',
  `provider_name` varchar(128) CHARACTER SET utf8mb4 NOT NULL,
  `provider_price` decimal(10,2) NOT NULL,
  `provider_time` varchar(5) NOT NULL,
  `provider_day` varchar(3) NOT NULL,
  `provider_service` varchar(128) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`provider_mobile`,`provider_service`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serviceprovider_trial`
--

INSERT INTO `serviceprovider_trial` (`provider_mobile`, `provider_name`, `provider_price`, `provider_time`, `provider_day`, `provider_service`) VALUES
('1', 'Agnes Lam', '45.00', '18:00', 'fri', 'Feeding'),
('2', 'Nicolas Wijaya', '35.67', '19:00', 'fri', 'Strumming'),
('2', 'Nicolas Wijaya', '16.20', '16:20', 'tue', '2'),
('2', 'Nicolas Wijaya', '16.21', '16:21', 'tue', 'Fingerstyle'),
('2', 'Nicolas Wijaya', '17.41', '17:41', 'wed', 'Guitar'),
('2', 'Nicolas Wijaya', '17.44', '17:44', 'thu', 'Piano'),
('3', 'Chantel', '99.99', '18:38', 'tue', 'Boy Breaker'),
('2', 'Nicolas Wijaya', '18.06', '18:06', 'tue', 'Er Hu'),
('3', 'Chantel', '18.41', '18:41', 'tue', 'Disappoint Boys'),
('4', 'Ming Miao', '18.42', '18:42', 'mon', 'Stress'),
('5', 'Pei Yi', '18.47', '18:47', 'sun', 'Girlfriend Service');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
