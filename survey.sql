-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 09, 2021 at 09:30 AM
-- Server version: 8.0.27-0ubuntu0.20.04.1
-- PHP Version: 7.4.26
CREATE DATABASE IF NOT EXISTS `survey`;
USE `survey`;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `student_class` varchar(15) NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`student_class`, `id`) VALUES
('Basic 7', 1),
('Basic 8', 2),
('Basic 9', 3),
('SSS 1', 4),
('SSS 2', 5),
('SSS 3', 6);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int NOT NULL,
  `question_tab` varchar(200) NOT NULL,
  `targets_id` int DEFAULT NULL,
  `classes_id` int DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_tab`, `targets_id`, `classes_id`, `date_created`, `date_updated`) VALUES
(1, 'is html easy to learn?', 1, 1, '2021-11-12 12:35:07', NULL),
(2, 'who is the ceo of google', 1, 1, '2021-11-12 12:40:48', NULL),
(3, 'gsdfjksdfsdjkfsdjhdsjfjkdfjkdfdsdddf', 1, 1, '2021-11-12 12:35:07', NULL),
(4, 'who is the ceo of facebook', 1, 3, '2021-11-12 12:40:36', NULL),
(5, 'who is google ceo', 1, 2, '2021-11-12 12:37:50', '2021-11-16 15:17:15'),
(6, 'sdxdasdasdasdasd', 1, 2, '2021-11-12 12:37:50', NULL),
(7, 'fcgdgrcfdxbf', 1, 2, '2021-11-12 12:37:50', NULL),
(8, 'sdxdasdasdasdasd', 1, 2, '2021-11-12 12:37:50', NULL),
(9, 'do you understand the concept of oop?', 1, 4, '2021-11-12 12:38:39', NULL),
(10, 'sdsdsdasdas', 1, 4, '2021-11-12 12:38:39', NULL),
(11, 'what is ur name', 2, NULL, '2021-11-15 18:22:50', NULL),
(12, 'please sing for me', 2, NULL, '2021-11-15 18:22:50', NULL),
(13, 'jhfjgjkugjkjkh', 2, NULL, '2021-11-15 18:22:50', NULL),
(14, 'please dance for me', 2, NULL, '2021-11-15 18:22:50', NULL),
(15, 'asdfsdfsfsdfcsdfsd', 2, NULL, '2021-11-15 18:23:42', NULL),
(16, 'zxcxvscsdfcsdcdfedwcsafwed', 2, NULL, '2021-11-15 18:23:42', NULL),
(17, 'asdfsdfsfsdfcsdfsd', 2, NULL, '2021-11-15 18:23:42', NULL),
(18, 'zxcxvscsdfcsdcdfedwcsafwed', 2, NULL, '2021-11-15 18:23:42', NULL),
(19, 'is html easy to learn', 2, 1, NULL, NULL),
(20, 'qwertyrtr', 1, 2, NULL, NULL),
(21, 'goodere', 2, 2, NULL, NULL),
(23, 'erweweffsd', 2, 2, NULL, NULL),
(24, 'errsdfsdfsd', 1, 1, NULL, NULL),
(25, 'qwere', 1, 3, NULL, NULL),
(26, 'dfewrdfs', 1, 5, NULL, NULL),
(27, 'question1', 1, 4, NULL, NULL),
(28, 'question3', 1, 6, NULL, NULL),
(29, 'question4', 1, 5, NULL, NULL),
(30, 'question1', 1, 4, NULL, NULL),
(31, 'question3', 1, 6, NULL, NULL),
(32, 'question4', 1, 5, NULL, NULL),
(33, 'OOP is better than procedurial programming?', 1, 5, '2021-11-16 12:32:28', NULL),
(34, 'html is the best thing to learn while starting programming?', 1, 5, '2021-11-16 12:32:28', NULL),
(35, 'question4', 1, 5, '2021-11-16 12:32:28', NULL),
(36, 'question1', 1, 4, '2021-11-16 12:32:51', NULL),
(37, 'question3', 1, 6, '2021-11-16 12:32:51', NULL),
(38, 'question4', 1, 5, '2021-11-16 12:32:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE `responses` (
  `id` int NOT NULL,
  `response_tab` varchar(200) NOT NULL,
  `questions_id` int NOT NULL,
  `classes_id` int DEFAULT NULL,
  `targets_id` int NOT NULL,
  `users_id` int NOT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `responses`
--

INSERT INTO `responses` (`id`, `response_tab`, `questions_id`, `classes_id`, `targets_id`, `users_id`, `date_created`) VALUES
(34, '4', 11, NULL, 2, 16, NULL),
(35, '3', 12, NULL, 2, 16, NULL),
(36, '3', 13, NULL, 2, 16, NULL),
(37, '3', 14, NULL, 2, 16, NULL),
(38, '2', 15, NULL, 2, 16, NULL),
(39, '2', 16, NULL, 2, 16, NULL),
(40, '2', 17, NULL, 2, 16, NULL),
(41, '1', 18, NULL, 2, 16, NULL),
(42, '4', 19, NULL, 2, 16, NULL),
(43, '1', 21, NULL, 2, 16, NULL),
(44, '4', 23, NULL, 2, 16, NULL),
(45, '4', 11, NULL, 2, 15, NULL),
(46, '3', 12, NULL, 2, 15, NULL),
(47, '1', 13, NULL, 2, 15, NULL),
(48, '1', 14, NULL, 2, 15, NULL),
(49, '1', 15, NULL, 2, 15, NULL),
(50, '1', 16, NULL, 2, 15, NULL),
(51, '4', 17, NULL, 2, 15, NULL),
(52, '3', 18, NULL, 2, 15, NULL),
(53, '1', 19, NULL, 2, 15, NULL),
(54, '2', 21, NULL, 2, 15, NULL),
(55, '4', 23, NULL, 2, 15, NULL),
(56, '4', 11, NULL, 2, 17, NULL),
(57, '1', 12, NULL, 2, 17, NULL),
(58, '4', 13, NULL, 2, 17, NULL),
(59, '4', 14, NULL, 2, 17, NULL),
(60, '4', 15, NULL, 2, 17, NULL),
(61, '3', 16, NULL, 2, 17, NULL),
(62, '1', 17, NULL, 2, 17, NULL),
(63, '1', 18, NULL, 2, 17, NULL),
(64, '3', 19, NULL, 2, 17, NULL),
(65, '1', 21, NULL, 2, 17, NULL),
(66, '1', 23, NULL, 2, 17, NULL),
(67, '4', 10, 4, 2, 5, NULL),
(68, '4', 27, 4, 2, 5, NULL),
(69, '1', 30, 4, 2, 5, NULL),
(70, '2', 33, 4, 2, 5, NULL),
(71, '3', 36, 4, 2, 5, NULL),
(72, '4', 1, 1, 2, 13, NULL),
(73, '1', 2, 1, 2, 13, NULL),
(74, '4', 3, 1, 2, 13, NULL),
(75, '1', 19, 1, 2, 13, NULL),
(76, '3', 24, 1, 2, 13, NULL),
(77, '3', 1, 1, 2, 13, NULL),
(78, '3', 2, 1, 2, 13, NULL),
(79, '1', 3, 1, 2, 13, NULL),
(80, '4', 19, 1, 2, 13, NULL),
(81, '4', 24, 1, 2, 13, NULL),
(82, '3', 4, 3, 2, 6, NULL),
(83, '4', 25, 3, 2, 6, NULL),
(84, '1', 4, 3, 2, 6, NULL),
(85, '4', 25, 3, 2, 6, NULL),
(86, '2', 4, 3, 2, 6, NULL),
(87, '4', 25, 3, 2, 6, NULL),
(88, '1', 4, 3, 2, 6, NULL),
(89, '4', 25, 3, 2, 6, NULL),
(90, '4', 4, 3, 2, 6, NULL),
(91, '3', 25, 3, 2, 6, NULL),
(92, '3', 4, 3, 2, 6, NULL),
(93, '1', 25, 3, 2, 6, NULL),
(94, '4', 4, 3, 2, 6, NULL),
(95, '4', 25, 3, 2, 6, NULL),
(96, '2', 4, 3, 2, 6, NULL),
(97, '4', 25, 3, 2, 6, NULL),
(98, '2', 1, 1, 2, 13, NULL),
(99, '4', 2, 1, 2, 13, NULL),
(100, '1', 3, 1, 2, 13, NULL),
(101, '4', 19, 1, 2, 13, NULL),
(102, '4', 24, 1, 2, 13, NULL),
(103, '2', 4, 3, 1, 6, NULL),
(104, '4', 25, 3, 1, 6, NULL),
(105, '2', 4, 3, 1, 6, NULL),
(106, '4', 25, 3, 1, 6, NULL),
(107, '4', 4, 3, 1, 6, NULL),
(108, '3', 25, 3, 1, 6, NULL),
(109, '2', 4, 3, 1, 6, NULL),
(110, '3', 25, 3, 1, 6, NULL),
(111, '2', 4, 3, 1, 6, NULL),
(112, '4', 25, 3, 1, 6, NULL),
(113, '2', 4, 3, 1, 6, NULL),
(114, '3', 25, 3, 1, 6, NULL),
(115, '4', 4, 3, 1, 6, NULL),
(116, '3', 25, 3, 1, 6, NULL),
(117, '4', 11, NULL, 2, 19, NULL),
(118, '2', 12, NULL, 2, 19, NULL),
(119, '1', 13, NULL, 2, 19, NULL),
(120, '3', 14, NULL, 2, 19, NULL),
(121, '4', 15, NULL, 2, 19, NULL),
(122, '3', 16, NULL, 2, 19, NULL),
(123, '4', 17, NULL, 2, 19, NULL),
(124, '2', 18, NULL, 2, 19, NULL),
(125, '4', 19, NULL, 2, 19, NULL),
(126, '4', 21, NULL, 2, 19, NULL),
(127, '3', 23, NULL, 2, 19, NULL),
(128, '1', 9, 4, 1, 5, NULL),
(129, '4', 10, 4, 1, 5, NULL),
(130, '3', 27, 4, 1, 5, NULL),
(131, '4', 30, 4, 1, 5, NULL),
(132, '1', 36, 4, 1, 5, NULL),
(133, '4', 9, 4, 1, 5, NULL),
(134, '3', 10, 4, 1, 5, NULL),
(135, '2', 27, 4, 1, 5, NULL),
(136, '4', 30, 4, 1, 5, NULL),
(137, '3', 36, 4, 1, 5, NULL),
(138, '4', 9, 4, 1, 5, NULL),
(139, '4', 10, 4, 1, 5, NULL),
(140, '4', 27, 4, 1, 5, NULL),
(141, '4', 30, 4, 1, 5, NULL),
(142, '3', 36, 4, 1, 5, NULL),
(143, '3', 9, 4, 1, 5, NULL),
(144, '3', 10, 4, 1, 5, NULL),
(145, '2', 27, 4, 1, 5, NULL),
(146, '3', 30, 4, 1, 5, NULL),
(147, '3', 36, 4, 1, 5, NULL),
(148, '4', 11, NULL, 2, 4, NULL),
(149, '2', 12, NULL, 2, 4, NULL),
(150, '2', 13, NULL, 2, 4, NULL),
(151, '4', 14, NULL, 2, 4, NULL),
(152, '4', 15, NULL, 2, 4, NULL),
(153, '3', 16, NULL, 2, 4, NULL),
(154, '4', 17, NULL, 2, 4, NULL),
(155, '3', 18, NULL, 2, 4, NULL),
(156, '4', 19, NULL, 2, 4, NULL),
(157, '3', 21, NULL, 2, 4, NULL),
(158, '2', 23, NULL, 2, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `targets`
--

CREATE TABLE `targets` (
  `id` int NOT NULL,
  `personnel` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `targets`
--

INSERT INTO `targets` (`id`, `personnel`) VALUES
(1, 'students'),
(2, 'educator');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `admission_num` varchar(25) DEFAULT NULL,
  `classes_id` int DEFAULT NULL,
  `targets_id` int NOT NULL,
  `pass` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `phone`, `admission_num`, `classes_id`, `targets_id`, `pass`) VALUES
(1, 'paul', 'peter', '1234', NULL, NULL, 2, '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'samuel', 'saul', '55555', NULL, NULL, 2, 'c5fe25896e49ddfe996db7508cf00534'),
(3, 'sa', 'ba', '6565', NULL, NULL, 2, 'e615c82aba461681ade82da2da38004a'),
(4, 're', 're', '232', NULL, NULL, 2, '232'),
(5, 'samuel', 'samson', NULL, '1201', 4, 1, '12345'),
(6, 'job', 'susan', NULL, '1202', 3, 1, '12345'),
(7, 'paul', 'pogba', NULL, '1203', 5, 1, '12345'),
(8, 'judas', 'saul', NULL, '1204', 5, 1, '12345'),
(9, 'samuel', 'peter', NULL, '1205', 4, 1, '12345'),
(10, 'steve', 'brin', NULL, '1206', 5, 1, '12345'),
(11, 'jacob', 'abraham', NULL, '1207', 2, 1, '12345'),
(12, 'Bode', 'thomas', NULL, '1208', 6, 1, '12345'),
(13, 'ada', 'aba', NULL, '1209', 1, 1, '12345'),
(14, 'adama', 'ababa', NULL, '1210', 1, 1, '12345'),
(15, 'bunmi', 'seun', '08034288553', NULL, NULL, 2, '12345'),
(16, 'James', 'Brown', '08143219479', NULL, NULL, 2, '12345'),
(17, 'Temi', 'Tope', '09152308989', NULL, NULL, 2, '12345'),
(18, 'Adedoyin', 'Samuel', '08033445566', NULL, NULL, 2, '12345'),
(19, 'SARAH', 'APET', '08063582789', NULL, NULL, 2, 'aherceo2'),
(20, '', '', '', NULL, NULL, 2, ''),
(21, 'Abayomi', 'Apetu', '08035229720', NULL, NULL, 2, 'aherceo2$');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_targets` (`targets_id`),
  ADD KEY `fk_classes` (`classes_id`);

--
-- Indexes for table `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classes_id` (`classes_id`),
  ADD KEY `targets_id` (`targets_id`),
  ADD KEY `questions_id` (`questions_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `targets`
--
ALTER TABLE `targets`
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
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `responses`
--
ALTER TABLE `responses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `targets`
--
ALTER TABLE `targets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`targets_id`) REFERENCES `targets` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`classes_id`) REFERENCES `classes` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `responses`
--
ALTER TABLE `responses`
  ADD CONSTRAINT `responses_ibfk_1` FOREIGN KEY (`classes_id`) REFERENCES `classes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `responses_ibfk_2` FOREIGN KEY (`targets_id`) REFERENCES `targets` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `responses_ibfk_3` FOREIGN KEY (`questions_id`) REFERENCES `questions` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `responses_ibfk_4` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
