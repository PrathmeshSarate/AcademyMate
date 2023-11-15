-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2022 at 04:11 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignmets`
--

CREATE TABLE `assignmets` (
  `a_id` varchar(50) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `a_title` varchar(50) NOT NULL,
  `a_desciption` varchar(50) NOT NULL,
  `a_date` date NOT NULL,
  `subject` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `a_files` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignmets`
--

INSERT INTO `assignmets` (`a_id`, `faculty`, `a_title`, `a_desciption`, `a_date`, `subject`, `semester`, `year`, `a_files`) VALUES
('A751297', 'abc xyz', 'balram', 'a', '2022-12-31', 'CS', 'First', 'First', 'SEM5.pdf'),
('A788772', 'abc xyz', 'fef', 'erw', '2022-07-22', 'C# Programming', 'Sixth', 'Third', 'SEM5.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `experiments`
--

CREATE TABLE `experiments` (
  `e_id` varchar(50) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `e_title` varchar(50) NOT NULL,
  `e_aim` varchar(50) NOT NULL,
  `e_description` varchar(100) NOT NULL,
  `dates` date NOT NULL,
  `subject` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `e_files` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `experiments`
--

INSERT INTO `experiments` (`e_id`, `faculty`, `e_title`, `e_aim`, `e_description`, `dates`, `subject`, `semester`, `year`, `e_files`) VALUES
('E440269', 'abc xyz', 'Implementation of Operator overloading', 'To Implementation of Operator overloading', 'Implementation of Operator overloading', '2022-07-31', 'C# Programming', 'Sixth', 'Third', 'SEM5.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fid` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fid`, `fname`, `lname`, `username`, `password`) VALUES
(101, 'abc', 'xyz', 'abcxyz@gmail.com', '1234'),
(102, 'Akashay', 'sarate', 'ak@123', 'ak123'),
(104, 'prathmesh', 'sarate', 'rushikeshjsarate77@gmail.com', 'ar4123');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `notice` text NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `notice`, `date_time`) VALUES
(1, 'Lorem, ipsum dolor sit amet ', '2022-07-06 18:30:00'),
(2, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta, incidunt! Facilis ', '2022-07-07 14:16:28');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `prn_no` int(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `year` varchar(30) NOT NULL,
  `semester` varchar(30) NOT NULL,
  `ph_no` text NOT NULL,
  `address` text NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `prn_no`, `fname`, `mname`, `sname`, `username`, `password`, `year`, `semester`, `ph_no`, `address`, `dob`, `gender`) VALUES
(1, 561615, 'Prathmesh', 'Jaywant', 'Sarate', 'prathmesh@gmail.com', '1159', 'Third', 'Sixth', '+919112101159', 'kop', '2000-07-09', 'male'),
(2, 1244, 'Rohit', 'R', 'Ardalkar', 'rohit@gmail.com', '1234', 'Third', 'Sixth', '9561907813', 'ajara', '2000-12-23', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `student_upload`
--

CREATE TABLE `student_upload` (
  `id` int(11) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `upload_type` enum('assignment','experiment') NOT NULL,
  `file` text NOT NULL,
  `ea_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(50) NOT NULL,
  `subject_name` varchar(75) NOT NULL,
  `semester` enum('First','Second','Third','Fourth','Fifth','Sixth','Seventh','Eighth') NOT NULL,
  `year` enum('First','Second','Third','Fourth') NOT NULL,
  `faculty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`, `semester`, `year`, `faculty`) VALUES
(101, 'C# Programming', 'First', 'Second', 'abc xyz'),
(154, 'jvug', 'Fourth', 'Second', 'bilubgi'),
(502, 'c++', 'Third', 'Second', 'S. M. Mulla'),
(503, 'C#', 'Fourth', 'Second', 'Pramod Kharade'),
(1230, 'CS', 'Sixth', 'Third', 'abc xyz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignmets`
--
ALTER TABLE `assignmets`
  ADD UNIQUE KEY `a_id` (`a_id`);

--
-- Indexes for table `experiments`
--
ALTER TABLE `experiments`
  ADD UNIQUE KEY `e_id` (`e_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD UNIQUE KEY `fid` (`fid`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_upload`
--
ALTER TABLE `student_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD UNIQUE KEY `subject_id` (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_upload`
--
ALTER TABLE `student_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
