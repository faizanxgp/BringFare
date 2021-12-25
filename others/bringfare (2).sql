-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2017 at 11:58 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bringfare`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `job_title`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ayaz', 'admin1@yahoo.com', '$2y$10$RSnm8sRMhNlv3TmQ5CQb/OGC9bPasJVGYgyDz5/Gb1KBD/YJIQTNu', 'Admin', 'Vt6mdYy08jSoHZG0wAYq0vT1bRS1FASsFoF5Dvx62eYsjodohmsFDSabA1Is', '2017-05-04 23:43:34', '2017-05-04 23:43:34'),
(2, 'Nameer', 'admin2@yahoo.com', '$2y$10$aPypyq8W2zAjvc71fYz5q.JHWWEhtM0WPv6ERLSE3CuzWwLtKkkNO', 'Manager', 'HDBNVpls35v966u4vLj0uHuGWPCMMD3QZVW1b7fRAFiebd68dD9rMZhMLxTh', '2017-05-05 09:45:18', '2017-06-02 00:31:58');

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `product_id`, `user_id`, `amount`, `comments`, `attachement`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, 1, '100.00', 'this is my message', '', 'Applied', '2017-05-23 23:53:23', '2017-05-23 23:53:23'),
(3, 7, 2, '111.00', 'sdfasdfsadfsadf', '', 'Applied', '2017-05-24 00:10:08', '2017-05-24 00:10:08'),
(4, 5, 1, '111.00', 'asdfasfdasdfasdf', '', 'Applied', '2017-05-24 00:13:57', '2017-05-24 00:13:57'),
(5, 1, 1, '100.00', 'I can get you this', '', 'Applied', '2017-05-24 01:16:20', '2017-05-24 01:16:20'),
(6, 8, 2, '115.00', 'Can I post here?', '', 'Applied', '2017-05-24 01:42:03', '2017-05-24 01:42:03'),
(7, 2, 2, '116.00', 'for #2', '', 'Selected', '2017-05-24 03:21:33', '2017-06-01 00:09:42'),
(8, 3, 2, '123.00', 'For #3', '', 'Delivered', '2017-05-24 03:21:49', '2017-06-01 00:45:15'),
(10, 1, 2, '1.00', 'sadfasdfsadf', '', 'Applied', '2017-05-24 03:30:34', '2017-05-24 03:30:34'),
(11, 8, 3, '116.00', 'Test Message to offer', '', 'Selected', '2017-05-24 22:12:27', '2017-05-30 00:12:07'),
(12, 9, 2, '110.00', 'I can get it for you.', '', 'Delivered', '2017-05-31 23:32:07', '2017-06-11 23:17:07'),
(13, 9, 3, '120.00', 'Testing', '', 'Applied', '2017-05-31 23:41:26', '2017-05-31 23:41:26'),
(14, 10, 3, '120.00', 'Hi, I can help in getting this.', '', 'Selected', '2017-06-09 23:36:27', '2017-06-16 23:32:12'),
(15, 4, 1, '1000.00', 'I can get it in 1000 USD', '', 'Delivered', '2017-06-11 23:32:26', '2017-06-11 23:33:23'),
(16, 11, 2, '275.00', 'I can get this', '', 'Selected', '2017-06-16 00:06:37', '2017-06-16 00:11:49'),
(17, 12, 2, '110.00', 'test', '', 'Selected', '2017-06-16 23:41:15', '2017-06-16 23:41:54'),
(18, 13, 2, '111.00', 'sadfsadfsdafsdf', '', 'Selected', '2017-06-30 00:48:57', '2017-06-30 00:58:30'),
(19, 14, 2, '100.00', 'I can get this for you', '', 'Selected', '2017-07-04 23:18:14', '2017-07-04 23:20:37'),
(20, 14, 1, '110.00', 'I can also get you this', '', 'Applied', '2017-07-04 23:19:25', '2017-07-04 23:19:25'),
(21, 15, 2, '225.00', 'just testing', '', 'Selected', '2017-07-04 23:39:46', '2017-07-04 23:40:27'),
(22, 16, 3, '100.00', 'something', '', 'Applied', '2017-07-04 23:46:03', '2017-07-04 23:46:03'),
(23, 17, 2, '1000.00', 'just testing', '2-laraveldevelopers.jpg', 'Applied', '2017-07-05 02:50:09', '2017-07-05 02:50:09'),
(24, 18, 1, '190.00', 'My price here', '1-galaxy-earth.jpg', 'Applied', '2017-07-05 22:23:48', '2017-07-05 22:23:48'),
(25, 18, 3, '180.00', 'my offer', '3-user-image.jpg', 'Applied', '2017-07-05 22:36:49', '2017-07-05 22:36:49'),
(26, 19, 2, '110.00', 'test message', '', 'Selected', '2017-07-11 01:27:11', '2017-07-11 01:27:51'),
(27, 16, 2, '100.00', 'test 001', '', 'Applied', '2017-07-18 00:57:31', '2017-07-18 00:57:31'),
(28, 26, 1, '200.00', 'testing', '', 'Selected', '2017-08-17 00:25:07', '2017-08-17 00:25:20');

-- --------------------------------------------------------

--
-- Table structure for table `bid_comments`
--

CREATE TABLE `bid_comments` (
  `id` int(11) NOT NULL,
  `bid_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_by` varchar(20) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `attachement` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bid_comments`
--

INSERT INTO `bid_comments` (`id`, `bid_id`, `user_id`, `comment_by`, `comments`, `attachement`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 'Buyer', 'Details', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 6, 2, 'Seller', 'More Details', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 6, 2, 'Seller', 'Hi again', '', '2017-05-24 12:25:39', '2017-05-24 12:25:39'),
(6, 6, 1, 'Buyer', 'comment by buyer', '', '2017-05-25 03:45:03', '2017-05-25 03:45:03'),
(7, 6, 2, 'Seller', 'comment by seller', '', '2017-05-25 03:45:31', '2017-05-25 03:45:31'),
(8, 6, 1, 'Buyer', 'another comment by buyer', '', '2017-05-25 03:47:52', '2017-05-25 03:47:52'),
(9, 12, 1, 'Buyer', 'Hi there', '', '2017-06-01 04:33:59', '2017-06-01 04:33:59'),
(10, 14, 1, 'Buyer', 'Thanks for you update. When you go there?', '', '2017-06-10 04:36:57', '2017-06-10 04:36:57'),
(11, 14, 3, 'Seller', 'I will go there next month.', '', '2017-06-10 04:37:18', '2017-06-10 04:37:18'),
(12, 14, 1, 'Buyer', 'Ok, I am selecting you.', '', '2017-06-10 04:37:30', '2017-06-10 04:37:30'),
(13, 14, 3, 'Seller', 'Thanks for selecting me.', '', '2017-06-10 04:37:45', '2017-06-10 04:37:45'),
(14, 12, 1, 'Buyer', 'Adding funds now', '', '2017-06-12 04:15:51', '2017-06-12 04:15:51'),
(15, 12, 2, 'Seller', 'I have purchased product.', '', '2017-06-12 04:16:37', '2017-06-12 04:16:37'),
(16, 12, 2, 'Seller', 'Delivering it to you.', '', '2017-06-12 04:17:03', '2017-06-12 04:17:03'),
(17, 19, 3, 'Buyer', 'Funds added, please buy this asap.', '', '2017-07-05 04:22:21', '2017-07-05 04:22:21'),
(18, 19, 2, 'Seller', 'Item purchased.', '', '2017-07-05 04:22:41', '2017-07-05 04:22:41'),
(19, 19, 2, 'Seller', 'item delivered.', '', '2017-07-05 04:23:00', '2017-07-05 04:23:00'),
(20, 19, 3, 'Buyer', 'item received. thanks/', '', '2017-07-05 04:23:23', '2017-07-05 04:23:23'),
(21, 21, 3, 'Buyer', 'Thanks for applying.', '', '2017-07-05 04:41:08', '2017-07-05 04:41:08'),
(22, 21, 2, 'Seller', 'Thanks for selecting me.', '', '2017-07-05 04:41:33', '2017-07-05 04:41:33'),
(23, 21, 2, 'Seller', 'Thanks for selecting me.', '', '2017-07-05 04:42:01', '2017-07-05 04:42:01'),
(24, 23, 2, 'Seller', 'aaa', '23-developers-team.jpg', '2017-07-05 07:56:26', '2017-07-05 07:56:26'),
(25, 24, 2, 'Buyer', 'can you get this', '24-profile.jpg', '2017-07-06 03:37:19', '2017-07-06 03:37:19'),
(26, 22, 1, 'Buyer', 'test', '', '2017-07-07 04:03:11', '2017-07-07 04:03:11'),
(27, 26, 1, 'Buyer', 'Hello', '', '2017-07-11 06:28:18', '2017-07-11 06:28:18'),
(28, 26, 2, 'Seller', 'Hi', '', '2017-07-11 06:28:40', '2017-07-11 06:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `bid_statuses`
--

CREATE TABLE `bid_statuses` (
  `id` int(11) NOT NULL,
  `bid_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `status_date` datetime NOT NULL,
  `comments` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Food and Drinks', NULL, NULL),
(2, 'Collectibles', NULL, NULL),
(3, 'Lifestyle Gadgets', NULL, NULL),
(4, 'Ladies'' Fashion and Accessories', NULL, NULL),
(5, 'Men''s Fashion and Accessories', NULL, NULL),
(6, 'Sports', NULL, NULL),
(7, 'Beauty Products', NULL, NULL),
(8, 'Household Products', NULL, NULL),
(9, 'Mums and Babies', NULL, NULL),
(10, 'Pets', NULL, NULL),
(11, 'Games', NULL, NULL),
(12, 'Everything Else', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `followings`
--

CREATE TABLE `followings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `follow_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `followings`
--

INSERT INTO `followings` (`id`, `user_id`, `follow_by`, `created_at`, `updated_at`) VALUES
(2, 4, 2, '2017-07-05 00:26:01', '2017-07-05 00:26:01'),
(5, 4, 3, '2017-07-05 01:00:02', '2017-07-05 01:00:02'),
(6, 1, 3, '2017-07-05 01:00:24', '2017-07-05 01:00:24'),
(7, 2, 3, '2017-07-05 01:00:27', '2017-07-05 01:00:27'),
(8, 2, 1, '2017-07-05 01:00:58', '2017-07-05 01:00:58'),
(9, 3, 1, '2017-07-05 01:01:02', '2017-07-05 01:01:02'),
(10, 4, 1, '2017-07-05 01:01:06', '2017-07-05 01:01:06'),
(11, 1, 2, '2017-07-05 01:03:11', '2017-07-05 01:03:11'),
(12, 3, 2, '2017-07-05 01:03:17', '2017-07-05 01:03:17');

-- --------------------------------------------------------

--
-- Table structure for table `invitations`
--

CREATE TABLE `invitations` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invitations`
--

INSERT INTO `invitations` (`id`, `product_id`, `user_id`, `comments`, `created_at`, `updated_at`) VALUES
(1, 16, 2, 'Invited', '2017-07-05 01:57:00', '2017-07-05 01:57:00'),
(2, 16, 1, 'Invited', '2017-07-05 01:57:00', '2017-07-05 01:57:00'),
(3, 16, 3, 'Invited', '2017-07-05 01:57:00', '2017-07-05 01:57:00'),
(4, 16, 4, 'Invited', '2017-07-05 01:57:00', '2017-07-05 01:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `ledgers`
--

CREATE TABLE `ledgers` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(18,2) NOT NULL,
  `narration` varchar(255) NOT NULL,
  `auth_code` varchar(255) NOT NULL,
  `trans_id` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ledgers`
--

INSERT INTO `ledgers` (`id`, `amount`, `narration`, `auth_code`, `trans_id`, `user_id`, `created_at`, `updated_at`) VALUES
(21, '100.00', 'Membership', 'GU6GDR', '40003763010', 30, '2016-10-14 06:44:45', '2016-10-14 06:44:45'),
(22, '100.00', 'Membership', '77GOL6', '40003763044', 30, '2016-10-14 06:50:31', '2016-10-14 06:50:31'),
(23, '100.00', 'Membership', '6SB7NE', '40003763064', 30, '2016-10-14 06:53:45', '2016-10-14 06:53:45'),
(24, '100.00', 'Membership', '1ZKVDU', '40003763073', 30, '2016-10-14 06:55:49', '2016-10-14 06:55:49'),
(25, '100.00', 'Membership', 'IGMW42', '40003763091', 30, '2016-10-14 06:58:12', '2016-10-14 06:58:12'),
(26, '100.00', 'Membership', 'HHVB9K', '40003763132', 30, '2016-10-14 07:02:56', '2016-10-14 07:02:56'),
(27, '100.00', 'Membership', 'OTYLWO', '40003763164', 30, '2016-10-14 07:07:36', '2016-10-14 07:07:36'),
(28, '100.00', 'Membership', 'QVBZTN', '40003763184', 30, '2016-10-14 07:11:57', '2016-10-14 07:11:57'),
(29, '100.00', 'Membership', 'S5DIEK', '40003763217', 30, '2016-10-14 07:15:46', '2016-10-14 07:15:46'),
(30, '100.00', 'Membership', '6ZOWKK', '40003763232', 30, '2016-10-14 07:19:45', '2016-10-14 07:19:45'),
(31, '100.00', 'Membership', 'HS964W', '40003763262', 30, '2016-10-14 07:22:11', '2016-10-14 07:22:11'),
(32, '110.00', 'Membership Payment Received', 'N0M3UE', '40003960376', 31, '2016-10-28 02:30:18', '2016-10-28 02:30:18'),
(33, '-110.00', 'Membership Added', 'N0M3UE', '40003960376', 31, '2016-10-28 02:30:18', '2016-10-28 02:30:18'),
(34, '0.00', 'P-161029-0055 Payment Received', '2H4NV7', '40003980907', 26, '2016-10-29 00:40:54', '2016-10-29 00:40:54'),
(35, '0.00', 'P-161029-0055 Purchased', '2H4NV7', '40003980907', 26, '2016-10-29 00:40:54', '2016-10-29 00:40:54'),
(36, '1108.00', 'ABCD_121212 Shipped', 'W4G2XK', '40003996260', 18, '2016-10-31 00:52:28', '2016-10-31 00:52:28'),
(37, '-108.00', 'ABCD_121212 Shipping Charges', 'W4G2XK', '40003996260', 18, '2016-10-31 00:52:28', '2016-10-31 00:52:28'),
(38, '118.00', 'TEST-001 Shipped', 'E0K6XC', '40004020807', 20, '2016-10-31 23:47:51', '2016-10-31 23:47:51'),
(39, '-118.00', 'TEST-001 Shipping Charges', 'E0K6XC', '40004020807', 20, '2016-10-31 23:47:51', '2016-10-31 23:47:51'),
(40, '50.00', 'P-161125-0057 Payment Received', 'HOVEE0', '60011074693', 18, '2016-11-25 00:29:55', '2016-11-25 00:29:55'),
(41, '-50.00', 'P-161125-0057 Purchased', 'HOVEE0', '60011074693', 18, '2016-11-25 00:29:55', '2016-11-25 00:29:55'),
(42, '2.00', 'P-161031-0056 Payment Received', 'WXEVOX', '60011075146', 22, '2016-11-25 00:45:46', '2016-11-25 00:45:46'),
(43, '-2.00', 'P-161031-0056 Purchased', 'WXEVOX', '60011075146', 22, '2016-11-25 00:45:46', '2016-11-25 00:45:46'),
(44, '266.00', 'P-161127-0059 Payment Received', 'E7T89M', '60011189985', 32, '2016-11-27 00:13:30', '2016-11-27 00:13:30'),
(45, '-266.00', 'P-161127-0059 Purchased', 'E7T89M', '60011189985', 32, '2016-11-27 00:13:30', '2016-11-27 00:13:30'),
(46, '108.00', 'TX-12121212 Shipped', '6R2XOJ', '60011190128', 20, '2016-11-27 00:19:53', '2016-11-27 00:19:53'),
(47, '-108.00', 'TX-12121212 Shipping Charges', '6R2XOJ', '60011190128', 20, '2016-11-27 00:19:53', '2016-11-27 00:19:53'),
(48, '8.00', 'TEST Shipped', '9PH4NC', '60011190136', 18, '2016-11-27 00:20:42', '2016-11-27 00:20:42'),
(49, '-8.00', 'TEST Shipping Charges', '9PH4NC', '60011190136', 18, '2016-11-27 00:20:42', '2016-11-27 00:20:42'),
(50, '174.98', 'P-161221-0074 Payment Received', 'CQ3QO7', '60013219530', 35, '2016-12-21 20:36:14', '2016-12-21 20:36:14'),
(51, '-174.98', 'P-161221-0074 Purchased', 'CQ3QO7', '60013219530', 35, '2016-12-21 20:36:14', '2016-12-21 20:36:14'),
(52, '118.00', '558822 Shipped', 'SCVQCO', '60013220328', 35, '2016-12-21 20:55:22', '2016-12-21 20:55:22'),
(53, '-118.00', '558822 Shipping Charges', 'SCVQCO', '60013220328', 35, '2016-12-21 20:55:22', '2016-12-21 20:55:22'),
(54, '997.00', 'P-161207-0061 Payment Received', 'OMRNXL', '60013494237', 18, '2016-12-27 03:29:10', '2016-12-27 03:29:10'),
(55, '-997.00', 'P-161207-0061 Purchased', 'OMRNXL', '60013494237', 18, '2016-12-27 03:29:10', '2016-12-27 03:29:10'),
(56, '309.00', 'TEST0001 Shipped', '9DXT06', '60013829275', 18, '2017-01-02 00:55:50', '2017-01-02 00:55:50'),
(57, '-309.00', 'TEST0001 Shipping Charges', '9DXT06', '60013829275', 18, '2017-01-02 00:55:50', '2017-01-02 00:55:50'),
(58, '302.00', 'TEST0002 Shipped', '6SK4BQ', '60013829288', 18, '2017-01-02 00:57:18', '2017-01-02 00:57:18'),
(59, '-302.00', 'TEST0002 Shipping Charges', '6SK4BQ', '60013829288', 18, '2017-01-02 00:57:18', '2017-01-02 00:57:18'),
(60, '178.50', 'P-161207-0062 Payment Received', 'NMVY1Z', '60013941869', 18, '2017-01-04 05:58:40', '2017-01-04 05:58:40'),
(61, '-178.50', 'P-161207-0062 Purchased', 'NMVY1Z', '60013941869', 18, '2017-01-04 05:58:40', '2017-01-04 05:58:40'),
(62, '5.25', 'P-161207-0063 Payment Received', 'MYZ0Z6', '60013942284', 18, '2017-01-04 06:06:56', '2017-01-04 06:06:56'),
(63, '-5.25', 'P-161207-0063 Purchased', 'MYZ0Z6', '60013942284', 18, '2017-01-04 06:06:56', '2017-01-04 06:06:56'),
(64, '126.54', 'P-161207-0063 Payment Received', '191LJ8', '60013942309', 18, '2017-01-04 06:07:28', '2017-01-04 06:07:28'),
(65, '-126.54', 'P-161207-0063 Purchased', '191LJ8', '60013942309', 18, '2017-01-04 06:07:28', '2017-01-04 06:07:28'),
(66, '215.25', 'P-161207-0064 Payment Received', 'UZ0XPW', '60014180371', 18, '2017-01-09 01:32:22', '2017-01-09 01:32:22'),
(67, '-215.25', 'P-161207-0064 Purchased', 'UZ0XPW', '60014180371', 18, '2017-01-09 01:32:22', '2017-01-09 01:32:22'),
(68, '6.30', 'sss Shipped', 'YQ2P52', '60014180406', 18, '2017-01-09 01:33:41', '2017-01-09 01:33:41'),
(69, '-6.30', 'sss Shipping Charges', 'YQ2P52', '60014180406', 18, '2017-01-09 01:33:41', '2017-01-09 01:33:41'),
(70, '845.25', 'P-170418-0080 Payment Received', 'JVZ7UK', '60022466121', 18, '2017-04-20 23:20:27', '2017-04-20 23:20:27'),
(71, '-845.25', 'P-170418-0080 Purchased', 'JVZ7UK', '60022466121', 18, '2017-04-20 23:20:27', '2017-04-20 23:20:27'),
(72, '14.70', 'P-170427-0081 Payment Received', 'T3H93O', '60022816052', 18, '2017-04-27 01:28:16', '2017-04-27 01:28:16'),
(73, '-14.70', 'P-170427-0081 Purchased', 'T3H93O', '60022816052', 18, '2017-04-27 01:28:16', '2017-04-27 01:28:16'),
(74, '110.00', 'Membership Payment Received', 'AL3R4L', '60022881839', 18, '2017-04-28 02:08:00', '2017-04-28 02:08:00'),
(75, '-110.00', 'Membership Added', 'AL3R4L', '60022881839', 18, '2017-04-28 02:08:00', '2017-04-28 02:08:00'),
(76, '110.25', 'P-170327-0079 Payment Received', 'GAB8M3', '60022882438', 18, '2017-04-28 02:14:12', '2017-04-28 02:14:12'),
(77, '-110.25', 'P-170327-0079 Purchased', 'GAB8M3', '60022882438', 18, '2017-04-28 02:14:12', '2017-04-28 02:14:12'),
(78, '1167.60', 'aaaa Shipped', 'N6WOPO', '60022882487', 18, '2017-04-28 02:17:45', '2017-04-28 02:17:45'),
(79, '-1167.60', 'aaaa Shipping Charges', 'N6WOPO', '60022882487', 18, '2017-04-28 02:17:45', '2017-04-28 02:17:45'),
(80, '147.00', 'P-170429-0082 Payment Received', 'V2P8MI', '60022965547', 18, '2017-04-28 23:45:18', '2017-04-28 23:45:18'),
(81, '-147.00', 'P-170429-0082 Purchased', 'V2P8MI', '60022965547', 18, '2017-04-28 23:45:18', '2017-04-28 23:45:18'),
(82, '116.55', 'TEST-0001 Shipped', '0GVZP2', '60022965563', 18, '2017-04-28 23:47:11', '2017-04-28 23:47:11'),
(83, '-116.55', 'TEST-0001 Shipping Charges', '0GVZP2', '60022965563', 18, '2017-04-28 23:47:11', '2017-04-28 23:47:11'),
(84, '1543.50', 'P-170504-0083 Payment Received', '2510II', '60023204491', 18, '2017-05-04 10:01:40', '2017-05-04 10:01:40'),
(85, '-1543.50', 'P-170504-0083 Purchased', '2510II', '60023204491', 18, '2017-05-04 10:01:40', '2017-05-04 10:01:40');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `listing_id` int(10) UNSIGNED NOT NULL,
  `listing_user_id` int(11) NOT NULL,
  `other_user_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender` tinyint(1) NOT NULL,
  `is_new` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `listing_id`, `listing_user_id`, `other_user_id`, `user_id`, `description`, `sender`, `is_new`, `created_at`, `updated_at`) VALUES
(1, 17, 3, 0, 3, 'asfsadf', 2, 0, '2017-01-19 01:13:27', '2017-02-25 06:24:47'),
(2, 17, 3, 0, 3, 'asdfsadf', 1, 0, '2017-01-19 01:13:37', '2017-02-25 06:24:47'),
(3, 3, 3, 0, 1, 'hi\r\n', 2, 1, '2017-01-20 10:43:38', '2017-01-20 10:43:38'),
(4, 23, 3, 0, 16, 'Hi there', 2, 1, '2017-02-02 05:52:59', '2017-02-02 05:52:59'),
(5, 23, 3, 0, 16, 'Helloooo', 1, 1, '2017-02-02 05:53:22', '2017-02-02 05:53:22'),
(6, 23, 3, 0, 16, 'Ok\r\n\r\nGot it', 2, 1, '2017-02-02 05:59:26', '2017-02-02 05:59:26'),
(7, 28, 5, 0, 6, 'Hello Sir', 2, 0, '2017-02-16 01:06:49', '2017-02-27 00:01:23'),
(8, 28, 5, 0, 6, 'Hi Sir', 1, 0, '2017-02-16 01:07:16', '2017-02-27 00:01:23'),
(9, 29, 6, 3, 3, 'test', 2, 0, '2017-02-22 23:35:24', '2017-02-25 06:24:47'),
(10, 29, 6, 3, 3, 'test 2', 2, 0, '2017-02-22 23:35:35', '2017-02-25 06:24:47'),
(11, 28, 5, 3, 3, 'test ', 2, 0, '2017-02-22 23:35:50', '2017-02-25 06:24:47'),
(13, 29, 6, 3, 6, 'test 3', 1, 0, '2017-02-22 23:47:56', '2017-02-27 00:01:23'),
(14, 29, 6, 3, 6, 'test 4', 1, 0, '2017-02-22 23:48:02', '2017-02-27 00:01:23'),
(15, 29, 6, 3, 3, 'test 5', 2, 0, '2017-02-22 23:49:45', '2017-02-25 06:24:47'),
(16, 29, 6, 3, 6, 'Hi ', 1, 0, '2017-02-22 23:52:44', '2017-02-27 00:01:23'),
(17, 29, 6, 3, 3, 'Hi again', 2, 0, '2017-02-22 23:53:35', '2017-02-25 06:24:47'),
(18, 29, 6, 3, 6, 'Sorry my call', 1, 0, '2017-02-22 23:54:01', '2017-02-27 00:01:23'),
(19, 29, 6, 3, 6, 'Hi brother', 1, 0, '2017-02-22 23:57:01', '2017-02-27 00:01:23'),
(20, 29, 6, 3, 3, 'what brother?', 2, 0, '2017-02-22 23:57:32', '2017-02-25 06:24:47'),
(21, 29, 6, 3, 6, 'Hi', 2, 0, '2017-02-23 00:02:18', '2017-02-27 00:01:23'),
(22, 29, 6, 3, 3, 'Hi 2', 1, 0, '2017-02-23 00:02:41', '2017-02-25 06:24:47'),
(23, 33, 4, 3, 3, 'hello there', 2, 0, '2017-02-24 23:40:26', '2017-02-25 06:24:47'),
(24, 34, 3, 5, 5, 'interested', 2, 0, '2017-02-25 00:00:01', '2017-02-25 06:28:40'),
(25, 34, 3, 5, 3, 'reply 01', 2, 0, '2017-02-25 00:01:21', '2017-02-25 06:24:47'),
(26, 34, 3, 5, 3, 'sadfsaf', 2, 0, '2017-02-25 00:02:41', '2017-02-25 06:24:47'),
(27, 34, 3, 5, 5, 'hi\r\n', 1, 0, '2017-02-25 06:25:25', '2017-02-25 06:28:40'),
(28, 34, 3, 5, 5, 'Hi', 1, 0, '2017-02-25 06:27:42', '2017-02-25 06:28:40'),
(29, 34, 3, 5, 3, 'Hi\r\n', 2, 1, '2017-02-25 06:28:48', '2017-02-25 06:28:48'),
(30, 28, 5, 3, 5, 'Hi', 2, 1, '2017-02-25 06:29:28', '2017-02-25 06:29:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_new` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `description`, `is_new`, `created_at`, `updated_at`) VALUES
(1, 5, 'asfsadf', 0, '2017-01-19 01:13:27', '2017-02-25 00:36:36'),
(2, 5, 'asdfsadf', 0, '2017-01-19 01:13:37', '2017-02-25 00:36:36'),
(3, 1, 'hi\r\n', 1, '2017-01-20 10:43:38', '2017-01-20 10:43:38'),
(4, 16, 'Hi there', 1, '2017-02-02 05:52:59', '2017-02-02 05:52:59'),
(5, 16, 'Helloooo', 1, '2017-02-02 05:53:22', '2017-02-02 05:53:22'),
(6, 16, 'Ok\r\n\r\nGot it', 1, '2017-02-02 05:59:26', '2017-02-02 05:59:26'),
(7, 6, 'Hello Sir', 0, '2017-02-16 01:06:49', '2017-02-27 01:13:05'),
(8, 6, 'Hi Sir', 0, '2017-02-16 01:07:16', '2017-02-27 01:13:05'),
(9, 3, 'test', 0, '2017-02-22 23:35:24', '2017-02-25 06:29:32'),
(10, 3, 'test 2', 0, '2017-02-22 23:35:35', '2017-02-25 06:29:32'),
(11, 3, 'test ', 0, '2017-02-22 23:35:50', '2017-02-25 06:29:32'),
(13, 6, 'test 3', 0, '2017-02-22 23:47:56', '2017-02-27 01:13:05'),
(14, 6, 'test 4', 0, '2017-02-22 23:48:02', '2017-02-27 01:13:05'),
(15, 3, 'test 5', 0, '2017-02-22 23:49:45', '2017-02-25 06:29:32'),
(16, 6, 'Hi ', 0, '2017-02-22 23:52:44', '2017-02-27 01:13:05'),
(17, 3, 'Hi again', 0, '2017-02-22 23:53:35', '2017-02-25 06:29:32'),
(18, 6, 'Sorry my call', 0, '2017-02-22 23:54:01', '2017-02-27 01:13:05'),
(19, 6, 'Hi brother', 0, '2017-02-22 23:57:01', '2017-02-27 01:13:05'),
(20, 3, 'what brother?', 0, '2017-02-22 23:57:32', '2017-02-25 06:29:32'),
(21, 6, 'Hi', 0, '2017-02-23 00:02:18', '2017-02-27 01:13:05'),
(22, 3, 'Hi 2', 0, '2017-02-23 00:02:41', '2017-02-25 06:29:32'),
(23, 3, 'You have a new message', 0, '2017-02-25 06:27:42', '2017-02-25 06:29:32'),
(24, 5, 'You have a new message', 1, '2017-02-25 06:28:48', '2017-02-25 06:28:48'),
(25, 5, 'You have a new message', 1, '2017-02-25 06:29:28', '2017-02-25 06:29:28'),
(26, 2, 'Project # awarded to you.', 1, '2017-07-04 23:40:27', '2017-07-04 23:40:27'),
(27, 2, 'You received a new message', 1, '2017-07-04 23:41:08', '2017-07-04 23:41:08'),
(28, 3, 'You received a new message', 1, '2017-07-04 23:42:01', '2017-07-04 23:42:01'),
(29, 1, 'You received a new Bid.', 1, '2017-07-04 23:46:03', '2017-07-04 23:46:03'),
(30, 2, 'You are invited to place bid on  # .', 1, '2017-07-05 01:57:00', '2017-07-05 01:57:00'),
(31, 1, 'You are invited to place bid on  # .', 1, '2017-07-05 01:57:00', '2017-07-05 01:57:00'),
(32, 3, 'You are invited to place bid on  # .', 1, '2017-07-05 01:57:00', '2017-07-05 01:57:00'),
(33, 4, 'You are invited to place bid on  # .', 1, '2017-07-05 01:57:00', '2017-07-05 01:57:00'),
(34, 8, 'You received a new Bid.', 1, '2017-07-05 02:50:09', '2017-07-05 02:50:09'),
(35, 8, 'You received a new message', 1, '2017-07-05 02:56:26', '2017-07-05 02:56:26'),
(36, 2, 'You received a new Bid.', 1, '2017-07-05 22:23:49', '2017-07-05 22:23:49'),
(37, 2, 'You received a new Bid.', 1, '2017-07-05 22:36:49', '2017-07-05 22:36:49'),
(38, 1, 'You received a new message', 1, '2017-07-05 22:37:19', '2017-07-05 22:37:19'),
(39, 3, 'You received a new message', 1, '2017-07-06 23:03:11', '2017-07-06 23:03:11'),
(40, 1, 'You received a new Bid.', 1, '2017-07-11 01:27:11', '2017-07-11 01:27:11'),
(41, 2, 'Project # awarded to you.', 1, '2017-07-11 01:27:51', '2017-07-11 01:27:51'),
(42, 2, 'You received a new message', 1, '2017-07-11 01:28:18', '2017-07-11 01:28:18'),
(43, 1, 'You received a new message', 1, '2017-07-11 01:28:40', '2017-07-11 01:28:40'),
(44, 1, 'Project status changed. <a href="">test</a>', 1, '2017-07-11 01:33:21', '2017-07-11 01:33:21'),
(45, 2, 'Project status changed.', 1, '2017-07-11 01:33:21', '2017-07-11 01:33:21'),
(46, 1, 'You received a new Bid.', 1, '2017-07-18 00:57:31', '2017-07-18 00:57:31'),
(47, 1, 'Project status changed.', 1, '2017-07-18 23:39:45', '2017-07-18 23:39:45'),
(48, 2, 'Project status changed.', 1, '2017-07-18 23:39:45', '2017-07-18 23:39:45'),
(49, 1, 'Project status changed.', 1, '2017-07-18 23:39:56', '2017-07-18 23:39:56'),
(50, 2, 'Project status changed.', 1, '2017-07-18 23:39:56', '2017-07-18 23:39:56'),
(51, 3, 'You received a new Bid.', 1, '2017-08-17 00:25:07', '2017-08-17 00:25:07'),
(52, 1, 'Project # awarded to you.', 1, '2017-08-17 00:25:20', '2017-08-17 00:25:20');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `fee` decimal(10,0) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `title`, `type`, `fee`, `created_at`, `updated_at`) VALUES
(1, 'Paypal', 'Inward', '5', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `item_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dcity` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dcountry` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `perishable` tinyint(1) NOT NULL DEFAULT '0',
  `fragile` tinyint(1) NOT NULL DEFAULT '0',
  `package_size` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_method` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `request_type` int(1) NOT NULL DEFAULT '0' COMMENT 'public or private',
  `require_date` date DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `item_name`, `qty`, `item_description`, `category_id`, `image`, `url`, `country`, `dcity`, `dcountry`, `price`, `perishable`, `fragile`, `package_size`, `delivery_method`, `request_type`, `require_date`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Request 1', 1, 'sdfasdfasfdsdf', 1, NULL, 'sadfasdfsdf', 'Afghanistan', '', '', '111111', 1, 1, '', '', 1, '0000-00-00', 'Open', 1, '2017-05-08 00:33:45', '2017-05-08 00:33:45'),
(2, 'Request 2', 1, 'sdfasdfasfdsdf', 1, NULL, 'sadfasdfsdf', 'Afghanistan', '', '', '111111', 1, 1, '', '', 1, '0000-00-00', 'Closed', 1, '2017-05-08 00:33:57', '2017-06-01 00:11:12'),
(3, 'Request 3', 1, 'sadfsfd', 1, NULL, NULL, 'Afghanistan', '', '', '1111', 1, 1, '', '', 1, '0000-00-00', 'Closed', 1, '2017-05-08 00:44:52', '2017-06-01 00:14:44'),
(4, 'Request 4', 1, 'sadfsadf', 7, NULL, NULL, 'Australia', '', '', '22222', 1, 1, '', '', 1, '0000-00-00', 'Closed', 2, '2017-05-09 00:52:14', '2017-06-11 23:32:46'),
(5, 'Request 5', 1, 'sadfsadf', 7, NULL, NULL, 'Australia', '', '', '22222', 1, 1, '', '', 1, '0000-00-00', 'Closed', 2, '2017-05-09 00:52:44', '2017-05-09 00:52:44'),
(6, 'Request 6', 1, 'sadfsadf', 7, '2-foundation.jpg', 'sadfsadfsadf', 'Australia', '', '', '22222', 1, 1, 'Small', 'One', 1, '0000-00-00', 'Closed', 2, '2017-05-09 00:54:36', '2017-05-09 23:00:13'),
(7, 'My first product', 1, 'This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description.', 3, '3-MARIUM LOGO.jpg', NULL, 'Afghanistan', '', '', '1000', 0, 0, 'Small', 'One', 0, '0000-00-00', 'Closed', 3, '2017-05-10 07:24:04', '2017-05-10 07:24:05'),
(8, 'My Test Product', 1, 'Just some basic description', 1, '1-old-dp.jpg', 'http://amazon.com', 'Afghanistan', 'Karachi', 'Afghanistan', '100', 0, 0, 'Small', 'One', 0, '0000-00-00', 'Open', 1, '2017-05-24 01:41:20', '2017-07-17 01:03:59'),
(9, 'Test Request 11', 1, 'Something here', 1, '1-placeholder.jpg', NULL, 'Austria', 'Lahore', 'Pakistan', '100', 0, 0, 'Small', '', 0, '0000-00-00', 'Closed', 1, '2017-05-31 23:25:24', '2017-05-31 23:50:30'),
(10, 'Test REquest 21', 2, 'This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description.', 6, '1-placeholder.jpg', 'http://amazon.com/1234567890', 'Australia', 'Lahore', 'Pakistan', '100', 0, 0, 'Small', '', 0, '0000-00-00', 'Awarded', 1, '2017-06-09 23:31:29', '2017-06-16 23:32:11'),
(11, 'Test Request 31', 1, 'Something here', 3, '1-placeholder.jpg', NULL, 'Germany', 'Karachi', 'Pakistan', '250', 0, 0, 'Small', '', 0, '0000-00-00', 'Completed', 1, '2017-06-15 23:59:30', '2017-06-16 01:19:27'),
(12, 'Test 32', 1, 'description', 2, '1-placeholder.jpg', NULL, 'Saudi Arabia', 'Karachi', 'Pakistan', '100', 0, 0, 'Small', '', 0, '0000-00-00', 'Awarded', 1, '2017-06-16 23:40:12', '2017-06-16 23:41:54'),
(13, 'Item 41', 2, 'Just a test description', 1, '1-placeholder.jpg', NULL, 'Algeria', 'Karachi', 'Poland', '100', 0, 0, 'Small', '', 0, '0000-00-00', 'Pending Purchase', 1, '2017-06-30 00:43:21', '2017-06-30 00:58:38'),
(14, 'test request 42', 2, 'something is here something is here something is here something is here something is here something is here something is here something is here something is here something is here something is here something is here something is here something is here something is here something is here something is here something is here something is here something is here something is here something is here something is here something is here something is here something is here something is here something is here something is here something is here something is here something is here', 6, '3-placeholder.jpg', NULL, 'Germany', 'Karachi', 'Pakistan', '200', 0, 0, 'Large', '', 0, '0000-00-00', 'Completed', 3, '2017-07-04 23:15:19', '2017-07-04 23:23:09'),
(15, 'Test 43', 1, 'test description', 1, '3-placeholder.jpg', NULL, 'Germany', 'Karachi', 'Pakistan', '200', 0, 0, 'Medium', '', 0, '0000-00-00', 'Awarded', 3, '2017-07-04 23:39:12', '2017-07-04 23:40:27'),
(16, 'Test 45', 1, 'one', 1, '1-placeholder.jpg', NULL, 'Bangladesh', 'Lahore', 'Pakistan', '1000', 1, 0, 'Medium', '', 0, '0000-00-00', 'Open', 1, '2017-07-04 23:43:57', '2017-07-04 23:43:57'),
(17, 'temp 11', 1, 'test description', 1, '8-placeholder.jpg', NULL, 'Bangladesh', 'Lahore', 'Pakistan', '25', 0, 0, 'Medium', '', 0, '0000-00-00', 'Open', 8, '2017-07-05 02:42:49', '2017-07-05 02:42:49'),
(18, 'Test Product 51', 1, 'Description here', 1, '2-placeholder.jpg', NULL, 'Bangladesh', 'Lahore', 'Pakistan', '150', 0, 0, 'Medium', '', 0, '0000-00-00', 'Open', 2, '2017-07-05 22:19:36', '2017-07-05 22:19:36'),
(19, 'Test Project 52', 1, 'something here', 1, '1-placeholder.jpg', NULL, 'Bangladesh', 'Lahore', 'Pakistan', '100', 0, 0, 'Medium', '', 0, '0000-00-00', 'Completed', 1, '2017-07-11 01:22:20', '2017-07-18 23:39:56'),
(20, 'Test Project 54', 1, 'just some description', 9, '2-placeholder.jpg', NULL, 'Bangladesh', 'Lahore', 'Pakistan', '50', 0, 0, 'Small', '', 0, '0000-00-00', 'Open', 2, '2017-07-14 00:10:52', '2017-07-14 00:10:52'),
(21, 'test user 11', 1, 'aaaa', 10, '1-placeholder.jpg', NULL, 'Algeria', 'aa', 'Pakistan', '1', 0, 0, 'Large', '', 0, '0000-00-00', 'Open', 1, '2017-07-16 23:50:33', '2017-07-16 23:50:33'),
(22, 'test user 11', 1, 'aaaa', 1, '1-Nippon-Paint-Vinyl-Silk-Luxury-Wall-Finish.jpg', NULL, 'Afghanistan', 'aa', 'Afghanistan', '1', 0, 0, 'Large', '', 0, '0000-00-00', 'Open', 1, '2017-07-17 00:13:53', '2017-07-17 00:13:53'),
(23, 'test user 11', 1, 'aaaa', 1, NULL, NULL, 'Afghanistan', 'aa', 'Afghanistan', '1', 0, 0, 'Large', '', 0, '0000-00-00', 'Open', 2, '2017-07-17 00:14:45', '2017-07-17 00:14:45'),
(24, 'test user 11', 1, 'aaaa', 1, '1-Nippon-Paint-Vinyl-Silk-Luxury-Wall-Finish.jpg', NULL, 'Afghanistan', 'aa', 'Afghanistan', '1', 0, 0, 'Large', '', 0, '0000-00-00', 'Open', 2, '2017-07-17 02:43:19', '2017-07-17 02:43:19'),
(25, 'test 53', 1, 'sdfasd', 1, '1-placeholder.jpg', NULL, 'Afghanistan', 'Lahore', 'Afghanistan', '123', 0, 0, 'Medium', '', 0, NULL, 'Open', 1, '2017-07-30 23:03:03', '2017-07-30 23:06:24'),
(26, 'My test 1', 1, 'Just testing something', 2, '3-placeholder.jpg', NULL, 'Albania', 'Lahore', 'Pakistan', '100', 0, 0, 'Medium', '', 0, NULL, 'Awarded', 3, '2017-08-17 00:24:42', '2017-08-17 00:25:20');

-- --------------------------------------------------------

--
-- Table structure for table `product_statuses`
--

CREATE TABLE `product_statuses` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `status_date` datetime NOT NULL,
  `comments` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_statuses`
--

INSERT INTO `product_statuses` (`id`, `product_id`, `status`, `status_date`, `comments`, `created_at`, `updated_at`) VALUES
(1, 11, 'Awarded', '2017-06-16 05:13:57', '', '2017-06-16 00:13:57', '2017-06-16 00:13:57'),
(2, 11, 'Pending Purchase', '2017-06-16 06:13:58', '', '2017-06-16 01:13:58', '2017-06-16 01:13:58'),
(3, 11, 'Pending Delivery', '2017-06-16 06:14:19', '', '2017-06-16 01:14:19', '2017-06-16 01:14:19'),
(4, 11, 'Pending Acknowledgment', '2017-06-16 06:15:23', '', '2017-06-16 01:15:23', '2017-06-16 01:15:23'),
(5, 11, 'Completed', '2017-06-16 06:19:27', '', '2017-06-16 01:19:27', '2017-06-16 01:19:27'),
(6, 10, 'Awarded', '2017-06-17 04:32:12', '', '2017-06-16 23:32:12', '2017-06-16 23:32:12'),
(7, 12, 'Awarded', '2017-06-17 04:41:54', '', '2017-06-16 23:41:54', '2017-06-16 23:41:54'),
(8, 13, 'Awarded', '2017-06-30 05:58:30', '', '2017-06-30 00:58:30', '2017-06-30 00:58:30'),
(9, 13, 'Pending Purchase', '2017-06-30 05:58:38', '', '2017-06-30 00:58:38', '2017-06-30 00:58:38'),
(10, 14, 'Awarded', '2017-07-05 04:20:37', '', '2017-07-04 23:20:37', '2017-07-04 23:20:37'),
(11, 14, 'Pending Purchase', '2017-07-05 04:22:05', '', '2017-07-04 23:22:05', '2017-07-04 23:22:05'),
(12, 14, 'Pending Delivery', '2017-07-05 04:22:31', '', '2017-07-04 23:22:31', '2017-07-04 23:22:31'),
(13, 14, 'Pending Acknowledgment', '2017-07-05 04:22:50', '', '2017-07-04 23:22:50', '2017-07-04 23:22:50'),
(14, 14, 'Completed', '2017-07-05 04:23:09', '', '2017-07-04 23:23:09', '2017-07-04 23:23:09'),
(15, 15, 'Awarded', '2017-07-05 04:40:27', '', '2017-07-04 23:40:27', '2017-07-04 23:40:27'),
(16, 19, 'Awarded', '2017-07-11 06:27:51', '', '2017-07-11 01:27:51', '2017-07-11 01:27:51'),
(17, 19, 'Pending Purchase', '2017-07-11 06:29:11', '', '2017-07-11 01:29:11', '2017-07-11 01:29:11'),
(18, 19, 'Pending Delivery', '2017-07-11 06:33:21', '', '2017-07-11 01:33:21', '2017-07-11 01:33:21'),
(19, 19, 'Pending Acknowledgment', '2017-07-19 04:39:45', '', '2017-07-18 23:39:45', '2017-07-18 23:39:45'),
(20, 19, 'Completed', '2017-07-19 04:39:56', '', '2017-07-18 23:39:56', '2017-07-18 23:39:56'),
(21, 26, 'Awarded', '2017-08-17 05:25:20', '', '2017-08-17 00:25:20', '2017-08-17 00:25:20');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `bid_id` int(11) NOT NULL,
  `rating_by` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating_as` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `product_id`, `bid_id`, `rating_by`, `user_id`, `rating_as`, `rating`, `review`, `created_at`, `updated_at`) VALUES
(3, 9, 12, 1, 2, 'Seller', 5, 'for seller', '2017-06-11 23:26:56', '2017-06-11 23:26:56'),
(4, 9, 12, 2, 1, 'Buyer', 4, 'for buyer', '2017-06-11 23:27:36', '2017-06-11 23:27:36'),
(5, 4, 15, 1, 2, 'Buyer', 4, 'for buyer rating', '2017-06-11 23:33:45', '2017-06-11 23:33:45'),
(6, 4, 15, 2, 1, 'Seller', 2, 'for seller rating', '2017-06-11 23:34:03', '2017-06-11 23:34:03'),
(7, 8, 12, 1, 2, 'Seller', 4, 'For Seller TEST', NULL, NULL),
(8, 11, 16, 2, 1, 'Buyer', 5, 'great experience', '2017-06-16 01:26:19', '2017-06-16 01:26:19'),
(9, 11, 16, 1, 2, 'Seller', 5, 'Great experience', '2017-06-16 01:26:32', '2017-06-16 01:26:32'),
(10, 19, 26, 2, 1, 'Buyer', 4, 'test 4 for buyer', '2017-07-18 23:50:55', '2017-07-18 23:50:55'),
(11, 19, 26, 1, 2, 'Seller', 5, 'test 5 for seller', '2017-07-18 23:51:13', '2017-07-18 23:51:13');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `bid_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comments` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `country` varchar(40) NOT NULL,
  `from_date` date NOT NULL,
  `country_to` varchar(40) NOT NULL,
  `upto_date` date NOT NULL,
  `trip_type` varchar(10) NOT NULL,
  `return_date` date DEFAULT NULL,
  `notes` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `user_id`, `country`, `from_date`, `country_to`, `upto_date`, `trip_type`, `return_date`, `notes`, `created_at`, `updated_at`) VALUES
(1, 2, 'Pakistan', '2017-06-01', 'Australia', '2017-06-30', 'Return', '0000-00-00', 'In Sydney', '2017-05-09 00:19:14', '2017-05-09 00:19:14'),
(2, 2, 'Pakistan', '2017-06-01', 'Canada', '2017-06-30', '', '0000-00-00', 'none', '2017-05-09 01:07:25', '2017-05-09 23:07:39'),
(3, 2, 'Pakistan', '2017-06-01', 'Canada', '2017-06-30', 'Return', '0000-00-00', 'asdf', '2017-05-09 01:08:50', '2017-05-09 01:08:50'),
(4, 2, 'Pakistan', '2017-06-01', 'Australia', '2017-07-30', 'Return', '0000-00-00', 'In Sydney', '2017-05-09 23:05:09', '2017-05-09 23:07:24'),
(5, 3, 'Pakistan', '2017-06-01', 'Canada', '2017-06-30', 'Return', '0000-00-00', 'Personal Visit', '2017-05-10 07:24:43', '2017-05-10 07:24:43'),
(6, 1, 'Pakistan', '2017-07-01', 'United Arab Emirates', '2017-07-30', 'Return', '0000-00-00', 'This is a test trip.', '2017-06-09 23:32:19', '2017-06-09 23:32:19'),
(7, 2, 'Pakistan', '2017-07-01', 'Bangladesh', '2017-07-30', 'Return', '0000-00-00', 'test description', '2017-07-05 01:47:04', '2017-07-05 01:47:04'),
(8, 1, 'Pakistan', '2017-07-01', 'Afghanistan', '2017-07-30', 'Return', NULL, NULL, '2017-07-11 01:10:37', '2017-07-11 01:42:07'),
(9, 1, 'Albania', '2017-08-01', 'Saudi Arabia', '2017-08-23', 'Return', '2017-08-30', 'asfdasdfasdf', '2017-08-18 00:53:41', '2017-08-18 00:53:41'),
(10, 1, 'Albania', '2017-08-01', 'Saudi Arabia', '2017-08-23', 'Return', '2017-08-30', 'asfdasdfasdf', '2017-08-18 00:59:42', '2017-08-18 00:59:42'),
(11, 1, 'Albania', '2017-08-01', 'Saudi Arabia', '2017-08-23', 'Return', '2017-08-30', 'asfdasdfasdf', '2017-08-18 00:59:51', '2017-08-18 00:59:51'),
(12, 1, 'Albania', '2017-08-01', 'Saudi Arabia', '2017-08-23', 'Return', '2017-08-30', 'asfdasdfasdf', '2017-08-18 01:02:21', '2017-08-18 01:02:21'),
(13, 1, 'Albania', '2017-08-01', 'Saudi Arabia', '2017-08-23', 'Return', '2017-08-30', 'asfdasdfasdf', '2017-08-18 01:02:33', '2017-08-18 01:02:33'),
(14, 1, 'Luxembourg', '2017-08-18', 'United Arab Emirates', '2017-08-31', 'Return', NULL, 'aaaa', '2017-08-18 01:05:52', '2017-08-18 01:05:52'),
(15, 1, 'Luxembourg', '2017-08-18', 'United Arab Emirates', '2017-08-31', 'Return', NULL, 'aaaa', '2017-08-18 01:06:49', '2017-08-18 01:06:49'),
(16, 1, 'Luxembourg', '2017-08-18', 'United Arab Emirates', '2017-08-31', 'Return', NULL, 'aaaa', '2017-08-18 01:07:33', '2017-08-18 01:07:33'),
(17, 1, 'Luxembourg', '2017-08-18', 'United Arab Emirates', '2017-08-31', 'Return', NULL, 'aaaa', '2017-08-18 01:08:12', '2017-08-18 01:08:12'),
(18, 1, 'Luxembourg', '2017-08-18', 'United Arab Emirates', '2017-08-31', 'Return', NULL, 'aaaa', '2017-08-18 01:09:42', '2017-08-18 01:09:42'),
(19, 1, 'Luxembourg', '2017-08-18', 'United Arab Emirates', '2017-08-31', 'Return', NULL, 'aaaa', '2017-08-18 01:09:51', '2017-08-18 01:09:51'),
(20, 1, 'Luxembourg', '2017-08-18', 'United Arab Emirates', '2017-08-31', 'Return', NULL, 'aaaa', '2017-08-18 01:11:53', '2017-08-18 01:11:53'),
(21, 1, 'Pakistan', '2017-08-19', 'United States', '2017-09-22', 'Return', '2017-08-26', 'test entry', '2017-08-18 02:35:11', '2017-08-18 02:35:11');

-- --------------------------------------------------------

--
-- Table structure for table `trip_places`
--

CREATE TABLE `trip_places` (
  `id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `city` varchar(40) NOT NULL,
  `country` varchar(40) NOT NULL,
  `from_date` date NOT NULL,
  `upto_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_places`
--

INSERT INTO `trip_places` (`id`, `trip_id`, `city`, `country`, `from_date`, `upto_date`, `created_at`, `updated_at`) VALUES
(1, 20, 'aaaaa', 'Bangladesh', '2017-08-23', '2017-08-26', '2017-08-18 01:11:53', '2017-08-18 01:11:53'),
(2, 21, 'AA', 'Bangladesh', '2017-08-22', '2017-08-30', '2017-08-18 02:35:11', '2017-08-18 02:35:11'),
(3, 21, 'BB', 'Germany', '2017-09-06', '2017-09-15', '2017-08-18 02:35:11', '2017-08-18 02:35:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `about` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `about`, `phone`, `status`, `remember_token`, `provider`, `provider_id`, `created_at`, `updated_at`) VALUES
(1, 'Ayaz Ahmed', 'test01@yahoo.com', '$2y$10$RSnm8sRMhNlv3TmQ5CQb/OGC9bPasJVGYgyDz5/Gb1KBD/YJIQTNu', '1-profile-image.jpg', 'This is a test project.', '+923008210313', 0, 'VCWHkZaDI0WtLAgJmHur21Q1EmjK0VPim2NFiuWZSOJQlop1GHg8tFeuzDTe', '', '', '2017-05-04 23:43:34', '2017-07-14 00:52:39'),
(2, 'Nameer', 'test02@yahoo.com', '$2y$10$RSnm8sRMhNlv3TmQ5CQb/OGC9bPasJVGYgyDz5/Gb1KBD/YJIQTNu', '', '', '', 0, 'Q0WflAKNKBVxcSIad591aAo0mRtsnSt3uXeWQmgVBsOSf5WbARGv7fgXMKE1', '', '', '2017-05-05 09:45:18', '2017-06-02 00:31:58'),
(3, 'Ayaz Ahmed', 'test03@yahoo.com', '$2y$10$xhZ24sz2TWwSO832lbN1t.jRf9d4eQRj8J0gigYvpDENKu6ecB3Fy', '3-bringfare-1.jpg', 'test here', '+923008210313', 0, 'Jqn2d6qhzfSIvYOPagHh0d0vsrU3iVxwNIszVXRstRRGgrkhL0S89LdzxCK0', '', '', '2017-05-10 07:22:28', '2017-08-16 23:52:12'),
(4, 'Mian Sb', 'test04@yahoo.com', '$2y$10$sJdkmSHLCx2OTn95NJ9EX.9dnkzhgVHiqyi9fGrZXw4nktLJis1jC', '', 'safsadfsadfsdf', '00923008210313', 0, 'y43wEKJtg1zIHMY463ksP6UrbbnUxdKwot4UbfEfPPxbqE9iAfkr1vFX8R8J', '', '', '2017-06-15 23:41:10', '2017-06-15 23:47:14'),
(5, 'Test 5', 'test05@yahoo.com', '$2y$10$591kSHvB/.zamUqMLCtyvOCY2YmljgNb04xqvF9B6G.k1rRIBpWVe', '', '', '', 0, 'CGvtblELJMc1JVjh36tCn2T64jxa8XBa6rAoZkccwrdEWj0knGYllmHqjtzh', '', '', '2017-06-30 00:05:40', '2017-06-30 00:05:40'),
(6, 'Test 11', 'test11@yahoo.com', '$2y$10$GfURtvgwRjW/Zwp5B.R.V.4WlzJ7Iifut.9uIp1qgx/4/E0.gLO6a', '', '', '', 0, 'Ff7sANNf261mycE0Oy92FrlPYWOUlYUKQ1pbbm4fOFxMQRWKNLOSfcrgI4z6', '', '', '2017-07-05 02:13:10', '2017-07-05 02:13:10'),
(7, 'Test 12', 'test12@yahoo.com', '$2y$10$N.vLgFsOeV6Py3hJ..6kO.FPMLDmwqbi1oZP7/BCqrtlrSwJB/5um', '', '', '', 0, 'G2E6QGUKJVz60qxfoAqpMrYYU3ZViwemStQDY2RUKFVicZPU0IU1ap6OTz9W', '', '', '2017-07-05 02:13:44', '2017-07-05 02:13:44'),
(8, 'Test 13', 'test13@yahoo.com', '$2y$10$9PDRzAGj2WlDJhA2.J9aW.3.w7CTtIEy34Jc1xuMC2oHmKqfpSryK', '8-placeholder-profile.jpg', 'something here', '+923008210313', 0, NULL, '', '', '2017-07-05 02:14:13', '2017-07-05 02:28:35'),
(9, 'Nameer Ahemd', 'test06@yahoo.com', '$2y$10$d4tUSrSE915jfCvpMDgFEu3EKfbunzjMh.VUI5EBY4xsxrM5Ltjmm', '', '', '', 0, '1UAz7935VhF4BdZevkW0nVub7xen3xGaikIpjrWhwFAsrc4FC8dJCHBbIJ11', '', '', '2017-08-21 00:49:38', '2017-08-21 00:49:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `request_id` (`product_id`,`user_id`) USING BTREE;

--
-- Indexes for table `bid_comments`
--
ALTER TABLE `bid_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bid_statuses`
--
ALTER TABLE `bid_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followings`
--
ALTER TABLE `followings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`follow_by`);

--
-- Indexes for table `invitations`
--
ALTER TABLE `invitations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ledgers`
--
ALTER TABLE `ledgers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_statuses`
--
ALTER TABLE `product_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`product_id`,`bid_id`,`user_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_places`
--
ALTER TABLE `trip_places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `bid_comments`
--
ALTER TABLE `bid_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `bid_statuses`
--
ALTER TABLE `bid_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `followings`
--
ALTER TABLE `followings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `invitations`
--
ALTER TABLE `invitations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ledgers`
--
ALTER TABLE `ledgers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `product_statuses`
--
ALTER TABLE `product_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `trip_places`
--
ALTER TABLE `trip_places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
