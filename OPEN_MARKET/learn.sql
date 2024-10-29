-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29 أكتوبر 2024 الساعة 08:44
-- إصدار الخادم: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learn`
--

-- --------------------------------------------------------

--
-- بنية الجدول `add_objects`
--

CREATE TABLE `add_objects` (
  `object_id` int(11) NOT NULL,
  `object_token` varchar(255) NOT NULL,
  `object_name` varchar(100) NOT NULL,
  `object_price` decimal(10,2) NOT NULL,
  `object_img` varchar(255) DEFAULT NULL,
  `object_info` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `add_objects`
--

INSERT INTO `add_objects` (`object_id`, `object_token`, `object_name`, `object_price`, `object_img`, `object_info`, `created_at`) VALUES
(1, '291024083041548', 'لوفي', 3000000.00, 'hs-167208f21c7b82.png', 'testing', '2024-10-29 07:30:41'),
(2, '2910240831031299', 'anything', 10.00, 'hs-167208f37b1e3f.jpg', '', '2024-10-29 07:31:03');

-- --------------------------------------------------------

--
-- بنية الجدول `signup`
--

CREATE TABLE `signup` (
  `SignUp_id` int(11) NOT NULL,
  `SignUp_token` varchar(255) NOT NULL,
  `SignUp_name` varchar(100) NOT NULL,
  `SignUp_email` varchar(100) NOT NULL,
  `SignUp_pass` varchar(255) NOT NULL,
  `SignUp_skill` text DEFAULT NULL,
  `SignUp_career` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `SignUp_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `signup`
--

INSERT INTO `signup` (`SignUp_id`, `SignUp_token`, `SignUp_name`, `SignUp_email`, `SignUp_pass`, `SignUp_skill`, `SignUp_career`, `created_at`, `SignUp_img`) VALUES
(1, '291024082302574', 'حسين علاء مهدي', 'hussen.alaa1222@gmail.com', '1111', 'html', 'web', '2024-10-29 07:23:02', 'hs-167209127dc2aa.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_objects`
--
ALTER TABLE `add_objects`
  ADD PRIMARY KEY (`object_id`),
  ADD UNIQUE KEY `object_token` (`object_token`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`SignUp_id`),
  ADD UNIQUE KEY `SignUp_token` (`SignUp_token`),
  ADD UNIQUE KEY `SignUp_email` (`SignUp_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_objects`
--
ALTER TABLE `add_objects`
  MODIFY `object_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `SignUp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
