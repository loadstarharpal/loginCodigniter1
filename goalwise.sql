-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 15, 2016 at 12:02 AM
-- Server version: 5.7.13-0ubuntu0.16.04.2
-- PHP Version: 7.0.8-0ubuntu0.16.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goalwise`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `user_name` varchar(222) NOT NULL,
  `password` varchar(233) NOT NULL,
  `role` enum('admin','delivery manager','customer support') NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `user_name`, `password`, `role`, `status`, `mobile`, `image_path`, `created_date`, `modified_date`) VALUES
(9, 'info1@goalwise.com', '8b1a9953c4611296a827abf8c47804d7', 'admin', 'active', '888888888', NULL, '2016-09-14 15:29:29', '2016-09-14 15:29:29'),
(1, 'info@goalwise.com', '8b1a9953c4611296a827abf8c47804d7', 'admin', 'active', '8860396173', '/images/users_img/1445273644_logo.png', '2016-09-14 15:29:29', '2016-09-14 15:29:29');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `login_info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`, `user_id`, `login_info`) VALUES
('06b9074d6be3061a8bebb048981ba01d61125870', '::1', 1473872394, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437333837323338393b75736572496e666f7c733a31383a22696e666f3140676f616c776973652e636f6d223b7573657269647c733a313a2239223b696d6167655f706174687c4e3b726f6c657c733a353a2261646d696e223b, 9, 'Chrome 52.0.2743.116/Linux/Noida'),
('ce4c04a8993537a93c66c500cca39741b5cbf8bc', '127.0.0.1', 1473870307, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437333837303033383b75736572496e666f7c733a32303a22696e666f407461707461706d65616c732e636f6d223b7573657269647c733a313a2231223b696d6167655f706174687c733a33373a222f696d616765732f75736572735f696d672f313434353237333634345f6c6f676f2e706e67223b726f6c657c733a353a2261646d696e223b, 1, 'Firefox 48.0/Linux/Noida'),
('dd7194eac0f17e957f2985e5583c51e9a60763cf', '192.168.0.101', 1473872408, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437333837323235323b75736572496e666f7c733a31373a22696e666f40676f616c776973652e636f6d223b7573657269647c733a313a2231223b696d6167655f706174687c733a33373a222f696d616765732f75736572735f696d672f313434353237333634345f6c6f676f2e706e67223b726f6c657c733a353a2261646d696e223b, 1, 'Chrome 53.0.2785.97/Android/Noida');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`user_name`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_name_2` (`user_name`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
