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
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `giro_id` int(11) NOT NULL DEFAULT '1',
  `calle` varchar(255) DEFAULT NULL,
  `num_inter` varchar(255) DEFAULT NULL,
  `num_exter` varchar(255) DEFAULT NULL,
  `cruzamientos` varchar(255) DEFAULT NULL,
  `colonia_id` varchar(255) DEFAULT NULL,
  `cp` varchar(255) DEFAULT NULL,
  `clasificacion_empresa_id` int(11) NOT NULL DEFAULT '1',
  `nombre_comercial` varchar(255) DEFAULT NULL,
  `nombre_razon_social` varchar(255) DEFAULT NULL,
  `entidades_id` int(11) NOT NULL DEFAULT '31',
  `sector_id` int(11) NOT NULL DEFAULT '1',
  `subsector_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`,`giro_id`,`clasificacion_empresa_id`,`entidades_id`,`sector_id`,`subsector_id`),
  KEY `fk_empresas_giro1_idx` (`giro_id`),
  KEY `fk_empresas_entidades1_idx` (`entidades_id`),
  KEY `fk_empresas_clasificacion_empresa1_idx` (`clasificacion_empresa_id`),
  KEY `fk_empresas_sector1_idx` (`sector_id`),
  KEY `fk_empresas_subsector1_idx` (`subsector_id`),
  KEY `giro_id` (`giro_id`),
  CONSTRAINT `fk_empresas_clasificacion_empresa1` FOREIGN KEY (`clasificacion_empresa_id`) REFERENCES `clasificacion_empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresas_entidades1` FOREIGN KEY (`entidades_id`) REFERENCES `entidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresas_giro1` FOREIGN KEY (`giro_id`) REFERENCES `giro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresas_sector1` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresas_subsector1` FOREIGN KEY (`subsector_id`) REFERENCES `subsector` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` VALUES (1,1,'87','500','281','57 y 54','3','97000',2,'Mayuquita','Mayuquita SA de CV',1,1,1),(2,1,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,31,1,1),(3,1,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,31,1,1),(4,1,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,31,1,1),(5,1,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,31,1,1),(6,1,NULL,NULL,NULL,NULL,NULL,NULL,1,'modal bitacora',NULL,31,1,1),(7,1,NULL,NULL,NULL,NULL,NULL,NULL,1,'Modal Practica',NULL,31,1,1);
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-28  1:55:18
