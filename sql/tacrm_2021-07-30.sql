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
INSERT INTO `arbac_perm_to_user` VALUES (34,9),(35,9),(41,9);
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
  `id` int unsigned NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arbac_users`
--

LOCK TABLES `arbac_users` WRITE;
/*!40000 ALTER TABLE `arbac_users` DISABLE KEYS */;
INSERT INTO `arbac_users` VALUES (1,'admin@dqserv.com','3783a5063e48003fd64eb62d2f06125430b4d63e62aeda455564932654079c80','Admin',0,'2021-07-30 15:35:37','2021-07-30 15:35:37','2021-07-30 15:00:00',NULL,'2021-06-27 00:00:00','FVTn1cgaIHvNrmkJ',NULL,NULL,'157.45.241.84',NULL),(8,'teststaff@test.com','a5f6d0307e403fc289c251dc13d484556d5029d4c57425ac0b734d9fb87f9bd0','teststaff',0,'2021-07-05 16:24:22','2021-07-05 16:24:22','2021-07-05 16:00:00',NULL,NULL,NULL,NULL,NULL,'49.37.173.172',NULL),(9,'test1@test.com','a383bd0d712670e6e1c9842ecf684b3ccfc87a20640670e6430633d06c92d6fa','teststaff1',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0);
/*!40000 ALTER TABLE `arbac_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `associations`
--

DROP TABLE IF EXISTS `associations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `associations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `association` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `associations`
--

LOCK TABLES `associations` WRITE;
/*!40000 ALTER TABLE `associations` DISABLE KEYS */;
INSERT INTO `associations` VALUES (1,'Full Time',NULL,NULL),(2,'Part Time',NULL,NULL),(3,'Correspondence/Distance Learning',NULL,NULL);
/*!40000 ALTER TABLE `associations` ENABLE KEYS */;
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
INSERT INTO `batch_pattern` VALUES (1,'Weekdays',1,'2016-06-21 01:05:54','2016-06-21 00:00:00'),(2,'Weekends',1,'2016-06-21 01:05:54','2016-06-21 00:00:00'),(3,'Alternate Days',1,'2016-06-21 01:05:54','2016-06-21 00:00:00'),(4,'Weekly',1,'2016-06-21 01:05:54','2016-06-21 00:00:00'),(5,'Monthly',1,'2016-06-21 01:05:54','2016-06-21 00:00:00');
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
INSERT INTO `batches` VALUES (1,3,16,'Batch001','Blockchain Ethereum & Hyperledger - Jul10','Blockchain Ethereum & Hyperledger - Jul10',30,6,1,2,'2021-06-10 00:00:00','2021-08-10 00:00:00','1,7',0,5,0,1,1,8000.00,1,16000.00,8,1,NULL,1,NULL,'2021-07-11 11:51:44','2021-07-11 11:51:44'),(2,3,16,'Batch002','Test Batch - Ignore','Test Batch - Ignore',44,7,1,2,'2021-07-24 00:00:00','2021-08-14 00:00:00','1,7',0,5,0,1,1,1575.00,1,16000.00,7,1,NULL,1,NULL,'2021-07-23 11:29:38','2021-07-23 11:29:38'),(3,3,16,'Batch003','test','test',30,1,2,1,'2021-07-30 00:00:00','2021-08-08 00:00:00','1,2,3',0,10,0,1,1,20000.00,1,16000.00,7,1,NULL,1,NULL,'2021-07-29 18:35:39','2021-07-29 18:35:39');
/*!40000 ALTER TABLE `batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `batches_students`
--

DROP TABLE IF EXISTS `batches_students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `batches_students` (
  `batch_student_id` int NOT NULL AUTO_INCREMENT,
  `batch_id` int NOT NULL,
  `student_id` int NOT NULL,
  `faculty_id` int DEFAULT NULL,
  `student_rating` int DEFAULT NULL,
  `student_comments` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `faculty_rating` int DEFAULT NULL,
  `faculty_comments` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `certified` enum('Yes','No') DEFAULT 'No',
  `active` tinyint NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`batch_student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batches_students`
--

LOCK TABLES `batches_students` WRITE;
/*!40000 ALTER TABLE `batches_students` DISABLE KEYS */;
INSERT INTO `batches_students` VALUES (1,1,5,NULL,NULL,NULL,NULL,NULL,'No',0,'2021-07-11 11:52:54','0000-00-00 00:00:00'),(2,1,6,NULL,NULL,NULL,NULL,NULL,'No',0,'2021-07-11 11:53:48','2021-07-21 13:48:21'),(3,2,7,NULL,NULL,NULL,NULL,NULL,'No',0,'2021-07-23 11:30:11','2021-07-23 11:32:39'),(4,1,8,NULL,NULL,NULL,NULL,NULL,'No',0,'2021-07-24 13:03:14','2021-07-24 13:14:04'),(5,2,9,NULL,NULL,NULL,NULL,NULL,'No',0,'2021-07-24 14:50:04','2021-07-24 14:51:27'),(6,3,10,NULL,NULL,NULL,NULL,NULL,'No',0,'2021-07-29 18:38:12','0000-00-00 00:00:00'),(7,1,11,NULL,NULL,NULL,NULL,NULL,'No',0,'2021-07-30 11:29:34','0000-00-00 00:00:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch`
--

LOCK TABLES `branch` WRITE;
/*!40000 ALTER TABLE `branch` DISABLE KEYS */;
INSERT INTO `branch` VALUES (1,'branch1',2,'test','2011-06-30','test','test','test',2,575001,1,'1234567890','1234567890','0',0,14,1,0,0,'testing','2016-06-23 18:56:21','2016-06-28 00:22:22'),(5,'branch3',4,'branch3','2021-07-09','branch3','branch3','branch3',1,11111,1,'1122334456','8877665549','branch3@test.com',1,8,0,0,1,'test','2021-07-01 10:58:11','2021-07-01 12:21:29'),(6,'BR001',2,'Mangalore','2021-07-02','Mangalore','Mangalore','layout123',3,575014,1,'2356988745','987456985','test@as.com',2,8,1,0,236598745,'asm','2021-07-02 14:04:25','2021-07-02 14:04:25');
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (3,0,'Language Learning',1,'2016-06-27 18:21:04','2016-06-27 18:21:04'),(4,0,'IT Courses',1,'2016-06-27 18:21:04','2016-06-27 18:21:04'),(7,0,'Online Courses',1,'2016-06-27 18:21:04','2016-06-27 18:21:04'),(8,0,'Certificate',1,'2016-06-27 18:21:04','2016-06-27 18:21:04'),(10,8,'Long term course',1,'2016-06-27 18:21:04','2016-06-28 00:30:09'),(11,10,'short term course',1,'2016-06-28 00:24:31','2016-06-28 00:29:57'),(15,0,'Webinars',1,'2021-07-02 10:37:48','0000-00-00 00:00:00'),(17,0,'Cloud',1,'2021-07-10 21:42:24','0000-00-00 00:00:00'),(19,0,'Blockchain',1,'2021-07-30 16:35:30','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `city` (
  `city_id` int NOT NULL AUTO_INCREMENT,
  `city_name` varchar(64) NOT NULL,
  `state_id` int NOT NULL,
  `country_id` int NOT NULL,
  `active` tinyint NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,'Chennai',1,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'Thrichy',1,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'Bangalore',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `country` (
  `country_id` int NOT NULL AUTO_INCREMENT,
  `country_name` varchar(128) NOT NULL,
  `country_short` varchar(10) NOT NULL,
  `active` tinyint NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'India','IND',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'United States of America','USA',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'Singapore','SG',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'United Kingdom','UK',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses_catalog`
--

LOCK TABLES `courses_catalog` WRITE;
/*!40000 ALTER TABLE `courses_catalog` DISABLE KEYS */;
INSERT INTO `courses_catalog` VALUES (3,17,'BC101','BC101 - Blockchain Foundation (Ethereum & Hyperledger)','Blockchain Foundation (Ethereum & Hyperledger)','Blockchain Foundation (Ethereum & Hyperledger)','16',1,NULL,16000.00,1,1,'2021-07-29 12:32:50','',1,'2021-07-11 11:33:55','2021-07-30 15:21:31');
/*!40000 ALTER TABLE `courses_catalog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currency`
--

DROP TABLE IF EXISTS `currency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `currency` (
  `currency_id` int NOT NULL AUTO_INCREMENT,
  `currency_name` varchar(64) NOT NULL,
  `currency_symbol` varchar(11) NOT NULL,
  `currency_short` varchar(11) NOT NULL,
  `country_id` int NOT NULL,
  `conversion` decimal(9,2) NOT NULL,
  `active` int NOT NULL,
  `created` int NOT NULL,
  PRIMARY KEY (`currency_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currency`
--

LOCK TABLES `currency` WRITE;
/*!40000 ALTER TABLE `currency` DISABLE KEYS */;
INSERT INTO `currency` VALUES (1,'INR','Rs','Rs',1,0.00,1,0);
/*!40000 ALTER TABLE `currency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `prefix` varchar(10) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `phone` int DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `receivables` decimal(10,0) DEFAULT NULL,
  `credits` decimal(10,0) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'1','Tippanna','M','Pawar','Old Hubli','vrl',2147483647,'tmpawar66@gmail.com','hubli',100,0,'2021-07-29 04:54:56','2021-07-29 04:54:56',1),(3,'1','Asmitha','R','Shetty','Sai Ram','3D solutions',2147483647,'asmitharshetty@gmail.com','Mangalore',15000,0,'2021-07-29 10:31:38','2021-07-29 10:31:38',1);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `degree_types`
--

DROP TABLE IF EXISTS `degree_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `degree_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `degree_type` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `degree_types`
--

LOCK TABLES `degree_types` WRITE;
/*!40000 ALTER TABLE `degree_types` DISABLE KEYS */;
INSERT INTO `degree_types` VALUES (1,'Secondary',NULL,NULL),(2,'Higher Secondary',NULL,NULL),(3,'Graduation',NULL,NULL),(4,'Advanced Diploma',NULL,NULL),(5,'Post Graduation',NULL,NULL),(6,'Doctorate/PhD',NULL,NULL),(7,'Diploma',NULL,NULL),(8,'Certification',NULL,NULL),(9,'Other',NULL,NULL);
/*!40000 ALTER TABLE `degree_types` ENABLE KEYS */;
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
INSERT INTO `department` VALUES (1,0,1,0,0,1,0,'Support',NULL,1,0,'2021-05-08 15:46:21','2021-05-08 15:46:21');
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
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grade_level`
--

DROP TABLE IF EXISTS `grade_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grade_level` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `grade_level_name` varchar(200) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grade_level`
--

LOCK TABLES `grade_level` WRITE;
/*!40000 ALTER TABLE `grade_level` DISABLE KEYS */;
INSERT INTO `grade_level` VALUES (1,'Beginner',NULL,NULL),(2,'Intermediate',NULL,NULL),(3,'Expert',NULL,NULL),(4,'Preschool, Kindergarten, KG, Nursery',NULL,NULL),(5,'Grade 1',NULL,NULL),(6,'Grade 2',NULL,NULL),(7,'Grade 3',NULL,NULL),(8,'Grade 4',NULL,NULL),(9,'Grade 5',NULL,NULL),(10,'Grade 6',NULL,NULL),(11,'Grade 7',NULL,NULL),(12,'Grade 8',NULL,NULL),(13,'Grade 9',NULL,NULL),(14,'Grade 10',NULL,NULL),(15,'GCSE',NULL,NULL),(16,'O level',NULL,NULL),(17,'Grade 11',NULL,NULL),(18,'AS level',NULL,NULL),(19,'A2 level',NULL,NULL),(20,'A level',NULL,NULL),(21,'Grade 12',NULL,NULL),(22,'Diploma',NULL,NULL),(23,'Bachelors/Undergraduate',NULL,NULL),(24,'Masters/Postgraduate',NULL,NULL),(25,'MPhil',NULL,NULL),(26,'Doctorate/PhD',NULL,NULL),(27,'Adult/Casual learning',NULL,NULL);
/*!40000 ALTER TABLE `grade_level` ENABLE KEYS */;
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
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoices` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_no` int DEFAULT NULL,
  `customer_id` int DEFAULT NULL,
  `total_qty` double DEFAULT NULL,
  `total_amt` double DEFAULT NULL,
  `paid` double DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `refunded` double DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  `terms` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoices_ibfk_1` (`customer_id`),
  CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
INSERT INTO `invoices` VALUES (1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `items` (
  `id` int NOT NULL,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `customer_id` int DEFAULT NULL,
  `subject_id` int DEFAULT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `rate` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `paid` double DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `status` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `subject_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `subject_id` (`subject_id`),
  CONSTRAINT `items_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_roles_table',1),(2,'2014_10_12_000000_create_users_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2021_05_03_081005_subjects',1),(6,'2021_05_03_081927_create_subjects_table',1),(8,'2021_05_03_085023_create_profiles_table',2),(9,'2021_05_04_163734_create_sub_levels_table',3),(10,'2021_05_05_104545_create_associations_table',4),(11,'2021_05_05_104637_create_degree_types_table',4),(12,'2021_05_24_191246_create_student_posts_table',1),(13,'2021_05_24_191140_create_grade_level_table',1),(14,'2021_05_15_060148_create_pending_user_emails_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('asmitharshetty@gmail.com','$2y$10$SV2LceZGoGnXD7qD41Xrw.uBqhyXy0wyWQdjS.dI5IiMVNIALoJYW','2021-07-20 14:38:26'),('asmitharshetty+21@gmail.com','$2y$10$JDb4at0RNSzrjfbEuEGbC.lLQrsXIOv4oWpu2W1uQIj.y.Fru5rwm','2021-07-20 14:38:40'),('test@gmail.com','$2y$10$YB.wSBIQS4ywikPa40KD5O8qyW6fBZnqQWIdAMZ8THnkY2h8wx.Xq','2021-07-20 14:41:26'),('asmitharshetty+666@gmail.com','$2y$10$uUGE5in2GAdwA6q5qIh6veuMyPWOTR9TVt5eiXjQ3SBwaA6zkC6zm','2021-07-20 14:52:50'),('webtechie@gmail.com','$2y$10$h9anWbjRDYp0kppBGYrzjeexMRrZa9qeqHveNI0WC8FGLHRzWeeI.','2021-07-22 09:33:11');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment` (
  `id` int NOT NULL,
  `order_id` int DEFAULT NULL,
  `item_id` int DEFAULT NULL,
  `customer_id` int DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `paid` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `status` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pending_user_emails`
--

DROP TABLE IF EXISTS `pending_user_emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pending_user_emails` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pending_user_emails_user_type_user_id_index` (`user_type`,`user_id`),
  KEY `pending_user_emails_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pending_user_emails`
--

LOCK TABLES `pending_user_emails` WRITE;
/*!40000 ALTER TABLE `pending_user_emails` DISABLE KEYS */;
/*!40000 ALTER TABLE `pending_user_emails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profiles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `fullname` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_job` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gender` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `speciality_strength` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postalcode` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_tech` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `user_education` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `professional_exp` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `teaching_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `profile_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `document_type` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'PAN Card,Aadhar Card,Driving License',
  `document_file_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_org_file_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_status` enum('Verified','Unverified') COLLATE utf8mb4_unicode_ci DEFAULT 'Unverified',
  `status` int NOT NULL DEFAULT '1' COMMENT '1-ACTIVE; 0-INACTIVE',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (30,101,'Sayooj','Sayooj Company','Math Reasoning Teacher','Name','2021-06-01 15:09:17','2021-06-01 15:11:19','Female','1990-03-17','Math Reasoning','Mangalore, India','123456','[{\"subject\":28,\"from_level\":\"2\",\"to_level\":\"3\"},{\"subject\":29,\"from_level\":\"2\",\"to_level\":\"3\"},{\"subject\":30,\"from_level\":\"2\",\"to_level\":\"3\"}]','[{\"institution\":\"Nehru College of Engineering\",\"deg_type\":\"5\",\"deg_name\":\"B.Tech\",\"startdate\":\"2016-05-01\",\"enddate\":\"2018-03-06\",\"association\":\"3\",\"speciality\":\"Math Reasoning\",\"score\":\"88\"}]','[{\"organisation\":\"St.Thomas\",\"designation\":\"Math and aptitude tutor\",\"e_startdate\":\"2018-03-12\",\"e_enddate\":\"2020-06-22\",\"association\":\"1\",\"job_description\":\"My Job is teaching Math and aptitude for students\"}]','[{\"i_charge\":\"Weekly\",\"min_fee\":\"400\",\"max_fee\":\"500\",\"fee_details\":\"does not vary\",\"tot_exp\":\"2\",\"online_exp\":\"1\",\"travel\":\"yes\",\"travel_kms\":\"12\",\"avail_online_teach\":\"Yes\",\"digital_pen\":\"Yes\",\"help_homework_assig\":\"Yes\",\"currently_emp\":\"No\",\"oppor_interest\":\"full_time\"}]','[{\"profile_des\":\"I am following the type of teaching style which is mostly adaptable in real life and will help you to easily understand. I am also focusing on makeing students prepare to compete in many comparative exams so that it can be very useful for them.\",\"one_acc\":\"yes\"}]',NULL,NULL,NULL,'Unverified',1),(37,139,NULL,NULL,NULL,NULL,'2021-07-15 14:55:01','2021-07-15 14:55:01',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Unverified',1),(38,141,NULL,NULL,NULL,NULL,'2021-07-16 18:07:39','2021-07-16 18:07:39',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Unverified',1),(39,142,NULL,NULL,NULL,NULL,'2021-07-16 18:09:51','2021-07-16 18:09:51',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Unverified',1),(40,143,NULL,NULL,NULL,NULL,'2021-07-17 13:55:44','2021-07-17 13:55:44',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Unverified',1),(41,150,NULL,NULL,NULL,NULL,'2021-07-20 13:16:34','2021-07-20 13:17:05','Female','2021-07-05','Software',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'PAN Card','1626787025.award2.jpg','award2.jpg','Unverified',1),(42,164,NULL,NULL,NULL,NULL,'2021-07-20 14:55:57','2021-07-20 14:55:57',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Unverified',1),(43,148,'Tp demo','afadasdsa','fsd','Name','2021-07-21 15:26:27','2021-07-21 15:44:01','Male','2021-07-21','dsdf df','dsf',NULL,'[{\"subject\":33,\"from_level\":\"1\",\"to_level\":\"2\"}]','[{\"institution\":\"sdfads df\",\"deg_type\":\"2\",\"deg_name\":\"dfsf\",\"startdate\":\"2021-07-21\",\"enddate\":\"2021-07-21\",\"association\":\"1\",\"speciality\":\"fdf\",\"score\":\"dfdf\"}]',NULL,NULL,NULL,'PAN Card','1626882220.Desktop screensh.png','Desktop screensh.png','Unverified',1),(44,148,'Tp demo','afadasdsa','fsd','Name','2021-07-21 15:41:10','2021-07-21 15:44:01',NULL,NULL,NULL,'dsf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Unverified',1),(45,166,NULL,NULL,NULL,NULL,'2021-07-22 09:40:21','2021-07-22 09:40:21',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Unverified',1),(46,168,NULL,NULL,NULL,NULL,'2021-07-23 17:52:22','2021-07-23 17:52:22',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Unverified',1),(47,169,NULL,NULL,NULL,NULL,'2021-07-23 23:31:40','2021-07-23 23:31:40',NULL,NULL,NULL,NULL,NULL,'[{\"subject\":2,\"from_level\":\"1\",\"to_level\":\"1\"}]',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Unverified',1),(48,171,NULL,NULL,NULL,NULL,'2021-07-24 13:55:51','2021-07-24 13:55:51',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Unverified',1);
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Teacher',NULL,NULL),(2,'Student/Parent',NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
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
  KEY `dept_id` (`dept_id`),
  KEY `issuperuser` (`isadmin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (1,1,3,1,3,1,7,'Web','Admin','000','000','9980487456','--\r\nWebadmin',NULL,NULL,NULL,0,0,0,'2016-05-24 19:07:40','2021-06-22 01:22:39'),(2,1,3,2,3,1,7,'Vivek','Staff','000','000','9980487456','--\r\nstaff',NULL,NULL,NULL,0,0,0,'2016-05-24 19:07:40','2021-06-22 01:22:39'),(8,0,0,1,0,0,0,'test','staff','111-2222-9999','','8877665123','',NULL,NULL,NULL,0,1,1,'2021-07-05 16:23:14','2021-07-05 16:23:14'),(9,2,1,1,0,8,14,'test 1','staff1','111-2222-9999','','8877665123','teststaff1',NULL,NULL,NULL,1,1,1,'2021-07-06 05:34:31','2021-07-06 05:34:31');
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
INSERT INTO `staff_details` VALUES (1,'manju','shri','','','1234567891','111','1234567890',0,'','1988-03-02','mangalore','single',0,'','2016-06-24','BE','','',0,0,'no',1,0,1,0,1,0,3,3,'none','Legal','',''),(2,'geetha','s','','','','','1234567890',0,'','1988-03-02','mangalore','single',0,'','2016-06-23','B com','','',0,0,'yes',0,0,1,0,1,0,7,7,'mine','Legal','',''),(9,'test 1','staff1','','','111-2222-9999','','8877665123',0,NULL,'0000-00-00','','',0,'','0000-00-00','','','',0,0,'Yes',0,1,1,1,1,0,0,0,'none','Letter',NULL,NULL);
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
INSERT INTO `status` VALUES (1,1,'New',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,1,'Pending',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,1,'Overdue',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,1,'Closed',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,4,'Enrolled',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,3,'Qualified',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,6,'Ongoing',1,'2016-06-19 23:15:22','2016-06-19 23:15:22'),(8,6,'Upcoming',1,'2016-06-19 23:15:22','2016-06-19 23:15:22'),(9,6,'Completed',1,'2016-06-19 23:15:22','2016-06-19 23:15:22'),(10,6,'Cancelled',1,'2016-06-19 23:15:22','2016-06-19 23:15:22'),(11,6,'Postponed',1,'2016-06-19 23:15:22','2016-06-19 23:15:22'),(12,3,'Processed',1,'2016-06-19 23:16:55','2016-06-19 23:16:55'),(13,3,'Disqualified',1,'2016-06-19 23:16:55','2016-06-19 23:16:55'),(14,5,'new',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(15,5,'old',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(16,7,'new',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(17,5,'Head-Office',1,'2021-04-21 23:19:39','2021-04-21 23:19:39'),(18,5,'Branch-Office',1,'2021-04-21 23:19:39','2021-04-21 23:19:39'),(19,5,'Franchise',1,'2021-04-21 23:21:02','2021-04-21 23:21:02'),(20,5,'3rd-Party',1,'2021-04-21 23:21:02','2021-04-21 23:21:02');
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
-- Table structure for table `student_posts`
--

DROP TABLE IF EXISTS `student_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student_posts` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `st_location` varchar(200) DEFAULT NULL,
  `st_subjects` varchar(200) DEFAULT NULL,
  `st_requirement` longtext,
  `st_level` varchar(100) DEFAULT NULL,
  `st_i_want` varchar(100) DEFAULT NULL,
  `meeting_options` varchar(200) DEFAULT NULL,
  `km_travel` varchar(200) DEFAULT NULL,
  `st_gender_prfer` varchar(100) DEFAULT NULL,
  `tut_wantd` varchar(100) DEFAULT NULL,
  `i_need_smeone` varchar(100) DEFAULT NULL,
  `st_budget` varchar(200) DEFAULT NULL,
  `ass_due_date` date DEFAULT NULL,
  `status` int DEFAULT '1' COMMENT '1- active, 0-inactive',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_posts`
--

LOCK TABLES `student_posts` WRITE;
/*!40000 ALTER TABLE `student_posts` DISABLE KEYS */;
INSERT INTO `student_posts` VALUES (29,105,'Whitefield, Bengaluru, Karnataka, India','[\"4\"]','I need a tutor who can take classes one on one personally only for some chapters that I require to understand for an upcoming test. Do not want a permanent teacher, the classes would be charged on an hourly basis. Need for chemistry And math, Grade 11','17','Tutoring','[\"Online\"]',NULL,'No Preference','One','Part Time','[\"500\",\"Hour\"]',NULL,1,'2021-06-01 15:40:08','2021-06-01 15:40:08'),(30,107,'Online Maths (CBSE) tutor needed in Maduravoyal','[\"28\"]','I am looking out for Maths tutor for my son who is studying 8th STD ( CBSE ) . his level of understanding the maths is at beginner level, need to push him hard to understand maths. I need a tutor who can able to drive him and understand tricks of Maths.','12','Tutoring','[\"Online\",\"Home\",\"Travel\"]','5','Only female','One','Part Time','[\"300\",\"Hour\"]',NULL,1,'2021-06-01 15:57:14','2021-06-01 15:57:14'),(31,107,'Online C programming tutor required in Whitefield','[\"7\"]','Dear sir, I am looking for a tutor for my son B.Arvind studying in BItS Pilani 1st year mechanical for C programming . Will you be interested in taking this up . He has not learnt computer science in 12th and he studied biology .\r\nI am looking for an online tutor. We need 3-4 hours classes per week in the evenings.','3','Tutoring','[\"Online\"]',NULL,'No Preference','One','Part Time','[\"500\",\"Hour\"]',NULL,1,'2021-06-01 21:13:34','2021-06-01 21:13:34'),(32,109,'Delhi','[\"4\"]','Online Quantitative Aptitude tutor required in Central Delhi. I\'m preparing for AFCAT II and I have some trouble with Mathematics.','3','Tutoring','[\"Online\"]',NULL,'Preferably male','One','Part Time','[\"600\",\"Hour\"]',NULL,1,'2021-06-01 21:17:30','2021-06-01 21:17:30'),(33,109,'E-city, Bengaluru','[\"7\"]','Online Software assignment help tutor required in Electronic City.  This is an individual assignment. Using INNOSLATE, Please perform a functional analysis (decomposition) of \'to manage\' (more specifically, \'Manage a Project\') which should include a very thorough decomposition. You must use INNOSLATE. Ensure you number your functions and go down 3 levels (F0, F1, F1.1)','23','Tutoring','[\"Online\"]',NULL,'Preferably male','One','Part Time','[\"250\",\"Hour\"]',NULL,1,'2021-06-01 21:19:06','2021-06-01 21:19:06'),(34,108,'Test','[\"1\",\"4\"]','test maths','1','Tutoring','[\"Online\"]',NULL,'Only male','More than one','Part Time','[\"200\",\"Hour\"]',NULL,1,'2021-06-02 15:07:46','2021-06-02 15:07:46'),(35,109,'Bengaluru','[\"1\",\"2\"]','I\'m looking for 10th Botony Homework','14','Assignment','[\"Online\",\"Home\",\"Travel\"]','5','Only male','One','Part Time','[\"2\",\"Hour\"]',NULL,1,'2021-06-08 14:44:13','2021-06-08 14:44:13'),(36,115,'Chrompet','[\"4\"]','This is test message from srividhya checking the post requirement','11','Tutoring','[\"Online\"]',NULL,'No Preference','One','Part Time','[\"240\",\"Hour\"]',NULL,1,'2021-06-22 09:49:21','2021-06-22 09:49:21'),(37,127,'Chrompet','[\"31\"]','Looking for new experts in AWS','2','Tutoring','[\"Online\"]',NULL,'No Preference','One','Part Time','[\"240\",\"Hour\"]',NULL,1,'2021-07-10 14:47:37','2021-07-10 14:47:37'),(38,137,'surathkal','[\"13\"]','Looking for a tutor','2','Tutoring','[\"Online\",\"Home\",\"Travel\"]','2','No Preference','One','Part Time','[\"400\",\"Hour\"]',NULL,1,'2021-07-12 13:44:03','2021-07-12 13:44:03');
/*!40000 ALTER TABLE `student_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students` (
  `student_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL COMMENT 'from users table',
  `name` varchar(500) NOT NULL,
  `course_id` int NOT NULL,
  `fees_payable` float(10,2) NOT NULL,
  `fees_paid` float(10,2) NOT NULL,
  `active` tinyint NOT NULL DEFAULT '0',
  `added_by` int NOT NULL,
  `course_completed` int NOT NULL DEFAULT '0',
  `completion_date` timestamp NULL DEFAULT NULL,
  `student_did` varchar(200) NOT NULL,
  `certificate_id` varchar(200) NOT NULL,
  `student_enrollment_id` varchar(200) NOT NULL,
  `is_deleted` enum('Yes','No') DEFAULT 'No',
  `created` timestamp NOT NULL,
  `updated` timestamp NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `batch_id` int DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,129,'krish',3,10000.00,100.00,1,1,0,NULL,'','','Batch003/Redhat-Linux/1','No','2021-07-11 10:30:44','0000-00-00 00:00:00',NULL,3),(2,131,'NIRMAL',1,15000.00,1000.00,1,1,0,NULL,'','','Batch001/AWS/2','No','2021-07-11 11:08:38','0000-00-00 00:00:00',NULL,1),(3,132,'NARASIMHAN',1,15000.00,2500.00,1,1,0,NULL,'','','Batch001/AWS/3','No','2021-07-11 11:09:25','0000-00-00 00:00:00',NULL,1),(4,133,'RANJITH',3,15000.00,10000.00,1,1,1,'2021-07-08 00:00:00','JtzXJV5HArMQXdrJ99CktzU2yUMg06U2','uSf2kDa5gBuHJOuQxZjmtnjAbXbhSj1B','Batch002/Blockchain-Foundation/4','No','2021-07-11 11:10:20','2021-07-11 11:19:52',NULL,2),(5,134,'Arun',3,8000.00,500.00,1,1,0,NULL,'','','Batch001/BC101/5','No','2021-07-11 11:52:54','2021-07-20 13:20:10',NULL,1),(6,135,'Vivek Raghunathan',3,8000.00,240.00,1,1,1,'2021-07-05 00:00:00','JZtQjyTicTYaGrEM4rgJTRIgwPnu7JCM','3xKQ9ek0tmmk5mJKfHY9gX1M5RnRLpV7','Batch001/BC101/6','No','2021-07-11 11:53:48','2021-07-21 13:48:21',NULL,1),(7,135,'Vivek Raghunathan',3,1575.00,1575.00,1,1,1,'2021-07-23 00:00:00','asfast4tasdfasd3435242','157E8F3C4022FBC2C54BD60F6F3D6C1C05A5D0118707DCF2B7B1A752D267CB52','Batch002/BC101/7','No','2021-07-23 11:30:11','2021-07-23 11:32:39',NULL,2),(8,170,'',3,2000.00,1200.00,1,1,1,'2021-07-21 00:00:00','JtzXJV5HArMQXdrJ99CktzU2yUMg06U2','342343243243243','Batch001/BC101/8','No','2021-07-24 13:03:14','2021-07-24 13:14:04',NULL,1),(9,172,'Tamil',3,1575.00,1000.00,1,1,1,'2021-07-24 00:00:00','DID:BC100:12345','Z6iNNSu1sfoxoZ6iNNSu1sfoxoZ6iNNSu1sfoxoZ6iNNSu1sfoxoZ6iNNSu1sfoxo','Batch002/BC101/9','No','2021-07-24 14:50:04','2021-07-24 14:51:27',NULL,2),(10,176,'sangeetha',3,20000.00,12000.00,1,1,0,NULL,'','','Batch003/BC101/10','No','2021-07-29 18:38:12','0000-00-00 00:00:00',NULL,3),(11,174,'Asmitha Shetty',3,8000.00,2500.00,1,1,0,NULL,'','','Batch001/BC101/11','No','2021-07-30 11:29:34','0000-00-00 00:00:00',NULL,1);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_levels`
--

DROP TABLE IF EXISTS `sub_levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sub_levels` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `level_name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_levels`
--

LOCK TABLES `sub_levels` WRITE;
/*!40000 ALTER TABLE `sub_levels` DISABLE KEYS */;
INSERT INTO `sub_levels` VALUES (1,'Beginner',NULL,NULL),(2,'Intermediate',NULL,NULL),(3,'Expert',NULL,NULL);
/*!40000 ALTER TABLE `sub_levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subject` (
  `id` int NOT NULL,
  `subject_name` varchar(50) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject`
--

LOCK TABLES `subject` WRITE;
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subjects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,'Physics',NULL,NULL),(2,'Chemistry',NULL,NULL),(3,'Thermodynamics',NULL,NULL),(4,'Maths',NULL,NULL),(5,'Zoology',NULL,NULL),(6,'Electronics','2021-05-05 03:25:44','2021-05-05 03:25:44'),(7,'Computer Science','2021-05-05 03:27:56','2021-05-05 03:27:56'),(8,'computer network','2021-05-05 03:29:47','2021-05-05 03:29:47'),(9,'Java','2021-05-05 03:30:29','2021-05-05 03:30:29'),(12,'Geospace','2021-05-05 03:47:08','2021-05-05 03:47:08'),(13,'Mysql and PHP','2021-05-05 05:42:59','2021-05-05 05:42:59'),(14,'oracle cloud','2021-05-05 23:38:28','2021-05-05 23:38:28'),(15,'sample subject','2021-05-06 06:09:22','2021-05-06 06:09:22'),(24,'sub','2021-05-19 05:50:44','2021-05-19 05:50:44'),(25,'Thermodyna',NULL,NULL),(26,'Piano','2021-06-01 14:24:20','2021-06-01 14:24:20'),(27,'Piano keyboard','2021-06-01 14:24:51','2021-06-01 14:24:51'),(28,'English','2021-06-01 15:11:57','2021-06-01 15:11:57'),(29,'Math Reasoning','2021-06-01 15:12:14','2021-06-01 15:12:14'),(30,'Finance and management Accounting','2021-06-01 15:12:44','2021-06-01 15:12:44'),(31,'aws','2021-06-02 19:41:22','2021-06-02 19:41:22'),(32,'Mysql and PHP c++','2021-07-12 13:35:22','2021-07-12 13:35:22'),(33,'fsdfsdf','2021-07-21 15:28:45','2021-07-21 15:28:45');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_payments`
--

DROP TABLE IF EXISTS `tbl_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_payments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `student_id` int NOT NULL,
  `course_id` int NOT NULL,
  `date` datetime NOT NULL,
  `amount_paid` float NOT NULL,
  `note` text NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_payments`
--

LOCK TABLES `tbl_payments` WRITE;
/*!40000 ALTER TABLE `tbl_payments` DISABLE KEYS */;
INSERT INTO `tbl_payments` VALUES (1,129,1,3,'2021-07-11 10:30:44',100,'','2021-07-11 10:30:44'),(2,131,2,1,'2021-07-11 11:08:38',1000,'','2021-07-11 11:08:38'),(3,132,3,1,'2021-07-11 11:09:25',2500,'','2021-07-11 11:09:25'),(4,133,4,4,'2021-07-11 11:10:20',3000,'','2021-07-11 11:10:20'),(5,133,4,4,'2021-07-08 00:00:00',7000,'Paid INR 7000','2021-07-11 11:18:01'),(6,134,5,3,'2021-07-11 11:52:54',500,'','2021-07-11 11:52:54'),(27,135,6,3,'2021-07-20 00:00:00',120,'Notes','2021-07-20 17:46:51'),(28,135,6,3,'2021-07-20 00:00:00',120,'Notes','2021-07-20 17:46:51'),(29,135,7,3,'2021-07-23 11:30:11',500,'','2021-07-23 11:30:11'),(30,135,7,3,'2021-07-23 00:00:00',500,'Wired Transfer','2021-07-23 11:30:57'),(31,135,7,3,'2021-07-22 00:00:00',575,'Done','2021-07-23 11:31:52'),(32,170,8,3,'2021-07-24 13:03:14',1200,'','2021-07-24 13:03:14'),(33,172,9,3,'2021-07-24 14:50:04',1000,'','2021-07-24 14:50:04'),(34,176,10,3,'2021-07-29 18:38:12',12000,'','2021-07-29 18:38:12'),(35,174,11,3,'2021-07-30 11:29:34',2500,'','2021-07-30 11:29:34');
/*!40000 ALTER TABLE `tbl_payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_templates`
--

DROP TABLE IF EXISTS `tbl_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_templates` (
  `template_id` int NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `template_data` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_dts` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`template_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_templates`
--

LOCK TABLES `tbl_templates` WRITE;
/*!40000 ALTER TABLE `tbl_templates` DISABLE KEYS */;
INSERT INTO `tbl_templates` VALUES (1,'Student Certificate','<!DOCTYPE>\r\n<html>\r\n<head>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\r\n<title>Certificates</title>\r\n<style>\r\n@font-face {\r\n    font-family: Arial;\r\n    src: url(certificate_files/arial.ttf);\r\n}\r\n\r\n@font-face {\r\n    font-family: certificate;\r\n    src: url(certificate_files/certificate.ttf);\r\n}\r\n@font-face {\r\n    font-family: Old English Text MT;\r\n    src: url(certificate_files/OTT.ttf);\r\n}	\r\n\r\n</style>\r\n</head>\r\n\r\n<body>\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:10px solid #28829F; border-radius:10px;\">\r\n  <tr>\r\n    <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:6px solid #ffffff;\">\r\n  <tr>\r\n    <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:2px solid #28829F; \">\r\n  <tr>\r\n    <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"printimg\">\r\n      <tr>\r\n        <td align=\"center\" valign=\"middle\" style=\"padding:8px;\"><img src=\"$image_url/logo.jpg\" width=\"257\"></td>\r\n      </tr>\r\n      <tr>\r\n        <td align=\"center\" valign=\"middle\" style=\"font-family:Old English Text MT;\"><h1>$course Course Certification</h1></td>\r\n      </tr>\r\n      <tr>\r\n        <td align=\"center\" valign=\"middle\" style=\"\"  height=\"200\"><table width=\"80%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n          <tr>\r\n            <td align=\"center\" style=\"border-bottom:0px solid #333333; font-family:Arial; font-size:22px; color: #333333; padding-top:10px;\"><p>Be it known that the faculty of Talentegra  Technology Services hereby confirms that</p></td>\r\n          </tr>\r\n          <tr>\r\n            <td height=\"60\" align=\"center\" style=\"font-family: Old English Text MT; font-size:36px; color:#28829F; border-bottom:  1px dashed #28829F;\">$student_name</td>\r\n          </tr>\r\n          <tr>\r\n            <td align=\"center\" style=\"border-bottom:0px solid #333333; font-family:Arial; font-size:22px; color: #333333; padding-top:10px;\"><p>has successfully completed the $course  Certification Program, and the comprehensive examination required to receive  certification as an $course Course Completion Program.</p></td>\r\n          </tr>\r\n        </table></td>\r\n      </tr>\r\n      <tr>\r\n        <td align=\"center\" valign=\"middle\" style=\"height:90px;\">&nbsp;</td>\r\n      </tr>\r\n      <tr>\r\n        <td align=\"center\" valign=\"middle\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n			<tr>\r\n               <td align=\"center\" valign=\"middle\" style=\"border-bottom:0px solid #333333; font-family:Arial; font-size:16px; color: #333333; padding-top:10px;\">Enrollment ID - $student_enrollment_id <br> Certificate ID - $certificate_id </td>\r\n               <td align=\"center\" valign=\"middle\" style=\"border-bottom:0px solid #333333; font-family:Arial; font-size:16px; color: #333333; padding-top:10px;\">&nbsp;</td>\r\n               <td align=\"center\" valign=\"middle\" style=\"border-bottom:0px solid #333333; font-family:Arial; font-size:16px; color: #333333; padding-top:10px;\">Student Did - $student_did</td>\r\n             </tr>\r\n             <tr>\r\n               <td width=\"32%\" align=\"center\" valign=\"middle\" style=\"border-bottom:0px solid #333333; font-family:Arial; font-size:16px; color: #333333; padding-top:10px;\"><table width=\"80%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                 <tbody>\r\n                   <tr>\r\n                     <th scope=\"col\" style=\"border-bottom:  1px dashed #000000;\">$completion_date</th>\r\n                   </tr>\r\n                   <tr>\r\n                     <td align=\"center\" style=\"font-family:Arial\">Date</td>\r\n                   </tr>\r\n                 </tbody>\r\n               </table></td>\r\n               <td width=\"43%\" align=\"center\" valign=\"middle\" style=\"border-bottom:0px solid #333333; font-family:Arial; font-size:16px; color: #333333; padding-top:10px;\"><img src=\"$image_url/medal.png\" width=\"112\" height=\"231\"></td>\r\n               <td width=\"25%\" align=\"center\" valign=\"middle\" style=\"border-bottom:0px solid #333333; font-family:Arial; font-size:16px; color: #333333; padding-top:10px;\"><table width=\"80%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                 <tbody>\r\n                   <tr>\r\n                     <th scope=\"col\" style=\"border-bottom:  1px dashed #000000;\"><img src=\"$image_url/certificate_signature.png\" width=\"257\"></th>\r\n                   </tr>\r\n                   <tr>\r\n                     <td align=\"center\" style=\"font-family:Arial;\">Head Training - Talentegra</td>\r\n                   </tr>\r\n                 </tbody>\r\n               </table></td>\r\n             </tr>\r\n             <tr>\r\n               <td align=\"center\" valign=\"middle\" style=\"border-bottom:0px solid #333333; font-family:Arial; font-size:16px; color: #333333; padding-top:10px;\">&nbsp;</td>\r\n               <td align=\"center\" valign=\"middle\" style=\"border-bottom:0px solid #333333; font-family:Arial; font-size:16px; color: #333333; padding-top:10px;\">&nbsp;</td>\r\n               <td align=\"center\" valign=\"middle\" style=\"border-bottom:0px solid #333333; font-family:Arial; font-size:16px; color: #333333; padding-top:10px;\">&nbsp;</td>\r\n             </tr>\r\n             </table></td>\r\n      </tr>\r\n      \r\n     \r\n    </table></td>\r\n  </tr>\r\n</table>\r\n</td>\r\n  </tr>\r\n</table>\r\n</td>\r\n  </tr>\r\n</table>\r\n</body>\r\n</html>','Active','2021-06-29 12:59:21');
/*!40000 ALTER TABLE `tbl_templates` ENABLE KEYS */;
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
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `org_id` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `facebook_id` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `default_email_id` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_mobile_no` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `iam_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_verified` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_img` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `only_acc` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temp_email` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  `last_login` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `last_seen` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=177 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (100,0,'Ashwin Joy','sangeetha@acrasolutions.com','2021-06-01 14:18:25',NULL,NULL,'','0','0','Teacher','Individual Teacher','$2y$10$gHp8b3VMiH.M2B.U6aZPFe8oENA6/4yKgu6WIceyHvR49SgO2zPUK',NULL,'+91 9943106345',NULL,NULL,'yes',NULL,0,NULL,'2021-06-01 14:17:53','2021-06-08 14:48:14','2021-06-08 14:48:14'),(101,0,'Sayooj','sangeetha@acrainfotech.com','2021-06-01 15:08:49',NULL,NULL,'','0','0','Teacher','Tutoring Company','$2y$10$dJRLPiMrbRJ7RPwoWvKRg.f.P7iTsYfq7I96hXz0e/c4eSCmbxKsG',NULL,'+91 9932567943',NULL,NULL,'yes',NULL,0,NULL,'2021-06-01 15:08:28','2021-06-01 19:07:32','2021-06-01 19:07:32'),(110,0,'AGR','agrmax@digitalq.co.in','2021-06-02 19:43:28',NULL,NULL,'','0','0','Teacher','Individual Teacher','$2y$10$gFVoilyYt1fKQ2lfRd0pcOgemf0JU8U1lGFubRjKrmHz9fDU8/d9C',NULL,'1234567',NULL,NULL,'yes',NULL,0,NULL,'2021-06-02 15:10:14','2021-06-02 19:44:19','2021-06-02 19:44:19'),(115,NULL,'Srivdhya Vivek','srividhyav@talentegra.com','2021-06-22 09:47:51','ff12345we','gg12345we',NULL,NULL,NULL,'Student/Parent','Student/Parent','$2y$10$vu5bDuXCPbPVTea3pSCrAOJY4hstfBkrjOFfMhiELPVuix3YDvQry',NULL,NULL,NULL,NULL,'yes',NULL,NULL,NULL,'2021-06-22 09:47:01','2021-06-22 09:50:10','2021-06-22 09:50:10'),(168,NULL,'Vivek Raghunathan','vivekra@talentegra.com','2021-07-23 17:52:22','ff12345we','107510009126610576181',NULL,NULL,NULL,'Teacher',NULL,'$2y$10$VUyYOipsdisMUFrnm9SGTufNbgDkprOoSb.UXP6NxDI3O.zf1BUK2',NULL,'9901100221',NULL,'1627062933.intro-blockchain.png','yes',NULL,NULL,NULL,'2021-07-23 17:52:22','2021-07-23 17:57:22','2021-07-23 17:57:22'),(169,NULL,'Tippanna Pawar','tippannajustkbc@gmail.com','2021-07-23 23:31:40','ff12345we','114518784157947467810',NULL,NULL,NULL,'Teacher',NULL,'$2y$10$fnY38yxCPM0lPzfECpk7FuLMxjnTSVUO5I9xRoUkXPy0rUIAInDO2',NULL,NULL,NULL,NULL,'yes',NULL,NULL,NULL,'2021-07-23 23:31:40','2021-07-24 13:54:36','2021-07-24 13:54:36'),(170,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,'Student/Parent',NULL,'',NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2021-07-24 13:03:14','2021-07-24 13:03:14',NULL),(171,NULL,'Tippanna Pawar','tmpawar66@gmail.com','2021-07-24 13:55:51','ff12345we','114107686993918787551',NULL,NULL,NULL,'Student/Parent','Student/Parent','$2y$10$.w9VB25J6XVAmpVq1seV9.83as2msTiDquK0sJ5qytIK922Uayb6G',NULL,'9591911351',NULL,NULL,'yes',NULL,NULL,NULL,'2021-07-24 13:55:51','2021-07-24 14:42:44','2021-07-24 14:42:44'),(172,NULL,'Tamil','tamil001@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'Student/Parent',NULL,'',NULL,'0932311211',NULL,NULL,NULL,NULL,NULL,NULL,'2021-07-24 14:50:04','2021-07-24 14:50:04',NULL),(173,NULL,'Asmitha Shetty','asmitharshetty+666@gmail.com','2021-07-25 06:23:18','ff12345we','gg12345we',NULL,NULL,NULL,'Teacher',NULL,'$2y$10$0v1Qsl50K4BSJZLuUnPBieAoOPf0HxZhN6cKx6yuEWrfgJ8gsNg1.',NULL,NULL,'yes',NULL,'yes',NULL,NULL,NULL,'2021-07-25 06:22:43','2021-07-25 06:28:34','2021-07-25 06:28:34'),(174,NULL,'Asmitha Shetty','asmitharshetty+777@gmail.com','2021-07-25 06:29:11','ff12345we','gg12345we',NULL,NULL,NULL,'Student/Parent','Student/Parent','$2y$10$vfEoUZ1aIzr0GS2dirL7I.5jMSNLLP73AY009CndD0ChaUMr6cDoW',NULL,NULL,'yes',NULL,'yes',NULL,NULL,NULL,'2021-07-25 06:29:01','2021-07-25 06:30:12','2021-07-25 06:30:12'),(176,NULL,'sangeetha','sangeetha.shetty965@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'Student/Parent',NULL,'',NULL,'6364746282',NULL,NULL,NULL,NULL,NULL,NULL,'2021-07-29 18:38:12','2021-07-29 18:38:12',NULL);
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

-- Dump completed on 2021-07-30 16:36:54
