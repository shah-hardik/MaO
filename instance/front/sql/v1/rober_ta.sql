-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 20, 2013 at 11:21 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rober_ta`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `create_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='List of admin users' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `user_name`, `password`, `create_at`, `updated_at`, `last_login`) VALUES
(1, 'admin@admin.com', 'b63d50b8b4be1aaac8f818d986d46814', '2013-04-19 00:00:00', '2013-04-19 00:00:00', '2013-04-19 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE IF NOT EXISTS `configs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(64) CHARACTER SET utf16 NOT NULL,
  `value` varchar(512) CHARACTER SET utf16 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `configs`
--


-- --------------------------------------------------------

--
-- Table structure for table `front_users`
--

CREATE TABLE IF NOT EXISTS `front_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `address` varchar(512) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `link` varchar(512) NOT NULL,
  `logo` varchar(64) NOT NULL,
  `school_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `front_users`
--


-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) NOT NULL,
  `subscription_id` int(11) NOT NULL,
  `amount` double(6,2) NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `school_id` (`school_id`),
  KEY `subscription_id` (`subscription_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `invoices`
--


-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Logging Mechanism' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `logs`
--


-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `content` text NOT NULL,
  `meta_title` varchar(256) NOT NULL,
  `meta_description` varchar(256) NOT NULL,
  `meta_keywords` varchar(256) NOT NULL,
  `url` varchar(16) NOT NULL,
  `enabled` enum('0','1') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COMMENT='Custom Pages' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pages`
--


-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE IF NOT EXISTS `schools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `desc` text NOT NULL,
  `address` varchar(128) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `logo` varchar(64) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `desc`, `address`, `phone`, `email`, `logo`, `created_at`, `updated_at`) VALUES
(12, 'name', 'desc', 'address', 'phone', 'email@gmail.com', '', '2013-04-20 09:58:54', '2013-04-20 09:58:54'),
(14, 'name', 'desc', 'address', 'phone', 'email@gmail.com', '', '2013-04-20 09:59:10', '2013-04-20 09:59:10'),
(15, 'name', 'desc', 'address', 'phone', 'email@gmail.com', '', '2013-04-20 09:59:19', '2013-04-20 09:59:19'),
(16, 'name', 'desc', 'address', 'phone', 'email@gmail.com', '', '2013-04-20 09:59:26', '2013-04-20 09:59:26'),
(17, 'name', 'desc', 'address', 'phone', 'email@gmail.com', '', '2013-04-20 10:00:00', '2013-04-20 10:00:00'),
(18, 'name', 'desc', 'address', 'phone', 'email@gmail.com', '', '2013-04-20 10:02:39', '2013-04-20 10:02:39'),
(19, 'name', 'desc', 'address', 'phone', 'email@gmail.com', '', '2013-04-20 10:02:42', '2013-04-20 10:02:42'),
(20, 'name', 'desc', 'address', 'phone', 'email@gmail.com', '', '2013-04-20 10:02:43', '2013-04-20 10:02:43'),
(21, 'name', 'desc', 'address', 'phone', 'email@gmail.com', '', '2013-04-20 10:02:46', '2013-04-20 10:02:46'),
(22, 'name', 'desc', 'address', 'phone', 'email@gmail.com', '', '2013-04-20 10:02:51', '2013-04-20 10:02:51'),
(23, 'name', 'desc', 'address', 'phone', 'email@gmail.com', '', '2013-04-20 10:02:54', '2013-04-20 10:02:54'),
(24, 'name', 'desc', 'address', 'phone', 'email@gmail.com', '', '2013-04-20 10:02:59', '2013-04-20 10:02:59'),
(26, 'name', 'desc', 'address', 'phone', 'email@gmail.com', '', '2013-04-20 10:04:23', '2013-04-20 10:04:23'),
(27, 'Robert', 'desc', 'address', 'phone', 'email@gmail.com', '', '2013-04-20 10:04:46', '2013-04-20 10:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE IF NOT EXISTS `sponsors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `address` varchar(512) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `link` varchar(512) NOT NULL,
  `logo` varchar(64) NOT NULL,
  `school_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `school_id` (`school_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sponsors`
--


-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `duration` int(11) NOT NULL,
  `amount` double(6,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `subscriptions`
--


-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text CHARACTER SET utf8 NOT NULL,
  `views` bigint(20) NOT NULL,
  `video_file` varchar(64) NOT NULL,
  `school_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `school_id` (`school_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COMMENT='School Videos' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `videos`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD CONSTRAINT `sponsors_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
