-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Jun 04, 2024 at 06:01 PM
-- Server version: 5.7.44
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `post_id`, `created_at`) VALUES
(1, 19, 4, '2024-06-04 17:49:28'),
(4, 19, 11, '2024-06-04 18:00:29');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`user_id`, `friend_id`) VALUES
(1, 2),
(1, 4),
(1, 7),
(5, 3),
(5, 2),
(5, 4),
(5, 6),
(15, 3),
(15, 2),
(19, 18),
(19, 20);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image_path` varchar(255) DEFAULT NULL  -- Dodana kolumna `image_path`
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `user_id`, `created_at`, `image_path`) VALUES
(1, 'Tytu 1', 'Zawarto 1', 0, '2024-05-28 13:51:10', NULL),
(2, 'Tytu 2', 'Zawarto 2', 0, '2024-05-28 13:51:10', NULL),
(3, 'Tytu 3', 'Zawarto 3', 0, '2024-05-28 13:51:10', NULL),
(4, 'Tytu 4', 'Zawarto 4', 5, '2024-05-28 13:51:10', NULL),
(5, 'Tytu 5', 'Zawarto 5', 0, '2024-05-28 13:51:10', NULL),
(6, 'Tytu 6', 'Zawarto 6', 0, '2024-05-28 13:51:10', NULL),
(7, 'Tytu 7', 'Zawarto 7', 0, '2024-05-28 13:51:10', NULL),
(8, 'Tytu 8', 'Zawarto 8', 0, '2024-05-28 13:51:10', NULL),
(9, 'Tytu 9', 'Zawarto 9', 1, '2024-05-28 13:51:10', NULL),
(10, 'Tytu 10', 'Zawarto 10', 19, '2024-05-28 13:51:10', NULL),
(11, 'Tytu 11', 'Zawarto 11', 0, '2024-05-28 13:51:10', NULL),
(12, 'Tytu 12', 'Zawarto 12', 0, '2024-05-28 13:51:10', NULL),
(13, 'Tytu 13', 'Zawarto 13', 0, '2024-05-28 13:51:10', NULL),
(14, 'Tytu 14', 'Zawarto 14', 0, '2024-05-28 13:51:10', NULL),
(15, 'Tytu 15', 'Zawarto 15', 4, '2024-05-28 13:51:10', NULL),
(16, 'Tytu 16', 'Zawarto 16', 0, '2024-05-28 13:51:10', NULL),
(17, 'Tytu 17', 'Zawarto 17', 0, '2024-05-28 13:51:10', NULL),
(18, 'Tytu 18', 'Zawarto 18', 0, '2024-05-28 13:51:10', NULL),
(19, 'Tytu 19', 'Zawarto 19', 0, '2024-05-28 13:51:10', NULL),
(20, 'Tytu 20', 'Zawarto 20', 0, '2024-05-28 13:51:10', NULL),
(21, 'Tytu 21', 'Zawarto 21', 0, '2024-05-28 13:51:10', NULL),
(22, NULL, '123', 5, '2024-06-03 18:31:21', NULL),
(23, '123', '123', 5, '2024-06-03 18:32:13', NULL),
(24, NULL, '123', 15, '2024-06-03 20:05:04', NULL),
(25, NULL, '123', 19, '2024-06-04 17:19:21', NULL),
(26, NULL, 'hkj', 19, '2024-06-04 17:39:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(18, 'mrobak', 'mrobak@gmail.com', '$2y$10$KTyXZVNPV8oDbypWyURffedTPpA6ExCsy99W0PLoXFChHmMOl4Jhu', '2024-06-04 16:05:21'),
(19, 'admin1', 'admin@admin.pl', '$2y$10$dRJhzEYDx8LxNFm2MDXNvOI6Z9p1TEFMhmlIWta4cTH3MZA7bWlga', '2024-06-04 17:10:49'),
(20, 'test', 'test', 'test', '2024-06-04 17:20:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
