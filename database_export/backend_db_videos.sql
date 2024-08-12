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
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `videos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `steps` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `videos_user_id_foreign` (`user_id`),
  KEY `videos_category_id_foreign` (`category_id`),
  CONSTRAINT `videos_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `videos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` VALUES (1,3,1,'How to Build a Bookshelf','Step-by-step guide to building a bookshelf.','https://www.youtube.com/embed/t4kcQtlIcxU','https://img.youtube.com/vi/t4kcQtlIcxU/hqdefault.jpg','[\"Gather materials\", \"Cut wood\", \"Assemble shelves\"]','2024-07-08 18:55:58','2024-07-08 18:55:58'),(2,6,2,'Painting a Room: Tips and Tricks','Learn the best techniques for painting a room.','https://www.youtube.com/embed/iCIZTXkIweg','https://img.youtube.com/vi/iCIZTXkIweg/hqdefault.jpg','[\"Prepare the room\", \"Apply primer\", \"Paint the walls\"]','2024-07-08 18:55:58','2024-07-08 18:55:58'),(3,6,3,'DIY Garden Path','Create a beautiful garden path with these easy steps.','https://www.youtube.com/embed/6vKq6J-Mxn8','https://img.youtube.com/vi/6vKq6J-Mxn8/hqdefault.jpg','[\"Plan the path\", \"Lay the foundation\", \"Place the stones\"]','2024-07-08 18:55:58','2024-07-08 18:55:58'),(4,9,1,'DIY Floating Shelves','Learn how to make floating shelves for your home.','https://www.youtube.com/embed/wki3wMAbtLg','https://img.youtube.com/vi/wki3wMAbtLg/hqdefault.jpg','[\"Cut the wood\", \"Assemble the shelves\", \"Mount on the wall\"]','2024-07-08 18:55:58','2024-07-08 18:55:58'),(5,10,2,'How to Paint a Mural','Step-by-step guide to painting a wall mural.','https://www.youtube.com/embed/L4ADLL2gAtU','https://img.youtube.com/vi/L4ADLL2gAtU/hqdefault.jpg','[\"Plan your design\", \"Prepare the wall\", \"Paint the mural\"]','2024-07-08 18:55:58','2024-07-08 18:55:58'),(6,4,3,'DIY Raised Garden Bed','Build your own raised garden bed.','https://www.youtube.com/embed/DMORpDWq-q8','https://img.youtube.com/vi/DMORpDWq-q8/hqdefault.jpg','[\"Choose the location\", \"Build the frame\", \"Fill with soil\"]','2024-07-08 18:55:58','2024-07-08 18:55:58'),(7,10,1,'How to Build a Treehouse','Step-by-step guide to building a treehouse.','https://www.youtube.com/embed/3K3YHYope9E','https://img.youtube.com/vi/3K3YHYope9E/hqdefault.jpg','[\"Select the tree\", \"Build the platform\", \"Add the walls and roof\"]','2024-07-08 18:55:58','2024-07-08 18:55:58'),(8,7,2,'Painting Furniture: Tips and Techniques','Learn how to paint furniture for a fresh look.','https://www.youtube.com/embed/9HuTN4S-7wc','https://img.youtube.com/vi/9HuTN4S-7wc/hqdefault.jpg','[\"Sand the furniture\", \"Apply primer\", \"Paint with your chosen color\"]','2024-07-08 18:55:58','2024-07-08 18:55:58'),(9,7,3,'DIY Compost Bin','Create your own compost bin for the garden.','https://www.youtube.com/embed/4t59BrzTpJg','https://img.youtube.com/vi/4t59BrzTpJg/hqdefault.jpg','[\"Choose a container\", \"Add compostable materials\", \"Maintain the compost\"]','2024-07-08 18:55:58','2024-07-08 18:55:58'),(10,4,1,'How to Build a Dog House','Build a cozy dog house for your pet.','https://www.youtube.com/embed/b-wM9XWdDFY','https://img.youtube.com/vi/b-wM9XWdDFY/hqdefault.jpg','[\"Plan the design\", \"Cut the wood\", \"Assemble the dog house\"]','2024-07-08 18:55:58','2024-07-08 18:55:58'),(11,7,2,'Painting Kitchen Cabinets','Refresh your kitchen by painting the cabinets.','https://www.youtube.com/embed/HeIT8gTwAP8','https://img.youtube.com/vi/HeIT8gTwAP8/hqdefault.jpg','[\"Remove the cabinet doors\", \"Sand and prime\", \"Paint and reattach\"]','2024-07-08 18:55:58','2024-07-08 18:55:58'),(12,3,1,'DIY Birdhouse','Create a birdhouse for your garden.','https://www.youtube.com/embed/fSBDCHREseE','https://img.youtube.com/vi/fSBDCHREseE/hqdefault.jpg','[\"Cut the wood pieces\", \"Assemble the birdhouse\", \"Paint and hang it\"]','2024-07-08 18:55:58','2024-07-08 18:55:58'),(13,3,3,'How to Create a Flower Bed','Learn how to design and plant a flower bed.','https://www.youtube.com/embed/L-MBV_X5zXA','https://img.youtube.com/vi/L-MBV_X5zXA/hqdefault.jpg','[\"Choose the location\", \"Prepare the soil\", \"Plant the flowers\"]','2024-07-08 18:55:58','2024-07-08 18:55:58'),(14,7,2,'DIY Wall Stencil Painting','Create beautiful wall designs using stencils.','https://www.youtube.com/embed/X3nyuneMciM','https://img.youtube.com/vi/X3nyuneMciM/hqdefault.jpg','[\"Choose your stencil\", \"Position on the wall\", \"Paint over the stencil\"]','2024-07-08 18:55:58','2024-07-08 18:55:58'),(15,2,1,'How to Build a Picnic Table','Build a picnic table for outdoor dining.','https://www.youtube.com/embed/HiE6FDS7LAc','https://img.youtube.com/vi/HiE6FDS7LAc/hqdefault.jpg','[\"Cut the wood\", \"Assemble the frame\", \"Attach the tabletop and seats\"]','2024-07-08 18:55:58','2024-07-08 18:55:58'),(16,10,2,'How to Paint a Ceiling','Tips and tricks for painting a ceiling.','https://www.youtube.com/embed/k27EA81kEQY','https://img.youtube.com/vi/k27EA81kEQY/hqdefault.jpg','[\"Prepare the area\", \"Apply primer\", \"Paint the ceiling\"]','2024-07-08 18:55:58','2024-07-08 18:55:58');
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
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
