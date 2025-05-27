-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2024 at 10:35 AM
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
-- Database: `voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `photo` varchar(255) NOT NULL,
  `role` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `votes` int(100) NOT NULL,
  `voting_status` int(1) NOT NULL DEFAULT 1,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `dob`, `photo`, `role`, `status`, `votes`) VALUES
(5, 'sidtest', 'test@gmail.com', 'test', '2001-12-11', 'profile-icon.png', 2, 1, 0),
(6, 'candidatetest', 'test@gmail.com', 'test', '1111-12-21', 'profile-avatar-account-icon-16699.png', 3, 0, 1),
(7, 'sidtest2', 'test@gmail.com', 'test', '1212-12-22', '966-9665493_my-profile-icon-blank-profile-image-circle.png', 2, 1, 0),
(8, 'candidatetest2', 'test@gmail.com', 'test', '2111-02-22', '78-786293_1240-x-1240-0-avatar-profile-icon-png.png', 3, 0, 3),
(9, 'candidatetest3', 'test@gmail.com', 'test', '1999-12-22', 'female-avatar-profile-icon-round-woman-face-vector-18307274.jpg', 3, 0, 0),
(10, 'sidtest3', 'test@gmail.com', 'test', '1999-12-02', '966-9665493_my-profile-icon-blank-profile-image-circle.png', 2, 1, 0),
(11, 'sidtest4', 'test@gmail.com', 'test', '1998-12-02', 'profile-icon.png', 2, 1, 0),
(12, 'candidatetest4', 'test@gmail.com', 'test', '2000-12-01', 'profile-icon.png', 3, 0, 1),
(13, 'sidtest5', 'test@gmail.com', 'test', '2222-12-21', 'female-avatar-profile-icon-round-woman-face-vector-18307274.jpg', 2, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
