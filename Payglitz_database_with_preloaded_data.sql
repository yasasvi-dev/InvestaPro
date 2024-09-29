-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2024 at 11:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payglitz`
--
CREATE DATABASE IF NOT EXISTS `payglitz` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `payglitz`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `cno` int(100) NOT NULL,
  `ano` int(100) NOT NULL,
  `date` date NOT NULL,
  `acctype` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`cno`, `ano`, `date`, `acctype`, `amount`) VALUES
(3, 452866, '2024-09-12', 'Credit', 2200.00),
(1, 186120, '2024-09-25', 'Credit', 4000.00),
(5, 621202, '2024-09-13', 'Collection', -5500.00),
(1, 186120, '2024-09-15', 'Collection', -320.00),
(4, 338074, '2024-09-26', 'Collection', -1800.00),
(6, 433895, '2024-09-14', 'Credit', 6500.00);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cno` int(11) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `cadd` varchar(100) NOT NULL,
  `ctel` varchar(100) NOT NULL,
  `ano` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cno`, `cname`, `cadd`, `ctel`, `ano`) VALUES
(1, 'Suranga Perera', 'Colombo, Sri Lanka', '0762396754', 186120),
(2, 'Rashika Dilshan', 'Badulla, Sri Lanka', '0713549519', 995677),
(3, 'Kumara Prasad', 'Rathnapura, Sri Lanka', '0724457216', 452866),
(4, 'Damith Madushanka', 'Matara, Sri Lanka', '0777589231', 338074),
(5, 'Pathum Weerasinghe', 'Kandy, Sri Lanka', '0715934766', 621202),
(6, 'Dasun Lakmal', 'Pettah, Sri Lanka', '0775434256', 433895);

-- --------------------------------------------------------

--
-- Table structure for table `ulevel`
--

CREATE TABLE `ulevel` (
  `uid` varchar(100) NOT NULL,
  `ulevel` varchar(100) NOT NULL,
  `upage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ulevel`
--

INSERT INTO `ulevel` (`uid`, `ulevel`, `upage`) VALUES
('1', 'dashboard', 'dashboard.php');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` varchar(100) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `upname` varchar(100) NOT NULL,
  `upword` varchar(100) NOT NULL,
  `utel` varchar(100) NOT NULL,
  `umail` varchar(100) NOT NULL,
  `uadmin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uname`, `upname`, `upword`, `utel`, `umail`, `uadmin`) VALUES
('1', 'jayoda', 'godakanda', '2003', '0780878600', 'jayo94@gmail.com', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD KEY `cno` (`cno`),
  ADD KEY `ano` (`ano`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cno`,`ano`),
  ADD UNIQUE KEY `ano` (`ano`);

--
-- Indexes for table `ulevel`
--
ALTER TABLE `ulevel`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`cno`) REFERENCES `customer` (`cno`),
  ADD CONSTRAINT `account_ibfk_2` FOREIGN KEY (`ano`) REFERENCES `customer` (`ano`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
