-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 11, 2020 lúc 11:06 AM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shoplaptop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(22, '2014_10_12_000000_create_users_table', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2020_05_21_093138_create_tbl_admin_table', 1),
(25, '2020_05_22_035318_create_tbl_category_product', 1),
(26, '2020_05_23_073209_create_tbl_product_table', 1),
(27, '2020_06_09_015800_create_tbl_customer_table', 2),
(28, '2020_06_09_021654_create_tbl_customer_table', 3),
(29, '2020_06_09_041408_create_tbl_customer_table', 4),
(30, '2020_06_11_032430_create_tbl_detail_table', 5),
(31, '2020_06_14_140834_create_orders_table', 6),
(32, '2020_06_14_141050_create_order_details_table', 6),
(33, '2020_07_10_133115_create_revenues_table', 7),
(34, '2020_07_11_032934_create_revenue_details_table', 8),
(35, '2020_07_11_080152_create_revenue_years_table', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `order_day` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_total_price` int(50) DEFAULT NULL,
  `order_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `customer_id`, `order_day`, `order_total_price`, `order_status`, `created_at`, `updated_at`) VALUES
(19, 'dtpfxg6yn4wh7l95ri2z', 3, '2020-07-06 02:28:44', 32990000, 3, '2020-07-05 19:28:44', '2020-07-05 19:28:44'),
(20, 'u1e6kh9s4tpr7zxaqj50', 3, '2020-07-06 02:29:21', 24990000, 2, '2020-07-05 19:29:21', '2020-07-05 19:29:21'),
(21, '98oevk314wufhtsgnjdy', 3, '2020-05-06 02:29:44', 34380000, 2, '2020-07-05 19:29:44', '2020-07-05 19:29:44'),
(22, 'mb87vuqtdg2pi01fsyce', 3, '2020-07-06 02:30:57', 13750000, 0, '2020-07-05 19:30:57', '2020-07-05 19:30:57'),
(23, '9amd8ibo7h3jkyt2pr4u', 6, '2020-07-06 05:37:54', 76270000, 2, '2020-07-05 22:37:54', '2020-07-05 22:37:54'),
(24, 'rtzmlikahn4pdc0372sb', 4, '2020-07-10 02:51:03', 13690000, 0, '2020-07-09 19:51:03', '2020-07-09 19:51:03'),
(25, 'nd27h50lxyomcr8zs9b1', 7, '2020-07-10 14:38:29', 56990000, 2, '2020-07-10 07:38:29', '2020-07-10 07:38:29'),
(26, '1e08b9vijr4a7mkqpwsd', 7, '2020-06-09 03:21:41', 27500000, 2, '2020-07-10 20:21:41', '2020-07-10 20:21:41'),
(27, '4fo0lvm98k2uzsxceiw5', 6, '2020-05-11 07:30:54', 52480000, 2, '2020-07-11 00:30:54', '2020-07-11 00:30:54'),
(28, '5gf2yuow70sck34ieqhn', 6, '2020-07-11 07:31:09', 10290000, 1, '2020-07-11 00:31:09', '2020-07-11 00:31:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_product_id` int(10) NOT NULL,
  `order_product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_qty` int(10) UNSIGNED NOT NULL,
  `order_product_price` int(50) NOT NULL,
  `order_total_price` int(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `order_product_id`, `order_product_image`, `order_product_name`, `order_qty`, `order_product_price`, `order_total_price`, `created_at`, `updated_at`) VALUES
(23, 'dtpfxg6yn4wh7l95ri2z', 4, 'MB4.jpg', 'Laptop Apple MacBook Air 2019 i5 1.6GHz/8GB/256GB (MVFL2SA/A)', 1, 32990000, 32990000, '2020-07-05 19:28:44', '2020-07-05 19:28:44'),
(24, 'u1e6kh9s4tpr7zxaqj50', 25, 'MSI1.jpg', 'Laptop MSI Gaming 15 GF63 9SC i7 9750H/8GB/256GB/4GB ', 1, 24990000, 24990000, '2020-07-05 19:29:21', '2020-07-05 19:29:21'),
(25, '98oevk314wufhtsgnjdy', 14, 'A2.jpg', 'Laptop Asus VivoBook X509JP i5 1035G1/8GB/512GB/2GB MX330/Win10', 2, 17190000, 34380000, '2020-07-05 19:29:44', '2020-07-05 19:29:44'),
(26, 'mb87vuqtdg2pi01fsyce', 7, 'D3.jpg', 'Laptop Dell Inspiron 3493 i5 1035G1/8GB/256GB/Win10', 1, 13750000, 13750000, '2020-07-05 19:30:57', '2020-07-05 19:30:57'),
(27, '9amd8ibo7h3jkyt2pr4u', 4, 'MB4.jpg', 'Laptop Apple MacBook Air 2019 i5 1.6GHz/8GB/256GB (MVFL2SA/A)', 2, 32990000, 65980000, '2020-07-05 22:37:54', '2020-07-05 22:37:54'),
(28, '9amd8ibo7h3jkyt2pr4u', 6, 'D2.jpg', 'Laptop Dell Inspiron 3581 i3 7020U/4GB/1TB/Win10 (P75F005N81A)', 1, 10290000, 10290000, '2020-07-05 22:37:54', '2020-07-05 22:37:54'),
(29, 'rtzmlikahn4pdc0372sb', 16, 'A4.jpg', 'Laptop Asus VivoBook A512FA i3 8145U/4GB/512GB/Win10', 1, 13690000, 13690000, '2020-07-09 19:51:03', '2020-07-09 19:51:03'),
(30, 'nd27h50lxyomcr8zs9b1', 3, 'MB3.jpg', 'Laptop Macbook Pro Touch 16 inch 2019 i7 2.6GHz/16GB/512GB/4GB', 1, 56990000, 56990000, '2020-07-10 07:38:29', '2020-07-10 07:38:29'),
(31, '1e08b9vijr4a7mkqpwsd', 7, 'D3.jpg', 'Laptop Dell Inspiron 3493 i5 1035G1/8GB/256GB/Win10', 2, 13750000, 27500000, '2020-07-10 20:21:41', '2020-07-10 20:21:41'),
(32, '4fo0lvm98k2uzsxceiw5', 4, 'MB4.jpg', 'Laptop Apple MacBook Air 2019 i5 1.6GHz/8GB/256GB (MVFL2SA/A)', 1, 32990000, 32990000, '2020-07-11 00:30:54', '2020-07-11 00:30:54'),
(33, '4fo0lvm98k2uzsxceiw5', 20, 'AC4.jpg', 'Laptop Acer Nitro AN515 43 R9FD R5 3550H/8GB/512GB/4GB', 1, 19490000, 19490000, '2020-07-11 00:30:54', '2020-07-11 00:30:54'),
(34, '5gf2yuow70sck34ieqhn', 6, 'D2.jpg', 'Laptop Dell Inspiron 3581 i3 7020U/4GB/1TB/Win10 (P75F005N81A)', 1, 10290000, 10290000, '2020-07-11 00:31:09', '2020-07-11 00:31:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `revenues`
--

CREATE TABLE `revenues` (
  `id` int(10) UNSIGNED NOT NULL,
  `thang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tong_doanh_thu` int(50) DEFAULT NULL,
  `tong_don_hang` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `revenues`
--

INSERT INTO `revenues` (`id`, `thang`, `tong_doanh_thu`, `tong_don_hang`, `created_at`, `updated_at`) VALUES
(10, '2020-6', 27500000, 1, NULL, NULL),
(13, '2020-7', 158250000, 3, NULL, NULL),
(14, '2020-5', 86860000, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `revenue_years`
--

CREATE TABLE `revenue_years` (
  `id` int(10) UNSIGNED NOT NULL,
  `nam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tong_doanh_thu` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `revenue_years`
--

INSERT INTO `revenue_years` (`id`, `nam`, `tong_doanh_thu`, `created_at`, `updated_at`) VALUES
(1, '2020', 272610000, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(3, 'anhtuandev.it@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Lê Anh Tuấn', NULL, '2020-06-09 01:05:55', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `id` int(10) NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`id`, `category_id`, `category_status`, `created_at`, `updated_at`) VALUES
(1, 'MAC', 1, NULL, NULL),
(2, 'HP', 1, NULL, NULL),
(3, 'DELL', 1, NULL, NULL),
(4, 'ASUS', 1, NULL, NULL),
(5, 'ACER', 1, NULL, NULL),
(6, 'LENOVO', 1, NULL, NULL),
(7, 'MSI', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_account`, `customer_password`, `customer_name`, `customer_phone`, `customer_address`, `created_at`, `updated_at`) VALUES
(3, 'leanhtuan', 'e10adc3949ba59abbe56e057f20f883e', 'Lê Anh Tuấn', '0978123456', 'Thanh Khê - Đà Nẵng', NULL, NULL),
(4, 'buitatoan', 'e10adc3949ba59abbe56e057f20f883e', 'Bùi Tá Toàn', '0978123123', 'Quãng Ngãi', NULL, NULL),
(6, 'thuytrinh', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Thị Thuỳ Trinh', '0978456123', 'Quế Sơn - Quảng Nam', NULL, NULL),
(7, 'trinhhonglanh', 'e10adc3949ba59abbe56e057f20f883e', 'Trịnh Hồng Lãnh', '0978567567', 'Thăng Bình - Quảng Nam', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(10) NOT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_desc` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL,
  `product_status` int(11) DEFAULT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chip` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ram` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hard_drive` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `product_img`, `product_name`, `product_desc`, `product_price`, `product_status`, `category_id`, `chip`, `ram`, `weight`, `hard_drive`, `created_at`, `updated_at`) VALUES
(1, 'MSI4.jpg', 'Laptop Apple MacBook Air 2017 i5 1.8GHz/8GB/128GB (MQD32SA/A)', 'MacBook Air 2017 i5 128GB là mẫu laptop văn phòng, có thiết kế siêu mỏng và nhẹ, vỏ nhôm nguyên khối sang trọng. Máy có hiệu năng ổn định, thời lượng pin cực lâu 12 giờ, phù hợp cho hầu hết các nhu cầu làm việc và giải trí.', 19990000, 1, 'MAC', 'Intel Core i5 Broadwell, 1.80 GHz', '8 GB, DDR3L(On board), 1600 MHz', '1.35kg', 'SSD: 128 GB', NULL, NULL),
(2, 'MB2.jpg', 'Laptop Apple Macbook Air 2020 i3 1.1GHz/8GB/256GB (MWTL2SA/A)', 'MacBook Air 2020 i3 mới với thiết kế sang trọng, hiệu năng khá, bàn phím Magic lần đầu tiên xuất hiện trên dòng Macbook Air. Với nhiều tính năng hiện đại, đây là chiếc MacBook Air rất đáng sở hữu với mức giá gần như rẻ nhất từ trước đến nay.\"', 28990000, 1, 'MAC', 'Intel Core i3 Thế hệ 10, 1.10 GHz', '8 GB, LPDDR4X (On board), 3733 MHz', '1.29kg', 'SSD: 256 GB', NULL, NULL),
(3, 'MB3.jpg', 'Laptop Macbook Pro Touch 16 inch 2019 i7 2.6GHz/16GB/512GB/4GB', 'MacBook ProTouch 2019 i7 chiếc laptop cấu hình mạnh mẽ của Apple sẽ đem đến những trải nghiệm mà không phải chiếc laptop nào cũng có được. Thiết kế sang trọng tinh tế, cấu hình khủng, được trang bị card đồ họa và các công nghệ độc quyền của Apple.\"', 56990000, 1, 'MAC', 'Intel Core i7 Coffee Lake, 2.60 GHz', '16 GB, DDR4 (1 khe), 2666 MHz', '2.0kg', 'SSD 512GB', NULL, NULL),
(4, 'MB4.jpg', 'Laptop Apple MacBook Air 2019 i5 1.6GHz/8GB/256GB (MVFL2SA/A)', 'Apple Macbook Air 2019 i5 (MVFL2SA/A) là phiên bản nâng cấp nhẹ so với MacBook Air 2018. Màn hình Retina nay được trang bị công nghệ Truetone hiện đại, có nhiều cải tiến trên bàn phím cánh bướm.\"', 32990000, 1, 'MAC', 'Intel Core i5 Coffee Lake, 1.60 GHz', '8 GB, LPDDR3, 2133 MHz', '1.25kg', 'SSD: 256 GB', NULL, NULL),
(5, 'D1.jpg', 'Laptop Dell Vostro 3580 i5 8265U/4GB/1TB/2GB AMD520/Win10', 'Dell vừa cho ra mắt laptop Dell Vostro 3580 i5 (P75F010V80I) với thiết kế trang nhã, cấu hình đáp ứng tốt nhu cầu văn phòng và đồ họa cơ bản, đây chính là chiếc laptop văn phòng đáng cân nhắc đối với khách hàng là học sinh, nhân viên văn phòng.', 12220000, 1, 'DELL', 'Intel Core i5 Coffee Lake, 8265U, 1.60 GHz', '4 GB, DDR4 (2 khe), 2666 MHz', '2.1kg', 'HDD: 1 TB SATA3, Hỗ trợ khe cắm SSD M.2 PCIe', NULL, NULL),
(6, 'D2.jpg', 'Laptop Dell Inspiron 3581 i3 7020U/4GB/1TB/Win10 (P75F005N81A)', 'Laptop Dell Inspiron 3581 có thiết kế đơn giản, độ bền cao, là chiếc laptop 15.6 inch giá rẻ phù hợp với sinh viên.\r\nThiết kế đơn giản\r\nKhông quá cầu kỳ, laptop Dell Inspiron 3581 có thiết kế truyền thống với cân nặng 2.28 kg. Trọng lượng này khá cồng kền', 10290000, 1, 'DELL', 'Intel Core i3 Kabylake, 7020U, 2.30 GHz', '4 GB, DDR4 (2 khe), 2133 MHz', '2.28kg', 'HDD: 1 TB SATA3, Hỗ trợ khe cắm SSD M.2 PCIe', NULL, NULL),
(7, 'D3.jpg', 'Laptop Dell Inspiron 3493 i5 1035G1/8GB/256GB/Win10', 'Laptop Dell Inspiron 3493 i5 (N4I5122W) là mẫu máy laptop văn phòng đến từ nhà Dell. Hướng tới khách hàng là học sinh sinh viên và nhân viên văn phòng, máy được trang bị cấu hình đủ dùng cho công việc lẫn giải trí thường ngày.', 13750000, 1, 'DELL', 'Intel Core i5 Ice Lake, 1035G1, 1.00 GHz', '8 GB, DDR4 (2 khe), 2666 MHz', '1.79kg', 'SSD 256GB NVMe PCIe, Hỗ trợ khe cắm HDD SATA', NULL, NULL),
(9, 'HP1.jpg', 'Laptop HP Envy 13 aq1022TU i5 10210U/8GB/512GB/Win10 (8QN69PA)', 'Laptop HP Envy 13 aq1022TU i5 (8QN69PA) là chiếc laptop doanh nhân cao cấp có thiết kế siêu mỏng nhẹ và cấu hình mạnh. Bảo mật vân tay hiện đại, ổ cứng SSD cực nhanh là những điểm cộng nổi bật của chiếc laptop này.', 22690000, 0, 'HP', 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', '8 GB, DDR4 (On board), 2400 MHz', '1.17kg', 'SSD 512 GB M.2 PCIe', NULL, NULL),
(10, 'HP2.jpg', 'Laptop HP Pavilion 15 cs3061TX i5 1035G1/8GB/512GB/2G MX250/Win10', 'Laptop HP Pavilion 15 cs3061TX là mẫu laptop dành cho sinh viên, nhân viên văn phòng, có thể sử dụng để thiết kế đồ hoạ cơ bản, với cấu hình mạnh mẽ. Thiết kế gọn nhẹ dễ dàng mang theo bên mình.', 18190000, 1, 'HP', 'Intel Core i5 Ice Lake, 1035G1, 1.00 GHz', '8 GB, DDR4 (2 khe), 2666 MHz', '1.761kg', 'SSD 512 GB M.2 PCIe, Hỗ trợ khe cắm HDD SATA', NULL, NULL),
(11, 'HP3.jpg', 'Laptop HP 348 G7 i3 8130U/4GB/256GB/Win10 (9PG83PA)', 'Được xướng tên trong phân khúc laptop học tập - văn phòng lần này là một chiếc laptop nhỏ gọn nữa đến từ thương hiệu HP - laptop HP 348 G7 i3 8130U (9PG83PA), hứa hẹn sẽ đáp ứng tốt mọi nhu cầu sử dụng laptop thường ngày.', 11390000, 1, 'HP', 'Intel Core i3 Coffee Lake, 8130U, 2.20 GHz', '4 GB, DDR4 (2 khe), 2666 MHz', '1.5kg', 'SSD 256GB NVMe PCIe, Hỗ trợ khe cắm HDD SATA', NULL, NULL),
(12, 'HP4.jpg', 'Laptop HP 15s du1035TX i5 10210U/8GB/512GB/2GB MX130/Win10', 'Đặc điểm nổi bật của HP 15s du1035TX i5  Bộ sản phẩm chuẩn: Dây nguồn (2 dây)Laptop HP 15s du1035TX (8RK36PA) là mẫu laptop có mức giá trung bình dành cho sinh viên và nhân viên văn phòng với cấu hình mạnh và thiết kế sang trọng.', 17790000, 1, 'HP', 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', '8 GB, DDR4 (2 khe), 2666 MHz', '1.744kg', 'SSD 512 GB M.2 PCIe, Hỗ trợ khe cắm HDD SATA', NULL, NULL),
(13, 'A1.jpg', 'Laptop Asus VivoBook X409FA i3 8145U/4GB/256GB/Win10 (EK468T)', 'Laptop Asus VivoBook X409FA i3 (EK468T) là mẫu máy tính xách tay học tập văn phòng cơ bản, có cấu hình đủ dùng cho nhu cầu học tập và giải trí thường ngày. Với thiết kế mỏng nhẹ, Asus VivoBook X409FA có thể đồng hành cùng bạn mọi lúc mọi nơi.', 10790000, 1, 'ASUS', 'Intel Core i3 Coffee Lake, 8145U, 2.10 GHz', '4 GB, DDR4 (On board +1 khe), 2400 MHz', '1.423kg', 'SSD 256GB NVMe PCIe, Hỗ trợ khe cắm HDD SATA', NULL, NULL),
(14, 'A2.jpg', 'Laptop Asus VivoBook X509JP i5 1035G1/8GB/512GB/2GB MX330/Win10', 'Asus VivoBook X509JP i5 (EJ023T) là chiếc laptop học tập - văn phòng mỏng nhẹ, cấu hình mạnh và ổn định cho nhu cầu làm việc, giải trí hằng ngày. Ngoài ra, máy cũng có khả năng đồ họa khá nhờ có card đồ họa rời.', 17190000, 1, 'ASUS', 'Intel Core i5 Ice Lake, 1035G1, 1.00 GHz', '8 GB, DDR4 (On board 4GB +1 khe 4GB), 2666 MHz', '1.73kg', 'SSD 512 GB M.2 PCIe, Hỗ trợ khe cắm HDD SATA', NULL, NULL),
(15, 'A3.jpg', 'Laptop Asus VivoBook X509MA N4000/4GB/256GB/Win10 (BR061T)', 'Laptop Asus VivoBook X509MA là sản phẩm đến từ thương hiệu Asus nổi tiếng với thiết kế mỏng nhẹ, cấu hình tầm trung, SSD nhanh đáp ứng tốt các tác vụ cơ bản của đối tượng có nhu cầu văn phòng - học tập.\r\nThiết kế tinh tế sang trọng.', 6990000, 1, 'ASUS', 'Intel Celeron, N4000, 1.10 GHz', '4 GB, DDR4 (1 khe), 2400 MHz', '1.8kg', 'SSD 256GB NVMe PCIe, Hỗ trợ khe cắm HDD SATA', NULL, NULL),
(16, 'A4.jpg', 'Laptop Asus VivoBook A512FA i3 8145U/4GB/512GB/Win10', 'Với thiết kế gọn nhẹ và cấu hình vừa phải, Asus VivoBook A512FA sẽ là một người bạn đồng hành cùng với các bạn sinh viên, cũng như nhân viên văn phòng trong mọi hoạt động từ học tập, làm việc cho đến giải trí thường ngày.', 13690000, 1, 'ASUS', 'Intel Core i3 Coffee Lake, 8145U, 2.10 GHz', '4 GB, DDR4 (On board +1 khe), 2400 MHz', '1.7kg', 'SSD 512GB, Hỗ trợ khe cắm HDD SATA', NULL, NULL),
(17, 'AC1.jpg', 'Laptop Acer Aspire A515 55 55HG i5 1035G1/8GB/512GB/Win10', 'Laptop Acer Aspire A515 55 55HG cấu hình mạnh mẽ đáp ứng được nhu cầu đồ họa cơ bản và cân hết mọi tác vụ văn phòng, đồng hành cùng bạn tạo nên 1 ngày làm việc hiệu quả.\r\nThân máy gọn, nắp lưng kim loại thời thượng.', 17190000, 1, 'ACER', 'Intel Core i5 Ice Lake, 1035G1, 1.00 GHz', '8 GB, DDR4 (On board 4GB +1 khe 4GB), 2400 MHz', '1.7kg', 'SSD 512 GB M.2 PCIe, Hỗ trợ khe cắm HDD SATA', NULL, NULL),
(18, 'AC2.jpg', 'Laptop Acer Aspire A315 34 C2H9 N4000/4GB/256GB/Win10', 'Laptop Acer Aspire A315 34 C2H9 hướng đến đối tượng học sinh - sinh viên đòi hỏi cấu hình đủ dùng để lướt web, soạn thảo, cùng với đó là mức phải chăng và thiết kế gọn nhẹ. Máy là một trong số ít sản phẩm đảm bảo các yếu tố giá rẻ, thời lượng pin cao.', 6990000, 1, 'ACER', 'Intel Celeron, N4000, 1.10 GHz', '4 GB, DDR4 (On board +1 khe), 2400 MHz', '1.7kg', 'SSD 256GB NVMe PCIe, Hỗ trợ khe cắm HDD SATA', NULL, NULL),
(19, 'AC3.jpg', 'Laptop Acer Aspire 3 A315 54K 37B0 i3 8130U/4GB/256GB/Win10', 'Là mẫu laptop học tập - văn phòng được thiết kế gọn nhẹ, vẫn mang đến nhiều điểm nổi bật khi sở hữu cấu hình tốt, ổ cứng SSD cực nhanh và màn hình Full HD sắc nét. Sản phẩm sẽ là lựa chọn tuyệt vời trong tầm giá.', 10690000, 0, 'ACER', 'Intel Core i3 Coffee Lake, 8130U, 2.20 GHz', '4 GB, DDR4 (On board +1 khe), 2400 MHz', '1.7kg', 'SSD 256GB NVMe PCIe, Hỗ trợ khe cắm HDD SATA', NULL, NULL),
(20, 'AC4.jpg', 'Laptop Acer Nitro AN515 43 R9FD R5 3550H/8GB/512GB/4GB', 'Laptop Acer Nitro AN515 (NH.Q6ZSV.003) phiên bản 2019 là mẫu laptop gaming tầm trung có thiết kế hầm hố, cấu hình mạnh, đồ họa mượt mà với card màn hình Geforce GTX 1650. Đây là chiếc laptop không chỉ phù hợp cho chơi game mà còn làm việc, thiết kế đồ họa tốt.', 19490000, 1, 'ACER', 'AMD Ryzen 5, 3550H, 2.10 GHz', '8 GB, DDR4 (2 khe), 2400 MHz', '2.3kg', 'SSD 512 GB M.2 PCIe, Hỗ trợ khe cắm HDD SATA', NULL, NULL),
(21, 'L1.jpg', 'Laptop Lenovo IdeaPad S145 15IIL i3 1005G1/4GB/256GB/Win10', 'Laptop Lenovo IdeaPad S145 15IIL i3 (81W8001XVN) thuộc phân khúc laptop học tập văn phòng cơ bản với mức giá tốt. Máy có cấu hình ổn, đủ chạy các ứng dụng văn phòng phổ biến, điểm nổi bật của Lenovo IdeaPad S145 là ổ cứng SSD siêu nhanh, thiết kế mỏng gọn', 11190000, 1, 'LENOVO', 'Intel Core i3 Ice Lake, 1005G1, 1.20 GHz', '4 GB, DDR4 (On board +1 khe), 2666 MHz', '1.79kg', 'SSD 256GB NVMe PCIe, Hỗ trợ khe cắm HDD SATA', NULL, NULL),
(22, 'L2.jpg', 'Laptop Lenovo IdeaPad S145 15IIL i5 1035G1/8GB/512GB/Win10', 'Lenovo IdeaPad S145 15IIL i5 (81W80021VN) là mẫu laptop có cấu hình đáp ứng tốt công việc văn phòng, học tập. Thiết bị sở hữu ổ cứng SSD cho tốc độ xử lí nhanh chóng, màn hình Full HD sắc nét.', 14790000, 1, 'LENOVO', 'Intel Core i5 Ice Lake, 1035G1, 1.00 GHz', '8 GB, DDR4 (On board 4GB +1 khe 4GB), 2666 MHz', '1.79kg', 'SSD 512 GB M.2 PCIe, Hỗ trợ khe cắm HDD SATA', NULL, NULL),
(23, 'L3.jpg', 'Laptop Lenovo IdeaPad S340 14IIL i3 1005G1/8GB/512GB/Win10', 'Lenovo IdeaPad S340 14IIL (81VV003VVN) sở hữu cấu hình khá, hiệu năng ổn định và thiết kế tinh tế đẹp mắt. Đây sẽ là chiếc laptop văn phòng phù hợp với đối tượng sinh viên, dân văn phòng thường xuyên xử lý các tác vụ văn phòng, học tập và chỉnh sửa hình ảnh cơ bản.', 13690000, 1, 'LENOVO', 'Intel Core i3 Ice Lake, 1005G1, 1.20 GHz', '8 GB, DDR4 (On board 4GB +1 khe 4GB), 2666 MHz', '1.6kg', 'SSD 512 GB M.2 PCIe, Hỗ trợ khe cắm HDD SATA', NULL, NULL),
(24, 'L4.jpg', 'Laptop Lenovo IdeaPad S340 14IIL i5 1035G1/8GB/512GB/Win10', 'Laptop Lenovo IdeaPad S340 14IIL i5 (81VV003SVN) là một lựa chọn phù hợp dành cho nhân viên văn phòng, học sinh sinh viên. Máy có cấu hình khá với vi xử lí mới nhất đến từ Intel, ổ cứng SSD cực nhanh, thiết kế sang trọng, mỏng nhẹ sẵn sàng đồng hành cùng bạn mọi lúc mọi nơi.', 15490000, 1, 'LENOVO', 'Intel Core i5 Ice Lake, 1035G1, 1.00 GHz', '8 GB, DDR4 (On board 4GB +1 khe 4GB), 2666 MHz', '1.6kg', 'SSD 512 GB M.2 PCIe, Hỗ trợ khe cắm HDD SATA', NULL, NULL),
(25, 'MSI1.jpg', 'Laptop MSI Gaming 15 GF63 9SC i7 9750H/8GB/256GB/4GB ', 'Laptop gaming MSI đã đem lại cho người dùng phân khúc Laptop MSI Gaming GF63 9SC giá rẻ - chỉ hơn 20 triệu đồng. Bạn sẽ có một thiết kế gaming hầm hố nhưng lại thanh lịch, tối giản và tính di động cao hơn cùng với cấu hình mới nhất đem lại hiệu năng mạnh mẽ không thua kém quá nhiều so với các laptop tầm trung hay cận cao cấp. Đây là một lựa chọn rất đáng cân nhắc và hấp dẫn cho người dùng.', 24990000, 1, 'MSI', 'Intel Core i7 Coffee Lake, 9750H, 2.60 GHz', '8 GB, DDR4 (2 khe), 2666 MHz', '1.86kg', 'SSD 256GB NVMe PCIe, Hỗ trợ khe cắm HDD SATA', NULL, NULL),
(26, 'MSI2.jpg', 'Laptop MSI GS60 Ghost Pro 6QE 415XVN', 'Dáng siêu mẫu nhưng chứa cấu hình khủng.\r\nGS60 Ghost Pro dường như nhắm đến đối thủ trực tiếp trong phân khúc là Razer Blade. Nhìn bề ngoài như một chiếc laptop văn phòng GS60 Ghost Pro chỉ vỏn vẹn nặng 1.9 kg bao gồm pin. Nhưng bên trong lại là một câu chuyện khác.', 43800000, 1, 'MSI', 'Intel Core i7 6700HQ, 2.60 GHz', '16 GB, DDR4 (On board), 2133 MHz', '1.9kg', 'SSD: 128 GB + HDD: 1TB 7200rpm', NULL, NULL),
(27, 'MSI4.jpg', 'MSI Modern 15 A10M i7 10510U/8 GB  LPDDR4/SSD  512 GB', 'Mang trên mình bộ vi xử lý Intel Core i7 thế hệ thứ 10 mạnh mẽ, MSI Modern 15 A10M đáp ứng hoàn hảo nhu cầu làm việc của bạn. Hơn nữa, đây còn là chiếc laptop thời trang với kiểu dáng nhỏ gọn đáng kinh ngạc.', 23990000, 0, 'MAC', 'Intel Core i7', '8 GB  LPDDR4', '1.86kg', 'SSD  512 GB', NULL, NULL),
(28, 'MSI4.jpg', 'MSI Alpha 15 A3DDK R7 3750H', 'MSI Alpha 15 A3DDK R7 3750H/8Gb/512Gb/RX 5500M 4Gb/15.6\"FHD/Win10.\r\nMSI Alpha 15 A3DDK là chiếc laptop đầu tiên trên thế giới trang bị công nghệ 7nm tiên tiến và mang trên mình sức mạnh đồng nhất của nhà AMD, là một sản phẩm không chỉ mạnh mẽ mà còn tinh tế đến từng đường nét.', 26490000, 0, 'MSI', 'AMD  Ryzen™ 7', '8 GB, DDR6', '2.3kg', 'SSD 512 GB', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `order_product_id` (`order_product_id`);

--
-- Chỉ mục cho bảng `revenues`
--
ALTER TABLE `revenues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thang` (`thang`);

--
-- Chỉ mục cho bảng `revenue_years`
--
ALTER TABLE `revenue_years`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `revenues`
--
ALTER TABLE `revenues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `revenue_years`
--
ALTER TABLE `revenue_years`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`customer_id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_4` FOREIGN KEY (`order_product_id`) REFERENCES `tbl_product` (`id`),
  ADD CONSTRAINT `order_details_ibfk_5` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_category_product` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
