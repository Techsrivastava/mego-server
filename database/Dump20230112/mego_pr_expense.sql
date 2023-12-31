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
-- Table structure for table `pr_expense`
--

DROP TABLE IF EXISTS `pr_expense`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pr_expense` (
  `PR_EXPENSE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PR_USER_ID` varchar(45) DEFAULT NULL,
  `PR_EXPENSE_TYPE` varchar(45) DEFAULT NULL,
  `PR_EXPENSE_HEAD` varchar(45) DEFAULT NULL,
  `PR_AMOUNT` varchar(45) DEFAULT NULL,
  `PR_KM` varchar(45) DEFAULT NULL,
  `PR_RATE` varchar(45) DEFAULT NULL,
  `PR_FROM_AREA` varchar(45) DEFAULT NULL,
  `PR_TO_AREA` varchar(45) DEFAULT NULL,
  `PR_REMARKS` mediumtext,
  `PR_ENTRY_DATE` datetime DEFAULT NULL,
  `PR_MODIFIED_DATE` datetime DEFAULT NULL,
  PRIMARY KEY (`PR_EXPENSE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pr_expense`
--

LOCK TABLES `pr_expense` WRITE;
/*!40000 ALTER TABLE `pr_expense` DISABLE KEYS */;
/*!40000 ALTER TABLE `pr_expense` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-12 22:18:47
