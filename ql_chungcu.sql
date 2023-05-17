-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 17, 2023 lúc 05:07 AM
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
(2, 'khudat160520231033', 'Khu B12', 'Biệt thự song lập', 'nhatho_batt.jpg', 230, 'Lorem ipsum dolor sit amet. Et ratione error vel quos eaque qui necessitatibus tenetur et totam voluptatem hic recusandae itaque et minima quia?', 3),
(3, 'khudat160520231045', 'C', 'Biệt thự song lập', 'Sân Mỹ Đình xuống cấp thế nào 2.jpg', 2000, 'lorem', 2),
(5, 'khudat160520230255', 'D21', 'Biệt thự song lập', '3bbaeb04-eba4-4657-9388-b327bd42008e.png', 3210, 'repellendus a laboriosam enim. Ut sequi quia et omnis adipisci et consequatur consequatur est dicta nostrum sit voluptas nisi id ratione sapiente et facere reiciendis.', 2);

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
(1, 'lodat160520231135', '04', 'Chân giò om sấu.jpg', 999, 'repellendus a laboriosam enim. Ut sequi quia et omnis adipisci et consequatur consequatur est dicta nostrum sit voluptas nisi id ratione sapiente et facere reiciendis.', 2),
(2, 'lodat160520231136', '06', 'Ca mắc Covid-19.jpg', 23421, '321321321', 3),
(4, 'lodat160520230256', '21C', 'cate.PNG', 333, 'repellendus a laboriosam enim. Ut sequi quia et omnis adipisci et consequatur consequatur est dicta nostrum sit voluptas nisi id ratione sapiente et facere reiciendis.', 5);

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
(5, 2, 1, 'Đất bazan 3', 0, 0, 0, 0, 0, 0, 0, 'lorem', 'laptop_gaming.jpg', 'Đã bán', 0);

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
(1, 'keri092123', 'Dự án cho thuê xe 3', 'car_content.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate ', '2023-05-16'),
(2, 'keri092432', 'Dự án bán bánh', 'Pancake hạnh nhân đậu đỏ.jpg', 'Lorem ipsum dolor sit amet. Ut laboriosam iste est veritatis atque et optio reprehenderit est autem deleniti 33 nesciunt distinctio qui quasi molestias ut', 'Lorem ipsum dolor sit amet. Ut laboriosam iste est veritatis atque et optio reprehenderit est autem deleniti 33 nesciunt distinctio qui quasi molestias ut', '2023-05-16'),
(3, 'keri160520230926', 'Dự án bán yến', 'to_yen_2.png', 'In natus sint eos similique asperiores sed corporis magnam et delectus autem est accusamus nostrum est obcaecati ratione. Id tempora voluptatem et dicta neque ut sunt deleniti ad nobis omnis et sapiente voluptates.', 'In natus sint eos similique asperiores sed corporis magnam et delectus autem est accusamus nostrum est obcaecati ratione. Id tempora voluptatem et dicta neque ut sunt deleniti ad nobis omnis et sapiente voluptates.', '2023-05-16');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
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
-- AUTO_INCREMENT cho bảng `dm_khudat`
--
ALTER TABLE `dm_khudat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `dm_lodat`
--
ALTER TABLE `dm_lodat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `dm_nendat`
--
ALTER TABLE `dm_nendat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
