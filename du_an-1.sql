-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th3 18, 2025 lúc 09:24 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `du_an-1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

CREATE TABLE `banners` (
  `id` int NOT NULL,
  `tieu_de` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinh_anh_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mo_ta` text COLLATE utf8mb4_unicode_ci,
  `trang_thai` tinyint DEFAULT '1',
  `ngay_tao` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`id`, `tieu_de`, `hinh_anh_url`, `mo_ta`, `trang_thai`, `ngay_tao`) VALUES
(1, 'Khuyến mãi Tết', 'images/banner_tet.jpg', 'Mừng xuân - Giảm giá cực lớn', 1, '2025-03-18 12:13:01'),
(2, 'Giảm giá cuối tuần', 'images/banner_weekend.jpg', 'Sale 30% toàn bộ sản phẩm cuối tuần', 1, '2025-03-18 12:13:01'),
(3, 'Miễn phí vận chuyển', 'images/banner_ship.jpg', 'Freeship toàn quốc cho đơn trên 500k', 1, '2025-03-18 12:13:01'),
(4, 'Mở bán sản phẩm mới', 'images/banner_newproduct.jpg', 'Khám phá sản phẩm mới ra mắt', 1, '2025-03-18 12:13:01'),
(5, 'Tặng voucher 100k', 'images/banner_voucher.jpg', 'Đăng ký nhận ưu đãi ngay hôm nay', 1, '2025-03-18 12:13:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luans`
--

CREATE TABLE `binh_luans` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `noi_dung` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_dang` date NOT NULL,
  `trang_thai` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_hangs`
--

CREATE TABLE `chi_tiet_don_hangs` (
  `id` int NOT NULL,
  `don_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `don_gia` decimal(10,2) NOT NULL,
  `so_luong` int NOT NULL,
  `thanh_tien` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_don_hangs`
--

INSERT INTO `chi_tiet_don_hangs` (`id`, `don_hang_id`, `san_pham_id`, `don_gia`, `so_luong`, `thanh_tien`) VALUES
(14, 7, 3, 200000.00, 2, 400000.00),
(15, 7, 5, 150000.00, 1, 150000.00),
(16, 7, 8, 300000.00, 3, 900000.00),
(17, 8, 11, 250000.00, 1, 250000.00),
(18, 8, 3, 180000.00, 2, 360000.00),
(19, 8, 5, 200000.00, 1, 200000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_gio_hangs`
--

CREATE TABLE `chi_tiet_gio_hangs` (
  `id` int NOT NULL,
  `gio_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `so_luong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_gio_hangs`
--

INSERT INTO `chi_tiet_gio_hangs` (`id`, `gio_hang_id`, `san_pham_id`, `so_luong`) VALUES
(6, 1, 5, 20),
(7, 1, 5, 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuc_vus`
--

CREATE TABLE `chuc_vus` (
  `id` int NOT NULL,
  `ten_chuc_vu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chuc_vus`
--

INSERT INTO `chuc_vus` (`id`, `ten_chuc_vu`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_mucs`
--

CREATE TABLE `danh_mucs` (
  `id` int NOT NULL,
  `ten_danh_muc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_mucs`
--

INSERT INTO `danh_mucs` (`id`, `ten_danh_muc`, `mo_ta`) VALUES
(2, 'Áo Phông', 'Danh Mục ÁO Phông'),
(3, 'Danh mục 1', 'Danh muc 1'),
(4, 'Danh mục 2', 'Danh muc 2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hangs`
--

CREATE TABLE `don_hangs` (
  `id` int NOT NULL,
  `ma_don_hang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `ten_nguoi_nhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_nguoi_nhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt_nguoi_nhan` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi_nguoi_nhan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tong_tien` decimal(10,0) NOT NULL,
  `ngay_dat` date NOT NULL,
  `ghi_chu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `phuong_thuc_thanh_toan_id` int NOT NULL,
  `trang_thai_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hangs`
--

INSERT INTO `don_hangs` (`id`, `ma_don_hang`, `tai_khoan_id`, `ten_nguoi_nhan`, `email_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_nguoi_nhan`, `tong_tien`, `ngay_dat`, `ghi_chu`, `phuong_thuc_thanh_toan_id`, `trang_thai_id`) VALUES
(7, '2333', 20, 'Quyền', 'qyte@dmsada.com', '0454564564', 'hà nội', 545646, '2025-03-17', 'sdadaada', 2, 1),
(8, '2333', 20, 'Quyền', 'qyte@dmsada.com', '0454564564', 'hà nội', 545646, '2025-03-17', 'sdadaada', 2, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hangs`
--

CREATE TABLE `gio_hangs` (
  `id` int NOT NULL,
  `tai_khoan_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gio_hangs`
--

INSERT INTO `gio_hangs` (`id`, `tai_khoan_id`) VALUES
(1, 101),
(2, 102),
(3, 103),
(4, 104),
(5, 105);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinh_anh_san_phams`
--

CREATE TABLE `hinh_anh_san_phams` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `link_hinh_anh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lien_hes`
--

CREATE TABLE `lien_hes` (
  `id` int NOT NULL,
  `ho_ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_dien_thoai` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tieu_de` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trang_thai` tinyint DEFAULT '0',
  `noi_dung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoi_gian_gui` datetime DEFAULT CURRENT_TIMESTAMP,
  `tai_khoan_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lien_hes`
--

INSERT INTO `lien_hes` (`id`, `ho_ten`, `email`, `so_dien_thoai`, `tieu_de`, `trang_thai`, `noi_dung`, `thoi_gian_gui`, `tai_khoan_id`) VALUES
(7, 'Nguyễn Văn A', 'vana@example.com', '0912345678', 'Hỏi về sản phẩm', 1, 'Sản phẩm này còn hàng không?', '2025-03-18 01:33:01', 15),
(8, 'Trần Thị B', 'thib@example.com', '0987654321', 'Góp ý dịch vụ', 0, 'Tôi muốn góp ý về dịch vụ giao hàng.', '2025-03-18 01:33:01', 20),
(9, 'Lê Văn C', 'levan@example.com', '454546464654', 'Báo lỗi website', 0, 'Khi đăng nhập bị lỗi 500.', '2025-03-18 01:33:01', 21);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phuong_thuc_thanh_toans`
--

CREATE TABLE `phuong_thuc_thanh_toans` (
  `id` int NOT NULL,
  `ten_phuong_thuc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phuong_thuc_thanh_toans`
--

INSERT INTO `phuong_thuc_thanh_toans` (`id`, `ten_phuong_thuc`) VALUES
(1, 'Tiền mặt'),
(2, 'Chuyển khoản ngân hàng'),
(3, 'Thanh toán qua ví điện tử'),
(4, 'Thanh toán thẻ tín dụng/ghi nợ'),
(5, 'Thanh toán khi nhận hàng (COD)');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_phams`
--

CREATE TABLE `san_phams` (
  `id` int NOT NULL,
  `ten_san_pham` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia_san_pham` decimal(10,0) NOT NULL,
  `gia_khuyen_mai` decimal(10,0) DEFAULT NULL,
  `hinh_anh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_luong` int NOT NULL,
  `luot_xem` int DEFAULT '0',
  `ngay_nhap` date NOT NULL,
  `mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `danh_muc_id` int NOT NULL,
  `trang_thai` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_phams`
--

INSERT INTO `san_phams` (`id`, `ten_san_pham`, `gia_san_pham`, `gia_khuyen_mai`, `hinh_anh`, `so_luong`, `luot_xem`, `ngay_nhap`, `mo_ta`, `danh_muc_id`, `trang_thai`) VALUES
(3, 'Quần Bò Dior Nữ', 20000000, 10000000, 'Chất liệu nhập khẩu, mặc thoải mái', 15, 30, '2025-03-11', '', 2, 1),
(5, 'Sản Phẩm 1', 20203, 190000, './uploads/1741972885bun-trộn-thập-cẩm-recipe-main-photo.jpg', 20, 0, '2025-03-16', 'san pham 1', 3, 1),
(6, 'Sản Phẩm 1', 2323323, 444444, './uploads/1742027145110-hinh-anh-tra-sua-dep-ngon-mat-nhin-ma-phat-them-919-1.jpg', 44, 0, '2025-03-14', '44444', 2, 1),
(8, 'Sản Phẩm 1', 232323, 33333, './uploads/1742029397bun-trộn-thập-cẩm-recipe-main-photo.jpg', 22, 0, '2025-03-13', '111', 2, 1),
(11, 'Sản Phẩm 1', 23232323, 4444, './uploads/1742193347cart.jpg', 22, 0, '2025-03-17', '', 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoans`
--

CREATE TABLE `tai_khoans` (
  `id` int NOT NULL,
  `ten_tai_khoan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `anh_dai_dien` varchar(266) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_khau` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_dien_thoai` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chuc_vu_id` int DEFAULT NULL,
  `trang_thai_don_hang_id` int DEFAULT NULL,
  `ngay_tao` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tai_khoans`
--

INSERT INTO `tai_khoans` (`id`, `ten_tai_khoan`, `email`, `anh_dai_dien`, `mat_khau`, `so_dien_thoai`, `chuc_vu_id`, `trang_thai_don_hang_id`, `ngay_tao`) VALUES
(15, 'Tai khoan', 'taikhoan2@gmail.com', '', 'Taikhoan4', '0111035444', 2, 7, '2025-03-15 07:30:47'),
(19, 'Tai khoan4343', 'taikhoa2n2@gmail.com', './uploads/1742235659bab64cc4b981d7e377f93768236ffdfa.jpg', 'Taikhoaen4', '011103544444', 1, 7, '2025-03-15 07:30:47'),
(20, 'Quyen2002', 'quyenthe15052002@gmail.com', './uploads/1742151395logo1.jpg', 'Quyen2002', '0354669980', 1, NULL, '2025-03-16 11:56:35'),
(21, 'Quyen200233', 'thithu1@gmail.com', './uploads/1742152737food2.jpg', 'quyen2002@', '45454564', 1, NULL, '2025-03-16 12:18:57'),
(23, 'QuyenThế', 'ewrwrw@gmail.com', './uploads/1742196722food2.jpg', 'ueqyqyequ', '89321819384', 1, NULL, '2025-03-17 00:32:02'),
(24, 'Quyen2002', 'quyen@gmail.com', './uploads/1742232048Yellow Creative Noodle Food Promotion Banner .jpg', 'qeqeqqr', '4252523352', 1, NULL, '2025-03-17 10:20:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trang_thai_don_hangs`
--

CREATE TABLE `trang_thai_don_hangs` (
  `id` int NOT NULL,
  `ten_trang_thai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trang_thai_don_hangs`
--

INSERT INTO `trang_thai_don_hangs` (`id`, `ten_trang_thai`) VALUES
(1, 'Chờ Xác Nhận'),
(3, 'Đã Xác Nhận'),
(5, 'Đang Giao'),
(7, 'Đã Giao'),
(9, 'Đã Hủy');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_binh_luan_san_phams` (`san_pham_id`),
  ADD KEY `fk_binh_luan_tai_khoan` (`tai_khoan_id`);

--
-- Chỉ mục cho bảng `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_chi_tiet_don_hang_don_hang` (`don_hang_id`),
  ADD KEY `fk_chi_tiet_don_hang_san_pham` (`san_pham_id`);

--
-- Chỉ mục cho bảng `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_chi_tiet_gio_hang_san_phams` (`san_pham_id`),
  ADD KEY `fk_chi_tiet_gio_hang_gio_hang` (`gio_hang_id`);

--
-- Chỉ mục cho bảng `chuc_vus`
--
ALTER TABLE `chuc_vus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danh_mucs`
--
ALTER TABLE `danh_mucs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_don_hang_trang_thai` (`trang_thai_id`),
  ADD KEY `fk_don_hang_tai_khoan` (`tai_khoan_id`),
  ADD KEY `fk_don_hang_phuong_thuc_thanh_toan` (`phuong_thuc_thanh_toan_id`);

--
-- Chỉ mục cho bảng `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_san_pham_anh_san_pham` (`san_pham_id`);

--
-- Chỉ mục cho bảng `lien_hes`
--
ALTER TABLE `lien_hes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tai_khoan_id` (`tai_khoan_id`);

--
-- Chỉ mục cho bảng `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `san_phams`
--
ALTER TABLE `san_phams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_san_phams_danh_muc` (`danh_muc_id`);

--
-- Chỉ mục cho bảng `tai_khoans`
--
ALTER TABLE `tai_khoans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `so_dien_thoai` (`so_dien_thoai`),
  ADD KEY `chuc_vu_id` (`chuc_vu_id`),
  ADD KEY `fk_tai_khoans_trang_thai_don_hang` (`trang_thai_don_hang_id`);

--
-- Chỉ mục cho bảng `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `binh_luans`
--
ALTER TABLE `binh_luans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `chuc_vus`
--
ALTER TABLE `chuc_vus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `gio_hangs`
--
ALTER TABLE `gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lien_hes`
--
ALTER TABLE `lien_hes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tai_khoans`
--
ALTER TABLE `tai_khoans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD CONSTRAINT `fk_binh_luan_san_phams` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_binh_luan_tai_khoan` FOREIGN KEY (`tai_khoan_id`) REFERENCES `tai_khoans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD CONSTRAINT `fk_chi_tiet_don_hang_don_hang` FOREIGN KEY (`don_hang_id`) REFERENCES `don_hangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_chi_tiet_don_hang_san_pham` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_chitiet_donhang` FOREIGN KEY (`don_hang_id`) REFERENCES `don_hangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  ADD CONSTRAINT `fk_chi_tiet_gio_hang_gio_hang` FOREIGN KEY (`gio_hang_id`) REFERENCES `gio_hangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_chi_tiet_gio_hang_san_phams` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD CONSTRAINT `fk_don_hang_phuong_thuc_thanh_toan` FOREIGN KEY (`phuong_thuc_thanh_toan_id`) REFERENCES `phuong_thuc_thanh_toans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_don_hang_tai_khoan` FOREIGN KEY (`tai_khoan_id`) REFERENCES `tai_khoans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_don_hang_trang_thai` FOREIGN KEY (`trang_thai_id`) REFERENCES `trang_thai_don_hangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  ADD CONSTRAINT `fk_san_pham_anh_san_pham` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `lien_hes`
--
ALTER TABLE `lien_hes`
  ADD CONSTRAINT `lien_hes_ibfk_1` FOREIGN KEY (`tai_khoan_id`) REFERENCES `tai_khoans` (`id`);

--
-- Các ràng buộc cho bảng `san_phams`
--
ALTER TABLE `san_phams`
  ADD CONSTRAINT `fk_san_phams_danh_muc` FOREIGN KEY (`danh_muc_id`) REFERENCES `danh_mucs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tai_khoans`
--
ALTER TABLE `tai_khoans`
  ADD CONSTRAINT `fk_tai_khoans_trang_thai_don_hang` FOREIGN KEY (`trang_thai_don_hang_id`) REFERENCES `trang_thai_don_hangs` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tai_khoans_ibfk_1` FOREIGN KEY (`chuc_vu_id`) REFERENCES `chuc_vus` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
