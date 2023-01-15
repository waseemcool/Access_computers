-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.20 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table access_computers.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(100) NOT NULL DEFAULT 'AUTO_INCREMENT',
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `verification_code` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table access_computers.admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`email`, `fname`, `lname`, `verification_code`) VALUES
	('abdulrahumanmuhammedwaseem@gmail.com', 'Kurundugolla', 'Kurundu', '6240520397beb');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table access_computers.brand
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table access_computers.brand: ~5 rows (approximately)
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` (`id`, `name`) VALUES
	(1, 'Samsung'),
	(2, 'Acer'),
	(3, 'Lenovo'),
	(4, 'ASUS'),
	(5, 'MSI');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;

-- Dumping structure for table access_computers.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `qty` int DEFAULT NULL,
  `datetime_added` datetime DEFAULT NULL,
  `user_email` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cart_user1_idx` (`user_email`),
  KEY `fk_cart_product1_idx` (`product_id`),
  CONSTRAINT `fk_cart_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_cart_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- Dumping data for table access_computers.cart: ~0 rows (approximately)
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;

-- Dumping structure for table access_computers.city
CREATE TABLE IF NOT EXISTS `city` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `district_id` int NOT NULL,
  `postal_code` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_city_district1_idx` (`district_id`),
  CONSTRAINT `fk_city_district1` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table access_computers.city: ~0 rows (approximately)
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` (`id`, `name`, `district_id`, `postal_code`) VALUES
	(1, 'Aladeniya', 1, '12347');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;

-- Dumping structure for table access_computers.colour
CREATE TABLE IF NOT EXISTS `colour` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table access_computers.colour: ~4 rows (approximately)
/*!40000 ALTER TABLE `colour` DISABLE KEYS */;
INSERT INTO `colour` (`id`, `name`) VALUES
	(1, 'Green'),
	(2, 'Blue'),
	(3, 'Silver'),
	(4, 'Grey'),
	(5, 'Jet Black');
/*!40000 ALTER TABLE `colour` ENABLE KEYS */;

-- Dumping structure for table access_computers.condition
CREATE TABLE IF NOT EXISTS `condition` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table access_computers.condition: ~2 rows (approximately)
/*!40000 ALTER TABLE `condition` DISABLE KEYS */;
INSERT INTO `condition` (`id`, `name`) VALUES
	(1, 'Used'),
	(2, 'New');
/*!40000 ALTER TABLE `condition` ENABLE KEYS */;

-- Dumping structure for table access_computers.delivery
CREATE TABLE IF NOT EXISTS `delivery` (
  `id` int NOT NULL AUTO_INCREMENT,
  `address` text,
  `city_id` int NOT NULL,
  `invoice_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_delivery_city1_idx` (`city_id`),
  KEY `fk_delivery_invoice1_idx` (`invoice_id`),
  CONSTRAINT `fk_delivery_city1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  CONSTRAINT `fk_delivery_invoice1` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table access_computers.delivery: ~6 rows (approximately)
/*!40000 ALTER TABLE `delivery` DISABLE KEYS */;
INSERT INTO `delivery` (`id`, `address`, `city_id`, `invoice_id`) VALUES
	(2, '34/1, 1/7, Kurundugolla Werallagama, Aladeniya, Kandy, Sri Lanka ', 1, 3),
	(3, '34/1, 1/1, Kurundugolla Werallagama, Aladeniya, Kandy, Sri Lanka ', 1, 6),
	(4, '37/4, 1/2, Kurundugolla Werallagama, Aladeniya Kandy, Sri Lanka', 1, 8),
	(5, '37/4, 1/2, Kurundugolla Werallagama, Aladeniya Kandy, Sri Lanka', 1, 9),
	(6, '37/4, 1/2, Kurundugolla Werallagama, Aladeniya Kandy, Sri Lanka', 1, 10),
	(7, '37/4, 1/2, Kurundugolla Werallagama, Aladeniya Kandy, Sri Lanka', 1, 11),
	(8, '37/4, 1/2, Kurundugolla Werallagama, Aladeniya Kandy, Sri Lanka', 1, 12),
	(9, '37/4, 1/2, Kurundugolla Werallagama, Aladeniya Kandy, Sri Lanka', 1, 14);
/*!40000 ALTER TABLE `delivery` ENABLE KEYS */;

-- Dumping structure for table access_computers.district
CREATE TABLE IF NOT EXISTS `district` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `province_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_district_province1_idx` (`province_id`),
  CONSTRAINT `fk_district_province1` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- Dumping data for table access_computers.district: ~25 rows (approximately)
/*!40000 ALTER TABLE `district` DISABLE KEYS */;
INSERT INTO `district` (`id`, `name`, `province_id`) VALUES
	(1, 'Kandy', 1),
	(2, 'Ampara', 2),
	(3, 'Colombo', 3),
	(4, 'Kurunegala', 8),
	(5, 'Anuradhapura', 9),
	(6, 'Badulla', 6),
	(7, 'Batticaloa', 2),
	(8, 'Galle', 4),
	(9, 'Gampaha', 3),
	(10, 'Hambanthota', 4),
	(11, 'Jaffna', 5),
	(12, 'Kaluthara', 3),
	(13, 'Kegalle', 7),
	(14, 'Kilinochchi', 5),
	(15, 'Mannar', 5),
	(16, 'Matale', 1),
	(17, 'Matara', 4),
	(18, 'Monaragala', 6),
	(19, 'Mullaitivu', 5),
	(20, 'Nuwara Eliya', 1),
	(21, 'Polannaruwa', 9),
	(22, 'Puttalam', 8),
	(23, 'Ratnapura', 7),
	(24, 'Trincomalee', 2),
	(25, 'Vavuiya', 5);
/*!40000 ALTER TABLE `district` ENABLE KEYS */;

-- Dumping structure for table access_computers.feedback
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  `content` text,
  `datetime_added` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_feedback_user1_idx` (`user_email`),
  KEY `fk_feedback_product1_idx` (`product_id`),
  CONSTRAINT `fk_feedback_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_feedback_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table access_computers.feedback: ~0 rows (approximately)
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;

-- Dumping structure for table access_computers.gender
CREATE TABLE IF NOT EXISTS `gender` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table access_computers.gender: ~2 rows (approximately)
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` (`id`, `name`) VALUES
	(1, 'Male'),
	(2, 'Female');
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;

-- Dumping structure for table access_computers.invoice
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  `order_id` varchar(30) DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `total` double DEFAULT NULL,
  `datetime_added` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_invoice_user1_idx` (`user_email`),
  KEY `fk_invoice_product1_idx` (`product_id`),
  CONSTRAINT `fk_invoice_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_invoice_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Dumping data for table access_computers.invoice: ~12 rows (approximately)
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` (`id`, `user_email`, `product_id`, `order_id`, `qty`, `total`, `datetime_added`) VALUES
	(1, 'abdulrahumanmuhammedwaseem@gmail.com', 1, '618ec0dd944d9', 1, 123100, '2021-11-13 01:01:04'),
	(2, 'abdulrahumanmuhammedwaseem@gmail.com', 1, '618ec8edc8045', 1, 123100, '2021-11-13 01:35:30'),
	(3, 'abdulrahumanmuhammedwaseem@gmail.com', 1, '618ece438587b', 1, 123100, '2021-11-13 01:58:27'),
	(4, 'abdulrahumanmuhammedwaseem@gmail.com', 1, '618f9b054219c', 1, 123100, '2021-11-13 16:32:14'),
	(6, 'abdulrahumanmuhammedwaseem@gmail.com', 1, '618f9f982575b', 1, 123100, '2021-11-13 16:51:47'),
	(7, 'abdulrahumanmuhammedwaseem@gmail.com', 2, '618f9f982575b', 1, 115000, '2021-11-13 16:51:47'),
	(8, 'abdulrahumanmuhammedwaseem@gmail.com', 1, '619387a66c5c2', 1, 123100, '2021-11-16 15:59:08'),
	(9, 'abdulrahumanmuhammedwaseem@gmail.com', 42, '61938b1c72576', 1, 88500, '2021-11-16 16:13:01'),
	(10, 'abdulrahumanmuhammedwaseem@gmail.com', 42, '619393670ad69', 1, 88500, '2021-11-16 16:48:42'),
	(11, 'abdulrahumanmuhammedwaseem@gmail.com', 47, '61a1fadfb7d2d', 1, 100000, '2021-11-27 15:02:21'),
	(12, 'abdulrahumanmuhammedwaseem@gmail.com', 1, '61a2207e95956', 1, 123100, '2021-11-27 17:42:28'),
	(13, 'abdulrahumanmuhammedwaseem@gmail.com', 2, '61a2207e95956', 1, 115000, '2021-11-27 17:42:28'),
	(14, 'abdulrahumanmuhammedwaseem@gmail.com', 1, '61c8b088dba1e', 2, 246200, '2021-12-26 23:45:04');
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;

-- Dumping structure for table access_computers.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `description` text,
  `price` double DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `datetime_added` datetime DEFAULT NULL,
  `image` varchar(160) DEFAULT NULL,
  `delivery_fee_kandy` double DEFAULT NULL,
  `delivery_fee_other` double DEFAULT NULL,
  `colour_id` int NOT NULL,
  `brand_id` int NOT NULL,
  `condition_id` int NOT NULL,
  `status_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_products_colour1_idx` (`colour_id`),
  KEY `fk_product_brand1_idx` (`brand_id`),
  KEY `fk_product_condition1_idx` (`condition_id`),
  KEY `fk_product_status1_idx` (`status_id`),
  CONSTRAINT `fk_product_brand1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  CONSTRAINT `fk_product_condition1` FOREIGN KEY (`condition_id`) REFERENCES `condition` (`id`),
  CONSTRAINT `fk_product_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `fk_products_colour1` FOREIGN KEY (`colour_id`) REFERENCES `colour` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- Dumping data for table access_computers.product: ~44 rows (approximately)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `title`, `description`, `price`, `qty`, `datetime_added`, `image`, `delivery_fee_kandy`, `delivery_fee_other`, `colour_id`, `brand_id`, `condition_id`, `status_id`) VALUES
	(1, 'Acer Aspire 5 A515', 'Intel core i3 1115G4 | \nWindows 10 Home | \n4 GB DDR 4 | \n15.6" FHD Screen | \n1 TB HDD + SSD upgradable | \nShared VGA | \nSilver', 123100, 35, '2021-11-05 21:38:59', 'resources//products//6185571b5509claptop2 (1).png', 300, 350, 1, 2, 1, 1),
	(2, 'Lenovo Ideapad 3 15ITL05', 'Intel Core i3-1115G4 3.0GHz | \n128GB SSD Hard Drive | \n4GB DDR4 Ram | \n15.6″ (1920×1080) | \nABYSS BLUE | \nFinger Print Reader | \nWindows 10', 115000, 25, '2021-11-06 20:17:53', 'resources//products//61869599dbbe2laptop4 (1).png', 200, 250, 2, 3, 2, 1),
	(5, 'Acer Swift 3 SF314', 'AMD Ryzen 5 5500u Processor | \n8GB DDR4 RAM | \n512GB SSD NVME | \nBACKLIT KEYBOARD,FP | \nWindows 10 Home', 180000, 10, '2021-11-07 02:22:01', 'resources//products//6186eaf161363laptop11(1).png', 300, 300, 4, 2, 1, 1),
	(6, 'Acer A315', '4GB | \n1TB | \nWindows 10 Home | \nIntel® Core™ i3-1115G4 | \nUHD Graphics | \n39.6 cm (15.6") | \nDisplay Screen Type - LCD | \nDisplay Screen Technology - ComfyView | \nScreen Mode - HD\nBacklight Technology - LED\nScreen Resolution - 1920 x 1080', 120000, 7, '2021-11-07 02:46:01', 'resources//products//6186f091397dflaptop12.jpg', 300, 350, 5, 2, 2, 1),
	(7, 'Lenovo V15-IIL', '10th Generation Intel core i3-1005G1 processor, 1.2 Ghz base speed | \n4GB DDR4 RAM | \n1TB SATA Hard Drive | \n15.6″ HD Display | \nDOS', 157000, 5, '2021-11-07 02:55:27', 'resources//products//6186f2c731d0flaptop13.jpg', 300, 350, 1, 3, 2, 1),
	(8, 'Lenovo Ideapad Gaming 3', 'Intel Core i5-10300H (2,50-4,50GHz) Processor | \n15.6" FHD (1920x1080) IPS 120Hz 250nits Anti-glare | \nNVIDIA® GeForce® GTX 1650 4GB GDDR6 | \n8GB RAM DDR4-2933 Memory ram + Upgradable | \n1TB SATA HDD +256GB M.2 PCIe 3.0 x4 SSD | \nWindows 10 Home 64, English | \nIntegrated Li-Polymer 45Wh battery | \nStereo speakers with Dolby Audio technology | \nBlue backlit gaming keyboard | \nLaptop color Onyx black', 228000, 4, '2021-11-07 03:04:29', 'resources//products//6186f4e592585laptop14.jpg', 200, 250, 2, 3, 2, 1),
	(9, 'ASUS Expertbook B1500', 'Intel Core i7-1165G7 Processor | \nWindows 10 HOME | \n8GB DDR4 Ram | \n1TB Hard Drive | \nIntel UHD Graphics | \n15.6-inch FHD Display | \nDos', 280000, 3, '2021-11-07 03:19:10', 'resources//products//6186f85676fbalaptop15.jpg', 100, 150, 3, 4, 2, 1),
	(10, 'ASUS TUF Gaming F15 FX506LH', 'Intel Core i5-10300H 2.70GHz 11th Gen Processor | \nWindows 10 Home 64 Bit | \n8GB DDR4 Ram | \n512GB M.2 NVMe PCIe 3.0 SSD | \n4GB Nvidia GTX 1650 Vga | \n15.6″ FHD Display 144Hz | \nTUF Gaming backpack M5 Mouse', 244000, 2, '2021-11-07 03:30:11', 'resources//products//6186faeb1c361laptop16.jpg', 100, 150, 4, 4, 2, 1),
	(11, 'MSI Modern 15 A11M', 'Intel® Core™ i5 1135G7 Processor | \nWindows 10 Home | \n15.6″ FHD (1920×1080), IPS-Level | \nIntel® Iris® Xe Graphics | \n8GB Ram DDR4-3200 Memory | \n512GB NVMe SSD', 210000, 1, '2021-11-07 03:40:09', 'resources//products//6186fd417edf5laptop17.jpg', 200, 250, 5, 5, 2, 1),
	(13, 'ASUS Vivobook K513', 'Intel Core i3-1115G4 Processor | \nWindows 10 | \n512GB M.2 SSD Hard Drive | \n4GB DDR4 Ram | \nIntel UHD Graphics | \n15.6″ OLED Display', 150000, 20, '2021-11-16 10:24:52', 'resources//products//6193399ccfa3alaptop19.jpg', 150, 200, 3, 4, 2, 1),
	(14, 'Acer A315-R4YE - AMD Notebook', 'Aspire 3 | \nWindows 10 | \nAMD Athlon Silver 3050U Processor | \n4GB DDR4 Memory | \n15.6″ HD Acer Comfy View LCD | \n1TB Hard Disk', 88500, 15, '2021-11-16 11:31:57', 'resources//products//619349551c5eelaptop21.png', 300, 350, 5, 2, 2, 1),
	(15, 'Acer Aspire A515 - 56 - 30FS', 'Model Acer Aspire 5 A5 15-56-38VC | \nWindows 10 Home 64 Bit | \nMicroprocessor Intel Core i3 3.0 / 4.1GHz (1115G4) | \nVideo graphics Intel UHD Graphics | \nHard drive 256GB SSD NVME | \nRAM Memory 4GB DDR4 | \nOperating system DOS | \nDisplay (inchs) 15.6” | \nScreen Type FHD', 130000, 16, '2021-11-16 11:39:23', 'resources//products//61934b13f12dalaptop23.jpg', 300, 350, 5, 2, 2, 1),
	(16, 'Acer A515', 'Acer Aspire 5 A515 | \nWindows 10 Home | \nIntel core i7 1165G7 Processor | \n1TB HDD | \n8GB DDR 4 | \n15.6 FHD IPS Screen |\nNVIDIA 2GB MX350 Graphics | \nBacklit keyboard\n', 242000, 14, '2021-11-16 11:44:17', 'resources//products//61934c3936beelaptop22.jpg', 200, 250, 3, 2, 2, 1),
	(17, 'Acer Nitro 5', 'Intel Core i5-11300H | \n8GB DDR4 Ram | \n512GB SSD NVME | \n15.6″ FHD (1920 x 1080) 144Hz IPS Panel | \nGeforce GTX 1650 4GB DDR6 | \nWindows 10 64Bit Pre-installed', 241000, 5, '2021-11-16 11:49:13', 'resources//products//61934d6199270laptop24.jpg', 200, 250, 5, 2, 2, 1),
	(18, 'Lenovo Ideapad 3 15ITL05', 'Intel Core i3-1115G4 3.0GHz | \nWindows 10 | \n128GB SSD Hard Drive| \n4GB DDR4 Ram | \n15.6″ (1920×1080) | \nABYSS BLUE | \nFinger Print Reader\n', 115000, 16, '2021-11-16 12:08:22', 'resources//products//619351de7c523laptop25.jpg', 300, 350, 2, 3, 2, 1),
	(19, 'Lenovo Ideapad Gaming 3 15IHU6', 'Intel Core i5-11300H (Up to 4.4 GHz /4C/ 8T) Processor | \n15.6" FHD (1920x1080) IPS 120Hz 250nits Anti-glare | \nNVIDIA® GeForce® RTX3050 4GB GDDR6 Graphics |\n8GB RAM DDR4-3200 Memory ram + Upgradable | \n1TB SATA HDD + 256GB M.2 PCIe 3.0 x4 SSD | \nWindows 10 Home 64, English | \nIntegrated Li-Polymer 45Wh battery | \nStereo speakers with Dolby Audio technology | \nbacklit gaming keyboard | \nLaptop color Onyx black', 266000, 8, '2021-11-16 12:12:57', 'resources//products//619352f1ee73dlaptop26.jpg', 200, 250, 5, 3, 2, 1),
	(20, 'Lenovo Ideapad 3', 'Operating System Windows 10 | \n11th Generation | \nIntel Core i3 | \nSpecific uses for product Personal, Gaming, Business | \nScreen size 15.6 Inches | \nINTEL GRAPHICS | \nRAM 4GB | \nHARD 128 SSD', 130500, 10, '2021-11-16 12:20:09', 'resources//products//619354a14a5b3laptop27.jpg', 300, 350, 4, 3, 2, 1),
	(21, 'Lenovo IdeaPad 3', 'Intel Celeron N4020 | \n15.6" (39.62cms) | \nHD Thin and Light Laptop (4GB/1TB/DOS) | \nSpecific Uses For Product - Personal, Business | \nOperating System - DOS Device interface - primary | \nAnti reflective colour | \nBusiness black connector type - USB, HDMI', 93500, 17, '2021-11-16 12:29:24', 'resources//products//619356cc5e91alaptop28.jpg', 300, 350, 5, 3, 2, 1),
	(22, 'Lenovo IdeaPad Slim 3 15ITL6', '11th Gen Intel Core i5-1135G7 (4C / 8T, 2.4 / 4.2GHz, 8MB) Processor | \nWindows 10 Home | \nIntel Integrated Iris Xe Graphics |\n15.6" FHD IPS (1920x1080) 300 nits Anti-glare 45% NTSC | \n8GB SO-DIMM DDR4-3200Mhz Memory | \n512GB SSD M.2 2280 PCIe 3.0x4 NVMe | \nNVIDIA GeForce MX350 2GB GDDR5 | \nBacklit Keyboard English', 180000, 10, '2021-11-16 12:35:59', 'resources//products//619358572d37elaptop42.jpg', 200, 250, 4, 3, 2, 1),
	(23, 'ASUS Expertbook L1500', 'Ryzen 3 3250U | \n4GB DDR4 RAM | \n256 GB SSD NVME | \nAMD Radeon Graphics | \n15.6-inch FHD Display | \nDos', 130500, 20, '2021-11-16 12:41:06', 'resources//products//6193598ad7859laptop29.jpg', 300, 350, 2, 4, 2, 1),
	(24, 'ASUS X515E', 'Intel Core i3-1115G4 Processor\nWindows 10 Home | \n256GB SSD Hard Drive | \n4GB DDR4 Ram | \n15.6″ FHD (1920X1080) Display | \nWebCam & Bluetooth | \nBaklit Keyboard | \nSlate Gray Colour', 137000, 12, '2021-11-16 12:44:40', 'resources//products//61935a6089e4dlaptop30.jpg', 300, 350, 4, 4, 2, 1),
	(25, 'ASUS ZenBook 14', 'Intel Core i7-1165G7 Processor 2.8 GHz | \nWindows 10 Home | \n16GB LPDDR4X Ram | \n1TB M.2 NVMe PCIe | \n14.0″ IPS level Touch Display | \n2GB GDDR6 NVIDIA GeForce MX450 + Iris Xe Graphics | \nSleeve and Pine Grey Color', 358000, 4, '2021-11-16 12:48:40', 'resources//products//61935b50e0805laptop31.jpg', 200, 250, 4, 4, 2, 1),
	(26, 'ASUS Expert Book', 'Intel Core i7-1165G7 Processor | \nWindows 10 Pro | \n16GB LPDDR4X Ram | \n1TB M.2 NVMe SSD Hard Drive | \nIntel Iris Xe Graphics | \n14.0″ FHD Display | \nFinger Print | \nBacklit Chiclet Keyboard | \n720p HD camera With privacy shutter | \nBlue Colour', 424000, 3, '2021-11-16 12:53:38', 'resources//products//61935c7a13e38laptop32.jpg', 200, 250, 2, 4, 2, 1),
	(27, 'ASUS Vivo Book 15 K513EA', 'Laptop ASUS Vivo Book K513EA-BN800 Model | \nIntel® Core™ i5-1135G7 (8M Cache, up to 4.2 GHz, 4 cores) Processor | \nintel Iris Xᵉ Graphics | \n15.6" FHD (1920 x 1080) 16:9, Anti-glare display | \n4GB DDR4 on board + 4GB DDR4 SO-DIMM | \n512GB M.2 NVMe™ PCIe® 3.0 SSD | \nWi- Fi 6(802.11ax )+ Bluetooth 5.0 | \nbuilt-in fingerprint sensor | \nChiclet Keyboard with Num-key | \n42WHrs, 3-cell Li-ion | \nWithout OS', 190000, 10, '2021-11-16 12:58:45', 'resources//products//61935dad457bdlaptop33.jpg', 200, 250, 5, 4, 2, 1),
	(28, 'ASUS Vivo Book S15', 'Core i7-1165G7 | \n16GB RAM | \n512GB SSD | \nMX350 Graphics | \nBacklit Fingerprint | \n15.6" Full HD IPS screen', 270000, 3, '2021-11-16 13:07:54', 'resources//products//61935fd2d10d2laptop34.jpg', 200, 250, 4, 4, 2, 1),
	(29, 'ASUS Flip BR1100', 'Intel Celeron N4500 Processor 1.1 GHz | \nWindows 10 Home | \n4GB DDR4 Ram | \n128GB M.2 NVMe SSD | \nIntel UHD Graphics | \nTouch screen 11.6″ LCD HD Display | \nTouch X360 And Pen Included', 110000, 21, '2021-11-16 13:12:20', 'resources//products//619360dcae028laptop35.jpg', 300, 350, 4, 4, 2, 1),
	(30, 'ASUS Vivo Book 15', 'Intel®️ Core™️ i3-1115G4 Processor 3.0 GHz | \n15.6-inch IPS Level Display | \n4GB DDR4 on board | \n512GB M.2 NVMe™️ PCIe®️ 3.0 SSD1x HDMI 1.4 | \n1x Headphone out//1x USB 3.2 Gen 1 Type-A | \n1x USB 3.2 Gen 1 Type-C | \n2x USB 2.0 Type-A//Micro SD card reader | \nFingerPrint | \nBacklit Chiclet Keyboard with Num-key | \nWindows 10 Home | \nIntel Wi-Fi 6(Gig+)(802.11ax)+Bluetooth 5.0 (Dual band) 2*2\nAudio by ICEpower®️ | \nBuilt-in speaker/Built-in microphone | \nBackpack', 150000, 10, '2021-11-16 13:18:16', 'resources//products//61936240a1f01laptop36.jpg', 200, 250, 4, 4, 2, 1),
	(31, 'ASUS Vivo Book 15 M513', 'AMD Ryzen 5 5500U Processor | \nWindows 10 | \n512GB M.2 SSD Hard Drive | \n8GB DDR4 Ram | \nAMD Graphics | \n15.6″ OLED Display', 200000, 8, '2021-11-16 13:21:23', 'resources//products//619362fbe45fflaptop37.jpg', 200, 250, 5, 4, 2, 1),
	(32, 'MSI Modern 15 A11M', 'Intel Core i7-1165G7 Processor | \nWindows 10 Home | \n8GB DDR4 Ram | \n512GB Nvme M.2 SSD Hard Drive | \nIntel iris Xe Graphics | \n15.6″ FHD IPS (1920×1080) Display 60HZ | \nBacklit keyboard | \nColour Silver', 250000, 7, '2021-11-16 13:24:55', 'resources//products//619363cfd49ablaptop38.jpg', 200, 250, 3, 5, 2, 1),
	(33, 'MSI Modern 15 A11M', 'Intel Core i7-1165G7 Processor | \nWindows 10 Home | \n8GB DDR4 Ram | \n512GB Nvme M.2 SSD Hard Drive | \nIntel iris Xe Graphics | \n15.6″ FHD IPS (1920×1080) Display 60HZ | \nBacklit keyboard | \nColour Silver', 237000, 8, '2021-11-16 13:28:50', 'resources//products//619364ba1efd4laptop39.jpg', 200, 250, 3, 5, 2, 1),
	(34, 'MSI GF63 THIN 10SCSR', 'CPU 10th Gen. Intel® Core™ i5 Processor | \nOS Windows 10 Home | \nDISPLAY 15.6" FHD (1920x1080), IPS-Level | \nCHIPSET Intel® HM470 | \nGRAPHICS NVIDIA® GeForce® GTX 1650 With Max-Q Design |  4GB GDDR6', 213000, 15, '2021-11-16 13:34:58', 'resources//products//6193662a35802laptop40.jpg', 200, 250, 5, 5, 2, 1),
	(35, 'MSI GF63 Thin 10SC-243', '39.6 cm (15.6") Notebook, without OS | \nDisplay: 1920 x 1080, IPS, WideView, non-glare | \nIntel Core™ i7-10500H 6x 2.50 GHz | \nNVIDIA® GeForce® GTX 1650TI Max-Q 4.0 GB | \n8 GB RAM, 1TB HARD | \n1x USB 3.1 Gen1 Typ C, 3x USB 3.1 Gen1, Wi-Fi 6 (802.11ax)', 262000, 3, '2021-11-16 13:38:57', 'resources//products//6193671900945laptop41.jpg', 200, 250, 5, 5, 2, 1),
	(36, 'Acer Aspire A515', 'Intel core i3 1115G4 | \nWindows 10 Home | \n4 GB DDR 4 | \n15.6" FHD Screen | \n1 TB HDD + SSD upgradable | \nShared VGA | \nSilver', 123100, 1, '2021-11-16 13:49:13', 'resources//products//6193698193335laptop2.jpg', 300, 350, 3, 2, 2, 1),
	(37, 'Acer Aspire A515', 'Intel core i3 1115G4 | \nWindows 10 Home | \n4 GB DDR 4 | \n15.6" FHD Screen | \n1 TB HDD + SSD upgradable | \nShared VGA | \nSilver', 123100, 1, '2021-11-16 13:49:40', 'resources//products//6193699ced44elaptop2.jpg', 300, 350, 3, 2, 2, 1),
	(38, 'Acer Aspire A515', 'Intel core i3 1115G4 | \nWindows 10 Home | \n4 GB DDR 4 | \n15.6" FHD Screen | \n1 TB HDD + SSD upgradable | \nShared VGA | \nSilver', 123100, 1, '2021-11-16 13:49:44', 'resources//products//619369a005328laptop2.jpg', 300, 350, 3, 2, 2, 1),
	(39, 'Acer Aspire A515', 'Intel core i3 1115G4 | \nWindows 10 Home | \n4 GB DDR 4 | \n15.6" FHD Screen | \n1 TB HDD + SSD upgradable | \nShared VGA | \nSilver', 123100, 1, '2021-11-16 13:49:46', 'resources//products//619369a2624balaptop2.jpg', 300, 350, 3, 2, 2, 1),
	(40, 'Acer Aspire A515', 'Intel core i3 1115G4 | \nWindows 10 Home | \n4 GB DDR 4 | \n15.6" FHD Screen | \n1 TB HDD + SSD upgradable | \nShared VGA | \nSilver', 123100, 1, '2021-11-16 13:49:48', 'resources//products//619369a4c10f9laptop2.jpg', 300, 350, 3, 2, 2, 1),
	(41, 'Acer Aspire A515', 'Intel core i3 1115G4 | \nWindows 10 Home | \n4 GB DDR 4 | \n15.6" FHD Screen | \n1 TB HDD + SSD upgradable | \nShared VGA | \nSilver', 123100, 1, '2021-11-16 13:49:51', 'resources//products//619369a749956laptop2.jpg', 300, 350, 3, 2, 2, 1),
	(42, 'Acer A315-R4YE - AMD Notebook', 'Aspire 3 | \nWindows 10 | \nAMD Athlon Silver 3050U Processor | \n4GB DDR4 Memory | \n15.6″ HD Acer Comfy View LCD | \n1TB Hard Disk', 88500, 15, '2021-11-16 14:13:42', 'resources//products//61936f3eb1bbdlaptop21.png', 300, 350, 5, 2, 2, 1),
	(43, 'Acer A515', 'Model Acer Aspire 5 A5 15-56-38VC | \nWindows 10 Home 64 Bit | \nMicroprocessor Intel Core i3 3.0 / 4.1GHz (1115G4) | \nVideo graphics Intel UHD Graphics | \nHard drive 256GB SSD NVME | \nRAM Memory 4GB DDR4 | \nOperating system DOS | \nDisplay (inchs) 15.6” | \nScreen Type FHD', 242000, 16, '2021-11-16 14:15:41', 'resources//products//61936fb5aa65alaptop22.jpg', 200, 200, 3, 2, 2, 1),
	(44, 'Acer Nitro 5', 'Intel Core i5-11300H | \n8GB DDR4 Ram | \n512GB SSD NVME | \n15.6″ FHD (1920 x 1080) 144Hz IPS Panel | \nGeforce GTX 1650 4GB DDR6 | \nWindows 10 64Bit Pre-installed', 241000, 5, '2021-11-16 14:19:39', 'resources//products//619370a39cae3laptop24.jpg', 200, 200, 5, 2, 2, 1),
	(45, 'Acer Aspire A515', '1TB\n8GB RAM\nCore i7\n11th Generation', 140000, 20, '2021-11-16 16:04:02', 'resources//products//6193891a2ad55laptop36.jpg', 200, 400, 3, 2, 2, 1),
	(46, 'MSI ', '1 TB\n8 GB RAM\ncore i9', 150000, 100, '2021-11-16 16:16:34', 'resources//products//61938c0aeb31dlaptop41.jpg', 400, 800, 5, 5, 2, 1),
	(47, 'Acer Aspire A515', 'Celeron N4500 Speed: 1.1GHz | \nRAM: 4GB | \n128GB eMMC | \nWindows 10 Home in S Mode | \n15.6 FHD Display', 100000, 2, '2021-11-16 16:53:13', 'resources//products//619394a141205laptop20.jpg', 300, 300, 3, 2, 2, 1);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Dumping structure for table access_computers.profile_image
CREATE TABLE IF NOT EXISTS `profile_image` (
  `code` varchar(200) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`code`),
  KEY `fk_profile_image_user1_idx` (`user_email`),
  CONSTRAINT `fk_profile_image_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table access_computers.profile_image: ~0 rows (approximately)
/*!40000 ALTER TABLE `profile_image` DISABLE KEYS */;
INSERT INTO `profile_image` (`code`, `user_email`) VALUES
	('resources//userprofile_photos//61938b5c6bf35Kurundugolla2.jpeg', 'abdulrahumanmuhammedwaseem@gmail.com');
/*!40000 ALTER TABLE `profile_image` ENABLE KEYS */;

-- Dumping structure for table access_computers.province
CREATE TABLE IF NOT EXISTS `province` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table access_computers.province: ~8 rows (approximately)
/*!40000 ALTER TABLE `province` DISABLE KEYS */;
INSERT INTO `province` (`id`, `name`) VALUES
	(1, 'Central'),
	(2, 'Eastern'),
	(3, 'Western'),
	(4, 'Southern'),
	(5, 'Northern'),
	(6, 'Uva'),
	(7, 'Sabaragamuwa'),
	(8, 'North Western'),
	(9, 'North Central');
/*!40000 ALTER TABLE `province` ENABLE KEYS */;

-- Dumping structure for table access_computers.recent
CREATE TABLE IF NOT EXISTS `recent` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_recent_user1_idx` (`user_email`),
  KEY `fk_recent_product1_idx` (`product_id`),
  CONSTRAINT `fk_recent_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_recent_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Dumping data for table access_computers.recent: ~11 rows (approximately)
/*!40000 ALTER TABLE `recent` DISABLE KEYS */;
INSERT INTO `recent` (`id`, `user_email`, `product_id`) VALUES
	(2, 'abdulrahumanmuhammedwaseem@gmail.com', 2),
	(4, 'abdulrahumanmuhammedwaseem@gmail.com', 7),
	(5, 'abdulrahumanmuhammedwaseem@gmail.com', 8),
	(6, 'abdulrahumanmuhammedwaseem@gmail.com', 42),
	(7, 'abdulrahumanmuhammedwaseem@gmail.com', 31),
	(8, 'abdulrahumanmuhammedwaseem@gmail.com', 47),
	(9, 'abdulrahumanmuhammedwaseem@gmail.com', 44),
	(10, 'abdulrahumanmuhammedwaseem@gmail.com', 43),
	(11, 'abdulrahumanmuhammedwaseem@gmail.com', 1),
	(12, 'abdulrahumanmuhammedwaseem@gmail.com', 45),
	(13, 'abdulrahumanmuhammedwaseem@gmail.com', 39);
/*!40000 ALTER TABLE `recent` ENABLE KEYS */;

-- Dumping structure for table access_computers.status
CREATE TABLE IF NOT EXISTS `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table access_computers.status: ~2 rows (approximately)
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` (`id`, `name`) VALUES
	(1, 'Active'),
	(2, 'Deactive');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;

-- Dumping structure for table access_computers.user
CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(100) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `registered_date` datetime DEFAULT NULL,
  `image` text,
  `v_code` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `gender_id` int NOT NULL,
  `v_status_id` int NOT NULL,
  `status_id` int NOT NULL,
  PRIMARY KEY (`email`),
  KEY `fk_user_gender1_idx` (`gender_id`),
  KEY `fk_user_v_status1_idx` (`v_status_id`),
  KEY `fk_user_status1_idx` (`status_id`),
  CONSTRAINT `fk_user_gender1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  CONSTRAINT `fk_user_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `fk_user_v_status1` FOREIGN KEY (`v_status_id`) REFERENCES `v_status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table access_computers.user: ~1 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`email`, `fname`, `lname`, `password`, `dob`, `registered_date`, `image`, `v_code`, `gender_id`, `v_status_id`, `status_id`) VALUES
	('abdulrahumanmuhammedwaseem@gmail.com', 'Abdul Rahman', 'Muhammed Waseem', 'kurundugolla347', '2001-05-04', '2021-11-01 02:05:29', NULL, '617efe11a3fa3', 1, 1, 1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table access_computers.user_has_address
CREATE TABLE IF NOT EXISTS `user_has_address` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL,
  `line1` text,
  `line2` text,
  `city_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_has_address_user1_idx` (`user_email`),
  KEY `fk_user_has_address_city1_idx` (`city_id`),
  CONSTRAINT `fk_user_has_address_city1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  CONSTRAINT `fk_user_has_address_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table access_computers.user_has_address: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_has_address` DISABLE KEYS */;
INSERT INTO `user_has_address` (`id`, `user_email`, `line1`, `line2`, `city_id`) VALUES
	(1, 'abdulrahumanmuhammedwaseem@gmail.com', '37/4, 1/2, Kurundugolla Werallagama, Aladeniya', 'Kandy, Sri Lanka', 1);
/*!40000 ALTER TABLE `user_has_address` ENABLE KEYS */;

-- Dumping structure for table access_computers.v_status
CREATE TABLE IF NOT EXISTS `v_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table access_computers.v_status: ~2 rows (approximately)
/*!40000 ALTER TABLE `v_status` DISABLE KEYS */;
INSERT INTO `v_status` (`id`, `name`) VALUES
	(1, 'Verified'),
	(2, 'Not Verified');
/*!40000 ALTER TABLE `v_status` ENABLE KEYS */;

-- Dumping structure for table access_computers.watchlist
CREATE TABLE IF NOT EXISTS `watchlist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `datetime_added` datetime DEFAULT NULL,
  `user_email` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_watchlist_user1_idx` (`user_email`),
  KEY `fk_watchlist_product1_idx` (`product_id`),
  CONSTRAINT `fk_watchlist_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_watchlist_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table access_computers.watchlist: ~1 rows (approximately)
/*!40000 ALTER TABLE `watchlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `watchlist` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
