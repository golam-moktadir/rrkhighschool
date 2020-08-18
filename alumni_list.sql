-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2020 at 08:45 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rrkhighschool_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni_list`
--

CREATE TABLE `alumni_list` (
  `id` int(11) NOT NULL,
  `batch` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `mother_name` varchar(50) DEFAULT NULL,
  `spouse_name` varchar(50) DEFAULT NULL,
  `present_village` varchar(255) DEFAULT NULL,
  `present_post_office` varchar(255) DEFAULT NULL,
  `present_upagila` varchar(255) NOT NULL,
  `present_district` varchar(255) NOT NULL,
  `permanent_village` varchar(255) NOT NULL,
  `permanent_post_office` varchar(255) NOT NULL,
  `permanent_upagila` varchar(255) NOT NULL,
  `permanent_district` varchar(255) NOT NULL,
  `profession` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `mobile_number` varchar(20) DEFAULT NULL,
  `present_access` int(11) DEFAULT NULL,
  `mobile_access` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `insertion_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alumni_list`
--

INSERT INTO `alumni_list` (`id`, `batch`, `name`, `father_name`, `mother_name`, `spouse_name`, `present_village`, `present_post_office`, `present_upagila`, `present_district`, `permanent_village`, `permanent_post_office`, `permanent_upagila`, `permanent_district`, `profession`, `email_id`, `mobile_number`, `present_access`, `mobile_access`, `image`, `insertion_date`) VALUES
(18, '1979', 'Samir Sarker', 'সুধীর চন্দ্র সরকার', 'গীতা রাণী সরকার', 'Ruma Deb', '99', '999', '', '', '', '', '', '', 'Tax Consultant', 'bd.samir@gmail.com', '1964-08-24', 0, 0, '1.png', '2020-01-04 04:33:25am'),
(19, '2007', 'MD GOLAM MOKTADIR', 'MD NURUL ISLAM MONDAL', 'Most Laila Arzumand Banu', '', 'kalabagan', 'kalabagan', 'Dhaka', 'Dhaka', 'Genar Para', 'Shukurer hat', 'Mithapukur', 'Rangpur', 'BUSINESS', 'cse.limon.33@gmail.com', '01798933230', 0, 0, '19.jpg', '2020-07-09 06:34:18pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni_list`
--
ALTER TABLE `alumni_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumni_list`
--
ALTER TABLE `alumni_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
