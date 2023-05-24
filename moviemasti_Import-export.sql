-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 24, 2023 at 01:13 AM
-- Server version: 5.7.42-log
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moviemasti_Import-export`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `id` int(11) NOT NULL,
  `staffid` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `status` int(11) DEFAULT '0',
  `transection` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`id`, `staffid`, `name`, `email`, `number`, `status`, `transection`, `created_at`, `updated_at`) VALUES
(1, '', 'khan', 'khan@gmail.com', '23456789902', 0, 4534, '2023-03-27 08:48:29', '2023-04-06 10:28:44'),
(4, '', 'Uday Jhaveri', 'uday.usoft@gmail.com', '9821176868', 0, 1, '2023-04-08 12:19:03', '2023-04-08 12:19:03'),
(5, '', 'subham pandey', 'support@u-soft.biz', '9898989898', 0, 2, '2023-04-08 12:20:40', '2023-04-08 12:20:40'),
(6, '', 'women', 'rohit@gmail.com', '1232344343', 0, NULL, '2023-04-10 16:05:14', '2023-04-10 16:05:14'),
(7, 'STAFF0001', 'jacket down', 'superadmin@instachamp.com', '23456789', 0, NULL, '2023-04-10 16:31:48', '2023-04-10 16:31:48'),
(8, 'STAFF0009', 'priya', 'priya@mail.com', '13454453', 0, NULL, '2023-04-12 13:51:19', '2023-04-12 13:51:19'),
(9, 'STAFF0009', 'greh', 'gtrd@yh.com', '78945613', 0, NULL, '2023-04-21 11:09:09', '2023-04-21 11:09:09'),
(10, NULL, 'admin', 'admin@gmail.com', '1234567898', 0, NULL, '2023-04-21 14:26:38', '2023-04-21 14:26:38');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Feedback`
--

CREATE TABLE `Feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Feedback`
--

INSERT INTO `Feedback` (`id`, `user_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 3, 'good', '2023-04-19 11:39:14', '2023-04-19 11:39:14'),
(3, 3, 'good', '2023-04-19 13:47:42', '2023-04-19 13:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `login..`
--

CREATE TABLE `login..` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login..`
--

INSERT INTO `login..` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Sales', 'Sales@gmail.com', '$2y$10$Kmj7QA7j81Cf0OrBvXzZpeb63ehOg8uvE6RkgIhLsUcWNt3PpQIWy', '2023-04-05 07:17:35', '2023-04-05 07:17:35');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_03_25_064732_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Notification`
--

CREATE TABLE `Notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Notification`
--

INSERT INTO `Notification` (`id`, `user_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 'your order succsessfully', '2023-04-20 05:00:00', '2023-04-20 10:33:10'),
(2, 1, 'Tag Maker', '2023-04-20 05:00:00', '2023-04-20 13:09:10'),
(3, 1, 'delivered', '2023-04-20 05:00:00', '2023-04-20 13:17:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `staffid` varchar(255) DEFAULT NULL,
  `details` varchar(255) NOT NULL,
  `p_status` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `staffid`, `details`, `p_status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'type any details here', 1, '2023-04-07 15:22:22', '2023-04-07 15:22:22'),
(2, 'STAFF0001', 'type here', NULL, '2023-04-12 13:41:39', '2023-04-12 13:41:39');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `staffid` varchar(255) DEFAULT NULL,
  `seller_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `staffid`, `seller_id`, `name`, `quantity`, `weight`, `rate`, `date`, `image`, `created_at`, `updated_at`) VALUES
(14, NULL, '6', 'qrcode', '2', '67', '67$', '2023-04-20', '[\"(2).jpg\"]', '2023-04-20 17:54:08', '2023-04-20 17:54:08'),
(17, NULL, '7', 'vishu..', '2', '5kg', '34', '2023-04-23', '', '2023-04-23 10:39:37', '2023-04-23 10:39:37');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `name`, `email`, `number`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'priya', 'test@mail.com', '12345678', 'type here new description', 0, '2023-04-07 15:55:17', '2023-04-07 15:55:17');

-- --------------------------------------------------------

--
-- Table structure for table `Quotation`
--

CREATE TABLE `Quotation` (
  `id` int(11) NOT NULL,
  `staffid` varchar(255) DEFAULT NULL,
  `seller_id` int(11) NOT NULL,
  `container` varchar(255) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `term` varchar(255) NOT NULL,
  `port` varchar(255) NOT NULL,
  `lines` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `days` varchar(255) NOT NULL,
  `validity` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Quotation`
--

INSERT INTO `Quotation` (`id`, `staffid`, `seller_id`, `container`, `origin`, `weight`, `rate`, `term`, `port`, `lines`, `grade`, `days`, `validity`, `description`, `date`, `image`, `created_at`, `updated_at`) VALUES
(1, NULL, 3, '2*2', 'india', '23', '45', 'type', '4567', '2', '4', '2days', '4day', 'type here', '23-03-23', 'miccy.jpg,Wallpaper.jpg', '2023-04-19 08:13:55', '2023-04-19 08:13:55'),
(4, NULL, 3, '2*2', 'india', '23', '45', 'type', '4567', '2', '4', '2days', '4day', 'type here', '23-03-23', NULL, '2023-04-19 09:28:29', '2023-04-19 09:28:29'),
(45, NULL, 14, '15*40', 'Germany', '25kg', '2500', 'Cif', 'Goa', 'Abcd', 'Abcd', '25', '30 days', 'Need to deliver asap', '24/04/2023', NULL, '2023-04-24 06:27:39', '2023-04-24 06:27:39'),
(30, NULL, 6, '4*4', 'india', '45', '2', 'gevdf', '4567', '4', '4', '3days', '4day', 'sdvdvd', '23-03-23', NULL, '2023-04-19 12:04:59', '2023-04-19 12:04:59'),
(31, NULL, 6, '2*2', 'india', '32', '2', '3535', '4567', '3', '2', '5days', '7day', 'dfssfdsfsfdf', '23-05-23', NULL, '2023-04-19 12:22:47', '2023-04-19 12:22:47'),
(32, NULL, 14, '10x40', 'India', '637kg', '6372', 'CIF', 'Gdjjd', 'Hdjmx', 'Jdkmd', 'Hxjxjc', '6 month', 'Fghhgg', '4/06/2023', NULL, '2023-04-19 13:56:16', '2023-04-19 13:56:16'),
(33, NULL, 14, '10x40', 'India', '637kg', '6372', 'CIF', 'Gdjjd', 'Hdjmx', 'Jdkmd', 'Hxjxjc', '6 month', 'Fghhgg', '4/06/2023', NULL, '2023-04-19 13:56:17', '2023-04-19 13:56:17'),
(43, NULL, 19, '10X40', 'Div', 'Eug', 'Rif', 'Ekf', 'Fif', 'Xjx', 'KC ic', '477', 'Dkxj', 'Ucid', 'Cicuc', NULL, '2023-04-21 12:05:01', '2023-04-21 12:05:01'),
(44, NULL, 14, '15*40', 'Germany', '25kg', '2500', 'Cif', 'Goa', 'Abcd', 'Abcd', '25', '30 days', 'Need to deliver asap', '24/04/2023', NULL, '2023-04-24 06:27:38', '2023-04-24 06:27:38'),
(35, NULL, 14, 'Shdhjd', 'Zhjxjxx', 'Zhxhjcjf', 'Zhxbcnc', 'Xhxbcnc', 'Zhdnxnc', 'Xbxncncn', 'Zhxncnc', 'Xbxbcnc', 'Zhxncnc', 'Xbxncncg.f fn', 'Znxncncn', NULL, '2023-04-20 08:46:49', '2023-04-20 08:46:49'),
(36, NULL, 14, 'Enlchmdhmd', 'Jfkhdhkd', 'Hchchx', 'Hkxhmxgmx', 'Chkxhx', 'Bmxbx', 'Ccxh', 'Highc', 'Gjfj', 'Gulfu', 'Hlxhlcgkxykcgkxgjx', 'Hxy', NULL, '2023-04-20 08:51:13', '2023-04-20 08:51:13'),
(37, NULL, 6, 'asfasfasfasfaf', 'india', '24', 'we', 'weqwwe', '23', 'we', '23', '23', '23', 'wdawwdwdw', 'wwd', NULL, '2023-04-20 09:03:56', '2023-04-20 09:03:56'),
(38, NULL, 14, '20*40', 'India', '50kg', '20,000', 'Cif', 'Mumbai', 'Abcd', 'Abcd', '25', '10', 'This needs to deliver on time', '20/05/2023', NULL, '2023-04-20 09:36:09', '2023-04-20 09:36:09'),
(39, NULL, 14, '20*40', 'India', '50kg', '20,000', 'Cif', 'Mumbai', 'Abcd', 'Abcd', '25', '10', 'This needs to deliver on time', '20/05/2023', NULL, '2023-04-20 09:36:10', '2023-04-20 09:36:10'),
(40, NULL, 15, '10*40', 'USA', '50kg', '50,000', 'Cif', 'Goa port', 'Abcd', 'Abcd', '50 days', '50days', 'Deliver it soon', '20/4/2023', NULL, '2023-04-20 10:37:02', '2023-04-20 10:37:02'),
(42, NULL, 14, 'Hxhxhkx', 'Cychd', 'Udysy', 'Yshidy', 'Shid t', 'Ydhody', 'Hzhx', 'Syixhx', 'Yxys', 'Zyx', 'Xycy', 'J hxhchx', NULL, '2023-04-21 06:12:10', '2023-04-21 06:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` int(11) NOT NULL,
  `staffid` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int(255) DEFAULT '0' COMMENT '1=unblock,0=block',
  `product` varchar(255) DEFAULT NULL,
  `transection` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `device_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `staffid`, `name`, `email`, `mobile`, `password`, `status`, `product`, `transection`, `icon`, `device_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'khan', 'khan@gmail.com,new@gmail.com', '34562781972,9867245364', NULL, 0, 'name here', '234', NULL, NULL, '2023-04-05 11:39:44', '2023-04-05 11:39:44'),
(2, NULL, 'women', 'superadmin@instachamp.com', '6578525212', NULL, 0, '12300', '5677', NULL, NULL, '2023-04-07 14:22:40', '2023-04-07 14:22:40'),
(3, NULL, 'staff', 'rohit@gmail.com', '6578525212', NULL, 0, '45', '453', NULL, NULL, '2023-04-10 16:58:52', '2023-04-10 16:58:52'),
(5, 'STAFF0001', 'munu', 'admin@gmail.com', '999777000', NULL, 0, '1', '4534', NULL, NULL, '2023-04-10 17:03:17', '2023-04-10 17:03:17'),
(6, NULL, 'fizu', 'fizu@gmail.com', '4567894324', '$2y$10$fIHpd54.ttRWXxDFKkXNZ.bQtM.nloyoCV2DjLc2wYHmbEWpebenm', 0, NULL, NULL, NULL, NULL, '2023-04-19 09:36:23', '2023-04-19 09:36:23'),
(7, NULL, 'khannn', 'khann@gmail.com', '3456789234', '$2y$10$jNYL3.ePWUTdnB/a0vDMWOmLGFR.In1SVrR7.10dSFO1SKm5bpHFi', 0, NULL, NULL, '1681904977.jpg', NULL, '2023-04-19 09:43:12', '2023-04-19 09:43:12'),
(9, NULL, 'rahul', 'rahul@gmail.com', '1234567865', '$2y$10$BrDc4XDg22snWnCOnF8jSeYez2s2mZFhmVbqASJRctxVilMIGZN16', 0, NULL, NULL, NULL, NULL, '2023-04-19 12:16:45', '2023-04-19 12:16:45'),
(10, NULL, 'chif', 'chief@gmail.com', '1231231231', '$2y$10$NgT3FpvptOsy5gMxBHFJXeQWSUhFzTyMrRQfqSpjRe/4FyWHWMIkK', 0, NULL, NULL, NULL, NULL, '2023-04-19 12:21:13', '2023-04-19 12:21:13'),
(11, NULL, 'Mukesh', 'muk@gmail.com', '1234512345', '$2y$10$JqhaNu2pP3f2WGb4rqE.Oe4iobPXz5N2LzLUI9APrePjSkHvk/Svi', 0, NULL, NULL, NULL, NULL, '2023-04-19 13:22:47', '2023-04-19 13:22:47'),
(12, NULL, 'Rakesh', 'rak@gmail.com', '1234567123', '$2y$10$3BLsQMEQw0Q2kFkxkFTmQ.PahrU5OzLAiZ5zi.ol0h4056b57D/t6', 0, NULL, NULL, NULL, NULL, '2023-04-19 13:24:41', '2023-04-19 13:24:41'),
(13, NULL, 'yup', 'yup@gmail.com', '9876543210', '$2y$10$R7LjNFkZNTJS7ig3gicWFep8vkp.htIFEUXuMf9lCUR9WATsvhdYO', 0, NULL, NULL, NULL, NULL, '2023-04-19 13:28:10', '2023-04-19 13:28:10'),
(14, NULL, 'Ronit', 'ronitmehta821@gmail.com', '9876543210', '$2y$10$B4Bl4Y9oX0XTPWAtGDtNs.Yrxh5D9tYbbl9XrrpVz5hnAz3gXROJC', 0, NULL, NULL, NULL, NULL, '2023-04-19 13:40:55', '2023-04-19 13:40:55'),
(15, NULL, 'Vishal', 'Ross@infocentroidtech.com', '7566643042', '$2y$10$LOpZZgHKTdqAQZC0ON8GW.KhR7NcwGdXZPNr6J46Ch34zLUCxCPN.', 0, NULL, NULL, NULL, NULL, '2023-04-20 10:33:25', '2023-04-20 10:33:25'),
(16, NULL, 'Khan', 'Khan@gmail.com', '3265893256', '$2y$10$RoWwTm7kvUIBOyNofyBYw.R9seqvpW5Rs/cQ7fbTDWLMlYBydfEP2', 0, NULL, NULL, NULL, NULL, '2023-04-20 10:49:50', '2023-04-20 10:49:50'),
(17, NULL, 'udgdsjsxdg', 'ufhd@jh.com', '1234567890', NULL, 0, 'sdfsef', '12', NULL, NULL, '2023-04-21 11:04:55', '2023-04-21 11:04:55'),
(18, NULL, 'Tdhdnd', 'Zhzhz@tdh.com', '0987654321', '$2y$10$6AyBEOrFpF0y8c0bMxCIB.uOgHXXrdlSD.ZArIp0u3/PVD9qCfn.m', 0, NULL, NULL, NULL, NULL, '2023-04-21 11:32:31', '2023-04-21 11:32:31'),
(19, NULL, 'Rocket singh', 'Abcd@grty.com', '3216549870', '$2y$10$Tt/RoN0Salc.2GpT6FCTi.bCogLkijvImFWqi7CCJYSk7/7twxCoy', 0, NULL, NULL, NULL, NULL, '2023-04-21 12:04:24', '2023-04-21 12:04:24'),
(21, NULL, 'fizu', 'fizu1@gmail.com', '4567894324', '$2y$10$nkNERRmqX/hdI5jGD/RGYe5lnkv/wUu3H1cnxInXaQ2d/OVwAEfAS', 0, NULL, NULL, NULL, NULL, '2023-04-21 12:22:47', '2023-04-21 12:22:47'),
(22, NULL, 'Arun', 'Abcd@gmail.com', '2134567890', '$2y$10$4TN0h7LcTQIdHwfzcRZsZut0EpkaXhekFwzCrNdNOajUdAeH2UYay', 0, NULL, NULL, NULL, NULL, '2023-04-21 12:22:49', '2023-04-21 12:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1b298G3DRzW0kpsSBoFQOC76XMxTLUUISrJxeBbB', 1, '27.5.46.92', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZ2VzRlo4RWF0MDBkMW9WT2NzT2JWYlI5cHNxUHhpakF1Vnh6NHRRWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHBzOi8vaW1wb3J0LWV4cG9ydC5tb3ZpZW1hc3RpLmNvLmluL2xpc3QvMSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkS21qN1FBN2o4MUNmME9yQnZYelpwZWI2M2VoT2c4dXZFNlJrZ0loTHNVY1dOdDNQcFFJV3kiO30=', 1682409633),
('xcruwQCzbhPwNUaa3gGigjiykMnV0P1s0wT8L6R0', 1, '157.34.155.187', 'Mozilla/5.0 (Linux; Android 8.1.0; TECNO ID3k) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRzYyN2RBb1p3eTVINDdzemZXR3NUQnh2cVk0cjlSY2ZtOTZPNXZ1cCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vaW1wb3J0LWV4cG9ydC5tb3ZpZW1hc3RpLmNvLmluL2xpc3RidXllciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkS21qN1FBN2o4MUNmME9yQnZYelpwZWI2M2VoT2c4dXZFNlJrZ0loTHNVY1dOdDNQcFFJV3kiO30=', 1682409703);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `uniqueid` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `number` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `uniqueid`, `name`, `email`, `password`, `number`, `status`, `created_at`, `updated_at`) VALUES
(8, 'STAFF0001', 'priya', 'test@gmail.com', '12345678', '12345678', 0, '2023-04-07 17:34:46', '2023-04-07 17:36:38'),
(9, 'STAFF0009', 'nikku', 'nikita@gmail.com', '123456', '2322433553', 0, '2023-04-12 13:50:12', '2023-04-12 13:50:12'),
(10, 'STAFF0010', 'rufsdsdg', 'hdsfhduf@h.com', '12345', '1234567890', 0, '2023-04-21 11:03:46', '2023-04-21 11:03:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$Kmj7QA7j81Cf0OrBvXzZpeb63ehOg8uvE6RkgIhLsUcWNt3PpQIWy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `Feedback`
--
ALTER TABLE `Feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login..`
--
ALTER TABLE `login..`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Notification`
--
ALTER TABLE `Notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Quotation`
--
ALTER TABLE `Quotation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Feedback`
--
ALTER TABLE `Feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login..`
--
ALTER TABLE `login..`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Notification`
--
ALTER TABLE `Notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Quotation`
--
ALTER TABLE `Quotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
