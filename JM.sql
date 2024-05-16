-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 08:28 AM
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
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(255) NOT NULL,
  `empId` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `confirmpassword` varchar(256) NOT NULL,
  `fName` varchar(256) NOT NULL,
  `mName` varchar(256) NOT NULL,
  `lName` varchar(256) NOT NULL,
  `sName` varchar(256) NOT NULL,
  `company` enum('JAM Seafoods Inc.','Smart Basket','ANYHOW') NOT NULL,
  `manager` enum('Sammy Garcia','Jimmy Castante','Adrian','Mai','Kieth','Vergilio Cordero','Rolls') NOT NULL,
  `department` enum('Supply Chain Management','Accounting','Operations') NOT NULL,
  `position` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `empId`, `password`, `confirmpassword`, `fName`, `mName`, `lName`, `sName`, `company`, `manager`, `department`, `position`) VALUES
(1, 'SB1', 'sb1', 'sb1', 'JUAN', 'V', 'DELA CRUZ', 'JR', 'JAM Seafoods Inc.', 'Sammy Garcia', 'Supply Chain Management', 'OJT'),
(2, 'SB2', 'sb2', 'sb2', 'JOHN', 'S', 'SAN JUAN', '', 'Smart Basket', 'Vergilio Cordero', 'Supply Chain Management', 'OJT'),
(3, 'AH1', 'ah1', 'ah1', 'MIKE', 'B', 'SAN', 'SR', 'JAM Seafoods Inc.', 'Vergilio Cordero', 'Supply Chain Management', 'OJT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
