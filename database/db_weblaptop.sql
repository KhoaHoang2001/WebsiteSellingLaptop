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

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `MADH` varchar(11) NOT NULL,
  `TAIKHOAN` varchar(30) NOT NULL,
  `TRANGTHAI` varchar(15) CHARACTER SET utf8 NOT NULL,
  `NGAYDAT` date NOT NULL,
  `HTTHANHTOAN` tinyint(1) NOT NULL,
  `DIACHINHAN` varchar(200) CHARACTER SET utf8 NOT NULL,
  `TONGTIEN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `giamgia`
--

CREATE TABLE `giamgia` (
  `MAGIAMGIA` varchar(11) NOT NULL,
  `TENGIAMGIA` varchar(30) CHARACTER SET utf8 NOT NULL,
  `PHANTRAM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hinhanh`
--

CREATE TABLE `hinhanh` (
  `MAHINH` varchar(11) NOT NULL,
  `MASP` varchar(11) NOT NULL,
  `LINK` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('LSP1', 'Học tập - Văn phòng'),
('LSP2', ' Đồ họa - Kỹ thuật'),
('LSP3', 'Mỏng nhẹ'),
('LSP4', 'Cao cấp - Sang trọng'),
('LSP5', 'Laptop Gaming');

-- --------------------------------------------------------

--
-- Table structure for table `mausac`
--

CREATE TABLE `mausac` (
  `MAMAU` varchar(11) NOT NULL,
  `TENMAU` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mausac`
--

INSERT INTO `mausac` (`MAMAU`, `TENMAU`) VALUES
('bac', 'Bạc'),
('den', 'Đen'),
('trang', 'Trắng'),
('vang', 'Vàng'),
('xam', 'Xám');

-- --------------------------------------------------------

--
-- Table structure for table `mausacsanpham`
--

CREATE TABLE `mausacsanpham` (
  `MAMAU` varchar(11) NOT NULL,
  `MASP` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `monhang`
--

CREATE TABLE `monhang` (
  `MADH` varchar(11) NOT NULL,
  `MASP` varchar(11) NOT NULL,
  `SOLUONGDAT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('ngân', 'KH', '202cb962ac59075b964b07152d234b70', 'vu bich ngan', NULL, NULL, NULL, NULL, NULL);

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
('NSX1', 'ASUS'),
('NSX2', 'DELL'),
('NSX3', 'HP'),
('NSX4', 'Lenovo'),
('NSX5', 'LG'),
('NSX6', 'acer'),
('NSX7', 'HUAWEI'),
('NSX8', 'MSI'),
('NSX9', 'Apple ');

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
  `GIA` int(11) NOT NULL,
  `SOLUONGCON` int(11) NOT NULL,
  `NGAYSX` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MASP`, `MALOAISP`, `MAGIAMGIA`, `MANSX`, `TENSP`, `MOTASP`, `RAM`, `VIXULY`, `KICHTHUOCMH`, `GIA`, `SOLUONGCON`, `NGAYSX`) VALUES
('SP1', 'LSP1', NULL, 'NSX1', 'VivoBook X415EA', 'Laptop Asus VivoBook X415EA i5 (EK033T) đi theo xu hướng thiết kế hiện đại, tối giản, chú trọng vào độ linh hoạt và cơ động để người dùng dễ di chuyển hằng ngày. Chiếc máy này sở hữu bộ vi xử lí gen 11 đến từ nhà Intel cho hiệu suất làm việc cao, ổn định. \r\nThiết kế tối giản, gọn gàng với trọng lượng chỉ 1.55 kg.', 8, 'Intel Core i5 Tiger Lake, 1135G7, 2.40 GHz', '14 inch', 15990000, 10, '2020-05-11'),
('SP10', 'LSP4', NULL, 'NSX9', 'MacBook Pro', 'Apple Macbook Pro M1 2020 (Z11C) được nâng cấp với bộ vi xử lý mới cực kỳ mạnh mẽ, con laptop này sẽ phục vụ tốt cho công việc của bạn, đặc biệt bên lĩnh vực đồ họa, kỹ thuật. Chip Apple M1 là một bộ vi xử lý mạnh mẽ, được ra mắt lần đầu tiên trên MAC. Đây là con chip với bộ xử lý 5 nm, tích hợp CPU 8 lõi với 4 lõi CPU tốc độ và và 4 lõi tiết kiệm năng lượng. Nhờ vậy, thời lượng pin của laptop được kéo dài đến tận 10 tiếng đồng hồ, giúp cho bạn thoải mái làm việc với một hiệu suất cực kỳ cao.', 16, 'Apple M1', '13.3 inch', 44990000, 3, '2020-03-16'),
('SP2', 'LSP1', NULL, 'NSX4', 'IdeaPad S145 15IIL', 'Laptop Lenovo IdeaPad S145 15IIL i3 (81W8001XVN) thuộc phân khúc laptop học tập văn phòng cơ bản với mức giá tốt. Máy có cấu hình ổn, đủ chạy các ứng dụng văn phòng phổ biến, điểm nổi bật của Lenovo IdeaPad S145 là ổ cứng SSD siêu nhanh, thiết kế mỏng gọn, tinh tế. Laptop  mang thiết kế cơ bản của dòng Lenovo IdeaPad S145 có ngoại hình đẹp mắt, lớp vỏ được làm bằng nhựa phủ sơn màu xám sang trọng với logo Lenovo được đặt gọn gàng sang một bên trên nắp lưng. Độ dày 17.9 mm, cân nặng 1.79 kg phù hợp với các bạn học sinh sinh viên, người thường xuyên di chuyển.', 4, 'Intel Core i3 Ice Lake, 1005G1, 1.20 GHz', '15.6 inch', 10490000, 7, '2019-07-15'),
('SP3', 'LSP1', NULL, 'NSX3', '15s fq2028TU', 'Đặc điểm nổi bật của HP 15s fq2028TU i5 1135G7/8GB/512GB/Win10 (2Q5Y5PA) HP 15s fq2028TU i5 (2Q5Y5PA) có vẻ ngoài nổi bật với màu bạc thời trang, viền màn hình siêu mỏng. Cấu hình bên trong của máy mới thực sự làm bạn bất ngờ khi đây là chiếc laptop có hiệu năng cực mạnh trong tầm giá. Bộ vi xử lý mạnh mẽ, đáp ứng hoàn hảo công việc văn phòng', 8, 'Intel Core i5 Tiger Lake, 1135G7, 2.40 GHz', '15.6 inch', 16990000, 5, '2020-05-16'),
('SP4', 'LSP1', NULL, 'NSX6', 'Aspire 5 A514 54 33WY', 'Thiết kế tối giản của laptop Acer Aspire 5 với độ mỏng chỉ 17.95 mm, trọng lượng 1.46 kg được hoàn thiện tỉ mỉ với vỏ nhựa và nắp lưng kim loại đem đến vẻ đẳng cấp, sang trọng cho Acer Aspire 5. Đây là một người bạn đồng hành khá lý tưởng cho các bạn học sinh, sinh viên năng động khi có thể cất gọn chiếc laptop vào balo và đi khắp nơi.', 4, 'Intel Core i3 Tiger Lake, 1115G4, 3.00 GHz', '14 inch', 13590000, 14, '2020-02-02'),
('SP5', 'LSP2', NULL, 'NSX2', 'G3 15 3500', 'Laptop Dell G3 15 3500 i5 (70223130) là chiếc laptop gaming thuộc series G của nhà Dell với thiết kế cực ngầu và hiệu năng mạnh mẽ, hứa hẹn sẽ là người bạn đồng hành của các game thủ trong mọi cuộc chiến. Dell G3 15 3500 i5 có thiết kế mạnh mẽ với các đường cắt vuông vức, tone xanh - đen cực kì nổi bật. Máy có độ dày 28.18 mm và trọng lượng 2.56 kg, khá gọn nhẹ đối với một chiếc laptop gaming. Bàn phím trên Dell G3 có đèn nền màu xanh vừa tiện lợi cho việc gõ phím ở nơi thiếu ánh sáng vừa trông ấn tượng hơn. Phần Touchpad được đặt lệch hẳn sang một bên với một đường viền xanh chạy dọc bắt mắt. Máy cũng trang bị một Webcam HD tiện lợi cho các cuộc gọi nhóm, hội họp hoặc các streamer.', 8, 'Intel Core i5 Ice Lake, 10300H, 2.50 GHz', '15.6 inch', 22490000, 3, '2020-02-02'),
('SP6', 'LSP2', NULL, 'NSX5', 'Aspire 7 A715', 'Laptop Acer Aspire 7 A715 42G R4ST R5 (NH.QAYSV.004) có thiết kế đơn giản, trang nhã nhưng trang bị cấu hình mạnh mẽ đáp ứng nhu cầu đồ hoạ, kỹ thuật chuyên nghiệp và chiến game mượt mà. Mẫu laptop này được Acer trang bị card đồ họa rời NVIDIA GeForce GTX 1650 4GB được thiết kế theo kiến trúc Turning hiện đại, đáp ứng tốt nhu cầu làm việc, giải trí. Bạn sẽ không cần phải lo lắng và luôn tràn đầy cảm hứng khi chiến các tựa game phổ biến nhất hiện nay như PUBG, Fornite, GTA V,... ở mức yêu cầu về độ hoạ trung bình và cao (Medium hoặc High).', 8, 'AMD Ryzen 5, 5500U, 2.10 GHz', '15.6 inch', 19990000, 8, '2020-08-02'),
('SP7', 'LSP3', NULL, 'NSX4', 'Gram 15', 'Đặc điểm nổi bật của LG Gram 15 i5 1035G7/8GB/512GB/Win10 (15Z90N-V.AR55A5). Nếu công việc của bạn đòi hỏi phải di chuyển nhiều, bạn muốn sở hữu một chiếc laptop mỏng nhẹ nhưng vẫn đảm bảo cấu hình đủ mạnh để đáp ứng nhu cầu học tập và làm việc, LG Gram 15 i5 (15Z90N-V.AR55A5) chính là một sự lựa chọn tuyệt vời dành cho bạn. Mang trong mình một thiết kế siêu mỏng nhẹ với hợp kim Nano Carbon – Magie bền bỉ, LG Gram 15 có trọng lượng chỉ 1.12 kg, cùng với độ dày chỉ 16.8 mm, chiếc máy này sẵn sàng đáp ứng mọi nhu cầu di chuyển của những người dùng khó tính nhất.', 8, 'Intel Core i5 Ice Lake, 1035G7, 1.20 GHz', '15.6 inch', 32990000, 9, '2020-05-12'),
('SP8', 'LSP3', NULL, 'NSX7', 'MateBook D 15', 'Trải nghiệm làm việc, giải trí mượt mà với laptop Huawei MateBook D 15 R5 (Boh-WAQ9R), cấu hình vượt trội, thiết kế mỏng nhẹ và màn hình tràn viền tuyệt hảo là những gì mà chiếc laptop doanh nhân cao cấp này đem đến. Huawei MateBook D 15 được thiết kế theo phong cách tối giản, toàn bộ phần vỏ và khung máy được làm từ kim loại nguyên khối với tông màu xám không gian sáng bóng, các cạnh được bo tròn mềm mại cho đối phương cảm giác huyền bí, sang trọng khi chiêm ngưỡng. Được chế tác bởi chất liệu kim loại mang lại cảm giác chắc chắn, bền bỉ, Huawei đảm bảo tính cơ động với độ dày chỉ 16.9 mm và trọng lượng chỉ 1.62 kg. ', 8, '	AMD Ryzen 5, 3500U, 2.10 GHz', '15.6 inch', 16490000, 11, '2020-08-10'),
('SP9', 'LSP5', NULL, 'NSX8', 'GL65 Leopard 10SCXK', 'Chiếc laptop MSI GL65 Leopard 10SCXK i7(093VN) chắc chắn sẽ là sự lựa chọn thích hợp dành cho những game thủ với hiệu năng mượt mà với CPU Intel Core i7, NVIDIA GeForce GTX 1650 4GB.Ngay từ vẻ ngoài đã nói lên sự mạnh mẽ của chiếc laptop gaming này với gam màu đen nhám cá tính, những đường cắt độc đáo và logo màu đỏ nổi bật nằm trên mặt lưng kim loại rắn chắc. Bạn hoàn toàn có thể mở máy ra bằng một tay bởi bản lề linh hoạt, cho việc đóng mở máy vô cùng nhẹ nhàng.', 8, 'Intel Core i7 Comet Lake, 10750H, 2.60 GHz', '15.6 inch', 24990000, 4, '2020-01-19');

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
-- Indexes for table `mausac`
--
ALTER TABLE `mausac`
  ADD PRIMARY KEY (`MAMAU`);

--
-- Indexes for table `mausacsanpham`
--
ALTER TABLE `mausacsanpham`
  ADD KEY `MAMAU` (`MAMAU`),
  ADD KEY `MASP` (`MASP`);

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
-- Constraints for table `mausacsanpham`
--
ALTER TABLE `mausacsanpham`
  ADD CONSTRAINT `mausacsanpham_ibfk_1` FOREIGN KEY (`MAMAU`) REFERENCES `mausac` (`MAMAU`),
  ADD CONSTRAINT `mausacsanpham_ibfk_2` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`);

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
