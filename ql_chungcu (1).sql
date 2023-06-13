-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 12, 2023 lúc 11:48 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_chungcu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', '55555');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bophan`
--

CREATE TABLE `bophan` (
  `id` int(11) NOT NULL,
  `ten_bophan` text NOT NULL,
  `kyhieu` text NOT NULL,
  `phong` text NOT NULL,
  `ban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bophan`
--

INSERT INTO `bophan` (`id`, `ten_bophan`, `kyhieu`, `phong`, `ban`) VALUES
(1, 'Bộ phận kinh doanh 2', 'BP KD 1', '3035', 'B13'),
(3, 'Bộ', 'CN 1', 'B667', '22'),
(4, 'Bộ phận kế toán 1', 'KT 1', '203', 'B5');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dm_khudat`
--

CREATE TABLE `dm_khudat` (
  `id` int(11) NOT NULL,
  `ma_khudat` text NOT NULL,
  `ten_khudat` text NOT NULL,
  `loai_nen` text NOT NULL,
  `image` text NOT NULL,
  `dien_tich` int(11) NOT NULL,
  `mo_ta` text NOT NULL,
  `id_duan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dm_khudat`
--

INSERT INTO `dm_khudat` (`id`, `ma_khudat`, `ten_khudat`, `loai_nen`, `image`, `dien_tich`, `mo_ta`, `id_duan`) VALUES
(2, 'khudat160520231033', 'Khu B12', 'Biệt thự song lập', 'nhatho_batt.jpg', 230, 'được dùng vào việc trình bày và dàn trang phục vụ cho in ấn. Lorem Ipsum đã được sử dụng như một văn bản chuẩn cho ngành công nghiệp in ấn từ những năm 1500, khi một họa sĩ vô danh ghép nhiều đoạn văn bản với nhau để tạo thành một bản mẫu văn bản.', 3),
(3, 'khudat160520231045', 'C', 'Biệt thự song lập', 'Sân Mỹ Đình xuống cấp thế nào 2.jpg', 2000, 'Mô tả', 2),
(5, 'khudat160520230255', 'D21', 'Biệt thự song lập', '3bbaeb04-eba4-4657-9388-b327bd42008e.png', 3210, 'được dùng vào việc trình bày và dàn trang phục vụ cho in ấn. Lorem Ipsum đã được sử dụng như một văn bản chuẩn cho ngành công nghiệp in ấn từ những năm 1500, khi một họa sĩ vô danh ghép nhiều đoạn văn bản với nhau để tạo thành một bản mẫu văn bản.', 2),
(6, 'khudat160520231033', 'Khu B12', 'Biệt thự song lập', 'nhatho_batt.jpg', 230, 'được dùng vào việc trình bày và dàn trang phục vụ cho in ấn. Lorem Ipsum đã được sử dụng như một văn bản chuẩn cho ngành công nghiệp in ấn từ những năm 1500, khi một họa sĩ vô danh ghép nhiều đoạn văn bản với nhau để tạo thành một bản mẫu văn bản.', 1),
(7, 'khudat160520231045', 'C', 'Biệt thự song lập', 'Sân Mỹ Đình xuống cấp thế nào 2.jpg', 2000, 'Mô tả', 1),
(8, 'khudat160520230255', 'D21', 'Biệt thự song lập', '3bbaeb04-eba4-4657-9388-b327bd42008e.png', 3210, 'được dùng vào việc trình bày và dàn trang phục vụ cho in ấn. Lorem Ipsum đã được sử dụng như một văn bản chuẩn cho ngành công nghiệp in ấn từ những năm 1500, khi một họa sĩ vô danh ghép nhiều đoạn văn bản với nhau để tạo thành một bản mẫu văn bản.', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dm_lodat`
--

CREATE TABLE `dm_lodat` (
  `id` int(11) NOT NULL,
  `ma_lodat` text NOT NULL,
  `ten_lodat` text NOT NULL,
  `image` text NOT NULL,
  `dien_tich` int(11) NOT NULL,
  `mo_ta` text NOT NULL,
  `id_khudat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dm_lodat`
--

INSERT INTO `dm_lodat` (`id`, `ma_lodat`, `ten_lodat`, `image`, `dien_tich`, `mo_ta`, `id_khudat`) VALUES
(1, 'lodat160520231135', '04', 'Sân Mỹ Đình xuống cấp thế nào 2.jpg', 999, 'được dùng vào việc trình bày và dàn trang phục vụ cho in ấn. Lorem Ipsum đã được sử dụng như một văn bản chuẩn cho ngành công nghiệp in ấn từ những năm 1500, khi một họa sĩ vô danh ghép nhiều đoạn văn bản với nhau để tạo thành một bản mẫu văn bản.', 2),
(2, 'lodat160520231136', '06', 'Ca mắc Covid-19.jpg', 23421, 'Mô tả', 3),
(4, 'lodat160520230256', '21C', 'quang-binh-2.jpg', 333, 'được dùng vào việc trình bày và dàn trang phục vụ cho in ấn. Lorem Ipsum đã được sử dụng như một văn bản chuẩn cho ngành công nghiệp in ấn từ những năm 1500, khi một họa sĩ vô danh ghép nhiều đoạn văn bản với nhau để tạo thành một bản mẫu văn bản.', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dm_nendat`
--

CREATE TABLE `dm_nendat` (
  `id` int(11) NOT NULL,
  `id_khudat` int(11) NOT NULL,
  `id_lodat` int(11) NOT NULL,
  `ten_nendat` text NOT NULL,
  `lo_gioi` int(11) NOT NULL,
  `chieu_dai` int(11) NOT NULL,
  `chieu_rong` int(11) NOT NULL,
  `dien_tich` int(11) NOT NULL,
  `dien_tich_xd` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `so_tang` int(11) NOT NULL,
  `mo_ta` text NOT NULL,
  `image` text NOT NULL,
  `hien_trang` text NOT NULL,
  `id_hd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dm_nendat`
--

INSERT INTO `dm_nendat` (`id`, `id_khudat`, `id_lodat`, `ten_nendat`, `lo_gioi`, `chieu_dai`, `chieu_rong`, `dien_tich`, `dien_tich_xd`, `gia`, `so_tang`, `mo_ta`, `image`, `hien_trang`, `id_hd`) VALUES
(1, 2, 2, '601', 0, 20, 25, 500, 500, 11000, 0, 'null', 'null', 'Chưa bán', 1),
(2, 5, 5, '601', 0, 20, 25, 500, 500, 11000, 0, 'null', 'null', 'Chưa bán', 1),
(3, 3, 2, 'Đất bazan', 0, 20, 20, 400, 400, 10400, 0, 'null', '3bbaeb04-eba4-4657-9388-b327bd42008e.png', 'Chưa bán', 1),
(4, 5, 2, 'Đất bazan 2', 1, 22, 22, 444, 444, 41200, 2, 'null', 'Business_Cadillac-Halo-001 (1).png', 'Đang giao dịch', 1),
(5, 6, 1, 'Đất bazan 3', 0, 0, 0, 0, 0, 0, 0, 'lorem', 'laptop_gaming.jpg', 'Đã bán', 0),
(6, 7, 2, '601', 0, 20, 25, 500, 500, 11000, 0, 'null', 'null', 'Chưa bán', 1),
(7, 5, 5, '601', 0, 20, 25, 500, 500, 11000, 0, 'null', 'null', 'Chưa bán', 1),
(8, 3, 2, 'Đất bazan', 0, 20, 20, 400, 400, 10400, 0, 'null', '3bbaeb04-eba4-4657-9388-b327bd42008e.png', 'Chưa bán', 1),
(9, 7, 2, 'Đất bazan 2', 1, 22, 22, 444, 444, 41200, 2, 'null', 'Business_Cadillac-Halo-001 (1).png', 'Đang giao dịch', 1),
(10, 6, 1, 'Đất bazan 3', 0, 0, 0, 0, 0, 0, 0, 'lorem', 'laptop_gaming.jpg', 'Đã bán', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hd_thanhly`
--

CREATE TABLE `hd_thanhly` (
  `id` int(11) NOT NULL,
  `id_hd` int(11) NOT NULL,
  `giaidoan` int(11) NOT NULL,
  `ten_giaidoan` text NOT NULL,
  `tien_thanhly` bigint(20) NOT NULL,
  `ngay_tratien` date NOT NULL,
  `create_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hd_thanhly`
--

INSERT INTO `hd_thanhly` (`id`, `id_hd`, `giaidoan`, `ten_giaidoan`, `tien_thanhly`, `ngay_tratien`, `create_at`) VALUES
(1, 1, 1, 'Nghèo', 19000000, '2023-06-10', '2023-06-10'),
(2, 1, 2, 'giai đoạn thanh toán 2', 89000000, '2023-06-12', '2023-06-12'),
(3, 0, 3, 'Giai doan 3', 10000000, '2023-06-13', '2023-06-12'),
(4, 1, 3, 'Giai doan 3', 89000000, '2023-06-15', '2023-06-12'),
(5, 1, 4, 'Giai doan 4', 2147483647, '2023-06-18', '2023-06-12'),
(6, 1, 5, '34243434', 2147483647, '2023-06-18', '2023-06-12'),
(7, 1, 6, '', 2147483647, '2023-06-18', '2023-06-12'),
(8, 1, 7, '', 2147483647, '0000-00-00', '2023-06-12'),
(9, 1, 8, '', 2147483647, '0000-00-00', '2023-06-12'),
(10, 1, 9, '', 9000000, '0000-00-00', '2023-06-12'),
(11, 1, 10, '', 2000000000, '0000-00-00', '2023-06-12'),
(12, 1, 11, '', 2147483647, '0000-00-00', '2023-06-12'),
(13, 1, 12, '2342', 2147483647, '0000-00-00', '2023-06-12'),
(14, 1, 13, '', 2147483647, '0000-00-00', '2023-06-12'),
(15, 1, 14, '', 2147483647, '0000-00-00', '2023-06-12'),
(16, 1, 15, '', 2147483647, '0000-00-00', '2023-06-12'),
(17, 1, 16, '', 2147483647, '0000-00-00', '2023-06-12'),
(18, 1, 17, '', 2147483647, '0000-00-00', '2023-06-12'),
(19, 1, 18, '', 2147483647, '0000-00-00', '2023-06-12'),
(20, 1, 19, '', 100000000000, '0000-00-00', '2023-06-12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hopdong`
--

CREATE TABLE `hopdong` (
  `id` int(11) NOT NULL,
  `loai_hopdong` int(11) NOT NULL,
  `so_hopdong` int(11) NOT NULL,
  `id_bophan` int(11) NOT NULL,
  `id_nhamoigioi` int(11) NOT NULL,
  `tien_moigioi` int(11) NOT NULL,
  `ngaylap` date NOT NULL,
  `ngay_giaodat` date NOT NULL,
  `ngaygiao_sodo` date NOT NULL,
  `ghichu` text NOT NULL,
  `vay_nganhang` text NOT NULL,
  `kyhieu` text NOT NULL,
  `congchung` text NOT NULL,
  `id_duan` int(11) NOT NULL,
  `id_nendat` int(11) NOT NULL,
  `giadat` int(11) NOT NULL,
  `gia_hd` int(11) NOT NULL,
  `dientich_hd` int(11) NOT NULL,
  `giadat_usd` int(11) NOT NULL,
  `gia_thucte` int(11) NOT NULL,
  `dientich_thucte` int(11) NOT NULL,
  `tienthue` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `id_nguoigioithieu` int(11) NOT NULL,
  `nguoi_thanhtoan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hopdong`
--

INSERT INTO `hopdong` (`id`, `loai_hopdong`, `so_hopdong`, `id_bophan`, `id_nhamoigioi`, `tien_moigioi`, `ngaylap`, `ngay_giaodat`, `ngaygiao_sodo`, `ghichu`, `vay_nganhang`, `kyhieu`, `congchung`, `id_duan`, `id_nendat`, `giadat`, `gia_hd`, `dientich_hd`, `giadat_usd`, `gia_thucte`, `dientich_thucte`, `tienthue`, `id_khachhang`, `id_nguoigioithieu`, `nguoi_thanhtoan`) VALUES
(1, 1, 1, 1, 2, 2000000, '2023-06-06', '2023-06-07', '2023-06-01', '', 'Không', '', 'Không', 1, 5, 190000000, 70500000, 5000, 9000, 170000000, 4890, 19, 4, 0, 'Không'),
(2, 1, 5, 3, 4, 2100000, '2023-06-06', '2023-06-07', '2023-06-09', 'note', 'Có', 'KHV', 'Có', 3, 1, 10000, 3439999, 3258, 235, 532588, 2350, 12, 5, 0, 'Có'),
(3, 2, 1, 1, 2, 50000000, '2023-06-09', '2023-06-17', '2023-06-18', '', 'Không', 'HIV', 'Không', 1, 5, 60000000, 4000000, 213, 234, 62000000, 200, 15, 4, 0, 'Không'),
(4, 1, 0, 4, 4, 0, '0000-00-00', '0000-00-00', '0000-00-00', '', 'Không', '', 'Không', 3, 1, 0, 0, 0, 0, 0, 0, 0, 5, 0, 'Có'),
(5, 1, 0, 4, 4, 0, '0000-00-00', '0000-00-00', '0000-00-00', '', 'Không', '', 'Không', 3, 1, 0, 0, 0, 0, 0, 0, 0, 5, 0, 'Có'),
(6, 1, 0, 4, 4, 0, '0000-00-00', '0000-00-00', '0000-00-00', '', 'Không', '', 'Không', 3, 1, 0, 0, 0, 0, 0, 0, 0, 5, 0, 'Có'),
(7, 1, 0, 4, 4, 0, '0000-00-00', '0000-00-00', '0000-00-00', '', 'Không', '', 'Không', 3, 1, 0, 0, 0, 0, 0, 0, 0, 5, 0, 'Có'),
(8, 1, 0, 4, 4, 0, '0000-00-00', '0000-00-00', '0000-00-00', '', 'Không', '', 'Không', 3, 1, 0, 0, 0, 0, 0, 0, 0, 5, 0, 'Có'),
(9, 1, 1, 4, 4, 12, '2023-06-10', '2023-06-10', '2023-06-10', '', 'Không', '', 'Không', 3, 1, 23, 23, 23, 2, 23, 23, 23, 5, 0, 'Có'),
(10, 1, 0, 4, 4, 0, '0000-00-00', '0000-00-00', '0000-00-00', '', 'Không', '', 'Không', 3, 1, 0, 0, 0, 0, 0, 0, 0, 5, 0, 'Có'),
(11, 1, 1, 4, 4, 20000000, '2023-06-12', '2023-06-12', '2023-06-12', '', 'Không', '', 'Không', 2, 4, 1200000, 12000000, 213, 2300, 21000000, 211, 11, 5, 0, 'Có');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `ten_kh` text NOT NULL,
  `so_hd` int(11) NOT NULL,
  `ma_phuluc` text NOT NULL,
  `id_nendat` int(11) NOT NULL,
  `id_duan` int(11) NOT NULL,
  `namsinh` date NOT NULL,
  `gioitinh` text NOT NULL,
  `diachi` text NOT NULL,
  `dc_lienlac` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `cmnd` text NOT NULL,
  `ngaycap` date NOT NULL,
  `noicap` text NOT NULL,
  `nghenghiep` text NOT NULL,
  `chucvu` text NOT NULL,
  `trangthai` text NOT NULL,
  `nguoi_thanhtoan` text NOT NULL,
  `create_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `ten_kh`, `so_hd`, `ma_phuluc`, `id_nendat`, `id_duan`, `namsinh`, `gioitinh`, `diachi`, `dc_lienlac`, `email`, `phone`, `cmnd`, `ngaycap`, `noicap`, `nghenghiep`, `chucvu`, `trangthai`, `nguoi_thanhtoan`, `create_at`) VALUES
(4, 'Kh 2', 1, 'A020620230400', 1, 3, '2001-11-26', 'Nam', '344 3/2, q.10, HCM city', '344 3/2, q.10, HCM city', 'levanlam3447@gmail.com', '0359893447', '264190254', '2023-06-02', 'Vũng Tàu', 'Bán vé số lậu', 'Trưởng bang', 'Đang hoạt động mạnh', 'Không', '2023-06-02'),
(5, 'KH 4', 1, 'A050620230114', 3, 2, '2023-06-05', 'Nam', '9912 VIRGINIA 194', '9912 VIRGINIA 194', 'admin@gmail.com', '0123456789', '264190190', '2023-06-05', 'Vũng Tàu', 'Dev', '2023-06-05', '', 'Không', '2023-06-05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhamoigioi`
--

CREATE TABLE `nhamoigioi` (
  `id` int(11) NOT NULL,
  `ten_nmg` text NOT NULL,
  `phone` text NOT NULL,
  `diachi` text NOT NULL,
  `email` text NOT NULL,
  `gioitinh` text NOT NULL,
  `chucvu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhamoigioi`
--

INSERT INTO `nhamoigioi` (`id`, `ten_nmg`, `phone`, `diachi`, `email`, `gioitinh`, `chucvu`) VALUES
(1, 'Nguyễn Văn A', '0123456789', '912 moonwork', 'admin@gmail.com', 'Nam', 'Phó bí thư tập đoàn X'),
(2, 'Nguyễn Văn C', '01234567892', '912 newyork', 'admin1@gmail.com', 'Khác', 'Phó bí thư tập đoàn Y'),
(4, 'Nhà môi giới 3', '0123456789', '', 'admin@gmail.com', 'Nữ', 'Phó bí thư tập đoàn Y');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ql_duan`
--

CREATE TABLE `ql_duan` (
  `id` int(11) NOT NULL,
  `ma_duan` text NOT NULL,
  `ten_duan` text NOT NULL,
  `image` text NOT NULL,
  `mo_ta` text NOT NULL,
  `quy_dinh` text NOT NULL,
  `create_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ql_duan`
--

INSERT INTO `ql_duan` (`id`, `ma_duan`, `ten_duan`, `image`, `mo_ta`, `quy_dinh`, `create_at`) VALUES
(1, 'keri092123', 'Dự án cho thuê xe 3', 'car_content.jpg', 'được dùng vào việc trình bày và dàn trang phục vụ cho in ấn. ', 'được dùng vào việc trình bày và dàn trang phục vụ cho in ấn.', '2023-05-16'),
(2, 'keri092432', 'Dự án bán bánh', 'Pancake hạnh nhân đậu đỏ.jpg', 'được dùng vào việc trình bày và dàn trang phục vụ cho in ấn. ', 'được dùng vào việc trình bày và dàn trang phục vụ cho in ấn. Lorem Ipsum đã được ', '2023-05-16'),
(3, 'keri160520230926', 'Dự án bán yến', 'to_yen_2.png', '', 'được dùng vào việc trình bày và dàn trang phục vụ cho in ấn. Lorem Ipsum đã được sử dụng ', '2023-05-16');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bophan`
--
ALTER TABLE `bophan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dm_khudat`
--
ALTER TABLE `dm_khudat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_duan` (`id_duan`);

--
-- Chỉ mục cho bảng `dm_lodat`
--
ALTER TABLE `dm_lodat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khudat` (`id_khudat`);

--
-- Chỉ mục cho bảng `dm_nendat`
--
ALTER TABLE `dm_nendat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hd_thanhly`
--
ALTER TABLE `hd_thanhly`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhamoigioi`
--
ALTER TABLE `nhamoigioi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ql_duan`
--
ALTER TABLE `ql_duan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `bophan`
--
ALTER TABLE `bophan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `dm_khudat`
--
ALTER TABLE `dm_khudat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `dm_lodat`
--
ALTER TABLE `dm_lodat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `dm_nendat`
--
ALTER TABLE `dm_nendat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `hd_thanhly`
--
ALTER TABLE `hd_thanhly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `nhamoigioi`
--
ALTER TABLE `nhamoigioi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `ql_duan`
--
ALTER TABLE `ql_duan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `dm_khudat`
--
ALTER TABLE `dm_khudat`
  ADD CONSTRAINT `dm_khudat_ibfk_1` FOREIGN KEY (`id_duan`) REFERENCES `ql_duan` (`id`);

--
-- Các ràng buộc cho bảng `dm_lodat`
--
ALTER TABLE `dm_lodat`
  ADD CONSTRAINT `dm_lodat_ibfk_1` FOREIGN KEY (`id_khudat`) REFERENCES `dm_khudat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
