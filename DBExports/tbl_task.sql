-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2024 at 03:42 PM
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
-- Database: `mysql`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_task`
--

CREATE TABLE `tbl_task` (
  `id` int(11) NOT NULL,
  `car` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(20) NOT NULL,
  `status` text NOT NULL,
  `created` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_task`
--

INSERT INTO `tbl_task` (`id`, `car`, `description`, `category`, `status`, `created`) VALUES
(18, 'Both', 'Test Task Both Mechanics', 'Mechanics', 'New', '15:38:14 22/07/2024'),
(19, 'Car03', 'Test Task Car 03 Mechanic ', 'Mechanics', 'New', '15:38:52 22/07/2024'),
(20, 'Car33', 'Test Task Car33 Mechanics', 'Mechanics', 'New', '15:39:05 22/07/2024'),
(21, 'Both', 'Test Task Both Sys', 'Systems', 'New', '15:43:47 22/07/2024'),
(22, 'Car03', 'Test Task Car 03 Sys', 'Systems', 'New', '15:43:57 22/07/2024'),
(23, 'Car33', 'Test Task Car 33 Sys', 'Systems', 'New', '15:44:08 22/07/2024'),
(24, 'Both', 'Test Task - Done', 'Mechanics', 'Done', '17:59:55 22/07/2024'),
(25, 'Car03', 'Test task 03 ', 'Mechanics', 'New', '16:38:44 23/07/2024'),
(26, 'Car03', 'Test Task 01 both new', 'Mechanics', 'New', '16:39:05 23/07/2024'),
(27, 'Car03', 'Test Task 01', 'Mechanics', 'New', '16:46:20 23/07/2024'),
(28, 'Car03', 'Test task ex', 'Mechanics', 'New', '16:59:53 23/07/2024'),
(29, 'Car03', 'Test task ex both', 'Mechanics', 'New', '17:00:00 23/07/2024'),
(30, 'Both', 'Test task ex both', 'Mechanics', 'New', '17:00:00 23/07/2024'),
(31, 'Car03', 'Test Task 01 - Both', 'Mechanics', 'New', '11:49:29 29/07/2024'),
(32, 'Both', 'Test Task 01 - Both', 'Mechanics', 'New', '11:49:29 29/07/2024');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_task`
--
ALTER TABLE `tbl_task`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_task`
--
ALTER TABLE `tbl_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
