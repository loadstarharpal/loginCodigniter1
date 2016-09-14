
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
('24316ec93be7041459cbf91cd1a5d4ffac0f4b5d', '192.168.0.101', 1473864220, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437333836343230303b75736572496e666f7c733a32303a22696e666f407461707461706d65616c732e636f6d223b7573657269647c733a313a2231223b696d6167655f706174687c733a33373a222f696d616765732f75736572735f696d672f313434353237333634345f6c6f676f2e706e67223b726f6c657c733a353a2261646d696e223b, 1, 'Chrome 53.0.2785.97/Android/Noida'),
('98069a2665a929ace23d8472b2cbb4556811e201', '::1', 1473866795, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437333836363739333b75736572496e666f7c733a32303a22696e666f407461707461706d65616c732e636f6d223b7573657269647c733a313a2231223b696d6167655f706174687c733a33373a222f696d616765732f75736572735f696d672f313434353237333634345f6c6f676f2e706e67223b726f6c657c733a353a2261646d696e223b, 1, 'Chrome 52.0.2743.116/Linux/Noida');

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