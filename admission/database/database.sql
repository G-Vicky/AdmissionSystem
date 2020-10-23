-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2020 at 02:14 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admission`
--
CREATE DATABASE IF NOT EXISTS `admission` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `admission`;

-- --------------------------------------------------------

--
-- Table structure for table `feetable`
--

CREATE TABLE `feetable` (
  `applno` int(4) NOT NULL,
  `course` varchar(15) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `dob` varchar(15) DEFAULT NULL,
  `community` varchar(10) DEFAULT NULL,
  `board` varchar(10) DEFAULT NULL,
  `cutoff` varchar(8) DEFAULT NULL,
  `language` varchar(10) DEFAULT NULL,
  `selectiondate` date DEFAULT NULL,
  `chno` int(10) DEFAULT NULL,
  `feedate` date DEFAULT NULL,
  `cvdate` varchar(15) DEFAULT NULL,
  `palno` varchar(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `remarks` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `uname` varchar(30) DEFAULT NULL,
  `pwd` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uname`, `pwd`) VALUES
('admin', 'admin'),
('user', 'user'),
('incharge', 'incharge'),
('secretary', 'secretary'),
('cvuser', 'cvuser');

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE `master` (
  `bcomgen` int(5) DEFAULT NULL,
  `bcomcs` int(5) DEFAULT NULL,
  `bcomaf` int(5) DEFAULT NULL,
  `bcombm` int(5) DEFAULT NULL,
  `bcomca` int(5) DEFAULT NULL,
  `bcomism` int(5) DEFAULT NULL,
  `bba` int(5) DEFAULT NULL,
  `bsc` int(5) DEFAULT NULL,
  `bca` int(5) DEFAULT NULL,
  `tmax` int(3) DEFAULT NULL,
  `tmin` int(3) DEFAULT NULL,
  `cmax` int(3) DEFAULT NULL,
  `cmin` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `regdate` date DEFAULT NULL,
  `regno` varchar(30) DEFAULT NULL,
  `course` varchar(15) DEFAULT NULL,
  `applno` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `dob` varchar(12) DEFAULT NULL,
  `disability` varchar(30) DEFAULT NULL,
  `mobileno` varchar(10) DEFAULT NULL,
  `fatherno` varchar(10) DEFAULT NULL,
  `community` varchar(8) DEFAULT NULL,
  `board` varchar(15) DEFAULT NULL,
  `monthofpassing` varchar(15) DEFAULT NULL,
  `language` varchar(10) DEFAULT NULL,
  `passedattempt` varchar(5) DEFAULT NULL,
  `XIIgroup` varchar(8) DEFAULT NULL,
  `subject1` varchar(20) DEFAULT NULL,
  `mark1` int(11) DEFAULT NULL,
  `subject2` varchar(20) DEFAULT NULL,
  `mark2` int(11) DEFAULT NULL,
  `subject3` varchar(20) DEFAULT NULL,
  `mark3` int(11) DEFAULT NULL,
  `subject4` varchar(20) DEFAULT NULL,
  `mark4` int(11) DEFAULT NULL,
  `total` int(10) DEFAULT NULL,
  `percentage` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feetable`
--
ALTER TABLE `feetable`
  ADD PRIMARY KEY (`applno`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`applno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `applno` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
