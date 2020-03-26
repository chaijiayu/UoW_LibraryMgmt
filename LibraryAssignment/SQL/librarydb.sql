-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2019 at 09:30 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `librarydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `booklist`
--

CREATE TABLE `booklist` (
  `BookNo` int(150) NOT NULL,
  `ISBN` varchar(150) NOT NULL,
  `Title` varchar(150) NOT NULL,
  `Author` varchar(150) NOT NULL,
  `Publisher` varchar(150) NOT NULL,
  `Status` varchar(150) NOT NULL,
  `Cost` varchar(150) NOT NULL,
  `Userid` int(150) DEFAULT NULL,
  `issuesDate` date DEFAULT NULL,
  `ReturnDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booklist`
--

INSERT INTO `booklist` (`BookNo`, `ISBN`, `Title`, `Author`, `Publisher`, `Status`, `Cost`, `Userid`, `issuesDate`, `ReturnDate`) VALUES
(2, '1111111117', 'Lord of the Ring', 'Danny', 'Christine', 'Not Available', '5', 0, '0000-00-00', '0000-00-00'),
(3, '1111111112', 'Harry Potter', 'Johnny', 'Curry', 'Available', '10', 0, '0000-00-00', '0000-00-00'),
(4, '1111111113', 'Fifty Shades of Grey', 'Gary', 'Joanne', 'Not Available', '10', 2, '2019-02-19', '2019-03-01'),
(5, '1111111115', 'War and Peace', 'Leo Tolstoy', 'Roland', 'Overdue', '5', 2, '2019-02-08', '2019-02-18'),
(6, '1111111116', 'Great Expectations', 'Charles Dickens', 'Penguin', 'Available', '10', 0, '0000-00-00', '0000-00-00'),
(7, '1111111119', 'In Search of Lost Time', ' Marcel Proust', 'HarperCollins', 'Not Available', '10', 2, '2019-02-21', '2019-03-03');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `surname` varchar(150) NOT NULL,
  `phone` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `type` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `name`, `surname`, `phone`, `email`, `password`, `type`) VALUES
(1, 'AdminOne', 'Test', '93228016', 'adriantdh@live.com', 'f925916e2754e5e03f75dd58a5733251', 'admin'),
(2, 'Jia Yu', 'Chai', '90898293', 'cjy@gmail.com', 'f925916e2754e5e03f75dd58a5733251', 'student'),
(3, 'Tan', 'adrian', '93228018', 'test@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booklist`
--
ALTER TABLE `booklist`
  ADD PRIMARY KEY (`BookNo`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booklist`
--
ALTER TABLE `booklist`
  MODIFY `BookNo` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
