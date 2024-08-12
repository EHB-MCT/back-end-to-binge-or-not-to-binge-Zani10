-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: backend_db
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `materials`
--

DROP TABLE IF EXISTS `materials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `materials` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `video_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `materials_video_id_foreign` (`video_id`),
  CONSTRAINT `materials_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materials`
--

LOCK TABLES `materials` WRITE;
/*!40000 ALTER TABLE `materials` DISABLE KEYS */;
INSERT INTO `materials` VALUES (1,1,'Wood Planks','10 pieces','2024-07-08 18:55:58','2024-07-08 18:55:58'),(2,1,'Nails','50 pieces','2024-07-08 18:55:58','2024-07-08 18:55:58'),(3,1,'Hammer','1','2024-07-08 18:55:58','2024-07-08 18:55:58'),(4,2,'Paint','2 gallons','2024-07-08 18:55:58','2024-07-08 18:55:58'),(5,2,'Primer','1 gallon','2024-07-08 18:55:58','2024-07-08 18:55:58'),(6,2,'Paint Rollers','2','2024-07-08 18:55:58','2024-07-08 18:55:58'),(7,3,'Gravel','5 bags','2024-07-08 18:55:58','2024-07-08 18:55:58'),(8,3,'Paving Stones','20 pieces','2024-07-08 18:55:58','2024-07-08 18:55:58'),(9,3,'Sand','3 bags','2024-07-08 18:55:58','2024-07-08 18:55:58'),(10,4,'Wood Planks','6 pieces','2024-07-08 18:55:58','2024-07-08 18:55:58'),(11,4,'Brackets','4','2024-07-08 18:55:58','2024-07-08 18:55:58'),(12,4,'Screws','20','2024-07-08 18:55:58','2024-07-08 18:55:58'),(13,5,'Paint','5 colors','2024-07-08 18:55:58','2024-07-08 18:55:58'),(14,5,'Paintbrushes','3','2024-07-08 18:55:58','2024-07-08 18:55:58'),(15,5,'Painter\'s Tape','1 roll','2024-07-08 18:55:58','2024-07-08 18:55:58'),(16,6,'Wood Planks','8 pieces','2024-07-08 18:55:58','2024-07-08 18:55:58'),(17,6,'Soil','10 bags','2024-07-08 18:55:58','2024-07-08 18:55:58'),(18,6,'Screws','30','2024-07-08 18:55:58','2024-07-08 18:55:58'),(19,7,'Wood Planks','20 pieces','2024-07-08 18:55:58','2024-07-08 18:55:58'),(20,7,'Nails','100 pieces','2024-07-08 18:55:58','2024-07-08 18:55:58'),(21,7,'Roofing Material','1 roll','2024-07-08 18:55:58','2024-07-08 18:55:58'),(22,8,'Sandpaper','5 sheets','2024-07-08 18:55:58','2024-07-08 18:55:58'),(23,8,'Primer','1 gallon','2024-07-08 18:55:58','2024-07-08 18:55:58'),(24,8,'Paint','1 gallon','2024-07-08 18:55:58','2024-07-08 18:55:58'),(25,9,'Compost Bin','1','2024-07-08 18:55:58','2024-07-08 18:55:58'),(26,9,'Organic Waste','varies','2024-07-08 18:55:58','2024-07-08 18:55:58'),(27,9,'Garden Fork','1','2024-07-08 18:55:58','2024-07-08 18:55:58'),(28,10,'Wood Planks','15 pieces','2024-07-08 18:55:58','2024-07-08 18:55:58'),(29,10,'Nails','50 pieces','2024-07-08 18:55:58','2024-07-08 18:55:58'),(30,10,'Screws','30','2024-07-08 18:55:58','2024-07-08 18:55:58'),(31,11,'Sandpaper','5 sheets','2024-07-08 18:55:58','2024-07-08 18:55:58'),(32,11,'Primer','1 gallon','2024-07-08 18:55:58','2024-07-08 18:55:58'),(33,11,'Paint','1 gallon','2024-07-08 18:55:58','2024-07-08 18:55:58'),(34,12,'Wood Planks','5 pieces','2024-07-08 18:55:58','2024-07-08 18:55:58'),(35,12,'Nails','30 pieces','2024-07-08 18:55:58','2024-07-08 18:55:58'),(36,12,'Paint','1 can','2024-07-08 18:55:58','2024-07-08 18:55:58'),(37,13,'Flowers','20','2024-07-08 18:55:58','2024-07-08 18:55:58'),(38,13,'Soil','5 bags','2024-07-08 18:55:58','2024-07-08 18:55:58'),(39,13,'Mulch','2 bags','2024-07-08 18:55:58','2024-07-08 18:55:58'),(40,14,'Stencil','1','2024-07-08 18:55:58','2024-07-08 18:55:58'),(41,14,'Paint','2 cans','2024-07-08 18:55:58','2024-07-08 18:55:58'),(42,14,'Painter\'s Tape','1 roll','2024-07-08 18:55:58','2024-07-08 18:55:58'),(43,15,'Wood Planks','12 pieces','2024-07-08 18:55:58','2024-07-08 18:55:58'),(44,15,'Screws','40','2024-07-08 18:55:58','2024-07-08 18:55:58'),(45,15,'Varnish','1 can','2024-07-08 18:55:58','2024-07-08 18:55:58'),(46,16,'Paint','1 gallon','2024-07-08 18:55:58','2024-07-08 18:55:58'),(47,16,'Primer','1 gallon','2024-07-08 18:55:58','2024-07-08 18:55:58'),(48,16,'Paint Roller','1','2024-07-08 18:55:58','2024-07-08 18:55:58'),(49,1,'Wood Planks','10 pieces','2024-07-08 18:55:58','2024-07-08 18:55:58'),(50,2,'Paint','2 liters','2024-07-08 18:55:58','2024-07-08 18:55:58'),(51,3,'Wood Screws','50 pieces','2024-07-08 18:55:58','2024-07-08 18:55:58');
/*!40000 ALTER TABLE `materials` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-08-12  5:35:16
