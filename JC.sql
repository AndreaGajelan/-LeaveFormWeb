-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 08:29 AM
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
-- Table structure for table `leavetable`
--

CREATE TABLE `leavetable` (
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
  `dayToHrs` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leavetable`
--

INSERT INTO `leavetable` (`dateToday`, `empId`, `fName`, `mName`, `lName`, `sName`, `company`, `manager`, `dept`, `position`, `absenceType`, `startTime`, `endTime`, `pay`, `leaveType`, `otherLeaveType`, `startDate`, `endDate`, `reason`, `dayToHrs`) VALUES
('2024-05-15', 'SB1', '', '', '', '', '', '', 'Supply Chain Management', '', 'wholeday', '00:00:00', '00:00:00', '', 'Vacation Leave', 'NA', '2024-05-21', '2024-05-28', 'sad', 168),
('2024-05-15', 'SB1', 'JUAN', 'V', 'DELA CRUZ', 'JR', 'JAM Seafoods Inc.', 'Sammy Garcia', 'Supply Chain Management', '', 'wholeday', '00:00:00', '00:00:00', '', 'Vacation Leave', 'NA', '2024-05-22', '2024-05-29', 'asas', 56),
('2024-05-15', 'SB1', 'JUAN', 'V', 'DELA CRUZ', 'JR', 'JAM Seafoods Inc.', 'Sammy Garcia', 'Supply Chain Management', '', 'wholeday', '00:00:00', '00:00:00', '', 'Paternity Leave', 'NA', '2024-05-21', '2024-05-29', 'sad', 64),
('2024-05-15', 'SB1', 'JUAN', 'V', 'DELA CRUZ', 'JR', 'JAM Seafoods Inc.', 'Sammy Garcia', 'Supply Chain Management', 'OJT', 'wholeday', '00:00:00', '00:00:00', '', 'Vacation Leave', 'NA', '2024-05-21', '2024-05-28', 'sas', 56),
('2024-05-16', 'SB1', 'JUAN', 'V', 'DELA CRUZ', 'JR', 'JAM Seafoods Inc.', 'Sammy Garcia', 'Supply Chain Management', 'OJT', 'wholeday', '00:00:00', '00:00:00', '', 'Vacation Leave', 'NA', '2024-05-21', '2024-05-28', 'adasd', 56),
('2024-05-16', 'SB1', 'JUAN', 'V', 'DELA CRUZ', 'JR', 'JAM Seafoods Inc.', 'Sammy Garcia', 'Supply Chain Management', 'OJT', 'wholeday', '00:00:00', '00:00:00', '', 'Vacation Leave', 'NA', '2024-05-30', '2024-06-06', 'aA', 56),
('2024-05-16', 'SB1', 'JUAN', 'V', 'DELA CRUZ', 'JR', 'JAM Seafoods Inc.', 'Sammy Garcia', 'Supply Chain Management', 'OJT', 'wholeday', '00:00:00', '00:00:00', '', 'Sick Leave', 'NA', '2024-05-29', '2024-06-03', 'azxzx', 0),
('2024-05-16', 'AH1', 'MIKE', 'B', 'SAN', 'SR', 'JAM Seafoods Inc.', 'Vergilio Cordero', 'Supply Chain Management', 'OJT', 'wholeday', '00:00:00', '00:00:00', '', 'Sick Leave', 'NA', '2024-05-27', '2024-05-29', 'asas', 16),
('2024-05-16', 'SB2', 'JOHN', 'S', 'SAN JUAN', '', 'Smart Basket', 'Vergilio Cordero', 'Supply Chain Management', 'OJT', 'wholeday', '00:00:00', '00:00:00', '', 'Vacation Leave', 'NA', '2024-06-03', '2024-06-17', 'wqe', 112);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
