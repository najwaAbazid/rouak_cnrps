-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2021 at 09:40 PM
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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_content` varchar(255) NOT NULL,
  `upload_image` varchar(255) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `post_content`, `upload_image`, `post_date`) VALUES
(5, 1, 'llllllllll', '2.jpg.21', '2021-04-11 20:49:36'),
(8, 4, 'الايام القادمة اجمل باذن الله', '4.jpg.87', '2021-04-14 21:42:51'),
(9, 3, 'لوكان بيدي غسل الماء قبل شربه لفعلت', 'n.jpg.55', '2021-04-14 21:45:49'),
(10, 1, 'رمضان مبروك', '', '2021-04-15 03:28:31'),
(11, 4, 'اذا بتُليت فاصبِر واذا جُزيت فاشكُر ', '1.jpg.79', '2021-04-15 19:04:06'),
(12, 4, 'من جاءك معتذرا فاقبل عذره وسامحه ولا تبالغ في عتابه مهما كان خطأه فما اعتذر لك الا لمكانتك في قلبه واحترامه لك فلا تخسره..', '', '2021-04-15 19:05:57'),
(13, 2, 'كلما احسنت نيتك احسن الله حالك وكلما تمنيت الخير لغيرك اتاك الخيرمن حيث لا تحتسب ... ...', '', '2021-04-16 13:06:41'),
(15, 1, 'No', 'lo.jpg.65', '2021-04-16 20:05:59'),
(16, 1, 'لقد فعلتها اخيرا', 'n.jpg.54', '2021-04-17 22:06:52'),
(17, 5, 'لا اله الا الله', '2.jpg.88', '2021-04-18 22:38:03'),
(18, 6, 'الشباب  والقوة ', '', '2021-04-18 22:51:55'),
(19, 7, 'والله لو وزعت قلبي على البشرية لكفاه', '2.jpg.18', '2021-04-18 23:07:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
