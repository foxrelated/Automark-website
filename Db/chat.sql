-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2018 at 07:07 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `automark`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(10) UNSIGNED NOT NULL,
  `from` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `to` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `message` text COLLATE utf8_bin NOT NULL,
  `sent` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recd` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `from`, `to`, `message`, `sent`, `recd`) VALUES
(1, 'Abdulaziz', 'Abdulaziz', 'fsd', '2017-12-31 13:07:40', 1),
(2, 'Abdulaziz', 'Abdulaziz', 'Ø³Ù„Ø§Ù…', '2017-12-31 15:28:07', 1),
(3, 'admin', 'Abdulaziz', 'ihd', '2017-12-31 15:41:38', 1),
(4, 'admin', 'Abdulaziz', 'df', '2017-12-31 15:44:49', 1),
(5, 'admin', 'admin', 'sfdfsd', '2017-12-31 15:45:03', 0),
(6, 'admin', 'admin', 'fsdf', '2017-12-31 15:45:05', 0),
(7, 'admin', 'admin', 'sdf', '2017-12-31 15:45:06', 0),
(8, 'admin', 'admin', 'sdf', '2017-12-31 15:45:07', 0),
(9, 'admin', 'admin', 'dfsdf', '2017-12-31 15:45:08', 0),
(10, 'admin', 'admin', 'fsdfsdf', '2017-12-31 15:45:09', 0),
(11, 'admin', 'admin', 'sdf', '2017-12-31 15:45:10', 0),
(12, 'admin', 'admin', 'df', '2017-12-31 15:45:11', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
