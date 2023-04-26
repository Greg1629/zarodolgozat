-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2023 at 04:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cipo-raktar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(13, 'Lakos Gergő', 'Gergő', '249d6c99eff6d0ef6c470e4254629323'),
(15, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(17, 'Nagy István', 'nagyistvan', '9120ebcb5edab3837292d70085dd8cf1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(20, 'Jordan 1', 'Cipo_Modell387.PNG', 'Yes', 'Yes'),
(21, 'Air Force 1', 'Cipo_Modell581.png', 'Yes', 'Yes'),
(22, 'Jordan 4', 'Cipo_Modell668.png', 'Yes', 'Yes'),
(23, 'Jordan 3', 'Cipo_Modell856.png', 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cipo`
--

CREATE TABLE `tbl_cipo` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` int(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_cipo`
--

INSERT INTO `tbl_cipo` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(15, 'Air Force 1 White', '', 50000, 'Cipo_8688.png', 13, 'Yes', 'Yes'),
(16, 'Jordan 3 Fire red', '', 100000, 'Cipo_4076.png', 16, 'Yes', 'Yes'),
(17, 'Jordan 4 Militry Black', '', 180000, 'Cipo_1928.png', 14, 'Yes', 'Yes'),
(19, 'Jordan 1 Chicago', '', 160000, 'Cipo_6044.PNG', 9, 'Yes', 'Yes'),
(21, 'Jordan 4 Black Canvas', '', 135000, 'Cipo_7208.png', 14, 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `cipo` varchar(150) NOT NULL,
  `price` int(255) NOT NULL,
  `meret` int(11) NOT NULL,
  `total` int(255) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `cipo`, `price`, `meret`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(5, 'Jordan 1 Chicago', 150000, 1, 150000, '2023-01-09 03:51:17', 'Delivered', 'Gergő Lakos', '061234325', 'valami@gmail.com', 'Baross'),
(6, 'Jordan 1 Chicago', 150000, 42, 150000, '2023-04-07 03:08:52', 'Cancelled', 'fgddgfds', 'dsasad', 'gbcvvc@gmail.com', 'fhgdbfgh'),
(7, 'Jordan 1 Chicago', 150000, 42, 150000, '2023-04-08 01:19:10', 'Cancelled', 'fgddgfds', 'gfdgfdgdf', 'gbcvvc@gmail.com', 'fdgfgdfgdf'),
(14, 'Jordan 3 Fire red', 100000, 41, 100000, '2023-04-10 04:38:28', 'Ordered', 'Gergő Lakos', '123413245', 'dfsg@wsadfa', 'dcfxgvxcfb'),
(15, 'Air Force 1 Tiffany co', 400000, 46, 400000, '2023-04-13 01:35:23', 'Cancelled', 'fgddgfds', 'gfdgfdgdf', 'gbcvvc@xn--gmai-epa', 'bgcncg'),
(16, 'Jordan 4 Black Canvas', 135000, 43, 135000, '2023-04-13 04:13:35', 'Ordered', 'Kovács', 'Béla', 'kovacs.bela@gmail.com', 'Debrecen Kishegyesí út 40'),
(17, 'Jordan 4 Black Canvas', 135000, 43, 135000, '2023-04-13 05:03:15', 'Ordered', 'Kovács Béla', '+36201231234', 'kovacs.bela@gmail.com', 'Debrecen Kishegyesí út 40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cipo`
--
ALTER TABLE `tbl_cipo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_cipo`
--
ALTER TABLE `tbl_cipo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
