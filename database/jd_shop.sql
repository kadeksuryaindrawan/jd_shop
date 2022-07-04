-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2022 at 07:26 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jd_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_carts`
--

CREATE TABLE `tb_carts` (
  `id_cart` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` enum('0','process','success','1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_carts`
--

INSERT INTO `tb_carts` (`id_cart`, `id_user`, `id_product`, `product_image`, `product_name`, `product_price`, `quantity`, `status`) VALUES
(11, 14, 75, '15bbdba9484d9c.jpg', 'Brown shirt', 160000, 2, '2'),
(14, 15, 75, '15bbdba9484d9c.jpg', 'Brown shirt', 160000, 2, '2'),
(15, 14, 75, '15bbdba9484d9c.jpg', 'Brown shirt', 160000, 1, '2'),
(16, 14, 73, '15bbdb4e0cd07f.jpg', 'Woman hood', 350000, 1, '2'),
(17, 14, 75, '15bbdba9484d9c.jpg', 'Brown shirt', 160000, 1, '2'),
(18, 14, 73, '15bbdb4e0cd07f.jpg', 'Woman hood', 350000, 1, '2'),
(19, 15, 73, '15bbdb4e0cd07f.jpg', 'Woman hood', 350000, 1, '2'),
(20, 14, 76, '15bc4320ab3964.jpg', 'Grey shirt', 150000, 2, '2'),
(22, 14, 76, '15bc4320ab3964.jpg', 'Grey shirt', 150000, 2, '2'),
(23, 14, 76, '15bc4320ab3964.jpg', 'Grey shirt', 150000, 2, '2'),
(24, 14, 76, '15bc4320ab3964.jpg', 'Grey shirt', 150000, 2, '2'),
(25, 14, 73, '15bbdb4e0cd07f.jpg', 'Woman hood', 350000, 1, '2'),
(31, 14, 89, '15bc7e7e27c446.jpg', 'Blue pants', 500000, 1, '2'),
(34, 15, 76, '15bc4320ab3964.jpg', 'Grey shirt', 150000, 2, '2'),
(37, 14, 77, '15bc43a5b34713.jpg', 'Winter Hood', 400000, 23, '2'),
(39, 15, 77, '15bc43a5b34713.jpg', 'Winter Hood', 400000, 1, '2'),
(42, 14, 73, '15bbdb4e0cd07f.jpg', 'Woman hood', 350000, 1, '2'),
(48, 14, 73, '15bbdb4e0cd07f.jpg', 'Woman hood', 350000, 1, '2'),
(49, 14, 90, '15bcd82b88b60b.jpg', 'Blue shirt', 150000, 1, '2'),
(50, 14, 90, '15bcd82b88b60b.jpg', 'Blue shirt', 150000, 2, '2'),
(51, 14, 77, '15bc43a5b34713.jpg', 'Winter Hood', 400000, 1, '2'),
(53, 14, 73, '15bbdb4e0cd07f.jpg', 'Woman hood', 350000, 1, '2'),
(54, 14, 67, '15bb78bf77c638.jpg', 'Plain Stripe Tee', 150000, 1, '2'),
(55, 19, 92, '15be91af56d003.jpg', 'Baju keren', 150000, 1, '1'),
(56, 19, 89, '15bc7e7e27c446.jpg', 'Blue pants', 500000, 1, '1'),
(57, 20, 92, '15be91af56d003.jpg', 'Baju keren', 150000, 2, 'success'),
(58, 20, 90, '15bcd82b88b60b.jpg', 'Blue shirt', 150000, 1, 'success');

-- --------------------------------------------------------

--
-- Table structure for table `tb_categories`
--

CREATE TABLE `tb_categories` (
  `id_category` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL,
  `category_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_categories`
--

INSERT INTO `tb_categories` (`id_category`, `category_name`, `category_description`) VALUES
(5, 'hoodie', '<p><strong>Lorem ipsum dolor </strong>sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>\r\n'),
(6, 'pants', '<p><s><strong>Lorem ipsum</strong></s> dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat.&nbsp;</p>\r\n'),
(8, 'shirt', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tb_checkout`
--

CREATE TABLE `tb_checkout` (
  `id_checkout` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_cart` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_checkout`
--

INSERT INTO `tb_checkout` (`id_checkout`, `id_user`, `id_cart`, `id_product`, `price`, `quantity`, `created_at`) VALUES
(10, 14, 11, 75, 160000, 2, '2018-10-15 13:20:43'),
(13, 15, 14, 75, 160000, 2, '2018-10-15 13:45:52'),
(14, 14, 15, 75, 160000, 1, '2018-10-15 13:48:08'),
(15, 14, 16, 73, 350000, 1, '2018-10-15 13:50:00'),
(16, 14, 17, 75, 160000, 1, '2018-10-15 13:50:00'),
(17, 14, 18, 73, 350000, 1, '2018-10-15 13:54:24'),
(18, 15, 19, 73, 350000, 1, '2018-10-15 13:56:23'),
(19, 14, 20, 76, 150000, 2, '2018-10-15 14:23:32'),
(20, 14, 22, 76, 150000, 2, '2018-10-15 14:38:21'),
(21, 14, 23, 76, 150000, 2, '2018-10-15 14:40:38'),
(22, 14, 24, 76, 150000, 2, '2018-10-15 14:53:13'),
(23, 14, 25, 73, 350000, 1, '2018-10-15 14:53:13'),
(24, 14, 31, 89, 500000, 1, '2018-10-18 13:41:37'),
(25, 15, 34, 76, 150000, 2, '2018-10-18 14:02:12'),
(26, 14, 37, 77, 400000, 23, '2018-10-18 14:33:31'),
(27, 15, 39, 77, 400000, 1, '2018-10-19 11:20:09'),
(28, 14, 42, 73, 350000, 1, '2018-10-22 15:50:09'),
(29, 14, 48, 73, 350000, 1, '2018-11-11 21:20:16'),
(30, 14, 49, 90, 150000, 1, '2018-11-11 21:20:16'),
(31, 14, 50, 90, 150000, 2, '2018-11-11 21:49:24'),
(32, 14, 51, 77, 400000, 1, '2018-11-11 21:49:24'),
(33, 14, 53, 73, 350000, 1, '2018-11-12 13:42:31'),
(34, 14, 54, 67, 150000, 1, '2018-11-12 13:42:31'),
(35, 19, 55, 92, 150000, 1, '2020-10-24 16:07:53'),
(36, 19, 56, 89, 500000, 1, '2020-10-24 16:07:53'),
(37, 20, 57, 92, 150000, 2, '2021-10-17 13:46:54'),
(38, 20, 58, 90, 150000, 1, '2021-10-17 13:46:54');

-- --------------------------------------------------------

--
-- Table structure for table `tb_products`
--

CREATE TABLE `tb_products` (
  `id_product` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_image_2` varchar(100) NOT NULL,
  `product_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_products`
--

INSERT INTO `tb_products` (`id_product`, `id_category`, `product_name`, `product_price`, `product_image`, `product_image_2`, `product_stock`) VALUES
(67, 8, 'Plain Stripe Tee', 150000, '15bb78bf77c638.jpg', '25bb78bf77c63c.jpg', 9),
(73, 5, 'Woman hood', 350000, '15bbdb4e0cd07f.jpg', '25bbdb4e0cd08e.jpg', 13),
(75, 8, 'Brown shirt', 160000, '15bbdba9484d9c.jpg', '25bbdba9484da2.jpg', 10),
(76, 8, 'Grey shirt', 150000, '15bc4320ab3964.jpg', '25bc4320ab3968.jpg', 20),
(77, 5, 'Winter Hood', 400000, '15bc43a5b34713.jpg', '25bc43a5b34719.jpg', 13),
(89, 6, 'Blue pants', 500000, '15bc7e7e27c446.jpg', '25bc7e7e27c44e.jpg', 9),
(90, 8, 'Blue shirt', 150000, '15bcd82b88b60b.jpg', '25bcd82b88b611.jpg', 8),
(92, 8, 'Baju keren', 150000, '15be91af56d003.jpg', '25be91af56d00f.jpg', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(11) NOT NULL,
  `fullname` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level_user` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `fullname`, `email`, `password`, `level_user`) VALUES
(14, 'balun', 'balun@admin.com', '$2y$12$2I28dWej8WVklTkCHcJrA.SSSPo8JkQjNGrIhWPgAi.NskbCWzz8q', 'user'),
(15, 'kakwir', 'kakwir@admin.com', '$2y$12$r7jIOAkZQ0PrD8bQEk7fMeex.p1A.slkYsIBTPZJjM9DxmGNL00PC', 'user'),
(17, 'Admin', 'admin@gmail.com', '$2y$12$de9WUOvXnL/ueo3z/0HAs.3dlQ74U4g17gYxc5Bedj8lkRYd.7UY2', 'admin'),
(18, 'I Komang Coba', 'komangcoba@gmail.com', '$2y$12$fOXhqEuCpx0aTzB2AGTQXOhpuwxEk78TEIFvfdBkL.I4Ie/NkUBIe', 'user'),
(19, 'ferdy', 'ferdysatria@gmail.com', '$2y$12$1dng.eWxQ.CbpnNiAHVRpuid9ACkGdWCv5gr2I7LY5wjGMf3QSYey', 'user'),
(20, 'kadeksurya', 'kadeksurya@gmail.com', '$2y$12$qq5gD3A3zXfHlHvR/9hcUOM5sII5imeJY7.Ni.Xdn/jzvzh6E5h/2', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_carts`
--
ALTER TABLE `tb_carts`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_user` (`id_product`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Indexes for table `tb_categories`
--
ALTER TABLE `tb_categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `tb_checkout`
--
ALTER TABLE `tb_checkout`
  ADD PRIMARY KEY (`id_checkout`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_cart` (`id_cart`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `tb_products`
--
ALTER TABLE `tb_products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_carts`
--
ALTER TABLE `tb_carts`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tb_categories`
--
ALTER TABLE `tb_categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_checkout`
--
ALTER TABLE `tb_checkout`
  MODIFY `id_checkout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_products`
--
ALTER TABLE `tb_products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_carts`
--
ALTER TABLE `tb_carts`
  ADD CONSTRAINT `tb_carts_id_product` FOREIGN KEY (`id_product`) REFERENCES `tb_products` (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_carts_id_user` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_checkout`
--
ALTER TABLE `tb_checkout`
  ADD CONSTRAINT `tb_checkout_id_cart` FOREIGN KEY (`id_cart`) REFERENCES `tb_carts` (`id_cart`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_checkout_id_product` FOREIGN KEY (`id_product`) REFERENCES `tb_products` (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_checkout_id_user` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_products`
--
ALTER TABLE `tb_products`
  ADD CONSTRAINT `tb_products_id_category` FOREIGN KEY (`id_category`) REFERENCES `tb_categories` (`id_category`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
