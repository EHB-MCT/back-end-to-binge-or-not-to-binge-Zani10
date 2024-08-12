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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Dr. Camron Huel','elouise.bins@example.org','2024-07-08 18:55:53','$2y$12$NOO9YyN2Mk.43iGrnX.Y3.iVdjvADslbyUxezDUlxJBIAEhWfJtvK','N1BCAieh1C','2024-07-08 18:55:58','2024-07-08 18:55:58','https://randomuser.me/api/portraits/men/4.jpg','Quaerat cumque fuga placeat nostrum delectus sit. Tenetur excepturi quis qui. Ullam earum voluptatem nihil optio.'),(2,'Pinkie Steuber','xtowne@example.com','2024-07-08 18:55:54','$2y$12$nxsx.srKyYg7uQByu6b67.1e/nfvQT15ldhbODBfTZ1iQEs9BT4Fu','ul3jh13Du6','2024-07-08 18:55:58','2024-07-08 18:55:58','https://randomuser.me/api/portraits/men/7.jpg','Consequuntur quo atque est itaque et tenetur. Rem velit a harum dignissimos. Qui dolorem suscipit sed nemo. Voluptatum suscipit alias quia aut enim.'),(3,'Viva Koelpin','rbreitenberg@example.org','2024-07-08 18:55:54','$2y$12$1S9Jc4sp9rgm50EDoGkviOomjfenaHCzLONx0Z0VAujbeiCOQEiVG','HAFXnQo9fz','2024-07-08 18:55:58','2024-07-08 18:55:58','https://randomuser.me/api/portraits/men/7.jpg','Soluta adipisci voluptatem alias velit voluptatibus ea sapiente. Doloribus iure quod accusamus. Eius tenetur voluptatem eum excepturi soluta aperiam corporis.'),(4,'Dr. Jason Doyle Sr.','cfeil@example.com','2024-07-08 18:55:55','$2y$12$fGxDsklu2JWdMQBNBVdtbuQtMv4eIam87EO.UQGmMQLrBP7hE7wHm','Sb7xarVb2g','2024-07-08 18:55:58','2024-07-08 18:55:58','https://randomuser.me/api/portraits/men/1.jpg','Cum consectetur qui praesentium cupiditate. Laboriosam voluptate dolores ab culpa rem dolor dolor. Laboriosam et magni omnis ratione. In voluptate itaque dolorem nostrum et.'),(5,'Petra Predovic','kendra04@example.net','2024-07-08 18:55:55','$2y$12$oPxVhFp15c.sGUTys6gxwelIQzbnOG4775sTZw3U5d8pfz56U8OES','yRdDAlZkYH','2024-07-08 18:55:58','2024-07-08 18:55:58','https://randomuser.me/api/portraits/men/10.jpg','Non laudantium debitis qui. Enim similique dignissimos rerum et.'),(6,'Chelsey Blick III','everette02@example.org','2024-07-08 18:55:56','$2y$12$wMdgUp5lRY20LVgErAQn1OVS96lW/MVFyv7qu9d3l.oQs.tRFt7pS','WUVjNxJsT4','2024-07-08 18:55:58','2024-07-08 18:55:58','https://randomuser.me/api/portraits/men/3.jpg','Repudiandae dolorem distinctio mollitia magnam ex vitae sit. Dignissimos fugiat fugit dolores reprehenderit. Et odio temporibus consequatur pariatur.'),(7,'Prof. Janis Mraz DVM','cwyman@example.net','2024-07-08 18:55:56','$2y$12$jpoJYV2cx9ltwNGEDPyxvOu0LxtkKgesIsu.TIt.KrYf7K/JZRPGW','uAgz5zXrsb','2024-07-08 18:55:58','2024-07-08 18:55:58','https://randomuser.me/api/portraits/men/10.jpg','Eum quae voluptate esse dolores quo dolores amet. Voluptate et dolorum ut ipsum. Quam reiciendis tenetur sit fugiat.'),(8,'Imelda Donnelly III','icrona@example.org','2024-07-08 18:55:56','$2y$12$pkSQ4P0ezX43BldDfqngYe0ddYxch2BhnBc4Yt0GA3MTK87Ig2Wia','EVLtHqH8EE','2024-07-08 18:55:58','2024-07-08 18:55:58','https://randomuser.me/api/portraits/men/8.jpg','Molestiae iste aut placeat natus ad praesentium ex. Ratione ab ab at iusto commodi.'),(9,'Elna Denesik','hettinger.terrill@example.org','2024-07-08 18:55:57','$2y$12$eLhgLJN9hzFPrpVIhTOZ7uSe9YJYH90q2.krNgXDxj.RbP5TmTSwW','q7At7s3dDR','2024-07-08 18:55:58','2024-07-08 18:55:58','https://randomuser.me/api/portraits/men/5.jpg','Nostrum non ut rem ipsum. Qui repellendus fugit distinctio molestias magnam voluptatibus excepturi id.'),(10,'Mr. Kris Wilkinson','gmiller@example.com','2024-07-08 18:55:57','$2y$12$Rq/KEu.8XQf1otjjTbCP8.LbZ/AXW2NPyCYR8qwN6wH6ZFjTY.oI.','pEB0xu4oPr','2024-07-08 18:55:58','2024-07-08 18:55:58','https://randomuser.me/api/portraits/men/§.jpg','Consequatur ipsa et aliquam architecto possimus porro. Maxime cumque beatae tenetur consequatur molestias sit. Et voluptatem molestias porro nihil sed vitae. Sunt laboriosam tempore est facere eos non.'),(11,'Zani Dobruna','zanidobruna@hotmail.com',NULL,'$2y$12$yP5jfGF0cNiMS9ThS5G/0uhZDZg1jiaTPfDbUXWNGStg3Bi6UW2S.','QThpVwPfz7NeeuClrLElOhPLmRLurUhQVYSoABDRFlj8h9hrAjkoRAGPJM6n','2024-07-08 18:56:35','2024-07-09 14:00:28','images/1720473403.jpg','Student @ EHB Brussels');
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

-- Dump completed on 2024-08-12  5:35:16
