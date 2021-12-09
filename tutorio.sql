-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 11:13 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutorio`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Student_ID` int(4) NOT NULL,
  `First_Name` varchar(15) NOT NULL,
  `Last_Name` varchar(15) NOT NULL,
  `Phone_Number` varchar(15) NOT NULL,
  `Age` int(3) NOT NULL,
  `Gender` varchar(15) NOT NULL,
  `Country` varchar(30) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Language` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

CREATE TABLE `student_login` (
  `Email` int(11) NOT NULL,
  `Password` int(11) NOT NULL,
  `Student_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `Subject_ID` int(4) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Certificate` varchar(30) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Experience(years)` int(10) NOT NULL,
  `Tutor_ID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tuition`
--

CREATE TABLE `tuition` (
  `Tuition_ID` int(6) NOT NULL,
  `Tutor_ID` int(4) NOT NULL,
  `Student_ID` int(4) NOT NULL,
  `Subject_ID` int(4) NOT NULL,
  `Date/Time` datetime NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `Tutor_ID` int(4) NOT NULL,
  `First_Name` varchar(15) NOT NULL,
  `Last_Name` varchar(15) NOT NULL,
  `Age` int(3) NOT NULL,
  `Phone_Number` varchar(12) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Country` varchar(30) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Language` varchar(15) NOT NULL,
  `Rating` int(1) NOT NULL,
  `Fee` int(11) NOT NULL,
  `Online/Onsite` varchar(10) NOT NULL,
  `Resumee` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tutor_login`
--

CREATE TABLE `tutor_login` (
  `Email` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Tutor_ID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Student_ID`);

--
-- Indexes for table `student_login`
--
ALTER TABLE `student_login`
  ADD PRIMARY KEY (`Email`),
  ADD KEY `Student_ID` (`Student_ID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`Subject_ID`),
  ADD KEY `Tutor_ID` (`Tutor_ID`);

--
-- Indexes for table `tuition`
--
ALTER TABLE `tuition`
  ADD PRIMARY KEY (`Tuition_ID`),
  ADD KEY `Tutor_ID` (`Tutor_ID`),
  ADD KEY `Student_ID` (`Student_ID`),
  ADD KEY `Subject_ID` (`Subject_ID`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`Tutor_ID`);

--
-- Indexes for table `tutor_login`
--
ALTER TABLE `tutor_login`
  ADD PRIMARY KEY (`Email`),
  ADD KEY `Tutor_ID` (`Tutor_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_login`
--
ALTER TABLE `student_login`
  ADD CONSTRAINT `student_login_ibfk_1` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`Student_ID`);

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`Tutor_ID`) REFERENCES `tutor` (`Tutor_ID`);

--
-- Constraints for table `tuition`
--
ALTER TABLE `tuition`
  ADD CONSTRAINT `tuition_ibfk_1` FOREIGN KEY (`Tutor_ID`) REFERENCES `tutor` (`Tutor_ID`),
  ADD CONSTRAINT `tuition_ibfk_2` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`Student_ID`),
  ADD CONSTRAINT `tuition_ibfk_3` FOREIGN KEY (`Subject_ID`) REFERENCES `subject` (`Subject_ID`);

--
-- Constraints for table `tutor_login`
--
ALTER TABLE `tutor_login`
  ADD CONSTRAINT `tutor_login_ibfk_1` FOREIGN KEY (`Tutor_ID`) REFERENCES `tutor` (`Tutor_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
