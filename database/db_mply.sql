-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2017 at 10:32 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mply`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applicant`
--

CREATE DATABASE IF NOT EXISTS db_mply;
USE db_mply;

CREATE TABLE `tbl_applicant` (
  `applicant_ID` int(11) NOT NULL,
  `applicant_lname` varchar(50) NOT NULL,
  `applicant_fname` varchar(50) NOT NULL,
  `applicant_mname` varchar(50) NOT NULL,
  `applicant_age` int(11) NOT NULL,
  `applicant_gender` varchar(50) NOT NULL,
  `applicant_address` text NOT NULL,
  `applicant_emailadd` text NOT NULL,
  `applicant_contactno` text NOT NULL,
  `applicant_username` varchar(50) NOT NULL,
  `applicant_password` varchar(50) NOT NULL,
  `applicant_image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_applicant`
--

INSERT INTO `tbl_applicant` (`applicant_ID`, `applicant_lname`, `applicant_fname`, `applicant_mname`, `applicant_age`, `applicant_gender`, `applicant_address`, `applicant_emailadd`, `applicant_contactno`, `applicant_username`, `applicant_password`, `applicant_image`) VALUES
(1, 'Barron', 'Gerry', 'Ocena', 23, 'Male', 'Castillejos, Zambales', 'gerrybarron@live.com', '09098747813', 'gerry', 'gerry', 'unknown.png'),
(2, 'Austria', 'Gerald', 'Gomez', 19, 'Male', 'Olongapo City', 'gerald@yahoo.com', '0909090988', 'gerald', 'gerald', 'gerald.jpg'),
(3, 'franco', 'franco', 'franco', 21, 'male', 'Olongapo City', '', '0909090543', 'franco', 'franco', 'unknown.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_app_skills`
--

CREATE TABLE `tbl_app_skills` (
  `id` int(11) NOT NULL,
  `applicant_ID` int(11) NOT NULL,
  `skill_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_app_skills`
--

INSERT INTO `tbl_app_skills` (`id`, `applicant_ID`, `skill_ID`) VALUES
(1, 1, 5),
(2, 1, 1),
(3, 1, 4),
(4, 2, 5),
(5, 2, 2),
(6, 2, 1),
(7, 2, 3),
(8, 2, 11),
(9, 2, 13),
(12, 3, 4),
(13, 3, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `company_ID` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_add` text NOT NULL,
  `company_email` text NOT NULL,
  `company_contact` text NOT NULL,
  `company_image` longtext NOT NULL,
  `company_username` varchar(50) NOT NULL,
  `company_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`company_ID`, `company_name`, `company_add`, `company_email`, `company_contact`, `company_image`, `company_username`, `company_password`) VALUES
(1, 'Google', 'Philippines', 'google@gmail.com', '0909988776', 'gerald.jpg', 'gerald', 'gerald'),
(2, 'Microsoft', 'Philippines', 'microsoft@outlook.com', '096565578', 'unknown.png', 'gerry', 'gerry');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_com_jobs`
--

CREATE TABLE `tbl_com_jobs` (
  `id` int(11) NOT NULL,
  `company_ID` int(11) NOT NULL,
  `job_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_com_jobs`
--

INSERT INTO `tbl_com_jobs` (`id`, `company_ID`, `job_ID`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 2, 1),
(4, 2, 2),
(5, 2, 3),
(6, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs`
--

CREATE TABLE `tbl_jobs` (
  `job_ID` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jobs`
--

INSERT INTO `tbl_jobs` (`job_ID`, `job_title`, `job_desc`) VALUES
(1, 'Programmer', 'Code code code.'),
(2, 'Designer', 'Design design design'),
(3, 'Database Programmer', 'Add, Edit and Delete'),
(4, 'System Analyst', 'Analyze analyze');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs_skills`
--

CREATE TABLE `tbl_jobs_skills` (
  `id` int(11) NOT NULL,
  `job_ID` int(11) NOT NULL,
  `skill_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jobs_skills`
--

INSERT INTO `tbl_jobs_skills` (`id`, `job_ID`, `skill_ID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 5),
(4, 1, 6),
(5, 1, 8),
(6, 2, 4),
(7, 2, 5),
(8, 2, 11),
(9, 2, 12),
(10, 2, 13),
(11, 2, 14),
(12, 3, 3),
(13, 3, 1),
(14, 3, 8),
(15, 4, 7),
(16, 4, 8),
(17, 4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_match`
--

CREATE TABLE `tbl_match` (
  `id` int(11) NOT NULL,
  `applicant_ID` int(11) NOT NULL,
  `company_ID` int(11) NOT NULL,
  `com_match_skills` int(11) NOT NULL,
  `job_apply` int(11) NOT NULL,
  `is_invited` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skills`
--

CREATE TABLE `tbl_skills` (
  `skill_ID` int(11) NOT NULL,
  `skill_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_skills`
--

INSERT INTO `tbl_skills` (`skill_ID`, `skill_title`) VALUES
(1, 'PHP'),
(2, 'JAVA'),
(3, 'MySQL'),
(4, 'Photoshop'),
(5, 'HTML'),
(6, 'JAVASCRIPT'),
(7, 'Efficient Planning and Execution'),
(8, 'Analytical'),
(9, 'Technical Knowledge'),
(10, 'Man Management'),
(11, 'Corel Draw'),
(12, 'Illustrator'),
(13, 'Typography'),
(14, 'Visual Ideation/Creativity');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_applicant`
--
ALTER TABLE `tbl_applicant`
  ADD PRIMARY KEY (`applicant_ID`);

--
-- Indexes for table `tbl_app_skills`
--
ALTER TABLE `tbl_app_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`company_ID`);

--
-- Indexes for table `tbl_com_jobs`
--
ALTER TABLE `tbl_com_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  ADD PRIMARY KEY (`job_ID`);

--
-- Indexes for table `tbl_jobs_skills`
--
ALTER TABLE `tbl_jobs_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_match`
--
ALTER TABLE `tbl_match`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_skills`
--
ALTER TABLE `tbl_skills`
  ADD PRIMARY KEY (`skill_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_applicant`
--
ALTER TABLE `tbl_applicant`
  MODIFY `applicant_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_app_skills`
--
ALTER TABLE `tbl_app_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `company_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_com_jobs`
--
ALTER TABLE `tbl_com_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  MODIFY `job_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_jobs_skills`
--
ALTER TABLE `tbl_jobs_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_match`
--
ALTER TABLE `tbl_match`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_skills`
--
ALTER TABLE `tbl_skills`
  MODIFY `skill_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
