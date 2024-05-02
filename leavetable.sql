-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2024 at 09:20 AM
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
  `fullName` varchar(255) NOT NULL,
  `company` enum('JAM','SB','ANYHOW') NOT NULL,
  `dept` enum('Supply Chain Mgmt','Accounting','Operations') NOT NULL,
  `absenceType` varchar(255) NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `pay` varchar(255) NOT NULL,
  `leaveType` enum('Vacation Leave','Paternity Leave','Bereavement Leave','Sick Leave','Parental Leave','Others') NOT NULL,
  `otherLeaveType` varchar(255) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `reason` varchar(255) NOT NULL,
  `daysToHrs` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leavetable`
--

INSERT INTO `leavetable` (`dateToday`, `empId`, `fullName`, `company`, `dept`, `absenceType`, `startTime`, `endTime`, `pay`, `leaveType`, `otherLeaveType`, `startDate`, `endDate`, `reason`, `daysToHrs`) VALUES
('0000-00-00', '', '', '', '', 'undertime', '00:00:00', '00:00:00', '', '', '', '0000-00-00', '0000-00-00', '', 0),
('0000-00-00', '', '', '', '', 'wholeday', '00:00:00', '00:00:00', '', '', '', '0000-00-00', '0000-00-00', '', 0),
('2024-05-02', 'WAWAW18', 'ANDREA GAJELAN', 'JAM', 'Supply Chain Mgmt', 'halfday', '09:20:00', '23:21:00', 'Unpaid', 'Parental Leave', 'NA', '2024-05-02', '2024-05-03', 'asdadasd', 24),
('2024-05-02', 'EMP0001', 'ANDREA GAJELAN', 'JAM', 'Supply Chain Mgmt', 'halfday', '00:36:00', '23:36:00', 'Paid', 'Others', 'sekretong malupet', '2024-05-02', '2024-05-03', 'secret ulet', 24);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
