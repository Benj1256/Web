-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 28, 2024 at 05:25 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `UserID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Username`, `Password`, `Email`, `UserID`) VALUES
('Benjamin', 'stevepatrick', 'ben.falode@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int UNSIGNED NOT NULL,
  `problem` varchar(30) NOT NULL,
  `device_model` varchar(30) NOT NULL,
  `device_os` varchar(50) NOT NULL,
  `user` varchar(30) NOT NULL,
  `ticket_id` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `problem`, `device_model`, `device_os`, `user`, `ticket_id`) VALUES
(3, 'Screen cracked', 'android', 'andorid', 'Guest', NULL),
(4, 'Battery draining too fast', 'sdas', 'dsd', 'Guest', NULL),
(5, 'Device not turning on', 'sdas', 'dsd', 'Guest', NULL),
(6, '', 'cdsds', 'sdsd', 'Guest', NULL),
(7, '', 'cdsds', 'sdsd', 'Guest', NULL),
(8, '', 'nj', 'kmk', 'Guest', NULL),
(9, 'Cracked Screen', 'android', 'magiea', 'Guest', NULL),
(10, 'USB Fixing', 'os', 'os', 'Guest', NULL),
(11, 'Boot loop', 'android', 'os', 'Guest', NULL),
(12, 'Battery Replace', 'skdvk', 'kcma', 'Guest', NULL),
(13, 'Cracked Screen', 'eakjfn', 'kdfn', 'Guest', NULL),
(14, 'Battery Replace', 'samsung', 'android', 'Guest', NULL),
(15, 'Battery Replace', 'Stuff', 'extra STuff', 'Guest', NULL),
(16, 'Water Damage', 'cdsds', 'hugh', 'Benja', NULL),
(17, 'Water Damage', 'asw', 'sds', 'Benja', NULL),
(18, 'Boot loop', 'android', 'sadda', 'Guest', NULL),
(19, 'USB Fixing', 'android', 'sadda', 'Benja', NULL),
(20, 'Water Damage', 'android', 'sadda', 'Benja', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int UNSIGNED NOT NULL,
  `status_name` varchar(30) NOT NULL,
  `status_description` varchar(30) NOT NULL,
  `ticket_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int UNSIGNED NOT NULL,
  `uniqueNo` varchar(30) NOT NULL,
  `TDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `uniqueNo`, `TDate`) VALUES
(1, 'pZhadIkh', '2024-04-27'),
(2, '7RTzLmd5', '2024-04-27'),
(3, 'WvfLObAW', '2024-04-28'),
(4, 'mlDVfDEp', '2024-04-28'),
(5, 'juVPAGn7', '2024-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `service_id` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `age`, `location`, `service_id`) VALUES
(35, 'Benja', 'Falode', 'Ben.F@gmail.com', 15, 'Dublin', NULL),
(38, 'hello', 'work', 'hello@myut.ie', 13, 'ireland', NULL),
(39, 'make', 'me', 'make@gma.ie', 32, '93', NULL),
(40, 'make', 'me', 'make@gma.ie', 32, '93', NULL),
(41, 'Ben', 'Falode', 'Ben.F@gmail.com', 342, 'USA', NULL),
(42, 'peter', 'adam', 'peter@adam.ie', 24, 'Dublin', NULL),
(43, 'mach', 'mach', 'mach@gmail.com', 12, 'Steve', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_service_ticket1_idx` (`ticket_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`),
  ADD KEY `fk_status_ticket1_idx` (`ticket_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_service_idx` (`service_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `fk_service_ticket1` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`);

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `fk_status_ticket1` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_service` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
