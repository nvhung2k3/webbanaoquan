-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 17, 2022 lúc 04:53 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dack`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catagories`
--

CREATE TABLE `catagories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catagory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `catagories`
--

INSERT INTO `catagories` (`id`, `catagory_name`, `created_at`, `updated_at`) VALUES
(14, 'Giày', '2022-11-13 02:15:27', '2022-11-13 02:15:27'),
(15, 'Áo', '2022-11-13 02:37:32', '2022-11-13 02:37:32'),
(16, 'Mũ', '2022-11-13 02:45:16', '2022-11-13 02:45:16'),
(17, 'Quần', '2022-11-13 02:50:55', '2022-11-13 02:50:55'),
(19, 'nón', '2022-11-17 07:11:37', '2022-11-17 07:11:37'),
(20, 'dép', '2022-11-17 08:31:16', '2022-11-17 08:31:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `user_id`, `created_at`, `updated_at`) VALUES
(9, 'nam', 'wow', '1', '2022-11-13 04:02:51', '2022-11-13 04:02:51'),
(10, 'your', 'hello', '3', '2022-11-17 07:08:13', '2022-11-17 07:08:13'),
(11, 'your', 'hi!!!', '3', '2022-11-17 07:08:46', '2022-11-17 07:08:46'),
(12, 'your', 'hello', '3', '2022-11-17 08:27:54', '2022-11-17 08:27:54'),
(13, 'your', 'hello', '3', '2022-11-17 08:28:21', '2022-11-17 08:28:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_10_15_141827_create_sessions_table', 1),
(7, '2022_10_15_183627_create_catagories_table', 2),
(8, '2022_10_16_095634_create_products_table', 3),
(9, '2022_10_20_141833_create_carts_table', 4),
(10, '2022_10_20_143009_create_carts_table', 5),
(11, '2022_10_28_030012_create_orders_table', 6),
(12, '2022_10_28_031302_create_orders_table', 7),
(13, '2022_11_08_154420_create_comments_table', 8),
(14, '2022_11_08_154513_create_replies_table', 8),
(15, '2022_11_08_160250_create_comments_table', 9),
(16, '2022_11_09_162128_create_replies_table', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `user_id`, `product_title`, `quantity`, `price`, `image`, `product_id`, `payment_status`, `delivery_status`, `created_at`, `updated_at`) VALUES
(55, 'nam', 'nam@gmail.com', '0867003022', 'Đà Nẵng', '1', 'MLB Big Ball Chunky', '2', '798000', '1668331108.jfif', '36', 'Thanh toán khi nhận hàng', 'Đã Giao', '2022-11-13 09:02:22', '2022-11-13 09:02:47'),
(56, 'nam', 'nam@gmail.com', '0867003022', 'Đà Nẵng', '1', 'Sneaker thể thao', '2', '398000', '1668331802.jfif', '37', 'Thanh toán khi nhận hàng', 'Bạn đã hủy đơn hàng', '2022-11-13 09:02:22', '2022-11-14 10:07:55'),
(59, 'nam', 'nam@gmail.com', '0867003022', 'Đà Nẵng', '1', 'MLB Big Ball Chunky', '2', '798000', '1668331108.jfif', '36', 'Thanh toán khi nhận hàng', 'Đang giao', '2022-11-15 00:03:46', '2022-11-15 00:03:46'),
(60, 'nam', 'nam@gmail.com', '0867003022', 'Đà Nẵng', '1', 'Sneaker thể thao', '2', '300000', '1668331802.jfif', '37', 'Thanh toán khi nhận hàng', 'Đang giao', '2022-11-15 00:04:46', '2022-11-15 00:04:46'),
(61, 'nam', 'nam@gmail.com', '0867003022', 'Đà Nẵng', '1', 'MLB Big Ball Chunky', '2', '500000', '1668331108.jfif', '36', 'Thanh toán khi nhận hàng', 'Đang giao', '2022-11-15 00:09:44', '2022-11-15 00:09:44'),
(62, 'nam', 'nam@gmail.com', '0867003022', 'Đà Nẵng', '1', 'MLB Big Ball Chunky', '2', '798000', '1668331108.jfif', '36', 'Thanh toán khi nhận hàng', 'Đang giao', '2022-11-17 06:24:05', '2022-11-17 06:24:05'),
(63, 'nam', 'nam@gmail.com', '0867003022', 'Đà Nẵng', '1', 'Sneaker thể thao', '2', '398000', '1668331802.jfif', '37', 'Thanh toán khi nhận hàng', 'Đang giao', '2022-11-17 06:29:59', '2022-11-17 06:29:59'),
(66, 'your', 'your@gmail.com', '0876001033', 'Đà Nẵng', '3', 'Áo thun Life Work', '2', '400000', '1668332417.jfif', '41', 'Thanh toán khi nhận hàng', 'Đã Giao', '2022-11-17 08:29:10', '2022-11-17 08:32:58'),
(67, 'your', 'your@gmail.com', '0876001033', 'Đà Nẵng', '3', 'Áo thun Life Work', '1', '200000', '1668332417.jfif', '41', 'Bằng thẻ', 'Đang giao', '2022-11-17 08:29:49', '2022-11-17 08:29:49'),
(68, 'your', 'your@gmail.com', '0876001033', 'Đà Nẵng', '3', 'MLB Big Ball Chunky', '2', '798000', '1668331108.jfif', '36', 'Thanh toán khi nhận hàng', 'Bạn đã hủy đơn hàng', '2022-11-17 08:30:16', '2022-11-17 08:33:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `catagory` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `catagory`, `quantity`, `price`, `discount_price`, `created_at`, `updated_at`) VALUES
(36, 'MLB Big Ball Chunky', 'Đẹp', '1668331108.jfif', 'Giày', '10', '500000', '399000', '2022-11-13 02:18:28', '2022-11-13 08:59:42'),
(37, 'Sneaker thể thao', 'Bền', '1668331802.jfif', 'Giày', '10', '300000', '199000', '2022-11-13 02:30:02', '2022-11-13 02:30:02'),
(38, 'Giày Sneaker AG0006', 'Đẹp, bền', '1668331874.jfif', 'Giày', '10', '500000', '299000', '2022-11-13 02:31:14', '2022-11-13 02:31:14'),
(40, 'Áo Thun ICONDENIM Make', 'Đẹp', '1668332365.jfif', 'Áo', '10', '200000', '99000', '2022-11-13 02:39:25', '2022-11-14 19:37:10'),
(41, 'Áo thun Life Work', 'Đẹp', '1668332417.jfif', 'Áo', '10', '200000', NULL, '2022-11-13 02:40:17', '2022-11-13 02:40:17'),
(42, 'Áo thun MLB', 'Đẹp', '1668332549.jfif', 'Áo', '10', '500000', '299000', '2022-11-13 02:42:29', '2022-11-13 02:42:29'),
(43, 'Mũ nón rộng', 'Đẹp', '1668332740.jfif', 'Mũ', '10', '100000', NULL, '2022-11-13 02:45:40', '2022-11-13 02:45:40'),
(44, 'Mũ Beanie', 'Bền', '1668332826.jfif', 'Mũ', '10', '100000', '50000', '2022-11-13 02:47:06', '2022-11-13 02:47:06'),
(45, 'Mũ lưỡi trai', 'Đẹp', '1668332885.jfif', 'Mũ', '10', '200000', '90000', '2022-11-13 02:48:05', '2022-11-13 02:48:05'),
(46, 'Quần Jogger Kaki', 'Đẹp', '1668333100.jfif', 'Quần', '10', '300000', '199000', '2022-11-13 02:51:40', '2022-11-13 02:51:40'),
(47, 'QUẦN JOGGER KAKI', 'Đẹp', '1668333171.jfif', 'Quần', '10', '100000', NULL, '2022-11-13 02:52:51', '2022-11-13 02:52:51'),
(48, 'Quần jogger', 'Đẹp', '1668333230.jfif', 'Quần', '10', '200000', '100000', '2022-11-13 02:53:50', '2022-11-13 02:53:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('lbZyykTqkJgDeHkyljD8hM0tQF6JzLHQvVCqPSK0', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibzZOQ3RGbkRhQ3V4MnhCblZnb0ZYdTg0Tkt1WW90ZzJPM2x3ajY5dCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0cyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1668700134);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `phone`, `address`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'nam', 'nam@gmail.com', '0', '0867003022', 'Đà Nẵng', NULL, '$2y$10$BcZ3Q7/EVOlCH1cW2gqNz.I9iHFeLrFCIxrNNeL7n50sZqemOeXkK', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-15 07:40:30', '2022-10-15 07:40:30'),
(2, 'admin', 'admin@gmail.com', '1', '0867003022', 'Đà Nẵng', NULL, '$2y$10$kly4fnwqVB7D9IObXC8AIuIn7NcLI6BfPU4TEGXa6ZxjziSMw51fO', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-15 07:43:41', '2022-10-15 07:43:41'),
(3, 'your', 'your@gmail.com', '0', '0876001033', 'Đà Nẵng', NULL, '$2y$10$OTJRBGqPgZgQbTU6hcUAw.mNdV6vCKFeebLvXAUNYyZQdFbFd4ne.', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-27 20:23:31', '2022-10-27 20:23:31'),
(4, 'nam1', 'nguyenquangnhatnam08@gmail.com', '0', '0967003022', '1231232', NULL, '$2y$10$BA8ucqYiAYpKYUh1nFCJtOJRH87rnjv7hNa5OFtw3S6iSe/m.UNy6', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-06 02:20:10', '2022-11-06 02:20:10'),
(5, 'nguyen văn hung', 'hung@gmail.com', '0', '12334555', 'Đà Nẵng', NULL, '$2y$10$9.38tjlkDgvl8gcC7yiY3eCRC4.cwPXoiMQhXos1sUZqqfjAKc18a', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-06 02:22:07', '2022-11-06 02:22:07'),
(6, 'hung', 'hung2@gmail.com', '0', '011561166656', 'jbyu', NULL, '$2y$10$auXF4aYvXZMLEeNKWTwJGeE3CegdON.Bj/sVA0hpRTikvUzJ0Puiy', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-07 21:05:41', '2022-11-07 21:05:41'),
(7, 'na', 'our@gmail.com', '0', '2313', '123', NULL, '$2y$10$zA5OjcrLXUAUpzFbR1GVCerTFwx8yz.OkyhBnqZfm7Ay7u4m63fnK', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-12 08:09:32', '2022-11-12 08:09:32'),
(8, 'nam2', 'nam2@gmail.com', '0', '12345678', 'Đà Nẵng', NULL, '$2y$10$R3Y5qGt1bE5ixKOTuw7GCOuhGuN62w02ZGB1G1rHsYMBk1MG.RIIS', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-14 19:48:00', '2022-11-14 19:48:00'),
(9, 'nam3', 'nam3@gmail.com', '0', '12345678', 'Đà Nẵng', NULL, '$2y$10$wKX8T6wssS7oKREESURnIuAZtPW7nRIshVZ5QQLVzE8R/qMgrBg.e', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-14 19:50:06', '2022-11-14 19:50:06'),
(10, 'nam4', 'nam4@gmail.com', '0', '12314421', 'Đà Nẵng', NULL, '$2y$10$mPovZja2e0/VmSIn.vvv1uAHuFtbqb/JW7NvoLcN.wzmufXFo0ypa', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-14 20:04:00', '2022-11-14 20:04:00'),
(11, 'nam', 'a@gmail.com', '0', '1123421', 'Đà Nẵng', NULL, '$2y$10$IsZkNm7OVWs/qV7GSOwFpuEx3j9lLLHlKGi/Mhv/Gtmu9Bgmb4KUa', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-17 06:38:53', '2022-11-17 06:38:53');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT cho bảng `catagories`
--
ALTER TABLE `catagories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
