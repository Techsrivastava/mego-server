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
-- Table structure for table `pr_package`
--

DROP TABLE IF EXISTS `pr_package`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pr_package` (
  `PR_PACKAGE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PR_PACKAGE_NAME` varchar(255) DEFAULT NULL,
  `PR_PACKAGE_DESC` mediumtext,
  `PR_DURATION` varchar(45) DEFAULT NULL,
  `DESCRIPTION` mediumtext NOT NULL,
  `PR_PRICE` varchar(45) DEFAULT NULL,
  `PR_LIKE_DAILY_LIMIT` varchar(256) NOT NULL,
  `PR_SUPERLIKE_DAILY_LIMIT` varchar(256) NOT NULL,
  `PR_STATUS` varchar(45) DEFAULT NULL,
  `PR_ENTRY_DATE` datetime DEFAULT NULL,
  `PR_MODIFIED_DATE` datetime DEFAULT NULL,
  `PR_IMAGE` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`PR_PACKAGE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pr_package`
--

LOCK TABLES `pr_package` WRITE;
/*!40000 ALTER TABLE `pr_package` DISABLE KEYS */;
INSERT INTO `pr_package` VALUES (1,'Platinum','Enjoy all of Mego premium features while getting maximum visibility on the app. Dating online just got easier. See someone you’d love to meet and can’t wait to match? As a Platinum subscriber, you can attach a note to every Super Like you send, increasing your match-making potential by up to 25%. And when you do—feel free to stand out in a major way by complimenting their photos or giving them your best opener. By making the first move, you can speed up the process and start to chat with people sooner.','12','','1','','','1','2021-06-15 08:01:06','2021-06-15 08:01:06',NULL),(2,'Gold','It doesn’t matter if you’re looking for love, a date, or something casual. When there are only so many hours in a day for dating, a little intel goes a long way. Mego Gold™ saves time by letting you see who Likes you. Match, pass, and expand photos to view full profiles with a simple tap and get more efficient ','9','','300','','','1','2021-12-01 09:13:07','2021-06-15 08:01:06',NULL),(4,'Plus','Choosing who to Like on a dating app can be tough, so we made it easier with Unlimited Likes. That’s right, you can catch feelings for as many people as you want whether it’s love at first sight or you just like their photos. Send Likes to increase your match-making potential or just send Likes because it feels good. With an upgrade to a Mego Plus subscription, you’ll never run out of Likes again.','1','','134','','','1','2022-04-29 01:14:24','2021-06-15 08:01:06',NULL);
/*!40000 ALTER TABLE `pr_package` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-12 22:19:31
