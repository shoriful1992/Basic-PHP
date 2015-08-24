-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 24, 2015 at 09:49 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `xyzltd`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `father_name` varchar(80) DEFAULT NULL,
  `hobby` varchar(80) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `gendar` varchar(30) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `photo` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`member_id`, `name`, `father_name`, `hobby`, `email`, `password`, `gendar`, `address`, `photo`) VALUES
(24, 'Shoriful Islam', 'Abdul Khalek', 'Cricket,Football', 'shoriful.cse.1992@gmail.com', '8bb7ec87229063eb50843f954b889e0d', 'male', 'Turag-Dhaka', 'photos/906IMG_20150508_183147.jpg'),
(20, 'Md.Shoriful', 'Abdul Khalek', 'Cricket,Cycle', 'shorif@gmail.com', '4fb376683689ca3683f4b67720d6e1df', 'male', 'ewhe', 'photos/31'),
(23, 'Md.Shoriful', 'Abdul Khalek', 'Cricket', 'dddd@gg.com', 'afdd0b4ad2ec172c586e2150770fbf9e', 'Female', 'xcvxcv', 'photos/4422.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
