-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 24, 2023 lúc 10:00 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.3.27

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
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `slug`, `created_at`, `updated_at`, `deleted_at`, `type`, `description`) VALUES
(25, 'Xã Hội', 0, 'xa-hoi', '2021-06-20 13:36:22', '2021-06-20 13:36:22', NULL, 'post', 'Cập nhật các tin tức xã hội'),
(26, 'Bóng Đá', 0, 'bong-da', '2021-06-22 12:30:18', '2021-06-22 12:30:18', NULL, 'post', 'Cập nhật các tin tức bóng đá'),
(27, 'Bóng đá châu âu', 26, 'bong-da-chau-au', '2021-06-22 12:31:26', '2021-06-22 12:31:26', NULL, 'post', 'cập nhật tin tức bóng đá châu âu'),
(28, 'Bóng đá đông nam á', 26, 'bong-da-dong-nam-a', '2021-06-22 12:32:37', '2021-06-22 12:32:37', NULL, 'post', 'Cập nhật tin tức bóng đá đông nam á'),
(29, 'Bóng đá việt nam', 28, 'bong-da-viet-nam', '2021-06-22 12:33:43', '2021-06-22 12:33:43', NULL, 'post', 'Cập nhật tin tức bóng đá việt nam'),
(30, 'Bóng đá thái lan', 28, 'bong-da-thai-lan', '2021-06-22 12:35:00', '2021-06-22 12:35:00', NULL, 'post', 'Cập nhập tin tức bóng đá thái lan'),
(33, 'test1', 25, 'test1', '2021-07-06 13:49:01', '2021-07-06 13:49:01', NULL, 'post', 'test1'),
(42, 'SPORTSWEAR', 0, 'sportswear', '2023-02-23 03:05:47', '2023-02-23 03:05:47', NULL, 'product', 'SPORTSWEAR clothes'),
(43, 'NIKE', 42, 'nike', '2023-02-23 03:06:15', '2023-02-23 03:06:15', NULL, 'product', 'NIKE'),
(44, 'UNDER ARMOUR', 42, 'under-armour', '2023-02-23 03:07:16', '2023-02-23 03:07:16', NULL, 'product', 'UNDER ARMOUR'),
(45, 'ADIDAS', 42, 'adidas', '2023-02-23 03:07:46', '2023-02-23 03:07:46', NULL, 'product', 'ADIDAS'),
(46, 'PUMA', 42, 'puma', '2023-02-23 03:08:00', '2023-02-23 03:08:00', NULL, 'product', 'PUMA'),
(47, 'ASICS', 42, 'asics', '2023-02-23 03:08:11', '2023-02-23 03:08:11', NULL, 'product', 'ASICS'),
(48, 'MENS', 0, 'mens', '2023-02-23 03:08:31', '2023-02-23 03:08:31', NULL, 'product', 'MENS'),
(49, 'FENDI', 48, 'fendi', '2023-02-23 03:09:42', '2023-02-23 03:09:42', NULL, 'product', 'FENDI'),
(50, 'GUESS', 48, 'guess', '2023-02-23 03:09:54', '2023-02-23 03:09:54', NULL, 'product', 'GUESS'),
(51, 'VALENTINO', 48, 'valentino', '2023-02-23 03:10:05', '2023-02-23 03:10:05', NULL, 'product', 'VALENTINO'),
(52, 'DIOR', 48, 'dior', '2023-02-23 03:10:20', '2023-02-23 03:10:20', NULL, 'product', 'DIOR'),
(53, 'VERSACE', 48, 'versace', '2023-02-23 03:10:30', '2023-02-23 03:10:30', NULL, 'product', 'VERSACE'),
(54, 'ARMANI', 48, 'armani', '2023-02-23 03:10:42', '2023-02-23 03:10:42', NULL, 'product', 'ARMANI'),
(55, 'PRADA', 48, 'prada', '2023-02-23 03:11:36', '2023-02-23 03:11:36', NULL, 'product', 'PRADA'),
(56, 'DOLCE AND GABBANA', 48, 'dolce-and-gabbana', '2023-02-23 03:11:47', '2023-02-23 03:11:47', NULL, 'product', 'DOLCE AND GABBANA'),
(57, 'CHANEL', 48, 'chanel', '2023-02-23 03:11:58', '2023-02-23 03:11:58', NULL, 'product', 'CHANEL'),
(58, 'GUCCI', 48, 'gucci', '2023-02-23 03:12:12', '2023-02-23 03:12:12', NULL, 'product', 'GUCCI'),
(59, 'WOMENS', 0, 'womens', '2023-02-23 03:12:25', '2023-02-23 03:12:25', NULL, 'product', 'WOMENS'),
(60, 'KIDS', 0, 'kids', '2023-02-23 03:14:43', '2023-02-23 03:14:43', NULL, 'product', 'KIDS'),
(61, 'FENDI WOMENS', 59, 'fendi-womens', '2023-02-23 03:15:18', '2023-02-23 03:15:18', NULL, 'product', 'FENDI WOMENS'),
(62, 'GUESS WOMENS', 59, 'guess-womens', '2023-02-23 03:15:38', '2023-02-23 03:15:38', NULL, 'product', 'GUESS WOMENS'),
(63, 'VALENTINO WOMENS', 59, 'valentino-womens', '2023-02-23 03:15:47', '2023-02-23 03:15:47', NULL, 'product', 'VALENTINO WOMENS'),
(64, 'DIOR WOMENS', 59, 'dior-womens', '2023-02-23 03:15:58', '2023-02-23 03:15:58', NULL, 'product', 'DIOR WOMENS'),
(65, 'VERSACE WOMENS', 59, 'versace-womens', '2023-02-23 03:16:07', '2023-02-23 03:16:07', NULL, 'product', 'VERSACE WOMENS'),
(66, 'FASHION', 0, 'fashion', '2023-02-23 03:17:05', '2023-02-23 03:17:05', NULL, 'product', 'FASHION'),
(67, 'HOUSEHOLDS', 0, 'households', '2023-02-23 03:17:13', '2023-02-23 03:17:13', NULL, 'product', 'HOUSEHOLDS'),
(68, 'INTERIORS', 0, 'interiors', '2023-02-23 03:17:21', '2023-02-23 03:17:21', NULL, 'product', 'INTERIORS'),
(69, 'CLOTHING', 0, 'clothing', '2023-02-23 03:17:29', '2023-02-23 03:17:29', NULL, 'product', 'CLOTHING'),
(70, 'BAGS', 0, 'bags', '2023-02-23 03:17:36', '2023-02-23 03:17:36', NULL, 'product', 'BAGS'),
(71, 'SHOES', 0, 'shoes', '2023-02-23 03:17:45', '2023-02-23 03:17:45', NULL, 'product', 'SHOES');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `name`, `parent_id`, `created_at`, `updated_at`, `slug`, `deleted_at`) VALUES
(8, 'Home', 0, '2023-02-22 20:33:24', '2023-02-22 20:33:49', 'home', NULL),
(9, 'Shop', 0, '2023-02-22 20:34:17', '2023-02-22 20:34:17', 'shop', NULL),
(10, 'Blog', 0, '2023-02-22 20:34:43', '2023-02-22 20:34:43', 'blog', NULL),
(11, 'Contact', 0, '2023-02-22 20:35:36', '2023-02-22 20:35:36', 'contact', NULL),
(12, 'Products', 9, '2023-02-22 20:37:06', '2023-02-22 20:37:06', 'products', NULL),
(13, 'Top sản phẩm bán chạy', 9, '2023-02-22 20:42:24', '2023-02-22 20:43:07', 'top-san-pham-ban-chay', NULL),
(14, 'News', 10, '2023-02-22 20:43:41', '2023-02-22 20:43:41', 'news', NULL),
(15, 'About', 11, '2023-02-22 20:44:19', '2023-02-22 20:44:19', 'about', NULL),
(16, 'Location', 11, '2023-02-22 20:45:15', '2023-02-22 20:45:15', 'location', NULL),
(17, 'Áo xinh', 12, '2023-02-22 21:31:44', '2023-02-22 21:32:45', 'ao-xinh', '2023-02-22 21:32:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_03_043428_create_categories_table', 1),
(6, '2021_05_11_155716_add_column_deleted_at_table_categories', 2),
(7, '2021_05_11_163451_create_menus_table', 3),
(9, '2021_05_12_101555_add_column_slug_column_deleted_at_table_menu', 4),
(10, '2021_05_13_091003_create_products_table', 5),
(11, '2021_05_14_095958_create_product_images_table', 5),
(12, '2021_05_14_100251_create_tags_table', 5),
(13, '2021_05_14_100421_create_product_tags_table', 5),
(14, '2021_05_16_080232_add_column_feature_image_name', 6),
(15, '2021_05_16_082203_add_column_image_name_to_table_product_images', 7),
(23, '2021_05_16_112932_add_column_parent_module_to_table_product_images', 8),
(24, '2021_05_16_113126_rename_column_product_id_in_table_product_images', 8),
(26, '2021_05_18_144513_create_sliders_table', 9),
(28, '2021_05_19_062001_create_settings_table', 10),
(29, '2021_05_19_075616_add_column_type_table_settings', 11),
(30, '2021_05_21_054652_create_roles_table', 12),
(31, '2021_05_21_054718_create_permissions_table', 12),
(32, '2021_05_21_054906_create_table_user_role', 12),
(33, '2021_05_21_054959_create_table_permission_role', 12),
(34, '2021_05_21_092600_add_colum_deleted_at_table_users', 13),
(35, '2021_05_21_111839_add_column_parent_id_table_permissions', 14),
(36, '2021_06_13_152552_add_column_key_code_table_permissions', 15),
(37, '2021_06_20_175238_add_column_type_description_table_categories', 16),
(38, '2021_06_22_064815_create_posts_table', 17),
(39, '2021_06_22_191117_create_post_tags_table', 18),
(40, '2021_06_22_203259_add_column_feature_image_name_table_posts', 19),
(41, '2021_07_15_130450_add_extra_table_products', 20),
(42, '2023_02_23_174018_add_column_view_table_products', 21);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `key_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`, `parent_id`, `key_code`) VALUES
(33, 'Menu', 'Menu', '2021-06-14 13:50:58', '2021-06-14 13:50:58', 0, '0'),
(34, 'List Menu', 'List Menu', '2021-06-14 13:50:58', '2021-06-14 13:50:58', 33, 'list_menu'),
(35, 'Add Menu', 'Add Menu', '2021-06-14 13:50:58', '2021-06-14 13:50:58', 33, 'add_menu'),
(36, 'Update Menu', 'Update Menu', '2021-06-14 13:50:58', '2021-06-14 13:50:58', 33, 'update_menu'),
(37, 'Delete Menu', 'Delete Menu', '2021-06-14 13:50:58', '2021-06-14 13:50:58', 33, 'delete_menu'),
(38, 'Product', 'Product', '2021-06-14 13:51:05', '2021-06-14 13:51:05', 0, '0'),
(39, 'List Product', 'List Product', '2021-06-14 13:51:05', '2021-06-14 13:51:05', 38, 'list_product'),
(40, 'Add Product', 'Add Product', '2021-06-14 13:51:05', '2021-06-14 13:51:05', 38, 'add_product'),
(41, 'Update Product', 'Update Product', '2021-06-14 13:51:05', '2021-06-14 13:51:05', 38, 'update_product'),
(42, 'Delete Product', 'Delete Product', '2021-06-14 13:51:05', '2021-06-14 13:51:05', 38, 'delete_product'),
(43, 'Slider', 'Slider', '2021-06-14 13:51:11', '2021-06-14 13:51:11', 0, '0'),
(44, 'List Slider', 'List Slider', '2021-06-14 13:51:11', '2021-06-14 13:51:11', 43, 'list_slider'),
(45, 'Add Slider', 'Add Slider', '2021-06-14 13:51:11', '2021-06-14 13:51:11', 43, 'add_slider'),
(46, 'Update Slider', 'Update Slider', '2021-06-14 13:51:11', '2021-06-14 13:51:11', 43, 'update_slider'),
(47, 'Delete Slider', 'Delete Slider', '2021-06-14 13:51:11', '2021-06-14 13:51:11', 43, 'delete_slider'),
(48, 'Setting', 'Setting', '2021-06-14 13:51:17', '2021-06-14 13:51:17', 0, '0'),
(49, 'List Setting', 'List Setting', '2021-06-14 13:51:17', '2021-06-14 13:51:17', 48, 'list_setting'),
(50, 'Add Setting', 'Add Setting', '2021-06-14 13:51:17', '2021-06-14 13:51:17', 48, 'add_setting'),
(51, 'Update Setting', 'Update Setting', '2021-06-14 13:51:17', '2021-06-14 13:51:17', 48, 'update_setting'),
(52, 'Delete Setting', 'Delete Setting', '2021-06-14 13:51:17', '2021-06-14 13:51:17', 48, 'delete_setting'),
(53, 'User', 'User', '2021-06-14 13:51:24', '2021-06-14 13:51:24', 0, '0'),
(54, 'List User', 'List User', '2021-06-14 13:51:24', '2021-06-14 13:51:24', 53, 'list_user'),
(55, 'Add User', 'Add User', '2021-06-14 13:51:24', '2021-06-14 13:51:24', 53, 'add_user'),
(56, 'Update User', 'Update User', '2021-06-14 13:51:24', '2021-06-14 13:51:24', 53, 'update_user'),
(57, 'Delete User', 'Delete User', '2021-06-14 13:51:24', '2021-06-14 13:51:24', 53, 'delete_user'),
(58, 'Role', 'Role', '2021-06-14 13:51:32', '2021-06-14 13:51:32', 0, '0'),
(59, 'List Role', 'List Role', '2021-06-14 13:51:32', '2021-06-14 13:51:32', 58, 'list_role'),
(60, 'Add Role', 'Add Role', '2021-06-14 13:51:32', '2021-06-14 13:51:32', 58, 'add_role'),
(61, 'Update Role', 'Update Role', '2021-06-14 13:51:32', '2021-06-14 13:51:32', 58, 'update_role'),
(62, 'Delete Role', 'Delete Role', '2021-06-14 13:51:32', '2021-06-14 13:51:32', 58, 'delete_role'),
(63, 'Permission', 'Permission', '2021-06-14 13:51:45', '2021-06-14 13:51:45', 0, '0'),
(64, 'Add Permission', 'Add Permission', '2021-06-14 13:51:45', '2021-06-14 13:51:45', 63, 'add_permission'),
(66, 'Import Product', 'Import product data', '2021-06-28 11:37:10', '2021-06-28 11:37:10', 38, 'import_product'),
(67, 'Product Category', 'Product Category', '2021-06-28 11:39:44', '2021-06-28 11:39:44', 0, '0'),
(68, 'List Product Category', 'List Product Category', '2021-06-28 11:39:44', '2021-07-06 13:18:23', 67, 'list_product_category'),
(71, 'Add Product Category', 'Add Product Category', '2021-07-06 13:08:12', '2021-07-09 06:54:03', 67, 'add_product_category'),
(72, 'Update Product Category', 'Update Product Category', '2021-07-06 13:09:04', '2021-07-06 13:18:40', 67, 'update_product_category'),
(73, 'Delete Product Category', 'Delete Product Category', '2021-07-06 13:09:43', '2021-07-06 13:19:03', 67, 'delete_product_category'),
(74, 'Post Category', 'Post Category', '2021-07-06 13:22:21', '2021-07-06 13:22:21', 0, '0'),
(75, 'Add Post Category', 'Add Post Category', '2021-07-06 13:22:21', '2021-07-06 13:22:21', 74, 'add_post_category'),
(76, 'List Post Category', 'List Post Category', '2021-07-06 13:23:06', '2021-07-06 13:23:06', 74, 'list_post_category'),
(77, 'Update Post Category', 'Update Post Category', '2021-07-06 13:23:23', '2021-07-06 13:23:23', 74, 'update_post_category'),
(78, 'Delete Post Category', 'Delete Post Category', '2021-07-06 13:23:39', '2021-07-06 13:23:39', 74, 'delete_post_category'),
(79, 'List Permission', 'List Permission', '2021-07-06 14:12:10', '2021-07-06 14:12:10', 63, 'list_permission'),
(80, 'Update Permission', 'Update Permission', '2021-07-06 14:16:02', '2021-07-06 14:16:02', 63, 'update_permission'),
(81, 'Delete Permission', 'Delete Permission', '2021-07-06 14:16:29', '2021-07-06 14:16:29', 63, 'delete_permission'),
(82, 'Post', 'Post', '2021-07-07 02:56:23', '2021-07-07 02:56:23', 0, '0'),
(83, 'List Post', 'List Post', '2021-07-07 02:56:23', '2021-07-07 02:56:23', 82, 'list_post'),
(84, 'Add Post', 'Add Post', '2021-07-07 02:56:57', '2021-07-07 02:56:57', 82, 'add_post'),
(85, 'Update Post', 'Update Post', '2021-07-07 02:57:30', '2021-07-07 02:57:30', 82, 'update_post'),
(86, 'Delete Post', 'Delete Post', '2021-07-07 02:58:29', '2021-07-07 02:58:29', 82, 'delete_post');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(60, 6, 29, '2021-07-04 12:00:04', '2021-07-04 12:00:04'),
(61, 6, 30, '2021-07-04 12:00:04', '2021-07-04 12:00:04'),
(62, 6, 31, '2021-07-04 12:00:04', '2021-07-04 12:00:04'),
(63, 6, 32, '2021-07-04 12:00:04', '2021-07-04 12:00:04'),
(64, 6, 34, '2021-07-04 12:00:04', '2021-07-04 12:00:04'),
(65, 6, 35, '2021-07-04 12:00:04', '2021-07-04 12:00:04'),
(66, 6, 36, '2021-07-04 12:00:04', '2021-07-04 12:00:04'),
(67, 6, 37, '2021-07-04 12:00:04', '2021-07-04 12:00:04'),
(68, 6, 39, '2021-07-04 12:00:04', '2021-07-04 12:00:04'),
(69, 6, 40, '2021-07-04 12:00:04', '2021-07-04 12:00:04'),
(70, 6, 41, '2021-07-04 12:00:04', '2021-07-04 12:00:04'),
(71, 6, 42, '2021-07-04 12:00:04', '2021-07-04 12:00:04'),
(72, 6, 66, '2021-07-04 12:00:04', '2021-07-04 12:00:04'),
(73, 6, 44, '2021-07-04 12:00:04', '2021-07-04 12:00:04'),
(74, 6, 45, '2021-07-04 12:00:04', '2021-07-04 12:00:04'),
(75, 6, 46, '2021-07-04 12:00:04', '2021-07-04 12:00:04'),
(76, 6, 47, '2021-07-04 12:00:04', '2021-07-04 12:00:04'),
(77, 6, 49, '2021-07-04 12:00:04', '2021-07-04 12:00:04'),
(78, 6, 50, '2021-07-04 12:00:04', '2021-07-04 12:00:04'),
(79, 6, 51, '2021-07-04 12:00:04', '2021-07-04 12:00:04'),
(80, 6, 52, '2021-07-04 12:00:04', '2021-07-04 12:00:04'),
(81, 6, 54, '2021-07-04 12:00:04', '2021-07-04 12:00:04'),
(82, 6, 55, '2021-07-04 12:00:04', '2021-07-04 12:00:04'),
(83, 6, 56, '2021-07-04 12:00:04', '2021-07-04 12:00:04'),
(84, 6, 57, '2021-07-04 12:00:04', '2021-07-04 12:00:04'),
(85, 6, 59, '2021-07-04 12:00:04', '2021-07-04 12:00:04'),
(86, 6, 60, '2021-07-04 12:00:04', '2021-07-04 12:00:04'),
(87, 6, 61, '2021-07-04 12:00:04', '2021-07-04 12:00:04'),
(88, 6, 62, '2021-07-04 12:00:04', '2021-07-04 12:00:04'),
(89, 6, 64, '2021-07-04 12:00:04', '2021-07-04 12:00:04'),
(90, 6, 68, '2021-07-04 12:00:04', '2021-07-04 12:00:04'),
(104, 3, 34, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(105, 3, 35, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(106, 3, 36, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(107, 3, 37, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(108, 3, 39, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(109, 3, 40, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(110, 3, 41, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(111, 3, 42, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(112, 3, 66, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(113, 3, 44, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(114, 3, 45, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(115, 3, 46, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(116, 3, 47, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(117, 3, 49, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(118, 3, 50, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(119, 3, 51, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(120, 3, 52, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(121, 3, 54, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(122, 3, 55, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(123, 3, 56, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(124, 3, 57, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(125, 3, 59, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(126, 3, 60, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(127, 3, 61, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(128, 3, 62, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(129, 3, 64, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(130, 3, 79, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(131, 3, 80, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(132, 3, 81, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(133, 3, 68, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(134, 3, 71, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(135, 3, 72, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(136, 3, 73, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(137, 3, 75, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(138, 3, 76, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(139, 3, 77, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(140, 3, 78, '2021-07-06 14:52:34', '2021-07-06 14:52:34'),
(141, 3, 83, '2021-07-07 03:02:25', '2021-07-07 03:02:25'),
(142, 3, 84, '2021-07-07 03:02:25', '2021-07-07 03:02:25'),
(143, 3, 85, '2021-07-07 03:02:25', '2021-07-07 03:02:25'),
(144, 3, 86, '2021-07-07 03:02:25', '2021-07-07 03:02:25'),
(145, 3, 88, '2021-07-14 09:35:15', '2021-07-14 09:35:15'),
(146, 3, 87, '2021-07-14 10:32:01', '2021-07-14 10:32:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `feature_image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_image_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `user_id`, `category_id`, `feature_image_path`, `feature_image_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bầu Đức, bầu Hiển chưa phải đầu tư cho bóng đá nữ ngay năm 2021 như AFC đòi hỏi', 'bau-duc-bau-hien-chua-phai-dau-tu-cho-bong-da-nu-ngay-nam-2021-nhu-afc-doi-hoi', '<p><a href=\"https://thanhnien.vn/the-thao/bong-da-viet-nam/\" rel=\"\">Li&ecirc;n đo&agrave;n B&oacute;ng đ&aacute; Việt Nam</a>&nbsp;(VFF) đ&atilde; xin ph&eacute;p Li&ecirc;n đo&agrave;n B&oacute;ng đ&aacute; ch&acirc;u &Aacute; (AFC) cho l&ugrave;i việc thực hiện c&aacute;c ti&ecirc;u ch&iacute; cấp ph&eacute;p mới ngay năm 2021 m&agrave; chuyển sang năm 2022.</p>\r\n<p><img src=\"/storage/photos/1/Bongda.jpg\" alt=\"anh-bong-da\" /></p>\r\n<div>Ng&agrave;y 22.6, VFF đ&atilde; tổ chức hội thảo trực tuyến về cấp ph&eacute;p CLB theo ti&ecirc;u ch&iacute; của AFC, với sự tham dự của C&ocirc;ng ty cổ phần<a href=\"https://thanhnien.vn/the-thao/bong-da-viet-nam/khoa-tien-sinh-anh-co-biet-tai-sao-bong-da-viet-nam-thanh-cong-khong-136595t.html\" target=\"_blank\" rel=\"noopener\">&nbsp;b&oacute;ng đ&aacute; chuy&ecirc;n nghiệp Việt Nam</a>&nbsp;(VPF) v&agrave; c&aacute;c CLB chuy&ecirc;n nghiệp.</div>\r\n<div>Th&aacute;ng 1.2021, AFC đ&atilde; th&ocirc;ng b&aacute;o n&acirc;ng cấp rất nhiều ti&ecirc;u ch&iacute; cấp ph&eacute;p với những y&ecirc;u cầu rất khắt khe. Nếu kh&ocirc;ng thực hiện đủ c&aacute;c ti&ecirc;u ch&iacute;, c&aacute;c CLB sẽ kh&ocirc;ng được ph&eacute;p thi đấu tại V-League 2021.</div>\r\n<div>So với Quy chế cấp ph&eacute;p năm 2015, AFC đ&atilde; đưa ra những đ&ograve;i hỏi cao hơn v&agrave; nhiều ti&ecirc;u ch&iacute; hạng C (hạng khuyến kh&iacute;ch thực hiện) đ&atilde; được n&acirc;ng l&ecirc;n hạng bắt buộc phải thực hiện l&agrave; hạng B v&agrave; hạng A. V&iacute; dụ trong Quy chế cấp ph&eacute;p CLB năm 2021, AFC bắt buộc mỗi CLB dự V-League phải c&oacute; c&aacute;n bộ ph&aacute;p l&yacute;,<a href=\"https://thanhnien.vn/the-thao/bong-da-viet-nam/cong-vinh-se-moi-hlv-calisto-lam-giam-doc-ky-thuat-doi-bong-moi-129871t.html\" target=\"_blank\" rel=\"noopener\">&nbsp;Gi&aacute;m đốc kỹ thuật</a>, HLV thủ m&ocirc;n v&agrave; HLV thể lực (trước đ&acirc;y khuyến kh&iacute;ch thực hiện).&nbsp;</div>', 1, 29, 'public/posts/1/PNLayHRiEoIWFddkcScJXChRjhaaZMFMDbCQb8gw.jpg', 'Bongda.jpg', '2021-06-22 13:37:19', '2021-06-24 13:26:26', NULL),
(2, 'covid khủng hoảng', 'covid-khung-hoang', '<p><img src=\"/storage/photos/1/images.jpg\" alt=\"\" /></p>\r\n<p>abc</p>', 1, 25, 'public/posts/1/p9lCYwAW3y5pYMbKAhWcKBdRDzxhwH2HPhXHBZEf.jpg', 'download (1).jpg', '2021-06-24 13:30:27', '2021-07-14 12:42:09', '2021-07-14 12:42:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_tags`
--

CREATE TABLE `post_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post_tags`
--

INSERT INTO `post_tags` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 19, '2021-06-22 13:37:19', '2021-06-22 13:37:19'),
(4, 2, 22, '2021-06-24 13:30:27', '2021-06-24 13:30:27'),
(5, 3, 23, '2021-07-03 12:02:41', '2021-07-03 12:02:41'),
(6, 4, 21, '2021-07-03 12:26:57', '2021-07-03 12:26:57'),
(7, 4, 25, '2021-07-03 12:26:57', '2021-07-03 12:26:57'),
(8, 5, 23, '2021-07-14 09:38:04', '2021-07-14 09:38:04'),
(9, 7, 26, '2021-07-14 11:29:03', '2021-07-14 11:29:03'),
(10, 8, 27, '2021-07-14 11:31:33', '2021-07-14 11:31:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `feature_image_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promotional_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_start_date` date DEFAULT NULL,
  `discount_end_date` date DEFAULT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_management` tinyint(1) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `pre-order_allowed` tinyint(1) DEFAULT NULL,
  `out_of_stock_threshold` int(11) DEFAULT NULL,
  `sold_separately` tinyint(1) DEFAULT NULL,
  `weight` double(8,2) DEFAULT NULL,
  `long_size` double(8,2) DEFAULT NULL,
  `wide_size` double(8,2) DEFAULT NULL,
  `high_size` double(8,2) DEFAULT NULL,
  `properties` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `feature_image_path`, `content`, `user_id`, `category_id`, `created_at`, `updated_at`, `deleted_at`, `feature_image_name`, `promotional_price`, `discount_start_date`, `discount_end_date`, `sku`, `warehouse_management`, `stock`, `pre-order_allowed`, `out_of_stock_threshold`, `sold_separately`, `weight`, `long_size`, `wide_size`, `high_size`, `properties`, `payment_note`, `view`) VALUES
(32, 'Áo trung hồng', '599000', 'public/products/1/rwLvB8Hl0iuk3dykssx3aKJtqPNXRpsUqbilhEg3.jpg', '<p>&Aacute;o hồng si&ecirc;u đẹp</p>\r\n<p><img src=\"http://localhost:8000/storage/photos/1/product/recommend3.jpg\" alt=\"\" /></p>', 1, 61, '2023-02-23 04:17:55', '2023-02-23 04:17:55', NULL, 'recommend3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 99),
(33, 'Áo trung đỏ', '699000', 'public/products/1/GvI3wuGtd5jhUJ9yn3x7joW6KUOz3EGSwOHyLFtX.jpg', '<p>&Aacute;o trung đỏ đẹp si&ecirc;u xinh</p>\r\n<p><img src=\"http://localhost:8000/storage/photos/1/product/recommend2.jpg\" alt=\"\" /></p>', 1, 61, '2023-02-23 04:19:54', '2023-02-23 04:19:54', NULL, 'recommend2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 88),
(34, 'Áo 2 dây rằn', '499000', 'public/products/1/Uckufvzs37XG3II1inFWFdSXvGzld7jjr3hHkFt6.jpg', '<p>&aacute;o nữ 2 d&acirc;y đẹp</p>\r\n<p><img src=\"http://localhost:8000/storage/photos/1/product/recommend1.jpg\" alt=\"\" /></p>', 1, 61, '2023-02-23 04:22:35', '2023-02-23 04:22:35', NULL, 'recommend1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 111),
(35, 'Áo khoác xám', '599000', 'public/products/1/xzUUIWpYeIcFdtwjXjJD0H5iBpHsSnoIT80MpjCr.jpg', '<p>&aacute;o kho&aacute;c thời trang</p>', 1, 61, '2023-02-23 04:26:51', '2023-02-23 04:26:51', NULL, 'gallery4.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(36, 'Áo nữ văn phòng', '499000', 'public/products/1/hDFBz0pT4oDfIILZT6UkIliRrdID31AJ26SZD4qD.jpg', '<p>&Aacute;o văn ph&ograve;ng đẹp</p>', 1, 61, '2023-02-23 04:27:35', '2023-02-23 04:27:35', NULL, 'gallery3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(37, 'Áo nam polo xanh', '599000', 'public/products/1/ybEZQy6LP2iazVW8fHNaKoZ5LW4fcfhPlYHAuYOt.jpg', '<p>&aacute;o nam đẹp</p>', 1, 49, '2023-02-23 04:28:59', '2023-02-23 04:28:59', NULL, 'gallery2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
(38, 'Áo nữ 2 dây xịn', '499000', 'public/products/1/lW1zW2lyGSO39zpZ7TMK86lQ831kr6AC9HO5sJjZ.jpg', '<p>&aacute;o nữ đẹp</p>', 1, 61, '2023-02-23 04:30:06', '2023-02-23 04:30:06', NULL, 'gallery1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'Áo nữ polo trắng', '599000', 'public/products/1/zlweoNvuQZ6zvNePRh8KjHeGGgxdbjcv40HRqYji.jpg', '<p>&aacute;o xinh</p>', 1, 62, '2023-02-23 04:31:52', '2023-02-23 04:31:52', NULL, 'product6.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'Áo thun xanh', '599000', 'public/products/1/MYOcJa3mMd1GWapGTAL8S77XKp10GnXSyeOKh40Z.jpg', '<p>&aacute;o thun</p>', 1, 62, '2023-02-23 04:33:46', '2023-02-23 04:33:46', NULL, 'product5.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Váy đen nữ', '799000', 'public/products/1/bh4ei5IX8oxneIuJCzEEglMYOipI9lwDcCumSe4y.jpg', '<p>V&aacute;y nữ xinh</p>', 1, 62, '2023-02-23 04:35:05', '2023-02-23 04:35:05', NULL, 'product4.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'Váy đen nữ D2', '899000', 'public/products/1/flmrTSOWafYBPQ837ZbYZyTo2nDh3Q78Uj3UlSv4.jpg', '<p>v&aacute;y đẹp</p>', 1, 62, '2023-02-23 04:36:29', '2023-02-23 04:36:29', NULL, 'product3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'Áo polo nam nhiều màu', '599000', 'public/products/1/Uo67fa88k0P98oLDVYrj5CPvyFz8NDOV0ljUKgX5.jpg', '<p>&aacute;o xịn</p>', 1, 49, '2023-02-23 04:38:00', '2023-02-23 04:38:00', NULL, 'product2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'Áo khoác xanh', '799000', 'public/products/1/gXEvB4BQ4bZrrhu8oq8Rqk82siu9cIMOydNtKuqk.jpg', '<p>đẹp</p>', 1, 62, '2023-02-23 04:39:24', '2023-02-23 04:39:24', NULL, 'product1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `parent_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `image_path`, `parent_id`, `parent_type`, `created_at`, `updated_at`, `image_name`) VALUES
(46, 'public/products/1/wDp7ntnzi7QZe3OUPQmO6vBOgFLYgchPgYzY3C8e.jpg', 22, 'products', '2021-05-17 03:17:01', '2021-05-17 03:17:01', 'download (3).jpg'),
(47, 'public/products/1/BTlNOw5uaIFaUDLMbwN1HRW026bzzqt8XpOIpvEo.jpg', 22, 'products', '2021-05-17 03:17:01', '2021-05-17 03:17:01', 'download (4).jpg'),
(48, 'public/products/1/oW1oKBXecLGWtYdgtftCugFF32AKP73GHoFAJqzy.jpg', 23, 'products', '2021-05-17 03:30:05', '2021-05-17 03:30:05', 'download (1).jpg'),
(49, 'public/products/1/DwTORSB2HDw2ak3XOXQx1L0gil3BwujNZ0ccKygd.jpg', 23, 'products', '2021-05-17 03:30:05', '2021-05-17 03:30:05', 'images.jpg'),
(50, 'public/products/1/mnM6AAWY4ahDunu7WWFpunoyAWfCnH9XgKYisuhO.jpg', 24, 'products', '2021-05-17 03:31:15', '2021-05-17 03:31:15', 'download (4).jpg'),
(51, 'public/products/1/gpJj4RX3D3T1oilDg8hI8hfXYjPFyMkS6d8hkYoI.jpg', 24, 'products', '2021-05-17 03:31:15', '2021-05-17 03:31:15', 'images.jpg'),
(52, 'public/products/1/S0W2TqmVg1US4WhmIGZryXNyjT2EMRshazXQqpKE.jpg', 25, 'products', '2021-05-17 03:32:58', '2021-05-17 03:32:58', 'download (4).jpg'),
(53, 'public/products/1/xYZPZHfcLhubkxT3xZkzjugPAaPlcFQHMMbai7qm.jpg', 25, 'products', '2021-05-17 03:32:58', '2021-05-17 03:32:58', 'download.jpg'),
(54, 'public/products/1/3lj3hNuLRpY9S7iGiiAnVJez66KlD02FmNcipNXI.jpg', 26, 'products', '2021-06-24 14:49:13', '2021-06-24 14:49:13', 'download (1).jpg'),
(55, 'public/products/1/WO5WDEwob9mSrSk3f60srwxd7sU5RdBz1pGHy2t1.jpg', 26, 'products', '2021-06-24 14:49:13', '2021-06-24 14:49:13', 'download (2).jpg'),
(64, 'public/products/1/2pWy9EMKtopxFdlcz2HQwd1y15ZWQPH1BlyYpY7U.jpg', 31, 'products', '2021-07-03 09:20:52', '2021-07-03 09:20:52', 'download (1).jpg'),
(65, 'public/products/1/Wa5Y8vPmNHE0MkrIEicTv9e17hAOF14Zhywc6one.jpg', 31, 'products', '2021-07-03 09:20:52', '2021-07-03 09:20:52', 'download (2).jpg'),
(66, 'public/products/1/Ypn3bqkp711vdbEzESfiRfY1B4hIkm9JfiLIcAjA.jpg', 32, 'products', '2023-02-23 04:17:55', '2023-02-23 04:17:55', 'recommend1.jpg'),
(67, 'public/products/1/ry23KYaZRWPx1Cm60F4SXQgO7heCH7q6LYPF5jMH.jpg', 32, 'products', '2023-02-23 04:17:55', '2023-02-23 04:17:55', 'recommend2.jpg'),
(68, 'public/products/1/0Z8B46Xwd3A0Ir3v1v5vm96ylR79peK9KnuupgGm.jpg', 32, 'products', '2023-02-23 04:17:55', '2023-02-23 04:17:55', 'recommend3.jpg'),
(69, 'public/products/1/Xkkc3RZ5GoWUNuNqTe9uHalxyLVajNAlOnzSwdsb.jpg', 33, 'products', '2023-02-23 04:19:54', '2023-02-23 04:19:54', 'recommend1.jpg'),
(70, 'public/products/1/wHJJePqp7vHiUmhR9U3ds7isejwctFxLZzipzFz9.jpg', 33, 'products', '2023-02-23 04:19:54', '2023-02-23 04:19:54', 'recommend2.jpg'),
(71, 'public/products/1/XlyTqP4mMoTb01mbREFxuAJillnmHhCyhZi0RBtT.jpg', 33, 'products', '2023-02-23 04:19:54', '2023-02-23 04:19:54', 'recommend3.jpg'),
(72, 'public/products/1/kS1s7Yas0HT77qHWmd6c6Gx7m4GwwNextz0kWZqr.jpg', 34, 'products', '2023-02-23 04:22:35', '2023-02-23 04:22:35', 'recommend1.jpg'),
(73, 'public/products/1/Ium6Q2ezpkaLXsWg9xkwiFDLEeCzGZuyTAKa7pvs.jpg', 34, 'products', '2023-02-23 04:22:35', '2023-02-23 04:22:35', 'recommend2.jpg'),
(74, 'public/products/1/FOfBd4rJyWyWQOl8IvK3jaqqRps8U9AH9Parx492.jpg', 34, 'products', '2023-02-23 04:22:35', '2023-02-23 04:22:35', 'recommend3.jpg'),
(75, 'public/products/1/Iw3edgPZVNbtBp4KWXl4mnTBAedqqY6EJzXuVsRo.jpg', 35, 'products', '2023-02-23 04:26:51', '2023-02-23 04:26:51', 'gallery4.jpg'),
(76, 'public/products/1/QOSKNaqWvGA90kE87kmBAT2Ay1KXRYRRNvLYZKkY.jpg', 36, 'products', '2023-02-23 04:27:35', '2023-02-23 04:27:35', 'gallery3.jpg'),
(77, 'public/products/1/Fvz4bE2PAfvap1nEOFc949iIoW7c4NiF0GLzFRFn.jpg', 37, 'products', '2023-02-23 04:29:00', '2023-02-23 04:29:00', 'gallery2.jpg'),
(78, 'public/products/1/PpMNpMAku9F75HOzrlN0EAOf8y0Wu2T205qK87rw.jpg', 38, 'products', '2023-02-23 04:30:07', '2023-02-23 04:30:07', 'gallery1.jpg'),
(79, 'public/products/1/OmorI12Ugv8extTww8EDoEyeRflzhTAWaZahzRjb.jpg', 39, 'products', '2023-02-23 04:31:52', '2023-02-23 04:31:52', 'product6.jpg'),
(80, 'public/products/1/vKFNpaSTMJ9XTiHr8hkYyYoqoo0mA3gZd2l3V6Qx.jpg', 40, 'products', '2023-02-23 04:33:46', '2023-02-23 04:33:46', 'product5.jpg'),
(81, 'public/products/1/TdOLqJwm5wT35LJR1DlZIgUB3IvEwkSn2U6KJ0CG.jpg', 41, 'products', '2023-02-23 04:35:05', '2023-02-23 04:35:05', 'product4.jpg'),
(82, 'public/products/1/AasFV5d8DiG0e4iWFEtOrQHJDYhqaWe4edawI8x8.jpg', 42, 'products', '2023-02-23 04:36:29', '2023-02-23 04:36:29', 'product3.jpg'),
(83, 'public/products/1/X1qoZ1YJjDLDIZRMLVUEcijIapkIGxjvrdUQiTMA.jpg', 43, 'products', '2023-02-23 04:38:00', '2023-02-23 04:38:00', 'product2.jpg'),
(84, 'public/products/1/enOuzVDZg2tPmsVLBLuSwbH7dENFlG2ykV2xeQ17.jpg', 44, 'products', '2023-02-23 04:39:24', '2023-02-23 04:39:24', 'product1.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_tags`
--

CREATE TABLE `product_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_tags`
--

INSERT INTO `product_tags` (`id`, `product_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(19, 22, 13, '2021-05-17 03:00:10', '2021-05-17 03:00:10'),
(20, 22, 14, '2021-05-17 03:01:31', '2021-05-17 03:01:31'),
(21, 22, 15, '2021-05-17 03:18:48', '2021-05-17 03:18:48'),
(22, 23, 12, '2021-05-17 03:30:05', '2021-05-17 03:30:05'),
(23, 24, 16, '2021-05-17 03:31:15', '2021-05-17 03:31:15'),
(24, 24, 17, '2021-05-17 03:31:15', '2021-05-17 03:31:15'),
(25, 25, 18, '2021-05-17 03:32:58', '2021-05-17 03:32:58'),
(26, 26, 23, '2021-06-24 14:49:13', '2021-06-24 14:49:13'),
(30, 32, 29, '2023-02-23 04:17:55', '2023-02-23 04:17:55'),
(32, 33, 29, '2023-02-23 04:19:54', '2023-02-23 04:19:54'),
(38, 35, 28, '2023-02-23 04:26:51', '2023-02-23 04:26:51'),
(39, 35, 14, '2023-02-23 04:26:51', '2023-02-23 04:26:51'),
(40, 35, 31, '2023-02-23 04:26:51', '2023-02-23 04:26:51'),
(41, 36, 28, '2023-02-23 04:27:35', '2023-02-23 04:27:35'),
(42, 36, 14, '2023-02-23 04:27:35', '2023-02-23 04:27:35'),
(43, 37, 28, '2023-02-23 04:29:00', '2023-02-23 04:29:00'),
(44, 37, 12, '2023-02-23 04:29:00', '2023-02-23 04:29:00'),
(45, 38, 28, '2023-02-23 04:30:07', '2023-02-23 04:30:07'),
(46, 38, 14, '2023-02-23 04:30:07', '2023-02-23 04:30:07'),
(47, 38, 30, '2023-02-23 04:30:07', '2023-02-23 04:30:07'),
(48, 39, 28, '2023-02-23 04:31:53', '2023-02-23 04:31:53'),
(49, 39, 14, '2023-02-23 04:31:53', '2023-02-23 04:31:53'),
(51, 39, 33, '2023-02-23 04:32:56', '2023-02-23 04:32:56'),
(52, 40, 28, '2023-02-23 04:33:46', '2023-02-23 04:33:46'),
(53, 40, 14, '2023-02-23 04:33:46', '2023-02-23 04:33:46'),
(54, 40, 33, '2023-02-23 04:33:46', '2023-02-23 04:33:46'),
(55, 41, 34, '2023-02-23 04:35:05', '2023-02-23 04:35:05'),
(56, 37, 32, '2023-02-23 04:35:18', '2023-02-23 04:35:18'),
(57, 42, 34, '2023-02-23 04:36:29', '2023-02-23 04:36:29'),
(58, 43, 28, '2023-02-23 04:38:00', '2023-02-23 04:38:00'),
(59, 43, 12, '2023-02-23 04:38:00', '2023-02-23 04:38:00'),
(60, 43, 32, '2023-02-23 04:38:00', '2023-02-23 04:38:00'),
(61, 44, 14, '2023-02-23 04:39:24', '2023-02-23 04:39:24'),
(62, 44, 31, '2023-02-23 04:39:24', '2023-02-23 04:39:24'),
(63, 44, 28, '2023-02-23 04:39:24', '2023-02-23 04:39:24'),
(64, 34, 35, '2023-02-23 10:31:19', '2023-02-23 10:31:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Quản trị', NULL, NULL),
(2, 'guest', 'Khách hàng', NULL, NULL),
(3, 'dev', 'Lập trình viên', NULL, NULL),
(4, 'content', 'Chửa sửa nội dung', NULL, NULL),
(5, 'Editor', 'Người soạn thảo 1', '2021-06-13 09:25:07', '2021-06-13 10:06:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(3, 2, 1, '2021-05-21 02:20:12', '2021-05-21 02:20:12'),
(4, 2, 4, '2021-05-21 02:20:12', '2021-05-21 02:20:12'),
(5, 3, 2, '2021-05-21 02:31:58', '2021-05-21 02:31:58'),
(6, 3, 3, '2021-05-21 02:31:58', '2021-05-21 02:31:58'),
(7, 4, 3, '2021-05-21 02:32:36', '2021-05-21 02:32:36'),
(8, 4, 4, '2021-05-21 02:32:36', '2021-05-21 02:32:36'),
(9, 5, 1, '2021-05-21 02:35:53', '2021-05-21 02:35:53'),
(10, 5, 3, '2021-05-21 02:35:53', '2021-05-21 02:35:53'),
(11, 1, 3, '2021-06-14 10:50:11', '2021-06-14 10:50:11'),
(12, 6, 1, '2021-07-04 11:44:53', '2021-07-04 11:44:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `config_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `config_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `config_key`, `config_value`, `created_at`, `updated_at`, `type`) VALUES
(5, 'phone', '+2 95 01 88 821', '2021-07-04 10:16:45', '2023-02-22 22:09:23', 'Text'),
(6, 'email', 'info@domain.com', '2023-02-22 22:07:07', '2023-02-22 22:08:12', 'Text'),
(7, 'facebook', 'fb.com/abc', '2023-02-22 22:07:44', '2023-02-22 22:09:34', 'Text'),
(8, 'google+', 'abc@gmail.com', '2023-02-22 22:10:15', '2023-02-22 22:10:15', 'Text'),
(9, 'twitter', 'twitter.com/username', '2023-02-22 22:12:30', '2023-02-22 22:12:30', 'Text'),
(10, 'footer-bottom', 'Copyright © 2013 E-SHOPPER Inc. All rights reserved.', '2023-02-22 22:16:38', '2023-02-22 22:16:38', 'Textarea');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `description`, `image_name`, `image_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 'test', 'test', 'gallery2.jpg', 'public/sliders/1/4G4ERg49EEkxpMa4jiUxnWoGxrgklmMvrr7qqd6X.jpg', '2023-02-22 19:49:16', '2023-02-22 19:51:18', '2023-02-22 19:51:18'),
(12, 'Free E-Commerce Template', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'girl1.jpg', 'public/sliders/1/51MvF4o9oVbfcC3ePRXE21Kifm2qerNXCxyPBJa3.jpg', '2023-02-22 19:55:49', '2023-02-22 19:55:49', NULL),
(13, '100% Responsive Design', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'girl2.jpg', 'public/sliders/1/tTIcmAwqfzPBTwKght584MmTNIBv0tjkoXetSL1B.jpg', '2023-02-22 19:56:49', '2023-02-22 19:56:49', NULL),
(14, 'Free Ecommerce Template', 'orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'girl3.jpg', 'public/sliders/1/nM2Dzm8gutg8z1w1Tm8ODFQMB5MbeNVo7wIK1HTD.jpg', '2023-02-22 19:57:33', '2023-02-22 19:57:33', NULL),
(15, 'test', 'test', 'gallery2.jpg', 'public/sliders/1/C7Akl6h1lAgLpGuFKZVW6ZH67BRoOf4gSrGVBhRu.jpg', '2023-02-22 20:24:21', '2023-02-22 20:25:08', '2023-02-22 20:25:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(12, 'áo nam', '2021-05-17 03:00:10', '2021-05-17 03:00:10'),
(13, 'áo đẹp', '2021-05-17 03:00:10', '2021-05-17 03:00:10'),
(14, 'áo nữ', '2021-05-17 03:01:31', '2021-05-17 03:01:31'),
(15, 'áo kaki', '2021-05-17 03:18:48', '2021-05-17 03:18:48'),
(16, 'giày adidas', '2021-05-17 03:31:15', '2021-05-17 03:31:15'),
(17, 'giày xịn', '2021-05-17 03:31:15', '2021-05-17 03:31:15'),
(18, 'tủ', '2021-05-17 03:32:58', '2021-05-17 03:32:58'),
(19, 'bóng đá', '2021-06-22 13:37:19', '2021-06-22 13:37:19'),
(20, 'AFC', '2021-06-22 13:37:19', '2021-06-22 13:37:19'),
(21, 'ABC', '2021-06-24 13:24:28', '2021-06-24 13:24:28'),
(22, 'covid', '2021-06-24 13:30:27', '2021-06-24 13:30:27'),
(23, 'test', '2021-06-24 14:49:13', '2021-06-24 14:49:13'),
(24, 'testtest', '2021-07-03 10:27:57', '2021-07-03 10:27:57'),
(25, 'xyz', '2021-07-03 12:26:57', '2021-07-03 12:26:57'),
(26, 'test2', '2021-07-14 11:29:03', '2021-07-14 11:29:03'),
(27, 'test3', '2021-07-14 11:31:33', '2021-07-14 11:31:33'),
(28, 'quần áo', '2023-02-23 04:17:55', '2023-02-23 04:17:55'),
(29, 'áo trung', '2023-02-23 04:17:55', '2023-02-23 04:17:55'),
(30, 'áo tây', '2023-02-23 04:22:35', '2023-02-23 04:22:35'),
(31, 'áo khoác', '2023-02-23 04:26:51', '2023-02-23 04:26:51'),
(32, 'áo polo', '2023-02-23 04:31:53', '2023-02-23 04:31:53'),
(33, 'áo thun', '2023-02-23 04:32:56', '2023-02-23 04:32:56'),
(34, 'váy', '2023-02-23 04:35:05', '2023-02-23 04:35:05'),
(35, 'áo dây', '2023-02-23 10:31:19', '2023-02-23 10:31:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'vnhatqn', 'vnhatqn@gmail.com', NULL, '$2a$12$VvHKMhoTgXu4.t3dfq/.Q./Ha0vCU1egSSPdF/iwUtO8GMweQvW92', 'DLtJRJNjxCtGMdhDAZM4EzCybh96UfL22AB2Hr4wUvpEJIfOXSZoquih32KF', NULL, '2021-06-27 10:12:07', NULL),
(3, 'nhat', 'nhat@gmail.com', NULL, '$2y$10$KteBcg0JnTaUrwAf8uSRGesJx9QN92qj.HMCUoLnk/9pnjOknjnw6', NULL, '2021-05-21 02:31:58', '2021-05-21 02:36:10', '2021-05-21 02:36:10'),
(4, 'nhat2', 'nhat2@gmail.com', NULL, '$2y$10$fJY4MUoy45BTBi7yPhxyJeM0ItReqHVXZgCG6dBY8S93mBn4yGVOC', NULL, '2021-05-21 02:32:36', '2021-06-27 12:58:10', NULL),
(5, 'nhat1', 'nhat1@gmail.com', NULL, '$2y$10$Uub3/tsBNkA1JR2ZP.VateIEo5Dlu3dUi5oc5JtH2XNhg7/3o.uGi', 'Lvi9XIJc0RDCNjU9MAVTNvStknrt8ORkyHyupCVgrOUX6aZDnwaOpyZi3PCt', '2021-05-21 02:35:53', '2021-06-27 12:58:24', NULL),
(6, 'test1', 'vnhatqsxadfn@gmail.com', NULL, '$2y$10$h52FnWWgZQFMUfm.AB01u.i6XvRzoh03ijq7lDm7JnNLCpMXZ3.iG', NULL, '2021-07-04 11:40:44', '2021-07-04 11:45:32', '2021-07-04 11:45:32');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

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
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
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
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
