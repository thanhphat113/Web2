-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 07, 2024 lúc 06:17 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cuahangdienthoai`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_hd`
--

CREATE TABLE `chitiet_hd` (
  `MaHD` char(9) NOT NULL,
  `Serial` varchar(20) NOT NULL,
  `TongTien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_pn`
--

CREATE TABLE `chitiet_pn` (
  `MaPN` char(9) NOT NULL,
  `Serial` varchar(20) NOT NULL,
  `Tổng tiền` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_sp`
--

CREATE TABLE `chitiet_sp` (
  `MaSP` char(5) NOT NULL,
  `MaCT` char(10) NOT NULL,
  `Mau` varchar(20) NOT NULL,
  `HinhAnh` varchar(255) NOT NULL,
  `MoTa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiet_sp`
--

INSERT INTO `chitiet_sp` (`MaSP`, `MaCT`, `Mau`, `HinhAnh`, `MoTa`) VALUES
('SP001', 'SP001-D', 'Titan Đen', 'Pictures\\15promax-black.jpg', ''),
('SP001', 'SP001-T', 'Titan Trắng', 'Pictures\\15promax-white.jpg', ''),
('SP001', 'SP001-TN', 'Titan Tự nhiên', 'Pictures\\15promax-natural.jpg', ''),
('SP001', 'SP001-X', 'Titan Xanh', 'Pictures\\15promax-blue.jpg', ''),
('SP002', 'SP002-D', 'Đen', 'Pictures\\iphone-12-black.jpg', NULL),
('SP002', 'SP002-Do', 'Đỏ', 'Pictures\\iphone-12-red.jpg', NULL),
('SP002', 'SP002-T', 'Trắng', 'Pictures\\iphone-12-white.jpg', NULL),
('SP002', 'SP002-Tm', 'Tím', 'Pictures\\iphone-12-purple.jpg', NULL),
('SP002', 'SP002-X', 'Xanh dương', 'Pictures\\iphone-12-blue.jpg', NULL),
('SP002', 'SP002-Xl', 'Xanh lá', 'Pictures\\iphone-12-green.jpg', NULL),
('SP003', 'SP003-B', 'Bạc', 'Pictures\\m1air-2020-silver.jpg', ''),
('SP003', 'SP003-Dg', 'Vàng đồng', 'Pictures\\m1air-2020-bronze.jpg', ''),
('SP003', 'SP003-Xm', 'Xám', 'Pictures\\m1air-2020-grey.jpg', ''),
('SP004', 'SP004-B', 'Bạc', 'Pictures\\ipadprom2-silver.jpg', ''),
('SP004', 'SP004-Xm', 'Xám', 'Pictures\\ipadprom2-grey.jpg', ''),
('SP009', 'SP009-Ba', 'Bạc', 'Pictures\\macpro-14i-m3-silver.jpg', NULL),
('SP009', 'SP009-Xm', 'Xám', 'Pictures\\macpro-14i-m3-grey.jpg', NULL),
('SP010', 'SP010-Ba', 'Bạc', 'Pictures\\macpro-14i-m3p-silver.jpg', NULL),
('SP010', 'SP010-D', 'Đen', 'Pictures\\macpro-14i-m3p-black.jpg', NULL),
('SP011', 'SP011-Ba', 'Bạc', 'Pictures\\macpro-14i-m3max-silver.jpg', NULL),
('SP011', 'SP011-D', 'Đen', 'Pictures\\macpro-14i-m3max-black.jpg', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucnang`
--

CREATE TABLE `chucnang` (
  `MaCN` int(11) NOT NULL,
  `TenCN` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chucnang`
--

INSERT INTO `chucnang` (`MaCN`, `TenCN`) VALUES
(1, 'Thêm'),
(2, 'Xoá'),
(3, 'Sửa'),
(4, 'Xem');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `MaDM` char(5) NOT NULL,
  `TenDM` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`MaDM`, `TenDM`) VALUES
('IP', 'iPhone'),
('IPa', 'iPad'),
('MB', 'MacBook'),
('PhK', 'Phụ kiện'),
('TnL', 'Tai nghe, Loa'),
('WA', 'Watch');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` char(9) NOT NULL,
  `MaNV` char(9) DEFAULT NULL,
  `MaKH` char(9) DEFAULT NULL,
  `MaKM` char(9) DEFAULT NULL,
  `NgayTao` date NOT NULL,
  `TongTien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` char(9) NOT NULL,
  `TenKH` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `SoDienThoai` varchar(255) NOT NULL,
  `MaTK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `TenKH`, `Email`, `SoDienThoai`, `MaTK`) VALUES
('KH001', 'Châu Ngọc Quyên', 'ngocquyen@gmail.com', '00000000', 3),
('KH002', 'Nguyễn Hải', 'nguyenhai@gmail.com', '344412', 7),
('KH003', 'Thanh Ngọc', 'thanhngoc@gmail.com', '344412', 8),
('KH004', 'Sơn Nguyên', 'sonnguyen@gmail.com', '344412', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `MaKM` char(9) NOT NULL,
  `TiLeGiam` varchar(255) NOT NULL,
  `MaLoai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`MaKM`, `TiLeGiam`, `MaLoai`) VALUES
('HOLIDAY', '0.05', 2),
('LUCKYDAY', '0.1', 2),
('SURPRISE', '1000000', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai_sp`
--

CREATE TABLE `khuyenmai_sp` (
  `MaKM` char(9) NOT NULL,
  `TiLe` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai_sp`
--

INSERT INTO `khuyenmai_sp` (`MaKM`, `TiLe`) VALUES
('NONE', 0),
('SALE10', 0.1),
('SALE5', 0.05);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai_taikhoan`
--

CREATE TABLE `khuyenmai_taikhoan` (
  `MaKM` char(9) NOT NULL,
  `MaTK` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai_taikhoan`
--

INSERT INTO `khuyenmai_taikhoan` (`MaKM`, `MaTK`) VALUES
('SURPRISE', 2),
('HOLIDAY', 2),
('LUCKYDAY', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisp`
--

CREATE TABLE `loaisp` (
  `MaDM` char(5) NOT NULL,
  `MaLoai` char(10) NOT NULL,
  `TenLoai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisp`
--

INSERT INTO `loaisp` (`MaDM`, `MaLoai`, `TenLoai`) VALUES
('IP', 'IP12', 'iPhone12'),
('IP', 'IP13', 'iPhone13'),
('IP', 'IP14', 'iPhone14'),
('IP', 'IP15', 'iPhone15'),
('IPa', 'IPa10', 'iPad 10'),
('IPa', 'IPa9', 'iPad 9'),
('IPa', 'IPaA-M1', 'iPad Air M1'),
('IPa', 'IPaMini', 'iPad mini'),
('IPa', 'IPaPr-M2', 'iPad Pro M2'),
('TnL', 'LO', 'Loa'),
('MB', 'M-Di', 'Mac Displays'),
('MB', 'M-St', 'Mac Studio'),
('MB', 'MB-A', 'MacBook Air'),
('MB', 'MB-i', 'iMac'),
('MB', 'MB-m', 'MacBook mini'),
('MB', 'MB-Pr', 'MacBook Pro'),
('PhK', 'P-AW', 'Phụ kiện Apple Watch'),
('PhK', 'P-IP', 'Phụ kiện iPhone'),
('PhK', 'P-IPa', 'Phụ kiện iPad'),
('PhK', 'P-M', 'Phụ kiện Mac'),
('TnL', 'TN', 'Tai nghe'),
('WA', 'WA-SE22', 'Apple Watch SE 2022'),
('WA', 'WA-SE23', 'Apple Watch SE 2023'),
('WA', 'WA-Sr8', 'Apple Watch Series 8'),
('WA', 'WA-Sr9', 'Apple Watch Series 9'),
('WA', 'WA-Ul2', 'Apple Watch Ultra 2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_km`
--

CREATE TABLE `loai_km` (
  `MaLoai` int(11) NOT NULL,
  `TenLoai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_km`
--

INSERT INTO `loai_km` (`MaLoai`, `TenLoai`) VALUES
(1, 'Trực tiếp'),
(2, 'Giảm %');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `MaNCC` char(9) NOT NULL,
  `TenNCC` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `SoDienThoai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`MaNCC`, `TenNCC`, `Email`, `SoDienThoai`) VALUES
('CC001', 'Apple', 'apple@gmail.com', '0000000000'),
('CC002', 'Banana', 'Banana@gmail.com', '0000000000'),
('CC003', 'Coconut', 'Coconut@gmail.com', '0000000000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` char(9) NOT NULL,
  `TenNV` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `SoDienThoai` varchar(255) NOT NULL,
  `MaTK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `TenNV`, `Email`, `SoDienThoai`, `MaTK`) VALUES
('NV001', 'Lý Thanh Phát', 'thanhphat@gmail.com', '0000000000', 2),
('NV002', 'Sơn Tùng', 'sontung@gmail.com', '000000000', 4),
('NV003', 'Nguyễn Sơn', 'nguyenson@gmail.com', '000000000', 5),
('NV004', 'Ngọc Tâm', 'ngoctam@gmail.com', '000000000', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieubaohanh`
--

CREATE TABLE `phieubaohanh` (
  `MaBH` char(9) NOT NULL,
  `MaNV` char(9) NOT NULL,
  `MaKH` char(9) NOT NULL,
  `Serial` varchar(20) NOT NULL,
  `NgayTao` date NOT NULL,
  `NgayTra` date NOT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `MaPN` char(9) NOT NULL,
  `MaNCC` char(9) NOT NULL,
  `NgayTao` date NOT NULL,
  `TongTien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `MaQuyen` int(11) NOT NULL,
  `TenQuyen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`MaQuyen`, `TenQuyen`) VALUES
(0, 'Admin'),
(1, 'Nhân viên'),
(2, 'Khách hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen_chucnang`
--

CREATE TABLE `quyen_chucnang` (
  `MaQuyen` int(11) NOT NULL,
  `MaCN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen_chucnang`
--

INSERT INTO `quyen_chucnang` (`MaQuyen`, `MaCN`) VALUES
(0, 1),
(0, 2),
(0, 3),
(0, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaLoai` char(10) NOT NULL,
  `MaSP` char(5) NOT NULL,
  `TenSP` varchar(255) NOT NULL,
  `BaoHanh` int(30) NOT NULL,
  `TrangThai` int(11) NOT NULL,
  `MaKM` char(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaLoai`, `MaSP`, `TenSP`, `BaoHanh`, `TrangThai`, `MaKM`) VALUES
('IP15', 'SP001', 'iPhone 15 Pro Max', 24, 0, 'SALE5'),
('IP12', 'SP002', 'iPhone 12', 24, 0, 'NONE'),
('MB-A', 'SP003', 'MacBook Air 13 inch M1 2020 8CPU - 7GPU', 24, 0, 'SALE10'),
('IPaPr-M2', 'SP004', 'iPad Pro M2 12.9 inch WiFi Cellular ', 24, 0, 'NONE'),
('WA-Sr9', 'SP005', 'Apple Watch Series 9', 12, 0, 'NONE'),
('IP12', 'SP006', 'iPhone 12', 24, 0, 'NONE'),
('IPaMini', 'SP007', 'iPad mini 6 WiFi + Cellular', 24, 0, 'NONE'),
('IPa9', 'SP008', 'iPad 9 WiFi', 24, 0, 'NONE'),
('MB-Pr', 'SP009', 'MacBook Pro 14 inch M3', 24, 0, 'SALE10'),
('MB-Pr', 'SP010', 'MacBook Pro 14 inch M3 Pro', 24, 0, 'SALE10'),
('MB-Pr', 'SP011', 'MacBook Pro 14 inch M3 Max', 24, 0, 'SALE5'),
('MB-Pr', 'SP012', 'MacBook Pro 16 inch M3 Pro', 24, 0, 'SALE10'),
('MB-Pr', 'SP013', 'MacBook Pro 16 inch M3 Max', 24, 0, 'SALE10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham_img`
--

CREATE TABLE `sanpham_img` (
  `MaCT` char(10) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham_img`
--

INSERT INTO `sanpham_img` (`MaCT`, `img`) VALUES
('SP001-D', 'Pictures\\15promax-black-1.jpg'),
('SP001-D', 'Pictures\\15promax-black-2.jpg'),
('SP001-D', 'Pictures\\15promax-black-3.jpg'),
('SP001-D', 'Pictures\\15promax-black-4.jpg'),
('SP001-D', 'Pictures\\15promax-black-5.jpg'),
('SP001-X', 'Pictures\\15promax-blue-1.jpg'),
('SP001-X', 'Pictures\\15promax-blue-2.jpg'),
('SP001-X', 'Pictures\\15promax-blue-3.jpg'),
('SP001-X', 'Pictures\\15promax-blue-4.jpg'),
('SP001-X', 'Pictures\\15promax-blue-5.jpg'),
('SP001-T', 'Pictures\\15promax-white-1.jpg'),
('SP001-T', 'Pictures\\15promax-white-2.jpg'),
('SP001-T', 'Pictures\\15promax-white-3.jpg'),
('SP001-T', 'Pictures\\15promax-white-4.jpg'),
('SP001-T', 'Pictures\\15promax-white-5.jpg'),
('SP001-TN', 'Pictures\\15promax-natural-1.jpg'),
('SP001-TN', 'Pictures\\15promax-natural-2.jpg'),
('SP001-TN', 'Pictures\\15promax-natural-3.jpg'),
('SP001-TN', 'Pictures\\15promax-natural-4.jpg'),
('SP001-TN', 'Pictures\\15promax-natural-5.jpg'),
('SP003-B', 'Pictures\\m1air-2020-silver-1.jpg'),
('SP003-B', 'Pictures\\m1air-2020-silver-2.jpg'),
('SP003-B', 'Pictures\\m1air-2020-silver-3.jpg'),
('SP003-B', 'Pictures\\m1air-2020-silver-4.jpg'),
('SP003-Dg', 'Pictures\\m1air-2020-bronze-1.jpg'),
('SP003-Dg', 'Pictures\\m1air-2020-bronze-2.jpg'),
('SP003-Dg', 'Pictures\\m1air-2020-bronze-3.jpg'),
('SP003-Dg', 'Pictures\\m1air-2020-bronze-4.jpg'),
('SP003-Xm', 'Pictures\\m1air-2020-grey-1.jpg'),
('SP003-Xm', 'Pictures\\m1air-2020-grey-2.jpg'),
('SP003-Xm', 'Pictures\\m1air-2020-grey-3.jpg'),
('SP003-Xm', 'Pictures\\m1air-2020-grey-4.jpg'),
('SP004-Xm', 'Pictures\\ipadprom2-grey-1.jpg'),
('SP004-Xm', 'Pictures\\ipadprom2-grey-2.jpg'),
('SP004-Xm', 'Pictures\\ipadprom2-grey-3.jpg'),
('SP004-B', 'Pictures\\ipadprom2-silver-1.jpg'),
('SP004-B', 'Pictures\\ipadprom2-silver-2.jpg'),
('SP004-B', 'Pictures\\ipadprom2-silver-3.jpg'),
('SP002-D', 'Pictures\\iphone-12-black-1'),
('SP002-D', 'Pictures\\iphone-12-black-2'),
('SP002-D', 'Pictures\\iphone-12-black-3'),
('SP002-Do', 'Pictures\\iphone-12-red-1'),
('SP002-Do', 'Pictures\\iphone-12-red-2'),
('SP002-Do', 'Pictures\\iphone-12-red-3'),
('SP002-T', 'Pictures\\iphone-12-white-1'),
('SP002-T', 'Pictures\\iphone-12-white-2'),
('SP002-T', 'Pictures\\iphone-12-white-3'),
('SP002-Tm', 'Pictures\\iphone-12-purple-1'),
('SP002-Tm', 'Pictures\\iphone-12-purple-2'),
('SP002-Tm', 'Pictures\\iphone-12-purple-3'),
('SP002-X', 'Pictures\\iphone-12-blue-1'),
('SP002-X', 'Pictures\\iphone-12-blue-2'),
('SP002-X', 'Pictures\\iphone-12-blue-3'),
('SP002-Xl', 'Pictures\\iphone-12-green-1'),
('SP002-Xl', 'Pictures\\iphone-12-green-2'),
('SP002-Xl', 'Pictures\\iphone-12-green-3'),
('SP009-Xm', 'Pictures\\macpro-14i-m3-grey-1.jpg'),
('SP009-Xm', 'Pictures\\macpro-14i-m3-grey-2.jpg'),
('SP009-Xm', 'Pictures\\macpro-14i-m3-grey-3.jpg'),
('SP009-Xm', 'Pictures\\macpro-14i-m3-grey-4.jpg'),
('SP009-Xm', 'Pictures\\macpro-14i-m3-grey-5.jpg'),
('SP009-Xm', 'Pictures\\macpro-14i-m3-grey-6.jpg'),
('SP009-Xm', 'Pictures\\macpro-14i-m3-grey-7.jpg'),
('SP009-Xm', 'Pictures\\macpro-14i-m3-grey-8.jpg'),
('SP009-Ba', 'Pictures\\macpro-14i-m3-silver-1.jpg'),
('SP009-Ba', 'Pictures\\macpro-14i-m3-silver-2.jpg'),
('SP009-Ba', 'Pictures\\macpro-14i-m3-silver-3.jpg'),
('SP009-Ba', 'Pictures\\macpro-14i-m3-silver-4.jpg'),
('SP009-Ba', 'Pictures\\macpro-14i-m3-silver-5.jpg'),
('SP009-Ba', 'Pictures\\macpro-14i-m3-silver-6.jpg'),
('SP009-Ba', 'Pictures\\macpro-14i-m3-silver-7.jpg'),
('SP009-Ba', 'Pictures\\macpro-14i-m3-silver-8.jpg'),
('SP010-Ba', 'Pictures\\macpro-14i-m3max-silver-1.jpg'),
('SP010-Ba', 'Pictures\\macpro-14i-m3max-silver-2.jpg'),
('SP010-Ba', 'Pictures\\macpro-14i-m3max-silver-3.jpg'),
('SP010-Ba', 'Pictures\\macpro-14i-m3max-silver-4.jpg'),
('SP010-Ba', 'Pictures\\macpro-14i-m3max-silver-5.jpg'),
('SP010-Ba', 'Pictures\\macpro-14i-m3max-silver-6.jpg'),
('SP010-Ba', 'Pictures\\macpro-14i-m3max-silver-7.jpg'),
('SP010-Ba', 'Pictures\\macpro-14i-m3max-silver-8.jpg'),
('SP011-Ba', 'Pictures\\macpro-14i-m3max-silver-1.jpg'),
('SP011-Ba', 'Pictures\\macpro-14i-m3max-silver-2.jpg'),
('SP011-Ba', 'Pictures\\macpro-14i-m3max-silver-3.jpg'),
('SP011-Ba', 'Pictures\\macpro-14i-m3max-silver-4.jpg'),
('SP011-Ba', 'Pictures\\macpro-14i-m3max-silver-5.jpg'),
('SP011-Ba', 'Pictures\\macpro-14i-m3max-silver-6.jpg'),
('SP011-Ba', 'Pictures\\macpro-14i-m3max-silver-7.jpg'),
('SP011-Ba', 'Pictures\\macpro-14i-m3max-silver-8.jpg'),
('SP010-D', 'Pictures\\macpro-14i-m3p-black-1.jpg'),
('SP010-D', 'Pictures\\macpro-14i-m3p-black-2.jpg'),
('SP010-D', 'Pictures\\macpro-14i-m3p-black-3.jpg'),
('SP010-D', 'Pictures\\macpro-14i-m3p-black-4.jpg'),
('SP010-D', 'Pictures\\macpro-14i-m3p-black-5.jpg'),
('SP010-D', 'Pictures\\macpro-14i-m3p-black-6.jpg'),
('SP010-D', 'Pictures\\macpro-14i-m3p-black-7.jpg'),
('SP010-D', 'Pictures\\macpro-14i-m3p-black-8.jpg'),
('SP011-D', 'Pictures\\macpro-14i-m3p-black-1.jpg'),
('SP011-D', 'Pictures\\macpro-14i-m3p-black-2.jpg'),
('SP011-D', 'Pictures\\macpro-14i-m3p-black-3.jpg'),
('SP011-D', 'Pictures\\macpro-14i-m3p-black-4.jpg'),
('SP011-D', 'Pictures\\macpro-14i-m3p-black-5.jpg'),
('SP011-D', 'Pictures\\macpro-14i-m3p-black-6.jpg'),
('SP011-D', 'Pictures\\macpro-14i-m3p-black-7.jpg'),
('SP011-D', 'Pictures\\macpro-14i-m3p-black-8.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sp_giaban`
--

CREATE TABLE `sp_giaban` (
  `MaCT` char(10) NOT NULL,
  `MaCH` char(15) NOT NULL,
  `CauHinh` varchar(255) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sp_giaban`
--

INSERT INTO `sp_giaban` (`MaCT`, `MaCH`, `CauHinh`, `SoLuong`, `DonGia`) VALUES
('SP001-D', '001-D-1TB', '1TB', 0, 46990000),
('SP001-D', '001-D-256', '256GB', 0, 34990000),
('SP001-D', '001-D-512', '512GB', 0, 40990000),
('SP001-T', '001-T-1TB', '1TB', 0, 46990000),
('SP001-T', '001-T-256', '256GB', 0, 34990000),
('SP001-T', '001-T-512', '512GB', 0, 40990000),
('SP001-TN', '001-TN-1TB', '1TB', 0, 46990000),
('SP001-TN', '001-TN-256', '256GB', 0, 34990000),
('SP001-TN', '001-TN-512', '512GB', 0, 40990000),
('SP001-X', '001-X-1TB', '1TB', 0, 46990000),
('SP001-X', '001-X-256', '256GB', 0, 34990000),
('SP001-X', '001-X-512', '512GB', 0, 40990000),
('SP002-D', '002-D-128', '128GB', 0, 16490000),
('SP002-D', '002-D-256', '256GB', 0, 17990000),
('SP002-D', '002-D-64', '64GB', 0, 14890000),
('SP002-T', '002-D0-64', '64GB', 0, 14890000),
('SP002-Do', '002-Do-128', '128GB', 0, 16490000),
('SP002-Do', '002-Do-256', '256GB', 0, 17990000),
('SP002-Do', '002-Do-64', '64GB', 0, 14890000),
('SP002-T', '002-T-128', '128GB', 0, 16490000),
('SP002-T', '002-T-256', '256GB', 0, 17990000),
('SP002-Tm', '002-Tm-128', '128GB', 0, 16490000),
('SP002-Tm', '002-Tm-256', '256GB', 0, 17990000),
('SP002-Tm', '002-Tm-64', '64GB', 0, 14890000),
('SP002-X', '002-X-128', '128GB', 0, 16490000),
('SP002-X', '002-X-256', '256GB', 0, 17990000),
('SP002-X', '002-X-64', '64GB', 0, 14890000),
('SP002-Xl', '002-Xl-128', '128GB', 0, 16490000),
('SP002-Xl', '002-Xl-256', '256GB', 0, 17990000),
('SP002-Xl', '002-Xl-64', '64GB', 0, 14890000),
('SP003-B', '003-B8-256', 'RAM 8GB - SSD 256GB', 0, 19590000),
('SP003-Dg', '003-Dg8-256', 'RAM 8GB - SSD 256GB', 0, 19590000),
('SP003-Xm', '003-Xm8-256', 'RAM 8GB - SSD 256GB', 0, 19590000),
('SP004-B', '004-B-128', '128GB', 0, 33090000),
('SP004-B', '004-B-256', '256GB', 0, 35690000),
('SP004-Xm', '004-Xm-128', '128GB', 0, 33090000),
('SP004-Xm', '004-Xm-256', '256GB', 0, 35690000),
('SP009-Ba', '009-Ba-16-512', 'RAM 16 GB - SSD 512GB', 0, 44990000),
('SP009-Ba', '009-Ba-8-512', 'RAM 8 GB - SSD 512 GB', 0, 39990000),
('SP009-Xm', '009-Xm-16-512', 'RAM 16GB - SSD 512 GB', 0, 44990000),
('SP009-Xm', '009-Xm-8-512', 'RAM 8 GB - SSD 512GB', 0, 39990000),
('SP010-Ba', '010-Ba-18-1TB', 'RAM 18 GB - SSD 1 TB', 0, 54990000),
('SP010-Ba', '010-Ba-18-512', 'RAM 18GB - SSD 512 GB', 0, 49490000),
('SP010-D', '010-D-18-1TB', 'RAM 18 GB - SSD 1 TB', 0, 54990000),
('SP010-D', '010-D-18-512', 'RAM 18 GB - SSD 512 GB', 0, 49490000),
('SP011-Ba', '011-Ba-36-1TB', 'RAM 36 GB - SSD 1 TB ', 0, 79990000),
('SP011-D', '011-D-36-1TB', 'RAM 36 GB - SSD 1 TB', 0, 79990000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sp_serial`
--

CREATE TABLE `sp_serial` (
  `MaCH` char(15) NOT NULL,
  `Serial` varchar(20) NOT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTK` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `TrangThai` tinyint(1) NOT NULL,
  `MaQuyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`MaTK`, `Username`, `Password`, `TrangThai`, `MaQuyen`) VALUES
(1, 'admin', 'admin', 1, 0),
(2, 'thanhphat', '123', 1, 1),
(3, 'ngocquyen', '123', 1, 2),
(4, 'sontung', '123', 1, 1),
(5, 'nguyenson', '123', 1, 1),
(6, 'ngoctam', '123', 1, 1),
(7, 'nguyenhai', '123', 1, 2),
(8, 'thanhngoc', '123', 1, 2),
(9, 'sonnguyen', '123', 1, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiet_hd`
--
ALTER TABLE `chitiet_hd`
  ADD KEY `fk_maHD` (`MaHD`),
  ADD KEY `fk_serial_hd` (`Serial`);

--
-- Chỉ mục cho bảng `chitiet_pn`
--
ALTER TABLE `chitiet_pn`
  ADD KEY `fk_maPN` (`MaPN`),
  ADD KEY `fk_serial` (`Serial`);

--
-- Chỉ mục cho bảng `chitiet_sp`
--
ALTER TABLE `chitiet_sp`
  ADD PRIMARY KEY (`MaCT`),
  ADD KEY `fk_ct_sp` (`MaSP`);

--
-- Chỉ mục cho bảng `chucnang`
--
ALTER TABLE `chucnang`
  ADD PRIMARY KEY (`MaCN`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`MaDM`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `FK_HOADON_KH` (`MaKH`),
  ADD KEY `FK_HOADON_NV` (`MaNV`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`),
  ADD KEY `FK_KhachHang_TaiKhoan` (`MaTK`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`MaKM`),
  ADD KEY `FK_KhuyenMai_LoaiKM` (`MaLoai`);

--
-- Chỉ mục cho bảng `khuyenmai_sp`
--
ALTER TABLE `khuyenmai_sp`
  ADD PRIMARY KEY (`MaKM`);

--
-- Chỉ mục cho bảng `khuyenmai_taikhoan`
--
ALTER TABLE `khuyenmai_taikhoan`
  ADD KEY `FK__SuDung` (`MaTK`),
  ADD KEY `FK_SuDung_KM` (`MaKM`);

--
-- Chỉ mục cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`MaLoai`),
  ADD KEY `fk_madm` (`MaDM`);

--
-- Chỉ mục cho bảng `loai_km`
--
ALTER TABLE `loai_km`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`MaNCC`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`),
  ADD KEY `FK_NhanVien_TaiKhoan` (`MaTK`);

--
-- Chỉ mục cho bảng `phieubaohanh`
--
ALTER TABLE `phieubaohanh`
  ADD PRIMARY KEY (`MaBH`),
  ADD KEY `fk_nv_bh` (`MaNV`),
  ADD KEY `fk_kh_bh` (`MaKH`),
  ADD KEY `fk_serial_bh` (`Serial`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`MaPN`),
  ADD KEY `FK_PhieuNhap_NCC` (`MaNCC`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`MaQuyen`);

--
-- Chỉ mục cho bảng `quyen_chucnang`
--
ALTER TABLE `quyen_chucnang`
  ADD KEY `FK_CN2` (`MaCN`),
  ADD KEY `fk_quyen_chucnang` (`MaQuyen`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `fk_sp_km` (`MaKM`),
  ADD KEY `fk_sp_loai` (`MaLoai`);

--
-- Chỉ mục cho bảng `sanpham_img`
--
ALTER TABLE `sanpham_img`
  ADD KEY `fk_img_mact` (`MaCT`);

--
-- Chỉ mục cho bảng `sp_giaban`
--
ALTER TABLE `sp_giaban`
  ADD PRIMARY KEY (`MaCH`),
  ADD KEY `fk_ct_ch` (`MaCT`);

--
-- Chỉ mục cho bảng `sp_serial`
--
ALTER TABLE `sp_serial`
  ADD PRIMARY KEY (`Serial`),
  ADD KEY `fk_serial_ch` (`MaCH`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTK`),
  ADD KEY `FK_TaiKhoan_Quyen` (`MaQuyen`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiet_hd`
--
ALTER TABLE `chitiet_hd`
  ADD CONSTRAINT `fk_maHD` FOREIGN KEY (`MaHD`) REFERENCES `hoadon` (`MaHD`),
  ADD CONSTRAINT `fk_serial_hd` FOREIGN KEY (`Serial`) REFERENCES `sp_serial` (`Serial`);

--
-- Các ràng buộc cho bảng `chitiet_pn`
--
ALTER TABLE `chitiet_pn`
  ADD CONSTRAINT `fk_maPN` FOREIGN KEY (`MaPN`) REFERENCES `phieunhap` (`MaPN`),
  ADD CONSTRAINT `fk_serial` FOREIGN KEY (`Serial`) REFERENCES `sp_serial` (`Serial`);

--
-- Các ràng buộc cho bảng `chitiet_sp`
--
ALTER TABLE `chitiet_sp`
  ADD CONSTRAINT `fk_ct_sp` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `FK_HOADON_KH` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKH`),
  ADD CONSTRAINT `FK_HOADON_NV` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`);

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `FK_KhachHang_TaiKhoan` FOREIGN KEY (`MaTK`) REFERENCES `taikhoan` (`MaTK`);

--
-- Các ràng buộc cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD CONSTRAINT `FK_KhuyenMai_LoaiKM` FOREIGN KEY (`MaLoai`) REFERENCES `loai_km` (`MaLoai`);

--
-- Các ràng buộc cho bảng `khuyenmai_taikhoan`
--
ALTER TABLE `khuyenmai_taikhoan`
  ADD CONSTRAINT `FK_SuDung_KM` FOREIGN KEY (`MaKM`) REFERENCES `khuyenmai` (`MaKM`),
  ADD CONSTRAINT `FK__SuDung` FOREIGN KEY (`MaTK`) REFERENCES `taikhoan` (`MaTK`);

--
-- Các ràng buộc cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  ADD CONSTRAINT `fk_madm` FOREIGN KEY (`MaDM`) REFERENCES `danhmuc` (`MaDM`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `FK_NhanVien_TaiKhoan` FOREIGN KEY (`MaTK`) REFERENCES `taikhoan` (`MaTK`);

--
-- Các ràng buộc cho bảng `phieubaohanh`
--
ALTER TABLE `phieubaohanh`
  ADD CONSTRAINT `fk_kh_bh` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKH`),
  ADD CONSTRAINT `fk_nv_bh` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`),
  ADD CONSTRAINT `fk_serial_bh` FOREIGN KEY (`Serial`) REFERENCES `sp_serial` (`Serial`);

--
-- Các ràng buộc cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `FK_PhieuNhap_NCC` FOREIGN KEY (`MaNCC`) REFERENCES `nhacungcap` (`MaNCC`);

--
-- Các ràng buộc cho bảng `quyen_chucnang`
--
ALTER TABLE `quyen_chucnang`
  ADD CONSTRAINT `FK_CN1` FOREIGN KEY (`MaQuyen`) REFERENCES `quyen` (`MaQuyen`),
  ADD CONSTRAINT `FK_CN2` FOREIGN KEY (`MaCN`) REFERENCES `chucnang` (`MaCN`),
  ADD CONSTRAINT `fk_quyen_chucnang` FOREIGN KEY (`MaQuyen`) REFERENCES `quyen` (`MaQuyen`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sp_km` FOREIGN KEY (`MaKM`) REFERENCES `khuyenmai_sp` (`MaKM`),
  ADD CONSTRAINT `fk_sp_loai` FOREIGN KEY (`MaLoai`) REFERENCES `loaisp` (`MaLoai`);

--
-- Các ràng buộc cho bảng `sanpham_img`
--
ALTER TABLE `sanpham_img`
  ADD CONSTRAINT `fk_img_mact` FOREIGN KEY (`MaCT`) REFERENCES `chitiet_sp` (`MaCT`);

--
-- Các ràng buộc cho bảng `sp_giaban`
--
ALTER TABLE `sp_giaban`
  ADD CONSTRAINT `fk_ct_ch` FOREIGN KEY (`MaCT`) REFERENCES `chitiet_sp` (`MaCT`);

--
-- Các ràng buộc cho bảng `sp_serial`
--
ALTER TABLE `sp_serial`
  ADD CONSTRAINT `fk_serial_ch` FOREIGN KEY (`MaCH`) REFERENCES `sp_giaban` (`MaCH`);

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `FK_TaiKhoan_Quyen` FOREIGN KEY (`MaQuyen`) REFERENCES `quyen` (`MaQuyen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
