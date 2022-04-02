-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2022 at 03:47 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voiceup`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(100) NOT NULL,
  `a_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_password`) VALUES
(1, 'admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_mobile` varchar(100) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `c_address` varchar(500) NOT NULL,
  `c_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`c_id`, `c_name`, `c_mobile`, `c_email`, `c_address`, `c_message`) VALUES
(5, 'Shrusti', '9878787876', 'demo@gmail.com', 'sahyadri', 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE `dept` (
  `d_id` int(11) NOT NULL,
  `d_type` varchar(100) NOT NULL,
  `d_mobile` varchar(100) NOT NULL,
  `d_street` varchar(500) NOT NULL,
  `d_city` varchar(100) NOT NULL,
  `d_state` varchar(100) NOT NULL,
  `d_pincode` varchar(100) NOT NULL,
  `d_cpname` varchar(100) NOT NULL,
  `d_cppos` varchar(100) NOT NULL,
  `d_cpeid` varchar(100) NOT NULL,
  `d_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`d_id`, `d_type`, `d_mobile`, `d_street`, `d_city`, `d_state`, `d_pincode`, `d_cpname`, `d_cppos`, `d_cpeid`, `d_password`) VALUES
(1, 'Police', '9672836724', 'Near Post Office, Mangalore', 'UdupiAMangalore', 'Karnataka', '576213', 'Shrusti', 'Inspector ', 'PL-6583939', 'Demo@123'),
(2, 'Municipal', '7834672728', 'Road behind Market', 'Banglore', 'Karnataka', '560004', 'Udit Narayan', 'Social Interaction Incharge', 'VL-678389322', 'Demo@123'),
(3, 'Panchayat', '9876565656', 'Handady', 'Udupi', 'Karnataka', '', 'Shrushti Shetty', 'Panchayat Head', '8767676787', 'Demo@123'),
(4, 'Fire', '9875434543', 'Janaka saketha, Thavarekeremane, Handadi Villege, Bennekudru Post, Via Barkur.', 'Barkur', 'Karnataka', '', 'boda sheera', 'head', 'FI-76565656', 'Demo@123');

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `i_id` int(11) NOT NULL,
  `i_u_id` varchar(100) NOT NULL,
  `i_type` varchar(100) NOT NULL,
  `i_title` varchar(100) NOT NULL,
  `i_des` text NOT NULL,
  `i_exactloc` varchar(500) NOT NULL,
  `i_date` varchar(100) NOT NULL,
  `i_img1` varchar(100) NOT NULL,
  `i_status` varchar(100) NOT NULL DEFAULT '0',
  `i_d_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`i_id`, `i_u_id`, `i_type`, `i_title`, `i_des`, `i_exactloc`, `i_date`, `i_img1`, `i_status`, `i_d_id`) VALUES
(1, '2', 'Police', 'Thief in my house', 'Near Petrol Pump', 'There was a thief in my house.', '2021/07/10', 'issue/57219-theif-1.jpg', '1', 1),
(3, '2', 'Municipal', 'Potholes on the road', 'Please try to solve it. We saw many accidents due to these potholes. Please look into the matter.', 'Main Road', '2021/07/10', 'issue/73817-pathhole-1.jpg', '0', 2),
(6, '2', 'Police', 'Frequently burglars in the shop', 'I hope you really understand this issue and take action so we can live with peace and pride. I am sure you will help all of us.', 'Temple Road', '2021/07/10', 'issue/23692-burglar-1.jpg', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_mobile` varchar(100) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `u_gender` varchar(100) NOT NULL,
  `u_age` varchar(100) NOT NULL,
  `u_street` varchar(500) NOT NULL,
  `u_city` varchar(100) NOT NULL,
  `u_state` varchar(100) NOT NULL,
  `u_pincode` varchar(100) NOT NULL,
  `u_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_mobile`, `u_name`, `u_gender`, `u_age`, `u_street`, `u_city`, `u_state`, `u_pincode`, `u_password`) VALUES
(2, '8764567678', 'Swathiiiiii', 'Female', '20', 'pumpwell', 'manglore', 'karnataka', '560001', 'User@123');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `ondeleteuser` AFTER DELETE ON `user` FOR EACH ROW delete from issue where issue.i_u_id=old.u_id
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`d_id`),
  ADD UNIQUE KEY `d_mobile` (`d_mobile`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `u_mobile` (`u_mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dept`
--
ALTER TABLE `dept`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
