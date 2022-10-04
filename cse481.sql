-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 04, 2022 lúc 07:11 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cse481`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phone_number`, `address`, `password`) VALUES
(1, 'vu hoang', 'a1@gmail.com', 868624001, 'vietnam', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `inventory_table1`
--

CREATE TABLE `inventory_table1` (
  `inventory_id` int(6) NOT NULL,
  `product` varchar(50) DEFAULT NULL,
  `product_code` int(11) DEFAULT NULL,
  `producer` varchar(100) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `input_price` int(11) DEFAULT NULL,
  `output_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `inventory_table1`
--

INSERT INTO `inventory_table1` (`inventory_id`, `product`, `product_code`, `producer`, `amount`, `input_price`, `output_price`) VALUES
(3, 'chén', 12, 'v', 39, 1, NULL),
(4, 'vu', 23, 'hoàng', 200, 1200, NULL),
(5, 'ly', 200, 'hoàng', 20, 200, NULL),
(6, 'gáo', 45, 'vu', 19, 200, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_table1`
--

CREATE TABLE `order_table1` (
  `order_id` int(6) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `product` varchar(50) DEFAULT NULL,
  `product_code` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `producer` varchar(100) DEFAULT NULL,
  `date_order` varchar(30) DEFAULT NULL,
  `status` varchar(5) DEFAULT NULL,
  `request` char(10) DEFAULT 'xác nhận'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_table1`
--

INSERT INTO `order_table1` (`order_id`, `staff_id`, `product`, `product_code`, `amount`, `price`, `producer`, `date_order`, `status`, `request`) VALUES
(5, 1, 'chén', 12, 20, 200, 'v', '00:47/2022-11-02', 'nhập', 'checked'),
(6, 1, 'vu', 23, 200, 1200, 'hoàng', '00:04/2022-10-25', 'nhập', 'checked'),
(8, 1, 'chén', 12, 19, 1, 'v', '00:13/2022-10-27', 'xuất', 'checked'),
(13, 1, 'ly', 200, 20, 200, 'hoàng', '01:34/2022-10-25', 'nhập', 'checked'),
(16, 1, 'gáo', 45, 19, 200, 'vu', '01:37/2022-10-31', 'nhập', 'checked');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staff_table1`
--

CREATE TABLE `staff_table1` (
  `staff_id` int(6) NOT NULL,
  `gender` char(3) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone_num` varchar(50) DEFAULT NULL,
  `birth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `staff_table1`
--

INSERT INTO `staff_table1` (`staff_id`, `gender`, `name`, `email`, `phone_num`, `birth`) VALUES
(1, 'nữ', 'nhi', 'staff1@gmail.com', '1', '2022-10-12');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `inventory_table1`
--
ALTER TABLE `inventory_table1`
  ADD PRIMARY KEY (`inventory_id`),
  ADD UNIQUE KEY `product_code` (`product_code`);

--
-- Chỉ mục cho bảng `order_table1`
--
ALTER TABLE `order_table1`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Chỉ mục cho bảng `staff_table1`
--
ALTER TABLE `staff_table1`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_num` (`phone_num`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `inventory_table1`
--
ALTER TABLE `inventory_table1`
  MODIFY `inventory_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `order_table1`
--
ALTER TABLE `order_table1`
  MODIFY `order_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `staff_table1`
--
ALTER TABLE `staff_table1`
  MODIFY `staff_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order_table1`
--
ALTER TABLE `order_table1`
  ADD CONSTRAINT `order_table1_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff_table1` (`staff_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
