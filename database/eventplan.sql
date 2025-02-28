-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2025 at 02:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventplan`
--

-- --------------------------------------------------------

--
-- Table structure for table `eventplan`
--

CREATE TABLE `eventplan` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eventplan`
--

INSERT INTO `eventplan` (`id`, `title`, `description`, `status`, `start_date`, `end_date`) VALUES
(12, 'learn', 'learn', 1, '2025-02-27 07:57:00', '2025-02-28 07:57:00'),
(14, 'Sample Event', 'This is a sample event description.jhfgdtfgc', 0, '2025-02-28 01:23:00', '2025-03-01 01:23:00'),
(15, 'learn', 'learn', 0, '2025-02-27 07:57:00', '2025-02-28 07:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password_hash`, `createdate`) VALUES
(1, 'cyppy249', 'donylcyprus@gmail.com', '$2y$10$abEjZR2qDE2/TBdCuGL8UuQrj0QINxbnq3f0sGI29S9yORpTscAey', '2025-02-26 12:03:48'),
(4, 'fsdgvsdav', 'kcoretico@gmail.com', '$2y$10$vWd.GBPz27KO/ORvXyHUaO48E9lQlU2RMdCnDben7OH2KLXFDDi2K', '2025-02-27 07:37:42'),
(5, '5rfwe', 'incio@gmail.com', '$2y$10$DyYVO15ggueFFINdtX5V0..mZwXreEgxGBSjmvHTyJ8XmSfc39SvS', '2025-02-27 08:24:52'),
(6, 'red', 'red@gmail.com', '$2y$10$uKiCK6LangrpJh5mnLkbnOuczm2Ht4WqhVKBtrol0UeYB/RfNBBn2', '2025-02-27 08:41:18'),
(7, 'cyppy', 'cyp@gmail.com', '$2y$10$a2zJZE/lh7Fnednnwch3e.tfoVb.7B6gQrG6MqFIZGrODfPZZDwTa', '2025-02-27 10:48:10'),
(8, 'cyp', 'cypc2@gmail.com', '$2y$10$fq99NmoytmwQGjhxWSUvX.cOWRq9BKUxNgBZo0oEDgRY3KN9emiiK', '2025-02-27 11:36:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eventplan`
--
ALTER TABLE `eventplan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eventplan`
--
ALTER TABLE `eventplan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
