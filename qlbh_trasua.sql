-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 08, 2018 lúc 03:04 PM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlbh_trasua`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `LOGIN_NAME` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `NGAYDKI` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`ID`, `LOGIN_NAME`, `password`, `EMAIL`, `username`, `NGAYDKI`) VALUES
(1, 'admin', 'admin', '', 'admin', '0000-00-00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthd`
--

CREATE TABLE `cthd` (
  `MACHITIET` int(11) NOT NULL,
  `MASP` int(11) NOT NULL,
  `SL` int(11) NOT NULL,
  `DONGIA` float NOT NULL,
  `MAHD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmucsanpham`
--

CREATE TABLE `danhmucsanpham` (
  `LOAISP` int(11) NOT NULL,
  `TENLOAISP` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TINHTRANG` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620 COLLATE=tis620_bin;

--
-- Đang đổ dữ liệu cho bảng `danhmucsanpham`
--

INSERT INTO `danhmucsanpham` (`LOAISP`, `TENLOAISP`, `TINHTRANG`) VALUES
(1, 'Trà Sữa', 'Đang được bán'),
(2, 'Trà Nguyên Chất', 'Đang được bán'),
(3, 'Trà Trái Cây', 'Đang được bán'),
(4, 'Đá Xay', 'Đang được bán'),
(5, 'Toppings', 'Đang được bán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MAHD` int(11) NOT NULL,
  `MATV` int(11) NOT NULL,
  `TONGTIEN` float NOT NULL,
  `TINHTRANG` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PHIVANCHUYEN` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MAHD`, `MATV`, `TONGTIEN`, `TINHTRANG`, `PHIVANCHUYEN`) VALUES
(1, 5, 100000, 'Chưa thanh toán', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `MACHITIET` int(11) NOT NULL,
  `MASP` int(11) NOT NULL,
  `CHIETKHAU` float NOT NULL,
  `NGBATDAU` date NOT NULL,
  `NGKETTHUC` date NOT NULL,
  `TINHTRANG` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MASP` int(11) NOT NULL,
  `LOAISP` int(11) NOT NULL,
  `TENSP` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TRIGIA` int(11) NOT NULL,
  `IMAGE_LINK` varchar(100) NOT NULL,
  `SLTON` int(11) NOT NULL,
  `TINHTRANG` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MASP`, `LOAISP`, `TENSP`, `TRIGIA`, `IMAGE_LINK`, `SLTON`, `TINHTRANG`) VALUES
(1, 1, 'Trà Sữa Trân Châu Đen', 50000, '201-Pearl-Milk-Tea.jpg', 10, ''),
(3, 1, 'Trà Sữa Chatime', 50000, '', 2, ''),
(4, 1, 'Trà Sữa Lá Trà Rang', 55000, 'grape_smoothie.jpg', 2, ''),
(6, 1, 'Trà Sữa Socola', 50000, '208-Superior-Milk-Chocolate.jpg', 10, 'On sale'),
(8, 1, 'Trà Sữa Trà Xanh', 50000, '210-Matcha-Red-Bean-Milk-Tea.jpg', 10, 'On sale'),
(11, 2, 'Trà Olong Sủi Bọt', 40000, '', 4, ''),
(12, 2, 'Trà Xanh Sủi Bọt', 50000, '', 5, ''),
(13, 2, 'Trà Lài', 50000, '', 5, ''),
(14, 2, 'Trà Kumquat', 50000, '', 1, ''),
(15, 2, 'Lục Trà Ichiban', 50000, '', 10, ''),
(16, 3, 'Trà Nho', 129455, '', 4, ''),
(17, 3, 'Trà Nhiệt Đới', 50000, '', 5, ''),
(18, 4, 'Đá Xay Socola-Chuối', 65000, '', 5, ''),
(19, 4, 'Đá Xay Nho', 65000, '', 6, ''),
(20, 4, 'Đá xay Đào', 65000, '', 3, ''),
(31, 4, 'Đá Xay Kiwwi', 65000, 'Kiwi_Straw.jpg', 10, ''),
(32, 5, 'Trân Châu Đen', 50000, 'pearls.jpg', 10, ''),
(33, 5, 'Thạch Trái Cây', 5000, 'rainbown-jelly.jpg', 10, ''),
(34, 5, 'Đậu Đỏ', 5000, 'red-beans.jpg', 10, ''),
(35, 5, 'Trân Châu Trắng', 10000, 'aloe-vera.jpg', 10, ''),
(36, 5, 'Thạch Cà Phê', 10000, 'coffe-jelly.jpg', 10, ''),
(37, 5, 'Thạch dừa', 10000, 'Coconut-jelly.jpg', 10, ''),
(38, 5, 'Sương sáo', 10000, 'grass-jelly.jpg', 10, ''),
(41, 1, 'Trà sữa Kiwi', 5000000, '', 5, ''),
(42, 1, 'Trà sữa Olong', 50000, 'Olong_Tea.jpg', 4, 'On sale'),
(44, 4, '', 40000, '', 10, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `MATV` int(11) NOT NULL,
  `TENTV` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PHAI` int(11) NOT NULL,
  `EMAIL` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DIENTHOAI` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DC` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `NGDANGKY` date NOT NULL,
  `DIEMTICHLUY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`MATV`, `TENTV`, `PHAI`, `EMAIL`, `DIENTHOAI`, `DC`, `PASSWORD`, `NGDANGKY`, `DIEMTICHLUY`) VALUES
(4, 'Đinh Chí Mẫn', 1, 'man@gmail.com', '0976543875', 'Tiền Giang', '111111', '0000-00-00', 0),
(5, 'Trịnh Tú Trung', 0, 'trung@gmail.com', '01234785910', 'Hà Nội', '111111', '0000-00-00', 0),
(6, 'Nguyễn Công Danh', 1, 'danh@gmail.com', '01234987531', 'Chợ Đệm', '111111', '0000-00-00', 0),
(7, 'Nguyễn Văn Tiến', 0, 'tien@gmail.com', '0987654328', 'Bến Lức', '111111', '0000-00-00', 50),
(8, 'Đinh Chí Mẫn', 1, 'man@gmail.com', '0976543875', 'Tiền Giang', '111111', '0000-00-00', 50),
(9, 'Trịnh Tú Trung', 0, 'trung@gmail.com', '01234785910', 'Hà Nội', '111111', '0000-00-00', 50),
(12, 'To Thi Phuong Nguyen', 0, 'nguyen73@gmail.com', '0168992424', '123 Lê Trọng Tấn', 'nguyen', '0000-00-00', 0),
(13, 'FDSFDSF', 0, 'BB@gmail.com', '2323232', '1313131', 'admin', '0000-00-00', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `cthd`
--
ALTER TABLE `cthd`
  ADD PRIMARY KEY (`MACHITIET`),
  ADD KEY `MASP` (`MASP`),
  ADD KEY `MAHD` (`MAHD`);

--
-- Chỉ mục cho bảng `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  ADD PRIMARY KEY (`LOAISP`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MAHD`),
  ADD KEY `MATV` (`MATV`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`MACHITIET`),
  ADD KEY `MASP` (`MASP`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MASP`),
  ADD KEY `LOAISP` (`LOAISP`);

--
-- Chỉ mục cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`MATV`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `cthd`
--
ALTER TABLE `cthd`
  MODIFY `MACHITIET` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  MODIFY `LOAISP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MAHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `MACHITIET` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MASP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `MATV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cthd`
--
ALTER TABLE `cthd`
  ADD CONSTRAINT `FK_CTHD_HD` FOREIGN KEY (`MAHD`) REFERENCES `hoadon` (`MAHD`),
  ADD CONSTRAINT `FK_CTHD_SP` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `FK_HD_TV` FOREIGN KEY (`MATV`) REFERENCES `thanhvien` (`MATV`);

--
-- Các ràng buộc cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD CONSTRAINT `FK_KM_SP` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_SP_LOAISP` FOREIGN KEY (`LOAISP`) REFERENCES `danhmucsanpham` (`LOAISP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
