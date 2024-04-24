-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2023 at 01:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sqaure`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `subject` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `subject`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'john123', 'cxxxcxc', 'admin@gmail.com', 'xcxcxcxc', '2023-08-29 09:08:36', '2023-08-29 09:08:36'),
(2, 'john', 'dfdsf', 'admzin@mail.com', 'sddfs', '2023-08-29 09:33:59', '2023-08-29 09:33:59'),
(3, 'john', 'weeeee', 'johns@gmail.com', 'sdasd', '2023-08-29 09:36:49', '2023-08-29 09:36:49'),
(4, 'john', 'vbbn', 'adminbv@gmail.com', 'vbn', '2023-08-29 09:37:57', '2023-08-29 09:37:57'),
(5, 'user1', 'xyz', 'user1@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-08-29 09:39:31', '2023-08-29 09:39:31'),
(6, 'user 2', 'user 2', 'user2@gmail.com', 'sds', '2023-08-29 09:41:14', '2023-08-29 09:41:14'),
(7, 'john', 'weeeee', 'asd@mail.com', 'sadsad', '2023-08-29 10:04:53', '2023-08-29 10:04:53'),
(8, 'user3', 'user3', 'user3@gmail.com', 'user3', '2023-08-30 02:18:24', '2023-08-30 02:18:24'),
(9, 'user4', 'user4', 'user3@gmail.com', 'user4', '2023-08-30 02:18:53', '2023-08-30 02:18:53'),
(10, 'user4', 'user4', 'user4@gmail.com', 'user4', '2023-08-30 02:20:26', '2023-08-30 02:20:26'),
(11, 'user5', 'user5', 'user5@gmail.com', 'user5', '2023-08-30 02:21:18', '2023-08-30 02:21:18'),
(12, 'user6', 'user6', 'user6@gmail.com', 'user6', '2023-08-30 03:01:03', '2023-08-30 03:01:03'),
(13, 'john', 'john', 'john@gmail.com', 'john', '2023-08-30 08:28:26', '2023-08-30 08:28:26'),
(14, 'Micheal Hons', 'Subject', 'hons@gmail.com', 'Message', '2023-08-31 02:52:38', '2023-08-31 02:52:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(55) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `alias` varchar(5) NOT NULL,
  `hashtag` varchar(255) DEFAULT NULL,
  `payment_type` int(3) NOT NULL COMMENT '1: Cashapp, 2: Venmo, 3: Paypal',
  `email` varchar(55) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `password` varchar(555) NOT NULL,
  `user_role` int(1) NOT NULL,
  `status` int(11) DEFAULT 1 COMMENT '1=Active,0=Inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `number`, `alias`, `hashtag`, `payment_type`, `email`, `avatar`, `password`, `user_role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, '', NULL, 0, 'admin@mail.com', NULL, '$2y$10$eBzm3cEsbRSf2djUAs1P2eyT.yQlWP3XJQb737CalCQoTsdTbRvja', 1, 1, '2021-06-16 21:48:41', '2021-09-13 15:12:37'),
(16, 'Martin', '123', 'Modi', 'Ad consequatur simil', 2, 'martingarix7878@gmail.com', NULL, '$2y$10$QQoj0zhvx4soAd53KoIq8.ucULyFroGhLAPy0JIY8zzHmiVLYjxTe', 2, 1, '2023-08-25 02:34:45', '2023-08-25 02:34:45'),
(17, 'Tamara Grant', '4', 'Qui', 'In cillum vero dolor', 1, 'cyfa@mailinator.com', NULL, '$2y$10$Z1PNBfniDsmpj4M4Slx0lu3jqaTwMDsAtvBdZkC.YRnoSHeo1FAPa', 2, 1, '2023-08-25 07:57:35', '2023-08-25 07:57:35'),
(18, 'john', '121212121212', 'ab12', '#1234', 3, 'john@gmail.com', NULL, '$2y$10$FeegQMiJ7L90RkomEHm2dexkqGXCIMfV1mlIK5J8aPLiuJLyjlPu2', 2, 1, '2023-08-28 03:16:19', '2023-08-28 03:16:19'),
(19, 'john', '12121212', 'ab1u', '#123445454', 3, 'joh1n@gmail.com', NULL, '$2y$10$o8KnzfmRjs1trPFKSkitae7iTgXNBq11h2.k6MD7c56KdfR2osXdu', 2, 1, '2023-08-30 09:56:43', '2023-08-30 09:56:43'),
(20, 'Micheal Hons', '123456789', 'mb12', '#1234m', 2, 'hons@mail.com', NULL, '$2y$10$H1cABmoarTaTC1eBlPxBOeUzj9fCFYKiHWPXvUn399grVPP.OV7EC', 2, 1, '2023-08-31 04:19:05', '2023-08-31 04:19:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
