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
-- Table structure for table `pr_job`
--

DROP TABLE IF EXISTS `pr_job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pr_job` (
  `PR_JOB_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PR_EMPLOYEE_ID` varchar(45) DEFAULT NULL,
  `PR_CLIENT_ID` varchar(45) DEFAULT NULL,
  `PR_DESIGNATION` varchar(45) DEFAULT NULL,
  `PR_SALARY` varchar(245) DEFAULT NULL,
  `PR_FILE` varchar(245) DEFAULT NULL,
  `PR_EXPERIENCE` varchar(45) DEFAULT NULL,
  `PR_EXPIRY_DATE` date DEFAULT NULL,
  `PR_STATUS` varchar(45) DEFAULT NULL,
  `PR_ENTRY_DATE` datetime DEFAULT NULL,
  `PR_TITLE` mediumtext,
  `PR_CITY_ID` varchar(45) DEFAULT NULL,
  `PR_DESCRIPTION` longtext,
  `PR_NO_OF_POSITION` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`PR_JOB_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pr_job`
--

LOCK TABLES `pr_job` WRITE;
/*!40000 ALTER TABLE `pr_job` DISABLE KEYS */;
INSERT INTO `pr_job` VALUES (6,'1','1','1','32000',NULL,'0-32 years',NULL,'1',NULL,'IT Recruiter','439','The one Must be fluent in Ins and out about tech recruitment, sourcing platforms, and Technical skills.\r\nRoles and resposibilities-\r\nCoordinate recruitment activities on behalf of the team, Like posting job openings, preparing advertisements.\r\nProcess applications and schedule interviews\r\nUsing various Talent Sourcing Platforms, Linked-in, Monster, Indeed, Naukri.\r\nKeeping all stakeholders updated on the recruitment process and\r\nManage relationship with service providers\r\nAnalyze the skills and qualities required for each job and develop job specifications/job adverts\r\nExperience Level- 5-8 years experience in IT recruitment.\r\nIf interested, please share your cv to [Confidential Information]','3'),(7,'1','1','2','12000',NULL,'0-3 years',NULL,'1',NULL,'Urgent Hiring for Talent Acquisition Specialist at Ahmedabad','783','\r\nMinimum 2-3 year of experience in recruiting IT Roles. (Cloud Roles)\r\nØ Recruit for various type of roles (Only IT) using different Job boards, LinkedIn, social media\r\nØ Can Negotiate rate\r\nØ Collect and verify needed documents for on boarding process\r\nØ Correct resume format if needed before submission.\r\nØ Hands on experience of designing and manage recruitment and selection process (Resume screening, screening calls, interviews etc)\r\nØ Experience with Job Boards like Monster, Dice, indeed, zip recruiter\r\nØ Best utilization of Internet, social media, FB/LinkedIn groups\r\nØ Build long-term relationships with past and potential candidates and establishes a pipeline of qualified resources.\r\nØ Conducts personal interviews via phone, video, and in-person meetings to qualify candidates for open positions with our clients.\r\nØ Prepares and facilitates candidate interviews with clients and follow-up debriefing.\r\nØ Performs thorough reference checks.\r\nØ Engages with the support team, which handles on boarding, to stay focused on recruiting and building the candidate pipeline.\r\nØ Maintains timely, compliant, and accurate documentation and metrics requirements on all activity related to prospects, clients, and candidates via the FCS database systems.\r\nØ Skill to use ATS, CRM, Word, Excel, and Google products with proficiency.\r\nMinimum Requirements\r\n· Excellent verbal and written communication skills.\r\n· Strong time management and organizational skills.\r\n· Experience using an applicant tracking system (Job Diva is preferred)\r\nJob Location: Ahmedabad\r\nJoining: immediate Joining preferred\r\nEducation: Candidates with hands on experience with any stream but preference would be from B.Tech background\r\nJob Type: Full-time','4');
/*!40000 ALTER TABLE `pr_job` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-12 22:19:04
