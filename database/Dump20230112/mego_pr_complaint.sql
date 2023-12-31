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
-- Table structure for table `pr_complaint`
--

DROP TABLE IF EXISTS `pr_complaint`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pr_complaint` (
  `COMPLAINT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(111) NOT NULL,
  `GUILTY_ID` int(111) NOT NULL,
  `CATEGORY_ID` int(11) NOT NULL,
  `SUB_CATEGORY_ID` int(11) NOT NULL,
  `REMARKS` text NOT NULL,
  `STATUS` int(11) NOT NULL,
  `CREATED_AT` datetime NOT NULL,
  `MODIFIED_AT` datetime NOT NULL,
  PRIMARY KEY (`COMPLAINT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pr_complaint`
--

LOCK TABLES `pr_complaint` WRITE;
/*!40000 ALTER TABLE `pr_complaint` DISABLE KEYS */;
INSERT INTO `pr_complaint` VALUES (1,0,5,5,8,'',1,'2022-04-03 12:39:02','0000-00-00 00:00:00'),(2,8,5,1,2,'testing for demo',1,'2023-01-04 12:46:04','0000-00-00 00:00:00'),(3,0,5,5,11,'',1,'2023-01-04 01:00:51','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `pr_complaint` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-12 22:19:07
