-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2024 at 03:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodordering`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Momo', '...', '2024-08-24 09:32:50', '2024-08-24 09:32:50'),
(2, 'Chowmein', '...', '2024-08-24 09:32:50', '2024-08-24 09:32:50'),
(3, 'Pizza', '...', '2024-08-24 09:32:50', '2024-08-24 09:32:50'),
(4, 'Cold Drinks', '...', '2024-08-24 09:32:50', '2024-08-24 09:32:50'),
(5, 'Beverages', '...', '2024-08-24 09:32:50', '2024-08-24 09:32:50'),
(6, 'Pakoda', '...', '2024-08-24 09:32:50', '2024-08-24 09:32:50'),
(7, 'Chicken Specials', '...', '2024-08-24 09:32:50', '2024-08-24 09:32:50'),
(8, 'Momo', '...', '2024-09-30 06:08:25', '2024-09-30 06:08:25'),
(9, 'Chowmein', '...', '2024-09-30 06:08:25', '2024-09-30 06:08:25'),
(10, 'Pizza', '...', '2024-09-30 06:08:25', '2024-09-30 06:08:25'),
(11, 'Cold Drinks', '...', '2024-09-30 06:08:25', '2024-09-30 06:08:25'),
(12, 'Beverages', '...', '2024-09-30 06:08:25', '2024-09-30 06:08:25'),
(13, 'Pakoda', '...', '2024-09-30 06:08:25', '2024-09-30 06:08:25'),
(14, 'Chicken Specials', '...', '2024-09-30 06:08:25', '2024-09-30 06:08:25');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `uses` int(11) NOT NULL DEFAULT 0,
  `max_uses` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `handle_deliveries`
--

CREATE TABLE `handle_deliveries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `handle_deliveries`
--

INSERT INTO `handle_deliveries` (`id`, `order_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '2024-08-24 10:30:44', '2024-08-24 10:30:44'),
(2, 2, 4, '2024-08-25 00:12:43', '2024-08-25 00:12:43'),
(3, 5, 10, '2024-09-30 06:40:35', '2024-09-30 06:40:35');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `path` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `name`, `path`, `type`, `created_at`, `updated_at`) VALUES
(1, 'untitledjpg', 'uploads/txK45VYIUP33.jpg', 'image/jpeg', '2024-08-24 09:53:09', '2024-08-24 09:53:09'),
(2, 'pexels-photo-12040259webp', 'uploads/EuUUJJt4tz7.webp', 'image/webp', '2024-08-24 09:53:40', '2024-08-24 09:53:40'),
(3, 'pexels-photo-3928854jpg', 'uploads/IZpgmLjpQC93.jpg', 'image/jpeg', '2024-08-24 09:54:16', '2024-08-24 09:54:16'),
(4, 'istockphoto-1023472668-612x612jpg', 'uploads/sfqJCWSOgj65.jpg', 'image/jpeg', '2024-08-24 09:54:37', '2024-08-24 09:54:37'),
(5, 'pexels-photo-1435903jpg', 'uploads/7Yfli27FEh76.jpg', 'image/jpeg', '2024-08-24 09:55:08', '2024-08-24 09:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_03_21_081143_create_media_table', 1),
(6, '2021_03_21_121546_create_categories_table', 1),
(7, '2021_03_21_165900_create_products_table', 1),
(8, '2021_03_26_090742_create_orders_table', 1),
(9, '2021_03_26_091006_create_order_product_table', 1),
(10, '2021_03_28_073328_create_regions_table', 1),
(11, '2021_03_28_084517_create_region_user_table', 1),
(12, '2021_03_28_144515_create_handle_deliveries_table', 1),
(13, '2021_03_29_145737_create_coupons_table', 1),
(14, '2021_07_08_093327_create_product_reviews_table', 1),
(15, '2021_11_01_084544_create_reviews_table', 1),
(16, '2021_12_11_032511_create_chats_table', 1),
(17, '2021_12_16_032527_create_sliders_table', 1),
(18, '2021_12_16_074134_create_sections_table', 1),
(19, '2021_12_16_084613_create_product_section_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `discount` double(8,2) NOT NULL,
  `total` double(8,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `address_line` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `subtotal`, `discount`, `total`, `status`, `phone`, `city`, `lat`, `lng`, `address_line`, `payment_method`, `created_at`, `updated_at`) VALUES
(5, 8, 200.00, 0.00, 200.00, 'Delivered', '123456789', 'Tandi', NULL, NULL, 'ratnan', 'cash-on-delivery', '2024-09-30 06:37:54', '2024-09-30 06:40:41');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(5, 1, 1, 120, NULL, NULL),
(5, 2, 1, 80, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `onStock` tinyint(1) NOT NULL,
  `isVeg` tinyint(1) NOT NULL,
  `isDrink` tinyint(1) NOT NULL,
  `media_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `description`, `price`, `onStock`, `isVeg`, `isDrink`, `media_id`, `created_at`, `updated_at`) VALUES
(1, 'Chicken Momo', 1, 'Chicken Momo', 120, 1, 0, 0, 1, '2024-08-24 09:53:09', '2024-09-30 06:11:45'),
(2, 'Pepsi', 4, 'cold drink', 80, 1, 0, 1, 2, '2024-08-24 09:53:40', '2024-08-24 10:18:36'),
(3, 'Paneer Kebab', 6, 'Paneer item', 180, 0, 1, 0, 3, '2024-08-24 09:54:16', '2024-08-24 09:54:16'),
(4, 'Chowmin', 2, 'Chowmin', 120, 0, 0, 0, 4, '2024-08-24 09:54:37', '2024-08-24 09:54:37'),
(5, 'Pizza', 3, 'pizza', 250, 0, 1, 0, 5, '2024-08-24 09:55:08', '2024-08-24 09:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_section`
--

CREATE TABLE `product_section` (
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Tandi', '2024-08-24 09:32:50', '2024-08-24 09:32:50'),
(2, 'Parsa', '2024-08-24 09:32:50', '2024-08-24 09:32:50'),
(3, 'Narayanghat', '2024-08-24 09:32:50', '2024-08-24 09:32:50'),
(4, 'Bharatpur', '2024-08-24 09:32:50', '2024-08-24 09:32:50'),
(5, 'Tikauli', '2024-08-24 09:32:50', '2024-08-24 09:32:50'),
(6, 'Tandi', '2024-09-30 06:08:25', '2024-09-30 06:08:25'),
(7, 'Parsa', '2024-09-30 06:08:25', '2024-09-30 06:08:25'),
(8, 'Narayanghat', '2024-09-30 06:08:25', '2024-09-30 06:08:25'),
(9, 'Bharatpur', '2024-09-30 06:08:25', '2024-09-30 06:08:25'),
(10, 'Tikauli', '2024-09-30 06:08:25', '2024-09-30 06:08:25');

-- --------------------------------------------------------

--
-- Table structure for table `region_user`
--

CREATE TABLE `region_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `region_user`
--

INSERT INTO `region_user` (`id`, `region_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '2024-08-24 10:30:01', '2024-08-24 10:30:01'),
(2, 1, 10, '2024-09-30 06:39:15', '2024-09-30 06:39:15');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rating` double(8,2) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `media_id` bigint(20) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `role` smallint(6) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `role`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(6, 'pawan', 'pawanregmi28@gmail.com', NULL, 'eitQa0VUeSs2aDZpcW50MWhlVmovZz09OjqfrYcMgbibymcwfzsQVgj9', NULL, NULL, 0, NULL, NULL, '2024-09-30 06:02:44', '2024-09-30 06:02:44'),
(7, 'Admin', 'admin@admin.com', NULL, 'T3FkQmRodXBsT05Nc1Z4akl0dTVkZz09Ojorcddq/jQwBO+3LW1qiK1R', NULL, NULL, 1, NULL, NULL, '2024-09-30 06:08:25', '2024-09-30 06:08:25'),
(8, 'User1', 'user@user.com', NULL, 'Y29seE9BU2NCSmpneFFQNGpqdUpMUT09OjomgUfpAsntiR8jRzJ7lUEE', NULL, NULL, 0, NULL, NULL, '2024-09-30 06:08:25', '2024-09-30 06:08:25'),
(9, 'Kitchen', 'kitchen@kitchen.com', NULL, 'SmZHdVg1L1A3NXVKSFUvemhXUDYvdz09OjoE42F5+n+DItA0w0Ri8uoj', NULL, NULL, 2, NULL, NULL, '2024-09-30 06:08:25', '2024-09-30 06:08:25'),
(10, 'Delivery', 'delivery@delivery.com', NULL, 'WUtyUjFKTXhoZzZzc2pkNW5xMzd5dz09OjoJ7eiTahFIoV/q5PzqHqLk', NULL, NULL, 3, NULL, NULL, '2024-09-30 06:08:25', '2024-09-30 06:08:25'),
(11, 'DeliveryBoy1', 'deliveryboy1@delivery.com', NULL, '$2y$10$Ne/o1ekboW1LwFxjCHZBJeRQ609YyH7H5v/PvZ4WYsbqCauRCmvLC', NULL, NULL, 3, NULL, NULL, '2024-09-30 06:39:53', '2024-09-30 06:39:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `handle_deliveries`
--
ALTER TABLE `handle_deliveries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_media_id_foreign` (`media_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `region_user`
--
ALTER TABLE `region_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sliders_media_id_foreign` (`media_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `handle_deliveries`
--
ALTER TABLE `handle_deliveries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `region_user`
--
ALTER TABLE `region_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`);

--
-- Constraints for table `sliders`
--
ALTER TABLE `sliders`
  ADD CONSTRAINT `sliders_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
