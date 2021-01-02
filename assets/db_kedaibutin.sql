-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2021 at 07:31 PM
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
(1, 'Makanan', '2021-01-02 23:12:52', NULL),
(2, 'Minuman', '2021-01-02 23:12:57', NULL),
(3, 'Lainnya', '2021-01-02 23:13:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `material_id` int(11) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
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
(1, 'A001', 'Terigu', 1, 25000, 3, 0, '', '2021-01-02 23:19:34', '2021-01-02 17:30:22'),
(2, 'A002', 'Better', 1, 26000, 1, 50, '', '2021-01-02 23:20:00', NULL),
(3, 'A003', 'Teh Gelas', 2, 25000, 2, 0, '', '2021-01-02 23:20:27', NULL),
(4, 'A004', 'Yupi', 1, 5000, 1, 100, '', '2021-01-02 23:20:53', NULL),
(5, 'A005', 'Energen', 2, 20000, 1, 0, '', '2021-01-02 23:21:27', NULL),
(6, 'B001', 'Head &amp; Shoulder', 3, 50000, 2, 0, '', '2021-01-02 23:22:16', NULL),
(7, 'B002', 'Greentea', 2, 19000, 2, 0, '', '2021-01-02 23:24:22', NULL),
(8, 'B003', 'Oreo', 1, 9000, 1, 0, '', '2021-01-02 23:26:35', NULL),
(9, 'B004', 'Sosis Sonice', 1, 15000, 1, 0, '', '2021-01-02 23:28:01', NULL),
(10, 'B005', 'Richies Nabati', 1, 6000, 1, 0, '', '2021-01-02 23:28:30', NULL),
(11, 'C001', 'Autan', 3, 10000, 1, 0, '', '2021-01-02 23:29:29', NULL);

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
  `quantity` int(11) NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`stock_id`, `material_id`, `type`, `notes`, `supplier_id`, `quantity`, `date`, `created`, `user_id`) VALUES
(1, 2, 'in', NULL, 1, 50, '2021-01-02', '2021-01-02 23:30:51', 252),
(2, 4, 'in', 'Hadiah', 2, 100, '2021-01-02', '2021-01-02 23:34:42', 252);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` text NOT NULL,
  `address` varchar(100) NOT NULL,
  `notes` varchar(100) NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `name`, `phone`, `address`, `notes`, `created`, `updated`) VALUES
(1, 'Warung ma Emin', '085655553515', 'Puseurjaya', 'Warung', '2021-01-02 23:13:32', NULL),
(2, 'Warung Anyar', '085155664488', 'Puseurjaya', '', '2021-01-02 23:14:02', '2021-01-02 17:18:46'),
(3, 'Ko Tiong', '08563584569', 'Karawang barat', 'China', '2021-01-02 23:24:55', NULL);

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
(1, 'Pak', '2021-01-02 23:12:29', NULL),
(2, 'Dus', '2021-01-02 23:12:35', NULL),
(3, 'Kilo', '2021-01-02 23:12:42', NULL);

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
  `level` int(11) NOT NULL,
  `image` varchar(50) DEFAULT 'login.jpg' COMMENT '1:admin 2:pramuniaga',
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `password`, `address`, `level`, `image`, `created`, `updated`) VALUES
(252, 'Tri Denda', 'tridenda', 'eee6971ffe36d64f05f60cc30219c97a20008f0e', 'Puseurjaya', 1, 'user-201227-b930ecf57a.jpg', '2020-12-27 21:28:51', '2020-12-29 12:40:31'),
(253, 'Kartinah Papika', 'kartinah', 'fa183f7f922672d77047fe8d7872cdea35752d67', 'Sirnabaya', 1, 'login.jpg', '2020-12-27 21:31:39', NULL),
(254, 'Shinta', 'shinta', '0055c4cac213a75414af02cf641ec2ba9a771620', '', 2, 'login.jpg', '2020-12-27 21:36:15', '2020-12-27 18:08:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`material_id`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `unit_id` (`unit_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `materials_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `materials_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `units` (`unit_id`);

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
