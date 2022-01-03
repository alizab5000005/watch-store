-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2021 at 06:39 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'zab', 'alikhanza84@gmail.com', '$2y$10$krZeUw4AI.EGKBnnQu./OO7chSkoIV7pA3S7MrGDpoNaOrPhR0aCG', '2021-07-01 13:44:12', '2021-07-19 21:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`) VALUES
(1, 'Rolex'),
(4, 'Casio'),
(5, 'Timex'),
(6, 'citizen');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `p_id`, `customer_id`, `name`, `price`, `qty`, `total_price`, `image`, `created_at`, `updated_at`) VALUES
(12, 8, 4, 'coats', '5000', '6', '15000', 'womencoat.jpg', '2021-07-19 23:42:47', '2021-07-19 22:54:03'),
(23, 10, 11, 'T Shirt', '400', '1', '1200', 'tshirt.png', '2021-07-20 03:22:37', '2021-08-16 07:55:40'),
(24, 10, 11, 'T Shirt', '400', '3', '1200', 'tshirt.png', '2021-07-20 03:24:08', '2021-08-16 07:55:40');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_status`, `created_at`, `updated_at`) VALUES
(1, 'Men', 1, '2021-07-19 22:01:34', '2021-07-19 22:39:39'),
(2, 'Women', 1, '2021-07-19 22:02:56', '2021-07-19 23:26:05');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `username`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
(3, 'khan', 'khan', 'khan@mail.com', '12', 1, '2021-07-01 16:14:05', '2021-07-01 16:14:05'),
(4, 'ali', 'ali', 'ali@mail.com', '32', 1, '2021-07-01 16:20:04', '2021-07-01 16:20:04'),
(5, 'zak', 'zak', 'zak@mail.com', 'zz', 1, '2021-07-01 18:44:25', '2021-07-01 18:44:25'),
(12, 'some', '12', 'normal@mail.com', 's', 1, '2021-08-16 08:37:51', '2021-08-16 08:37:51'),
(13, 'zabkkkk', 'Zohaib', 'q@q.com', 'j', 0, '2021-08-16 07:40:55', '2021-08-16 07:40:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_07_19_132849_create_admin_users_table', 1),
(2, '2021_07_19_142652_create_categories_table', 2),
(3, '2021_07_19_154318_create_products_table', 3),
(4, '2021_07_19_160046_create_carts_table', 4),
(5, '2021_07_19_172625_create_customers_table', 5),
(6, '2021_07_19_184638_create_orders_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_mode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Completed` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `customer_email`, `customer_phone`, `city`, `zip_code`, `address`, `products`, `total_amount`, `pay_mode`, `Completed`, `created_at`, `updated_at`) VALUES
(10, 'khan', 'khan@mail.com', '132', 'nsr', '123123', 'kheshgi', 'T Shirt (qty : 3) (Size : Medium), ', '1200', 'online', 0, NULL, NULL),
(11, 'khan', 'khan@mail.com', '123', 'nsr', '123123', 'kheshgi', 'T Shirt (qty : 1) (Size : Small), ', '1200', 'cod', 1, NULL, NULL),
(12, 'khan', 'khan@mail.com', '132', 'nsr', '123123', 'kheshgi', 'T Shirt (qty : 1) (Size : Small), ', '400', 'online', 1, NULL, NULL),
(13, 'khan', 'khan@mail.com', '0000', 'nsr', '123123', 'kheshgi', 'Jeans (qty : 2) (Size : Small), Shirt (qty : 1) (Size : Small), ', '1700', 'cod', 1, NULL, NULL),
(14, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'T Shirt (qty : 3) (Size : Large), ', '1200', 'cod', 1, NULL, NULL),
(15, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), ', '4620', 'cod', 0, NULL, NULL),
(16, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), ', '4620', 'cod', 0, NULL, NULL),
(17, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), ', '4620', 'cod', 0, NULL, NULL),
(18, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), ', '4620', 'cod', 0, NULL, NULL),
(19, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), ', '4620', 'cod', 0, NULL, NULL),
(20, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), ', '4620', 'cod', 0, NULL, NULL),
(21, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), ', '4620', 'cod', 0, NULL, NULL),
(22, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), ', '4620', 'cod', 0, NULL, NULL),
(23, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), Rolex Men\'s Metallic (qty : 2), ', '6160', 'cod', 0, NULL, NULL),
(24, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), Rolex Men\'s Metallic (qty : 2), ', '6160', 'cod', 0, NULL, NULL),
(25, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), Rolex Men\'s Metallic (qty : 2), ', '6160', 'cod', 0, NULL, NULL),
(26, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), Rolex Men\'s Metallic (qty : 2), ', '6160', 'cod', 0, NULL, NULL),
(27, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), Rolex Men\'s Metallic (qty : 2), ', '6160', 'cod', 0, NULL, NULL),
(28, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), Rolex Men\'s Metallic (qty : 2), ', '6160', 'cod', 0, NULL, NULL),
(29, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), Rolex Men\'s Metallic (qty : 2), ', '6160', 'cod', 0, NULL, NULL),
(30, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), Rolex Men\'s Metallic (qty : 2), ', '6160', 'cod', 0, NULL, NULL),
(31, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), Rolex Men\'s Metallic (qty : 2), ', '6160', 'cod', 0, NULL, NULL),
(32, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), Rolex Men\'s Metallic (qty : 2), ', '6160', 'cod', 0, NULL, NULL),
(33, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), Rolex Men\'s Metallic (qty : 2), ', '6160', 'cod', 0, NULL, NULL),
(34, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), Rolex Men\'s Metallic (qty : 2), ', '6160', 'cod', 0, NULL, NULL),
(35, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), Rolex Men\'s Metallic (qty : 2), ', '6160', 'cod', 0, NULL, NULL),
(36, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), Rolex Men\'s Metallic (qty : 2), ', '6160', 'cod', 0, NULL, NULL),
(37, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), Rolex Men\'s Metallic (qty : 2), ', '6160', 'cod', 0, NULL, NULL),
(38, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), Rolex Men\'s Metallic (qty : 2), ', '6160', 'cod', 0, NULL, NULL),
(39, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), Rolex Men\'s Metallic (qty : 2), ', '6160', 'cod', 0, NULL, NULL),
(40, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), Rolex Men\'s Metallic (qty : 2), ', '6160', 'cod', 0, NULL, NULL),
(41, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), Rolex Men\'s Metallic (qty : 2), ', '6160', 'cod', 0, NULL, NULL),
(42, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), Rolex Men\'s Metallic (qty : 2), ', '6160', 'cod', 0, NULL, NULL),
(43, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), Rolex Men\'s Metallic (qty : 2), ', '6160', 'cod', 0, NULL, NULL),
(44, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), Rolex Men\'s Metallic (qty : 2), ', '6160', 'cod', 0, NULL, NULL),
(45, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), Rolex Men\'s Metallic (qty : 2), ', '6160', 'cod', 0, NULL, NULL),
(46, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), Rolex Men\'s Metallic (qty : 2), ', '6160', 'cod', 0, NULL, NULL),
(47, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), Rolex Men\'s Metallic (qty : 2), ', '6160', 'cod', 0, NULL, NULL),
(48, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), Rolex Men\'s Metallic (qty : 2), ', '6160', 'cod', 0, NULL, NULL),
(49, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), Rolex Men\'s Metallic (qty : 2), ', '6160', 'cod', 0, NULL, NULL),
(50, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), Rolex Men\'s Metallic (qty : 2), ', '6160', 'cod', 0, NULL, NULL),
(51, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 3), Rolex Men\'s Metallic (qty : 2), ', '6160', 'cod', 0, NULL, NULL),
(52, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 2), Rolex Men\'s Metallic (qty : 4), ', '12320', 'cod', 0, NULL, NULL),
(53, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 2), ', '6160', 'cod', 0, NULL, NULL),
(54, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 4), ', '6160', 'cod', 0, NULL, NULL),
(55, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 4), ', '6160', 'cod', 0, NULL, NULL),
(56, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 4), ', '6160', 'cod', 0, NULL, NULL),
(57, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 4), ', '6160', 'cod', 0, NULL, NULL),
(58, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 4), ', '6160', 'cod', 0, NULL, NULL),
(59, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 4), Casio LTP-1215A-7ADF Wrist Watch (qty : 3), ', '12160', 'cod', 0, NULL, NULL),
(60, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 4), Casio LTP-1215A-7ADF Wrist Watch (qty : 3), ', '12160', 'cod', 0, NULL, NULL),
(61, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 4), Casio LTP-1215A-7ADF Wrist Watch (qty : 3), ', '12160', 'cod', 0, NULL, NULL),
(62, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 4), Casio LTP-1215A-7ADF Wrist Watch (qty : 3), ', '12160', 'cod', 0, NULL, NULL),
(63, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 4), Casio LTP-1215A-7ADF Wrist Watch (qty : 3), ', '12160', 'cod', 0, NULL, NULL),
(64, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 4), Casio LTP-1215A-7ADF Wrist Watch (qty : 3), ', '12160', 'cod', 0, NULL, NULL),
(65, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 4), ', '6160', 'cod', 0, NULL, NULL),
(66, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 4), ', '6160', 'cod', 0, NULL, NULL),
(67, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 4), ', '6160', 'cod', 0, NULL, NULL),
(68, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 4), ', '6160', 'cod', 0, NULL, NULL),
(69, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 4), ', '6160', 'cod', 0, NULL, NULL),
(70, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 4), ', '6160', 'cod', 0, NULL, NULL),
(71, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 2), ', '3080', 'cod', 0, NULL, NULL),
(72, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 2), ', '3080', 'cod', 0, NULL, NULL),
(73, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 2), ', '3080', 'cod', 0, NULL, NULL),
(74, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 2), ', '3080', 'cod', 0, NULL, NULL),
(75, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 2), ', '3080', 'cod', 0, NULL, NULL),
(76, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 2), ', '3080', 'cod', 0, NULL, NULL),
(77, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 2), ', '3080', 'cod', 0, NULL, NULL),
(78, 'khan', 'khan@mail.com', '12', 'nsr', '123123', 'kheshgi', 'Rolex Men\'s Metallic (qty : 2), ', '3080', 'cod', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` int(10) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` int(100) NOT NULL,
  `qty` int(20) NOT NULL,
  `short_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `brand`, `category_id`, `price`, `qty`, `short_desc`, `desc`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Rolex Men\'s Metallic', 'r-m2.jpg', 1, 1, 1540, 10, 'Customized Rolex Day-Date watch from 777. Metallic 2010 Pre-owned Oyster Perpetual Day-date Watch', 'Do you want to stand out in the crowd? Try one of our best and stylish designs of watches. Unique design, premium quality, and great look. Multiple colors and styles to choose from, so you can look like exactly how you would like to be shown.', 1, '2021-07-19 20:35:42', '2021-08-16 11:12:15'),
(6, 'Casio LTP-1215A-7ADF Wrist Watch', 'c-w2.jpg', 4, 2, 2000, 10, 'Casio LTP-1215A-7ADF Wrist Watch for Woman. Watch is manufactured by Casio.', 'This version of the woman Watch comes in Black DiaL Colour, Special Features: Date, Watch Shape: Round, Chain Material: StainlessSteel, Watch Movement: (Quartz) by Japan.', 1, '2021-07-19 22:33:29', '2021-08-16 07:48:33'),
(7, 'Casio LTP-V300D-2AUDF', 'c-w3.webp', 4, 2, 2400, 0, 'Water resistant Date, day and 24-hour indicato Stainless steel band', 'Triple-fold Clasp\r\nStainless Steel Band\r\nMineral Glass\r\nWater Resistant\r\nRegular timekeeping\r\nAnalog: 3 hands (hour, minute, second), 3 dials (date, day, 24-hour) Accuracy: ±20 seconds per month Approx. battery life: 3 years on SR920SW', 1, '2021-07-19 22:50:14', '2021-08-16 07:51:46'),
(8, 'WW1013 Casio Enticer', 'c-w4.jpg', 4, 2, 5000, 0, 'Mechanism: Quartz Dial: White Dial shape: Round Case Material:Steel Case Color: Silver', 'This version of the woman Watch comes in Black DiaL Colour, Special Features: Date, Watch Shape: Round, Chain Material: StainlessSteel, Watch Movement: (Quartz) by Japan.', 1, '2021-07-19 22:50:49', '2021-08-16 07:55:49'),
(9, 'G-Shock Men\'s Masterpiece Gold', 'c-m.jpg', 4, 1, 6000, 0, 'G-Shock Men\'s Metallic G - Shock Masterpiece Gold - Tone Watch', 'Gold-tone ip; stainless steel; resin; mineral crystal. Buckle closure. Water resistant to 20 atm. Digital quartz movement. Solar powered. Shock resistant. Wireless mobile link using bluetooth®. Time calibration signal reception. Adjusts automatically for daylight savings time. Tracks world time, times in 39 cities and coordinated universal time. Features stopwatch, countdown timer, multiple alarms and calendar. Provides low battery alert and power saving mode. Tiled gray led super illuminator backlit dial with day and date displays. Gold-tone resin strap. Manufacturer\'s 1-year limited warranty. Color: metallic', 1, '2021-07-20 00:26:46', '2021-08-25 08:41:47'),
(10, 'Rolex Men\'s Vintage Gold', 'r-m1.jpg', 1, 1, 179995, 0, 'Rolex Men\'s Metallic Vintage Gold Yellow Gold Watches. Size unique. Good condition. Color: metallic', '18kt yellow gold case with a 18kt yellow gold president bracelet. Fixed 18kt yellow gold bezel set with diamonds. Gold diamond pave dial with yellow gold-tone hands and baguette diamond hour markers. Baguette-cut rubies at the 6 and 9 o\'clock positions. Dial type: analog. Luminescent hands. Date display at the 3 o\'clock position. Day of the week display centered on the 12 o\'clock position. Rolex caliber 3255 automatic movement with a 70-hour power reserve. Scratch resistant sapphire crystal. Screw down crown. Solid case back. Round case shape. Band width: 20 mm. Deployment clasp with a push button release. Water resistant at 100 meters / 330 feet. Functions: date, hour, minute, second. Luxury watch style. Rolex day-date 40 automatic gold diamond pave dial men 18kt yellow gold president watch -0030.', 1, '2021-07-20 00:30:52', '2021-08-16 08:27:49'),
(12, 'Timex Men\'s Gray Allied Watch', 't-m.jpg', 5, 1, 350, 0, 'Quartz movement Orange Rubber strap Buckle clasp Stainless Steel case Case: 42mm x 12mm Water-resistant up to 30 meters Manufacturer\'s limited warranty. Color: gray', 'Quartz movement Orange Rubber strap Buckle clasp Stainless Steel case Case: 42mm x 12mm Water-resistant up to 30 meters Manufacturer\'s limited warranty. Color: gray. Quartz movement. Orange Rubber strap. Buckle clasp. Stainless Steel case. Case: 42mm x 12mm. Water-resistant up to 30 meters. Manufacturer\'s limited warranty. The Watch Size Guide: Find Your Perfect Timepiece.', 1, '2021-07-20 01:41:39', '2021-08-25 08:51:31'),
(13, 'Casio Sheen', 'c-w5.jpg', 4, 2, 3000, 0, 'Mechanism: Quartz Dial: White Dial shape: Round Case Material: Steel Case Color: Silver', 'This version of the woman Watch comes in Black DiaL Colour, Special Features: Date, Watch Shape: Round, Chain Material: StainlessSteel, Watch Movement: (Quartz) by Japan.', 1, '2021-08-16 07:31:10', '2021-08-16 07:58:01'),
(14, 'Women\'s Milano Watch', 't-w.jpg', 5, 2, 1900, 0, 'Timex Women\'s Milano Watch', 'Quartz movement. Red Leather Strap. Deployment clasp. Brass bezel. Brass case. Pull and Push Crown crown. Silver dial. Date display. Case: 26.5mm in diameter x 7mm. Bracelet/strap: 8mm wide x 7in long. Water-resistant up to 30 meters. Manufacturer\'s limited warranty. The Watch Size Guide: Find Your Perfect Timepiece.\r\n\r\nperfect for all occasion and party. first choice for fashion lover. made with high quality imported material.\r\n\r\nvery easy with platform sole. rise your standard of life .high demanding style in summer  season 2020. along with beautiful bo', 1, '2021-08-16 10:12:39', '2021-08-16 08:01:52'),
(15, 'Women\'s Metallic Watch', 't-w1.jpg', 5, 2, 1250, 0, 'Timex Women\'s Metallic Watch', 'Quartz movement. Pink fabric strap. Tang clasp. Brass bezel. Cream dial. Case: 38mm. Manufacturer\'s limited warranty. The Watch Size Guide: Find Your Perfect Timepiece', 1, '2021-08-16 10:20:37', '2021-08-16 08:03:15'),
(16, 'Women\'s Blue Watch', 't-w2.jpg', 5, 2, 1700, 0, 'Timex Women\'s Blue Watch', 'Fashion Infinity is general trading company since last 10 years. Designs which we provide are very trendy at the same time are on most reasonable prices as compare to market. Visit our shop at Daraz and enjoy hundred of different designs which can suit your need', 1, '2021-08-16 10:34:13', '2021-08-16 08:04:59'),
(17, 'Women\'s Pink Weekender Watch', 't-w3.jpg', 5, 2, 900, 0, 'Timex Women\'s Pink Weekender Watch', 'Fashion Infinity is general trading company since last 10 years. Designs which we provide are very trendy at the same time are on most reasonable prices as compare to market. Visit our shop at Daraz and enjoy hundred of different designs which can suit your need', 1, '2021-08-16 10:36:57', '2021-08-16 08:06:08'),
(18, 'Timex Men\'s Black Classic Watch', 't-m3.jpg', 5, 1, 3450, 0, 'Quartz movement Green Nylon strap Buckle clasp Stainless Steel bezel Stainless Steel case Mineral crystal Push/pull crown Black dial Case: 40mm x 14mm Bracelet/strap: 14mm wide x 7in long Water-resistant up to 30 meters Manufacturer\'s limited warranty. Color: black', 'Quartz movement Green Nylon strap Buckle clasp Stainless Steel bezel Stainless Steel case Mineral crystal Push/pull crown Black dial Case: 40mm x 14mm Bracelet/strap: 14mm wide x 7in long Water-resistant up to 30 meters Manufacturer\'s limited warranty. Color: black', 1, '2021-08-16 06:04:09', '2021-08-25 08:59:48'),
(19, 'G-Shock Men\'s Metallic G - Tone Watch', '8aac1f65bf97be6b7ca3b0c2a29b76a0.jpg', 4, 1, 8000, 0, 'Waterproof, Luminous, Week display, Month Display, Calendar, Chronograph, 24 hours Indicator, Stopwatch.', 'This is one stylish Taixun Multi-function Outdoor Sports Waterproof Men\'s Digital Electronic Watch, A watch with stylish sporty look wearing with popular design for our beloved and valuable customers, its digital and have Luminous, Week Display, Alarm, Month display, Date, Chronograph, Calendar 24 hours indication, Stopwatch, day function, 12/24 hrs format. It can be used while swimming, running and with other sports activities and for business and casual wear as well. It has Digital Electronic display with the waterproof performance up to 30 meters. The round Dial diameter is 54 mm and strap width is about 24 mm with 18 mm thickness. it has high quality stainless steel pin buckle clasp and strap material is consist of  Thermoplastic Polyurethane Elastomer Rubber.', 1, '2021-08-16 06:05:48', '2021-08-25 08:44:24'),
(20, 'Timex Metallic Men\'s Watch', 't-m1.jpg', 5, 1, 4000, 0, 'Quartz movement. Silver Stainless Steel bracelet. Integrated clasp. Brass bezel. Brass case. Push-pull crown. White dial. Case: 39mm. Water-resistant up to 50 meters. Manufacturer\'s limited warranty. The Watch Size Guide: Find Your Perfect Timepiece. Color: metallic', 'Quartz movement Silver Stainless Steel bracelet Integrated clasp Brass bezel Brass case Push-pull crown White dial Case: 39mm Water-resistant up to 50 meters Manufacturer\'s limited warranty.', 1, '2021-08-16 06:09:58', '2021-08-25 08:54:31'),
(21, 'Timex Men\'s Metallic Allied Watch', 't-m2.webp', 5, 1, 4500, 0, 'Fold over clasp. Stainless Steel bezel. Stainless Steel case. Mineral crystal. Push-pull crown. White dial. Case: 40mm in diameter x 10mm. Bracelet/strap: 20mm wide x 7in long. Water-resistant up to 50 meters. Manufacturer\'s limited warranty. The Watch Size Guide: Find Your Perfect Timepiece.', 'Fold over clasp. Stainless Steel bezel. Stainless Steel case. Mineral crystal. Push-pull crown. White dial. Case: 40mm in diameter x 10mm. Bracelet/strap: 20mm wide x 7in long. Water-resistant up to 50 meters. Manufacturer\'s limited warranty. The Watch Size Guide: Find Your Perfect Timepiece.', 1, '2021-08-16 06:22:14', '2021-08-25 08:57:41'),
(25, 'G-Shock Men\'s Metallic Casio', 'c-m1.jpg', 4, 1, 4900, 0, 'Mineral glass. Resin band. Stainless steel case. Full-auto led light. Shockproof. World time function. Stop function - 1/100 sec. 24 hours. Timer - 1/1 sec. 24 hours. 5 daily alarms. Automatic calendar with date, month and weekday. 12/24 hour format. Water resistance classification (20 bar). 51,9 mm x 48,8 mm x 16,9 mm (h x w x d). Approx. 93 g. Color: Semi-Transparent', 'Mineral glass. Resin band. Stainless steel case. Full-auto led light. Shockproof. World time function. Stop function - 1/100 sec. 24 hours. Timer - 1/1 sec. 24 hours. 5 daily alarms. Automatic calendar with date, month and weekday. 12/24 hour format. Water resistance classification (20 bar). 51,9 mm x 48,8 mm x 16,9 mm (h x w x d). Approx. 93 g. Color: Semi-Transparent', 1, '2021-08-25 09:03:04', '2021-08-16 08:09:16'),
(26, 'Men\'s Metallic Analog Digital Shock Resistant', 'c-m2.jpg', 4, 1, 20000, 0, 'From G-Shock, this Ana Digi Shock Resistant Resin Watch features:Black resin band with buckle closureStainless steel round caseBlack digital displayDigital movementApprox. Color: metallic', 'Illuminator. Shockproof. Display flasher. Stop function - 1/100 sec. 24 hrs. Timer - 1/1 sec. 24 hrs. Multifunctional alarm. Automatic calendar. 12/24-hour format. Mineral glass. Stainless steel resin case. Resin bracelet. Thorn close. 2 years - 1 battery. Water resistance classification (20 bar). Dimensions (h x w x d): 48.9mm x 42.8mm x 13.4mm. Ca. 57 g. Color: Silver / Black.', 1, '2021-08-25 09:05:22', '2021-08-16 08:10:00'),
(27, 'Rolex Metallic Champagne', 'r-m3.jpg', 1, 1, 30000, 0, 'Oyster Perpetual Cosmograph Daytona 18k White Gold Chronograph Watch', 'Look your best with this stylish wrist watch from Rolex. It has a round stainless steel case with an 18k yellow gold fluted bezel which encases a stunning champagne dial. The dial also features raised sparkling diamonds as hour markers and a date window with a Cyclops magnifier. Includes: The Luxury Closet Packaging. Case Diameter: 36 MM. Movement Type: Automatic. Case Material : Stainless Steel. Bracelet Material : Steel and Gold. Production Year: 1976. Condition: Well Used. Great vintage condition. The bracelet has some flex.. Color: metallic', 1, '2021-08-25 09:15:42', '2021-08-25 09:15:42'),
(28, 'Rolex Metallic Gold Diamonds 18k Gold', 'r-w.jpg', 1, 2, 1399, 0, 'Oyster Perpetual Datejust 36 Champagne Dial 18k Yellow Gold Automatic Watch', 'The house of Rolex brings to you this classic wristwatch that has been designed to exude an aura of luxuriousness to your attire. Precisely designed with an elegant yellow gold dial, this watch features sparkling diamond hour markers and an eye-catching 18k gold presidential bracelet. The watch comes with a chronometer self-winding movement and a classic day window at the 12th hour and date window at 3rd hour for extra convenience. Includes: Rolex box and papers. Case Diameter: 36 MM. Movement Type: Automatic. Case Material : 18k yellow gold. Bracelet Material : 18k yellow gold. Production Year: 1995. Condition: Gently Used. Excellent condition.. Color: metallic', 1, '2021-08-25 09:19:07', '2021-08-25 09:19:07'),
(29, 'Rolex Men\'s Daytona Green Dial 18k', 'r-m5.jpg', 1, 1, 3800, 0, 'Rolex Men\'s Metallic Cosmograph Daytona Green Dial 18k Yellow Gold Oyster Watch 116508grso', '18kt yellow gold case with a 18kt yellow gold rolex oyster bracelet. Fixed 18kt yellow gold bezel showing tachymeter markings. Green dial with gold-tone hands and index hour markers. Minute markers around the outer rim. Dial type: analog. Luminescent hands and markers. Chronograph - three sub-dials displaying: 60 second, 30 minute and 12 hour. Rolex caliber 4130 automatic movement with a 72-hour power reserve. Scratch resistant sapphire crystal. Screw down crown. Solid case back. Case thickness: 12.5 mm. Round case shape. Band width: 20 mm. Oysterlock clasp. Water resistant at 100 meters / 330 feet. Functions: chronograph, tachymeter, hour, minute, second. Luxury watch style. Watch label: swiss made. Rolex cosmograph daytona green dial 18k yellow gold oyster mens watch 116508grso. Color: metallic', 1, '2021-08-25 09:21:01', '2021-08-25 09:21:01'),
(30, 'Citizen Men\'s Metallic Watch', 'c-m (2).jpg', 6, 1, 4400, 0, 'display Case: 44mm x 11mm Bracelet/strap: 22mm wide x 9in long Water-resistant up to 100 meters 1-year limited third party warranty Our products are 100% genuine. In some cases we purchase merchandise from trusted independent suppliers and not directly from the brand owner. Color: metallic', 'Ecodrive movement. Brown Leather strap. Buckle clasp. Stainless Steel bezel. Stainless Steel case. Mineral crystal. Push/Pull crown. Black dial with \'Auto 2\'! Date display. Case: 44mm x 11mm. Bracelet/strap: 22mm wide x 9in long. Water-resistant up to 100 meters. 1-year limited third party warranty. The Watch Size Guide: Find Your Perfect Timepiece. Our products are 100% genuine. In some cases we purchase merchandise from trusted independent suppliers and not directly from the brand owner. In all cases we stand by the authenticity of every product sold on our site.', 1, '2021-08-25 09:24:53', '2021-08-25 09:24:53'),
(31, 'Citizen Women\'s Blue', 'cc-w.jpg', 6, 2, 3000, 0, 'Citizen Women\'s Blue Paradigm Eco-drive Titanium Chronograph Bracelet Watch', 'Striking titanium chronograph watch features a vivid blue dial in a three sub-dial design. Center Core - M Jewelry/watches > Saks Off 5th > Barneys Warehouse. Citizen. Color: blue', 1, '2021-08-25 09:27:02', '2021-08-25 09:29:08'),
(32, 'Citizen Men\'s Metallic Watch', 'cc-m.jpg', 6, 1, 7399, 0, 'Bracelet/strap: 22mm wide x 9in long Water-resistant up to 100 meters 1-year limited third party warranty Our products are 100% genuine. In some cases we purchase merchandise from trusted independent suppliers and not directly from the brand owner. Color: metalli', 'Ecodrive movement. Black Nylon strap. Buckle clasp. Stainless Steel bezel. Stainless Steel case. Mineral crystal. Push/Pull crown. Black dial with \'Auto 2\'! Date display. Case: 42mm x 11mm. Bracelet/strap: 22mm wide x 9in long. Water-resistant up to 100 meters. 1-year limited third party warranty. The Watch Size Guide: Find Your Perfect Timepiece. Our products are 100% genuine. In some cases we purchase merchandise from trusted independent suppliers and not directly from the brand owner. In all cases we stand by the authenticity of every product sold on our site', 1, '2021-08-25 09:31:04', '2021-08-25 09:31:04'),
(33, 'Citizen Metallic Women\'s Stainless Steel Watch', 'cc-w1.jpg', 6, 2, 7000, 0, 'Case: 32mm in diameter Bracelet/strap: 8.75in long 1-year limited third party warranty Our products are 100% genuine. In some cases we purchase merchandise from trusted independent suppliers and not directly from the brand owner.', 'Quartz movement. Silver-Tone stainless steel bracelet. Deployment clasp. Stainless steel bezel and case. Mother-of-pearl dial. Case: 32mm in diameter. Bracelet/strap: 8.75in long. 1-year limited third party warranty. Our products are 100% genuine. In some cases we purchase merchandise from trusted independent suppliers and not directly from the brand owner. In all cases we stand by the authenticity of every product sold on our site. The Watch Size Guide: Find Your Perfect Timepiece. Color: metallic', 1, '2021-08-25 09:33:08', '2021-08-25 09:33:08'),
(34, 'Citizen Men\'s Drive Khaki Nylon', 'cc-m1.jpg', 6, 1, 5000, 0, 'Citizen Men\'s Drive Khaki Nylon Strap Watch 42mm Bm6995-01x', 'Go sporty with this orange accented timepiece from Citizen\'s Drive collection, featuring a khaki nylon strap. Khaki nylon strap. Round black ion-plated stainless steel case, 42mm. Dark green dial with orange numerals, stick indices, three hands, date window and Citizen logo. Quartz movement. Water resistant to 100 meters. Five-year limited warranty. Macy\'s does not offer its own watch warranty; all warranties are provided by the vendor. Powered by Eco-Drive, harnessing both natural and artificial light, never needing a battery. Boxes, or APOs. After delivery, visit a Macy\'s store with your dated receipt and jewelry purchase to sign up. Color: multicolor', 1, '2021-08-25 09:36:02', '2021-08-16 08:07:52'),
(35, 'Citizen Women\'s Gray Stainless Steel Rubber', 'cc-w2.jpg', 6, 2, 6000, 0, 'Citizen Women\'s Gray Stainless Steel Rubber-strap Watch', 'Sporty diving watch with date display feature and a rubber strap for ease of wear. Center Core - M Jewelry/watches > Saks Off 5th > Barneys Warehouse. Citizen. Color: gray', 1, '2021-08-25 09:37:17', '2021-08-16 08:08:49'),
(36, 'Citizen Men\'s Metallic Watch Collection Watch', 'cc-m3.jpg', 6, 1, 6800, 0, 'Case: 37mm x 12mm Bracelet/strap: 16mm wide x 9in long Water-resistant up to 100 meters 1-year limited third party warranty Our products are 100% genuine. In some cases we purchase merchandise from trusted independent suppliers and not directly from the brand owner. Color: metallic', 'Ecodrive movement. Silver-Tone Stainless Steel bracelet. Fold Over with Push Buttons clasp. Stainless Steel bezel. Stainless Steel case. Push/pull crown. Black dial. Case: 37mm x 12mm. Bracelet/strap: 16mm wide x 9in long. Water-resistant up to 100 meters. 1-year limited third party warranty. The Watch Size Guide: Find Your Perfect Timepiece. Our products are 100% genuine. In some cases we purchase merchandise from trusted independent suppliers and not directly from the brand owner. In all cases we stand by the authenticity of every product sold on our site.', 1, '2021-08-25 09:38:41', '2021-08-25 09:38:41'),
(37, 'Citizen Metallic Women\'s yellow', 'r-w.jpg', 6, 2, 4800, 0, 'Citizen Metallic Women\'s Stainless Steel Watch', 'Quartz movement. Gold-tone stainless steel bracelet. Fold-over clasp. Stainless steel bezel and case. Mineral crystal. Push-pull crown. Silver-tone dial with gold-tone hands. Date display. Case: 37mm in diameter x 9mm thick. Bracelet/strap: 10mm wide x 7.5in long. Water-resistant up to 50 meters. 1-year limited third party warranty. Our products are 100% genuine. A In some cases we purchase merchandise from trusted independent suppliers and not directly from the brand owner. A In all cases we stand by the authenticity of every product sold on our site. The Watch Size Guide: Find Your Perfect Timepiece. Color: metallic', 1, '2021-08-25 09:41:05', '2021-08-16 07:29:21'),
(38, 'Rolex Women\'s Blue Oyster Perpetual', 'r-w2.jpg', 1, 2, 6300, 0, 'Rolex Women\'s Blue 2021 Unworn Oyster Perpetual 34mm', 'Blue stainless steel 2021 unworn Oyster Perpetual 34mm from Rolex Pre-Owned featuring automatic movement, round face, index dial, central hours, minutes and seconds, sapphire-crystal glass, screw-down crown and adjustable link bracelet. This piece is new and unworn. Original box, papers and CHRONEXT certificate. An inspection by the CHRONEXT-certified watchmakers guarantees authenticity. All repairs of the movement of the watch and the repairs of water-resistant watches with water damage are covered by the CHRONEXT two-year warranty. Color: blue', 1, '2021-08-16 07:33:35', '2021-08-16 07:33:35'),
(39, 'Rolex Women\'s Green', 'r-w3.jpg', 1, 2, 4800, 0, 'Rolex Women\'s Green 2021 Unworn Oyster Perpetual 31mm', 'Green stainless steel 2021 unworn Oyster Perpetual 31mm from Rolex Pre-Owned featuring round face, automatic movement, index hands, screw-down crown, signature Oyster Perpetual bracelet, signature Oysterlock clasp and central hours, minutes and seconds. Original box, papers and CHRONEXT certificate. An inspection by the CHRONEXT-certified watchmakers guarantees authenticity. All repairs of the movement of the watch and the repairs of water-resistant watches with water damage are covered by the CHRONEXT two-year warranty. Color: green', 1, '2021-08-16 07:35:27', '2021-08-16 07:35:27'),
(40, 'Rolex Women\'s Red', 'r-w4.jpg', 1, 2, 6100, 0, 'Rolex Women\'s Red 2021 Unworn Oyster Perpetual 31mm', 'Red stainless steel 2021 unworn Oyster Perpetual 31mm from Rolex Pre-Owned featuring automatic movement, round face, index dial, central hours, minutes and seconds, sapphire-crystal glass, screw-down crown and adjustable link bracelet. This piece is new and unworn. Original box, papers and CHRONEXT certificate. An inspection by the CHRONEXT-certified watchmakers guarantees authenticity. All repairs of the movement of the watch and the repairs of water-resistant watches with water damage are covered by the CHRONEXT two-year warranty. Color: red', 1, '2021-08-16 07:37:02', '2021-08-16 07:37:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
