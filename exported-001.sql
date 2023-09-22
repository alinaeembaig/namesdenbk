-- MySQL dump 10.13  Distrib 8.0.34, for Linux (x86_64)
--
-- Host: localhost    Database: staging_namesden
-- ------------------------------------------------------
-- Server version	8.0.34-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `version` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_translations`
--

DROP TABLE IF EXISTS `page_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `page_translations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `page_id` int NOT NULL,
  `locale` varchar(50) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `route` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `page_id` (`page_id`,`locale`),
  CONSTRAINT `page_translations_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_translations`
--

LOCK TABLES `page_translations` WRITE;
/*!40000 ALTER TABLE `page_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `page_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `layout` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `data` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `setting` varchar(50) NOT NULL,
  `value` mediumtext NOT NULL,
  `is_array` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting` (`setting`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_ads`
--

DROP TABLE IF EXISTS `tbl_ads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_ads` (
  `id` int NOT NULL DEFAULT '1',
  `homepage_banner_720x90` text,
  `blog_page_720x90` text,
  `blog_300x250` text,
  `blog__post_page_720x90` text,
  `blog__post_page_300x250` text,
  `webpage_banner_720x90` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ads`
--

LOCK TABLES `tbl_ads` WRITE;
/*!40000 ALTER TABLE `tbl_ads` DISABLE KEYS */;
INSERT INTO `tbl_ads` VALUES (1,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tbl_ads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_announcement`
--

DROP TABLE IF EXISTS `tbl_announcement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_announcement` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `announcement_heading` varchar(250) NOT NULL,
  `announcement` text,
  `announcement_type` varchar(250) NOT NULL,
  `group_id` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_announcement`
--

LOCK TABLES `tbl_announcement` WRITE;
/*!40000 ALTER TABLE `tbl_announcement` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_announcement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bids`
--

DROP TABLE IF EXISTS `tbl_bids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_bids` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `listing_id` int NOT NULL,
  `listing_type` varchar(250) NOT NULL,
  `bidder_id` int NOT NULL,
  `owner_id` int NOT NULL,
  `bid_amount` float NOT NULL,
  `bid_status` int NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bids`
--

LOCK TABLES `tbl_bids` WRITE;
/*!40000 ALTER TABLE `tbl_bids` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_bids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_blog`
--

DROP TABLE IF EXISTS `tbl_blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_blog` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `metadescription` text NOT NULL,
  `metakeywords` text NOT NULL,
  `blog_post` text NOT NULL,
  `blog_tags` text NOT NULL,
  `thumbnail` text,
  `date` datetime NOT NULL,
  `status` int NOT NULL,
  `views` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_blog`
--

LOCK TABLES `tbl_blog` WRITE;
/*!40000 ALTER TABLE `tbl_blog` DISABLE KEYS */;
INSERT INTO `tbl_blog` VALUES (1,'Attract Sales And Profits','attract-sales-and-profits','Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec. Quisque bibendum orci ac nibh facilisis, at malesuada orci congue. Nullam tempus so','[\"assets\",\" domains\"]','<h4 style=\"margin-bottom: 17px; border: none; outline: none; font-size: 18px; line-height: 24px; position: relative; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(32, 33, 36); font-family: Jost, sans-serif;\">Course Description</h4><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 15px; color: rgb(119, 131, 143); line-height: 30px; font-family: Jost, sans-serif;\">Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec. Quisque bibendum orci ac nibh facilisis, at malesuada orci congue. Nullam tempus sollicitudin cursus. Ut et adipiscing erat. Curabitur this is a text link libero tempus congue.</p><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 15px; color: rgb(119, 131, 143); line-height: 30px; font-family: Jost, sans-serif;\">Duis mattis laoreet neque, et ornare neque sollicitudin at. Proin sagittis dolor sed mi elementum pretium. Donec et justo ante. Vivamus egestas sodales est, eu rhoncus urna semper eu. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer tristique elit lobortis purus bibendum, quis dictum metus mattis. Phasellus posuere felis sed eros porttitor mattis. Curabitur massa magna, tempor in blandit id, porta in ligula. Aliquam laoreet nisl massa, at interdum mauris sollicitudin et.</p>','[\"assets\",\" domains\"]','blog-list-1.png','2022-12-08 07:45:42',1,17),(2,'Attract Sales And Profits','attract-sales-and-profits','Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec. Quisque bibendum orci ac nibh facilisis, at malesuada orci congue. Nullam tempus so','[\"assets\",\" domains\"]','<h4 style=\"margin-bottom: 17px; border: none; outline: none; font-size: 18px; line-height: 24px; position: relative; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(32, 33, 36); font-family: Jost, sans-serif;\">Course Description</h4><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 15px; color: rgb(119, 131, 143); line-height: 30px; font-family: Jost, sans-serif;\">Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec. Quisque bibendum orci ac nibh facilisis, at malesuada orci congue. Nullam tempus sollicitudin cursus. Ut et adipiscing erat. Curabitur this is a text link libero tempus congue.</p><p style=\"margin-right: 0px; margin-bottom: 30px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 15px; color: rgb(119, 131, 143); line-height: 30px; font-family: Jost, sans-serif;\">Duis mattis laoreet neque, et ornare neque sollicitudin at. Proin sagittis dolor sed mi elementum pretium. Donec et justo ante. Vivamus egestas sodales est, eu rhoncus urna semper eu. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer tristique elit lobortis purus bibendum, quis dictum metus mattis. Phasellus posuere felis sed eros porttitor mattis. Curabitur massa magna, tempor in blandit id, porta in ligula. Aliquam laoreet nisl massa, at interdum mauris sollicitudin et.</p>','[\"assets\",\" domains\"]','blog-list-2.png','2022-12-08 07:45:42',1,0);
/*!40000 ALTER TABLE `tbl_blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_categories`
--

DROP TABLE IF EXISTS `tbl_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `c_name` varchar(250) NOT NULL,
  `c_description` varchar(250) NOT NULL,
  `c_keywords` text NOT NULL,
  `c_thumb` varchar(250) NOT NULL,
  `c_level` int NOT NULL,
  `url_slug` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_categories`
--

LOCK TABLES `tbl_categories` WRITE;
/*!40000 ALTER TABLE `tbl_categories` DISABLE KEYS */;
INSERT INTO `tbl_categories` VALUES (2,'Amazon Merch','Amazon Merch','[\"AmazonMerch\"]','1.png',0,'amazon-merch'),(3,'All Monitizations','All Monitizations','[\"All Monitizations\"]','2.png',0,'all-monitizations'),(4,'Amazon KDP','Amazon KDP','[\"Amazon KDP\"]','3.png',0,'amazon-kdp'),(5,'Application','Application','[\"Application\"]','4.png',0,'application'),(6,'Affiliate','Affiliate','[\"Affiliate\"]','5.png',0,'affiliate'),(7,'Amazon FBM','Amazon FBM','[\"AmazonFBM\"]','6.png',0,'amazon-fbm'),(8,'Amazon Associates','Amazon Associates','[\"AmazonAssociates\"]','7.png',0,'amazon-associates'),(9,'Amazon FBA','Amazon FBA','[\"AmazonFBA\"]','8.png',0,'amazon-fba'),(10,'Digital Product','Digital Product','[\"`Digital Product\"]','',0,'digital-product'),(11,'Display Advertising','Display Advertising','[\"DisplayAdvertising\"]','',0,'display-advertising'),(12,'DropShipping ','DropShipping','[\"DropShipping \"]','',0,'dropshipping'),(13,'E-commerce','E-commerce','[\"E-commerce\"]','',0,'e-commerce'),(14,'Info Product','Info Product','[\"Info Product\"]','',0,'info-product'),(15,'Lead Generation','Lead Generation','[\"Lead\",\"Generation\"]','',0,'lead-generation'),(16,'Other','Other','[\"Other\"]','',0,'other'),(17,'SaaS','SaaS','[\"SaaS\"]','',0,'saas'),(18,'Service','Service','[\"Service\"]','',0,'service'),(19,'Subscription-Box','Subscription-Box','[\"Subscription-Box\"]','',0,'subscription-box'),(20,'Subscription','Subscription','[\"Subscription\"]','',0,'subscription');
/*!40000 ALTER TABLE `tbl_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_comments`
--

DROP TABLE IF EXISTS `tbl_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_comments` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `listing_id` int NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL,
  `author_comment` int NOT NULL,
  `section` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_comments`
--

LOCK TABLES `tbl_comments` WRITE;
/*!40000 ALTER TABLE `tbl_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_contracts`
--

DROP TABLE IF EXISTS `tbl_contracts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_contracts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(250) NOT NULL,
  `domain_id` varchar(250) NOT NULL,
  `listing_id` varchar(250) NOT NULL,
  `invoice_id` varchar(250) NOT NULL,
  `contract_id` varchar(250) NOT NULL,
  `amount` float NOT NULL,
  `timestamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `contract_method` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_contracts`
--

LOCK TABLES `tbl_contracts` WRITE;
/*!40000 ALTER TABLE `tbl_contracts` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_contracts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_coupons`
--

DROP TABLE IF EXISTS `tbl_coupons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_coupons` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `discount_type` varchar(250) NOT NULL DEFAULT '0',
  `amount` float NOT NULL,
  `discount_code` varchar(250) NOT NULL,
  `valid_from` date NOT NULL,
  `valid_till` date NOT NULL,
  `valid_listings` text NOT NULL,
  `status` int NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_coupons`
--

LOCK TABLES `tbl_coupons` WRITE;
/*!40000 ALTER TABLE `tbl_coupons` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_coupons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cron`
--

DROP TABLE IF EXISTS `tbl_cron`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_cron` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `cron_job` varchar(250) DEFAULT NULL,
  `cron_Minute` varchar(250) DEFAULT NULL,
  `cron_Hour` varchar(250) DEFAULT NULL,
  `cron_day` varchar(250) DEFAULT NULL,
  `cron_month` varchar(250) DEFAULT NULL,
  `cron_weekday` varchar(250) DEFAULT NULL,
  `status` int NOT NULL,
  `modified_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cron`
--

LOCK TABLES `tbl_cron` WRITE;
/*!40000 ALTER TABLE `tbl_cron` DISABLE KEYS */;
INSERT INTO `tbl_cron` VALUES (1,'markascompleted','3','1','1','1','0',1,'2023-05-29 20:19:01');
/*!40000 ALTER TABLE `tbl_cron` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_currencies`
--

DROP TABLE IF EXISTS `tbl_currencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_currencies` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `currency` varchar(250) NOT NULL,
  `sign` varchar(250) NOT NULL,
  `status` int NOT NULL,
  `default_status` int NOT NULL,
  `rate` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_currencies`
--

LOCK TABLES `tbl_currencies` WRITE;
/*!40000 ALTER TABLE `tbl_currencies` DISABLE KEYS */;
INSERT INTO `tbl_currencies` VALUES (2,'USD','$',1,1,0),(3,'EUR','€',1,0,0),(4,'INR','Rs',1,0,0);
/*!40000 ALTER TABLE `tbl_currencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_disputes`
--

DROP TABLE IF EXISTS `tbl_disputes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_disputes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `contract_id` varchar(250) NOT NULL,
  `seller_id` int NOT NULL,
  `buyer_id` int NOT NULL,
  `status` int NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_disputes`
--

LOCK TABLES `tbl_disputes` WRITE;
/*!40000 ALTER TABLE `tbl_disputes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_disputes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_domain_purchases`
--

DROP TABLE IF EXISTS `tbl_domain_purchases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_domain_purchases` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `domain_id` int NOT NULL,
  `listing_id` int NOT NULL,
  `invoice_id` varchar(250) NOT NULL,
  `amount` float NOT NULL,
  `timestamp` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_domain_purchases`
--

LOCK TABLES `tbl_domain_purchases` WRITE;
/*!40000 ALTER TABLE `tbl_domain_purchases` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_domain_purchases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_domains`
--

DROP TABLE IF EXISTS `tbl_domains`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_domains` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `domain` varchar(250) NOT NULL,
  `category_id` int NOT NULL,
  `user_id` int NOT NULL,
  `status` int NOT NULL,
  `token` text NOT NULL,
  `google_token` text NOT NULL,
  `google_anastatus` int NOT NULL,
  `date` datetime NOT NULL,
  `acc_id` varchar(250) NOT NULL,
  `prop_id` varchar(250) NOT NULL,
  `view_id` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_domains`
--

LOCK TABLES `tbl_domains` WRITE;
/*!40000 ALTER TABLE `tbl_domains` DISABLE KEYS */;
INSERT INTO `tbl_domains` VALUES (1,'doonlinejobs.com',2,2,0,'cg88000000kkocgc8kk448ok4gso4o8gs40k4kcw','',0,'2022-11-24 08:19:05','','',''),(2,'RIVALHIVE.COM',2,2,0,'go4co0goso0gs8ooo8ok080wcowoswwgw4oc8sg8','',0,'2022-11-25 07:47:32','','',''),(3,'doonlinejobs.com',2,1,1,'wk0ccccokck00ck4cwwsssooc44804sg04csgwkc','{\"access_token\":\"ya29.a0AeTM1idJx1DwcjKB28nt_N08WgOKT3jyt-Fcjb7YjsGYgTJ-JYSD-ppCP1omwsdTBENzP3EWokjne9S1McqDPasRAeRUgOSPksl3BsEBeYljKKpSRBPdJdj1VbG6iafXTXl5lnZ10jQT3k8UBLEdzKo90Jdj4waCgYKAfASARISFQHWtWOmDKXl_yQcEpD-x0IwzpGubg0165\",\"expires_in\":3599,\"scope\":\"https:\\/\\/www.googleapis.com\\/auth\\/analytics.readonly\",\"token_type\":\"Bearer\",\"created\":1670296208,\"refresh_token\":\"1\\/\\/0gOkHPKSn3eqwCgYIARAAGBASNwF-L9IrQU7EdE9CteHZrP0kZIbP1E5ZQKlA63gz5Vvh7aIrRPlmVxw-uH5Ts68G0l9DDXHqkEY\"}',1,'2022-12-01 10:01:43','97024902','UA-97024902-9','159751992'),(4,'worldnews.com',2,1,1,'8k88848w8ww0wwwccs4ww0cwsswwwkw440o0cwo0','{\"access_token\":\"ya29.a0AeTM1ifdLzlFU8DCk480zY4MJy1CXxyyQZCzXQ4_GhiO3MQuKMBu6ZY_rmWvOYratPjtCsFJkt3MZy5Fb9AEopJ76qVoeEwstOE288mVaEPjkMyt5fAaJ0l3dpwYeMcfcfRFtRZDzqVUUWjw7D8ajerhZq8laCgYKAY4SARISFQHWtWOmPk7bH8MhVwjohL9Iip5Uwg0163\",\"expires_in\":3599,\"scope\":\"https:\\/\\/www.googleapis.com\\/auth\\/analytics.readonly\",\"token_type\":\"Bearer\",\"created\":1670229331,\"refresh_token\":\"1\\/\\/0giPvkpIYqvXTCgYIARAAGBASNwF-L9Irh-9uwKTID2vuuNkrpT4ECrxHNh0gssqQMVXR_UC5lIgPMaiq_Es0Q33swiw-g7GcNFQ\"}',1,'2022-12-05 07:50:00','97024902','UA-97024902-14','178706093'),(5,'moviepixel.com',2,1,1,'8k88848w8ww0wwwccs4ww0cwsswwwkw440o0cwo0','{\"access_token\":\"ya29.a0AeTM1ifdLzlFU8DCk480zY4MJy1CXxyyQZCzXQ4_GhiO3MQuKMBu6ZY_rmWvOYratPjtCsFJkt3MZy5Fb9AEopJ76qVoeEwstOE288mVaEPjkMyt5fAaJ0l3dpwYeMcfcfRFtRZDzqVUUWjw7D8ajerhZq8laCgYKAY4SARISFQHWtWOmPk7bH8MhVwjohL9Iip5Uwg0163\",\"expires_in\":3599,\"scope\":\"https:\\/\\/www.googleapis.com\\/auth\\/analytics.readonly\",\"token_type\":\"Bearer\",\"created\":1670229331,\"refresh_token\":\"1\\/\\/0giPvkpIYqvXTCgYIARAAGBASNwF-L9Irh-9uwKTID2vuuNkrpT4ECrxHNh0gssqQMVXR_UC5lIgPMaiq_Es0Q33swiw-g7GcNFQ\"}',1,'2022-12-05 07:50:00','97024902','UA-97024902-14','178706093'),(6,'drive.com',2,1,1,'8k88848w8ww0wwwccs4ww0cwsswwwkw440o0cwo0','{\"access_token\":\"ya29.a0AeTM1ifdLzlFU8DCk480zY4MJy1CXxyyQZCzXQ4_GhiO3MQuKMBu6ZY_rmWvOYratPjtCsFJkt3MZy5Fb9AEopJ76qVoeEwstOE288mVaEPjkMyt5fAaJ0l3dpwYeMcfcfRFtRZDzqVUUWjw7D8ajerhZq8laCgYKAY4SARISFQHWtWOmPk7bH8MhVwjohL9Iip5Uwg0163\",\"expires_in\":3599,\"scope\":\"https:\\/\\/www.googleapis.com\\/auth\\/analytics.readonly\",\"token_type\":\"Bearer\",\"created\":1670229331,\"refresh_token\":\"1\\/\\/0giPvkpIYqvXTCgYIARAAGBASNwF-L9Irh-9uwKTID2vuuNkrpT4ECrxHNh0gssqQMVXR_UC5lIgPMaiq_Es0Q33swiw-g7GcNFQ\"}',1,'2022-12-05 07:50:00','97024902','UA-97024902-14','178706093'),(7,'onlineearning.com',2,1,0,'ckwsk40sskk8kkc48sc8k8gw4so48k88s40wgoow','',0,'2023-02-15 01:36:29','','',''),(8,'doaadmin.com',2,1,0,'kow8skg8o4cwcsgw4kcs08kgw0088o44wss848g8','',0,'2023-04-08 02:12:56','','',''),(9,'doaadmintest.com',2,1,0,'oc88o0scs00k0c0sskgsc8484ggwggo0s4sg00ss','',0,'2023-04-08 02:46:16','','',''),(10,'doaadmintestme.com',2,1,0,'w0k0gwcggo88gc40o84gcowcsco8ogg0oo8kccgk','',0,'2023-04-11 20:20:52','','',''),(11,'admintestwebsite.com',2,1,0,'wssskgw4ocs04coggcs8ggkcwgccwoc08kcssoko','',0,'2023-05-01 20:13:16','','',''),(12,'doaadmintestweb.com',2,1,0,'0wwock08880cwocogkkcg0oo44wcco80k0gccccs','',0,'2023-05-05 01:13:23','','',''),(13,'11mo.com',2,1,0,'808swg0w8ssgos8wksoog8okwwkkococs0g4oc0g','',0,'2023-06-02 05:01:26','','',''),(14,'59311.com',2,1,0,'s044cwskwc80sg840ok0g08w8w0o8wksw0o8sc0g','',0,'2023-06-03 11:26:14','','',''),(15,'666306.com',2,1,0,'s8kk404c4oc00ccwksw00cwo4g04s0gc84wcc0wc','',0,'2023-06-03 11:27:33','','',''),(16,'999884.com',2,1,0,'8o8sgs8swo4gsgs8gwk0wo0w4k0oo84ss8wwccg4','',0,'2023-06-03 11:37:06','','',''),(17,'alkinhibitors.com',2,1,0,'00oo8g8044gwwowc88kokkwowo804kcs8cc4k8ko','',0,'2023-06-03 11:49:23','','',''),(18,'angelshirts.com',2,1,0,'gkwk44gckc44kow8ws4c8cwo4ckgw0sw4k0gsok4','',0,'2023-06-03 11:55:12','','',''),(19,'apparelvendors.com',2,1,0,'g4s0cogwggs8cosg0k8wo84kgok0s0wsco80wcck','',0,'2023-06-03 11:58:36','','',''),(20,'autoloanchicago.com',2,1,0,'s4wgsggkocc004csook4g4wwocs8o4g8sc4o4woc','',0,'2023-06-03 12:00:56','','',''),(21,'awardcoins.com',2,1,0,'8gggkwsoo40goccosw400ks4g00ooo4owg8gsgws','',0,'2023-06-03 12:15:51','','',''),(22,'backupnw.com',2,1,0,'coc4g4w4kkgccgc484swo88gc4gckgcwcggsogss','',0,'2023-06-03 12:26:16','','','');
/*!40000 ALTER TABLE `tbl_domains` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_email_settings`
--

DROP TABLE IF EXISTS `tbl_email_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_email_settings` (
  `id` int unsigned NOT NULL,
  `site_email` varchar(250) NOT NULL,
  `site_email_name` varchar(250) NOT NULL,
  `mail_sending_option` varchar(250) NOT NULL,
  `mail_smtp_server` varchar(250) NOT NULL,
  `mail_smtp_user` varchar(250) NOT NULL,
  `mail_smtp_password` varchar(250) NOT NULL,
  `mail_smtp_port` varchar(250) NOT NULL,
  `mail_smtp_encryption` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_email_settings`
--

LOCK TABLES `tbl_email_settings` WRITE;
/*!40000 ALTER TABLE `tbl_email_settings` DISABLE KEYS */;
INSERT INTO `tbl_email_settings` VALUES (1,'support@namesden.com','NamesDen','smtp','smtp.hostinger.com','admin@namesden.com          ','Ericson1989@','465','ssl');
/*!40000 ALTER TABLE `tbl_email_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_faq`
--

DROP TABLE IF EXISTS `tbl_faq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_faq` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(250) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_faq`
--

LOCK TABLES `tbl_faq` WRITE;
/*!40000 ALTER TABLE `tbl_faq` DISABLE KEYS */;
INSERT INTO `tbl_faq` VALUES (1,'domain','What happens after I purchase a domain name from BrandBucket?',' Every name on the BrandBucket marketplace is exclusively listed with BrandBucket. That means that all of our sellers are very responsive, making for quick domain transfers.\r\nA dedicated BrandBucket agent will manage your domain transfer from beginning to end, ensuring a secure and easy transaction. They will manage the receipt of the domain into one of BrandBucket’s secure registrar accounts and then complete the transfer to you.\r\n\r\n1. Verification and registrar choice\r\nAfter we receive the payment and verify it, we will reach out via email to confirm which registrar you want the domain transferred to. We also provide a link to our tracking system, where you can communicate with us, check on the status of your transfer, view your invoice, and download your logo files.\r\n\r\nIn most cases, if a domain is moved between accounts at a single registrar, the transfer is quick and usually completes within 48 hours. If a domain changes registrars (in other words, you would like to move it away from where it is currently registered), the transfer is slower. The total transfer time can then be anywhere from 48 hours to 7 days.'),(2,'domain','Why choose BrandBucket?','Established in 2007, we are the original business name marketplace. Every year, we sell 1000s of premium domains to entrepreneurs and businesses like you.\r\n\r\nAll of our domain names are handpicked by branding and linguistics experts based on rigorous criteria. You can rest assured that if a domain is on the BrandBucket marketplace, it is a top-tier business name.\r\n\r\nAlmost one out of every four names sold on BrandBucket is sold to a repeat buyer or a referral, which means that people who buy from us once, keep coming back for more.'),(3,'website','What happens after I purchase a domain name from BrandBucket?',' Every name on the BrandBucket marketplace is exclusively listed with BrandBucket. That means that all of our sellers are very responsive, making for quick domain transfers.\r\nA dedicated BrandBucket agent will manage your domain transfer from beginning to end, ensuring a secure and easy transaction. They will manage the receipt of the domain into one of BrandBucket’s secure registrar accounts and then complete the transfer to you.\r\n\r\n1. Verification and registrar choice\r\nAfter we receive the payment and verify it, we will reach out via email to confirm which registrar you want the domain transferred to. We also provide a link to our tracking system, where you can communicate with us, check on the status of your transfer, view your invoice, and download your logo files.\r\n\r\nIn most cases, if a domain is moved between accounts at a single registrar, the transfer is quick and usually completes within 48 hours. If a domain changes registrars (in other words, you would like to move it away from where it is currently registered), the transfer is slower. The total transfer time can then be anywhere from 48 hours to 7 days.'),(4,'website','Why choose BrandBucket?','Established in 2007, we are the original business name marketplace. Every year, we sell 1000s of premium domains to entrepreneurs and businesses like you.\r\n\r\nAll of our domain names are handpicked by branding and linguistics experts based on rigorous criteria. You can rest assured that if a domain is on the BrandBucket marketplace, it is a top-tier business name.\r\n\r\nAlmost one out of every four names sold on BrandBucket is sold to a repeat buyer or a referral, which means that people who buy from us once, keep coming back for more.');
/*!40000 ALTER TABLE `tbl_faq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_history`
--

DROP TABLE IF EXISTS `tbl_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_history` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `status` int NOT NULL,
  `contract_id` varchar(250) NOT NULL,
  `remarks` text,
  `uploads` text,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `user` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_history`
--

LOCK TABLES `tbl_history` WRITE;
/*!40000 ALTER TABLE `tbl_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_homepage_setup`
--

DROP TABLE IF EXISTS `tbl_homepage_setup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_homepage_setup` (
  `id` int unsigned NOT NULL,
  `sold-domains` int NOT NULL,
  `apps` int NOT NULL,
  `featured-domains-slider` int NOT NULL,
  `popular-categories` int NOT NULL,
  `auction-table` int NOT NULL,
  `sponsored-ads` int NOT NULL,
  `how-it-works` int NOT NULL,
  `ending-soon` int NOT NULL,
  `trending-listings` int NOT NULL,
  `why-us` int NOT NULL,
  `domains-columns` int NOT NULL,
  `info-box` int NOT NULL,
  `blog-carousel` int NOT NULL,
  `social_accounts` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_homepage_setup`
--

LOCK TABLES `tbl_homepage_setup` WRITE;
/*!40000 ALTER TABLE `tbl_homepage_setup` DISABLE KEYS */;
INSERT INTO `tbl_homepage_setup` VALUES (1,1,1,1,1,1,1,1,1,1,1,1,1,1,1);
/*!40000 ALTER TABLE `tbl_homepage_setup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_invoices`
--

DROP TABLE IF EXISTS `tbl_invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_invoices` (
  `id` int NOT NULL AUTO_INCREMENT,
  `invoice_id` varchar(250) NOT NULL,
  `paid_by` varchar(250) NOT NULL,
  `paid_to` varchar(250) NOT NULL,
  `gross_amount` float NOT NULL,
  `processing_fee` float NOT NULL,
  `success_fee` float NOT NULL,
  `withdraw_amount` float NOT NULL,
  `listing_id` varchar(250) NOT NULL,
  `status` int NOT NULL,
  `invoice_type` int NOT NULL DEFAULT '1',
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_invoices`
--

LOCK TABLES `tbl_invoices` WRITE;
/*!40000 ALTER TABLE `tbl_invoices` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_languages`
--

DROP TABLE IF EXISTS `tbl_languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_languages` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `language_code` varchar(250) NOT NULL,
  `language` varchar(250) NOT NULL,
  `status` int NOT NULL,
  `default_status` int NOT NULL DEFAULT '0',
  `icon` int NOT NULL,
  `l_format` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `language_code` (`language_code`),
  UNIQUE KEY `language` (`language`),
  UNIQUE KEY `language_code_2` (`language_code`),
  UNIQUE KEY `language_2` (`language`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_languages`
--

LOCK TABLES `tbl_languages` WRITE;
/*!40000 ALTER TABLE `tbl_languages` DISABLE KEYS */;
INSERT INTO `tbl_languages` VALUES (1,'en','english',1,1,0,'ltr');
/*!40000 ALTER TABLE `tbl_languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_lastseen`
--

DROP TABLE IF EXISTS `tbl_lastseen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_lastseen` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `message_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_lastseen`
--

LOCK TABLES `tbl_lastseen` WRITE;
/*!40000 ALTER TABLE `tbl_lastseen` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_lastseen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_listing_header`
--

DROP TABLE IF EXISTS `tbl_listing_header`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_listing_header` (
  `listing_id` int unsigned NOT NULL AUTO_INCREMENT,
  `listing_name` varchar(250) NOT NULL,
  `listing_description` varchar(250) NOT NULL,
  `listing_price` varchar(250) NOT NULL,
  `listing_duration` varchar(250) NOT NULL,
  `listing_type` varchar(250) NOT NULL,
  `listing_icon` text NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`listing_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_listing_header`
--

LOCK TABLES `tbl_listing_header` WRITE;
/*!40000 ALTER TABLE `tbl_listing_header` DISABLE KEYS */;
INSERT INTO `tbl_listing_header` VALUES (1,'Domains','Domains','0','10000','domain','domain-g28b492ce1_640.jpg',1),(2,'Websites','Websites','0','60','website','',1),(3,'Apps','We list the best Apps which are for sale at the best price','0','10000','app','pexels-pixabay-267350.jpg',1);
/*!40000 ALTER TABLE `tbl_listing_header` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_listings`
--

DROP TABLE IF EXISTS `tbl_listings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_listings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `domain_id` varchar(250) NOT NULL,
  `listing_type` varchar(250) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `website_BusinessName` varchar(250) DEFAULT NULL,
  `extension` varchar(250) DEFAULT NULL,
  `business_registeredCountry` varchar(10) DEFAULT NULL,
  `website_industry` float NOT NULL,
  `monetization_methods` mediumtext,
  `last12_monthsrevenue` varchar(250) DEFAULT NULL,
  `last12_monthsexpenses` varchar(250) DEFAULT NULL,
  `annual_profit` varchar(250) DEFAULT NULL,
  `financial_uploadVisual` varchar(250) DEFAULT NULL,
  `financial_uploadProfitLoss` varchar(250) DEFAULT NULL,
  `website_tagline` mediumtext,
  `website_metadescription` mediumtext,
  `website_metakeywords` text NOT NULL,
  `description` mediumtext,
  `website_age` int NOT NULL,
  `website_how_make_money` mediumtext,
  `website_purchasing_fulfilment` mediumtext,
  `website_whyselling` mediumtext,
  `website_suitsfor` mediumtext,
  `website_facebook` varchar(250) NOT NULL,
  `website_twitter` varchar(250) NOT NULL,
  `website_instagram` varchar(250) NOT NULL,
  `alexa_rank` int NOT NULL DEFAULT '1',
  `google_verified` int NOT NULL DEFAULT '0',
  `status` int NOT NULL,
  `sold_status` int NOT NULL DEFAULT '0',
  `deliver_in` int NOT NULL,
  `website_thumbnail` mediumtext,
  `website_cover` mediumtext,
  `listing_option` varchar(250) NOT NULL,
  `website_startingprice` float DEFAULT NULL,
  `website_reserveprice` float DEFAULT NULL,
  `website_minimumoffer` float DEFAULT NULL,
  `website_buynowprice` float DEFAULT NULL,
  `Included_assets` varchar(250) DEFAULT NULL,
  `token` mediumtext,
  `user_ip` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  `views` int NOT NULL,
  `app_market` varchar(50) DEFAULT NULL,
  `app_url` text NOT NULL,
  `monthly_downloads` int NOT NULL,
  `screenshot` text,
  `godaddy_link` varchar(255) DEFAULT NULL,
  `dan_link` varchar(255) DEFAULT NULL,
  `editors_picked` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_listings`
--

LOCK TABLES `tbl_listings` WRITE;
/*!40000 ALTER TABLE `tbl_listings` DISABLE KEYS */;
INSERT INTO `tbl_listings` VALUES (4,'3','website','1','doonlinejobs.com','com','US',4,'N/A','20000','300','19700','','','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s','This i just a test webbsite','[\"This i just a test webbsite\"]','<p><span xss=removed>Foundation: <b>A strong name that will capture anyone\'s attention</b>. The name conveys brand concepts of Bold to create a meaningful brand story. Great fit for industries such as an Agency & Consulting Business, a Tech Startup and many more! This 10 letter name is short and easily remembered. Get this name before it\'s gone!\r\n\r\nImportant note: this is a premium registry domain with a  renewal price of $1000+/year. Please contact us for more information.</span><br></p>',3,'Foundation: A strong name that will capture anyone\'s attention. The name conveys brand concepts of Bold to create a meaningful brand story. Great fit for industries such as an Agency & Consulting Business, a Tech Startup and many more! This 10 letter name is short and easily remembered. Get this name before it\'s gone!\r\n\r\nImportant note: this is a premium registry domain with a  renewal price of $1000+/year. Please contact us for more information.','Foundation: A strong name that will capture anyone\'s attention. The name conveys brand concepts of Bold to create a meaningful brand story. Great fit for industries such as an Agency & Consulting Business, a Tech Startup and many more! This 10 letter name is short and easily remembered. Get this name before it\'s gone!\r\n\r\nImportant note: this is a premium registry domain with a  renewal price of $1000+/year. Please contact us for more information.','Foundation: A strong name that will capture anyone\'s attention. The name conveys brand concepts of Bold to create a meaningful brand story. Great fit for industries such as an Agency & Consulting Business, a Tech Startup and many more! This 10 letter name is short and easily remembered. Get this name before it\'s gone!\r\n\r\nImportant note: this is a premium registry domain with a  renewal price of $1000+/year. Please contact us for more information.','Foundation: A strong name that will capture anyone\'s attention. The name conveys brand concepts of Bold to create a meaningful brand story. Great fit for industries such as an Agency & Consulting Business, a Tech Startup and many more! This 10 letter name is short and easily remembered. Get this name before it\'s gone!\r\n\r\nImportant note: this is a premium registry domain with a  renewal price of $1000+/year. Please contact us for more information.','','','',1,1,1,0,30,'large_businessresponse_0.png','copernico-p_kICQCOM4s-unsplash1.jpg','auction',300,500,0,6000,NULL,'','::1','2022-12-01 10:01:43',233,'n/a','n/a',0,'[{\"file_name\":\"flat_b012.jpg\",\"file_type\":\"image\\/jpeg\",\"file_path\":\"C:\\/xampp\\/htdocs\\/namesdan\\/assets\\/img\\/uploads\\/\",\"full_path\":\"C:\\/xampp\\/htdocs\\/namesdan\\/assets\\/img\\/uploads\\/flat_b012.jpg\",\"raw_name\":\"flat_b012\",\"orig_name\":\"flat_b01.jpg\",\"client_name\":\"flat_b01.jpg\",\"file_ext\":\".jpg\",\"file_size\":91.2,\"is_image\":true,\"image_width\":838,\"image_height\":486,\"image_type\":\"jpeg\",\"image_size_str\":\"width=\\\"838\\\" height=\\\"486\\\"\"},{\"file_name\":\"flat_b022.jpg\",\"file_type\":\"image\\/jpeg\",\"file_path\":\"C:\\/xampp\\/htdocs\\/namesdan\\/assets\\/img\\/uploads\\/\",\"full_path\":\"C:\\/xampp\\/htdocs\\/namesdan\\/assets\\/img\\/uploads\\/flat_b022.jpg\",\"raw_name\":\"flat_b022\",\"orig_name\":\"flat_b02.jpg\",\"client_name\":\"flat_b02.jpg\",\"file_ext\":\".jpg\",\"file_size\":46.39,\"is_image\":true,\"image_width\":838,\"image_height\":486,\"image_type\":\"jpeg\",\"image_size_str\":\"width=\\\"838\\\" height=\\\"486\\\"\"},{\"file_name\":\"flat_b032.jpg\",\"file_type\":\"image\\/jpeg\",\"file_path\":\"C:\\/xampp\\/htdocs\\/namesdan\\/assets\\/img\\/uploads\\/\",\"full_path\":\"C:\\/xampp\\/htdocs\\/namesdan\\/assets\\/img\\/uploads\\/flat_b032.jpg\",\"raw_name\":\"flat_b032\",\"orig_name\":\"flat_b03.jpg\",\"client_name\":\"flat_b03.jpg\",\"file_ext\":\".jpg\",\"file_size\":51.26,\"is_image\":true,\"image_width\":838,\"image_height\":486,\"image_type\":\"jpeg\",\"image_size_str\":\"width=\\\"838\\\" height=\\\"486\\\"\"}]','https://www.brandbucket.com/names/rivalhive?source=list','https://www.brandbucket.com/names/rivalhive?source=list',1),(5,'4','website','1','worldnews.com','com','US',8,'N/A','3000','500','2500','','','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s','[\"This is just a demo website\"]','<p>This is just a demo websiteThis is just a demo websiteThis is just a demo websiteThis is just a demo website<br></p>',3,'This is just a demo website','This is just a demo website','This is just a demo website','This is just a demo website','','','',1,1,1,0,30,'large_businesssix.png','copernico-p_kICQCOM4s-unsplash2.jpg','classified',0,0,300,50,NULL,'','::1','2022-12-05 07:50:01',38,'n/a','n/a',0,'[{\"file_name\":\"flat_b013.jpg\",\"file_type\":\"image\\/jpeg\",\"file_path\":\"C:\\/xampp\\/htdocs\\/namesdan\\/assets\\/img\\/uploads\\/\",\"full_path\":\"C:\\/xampp\\/htdocs\\/namesdan\\/assets\\/img\\/uploads\\/flat_b013.jpg\",\"raw_name\":\"flat_b013\",\"orig_name\":\"flat_b01.jpg\",\"client_name\":\"flat_b01.jpg\",\"file_ext\":\".jpg\",\"file_size\":91.2,\"is_image\":true,\"image_width\":838,\"image_height\":486,\"image_type\":\"jpeg\",\"image_size_str\":\"width=\\\"838\\\" height=\\\"486\\\"\"},{\"file_name\":\"flat_b0221.jpg\",\"file_type\":\"image\\/jpeg\",\"file_path\":\"C:\\/xampp\\/htdocs\\/namesdan\\/assets\\/img\\/uploads\\/\",\"full_path\":\"C:\\/xampp\\/htdocs\\/namesdan\\/assets\\/img\\/uploads\\/flat_b0221.jpg\",\"raw_name\":\"flat_b0221\",\"orig_name\":\"flat_b022.jpg\",\"client_name\":\"flat_b022.jpg\",\"file_ext\":\".jpg\",\"file_size\":46.39,\"is_image\":true,\"image_width\":838,\"image_height\":486,\"image_type\":\"jpeg\",\"image_size_str\":\"width=\\\"838\\\" height=\\\"486\\\"\"},{\"file_name\":\"flat_b0311.jpg\",\"file_type\":\"image\\/jpeg\",\"file_path\":\"C:\\/xampp\\/htdocs\\/namesdan\\/assets\\/img\\/uploads\\/\",\"full_path\":\"C:\\/xampp\\/htdocs\\/namesdan\\/assets\\/img\\/uploads\\/flat_b0311.jpg\",\"raw_name\":\"flat_b0311\",\"orig_name\":\"flat_b031.jpg\",\"client_name\":\"flat_b031.jpg\",\"file_ext\":\".jpg\",\"file_size\":51.26,\"is_image\":true,\"image_width\":838,\"image_height\":486,\"image_type\":\"jpeg\",\"image_size_str\":\"width=\\\"838\\\" height=\\\"486\\\"\"}]','https://www.brandbucket.com/names/rivalhive?source...','https://www.brandbucket.com/names/rivalhive?source=list',0),(19,'8','domain','1','doaadmin.com','com','US',0,'N/A','','','','','','respect this listing','respect this listing','[\"\"]','<p>respect this listing<br></p>',2,'','','','','','','',1,0,1,0,30,'test2.png','','classified',0,0,200,200,NULL,'','127.0.0.1','2023-04-13 22:58:55',3,'n/a','n/a',0,'',NULL,NULL,0),(21,'11','website','1','admintestwebsite.com','com','US',2,'N/A','20000','2000','18000','','','respect this website listing','respect this website listing','[\"respect this website listing\"]','<p>respect this website listing<br></p>',2,'respect this website listing','respect this website listing','respect this website listing','respect this website listing','','','',1,0,2,0,30,'Picasso_Painters_Post_Final1.png','Picasso_Painters_Post_Final.png','classified',0,0,200,200,NULL,'','127.0.0.1','2023-05-01 20:13:16',9,'n/a','n/a',0,'',NULL,NULL,0),(23,'','app','1','Test App','Test App','US',5,'N/A','2000','1000','1000','N/A','Bilal_Ahmad_CV_2022.pdf','this is test app','this is test app','[\"this is \",\"test \",\"app\"]','<p>this is test app<br></p>',2,'online','nothing','for profit',NULL,'','','',1,0,1,0,30,'N/A','','auction',500,500,NULL,5000,NULL,'','127.0.0.1','2023-05-13 02:46:40',0,'play.google.com','https://play.google.com/store/apps/',200,'[{\"file_name\":\"ysense.svg\",\"file_type\":\"image\\/svg+xml\",\"file_path\":\"\\/var\\/www\\/html\\/slippa\\/assets\\/img\\/uploads\\/\",\"full_path\":\"\\/var\\/www\\/html\\/slippa\\/assets\\/img\\/uploads\\/ysense.svg\",\"raw_name\":\"ysense\",\"orig_name\":\"\",\"client_name\":\"ysense.svg\",\"file_ext\":\".svg\",\"file_size\":6953,\"is_image\":false,\"image_width\":null,\"image_height\":null,\"image_type\":\"\",\"image_size_str\":\"\"},{\"file_name\":\"yg-logo.svg\",\"file_type\":\"image\\/svg+xml\",\"file_path\":\"\\/var\\/www\\/html\\/slippa\\/assets\\/img\\/uploads\\/\",\"full_path\":\"\\/var\\/www\\/html\\/slippa\\/assets\\/img\\/uploads\\/yg-logo.svg\",\"raw_name\":\"yg-logo\",\"orig_name\":\"\",\"client_name\":\"yg-logo.svg\",\"file_ext\":\".svg\",\"file_size\":8386,\"is_image\":false,\"image_width\":null,\"image_height\":null,\"image_type\":\"\",\"image_size_str\":\"\"}]','','',0),(24,'13','domain','1','11mo.com','com','US',0,'N/A','','','','','','Unique Brandable Company Domain name for sale with over 23M Monthly search','Unique Brandable Company Domain name for sale with over 23M Monthly search','[\"\"]','<p>Unique Brandable Company Domain name for sale with over 23M Monthly search<br></p>',15,'','','','','','','',1,0,1,0,30,'nathan-mcdine-VN-IHimv4QE-unsplash1.jpg','','classified',0,0,4000,8500,NULL,'','97.71.191.3','2023-06-02 05:01:26',7,'n/a','n/a',0,'',NULL,NULL,0),(25,'14','domain','1','59311.com','com','US',0,'N/A','','','','','','Unique Brandable Company Domain name for sale with over 23M Monthly search','Unique Brandable Company Domain name for sale with over 23M Monthly search','[\"\"]','<p>Unique Brandable Company Domain name for sale with over 23M Monthly search<br></p>',20,'','','','','','','',1,0,1,0,30,'computer-g0a5ac4b17_640.jpg','','classified',0,0,1500,2500,NULL,'','97.71.191.3','2023-06-03 11:26:14',4,'n/a','n/a',0,'',NULL,NULL,0),(26,'15','domain','1','666306.com','com','US',0,'N/A','','','','','','Unique Brandable Company Domain name for sale with over 23M Monthly search','Unique Brandable Company Domain name for sale with over 23M Monthly search','[\"\"]','<p>Unique Brandable Company Domain name for sale with over 23M Monthly search<br></p>',20,'','','','','','','',1,0,1,0,30,'student-g86d40fed5_640.jpg','','classified',0,0,1000,5000,NULL,'','97.71.191.3','2023-06-03 11:27:33',2,'n/a','n/a',0,'',NULL,NULL,0),(27,'16','domain','1','999884.com','com','US',0,'N/A','','','','','','Unique Brandable Company Domain name for sale with over 23M Monthly search','Unique Brandable Company Domain name for sale with over 23M Monthly search','[\"\"]','<p>Unique Brandable Company Domain name for sale with over 23M Monthly search<br></p>',20,'','','','','','','',1,0,1,0,30,'typing-gcbbd7c3c3_640.jpg','','classified',0,0,1500,5000,NULL,'','97.71.191.3','2023-06-03 11:37:06',1,'n/a','n/a',0,'',NULL,NULL,0),(28,'17','domain','1','alkinhibitors.com','com','US',0,'N/A','','','','','','Unique Brandable Company Domain name for sale with over 23M Monthly search','Unique Brandable Company Domain name for sale with over 23M Monthly search','[\"\"]','<p>Unique Brandable Company Domain name for sale with over 23M Monthly search<br></p>',20,'','','','','','','',1,0,1,0,30,'drinks-g64a0c22a5_640.jpg','','classified',0,0,1500,5000,NULL,'','97.71.191.3','2023-06-03 11:49:23',1,'n/a','n/a',0,'',NULL,NULL,0),(29,'18','domain','1','angelshirts.com','com','US',0,'N/A','','','','','','Unique Brandable Company Domain name for sale with over 23M Monthly search','Unique Brandable Company Domain name for sale with over 23M Monthly search','[\"\"]','<p>Unique Brandable Company Domain name for sale with over 23M Monthly search<br></p>',20,'','','','','','','',1,0,1,0,30,'portrait-g90fcf36bf_640.jpg','','classified',0,0,1500,5000,NULL,'','97.71.191.3','2023-06-03 11:55:12',0,'n/a','n/a',0,'',NULL,NULL,0),(30,'19','domain','1','apparelvendors.com','com','US',0,'N/A','','','','','','Unique Brandable Company Domain name for sale with over 23M Monthly search','Unique Brandable Company Domain name for sale with over 23M Monthly search','[\"\"]','<p>Unique Brandable Company Domain name for sale with over 23M Monthly search<br></p>',20,'','','','','','','',1,0,1,0,30,'market-g417a50b64_640.jpg','','classified',0,0,1500,5000,NULL,'','97.71.191.3','2023-06-03 11:58:36',1,'n/a','n/a',0,'',NULL,NULL,0),(31,'20','domain','1','autoloanchicago.com','com','US',0,'N/A','','','','','','Unique Brandable Company Domain name for sale with over 23M Monthly search','Unique Brandable Company Domain name for sale with over 23M Monthly search','[\"\"]','<p>Unique Brandable Company Domain name for sale with over 23M Monthly search<br></p>',20,'','','','','','','',1,0,1,0,30,'cars-gf593d9b91_640.jpg','','classified',0,0,1500,5000,NULL,'','97.71.191.3','2023-06-03 12:00:56',4,'n/a','n/a',0,'',NULL,NULL,0),(32,'21','domain','1','awardcoins.com','com','US',0,'N/A','','','','','','Unique Brandable Company Domain name for sale with over 23M Monthly search','Unique Brandable Company Domain name for sale with over 23M Monthly search','[\"\"]','<p>Unique Brandable Company Domain name for sale with over 23M Monthly search<br></p>',20,'','','','','','','',1,0,1,0,30,'winner-g5b6c7945d_640.jpg','','classified',0,0,1500,5000,NULL,'','97.71.191.3','2023-06-03 12:15:51',7,'n/a','n/a',0,'',NULL,NULL,0),(33,'22','domain','1','backupnw.com','com','US',0,'N/A','','','','','','Unique Brandable Company Domain name for sale with over 23M Monthly search','Unique Brandable Company Domain name for sale with over 23M Monthly search','[\"\"]','<p>Unique Brandable Company Domain name for sale with over 23M Monthly search<br></p>',20,'','','','','','','',1,0,1,0,30,'data-carrier-g118afcea3_640.jpg','','classified',0,0,1500,4999,NULL,'','97.71.191.3','2023-06-03 12:26:16',1,'n/a','n/a',0,'',NULL,NULL,0);
/*!40000 ALTER TABLE `tbl_listings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_message`
--

DROP TABLE IF EXISTS `tbl_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_message` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` int NOT NULL,
  `recipient_id` int NOT NULL,
  `message` text NOT NULL,
  `timestamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `view_status` int NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_message`
--

LOCK TABLES `tbl_message` WRITE;
/*!40000 ALTER TABLE `tbl_message` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_message_notifications`
--

DROP TABLE IF EXISTS `tbl_message_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_message_notifications` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `sender` varchar(250) NOT NULL,
  `recipient` varchar(250) NOT NULL,
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_message_notifications`
--

LOCK TABLES `tbl_message_notifications` WRITE;
/*!40000 ALTER TABLE `tbl_message_notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_message_notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_months`
--

DROP TABLE IF EXISTS `tbl_months`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_months` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `mon` varchar(250) NOT NULL,
  `month` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_months`
--

LOCK TABLES `tbl_months` WRITE;
/*!40000 ALTER TABLE `tbl_months` DISABLE KEYS */;
INSERT INTO `tbl_months` VALUES (1,'Jan','January'),(2,'Feb','February'),(3,'Mar','March'),(4,'Apr','April'),(5,'May','May'),(6,'Jun','June'),(7,'Jul','July'),(8,'Aug','August'),(9,'Sep','September'),(10,'Oct','October'),(11,'Nov','November'),(12,'Dec','December');
/*!40000 ALTER TABLE `tbl_months` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_notifications`
--

DROP TABLE IF EXISTS `tbl_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_notifications` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(250) NOT NULL,
  `notification` text NOT NULL,
  `url` varchar(250) NOT NULL,
  `user_id` int NOT NULL,
  `view_status` int NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_notifications`
--

LOCK TABLES `tbl_notifications` WRITE;
/*!40000 ALTER TABLE `tbl_notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_offers`
--

DROP TABLE IF EXISTS `tbl_offers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_offers` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `listing_id` int NOT NULL,
  `listing_type` varchar(250) NOT NULL,
  `customer_id` int NOT NULL,
  `owner_id` int NOT NULL,
  `offer_amount` float NOT NULL,
  `offer_msg` text NOT NULL,
  `offer_status` int NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_offers`
--

LOCK TABLES `tbl_offers` WRITE;
/*!40000 ALTER TABLE `tbl_offers` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_offers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_opens`
--

DROP TABLE IF EXISTS `tbl_opens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_opens` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `contract_id` varchar(250) NOT NULL,
  `listing_id` int NOT NULL,
  `bid_id` varchar(250) NOT NULL,
  `type` varchar(30) NOT NULL,
  `customer_id` int NOT NULL,
  `owner_id` int NOT NULL,
  `delivery_time` datetime NOT NULL,
  `delivery` int NOT NULL,
  `status` int NOT NULL,
  `remarks` text,
  `date` datetime NOT NULL,
  `percentage` int NOT NULL,
  `contract_method` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_opens`
--

LOCK TABLES `tbl_opens` WRITE;
/*!40000 ALTER TABLE `tbl_opens` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_opens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pages`
--

DROP TABLE IF EXISTS `tbl_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_pages` (
  `page_id` int unsigned NOT NULL AUTO_INCREMENT,
  `txt_page_title` varchar(250) NOT NULL,
  `txt_page_meta_description` varchar(250) NOT NULL,
  `txt_page_meta_keywords` text NOT NULL,
  `txt_page_url_slug` varchar(250) NOT NULL,
  `txt_page_description` longtext NOT NULL,
  `page_visibility_group` varchar(250) NOT NULL,
  `page_visibility_status` int NOT NULL,
  `date` datetime NOT NULL,
  `p_status` int NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pages`
--

LOCK TABLES `tbl_pages` WRITE;
/*!40000 ALTER TABLE `tbl_pages` DISABLE KEYS */;
INSERT INTO `tbl_pages` VALUES (6,'Terms of service','Welcome to www.lorem-ipsum.info. This site is provided as a service to our visitors and may be used for informational purpos','[\"Lorem Ipsum\",\" dummy\"]','terms-of-service','demo data','all',1,'2020-03-29 07:59:11',1),(7,'Privacy Policy','Privacy Policy','[\"Lorem Ipsum\",\" dummy\"]','privacy-policy','demo data','all',1,'2020-03-29 07:59:11',1);
/*!40000 ALTER TABLE `tbl_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_payment_settings`
--

DROP TABLE IF EXISTS `tbl_payment_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_payment_settings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `paymentgateway_id` varchar(250) NOT NULL,
  `method` varchar(250) NOT NULL,
  `payment_currency` varchar(4) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `signature` text NOT NULL,
  `icon_url` text NOT NULL,
  `sandbox` varchar(250) NOT NULL,
  `status` int NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `card_status` int DEFAULT NULL,
  `back_status` int DEFAULT NULL,
  `email_only` int DEFAULT NULL,
  `is_fixed` int DEFAULT NULL,
  `fields` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_payment_settings`
--

LOCK TABLES `tbl_payment_settings` WRITE;
/*!40000 ALTER TABLE `tbl_payment_settings` DISABLE KEYS */;
INSERT INTO `tbl_payment_settings` VALUES (1,'PayPal_Express','PAYPAL EXPRESS','USD','','','','https://i.imgur.com/ApBxkXU.png','1',1,'PayPal',0,1,0,1,'{\"status\":\"paypal status\",\"username\":\"Paypal Username\",\"password\":\"Paypal Password\",\"signature\":\"Paypal Signature\",\"icon\":\"Paypal Icon URL\",\"sandbox\":\"Sandbox mode paypal\"}'),(2,'PayPal_Pro','PAYPAL PRO','USD','','','','https://i.imgur.com/IHEKLgm.png','1',1,'Credit / Debit Card (Paypal Pro)',1,1,0,1,'{\"status\":\"paypal status\",\"username\":\"Paypal Username\",\"password\":\"Paypal Password\",\"signature\":\"Paypal Signature\",\"icon\":\"Paypal Icon URL\",\"sandbox\":\"Sandbox mode paypal\"}'),(3,'Stripe','STRIPE','USD','','','','https://img.favpng.com/4/21/2/stripe-logo-computer-icons-payment-png-favpng-Xv9idVp1sbtXNBadUeuNFaQW5.jpg','1',1,'Credit / Debit Card (Stripe)',1,1,0,1,'{\"status\":\"Stripe status\",\"password\":\"Stripe Publishable key\",\"signature\":\"Stripe Secret\",\"icon\":\"Stripe Icon URL\",\"sandbox\":\"Sandbox Mode \"}'),(4,'Escrow','ESCROW','USD','','','escrow','https://upload.wikimedia.org/wikipedia/commons/8/84/Escrow_com_logo.png','1',1,'Escrow Service',0,0,1,1,'{\"status\":\"Escrow status\",\"username\":\"Escrow Username\",\"signature\":\"Escrow API Key\",\"icon\":\"Escrow URL Icon\",\"sandbox\":\"Sandbox mode Escrow\"}');
/*!40000 ALTER TABLE `tbl_payment_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_payments`
--

DROP TABLE IF EXISTS `tbl_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_payments` (
  `ID` int unsigned NOT NULL AUTO_INCREMENT,
  `PAYMENT_ID` varchar(250) NOT NULL,
  `AMOUNT` varchar(250) NOT NULL,
  `METHOD` varchar(250) NOT NULL,
  `ACK` varchar(250) NOT NULL,
  `USER_ID` int NOT NULL,
  `TIMESTAMP` datetime DEFAULT CURRENT_TIMESTAMP,
  `PLAN_ID` int NOT NULL,
  `TOKEN` text NOT NULL,
  `PAYMENTINFO_0_TRANSACTIONID` text NOT NULL,
  `CORRELATIONID` text NOT NULL,
  `PAYER_ID` text NOT NULL,
  `PAYMENTINFO_0_TRANSACTIONTYPE` varchar(250) NOT NULL,
  `PAYMENTINFO_0_FEEAMT` varchar(250) NOT NULL,
  `PAYMENTINFO_0_PAYMENTTYPE` varchar(250) NOT NULL,
  `PAYMENTINFO_0_TAXAMT` varchar(250) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_payments`
--

LOCK TABLES `tbl_payments` WRITE;
/*!40000 ALTER TABLE `tbl_payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_platform_list`
--

DROP TABLE IF EXISTS `tbl_platform_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_platform_list` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `platfrom` varchar(250) NOT NULL,
  `platfrom_domain` varchar(250) NOT NULL,
  `listing_type` varchar(250) NOT NULL,
  `platfrom_icon` varchar(250) NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_platform_list`
--

LOCK TABLES `tbl_platform_list` WRITE;
/*!40000 ALTER TABLE `tbl_platform_list` DISABLE KEYS */;
INSERT INTO `tbl_platform_list` VALUES (1,'Facebook','facebook.com','account','',1);
/*!40000 ALTER TABLE `tbl_platform_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_platforms`
--

DROP TABLE IF EXISTS `tbl_platforms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_platforms` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `platform` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `icon` text NOT NULL,
  `version` varchar(250) NOT NULL,
  `radio` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `status` int NOT NULL,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP,
  `url_box` int NOT NULL,
  `box_category` int NOT NULL,
  `box_age` int NOT NULL,
  `financial_overview` int NOT NULL,
  `financial_evidence` int NOT NULL,
  `box_description` int NOT NULL,
  `box_make_money` int NOT NULL,
  `box_fulfilment` int NOT NULL,
  `box_why_selling` int NOT NULL,
  `box_perfect_for` int NOT NULL,
  `box_social` int NOT NULL,
  `box_deliver_nof` int NOT NULL,
  `box_cover` int NOT NULL,
  `box_thumbnail` int NOT NULL,
  `box_google_analytics` int NOT NULL,
  `box_platform` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_platforms`
--

LOCK TABLES `tbl_platforms` WRITE;
/*!40000 ALTER TABLE `tbl_platforms` DISABLE KEYS */;
INSERT INTO `tbl_platforms` VALUES (1,'domain','Domain','listing','domains.svg\r\n                    ','v1.2','Sell-Domains','Domain names that are undeveloped or parked. (Only the domain)',1,'2022-11-24 12:37:25',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(2,'website','Websites','listing','website.svg\r\n                    ','v1.2','Sell-Websites','Which are currently trading and is generating revenue.',1,'2022-11-24 12:37:25',0,0,0,0,0,1,0,0,0,0,0,0,0,0,1,0),(3,'auction','Auction','option','auction.svg','v1.2','auction','Post the ad and let buyers places the Bids.',1,'2022-11-24 12:37:25',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(4,'classified','Classified','option','classified.svg','v1.2','classified','Post the ad and let people make offers',1,'2022-11-24 12:37:25',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(5,'app','Apps','listing','app.svg\r\n                    ','v1.2','Sell-Apps','You are selling an Established or Starter App for mobile or tablet.',1,'2022-11-24 12:37:25',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(7,'account','Amazon Store','listing','channels.png','v2.4','Sell-Amazon Store','Selling any Telegram Channel like Facebook/ Youtube / Instagram / Twitter or etc..',1,'2022-11-24 12:37:25',1,1,1,1,1,1,1,1,1,1,1,1,0,1,0,1);
/*!40000 ALTER TABLE `tbl_platforms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_purchases`
--

DROP TABLE IF EXISTS `tbl_purchases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_purchases` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `invoice_id` varchar(250) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `plan_id` varchar(250) NOT NULL,
  `plan_header` int NOT NULL,
  `listing_type` varchar(250) NOT NULL,
  `purchase_date` datetime NOT NULL,
  `expire_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_purchases`
--

LOCK TABLES `tbl_purchases` WRITE;
/*!40000 ALTER TABLE `tbl_purchases` DISABLE KEYS */;
INSERT INTO `tbl_purchases` VALUES (1,'ccwoss8gg4','2','1',1,'domain','2022-11-24 10:56:12','2023-01-23 00:00:00'),(2,'0cocwss4sg','2','2',1,'domain','2022-11-25 07:55:19','2023-01-24 00:00:00'),(3,'sgw4gk880s','2','3',1,'domain','2022-11-25 08:01:22','2023-01-24 00:00:00'),(4,'ckosksco4o','1','4',0,'website','2022-12-01 10:01:43','2023-03-01 00:00:00'),(5,'swo444k004','1','5',0,'website','2022-12-05 07:50:01','2023-02-03 00:00:00'),(6,'c0k0kkcck8','1','5',0,'sponsored','2022-12-05 07:50:01','2022-12-10 00:00:00'),(7,'88480coc84','1','11',0,'domain','2023-02-15 01:36:29','2023-02-25 00:00:00'),(8,'kkckgo8o0g','1','11',0,'sponsored','2023-02-15 01:36:29','2023-02-16 00:00:00'),(9,'w84cc0c8k8','1','12',0,'domain','2023-04-08 02:12:57','2023-07-17 00:00:00'),(10,'8wo0ockcsw','1','12',0,'sponsored','2023-04-08 02:12:57','2023-04-18 00:00:00'),(11,'o0wog8sckg','1','13',0,'domain','2023-04-08 02:46:16','2023-07-17 00:00:00'),(12,'koooogkoc0','1','13',0,'sponsored','2023-04-08 02:46:16','2023-04-18 00:00:00'),(13,'skw8kwogk8','1','14',0,'domain','2023-04-11 20:20:52','2023-07-30 00:00:00'),(14,'0k44844sog','1','14',0,'sponsored','2023-04-11 20:20:52','2024-05-15 00:00:00'),(15,'0o8w0ocsgs','1','15',0,'domain','2023-04-11 22:54:31','2023-07-20 00:00:00'),(16,'4g4c8o80ko','1','16',0,'domain','2023-04-11 23:06:51','2023-04-14 00:00:00'),(17,'4sswswskgs','1','16',0,'sponsored','2023-04-11 23:06:51','2023-04-13 00:00:00'),(18,'g48kg8cgso','1','17',0,'domain','2023-04-12 23:25:56','2023-07-21 00:00:00'),(19,'0cc80gsc44','1','18',0,'domain','2023-04-12 23:30:58','2023-07-21 00:00:00'),(20,'40kog48sk0','1','18',0,'sponsored','2023-04-12 23:30:58','2023-07-21 00:00:00'),(21,'04w0gs800o','1','19',0,'domain','2023-04-13 22:58:55','2023-07-22 00:00:00'),(22,'wokow40o4o','1','19',0,'sponsored','2023-04-13 22:58:55','2023-07-22 00:00:00'),(23,'o8gsk00cgs','1','20',0,'domain','2023-04-27 22:51:44','2023-08-05 00:00:00'),(24,'0ksggcwok4','1','20',0,'sponsored','2023-04-27 22:51:44','2023-05-07 00:00:00'),(25,'kc4gowg0co','1','21',0,'website','2023-05-01 20:13:16','2023-08-09 00:00:00'),(26,'kc4o440ko4','1','21',0,'sponsored','2023-05-01 20:13:16','2023-08-09 00:00:00'),(27,'g4c0wk8s40','1','22',0,'website','2023-05-05 01:13:23','2026-01-29 00:00:00'),(28,'00g0w48w8o','1','22',0,'sponsored','2023-05-05 01:13:23','2024-06-08 00:00:00'),(29,'0o4cswwg8w','1','24',0,'domain','2023-06-02 05:01:26','2023-09-10 00:00:00'),(30,'0k4oows4c4','1','25',0,'domain','2023-06-03 11:26:14','2026-02-27 00:00:00'),(31,'g84scw8404','1','26',0,'domain','2023-06-03 11:27:33','2026-02-27 00:00:00'),(32,'os48s48g08','1','27',0,'domain','2023-06-03 11:37:06','2026-02-27 00:00:00'),(33,'gkwosws8wc','1','28',0,'domain','2023-06-03 11:49:23','2026-02-27 00:00:00'),(34,'08k4koc884','1','29',0,'domain','2023-06-03 11:55:12','2026-02-27 00:00:00'),(35,'008kcsowg0','1','30',0,'domain','2023-06-03 11:58:36','2026-02-27 00:00:00'),(36,'osooc4c40s','1','31',0,'domain','2023-06-03 12:00:56','2028-11-23 00:00:00'),(37,'0cs4408ws0','1','32',0,'domain','2023-06-03 12:15:51','2028-11-23 00:00:00'),(38,'8s0k8kowg0','1','33',0,'domain','2023-06-03 12:26:16','2028-11-23 00:00:00');
/*!40000 ALTER TABLE `tbl_purchases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_refferal`
--

DROP TABLE IF EXISTS `tbl_refferal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_refferal` (
  `id` int NOT NULL DEFAULT '1',
  `user_id` int NOT NULL,
  `refer` int NOT NULL,
  `status` int NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `eligible_count` int NOT NULL,
  `payment_amount` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_refferal`
--

LOCK TABLES `tbl_refferal` WRITE;
/*!40000 ALTER TABLE `tbl_refferal` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_refferal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_reports`
--

DROP TABLE IF EXISTS `tbl_reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_reports` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `listing_id` int NOT NULL,
  `reporter` int NOT NULL,
  `reason` text NOT NULL,
  `status` int NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_reports`
--

LOCK TABLES `tbl_reports` WRITE;
/*!40000 ALTER TABLE `tbl_reports` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_reviews`
--

DROP TABLE IF EXISTS `tbl_reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_reviews` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `reviewer_id` int NOT NULL,
  `user_id` int NOT NULL,
  `review` text NOT NULL,
  `ratings` int NOT NULL,
  `type` varchar(250) NOT NULL,
  `status` int NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_reviews`
--

LOCK TABLES `tbl_reviews` WRITE;
/*!40000 ALTER TABLE `tbl_reviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_settings`
--

DROP TABLE IF EXISTS `tbl_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_settings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_email_activation` int NOT NULL,
  `admin_email` varchar(250) NOT NULL,
  `admin_email_copy` varchar(250) NOT NULL,
  `json_key_file` text NOT NULL,
  `title` varchar(250) NOT NULL,
  `site_meta_keywords` text NOT NULL,
  `site_meta_description` varchar(250) NOT NULL,
  `ssl_enable` int NOT NULL,
  `user_facebook` varchar(250) NOT NULL,
  `user_twitter` varchar(250) NOT NULL,
  `user_Instagram` varchar(250) NOT NULL,
  `user_github` varchar(250) NOT NULL,
  `user_google` varchar(250) NOT NULL,
  `user_youtube` varchar(250) NOT NULL,
  `blacklisted_domains` text NOT NULL,
  `commission_based` int NOT NULL,
  `withdrawal_options` text NOT NULL,
  `default_currency` varchar(5) NOT NULL,
  `show_expired_records` int NOT NULL,
  `activate_one_listing_per_domain` int NOT NULL DEFAULT '1',
  `monetization_methods` text NOT NULL,
  `auction_period` int NOT NULL,
  `bid_value_gap` int NOT NULL,
  `hold_bidding_until_approval` int NOT NULL,
  `allow_approvedbidder_tobid` int NOT NULL,
  `allow_multiple_bidding` int NOT NULL,
  `hide_useremail` int NOT NULL,
  `sale_commission` varchar(250) NOT NULL,
  `processing_fee` float NOT NULL,
  `mark_as_completed` int NOT NULL,
  `image_thumbnails` int NOT NULL,
  `office_add1` varchar(250) NOT NULL,
  `office_add2` varchar(250) NOT NULL,
  `office_tel` varchar(250) NOT NULL,
  `office_email` varchar(250) NOT NULL,
  `google_analytics` text NOT NULL,
  `email_notifications` int NOT NULL,
  `active_domain_verification` int NOT NULL,
  `google_api_key` text NOT NULL,
  `moz_api_key` varchar(250) NOT NULL,
  `moz_access_id` varchar(250) NOT NULL,
  `active_domain_screenshots` int NOT NULL,
  `active_app_verification` int NOT NULL,
  `footer_credits` int NOT NULL,
  `escrow_direct_accept_agree` int NOT NULL,
  `escrow_run_as_broker` int NOT NULL,
  `mailchimp_apikey` varchar(250) NOT NULL,
  `mailchimp_listing_id` varchar(250) NOT NULL,
  `enable_user_selling` int NOT NULL,
  `custom_css` longtext,
  `custom_js` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_settings`
--

LOCK TABLES `tbl_settings` WRITE;
/*!40000 ALTER TABLE `tbl_settings` DISABLE KEYS */;
INSERT INTO `tbl_settings` VALUES (1,1,'','1','client_secret_342164653196-q2g1t2og71vrj55mfk87r1dvhh1plb3g.apps.googleusercontent.com.json','slippa','1','1',0,'https://www.facebook.com/namesdencom','https://twitter.com/namesdencom','https://www.instagram.com/namesden/','','','https://www.youtube.com/channel/UCjKDw2nEwfNNF3GmFPg8kpw','[\"google.com\\r\\nfacebook.com\\r\\ninstagram.com\"]',0,'[\"Paypal\",\"Payoneer\",\"Escrow\",\"Wire\"]','USD',0,0,'{\"0\":{\"name\":\"ad sense\",\"value\":\"ads\"},\"1\":{\"name\":\"subscriptions\",\"value\":\"subscribe\"}}',14,50,1,1,1,0,'20',2,3,0,'2611 Ross Ave','United States','+12486906648','support@namesden.com','UA-224715197-1',1,1,'','456b22a438cbc7422db1104505a495b0','mozscape-4e822f494c',0,1,0,0,1,'9e91f76aecafcb47f794bf92c452a5ad-us14','73a3b8a190',1,NULL,NULL);
/*!40000 ALTER TABLE `tbl_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_siteimages`
--

DROP TABLE IF EXISTS `tbl_siteimages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_siteimages` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `sitelogo` varchar(250) NOT NULL,
  `favicon` varchar(250) NOT NULL,
  `homepage` varchar(250) NOT NULL,
  `mainback` varchar(250) NOT NULL,
  `invoice_logo` varchar(250) NOT NULL,
  `loader` varchar(250) NOT NULL,
  `backgrounds` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_siteimages`
--

LOCK TABLES `tbl_siteimages` WRITE;
/*!40000 ALTER TABLE `tbl_siteimages` DISABLE KEYS */;
INSERT INTO `tbl_siteimages` VALUES (1,'header-logo.png','Thumbnail.png','SL-093020-35920-01.jpg','5172658.jpg','header-logo.png','loader.gif','breadcump-img-red-dark-2.png');
/*!40000 ALTER TABLE `tbl_siteimages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_social_logins`
--

DROP TABLE IF EXISTS `tbl_social_logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_social_logins` (
  `id` int NOT NULL,
  `name` varchar(250) NOT NULL,
  `appid` text,
  `secretid` text,
  `icon` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_social_logins`
--

LOCK TABLES `tbl_social_logins` WRITE;
/*!40000 ALTER TABLE `tbl_social_logins` DISABLE KEYS */;
INSERT INTO `tbl_social_logins` VALUES (1,'Facebook','','','fa fa-facebook'),(2,'Google','','','fa-fa-google');
/*!40000 ALTER TABLE `tbl_social_logins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_ip`
--

DROP TABLE IF EXISTS `tbl_user_ip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_user_ip` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_ip` text NOT NULL,
  `count` int NOT NULL,
  `datetime` datetime NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_ip`
--

LOCK TABLES `tbl_user_ip` WRITE;
/*!40000 ALTER TABLE `tbl_user_ip` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_user_ip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_users` (
  `user_id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `thumbnail` varchar(250) NOT NULL,
  `cover_pic` varchar(250) NOT NULL,
  `user_country` varchar(250) NOT NULL,
  `user_review` int NOT NULL,
  `password` text NOT NULL,
  `user_membership_id` varchar(250) NOT NULL,
  `user_membership_timestamp` datetime NOT NULL,
  `user_membership_timestamp_expiry` datetime NOT NULL,
  `user_ip` int NOT NULL,
  `user_status` int NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `hour_started` int NOT NULL,
  `token` text NOT NULL,
  `user_level` int NOT NULL,
  `social_twitter` varchar(250) NOT NULL,
  `social_github` varchar(250) NOT NULL,
  `social_facebook` varchar(250) NOT NULL,
  `social_youtube` varchar(250) NOT NULL,
  `user_metadescription` varchar(250) NOT NULL,
  `user_description` text NOT NULL,
  `online` int NOT NULL,
  `paypal` text,
  `payoneer` text,
  `bank_transfer` text,
  `escrow_email` varchar(250) NOT NULL,
  `referral_code` varchar(250) DEFAULT NULL,
  `referrer` int DEFAULT '0',
  `identifier` text,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username_2` (`username`),
  UNIQUE KEY `email_2` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_users`
--

LOCK TABLES `tbl_users` WRITE;
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` VALUES (1,'admin','Names','Den','support@onlinetoolhub.com','Blue_Dark_Minimalist_Initial_N_Letter_Logo1.png','','US',0,'0e7517141fb53f21ee439b355b5a1d0a','','2022-11-24 08:07:26','2022-11-24 08:07:26',0,2,'2022-11-24 12:37:26',0,'',0,'https://www.facebook.com/namesdencom','','','https://www.youtube.com/channel/UCjKDw2nEwfNNF3GmFPg8kpw','','',1,'N/A','N/A','N/A','',NULL,0,NULL),(2,'wavazibebo','Jada','Rosario','ganeendra1@gmail.com','user.png','','',0,'0e7517141fb53f21ee439b355b5a1d0a','0','0000-00-00 00:00:00','0000-00-00 00:00:00',0,2,'2022-11-24 08:14:38',0,'kcoogccs84w8gko8ss8w4skgog0wkggsoscc0k8c',1,'','','','','','',0,NULL,NULL,NULL,'',NULL,0,NULL);
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_videos`
--

DROP TABLE IF EXISTS `tbl_videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_videos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_videos`
--

LOCK TABLES `tbl_videos` WRITE;
/*!40000 ALTER TABLE `tbl_videos` DISABLE KEYS */;
INSERT INTO `tbl_videos` VALUES (1,'domain','https://www.youtube.com/embed/SC1XE85BC9o'),(2,'website','https://www.youtube.com/embed/SC1XE85BC9o');
/*!40000 ALTER TABLE `tbl_videos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_withdrawal_methods`
--

DROP TABLE IF EXISTS `tbl_withdrawal_methods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_withdrawal_methods` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `method` varchar(250) NOT NULL,
  `threshold` float NOT NULL,
  `fee` float NOT NULL,
  `cal_meth` int NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_withdrawal_methods`
--

LOCK TABLES `tbl_withdrawal_methods` WRITE;
/*!40000 ALTER TABLE `tbl_withdrawal_methods` DISABLE KEYS */;
INSERT INTO `tbl_withdrawal_methods` VALUES (1,'Paypal',1,1,0,1),(2,'Payoneer',50,5,1,1),(3,'Bank Transfer',200,30,1,1);
/*!40000 ALTER TABLE `tbl_withdrawal_methods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_withdrawals`
--

DROP TABLE IF EXISTS `tbl_withdrawals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_withdrawals` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `withdrawal_id` varchar(250) NOT NULL,
  `user_id` int NOT NULL,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL,
  `amount` float NOT NULL,
  `fee` float NOT NULL,
  `final_amount` float NOT NULL,
  `method` int NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_withdrawals`
--

LOCK TABLES `tbl_withdrawals` WRITE;
/*!40000 ALTER TABLE `tbl_withdrawals` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_withdrawals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uploads`
--

DROP TABLE IF EXISTS `uploads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `uploads` (
  `id` int NOT NULL AUTO_INCREMENT,
  `public_id` varchar(50) NOT NULL,
  `original_file` varchar(512) NOT NULL,
  `mime_type` varchar(50) NOT NULL,
  `server_file` varchar(512) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `public_id` (`public_id`),
  UNIQUE KEY `server_file` (`server_file`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uploads`
--

LOCK TABLES `uploads` WRITE;
/*!40000 ALTER TABLE `uploads` DISABLE KEYS */;
/*!40000 ALTER TABLE `uploads` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-09-22 13:24:03
