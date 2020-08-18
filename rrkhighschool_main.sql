-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 06, 2020 at 08:33 PM
-- Server version: 10.3.23-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `0_admin`
--

CREATE TABLE `0_admin` (
  `record_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `admin_unique_id` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `0_admin`
--

INSERT INTO `0_admin` (`record_id`, `name`, `image`, `admin_unique_id`, `password`) VALUES
(1, 'admin', '1.jpg', 'admin', 'abc12345');

-- --------------------------------------------------------

--
-- Table structure for table `1_create_class`
--

CREATE TABLE `1_create_class` (
  `record_id` int(11) NOT NULL,
  `class_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `1_create_class`
--

INSERT INTO `1_create_class` (`record_id`, `class_name`) VALUES
(5, '6'),
(6, '7'),
(7, '8'),
(8, '9'),
(9, '10');

-- --------------------------------------------------------

--
-- Table structure for table `2_create_group`
--

CREATE TABLE `2_create_group` (
  `record_id` int(11) NOT NULL,
  `group_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `2_create_group`
--

INSERT INTO `2_create_group` (`record_id`, `group_name`) VALUES
(1, 'Science - A'),
(2, 'Humanities - A'),
(3, 'Business Studies - A'),
(4, 'Science - B'),
(5, 'Humanities  - B'),
(6, 'Business Studies - B');

-- --------------------------------------------------------

--
-- Table structure for table `3_create_section`
--

CREATE TABLE `3_create_section` (
  `record_id` int(11) NOT NULL,
  `section_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `3_create_section`
--

INSERT INTO `3_create_section` (`record_id`, `section_name`) VALUES
(1, 'Section - A'),
(2, 'Section - B'),
(3, 'Section - C'),
(4, 'Section - D'),
(5, 'Section - E'),
(6, 'Science'),
(7, 'Humanities'),
(8, 'Business Studies');

-- --------------------------------------------------------

--
-- Table structure for table `4_create_shift`
--

CREATE TABLE `4_create_shift` (
  `record_id` int(11) NOT NULL,
  `shift_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `4_create_shift`
--

INSERT INTO `4_create_shift` (`record_id`, `shift_name`) VALUES
(1, 'Day');

-- --------------------------------------------------------

--
-- Table structure for table `5_create_session`
--

CREATE TABLE `5_create_session` (
  `record_id` int(11) NOT NULL,
  `session_name` varchar(200) NOT NULL,
  `total_admin` int(11) NOT NULL,
  `total_student` int(11) NOT NULL,
  `total_teacher` int(11) NOT NULL,
  `total_guardian` int(11) NOT NULL,
  `total_staff` int(11) NOT NULL,
  `total_accountant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `5_create_session`
--

INSERT INTO `5_create_session` (`record_id`, `session_name`, `total_admin`, `total_student`, `total_teacher`, `total_guardian`, `total_staff`, `total_accountant`) VALUES
(1, '2019', 0, 308, 18, 0, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `6_create_version`
--

CREATE TABLE `6_create_version` (
  `record_id` int(11) NOT NULL,
  `version_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `7_create_subject`
--

CREATE TABLE `7_create_subject` (
  `record_id` int(11) NOT NULL,
  `subject_name` varchar(500) CHARACTER SET utf8 NOT NULL,
  `subject_code` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `subject_total_mark` varchar(255) NOT NULL,
  `practical` tinyint(1) NOT NULL DEFAULT 0,
  `mcq` tinyint(1) DEFAULT 0,
  `class_id` int(11) NOT NULL,
  `written_mark` varchar(250) DEFAULT NULL,
  `mcq_mark` varchar(250) DEFAULT NULL,
  `practical_mark` varchar(250) DEFAULT NULL,
  `fourth_subject` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `7_create_subject`
--

INSERT INTO `7_create_subject` (`record_id`, `subject_name`, `subject_code`, `subject_total_mark`, `practical`, `mcq`, `class_id`, `written_mark`, `mcq_mark`, `practical_mark`, `fourth_subject`, `created_at`) VALUES
(2, 'বাংলা', '1001', '100', 0, 1, 5, '70', '30', NULL, NULL, '2019-08-26 19:56:35'),
(3, 'গণিত', '109', '100', 0, 1, 5, '70', '30', NULL, NULL, '2019-08-26 19:58:57'),
(4, 'ইংরেজী', '107', '100', 0, 0, 5, '100', NULL, NULL, NULL, '2019-08-26 19:58:31'),
(6, 'বিজ্ঞান', '127', '100', 0, 1, 5, '70', '30', NULL, NULL, '2019-08-26 19:39:07'),
(7, 'বাংলাদেশ ও বিশ্ব পরিচিতি', '153', '100', 0, 1, 5, '70', '30', NULL, NULL, '2019-08-26 19:38:47'),
(8, 'ইসলাম ও নৈতিক শিক্ষা', '111', '100', 0, 1, 5, '70', '30', NULL, NULL, '2019-08-26 19:38:24'),
(9, 'হিন্দু ধর্ম ও নৈতিক শিক্ষা', '112', '100', 0, 1, 5, '70', '30', NULL, NULL, '2019-08-26 19:38:09'),
(10, 'বাংলা', '101', '100', 0, 1, 6, '70', '30', NULL, NULL, '2019-08-26 19:55:27'),
(12, 'গণিত', '109', '100', 0, 1, 6, '70', '30', NULL, NULL, '2019-08-26 19:35:06'),
(13, 'ইংরেজী', '107', '100', 0, 0, 6, '100', NULL, NULL, NULL, '2019-08-26 19:54:08'),
(15, 'বাংলাদেশ ও বিশ্ব পরিচয়', '153', '100', 0, 1, 6, '70', '30', NULL, NULL, '2019-08-26 19:33:30'),
(16, 'বিজ্ঞান', '127', '100', 0, 1, 6, '70', '30', NULL, NULL, '2019-08-26 19:33:03'),
(17, 'ইসলাম ও নৈতিক শিক্ষা', '111', '100', 0, 1, 6, '70', '30', NULL, NULL, '2019-08-26 19:32:21'),
(18, 'হিন্দু ধর্ম ও নৈতিক শিক্ষা', '112', '100', 0, 1, 6, '70', '30', NULL, NULL, '2019-08-26 19:31:58'),
(20, 'বাংলা  - প্রথম পত্র', '101', '100', 0, 1, 8, '70', '30', NULL, NULL, '2019-08-26 20:17:56'),
(21, 'বাংলা -  দ্বিতীয় পত্র', '102', '100', 0, 1, 8, '70', '30', NULL, NULL, '2019-08-26 20:17:37'),
(22, 'ইংরেজী - প্রথম পত্র', '107', '100', 0, 0, 8, '100', NULL, NULL, NULL, '2019-08-26 20:17:12'),
(23, 'ইংরেজী  -  দ্বিতীয় পত্র', '108', '100', 0, 0, 8, '100', NULL, NULL, NULL, '2019-08-26 20:18:17'),
(24, 'গণিত (আবশ্যিক)', '109', '100', 0, 1, 8, '70', '30', NULL, NULL, '2019-08-21 09:53:45'),
(25, 'ইসলাম ও নৈতিক শিক্ষা', '111', '100', 0, 1, 8, '70', '30', NULL, NULL, '2019-08-21 09:54:47'),
(26, 'হিন্দু ধর্ম ও নৈতিক শিক্ষা', '112', '100', 0, 1, 8, '70', '30', NULL, NULL, '2019-08-21 09:56:07'),
(28, 'তথ্য ও যোগাযোগ প্রযুক্তি', '154', '50', 1, 1, 8, '00', '25', '25', NULL, '2019-08-25 09:52:42'),
(29, 'গ্রার্হস্থ্য বিজ্ঞান', '151', '100', 1, 1, 8, '50', '25', '25', NULL, '2019-08-25 09:55:15'),
(30, 'কৃষি শিক্ষা', '134', '100', 1, 1, 8, '50', '25', '25', NULL, '2019-08-25 09:52:03'),
(31, 'শারীরিক শিক্ষা ও ক্রীড়া', '133', '100', 1, 1, 8, '50', '25', '25', NULL, '2019-08-25 09:51:30'),
(32, 'চারু ও কারুকলা', '148', '100', 1, 1, 8, '50', '25', '25', NULL, '2019-08-25 09:50:20'),
(34, 'বাংলাদেশের ইতিহাস ও বিশ্বসভ্যতা', '153', '100', 0, 1, 8, '70', '30', NULL, NULL, '2019-08-21 19:00:39'),
(35, 'ফিন্যান্স ও ব্যাংকিং', '152', '100', 0, 1, 8, '70', '30', NULL, NULL, '2019-08-21 19:02:09'),
(36, 'রসায়ন', '137', '100', 0, 1, 8, '70', '30', NULL, NULL, '2019-08-25 09:49:20'),
(37, 'পৌরনীতি ও নাগরিকতা', '140', '100', 0, 1, 8, '70', '30', NULL, NULL, '2019-08-21 19:06:50'),
(38, 'ব্যবসায় উদ্যোগ', '143', '100', 0, 1, 8, '70', '30', NULL, NULL, '2019-08-21 19:08:14'),
(39, 'ভূগোল ও পরিবেশ', '110', '100', 0, 1, 8, '70', '30', NULL, NULL, '2019-08-21 19:22:51'),
(40, 'হিসাব বিজ্ঞান', '146', '100', 0, 1, 8, '70', '30', NULL, NULL, '2019-08-21 19:27:28'),
(41, 'বিজ্ঞান', '127', '100', 0, 1, 8, '70', '30', NULL, NULL, '2019-08-21 19:28:26'),
(42, 'উচ্চতর গণিত', '126', '100', 1, 1, 8, '50', '25', '25', NULL, '2019-08-21 19:29:48'),
(43, 'জীব বিজ্ঞান', '138', '100', 1, 1, 8, '50', '25', '25', NULL, '2019-08-21 19:30:55'),
(44, 'অর্থনীতি', '141', '100', 0, 1, 8, '70', '30', NULL, NULL, '2019-08-21 19:32:00'),
(45, 'বাংলাদেশ ও বিশ্ব পরিচয়', '150', '100', 0, 1, 8, '70', '30', NULL, NULL, '2019-08-21 19:33:28'),
(46, 'বাংলা', '১০১', '100', 0, 1, 7, '70', '30', NULL, NULL, '2019-08-26 20:02:20'),
(47, 'ইংরেজী', '107', '100', 0, 1, 7, '70', '30', NULL, NULL, '2019-08-26 20:03:06'),
(48, 'তথ্য ও যোগাযোগ প্রযুক্তি', '154', '50', 1, 1, 7, '00', '25', '25', NULL, '2019-08-26 20:04:25'),
(49, 'ইসলাম ও নৈতিক শিক্ষা', '111', '100', 0, 1, 7, '70', '30', NULL, NULL, '2019-08-26 20:06:06'),
(50, 'হিন্দু ধর্ম ও নৈতিক শিক্ষা', '112', '100', 0, 1, 7, '70', '30', NULL, NULL, '2019-08-26 20:07:45'),
(51, 'বাংলাদেশের ও বিশ্ব পরিচিতি', '150', '100', 0, 1, 7, '70', '30', NULL, NULL, '2019-08-26 20:09:08'),
(52, 'গণিত', '109', '100', 0, 1, 7, '70', '30', NULL, NULL, '2019-08-26 20:10:28'),
(53, 'বিজ্ঞান', '127', '100', 0, 1, 7, '70', '30', NULL, NULL, '2019-08-26 20:11:20'),
(54, 'বাংলা - প্রথমপত্র', '101', '100', 0, 1, 9, '70', '30', NULL, NULL, '2019-08-26 20:16:42'),
(55, 'বাংলা - দ্বিতীয় পত্র', '102', '100', 0, 1, 9, '70', '30', NULL, NULL, '2019-08-26 20:16:24'),
(56, 'ইংরেজী - প্রথম পত্র', '107', '100', 0, 0, 9, '100', NULL, NULL, NULL, '2019-08-26 20:14:56'),
(57, 'ইংরেজী - দ্বিতীয় পত্র', '108', '100', 0, 0, 9, '100', NULL, NULL, NULL, '2019-08-26 20:15:47'),
(58, 'ইসলাম ও নৈতিক শিক্ষা', '111', '100', 0, 1, 9, '70', '30', NULL, NULL, '2019-08-26 20:21:20'),
(59, 'হিন্দু ধর্ম ও নৈতিক শিক্ষা', '112', '100', 0, 1, 9, '70', '30', NULL, NULL, '2019-08-26 20:23:08'),
(60, 'পদার্থ বিজ্ঞান', '136', '100', 1, 1, 9, '50', '25', '25', NULL, '2019-08-26 20:24:25'),
(61, 'বাংলাদেশের ইতিহাস ও বিশ্বসভ্যতা', '153', '100', 0, 1, 9, '70', '30', NULL, NULL, '2019-08-26 20:28:09'),
(62, 'ফিন্যান্স ও ব্যাংকিং', '152', '100', 0, 1, 9, '70', '30', NULL, NULL, '2019-08-26 20:29:15'),
(63, 'রসায়ন', '137', '100', 1, 1, 9, '50', '25', '25', NULL, '2019-08-26 20:30:20'),
(64, 'পৌরনীতি ও নাগরিকতা', '140', '100', 0, 1, 9, '70', '30', NULL, NULL, '2019-08-26 20:32:42'),
(65, 'ব্যবসায় উদ্যোগ', '143', '100', 0, 1, 9, '70', '30', NULL, NULL, '2019-08-26 20:34:05'),
(66, 'ভূগোল ও পরিবেশ', '110', '100', 0, 1, 9, '70', '30', NULL, NULL, '2019-08-26 20:35:39'),
(67, 'হিসাব বিজ্ঞান', '146', '100', 0, 1, 9, '70', '30', NULL, NULL, '2019-08-26 20:40:15'),
(68, 'বিজ্ঞান', '127', '100', 0, 1, 9, '70', '30', NULL, NULL, '2019-08-26 20:41:11'),
(69, 'উচ্চতর গণিত', '126', '100', 1, 1, 9, '50', '25', '25', NULL, '2019-08-26 20:42:10'),
(70, 'জীব বিজ্ঞান', '138', '100', 0, 1, 9, '70', '30', NULL, NULL, '2019-08-26 20:43:07'),
(71, 'অর্থনীতি', '141', '100', 0, 1, 9, '70', '30', NULL, NULL, '2019-08-26 20:44:06'),
(72, 'বাংলাদেশ ও বিশ্ব পরিচয়', '150', '100', 0, 1, 9, '70', '30', NULL, NULL, '2019-08-26 20:47:14'),
(73, 'গ্রার্হস্থ্য বিজ্ঞান', '151', '100', 1, 1, 9, '50', '25', '25', NULL, '2019-08-26 20:50:40'),
(74, 'কৃষি শিক্ষা', '134', '100', 1, 1, 9, '50', '25', '25', NULL, '2019-08-26 20:51:27'),
(75, 'শারীরিক শিক্ষা ও ক্রীড়া', '133', '100', 1, 1, 9, '50', '25', '25', NULL, '2019-08-26 20:52:17'),
(76, 'গণিত (আবশ্যিক)', '109', '100', 0, 1, 9, '70', '30', NULL, NULL, '2019-08-26 20:58:15'),
(77, 'তথ্য ও যোগাযোগ প্রযুক্তি', '154', '50', 1, 1, 9, '00', '25', '25', NULL, '2019-08-26 21:00:03');

-- --------------------------------------------------------

--
-- Table structure for table `8_create_exam_type`
--

CREATE TABLE `8_create_exam_type` (
  `record_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `exam_type` varchar(500) NOT NULL,
  `class_name` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `8_create_exam_type`
--

INSERT INTO `8_create_exam_type` (`record_id`, `class_id`, `session_id`, `exam_type`, `class_name`, `created_at`) VALUES
(2, 5, 1, 'First Term', '', '2019-08-13 18:41:44'),
(3, 5, 1, 'Annual Exam', '', '2019-08-13 18:42:34'),
(4, 5, 1, '1st Class Test', '', '2019-08-13 18:43:07'),
(5, 5, 1, '2nd Class Test', '', '2019-08-13 18:43:33'),
(6, 8, 1, 'First Term', '', '2019-08-21 21:27:00'),
(7, 8, 1, '1st Class Test', '', '2019-08-21 21:27:25'),
(8, 9, 1, 'First Term', '', '2019-08-25 13:08:16');

-- --------------------------------------------------------

--
-- Table structure for table `9_create_exam_grade`
--

CREATE TABLE `9_create_exam_grade` (
  `record_id` int(11) NOT NULL,
  `min_num` int(11) NOT NULL,
  `max_num` int(11) NOT NULL,
  `letter_grade` varchar(10) NOT NULL,
  `grade_point` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `9_create_exam_grade`
--

INSERT INTO `9_create_exam_grade` (`record_id`, `min_num`, `max_num`, `letter_grade`, `grade_point`) VALUES
(1, 80, 100, 'A+', '5'),
(2, 70, 79, 'A', '4'),
(3, 60, 69, 'A-', '3.5'),
(4, 50, 59, 'B', '3'),
(5, 40, 49, 'C', '2'),
(6, 33, 39, 'D', '1'),
(7, 0, 32, 'F', '0');

-- --------------------------------------------------------

--
-- Table structure for table `10_1_class_fee`
--

CREATE TABLE `10_1_class_fee` (
  `record_id` int(11) NOT NULL,
  `fee_head` varchar(1000) NOT NULL,
  `class_name` varchar(1000) NOT NULL,
  `amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `10_1_class_fee`
--

INSERT INTO `10_1_class_fee` (`record_id`, `fee_head`, `class_name`, `amount`) VALUES
(1, 'Tuition Fee', 'VI', 170),
(2, 'Tuition Fee', 'VII', 180),
(3, 'Tuition Fee', 'VIII', 180),
(4, 'Tuition Fee', 'IX', 190),
(5, 'Tuition Fee', 'X', 200),
(6, 'Admission Fee', 'VI', 300),
(7, 'Development Fee', 'VI', 300),
(8, 'ID Card', 'VI', 50),
(9, 'Diary Fee', 'VI', 100),
(10, 'Syllabus and Book List', 'VI', 30),
(11, 'Postage / SMS Fee', 'VI', 60),
(13, 'Tuition Fee', '6', 170);

-- --------------------------------------------------------

--
-- Table structure for table `10_2_fee_collection`
--

CREATE TABLE `10_2_fee_collection` (
  `record_id` int(11) NOT NULL,
  `student_id` varchar(1000) NOT NULL,
  `class_name` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `month` varchar(100) NOT NULL,
  `year` varchar(1000) NOT NULL,
  `amount` int(100) NOT NULL,
  `due` int(100) NOT NULL,
  `discount` int(100) NOT NULL,
  `balance` int(100) NOT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `10_3_fee_collection`
--

CREATE TABLE `10_3_fee_collection` (
  `record_id` int(20) NOT NULL,
  `invoice_id` varchar(100) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `tuition_description` varchar(255) DEFAULT NULL,
  `tuition_discount` varchar(255) NOT NULL DEFAULT '0',
  `amount` decimal(10,2) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `due` decimal(10,2) NOT NULL,
  `year` varchar(200) NOT NULL,
  `insertion_date` date NOT NULL,
  `inserted_by` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `10_3_fee_collection`
--

INSERT INTO `10_3_fee_collection` (`record_id`, `invoice_id`, `student_id`, `class_name`, `description`, `tuition_description`, `tuition_discount`, `amount`, `quantity`, `discount`, `total`, `payment`, `due`, `year`, `insertion_date`, `inserted_by`) VALUES
(1, '1001', '2019001S', '6', 'Tuition Fee(Jan)', '500', '0', 500.00, 1.00, 0.00, 500.00, 0.00, 500.00, '2019', '2019-08-10', 'admin'),
(2, '1002', '2019002S', 'VI', 'Admission Fee', '', '0', 300.00, 1.00, 150.00, 450.00, 450.00, 0.00, '2019', '2019-08-17', 'admin'),
(3, '1002', '2019002S', 'VI', 'Development Fee', '', '0', 300.00, 1.00, 0.00, 0.00, 0.00, 0.00, '2019', '2019-08-17', 'admin'),
(4, '1003', '2019009S', 'VI', 'Admission Fee', '', '0', 300.00, 1.00, 0.00, 300.00, 0.00, 300.00, '2019', '2019-08-17', 'admin'),
(5, '1004', '2019002S', '6', 'Tuition Fee', '170', '0', 170.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019', '2019-08-25', 'admin'),
(6, '1005', '2019002S', '6', 'Tuition Fee(Jan,Feb)', '170,170', '0', 170.00, 2.00, 0.00, 340.00, 0.00, 340.00, '2019', '2019-08-28', 'admin'),
(7, '1006', '2019002S', '6', 'Tuition Fee(Mar)', '120', '50', 120.00, 1.00, 0.00, 120.00, 0.00, 460.00, '2019', '2019-08-28', 'admin'),
(8, '1007', '2019003S', '6', 'Tuition Fee(Jan,Feb)', '150,150', '40', 150.00, 2.00, 0.00, 300.00, 300.00, 0.00, '2019', '2019-08-28', 'admin'),
(9, '1008', '2019007S', '6', 'Tuition Fee(Jun,Jul,Aug,Sep)', '170,170,170,170', '0', 170.00, 4.00, 0.00, 680.00, 0.00, 680.00, '2019', '2019-10-28', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `10_create_fee_head`
--

CREATE TABLE `10_create_fee_head` (
  `record_id` int(11) NOT NULL,
  `fee_head` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `10_create_fee_head`
--

INSERT INTO `10_create_fee_head` (`record_id`, `fee_head`) VALUES
(3, 'Admission Fee'),
(4, 'Tuition Fee'),
(5, 'Syllabus and Book List'),
(6, 'ID Card'),
(7, 'Badge & Shoulder Strap Fee'),
(8, 'Calendar Fee'),
(9, 'Diary Fee'),
(10, 'Postage / SMS Fee'),
(11, 'Development Fee'),
(12, 'Milad Mafil / Puja Fee/Donations'),
(13, 'Arts & Culture Fee'),
(14, 'Library Fee'),
(15, 'Automation & Internet'),
(16, 'Scout , Girls Guide and BNCC Fees'),
(17, 'Student Welfare and Charity Fees'),
(18, 'Sports Fee'),
(19, 'School Magazine Fee'),
(20, 'Fine and Penalties'),
(21, 'English Club and Other Activities Fee'),
(22, 'Medical Fee'),
(23, 'Progress Report');

-- --------------------------------------------------------

--
-- Table structure for table `11_create_designation`
--

CREATE TABLE `11_create_designation` (
  `record_id` int(11) NOT NULL,
  `designation` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `11_create_designation`
--

INSERT INTO `11_create_designation` (`record_id`, `designation`) VALUES
(2, 'Head Master'),
(3, 'Asst. Head Master'),
(4, 'Sr. Asst. Teacher'),
(5, 'Asst. Teacher'),
(6, 'Part Time Teacher'),
(7, 'Asst. Teacher (ICT)'),
(8, 'Librarian'),
(9, 'Office Assistant'),
(10, 'Supporting Staff');

-- --------------------------------------------------------

--
-- Table structure for table `12_insert_student_info`
--

CREATE TABLE `12_insert_student_info` (
  `record_id` int(11) NOT NULL,
  `class_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `group_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `section_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `shift_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `session_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `version_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `name` varchar(500) CHARACTER SET utf8 NOT NULL,
  `roll` varchar(200) CHARACTER SET utf8 NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(30) CHARACTER SET utf8 NOT NULL,
  `blood_group` varchar(30) CHARACTER SET utf8 NOT NULL,
  `nationality` varchar(300) CHARACTER SET utf8 NOT NULL,
  `religion` varchar(200) CHARACTER SET utf8 NOT NULL,
  `student_unique_id` varchar(200) CHARACTER SET utf8 NOT NULL,
  `password` varchar(200) CHARACTER SET utf8 NOT NULL,
  `subject` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `fourth_subject` varchar(200) CHARACTER SET utf8 NOT NULL,
  `fourth_subject_id` int(11) DEFAULT NULL,
  `father_name` varchar(500) CHARACTER SET utf8 NOT NULL,
  `father_occupation` varchar(500) CHARACTER SET utf8 NOT NULL,
  `mother_name` varchar(500) CHARACTER SET utf8 NOT NULL,
  `mother_occupation` varchar(200) CHARACTER SET utf8 NOT NULL,
  `parents_mobile` varchar(200) CHARACTER SET utf8 NOT NULL,
  `parents_email` varchar(400) CHARACTER SET utf8 NOT NULL,
  `address` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `admission_date` date NOT NULL,
  `ssc_reg` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ssc_roll` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ssc_session` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ssc_year` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ssc_result` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ssc_board` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ssc_institution` varchar(10000) CHARACTER SET utf8 NOT NULL,
  `image` varchar(15) CHARACTER SET utf8 NOT NULL,
  `status` int(10) NOT NULL,
  `alternative_mobile` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `guardian_name` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `guardian_mobile` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `guardian_realtion` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `12_insert_student_info`
--

INSERT INTO `12_insert_student_info` (`record_id`, `class_name`, `group_name`, `section_name`, `shift_name`, `session_name`, `version_name`, `name`, `roll`, `date_of_birth`, `gender`, `blood_group`, `nationality`, `religion`, `student_unique_id`, `password`, `subject`, `fourth_subject`, `fourth_subject_id`, `father_name`, `father_occupation`, `mother_name`, `mother_occupation`, `parents_mobile`, `parents_email`, `address`, `admission_date`, `ssc_reg`, `ssc_roll`, `ssc_session`, `ssc_year`, `ssc_result`, `ssc_board`, `ssc_institution`, `image`, `status`, `alternative_mobile`, `guardian_name`, `guardian_mobile`, `guardian_realtion`) VALUES
(2, '6', 'Science - A', 'Section - A', 'Day', '2019', '', 'জান্নাতুল আকসা তিশা', '001', '2008-11-01', 'Female', 'B+', 'Bangladeshi', 'Islam', '2019002S', '', '', '', 0, 'আল-আমিন', 'Service', 'রোকসানা আমিন', 'Service', '01777644522', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '2.jpg', 1, '', '??????? ????', '01777644522', 'Mother'),
(3, '6', 'Science', 'Section - A', 'Day', '2019', '', 'নিশিতা মনি', '002', '2009-01-01', 'Female', 'B-', 'Bangladeshi', 'Islam', '2019003S', '', '', '', 0, 'মোঃসেলিম মিয়া', 'Business', 'শ্যামলি আক্তার', 'Housewife', '01715942381', '', 'আমিননগর, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '3.jpg', 1, '', '??????? ??????', '01715942381', 'Mother'),
(4, '6', 'Science', 'Section - A', 'Day', '2019', '', 'সামিয়া আক্তার', '003', '2009-01-01', 'Female', 'O+', 'Bangladeshi', 'Islam', '2019004S', '', '', '', 0, 'দেলোয়ার হোসেন', 'Business', 'রাশিদা বেগম', 'House Wife', '01795006104', '', 'পূর্বহাট, রামচন্দ্রপুর, 	বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '4.jpg', 1, '', '?????? ????', '01795006104', 'Mother'),
(5, '6', 'Science', 'Section - A', 'Day', '2019', '', 'সুরাইয়া আক্তার', '004', '2009-01-01', 'Female', 'O+', 'Bangladeshi', 'Islam', '2019005S', '', '', '', 0, 'এরশাদ আলী', 'Business', 'শেফালী বেগম', 'Housewife', '01814486116', '', 'তিলককান্দি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '5.jpg', 1, '', '????? ???', '01814486116', 'Father'),
(6, '6', 'Science', 'Section - A', 'Day', '2019', '', 'করিমা আক্তার', '005', '2009-01-01', 'Female', 'O+', 'Bangladeshi', 'Islam', '2019006S', '', '', '', 0, 'উসমান গনি', 'Service', 'সাজেদা বেগম', 'Housewife', '01731723007', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '6.jpg', 1, '', '?????? ????', '01731723007', 'Mother'),
(7, '6', 'Science', 'Section - A', 'Day', '2019', '', 'রোকাইয়া আক্তার', '006', '2009-01-01', 'Female', 'B+', 'Bangladeshi', 'Islam', '2019007S', '', '', '', 0, 'সফিকুল ইসলাম', 'Business', 'রাবিয়া আক্তার', 'Housewife', '01747720142', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর	, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '7.jpg', 1, '', '?????? ?????', '01747720142', 'Father'),
(8, '6', '', 'Section - A', 'Day', '2019', '', 'প্রিয়া দেবনাথ', '007', '2009-01-01', 'Female', 'B+', 'Bangladeshi', 'Hinduism', '2019008S', '', '', '', 0, 'নির্মল দেবনাথ', 'Business', 'লক্ষ্মী দেবনাথ', 'Housewife', '01793556423', '', 'পূর্বহাটি	রামচন্দ্রপুর	বাঞ্ছারামপুর	ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '8.jpg', 1, '', NULL, NULL, NULL),
(9, '6', '', 'Section - A', 'Day', '2019', '', 'মারিয়া সুলতানা', '008', '2009-01-01', 'Female', 'A+', 'Bangladeshi', 'Islam', '2019009S', '', '', '', 0, 'অধুদ মিয়া', 'Business', 'হোসনা আক্তার', 'Housewife', '01748085844', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '9.jpg', 1, '', NULL, NULL, NULL),
(10, '6', '', 'Section - A', 'Day', '2019', '', 'খাদিজা আক্তার', '010', '2009-01-01', 'Female', 'B+', 'Bangladeshi', 'Islam', '2019010S', '', '', '', 0, 'এনামুল হক সবুজ', 'Business', 'নার্গিস আক্তার', 'Housewife', '01969690931', '', 'আমিননগর, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '10.jpg', 1, '', NULL, NULL, NULL),
(11, '6', '', 'Section - A', 'Day', '2019', '', 'সুমাইয়া আক্তার শিমু', '011', '2009-01-01', 'Female', 'A+', 'Bangladeshi', 'Islam', '2019011S', '', '', '', 0, 'রিটন ব্যাপারী', 'Business', 'আকলিমা বেগম', 'Housewife', '01756581147', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর	, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '11.jpg', 1, '', NULL, NULL, NULL),
(12, '6', 'Science', 'Section - A', 'Day', '2019', '', 'অধরা রানী সরকার', '012', '2009-01-01', 'Female', 'B+', 'Bangladeshi', 'Hinduism', '2019012S', '', '', '', 0, 'সুকুমার চন্দ্র সরকার', 'Business', 'সবিতা সরকার', 'Service', '01716201022', '', 'সলপা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '12.jpg', 1, '', '????? ????? ', '01716201022', 'Mother'),
(13, '6', '', 'Section - A', 'Day', '2019', '', 'আকলিমা আক্তার', '014', '2009-01-01', 'Female', 'B+', 'Bangladeshi', 'Islam', '2019013S', '', '', '', 0, 'মোঃ মহসিন মিয়া', 'Business', 'জাহানারা বেগম', 'Housewife', '01881201580', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '13.jpg', 1, '', NULL, NULL, NULL),
(14, '6', '', 'Section - A', 'Day', '2019', '', 'রহিমা আক্তার', '013', '2009-01-01', 'Female', 'B+', 'Bangladeshi', 'Islam', '2019014S', '', '', '', 0, 'মোঃ মহসিন মিয়া', 'Business', 'জাহানারা বেগম', '', '01881201580', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '14.jpg', 1, '', NULL, NULL, NULL),
(15, '7', '', 'Section - A', 'Day', '2019', '', 'সুমাইয়া আক্তার', '001', '2008-01-01', 'Female', 'O+', 'Bangladeshi', 'Islam', '2019015S', '', '', '', 0, 'শাহিন আলম', 'Business', 'তাসলিমা আক্তার', 'Housewife', '01727646550', '', 'আমিননগর, রামচন্দ্রপুর, মুরাদনগর,কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '15.jpg', 1, '', NULL, NULL, NULL),
(16, '7', '', 'Section - A', 'Day', '2019', '', 'তৌহিদা সুলতানা', '002', '2008-01-01', 'Female', 'A+', 'Bangladeshi', 'Islam', '2019016S', '', '', '', 0, 'এ জি এম ইব্রাহিম	', 'Business', 'রুমা বেগম', 'Housewife', '01715632963', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '16.jpg', 1, '', NULL, NULL, NULL),
(17, '7', '', 'Section - A', 'Day', '2019', '', 'মিথিলা পারভিন', '003', '2008-01-01', 'Female', 'B+', 'Bangladeshi', 'Islam', '2019017S', '', '', '', 0, 'রহম আলী', 'Business', 'আছিয়া আক্তার', 'Housewife', '01911798314', '', 'বাখরাবাদ, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '17.jpg', 1, '', NULL, NULL, NULL),
(18, '7', '', 'Section - A', 'Day', '2019', '', 'আন্নি দেবনাথ', '004', '2008-01-01', 'Female', 'O+', 'Bangladeshi', 'Hinduism', '2019018S', '', '', '', 0, 'খগেশ দেবনাথ', 'Others', 'মিনতি বালা দেবী', 'Housewife', '01753061084', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '18.jpg', 1, '', NULL, NULL, NULL),
(19, '7', '', 'Section - A', 'Day', '2019', '', 'সাথী আক্তার', '005', '2008-01-01', 'Female', 'B+', 'Bangladeshi', 'Islam', '2019019S', '', '', '', 0, 'সাগর আহম্মেদ	', 'Business', 'রুনা বেগম', 'Housewife', '01715076424', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '19.jpg', 1, '', NULL, NULL, NULL),
(20, '7', '', 'Section - A', 'Day', '2019', '', 'তানজিনা আক্তার', '006', '2008-01-01', 'Female', 'A+', 'Bangladeshi', 'Islam', '2019020S', '', '', '', 0, 'মোঃ সর আলী', 'Business', 'মোসাঃ আম্বিয়া বেগম', 'Housewife', '01969690960', '', 'বাখরাবাদ, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '20.jpg', 1, '01969690960', NULL, NULL, NULL),
(21, '7', '', 'Section - A', 'Day', '2019', '', 'ফারজানা আক্তার রত্না', '007', '2008-01-01', 'Female', 'A+', 'Bangladeshi', 'Islam', '2019021S', '', '', '', 0, 'মোঃ দুলাল মিয়া		', 'Business', 'রঞ্জফা আক্তার', 'Housewife', '01724879118', '', 'আমিননগর, রামচন্দ্রপুর, মুরাদনগর,কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '21.jpg', 1, '', NULL, NULL, NULL),
(22, '7', '', 'Section - A', 'Day', '2019', '', 'আশরাফিয়া জাহান অহনা', '008', '2008-01-01', 'Female', 'A+', 'Bangladeshi', 'Islam', '2019022S', '', '', '', 0, 'সামসুজ্জামান', 'Business', 'সানজিদা আক্তার', 'Housewife', '01772623266', '', 'বাখরাবাদ, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '22.jpg', 1, '', NULL, NULL, NULL),
(23, '7', '', 'Section - A', 'Day', '2019', '', 'শায়লা আক্তার', '009', '2008-01-01', 'Female', 'A+', 'Bangladeshi', 'Islam', '2019023S', '', '', '', 0, 'সুমন মিয়া', 'Business', 'রুমি আক্তার', 'Housewife', '01727297715', '', 'আমিননগর, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '23.jpg', 1, '', NULL, NULL, NULL),
(24, '7', '', 'Section - A', 'Day', '2019', '', 'শাকিলা আক্তার', '010', '2008-01-01', 'Female', 'B+', 'Bangladeshi', 'Islam', '2019024S', '', '', '', 0, 'শামীম মিয়া', 'Business', 'রাবেয়া বেগম', '', '01979794549', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '24.jpg', 1, '', NULL, NULL, NULL),
(25, '8', '', 'Section - A', 'Day', '2019', '', 'রোছমা খান', '001', '2007-01-01', 'Female', 'A+', 'Bangladeshi', 'Islam', '2019025S', '', '', '', 0, 'মোঃ ইব্রাহীম খান', 'Business', 'দিল আফরোজ', 'Housewife', '01731226044', '', 'দৌলতপুর, দৌলতপুর, হোমনা, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '25.jpg', 1, '', NULL, NULL, NULL),
(26, '8', '', 'Section - A', 'Day', '2019', '', 'রিয়া আক্তার', '003', '2007-01-01', 'Female', 'A+', 'Bangladeshi', 'Islam', '2019026S', '', '', '', 0, 'রিয়াজ উদ্দিন', 'Business', 'ময়না আক্তার', 'Housewife', '01726717711', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর,  মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '26.jpg', 1, '', NULL, NULL, NULL),
(27, '8', '', 'Section - A', 'Day', '2019', '', 'নাদিরা আক্তার', '004', '2007-01-01', 'Female', 'A+', 'Bangladeshi', 'Islam', '2019027S', '', '', '', 0, 'মোঃ দেওয়ান ভুইয়া', 'Business', 'রুমা বেগম', 'Housewife', '01726717711', '', 'পেন্নই, চন্দনাইল, মুরাদনগর,  কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '27.jpg', 1, '', NULL, NULL, NULL),
(28, '8', '', 'Section - A', 'Day', '2019', '', 'ফাতেমা আক্তার', '05', '2007-01-01', 'Female', 'B+', 'Bangladeshi', '', '2019028S', '', '', '', 0, 'নিজামুল হক বেগ', 'Business', 'মোসাঃ শাহনাজ বেগম', 'Housewife', '01721794850', '', 'পূর্বহাটি	রামচন্দ্রপুর	বাঞ্ছারামপুর	ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '28.jpg', 1, '', NULL, NULL, NULL),
(29, '8', '', 'Section - A', 'Day', '2019', '', 'সাদিয়া আফরিন', '006', '2007-01-01', 'Female', 'B+', 'Bangladeshi', 'Islam', '2019029S', '', '', '', 0, 'মোঃ হুমায়ূন আহমেদ', 'Service', 'মর্জিনা বেগম', 'Housewife', '01750869014', '', 'হোমনা	হোমনা	হোমনা	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '29.jpg', 1, '', NULL, NULL, NULL),
(30, '8', '', 'Section - A', 'Day', '2019', '', 'আসমা আক্তার', '08', '2007-01-01', 'Female', 'B+', 'Bangladeshi', 'Islam', '2019030S', '', '', '', 0, 'মোঃ দেলোয়ার হোসেন		', 'Business', 'শিল্পী বেগম', 'Housewife', '01766850242', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '30.jpg', 1, '', NULL, NULL, NULL),
(31, '8', '', 'Section - A', 'Day', '2019', '', 'আনিকা আক্তার', '09', '2007-01-01', 'Female', 'B+', 'Bangladeshi', 'Islam', '2019031S', '', '', '', 0, 'সাগর মিয়া', 'Others', 'হাফেজা বেগম', 'Housewife', '01705520942', '', 'সলফা , চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '31.jpg', 1, '', NULL, NULL, NULL),
(32, '8', '', 'Section - A', 'Day', '2019', '', 'মরিয়ম আক্তার', '010', '2007-01-01', 'Female', 'O+', 'Bangladeshi', 'Islam', '2019032S', '', '', '', 0, 'আলমগীর', 'Others', 'ইয়াসমীন আক্তার', 'Housewife', '01992957317', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর	, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '32.jpg', 1, '', NULL, NULL, NULL),
(33, '8', '', '', 'Day', '2019', '', 'মাহবুবা সিদ্দিকা', '011', '2007-01-01', 'Female', 'B+', 'Bangladeshi', 'Islam', '2019033S', '', '', '', 0, 'আ স ম আব্দুল কাইয়ূম', 'Others', 'শরীফা আক্তার', 'Housewife', '01775009564', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর	, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '33.jpg', 1, '', NULL, NULL, NULL),
(34, '8', '', 'Section - A', 'Day', '2019', '', 'ছনিয়া আক্তার', '012', '2007-01-01', 'Female', 'B+', 'Bangladeshi', 'Islam', '2019034S', '', '', '', 0, 'জালাল মিয়া', 'Others', 'সুরিয়া বেগম', 'Housewife', '01786328661', '', 'সলফা, 	চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '34.jpg', 1, '', NULL, NULL, NULL),
(35, '9', 'Science - A', '', 'Day', '2019', '', 'পার্থ দেবনাথ', '001', '2006-01-01', 'Male', 'A+', 'Bangladeshi', 'Hinduism', '2019035S', '', '', 'উচ্চতর গণিত', 42, 'সঞ্জিত দেবনাথ	', 'Business', 'চন্দনা দেবনাথ', 'Housewife', '01726375363', '', 'বাখরাবাদ	রামচন্দ্রপুর	মুরাদনগর	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '35.jpg', 1, '', '?????? ??????', '01726375363', 'Father'),
(36, '9', 'Science - A', '', 'Day', '2019', '', 'মোঃ তৌহিদুল ইসলাম', '002', '2006-01-01', 'Male', 'B+', 'Bangladeshi', 'Islam', '2019036S', '', '', 'উচ্চতর গণিত', 42, 'মোঃ মোয়াজ্জেম হোসেন', 'Business', 'মোসাঃ কুলসুম বেগম', 'Housewife', '01776953991', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '36.jpg', 1, '', '???? ????????? ?????', '01776953991', 'Father'),
(37, '9', 'Science - A', '', 'Day', '2019', '', 'মোঃ ইমরান নাজির', '003', '2006-01-01', 'Male', 'A+', 'Bangladeshi', 'Islam', '2019037S', '', '', 'উচ্চতর গণিত', 42, 'বকুল মিয়া', 'Others', 'রুশিয়া বেগম', 'Housewife', '01965869090', '', 'তেমুরিয়া	রামচন্দ্রপুর	মুরাদনগর	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '37.jpg', 1, '', '???? ????', '01965869090', 'Father'),
(38, '9', 'Science - A', '', 'Day', '2019', '', 'এম. এম শরিফুর রহমান', '004', '2006-01-01', 'Male', 'A+', 'Bangladeshi', 'Islam', '2019038S', '', '', 'উচ্চতর গণিত', 42, 'এ. জি. এম ইব্রাহীম', 'Service', 'রুমা বেগম', 'Others', '01734000725', '', 'পূর্বহাটি, রামচন্দ্রপুর, মুরাদনগর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '38.jpg', 1, '', '???? ????', '01734000725', 'Mother'),
(39, '7', 'Science', 'Section - A', 'Day', '2019', '', 'ফারজানা আক্তার', '011', '2008-01-01', 'Female', 'A+', 'Bangladeshi', 'Islam', '2019039S', '', '', '', 0, 'মোঃ জাকির হোসেন', 'Business', 'তাসলিমা বেগম', 'Housewife', '01763794216', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '39.jpg', 1, '', '??????? ????', '01763794216', 'Mother'),
(40, '7', 'Science', 'Section - A', 'Day', '2019', '', 'ইসরাত জাহান', '012', '2007-01-01', 'Female', 'A+', 'Bangladeshi', 'Islam', '2019040S', '', '', '', 0, 'মোঃ ইব্রাহীম মিয়া', 'Business', 'বিউটি বেগম', 'Housewife', '01785705473', '', 'ব্রাহ্মণচাপিতলা	রামচন্দ্রপুর	মুরাদনগর	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '40.jpg', 1, '', 'Beauty Begum', '01785705473', 'Mother'),
(41, '6', '', 'Section - A', 'Day', '2019', '', 'আকলিমা আক্তার', '014', '2007-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019041S', '', '', '', 0, 'মোঃ মহসিন মিয়া', 'Service', 'জাহানারা বেগম', 'Housewife', '01881201580', '', 'ব্রাহ্মণচাপিতলা	রামচন্দ্রপুর	মুরাদনগর	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '41.jpg', 1, '', '???????? ????', '01881201580', 'Mother'),
(42, '6', '', 'Section - A', 'Day', '2019', '', 'স্মৃতি দেবনাথ', '015', '2008-01-01', 'Female', '', 'Bangladeshi', 'Hinduism', '2019042S', '', '', '', 0, 'প্রমোদ দেবনাথ	', 'Business', 'চন্দনা রাণী দেবনাথ', 'Housewife', '01830959397', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর,	ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '42.jpg', 1, '', '?????? ??????	', '01830959397', 'Father'),
(43, '6', '', 'Section - A', 'Day', '2019', '', 'খাদিজা আক্তার', '016', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019043S', '', '', '', 0, 'মোতালিব মিয়া', 'Business', 'শাহিনূর আক্তার', 'Housewife', '01764354635', '', 'পূর্বহাটি	রামচন্দ্রপুর	বাঞ্ছারামপুর	ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '43.jpg', 1, '', '??????? ??????', '01764354635', 'Mother'),
(44, '6', '', 'Section - A', 'Day', '2019', '', 'নিশিতা আক্তার', '017', '2007-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019044S', '', '', '', 0, 'মোঃ বাবুল সরকার', 'Business', 'জাহানারা বেগম', 'Housewife', '01914910036', '', 'ব্রাহ্মণচাপিতলা,রামচন্দ্রপুর, মুরাদনগর,	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '44.jpg', 1, '', '??? ????? ?????', '01914910036', 'Father'),
(45, '6', '', 'Section - A', 'Day', '2019', '', 'সামিরা সরকার', '019', '2007-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019045S', '', '', '', 0, 'আনোয়ার হোসেন', 'Business', 'পারভীন বেগম', 'Housewife', '01771649104', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '45.jpg', 1, '', '?????? ????', '01771649104', 'Mother'),
(46, '6', '', 'Section - A', 'Day', '2019', '', 'সহিদা আক্তার', '020', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019046S', '', '', '', 0, 'মোঃ ফরুক		', 'Others', 'মায়া বেগম', 'Housewife', '01876613873', '', 'গাওরালটুলি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '46.jpg', 1, '', '???? ????', '01876613873', 'Mother'),
(47, '6', 'Science', 'Section - A', 'Day', '2019', '', 'রেহেনা আক্তার', '021', '2008-01-01', 'Female', 'A+', 'Bangladeshi', 'Islam', '2019047S', '', '', '', 0, 'রবি মিয়া', 'Others', 'রুশিয়া বেগম', 'Housewife', '01863385709', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '47.jpg', 1, '', '??? ????', '01863385709', 'Father'),
(48, '6', '', 'Section - A', 'Day', '2019', '', 'মোসাঃ মাহমুদা আক্তার', '022', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019048S', '', '', '', 0, 'আব্দুস সালাম', 'Others', 'পারভীন আক্তার', 'Housewife', '01828396683', '', 'ব্রাহ্মণচাপিতলা	রামচন্দ্রপুর	মুরাদনগর	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '48.jpg', 1, '', '?????? ?????', '01828396683', 'Father'),
(49, '6', '', 'Section - A', 'Day', '2019', '', 'শাহিনুর আক্তার', '024', '2007-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019049S', '', '', '', 0, 'সাগর আহম্মেদ', 'Others', 'রুনা বেগম', 'Housewife', '01715076424', '', 'পূর্বহাটি	রামচন্দ্রপুর	বাঞ্ছারামপুর	ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '49.jpg', 1, '', '???? ????', '01715076424', 'Mother'),
(50, '6', '', 'Section - A', 'Day', '2019', '', 'ফারজানা আক্তার', '025', '2008-02-01', 'Female', '', 'Bangladeshi', 'Islam', '2019050S', '', '', '', 0, 'লিটন মিয়া', 'Others', 'কুলসুম বেগম', 'Housewife', '01744227289', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '50.jpg', 1, '', '?????? ????', '01744227289', 'Mother'),
(51, '6', '', 'Section - A', 'Day', '2019', '', 'ইসরাত জাহান মিম', '027', '2007-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019051S', '', '', '', 0, 'আমানউল্লাহ', 'Service', 'শরিফা বেগম', 'Housewife', '01879051518', '', 'আমিননগর, রামচন্দ্রপুর	মুরাদনগর	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '51.jpg', 1, '', '??????????', '01879051518', 'Father'),
(52, '6', '', 'Section - A', 'Day', '2019', '', 'ফাহমিদা আক্তার', '028', '2007-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019052S', '', '', '', 0, 'ফরুক মিয়া', 'Others', 'রোমানা ইয়াসমিন', 'Housewife', '01817582590', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '52.jpg', 1, '', '?????? ???????', '01817582590', 'Mother'),
(53, '6', '', 'Section - A', 'Day', '2019', '', 'কানিজ ফাতেমা', '029', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019053S', '', '', '', 0, 'রাসেল মিয়া', 'Business', 'ডলি বেগম', 'Housewife', '01865421645', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '53.jpg', 1, '', '??? ????', '01865421645', 'Mother'),
(54, '6', '', 'Section - A', 'Day', '2019', '', 'আফরোজা আক্তার', '032', '2007-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019054S', '', '', '', 0, 'আবু কালাম		', 'Others', 'খাদিজা বেগম', 'Housewife', '01842223015', '', 'ব্রাহ্মণচাপিতলা	রামচন্দ্রপুর	মুরাদনগর	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '54.jpg', 1, '', '?????? ????', '01842223015', 'Mother'),
(55, '6', '', 'Section - A', 'Day', '2019', '', 'শাহিনূর আক্তার (কারিমা)', '033', '2007-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019055S', '', '', '', 0, 'মোঃ মনিরুজ্জামান', 'Business', 'নূরুন্নাহার বেগম', 'Housewife', '01736644208', '', 'ফরদাবাদ, ফরদাবাদ, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '55.jpg', 1, '', '??????????? ????', '01736644208', 'Mother'),
(56, '6', '', 'Section - A', 'Day', '2019', '', 'তাসলিমা আক্তার', '034', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019056S', '', '', '', 0, 'জাকির হোসেন ', 'Business', 'সাবিনা ইয়াসমিন', 'Housewife', '01715869801', '', 'বড়পিপড়িয়া, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '56.jpg', 1, '', '????? ????? ', '01715869801', 'Father'),
(57, '6', '', 'Section - A', 'Day', '2019', '', 'রবাইয়া নুর অপরা', '035', '2007-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019057S', '', '', '', 0, 'আলাউদ্দিন', 'Business', 'আখিঁ আক্তার', 'Housewife', '01716200118', '', 'আমিননগর, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '57.jpg', 1, '', '?????????', '01716200118', 'Father'),
(58, '6', '', 'Section - A', 'Day', '2019', '', 'ইসরাতুল জান্নাত ছাবা', '036', '2007-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019058S', '', '', '', 0, 'শাহজাহান মিয়া		', 'Business', 'কুহিনূর আক্তার', 'Housewife', '01988778712', '', 'ফরদাবাদ	ফরদাবাদ	বাঞ্ছারামপুর	ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '58.jpg', 1, '', '??????? ??????', '01988778712', 'Mother'),
(59, '6', '', 'Section - A', 'Day', '2019', '', 'সাদিয়া আক্তার', '037', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019059S', '', '', '', 0, 'দুলাল মিয়া 		', 'Business', '	মমতাজ বেগম', 'Housewife', '01732009118', '', 'সলফা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '59.jpg', 1, '', '????? ???? 		', '01732009118', 'Father'),
(60, '6', '', 'Section - A', 'Day', '2019', '', 'আরফিন আক্তার', '038', '2007-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019060S', '', '', '', 0, 'আরজু মিয়া', 'Business', 'হাসিনা বেগম', 'Housewife', '01771416702', '', 'দুবাচাইল	ফরদাবাদ	বাঞ্ছারামপুর	ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '60.jpg', 1, '', '???? ????', '01771416702', 'Father'),
(61, '6', '', 'Section - A', 'Day', '2019', '', 'তাসমিয়া আক্তার', '040', '2007-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019061S', '', '', '', 0, 'হেলাল উদ্দিন সরকার', 'Business', 'তাহমিনা আক্তার', 'Housewife', '01904730566', '', 'গাওরালটুলি	রামচন্দ্রপুর	বাঞ্ছারামপুর	ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '61.jpg', 1, '', '??????? ??????', '01904730566', 'Mother'),
(62, '6', '', 'Section - A', 'Day', '2019', '', 'নুসরাত জাহান নুর', '041', '2007-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019062S', '', '', '', 0, 'কাবিল মিয়া', 'Business', 'রুজিনা আক্তার', 'Housewife', '01756302420', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '62.jpg', 1, '', '?????? ??????', '01756302420', 'Mother'),
(63, '6', '', 'Section - A', 'Day', '2019', '', 'সেহনুবা নেওরিন রিয়া', '042', '2007-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019063S', '', '', '', 0, 'তাজুল ইসলাম', 'Business', 'বকুল বেগম', 'Housewife', '01714344328', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '63.jpg', 1, '', '???? ????', '01714344328', 'Mother'),
(64, '6', '', 'Section - A', 'Day', '2019', '', 'উম্মে হাবিবা', '043', '2007-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019064S', '', '', '', 0, 'তৌফিকুল হাসান', 'Business', 'রোজিনা বেগম', 'Housewife', '01834482795', '', 'শুভারামপুর,রামচন্দ্রপুর, হোমনা, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '64.jpg', 1, '', '?????? ????', '01834482795', 'Mother'),
(65, '6', '', 'Section - A', 'Day', '2019', '', 'বৃস্টি রানী সরকার', '045', '2007-01-01', 'Female', '', 'Bangladeshi', 'Hinduism', '2019065S', '', '', '', 0, 'বিপ্লব চন্দ্র সরকার', 'Business', '	মাধবী রাণী সরকার', 'Housewife', '01704013748', '', 'সলফা	রামচন্দ্রপুর	মুরাদনগর	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '65.jpg', 1, '', '?????? ?????? ?????', '01704013748', 'Father'),
(66, '6', '', 'Section - A', 'Day', '2019', '', 'সানজিদা আক্তার', '047', '2007-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019066S', '', '', '', 0, 'নাসির উদ্দিন 	', 'Business', 'হেলেনা বেগম', 'Housewife', '01728429999', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '66.jpg', 1, '', '????? ??????', '01728429999', 'Father'),
(67, '6', '', 'Section - A', 'Day', '2019', '', 'প্রিয়ন্তি আক্তার', '048', '2007-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019067S', '', '', '', 0, 'ডালিম মিয়া', 'Service', 'নাহার বেগম', 'Housewife', '01308709883', '', 'পিপড়িয়াকান্দা, চন্দনাইল, মুরাদনগর, 	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '67.jpg', 1, '', '????? ????', '01308709883', 'Mother'),
(68, '6', '', 'Section - A', 'Day', '2019', '', 'সুস্মিতা রাণী সরকার', '049', '2007-01-01', 'Female', '', 'Bangladeshi', 'Hinduism', '2019068S', '', '', '', 0, 'দুলাল চন্দ্র সরকার', 'Others', 'হেলন সরকার', 'Housewife', '01840351730', '', 'সলফা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '68.jpg', 1, '', '???? ?????', '01840351730', 'Mother'),
(69, '6', '', 'Section - A', 'Day', '2019', '', 'লিজা আক্তার', '050', '2007-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019069S', '', '', '', 0, 'নজরুল ইসলাম', 'Others', 'শিল্পী আক্তার', 'Housewife', '01735151118', '', 'বড়পিপড়িয়া , চন্দনাইল,  মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '69.jpg', 1, '', '?????? ??????', '01735151118', 'Mother'),
(70, '6', '', 'Section - A', 'Day', '2019', '', 'মনি দেবনাথ', '051', '2008-01-01', 'Female', '', 'Bangladeshi', 'Hinduism', '2019070S', '', '', '', 0, 'খগেশ চন্দ্র দেবনাথ', 'Others', 'মিনতি বালা দেবী', 'Housewife', '01753061084', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '70.jpg', 1, '', '???? ?????? ??????', '01753061084', 'Father'),
(71, '6', '', 'Section - A', 'Day', '2019', '', 'একা রাণী সরকার', '052', '2008-01-01', 'Female', '', 'Bangladeshi', 'Hinduism', '2019071S', '', '', '', 0, 'চন্দন সরকার', '', 'রত্না রানী সরকার', 'Housewife', '01724745621', '', 'রামচন্দ্রপুর, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '71.jpg', 1, '', '????? ???? ?????', '01724745621', 'Mother'),
(72, '6', '', 'Section - A', 'Day', '2019', '', 'সুমাইয়া আক্তার', '053', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019072S', '', '', '', 0, 'মোঃ হাসান চৌধুরী', 'Others', 'মোসাম্মত ইয়াসমীন বেগম', 'Housewife', '01741319085', '', 'গোলপুকুরিয়া, শাহপুর, নবীনগর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '72.jpg', 1, '', '??? ????? ??????', '01741319085', 'Father'),
(73, '6', '', 'Section - A', 'Day', '2019', '', 'ইসরাত জাহান তান্না', '055', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019073S', '', '', '', 0, 'মোবারক হোসেন', 'Business', 'ফারজানা আক্তার মনি', 'Housewife', '01875636486', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '73.jpg', 1, '', '??????? ?????? ???', '01875636486', 'Mother'),
(74, '6', '', 'Section - A', 'Day', '2019', '', 'রূপালী আক্তার', '056', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019074S', '', '', '', 0, 'মুকুল মিয়া ', 'Business', 'ফিরুজা বেগম', 'Housewife', '01758597695', '', 'পিপড়িয়াকান্দা	চন্দনাইল	মুরাদনগর	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '74.jpg', 1, '', '????? ???? ', '01758597695', 'Father'),
(75, '6', '', 'Section - A', 'Day', '2019', '', 'জুনিয়া আক্তার', '057', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019075S', '', '', '', 0, 'মোঃ মনির মিয়া', 'Business', 'হাসিনা বেগম', 'Housewife', '01954076879', '', 'বাখরাবাদ, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '75.jpg', 1, '', '??? ???? ????', '01954076879', 'Father'),
(76, '6', '', 'Section - A', 'Day', '2019', '', 'সুখী আক্তার মরিয়ম', '059', '2018-08-01', 'Female', '', 'Bangladeshi', 'Islam', '2019076S', '', '', '', 0, 'বাসেদ মিয়া', 'Others', 'শেফালী বেগম', 'Housewife', '01766931272', '', 'ফরদাবাদ, ফরদাবাদ, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '76.jpg', 1, '', '?????? ????', '01766931272', 'Mother'),
(77, '6', '', 'Section - A', 'Day', '2019', '', 'সাদিয়া আক্তার', '060', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019077S', '', '', '', 0, 'খোকন সরকার	', 'Business', 'লাভলী বেগম', 'Housewife', '01734459508', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-08-19', '', '', '', '', '', '', '', '77.jpg', 1, '', '????? ????', '01734459508', 'Mother'),
(78, '6', 'Science', 'Section - A', 'Day', '2019', '', 'ঐশী পাল', '061', '2008-01-01', 'Female', 'A+', 'Bangladeshi', 'Hinduism', '2019078S', '', '', '', 0, 'সুখেন্দ্র চন্দ্র পাল', 'Business', 'শিখা রানী পাল', 'Housewife', '01854956499', '', 'বাখরাবাদ, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '78.jpg', 1, '', '????????? ?????? ???', '01854956499', 'Father'),
(79, '6', '', 'Section - A', 'Day', '2019', '', 'খাদিজা আক্তার', '062', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019079S', '', '', '', 0, 'তোতা মিয়া', 'Business', 'ফিরোজা বেগম', 'Housewife', '01766876389', '', 'ব্রাহ্মণচাপিতলা	রামচন্দ্রপুর	মুরাদনগর	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '79.jpg', 1, '', '?????? ????', '01766876389', 'Mother'),
(80, '6', '', 'Section - A', 'Day', '2019', '', 'ফাহিমা আক্তার', '063', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019080S', '', '', '', 0, 'দেলোয়ার হোসেন', 'Business', 'হাসিনা বেগম', 'Housewife', '01911394093', '', 'পিপড়িয়াকান্দা, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '80.jpg', 1, '', '?????? ????', '01911394093', 'Mother'),
(81, '6', '', 'Section - A', 'Day', '2019', '', 'সাদিয়া আক্তার', '064', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019081S', '', '', '', 0, 'সুরাপ মিয়া', 'Business', 'লাইলি বেগম', 'Housewife', '01882957804', '', 'ব্রাহ্মণচাপিতলা	রামচন্দ্রপুর	মুরাদনগর	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '81.jpg', 1, '', '????? ????', '01882957804', 'Mother'),
(82, '6', '', 'Section - A', 'Day', '2019', '', 'ছালমা আক্তার', '065', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019082S', '', '', '', 0, 'মোঃ আবু কালাম মিয়া', 'Others', 'আলেয়া বেগম', 'Housewife', '01309789574', '', 'ব্রাহ্মণচাপিতলা	রামচন্দ্রপুর	মুরাদনগর	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '82.jpg', 1, '', '??? ??? ????? ????', '01309789574', 'Father'),
(83, '6', 'Science', 'Section - A', 'Day', '2019', '', 'হাফসা আক্তার', '066', '2008-01-01', 'Female', 'A+', 'Bangladeshi', 'Islam', '2019083S', '', '', '', 0, 'মোঃ আলী হোসেন ', 'Others', 'মোসাঃ খোসেদা বেগম', 'Housewife', '01765301482', '', 'আমিননগর	রামচন্দ্রপুর	মুরাদনগর	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '83.jpg', 1, '', '??? ??? ????? ', '01765301482', 'Father'),
(84, '6', '', 'Section - A', 'Day', '2019', '', 'পলি আক্তার', '067', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019084S', '', '', '', 0, 'মোঃ মোবারক হোসেন', 'Business', 'মিনু আক্তার', 'Housewife', '01828008198', '', 'আলীপুর , চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '84.jpg', 1, '', '???? ??????', '01828008198', 'Mother'),
(85, '6', '', 'Section - A', 'Day', '2019', '', 'তানিয়া আক্তার', '068', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019085S', '', '', '', 0, 'ছেদু মিয়া', 'Business', 'রাজিয়া সুলতানা ', 'Housewife', '01980865387', '', 'গাওরালটুলি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '85.jpg', 1, '', '?????? ??????? ', '01980865387', 'Mother'),
(86, '6', '', 'Section - A', 'Day', '2019', '', 'আফরোজা আক্তার', '069', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019086S', '', '', '', 0, 'আল আমিন মিয়া ', 'Service', 'সুমি আক্তার', 'Housewife', '01784197653', '', 'গাওরালটুলি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '86.jpg', 1, '', '???? ??????', '01784197653', 'Mother'),
(87, '6', '', 'Section - A', 'Day', '2019', '', 'রূপালী রানী সরকার', '070', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019087S', '', '', '', 0, 'সত্য রঞ্জন সরকার', 'Business', 'কবিতা রানী সরকার', 'Housewife', '01881581599', '', 'সলফা	রামচন্দ্রপুর	মুরাদনগর	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '87.jpg', 1, '', '????? ???? ?????', '01881581599', 'Mother'),
(88, '6', '', 'Section - A', 'Day', '2019', '', 'আয়েশা আক্তার', '073', '2008-08-01', 'Female', '', 'Bangladeshi', 'Islam', '2019088S', '', '', '', 0, 'কবির মিয়া', 'Business', 'ঝরণা বেগম', 'Housewife', '01703064651', '', 'আমিননগর, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '88.jpg', 1, '', '???? ????', '01703064651', 'Mother'),
(89, '6', '', 'Section - A', 'Day', '2019', '', 'মাফিয়া আক্তার', '075', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019089S', '', '', '', 0, 'উসমান গনি মিয়া', 'Business', 'হাজেরা বেগম', 'Housewife', '01846410359', '', 'দুবাচাইল	ফরদাবাদ	বাঞ্ছারামপুর	ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '89.jpg', 1, '', '????? ??? ????		', '01846410359', 'Father'),
(90, '6', '', 'Section - A', 'Day', '2019', '', 'প্রিয়া রানী পাল', '076', '2008-01-01', 'Female', '', 'Bangladeshi', 'Hinduism', '2019090S', '', '', '', 0, 'ধনঞ্জয় চন্দ্র পাল', 'Business', 'শিপ্রা রানী পাল', 'Housewife', '01969690815', '', 'বাখরাবাদ, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '90.jpg', 1, '', '?????? ?????? ???', '01969690815', 'Father'),
(91, '6', '', 'Section - A', 'Day', '2019', '', 'সুমি আক্তার', '077', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019091S', '', '', '', 0, 'মামুন মিয়া', 'Business', 'পারুল বেগম', 'Housewife', '01739981104', '', 'পিপড়িয়াকান্দা, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '91.jpg', 1, '', '????? ????', '01739981104', 'Mother'),
(92, '6', '', 'Section - B', 'Day', '2019', '', 'ফারিয়া সুলতানা', '001', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190092S', '', '', '', 0, 'আঃ হাকিম', 'Service', 'আমেনা বেগম', 'Housewife', '01748802175', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর,  মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '92.jpg', 1, '', '?? ?????', '01748802175', 'Father'),
(93, '6', '', 'Section - B', 'Day', '2019', '', 'জান্নাতুল', '003', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190093S', '', '', '', 0, 'লিটন মিয়া', 'Others', 'রশিয়া বেগম', 'Housewife', '01749384549', '', 'বড়পিপড়িয়া, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '93.jpg', 1, '', '???? ????', '01749384549', 'Father'),
(94, '6', '', 'Section - B', 'Day', '2019', '', 'তুহিনুর আক্তার', '005', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190094S', '', '', '', 0, 'ওমর ফারুক', 'Service', 'শাহিনুর বেগম', 'Housewife', '01789252529', '', 'আমিননগর, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '94.jpg', 1, '', '??? ?????', '01789252529', 'Father'),
(95, '6', 'Science', 'Section - B', 'Day', '2019', '', 'রিয়া মণি', '006', '2008-01-01', 'Female', 'A+', 'Bangladeshi', 'Islam', '20190095S', '', '', '', 0, 'রফিক মিয়া', 'Service', 'ইয়াসমিন আক্তার', 'Housewife', '01795874941', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '95.jpg', 1, '', '???? ????', '01795874941', 'Father'),
(96, '6', 'Science', 'Section - B', 'Day', '2019', '', 'মাকসুদা আক্তার', '007', '2008-01-01', 'Female', 'A+', 'Bangladeshi', 'Islam', '20190096S', '', '', '', 0, 'মানিক মিয়া', 'Business', 'লাইলি বেগম', 'House Wife', '01753335782', '', 'আলীপুর	চন্দনাইল	মুরাদনগর	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '96.jpg', 1, '', '????? ????', '01753335782', 'Mother'),
(97, '6', 'Science', 'Section - B', 'Day', '2019', '', 'সিানজিদা আক্তার', '008', '2008-01-01', 'Female', 'A+', 'Bangladeshi', 'Islam', '20190097S', '', '', '', 0, 'আব্দুল মোতালিব		', 'Service', 'অরুনা বেগম', 'Housewife', '01822787270', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '97.jpg', 1, '', '????? ????', '01822787270', 'Father'),
(98, '6', '', 'Section - B', 'Day', '2019', '', 'আরাবি আক্তার', '010', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190098S', '', '', '', 0, 'জজ মিয়া', 'Business', 'ইয়াসমিন আক্তার', 'Housewife', '01302032454', '', 'আলীপুর, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '98.jpg', 1, '', '??????? ??????', '01302032454', 'Mother'),
(99, '6', '', 'Section - B', 'Day', '2019', '', 'সায়মা আক্তার', '011', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190099S', '', '', '', 0, 'আলাউদ্দিন মিয়া', 'Others', 'মোমেনা বেগম', 'Housewife', '01750909462', '', 'ইসলামপুর, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '99.jpg', 1, '', '????????? ????', '01750909462', 'Father'),
(100, '6', '', 'Section - B', 'Day', '2019', '', 'আফনানা মজুমদার ফাতিমা', '012', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190100S', '', '', '', 0, 'মোঃআনোয়ার হোসেন', 'Business', 'খাদিজা আক্তার', 'Housewife', '01719699521', '', 'গাওরালটুলি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '100.jpg', 1, '', '?????? ??????', '01719699521', 'Mother'),
(101, '6', '', 'Section - B', 'Day', '2019', '', 'ফারজনা আক্তার', '013', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190101S', '', '', '', 0, 'মোঃ বিল্লাল হোসেন', 'Others', 'নূর নাহার বেগম', 'Housewife', '01739406546', '', 'গাওরালটুলি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '101.jpg', 1, '', '??? ??????? ?????', '01739406546', 'Father'),
(102, '7', '', 'Section - A', 'Day', '2019', '', 'রত্না আক্তার', '013', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190102S', '', '', '', 0, 'বশির মিয়া', 'Others', 'মাকসুদা বেগম', 'Housewife', '01719699253', '', 'সলপা, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '102.jpg', 1, '', '???? ????', '01719699253', 'Father'),
(103, '7', '', 'Section - A', 'Day', '2019', '', 'অর্পনা রানী সরকার', '014', '2008-01-01', 'Female', '', 'Bangladeshi', 'Hinduism', '20190103S', '', '', '', 0, 'সুবল চন্দ্র সরকার', 'Business', 'অর্চনা রানী সরকার', 'Housewife', '01726980601', '', 'পিপড়িয়া, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '103.jpg', 1, '', '?????? ???? ?????', '01726980601', 'Mother'),
(104, '7', 'Science', 'Section - A', 'Day', '2019', '', 'সুামাইয়া জাহান (শিমু)', '015', '2008-01-01', 'Female', 'A+', 'Bangladeshi', 'Islam', '20190104S', '', '', '', 0, 'মোতালিব মিয়া', 'Service', 'নাজমা বেগম', 'Housewife', '01756580839', '', 'আমিননগর, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '104.jpg', 1, '', '??????', '01756580839', 'Teacher'),
(105, '7', '', 'Section - A', 'Day', '2019', '', 'ফারজানা আক্তার', '016', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190105S', '', '', '', 0, 'খোকন মিয়া', 'Service', 'বিউটি আক্তার', 'Housewife', '01740655244', '', 'কালিসীমা, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '105.jpg', 1, '', '????? ??????', '01740655244', 'Mother'),
(106, '7', '', 'Section - A', 'Day', '2019', '', 'খাদিজা তুল কোবড়া', '017', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190106S', '', '', '', 0, 'আবু মুছা	', 'Business', 'মাহমুদা বেগম', 'Housewife', '01712775402', '', 'বাখরাবাদ, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '106.jpg', 1, '', '??????? ????', '01712775402', 'Mother'),
(107, '7', '', 'Section - A', 'Day', '2019', '', 'নিপা আক্তার', '018', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190107S', '', '', '', 0, 'আবুল কালাম', 'Service', 'জামেনা বেগম', 'Housewife', '01830024702', '', 'গাওরালটুলি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '107.jpg', 1, '', '?????? ????', '01830024702', 'Mother'),
(108, '7', '', 'Section - A', 'Day', '2019', '', 'তানিয়া আক্তার', '019', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190108S', '', '', '', 0, 'বিল্লাল হোসেন', 'Business', 'আসমা বেগম', 'Housewife', '01874358935', '', 'আমিননগর, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '108.jpg', 1, '', '???? ????', '01874358935', 'Mother'),
(109, '7', '', 'Section - A', 'Day', '2019', '', 'তামান্না আক্তার', '020', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190109S', '', '', '', 0, 'মোঃ মজু মিয়া', 'Business', 'নূরজাহান বেগম', 'Housewife', '01733702325', '', 'গাওরালটুলি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '109.jpg', 1, '', '???????? ????', '01733702325', 'Mother'),
(110, '7', '', 'Section - A', 'Day', '2019', '', 'জান্নাতুল ফেরদৌসি', '022', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190110S', '', '', '', 0, 'হোসেন সিকদার', 'Business', 'রহিমা বেগম', 'Housewife', '01944766826', '', 'আমিননগর, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '110.jpg', 1, '', '????? ????', '01944766826', 'Mother'),
(111, '7', '', 'Section - A', 'Day', '2019', '', 'রাকিবা আক্তার', '023', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190111S', '', '', '', 0, 'মোঃ আলম মিয়া', 'Others', 'সারমিন বেগম', 'Housewife', '01961033469', '', 'সলপা, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '111.jpg', 1, '', '??? ??? ????', '01961033469', 'Father'),
(112, '7', '', 'Section - A', 'Day', '2019', '', 'নিপা আক্তার', '024', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190112S', '', '', '', 0, 'নূর ইসলাম মিয়া', 'Others', 'খুর্শিদা বেগম', 'Housewife', '01734890688', '', 'গাওরালটুলি,রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '112.jpg', 1, '', '??? ????? ????', '01734890688', 'Father'),
(113, '7', '', 'Section - A', 'Day', '2019', '', 'ইমা আক্তার', '026', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190113S', '', '', '', 0, 'কাবিল হোসেন', 'Business', 'হনুফা বেগম', 'Housewife', '01771416720', '', 'আমিননগর, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '113.jpg', 1, '', '????? ?????', '01771416720', 'Father'),
(114, '7', '', 'Section - A', 'Day', '2019', '', 'সাদিয়া আক্তার মিম', '027', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190114S', '', '', '', 0, 'শাহজাহান		', 'Others', 'দিলু বেগম', 'Housewife', '01732652613', '', 'আমিননগর, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '114.jpg', 1, '', '????????', '01732652613', 'Father'),
(115, '7', '', 'Section - A', 'Day', '2019', '', 'মাহমুদা আক্তার', '028', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190115S', '', '', '', 0, 'আবুল কালাম', 'Others', 'রুশিয়া বেগম', 'Housewife', '01883329201', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '115.jpg', 1, '', '???? ?????', '01883329201', 'Father'),
(116, '7', '', 'Section - A', 'Day', '2019', '', 'লামিয়া আক্তার', '029', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190116S', '', '', '', 0, 'দুলাল মিয়া', 'Service', 'হেলেনা বেগম', 'Housewife', '01775038798', '', 'গাওরালটুলি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '116.jpg', 1, '', '?????? ????', '01775038798', 'Mother'),
(117, '7', '', 'Section - A', 'Day', '2019', '', 'সামিয়া জাহান ইসরাত', '030', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190117S', '', '', '', 0, 'কাবির হোসেন', 'Service', 'পারভীন আক্তার', 'Housewife', '01624805223', '', 'আমিননগর, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '117.jpg', 1, '', '????? ?????', '01624805223', 'Father'),
(118, '7', '', 'Section - A', 'Day', '2019', '', 'তাসলিমা আক্তার', '031', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190118S', '', '', '', 0, 'জাকির হোসেন', 'Business', 'আফরোজা বেগম', 'Housewife', '01875764008', '', 'আমিননগর, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '118.jpg', 1, '', '?????? ????', '01875764008', 'Mother'),
(119, '7', '', 'Section - A', 'Day', '2019', '', 'ঊমি আক্তার', '032', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190119S', '', '', '', 0, 'আবুল কালাম', 'Others', 'হাজেরা খাতুন', 'Housewife', '01781284852', '', 'বড় পিপোরিয়া,	চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '119.jpg', 1, '', '???? ?????', '01781284852', 'Father'),
(120, '7', '', 'Section - A', 'Day', '2019', '', 'জান্নাতুল ফেরদৌসি', '033', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190120S', '', '', '', 0, 'ইকবাল হোসেন', 'Others', 'আয়েশা বেগম', 'Housewife', '01747496853', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর	, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '120.jpg', 1, '', '????? ?????', '01747496853', 'Father'),
(121, '7', '', 'Section - A', 'Day', '2019', '', 'রোবাইয়া প্রধান আশা', '034', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190121S', '', '', '', 0, 'খালেক প্রধান', 'Business', 'সাহিদা বেগম', 'Housewife', '01794455725', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '121.jpg', 1, '', '????? ??????', '01794455725', 'Father'),
(122, '7', '', 'Section - A', 'Day', '2019', '', 'সারথি রানী দাস', '035', '2008-01-01', 'Female', '', 'Bangladeshi', 'Hinduism', '20190122S', '', '', '', 0, 'নরেশ চন্দ্র দাস', 'Others', 'মোহন বাসী দাস', 'Housewife', '01732251144', '', 'বাখরাবাদ, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '122.jpg', 1, '', '???? ?????? ???', '01732251144', 'Father'),
(123, '7', '', 'Section - A', 'Day', '2019', '', 'মারিয়া জান্নাত (মীম)', '036', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190123S', '', '', '', 0, 'মুর্শিদ মিয়া', 'Others', 'হনুফা বেগম', 'Housewife', '01732494832', '', 'আমিননগর, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '123.jpg', 1, '', '??????? ????', '01732494832', 'Father'),
(124, '7', '', 'Section - A', 'Day', '2019', '', 'সুলতানা আক্তার', '037', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190124S', '', '', '', 0, 'আক্কাস মিয়া', 'Others', 'হনুফা বেগম', 'Housewife', '01732494832', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর,  মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '124.jpg', 1, '', '????? ????', '01732494832', 'Mother'),
(125, '7', '', 'Section - A', 'Day', '2019', '', 'আলিফ জাহান', '038', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190125S', '', '', '', 0, 'মোঃ হুমায়ূন কবির সরকার', 'Service', 'মোঃ লিপি আক্তার', 'Housewife', '01720679487', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর	, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '125.jpg', 1, '', '??? ??????? ???? ?????', '01720679487', 'Father'),
(126, '7', '', 'Section - A', 'Day', '2019', '', 'মৌমিতা জাহান', '039', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190126S', '', '', '', 0, 'বুলবুল আহাম্মেদ', 'Others', 'শেফালী বেগম', 'Housewife', '01820104841', '', 'পিপড়িয়া, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '126.jpg', 1, '', '?????? ????????', '01820104841', 'Father'),
(127, '7', '', 'Section - A', 'Day', '2019', '', 'মিতু আক্তার', '040', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190127S', '', '', '', 0, 'জাহাঙ্গির আলম', 'Others', 'সাজেদা আলম', 'Housewife', '01889154469', '', 'পেন্নই, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '127.jpg', 1, '', '????????? ???', '01889154469', 'Father'),
(128, '7', '', 'Section - A', 'Day', '2019', '', 'সানজিদা আক্তার', '042', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190128S', '', '', '', 0, 'জাকির হোসেন', 'Others', 'হালিমা বেগম', 'Housewife', '01878722541', '', 'সরেরপাড়, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '128.jpg', 1, '', '?????? ????', '01878722541', 'Mother'),
(129, '7', '', 'Section - A', 'Day', '2019', '', 'মারিয়া', '044', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190129S', '', '', '', 0, 'মোঃ মরম আলী ', 'Others', 'রেহেনা বেগম', 'Housewife', '01813254104', '', 'সলপা, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '129.jpg', 1, '', '??? ??? ??? ', '01813254104', 'Father'),
(130, '7', '', 'Section - A', 'Day', '2019', '', 'আফসানা আহাম্মেদ', '045', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190130S', '', '', '', 0, 'কবির আহাম্মেদ ', 'Others', 'আফরোজা বেগম', 'Housewife', '01814206270', '', 'রাজাচাপিতলা,	বাঙ্গরা	মুরাদনগর, 	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '130.jpg', 1, '', '???? ???????? ', '01814206270', 'Father'),
(131, '7', '', 'Section - A', 'Day', '2019', '', 'মনিষা গুহ', '046', '2008-01-01', 'Female', '', 'Bangladeshi', 'Hinduism', '20190131S', '', '', '', 0, 'সত্য রঞ্জন গুহ', 'Others', 'শিপ্রা রাণী গুহ', 'Housewife', '01819953842', '', 'পিপড়িয়া, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '131.jpg', 1, '', '???? ????? ???', '01819953842', 'Father'),
(132, '7', '', 'Section - A', 'Day', '2019', '', 'রুনা আক্তার', '047', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190132S', '', '', '', 0, 'জালাল মিয়া', 'Business', 'সুরাইয়া আক্তার', 'Housewife', '01786328661', '', 'সলপা, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '132.jpg', 1, '', '??????? ??????', '01786328661', 'Mother');
INSERT INTO `12_insert_student_info` (`record_id`, `class_name`, `group_name`, `section_name`, `shift_name`, `session_name`, `version_name`, `name`, `roll`, `date_of_birth`, `gender`, `blood_group`, `nationality`, `religion`, `student_unique_id`, `password`, `subject`, `fourth_subject`, `fourth_subject_id`, `father_name`, `father_occupation`, `mother_name`, `mother_occupation`, `parents_mobile`, `parents_email`, `address`, `admission_date`, `ssc_reg`, `ssc_roll`, `ssc_session`, `ssc_year`, `ssc_result`, `ssc_board`, `ssc_institution`, `image`, `status`, `alternative_mobile`, `guardian_name`, `guardian_mobile`, `guardian_realtion`) VALUES
(133, '7', '', 'Section - A', 'Day', '2019', '', 'জান্নাতুল ফেরদৌসি', '048', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190133S', '', '', '', 0, 'কামাল উদ্দিন ', 'Others', 'রিনা বেগম', 'Housewife', '01732432131', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '133.jpg', 1, '', '???? ????', '01732432131', 'Mother'),
(134, '7', '', 'Section - A', 'Day', '2019', '', 'সুমাইয়া আক্তার', '049', '2008-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190134S', '', '', '', 0, 'মোঃ তাজুল ইসলাম', 'Others', 'লিপি বেগম', 'Housewife', '01814928063', '', 'আমিননগর, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '134.jpg', 1, '', '???? ????', '01814928063', 'Mother'),
(135, '7', '', 'Section - A', 'Day', '2019', '', 'নুছরাত জাহান তুলি', '050', '2008-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190135S', '', '', '', 0, 'নজরুল ইসলাম', 'Business', 'নেহেরা আক্তার', 'Housewife', '01779513480', '', 'আমিননগর, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '135.jpg', 1, '', '?????? ??????', '01779513480', 'Mother'),
(136, '9', 'Science - A', '', 'Day', '2019', '', 'শাহরিয়ার হোসেন', '005', '2006-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190136S', '', '', 'উচ্চতর গণিত', 42, 'মোঃ আলমগীর হোসেন', 'Service', 'ফারহানা নাসরীন', 'Housewife', '01999674807', '', 'রামচন্দ্রপুর, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '136.jpg', 1, '', '??????? ??????', '01999674807', 'Mother'),
(137, '9', 'Science - A', '', 'Day', '2019', '', 'জিসান আহামেদ', '006', '2006-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190137S', '', '', 'উচ্চতর গণিত', 42, 'মোঃ জজ মিয়া', 'Business', 'মোসাঃ রিজা বেগম', 'Housewife', '01753813754', '', 'আমিননগর, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '137.jpg', 1, '', '???? ?? ????', '01753813754', 'Father'),
(138, '9', 'Science - A', '', 'Day', '2019', '', 'সনাতন গোস্বামী', '007', '2006-01-01', 'Male', '', 'Bangladeshi', 'Hinduism', '20190138S', '', '', 'উচ্চতর গণিত', 42, 'স্বপন গোস্বামী', 'Others', 'মাধবী আচার্য্য', 'Housewife', '01725291889', '', 'পূর্বহাটি, রামচন্দ্রপুর, মুরাদনগর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '138.jpg', 1, '', '????? ????????', '01725291889', 'Father'),
(139, '9', 'Science - A', '', 'Day', '2019', '', 'মিফতাউল ইসলাম শাহেদ', '009', '2006-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190139S', '', '', 'উচ্চতর গণিত', 42, 'গোলাম মোস্তফা', 'Business', 'হালিমা বেগম', 'Housewife', '01741649754', '', 'পূর্বহাটি, রামচন্দ্রপুর, মুরাদনগর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '139.jpg', 1, '', '????? ???????', '01741649754', 'Father'),
(140, '9', 'Science - A', '', 'Day', '2019', '', 'মোঃ হাসিব সরকার', '011', '2006-10-01', 'Male', '', 'Bangladeshi', 'Islam', '20190140S', '', '', 'উচ্চতর গণিত', 42, 'মোঃ কায়কোবাদ সরকার', 'Service', 'হাফিজা বেগম', 'Housewife', '01731313228', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর	, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '140.jpg', 1, '', '??? ???????? ?????', '01731313228', 'Father'),
(141, '9', 'Science - A', '', 'Day', '2019', '', 'নয়ন পাল', '012', '2006-01-01', 'Male', '', 'Bangladeshi', 'Hinduism', '20190141S', '', '', 'উচ্চতর গণিত', 42, 'কৃষ্ণ পাল', 'Business', 'অন্নপূর্না পাল', 'Housewife', '01716843167', '', 'রামচন্দ্রপুর, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '141.jpg', 1, '', '????? ???', '01716843167', 'Father'),
(142, '9', 'Science - A', '', 'Day', '2019', '', 'মোঃ আব্দুল্লাহ আল রুমান', '013', '2006-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190142S', '', '', 'উচ্চতর গণিত', 42, 'মোঃ মাহফুজুর রহমান', 'Service', 'নাজমা বেগম', 'Housewife', '01849816739', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর	, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '142.jpg', 1, '', '??? ???????? ?????', '01849816739', 'Father'),
(143, '9', 'Science - A', '', 'Day', '2019', '', 'জুয়েল চন্দ্র সরকার', '015', '2006-01-01', 'Male', '', 'Bangladeshi', 'Hinduism', '20190143S', '', '', 'উচ্চতর গণিত', 42, 'নরেশ চন্দ্র সরকার', 'Business', 'পারুল রাণী সরকার', 'Housewife', '01940244534', '', 'কৈজুরী, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '143.jpg', 1, '', '???? ?????? ?????', '01940244534', 'Father'),
(144, '9', 'Science - A', '', 'Day', '2019', '', 'মেহেদী হাসান', '016', '2006-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190144S', '', '', 'উচ্চতর গণিত', 42, 'মোবারক হোসেন', 'Business', 'পুষ্পা নাহার', 'Housewife', '01987586318', '', 'কাঁঠালিয়াকান্দ, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '144.jpg', 1, '', '?????? ?????', '01987586318', 'Mother'),
(145, '9', 'Science - A', '', 'Day', '2019', '', 'তরিকুল ইসলাম রিফাত', '017', '2006-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190145S', '', '', 'উচ্চতর গণিত', 42, 'রিয়াজুল ইসলাম', 'Service', 'বিলকিছ ইসলাম', 'Service', '01794721760', '', 'শোভারামপুর,রামচন্দ্রপুর, হোমনা, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '145.jpg', 1, '', '?????? ?????', '01794721760', 'Mother'),
(146, '9', 'Science - A', '', 'Day', '2019', '', 'ছাইদুল মোরছালিন', '019', '2006-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190146S', '', '', 'উচ্চতর গণিত', 42, 'শহিদুল ইসলাম', 'Business', 'ফাতেমা বেগম', 'Housewife', '01762430324', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '146.jpg', 1, '', '?????? ????', '01762430324', 'Mother'),
(147, '9', 'Science - A', '', 'Day', '2019', '', 'কাজী জাহিদুল ইসলাম', '020', '2006-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190147S', '', '', 'উচ্চতর গণিত', 42, 'কাজী নাছির', 'Service', 'সানজিদা আক্তার লিপি', 'Housewife', '01677885301', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '147.jpg', 1, '', '???? ?????', '01677885301', 'Father'),
(148, '9', 'Science - A', '', 'Day', '2019', '', 'সাজু ঘোষ', '022', '2006-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190148S', '', '', 'উচ্চতর গণিত', 42, 'টিটন ঘোষ', 'Business', 'সোমা ঘোষ', 'Housewife', '01720375447', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '148.jpg', 1, '', '???? ???', '01720375447', 'Father'),
(149, '9', 'Science - A', '', 'Day', '2019', '', 'স্বণামনি সরকার', '026', '2006-01-01', 'Female', '', 'Bangladeshi', 'Hinduism', '20190149S', '', '', 'উচ্চতর গণিত', 42, 'সুশীল চন্দ্র সরকার', 'Others', 'শিখা রাণী সরকার', 'Housewife', '01786328625', '', 'রামচন্দ্রপুর, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '149.jpg', 1, '', '????? ?????? ?????', '01786328625', 'Father'),
(150, '9', 'Science - A', '', 'Day', '2019', '', 'হাফসা', '027', '2006-01-01', 'Female', 'A+', 'Bangladeshi', 'Islam', '20190150S', '', '', 'উচ্চতর গণিত', 42, 'মোঃ আবু তাহের', 'Service', 'মোসাঃ নিলুফার ইয়াসমিন', 'Housewife', '01814440858', '', 'শাহী রামচন্দ্রপুর, শাহী রামচন্দ্রপুর, বুড়িচং, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '150.jpg', 1, '', '??? ??? ?????', '01814440858', 'Father'),
(151, '9', 'Science - A', '', 'Day', '2019', '', 'নুসরাত জামান নুপুর', '028', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190151S', '', '', 'উচ্চতর গণিত', 42, 'আছাদুজ্জামান লিটন', 'Business', 'আছমা আক্তার চৌধুরী', 'Others', '01721042626', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '151.jpg', 1, '', '???? ?????? ??????', '01721042626', 'Father'),
(152, '9', 'Science - A', '', 'Day', '2019', '', 'সুমাইয়া আলম শ্রাবনী', '030', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190152S', '', '', 'উচ্চতর গণিত', 42, 'মোঃ আব্দুল আলীম', 'Service', 'মোসাঃ মাহফুজা বেগম', '', '01745922291', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '152.jpg', 1, '', '????? ??????? ????', '01745922291', 'Mother'),
(153, '9', 'Science - A', '', 'Day', '2019', '', 'সীমা আক্তার', '031', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190153S', '', '', 'উচ্চতর গণিত', 42, 'মোঃ ফরিদ মিয়া', 'Others', '	সাজেদা বেগম', 'Housewife', '01714349901', '', 'সড়েরপাড়, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '153.jpg', 1, '', '??? ???? ????', '01714349901', 'Father'),
(154, '9', 'Science - A', '', 'Day', '2019', '', 'আনিকা তাসনিম তানহা', '033', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190154S', '', '', 'উচ্চতর গণিত', 42, 'তোফাজ্জল হোসেন', 'Business', 'ফরিদা ইয়াসমীন', 'Housewife', '01787347778', '', 'কালিসীমা, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '154.jpg', 1, '', '???????? ?????		', '01787347778', 'Father'),
(155, '9', 'Science - A', '', 'Day', '2019', '', 'ফাতেমা আক্তার ঝুমুর', '036', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190155S', '', '', 'উচ্চতর গণিত', 42, 'মোঃ মজিবুর রহমান', 'Others', 'আলেখা বেগম', 'Housewife', '01731888278', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '155.jpg', 1, '', '??? ?????? ?????', '01731888278', 'Father'),
(156, '9', 'Humanities - A', '', 'Day', '2019', '', 'আরিফা আক্তার', '001', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190156S', '', '', 'অর্থনীতি', 44, 'ফারুক আহমেদ', 'Service', 'সালমা বেগম', 'Housewife', '01717048302', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2006-01-01', '', '', '', '', '', '', '', '156.jpg', 1, '', '????? ????', '01717048302', 'Mother'),
(157, '9', 'Humanities - A', '', 'Day', '2019', '', 'সুমাইয়া আক্তার', '003', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190157S', '', '', 'অর্থনীতি', 44, 'ইকবাল হোসেন', 'Service', 'তামান্না বেগম', 'Housewife', '01789252422', '', 'আমিননগর, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '157.jpg', 1, '', '???????? ????', '01789252422', 'Mother'),
(158, '9', 'Humanities - A', '', 'Day', '2019', '', 'রুবি আক্তার', '004', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190158S', '', '', 'অর্থনীতি', 44, 'মোঃ আনোয়ার হোসেন	', 'Service', 'সালমা বেগম', 'Housewife', '01812322652', '', 'আব্দুল্লাবাদ, নাসিরাবাদ, ভাঙ্গা, ফরিদপুর', '2019-01-01', '', '', '', '', '', '', '', '158.jpg', 1, '', '????? ????', '01812322652', 'Mother'),
(159, '9', 'Humanities - A', '', 'Day', '2019', '', 'আমেনা আক্তার', '005', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190159S', '', '', 'অর্থনীতি', 44, 'আক্কাস মিয়া', 'Business', 'অজুফা বেগম', 'Housewife', '01756292139', '', 'আমিননগর,	রামচন্দ্রপুর	, মুরাদনগর	, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '159.jpg', 1, '', '?????? ????', '01756292139', 'Father'),
(160, '9', 'Humanities - A', '', 'Day', '2019', '', 'আশিকুর রহমান আকাশ', '006', '2006-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190160S', '', '', 'অর্থনীতি', 44, 'আল-আমিন', 'Service', 'শিপু আক্তার', 'Housewife', '01868789877', '', 'নিজকান্দি, 	ফরদাবাদ, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '160.jpg', 1, '', '???? ??????', '01868789877', 'Mother'),
(161, '9', 'Humanities - A', '', 'Day', '2019', '', 'শাহিনুর আক্তার', '007', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190161S', '', '', 'অর্থনীতি', 44, 'আল-আমিন মিয়া', 'Service', 'লিপি বেগম', 'Housewife', '01874141662', '', 'আমিননগর, রামচন্দ্রপুর, মুরাদনগর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '161.jpg', 1, '', '???? ????', '01874141662', 'Mother'),
(162, '9', 'Humanities - A', '', 'Day', '2019', '', 'সানিয়া আক্তার সাথী', '008', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190162S', '', '', 'অর্থনীতি', 44, 'মোঃ জসীমউদ্দিন', 'Service', 'ফৌজিয়া বেগম', 'Service', '01759090472', '', 'মোহাম্মদপুর, মোহাম্মদপুর, দেবিদ্বার, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '162.jpg', 1, '', '?????? ????', '01759090472', 'Mother'),
(163, '9', 'Humanities - A', '', 'Day', '2019', '', 'সম্পা রাণী পাল', '009', '2006-01-01', 'Female', '', 'Bangladeshi', 'Hinduism', '20190163S', '', '', 'অর্থনীতি', 44, 'কানাই পাল', 'Others', 'চন্দনা রাণী পাল', 'Housewife', '01966882112', '', 'বাখরাবাদ, রামচন্দ্রপুর, মুরাদনগর, 	ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '163.jpg', 1, '', '????? ???', '01966882112', 'Father'),
(164, '9', 'Humanities - A', '', 'Day', '2019', '', 'মোঃ ইয়াসমিন মিয়া', '010', '2006-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190164S', '', '', 'অর্থনীতি', 44, 'জিলানী মিয়া', 'Service', 'হোসনেআরা বেগম', 'Housewife', '01838088069', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর	, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '164.jpg', 1, '', '?????? ????', '01838088069', 'Father'),
(165, '9', 'Humanities - A', '', 'Day', '2019', '', 'মিতু আক্তার', '012', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190165S', '', '', 'অর্থনীতি', 44, 'আলমগীর হোসেন', 'Service', 'আঁখি বেগম', 'Housewife', '01762447815', '', 'পূর্বহাটি, ফরদাবাদ, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '165.jpg', 1, '', '???? ????', '01762447815', 'Mother'),
(166, '9', 'Humanities - A', '', 'Day', '2019', '', 'সাদিয়া আক্তার', '013', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190166S', '', '', 'অর্থনীতি', 44, 'মোঃ তারেক মিয়া', 'Service', 'সাকিলা আক্তার', 'Housewife', '01730699065', '', 'পূর্বহাটি, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '166.jpg', 1, '', '?????? ????', '01730699065', 'Teacher'),
(167, '9', 'Humanities - A', '', 'Day', '2019', '', 'সুবর্না আক্তার হাবিবা', '015', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190167S', '', '', 'অর্থনীতি', 44, 'মোঃ মহিউদ্দিন	', 'Service', 'হাফিজা বেগম', 'Housewife', '01757837776', '', 'পূর্বহাটি, ফরদাবাদ, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '167.jpg', 1, '', '?????? ????', '01757837776', 'Mother'),
(168, '9', 'Humanities - A', '', 'Day', '2019', '', 'খাদিজা আক্তার', '016', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190168S', '', '', 'অর্থনীতি', 44, 'সুলতান মিয়া', 'Others', 'সাহিদা বেগম', 'Housewife', '01701851042', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর,  কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '168.jpg', 1, '', '?????? ????', '01701851042', 'Father'),
(169, '9', 'Humanities - A', '', 'Day', '2019', '', 'ইলমা সরকার', '017', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190169S', '', '', 'অর্থনীতি', 44, 'আনোয়ার হোসেন', 'Service', 'পারভীন  আক্তার', 'Housewife', '01771649101', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '169.jpg', 1, '', '??????  ??????', '01771649101', 'Mother'),
(170, '9', 'Humanities - A', '', 'Day', '2019', '', 'ইমরান আহমেদ', '018', '2006-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190170S', '', '', 'অর্থনীতি', 44, 'মোঃ সফর আলী', 'Service', 'শিরিনা বেগম', 'Housewife', '01832469188', '', 'নিজকান্দি, ফরদাবাদ, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '170.jpg', 1, '', '??? ??? ???', '01832469188', 'Father'),
(171, '9', 'Humanities - A', '', 'Day', '2019', '', 'ইমা আক্তার', '021', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190171S', '', '', 'অর্থনীতি', 44, 'রফিকুল ইসলাম', 'Service', 'পারভিন বেগম', 'Housewife', '01811995363', '', 'আমিননগর, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '171.jpg', 1, '', '?????? ????', '01811995363', 'Mother'),
(172, '9', 'Humanities - A', '', 'Day', '2019', '', 'মাকছুদা আক্তার', '022', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190172S', '', '', 'অর্থনীতি', 44, 'মোঃ মতিউর রহমান', 'Service', 'খুর্শিদা বেগম', 'Housewife', '01639068375', '', 'মনিপুর, মনিপুর, হোমনা, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '172.jpg', 1, '', '???????? ????', '01639068375', 'Mother'),
(173, '9', 'Humanities - A', '', 'Day', '2019', '', 'খাদিজা আক্তার', '023', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190173S', '', '', 'অর্থনীতি', 44, 'হাসান শিকদার', 'Business', 'ইয়াসমিন বেগম', 'Housewife', '01714264938', '', 'আমিননগর, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '173.jpg', 1, '', '????? ??????', '01714264938', 'Father'),
(174, '9', 'Humanities - A', '', 'Day', '2019', '', 'আবু সাঈদ', '024', '2006-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190174S', '', '', 'অর্থনীতি', 44, 'মোঃ শামীম', 'Others', 'রাবিয়া বেগম', 'Housewife', '01941157937', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '174.jpg', 1, '', '??? ?????', '01941157937', 'Father'),
(175, '9', 'Humanities - A', '', 'Day', '2019', '', 'বৃষ্টি আক্তার', '026', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190175S', '', '', 'অর্থনীতি', 44, 'মাহফুজ ব্যাপারি', 'Business', 'সান্তা বেগম', 'Housewife', '01715997521', '', 'উত্তর পেন্নই, চন্দনাইল, মুরাদনগর, 	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '175.jpg', 1, '', '?????? ????????', '01715997521', 'Father'),
(176, '9', 'Humanities - A', '', 'Day', '2019', '', 'খাদিজা আক্তার', '027', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190176S', '', '', 'অর্থনীতি', 44, 'ফাতিমা বেগম', 'Business', 'ফাতিমা বেগম', 'Housewife', '01787908931', '', 'উত্তর পেন্নই, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '176.jpg', 1, '', '?????? ????', '01787908931', 'Mother'),
(177, '9', 'Humanities - A', '', 'Day', '2019', '', 'নূরে জান্নাত মনিরা', '029', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190177S', '', '', 'অর্থনীতি', 44, 'আঃ মতিন', 'Business', 'বিলকিছ বেগম', 'Housewife', '01833933369', '', 'সরেরপাড়, 	রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '177.jpg', 1, '', '?? ????', '01833933369', 'Father'),
(178, '9', 'Humanities - A', '', 'Day', '2019', '', 'মাহমুদা আক্তার', '032', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190178S', '', '', 'অর্থনীতি', 44, 'জাকির হোসেন	', 'Business', 'তাসলিমা বেগম', 'Housewife', '01817094815', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-08-24', '', '', '', '', '', '', '', '178.jpg', 1, '', '????? ?????	', '01811681239', 'Father'),
(179, '9', 'Humanities - A', '', 'Day', '2019', '', 'শান্তা আক্তার', '033', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190179S', '', '', 'অর্থনীতি', 44, 'হাসান ইমাম', 'Service', 'হেলেনা বেগম', 'Housewife', '01876121859', '', 'বাখরাবাদ, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '179.jpg', 1, '', '????? ????', '01876121859', 'Father'),
(180, '9', 'Humanities - A', '', 'Day', '2019', '', 'নাসরিন আক্তার', '034', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190180S', '', '', 'অর্থনীতি', 44, 'মোঃ নাসির	', 'Others', 'নারগিছ বেগম', 'Housewife', '১৭৭০৪০৯৪৮৬', '', 'তুলাতুলি, তুলাতুলি, সদর, চট্টগ্রাম', '2019-01-01', '', '', '', '', '', '', '', '180.jpg', 1, '', '??? ????? ????', '01770409486', 'Maternal Uncle '),
(181, '9', 'Humanities - A', '', 'Day', '2019', '', 'মোঃ কাইয়ূম', '036', '2006-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190181S', '', '', 'অর্থনীতি', 44, 'মোঃ ফিরুজ মিয়া', 'Business', 'নারগিছ বেগম', 'Housewife', '+966534484105', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '181.jpg', 1, '', '?????? ????', '01727842395', 'Mother'),
(182, '9', 'Humanities - A', '', 'Day', '2019', '', 'সানজিদা আক্তার', '038', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190182S', '', '', 'অর্থনীতি', 44, 'মফিজ উদ্দিন', 'Others', 'রিনা বেগম', 'Housewife', '01778194541', '', 'গাওরালটুলি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '182.jpg', 1, '', '???? ????', '01778194541', 'Mother'),
(183, '9', 'Humanities - A', '', 'Day', '2019', '', 'মারিয়া জান্নাত', '039', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190183S', '', '', 'অর্থনীতি', 44, 'মহরম আলী', 'Business', 'আনোয়ারা বেগম', 'Housewife', '01736421232', '', 'আমিননগর, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '183.jpg', 1, '', '???? ???', '01736421232', 'Father'),
(184, '9', 'Humanities - A', '', 'Day', '2019', '', 'আশরাফুল ইসলাম', '040', '2006-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190184S', '', '', 'অর্থনীতি', 44, 'জিলানী মিয়া', 'Business', 'আমেনা বেগম', 'Housewife', '01318801660', '', 'ব্রাহ্মণচাপিতলা	রামচন্দ্রপুর	মুরাদনগর	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '184.jpg', 1, '', '????? ????', '01941020757', 'Mother'),
(185, '9', 'Humanities - A', '', 'Day', '2019', '', 'হাবিবা আক্তার', '041', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190185S', '', '', 'অর্থনীতি', 44, 'হাবিব মিয়া', 'Others', 'হোসনা আক্তার ', 'Housewife', '01832376494', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর. কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '185.jpg', 1, '', '????? ?????? ', '01832376494', 'Mother'),
(186, '9', 'Humanities - A', '', 'Day', '2019', '', 'সাইফুল ইসলাম', '042', '2006-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190186S', '', '', 'অর্থনীতি', 44, 'আব্দুর রহমান', 'Others', 'মোসাঃ সামসুর নাহার', 'Housewife', '01832858066', '', 'দিগলদী, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '186.jpg', 1, '', '?????? ?????', '01832858066', 'Father'),
(187, '9', 'Humanities - A', '', 'Day', '2019', '', 'সাইদুল ইসলাম', '043', '2006-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190187S', '', '', 'অর্থনীতি', 44, 'মোঃ আমীর হোসেন', 'Business', 'পারুল আক্তার', 'Housewife', '01790105753', '', 'মাহুতিকান্দা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '187.jpg', 1, '', '????? ??????', '01790105753', 'Mother'),
(188, '9', 'Humanities - A', '', 'Day', '2019', '', 'তানজিনা আক্তার', '044', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190188S', '', '', 'অর্থনীতি', 44, 'মামুন মিয়া', 'Service', 'পারুল বেগম', 'Housewife', '0096879244158', '', 'পিঁপড়িয়াকান্দা, ফরদাবাদ, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '188.jpg', 1, '', '????? ????', '01739981104', 'Mother'),
(189, '9', 'Humanities - A', '', 'Day', '2019', '', 'কারিমা আক্তার', '047', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190189S', '', '', 'অর্থনীতি', 44, 'সিরাজুল ইসলাম', 'Business', 'শারমিন বেগম', 'Housewife', '01708516661', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '189.jpg', 1, '', '?????? ????', '01708516661', 'Mother'),
(190, '9', 'Humanities - A', '', 'Day', '2019', '', 'কাকলি আক্তার', '048', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190190S', '', '', 'অর্থনীতি', 44, 'মনিরুল ইসলাম', 'Service', 'রাজিয়া বেগম', 'Housewife', '01718276387', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '190.jpg', 1, '', '?????? ????', '01718276387', 'Mother'),
(191, '9', 'Humanities - A', '', 'Day', '2019', '', 'আমেনা আক্তার', '050', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190191S', '', '', 'অর্থনীতি', 44, 'সহিদ মিয়া', 'Service', 'মালেকা বেগম', '', '01719853755', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '191.jpg', 1, '', '?????? ????', '01719853755', 'Mother'),
(192, '9', 'Humanities - A', '', 'Day', '2019', '', 'স্বর্ণাহার', '051', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190192S', '', '', 'অর্থনীতি', 44, 'আক্তার হোসেন', 'Service', 'খাদিজা বেগম', 'Housewife', '01956253511', '', 'উত্তর পেন্নই, চন্দনাইল, মুরাদনগর, 	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '192.jpg', 1, '', '?????? ????', '01956253511', 'Mother'),
(193, '9', 'Humanities - A', '', 'Day', '2019', '', 'পল্লবী আক্তার', '053', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190193S', '', '', 'অর্থনীতি', 44, 'নজরুল ইসলাম', 'Service', 'সাবিনা ইয়াসমীন', 'Housewife', '01788956682', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '193.jpg', 1, '', '?????? ???????', '01788956682', 'Mother'),
(194, '9', 'Humanities - A', '', 'Day', '2019', '', 'শরিফা আক্তার', '058', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190194S', '', '', 'অর্থনীতি', 44, 'আব্দুল ওহাব', 'Service', 'পারভীন বেগম', 'Housewife', '01988778540', '', 'ব্রাহ্মণচাপিতলা,  রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '194.jpg', 1, '', '?????? ????', '01767595515', 'Mother'),
(195, '9', 'Humanities - A', '', 'Day', '2019', '', 'হেলাল উদ্দিন', '059', '2006-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190195S', '', '', 'অর্থনীতি', 44, 'মোঃ হানিফ মিয়া', 'Others', 'আছিয়া বেগম', 'Housewife', '01834959780', '', 'পেরাকান্দি, নবিপুর, দেবিদ্বার, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '195.jpg', 1, '', '??? ????? ????', '01834959780', 'Father'),
(196, '9', 'Humanities - A', '', 'Day', '2019', '', 'আল-মামুন', '060', '2006-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190196S', '', '', 'অর্থনীতি', 44, 'মঙ্গল মিয়া', 'Others', 'জরিনা বেগম', 'Housewife', '01700795621', '', 'গাওরালটুলি, ফরদাবাদ, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '196.jpg', 1, '', '????? ????', '01700795621', 'Father'),
(197, '9', 'Humanities - A', '', 'Day', '2019', '', 'সুমাইয়া আক্তার মিম', '062', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190197S', '', '', 'অর্থনীতি', 44, 'মোঃ মহিউদ্দিন	', 'Others', 'মোসাঃ লিপি আক্তার', 'Housewife', '01820127004', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '197.jpg', 1, '', '??? ?????????	', '01820127004', 'Father'),
(198, '9', 'Humanities - A', '', 'Day', '2019', '', 'শামিম আক্তার', '063', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190198S', '', '', 'অর্থনীতি', 44, 'শাহআলম সরকার', 'Business', 'মমতাজ বেগম', 'Housewife', '01716619101', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '198.jpg', 1, '', '????? ????', '01716619101', 'Mother'),
(199, '9', 'Humanities - A', '', 'Day', '2019', '', 'তানিয়া আক্তার', '064', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190199S', '', '', 'অর্থনীতি', 44, 'রহিম মিয়া', 'Business', 'আসমা বেগম', 'Housewife', '01738227758', '', 'সলপা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '199.jpg', 1, '', '???? ????', '01738227758', 'Mother'),
(200, '9', 'Humanities - A', '', 'Day', '2019', '', 'মোসাঃ তানিয়া আক্তার', '065', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190200S', '', '', 'অর্থনীতি', 44, 'মোহাম্মদ জিলানী মিয়া', 'Business', 'আমেনা বেগম', 'Housewife', '01941020757', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '200.jpg', 1, '', '????? ????', '01941020757', 'Mother'),
(201, '9', 'Humanities - A', '', 'Day', '2019', '', 'হিমা আক্তার', '068', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190201S', '', '', 'অর্থনীতি', 44, 'মোবারক হোসেন', 'Service', 'মমতাজ বেগম', 'Housewife', '01797385267', '', 'পিঁপড়িয়াকান্দা, ফরদাবাদ, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '201.jpg', 1, '', '????? ????', '01797385267', 'Mother'),
(202, '9', 'Humanities - A', '', 'Day', '2019', '', 'মোঃ বাহাউদ্দিন মিয়া', '069', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190202S', '', '', 'অর্থনীতি', 44, 'জয়নাল আবেদীন', 'Business', 'ঝরনা বেগম', 'Housewife', '01906430499', '', 'তেমুরিয়া, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '202.jpg', 1, '', '????? ??????', '01906430499', 'Father'),
(203, '9', 'Humanities - A', '', 'Day', '2019', '', 'তাহমিনা সুলতানা', '071', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190203S', '', '', 'অর্থনীতি', 44, 'মোঃ আমীর হোসেন', 'Business', 'সেলিনা বেগম', 'Housewife', '01821927845', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-08-24', '', '', '', '', '', '', '', '203.jpg', 1, '', '??? ???? ?????', '01821927845', 'Father'),
(204, '9', 'Humanities - A', '', 'Day', '2019', '', 'সিনথিয়া', '073', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190204S', '', '', 'অর্থনীতি', 44, 'মোঃ দেলোয়ার হোসেন	', 'Business', 'নারগিছ বেগম', 'Housewife', '+97433519409', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '204.jpg', 1, '', '?????? ????', '01788794795', 'Mother'),
(205, '9', 'Humanities - A', '', 'Day', '2019', '', 'তানজিন তাসফিয়া', '075', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190205S', '', '', 'অর্থনীতি', 44, 'গিয়াসউদ্দিন মিয়া', 'Service', 'তাহমিনা বেগম', 'Housewife', '01917291828', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর	,কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '205.jpg', 1, '', '??????? ????', '01917291828', 'Mother'),
(206, '9', 'Humanities - A', '', 'Day', '2019', '', 'মোঃ শরীফ', '076', '2006-02-01', 'Male', '', 'Bangladeshi', 'Islam', '20190206S', '', '', 'অর্থনীতি', 44, 'বাবুল মিয়া', 'Others', 'রাশিদা বেগম', '', '01846008276', '', 'তেমুরিয়া, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '206.jpg', 1, '', '????? ????', '01887233261', 'Father'),
(207, '9', 'Humanities - A', '', 'Day', '2019', '', 'খাদিজা আক্তার', '077', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190207S', '', '', 'অর্থনীতি', 44, 'ইসমাইল মিয়া', 'Others', 'শাহিনূর বেগম', 'Housewife', '01720995690', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '207.jpg', 1, '', '?????? ????', '01720995690', 'Father'),
(208, '9', 'Humanities - A', '', 'Day', '2019', '', 'সাথী আক্তার', '079', '2005-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190208S', '', '', 'অর্থনীতি', 44, 'আলম মিয়া', 'Service', 'মোমেনা বেগম', 'Housewife', '01755018920', '', 'গাওরালটুলি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '208.jpg', 1, '', '?????? ????', '01755018920', 'Mother'),
(209, '9', 'Humanities - A', '', 'Day', '2019', '', 'জান্নাতুল ফেরদৌস', '082', '2006-02-01', 'Female', '', 'Bangladeshi', 'Islam', '20190209S', '', '', 'অর্থনীতি', 44, 'মনিরুল হক', 'Business', 'পেয়ারা বেগম', 'Housewife', '01778722158', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর,  কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '209.jpg', 1, '', '?????? ????', '01778722158', 'Mother'),
(210, '9', 'Humanities - A', '', 'Day', '2019', '', 'তানজিনা আক্তার', '083', '2003-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190210S', '', '', 'অর্থনীতি', 44, 'আল-আমিন মিয়া', 'Others', 'সুমি আক্তার', 'Housewife', '01743206579', '', 'পিঁপড়িয়াকান্দা, ফরদাবাদ, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '210.jpg', 1, '', '??-???? ????', '01743206579', 'Father'),
(211, '9', 'Humanities - A', '', 'Day', '2019', '', 'মোঃ ইব্রাহিম খলিল', '084', '2005-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190211S', '', '', 'অর্থনীতি', 44, 'শাহ্ আলম ', 'Service', 'তসলিমা আক্তার', 'Housewife', '01914281352', '', 'ভিটি বিশাড়া, গকুলনগর, নবীনগর, 	ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '211.jpg', 1, '', '???? ??? 		', '01914281352', 'Father'),
(212, '9', 'Humanities - A', '', 'Day', '2019', '', 'নাদিয়া আক্তার', '085', '2005-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190212S', '', '', 'অর্থনীতি', 44, 'কাজী আজাদ', 'Others', 'মাহমুদা বেগম', 'Housewife', '01851614641', '', 'হোসেনপুর, চরবাকর, দেবিদ্বার, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '212.jpg', 1, '', '???? ????', '01851614641', 'Mother'),
(213, '9', 'Humanities  - B', '', 'Day', '2019', '', 'আলাউদ্দিন', '001', '2006-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190213S', '', '', 'অর্থনীতি', 44, 'আবু তাহের	', 'Others', 'মমতাজ বেগম', 'Housewife', '01996963179', '', 'তেমুরিয়া, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '213.jpg', 1, '', '????? ????', '01824959780', 'Mother'),
(214, '9', 'Humanities  - B', '', 'Day', '2019', '', 'কবির হোসেন', '002', '2006-02-01', 'Male', '', 'Bangladeshi', 'Islam', '20190214S', '', '', 'অর্থনীতি', 44, 'কালা মিয়া', 'Business', 'সেতারা বেগম', 'Housewife', '01759446968', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর	, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '214.jpg', 1, '', '?????? ????', '01759446968', 'Mother'),
(215, '9', 'Humanities  - B', '', 'Day', '2019', '', 'রুবি আক্তার', '003', '2005-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190215S', '', '', 'অর্থনীতি', 44, 'মোঃ শফিকুল ইসলাম', 'Others', 'ফাতেমা বেগম', 'Housewife', '01820252792', '', 'সাহেবনগর,  রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '215.jpg', 1, '', '??? ?????? ?????', '01820252792', 'Father'),
(216, '9', 'Humanities  - B', '', 'Day', '2019', '', 'কাকুলি রাণী সরকার', '005', '2005-01-01', 'Female', '', 'Bangladeshi', 'Hinduism', '20190216S', '', '', 'অর্থনীতি', 44, 'কৃষ্ণ চন্দ্র সরকার', 'Business', 'পুতুলি রাণী সরকার', 'Housewife', '01823472327', '', 'সলপা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '216.jpg', 1, '', '?????? ???? ?????', '01823472327', 'Mother'),
(217, '9', 'Humanities  - B', '', 'Day', '2019', '', 'জাহিদ হাসান', '006', '2004-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190217S', '', '', 'অর্থনীতি', 44, 'মোঃ হানিফ মিয়া', 'Business', 'মোসাঃ মমতাজ বেগম', 'Housewife', '01708580722', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '217.jpg', 1, '', '??? ????? ????', '01708580722', 'Father'),
(218, '9', 'Humanities  - B', '', 'Day', '2019', '', 'শান্তা আক্তার', '008', '2005-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190218S', '', '', 'অর্থনীতি', 44, 'মোঃ আবু মুছা ', 'Others', 'সাকিনা বেগম', 'Housewife', '01767467517', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '218.jpg', 1, '', '??? ??? ???? ', '01767467517', 'Father'),
(219, '9', 'Humanities  - B', '', 'Day', '2019', '', 'রিয়া মনি', '010', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190219S', '', '', 'অর্থনীতি', 44, 'আবু মুসা সরকার', 'Business', 'মর্জিনা বেগম', 'Housewife', '01727611015', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর, 	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '219.jpg', 1, '', '??? ???? ?????', '01727611015', 'Father'),
(220, '9', 'Humanities  - B', '', 'Day', '2019', '', 'জয় চন্দ্র সরকার', '014', '2005-01-01', 'Male', '', 'Bangladeshi', 'Hinduism', '20190220S', '', '', 'অর্থনীতি', 44, 'রিপন চন্দ্র সরকার', 'Others', 'পুতুল রাণী সরকার', 'Housewife', '01685609397', '', 'কৈজুরী, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '220.jpg', 1, '', '???? ?????? ?????', '01988778659', 'Mother'),
(221, '9', 'Humanities  - B', '', 'Day', '2019', '', 'তাকিয়া আক্তার (জান্নাত)', '015', '2005-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190221S', '', '', 'অর্থনীতি', 44, 'আব্দুল হান্নান', 'Business', 'কাজী আফরোজা বেগম', 'Housewife', '01720304806', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর,	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '221.jpg', 1, '', '?????? ???????', '01736226021', 'Father'),
(222, '9', 'Humanities  - B', '', 'Day', '2019', '', 'আব্দুল রহমান', '016', '2004-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190222S', '', '', 'অর্থনীতি', 44, 'জাকির হোসেন	', 'Others', 'মনোয়ারা বেগম', '', '01732098747', '', 'গাওরালটুলি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '222.jpg', 1, '', '??????? ????', '01701848936', 'Mother'),
(223, '9', 'Humanities  - B', '', 'Day', '2019', '', 'আঃ আলিম', '017', '2005-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190223S', '', '', 'অর্থনীতি', 44, 'মুক্তাল হোসেন', 'Service', 'রাজিয়া বেগম', 'Housewife', '01732098747', '', 'গাওরালটুলি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '223.jpg', 1, '', '?????? ????', '01732098747', 'Mother'),
(224, '9', 'Humanities  - B', '', 'Day', '2019', '', 'মোঃ হাছান', '018', '2005-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190224S', '', '', 'অর্থনীতি', 44, 'মোঃ মোস্তফা মিয়া', 'Business', 'নার্গিছ বেগম', 'Housewife', '01763135852', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '224.jpg', 1, '', '??? ??????? ????', '01763135852', 'Father'),
(225, '9', 'Humanities  - B', '', 'Day', '2019', '', 'মানসুরা আক্তার', '019', '2005-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190225S', '', '', 'অর্থনীতি', 44, 'মনিরুল ইসলাম', 'Others', 'শিল্পী আক্তার', 'Housewife', '01720484265', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '225.jpg', 1, '', '?????? ?????', '01720484265', 'Father'),
(226, '9', 'Humanities  - B', '', 'Day', '2019', '', 'মোঃ জুয়েল মিয়া', '021', '2004-02-01', 'Male', '', 'Bangladeshi', 'Islam', '20190226S', '', '', 'অর্থনীতি', 44, 'খুরশিদ আলম', 'Business', 'সেলিনা বেগম', 'Housewife', '01814291196', '', 'তেমুরিয়া, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '226.jpg', 1, '', '?????? ???', '01814291196', 'Father'),
(227, '9', 'Humanities  - B', '', 'Day', '2019', '', 'ইসরাত জাহান', '024', '2004-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190227S', '', '', 'অর্থনীতি', 44, 'মোঃ আলী মিয়া ', 'Service', 'খাদিজা বেগম', 'Housewife', '01716209633', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর	,কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '227.jpg', 1, '', '??? ??? ???? ', '01716209633', 'Father'),
(228, '9', 'Humanities  - B', '', 'Day', '2019', '', 'সুমাইয়া আক্তার', '027', '2005-10-01', 'Female', '', 'Bangladeshi', 'Islam', '20190228S', '', '', 'অর্থনীতি', 44, 'আয়ূব মিয়া	', 'Service', 'পারভীন বেগম', 'Housewife', '01821912883', '', 'পিপড়িয়াকান্দা, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '228.jpg', 1, '', '?????? ????', '01821912883', 'Mother'),
(229, '9', 'Humanities  - B', '', 'Day', '2019', '', 'তানভীর আলম রাব্বি', '028', '2005-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190229S', '', '', 'অর্থনীতি', 44, 'খোরশিদ আলম', 'Service', 'রেহেনা বেগম', 'Housewife', '01924267193', '', 'কৈজুরী, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '229.jpg', 1, '', '?????? ???', '01757700320', 'Father'),
(230, '9', 'Humanities  - B', '', 'Day', '2019', '', 'ফয়সাল আহম্মেদ', '029', '2004-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190230S', '', '', 'অর্থনীতি', 44, 'গিয়াস উদ্দিন', 'Business', 'শাহিদা বেগম', 'Housewife', '01725784101', '', 'সরেরপাড়, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '230.jpg', 1, '', '????? ??????', '01725784101', 'Father'),
(231, '9', 'Humanities  - B', '', 'Day', '2019', '', 'নাঈম', '031', '2005-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190231S', '', '', 'অর্থনীতি', 44, 'কালাম মিয়া', 'Others', 'কুলসুম বেগম', 'Housewife', '01825589746', '', 'রামচন্দ্রপুর, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '231.jpg', 1, '', '????? ????', '01825589746', 'Father'),
(232, '9', 'Humanities  - B', '', 'Day', '2019', '', 'উম্মে হাবিবা', '034', '2005-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190232S', '', '', 'অর্থনীতি', 44, 'মোঃ কবির সরকার', 'Others', 'সাজেদা বেগম', 'Housewife', '01770685072', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর	, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '232.jpg', 1, '', '??? ???? ?????', '01770685072', 'Father'),
(233, '9', 'Humanities  - B', '', 'Day', '2019', '', 'তানিয়া আক্তার', '038', '2004-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190233S', '', '', 'অর্থনীতি', 44, 'কবির হোসেন', 'Others', 'রেহেনা বেগম', 'Housewife', '01776392118', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '233.jpg', 1, '', '???? ?????', '01776392118', 'Father'),
(234, '9', 'Humanities  - B', '', 'Day', '2019', '', 'ফারজানা আক্তার', '042', '2004-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190234S', '', '', 'অর্থনীতি', 44, 'ফারুক মিয়া', 'Others', 'মিনু বেগম', 'Housewife', '01877177249', '', 'সরেরপাড়, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '234.jpg', 1, '', '???? ????', '01877177249', 'Mother'),
(235, '9', 'Humanities  - B', '', 'Day', '2019', '', 'তানজিনা আক্তার', '043', '2003-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190235S', '', '', 'অর্থনীতি', 44, 'ইসাক মিয়া ', 'Others', 'মরিয়ম বেগম', 'Housewife', '01731864094', '', 'পিপড়িয়াকান্দা, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '235.jpg', 1, '', '???? ???? ', '01731864094', 'Father'),
(236, '9', 'Humanities  - B', '', 'Day', '2019', '', 'ঊম্মে মারিয়া', '045', '2004-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190236S', '', '', 'অর্থনীতি', 44, 'মোসলেম উদ্দিন', 'Business', 'সেলিনা বেগম', 'Housewife', '01856786684', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '236.jpg', 1, '', '?????? ??????', '01856786684', 'Father'),
(237, '9', 'Humanities  - B', '', 'Day', '2019', '', 'সানজিদা আক্তার', '047', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190237S', '', '', 'অর্থনীতি', 44, 'জসু মিয়া ', 'Business', 'মাজেদা বেগম', 'Housewife', '01983926290', '', 'পিপড়িয়াকান্দা, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '237.jpg', 1, '', '??? ???? ', '01983926290', 'Father'),
(238, '9', 'Humanities  - B', '', 'Day', '2019', '', 'জোনাকী আক্তার', '048', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190238S', '', '', 'অর্থনীতি', 44, 'জীবন মিয়া ', 'Business', 'রহিমা বেগম', 'Housewife', '01770167115', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর	, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '238.jpg', 1, '', '???? ???? ', '01770167115', 'Father'),
(239, '9', 'Humanities  - B', '', 'Day', '2019', '', 'নাইমা আক্তার', '049', '2004-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190239S', '', '', 'অর্থনীতি', 44, 'রমিজ মিয়া	', 'Others', 'ইয়াসমিন বেগম', 'Housewife', '01307842257', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '239.jpg', 1, '', '??????? ????', '01307842257', 'Mother'),
(240, '9', 'Humanities  - B', '', 'Day', '2019', '', 'তৃষা দেবনাথ', '063', '2004-01-01', 'Female', '', 'Bangladeshi', 'Hinduism', '20190240S', '', '', 'অর্থনীতি', 44, 'লক্ষণ দেবনাথ', 'Service', 'ছায়া রাণী দেবনাথ', 'Housewife', '01786549494', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '240.jpg', 1, '', '???? ???? ??????', '01786549494', 'Mother'),
(241, '9', 'Humanities  - B', '', 'Day', '2019', '', 'রাজিয়া আক্তার', '066', '2004-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190241S', '', '', 'অর্থনীতি', 44, 'মুছা মিয়া', 'Business', 'নাজমা বেগম', 'Housewife', '01955174028', '', 'তিলককান্দি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '241.jpg', 1, '', '???? ????', '01955174028', 'Father'),
(242, '9', 'Humanities  - B', '', 'Day', '2019', '', 'শমির মিয়া', '069', '2004-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190242S', '', '', 'অর্থনীতি', 44, 'মোঃ মোজাম্মেল হক', 'Others', 'হোসনেয়ারা বেগম', 'Housewife', '01863279047', '', 'উত্তর পেন্নই, চন্দনাইল, মুরাদনগর,	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '242.jpg', 1, '', '????? ????', '01863279047', 'Brother'),
(243, '9', 'Humanities  - B', '', 'Day', '2019', '', 'তম্ময় কুমার দাস', '070', '2005-01-01', 'Male', '', 'Bangladeshi', 'Hinduism', '20190243S', '', '', 'অর্থনীতি', 44, 'তপন কুমার দাস', 'Service', 'ডলি রাণী দাস', '', '01796291336', '', 'বাখরাবাদ, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '243.jpg', 1, '', '??? ????? ???', '01826410543', 'Father'),
(244, '9', 'Humanities  - B', '', 'Day', '2019', '', 'মাহমুদা আক্তার', '073', '2004-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190244S', '', '', 'অর্থনীতি', 44, 'মাইনউদ্দিন মিয়া', 'Business', 'মুসেনুর বেগম', 'Housewife', '01731429876', '', 'পিপড়িয়াকান্দা, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '244.jpg', 1, '', '?????????? ????', '01731429876', 'Father'),
(245, '9', 'Humanities  - B', '', 'Day', '2019', '', 'ইয়াছিন', '078', '2006-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190245S', '', '', 'অর্থনীতি', 44, 'এরশাদ মিয়া', 'Others', 'হালিমা বেগম', 'Housewife', '01766818434', '', 'আমিননগর, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '245.jpg', 1, '', '????? ????', '01766818434', 'Father'),
(246, '9', 'Humanities  - B', '', 'Day', '2019', '', 'তফসিরুল ইসলাম', '081', '2004-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190246S', '', '', 'অর্থনীতি', 44, 'তাইজুল ইসলাম', 'Business', 'আখেরা বেগম', 'Housewife', '01830858978', '', 'আমিননগর, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '246.jpg', 1, '', '?????? ?????', '01830858978', 'Father'),
(247, '7', '', 'Section - A', 'Day', '2019', '', 'ঊমি আক্তার', '051', '2007-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190247S', '', '', '', 0, 'নাসির মিয়া ', 'Others', 'মনি বেগম', 'Housewife', '01753791986', '', 'ব্রাহ্মণচাপিতলা	রামচন্দ্রপুর	মুরাদনগর	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '247.jpg', 1, '', '????? ???? ', '01753791986	', 'Father'),
(248, '7', '', 'Section - A', 'Day', '2019', '', 'সীমা আক্তার', '052', '2007-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190248S', '', '', '', 0, 'রিপন মিয়া	', 'Business', 'ইয়াসমীন বেগম', 'Housewife', '01726609330', '', 'পিপড়িয়াকান্দা, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '248.jpg', 1, '', '??????? ????', '01726609330', 'Mother'),
(249, '7', '', 'Section - A', 'Day', '2019', '', 'জান্নাতুল প্রিয়া', '053', '2007-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190249S', '', '', '', 0, 'হেলাল মিয়া', 'Service', 'নিপা আক্তার', 'Housewife', '01798394747', '', 'পিপড়িয়াকান্দা, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '249.jpg', 1, '', '???? ??????', '01798394747', 'Mother'),
(250, '7', '', 'Section - A', 'Day', '2019', '', 'সুবর্ণা রাণী সরকার', '055', '2007-01-01', 'Female', '', 'Bangladeshi', 'Hinduism', '20190250S', '', '', '', 0, 'কৃষ্ণ চন্দ্র সরকার', 'Others', 'শেফালী রাণী সরকার', 'Housewife', '01715867948', '', 'শ্যামগ্রাম, শ্যামগ্রাম, নবীনগর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '250.jpg', 1, '', '????? ?????? ?????', '01715867948', 'Father'),
(251, '7', '', 'Section - A', 'Day', '2019', '', 'আয়েশা আক্তার', '056', '2007-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190251S', '', '', '', 0, 'আক্কাস মিয়া', 'Others', 'সাহেরা বেগম', 'Housewife', '01940913504', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর	, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '251.jpg', 1, '', '?????? ????', '01940913504', 'Father'),
(252, '7', '', 'Section - A', 'Day', '2019', '', 'সোনিয়া আক্তার', '057', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190252S', '', '', '', 0, 'রবিউল মিয়া', 'Business', 'নাজমা বেগম', 'Housewife', '01728084037', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর	, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '252.jpg', 1, '', '????? ????', '01728084037', 'Father'),
(253, '7', 'Science - A', 'Section - A', 'Day', '2019', '', 'বারিরাহ অলি', '058', '2006-01-01', 'Female', 'A+', 'Bangladeshi', 'Islam', '20190253S', '', '', '', 0, 'অলি উল্লাহ্	', 'Business', 'ফৌজিয়া খানম মিনু', 'Housewife', '01906999879', '', 'পিপড়িয়া, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '253.jpg', 1, '', '?????? ???? ????', '01906999879', 'Mother'),
(254, '7', '', 'Section - A', 'Day', '2019', '', 'সানজিদা ইসলাম', '059', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190254S', '', '', '', 0, 'সিরাজুল ইসলাম', 'Business', 'সাদিয়া ইসলাম', 'Housewife', '01720175735', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-08-25', '', '', '', '', '', '', '', '254.jpg', 1, '', '????? ????', '01775852281', 'Brother'),
(255, '9', 'Business Studies - A', '', 'Day', '2019', '', 'জোনাকী আক্তার', '001', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190255S', '', '', 'অর্থনীতি', 44, 'কায়কোবাদ বেপারী', 'Business', 'শিউলী বেগম', 'Housewife', '01724975108', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '255.jpg', 1, '', '???????? ??????', '01724975108', 'Father'),
(256, '9', 'Business Studies - A', '', 'Day', '2019', '', 'মনবাসী', '002', '2006-01-01', 'Female', '', 'Bangladeshi', 'Hinduism', '20190256S', '', '', 'অর্থনীতি', 44, 'কালন চন্দ্র দাস', 'Business', 'সরস্বতী বালা দাস', 'Housewife', '01849218108', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '256.jpg', 1, '', '???? ?????? ???', '01849218108', 'Father'),
(257, '9', 'Business Studies - A', '', 'Day', '2019', '', 'মঈন খান', '003', '2006-01-01', 'Male', 'A+', 'Bangladeshi', 'Islam', '20190257S', '', '', 'অর্থনীতি', 44, 'মোঃ মোয়াজ্জেম হোসেন', '', 'লাভলী আক্তার', 'Housewife', '01703718344', '', 'সাহেবনগর, রামচন্দ্রপুর, মুরাদনগর	, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '257.jpg', 1, '', '??? ????????? ?????', '01703718344', 'Father'),
(258, '9', 'Business Studies - A', '', 'Day', '2019', '', 'পপি আক্তার', '005', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190258S', '', '', 'অর্থনীতি', 44, 'আঃ রশিদ', 'Business', 'বিউটি বেগম', 'Housewife', '01711032655', '', 'বাখরাবাদ, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '258.jpg', 1, '', '?? ????', '01711032655', 'Father');
INSERT INTO `12_insert_student_info` (`record_id`, `class_name`, `group_name`, `section_name`, `shift_name`, `session_name`, `version_name`, `name`, `roll`, `date_of_birth`, `gender`, `blood_group`, `nationality`, `religion`, `student_unique_id`, `password`, `subject`, `fourth_subject`, `fourth_subject_id`, `father_name`, `father_occupation`, `mother_name`, `mother_occupation`, `parents_mobile`, `parents_email`, `address`, `admission_date`, `ssc_reg`, `ssc_roll`, `ssc_session`, `ssc_year`, `ssc_result`, `ssc_board`, `ssc_institution`, `image`, `status`, `alternative_mobile`, `guardian_name`, `guardian_mobile`, `guardian_realtion`) VALUES
(259, '9', 'Business Studies - A', '', 'Day', '2019', '', 'মুক্তা রাণী সরকার', '006', '2005-01-01', 'Female', '', 'Bangladeshi', 'Hinduism', '20190259S', '', '', 'অর্থনীতি', 44, 'পরিমল চন্দ্র সরকার', 'Business', 'যোগল রাণী সরকার', 'Housewife', '01720284226', '', 'সলপা, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '259.jpg', 1, '', '???? ???? ?????', '01720284226', 'Mother'),
(260, '9', 'Business Studies - A', '', 'Day', '2019', '', 'রিফাতুল ইসলাম', '007', '2006-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190260S', '', '', 'অর্থনীতি', 44, 'খুরশিদ মিয়া', 'Service', 'ছামছুন্নাহার', 'Housewife', '01787040216', '', 'উত্তর পেন্নই, চন্দনাইল, মুরাদনগর, 	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '260.jpg', 1, '', '????????????', '01787040216', 'Mother'),
(261, '9', 'Business Studies - A', '', 'Day', '2019', '', 'রাকিবা আক্তার', '008', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190261S', '', '', 'অর্থনীতি', 44, 'মোঃ মোস্তফা কামাল', 'Others', 'কুলসুম বেগম', 'Housewife', '01857754472', '', 'বড়িয়াচাড়া, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '261.jpg', 1, '', '??? ??????? ?????', '01857754472', 'Father'),
(262, '9', 'Business Studies - A', '', 'Day', '2019', '', 'সুমাইয়া আক্তার', '009', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190262S', '', '', 'অর্থনীতি', 44, 'দেলোয়ার হোসেন', 'Business', 'হনুফা বেগম', 'Housewife', '01863062556', '', 'বাখরাবাদ, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '262.jpg', 1, '', '????? ????', '01863062556', 'Mother'),
(263, '9', 'Business Studies - A', '', 'Day', '2019', '', 'রোকসানা আক্তার', '010', '2005-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190263S', '', '', 'অর্থনীতি', 44, 'আঃ রহিম', 'Business', 'রিনা বেগম', 'Housewife', '0150437050', '', 'দুবাচাইল, ফরদাবাদ, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '263.jpg', 1, '', '?? ????', '0150437050', 'Father'),
(264, '9', 'Business Studies - A', '', 'Day', '2019', '', 'ফাহিম বিন কালাম', '011', '2006-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190264S', '', '', 'অর্থনীতি', 44, 'আবুল কালাম', 'Others', 'নয়ন তারা', 'Housewife', '01818340229', '', 'রামচন্দ্রপুর, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '264.jpg', 1, '', '??? ????', '01818340229', 'Mother'),
(265, '9', 'Business Studies - A', '', 'Day', '2019', '', 'সাইফুল ইসলাম', '014', '2006-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190265S', '', '', 'অর্থনীতি', 44, 'বাসির মিয়া	', 'Business', 'রানু বেগম', 'Housewife', '01866058626', '', 'কালিসীমা, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '265.jpg', 1, '', '????? ????	', '01866058626', 'Father'),
(266, '9', 'Business Studies - A', '', 'Day', '2019', '', 'সজল দাস', '016', '2006-01-01', 'Male', '', 'Bangladeshi', 'Hinduism', '20190266S', '', '', 'অর্থনীতি', 44, 'চন্দ্র মোহন দাস', 'Business', 'সীতা রাণী দাস', 'Housewife', '01759265810', '', 'বাখরাবাদ, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '266.jpg', 1, '', '?????? ???? ???', '01759265810', 'Father'),
(267, '9', 'Business Studies - A', '', 'Day', '2019', '', 'গোবিন্দ পোদ্দার', '018', '2006-01-01', 'Male', '', 'Bangladeshi', 'Hinduism', '20190267S', '', '', 'অর্থনীতি', 44, 'মৃত নিতাই  পোদ্দার		', 'Others', 'ঊষা রাণী পোদ্দার', 'Service', '01779832810', '', 'রামচন্দ্রপুর, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '267.jpg', 1, '', '??? ???? ????', '01779832810', 'Sister in Law'),
(268, '9', 'Business Studies - A', '', 'Day', '2019', '', 'কাজী ইশরাত জাহান ইভা', '019', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190268S', '', '', 'অর্থনীতি', 44, 'কাজী ইয়াহিয়া', 'Business', 'আফরোজা বেগম', 'Housewife', '01817644235', '', 'পিপড়িয়া, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '268.jpg', 1, '', '?????? ????', '01817644235', 'Mother'),
(269, '9', 'Business Studies - A', '', 'Day', '2019', '', 'তৌসিফা আক্তার নিশি', '021', '2006-01-01', 'Female', 'A+', 'Bangladeshi', 'Islam', '20190269S', '', '', 'গ্রার্হস্থ্য বিজ্ঞান', 29, 'তমিজ উদ্দিন ভূঁইয়া', 'Business', 'মনিরা বেগম', 'Housewife', '01834901763', '', 'কালিসীমা, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '269.jpg', 1, '', '????? ????', '01834901763', 'Mother'),
(270, '9', 'Business Studies - A', '', 'Day', '2019', '', 'সালমা আক্তার', '023', '2005-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190270S', '', '', 'গ্রার্হস্থ্য বিজ্ঞান', 29, 'জাকির হোসেন	', 'Business', 'স্বপ্না বেগম', 'Housewife', '01779417507', '', 'দুবাচাইল, ফরদাবাদ, নবীনগর, 	ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '270.jpg', 1, '', '??????? ????', '01779417507', 'Father'),
(271, '9', 'Business Studies - A', '', 'Day', '2019', '', 'দীনা দেবনাথ', '032', '2005-01-01', 'Male', '', 'Bangladeshi', 'Hinduism', '20190271S', '', '', 'কৃষি শিক্ষা', 30, 'স্বপন দেবনাথ', 'Business', 'স্বপ্না দেবনাথ', 'Housewife', '01830824265', '', 'দুবাচাইল, ফরদাবাদ, নবীনগর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '271.jpg', 1, '', '????? ??????', '01830824265', 'Father'),
(272, '9', 'Business Studies - A', '', 'Day', '2019', '', 'তিশা রাণী দাস', '034', '2005-01-01', 'Female', '', 'Bangladeshi', 'Hinduism', '20190272S', '', '', 'গ্রার্হস্থ্য বিজ্ঞান', 29, 'শেফাল চন্দ্র দাস', 'Business', 'শিখা রাণী দাস', 'Housewife', '01729354727', '', 'বাখরাবাদ, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '272.jpg', 1, '', '???? ???? ???', '01729354727', 'Mother'),
(273, '9', 'Business Studies - A', '', 'Day', '2019', '', 'মেহেদী হাসান খান শুভ', '035', '2005-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190273S', '', '', 'কৃষি শিক্ষা', 30, 'মোঃ কামাল হোসেন', 'Business', 'সাহিদা বেগম', 'Housewife', '01765933892', '', 'পিপড়িয়া, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '273.jpg', 1, '', '??? ????? ?????', '01765933892', 'Father'),
(274, '9', 'Business Studies - A', '', 'Day', '2019', '', 'সুইটি দেবনাথ', '036', '2005-01-01', 'Female', '', 'Bangladeshi', 'Hinduism', '20190274S', '', '', 'গ্রার্হস্থ্য বিজ্ঞান', 29, 'বিজয় দেবনাথ', 'Business', 'শিপন দেবনাথ', 'Housewife', '01725165672', '', 'দুবাচাইল, চন্দনাইল, নবীনগর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '274.jpg', 0, '', '???? ??????', '01725165672', 'Father'),
(275, '9', 'Business Studies - A', '', 'Day', '2019', '', 'লিপি আক্তার', '038', '2005-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190275S', '', '', 'গ্রার্হস্থ্য বিজ্ঞান', 29, 'মোঃ জালাল উদ্দিন ', 'Others', 'ছালমা বেগম', 'Housewife', '01867966389', '', 'পিঁপড়িয়াকান্দা, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '275.jpg', 1, '', '??? ????? ?????? ', '01867966389', 'Father'),
(276, '9', 'Business Studies - A', '', 'Day', '2019', '', 'ফরহাদ মিয়া', '039', '2005-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190276S', '', '', 'কৃষি শিক্ষা', 30, 'বিল্লাল হোসেন', 'Business', 'ফারহানা বেগম', 'Housewife', '01828794679', '', 'রামচন্দ্রপুর, রামচন্দ্রপুর	, মুরাদনগর	, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '276.jpg', 1, '', '??????? ?????', '01828794679', 'Father'),
(277, '9', 'Business Studies - A', '', 'Day', '2019', '', 'পলি আক্তার', '041', '2006-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190277S', '', '', 'গ্রার্হস্থ্য বিজ্ঞান', 29, 'মোঃ আলম মিয়া', 'Business', 'আছমা বেগম', 'Housewife', '01759118005', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর	, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '277.jpg', 1, '', '??? ??? ????', '01759118005', 'Father'),
(278, '7', 'Science - A', 'Section - C', 'Day', '2019', '', 'রাকিবুল ইসলাম', '001', '2008-01-01', 'Male', 'A+', 'Bangladeshi', 'Islam', '20190278S', '', '', '', 0, 'আনিসুর রহমান', 'Business', 'মিনু রহমান', 'Housewife', '01824291735', '', 'কাঁঠালিয়াকান্দা,	রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '278.jpg', 1, '', '???? ?????', '01824291735', 'Mother'),
(279, '7', 'Science - A', 'Section - C', 'Day', '2019', '', 'বোরহান উদ্দিন ভূইয়া', '002', '2008-01-01', 'Male', 'A+', 'Bangladeshi', 'Islam', '20190279S', '', '', '', 0, 'মোহাম্মদ বেনজীর আহাম্মদ ', 'Others', 'রুবি আক্তার', 'Housewife', '01727312661', '', 'ব্রাহ্মণচাপিতলা	রামচন্দ্রপুর	মুরাদনগর	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '279.jpg', 1, '', '???????? ?????? ??????? ', '01727312661', 'Father'),
(280, '10', 'Humanities - A', '', 'Day', '2019', '', 'হাজেরা আক্তার', '001', '2004-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190280S', '', '', 'পৌরনীতি ও নাগরিকতা', 64, 'নাসির মিয়া', 'Others', 'মনি বেগম', 'Housewife', '01753791985', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '280.jpg', 1, '', '????? ????', '01753791985', 'Father'),
(281, '10', 'Humanities - A', '', 'Day', '2019', '', 'রিয়া মণি', '002', '2004-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190281S', '', '', 'পৌরনীতি ও নাগরিকতা', 64, 'আঃ ছাত্তার ', 'Others', 'জোহরা বেগম', 'Housewife', '01828396690', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর	, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '281.jpg', 1, '', '?? ??????? ', '01828396690', 'Father'),
(282, '10', 'Humanities - A', '', 'Day', '2019', '', 'ফারিয়া জান্নাত', '003', '2004-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190282S', '', '', 'পৌরনীতি ও নাগরিকতা', 64, 'গোলাম মোস্তফা', 'Others', 'রেখা বেগম', 'Housewife', '01815173194', '', 'পেন্নই	চন্দনাইল, মুরাদনগর, কুমিল্লা,', '2019-01-01', '', '', '', '', '', '', '', '282.jpg', 1, '', '????? ???????', '01815173194', 'Father'),
(283, '10', 'Humanities - A', '', 'Day', '2019', '', 'নাঈমা আক্তার', '004', '2004-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190283S', '', '', 'পৌরনীতি ও নাগরিকতা', 64, 'নূর এ আলম সরকার', 'Others', 'কারিমা বেগম', 'Housewife', '01837162643', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '283.jpg', 1, '', '??? ? ??? ?????', '01837162643', 'Father'),
(284, '10', 'Humanities - A', '', 'Day', '2019', '', 'মোঃ মারুফুল ইসলাম', '005', '2004-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190284S', '', '', 'পৌরনীতি ও নাগরিকতা', 64, 'মোঃ মোবারক হোসেন', 'Business', 'মাফিয়া বেগম', 'Housewife', '01818976930', '', 'সাহেবনগর	রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা,', '2019-01-01', '', '', '', '', '', '', '', '284.jpg', 1, '', '??? ?????? ?????', '01818976930', 'Father'),
(285, '10', 'Humanities - A', '', 'Day', '2019', '', 'সুমাইয়া সুলতানা', '006', '2004-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190285S', '', '', 'পৌরনীতি ও নাগরিকতা', 64, 'মোঃ শাহ্ আলম', 'Business', 'শাহীন আক্তার', 'Housewife', '01814916348', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '285.jpg', 1, '', '??? ???? ???', '01814916348', 'Father'),
(286, '10', 'Humanities - A', '', 'Day', '2019', '', 'মোঃ মোজাম্মেল হক', '007', '2004-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190286S', '', '', 'পৌরনীতি ও নাগরিকতা', 64, 'আঃ করিম', 'Business', 'মোসাঃ মনোয়ারা বেগম', 'Housewife', '01849355223', '', 'সাহেবনগর	রামচন্দ্রপুর	মুরাদনগর', '2019-01-01', '', '', '', '', '', '', '', '286.jpg', 1, '', '?? ????', '01849355223', 'Father'),
(287, '10', 'Humanities - A', '', 'Day', '2019', '', 'মোঃ ফাহিম ইসলাম', '008', '2004-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190287S', '', '', 'পৌরনীতি ও নাগরিকতা', 64, 'আবুল হাসেম', 'Others', 'ফাতেমা বেগম', 'Housewife', '01848197822', '', 'ব্রাহ্মণচাপিতলা	রামচন্দ্রপুর	মুরাদনগর	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '287.jpg', 1, '', '???? ?????', '01848197822', 'Father'),
(288, '10', 'Humanities - A', '', 'Day', '2019', '', 'সোহাগ মিয়া', '009', '2004-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190288S', '', '', 'পৌরনীতি ও নাগরিকতা', 64, 'জাকির হোসেন ', 'Business', 'রিনা বেগম', 'Housewife', '01776390009', '', 'দীগলদী	রামচন্দ্রপুর	মুরাদনগর	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '288.jpg', 1, '', '????? ????? ', '01776390009', 'Father'),
(289, '10', 'Humanities - A', '', 'Day', '2019', '', 'তাহমিনা আক্তার', '010', '2004-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190289S', '', '', 'পৌরনীতি ও নাগরিকতা', 64, 'আবু কালাম		', 'Business', 'সাহিদা বেগম', 'Housewife', '01836476323', '', 'পেন্নই	চন্দনাইল	মুরাদনগর	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '289.jpg', 1, '', '??? ?????		', '01836476323', 'Father'),
(290, '10', 'Humanities - A', '', 'Day', '2019', '', 'জুমি আক্তার', '013', '2004-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190290S', '', '', 'পৌরনীতি ও নাগরিকতা', 64, 'মোঃ মঙ্গল মিয়া', 'Others', 'জানু বেগম', 'Housewife', '01796214941', '', 'পূর্বহাটি	রামচন্দ্রপুর	বাঞ্ছারামপুর	ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '290.jpg', 1, '', '???? ????', '01796214941', 'Mother'),
(291, '10', 'Humanities - A', '', 'Day', '2019', '', 'মারিয়া আক্তার', '014', '2004-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190291S', '', '', 'পৌরনীতি ও নাগরিকতা', 64, 'শাহজাহান সাজু', 'Others', 'রোজিনা আক্তার', 'Housewife', '01716004885', '', 'পেন্নই, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '291.jpg', 1, '', '???????? ????', '01716004885', 'Father'),
(292, '10', 'Humanities - A', '', 'Day', '2019', '', 'সালমা আক্তার', '016', '2004-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190292S', '', '', 'পৌরনীতি ও নাগরিকতা', 64, 'আনিস মিয়া', 'Business', 'বিউটি বেগম', 'Housewife', '01781628225', '', 'ব্রাহ্মণচাপিতলা	রামচন্দ্রপুর	মুরাদনগর	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '292.jpg', 1, '', '???? ????', '01781628225', 'Father'),
(293, '10', 'Humanities - A', '', 'Day', '2019', '', 'রিনা আক্তার', '017', '2004-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190293S', '', '', 'পৌরনীতি ও নাগরিকতা', 64, 'জয়দুল হোসেন', 'Others', 'জায়েদা বেগম', 'Housewife', '01956113792', '', 'ব্রাহ্মণচাপিতলা	রামচন্দ্রপুর	মুরাদনগর	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '293.jpg', 1, '', '????? ?????', '01956113792', 'Father'),
(294, '10', 'Humanities - A', '', 'Day', '2019', '', 'জুবায়ের আহম্মেদ', '018', '2004-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190294S', '', '', 'পৌরনীতি ও নাগরিকতা', 64, 'আব্দুল মোমেন মিয়া', 'Others', 'রাবিয়া আক্তার', 'Housewife', '01968485067', '', 'কৈজুরী	রামচন্দ্রপুর	মুরাদনগর	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '294.jpg', 1, '', '?????? ????? ????', '01968485067', 'Father'),
(295, '10', 'Business Studies - A', '', 'Day', '2019', '', 'মোঃ ইস্রফিল', '019', '2004-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190295S', '', '', 'পৌরনীতি ও নাগরিকতা', 64, 'মোঃ মোসলেহউদ্দিন', 'Others', 'জোলেখা বেগম', 'Housewife', '01811132141', '', 'সাহেবনগর, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '295.jpg', 1, '', '??? ????????????', '01811132141', 'Father'),
(296, '10', 'Humanities - A', '', 'Day', '2019', '', 'মিতু আক্তার', '020', '2004-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190296S', '', '', 'পৌরনীতি ও নাগরিকতা', 64, 'আমির মামুন', 'Business', 'লিপি আক্তার', 'Housewife', '01764144296', '', 'পূর্বহাটি, রামচন্দ্রপুর, বাঞ্ছারামপুর, ব্রাহ্মণবাড়িয়া', '2019-01-01', '', '', '', '', '', '', '', '296.jpg', 1, '', '???? ?????', '01764144296', 'Father'),
(297, '10', 'Humanities - A', '', 'Day', '2019', '', 'পিংকী রানী', '021', '2004-01-01', 'Female', '', 'Bangladeshi', 'Hinduism', '20190297S', '', '', 'পৌরনীতি ও নাগরিকতা', 64, 'রতন চন্দ্র', 'Business', 'সীমা রানী', 'Housewife', '01852696214', '', 'সলপা, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '297.jpg', 1, '', '??? ??????', '01852696214', 'Father'),
(298, '10', 'Humanities - A', '', 'Day', '2019', '', 'রহিমা আক্তার', '022', '2004-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190298S', '', '', 'পৌরনীতি ও নাগরিকতা', 64, 'আবদুর রহমান ভূইয়া', 'Others', 'আবেদা খাতুন', 'Others', '01874991458', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '298.jpg', 1, '', '????? ????? ?????', '01874991458', 'Father'),
(299, '10', 'Humanities - A', '', 'Day', '2019', '', 'নাহিদ হাসান', '023', '2004-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190299S', '', '', 'পৌরনীতি ও নাগরিকতা', 64, 'শাহআলম মিয়া', 'Business', 'নার্গিস বেগম', 'Housewife', '01788786850', '', 'কাঁঠালিয়াকান্দা, রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '299.jpg', 1, '', '?????? ????', '01788786850', 'Father'),
(300, '10', 'Humanities - A', '', 'Day', '2019', '', 'মোঃ ফয়সাল মিয়া', '025', '2004-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190300S', '', '', 'পৌরনীতি ও নাগরিকতা', 64, 'মোঃ কাবিল মিয়া', 'Business', 'রোজিনা বেগম', 'Housewife', '01771443050', '', 'ব্রাহ্মণচাপিতলা, রামচন্দ্রপুর, 	মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '300.jpg', 1, '', '??? ????? ????', '01771443050', 'Father'),
(301, '10', 'Humanities - A', '', 'Day', '2019', '', 'সুবর্ণা আক্তার', '026', '2004-01-01', 'Female', '', 'Bangladeshi', 'Islam', '20190301S', '', '', 'পৌরনীতি ও নাগরিকতা', 64, 'জাহাঙ্গীর আলম', 'Others', 'হোসনাহের বেগম', 'Housewife', '01827016286', '', 'উত্তর পেন্নই, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '301.jpg', 1, '', '???????? ????', '01827016286', 'Mother'),
(302, '10', 'Humanities - A', '', 'Day', '2019', '', 'মোঃ আশরাফুল মিয়া', '027', '2004-01-01', 'Male', 'A+', 'Bangladeshi', 'Islam', '20190302S', '', '', 'পৌরনীতি ও নাগরিকতা', 64, 'মোঃ খোকন মিয়া', 'Others', 'মোসাঃ রুনা আক্তার', 'Housewife', '01828322893', '', 'উত্তর পেন্নই, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '302.jpg', 1, '', '??? ???? ????', '01828322893', 'Mother'),
(303, '10', 'Humanities - A', '', 'Day', '2019', '', 'সাথী রানী সরকার', '028', '2004-01-01', 'Female', 'A+', 'Bangladeshi', 'Islam', '20190303S', '', '', 'পৌরনীতি ও নাগরিকতা', 64, 'রিপন চন্দ্র সরকার', 'Others', 'নমিতা রানী সরকার', 'Housewife', '01790287328', '', 'সলপা, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '303.jpg', 1, '', '????? ???? ?????', '01790287328', 'Mother'),
(304, '10', 'Humanities - A', '', 'Day', '2019', '', 'খায়ের আহম্মেদ', '029', '2004-01-01', 'Female', 'A+', 'Bangladeshi', 'Islam', '20190304S', '', '', 'পৌরনীতি ও নাগরিকতা', 64, 'লিল মিয়া', 'Others', 'নাহার বেগম', 'Housewife', '01715890371', '', 'উত্তর পেন্নই, চন্দনাইল, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '304.jpg', 1, '', '????? ?????', '01715890371', 'Mother'),
(305, '7', '', 'Section - C', 'Day', '2019', '', 'এ বি এম শামসুজ্জামান', '003', '1970-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190305S', '', '', '', 0, 'মাওলানা খলিলুর রহমান', '', 'খাদিজা আক্তার', 'Housewife', '01714375485', '', 'ব্রাহ্মণচাপিতলা	রামচন্দ্রপুর	মুরাদনগর	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '305.jpg', 1, '', '?????? ??????', '01714375485', 'Mother'),
(306, '7', 'Science - A', 'Section - C', 'Day', '2019', '', 'জয় সাহা', '004', '2008-01-01', 'Male', 'A+', 'Bangladeshi', 'Hinduism', '20190306S', '', '', '', 0, 'নিতাই সাহা', '', 'স্বীকৃতি সাহা', 'Housewife', '01731273544', '', 'বাখরাবাদ	রামচন্দ্রপুর	মুরাদনগর	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '306.jpg', 1, '', '???????? ????', '01731273544', 'Mother'),
(307, '7', '', 'Section - C', 'Day', '2019', '', 'মোঃ মিরাজুল ইসলাম  মিরাজ', '005', '2008-01-01', 'Male', '', 'Bangladeshi', 'Islam', '20190307S', '', '', '', 0, 'হাবিবুর রহমান জুয়েল', '', 'রবিসা বেগম', 'Housewife', '01980577057', '', 'বাখরাবাদ,	রামচন্দ্রপুর, মুরাদনগর, কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '307.jpg', 1, '', '????? ????', '01980577057', 'Mother'),
(308, '7', '', 'Section - C', 'Day', '2019', '', 'বিকাশ পাল', '008', '2008-01-01', 'Male', '', 'Bangladeshi', 'Hinduism', '20190308S', '', '', '', 0, 'কৃষ্ণ পাল', 'Others', 'লিপি রাণী পাল', '', '01788343171', '', 'বাখরাবাদ,	রামচন্দ্রপুর,	মুরাদনগর,	কুমিল্লা', '2019-01-01', '', '', '', '', '', '', '', '308.jpg', 1, '', '????? ???', '01788343171', 'Father');

-- --------------------------------------------------------

--
-- Table structure for table `13_insert_teacher_info`
--

CREATE TABLE `13_insert_teacher_info` (
  `record_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `email` varchar(400) NOT NULL,
  `date_of_joining` date NOT NULL,
  `education` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(30) NOT NULL,
  `blood_group` varchar(30) NOT NULL,
  `nationality` varchar(300) NOT NULL,
  `religion` varchar(200) NOT NULL,
  `session_name` varchar(200) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `teacher_unique_id` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `image` varchar(15) NOT NULL,
  `status` int(10) NOT NULL,
  `alternative_mobile` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `13_insert_teacher_info`
--

INSERT INTO `13_insert_teacher_info` (`record_id`, `name`, `designation`, `mobile`, `email`, `date_of_joining`, `education`, `date_of_birth`, `gender`, `blood_group`, `nationality`, `religion`, `session_name`, `address`, `teacher_unique_id`, `password`, `image`, `status`, `alternative_mobile`) VALUES
(1, 'Md. Tazul Islam', 'Head Master', '01714415941', 'rrk_hschool@yahoo.com', '0000-00-00', '', '1968-01-01', 'Male', '', 'Bangladeshi', 'Islam', '2019', 'Ramchandrapur High School ', '2019001T', '12345', '1.jpg', 1, ''),
(2, 'Md. Anower Hossain', 'Asst. Head Master', '01818993158', 'anowarrahat1973@gmail.com', '2001-09-15', '', '1973-12-10', 'Male', 'B+', 'Bangladeshi', 'Islam', '2001', 'Balarampur, PO Machhimpur, PS Titas, Cumilla', '2019002T', '12345', '2.jpg', 1, ''),
(3, 'Md. Mortoza Ali', 'Sr. Asst. Teacher', '0000034322', 'rrk_hschool@yahoo.com', '1983-01-01', '', '1970-01-01', 'Male', 'B+', 'Bangladeshi', 'Islam', '1983', 'Mostakapur, PO. Panchkita, UZ. Muradnagar, Cumilla', '2019003T', '12345', '3.jpg', 1, ''),
(4, 'Md. Mosharaf Hossain', 'Sr. Asst. Teacher', '01823391667', 'rrk_hschool@yahoo.com', '1983-08-01', '', '1962-12-31', 'Male', 'B+', 'Bangladeshi', 'Islam', '1983', 'Vill- Balibari, P.O. Pak Bangara, UZ. Nabinagar, Dist- B. Baria.', '2019004T', '12345', '4.jpg', 1, ''),
(5, 'Kabir Ahmed Bhuiyan', 'Asst. Teacher', '01772565973', 'rrk_hschool@yahoo.com', '1985-03-16', '', '1960-10-05', 'Male', 'A+', 'Bangladeshi', 'Islam', '1985', 'Rowachala, Sreekail, Muradnagar, Cumilla', '2019005T', '12345', '5.jpg', 1, ''),
(6, 'Shahanara Begum', 'Asst. Teacher', '01815436646', 'rrk_hschool@yahoo.com', '1989-09-26', '', '1961-11-26', 'Female', 'O+', 'Bangladeshi', 'Islam', '1989', '22 Khilgaon Bagicha, Dhaka -1219', '2019006T', '12345', '6.jpg', 1, ''),
(7, 'Md. Mosleh Uddin', 'Sr. Asst. Teacher', '01716198824', 'rrk_hschool@yahoo.com', '0000-00-00', '', '1968-02-01', 'Male', '', 'Bangladeshi', 'Islam', '2019', 'Shaebnagar , Ramchandrapur', '2019007T', '12345', '7.jpg', 1, ''),
(8, 'Maminul Islam Mokul', 'Sr. Asst. Teacher', '01720522008', 'rrk_hschool@yahoo.com', '0000-00-00', '', '1968-04-01', 'Male', '', 'Bangladeshi', 'Islam', '2019', 'Ramchardrapur', '2019008T', '12345', '8.jpg', 1, ''),
(9, 'Abu Saleh Md. Rakib Uddin Seraji', 'Sr. Asst. Teacher', '9990000', 'rrk_hschool@yahoo.com', '0000-00-00', '', '1970-01-01', 'Male', '', 'Bangladeshi', 'Islam', '2019', 'Ramchardrapur', '2019009T', '12345', '9.jpg', 1, ''),
(10, 'Tapan Kumar Sarkar', 'Sr. Asst. Teacher', '01733541676', 'rrk_hschool@yahoo.com', '0000-00-00', '', '1973-01-01', 'Male', '', 'Bangladeshi', 'Hinduism', '2019', 'Ramchardrapur', '2019010T', '12345', '10.jpg', 1, '99999'),
(11, 'Dil Afroz', 'Asst. Teacher', '99999', 'rrk_hschool@yahoo.com', '0000-00-00', '', '1973-01-01', 'Female', '', 'Bangladeshi', 'Islam', '2019', 'Ramchardrapur', '2019011T', '12345', '11.jpg', 1, ''),
(12, 'Mohammad Shafiqul Islam', 'Sr. Asst. Teacher', '01726121780', 'rrk_hschool@yahoo.com', '0000-00-00', '', '1977-01-01', 'Male', '', 'Bangladeshi', 'Islam', '2019', 'Tamuria, Ramchandrapur', '2019012T', '12345', '12.jpg', 1, ''),
(13, 'Karuna Rani Chakraborty', 'Sr. Asst. Teacher', '00000', 'rrk_hschool@yahoo.com', '0000-00-00', '', '1975-01-01', 'Female', '', 'Bangladeshi', 'Hinduism', '2019', 'Srikail, Bangara, Muradnagar, Comilla', '2019013T', '12345', '13.jpg', 1, ''),
(14, 'Sultan Ahmed', 'Asst. Teacher', '00000', 'rrk_hschool@yahoo.com', '0000-00-00', '', '1979-01-01', 'Male', '', 'Bangladeshi', 'Islam', '2019', 'rrr', '2019014T', '12345', '14.jpg', 1, ''),
(15, 'Mohiuddin Ahmed', 'Asst. Teacher', '000000', 'rrk_hschool@yahoo.com', '0000-00-00', '', '1979-01-01', 'Male', '', 'Bangladeshi', 'Islam', '2019', 'rrrr', '2019015T', '12345', '15.jpg', 1, ''),
(16, 'Md. Kamal Hossain', 'Asst. Teacher (ICT)', '01715371942', 'rrk_hschool@yahoo.com', '0000-00-00', '', '1982-01-01', 'Male', '', 'Bangladeshi', 'Islam', '2019', 'Bancharampur, B. Baria', '2019016T', '12345', '16.jpg', 1, ''),
(17, 'Liton Chandra Sutradhar', 'Asst. Teacher', '00000', 'rrk_hschool@yahoo.com', '0000-00-00', '', '1987-01-01', 'Male', '', 'Bangladeshi', 'Hinduism', '2019', 'Bakharabad, Ramchandrapur, Muradnagar, Cumilla', '2019017T', 'abc12345', '17.jpg', 1, ''),
(18, 'Uzzal Pathan', 'Asst. Teacher', '01732439944', 'rrk_hschool@yahoo.com', '0000-00-00', '', '1994-01-01', 'Male', '', 'Bangladeshi', 'Islam', '2019', 'Aminagar, Muradnagar, Cumilla', '2019018T', '12345', '18.jpg', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `14_insert_staff_info`
--

CREATE TABLE `14_insert_staff_info` (
  `record_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `email` varchar(400) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(30) NOT NULL,
  `blood_group` varchar(30) NOT NULL,
  `nationality` varchar(300) NOT NULL,
  `religion` varchar(200) NOT NULL,
  `session_name` varchar(200) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `staff_unique_id` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `image` varchar(15) NOT NULL,
  `status` int(10) NOT NULL,
  `library` int(11) NOT NULL,
  `fees_collection` int(11) NOT NULL,
  `accounting` int(11) NOT NULL,
  `asset_info` int(11) NOT NULL,
  `dormitory` int(11) NOT NULL,
  `alternative_mobile` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `14_insert_staff_info`
--

INSERT INTO `14_insert_staff_info` (`record_id`, `name`, `designation`, `mobile`, `email`, `date_of_birth`, `gender`, `blood_group`, `nationality`, `religion`, `session_name`, `address`, `staff_unique_id`, `password`, `image`, `status`, `library`, `fees_collection`, `accounting`, `asset_info`, `dormitory`, `alternative_mobile`) VALUES
(1, 'Mohammad Warish Miah', 'Office Assistant', '01726191161', 'rrk_hschool@yahoo.com', '1976-07-05', 'Male', 'A+', 'Bangladeshi', 'Islam', '2019', 'Brahman Chapital , Ramchandrapur, Muradnagar, Cumilla', '2019001E', '12345', '1.jpg', 1, 0, 1, 1, 0, 0, '01748906328'),
(2, 'Mohammed Al - Amin', 'Librarian', '01924171892', 'rrk_hschool@yahoo.com', '1983-05-14', 'Male', 'B+', 'Bangladeshi', 'Islam', '2019', 'Digaldi, Ramchandrapur, Muradnagar, Cumilla', '2019002E', '12345', '2.jpg', 1, 1, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `15_insert_guardian_info`
--

CREATE TABLE `15_insert_guardian_info` (
  `record_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `email` varchar(400) NOT NULL,
  `address` varchar(200) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `session_name` varchar(200) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `nid` varchar(200) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `relation_student` varchar(200) NOT NULL,
  `guardian_unique_id` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `17_insert_governing_body`
--

CREATE TABLE `17_insert_governing_body` (
  `record_id` int(11) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `history` varchar(2000) NOT NULL,
  `image` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `18_insert_administration_structure`
--

CREATE TABLE `18_insert_administration_structure` (
  `record_id` int(11) NOT NULL,
  `designation` varchar(200) CHARACTER SET latin1 NOT NULL,
  `name` varchar(200) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `19_insert_booklist`
--

CREATE TABLE `19_insert_booklist` (
  `record_id` int(11) NOT NULL,
  `book_name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `20_insert_syllabus`
--

CREATE TABLE `20_insert_syllabus` (
  `record_id` int(11) NOT NULL,
  `uploaded_file` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `21_insert_class_routine`
--

CREATE TABLE `21_insert_class_routine` (
  `record_id` int(11) NOT NULL,
  `class_name` varchar(200) NOT NULL,
  `section` varchar(200) NOT NULL,
  `shift` varchar(200) NOT NULL,
  `group_name` varchar(200) NOT NULL,
  `day` varchar(200) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `teacher` varchar(200) NOT NULL,
  `time` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `22_exam_routine`
--

CREATE TABLE `22_exam_routine` (
  `record_id` int(11) NOT NULL,
  `uploaded_file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `23_academic_calendar`
--

CREATE TABLE `23_academic_calendar` (
  `record_id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `file_type` varchar(100) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `published_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `24_notice_board`
--

CREATE TABLE `24_notice_board` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `notice` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `25_teacher_subject_management`
--

CREATE TABLE `25_teacher_subject_management` (
  `record_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) DEFAULT NULL,
  `shift_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `session_id` int(11) NOT NULL,
  `version_id` int(11) DEFAULT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `25_teacher_subject_management`
--

INSERT INTO `25_teacher_subject_management` (`record_id`, `teacher_id`, `class_id`, `section_id`, `shift_id`, `group_id`, `session_id`, `version_id`, `subject_id`) VALUES
(2, 1, 8, NULL, 1, 1, 1, NULL, 24),
(3, 18, 8, NULL, 1, 1, 1, NULL, 24),
(4, 16, 8, NULL, 1, 1, 1, NULL, 28),
(5, 16, 8, NULL, 1, 2, 1, NULL, 28),
(6, 16, 8, NULL, 1, 3, 1, NULL, 28),
(8, 16, 8, NULL, 1, 5, 1, NULL, 28),
(9, 18, 8, NULL, 1, 2, 1, NULL, 24),
(10, 18, 7, 3, 1, NULL, 1, NULL, 52);

-- --------------------------------------------------------

--
-- Table structure for table `26_grade_mark_management`
--

CREATE TABLE `26_grade_mark_management` (
  `record_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `written_mark` int(11) DEFAULT NULL,
  `mcq_mark` int(11) DEFAULT NULL,
  `practical_mark` int(11) DEFAULT NULL,
  `total_mark` int(11) DEFAULT NULL,
  `grade` varchar(500) DEFAULT NULL,
  `grade_point` decimal(10,2) DEFAULT NULL,
  `subject_available` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `26_grade_mark_management`
--

INSERT INTO `26_grade_mark_management` (`record_id`, `date`, `session_id`, `teacher_id`, `class_id`, `section_id`, `shift_id`, `group_id`, `subject_id`, `student_id`, `exam_id`, `written_mark`, `mcq_mark`, `practical_mark`, `total_mark`, `grade`, `grade_point`, `subject_available`, `status`, `created_at`) VALUES
(1, NULL, 1, 1, 8, 0, 1, 1, 24, 35, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-25 13:22:05'),
(2, NULL, 1, 1, 8, 0, 1, 1, 24, 36, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-25 13:22:05'),
(3, NULL, 1, 1, 8, 0, 1, 1, 24, 37, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-25 13:22:05'),
(4, NULL, 1, 1, 8, 0, 1, 1, 24, 38, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-25 13:22:05'),
(5, NULL, 1, 1, 8, 0, 1, 1, 24, 136, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-25 13:22:05'),
(6, NULL, 1, 1, 8, 0, 1, 1, 24, 137, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-25 13:22:05'),
(7, NULL, 1, 1, 8, 0, 1, 1, 24, 138, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-25 13:22:05'),
(8, NULL, 1, 1, 8, 0, 1, 1, 24, 139, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-25 13:22:05'),
(9, NULL, 1, 1, 8, 0, 1, 1, 24, 140, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-25 13:22:05'),
(10, NULL, 1, 1, 8, 0, 1, 1, 24, 141, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-25 13:22:05'),
(11, NULL, 1, 1, 8, 0, 1, 1, 24, 142, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-25 13:22:05'),
(12, NULL, 1, 1, 8, 0, 1, 1, 24, 143, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-25 13:22:05'),
(13, NULL, 1, 1, 8, 0, 1, 1, 24, 144, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-25 13:22:05'),
(14, NULL, 1, 1, 8, 0, 1, 1, 24, 145, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-25 13:22:05'),
(15, NULL, 1, 1, 8, 0, 1, 1, 24, 146, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-25 13:22:05'),
(16, NULL, 1, 1, 8, 0, 1, 1, 24, 147, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-25 13:22:05'),
(17, NULL, 1, 1, 8, 0, 1, 1, 24, 148, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-25 13:22:05'),
(18, NULL, 1, 1, 8, 0, 1, 1, 24, 149, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-25 13:22:05'),
(19, NULL, 1, 1, 8, 0, 1, 1, 24, 150, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-25 13:22:05'),
(20, NULL, 1, 1, 8, 0, 1, 1, 24, 151, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-25 13:22:05'),
(21, NULL, 1, 1, 8, 0, 1, 1, 24, 152, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-25 13:22:05'),
(22, NULL, 1, 1, 8, 0, 1, 1, 24, 153, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-25 13:22:05'),
(23, NULL, 1, 1, 8, 0, 1, 1, 24, 154, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-25 13:22:05'),
(24, NULL, 1, 1, 8, 0, 1, 1, 24, 155, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-25 13:22:05'),
(25, NULL, 1, 16, 8, 0, 1, 1, 28, 35, 7, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-26 18:52:14'),
(26, NULL, 1, 16, 8, 0, 1, 1, 28, 36, 7, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-26 18:52:14'),
(27, NULL, 1, 16, 8, 0, 1, 1, 28, 37, 7, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-26 18:52:14'),
(28, NULL, 1, 16, 8, 0, 1, 1, 28, 38, 7, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-26 18:52:14'),
(29, NULL, 1, 16, 8, 0, 1, 1, 28, 136, 7, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-26 18:52:14'),
(30, NULL, 1, 16, 8, 0, 1, 1, 28, 137, 7, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-26 18:52:14'),
(31, NULL, 1, 16, 8, 0, 1, 1, 28, 138, 7, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-26 18:52:14'),
(32, NULL, 1, 16, 8, 0, 1, 1, 28, 139, 7, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-26 18:52:14'),
(33, NULL, 1, 16, 8, 0, 1, 1, 28, 140, 7, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-26 18:52:14'),
(34, NULL, 1, 16, 8, 0, 1, 1, 28, 141, 7, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-26 18:52:14'),
(35, NULL, 1, 16, 8, 0, 1, 1, 28, 142, 7, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-26 18:52:14'),
(36, NULL, 1, 16, 8, 0, 1, 1, 28, 143, 7, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-26 18:52:14'),
(37, NULL, 1, 16, 8, 0, 1, 1, 28, 144, 7, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-26 18:52:14'),
(38, NULL, 1, 16, 8, 0, 1, 1, 28, 145, 7, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-26 18:52:14'),
(39, NULL, 1, 16, 8, 0, 1, 1, 28, 146, 7, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-26 18:52:14'),
(40, NULL, 1, 16, 8, 0, 1, 1, 28, 147, 7, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-26 18:52:14'),
(41, NULL, 1, 16, 8, 0, 1, 1, 28, 148, 7, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-26 18:52:14'),
(42, NULL, 1, 16, 8, 0, 1, 1, 28, 149, 7, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-26 18:52:14'),
(43, NULL, 1, 16, 8, 0, 1, 1, 28, 150, 7, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-26 18:52:14'),
(44, NULL, 1, 16, 8, 0, 1, 1, 28, 151, 7, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-26 18:52:14'),
(45, NULL, 1, 16, 8, 0, 1, 1, 28, 152, 7, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-26 18:52:14'),
(46, NULL, 1, 16, 8, 0, 1, 1, 28, 153, 7, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-26 18:52:14'),
(47, NULL, 1, 16, 8, 0, 1, 1, 28, 154, 7, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-26 18:52:14'),
(48, NULL, 1, 16, 8, 0, 1, 1, 28, 155, 7, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-26 18:52:14'),
(49, NULL, 1, 18, 8, 0, 1, 2, 24, 156, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(50, NULL, 1, 18, 8, 0, 1, 2, 24, 157, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(51, NULL, 1, 18, 8, 0, 1, 2, 24, 158, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(52, NULL, 1, 18, 8, 0, 1, 2, 24, 159, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(53, NULL, 1, 18, 8, 0, 1, 2, 24, 160, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(54, NULL, 1, 18, 8, 0, 1, 2, 24, 161, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(55, NULL, 1, 18, 8, 0, 1, 2, 24, 162, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(56, NULL, 1, 18, 8, 0, 1, 2, 24, 163, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(57, NULL, 1, 18, 8, 0, 1, 2, 24, 164, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(58, NULL, 1, 18, 8, 0, 1, 2, 24, 165, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(59, NULL, 1, 18, 8, 0, 1, 2, 24, 166, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(60, NULL, 1, 18, 8, 0, 1, 2, 24, 167, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(61, NULL, 1, 18, 8, 0, 1, 2, 24, 168, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(62, NULL, 1, 18, 8, 0, 1, 2, 24, 169, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(63, NULL, 1, 18, 8, 0, 1, 2, 24, 170, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(64, NULL, 1, 18, 8, 0, 1, 2, 24, 171, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(65, NULL, 1, 18, 8, 0, 1, 2, 24, 172, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(66, NULL, 1, 18, 8, 0, 1, 2, 24, 173, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(67, NULL, 1, 18, 8, 0, 1, 2, 24, 174, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(68, NULL, 1, 18, 8, 0, 1, 2, 24, 175, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(69, NULL, 1, 18, 8, 0, 1, 2, 24, 176, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(70, NULL, 1, 18, 8, 0, 1, 2, 24, 177, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(71, NULL, 1, 18, 8, 0, 1, 2, 24, 178, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(72, NULL, 1, 18, 8, 0, 1, 2, 24, 179, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(73, NULL, 1, 18, 8, 0, 1, 2, 24, 180, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(74, NULL, 1, 18, 8, 0, 1, 2, 24, 181, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(75, NULL, 1, 18, 8, 0, 1, 2, 24, 182, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(76, NULL, 1, 18, 8, 0, 1, 2, 24, 183, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(77, NULL, 1, 18, 8, 0, 1, 2, 24, 184, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(78, NULL, 1, 18, 8, 0, 1, 2, 24, 185, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(79, NULL, 1, 18, 8, 0, 1, 2, 24, 186, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(80, NULL, 1, 18, 8, 0, 1, 2, 24, 187, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(81, NULL, 1, 18, 8, 0, 1, 2, 24, 188, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(82, NULL, 1, 18, 8, 0, 1, 2, 24, 189, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(83, NULL, 1, 18, 8, 0, 1, 2, 24, 190, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(84, NULL, 1, 18, 8, 0, 1, 2, 24, 191, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(85, NULL, 1, 18, 8, 0, 1, 2, 24, 192, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(86, NULL, 1, 18, 8, 0, 1, 2, 24, 193, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(87, NULL, 1, 18, 8, 0, 1, 2, 24, 194, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(88, NULL, 1, 18, 8, 0, 1, 2, 24, 195, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(89, NULL, 1, 18, 8, 0, 1, 2, 24, 196, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(90, NULL, 1, 18, 8, 0, 1, 2, 24, 197, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(91, NULL, 1, 18, 8, 0, 1, 2, 24, 198, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(92, NULL, 1, 18, 8, 0, 1, 2, 24, 199, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(93, NULL, 1, 18, 8, 0, 1, 2, 24, 200, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(94, NULL, 1, 18, 8, 0, 1, 2, 24, 201, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(95, NULL, 1, 18, 8, 0, 1, 2, 24, 202, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(96, NULL, 1, 18, 8, 0, 1, 2, 24, 203, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(97, NULL, 1, 18, 8, 0, 1, 2, 24, 204, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(98, NULL, 1, 18, 8, 0, 1, 2, 24, 205, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(99, NULL, 1, 18, 8, 0, 1, 2, 24, 206, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(100, NULL, 1, 18, 8, 0, 1, 2, 24, 207, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(101, NULL, 1, 18, 8, 0, 1, 2, 24, 208, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(102, NULL, 1, 18, 8, 0, 1, 2, 24, 209, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(103, NULL, 1, 18, 8, 0, 1, 2, 24, 210, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(104, NULL, 1, 18, 8, 0, 1, 2, 24, 211, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11'),
(105, NULL, 1, 18, 8, 0, 1, 2, 24, 212, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 08:02:11');

-- --------------------------------------------------------

--
-- Table structure for table `26_grade_mark_tutorial`
--

CREATE TABLE `26_grade_mark_tutorial` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `session_name` varchar(200) NOT NULL,
  `teacher_id` varchar(200) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `section_name` varchar(100) NOT NULL,
  `shift_name` varchar(100) NOT NULL,
  `group_name` varchar(100) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `subject_serial` int(11) NOT NULL,
  `practical_applicable` int(11) NOT NULL,
  `fourth_subject` int(11) NOT NULL,
  `student_id` varchar(200) NOT NULL,
  `student_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `roll` varchar(100) NOT NULL,
  `exam_type` varchar(100) NOT NULL,
  `bangla` int(100) NOT NULL,
  `english` int(100) NOT NULL,
  `mathematics` int(100) NOT NULL,
  `gk_arabic` int(100) NOT NULL,
  `general_science` int(100) NOT NULL,
  `social_science` int(100) NOT NULL,
  `religion` int(100) NOT NULL,
  `t_count` int(100) NOT NULL,
  `total_mark` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `27_counter`
--

CREATE TABLE `27_counter` (
  `counter_id` int(10) NOT NULL,
  `count` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `28_income_head`
--

CREATE TABLE `28_income_head` (
  `record_id` int(11) NOT NULL,
  `income_head` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `29_expense_head`
--

CREATE TABLE `29_expense_head` (
  `record_id` int(11) NOT NULL,
  `expense_head` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `30_income`
--

CREATE TABLE `30_income` (
  `record_id` int(11) NOT NULL,
  `date` varchar(200) NOT NULL,
  `income_head` varchar(1000) NOT NULL,
  `voucher_no` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `31_expense`
--

CREATE TABLE `31_expense` (
  `record_id` int(11) NOT NULL,
  `date` varchar(200) NOT NULL,
  `expense_head` varchar(1000) NOT NULL,
  `voucher_no` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `32_single_page_content`
--

CREATE TABLE `32_single_page_content` (
  `record_id` int(11) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `image` varchar(20) NOT NULL,
  `details` mediumtext CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `32_single_page_content`
--

INSERT INTO `32_single_page_content` (`record_id`, `title`, `image`, `details`) VALUES
(2, '3', '2.jpg', 'শিক্ষার আলোতে আলোকিত জাতি মানব কল্যাণের অন্যতম নিয়ামক শক্তি। তাই শিক্ষা বান্ধব সমাজ বিনির্মানে আমাদের সকলের এগিয়ে আসা উচিত। \r\nরামচন্দ্রপুর রাম কান্ত উচ্চ বিদ্যালয় এতদঞ্চলের শিক্ষার আলোতে আলোকিত মানুষ গড়ে চলছে শতবর্ষ ধরে, এ বিদ্যাপীঠের আঙ্গিনায় বেড়ে উঠা মানুষগুলির প্রায় সকলেই দেশ জাতির অহঙ্কার, যাঁদের নিয়ে আমরা নিরবচ্ছিন্ন গর্ব করতে পারি। ১৯১৮ সালে স্বর্গীয় মথুরা মোহন রায় মহাশয় যে স্বপ্ন নিয়ে আমাদের এ বিদ্যালয়টি প্রতিষ্ঠা করেছিলেন তা কালক্রমে ততটুকু অগ্রগতি হয়নি বটে, কিন্তু তারপরও আমরা কিছু বিষয়কে মৌলিক ও অবিচ্ছেদ্য ভাবে মানি, আমরা মনেপ্রাণে বিশ্বাস করি Òশিক্ষা সুযোগ নয় অধিকার”, আমাদের এ বিশ্বাসের কারণে আমরা শিক্ষার্থীদের প্রতি সর্বদাই শিক্ষা বান্ধব ও মানবিক। \r\nআমি এ বিদ্যালয়ের কার্য নির্বাহী পর্ষদের একজন হিসাবে, আমি একজন মা’ হিসাবে সকল অভিভাবক ও শিক্ষানরিাগীদের প্রতি বিশেষভাবে অনুরোধ করব আপনারা কোনভাবেই আপনার কন্যা সন্তানটিকে তাঁর প্রাপ্য শিক্ষার আলো থেকে বঞ্চিত করবেন না। আজকের কন্যারা একদিন শিক্ষিত মা হবে আর এ শিক্ষিত মা আমাদেরকে অনায়াসে শিক্ষিত জাতি উপহার দিবে। ছেলে শিক্ষার্থীদের প্রতি রয়েছে আমাদের অপরিসীম আশা - আমাদের এ গ্রামীণ জনপদের প্রতিটি মা-বাবাদের শ্রম-ঘামে বড় হচ্ছ তোমরা, তাই মা-বাবার প্রতি তোমাদের অপরীসীম শ্রদ্ধা-ভালবাসার একমাত্র সুখ্যাত উপহারটি হতে পারে তোমাদের মনযোগী হয়ে লেখাপড়া করে মানুষের মত মানুষ হওয়া। \r\n\r\nএ সময় হল তথ্য প্রযুক্তির যুগ, বর্তমান সরকারের অন্যতম লক্ষ হল একটি প্রযুক্তি নির্ভর জাতি গড়ে তোলা , আমাদের স্কুলটি ডিজিটাল পরিমন্ডলে প্রবেশ করার প্রচেষ্টা অনেকদিনের আমরা আশাকরি ডিজিটলি ব্যবস্থাপনাগত সুবিধাদির কারনে অভিভাবক ও শিক্ষার্থীরা অনেক বেশী অনুপ্রণিত হবে।\r\n\r\nবদরুন নাহার সরকার\r\nসভাপতি\r\nরামচন্দ্রপুর রামকান্ত উচ্চ বিদ্যালয়।'),
(3, '2', '3.jpg', 'আমি বিশ্বাস করি দেশ ও জাতি গঠনে শতবর্ষী রামচন্দ্রপুর রামকান্ত উচ্চ বিদ্যালয় একটি সময়োপযোগী ও অত্যাধুনিক শিক্ষা প্রতিষ্ঠান হিসাবে নিজের আসনটি পাকাপোক্তভাবে দখলে রাখতে সামর্থবান। সোনার বাংলা গড়তে সোনার মানুষ চাই, জাতির জনক বঙ্গবন্ধুর সোনার বাংলা গড়ার লক্ষ্যে আমাদের আশা আকাঙ্খার নিরবচ্ছিন্ন অশ্রয়স্থল বঙ্গবন্ধু কন্যা মাননীয় প্রধানমন্ত্রী দেশরত্ন শেখ হাসিনা নতুন প্রজন্মকে আধুনিক তথ্যপ্রযুক্তি শিক্ষায় শিক্ষিত করার যে মহাকর্মযজ্ঞ হাতে নিয়েছেন তার ধারাবাহিকতার অংশ আজকের ”ডিজিটাল বাংলাদেশ” এবং আজকে শতবর্ষী রামচন্দ্রপুর রামকান্ত উচ্চ বিদ্যালয়ের ডিজিটায়নে প্রবেশ বর্তমান সরকারের সার্বিক পরিকল্পনার  যথোপযুক্ত  সহযোগীতামূলক অংশগ্রহণ বলে আমরা বিশ্বাস করি। এ বিদ্যালয় আঙ্গিনার প্রতিটি ধূলিকণার সাথে রয়েছে আমার আত্মার সম্পর্ক, অতীতকাল থেকে এ বিদ্যালয়ের পাঠ কার্যক্রমের পাশাপাশি পাঠ বর্হিভূত বিষয়াদির প্রতি সবিশেষ অংশগ্রহণ নিশ্চিত করার মাধ্যমে শিক্ষার্থীদের সুস্থ্য-সবল-মানবিক মানুষ হতে সাহায্য করে চলছে জেনে মুগ্ধ হয়েছি ।  লেখাপড়ার পাশাপাশি এ বিদ্যালয়ের বার্ষিক ক্রীড়া প্রতিযোগিতার সুনাম ঈর্ষনীয় বলে জেনেছি, তাছাড়া অন্যান্য খেলাধূলা যেমন- ফুটবল, ক্রিকেট, ব্যাডমিন্টন ইত্যাদিতে রয়েছে আনন্দময় উপস্থিতি, বিএনসিসি, গার্লস গাইড, সততা সংঘ, ডিবেট ক্লাব, ইংলিশ লেনগুয়েজ ক্লাব ইত্যাদির কার্যক্রম আমাদের ভবিষ্যত প্রজন্মকে পরিশীলিত শিক্ষার পরিবেশ বজায় রাখতে সহযোগীতা করবে বলে আমার বিশ্বাস। \r\n\r\nআমি এতদ্অঞ্চলের প্রথম ডিজিটাল স্কূল হিসাবে আত্মপ্রকাশ করার জন্য  শিক্ষার্থী শিক্ষকমন্ডলী ও সর্বোপরি কার্য নির্বাহী পর্ষদের সকলকে আমি অভিনন্দন জ্ঞাপন করছি । \r\n\r\n\r\nড. আহসানুল আলম সরকার কিশোর\r\nউপজেলা চেয়ারম্যান\r\nউপজেলঃ মুরাদনগর, জেলাঃ কুমিল্লা।'),
(4, '1', '4.jpg', 'দানশীল শিক্ষানুরাগী দিগলদী নিবাসী স্বর্গীয় মথুরা মোহন রায় অত্র এলাকার সার্বিক কল্যাণে প্রত্যন্ত গ্রামীণ জনপদের মানুষকে শিক্ষার আলোতে আলোকিত করতে চার থানার প্রান্ত ঘেঁষে তৎকালীন ত্রিপুরা জেলার মুরাদনগর থানাধীন বাখরাবাদ মৌজাস্থ আমিননগর গ্রামের শেষ প্রান্তে তাঁর পিতার নামানুসারে “রামচন্দ্রপুর রামক্নান্ত উচ্চ বিদ্যালয়” প্রতিষ্ঠা করেন। \r\n১৯১৩ সাল থেকে ৩১ শে জানুয়ারী ১৯১৮ পর্যন্ত এটি “জুনিয়র ইংলিশ মিডিয়াম স্কুল” হিসাবে ছিল। তখন এর প্রধান শিক্ষক ছিলেন শ্রী নিশিকান্ত দত্ত মহাশয়। কুমিল্লা জেলার অন্যতম প্রাচীন বিদ্যাপীঠ রামচন্দ্রপুর রামকান্ত উচ্চ বিদ্যালয় ১৯১৮ সালের ১লা ফেব্রুয়ারী “হাই ইলিংশ স্কুল” হিসাবে কলিকাতা বিশ্ববিদ্যালয় কর্তৃক স্বীকৃিত প্রাপ্তির মাধ্যমে প্রতিষ্ঠিত হয়। \r\n\r\nশ্রী চন্দ্রকান্ত ঘোষ বিএ, বিএল মহোদয় এ বিদ্যালয়ের প্রথম প্রধান শিক্ষক। তিনি ৩১ শে ডিসেম্বর ১৯৫৫ পর্যন্ত শ্রী ঘোষের পর জনাব আবু ইউসুফ এম.এ,  ০১/০১/১৯৫৬ থেকে ৩০/০৬/ ১৯৫৬ ইং পর্যন্ত প্রধান শিক্ষকের দায়িত্ব পালন করেন। ০১/০৭/১৯৫৬ থেকে ৩১/২১/১৯৬৯ খ্রিষ্টাব্দ পর্যন্ত নিজভূমে শিক্ষা বিস্তারের তীব্র আকাঙ্খায় তৎকালীন ভারত সরকারের সুবিধাজনক চাকুরী থেকে ইস্তফা দিয়ে তৎকালীন স্কুল ব্যবস্থাপনা কমিটির অন্যতম ব্যক্তিত্ব মথুরা মোহন রায় মহাশয়ের ভ্রাতষ্পুত্র কুলেন্দ্র বাবুর আহ্বানে কদমতলী নিবাসী জনাব আবু তালেব হোসেন বি.এ, বি.বিটি প্রধান শিক্ষকের দায়িত্ব পালন করেন । \r\n\r\nজনাব মোঃ খলিলুর রহমান, বি.এ, বিএড যাঁর যাদুর পরশে রামচন্দ্রপুর রামকান্ত উচ্চ বিদ্যালয়ের অনেক শিক্ষার্থী আলোকময় পথের সন্ধান পেয়েছেন, যার নাম পরম শ্রদ্ধা সাথে স্মরণ করে পুলকিত হন তাঁর সকল শিক্ষার্থীরা। খলিল স্যার জানুয়ারী ১, ১৯৭০ থেকে  ২৭/২/২০০৫ খ্রিঃ পর্যন্ত প্রধান শিক্ষক হিসাবে দায়িত্ব পালন করেন। প্রধান শিক্ষক হওয়ার আগে তিনি সহকারী শিক্ষক হিসাবে কর্মরত থাকাকালেই তিনি তাঁর প্রজ্ঞার পরিচয় দিতে সক্ষম হন । \r\n\r\nস্থানীয় কাচারীর তৎকালীন নবাবের নায়েব শ্রী রাজ বিহারী দত্ত মহোদয় প্রথম কার্য নির্বাহী পর্ষদের সভাপতির দায়িত্ব পালন করেন। ০১/০১/১৯১৯ থেকে ৩১/১২/১৯৪০ পর্যন্ত বিদ্যালয়ের প্রতিষ্ঠাতা দানশীল শিক্ষানুরাগী শ্রী মথুরা মোহন রায় সভাপতির দায়িত্ব পালন করেন।  ০১/০১/ ১৯৪১ থেকে ৩১/১২/১৯৬০ জেলা প্রশাসক ত্রিপুরা/কুমিল্লা এবং ০১/০১/১৯৬১ থেকে ৩১,/১২/১৯৭২ পর্যন্ত কুমিল্লা সদর উত্তর মহকুমার, মহকুমা প্রশাসক দায়িত্ব পালন করেন।  \r\n\r\n১৯৯২ থেকে ২০০৫ সাল পর্যন্ত এ স্কুলের প্রাক্তন শিক্ষার্থী বিশিষ্ট সমাজ সেবক জনাব জাহাঙ্গীর আলম সরকার কার্য নির্বাহী পর্ষদের সভাপতির দায়িত্ব গ্রহণ করেন এবং ২০০৮ সালে জনাব বদরুন নাহার সরকার স্কুলের কার্য নির্বাহী পর্ষদের সভাপতি নির্বাচিত হন। তিনি বিদ্যালয়ের প্রথম এবং একমাত্র মহিলা সভাপতি। বিদ্যালয়ের সুদীর্ঘ পথ পরিক্রমায় অনেক সুশিক্ষিত, জ্ঞানী-গুণি-ত্যাগী পন্ডিত জনের নেতৃত্বের পরশে জ্ঞানের আলো ছড়িয়েছে সারা দেশময়।  \r\n\r\n১৯২০ সালে প্রথমবারের মত মেট্রিকুলেশন পরীক্ষায় ৭ জন অংশগ্রহণ করে তাঁদের মধ্যে ৩ জন প্রথম বিভাগ সহ ৬ জন পাশ করেন এবং ১৯৪৯ সালে মেট্রিকুলেশন পরীক্ষায় শতভাগ পাশের গৌরব অর্জন করে ।  ১৯৬৩ সালে প্রথম এসএসসি পরীক্ষার প্রবর্তন হলে সে পরীক্ষায় ৯০.৪৭% পরীক্ষার্থী পাশ করেন। ১৯৭৩ সালে বাণিজ্য বিভাগের প্রথম ব্যাচের দুইজন শিক্ষার্থী ৭ম ও ১৫শ স্থান দখল করার গৌরব অর্জন করেন।  \r\n\r\n১৯৮২ সালে আমাদের বিদ্যালয়ের ইতিহাসে শতবর্ষী বিদ্যালয়ের অন্যতম মেধাবী শিক্ষার্থী মোঃ আব্দুল লতিফ তৎকালীন কুমিল্লা শিক্ষা বোর্ডের (বর্তমানে কুমিল্লা, চট্টগ্রাম ও সিলেট) বিজ্ঞান বিভাগে ৭ম এবং সম্মিলিত মেধা তালিকায় ৯ম স্থান অধিকার করেন  \r\n\r\nআমাদের বিদ্যালয়ের শিক্ষক শিক্ষার্থীদের রাজনৈতিক অঙ্গনে রয়েছে সরব উপস্থিতি। ১৯৫২ সালে ভাষা আন্দোলন থেকে শুরু করে প্রতিটি গণতান্ত্রিক আন্দোলনে আশাজাগানীয়া অংশগ্রহণ দেশ জাতির কল্যানে স্বরণীয় হয়ে থাকবে চিরকাল। ১৯৭১ স্বাধীকার আন্দোলনে এ স্কুলের প্রায় পঞ্চাশ জন সরাসরি মুক্তিযুদ্ধে অংশগ্রহন করেন, তাঁদের সাহসিক উপস্থিতি দেশ-জাতি শ্রদ্ধার সাথে স্মরণ করে।  শহীদের প্রতি শ্রদ্ধা জ্ঞাপনের জন্য শহীদ মিনার ও প্রাত্যহিক সমাবেশের জন্য সমাবেশ মঞ্চ বিদ্যালয়ের সুশৃঙ্খল শিক্ষার পরিবেশকে করেছে মাধুর্যময়।  \r\n\r\n৫.৭৩ একর জমির মধ্যে ৪.৭১ একর বিদ্যালয় সংলগ্ন ভূমি, বিদ্যালয়ের ৪টি ভবনে ৩৮টি শ্রেণিকক্ষ যাহার আয়তন ১৫৭৬ বর্গমিটার, পুকুরের আয়তন ৪০৪৮ বর্গমিটার, খেলার মাঠের আয়তন ১১,৩৩৫ বর্গমিটার. ও ১.০২ একর। রামচন্দ্রপুর উত্তর বাজারস্থিত মার্কেটের ১৯টি দোকান, দুইটি শিক্ষকদের বাসা, আবাসিক এলাকা ও ছাত্রাবাসের জন্য সংরক্ষিত ভূমি। বিদ্যালয়ের শতবর্ষ উদযাপনকে কেন্দ্র করে বিদ্যালয়ের প্রাক্তন শিক্ষার্থীদের মধ্যে যে অভূতপূর্ব প্রাণ চাঞ্চল্য ও উচ্ছ্বাস পরিলক্ষিত হয়েছে তাতে আমরা নিশ্চিতভাবেই বলতে পারি আমাদের এ বিদ্যালয়কে কেন্দ্র করে দেশ বিদেশে থাকা সকলের মাঝে রয়েছে অটুট বন্ধন। আমাদের এ বন্ধন আরো সুদৃঢ় করার মাধ্যমে আমরা আমাদের বিদ্যালযের উন্নয়ন অভিযাত্রা অক্ষুন্ন থাকবে ।  \r\n\r\nশিক্ষার্থীদের উৎসাহ দানের লক্ষ্যে প্রাক্তন শিক্ষার্থদের উদ্যোগে কয়েকটি মেধা বৃত্তি চলমান আছে। ইঞ্জিনিয়ার মোহাম্মদ আশরাফ উদ্দিন সাহেবের পরিবারের উদ্যোগে “জোবেদা-সিরাজ ফাউন্ডেশন বৃত্তি\", ডঃ সুজিত রঞ্জন সাহা পরিবারের উদ্যোগে তাঁর পিতা আমাদের বিদ্যালয়ের শিক্ষক “শহীদ ধরণি মাষ্টার স্মৃতি বৃত্তি”, ডঃ এ.কে.এম শায়েস্তাগীর চৌধুরী (নকিব) কর্তৃক “জনাব শওকত আলী চৌধুরী ট্রাস্ট বৃত্তি\" ও ডঃ মিজানুর রহমান কর্তৃক “মুফ্রাদ-নাবিল রহমান মেমোরিয়াল ট্রাস্ট বৃত্তি” তাছাড়া আগামী ২০২০ সালের আরো দুই-তিনটি আকর্ষনীয় বৃত্তি প্রস্তাব অচীরেই আনুষ্ঠানিকভাবে ঘোষনা করা হবে। \r\n\r\n১৮ জন এমপিও ভুক্ত শিক্ষক-শিক্ষিকার বিপোরীতে ১৮ জন খন্ডকালীন শিক্ষক-শিক্ষিকার তত্ত্বাবধানে পরিচালিত মাল্টিমিডিয়া ক্লাশরুম চালু করার জন্য যথার্থ কর্তৃপক্ষের নিকট আবেদন করা আছে যা অতিশিঘ্রই বাস্তবায়িত হওয়ার প্রক্রিয়াধীন। বিজ্ঞা');

-- --------------------------------------------------------

--
-- Table structure for table `33_photo_gallery`
--

CREATE TABLE `33_photo_gallery` (
  `record_id` int(11) NOT NULL,
  `image_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `image_id` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `33_photo_gallery`
--

INSERT INTO `33_photo_gallery` (`record_id`, `image_name`, `image_id`) VALUES
(1, 'শতবর্ষ উদযাপন', '1.jpg'),
(2, 'শতবর্ষ উদযাপন', '2.jpg'),
(3, 'শতবর্ষ উদযাপন', '3.jpg'),
(4, 'শতবর্ষ উদযাপন', '4.jpg'),
(6, 'মেধা পুরস্কার- ২০১৯', '6.jpg'),
(7, 'মেধা পুরস্কার- ২০১৯', '7.jpg'),
(9, 'শতবর্ষ উদযাপন', '9.jpg'),
(12, 'শতবর্ষ উদযাপন', '12.jpg'),
(13, 'শতবর্ষ উদযাপন', '13.jpg'),
(14, 'জাতীয় শোকদিবস', '14.jpg'),
(15, 'প্রত্যাহিক কার্যক্রম', '15.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `34_governing_body_profile`
--

CREATE TABLE `34_governing_body_profile` (
  `record_id` int(11) NOT NULL,
  `name` varchar(500) CHARACTER SET utf8 NOT NULL,
  `designation` varchar(500) CHARACTER SET utf8 NOT NULL,
  `position` tinyint(4) NOT NULL,
  `details` varchar(5000) CHARACTER SET utf8 NOT NULL,
  `image` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `35_booklist`
--

CREATE TABLE `35_booklist` (
  `record_id` int(11) NOT NULL,
  `group_name` varchar(500) NOT NULL,
  `book_name` varchar(500) CHARACTER SET utf8 NOT NULL,
  `author_name` varchar(500) CHARACTER SET utf8 NOT NULL,
  `edition` varchar(500) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `36_syllabus`
--

CREATE TABLE `36_syllabus` (
  `record_id` int(11) NOT NULL,
  `class_name` varchar(500) NOT NULL,
  `pdf` varchar(500) NOT NULL,
  `published_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `37_notice`
--

CREATE TABLE `37_notice` (
  `record_id` int(11) NOT NULL,
  `user_title` varchar(500) CHARACTER SET utf8 NOT NULL,
  `date` date DEFAULT NULL,
  `particular` varchar(100) CHARACTER SET utf8 NOT NULL,
  `details` varchar(5000) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `37_notice`
--

INSERT INTO `37_notice` (`record_id`, `user_title`, `date`, `particular`, `details`) VALUES
(13, '1', '2019-11-01', 'জেএসসি পরীক্ষার- ২০১৯ ', 'No file'),
(17, '1', '2020-01-23', '২০২০ সালের এসএসসি পরীক্ষার রুটিন  (সংশোধিত)। ', 'No file');

-- --------------------------------------------------------

--
-- Table structure for table `38_board_of_directors`
--

CREATE TABLE `38_board_of_directors` (
  `record_id` int(11) NOT NULL,
  `name` varchar(500) CHARACTER SET utf8 NOT NULL,
  `designation` varchar(500) CHARACTER SET utf8 NOT NULL,
  `duration` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `38_board_of_directors`
--

INSERT INTO `38_board_of_directors` (`record_id`, `name`, `designation`, `duration`, `image`) VALUES
(2, 'হাজী মোঃ ফজলুর রহমান', 'কো-অপ্ট সদস্য', '১৩-০২-২০০৮ থেকে ৩০-০৬-২০১৭', '2.jpg'),
(3, 'হাজী মোঃ জয়নাল আবেদীন', 'অভিভাবক সদস্য', '', '3.jpg'),
(4, 'হাজী আবদুল হাকিম', 'কো-অপ্ট সদস্য', '', '4.jpg'),
(5, 'আলহাজ্ব মোঃ জাহাঙ্গীর আলম সরকার', 'সভাপতি', '', '5.jpg'),
(6, 'অখিল চন্দ্র পোদ্দার', 'সহ-সভাপতি', '০২-১২-১৯৭৮ থেকে ২২-০৭-১৯৮০', '6.jpg'),
(7, 'হাজী জয়নাল আবেদীন', 'অভিভাবক সদস্য', '', '7.jpg'),
(8, 'বাবু রাজ বিহারী দত্ত', 'সভাপতি', '', '8.jpg'),
(9, 'বাবু মথুরা মোহন রায়', 'সভাপতি', '', '9.jpg'),
(10, 'জেলা প্রশাসক, ত্রিপুরা / কুমিল্লা', 'সভাপতি', '', '10.jpg'),
(11, 'মহকুমা প্রশাসক , কুমিল্লা সদর (উত্তর)', 'সভাপতি', '', '11.jpg'),
(12, 'হাজী মোবারক হোসেন', 'সভাপতি', '', '12.jpg'),
(13, 'মোঃ জুলফু মিয়া', 'সভাপতি', '', '13.jpg'),
(14, 'সার্কেল অফিসার (উন্নয়ন) , মুরাদনগর', 'সভাপতি', '', '14.jpg'),
(15, 'থানা নির্বাহী অফিসার, মুরাদনগর', 'সভাপতি', '', '15.jpg'),
(16, 'উপজেলা  চেয়ারম্যান, মুরাদনগর', 'সভাপতি', '', '16.jpg'),
(17, 'উপজেলা নির্বাহী কর্মকর্তা, মুরাদনগর', 'সভাপতি', '', '17.jpg'),
(18, 'গোলাম সারোয়ার', 'সভাপতি', '', '18.jpg'),
(19, 'মোঃ মহিবুজ্জামান, ইউ.এন.ও, মুরাদনগর', 'সভাপতি', '', '19.jpg'),
(20, 'মোঃ মাহমুদ হাসান,  ইউ.এন.ও, মুরাদনগর', 'সভাপতি', '', '20.jpg'),
(21, 'বদরুন নাহার সরকার', 'সভাপতি', '', '21.jpg'),
(22, 'বদরুন নাহার সরকার', 'সভাপতি', '', '22.jpg'),
(23, 'জগৎলাল দেবনাথ', 'সহ-সভাপতি', '--- ০১-১২-১৯৭৮', '23.jpg'),
(24, 'মির্জা তফাজ্জল হোসেন', 'সহ-সভাপতি', '২৩/০৭/১৯৮০ থেকে  ৫/১/১৯৮২', '24.jpg'),
(25, 'আলহাজ্ব মোঃ ফজলুর রহমান', 'সহ-সভাপতি', '০৬-০১-১৯৮২ থেকে ১১-০২-১৯৮৬', '25.jpg'),
(26, 'হাজী আবদুল মতিন', 'সহ-সভাপতি', '১২-০২-১৯৮৬ থেকে ১০-১১-১৯৯৬', '26.jpg'),
(27, 'গেলাম সারোয়ার', 'সহ-সভাপতি', '০৬-১২-১৯৯৮ থেকে ০১-০২-২০০৫', '27.jpg'),
(28, 'মোঃ মজিবুর রহমান,  বি.এ.', 'সহ-সভাপতি', '০১-০২-২০০৫ থেকে ০৭-৪-২০০৭', '28.jpg'),
(29, 'মোঃ মতিউর রহমান খান , মাশিঅ, মুরাদনগর', 'সহ-সভাপতি', '০৮-৪-২০০৭ থেকে ১২-০২-২০০৮', '29.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `39_create_time`
--

CREATE TABLE `39_create_time` (
  `record_id` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `class_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `39_create_time`
--

INSERT INTO `39_create_time` (`record_id`, `class_name`, `class_time`) VALUES
(1, '6', '10:00:00'),
(2, '7', '10:00:00'),
(3, '8', '10:00:00'),
(5, '9', '10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `40_create_class_routine`
--

CREATE TABLE `40_create_class_routine` (
  `record_id` int(11) NOT NULL,
  `class_name` varchar(500) NOT NULL,
  `group_name` varchar(500) NOT NULL,
  `section_name` varchar(500) NOT NULL,
  `shift_name` varchar(500) NOT NULL,
  `session_name` varchar(500) NOT NULL,
  `version_name` varchar(500) NOT NULL,
  `class_day` varchar(500) NOT NULL,
  `class_time` time NOT NULL,
  `subject_name` varchar(500) NOT NULL,
  `teacher_name` varchar(500) NOT NULL,
  `teacher_id` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `41_dormitory_rent_collection`
--

CREATE TABLE `41_dormitory_rent_collection` (
  `record_id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `student_id` varchar(200) NOT NULL,
  `dormitory_name` varchar(200) NOT NULL,
  `month` varchar(200) NOT NULL,
  `amount` int(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `inserted_by` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `41_exam_routine`
--

CREATE TABLE `41_exam_routine` (
  `record_id` int(11) NOT NULL,
  `class_name` varchar(500) NOT NULL,
  `pdf` varchar(500) NOT NULL,
  `published_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `41_exam_routine`
--

INSERT INTO `41_exam_routine` (`record_id`, `class_name`, `pdf`, `published_date`) VALUES
(1, '6', '1.pdf', '2019-08-10');

-- --------------------------------------------------------

--
-- Table structure for table `41_hall_expense`
--

CREATE TABLE `41_hall_expense` (
  `record_id` int(11) NOT NULL,
  `date` varchar(200) NOT NULL,
  `expense_head` varchar(1000) NOT NULL,
  `voucher_no` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `41_hall_expense_head`
--

CREATE TABLE `41_hall_expense_head` (
  `record_id` int(11) NOT NULL,
  `expense_head` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `41_hall_income_head`
--

CREATE TABLE `41_hall_income_head` (
  `record_id` int(11) NOT NULL,
  `fee_head` varchar(1000) NOT NULL,
  `amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `41_insert_dormitory_info`
--

CREATE TABLE `41_insert_dormitory_info` (
  `record_id` int(11) NOT NULL,
  `dormitory_name` varchar(200) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `supervisor` varchar(200) NOT NULL,
  `mobile_no` varchar(200) NOT NULL,
  `rent` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `41_student_dormitory_allocation`
--

CREATE TABLE `41_student_dormitory_allocation` (
  `record_id` int(11) NOT NULL,
  `class_name` varchar(200) NOT NULL,
  `group_name` varchar(200) NOT NULL,
  `section_name` varchar(200) NOT NULL,
  `shift_name` varchar(200) NOT NULL,
  `student_id` varchar(200) NOT NULL,
  `student_name` varchar(1000) NOT NULL,
  `dormitory_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `42_library`
--

CREATE TABLE `42_library` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `book_name` varchar(500) NOT NULL,
  `author_name` varchar(500) NOT NULL,
  `quantity` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `42_library`
--

INSERT INTO `42_library` (`record_id`, `date`, `book_name`, `author_name`, `quantity`) VALUES
(1, '2019-08-01', 'Dictionary (B-E)', 'Bangla Academy', '2');

-- --------------------------------------------------------

--
-- Table structure for table `43_issue_book`
--

CREATE TABLE `43_issue_book` (
  `record_id` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `due_date` date NOT NULL,
  `book_name` varchar(500) NOT NULL,
  `book_id` varchar(50) NOT NULL,
  `student_id` varchar(500) NOT NULL,
  `student_name` varchar(500) NOT NULL,
  `class` varchar(500) NOT NULL,
  `return_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `43_issue_book`
--

INSERT INTO `43_issue_book` (`record_id`, `issue_date`, `due_date`, `book_name`, `book_id`, `student_id`, `student_name`, `class`, `return_status`) VALUES
(1, '2019-08-28', '2019-09-11', 'Dictionary (B-E)', '1', '2019012S', 'অধরা রানী সরকার', '6', 0);

-- --------------------------------------------------------

--
-- Table structure for table `44_transport`
--

CREATE TABLE `44_transport` (
  `record_id` int(11) NOT NULL,
  `transport_name` varchar(500) NOT NULL,
  `model` varchar(500) NOT NULL,
  `route` varchar(500) NOT NULL,
  `driver_name` varchar(500) NOT NULL,
  `driver_mobile` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `45_publish_result`
--

CREATE TABLE `45_publish_result` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `class_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `shift_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `46_create_sms`
--

CREATE TABLE `46_create_sms` (
  `record_id` int(11) NOT NULL,
  `create_date` varchar(200) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `body` varchar(10000) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `46_create_sms`
--

INSERT INTO `46_create_sms` (`record_id`, `create_date`, `title`, `body`) VALUES
(1, '2019-08-22', 'ডিজিটাল স্কুলে স্বাগতম', 'আগামী ৩১-০৮-২০১৯ ইং আমরা ডিজিটাল স্কুলে প্রবেশ করছি , আপনার সকল পরামর্শ তথ্যাদির জন্য সহযোগীতা কামনা করছি।');

-- --------------------------------------------------------

--
-- Table structure for table `47_employee_attendance`
--

CREATE TABLE `47_employee_attendance` (
  `record_id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `day` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `employee_id` varchar(100) NOT NULL,
  `employee_type` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `shift_name` varchar(100) NOT NULL,
  `intime` varchar(100) NOT NULL,
  `outtime` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `47_new_msg`
--

CREATE TABLE `47_new_msg` (
  `record_id` int(11) NOT NULL,
  `news` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `47_new_msg`
--

INSERT INTO `47_new_msg` (`record_id`, `news`) VALUES
(13, '★। ২০২০ সালের এসএসসি  পরীক্ষার্থীদের জন্য শুভ কামনা। ★');

-- --------------------------------------------------------

--
-- Table structure for table `47_student_attendance`
--

CREATE TABLE `47_student_attendance` (
  `record_id` int(11) NOT NULL,
  `date` varchar(200) NOT NULL,
  `day` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `roll` varchar(100) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `group_name` varchar(100) NOT NULL,
  `section_name` varchar(100) NOT NULL,
  `shift_name` varchar(100) NOT NULL,
  `version_name` varchar(500) NOT NULL,
  `intime` varchar(100) NOT NULL,
  `outtime` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `47_student_attendance`
--

INSERT INTO `47_student_attendance` (`record_id`, `date`, `day`, `year`, `student_id`, `name`, `roll`, `class_name`, `group_name`, `section_name`, `shift_name`, `version_name`, `intime`, `outtime`, `status`) VALUES
(1, '2019-08-17', 'Saturday', '2019', '2019002S', '????????? ???? ????', '001', 'VI', '', 'Section - A', 'Day', '', '11:30', '', '1'),
(2, '2019-08-17', 'Saturday', '2019', '2019003S', '?????? ???', '002', 'VI', '', 'Section - A', 'Day', '', '11:30', '', '3'),
(3, '2019-08-17', 'Saturday', '2019', '2019004S', '?????? ??????', '003', 'VI', '', 'Section - A', 'Day', '', '11:30', '', '2'),
(4, '2019-08-17', 'Saturday', '2019', '2019005S', '??????? ??????', '004', 'VI', '', 'Section - A', 'Day', '', '11:30', '', '1'),
(5, '2019-08-17', 'Saturday', '2019', '2019006S', '????? ??????', '005', 'VI', '', 'Section - A', 'Day', '', '11:30', '', '1'),
(6, '2019-08-17', 'Saturday', '2019', '2019007S', '??????? ??????', '006', 'VI', '', 'Section - A', 'Day', '', '11:30', '', '1'),
(7, '2019-08-17', 'Saturday', '2019', '2019008S', '?????? ??????', '007', 'VI', '', 'Section - A', 'Day', '', '11:30', '', '1'),
(8, '2019-08-17', 'Saturday', '2019', '2019009S', '?????? ???????', '008', 'VI', '', 'Section - A', 'Day', '', '11:30', '', '1'),
(9, '2019-08-17', 'Saturday', '2019', '2019010S', '?????? ??????', '010', 'VI', '', 'Section - A', 'Day', '', '11:30', '', '3'),
(10, '2019-08-17', 'Saturday', '2019', '2019011S', '??????? ?????? ????', '011', 'VI', '', 'Section - A', 'Day', '', '11:30', '', '1'),
(11, '2019-08-17', 'Saturday', '2019', '2019012S', '???? ???? ?????', '012', 'VI', '', 'Section - A', 'Day', '', '11:30', '', '1'),
(12, '2019-08-17', 'Saturday', '2019', '2019013S', '?????? ??????', '014', 'VI', '', 'Section - A', 'Day', '', '11:30', '', '1'),
(13, '2019-08-17', 'Saturday', '2019', '2019014S', '????? ??????', '013', 'VI', '', 'Section - A', 'Day', '', '11:30', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `alumni_list`
--

CREATE TABLE `alumni_list` (
  `id` int(11) NOT NULL,
  `batch` varchar(20) NOT NULL,
  `educational_year` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `mother_name` varchar(50) DEFAULT NULL,
  `spouse_name` varchar(50) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `present_address` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `profession` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `dob` varchar(20) DEFAULT NULL,
  `present_access` int(11) DEFAULT NULL,
  `mobile_access` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `insertion_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alumni_list`
--

INSERT INTO `alumni_list` (`id`, `batch`, `educational_year`, `name`, `father_name`, `mother_name`, `spouse_name`, `permanent_address`, `present_address`, `mobile_number`, `profession`, `email_id`, `dob`, `present_access`, `mobile_access`, `image`, `insertion_date`) VALUES
(18, '1979', '1979', 'Samir Sarker', 'সুধীর চন্দ্র সরকার', 'গীতা রাণী সরকার', 'Ruma Deb', '99', '999', '01712641460', 'Tax Consultant', 'bd.samir@gmail.com', '1964-08-24', 0, 0, '1.png', '2020-01-04 04:33:25am');

-- --------------------------------------------------------

--
-- Table structure for table `bank_deposit`
--

CREATE TABLE `bank_deposit` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `account_no` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `responsible_person` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank_deposit`
--

INSERT INTO `bank_deposit` (`record_id`, `date`, `bank_name`, `account_no`, `amount`, `responsible_person`) VALUES
(2, '2019-08-01', 'Janata Bank Limited', '15432000123', '30000', 'Abnfc'),
(3, '2019-08-02', 'Mutual Trust Bank Limited ', '2315009220011', '23400', 'Rafiq'),
(4, '2019-08-07', 'Islami Bank Bangladesh Limited', '2001988001001', '13000', 'Rafiq');

-- --------------------------------------------------------

--
-- Table structure for table `bank_withdraw`
--

CREATE TABLE `bank_withdraw` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `account_no` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `responsible_person` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `base_data`
--

CREATE TABLE `base_data` (
  `id` int(12) NOT NULL,
  `base_id` int(11) NOT NULL,
  `generic_name` varchar(50) NOT NULL,
  `name` varchar(500) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class_routine`
--

CREATE TABLE `class_routine` (
  `record_id` int(11) NOT NULL,
  `class_name` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pdf` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `published_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `class_routine`
--

INSERT INTO `class_routine` (`record_id`, `class_name`, `pdf`, `published_date`) VALUES
(1, '6', '1.pdf', '2019-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `create_bank_name`
--

CREATE TABLE `create_bank_name` (
  `record_id` int(11) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `account_no` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `create_bank_name`
--

INSERT INTO `create_bank_name` (`record_id`, `bank_name`, `account_no`) VALUES
(1, 'Janata Bank Limited', '15432000123'),
(2, 'Mutual Trust Bank Limited ', '2315009220011'),
(3, 'Islami Bank Bangladesh Limited', '2001988001001');

-- --------------------------------------------------------

--
-- Table structure for table `create_salary_sheet`
--

CREATE TABLE `create_salary_sheet` (
  `record_id` int(11) NOT NULL,
  `month` varchar(200) NOT NULL,
  `teacher_staff_id` varchar(200) NOT NULL,
  `teacher_staff_name` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `account_no` varchar(200) NOT NULL,
  `salary_scale` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `current_asset_info`
--

CREATE TABLE `current_asset_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ca_date` varchar(20) NOT NULL,
  `ca_cash_type` varchar(100) NOT NULL,
  `ca_amount` int(11) NOT NULL,
  `ca_receiver` varchar(100) NOT NULL,
  `issue_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `damage_repair_asset_info`
--

CREATE TABLE `damage_repair_asset_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dra_date` varchar(20) NOT NULL,
  `dra_product_name` varchar(100) NOT NULL,
  `dra_product_model` varchar(100) NOT NULL,
  `dra_product_band` varchar(100) NOT NULL,
  `dra_provider` varchar(100) NOT NULL,
  `dra_price` int(11) NOT NULL,
  `dra_quantity` int(11) NOT NULL,
  `dra_total_amount` int(11) NOT NULL,
  `dra_damage_type` varchar(100) NOT NULL,
  `issue_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fixed_asset_info`
--

CREATE TABLE `fixed_asset_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fa_date` varchar(20) NOT NULL,
  `fa_product_name` varchar(50) NOT NULL,
  `fa_product_model` varchar(50) NOT NULL,
  `fa_product_band` varchar(50) NOT NULL,
  `fa_provider` varchar(100) NOT NULL,
  `fa_price` int(11) NOT NULL,
  `fa_quantity` int(11) NOT NULL,
  `fa_total_amount` int(11) NOT NULL,
  `issue_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lost_stolen_asset_info`
--

CREATE TABLE `lost_stolen_asset_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lsa_date` varchar(20) NOT NULL,
  `lsa_type` varchar(100) NOT NULL,
  `lsa_lost_by` varchar(100) NOT NULL,
  `lsa_stolen_by` varchar(100) NOT NULL,
  `lsa_amount` int(11) NOT NULL,
  `lsa_quantity` int(11) NOT NULL DEFAULT 0,
  `lsa_qty` int(11) NOT NULL DEFAULT 0,
  `issue_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pf_create_info`
--

CREATE TABLE `pf_create_info` (
  `record_id` int(11) NOT NULL,
  `teacher_staff_id` varchar(200) NOT NULL,
  `teacher_staff_name` varchar(200) NOT NULL,
  `job_starting_date` date NOT NULL,
  `designation` varchar(200) NOT NULL,
  `job_retirement_date` date NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `account_no` varchar(200) NOT NULL,
  `salary_scale` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pf_deposit_info`
--

CREATE TABLE `pf_deposit_info` (
  `record_id` int(11) NOT NULL,
  `teacher_staff_id` varchar(200) NOT NULL,
  `teacher_staff_name` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `account_no` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `salary_scale` varchar(200) NOT NULL,
  `college_payment` varchar(200) NOT NULL,
  `total_deposit` varchar(200) NOT NULL,
  `bank_profit` varchar(200) NOT NULL,
  `sub_total` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pf_loan_info`
--

CREATE TABLE `pf_loan_info` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `teacher_staff_id` varchar(200) NOT NULL,
  `teacher_staff_name` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `account_no` varchar(200) NOT NULL,
  `balance_up_to_date` varchar(200) NOT NULL,
  `loan_amount` varchar(200) NOT NULL,
  `loan_payable` varchar(200) NOT NULL,
  `due_amount` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student_fee_discount`
--

CREATE TABLE `student_fee_discount` (
  `record_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `discount` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_fee_discount`
--

INSERT INTO `student_fee_discount` (`record_id`, `student_id`, `discount`, `created_at`) VALUES
(1, 2019001, 0, '2019-08-10 13:22:21'),
(3, 2019009, 0, '2019-08-16 20:16:54'),
(6, 2019002, 50, '2019-08-28 10:26:33'),
(7, 2019003, 20, '2019-08-28 12:42:20'),
(8, 2019007, 0, '2019-10-28 09:08:40');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_staff_salary`
--

CREATE TABLE `teacher_staff_salary` (
  `record_id` int(11) NOT NULL,
  `teacher_staff_id` varchar(100) NOT NULL,
  `teacher_staff_name` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `account_no` varchar(200) NOT NULL,
  `govt_salary` int(15) NOT NULL,
  `nongovt_salary` int(15) NOT NULL,
  `salary_amount` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `0_admin`
--
ALTER TABLE `0_admin`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `1_create_class`
--
ALTER TABLE `1_create_class`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `2_create_group`
--
ALTER TABLE `2_create_group`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `3_create_section`
--
ALTER TABLE `3_create_section`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `4_create_shift`
--
ALTER TABLE `4_create_shift`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `5_create_session`
--
ALTER TABLE `5_create_session`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `6_create_version`
--
ALTER TABLE `6_create_version`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `7_create_subject`
--
ALTER TABLE `7_create_subject`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `8_create_exam_type`
--
ALTER TABLE `8_create_exam_type`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `9_create_exam_grade`
--
ALTER TABLE `9_create_exam_grade`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `10_1_class_fee`
--
ALTER TABLE `10_1_class_fee`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `10_2_fee_collection`
--
ALTER TABLE `10_2_fee_collection`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `10_3_fee_collection`
--
ALTER TABLE `10_3_fee_collection`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `10_create_fee_head`
--
ALTER TABLE `10_create_fee_head`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `11_create_designation`
--
ALTER TABLE `11_create_designation`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `12_insert_student_info`
--
ALTER TABLE `12_insert_student_info`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `13_insert_teacher_info`
--
ALTER TABLE `13_insert_teacher_info`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `14_insert_staff_info`
--
ALTER TABLE `14_insert_staff_info`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `15_insert_guardian_info`
--
ALTER TABLE `15_insert_guardian_info`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `17_insert_governing_body`
--
ALTER TABLE `17_insert_governing_body`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `18_insert_administration_structure`
--
ALTER TABLE `18_insert_administration_structure`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `19_insert_booklist`
--
ALTER TABLE `19_insert_booklist`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `20_insert_syllabus`
--
ALTER TABLE `20_insert_syllabus`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `21_insert_class_routine`
--
ALTER TABLE `21_insert_class_routine`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `22_exam_routine`
--
ALTER TABLE `22_exam_routine`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `23_academic_calendar`
--
ALTER TABLE `23_academic_calendar`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `24_notice_board`
--
ALTER TABLE `24_notice_board`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `25_teacher_subject_management`
--
ALTER TABLE `25_teacher_subject_management`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `26_grade_mark_management`
--
ALTER TABLE `26_grade_mark_management`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `26_grade_mark_tutorial`
--
ALTER TABLE `26_grade_mark_tutorial`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `27_counter`
--
ALTER TABLE `27_counter`
  ADD PRIMARY KEY (`counter_id`);

--
-- Indexes for table `28_income_head`
--
ALTER TABLE `28_income_head`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `29_expense_head`
--
ALTER TABLE `29_expense_head`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `30_income`
--
ALTER TABLE `30_income`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `31_expense`
--
ALTER TABLE `31_expense`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `32_single_page_content`
--
ALTER TABLE `32_single_page_content`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `33_photo_gallery`
--
ALTER TABLE `33_photo_gallery`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `34_governing_body_profile`
--
ALTER TABLE `34_governing_body_profile`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `35_booklist`
--
ALTER TABLE `35_booklist`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `36_syllabus`
--
ALTER TABLE `36_syllabus`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `37_notice`
--
ALTER TABLE `37_notice`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `38_board_of_directors`
--
ALTER TABLE `38_board_of_directors`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `39_create_time`
--
ALTER TABLE `39_create_time`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `40_create_class_routine`
--
ALTER TABLE `40_create_class_routine`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `41_dormitory_rent_collection`
--
ALTER TABLE `41_dormitory_rent_collection`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `41_exam_routine`
--
ALTER TABLE `41_exam_routine`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `41_hall_expense`
--
ALTER TABLE `41_hall_expense`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `41_hall_expense_head`
--
ALTER TABLE `41_hall_expense_head`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `41_hall_income_head`
--
ALTER TABLE `41_hall_income_head`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `41_insert_dormitory_info`
--
ALTER TABLE `41_insert_dormitory_info`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `41_student_dormitory_allocation`
--
ALTER TABLE `41_student_dormitory_allocation`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `42_library`
--
ALTER TABLE `42_library`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `43_issue_book`
--
ALTER TABLE `43_issue_book`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `44_transport`
--
ALTER TABLE `44_transport`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `45_publish_result`
--
ALTER TABLE `45_publish_result`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `46_create_sms`
--
ALTER TABLE `46_create_sms`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `47_employee_attendance`
--
ALTER TABLE `47_employee_attendance`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `47_new_msg`
--
ALTER TABLE `47_new_msg`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `47_student_attendance`
--
ALTER TABLE `47_student_attendance`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `alumni_list`
--
ALTER TABLE `alumni_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_deposit`
--
ALTER TABLE `bank_deposit`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `bank_withdraw`
--
ALTER TABLE `bank_withdraw`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `base_data`
--
ALTER TABLE `base_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `class_routine`
--
ALTER TABLE `class_routine`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `create_bank_name`
--
ALTER TABLE `create_bank_name`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `create_salary_sheet`
--
ALTER TABLE `create_salary_sheet`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `current_asset_info`
--
ALTER TABLE `current_asset_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `damage_repair_asset_info`
--
ALTER TABLE `damage_repair_asset_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fixed_asset_info`
--
ALTER TABLE `fixed_asset_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lost_stolen_asset_info`
--
ALTER TABLE `lost_stolen_asset_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pf_create_info`
--
ALTER TABLE `pf_create_info`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `pf_deposit_info`
--
ALTER TABLE `pf_deposit_info`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `pf_loan_info`
--
ALTER TABLE `pf_loan_info`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `student_fee_discount`
--
ALTER TABLE `student_fee_discount`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `teacher_staff_salary`
--
ALTER TABLE `teacher_staff_salary`
  ADD PRIMARY KEY (`record_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `0_admin`
--
ALTER TABLE `0_admin`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `1_create_class`
--
ALTER TABLE `1_create_class`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `2_create_group`
--
ALTER TABLE `2_create_group`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `3_create_section`
--
ALTER TABLE `3_create_section`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `4_create_shift`
--
ALTER TABLE `4_create_shift`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `5_create_session`
--
ALTER TABLE `5_create_session`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `6_create_version`
--
ALTER TABLE `6_create_version`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `7_create_subject`
--
ALTER TABLE `7_create_subject`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `8_create_exam_type`
--
ALTER TABLE `8_create_exam_type`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `9_create_exam_grade`
--
ALTER TABLE `9_create_exam_grade`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `10_1_class_fee`
--
ALTER TABLE `10_1_class_fee`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `10_2_fee_collection`
--
ALTER TABLE `10_2_fee_collection`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `10_3_fee_collection`
--
ALTER TABLE `10_3_fee_collection`
  MODIFY `record_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `10_create_fee_head`
--
ALTER TABLE `10_create_fee_head`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `11_create_designation`
--
ALTER TABLE `11_create_designation`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `13_insert_teacher_info`
--
ALTER TABLE `13_insert_teacher_info`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `14_insert_staff_info`
--
ALTER TABLE `14_insert_staff_info`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `15_insert_guardian_info`
--
ALTER TABLE `15_insert_guardian_info`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `17_insert_governing_body`
--
ALTER TABLE `17_insert_governing_body`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `18_insert_administration_structure`
--
ALTER TABLE `18_insert_administration_structure`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `19_insert_booklist`
--
ALTER TABLE `19_insert_booklist`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `20_insert_syllabus`
--
ALTER TABLE `20_insert_syllabus`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `21_insert_class_routine`
--
ALTER TABLE `21_insert_class_routine`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `22_exam_routine`
--
ALTER TABLE `22_exam_routine`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `24_notice_board`
--
ALTER TABLE `24_notice_board`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `25_teacher_subject_management`
--
ALTER TABLE `25_teacher_subject_management`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `26_grade_mark_management`
--
ALTER TABLE `26_grade_mark_management`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `26_grade_mark_tutorial`
--
ALTER TABLE `26_grade_mark_tutorial`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `28_income_head`
--
ALTER TABLE `28_income_head`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `29_expense_head`
--
ALTER TABLE `29_expense_head`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `30_income`
--
ALTER TABLE `30_income`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `31_expense`
--
ALTER TABLE `31_expense`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `34_governing_body_profile`
--
ALTER TABLE `34_governing_body_profile`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `35_booklist`
--
ALTER TABLE `35_booklist`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `37_notice`
--
ALTER TABLE `37_notice`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `39_create_time`
--
ALTER TABLE `39_create_time`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `40_create_class_routine`
--
ALTER TABLE `40_create_class_routine`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `41_dormitory_rent_collection`
--
ALTER TABLE `41_dormitory_rent_collection`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `41_hall_expense`
--
ALTER TABLE `41_hall_expense`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `41_hall_expense_head`
--
ALTER TABLE `41_hall_expense_head`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `41_hall_income_head`
--
ALTER TABLE `41_hall_income_head`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `41_insert_dormitory_info`
--
ALTER TABLE `41_insert_dormitory_info`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `41_student_dormitory_allocation`
--
ALTER TABLE `41_student_dormitory_allocation`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `42_library`
--
ALTER TABLE `42_library`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `43_issue_book`
--
ALTER TABLE `43_issue_book`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `44_transport`
--
ALTER TABLE `44_transport`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `45_publish_result`
--
ALTER TABLE `45_publish_result`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `46_create_sms`
--
ALTER TABLE `46_create_sms`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `47_employee_attendance`
--
ALTER TABLE `47_employee_attendance`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `47_new_msg`
--
ALTER TABLE `47_new_msg`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `47_student_attendance`
--
ALTER TABLE `47_student_attendance`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `alumni_list`
--
ALTER TABLE `alumni_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `bank_deposit`
--
ALTER TABLE `bank_deposit`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bank_withdraw`
--
ALTER TABLE `bank_withdraw`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `base_data`
--
ALTER TABLE `base_data`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_routine`
--
ALTER TABLE `class_routine`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `create_bank_name`
--
ALTER TABLE `create_bank_name`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `create_salary_sheet`
--
ALTER TABLE `create_salary_sheet`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `current_asset_info`
--
ALTER TABLE `current_asset_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `damage_repair_asset_info`
--
ALTER TABLE `damage_repair_asset_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fixed_asset_info`
--
ALTER TABLE `fixed_asset_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lost_stolen_asset_info`
--
ALTER TABLE `lost_stolen_asset_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pf_create_info`
--
ALTER TABLE `pf_create_info`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pf_deposit_info`
--
ALTER TABLE `pf_deposit_info`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pf_loan_info`
--
ALTER TABLE `pf_loan_info`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_fee_discount`
--
ALTER TABLE `student_fee_discount`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teacher_staff_salary`
--
ALTER TABLE `teacher_staff_salary`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
