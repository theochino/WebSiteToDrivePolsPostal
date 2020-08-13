-- MySQL dump 10.13  Distrib 8.0.21, for Linux (x86_64)
--
-- Host: 192.168.199.18    Database: Twitter
-- ------------------------------------------------------
-- Server version	8.0.21-0ubuntu0.20.04.4

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `TwitToFoward`
--

DROP TABLE IF EXISTS `TwitToFoward`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `TwitToFoward` (
  `TwitToFoward_ID` int unsigned NOT NULL AUTO_INCREMENT,
  `TwitToFoward_Twitter` varchar(255) DEFAULT NULL,
  `TwitToFoward_Note` varchar(255) DEFAULT NULL,
  `TwitToFoward_LandingPage` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`TwitToFoward_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Twitter`
--

DROP TABLE IF EXISTS `Twitter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Twitter` (
  `Twitter_ID` int unsigned NOT NULL AUTO_INCREMENT,
  `Twitter_TweetID` bigint unsigned DEFAULT NULL,
  `Twitter_UserID` varchar(40) DEFAULT NULL,
  `Twitter_CreateTime` datetime DEFAULT NULL,
  PRIMARY KEY (`Twitter_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `TwitterAPI`
--

DROP TABLE IF EXISTS `TwitterAPI`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `TwitterAPI` (
  `TwitterAPI_ID` int unsigned NOT NULL AUTO_INCREMENT,
  `Twitter_ID` int unsigned DEFAULT NULL,
  `Twitter_ConsumerKey` varchar(100) DEFAULT NULL,
  `Twitter_ConsumerSecret` varchar(100) DEFAULT NULL,
  `Twitter_Token` varchar(100) DEFAULT NULL,
  `Twitter_TokenSecret` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`TwitterAPI_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `TwitterActions`
--

DROP TABLE IF EXISTS `TwitterActions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `TwitterActions` (
  `TwitterActions_ID` int unsigned NOT NULL AUTO_INCREMENT,
  `Twitter_ID` int unsigned DEFAULT NULL,
  `TwitterActions_TwitterID` int unsigned DEFAULT NULL,
  `TwitterActions_FollowingBack` enum('yes','no') DEFAULT NULL,
  `TwitterActions_DateAdded` datetime DEFAULT NULL,
  `TwitterActions_DateAddedFwdCnt` int unsigned DEFAULT NULL,
  `TwitterActions_DateAddedFlwngCnt` int unsigned DEFAULT NULL,
  `TwitterActions_DateRemoved` datetime DEFAULT NULL,
  `TwitterActions_DateRemovedFwdCnt` int unsigned DEFAULT NULL,
  `TwitterActions_DateRemovedFlwngCnt` int unsigned DEFAULT NULL,
  PRIMARY KEY (`TwitterActions_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `TwitterGroup`
--

DROP TABLE IF EXISTS `TwitterGroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `TwitterGroup` (
  `TwitterGroup_ID` int unsigned NOT NULL AUTO_INCREMENT,
  `TwitterGroup_Reason` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`TwitterGroup_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `TwitterPurpose`
--

DROP TABLE IF EXISTS `TwitterPurpose`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `TwitterPurpose` (
  `TwitterPurpose_ID` int unsigned NOT NULL AUTO_INCREMENT,
  `Twitter_ID` int unsigned DEFAULT NULL,
  `TwitterGroup_ID` int unsigned DEFAULT NULL,
  `TwitterPurpose_Reason` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`TwitterPurpose_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `TwitterText`
--

DROP TABLE IF EXISTS `TwitterText`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `TwitterText` (
  `TwitterText_ID` int unsigned NOT NULL AUTO_INCREMENT,
  `TwitterText_text` text,
  `TwitterText_date` datetime DEFAULT NULL,
  `TwitterText_purpose` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`TwitterText_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-13  0:04:05
