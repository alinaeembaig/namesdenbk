-- MySQL dump 10.13  Distrib 5.7.42, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: slippa
-- ------------------------------------------------------
-- Server version	5.7.42-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_faq`
--

DROP TABLE IF EXISTS `tbl_faq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(250) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_faq`
--

LOCK TABLES `tbl_faq` WRITE;
/*!40000 ALTER TABLE `tbl_faq` DISABLE KEYS */;
INSERT INTO `tbl_faq` VALUES (1,'domain','What happens after I purchase a domain name from BrandBucket?',' Every name on the BrandBucket marketplace is exclusively listed with BrandBucket. That means that all of our sellers are very responsive, making for quick domain transfers.\r\nA dedicated BrandBucket agent will manage your domain transfer from beginning to end, ensuring a secure and easy transaction. They will manage the receipt of the domain into one of BrandBucket’s secure registrar accounts and then complete the transfer to you.\r\n\r\n1. Verification and registrar choice\r\nAfter we receive the payment and verify it, we will reach out via email to confirm which registrar you want the domain transferred to. We also provide a link to our tracking system, where you can communicate with us, check on the status of your transfer, view your invoice, and download your logo files.\r\n\r\nIn most cases, if a domain is moved between accounts at a single registrar, the transfer is quick and usually completes within 48 hours. If a domain changes registrars (in other words, you would like to move it away from where it is currently registered), the transfer is slower. The total transfer time can then be anywhere from 48 hours to 7 days.'),(2,'domain','Why choose BrandBucket?','Established in 2007, we are the original business name marketplace. Every year, we sell 1000s of premium domains to entrepreneurs and businesses like you.\r\n\r\nAll of our domain names are handpicked by branding and linguistics experts based on rigorous criteria. You can rest assured that if a domain is on the BrandBucket marketplace, it is a top-tier business name.\r\n\r\nAlmost one out of every four names sold on BrandBucket is sold to a repeat buyer or a referral, which means that people who buy from us once, keep coming back for more.'),(3,'website','What happens after I purchase a domain name from BrandBucket?',' Every name on the BrandBucket marketplace is exclusively listed with BrandBucket. That means that all of our sellers are very responsive, making for quick domain transfers.\r\nA dedicated BrandBucket agent will manage your domain transfer from beginning to end, ensuring a secure and easy transaction. They will manage the receipt of the domain into one of BrandBucket’s secure registrar accounts and then complete the transfer to you.\r\n\r\n1. Verification and registrar choice\r\nAfter we receive the payment and verify it, we will reach out via email to confirm which registrar you want the domain transferred to. We also provide a link to our tracking system, where you can communicate with us, check on the status of your transfer, view your invoice, and download your logo files.\r\n\r\nIn most cases, if a domain is moved between accounts at a single registrar, the transfer is quick and usually completes within 48 hours. If a domain changes registrars (in other words, you would like to move it away from where it is currently registered), the transfer is slower. The total transfer time can then be anywhere from 48 hours to 7 days.'),(4,'website','Why choose BrandBucket?','Established in 2007, we are the original business name marketplace. Every year, we sell 1000s of premium domains to entrepreneurs and businesses like you.\r\n\r\nAll of our domain names are handpicked by branding and linguistics experts based on rigorous criteria. You can rest assured that if a domain is on the BrandBucket marketplace, it is a top-tier business name.\r\n\r\nAlmost one out of every four names sold on BrandBucket is sold to a repeat buyer or a referral, which means that people who buy from us once, keep coming back for more.');
/*!40000 ALTER TABLE `tbl_faq` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-17  1:18:45
