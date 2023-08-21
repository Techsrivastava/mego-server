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
-- Table structure for table `pr_users`
--

DROP TABLE IF EXISTS `pr_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pr_users` (
  `PR_USER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PR_ROLE_ID` int(11) DEFAULT NULL,
  `PR_USER_CODE` varchar(255) DEFAULT NULL,
  `PR_PASSWORD` varchar(255) DEFAULT NULL,
  `PR_PIN` varchar(20) DEFAULT NULL,
  `PR_TITLE` varchar(45) DEFAULT NULL,
  `PR_NAME` varchar(255) DEFAULT NULL,
  `PR_EMAIL` varchar(255) DEFAULT NULL,
  `PR_PHONE` varchar(111) DEFAULT NULL,
  `PR_IMAGE` varchar(255) DEFAULT NULL,
  `PR_PRESENT_ADDRESS` varchar(255) DEFAULT NULL,
  `PR_PERMANENT_ADDRESS` varchar(255) DEFAULT NULL,
  `PR_COUNTRY` int(11) DEFAULT NULL,
  `PR_STATE` int(11) DEFAULT NULL,
  `PR_CITY` int(11) DEFAULT NULL,
  `PR_PINCODE` int(11) DEFAULT NULL,
  `PR_GST_NO` varchar(100) DEFAULT NULL,
  `PR_AADHAR_CARD_NO` varchar(100) DEFAULT NULL,
  `PR_PANCARD_NO` varchar(100) DEFAULT NULL,
  `PR_DL_NO` varchar(100) DEFAULT NULL,
  `PR_PASSPORT_NO` varchar(45) DEFAULT NULL,
  `PR_ACCOUNT_NO` varchar(100) DEFAULT NULL,
  `PR_IFSC_CODE` varchar(100) DEFAULT NULL,
  `PR_BANK_NAME` varchar(100) DEFAULT NULL,
  `PR_BANK_BRANCH` varchar(100) DEFAULT NULL,
  `PR_STATUS` int(11) DEFAULT NULL,
  `PR_IMEI` varchar(225) DEFAULT NULL,
  `PR_BATTERY` varchar(225) DEFAULT NULL,
  `PR_OS` varchar(225) DEFAULT NULL,
  `PR_APP_VERSION` varchar(245) DEFAULT NULL,
  `PR_PHONE_BRAND` varchar(245) DEFAULT NULL,
  `PR_LOCATION` varchar(245) DEFAULT NULL,
  `PR_TOKEN` varchar(225) DEFAULT NULL,
  `PR_CREATED_AT` datetime DEFAULT NULL,
  `PR_UPDATED_AT` datetime DEFAULT NULL,
  `PR_ADDED_BY` varchar(45) DEFAULT NULL,
  `PR_LAT_LNG` varchar(245) DEFAULT NULL,
  `PR_CTC` varchar(45) DEFAULT NULL,
  `PR_OTP` varchar(45) DEFAULT NULL,
  `PR_GENDER` varchar(45) DEFAULT NULL,
  `PR_SEXUAL_ORIENTATION` varchar(45) DEFAULT NULL,
  `PR_PASSION` varchar(45) DEFAULT NULL,
  `PR_DOB` varchar(25) DEFAULT NULL,
  `PROFILE_UPDATE_STS` int(1) DEFAULT NULL,
  `ABOUT` mediumtext,
  `JOB_TITLE` mediumtext,
  `COMPANY` varchar(256) DEFAULT NULL,
  `SCHOOL` varchar(256) DEFAULT NULL,
  `PROFILE_SHOW` varchar(2) DEFAULT NULL,
  `SYSYTEM_VISIBILITY` varchar(2) DEFAULT NULL,
  `MARITAL_STS` varchar(200) DEFAULT NULL,
  `DONT_SHOW_MY_AGE` int(11) DEFAULT NULL,
  `DONT_SHOW_MY_GENDER` int(11) DEFAULT NULL,
  `SHOW_GENDER` varchar(22) DEFAULT NULL,
  `AGE_RANGE` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`PR_USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pr_users`
--

LOCK TABLES `pr_users` WRITE;
/*!40000 ALTER TABLE `pr_users` DISABLE KEYS */;
INSERT INTO `pr_users` VALUES (2,3,'7992218175',NULL,NULL,NULL,'Rohit',NULL,'7992218175',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'fcj-g2UZRD6Vhb1PI76m2m:APA91bE08aDytKUOnhxnv6Y-UBIO7ZkNzzfYh-kvx7EL4PmFOJyLDWHt_W1cAeIoE5R7zUfINLFBOqPr4_hiJZy4xwGgVSprNXtFoq6unNq1pWK9WyPnjXm-0CMwswA3yUGyd006fupc','2022-12-31 11:20:15','2023-01-04 01:57:57',NULL,'25.5858202,85.1273528',NULL,'2896','MAN',NULL,NULL,'1994-03-02',1,'“A geek at heart, I like everything from board games, comics, books and movies to technology, science and various different franchises.”','software Developer','Milleniance softnet pvt ltd','Magadh University','','0','',0,0,'WOMEN',NULL),(3,3,'9953533084',NULL,NULL,NULL,'riki',NULL,'9953533084',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,'28.6110702,77.2934915','e50KLyXoQ7ig5eUV3BkFxx:APA91bElw5MZOFxwdf13k7pr8PmEPzdaX8W7tYsSCq9k4KfW-kRNwn4-9nCSWFbd2Ljbu3AMPaUWBuEZ5aNujpWtUdWLH8Ofk-xcbE-nNDMEEj_lD-a31hu4YK8kxqEK72BeBu8VDjLO','2022-12-31 11:24:18','2022-12-31 11:29:08',NULL,'28.6110702,77.2934915',NULL,'6900','MAN',NULL,NULL,'2004-12-02',1,NULL,NULL,NULL,'aktu',NULL,NULL,NULL,NULL,NULL,'MAN',NULL),(4,3,'9999999999',NULL,NULL,NULL,'sanaya',NULL,'9999999999',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,'25.5861577,85.1269703','cAHkvpD8RMOZADE11FwUOA:APA91bFaRBQJZ7WeA7uj5FY3X5iMcBvaTOkPdrHJb6S2mEVxza91f10jATQVRWz_UUCoETBNrd5lg1ry1IE1THckaGgTetgP8ILT5UCFizy7R1uPr-I4mhQCArN--jCaB43SHJvfDM87','2023-01-02 09:28:04','2023-01-10 10:43:09',NULL,'25.5861577,85.1269703',NULL,'4090','WOMEN',NULL,NULL,'1992-08-06',1,'You be the judge. Would you imagine this profile to rack up the likes, or be tossed aside like a multitude of other pedestrian profiles? It can be tough to tell, but if you examine each sentence individually you’ll see that this bio is just collage of sappy romantic cliches. Sure if she sees this just after having read any Nicholas Sparks novel she may go for it, everyone else with vehemently run to the bathroom, barf, and then swipe left.rohit','HR','CodeBright ','jd womens','','0','',0,0,'MAN',NULL),(5,3,'9999999998',NULL,NULL,NULL,'Niarobi',NULL,'9999999998',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,'25.5857987,85.1267044','fGhmK_wPTEiT6eyvS1TGYi:APA91bHeGfvB0OyVLpMNK4uksPrC3ncxeQIygUwEAdS2bVx6jiNwux8V4TAaySSvpkUHE5G3TL9-HRCupA2_bTVqr-I7qd-Yb6CbCsSGE_4aFqpl22h5oRpCG4y8uNQ5tJTW7QtuHwzj','2023-01-02 09:40:23','2023-01-02 09:43:36',NULL,'25.5857987,85.1267044',NULL,'2146','WOMEN',NULL,NULL,'1994-12-02',1,NULL,NULL,NULL,'I don\'t know',NULL,NULL,NULL,NULL,NULL,'MAN',NULL),(6,3,'9999999997',NULL,NULL,NULL,'Akriti',NULL,'9999999997',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,'25.5861579,85.1269719','doXswR-yRmybXlxbp7sDpl:APA91bEsVUtOQ6y_wAAW3SEedWyzDAq-ZzlB1N6RMNQQwFWHpWuhRSGxR36srHSEQum_g-H36tPMXlgK4My1ToerPSLEVRD5m3m_sk6fkjYe6KWLpFv5wj2KhN7yCBF9pkYMNTo7qhis','2023-01-02 09:46:29','2023-01-02 09:51:31',NULL,'25.5861579,85.1269719',NULL,'7461','WOMEN',NULL,NULL,'1998-11-11',1,NULL,NULL,NULL,'caska university',NULL,NULL,NULL,NULL,NULL,'MAN',NULL),(7,3,'7217766182',NULL,NULL,NULL,'Pankaj kumar',NULL,'7217766182',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,'28.6110717,77.2935449','cMlS7E_yTRmNUCFt-0Mi9X:APA91bFVTAg4esgfWID-sv96SVU3zzkc9fyoycC9p0_39XhDuOCN6Dk25-XSKe5GmF4lLDBxQYa0ay14FscsiWKxAva5UAQnU5WU4z-di_9NkmQ5FZ6n1sc7fXWFPR-EyHEPEJwNcPiT','2023-01-02 10:07:48','2023-01-02 10:11:41',NULL,'28.6110717,77.2935449',NULL,'3110','MAN',NULL,NULL,'1995-12-06',1,NULL,NULL,NULL,'aktu',NULL,NULL,NULL,NULL,NULL,'WOMEN',NULL),(8,3,'7217766185',NULL,NULL,NULL,'demo',NULL,'7217766185',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,'28.6109968,77.293685','dKXVahNwSpuOLos4ROyfb7:APA91bHAS5qzKV3LJxBO_fWjNy2KZQOzQp-bo-z6D9k7oFp9sRyzoZoqGirg-mmfWDbwncKcK87meIrDV-zErxixvOTNBXdOBhtdZkydEadbvbQGHzwoImbjS8M0c0x569qKf6OONWlj','2023-01-02 10:15:30','2023-01-02 10:59:03',NULL,'28.6109968,77.293685',NULL,'6502','MAN',NULL,NULL,'1991-12-12',1,NULL,NULL,NULL,'aktu',NULL,NULL,NULL,NULL,NULL,'WOMEN',NULL),(9,3,'9999999925',NULL,NULL,NULL,'Rahul',NULL,'9999999925',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,'25.5861581,85.1269697','du_jxstqQu29_oaOY-uDKw:APA91bERq0kJxUuUZR7HBU9FJk48iEZANnPFVRbzkWAXGvYElBJ33qpZExM6uyK63BwsfZGdAJWBoLDMjzHSar2O4to_tbSkl-6-gGNTL7OPXFXhUUUTcaqj55ZbyEctPZmnsTxTuXmW','2023-01-02 11:46:41','2023-01-02 11:49:03',NULL,'25.5861581,85.1269697',NULL,'9031','MAN',NULL,NULL,'1989-12-05',1,NULL,NULL,NULL,'accurate college',NULL,NULL,NULL,NULL,NULL,'WOMEN',NULL);
/*!40000 ALTER TABLE `pr_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-12 22:18:55
