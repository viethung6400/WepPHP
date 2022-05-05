-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 31, 2021 lúc 04:16 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlydathang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `SoDonDH` int(11) NOT NULL,
  `MSHH` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GiaDatHang` bigint(20) NOT NULL,
  `GiamGia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdathang`
--

INSERT INTO `chitietdathang` (`SoDonDH`, `MSHH`, `SoLuong`, `GiaDatHang`, `GiamGia`) VALUES
(5, 1, 5, 1200000, 0),
(5, 6, 3, 504000, 10),
(6, 2, 1, 180000, 0),
(6, 3, 1, 145000, 0),
(6, 4, 1, 99900, 0),
(6, 5, 2, 370000, 0),
(11, 1, 1, 240000, 0),
(11, 6, 1, 168000, 0),
(12, 2, 1, 180000, 0),
(12, 3, 1, 145000, 0),
(12, 5, 1, 185000, 0),
(12, 6, 1, 168000, 0),
(13, 2, 1, 180000, 0),
(13, 3, 1, 145000, 0),
(13, 5, 2, 370000, 0),
(13, 6, 1, 168000, 0),
(14, 2, 1, 180000, 0),
(14, 3, 1, 145000, 0),
(14, 4, 1, 99900, 0),
(14, 5, 1, 185000, 0),
(15, 5, 1, 185000, 0),
(16, 2, 1, 180000, 0),
(17, 5, 2, 370000, 0),
(18, 1, 1, 240000, 0),
(18, 5, 1, 185000, 0),
(19, 2, 1, 180000, 0),
(20, 3, 1, 145000, 0),
(21, 3, 1, 145000, 0),
(21, 5, 1, 185000, 0),
(21, 6, 1, 168000, 0),
(22, 1, 1, 240000, 0),
(23, 2, 1, 180000, 0),
(24, 1, 1, 240000, 0),
(25, 5, 1, 185000, 0),
(26, 1, 1, 240000, 0),
(27, 4, 1, 99900, 0),
(28, 1, 1, 240000, 0),
(29, 3, 1, 145000, 0),
(30, 6, 1, 168000, 0),
(31, 2, 1, 180000, 0),
(32, 3, 2, 290000, 0),
(33, 1, 1, 240000, 0),
(33, 3, 1, 145000, 0),
(34, 2, 1, 180000, 0),
(35, 1, 1, 240000, 0),
(36, 6, 1, 168000, 0),
(37, 2, 1, 180000, 0),
(38, 1, 1, 240000, 0),
(39, 6, 1, 168000, 0),
(40, 4, 1, 99900, 0),
(41, 6, 3, 504000, 0),
(42, 1, 3, 720000, 0),
(43, 1, 2, 480000, 0),
(43, 6, 3, 504000, 0),
(44, 6, 1, 168000, 0),
(45, 5, 2, 370000, 0),
(46, 5, 1, 185000, 0),
(48, 13, 1, 159000, 0),
(49, 1, 1, 240000, 0),
(50, 6, 1, 168000, 0),
(51, 14, 1, 199000, 0),
(52, 16, 1, 990000, 0),
(53, 2, 1, 180000, 0),
(55, 1, 2, 480000, 0),
(56, 9, 2, 210000, 0),
(57, 1, 1, 240000, 0),
(57, 6, 1, 168000, 0),
(58, 7, 1, 140000, 0),
(58, 16, 1, 990000, 0),
(59, 4, 1, 99900, 0),
(60, 2, 1, 180000, 0),
(60, 6, 1, 168000, 0),
(61, 3, 1, 145000, 0),
(61, 16, 1, 990000, 0),
(62, 1, 1, 240000, 0),
(62, 2, 1, 180000, 0),
(62, 8, 1, 2100000, 0),
(63, 5, 1, 185000, 0),
(64, 7, 2, 280000, 0),
(65, 1, 1, 240000, 0),
(65, 3, 1, 145000, 0),
(65, 5, 1, 185000, 0),
(66, 7, 1, 140000, 0),
(66, 20, 1, 295000, 0),
(67, 5, 1, 185000, 0),
(68, 2, 1, 180000, 0),
(70, 20, 2, 590000, 0),
(71, 2, 1, 180000, 0),
(71, 15, 1, 135000, 0),
(72, 4, 1, 99900, 0),
(73, 2, 1, 180000, 0),
(74, 1, 1, 240000, 0),
(74, 2, 1, 180000, 0),
(75, 7, 6, 840000, 0),
(75, 13, 1, 159000, 0),
(75, 16, 1, 990000, 0),
(76, 7, 1, 140000, 0),
(77, 1, 1, 240000, 0),
(77, 2, 2, 360000, 0),
(78, 6, 1, 168000, 0),
(78, 13, 2, 318000, 0),
(79, 5, 1, 185000, 0),
(79, 6, 1, 168000, 0),
(79, 8, 1, 2100000, 0),
(79, 14, 1, 199000, 0),
(80, 2, 1, 180000, 0),
(80, 9, 1, 105000, 0),
(80, 14, 1, 199000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

CREATE TABLE `dathang` (
  `SoDonDH` int(11) NOT NULL,
  `MSKH` int(11) DEFAULT NULL,
  `MSNV` int(11) DEFAULT NULL,
  `NgayDH` date DEFAULT current_timestamp(),
  `NgayGH` date DEFAULT NULL,
  `TrangThai` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dathang`
--

INSERT INTO `dathang` (`SoDonDH`, `MSKH`, `MSNV`, `NgayDH`, `NgayGH`, `TrangThai`) VALUES
(5, NULL, NULL, NULL, NULL, 'Chưa đặt'),
(6, 5, 11, NULL, NULL, 'Đã xác nhận'),
(11, 5, 11, NULL, NULL, 'Đã xác nhận'),
(12, 51, 11, NULL, NULL, 'Đã hủy'),
(13, 52, NULL, '2021-05-12', NULL, 'Đã hủy'),
(14, 51, 1, '2021-05-12', NULL, 'Đã hủy'),
(15, 51, 1, '2021-05-12', NULL, 'Đã xác nhận'),
(16, 51, 1, '2021-05-12', NULL, 'Đã xác nhận'),
(17, 53, 1, '2021-05-12', NULL, 'Đã hủy'),
(18, 53, 1, '2021-05-12', NULL, 'Đã hủy'),
(19, 53, 1, '2021-05-12', NULL, 'Đã hủy'),
(20, 54, 1, '2021-05-13', NULL, 'Đã xác nhận'),
(21, 59, 1, '2021-05-13', NULL, 'Đã hủy'),
(22, 59, 1, '2021-05-13', NULL, 'Đã hủy'),
(23, 59, 1, '2021-05-13', NULL, 'Đã hủy'),
(24, 59, 1, '2021-05-13', NULL, 'Đã xác nhận'),
(25, 59, 1, '2021-05-13', NULL, 'Đã hủy'),
(26, 59, 1, '2021-05-13', NULL, 'Đã hủy'),
(27, 59, 1, '2021-05-13', NULL, 'Đã xác nhận'),
(28, 59, 1, '2021-05-13', NULL, 'Đã hủy'),
(29, 59, 1, '2021-05-13', NULL, 'Đã xác nhận'),
(30, 59, 1, '2021-05-13', NULL, 'Đã hủy'),
(31, 53, 1, '2021-05-13', NULL, 'Đã hủy'),
(32, 52, 1, '2021-05-13', NULL, 'Đã hủy'),
(33, 52, 1, '2021-05-13', NULL, 'Đã hủy'),
(34, 52, 1, '2021-05-13', NULL, 'Đã hủy'),
(35, 52, 11, '2021-05-13', NULL, 'Đã xác nhận'),
(36, 52, 1, '2021-05-13', NULL, 'Đã hủy'),
(37, 52, 2, '2021-05-13', NULL, 'Đã xác nhận'),
(38, 52, NULL, '2021-05-13', NULL, 'Đã hủy'),
(39, 52, 1, '2021-05-13', NULL, 'Đã xác nhận'),
(40, 51, 1, '2021-05-13', NULL, 'Đã hủy'),
(41, 51, 1, '2021-05-13', NULL, 'Đã hủy'),
(42, 51, 1, '2021-05-13', NULL, 'Đã hủy'),
(43, 51, 1, '2021-05-13', NULL, 'Đã hủy'),
(44, 53, 1, '2021-05-14', NULL, 'Đã xác nhận'),
(45, 53, 1, '2021-05-14', NULL, 'Đã xác nhận'),
(46, 56, 1, '2021-05-14', NULL, 'Đã xác nhận'),
(48, 52, 11, '2021-05-15', NULL, 'Đã hủy'),
(49, 56, 2, '2021-05-15', NULL, 'Đã xác nhận'),
(50, 56, 1, '2021-05-15', NULL, 'Đã xác nhận'),
(51, 51, 1, '2021-05-16', NULL, 'Đã xác nhận'),
(52, 51, 1, '2021-05-16', NULL, 'Đã xác nhận'),
(53, 51, 1, '2021-05-16', NULL, 'Đã xác nhận'),
(55, 51, 1, '2021-05-16', NULL, 'Đã hủy'),
(56, 60, 2, '2021-05-17', NULL, 'Đã xác nhận'),
(57, 53, 1, '2021-05-18', NULL, 'Đã xác nhận'),
(58, 55, 2, '2021-05-18', NULL, 'Đã xác nhận'),
(59, 55, 2, '2021-05-18', NULL, 'Đã xác nhận'),
(60, 55, 2, '2021-05-18', NULL, 'Đã hủy'),
(61, 53, 1, '2021-05-18', NULL, 'Đã xác nhận'),
(62, 53, 1, '2021-05-18', NULL, 'Đã xác nhận'),
(63, 53, NULL, '2021-05-22', NULL, 'Đã hủy'),
(64, 53, 1, '2021-05-22', NULL, 'Đã xác nhận'),
(65, 53, NULL, '2021-05-25', NULL, 'Đã hủy'),
(66, 53, 1, '2021-05-25', NULL, 'Đã xác nhận'),
(67, 53, 1, '2021-05-25', NULL, 'Đã xác nhận'),
(68, 53, 1, '2021-05-25', NULL, 'Đã xác nhận'),
(70, 53, 1, '2021-05-25', NULL, 'Đã xác nhận'),
(71, 53, 1, '2021-05-25', NULL, 'Đã xác nhận'),
(72, 53, 1, '2021-05-25', NULL, 'Đã xác nhận'),
(73, 53, 1, '2021-05-25', NULL, 'Đã hủy'),
(74, 53, NULL, '2021-05-25', NULL, 'Chờ xác nhận'),
(75, 53, 1, '2021-05-25', NULL, 'Đã xác nhận'),
(76, 53, NULL, '2021-05-25', NULL, 'Chờ xác nhận'),
(77, 53, NULL, '2021-05-25', NULL, 'Đã hủy'),
(78, 53, NULL, '2021-05-25', NULL, 'Chờ xác nhận'),
(79, 53, NULL, '2021-05-27', NULL, 'Chờ xác nhận'),
(80, 53, NULL, NULL, NULL, 'Chưa đặt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachikh`
--

CREATE TABLE `diachikh` (
  `MaDC` int(11) NOT NULL,
  `DiaChi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MSKH` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diachikh`
--

INSERT INTO `diachikh` (`MaDC`, `DiaChi`, `MSKH`) VALUES
(2, 'Đắk Lắk', NULL),
(3, 'Vị Thanh, Hậu Giang', NULL),
(4, 'Cái Khế , Cần Thơ', 5),
(5, 'Gò Quao, Kiêng Giang', 51),
(6, 'Thành phố Vị Thanh, tỉnh Hậu Giang', 52),
(7, 'Bình Thủy, TP Cần Thơ', 53),
(8, 'Vị Thanh, Hậu Giang', 54),
(9, 'Long Thành, Đồng Nai', 59),
(10, 'Châu Thành, Đồng Tháp', 56),
(11, 'Ngã Bảy, Hậu Giang', 60),
(12, 'Hà Tiên, Kiên Giang', 55);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` int(11) NOT NULL,
  `TenHH` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `QuyCach` longtext COLLATE utf8_unicode_ci NOT NULL,
  `Gia` bigint(20) NOT NULL,
  `SoLuongHang` int(11) NOT NULL,
  `MaLoaiHang` int(11) DEFAULT NULL,
  `GhiChu` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `Hinh` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `QuyCach`, `Gia`, `SoLuongHang`, `MaLoaiHang`, `GhiChu`, `Hinh`) VALUES
(1, 'Áo hoodie viền đen phong cách thời trang dành cho nam', '<p><span style=\"font-family: Arial;\">﻿</span><span style=\"font-family: Arial;\">﻿</span><span style=\"color: rgba(0, 0, 0, 0.8);\">Thành phần chất vải: 95% polyester + 5% spandex<br>\r\n  > Size M:<br>\r\n  - Chiều rộng vai: 55 cm<br>\r\n  - Vòng ngực: 95 cm<br>\r\n  - Chiều dài: 65.5 cm<br>\r\n  - Chiều dài tay áo: 50.3 cm<br>\r\n  > Size L:<br>\r\n  - Chiều rộng vai: 57 cm<br>\r\n  - Vòng ngực: 99 cm<br>\r\n  - Chiều dài: 67.5 cm<br>\r\n  - Chiều dài tay áo: 51.5 cm<br>\r\n  > Size XL:<br>\r\n  - Chiều rộng vai: 59 cm<br>\r\n  - Vòng ngực: 103 cm<br>\r\n  - Chiều dài: 69.5 cm<br>\r\n  - Chiều dài tay áo: 52.7 cm<br>\r\n  > Size 2XL:<br>\r\n  - Chiều rộng vai: 61 cm<br>\r\n  - Vòng ngực: 107 cm<br>\r\n  - Chiều dài: 71.5 cm<br>\r\n  - Chiều dài tay áo: 53.9 cm<br>\r\n  > Size 3XL:<br>\r\n  - Chiều rộng vai: 63 cm<br>\r\n  - Vòng ngực: 111 cm<br>\r\n  - Chiều dài: 73.5 cm<br>\r\n  - Chiều dài tay áo: 55.1 cm<br>\r\n  > Size 4XL:<br>\r\n  - Chiều rộng vai: 65 cm<br>\r\n  - Vòng ngực: 115 cm<br>\r\n  - Chiều dài: 75.5 cm<br>\r\n  - Chiều dài tay áo: 56.5 cm</span><br></p>', 240000, 96, 1, 'Khong biet', 'item/0a0aef2cc306aef53c757e59150e177d.jpg'),
(2, 'Áo Thun Nam Casual 1st - CALIFORNIA', '<p><span style=\"color: rgb(9, 49, 96); font-family: Roboto, sans-serif;\">- Áo Thun Nam Casual 1st - CALIFORNIA</span><br style=\"margin: 0px; padding: 0px; font-family: Roboto, sans-serif; line-height: 28px; max-width: 100%; color: rgb(9, 49, 96);\"><span style=\"color: rgb(9, 49, 96); font-family: Roboto, sans-serif;\">- Sản phẩm áo thun, áo phông trơn nên rất dễ phối đồ, rất cuốn hút khi mặc vận động thể thao hay đi chơi.</span><br style=\"margin: 0px; padding: 0px; font-family: Roboto, sans-serif; line-height: 28px; max-width: 100%; color: rgb(9, 49, 96);\"><span style=\"color: rgb(9, 49, 96); font-family: Roboto, sans-serif;\">- Form áo thun ôm vừa vặn thoải mái khi mặc hằng ngày hay các hoạt động mang lại sự tự tin và năng động.</span><br style=\"margin: 0px; padding: 0px; font-family: Roboto, sans-serif; line-height: 28px; max-width: 100%; color: rgb(9, 49, 96);\"><span style=\"color: rgb(9, 49, 96); font-family: Roboto, sans-serif;\">- Áo thun phông trơn màu đơn giản tạo nên nét nam tính mạnh mẽ cho nam giới khi mặc, đơn giản mà vẫn rất thoải mái cho phái nữ, cá tính thời thượng.</span><br style=\"margin: 0px; padding: 0px; font-family: Roboto, sans-serif; line-height: 28px; max-width: 100%; color: rgb(9, 49, 96);\"><span style=\"color: rgb(9, 49, 96); font-family: Roboto, sans-serif;\">- Đường chỉ may đẹp, tinh tế, tỉ mỉ mang đến sự an tâm tuyệt đối cho nam giới khi sử dụng sản phẩm.</span><br style=\"margin: 0px; padding: 0px; font-family: Roboto, sans-serif; line-height: 28px; max-width: 100%; color: rgb(9, 49, 96);\"><span style=\"color: rgb(9, 49, 96); font-family: Roboto, sans-serif;\">- Chất liệu: 100% Cotton 2 chiều cao cấp, mềm mại, thoáng mát, thấm hút tốt, không lo hầm bí khi mặc.</span><br style=\"margin: 0px; padding: 0px; font-family: Roboto, sans-serif; line-height: 28px; max-width: 100%; color: rgb(9, 49, 96);\"><span style=\"color: rgb(9, 49, 96); font-family: Roboto, sans-serif;\">- Kết hợp hài hòa được với các trang phục từ bụi bặm cá tính như quần short, quần jean đến những phong cách đơn giản cổ điển như quần kaki, âu..</span><br style=\"margin: 0px; padding: 0px; font-family: Roboto, sans-serif; line-height: 28px; max-width: 100%; color: rgb(9, 49, 96);\"><span style=\"color: rgb(9, 49, 96); font-family: Roboto, sans-serif;\">- Sản phẩm chất lượng xuất khẩu</span><br style=\"margin: 0px; padding: 0px; font-family: Roboto, sans-serif; line-height: 28px; max-width: 100%; color: rgb(9, 49, 96);\"><span style=\"color: rgb(9, 49, 96); font-family: Roboto, sans-serif;\">- Kiểu dáng: SlimFit</span><br style=\"margin: 0px; padding: 0px; font-family: Roboto, sans-serif; line-height: 28px; max-width: 100%; color: rgb(9, 49, 96);\"><span style=\"color: rgb(9, 49, 96); font-family: Roboto, sans-serif;\">- Sản xuất tại Việt Nam</span><br style=\"margin: 0px; padding: 0px; font-family: Roboto, sans-serif; line-height: 28px; max-width: 100%; color: rgb(9, 49, 96);\"><span style=\"color: rgb(9, 49, 96); font-family: Roboto, sans-serif;\">- Kích thước Size: S(56-64kg) M(64-72kg) L(72-80kg) XL(80-88kg)</span><br></p>', 180000, 97, 2, 'Khong biet', 'item/53641-21-california_51d4f99a64d447798de7cd8be1c11a8c_master.jpg'),
(3, 'ÁO KHOÁC NỮ KAKI 2 LỚP LÓT DÙ ĐẸP MÊ LY', '<ul class=\"\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; overflow: hidden; column-count: 2; column-gap: 32px; font-size: 12px;\"><li class=\"\" data-spm-anchor-id=\"a2o4n.pdp_revamp.product_detail.i0.7dff33caFAKWdW\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">ÁO KHOÁC NỮ KAKI 2 LỚP LÓT DÙ ĐẸP MÊ LY</li><li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Thiết kế tay dàicó nón,mang đến phong cách trẻ trung,năng động</li><li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Dây khóa kéo cao có thể che được phần cổgiúp bạn bảo vệ cổ khỏi nắng nóng hoặc không khí lạnh khi đi ra ngoài đường</li><li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Đường chỉ viền áo rất thời trang, phối túi tiện dụng giúp bạn đựng được những vật nhỏ cần thiết</li><li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Gam màu dễ lựa chọn và dễ dàng kết hợp trang phục khác nhau</li><li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Chất liệu dù mềm mại,thoáng mát, thấm hút mồ hôi tốt, không hầm bí,mang lại cảm giác thoải mái khi mặc</li><li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Kết hợp với các item như: váy, đầm; sơ mi,túi xách... để giúp nàng luôn thanh lịch; trẻ trung.</li></ul>', 145000, 99, 1, 'Không có', 'item/f3075e073c6228f2f089b6ef7d057a17.jpeg'),
(4, 'Áo thun nữ oversize Vanass tay lỡ in hình độc đáo ', '<div><p style=\"margin-top: 0pt; margin-bottom: 0pt; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.8;\"><strong style=\"margin: 0px; padding: 0px; font-family: RobotoBold;\">Áo thun nữ oversize Vanass tay lỡ in hình độc đáo VAT1902 Xám</strong>&nbsp;được may từ chất liệu thun cotton dày dặn, mềm mịn, không nhăn, mặc mát, thấm hút mồ hôi. Thiết kế cổ tròn đơn giản, tay lửng kết hợp cùng hình in độc đáo và lạ mắt giữa áo tạo phong cách trẻ trung năng động cho bạn gái. Form&nbsp;<em style=\"margin: 0px; padding: 0px;\">áo oversize</em>&nbsp;giúp nàng luôn thoải mái trong mọi&nbsp;hoạt&nbsp;động hằng ngày mà không cần băn khoăn lo lắng. Các nàng có thể kết hợp áo với short, quần bò, chân váy&nbsp;jeans...&nbsp;Sản phẩm phù hợp với&nbsp;bạn gái có&nbsp;trọng lượng dưới 65kg.</p><p style=\"margin-top: 0pt; margin-bottom: 0pt; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; font-family: RobotoRegular, arial, sans-serif; line-height: 2;\">&nbsp;</p><h3 style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: RobotoRegular, arial, sans-serif;\">Thông tin chi tiết</h3><p style=\"margin-top: 0pt; margin-bottom: 0pt; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 2;\">- Thương hiệu:&nbsp;<a href=\"http://www.yes24.vn/thuong-hieu/Vanass\" target=\"_blank\" style=\"margin: 0px; padding: 0px; color: rgb(62, 62, 62);\">Vanass</a></p><p style=\"margin-top: 0pt; margin-bottom: 0pt; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; font-family: RobotoRegular, arial, sans-serif; line-height: 2;\">- Xuất xứ: Việt Nam</p><p style=\"margin-top: 0pt; margin-bottom: 0pt; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; font-family: RobotoRegular, arial, sans-serif; line-height: 2;\">- Chất liệu: Thun cotton<br style=\"margin: 0px; padding: 0px;\">- Màu sắc: Xám<br style=\"margin: 0px; padding: 0px;\">- Size: Freesize</p></div>', 99900, 98, 2, 'Không có', 'item/2054650_L.jpg'),
(5, 'Giày nam sneaker thể thao - Giày tăng chiều cao mẫu mới hot trend hàn quốc QA364', '<p style=\"margin-top: 0pt; margin-bottom: 0pt; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.8;\"><span style=\"color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; text-align: justify;\">Thiết kế trẻ trung, năng động</span><br style=\"color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; text-align: justify;\"><span style=\"color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; text-align: justify;\">Màu sắc cá tính riêng biệt</span><br style=\"color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; text-align: justify;\"><span style=\"color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; text-align: justify;\">Xu hướng thời trang Hàn Quốc</span><br style=\"color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; text-align: justify;\"><span style=\"color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; text-align: justify;\">Thoải mái và êm ái khi di chuyển</span><span style=\"font-family: Arial;\">﻿</span><br style=\"color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; text-align: justify;\"><span style=\"color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; text-align: justify;\">Chất liệu cao cấp bền đẹp</span><br style=\"color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; text-align: justify;\"><span style=\"color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; text-align: justify;\">Mũi giày tròn, ôm chân gọn gàng</span><br style=\"color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; text-align: justify;\"><span style=\"color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; text-align: justify;\">Đế bằng cao su tổng hợp; có độ ma sát cao</span><br style=\"color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; text-align: justify;\"><span style=\"color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; text-align: justify;\">Dễ dàng phối trang phục</span><br style=\"color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; text-align: justify;\"></p><p style=\"margin-top: 5px; margin-bottom: 12px; color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; text-align: justify;\"><em>Giày nam sneaker thể thao - Giày tăng chiều cao mẫu mới hot trend hàn quốc QA364</em></p><p style=\"margin-top: 5px; margin-bottom: 12px; color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; text-align: justify;\"><em>- Chiều cao đế: 5CM</em></p><p style=\"margin-top: 5px; margin-bottom: 12px; color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; text-align: justify;\">-Chất liệu đế: cao su</p><p style=\"margin-top: 5px; margin-bottom: 12px; color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; text-align: justify;\">-Chất liệu mặt giày: tổng hợp chất liệu cao cấp</p><p style=\"margin-top: 5px; margin-bottom: 12px; color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; text-align: justify;\">-Mầu sắc: trắng đỏ</p><p style=\"margin-top: 5px; margin-bottom: 12px; color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; text-align: justify;\">-Form: chuẩn</p>', 185000, 96, 3, 'Không có', 'item/eae2a0c4999585ebe4a5d1f22130a6eb.jpg'),
(6, 'Giày thể thao nữ - Giày nữ 2021', '<p style=\"margin-top: 0pt; margin-bottom: 0pt; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.8;\"><span style=\"color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; text-align: justify;\">Thiết kế trẻ trung, hợp thời trang, dễ phối đồ</span><br style=\"color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; text-align: justify;\"><span style=\"color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; text-align: justify;\">Đế cao su đúc nguyên khối rất chắc chắn</span><br style=\"color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; text-align: justify;\"><span style=\"color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; text-align: justify;\">Thân giày là lớp da PU kết hợp xốp mềm cực kỳ êm chân</span><br style=\"color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; text-align: justify;\"><span style=\"color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; text-align: justify;\">Khách được kiểm tra hàng trước khi nhận</span></p><p style=\"margin-top: 0pt; margin-bottom: 0pt; padding: 0px; margin-block: 0px; text-rendering: geometricprecision; line-height: 1.8;\"><span style=\"font-family: Arial;\">﻿</span><span style=\"color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; text-align: justify;\"><br></span><span style=\"color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; text-align: center;\">Giày thể thao nữ</span></p><ul style=\"color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; text-align: justify;\"><li>Giày có thiết kế năng động, hiện đại, khỏe khoắn, hợp thời trang, dễ phối đồ.</li><li>Đế giày làm từ chất liệu cao su đúc nguyên khối rất chắc chắn với độ đàn hồi cao.</li><li>Thân giày là lớp da mềm cực kỳ êm chân.</li><li>Giày luôn sẵn hàng trong kho với đủ size từ 36 đến 39.</li></ul>', 168000, 99, 3, 'Không biết', 'item/382cde1565bcb511ba2dd3134ec69868.jpg'),
(7, 'Quần baggy kaki nam đủ màu cực chất cực tôn dáng', '<div id=\"block-3OXauK3tlC\" class=\"pdp-block pdp-block__main-information\" style=\"margin: 0px; padding: 0px 0px 16px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: Roboto, -apple-system, BlinkMacSystemFont, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 12px;\"><div id=\"block-h7l4gPrhSv\" class=\"pdp-block pdp-block__main-information-detail\" style=\"margin: 0px; padding: 0px; display: inline-block; width: calc(100% - 338px); vertical-align: top;\"><div id=\"block-elXFw8OmXC\" class=\"pdp-block\" style=\"margin: 0px; padding: 0px;\"><div id=\"block-HwZjk3tnMA\" class=\"pdp-block pdp-block__delivery-seller\" style=\"margin: 0px; padding: 0px; width: 330px; display: inline-block; vertical-align: top;\"><div id=\"module_seller_info\" class=\"pdp-block module\" style=\"margin: 0px; padding: 0px;\"><div class=\"seller-container\" data-spm=\"seller\" style=\"margin: 10px 0px 0px; padding: 0px; background-color: rgb(250, 250, 250); color: rgb(33, 33, 33);\"><div class=\"seller-link\" data-spm=\"seller\" style=\"margin: 0px; padding: 15px; text-align: center; font-family: Roboto-Medium; border-top: 1px solid rgb(239, 240, 245);\"><br></div></div></div></div></div></div></div><div id=\"block-RYZE_EjMZ-\" class=\"pdp-block pdp-block__additional-information\" style=\"margin: 12px 0px 0px; padding: 0px; width: 1188px; table-layout: fixed; font-family: Roboto, -apple-system, BlinkMacSystemFont, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 12px;\"><div id=\"block-xVbYSeUkhr\" class=\"pdp-block pdp-block__product-description\" style=\"margin: 0px; padding: 0px; display: inline-block; vertical-align: top; width: calc(100% - 200px);\"><div id=\"block-v-w3P9vTp6P\" class=\"pdp-block fixed-width-full background-2\" style=\"margin: 0px; padding: 0px; flex-basis: 100%; width: 988px;\"><div id=\"module_product_detail\" class=\"pdp-block module\" style=\"margin: 0px; padding: 0px;\"><div class=\"lazyload-wrapper \" style=\"margin: 0px; padding: 0px;\"><div class=\"pdp-product-detail\" data-spm=\"product_detail\" style=\"margin: 0px; padding: 0px; position: relative;\"><div class=\"pdp-product-desc \" style=\"margin: 0px; padding: 5px 14px 5px 24px; height: auto; overflow-y: hidden;\"><div class=\"html-content pdp-product-highlights\" style=\"margin: 0px; padding: 11px 0px 16px; word-break: break-word; border-bottom: 1px solid rgb(239, 240, 245); overflow: hidden;\"><ul class=\"\" data-spm-anchor-id=\"a2o4n.pdp_revamp.product_detail.i1.2a52246ffc8uC0\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; overflow: hidden; column-count: 2; column-gap: 32px;\"><li class=\"\" data-spm-anchor-id=\"a2o4n.pdp_revamp.product_detail.i0.2a52246ffc8uC0\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Kaki có độ dày, thoáng mát, co dãn nhẹ , thoải mái, tôn lên vóc dáng cho người mặc.</li><li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Quần tôn dáng , che khuyết điểm cực tốt đối với những bạn có thân hình quả lê thì sự lựa chọn chiếc quần baggy kaki sẽ rất hợp lí, quần sẽ che được vòng 3 không lộ mai rùa, những bạn nhỏ gọn,hơi ốm sẽ tôn được đôi chân trông cute cực kì luôn ạ....…</li><li class=\"\" data-spm-anchor-id=\"a2o4n.pdp_revamp.product_detail.i2.2a52246ffc8uC0\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Màu sắc: Màuxám , đen ,a nâu và be</li><li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Kích cỡ: S, M, L và XL</li><li class=\"\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Quần dễ phối với các mẫu áo khác nhau: áo thun, sơ mi, áo croptop …...</li><li class=\"\" data-spm-anchor-id=\"a2o4n.pdp_revamp.product_detail.i3.2a52246ffc8uC0\" style=\"margin: 0px; padding: 0px 0px 0px 15px; position: relative; font-size: 14px; line-height: 18px; text-align: left; list-style: none; word-break: break-word; break-inside: avoid;\">Thiết kế ống xuông cùng với lưng thun dây rút tạo cảm giác thoải mái hoạt động.</li></ul></div><div id=\"detail_decorate_root\" style=\"margin: 0px; padding: 0px; width: 960px;\"><div class=\"engine-app\" id=\"_root\" style=\"margin: 0px; padding: 0px;\"><div class=\"com-struct\" id=\"Root\" style=\"margin: 0px; padding: 0px;\"><div class=\"com-struct\" id=\"hc\" style=\"margin: 0px; padding: 0px;\"></div><div class=\"com-struct\" id=\"hd\" style=\"margin: 0px; padding: 0px;\"></div><div class=\"com-struct\" id=\"bd\" style=\"margin: 0px; padding: 0px;\"><div class=\"com-struct\" id=\"bd_-999\" style=\"margin: 0px; padding: 0px;\"><div class=\"com-struct\" id=\"bd_-999_container_0\" style=\"margin: 0px; padding: 0px;\"></div></div><div class=\"com-struct\" id=\"bd_0\" style=\"margin: 0px; padding: 0px;\"><div class=\"com-struct\" id=\"bd_0_container_0\" style=\"margin: 0px; padding: 0px;\"></div></div><div class=\"com-struct\" id=\"bd_1\" style=\"margin: 0px; padding: 0px;\"><div class=\"com-struct\" id=\"bd_1_container_0\" style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px;\"><div module-name=\"lazada-pc-detailTemplateImg\" class=\"J_module\" id=\"shell-com-424689533\" style=\"margin: 0px; padding: 0px;\"><div class=\"module-detailImageText\" style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; height: 960px; width: 960px; overflow: hidden;\"><div style=\"margin: 0px; padding: 0px; width: 750px; position: relative; height: 750px; transform: scale(1.28, 1.28); transform-origin: 0% 0%;\"><img src=\"https://vn-test-11.slatic.net/shop/8a4ae5093aab119945ad098f16ed9df3.jpeg_2200x2200q80.jpg_.webp\" style=\"margin: 0px; padding: 0px; border-style: none; background-color: rgba(0, 0, 0, 0); font-family: Lato; top: 10px; left: 10px; width: 650px; line-height: normal; position: absolute; height: 650px; z-index: 0;\"></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div>', 140000, 0, 9, 'Quần baggy kaki nam đủ màu cực chất cực tôn dáng', 'item/9e14fe6e38eeccce84ae9a5b575045af.jpg'),
(8, '-40 Độ Chống Lạnh Nga Áo Khoác Mùa Đông Nam Cao Cấp Chính Hãng Cổ Lông Dày Màu Trắng Ấm Vịt Xuống Na', '<div class=\"productDescBoxTop\" style=\"margin: 22px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"><div class=\"productDescAttrTitle\" data-spm-anchor-id=\"a2g14.12057483.0.i29.57bb3210lrO5Ie\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 18px; line-height: 20px; font-family: inherit; vertical-align: baseline;\">Chi tiết mặt hàng</div><div class=\"attrList\" style=\"margin: 10px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; overflow: hidden; display: flex; flex-wrap: wrap;\"><section class=\"attrItem\" style=\"margin: 0px; padding: 5px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 13px; line-height: 17px; font-family: inherit; vertical-align: baseline; display: flex; position: relative; width: 576px;\"><span class=\"properyTitle\" style=\"margin: 0px 3px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(153, 153, 153);\">thương hiệu:</span><span class=\"properyDes\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\">TACE&amp;SHARK</span></section><section class=\"attrItem\" style=\"margin: 0px; padding: 5px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 13px; line-height: 17px; font-family: inherit; vertical-align: baseline; display: flex; position: relative; width: 576px;\"><span class=\"properyTitle\" style=\"margin: 0px 3px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(153, 153, 153);\">Applicable Scene:</span><span class=\"properyDes\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\">CASUAL</span></section><section class=\"attrItem\" data-spm-anchor-id=\"a2g14.12057483.0.i28.57bb3210lrO5Ie\" style=\"margin: 0px; padding: 5px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 13px; line-height: 17px; font-family: inherit; vertical-align: baseline; display: flex; position: relative; width: 576px;\"><span class=\"properyTitle\" style=\"margin: 0px 3px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(153, 153, 153);\">phong cách:</span><span class=\"properyDes\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\">Bình thường</span></section><section class=\"attrItem\" style=\"margin: 0px; padding: 5px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 13px; line-height: 17px; font-family: inherit; vertical-align: baseline; display: flex; position: relative; width: 576px;\"><span class=\"properyTitle\" style=\"margin: 0px 3px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(153, 153, 153);\">Chất liệu:</span><span class=\"properyDes\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\">Polyester</span></section><section class=\"attrItem\" style=\"margin: 0px; padding: 5px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 13px; line-height: 17px; font-family: inherit; vertical-align: baseline; display: flex; position: relative; width: 576px;\"><span class=\"properyTitle\" style=\"margin: 0px 3px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(153, 153, 153);\">nguồn gốc:</span><span class=\"properyDes\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\">CN (Nguồn Gốc)</span></section><section class=\"attrItem\" style=\"margin: 0px; padding: 5px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 13px; line-height: 17px; font-family: inherit; vertical-align: baseline; display: flex; position: relative; width: 576px;\"><span class=\"properyTitle\" style=\"margin: 0px 3px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(153, 153, 153);\">Mùa áp dụng:</span><span class=\"properyDes\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\">Winter</span></section><section class=\"attrItem\" style=\"margin: 0px; padding: 5px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 13px; line-height: 17px; font-family: inherit; vertical-align: baseline; display: flex; position: relative; width: 576px;\"><span class=\"properyTitle\" style=\"margin: 0px 3px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(153, 153, 153);\">loại:</span><span class=\"properyDes\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\">REGULAR</span></section><section class=\"attrItem\" style=\"margin: 0px; padding: 5px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 13px; line-height: 17px; font-family: inherit; vertical-align: baseline; display: flex; position: relative; width: 576px;\"><span class=\"properyTitle\" style=\"margin: 0px 3px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(153, 153, 153);\">giới tính:</span><span class=\"properyDes\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\">MEN</span></section><section class=\"attrItem\" style=\"margin: 0px; padding: 5px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 13px; line-height: 17px; font-family: inherit; vertical-align: baseline; display: flex; position: relative; width: 576px;\"><span class=\"properyTitle\" style=\"margin: 0px 3px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(153, 153, 153);\">Số mô hình:</span><span class=\"properyDes\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\">610,61912</span></section><section class=\"attrItem\" style=\"margin: 0px; padding: 5px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 13px; line-height: 17px; font-family: inherit; vertical-align: baseline; display: flex; position: relative; width: 576px;\"><span class=\"properyTitle\" style=\"margin: 0px 3px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(153, 153, 153);\">Loại đóng cửa:</span><span class=\"properyDes\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\">zipper</span></section><section class=\"attrItem\" style=\"margin: 0px; padding: 5px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 13px; line-height: 17px; font-family: inherit; vertical-align: baseline; display: flex; position: relative; width: 576px;\"><span class=\"properyTitle\" style=\"margin: 0px 3px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(153, 153, 153);\">Sleeve Length (cm):</span><span class=\"properyDes\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\">Đầy đủ</span></section><section class=\"attrItem\" style=\"margin: 0px; padding: 5px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 13px; line-height: 17px; font-family: inherit; vertical-align: baseline; display: flex; position: relative; width: 576px;\"><span class=\"properyTitle\" style=\"margin: 0px 3px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(153, 153, 153);\">trang trí:</span><span class=\"properyDes\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\">NONE</span></section><section class=\"attrItem\" style=\"margin: 0px; padding: 5px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 13px; line-height: 17px; font-family: inherit; vertical-align: baseline; display: flex; position: relative; width: 576px;\"><span class=\"properyTitle\" style=\"margin: 0px 3px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(153, 153, 153);\">đội mũ trùm đầu:</span><span class=\"properyDes\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\">Vâng</span></section><section class=\"attrItem\" style=\"margin: 0px; padding: 5px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 13px; line-height: 17px; font-family: inherit; vertical-align: baseline; display: flex; position: relative; width: 576px;\"><span class=\"properyTitle\" style=\"margin: 0px 3px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(153, 153, 153);\">độ dày:</span><span class=\"properyDes\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\">Dày</span></section><section class=\"attrItem\" style=\"margin: 0px; padding: 5px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 13px; line-height: 17px; font-family: inherit; vertical-align: baseline; display: flex; position: relative; width: 576px;\"><span class=\"properyTitle\" style=\"margin: 0px 3px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(153, 153, 153);\">Down Content:</span><span class=\"properyDes\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\">80%</span></section><section class=\"attrItem\" style=\"margin: 0px; padding: 5px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 13px; line-height: 17px; font-family: inherit; vertical-align: baseline; display: flex; position: relative; width: 576px;\"><span class=\"properyTitle\" style=\"margin: 0px 3px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(153, 153, 153);\">Loại vải:</span><span class=\"properyDes\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\">Dạ</span></section><section class=\"attrItem\" style=\"margin: 0px; padding: 5px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 13px; line-height: 17px; font-family: inherit; vertical-align: baseline; display: flex; position: relative; width: 576px;\"><span class=\"properyTitle\" style=\"margin: 0px 3px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(153, 153, 153);\">điền:</span><span class=\"properyDes\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\">Trắng Duck Down</span></section><section class=\"attrItem\" style=\"margin: 0px; padding: 5px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 13px; line-height: 17px; font-family: inherit; vertical-align: baseline; display: flex; position: relative; width: 576px;\"><span class=\"properyTitle\" style=\"margin: 0px 3px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(153, 153, 153);\">Detachable Part:</span><span class=\"properyDes\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\">NONE</span></section><section class=\"attrItem\" style=\"margin: 0px; padding: 5px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 13px; line-height: 17px; font-family: inherit; vertical-align: baseline; display: flex; position: relative; width: 576px;\"><span class=\"properyTitle\" style=\"margin: 0px 3px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(153, 153, 153);\">Vật liệu lót:</span><span class=\"properyDes\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\">Polyester</span></section><section class=\"attrItem\" style=\"margin: 0px; padding: 5px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 13px; line-height: 17px; font-family: inherit; vertical-align: baseline; display: flex; position: relative; width: 576px;\"><span class=\"properyTitle\" style=\"margin: 0px 3px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(153, 153, 153);\">Xuống Trọng Lượng:</span><span class=\"properyDes\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\">200 gam-250 gam</span></section><section class=\"attrItem\" style=\"margin: 0px; padding: 5px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 13px; line-height: 17px; font-family: inherit; vertical-align: baseline; display: flex; position: relative; width: 576px;\"><span class=\"properyTitle\" style=\"margin: 0px 3px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(153, 153, 153);\">Loại mô hình:</span><span class=\"properyDes\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\">Rắn</span></section><section class=\"attrItem\" style=\"margin: 0px; padding: 5px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 13px; line-height: 17px; font-family: inherit; vertical-align: baseline; display: flex; position: relative; width: 576px;\"><span class=\"properyTitle\" style=\"margin: 0px 3px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(153, 153, 153);\">quần áo dài:</span><span class=\"properyDes\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\">REGULAR</span></section><section class=\"attrItem\" data-spm-anchor-id=\"a2g14.12057483.0.i27.57bb3210lrO5Ie\" style=\"margin: 0px; padding: 5px 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 13px; line-height: 17px; font-family: inherit; vertical-align: baseline; display: flex; position: relative; width: 576px;\"><span class=\"properyTitle\" style=\"margin: 0px 3px 0px 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(153, 153, 153);\">trọng lượng:</span><span class=\"properyDes\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\">1.25-1.5</span></section></div></div><div class=\"productDescBoxBottom\" style=\"margin: 24px 0px 0px; padding: 24px 0px 0px; border-width: 1px 0px 0px; border-top-style: solid; border-right-style: initial; border-bottom-style: initial; border-left-style: initial; border-top-color: rgb(232, 232, 232); border-right-color: initial; border-bottom-color: initial; border-left-color: initial; border-image: initial; font: inherit; vertical-align: baseline;\"><div class=\"productDescOverHide\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; overflow: hidden; max-height: 500px;\"><div class=\"productDescContent\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"><p style=\"margin-bottom: 1em; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, &quot;PingFang SC&quot;, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; vertical-align: baseline; color: rgba(0, 0, 0, 0.65);\"><span style=\"font-family: Arial;\">﻿</span></p></div></div></div>', 2100000, 99, 25, 'Ko có', 'item/40-Ch-ng-L-nh-Nga-o-Kho-c-M-a-ng-Nam-Cao-C.jpg_q50.jpg'),
(9, 'Áo Sơ Mi Nữ Công Sở', '<div id=\"block-3OXauK3tlC\" class=\"pdp-block pdp-block__main-information\" style=\"margin: 0px; padding: 0px 0px 16px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: Roboto, -apple-system, BlinkMacSystemFont, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 12px;\"><div id=\"block-h7l4gPrhSv\" class=\"pdp-block pdp-block__main-information-detail\" style=\"margin: 0px; padding: 0px; display: inline-block; width: calc(100% - 338px); vertical-align: top;\"><div id=\"block-elXFw8OmXC\" class=\"pdp-block\" style=\"margin: 0px; padding: 0px;\"><div id=\"block-HwZjk3tnMA\" class=\"pdp-block pdp-block__delivery-seller\" style=\"margin: 0px; padding: 0px; width: 330px; display: inline-block; vertical-align: top;\"><div id=\"module_seller_info\" class=\"pdp-block module\" style=\"margin: 0px; padding: 0px;\"><div class=\"seller-container\" data-spm=\"seller\" style=\"margin: 10px 0px 0px; padding: 0px; background-color: rgb(250, 250, 250); color: rgb(33, 33, 33);\"><div class=\"seller-link\" data-spm=\"seller\" style=\"margin: 0px; padding: 15px; text-align: center; font-family: Roboto-Medium; border-top: 1px solid rgb(239, 240, 245);\"><span style=\"color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);\">Kiểu dáng thời trang, hiện đại; dễ kết hợp và phối đồ phụ kiện</span><br style=\"color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);\">Chất vải mềm, thoáng mát, bền màu</span><br style=\"color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);\">Chất liệu: cotton pha</span><p style=\"margin-top: 5px; margin-bottom: 12px; color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);\">Áo được may từ chất liệu cao cấp cho cảm giác mềm mại, thoáng mát và vô cùng dễ chịu khi mặc.</p><p style=\"margin-top: 5px; margin-bottom: 12px; color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);\">Màu sắc tươi sáng, trẻ trung, giúp phái đẹp thêm tự tin mỗi khi xuống phố.</p><p style=\"margin-top: 5px; margin-bottom: 12px; color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);\">Có thể kết hợp cùng nhiều kiểu quần, váy, giày và các phụ kiện thời trang khác, thích hợp diện đi chơi, đi dạo phố, đi làm hay tham gia những buổi sự kiện, họp mặt cùng bạn bè.</p><p style=\"margin-top: 5px; margin-bottom: 12px; color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);\"><img src=\"https://salt.tikicdn.com/ts/tmp/6e/93/bc/fadaf09b0e8093b6d5f7366869c04cab.jpg\" alt=\"\" width=\"750\" height=\"287\" style=\"max-width: 100%; border-style: none; display: block; margin: 0px auto;\"></p><p style=\"margin-top: 5px; margin-bottom: 12px; color: rgb(36, 36, 36); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);\">Giá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Tuy nhiên tuỳ vào từng loại sản phẩm hoặc phương thức, địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, ...</p></div></div></div></div></div></div></div>', 105000, 48, 29, 'Có thể kết hợp cùng nhiều kiểu quần, váy, giày và các phụ kiện thời trang khác, thích hợp diện đi chơi, đi dạo phố, đi làm hay tham gia những buổi sự kiện, họp mặt cùng bạn bè.', 'item/eb22a33d3d8717945072089021b5a547.jpg'),
(13, 'Khăn Dạ Cao Cấp | Khăn Quàng Cổ Cao Cấp', '? ? ẤM ÁP KHI ĐÔNG VỀ VỚI DÒNG KHĂN DẠ CASHMERE <br>\r\n? ? Được làm từ chất liệu Dạ Cashmere cao cấp siêu êm ái, mịn màng, lên màu đơn sắc thời thượng đẹp sang ấn tượng. Khăn cực kỳ phù hợp với phong cách thanh lịch, nhã nhặn, đồng thời đảm bảo dẫn đầu thời trang, đi trước xu hướng.<br>\r\n? ? Khăn choàng Dạ với những đặc tính vượt trội về chất liệu và độ thẩm mỹ<br>\r\n⏩ đảm bảo là món quà tuyệt vời thay lời yêu thương khi Đông đã về, Tết đến cận kề.,<br>\r\n✳ ✅ Chất liệu dạ mềm mại, thoáng mát mà lại vô cùng ấm áp dù là ngày nắng khô hanh hay gió trời se lạnh, nàng cứ tha hồ làm đẹp chẳng cần ngại ngần.<br>\r\n❌ Đừng chần chừ kẻo bỏ lỡ cơ hội sở hữu chiếc khăn choàng Dạ mang đầy may mắn, chan chứa yêu thương cho mình cùng gia đình những ngày đầu năm xinh tươi và rực rỡ nàng nhé! ? ?<br>\r\n#KhănCaoCấp #KhănQuàngCổCaoCấp #KhănCácMùa #Khantotam #totam #hadong #vietnam #vietnamcaocao #khanda #khandacaocaocao #khandacashmere #cashmere', 159000, 99, 7, 'Không có ghi chú', 'item/0d0213de23e727bd6620e47118ff6797.jpg'),
(14, 'Quần Tây Nam Old Sailor 55033', 'Mô tả sản phẩm', 199000, 44, 4, 'Không có ghi chú', 'item/55033.jpg'),
(15, 'Quần Tây Âu Nam Cao Cấp, QUẦN SHORT NAM vải co giãn', 'Bảng chọn size tham khảo, 28 khoản 45-50kg, 29 khoản 50-55kg, 30 khoản 55-60kg, 31 khoản 60-65kg, 32 khoản 65-70kg, không có 33 vì số 33 xấu ko sản ...', 135000, 99, 28, 'Không có ghi chú', 'item/fceda49a9540131b622c904c16f6354b.jpg'),
(16, 'Mũ MLB Unisex New York Yankees CP77 Màu Đen', 'Mũ MLB Shadow Adjustable Cap New York Yankees Màu Đen là chiếc nón kết cao cấp thiết kế đẹp mắt, thời trang từ thương hiệu MLB Hàn Quốc. Đây là 1 item Hot được các bạn trẻ yêu thích trong thời gian gần đây.\r\n<br>\r\nVề thương hiệu thời trang MLB Hàn Quốc\r\nMLB là tên viết tắt của Major League Baseball – tổ chức thể thao chuyên nghiệp của môn bóng chày. Các sản phẩm của MLB lấy cảm hứng từ sự pha trộn giữa thể thao, thời trang đường phố và văn hóa. Thương hiệu chuyên thiết kế và sản xuất trang phục, giày & phụ kiện cho nam, nữ lấy cảm hứng từ logo của những đội bóng chày danh tiếng đem đến những bộ sưu tập là sự kết hợp giữa tiện ích và thời trang.<br>\r\nĐặc điểm nổi bật Mũ MLB Unisex New York Yankees CP77 Màu Đen\r\nMũ MLB được làm từ chất liệu cotton thoáng mát, mềm mại mang lại cảm giác thoải mái cho người sử dụng.\r\n<br>\r\nMLB Shadow Adjustable Cap New York Yankees Màu Đen sở hữu form chuẩn đẹp, các đường may rất chắc chắn và tinh tế hài lòng ngay cả với khách hàng khó tính. Chiếc Mũ MLB cao cấp không phai màu, dễ giặt, bảo quản.', 990000, 96, 8, 'Hướng dẫn bảo quản Mũ MLB<br>\r\n- Khi không sử dụng mũ nên treo lên gọn gàng nơi có vị trí khô ráo và thoáng mát.\r\n<br>\r\n- Khi giặt mũ nên giặt bằng tay, không nên dùng máy giặt vì sẽ làm mất form và hư dáng mũ.\r\n<br>\r\n- Tránh giặt cùng những chất gây loang màu.\r\n<br>\r\n- Không nên bỏ mũ trong túi xách quá lâu sẽ khiến chúng mất đi hình dáng ban đầu.\r\n<br>\r\n- Nên có túi đựng riêng để bảo quản mũ được mới và bền hơn.', 'item/mu-mlb-unisex-new-york-yankees-cp77-mau-den-5efab8434f811-30062020105755.jpg');
INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `QuyCach`, `Gia`, `SoLuongHang`, `MaLoaiHang`, `GhiChu`, `Hinh`) VALUES
(20, 'Dép Đơn Giản M1 ', '<p><span style=\"color: rgb(43, 43, 43); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\">Chất liệu:</span><br style=\"color: rgb(43, 43, 43); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\"><span style=\"color: rgb(43, 43, 43); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\">- Vải Mesh+ eva 2mm</span><br style=\"color: rgb(43, 43, 43); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\"><span style=\"color: rgb(43, 43, 43); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\">- Dây đai nylon</span><br style=\"color: rgb(43, 43, 43); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\"><span style=\"color: rgb(43, 43, 43); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\">- Logo TPR Y2010</span><br style=\"color: rgb(43, 43, 43); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\"><span style=\"color: rgb(43, 43, 43); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\">- Khoen D - khóa bóp</span><br style=\"color: rgb(43, 43, 43); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\"><span style=\"color: rgb(43, 43, 43); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\">- Nhám bông + nhám gai</span><br style=\"color: rgb(43, 43, 43); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\"><span style=\"color: rgb(43, 43, 43); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\">- Viền thun dệt</span><br style=\"color: rgb(43, 43, 43); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\"><span style=\"color: rgb(43, 43, 43); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\">- Đế Phylon 55shore + lót tẩy EVA 10mm</span><br></p>', 295000, 97, 23, '<span style=\"font-weight: bolder; color: rgb(43, 43, 43); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\">Hướng dẫn chọn size</span><br style=\"color: rgb(43, 43, 43); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\"><span class=\"small\" style=\"font-size: 12.8px; color: rgb(43, 43, 43); font-family: Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Dựa trên dữ liệu đánh giá từ những khách hàng đã mua sản phẩm. Chúng tôi có thể hỗ trợ bạn tìm một size phù hợp với bạn, bạn có thể tham khảo.</span>', 'item/33e3bacb-a8cb-1a00-a375-00178e91b768.jpg'),
(21, 'Áo ba lỗ nam cổ vuông, chất cotton, mặc tập gym quá đẹp', '<p><span style=\"color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; white-space: pre-wrap;\">Áo ba lỗ nam cổ vuông, chất cotton mịn mát.\r\n\r\nVới thiết kế trẻ trung, phong cách, nam tính, áo ba lỗ cổ vuông rất tôn dáng cho các bạn nam, bất kể gầy hay béo. \r\nPhù hợp với mọi vóc dáng: Thích hợp mặc lót, chơi thể thao, tập nhảy và kể cả đi dạo phố. \r\nChất liệu cotton.\r\nThấm hút mồ hôi tốt.\r\nThoáng, mát, mịn, mặc rất dễ chịu\r\nForm ôm tôn dáng \r\nThiết kế cổ vuông trẻ trung với màu sắc phù hợp với phái mạnh\r\n\r\n#balỗcổvuông, #cotton, #balỗ, #tậpgym, #body, #áobaolỗnam, #áonamđẹp, #quầnáo, #thờitrangnam, #thờitrangtrẻ, #túixáchnữ, #phụkiệnthờitrang, #quầnáo, #thờitrangnam, #thờitrangtrẻ, #áolót, #áotanktop, #áothun</span><br></p>', 40000, 100, 12, 'Không có', 'item/56c7521f959ba60107284b88363397a6.jpg'),
(22, 'ÁO HOODIE NỮ DỄ THƯƠNG - ÁO HOODIE -UID-1', '<ul style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; list-style-position: initial; list-style-image: initial; color: rgb(124, 124, 128); font-family: -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif;\"><li style=\"box-sizing: inherit;\">Kiểu dáng:&nbsp;Giày sneaker, giày thể thao</li><li style=\"box-sizing: inherit;\">Chất liệu: Da lộn</li><li style=\"box-sizing: inherit;\">Độ cao: 3cm</li><li style=\"box-sizing: inherit;\">Màu sắc: trắng phản quang</li><li style=\"box-sizing: inherit;\">Kích cỡ: 36-43</li><li style=\"box-sizing: inherit;\">Chất liệu dễ làm sạch, êm chân</li><li style=\"box-sizing: inherit;\">Độ đàn hồi, co dãn tốt, ôm khít vừa chân</li><li style=\"box-sizing: inherit;\">Đế đúc cao su nguyên khối, chắc chắn.<img class=\"alignnone size-full wp-image-45486 lazyloaded\" src=\"https://giayxshop.vn/wp-content/uploads/2021/04/z2412365804574_1f96dc6943da417ef4c5e0d128f1444a.jpg\" alt=\"\" width=\"2560\" height=\"2560\" data-lazy-srcset=\"//giayxshop.vn/wp-content/uploads/2021/04/z2412365804574_1f96dc6943da417ef4c5e0d128f1444a.jpg 2560w, //giayxshop.vn/wp-content/uploads/2021/04/z2412365804574_1f96dc6943da417ef4c5e0d128f1444a-600x600.jpg 600w, //giayxshop.vn/wp-content/uploads/2021/04/z2412365804574_1f96dc6943da417ef4c5e0d128f1444a-2048x2048.jpg 2048w, //giayxshop.vn/wp-content/uploads/2021/04/z2412365804574_1f96dc6943da417ef4c5e0d128f1444a-150x150.jpg 150w, //giayxshop.vn/wp-content/uploads/2021/04/z2412365804574_1f96dc6943da417ef4c5e0d128f1444a-768x768.jpg 768w, //giayxshop.vn/wp-content/uploads/2021/04/z2412365804574_1f96dc6943da417ef4c5e0d128f1444a-1536x1536.jpg 1536w, //giayxshop.vn/wp-content/uploads/2021/04/z2412365804574_1f96dc6943da417ef4c5e0d128f1444a-100x100.jpg 100w, //giayxshop.vn/wp-content/uploads/2021/04/z2412365804574_1f96dc6943da417ef4c5e0d128f1444a-300x300.jpg 300w\" data-lazy-sizes=\"(max-width: 2560px) 100vw, 2560px\" data-lazy-src=\"//giayxshop.vn/wp-content/uploads/2021/04/z2412365804574_1f96dc6943da417ef4c5e0d128f1444a.jpg\" sizes=\"(max-width: 2560px) 100vw, 2560px\" srcset=\"//giayxshop.vn/wp-content/uploads/2021/04/z2412365804574_1f96dc6943da417ef4c5e0d128f1444a.jpg 2560w, //giayxshop.vn/wp-content/uploads/2021/04/z2412365804574_1f96dc6943da417ef4c5e0d128f1444a-600x600.jpg 600w, //giayxshop.vn/wp-content/uploads/2021/04/z2412365804574_1f96dc6943da417ef4c5e0d128f1444a-2048x2048.jpg 2048w, //giayxshop.vn/wp-content/uploads/2021/04/z2412365804574_1f96dc6943da417ef4c5e0d128f1444a-150x150.jpg 150w, //giayxshop.vn/wp-content/uploads/2021/04/z2412365804574_1f96dc6943da417ef4c5e0d128f1444a-768x768.jpg 768w, //giayxshop.vn/wp-content/uploads/2021/04/z2412365804574_1f96dc6943da417ef4c5e0d128f1444a-1536x1536.jpg 1536w, //giayxshop.vn/wp-content/uploads/2021/04/z2412365804574_1f96dc6943da417ef4c5e0d128f1444a-100x100.jpg 100w, //giayxshop.vn/wp-content/uploads/2021/04/z2412365804574_1f96dc6943da417ef4c5e0d128f1444a-300x300.jpg 300w\" data-was-processed=\"true\" style=\"box-sizing: inherit; height: auto; max-width: 100%; margin-bottom: 1rem;\">&nbsp;<img class=\"alignnone size-full wp-image-45487 lazyloaded\" src=\"https://giayxshop.vn/wp-content/uploads/2021/04/z2412365808867_b9a2432bd47d734adf8d4aca3a09d248-scaled.jpg\" alt=\"\" width=\"2560\" height=\"2560\" data-lazy-srcset=\"//giayxshop.vn/wp-content/uploads/2021/04/z2412365808867_b9a2432bd47d734adf8d4aca3a09d248-scaled.jpg 2560w, //giayxshop.vn/wp-content/uploads/2021/04/z2412365808867_b9a2432bd47d734adf8d4aca3a09d248-600x600.jpg 600w, //giayxshop.vn/wp-content/uploads/2021/04/z2412365808867_b9a2432bd47d734adf8d4aca3a09d248-2048x2048.jpg 2048w, //giayxshop.vn/wp-content/uploads/2021/04/z2412365808867_b9a2432bd47d734adf8d4aca3a09d248-150x150.jpg 150w, //giayxshop.vn/wp-content/uploads/2021/04/z2412365808867_b9a2432bd47d734adf8d4aca3a09d248-768x768.jpg 768w, //giayxshop.vn/wp-content/uploads/2021/04/z2412365808867_b9a2432bd47d734adf8d4aca3a09d248-1536x1536.jpg 1536w, //giayxshop.vn/wp-content/uploads/2021/04/z2412365808867_b9a2432bd47d734adf8d4aca3a09d248-100x100.jpg 100w, //giayxshop.vn/wp-content/uploads/2021/04/z2412365808867_b9a2432bd47d734adf8d4aca3a09d248-300x300.jpg 300w\" data-lazy-sizes=\"(max-width: 2560px) 100vw, 2560px\" data-lazy-src=\"//giayxshop.vn/wp-content/uploads/2021/04/z2412365808867_b9a2432bd47d734adf8d4aca3a09d248-scaled.jpg\" sizes=\"(max-width: 2560px) 100vw, 2560px\" srcset=\"//giayxshop.vn/wp-content/uploads/2021/04/z2412365808867_b9a2432bd47d734adf8d4aca3a09d248-scaled.jpg 2560w, //giayxshop.vn/wp-content/uploads/2021/04/z2412365808867_b9a2432bd47d734adf8d4aca3a09d248-600x600.jpg 600w, //giayxshop.vn/wp-content/uploads/2021/04/z2412365808867_b9a2432bd47d734adf8d4aca3a09d248-2048x2048.jpg 2048w, //giayxshop.vn/wp-content/uploads/2021/04/z2412365808867_b9a2432bd47d734adf8d4aca3a09d248-150x150.jpg 150w, //giayxshop.vn/wp-content/uploads/2021/04/z2412365808867_b9a2432bd47d734adf8d4aca3a09d248-768x768.jpg 768w, //giayxshop.vn/wp-content/uploads/2021/04/z2412365808867_b9a2432bd47d734adf8d4aca3a09d248-1536x1536.jpg 1536w, //giayxshop.vn/wp-content/uploads/2021/04/z2412365808867_b9a2432bd47d734adf8d4aca3a09d248-100x100.jpg 100w, //giayxshop.vn/wp-content/uploads/2021/04/z2412365808867_b9a2432bd47d734adf8d4aca3a09d248-300x300.jpg 300w\" data-was-processed=\"true\" style=\"box-sizing: inherit; height: auto; max-width: 100%; margin-bottom: 1rem;\"></li></ul>', 200000, 44, 1, '4444444', 'item/HTjZBx_simg_de2fe0_500x500_maxb.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` int(11) NOT NULL,
  `Password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `HoTenKH` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TenCongTy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SoDienThoai` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `Password`, `HoTenKH`, `TenCongTy`, `SoDienThoai`, `Email`) VALUES
(5, '25d55ad283aa400af464c76d713c07ad', 'Nguyễn Vũ Trụ', 'This', '034789987', 'vadnh@gmail.com'),
(51, '25d55ad283aa400af464c76d713c07ad', 'Ko Koi Koi', 'This', '1212121212', 'K@gmail.com'),
(52, '25d55ad283aa400af464c76d713c07ad', 'Nguyễn Trần Thanh Điền', 'Điền CT', '88888888', 'dien@gmail.com'),
(53, '25d55ad283aa400af464c76d713c07ad', 'Nguyễn Trần Thanh Toàn', 'Công ty Đó', '0358485078', '123@gmail.com'),
(54, '25d55ad283aa400af464c76d713c07ad', 'Hồ Viêt Hưng', 'Huung', '0358485088', 'Fgg@gmail.com'),
(55, '25d55ad283aa400af464c76d713c07ad', 'Huỳnh Thị Thúy', 'Thuy thyu', '44444444', 'N@gmail.com'),
(56, '25d55ad283aa400af464c76d713c07ad', 'Nguyễn Ngọc Châu', 'Cầu Giấy', '00009999', 'chauu@gmaii.com'),
(59, '52605a118d3123252d8ede57844b89e5', 'Nguyễn Gia Đình', 'Ngô', '9090909090', 'Tgg@gmail.com'),
(60, '25d55ad283aa400af464c76d713c07ad', 'Lý Tiêm Tiêm', 'TQ', '131313131313', 'Tiem@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaihanghoa`
--

CREATE TABLE `loaihanghoa` (
  `MaLoaiHang` int(11) NOT NULL,
  `TenLoaiHang` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaihanghoa`
--

INSERT INTO `loaihanghoa` (`MaLoaiHang`, `TenLoaiHang`) VALUES
(1, 'Áo khoác'),
(2, 'Áo thung'),
(3, 'Giày thể thao'),
(4, 'Quần tây'),
(7, 'Khăn'),
(8, 'Nón'),
(9, 'Quần Kaki'),
(12, 'Áo ba lỗ'),
(20, 'Vớ thể thao'),
(22, 'Găng tay'),
(23, 'Dép'),
(25, 'Áo ấm'),
(28, 'Quần short'),
(29, 'Áo sơ mi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` int(11) NOT NULL,
  `Password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `HoTenNV` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ChucVu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SoDienThoai` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `Password`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`) VALUES
(1, '25d55ad283aa400af464c76d713c07ad', 'Bùi Việt Anh', 'Chủ Tịch', 'TP Vị Thanh, Hậu Giang', '0358485077'),
(2, '25d55ad283aa400af464c76d713c07ad', 'Nguyễn Thanh Tú', 'Shiper', 'Châu Đốc, An Giang', '0358485076'),
(3, '25d55ad283aa400af464c76d713c07ad', 'Hồ Duy Thanh', 'Quản kho', 'Đường 30/4, quận Ninh Kiều, thành phố Cần Thơ', '999999999'),
(10, '25d55ad283aa400af464c76d713c07ad', 'Hoàng Cao Đại', 'Bảo vệ', 'Châu Thành, Đồng Tháp', '02211334455'),
(11, '25d55ad283aa400af464c76d713c07ad', 'Lê Giám Đốc', 'Kiểm Vầy', 'Châu Thành, Hậu Giang', '88888888'),
(18, '25d55ad283aa400af464c76d713c07ad', 'Áo Áo Caro', 'Quản lý quầy', 'TP Vị Thanh, Hậu Giang', '02211000000'),
(19, '25d55ad283aa400af464c76d713c07ad', 'Lê Quốc Đại', 'Kiểm kho', 'TP Vị Thanh, Hậu Giang', '123123123123');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD PRIMARY KEY (`SoDonDH`,`MSHH`),
  ADD KEY `fk_CTDH_HH` (`MSHH`);

--
-- Chỉ mục cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonDH`),
  ADD KEY `fk_DH_KH` (`MSKH`),
  ADD KEY `fk_DH_NV` (`MSNV`);

--
-- Chỉ mục cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  ADD PRIMARY KEY (`MaDC`),
  ADD KEY `fk_KH_Diachi` (`MSKH`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`),
  ADD KEY `fk_LoaiHangHoa_HangHoa_MaLoaiHang` (`MaLoaiHang`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`),
  ADD UNIQUE KEY `SoDienThoai` (`SoDienThoai`);

--
-- Chỉ mục cho bảng `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  ADD PRIMARY KEY (`MaLoaiHang`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`),
  ADD UNIQUE KEY `SoDienThoai` (`SoDienThoai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  MODIFY `SoDonDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT cho bảng `dathang`
--
ALTER TABLE `dathang`
  MODIFY `SoDonDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  MODIFY `MaDC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `MSHH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MSKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  MODIFY `MaLoaiHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MSNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD CONSTRAINT `fk_CTDH_DH` FOREIGN KEY (`SoDonDH`) REFERENCES `dathang` (`SoDonDH`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_CTDH_HH` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `fk_DH_KH` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_DH_NV` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  ADD CONSTRAINT `fk_KH_Diachi` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `fk_LoaiHangHoa_HangHoa_MaLoaiHang` FOREIGN KEY (`MaLoaiHang`) REFERENCES `loaihanghoa` (`MaLoaiHang`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
