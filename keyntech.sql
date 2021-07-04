-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 04, 2021 at 10:20 AM
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
-- Database: `keyntech`
--

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `birth_date` date NOT NULL,
  `mobile_number` varchar(13) NOT NULL,
  `address1` varchar(200) DEFAULT NULL,
  `address2` varchar(200) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `reason` varchar(300) DEFAULT NULL,
  `pdf` text NOT NULL,
  `image1` text,
  `image2` text,
  `image3` text,
  `image4` text,
  `image5` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `username`, `email`, `password`, `birth_date`, `mobile_number`, `address1`, `address2`, `city`, `state`, `country`, `reason`, `pdf`, `image1`, `image2`, `image3`, `image4`, `image5`) VALUES
(1, 'rajin403', 'patelrazin403@gmail.com', '$2y$10$bH9wRmMbQehM5S88WF2H1O4XLxqdxWbsBA4Thk5i4Ar5AeNccTp2u', '1996-09-02', '8200042303', 'saripa pol amod', 'saripa pol amod', 'bharuch', 'GUJRAT', 'INDIA', 'For resume', 'Numpy_Python_Cheat_Sheet (GOOD).pdf', 'cheatsheet (data exploration -Pandas) GOOD.jpg', 'data-visualisation (Matplotlib-Seaborn).jpg', 'infographics (Numpy-Panda-Matplotlib) GOOD.jpg', 'New-Info (text data cleaning only).jpg', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
