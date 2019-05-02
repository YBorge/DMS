-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 04, 2017 at 05:34 PM
-- Server version: 10.1.25-MariaDB-1~xenial
-- PHP Version: 5.6.31-4+ubuntu16.04.1+deb.sury.org+4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imageedit`
--

-- --------------------------------------------------------

--
-- Table structure for table `layers`
--

CREATE TABLE `layers` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `img_src` varchar(255) NOT NULL,
  `x` varchar(255) NOT NULL,
  `y` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `width` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layers`
--

INSERT INTO `layers` (`id`, `type`, `text`, `img_src`, `x`, `y`, `height`, `width`, `status`) VALUES
(2, 'text', 'Prathamesh', '', '150', '210', '', '', '0'),
(3, 'text', 'Saurabh', '', '120', '210', '', '', ''),
(4, 'text', 'Saurabh', '', '120', '210', '', '', ''),
(5, 'text', 'Saurabh', '', '120', '210', '', '', ''),
(6, 'text', 'Saurabh', '', '120', '210', '', '', ''),
(7, 'text', 'Saurabh12234rff', '', '350', '14', '', '', '0'),
(9, 'text', 'Saurabhffhfffgfhh', '', '95', '67', '', '', '0'),
(11, 'text', 'sahdgghhhh', '', '537.0499877929688', '51.98333740234375', '', '', '0'),
(12, 'text', 'higg', '', '472', '51', '', '', '0'),
(13, 'text', 'e', '', '50px', '50px', '', '', '0'),
(14, 'text', 'rgggg', '', '50px', '50px', '', '', '0'),
(15, 'text', 'ggggg', '', '50px', '50px', '', '', '0'),
(16, 'text', 's', '', '50px', '50px', '', '', '0'),
(17, 'text', 's', '', '686', '113', '', '', '0'),
(18, 'text', 'f', '', '240', '103', '', '', '0'),
(19, 'text', 'ffff', '', '355', '145', '', '', '0'),
(20, 'text', 'helloehfjhhhh', '', '389', '16', '', '', '0'),
(21, 'text', 'dd', '', '169', '101', '', '', '0'),
(22, 'text', 'hell', '', '50px', '50px', '', '', '0'),
(23, 'text', 'hell', '', '345', '34', '', '', '0'),
(24, 'text', 'hell', '', '0', '0', '', '', '0'),
(25, 'text', 'hell', '', '0', '0', '', '', '0'),
(26, 'text', 'f', '', '50px', '50px', '', '', '0'),
(27, 'text', 'ferr', '', '50px', '50px', '', '', '0'),
(28, 'text', 's', '', '634', '588', '', '', '0'),
(29, 'text', 's', '', '672', '456', '', '', '0'),
(30, 'text', 'f', '', '563', '262', '', '', '0'),
(31, 'text', 'f', '', '259', '9', '', '', '0'),
(32, 'text', 'yuvraj', '', '50px', '50px', '', '', '0'),
(33, 'text', 'yuvraj', '', '589', '348', '', '', '0'),
(34, 'text', 'yuvraj', '', '1299', '724', '', '', '0'),
(35, 'text', 'yuvraj', '', '598', '357', '', '', '0'),
(36, 'text', 'yuvraj', '', '450', '380', '', '', '0'),
(37, 'text', 'yuvraj patil', '', '593', '345', '', '', '0'),
(38, 'text', 'yuvraj b patil', '', '597', '350', '', '', '0'),
(39, 'text', 'saurabhgggggggggjjj', '', '356', '127', '', '', '1'),
(40, 'text', 'ffffffff', '', '50px', '50px', '', '', '0'),
(41, 'text', 'ggggg', '', '290', '177', '', '', '1'),
(42, 'text', 'snehal ', '', '50px', '50px', '', '', '0'),
(43, 'text', 'snehal gggg', '', '793', '35', '', '', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `layers`
--
ALTER TABLE `layers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `layers`
--
ALTER TABLE `layers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
