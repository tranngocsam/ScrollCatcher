-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 17, 2010 at 11:53 PM
-- Server version: 5.1.46
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `citirunc_catcher`
--

-- --------------------------------------------------------

--
-- Table structure for table `catcher_types`
--

CREATE TABLE IF NOT EXISTS `catcher_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `catcher_types`
--

INSERT INTO `catcher_types` (`id`, `name`) VALUES
(1, 'Alert box'),
(2, 'Dialogue'),
(3, 'Full page');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL DEFAULT '0',
  `group_name` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`) VALUES
(1, 'admin'),
(2, 'editor');

-- --------------------------------------------------------

--
-- Table structure for table `scroll_catchers`
--

CREATE TABLE IF NOT EXISTS `scroll_catchers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `speed` int(11) NOT NULL,
  `distance` int(11) NOT NULL,
  `catcher_type_id` int(11) NOT NULL,
  `alert_content` varchar(2000) NOT NULL,
  `iframe_url` varchar(500) NOT NULL,
  `dialogue_width` int(11) DEFAULT NULL,
  `dialogue_height` int(11) DEFAULT NULL,
  `number_of_monitored_users` int(11) DEFAULT '0',
  `number_of_caught_users` int(11) DEFAULT '0',
  `always_monitor` int(1) DEFAULT NULL,
  `access_code` varchar(50) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `scroll_catchers`
--

INSERT INTO `scroll_catchers` (`id`, `user_id`, `name`, `speed`, `distance`, `catcher_type_id`, `alert_content`, `iframe_url`, `dialogue_width`, `dialogue_height`, `number_of_monitored_users`, `number_of_caught_users`, `always_monitor`, `access_code`, `description`) VALUES
(3, 1, 'Catcher3', 10, 100, 3, 'Should save description and create hash value', 'http://www.google.com', NULL, NULL, 12, 10, NULL, 'b2ecaf70c88aeeaf08963c5a83232af1', 'This is a description.'),
(5, 2, 'iframe', 15, 17, 2, 'der', 'http://www.google.com.ph/', 800, 600, 7, 23, 1, '10ee4ef261d0e12a6d2077eff6a04e8a', 'iframe');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `email`, `lastname`, `password`, `group_id`, `active`) VALUES
(1, 'Administrator', 'admin@lazr.com', 'admin', '0db33dc3a0dee8fab74a332dc3d5f33315a16a2f', 1, 1),
(2, 'Editor', 'editor@lazr.com', 'editor', '0db33dc3a0dee8fab74a332dc3d5f33315a16a2f', 2, 1),
(3, 'Sam', 'samtn@yahoo.com', 'Ngoc', '0db33dc3a0dee8fab74a332dc3d5f33315a16a2f', NULL, 1),
(4, 'hoan', 'linhtinh@yahoo.com', 'hoan', '043a41d2ef6154d6f9e52a2292dce4da5e333ac7', NULL, 1),
(5, 'hoang', 'hoang@yahoo.com', 'hoang', '0db33dc3a0dee8fab74a332dc3d5f33315a16a2f', NULL, 1),
(6, 'lan', 'lan@yahoo.com', 'lan', '0db33dc3a0dee8fab74a332dc3d5f33315a16a2f', NULL, 1),
(7, 'Crystel', 'jewelry_jem@yahoo.com', 'Cortez', 'd7d6ca93ccaadb28adc3573c83232bee14e14685', NULL, 1),
(8, 'Mike', 'mchen8@gmail.com', 'Test', '689d3449f361af040594e2f2c9f0c975b3e8eacc', NULL, 1),
(9, 'Mike2', 'miketest@gmail.com', 'Test2', '02b61b3323767d420674608be0d3cc78884374c8', NULL, 1),
(10, 'Crystel', 'crystelcortezlmc@gmail.com', 'Cortez', 'd7d6ca93ccaadb28adc3573c83232bee14e14685', NULL, 1),
(11, 'Joy', 'cjgcortez@gmail.com', 'Victoria', 'd7d6ca93ccaadb28adc3573c83232bee14e14685', NULL, 1);
