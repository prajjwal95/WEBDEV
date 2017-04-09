-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 09, 2017 at 01:45 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DBS_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `Basketball`
--

CREATE TABLE `Basketball` (
  `teamID` varchar(100) COLLATE utf8_bin NOT NULL,
  `gender` varchar(10) COLLATE utf8_bin NOT NULL,
  `delegate_numbers` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Basketball`
--

INSERT INTO `Basketball` (`teamID`, `gender`, `delegate_numbers`) VALUES
('BB1000', 'female', '1003,1004,1005'),
('BB1001', 'female', '1003,1004,'),
('BB1002', 'male', '1001,1002,'),
('BB1003', 'male', '1000,'),
('BB1004', 'male', '1000,'),
('FB1001', 'female', '1003,1004,'),
('FB1002', 'female', '1001,1002,1003,1004,'),
('FB1003', 'male', '1000,1001,1002,'),
('FB1004', 'male', '1001,');

-- --------------------------------------------------------

--
-- Table structure for table `delegate_card_generation`
--

CREATE TABLE `delegate_card_generation` (
  `delegate_number` int(5) NOT NULL,
  `Name` text COLLATE utf8_bin NOT NULL,
  `RegNo` varchar(15) COLLATE utf8_bin NOT NULL,
  `College` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(30) COLLATE utf8_bin NOT NULL,
  `Phone` bigint(10) NOT NULL,
  `Gender` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `delegate_card_generation`
--

INSERT INTO `delegate_card_generation` (`delegate_number`, `Name`, `RegNo`, `College`, `email`, `Phone`, `Gender`) VALUES
(1000, 'Dattatreya Nayak', '150905042', 'MIT Manipal', 'dattu4621@gmail.com', 8197379841, 'male'),
(1001, 'Antony Lewis', '150905081', 'MIT Manipal', '7tonylewis31@gmail.com', 7760237797, 'male'),
(1002, 'Rajath R', '150911088', 'MIT Manipal', 'rajathr@gmail.com', 8970307554, 'male'),
(1003, 'Usha', '150905066', 'MIT Manipal', 'usha@gmail.com', 9880484481, 'female'),
(1004, 'Radha', '150905068', 'MIT Manipal', 'radha@gmail.com', 9880484482, 'female'),
(1005, 'Rashmi', '150905090', 'MIT,Manipal', 'rashmi@gmail.com', 1234567890, 'femlae'),
(1006, 'Dattatreya Nayak', '150905042', 'MIT Manipal ', 'dattu4621@gmail.com', 8197379841, 'male'),
(1007, 'Rajath Nayak', '160905042', 'MIT Manipal ', 'dattu4621@gmail.com', 8197379841, 'male'),
(1008, 'Rahul Rao', '160905055', 'MIT Manipal ', 'dattu4621@gmail.com', 8197379841, 'male'),
(1009, 'Prajjwal Rai', '150905042', 'MIT Manipal', 'sdas@gmail.com', 8197379841, 'male');

-- --------------------------------------------------------

--
-- Table structure for table `Football`
--

CREATE TABLE `Football` (
  `teamID` varchar(100) COLLATE utf8_bin NOT NULL,
  `gender` varchar(10) COLLATE utf8_bin NOT NULL,
  `delegate_numbers` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Football`
--

INSERT INTO `Football` (`teamID`, `gender`, `delegate_numbers`) VALUES
('BB1000', 'female', '1003,1004,1005'),
('BB1003', 'male', '1000,'),
('FB1000', 'female', ',1003,1004'),
('FB1001', 'female', '1003,1004,'),
('FB1002', 'female', '1001,1002,1003,1004,'),
('FB1003', 'male', '1000,1001,1002,'),
('FB1004', 'male', '1001,'),
('FB1005', 'male', '1006,1007,1008,'),
('FB1006', 'male', '1001,1000,1002,');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `delegate_number` int(11) DEFAULT NULL,
  `participation` char(1) COLLATE utf8_bin DEFAULT NULL,
  `team_id` varchar(20) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `team_id` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `game` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `prize` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `Tennis`
--

CREATE TABLE `Tennis` (
  `teamID` varchar(20) COLLATE utf8_bin NOT NULL,
  `gender` char(1) COLLATE utf8_bin NOT NULL,
  `delegate_numbers` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Basketball`
--
ALTER TABLE `Basketball`
  ADD UNIQUE KEY `teamID` (`teamID`);

--
-- Indexes for table `delegate_card_generation`
--
ALTER TABLE `delegate_card_generation`
  ADD PRIMARY KEY (`delegate_number`);

--
-- Indexes for table `Football`
--
ALTER TABLE `Football`
  ADD UNIQUE KEY `teamID` (`teamID`),
  ADD UNIQUE KEY `teamID_2` (`teamID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
