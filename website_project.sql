-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.3.16-MariaDB
-- PHP 版本： 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `website_project`
--

-- --------------------------------------------------------

--
-- 資料表結構 `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `uploads`
--

CREATE TABLE `uploads` (
  `idUpload` int(11) NOT NULL,
  `Usersid` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `upload_time` datetime DEFAULT current_timestamp(),
  `TEXT_msg` text DEFAULT NULL,
  `upload_file` tinytext DEFAULT NULL,
  `exact_file` tinytext DEFAULT NULL,
  `states` tinytext DEFAULT 'incomplete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `uploads`
--

INSERT INTO `uploads` (`idUpload`, `Usersid`, `emailUsers`, `upload_time`, `TEXT_msg`, `upload_file`, `exact_file`, `states`) VALUES
(15, 'HungFanHin', 'khung67618663@gmail.com', '2019-08-10 16:21:35', 'Halo', '2019_08_10_HungFanHin_Assignment1.xlsx', 'Assignment 3.xlsx', 'complete'),
(16, 'HungFanHin', 'khung67618663@gmail.com', '2019-08-10 16:22:16', NULL, '2019_08_10_HungFanHin_Assignment2.xlsx', 'Seat number.xlsx', 'incomplete'),
(17, 'jacky', 'jacky123@gmail.com', '2019-08-12 11:26:45', '1234', '2019_08_12_jacky_Assignment1.xlsx', 'data123.xlsx', 'incomplete'),
(18, 'jacky', 'jacky123@gmail.com', '2019-08-12 11:40:56', '1234', '2019_08_12_jacky_Assignment2.xlsx', 'DataSet1.xlsx', 'complete'),
(19, 'HungFanHin', 'khung67618663@gmail.com', '2019-09-11 10:21:57', NULL, '2019_09_11_HungFanHin_Assignment3.xlsx', 'DataSet1.xlsx', 'incomplete'),
(20, 'HungFanHin', 'khung67618663@gmail.com', '2019-09-11 10:34:48', NULL, '2019_09_11_HungFanHin_Assignment.xlsx', 'Seat number.xlsx', 'incomplete'),
(21, 'iiiiiiiiii', 'iii@gmail.com', '2019-09-11 14:08:31', NULL, '2019_09_11_iiiiiiiiii_Assignment.xlsx', '1155093869.xlsx', 'incomplete'),
(22, 'iiiiiiiiii', 'iii@gmail.com', '2019-09-11 14:14:06', NULL, '2019_09_11_iiiiiiiiii_Assignment1.xlsx', 'DataSet1.xlsx', 'incomplete'),
(23, 'vvvvvvv', 'vvv@gmail.com', '2019-09-18 23:54:22', NULL, '2019_09_18_vvvvvvv_Assignment.xlsx', 'Assignment 3.xlsx', 'incomplete');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL,
  `user_indicator` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`idUsers`, `uidUsers`, `emailUsers`, `pwdUsers`, `user_indicator`) VALUES
(9, 'iiiiiiiiii', 'iii@gmail.com', '$2y$10$JUh.wpU1C.ZQr.HLMKz5NOeq7q7QoQ95ZRcmNFP5vWF3IHh3PPV2C', '1'),
(10, 'vvvvvvv', 'vvv@gmail.com', '$2y$10$3HGAKFngDgPrLceBOwGlyubVPyuhbZBiGRs2bXNgnetupl8/e/6LK', '0');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- 資料表索引 `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`idUpload`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `uploads`
--
ALTER TABLE `uploads`
  MODIFY `idUpload` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
