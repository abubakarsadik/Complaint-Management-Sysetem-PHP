-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2021 at 06:23 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_sgd`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(255) NOT NULL,
  `categoryname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `categoryname`) VALUES
(48, 'Education');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(255) NOT NULL,
  `cityname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `cityname`) VALUES
(1, 'Sargodha'),
(2, 'Kot Momin'),
(3, 'Bhalwal'),
(4, 'Bhera'),
(5, 'Shapur'),
(6, 'Sahiwal'),
(7, 'Sillanwali');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaint_id` int(255) NOT NULL,
  `complainttitle` varchar(255) NOT NULL,
  `dairynumber` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `fathername` varchar(255) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `priority` varchar(255) NOT NULL,
  `lastdatetoreply` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `category_id` int(255) NOT NULL,
  `subcategory_id` int(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `cnicno` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaint_id`, `complainttitle`, `dairynumber`, `firstname`, `lastname`, `fathername`, `contactno`, `address`, `priority`, `lastdatetoreply`, `description`, `category_id`, `subcategory_id`, `date`, `user_id`, `city`, `attachment`, `cnicno`, `status`) VALUES
(21, 'Helo', 741, 'Abid', 'Akram', 'Hasan Khan', '03204512874', 'house Number 4', 'Low', '2021-01-28', 'What Are You Doing', 48, 33, '2021-01-28 14:18:35', 10, '1', 'Files/ZIhvGL@0yLBjpHBzgTS-', '', 'closed'),
(22, 'jhu', 741, 'Abid', 'Akmal', 'Hasan Khan', '214587965', 'abc', 'Low', '2021-02-19', 'aaaa', 48, 33, '2021-01-28 16:03:23', 10, '1', 'Files/Fo6ZfbA0miUU#j!y38MN', '2587412588', 'inprocess'),
(23, 'qq', 123, 'Muhammad', 'Umer', 'Muhammad Arshad', '03208500106', 'House #4 Main Bazaar Raza Town', 'High', '2021-02-26', 'kkk', 48, 33, '2021-01-28 16:17:07', 25, '1', 'Files/6515037434[Laan,-Sjaak]-IT-infrastructure-architecture-_-inf(z-lib.org).pdf', '3840380058292', NULL),
(24, '', 0, 'Muhammad', 'Umer', 'Muhammad Arshad', '03208500106', 'House #4 Main Bazaar Raza Town', 'Medium', '2021-02-12', '', 48, 33, '2021-01-28 16:17:59', 10, '1', 'Files/8862144401BSIT 6th S 2017-2021 - Copy.pdf', '3840380058292', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complaintremarks`
--

CREATE TABLE `complaintremarks` (
  `remarks_id` int(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL,
  `complaint_id` int(255) NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaintremarks`
--

INSERT INTO `complaintremarks` (`remarks_id`, `remarks`, `date`, `status`, `complaint_id`, `user`) VALUES
(33, 'coment 1', '2021-01-28 14:22:08', 'inprocess', 21, 'Muhammad Umer'),
(34, 'comment 2', '2021-01-28 14:24:25', 'inprocess', 21, 'Ali Akbar Umer'),
(35, 'Helo', '2021-01-28 15:19:36', 'inprocess', 21, 'Ali Akmal'),
(36, 'closed', '2021-01-28 16:01:36', 'closed', 21, 'Ali Akmal'),
(37, 'transfered', '2021-01-28 16:04:22', 'inprocess', 22, 'Ali Akmal'),
(38, 'tb', '2021-01-28 16:05:36', 'inprocess', 22, 'Ali Akbar Umer');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcategory_id` int(255) NOT NULL,
  `subcategoryname` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcategory_id`, `subcategoryname`, `category_id`) VALUES
(33, 'Schools', 48);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `firstname`, `lastname`, `email`, `contactno`, `city`, `usertype`, `role`, `password`) VALUES
(9, 'aliamat', 'Azmat ', 'Ali', 'azmat@gmail.com', '0325147851', '2', 'Entery Operator', 'Enter Complaints', 'admin'),
(10, 'aliakmal', 'Ali', 'Akmal', 'ali@gmail.com', '03258888', '1', 'AC', 'Admin', 'admin'),
(12, 'usman1106', 'Usman', 'Umer', 'usmanumer1106@gmail.com', '03208500106', '1', 'Admin', 'Admin', 'admin'),
(25, '', 'Ali Akbar', 'Umer', 'usmanumer06@gmail.com', '03208500106', '1', 'UP', '', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaint_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `subcategory_id` (`subcategory_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `complaintremarks`
--
ALTER TABLE `complaintremarks`
  ADD PRIMARY KEY (`remarks_id`),
  ADD KEY `complaintremarks_ibfk_1` (`complaint_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcategory_id`),
  ADD KEY `subcategory_ibfk_1` (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaint_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `complaintremarks`
--
ALTER TABLE `complaintremarks`
  MODIFY `remarks_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcategory_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `complaint_ibfk_2` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategory` (`subcategory_id`),
  ADD CONSTRAINT `complaint_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `complaintremarks`
--
ALTER TABLE `complaintremarks`
  ADD CONSTRAINT `complaintremarks_ibfk_1` FOREIGN KEY (`complaint_id`) REFERENCES `complaint` (`complaint_id`);

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
