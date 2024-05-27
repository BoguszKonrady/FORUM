-- MySQL dump 10.13  Distrib 5.7.44, for Linux (x86_64)
--
-- Host: localhost    Database: mydatabase
-- ------------------------------------------------------
-- Server version	5.7.44

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
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `username` varchar(255) DEFAULT NULL,
  `post_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'Imie Nazwisko/nick 1','Zawartosc 1',NULL,'2024-05-27 19:13:14'),(2,'Imie Nazwisko/nick 2','Zawartosc 2',NULL,'2024-05-27 19:13:14'),(3,'Imie Nazwisko/nick 3','Zawartosc 3',NULL,'2024-05-27 19:13:14'),(4,'Imie Nazwisko/nick 4','Zawartosc 4',NULL,'2024-05-27 19:13:14'),(5,'Imie Nazwisko/nick 5','Zawartosc 5',NULL,'2024-05-27 19:13:14'),(6,'Imie Nazwisko/nick 6','Zawartosc 6',NULL,'2024-05-27 19:13:14'),(7,'Imie Nazwisko/nick 7','Zawartosc 7',NULL,'2024-05-27 19:13:14'),(8,'Imie Nazwisko/nick 8','Zawartosc 8',NULL,'2024-05-27 19:13:14'),(9,'Imie Nazwisko/nick 9','Zawartosc 9',NULL,'2024-05-27 19:13:14'),(10,'Imie Nazwisko/nick 10','Zawartosc 10',NULL,'2024-05-27 19:13:14'),(11,'Imie Nazwisko/nick 11','Zawartosc 11',NULL,'2024-05-27 19:13:14'),(12,'Imie Nazwisko/nick 12','Zawartosc 12',NULL,'2024-05-27 19:13:14'),(13,'Imie Nazwisko/nick 13','Zawartosc 13',NULL,'2024-05-27 19:13:14'),(14,'Imie Nazwisko/nick 14','Zawartosc 14',NULL,'2024-05-27 19:13:14'),(15,'Imie Nazwisko/nick 15','Zawartosc 15',NULL,'2024-05-27 19:13:14'),(16,'Imie Nazwisko/nick 16','Zawartosc 16',NULL,'2024-05-27 19:13:14'),(17,'Imie Nazwisko/nick 17','Zawartosc 17',NULL,'2024-05-27 19:13:14'),(18,'Imie Nazwisko/nick 18','Zawartosc 18',NULL,'2024-05-27 19:13:14'),(19,'Imie Nazwisko/nick 19','Zawartosc 19',NULL,'2024-05-27 19:13:14'),(20,'Imie Nazwisko/nick 20','Zawartosc 20',NULL,'2024-05-27 19:13:14'),(21,'Pierwszy post','To jest pierwszy post','admin','2024-05-26 14:35:00'),(22,'Drugi post','To jest drugi post','user1','2024-05-27 10:15:00'),(23,'wakacje','zawartosc postu','imie i nazwisko','2024-05-27 20:13:14');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-27 21:26:21
