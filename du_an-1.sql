-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 02, 2025 lúc 07:43 PM
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
-- Cơ sở dữ liệu: `du_an-1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `tieu_de` varchar(255) DEFAULT NULL,
  `hinh_anh_url` varchar(255) DEFAULT NULL,
  `mo_ta` text DEFAULT NULL,
  `trang_thai` tinyint(4) DEFAULT 1,
  `ngay_tao` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`id`, `tieu_de`, `hinh_anh_url`, `mo_ta`, `trang_thai`, `ngay_tao`) VALUES
(1, 'Khuyến mãi Tết', 'Array', 'Mừng xuân - Giảm giá cực lớn', 2, '2025-03-18 12:13:01'),
(2, 'Giảm giá cuối tuần', 'images/banner_weekend.jpg', 'Sale 30% toàn bộ sản phẩm cuối tuần', 1, '2025-03-18 12:13:01'),
(3, 'Miễn phí vận chuyển', 'images/banner_ship.jpg', 'Freeship toàn quốc cho đơn trên 500k', 1, '2025-03-18 12:13:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bien_the_san_phams`
--

CREATE TABLE `bien_the_san_phams` (
  `id` int(11) NOT NULL,
  `san_pham_id` int(11) NOT NULL,
  `mau_sac` varchar(50) DEFAULT NULL,
  `kich_thuoc` varchar(50) DEFAULT NULL,
  `gia` float DEFAULT NULL,
  `gia_khuyen_mai` decimal(10,0) DEFAULT NULL,
  `so_luong` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Đang đổ dữ liệu cho bảng `bien_the_san_phams`
--

INSERT INTO `bien_the_san_phams` (`id`, `san_pham_id`, `mau_sac`, `kich_thuoc`, `gia`, `gia_khuyen_mai`, `so_luong`) VALUES
(25, 18, 'Xanh', 'M', 240000, 120000, 10),
(26, 18, 'Xanh', 'S', 180000, 150000, 20),
(33, 18, 'Đỏ ', 'L', 200000, 190000, 20),
(34, 18, 'Đỏ ', 'XL', 30000, 25000, 30),
(35, 26, 'Đen', 'M', 240000, 190000, 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luans`
--

CREATE TABLE `binh_luans` (
  `id` int(11) NOT NULL,
  `san_pham_id` int(11) NOT NULL,
  `tai_khoan_id` int(11) NOT NULL,
  `noi_dung` text NOT NULL,
  `ngay_dang` date NOT NULL,
  `trang_thai` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_hangs`
--

CREATE TABLE `chi_tiet_don_hangs` (
  `id` int(11) NOT NULL,
  `don_hang_id` int(11) NOT NULL,
  `san_pham_id` int(11) NOT NULL,
  `bien_the_san_pham_id` int(11) DEFAULT NULL,
  `so_luong` int(11) NOT NULL,
  `thanh_tien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_don_hangs`
--

INSERT INTO `chi_tiet_don_hangs` (`id`, `don_hang_id`, `san_pham_id`, `bien_the_san_pham_id`, `so_luong`, `thanh_tien`) VALUES
(2, 44, 18, 25, 2, 0),
(3, 45, 18, 25, 1, 120000),
(4, 45, 18, 26, 1, 150000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_gio_hangs`
--

CREATE TABLE `chi_tiet_gio_hangs` (
  `id` int(11) NOT NULL,
  `gio_hang_id` int(11) NOT NULL,
  `san_pham_id` int(11) NOT NULL,
  `bien_the_san_pham_id` int(11) DEFAULT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuc_vus`
--

CREATE TABLE `chuc_vus` (
  `id` int(11) NOT NULL,
  `ten_chuc_vu` varchar(50) NOT NULL
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
  `id` int(11) NOT NULL,
  `ten_danh_muc` varchar(255) NOT NULL,
  `mo_ta` text DEFAULT NULL
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
  `id` int(11) NOT NULL,
  `ma_don_hang` varchar(50) NOT NULL,
  `tai_khoan_id` int(11) NOT NULL,
  `ten_nguoi_nhan` varchar(255) NOT NULL,
  `email_nguoi_nhan` varchar(255) NOT NULL,
  `sdt_nguoi_nhan` varchar(15) NOT NULL,
  `tinh_thanhpho` varchar(100) DEFAULT NULL,
  `huyen_quan` varchar(100) DEFAULT NULL,
  `xa_phuong` varchar(100) DEFAULT NULL,
  `dia_chi_cu_the` varchar(255) DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL,
  `tong_tien` decimal(10,0) NOT NULL,
  `ngay_dat` date NOT NULL,
  `phuong_thuc_thanh_toan_id` int(11) NOT NULL,
  `trang_thai_don_hang_id` int(11) NOT NULL,
  `ma_giam_gia_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hangs`
--

INSERT INTO `don_hangs` (`id`, `ma_don_hang`, `tai_khoan_id`, `ten_nguoi_nhan`, `email_nguoi_nhan`, `sdt_nguoi_nhan`, `tinh_thanhpho`, `huyen_quan`, `xa_phuong`, `dia_chi_cu_the`, `ghi_chu`, `tong_tien`, `ngay_dat`, `phuong_thuc_thanh_toan_id`, `trang_thai_don_hang_id`, `ma_giam_gia_id`) VALUES
(17, 'DH91141', 28, 'Đặng Quang Quyền', 'quuyeu@gmail.com', '928308310', 'Thành phố Hà Nội', 'Quận Hoàn Kiếm', 'Phường Hàng Buồm', 'Số 1 hàng Buồm', 'Giao hàng cẩn thận', 13332, '2025-03-29', 1, 1, NULL),
(21, 'DH98508', 28, 'Đặng Quang Quyền', 'quyendqph31944@fpt.edu.vn', '0354669980', 'Tỉnh Quảng Ninh', 'Huyện Vân Đồn', 'Xã Thắng Lợi', 'ưqeqe', 'ưqeqeq', 430000, '2025-03-29', 2, 1, NULL),
(42, 'DH90937', 28, 'Đặng Quang Quyền', 'quyendqph31944@fpt.edu.vn', '0354669980', 'Thành phố Hà Nội', 'Quận Ba Đình', 'Phường Vĩnh Phúc', 'edada', 'đaadadaad', 380000, '2025-04-02', 1, 1, NULL),
(43, 'DH78012', 28, 'Đặng Quang Quyền', 'quyendqph31944@fpt.edu.vn', '0354669980', 'Tỉnh Bắc Ninh', 'Thị xã Quế Võ', 'Phường Việt Hùng', 'dáddssa', 'dâdada', 55000, '2025-04-02', 1, 1, NULL),
(44, 'DH78543', 28, 'Đặng Quang Quyền', 'quuyeu@gmail.com', '0354669980', 'Tỉnh Bắc Giang', 'Huyện Lục Ngạn', 'Xã Biên Sơn', 'dsdaa', 'addada', 270000, '2025-04-02', 1, 1, NULL),
(45, 'DH20250402193203215', 28, 'Đặng Quang Quyền', 'quyendqph31944@fpt.edu.vn', '0354669980', 'Thành phố Hà Nội', 'Quận Long Biên', 'Phường Bồ Đề', 'sâsas', 'sâsaa', 270000, '2025-04-02', 2, 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hangs`
--

CREATE TABLE `gio_hangs` (
  `id` int(11) NOT NULL,
  `tai_khoan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinh_anh_san_phams`
--

CREATE TABLE `hinh_anh_san_phams` (
  `id` int(11) NOT NULL,
  `san_pham_id` int(11) DEFAULT NULL,
  `bien_the_san_pham_id` int(11) DEFAULT NULL,
  `hinh_anh_bien_the` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Đang đổ dữ liệu cho bảng `hinh_anh_san_phams`
--

INSERT INTO `hinh_anh_san_phams` (`id`, `san_pham_id`, `bien_the_san_pham_id`, `hinh_anh_bien_the`) VALUES
(8, 18, 34, './uploads/1743425408SoftDelete.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lien_hes`
--

CREATE TABLE `lien_hes` (
  `id` int(11) NOT NULL,
  `ho_ten` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `so_dien_thoai` varchar(20) DEFAULT NULL,
  `tieu_de` varchar(200) DEFAULT NULL,
  `trang_thai` tinyint(4) DEFAULT 0,
  `noi_dung` text NOT NULL,
  `thoi_gian_gui` datetime DEFAULT current_timestamp(),
  `tai_khoan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lien_hes`
--

INSERT INTO `lien_hes` (`id`, `ho_ten`, `email`, `so_dien_thoai`, `tieu_de`, `trang_thai`, `noi_dung`, `thoi_gian_gui`, `tai_khoan_id`) VALUES
(25, 'Đặng Quang Quyền', 'quyendqph31944@fpt.edu.vn', '0354669980', 'Hỏi về sản phẩm', 0, 'Sản phẩm đóng gói chưa được tốt mong shop cải thiện', '2025-03-26 04:46:57', NULL),
(26, 'Đặng Quang Quyền', 'quyenthe15052002@gmail.com', '0354669980', 'Hỏi về sản phẩm', 0, 'Sản phẩm đóng gói chưa tốt\r\n', '2025-03-26 04:48:03', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phuong_thuc_thanh_toans`
--

CREATE TABLE `phuong_thuc_thanh_toans` (
  `id` int(11) NOT NULL,
  `ten_phuong_thuc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phuong_thuc_thanh_toans`
--

INSERT INTO `phuong_thuc_thanh_toans` (`id`, `ten_phuong_thuc`) VALUES
(1, 'Thanh toán khi nhận hàng (COD)'),
(2, 'Thanh toán thẻ tín dụng/ghi nợ'),
(3, 'Thanh toán qua ví điện tử MoMo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_phams`
--

CREATE TABLE `san_phams` (
  `id` int(11) NOT NULL,
  `ten_san_pham` varchar(255) NOT NULL,
  `luot_xem` int(11) DEFAULT 0,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `gia_san_pham` float DEFAULT NULL,
  `gia_san_pham_khuyen_mai` float DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `ngay_nhap` date NOT NULL,
  `mo_ta` text DEFAULT NULL,
  `danh_muc_id` int(11) NOT NULL,
  `trang_thai` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_phams`
--

INSERT INTO `san_phams` (`id`, `ten_san_pham`, `luot_xem`, `hinh_anh`, `gia_san_pham`, `gia_san_pham_khuyen_mai`, `so_luong`, `ngay_nhap`, `mo_ta`, `danh_muc_id`, `trang_thai`) VALUES
(18, 'Áo Phông Nam', 0, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 3, 1),
(25, 'Quần Bò Dior Nữ', 0, NULL, 30000, 25000, 30, '2025-03-30', 'Quần Nữ', 4, 1),
(26, 'Áo khoác', 0, NULL, NULL, NULL, NULL, '0000-00-00', NULL, 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoans`
--

CREATE TABLE `tai_khoans` (
  `id` int(11) NOT NULL,
  `ten_tai_khoan` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `anh_dai_dien` varchar(266) DEFAULT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(20) DEFAULT NULL,
  `chuc_vu_id` int(11) DEFAULT NULL,
  `trang_thai` int(11) DEFAULT NULL,
  `ngay_tao` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tai_khoans`
--

INSERT INTO `tai_khoans` (`id`, `ten_tai_khoan`, `email`, `anh_dai_dien`, `mat_khau`, `so_dien_thoai`, `chuc_vu_id`, `trang_thai`, `ngay_tao`) VALUES
(1, 'Tai khoan', 'taikhoan2@gmail.com', '', 'Taikhoan4', '0111035444', 2, 1, '2025-03-15 07:30:47'),
(20, 'Quyen2002433333', 'quyenthe15052002@gmail.com', './uploads/1742151395logo1.jpg', 'Quyen2002', '0354669980', 1, 2, '2025-03-16 11:56:35'),
(21, 'Quyen200233', 'thithu1@gmail.com', './uploads/1742152737food2.jpg', 'quyen2002@', '45454564443', 1, 1, '2025-03-16 12:18:57'),
(23, 'QuyenThế', 'ewrwrw@gmail.com', './uploads/1742196722food2.jpg', 'ueqyqyequ', '89321819384', 2, 2, '2025-03-17 00:32:02'),
(24, 'Quyen20023333', 'quyen@gmail.com', './uploads/1742232048Yellow Creative Noodle Food Promotion Banner .jpg', 'qeqeqqr', '4252523352', 1, 1, '2025-03-17 10:20:48'),
(25, 'Tai khoan3333', 'admin@gmail.com', './uploads/1742315850banner2.jpg', 'Quyen2002@', '0111035', 1, 2, '2025-03-18 09:37:30'),
(27, 'Quyen2002', 'Quyenthe12@gmail.com', '', '2002', '0444933987', 2, 1, '2025-03-22 22:44:52'),
(28, 'Quyen15', 'quyenthe2002@gmail.com', './uploads/1742741251logo.jpg', '2002', '8938284788', 2, 1, '2025-03-22 23:00:32'),
(29, 'quyen', 'quyenthe222@gmail.com', '', 'Quyen2002', '2173897789', 2, 1, '2025-03-24 07:15:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trang_thai_don_hangs`
--

CREATE TABLE `trang_thai_don_hangs` (
  `id` int(11) NOT NULL,
  `ten_trang_thai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trang_thai_don_hangs`
--

INSERT INTO `trang_thai_don_hangs` (`id`, `ten_trang_thai`) VALUES
(1, 'Chờ Xác Nhận'),
(2, 'Đã Xác Nhận'),
(3, 'Đang Giao'),
(4, 'Đã Giao'),
(5, 'Đã Hủy');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bien_the_san_phams`
--
ALTER TABLE `bien_the_san_phams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `san_pham_id` (`san_pham_id`);

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
  ADD KEY `don_hang_id` (`don_hang_id`),
  ADD KEY `san_pham_id` (`san_pham_id`),
  ADD KEY `bien_the_san_pham_id` (`bien_the_san_pham_id`);

--
-- Chỉ mục cho bảng `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_chi_tiet_gio_hang_san_phams` (`san_pham_id`),
  ADD KEY `fk_chi_tiet_gio_hang_gio_hang` (`gio_hang_id`),
  ADD KEY `fk_chi_tiet_gio_hang_bien_the` (`bien_the_san_pham_id`);

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
  ADD KEY `fk_don_hang_trang_thai` (`trang_thai_don_hang_id`),
  ADD KEY `fk_don_hang_tai_khoan` (`tai_khoan_id`),
  ADD KEY `fk_don_hang_phuong_thuc_thanh_toan` (`phuong_thuc_thanh_toan_id`);

--
-- Chỉ mục cho bảng `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_gio_hangs_tai_khoan` (`tai_khoan_id`);

--
-- Chỉ mục cho bảng `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `san_pham_id` (`san_pham_id`),
  ADD KEY `bien_the_san_pham_id` (`bien_the_san_pham_id`);

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
  ADD KEY `fk_tai_khoans_trang_thai_don_hang` (`trang_thai`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `bien_the_san_phams`
--
ALTER TABLE `bien_the_san_phams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `binh_luans`
--
ALTER TABLE `binh_luans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `chuc_vus`
--
ALTER TABLE `chuc_vus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `gio_hangs`
--
ALTER TABLE `gio_hangs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `lien_hes`
--
ALTER TABLE `lien_hes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `tai_khoans`
--
ALTER TABLE `tai_khoans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bien_the_san_phams`
--
ALTER TABLE `bien_the_san_phams`
  ADD CONSTRAINT `bien_the_san_phams_ibfk_1` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `chi_tiet_don_hangs_ibfk_1` FOREIGN KEY (`don_hang_id`) REFERENCES `don_hangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chi_tiet_don_hangs_ibfk_2` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chi_tiet_don_hangs_ibfk_3` FOREIGN KEY (`bien_the_san_pham_id`) REFERENCES `bien_the_san_phams` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  ADD CONSTRAINT `fk_chi_tiet_gio_hang_bien_the` FOREIGN KEY (`bien_the_san_pham_id`) REFERENCES `bien_the_san_phams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_chi_tiet_gio_hang_gio_hang` FOREIGN KEY (`gio_hang_id`) REFERENCES `gio_hangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_chi_tiet_gio_hang_san_phams` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD CONSTRAINT `fk_don_hang_ma_giam_gia` FOREIGN KEY (`ma_giam_gia_id`) REFERENCES `ma_giam_gias` (`id`),
  ADD CONSTRAINT `fk_don_hang_phuong_thuc_thanh_toan` FOREIGN KEY (`phuong_thuc_thanh_toan_id`) REFERENCES `phuong_thuc_thanh_toans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_don_hang_tai_khoan` FOREIGN KEY (`tai_khoan_id`) REFERENCES `tai_khoans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_don_hang_trang_thai` FOREIGN KEY (`trang_thai_don_hang_id`) REFERENCES `trang_thai_don_hangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD CONSTRAINT `fk_gio_hangs_tai_khoan` FOREIGN KEY (`tai_khoan_id`) REFERENCES `tai_khoans` (`id`);

--
-- Các ràng buộc cho bảng `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  ADD CONSTRAINT `hinh_anh_san_phams_ibfk_1` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hinh_anh_san_phams_ibfk_2` FOREIGN KEY (`bien_the_san_pham_id`) REFERENCES `bien_the_san_phams` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `tai_khoans_ibfk_1` FOREIGN KEY (`chuc_vu_id`) REFERENCES `chuc_vus` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
