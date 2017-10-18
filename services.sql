-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2017 at 02:56 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `services`
--

-- --------------------------------------------------------

--
-- Table structure for table `employeeonservice`
--

CREATE TABLE IF NOT EXISTS `employeeonservice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `employeeonservice`
--

INSERT INTO `employeeonservice` (`id`, `oid`, `uid`) VALUES
(1, 4, 1),
(2, 4, 0),
(3, 4, 2),
(4, 4, 0),
(5, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `service_date` date NOT NULL,
  `type` enum('Home','Office') NOT NULL,
  `location` varchar(100) NOT NULL,
  `made` date NOT NULL,
  `status` enum('0','1') NOT NULL,
  `reports` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `uid`, `qty`, `service_date`, `type`, `location`, `made`, `status`, `reports`) VALUES
(3, 6, 20, '2017-10-21', 'Home', 'Osu', '2017-10-17', '1', NULL),
(4, 6, 10, '2017-10-18', 'Office', 'Accra', '2017-10-17', '1', 'qeqwe qweyqw eqwue dausid asuid q');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` enum('Customer','Employee','Administrator') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `type`) VALUES
(1, 'Fredius Tout Court', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'frediustc@gmail.com', 'Employee'),
(2, 'Andy Tout Court', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'andytc@gmail.com', 'Employee'),
(4, 'Barklays Don', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'admin@admin.com', 'Administrator'),
(6, 'Diomande Dro Freddy Jr', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'ddfj@gmail.com', 'Customer');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
