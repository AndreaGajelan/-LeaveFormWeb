-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2024 at 05:16 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leave-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `jcleavetable`
--

CREATE TABLE `jcleavetable` (
  `id` int(20) NOT NULL,
  `dateToday` date NOT NULL,
  `empId` varchar(255) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `mName` varchar(256) NOT NULL,
  `lName` varchar(256) NOT NULL,
  `sName` varchar(256) NOT NULL,
  `company` enum('JAM Seafoods Inc.','Smart Basket','ANYHOW') NOT NULL,
  `manager` enum('Sammy Garcia','Jimmy Castante','Adrian','Mai','Kieth','Vergilio Cordero','Rolls') NOT NULL,
  `dept` enum('Supply Chain Management','Accounting','Operations') NOT NULL,
  `position` varchar(256) NOT NULL,
  `absenceType` varchar(255) NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `pay` varchar(255) NOT NULL,
  `leaveType` enum('Vacation Leave','Paternity Leave','Bereavement Leave','Sick Leave','Parental Leave','Others') NOT NULL,
  `otherLeaveType` varchar(255) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `reason` varchar(255) NOT NULL,
  `dayToHrs` float NOT NULL,
  `updateStatus` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jcleavetable`
--

INSERT INTO `jcleavetable` (`id`, `dateToday`, `empId`, `fName`, `mName`, `lName`, `sName`, `company`, `manager`, `dept`, `position`, `absenceType`, `startTime`, `endTime`, `pay`, `leaveType`, `otherLeaveType`, `startDate`, `endDate`, `reason`, `dayToHrs`, `updateStatus`, `remarks`) VALUES
(1, '2024-05-23', 'SB1', 'JUAN', 'V', 'DELA CRUZ', 'JR', 'JAM Seafoods Inc.', 'Sammy Garcia', 'Supply Chain Management', 'OJT', 'halfday', '11:18:00', '17:19:00', 'Unpaid', 'Sick Leave', 'NA', '2024-05-23', '2024-05-23', '6 hours im sick :((', 6.01667, 'Rejected', 'engkkk'),
(2, '2024-05-23', 'SB1', 'JUAN', 'V', 'DELA CRUZ', 'JR', 'JAM Seafoods Inc.', 'Sammy Garcia', 'Supply Chain Management', 'OJT', 'halfday', '11:18:00', '17:19:00', 'Unpaid', 'Sick Leave', 'NA', '2024-05-23', '2024-05-23', '6 hours im sick :((', 6.01667, 'Rejected', 'ayoko beh'),
(3, '2024-05-23', 'SB1', 'JUAN', 'V', 'DELA CRUZ', 'JR', 'JAM Seafoods Inc.', 'Sammy Garcia', 'Supply Chain Management', 'OJT', 'halfday', '11:18:00', '17:19:00', 'Unpaid', 'Sick Leave', 'NA', '2024-05-23', '2024-05-23', '6 hours im sick :((', 6.01667, 'Rejected', 'fghfg'),
(4, '2024-05-23', 'JSI1', 'JAM', 'J', 'JAM', 'J', 'JAM Seafoods Inc.', 'Sammy Garcia', 'Accounting', 'EME', 'halfday', '11:20:00', '17:20:00', 'Paid', 'Sick Leave', 'NA', '2024-05-23', '2024-05-23', 'im sick :(( 6 hrs', 6, 'Approved', 'N/A'),
(5, '2024-05-23', 'JSI1', 'JAM', 'J', 'JAM', 'J', 'JAM Seafoods Inc.', 'Sammy Garcia', 'Accounting', 'EME', 'halfday', '11:20:00', '17:20:00', 'Pending', 'Sick Leave', 'NA', '2024-05-23', '2024-05-23', 'im sick :(( 6 hrs', 6, 'Pending', 'Pending'),
(6, '2024-05-23', 'SB3', 'ANDREA', 'HAROCHOC', 'GAJELAN', '', 'JAM Seafoods Inc.', 'Vergilio Cordero', 'Supply Chain Management', 'STAFF', 'wholeday', '00:00:00', '00:00:00', 'Pending', 'Vacation Leave', 'NA', '2024-05-23', '2024-05-30', 'aasd./', 48, 'Pending', 'Pending'),
(7, '2024-05-23', 'JSI1', 'JAM', 'J', 'JAM', 'J', 'JAM Seafoods Inc.', 'Sammy Garcia', 'Accounting', 'EME', 'wholeday', '00:00:00', '00:00:00', 'Pending', 'Vacation Leave', 'NA', '2024-05-23', '2024-05-30', 'asdas', 48, 'Pending', 'Pending'),
(8, '2024-05-23', 'SB1', 'JUAN', 'V', 'DELA CRUZ', 'JR', 'JAM Seafoods Inc.', 'Sammy Garcia', 'Supply Chain Management', 'OJT', 'halfday', '11:23:00', '13:23:00', 'Pending', 'Vacation Leave', 'NA', '2024-05-23', '2024-05-23', 'qwe', 2, 'Pending', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jcleavetable`
--
ALTER TABLE `jcleavetable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jcleavetable`
--
ALTER TABLE `jcleavetable`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
