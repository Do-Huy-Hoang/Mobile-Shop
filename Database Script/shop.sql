-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 17, 2021 lúc 06:22 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_roles`
--

CREATE TABLE `admin_roles` (
  `id_admin_roles` int(11) NOT NULL,
  `admin_admin_id` int(10) UNSIGNED NOT NULL,
  `roles_id_roles` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin_roles`
--

INSERT INTO `admin_roles` (`id_admin_roles`, `admin_admin_id`, `roles_id_roles`) VALUES
(1, 1, 1),
(5, 5, 3),
(6, 6, 3),
(7, 7, 3),
(8, 8, 3),
(9, 9, 3),
(10, 10, 3),
(11, 11, 3),
(12, 12, 3),
(13, 13, 3),
(14, 14, 3),
(15, 15, 3),
(16, 16, 3),
(17, 17, 3),
(18, 18, 3),
(19, 19, 3),
(20, 20, 3),
(21, 21, 3),
(22, 22, 3),
(25, 1, 1),
(26, 2, 2),
(27, 24, 3),
(28, 23, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `id_parent`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Smartphone', 0, '2021-10-15 05:40:17', '2021-10-15 05:40:17', NULL),
(2, 'Laptop', 0, '2021-10-15 05:41:31', '2021-10-15 05:41:31', NULL),
(3, 'Accessory', 0, '2021-10-15 05:42:04', '2021-10-15 05:42:04', NULL),
(4, 'Asus', 2, '2021-10-15 05:42:37', '2021-10-15 05:42:37', NULL),
(5, 'Dell', 2, '2021-10-15 05:42:45', '2021-10-15 05:42:45', NULL),
(6, 'HP', 2, '2021-10-15 05:43:25', '2021-10-15 05:43:25', NULL),
(7, 'Earphone', 3, '2021-10-15 07:14:55', '2021-10-15 07:14:55', NULL),
(8, 'Rechargeable battery backup', 3, '2021-10-15 07:15:34', '2021-10-15 07:15:34', NULL),
(9, 'Keyboard and mouse', 3, '2021-10-15 07:16:11', '2021-10-15 07:16:11', NULL),
(10, 'Smart watch', 3, '2021-10-15 07:17:11', '2021-10-15 07:17:11', NULL),
(11, 'Iphone', 1, '2021-10-15 22:37:30', '2021-10-15 22:37:30', NULL),
(12, 'OPPO', 1, '2021-10-15 22:37:48', '2021-10-15 22:37:48', NULL),
(13, 'Sam Sung', 1, '2021-10-15 22:38:01', '2021-10-15 22:38:01', NULL),
(14, 'Xiaomi', 1, '2021-10-15 22:38:12', '2021-10-15 22:38:12', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `phone`, `gender`, `birthday`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Đỗ Huy Hoàng', '240/28 CMT 8, P10, Q3,TP.HCM', '0869177683', 'male', '2002-11-06', 16, '2021-10-09 20:06:02', '2021-10-13 08:24:22'),
(7, 'Nguyễn Văn Huy', '212 Nguyễn Phúc Nguyên, P9, Q3, TP.HCM', '09869177683', 'male', '2000-11-06', 24, '2021-10-10 02:14:23', '2021-10-13 22:08:49');

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
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_parent` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `name`, `id_parent`, `created_at`, `updated_at`, `slug`, `deleted_at`) VALUES
(1, 'Huy', 0, '2021-10-07 03:45:04', '2021-10-07 03:45:04', 'huy', NULL),
(2, 'Quần', 1, '2021-10-07 03:46:14', '2021-10-07 03:46:14', 'quan', NULL),
(3, 'Huy', 1, '2021-10-07 03:48:18', '2021-10-07 03:48:18', 'huy', NULL),
(4, 'Huy', 0, '2021-10-07 03:49:09', '2021-10-07 03:49:09', 'huy', NULL),
(5, 'Huy', 1, '2021-10-07 03:56:57', '2021-10-07 03:56:57', 'huy', NULL),
(6, 'Huy', 0, '2021-10-07 03:58:02', '2021-10-07 03:58:02', 'huy', NULL),
(7, 'Slider 1', 0, '2021-10-07 04:02:07', '2021-10-07 04:02:07', 'slider-1', NULL),
(8, 'Huy', 0, '2021-10-07 04:07:21', '2021-10-07 04:07:21', 'huy', NULL);

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
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_09_18_011757_add_column_delete_at_table_category', 1),
(4, '2021_09_18_013752_create_menus_table', 2),
(5, '2021_09_18_123935_add_column_slug_to_menus_table', 3),
(6, '2021_09_19_033211_add_cloumn_sorf_delete_to_menus_table', 4),
(7, '2021_09_19_072724_create_products_table', 5),
(8, '2021_09_19_073101_create_product_images_table', 5),
(9, '2021_09_22_023105_add_cloumn_feature_img_name', 6),
(10, '2021_09_22_030547_add_column_image_name_to_table_product_image', 7),
(11, '2021_09_23_074758_add_column_delete_at_to_product_table', 8),
(12, '2021_09_24_021029_create_sliders_table', 9),
(14, '2021_09_29_092613_create_settings_table', 10),
(15, '2021_09_30_004753_add_column_typr_setting_table', 11),
(16, '2014_10_12_100000_create_password_resets_table', 12),
(17, '2021_10_02_091536_create_roles_table', 12),
(19, '2021_10_02_091752_create_table_user_role', 12),
(20, '2021_10_02_091905_create_table_permission_role', 12),
(21, '2014_10_12_000000_create_users_table', 13),
(22, '2021_10_02_091628_create_permissions_table', 14),
(23, '2021_10_03_083449_add_column_key_code_permission', 15),
(24, '2021_10_09_074119_create_customers_table', 16),
(25, '2019_12_14_000001_create_personal_access_tokens_table', 17),
(29, '2021_10_10_145706_create_orders_table', 19),
(30, '2021_10_10_145858_create_order_items_table', 19);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) UNSIGNED NOT NULL,
  `order_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('hd6112002a@gmail.com', '$2y$10$1xpHd.neI6HkFUT8klLdJ.A5t5E6aD0So6F81ss8dHwxlqV.GB55C', '2021-10-07 17:49:11'),
('hd6112002@gmail.com', '$2y$10$udxAtfgmryGNzb1WrTMiqeaDyKRsqd.QEObFzKixSlcS72y0XwmxC', '2021-10-08 01:23:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `key_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `parent_id`, `created_at`, `updated_at`, `key_code`) VALUES
(1, 'category', 'category', 0, '2021-10-10 01:28:10', '2021-10-10 01:28:10', NULL),
(2, 'List', 'List', 1, '2021-10-10 01:28:10', '2021-10-10 01:28:10', 'category_List'),
(3, 'Add', 'Add', 1, '2021-10-10 01:28:10', '2021-10-10 01:28:10', 'category_Add'),
(4, 'Edit', 'Edit', 1, '2021-10-10 01:28:10', '2021-10-10 01:28:10', 'category_Edit'),
(5, 'Delete', 'Delete', 1, '2021-10-10 01:28:10', '2021-10-10 01:28:10', 'category_Delete'),
(6, 'products', 'products', 0, '2021-10-10 01:28:19', '2021-10-10 01:28:19', NULL),
(7, 'List', 'List', 6, '2021-10-10 01:28:19', '2021-10-10 01:28:19', 'products_List'),
(8, 'Add', 'Add', 6, '2021-10-10 01:28:19', '2021-10-10 01:28:19', 'products_Add'),
(9, 'Edit', 'Edit', 6, '2021-10-10 01:28:19', '2021-10-10 01:28:19', 'products_Edit'),
(10, 'Delete', 'Delete', 6, '2021-10-10 01:28:19', '2021-10-10 01:28:19', 'products_Delete'),
(11, 'slider', 'slider', 0, '2021-10-10 01:28:30', '2021-10-10 01:28:30', NULL),
(12, 'List', 'List', 11, '2021-10-10 01:28:30', '2021-10-10 01:28:30', 'slider_List'),
(13, 'Add', 'Add', 11, '2021-10-10 01:28:30', '2021-10-10 01:28:30', 'slider_Add'),
(14, 'Edit', 'Edit', 11, '2021-10-10 01:28:30', '2021-10-10 01:28:30', 'slider_Edit'),
(15, 'Delete', 'Delete', 11, '2021-10-10 01:28:30', '2021-10-10 01:28:30', 'slider_Delete'),
(16, 'setting', 'setting', 0, '2021-10-10 01:28:40', '2021-10-10 01:28:40', NULL),
(17, 'List', 'List', 16, '2021-10-10 01:28:40', '2021-10-10 01:28:40', 'setting_List'),
(18, 'Add', 'Add', 16, '2021-10-10 01:28:40', '2021-10-10 01:28:40', 'setting_Add'),
(19, 'Edit', 'Edit', 16, '2021-10-10 01:28:40', '2021-10-10 01:28:40', 'setting_Edit'),
(20, 'Delete', 'Delete', 16, '2021-10-10 01:28:40', '2021-10-10 01:28:40', 'setting_Delete'),
(21, 'user', 'user', 0, '2021-10-10 01:28:47', '2021-10-10 01:28:47', NULL),
(22, 'List', 'List', 21, '2021-10-10 01:28:47', '2021-10-10 01:28:47', 'user_List'),
(23, 'Edit', 'Edit', 21, '2021-10-10 01:28:47', '2021-10-10 01:28:47', 'user_Edit'),
(24, 'Delete', 'Delete', 21, '2021-10-10 01:28:47', '2021-10-10 01:28:47', 'user_Delete'),
(25, 'role', 'role', 0, '2021-10-10 01:28:55', '2021-10-10 01:28:55', NULL),
(26, 'List', 'List', 25, '2021-10-10 01:28:55', '2021-10-10 01:28:55', 'role_List'),
(27, 'Add', 'Add', 25, '2021-10-10 01:28:55', '2021-10-10 01:28:55', 'role_Add'),
(28, 'Edit', 'Edit', 25, '2021-10-10 01:28:55', '2021-10-10 01:28:55', 'role_Edit'),
(29, 'Delete', 'Delete', 25, '2021-10-10 01:28:55', '2021-10-10 01:28:55', 'role_Delete'),
(30, 'permission', 'permission', 0, '2021-10-10 01:29:00', '2021-10-10 01:29:00', NULL),
(31, 'Add', 'Add', 30, '2021-10-10 01:29:00', '2021-10-10 01:29:00', 'permission_Add'),
(32, 'customer', 'customer', 0, '2021-10-13 11:10:17', '2021-10-13 11:10:17', NULL),
(33, 'List', 'List', 32, '2021-10-13 11:10:17', '2021-10-13 11:10:17', 'customer_List');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(11) UNSIGNED NOT NULL,
  `role_id` int(11) UNSIGNED NOT NULL,
  `permission_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL),
(2, 1, 3, NULL, NULL),
(3, 1, 4, NULL, NULL),
(4, 1, 5, NULL, NULL),
(5, 1, 7, NULL, NULL),
(6, 1, 8, NULL, NULL),
(7, 1, 9, NULL, NULL),
(8, 1, 10, NULL, NULL),
(9, 1, 12, NULL, NULL),
(10, 1, 13, NULL, NULL),
(11, 1, 14, NULL, NULL),
(12, 1, 15, NULL, NULL),
(13, 1, 17, NULL, NULL),
(14, 1, 18, NULL, NULL),
(15, 1, 19, NULL, NULL),
(16, 1, 20, NULL, NULL),
(17, 1, 22, NULL, NULL),
(18, 1, 23, NULL, NULL),
(20, 1, 26, NULL, NULL),
(21, 1, 27, NULL, NULL),
(22, 1, 28, NULL, NULL),
(24, 1, 24, NULL, NULL),
(25, 1, 29, NULL, NULL),
(26, 1, 31, NULL, NULL),
(27, 2, 2, NULL, NULL),
(28, 2, 3, NULL, NULL),
(29, 2, 4, NULL, NULL),
(30, 2, 7, NULL, NULL),
(31, 2, 12, NULL, NULL),
(32, 2, 17, NULL, NULL),
(33, 2, 22, NULL, NULL),
(34, 2, 26, NULL, NULL),
(35, 1, 33, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_img_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `feature_img_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `feature_img_path`, `content`, `category_id`, `created_at`, `updated_at`, `feature_img_name`, `deleted_at`) VALUES
(1, 'Asus VivoBook S433EA i5 1135G7/8GB/512GB/Win10 (AM439T', '19490000', '/storage/product/Asus_VivoBook_S433EA_i5_1135G7-1.jpg', '<pre><br></pre><table class=\"table table-bordered\"><tbody><tr><td>CPU:<br></td><td>i51135G72.4GHz<br></td></tr><tr><td>RAM:<br></td><td>8 GBDDR4 (Onboard) 3200 MHz<br></td></tr><tr><td>Hard Drive<br></td><td>512 GB NVMe PCIe SSD Support 1 extra slot for M.2 PCIe SSD expansion<br></td></tr><tr><td>Screen:<br></td><td>14 inches Full HD (1920 x 1080)<br></td></tr><tr><td>Graphics card:<br></td><td>CardIntel Iris Integrated Vehicle<br></td></tr><tr><td>Link:<br></td><td>1 x USB 3.2Thunderbolt 4 USB-C2 x USB 2.0HDMI<br></td></tr><tr><td>Especially:<br></td><td>Has keyboard light<br></td></tr><tr><td>Operating system:<br></td><td>Windows 10 Home SL<br></td></tr><tr><td>Design:<br></td><td>Metal case<br></td></tr><tr><td>Dimensions, weight:<br></td><td>Length Length 324 mm - - Width Width 213 mm - Thickness Thickness 15.9 mm - Weight 1.4 kg<br></td></tr><tr><td>Release time:<br></td><td>Year 2020<br></td></tr></tbody></table><pre><br></pre><p><br></p>', 4, '2021-10-14 23:14:59', '2021-10-15 15:02:51', 'Asus_VivoBook_S433EA_i5_1135G7-1.jpg', NULL),
(2, 'ASUS TUF Gaming F15 FX506LH-HN002T (i5-10300H | 8GB | 512GB | GeForce® GTX 1650 4GB | 15.6\' FHD 144Hz | Win 10)', '20990000', '/storage/product/ASUS_TUF_Gaming F15_FX506LH-HN002T-1.jfif', '<p><br></p><table class=\"table table-bordered\"><tbody><tr><td>CPU:<br></td><td>Intel Core i5-10300H 2.5GHz up to 4.5GHz 8MB<br></td></tr><tr><td>RAM:<br></td><td>8GB DDR4 2933MHz (2 ram slots, up to 32GB RAM upgrade)<br></td></tr><tr><td>Hard Drive:<br></td><td>512GB SSD M.2 PCIE G3X2 (1 slot M.2 PCIE SSD and 1 slot 2.5\" SATA available)<br></td></tr><tr><td>Screen:<br></td><td>15.6\" FHD (1920 x 1080) IPS, 144Hz, wide viewing angle, 250nits, anti-glare thin bezel with 45% NTSC, 63% sRGB<br></td></tr><tr><td>Graphics card:<br></td><td>NVIDIA GeForce GTX 1650 4GB GDDR6 + Intel® UHD Graphics<br></td></tr><tr><td>Link:<br></td><td>2x USB 3.1 Ports (Gen 1)<span style=\"white-space:pre\">	</span>1x USB2.0 . Port<span style=\"white-space:pre\">	</span>1x RJ-45 LAN Port<span style=\"white-space:pre\">	</span>1x HDMI 2.0B<span style=\"white-space:pre\">	</span>1x audio jack 3.5 mm combo microphone<br></td></tr><tr><td>Especially:<br></td><td>Has keyboard light<br></td></tr><tr><td>Operating system:<br></td><td>Windows 10 Home<span style=\"white-space:pre\">		</span><br></td></tr><tr><td>Design:<br></td><td>Gun Metal<br></td></tr><tr><td>Dimensions, weight:<br></td><td>Length Length 360&nbsp; mm - - Width Width 262&nbsp; mm - Thickness Thickness 25,8 mm - Weight 2.2<br></td></tr><tr><td>Release time:<br></td><td>2020<br></td></tr></tbody></table>', 4, '2021-10-14 23:38:52', '2021-10-15 15:04:25', 'ASUS_TUF_Gaming F15_FX506LH-HN002T-1.jfif', NULL),
(3, 'AirPods 2 Apple MV7N2 Bluetooth Headphones', '2900000', '/storage/product/AirPods_2_Apple_MV7N2_Bluetooth_Headphones-1.jfif', '<p>Simple design, fashion and compact.</p><p>Equipped with the all-new H1 chip, for fast connection speed, fast switching between devices.</p><p>Quickly activate Siri virtual assistant by saying \"Hey, Siri\".</p><p>Up to 5 hours of music playback (50% volume) can be used on a single full charge.</p><p>Integrated with modern fast charging technology. Fast charging 15 minutes can listen to music 3 hours (50% volume).</p><p>Used in parallel with the charging case can be used up to 24 hours.</p><p>The ability to take calls, activate Siri, listen to or pause the music that is playing.</p><p>Genuine Apple product, 100% sealed.</p><p>Note: Pay before opening the seal.</p>', 7, '2021-10-15 00:27:24', '2021-10-15 00:27:24', 'AirPods_2_Apple_MV7N2_Bluetooth_Headphones-1.jfif', NULL),
(4, 'Beats Studio Buds True Wireless Bluetooth Headset MJ4X3', '3790000', '/storage/product/Beats_Studio_Buds_True_Wireless_Bluetooth_Headset_MJ4X3-1.jpg', '<p>Fancy oval design, 2 white fashion, beautiful to wear.</p><p>Powerful, balanced sound.</p><p>Supports Bluetooth 5.0 Class-1 for quick connection.</p><p>Use the right situation with Active Noise Cancellation (ANC) technology and Transparency mode.</p><p>Headphones can use 8 hours, charging case 16 hours, Fast Fuel fast charge 5 minutes for 1 hour of use.</p><p>Practice with peace of mind with IPX4 waterproof standard.</p><p>Easy to use buttons to play/pause music, turn on virtual assistant, take calls,...</p>', 7, '2021-10-15 00:31:58', '2021-10-15 00:31:58', 'Beats_Studio_Buds_True_Wireless_Bluetooth_Headset_MJ4X3-1.jpg', NULL),
(5, 'AirPods Max Apple Bluetooth Earphones MYH3', '13290000', '/storage/product/AirPods_Max_Apple_Bluetooth_Earphones_MYH3-5.jfif', '<p>Elegant design with shiny, durable metal material.</p><p>Using Apple H1 chip for fast connection, wireless connection via Bluetooth 5.0.</p><p>Integrated ANC noise cancellation technology, sound crosstalk (Transperency Mode).</p><p>Spatial Audio support helps create surround sound effects when watching movies and experiencing Dolby Atmos content better.</p><p>Digital Crown adjusts flexibly and sensitively.</p><p>Integrated Siri virtual assistant for more convenient control.</p><p>Listen to receive calls directly from the headset.</p><p>20 hours of use when using ANC noise cancellation and Transparency Mode.</p><p>Fast charging 5 minutes can use 1.5 hours.</p>', 7, '2021-10-15 01:15:59', '2021-10-15 01:15:59', 'AirPods_Max_Apple_Bluetooth_Earphones_MYH3-5.jfif', NULL),
(6, 'Power bank polymer 10,000 mAh Hydrus PA CK01', '245000', '/storage/product/Power_bank_polymer_10,000_mAh_Hydrus_PA_CK01-3.jfif', '<p>64% charging efficiency on 10,000 mAh capacity.</p><p>Safe and durable use with long life polymer battery core.</p><p>The output source has 2 USB ports 5V – 2.1A.</p><p>Charge small devices such as smart watches, bluetooth headsets with trickle charging mode.</p><p>Simple design, 2 beautiful gray and yellow versions, easy to carry away.</p>', 8, '2021-10-15 01:23:16', '2021-10-15 01:23:16', 'Power_bank_polymer_10,000_mAh_Hydrus_PA_CK01-3.jfif', NULL),
(7, 'HyperX Pulsefire Core RGB Gaming Mouse Black', '621000', '/storage/product/HyperX_Pulsefire_Core_RGB_Gaming_Mouse_Black-1.jpg', '<p>Symmetrical design for comfort, suitable for gamers.</p><p>Using the high-end Pixart 3327 sensor, with a resolution of up to 6200 DPI.</p><p>Omron keys withstand 20 million clicks for a highly responsive feel that gives you complete confidence every time you press.</p><p>Set up the mouse to your liking with HyperX NGENUITY software.</p>', 9, '2021-10-15 01:28:01', '2021-10-15 01:28:01', 'HyperX_Pulsefire_Core_RGB_Gaming_Mouse_Black-1.jpg', NULL),
(8, 'Rapoo MT550 Bluetooth Wireless Mouse Black', '559000', '/storage/product/Rapoo_MT550_Bluetooth_Wireless_Mouse_Black-1.jpeg', '<p>Exquisite design, elegant, easy to operate.</p><p>600 - 1600 DPI resolution, meet a variety of usage needs.</p><p>Smooth wireless connection with USB Receiver (USB receiver) and Bluetooth.</p><p>Can connect 3 devices at the same time, switch easily.</p><p>Equipped with Back / Forward button, using 2 AA batteries that are easy to remove.</p>', 9, '2021-10-15 01:31:00', '2021-10-15 01:31:00', 'Rapoo_MT550_Bluetooth_Wireless_Mouse_Black-1.jpeg', NULL),
(9, 'Microsoft All-in-one Media Wireless Keyboard N9Z-00028 Black', '990000', '/storage/product/Microsoft_All-in-one_Media_Wireless_Keyboard_N9Z-00028_Black-1.jpg', '<p>Simple design with 87 basic keys.</p><p>Comes with a multi-touch touchpad for convenient use.</p><p>Ultra-smooth 10m wireless connection via USB receiver.</p><p>Good impact and drop resistance, waterproof in case of accidental spills.</p><p>Integrated media hotkeys add convenience to use.</p><p>Encrypted according to the Advanced Encryption Standard (AES).</p>', 9, '2021-10-15 01:41:02', '2021-10-15 01:41:02', 'Microsoft_All-in-one_Media_Wireless_Keyboard_N9Z-00028_Black-1.jpg', NULL),
(10, 'iPhone 11 64GB', '16990000', '/storage/product/apple-iphone-11-tim-didongviet_5.jpg', '<p>The ability to take photos on the iPhone is undisputed when the details, white balance, color, ... are all very good. Although there is no Tele camera, the ability to remove fonts on both is impressive. Maybe the iPhone 11 will be slightly better than the XR when it comes to wide-angle photography.<br></p>', 11, '2021-10-15 15:40:28', '2021-10-15 16:05:26', 'apple-iphone-11-tim-didongviet_5.jpg', NULL),
(11, 'iPhone 12 mini 64GB', '18990000', '/storage/product/GS.006037_FEATURE_70868.jpg', '<p>iPhone SE 2020 is equipped with a 4.7-inch screen with sharp Retina resolution, comes with A13 Bionic chip that has the performance to break all types of applications on the App Store. Besides, the device also owns modern technologies such as Wi-Fi 6, Gigabit LTE<br></p>', 11, '2021-10-15 15:48:28', '2021-10-15 16:06:16', 'GS.006037_FEATURE_70868.jpg', NULL),
(12, 'iPhone 12 Pro 128GB', '28490000', '/storage/product/iphone-12-pro-4_2.png', '<p>Phone 12 Pro series can easily defeat internal rivals thanks to the power of the latest chip, A14 Bionic combined with 6 GB RAM. All user tasks or playing heavy games will be weighed by them<br></p>', 11, '2021-10-15 15:51:41', '2021-10-15 16:24:50', 'iphone-12-pro-4_2.png', NULL),
(13, 'iPhone 12 Pro Max 128GB', '30990000', '/storage/product/iphone-12-pro-max-xam-new-600x600-200x200.jpg', '<p>12 promax has a square design that creates class in every angle. iPhone 12 Pro Max owns a large 6.7-inch screen (6.1 inches on iPhone 12 Pro) with Super Retina XDR OLED panel, ensuring to bring you the best visual experience space.<br></p>', 11, '2021-10-15 15:53:31', '2021-10-15 16:25:49', 'iphone-12-pro-max-xam-new-600x600-200x200.jpg', NULL),
(14, 'OPPO Find X3 Pro 5G 12GB/256GB', '21990000', '/storage/product/oppo-find-x3-pro-black-001-1-600x600.jpg', '<p>OPPO has dominated the smartphone market with the launch of the OPPO Find X3 Pro 5G phone. This is a product with a unique design, possessing a huge camera cluster, top configuration in the Android world. The result of endless creativity.<br></p>', 12, '2021-10-15 15:57:26', '2021-10-15 16:04:29', 'oppo-find-x3-pro-black-001-1-600x600.jpg', NULL),
(15, 'OPPO  A54 6GB/128GB', '4190000', '/storage/product/OPPO_A54_6GB_128G.jpg', '<p>The newly launched OPPO phone is the OPPO A54 phone model, which inherits the success of OPPO A53, owns a set of 3 intelligent AI cameras, a delicate selfie camera dot in the super wide borderless screen, smooth operation. but with stable performance and become different from competitors in the price range<br></p>', 12, '2021-10-15 15:59:39', '2021-10-15 15:59:39', 'OPPO_A54_6GB_128G.jpg', NULL),
(16, 'OPPO Reno5 Marvel (8GB/128GB)', '7990000', '/storage/product/oppo-reno5-marvel-thumb-600x600-200x200.jpg', '<p>The design of the Reno5 Marvel Edition is inspired by the quantum costume that the Avengers wear in the movie Avengers: Endgame. Harmonious combination of Marvel\'s signature colors: black, gray, silver and red, the limited-edition design makes a strong impression on any fan of the Marvel \"universe\".<br></p>', 12, '2021-10-15 16:01:47', '2021-10-15 16:01:47', 'oppo-reno5-marvel-thumb-600x600-200x200.jpg', NULL),
(17, 'Samsung Galaxy A51 6GB/128GB', '7490000', '/storage/product/samsung-galaxy-a51-blue-200x200.jpg', '<p>With configuration equipped with Exynos 9611 chip, 8 cores, with 6 GB RAM, 128 GB ROM, 4000 mAh battery capacity, Samsung Galaxy A51 can ensure smooth daily tasks, mobile games As popular as PUBG or Lien Quan can\'t make the machine difficult.<br></p>', 13, '2021-10-15 16:03:37', '2021-10-15 16:03:37', 'samsung-galaxy-a51-blue-200x200.jpg', NULL),
(18, 'Galaxy A50s', '5490000', '/storage/product/samsung-galaxy-a50s-den-200x200.jpg', '<p>Galaxy A50s is the name mentioned next in the top Samsung phones worth buying in the first half of 2020. From design, camera, configuration, battery of Samsung Galaxy A50s are highly appreciated in its segment.<br></p>', 13, '2021-10-15 16:08:12', '2021-10-15 16:08:12', 'samsung-galaxy-a50s-den-200x200.jpg', NULL),
(19, 'Samsung Galaxy S20', '1849000', '/storage/product/samsung-galaxy-s20-hong-600x600-600x600.jpg', '<p>The biggest common advantage of the&nbsp; Samsung S20&nbsp; series is that it is designed with a Dynamic AMOLED 2X screen, a perforated Infinity O with an ultra-thin border, an infinity screen that provides an unlimited entertainment experience.<br></p>', 13, '2021-10-15 16:12:24', '2021-10-15 16:12:24', 'samsung-galaxy-s20-hong-600x600-600x600.jpg', NULL),
(20, 'Xiaomi Mi 10', '13500000', '/storage/product/xiaomi-mi-10-600x600-1-600x600.jpg', '<p>If you are looking for a cheaper smartphone device, the Mi 10 Lite might be a better choice. Compared to the Mi 10 and 10 Pro duo, the Lite version has a weaker processor, a smaller screen and certainly a different camera. Mi 10 Lite also has a smaller battery and does not support fast charging.<br></p>', 14, '2021-10-15 16:18:17', '2021-10-15 16:18:17', 'xiaomi-mi-10-600x600-1-600x600.jpg', NULL),
(21, 'Mi 9T Pro', '9000000', '/storage/product/do_45k1-ob.jpg', '<p>Want a device like the Mi 9 but with a bigger battery and a more distinctive design? Mi 9T Pro fulfills that need. Despite being Xiaomi\'s flagship series, the Mi 9T duo does not support wireless charging, instead the product will have a 4000 mAh battery and a pop-up front camera. The 3.5mm headphone jack is also back with the 9T duo.<br></p>', 14, '2021-10-15 16:20:04', '2021-10-15 16:20:04', 'do_45k1-ob.jpg', NULL),
(22, 'Xiaomi POCO X3 Pro NFC 8GB-256GB', '7190000', '/storage/product/h3j5qb78wx7n7.jpg', '<p>Want a device like the Mi 9 but with a bigger battery and a more distinctive design? Mi 9T Pro fulfills that need. Despite being Xiaomi\'s flagship series, the Mi 9T duo does not support wireless charging, instead the product will have a 4000 mAh battery and a pop-up front camera. The 3.5mm headphone jack is also back with the 9T duo.<br></p>', 14, '2021-10-15 16:22:58', '2021-10-15 16:22:58', 'h3j5qb78wx7n7.jpg', NULL),
(23, 'Laptop Asus TUF Gaming FX516PM i7 11370H/8GB/512GB/6GB RTX 3060144Hz Win10 (HN002T)', '30000000', '/storage/product/637526137028914779_asus-tuf-gaming-fx516-xam-1.jpg', '<p><br></p><table class=\"table table-bordered\"><tbody><tr><td>CPU:<br></td><td>i711370H3.3GHz<br></td></tr><tr><td>RAM:<br></td><td>8 GBDDR4 2 slots (1 slot 8GB onboard + 1 empty slot)3200 MHz<br></td></tr><tr><td>Hard Drive:<br></td><td><td>Support 1 more M.2 PCIe SSD expansion slot (upgradeable up to 1TB)512</td><td>GB NVMe PCIe SSD (Removable, insert another stick up to 1TB)</td></td></tr><tr><td>Screen:<br></td><td>15.6\"Full HD (1920 x 1080)144Hz<br></td></tr><tr><td>Graphics card:<br></td><td>Discrete Card RTX 3060 6GB<br></td></tr><tr><td>Link:<br></td><td>3 x USB 3.2HDMI 2.0 Headphone Jack 3.5 mmLAN (RJ45)Thunderbolt 4 USB-C<br></td></tr><tr><td>Especially:<br></td><td>keyboard light<br></td></tr><tr><td>Operating system:<br></td><td>Windows 10<br></td></tr><tr><td>Design:<br></td><td>Plastic cover-metal back cover<br></td></tr><tr><td>Dimensions, weight:<br></td><td>360 mm long - 252 mm wide - 19.9 mm thick - 2 kg<br></td></tr><tr><td>Release time:<br></td><td>2021<br></td></tr></tbody></table><p><br></p>', 4, '2021-10-16 19:53:29', '2021-10-16 19:54:19', '637526137028914779_asus-tuf-gaming-fx516-xam-1.jpg', NULL),
(24, 'Laptop Asus TUF Gaming FX706HC i5 11400H/8GB/512GB/4GB RTX3050/144Hz Win10 (HX003T)', '26700000', '/storage/product/download (3).jfif', '<p><br></p><table class=\"table table-bordered\"><tbody><tr><td>CPU:<br></td><td>i511400H2.7GHz<br></td></tr><tr><td>RAM:<br></td><td>8 GBDDR4 2 slots (1 8GB slot + 1 discrete slot) 3200 MHz<br></td></tr><tr><td>Screen:<br></td><td>17.3\"Full HD (1920 x 1080)144Hz<br></td></tr><tr><td>Graphics card:<br></td><td>Discrete Card RTX 3050 4GB<br></td></tr><tr><td>Link:<br></td><td>Headphone Jack 3.5 mm Thunderbolt 4 USB-C3 x USB 3.2HDMI,LAN (RJ45)<br></td></tr><tr><td>Especially:<br></td><td>keyboard light<br></td></tr><tr><td>Operating system:<br></td><td>Windows 10<br></td></tr><tr><td>Design:<br></td><td>Plastic cover-metal back cover<br></td></tr><tr><td>Dimensions, weight:<br></td><td>399 mm long - 269 mm wide - 23.9 mm thick - 2.6 kg<br></td></tr><tr><td>Release time:<br></td><td>2021<br></td></tr></tbody></table><p><br></p>', 4, '2021-10-16 19:59:14', '2021-10-16 19:59:14', 'download (3).jfif', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) UNSIGNED NOT NULL,
  `img_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `img_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `img_path`, `product_id`, `created_at`, `updated_at`, `img_name`) VALUES
(1, '/storage/productImg/Asus_VivoBook_S433EA_i5_1135G7-5.jpg', 1, '2021-10-14 23:14:59', '2021-10-14 23:14:59', 'Asus_VivoBook_S433EA_i5_1135G7-5.jpg'),
(2, '/storage/productImg/Asus_VivoBook_S433EA_i5_1135G7-4.jpg', 1, '2021-10-14 23:14:59', '2021-10-14 23:14:59', 'Asus_VivoBook_S433EA_i5_1135G7-4.jpg'),
(3, '/storage/productImg/Asus_VivoBook_S433EA_i5_1135G7-3.jpg', 1, '2021-10-14 23:14:59', '2021-10-14 23:14:59', 'Asus_VivoBook_S433EA_i5_1135G7-3.jpg'),
(4, '/storage/productImg/Asus_VivoBook_S433EA_i5_1135G7-2.jpg', 1, '2021-10-14 23:14:59', '2021-10-14 23:14:59', 'Asus_VivoBook_S433EA_i5_1135G7-2.jpg'),
(5, '/storage/productImg/ASUS_TUF_Gaming F15_FX506LH-HN002T-5.jpg', 2, '2021-10-14 23:38:52', '2021-10-14 23:38:52', 'ASUS_TUF_Gaming F15_FX506LH-HN002T-5.jpg'),
(6, '/storage/productImg/ASUS_TUF_Gaming F15_FX506LH-HN002T-4.jpg', 2, '2021-10-14 23:38:52', '2021-10-14 23:38:52', 'ASUS_TUF_Gaming F15_FX506LH-HN002T-4.jpg'),
(7, '/storage/productImg/ASUS_TUF_Gaming F15_FX506LH-HN002T-3.jfif', 2, '2021-10-14 23:38:52', '2021-10-14 23:38:52', 'ASUS_TUF_Gaming F15_FX506LH-HN002T-3.jfif'),
(8, '/storage/productImg/ASUS_TUF_Gaming F15_FX506LH-HN002T-2.jpg', 2, '2021-10-14 23:38:52', '2021-10-14 23:38:52', 'ASUS_TUF_Gaming F15_FX506LH-HN002T-2.jpg'),
(9, '/storage/productImg/AirPods_2_Apple_MV7N2_Bluetooth_Headphones-5.jpeg', 3, '2021-10-15 00:27:24', '2021-10-15 00:27:24', 'AirPods_2_Apple_MV7N2_Bluetooth_Headphones-5.jpeg'),
(10, '/storage/productImg/AirPods_2_Apple_MV7N2_Bluetooth_Headphones-4.jfif', 3, '2021-10-15 00:27:24', '2021-10-15 00:27:24', 'AirPods_2_Apple_MV7N2_Bluetooth_Headphones-4.jfif'),
(11, '/storage/productImg/AirPods_2_Apple_MV7N2_Bluetooth_Headphones-3.jfif', 3, '2021-10-15 00:27:24', '2021-10-15 00:27:24', 'AirPods_2_Apple_MV7N2_Bluetooth_Headphones-3.jfif'),
(12, '/storage/productImg/AirPods_2_Apple_MV7N2_Bluetooth_Headphones-2.jfif', 3, '2021-10-15 00:27:24', '2021-10-15 00:27:24', 'AirPods_2_Apple_MV7N2_Bluetooth_Headphones-2.jfif'),
(13, '/storage/productImg/Beats_Studio_Buds_True_Wireless_Bluetooth_Headset_MJ4X3-5.jfif', 4, '2021-10-15 00:31:58', '2021-10-15 00:31:58', 'Beats_Studio_Buds_True_Wireless_Bluetooth_Headset_MJ4X3-5.jfif'),
(14, '/storage/productImg/Beats_Studio_Buds_True_Wireless_Bluetooth_Headset_MJ4X3-4.png', 4, '2021-10-15 00:31:58', '2021-10-15 00:31:58', 'Beats_Studio_Buds_True_Wireless_Bluetooth_Headset_MJ4X3-4.png'),
(15, '/storage/productImg/Beats_Studio_Buds_True_Wireless_Bluetooth_Headset_MJ4X3-3.jfif', 4, '2021-10-15 00:31:58', '2021-10-15 00:31:58', 'Beats_Studio_Buds_True_Wireless_Bluetooth_Headset_MJ4X3-3.jfif'),
(16, '/storage/productImg/Beats_Studio_Buds_True_Wireless_Bluetooth_Headset_MJ4X3-2.jpg', 4, '2021-10-15 00:31:58', '2021-10-15 00:31:58', 'Beats_Studio_Buds_True_Wireless_Bluetooth_Headset_MJ4X3-2.jpg'),
(17, '/storage/productImg/AirPods_Max_Apple_Bluetooth_Earphones_MYH3-4.png', 5, '2021-10-15 01:15:59', '2021-10-15 01:15:59', 'AirPods_Max_Apple_Bluetooth_Earphones_MYH3-4.png'),
(18, '/storage/productImg/AirPods_Max_Apple_Bluetooth_Earphones_MYH3-3.jfif', 5, '2021-10-15 01:15:59', '2021-10-15 01:15:59', 'AirPods_Max_Apple_Bluetooth_Earphones_MYH3-3.jfif'),
(19, '/storage/productImg/AirPods_Max_Apple_Bluetooth_Earphones_MYH3-2.jfif', 5, '2021-10-15 01:15:59', '2021-10-15 01:15:59', 'AirPods_Max_Apple_Bluetooth_Earphones_MYH3-2.jfif'),
(20, '/storage/productImg/AirPods_Max_Apple_Bluetooth_Earphones_MYH3-1.jpg', 5, '2021-10-15 01:15:59', '2021-10-15 01:15:59', 'AirPods_Max_Apple_Bluetooth_Earphones_MYH3-1.jpg'),
(21, '/storage/productImg/Power_bank_polymer_10,000_mAh_Hydrus_PA_CK01-5.jfif', 6, '2021-10-15 01:23:16', '2021-10-15 01:23:16', 'Power_bank_polymer_10,000_mAh_Hydrus_PA_CK01-5.jfif'),
(22, '/storage/productImg/Power_bank_polymer_10,000_mAh_Hydrus_PA_CK01-4.jfif', 6, '2021-10-15 01:23:16', '2021-10-15 01:23:16', 'Power_bank_polymer_10,000_mAh_Hydrus_PA_CK01-4.jfif'),
(23, '/storage/productImg/Power_bank_polymer_10,000_mAh_Hydrus_PA_CK01-2.jpg', 6, '2021-10-15 01:23:16', '2021-10-15 01:23:16', 'Power_bank_polymer_10,000_mAh_Hydrus_PA_CK01-2.jpg'),
(24, '/storage/productImg/Power_bank_polymer_10,000_mAh_Hydrus_PA_CK01-1.jpg', 6, '2021-10-15 01:23:16', '2021-10-15 01:23:16', 'Power_bank_polymer_10,000_mAh_Hydrus_PA_CK01-1.jpg'),
(25, '/storage/productImg/HyperX_Pulsefire_Core_RGB_Gaming_Mouse_Black-5.jpg', 7, '2021-10-15 01:28:01', '2021-10-15 01:28:01', 'HyperX_Pulsefire_Core_RGB_Gaming_Mouse_Black-5.jpg'),
(26, '/storage/productImg/HyperX_Pulsefire_Core_RGB_Gaming_Mouse_Black-4.jpg', 7, '2021-10-15 01:28:01', '2021-10-15 01:28:01', 'HyperX_Pulsefire_Core_RGB_Gaming_Mouse_Black-4.jpg'),
(27, '/storage/productImg/HyperX_Pulsefire_Core_RGB_Gaming_Mouse_Black-3.jpg', 7, '2021-10-15 01:28:01', '2021-10-15 01:28:01', 'HyperX_Pulsefire_Core_RGB_Gaming_Mouse_Black-3.jpg'),
(28, '/storage/productImg/HyperX_Pulsefire_Core_RGB_Gaming_Mouse_Black-2.jpg', 7, '2021-10-15 01:28:01', '2021-10-15 01:28:01', 'HyperX_Pulsefire_Core_RGB_Gaming_Mouse_Black-2.jpg'),
(29, '/storage/productImg/Rapoo_MT550_Bluetooth_Wireless_Mouse_Black-5.jpg', 8, '2021-10-15 01:31:00', '2021-10-15 01:31:00', 'Rapoo_MT550_Bluetooth_Wireless_Mouse_Black-5.jpg'),
(30, '/storage/productImg/Rapoo_MT550_Bluetooth_Wireless_Mouse_Black-4.jfif', 8, '2021-10-15 01:31:00', '2021-10-15 01:31:00', 'Rapoo_MT550_Bluetooth_Wireless_Mouse_Black-4.jfif'),
(31, '/storage/productImg/Rapoo_MT550_Bluetooth_Wireless_Mouse_Black-3.jfif', 8, '2021-10-15 01:31:00', '2021-10-15 01:31:00', 'Rapoo_MT550_Bluetooth_Wireless_Mouse_Black-3.jfif'),
(32, '/storage/productImg/Rapoo_MT550_Bluetooth_Wireless_Mouse_Black-2.jpg', 8, '2021-10-15 01:31:00', '2021-10-15 01:31:00', 'Rapoo_MT550_Bluetooth_Wireless_Mouse_Black-2.jpg'),
(33, '/storage/productImg/Microsoft_All-in-one_Media_Wireless_Keyboard_N9Z-00028_Black-5.jpg', 9, '2021-10-15 01:41:02', '2021-10-15 01:41:02', 'Microsoft_All-in-one_Media_Wireless_Keyboard_N9Z-00028_Black-5.jpg'),
(34, '/storage/productImg/Microsoft_All-in-one_Media_Wireless_Keyboard_N9Z-00028_Black-4.jpg', 9, '2021-10-15 01:41:02', '2021-10-15 01:41:02', 'Microsoft_All-in-one_Media_Wireless_Keyboard_N9Z-00028_Black-4.jpg'),
(35, '/storage/productImg/Microsoft_All-in-one_Media_Wireless_Keyboard_N9Z-00028_Black-3.jpg', 9, '2021-10-15 01:41:02', '2021-10-15 01:41:02', 'Microsoft_All-in-one_Media_Wireless_Keyboard_N9Z-00028_Black-3.jpg'),
(36, '/storage/productImg/Microsoft_All-in-one_Media_Wireless_Keyboard_N9Z-00028_Black-2.jpg', 9, '2021-10-15 01:41:02', '2021-10-15 01:41:02', 'Microsoft_All-in-one_Media_Wireless_Keyboard_N9Z-00028_Black-2.jpg'),
(37, '/storage/productImg/iphone-11-xanh-la-2-org.jpg', 10, '2021-10-15 15:40:28', '2021-10-15 15:40:28', 'iphone-11-xanh-la-2-org.jpg'),
(38, '/storage/productImg/iphone-11-xanh-la-4-org.jpg', 10, '2021-10-15 15:40:28', '2021-10-15 15:40:28', 'iphone-11-xanh-la-4-org.jpg'),
(39, '/storage/productImg/iphone-11-xanh-la-5-1-org.jpg', 10, '2021-10-15 15:40:28', '2021-10-15 15:40:28', 'iphone-11-xanh-la-5-1-org.jpg'),
(40, '/storage/productImg/iphone-11-xanh-la-8-org.jpg', 10, '2021-10-15 15:40:28', '2021-10-15 15:40:28', 'iphone-11-xanh-la-8-org.jpg'),
(41, '/storage/productImg/iphone-12-den-2-org.jpg', 11, '2021-10-15 15:48:28', '2021-10-15 15:48:28', 'iphone-12-den-2-org.jpg'),
(42, '/storage/productImg/iphone-12-den-4-org.jpg', 11, '2021-10-15 15:48:28', '2021-10-15 15:48:28', 'iphone-12-den-4-org.jpg'),
(43, '/storage/productImg/iphone-12-den-6-org.jpg', 11, '2021-10-15 15:48:28', '2021-10-15 15:48:28', 'iphone-12-den-6-org.jpg'),
(44, '/storage/productImg/iphone-12-den-9-org.jpg', 11, '2021-10-15 15:48:28', '2021-10-15 15:48:28', 'iphone-12-den-9-org.jpg'),
(45, '/storage/productImg/iphone-12-pro-xanh-1-org.jpg', 12, '2021-10-15 15:51:41', '2021-10-15 15:51:41', 'iphone-12-pro-xanh-1-org.jpg'),
(46, '/storage/productImg/iphone-12-pro-xanh-2-org.jpg', 12, '2021-10-15 15:51:41', '2021-10-15 15:51:41', 'iphone-12-pro-xanh-2-org.jpg'),
(47, '/storage/productImg/iphone-12-pro-xanh-3-org.jpg', 12, '2021-10-15 15:51:41', '2021-10-15 15:51:41', 'iphone-12-pro-xanh-3-org.jpg'),
(48, '/storage/productImg/iphone-12-pro-xanh-5-org.jpg', 12, '2021-10-15 15:51:41', '2021-10-15 15:51:41', 'iphone-12-pro-xanh-5-org.jpg'),
(49, '/storage/productImg/iphone-12-pro-max-512gb-bac-1-org.jpg', 13, '2021-10-15 15:53:31', '2021-10-15 15:53:31', 'iphone-12-pro-max-512gb-bac-1-org.jpg'),
(50, '/storage/productImg/iphone-12-pro-max-512gb-bac-4-org.jpg', 13, '2021-10-15 15:53:31', '2021-10-15 15:53:31', 'iphone-12-pro-max-512gb-bac-4-org.jpg'),
(51, '/storage/productImg/iphone-12-pro-max-512gb-bac-5-org.jpg', 13, '2021-10-15 15:53:31', '2021-10-15 15:53:31', 'iphone-12-pro-max-512gb-bac-5-org.jpg'),
(52, '/storage/productImg/iphone-12-pro-max-512gb-bac-6-org.jpg', 13, '2021-10-15 15:53:31', '2021-10-15 15:53:31', 'iphone-12-pro-max-512gb-bac-6-org.jpg'),
(53, '/storage/productImg/oppo-find-x3-pro-den-5-org.jpg', 14, '2021-10-15 15:57:26', '2021-10-15 15:57:26', 'oppo-find-x3-pro-den-5-org.jpg'),
(54, '/storage/productImg/oppo-find-x3-pro-den-6-org.jpg', 14, '2021-10-15 15:57:26', '2021-10-15 15:57:26', 'oppo-find-x3-pro-den-6-org.jpg'),
(55, '/storage/productImg/oppo-find-x3-pro-den-8-org.jpg', 14, '2021-10-15 15:57:26', '2021-10-15 15:57:26', 'oppo-find-x3-pro-den-8-org.jpg'),
(56, '/storage/productImg/oppo-find-x3-pro-den-10-org.jpg', 14, '2021-10-15 15:57:26', '2021-10-15 15:57:26', 'oppo-find-x3-pro-den-10-org.jpg'),
(57, '/storage/productImg/oppo-a54-xanh-duong-1-org.jpg', 15, '2021-10-15 15:59:39', '2021-10-15 15:59:39', 'oppo-a54-xanh-duong-1-org.jpg'),
(58, '/storage/productImg/oppo-a54-xanh-duong-2-org.jpg', 15, '2021-10-15 15:59:39', '2021-10-15 15:59:39', 'oppo-a54-xanh-duong-2-org.jpg'),
(59, '/storage/productImg/oppo-a54-xanh-duong-4-org.jpg', 15, '2021-10-15 15:59:39', '2021-10-15 15:59:39', 'oppo-a54-xanh-duong-4-org.jpg'),
(60, '/storage/productImg/oppo-a54-xanh-duong-5-org.jpg', 15, '2021-10-15 15:59:39', '2021-10-15 15:59:39', 'oppo-a54-xanh-duong-5-org.jpg'),
(61, '/storage/productImg/oppo-reno5-marvel-1-1-org.jpg', 16, '2021-10-15 16:01:47', '2021-10-15 16:01:47', 'oppo-reno5-marvel-1-1-org.jpg'),
(62, '/storage/productImg/oppo-reno5-marvel-2-1-org.jpg', 16, '2021-10-15 16:01:47', '2021-10-15 16:01:47', 'oppo-reno5-marvel-2-1-org.jpg'),
(63, '/storage/productImg/oppo-reno5-marvel-3-1-org.jpg', 16, '2021-10-15 16:01:47', '2021-10-15 16:01:47', 'oppo-reno5-marvel-3-1-org.jpg'),
(64, '/storage/productImg/oppo-reno5-marvel-4-1-org.jpg', 16, '2021-10-15 16:01:47', '2021-10-15 16:01:47', 'oppo-reno5-marvel-4-1-org.jpg'),
(65, '/storage/productImg/samsung-galaxy-a51-bac-inox-1-org.jpg', 17, '2021-10-15 16:03:37', '2021-10-15 16:03:37', 'samsung-galaxy-a51-bac-inox-1-org.jpg'),
(66, '/storage/productImg/samsung-galaxy-a51-bac-inox-2-org.jpg', 17, '2021-10-15 16:03:37', '2021-10-15 16:03:37', 'samsung-galaxy-a51-bac-inox-2-org.jpg'),
(67, '/storage/productImg/samsung-galaxy-a51-bac-inox-4-org.jpg', 17, '2021-10-15 16:03:37', '2021-10-15 16:03:37', 'samsung-galaxy-a51-bac-inox-4-org.jpg'),
(68, '/storage/productImg/samsung-galaxy-a51-bac-inox-5-org.jpg', 17, '2021-10-15 16:03:37', '2021-10-15 16:03:37', 'samsung-galaxy-a51-bac-inox-5-org.jpg'),
(69, '/storage/productImg/samsung-galaxy-a50s-1-1-org.jpg', 18, '2021-10-15 16:08:12', '2021-10-15 16:08:12', 'samsung-galaxy-a50s-1-1-org.jpg'),
(70, '/storage/productImg/samsung-galaxy-a50s-4-1-org.jpg', 18, '2021-10-15 16:08:12', '2021-10-15 16:08:12', 'samsung-galaxy-a50s-4-1-org.jpg'),
(71, '/storage/productImg/samsung-galaxy-a50s-5-1-org.jpg', 18, '2021-10-15 16:08:12', '2021-10-15 16:08:12', 'samsung-galaxy-a50s-5-1-org.jpg'),
(72, '/storage/productImg/samsung-galaxy-a50s-11-org.jpg', 18, '2021-10-15 16:08:12', '2021-10-15 16:08:12', 'samsung-galaxy-a50s-11-org.jpg'),
(73, '/storage/productImg/samsung-galaxy-s20-hong-5-org.jpg', 19, '2021-10-15 16:12:24', '2021-10-15 16:12:24', 'samsung-galaxy-s20-hong-5-org.jpg'),
(74, '/storage/productImg/samsung-galaxy-s20-hong-6-org.jpg', 19, '2021-10-15 16:12:24', '2021-10-15 16:12:24', 'samsung-galaxy-s20-hong-6-org.jpg'),
(75, '/storage/productImg/samsung-galaxy-s20-hong-7-org.jpg', 19, '2021-10-15 16:12:24', '2021-10-15 16:12:24', 'samsung-galaxy-s20-hong-7-org.jpg'),
(76, '/storage/productImg/samsung-galaxy-s20-hong-11-org.jpg', 19, '2021-10-15 16:12:24', '2021-10-15 16:12:24', 'samsung-galaxy-s20-hong-11-org.jpg'),
(77, '/storage/productImg/samsung-galaxy-s20-hong-600x600-600x600.jpg', 19, '2021-10-15 16:12:24', '2021-10-15 16:12:24', 'samsung-galaxy-s20-hong-600x600-600x600.jpg'),
(78, '/storage/productImg/cam-sau-xiaomi-mi-10.jpg', 20, '2021-10-15 16:18:17', '2021-10-15 16:18:17', 'cam-sau-xiaomi-mi-10.jpg'),
(79, '/storage/productImg/canh-duoi-xiaomi-mi-10.jpg', 20, '2021-10-15 16:18:17', '2021-10-15 16:18:17', 'canh-duoi-xiaomi-mi-10.jpg'),
(80, '/storage/productImg/canh-tren-xiaomi-mi-10.jpg', 20, '2021-10-15 16:18:17', '2021-10-15 16:18:17', 'canh-tren-xiaomi-mi-10.jpg'),
(81, '/storage/productImg/man-hinh-xiaomi-mi-10.jpg', 20, '2021-10-15 16:18:17', '2021-10-15 16:18:17', 'man-hinh-xiaomi-mi-10.jpg'),
(82, '/storage/productImg/1567837522-579-b-1567765372-width660height488.jpg', 21, '2021-10-15 16:20:04', '2021-10-15 16:20:04', '1567837522-579-b-1567765372-width660height488.jpg'),
(83, '/storage/productImg/Mi-9T-Pro-3-960x540.jpg', 21, '2021-10-15 16:20:04', '2021-10-15 16:20:04', 'Mi-9T-Pro-3-960x540.jpg'),
(84, '/storage/productImg/xiaomi-mi-9t-pro-cu-moi-gia-re-chinh-hang-cho-tot.jpg', 21, '2021-10-15 16:20:04', '2021-10-15 16:20:04', 'xiaomi-mi-9t-pro-cu-moi-gia-re-chinh-hang-cho-tot.jpg'),
(85, '/storage/productImg/xiaomi-mi-9t-pro-xanh-1020x680-org.jpg', 21, '2021-10-15 16:20:04', '2021-10-15 16:20:04', 'xiaomi-mi-9t-pro-xanh-1020x680-org.jpg'),
(86, '/storage/productImg/253e86fb5b58de34d32308f7324538881889a021.jpg', 22, '2021-10-15 16:22:58', '2021-10-15 16:22:58', '253e86fb5b58de34d32308f7324538881889a021.jpg'),
(87, '/storage/productImg/images (1).jfif', 22, '2021-10-15 16:22:58', '2021-10-15 16:22:58', 'images (1).jfif'),
(88, '/storage/productImg/images (2).jfif', 22, '2021-10-15 16:22:58', '2021-10-15 16:22:58', 'images (2).jfif'),
(89, '/storage/productImg/images.jfif', 22, '2021-10-15 16:22:58', '2021-10-15 16:22:58', 'images.jfif'),
(90, '/storage/productImg/asus-tuf-dash-gaming-f15-fx516pm-3.jpg', 23, '2021-10-16 19:53:29', '2021-10-16 19:53:29', 'asus-tuf-dash-gaming-f15-fx516pm-3.jpg'),
(91, '/storage/productImg/download (1).jfif', 23, '2021-10-16 19:53:29', '2021-10-16 19:53:29', 'download (1).jfif'),
(92, '/storage/productImg/download (3).jfif', 23, '2021-10-16 19:53:29', '2021-10-16 19:53:29', 'download (3).jfif'),
(93, '/storage/productImg/tải xuống.jfif', 23, '2021-10-16 19:53:29', '2021-10-16 19:53:29', 'tải xuống.jfif'),
(94, '/storage/productImg/download (1).jfif', 24, '2021-10-16 19:59:14', '2021-10-16 19:59:14', 'download (1).jfif'),
(95, '/storage/productImg/download.jfif', 24, '2021-10-16 19:59:14', '2021-10-16 19:59:14', 'download.jfif'),
(96, '/storage/productImg/tải xuống (1).jfif', 24, '2021-10-16 19:59:14', '2021-10-16 19:59:14', 'tải xuống (1).jfif'),
(97, '/storage/productImg/tải xuống.jfif', 24, '2021-10-16 19:59:14', '2021-10-16 19:59:14', 'tải xuống.jfif');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'System management', NULL, NULL),
(2, 'guest', 'Customer', NULL, NULL),
(3, 'developer', 'Development system', NULL, NULL),
(4, 'content', 'Edit content', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `role_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 16, 1, NULL, NULL),
(5, 23, 2, NULL, NULL),
(6, 24, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `config_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `config_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `description`, `image_path`, `image_name`, `created_at`, `updated_at`) VALUES
(4, 'Slider 1', '<p>Hello</p>', '/storage/slider/slider_iphone.jpeg', 'slider_iphone.jpeg', '2021-10-14 21:00:34', '2021-10-14 21:00:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `is_admin`, `created_at`, `updated_at`, `deleted_at`) VALUES
(16, 'Hoang', 'mh998@gmail.com', NULL, '$2y$10$PUhcAM9oe.uy7EG1hD0EbeGU4mSBsVJJe.DXXdMmFNWeMuZPUzFbO', 'q3h5sWOOB8KxKvwCKgIA3M7xlW8V2Dbmkm7ydupk3trEHwxy5geFg2oBkjgs', 1, '2021-10-08 03:29:13', '2021-10-08 03:29:13', NULL),
(24, 'Huy', 'hd6112002a@gmail.com', NULL, '$2y$10$mlJzPIZF6i3p7glQec81muF8ObKdD6o6yNbEcJBWaop8AIXAFT4RS', NULL, 1, '2021-10-10 02:13:10', '2021-10-13 20:56:03', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
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
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items` (`order_id`),
  ADD KEY `order_product` (`product_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_roles` (`permission_id`),
  ADD KEY `role_permission` (`role_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category` (`category_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Imgaes_Product` (`product_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user` (`role_id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_roles` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `role_permission` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `Imgaes_Product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
