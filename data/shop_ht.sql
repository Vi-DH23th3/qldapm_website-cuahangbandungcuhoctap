-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 16, 2025 lúc 03:07 AM
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
-- Cơ sở dữ liệu: `shop_ht`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `tendanhmuc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendanhmuc`) VALUES
(1, 'Sản phẩm điện tử'),
(2, 'Dụng cụ học sinh'),
(3, 'Dụng cụ văn phòng'),
(4, 'Sản phẩm giấy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `nguoidung_id` int(11) NOT NULL,
  `diachi` varchar(50) DEFAULT NULL,
  `ngay` datetime NOT NULL DEFAULT current_timestamp(),
  `tongtien` float NOT NULL DEFAULT 0,
  `ghichu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `nguoidung_id`, `diachi`, `ngay`, `tongtien`, `ghichu`) VALUES
(1, 4, 'Cần Thơ', '2025-11-10 10:15:00', 1380000, 'Giao giờ hành chính'),
(2, 5, 'Cần Thơ', '2025-11-11 14:20:00', 225000, 'Gửi kèm hóa đơn'),
(3, 4, 'Chợ Mới, An Giang', '2025-11-12 09:45:00', 486000, 'Giao gấp trong ngày'),
(4, 1, 'Long Xuyên, An Giang', '2025-11-13 08:10:00', 180000, NULL),
(5, 5, 'Đồng Tháp', '2025-11-14 16:30:00', 140700, 'Để trước cửa nếu không có nhà'),
(6, 4, 'Hội An, Chợ Mới, An Giang', '2025-11-16 08:43:43', 738000, NULL),
(7, 4, 'Trường Đại học An Giang', '2025-11-16 08:55:47', 124200, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhangct`
--

CREATE TABLE `donhangct` (
  `id` int(11) NOT NULL,
  `donhang_id` int(11) NOT NULL,
  `mathang_id` int(11) NOT NULL,
  `dongia` float NOT NULL DEFAULT 0,
  `soluong` int(11) NOT NULL DEFAULT 1,
  `thanhtien` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhangct`
--

INSERT INTO `donhangct` (`id`, `donhang_id`, `mathang_id`, `dongia`, `soluong`, `thanhtien`) VALUES
(1, 1, 1, 680000, 1, 680000),
(2, 1, 2, 738000, 1, 738000),
(3, 2, 4, 4500, 10, 45000),
(4, 2, 5, 2700, 50, 135000),
(5, 2, 7, 36000, 1, 36000),
(6, 3, 12, 76500, 2, 153000),
(7, 3, 14, 36000, 3, 108000),
(8, 3, 15, 48600, 5, 243000),
(9, 4, 3, 180000, 1, 180000),
(10, 5, 4, 4500, 3, 13500),
(11, 5, 9, 13500, 2, 27000),
(12, 5, 13, 97200, 1, 97200),
(13, 6, 2, 738000, 1, 738000),
(14, 7, 18, 27000, 1, 27000),
(15, 7, 13, 97200, 1, 97200);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mathang`
--

CREATE TABLE `mathang` (
  `id` int(11) NOT NULL,
  `tenmathang` varchar(255) NOT NULL,
  `mota` text DEFAULT NULL,
  `giagoc` float NOT NULL DEFAULT 0,
  `giaban` float NOT NULL DEFAULT 0,
  `soluongton` int(11) NOT NULL DEFAULT 0,
  `hinhanh` varchar(255) DEFAULT NULL,
  `danhmuc_id` int(11) NOT NULL,
  `luotxem` int(11) NOT NULL DEFAULT 0,
  `luotmua` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `mathang`
--

INSERT INTO `mathang` (`id`, `tenmathang`, `mota`, `giagoc`, `giaban`, `soluongton`, `hinhanh`, `danhmuc_id`, `luotxem`, `luotmua`) VALUES
(1, 'Máy Tính Casio FX-580VN X', 'Máy tính khoa học Casio FX-580VN X, tích hợp 521 tính năng, hỗ trợ học tập và làm bài kiểm tra. Màn hình hiển thị rõ ràng, pin bền, dễ mang đi học.', 750000, 680000, 15, 'images/products/mt1.jpg', 1, 0, 0),
(2, 'Máy Tính Casio FX-880BTG', 'Máy tính Casio fx-880BTG, dòng ClassWiz, kết nối Bluetooth, hỗ trợ QR Code và các chức năng nâng cao, phù hợp học sinh và sinh viên.', 820000, 738000, 9, 'images/products/mt2.jpg', 1, 3, 0),
(3, 'Máy Tính Casio SX-100', 'Máy tính văn phòng Casio SX-100, thiết kế nhỏ gọn, dễ sử dụng, màn hình lớn đọc dữ liệu nhanh.', 200000, 180000, 20, 'images/products/mt3.jpg', 1, 3, 0),
(4, 'Bút Bi Thiên Long TL-123', 'Bút bi Thiên Long TL-123, mực trơn, màu xanh, viết êm, tiện dụng cho học sinh, thiết kế vừa tay cầm.', 5000, 4500, 100, 'images/products/b1.jpg', 2, 0, 0),
(5, 'Bút Chì 2B Staedtler', 'Bút chì 2B Staedtler, chất lượng cao, dễ gọt, đảm bảo nét vẽ đẹp và chuẩn xác.', 3000, 2700, 100, 'images/products/b2.jpg', 2, 0, 0),
(6, 'Hộp Compa 8 Món', 'Bộ compa 8 món, đầy đủ thước, êke, compa, dễ sử dụng cho học sinh, giúp vẽ hình chính xác.', 55000, 50000, 30, 'images/products/b3.jpg', 2, 0, 0),
(7, 'Bút Màu 12 Màu Crayola', 'Bút màu 12 màu Crayola, an toàn cho trẻ em, màu sắc tươi sáng, dễ phối hợp khi vẽ.', 40000, 36000, 50, 'images/products/b4.jpg', 2, 0, 0),
(8, 'Kẹp Giấy King Star', 'Kẹp giấy King Star 50mm, tiện dụng cho văn phòng, giữ giấy gọn gàng, bền bỉ.', 10000, 9000, 50, 'images/products/vp1.jpg', 3, 0, 0),
(9, 'Thước Kẻ 30cm', 'Thước kẻ nhựa 30cm, trong suốt, chia vạch chính xác, tiện cho học sinh và văn phòng.', 15000, 13500, 40, 'images/products/vp2.jpg', 3, 0, 0),
(10, 'Bìa Trình Ký A4', 'Bìa trình ký đôi A4, chất liệu nhựa PP cao cấp, bảo vệ giấy tờ, bền và đẹp.', 52000, 46800, 50, 'images/products/vp3.jpg', 3, 0, 0),
(11, 'Khay Cắm Bút Flexoffice', 'Khay cắm bút Flexoffice, nhựa cao cấp, nhiều ngăn, giúp bàn làm việc gọn gàng, tiện dụng.', 60000, 54000, 30, 'images/products/vp4.jpg', 3, 0, 0),
(12, 'Giấy Photo A4 70gsm', 'Giấy photo A4 70gsm, 500 tờ, độ trắng cao, phù hợp cho in ấn và photocopy.', 85000, 76500, 20, 'images/products/g1.jpg', 4, 0, 0),
(13, 'Giấy Photo Double A A4', 'Giấy photo Double A A4, chất lượng cao, bề mặt láng mịn, thân thiện với môi trường.', 108000, 97200, 19, 'images/products/g2.jpg', 4, 0, 0),
(14, 'Sổ Tay Icon 100 Trang', 'Sổ tay Icon 100 trang, giấy chất lượng, bìa cứng bảo vệ, thuận tiện ghi chép học tập và văn phòng.', 40000, 36000, 30, 'images/products/g3.jpg', 4, 1, 0),
(15, 'Bảng Bộ 2 Mặt A4 - Queen BS-02', 'Bảng học 2 mặt A4, 1 mặt viết phấn, 1 mặt viết lông bảng, kèm bút lông bảng, tiện học tập và giảng dạy.', 54000, 48600, 20, 'images/products/bang.jpg', 2, 0, 0),
(16, 'Bộ Lắp Ghép Mô Hình Kỹ Thuật', 'Bộ lắp ghép mô hình kỹ thuật lớp 4-5, nhiều chi tiết, giúp phát triển tư duy và kỹ năng lắp ráp.', 92000, 82800, 20, 'images/products/ht1.jpg', 2, 0, 0),
(17, 'Thước Bộ Eke - Keyroad KR971430', 'Thước bộ Eke gồm thước thẳng, thước đo góc, 2 thước eke, nhựa cứng, chia vạch chính xác.', 19000, 19000, 20, 'images/products/ht2.jpg', 2, 0, 0),
(18, 'Tập Doraemon Fly A5 96 Trang', 'Tập Doraemon Fly A5 96 trang, 5 ô ly, giấy 120g/m2, bìa màu trắng, thích hợp học sinh tiểu học.', 27000, 27000, 199, 'images/products/ht3.jpg', 4, 0, 0),
(19, 'Bìa Còng 5P F4 Kokuyo', 'Bìa còng 5P F4 Kokuyo, simili cao cấp, bền, màu xanh, tiện lưu trữ tài liệu.', 85000, 76500, 10, 'images/products/vp5.jpg', 3, 0, 0),
(20, 'Bóp Viết Vải Polyester', 'Bóp viết 2 ngăn, chất liệu vải polyester chống thấm, tiện mang theo bút viết và dụng cụ học tập.', 70000, 63000, 20, 'images/products/ht4.jpg', 2, 10, 0),
(21, 'Sổ Diary The Sun', 'Sổ diary The Sun, giấy chất lượng cao, bìa đẹp, thích hợp ghi chép cá nhân và học tập.', 39000, 35100, 50, 'images/products/g4.jpg', 4, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `sodienthoai` varchar(10) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `loai` tinyint(4) NOT NULL DEFAULT 3,
  `trangthai` tinyint(4) NOT NULL DEFAULT 1,
  `hinhanh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `email`, `sodienthoai`, `matkhau`, `hoten`, `loai`, `trangthai`, `hinhanh`) VALUES
(1, 'abc@abc.com', '0988994683', '900150983cd24fb0d6963f7d28e17f72', 'Long Xuyên', 1, 1, 'signup.png'),
(2, 'def@abc.com', '11111111', '900150983cd24fb0d6963f7d28e17f72', 'Mèo máy Doraemon', 2, 1, 'avatar.jpg'),
(3, 'ghi@abc.com', '0988994685', '900150983cd24fb0d6963f7d28e17f72', 'Nhân viên GHI', 2, 1, NULL),
(4, 'kh1@gmail.com', '0988994686', '900150983cd24fb0d6963f7d28e17f72', 'Nguyễn Thị Thu An', 3, 1, NULL),
(5, 'kh2@gmail.com', '0988994687', '900150983cd24fb0d6963f7d28e17f72', 'Hồ Xuân Minh', 3, 1, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguoidung_id` (`nguoidung_id`),
  ADD KEY `diachi_id` (`diachi`);

--
-- Chỉ mục cho bảng `donhangct`
--
ALTER TABLE `donhangct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donhang_id` (`donhang_id`),
  ADD KEY `mathang_id` (`mathang_id`);

--
-- Chỉ mục cho bảng `mathang`
--
ALTER TABLE `mathang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danhmuc_id` (`danhmuc_id`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `donhangct`
--
ALTER TABLE `donhangct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `mathang`
--
ALTER TABLE `mathang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`nguoidung_id`) REFERENCES `nguoidung` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `donhangct`
--
ALTER TABLE `donhangct`
  ADD CONSTRAINT `donhangct_ibfk_1` FOREIGN KEY (`donhang_id`) REFERENCES `donhang` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `donhangct_ibfk_2` FOREIGN KEY (`mathang_id`) REFERENCES `mathang` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `mathang`
--
ALTER TABLE `mathang`
  ADD CONSTRAINT `mathang_ibfk_1` FOREIGN KEY (`danhmuc_id`) REFERENCES `danhmuc` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
