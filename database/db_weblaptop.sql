-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2021 at 08:54 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

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
-- Table structure for table `capquyen`
--

CREATE TABLE `capquyen` (
  `MAQUYEN` varchar(10) NOT NULL,
  `TENQUYEN` varchar(20) CHARACTER SET utf8 NOT NULL,
  `MOTAQUYEN` varchar(200) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `capquyen`
--

INSERT INTO `capquyen` (`MAQUYEN`, `TENQUYEN`, `MOTAQUYEN`) VALUES
('AM', 'Quản trị hệ thống', 'Là người dùng có toàn quyền trên hệ thống, quản lý hệ thống'),
('KH', 'Khách hàng', 'Là người truy cập vào trang web với mục đích xem thông tin, đăng nhập hệ thống để mua hàng'),
('NV', 'Nhân viên', 'Là nhân viên bán hàng');

-- --------------------------------------------------------

CREATE TABLE `donhang` (
  `MADH` varchar(11) NOT NULL,
  `TAIKHOAN` varchar(30) NOT NULL,
  `TRANGTHAI` varchar(15) CHARACTER SET utf8 NOT NULL,
  `NGAYDAT` date NOT NULL,
  `HTTHANHTOAN` varchar(20) NOT NULL,
  `DIACHINHAN` varchar(200) CHARACTER SET utf8 NOT NULL,
  `TONGTIEN` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `donhang` (`MADH`,`TAIKHOAN`,`TRANGTHAI`,`NGAYDAT`,`HTTHANHTOAN`,`DIACHINHAN`,`TONGTIEN`) VALUES
('609cca17d5c24','vinh1','Chưa xác nhận','2021-5-5','Online','Cần Thơ',13242),
('609cca2fba27c','vinh1','Đã xác nhận','2021-5-5','Online','Cần Thơ',7963),
('609cca3bee0ae','vinh1','Đã từ chối','2021-5-5','Offline','Cần Thơ',4499);


-- --------------------------------------------------------

--
-- Table structure for table `giamgia`
--

CREATE TABLE `giamgia` (
  `MAGIAMGIA` varchar(11) NOT NULL,
  `TENGIAMGIA` varchar(30) CHARACTER SET utf8 NOT NULL,
  `PHANTRAM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nguoidung`
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
  `MAHINH` varchar(11) NOT NULL,
  `MASP` varchar(11) NOT NULL,
  `LINK` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hinhanh`
--

INSERT INTO `hinhanh` (`MAHINH`, `MASP`, `LINK`) VALUES
('H1', 'MT1', '1_asus-vivobook.jpg'),
('H10', 'MT10', '10_apple-macbook-pro.JPG'),
('H2', 'MT2', '2_lenovo-ideapad.jpg'),
('H3', 'MT3', '3_hp-15s.jpg'),
('H4', 'MT4', '4_acer-aspire-5.jpg'),
('H5', 'MT5', '5_dell-g3.JPG'),
('H6', 'MT6', '6_acer-aspire-7.JPG'),
('H7', 'MT7', '7_lg-gram-15-i5.JPG'),
('H8', 'MT8', '8_huawei-matebook.JPG'),
('H9', 'MT9', '9_msi-gl65.JPG');


-- --------------------------------------------------------

--
-- Table structure for table `loaisp`
--

CREATE TABLE `loaisp` (
  `MALOAISP` varchar(11) NOT NULL,
  `TENLOAISP` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loaisp`
--

INSERT INTO `loaisp` (`MALOAISP`, `TENLOAISP`) VALUES
('HT-VP', 'Học tập - Văn phòng'),
('DH-KT', ' Đồ họa - Kỹ thuật'),
('MN', 'Mỏng nhẹ'),
('CC-ST', 'Cao cấp - Sang trọng'),
('Gaming', 'Laptop Gaming');

-- --------------------------------------------------------

--
-- Table structure for table `monhang`
--

CREATE TABLE `monhang` (
  `MADH` varchar(11) NOT NULL,
  `MASP` varchar(11) NOT NULL,
  `SOLUONGDAT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `monhang` (`MADH`,`MASP`,`SOLUONGDAT`) VALUES
('609cca17d5c24','MT1','2'),
('609cca17d5c24','MT8','3'),
('609cca17d5c24','MT3','3'),
('609cca2fba27c','MT4','2'),
('609cca2fba27c','MT2','5'),
('609cca3bee0ae','MT10','1');


-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `TAIKHOAN` varchar(30) NOT NULL,
  `MAQUYEN` varchar(10) NOT NULL,
  `MATKHAU` varchar(100) NOT NULL,
  `TENND` varchar(50) CHARACTER SET utf8 NOT NULL,
  `GIOITINH` tinyint(1) DEFAULT NULL,
  `SDT` varchar(10) DEFAULT NULL,
  `DIACHI` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `NGAYSINH` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`TAIKHOAN`, `MAQUYEN`, `MATKHAU`, `TENND`, `GIOITINH`, `SDT`, `DIACHI`, `EMAIL`, `NGAYSINH`) VALUES
('bichngan', 'KH', '202cb962ac59075b964b07152d234b70', 'ngan', NULL, NULL, NULL, NULL, NULL),
('ngân', 'KH', '202cb962ac59075b964b07152d234b70', 'vu bich ngan', NULL, NULL, NULL, NULL, NULL),
('vinh1', 'KH', 'd2192f08143b9cc46fc79fc98870e71b', 'Thế Vinh 1', NULL, NULL, NULL, NULL, NULL),
('vinh2', 'AM', 'ef370d21cb7ee38501ed3f6087d37b56', 'Thế Vinh 2', NULL, NULL, NULL, NULL, NULL),
('vinh3', 'NV', '6c5fc9c516e836ea7b4abcf3f317bd21', 'Thế Vinh 3', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nhasanxuat`
--

CREATE TABLE `nhasanxuat` (
  `MANSX` varchar(11) NOT NULL,
  `TENNSX` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhasanxuat`
--

INSERT INTO `nhasanxuat` (`MANSX`, `TENNSX`) VALUES
('ASUS', 'ASUS'),
('DELL', 'DELL'),
('HP', 'HP'),
('Lenovo', 'Lenovo'),
('LG', 'LG'),
('Acer', 'acer'),
('HUAWEI', 'HUAWEI'),
('MSI', 'MSI'),
('Apple', 'Apple ');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MASP` varchar(11) NOT NULL,
  `MALOAISP` varchar(11) NOT NULL,
  `MAGIAMGIA` varchar(11) DEFAULT NULL,
  `MANSX` varchar(11) NOT NULL,
  `TENSP` varchar(50) CHARACTER SET utf8 NOT NULL,
  `MOTASP` text DEFAULT NULL,
  `RAM` int(11) DEFAULT NULL,
  `VIXULY` varchar(50) DEFAULT NULL,
  `KICHTHUOCMH` varchar(10) DEFAULT NULL,
  `GIA` int(20) NOT NULL,
  `SOLUONGCON` int(11) NOT NULL,
  `NGAYSX` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MASP`, `MALOAISP`, `MAGIAMGIA`, `MANSX`, `TENSP`, `MOTASP`, `RAM`, `VIXULY`, `KICHTHUOCMH`, `GIA`, `SOLUONGCON`, `NGAYSX`) VALUES
('MT1', 'HT-VP', NULL, 'ASUS', 'Asus VivoBook X415EA', 'Laptop Asus VivoBook X415EA i5 (EK033T) đi theo xu hướng thiết kế hiện đại, tối giản, chú trọng vào độ linh hoạt và cơ động để người dùng dễ di chuyển hằng ngày. Chiếc máy này sở hữu bộ vi xử lí gen 11 đến từ nhà Intel cho hiệu suất làm việc cao, ổn định. \r\nThiết kế tối giản, gọn gàng với trọng lượng chỉ 1.55 kg.', 8, 'Intel Core i5 Tiger Lake, 1135G7, 2.40 GHz', '14 inch', 1599, 10, '2020-05-11'),
('MT2', 'HT-VP', NULL, 'Lenovo', 'Lenovo IdeaPad S145 15IIL', 'Laptop Lenovo IdeaPad S145 15IIL i3 (81W8001XVN) thuộc phân khúc laptop học tập văn phòng cơ bản với mức giá tốt. Máy có cấu hình ổn, đủ chạy các ứng dụng văn phòng phổ biến, điểm nổi bật của Lenovo IdeaPad S145 là ổ cứng SSD siêu nhanh, thiết kế mỏng gọn, tinh tế. Laptop  mang thiết kế cơ bản của dòng Lenovo IdeaPad S145 có ngoại hình đẹp mắt, lớp vỏ được làm bằng nhựa phủ sơn màu xám sang trọng với logo Lenovo được đặt gọn gàng sang một bên trên nắp lưng. Độ dày 17.9 mm, cân nặng 1.79 kg phù hợp với các bạn học sinh sinh viên, người thường xuyên di chuyển.', 4, 'Intel Core i3 Ice Lake, 1005G1, 1.20 GHz', '15.6 inch', 1049, 7, '2019-07-15'),
('MT3', 'HT-VP', NULL, 'HP', 'HP 15s fq2028TU', 'Đặc điểm nổi bật của HP 15s fq2028TU i5 1135G7/8GB/512GB/Win10 (2Q5Y5PA) HP 15s fq2028TU i5 (2Q5Y5PA) có vẻ ngoài nổi bật với màu bạc thời trang, viền màn hình siêu mỏng. Cấu hình bên trong của máy mới thực sự làm bạn bất ngờ khi đây là chiếc laptop có hiệu năng cực mạnh trong tầm giá. Bộ vi xử lý mạnh mẽ, đáp ứng hoàn hảo công việc văn phòng', 8, 'Intel Core i5 Tiger Lake, 1135G7, 2.40 GHz', '15.6 inch', 1699, 5, '2020-05-16'),
('MT4', 'HT-VP', NULL, 'Acer', 'Acer Aspire 5 A514 54 33WY', 'Thiết kế tối giản của laptop Acer Aspire 5 với độ mỏng chỉ 17.95 mm, trọng lượng 1.46 kg được hoàn thiện tỉ mỉ với vỏ nhựa và nắp lưng kim loại đem đến vẻ đẳng cấp, sang trọng cho Acer Aspire 5. Đây là một người bạn đồng hành khá lý tưởng cho các bạn học sinh, sinh viên năng động khi có thể cất gọn chiếc laptop vào balo và đi khắp nơi.', 4, 'Intel Core i3 Tiger Lake, 1115G4, 3.00 GHz', '14 inch', 1359, 14, '2020-02-02'),
('MT5', 'DH-KT', NULL, 'DELL', 'Dell G3 15 3500', 'Laptop Dell G3 15 3500 i5 (70223130) là chiếc laptop gaming thuộc series G của nhà Dell với thiết kế cực ngầu và hiệu năng mạnh mẽ, hứa hẹn sẽ là người bạn đồng hành của các game thủ trong mọi cuộc chiến. Dell G3 15 3500 i5 có thiết kế mạnh mẽ với các đường cắt vuông vức, tone xanh - đen cực kì nổi bật. Máy có độ dày 28.18 mm và trọng lượng 2.56 kg, khá gọn nhẹ đối với một chiếc laptop gaming. Bàn phím trên Dell G3 có đèn nền màu xanh vừa tiện lợi cho việc gõ phím ở nơi thiếu ánh sáng vừa trông ấn tượng hơn. Phần Touchpad được đặt lệch hẳn sang một bên với một đường viền xanh chạy dọc bắt mắt. Máy cũng trang bị một Webcam HD tiện lợi cho các cuộc gọi nhóm, hội họp hoặc các streamer.', 8, 'Intel Core i5 Ice Lake, 10300H, 2.50 GHz', '15.6 inch', 2249, 3, '2020-02-02'),
('MT6', 'DH-KT', NULL, 'LG', 'Acer Aspire 7 A715', 'Laptop Acer Aspire 7 A715 42G R4ST R5 (NH.QAYSV.004) có thiết kế đơn giản, trang nhã nhưng trang bị cấu hình mạnh mẽ đáp ứng nhu cầu đồ hoạ, kỹ thuật chuyên nghiệp và chiến game mượt mà. Mẫu laptop này được Acer trang bị card đồ họa rời NVIDIA GeForce GTX 1650 4GB được thiết kế theo kiến trúc Turning hiện đại, đáp ứng tốt nhu cầu làm việc, giải trí. Bạn sẽ không cần phải lo lắng và luôn tràn đầy cảm hứng khi chiến các tựa game phổ biến nhất hiện nay như PUBG, Fornite, GTA V,... ở mức yêu cầu về độ hoạ trung bình và cao (Medium hoặc High).', 8, 'AMD Ryzen 5, 5500U, 2.10 GHz', '15.6 inch', 1999, 8, '2020-08-02'),
('MT7', 'MN', NULL, 'Lenovo', 'LG Gram 15', 'Đặc điểm nổi bật của LG Gram 15 i5 1035G7/8GB/512GB/Win10 (15Z90N-V.AR55A5). Nếu công việc của bạn đòi hỏi phải di chuyển nhiều, bạn muốn sở hữu một chiếc laptop mỏng nhẹ nhưng vẫn đảm bảo cấu hình đủ mạnh để đáp ứng nhu cầu học tập và làm việc, LG Gram 15 i5 (15Z90N-V.AR55A5) chính là một sự lựa chọn tuyệt vời dành cho bạn. Mang trong mình một thiết kế siêu mỏng nhẹ với hợp kim Nano Carbon – Magie bền bỉ, LG Gram 15 có trọng lượng chỉ 1.12 kg, cùng với độ dày chỉ 16.8 mm, chiếc máy này sẵn sàng đáp ứng mọi nhu cầu di chuyển của những người dùng khó tính nhất.', 8, 'Intel Core i5 Ice Lake, 1035G7, 1.20 GHz', '15.6 inch', 3299, 9, '2020-05-12'),
('MT8', 'MN', NULL, 'HUAWEI', 'Huawei MateBook D 15', 'Trải nghiệm làm việc, giải trí mượt mà với laptop Huawei MateBook D 15 R5 (Boh-WAQ9R), cấu hình vượt trội, thiết kế mỏng nhẹ và màn hình tràn viền tuyệt hảo là những gì mà chiếc laptop doanh nhân cao cấp này đem đến. Huawei MateBook D 15 được thiết kế theo phong cách tối giản, toàn bộ phần vỏ và khung máy được làm từ kim loại nguyên khối với tông màu xám không gian sáng bóng, các cạnh được bo tròn mềm mại cho đối phương cảm giác huyền bí, sang trọng khi chiêm ngưỡng. Được chế tác bởi chất liệu kim loại mang lại cảm giác chắc chắn, bền bỉ, Huawei đảm bảo tính cơ động với độ dày chỉ 16.9 mm và trọng lượng chỉ 1.62 kg. ', 8, '	AMD Ryzen 5, 3500U, 2.10 GHz', '15.6 inch', 1649, 11, '2020-08-10'),
('MT9', 'Gaming', NULL, 'MSI', 'MSI GL65 Leopard 10SCXK', 'Chiếc laptop MSI GL65 Leopard 10SCXK i7(093VN) chắc chắn sẽ là sự lựa chọn thích hợp dành cho những game thủ với hiệu năng mượt mà với CPU Intel Core i7, NVIDIA GeForce GTX 1650 4GB.Ngay từ vẻ ngoài đã nói lên sự mạnh mẽ của chiếc laptop gaming này với gam màu đen nhám cá tính, những đường cắt độc đáo và logo màu đỏ nổi bật nằm trên mặt lưng kim loại rắn chắc. Bạn hoàn toàn có thể mở máy ra bằng một tay bởi bản lề linh hoạt, cho việc đóng mở máy vô cùng nhẹ nhàng.', 8, 'Intel Core i7 Comet Lake, 10750H, 2.60 GHz', '15.6 inch', 2499, 4, '2020-01-19'),
('MT10', 'CC-ST', NULL, 'Apple', 'Macbook Pro M1 2020 (Z11C)', 'Apple Macbook Pro M1 2020 (Z11C) được nâng cấp với bộ vi xử lý mới cực kỳ mạnh mẽ, con laptop này sẽ phục vụ tốt cho công việc của bạn, đặc biệt bên lĩnh vực đồ họa, kỹ thuật. Chip Apple M1 là một bộ vi xử lý mạnh mẽ, được ra mắt lần đầu tiên trên MAC. Đây là con chip với bộ xử lý 5 nm, tích hợp CPU 8 lõi với 4 lõi CPU tốc độ và và 4 lõi tiết kiệm năng lượng. Nhờ vậy, thời lượng pin của laptop được kéo dài đến tận 10 tiếng đồng hồ, giúp cho bạn thoải mái làm việc với một hiệu suất cực kỳ cao.', 16, 'Apple M1', '13.3 inch', 4499, 3, '2020-03-16');
('MT11', 'HT-VP', NULL, 'ASUS', 'Asus VivoBook X415EA', 'Laptop Asus VivoBook X415EA i5 (EK033T) đi theo xu hướng thiết kế hiện đại, tối giản, chú trọng vào độ linh hoạt và cơ động để người dùng dễ di chuyển hằng ngày. Chiếc máy này sở hữu bộ vi xử lí gen 11 đến từ nhà Intel cho hiệu suất làm việc cao, ổn định. \r\nThiết kế tối giản, gọn gàng với trọng lượng chỉ 1.55 kg.', 8, 'Intel Core i5 Tiger Lake, 1135G7, 2.40 GHz', '14 inch', 1599, 10, '2020-05-11'),
('MT12', 'HT-VP', NULL, 'Lenovo', 'Lenovo IdeaPad S145 15IIL', 'Laptop Lenovo IdeaPad S145 15IIL i3 (81W8001XVN) thuộc phân khúc laptop học tập văn phòng cơ bản với mức giá tốt. Máy có cấu hình ổn, đủ chạy các ứng dụng văn phòng phổ biến, điểm nổi bật của Lenovo IdeaPad S145 là ổ cứng SSD siêu nhanh, thiết kế mỏng gọn, tinh tế. Laptop  mang thiết kế cơ bản của dòng Lenovo IdeaPad S145 có ngoại hình đẹp mắt, lớp vỏ được làm bằng nhựa phủ sơn màu xám sang trọng với logo Lenovo được đặt gọn gàng sang một bên trên nắp lưng. Độ dày 17.9 mm, cân nặng 1.79 kg phù hợp với các bạn học sinh sinh viên, người thường xuyên di chuyển.', 4, 'Intel Core i3 Ice Lake, 1005G1, 1.20 GHz', '15.6 inch', 1049, 7, '2019-07-15'),
('MT13', 'HT-VP', NULL, 'HP', 'HP 15s fq2028TU', 'Đặc điểm nổi bật của HP 15s fq2028TU i5 1135G7/8GB/512GB/Win10 (2Q5Y5PA) HP 15s fq2028TU i5 (2Q5Y5PA) có vẻ ngoài nổi bật với màu bạc thời trang, viền màn hình siêu mỏng. Cấu hình bên trong của máy mới thực sự làm bạn bất ngờ khi đây là chiếc laptop có hiệu năng cực mạnh trong tầm giá. Bộ vi xử lý mạnh mẽ, đáp ứng hoàn hảo công việc văn phòng', 8, 'Intel Core i5 Tiger Lake, 1135G7, 2.40 GHz', '15.6 inch', 1699, 5, '2020-05-16'),
('MT14', 'HT-VP', NULL, 'Acer', 'Acer Aspire 5 A514 54 33WY', 'Thiết kế tối giản của laptop Acer Aspire 5 với độ mỏng chỉ 17.95 mm, trọng lượng 1.46 kg được hoàn thiện tỉ mỉ với vỏ nhựa và nắp lưng kim loại đem đến vẻ đẳng cấp, sang trọng cho Acer Aspire 5. Đây là một người bạn đồng hành khá lý tưởng cho các bạn học sinh, sinh viên năng động khi có thể cất gọn chiếc laptop vào balo và đi khắp nơi.', 4, 'Intel Core i3 Tiger Lake, 1115G4, 3.00 GHz', '14 inch', 1359, 14, '2020-02-02'),
('MT15', 'DH-KT', NULL, 'DELL', 'Dell G3 15 3500', 'Laptop Dell G3 15 3500 i5 (70223130) là chiếc laptop gaming thuộc series G của nhà Dell với thiết kế cực ngầu và hiệu năng mạnh mẽ, hứa hẹn sẽ là người bạn đồng hành của các game thủ trong mọi cuộc chiến. Dell G3 15 3500 i5 có thiết kế mạnh mẽ với các đường cắt vuông vức, tone xanh - đen cực kì nổi bật. Máy có độ dày 28.18 mm và trọng lượng 2.56 kg, khá gọn nhẹ đối với một chiếc laptop gaming. Bàn phím trên Dell G3 có đèn nền màu xanh vừa tiện lợi cho việc gõ phím ở nơi thiếu ánh sáng vừa trông ấn tượng hơn. Phần Touchpad được đặt lệch hẳn sang một bên với một đường viền xanh chạy dọc bắt mắt. Máy cũng trang bị một Webcam HD tiện lợi cho các cuộc gọi nhóm, hội họp hoặc các streamer.', 8, 'Intel Core i5 Ice Lake, 10300H, 2.50 GHz', '15.6 inch', 2249, 3, '2020-02-02'),
('MT16', 'DH-KT', NULL, 'LG', 'Acer Aspire 7 A715', 'Laptop Acer Aspire 7 A715 42G R4ST R5 (NH.QAYSV.004) có thiết kế đơn giản, trang nhã nhưng trang bị cấu hình mạnh mẽ đáp ứng nhu cầu đồ hoạ, kỹ thuật chuyên nghiệp và chiến game mượt mà. Mẫu laptop này được Acer trang bị card đồ họa rời NVIDIA GeForce GTX 1650 4GB được thiết kế theo kiến trúc Turning hiện đại, đáp ứng tốt nhu cầu làm việc, giải trí. Bạn sẽ không cần phải lo lắng và luôn tràn đầy cảm hứng khi chiến các tựa game phổ biến nhất hiện nay như PUBG, Fornite, GTA V,... ở mức yêu cầu về độ hoạ trung bình và cao (Medium hoặc High).', 8, 'AMD Ryzen 5, 5500U, 2.10 GHz', '15.6 inch', 1999, 8, '2020-08-02'),
('MT17', 'MN', NULL, 'Lenovo', 'LG Gram 15', 'Đặc điểm nổi bật của LG Gram 15 i5 1035G7/8GB/512GB/Win10 (15Z90N-V.AR55A5). Nếu công việc của bạn đòi hỏi phải di chuyển nhiều, bạn muốn sở hữu một chiếc laptop mỏng nhẹ nhưng vẫn đảm bảo cấu hình đủ mạnh để đáp ứng nhu cầu học tập và làm việc, LG Gram 15 i5 (15Z90N-V.AR55A5) chính là một sự lựa chọn tuyệt vời dành cho bạn. Mang trong mình một thiết kế siêu mỏng nhẹ với hợp kim Nano Carbon – Magie bền bỉ, LG Gram 15 có trọng lượng chỉ 1.12 kg, cùng với độ dày chỉ 16.8 mm, chiếc máy này sẵn sàng đáp ứng mọi nhu cầu di chuyển của những người dùng khó tính nhất.', 8, 'Intel Core i5 Ice Lake, 1035G7, 1.20 GHz', '15.6 inch', 3299, 9, '2020-05-12'),
('MT18', 'MN', NULL, 'HUAWEI', 'Huawei MateBook D 15', 'Trải nghiệm làm việc, giải trí mượt mà với laptop Huawei MateBook D 15 R5 (Boh-WAQ9R), cấu hình vượt trội, thiết kế mỏng nhẹ và màn hình tràn viền tuyệt hảo là những gì mà chiếc laptop doanh nhân cao cấp này đem đến. Huawei MateBook D 15 được thiết kế theo phong cách tối giản, toàn bộ phần vỏ và khung máy được làm từ kim loại nguyên khối với tông màu xám không gian sáng bóng, các cạnh được bo tròn mềm mại cho đối phương cảm giác huyền bí, sang trọng khi chiêm ngưỡng. Được chế tác bởi chất liệu kim loại mang lại cảm giác chắc chắn, bền bỉ, Huawei đảm bảo tính cơ động với độ dày chỉ 16.9 mm và trọng lượng chỉ 1.62 kg. ', 8, '	AMD Ryzen 5, 3500U, 2.10 GHz', '15.6 inch', 1649, 11, '2020-08-10'),
('MT19', 'Gaming', NULL, 'MSI', 'MSI GL65 Leopard 10SCXK', 'Chiếc laptop MSI GL65 Leopard 10SCXK i7(093VN) chắc chắn sẽ là sự lựa chọn thích hợp dành cho những game thủ với hiệu năng mượt mà với CPU Intel Core i7, NVIDIA GeForce GTX 1650 4GB.Ngay từ vẻ ngoài đã nói lên sự mạnh mẽ của chiếc laptop gaming này với gam màu đen nhám cá tính, những đường cắt độc đáo và logo màu đỏ nổi bật nằm trên mặt lưng kim loại rắn chắc. Bạn hoàn toàn có thể mở máy ra bằng một tay bởi bản lề linh hoạt, cho việc đóng mở máy vô cùng nhẹ nhàng.', 8, 'Intel Core i7 Comet Lake, 10750H, 2.60 GHz', '15.6 inch', 2499, 4, '2020-01-19'),
('MT20', 'CC-ST', NULL, 'Apple', 'Macbook Pro M1 2020 (Z11C)', 'Apple Macbook Pro M1 2020 (Z11C) được nâng cấp với bộ vi xử lý mới cực kỳ mạnh mẽ, con laptop này sẽ phục vụ tốt cho công việc của bạn, đặc biệt bên lĩnh vực đồ họa, kỹ thuật. Chip Apple M1 là một bộ vi xử lý mạnh mẽ, được ra mắt lần đầu tiên trên MAC. Đây là con chip với bộ xử lý 5 nm, tích hợp CPU 8 lõi với 4 lõi CPU tốc độ và và 4 lõi tiết kiệm năng lượng. Nhờ vậy, thời lượng pin của laptop được kéo dài đến tận 10 tiếng đồng hồ, giúp cho bạn thoải mái làm việc với một hiệu suất cực kỳ cao.', 16, 'Apple M1', '13.3 inch', 4499, 3, '2020-03-16');
-- --------------------------------------------------------

--
-- Table structure for table `sanphamgiohang`
--

CREATE TABLE `sanphamgiohang` (
  `MASP` varchar(11) NOT NULL,
  `TAIKHOAN` varchar(30) NOT NULL,
  `SOLUONGGIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanphamgiohang` (`MASP`,`TAIKHOAN`,`SOLUONGGIO`) VALUES
('MT2','vinh1','2'),
('MT4','vinh1','1'),
('MT6','vinh1','3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `capquyen`
--
ALTER TABLE `capquyen`
  ADD PRIMARY KEY (`MAQUYEN`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MADH`),
  ADD KEY `donhang_ibfk_1` (`TAIKHOAN`);

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
  ADD KEY `MAQUYEN` (`MAQUYEN`);

--
-- Indexes for table `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  ADD PRIMARY KEY (`MANSX`);

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
  ADD KEY `TAIKHOAN` (`TAIKHOAN`),
  ADD KEY `MASP` (`MASP`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`TAIKHOAN`) REFERENCES `nguoidung` (`TAIKHOAN`);

--
-- Constraints for table `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `hinhanh_ibfk_1` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`);

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
  ADD CONSTRAINT `nguoidung_ibfk_1` FOREIGN KEY (`MAQUYEN`) REFERENCES `capquyen` (`MAQUYEN`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MAGIAMGIA`) REFERENCES `giamgia` (`MAGIAMGIA`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`MALOAISP`) REFERENCES `loaisp` (`MALOAISP`),
  ADD CONSTRAINT `sanpham_ibfk_3` FOREIGN KEY (`MANSX`) REFERENCES `nhasanxuat` (`MANSX`);

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