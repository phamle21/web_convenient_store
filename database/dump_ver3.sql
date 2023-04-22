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


-- Dumping structure for table conveient_store.loaihanghoa
CREATE TABLE IF NOT EXISTS `loaihanghoa` (
  `MaLoaiHang` int NOT NULL AUTO_INCREMENT,
  `TenLoaiHang` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`MaLoaiHang`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table conveient_store.loaihanghoa: ~5 rows (approximately)
INSERT INTO loaihanghoa(MaLoaiHang,TenLoaiHang) VALUES (1,'Bia/nước ngọt');
INSERT INTO loaihanghoa(MaLoaiHang,TenLoaiHang) VALUES (2,'Sữa các loại');
INSERT INTO loaihanghoa(MaLoaiHang,TenLoaiHang) VALUES (3,'Bánh kẹo');

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
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table conveient_store.hanghoa: ~0 rows (approximately)
INSERT INTO hanghoa(MSHH,TenHH,Mota,HinhMoTa,Gia,SoLuongHang,MaLoaiHang) VALUES (1,'6 lon nước ngọt Pepsi Cola 320ml','abcd','pepsi.png',54000,12,1);
INSERT INTO hanghoa(MSHH,TenHH,Mota,HinhMoTa,Gia,SoLuongHang,MaLoaiHang) VALUES (2,'6 chai Sting hương dâu 330ml','abcd','sting.png',49000,34,1);
INSERT INTO hanghoa(MSHH,TenHH,Mota,HinhMoTa,Gia,SoLuongHang,MaLoaiHang) VALUES (3,'Thùng 12 lon bia Tiger 500ml','abcd','tiger.png',210000,45,1);
INSERT INTO hanghoa(MSHH,TenHH,Mota,HinhMoTa,Gia,SoLuongHang,MaLoaiHang) VALUES (4,'Nước ép trái cây có ga Muscat Ade vị nho 350ml','abcd','muscat_nho.png',13200,23,1);
INSERT INTO hanghoa(MSHH,TenHH,Mota,HinhMoTa,Gia,SoLuongHang,MaLoaiHang) VALUES (5,'Nước ép trái cây có ga Hallabong Ade vị quýt 350ml','abcd','hallabong-cam.png',13200,56,1);
INSERT INTO hanghoa(MSHH,TenHH,Mota,HinhMoTa,Gia,SoLuongHang,MaLoaiHang) VALUES (6,'Thùng 12 lon bia Sài Gòn Export 330ml','abcd','saigon.png',135000,35,1);
INSERT INTO hanghoa(MSHH,TenHH,Mota,HinhMoTa,Gia,SoLuongHang,MaLoaiHang) VALUES (7,'Hộp 6 hũ tổ yến chưng đông trùng hạ thảo Win''snest 70ml','abcd','winsnest.png',251400,65,1);
INSERT INTO hanghoa(MSHH,TenHH,Mota,HinhMoTa,Gia,SoLuongHang,MaLoaiHang) VALUES (8,'Nước ngọt Mirinda vị soda kem chai 1.5 lít','abcd','mirindasodakem.png',120000,34,1);
INSERT INTO hanghoa(MSHH,TenHH,Mota,HinhMoTa,Gia,SoLuongHang,MaLoaiHang) VALUES (9,'Rượu Bekseju Herrbal Rice 13% chai 375ml','abcd','beksoju.png',73500,53,1);
INSERT INTO hanghoa(MSHH,TenHH,Mota,HinhMoTa,Gia,SoLuongHang,MaLoaiHang) VALUES (10,'Nước gạo lên men KOOK SOON DANG Makgeolli vị đào 3% chai 750ml','abcd','kooksoondang.png',45500,34,1);
INSERT INTO hanghoa(MSHH,TenHH,Mota,HinhMoTa,Gia,SoLuongHang,MaLoaiHang) VALUES (11,'Sữa tươi tiệt trùng ít đường Dutch Lady Canxi & Protein bịch 180ml','abcd','dutchlady.png',4900,102,2);
INSERT INTO hanghoa(MSHH,TenHH,Mota,HinhMoTa,Gia,SoLuongHang,MaLoaiHang) VALUES (12,'Ngũ cốc dinh dưỡng Yumfood gói 500g','abcd','yumfood.png',45000,34,2);
INSERT INTO hanghoa(MSHH,TenHH,Mota,HinhMoTa,Gia,SoLuongHang,MaLoaiHang) VALUES (13,'Sữa đậu nành nguyên chất Nuti bịch 200ml','abcd','faminuti.png',2900,98,2);
INSERT INTO hanghoa(MSHH,TenHH,Mota,HinhMoTa,Gia,SoLuongHang,MaLoaiHang) VALUES (14,'Sữa đậu đen óc chó hạnh nhân Sahmyook 190ml','abcd','sahmyook.png',14000,56,2);
INSERT INTO hanghoa(MSHH,TenHH,Mota,HinhMoTa,Gia,SoLuongHang,MaLoaiHang) VALUES (15,'Thùng 24 túi thức uống dinh dưỡng socola lúa mạch Vinamilk SuSu 110ml','abcd','susu.png',102300,54,2);
INSERT INTO hanghoa(MSHH,TenHH,Mota,HinhMoTa,Gia,SoLuongHang,MaLoaiHang) VALUES (16,'Lốc 4 hộp sữa chua uống dâu TH True Yogurt Top Kid 110ml','abcd','thtrueyogurt.png',18000,23,2);
INSERT INTO hanghoa(MSHH,TenHH,Mota,HinhMoTa,Gia,SoLuongHang,MaLoaiHang) VALUES (17,'Sữa đặc có đường Ông Thọ Xanh lá lon 380g','abcd','ongtho.png',19100,56,2);
INSERT INTO hanghoa(MSHH,TenHH,Mota,HinhMoTa,Gia,SoLuongHang,MaLoaiHang) VALUES (18,'Lốc 4 hộp sữa đậu nành hạt óc chó Vinamilk Super Nut 180ml','abcd','supernut.png',25650,24,2);
INSERT INTO hanghoa(MSHH,TenHH,Mota,HinhMoTa,Gia,SoLuongHang,MaLoaiHang) VALUES (19,'Sữa đặc có đường Ông Thọ Đỏ tuýp 165g','abcd','ongthodo.png',17500,36,2);
INSERT INTO hanghoa(MSHH,TenHH,Mota,HinhMoTa,Gia,SoLuongHang,MaLoaiHang) VALUES (20,'Thùng 12 hộp sữa tươi tiệt trùng ít béo Anchor 1 lít sản xuất New Zealand','abcd','anchor.png',550000,26,2);
INSERT INTO hanghoa(MSHH,TenHH,Mota,HinhMoTa,Gia,SoLuongHang,MaLoaiHang) VALUES (21,'Kẹo the vị chanh muối Play More hũ 22g','abcd','playmore.png',15200,46,3);
INSERT INTO hanghoa(MSHH,TenHH,Mota,HinhMoTa,Gia,SoLuongHang,MaLoaiHang) VALUES (22,'Socola kem sữa hạnh nhân Hershey''s Kisses gói 146g','abcd','hershye.png',74900,37,3);
INSERT INTO hanghoa(MSHH,TenHH,Mota,HinhMoTa,Gia,SoLuongHang,MaLoaiHang) VALUES (23,'Bánh xốp phủ socola KitKat gói 204g','abcd','kitkat.png',53500,27,3);
INSERT INTO hanghoa(MSHH,TenHH,Mota,HinhMoTa,Gia,SoLuongHang,MaLoaiHang) VALUES (24,'Hạt hướng dương vị dừa Chacheer gói 130g','abcd','chaccheer.png',20000,70,3);
INSERT INTO hanghoa(MSHH,TenHH,Mota,HinhMoTa,Gia,SoLuongHang,MaLoaiHang) VALUES (25,'Bánh quy caramel flan AFC hộp 125g','abcd','afc.png',19500,46,3);
INSERT INTO hanghoa(MSHH,TenHH,Mota,HinhMoTa,Gia,SoLuongHang,MaLoaiHang) VALUES (26,'Kẹo Ferrero Confetteria Raffaello hộp 150g','abcd','ferrero.png',171000,76,3);
INSERT INTO hanghoa(MSHH,TenHH,Mota,HinhMoTa,Gia,SoLuongHang,MaLoaiHang) VALUES (27,'Bánh quy bơ Danisa hộp 454g','abcd','danisa.png',132000,46,3);
INSERT INTO hanghoa(MSHH,TenHH,Mota,HinhMoTa,Gia,SoLuongHang,MaLoaiHang) VALUES (28,'Mít sấy Vinamit gói 250g','abcd','vinamit.png',92500,57,3);
INSERT INTO hanghoa(MSHH,TenHH,Mota,HinhMoTa,Gia,SoLuongHang,MaLoaiHang) VALUES (29,'Bánh trứng tươi chà bông Karo gói 156g','abcd','karo.png',39000,36,3);
INSERT INTO hanghoa(MSHH,TenHH,Mota,HinhMoTa,Gia,SoLuongHang,MaLoaiHang) VALUES (30,'Bánh quy Cosy Marie gói 240g','abcd','cosy.png',24000,45,3);


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

-- Dumping data for table conveient_store.khachhang: ~0 rows (approximately)
INSERT INTO `khachhang` (`MSKH`, `HoTenKH`, `TenCongTy`, `SoDienThoai`, `SoFax`, `MatKhau`) VALUES
	(1, 'Pham Le', '', '0123456789', '', '21232f297a57a5a743894a0e4a801fc3');
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
	(2, 'Nhân Viên 1', 'Kiểm duyệt', 'Ai biết đâu à', '0941649825', 'e10adc3949ba59abbe56e057f20f883e'),
	(3, 'Nhân Viên 2', 'Kiểm duyệt', 'Cần Thơ', '0941649827', 'e10adc3949ba59abbe56e057f20f883e');


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
	(1, 'Cần Thơ', 1),
	(2, 'Kiên Giang', 1);




-- Dumping structure for table conveient_store.hinhhanghoa
CREATE TABLE IF NOT EXISTS `hinhhanghoa` (
  `MaHinh` int NOT NULL AUTO_INCREMENT,
  `TenHinh` varchar(200) DEFAULT NULL,
  `MSHH` int DEFAULT NULL,
  PRIMARY KEY (`MaHinh`),
  KEY `FK_hinhhanghoa_hanghoa` (`MSHH`),
  CONSTRAINT `FK_hinhhanghoa_hanghoa` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table conveient_store.hinhhanghoa: ~0 rows (approximately)




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
-- Dumping structure for procedure conveient_store.get_product_details
DELIMITER //
CREATE PROCEDURE `get_product_details`(
	IN `var_mshh` INT
)
BEGIN
SELECT a.*,b.TenLoaiHang FROM hanghoa as a LEFT JOIN loaihanghoa as b ON a.MaLoaiHang=b.MaLoaiHang WHERE a.MSHH=var_mshh;
END//
DELIMITER ;
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
/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
