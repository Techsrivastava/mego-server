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
-- Table structure for table `pr_passion`
--

DROP TABLE IF EXISTS `pr_passion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pr_passion` (
  `PR_USER_PASSION_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PR_USER_ID` varchar(45) DEFAULT NULL,
  `PR_PASSION` varchar(45) DEFAULT NULL,
  `PR_ENTRY_DATE` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`PR_USER_PASSION_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pr_passion`
--

LOCK TABLES `pr_passion` WRITE;
/*!40000 ALTER TABLE `pr_passion` DISABLE KEYS */;
INSERT INTO `pr_passion` VALUES (1,NULL,'Netflix',NULL),(2,NULL,'Amazon Prime',NULL),(3,NULL,'Zee5',NULL),(4,NULL,'Maggi',NULL),(5,NULL,'Music',NULL),(6,NULL,'Ludo',NULL),(7,NULL,'Carom',NULL),(8,NULL,'Craft Beer',NULL),(9,NULL,'Tea',NULL),(10,NULL,'Coffee',NULL),(11,NULL,'Board Games',NULL),(12,NULL,'Festivals',NULL),(13,NULL,'Plant Based',NULL),(14,NULL,'Outdoors',NULL),(15,NULL,'Travel',NULL),(16,NULL,'Cooking',NULL),(17,NULL,'Vegetarian',NULL),(18,NULL,'Enviromentalism',NULL),(19,NULL,'K-Pop',NULL),(20,NULL,'Internet Surfing',NULL),(21,NULL,'Swimming',NULL),(22,NULL,'Dancing',NULL),(23,NULL,'Vlogging',NULL),(24,NULL,'Musian',NULL),(25,NULL,'Stand Up Comedy',NULL),(26,NULL,'Photography',NULL),(27,NULL,'Road Trips',NULL),(28,NULL,'Night Out',NULL),(29,NULL,'Sports',NULL),(30,NULL,'Potterhead',NULL),(31,NULL,'Cat Lover',NULL),(32,NULL,'Dog Lover',NULL),(33,NULL,'Climibing',NULL),(34,NULL,'Art',NULL),(35,NULL,'Gardening',NULL),(36,NULL,'Wine',NULL),(37,NULL,'Kids',''),(38,NULL,'Bhangra',NULL),(39,NULL,'Garba',NULL),(40,NULL,'shoppping',NULL),(41,NULL,'Measuem',NULL),(42,NULL,'Soccer',NULL),(43,NULL,'Poetry',NULL),(44,NULL,'Fashion ',NULL),(45,NULL,'Reading Grab a drink',NULL),(46,NULL,'Bollywood',NULL),(47,NULL,'Hollywood',NULL),(48,NULL,'Golf',NULL),(49,NULL,'Yoga',NULL),(50,NULL,'Foodie',NULL),(51,NULL,'Biryani',NULL),(52,NULL,'Politics',NULL),(53,NULL,'Movies',NULL),(54,NULL,'Sushi',NULL),(55,NULL,'Cricket',NULL),(56,NULL,'Voluntering',NULL),(57,NULL,'Facebook',NULL),(58,NULL,'Twitter',NULL),(59,NULL,'Instagram',NULL),(60,NULL,'Athelete',NULL),(62,NULL,'Wine',NULL),(63,NULL,'Writter',NULL),(64,NULL,'Gamer',NULL),(65,NULL,'Pickniking',NULL),(66,NULL,'Activism',NULL),(67,NULL,'Reporter',NULL),(68,NULL,'Anchoring',NULL),(69,NULL,'Walking',NULL),(70,NULL,'Bloger',NULL),(71,NULL,'Comedy',NULL),(72,NULL,'Painting',NULL),(73,NULL,'Ridding',NULL),(74,NULL,'Spritual','');
/*!40000 ALTER TABLE `pr_passion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-12 22:18:50
