-- MySQL dump 10.13  Distrib 5.7.9, for linux-glibc2.5 (x86_64)
--
-- Host: localhost    Database: uady
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.13-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `practicas_profesionales`
--

DROP TABLE IF EXISTS `practicas_profesionales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `practicas_profesionales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresas_id` int(11) DEFAULT NULL,
  `despacho_id` int(11) DEFAULT NULL,
  `representante` varchar(255) DEFAULT NULL,
  `tipo_practica_id` int(11) DEFAULT NULL,
  `registroCP` varchar(255) DEFAULT NULL,
  `practica_inicio` date DEFAULT NULL,
  `practica_fin` date DEFAULT NULL,
  `apoyo_economico` int(11) NOT NULL,
  `constancia` varchar(45) DEFAULT NULL,
  `info` text,
  `Alumnos_id` int(11) DEFAULT NULL,
  `estatus_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_practicas_profesionales_tipo_practica1_idx` (`tipo_practica_id`),
  CONSTRAINT `fk_practicas_profesionales_tipo_practica1` FOREIGN KEY (`tipo_practica_id`) REFERENCES `tipo_practica` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `practicas_profesionales`
--

LOCK TABLES `practicas_profesionales` WRITE;
/*!40000 ALTER TABLE `practicas_profesionales` DISABLE KEYS */;
INSERT INTO `practicas_profesionales` VALUES (2,0,2,'juanito perez',2,'3453','2017-03-21','2017-09-26',0,NULL,'',1,1),(3,1,0,'Pepe pecas',1,'','2017-03-27','2017-03-27',0,NULL,'',1,1),(5,0,2,'jose perez',2,'3453','2017-03-28','2017-03-28',1,NULL,'ninguna',5,1),(6,1,0,'joselo',1,'','2017-03-28','2017-03-28',1,NULL,'',4,3),(7,0,2,'Pepe pecas',2,'3453','2017-03-28','2017-03-28',1,NULL,'',4,1);
/*!40000 ALTER TABLE `practicas_profesionales` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-28  1:57:33
