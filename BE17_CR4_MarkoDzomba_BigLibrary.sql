-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 12, 2022 at 03:35 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BE17_CR4_MarkoDzomba_BigLibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `isbncode` int(20) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `type` enum('book','cd','dvd') DEFAULT NULL,
  `author_first_name` varchar(50) NOT NULL,
  `author_last_name` varchar(50) NOT NULL,
  `publisher_name` varchar(50) NOT NULL,
  `publisher_address` varchar(100) NOT NULL,
  `publish_date` datetime NOT NULL,
  `status` enum('available','reserved') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`id`, `title`, `pic`, `isbncode`, `short_description`, `type`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`, `status`) VALUES
(3, 'The Sardinian Sardines', '636f0799b7025.jpg', 56498765, '', 'book', 'John', 'Wiliiams', 'Cherry Press', '23355 Mulholland Drive', '2015-04-08 10:38:02', 'available'),
(4, 'Nikola Tesla Biography', '636f07b4f0ad3.jpg', 56468435, '', 'book', 'Zeb', 'Dunsire', 'MetroBooks', '68626 Park Meadow Avenue', '2015-07-15 10:33:31', 'available'),
(6, 'Good Times', '636f08b2306c2.jpg', 3564984, '', 'book', 'Deborah', 'Dysert', 'Piatkus Books', '001 Cherokee Hill', '2011-09-15 10:39:13', 'available'),
(8, 'Gran Torino', '636f193891797.jpg', 65498456, '', 'book', 'Humfried', 'Itzchaky', ' Harper', '89 Morningstar Plaza', '2013-01-15 11:46:05', 'available'),
(9, 'Olimpyakos', '636f20d38d926.jpg', 5216848, '', 'book', 'Orsa', 'Oppery	', 'Cob', 'Giorgios Giorgios 3', '2009-09-15 12:50:24', 'available'),
(10, 'The Game of Love and Death', '636f0687e1280.jpg', 56419453, '', 'book', 'Leeann', 'Palfrey', ' Harper', '89 Morningstar Plaza', '2015-07-15 05:52:46', 'available'),
(14, 'new', 'picture.png', 12412334, 'asdjansdajsdh', 'book', 'mana', 'banana', 'bananana', 'banananna 12', '1990-02-12 00:00:00', 'available'),
(15, 'BIG FUZZ', '636f2143a15bc.jpg', 13890223, '', 'book', 'Johnny', 'Rollins', 'Henle', 'Goethestrasse 2', '1978-02-03 00:00:00', 'available'),
(17, 'New CD', 'picture.png', 34234234, 'No description available', 'cd', 'Marcel', 'Bonaparte', 'Murdoc', 'Banana Street PLaza 1', '1997-12-11 00:00:00', 'available'),
(21, 'Eat Pray love', '636f20920ea8e.jpg', 123123, '', 'book', 'Dada', 'Dada', 'Dadadada', 'Dada Street', '2000-03-23 00:00:00', 'available'),
(22, 'Rambo', 'picture.png', 42325252, 'Action movie', 'dvd', 'John', 'Rambo', 'Rambo Movies', '2341 Rambo Street', '1985-12-12 00:00:00', 'available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
