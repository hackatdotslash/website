-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2018 at 09:08 AM
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
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`_id`, `teamName`, `p1Name`, `p1Email`, `p1College`, `p1Gender`, `p1Dob`, `p1Contact`, `p1Github`, `p1Linkedin`, `p1Twitter`, `p1Facebook`, `p2Name`, `p2Email`, `p2College`, `p2Gender`, `p2Dob`, `p2Contact`, `p2Github`, `p2Linkedin`, `p2Twitter`, `p2Facebook`, `p3Name`, `p3Email`, `p3College`, `p3Gender`, `p3Dob`, `p3Contact`, `p3Github`, `p3Linkedin`, `p3Twitter`, `p3Facebook`, `newToHackathon`, `heardAboutHackathon`, `intrestedInWorkshop`, `specialNeeds`) VALUES
(6, 'abcd', 'sfafs', 'abcd@gmail.com', '', 'Female', '1997-02-02', '6465465465', 'afafjlkf', '', '', '', '', '', '', '', '1991-01-01', '', '', '', '', '', '', '', '', '', '1991-01-01', '', '', '', '', '', '', 'dafadf', '', ''),
(5, 'afsasf', 'sfaasf', 'aa@gmail.com', '', 'Male', '1997-02-02', '7894561234', 'dsd', 'sdsad', 'sad', 'sad', 'sdsa', 'bb@gmail.com', '', 'Male', '1997-02-02', '1234567890', 'sasa', 'sad', 'sdsa', 'sadsa', 'sadsa', 'cc@gmail.com', '', 'Female', '2001-05-06', '1234567890', 'dfd', 'dfd', 'fdsfds', 'dsf', 'Yes', 'dfdsfd', 'Yes', 'dsfds'),
(4, 'afsasf', 'sfaasf', 'a@gmail.com', '', 'Male', '1997-02-02', '1234567890', 'dsd', 'sdsad', 'sad', 'sad', 'sdsa', 'b@gmail.com', '', 'Male', '1997-02-02', '1234567890', 'sasa', 'sad', 'sdsa', 'sadsa', 'sadsa', 'c@gmail.com', '', 'Female', '2001-05-06', '1234567890', 'dfd', 'dfd', 'fdsfds', 'dsf', 'Yes', 'dfdsfd', 'Yes', 'dsfds'),
(7, NULL, 'alone1', 'alone1@gmail.com', 'dsdgds', 'Male', '1997-02-01', '4654551564', 'dfdsfd', 'dfds', 'dfds', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', 'dfdsf', 'No', 'dsfdsf'),
(8, 'two_team', 'fgfg', 'gfgf@gmail.comdgdsg', '', 'Female', '1997-02-02', '1234567890', 'dsfdsf', 'fdd', 'dfds', 'dfds', 'dfd', 'dfdsf@gmail.comdfsdf', '', 'Female', '1997-02-02', '1234567890', 'dfdfd', 'dfd', 'dfd', 'dfd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', 'dfdf', 'No', 'dfdf'),
(9, 'two_team', 'fgfg', 'gfgf@gmail.com', 'dgdsg', 'Female', '1997-02-02', '1234567890', 'dsfdsf', 'fdd', 'dfds', 'dfds', 'dfd', 'dfdsf@gmail.com', 'dfsdf', 'Female', '1997-02-02', '1234567890', 'dfdfd', 'dfd', 'dfd', 'dfd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', 'dfdf', 'No', 'dfdf'),
(10, 'third', 'dsfds', 'fdfdf', 'dfdsf@gmail.com', 'Female', '1997-02-02', '1234567890', 'fgfgf', 'gfdgfdgfd', 'gfdgfdgfd', 'gdfgfd', 'fdgf', 'gffg@gmail.com', 'fdfd', 'Female', '1997-02-02', '1234567890', 'fdfds', 'dfd', '', 'dfd', 'ddfds', 'dfds@hmail.com', 'fdfdf', 'Male', '1997-02-02', '1234567890', 'dfdsf', 'd', 'e', 'f', 'Yes', 'fdsf', 'No', '');

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
