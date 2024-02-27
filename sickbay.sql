-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 14, 2023 at 04:39 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sickbay`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` float DEFAULT NULL,
  `amount_in_dollars` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `amount`, `amount_in_dollars`) VALUES
(1, 100, NULL),
(2, 100, 1130),
(3, 50, 565),
(4, 60, 678),
(5, 55, NULL),
(6, 40, NULL),
(7, 99, NULL),
(8, 99, NULL),
(9, 99, NULL),
(10, 10, 100),
(11, 12, 9),
(12, 34, 340),
(13, 340, 3400),
(14, 77, 770),
(15, 12, 144),
(16, 12, 240),
(17, 100, 1030),
(18, 150, 1725);

-- --------------------------------------------------------

--
-- Table structure for table `clinicals`
--

DROP TABLE IF EXISTS `clinical_data`;
CREATE TABLE IF NOT EXISTS `clinical_data` (
  `document_id` int(11) NOT NULL AUTO_INCREMENT,
  `document_name` varchar(255) NOT NULL,
  `document_description` text,
  `image_blob` text,
  `pdf_blob` text,
  PRIMARY KEY (`document_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clinicals`
--

INSERT INTO `clinicals` (`document_id`, `document_name`, `document_description`, `image_blob`, `pdf_blob`) VALUES
(1, '7yj', '8ij8j', '', ''),
(2, 'o3rejof', 'iejrgfj', '', ''),
(3, 'ufdsk', 'asfdnjn', '', ''),
(4, 'ufdsk', 'asfdnjn', '', ''),
(5, 'ufdsk', 'asfdnjn', '2b88d5f6509d496e277d4605436aed78.jpg', 'entrepreneurship.pdf'),
(6, 'ufdsk', 'asfdnjn', '2b88d5f6509d496e277d4605436aed78.jpg', 'entrepreneurship.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

DROP TABLE IF EXISTS `diagnosis_data`;
CREATE TABLE IF NOT EXISTS `diagnosis_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` CONSTRAINT fk_patient_diagnosis FOREIGN kEY(patient_id)
   REFERENCES patient_data(patient_id),
  `description` varchar(500) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`id`, `patient_id`, `description`, `date`) VALUES
(9, 'qwerty', 'qwertyui', '2023-07-13');

-- --------------------------------------------------------

--
-- Table structure for table `exchange_rates`
--

DROP TABLE IF EXISTS `exchange_rates`;
CREATE TABLE IF NOT EXISTS `exchange_rates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rate` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exchange_rates`
--

INSERT INTO `exchange_rates` (`id`, `rate`) VALUES
(1, '0.75'),
(2, '11.50');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
