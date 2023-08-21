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
-- Table structure for table `pr_category`
--

DROP TABLE IF EXISTS `pr_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pr_category` (
  `CATEGORY_ID` int(111) NOT NULL AUTO_INCREMENT,
  `CATEGORY` text NOT NULL,
  `PARENT_ID` int(11) NOT NULL,
  `CATEGORY_DESC` mediumtext NOT NULL,
  `STATUS` int(1) NOT NULL,
  `CREATED_AT` datetime NOT NULL,
  `MODIFIED_AT` datetime NOT NULL,
  PRIMARY KEY (`CATEGORY_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pr_category`
--

LOCK TABLES `pr_category` WRITE;
/*!40000 ALTER TABLE `pr_category` DISABLE KEYS */;
INSERT INTO `pr_category` VALUES (1,'Fake profile/spam',0,'Fake profile/spam',1,'2021-12-02 18:08:09','2021-12-02 18:08:09'),(2,'Inappropriate messages',0,'Inappropriate messages',1,'2021-12-02 18:08:09','2021-12-02 18:08:09'),(3,'Inappropriate profile photos',0,'Inappropriate profile photos',1,'2021-12-02 18:08:09','2021-12-02 18:08:09'),(4,'Inappropriate bio',0,'Inappropriate bio',1,'2021-12-02 18:08:09','2021-12-02 18:08:09'),(5,'Underage user',0,'Underage user',1,'2021-12-02 18:08:09','2021-12-02 18:08:09'),(6,'Offline behaviour',0,'Offline behaviour',1,'2021-12-02 18:08:09','2021-12-02 18:08:09'),(7,'Someone is in danger',0,'Someone is in danger',1,'2021-12-02 18:08:09','2021-12-02 18:08:09'),(8,'The profile says they are under age 18',5,'The profile says they are under age 18',1,'2021-12-02 18:08:09','2021-12-02 18:08:09'),(9,'The profile looks like they are under age 18',5,'The profile looks like they are under age 18',1,'2021-12-02 18:08:09','2021-12-02 18:08:09'),(10,'The user told me they are under age 18',5,'The user told me they are under age 18',1,'2021-12-02 18:15:54','2021-12-02 18:15:54'),(11,'I know this person and they are under 18 other',5,'',1,'2021-12-02 18:15:54','2021-12-02 18:15:54');
/*!40000 ALTER TABLE `pr_category` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-12 22:19:33
