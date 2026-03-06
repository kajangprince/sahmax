-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 02, 2023 at 01:01 PM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vibecets_sahmax`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_details`
--

CREATE TABLE `account_details` (
  `id` int(11) NOT NULL,
  `account_number` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_name` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_name` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account_details`
--

INSERT INTO `account_details` (`id`, `account_number`, `account_name`, `bank_name`, `email`, `time`, `date`) VALUES
(1, '0819878223', 'sulaiman saheed', '044', 'sulaimansaheedadek@gmail.com', '09:28:12', '2023-11-17'),
(2, '0810098543', 'kajang prince', '044', 'kajangprince4@gmail.com', '13:25:16', '2023-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `admin_account_details`
--

CREATE TABLE `admin_account_details` (
  `id` int(11) NOT NULL,
  `first_account` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `second_account` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `third_account` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fourth_account` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fifth_account` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sixth_account` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seventh_account` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_account_details`
--

INSERT INTO `admin_account_details` (`id`, `first_account`, `second_account`, `third_account`, `fourth_account`, `fifth_account`, `sixth_account`, `seventh_account`, `email`) VALUES
(1, 'Palmpay', 'Accessbank', 'FCMB', 'Fidelity bank', 'GTBank', 'Zenith bank', 'UBA', 'sahmaxoptimum@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `buy_order`
--

CREATE TABLE `buy_order` (
  `id` int(11) NOT NULL,
  `order_id` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dollar_type` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount_in_naira` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_details` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `network` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pmid` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receipt` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `payment_status` int(1) NOT NULL DEFAULT '0',
  `order_status` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'open',
  `dispute_level` int(1) NOT NULL DEFAULT '0',
  `time` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `number`, `email`, `message`, `created_at`) VALUES
(1, 'jimmy', '3476948293', 'freeman.jacobsen93@outlook.com', 'hi there,\nmonthly seo services - professional/ affordable seo services\nhire the leading seo marketing company and get your website ranked on search engines. are you looking to rank your website on search engines? contact us now to get started - https://digitalpromax.co/la/  today!\n\npsst.. we will also do web design and build complete website. wordpress and ecommerce sites development. click here: https://wpexpertspro.co/website/', '2023-10-10 05:29:58');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `email` varchar(1000) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `btcbuy` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `btcsell` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `derivbuy` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `derivsell` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pmbuy` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pmsell` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `usdtbuy` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `usdtsell` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `netellerbuy` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `netellersell` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `btcbuy`, `btcsell`, `derivbuy`, `derivsell`, `pmbuy`, `pmsell`, `usdtbuy`, `usdtsell`, `netellerbuy`, `netellersell`, `email`, `updated_at`) VALUES
(1, '2000', '1120', '1150', '1110', '1160', '1090', '1180', '1130', '1400', '1070', 'support@sahmax.com', '2023-12-01 07:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `sell_order`
--

CREATE TABLE `sell_order` (
  `id` int(11) NOT NULL,
  `order_id` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dollar_type` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount_in_usd` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receipt` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `payment_status` int(1) NOT NULL DEFAULT '0',
  `order_status` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'open',
  `dispute_level` int(1) NOT NULL DEFAULT '0',
  `time` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_img` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '../assets/img/avatars/2.png',
  `verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` int(11) NOT NULL DEFAULT '0',
  `phone_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` int(20) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `occupation` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `verification_image` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_status` int(11) NOT NULL DEFAULT '0',
  `subscribe` int(11) NOT NULL DEFAULT '1',
  `resettoken` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `surname`, `email`, `password`, `pin_code`, `profile_img`, `verification_code`, `is_verified`, `phone_number`, `address`, `state`, `city`, `zipcode`, `date_of_birth`, `occupation`, `verification_status`, `verification_image`, `account_status`, `subscribe`, `resettoken`, `created_at`, `updated_at`) VALUES
(1, 'prince', 'lawo', 'kajang', 'kajangprince4@gmail.com', '$2y$10$AJOlgVrPs96QCaxcoSMVwOZYbLp5NBe8ZBgM6XL9Ts5zQQJnD7ziS', '7013', '../assets/img/avatars/2.png', 'a243a6b42412b06c8c438932d8732', 1, '+2349129410059', '19 ediba street', 'cross river', 'calabar', 540211, '1999-03-16', 'self employed', '1', NULL, 0, 1, 'a9fcc6a8be7ffc7b03c6944db4d99', '2023-09-29 23:06:12', '2023-09-29 17:06:12'),
(2, 'amirhosein', 'mhmmdi', 'mohammadi', 'amirhoseinmhmmdi79@gmail.com', '$2y$10$P8G/0Mlc4lkA2Ngwzj9ZmudjI7/VetjksiKKRxq8pbATXToWCrrIa', '9035', '../assets/img/avatars/2.png', '81c978bd64c9cfcea4a3ce01f4816', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 0, 1, '', '2023-10-04 16:05:04', '2023-10-04 10:05:04'),
(3, 'ebi', 'ebi', 'liravi', 'liravi081@gmail.com', '$2y$10$bw5jbdxqzFMJwcTGnhJcC.A1Q4N5PFKFy2BscKgihNjJA9AVdjgvW', '7126', '../assets/img/avatars/2.png', '92162ca2601ce5f354d480eee4fcd', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 0, 1, '', '2023-10-10 16:37:13', '2023-10-10 10:37:13'),
(4, 'ali', 'tahmaseb', 'tahmasebi', 'thesfandiar9@gmail.com', '$2y$10$tazH.BEX7tFJqLngBxeMuuPCbly6XpNoOFX9OnNO.Ng7EvbJby9By', '5604', '../assets/img/avatars/2.png', '839134443b025cb9cf1b1391b28cb', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 0, 1, '', '2023-10-13 20:26:03', '2023-10-13 14:26:03'),
(5, 'mohammadhashemi', 'hashemi', 'mobammad', 's.mohammad.bagher1383@gmail.com', '$2y$10$PuBc7JDyIN3jdMGUQIHvLOFqTjGKZGBGBTFtoJLWWACVEbVwuoYyW', '1594', '../assets/img/avatars/2.png', 'edf64be510b8777cb310e4a3592d1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 0, 1, '', '2023-10-16 23:47:27', '2023-10-16 17:47:27'),
(6, 'daniel', 'oreoluwa', 'kolawole', 'danielore290@gmail.com', '$2y$10$KxNUaCf6cDdUwMyJ4U6ATeleQ.1w7zIV/Xj7.4kSFo47oHXUpXPdK', '4321', '../assets/img/avatars/2.png', 'a1cc0d082d31de0c3fb2b25db556c', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 0, 1, '', '2023-10-17 11:42:24', '2023-10-17 05:42:24'),
(7, 'mansor', 'mansor', 'bastame', 'mansorbastame@gmail.com', '$2y$10$0zL7d2h9sX3dk6fmhpEhd.8jAH2w6D.Tj4KRVeOEmyKLxLFwiPyeq', '9634', '../assets/img/avatars/2.png', '802a083b4fa1bb603eee283704d77', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 0, 1, '', '2023-10-21 12:55:01', '2023-10-21 06:55:01'),
(8, 'ali', 'reza', 'shahr', 'a.sh391@yahoo.com', '$2y$10$8iw3sCf1EqooOH0N/lpNtOkeAAWtK.xQlt0PppVZhhZXl0zTVZcye', '1751', '../assets/img/avatars/2.png', '2b8dda1bf8f6d385bfdfe70abf7f3', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 0, 1, '', '2023-10-21 16:37:46', '2023-10-21 10:37:46'),
(9, 'yasin', 'mirzaei', 'yasi', 'yaaasin.m.8931@gmail.com', '$2y$10$hooUv9D2VHTq094YtQ0YHeqJPailYWnHj2pn3x8ozcpuHw4z9gqFW', '6831', '../assets/img/avatars/2.png', '4ce49f140f26b30265cf613aa65d5', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 0, 1, '', '2023-10-22 00:24:36', '2023-10-21 18:24:36'),
(10, 'vahid', 'rahman', 'rahmati', 'vahidhi11@yahoo.com', '$2y$10$j9By8AE0DP8vbYU3ooWfqOR/92Bndv7Vt/4H1zELd6fmehPsoNGt2', '3304', '../assets/img/avatars/2.png', 'f0b0ebfcd539c2ee15664fbbe285e', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 0, 1, '', '2023-10-23 20:47:17', '2023-10-23 14:47:17'),
(11, 'jsndmj', 'hsih', 'gdhgg', 'mmdiown@gmail.com', '$2y$10$8R3akXXLC.5S0IB4dk3jB.WrxN0ZxFyAduCYQLBoTk03ap.bhQ.hu', '3733', '../assets/img/avatars/2.png', '05ebddb669b35e7df92234365a8e0', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 0, 1, '', '2023-10-24 01:29:52', '2023-10-23 19:29:52'),
(12, 'mehrgan', 'hamidi', 'mehrgan', 'm6135571@gmail.com', '$2y$10$kNcOCrwOLK745bvpQJYTduEY/HG0yf5p1/YlQeIYIg4tanwX2NhA.', '3564', '../assets/img/avatars/2.png', '1f6d5474ae1cf6372b91cb46fc4ed', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 0, 1, '', '2023-10-30 16:53:59', '2023-10-30 10:53:59'),
(13, 'amin', 'amin', 'yousefi', 'yousfiamin758@gimail.com', '$2y$10$/QjdAhoRNCpOcv9Zi59q1OBgMLcVl/FZoey4KvrtQhkxgSheFatwO', '3549', '../assets/img/avatars/2.png', '1b1762925bf7c97ff72dc5f8324eb', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 0, 1, '', '2023-11-03 22:34:34', '2023-11-03 16:34:34'),
(14, 'sheriff', 'omodayo', 'adeleke', 'sherifastro@gmail.com', '$2y$10$NwL5gtMoO6hL4HYQixkmrOoOnv3yn6J.42PHHriN8VDCUKW5D4BWK', '2952', '../assets/img/avatars/2.png', '7c08e02705f7a64edb039568c9f94', 0, '+2349039472114', 'onikanga village, gaa akanbi', 'kwara', 'ilorin', 240222, '1985-07-29', 'self employed', '0', NULL, 0, 1, '', '2023-11-04 20:21:57', '2023-11-04 14:21:57'),
(15, 'janek', 'janek', 'duda', 'deontaesunnav@gmail.com', '$2y$10$raNAvAmudxEzWyUr6RajYewOpGcMkTxOBVA7azflLOFGm9bXI.IB.', '2992', '../assets/img/avatars/2.png', 'bf035ab20a456d501773207fbe262', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 0, 1, '', '2023-11-05 05:02:24', '2023-11-04 23:02:24'),
(16, 'wgib', 'hkvb', 'dhdin', 'ab2330674@gmail.com', '$2y$10$9z1vmKnfJCm8uPAveOmlL.wJh/xYIrLV1JSTVzPtvKQNCOaXtNxa.', '2123', '../assets/img/avatars/2.png', '1056fd50ee585a875446dd548223f', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 0, 1, '', '2023-11-09 16:02:00', '2023-11-09 09:02:00'),
(17, 'saheed', 'adekunle', 'sulaiman', 'sulaimansaheedadek@gmail.com', '$2y$10$B/uhrxF70DAbfAum7IoDbOOCL0dHRpCuYcHX7/a2XjUNylQELxTFS', '7167', '../assets/img/avatars/2.png', '8dc9531e138437a12d01d26e9e8b5', 1, '07030061168', 'hudjdi', 'dbndb', 'ndnn', 20900, '1996-11-17', 'student', '0', NULL, 0, 1, '', '2023-11-17 15:08:52', '2023-11-17 08:08:52'),
(18, 'moses', 'adebayo', 'samuel', 'adebayoforex88@gmail.com', '$2y$10$mmo8sHpZvLjqcKwymRpqk.UtbKIF98bu9jeaJ/YtLxhTelqp2gxRy', '5954', 'profilepictures/the king logo  (3) - Copy.jpg', '4b6d6fbb732ca8741a97a9a25e30f', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 0, 1, '', '2023-11-19 20:38:22', '2023-11-19 13:38:22'),
(19, 'sah', 'ade', 'sul', 'sulaimansaheedade@gmail.com', '$2y$10$bDeDCAC0DKltY/MpVzUFPOlkMMJxhQ4Q0GNJrb2JNTXFzSiJKe2t2', '8269', '../assets/img/avatars/2.png', 'e06a9daee6e4030f344d9f24eff23', 1, '878308886', 'no 9, jijjk', 'osun', 'osogb', 46676, '2023-11-12', 'employed', '0', NULL, 0, 1, '', '2023-11-22 12:27:13', '2023-11-22 05:27:13');

-- --------------------------------------------------------

--
-- Table structure for table `verification_request`
--

CREATE TABLE `verification_request` (
  `id` int(11) NOT NULL,
  `user_id` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_card` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_card_back` varchar(1000) COLLATE utf8_unicode_ci DEFAULT 'empty',
  `photo_with_id` varchar(1000) COLLATE utf8_unicode_ci DEFAULT 'empty',
  `document_type` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verification_status` int(11) DEFAULT '0',
  `verification_stage` int(1) NOT NULL DEFAULT '1',
  `requested_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_details`
--
ALTER TABLE `account_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_account_details`
--
ALTER TABLE `admin_account_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buy_order`
--
ALTER TABLE `buy_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sell_order`
--
ALTER TABLE `sell_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `verification_request`
--
ALTER TABLE `verification_request`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_details`
--
ALTER TABLE `account_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_account_details`
--
ALTER TABLE `admin_account_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buy_order`
--
ALTER TABLE `buy_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sell_order`
--
ALTER TABLE `sell_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `verification_request`
--
ALTER TABLE `verification_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
