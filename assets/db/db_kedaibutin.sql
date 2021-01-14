-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2021 at 04:56 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kedaibutin`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `activity_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notes` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `attendance_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `salary_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `overtime_hour` int(11) NOT NULL COMMENT 'hour',
  `notes` enum('hadir','cuti','lembur','lainnya') DEFAULT NULL,
  `status` text DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`attendance_id`, `user_id`, `salary_id`, `date`, `overtime_hour`, `notes`, `status`, `created`, `updated`) VALUES
(29, 1, 11, '2021-01-10 09:24:26', 0, 'hadir', NULL, '2021-01-10 09:24:26', '2021-01-10 16:01:47'),
(30, 1, 11, '2021-01-10 17:05:35', 12, 'lembur', NULL, '2021-01-10 17:05:35', '2021-01-13 13:01:03'),
(31, 3, 13, '2021-01-10 17:55:08', 0, 'cuti', NULL, '2021-01-10 17:55:08', '2021-01-10 17:01:29'),
(32, 1, 11, '2021-02-13 09:46:45', 0, 'hadir', 'terbayar', '2021-01-13 09:46:45', NULL),
(33, 1, 11, '2021-01-13 13:03:08', 12, 'lembur', NULL, '2021-01-13 13:03:08', '2021-01-13 13:01:25'),
(38, 1, 11, '2021-01-14 15:53:55', 0, 'hadir', NULL, '2021-01-14 15:53:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `created`, `updated`) VALUES
(1, 'Makanan', '2021-01-07 16:18:05', NULL),
(2, 'Minuman', '2021-01-07 16:18:10', NULL),
(3, 'Lainnya', '2021-01-07 16:18:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `material_id` int(11) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `image` varchar(50) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`material_id`, `barcode`, `name`, `category_id`, `price`, `unit_id`, `quantity`, `image`, `created`, `updated`) VALUES
(1, 'KB2101070001', 'Aqua Gelas', 2, 19000, 3, 17, '', '2021-01-07 16:21:44', NULL),
(2, 'KB2101070002', 'Teh Gelas', 2, 20000, 3, 10, '', '2021-01-07 16:22:07', NULL),
(3, 'KB2101070003', 'Beng-beng', 1, 15000, 4, 10, '', '2021-01-07 16:22:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `salary_id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `salary` varchar(50) NOT NULL COMMENT 'rupiah permonth',
  `meal_allowance` varchar(20) DEFAULT NULL COMMENT 'rupiah permonth',
  `transport_allowance` varchar(20) DEFAULT NULL COMMENT 'rupiah permonth',
  `overtime_allowance` varchar(20) DEFAULT NULL COMMENT 'rupiah perhour',
  `other_allowance` varchar(20) DEFAULT NULL COMMENT 'rupiah permonth',
  `worktime` int(11) NOT NULL COMMENT 'hour perday',
  `annual_leave` int(11) NOT NULL COMMENT 'day peryear',
  `workdaysum` int(11) DEFAULT NULL COMMENT 'day peryear',
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`salary_id`, `date`, `user_id`, `salary`, `meal_allowance`, `transport_allowance`, `overtime_allowance`, `other_allowance`, `worktime`, `annual_leave`, `workdaysum`, `created`, `updated`) VALUES
(11, 2021, 1, '1500000', '200000', '100000', '10000', '2000000', 12, 12, 300, '2021-01-09 19:47:55', '2021-01-13 13:03:03'),
(13, 2021, 3, '1000000', '200000', '100000', '10000', NULL, 12, 12, 300, '2021-01-10 09:27:54', '2021-01-11 09:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `stock_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `type` enum('in','out','missing','founded') NOT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `price` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`stock_id`, `material_id`, `type`, `notes`, `supplier_id`, `price`, `quantity`, `date`, `created`, `user_id`) VALUES
(1, 3, 'in', NULL, 1, '15000', 3, '2021-01-07', '2021-01-07 16:34:29', 1),
(2, 3, 'out', NULL, NULL, '15000', 2, '2021-01-07', '2021-01-07 16:39:39', 1),
(3, 3, 'out', NULL, NULL, '15000', 1, '2021-01-07', '2021-01-07 16:41:12', 1),
(4, 1, 'in', NULL, 1, '19000', 20, '2021-01-07', '2021-01-07 16:41:33', 1),
(5, 2, 'in', NULL, 2, '20000', 12, '2021-01-07', '2021-01-07 16:42:21', 1),
(6, 3, 'in', NULL, NULL, '15000', 10, '2021-01-07', '2021-01-07 16:42:45', 1),
(7, 1, 'missing', NULL, NULL, '19000', 2, '2021-01-07', '2021-01-07 16:43:11', 1),
(8, 2, 'missing', NULL, NULL, '20000', 2, '2021-01-07', '2021-01-07 16:43:21', 1),
(9, 1, 'out', NULL, NULL, '19000', 3, '2021-01-07', '2021-01-07 16:43:48', 1),
(10, 1, 'founded', NULL, NULL, '19000', 2, '2021-01-07', '2021-01-07 16:48:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` text DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `notes` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `name`, `phone`, `address`, `notes`, `created`, `updated`) VALUES
(1, 'Warung Maemin', '085655553515', 'Puseurjaya', 'Warung kecil-kecilan', '2021-01-07 16:19:45', NULL),
(2, 'Ko Tiong', '085165487532', 'Karawang Barat', 'Toko China', '2021-01-07 16:20:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unit_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unit_id`, `name`, `created`, `updated`) VALUES
(1, 'Kilo', '2021-01-07 16:18:23', '2021-01-07 16:19:05'),
(2, 'Gram', '2021-01-07 16:18:27', NULL),
(3, 'Dus', '2021-01-07 16:18:31', NULL),
(4, 'Pak', '2021-01-07 16:18:35', NULL),
(5, 'Kuintal', '2021-01-07 16:18:47', NULL),
(6, 'Renceng', '2021-01-07 16:18:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `level` enum('1','2','3') NOT NULL COMMENT '1:admin 2:pramuniaga 3:pramusaji',
  `image` varchar(50) DEFAULT 'login.jpg',
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `password`, `address`, `level`, `image`, `created`, `updated`) VALUES
(1, 'Tri Denda', 'tridenda', 'eee6971ffe36d64f05f60cc30219c97a20008f0e', 'Puseurjaya', '1', 'user-210114-97a6d2fe94.jpg', '2021-01-07 15:02:18', '2021-01-14 20:55:27'),
(3, 'Jamal', 'pramuniaga', '638a014ab7a78f797cf3e93be52f3c09b471855a', 'Tasikmalaya', '2', 'user-210108-33129c2acb.PNG', '2021-01-07 15:35:28', '2021-01-08 22:25:36'),
(4, 'Kartinah', 'kartinah', 'fa183f7f922672d77047fe8d7872cdea35752d67', 'Sirnabaya', '1', 'login.jpg', '2021-01-08 01:34:38', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`activity_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `user_id` (`user_id`,`salary_id`),
  ADD KEY `salary_id` (`salary_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`material_id`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`salary_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `material_id` (`material_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `created` (`created`),
  ADD KEY `stocks_ibfk_3` (`user_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendances_ibfk_2` FOREIGN KEY (`salary_id`) REFERENCES `salaries` (`salary_id`) ON UPDATE CASCADE;

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `materials_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `materials_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `units` (`unit_id`);

--
-- Constraints for table `salaries`
--
ALTER TABLE `salaries`
  ADD CONSTRAINT `salaries_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_ibfk_1` FOREIGN KEY (`material_id`) REFERENCES `materials` (`material_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stocks_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stocks_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
