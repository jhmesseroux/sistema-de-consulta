CREATE DATABASE  IF NOT EXISTS `novaitfl_sdcutn2022` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `novaitfl_sdcutn2022`;
-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: consutation
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `consultations`
--

DROP TABLE IF EXISTS `consultations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `consultations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `teacher_id` bigint unsigned NOT NULL,
  `admin_id` bigint unsigned DEFAULT NULL,
  `subject_id` bigint unsigned NOT NULL,
  `alternative` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `dayOfWeek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` time NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `consultations_teacher_id_foreign` (`teacher_id`),
  KEY `consultations_admin_id_foreign` (`admin_id`),
  KEY `consultations_subject_id_foreign` (`subject_id`),
  CONSTRAINT `consultations_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `consultations_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  CONSTRAINT `consultations_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultations`
--

LOCK TABLES `consultations` WRITE;
/*!40000 ALTER TABLE `consultations` DISABLE KEYS */;
INSERT INTO `consultations` VALUES (1,2,NULL,1,NULL,1,'Lunes',NULL,NULL,'23:47:31','quaerat','2022-06-25 01:48:19','2022-06-25 01:48:19'),(2,3,NULL,2,NULL,1,'Viernes',NULL,NULL,'08:55:28','minus','2022-06-25 01:48:19','2022-06-25 01:48:19'),(3,4,NULL,3,NULL,1,'Miércoles',NULL,NULL,'17:26:20','itaque','2022-06-25 01:48:19','2022-06-25 01:48:19'),(4,5,NULL,4,NULL,1,'Lunes',NULL,NULL,'04:13:41','neque','2022-06-25 01:48:19','2022-06-25 01:48:19'),(5,6,NULL,5,NULL,1,'Lunes',NULL,NULL,'15:48:55','tempora','2022-06-25 01:48:19','2022-06-25 01:48:19'),(6,7,NULL,6,NULL,1,'Jueves',NULL,NULL,'19:07:10','voluptas','2022-06-25 01:48:19','2022-06-25 01:48:19'),(7,8,NULL,7,NULL,1,'Jueves',NULL,NULL,'21:16:24','nesciunt','2022-06-25 01:48:19','2022-06-25 01:48:19'),(8,9,NULL,8,NULL,1,'Lunes',NULL,NULL,'17:03:58','rerum','2022-06-25 01:48:19','2022-06-25 01:48:19'),(10,11,NULL,10,NULL,1,'Miércoles',NULL,NULL,'22:04:07','et','2022-06-25 01:48:19','2022-06-25 01:48:19');
/*!40000 ALTER TABLE `consultations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meetings`
--

DROP TABLE IF EXISTS `meetings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `meetings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `consultation_id` bigint unsigned NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pendiente',
  `dateConsultation` date NOT NULL,
  `dateTimeCancelled` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `meetings_user_id_foreign` (`user_id`),
  KEY `meetings_consultation_id_foreign` (`consultation_id`),
  CONSTRAINT `meetings_consultation_id_foreign` FOREIGN KEY (`consultation_id`) REFERENCES `consultations` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `meetings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meetings`
--

LOCK TABLES `meetings` WRITE;
/*!40000 ALTER TABLE `meetings` DISABLE KEYS */;
/*!40000 ALTER TABLE `meetings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_100000_create_password_resets_table',1),(2,'2019_08_19_000000_create_failed_jobs_table',1),(3,'2022_04_12_020908_create_roles_table',1),(4,'2022_04_12_022143_create_users_table',1),(5,'2022_04_13_003652_create_subjects_table',1),(6,'2022_04_13_003925_create_teachers_subjects_table',1),(7,'2022_04_13_004051_create_consultations_table',1),(8,'2022_04_13_004502_create_reason_cancel_table',1),(9,'2022_04_13_004733_create_meetings_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reason_cancel`
--

DROP TABLE IF EXISTS `reason_cancel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reason_cancel` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `reasonCancel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consultation_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reason_cancel_consultation_id_foreign` (`consultation_id`),
  CONSTRAINT `reason_cancel_consultation_id_foreign` FOREIGN KEY (`consultation_id`) REFERENCES `consultations` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reason_cancel`
--

LOCK TABLES `reason_cancel` WRITE;
/*!40000 ALTER TABLE `reason_cancel` DISABLE KEYS */;
/*!40000 ALTER TABLE `reason_cancel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin','Adm',NULL,NULL),(2,'Alumno','Student',NULL,NULL),(3,'Profesor','Teacher',NULL,NULL),(5,'aspernatur','Rerum est et sequi culpa omnis. Illo iure autem accusamus asperiores rerum. Suscipit omnis eos distinctio at dolores modi delectus. Odit aspernatur odio quisquam quis voluptate nesciunt nemo porro.','2022-06-25 01:48:19','2022-06-25 01:48:19'),(6,'repellat','Eos doloribus ipsam rerum pariatur dolorem explicabo est ipsum. Earum ea ut id iusto pariatur nihil. Ratione qui rerum at dolorem illo. Dolores sint autem aut molestias minus magni.','2022-06-25 01:48:19','2022-06-25 01:48:19'),(7,'exercitationem','Et quos ex architecto excepturi ab dolor. Eos est sed sint veritatis dolorem et expedita. Libero quia officia velit in minus itaque ullam dolore. Qui ut impedit nihil.','2022-06-25 01:48:19','2022-06-25 01:48:19'),(8,'ex','Et iste officia sunt quae odio assumenda. Qui perspiciatis nam corporis repudiandae ut placeat recusandae. Consectetur laborum et iste et aut veritatis.','2022-06-25 01:48:19','2022-06-25 01:48:19'),(9,'et','Ut iure totam corporis ipsa sed officia. Et dolore illum natus praesentium. Repellat sed est harum. Excepturi voluptatibus numquam reiciendis veniam suscipit ab praesentium repellat.','2022-06-25 01:48:19','2022-06-25 01:48:19'),(10,'accusantium','Deleniti natus qui incidunt non in illum omnis. Beatae placeat esse id vitae molestias excepturi quod. Eius voluptates quas voluptatem odio. Aut consequatur pariatur unde laudantium eaque iusto et.','2022-06-25 01:48:19','2022-06-25 01:48:19'),(11,'debitis','At dolor dolores omnis vero. Quos doloremque reiciendis dolores ipsum nesciunt.','2022-06-25 01:48:19','2022-06-25 01:48:19'),(12,'ut','Provident necessitatibus nemo facilis iste consectetur est iste. Id dolorem officia non qui labore saepe id voluptatem. Quidem amet optio non repellat repudiandae ratione sed reprehenderit.','2022-06-25 01:48:19','2022-06-25 01:48:19'),(13,'dicta','Autem et ea ullam dolorem exercitationem fugiat blanditiis. Et nemo soluta quia laborum.','2022-06-25 01:48:19','2022-06-25 01:48:19');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subjects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,'ut','2022-06-25 01:48:19','2022-06-25 01:48:19'),(2,'natus','2022-06-25 01:48:19','2022-06-25 01:48:19'),(3,'non','2022-06-25 01:48:19','2022-06-25 01:48:19'),(4,'enim','2022-06-25 01:48:19','2022-06-25 01:48:19'),(5,'rerum','2022-06-25 01:48:19','2022-06-25 01:48:19'),(6,'sapiente','2022-06-25 01:48:19','2022-06-25 01:48:19'),(7,'fugit','2022-06-25 01:48:19','2022-06-25 01:48:19'),(8,'sunt','2022-06-25 01:48:19','2022-06-25 01:48:19'),(9,'et','2022-06-25 01:48:19','2022-06-25 01:48:19'),(10,'doloremque','2022-06-25 01:48:19','2022-06-25 01:48:19');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachers_subjects`
--

DROP TABLE IF EXISTS `teachers_subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teachers_subjects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `teacher_id` bigint unsigned NOT NULL,
  `subject_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teachers_subjects_teacher_id_foreign` (`teacher_id`),
  KEY `teachers_subjects_subject_id_foreign` (`subject_id`),
  CONSTRAINT `teachers_subjects_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  CONSTRAINT `teachers_subjects_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachers_subjects`
--

LOCK TABLES `teachers_subjects` WRITE;
/*!40000 ALTER TABLE `teachers_subjects` DISABLE KEYS */;
/*!40000 ALTER TABLE `teachers_subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `legajo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_legajo_unique` (`legajo`),
  UNIQUE KEY `users_dni_unique` (`dni`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,NULL,'11111111','11111111','11111111','11111111','messerouxhilaire@gmail.com',1,1,NULL,'$2y$10$sDwbnMvq4QZEXA3jRQKKm.n0wnZaLrYJLmAgwOfQNlQuix8jm.HGG','bDScj9iXr1OpTZT8DKTdGgQgMtCIQqJsg6vHybXRuq5DU2Y2ev4zFoS5dkEL','2022-06-25 01:44:57','2022-06-25 01:44:57'),(2,NULL,'America','Paucek','13812943','32633396','jacobson.virginie@example.org',1,2,'2022-06-25 01:48:19','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','1Lpj25Csbu','2022-06-25 01:48:19','2022-06-25 01:48:19'),(3,NULL,'Annie','Quigley','70482647','50424209','vlesch@example.net',0,5,'2022-06-25 01:48:19','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','b5iqRGIwGy','2022-06-25 01:48:19','2022-06-25 01:48:19'),(4,NULL,'Duncan','Wiza','25827838','48579189','bnitzsche@example.org',1,6,'2022-06-25 01:48:19','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','okJqqXMAUt','2022-06-25 01:48:19','2022-06-25 01:48:19'),(5,NULL,'Garfield','Breitenberg','49752118','68229619','fgutkowski@example.org',0,7,'2022-06-25 01:48:19','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','h4xIUbyxdE','2022-06-25 01:48:19','2022-06-25 01:48:19'),(6,NULL,'Andreane','Terry','70815976','31734776','sonia54@example.org',1,3,'2022-06-25 01:48:19','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','D7qm2qCbsw','2022-06-25 01:48:19','2022-06-26 02:49:51'),(7,NULL,'Reva','Dicki','74169045','25307498','parker.robyn@example.net',1,9,'2022-06-25 01:48:19','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','QApKAOr3zV','2022-06-25 01:48:19','2022-06-25 01:48:19'),(8,NULL,'Dianna','Blick','58191894','80814952','kale76@example.org',1,10,'2022-06-25 01:48:19','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','tgpgVkKViv','2022-06-25 01:48:19','2022-06-25 01:48:19'),(9,NULL,'Elmer','Pfeffer','10806056','67843309','erdman.stone@example.com',1,11,'2022-06-25 01:48:19','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','TGri8lNh6S','2022-06-25 01:48:19','2022-06-25 01:48:19'),(11,NULL,'Santos','Nader','62737899','40337035','ibraun@example.com',0,13,'2022-06-25 01:48:19','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','TjFDft9BuY','2022-06-25 01:48:19','2022-06-25 01:48:19'),(12,NULL,'fghfgjh','hfhjh','89898989','89898989','hjhjh@gmail.com',1,1,NULL,'$2y$10$8nm9grfzpHbhvQgZUKgrqeYNpehaR3NDxOcWfRQCxmqcry3LbOF2S',NULL,'2022-06-26 02:50:39','2022-06-26 02:50:39');
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

-- Dump completed on 2022-06-26 18:01:48
