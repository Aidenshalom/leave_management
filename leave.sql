-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 07, 2025 at 10:02 PM
-- Server version: 8.0.31
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leave`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(250) NOT NULL,
  `dob` date NOT NULL,
  `age` varchar(250) NOT NULL,
  `gender` varchar(2502) NOT NULL,
  `address` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phone`, `password`, `role`, `dob`, `age`, `gender`, `address`, `image`, `date_added`) VALUES
(1, 'Ogunbajo Muhammed', 'aiden@gmail.com', '08020781427', 'aiden', 'admin', '2002-05-13', '21', 'male', '33, oreta, igbogbo.', 'assets/admin/IMG_20221025_020729_365.jpg', '0000-00-00'),
(2, 'ola lekan', 'lekan@gmail.com', '09088909876', '1234', 'Admin', '2003-01-28', '20', 'male', 'aiden resident', '', '2023-06-14'),
(3, 'better work', 'better@gmail.com', '09023332232', '2445', 'Admin', '2012-01-31', '22', 'female', 'better work', 'assets/admin/IMG_20210501_001654_267.jpg', '2023-06-14'),
(4, 'aiden aiden', 'lilaiden247@gmail.com', '09088888889', '123', 'Admin', '2000-11-20', '12', 'female', 'html', 'assets/admin/IMG_20221025_020652_384 - Copy - Copy - Copy.jpg', '2023-07-16'),
(5, 'aiden aiden', 'aiden@gmail.com', '09088888889', '1231', 'Admin', '2000-10-20', '23', 'female', 'html', 'assets/admin/IMG_20221025_020652_384 - Copy - Copy (2).jpg', '2023-07-16'),
(6, 'aiden aiden', 'aiden@gmail.com', '09088888889', '200', 'admin', '2000-10-12', '22', 'male', 'html', 'assets/admin/IMG_20210501_001654_267 - Copy.jpg', '2023-07-16');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `id` int NOT NULL AUTO_INCREMENT,
  `department` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`) VALUES
(1, 'Instructor'),
(5, 'Accountant'),
(6, 'Security'),
(16, 'Counsellor'),
(17, 'Cleaner');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `age` varchar(250) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `department_id` int NOT NULL,
  `image` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `phone`, `dob`, `age`, `gender`, `department_id`, `image`, `address`, `password`, `date_added`) VALUES
(1, 'muhammed ogunajo', 'olamilekanmuhammed68@gmail.com', '08020781427', '2002-05-17', '21', 'male', 1, 'assets/employee/IMG_20210501_001654_267.jpg', '33, oreta, igbogbo, ikorodu.', 'lekan', '2023-06-09'),
(5, 'ola ogunajo', 'olamilekan@gmail.com', '08020781427', '1999-02-20', '24', 'male', 6, 'assets/employee/IMG_20210501_001654_267 - Copy (2) - Copy.jpg', '30, udini villa, ikoyi', 'ola', '2023-06-09'),
(7, 'aiden smallo', 'aiden@gmail.com', '09088888889', '2023-06-30', '20', 'male', 6, 'assets/employee/IMG_20221025_020652_384 - Copy (2).jpg', 'html', 'html', '2023-06-09'),
(10, 'wasiu okoya', 'wasiu@gmail.com', '0908367894', '2001-07-20', '21', 'male', 6, 'assets/employee/IMG_20221025_020652_384.jpg', 'idowu empire, middletown.', 'wasiu', '2023-06-19'),
(14, 'muhammed ogunajo', 'olamilekanmuhammed68@gmail.com', '08020781427', '2023-07-07', '23', 'male', 16, 'assets/employee/IMG_20210501_001654_267 - Copy - Copy.jpg', '33, igbogbo, ikorodu.1', 'were', '2023-07-04'),
(15, 'yusuf ade', 'olamilekanmuhammed68@gmail.com', '08020781427', '2023-07-04', '20', 'male', 16, 'assets/employee/IMG_20221025_020729_365 - Copy (2).jpg', '33, igbogbo, ikorodu.1', 'ade', '2023-07-07'),
(29, 'aiden aiden', 'lilaiden247@gmail.com', '09088888889', '2023-06-29', '22', 'male', 1, 'assets/employee/IMG_20221025_020652_384 - Copy - Copy - Copy.jpg', 'html', '0000', '2023-07-10');

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

DROP TABLE IF EXISTS `leave`;
CREATE TABLE IF NOT EXISTS `leave` (
  `id` int NOT NULL AUTO_INCREMENT,
  `employee_name` varchar(250) NOT NULL,
  `employee_id` int NOT NULL,
  `department_id` int NOT NULL,
  `leave_id` int NOT NULL,
  `start_date` varchar(10) NOT NULL,
  `end_date` varchar(10) NOT NULL,
  `off_days` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_applied` date NOT NULL,
  `status` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`id`, `employee_name`, `employee_id`, `department_id`, `leave_id`, `start_date`, `end_date`, `off_days`, `date_applied`, `status`) VALUES
(1, 'muhammed ogunajo', 1, 1, 1, '2023-06-19', '2023-06-23', '5', '2023-06-16', '2'),
(4, 'muhammed ogunajo', 1, 1, 2, '2023-06-23', '2023-06-30', '7', '2023-06-18', '2'),
(7, 'wasiu okoya', 10, 6, 3, '2023-07-07', '2023-07-15', '8', '2023-06-20', '2'),
(8, 'ola ogunajo', 5, 6, 3, '2023-07-10', '2023-07-21', '11', '2023-07-01', '2'),
(9, 'aiden smallo', 7, 6, 16, '2023-07-10', '2023-07-14', '5', '2023-07-03', '3'),
(10, 'wasiu okoya', 10, 6, 3, '2023-07-05', '2023-07-07', '3', '2023-07-04', '2'),
(11, 'muhammed ogunajo', 1, 1, 1, '2023-07-10', '2023-07-12', '2', '2023-07-05', '2'),
(13, 'muhammed ogunajo', 1, 1, 2, '2023-07-18', '2023-07-21', '3', '2023-07-05', '2'),
(37, 'ola ogunajo', 5, 6, 1, '2023-07-10', '2023-07-14', '4', '2023-07-09', '2'),
(38, 'yusuf ade', 15, 16, 4, '2023-07-10', '2023-07-19', '9', '2023-07-09', '2'),
(51, 'ola ogunajo', 5, 6, 2, '0000-00-00', '0000-00-00', '4', '2023-07-19', '2'),
(40, 'aiden aiden', 29, 1, 6, '2023-07-17', '2023-07-21', '4', '2023-07-10', '2'),
(41, 'aiden aiden', 29, 1, 16, '2023-07-20', '2023-07-27', '7', '2023-07-10', '3'),
(44, 'aiden aiden', 29, 1, 1, '0000-00-00', '0000-00-00', '8', '2023-07-16', '3');

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

DROP TABLE IF EXISTS `leave_type`;
CREATE TABLE IF NOT EXISTS `leave_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `days` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `leave_type`
--

INSERT INTO `leave_type` (`id`, `name`, `days`) VALUES
(1, 'Annual leave', '15 '),
(2, 'Casual Leave', '15 '),
(3, 'Sick Leave', '15'),
(4, 'Marriage Leave', '10'),
(5, 'Maternity Leave', '98'),
(6, 'Paternity Leave', '10');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_id` int NOT NULL,
  `user_role` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `date` date NOT NULL,
  `active` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `title`, `user_id`, `user_role`, `body`, `date`, `active`) VALUES
(1, 'Error message', 1, 'admin', 'Sorry, Image file already exists try again with another image', '2023-07-16', 0),
(2, 'Success message', 1, 'admin', 'You have successfully registered an admin', '2023-07-16', 0),
(3, 'Error message', 1, 'admin', 'Sorry, Image file already exists try again with another image', '2023-07-16', 0),
(4, 'Error message', 1, 'employee', 'You can\'t apply for leave longer than the remaining days in your `leave` balance, check `leave` balance', '2023-07-16', 0),
(5, 'Error message', 1, 'employee', 'You can\'t apply for leave longer than the remaining days in your `leave` balance, check `leave` balance', '2023-07-16', 0),
(6, 'Error message', 1, 'employee', 'You can\'t apply for leave longer than the remaining days in your `leave` balance, check `leave` balance', '2023-07-16', 0),
(7, 'Success message', 29, 'employee', 'You have successfully applied for leave, The admin will review it soon', '2023-07-16', 0),
(8, 'Error message', 29, 'employee', 'You can\'t apply for leave longer than the remaining days in your `leave` balance, check `leave` balance.', '2023-07-16', 0),
(9, 'Error message', 29, 'employee', 'You can\'t apply for leave longer than the remaining days in your leave balance, check your leave balance.', '2023-07-16', 0),
(17, 'Success message', 1, 'admin', 'You have successfully updated your profile photo.', '2023-07-16', 0),
(18, 'Success message', 1, 'admin', 'You have successfully updated your profile photo.', '2023-07-16', 0),
(19, 'Success message', 1, 'admin', 'You have successfully updated your profile photo.', '2023-07-16', 0),
(20, 'Error message', 1, 'admin', 'Sorry, Image file already exists try again with another image.', '2023-07-16', 0),
(21, 'Success message', 1, 'admin', 'You have successfully updated an employee profile.', '2023-07-16', 0),
(22, 'Success message', 1, 'admin', 'You have successfully updated an employee profile.', '2023-07-16', 0),
(23, 'Success message', 1, 'admin', 'You have successfully add a leave type.', '2023-07-16', 0),
(24, 'Success message', 1, 'admin', 'You have successfully upated a leave type.', '2023-07-16', 0),
(25, 'Success message', 1, 'admin', 'You have successfully upated Earned leave.', '2023-07-16', 0),
(26, 'Success message', 1, 'admin', 'new leave was successfully added to leave types.', '2023-07-16', 0),
(27, 'Success message', 1, 'admin', 'You have successfully upated New leave.', '2023-07-16', 0),
(28, 'Success message', 1, 'admin', 'Earned leave was successfully added to leave types.', '2023-07-16', 0),
(30, 'Success message', 1, 'admin', 'Earned leave was successfully added to leave types.', '2023-07-16', 0),
(31, 'Success message', 1, 'admin', 'You have successfully deleted .', '2023-07-16', 0),
(32, 'Success message', 1, 'admin', 'Earned leave was successfully added to leave types.', '2023-07-16', 0),
(33, 'Success message', 1, 'admin', 'You have successfully deleted a leave type.', '2023-07-16', 0),
(36, 'Success message', 1, 'admin', 'You have successfully updated your profile photo.', '2023-07-18', 0),
(37, 'Success message', 1, 'admin', 'You have successfully updated your profile photo.', '2023-07-18', 0),
(38, 'Success message', 29, 'employee', 'You have successfully updated your profile.', '2023-07-18', 0),
(39, 'Error message', 29, 'employee', 'Sorry, Image file already exists try again with another image.', '2023-07-18', 0),
(40, 'Success message', 29, 'employee', 'You have successfully updated your profile.', '2023-07-18', 0),
(41, 'Error message', 29, 'employee', 'Sorry, Image file already exists try again with another image.', '2023-07-18', 0),
(42, 'Success message', 29, 'employee', 'You have successfully updated your profile.', '2023-07-18', 0),
(43, 'Error message', 29, 'employee', 'You can\'t apply for leave longer than the remaining days in your leave balance, check your leave balance.', '2023-07-18', 0),
(44, 'Error message', 29, 'employee', 'You can\'t apply for leave longer than the remaining days in your leave balance, check your leave balance.', '2023-07-18', 0),
(45, 'Error message', 29, 'employee', 'You can\'t apply for leave longer than the remaining days in your leave balance, check your leave balance.', '2023-07-18', 0),
(46, 'Success message', 5, 'employee', 'You have successfully updated your profile picture.', '2023-07-18', 0),
(47, 'Success message', 5, 'employee', 'You have successfully updated your profile.', '2023-07-18', 0),
(48, 'Success message', 29, 'employee', 'Your leave application has been <i><b>Declined</b></i>.', '2023-07-18', 0),
(49, 'Success message', 1, 'admin', 'You have successfully updated your profile.', '2023-07-19', 0),
(50, 'Success message', 1, 'employee', 'You have successfully updated your profile.', '2023-07-19', 0),
(51, 'Success message', 1, 'admin', 'You have successfully deleted a leave type.', '2023-07-19', 0),
(52, 'Success message', 1, 'admin', 'You have successfully deleted a leave type.', '2023-07-19', 0),
(53, 'Success message', 1, 'admin', 'Earned leave was successfully added to leave types.', '2023-07-19', 0),
(54, 'Success message', 1, 'admin', 'You have successfully deleted a leave type.', '2023-07-19', 0),
(55, 'Success message', 1, 'admin', 'Earned leave was successfully added to leave types.', '2023-07-19', 0),
(56, 'Success message', 1, 'admin', 'You have successfully deleted a leave type.', '2023-07-19', 0),
(57, 'Success message', 1, 'admin', 'Earned leave was successfully added to leave types.', '2023-07-19', 0),
(58, 'Success message', 1, 'admin', 'You have successfully deleted a leave type.', '2023-07-19', 0),
(59, 'Success message', 1, 'admin', 'New leave was successfully added to leave types.', '2023-07-19', 0),
(60, 'Success message', 1, 'admin', 'You have successfully deleted a leave type.', '2023-07-19', 0),
(61, 'Success message', 1, 'admin', 'New leave was successfully added to leave types.', '2023-07-19', 0),
(62, 'Success message', 1, 'admin', 'You have successfully upated New leave.', '2023-07-19', 0),
(63, 'Success message', 1, 'admin', 'You have successfully deleted a leave type.', '2023-07-19', 0),
(64, 'Error message', 1, 'admin', 'Sorry, Image file already exists try again with another image.', '2023-07-19', 0),
(65, 'Success message', 1, 'admin', 'You have successfully updated an employee profile.', '2023-07-19', 0),
(66, 'Success message', 1, 'admin', 'Earned leave was successfully added to leave types.', '2023-07-19', 0),
(67, 'Success message', 1, 'admin', 'You have successfully deleted a leave type.', '2023-07-19', 0),
(68, 'Success message', 1, 'admin', 'New leave was successfully added to leave types.', '2023-07-19', 0),
(69, 'Success message', 1, 'admin', 'You have successfully deleted a leave type.', '2023-07-19', 0),
(70, 'Success message', 1, 'admin', 'You have successfully deleted a leave type.', '2023-07-19', 0),
(71, 'Success message', 1, 'admin', 'You have successfully deleted a leave type.', '2023-07-19', 0),
(72, 'Success message', 1, 'admin', 'You have successfully deleted a leave type.', '2023-07-19', 0),
(73, 'Success message', 1, 'admin', 'You have successfully deleted a leave type.', '2023-07-19', 0),
(74, 'Success message', 1, 'admin', 'You have successfully deleted a leave type.', '2023-07-19', 0),
(75, 'Success message', 1, 'admin', 'You have successfully deleted a leave type.', '2023-07-19', 0),
(76, 'Success message', 1, 'admin', 'You have successfully deleted a leave type.', '2023-07-19', 0),
(77, 'Success message', 1, 'admin', 'You have successfully deleted a leave type.', '2023-07-19', 0),
(78, 'Success message', 1, 'employee', 'You have successfully applied for leave, The admin will review it soon.', '2023-07-19', 0),
(80, 'Success message', 29, 'employee', 'You have successfully applied for leave, The admin will review it soon.', '2023-07-19', 0),
(82, 'Success message', 29, 'employee', 'You have successfully applied for leave, The admin will review it soon.', '2023-07-19', 0),
(83, 'Success message', 29, 'employee', 'You have successfully deleted a leave type.', '2023-07-19', 0),
(84, 'Success message', 29, 'employee', 'You have successfully updated your profile.', '2023-07-19', 0),
(85, 'Success message', 5, 'employee', 'You have successfully deleted a leave type.', '2023-07-19', 0),
(86, 'Success message', 5, 'employee', 'You have successfully applied for leave, The admin will review it soon.', '2023-07-19', 0),
(87, 'Success message', 5, 'employee', 'You have successfully deleted a leave type.', '2023-07-19', 0),
(88, 'Success message', 5, 'employee', 'You have successfully applied for leave, The admin will review it soon.', '2023-07-19', 0),
(89, 'Success message', 5, 'employee', 'You have successfully deleted a leave type.', '2023-07-19', 0),
(90, 'Success message', 5, 'employee', 'You have successfully applied for leave, The admin will review it soon.', '2023-07-19', 0),
(91, 'Success message', 5, 'employee', 'You have successfully deleted a leave type.', '2023-07-19', 0),
(92, 'Success message', 5, 'employee', 'You have successfully applied for leave, The admin will review it soon.', '2023-07-19', 0),
(93, 'Success message', 5, 'employee', 'Your leave application has been <i><b>approved</b></i>.', '2023-07-19', 0),
(94, 'Success message', 1, 'admin', 'You have successfully deleted a leave type.', '2023-07-19', 0),
(95, 'Success message', 1, 'admin', 'You have successfully deleted a leave type.', '2023-07-19', 0),
(96, 'Success message', 1, 'admin', 'You have successfully deleted a leave type.', '2023-07-19', 0),
(97, 'Success message', 1, 'admin', 'You have successfully deleted a leave type.', '2023-07-19', 0),
(98, 'Success message', 1, 'admin', 'You have successfully deleted a leave type.', '2023-07-19', 0),
(99, 'Success message', 1, 'admin', 'New leave was successfully added to leave types.', '2023-07-19', 0),
(100, 'Success message', 1, 'admin', 'You have successfully deleted a leave type.', '2023-07-19', 0),
(101, 'Success message', 1, 'admin', 'New leave was successfully added to leave types.', '2023-07-19', 0),
(102, 'Success message', 1, 'admin', 'You have successfully deleted a leave type.', '2023-07-19', 0),
(103, 'Success message', 1, 'admin', 'You have successfully registered an employee.', '2023-07-19', 0),
(104, 'Success message', 1, 'admin', 'You have successfully deleted a leave type.', '2023-07-19', 0),
(105, 'Success message', 1, 'admin', 'You have successfully registered an employee.', '2023-07-19', 0),
(106, 'Success message', 1, 'admin', 'You have successfully deleted a leave type.', '2023-07-19', 0),
(107, 'Success message', 1, 'admin', 'You have successfully deleted a leave type.', '2023-07-19', 0),
(108, 'Success message', 29, 'employee', 'You have successfully applied for leave, The admin will review it soon.', '2023-07-21', 1),
(109, 'Success message', 29, 'employee', 'You have successfully updated your leave application, The admin will review it soon.', '2023-07-21', 1),
(110, 'Success message', 29, 'employee', 'You have successfully updated your leave application, The admin will review it soon.', '2023-07-21', 1),
(111, 'Success message', 29, 'employee', 'You have successfully updated your leave application, The admin will review it soon.', '2023-07-21', 1),
(112, 'Success message', 29, 'employee', 'You have successfully applied for leave, The admin will review it soon.', '2023-07-21', 1),
(113, 'Success message', 29, 'employee', 'You have successfully deleted a leave type.', '2023-07-21', 1),
(114, 'Success message', 29, 'employee', 'You have successfully deleted a leave type.', '2023-07-21', 1),
(115, 'Success message', 29, 'employee', 'You have successfully applied for leave, The admin will review it soon.', '2023-12-05', 1),
(116, 'Success message', 29, 'employee', 'You have successfully updated your leave application, The admin will review it soon.', '2023-12-05', 1),
(117, 'Success message', 29, 'employee', 'You have successfully updated your leave application, The admin will review it soon.', '2023-12-05', 1),
(118, 'Success message', 29, 'employee', 'You have successfully deleted a leave type.', '2023-12-05', 1),
(119, 'Error message', 29, 'employee', 'You can\'t apply for leave longer than the remaining days in your leave balance, check your leave balance.', '2023-12-06', 1),
(120, 'Success message', 1, 'employee', 'You have successfully updated your profile.', '2025-05-07', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
