-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 15, 2022 at 01:47 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eval_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `employment_id` varchar(145) DEFAULT NULL,
  `first_name` varchar(145) DEFAULT NULL,
  `middle_name` varchar(145) DEFAULT NULL,
  `last_name` varchar(145) DEFAULT NULL,
  `email` varchar(145) DEFAULT NULL,
  `password` varchar(145) DEFAULT NULL,
  `account_status` enum('pending','active','disabled') NOT NULL DEFAULT 'pending',
  `department_id` int(11) DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL COMMENT 'user type(1==dean),(2==faculty)',
  `profile` varchar(145) DEFAULT NULL,
  `tokencode` varchar(145) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `employment_id`, `first_name`, `middle_name`, `last_name`, `email`, `password`, `account_status`, `department_id`, `user_type`, `profile`, `tokencode`, `created_at`, `updated_at`) VALUES
(1, '2021-0123', 'ANDREI', 'MANALANSAN', 'VISCAYNO', 'andrei.m.viscayno@gmail.com', '42f749ade7f9e195bf475f37a44cafcb', 'active', 1, 1, 'profile-1.png', 'a7daecc32676980c492de9df0504c523', '2022-12-14 12:46:52', '2022-12-15 12:09:56');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(145) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `google_recaptcha_api`
--

CREATE TABLE `google_recaptcha_api` (
  `Id` int(11) NOT NULL,
  `site_key` varchar(145) DEFAULT NULL,
  `site_secret_key` varchar(145) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `google_recaptcha_api`
--

INSERT INTO `google_recaptcha_api` (`Id`, `site_key`, `site_secret_key`, `created_at`, `updated_at`) VALUES
(1, '6LdiQZQhAAAAABpaNFtJpgzGpmQv2FwhaqNj2azh', '6LdiQZQhAAAAAByS6pnNjOs9xdYXMrrW2OeTFlrm', '2022-12-11 03:59:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `smtp`
--

CREATE TABLE `smtp` (
  `Id` int(11) NOT NULL,
  `email` varchar(145) DEFAULT NULL,
  `password` varchar(145) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smtp`
--

INSERT INTO `smtp` (`Id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'fisheryapp092922@gmail.com', 'qwgjqojqbxywkcfq', '2022-12-11 03:55:00', '2022-12-11 12:07:40');

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `superadmin_id` int(11) NOT NULL,
  `email` varchar(145) DEFAULT NULL,
  `password` varchar(145) DEFAULT NULL,
  `profile` varchar(145) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `tokencode` varchar(145) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`superadmin_id`, `email`, `password`, `profile`, `department_id`, `tokencode`, `created_at`, `updated_at`) VALUES
(1, 'andrei.m.viscayno@gmail.com', '42f749ade7f9e195bf475f37a44cafcb', 'profile.png', 1, 'ba823300fd7b646407800ca2e772caa1', '2022-12-14 13:48:54', '2022-12-15 11:49:42');

-- --------------------------------------------------------

--
-- Table structure for table `system_config`
--

CREATE TABLE `system_config` (
  `Id` int(11) NOT NULL,
  `system_name` varchar(145) DEFAULT NULL,
  `system_number` varchar(145) DEFAULT NULL,
  `system_email` varchar(145) DEFAULT NULL,
  `copy_right` varchar(145) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_config`
--

INSERT INTO `system_config` (`Id`, `system_name`, `system_number`, `system_email`, `copy_right`, `created_at`, `updated_at`) VALUES
(1, 'PROGNOSTIX', '09776621929', 'prognostix2022@gmail.com', 'Copyright © 2022 Prognostix. All right reserved', '2022-12-11 12:13:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `system_logo`
--

CREATE TABLE `system_logo` (
  `Id` int(11) NOT NULL,
  `logo` varchar(145) NOT NULL,
  `favicon` varchar(145) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_logo`
--

INSERT INTO `system_logo` (`Id`, `logo`, `favicon`, `created_at`, `updated_at`) VALUES
(1, 'prognostix_logo.png', 'prognostix_icon.png', '2022-12-10 14:55:26', '2022-12-10 23:45:16');

-- --------------------------------------------------------

--
-- Table structure for table `tb_logs`
--

CREATE TABLE `tb_logs` (
  `activity_id` int(11) NOT NULL,
  `user_type` varchar(145) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `activity` varchar(145) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_logs`
--

INSERT INTO `tb_logs` (`activity_id`, `user_type`, `user_id`, `activity`, `created_at`, `updated_at`) VALUES
(1, 'Student', 1, 'Has successfully signed in', '2022-12-11 04:20:29', NULL),
(2, 'Student', 1, 'Has successfully signed in', '2022-12-11 04:27:20', NULL),
(3, 'Student', 1, 'Has successfully signed in', '2022-12-11 11:55:02', NULL),
(4, 'Student', 1, 'Has successfully signed in', '2022-12-11 12:27:24', NULL),
(5, 'Dean', 1, 'Has successfully signed in', '2022-12-14 12:47:08', NULL),
(6, 'Student', 1, 'Has successfully signed in', '2022-12-14 13:25:44', NULL),
(7, 'Superadmin', 1, 'Has successfully signed in', '2022-12-14 13:49:05', NULL),
(8, 'Superadmin', 1, 'Has successfully signed in', '2022-12-14 13:53:37', NULL),
(9, 'Student', 1, 'Has successfully signed in', '2022-12-14 14:13:02', NULL),
(10, 'Superadmin', 1, 'Has successfully signed in', '2022-12-15 11:34:50', NULL),
(11, 'Superadmin', 1, 'Has successfully signed in', '2022-12-15 11:56:16', NULL),
(12, 'Superadmin', 1, 'Has successfully signed in', '2022-12-15 11:56:22', NULL),
(13, 'Superadmin', 1, 'Has successfully signed in', '2022-12-15 11:56:37', NULL),
(14, 'Superadmin', 1, 'Has successfully signed in', '2022-12-15 11:56:55', NULL),
(15, 'Superadmin', 1, 'Has successfully signed in', '2022-12-15 11:57:06', NULL),
(16, 'Superadmin', 1, 'Has successfully signed in', '2022-12-15 11:57:46', NULL),
(17, 'Superadmin', 1, 'Has successfully signed in', '2022-12-15 11:58:03', NULL),
(18, 'Superadmin', 1, 'Has successfully signed in', '2022-12-15 11:58:11', NULL),
(19, 'Superadmin', 1, 'Has successfully signed in', '2022-12-15 12:00:11', NULL),
(20, 'Superadmin', 1, 'Has successfully signed in', '2022-12-15 12:00:23', NULL),
(21, 'Superadmin', 1, 'Has successfully signed in', '2022-12-15 12:00:41', NULL),
(22, 'Superadmin', 1, 'Has successfully signed in', '2022-12-15 12:01:05', NULL),
(23, 'Superadmin', 1, 'Has successfully signed in', '2022-12-15 12:01:47', NULL),
(24, 'Superadmin', 1, 'Has successfully signed in', '2022-12-15 12:02:29', NULL),
(25, 'Dean', 1, 'Has successfully signed in', '2022-12-15 12:03:48', NULL),
(26, 'Student', 1, 'Has successfully signed in', '2022-12-15 12:04:02', NULL),
(27, 'Student', 1, 'Has successfully signed in', '2022-12-15 12:12:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `student_id` varchar(145) DEFAULT NULL,
  `first_name` varchar(145) DEFAULT NULL,
  `middle_name` varchar(145) DEFAULT NULL,
  `last_name` varchar(145) DEFAULT NULL,
  `email` varchar(145) DEFAULT NULL,
  `password` varchar(145) DEFAULT NULL,
  `account_status` enum('pending','active','disabled') DEFAULT 'pending',
  `profile` varchar(145) DEFAULT NULL,
  `tokencode` varchar(145) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `student_id`, `first_name`, `middle_name`, `last_name`, `email`, `password`, `account_status`, `profile`, `tokencode`, `created_at`, `updated_at`) VALUES
(1, '201800614', 'andrei', 'manalansan', 'viscayno', 'andrei.m.viscayno@gmail.com', '42f749ade7f9e195bf475f37a44cafcb', 'active', 'profile-2.jpeg', 'da2706da5bb146b3ff19531db9e1d29a', '2022-12-11 03:36:41', '2022-12-15 12:10:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `google_recaptcha_api`
--
ALTER TABLE `google_recaptcha_api`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `smtp`
--
ALTER TABLE `smtp`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`superadmin_id`);

--
-- Indexes for table `system_config`
--
ALTER TABLE `system_config`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `system_logo`
--
ALTER TABLE `system_logo`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tb_logs`
--
ALTER TABLE `tb_logs`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `google_recaptcha_api`
--
ALTER TABLE `google_recaptcha_api`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `smtp`
--
ALTER TABLE `smtp`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `superadmin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `system_config`
--
ALTER TABLE `system_config`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `system_logo`
--
ALTER TABLE `system_logo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_logs`
--
ALTER TABLE `tb_logs`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
