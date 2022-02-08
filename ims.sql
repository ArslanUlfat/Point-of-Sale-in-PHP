-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2020 at 07:16 AM
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
-- Database: `ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cell` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `firstname`, `lastname`, `email`, `cell`, `password`, `gender`, `status`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '03101736110', '123', 'Male', '1');

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

CREATE TABLE `productcategory` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `createdby` varchar(50) NOT NULL,
  `creatdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productcategory`
--

INSERT INTO `productcategory` (`id`, `category`, `status`, `createdby`, `creatdate`) VALUES
(1, 'mob', 1, 'admin', '2020-02-07 12:26:54'),
(3, 'mobile1', 1, 'admin', '2020-02-13 23:59:41'),
(7, 'mobile6', 1, 'admin', '2020-02-14 01:07:44'),
(8, 'mobile7', 2, 'admin', '2020-02-14 01:08:39'),
(12, 'mobile8', 2, 'admin', '2020-02-14 02:37:57'),
(13, 'jhaz', 1, 'admin', '2020-02-22 05:52:37'),
(14, 'jazz', 1, 'admin', '2020-02-22 05:55:19'),
(15, 'moblink', 1, 'admin', '2020-02-22 06:01:13'),
(16, 'allaalla', 2, 'admin', '2020-02-23 04:24:29'),
(17, 'ababab', 1, 'admin', '2020-02-26 05:42:52');

-- --------------------------------------------------------

--
-- Table structure for table `productlist`
--

CREATE TABLE `productlist` (
  `id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `barcode` int(50) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_category` varchar(50) NOT NULL,
  `p_supplier` varchar(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `cost` varchar(50) NOT NULL,
  `cost_item` varchar(50) NOT NULL,
  `sale` varchar(50) NOT NULL,
  `sale_item` varchar(50) NOT NULL,
  `profit_rupees` int(50) NOT NULL,
  `min_stock_level` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `purchased_by` varchar(50) NOT NULL,
  `purchasing_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productlist`
--

INSERT INTO `productlist` (`id`, `purchase_id`, `product_id`, `barcode`, `p_name`, `p_category`, `p_supplier`, `quantity`, `cost`, `cost_item`, `sale`, `sale_item`, `profit_rupees`, `min_stock_level`, `status`, `purchased_by`, `purchasing_time`) VALUES
(21, 1, '1', 1111, 'samsung', 'mob', 'ali', 28, '10000', '1000', '20000', '2000', 10000, 5, 1, 'admin', '2020-02-20 13:37:29'),
(22, 1, '2', 2222, 'Q mobile', 'mob', 'ali', 19, '10000', '1000', '20000', '2000', 10000, 0, 1, 'admin', '2020-02-20 13:38:13'),
(23, 1, '3', 3333, 'Calme', 'mob', 'ali', 10, '10000', '1000', '20000', '2000', 10000, 0, 1, 'admin', '2020-02-20 13:39:02'),
(24, 2, '4', 4444, 'Black Berri', 'mob', 'ali', 10, '20000', '2000', '30000', '3000', 10000, 0, 1, 'admin', '2020-02-20 13:40:17'),
(25, 2, '5', 5555, 'Vivo', 'mob', 'ali', 10, '10000', '1000', '20000', '2000', 10000, 0, 1, 'admin', '2020-02-20 13:40:43'),
(26, 2, '6', 6666, 'Noir', 'mob', 'ali', 10, '10000', '1000', '20000', '2000', 10000, 0, 2, 'admin', '2020-02-20 13:41:25'),
(27, 3, '7', 7777, 'Xiom', 'mob', 'ali', 3, '10000', '1000', '20000', '2000', 10000, 5, 2, 'admin', '2020-02-20 13:47:51'),
(28, 4, '8', 8888, 'p 10', 'mobile1', 'ars', 10, '50000', '5000', '80000', '8000', 30000, 0, 1, 'admin', '2020-02-27 08:45:15'),
(29, 4, '9', 9999, 'A 1', 'mobile6', 'ars', 5, '7000', '1400', '9500', '1900', 2500, 0, 1, 'admin', '2020-02-27 08:46:17'),
(30, 5, '10', 1010, 'B 1', 'mobile6', 'ars', 10, '590', '59', '669', '66.9', 79, 5, 2, 'admin', '2020-02-27 08:56:38');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_list`
--

CREATE TABLE `purchase_list` (
  `id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `due_amount` int(11) NOT NULL,
  `purchased_by` varchar(50) NOT NULL,
  `purchasing_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_list`
--

INSERT INTO `purchase_list` (`id`, `purchase_id`, `total_amount`, `paid_amount`, `due_amount`, `purchased_by`, `purchasing_time`) VALUES
(25, 1, 80000, 35000, 25000, 'admin', '2020-02-20 13:39:23'),
(26, 2, 40000, 40000, 0, 'admin', '2020-02-20 13:41:34'),
(27, 3, 10000, 5000, 5000, 'admin', '2020-02-20 13:48:48'),
(28, 4, 57000, 50000, 7000, 'admin', '2020-02-27 08:46:45'),
(29, 5, 590, 590, 0, 'admin', '2020-02-27 08:56:44');

-- --------------------------------------------------------

--
-- Table structure for table `returned_back`
--

CREATE TABLE `returned_back` (
  `id` int(11) NOT NULL,
  `return_no` int(11) NOT NULL,
  `product_no` int(11) NOT NULL,
  `barcode` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `return_by` varchar(50) NOT NULL,
  `return_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returned_back`
--

INSERT INTO `returned_back` (`id`, `return_no`, `product_no`, `barcode`, `name`, `price`, `return_by`, `return_time`) VALUES
(8, 1, 1, 1111, 'samsung', 1000, 'admin', '2020-02-20 18:51:53'),
(9, 1, 2, 1111, 'samsung', 1000, 'admin', '2020-02-20 18:52:04'),
(10, 2, 11, 1111, 'samsung', 1000, 'admin', '2020-02-27 09:20:54'),
(11, 2, 12, 1111, 'samsung', 1000, 'admin', '2020-02-27 09:22:54');

-- --------------------------------------------------------

--
-- Table structure for table `return_list`
--

CREATE TABLE `return_list` (
  `id` int(11) NOT NULL,
  `return_id` int(11) NOT NULL,
  `returned_price` int(11) NOT NULL,
  `returned_by` varchar(50) NOT NULL,
  `return_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `return_list`
--

INSERT INTO `return_list` (`id`, `return_id`, `returned_price`, `returned_by`, `return_time`) VALUES
(3, 1, 2000, 'admin', '2020-02-20 18:52:13'),
(4, 2, 2000, 'admin', '2020-02-27 09:24:35');

-- --------------------------------------------------------

--
-- Table structure for table `sale_products`
--

CREATE TABLE `sale_products` (
  `id` int(11) NOT NULL,
  `sale_no` int(11) NOT NULL,
  `product_no` int(11) NOT NULL,
  `barcode` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `sold_by` varchar(50) NOT NULL,
  `sold_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_products`
--

INSERT INTO `sale_products` (`id`, `sale_no`, `product_no`, `barcode`, `product_name`, `price`, `sold_by`, `sold_time`) VALUES
(1, 2, 1, 1111, 'samsung', 1000, 'admin', '2020-02-21 15:27:21'),
(2, 3, 2, 1111, 'samsung', 1000, 'admin', '2020-02-21 15:48:14'),
(3, 4, 3, 1111, 'samsung', 1000, 'admin', '2020-02-21 16:00:32'),
(4, 5, 4, 1111, 'samsung', 1000, 'admin', '2020-01-21 16:17:44'),
(5, 6, 5, 1111, 'samsung', 1000, 'admin', '2019-02-21 16:31:26'),
(10, 7, 6, 1111, 'samsung', 1000, 'admin', '2020-02-23 04:37:17'),
(11, 8, 7, 1111, 'samsung', 1000, 'admin', '2020-02-23 06:29:54'),
(12, 8, 8, 2222, 'Q mobile', 1000, 'admin', '2020-02-23 06:30:33'),
(14, 9, 9, 1111, 'samsung', 1000, 'admin', '2020-02-27 09:15:07'),
(15, 9, 10, 1111, 'samsung', 1000, 'admin', '2020-02-27 09:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `sold_list`
--

CREATE TABLE `sold_list` (
  `id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `pay` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `returned_amount` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `sold_by` varchar(50) NOT NULL,
  `sold_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `year` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `day` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sold_list`
--

INSERT INTO `sold_list` (`id`, `sale_id`, `total_amount`, `pay`, `balance`, `returned_amount`, `sub_total`, `sold_by`, `sold_time`, `year`, `month`, `day`) VALUES
(25, 1, 2000, 2000, 0, 2000, 0, 'admin', '2020-02-20 18:51:19', '2020', '01', '21'),
(26, 2, 1000, 1000, 0, 0, 1000, 'admin', '2020-02-21 15:27:28', '2020', '02', '20'),
(27, 3, 1000, 1000, 0, 0, 1000, 'admin', '2020-02-21 15:48:19', '2020', '02', '21'),
(28, 4, 1000, 1000, 0, 0, 1000, 'admin', '2020-02-21 16:00:38', '2020', '02', '21'),
(29, 5, 1000, 1000, 0, 0, 1000, 'admin', '2020-01-21 16:17:51', '2020', '01', '21'),
(30, 6, 1000, 1000, 0, 0, 1000, 'admin', '2019-02-21 16:31:31', '2019', '02', '21'),
(31, 7, 1000, 1000, 0, 0, 1000, 'admin', '2020-02-23 04:37:24', '2020', '02', '22'),
(32, 8, 2000, 5000, 3000, 0, 2000, 'admin', '2020-02-23 06:30:47', '2020', '02', '23'),
(33, 9, 2000, 2000, 0, 0, 2000, 'admin', '2020-02-27 09:16:40', '2020', '02', '27'),
(34, 10, 2000, 2000, 0, 2000, 0, 'admin', '2020-02-27 09:19:45', '2020', '02', '27');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `suppliername` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `addedby` varchar(50) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `suppliername`, `contact`, `email`, `address`, `status`, `addedby`, `add_date`) VALUES
(2, 'malik', '031676767676', 'malik@gmail.com', 'ho giy', 2, 'admin', '2020-02-07 14:31:28'),
(4, 'mirxaA', '23', 'mir@gmai.com', 'mir', 2, 'admin', '2020-02-14 04:09:04'),
(5, 'ata', '80598', 'aa@ara', 'fsdfs', 2, 'admin', '2020-02-22 06:22:02'),
(6, 'ars', '2121', 'ars@gmail.com', 'ars address', 1, 'admin', '2020-02-27 08:38:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cell` int(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `cell`, `password`, `gender`, `status`, `reg_date`) VALUES
(1, 'mirza', 'mirza', 'admin', 12, 'mirza', 'Female', 'active', '2020-02-07 15:14:29'),
(2, 'arslan', 'arslan', 'arslan@gmail.com', 3102323, '0011', 'Male', '1', '2020-02-21 17:31:15'),
(3, 'usman', 'usman', 'usman@gmail.com', 2322, 'usman', 'Male', '1', '2020-02-21 17:32:02'),
(4, 'ali', 'ali', 'ali@gmail.com', 302, 'ali', 'Male', '1', '2020-02-21 17:32:43'),
(5, 'osama', 'osama', 'osama@gmail.com', 343523, 'osama', 'Female', '2', '2020-02-21 17:34:30'),
(11, 'hassan', 'hassan', 'hassan@gmail.com', 1234, 'hassan', 'Male', '1', '2020-02-27 08:02:10'),
(12, 'umar', 'umar', 'umar@gmail.com', 1234, 'umar', 'Female', '2', '2020-02-27 08:04:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `firstname` (`firstname`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productlist`
--
ALTER TABLE `productlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_list`
--
ALTER TABLE `purchase_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returned_back`
--
ALTER TABLE `returned_back`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_list`
--
ALTER TABLE `return_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_products`
--
ALTER TABLE `sale_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sold_list`
--
ALTER TABLE `sold_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `firstname` (`firstname`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `productlist`
--
ALTER TABLE `productlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `purchase_list`
--
ALTER TABLE `purchase_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `returned_back`
--
ALTER TABLE `returned_back`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `return_list`
--
ALTER TABLE `return_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sale_products`
--
ALTER TABLE `sale_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sold_list`
--
ALTER TABLE `sold_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
