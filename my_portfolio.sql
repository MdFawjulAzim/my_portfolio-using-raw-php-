-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 22, 2024 at 08:20 PM
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
-- Database: `my_portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int NOT NULL,
  `designation` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `desp` varchar(1000) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `designation`, `name`, `desp`, `image`) VALUES
(1, 'PHP Developer', 'Md.Fawjul Azim', 'Hi, I\'m Md.Fawjul Azim.I regularly develop my subject-related skills. Now I am Learning PHP laravel . I love to do problem-solving and optimize code brute-force to an optimal solution.\nThank you!', '66c770fa5a04d.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `name`, `designation`, `image`, `feedback`) VALUES
(5, 'মো:ফাওজুল আজীম', 'Design', '66c7943b45d0b.jpg', 'well done'),
(6, 'Md.Fawjul Azim', '', '66c7946e7d67a.jpg', ' a written composition in which two or more characters are represented as conversing'),
(7, 'Hiroko Burks', 'Aliquip dolorem ut a', NULL, 'Aute ab inventore es'),
(8, '', '', NULL, ''),
(9, 'Risa Sullivan', 'Hic quo ut fugit et', NULL, 'Tempor ex exercitati'),
(10, 'Vanna Rocha', 'Aut et deserunt dolo', '66c798a66877f.jpg', 'Qui et molestias mai'),
(11, 'Xyla Lara', 'Qui magni commodi qu', NULL, 'Facere incididunt pe');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` int NOT NULL,
  `header_logo` varchar(100) NOT NULL,
  `footer_logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `header_logo`, `footer_logo`) VALUES
(1, '66c749225bd18.svg', '66c74986efbeb.svg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`, `status`, `created_at`) VALUES
(5, 'Harper Lindsey', 'zacemi@mailinator.com', 'Sint ut est rerum ab', 'Voluptas dolore temp', 1, '2024-08-22 20:11:58'),
(6, 'Tanya Bush', 'ludufadip@mailinator.com', 'Quod nisi ipsum adip', 'Qui molestias amet ', 1, '2024-08-22 20:11:58'),
(7, 'Veda Patel', 'cycutujiwe@mailinator.com', 'Inventore in qui ut ', 'Ut exercitationem et', 1, '2024-08-22 20:19:16');

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `title`, `category`, `image`, `status`) VALUES
(1, 'Web Development', 'wordpress', '66c779c0dbb4f.jpg', 1),
(2, 'PHP Devoloper', 'SEO', '66c791c234f35.jpg', 1),
(4, 'Web Design', 'html,css', '66c7918c26551.jpg', 1),
(5, 'Digital Marketing', 'Market place', '66c791aa147a8.jpg', 1),
(6, 'Mern Stack', 'Javascript', '66c791e58a8a6.jpg', 0),
(7, 'Quis animi corrupti', 'Nihil assumenda ad o', '66c798811d982.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `desp` varchar(500) NOT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `desp`, `status`) VALUES
(1, 'Graphics Branding Design', 'It can change the way we feel about a company and the products & services they offer.', 1),
(2, 'Front End Design Development', 'It can change the way we feel about a company and the products & services they offer.', 1),
(3, 'Digital Content Marketing', 'It can change the way we feel about a company and the products & services they offer.', 1),
(5, 'Videography Photography', 'It can change the way we feel about a company and the products & services they offer.', 1),
(7, 'Wordpress Development', 'It can change the way we feel about a company and the products & services they offer.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int NOT NULL,
  `skill_name` varchar(100) NOT NULL,
  `percentage` int NOT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill_name`, `percentage`, `status`) VALUES
(1, 'Html', 93, 1),
(2, 'CSS', 85, 1),
(3, 'Bootstrap', 80, 1),
(4, 'Javascript', 70, 1),
(7, 'Tailwind CSS', 67, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `country` varchar(30) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `role` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `country`, `gender`, `photo`, `role`) VALUES
(1, 'Md.Fawjul Azim', 'mdfawjulazim@gmail.com', '$2y$10$Vcz3VU/QphrEiGAgqOxGXOE9RD.r5y.eGT1XR/mBAvrVG4qoudv2u', 'BAN', 'male', '66c78b5b4193e.jpg', 1),
(2, 'Tasdik Hasan', 'tasdikhasan@gmail.com', '$2y$10$M2Hr/25NB4mgllq.ztLVa.Q8Wy00EBWQVzii0DibejAZHb77Df.PG', 'AUS', 'female', NULL, 1),
(3, 'Saema Nasrin', 'saemanasrin@gmail.com', '$2y$10$0qxE6bURwxnHIBMguDRUFuZvJUGS6zK0H5PWqwV7lnF0oLSGYz3My', 'USA', 'female', NULL, 3),
(9, 'Toushy Hasan', 'toushyhasan@gmail.com', '$2y$10$8nHbYHNPqjqa1y.iqmRGyu.MwGyuJh.A73aQCjQnRJSEJZoE6z.oW', 'BAN', 'male', NULL, 4),
(12, 'Akter Hasan', 'akterhasan@gmail.com', '$2y$10$h07B5FamjTOmbfTpsztacO9rSdTNv8CHQ9aElHN8E.sz0rzsfOFkK', 'BAN', 'male', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
