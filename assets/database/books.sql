-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 21, 2022 at 04:04 PM
-- Server version: 8.0.18
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_collection`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Title` varchar(100) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Id`, `Title`, `Author`, `Description`) VALUES
(1, 'J.D. Salinger', 'The Catcher in the Rye', 'book desc 1'),
(2, 'J.D. Salinger', 'Nine Stories', 'book desc 2'),
(3, 'J.D. Salinger', 'Franny and Zooey', 'book desc 2'),
(4, 'F. Scott. Fitzgerald', 'The Great Gatsby', 'book desc 4'),
(5, 'F. Scott. Fitzgerald', 'Tender id the Night', 'book desc 4'),
(6, 'Jane Austen', 'Pride and Prejudice', 'book desc 6'),
(7, 'Jason N. Gaylord', 'Professional ASP.NET 4.5 in C# and VB', 'book desc 7'),
(8, 'Scott Hanselman', 'Professional ASP.NET 4.5 in C# and VB', 'book desc 8'),
(9, 'Pranav Rastogi', 'Professional ASP.NET 4.5 in C# and VB', 'book desc 9'),
(10, 'Todd Miranda', 'Professional ASP.NET 4.5 in C# and VB', 'book desc 10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
