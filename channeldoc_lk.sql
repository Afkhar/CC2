-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2022 at 08:21 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `channeldoc.lk`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `NIC` varchar(20) NOT NULL,
  `Email` varchar(225) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Type_of_User` varchar(50) NOT NULL,
  `Phone_No` varchar(10) NOT NULL,
  `Medical_Files` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`First_Name`, `Last_Name`, `NIC`, `Email`, `Password`, `Gender`, `Type_of_User`, `Phone_No`, `Medical_Files`) VALUES
('Afkhar', 'Mohamed', 'A360693', 'afkhar21mohamed@gmail.com', '123456789', 'Male', 'Patient', '760035852', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`NIC`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Phone No.` (`Phone_No`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
