-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2017 at 12:41 PM
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
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `posted_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `price` decimal(10,0) NOT NULL,
  `perishable` tinyint(1) NOT NULL DEFAULT '0',
  `fragile` tinyint(1) NOT NULL DEFAULT '0',
  `package_size` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_method` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_type` int(1) NOT NULL DEFAULT '0' COMMENT 'public or private',
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `item_name`, `qty`, `item_description`, `category_id`, `image`, `url`, `country`, `price`, `perishable`, `fragile`, `package_size`, `delivery_method`, `request_type`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'sfdsadfsf', 1, 'sdfasdfasfdsdf', 1, NULL, 'sadfasdfsdf', 'Afghanistan', '111111', 1, 1, '', '', 1, 1, 1, '2017-05-08 00:33:45', '2017-05-08 00:33:45'),
(2, 'sfdsadfsf', 1, 'sdfasdfasfdsdf', 1, NULL, 'sadfasdfsdf', 'Afghanistan', '111111', 1, 1, '', '', 1, 1, 1, '2017-05-08 00:33:57', '2017-05-08 00:33:57'),
(3, 'aa', 1, 'sadfsfd', 1, NULL, NULL, 'Afghanistan', '1111', 1, 1, '', '', 1, 1, 1, '2017-05-08 00:44:52', '2017-05-08 00:44:52'),
(4, 'aaaa', 1, 'sadfsadf', 7, NULL, NULL, 'Australia', '22222', 1, 1, '', '', 1, 1, 2, '2017-05-09 00:52:14', '2017-05-09 00:52:14'),
(5, 'aaaa', 1, 'sadfsadf', 7, NULL, NULL, 'Australia', '22222', 1, 1, '', '', 1, 1, 2, '2017-05-09 00:52:44', '2017-05-09 00:52:44'),
(6, 'aaaa', 1, 'sadfsadf', 7, '2-foundation.jpg', 'sadfsadfsadf', 'Australia', '22222', 1, 1, 'Small', 'One', 1, 0, 2, '2017-05-09 00:54:36', '2017-05-09 23:00:13'),
(7, 'My first product', 1, 'This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description. This is a test description.', 3, '3-MARIUM LOGO.jpg', NULL, 'Afghanistan', '1000', 0, 0, 'Small', 'One', 0, 0, 3, '2017-05-10 07:24:04', '2017-05-10 07:24:05');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `rating_for` int(11) NOT NULL,
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
(5, 3, 'Bahrain', '2017-06-01', '2017-06-30', 'Personal Visit', '2017-05-10 07:24:43', '2017-05-10 07:24:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ayaz', 'test01@yahoo.com', '$2y$10$RSnm8sRMhNlv3TmQ5CQb/OGC9bPasJVGYgyDz5/Gb1KBD/YJIQTNu', '23BZVw7X46FgRxxiQaUli7wphH2MYSClmjDMXdBnQgaM12W1rStP9dwIQILq', '2017-05-04 23:43:34', '2017-05-04 23:43:34'),
(2, 'Nameer', 'test02@yahoo.com', '$2y$10$EBlqHvz5vkKHEZvqCj3PLOhNU98Jz.LlrCmDiDWJGpiPmAQoc29Ri', '5FJMPQpnksF29hdz3BT2q2FNLI4eszipgCAOcSv8qGDdcJPPuMCR9GwTZTka', '2017-05-05 09:45:18', '2017-05-05 09:45:18'),
(3, 'Ayaz Ahmed', 'test03@yahoo.com', '$2y$10$X7yBO2OvHUiDMNFED832yOkw8fT67Sp/kJzSYhyWcXAeBQ0VLH7B2', NULL, '2017-05-10 07:22:28', '2017-05-10 07:22:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
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
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
