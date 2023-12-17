-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 05:34 PM
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
(1, 'THINKING FAST AND SLOW', 'non-fiction', 'DANIEL KAHNEMAN'),
(2, 'THE KNOWLEDGE GAP by NATALIE WEXLER', 'society and culture—education', 'NATALIE WEXLER'),
(3, 'THE LIGHTNING THIEF by RICK RIORDAN', 'fantasy fiction', 'RICK RIORDAN'),
(4, 'THINKING LIKE A LAWYER by COLIN SEALE', 'education', 'COLIN SEALE'),
(5, 'HOW CHILDREN SUCCEED by PAUL TOUGH', 'self-help book', 'PAUL TOUGH'),
(6, 'HARRY POTTER AND THE SORCERERS STONE by J.K ROWLING', 'fantansy fiction', 'J.K ROWLING'),
(7, 'THE POWER OF HABIT by CHARLES DUHIGG', 'self-help book', ' CHARLES DUHIGG'),
(8, 'START HERE START NOW by LIZ KLEINROCK', 'education', 'LIZ KLEINROCK');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `checkoutID` int(255) NOT NULL,
  `bookID` int(255) NOT NULL,
  `user_id` int(100) NOT NULL,
  `checkout_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`checkoutID`, `bookID`, `user_id`, `checkout_date`) VALUES
(1, 1, 26, '2023-12-17'),
(2, 3, 26, '2023-12-17'),
(3, 2, 26, '2023-12-17'),
(4, 4, 26, '2023-12-17'),
(5, 5, 26, '2023-12-17'),
(6, 6, 26, '2023-12-17'),
(7, 7, 26, '2023-12-17'),
(8, 8, 26, '2023-12-17');

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
(24, 'jaderaposa@yahoo.com', '$2y$10$8f8TaNkyMeDhy17/VEkeYOcRJjs6iE9F76yKTiAHcCXzmV5BOS6bq', 'admin', 'Moderate'),
(25, 'jaduya678@gmail.com', '$2y$10$YYQ5TedE6a82rfbH7RgU9uR7UVNvazQ4eWxN668HelU3ud5obzYM6', 'student', 'Moderate'),
(26, 'glaizamillete@gmail.com', '$2y$10$NK7lWM4nKuGIUoFNSKYtvuYx3g7VRbvqPj09rfVutxrmyUOliAARq', 'student', 'Strong'),
(27, 'adminGlaiza@gmail.com', '$2y$10$8bJPONgEqQC3mah3TQsYTeBLV6RywYQbQADJjs4aMqC5fhmBfN89u', 'admin', 'Moderate');

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
  ADD KEY `bookID` (`bookID`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `bookID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `checkoutID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
