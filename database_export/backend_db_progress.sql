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
-- Table structure for table `progress`
--

DROP TABLE IF EXISTS `progress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `progress` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `video_id` bigint unsigned NOT NULL,
  `completed_steps` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `progress_user_id_foreign` (`user_id`),
  KEY `progress_video_id_foreign` (`video_id`),
  CONSTRAINT `progress_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `progress_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `progress`
--

LOCK TABLES `progress` WRITE;
/*!40000 ALTER TABLE `progress` DISABLE KEYS */;
INSERT INTO `progress` VALUES (1,11,1,'[\"0\", \"1\", \"2\"]','2024-07-08 20:36:20','2024-07-30 19:57:57'),(2,11,2,'[\"0\", \"1\"]','2024-07-08 21:11:55','2024-07-30 19:58:41'),(3,11,3,'[\"0\", \"1\"]','2024-07-08 21:51:07','2024-07-10 20:06:30'),(4,11,4,'[\"0\"]','2024-07-08 21:53:51','2024-07-10 21:38:44'),(5,11,8,'\"[0]\"','2024-07-08 22:00:21','2024-07-08 22:00:21'),(6,11,5,'\"[0,1]\"','2024-07-09 10:51:39','2024-07-09 10:52:30'),(7,11,9,'\"[0]\"','2024-07-09 11:00:25','2024-07-09 11:24:11'),(8,11,13,'[\"0\", \"1\", \"2\"]','2024-07-09 11:31:54','2024-07-09 13:45:20'),(9,11,14,'[\"0\", \"1\", \"2\"]','2024-07-09 13:00:06','2024-07-09 13:42:03'),(10,11,15,'null','2024-07-09 13:00:30','2024-07-09 13:09:50'),(11,11,7,'[\"0\", \"1\", \"2\"]','2024-07-09 13:12:52','2024-07-09 13:12:56'),(12,11,10,'[\"0\", \"1\"]','2024-07-09 14:01:41','2024-07-11 13:58:44'),(13,11,16,'[\"0\", \"1\", \"2\"]','2024-07-09 14:41:27','2024-07-09 14:41:31'),(14,11,6,'[\"0\", \"1\"]','2024-07-30 20:00:20','2024-07-30 20:00:21');
/*!40000 ALTER TABLE `progress` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-08-12  5:35:15
