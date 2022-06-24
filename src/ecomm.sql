-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-server
-- Generation Time: Jun 24, 2022 at 09:17 AM
-- Server version: 8.0.19
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `order_status` varchar(20) NOT NULL,
  `order_amount` int NOT NULL,
  `shipping_amount` int NOT NULL,
  `total_amount` int NOT NULL,
  `city` varchar(20) NOT NULL,
  `pincode` int NOT NULL,
  `order_date` datetime NOT NULL,
  `delivery_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `email`, `order_status`, `order_amount`, `shipping_amount`, `total_amount`, `city`, `pincode`, `order_date`, `delivery_date`) VALUES
(1007, 'karthik@gmail.om', 'in transit', 288, 200, 488, 'varanasi', 221005, '2022-06-22 00:00:00', NULL),
(1008, 'parvati@gmail.com', 'delivered', 800, 200, 1000, 'varanasi', 221005, '2022-06-22 00:00:00', NULL),
(1010, 'ganesh@gmail.om', 'approved', 1050, 200, 1250, 'varanasi', 221005, '2022-06-22 00:00:00', '2022-06-23 11:30:23'),
(1012, 'ganesh@gmail.om', 'approved', 736, 200, 936, 'vns', 221005, '2022-06-22 00:00:00', '2022-06-23 10:02:33'),
(1013, 'ganesh@gmail.om', 'approved', 668, 200, 868, 'vns', 221004, '2022-06-22 00:00:00', '2022-06-23 10:03:04'),
(1021, 'shiva@hotmail.com', 'approved', 118, 200, 318, 'varanasi', 221005, '2022-06-23 09:12:59', '2022-06-23 10:00:12'),
(1024, 'kamal@gmail.com', 'in transit', 17, 200, 217, 'jsdkhjd', 221005, '2022-06-24 05:41:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int NOT NULL,
  `prod_id` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_id`, `prod_id`, `quantity`) VALUES
(1007, 102, 1),
(1007, 101, 1),
(1007, 103, 1),
(1007, 105, 1),
(1007, 104, 1),
(1008, 110, 2),
(1008, 107, 2),
(1008, 102, 2),
(1008, 106, 5),
(1010, 102, 7),
(1012, 103, 8),
(1012, 102, 4),
(1013, 103, 4),
(1013, 102, 4),
(1021, 103, 2),
(1021, 109, 2),
(1024, 103, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `prod_price` int NOT NULL,
  `prod_origin` varchar(50) NOT NULL,
  `prod_image` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `prod_price`, `prod_origin`, `prod_image`) VALUES
(101, 'Potato', 40, 'india', 'https://media.istockphoto.com/photos/single-potato-picture-id176012507?b=1&k=20&m=176012507&s=170667a&w=0&h=3FXIzHiGF5QYc3-0CzJ-NI_gk6saWW7v-NS_9Gn6VtY='),
(102, 'Apple', 150, 'india', 'https://image.shutterstock.com/image-photo/red-apple-isolated-on-white-260nw-1727544364.jpg'),
(103, 'Carrott', 17, 'india', 'https://images.unsplash.com/photo-1598170845058-32b9d6a5da37?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8Y2Fycm90fGVufDB8fDB8fA%3D%3D&w=1000&q=80'),
(104, 'onion', 40, 'india', 'https://www.jiomart.com/images/product/original/590002136/onion-5-kg-pack-product-images-o590002136-p590002136-0-202203141906.jpg'),
(105, 'Tomato', 51, 'india', 'https://media.istockphoto.com/photos/tomatoes-isolate-on-white-background-tomato-half-isolated-tomatoes-picture-id1258142863?b=1&k=20&m=1258142863&s=170667a&w=0&h=iFVeHatKRUPjoAd2YR1Lgjv_74tZ-gTBbT3cOqFy0BI='),
(106, 'cucumber', 50, 'india', 'https://img.freepik.com/free-photo/cucumber-vegetable-isolated-white-background_42033-135.jpg?w=2000'),
(107, 'Grapes', 55, 'india', 'https://s3.amazonaws.com/finecooking.s3.tauntonclud.com/app/uploads/2017/04/24172040/ING-grapes-2.jpg'),
(108, 'Gourd', 52, 'india', 'https://image.shutterstock.com/image-photo/lagenaria-siceraria-isolated-on-white-260nw-352155842.jpg'),
(109, 'pumpkin', 42, 'india', 'https://image.shutterstock.com/z/stock-photo-ripe-ginger-pumpkin-isolated-on-a-burred-unfocussed-grass-background-autumn-concept-with-pumpkin-2035628069.jpg'),
(110, 'blackberry', 70, 'india', 'https://media.istockphoto.com/photos/blackberry-with-leaf-isolated-on-white-picture-id510483812?k=20&m=510483812&s=612x612&w=0&h=NPyl-KKFs29X6qayg_093u5kVMOA9R70I41QYnz7QmQ='),
(111, 'ladyfinger', 40, 'india', 'https://5.imimg.com/data5/PU/LG/MY-52406801/lady-finger-500x500.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_password` varchar(50) DEFAULT NULL,
  `user_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `user_password`, `user_status`) VALUES
('Admin', 'Admin@mail.com', 'Admin@123', 'active'),
('Amit', 'amit@gmail.com', 'amit@123', 'active'),
('Ganesh', 'ganesh@gmail.om', 'ganesh@456', 'active'),
('vishnu', 'kam@gmail.com', 'kamrai@123', 'active'),
('kamal', 'kamal@gmail.com', 'Kamal@123', 'active'),
('karthik', 'karthik@gmail.om', 'karthik@123', 'active'),
('kuber', 'kuber@gmail.com', 'kuber@123', 'active'),
('Parvati', 'parvati@gmail.com', 'parvati@123', 'active'),
('shiva', 'shiva@hotmail.com', 'Shiva@098', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `orders_ibfk_1` (`email`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD KEY `order_items_ibfk_1` (`prod_id`),
  ADD KEY `order_items_ibfk_2` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1025;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
