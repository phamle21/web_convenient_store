-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2021 at 09:59 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `SoDonDH` int(11) DEFAULT NULL,
  `MSHH` int(11) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `GiaDatHang` varchar(50) DEFAULT NULL,
  `GiamGia` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dathang`
--

CREATE TABLE `dathang` (
  `SoDonDH` int(11) NOT NULL,
  `MSKH` int(11) DEFAULT NULL,
  `MSNV` int(11) DEFAULT NULL,
  `NgayDH` timestamp NULL DEFAULT current_timestamp(),
  `NgayGH` timestamp NULL DEFAULT NULL,
  `DiaChiGH` varchar(500) DEFAULT NULL,
  `TrangThaiDH` varchar(50) DEFAULT 'Chưa duyệt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `diachikh`
--

CREATE TABLE `diachikh` (
  `MaDC` int(11) NOT NULL,
  `DiaChi` varchar(500) DEFAULT NULL,
  `MSKH` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diachikh`
--

INSERT INTO `diachikh` (`MaDC`, `DiaChi`, `MSKH`) VALUES
(14, 'Cần Thơ', 7),
(15, 'Kiên Giang', 7);

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `MaGH` int(11) NOT NULL,
  `MSHH` int(11) DEFAULT NULL,
  `MSKH` int(11) DEFAULT NULL,
  `SoLuongMua` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` int(11) NOT NULL,
  `TenHH` varchar(100) DEFAULT NULL,
  `MoTa` varchar(10000) DEFAULT NULL,
  `HinhMoTa` varchar(200) DEFAULT NULL,
  `Gia` varchar(200) DEFAULT NULL,
  `SoLuongHang` int(10) DEFAULT NULL,
  `MaLoaiHang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `MoTa`, `HinhMoTa`, `Gia`, `SoLuongHang`, `MaLoaiHang`) VALUES
(26, 'IPHONE 13', 'The new technology, professional in photography, high performance for usability, beautiful screen for the user experience has never been better.', '1636473892-img1-iphone-13-1.png', '23999000', 100, 99),
(27, 'IPHONE 13 PRO MAX', 'Brings professionalism in each functional component', '1636473870-img1-iphone-13-promax-1.png', '31999000', 100, 99),
(28, 'IPAD PRO M1 2021', 'Destroy pc and laptop. The replacement sooner or later', '1636473839-img1-ipad-pro-1.png', '25999000', 50, 100),
(29, 'IPAD MINI 6', 'A monster in a small body, bringing ipad to a new level, compact and convenient new design.', '1636473810-img1-ipad-mini-1.png', '13999000', 50, 100),
(30, 'MACBOOK PRO 2021', 'New more optimized design, new chip with outstanding performance', '1636473788-img1-macbook-pro-1.png', '31999000', 30, 101),
(31, 'APPLE WATCH SERI 7', 'Compact, convenient, monitor health anytime, anywhere.', '1636473760-img1-watch7-1.png', '8999000', 100, 102),
(32, 'AIRPODS PRO', 'Experience the ultimate with active noise cancellation, high-quality sound, redefining wireless headphones.', '1636473728-img1-AirPods-Pro-1.png', '4999000', 100, 103);

-- --------------------------------------------------------

--
-- Table structure for table `hinhhanghoa`
--

CREATE TABLE `hinhhanghoa` (
  `MaHinh` int(11) NOT NULL,
  `TenHinh` varchar(200) DEFAULT NULL,
  `MSHH` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `hinhhanghoa` (`MaHinh`, `TenHinh`, `MSHH`) VALUES
(42, '1636473892-img1-iphone-13-1.png', 26),
(43, '1636473892-img2-iphone-13-2.png', 26),
(44, '1636473892-img3-iphone-13-3.png', 26),
(45, '1636473870-img1-iphone-13-promax-1.png', 27),
(46, '1636473870-img2-iphone-13-promax-2.png', 27),
(47, '1636473870-img3-iphone-13-promax-3.png', 27),
(48, '1636473839-img1-ipad-pro-1.png', 28),
(49, '1636473839-img2-ipad-pro-2.png', 28),
(50, '1636473839-img3-ipad-pro-3.png', 28),
(51, '1636473810-img1-ipad-mini-1.png', 29),
(52, '1636473810-img2-ipad-mini-2.png', 29),
(53, '1636473810-img3-ipad-mini-3.png', 29),
(54, '1636473788-img1-macbook-pro-1.png', 30),
(55, '1636473788-img2-macbook-pro-2.png', 30),
(56, '1636473788-img3-macbook-pro-3.png', 30),
(57, '1636473760-img1-watch7-1.png', 31),
(58, '1636473760-img2-watch7-2.png', 31),
(59, '1636473760-img3-watch7-3.png', 31),
(60, '1636473728-img1-AirPods-Pro-1.png', 32),
(61, '1636473728-img2-AirPods-Pro-2.png', 32),
(62, '1636473728-img3-AirPods-Pro-3.png', 32);

--
-- Dumping data for table `hinhhanghoa`
--

INSERT INTO `hinhhanghoa` (`MaHinh`, `TenHinh`, `MSHH`) VALUES
(42, '1636473892-img1-iphone-13-1.png', 26),
(43, '1636473892-img2-iphone-13-2.png', 26),
(44, '1636473892-img3-iphone-13-3.png', 26),
(45, '1636473870-img1-iphone-13-promax-1.png', 27),
(46, '1636473870-img2-iphone-13-promax-2.png', 27),
(47, '1636473870-img3-iphone-13-promax-3.png', 27),
(48, '1636473839-img1-ipad-pro-1.png', 28),
(49, '1636473839-img2-ipad-pro-2.png', 28),
(50, '1636473839-img3-ipad-pro-3.png', 28),
(51, '1636473810-img1-ipad-mini-1.png', 29),
(52, '1636473810-img2-ipad-mini-2.png', 29),
(53, '1636473810-img3-ipad-mini-3.png', 29),
(54, '1636473788-img1-macbook-pro-1.png', 30),
(55, '1636473788-img2-macbook-pro-2.png', 30),
(56, '1636473788-img3-macbook-pro-3.png', 30),
(57, '1636473760-img1-watch7-1.png', 31),
(58, '1636473760-img2-watch7-2.png', 31),
(59, '1636473760-img3-watch7-3.png', 31),
(60, '1636473728-img1-AirPods-Pro-1.png', 32),
(61, '1636473728-img2-AirPods-Pro-2.png', 32),
(62, '1636473728-img3-AirPods-Pro-3.png', 32);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` int(11) NOT NULL,
  `HoTenKH` varchar(100) DEFAULT NULL,
  `TenCongTy` varchar(100) DEFAULT NULL,
  `SoDienThoai` varchar(10) DEFAULT NULL,
  `SoFax` varchar(20) DEFAULT NULL,
  `MatKhau` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `HoTenKH`, `TenCongTy`, `SoDienThoai`, `SoFax`, `MatKhau`) VALUES
(7, 'vinh', '', '0939094485', '', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `loaihanghoa`
--

CREATE TABLE `loaihanghoa` (
  `MaLoaiHang` int(11) NOT NULL,
  `TenLoaiHang` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaihanghoa`
--

INSERT INTO `loaihanghoa` (`MaLoaiHang`, `TenLoaiHang`) VALUES
(99, 'Iphone'),
(100, 'Ipad'),
(101, 'Macbook'),
(102, 'Apple Watch'),
(103, 'Accessory');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` int(11) NOT NULL,
  `HoTenNV` varchar(100) DEFAULT NULL,
  `ChucVu` varchar(100) DEFAULT NULL,
  `DiaChi` varchar(100) DEFAULT NULL,
  `SoDienThoai` varchar(10) DEFAULT NULL,
  `MatKhau` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`, `MatKhau`) VALUES
(1, 'Adminstrator', 'Admin', 'Cần Thơ', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(10, 'Nhân Viên 1', 'Kiểm duyệt', 'Ai biết đâu à', '0941649825', 'e10adc3949ba59abbe56e057f20f883e'),
(11, 'Nhân Viên 2', 'Kiểm duyệt', 'Cần Thơ', '0941649827', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD KEY `FK_chitietdathang_dathang` (`SoDonDH`),
  ADD KEY `FK_chitietdathang_hanghoa` (`MSHH`);

--
-- Indexes for table `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonDH`),
  ADD KEY `FK_dathang_khachhang` (`MSKH`),
  ADD KEY `FK_dathang_nhanvien` (`MSNV`);

--
-- Indexes for table `diachikh`
--
ALTER TABLE `diachikh`
  ADD PRIMARY KEY (`MaDC`),
  ADD KEY `FK_diachikh_khachhang` (`MSKH`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`MaGH`),
  ADD KEY `FK_giohang_hanghoa` (`MSHH`),
  ADD KEY `FK_giohang_khachhang` (`MSKH`);

--
-- Indexes for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`),
  ADD KEY `FK_hanghoa_loaihanghoa` (`MaLoaiHang`);

--
-- Indexes for table `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD PRIMARY KEY (`MaHinh`),
  ADD KEY `FK_hinhhanghoa_hanghoa` (`MSHH`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`);

--
-- Indexes for table `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  ADD PRIMARY KEY (`MaLoaiHang`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dathang`
--
ALTER TABLE `dathang`
  MODIFY `SoDonDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `diachikh`
--
ALTER TABLE `diachikh`
  MODIFY `MaDC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `MaGH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `MSHH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  MODIFY `MaHinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MSKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  MODIFY `MaLoaiHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MSNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD CONSTRAINT `FK_chitietdathang_dathang` FOREIGN KEY (`SoDonDH`) REFERENCES `dathang` (`SoDonDH`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_chitietdathang_hanghoa` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `FK_dathang_khachhang` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_dathang_nhanvien` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `diachikh`
--
ALTER TABLE `diachikh`
  ADD CONSTRAINT `FK_diachikh_khachhang` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `FK_giohang_hanghoa` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_giohang_khachhang` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `FK_hanghoa_loaihanghoa` FOREIGN KEY (`MaLoaiHang`) REFERENCES `loaihanghoa` (`MaLoaiHang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD CONSTRAINT `FK_hinhhanghoa_hanghoa` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
