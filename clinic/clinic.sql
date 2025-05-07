-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2025 at 04:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `calories`
--

CREATE TABLE `calories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `weight` float NOT NULL,
  `height` float NOT NULL,
  `activity_level` int(11) NOT NULL,
  `food_calories` int(11) NOT NULL,
  `beverage_calories` int(11) NOT NULL,
  `dessert_calories` int(11) NOT NULL,
  `bmi` float NOT NULL,
  `tdee` float NOT NULL,
  `total_calories` int(11) NOT NULL,
  `bmi_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calories`
--

INSERT INTO `calories` (`id`, `user_id`, `age`, `weight`, `height`, `activity_level`, `food_calories`, `beverage_calories`, `dessert_calories`, `bmi`, `tdee`, `total_calories`, `bmi_date`) VALUES
(1, 1, 25, 70, 170, 1, 250, 150, 300, 24.2215, 1971, 700, '2024-12-27 21:08:31'),
(2, 1, 16, 42, 152, 1, 1000, 200, 800, 18.1787, 1780.62, 2000, '2024-12-27 21:09:39'),
(3, 3, 17, 42, 156, 1, 1000, 450, 300, 17.2584, 1808.12, 1750, '2024-12-31 22:37:53'),
(4, 1, 25, 70, 170, 1, 250, 150, 300, 24.2215, 1971, 700, '2024-12-31 22:53:14'),
(5, 5, 17, 38, 145, 1, 950, 400, 900, 18.0737, 1658.59, 2250, '2025-01-08 10:48:28'),
(6, 1, 25, 70, 170, 1, 250, 150, 300, 24.2215, 1971, 700, '2025-01-08 23:37:24'),
(7, 3, 18, 67, 157, 1, 1100, 250, 500, 27.1816, 2153.59, 1850, '2025-01-09 13:22:55'),
(8, 7, 32, 60, 153, 2, 400, 500, 700, 25.6312, 2171.94, 1600, '2025-01-09 15:06:58'),
(9, 8, 25, 70, 170, 1, 250, 150, 300, 24.2215, 1971, 700, '2025-01-09 15:42:26'),
(10, 8, 17, 55, 170, 2, 500, 200, 300, 19.0311, 2643.56, 1000, '2025-01-09 16:03:05'),
(11, 10, 17, 54, 169, 1, 350, 200, 400, 18.9069, 2084.84, 950, '2025-01-10 10:44:47'),
(12, 10, 17, 54, 169, 2, 250, 250, 300, 18.9069, 2350.19, 800, '2025-01-10 10:51:37');

-- --------------------------------------------------------

--
-- Table structure for table `heart_rate_analysis`
--

CREATE TABLE `heart_rate_analysis` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity_type` varchar(50) NOT NULL,
  `heart_rate` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `tips` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `heart_rate_analysis`
--

INSERT INTO `heart_rate_analysis` (`id`, `user_id`, `activity_type`, `heart_rate`, `age`, `weight`, `feedback`, `tips`, `created_at`) VALUES
(1, 1, 'walking', 67, 16, 42, 'Your heart rate is below the recommended range for your activity. Consider increasing your effort.', 'Try to improve your stamina and increase the intensity of your exercise.', '2024-12-27 07:09:40'),
(2, 1, 'walking', 67, 16, 42, 'Your heart rate is below the recommended range for your activity. Consider increasing your effort.', 'Try to improve your stamina and increase the intensity of your exercise.', '2024-12-27 07:09:43'),
(3, 4, '', 0, 0, 0, 'Your heart rate is below the recommended range for your activity. Consider increasing your effort.', 'Try to improve your stamina and increase the intensity of your exercise.', '2024-12-30 03:59:59'),
(4, 4, '', 0, 0, 0, 'Your heart rate is below the recommended range for your activity. Consider increasing your effort.', 'Try to improve your stamina and increase the intensity of your exercise.', '2024-12-30 04:00:12'),
(5, 4, '', 0, 0, 0, 'Your heart rate is below the recommended range for your activity. Consider increasing your effort.', 'Try to improve your stamina and increase the intensity of your exercise.', '2024-12-30 04:01:50'),
(6, 4, '', 0, 0, 0, 'Your heart rate is below the recommended range for your activity. Consider increasing your effort.', 'Try to improve your stamina and increase the intensity of your exercise.', '2024-12-30 04:02:53'),
(7, 1, '', 0, 0, 0, 'Your heart rate is below the recommended range for your activity. Consider increasing your effort.', 'Try to improve your stamina and increase the intensity of your exercise.', '2024-12-30 04:03:19'),
(8, 1, 'running', 164, 17, 45, 'Your heart rate is within the normal range for your activity. Keep it up!', 'Maintain your pace and continue with your regular activity.', '2024-12-30 04:09:06');

-- --------------------------------------------------------

--
-- Table structure for table `mentaltest`
--

CREATE TABLE `mentaltest` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `total_score` int(11) NOT NULL,
  `need_counseling` varchar(10) NOT NULL,
  `response_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mentaltest`
--

INSERT INTO `mentaltest` (`id`, `user_id`, `name`, `email`, `total_score`, `need_counseling`, `response_date`) VALUES
(1, 1, 'zahirah', 'zaza@gmail.com', 17, 'Tid', '2024-12-27 13:49:22'),
(2, 3, 'jiha', 'httpjiha2510@gmail.com', 32, 'Ya', '2024-12-31 14:35:30'),
(3, 1, 'najihah', 'jiha@gmail.com', 20, 'Tidak', '2024-12-31 15:07:06'),
(4, 1, 'najihah', 'jiha@gmail.com', 20, 'Tidak', '2024-12-31 15:07:06'),
(5, 1, 'najihah', 'jiha@gmail.com', 20, 'Tidak', '2024-12-31 15:10:03'),
(6, 1, 'najihah', 'jiha@gmail.com', 20, 'Tidak', '2024-12-31 15:10:03'),
(7, 1, 'nur', 'thejihah@gmail.com', 34, 'Ya', '2024-12-31 15:23:11'),
(8, 1, 'nur', 'thejihah@gmail.com', 34, 'Ya', '2024-12-31 15:26:25'),
(9, 1, 'nur', 'thejihah@gmail.com', 34, 'Ya', '2024-12-31 15:27:10'),
(10, 1, 'nur', 'thejihah@gmail.com', 34, 'Ya', '2024-12-31 15:27:23'),
(11, 1, 'nur', 'thejihah@gmail.com', 34, 'Ya', '2024-12-31 15:27:41'),
(12, 1, 'nur', 'thejihah@gmail.com', 34, 'Ya', '2024-12-31 15:37:05'),
(13, 1, 'nur zahirah', 'nur@gmail.com', 18, 'Tidak', '2025-01-01 13:21:58'),
(14, 5, 'naz', 'nanaz@gmail.com', 33, 'Ya', '2025-01-08 02:51:49'),
(15, 6, 'naz', 'nanaz@gmail.com', 45, 'Ya', '2025-01-08 14:04:28'),
(16, 1, 'zahirah', 'zaza@gmail.com', 34, 'Yes', '2025-01-08 15:41:00'),
(17, 3, 'najihah', 'jiha@gmail.com', 18, 'No', '2025-01-09 05:24:38'),
(18, 7, 'amna', 'amna@gmail.com', 22, 'Yes', '2025-01-09 07:09:09'),
(19, 8, 'affif', 'affifzuhsiri@gmail.com', 36, 'Yes', '2025-01-09 08:05:30'),
(20, 9, 'adibcute', 'bidor@gmail.com', 43, 'Yes', '2025-01-09 08:12:23'),
(21, 10, 'Nik Hazmi Hakim Bin Nik Hussin', 'hazmihakimnik@gmail.com', 30, 'Yes', '2025-01-10 02:47:09');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `user_id`, `message`, `submitted_at`) VALUES
(4, 1, 'hi\r\n', '2024-12-31 13:37:48'),
(5, 1, 'hi\r\n', '2024-12-31 13:40:07'),
(6, 1, 'hi\r\n', '2024-12-31 13:41:43'),
(7, 1, 'i would like to share my problem.', '2024-12-31 13:42:15'),
(8, 1, 'i would like to share my problem.', '2024-12-31 13:50:13'),
(9, 1, 'i would like to share my problem.', '2024-12-31 13:50:30'),
(10, 3, 'saya tinggi', '2024-12-31 14:32:40'),
(11, 3, 'saya tinggi', '2024-12-31 14:32:59'),
(12, 3, 'i want to eat', '2024-12-31 14:43:41'),
(13, 5, 'THANK YOU FOR BEING DEAD', '2025-01-08 02:49:05'),
(14, 6, 'zah busuk,zah palau aku dia selfish', '2025-01-08 14:05:08'),
(15, 6, 'ooo', '2025-01-08 14:33:36'),
(16, 6, 'AINA MASAM ', '2025-01-08 14:39:37'),
(17, 1, 'woho', '2025-01-08 15:40:30'),
(18, 3, 'i\'m sad', '2025-01-09 05:24:01'),
(19, 9, 'my name is adib, i miss my husband, zafreez i love him so much, i love aidil too<3', '2025-01-09 08:13:48'),
(20, 10, 'Stress coding', '2025-01-10 02:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'zahirah', 'm-9672175@moe-dl.edu.my', '$2y$10$7LpiDVskeobt19hh5jrURuqEP7TR3k16sm85MOr3kL6BUqa2HzBBK'),
(3, 'najihah', 'jiha@gmail.com', '$2y$10$RyHQWV7Nf6f2Abm1Gdis9ebr.KDdKXBF36NuY3a.8UcTOye5SVnRm'),
(4, 'admin', 'admin@gmail.com', '$2y$10$ZLUJwmbRy/4fXVutJa0VBuwgXnW0DTjsmOkECsmP3m.xMDiildvO.'),
(5, 'nanaz', 'nasofea@gmail.com', '$2y$10$6fCp1eU9vkvKE5fwyddpF.cB5uH0OvT1DmO4cNN014rZKL/uYooIu'),
(6, 'mar', 'assyifaattirmizi@gmail.com', '$2y$10$a8RdMnye1l0MM.3X6Q0EMu4fKa4WaEZ3jLNA2xbkr/QpSNB/Le8wW'),
(7, 'amna', 'amna@gmail.com', '$2y$10$ElZc47JSoZWwhuf.AClNQ.xZ8OHyEq87ytp.e35llRKXrFB0Sy6Vq'),
(8, 'zaharah', 'zaharah@gmail.com', '$2y$10$ZMttGpLJyEpX/7HXqXUQbOU0zYS4d5CiPXpgtS9t7kz7K.gshXbia'),
(9, 'adibgay4life', 'adob@gmil.cn', '$2y$10$GCaw7LmuVg3PlptAdEPBF.kQfxgmA.FiUziQBto/8vIiWARZZ6RLa'),
(10, 'jipek', 'hazmihakimnik@gmail.com', '$2y$10$2NYkUkz.nWSiiSnqR6riheZDV6KHRTfXrFTHK.6tECkF3fEcgW/o2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calories`
--
ALTER TABLE `calories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `heart_rate_analysis`
--
ALTER TABLE `heart_rate_analysis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `mentaltest`
--
ALTER TABLE `mentaltest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `calories`
--
ALTER TABLE `calories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `heart_rate_analysis`
--
ALTER TABLE `heart_rate_analysis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mentaltest`
--
ALTER TABLE `mentaltest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calories`
--
ALTER TABLE `calories`
  ADD CONSTRAINT `calories_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `heart_rate_analysis`
--
ALTER TABLE `heart_rate_analysis`
  ADD CONSTRAINT `heart_rate_analysis_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mentaltest`
--
ALTER TABLE `mentaltest`
  ADD CONSTRAINT `mentaltest_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `submissions`
--
ALTER TABLE `submissions`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `submissions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
