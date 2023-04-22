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

-- Dumping structure for procedure conveient_store.admin_add_staff
DELIMITER //
CREATE PROCEDURE `admin_add_staff`(
	IN `HoTenNV` VARCHAR(100),
	IN `ChucVu` VARCHAR(100),
	IN `DiaChi` VARCHAR(1000),
	IN `SoDienThoai` VARCHAR(15),
	IN `MatKhau` VARCHAR(1000)
)
BEGIN
INSERT INTO nhanvien ( HoTenNV, ChucVu, DiaChi, SoDienThoai, MatKhau) VALUES (HoTenNV, ChucVu, DiaChi, SoDienThoai, MatKhau);
END//
DELIMITER ;

-- Dumping structure for procedure conveient_store.admin_add_type_product
DELIMITER //
CREATE PROCEDURE `admin_add_type_product`(
	IN `tenloai` VARCHAR(50)
)
BEGIN
INSERT INTO loaihanghoa(TenLoaiHang) VALUES (tenloai);
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

-- Dumping structure for procedure conveient_store.admin_delete_product_type
DELIMITER //
CREATE PROCEDURE `admin_delete_product_type`(
	IN `maloai` INT
)
BEGIN
DELETE FROM loaihanghoa WHERE MaLoaiHang=maloai;
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

-- Dumping data for table conveient_store.chitietdathang: ~6 rows (approximately)
INSERT INTO `chitietdathang` (`SoDonDH`, `MSHH`, `SoLuong`, `GiaDatHang`, `GiamGia`) VALUES
	(135, 3, 1, '210000', NULL),
	(135, 2, 2, '49000', NULL),
	(136, 28, 4, '92500', NULL),
	(137, 3, 1, '210000', NULL),
	(138, 29, 3, '39000', NULL),
	(139, 33, 2, '999.000', NULL),
	(140, 33, 1, '999.000', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table conveient_store.dathang: ~6 rows (approximately)
INSERT INTO `dathang` (`SoDonDH`, `MSKH`, `MSNV`, `NgayDH`, `NgayGH`, `DiaChiGH`, `TrangThaiDH`) VALUES
	(135, 8, 1, '2023-04-21 05:58:08', '2023-04-20 17:00:00', 'Can Tho', 'Đã hoàn thành'),
	(136, 8, 1, '2023-04-21 06:55:32', '2023-04-20 17:00:00', 'Can Tho', 'Đã hoàn thành'),
	(137, 8, 1, '2023-04-21 08:15:02', '2023-04-20 17:00:00', 'Can Tho', 'Đang giao hàng'),
	(138, 9, NULL, '2023-04-21 08:20:11', NULL, 'phong 311 ctu', 'Chưa duyệt'),
	(139, 9, 1, '2023-04-21 08:21:16', '2023-04-20 17:00:00', 'can tho CTU', 'Đã hoàn thành'),
	(140, 9, NULL, '2023-04-21 08:38:26', NULL, 'can tho CTU', 'Thất bại');

-- Dumping structure for table conveient_store.diachikh
CREATE TABLE IF NOT EXISTS `diachikh` (
  `MaDC` int NOT NULL AUTO_INCREMENT,
  `DiaChi` varchar(500) DEFAULT NULL,
  `MSKH` int DEFAULT '0',
  PRIMARY KEY (`MaDC`),
  KEY `FK_diachikh_khachhang` (`MSKH`),
  CONSTRAINT `FK_diachikh_khachhang` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table conveient_store.diachikh: ~5 rows (approximately)
INSERT INTO `diachikh` (`MaDC`, `DiaChi`, `MSKH`) VALUES
	(1, 'Cần Thơ', 1),
	(2, 'Kiên Giang', 1),
	(16, 'Can Tho', 8),
	(17, 'can tho CTU', 9),
	(18, 'phong 311 ctu', 9);

-- Dumping structure for procedure conveient_store.get_product_details
DELIMITER //
CREATE PROCEDURE `get_product_details`(
	IN `var_mshh` INT
)
BEGIN
SELECT a.*,b.TenLoaiHang FROM hanghoa as a LEFT JOIN loaihanghoa as b ON a.MaLoaiHang=b.MaLoaiHang WHERE a.MSHH=var_mshh;
END//
DELIMITER ;

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
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb3;

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table conveient_store.hanghoa: ~30 rows (approximately)
INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `MoTa`, `HinhMoTa`, `Gia`, `SoLuongHang`, `MaLoaiHang`) VALUES
	(2, '6 chai Sting hương dâu 330ml', 'abcd', 'sting.png', '214214214', 34, 1),
	(3, 'Thùng 12 lon bia Tiger 500ml', 'abcd', '1682064074-img1-download (23).jpg', '214214214', 45, 1),
	(4, 'Nước ép trái cây có ga Muscat Ade vị nho 350ml', 'abcd', 'muscat_nho.png', '13200', 23, 1),
	(5, 'Nước ép trái cây có ga Hallabong Ade vị quýt 350ml', 'abcd', 'hallabong-cam.png', '13200', 56, 1),
	(6, 'Thùng 12 lon bia Sài Gòn Export 330ml', 'abcd', 'saigon.png', '135000', 35, 1),
	(7, 'Hộp 6 hũ tổ yến chưng đông trùng hạ thảo Win\'snest 70ml', 'abcd', 'winsnest.png', '251400', 65, 1),
	(8, 'Nước ngọt Mirinda vị soda kem chai 1.5 lít', 'abcd', 'mirindasodakem.png', '120000', 34, 1),
	(9, 'Rượu Bekseju Herrbal Rice 13% chai 375ml', 'abcd', 'beksoju.png', '73500', 53, 1),
	(10, 'Nước gạo lên men KOOK SOON DANG Makgeolli vị đào 3% chai 750ml', 'abcd', 'kooksoondang.png', '45500', 34, 1),
	(11, 'Sữa tươi tiệt trùng ít đường Dutch Lady Canxi & Protein bịch 180ml', 'abcd', 'dutchlady.png', '4900', 102, 2),
	(12, 'Ngũ cốc dinh dưỡng Yumfood gói 500g', 'abcd', 'yumfood.png', '45000', 34, 2),
	(13, 'Sữa đậu nành nguyên chất Nuti bịch 200ml', 'abcd', 'faminuti.png', '2900', 98, 2),
	(14, 'Sữa đậu đen óc chó hạnh nhân Sahmyook 190ml', 'abcd', 'sahmyook.png', '14000', 56, 2),
	(15, 'Thùng 24 túi thức uống dinh dưỡng socola lúa mạch Vinamilk SuSu 110ml', 'abcd', 'susu.png', '102300', 54, 2),
	(16, 'Lốc 4 hộp sữa chua uống dâu TH True Yogurt Top Kid 110ml', 'abcd', 'thtrueyogurt.png', '18000', 23, 2),
	(17, 'Sữa đặc có đường Ông Thọ Xanh lá lon 380g', 'abcd', 'ongtho.png', '19100', 56, 2),
	(18, 'Lốc 4 hộp sữa đậu nành hạt óc chó Vinamilk Super Nut 180ml', 'abcd', 'supernut.png', '25650', 24, 2),
	(19, 'Sữa đặc có đường Ông Thọ Đỏ tuýp 165g', 'abcd', 'ongthodo.png', '17500', 36, 2),
	(20, 'Thùng 12 hộp sữa tươi tiệt trùng ít béo Anchor 1 lít sản xuất New Zealand', 'abcd', 'anchor.png', '550000', 26, 2),
	(21, 'Kẹo the vị chanh muối Play More hũ 22g', 'abcd', 'playmore.png', '15200', 46, 3),
	(22, 'Socola kem sữa hạnh nhân Hershey\'s Kisses gói 146g', 'abcd', 'hershye.png', '74900', 37, 3),
	(23, 'Bánh xốp phủ socola KitKat gói 204g', 'abcd', '1682059134-img1-download (17).jpg', '53500', 27, 3),
	(24, 'Hạt hướng dương vị dừa Chacheer gói 130g', 'abcd', '1682059076-img1-download (16).jpg', '20000', 70, 3),
	(25, 'Bánh quy caramel flan AFC hộp 125g', 'abcd', '1682058968-img1-download (11).jpg', '19500', 46, 3),
	(26, 'Kẹo Ferrero Confetteria Raffaello hộp 150g', 'abcd', '1682058901-img1-download (8).jpg', '171000', 76, 3),
	(27, 'Bánh quy bơ Danisa hộp 454g', 'abcd', '1682058796-img1-download (5).jpg', '132000', 46, 3),
	(28, 'Mít sấy Vinamit gói 250g', 'abcd', '1682058724-img1-download (3).jpg', '92500', 57, 3),
	(29, 'Bánh trứng tươi chà bông Karo gói 156g', 'abcd', '1682058487-img1-download (1).jpg', '39000', 36, 3),
	(33, 'hiniken', 'bia', '1682064848-img1-OIP (1).jpg', '999.000', 98, 1);

-- Dumping structure for table conveient_store.hinhhanghoa
CREATE TABLE IF NOT EXISTS `hinhhanghoa` (
  `MaHinh` int NOT NULL AUTO_INCREMENT,
  `TenHinh` varchar(200) DEFAULT NULL,
  `MSHH` int DEFAULT NULL,
  PRIMARY KEY (`MaHinh`),
  KEY `FK_hinhhanghoa_hanghoa` (`MSHH`),
  CONSTRAINT `FK_hinhhanghoa_hanghoa` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table conveient_store.hinhhanghoa: ~17 rows (approximately)
INSERT INTO `hinhhanghoa` (`MaHinh`, `TenHinh`, `MSHH`) VALUES
	(63, '1682058487-img2-download (2).jpg', 29),
	(64, '1682058487-img3-download.jpg', 29),
	(65, '1682058566-img3-download.jpg', 29),
	(66, '1682058724-img2-download (4).jpg', 28),
	(67, '1682058724-img3-images.jpg', 28),
	(68, '1682058796-img2-download (6).jpg', 27),
	(69, '1682058796-img3-download (7).jpg', 27),
	(70, '1682058901-img2-download (9).jpg', 26),
	(71, '1682058901-img3-download (10).jpg', 26),
	(72, '1682058968-img2-download (12).jpg', 25),
	(73, '1682058968-img3-download (13).jpg', 25),
	(74, '1682059076-img2-download (14).jpg', 24),
	(75, '1682059076-img3-download (15).jpg', 24),
	(76, '1682059134-img2-download (18).jpg', 23),
	(77, '1682059134-img3-download (19).jpg', 23),
	(78, '1682064074-img2-OIP.jpg', 3),
	(79, '1682064074-img3-OIP (1).jpg', 3),
	(80, '1682064848-img1-OIP (1).jpg', 33);

-- Dumping structure for table conveient_store.khachhang
CREATE TABLE IF NOT EXISTS `khachhang` (
  `MSKH` int NOT NULL AUTO_INCREMENT,
  `HoTenKH` varchar(100) DEFAULT NULL,
  `TenCongTy` varchar(100) DEFAULT NULL,
  `SoDienThoai` varchar(10) DEFAULT NULL,
  `SoFax` varchar(20) DEFAULT NULL,
  `MatKhau` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`MSKH`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table conveient_store.khachhang: ~0 rows (approximately)
INSERT INTO `khachhang` (`MSKH`, `HoTenKH`, `TenCongTy`, `SoDienThoai`, `SoFax`, `MatKhau`) VALUES
	(1, 'Pham Le', '', '0123456789', '', '21232f297a57a5a743894a0e4a801fc3'),
	(7, 'vinh', '', '0939094485', '', 'e10adc3949ba59abbe56e057f20f883e'),
	(8, 'P Le', '', '0941649826', '', '2f5c917b65ee551334f6a01cf9e4b6a0'),
	(9, 'HỮu khang', 'silicon', '0941649822', '', '2f5c917b65ee551334f6a01cf9e4b6a0');

-- Dumping structure for table conveient_store.loaihanghoa
CREATE TABLE IF NOT EXISTS `loaihanghoa` (
  `MaLoaiHang` int NOT NULL AUTO_INCREMENT,
  `TenLoaiHang` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`MaLoaiHang`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table conveient_store.loaihanghoa: ~8 rows (approximately)
INSERT INTO `loaihanghoa` (`MaLoaiHang`, `TenLoaiHang`) VALUES
	(1, 'Bia/nước ngọt'),
	(2, 'Sữa các loại'),
	(3, 'Bánh kẹo'),
	(99, 'Iphone'),
	(100, 'Ipad'),
	(101, 'Macbook'),
	(102, 'Apple Watch'),
	(103, 'Accessory');

-- Dumping structure for function conveient_store.minus_sl
DELIMITER //
CREATE FUNCTION `minus_sl`(
	`num` INT,
	`minus_num` INT
) RETURNS int
    DETERMINISTIC
BEGIN
RETURN num-minus_num;
END//
DELIMITER ;

-- Dumping structure for table conveient_store.nhanvien
CREATE TABLE IF NOT EXISTS `nhanvien` (
  `MSNV` int NOT NULL AUTO_INCREMENT,
  `HoTenNV` varchar(100) DEFAULT NULL,
  `ChucVu` varchar(100) DEFAULT NULL,
  `DiaChi` varchar(100) DEFAULT NULL,
  `SoDienThoai` varchar(10) DEFAULT NULL,
  `MatKhau` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`MSNV`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table conveient_store.nhanvien: ~3 rows (approximately)
INSERT INTO `nhanvien` (`MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`, `MatKhau`) VALUES
	(1, 'Adminstrator', 'Admin', 'Cần Thơ', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
	(2, 'Nhân Viên 1', 'Kiểm duyệt', 'Ai biết đâu à', '0941649825', 'e10adc3949ba59abbe56e057f20f883e'),
	(3, 'Nhân Viên 2', 'Kiểm duyệt', 'Cần Thơ', '0941649827', 'e10adc3949ba59abbe56e057f20f883e'),
	(13, 'Hoàng Đông', 'Sub Admin', 'Cần Thơ', '0377296369', 'e10adc3949ba59abbe56e057f20f883e');

-- Dumping structure for function conveient_store.plus_sl
DELIMITER //
CREATE FUNCTION `plus_sl`(
	`num` INT,
	`plus_num` INT
) RETURNS int
    DETERMINISTIC
BEGIN
RETURN num+plus_num;
END//
DELIMITER ;

-- Dumping structure for trigger conveient_store.chitietdathang_after_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `chitietdathang_after_insert` AFTER INSERT ON `chitietdathang` FOR EACH ROW BEGIN
UPDATE hanghoa SET hanghoa.SoLuongHang=minus_sl(hanghoa.SoLuongHang, 1) WHERE hanghoa.MSHH=NEW.MSHH;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger conveient_store.dathang_after_update
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `dathang_after_update` AFTER UPDATE ON `dathang` FOR EACH ROW BEGIN
	IF NEW.TrangThaiDH = 'Thất bại' THEN
		UPDATE hanghoa a 
		LEFT OUTER JOIN chitietdathang b ON a.MSHH = b.MSHH 
		SET a.SoLuongHang = plus_sl(a.SoLuongHang, 1) 
		WHERE b.SoDonDH=NEW.SoDonDH;
	END IF;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

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
