-- MySQL dump 10.13  Distrib 5.7.12, for Linux (x86_64)
--
-- Host: localhost    Database: test
-- ------------------------------------------------------
-- Server version	5.7.12-0ubuntu1.1

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
  `final_price_with_tax` float NOT NULL,
  `is_saleable` char(5) NOT NULL,
  `updated_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sku_UNIQUE` (`sku`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'ace000','Gunmetal frame with crystal gradient polycarbonate lenses in grey. ','Aviator Sunglasses',321.55,'1','2016-07-21 13:50:30'),(2,'ace001','Acetate frame. Polycarbonate lenses.','Jackie O Round Sunglasses',245.25,'1','2016-07-21 13:50:30'),(3,'ace002','Acetate frame. Polycarbonate lenses.','Retro Chic Eyeglasses',321.55,'1','2016-07-21 13:50:30'),(4,'abl000','Pebbled leather. Contrast stitching. Fold over flap with Fasten closure. Crossbody strap. 6\" x 8\" x 0.75\".','Isla Crossbody Handbag',316.1,'1','2016-07-21 13:50:30'),(5,'abl002','Pebble textured leather tabled case. Top zip closure. Exterior zipper pocket. Fully lined with back wall slip pocket. 8.75\" x 11\" x .5\". Imported.','Flatiron Tablet Sleeve',163.5,'1','2016-07-21 13:50:30'),(6,'abl003','Leather, with flap closure. Padded carrying handles. Main compartment has padded laptop pocket, file section and organizer panel. Quick access back pocket. Padded adjustable shoulder strap. 16\" x 12\" x 3.5\". Domestic.','Broad St. Flapover Briefcase',436,'1','2016-07-21 13:50:30'),(7,'abl004','Leather. 4\" x 6.5\" x 0.5\"','Houston Travel Wallet',163.5,'1','2016-07-21 13:50:30'),(8,'abl005','Zip closure. Water resistant hard polycarbonate shell. All direction spinner wheels. Retractable plastic handle. Cross strap interior. 29&quot; x 20&quot; x 13&quot;.','Roller Suitcase',708.5,'1','2016-07-21 15:52:45'),(9,'hdb000','Lemon flower and Aloe Vera extract. Super moisturizing. ','Body Wash with Lemon Flower Extract and Aloe Vera',30.52,'1','2016-07-21 13:50:30'),(10,'hdb002','Milk and shea extracts. Long lasting moisturizer. 100% natural and gentle enough for sensitive skin. Fast absorbing. Non greasy. 250mL/8.4oz. Domestic.','Shea Enfused Hydrating Body Lotion',30.52,'1','2016-07-21 13:50:30'),(11,'hdb005','20\" x 20\". Raw Silk. Hidden zipper closure. Interior pillow included. 100% polyester fill. Dry clean. Imported.','Titian Raw Silk Pillow',136.25,'1','2016-07-21 13:50:30'),(12,'hdb006','20\" x 20\". Printed polyester. Hidden zipper closure. Interior pillow included. 100% polyester fill. Spot clean. Imported.','Shay Printed Pillow',228.9,'1','2016-07-21 13:50:30'),(13,'hdb007','Woven alpaca wool. 4\" fringe detail. Dry clean. Imported.','Carnegie Alpaca Throw',299.75,'1','2016-07-21 13:50:30'),(14,'hdb008','Woven acrylic/wool/cotton. 50\" x 75\". Spot clean.','Park Row Throw',130.8,'1','2016-07-21 13:50:30'),(15,'hdb009','Woven cotton. 60\" x 72\". Machine wash.','Gramercy Throw',299.75,'1','2016-07-21 13:50:30'),(16,'hdd000','Blown glass. 10\" diameter. 17\" high. Imported.','Herald Glass Vase',119.9,'1','2016-07-21 13:50:30'),(17,'hdd004','Glazed stoneware. 2\" diam. 5.5\" x 5.5\" coaster. Set of 2. Domestic.','Stone Salt and Pepper Shakers',70.85,'1','2016-07-21 13:50:30'),(18,'hdd005','8\" diffuser reeds. 2oz fragrance oil. Decorative wood container.','Fragrance Diffuser Reeds',81.75,'1','2016-07-21 13:50:30'),(19,'hdd006','Painted glass. Geometric pattern. Set of 3. Domestic.','Geometric Candle Holders',49.05,'1','2016-07-21 13:50:30'),(20,'hde001','10x Optical Zoom with 24mm Wide-angle and close up.10.7-megapixel backside illuminated CMOS sensor for low light shooting.  3\" Multi-angle LCD. SD/SDXC slot. Full HD Video. High speed continuous shooting (up to 5 shots in approx one second) Built in GPS. Easy Panorama. Rechargable Li-ion battery. File formats: Still-JPEG, Audio- WAV, Movies-MOV. Image size: up to 4600x3400. Built in flash. 3.5\" x 5\" x 4\". 20oz.','Madison LX2200',463.25,'1','2016-07-21 13:50:30'),(21,'hde003','18-55mm zoom lens. 3.0&quot; LCD display with image editing features.  Built in flash with flash modes and pop up. SD/SDXC slot. Full 1080p HD video. Rechargable Lithium-Ion battery. File formats: NEF (RAW), JPEG, MOV. 5&quot; x 3&quot; x 4&quot;, 15oz.','Madison RX3400',780.35,'1','2016-07-21 15:51:27'),(22,'hde004','16GB SD memory card. Shock, water, and xray resistant.','16GB Memory Card',32.7,'1','2016-07-21 13:50:30'),(23,'hde005','8GB SD memory card. Shock, water, and xray resistant.','8GB Memory Card',21.8,'1','2016-07-21 13:50:30'),(24,'hde006','Flap closure. Microfiber. 8.5\" x 5\" x 6\". Domestic.','Large Camera Bag',130.8,'1','2016-07-21 13:50:30'),(25,'hde010','Balanced audio. Enhanced bass.  Includes cable clip, diaphragm guard, cleaning tool, travel pouch and airline adapter.','Madison Earbuds',38.15,'1','2016-07-21 13:50:30'),(26,'hde011','Steel and aluminum. Soft leather pivoting earcups and adjustable headband.  Enhanced bass. Aggressive noise cancellation.','Madison Overear Headphones',136.25,'1','2016-07-21 13:50:30'),(27,'hde012','2.5-inch LCD screen for crisp, colorful video. Compatible with multiple audio formats. Available in 8GB. Earbuds not included.','Madison 8GB Digital Media Player',163.5,'1','2016-07-21 13:50:30'),(28,'msj000c','Button front. Long sleeves. Tapered collar, chest pocket, french cuffs.','French Cuff Cotton Twill Oxford',207.1,'','2016-07-21 13:50:30'),(29,'msj003c','Tailored/Slim fit. Long sleeves. Button cuff. Cotton. Imported.','Slim fit Dobby Oxford Shirt',152.6,'','2016-07-21 13:50:30'),(30,'msj006c','Available in Sharp fit. Refined collar. Button cuff. Cotton. Machine wash. Made in US.','Plaid Cotton Shirt',174.4,'','2016-07-21 13:50:30'),(31,'msj009c','Two button, single vented, notched lapels. Three buttons at cuff. Interior buttoned welt pockets. Full polyester lining. 100% wool. Dry clean.','Sullivan Sport Coat',555.9,'','2016-07-21 13:50:30'),(32,'msj012c','Single vented, notched lapels. Flap pockets. Tonal stitching. Fully lined. Linen. Dry clean.','Linen Blazer',495.95,'','2016-07-21 13:50:30'),(33,'msj015c','Two button, single vented, notched lapels. Slim cut through the shoulders chest and waist. Flap pockets, welt inside chest pockets. Cotton/lycra. Dry clean.','Stretch Cotton Blazer',534.1,'','2016-07-21 13:50:30'),(34,'mtk000c','Ultrasoft, lightweight V-neck tee. 100% cotton. Machine wash.','Chelsea Tee',81.75,'','2016-07-21 13:50:30'),(35,'mtk002c','Ultrasoft, lightweight V-neck tee. 100% cotton. Machine wash.','Chelsea Tee',81.75,'','2016-07-21 13:50:30'),(36,'mtk004c','Ultrasoft, lightweight V-neck tee. 100% cotton. Machine wash.','Chelsea Tee',81.75,'','2016-07-21 13:50:30'),(37,'mtk006c','Long sleeve, pull over style. V-neck. Relaxed fit through the chest. Ribbed neckline, cuff and hem. 100% Merino wool. Dry clean.','Merino V-neck Pullover Sweater',228.9,'','2016-07-21 13:50:30'),(38,'mtk009c','V-neck cardigan. Mother of pearl front button closure. Two dart pockets. Ribbed cuff and hem. 100% cotton. Hand wash.','Lexington Cardigan Sweater',196.2,'','2016-07-21 13:50:30'),(39,'mtk012c','Slim fit. Two chest pockets. Silver grommet detail. Grinding and nicking at hems. 100% cotton. ','Core Striped Sport Shirt',136.25,'','2016-07-21 13:50:30'),(40,'mpd003c','Straight leg chino. Back pockets with button closure. 14\" leg opening. Zip fly. 100% cotton.','Bowery Chino Pants',152.6,'','2016-07-21 13:50:30'),(41,'mpd006c','Lightly faded cotton denim. Sits below waist. Slim through hip and thigh. 15\" leg opening. Zip fly. Machine wash. ','The Essential Boot Cut Jean',152.6,'','2016-07-21 13:50:30'),(42,'mpd012c','Flat front trouser. Slim through the hip thigh and ankle. Zip fly. Lined. 100% wool. Dry clean.','Flat Front  Trouser',212.55,'','2016-07-21 13:50:30'),(43,'wbk000c','Silk cami. Tie front detail, with hook and eye. Ruched neckline. Loose through the chest and bodice. 100% Silk. Dry clean.','NoLIta Cami',163.5,'','2016-07-21 13:50:30'),(44,'wbk003c','Ribbed scoop neck tank. 100% cotton.Machine wash.','Tori Tank',65.4,'','2016-07-21 13:50:30'),(45,'wbk006c','Oversized knitted silk blend cardigan. Front button closure. Ribbed hem. Silk/rayon. Dry clean.','Delancy Cardigan Sweater',299.75,'','2016-07-21 13:50:30'),(46,'wbk009c','Oxford, fitted through the waist. V-neck, front button closure.100% cotton. Machine wash.','Ludlow Oxford Top',201.65,'','2016-07-21 13:50:30'),(47,'wbk012c','Loose fitting from the shoulders, open weave knit top. Semi sheer.  Slips on. Faux button closure detail on the back. Linen/Cotton. Machine wash.','Elizabeth Knit Top',230.9,'','2016-07-21 17:24:03'),(48,'wsd000c','Knee length skirt. Sits on natural waist. Fitted through the hip. Exposed waist belt loops. Hidden zip and hook and eye closure in back. Full lining. Wool/cotton/polyester. Machine wash.','Essex Pencil Skirt',201.65,'','2016-07-21 13:50:30'),(49,'wsd005c','Racer back maxi dress. Pull over style. Loose fitting. Straight skirt falls to floor. Viscose.','Racer Back Maxi Dress',244.16,'','2016-07-21 18:28:39'),(50,'wsd008c','Sleeveless, jewel neckline with deep Vee in back. Fitted through waist and hip. 100% polyester lining. Cotton/wool. Dry clean.','Ludlow Sheath Dress',332.45,'','2016-07-21 13:50:30'),(51,'wsd013c','Two sash, convertible neckline with front ruffle detail. Unhemmed, visisble seams. Hidden side zipper. Unlined. Wool/elastane. Hand wash.','Lafayette Convertible Dress',370.6,'','2016-07-21 13:50:30'),(52,'wpd000c','Ultra slim-fit, stretch denim. Mid rise. 5 pockets, tonal stitching,. Cotton. Machine wash.','TriBeCa Skinny Jean',201.65,'','2016-07-21 13:50:30'),(53,'wpd005c','Straight leg boyfriend-fit. Distressed denim. 5 pockets. Contrast stitch detailing. Large to size, choose size down. Machine wash.','DUMBO Boyfriend Jean',125.9,'','2016-07-21 13:50:30'),(54,'wpd010c','Wide leg pant, front pleat detail. Sits on natural waist. Wool, unlined. Dry clean.','Park Avenue Pleat Front Trousers',267.05,'','2016-07-21 13:50:30'),(55,'aws000c','Leather. 3.5\" heel. Peep toe and ankle strap. Leather insole and lining.','Barclay d\'Orsay pump, Nude',425.1,'','2016-07-21 13:50:30'),(56,'aws005c','Leather. Inside zipper. 3-button outside detail. 4.5\" heel, 1\" platform, 3.5\" equiv. Leather insole and lining. Red sole. Made in Italy.','Ann Ankle Boot',512.3,'','2016-07-21 13:50:30'),(57,'aws010c','Suede. Square toe. 1/4\" flat heel. Padded leather insole and lining. Rubber outsole provides traction.','Hana Flat, Charcoal',210,'','2016-07-21 13:50:30'),(58,'ams000c','Polished leather upper. Perforated detail on toe. Oxford lace-up front. Leather lining and footbed. 1\" rubber heel. Imported.','Dorian Perforated Oxford',446.9,'','2016-07-21 13:50:30'),(59,'ams005c','Wingtip medallion toe oxford with contrast waxed cotton laces.  Leather upper and lining. Leather sole. Made in Italy.','Wingtip Cognac Oxford',408.75,'','2016-07-21 13:50:30'),(60,'ams010c','Suede loafer. Contrast stitching. Leather lined. Imported.','Suede Loafer, Navy',337.9,'','2016-07-21 13:50:30'),(61,'abl006c','Water resistant hard polycarbonate shell. All direction spinner wheels. Zip closure. Locking, retractable metal handle. Cross strap and self repairing zipper interior. Padded side handle for lateral carry. 21\" x 17\" x 10\".','Classic Hardshell Suitcase',654,'','2016-07-21 13:50:30'),(62,'hdd001c','Ceramic. 5.5\" diameter, 12\" high. ','Modern Murray Ceramic Vase',59.95,'','2016-07-21 13:50:30'),(63,'abl008','Water resistant hard polycarbonate shell. All direction spinner wheels. Zip closure. Locking, retractable metal handle. Cross strap and self repairing zipper interior. Padded side handle for lateral carry. 21&quot; x 17&quot; x 10&quot; and/or 29&quot; x 20&quot; x 13&quot;.','Luggage Set',10,'','2016-07-21 15:59:13'),(64,'hdd003','Ceramic. 5.5&quot; diameter, 12&quot; high. Domestic.','Vase Set',10,'','2016-07-21 15:59:32'),(65,'hde007','3-Year coverage from date of purchase on hardware failures. Fixed or receive full replacement cost in 5 days or less - guaranteed. Free 2-way shipping for repairs. 100% parts and labor covered with no deductables. Fully transferable with gifts. Cancel anytime for a full refund within the first 30 days.','3-Year Warranty',81.75,'1','2016-07-21 13:50:30'),(66,'hde008','5-Year coverage from date of purchase on hardware failures. Fixed or receive full replacement cost in 5 days or less - guaranteed. Free 2-way shipping for repairs. 100% parts and labor covered with no deductables. Fully transferable with gifts. Cancel anytime for a full refund within the first 30 days.','5-Year Warranty',109,'1','2016-07-21 13:50:30'),(67,'hde009','Includes our Camera Case, and your choice between our Digital Camera or our DSLR, 16GB or 8GB memory card, and 3-year or 5-year warranty.','Camera Travel Set',2,'','2016-07-21 16:01:01'),(68,'hde014','Includes a choice between our Compact MP3 player or our Digital Media Player and Earbuds or Headphones.','MP3 Player with Audio',40,'','2016-07-21 18:20:42'),(69,'hdb010','Includes a choice between Titian Raw Silk Pillow or Shay Printed Pillow and our Carnegia Alpaca Throw or Park Row Throw or Gramercy Throw.\r\n','Pillow and Throw Set',0,'','2016-07-21 13:50:30'),(70,'hbm000','Novel by Charles Dickens, published both serially and in book form in 1859. The story is set in the late 18th century against the background of the French Revolution.While political events drive the story, Dickens takes a decidedly antipolitical tone, lambasting both aristocratic tyranny and revolutionary excess--the latter memorably caricatured in Madame Defarge, who knits beside the guillotine. The book is perhaps best known for its opening lines, &quot;It was the best of times, it was the worst of times,&quot; and for Carton\'s last speech, in which he says of his replacing Darnay in a prison cell, &quot;It is a far, far better thing that I do, than I have ever done; it is a far, far better rest that I go to, than I have ever known.&quot;','A Tale of Two Cities',10.9,'1','2016-07-21 13:51:50'),(71,'hbm003 ','After a tumble down the rabbit hole, Alice finds herself far away from home in the absurd world of Wonderland. As mind-bending as it is delightful, Lewis Carrollâ€™s 1865 novel is pure magic for young and old alike. 96pp. Downloadable as pdf.','Alice in Wonderland',5.45,'1','2016-07-21 13:50:30'),(72,'mpd000c','Straight leg chino. Back pockets with button closure. 14\" leg opening. Zip fly. 100% cotton.','Khaki Bowery Chino Pants',152.6,'','2016-07-21 13:50:30'),(73,'acj0006s','Set of 3. Glass beads on metal band. 2.75\" diameter. Made in India.','Blue Horizons Bracelets',59.95,'1','2016-07-21 13:50:30'),(74,'acj003','AA& quality 6.5mm pearl. 14K gold post. Made in Indonesia.','Pearl Stud Earrings',119.9,'1','2016-07-21 13:50:30'),(75,'acj004','Carved horn. Sterling silver hook. 2.25\". Made in Haiti.','Swing Time Earrings',81.75,'1','2016-07-21 13:50:30'),(76,'acj000','Traditional Tuareg design on hand-hammered and chiseled silver. The Tuareg of Saharan Africa are known for their decorative jewelry craft. 16\". Silver, stone beads. Made in Niger.','Silver Desert Necklace',228.9,'1','2016-07-21 13:50:30'),(77,'acj005','Swiss quartz movement. Date function. 3-hands. Notch markers. Round, stainless steel case (42 mm x 15 x 13) and link strap (19mm x 8.25&quot;); Traditional clasp. Pull-out crown. Water resistant 125 feet.','Swiss Movement Sports Watch',545,'1','2016-07-21 15:49:07'),(78,'acj007','AA& quality 6.0-6.5mm pearls. Double knotted on silk thread. 24\" strand. 14K gold hook-and-eye clasp. Made in Indonesia.','Pearl Necklace Set',0,'','2016-07-21 13:50:30'),(79,'hbm001','For a bet, Phileas Fogg sets out with his servant Passeportout to achieve an incredible journey - from London to Paris, Brindisi, Suez, Bombay, Calcutta, Singapore, Hong Kong, San Francisco, New York and back to London again, all in just eighty days. There are many alarms and surprises along the way - and a last minute setback that makes all the difference between winning and losing.','Around the World in 80 Days',5.45,'1','2016-07-21 13:50:30'),(80,'hbm005','Falling by  I Am Not Lefthanded. Album: Yes Means No. Running time 3:16. Downloadable as mp3.','Falling by I Am Not Lefthanded',2,'1','2016-07-21 13:50:30'),(81,'hbm006','If You Were by Keshco. Album: Trolley Crash. Duration: 3:31. Downloadable as mp3.','If You Were by Keshco',2,'1','2016-07-21 13:50:30'),(82,'hbm007','Can\'t Stop It by Shearer. Album: Eve. Duration: 2:49. Downloadable as mp3.','Can\'t Stop It by Shearer',2,'1','2016-07-21 13:50:30'),(83,'hbm008','Love is an Eternal Lie by The Sleeping Tree. Album: Music to Accompany the World Traveller. Duration: 3:11. Downloadable as mp3.','Love is an Eternal Lie by The Sleeping Tree',2,'1','2016-07-21 15:59:49'),(84,'hbm010','Fire [Kalima remix] by Unannounced Guest. Duration: 2:48. Downloadable as mp3.','Fire [Kalima remix] by Unannounced Guest',2,'1','2016-07-21 13:50:30'),(85,'mem000','Membership is valid for ONE YEAR from the date of purchase. Members are allowed unlimited purchases with VIP pricing, however purchases are not for resale. Madison Island may, in its sole discretion, choose not to process or to cancel your order in certain circumstances. This may occur, for example, when the product you wish to purchase is out of stock, mispriced, or if we suspect the request is fraudulent.\r\n','Madison Island VIP Membership - 1 Year',350,'1','2016-07-21 13:50:30');
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

--
-- Dumping events for database 'test'
--

--
-- Dumping routines for database 'test'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-21 19:02:47
