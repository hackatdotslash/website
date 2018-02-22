-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2018 at 08:29 AM
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
  `teamName` varchar(50) NOT NULL,
  `collegeName` varchar(100) NOT NULL,
  `p1Name` varchar(50) NOT NULL,
  `p1Email` varchar(50) NOT NULL,
  `p1Gender` varchar(10) NOT NULL,
  `p1Dob` date NOT NULL,
  `p1Contact` varchar(20) NOT NULL,
  `p1Github` varchar(50) NOT NULL,
  `p1Linkedin` varchar(50) NOT NULL,
  `p1Twitter` varchar(50) NOT NULL,
  `p1Facebook` varchar(50) NOT NULL,
  `p2Name` varchar(50) NOT NULL,
  `p2Email` varchar(50) NOT NULL,
  `p2Gender` varchar(10) NOT NULL,
  `p2Dob` date NOT NULL,
  `p2Contact` varchar(20) NOT NULL,
  `p2Github` varchar(50) NOT NULL,
  `p2Linkedin` varchar(50) NOT NULL,
  `p2Twitter` varchar(50) NOT NULL,
  `p2Facebook` varchar(50) NOT NULL,
  `p3Name` varchar(50) NOT NULL,
  `p3Email` varchar(50) NOT NULL,
  `p3Gender` varchar(10) NOT NULL,
  `p3Dob` date NOT NULL,
  `p3Contact` varchar(20) NOT NULL,
  `p3Github` varchar(50) NOT NULL,
  `p3Linkedin` varchar(50) NOT NULL,
  `p3Twitter` varchar(50) NOT NULL,
  `p3Facebook` varchar(50) NOT NULL,
  `newToHackathon` varchar(10) NOT NULL,
  `heardAboutHackathon` varchar(100) NOT NULL,
  `intrestedInWorkshop` varchar(100) NOT NULL,
  `specialNeeds` varchar(250) NOT NULL
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
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
