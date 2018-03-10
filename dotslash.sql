-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2018 at 09:17 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dotslash`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `_id` int(11) NOT NULL,
  `teamName` varchar(50) DEFAULT NULL,
  `p1Name` varchar(50) DEFAULT NULL,
  `p1Email` varchar(50) DEFAULT NULL,
  `p1College` varchar(100) DEFAULT NULL,
  `p1Gender` varchar(10) DEFAULT NULL,
  `p1Dob` varchar(20) DEFAULT NULL,
  `p1Contact` varchar(20) DEFAULT NULL,
  `p1Github` varchar(50) DEFAULT NULL,
  `p1Linkedin` varchar(50) DEFAULT NULL,
  `p1Twitter` varchar(50) DEFAULT NULL,
  `p1Facebook` varchar(50) DEFAULT NULL,
  `p2Name` varchar(50) DEFAULT NULL,
  `p2Email` varchar(50) DEFAULT NULL,
  `p2College` varchar(100) DEFAULT NULL,
  `p2Gender` varchar(10) DEFAULT NULL,
  `p2Dob` varchar(20) DEFAULT NULL,
  `p2Contact` varchar(20) DEFAULT NULL,
  `p2Github` varchar(50) DEFAULT NULL,
  `p2Linkedin` varchar(50) DEFAULT NULL,
  `p2Twitter` varchar(50) DEFAULT NULL,
  `p2Facebook` varchar(50) DEFAULT NULL,
  `p3Name` varchar(50) DEFAULT NULL,
  `p3Email` varchar(50) DEFAULT NULL,
  `p3College` varchar(100) DEFAULT NULL,
  `p3Gender` varchar(10) DEFAULT NULL,
  `p3Dob` varchar(20) DEFAULT NULL,
  `p3Contact` varchar(20) DEFAULT NULL,
  `p3Github` varchar(50) DEFAULT NULL,
  `p3Linkedin` varchar(50) DEFAULT NULL,
  `p3Twitter` varchar(50) DEFAULT NULL,
  `p3Facebook` varchar(50) DEFAULT NULL,
  `newToHackathon` varchar(10) DEFAULT NULL,
  `heardAboutHackathon` varchar(100) DEFAULT NULL,
  `intrestedInWorkshop` varchar(100) DEFAULT NULL,
  `specialNeeds` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
