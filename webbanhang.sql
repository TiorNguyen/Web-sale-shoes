-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 07, 2023 lúc 10:48 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webbanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `admin_status`) VALUES
(2, 'tu.nm215156', 'f93f6389d0174fe733babc219344025e', 1),
(4, 'tutu123', '4297f44b13955235245b2497399d7a93', 1),
(5, 'tutu123', '4297f44b13955235245b2497399d7a93', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id_cart` int(11) NOT NULL,
  `id_dangky` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`id_cart`, `id_dangky`) VALUES
(41, 17),
(42, 17),
(31, 18),
(32, 18),
(33, 18),
(34, 18),
(35, 18);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart_chitiet`
--

CREATE TABLE `tbl_cart_chitiet` (
  `id_cart_chitiet` int(11) NOT NULL,
  `soluong_cart_chitiet` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `id_cart` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart_chitiet`
--

INSERT INTO `tbl_cart_chitiet` (`id_cart_chitiet`, `soluong_cart_chitiet`, `id_sanpham`, `id_cart`) VALUES
(20, 5, 59, 32),
(21, 1, 55, 33),
(22, 1, 54, 34),
(23, 1, 48, 35),
(28, 3, 60, 41),
(29, 1, 46, 42);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dangky`
--

CREATE TABLE `tbl_dangky` (
  `id_dangky` int(11) NOT NULL,
  `tenkhachhang` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `dienthoai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_dangky`
--

INSERT INTO `tbl_dangky` (`id_dangky`, `tenkhachhang`, `email`, `diachi`, `matkhau`, `dienthoai`) VALUES
(14, 'Nguyen Minh Tu', 'minhtu5bhl@gmail.com', 'Ha Noi', '0da3b1b84bdfe051c65db5fabfaf0d5c', '0333757964'),
(15, 'Nguyen Minh Tu', 'minhtu5bhl@gmail.com', 'Hung Ha Thai Binh', '4297f44b13955235245b2497399d7a93', '11111111'),
(17, 'Nguyen Minh Tu', 'tu@gmail.com', 'Ha Noi', '658d128f20ee88e00e9607a475cdfaa5', '111111'),
(18, 'Nguyen Minh Tu', 'tu1@gmail.com', 'Ha Noi', '4297f44b13955235245b2497399d7a93', '1111111'),
(19, 'Nguyen Minh Tu', 'tutu@gmail.com', 'Ha Noi', '4297f44b13955235245b2497399d7a93', '1111111');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `tendanhmuc` varchar(100) NOT NULL,
  `thutu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id_danhmuc`, `tendanhmuc`, `thutu`) VALUES
(9, 'Adidas', 3),
(22, 'Nike', 2),
(32, 'New Balance', 1),
(34, 'Thuong Dinh', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `tensanpham` varchar(150) NOT NULL,
  `masp` varchar(100) NOT NULL,
  `giasp` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhanh` varchar(50) NOT NULL,
  `tomtat` tinytext NOT NULL,
  `noidung` text NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `id_danhmuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sanpham`, `tensanpham`, `masp`, `giasp`, `soluong`, `hinhanh`, `tomtat`, `noidung`, `tinhtrang`, `id_danhmuc`) VALUES
(41, 'adidas4', '04', '267676', 5, 'adidas3.webp', 'qưeq', 'qưe', 1, 9),
(46, 'adidas11', '07', '222222', 3, 'giay5.webp', 'vvvvvv', 'sssss', 1, 9),
(48, 'adidas13', '09', '24323', 2, 'giay14.webp', 'qqqqqq', 'vvvvvvv', 1, 9),
(50, 'Nike1', '01', '23000', 2, 'nike1.webp', 'aaa', 'ddddd', 1, 22),
(51, 'Nike2', '02', '22222', 3, 'nike2.webp', '3333333', 'vvvvvvv', 1, 22),
(52, 'Nike3', '03', '267676', 3, 'nike3.jpg', 'dddddd', 'gggg', 1, 22),
(53, 'Nike4', '04', '4444444', 2, 'nike4.webp', 'cccccc', 'aaaaaa', 1, 22),
(54, 'New Balance 1', '01', '250000', 1, 'new1.webp', 'Giay xin', 'aaa', 1, 32),
(55, 'New Balance 2', '02', '23000', 1, 'new2.webp', 'aaaaaa', 'new', 1, 32),
(59, 'New Balance 3', '03', '24323', 3, 'new3.webp', 'aaaa', 'sssssss', 1, 32),
(60, 'New Balance 4', '04', '4444444', 3, 'new4.webp', 'zzzzzzzz', 'sssssss', 1, 32),
(63, 'Balenciaga tripple', '10', '5000000', 111, 'balenciaga-triple-s-black-white-8.jpg', 'aaa', 'abc', 1, 32),
(67, 'Thuong Dinh 3', '14', '111111', 11, 'ad5d4cedb43c2e56d5f4abeb344fbf2a.jpg', 'a', 'b', 1, 34),
(69, 'Thuong Dinh 4', '20', '2300000', 20, 'air-force-1-07-shoes-WrLlWX.png', 'a', 'b', 1, 34);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `id_shipping` int(11) NOT NULL,
  `tenkhachhang` varchar(100) NOT NULL,
  `dienthoai` varchar(50) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `ghichu` varchar(255) NOT NULL,
  `id_dangky` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`id_shipping`, `tenkhachhang`, `dienthoai`, `diachi`, `ghichu`, `id_dangky`) VALUES
(11, 'Nguyen Minh Tu', '111111', 'Ha Noi', 'aaa', 18),
(12, 'Nguyen Tuan Huy', '1111111', 'Ha Noi', 'aaaaa', 19),
(13, 'Nguyen Minh Tu', '11111111', 'Ha Noi', 'abc', 17);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_dangky` (`id_dangky`);

--
-- Chỉ mục cho bảng `tbl_cart_chitiet`
--
ALTER TABLE `tbl_cart_chitiet`
  ADD PRIMARY KEY (`id_cart_chitiet`),
  ADD KEY `id_sanpham` (`id_sanpham`),
  ADD KEY `id_cart` (`id_cart`);

--
-- Chỉ mục cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  ADD PRIMARY KEY (`id_dangky`);

--
-- Chỉ mục cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sanpham`),
  ADD KEY `id_danhmuc` (`id_danhmuc`);

--
-- Chỉ mục cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`id_shipping`),
  ADD KEY `id_dangky` (`id_dangky`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `tbl_cart_chitiet`
--
ALTER TABLE `tbl_cart_chitiet`
  MODIFY `id_cart_chitiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  MODIFY `id_dangky` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `id_shipping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`id_dangky`) REFERENCES `tbl_dangky` (`id_dangky`);

--
-- Các ràng buộc cho bảng `tbl_cart_chitiet`
--
ALTER TABLE `tbl_cart_chitiet`
  ADD CONSTRAINT `tbl_cart_chitiet_ibfk_2` FOREIGN KEY (`id_sanpham`) REFERENCES `tbl_sanpham` (`id_sanpham`),
  ADD CONSTRAINT `tbl_cart_chitiet_ibfk_3` FOREIGN KEY (`id_cart`) REFERENCES `tbl_cart` (`id_cart`);

--
-- Các ràng buộc cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD CONSTRAINT `tbl_sanpham_ibfk_1` FOREIGN KEY (`id_danhmuc`) REFERENCES `tbl_danhmuc` (`id_danhmuc`);

--
-- Các ràng buộc cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD CONSTRAINT `tbl_shipping_ibfk_1` FOREIGN KEY (`id_dangky`) REFERENCES `tbl_dangky` (`id_dangky`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
