-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2022 at 11:38 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xyz_company`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '$2y$10$T19Y4BNggGKh.QCLnYoMzeIdnkCbVAGIyOlNOfBeSJMJRKdrbdGNi');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `amount` float NOT NULL,
  `category` int(11) NOT NULL,
  `fee` float NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `trans_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `sender`, `receiver`, `amount`, `category`, `fee`, `status`, `trans_date`) VALUES
(1, 4, 1, 4556, 1, 0, 1, '2022-07-22'),
(2, 4, 1, 4556, 1, 0, 1, '2022-07-22'),
(3, 4, 1, 34, 1, 0, 1, '2022-07-22'),
(4, 4, 1, 34, 1, 0, 0, '2022-07-22'),
(5, 4, 1, 34, 1, 0, 1, '2022-07-22'),
(6, 4, 3, 10, 1, 0, 1, '2022-07-22'),
(7, 4, 3, 43, 1, 0, 1, '2022-07-22'),
(8, 4, 3, 10005, 2, 200, 1, '2022-07-22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `bonus` int(11) NOT NULL,
  `balance` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `register_date`, `bonus`, `balance`) VALUES
(1, 'Brad Traversy', 'brad@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2017-04-10 13:14:31', 0, 34),
(2, 'John Doe', 'jdoe@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2017-04-10 14:12:14', 0, 84),
(3, 'claire', 'claire5@gmail.com', '$2y$10$TWxtC8apr1u0RBcx0OlVn.IskdXRKhREMbUO6Dd9Csd5lhJb1Q2ye', '2022-07-22 09:30:25', 0, 10058),
(4, 'clemence', 'claire@gmail.com', '$2y$10$r.ZPy9PhhaWw790QQY81IOkVcBXV.8LcQypMU9f8EQY3w87Ukv/GO', '2022-07-22 09:36:04', 1000, 11484);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
