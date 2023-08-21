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
-- Table structure for table `pr_offer_adv`
--

DROP TABLE IF EXISTS `pr_offer_adv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pr_offer_adv` (
  `PR_OFFER_ADV_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PR_OFFER_TITLE` text NOT NULL,
  `PR_OFFER_DESC` text NOT NULL,
  `PR_IMAGE` varchar(256) NOT NULL,
  `PR_STATUS` int(11) NOT NULL,
  `PR_ENTRY_DATE` datetime NOT NULL,
  `PR_MODIFIED_DATE` datetime NOT NULL,
  PRIMARY KEY (`PR_OFFER_ADV_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pr_offer_adv`
--

LOCK TABLES `pr_offer_adv` WRITE;
/*!40000 ALTER TABLE `pr_offer_adv` DISABLE KEYS */;
INSERT INTO `pr_offer_adv` VALUES (1,'Mego Platinum','Level up every action you take on Mego','',1,'2021-12-15 19:27:45','2021-12-15 19:27:45'),(3,'Get Mego Gold Package','See who Likes\'s you and more !','',1,'2021-12-15 19:27:45','2021-12-15 19:27:45');
/*!40000 ALTER TABLE `pr_offer_adv` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-12 22:19:20
