-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: broodjesbar
-- ------------------------------------------------------
-- Server version	8.0.22

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
-- Table structure for table `broodjes`
--

DROP TABLE IF EXISTS `broodjes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `broodjes` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Naam` varchar(50) NOT NULL,
  `Omschrijving` varchar(500) NOT NULL,
  `Prijs` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `broodjes`
--

LOCK TABLES `broodjes` WRITE;
/*!40000 ALTER TABLE `broodjes` DISABLE KEYS */;
INSERT INTO `broodjes` VALUES (1,'Kaas','Broodje met jonge kaas',1.90),(2,'Ham','Broodje met natuurham',1.90),(3,'Kaas en ham','Broodje met kaas en ham',2.10),(4,'Fitness kip','kip natuur, yoghurtdressing, perzik, tuinkers, tomaat en komkommer',3.50),(5,'Broodje Sombrero','kip natuur, andalousesaus, rode paprika, maïs, sla, komkommer, tomaat, ei en ui ',3.70),(6,'Broodje americain-tartaar','americain, tartaarsaus, ui, komkommer, ei en tuinkers ',3.50),(7,'Broodje Indian kip','kip natuur, ananas, tuinkers, komkommer en curry dressing',4.00),(8,'Grieks broodje','feta, tuinkers, komkommer, tomaat en olijventapenade',3.90),(9,'Tonijntino','tonijn pikant, ui, augurk, martinosaus en (tabasco)',2.60),(10,'Wrap exotisch','kip natuur, cocktailsaus, sla, tomaat, komkommer, ei en ananas',3.70),(11,'Wrap kip/spek','Kip natuur, spek, BBQ saus, sla, tomaat en komkommer',4.00);
/*!40000 ALTER TABLE `broodjes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-17 14:05:01
