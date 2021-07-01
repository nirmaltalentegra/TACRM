-- MySQL dump 10.13  Distrib 8.0.20, for Linux (x86_64)
--
-- Host: localhost    Database: tacrm
-- ------------------------------------------------------
-- Server version	8.0.20-0ubuntu0.20.04.1

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
-- Table structure for table `account_type`
--

DROP TABLE IF EXISTS `account_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account_type` (
  `account_type_id` int NOT NULL AUTO_INCREMENT,
  `account_mode` tinyint NOT NULL DEFAULT '1',
  `account_type` varchar(64) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`account_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_type`
--

LOCK TABLES `account_type` WRITE;
/*!40000 ALTER TABLE `account_type` DISABLE KEYS */;
INSERT INTO `account_type` VALUES (1,1,'General','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,1,'Faculty Salary','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,1,'Batch','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,1,'Branch','0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,1,'Travel','0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,2,'Student Fees','0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,1,'Seminar','0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,2,'Consultation Fee','2016-06-21 02:16:28','2016-06-21 02:16:28'),(9,1,'Electricity Bill','0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,1,'Telephone Bill','0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,1,'Transport','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `account_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accounts` (
  `account_id` int NOT NULL AUTO_INCREMENT,
  `payee_name` varchar(64) NOT NULL,
  `amount_type` int NOT NULL,
  `branch_id` int NOT NULL,
  `payable_for` tinyint NOT NULL DEFAULT '0',
  `student_id` int NOT NULL DEFAULT '0',
  `total_amount` float(9,2) NOT NULL,
  `primary_date` date NOT NULL,
  `due_date` date NOT NULL,
  `payment_type` tinyint NOT NULL DEFAULT '0',
  `account_type` tinyint NOT NULL DEFAULT '0',
  `paid_amount` float(9,2) NOT NULL,
  `due_amount` float(9,2) NOT NULL,
  `payment_date` datetime NOT NULL,
  `payment_mode_id` tinyint NOT NULL DEFAULT '1',
  `comments` text NOT NULL,
  `account_status` int NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arbac_groups`
--

DROP TABLE IF EXISTS `arbac_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `arbac_groups` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `definition` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arbac_groups`
--

LOCK TABLES `arbac_groups` WRITE;
/*!40000 ALTER TABLE `arbac_groups` DISABLE KEYS */;
INSERT INTO `arbac_groups` VALUES (1,'Admin','Super Admin Group'),(2,'User','User Group'),(3,'Default','Default Access Group'),(4,'Expert','Expert Group'),(5,'Manager','Manager Access Group'),(6,'Limited Access','Limited Access Group'),(7,'View only','View Only'),(8,'Service provider','service provider');
/*!40000 ALTER TABLE `arbac_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arbac_perm_to_group`
--

DROP TABLE IF EXISTS `arbac_perm_to_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `arbac_perm_to_group` (
  `perm_id` int unsigned NOT NULL DEFAULT '0',
  `group_id` int unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`perm_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arbac_perm_to_group`
--

LOCK TABLES `arbac_perm_to_group` WRITE;
/*!40000 ALTER TABLE `arbac_perm_to_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `arbac_perm_to_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arbac_perm_to_user`
--

DROP TABLE IF EXISTS `arbac_perm_to_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `arbac_perm_to_user` (
  `perm_id` int unsigned NOT NULL DEFAULT '0',
  `user_id` int unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`perm_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arbac_perm_to_user`
--

LOCK TABLES `arbac_perm_to_user` WRITE;
/*!40000 ALTER TABLE `arbac_perm_to_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `arbac_perm_to_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arbac_perms`
--

DROP TABLE IF EXISTS `arbac_perms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `arbac_perms` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `definition` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arbac_perms`
--

LOCK TABLES `arbac_perms` WRITE;
/*!40000 ALTER TABLE `arbac_perms` DISABLE KEYS */;
/*!40000 ALTER TABLE `arbac_perms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arbac_pms`
--

DROP TABLE IF EXISTS `arbac_pms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `arbac_pms` (
  `id` int unsigned NOT NULL,
  `sender_id` int unsigned NOT NULL,
  `receiver_id` int unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text,
  `date_sent` datetime DEFAULT NULL,
  `date_read` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `full_index` (`id`,`sender_id`,`receiver_id`,`date_read`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arbac_pms`
--

LOCK TABLES `arbac_pms` WRITE;
/*!40000 ALTER TABLE `arbac_pms` DISABLE KEYS */;
/*!40000 ALTER TABLE `arbac_pms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arbac_system_variables`
--

DROP TABLE IF EXISTS `arbac_system_variables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `arbac_system_variables` (
  `id` int unsigned NOT NULL,
  `data_key` varchar(100) NOT NULL,
  `value` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arbac_system_variables`
--

LOCK TABLES `arbac_system_variables` WRITE;
/*!40000 ALTER TABLE `arbac_system_variables` DISABLE KEYS */;
/*!40000 ALTER TABLE `arbac_system_variables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arbac_user_to_group`
--

DROP TABLE IF EXISTS `arbac_user_to_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `arbac_user_to_group` (
  `user_id` int unsigned NOT NULL DEFAULT '0',
  `group_id` int unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arbac_user_to_group`
--

LOCK TABLES `arbac_user_to_group` WRITE;
/*!40000 ALTER TABLE `arbac_user_to_group` DISABLE KEYS */;
INSERT INTO `arbac_user_to_group` VALUES (1,1);
/*!40000 ALTER TABLE `arbac_user_to_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arbac_user_variables`
--

DROP TABLE IF EXISTS `arbac_user_variables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `arbac_user_variables` (
  `id` int unsigned NOT NULL,
  `user_id` int unsigned NOT NULL,
  `data_key` varchar(100) NOT NULL,
  `value` text,
  PRIMARY KEY (`id`),
  KEY `user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arbac_user_variables`
--

LOCK TABLES `arbac_user_variables` WRITE;
/*!40000 ALTER TABLE `arbac_user_variables` DISABLE KEYS */;
/*!40000 ALTER TABLE `arbac_user_variables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arbac_users`
--

DROP TABLE IF EXISTS `arbac_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `arbac_users` (
  `id` int unsigned NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `banned` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `last_login_attempt` datetime DEFAULT NULL,
  `forgot_exp` text,
  `remember_time` datetime DEFAULT NULL,
  `remember_exp` text,
  `verification_code` text,
  `totp_secret` varchar(16) DEFAULT NULL,
  `ip_address` text,
  `login_attempts` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arbac_users`
--

LOCK TABLES `arbac_users` WRITE;
/*!40000 ALTER TABLE `arbac_users` DISABLE KEYS */;
INSERT INTO `arbac_users` VALUES (1,'admin@dqserv.com','3783a5063e48003fd64eb62d2f06125430b4d63e62aeda455564932654079c80','Admin',0,'2021-04-28 11:10:39','2021-04-28 11:10:39','2021-04-28 11:00:00',NULL,NULL,NULL,NULL,NULL,'49.206.46.210',NULL);
/*!40000 ALTER TABLE `arbac_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `batch_pattern`
--

DROP TABLE IF EXISTS `batch_pattern`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `batch_pattern` (
  `batch_pattern_id` int NOT NULL AUTO_INCREMENT,
  `batch_pattern` varchar(64) NOT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`batch_pattern_id`),
  UNIQUE KEY `batch_pattern` (`batch_pattern`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batch_pattern`
--

LOCK TABLES `batch_pattern` WRITE;
/*!40000 ALTER TABLE `batch_pattern` DISABLE KEYS */;
INSERT INTO `batch_pattern` VALUES (1,'Weekdays',1,'2016-06-21 01:05:54','2016-06-21 00:00:00'),(2,'Weekends',1,'2016-06-21 01:05:54','2016-06-21 00:00:00'),(3,'Alternate Days',1,'2016-06-21 01:05:54','2016-06-21 00:00:00'),(4,'Weekly',1,'2016-06-21 01:05:54','2016-06-21 00:00:00'),(5,'Monthly',1,'2016-06-21 01:05:54','2016-06-21 00:00:00');
/*!40000 ALTER TABLE `batch_pattern` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `batch_type`
--

DROP TABLE IF EXISTS `batch_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `batch_type` (
  `batch_type_id` int NOT NULL AUTO_INCREMENT,
  `batch_type_name` varchar(64) NOT NULL,
  `active` tinyint NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`batch_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batch_type`
--

LOCK TABLES `batch_type` WRITE;
/*!40000 ALTER TABLE `batch_type` DISABLE KEYS */;
INSERT INTO `batch_type` VALUES (1,'Online',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'Webminar',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'Seminar',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'Instructor-Led Training',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,'Classroom Training',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `batch_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `batches`
--

DROP TABLE IF EXISTS `batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `batches` (
  `batch_id` int NOT NULL AUTO_INCREMENT,
  `course_id` int unsigned DEFAULT NULL,
  `category_id` int NOT NULL,
  `batch_code` varchar(64) DEFAULT NULL,
  `batch_title` varchar(128) NOT NULL,
  `description` text,
  `faculty_id` int DEFAULT NULL,
  `branch_id` int DEFAULT NULL,
  `batch_type` int NOT NULL,
  `batch_pattern` int NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `week_days` varchar(64) NOT NULL,
  `student_enrolled` int NOT NULL,
  `batch_capacity` int NOT NULL,
  `iscorporate` tinyint NOT NULL DEFAULT '0',
  `currency_id` int NOT NULL,
  `batch_fee_type` tinyint NOT NULL,
  `fees` decimal(9,2) DEFAULT NULL,
  `course_fee_type` tinyint NOT NULL DEFAULT '1',
  `course_fee` float(9,2) NOT NULL,
  `batch_status` int NOT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `added_by` int DEFAULT NULL,
  `is_deleted` tinyint NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`batch_id`),
  KEY `course_name` (`course_id`),
  KEY `faculty_id` (`faculty_id`),
  KEY `branch_id` (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batches`
--

LOCK TABLES `batches` WRITE;
/*!40000 ALTER TABLE `batches` DISABLE KEYS */;
INSERT INTO `batches` VALUES (1,1,8,NULL,'RHCE','RHCE - Full Time',1,1,5,4,'2016-06-13 00:00:00','2016-06-13 00:00:00','0,1,2,3,4,5',5,15,0,1,2,35000.00,1,0.00,0,1,NULL,1,NULL,'0000-00-00 00:00:00','2016-06-28 03:14:57'),(3,4,8,NULL,'batch1','batch1',2,3,5,5,'2016-06-15 00:00:00','2016-06-07 00:00:00','',0,0,0,1,1,0.00,2,0.00,0,1,NULL,1,NULL,'2016-06-28 03:17:52','2016-06-28 03:17:52');
/*!40000 ALTER TABLE `batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `batches_students`
--

DROP TABLE IF EXISTS `batches_students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `batches_students` (
  `batch_id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `faculty_id` int NOT NULL,
  `student_rating` int NOT NULL,
  `student_comments` text NOT NULL,
  `faculty_rating` int NOT NULL,
  `faculty_comments` text NOT NULL,
  `active` tinyint NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`batch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batches_students`
--

LOCK TABLES `batches_students` WRITE;
/*!40000 ALTER TABLE `batches_students` DISABLE KEYS */;
/*!40000 ALTER TABLE `batches_students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `branch` (
  `branch_id` int unsigned NOT NULL AUTO_INCREMENT,
  `branch_code` varchar(64) NOT NULL,
  `branch_type` int NOT NULL,
  `branch_name` varchar(128) NOT NULL DEFAULT '',
  `branch_reg_date` date NOT NULL,
  `branch_address` text NOT NULL,
  `branch_area` varchar(64) NOT NULL,
  `land_mark` text NOT NULL,
  `city_id` int NOT NULL,
  `zipcode` int NOT NULL,
  `country_id` int NOT NULL,
  `phone` varchar(32) NOT NULL,
  `mobile` varchar(32) NOT NULL,
  `email_id` varchar(128) DEFAULT NULL,
  `manager_id` int unsigned NOT NULL DEFAULT '0',
  `branch_status` int NOT NULL,
  `ispublic` tinyint unsigned NOT NULL DEFAULT '1',
  `flags` int unsigned NOT NULL DEFAULT '0',
  `autoresp_email_id` int unsigned NOT NULL DEFAULT '0',
  `signature` text,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`branch_id`),
  UNIQUE KEY `name` (`branch_name`),
  UNIQUE KEY `branch_code` (`branch_code`),
  KEY `manager_id` (`manager_id`),
  KEY `autoresp_email_id` (`autoresp_email_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch`
--

LOCK TABLES `branch` WRITE;
/*!40000 ALTER TABLE `branch` DISABLE KEYS */;
INSERT INTO `branch` VALUES (1,'branch1',2,'test','2011-06-30','test','test','test',2,575001,1,'1234567890','1234567890','0',0,14,1,0,0,'testing','2016-06-23 18:56:21','2016-06-28 00:22:22');
/*!40000 ALTER TABLE `branch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branch_type`
--

DROP TABLE IF EXISTS `branch_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `branch_type` (
  `branch_type_id` int NOT NULL AUTO_INCREMENT,
  `branch_type_name` varchar(64) NOT NULL,
  `active` tinyint NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`branch_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch_type`
--

LOCK TABLES `branch_type` WRITE;
/*!40000 ALTER TABLE `branch_type` DISABLE KEYS */;
INSERT INTO `branch_type` VALUES (1,'Head Office',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'Branch',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'Franchisee',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'3rd Party',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `branch_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `candidate_requirement`
--

DROP TABLE IF EXISTS `candidate_requirement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `candidate_requirement` (
  `candidate_req_id` int NOT NULL AUTO_INCREMENT,
  `candidate_req_details` varchar(128) NOT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`candidate_req_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidate_requirement`
--

LOCK TABLES `candidate_requirement` WRITE;
/*!40000 ALTER TABLE `candidate_requirement` DISABLE KEYS */;
INSERT INTO `candidate_requirement` VALUES (1,'Looking to Start After 2 Weeks',1,'2016-06-19 15:20:23','2016-06-19 15:20:23'),(2,'Looking to Start After 4 Weeks',1,'2016-06-19 15:20:23','2016-06-19 15:20:23'),(3,'Need to Arrange for a Demo Class',1,'2016-06-19 15:20:23','2016-06-19 15:20:23'),(4,'Need to Start the Class ASAP',1,'2016-06-19 15:20:23','2016-06-19 15:20:23'),(5,'Looking for Placement',1,'2016-06-19 15:20:23','2016-06-19 15:20:23');
/*!40000 ALTER TABLE `candidate_requirement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `parent_id` int NOT NULL,
  `category_name` varchar(128) NOT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,0,'Tuition',1,'2016-06-27 18:21:04','2016-06-27 18:21:04'),(2,0,'Test Preparation',1,'2016-06-27 18:21:04','2016-06-27 18:21:04'),(3,0,'Language Learning',1,'2016-06-27 18:21:04','2016-06-27 18:21:04'),(4,0,'IT Courses',1,'2016-06-27 18:21:04','2016-06-27 18:21:04'),(5,0,'School',1,'2016-06-27 18:21:04','2016-06-27 18:21:04'),(6,0,'College',1,'2016-06-27 18:21:04','2016-06-27 18:21:04'),(7,0,'Online Courses',1,'2016-06-27 18:21:04','2016-06-27 18:21:04'),(8,0,'Certificate',1,'2016-06-27 18:21:04','2016-06-27 18:21:04'),(10,8,'Long term course',1,'2016-06-27 18:21:04','2016-06-28 00:30:09'),(11,10,'short term course',1,'2016-06-28 00:24:31','2016-06-28 00:29:57');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_fee_type`
--

DROP TABLE IF EXISTS `course_fee_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_fee_type` (
  `course_fee_type_id` int NOT NULL AUTO_INCREMENT,
  `course_fee_type` varchar(64) NOT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`course_fee_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_fee_type`
--

LOCK TABLES `course_fee_type` WRITE;
/*!40000 ALTER TABLE `course_fee_type` DISABLE KEYS */;
INSERT INTO `course_fee_type` VALUES (1,'Paid',1,'2016-06-19 15:17:34','2016-06-19 15:17:34'),(2,'Free',1,'2016-06-19 15:17:34','2016-06-19 15:17:34');
/*!40000 ALTER TABLE `course_fee_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses_catalog`
--

DROP TABLE IF EXISTS `courses_catalog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `courses_catalog` (
  `course_id` int unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `course_code` varchar(40) DEFAULT NULL,
  `course_name` varchar(200) DEFAULT NULL,
  `course_summary` text,
  `course_contents` text,
  `course_duration` varchar(64) NOT NULL,
  `course_fee_type` tinyint NOT NULL DEFAULT '1',
  `course_duration_in` varchar(64) DEFAULT NULL,
  `course_fees` float(10,2) DEFAULT NULL,
  `is_deleted` tinyint DEFAULT NULL,
  `added_by` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `notes` text,
  `active` int NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`course_id`),
  UNIQUE KEY `course_code` (`course_code`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses_catalog`
--

LOCK TABLES `courses_catalog` WRITE;
/*!40000 ALTER TABLE `courses_catalog` DISABLE KEYS */;
INSERT INTO `courses_catalog` VALUES (1,8,'RH124','Redhat System Administration I','\r\n    Understand and use essential tools for handling files, directories, command-line environments, and documentation\r\n    Operate running systems, including booting into different run levels, identifying processes, starting and stopping virtual machines, and controlling services\r\n    Configure local storage using partitions and logical volumes\r\n    Create and configure file systems and file system attributes, such as permissions, encryption, access control lists, and network file systems\r\n    Deploy, configure, and maintain systems, including software installation, update, and core services\r\n    Manage users and groups, including use of a centralized directory for authentication\r\n    Manage security, including basic firewall and SELinux configuration\r\n','\r\n    Understand and use essential tools for handling files, directories, command-line environments, and documentation\r\n    Operate running systems, including booting into different run levels, identifying processes, starting and stopping virtual machines, and controlling services\r\n    Configure local storage using partitions and logical volumes\r\n    Create and configure file systems and file system attributes, such as permissions, encryption, access control lists, and network file systems\r\n    Deploy, configure, and maintain systems, including software installation, update, and core services\r\n    Manage users and groups, including use of a centralized directory for authentication\r\n    Manage security, including basic firewall and SELinux configuration\r\n','',1,NULL,NULL,NULL,0,NULL,NULL,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,8,'RH134','Redhat System Administration II','\r\n    Understand and use essential tools for handling files, directories, command-line environments, and documentation\r\n    Operate running systems, including booting into different run levels, identifying processes, starting and stopping virtual machines, and controlling services\r\n    Configure local storage using partitions and logical volumes\r\n    Create and configure file systems and file system attributes, such as permissions, encryption, access control lists, and network file systems\r\n    Deploy, configure, and maintain systems, including software installation, update, and core services\r\n    Manage users and groups, including use of a centralized directory for authentication\r\n    Manage security, including basic firewall and SELinux configuration\r\n','\r\n    Understand and use essential tools for handling files, directories, command-line environments, and documentation\r\n    Operate running systems, including booting into different run levels, identifying processes, starting and stopping virtual machines, and controlling services\r\n    Configure local storage using partitions and logical volumes\r\n    Create and configure file systems and file system attributes, such as permissions, encryption, access control lists, and network file systems\r\n    Deploy, configure, and maintain systems, including software installation, update, and core services\r\n    Manage users and groups, including use of a centralized directory for authentication\r\n    Manage security, including basic firewall and SELinux configuration\r\n','',1,NULL,NULL,NULL,0,NULL,NULL,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,0,'code67','Test course','Test course','','',2,NULL,NULL,NULL,0,NULL,'',1,'2016-06-27 18:43:56','2016-06-27 18:43:56'),(4,8,'certi123','Test course','','','',0,NULL,NULL,NULL,0,NULL,'',1,'2016-06-27 18:57:04','2016-06-27 18:57:04'),(6,11,'it123','test IT course','','','',0,NULL,NULL,NULL,0,NULL,'',1,'2016-06-28 00:49:43','2016-06-28 00:49:43'),(7,10,'it1234','test IT courses','','','',1,NULL,NULL,NULL,0,NULL,'',1,'2016-06-28 00:50:26','2016-06-28 00:50:26');
/*!40000 ALTER TABLE `courses_catalog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delegations`
--

DROP TABLE IF EXISTS `delegations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `delegations` (
  `id` int NOT NULL COMMENT 'Id of delegation',
  `manager_id` int NOT NULL COMMENT 'Manager wanting to delegate',
  `delegate_id` int NOT NULL COMMENT 'Employee having the delegation',
  PRIMARY KEY (`id`),
  KEY `manager_id` (`manager_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Delegation of approval';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delegations`
--

LOCK TABLES `delegations` WRITE;
/*!40000 ALTER TABLE `delegations` DISABLE KEYS */;
/*!40000 ALTER TABLE `delegations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `department` (
  `id` int unsigned NOT NULL,
  `pid` int unsigned NOT NULL DEFAULT '0',
  `sla_id` int unsigned NOT NULL DEFAULT '0',
  `email_id` int unsigned NOT NULL DEFAULT '0',
  `autoresp_email_id` int unsigned NOT NULL DEFAULT '0',
  `manager_id` int unsigned NOT NULL DEFAULT '0',
  `flags` int unsigned NOT NULL DEFAULT '0',
  `name` varchar(128) NOT NULL DEFAULT '',
  `signature` text,
  `ispublic` tinyint unsigned NOT NULL DEFAULT '1',
  `group_membership` tinyint(1) NOT NULL DEFAULT '0',
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`,`pid`),
  KEY `manager_id` (`manager_id`),
  KEY `autoresp_email_id` (`autoresp_email_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `designation`
--

DROP TABLE IF EXISTS `designation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `designation` (
  `id` int NOT NULL,
  `name` varchar(64) NOT NULL,
  `position` int NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `designation`
--

LOCK TABLES `designation` WRITE;
/*!40000 ALTER TABLE `designation` DISABLE KEYS */;
INSERT INTO `designation` VALUES (1,'President',1,'2021-04-21 22:49:10','2016-03-20 20:13:04'),(2,'Vice President',2,'2021-04-21 22:49:10','2016-03-20 20:13:27'),(3,'General Manager',3,'2021-04-21 22:49:10','2016-03-20 20:13:40'),(4,'Regional Manager',4,'2021-04-21 22:49:10','2016-03-20 20:14:29'),(5,'Manager',5,'2021-04-21 22:49:10','2016-03-20 20:14:39'),(6,'Senior Engineer',6,'2021-04-21 22:49:10','2016-03-20 20:14:54'),(7,'Engineer',7,'2021-04-21 22:49:10','2016-03-20 20:15:17'),(8,'Coordinator',7,'2021-04-21 22:49:10','2016-03-20 20:15:50'),(9,'Admin Executive',7,'2021-04-21 22:49:10','2016-03-20 20:16:04'),(10,'Sales Executive',7,'2021-04-21 22:49:10','2016-03-20 20:16:16'),(11,'Account Executive',7,'2021-04-21 22:49:10','2016-03-20 20:16:50'),(12,'Permanent Employee',7,'2021-04-21 22:49:10','2016-03-20 20:19:05'),(13,'Temporary Employee',8,'2021-04-21 22:49:10','2016-03-20 20:19:19'),(14,'Contract',8,'2021-04-21 22:49:10','2016-03-20 20:19:32');
/*!40000 ALTER TABLE `designation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faculty` (
  `faculty_id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(32) NOT NULL,
  `middlename` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `mobile` int NOT NULL,
  `gender` varchar(64) NOT NULL,
  `dob` date NOT NULL,
  `primary_skill` varchar(64) NOT NULL,
  `linkedin` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `education` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `experience` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `online_teaching_experience` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `minimum_fee` int NOT NULL,
  `maximum_fee` int NOT NULL,
  `isteachonline` tinyint NOT NULL,
  `registered_date` timestamp NOT NULL,
  `lastlogin` timestamp NOT NULL,
  `active` tinyint NOT NULL,
  `created` timestamp NOT NULL,
  `updated` timestamp NOT NULL,
  `Institute_name` varchar(64) NOT NULL,
  `degree_type` varchar(64) NOT NULL,
  `degree_name` varchar(64) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `association` varchar(64) NOT NULL COMMENT 'Parttime, full time, correspondence ',
  `speciality` int NOT NULL,
  `score` int NOT NULL,
  PRIMARY KEY (`faculty_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `mobile` (`mobile`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faculty`
--

LOCK TABLES `faculty` WRITE;
/*!40000 ALTER TABLE `faculty` DISABLE KEYS */;
/*!40000 ALTER TABLE `faculty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faculty_skill`
--

DROP TABLE IF EXISTS `faculty_skill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faculty_skill` (
  `faculty_id` int NOT NULL,
  `skill_id` int NOT NULL,
  `from_level` varchar(32) NOT NULL,
  `to_level` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faculty_skill`
--

LOCK TABLES `faculty_skill` WRITE;
/*!40000 ALTER TABLE `faculty_skill` DISABLE KEYS */;
/*!40000 ALTER TABLE `faculty_skill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grades` (
  `grade_id` int NOT NULL AUTO_INCREMENT,
  `grade_name` varchar(32) NOT NULL,
  `active` tinyint NOT NULL,
  `created` timestamp NOT NULL,
  `updated` timestamp NOT NULL,
  PRIMARY KEY (`grade_id`),
  UNIQUE KEY `grade_name` (`grade_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grades`
--

LOCK TABLES `grades` WRITE;
/*!40000 ALTER TABLE `grades` DISABLE KEYS */;
/*!40000 ALTER TABLE `grades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interest_level`
--

DROP TABLE IF EXISTS `interest_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `interest_level` (
  `interest_level_id` int NOT NULL AUTO_INCREMENT,
  `interest_level` varchar(64) NOT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`interest_level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interest_level`
--

LOCK TABLES `interest_level` WRITE;
/*!40000 ALTER TABLE `interest_level` DISABLE KEYS */;
INSERT INTO `interest_level` VALUES (1,'Need to Push',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'Not Interested',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'Willing to join',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'Willing not now',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,'Highly Interested',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,'Interested',0,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `interest_level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leads`
--

DROP TABLE IF EXISTS `leads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `leads` (
  `lead_id` int NOT NULL AUTO_INCREMENT,
  `source_id` int NOT NULL,
  `staff_id` int NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `middle_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `mobile` varchar(16) NOT NULL,
  `alt_mobile` varchar(16) NOT NULL,
  `ref_name` varchar(64) NOT NULL,
  `ref_mobile` varchar(16) NOT NULL,
  `comments` text NOT NULL,
  `branch_id` int NOT NULL DEFAULT '0',
  `course_id` int NOT NULL DEFAULT '0',
  `country_id` int NOT NULL DEFAULT '1',
  `active` tinyint NOT NULL DEFAULT '1',
  `status` int NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`lead_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leads`
--

LOCK TABLES `leads` WRITE;
/*!40000 ALTER TABLE `leads` DISABLE KEYS */;
INSERT INTO `leads` VALUES (1,1,1,'Jagan','Babu','Ranga','jaganr@gmail.com','9911001111','9922110011','','','',0,0,0,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `leads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organization`
--

DROP TABLE IF EXISTS `organization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organization` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL DEFAULT '',
  `manager` varchar(16) NOT NULL DEFAULT '',
  `status` int unsigned NOT NULL DEFAULT '0',
  `domain` varchar(256) NOT NULL DEFAULT '',
  `extra` text,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organization`
--

LOCK TABLES `organization` WRITE;
/*!40000 ALTER TABLE `organization` DISABLE KEYS */;
INSERT INTO `organization` VALUES (1,'TesNow','Vivek',1,'dqserv.com','','2016-01-25 20:46:40','2016-03-21 12:34:45'),(2,'DQServ','',0,'',NULL,'2016-03-03 04:54:55','2016-04-23 01:19:58');
/*!40000 ALTER TABLE `organization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `skills` (
  `skill_id` int NOT NULL AUTO_INCREMENT,
  `skill_name` varchar(64) NOT NULL,
  `created` timestamp NOT NULL,
  `updated` timestamp NOT NULL,
  PRIMARY KEY (`skill_id`),
  UNIQUE KEY `skill_name` (`skill_name`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skills`
--

LOCK TABLES `skills` WRITE;
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
INSERT INTO `skills` VALUES (1,'DevOps','2021-04-21 23:25:52','2021-04-21 23:25:52'),(2,'Dockers','2021-04-21 23:25:52','2021-04-21 23:25:52');
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `source`
--

DROP TABLE IF EXISTS `source`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `source` (
  `source_id` int NOT NULL AUTO_INCREMENT,
  `source_details` varchar(64) NOT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`source_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `source`
--

LOCK TABLES `source` WRITE;
/*!40000 ALTER TABLE `source` DISABLE KEYS */;
INSERT INTO `source` VALUES (1,'Google',1,'2016-06-19 15:07:25','2016-06-19 15:07:25'),(2,'Email',1,'2016-06-19 15:07:25','2016-06-19 15:07:25'),(3,'Friends',1,'2016-06-19 15:07:25','2016-06-19 15:07:25'),(4,'SMS',1,'2016-06-19 15:07:25','2016-06-19 15:07:25'),(5,'Online Promotion',1,'2016-06-19 15:07:25','2016-06-19 15:07:25'),(6,'Trainer/Staff ref',1,'2016-06-19 15:07:25','2016-06-19 15:07:25'),(7,'School campus',1,'2016-06-19 15:07:25','2016-06-19 15:07:25'),(8,'Student Ref',1,'2016-06-19 15:07:25','2016-06-19 15:07:25'),(9,'News Paper',1,'2016-06-19 15:07:25','2016-06-19 15:07:25'),(10,'Corporate/Company',1,'2016-06-19 15:07:25','2016-06-19 15:07:25');
/*!40000 ALTER TABLE `source` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staff` (
  `staff_id` int unsigned NOT NULL,
  `org_id` int NOT NULL DEFAULT '1',
  `dept_id` int unsigned NOT NULL DEFAULT '1',
  `branch_id` int NOT NULL DEFAULT '1',
  `role_id` int unsigned NOT NULL DEFAULT '3',
  `manager_id` int NOT NULL DEFAULT '0',
  `designation_id` int NOT NULL DEFAULT '7',
  `firstname` varchar(132) DEFAULT NULL,
  `lastname` varchar(32) DEFAULT NULL,
  `phone` varchar(24) NOT NULL,
  `phone_ext` varchar(6) DEFAULT NULL,
  `mobile` varchar(24) NOT NULL,
  `signature` text NOT NULL,
  `lang` varchar(16) DEFAULT NULL,
  `timezone` varchar(64) DEFAULT NULL,
  `notes` text,
  `sms_notification` tinyint(1) NOT NULL DEFAULT '0',
  `isadmin` tinyint(1) NOT NULL DEFAULT '0',
  `isvisible` tinyint unsigned NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`staff_id`),
  UNIQUE KEY `branch_id` (`branch_id`),
  KEY `dept_id` (`dept_id`),
  KEY `issuperuser` (`isadmin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (1,1,3,1,3,1,7,'Web','Admin','000','000','9980487456','--\r\nWebadmin',NULL,NULL,NULL,0,0,0,'2016-05-24 19:07:40','2021-04-24 08:25:17');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_branch_access`
--

DROP TABLE IF EXISTS `staff_branch_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staff_branch_access` (
  `staff_id` int unsigned NOT NULL DEFAULT '0',
  `branch_id` int unsigned NOT NULL DEFAULT '0',
  `role_id` int unsigned NOT NULL DEFAULT '0',
  `flags` int unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`staff_id`,`branch_id`),
  KEY `dept_id` (`branch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_branch_access`
--

LOCK TABLES `staff_branch_access` WRITE;
/*!40000 ALTER TABLE `staff_branch_access` DISABLE KEYS */;
INSERT INTO `staff_branch_access` VALUES (1,2,2,1),(1,3,3,1);
/*!40000 ALTER TABLE `staff_branch_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_details`
--

DROP TABLE IF EXISTS `staff_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staff_details` (
  `staff_id` int NOT NULL,
  `firstname` varchar(132) DEFAULT NULL,
  `lastname` varchar(32) DEFAULT NULL,
  `father_name` varchar(64) NOT NULL,
  `husband_name` varchar(64) NOT NULL,
  `phone` varchar(24) NOT NULL,
  `phone_ext` varchar(6) DEFAULT NULL,
  `mobile` varchar(24) NOT NULL,
  `home_phone` int NOT NULL,
  `photo` varchar(40) DEFAULT NULL,
  `dob` date NOT NULL,
  `dob_place` varchar(64) NOT NULL,
  `martial_status` varchar(64) NOT NULL,
  `children` tinyint NOT NULL,
  `occupation` varchar(64) NOT NULL,
  `joined_date` date NOT NULL,
  `education` text NOT NULL,
  `specialization` text NOT NULL,
  `achivement_awards` text NOT NULL,
  `events_attended` int NOT NULL,
  `event_trained` int NOT NULL,
  `fulltime` char(3) DEFAULT 'Yes',
  `sms_notification` tinyint(1) NOT NULL DEFAULT '0',
  `isadmin` tinyint(1) NOT NULL DEFAULT '0',
  `isvisible` tinyint unsigned NOT NULL DEFAULT '1',
  `onvacation` tinyint unsigned NOT NULL DEFAULT '0',
  `assigned_only` tinyint unsigned NOT NULL DEFAULT '0',
  `change_passwd` tinyint unsigned NOT NULL DEFAULT '0',
  `max_page_size` int unsigned NOT NULL DEFAULT '0',
  `auto_refresh_rate` int unsigned NOT NULL DEFAULT '0',
  `default_signature_type` enum('none','mine','dept') NOT NULL DEFAULT 'none',
  `default_paper_size` enum('Letter','Legal','Ledger','A4','A3') NOT NULL DEFAULT 'Letter',
  `extra` text,
  `permissions` text,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_details`
--

LOCK TABLES `staff_details` WRITE;
/*!40000 ALTER TABLE `staff_details` DISABLE KEYS */;
INSERT INTO `staff_details` VALUES (1,'manju','shri','','','1234567891','111','1234567890',0,'','1988-03-02','mangalore','single',0,'','2016-06-24','BE','','',0,0,'no',1,0,1,0,1,0,3,3,'none','Legal','',''),(2,'geetha','s','','','','','1234567890',0,'','1988-03-02','mangalore','single',0,'','2016-06-23','B com','','',0,0,'yes',0,0,1,0,1,0,7,7,'mine','Legal','','');
/*!40000 ALTER TABLE `staff_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_sms_notify`
--

DROP TABLE IF EXISTS `staff_sms_notify`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staff_sms_notify` (
  `staff_id` int unsigned NOT NULL DEFAULT '0',
  `dept_id` int unsigned NOT NULL DEFAULT '0',
  `sms_id` int unsigned NOT NULL DEFAULT '0',
  `flags` int unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`staff_id`,`dept_id`),
  KEY `dept_id` (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_sms_notify`
--

LOCK TABLES `staff_sms_notify` WRITE;
/*!40000 ALTER TABLE `staff_sms_notify` DISABLE KEYS */;
/*!40000 ALTER TABLE `staff_sms_notify` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status` (
  `status_id` int NOT NULL AUTO_INCREMENT,
  `status_type` int NOT NULL DEFAULT '1',
  `status` varchar(64) NOT NULL,
  `active` int NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,1,'New',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,1,'Pending',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,1,'Overdue',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,1,'Closed',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,4,'Enrolled',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,3,'Qualified',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,6,'Ongoing',1,'2016-06-19 23:15:22','2016-06-19 23:15:22'),(8,6,'Upcoming',1,'2016-06-19 23:15:22','2016-06-19 23:15:22'),(9,6,'Completed',1,'2016-06-19 23:15:22','2016-06-19 23:15:22'),(10,6,'Cancelled',1,'2016-06-19 23:15:22','2016-06-19 23:15:22'),(11,6,'Postponed',1,'2016-06-19 23:15:22','2016-06-19 23:15:22'),(12,3,'Processed',1,'2016-06-19 23:16:55','2016-06-19 23:16:55'),(13,3,'Disqualified',1,'2016-06-19 23:16:55','2016-06-19 23:16:55'),(14,5,'new',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(15,5,'old',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(16,7,'new',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(17,5,'Head-Office',1,'2021-04-21 23:19:39','2021-04-21 23:19:39'),(18,5,'Branch-Office',1,'2021-04-21 23:19:39','2021-04-21 23:19:39'),(19,5,'Franchise',1,'2021-04-21 23:21:02','2021-04-21 23:21:02'),(20,5,'3rd-Party',1,'2021-04-21 23:21:02','2021-04-21 23:21:02');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_type`
--

DROP TABLE IF EXISTS `status_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status_type` (
  `status_type_id` int NOT NULL AUTO_INCREMENT,
  `status_type` varchar(64) NOT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`status_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_type`
--

LOCK TABLES `status_type` WRITE;
/*!40000 ALTER TABLE `status_type` DISABLE KEYS */;
INSERT INTO `status_type` VALUES (1,'general',1,'2016-06-19 18:15:41','2016-06-19 18:15:41'),(2,'expense',1,'2016-06-19 18:14:55','2016-06-19 18:14:55'),(3,'lead',1,'2016-06-19 18:14:55','2016-06-19 18:14:55'),(4,'enquiry',1,'2016-06-19 18:14:55','2016-06-19 18:14:55'),(5,'branch',1,'2016-06-19 18:14:55','2016-06-19 18:14:55'),(6,'batch',1,'2016-06-19 18:14:55','2016-06-19 18:14:55'),(7,'staff',1,'2016-06-24 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `status_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students` (
  `student_id` int NOT NULL AUTO_INCREMENT,
  `course_id` int NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `phone` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(64) NOT NULL,
  `zipcode` varchar(32) NOT NULL,
  `fees_payable` float(10,2) NOT NULL,
  `fees_paid` float(10,2) NOT NULL,
  `active` tinyint NOT NULL,
  `added_by` int NOT NULL,
  `course_completed` int NOT NULL,
  `completion_date` timestamp NOT NULL,
  `is_deleted` int DEFAULT NULL,
  `created` timestamp NOT NULL,
  `updated` timestamp NOT NULL,
  `deleted_at` timestamp NOT NULL,
  `batch_id` int DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `course_id` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_details` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(64) NOT NULL,
  `middle_name` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `last_name` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `gender` tinyint DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `martial_status` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `husband_name` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `guardian` tinyint NOT NULL DEFAULT '0',
  `guardian_name` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `guardian_mobile` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `father_name` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `mother_name` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `salary` int DEFAULT NULL,
  `present_address` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `permanent_address` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `area` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `city` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `zipcode` int DEFAULT NULL,
  `mobile` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `email` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `level` int DEFAULT NULL,
  `qualification` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `occupation` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `physically_challenged` tinyint NOT NULL DEFAULT '1',
  `physically_challenged_details` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_details`
--

LOCK TABLES `user_details` WRITE;
/*!40000 ALTER TABLE `user_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_email`
--

DROP TABLE IF EXISTS `user_email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_email` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `flags` int unsigned NOT NULL DEFAULT '0',
  `address` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `address` (`address`),
  KEY `user_email_lookup` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_email`
--

LOCK TABLES `user_email` WRITE;
/*!40000 ALTER TABLE `user_email` DISABLE KEYS */;
INSERT INTO `user_email` VALUES (1,1,0,'vivekra@talentegra.com'),(2,0,0,'srividhyav@talentegra.com');
/*!40000 ALTER TABLE `user_email` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_mobile`
--

DROP TABLE IF EXISTS `user_mobile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_mobile` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL DEFAULT '0',
  `flags` int unsigned NOT NULL DEFAULT '0',
  `mobile_no` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mobile_no` (`mobile_no`),
  KEY `user_mobile_lookup` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_mobile`
--

LOCK TABLES `user_mobile` WRITE;
/*!40000 ALTER TABLE `user_mobile` DISABLE KEYS */;
INSERT INTO `user_mobile` VALUES (1,1,0,'9841533114'),(2,2,1,'9841934874');
/*!40000 ALTER TABLE `user_mobile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL,
  `org_id` int unsigned NOT NULL,
  `default_email_id` int NOT NULL,
  `default_mobile_no` int NOT NULL,
  `status` int unsigned NOT NULL DEFAULT '1',
  `name` varchar(128) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `org_id` (`org_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-28 12:02:28
