-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: mego
-- ------------------------------------------------------
-- Server version	5.5.45

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
-- Table structure for table `pr_user_passion`
--

DROP TABLE IF EXISTS `pr_user_passion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pr_user_passion` (
  `PR_USER_PASSION_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PR_USER_ID` varchar(45) DEFAULT NULL,
  `PR_PASSION` varchar(45) DEFAULT NULL,
  `PR_ENTRY_DATE` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`PR_USER_PASSION_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pr_user_passion`
--

LOCK TABLES `pr_user_passion` WRITE;
/*!40000 ALTER TABLE `pr_user_passion` DISABLE KEYS */;
INSERT INTO `pr_user_passion` VALUES (4,'3','Netflix','2022-12-31 11:29:08'),(5,'3','Amazon Prime','2022-12-31 11:29:08'),(6,'3','Zee5','2022-12-31 11:29:08'),(10,'5','Sports','2023-01-02 09:43:36'),(11,'5','Cat Lover','2023-01-02 09:43:36'),(12,'5','Yoga','2023-01-02 09:43:36'),(13,'6','Internet Surfing','2023-01-02 09:51:31'),(14,'6','Swimming','2023-01-02 09:51:31'),(15,'6','Dancing','2023-01-02 09:51:31'),(16,'7','Netflix','2023-01-02 10:11:41'),(17,'7','Amazon Prime','2023-01-02 10:11:41'),(18,'7','Zee5','2023-01-02 10:11:41'),(19,'8','Netflix','2023-01-02 10:24:37'),(20,'8','Amazon Prime','2023-01-02 10:24:37'),(21,'8','Zee5','2023-01-02 10:24:37'),(22,'9','Board Games','2023-01-02 11:49:03'),(23,'9','Festivals','2023-01-02 11:49:03'),(24,'9','Travel','2023-01-02 11:49:03'),(31,'2','Netflix','2023-01-04 01:57:57'),(32,'2','Maggi','2023-01-04 01:57:57'),(33,'2','Tea','2023-01-04 01:57:57'),(34,'2','Coffee','2023-01-04 01:57:57'),(35,'2','Festivals','2023-01-04 01:57:57'),(36,'2','Road Trips','2023-01-04 01:57:57'),(37,'2','Night Out','2023-01-04 01:57:57'),(38,'2','Bollywood','2023-01-04 01:57:57'),(39,'2','Hollywood','2023-01-04 01:57:57'),(40,'2','Biryani','2023-01-04 01:57:57'),(41,'2','Movies','2023-01-04 01:57:57'),(42,'2','Walking','2023-01-04 01:57:57'),(55,'4','Netflix','2023-01-10 10:43:09'),(56,'4','Maggi','2023-01-10 10:43:09'),(57,'4','Coffee','2023-01-10 10:43:09'),(58,'4','Outdoors','2023-01-10 10:43:09'),(59,'4','Cooking','2023-01-10 10:43:09'),(60,'4','Vegetarian','2023-01-10 10:43:09'),(61,'4','Dancing','2023-01-10 10:43:09'),(62,'4','Vlogging','2023-01-10 10:43:09'),(63,'4','Bhangra','2023-01-10 10:43:09'),(64,'4','Garba','2023-01-10 10:43:09'),(65,'4','Voluntering','2023-01-10 10:43:09'),(66,'4','Painting','2023-01-10 10:43:09');
/*!40000 ALTER TABLE `pr_user_passion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-12 22:19:38
