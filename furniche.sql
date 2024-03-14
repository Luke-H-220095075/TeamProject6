-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2024 at 12:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furniche`
--

-- --------------------------------------------------------

--
-- Table structure for table `basketproducts`
--

CREATE TABLE `basketproducts` (
  `basketId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `basketproducts`
--

INSERT INTO `basketproducts` (`basketId`, `productId`, `quantity`) VALUES
(1, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `baskets`
--

CREATE TABLE `baskets` (
  `basketId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT current_timestamp(),
  `discountId` int(11) DEFAULT NULL,
  `currentUserBasket` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `baskets`
--

INSERT INTO `baskets` (`basketId`, `userId`, `dateAdded`, `discountId`, `currentUserBasket`) VALUES
(1, 1, '2024-02-07 12:22:40', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `discountId` int(11) NOT NULL,
  `discountTitle` varchar(100) NOT NULL,
  `discountDescription` varchar(500) NOT NULL,
  `value` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`discountId`, `discountTitle`, `discountDescription`, `value`) VALUES
(1, 'test', 'test', 15.00);

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `inquiryId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `inquiryDate` date DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`inquiryId`, `userId`, `inquiryDate`, `subject`, `message`) VALUES
(1, 1, '2023-12-12', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `orderreviews`
--

CREATE TABLE `orderreviews` (
  `reviewId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `rating` int(1) NOT NULL CHECK (`rating` >= 1 and `rating` <= 5),
  `description` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderreviews`
--

INSERT INTO `orderreviews` (`reviewId`, `orderId`, `reviewDate`, `rating`, `description`) VALUES
(1, 111, '2024-02-07 12:25:05', 5, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `basketId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT current_timestamp(),
  `deliveryOption` enum('standard','premium') DEFAULT NULL,
  `deliveryDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `basketId`, `userId`, `dateAdded`, `deliveryOption`, `deliveryDate`) VALUES
(111, 1, 1, '2024-02-07 12:24:42', 'standard', '2024-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT current_timestamp(),
  `countSold` int(11) DEFAULT NULL,
  `countStock` int(11) DEFAULT NULL,
  `productCategory` enum('modern','minimal','rustic','bohemian','tropical') DEFAULT NULL,
  `productType` enum('sofa','bed','desk','chair','wardrobe') DEFAULT NULL,
  `imageName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `productName`, `price`, `dateAdded`, `countSold`, `countStock`, `productCategory`, `productType`, `imageName`) VALUES
(1, 'Modern Sofa', 499.99, '2023-12-01 13:25:36', 10, 50, 'modern', 'sofa', 'modern_sofa.jpg'),
(2, 'Minimal Desk', 199.99, '2023-12-01 13:25:36', 5, 20, 'minimal', 'desk', 'minimal_desk.jpg'),
(3, 'Rustic Chair', 129.99, '2023-12-01 13:25:36', 8, 30, 'rustic', 'chair', 'rustic_chair.jpg'),
(4, 'Bohemian Bed', 699.99, '2023-12-01 13:25:36', 12, 40, 'bohemian', 'bed', 'bohemian_bed.jpg'),
(5, 'Tropical Wardrobe', 299.99, '2023-12-01 13:25:36', 6, 25, 'tropical', 'wardrobe', 'tropical_wardrobe.jpg'),
(6, 'Modern Chair', 149.99, '2023-12-01 13:25:36', 9, 35, 'modern', 'chair', 'modern_chair.jpg'),
(7, 'Minimal Bed', 599.99, '2023-12-01 13:25:36', 15, 45, 'minimal', 'bed', 'minimal_bed.jpg'),
(8, 'Rustic Desk', 179.99, '2023-12-01 13:25:36', 7, 28, 'rustic', 'desk', 'rustic_desk.jpg'),
(9, 'Bohemian Sofa', 549.99, '2023-12-01 13:25:36', 11, 38, 'bohemian', 'sofa', 'bohemian_sofa.jpg'),
(10, 'Tropical Chair', 169.99, '2023-12-01 13:25:36', 10, 32, 'tropical', 'chair', 'tropical_chair.jpg'),
(11, 'Modern Sofa 2', 479.99, '2023-12-01 13:25:36', 8, 45, 'modern', 'sofa', 'modern_sofa_2.jpg'),
(12, 'Minimal Desk 2', 219.99, '2023-12-01 13:25:36', 6, 18, 'minimal', 'desk', 'minimal_desk_2.jpg'),
(13, 'Rustic Chair 2', 149.99, '2023-12-01 13:25:36', 7, 32, 'rustic', 'chair', 'rustic_chair_2.jpg'),
(14, 'Bohemian Bed 2', 679.99, '2023-12-01 13:25:36', 10, 35, 'bohemian', 'bed', 'bohemian_bed_2.jpg'),
(15, 'Tropical Wardrobe 2', 279.99, '2023-12-01 13:25:36', 5, 28, 'tropical', 'wardrobe', 'tropical_wardrobe_2.jpg'),
(16, 'Modern Chair 2', 129.99, '2023-12-01 13:25:36', 12, 30, 'modern', 'chair', 'modern_chair_2.jpg'),
(17, 'Minimal Bed 2', 569.99, '2023-12-01 13:25:36', 14, 40, 'minimal', 'bed', 'minimal_bed_2.jpg'),
(18, 'Rustic Desk 2', 199.99, '2023-12-01 13:25:36', 10, 26, 'rustic', 'desk', 'rustic_desk_2.jpg'),
(19, 'Bohemian Sofa 2', 529.99, '2023-12-01 13:25:36', 13, 38, 'bohemian', 'sofa', 'bohemian_sofa_2.jpg'),
(20, 'Tropical Chair 2', 149.99, '2023-12-01 13:25:36', 11, 30, 'tropical', 'chair', 'tropical_chair_2.jpg'),
(21, 'Modern Sofa 3', 459.99, '2023-12-01 13:25:36', 9, 42, 'modern', 'sofa', 'modern_sofa_3.jpg'),
(22, 'Minimal Desk 3', 239.99, '2023-12-01 13:25:36', 8, 22, 'minimal', 'desk', 'minimal_desk_3.jpg'),
(23, 'Rustic Chair 3', 139.99, '2023-12-01 13:25:36', 11, 28, 'rustic', 'chair', 'rustic_chair_3.jpg'),
(24, 'Bohemian Bed 3', 649.99, '2023-12-01 13:25:36', 13, 30, 'bohemian', 'bed', 'bohemian_bed_3.jpg'),
(25, 'Tropical Wardrobe 3', 259.99, '2023-12-01 13:25:36', 9, 25, 'tropical', 'wardrobe', 'tropical_wardrobe_3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `admin` enum('customer','admin') NOT NULL DEFAULT 'customer',
  `firstname` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `secretAnswer` varchar(255) NOT NULL,
  `userType` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `admin`, `firstname`, `surname`, `address`, `email`, `username`, `phone`, `password`, `dateCreated`, `secretAnswer`, `userType`) VALUES
(1, 'customer', 'admin', 'admin', NULL, 'admin@admin.com', 'admin', NULL, '$2y$10$LmAbf3RNHJyUisHl7RH.rOB5dhWG136IRNw5lfcBArzIn9jRpWoEK', '2024-02-07 11:51:07', '', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basketproducts`
--
ALTER TABLE `basketproducts`
  ADD KEY `pivot_basket` (`basketId`),
  ADD KEY `pivot_product` (`productId`);

--
-- Indexes for table `baskets`
--
ALTER TABLE `baskets`
  ADD PRIMARY KEY (`basketId`),
  ADD KEY `basket_discount` (`discountId`),
  ADD KEY `basket_user` (`userId`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`discountId`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`inquiryId`),
  ADD KEY `inquiry_user` (`userId`);

--
-- Indexes for table `orderreviews`
--
ALTER TABLE `orderreviews`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `fk_order_reviews_order_id` (`orderId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `order_basket` (`basketId`),
  ADD KEY `order_user` (`userId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baskets`
--
ALTER TABLE `baskets`
  MODIFY `basketId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `discountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `inquiryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orderreviews`
--
ALTER TABLE `orderreviews`
  MODIFY `reviewId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basketproducts`
--
ALTER TABLE `basketproducts`
  ADD CONSTRAINT `pivot_basket` FOREIGN KEY (`basketId`) REFERENCES `baskets` (`basketId`),
  ADD CONSTRAINT `pivot_product` FOREIGN KEY (`productId`) REFERENCES `products` (`productId`);

--
-- Constraints for table `baskets`
--
ALTER TABLE `baskets`
  ADD CONSTRAINT `basket_discount` FOREIGN KEY (`discountId`) REFERENCES `discounts` (`discountId`),
  ADD CONSTRAINT `basket_user` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Constraints for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD CONSTRAINT `inquiry_user` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Constraints for table `orderreviews`
--
ALTER TABLE `orderreviews`
  ADD CONSTRAINT `fk_order_reviews_order_id` FOREIGN KEY (`orderId`) REFERENCES `orders` (`orderId`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_basket` FOREIGN KEY (`basketId`) REFERENCES `baskets` (`basketId`),
  ADD CONSTRAINT `order_user` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
