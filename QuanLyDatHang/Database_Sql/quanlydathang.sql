-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 07, 2021 lúc 10:30 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.1

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdathang`
--

INSERT INTO `chitietdathang` (`SoDonDH`, `MSHH`, `SoLuong`, `GiaDatHang`, `GiamGia`) VALUES
(1, 2, 1, 3500000, 0),
(1, 4, 1, 1500000, 0),
(2, 1, 2, 5000000, 0),
(2, 3, 1, 4700000, 0),
(3, 1, 2, 5000000, 0),
(3, 3, 3, 14100000, 0),
(4, 7, 1, 3850000, 0),
(4, 8, 1, 1759000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

CREATE TABLE `dathang` (
  `SoDonDH` int(11) NOT NULL,
  `MSKH` int(11) DEFAULT NULL,
  `MSNV` int(11) DEFAULT NULL,
  `NgayDH` date DEFAULT NULL,
  `NgayGH` date DEFAULT NULL,
  `TrangThai` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `dathang`
--

INSERT INTO `dathang` (`SoDonDH`, `MSKH`, `MSNV`, `NgayDH`, `NgayGH`, `TrangThai`) VALUES
(1, 2, 1, '2021-06-07', NULL, 'Đã xác nhận'),
(2, 2, 1, '2021-06-08', NULL, 'Đã hủy'),
(3, 2, NULL, '2021-06-08', NULL, 'Chờ xác nhận'),
(4, 2, NULL, NULL, NULL, 'Chưa đặt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachikh`
--

CREATE TABLE `diachikh` (
  `MaDC` int(11) NOT NULL,
  `DiaChi` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `MSKH` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `diachikh`
--

INSERT INTO `diachikh` (`MaDC`, `DiaChi`, `MSKH`) VALUES
(1, 'Ấp 1 Xã Vị Tân Thành Phố Vị Thanh Tỉnh Hậu Giang', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` int(11) NOT NULL,
  `TenHH` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `QuyCach` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `Gia` bigint(20) NOT NULL,
  `SoLuongHang` int(11) NOT NULL,
  `MaLoaiHang` int(11) DEFAULT NULL,
  `GhiChu` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `Hinh` varchar(200) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `QuyCach`, `Gia`, `SoLuongHang`, `MaLoaiHang`, `GhiChu`, `Hinh`) VALUES
(0, 'Nike Tiempo Legend 8 Academy TF Impulse - Aquamari', 'không có', 1890000, 100, 1, 'Được mệnh danh là giày đá bóng thoải mái nhất trên thế giới', '../img/nike_tiempolegend.jpg'),
(1, 'adidas X Ghosted .1 TF Superspectral - Shock Pink/', 'Khong biet', 2500000, 64, 2, 'là mẫu giày chuyên cho sân cỏ nhân tạo 5-7 người. Được những cầu thủ nổi tiếng đại diện như Macelo,.', '../img/adidasX_ghosted.jpg'),
(2, 'Nike Mercurial Superfly 8 Academy TF Black x Prism', 'Khong biet', 3500000, 38, 1, ' là dòng sản phẩm dành cho sân cỏ tự nhiên. Tiếp nối thành công của người đàn anh Superfly 7', '../img/nike14_4G.jpg'),
(3, 'Nike Mercurial Zoom Vapor 14 Pro TF Silver Safari ', 'Khong biet', 4700000, 37, 1, 'là mẫu giày chuyên dành cho mặt sân cỏ nhân tạo 5-7 người', '../img/nike14_pro.jpg'),
(4, 'adidas Top Sala IC - Solar Yellow/Footwear White/G', 'Khong biet', 1500000, 68, 2, ' là mẫu giày dành cho mặt sân Futsal và cỏ nhân tạo 5 người', '../img/adidas_salaIC.jpg'),
(5, 'Nike Phantom Venom Elite FG Euphoria-White/Blue', 'không có', 3250000, 150, 1, 'đây là mẫu giày được sử dụng bởi 2 siêu tiền đạo tiêu biểu Harry Kane và Edinson Cavani', '../img/nike_phantomvenom.jpg'),
(6, 'Adidas Copa Sense .3 FG/AG Superspectral', 'không có', 1750000, 45, 2, ' được làm chất liệu da tự nhiên ở phần đầu kết hợp da tổng hợp ở phần sau cho cảm giác banh tốt', '../img/adidas_copasense.png'),
(7, 'Adidas Predator 20.1 FG/AG Uniforia ', 'không có', 3850000, 23, 2, 'là mẫu giày dành cho mặt sân Cỏ Tự Nhiên 11 người', '../img/adidas_predator20.1.jpg'),
(8, 'Nike Mercurial Vapor 14 Academy MG Spectrum', 'không có', 1759000, 39, 1, 'nằm trong bộ sưu tập Spectrum Pack, Mercurial bắt mắt với colorway rực rỡ, nổi bật', '../img/nike_academyMG.jpg'),
(9, 'adidas Nemeziz 17.3 FG White/Mystery Ink/Easy Cora', 'không có', 1580000, 16, 2, 'Lấy cảm hứng từ những tay đấm boxing luôn quấn băng quanh cổ tay, bàn tay của mình trước khi thi đấu', '../img/adidas_nemeziz.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` int(11) NOT NULL,
  `Password` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `HoTenKH` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `TenCongTy` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `SoDienThoai` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `Email` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `Password`, `HoTenKH`, `TenCongTy`, `SoDienThoai`, `Email`) VALUES
(2, 'a4f5c8a416e34795ec3fa1321d0502d3', 'Hồ Việt Hưng', 'neymarsport', '0366832544', 'hoviethung9a1@gmail.com'),
(3, 'a4f5c8a416e34795ec3fa1321d0502d3', 'Nguyễn Kim Tuyến', '', '0333353434', 'tuyen@gmail.com'),
(6, 'a4f5c8a416e34795ec3fa1321d0502d3', 'Hồ Việt Hùng', '', '03668325787', 'hungho@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaihanghoa`
--

CREATE TABLE `loaihanghoa` (
  `MaLoaiHang` int(11) NOT NULL,
  `TenLoaiHang` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `loaihanghoa`
--

INSERT INTO `loaihanghoa` (`MaLoaiHang`, `TenLoaiHang`) VALUES
(1, 'Giày Nike'),
(2, 'Giày Adidas');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` int(11) NOT NULL,
  `Password` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `HoTenNV` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `ChucVu` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `DiaChi` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `SoDienThoai` varchar(20) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `Password`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`) VALUES
(1, 'a4f5c8a416e34795ec3fa1321d0502d3', 'Hồ Việt Hưng', 'Manager', 'Ấp 1 xã Vị Tân thành phố Vị Thanh tỉnh Hậu Giang', '0366832544');

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
  ADD PRIMARY KEY (`MSKH`);

--
-- Chỉ mục cho bảng `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  ADD PRIMARY KEY (`MaLoaiHang`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dathang`
--
ALTER TABLE `dathang`
  MODIFY `SoDonDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `diachikh`
--
ALTER TABLE `diachikh`
  MODIFY `MaDC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MSKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MSNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
