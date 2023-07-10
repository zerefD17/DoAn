-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 23, 2023 at 04:30 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_blog1`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `idus` int NOT NULL,
  `proid` int NOT NULL,
  `qty` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `idus`, `proid`, `qty`) VALUES
(7, 1, 12, 2),
(8, 1, 16, 2),
(10, 1, 41, 1);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int NOT NULL,
  `name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` int NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `img`, `type`, `price`) VALUES
(9, 'BURGER THAN TRE', 'h1.jpg', 1, 99000),
(10, 'BURGER BÒ SỐT PHÔ MAI', 'h2.jpg', 1, 49000),
(11, 'BURGER GÀ SỐT PHÔ MAI', 'h3.jpg', 1, 39000),
(12, 'BURGER CÁ', 'h4.jpg', 1, 35000),
(13, 'BURGER THỊT XÔNG KHÓI', 'h5.jpg', 1, 40000),
(14, 'BURGER 2 MIẾNG BÒ', 'h6.jpg', 1, 60000),
(15, 'PIZZA RAU CỦ', 'h7.jpg', 2, 40000),
(16, 'PIZZA HẢI SẢN', 'h8.jpg', 2, 60000),
(17, 'PIZZA XÚC XÍCH', 'h9.jpg', 2, 50000),
(18, 'PIZZA THỊT VÀ XÚC XÍCH', 'h10.jpg', 2, 70000),
(19, 'PIZZA PHÔ MAI', 'h11.jpg', 2, 39000),
(20, 'PIZZA BÒ', 'h12.jpg', 2, 69000),
(21, 'KEM DÂU', 'h13.jpg', 3, 20000),
(22, 'KEM DỪA', 'h14.jpg', 3, 20000),
(23, 'KEM VANI', 'h15.jpg', 3, 30000),
(24, 'KEM SẦU RIÊNG', 'h16.jpg', 3, 25000),
(25, 'KEM CHUỐI', 'h17.jpg', 3, 20000),
(26, 'KEM SOCOLA', 'h18.jpg', 3, 30000),
(27, 'COCA COLA', 'h19.jpg', 4, 20000),
(28, 'PEPSI', 'h20.jpg', 4, 20000),
(29, 'FANTA CAM', 'h21.jpg', 4, 25000),
(30, 'NƯỚC CAM', 'h22.jpg', 4, 30000),
(31, 'STING', 'h23.jpg', 4, 20000),
(32, 'NUMBER ONE', 'h24.jpg', 4, 20000),
(33, 'Chesse Cake', 'h25.jpg', 5, 30000),
(34, 'Tiramisu', 'h26.jpg', 5, 40000),
(35, 'Black Forest', 'h27.jpg', 5, 50000),
(36, 'Victoria Sponge', 'h28.jpg', 5, 50000),
(37, 'Sachertorte', 'h29.jpg', 5, 50000),
(38, 'Swedish Princess', 'h30.jpg', 5, 50000),
(39, 'BÁNH MÌ', 'h31.jpg', 6, 25000),
(40, 'XÔI MẶN THẬP CẨM', 'h32.jpg', 6, 30000),
(41, 'HỦ TIẾU NAM VANG', 'h33.jpg', 6, 40000),
(42, 'CƠM TẤM SƯỜN', 'h34.jpg', 6, 35000),
(43, 'CƠM TẤM SƯỜN BÌ ', 'h35.jpg', 6, 40000),
(44, 'CƠM TẤM SƯỜN BÌ CHẢ', 'h36.jpg', 6, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sdt` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `diachi` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gioitinh` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `accname` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `power` varchar(256) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `sdt`, `diachi`, `gioitinh`, `accname`, `pass`, `power`) VALUES
(1, 'Dương Minh Sang', '032486', 'Biên hòa Đông Nai', 'Nam', 'sangad', '$2y$10$dqvZNzBKV8BTu/kUgsalWe5YQIZorx2nrLxVLvq0WZrn6htVdh9TO', 'admin'),
(5, 'minh sang', '0123456789', 'viet nam bien hoa', 'nam', 'sang123', '$2y$10$brAXhViTWIFGhkU4DrWcguR5Ls9Dk.3xOngic4s8/rTRaslLLd95W', 'user'),
(6, 'sang minh', '0987654321', 'bien hoa', 'nam', 'sang1', '$2y$10$iL.XAJomX.h0d4yJLikBcO.Gi.SY45n3pZzkuM/qUPJvH0GrpF3sO', 'user'),
(7, 'duong minh sang', '0192345678', 'bien hoa', 'nam', 'sang2', '$2y$10$quVcIx9zVMQp/2GciVXB.u3IlhFN/LO9uLxQSoTaI.XAXYipJCnDS', 'user'),
(8, 'duong sang', '0129876543', 'dong nai', 'nam', 'sang3', '$2y$10$.sHuYcaIUr7Qs/KD0uRrYOGmNWQ1imRCvzLwWcive8DrPrk5V39Du', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idus` (`idus`),
  ADD KEY `proid` (`proid`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`idus`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`proid`) REFERENCES `food` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
