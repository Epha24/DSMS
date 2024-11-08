-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2024 at 11:57 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drug_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `comment` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `username`, `comment`) VALUES
(1, 'patient', 'Nice System'),
(2, 'patient', 'I think you have got nice system.'),
(3, 'hiwot', 'nice system'),
(4, 'patient', 'I think you have done well.'),
(5, 'rediet', 'It seems good');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `fname` varchar(60) NOT NULL,
  `lname` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `message` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `fname`, `lname`, `email`, `phone`, `message`) VALUES
(1, 'Ephrem', 'Amanuel', 'ephaaman123@gmail.com', '0978654511', 'Nice System'),
(2, 'Aschenaki', 'Abebe', 'asch@gmail.com', '0987654323', 'Hi'),
(3, 'Aschenaki', 'Abebe', 'berhanutigabu2@gmail.com', '0922904587', 'fhgjhkl;');

-- --------------------------------------------------------

--
-- Table structure for table `drug`
--

CREATE TABLE `drug` (
  `bno` varchar(30) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `dosage` varchar(20) NOT NULL,
  `edate` varchar(20) NOT NULL,
  `mdate` varchar(50) NOT NULL,
  `tnum` int(50) NOT NULL,
  `price` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Not Expired'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drug`
--

INSERT INTO `drug` (`bno`, `dname`, `dosage`, `edate`, `mdate`, `tnum`, `price`, `status`) VALUES
('2000561', 'Diclo', '5000 mg', '2022-06-15', '2022-06-15', 180, '100', 'Not Sold'),
('2000565', 'Amoxa', '1000', '2023-05-23', '2022-06-14', 20, '30', 'Not Expired'),
('2000568', 'Amoxa', '500 mg', '2023-02-09', '2021-02-10', 47, '30', 'Not Expired'),
('346576', 'Metapherozine', '500 mg', '2022-06-15', '2022-06-24', 100, '50', 'Not Sold');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(70) NOT NULL,
  `position` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`fname`, `mname`, `lname`, `address`, `phone`, `email`, `position`) VALUES
('Ephrem', 'Amanuel', 'Ayde', 'Mirab Abaya', '0964074945', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `dname` varchar(200) NOT NULL,
  `drug` varchar(30) NOT NULL,
  `dosage` varchar(30) NOT NULL,
  `how_many` int(11) NOT NULL,
  `doc_presc` varchar(200) NOT NULL,
  `ordered_date` varchar(50) NOT NULL,
  `app_date` varchar(50) NOT NULL,
  `status` varchar(40) NOT NULL DEFAULT 'Not Approved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `username`, `dname`, `drug`, `dosage`, `how_many`, `doc_presc`, `ordered_date`, `app_date`, `status`) VALUES
(11, 'patient', 'Diclo', '2000561', '5000 mg', 100, 'depd.jpg', '2022-06-12', '', 'Approved'),
(12, 'hiwot', 'Diclo', '2000561', '5000 mg', 10, 'photo_2022-06-10_20-58-39.jpg', '2022-06-12', '2022-06-15', 'Approved'),
(13, 'rediet', 'Amoxa', '2000568', '500 mg', 3, 's.jpg', '2023-05-06', '2023-05-06', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `role` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `fname`, `mname`, `lname`, `age`, `sex`, `address`, `phone`, `role`, `status`) VALUES
('bereketab', 'dc06698f0e2e75751545455899adccc3', 'Bereketab', 'Dawit', 'Tantu', 29, 'Male', 'Adis Ababa', '0916044673', 'pharmacist', 'Active'),
('mamush', '84fb3cfd2b84344b7be3a5ad53de9a84', 'Mamush', 'Lelo', 'Leka', 28, 'Male', 'Arba Minch', '0920980862', 'admin', 'Active'),
('rediet', 'dc06698f0e2e75751545455899adccc3', 'Rediet', 'Tesfaye', 'Kamba', 29, 'Male', 'Arba Minch', '0911081685', 'patient', 'Active'),
('simegn', 'dc06698f0e2e75751545455899adccc3', 'Simegn', 'Abebe', 'Asha', 30, 'Male', 'Arba Minch', '0935714089', 'patient', 'Active'),
('sinte', 'dc06698f0e2e75751545455899adccc3', 'Sintayehu', 'Habtamu', 'Tiruneh', 28, 'Male', 'Arba Minch', '0949256683', 'manager', 'Active'),
('tame', 'dc06698f0e2e75751545455899adccc3', 'Tamirat', 'Endale', 'Bezabh', 29, 'Male', 'Arba Minch', '0926399860', 'patient', 'Active'),
('yeshi', 'dc06698f0e2e75751545455899adccc3', 'Yeshi', 'Ejegu', 'Degfe', 20, 'Female', 'Arba Minch', '0977733791', 'patient', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drug`
--
ALTER TABLE `drug`
  ADD PRIMARY KEY (`bno`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
