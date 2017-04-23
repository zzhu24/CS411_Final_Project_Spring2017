-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 23, 2017 at 06:27 PM
-- Server version: 10.0.30-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pricetracker_cs411`
--

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `User_Email` varchar(50) NOT NULL,
  `User_Password` varchar(20) DEFAULT NULL,
  `Gender` int(11) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Income` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`User_Email`, `User_Password`, `Gender`, `Age`, `Income`) VALUES
('zhuzhenfeng@gmail.com', '123456', 0, 3, 3),
('yayisama@gmail.com', '123456', 1, 1, 2),
('zhuzhiyu@gmail.com', '123456', 1, 1, 1),
('zhuzhiyu2014@gmail.com', '123456', 1, 1, 1),
('jiangyuzhu@gmail.com', '123456', 1, 3, 2),
('carol@hotmail.com', '123456', 1, 1, 1),
('charlie@gmail.com', '123456', 0, 1, 1),
('oohsehun@gmail.com', '123456', 0, 2, 3),
('luhan@gmail.com', '123456', 0, 2, 3),
('maggie6@gmail.com', '123456', 1, 2, 2),
('sylvia@gmail.com', '123456', 1, 1, 3),
('tshan3@illinois.edu', '123456', 0, 1, 0),
('chanyeol@gmail.com', '123456', 0, 2, 2),
('tt@illinois.edu', 's13704365091', 0, 1, 0),
('1@fake.com', '123456', 1, 4, 2),
('2@fake.com', '123456', 0, 4, 2),
('3@fake.com', '123456', 1, 1, 2),
('4@fake.com', '123456', 1, 4, 2),
('5@fake.com', '123456', 1, 2, 4),
('6@fake.com', '123456', 1, 3, 2),
('7@fake.com', '123456', 1, 1, 1),
('8@fake.com', '123456', 0, 2, 1),
('9@fake.com', '123456', 1, 2, 2),
('10@fake.com', '123456', 1, 3, 3),
('11@fake.com', '123456', 1, 3, 1),
('12@fake.com', '123456', 0, 1, 2),
('13@fake.com', '123456', 1, 1, 1),
('14@fake.com', '123456', 0, 1, 4),
('15@fake.com', '123456', 0, 2, 2),
('16@fake.com', '123456', 1, 2, 1),
('17@fake.com', '123456', 1, 3, 2),
('18@fake.com', '123456', 1, 4, 3),
('19@fake.com', '123456', 1, 2, 4),
('20@fake.com', '123456', 0, 1, 2),
('21@fake.com', '123456', 0, 1, 2),
('22@fake.com', '123456', 0, 2, 4),
('23@fake.com', '123456', 0, 1, 1),
('24@fake.com', '123456', 1, 4, 2),
('25@fake.com', '123456', 0, 2, 2),
('26@fake.com', '123456', 0, 4, 4),
('27@fake.com', '123456', 1, 2, 1),
('28@fake.com', '123456', 1, 4, 2),
('29@fake.com', '123456', 0, 2, 2),
('30@fake.com', '123456', 1, 1, 1),
('31@fake.com', '123456', 0, 4, 4),
('32@fake.com', '123456', 1, 2, 2),
('33@fake.com', '123456', 1, 2, 4),
('34@fake.com', '123456', 1, 2, 4),
('35@fake.com', '123456', 1, 1, 2),
('36@fake.com', '123456', 0, 2, 1),
('37@fake.com', '123456', 0, 1, 3),
('38@fake.com', '123456', 1, 2, 1),
('39@fake.com', '123456', 1, 3, 2),
('40@fake.com', '123456', 0, 2, 4),
('41@fake.com', '123456', 0, 1, 4),
('42@fake.com', '123456', 0, 4, 1),
('43@fake.com', '123456', 0, 2, 3),
('44@fake.com', '123456', 1, 4, 3),
('45@fake.com', '123456', 1, 1, 4),
('46@fake.com', '123456', 0, 2, 2),
('47@fake.com', '123456', 0, 4, 2),
('48@fake.com', '123456', 1, 4, 4),
('49@fake.com', '123456', 0, 4, 2),
('50@fake.com', '123456', 0, 2, 2),
('51@fake.com', '123456', 1, 3, 1),
('52@fake.com', '123456', 0, 4, 4),
('53@fake.com', '123456', 0, 4, 1),
('54@fake.com', '123456', 1, 1, 1),
('55@fake.com', '123456', 0, 4, 3),
('56@fake.com', '123456', 1, 1, 4),
('57@fake.com', '123456', 0, 4, 3),
('58@fake.com', '123456', 1, 1, 1),
('59@fake.com', '123456', 0, 1, 1),
('60@fake.com', '123456', 0, 1, 2),
('61@fake.com', '123456', 0, 2, 2),
('62@fake.com', '123456', 1, 3, 4),
('63@fake.com', '123456', 1, 4, 4),
('64@fake.com', '123456', 0, 4, 2),
('65@fake.com', '123456', 0, 2, 1),
('66@fake.com', '123456', 1, 3, 1),
('67@fake.com', '123456', 1, 4, 3),
('68@fake.com', '123456', 0, 2, 1),
('69@fake.com', '123456', 0, 4, 1),
('70@fake.com', '123456', 1, 4, 3),
('71@fake.com', '123456', 1, 1, 3),
('72@fake.com', '123456', 1, 2, 2),
('73@fake.com', '123456', 0, 2, 1),
('74@fake.com', '123456', 0, 1, 4),
('75@fake.com', '123456', 0, 2, 4),
('76@fake.com', '123456', 1, 2, 2),
('77@fake.com', '123456', 1, 3, 3),
('78@fake.com', '123456', 1, 2, 1),
('79@fake.com', '123456', 0, 3, 1),
('80@fake.com', '123456', 1, 3, 1),
('81@fake.com', '123456', 1, 4, 1),
('82@fake.com', '123456', 1, 2, 2),
('83@fake.com', '123456', 0, 3, 2),
('84@fake.com', '123456', 0, 4, 2),
('85@fake.com', '123456', 1, 1, 1),
('86@fake.com', '123456', 0, 3, 4),
('87@fake.com', '123456', 0, 4, 3),
('88@fake.com', '123456', 0, 1, 1),
('89@fake.com', '123456', 0, 1, 3),
('90@fake.com', '123456', 1, 3, 4),
('91@fake.com', '123456', 1, 4, 4),
('92@fake.com', '123456', 0, 2, 2),
('93@fake.com', '123456', 1, 4, 2),
('94@fake.com', '123456', 1, 1, 4),
('95@fake.com', '123456', 1, 2, 1),
('96@fake.com', '123456', 1, 2, 1),
('97@fake.com', '123456', 1, 1, 1),
('98@fake.com', '123456', 0, 2, 2),
('99@fake.com', '123456', 0, 1, 1),
('100@fake.com', '123456', 1, 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`User_Email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
