-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2017 at 11:03 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timetablepro`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(30) NOT NULL,
  `user_id` int(50) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_full_name` varchar(60) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `section` varchar(20) NOT NULL,
  `subject_id` varchar(20) NOT NULL,
  `faculty_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `user_id`, `course_name`, `course_full_name`, `semester`, `section`, `subject_id`, `faculty_id`) VALUES
(49, 24, 'BBA', 'Bachelor of Business Application', 'one', 'a', '24', '24'),
(50, 25, 'B-tech', 'IT', 'five', 'a', '25', '25');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(30) NOT NULL,
  `user_id` int(50) NOT NULL,
  `faculty_code` varchar(30) NOT NULL,
  `faculty_name` varchar(50) NOT NULL,
  `designation` varchar(60) NOT NULL,
  `qualification` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `user_id`, `faculty_code`, `faculty_name`, `designation`, `qualification`) VALUES
(24, 24, '435', 'bbbbb', 'bbbbbb', 'bbbbb'),
(25, 25, 'WE', 'harsh jain', 'automata', 'B-tech');

-- --------------------------------------------------------

--
-- Table structure for table `ruleset`
--

CREATE TABLE `ruleset` (
  `id` int(100) NOT NULL,
  `roomSlot` varchar(2) NOT NULL,
  `teacherSlot` varchar(2) NOT NULL,
  `studentSlot` varchar(2) NOT NULL,
  `roomCapacity` varchar(2) NOT NULL,
  `comSpace` varchar(2) NOT NULL,
  `breakTime` varchar(10) NOT NULL,
  `miniActivity` varchar(2) NOT NULL,
  `teacherTime` varchar(2) NOT NULL,
  `studentTime` varchar(2) NOT NULL,
  `roomTime` varchar(2) NOT NULL,
  `StudentPre` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruleset`
--

INSERT INTO `ruleset` (`id`, `roomSlot`, `teacherSlot`, `studentSlot`, `roomCapacity`, `comSpace`, `breakTime`, `miniActivity`, `teacherTime`, `studentTime`, `roomTime`, `StudentPre`) VALUES
(3, '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(30) NOT NULL,
  `user_id` int(50) NOT NULL,
  `subject_code` varchar(30) NOT NULL,
  `subject_name` varchar(60) NOT NULL,
  `l` varchar(15) NOT NULL,
  `t` varchar(15) NOT NULL,
  `p` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `user_id`, `subject_code`, `subject_name`, `l`, `t`, `p`) VALUES
(24, 24, '123', 'aaaaa', '2', '1', '4'),
(25, 25, 'EOE-234', 'automation', '10', '25', '5');

-- --------------------------------------------------------

--
-- Table structure for table `tablesheet`
--

CREATE TABLE `tablesheet` (
  `id` int(10) NOT NULL,
  `cell` varchar(4) NOT NULL,
  `data` varchar(10) NOT NULL,
  `faculty_name` varchar(20) NOT NULL,
  `timetable_id` varchar(20) NOT NULL,
  `user_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tablesheet`
--

INSERT INTO `tablesheet` (`id`, `cell`, `data`, `faculty_name`, `timetable_id`, `user_id`) VALUES
(85, '10', '123', 'bbbbb', '18', 24),
(86, '19', '123', 'bbbbb', '18', 24),
(87, '27', '123', 'bbbbb', '18', 24),
(89, '37', '123', 'bbbbb', '18', 24),
(90, '8', '123', 'bbbbb', '18', 24),
(91, '40', '123', 'bbbbb', '18', 24),
(92, '9', '123', 'bbbbb', '18', 24),
(96, '46', 'EOE-234', 'harsh jain', '20', 25),
(97, '44', 'EOE-234', 'harsh jain', '20', 25),
(100, '15', 'EOE-234', 'harsh jain', '20', 25),
(102, '28', 'EOE-234', 'harsh jain', '20', 25),
(103, '4', 'EOE-234', 'harsh jain', '20', 25),
(104, '41', 'EOE-234', 'harsh jain', '20', 25),
(105, '25', 'EOE-234', 'harsh jain', '20', 25),
(106, '14', 'EOE-234', 'harsh jain', '20', 25);

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `timetable_id` int(20) NOT NULL,
  `user_id` int(50) NOT NULL,
  `course_full_name` varchar(40) NOT NULL,
  `year` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `course` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`timetable_id`, `user_id`, `course_full_name`, `year`, `semester`, `course`) VALUES
(18, 24, 'Bachelor of Business Application', '2014-2015', 'one', 'BBA'),
(19, 25, 'IT', '2015-2016', 'one', 'B-tech'),
(20, 25, 'IT', '2015-2016', 'five', 'B-tech'),
(21, 25, 'IT', '2015-2016', 'six', 'B-tech'),
(22, 25, 'IT', '2015-2016', 'three', 'B-tech'),
(23, 24, 'Bachelor of Business Application', '2015-2016', 'four', 'BBA');

-- --------------------------------------------------------

--
-- Table structure for table `timing`
--

CREATE TABLE `timing` (
  `id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `first` varchar(20) NOT NULL,
  `second` varchar(20) NOT NULL,
  `third` varchar(20) NOT NULL,
  `fourth` varchar(20) NOT NULL,
  `fifth` varchar(20) NOT NULL,
  `sixth` varchar(20) NOT NULL,
  `seventh` varchar(20) NOT NULL,
  `eight` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timing`
--

INSERT INTO `timing` (`id`, `user_id`, `first`, `second`, `third`, `fourth`, `fifth`, `sixth`, `seventh`, `eight`) VALUES
(3, '24', '8 -9', '9-10', '10-11', '11-12', '12-13', '13-14', '14-15', '15-16'),
(4, '25', '8:45-9:25', '9:45-10:45', '10:45:11:45', '12:45-1:45', '1:45-2:45', '2:45-3:45', '3:45-4:45', '4:45-5:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `date` varchar(30) NOT NULL,
  `time` varchar(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `uname` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `password`, `ip_address`, `date`, `time`, `username`, `email`, `uname`) VALUES
(24, '123', '::1', '2015-05-25', '12:49:04', 'anurag', 'anuragambraham@gmail.com', 'Sharda University'),
(25, '123', '::1', '2017-01-15', '06:20:16', 'wrr', 'ariharsh1994@gmail.com', 'dgrt'),
(26, '123', '::1', '2017-01-17', '18:23:30', 'sccyvd', '795nishi.walia@gmail.com', 'yr67r');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `ruleset`
--
ALTER TABLE `ruleset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tablesheet`
--
ALTER TABLE `tablesheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`timetable_id`);

--
-- Indexes for table `timing`
--
ALTER TABLE `timing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `ruleset`
--
ALTER TABLE `ruleset`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tablesheet`
--
ALTER TABLE `tablesheet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `timetable_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `timing`
--
ALTER TABLE `timing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
