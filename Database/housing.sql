-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2018 at 03:42 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `housing`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(55) NOT NULL,
  `admin_email` varchar(55) NOT NULL,
  `admin_pass` varchar(55) NOT NULL,
  `admin_role` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_role`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `bill_no` int(55) NOT NULL,
  `mem_id` int(55) NOT NULL,
  `bill_date` date NOT NULL,
  `bill_month` date NOT NULL,
  `due_date` date NOT NULL,
  `m_charge` decimal(9,2) NOT NULL,
  `et_fund` decimal(9,2) NOT NULL,
  `s_fund` decimal(9,2) NOT NULL,
  `r_fund` decimal(9,2) NOT NULL,
  `bill_total` decimal(9,2) NOT NULL,
  `last_update` date NOT NULL,
  `billpay_date` date NOT NULL,
  `bill_status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`bill_no`, `mem_id`, `bill_date`, `bill_month`, `due_date`, `m_charge`, `et_fund`, `s_fund`, `r_fund`, `bill_total`, `last_update`, `billpay_date`, `bill_status`) VALUES
(3, 3, '2018-02-25', '2018-02-25', '0000-00-00', '12125.00', '54564.00', '5.00', '0.00', '66694.00', '2018-02-25', '2018-02-25', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `com_id` int(11) NOT NULL,
  `com_name` varchar(55) NOT NULL,
  `com_phone` varchar(10) NOT NULL,
  `com_email` varchar(55) NOT NULL,
  `com_title` varchar(55) NOT NULL,
  `com_msg` varchar(255) NOT NULL,
  `com_status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(55) NOT NULL,
  `event_body` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_dur` varchar(11) NOT NULL,
  `event_address` varchar(255) NOT NULL,
  `event_status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `pid` int(11) NOT NULL,
  `ptitle` varchar(55) NOT NULL,
  `pfile` varchar(55) NOT NULL,
  `pstatus` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`pid`, `ptitle`, `pfile`, `pstatus`) VALUES
(22, '3', '3.jpg', 'Approved'),
(23, '4', '4.jpg', 'Approved'),
(25, '5', '5.jpg', 'Approved'),
(29, '8', '8.jpg', 'Approved'),
(30, '10', '10.jpg', 'Approved'),
(31, '11', '11.jpg', 'Approved'),
(32, '12', '12.jpg', 'Approved'),
(33, '13', '13.jpg', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `mem_id` int(11) NOT NULL,
  `mem_name` varchar(55) NOT NULL,
  `mem_email` varchar(55) NOT NULL,
  `mem_pass` varchar(55) NOT NULL,
  `mem_mobile` varchar(10) NOT NULL,
  `mem_flat` varchar(55) NOT NULL,
  `mem_wing` varchar(55) NOT NULL,
  `mem_type` varchar(25) NOT NULL,
  `mem_verify` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`mem_id`, `mem_name`, `mem_email`, `mem_pass`, `mem_mobile`, `mem_flat`, `mem_wing`, `mem_type`, `mem_verify`) VALUES
(3, 'Rajesh Raj', 'rajesh@gmail.com', 'rajesh', '8655237761', '50', 'B', 'Owner', 'Valid');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(55) NOT NULL,
  `notice_title` varchar(55) NOT NULL,
  `notice_body` varchar(255) NOT NULL,
  `notice_status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `notice_title`, `notice_body`, `notice_status`) VALUES
(1, 'Rajesh', 'Today Is His Birthday', 'Approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`bill_no`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `bill_no` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
