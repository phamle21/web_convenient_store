-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for conveient_store
CREATE DATABASE IF NOT EXISTS `conveient_store` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `conveient_store`;

-- Dumping structure for procedure conveient_store.admin_add_image
DELIMITER //
CREATE PROCEDURE `admin_add_image`(
	IN `ten_hinh` VARCHAR(5000),
	IN `mshh` INT
)
BEGIN
INSERT INTO hinhhanghoa(TenHinh, MSHH) VALUES (ten_hinh, mshh);
END//
DELIMITER ;

-- Dumping structure for procedure conveient_store.admin_add_product
DELIMITER //
CREATE PROCEDURE `admin_add_product`(
	IN `tenHH` VARCHAR(100),
	IN `moTa` VARCHAR(10000),
	IN `price` VARCHAR(200),
	IN `soluong` INT(10),
	IN `hinhMota` VARCHAR(200),
	IN `maLoaiHang` INT(11)
)
BEGIN
DECLARE LID int;
SET LID = last_insert_id();
INSERT INTO hanghoa(tenHH, MoTa, Gia, SoLuongHang, HinhMoTa, MaLoaiHang)
            VALUES (tenHH, moTa, price, soluong, hinhMota, maLoaiHang);
SELECT LAST_INSERT_ID();
END//
DELIMITER ;

-- Dumping structure for procedure conveient_store.admin_delete_product
DELIMITER //
CREATE PROCEDURE `admin_delete_product`(
	IN `mahanghoa` INT
)
BEGIN
DELETE FROM hanghoa WHERE MSHH=mahanghoa;
END//
DELIMITER ;

-- Dumping structure for table conveient_store.chitietdathang
CREATE TABLE IF NOT EXISTS `chitietdathang` (
  `SoDonDH` int DEFAULT NULL,
  `MSHH` int DEFAULT NULL,
  `SoLuong` int DEFAULT NULL,
  `GiaDatHang` varchar(50) DEFAULT NULL,
  `GiamGia` varchar(50) DEFAULT NULL,
  KEY `FK_chitietdathang_dathang` (`SoDonDH`),
  KEY `FK_chitietdathang_hanghoa` (`MSHH`),
  CONSTRAINT `FK_chitietdathang_dathang` FOREIGN KEY (`SoDonDH`) REFERENCES `dathang` (`SoDonDH`),
  CONSTRAINT `FK_chitietdathang_hanghoa` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table conveient_store.chitietdathang: ~0 rows (approximately)

-- Dumping structure for table conveient_store.dathang
CREATE TABLE IF NOT EXISTS `dathang` (
  `SoDonDH` int NOT NULL AUTO_INCREMENT,
  `MSKH` int DEFAULT NULL,
  `MSNV` int DEFAULT NULL,
  `NgayDH` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `NgayGH` timestamp NULL DEFAULT NULL,
  `DiaChiGH` varchar(500) DEFAULT NULL,
  `TrangThaiDH` varchar(50) DEFAULT 'Chưa duyệt',
  PRIMARY KEY (`SoDonDH`),
  KEY `FK_dathang_khachhang` (`MSKH`),
  KEY `FK_dathang_nhanvien` (`MSNV`),
  CONSTRAINT `FK_dathang_khachhang` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`),
  CONSTRAINT `FK_dathang_nhanvien` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table conveient_store.dathang: ~0 rows (approximately)

-- Dumping structure for table conveient_store.diachikh
CREATE TABLE IF NOT EXISTS `diachikh` (
  `MaDC` int NOT NULL AUTO_INCREMENT,
  `DiaChi` varchar(500) DEFAULT NULL,
  `MSKH` int DEFAULT '0',
  PRIMARY KEY (`MaDC`),
  KEY `FK_diachikh_khachhang` (`MSKH`),
  CONSTRAINT `FK_diachikh_khachhang` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table conveient_store.diachikh: ~2 rows (approximately)
INSERT INTO `diachikh` (`MaDC`, `DiaChi`, `MSKH`) VALUES
	(14, 'Cần Thơ', 7),
	(15, 'Kiên Giang', 7);

-- Dumping structure for table conveient_store.giohang
CREATE TABLE IF NOT EXISTS `giohang` (
  `MaGH` int NOT NULL AUTO_INCREMENT,
  `MSHH` int DEFAULT NULL,
  `MSKH` int DEFAULT NULL,
  `SoLuongMua` int DEFAULT NULL,
  PRIMARY KEY (`MaGH`),
  KEY `FK_giohang_hanghoa` (`MSHH`),
  KEY `FK_giohang_khachhang` (`MSKH`),
  CONSTRAINT `FK_giohang_hanghoa` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`),
  CONSTRAINT `FK_giohang_khachhang` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table conveient_store.giohang: ~0 rows (approximately)

-- Dumping structure for table conveient_store.hanghoa
CREATE TABLE IF NOT EXISTS `hanghoa` (
  `MSHH` int NOT NULL AUTO_INCREMENT,
  `TenHH` varchar(100) DEFAULT NULL,
  `MoTa` varchar(10000) DEFAULT NULL,
  `HinhMoTa` varchar(200) DEFAULT NULL,
  `Gia` varchar(200) DEFAULT NULL,
  `SoLuongHang` int DEFAULT NULL,
  `MaLoaiHang` int DEFAULT NULL,
  PRIMARY KEY (`MSHH`),
  KEY `FK_hanghoa_loaihanghoa` (`MaLoaiHang`),
  CONSTRAINT `FK_hanghoa_loaihanghoa` FOREIGN KEY (`MaLoaiHang`) REFERENCES `loaihanghoa` (`MaLoaiHang`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table conveient_store.hanghoa: ~0 rows (approximately)

-- Dumping structure for table conveient_store.hinhhanghoa
CREATE TABLE IF NOT EXISTS `hinhhanghoa` (
  `MaHinh` int NOT NULL AUTO_INCREMENT,
  `TenHinh` varchar(200) DEFAULT NULL,
  `MSHH` int DEFAULT NULL,
  PRIMARY KEY (`MaHinh`),
  KEY `FK_hinhhanghoa_hanghoa` (`MSHH`),
  CONSTRAINT `FK_hinhhanghoa_hanghoa` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table conveient_store.hinhhanghoa: ~0 rows (approximately)

-- Dumping structure for table conveient_store.khachhang
CREATE TABLE IF NOT EXISTS `khachhang` (
  `MSKH` int NOT NULL AUTO_INCREMENT,
  `HoTenKH` varchar(100) DEFAULT NULL,
  `TenCongTy` varchar(100) DEFAULT NULL,
  `SoDienThoai` varchar(10) DEFAULT NULL,
  `SoFax` varchar(20) DEFAULT NULL,
  `MatKhau` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`MSKH`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table conveient_store.khachhang: ~1 rows (approximately)
INSERT INTO `khachhang` (`MSKH`, `HoTenKH`, `TenCongTy`, `SoDienThoai`, `SoFax`, `MatKhau`) VALUES
	(7, 'vinh', '', '0939094485', '', 'e10adc3949ba59abbe56e057f20f883e');

-- Dumping structure for table conveient_store.loaihanghoa
CREATE TABLE IF NOT EXISTS `loaihanghoa` (
  `MaLoaiHang` int NOT NULL AUTO_INCREMENT,
  `TenLoaiHang` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`MaLoaiHang`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table conveient_store.loaihanghoa: ~0 rows (approximately)

-- Dumping structure for table conveient_store.nhanvien
CREATE TABLE IF NOT EXISTS `nhanvien` (
  `MSNV` int NOT NULL AUTO_INCREMENT,
  `HoTenNV` varchar(100) DEFAULT NULL,
  `ChucVu` varchar(100) DEFAULT NULL,
  `DiaChi` varchar(100) DEFAULT NULL,
  `SoDienThoai` varchar(10) DEFAULT NULL,
  `MatKhau` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`MSNV`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table conveient_store.nhanvien: ~3 rows (approximately)
INSERT INTO `nhanvien` (`MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`, `MatKhau`) VALUES
	(1, 'Adminstrator', 'Admin', 'Cần Thơ', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
	(10, 'Nhân Viên 1', 'Kiểm duyệt', 'Ai biết đâu à', '0941649825', 'e10adc3949ba59abbe56e057f20f883e'),
	(11, 'Nhân Viên 2', 'Kiểm duyệt', 'Cần Thơ', '0941649827', 'e10adc3949ba59abbe56e057f20f883e');

-- Dumping structure for trigger conveient_store.hanghoa_before_delete
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `hanghoa_before_delete` BEFORE DELETE ON `hanghoa` FOR EACH ROW BEGIN
DELETE FROM chitietdathang WHERE MSHH=OLD.MSHH;
DELETE FROM giohang WHERE MSHH=OLD.MSHH;
DELETE FROM hinhhanghoa WHERE MSHH=OLD.MSHH;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger conveient_store.loaihanghoa_before_delete
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `loaihanghoa_before_delete` BEFORE DELETE ON `loaihanghoa` FOR EACH ROW BEGIN
DELETE FROM hanghoa WHERE MaLoaiHang=OLD.MaLoaiHang;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
