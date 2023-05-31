-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2023 at 08:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userinfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `phpuser`
--

CREATE TABLE `phpuser` (
  `userID` int(4) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phpuser`
--

INSERT INTO `phpuser` (`userID`, `name`, `email`, `password`) VALUES
(1, 'testname', 'name@example.com', '1234'),
(2, 'john', 'john@doe.com', '1234'),
(3, 'alice', 'alice@mail.com', '1234'),
(4, 'bob', 'bob@tex.com', '1234'),
(5, 'david', 'david@mail.com', '1234'),
(6, 'camel', 'camel@cactus.com', '1234'),
(7, 'NineFathoms', 'nine@fathoms.com', '1234'),
(8, 'nor', 'nor@cf.com', '1234'),
(9, 'student', 'student@insti.com', '1234'),
(10, 'kid', 'kid@kid.com', '1234'),
(11, 'shinpei', 'ushio@email.com', '1234'),
(12, 'mio', 'mio@chan.com', '1234'),
(13, 'user11', '61@user.com', '1234'),
(14, 'buffalo', 'buffalo@zoo.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `phpusetimetable`
--

CREATE TABLE `phpusetimetable` (
  `ttid` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `monday` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT 'Free',
  `tuesday` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT 'Free',
  `wednesday` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT 'Free',
  `thursday` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT 'Free',
  `friday` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT 'Free'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phpusetimetable`
--

INSERT INTO `phpusetimetable` (`ttid`, `userID`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`) VALUES
(7, 7, '{\"slots\":[\"Task A\",\"Task B\",\"Task Monday 2\",\"Math\",\"E\",\"F\",\"G\",\"H\",\"I\",\"J\"],\"location\":[\"Room A\",\"Room 512\",\"cc\",\"Room 101\",\"ee\",\"ff\",\"gg\",\"hh\",\"ii\",\"jj\"]}', '{\"slots\":[\"Task A\",\"New Task\",\"Task Monday 2\",\"D\",\"E\",\"F\",\"G\",\"H\",\"I\",\"J\"],\n\"location\":[\"aa\",\"bb\", \"cc\",\"dd\",\"ee\",\"ff\",\"gg\",\"hh\",\"ii\",\"jj\"]}', '{\"slots\":[\"Task A\",\"New Task\",\"Some Course\",\"D\",\"E\",\"F\",\"G\",\"H\",\"I\",\"J\"],\"location\":[\"aa\",\"bb\",\"Windows\",\"dd\",\"ee\",\"ff\",\"gg\",\"hh\",\"ii\",\"jj\"]}', '{\"slots\":[\"Task A\",\"New Task\",\"Task Monday 2\",\"D\",\"E\",\"F\",\"G\",\"H\",\"I\",\"J\"],\n\"location\":[\"aa\",\"bb\", \"cc\",\"dd\",\"ee\",\"ff\",\"gg\",\"hh\",\"ii\",\"jj\"]}', '{\"slots\":[\"Task A\",\"New Task\",\"Task Monday 2\",\"D\",\"E\",\"F\",\"G\",\"H\",\"I\",\"Course 10\"],\"location\":[\"aa\",\"bb\",\"cc\",\"dd\",\"ee\",\"ff\",\"gg\",\"hh\",\"ii\",\"Block C\"]}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `phpuser`
--
ALTER TABLE `phpuser`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `phpusetimetable`
--
ALTER TABLE `phpusetimetable`
  ADD PRIMARY KEY (`ttid`),
  ADD KEY `FK` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `phpuser`
--
ALTER TABLE `phpuser`
  MODIFY `userID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `phpusetimetable`
--
ALTER TABLE `phpusetimetable`
  MODIFY `ttid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `phpusetimetable`
--
ALTER TABLE `phpusetimetable`
  ADD CONSTRAINT `FK` FOREIGN KEY (`userID`) REFERENCES `phpuser` (`userID`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
