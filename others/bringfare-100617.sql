-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2017 at 06:57 AM
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
(1, 'Ayaz', 'test11@yahoo.com', '$2y$10$RSnm8sRMhNlv3TmQ5CQb/OGC9bPasJVGYgyDz5/Gb1KBD/YJIQTNu', 'Admin', 'whVe5NsnP40OyLZ5Je0SoLckFCtzfNkLK2p9iR0g7hh4RMKB4jm3ZS1IgT5U', '2017-05-04 23:43:34', '2017-05-04 23:43:34'),
(2, 'Nameer', 'test12@yahoo.com', '$2y$10$aPypyq8W2zAjvc71fYz5q.JHWWEhtM0WPv6ERLSE3CuzWwLtKkkNO', 'Manager', 'HDBNVpls35v966u4vLj0uHuGWPCMMD3QZVW1b7fRAFiebd68dD9rMZhMLxTh', '2017-05-05 09:45:18', '2017-06-02 00:31:58'),
(3, 'Ayaz Ahmed', 'test03@yahoo.com', '$2y$10$X7yBO2OvHUiDMNFED832yOkw8fT67Sp/kJzSYhyWcXAeBQ0VLH7B2', '', NULL, '2017-05-10 07:22:28', '2017-05-10 07:22:28');

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
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `product_id`, `user_id`, `amount`, `comments`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, 1, '100.00', 'this is my message', 'Applied', '2017-05-23 23:53:23', '2017-05-23 23:53:23'),
(3, 7, 2, '111.00', 'sdfasdfsadfsadf', 'Applied', '2017-05-24 00:10:08', '2017-05-24 00:10:08'),
(4, 5, 1, '111.00', 'asdfasfdasdfasdf', 'Applied', '2017-05-24 00:13:57', '2017-05-24 00:13:57'),
(5, 1, 1, '100.00', 'I can get you this', 'Applied', '2017-05-24 01:16:20', '2017-05-24 01:16:20'),
(6, 8, 2, '115.00', 'Can I post here?', 'Applied', '2017-05-24 01:42:03', '2017-05-24 01:42:03'),
(7, 2, 2, '116.00', 'for #2', 'Selected', '2017-05-24 03:21:33', '2017-06-01 00:09:42'),
(8, 3, 2, '123.00', 'For #3', 'Delivered', '2017-05-24 03:21:49', '2017-06-01 00:45:15'),
(9, 4, 1, '11.00', 'For #4', 'Applied', '2017-05-24 03:23:08', '2017-05-24 03:23:08'),
(10, 1, 2, '1.00', 'sadfasdfsadf', 'Applied', '2017-05-24 03:30:34', '2017-05-24 03:30:34'),
(11, 8, 3, '116.00', 'Test Message to offer', 'Selected', '2017-05-24 22:12:27', '2017-05-30 00:12:07'),
(12, 9, 2, '110.00', 'I can get it for you.', 'Selected', '2017-05-31 23:32:07', '2017-05-31 23:50:30'),
(13, 9, 3, '120.00', 'Testing', 'Applied', '2017-05-31 23:41:26', '2017-05-31 23:41:26'),
(14, 10, 3, '120.00', 'Hi, I can help in getting this.', 'Applied', '2017-06-09 23:36:27', '2017-06-09 23:36:27');

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
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bid_comments`
--

INSERT INTO `bid_comments` (`id`, `bid_id`, `user_id`, `comment_by`, `comments`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 'Buyer', 'Details', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 6, 2, 'Seller', 'More Details', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 6, 2, 'Seller', 'Hi again', '2017-05-24 12:25:39', '2017-05-24 12:25:39'),
(4, 11, 0, '', 'Hi there by ayaz ahmed', '2017-05-25 03:25:46', '2017-05-25 03:25:46'),
(5, 11, 0, '', 'Hi there by ayaz', '2017-05-25 03:26:46', '2017-05-25 03:26:46'),
(6, 6, 1, 'Buyer', 'comment by buyer', '2017-05-25 03:45:03', '2017-05-25 03:45:03'),
(7, 6, 2, 'Seller', 'comment by seller', '2017-05-25 03:45:31', '2017-05-25 03:45:31'),
(8, 6, 1, 'Buyer', 'another comment by buyer', '2017-05-25 03:47:52', '2017-05-25 03:47:52'),
(9, 12, 1, 'Buyer', 'Hi there', '2017-06-01 04:33:59', '2017-06-01 04:33:59'),
(10, 14, 1, 'Buyer', 'Thanks for you update. When you go there?', '2017-06-10 04:36:57', '2017-06-10 04:36:57'),
(11, 14, 3, 'Seller', 'I will go there next month.', '2017-06-10 04:37:18', '2017-06-10 04:37:18'),
(12, 14, 1, 'Buyer', 'Ok, I am selecting you.', '2017-06-10 04:37:30', '2017-06-10 04:37:30'),
(13, 14, 3, 'Seller', 'Thanks for selecting me.', '2017-06-10 04:37:45', '2017-06-10 04:37:45');

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

--
-- Dumping data for table `bid_statuses`
--

INSERT INTO `bid_statuses` (`id`, `bid_id`, `status`, `status_date`, `comments`, `created_at`, `updated_at`) VALUES
(1, 7, 'Selected', '2017-06-01 00:00:00', '', '2017-06-01 05:12:38', '2017-06-01 05:12:38'),
(2, 8, 'Selected', '2017-06-01 05:14:45', '', '2017-06-01 05:14:45', '2017-06-01 05:14:45'),
(3, 8, 'Funded', '2017-06-01 05:44:53', '', '2017-06-01 05:44:53', '2017-06-01 05:44:53'),
(4, 8, 'Purchased', '2017-06-01 05:45:10', '', '2017-06-01 05:45:10', '2017-06-01 05:45:10'),
(5, 8, 'Delivered', '2017-06-01 05:45:15', '', '2017-06-01 05:45:15', '2017-06-01 05:45:15');

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
-- Table structure for table `invitations`
--

CREATE TABLE `invitations` (
  `id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(25, 5, 'You have a new message', 1, '2017-02-25 06:29:28', '2017-02-25 06:29:28');

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
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `item_name`, `qty`, `item_description`, `category_id`, `image`, `url`, `country`, `dcity`, `dcountry`, `price`, `perishable`, `fragile`, `package_size`, `delivery_method`, `request_type`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Request 1', 1, 'sdfasdfasfdsdf', 1, NULL, 'sadfasdfsdf', 'Afghanistan', '', '', '111111', 1, 1, '', '', 1, 'Open', 1, '2017-05-08 00:33:45', '2017-05-08 00:33:45'),
(2, 'Request 2', 1, 'sdfasdfasfdsdf', 1, NULL, 'sadfasdfsdf', 'Afghanistan', '', '', '111111', 1, 1, '', '', 1, 'Closed', 1, '2017-05-08 00:33:57', '2017-06-01 00:11:12'),
(3, 'Request 3', 1, 'sadfsfd', 1, NULL, NULL, 'Afghanistan', '', '', '1111', 1, 1, '', '', 1, 'Closed', 1, '2017-05-08 00:44:52', '2017-06-01 00:14:44'),
(4, 'Request 4', 1, 'sadfsadf', 7, NULL, NULL, 'Australia', '', '', '22222', 1, 1, '', '', 1, '0', 2, '2017-05-09 00:52:14', '2017-05-09 00:52:14'),
(5, 'Request 5', 1, 'sadfsadf', 7, NULL, NULL, 'Australia', '', '', '22222', 1, 1, '', '', 1, '0', 2, '2017-05-09 00:52:44', '2017-05-09 00:52:44'),
(6, 'Request 6', 1, 'sadfsadf', 7, '2-foundation.jpg', 'sadfsadfsadf', 'Australia', '', '', '22222', 1, 1, 'Small', 'One', 1, '0', 2, '2017-05-09 00:54:36', '2017-05-09 23:00:13'),
(7, 'My first product', 1, 'This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description.', 3, '3-MARIUM LOGO.jpg', NULL, 'Afghanistan', '', '', '1000', 0, 0, 'Small', 'One', 0, '0', 3, '2017-05-10 07:24:04', '2017-05-10 07:24:05'),
(8, 'My Test Product', 1, 'Just some basic description', 1, '1-old-dp.jpg', 'http://amazon.com', 'Australia', 'Karachi', 'Pakistan', '100', 0, 0, 'Small', 'One', 0, 'Closed', 1, '2017-05-24 01:41:20', '2017-05-30 00:12:06'),
(9, 'Test Request 11', 1, 'Something here', 1, '1-placeholder.jpg', NULL, 'Austria', 'Lahore', 'Pakistan', '100', 0, 0, 'Small', '', 0, 'Closed', 1, '2017-05-31 23:25:24', '2017-05-31 23:50:30'),
(10, 'Test REquest 21', 2, 'This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description.', 6, '1-placeholder.jpg', 'http://amazon.com/1234567890', 'Australia', 'Lahore', 'Pakistan', '100', 0, 0, 'Small', '', 0, 'Open', 1, '2017-06-09 23:31:29', '2017-06-09 23:31:29');

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
  `rating` int(11) NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_statuses`
--

CREATE TABLE `request_statuses` (
  `id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `country` varchar(40) NOT NULL,
  `from_date` date NOT NULL,
  `upto_date` date NOT NULL,
  `notes` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `user_id`, `country`, `from_date`, `upto_date`, `notes`, `created_at`, `updated_at`) VALUES
(1, 2, 'Australia', '2017-06-01', '2017-06-30', 'In Sydney', '2017-05-09 00:19:14', '2017-05-09 00:19:14'),
(2, 2, 'Canada', '2017-06-01', '2017-06-30', 'none', '2017-05-09 01:07:25', '2017-05-09 23:07:39'),
(3, 2, 'Canada', '2017-06-01', '2017-06-30', 'asdf', '2017-05-09 01:08:50', '2017-05-09 01:08:50'),
(4, 2, 'Australia', '2017-06-01', '2017-07-30', 'In Sydney', '2017-05-09 23:05:09', '2017-05-09 23:07:24'),
(5, 3, 'Bahrain', '2017-06-01', '2017-06-30', 'Personal Visit', '2017-05-10 07:24:43', '2017-05-10 07:24:43'),
(6, 1, 'United Arab Emirates', '2017-07-01', '2017-07-30', 'This is a test trip.', '2017-06-09 23:32:19', '2017-06-09 23:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `about`, `phone`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ayaz', 'test01@yahoo.com', '$2y$10$RSnm8sRMhNlv3TmQ5CQb/OGC9bPasJVGYgyDz5/Gb1KBD/YJIQTNu', '', 'This is a test project.', '+923008210313', 0, 'e9fgboJzHFN5IPkOvaEmWOhnFMLJBActaElDGNKZqMaa7LRUI0GUvcrXIxst', '2017-05-04 23:43:34', '2017-06-09 23:29:47'),
(2, 'Nameer', 'test02@yahoo.com', '$2y$10$aPypyq8W2zAjvc71fYz5q.JHWWEhtM0WPv6ERLSE3CuzWwLtKkkNO', '', '', '', 0, 'LcIak4Pwx2GjpBntNNwHjrcxhoDXb0yIh7Ms6wMgemCLkLMyBfdwVQmAKHDV', '2017-05-05 09:45:18', '2017-06-02 00:31:58'),
(3, 'Ayaz Ahmed', 'test03@yahoo.com', '$2y$10$X7yBO2OvHUiDMNFED832yOkw8fT67Sp/kJzSYhyWcXAeBQ0VLH7B2', '', '', '', 0, 'ceNrsZxn9psvCMlhHdpKZcJqd9AcOvmWShnsNDG63jHRCQFDmji4VFvPEuPt', '2017-05-10 07:22:28', '2017-05-10 07:22:28');

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
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`product_id`,`bid_id`,`user_id`);

--
-- Indexes for table `request_statuses`
--
ALTER TABLE `request_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `bid_comments`
--
ALTER TABLE `bid_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `bid_statuses`
--
ALTER TABLE `bid_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `invitations`
--
ALTER TABLE `invitations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `request_statuses`
--
ALTER TABLE `request_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
