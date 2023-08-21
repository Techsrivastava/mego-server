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
-- Table structure for table `pr_user_sexual_orientation`
--

DROP TABLE IF EXISTS `pr_user_sexual_orientation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pr_user_sexual_orientation` (
  `PR_USER_SEXUAL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PR_USER_ID` varchar(45) DEFAULT NULL,
  `PR_SEXUAL_ORIENTATION` varchar(45) DEFAULT NULL,
  `PR_ENTRY_DATE` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`PR_USER_SEXUAL_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pr_user_sexual_orientation`
--

LOCK TABLES `pr_user_sexual_orientation` WRITE;
/*!40000 ALTER TABLE `pr_user_sexual_orientation` DISABLE KEYS */;
INSERT INTO `pr_user_sexual_orientation` VALUES (4,'3','Straight','2022-12-31 11:29:08'),(8,'5','Straight','2023-01-02 09:43:36'),(9,'5','Gay','2023-01-02 09:43:36'),(10,'6','Lesbian','2023-01-02 09:51:31'),(11,'6','Bisexual','2023-01-02 09:51:31'),(12,'6','Asexual','2023-01-02 09:51:31'),(13,'7','Straight','2023-01-02 10:11:41'),(14,'8','Straight','2023-01-02 10:24:37'),(15,'9','Straight','2023-01-02 11:49:03'),(16,'9','Gay','2023-01-02 11:49:03'),(17,'9','Lesbian','2023-01-02 11:49:03'),(21,'2','Straight','2023-01-04 01:57:57'),(22,'2','Lesbian','2023-01-04 01:57:57'),(23,'2','Bicurious','2023-01-04 01:57:57'),(29,'4','Straight','2023-01-10 10:43:09'),(30,'4','Asexual','2023-01-10 10:43:09'),(31,'4','Demisexual','2023-01-10 10:43:09'),(32,'4','Queer','2023-01-10 10:43:09'),(33,'4','Bicurious','2023-01-10 10:43:09');
/*!40000 ALTER TABLE `pr_user_sexual_orientation` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-12 22:19:30
