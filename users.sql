-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2021 at 09:37 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rouak_cnrps`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `user_name` text NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` text NOT NULL,
  `dir` text NOT NULL,
  `birthday` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_image` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` text NOT NULL,
  `posts` text NOT NULL,
  `recovery_account` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `f_name`, `l_name`, `user_name`, `pass`, `email`, `city`, `dir`, `birthday`, `user_image`, `cover`, `reg_date`, `status`, `posts`, `recovery_account`) VALUES
(3, 'نجوى', 'ابازيد', 'نجوى ابازيد', '0123456789', 'cnajwa@live.fr', 'تونس', 'affile', '0000-00-00 00:00:00', '2.jpg.65', '3.jpg.21', '2021-04-11 21:15:32', 'verified', 'yes', 'Iwanttoputading intheuniverse.'),
(5, 'وفاء ', 'السعيدي', 'وفاء السعيدي', 'ئءؤرلاىةوزظ', 'odaypatron2013@gmail.com', 'سيدي بوزيد', 'puntion', '1972-02-18 23:00:00', 'logo.jpg.79', 'logo (1).jpg.43', '2021-04-18 22:06:21', 'verified', 'yes', 'Iwanttoputading intheuniverse.'),
(6, 'ديسم', 'عبد اللاوي', 'ديسم عبد اللاوي', 'ضصثقفغعهخحجد', 'rouak.naj@gmail.com', 'سيدي بوزيد', 'affile', '2005-04-14 22:00:00', 'images/p.jpg', 'default_cover.jpg', '2021-04-18 22:40:30', 'verified', 'yes', 'Iwanttoputading intheuniverse.'),
(7, 'اليسار', 'عبد اللاوي', 'اليسار_عبد اللاوي', 'شسيبلاتنمكط\\', 'rouak.na@outlook.sa', 'مدنين', 'affile', '2000-09-23 22:00:00', '3.jpg.16', 'default_cover.jpg', '2021-04-18 22:53:44', 'verified', 'yes', 'Iwanttoputading intheuniverse.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
