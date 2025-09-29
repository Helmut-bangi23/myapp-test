-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2025 at 01:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommercedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_product`
--

CREATE TABLE `add_product` (
  `ID` int(5) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `pprice` int(10) NOT NULL,
  `pimg` varchar(100) NOT NULL,
  `pquantity` int(20) NOT NULL,
  `pdesc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_product`
--

INSERT INTO `add_product` (`ID`, `pname`, `pprice`, `pimg`, `pquantity`, `pdesc`) VALUES
(12, 'Morobe Bilas', 143, '1757683377780.jpg', 1, 'Headdress for Laddy '),
(13, 'Oro', 134, '1758335518688.jpg', 2, 'Tapa cloths and headlet for man'),
(14, 'Boar tust', 123, 'necklace.jfif', 2, 'from Morobe'),
(15, 'muruk feathers', 40, 'cassowary-removebg-preview.png', 1, 'muruk'),
(16, 'new paradise', 123, 'WHPHeaddress.jfif', 2, 'headdress'),
(17, 'Boar tusk single', 45, 'hb.jpg', 1, 'from sepik'),
(18, 'Madang bilum costume', 57, '1757679076384.jpg', 1, 'For Woman '),
(19, 'Hagen traditional bi', 26, '1757679941381.jpg', 1, 'headdress and purpur for ladies'),
(20, 'Headdress and tapa c', 67, '1758450278549.jpg', 1, 'Sepik full bilas especially for woman'),
(21, 'fhqGJHGFHS', 536, '1758351862428.jpg', 1, 'HJWFDGHJDF'),
(22, 'hwgbghw', 542, '1758352442827.jpg', 1, 'HJGFHJF'),
(24, 'yufYGJGFJ', 2134, '1758351862428.jpg', 1, 'dghjGAFHAS'),
(25, 'Hagen ', 45, '1757679941381.jpg', 1, 'lae city'),
(26, 'Tuffi Bilas', 45, '1758351885035.jpg', 1, 'Woman of tuffi with decoration');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(5) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `product_price` int(20) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_desc` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ID`, `product_name`, `product_price`, `product_image`, `product_desc`, `user_id`) VALUES
(54, 'Hagen ', 45, '1757679941381.jpg', 'lae city', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ordered`
--

CREATE TABLE `ordered` (
  `ID` int(10) NOT NULL,
  `customer_name` varchar(20) NOT NULL,
  `customer_mail` varchar(50) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_price` int(20) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'ordered',
  `Delivery_Date` date NOT NULL DEFAULT current_timestamp(),
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordered`
--

INSERT INTO `ordered` (`ID`, `customer_name`, `customer_mail`, `customer_address`, `product_name`, `product_price`, `product_image`, `status`, `Delivery_Date`, `created_at`) VALUES
(7, 'Mawat Banu', 'mbanu@example.com', 'Wasu', 'Kumul', 100, '3-removebg-preview.png', 'Approved', '2025-08-28', ''),
(9, 'Helmut Bangi', 'hbangi2019@gmail.com', 'Bumayong', 'Boar tusk single', 45, 'hb.jpg', 'Approved', '2025-09-10', ''),
(10, 'Helmut Bangi', 'hgbangi22@gmail.com', 'Bumayong', 'Morobe Bilas', 143, '1757683377780.jpg', 'Approved', '2025-09-24', ''),
(14, 'Mawat Banu', 'mbanu@example.com', 'Wasu', 'Boar tust', 123, 'necklace.jfif', 'Approved', '2025-09-24', ''),
(15, 'Zilla Komboi', 'zkomboi@example.com', 'Africa', 'Morobe Bilas', 143, '1757683377780.jpg', 'Delivered', '2025-09-26', ''),
(16, 'helmut Bangi', 'hbangi@example', 'DWU', 'Hagen traditional bi', 26, '1757679941381.jpg', 'Delivered', '2025-09-27', ''),
(17, 'helmut Bangi', 'hbangi@example', 'DWU', 'hwgbghw', 542, '1758352442827.jpg', 'Pending', '2025-09-27', ''),
(18, 'Helmut Bangi', 'hbangi@example', 'PO BOX 23, LAE 411 Morobe province', 'Tuffi Bilas', 45, '1758351885035.jpg', 'Delivered', '2025-09-28', ''),
(19, 'Helmut Bangi', 'hbangi@example', 'PO BOX 23, LAE 411 Morobe province', 'Hagen ', 45, '1757679941381.jpg', 'ordered', '2025-09-28', '');

-- --------------------------------------------------------

--
-- Table structure for table `otp_requests`
--

CREATE TABLE `otp_requests` (
  `id` int(11) NOT NULL,
  `recipient` varchar(255) NOT NULL,
  `otp_hash` varchar(255) NOT NULL,
  `purpose` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `expires_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=koi8r COLLATE=koi8r_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `ID` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zip` varchar(20) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_desc` text DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  `total_price` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `card_name` varchar(255) DEFAULT NULL,
  `card_number` varchar(20) DEFAULT NULL,
  `exp_month` varchar(10) DEFAULT NULL,
  `exp_year` varchar(10) DEFAULT NULL,
  `cvv` varchar(10) DEFAULT NULL,
  `transaction_date` datetime DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=koi8r COLLATE=koi8r_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(5) NOT NULL,
  `customer_name` varchar(20) NOT NULL,
  `customer_mail` varchar(30) NOT NULL,
  `customer_phone` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `customer_name`, `customer_mail`, `customer_phone`, `username`, `password`) VALUES
(3, 'Hele', 'hele@example.com', 761465125, 'Hele', 'hele123'),
(4, 'Mawat Banu', 'mbanu@example.com', 325153514, 'Mawat', 'mawat123'),
(5, 'Enoch Wimbera', 'ewimbera@exampl.com', 13435173, 'Enoch', 'enoch123'),
(6, 'Zilla Komboi', 'zkomboi@example.com', 63675753, 'Zilla', 'zilla123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_product`
--
ALTER TABLE `add_product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ordered`
--
ALTER TABLE `ordered`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `otp_requests`
--
ALTER TABLE `otp_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_product`
--
ALTER TABLE `add_product`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `ordered`
--
ALTER TABLE `ordered`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `otp_requests`
--
ALTER TABLE `otp_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
