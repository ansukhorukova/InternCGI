CREATE DATABASE  IF NOT EXISTS `test` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `test`;
-- MySQL dump 10.13  Distrib 5.7.13, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: test
-- ------------------------------------------------------
-- Server version	5.7.13

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
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT '',
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (1,'I\'m a message','error','2016-06-24 10:56:19'),(2,'I\'m a message','warning','2016-06-24 10:56:19'),(3,'I\'m a message','notice','2016-06-24 10:56:19'),(4,'I\'m a message','error','2016-06-24 11:44:15'),(5,'I\'m a message','warning','2016-06-24 11:44:16'),(6,'I\'m a message','notice','2016-06-24 11:44:18'),(7,'I\'m a message','error','2016-06-24 11:50:59'),(8,'I\'m a message','warning','2016-06-24 11:50:59'),(9,'I\'m a message','notice','2016-06-24 11:50:59'),(10,'I\'m a message','error','2016-06-24 15:05:34'),(11,'I\'m a message','warning','2016-06-24 15:05:34'),(12,'I\'m a message','notice','2016-06-24 15:05:34'),(13,'I\'m a message','error','2016-06-27 09:03:54'),(14,'I\'m a message','warning','2016-06-27 09:03:54'),(15,'I\'m a message','notice','2016-06-27 09:03:54'),(16,'I\'m a message','error','2016-06-27 09:08:09'),(17,'I\'m a message','warning','2016-06-27 09:08:09'),(18,'I\'m a message','notice','2016-06-27 09:08:09'),(19,'I\'m a message','error','2016-06-27 09:26:05'),(20,'I\'m a message','warning','2016-06-27 09:26:08'),(21,'I\'m a message','notice','2016-06-27 09:26:10'),(22,'I\'m a message','error','2016-06-27 09:31:58'),(23,'I\'m a message','warning','2016-06-27 09:31:58'),(24,'I\'m a message','notice','2016-06-27 09:31:58'),(25,'I\'m a message','error','2016-06-27 12:05:57'),(26,'I\'m a message','warning','2016-06-27 12:05:57'),(27,'I\'m a message','notice','2016-06-27 12:05:57'),(28,'I\'m a message','error','2016-06-27 12:06:14'),(29,'I\'m a message','warning','2016-06-27 12:06:14'),(30,'I\'m a message','notice','2016-06-27 12:06:30'),(31,'I\'m a message','error','2016-06-27 12:07:27'),(32,'I\'m a message','warning','2016-06-27 12:07:27'),(33,'I\'m a message','notice','2016-06-27 12:07:27'),(34,'I\'m a message','error','2016-06-27 12:20:36'),(35,'I\'m a message','warning','2016-06-27 12:20:36'),(36,'I\'m a message','notice','2016-06-27 12:20:36'),(37,'I\'m a message','error','2016-06-27 12:20:42'),(38,'I\'m a message','warning','2016-06-27 12:20:42'),(39,'I\'m a message','notice','2016-06-27 12:20:42'),(40,'I\'m a message','error','2016-06-27 16:55:19'),(41,'I\'m a message','warning','2016-06-27 16:55:24'),(42,'I\'m a message','notice','2016-06-27 16:55:24'),(43,'I\'m a message','error','2016-06-27 16:56:28'),(44,'I\'m a message','warning','2016-06-27 16:56:28'),(45,'I\'m a message','notice','2016-06-27 16:56:28'),(46,'I\'m a message','error','2016-06-27 16:58:09'),(47,'I\'m a message','warning','2016-06-27 16:58:09'),(48,'I\'m a message','notice','2016-06-27 16:58:09'),(49,'I\'m a message','error','2016-06-27 16:59:58'),(50,'I\'m a message','warning','2016-06-27 16:59:58'),(51,'I\'m a message','notice','2016-06-27 16:59:58'),(52,'I\'m a message','error','2016-06-27 17:51:21'),(53,'I\'m a message','warning','2016-06-27 17:51:21'),(54,'I\'m a message','notice','2016-06-27 17:51:21'),(55,'I\'m a message','error','2016-06-27 21:41:18'),(56,'I\'m a message','warning','2016-06-27 21:41:18'),(57,'I\'m a message','notice','2016-06-27 21:41:18'),(58,'I\'m a message','notice','2016-06-29 19:36:33'),(59,'I\'m a message','notice','2016-06-30 09:20:21'),(60,'I\'m a message','notice','2016-06-30 10:10:28'),(61,'I\'m a message','notice','2016-06-30 10:13:27'),(62,'I\'m a message','notice','2016-06-30 13:51:17'),(63,'I\'m a message','notice','2016-06-30 14:29:59'),(64,'I\'m a message','notice','2016-06-30 14:59:58'),(65,'I\'m a message','notice','2016-06-30 15:08:37'),(66,'I\'m a message','notice','2016-06-30 15:15:32'),(67,'I\'m a message','notice','2016-06-30 15:42:54'),(68,'I\'m a message','notice','2016-06-30 15:45:45'),(69,'I\'m a message','notice','2016-06-30 15:58:23'),(70,'I\'m a message','notice','2016-06-30 15:59:21'),(71,'I\'m a message','notice','2016-06-30 16:00:40'),(72,'I\'m a message','notice','2016-06-30 16:01:41'),(73,'I\'m a message','notice','2016-06-30 16:03:13'),(74,'I\'m a message','notice','2016-06-30 16:06:50'),(75,'I\'m a message','notice','2016-06-30 16:08:49'),(76,'I\'m a message','notice','2016-06-30 16:11:28'),(77,'I\'m a message','notice','2016-06-30 16:12:22'),(78,'I\'m a message','notice','2016-06-30 16:28:11'),(79,'I\'m a message','notice','2016-06-30 16:28:41'),(80,'I\'m a message','notice','2016-06-30 16:30:30'),(81,'I\'m a message','notice','2016-06-30 16:31:12'),(82,'I\'m a message','notice','2016-06-30 16:31:29'),(83,'I\'m a message','notice','2016-06-30 16:32:21'),(84,'I\'m a message','notice','2016-06-30 16:36:32'),(85,'I\'m a message','notice','2016-06-30 16:41:58'),(86,'I\'m a message','notice','2016-06-30 16:52:56'),(87,'I\'m a message','notice','2016-06-30 16:53:42'),(88,'I\'m a message','notice','2016-06-30 16:58:15'),(89,'I\'m a message','notice','2016-06-30 18:12:32'),(90,'I\'m a message','notice','2016-06-30 18:54:31');
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `sku` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `name` text NOT NULL,
  `final_price_with_tax` varchar(255) NOT NULL,
  `is_saleable` char(5) NOT NULL,
  `updated_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'ace000','Gunmetal frame with crystal gradient polycarbonate lenses in grey. ','Aviator Sunglasses','321.55','1','2016-07-17 23:07:38'),(2,'ace001','Acetate frame. Polycarbonate lenses.','Jackie O Round Sunglasses','245.25','1','2016-07-17 23:07:38'),(3,'ace002','Acetate frame. Polycarbonate lenses.','Retro Chic Eyeglasses','321.55','1','2016-07-17 23:07:38'),(4,'abl000','Pebbled leather. Contrast stitching. Fold over flap with Fasten closure. Crossbody strap. 6\" x 8\" x 0.75\".','Isla Crossbody Handbag','316.1','1','2016-07-17 23:07:38'),(5,'abl002','Pebble textured leather tabled case. Top zip closure. Exterior zipper pocket. Fully lined with back wall slip pocket. 8.75\" x 11\" x .5\". Imported.','Flatiron Tablet Sleeve','163.5','1','2016-07-17 23:07:38'),(6,'abl003','Leather, with flap closure. Padded carrying handles. Main compartment has padded laptop pocket, file section and organizer panel. Quick access back pocket. Padded adjustable shoulder strap. 16\" x 12\" x 3.5\". Domestic.','Broad St. Flapover Briefcase','436','1','2016-07-17 23:07:38'),(7,'abl004','Leather. 4\" x 6.5\" x 0.5\"','Houston Travel Wallet','163.5','1','2016-07-17 23:17:56'),(8,'abl005','Zip closure. Water resistant hard polycarbonate shell. All direction spinner wheels. Retractable plastic handle. Cross strap interior. 29\" x 20\" x 13\".','Roller Suitcase','708.5','1','2016-07-17 23:07:38'),(9,'hdb000','Lemon flower and Aloe Vera extract. Super moisturizing. ','Body Wash with Lemon Flower Extract and Aloe Vera','30.52','1','2016-07-17 23:07:38'),(10,'hdb002','Milk and shea extracts. Long lasting moisturizer. 100% natural and gentle enough for sensitive skin. Fast absorbing. Non greasy. 250mL/8.4oz. Domestic.','Shea Enfused Hydrating Body Lotion','30.52','1','2016-07-17 23:07:38');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `sku` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `name` text NOT NULL,
  `final_price_with_tax` float NOT NULL,
  `is_saleable` char(5) NOT NULL,
  `updated_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'ace000','Gunmetal frame with crystal gradient polycarbonate lenses in grey. ','Aviator Sunglasses',321.55,'true','2016-07-17 12:35:10');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(256) DEFAULT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (10,'Ivan','Vanya123@exe.com',NULL,'2016-07-05 09:37:31'),(11,'Ivan','Vanya123@exe.com',NULL,'2016-07-05 12:10:39'),(12,'Mark','Mark123@exe.com',NULL,'2016-07-05 12:17:28'),(13,'Frank','eppp@il.com',NULL,'2016-07-05 12:19:39'),(14,'Jim','Jimmy13@exe.com','$2y$07$RC92dFZlSDAzdDIxM2QhQ.aaw5leLhErZ7yaQF4AdpKxjPIf0xtJm','2016-07-05 13:03:26'),(15,'Jim','eppp@il.com','$2y$07$RC92dFZlSDAzdDIxM2QhQ.j4S1PRLTzv4o1nhkJey9gaIsiPNGg3S','2016-07-05 13:03:59'),(16,'Jim','eppp@il.com','$2y$07$RC92dFZlSDAzdDIxM2QhQ.j4S1PRLTzv4o1nhkJey9gaIsiPNGg3S','2016-07-05 13:28:48'),(17,'Frank','Frank123@exe.com',NULL,'2016-07-05 15:30:05'),(18,'Frank','Frank123@exe.com',NULL,'2016-07-05 16:06:30'),(19,'Frank','Frank123@exe.com',NULL,'2016-07-05 16:10:48'),(20,'Frank','Frank123@exe.com',NULL,'2016-07-05 16:12:52'),(21,'Frank','Frank123@exe.com',NULL,'2016-07-05 16:13:52'),(22,'Frank','Frank123@exe.com',NULL,'2016-07-06 08:59:19'),(23,'Frank','Frank123@exe.com',NULL,'2016-07-07 09:04:50'),(24,'Frank','Frank123@exe.com',NULL,'2016-07-07 18:24:48'),(25,'Frank','Frank123@exe.com',NULL,'2016-07-08 08:52:04'),(26,'Frank','Frank123@exe.com',NULL,'2016-07-08 09:52:41'),(27,'Frank','Frank123@exe.com',NULL,'2016-07-08 18:59:50'),(28,'Frank','Frank123@exe.com',NULL,'2016-07-11 08:51:45'),(29,'Frank','Frank123@exe.com',NULL,'2016-07-11 15:17:16'),(30,'johndoe','johndoe@example.com','$2y$07$RC92dFZlSDAzdDIxM2QhQ.aaw5leLhErZ7yaQF4AdpKxjPIf0xtJm','2016-07-13 11:31:29');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,'Petya','Ivanov','customer','customer','customer1','customer@example.com','2016-06-28 21:48:29'),(5,'Petya','Ivanov','customer','customer','customer1','customer@example.com','2016-06-28 21:56:45'),(6,'Petya','Ivanov','customer','customer','customer1','customer@example.com','2016-06-28 22:40:58'),(7,'Petya','Ivanov','customer','customer','customer1','customer@example.com','2016-06-28 22:41:57'),(8,'Petya','Ivanov','customer','customer','customer1','customer@example.com','2016-06-29 08:57:35'),(10,'Vanya','Ivanov','customer','customer','customer2','customer2@example.com','2016-06-29 12:10:19'),(12,'Petya','Sidorov','customer','customer','customer3','customer3@example.com','2016-06-29 13:41:27'),(13,'Petya','Sidorov','customer','customer','customer3','customer3@example.com','2016-06-29 14:21:03'),(14,'Petya','Sidorov','customer','customer','customer3','customer3@example.com','2016-06-29 14:29:00'),(16,'Petya','Sidorov','customer','customer','customer3','customer3@example.com','2016-06-29 14:34:17'),(17,'Petya','Sidorov','customer','customer','customer3','customer3@example.com','2016-06-29 14:34:37'),(18,'Petya','Sidorov','customer','customer','customer3','customer3@example.com','2016-06-29 14:35:16');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-17 23:28:29
