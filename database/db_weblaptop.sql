-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2024 at 03:01 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_weblaptop`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietnhap`
--

CREATE TABLE `chitietnhap` (
  `STT` int(11) NOT NULL,
  `MAPHIEU` varchar(10) NOT NULL,
  `MASP` int(11) NOT NULL,
  `SOLUONG` int(10) DEFAULT NULL,
  `DONGIA` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitietnhap`
--

INSERT INTO `chitietnhap` (`STT`, `MAPHIEU`, `MASP`, `SOLUONG`, `DONGIA`) VALUES
(1, '1', 27, 3, 12000),
(1, '5', 27, 44, 12000),
(2, '1', 27, 15, 12000);

-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

CREATE TABLE `chucvu` (
  `MACV` varchar(10) NOT NULL,
  `TENCV` varchar(20) DEFAULT NULL,
  `LUONG` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chucvu`
--

INSERT INTO `chucvu` (`MACV`, `TENCV`, `LUONG`) VALUES
('KHONG', 'Không', 0),
('QLBH', 'Quản Lý Bán Hàng', 1000000),
('QLKD', 'Quản Lý Kinh Doanh', 2000000),
('QLNS', 'Quản Lý Nhân Sự', 1500000),
('QLTK', 'Quản Lý Tồn Kho', 2000000),
('QTHT', 'Quản Trị Hệ Thống', 2000000),
('TEST', 'TEST', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `MADH` varchar(11) NOT NULL,
  `TAIKHOAN` varchar(30) NOT NULL,
  `TRANGTHAI` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `NGAYDAT` date NOT NULL,
  `HTTHANHTOAN` varchar(20) NOT NULL,
  `DIACHINHAN` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TONGTIEN` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`MADH`, `TAIKHOAN`, `TRANGTHAI`, `NGAYDAT`, `HTTHANHTOAN`, `DIACHINHAN`, `TONGTIEN`) VALUES
('6625c6b4463', 'ngoclinh123', 'Đã giao hàng', '2024-04-22', 'Offline', 'TP.HCM', 4499),
('6628fb2639d', 'ngoclinh123', 'Chưa xác nhận', '2024-04-24', 'Offline', 'TP.HCM', 3299),
('6628fd6dcf7', 'ngoclinh123', 'Chưa xác nhận', '2024-04-24', 'Offline', 'TP.HCM', 1599),
('6628fde574e', 'ngoclinh123', 'Chưa xác nhận', '2024-04-24', 'Offline', 'TP.HCM', 1599),
('6628fe93112', 'ngoclinh123', 'Chưa xác nhận', '2024-04-24', 'Offline', 'TP.HCM', 1999),
('6628fe93178', 'ngoclinh123', 'Chưa xác nhận', '2024-04-24', 'Offline', 'TP.HCM', 1999),
('6628ff2551b', 'ngoclinh123', 'Đã xác nhận', '2024-04-24', 'Offline', 'TP.HCM', 10);

-- --------------------------------------------------------

--
-- Table structure for table `donnghi`
--

CREATE TABLE `donnghi` (
  `MADON` varchar(10) NOT NULL,
  `MANV` varchar(10) DEFAULT NULL,
  `NGAYBD` date DEFAULT NULL,
  `NGAYKT` date DEFAULT NULL,
  `LYDO` varchar(100) DEFAULT NULL,
  `TRANGTHAI` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donnghi`
--

INSERT INTO `donnghi` (`MADON`, `MANV`, `NGAYBD`, `NGAYKT`, `LYDO`, `TRANGTHAI`) VALUES
('1', 'NV001', '2024-04-22', '2024-04-29', 'Cá nhân', 'Chấp thuận'),
('2', 'NV001', '2024-04-29', '2024-04-30', 'Cá nhân', 'Chưa xử lý'),
('3', 'NV002', '2024-04-23', '2024-04-25', 'Cá nhân', 'Từ chối'),
('4', 'QL001', '2024-04-22', '2024-04-23', 'Cá nhân', 'Chưa xử lý'),
('5', 'QL001', '2024-04-10', '2024-04-03', 'Cá nhân', 'Chấp thuận'),
('6', 'NV001', '2024-04-16', '2024-04-26', 'Cá nhân', 'Chưa xử lý');

-- --------------------------------------------------------

--
-- Table structure for table `giamgia`
--

CREATE TABLE `giamgia` (
  `MAGIAMGIA` varchar(11) NOT NULL,
  `TENGIAMGIA` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `PHANTRAM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `giamgia`
--

INSERT INTO `giamgia` (`MAGIAMGIA`, `TENGIAMGIA`, `PHANTRAM`) VALUES
('GG01', 'Lễ giỗ tổ', 20),
('GG02', 'Lễ 30/4', 10),
('GG03', 'Lễ 8/3', 10);

-- --------------------------------------------------------

--
-- Table structure for table `hinhanh`
--

CREATE TABLE `hinhanh` (
  `MAHINH` int(11) NOT NULL,
  `MASP` int(11) NOT NULL,
  `LINK` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hinhanh`
--

INSERT INTO `hinhanh` (`MAHINH`, `MASP`, `LINK`) VALUES
(2, 2, '10_apple-macbook-pro.JPG'),
(3, 3, '2_lenovo-ideapad.jpg'),
(4, 4, '3_hp-15s.jpg'),
(5, 5, '4_acer-aspire-5.jpg'),
(6, 6, '5_dell-g3.JPG'),
(8, 8, '7_lg-gram-15-i5.JPG'),
(9, 9, '8_huawei-matebook.JPG'),
(10, 10, '9_msi-gl65.JPG'),
(23, 17, '7SftCsdBg43DdGIAZDgC.jpg'),
(24, 17, 'mK5jSRdZvlH9qFGhSrms_simg_de2fe0_500x500_maxb.jpg'),
(25, 1, 'Capture.PNG'),
(26, 1, 'tải xuống.jpg'),
(27, 7, '6_acer-aspire-7.jpg'),
(36, 19, 'lg.jpg'),
(37, 19, 'LG2.PNG'),
(48, 22, 'msi.PNG'),
(49, 22, 'msi2.PNG'),
(50, 23, '56516_vosro3405__2_.png'),
(51, 23, '56516_vosro3405__3_.png'),
(52, 16, 'Captuưre.PNG'),
(54, 21, 'ok.PNG'),
(55, 24, 'Capture1.PNG'),
(56, 25, 'hp.PNG'),
(57, 25, 'hp2.PNG'),
(58, 26, 'huawei.PNG'),
(59, 26, 'huawei2.PNG'),
(60, 27, 'carreff.png');

-- --------------------------------------------------------

--
-- Table structure for table `loaisp`
--

CREATE TABLE `loaisp` (
  `MALOAISP` varchar(11) NOT NULL,
  `TENLOAISP` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loaisp`
--

INSERT INTO `loaisp` (`MALOAISP`, `TENLOAISP`) VALUES
('CC-ST', 'Cao cấp - Sang trọng'),
('DH-KT', ' Đồ họa - Kỹ thuật'),
('Gaming', 'Laptop Gaming'),
('HT-VP', 'Học tập - Văn phòng'),
('MN', 'Mỏng nhẹ');

-- --------------------------------------------------------

--
-- Table structure for table `luongthang`
--

CREATE TABLE `luongthang` (
  `MANV` varchar(10) NOT NULL,
  `THANG` int(10) NOT NULL,
  `NAM` int(10) NOT NULL,
  `SONGAYLAM` int(10) DEFAULT NULL,
  `SONGAYNGHI` int(10) DEFAULT NULL,
  `THUONG` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `luongthang`
--

INSERT INTO `luongthang` (`MANV`, `THANG`, `NAM`, `SONGAYLAM`, `SONGAYNGHI`, `THUONG`) VALUES
('NV001', 3, 2024, 16, 2, 0),
('NV002', 1, 2024, 20, 0, 1000000),
('NV002', 2, 2024, 20, 0, 1000000),
('NV002', 3, 2024, 18, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `monhang`
--

CREATE TABLE `monhang` (
  `MADH` varchar(11) NOT NULL,
  `MASP` int(11) NOT NULL,
  `SOLUONGDAT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `monhang`
--

INSERT INTO `monhang` (`MADH`, `MASP`, `SOLUONGDAT`) VALUES
('6625c6b4463', 2, 1),
('6628fb2639d', 8, 1),
('6628fd6dcf7', 1, 1),
('6628fe93112', 22, 1),
('6628ff2551b', 27, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `TAIKHOAN` varchar(30) NOT NULL,
  `CHUCVU` varchar(10) NOT NULL,
  `MATKHAU` varchar(100) NOT NULL,
  `TENND` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `GIOITINH` tinyint(1) DEFAULT NULL,
  `SDT` varchar(10) DEFAULT NULL,
  `DIACHI` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `NGAYSINH` date DEFAULT NULL,
  `KICHHOAT` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`TAIKHOAN`, `CHUCVU`, `MATKHAU`, `TENND`, `GIOITINH`, `SDT`, `DIACHI`, `EMAIL`, `NGAYSINH`, `KICHHOAT`) VALUES
('987_mai_lan', 'QTHT', 'e19d5cd5af0378da05f63f891c7467af', 'Võ Thị Mai', 1, '0123456789', 'TP.HCM', 'adminmai@email.com', NULL, 1),
('congchua_hangnga', 'KHONG', 'e19d5cd5af0378da05f63f891c7467af', 'Nguyễn Thị Hằng Nga', 0, '0123456789', NULL, 'email@email.com', NULL, 1),
('DongDuong', 'QTHT', 'e19d5cd5af0378da05f63f891c7467af', 'Dương Bắc Đông', 0, '0123456789', 'TP.HCM', 'email123@email.com', NULL, 0),
('ha_tran_thi', 'QLTK', 'e19d5cd5af0378da05f63f891c7467af', 'Trần Thị Hà', 1, '0123456789', 'TP.HCM', 'ha_tran@email.com', NULL, 1),
('huuDucTrinh', 'QLBH', '0369d98a00ba1ca13f51239278d7c2ce', 'Trịnh Hữu Đức', 1, '0123456789', 'TP.HCM', 'abcd@gmail.com', '1997-08-15', 0),
('khoa_admin', 'QTHT', '85469ebac3a963ecc8ce2832eb366fe8', 'Hoàng Đăng Khoa', 0, '0123456789', 'TP.HCM', 'email@email.com', NULL, 1),
('minh_quan', 'QLBH', 'e19d5cd5af0378da05f63f891c7467af', 'Nguyễn Minh Quân', 0, '0123456789', 'TP.HCM', 'minh_quan@email.com', NULL, 1),
('missThuBui', 'QLBH', 'e19d5cd5af0378da05f63f891c7467af', 'Bùi Thị Thu', 1, '0126452369', 'TP.HCM', 'thuemail@email.com', NULL, 1),
('ngaBanHang', 'QLBH', 'e19d5cd5af0378da05f63f891c7467af', 'Phạm Thị Nga', 1, '0125532964', 'TP.HCM', 'phamthinga12@email.com', NULL, 1),
('ngoclinh123', 'KHONG', 'e19d5cd5af0378da05f63f891c7467af', 'Hoàng Ngọc Linh', 1, '0123456789', 'TP.HCM', 'ngoclinh123@email.com', NULL, 1),
('racer9000', 'QLBH', '0369d98a00ba1ca13f51239278d7c2ce', 'Trần Thiên Phúc', 1, '0123456789', 'TP.HCM', 'abcd@email.com', '1998-03-18', 0),
('shino_osaka_45', 'KHONG', 'e19d5cd5af0378da05f63f891c7467af', 'Nguyễn Hoàng Khánh', 0, '0123456789', 'TP.HCM', 'shinoOsaka@email.com', NULL, 1),
('vandongQL', 'QLNS', '0369d98a00ba1ca13f51239278d7c2ce', 'Lưu Văn Đồng', 1, '0123456789', 'TP.HCM', 'admin@email.com', '1993-08-18', 0),
('vanducQL', 'QLNS', 'e19d5cd5af0378da05f63f891c7467af', 'Lê Văn Đức', 0, '0123456789', 'TP.HCM', 'vanduc@email.com', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nhamchuc`
--

CREATE TABLE `nhamchuc` (
  `MANV` varchar(10) DEFAULT NULL,
  `MACV` varchar(10) DEFAULT NULL,
  `NGAYNC` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MANV` varchar(10) NOT NULL,
  `TAIKHOAN` varchar(30) DEFAULT NULL,
  `NGAYVL` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MANV`, `TAIKHOAN`, `NGAYVL`) VALUES
('AM003', 'DongDuong', '2021-05-15'),
('NV001', 'ha_tran_thi', '2022-03-03'),
('NV002', 'minh_quan', '2023-09-21'),
('NV003', 'ngaBanHang', '2023-08-05'),
('NV004', 'missThuBui', '2022-10-21'),
('QL001', 'vanducQL', '2020-01-10'),
('QLNS0003', 'vandongQL', '2023-05-06'),
('QTHT0001', 'khoa_admin', '2021-05-05'),
('QTHT0002', '987_mai_lan', '2021-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `nhasanxuat`
--

CREATE TABLE `nhasanxuat` (
  `MANSX` varchar(11) NOT NULL,
  `TENNSX` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhasanxuat`
--

INSERT INTO `nhasanxuat` (`MANSX`, `TENNSX`) VALUES
('Acer', 'Acer'),
('Apple', 'Apple '),
('ASUS', 'ASUS'),
('DELL', 'DELL'),
('HP', 'HP'),
('HUAWEI', 'HUAWEI'),
('Lenovo', 'Lenovo'),
('LG', 'LG'),
('MSI', 'MSI');

-- --------------------------------------------------------

--
-- Table structure for table `phieunhap`
--

CREATE TABLE `phieunhap` (
  `MAPHIEU` varchar(10) NOT NULL,
  `NGAYLAP` date DEFAULT NULL,
  `NCC` varchar(11) DEFAULT NULL,
  `DIACHI` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phieunhap`
--

INSERT INTO `phieunhap` (`MAPHIEU`, `NGAYLAP`, `NCC`, `DIACHI`) VALUES
('1', '0000-00-00', 'ASUS', 'TP.HCM'),
('2', '0000-00-00', 'ASUS', 'TP.HCM'),
('3', '0000-00-00', 'Acer', 'TP.HCM'),
('4', '0000-00-00', 'Acer', 'TP.HCM'),
('5', '2024-04-24', 'Lenovo', 'TP.HCM');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MASP` int(11) NOT NULL,
  `MALOAISP` varchar(11) NOT NULL,
  `MAGIAMGIA` varchar(11) DEFAULT NULL,
  `MANSX` varchar(11) NOT NULL,
  `TENSP` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MOTASP` text DEFAULT NULL,
  `RAM` int(11) DEFAULT NULL,
  `VIXULY` varchar(50) DEFAULT NULL,
  `KICHTHUOCMH` varchar(10) DEFAULT NULL,
  `GIA` int(20) NOT NULL,
  `SOLUONGCON` int(11) NOT NULL,
  `NGAYSX` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MASP`, `MALOAISP`, `MAGIAMGIA`, `MANSX`, `TENSP`, `MOTASP`, `RAM`, `VIXULY`, `KICHTHUOCMH`, `GIA`, `SOLUONGCON`, `NGAYSX`) VALUES
(1, 'HT-VP', NULL, 'ASUS', 'Asus VivoBook X415EA', 'Laptop Asus VivoBook X415EA i5 (EK033T) đi theo xu hướng thiết kế hiện đại, tối giản, chú trọng vào độ linh hoạt và cơ động để người dùng dễ di chuyển hằng ngày. Chiếc máy này sở hữu bộ vi xử lí gen 11 đến từ nhà Intel cho hiệu suất làm việc cao, ổn định. Thiết kế tối giản, gọn gàng với trọng lượng chỉ 1.55 kg.', 8, 'Intel Core i5 Tiger Lake, 1135G7, 2.40 GHz', '14 inch', 1599, 13, '2020-05-11'),
(2, 'CC-ST', NULL, 'Apple', 'Macbook Pro M1 2020 (Z11C)', 'Apple Macbook Pro M1 2020 (Z11C) được nâng cấp với bộ vi xử lý mới cực kỳ mạnh mẽ, con laptop này sẽ phục vụ tốt cho công việc của bạn, đặc biệt bên lĩnh vực đồ họa, kỹ thuật. Chip Apple M1 là một bộ vi xử lý mạnh mẽ, được ra mắt lần đầu tiên trên MAC. Đây là con chip với bộ xử lý 5 nm, tích hợp CPU 8 lõi với 4 lõi CPU tốc độ và và 4 lõi tiết kiệm năng lượng. Nhờ vậy, thời lượng pin của laptop được kéo dài đến tận 10 tiếng đồng hồ, giúp cho bạn thoải mái làm việc với một hiệu suất cực kỳ cao.', 16, 'Apple M1', '13.3 inch', 4499, 3, '2020-03-16'),
(3, 'HT-VP', NULL, 'Lenovo', 'Lenovo IdeaPad S145 15IIL', 'Laptop Lenovo IdeaPad S145 15IIL i3 (81W8001XVN) thuộc phân khúc laptop học tập văn phòng cơ bản với mức giá tốt. Máy có cấu hình ổn, đủ chạy các ứng dụng văn phòng phổ biến, điểm nổi bật của Lenovo IdeaPad S145 là ổ cứng SSD siêu nhanh, thiết kế mỏng gọn, tinh tế. Laptop  mang thiết kế cơ bản của dòng Lenovo IdeaPad S145 có ngoại hình đẹp mắt, lớp vỏ được làm bằng nhựa phủ sơn màu xám sang trọng với logo Lenovo được đặt gọn gàng sang một bên trên nắp lưng. Độ dày 17.9 mm, cân nặng 1.79 kg phù hợp với các bạn học sinh sinh viên, người thường xuyên di chuyển.', 4, 'Intel Core i3 Ice Lake, 1005G1, 1.20 GHz', '15.6 inch', 1049, 7, '2019-07-15'),
(4, 'HT-VP', NULL, 'HP', 'HP 15s fq2028TU', 'Đặc điểm nổi bật của HP 15s fq2028TU i5 1135G7/8GB/512GB/Win10 (2Q5Y5PA) HP 15s fq2028TU i5 (2Q5Y5PA) có vẻ ngoài nổi bật với màu bạc thời trang, viền màn hình siêu mỏng. Cấu hình bên trong của máy mới thực sự làm bạn bất ngờ khi đây là chiếc laptop có hiệu năng cực mạnh trong tầm giá. Bộ vi xử lý mạnh mẽ, đáp ứng hoàn hảo công việc văn phòng', 8, 'Intel Core i5 Tiger Lake, 1135G7, 2.40 GHz', '15.6 inch', 1699, 5, '2020-05-16'),
(5, 'HT-VP', NULL, 'Acer', 'Acer Aspire 5 A514 54 33WY', 'Thiết kế tối giản của laptop Acer Aspire 5 với độ mỏng chỉ 17.95 mm, trọng lượng 1.46 kg được hoàn thiện tỉ mỉ với vỏ nhựa và nắp lưng kim loại đem đến vẻ đẳng cấp, sang trọng cho Acer Aspire 5. Đây là một người bạn đồng hành khá lý tưởng cho các bạn học sinh, sinh viên năng động khi có thể cất gọn chiếc laptop vào balo và đi khắp nơi.', 4, 'Intel Core i3 Tiger Lake, 1115G4, 3.00 GHz', '14 inch', 1359, 14, '2020-02-02'),
(6, 'DH-KT', NULL, 'DELL', 'Dell G3 15 3500', 'Laptop Dell G3 15 3500 i5 (70223130) là chiếc laptop gaming thuộc series G của nhà Dell với thiết kế cực ngầu và hiệu năng mạnh mẽ, hứa hẹn sẽ là người bạn đồng hành của các game thủ trong mọi cuộc chiến. Dell G3 15 3500 i5 có thiết kế mạnh mẽ với các đường cắt vuông vức, tone xanh - đen cực kì nổi bật. Máy có độ dày 28.18 mm và trọng lượng 2.56 kg, khá gọn nhẹ đối với một chiếc laptop gaming. Bàn phím trên Dell G3 có đèn nền màu xanh vừa tiện lợi cho việc gõ phím ở nơi thiếu ánh sáng vừa trông ấn tượng hơn. Phần Touchpad được đặt lệch hẳn sang một bên với một đường viền xanh chạy dọc bắt mắt. Máy cũng trang bị một Webcam HD tiện lợi cho các cuộc gọi nhóm, hội họp hoặc các streamer.', 8, 'Intel Core i5 Ice Lake, 10300H, 2.50 GHz', '15.6 inch', 2249, 3, '2020-02-02'),
(7, 'DH-KT', NULL, 'Acer', 'Acer Aspire 7 A715', 'Laptop Acer Aspire 7 A715 42G R4ST R5 (NH.QAYSV.004) có thiết kế đơn giản, trang nhã nhưng trang bị cấu hình mạnh mẽ đáp ứng nhu cầu đồ hoạ, kỹ thuật chuyên nghiệp và chiến game mượt mà. Mẫu laptop này được Acer trang bị card đồ họa rời NVIDIA GeForce GTX 1650 4GB được thiết kế theo kiến trúc Turning hiện đại, đáp ứng tốt nhu cầu làm việc, giải trí. Bạn sẽ không cần phải lo lắng và luôn tràn đầy cảm hứng khi chiến các tựa game phổ biến nhất hiện nay như PUBG, Fornite, GTA V,... ở mức yêu cầu về độ hoạ trung bình và cao (Medium hoặc High).', 8, 'AMD Ryzen 5, 5500U, 2.10 GHz', '15.6 inch', 1999, 8, '2020-08-02'),
(8, 'MN', NULL, 'Lenovo', 'LG Gram 15', 'Đặc điểm nổi bật của LG Gram 15 i5 1035G7/8GB/512GB/Win10 (15Z90N-V.AR55A5). Nếu công việc của bạn đòi hỏi phải di chuyển nhiều, bạn muốn sở hữu một chiếc laptop mỏng nhẹ nhưng vẫn đảm bảo cấu hình đủ mạnh để đáp ứng nhu cầu học tập và làm việc, LG Gram 15 i5 (15Z90N-V.AR55A5) chính là một sự lựa chọn tuyệt vời dành cho bạn. Mang trong mình một thiết kế siêu mỏng nhẹ với hợp kim Nano Carbon – Magie bền bỉ, LG Gram 15 có trọng lượng chỉ 1.12 kg, cùng với độ dày chỉ 16.8 mm, chiếc máy này sẵn sàng đáp ứng mọi nhu cầu di chuyển của những người dùng khó tính nhất.', 8, 'Intel Core i5 Ice Lake, 1035G7, 1.20 GHz', '15.6 inch', 3299, 9, '2020-05-12'),
(9, 'MN', NULL, 'HUAWEI', 'Huawei MateBook D 15', 'Trải nghiệm làm việc, giải trí mượt mà với laptop Huawei MateBook D 15 R5 (Boh-WAQ9R), cấu hình vượt trội, thiết kế mỏng nhẹ và màn hình tràn viền tuyệt hảo là những gì mà chiếc laptop doanh nhân cao cấp này đem đến. Huawei MateBook D 15 được thiết kế theo phong cách tối giản, toàn bộ phần vỏ và khung máy được làm từ kim loại nguyên khối với tông màu xám không gian sáng bóng, các cạnh được bo tròn mềm mại cho đối phương cảm giác huyền bí, sang trọng khi chiêm ngưỡng. Được chế tác bởi chất liệu kim loại mang lại cảm giác chắc chắn, bền bỉ, Huawei đảm bảo tính cơ động với độ dày chỉ 16.9 mm và trọng lượng chỉ 1.62 kg. ', 8, '	AMD Ryzen 5, 3500U, 2.10 GHz', '15.6 inch', 1649, 11, '2020-08-10'),
(10, 'Gaming', NULL, 'MSI', 'MSI GL65 Leopard 10SCXK', 'Chiếc laptop MSI GL65 Leopard 10SCXK i7(093VN) chắc chắn sẽ là sự lựa chọn thích hợp dành cho những game thủ với hiệu năng mượt mà với CPU Intel Core i7, NVIDIA GeForce GTX 1650 4GB.Ngay từ vẻ ngoài đã nói lên sự mạnh mẽ của chiếc laptop gaming này với gam màu đen nhám cá tính, những đường cắt độc đáo và logo màu đỏ nổi bật nằm trên mặt lưng kim loại rắn chắc. Bạn hoàn toàn có thể mở máy ra bằng một tay bởi bản lề linh hoạt, cho việc đóng mở máy vô cùng nhẹ nhàng.', 8, 'Intel Core i7 Comet Lake, 10750H, 2.60 GHz', '15.6 inch', 2499, 4, '2020-01-19'),
(16, 'CC-ST', NULL, 'LG', 'Laptop LG gram 16\'\'', 'Siêu nhẹ chỉ 1,190g,Nền tảng Intel® Evo™ với Bộ vi xử lý Intel® Core™ thế hệ 11Thời lượng pin lên đến 22 giờ (80Wh)', 16, 'Intel® Core™ i7 Gen11', '15.6 inch', 2000, 50, '2019-01-01'),
(17, 'MN', 'GG01', 'Lenovo', 'Lenovo thinkpad', 'nhỏ gọn chạy ứng dụng văn phòng học online có webcam', 2, 'Dual Core i3', '10.1 inch', 500, 30, '2019-04-30'),
(19, 'CC-ST', 'GG01', 'LG', 'Laptop LG gram 16\'\'', 'Siêu nhẹ chỉ 1,190g Màn hình IPS 16 Inch WQXGA (2560 x 1600) DCI-P3 99% Nền tảng Intel® Evo™ với Bộ vi xử lý Intel® Core™ thế hệ 11 Thời lượng pin lên đến 22 giờ (80Wh) Thunderbolt™ 4', 16, 'Intel® Core™ i7 Gen11', '15.6 inch', 2000, 10, '2018-12-31'),
(21, 'MN', NULL, 'Apple', 'ME864 - MacBook Pro Retina 13 inch Late ', 'MacBook Pro 15 inch có hơn 5 triệu điểm ảnh , và khoảng hơn 4 triệu với model 13 inch ,  retouch hay edit video HD cần độ chính xác cao giờ đã không còn là vấn đề nữa. bạn sẽ không còn thấy hiện tượng răng cưa trên net chữ khi gõ văn bản nữa.Dual-core and quad-core intel và khả năng xử lý đồ họa tới từ VGA rời, SSD tốc độ cao gấp nhiều lần hdd hay ssd thông thường, Macbook Pro Retina đem đến cho bạn đầy đủ hiệu năng bạn bạn muốn từ 1 chiếc NoteBook. Bây giờ bạn hoàn toàn có thể thiết kế làm việc ở bất kì đâu. không lo bỏ lỡ mọi khoảnh khắc cảm hứng sáng tạo . Với sức mạnh không thể phủ nhận nhưng chiếc NoteBook này không hề lớn, mọi chi tiết cũng như linh kiện cũng như pin được sắp xếp 1 cách gọn gàng trong không gian có thể gọi là nhỏ nhất có thể . khiến thời lượng pin lên tới 10 tiếng.', 4, 'Intel Core i7-10750H', '13.3 ', 999, 50, '2019-05-17'),
(22, 'Gaming', 'GG01', 'MSI', 'Laptop MSI GF63', 'âm thanh đẳng cấp,mỏng nhẹ nhưng mạnh mẽ', 8, 'Intel Core i7-10750H', '15.6 inch', 2499, 50, '2020-02-12'),
(23, 'DH-KT', NULL, 'DELL', 'Laptop Dell Vostro 3405 ', 'CPU: AMD R5 3500U RAM: 8GB Ổ cứng: 512GB SSD VGA: Onboard Màn hình: 14 inch FHD HĐH: Win 10 Màu: Đen', 8, ' AMD R5 3500U', '14 inch', 500, 100, '2019-07-18'),
(24, 'CC-ST', NULL, 'ASUS', 'Laptop Asus X44H VX061', 'rẻ tốt', 2, 'i3', '10.1 inch', 300, 50, '2018-05-03'),
(25, 'CC-ST', NULL, 'HP', 'Laptop HP 15s', 'mỏng nhẹ, kết nối tiên tiến hàng đầu, thoải mái làm việc ở bất cứ đâu', 4, 'i3', '10.1 inch', 399, 6, '2020-10-14'),
(26, 'HT-VP', NULL, 'HUAWEI', 'Huawei MateBook', 'Siêu phẩm laptop 13 inch Huawei MateBook 13 cho bạn nhiều hơn cả những điều mong đợi. Một màn hình 2K cảm ứng tuyệt đẹp tối ưu cho công việc; một thiết kế di động và cứng cáp cùng một cấu hình đột phá sẽ giúp bạn nhanh chóng biến ý tưởng thành hiện thực.', 16, 'i5', '13.3 inch', 1600, 10, '2020-02-14'),
(27, 'CC-ST', NULL, 'Acer', 'Laptop abc', 'Laptop abc', 4, 'KHONG', '10.1 inch', 10, 56, '2024-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `sanphamgiohang`
--

CREATE TABLE `sanphamgiohang` (
  `MASP` int(11) NOT NULL,
  `TAIKHOAN` varchar(30) NOT NULL,
  `SOLUONGGIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanphamgiohang`
--

INSERT INTO `sanphamgiohang` (`MASP`, `TAIKHOAN`, `SOLUONGGIO`) VALUES
(3, 'shino_osaka_45', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietnhap`
--
ALTER TABLE `chitietnhap`
  ADD PRIMARY KEY (`STT`,`MAPHIEU`) USING BTREE,
  ADD KEY `chitietnhap_ibfk_2` (`MASP`);

--
-- Indexes for table `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`MACV`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MADH`),
  ADD KEY `donhang_ibfk_1` (`TAIKHOAN`);

--
-- Indexes for table `donnghi`
--
ALTER TABLE `donnghi`
  ADD PRIMARY KEY (`MADON`),
  ADD KEY `MANV` (`MANV`);

--
-- Indexes for table `giamgia`
--
ALTER TABLE `giamgia`
  ADD PRIMARY KEY (`MAGIAMGIA`);

--
-- Indexes for table `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD PRIMARY KEY (`MAHINH`),
  ADD KEY `hinhanh_ibfk_1` (`MASP`);

--
-- Indexes for table `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`MALOAISP`);

--
-- Indexes for table `luongthang`
--
ALTER TABLE `luongthang`
  ADD PRIMARY KEY (`MANV`,`THANG`,`NAM`);

--
-- Indexes for table `monhang`
--
ALTER TABLE `monhang`
  ADD KEY `MADH` (`MADH`),
  ADD KEY `MASP` (`MASP`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`TAIKHOAN`),
  ADD KEY `MAQUYEN` (`CHUCVU`);

--
-- Indexes for table `nhamchuc`
--
ALTER TABLE `nhamchuc`
  ADD KEY `nhamchuc_ibfk_1` (`MANV`),
  ADD KEY `nhamchuc_ibfk_2` (`MACV`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MANV`),
  ADD KEY `TAIKHOAN` (`TAIKHOAN`);

--
-- Indexes for table `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  ADD PRIMARY KEY (`MANSX`);

--
-- Indexes for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`MAPHIEU`),
  ADD KEY `phieunhap_ibfk_1` (`NCC`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MASP`),
  ADD KEY `MAGIAMGIA` (`MAGIAMGIA`),
  ADD KEY `MALOAISP` (`MALOAISP`),
  ADD KEY `MANSX` (`MANSX`);

--
-- Indexes for table `sanphamgiohang`
--
ALTER TABLE `sanphamgiohang`
  ADD KEY `sanphamgiohang_ibfk_2` (`TAIKHOAN`),
  ADD KEY `MASP` (`MASP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hinhanh`
--
ALTER TABLE `hinhanh`
  MODIFY `MAHINH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MASP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietnhap`
--
ALTER TABLE `chitietnhap`
  ADD CONSTRAINT `chitietnhap_ibfk_1` FOREIGN KEY (`MAPHIEU`) REFERENCES `phieunhap` (`MAPHIEU`),
  ADD CONSTRAINT `chitietnhap_ibfk_2` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`);

--
-- Constraints for table `donnghi`
--
ALTER TABLE `donnghi`
  ADD CONSTRAINT `donnghi_ibfk_1` FOREIGN KEY (`MANV`) REFERENCES `nhanvien` (`MANV`);

--
-- Constraints for table `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `hinhanh_ibfk_1` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`);

--
-- Constraints for table `luongthang`
--
ALTER TABLE `luongthang`
  ADD CONSTRAINT `luongthang_ibfk_1` FOREIGN KEY (`MANV`) REFERENCES `nhanvien` (`MANV`);

--
-- Constraints for table `monhang`
--
ALTER TABLE `monhang`
  ADD CONSTRAINT `monhang_ibfk_1` FOREIGN KEY (`MADH`) REFERENCES `donhang` (`MADH`),
  ADD CONSTRAINT `monhang_ibfk_2` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`);

--
-- Constraints for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `nguoidung_ibfk_1` FOREIGN KEY (`CHUCVU`) REFERENCES `chucvu` (`MACV`);

--
-- Constraints for table `nhamchuc`
--
ALTER TABLE `nhamchuc`
  ADD CONSTRAINT `nhamchuc_ibfk_1` FOREIGN KEY (`MANV`) REFERENCES `nhanvien` (`MANV`),
  ADD CONSTRAINT `nhamchuc_ibfk_2` FOREIGN KEY (`MACV`) REFERENCES `chucvu` (`MACV`);

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`TAIKHOAN`) REFERENCES `nguoidung` (`TAIKHOAN`);

--
-- Constraints for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `phieunhap_ibfk_1` FOREIGN KEY (`NCC`) REFERENCES `nhasanxuat` (`MANSX`);

--
-- Constraints for table `sanphamgiohang`
--
ALTER TABLE `sanphamgiohang`
  ADD CONSTRAINT `sanphamgiohang_ibfk_2` FOREIGN KEY (`TAIKHOAN`) REFERENCES `nguoidung` (`TAIKHOAN`),
  ADD CONSTRAINT `sanphamgiohang_ibfk_3` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
