-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 20, 2025 lúc 06:52 AM
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
-- Cấu trúc bảng cho bảng `bai_viets`
--

CREATE TABLE `bai_viets` (
  `id` int(11) NOT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `tieu_de` varchar(255) NOT NULL,
  `bai_viet` text NOT NULL,
  `tac_gia` varchar(100) DEFAULT NULL,
  `ngay_tao_bai_viet` datetime DEFAULT current_timestamp(),
  `trang_thai` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Đang đổ dữ liệu cho bảng `bai_viets`
--

INSERT INTO `bai_viets` (`id`, `hinh_anh`, `tieu_de`, `bai_viet`, `tac_gia`, `ngay_tao_bai_viet`, `trang_thai`) VALUES
(1, './uploads/1744805776HodiMixi1.webp', 'bannner 444555', 'Bài viết này của đặng quang quyền', 'Đặng Quang Quyền', '2025-04-16 14:16:16', 1),
(3, './uploads/1745046972baner_coc2.jpg', 'bannner 444555', 'fkdjflkjfkjslfjsd', 'Đặng Quang Quyền', '2025-04-19 09:16:12', 1),
(4, './uploads/1745056246baner_coc2.jpg', 'Hỏi về sản phẩm', 'gitsdsjak', 'djkdjsk', '2025-04-19 11:50:46', 1);

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
(0, 'Khuyến mãi Tết', './uploads/1745050063banner5.webp', 'Mừng xuân - Giảm giá cực lớn', 1, '2025-03-18 12:13:01'),
(1, 'Miễn phí vận chuyển', './uploads/1745050153baner_coc2.jpg', 'Freeship toàn quốc cho đơn trên 500k', 1, '2025-03-18 12:13:01'),
(2, 'bannner 444555', './uploads/1745064518banner4.webp', '', 1, '2025-04-19 14:05:54');

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
(25, 18, 'Xanh', 'M', 240000, 120000, 7),
(26, 18, 'Xanh', 'S', 180000, 150000, 16),
(33, 18, 'Đỏ ', 'L', 200000, 190000, 20),
(34, 18, 'Đỏ ', 'XL', 30000, 25000, 30),
(35, 26, 'Đen', 'M', 240000, 190000, 4),
(36, 48, '', 'M', 120000, 100000, 7),
(37, 48, 'Đỏ', '', 200000, 15000, 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luans`
--

CREATE TABLE `binh_luans` (
  `id` int(11) NOT NULL,
  `san_pham_id` int(11) NOT NULL,
  `tai_khoan_id` int(11) NOT NULL,
  `noi_dung` text NOT NULL,
  `danh_gia` int(11) DEFAULT NULL,
  `ngay_dang` date NOT NULL,
  `trang_thai` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binh_luans`
--

INSERT INTO `binh_luans` (`id`, `san_pham_id`, `tai_khoan_id`, `noi_dung`, `danh_gia`, `ngay_dang`, `trang_thai`) VALUES
(10, 44, 28, 'sản phẩm chất lượng cao\r\n', 5, '2025-04-16', 1);

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
(29, 86, 43, NULL, 1, 120000),
(30, 87, 18, 26, 1, 150000),
(31, 88, 26, 35, 5, 950000),
(32, 89, 26, 35, 1, 190000),
(33, 90, 25, NULL, 4, 100000),
(34, 91, 26, 35, 1, 190000),
(35, 92, 18, 25, 1, 120000),
(36, 93, 48, 36, 2, 200000),
(37, 94, 48, 36, 1, 100000),
(38, 95, 48, 36, 2, 200000),
(39, 96, 26, 35, 1, 190000);

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

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_gio_hangs`
--

INSERT INTO `chi_tiet_gio_hangs` (`id`, `gio_hang_id`, `san_pham_id`, `bien_the_san_pham_id`, `so_luong`) VALUES
(87, 46, 48, 36, 1),
(93, 51, 48, 36, 3),
(95, 53, 48, 37, 1);

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
(3, 'Danh mục đặc biệt', 'Danh muc 1'),
(4, 'Danh mục 2', 'Danh muc 2'),
(5, 'Cốc Bình', 'Cốc  Bình\r\n'),
(6, 'Đồ Thu Đông', 'Đồ thu đông'),
(7, 'Đồ Xuân Hè', '\r\n'),
(8, 'Đồ Lưu Niệm', '');

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
  `ma_giam_gia_id` int(11) DEFAULT NULL,
  `tien_giam` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hangs`
--

INSERT INTO `don_hangs` (`id`, `ma_don_hang`, `tai_khoan_id`, `ten_nguoi_nhan`, `email_nguoi_nhan`, `sdt_nguoi_nhan`, `tinh_thanhpho`, `huyen_quan`, `xa_phuong`, `dia_chi_cu_the`, `ghi_chu`, `tong_tien`, `ngay_dat`, `phuong_thuc_thanh_toan_id`, `trang_thai_don_hang_id`, `ma_giam_gia_id`, `tien_giam`) VALUES
(86, 'DH20250418175456496', 28, 'Quyen15', 'quyenthe2002@gmail.com', '8938284788', 'Thành phố Hà Nội', 'Huyện Đông Anh', 'Xã Việt Hùng', 'kdjks', 'dsjsk', 120000, '2025-04-18', 1, 4, NULL, 0),
(87, 'DH20250418180422243', 28, 'Quyen15', 'quyenthe2002@gmail.com', '8938284788', 'Thành phố Hà Nội', 'Thị xã Sơn Tây', 'Phường Trung Sơn Trầm', 'wejwlq', 'wlek', 150000, '2025-04-18', 1, 5, NULL, 0),
(88, 'DH20250418183308372', 28, 'Quyen15', 'quyenthe2002@gmail.com', '8938284788', 'Tỉnh Bắc Giang', 'Thị Xã Việt Yên', 'Phường Ninh Sơn', 'sdjks', 'jsdjskd', 980000, '2025-04-18', 1, 4, NULL, 0),
(89, 'DH20250418191048923', 28, 'Quyen15', 'quyenthe2002@gmail.com', '8938284788', 'Tỉnh Hưng Yên', 'Huyện Kim Động', 'Thị trấn Lương Bằng', 'sdsjd', 'dskjdsk', 220000, '2025-04-18', 1, 4, NULL, 0),
(90, 'DH20250419115139136', 28, 'Quyen15', 'quyenthe2002@gmail.com', '8938284788', 'Tỉnh Bắc Ninh', 'Thị xã Thuận Thành', 'Xã Nghĩa Đạo', 'dsdada', 'dskjdskj', 100000, '2025-04-19', 1, 4, NULL, 0),
(91, 'DH20250419132112297', 28, 'Quyen15', 'quyenthe2002@gmail.com', '8938284788', 'Thành phố Hà Nội', 'Huyện Mê Linh', 'Xã Văn Khê', 'SDLDKA', 'SLDKSDA', 133000, '2025-04-19', 1, 1, NULL, 0),
(92, 'DH20250419182837449', 50, 'quyendang', 'quyen.dang@sotatek.com', '0974382789', 'Tỉnh Sơn La', 'Huyện Mai Sơn', 'Xã Cò  Nòi', 'dskadj', 'jdskjdskj', 150000, '2025-04-19', 3, 1, NULL, 0),
(93, 'DH20250419183853996', 50, 'quyendang', 'quyen.dang@sotatek.com', '0974382789', 'Tỉnh Lạng Sơn', 'Huyện Hữu Lũng', 'Xã Cai Kinh', 'dsjhjadhja', 'hdsjhd', 230000, '2025-04-19', 3, 1, NULL, 0),
(94, 'DH20250419185501932', 50, 'quyendang', 'quyen.dang@sotatek.com', '0974382789', 'Tỉnh Lạng Sơn', 'Huyện Chi Lăng', 'Xã Nhân Lý', 'sdjakj', 'djskajk', 130000, '2025-04-19', 3, 1, NULL, 0),
(95, 'DH20250419193010968', 50, 'quyendang', 'quyen.dang@sotatek.com', '0974382789', 'Tỉnh Bắc Ninh', 'Thị xã Thuận Thành', 'Xã Nguyệt Đức', 'skajjdak', 'dskjdkaaj', 230000, '2025-04-19', 1, 1, NULL, 0),
(96, 'DH20250419194832823', 51, 'quyendang1', 'quyen.dang1@sotatek.com', '0984398898', 'Thành phố Hà Nội', 'Quận Ba Đình', 'Phường Phúc Xá', 'dshkdj', 'jdskjd', 190000, '2025-04-19', 1, 1, NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hangs`
--

CREATE TABLE `gio_hangs` (
  `id` int(11) NOT NULL,
  `tai_khoan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gio_hangs`
--

INSERT INTO `gio_hangs` (`id`, `tai_khoan_id`) VALUES
(46, 28),
(51, 50),
(53, 51);

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
(8, 18, 34, './uploads/1743425408SoftDelete.jpg'),
(11, NULL, 36, './uploads/1745000862ao3lo5.webp'),
(12, NULL, 37, './uploads/1745058028Boni1.webp');

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
(26, 'Đặng Quang Quyền', 'quyenthe15052002@gmail.com', '0354669980', 'Hỏi về sản phẩm', 1, 'Sản phẩm đóng gói chưa tốt\r\n', '2025-03-26 04:48:03', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ma_giam_gias`
--

CREATE TABLE `ma_giam_gias` (
  `id` int(11) NOT NULL,
  `ma_khuyen_mai` varchar(50) DEFAULT NULL,
  `mo_ta` text DEFAULT NULL,
  `loai` enum('phan_tram','tien_mat') DEFAULT NULL,
  `gia_tri` float DEFAULT NULL,
  `dieu_kien_toi_thieu` float DEFAULT NULL,
  `so_lan_su_dung` int(11) DEFAULT 1,
  `so_lan_da_dung` int(11) DEFAULT 0,
  `ngay_bat_dau` datetime DEFAULT NULL,
  `ngay_ket_thuc` datetime DEFAULT NULL,
  `trang_thai` tinyint(1) DEFAULT 1,
  `tai_khoan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Đang đổ dữ liệu cho bảng `ma_giam_gias`
--

INSERT INTO `ma_giam_gias` (`id`, `ma_khuyen_mai`, `mo_ta`, `loai`, `gia_tri`, `dieu_kien_toi_thieu`, `so_lan_su_dung`, `so_lan_da_dung`, `ngay_bat_dau`, `ngay_ket_thuc`, `trang_thai`, `tai_khoan_id`) VALUES
(2, 'PH50000', 'Đây là mgg', 'tien_mat', 50000, 149998, 2, 0, '2025-04-14 19:37:00', '2025-04-30 19:37:00', 1, 28),
(3, 'PH30%', 'Mô tả', 'phan_tram', 30, 100000, 2, 0, '2025-04-14 21:30:00', '2025-04-30 21:30:00', 1, 28),
(6, 'PH50%', 'mgg', 'phan_tram', 50, 250000, 1, 0, '2025-04-19 15:06:00', '2025-04-26 15:06:00', 1, 28);

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
  `gia_nhap` float DEFAULT NULL,
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

INSERT INTO `san_phams` (`id`, `ten_san_pham`, `luot_xem`, `hinh_anh`, `gia_nhap`, `gia_san_pham`, `gia_san_pham_khuyen_mai`, `so_luong`, `ngay_nhap`, `mo_ta`, `danh_muc_id`, `trang_thai`) VALUES
(18, 'Áo Phông Nam', 0, NULL, 50000, 100000, NULL, NULL, '0000-00-00', NULL, 3, 1),
(25, 'Quần Bò Dior Nữ', 0, NULL, 200000, 300000, 25000, 26, '2025-03-30', 'Quần Nữ', 4, 1),
(26, 'Áo khoác', 0, NULL, 250000, NULL, NULL, NULL, '0000-00-00', NULL, 2, 1),
(38, 'Áo 3 Lỗ', 0, './uploads/1744374300ao3lo1.webp', 50000, 0, 0, 0, '2025-04-11', '', 7, 1),
(40, 'Cốc Giữ Nhiệt', 0, './uploads/1744374383cocmo5.webp', 60000, 0, 0, 0, '2025-04-11', '', 5, 1),
(41, 'Đồ Bộ ', 0, './uploads/1744607134ao3lo5.webp', 150000, 0, 0, 0, '2025-04-11', '', 7, 1),
(43, 'Đồ Bộ Có Logo', 0, './uploads/1744607146baner_coc2.jpg', 60000, 120000, 0, -1, '2025-04-11', '', 7, 1),
(44, 'Cốc Trà Sữa', 0, './uploads/1744607316ao3lo5.webp', 100000, 100000, 0, 19, '2025-04-11', '', 5, 1),
(48, 'Quần Bò Dior Nữ', 0, './uploads/1745000586ao3lo5.webp', 837432, 0, 0, 0, '2025-04-18', '', 3, 1),
(49, 'Quần Bò Dior Nam', 0, './uploads/1745000014ao3lo4.webp', 58888, 100000, 0, 20, '2025-04-18', '', 3, 1);

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
(1, 'Tai khoan', 'taikhoan2@gmail.com', './uploads/1745043061baner_coc2.jpg', 'Taikhoan4', '0354669979', 2, 1, '2025-03-15 07:30:47'),
(20, 'Quyen2002433333', 'quyenthe15052002@gmail.com', './uploads/1745030260aaa.webp', '123456', '0354669980', 1, 1, '2025-03-16 11:56:35'),
(21, 'Quyen2002', 'thithu1@gmail.com', './uploads/1745001574aaa.webp', 'quyen2002@', '45454564443', 1, 1, '2025-03-16 12:18:57'),
(23, 'QuyenThế', 'ewrwrw@gmail.com', './uploads/1745030952aaa.webp', 'ueqyqyequ', '89321819384', 2, 1, '2025-03-17 00:32:02'),
(24, 'Quyen20023333', 'quyen@gmail.com', './uploads/1745030280coc_snecker2.webp', '2002', '4252523352', 1, 1, '2025-03-17 10:20:48'),
(25, 'Tai khoan3333', 'admin@gmail.com', './uploads/1745010713aaa.webp', '$2y$10$Z7s8oXxX/2EcEuvvuh6Al.ExeilPhsdoXWZgFLYJn3tV63X5rIYWa', '0111035', 1, 1, '2025-03-18 09:37:30'),
(27, 'Quyen2002', 'Quyenthe12@gmail.com', './uploads/1745030975aaa.webp', '2002', '0444933987', 2, 1, '2025-03-22 22:44:52'),
(28, 'Quyen15', 'quyenthe2002@gmail.com', 'Array', '2002', '8938284788', 2, 1, '2025-03-22 23:00:32'),
(29, 'quyen', 'quyenthe222@gmail.com', './uploads/1745044167ao3lo4.webp', 'Quyen2002', '2173897789', 2, 0, '2025-03-24 07:15:28'),
(50, 'quyendang', 'quyen.dang@sotatek.com', './uploads/1745076714ao3lo2.webp', '2002', '0974382789', 2, 1, '2025-04-19 10:24:41'),
(51, 'quyendang1', 'quyen.dang1@sotatek.com', './uploads/1745084894aaa.webp', '2002', '0984398898', 2, 1, '2025-04-19 12:47:33');

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
(5, 'Đã Hủy'),
(6, 'Trả Hàng');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bai_viets`
--
ALTER TABLE `bai_viets`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `fk_don_hang_phuong_thuc_thanh_toan` (`phuong_thuc_thanh_toan_id`),
  ADD KEY `ma_giam_gia_id` (`ma_giam_gia_id`);

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
-- Chỉ mục cho bảng `ma_giam_gias`
--
ALTER TABLE `ma_giam_gias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ma` (`ma_khuyen_mai`),
  ADD KEY `fk_ma_giam_gia_tai_khoan` (`tai_khoan_id`);

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
-- AUTO_INCREMENT cho bảng `bai_viets`
--
ALTER TABLE `bai_viets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `bien_the_san_phams`
--
ALTER TABLE `bien_the_san_phams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `binh_luans`
--
ALTER TABLE `binh_luans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT cho bảng `chuc_vus`
--
ALTER TABLE `chuc_vus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT cho bảng `gio_hangs`
--
ALTER TABLE `gio_hangs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `lien_hes`
--
ALTER TABLE `lien_hes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `ma_giam_gias`
--
ALTER TABLE `ma_giam_gias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `tai_khoans`
--
ALTER TABLE `tai_khoans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  ADD CONSTRAINT `don_hangs_ibfk_1` FOREIGN KEY (`ma_giam_gia_id`) REFERENCES `ma_giam_gias` (`id`),
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
-- Các ràng buộc cho bảng `ma_giam_gias`
--
ALTER TABLE `ma_giam_gias`
  ADD CONSTRAINT `fk_ma_giam_gia_tai_khoan` FOREIGN KEY (`tai_khoan_id`) REFERENCES `tai_khoans` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

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
