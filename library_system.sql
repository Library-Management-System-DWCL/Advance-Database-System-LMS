-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 07:15 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookID` int(255) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookID`, `book_name`, `genre`, `author`) VALUES
(1, 'THINKING FAST AND SLOW', 'non-fiction', 'DANIEL KAHNEMAN');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `checkoutID` int(255) NOT NULL,
  `bookID` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `checkout_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_access` varchar(255) NOT NULL,
  `password_strength` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `user_access`, `password_strength`) VALUES
(12, 'noah@gmail.com', '$2y$10$f0uSKMqfIJPEV1A9X/UKSe15lJMP4r8fhAoZP4LyXuzX9popKKUMK', 'admin', 'Moderate'),
(13, 'pakboy@gmail.com', '$2y$10$IZ3.475UUL5Bo1SfreQmSOz/IFvv30Xr.MRZcgQgOa9qLQfafEmqq', 'student', 'Strong'),
(14, 'noah123@gmail.com', '$2y$10$cvOVmIYliKg462Bb.8/JUO0yZDjxOnTQqjXiKWMVecRz4ieJ9G9ty', 'admin', 'Strong'),
(15, 'hayven@gmail.com', '$2y$10$1sWJR.4AYlASYQ0JMI58..YJI5kYmjJP7q4g6SKe2Ji7EhN7ygmv2', 'student', 'Strong'),
(16, 'reben@gmail.com', '$2y$10$ufEPf5qUUESx7RtygsVfK.vyNHhamQJGg5cQH/vMzaMRkRj3DsFTm', 'student', 'Strong'),
(17, 'arieta@gmail.com', '$2y$10$J9HoViDOP9sxC6juX8W8Oe9Fl61psMedCV1dedBnw8YkCGykgF72q', 'student', 'Strong'),
(19, 'mamshai', '$2y$10$JTDpz.bHMqyWuRXtqL17E.N5D6AzOsyxL79yryBswmZsawuLSmfxq', 'student', 'Moderate'),
(20, 'masid', '$2y$10$SlH.8t..yLHcrl4B6LKRcuFychCDUdzKBd4.gZchTU93XSNHzwdg6', 'student', 'Strong'),
(21, 'dado@gmail.com', '$2y$10$3JV0ZKqQoXJnOeVMrWUY/upZKSHBqqnqR79Q7gerVaNp0igJCetSW', 'student', 'Strong'),
(22, 'dado123@gmail.com', '$2y$10$FOVDGj2Cuf0/a0kf/pZtJeu6BtEwtfe2QiNGS7GB85jVVFEXzFQYq', 'student', 'Strong'),
(23, 'admin123', '$2y$10$urzDOsxbl1lT9EASTPbWp.MeifU66IcPV4CWohjofcogLFco76zxW', 'admin', 'Strong');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookID`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`checkoutID`),
  ADD KEY `bookID` (`bookID`,`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `checkoutID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
