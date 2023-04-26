-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220513.fb9d9feb74
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2022 at 06:16 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diadiet`
--
CREATE DATABASE IF NOT EXISTS `diadiet` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `diadiet`;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `profilepic` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `phonenumber` bigint(10) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`firstname`, `lastname`, `email`, `profilepic`, `gender`, `phonenumber`, `password`) VALUES
('PRATHYUSHA', 'K', 'prathyu2001@gmail.com', '6323006c16afe.png', 'Male', 1234567890, 'Prathyu@123'),
('pravalika', 'j', 'pravalika1122@gmail.com', '632301f44ed47.png', 'Male', 1122112211, 'Pravalika@123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



