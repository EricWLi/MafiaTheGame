-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2016 at 04:27 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mafia`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` varchar(6) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mafia`
--

CREATE TABLE IF NOT EXISTS `mafia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(16) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gameid` varchar(6) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uuid` (`uuid`),
  UNIQUE KEY `uuid_2` (`uuid`),
  UNIQUE KEY `uuid_3` (`uuid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=157 ;

--
-- Dumping data for table `mafia`
--

INSERT INTO `mafia` (`id`, `uuid`, `name`, `gameid`, `role`, `status`) VALUES
(141, 'ILRKDLYVHN72BTPZ', 'Eric Li', '3SY1VU', 5, 1),
(142, 'TQ70HGWY9KI6N7AI', 'Bob', '3SY1VU', 2, 1),
(143, 'X9PA6WY2LDER49RQ', 'Brian', '3SY1VU', 5, 1),
(144, 'KYWAJVKEIL24X7KD', 'Joseph', '3SY1VU', 3, 1),
(145, 'Y68PTX7RKKIOWELJ', 'Eric', 'T9SFKW', 2, 1),
(146, '2AEXSKGXA3O687KR', 'Test1', 'T9SFKW', 2, 1),
(147, 'WQ28Z2NPPZBSSVHK', 'Test2', 'T9SFKW', 2, 1),
(148, 'GJ6MEDT2V7EHKDEY', 'Test3', 'T9SFKW', 5, 1),
(149, 'QS33ILGF0XD5QV14', 'Eric', 'NRRYKU', 4, 1),
(150, '1EH2W4C7A4HHMH4Q', 'Joey', 'NRRYKU', 5, 1),
(151, 'N26O8K1NEZBEPE8R', 'Bob', 'NRRYKU', 2, 1),
(152, 'WU0CK9C3MCVEI7R2', 'Brandon', 'NRRYKU', 3, 1),
(153, 'F6PNYJ47XYQT7C58', 'Eric', 'JE1CDY', 5, 1),
(154, '57FOKI6UTQIYQT0R', 'Bob', 'JE1CDY', 0, 1),
(155, 'O8RFIZCPJHWTLQYH', 'Brandon', 'JE1CDY', 1, 1),
(156, 'X4MCNT26D9AOJMJN', 'Joey', 'JE1CDY', 1, 1);
--
-- Database: `test`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
