-- MySQL dump 10.13  Distrib 8.0.19, for osx10.15 (x86_64)
--
-- Host: nnmeqdrilkem9ked.cbetxkdyhwsb.us-east-1.rds.amazonaws.com    Database: e3u76mzcnon6a5qx
-- ------------------------------------------------------
-- Server version	5.7.23-log

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
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `areas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kana` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` VALUES (1,'北海道','ホッカイドウ','2020-05-06 23:46:58','2020-05-06 23:46:58'),(2,'東北','トウホク','2020-05-06 23:46:58','2020-05-06 23:46:58'),(3,'関東','カントウ','2020-05-06 23:46:58','2020-05-06 23:46:58'),(4,'中部','チュウブ','2020-05-06 23:46:58','2020-05-06 23:46:58'),(5,'近畿','キンキ','2020-05-06 23:46:58','2020-05-06 23:46:58'),(6,'中国','チュウゴク','2020-05-06 23:46:58','2020-05-06 23:46:58'),(7,'四国','シコク','2020-05-06 23:46:58','2020-05-06 23:46:58'),(8,'九州','キュウシュウ','2020-05-06 23:46:58','2020-05-06 23:46:58');
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;
UNLOCK TABLES;
