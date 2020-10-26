-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 26, 2020 at 11:13 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `incident`
--

CREATE TABLE `incident` (
  `id` int(11) NOT NULL,
  `number` char(10) NOT NULL,
  `prefix` char(3) NOT NULL DEFAULT 'INC',
  `short_desc` varchar(60) NOT NULL,
  `priority` varchar(8) NOT NULL,
  `state` varchar(10) NOT NULL DEFAULT 'New',
  `resolution` varchar(500) DEFAULT NULL,
  `opened` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `resolved` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `incident`
--

INSERT INTO `incident` (`id`, `number`, `prefix`, `short_desc`, `priority`, `state`, `resolution`, `opened`, `resolved`) VALUES
(87, 'INC0000087', 'INC', 'asdfasd2467456', 'Low', 'New', NULL, '2020-10-25 23:11:52', NULL),
(102, 'INC0000102', 'INC', 'asdf', 'Low', 'New', NULL, '2020-10-25 23:15:53', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `incident`
--
ALTER TABLE `incident`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `incident`
--
ALTER TABLE `incident`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
