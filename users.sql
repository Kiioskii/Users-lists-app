-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Apr 03, 2023 at 08:42 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nick` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nick`, `password`, `name`, `surname`, `birthday`) VALUES
(38, 'jsmith', 'abc123', 'John', 'Smith', '2023-04-13'),
(39, 'kturner', 'p@ssw0rd', 'Karen', 'Turner', '2023-03-27'),
(40, 'rdiaz', 'sunflower', 'Roberto', 'Diaz', '2023-04-05'),
(41, 'mharris', 'qwerty123', 'Michelle', 'Harris', '2023-04-11'),
(42, 'jcooper', 'mydogroxy', 'Jessica', 'Cooper', '2023-04-19'),
(43, 'fcastillo', 'football22', 'Fernando', 'Castillo', '2023-04-05'),
(44, 'dpham', 'coffeeaddict', 'David', 'Pham', '2023-04-04'),
(45, 'tlee', 'ilovecats', 'Tina', 'Lee', '2023-03-31'),
(46, 'bjohnson', 'springtime1', 'Brian', 'Brian', '2023-04-01'),
(47, 'mrodriguez', 'baseball99', 'Maria', 'Maria', '2023-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `user_lists`
--

CREATE TABLE `user_lists` (
  `id` int(11) NOT NULL,
  `list_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_lists`
--

INSERT INTO `user_lists` (`id`, `list_name`) VALUES
(9, 'First'),
(10, 'Home'),
(11, 'Pracownicy'),
(12, 'Ulubieni');

-- --------------------------------------------------------

--
-- Table structure for table `user_list_members`
--

CREATE TABLE `user_list_members` (
  `list_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_list_members`
--

INSERT INTO `user_list_members` (`list_id`, `user_id`) VALUES
(9, 40),
(9, 41),
(9, 42),
(9, 43),
(10, 38),
(10, 39),
(10, 40),
(10, 41),
(11, 44),
(11, 45),
(11, 46),
(11, 47),
(12, 38),
(12, 39),
(12, 40),
(12, 41),
(12, 42),
(12, 43),
(12, 44),
(12, 45),
(12, 46),
(12, 47);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_lists`
--
ALTER TABLE `user_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_list_members`
--
ALTER TABLE `user_list_members`
  ADD PRIMARY KEY (`list_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `user_lists`
--
ALTER TABLE `user_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_list_members`
--
ALTER TABLE `user_list_members`
  ADD CONSTRAINT `user_list_members_ibfk_1` FOREIGN KEY (`list_id`) REFERENCES `user_lists` (`id`),
  ADD CONSTRAINT `user_list_members_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
