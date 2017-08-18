-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2016 at 03:19 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_data`
--

CREATE TABLE `admin_data` (
  `ad_id` int(13) NOT NULL,
  `ad_user` varchar(150) NOT NULL,
  `ad_fname` varchar(150) NOT NULL,
  `ad_lname` varchar(150) NOT NULL,
  `ad_pass` varchar(200) NOT NULL,
  `ad_email` varchar(200) NOT NULL,
  `ad_avatar` text NOT NULL,
  `ad_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_data`
--

INSERT INTO `admin_data` (`ad_id`, `ad_user`, `ad_fname`, `ad_lname`, `ad_pass`, `ad_email`, `ad_avatar`, `ad_time`) VALUES
(11413038, 'Vrijraj', 'Vrijraj', 'Singh', '6f6e9eb4612166099090c8747cc8aaaa', 'vrijraj2396@gmail.com', 'http://bootdey.com/img/Content/avatar/avatar2.png', '2016-07-13 18:56:22');

-- --------------------------------------------------------

--
-- Table structure for table `games_cat`
--

CREATE TABLE `games_cat` (
  `GC_ID` int(13) NOT NULL,
  `GC_NAME` varchar(200) NOT NULL,
  `GC_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `games_cat`
--

INSERT INTO `games_cat` (`GC_ID`, `GC_NAME`, `GC_TIME`) VALUES
(5000, 'Action', '2016-07-13 18:49:51'),
(5001, 'Racing', '2016-07-13 18:49:51'),
(5003, 'Adventure', '2016-07-13 18:53:18'),
(5004, 'Fighting', '2016-07-13 18:53:18'),
(5005, 'Simulation', '2016-07-13 18:54:23'),
(5006, 'Sports', '2016-07-13 18:58:01');

-- --------------------------------------------------------

--
-- Table structure for table `games_data`
--

CREATE TABLE `games_data` (
  `G_ID` int(13) NOT NULL,
  `G_NAME` varchar(500) NOT NULL,
  `G_SIZE` float NOT NULL,
  `G_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `GC_ID` int(13) NOT NULL,
  `GSD_ID` int(13) NOT NULL,
  `GT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `games_data`
--

INSERT INTO `games_data` (`G_ID`, `G_NAME`, `G_SIZE`, `G_TIME`, `GC_ID`, `GSD_ID`, `GT_ID`) VALUES
(162000, 'IGI 1', 300, '2016-07-15 08:28:19', 5000, 1, 1),
(162003, 'IGI 1', 300, '2016-07-15 08:30:49', 5000, 1, 2),
(162004, 'IGI 2', 3.2, '2016-07-15 08:30:49', 5000, 2, 1),
(162005, 'Desert Storm 1', 3.6, '2016-07-15 08:40:45', 5000, 1, 1),
(162006, 'Desert Storm 2', 3.9, '2016-07-15 09:17:26', 5000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `games_size_data`
--

CREATE TABLE `games_size_data` (
  `GSD_ID` int(13) NOT NULL,
  `GSD_NAME` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `games_size_data`
--

INSERT INTO `games_size_data` (`GSD_ID`, `GSD_NAME`) VALUES
(1, 'MB'),
(2, 'GB');

-- --------------------------------------------------------

--
-- Table structure for table `game_type`
--

CREATE TABLE `game_type` (
  `GT_ID` int(13) NOT NULL,
  `GT_NAME` varchar(150) NOT NULL,
  `GT_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game_type`
--

INSERT INTO `game_type` (`GT_ID`, `GT_NAME`, `GT_TIME`) VALUES
(1, 'PC', '2016-07-16 12:01:03'),
(2, 'XBOX', '2016-07-16 12:01:03'),
(3, 'Playstation', '2016-07-16 12:01:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_data`
--
ALTER TABLE `admin_data`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `games_cat`
--
ALTER TABLE `games_cat`
  ADD PRIMARY KEY (`GC_ID`);

--
-- Indexes for table `games_data`
--
ALTER TABLE `games_data`
  ADD PRIMARY KEY (`G_ID`),
  ADD UNIQUE KEY `G_NAME` (`G_NAME`,`GT_ID`) USING BTREE,
  ADD KEY `GC_ID` (`GC_ID`) USING BTREE,
  ADD KEY `GSD_ID` (`GSD_ID`),
  ADD KEY `GT_ID` (`GT_ID`);

--
-- Indexes for table `games_size_data`
--
ALTER TABLE `games_size_data`
  ADD PRIMARY KEY (`GSD_ID`);

--
-- Indexes for table `game_type`
--
ALTER TABLE `game_type`
  ADD PRIMARY KEY (`GT_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_data`
--
ALTER TABLE `admin_data`
  MODIFY `ad_id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11413039;
--
-- AUTO_INCREMENT for table `games_cat`
--
ALTER TABLE `games_cat`
  MODIFY `GC_ID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5010;
--
-- AUTO_INCREMENT for table `games_data`
--
ALTER TABLE `games_data`
  MODIFY `G_ID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162012;
--
-- AUTO_INCREMENT for table `games_size_data`
--
ALTER TABLE `games_size_data`
  MODIFY `GSD_ID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `game_type`
--
ALTER TABLE `game_type`
  MODIFY `GT_ID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `games_data`
--
ALTER TABLE `games_data`
  ADD CONSTRAINT `games_data_ibfk_1` FOREIGN KEY (`GC_ID`) REFERENCES `games_cat` (`GC_ID`),
  ADD CONSTRAINT `games_data_ibfk_2` FOREIGN KEY (`GSD_ID`) REFERENCES `games_size_data` (`GSD_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `games_data_ibfk_3` FOREIGN KEY (`GT_ID`) REFERENCES `game_type` (`GT_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
