-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2022 at 04:00 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dietary_supplements`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `product_count` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `product_description` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_code`, `product_count`, `product_price`, `product_image`, `product_description`) VALUES
(1, 'Chip AMD Ryzen7 5800', '6563c89beaeb1e0e4871a1e9d441be9a', '15', '11400000', 'uploads/AMDRyzen75800X3D.jpg', 'CPU'),
(2, 'GTX 1650', '778f1a420a4499b35e8c9b2bce55f4bd', '10', '6500000', 'uploads/GTX1650.jpg', 'Card Màn Hình'),
(3, 'i3 10th', 'fd833a58b65b292a9b1f005c099ed7b7', '30', '2000000', 'uploads/i310th.jpg', 'CPU'),
(4, 'RAM DDR5 Kingston Fury Beast', '05dd1a5acf681bbd4a197861b21db071', '60', '9000000', 'uploads/kingstonfurybeast.jpg', 'Ram'),
(5, 'RTX 3070 Ventus 2x', '6c859351fe0e8b6d22b3a675642cf1fb', '10', '40000000', 'uploads/RTX3070Ventus2x.jpg', 'Card Màn Hình'),
(6, 'RTX 3080', '454ed3699fcbfc52158e6a379842cd6a', '20', '45600000', 'uploads/RTX3080.jpg', 'Card Màn Hình'),
(7, 'RTX 3090', '57a2f790a94cb3f9cee117ba362c8ae4', '20', '48000000', 'uploads/RTX3090.jpg', 'Card Màn Hình'),
(8, 'SSD Samsung 870 QVO 8TB 2.5', 'ad54c6867490f3288f598fce65d575d9', '26', '18500000', 'uploads/SSDSamsung870QVO8TB2.5.jpg', 'SSD'),
(9, 'SSD Kingston KC3000 2TB', '12b6be64ad0f66d6bd201cba57b3d630', '45', '1600000', 'uploads/SSDKingstonKC30002TB.jpg', 'SSD'),
(10, 'Trident Z5', '12b6be64ad0f66d6bd201cba57b3d630', '45', '1600000', 'uploads/TridentZ5.jpg', 'Ram');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_buy` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `bank_id` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `momo` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `delivery` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `product_id`, `product_buy`, `users_id`, `full_name`, `company`, `bank_name`, `bank_id`, `momo`, `status`, `delivery`) VALUES
(17, 2, 6, 105, 'KhachVIP', 'Công Ty TNHH HuyCute', 'ngân hàng MB', '0916238911', '', 'Đã thanh toán', 'Đã giao hàng'),
(1, 1, 12, 106, 'Lê Đinh Quang Huy', 'Công Ty TNHH Két zịt', '', '', '', 'Đã thanh toán', 'Đã giao hàng'),
(2, 9, 30, 106, 'Lê Đinh Quang Huy', 'Công Ty TNHH Két zịt', '', '', '0915488487', 'Đã thanh toán', 'Chưa giao hàng'),
(4, 5, 5, 107, 'Nguyễn Khắc Minh Luân', 'Công Ty TNHH LuânHeHe', '', '', '', 'Chưa thanh toán', 'Chưa giao hàng');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `lv` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `token`, `lv`, `company`, `phone_number`) VALUES
(100, 'Kế toán', 'ketoan@gmail.com', '4297f44b13955235245b2497399d7a93', '14c6bf639ff0f005c37b4e34fad4ef05', 'admin', 'Power', '1234567890'),
(105, 'KhachVIP', 'huyle012300@gmail.com', '4297f44b13955235245b2497399d7a93', 'e739845a8d210e18fae51474dfa74041', 'Đại Lý', 'Công Ty TNHH HuyCute', '0912345678'),
(106, 'Lê Đinh Quang Huy', 'mikasa1281995@gmail.com', '4297f44b13955235245b2497399d7a93', 'b46bd7ce927c1adde173b4bcce81020b', 'Đại Lý', 'Công Ty Kít Zẹt', '0915488487'),
(107, 'Nguyễn Khắc Minh Luân', 'askuraido@gmail.com', '4297f44b13955235245b2497399d7a93', 'bf60ce81d05576124e0b6506416f3396', 'Đại Lý', 'Công Ty LuânHeHe', '0326019634');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
