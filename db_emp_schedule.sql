-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2020 at 08:57 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_emp_schedule`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp_user`
--

CREATE TABLE `emp_user` (
  `id` bigint(20) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_user`
--

INSERT INTO `emp_user` (`id`, `emp_id`, `username`, `password`, `email`, `updated_at`, `created_at`) VALUES
(1, 17878001, 'ezio', '59a2a76f1b8f7facdf64bdfe02ea268d72b250ff', 'ezio01@gmail.com', '2020-05-25 06:52:16', '0000-00-00 00:00:00'),
(3, 17878002, 'eko', 'b0064cbe91abb507f40ef8eccf648371af3ef468', 'eko@gmail.com', '2020-05-24 13:50:02', '2020-05-20 22:55:32'),
(6, 17878003, 'brian', 'e60cf1a7762662c06fb6e227a3d0fff63937521e', 'briansyd@gmail.com', '2020-05-24 13:50:02', '2020-05-24 09:23:40');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_emp`
--

CREATE TABLE `tb_emp` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_emp`
--

INSERT INTO `tb_emp` (`id`, `user_id`, `name`, `position`, `age`, `address`, `updated_at`, `created_at`) VALUES
(1, 1, 'Ezio Auditore', 'Programmer', 23, 'Jl.A.Yani RT-01 RW-03', '2020-05-25 06:04:18', '0000-00-00 00:00:00'),
(2, 3, 'eko setyo', 'Sr.Programmer', 21, 'Balikpapan', '2020-05-24 12:52:33', '2020-05-20 22:59:19'),
(3, 6, 'Brian Sayudha', 'Programmer', 21, 'Sawojajar', '2020-05-24 12:48:00', '2020-05-24 09:23:40');

-- --------------------------------------------------------

--
-- Table structure for table `tb_emp_sch`
--

CREATE TABLE `tb_emp_sch` (
  `user_id` bigint(20) NOT NULL,
  `id` int(11) NOT NULL,
  `entry_hour` time NOT NULL,
  `out_hour` time NOT NULL,
  `day` varchar(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_emp_sch`
--

INSERT INTO `tb_emp_sch` (`user_id`, `id`, `entry_hour`, `out_hour`, `day`, `updated_at`, `created_at`) VALUES
(1, 2, '09:00:00', '17:00:00', 'monday', '2020-05-21 05:47:33', '0000-00-00 00:00:00'),
(1, 29, '08:00:00', '16:00:00', 'tuesday', '2020-05-22 06:49:19', '2020-05-22 06:25:10'),
(3, 30, '08:00:00', '17:00:00', 'monday', '2020-05-24 08:56:14', '2020-05-24 08:56:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Arga', 'argadiaz@gmail.com', NULL, '$2y$10$0DcZcZxVp3sgjDCwdIRWUenJc3amnaZfLFiSzafbh.SnOcjOaRMjm', NULL, '2020-05-16 22:42:22', '2020-05-16 22:42:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp_user`
--
ALTER TABLE `emp_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_emp`
--
ALTER TABLE `tb_emp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_emp_sch`
--
ALTER TABLE `tb_emp_sch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp_user`
--
ALTER TABLE `emp_user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_emp`
--
ALTER TABLE `tb_emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_emp_sch`
--
ALTER TABLE `tb_emp_sch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_emp`
--
ALTER TABLE `tb_emp`
  ADD CONSTRAINT `tb_emp_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `emp_user` (`id`);

--
-- Constraints for table `tb_emp_sch`
--
ALTER TABLE `tb_emp_sch`
  ADD CONSTRAINT `tb_emp_sch_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `emp_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
