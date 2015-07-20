-- MySQL dump 10.13  Distrib 5.5.43, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: sigai
-- ------------------------------------------------------
-- Server version	5.5.43-0ubuntu0.14.04.1

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
-- Table structure for table `alunos`
--

DROP TABLE IF EXISTS `alunos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alunos` (
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  CONSTRAINT `alunos_id_foreign` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alunos`
--

LOCK TABLES `alunos` WRITE;
/*!40000 ALTER TABLE `alunos` DISABLE KEYS */;
INSERT INTO `alunos` VALUES (1,'2015-07-20 18:45:27','2015-07-20 18:45:27'),(2,'2015-07-20 18:45:27','2015-07-20 18:45:27'),(3,'2015-07-20 18:45:28','2015-07-20 18:45:28'),(4,'2015-07-20 18:45:28','2015-07-20 18:45:28'),(5,'2015-07-20 18:45:28','2015-07-20 18:45:28'),(6,'2015-07-20 18:45:28','2015-07-20 18:45:28'),(7,'2015-07-20 18:45:29','2015-07-20 18:45:29'),(8,'2015-07-20 18:45:29','2015-07-20 18:45:29'),(9,'2015-07-20 18:45:29','2015-07-20 18:45:29'),(10,'2015-07-20 18:45:29','2015-07-20 18:45:29'),(11,'2015-07-20 18:45:29','2015-07-20 18:45:29'),(12,'2015-07-20 18:45:30','2015-07-20 18:45:30'),(13,'2015-07-20 18:45:30','2015-07-20 18:45:30'),(14,'2015-07-20 18:45:30','2015-07-20 18:45:30'),(15,'2015-07-20 18:45:30','2015-07-20 18:45:30'),(16,'2015-07-20 18:45:30','2015-07-20 18:45:30'),(17,'2015-07-20 18:45:30','2015-07-20 18:45:30'),(18,'2015-07-20 18:45:31','2015-07-20 18:45:31'),(19,'2015-07-20 18:45:31','2015-07-20 18:45:31'),(20,'2015-07-20 18:45:31','2015-07-20 18:45:31'),(21,'2015-07-20 18:45:31','2015-07-20 18:45:31'),(22,'2015-07-20 18:45:31','2015-07-20 18:45:31'),(23,'2015-07-20 18:45:32','2015-07-20 18:45:32'),(24,'2015-07-20 18:45:32','2015-07-20 18:45:32'),(25,'2015-07-20 18:45:32','2015-07-20 18:45:32'),(26,'2015-07-20 18:45:32','2015-07-20 18:45:32'),(27,'2015-07-20 18:45:32','2015-07-20 18:45:32'),(28,'2015-07-20 18:45:33','2015-07-20 18:45:33'),(29,'2015-07-20 18:45:33','2015-07-20 18:45:33'),(30,'2015-07-20 18:45:33','2015-07-20 18:45:33'),(31,'2015-07-20 18:45:33','2015-07-20 18:45:33'),(32,'2015-07-20 18:45:34','2015-07-20 18:45:34'),(33,'2015-07-20 18:45:34','2015-07-20 18:45:34'),(34,'2015-07-20 18:45:34','2015-07-20 18:45:34'),(35,'2015-07-20 18:45:34','2015-07-20 18:45:34'),(36,'2015-07-20 18:45:34','2015-07-20 18:45:34'),(37,'2015-07-20 18:45:34','2015-07-20 18:45:34'),(38,'2015-07-20 18:45:35','2015-07-20 18:45:35'),(39,'2015-07-20 18:45:35','2015-07-20 18:45:35'),(40,'2015-07-20 18:45:35','2015-07-20 18:45:35'),(41,'2015-07-20 18:45:35','2015-07-20 18:45:35'),(42,'2015-07-20 18:45:35','2015-07-20 18:45:35'),(43,'2015-07-20 18:45:35','2015-07-20 18:45:35'),(44,'2015-07-20 18:45:36','2015-07-20 18:45:36'),(45,'2015-07-20 18:45:36','2015-07-20 18:45:36'),(46,'2015-07-20 18:45:36','2015-07-20 18:45:36'),(47,'2015-07-20 18:45:37','2015-07-20 18:45:37'),(48,'2015-07-20 18:45:37','2015-07-20 18:45:37');
/*!40000 ALTER TABLE `alunos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alunos_turmas`
--

DROP TABLE IF EXISTS `alunos_turmas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alunos_turmas` (
  `aluno_id` int(10) unsigned NOT NULL,
  `turma_id` int(10) unsigned NOT NULL,
  `status` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `curso_origem_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`aluno_id`,`turma_id`),
  KEY `alunos_turmas_turma_id_foreign` (`turma_id`),
  KEY `alunos_turmas_curso_origem_id_foreign` (`curso_origem_id`),
  CONSTRAINT `alunos_turmas_aluno_id_foreign` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`),
  CONSTRAINT `alunos_turmas_curso_origem_id_foreign` FOREIGN KEY (`curso_origem_id`) REFERENCES `cursos` (`id`),
  CONSTRAINT `alunos_turmas_turma_id_foreign` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alunos_turmas`
--

LOCK TABLES `alunos_turmas` WRITE;
/*!40000 ALTER TABLE `alunos_turmas` DISABLE KEYS */;
INSERT INTO `alunos_turmas` VALUES (1,2,'cancelado','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(1,4,'cancelado','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(1,5,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(2,2,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(2,5,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(3,2,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(3,3,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(3,4,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(3,5,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(3,6,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(4,2,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',3),(5,2,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(5,4,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(5,5,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(6,2,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(6,4,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(6,5,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(6,6,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(7,2,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',3),(8,2,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',5),(9,2,'cancelado','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(9,4,'cancelado','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(9,5,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(10,2,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(10,4,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(10,5,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(11,2,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(11,5,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(11,6,'cancelado','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(12,2,'cancelado','0000-00-00 00:00:00','0000-00-00 00:00:00',3),(13,2,'cancelado','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(14,2,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(14,4,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(14,5,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(15,2,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(15,5,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(15,6,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(16,2,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(16,3,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(16,4,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(16,5,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(17,2,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(17,5,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(18,2,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(18,4,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(18,5,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(18,6,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(19,2,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(19,4,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(19,5,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(19,6,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(20,2,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',3),(20,3,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',3),(21,2,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',3),(22,2,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(22,4,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(22,5,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(22,6,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(23,2,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',3),(24,2,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',3),(25,2,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(25,4,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(25,5,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(25,6,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(26,2,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(26,5,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(26,6,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(27,5,'cancelado','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(28,5,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(29,5,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(30,5,'cancelado','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(31,5,'cancelado','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(32,5,'cancelado','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(33,5,'cancelado','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(34,5,'cancelado','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(35,5,'cancelado','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(36,5,'cancelado','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(37,5,'cancelado','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(38,5,'cancelado','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(39,5,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(40,3,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(41,3,'cancelado','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(42,3,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',3),(43,1,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(43,3,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(44,1,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(44,3,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(45,1,'cancelado','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(45,3,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2),(46,3,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',5),(47,3,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',5),(48,3,'normal','0000-00-00 00:00:00','0000-00-00 00:00:00',2);
/*!40000 ALTER TABLE `alunos_turmas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ambientes`
--

DROP TABLE IF EXISTS `ambientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ambientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_ambiente_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `ambientes_tipo_ambiente_id_foreign` (`tipo_ambiente_id`),
  CONSTRAINT `ambientes_tipo_ambiente_id_foreign` FOREIGN KEY (`tipo_ambiente_id`) REFERENCES `tipos_ambiente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ambientes`
--

LOCK TABLES `ambientes` WRITE;
/*!40000 ALTER TABLE `ambientes` DISABLE KEYS */;
INSERT INTO `ambientes` VALUES (1,'sala 101',1,'2015-07-20 18:45:12','2015-07-20 18:45:12'),(2,'sala 102',1,'2015-07-20 18:45:12','2015-07-20 18:45:12'),(3,'sala 103',1,'2015-07-20 18:45:12','2015-07-20 18:45:12'),(4,'sala 104',1,'2015-07-20 18:45:14','2015-07-20 18:45:14'),(5,'sala 105',1,'2015-07-20 18:45:14','2015-07-20 18:45:14'),(6,'sala 201',1,'2015-07-20 18:45:14','2015-07-20 18:45:14'),(7,'sala 202',1,'2015-07-20 18:45:14','2015-07-20 18:45:14'),(8,'sala 203',1,'2015-07-20 18:45:15','2015-07-20 18:45:15'),(9,'sala 204',1,'2015-07-20 18:45:15','2015-07-20 18:45:15'),(10,'sala 205',1,'2015-07-20 18:45:15','2015-07-20 18:45:15'),(11,'lab 01',2,'2015-07-20 18:45:15','2015-07-20 18:45:15'),(12,'lab 02',2,'2015-07-20 18:45:15','2015-07-20 18:45:15'),(13,'lab 03',2,'2015-07-20 18:45:15','2015-07-20 18:45:15'),(14,'lab 04',2,'2015-07-20 18:45:15','2015-07-20 18:45:15'),(15,'lab 05',2,'2015-07-20 18:45:15','2015-07-20 18:45:15'),(16,'lab 06',2,'2015-07-20 18:45:15','2015-07-20 18:45:15');
/*!40000 ALTER TABLE `ambientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aulas`
--

DROP TABLE IF EXISTS `aulas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aulas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `status` int(11) DEFAULT NULL,
  `conteudo` text COLLATE utf8_unicode_ci,
  `turma_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ensino_a_distancia` tinyint(1) NOT NULL DEFAULT '0',
  `obs` text COLLATE utf8_unicode_ci,
  `ambiente_id` int(10) unsigned DEFAULT NULL,
  `horario_inicio` time NOT NULL,
  `horario_fim` time NOT NULL,
  `professor_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aulas_turma_id_foreign` (`turma_id`),
  KEY `aulas_data_index` (`data`),
  KEY `aulas_ambiente_id_foreign` (`ambiente_id`),
  KEY `aulas_professor_id_foreign` (`professor_id`),
  CONSTRAINT `aulas_ambiente_id_foreign` FOREIGN KEY (`ambiente_id`) REFERENCES `ambientes` (`id`),
  CONSTRAINT `aulas_professor_id_foreign` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`),
  CONSTRAINT `aulas_turma_id_foreign` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aulas`
--

LOCK TABLES `aulas` WRITE;
/*!40000 ALTER TABLE `aulas` DISABLE KEYS */;
INSERT INTO `aulas` VALUES (1,'2014-08-05',0,'Introdução a disciplina. Plano de ensino. Situação do tema banco de dados dentro da computação. Arquivos convencionais, problemas; conceitos de banco de dados (BD) e SGBD: noções gerais de um sistema de BD; arquitetura de SGBD; gerência de bancos funções básicas de SGBD; usuários de BD;',2,'2015-07-20 18:45:46','2015-07-20 18:45:46',0,'',NULL,'18:30:00','22:50:00',49),(2,'2014-08-12',0,'Abstração de dados.  Modelo conceitual; modelo lógico; modelo físico. Introdução a modelagem conceitual.  modelo de dados entidade relacionamento (ER)',2,'2015-07-20 18:45:46','2015-07-20 18:45:46',0,'',NULL,'18:30:00','22:50:00',49),(3,'2014-08-19',0,'Modelagem conceitual: objetivos; propriedades de um modelo conceitual; notações. Estudo de caso.',2,'2015-07-20 18:45:46','2015-07-20 18:45:46',0,'NULL',NULL,'18:30:00','22:50:00',49),(4,'2014-08-26',0,'modelagem conceitual (mecanismos de abstração; classificação/instanciação; generalização/especialização;). Exercícios de fixação. Descrição do trabalho G1.',2,'2015-07-20 18:45:46','2015-07-20 18:45:46',0,'NULL',NULL,'18:30:00','22:50:00',49),(5,'2014-09-02',0,'Modelagem conceitual (restrições de integridade, construtores, notação diagramática, semelhanças e diferenças entre modelos conceituais).',2,'2015-07-20 18:45:46','2015-07-20 18:45:46',0,'NULL',NULL,'18:30:00','22:50:00',49),(6,'2014-09-09',0,'Projeto de banco de dados (transformação de diagramas  conceituais para modelos de banco de dados I ). Exercícios práticos.',2,'2015-07-20 18:45:47','2015-07-20 18:45:47',0,'NULL',NULL,'18:30:00','22:50:00',49),(7,'2014-09-16',0,'Projeto de banco de dados (transformação de diagramas conceituais para modelos de bancos de dados II). Exercícios práticos.',2,'2015-07-20 18:45:47','2015-07-20 18:45:47',0,'NULL',NULL,'18:30:00','22:50:00',49),(8,'2014-09-23',0,'Apresentação dos trabalhos. Revisão do conteúdo para a avaliação. Exercícios práticos.',2,'2015-07-20 18:45:47','2015-07-20 18:45:47',0,'NULL',NULL,'18:30:00','22:50:00',49),(9,'2014-09-30',0,'Avaliação teórica/prática grau 1.',2,'2015-07-20 18:45:47','2015-07-20 18:45:47',0,'NULL',NULL,'18:30:00','22:50:00',49),(10,'2014-10-07',0,'Entrega das notas e correção da prova. Descrição do trabalho.Introdução à normalização de modelos.',2,'2015-07-20 18:45:47','2015-07-20 18:45:47',0,'NULL',NULL,'18:30:00','22:50:00',49),(11,'2014-10-14',0,'Estudo de caso da normalização de modelos. Linguagem de definição de dados (DDL). Linguagem de modelagem de banco de dados.  Exercícios práticos.',2,'2015-07-20 18:45:47','2015-07-20 18:45:47',0,'NULL',NULL,'18:30:00','22:50:00',49),(12,'2014-10-21',0,'Manipulação de dados (DML). Andamento do trabalho.',2,'2015-07-20 18:45:47','2015-07-20 18:45:47',0,'NULL',NULL,'18:30:00','22:50:00',49),(13,'2014-10-28',0,'Restrições de integridade. Exercícios práticos.',2,'2015-07-20 18:45:47','2015-07-20 18:45:47',0,'NULL',NULL,'18:30:00','22:50:00',49),(14,'2014-11-04',0,'',2,'2015-07-20 18:45:47','2015-07-20 18:45:47',0,'NULL',NULL,'18:30:00','22:50:00',49),(15,'2014-11-11',0,'',2,'2015-07-20 18:45:47','2015-07-20 18:45:47',0,'NULL',NULL,'18:30:00','22:50:00',49),(16,'2014-11-18',0,'',2,'2015-07-20 18:45:47','2015-07-20 18:45:47',0,'NULL',NULL,'18:30:00','22:50:00',49),(17,'2014-11-25',0,'',2,'2015-07-20 18:45:47','2015-07-20 18:45:47',0,'NULL',NULL,'18:30:00','22:50:00',49),(18,'2014-12-02',0,'',2,'2015-07-20 18:45:47','2015-07-20 18:45:47',0,'NULL',NULL,'18:30:00','22:50:00',49),(19,'2014-12-09',0,'',2,'2015-07-20 18:45:47','2015-07-20 18:45:47',0,'NULL',NULL,'18:30:00','22:50:00',49),(20,'2014-12-16',0,'',2,'2015-07-20 18:45:47','2015-07-20 18:45:47',0,'NULL',NULL,'18:30:00','22:50:00',49),(21,'2014-02-20',0,'Introdução aos SO\'s: Apresentação da disciplina: conteúdo, metodologia de ensino, critérios de avaliação, cronograma, material apoio (livros).',5,'2015-07-20 18:45:47','2015-07-20 18:45:47',0,'NULL',NULL,'18:30:00','22:50:00',49),(22,'2014-02-27',0,'Introdução aos Sistemas Operacionais: Estudo das definições de sistema operacional (SO), objetivos, visões.',5,'2015-07-20 18:45:47','2015-07-20 18:45:47',0,'NULL',NULL,'18:30:00','22:50:00',49),(23,'2014-03-06',0,'Gerência de entrada e Saída: controle e gerenciamento realizado pelo sistema operacional: Multiprogramação.',5,'2015-07-20 18:45:47','2015-07-20 18:45:47',0,'NULL',NULL,'18:30:00','22:50:00',49),(24,'2014-03-13',0,'Estudo dos tipos de sistemas operacionais: monoprogramáveis, multiprogramaveis e sistemas com múltiplos processadores.',5,'2015-07-20 18:45:47','2015-07-20 18:45:47',0,'NULL',NULL,'18:30:00','22:50:00',49),(25,'2014-03-20',0,'Conceitos de Deadlock, prevenção e tratamento em Sistemas Operacionais.',5,'2015-07-20 18:45:48','2015-07-20 18:45:48',0,'NULL',NULL,'18:30:00','22:50:00',49),(26,'2014-03-27',0,'Estudo das estruturas de um sistema operacional: sistemas monolíticos, sistemas em camadas e cliente/servidor.',5,'2015-07-20 18:45:48','2015-07-20 18:45:48',0,'NULL',NULL,'18:30:00','22:50:00',49),(27,'2014-04-03',0,'Estudo dos sistemas multiprogramáveis: definição, conceitos, gerência de filas, tipos (cooperativa e preemptiva), proteção.',5,'2015-07-20 18:45:48','2015-07-20 18:45:48',0,'NULL',NULL,'18:30:00','22:50:00',49),(28,'2014-04-10',0,'Estudo de processos: modelos de processos, estados de um process, mudanças de estados entre processos, subprocessos e threads.',5,'2015-07-20 18:45:48','2015-07-20 18:45:48',0,'NULL',NULL,'18:30:00','22:50:00',49),(29,'2014-04-17',0,'Especificação de tarefas e prioridades.',5,'2015-07-20 18:45:48','2015-07-20 18:45:48',0,'NULL',NULL,'18:30:00','22:50:00',49),(30,'2014-04-23',0,'Introdução a escalonadores',5,'2015-07-20 18:45:48','2015-07-20 18:45:48',0,'NULL',NULL,'18:30:00','22:50:00',49),(31,'2014-04-24',0,'Atividades extraclasse: exercícios e trabalhos individuais.',5,'2015-07-20 18:45:48','2015-07-20 18:45:48',0,'NULL',NULL,'18:30:00','22:50:00',49),(32,'2014-05-08',0,'Correção de exercício, revisão de conteúdo.',5,'2015-07-20 18:45:48','2015-07-20 18:45:48',0,'NULL',NULL,'18:30:00','22:50:00',49),(33,'2014-05-15',0,'Avaliação de grau 1 (G1).',5,'2015-07-20 18:45:48','2015-07-20 18:45:48',0,'NULL',NULL,'18:30:00','22:50:00',49),(34,'2014-05-22',0,'Analisar os resultados da avaliação G1. Gerência de processos: introdução, descritor de processo, controle de processos, processos de sistema, escalonamento de processos',5,'2015-07-20 18:45:48','2015-07-20 18:45:48',0,'NULL',NULL,'18:30:00','22:50:00',49),(35,'2014-05-29',0,'Gerência de Memória: introdução, endereços lógicos e fisicos, formas de alicação, swapping.',5,'2015-07-20 18:45:48','2015-07-20 18:45:48',0,'NULL',NULL,'18:30:00','22:50:00',49),(36,'2014-06-05',0,'Memória virtual: funcionamento da paginação por demanda, substituição de páginas, algoritmos de substituição de páginas, alocação de quadros, trashing.',5,'2015-07-20 18:45:48','2015-07-20 18:45:48',0,'NULL',NULL,'18:30:00','22:50:00',49),(37,'2014-06-12',0,'Programação concorrente: definição, motivação, especificação de paralelismo, problema da seção crítica, semáforos, mensagens, visão geral e comparação, paralisação (deadlock).',5,'2015-07-20 18:45:49','2015-07-20 18:45:49',0,'NULL',NULL,'18:30:00','22:50:00',49),(38,'2014-06-26',0,'Elaboração de exercícios e correção.',5,'2015-07-20 18:45:49','2015-07-20 18:45:49',0,'NULL',NULL,'18:30:00','22:50:00',49),(39,'2014-07-03',0,'Sistema de Arquivos: Introdução, nomes de arquivos, comandos, árvore de diretórios do SO, discos (particionamento e formatação), acesso a arquivos, atributos, controle e gerenciamento.',5,'2015-07-20 18:45:49','2015-07-20 18:45:49',0,'NULL',NULL,'18:30:00','22:50:00',49),(40,'2014-07-04',0,'Apresentação de trabalhos (estudo de caso) de sistemas operacionais.',5,'2015-07-20 18:45:49','2015-07-20 18:45:49',0,'NULL',NULL,'18:30:00','22:50:00',49),(41,'2014-07-10',0,'Avaliação Grau 2. Divulgação de resultados parciais, revisão e prova de substituição.',5,'2015-07-20 18:45:49','2015-07-20 18:45:49',0,'NULL',NULL,'18:30:00','22:50:00',49),(42,'2015-02-20',0,'Introdução a disciplina. Plano de ensino. Situação do tema banco de dados dentro da computação. Arquivos convencionais, problemas; conceitos de banco de dados (BD) e SGBD: noções gerais de um sistema de BD;',3,'2015-07-20 18:45:49','2015-07-20 18:45:49',0,'NULL',NULL,'18:30:00','22:50:00',50),(43,'2015-02-27',0,'Arquitetura de SGBD; gerência de bancos funções básicas de SGBD; usuários de BD; Abstração de dados. modelo lógico; modelo físico.  Introdução a modelagem conceitual.  modelo de dados entidade relacionamento (ER). Processo de projeto e Implementação de BD.',3,'2015-07-20 18:45:49','2015-07-20 18:45:49',0,'',NULL,'18:30:00','22:50:00',50),(44,'2015-03-06',0,'Modelos de dados; Modelagem conceitual: objetivos; propriedades de um modelo conceitual; notações. Modelo entidade relacionamento (ER); Agregação/Desagregação.  Estudo de caso.',3,'2015-07-20 18:45:49','2015-07-20 18:45:49',0,'NULL',NULL,'18:30:00','22:50:00',50),(45,'2015-03-13',0,'Modelo de dados orientado a objetos (OO) , Modelagem conceitual (mecanismos de abstração; classificação/instanciação; generalização/especialização;).  Exercícios de fixação.',3,'2015-07-20 18:45:49','2015-07-20 18:45:49',0,'NULL',NULL,'18:30:00','22:50:00',50),(46,'2015-03-20',0,'Restrições de integridade, Construtores, Notação diagramática, Semelhanças e diferenças entre modelos conceituais).',3,'2015-07-20 18:45:49','2015-07-20 18:45:49',0,'NULL',NULL,'18:30:00','22:50:00',50),(47,'2015-03-27',0,'Projeto de banco de dados (transformação de diagramas  conceituais para modelos de banco de dados I ). Exercícios práticos.',3,'2015-07-20 18:45:49','2015-07-20 18:45:49',0,'NULL',NULL,'18:30:00','22:50:00',50),(48,'2015-04-10',0,'Estudo de caso da normalização de modelos.',3,'2015-07-20 18:45:49','2015-07-20 18:45:49',0,'',NULL,'18:30:00','22:50:00',50),(49,'2015-04-17',0,'Revisão do conteúdo para a avaliação. Exercícios práticos.',3,'2015-07-20 18:45:49','2015-07-20 18:45:49',0,'',NULL,'18:30:00','22:50:00',50),(50,'2015-04-20',0,'Atividade Extraclasse:\".Exercícios de normalização e revisão para prova\"',3,'2015-07-20 18:45:49','2015-07-20 18:45:49',0,'',NULL,'18:30:00','22:50:00',50),(51,'2015-04-24',0,'Avaliação teórica/prática grau 1.',3,'2015-07-20 18:45:49','2015-07-20 18:45:49',0,'NULL',NULL,'18:30:00','22:50:00',50),(52,'2015-05-08',0,'Entrega das notas e correção da prova. Descrição do trabalho. Linguagem de definição de dados (DDL). Linguagem de modelagem de banco de dados.',3,'2015-07-20 18:45:49','2015-07-20 18:45:49',0,'NULL',NULL,'18:30:00','22:50:00',50),(53,'2015-05-15',0,'Linguagem de manipulação de dados (DML)  interativa.',3,'2015-07-20 18:45:49','2015-07-20 18:45:49',0,'NULL',NULL,'18:30:00','22:50:00',50),(54,'2015-05-22',0,'Restrições de integridade. Exercícios práticos.',3,'2015-07-20 18:45:49','2015-07-20 18:45:49',0,'NULL',NULL,'18:30:00','22:50:00',50),(55,'2015-05-29',0,'Linguagem de manipulação de dados embutida, restrições de integridade. Exercícios práticos.',3,'2015-07-20 18:45:49','2015-07-20 18:45:49',0,'NULL',NULL,'18:30:00','22:50:00',50),(56,'2015-06-05',0,'Especificação de gatilhos, asserções e procedimentos. Exercícios práticos.',3,'2015-07-20 18:45:49','2015-07-20 18:45:49',0,'NULL',NULL,'18:30:00','22:50:00',50),(57,'2015-06-12',0,'Álgebra relacional.',3,'2015-07-20 18:45:49','2015-07-20 18:45:49',0,'NULL',NULL,'18:30:00','22:50:00',50),(58,'2015-06-19',0,'Revisão para prova G2.',3,'2015-07-20 18:45:49','2015-07-20 18:45:49',0,'NULL',NULL,'18:30:00','22:50:00',50),(59,'2015-06-26',0,'Avaliação teórica/prática grau 2.',3,'2015-07-20 18:45:49','2015-07-20 18:45:49',0,'NULL',NULL,'18:30:00','22:50:00',50),(60,'2015-07-03',0,'Entrega das notas e correção da prova.  Revisão para prova de substituição.',3,'2015-07-20 18:45:49','2015-07-20 18:45:49',0,'NULL',NULL,'18:30:00','22:50:00',50),(61,'2015-07-10',0,'Prova de substituição. Entrega das notas finais e correção da prova.',3,'2015-07-20 18:45:49','2015-07-20 18:45:49',0,'NULL',NULL,'18:30:00','22:50:00',50),(62,'2015-02-25',0,'Apresentação da disciplina. Introdução às técnicas de programação.',6,'2015-07-20 18:45:49','2015-07-20 18:45:49',0,'NULL',NULL,'18:30:00','22:50:00',50),(63,'2015-03-04',0,'Orientação para projeto de classes',6,'2015-07-20 18:45:49','2015-07-20 18:45:49',0,'NULL',NULL,'18:30:00','22:50:00',50),(64,'2015-03-11',0,'Programação por contratos ? parte 1: especificações de interface precisas e verificáveis dos componentes de desenvolvimento de software. Exercícios práticos.',6,'2015-07-20 18:45:49','2015-07-20 18:45:49',0,'NULL',NULL,'18:30:00','22:50:00',50),(65,'2015-03-18',0,'Programação por contratos ? parte 2: especificações de interface precisas e verificáveis dos componentes de desenvolvimento de software. Exercícios práticos.',6,'2015-07-20 18:45:49','2015-07-20 18:45:49',0,'NULL',NULL,'18:30:00','22:50:00',50),(66,'2015-03-25',0,'Introdução ao Teste do Software. Exercícios práticos.',6,'2015-07-20 18:45:50','2015-07-20 18:45:50',0,'',NULL,'18:30:00','22:50:00',50),(67,'2015-04-01',0,'Teste de software: validação de comportamento e unidades de trabalho. Descrição do  trabalho a ser desenvolvido.',6,'2015-07-20 18:45:50','2015-07-20 18:45:50',0,'',NULL,'18:30:00','22:50:00',50),(68,'2015-04-08',0,'Ferramentas de apoio ao teste unitário (Junit). Exercícios práticos.',6,'2015-07-20 18:45:50','2015-07-20 18:45:50',0,'',NULL,'18:30:00','22:50:00',50),(69,'2015-04-15',0,'Apresentação do trabalho e realização de um simulado referente ao G1.',6,'2015-07-20 18:45:50','2015-07-20 18:45:50',0,'',NULL,'18:30:00','22:50:00',50),(70,'2015-04-22',0,'Avaliação G1',6,'2015-07-20 18:45:50','2015-07-20 18:45:50',0,'',NULL,'18:30:00','22:50:00',50),(71,'2015-04-29',0,'Entrega das avaliações G1. Discussão das questões da prova. Programação concorrente: modelagem, threads, sincronização. Exercícios práticos.',6,'2015-07-20 18:45:50','2015-07-20 18:45:50',0,'NULL',NULL,'18:30:00','22:50:00',50),(72,'2015-05-06',0,'Aula prática ? programação concorrente.',6,'2015-07-20 18:45:50','2015-07-20 18:45:50',0,'NULL',NULL,'18:30:00','22:50:00',50),(73,'2015-05-13',0,'Programação concorrente: vivacidade e métodos protegidos. Descrição do trabalho G2.',6,'2015-07-20 18:45:50','2015-07-20 18:45:50',0,'NULL',NULL,'18:30:00','22:50:00',50),(74,'2015-05-20',0,'Programação concorrente: objeto condição e propriedades de concorrência.',6,'2015-07-20 18:45:50','2015-07-20 18:45:50',0,'NULL',NULL,'18:30:00','22:50:00',50),(75,'2015-05-27',0,'Arquitetura de Software: componentes do sistema e suas propriedades externas e seus relacionamentos com outros softwares.',6,'2015-07-20 18:45:50','2015-07-20 18:45:50',0,'NULL',NULL,'18:30:00','22:50:00',50),(76,'2015-06-03',0,'Modelo de desenvolvimento em camadas: domínios.',6,'2015-07-20 18:45:50','2015-07-20 18:45:50',0,'NULL',NULL,'18:30:00','22:50:00',50),(77,'2015-06-10',0,'Modelo de desenvolvimento em camadas: persistência e apresentação.',6,'2015-07-20 18:45:50','2015-07-20 18:45:50',0,'NULL',NULL,'18:30:00','22:50:00',50),(78,'2015-06-17',0,'Apresentação do trabalho e revisão para a avaliação  referente ao G2',6,'2015-07-20 18:45:50','2015-07-20 18:45:50',0,'NULL',NULL,'18:30:00','22:50:00',50),(79,'2015-06-24',0,'Avaliação G2',6,'2015-07-20 18:45:50','2015-07-20 18:45:50',0,'NULL',NULL,'18:30:00','22:50:00',50),(80,'2015-07-01',0,'Entrega das notas G2. Revisão para prova de substituição.',6,'2015-07-20 18:45:50','2015-07-20 18:45:50',0,'NULL',NULL,'18:30:00','22:50:00',50),(81,'2015-07-08',0,'Aplicação da prova de substituição G1 ou G2. Entrega das notas.',6,'2015-07-20 18:45:50','2015-07-20 18:45:50',0,'NULL',NULL,'18:30:00','22:50:00',50),(82,'2015-02-19',0,'Plano de aula. Arquitetura de computadores. Conceitos de hardware e software. Sistemas numéricos de representação de dados e conversões. Exercícios',1,'2015-07-20 18:45:51','2015-07-20 18:45:51',0,'NULL',NULL,'18:30:00','22:50:00',50),(83,'2015-02-26',0,'Álgebra booleana. Contextualização do curso de ADS. Disciplinas que compõem a ciência da computação. Exercícios',1,'2015-07-20 18:45:51','2015-07-20 18:45:51',0,'NULL',NULL,'18:30:00','22:50:00',50),(84,'2015-03-05',0,'Conceitos e definições dos Sistemas de informação. Tipos de sistemas de informação. Exemplos de sistemas de informação.',1,'2015-07-20 18:45:51','2015-07-20 18:45:51',0,'NULL',NULL,'18:30:00','22:50:00',50),(85,'2015-03-12',0,'Introdução  à Abordagem sistêmica I.',1,'2015-07-20 18:45:51','2015-07-20 18:45:51',0,'NULL',NULL,'18:30:00','22:50:00',50),(86,'2015-03-19',0,'Abordagem sistêmica  I - Aula Prática.',1,'2015-07-20 18:45:51','2015-07-20 18:45:51',0,'NULL',NULL,'18:30:00','22:50:00',50),(87,'2015-03-26',0,'Conceitos da Abordagem sistêmica II',1,'2015-07-20 18:45:51','2015-07-20 18:45:51',0,'NULL',NULL,'18:30:00','22:50:00',50),(88,'2015-04-02',0,'Conceitos da Abordagem sistêmica II ? Aula Prática',1,'2015-07-20 18:45:51','2015-07-20 18:45:51',0,'NULL',NULL,'18:30:00','22:50:00',50),(89,'2015-04-09',0,'Revisão dos conteúdos (Exercícios).',1,'2015-07-20 18:45:51','2015-07-20 18:45:51',0,'NULL',NULL,'18:30:00','22:50:00',50),(90,'2015-04-16',0,'Avaliação Teórica ? G1 ? Individual.',1,'2015-07-20 18:45:51','2015-07-20 18:45:51',0,'NULL',NULL,'18:30:00','22:50:00',50),(91,'2015-04-23',0,'Correção avaliação e divulgação resultados, definição grupos de trabalho.  Estudo da aplicação da tecnologia da informação nas organizações  do papel da modelagem no desenvolvimento de SI.',1,'2015-07-20 18:45:51','2015-07-20 18:45:51',0,'NULL',NULL,'18:30:00','22:50:00',50),(92,'2015-04-30',0,'Sistemas de computação. Estudo de caso. Exercícios',1,'2015-07-20 18:45:51','2015-07-20 18:45:51',0,'NULL',NULL,'18:30:00','22:50:00',50),(93,'2015-05-07',0,'Sistema de gerenciamento de transação.',1,'2015-07-20 18:45:51','2015-07-20 18:45:51',0,'NULL',NULL,'18:30:00','22:50:00',50),(94,'2015-05-14',0,'Sistema de gerenciamento de transação -  Aula prática',1,'2015-07-20 18:45:51','2015-07-20 18:45:51',0,'NULL',NULL,'18:30:00','22:50:00',50),(95,'2015-05-21',0,'Sistemas de informação (Planejamento estratégico de TI), aplicação da tecnologia da informação.',1,'2015-07-20 18:45:51','2015-07-20 18:45:51',0,'NULL',NULL,'18:30:00','22:50:00',50),(96,'2015-05-28',0,'Gestão de sistemas de informação',1,'2015-07-20 18:45:51','2015-07-20 18:45:51',0,'NULL',NULL,'18:30:00','22:50:00',50),(97,'2015-06-11',0,'Modelagem no desenvolvimento de sistemas de informação.',1,'2015-07-20 18:45:51','2015-07-20 18:45:51',0,'NULL',NULL,'18:30:00','22:50:00',50),(98,'2015-06-18',0,'Seminários de apresentações. Exercícios de revisão',1,'2015-07-20 18:45:51','2015-07-20 18:45:51',0,'NULL',NULL,'18:30:00','22:50:00',50),(99,'2015-06-25',0,'Avaliação Teórica / prática ? G2.',1,'2015-07-20 18:45:51','2015-07-20 18:45:51',0,'NULL',NULL,'18:30:00','22:50:00',50),(100,'2015-07-02',0,'Revisão do conteúdo para a substituição de grau',1,'2015-07-20 18:45:51','2015-07-20 18:45:51',0,'NULL',NULL,'18:30:00','22:50:00',50),(101,'2015-07-09',0,'Divulgação de resultados parciais, substituição de grau e divulgação de resultados finais.',1,'2015-07-20 18:45:51','2015-07-20 18:45:51',0,'NULL',NULL,'18:30:00','22:50:00',50),(102,'2014-08-01',0,'Descrição do plano de ensino. Introdução à disciplina. Plano de ensino. Introdução a linguagem  SQL',4,'2015-07-20 18:45:51','2015-07-20 18:45:51',0,'NULL',NULL,'18:30:00','22:50:00',49),(103,'2014-08-08',0,'Consultas (SQL, linguagem de manipulação de dados). Exercícios de fixação',4,'2015-07-20 18:45:51','2015-07-20 18:45:51',0,'NULL',NULL,'18:30:00','22:50:00',49),(104,'2014-08-15',0,'Consultas (SQL, linguagem de definição de dados). Exercícios de fixação',4,'2015-07-20 18:45:51','2015-07-20 18:45:51',0,'NULL',NULL,'18:30:00','22:50:00',49),(105,'2014-08-22',0,'Consultas Avançadas (introdução a subselects).  Exercícios de fixação. Integração do SQL e com o  JAVA.  Exercícios de fixação',4,'2015-07-20 18:45:51','2015-07-20 18:45:51',0,'NULL',NULL,'18:30:00','22:50:00',49),(106,'2014-08-29',0,'Consultas Avançadas (subselects, group by).  Exercícios de fixação',4,'2015-07-20 18:45:51','2015-07-20 18:45:51',0,'NULL',NULL,'18:30:00','22:50:00',49),(107,'2014-09-05',0,'Triggers e Store. Exercícios de fixação',4,'2015-07-20 18:45:51','2015-07-20 18:45:51',0,'NULL',NULL,'18:30:00','22:50:00',49),(108,'2014-09-12',0,'Procedures. Exercícios de fixação',4,'2015-07-20 18:45:51','2015-07-20 18:45:51',0,'NULL',NULL,'18:30:00','22:50:00',49),(109,'2014-09-19',0,'Revisão para prova G1. Simulado',4,'2015-07-20 18:45:51','2015-07-20 18:45:51',0,'NULL',NULL,'18:30:00','22:50:00',49),(110,'2014-09-26',0,'Avaliação teórica prática referente ao G1',4,'2015-07-20 18:45:51','2015-07-20 18:45:51',0,'NULL',NULL,'18:30:00','22:50:00',49),(111,'2014-10-03',0,'Correção da prova. Cursores',4,'2015-07-20 18:45:52','2015-07-20 18:45:52',0,'NULL',NULL,'18:30:00','22:50:00',49),(112,'2014-10-10',0,'Cursores e Introdução a Transações',4,'2015-07-20 18:45:52','2015-07-20 18:45:52',0,'NULL',NULL,'18:30:00','22:50:00',49),(113,'2014-10-17',0,'Transação  (Recuperação de falhas, concorrência). Andamento do trabalho.',4,'2015-07-20 18:45:52','2015-07-20 18:45:52',0,'NULL',NULL,'18:30:00','22:50:00',49),(114,'2014-10-24',0,'Arquitetura de  Banco de Dados  Distribuídos; Gerência de Objetos;',4,'2015-07-20 18:45:52','2015-07-20 18:45:52',0,'NULL',NULL,'18:30:00','22:50:00',49),(115,'2014-10-31',0,'Semana acadêmica',4,'2015-07-20 18:45:52','2015-07-20 18:45:52',0,'NULL',NULL,'18:30:00','22:50:00',49),(116,'2014-11-07',0,'Otimização de Consultas.',4,'2015-07-20 18:45:52','2015-07-20 18:45:52',0,'NULL',NULL,'18:30:00','22:50:00',49),(117,'2014-11-14',0,'Introdução a  Data Warehouse  e Bussiness  Intelligence (Aplicações emergentes de banco de dados.)',4,'2015-07-20 18:45:52','2015-07-20 18:45:52',0,'NULL',NULL,'18:30:00','22:50:00',49),(118,'2014-11-21',0,'Apresentação do trabalho e revisão para prova G2',4,'2015-07-20 18:45:52','2015-07-20 18:45:52',0,'NULL',NULL,'18:30:00','22:50:00',49),(119,'2014-11-28',0,'Prova G2',4,'2015-07-20 18:45:52','2015-07-20 18:45:52',0,'NULL',NULL,'18:30:00','22:50:00',49),(120,'2014-12-05',0,'Revisão do conteúdo para substituição',4,'2015-07-20 18:45:52','2015-07-20 18:45:52',0,'NULL',NULL,'18:30:00','22:50:00',49),(121,'2014-12-12',0,'Prova de substituição',4,'2015-07-20 18:45:52','2015-07-20 18:45:52',0,'NULL',NULL,'18:30:00','22:50:00',49);
/*!40000 ALTER TABLE `aulas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chamadas`
--

DROP TABLE IF EXISTS `chamadas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chamadas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aluno_id` int(10) unsigned NOT NULL,
  `aula_id` int(10) unsigned NOT NULL,
  `p1` tinyint(1) NOT NULL,
  `p2` tinyint(1) NOT NULL,
  `p3` tinyint(1) NOT NULL,
  `p4` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `chamadas_aluno_id_foreign` (`aluno_id`),
  KEY `chamadas_aula_id_foreign` (`aula_id`),
  CONSTRAINT `chamadas_aluno_id_foreign` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`),
  CONSTRAINT `chamadas_aula_id_foreign` FOREIGN KEY (`aula_id`) REFERENCES `aulas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1001 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chamadas`
--

LOCK TABLES `chamadas` WRITE;
/*!40000 ALTER TABLE `chamadas` DISABLE KEYS */;
INSERT INTO `chamadas` VALUES (1,1,21,1,1,1,1,'2015-07-20 18:45:52','2015-07-20 18:45:52'),(2,2,21,1,1,1,1,'2015-07-20 18:45:52','2015-07-20 18:45:52'),(3,27,21,1,1,1,1,'2015-07-20 18:45:52','2015-07-20 18:45:52'),(4,3,21,1,1,1,1,'2015-07-20 18:45:52','2015-07-20 18:45:52'),(5,5,21,1,1,1,1,'2015-07-20 18:45:52','2015-07-20 18:45:52'),(6,28,21,1,1,1,1,'2015-07-20 18:45:52','2015-07-20 18:45:52'),(7,6,21,1,1,1,1,'2015-07-20 18:45:52','2015-07-20 18:45:52'),(8,29,21,1,1,0,0,'2015-07-20 18:45:52','2015-07-20 18:45:52'),(9,30,21,1,1,1,0,'2015-07-20 18:45:52','2015-07-20 18:45:52'),(10,9,21,1,1,1,1,'2015-07-20 18:45:52','2015-07-20 18:45:52'),(11,31,21,1,1,1,1,'2015-07-20 18:45:52','2015-07-20 18:45:52'),(12,10,21,1,1,1,1,'2015-07-20 18:45:52','2015-07-20 18:45:52'),(13,11,21,1,1,1,1,'2015-07-20 18:45:52','2015-07-20 18:45:52'),(14,14,21,1,1,1,1,'2015-07-20 18:45:52','2015-07-20 18:45:52'),(15,32,21,1,1,1,1,'2015-07-20 18:45:52','2015-07-20 18:45:52'),(16,33,21,1,1,1,1,'2015-07-20 18:45:52','2015-07-20 18:45:52'),(17,34,21,1,1,1,0,'2015-07-20 18:45:52','2015-07-20 18:45:52'),(18,15,21,1,1,1,1,'2015-07-20 18:45:52','2015-07-20 18:45:52'),(19,35,21,0,0,0,0,'2015-07-20 18:45:53','2015-07-20 18:45:53'),(20,16,21,0,0,0,0,'2015-07-20 18:45:53','2015-07-20 18:45:53'),(21,36,21,1,1,1,1,'2015-07-20 18:45:53','2015-07-20 18:45:53'),(22,17,21,1,1,1,1,'2015-07-20 18:45:53','2015-07-20 18:45:53'),(23,37,21,1,1,1,1,'2015-07-20 18:45:53','2015-07-20 18:45:53'),(24,38,21,1,1,1,0,'2015-07-20 18:45:53','2015-07-20 18:45:53'),(25,18,21,1,1,1,1,'2015-07-20 18:45:53','2015-07-20 18:45:53'),(26,19,21,1,1,1,1,'2015-07-20 18:45:53','2015-07-20 18:45:53'),(27,39,21,1,1,1,1,'2015-07-20 18:45:53','2015-07-20 18:45:53'),(28,22,21,1,1,1,1,'2015-07-20 18:45:53','2015-07-20 18:45:53'),(29,25,21,1,1,1,1,'2015-07-20 18:45:53','2015-07-20 18:45:53'),(30,26,21,1,1,1,1,'2015-07-20 18:45:53','2015-07-20 18:45:53'),(31,1,23,1,1,1,1,'2015-07-20 18:45:53','2015-07-20 18:45:53'),(32,2,23,1,1,1,1,'2015-07-20 18:45:53','2015-07-20 18:45:53'),(33,27,23,1,1,1,1,'2015-07-20 18:45:53','2015-07-20 18:45:53'),(34,3,23,1,1,1,1,'2015-07-20 18:45:53','2015-07-20 18:45:53'),(35,5,23,0,1,1,1,'2015-07-20 18:45:53','2015-07-20 18:45:53'),(36,28,23,1,1,1,1,'2015-07-20 18:45:53','2015-07-20 18:45:53'),(37,6,23,1,1,1,1,'2015-07-20 18:45:53','2015-07-20 18:45:53'),(38,29,23,0,0,0,0,'2015-07-20 18:45:53','2015-07-20 18:45:53'),(39,30,23,1,1,1,1,'2015-07-20 18:45:53','2015-07-20 18:45:53'),(40,9,23,1,1,1,1,'2015-07-20 18:45:53','2015-07-20 18:45:53'),(41,31,23,1,1,1,1,'2015-07-20 18:45:53','2015-07-20 18:45:53'),(42,10,23,1,1,1,1,'2015-07-20 18:45:53','2015-07-20 18:45:53'),(43,11,23,1,1,1,1,'2015-07-20 18:45:54','2015-07-20 18:45:54'),(44,14,23,1,1,1,1,'2015-07-20 18:45:54','2015-07-20 18:45:54'),(45,32,23,0,0,0,0,'2015-07-20 18:45:54','2015-07-20 18:45:54'),(46,33,23,0,0,0,0,'2015-07-20 18:45:54','2015-07-20 18:45:54'),(47,34,23,0,1,1,1,'2015-07-20 18:45:54','2015-07-20 18:45:54'),(48,15,23,1,1,1,1,'2015-07-20 18:45:54','2015-07-20 18:45:54'),(49,35,23,0,0,0,0,'2015-07-20 18:45:54','2015-07-20 18:45:54'),(50,16,23,1,1,1,1,'2015-07-20 18:45:54','2015-07-20 18:45:54'),(51,36,23,1,1,1,1,'2015-07-20 18:45:54','2015-07-20 18:45:54'),(52,17,23,1,1,1,1,'2015-07-20 18:45:54','2015-07-20 18:45:54'),(53,37,23,0,0,0,0,'2015-07-20 18:45:54','2015-07-20 18:45:54'),(54,38,23,0,0,0,0,'2015-07-20 18:45:54','2015-07-20 18:45:54'),(55,18,23,1,1,1,1,'2015-07-20 18:45:54','2015-07-20 18:45:54'),(56,19,23,1,1,1,1,'2015-07-20 18:45:54','2015-07-20 18:45:54'),(57,39,23,0,1,1,1,'2015-07-20 18:45:54','2015-07-20 18:45:54'),(58,22,23,1,1,1,1,'2015-07-20 18:45:54','2015-07-20 18:45:54'),(59,25,23,1,1,1,1,'2015-07-20 18:45:54','2015-07-20 18:45:54'),(60,26,23,1,1,1,1,'2015-07-20 18:45:54','2015-07-20 18:45:54'),(61,1,24,1,1,1,1,'2015-07-20 18:45:54','2015-07-20 18:45:54'),(62,2,24,0,0,0,0,'2015-07-20 18:45:54','2015-07-20 18:45:54'),(63,27,24,1,1,1,1,'2015-07-20 18:45:54','2015-07-20 18:45:54'),(64,3,24,1,1,1,1,'2015-07-20 18:45:54','2015-07-20 18:45:54'),(65,5,24,1,1,1,1,'2015-07-20 18:45:55','2015-07-20 18:45:55'),(66,28,24,1,1,1,1,'2015-07-20 18:45:55','2015-07-20 18:45:55'),(67,6,24,1,1,1,1,'2015-07-20 18:45:55','2015-07-20 18:45:55'),(68,29,24,0,0,0,0,'2015-07-20 18:45:55','2015-07-20 18:45:55'),(69,30,24,1,1,1,1,'2015-07-20 18:45:55','2015-07-20 18:45:55'),(70,9,24,0,1,1,1,'2015-07-20 18:45:55','2015-07-20 18:45:55'),(71,31,24,1,1,1,1,'2015-07-20 18:45:55','2015-07-20 18:45:55'),(72,10,24,1,1,1,1,'2015-07-20 18:45:55','2015-07-20 18:45:55'),(73,11,24,1,1,1,1,'2015-07-20 18:45:55','2015-07-20 18:45:55'),(74,14,24,1,1,1,1,'2015-07-20 18:45:55','2015-07-20 18:45:55'),(75,32,24,0,0,0,0,'2015-07-20 18:45:55','2015-07-20 18:45:55'),(76,33,24,1,1,1,1,'2015-07-20 18:45:55','2015-07-20 18:45:55'),(77,34,24,1,1,1,1,'2015-07-20 18:45:55','2015-07-20 18:45:55'),(78,15,24,1,1,0,0,'2015-07-20 18:45:55','2015-07-20 18:45:55'),(79,35,24,0,0,0,0,'2015-07-20 18:45:55','2015-07-20 18:45:55'),(80,16,24,1,1,1,1,'2015-07-20 18:45:55','2015-07-20 18:45:55'),(81,36,24,1,1,1,1,'2015-07-20 18:45:55','2015-07-20 18:45:55'),(82,17,24,1,1,1,1,'2015-07-20 18:45:55','2015-07-20 18:45:55'),(83,37,24,0,0,0,0,'2015-07-20 18:45:55','2015-07-20 18:45:55'),(84,38,24,0,0,0,0,'2015-07-20 18:45:55','2015-07-20 18:45:55'),(85,18,24,1,1,1,1,'2015-07-20 18:45:55','2015-07-20 18:45:55'),(86,19,24,1,1,1,1,'2015-07-20 18:45:55','2015-07-20 18:45:55'),(87,39,24,0,1,1,1,'2015-07-20 18:45:55','2015-07-20 18:45:55'),(88,22,24,1,1,1,1,'2015-07-20 18:45:55','2015-07-20 18:45:55'),(89,25,24,1,1,1,1,'2015-07-20 18:45:55','2015-07-20 18:45:55'),(90,26,24,1,1,1,1,'2015-07-20 18:45:55','2015-07-20 18:45:55'),(91,1,25,1,1,1,1,'2015-07-20 18:45:55','2015-07-20 18:45:55'),(92,2,25,1,1,1,1,'2015-07-20 18:45:55','2015-07-20 18:45:55'),(93,27,25,1,1,1,1,'2015-07-20 18:45:56','2015-07-20 18:45:56'),(94,3,25,1,1,1,1,'2015-07-20 18:45:56','2015-07-20 18:45:56'),(95,5,25,1,1,1,1,'2015-07-20 18:45:56','2015-07-20 18:45:56'),(96,28,25,1,1,1,1,'2015-07-20 18:45:56','2015-07-20 18:45:56'),(97,6,25,1,1,1,1,'2015-07-20 18:45:56','2015-07-20 18:45:56'),(98,29,25,0,0,0,0,'2015-07-20 18:45:56','2015-07-20 18:45:56'),(99,30,25,1,1,1,1,'2015-07-20 18:45:56','2015-07-20 18:45:56'),(100,9,25,1,1,1,1,'2015-07-20 18:45:56','2015-07-20 18:45:56'),(101,31,25,1,1,1,1,'2015-07-20 18:45:56','2015-07-20 18:45:56'),(102,10,25,1,1,1,1,'2015-07-20 18:45:56','2015-07-20 18:45:56'),(103,11,25,1,1,1,1,'2015-07-20 18:45:56','2015-07-20 18:45:56'),(104,14,25,0,0,0,0,'2015-07-20 18:45:56','2015-07-20 18:45:56'),(105,32,25,0,0,0,0,'2015-07-20 18:45:56','2015-07-20 18:45:56'),(106,33,25,1,1,1,1,'2015-07-20 18:45:56','2015-07-20 18:45:56'),(107,34,25,0,0,0,0,'2015-07-20 18:45:56','2015-07-20 18:45:56'),(108,15,25,0,0,0,0,'2015-07-20 18:45:56','2015-07-20 18:45:56'),(109,35,25,0,0,0,0,'2015-07-20 18:45:56','2015-07-20 18:45:56'),(110,16,25,0,0,0,0,'2015-07-20 18:45:56','2015-07-20 18:45:56'),(111,36,25,1,1,1,1,'2015-07-20 18:45:56','2015-07-20 18:45:56'),(112,17,25,1,1,1,1,'2015-07-20 18:45:56','2015-07-20 18:45:56'),(113,37,25,0,0,0,0,'2015-07-20 18:45:56','2015-07-20 18:45:56'),(114,38,25,0,0,0,0,'2015-07-20 18:45:56','2015-07-20 18:45:56'),(115,18,25,1,1,1,1,'2015-07-20 18:45:56','2015-07-20 18:45:56'),(116,19,25,1,1,1,1,'2015-07-20 18:45:56','2015-07-20 18:45:56'),(117,39,25,0,0,1,1,'2015-07-20 18:45:56','2015-07-20 18:45:56'),(118,22,25,1,1,1,1,'2015-07-20 18:45:56','2015-07-20 18:45:56'),(119,25,25,1,1,1,1,'2015-07-20 18:45:57','2015-07-20 18:45:57'),(120,26,25,1,1,1,1,'2015-07-20 18:45:57','2015-07-20 18:45:57'),(121,1,26,1,1,1,1,'2015-07-20 18:45:57','2015-07-20 18:45:57'),(122,2,26,1,1,1,1,'2015-07-20 18:45:57','2015-07-20 18:45:57'),(123,27,26,0,0,0,0,'2015-07-20 18:45:57','2015-07-20 18:45:57'),(124,3,26,1,1,1,1,'2015-07-20 18:45:57','2015-07-20 18:45:57'),(125,5,26,1,1,1,1,'2015-07-20 18:45:57','2015-07-20 18:45:57'),(126,28,26,1,1,1,1,'2015-07-20 18:45:57','2015-07-20 18:45:57'),(127,6,26,1,1,1,1,'2015-07-20 18:45:57','2015-07-20 18:45:57'),(128,29,26,0,0,0,0,'2015-07-20 18:45:57','2015-07-20 18:45:57'),(129,30,26,0,0,0,0,'2015-07-20 18:45:57','2015-07-20 18:45:57'),(130,9,26,1,1,1,1,'2015-07-20 18:45:57','2015-07-20 18:45:57'),(131,31,26,0,0,0,0,'2015-07-20 18:45:57','2015-07-20 18:45:57'),(132,10,26,1,1,1,1,'2015-07-20 18:45:57','2015-07-20 18:45:57'),(133,11,26,1,1,1,1,'2015-07-20 18:45:57','2015-07-20 18:45:57'),(134,14,26,1,1,1,1,'2015-07-20 18:45:57','2015-07-20 18:45:57'),(135,32,26,0,0,0,0,'2015-07-20 18:45:58','2015-07-20 18:45:58'),(136,33,26,0,0,0,0,'2015-07-20 18:45:58','2015-07-20 18:45:58'),(137,34,26,0,0,0,0,'2015-07-20 18:45:58','2015-07-20 18:45:58'),(138,15,26,1,1,1,1,'2015-07-20 18:45:58','2015-07-20 18:45:58'),(139,35,26,0,0,0,0,'2015-07-20 18:45:58','2015-07-20 18:45:58'),(140,16,26,1,1,1,1,'2015-07-20 18:45:58','2015-07-20 18:45:58'),(141,36,26,1,1,1,1,'2015-07-20 18:45:58','2015-07-20 18:45:58'),(142,17,26,1,1,1,1,'2015-07-20 18:45:58','2015-07-20 18:45:58'),(143,37,26,0,0,0,0,'2015-07-20 18:45:58','2015-07-20 18:45:58'),(144,38,26,0,0,0,0,'2015-07-20 18:45:58','2015-07-20 18:45:58'),(145,18,26,1,1,1,1,'2015-07-20 18:45:58','2015-07-20 18:45:58'),(146,19,26,1,1,1,1,'2015-07-20 18:45:58','2015-07-20 18:45:58'),(147,39,26,1,1,1,1,'2015-07-20 18:45:58','2015-07-20 18:45:58'),(148,22,26,1,1,1,1,'2015-07-20 18:45:58','2015-07-20 18:45:58'),(149,25,26,1,1,1,1,'2015-07-20 18:45:58','2015-07-20 18:45:58'),(150,26,26,1,1,1,1,'2015-07-20 18:45:58','2015-07-20 18:45:58'),(151,1,27,1,1,0,0,'2015-07-20 18:45:58','2015-07-20 18:45:58'),(152,2,27,1,1,1,1,'2015-07-20 18:45:58','2015-07-20 18:45:58'),(153,27,27,1,1,0,0,'2015-07-20 18:45:58','2015-07-20 18:45:58'),(154,3,27,1,1,1,1,'2015-07-20 18:45:58','2015-07-20 18:45:58'),(155,5,27,1,1,1,1,'2015-07-20 18:45:58','2015-07-20 18:45:58'),(156,28,27,1,1,1,1,'2015-07-20 18:45:58','2015-07-20 18:45:58'),(157,6,27,0,0,1,1,'2015-07-20 18:45:58','2015-07-20 18:45:58'),(158,29,27,0,0,1,1,'2015-07-20 18:45:58','2015-07-20 18:45:58'),(159,30,27,0,0,1,1,'2015-07-20 18:45:58','2015-07-20 18:45:58'),(160,9,27,1,1,1,1,'2015-07-20 18:45:58','2015-07-20 18:45:58'),(161,31,27,0,0,0,0,'2015-07-20 18:45:59','2015-07-20 18:45:59'),(162,10,27,1,1,1,1,'2015-07-20 18:45:59','2015-07-20 18:45:59'),(163,11,27,1,1,0,0,'2015-07-20 18:45:59','2015-07-20 18:45:59'),(164,14,27,1,1,1,1,'2015-07-20 18:45:59','2015-07-20 18:45:59'),(165,32,27,0,0,0,0,'2015-07-20 18:45:59','2015-07-20 18:45:59'),(166,33,27,1,1,0,0,'2015-07-20 18:45:59','2015-07-20 18:45:59'),(167,34,27,0,0,0,0,'2015-07-20 18:45:59','2015-07-20 18:45:59'),(168,15,27,1,1,1,1,'2015-07-20 18:45:59','2015-07-20 18:45:59'),(169,35,27,0,0,0,0,'2015-07-20 18:45:59','2015-07-20 18:45:59'),(170,16,27,1,1,1,1,'2015-07-20 18:45:59','2015-07-20 18:45:59'),(171,36,27,1,1,1,1,'2015-07-20 18:45:59','2015-07-20 18:45:59'),(172,17,27,1,1,1,1,'2015-07-20 18:45:59','2015-07-20 18:45:59'),(173,37,27,0,0,0,0,'2015-07-20 18:45:59','2015-07-20 18:45:59'),(174,38,27,0,0,0,0,'2015-07-20 18:45:59','2015-07-20 18:45:59'),(175,18,27,1,1,1,1,'2015-07-20 18:45:59','2015-07-20 18:45:59'),(176,19,27,1,1,0,0,'2015-07-20 18:45:59','2015-07-20 18:45:59'),(177,39,27,1,1,0,0,'2015-07-20 18:45:59','2015-07-20 18:45:59'),(178,22,27,1,1,1,1,'2015-07-20 18:45:59','2015-07-20 18:45:59'),(179,25,27,1,1,0,0,'2015-07-20 18:45:59','2015-07-20 18:45:59'),(180,26,27,1,1,1,1,'2015-07-20 18:45:59','2015-07-20 18:45:59'),(181,1,28,1,1,1,1,'2015-07-20 18:46:00','2015-07-20 18:46:00'),(182,2,28,1,1,1,1,'2015-07-20 18:46:00','2015-07-20 18:46:00'),(183,27,28,1,1,1,1,'2015-07-20 18:46:00','2015-07-20 18:46:00'),(184,3,28,1,1,1,1,'2015-07-20 18:46:00','2015-07-20 18:46:00'),(185,5,28,1,1,1,1,'2015-07-20 18:46:00','2015-07-20 18:46:00'),(186,28,28,1,1,1,1,'2015-07-20 18:46:00','2015-07-20 18:46:00'),(187,6,28,1,1,1,1,'2015-07-20 18:46:00','2015-07-20 18:46:00'),(188,29,28,1,1,1,1,'2015-07-20 18:46:00','2015-07-20 18:46:00'),(189,30,28,1,1,1,1,'2015-07-20 18:46:00','2015-07-20 18:46:00'),(190,9,28,1,1,1,1,'2015-07-20 18:46:00','2015-07-20 18:46:00'),(191,31,28,0,0,0,0,'2015-07-20 18:46:00','2015-07-20 18:46:00'),(192,10,28,1,1,1,1,'2015-07-20 18:46:00','2015-07-20 18:46:00'),(193,11,28,1,1,1,0,'2015-07-20 18:46:00','2015-07-20 18:46:00'),(194,14,28,1,1,1,1,'2015-07-20 18:46:00','2015-07-20 18:46:00'),(195,32,28,0,0,0,0,'2015-07-20 18:46:00','2015-07-20 18:46:00'),(196,33,28,1,1,1,0,'2015-07-20 18:46:00','2015-07-20 18:46:00'),(197,34,28,0,0,0,0,'2015-07-20 18:46:00','2015-07-20 18:46:00'),(198,15,28,1,1,1,1,'2015-07-20 18:46:00','2015-07-20 18:46:00'),(199,35,28,0,0,0,0,'2015-07-20 18:46:00','2015-07-20 18:46:00'),(200,16,28,1,1,1,1,'2015-07-20 18:46:00','2015-07-20 18:46:00'),(201,36,28,0,0,0,0,'2015-07-20 18:46:01','2015-07-20 18:46:01'),(202,17,28,1,1,1,1,'2015-07-20 18:46:01','2015-07-20 18:46:01'),(203,37,28,0,0,0,0,'2015-07-20 18:46:01','2015-07-20 18:46:01'),(204,38,28,0,0,0,0,'2015-07-20 18:46:01','2015-07-20 18:46:01'),(205,18,28,1,1,1,1,'2015-07-20 18:46:01','2015-07-20 18:46:01'),(206,19,28,1,1,1,1,'2015-07-20 18:46:01','2015-07-20 18:46:01'),(207,39,28,1,1,1,1,'2015-07-20 18:46:01','2015-07-20 18:46:01'),(208,22,28,1,1,1,1,'2015-07-20 18:46:01','2015-07-20 18:46:01'),(209,25,28,1,1,1,1,'2015-07-20 18:46:01','2015-07-20 18:46:01'),(210,26,28,1,1,1,1,'2015-07-20 18:46:01','2015-07-20 18:46:01'),(211,1,29,0,0,0,0,'2015-07-20 18:46:01','2015-07-20 18:46:01'),(212,2,29,1,1,1,1,'2015-07-20 18:46:01','2015-07-20 18:46:01'),(213,27,29,1,1,1,1,'2015-07-20 18:46:01','2015-07-20 18:46:01'),(214,3,29,1,1,1,1,'2015-07-20 18:46:01','2015-07-20 18:46:01'),(215,5,29,1,1,1,1,'2015-07-20 18:46:01','2015-07-20 18:46:01'),(216,28,29,1,1,1,1,'2015-07-20 18:46:01','2015-07-20 18:46:01'),(217,6,29,1,1,1,1,'2015-07-20 18:46:01','2015-07-20 18:46:01'),(218,29,29,0,0,0,0,'2015-07-20 18:46:01','2015-07-20 18:46:01'),(219,30,29,0,0,0,0,'2015-07-20 18:46:01','2015-07-20 18:46:01'),(220,9,29,0,0,1,1,'2015-07-20 18:46:01','2015-07-20 18:46:01'),(221,31,29,0,0,0,0,'2015-07-20 18:46:01','2015-07-20 18:46:01'),(222,10,29,1,1,1,1,'2015-07-20 18:46:01','2015-07-20 18:46:01'),(223,11,29,0,0,0,1,'2015-07-20 18:46:01','2015-07-20 18:46:01'),(224,14,29,1,1,1,1,'2015-07-20 18:46:01','2015-07-20 18:46:01'),(225,32,29,0,0,0,0,'2015-07-20 18:46:01','2015-07-20 18:46:01'),(226,33,29,0,0,0,1,'2015-07-20 18:46:01','2015-07-20 18:46:01'),(227,34,29,0,0,0,0,'2015-07-20 18:46:01','2015-07-20 18:46:01'),(228,15,29,1,1,1,1,'2015-07-20 18:46:02','2015-07-20 18:46:02'),(229,35,29,0,0,0,0,'2015-07-20 18:46:02','2015-07-20 18:46:02'),(230,16,29,1,1,1,1,'2015-07-20 18:46:02','2015-07-20 18:46:02'),(231,36,29,0,0,0,0,'2015-07-20 18:46:02','2015-07-20 18:46:02'),(232,17,29,1,1,1,1,'2015-07-20 18:46:02','2015-07-20 18:46:02'),(233,37,29,0,0,0,0,'2015-07-20 18:46:02','2015-07-20 18:46:02'),(234,38,29,0,0,0,0,'2015-07-20 18:46:02','2015-07-20 18:46:02'),(235,18,29,1,1,1,1,'2015-07-20 18:46:02','2015-07-20 18:46:02'),(236,19,29,1,1,1,1,'2015-07-20 18:46:02','2015-07-20 18:46:02'),(237,39,29,0,0,0,0,'2015-07-20 18:46:02','2015-07-20 18:46:02'),(238,22,29,1,1,1,1,'2015-07-20 18:46:02','2015-07-20 18:46:02'),(239,25,29,0,0,0,0,'2015-07-20 18:46:02','2015-07-20 18:46:02'),(240,26,29,1,1,1,1,'2015-07-20 18:46:02','2015-07-20 18:46:02'),(241,1,30,1,1,1,1,'2015-07-20 18:46:02','2015-07-20 18:46:02'),(242,2,30,1,1,1,1,'2015-07-20 18:46:02','2015-07-20 18:46:02'),(243,27,30,1,1,1,1,'2015-07-20 18:46:02','2015-07-20 18:46:02'),(244,3,30,1,1,1,1,'2015-07-20 18:46:02','2015-07-20 18:46:02'),(245,5,30,1,1,1,1,'2015-07-20 18:46:02','2015-07-20 18:46:02'),(246,28,30,1,1,1,1,'2015-07-20 18:46:02','2015-07-20 18:46:02'),(247,6,30,1,1,1,1,'2015-07-20 18:46:02','2015-07-20 18:46:02'),(248,29,30,1,1,1,1,'2015-07-20 18:46:02','2015-07-20 18:46:02'),(249,30,30,1,1,1,1,'2015-07-20 18:46:02','2015-07-20 18:46:02'),(250,9,30,1,1,1,1,'2015-07-20 18:46:02','2015-07-20 18:46:02'),(251,31,30,0,0,0,0,'2015-07-20 18:46:02','2015-07-20 18:46:02'),(252,10,30,1,1,1,1,'2015-07-20 18:46:02','2015-07-20 18:46:02'),(253,11,30,1,1,1,1,'2015-07-20 18:46:02','2015-07-20 18:46:02'),(254,14,30,1,1,1,1,'2015-07-20 18:46:02','2015-07-20 18:46:02'),(255,32,30,0,0,0,0,'2015-07-20 18:46:02','2015-07-20 18:46:02'),(256,33,30,1,1,1,1,'2015-07-20 18:46:03','2015-07-20 18:46:03'),(257,34,30,0,0,0,0,'2015-07-20 18:46:03','2015-07-20 18:46:03'),(258,15,30,1,1,1,1,'2015-07-20 18:46:03','2015-07-20 18:46:03'),(259,35,30,0,0,0,0,'2015-07-20 18:46:03','2015-07-20 18:46:03'),(260,16,30,1,1,1,1,'2015-07-20 18:46:03','2015-07-20 18:46:03'),(261,36,30,1,1,1,1,'2015-07-20 18:46:03','2015-07-20 18:46:03'),(262,17,30,1,1,1,1,'2015-07-20 18:46:03','2015-07-20 18:46:03'),(263,37,30,0,0,0,0,'2015-07-20 18:46:03','2015-07-20 18:46:03'),(264,38,30,0,0,0,0,'2015-07-20 18:46:03','2015-07-20 18:46:03'),(265,18,30,1,1,1,1,'2015-07-20 18:46:03','2015-07-20 18:46:03'),(266,19,30,1,1,1,1,'2015-07-20 18:46:03','2015-07-20 18:46:03'),(267,39,30,1,1,1,1,'2015-07-20 18:46:03','2015-07-20 18:46:03'),(268,22,30,1,1,1,1,'2015-07-20 18:46:03','2015-07-20 18:46:03'),(269,25,30,1,1,1,1,'2015-07-20 18:46:03','2015-07-20 18:46:03'),(270,26,30,1,1,1,1,'2015-07-20 18:46:03','2015-07-20 18:46:03'),(271,1,31,1,1,1,1,'2015-07-20 18:46:03','2015-07-20 18:46:03'),(272,2,31,1,1,1,1,'2015-07-20 18:46:03','2015-07-20 18:46:03'),(273,27,31,1,1,1,1,'2015-07-20 18:46:03','2015-07-20 18:46:03'),(274,3,31,1,1,1,1,'2015-07-20 18:46:03','2015-07-20 18:46:03'),(275,5,31,1,1,1,1,'2015-07-20 18:46:03','2015-07-20 18:46:03'),(276,28,31,1,1,1,1,'2015-07-20 18:46:03','2015-07-20 18:46:03'),(277,6,31,1,1,1,1,'2015-07-20 18:46:04','2015-07-20 18:46:04'),(278,29,31,0,0,0,0,'2015-07-20 18:46:04','2015-07-20 18:46:04'),(279,30,31,0,0,0,0,'2015-07-20 18:46:04','2015-07-20 18:46:04'),(280,9,31,1,1,1,1,'2015-07-20 18:46:04','2015-07-20 18:46:04'),(281,31,31,0,0,0,0,'2015-07-20 18:46:04','2015-07-20 18:46:04'),(282,10,31,1,1,1,1,'2015-07-20 18:46:04','2015-07-20 18:46:04'),(283,11,31,1,1,1,1,'2015-07-20 18:46:04','2015-07-20 18:46:04'),(284,14,31,1,1,1,1,'2015-07-20 18:46:04','2015-07-20 18:46:04'),(285,32,31,0,0,0,0,'2015-07-20 18:46:04','2015-07-20 18:46:04'),(286,33,31,0,0,0,0,'2015-07-20 18:46:04','2015-07-20 18:46:04'),(287,34,31,0,0,0,0,'2015-07-20 18:46:04','2015-07-20 18:46:04'),(288,15,31,1,1,1,1,'2015-07-20 18:46:04','2015-07-20 18:46:04'),(289,35,31,0,0,0,0,'2015-07-20 18:46:04','2015-07-20 18:46:04'),(290,16,31,1,1,1,1,'2015-07-20 18:46:04','2015-07-20 18:46:04'),(291,36,31,0,0,0,0,'2015-07-20 18:46:04','2015-07-20 18:46:04'),(292,17,31,1,1,1,1,'2015-07-20 18:46:04','2015-07-20 18:46:04'),(293,37,31,0,0,0,0,'2015-07-20 18:46:04','2015-07-20 18:46:04'),(294,38,31,0,0,0,0,'2015-07-20 18:46:04','2015-07-20 18:46:04'),(295,18,31,1,1,1,1,'2015-07-20 18:46:04','2015-07-20 18:46:04'),(296,19,31,1,1,1,1,'2015-07-20 18:46:04','2015-07-20 18:46:04'),(297,39,31,1,1,1,1,'2015-07-20 18:46:04','2015-07-20 18:46:04'),(298,22,31,1,1,1,1,'2015-07-20 18:46:04','2015-07-20 18:46:04'),(299,25,31,1,1,1,1,'2015-07-20 18:46:04','2015-07-20 18:46:04'),(300,26,31,1,1,1,1,'2015-07-20 18:46:05','2015-07-20 18:46:05'),(301,1,32,1,1,1,1,'2015-07-20 18:46:05','2015-07-20 18:46:05'),(302,2,32,1,1,1,1,'2015-07-20 18:46:05','2015-07-20 18:46:05'),(303,27,32,1,1,1,1,'2015-07-20 18:46:05','2015-07-20 18:46:05'),(304,3,32,1,1,1,1,'2015-07-20 18:46:05','2015-07-20 18:46:05'),(305,5,32,1,1,1,1,'2015-07-20 18:46:05','2015-07-20 18:46:05'),(306,28,32,1,1,1,1,'2015-07-20 18:46:05','2015-07-20 18:46:05'),(307,6,32,1,1,1,1,'2015-07-20 18:46:05','2015-07-20 18:46:05'),(308,29,32,1,1,1,1,'2015-07-20 18:46:05','2015-07-20 18:46:05'),(309,30,32,1,1,1,1,'2015-07-20 18:46:05','2015-07-20 18:46:05'),(310,9,32,1,1,1,1,'2015-07-20 18:46:05','2015-07-20 18:46:05'),(311,31,32,0,0,0,0,'2015-07-20 18:46:05','2015-07-20 18:46:05'),(312,10,32,1,1,1,1,'2015-07-20 18:46:05','2015-07-20 18:46:05'),(313,11,32,1,1,1,1,'2015-07-20 18:46:05','2015-07-20 18:46:05'),(314,14,32,1,1,1,1,'2015-07-20 18:46:05','2015-07-20 18:46:05'),(315,32,32,0,0,0,0,'2015-07-20 18:46:05','2015-07-20 18:46:05'),(316,33,32,0,0,0,0,'2015-07-20 18:46:05','2015-07-20 18:46:05'),(317,34,32,0,0,0,0,'2015-07-20 18:46:05','2015-07-20 18:46:05'),(318,15,32,1,1,1,1,'2015-07-20 18:46:05','2015-07-20 18:46:05'),(319,35,32,0,0,0,0,'2015-07-20 18:46:05','2015-07-20 18:46:05'),(320,16,32,1,1,1,1,'2015-07-20 18:46:05','2015-07-20 18:46:05'),(321,36,32,1,1,1,1,'2015-07-20 18:46:05','2015-07-20 18:46:05'),(322,17,32,1,1,1,1,'2015-07-20 18:46:05','2015-07-20 18:46:05'),(323,37,32,0,0,0,0,'2015-07-20 18:46:06','2015-07-20 18:46:06'),(324,38,32,0,0,0,0,'2015-07-20 18:46:06','2015-07-20 18:46:06'),(325,18,32,1,1,1,1,'2015-07-20 18:46:06','2015-07-20 18:46:06'),(326,19,32,1,1,1,1,'2015-07-20 18:46:06','2015-07-20 18:46:06'),(327,39,32,1,1,1,1,'2015-07-20 18:46:06','2015-07-20 18:46:06'),(328,22,32,1,1,1,1,'2015-07-20 18:46:06','2015-07-20 18:46:06'),(329,25,32,1,1,1,1,'2015-07-20 18:46:06','2015-07-20 18:46:06'),(330,26,32,1,1,1,1,'2015-07-20 18:46:06','2015-07-20 18:46:06'),(331,1,33,1,1,1,1,'2015-07-20 18:46:06','2015-07-20 18:46:06'),(332,2,33,1,1,1,1,'2015-07-20 18:46:06','2015-07-20 18:46:06'),(333,27,33,1,1,1,1,'2015-07-20 18:46:06','2015-07-20 18:46:06'),(334,3,33,1,1,1,1,'2015-07-20 18:46:06','2015-07-20 18:46:06'),(335,5,33,1,1,1,1,'2015-07-20 18:46:06','2015-07-20 18:46:06'),(336,28,33,1,1,1,1,'2015-07-20 18:46:06','2015-07-20 18:46:06'),(337,6,33,1,1,1,1,'2015-07-20 18:46:06','2015-07-20 18:46:06'),(338,29,33,1,1,1,1,'2015-07-20 18:46:06','2015-07-20 18:46:06'),(339,30,33,1,1,1,1,'2015-07-20 18:46:06','2015-07-20 18:46:06'),(340,9,33,1,1,1,1,'2015-07-20 18:46:06','2015-07-20 18:46:06'),(341,31,33,0,0,0,0,'2015-07-20 18:46:06','2015-07-20 18:46:06'),(342,10,33,1,1,1,1,'2015-07-20 18:46:06','2015-07-20 18:46:06'),(343,11,33,1,1,1,1,'2015-07-20 18:46:06','2015-07-20 18:46:06'),(344,14,33,1,1,1,1,'2015-07-20 18:46:06','2015-07-20 18:46:06'),(345,32,33,0,0,0,0,'2015-07-20 18:46:06','2015-07-20 18:46:06'),(346,33,33,0,0,0,0,'2015-07-20 18:46:06','2015-07-20 18:46:06'),(347,34,33,0,0,0,0,'2015-07-20 18:46:06','2015-07-20 18:46:06'),(348,15,33,1,1,1,1,'2015-07-20 18:46:06','2015-07-20 18:46:06'),(349,35,33,0,0,0,0,'2015-07-20 18:46:06','2015-07-20 18:46:06'),(350,16,33,1,1,1,1,'2015-07-20 18:46:06','2015-07-20 18:46:06'),(351,36,33,1,1,1,1,'2015-07-20 18:46:07','2015-07-20 18:46:07'),(352,17,33,1,1,1,1,'2015-07-20 18:46:07','2015-07-20 18:46:07'),(353,37,33,0,0,0,0,'2015-07-20 18:46:07','2015-07-20 18:46:07'),(354,38,33,0,0,0,0,'2015-07-20 18:46:07','2015-07-20 18:46:07'),(355,18,33,1,1,1,1,'2015-07-20 18:46:07','2015-07-20 18:46:07'),(356,19,33,1,1,1,1,'2015-07-20 18:46:07','2015-07-20 18:46:07'),(357,39,33,1,1,1,1,'2015-07-20 18:46:07','2015-07-20 18:46:07'),(358,22,33,1,1,1,1,'2015-07-20 18:46:07','2015-07-20 18:46:07'),(359,25,33,1,1,1,1,'2015-07-20 18:46:07','2015-07-20 18:46:07'),(360,26,33,1,1,1,1,'2015-07-20 18:46:07','2015-07-20 18:46:07'),(361,1,34,1,1,1,1,'2015-07-20 18:46:07','2015-07-20 18:46:07'),(362,2,34,1,1,1,1,'2015-07-20 18:46:07','2015-07-20 18:46:07'),(363,27,34,0,0,0,0,'2015-07-20 18:46:07','2015-07-20 18:46:07'),(364,3,34,1,1,1,1,'2015-07-20 18:46:07','2015-07-20 18:46:07'),(365,5,34,1,1,1,1,'2015-07-20 18:46:07','2015-07-20 18:46:07'),(366,28,34,1,1,1,1,'2015-07-20 18:46:07','2015-07-20 18:46:07'),(367,6,34,1,1,1,1,'2015-07-20 18:46:07','2015-07-20 18:46:07'),(368,29,34,0,0,0,0,'2015-07-20 18:46:07','2015-07-20 18:46:07'),(369,30,34,0,0,0,0,'2015-07-20 18:46:07','2015-07-20 18:46:07'),(370,9,34,1,1,1,1,'2015-07-20 18:46:07','2015-07-20 18:46:07'),(371,31,34,0,0,0,0,'2015-07-20 18:46:07','2015-07-20 18:46:07'),(372,10,34,1,1,1,1,'2015-07-20 18:46:07','2015-07-20 18:46:07'),(373,11,34,1,1,1,1,'2015-07-20 18:46:07','2015-07-20 18:46:07'),(374,14,34,1,1,1,1,'2015-07-20 18:46:07','2015-07-20 18:46:07'),(375,32,34,0,0,0,0,'2015-07-20 18:46:07','2015-07-20 18:46:07'),(376,33,34,0,0,0,0,'2015-07-20 18:46:07','2015-07-20 18:46:07'),(377,34,34,0,0,0,0,'2015-07-20 18:46:07','2015-07-20 18:46:07'),(378,15,34,1,1,1,1,'2015-07-20 18:46:07','2015-07-20 18:46:07'),(379,35,34,0,0,0,0,'2015-07-20 18:46:08','2015-07-20 18:46:08'),(380,16,34,1,1,1,1,'2015-07-20 18:46:08','2015-07-20 18:46:08'),(381,36,34,0,0,0,0,'2015-07-20 18:46:08','2015-07-20 18:46:08'),(382,17,34,1,1,1,1,'2015-07-20 18:46:08','2015-07-20 18:46:08'),(383,37,34,0,0,0,0,'2015-07-20 18:46:08','2015-07-20 18:46:08'),(384,38,34,0,0,0,0,'2015-07-20 18:46:08','2015-07-20 18:46:08'),(385,18,34,1,1,1,1,'2015-07-20 18:46:08','2015-07-20 18:46:08'),(386,19,34,1,1,1,1,'2015-07-20 18:46:08','2015-07-20 18:46:08'),(387,39,34,1,1,1,1,'2015-07-20 18:46:09','2015-07-20 18:46:09'),(388,22,34,1,1,1,1,'2015-07-20 18:46:09','2015-07-20 18:46:09'),(389,25,34,1,1,1,1,'2015-07-20 18:46:09','2015-07-20 18:46:09'),(390,26,34,1,1,1,1,'2015-07-20 18:46:09','2015-07-20 18:46:09'),(391,1,35,1,1,0,0,'2015-07-20 18:46:09','2015-07-20 18:46:09'),(392,2,35,1,1,1,1,'2015-07-20 18:46:09','2015-07-20 18:46:09'),(393,27,35,0,0,0,0,'2015-07-20 18:46:09','2015-07-20 18:46:09'),(394,3,35,1,1,1,1,'2015-07-20 18:46:09','2015-07-20 18:46:09'),(395,5,35,1,1,1,1,'2015-07-20 18:46:09','2015-07-20 18:46:09'),(396,28,35,1,1,1,1,'2015-07-20 18:46:09','2015-07-20 18:46:09'),(397,6,35,1,1,1,1,'2015-07-20 18:46:09','2015-07-20 18:46:09'),(398,29,35,0,0,0,0,'2015-07-20 18:46:09','2015-07-20 18:46:09'),(399,30,35,0,0,0,0,'2015-07-20 18:46:09','2015-07-20 18:46:09'),(400,9,35,1,1,1,0,'2015-07-20 18:46:09','2015-07-20 18:46:09'),(401,31,35,0,0,0,0,'2015-07-20 18:46:09','2015-07-20 18:46:09'),(402,10,35,1,1,1,1,'2015-07-20 18:46:09','2015-07-20 18:46:09'),(403,11,35,0,0,0,0,'2015-07-20 18:46:09','2015-07-20 18:46:09'),(404,14,35,1,1,0,0,'2015-07-20 18:46:09','2015-07-20 18:46:09'),(405,32,35,0,0,0,0,'2015-07-20 18:46:09','2015-07-20 18:46:09'),(406,33,35,0,0,0,0,'2015-07-20 18:46:09','2015-07-20 18:46:09'),(407,34,35,0,0,0,0,'2015-07-20 18:46:09','2015-07-20 18:46:09'),(408,15,35,0,0,0,0,'2015-07-20 18:46:09','2015-07-20 18:46:09'),(409,35,35,0,0,0,0,'2015-07-20 18:46:09','2015-07-20 18:46:09'),(410,16,35,0,0,0,0,'2015-07-20 18:46:09','2015-07-20 18:46:09'),(411,36,35,0,0,0,0,'2015-07-20 18:46:09','2015-07-20 18:46:09'),(412,17,35,1,1,1,1,'2015-07-20 18:46:09','2015-07-20 18:46:09'),(413,37,35,0,0,0,0,'2015-07-20 18:46:09','2015-07-20 18:46:09'),(414,38,35,0,0,0,0,'2015-07-20 18:46:10','2015-07-20 18:46:10'),(415,18,35,0,0,0,0,'2015-07-20 18:46:10','2015-07-20 18:46:10'),(416,19,35,1,1,1,1,'2015-07-20 18:46:10','2015-07-20 18:46:10'),(417,39,35,0,0,0,0,'2015-07-20 18:46:10','2015-07-20 18:46:10'),(418,22,35,1,1,1,1,'2015-07-20 18:46:10','2015-07-20 18:46:10'),(419,25,35,1,1,1,1,'2015-07-20 18:46:10','2015-07-20 18:46:10'),(420,26,35,1,1,1,1,'2015-07-20 18:46:10','2015-07-20 18:46:10'),(421,1,36,1,1,1,1,'2015-07-20 18:46:10','2015-07-20 18:46:10'),(422,2,36,1,1,1,1,'2015-07-20 18:46:10','2015-07-20 18:46:10'),(423,27,36,1,1,1,1,'2015-07-20 18:46:10','2015-07-20 18:46:10'),(424,3,36,1,1,1,1,'2015-07-20 18:46:10','2015-07-20 18:46:10'),(425,5,36,1,1,1,1,'2015-07-20 18:46:10','2015-07-20 18:46:10'),(426,28,36,1,1,1,1,'2015-07-20 18:46:10','2015-07-20 18:46:10'),(427,6,36,1,1,1,1,'2015-07-20 18:46:10','2015-07-20 18:46:10'),(428,29,36,1,1,1,1,'2015-07-20 18:46:10','2015-07-20 18:46:10'),(429,30,36,0,0,0,0,'2015-07-20 18:46:10','2015-07-20 18:46:10'),(430,9,36,1,1,1,1,'2015-07-20 18:46:10','2015-07-20 18:46:10'),(431,31,36,0,0,0,0,'2015-07-20 18:46:10','2015-07-20 18:46:10'),(432,10,36,1,1,1,1,'2015-07-20 18:46:10','2015-07-20 18:46:10'),(433,11,36,1,1,1,1,'2015-07-20 18:46:10','2015-07-20 18:46:10'),(434,14,36,1,1,1,1,'2015-07-20 18:46:10','2015-07-20 18:46:10'),(435,32,36,0,0,0,0,'2015-07-20 18:46:10','2015-07-20 18:46:10'),(436,33,36,0,0,0,0,'2015-07-20 18:46:10','2015-07-20 18:46:10'),(437,34,36,0,0,0,0,'2015-07-20 18:46:10','2015-07-20 18:46:10'),(438,15,36,1,1,1,1,'2015-07-20 18:46:10','2015-07-20 18:46:10'),(439,35,36,0,0,0,0,'2015-07-20 18:46:10','2015-07-20 18:46:10'),(440,16,36,1,1,1,1,'2015-07-20 18:46:10','2015-07-20 18:46:10'),(441,36,36,0,0,0,0,'2015-07-20 18:46:10','2015-07-20 18:46:10'),(442,17,36,1,1,1,1,'2015-07-20 18:46:11','2015-07-20 18:46:11'),(443,37,36,0,0,0,0,'2015-07-20 18:46:11','2015-07-20 18:46:11'),(444,38,36,0,0,0,0,'2015-07-20 18:46:11','2015-07-20 18:46:11'),(445,18,36,1,1,1,1,'2015-07-20 18:46:11','2015-07-20 18:46:11'),(446,19,36,1,1,1,1,'2015-07-20 18:46:11','2015-07-20 18:46:11'),(447,39,36,0,0,0,0,'2015-07-20 18:46:11','2015-07-20 18:46:11'),(448,22,36,1,1,1,1,'2015-07-20 18:46:11','2015-07-20 18:46:11'),(449,25,36,1,1,1,1,'2015-07-20 18:46:11','2015-07-20 18:46:11'),(450,26,36,1,1,1,1,'2015-07-20 18:46:11','2015-07-20 18:46:11'),(451,1,37,1,1,1,1,'2015-07-20 18:46:11','2015-07-20 18:46:11'),(452,2,37,1,1,1,1,'2015-07-20 18:46:11','2015-07-20 18:46:11'),(453,27,37,0,0,0,0,'2015-07-20 18:46:11','2015-07-20 18:46:11'),(454,3,37,1,1,1,1,'2015-07-20 18:46:11','2015-07-20 18:46:11'),(455,5,37,1,1,1,1,'2015-07-20 18:46:11','2015-07-20 18:46:11'),(456,28,37,1,1,1,1,'2015-07-20 18:46:11','2015-07-20 18:46:11'),(457,6,37,1,1,1,1,'2015-07-20 18:46:11','2015-07-20 18:46:11'),(458,29,37,0,0,0,0,'2015-07-20 18:46:11','2015-07-20 18:46:11'),(459,30,37,0,0,0,0,'2015-07-20 18:46:11','2015-07-20 18:46:11'),(460,9,37,1,1,1,1,'2015-07-20 18:46:11','2015-07-20 18:46:11'),(461,31,37,0,0,0,0,'2015-07-20 18:46:11','2015-07-20 18:46:11'),(462,10,37,1,1,1,1,'2015-07-20 18:46:11','2015-07-20 18:46:11'),(463,11,37,1,1,1,1,'2015-07-20 18:46:11','2015-07-20 18:46:11'),(464,14,37,1,1,1,1,'2015-07-20 18:46:11','2015-07-20 18:46:11'),(465,32,37,0,0,0,0,'2015-07-20 18:46:11','2015-07-20 18:46:11'),(466,33,37,0,0,0,0,'2015-07-20 18:46:11','2015-07-20 18:46:11'),(467,34,37,0,0,0,0,'2015-07-20 18:46:12','2015-07-20 18:46:12'),(468,15,37,1,1,1,1,'2015-07-20 18:46:12','2015-07-20 18:46:12'),(469,35,37,0,0,0,0,'2015-07-20 18:46:12','2015-07-20 18:46:12'),(470,16,37,1,1,1,1,'2015-07-20 18:46:12','2015-07-20 18:46:12'),(471,36,37,0,0,0,0,'2015-07-20 18:46:12','2015-07-20 18:46:12'),(472,17,37,1,1,1,1,'2015-07-20 18:46:12','2015-07-20 18:46:12'),(473,37,37,0,0,0,0,'2015-07-20 18:46:12','2015-07-20 18:46:12'),(474,38,37,0,0,0,0,'2015-07-20 18:46:12','2015-07-20 18:46:12'),(475,18,37,1,1,1,1,'2015-07-20 18:46:12','2015-07-20 18:46:12'),(476,19,37,1,1,1,1,'2015-07-20 18:46:12','2015-07-20 18:46:12'),(477,39,37,0,0,0,0,'2015-07-20 18:46:12','2015-07-20 18:46:12'),(478,22,37,1,1,1,1,'2015-07-20 18:46:12','2015-07-20 18:46:12'),(479,25,37,1,1,1,1,'2015-07-20 18:46:12','2015-07-20 18:46:12'),(480,26,37,1,1,1,1,'2015-07-20 18:46:12','2015-07-20 18:46:12'),(481,1,38,1,1,1,1,'2015-07-20 18:46:12','2015-07-20 18:46:12'),(482,2,38,1,1,1,1,'2015-07-20 18:46:12','2015-07-20 18:46:12'),(483,27,38,0,0,0,0,'2015-07-20 18:46:12','2015-07-20 18:46:12'),(484,3,38,1,1,1,1,'2015-07-20 18:46:12','2015-07-20 18:46:12'),(485,5,38,0,0,0,0,'2015-07-20 18:46:12','2015-07-20 18:46:12'),(486,28,38,1,1,1,1,'2015-07-20 18:46:12','2015-07-20 18:46:12'),(487,6,38,1,1,1,1,'2015-07-20 18:46:13','2015-07-20 18:46:13'),(488,29,38,0,0,0,0,'2015-07-20 18:46:13','2015-07-20 18:46:13'),(489,30,38,0,0,0,0,'2015-07-20 18:46:13','2015-07-20 18:46:13'),(490,9,38,1,1,1,1,'2015-07-20 18:46:13','2015-07-20 18:46:13'),(491,31,38,0,0,0,0,'2015-07-20 18:46:13','2015-07-20 18:46:13'),(492,10,38,1,1,1,1,'2015-07-20 18:46:13','2015-07-20 18:46:13'),(493,11,38,1,1,1,1,'2015-07-20 18:46:13','2015-07-20 18:46:13'),(494,14,38,1,1,1,1,'2015-07-20 18:46:13','2015-07-20 18:46:13'),(495,32,38,0,0,0,0,'2015-07-20 18:46:13','2015-07-20 18:46:13'),(496,33,38,0,0,0,0,'2015-07-20 18:46:13','2015-07-20 18:46:13'),(497,34,38,0,0,0,0,'2015-07-20 18:46:13','2015-07-20 18:46:13'),(498,15,38,1,1,1,1,'2015-07-20 18:46:13','2015-07-20 18:46:13'),(499,35,38,0,0,0,0,'2015-07-20 18:46:13','2015-07-20 18:46:13'),(500,16,38,1,1,1,1,'2015-07-20 18:46:13','2015-07-20 18:46:13'),(501,36,38,0,0,0,0,'2015-07-20 18:46:13','2015-07-20 18:46:13'),(502,17,38,1,1,1,1,'2015-07-20 18:46:13','2015-07-20 18:46:13'),(503,37,38,0,0,0,0,'2015-07-20 18:46:13','2015-07-20 18:46:13'),(504,38,38,0,0,0,0,'2015-07-20 18:46:13','2015-07-20 18:46:13'),(505,18,38,1,1,1,1,'2015-07-20 18:46:13','2015-07-20 18:46:13'),(506,19,38,1,1,1,1,'2015-07-20 18:46:13','2015-07-20 18:46:13'),(507,39,38,0,0,0,0,'2015-07-20 18:46:13','2015-07-20 18:46:13'),(508,22,38,1,1,1,1,'2015-07-20 18:46:13','2015-07-20 18:46:13'),(509,25,38,1,1,1,1,'2015-07-20 18:46:13','2015-07-20 18:46:13'),(510,26,38,1,1,1,1,'2015-07-20 18:46:13','2015-07-20 18:46:13'),(511,1,39,0,0,0,0,'2015-07-20 18:46:14','2015-07-20 18:46:14'),(512,2,39,1,1,1,1,'2015-07-20 18:46:14','2015-07-20 18:46:14'),(513,27,39,0,0,0,0,'2015-07-20 18:46:14','2015-07-20 18:46:14'),(514,3,39,1,1,1,1,'2015-07-20 18:46:14','2015-07-20 18:46:14'),(515,5,39,1,1,1,1,'2015-07-20 18:46:14','2015-07-20 18:46:14'),(516,28,39,1,1,1,1,'2015-07-20 18:46:14','2015-07-20 18:46:14'),(517,6,39,1,1,1,1,'2015-07-20 18:46:14','2015-07-20 18:46:14'),(518,29,39,0,0,0,0,'2015-07-20 18:46:14','2015-07-20 18:46:14'),(519,30,39,0,0,0,0,'2015-07-20 18:46:14','2015-07-20 18:46:14'),(520,9,39,1,1,1,1,'2015-07-20 18:46:14','2015-07-20 18:46:14'),(521,31,39,0,0,0,0,'2015-07-20 18:46:14','2015-07-20 18:46:14'),(522,10,39,1,1,1,1,'2015-07-20 18:46:14','2015-07-20 18:46:14'),(523,11,39,1,1,1,1,'2015-07-20 18:46:14','2015-07-20 18:46:14'),(524,14,39,1,1,1,1,'2015-07-20 18:46:14','2015-07-20 18:46:14'),(525,32,39,0,0,0,0,'2015-07-20 18:46:14','2015-07-20 18:46:14'),(526,33,39,0,0,0,0,'2015-07-20 18:46:14','2015-07-20 18:46:14'),(527,34,39,0,0,0,0,'2015-07-20 18:46:14','2015-07-20 18:46:14'),(528,15,39,1,1,1,1,'2015-07-20 18:46:14','2015-07-20 18:46:14'),(529,35,39,0,0,0,0,'2015-07-20 18:46:14','2015-07-20 18:46:14'),(530,16,39,1,1,1,1,'2015-07-20 18:46:14','2015-07-20 18:46:14'),(531,36,39,0,0,0,0,'2015-07-20 18:46:14','2015-07-20 18:46:14'),(532,17,39,1,1,1,1,'2015-07-20 18:46:14','2015-07-20 18:46:14'),(533,37,39,0,0,0,0,'2015-07-20 18:46:14','2015-07-20 18:46:14'),(534,38,39,0,0,0,0,'2015-07-20 18:46:14','2015-07-20 18:46:14'),(535,18,39,1,1,1,1,'2015-07-20 18:46:14','2015-07-20 18:46:14'),(536,19,39,1,1,1,1,'2015-07-20 18:46:14','2015-07-20 18:46:14'),(537,39,39,0,0,0,0,'2015-07-20 18:46:14','2015-07-20 18:46:14'),(538,22,39,1,1,1,1,'2015-07-20 18:46:15','2015-07-20 18:46:15'),(539,25,39,0,0,0,0,'2015-07-20 18:46:15','2015-07-20 18:46:15'),(540,26,39,1,1,1,1,'2015-07-20 18:46:15','2015-07-20 18:46:15'),(541,1,40,1,1,1,1,'2015-07-20 18:46:15','2015-07-20 18:46:15'),(542,2,40,1,1,1,1,'2015-07-20 18:46:15','2015-07-20 18:46:15'),(543,27,40,0,0,0,0,'2015-07-20 18:46:15','2015-07-20 18:46:15'),(544,3,40,1,1,1,1,'2015-07-20 18:46:15','2015-07-20 18:46:15'),(545,5,40,1,1,1,1,'2015-07-20 18:46:15','2015-07-20 18:46:15'),(546,28,40,1,1,1,1,'2015-07-20 18:46:15','2015-07-20 18:46:15'),(547,6,40,1,1,1,1,'2015-07-20 18:46:15','2015-07-20 18:46:15'),(548,29,40,0,0,0,0,'2015-07-20 18:46:15','2015-07-20 18:46:15'),(549,30,40,0,0,0,0,'2015-07-20 18:46:15','2015-07-20 18:46:15'),(550,9,40,1,1,1,1,'2015-07-20 18:46:15','2015-07-20 18:46:15'),(551,31,40,0,0,0,0,'2015-07-20 18:46:15','2015-07-20 18:46:15'),(552,10,40,1,1,1,1,'2015-07-20 18:46:15','2015-07-20 18:46:15'),(553,11,40,1,1,1,1,'2015-07-20 18:46:15','2015-07-20 18:46:15'),(554,14,40,1,1,1,1,'2015-07-20 18:46:15','2015-07-20 18:46:15'),(555,32,40,0,0,0,0,'2015-07-20 18:46:15','2015-07-20 18:46:15'),(556,33,40,0,0,0,0,'2015-07-20 18:46:15','2015-07-20 18:46:15'),(557,34,40,0,0,0,0,'2015-07-20 18:46:15','2015-07-20 18:46:15'),(558,15,40,1,1,1,1,'2015-07-20 18:46:15','2015-07-20 18:46:15'),(559,35,40,0,0,0,0,'2015-07-20 18:46:15','2015-07-20 18:46:15'),(560,16,40,1,1,1,1,'2015-07-20 18:46:15','2015-07-20 18:46:15'),(561,36,40,0,0,0,0,'2015-07-20 18:46:15','2015-07-20 18:46:15'),(562,17,40,1,1,1,1,'2015-07-20 18:46:15','2015-07-20 18:46:15'),(563,37,40,0,0,0,0,'2015-07-20 18:46:15','2015-07-20 18:46:15'),(564,38,40,0,0,0,0,'2015-07-20 18:46:15','2015-07-20 18:46:15'),(565,18,40,1,1,1,1,'2015-07-20 18:46:15','2015-07-20 18:46:15'),(566,19,40,1,1,1,1,'2015-07-20 18:46:15','2015-07-20 18:46:15'),(567,39,40,0,0,0,0,'2015-07-20 18:46:15','2015-07-20 18:46:15'),(568,22,40,1,1,1,1,'2015-07-20 18:46:16','2015-07-20 18:46:16'),(569,25,40,0,0,0,0,'2015-07-20 18:46:16','2015-07-20 18:46:16'),(570,26,40,1,1,1,1,'2015-07-20 18:46:16','2015-07-20 18:46:16'),(571,1,41,1,1,1,1,'2015-07-20 18:46:16','2015-07-20 18:46:16'),(572,2,41,1,1,1,1,'2015-07-20 18:46:16','2015-07-20 18:46:16'),(573,27,41,0,0,0,0,'2015-07-20 18:46:16','2015-07-20 18:46:16'),(574,3,41,1,1,1,1,'2015-07-20 18:46:16','2015-07-20 18:46:16'),(575,5,41,1,1,1,1,'2015-07-20 18:46:16','2015-07-20 18:46:16'),(576,28,41,1,1,1,1,'2015-07-20 18:46:16','2015-07-20 18:46:16'),(577,6,41,1,1,1,1,'2015-07-20 18:46:16','2015-07-20 18:46:16'),(578,29,41,0,0,0,0,'2015-07-20 18:46:16','2015-07-20 18:46:16'),(579,30,41,0,0,0,0,'2015-07-20 18:46:16','2015-07-20 18:46:16'),(580,9,41,1,1,1,1,'2015-07-20 18:46:16','2015-07-20 18:46:16'),(581,31,41,0,0,0,0,'2015-07-20 18:46:16','2015-07-20 18:46:16'),(582,10,41,1,1,1,1,'2015-07-20 18:46:16','2015-07-20 18:46:16'),(583,11,41,1,1,1,1,'2015-07-20 18:46:16','2015-07-20 18:46:16'),(584,14,41,1,1,1,1,'2015-07-20 18:46:16','2015-07-20 18:46:16'),(585,32,41,0,0,0,0,'2015-07-20 18:46:16','2015-07-20 18:46:16'),(586,33,41,0,0,0,0,'2015-07-20 18:46:16','2015-07-20 18:46:16'),(587,34,41,0,0,0,0,'2015-07-20 18:46:16','2015-07-20 18:46:16'),(588,15,41,1,1,1,1,'2015-07-20 18:46:16','2015-07-20 18:46:16'),(589,35,41,0,0,0,0,'2015-07-20 18:46:16','2015-07-20 18:46:16'),(590,16,41,1,1,1,1,'2015-07-20 18:46:16','2015-07-20 18:46:16'),(591,36,41,0,0,0,0,'2015-07-20 18:46:17','2015-07-20 18:46:17'),(592,17,41,1,1,1,1,'2015-07-20 18:46:17','2015-07-20 18:46:17'),(593,37,41,0,0,0,0,'2015-07-20 18:46:17','2015-07-20 18:46:17'),(594,38,41,0,0,0,0,'2015-07-20 18:46:17','2015-07-20 18:46:17'),(595,18,41,1,1,1,1,'2015-07-20 18:46:17','2015-07-20 18:46:17'),(596,19,41,1,1,1,1,'2015-07-20 18:46:17','2015-07-20 18:46:17'),(597,39,41,0,0,0,0,'2015-07-20 18:46:17','2015-07-20 18:46:17'),(598,22,41,1,1,1,1,'2015-07-20 18:46:17','2015-07-20 18:46:17'),(599,25,41,0,0,0,0,'2015-07-20 18:46:17','2015-07-20 18:46:17'),(600,26,41,1,1,1,1,'2015-07-20 18:46:17','2015-07-20 18:46:17'),(601,1,102,1,1,1,1,'2015-07-20 18:46:17','2015-07-20 18:46:17'),(602,3,102,1,1,1,1,'2015-07-20 18:46:17','2015-07-20 18:46:17'),(603,5,102,1,1,1,1,'2015-07-20 18:46:17','2015-07-20 18:46:17'),(604,6,102,1,1,1,1,'2015-07-20 18:46:17','2015-07-20 18:46:17'),(605,9,102,1,1,1,1,'2015-07-20 18:46:17','2015-07-20 18:46:17'),(606,10,102,1,1,1,1,'2015-07-20 18:46:17','2015-07-20 18:46:17'),(607,14,102,1,1,1,1,'2015-07-20 18:46:17','2015-07-20 18:46:17'),(608,16,102,1,1,1,1,'2015-07-20 18:46:17','2015-07-20 18:46:17'),(609,18,102,1,1,1,1,'2015-07-20 18:46:17','2015-07-20 18:46:17'),(610,19,102,1,1,1,1,'2015-07-20 18:46:17','2015-07-20 18:46:17'),(611,22,102,1,1,1,1,'2015-07-20 18:46:17','2015-07-20 18:46:17'),(612,25,102,1,1,1,1,'2015-07-20 18:46:18','2015-07-20 18:46:18'),(613,1,1,0,0,0,0,'2015-07-20 18:46:18','2015-07-20 18:46:18'),(614,2,1,1,0,0,0,'2015-07-20 18:46:18','2015-07-20 18:46:18'),(615,3,1,1,0,0,0,'2015-07-20 18:46:18','2015-07-20 18:46:18'),(616,4,1,0,1,1,0,'2015-07-20 18:46:18','2015-07-20 18:46:18'),(617,5,1,0,0,0,1,'2015-07-20 18:46:18','2015-07-20 18:46:18'),(618,6,1,0,0,0,0,'2015-07-20 18:46:18','2015-07-20 18:46:18'),(619,7,1,1,1,1,1,'2015-07-20 18:46:18','2015-07-20 18:46:18'),(620,8,1,0,0,0,0,'2015-07-20 18:46:18','2015-07-20 18:46:18'),(621,9,1,0,0,0,0,'2015-07-20 18:46:18','2015-07-20 18:46:18'),(622,10,1,0,0,0,0,'2015-07-20 18:46:18','2015-07-20 18:46:18'),(623,11,1,0,0,0,0,'2015-07-20 18:46:18','2015-07-20 18:46:18'),(624,12,1,0,0,0,0,'2015-07-20 18:46:18','2015-07-20 18:46:18'),(625,13,1,0,0,0,0,'2015-07-20 18:46:18','2015-07-20 18:46:18'),(626,14,1,0,0,0,0,'2015-07-20 18:46:18','2015-07-20 18:46:18'),(627,15,1,0,0,0,0,'2015-07-20 18:46:18','2015-07-20 18:46:18'),(628,16,1,0,0,0,0,'2015-07-20 18:46:18','2015-07-20 18:46:18'),(629,17,1,0,0,0,0,'2015-07-20 18:46:18','2015-07-20 18:46:18'),(630,18,1,0,0,0,0,'2015-07-20 18:46:18','2015-07-20 18:46:18'),(631,19,1,0,0,0,0,'2015-07-20 18:46:18','2015-07-20 18:46:18'),(632,20,1,0,0,0,0,'2015-07-20 18:46:18','2015-07-20 18:46:18'),(633,21,1,0,0,0,0,'2015-07-20 18:46:18','2015-07-20 18:46:18'),(634,22,1,0,0,0,0,'2015-07-20 18:46:18','2015-07-20 18:46:18'),(635,23,1,0,0,0,0,'2015-07-20 18:46:18','2015-07-20 18:46:18'),(636,24,1,0,0,0,0,'2015-07-20 18:46:18','2015-07-20 18:46:18'),(637,25,1,0,0,0,0,'2015-07-20 18:46:18','2015-07-20 18:46:18'),(638,26,1,0,0,0,0,'2015-07-20 18:46:18','2015-07-20 18:46:18'),(639,1,103,1,1,1,1,'2015-07-20 18:46:18','2015-07-20 18:46:18'),(640,3,103,1,1,1,1,'2015-07-20 18:46:19','2015-07-20 18:46:19'),(641,5,103,1,1,1,1,'2015-07-20 18:46:19','2015-07-20 18:46:19'),(642,6,103,1,1,1,1,'2015-07-20 18:46:19','2015-07-20 18:46:19'),(643,9,103,0,0,0,0,'2015-07-20 18:46:19','2015-07-20 18:46:19'),(644,10,103,1,1,1,1,'2015-07-20 18:46:19','2015-07-20 18:46:19'),(645,14,103,1,1,1,1,'2015-07-20 18:46:19','2015-07-20 18:46:19'),(646,16,103,1,1,1,1,'2015-07-20 18:46:19','2015-07-20 18:46:19'),(647,18,103,1,1,1,1,'2015-07-20 18:46:19','2015-07-20 18:46:19'),(648,19,103,1,1,1,1,'2015-07-20 18:46:19','2015-07-20 18:46:19'),(649,22,103,1,1,1,1,'2015-07-20 18:46:19','2015-07-20 18:46:19'),(650,25,103,1,1,1,1,'2015-07-20 18:46:19','2015-07-20 18:46:19'),(651,1,2,1,1,1,1,'2015-07-20 18:46:19','2015-07-20 18:46:19'),(652,2,2,1,1,1,1,'2015-07-20 18:46:19','2015-07-20 18:46:19'),(653,3,2,1,1,1,1,'2015-07-20 18:46:19','2015-07-20 18:46:19'),(654,4,2,1,1,1,1,'2015-07-20 18:46:19','2015-07-20 18:46:19'),(655,5,2,1,1,1,1,'2015-07-20 18:46:19','2015-07-20 18:46:19'),(656,6,2,1,1,1,1,'2015-07-20 18:46:20','2015-07-20 18:46:20'),(657,7,2,1,1,1,1,'2015-07-20 18:46:20','2015-07-20 18:46:20'),(658,8,2,1,1,1,1,'2015-07-20 18:46:20','2015-07-20 18:46:20'),(659,9,2,1,1,1,1,'2015-07-20 18:46:20','2015-07-20 18:46:20'),(660,10,2,1,1,1,1,'2015-07-20 18:46:20','2015-07-20 18:46:20'),(661,11,2,1,1,1,1,'2015-07-20 18:46:20','2015-07-20 18:46:20'),(662,12,2,1,1,1,1,'2015-07-20 18:46:20','2015-07-20 18:46:20'),(663,13,2,1,1,1,1,'2015-07-20 18:46:20','2015-07-20 18:46:20'),(664,14,2,1,1,1,1,'2015-07-20 18:46:20','2015-07-20 18:46:20'),(665,15,2,1,1,1,1,'2015-07-20 18:46:20','2015-07-20 18:46:20'),(666,16,2,0,0,0,0,'2015-07-20 18:46:20','2015-07-20 18:46:20'),(667,17,2,1,1,1,1,'2015-07-20 18:46:20','2015-07-20 18:46:20'),(668,18,2,1,1,1,1,'2015-07-20 18:46:20','2015-07-20 18:46:20'),(669,19,2,1,1,1,1,'2015-07-20 18:46:20','2015-07-20 18:46:20'),(670,20,2,1,1,1,1,'2015-07-20 18:46:20','2015-07-20 18:46:20'),(671,21,2,1,1,1,1,'2015-07-20 18:46:20','2015-07-20 18:46:20'),(672,22,2,1,1,1,1,'2015-07-20 18:46:20','2015-07-20 18:46:20'),(673,23,2,1,1,1,1,'2015-07-20 18:46:20','2015-07-20 18:46:20'),(674,24,2,1,1,1,1,'2015-07-20 18:46:20','2015-07-20 18:46:20'),(675,25,2,1,1,1,1,'2015-07-20 18:46:20','2015-07-20 18:46:20'),(676,26,2,1,1,1,1,'2015-07-20 18:46:20','2015-07-20 18:46:20'),(677,1,104,0,0,0,0,'2015-07-20 18:46:20','2015-07-20 18:46:20'),(678,3,104,1,1,1,1,'2015-07-20 18:46:21','2015-07-20 18:46:21'),(679,5,104,1,1,1,1,'2015-07-20 18:46:21','2015-07-20 18:46:21'),(680,6,104,1,1,1,1,'2015-07-20 18:46:21','2015-07-20 18:46:21'),(681,9,104,1,1,1,1,'2015-07-20 18:46:21','2015-07-20 18:46:21'),(682,10,104,1,1,1,1,'2015-07-20 18:46:21','2015-07-20 18:46:21'),(683,14,104,1,1,1,1,'2015-07-20 18:46:21','2015-07-20 18:46:21'),(684,16,104,1,1,1,1,'2015-07-20 18:46:21','2015-07-20 18:46:21'),(685,18,104,1,1,1,1,'2015-07-20 18:46:21','2015-07-20 18:46:21'),(686,19,104,1,1,1,1,'2015-07-20 18:46:21','2015-07-20 18:46:21'),(687,22,104,1,1,1,1,'2015-07-20 18:46:21','2015-07-20 18:46:21'),(688,25,104,1,1,1,1,'2015-07-20 18:46:21','2015-07-20 18:46:21'),(689,1,3,0,0,0,0,'2015-07-20 18:46:21','2015-07-20 18:46:21'),(690,2,3,1,1,1,1,'2015-07-20 18:46:21','2015-07-20 18:46:21'),(691,3,3,1,1,1,1,'2015-07-20 18:46:21','2015-07-20 18:46:21'),(692,4,3,1,1,1,1,'2015-07-20 18:46:21','2015-07-20 18:46:21'),(693,5,3,1,1,1,1,'2015-07-20 18:46:21','2015-07-20 18:46:21'),(694,6,3,1,1,1,1,'2015-07-20 18:46:21','2015-07-20 18:46:21'),(695,7,3,0,0,0,0,'2015-07-20 18:46:21','2015-07-20 18:46:21'),(696,8,3,1,1,1,1,'2015-07-20 18:46:21','2015-07-20 18:46:21'),(697,9,3,0,0,0,0,'2015-07-20 18:46:21','2015-07-20 18:46:21'),(698,10,3,1,1,1,1,'2015-07-20 18:46:21','2015-07-20 18:46:21'),(699,11,3,0,0,0,0,'2015-07-20 18:46:21','2015-07-20 18:46:21'),(700,12,3,0,0,0,0,'2015-07-20 18:46:21','2015-07-20 18:46:21'),(701,13,3,1,1,1,1,'2015-07-20 18:46:21','2015-07-20 18:46:21'),(702,14,3,1,1,1,1,'2015-07-20 18:46:21','2015-07-20 18:46:21'),(703,15,3,1,1,1,1,'2015-07-20 18:46:22','2015-07-20 18:46:22'),(704,16,3,1,1,1,1,'2015-07-20 18:46:22','2015-07-20 18:46:22'),(705,17,3,0,0,0,0,'2015-07-20 18:46:22','2015-07-20 18:46:22'),(706,18,3,1,1,1,1,'2015-07-20 18:46:22','2015-07-20 18:46:22'),(707,19,3,1,1,1,1,'2015-07-20 18:46:22','2015-07-20 18:46:22'),(708,20,3,1,1,1,1,'2015-07-20 18:46:22','2015-07-20 18:46:22'),(709,21,3,1,1,1,1,'2015-07-20 18:46:22','2015-07-20 18:46:22'),(710,22,3,1,1,1,1,'2015-07-20 18:46:22','2015-07-20 18:46:22'),(711,23,3,1,1,1,1,'2015-07-20 18:46:22','2015-07-20 18:46:22'),(712,24,3,1,1,1,1,'2015-07-20 18:46:22','2015-07-20 18:46:22'),(713,25,3,1,1,1,1,'2015-07-20 18:46:22','2015-07-20 18:46:22'),(714,26,3,1,1,1,1,'2015-07-20 18:46:22','2015-07-20 18:46:22'),(715,1,105,0,0,0,0,'2015-07-20 18:46:22','2015-07-20 18:46:22'),(716,3,105,1,1,1,1,'2015-07-20 18:46:22','2015-07-20 18:46:22'),(717,5,105,1,1,1,1,'2015-07-20 18:46:22','2015-07-20 18:46:22'),(718,6,105,1,1,1,1,'2015-07-20 18:46:22','2015-07-20 18:46:22'),(719,9,105,0,0,0,0,'2015-07-20 18:46:22','2015-07-20 18:46:22'),(720,10,105,1,1,1,1,'2015-07-20 18:46:22','2015-07-20 18:46:22'),(721,14,105,1,1,1,1,'2015-07-20 18:46:22','2015-07-20 18:46:22'),(722,16,105,0,1,1,1,'2015-07-20 18:46:22','2015-07-20 18:46:22'),(723,18,105,1,1,1,1,'2015-07-20 18:46:22','2015-07-20 18:46:22'),(724,19,105,1,1,1,1,'2015-07-20 18:46:22','2015-07-20 18:46:22'),(725,22,105,1,1,1,1,'2015-07-20 18:46:23','2015-07-20 18:46:23'),(726,25,105,0,0,0,0,'2015-07-20 18:46:23','2015-07-20 18:46:23'),(727,1,4,0,0,0,0,'2015-07-20 18:46:23','2015-07-20 18:46:23'),(728,2,4,0,0,0,0,'2015-07-20 18:46:23','2015-07-20 18:46:23'),(729,3,4,1,1,1,1,'2015-07-20 18:46:23','2015-07-20 18:46:23'),(730,4,4,1,1,1,1,'2015-07-20 18:46:23','2015-07-20 18:46:23'),(731,5,4,0,0,0,0,'2015-07-20 18:46:23','2015-07-20 18:46:23'),(732,6,4,1,1,1,1,'2015-07-20 18:46:23','2015-07-20 18:46:23'),(733,7,4,1,1,1,1,'2015-07-20 18:46:23','2015-07-20 18:46:23'),(734,8,4,1,1,1,1,'2015-07-20 18:46:23','2015-07-20 18:46:23'),(735,9,4,1,1,1,1,'2015-07-20 18:46:23','2015-07-20 18:46:23'),(736,10,4,1,1,1,1,'2015-07-20 18:46:23','2015-07-20 18:46:23'),(737,11,4,1,1,1,1,'2015-07-20 18:46:23','2015-07-20 18:46:23'),(738,12,4,0,0,0,0,'2015-07-20 18:46:23','2015-07-20 18:46:23'),(739,13,4,1,1,1,1,'2015-07-20 18:46:23','2015-07-20 18:46:23'),(740,14,4,0,0,0,0,'2015-07-20 18:46:24','2015-07-20 18:46:24'),(741,15,4,0,0,0,0,'2015-07-20 18:46:24','2015-07-20 18:46:24'),(742,16,4,0,0,0,0,'2015-07-20 18:46:24','2015-07-20 18:46:24'),(743,17,4,1,1,1,1,'2015-07-20 18:46:24','2015-07-20 18:46:24'),(744,18,4,1,1,1,1,'2015-07-20 18:46:24','2015-07-20 18:46:24'),(745,19,4,1,1,1,1,'2015-07-20 18:46:24','2015-07-20 18:46:24'),(746,20,4,1,1,1,1,'2015-07-20 18:46:24','2015-07-20 18:46:24'),(747,21,4,1,1,1,1,'2015-07-20 18:46:24','2015-07-20 18:46:24'),(748,22,4,1,1,1,1,'2015-07-20 18:46:24','2015-07-20 18:46:24'),(749,23,4,1,1,1,1,'2015-07-20 18:46:24','2015-07-20 18:46:24'),(750,24,4,1,1,1,1,'2015-07-20 18:46:24','2015-07-20 18:46:24'),(751,25,4,1,1,1,1,'2015-07-20 18:46:24','2015-07-20 18:46:24'),(752,26,4,1,1,0,0,'2015-07-20 18:46:24','2015-07-20 18:46:24'),(753,1,106,0,0,0,0,'2015-07-20 18:46:24','2015-07-20 18:46:24'),(754,3,106,1,1,1,1,'2015-07-20 18:46:24','2015-07-20 18:46:24'),(755,5,106,1,1,1,1,'2015-07-20 18:46:24','2015-07-20 18:46:24'),(756,6,106,1,1,1,1,'2015-07-20 18:46:24','2015-07-20 18:46:24'),(757,9,106,1,1,1,1,'2015-07-20 18:46:24','2015-07-20 18:46:24'),(758,10,106,1,1,1,1,'2015-07-20 18:46:24','2015-07-20 18:46:24'),(759,14,106,0,0,0,0,'2015-07-20 18:46:24','2015-07-20 18:46:24'),(760,16,106,0,0,0,0,'2015-07-20 18:46:24','2015-07-20 18:46:24'),(761,18,106,0,0,0,0,'2015-07-20 18:46:24','2015-07-20 18:46:24'),(762,19,106,1,1,1,1,'2015-07-20 18:46:24','2015-07-20 18:46:24'),(763,22,106,0,0,0,0,'2015-07-20 18:46:24','2015-07-20 18:46:24'),(764,25,106,1,1,1,1,'2015-07-20 18:46:24','2015-07-20 18:46:24'),(765,1,5,0,0,0,0,'2015-07-20 18:46:24','2015-07-20 18:46:24'),(766,2,5,1,1,1,1,'2015-07-20 18:46:24','2015-07-20 18:46:24'),(767,3,5,1,1,1,1,'2015-07-20 18:46:25','2015-07-20 18:46:25'),(768,4,5,1,1,1,1,'2015-07-20 18:46:25','2015-07-20 18:46:25'),(769,5,5,1,1,1,1,'2015-07-20 18:46:25','2015-07-20 18:46:25'),(770,6,5,1,1,1,1,'2015-07-20 18:46:25','2015-07-20 18:46:25'),(771,7,5,1,1,1,1,'2015-07-20 18:46:25','2015-07-20 18:46:25'),(772,8,5,1,1,1,1,'2015-07-20 18:46:25','2015-07-20 18:46:25'),(773,9,5,1,1,1,1,'2015-07-20 18:46:25','2015-07-20 18:46:25'),(774,10,5,1,1,1,1,'2015-07-20 18:46:25','2015-07-20 18:46:25'),(775,11,5,1,1,1,1,'2015-07-20 18:46:25','2015-07-20 18:46:25'),(776,12,5,0,0,0,0,'2015-07-20 18:46:25','2015-07-20 18:46:25'),(777,13,5,0,0,0,0,'2015-07-20 18:46:25','2015-07-20 18:46:25'),(778,14,5,1,1,1,1,'2015-07-20 18:46:25','2015-07-20 18:46:25'),(779,15,5,1,1,1,1,'2015-07-20 18:46:25','2015-07-20 18:46:25'),(780,16,5,1,1,1,1,'2015-07-20 18:46:25','2015-07-20 18:46:25'),(781,17,5,1,1,1,1,'2015-07-20 18:46:25','2015-07-20 18:46:25'),(782,18,5,1,1,1,1,'2015-07-20 18:46:25','2015-07-20 18:46:25'),(783,19,5,1,1,1,1,'2015-07-20 18:46:25','2015-07-20 18:46:25'),(784,20,5,1,1,1,1,'2015-07-20 18:46:25','2015-07-20 18:46:25'),(785,21,5,1,1,1,1,'2015-07-20 18:46:25','2015-07-20 18:46:25'),(786,22,5,1,1,1,1,'2015-07-20 18:46:25','2015-07-20 18:46:25'),(787,23,5,1,1,1,1,'2015-07-20 18:46:25','2015-07-20 18:46:25'),(788,24,5,1,1,1,1,'2015-07-20 18:46:25','2015-07-20 18:46:25'),(789,25,5,1,1,1,1,'2015-07-20 18:46:25','2015-07-20 18:46:25'),(790,26,5,1,1,1,1,'2015-07-20 18:46:25','2015-07-20 18:46:25'),(791,1,107,0,0,0,0,'2015-07-20 18:46:25','2015-07-20 18:46:25'),(792,3,107,1,1,1,1,'2015-07-20 18:46:25','2015-07-20 18:46:25'),(793,5,107,1,1,1,1,'2015-07-20 18:46:25','2015-07-20 18:46:25'),(794,6,107,1,1,1,1,'2015-07-20 18:46:25','2015-07-20 18:46:25'),(795,9,107,0,0,0,0,'2015-07-20 18:46:26','2015-07-20 18:46:26'),(796,10,107,0,0,0,0,'2015-07-20 18:46:26','2015-07-20 18:46:26'),(797,14,107,1,1,1,1,'2015-07-20 18:46:26','2015-07-20 18:46:26'),(798,16,107,0,0,0,0,'2015-07-20 18:46:26','2015-07-20 18:46:26'),(799,18,107,1,1,1,1,'2015-07-20 18:46:26','2015-07-20 18:46:26'),(800,19,107,1,1,1,1,'2015-07-20 18:46:26','2015-07-20 18:46:26'),(801,22,107,1,1,1,1,'2015-07-20 18:46:26','2015-07-20 18:46:26'),(802,25,107,1,1,1,1,'2015-07-20 18:46:26','2015-07-20 18:46:26'),(803,1,6,0,0,0,0,'2015-07-20 18:46:26','2015-07-20 18:46:26'),(804,2,6,1,1,1,1,'2015-07-20 18:46:26','2015-07-20 18:46:26'),(805,3,6,1,1,1,1,'2015-07-20 18:46:26','2015-07-20 18:46:26'),(806,4,6,1,1,1,1,'2015-07-20 18:46:26','2015-07-20 18:46:26'),(807,5,6,1,1,1,1,'2015-07-20 18:46:26','2015-07-20 18:46:26'),(808,6,6,1,1,1,1,'2015-07-20 18:46:26','2015-07-20 18:46:26'),(809,7,6,1,1,1,1,'2015-07-20 18:46:26','2015-07-20 18:46:26'),(810,8,6,0,0,0,0,'2015-07-20 18:46:26','2015-07-20 18:46:26'),(811,9,6,0,0,0,0,'2015-07-20 18:46:26','2015-07-20 18:46:26'),(812,10,6,1,1,1,1,'2015-07-20 18:46:26','2015-07-20 18:46:26'),(813,11,6,1,1,1,1,'2015-07-20 18:46:26','2015-07-20 18:46:26'),(814,12,6,0,0,0,0,'2015-07-20 18:46:26','2015-07-20 18:46:26'),(815,13,6,1,1,1,1,'2015-07-20 18:46:26','2015-07-20 18:46:26'),(816,14,6,1,1,1,1,'2015-07-20 18:46:26','2015-07-20 18:46:26'),(817,15,6,1,1,1,1,'2015-07-20 18:46:27','2015-07-20 18:46:27'),(818,16,6,0,0,0,0,'2015-07-20 18:46:27','2015-07-20 18:46:27'),(819,17,6,0,0,0,0,'2015-07-20 18:46:27','2015-07-20 18:46:27'),(820,18,6,1,1,1,1,'2015-07-20 18:46:27','2015-07-20 18:46:27'),(821,19,6,1,1,1,1,'2015-07-20 18:46:27','2015-07-20 18:46:27'),(822,20,6,0,0,0,0,'2015-07-20 18:46:27','2015-07-20 18:46:27'),(823,21,6,1,1,1,1,'2015-07-20 18:46:27','2015-07-20 18:46:27'),(824,22,6,1,1,1,1,'2015-07-20 18:46:27','2015-07-20 18:46:27'),(825,23,6,1,1,1,1,'2015-07-20 18:46:27','2015-07-20 18:46:27'),(826,24,6,1,1,1,1,'2015-07-20 18:46:27','2015-07-20 18:46:27'),(827,25,6,1,1,1,1,'2015-07-20 18:46:27','2015-07-20 18:46:27'),(828,26,6,1,1,1,1,'2015-07-20 18:46:27','2015-07-20 18:46:27'),(829,1,108,0,0,0,0,'2015-07-20 18:46:27','2015-07-20 18:46:27'),(830,3,108,1,1,1,1,'2015-07-20 18:46:27','2015-07-20 18:46:27'),(831,5,108,0,0,0,0,'2015-07-20 18:46:27','2015-07-20 18:46:27'),(832,6,108,1,1,1,1,'2015-07-20 18:46:27','2015-07-20 18:46:27'),(833,9,108,1,1,1,1,'2015-07-20 18:46:27','2015-07-20 18:46:27'),(834,10,108,0,0,0,0,'2015-07-20 18:46:27','2015-07-20 18:46:27'),(835,14,108,1,1,1,1,'2015-07-20 18:46:27','2015-07-20 18:46:27'),(836,16,108,0,0,0,0,'2015-07-20 18:46:27','2015-07-20 18:46:27'),(837,18,108,1,1,1,1,'2015-07-20 18:46:27','2015-07-20 18:46:27'),(838,19,108,0,0,0,0,'2015-07-20 18:46:27','2015-07-20 18:46:27'),(839,22,108,1,1,1,1,'2015-07-20 18:46:27','2015-07-20 18:46:27'),(840,25,108,1,1,1,1,'2015-07-20 18:46:27','2015-07-20 18:46:27'),(841,1,7,0,0,0,0,'2015-07-20 18:46:27','2015-07-20 18:46:27'),(842,2,7,1,1,1,1,'2015-07-20 18:46:27','2015-07-20 18:46:27'),(843,3,7,1,1,1,1,'2015-07-20 18:46:27','2015-07-20 18:46:27'),(844,4,7,1,1,1,1,'2015-07-20 18:46:27','2015-07-20 18:46:27'),(845,5,7,1,1,1,1,'2015-07-20 18:46:28','2015-07-20 18:46:28'),(846,6,7,1,1,1,1,'2015-07-20 18:46:28','2015-07-20 18:46:28'),(847,7,7,1,1,1,1,'2015-07-20 18:46:28','2015-07-20 18:46:28'),(848,8,7,1,1,1,1,'2015-07-20 18:46:28','2015-07-20 18:46:28'),(849,9,7,0,0,0,0,'2015-07-20 18:46:28','2015-07-20 18:46:28'),(850,10,7,1,1,1,1,'2015-07-20 18:46:28','2015-07-20 18:46:28'),(851,11,7,1,1,1,1,'2015-07-20 18:46:28','2015-07-20 18:46:28'),(852,12,7,0,0,0,0,'2015-07-20 18:46:28','2015-07-20 18:46:28'),(853,13,7,1,1,1,1,'2015-07-20 18:46:28','2015-07-20 18:46:28'),(854,14,7,1,1,1,1,'2015-07-20 18:46:28','2015-07-20 18:46:28'),(855,15,7,1,1,1,1,'2015-07-20 18:46:28','2015-07-20 18:46:28'),(856,16,7,0,0,0,0,'2015-07-20 18:46:28','2015-07-20 18:46:28'),(857,17,7,1,1,1,1,'2015-07-20 18:46:28','2015-07-20 18:46:28'),(858,18,7,1,1,1,1,'2015-07-20 18:46:28','2015-07-20 18:46:28'),(859,19,7,1,1,1,1,'2015-07-20 18:46:28','2015-07-20 18:46:28'),(860,20,7,1,1,1,1,'2015-07-20 18:46:28','2015-07-20 18:46:28'),(861,21,7,1,1,1,1,'2015-07-20 18:46:28','2015-07-20 18:46:28'),(862,22,7,1,1,1,1,'2015-07-20 18:46:28','2015-07-20 18:46:28'),(863,23,7,1,1,1,1,'2015-07-20 18:46:28','2015-07-20 18:46:28'),(864,24,7,1,1,1,1,'2015-07-20 18:46:28','2015-07-20 18:46:28'),(865,25,7,1,1,1,1,'2015-07-20 18:46:28','2015-07-20 18:46:28'),(866,26,7,1,1,1,1,'2015-07-20 18:46:29','2015-07-20 18:46:29'),(867,1,109,0,0,0,0,'2015-07-20 18:46:29','2015-07-20 18:46:29'),(868,3,109,1,1,1,1,'2015-07-20 18:46:29','2015-07-20 18:46:29'),(869,5,109,1,1,1,1,'2015-07-20 18:46:29','2015-07-20 18:46:29'),(870,6,109,1,1,1,1,'2015-07-20 18:46:29','2015-07-20 18:46:29'),(871,9,109,1,1,0,0,'2015-07-20 18:46:29','2015-07-20 18:46:29'),(872,10,109,0,0,0,0,'2015-07-20 18:46:29','2015-07-20 18:46:29'),(873,14,109,0,0,0,0,'2015-07-20 18:46:29','2015-07-20 18:46:29'),(874,16,109,0,0,0,0,'2015-07-20 18:46:29','2015-07-20 18:46:29'),(875,18,109,1,1,1,1,'2015-07-20 18:46:29','2015-07-20 18:46:29'),(876,19,109,1,1,1,1,'2015-07-20 18:46:29','2015-07-20 18:46:29'),(877,22,109,1,1,1,1,'2015-07-20 18:46:29','2015-07-20 18:46:29'),(878,25,109,1,1,1,1,'2015-07-20 18:46:29','2015-07-20 18:46:29'),(879,1,8,0,0,0,0,'2015-07-20 18:46:29','2015-07-20 18:46:29'),(880,2,8,1,1,1,1,'2015-07-20 18:46:29','2015-07-20 18:46:29'),(881,3,8,1,1,1,1,'2015-07-20 18:46:29','2015-07-20 18:46:29'),(882,4,8,1,1,1,1,'2015-07-20 18:46:29','2015-07-20 18:46:29'),(883,5,8,1,1,1,1,'2015-07-20 18:46:29','2015-07-20 18:46:29'),(884,6,8,1,1,1,1,'2015-07-20 18:46:29','2015-07-20 18:46:29'),(885,7,8,1,1,1,1,'2015-07-20 18:46:30','2015-07-20 18:46:30'),(886,8,8,1,1,1,1,'2015-07-20 18:46:30','2015-07-20 18:46:30'),(887,9,8,0,0,0,0,'2015-07-20 18:46:30','2015-07-20 18:46:30'),(888,10,8,1,1,1,1,'2015-07-20 18:46:30','2015-07-20 18:46:30'),(889,11,8,1,1,1,1,'2015-07-20 18:46:30','2015-07-20 18:46:30'),(890,12,8,0,0,0,0,'2015-07-20 18:46:30','2015-07-20 18:46:30'),(891,13,8,0,0,0,0,'2015-07-20 18:46:30','2015-07-20 18:46:30'),(892,14,8,1,1,1,1,'2015-07-20 18:46:30','2015-07-20 18:46:30'),(893,15,8,1,1,1,1,'2015-07-20 18:46:30','2015-07-20 18:46:30'),(894,16,8,0,0,0,0,'2015-07-20 18:46:30','2015-07-20 18:46:30'),(895,17,8,1,1,1,1,'2015-07-20 18:46:30','2015-07-20 18:46:30'),(896,18,8,1,1,1,1,'2015-07-20 18:46:30','2015-07-20 18:46:30'),(897,19,8,1,1,1,1,'2015-07-20 18:46:30','2015-07-20 18:46:30'),(898,20,8,1,1,1,1,'2015-07-20 18:46:30','2015-07-20 18:46:30'),(899,21,8,1,1,1,1,'2015-07-20 18:46:30','2015-07-20 18:46:30'),(900,22,8,1,1,1,1,'2015-07-20 18:46:30','2015-07-20 18:46:30'),(901,23,8,1,1,1,1,'2015-07-20 18:46:30','2015-07-20 18:46:30'),(902,24,8,1,1,1,1,'2015-07-20 18:46:30','2015-07-20 18:46:30'),(903,25,8,1,1,1,1,'2015-07-20 18:46:30','2015-07-20 18:46:30'),(904,26,8,1,1,1,1,'2015-07-20 18:46:30','2015-07-20 18:46:30'),(905,1,110,0,0,0,0,'2015-07-20 18:46:30','2015-07-20 18:46:30'),(906,3,110,1,1,1,1,'2015-07-20 18:46:30','2015-07-20 18:46:30'),(907,5,110,1,1,1,1,'2015-07-20 18:46:30','2015-07-20 18:46:30'),(908,6,110,1,1,1,1,'2015-07-20 18:46:30','2015-07-20 18:46:30'),(909,9,110,0,0,0,0,'2015-07-20 18:46:30','2015-07-20 18:46:30'),(910,10,110,1,1,1,1,'2015-07-20 18:46:31','2015-07-20 18:46:31'),(911,14,110,1,1,1,1,'2015-07-20 18:46:31','2015-07-20 18:46:31'),(912,16,110,1,1,1,1,'2015-07-20 18:46:31','2015-07-20 18:46:31'),(913,18,110,1,1,1,1,'2015-07-20 18:46:31','2015-07-20 18:46:31'),(914,19,110,1,1,1,1,'2015-07-20 18:46:31','2015-07-20 18:46:31'),(915,22,110,1,1,1,1,'2015-07-20 18:46:31','2015-07-20 18:46:31'),(916,25,110,1,1,1,1,'2015-07-20 18:46:31','2015-07-20 18:46:31'),(917,1,9,0,0,0,0,'2015-07-20 18:46:31','2015-07-20 18:46:31'),(918,2,9,1,1,1,1,'2015-07-20 18:46:31','2015-07-20 18:46:31'),(919,3,9,1,1,1,1,'2015-07-20 18:46:31','2015-07-20 18:46:31'),(920,4,9,1,1,1,1,'2015-07-20 18:46:31','2015-07-20 18:46:31'),(921,5,9,1,1,1,1,'2015-07-20 18:46:31','2015-07-20 18:46:31'),(922,6,9,1,1,1,1,'2015-07-20 18:46:31','2015-07-20 18:46:31'),(923,7,9,1,1,1,1,'2015-07-20 18:46:31','2015-07-20 18:46:31'),(924,8,9,1,1,1,1,'2015-07-20 18:46:31','2015-07-20 18:46:31'),(925,9,9,1,1,1,1,'2015-07-20 18:46:31','2015-07-20 18:46:31'),(926,10,9,1,1,1,1,'2015-07-20 18:46:31','2015-07-20 18:46:31'),(927,11,9,1,1,1,1,'2015-07-20 18:46:31','2015-07-20 18:46:31'),(928,12,9,0,0,0,0,'2015-07-20 18:46:31','2015-07-20 18:46:31'),(929,13,9,1,1,1,1,'2015-07-20 18:46:31','2015-07-20 18:46:31'),(930,14,9,1,1,1,1,'2015-07-20 18:46:31','2015-07-20 18:46:31'),(931,15,9,1,1,1,1,'2015-07-20 18:46:31','2015-07-20 18:46:31'),(932,16,9,1,1,1,1,'2015-07-20 18:46:31','2015-07-20 18:46:31'),(933,17,9,1,1,1,1,'2015-07-20 18:46:31','2015-07-20 18:46:31'),(934,18,9,1,1,1,1,'2015-07-20 18:46:31','2015-07-20 18:46:31'),(935,19,9,1,1,1,1,'2015-07-20 18:46:31','2015-07-20 18:46:31'),(936,20,9,1,1,1,1,'2015-07-20 18:46:32','2015-07-20 18:46:32'),(937,21,9,1,1,1,1,'2015-07-20 18:46:32','2015-07-20 18:46:32'),(938,22,9,1,1,1,1,'2015-07-20 18:46:32','2015-07-20 18:46:32'),(939,23,9,1,1,1,1,'2015-07-20 18:46:32','2015-07-20 18:46:32'),(940,24,9,1,1,1,1,'2015-07-20 18:46:32','2015-07-20 18:46:32'),(941,25,9,1,1,1,1,'2015-07-20 18:46:32','2015-07-20 18:46:32'),(942,26,9,1,1,1,1,'2015-07-20 18:46:32','2015-07-20 18:46:32'),(943,1,111,0,0,0,0,'2015-07-20 18:46:32','2015-07-20 18:46:32'),(944,3,111,1,1,1,1,'2015-07-20 18:46:32','2015-07-20 18:46:32'),(945,5,111,1,1,1,1,'2015-07-20 18:46:32','2015-07-20 18:46:32'),(946,6,111,1,1,1,1,'2015-07-20 18:46:32','2015-07-20 18:46:32'),(947,9,111,0,0,0,0,'2015-07-20 18:46:32','2015-07-20 18:46:32'),(948,10,111,1,1,1,1,'2015-07-20 18:46:32','2015-07-20 18:46:32'),(949,14,111,0,0,0,0,'2015-07-20 18:46:32','2015-07-20 18:46:32'),(950,16,111,1,1,1,1,'2015-07-20 18:46:32','2015-07-20 18:46:32'),(951,18,111,1,1,1,1,'2015-07-20 18:46:32','2015-07-20 18:46:32'),(952,19,111,0,0,0,0,'2015-07-20 18:46:32','2015-07-20 18:46:32'),(953,22,111,1,1,1,1,'2015-07-20 18:46:32','2015-07-20 18:46:32'),(954,25,111,1,1,1,1,'2015-07-20 18:46:32','2015-07-20 18:46:32'),(955,1,10,0,0,0,0,'2015-07-20 18:46:32','2015-07-20 18:46:32'),(956,2,10,1,1,1,1,'2015-07-20 18:46:33','2015-07-20 18:46:33'),(957,3,10,1,1,1,1,'2015-07-20 18:46:33','2015-07-20 18:46:33'),(958,4,10,1,1,1,1,'2015-07-20 18:46:33','2015-07-20 18:46:33'),(959,5,10,0,0,0,0,'2015-07-20 18:46:33','2015-07-20 18:46:33'),(960,6,10,1,1,1,1,'2015-07-20 18:46:33','2015-07-20 18:46:33'),(961,7,10,1,1,1,1,'2015-07-20 18:46:33','2015-07-20 18:46:33'),(962,8,10,0,0,0,0,'2015-07-20 18:46:33','2015-07-20 18:46:33'),(963,9,10,0,0,0,0,'2015-07-20 18:46:33','2015-07-20 18:46:33'),(964,10,10,1,1,1,1,'2015-07-20 18:46:33','2015-07-20 18:46:33'),(965,11,10,1,1,1,1,'2015-07-20 18:46:33','2015-07-20 18:46:33'),(966,12,10,0,0,0,0,'2015-07-20 18:46:33','2015-07-20 18:46:33'),(967,13,10,0,0,0,0,'2015-07-20 18:46:33','2015-07-20 18:46:33'),(968,14,10,1,1,1,1,'2015-07-20 18:46:33','2015-07-20 18:46:33'),(969,15,10,1,1,1,1,'2015-07-20 18:46:33','2015-07-20 18:46:33'),(970,16,10,1,1,1,1,'2015-07-20 18:46:33','2015-07-20 18:46:33'),(971,17,10,1,1,1,1,'2015-07-20 18:46:33','2015-07-20 18:46:33'),(972,18,10,1,1,1,1,'2015-07-20 18:46:33','2015-07-20 18:46:33'),(973,19,10,0,0,0,0,'2015-07-20 18:46:33','2015-07-20 18:46:33'),(974,20,10,1,1,1,1,'2015-07-20 18:46:33','2015-07-20 18:46:33'),(975,21,10,1,1,1,1,'2015-07-20 18:46:33','2015-07-20 18:46:33'),(976,22,10,1,1,1,1,'2015-07-20 18:46:33','2015-07-20 18:46:33'),(977,23,10,1,1,1,1,'2015-07-20 18:46:33','2015-07-20 18:46:33'),(978,24,10,1,1,1,1,'2015-07-20 18:46:33','2015-07-20 18:46:33'),(979,25,10,1,1,1,1,'2015-07-20 18:46:33','2015-07-20 18:46:33'),(980,26,10,1,1,1,1,'2015-07-20 18:46:34','2015-07-20 18:46:34'),(981,1,112,0,0,0,0,'2015-07-20 18:46:34','2015-07-20 18:46:34'),(982,3,112,1,1,1,1,'2015-07-20 18:46:34','2015-07-20 18:46:34'),(983,5,112,1,1,1,1,'2015-07-20 18:46:34','2015-07-20 18:46:34'),(984,6,112,0,0,0,0,'2015-07-20 18:46:34','2015-07-20 18:46:34'),(985,9,112,0,0,0,0,'2015-07-20 18:46:34','2015-07-20 18:46:34'),(986,10,112,1,1,1,1,'2015-07-20 18:46:34','2015-07-20 18:46:34'),(987,14,112,1,1,1,1,'2015-07-20 18:46:34','2015-07-20 18:46:34'),(988,16,112,1,1,1,1,'2015-07-20 18:46:34','2015-07-20 18:46:34'),(989,18,112,1,1,1,1,'2015-07-20 18:46:34','2015-07-20 18:46:34'),(990,19,112,0,0,0,0,'2015-07-20 18:46:34','2015-07-20 18:46:34'),(991,22,112,1,1,1,1,'2015-07-20 18:46:34','2015-07-20 18:46:34'),(992,25,112,1,1,1,1,'2015-07-20 18:46:34','2015-07-20 18:46:34'),(993,1,11,0,0,0,0,'2015-07-20 18:46:34','2015-07-20 18:46:34'),(994,2,11,1,1,1,1,'2015-07-20 18:46:34','2015-07-20 18:46:34'),(995,3,11,1,1,1,1,'2015-07-20 18:46:34','2015-07-20 18:46:34'),(996,4,11,1,1,1,1,'2015-07-20 18:46:34','2015-07-20 18:46:34'),(997,5,11,1,1,1,1,'2015-07-20 18:46:34','2015-07-20 18:46:34'),(998,6,11,1,1,1,1,'2015-07-20 18:46:34','2015-07-20 18:46:34'),(999,7,11,1,1,1,1,'2015-07-20 18:46:34','2015-07-20 18:46:34'),(1000,8,11,1,1,1,1,'2015-07-20 18:46:34','2015-07-20 18:46:34');
/*!40000 ALTER TABLE `chamadas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cursos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sigla` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `coordenador_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cursos_coordenador_id_foreign` (`coordenador_id`),
  CONSTRAINT `cursos_coordenador_id_foreign` FOREIGN KEY (`coordenador_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES (1,'AUTOMAÇÃO INDUSTRIAL','AI','2015-07-20 18:45:38','2015-07-20 18:45:38',55),(2,'ANÁLISE E DESENVOLVIMENTO DE SISTEMAS','ADS','2015-07-20 18:45:38','2015-07-20 18:45:38',49),(3,'REDES DE COMPUTADORES','RC','2015-07-20 18:45:38','2015-07-20 18:45:38',54),(4,'SISTEMAS EMBARCADOS','SE','2015-07-20 18:45:38','2015-07-20 18:45:38',55),(5,'SISTEMAS DE TELECOMUNICAÇÕES','ST','2015-07-20 18:45:38','2015-07-20 18:45:38',54);
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursos_alunos`
--

DROP TABLE IF EXISTS `cursos_alunos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cursos_alunos` (
  `curso_id` int(10) unsigned NOT NULL,
  `aluno_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`curso_id`,`aluno_id`),
  KEY `cursos_alunos_aluno_id_foreign` (`aluno_id`),
  CONSTRAINT `cursos_alunos_aluno_id_foreign` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`),
  CONSTRAINT `cursos_alunos_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos_alunos`
--

LOCK TABLES `cursos_alunos` WRITE;
/*!40000 ALTER TABLE `cursos_alunos` DISABLE KEYS */;
INSERT INTO `cursos_alunos` VALUES (2,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,6,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,10,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,13,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,14,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,15,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,17,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,18,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,19,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,22,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,25,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,26,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,27,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,28,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,29,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,30,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,31,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,32,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,33,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,34,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,35,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,36,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,37,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,38,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,39,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,40,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,41,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,43,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,44,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,45,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,48,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,12,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,20,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,21,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,23,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,24,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,42,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,46,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,47,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `cursos_alunos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursos_unidades_curriculares`
--

DROP TABLE IF EXISTS `cursos_unidades_curriculares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cursos_unidades_curriculares` (
  `curso_id` int(10) unsigned NOT NULL,
  `uni_curr_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`curso_id`,`uni_curr_id`),
  KEY `cursos_unidades_curriculares_uni_curr_id_foreign` (`uni_curr_id`),
  CONSTRAINT `cursos_unidades_curriculares_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`),
  CONSTRAINT `cursos_unidades_curriculares_uni_curr_id_foreign` FOREIGN KEY (`uni_curr_id`) REFERENCES `unidades_curriculares` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos_unidades_curriculares`
--

LOCK TABLES `cursos_unidades_curriculares` WRITE;
/*!40000 ALTER TABLE `cursos_unidades_curriculares` DISABLE KEYS */;
INSERT INTO `cursos_unidades_curriculares` VALUES (2,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `cursos_unidades_curriculares` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diarios_envios`
--

DROP TABLE IF EXISTS `diarios_envios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diarios_envios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `diario_id` int(10) unsigned NOT NULL,
  `professor_id` int(10) unsigned NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `diarios_envios_diario_id_foreign` (`diario_id`),
  KEY `diarios_envios_professor_id_foreign` (`professor_id`),
  CONSTRAINT `diarios_envios_diario_id_foreign` FOREIGN KEY (`diario_id`) REFERENCES `status_diarios` (`id`),
  CONSTRAINT `diarios_envios_professor_id_foreign` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diarios_envios`
--

LOCK TABLES `diarios_envios` WRITE;
/*!40000 ALTER TABLE `diarios_envios` DISABLE KEYS */;
/*!40000 ALTER TABLE `diarios_envios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dispositivos_aluno`
--

DROP TABLE IF EXISTS `dispositivos_aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dispositivos_aluno` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_dispositivo_id` int(10) unsigned NOT NULL,
  `aluno_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `dispositivos_aluno_id_codigo_unique` (`id`,`codigo`),
  KEY `dispositivos_aluno_tipo_dispositivo_id_foreign` (`tipo_dispositivo_id`),
  KEY `dispositivos_aluno_aluno_id_foreign` (`aluno_id`),
  CONSTRAINT `dispositivos_aluno_aluno_id_foreign` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`),
  CONSTRAINT `dispositivos_aluno_tipo_dispositivo_id_foreign` FOREIGN KEY (`tipo_dispositivo_id`) REFERENCES `tipos_dispositivos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dispositivos_aluno`
--

LOCK TABLES `dispositivos_aluno` WRITE;
/*!40000 ALTER TABLE `dispositivos_aluno` DISABLE KEYS */;
INSERT INTO `dispositivos_aluno` VALUES (1,'111111',3,1,'2015-07-20 18:45:37','2015-07-20 18:45:37'),(2,'222222',3,2,'2015-07-20 18:45:37','2015-07-20 18:45:37'),(3,'333333',3,3,'2015-07-20 18:45:37','2015-07-20 18:45:37'),(4,'444444',3,4,'2015-07-20 18:45:37','2015-07-20 18:45:37'),(5,'555555',3,5,'2015-07-20 18:45:37','2015-07-20 18:45:37'),(6,'666666',3,6,'2015-07-20 18:45:37','2015-07-20 18:45:37'),(7,'777777',3,7,'2015-07-20 18:45:37','2015-07-20 18:45:37'),(8,'888888',3,8,'2015-07-20 18:45:37','2015-07-20 18:45:37'),(9,'999999',3,9,'2015-07-20 18:45:37','2015-07-20 18:45:37');
/*!40000 ALTER TABLE `dispositivos_aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dispositivos_ambiente`
--

DROP TABLE IF EXISTS `dispositivos_ambiente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dispositivos_ambiente` (
  `ambiente_id` int(10) unsigned NOT NULL,
  `oauth_client_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ambiente_id`,`oauth_client_id`),
  KEY `dispositivos_ambiente_oauth_client_id_foreign` (`oauth_client_id`),
  CONSTRAINT `dispositivos_ambiente_ambiente_id_foreign` FOREIGN KEY (`ambiente_id`) REFERENCES `ambientes` (`id`),
  CONSTRAINT `dispositivos_ambiente_oauth_client_id_foreign` FOREIGN KEY (`oauth_client_id`) REFERENCES `oauth_clients` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dispositivos_ambiente`
--

LOCK TABLES `dispositivos_ambiente` WRITE;
/*!40000 ALTER TABLE `dispositivos_ambiente` DISABLE KEYS */;
INSERT INTO `dispositivos_ambiente` VALUES (1,'client1id','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'client3id','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'client4id','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `dispositivos_ambiente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `heartbeats_dispositivo`
--

DROP TABLE IF EXISTS `heartbeats_dispositivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `heartbeats_dispositivo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `oauth_client_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `heartbeats_dispositivo_oauth_client_id_foreign` (`oauth_client_id`),
  CONSTRAINT `heartbeats_dispositivo_oauth_client_id_foreign` FOREIGN KEY (`oauth_client_id`) REFERENCES `oauth_clients` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `heartbeats_dispositivo`
--

LOCK TABLES `heartbeats_dispositivo` WRITE;
/*!40000 ALTER TABLE `heartbeats_dispositivo` DISABLE KEYS */;
INSERT INTO `heartbeats_dispositivo` VALUES (1,'client1id','2015-07-10 17:01:00','2015-07-10 17:01:00'),(2,'client1id','2015-07-10 17:03:00','2015-07-10 17:03:00'),(3,'client1id','2015-07-10 17:06:00','2015-07-10 17:06:00'),(4,'client1id','2015-07-10 17:10:00','2015-07-10 17:10:00'),(5,'client1id','2015-07-10 17:15:00','2015-07-10 17:15:00'),(6,'client1id','2015-07-10 17:21:00','2015-07-10 17:21:00'),(7,'client1id','2015-07-10 17:28:00','2015-07-10 17:28:00'),(8,'client1id','2015-07-10 17:36:00','2015-07-10 17:36:00'),(9,'client1id','2015-07-10 17:45:00','2015-07-10 17:45:00'),(10,'client1id','2015-07-10 17:55:00','2015-07-10 17:55:00'),(11,'client1id','2015-07-10 18:06:00','2015-07-10 18:06:00'),(12,'client1id','2015-07-10 18:18:00','2015-07-10 18:18:00'),(13,'client1id','2015-07-10 18:31:00','2015-07-10 18:31:00'),(14,'client1id','2015-07-10 18:45:00','2015-07-10 18:45:00'),(15,'client1id','2015-07-10 19:00:00','2015-07-10 19:00:00'),(16,'client1id','2015-07-10 19:16:00','2015-07-10 19:16:00'),(17,'client1id','2015-07-10 19:33:00','2015-07-10 19:33:00'),(18,'client1id','2015-07-10 19:51:00','2015-07-10 19:51:00'),(19,'client1id','2015-07-10 20:10:00','2015-07-10 20:10:00'),(20,'client1id','2015-07-10 20:30:00','2015-07-10 20:30:00'),(21,'client1id','2015-07-10 20:51:00','2015-07-10 20:51:00'),(22,'client1id','2015-07-10 21:13:00','2015-07-10 21:13:00'),(23,'client1id','2015-07-10 21:36:00','2015-07-10 21:36:00'),(24,'client1id','2015-07-10 22:00:00','2015-07-10 22:00:00'),(25,'client1id','2015-07-10 22:25:00','2015-07-10 22:25:00'),(26,'client1id','2015-07-10 22:51:00','2015-07-10 22:51:00'),(27,'client1id','2015-07-10 23:18:00','2015-07-10 23:18:00'),(28,'client1id','2015-07-10 23:46:00','2015-07-10 23:46:00'),(29,'client1id','2015-07-11 00:15:00','2015-07-11 00:15:00'),(30,'client1id','2015-07-11 00:45:00','2015-07-11 00:45:00'),(31,'client1id','2015-07-11 01:16:00','2015-07-11 01:16:00'),(32,'client1id','2015-07-11 01:48:00','2015-07-11 01:48:00'),(33,'client1id','2015-07-11 02:21:00','2015-07-11 02:21:00'),(34,'client1id','2015-07-11 02:55:00','2015-07-11 02:55:00'),(35,'client1id','2015-07-11 03:30:00','2015-07-11 03:30:00'),(36,'client1id','2015-07-11 04:06:00','2015-07-11 04:06:00'),(37,'client1id','2015-07-11 04:43:00','2015-07-11 04:43:00'),(38,'client1id','2015-07-11 05:21:00','2015-07-11 05:21:00'),(39,'client1id','2015-07-11 06:00:00','2015-07-11 06:00:00'),(40,'client1id','2015-07-11 06:40:00','2015-07-11 06:40:00'),(41,'client3id','2015-07-10 17:01:00','2015-07-10 17:01:00'),(42,'client3id','2015-07-10 17:03:00','2015-07-10 17:03:00'),(43,'client3id','2015-07-10 17:06:00','2015-07-10 17:06:00'),(44,'client3id','2015-07-10 17:10:00','2015-07-10 17:10:00'),(45,'client3id','2015-07-10 17:15:00','2015-07-10 17:15:00'),(46,'client3id','2015-07-10 17:21:00','2015-07-10 17:21:00'),(47,'client3id','2015-07-10 17:28:00','2015-07-10 17:28:00'),(48,'client3id','2015-07-10 17:36:00','2015-07-10 17:36:00'),(49,'client3id','2015-07-10 17:45:00','2015-07-10 17:45:00'),(50,'client3id','2015-07-10 17:55:00','2015-07-10 17:55:00'),(51,'client3id','2015-07-10 18:06:00','2015-07-10 18:06:00'),(52,'client3id','2015-07-10 18:18:00','2015-07-10 18:18:00'),(53,'client3id','2015-07-10 18:31:00','2015-07-10 18:31:00'),(54,'client3id','2015-07-10 18:45:00','2015-07-10 18:45:00'),(55,'client3id','2015-07-10 19:00:00','2015-07-10 19:00:00'),(56,'client3id','2015-07-10 19:16:00','2015-07-10 19:16:00'),(57,'client3id','2015-07-10 19:33:00','2015-07-10 19:33:00'),(58,'client3id','2015-07-10 19:51:00','2015-07-10 19:51:00'),(59,'client3id','2015-07-10 20:10:00','2015-07-10 20:10:00'),(60,'client3id','2015-07-10 20:30:00','2015-07-10 20:30:00'),(61,'client3id','2015-07-10 20:51:00','2015-07-10 20:51:00'),(62,'client3id','2015-07-10 21:13:00','2015-07-10 21:13:00'),(63,'client3id','2015-07-10 21:36:00','2015-07-10 21:36:00'),(64,'client3id','2015-07-10 22:00:00','2015-07-10 22:00:00'),(65,'client3id','2015-07-10 22:25:00','2015-07-10 22:25:00'),(66,'client3id','2015-07-10 22:51:00','2015-07-10 22:51:00'),(67,'client3id','2015-07-10 23:18:00','2015-07-10 23:18:00'),(68,'client3id','2015-07-10 23:46:00','2015-07-10 23:46:00'),(69,'client3id','2015-07-11 00:15:00','2015-07-11 00:15:00'),(70,'client3id','2015-07-11 00:45:00','2015-07-11 00:45:00'),(71,'client3id','2015-07-11 01:16:00','2015-07-11 01:16:00'),(72,'client3id','2015-07-11 01:48:00','2015-07-11 01:48:00'),(73,'client3id','2015-07-11 02:21:00','2015-07-11 02:21:00'),(74,'client3id','2015-07-11 02:55:00','2015-07-11 02:55:00'),(75,'client3id','2015-07-11 03:30:00','2015-07-11 03:30:00'),(76,'client3id','2015-07-11 04:06:00','2015-07-11 04:06:00'),(77,'client3id','2015-07-11 04:43:00','2015-07-11 04:43:00'),(78,'client3id','2015-07-11 05:21:00','2015-07-11 05:21:00'),(79,'client3id','2015-07-11 06:00:00','2015-07-11 06:00:00'),(80,'client3id','2015-07-11 06:40:00','2015-07-11 06:40:00'),(81,'client4id','2015-07-10 17:01:00','2015-07-10 17:01:00'),(82,'client4id','2015-07-10 17:03:00','2015-07-10 17:03:00'),(83,'client4id','2015-07-10 17:06:00','2015-07-10 17:06:00'),(84,'client4id','2015-07-10 17:10:00','2015-07-10 17:10:00'),(85,'client4id','2015-07-10 17:15:00','2015-07-10 17:15:00'),(86,'client4id','2015-07-10 17:21:00','2015-07-10 17:21:00'),(87,'client4id','2015-07-10 17:28:00','2015-07-10 17:28:00'),(88,'client4id','2015-07-10 17:36:00','2015-07-10 17:36:00'),(89,'client4id','2015-07-10 17:45:00','2015-07-10 17:45:00'),(90,'client4id','2015-07-10 17:55:00','2015-07-10 17:55:00'),(91,'client4id','2015-07-10 18:06:00','2015-07-10 18:06:00'),(92,'client4id','2015-07-10 18:18:00','2015-07-10 18:18:00'),(93,'client4id','2015-07-10 18:31:00','2015-07-10 18:31:00'),(94,'client4id','2015-07-10 18:45:00','2015-07-10 18:45:00'),(95,'client4id','2015-07-10 19:00:00','2015-07-10 19:00:00'),(96,'client4id','2015-07-10 19:16:00','2015-07-10 19:16:00'),(97,'client4id','2015-07-10 19:33:00','2015-07-10 19:33:00'),(98,'client4id','2015-07-10 19:51:00','2015-07-10 19:51:00'),(99,'client4id','2015-07-10 20:10:00','2015-07-10 20:10:00'),(100,'client4id','2015-07-10 20:30:00','2015-07-10 20:30:00'),(101,'client4id','2015-07-10 20:51:00','2015-07-10 20:51:00'),(102,'client4id','2015-07-10 21:13:00','2015-07-10 21:13:00'),(103,'client4id','2015-07-10 21:36:00','2015-07-10 21:36:00'),(104,'client4id','2015-07-10 22:00:00','2015-07-10 22:00:00'),(105,'client4id','2015-07-10 22:25:00','2015-07-10 22:25:00'),(106,'client4id','2015-07-10 22:51:00','2015-07-10 22:51:00'),(107,'client4id','2015-07-10 23:18:00','2015-07-10 23:18:00'),(108,'client4id','2015-07-10 23:46:00','2015-07-10 23:46:00'),(109,'client4id','2015-07-11 00:15:00','2015-07-11 00:15:00'),(110,'client4id','2015-07-11 00:45:00','2015-07-11 00:45:00'),(111,'client4id','2015-07-11 01:16:00','2015-07-11 01:16:00'),(112,'client4id','2015-07-11 01:48:00','2015-07-11 01:48:00'),(113,'client4id','2015-07-11 02:21:00','2015-07-11 02:21:00'),(114,'client4id','2015-07-11 02:55:00','2015-07-11 02:55:00'),(115,'client4id','2015-07-11 03:30:00','2015-07-11 03:30:00'),(116,'client4id','2015-07-11 04:06:00','2015-07-11 04:06:00'),(117,'client4id','2015-07-11 04:43:00','2015-07-11 04:43:00'),(118,'client4id','2015-07-11 05:21:00','2015-07-11 05:21:00'),(119,'client4id','2015-07-11 06:00:00','2015-07-11 06:00:00'),(120,'client4id','2015-07-11 06:40:00','2015-07-11 06:40:00'),(121,'client2id','2015-07-10 17:01:00','2015-07-10 17:01:00'),(122,'client2id','2015-07-10 17:03:00','2015-07-10 17:03:00'),(123,'client2id','2015-07-10 17:06:00','2015-07-10 17:06:00'),(124,'client2id','2015-07-10 17:10:00','2015-07-10 17:10:00'),(125,'client2id','2015-07-10 17:15:00','2015-07-10 17:15:00'),(126,'client2id','2015-07-10 17:21:00','2015-07-10 17:21:00'),(127,'client2id','2015-07-10 17:28:00','2015-07-10 17:28:00'),(128,'client2id','2015-07-10 17:36:00','2015-07-10 17:36:00'),(129,'client2id','2015-07-10 17:45:00','2015-07-10 17:45:00'),(130,'client2id','2015-07-10 17:55:00','2015-07-10 17:55:00'),(131,'client2id','2015-07-10 18:06:00','2015-07-10 18:06:00'),(132,'client2id','2015-07-10 18:18:00','2015-07-10 18:18:00'),(133,'client2id','2015-07-10 18:31:00','2015-07-10 18:31:00'),(134,'client2id','2015-07-10 18:45:00','2015-07-10 18:45:00'),(135,'client2id','2015-07-10 19:00:00','2015-07-10 19:00:00'),(136,'client2id','2015-07-10 19:16:00','2015-07-10 19:16:00'),(137,'client2id','2015-07-10 19:33:00','2015-07-10 19:33:00'),(138,'client2id','2015-07-10 19:51:00','2015-07-10 19:51:00'),(139,'client2id','2015-07-10 20:10:00','2015-07-10 20:10:00'),(140,'client2id','2015-07-10 20:30:00','2015-07-10 20:30:00'),(141,'client2id','2015-07-10 20:51:00','2015-07-10 20:51:00'),(142,'client2id','2015-07-10 21:13:00','2015-07-10 21:13:00'),(143,'client2id','2015-07-10 21:36:00','2015-07-10 21:36:00'),(144,'client2id','2015-07-10 22:00:00','2015-07-10 22:00:00'),(145,'client2id','2015-07-10 22:25:00','2015-07-10 22:25:00'),(146,'client2id','2015-07-10 22:51:00','2015-07-10 22:51:00'),(147,'client2id','2015-07-10 23:18:00','2015-07-10 23:18:00'),(148,'client2id','2015-07-10 23:46:00','2015-07-10 23:46:00'),(149,'client2id','2015-07-11 00:15:00','2015-07-11 00:15:00'),(150,'client2id','2015-07-11 00:45:00','2015-07-11 00:45:00'),(151,'client2id','2015-07-11 01:16:00','2015-07-11 01:16:00'),(152,'client2id','2015-07-11 01:48:00','2015-07-11 01:48:00'),(153,'client2id','2015-07-11 02:21:00','2015-07-11 02:21:00'),(154,'client2id','2015-07-11 02:55:00','2015-07-11 02:55:00'),(155,'client2id','2015-07-11 03:30:00','2015-07-11 03:30:00'),(156,'client2id','2015-07-11 04:06:00','2015-07-11 04:06:00'),(157,'client2id','2015-07-11 04:43:00','2015-07-11 04:43:00'),(158,'client2id','2015-07-11 05:21:00','2015-07-11 05:21:00'),(159,'client2id','2015-07-11 06:00:00','2015-07-11 06:00:00'),(160,'client2id','2015-07-11 06:40:00','2015-07-11 06:40:00');
/*!40000 ALTER TABLE `heartbeats_dispositivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_04_24_110151_create_oauth_scopes_table',1),('2014_04_24_110304_create_oauth_grants_table',1),('2014_04_24_110403_create_oauth_grant_scopes_table',1),('2014_04_24_110459_create_oauth_clients_table',1),('2014_04_24_110557_create_oauth_client_endpoints_table',1),('2014_04_24_110705_create_oauth_client_scopes_table',1),('2014_04_24_110817_create_oauth_client_grants_table',1),('2014_04_24_111002_create_oauth_sessions_table',1),('2014_04_24_111109_create_oauth_session_scopes_table',1),('2014_04_24_111254_create_oauth_auth_codes_table',1),('2014_04_24_111403_create_oauth_auth_code_scopes_table',1),('2014_04_24_111518_create_oauth_access_tokens_table',1),('2014_04_24_111657_create_oauth_access_token_scopes_table',1),('2014_04_24_111810_create_oauth_refresh_tokens_table',1),('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2015_05_13_203712_create_tipos_usuarios_table',1),('2015_05_13_203905_add_tipo_usuario_id_to_usuarios',1),('2015_05_13_204103_create_professores_table',1),('2015_05_13_205424_create_alunos_table',1),('2015_05_13_205736_create_cursos_table',1),('2015_05_13_210102_create_unidades_curriculares_table',1),('2015_05_13_210222_create_turmas_table',1),('2015_05_13_210604_create_alunos_turmas_table',1),('2015_05_13_210808_create_cursos_unidades_curriculares_table',1),('2015_05_13_211235_create_professores_turmas_table',1),('2015_05_13_211408_create_cursos_alunos_table',1),('2015_05_13_211606_create_aulas_table',1),('2015_05_13_211945_create_chamadas_table',1),('2015_05_13_212447_create_status_diarios_table',1),('2015_05_14_180140_add_curso_origem_to_professores',1),('2015_05_15_115104_add_fields_to_aulas_table',1),('2015_05_22_122856_entrust_setup_tables',1),('2015_05_22_123044_remove_tipo_usuario_table',1),('2015_05_26_153726_add_curso_origem_alunos_turmas_table',1),('2015_05_26_154851_add_turno__column_to_turmas_table',1),('2015_05_26_155647_add_corrdenador_to_cursos_table',1),('2015_06_15_163041_create_diarios_envios_table',1),('2015_06_17_190218_change_professores_curso_origem_id',1),('2015_06_18_154537_change_cursos_coordenador_id',1),('2015_06_30_123217_create_tipos_ambiente_table',1),('2015_06_30_123225_create_ambientes_table',1),('2015_06_30_123313_create_tipos_dispositivos_aluno_table',1),('2015_06_30_123320_create_dispositivos_aluno_table',1),('2015_06_30_123332_create_dispositivos_ambiente_table',1),('2015_06_30_123907_add_column_ambiente_default_turmas_table',1),('2015_06_30_123933_add_column_ambiente_aulas_table',1),('2015_06_30_123955_add_column_horario_turmas_table',1),('2015_06_30_142653_add_columns_horario_aula_table',1),('2015_07_09_120957_rename_tipos_dispositivos_aluno_table',1),('2015_07_09_124241_create_heartbeats_dispositivo_table',1),('2015_07_09_124308_add_tipo_dispositivo_field_to_oauth_clients_table',1),('2015_07_15_123933_add_column_professor_aulas_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_token_scopes`
--

DROP TABLE IF EXISTS `oauth_access_token_scopes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_access_token_scopes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `access_token_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `scope_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `oauth_access_token_scopes_access_token_id_index` (`access_token_id`),
  KEY `oauth_access_token_scopes_scope_id_index` (`scope_id`),
  CONSTRAINT `oauth_access_token_scopes_access_token_id_foreign` FOREIGN KEY (`access_token_id`) REFERENCES `oauth_access_tokens` (`id`) ON DELETE CASCADE,
  CONSTRAINT `oauth_access_token_scopes_scope_id_foreign` FOREIGN KEY (`scope_id`) REFERENCES `oauth_scopes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_token_scopes`
--

LOCK TABLES `oauth_access_token_scopes` WRITE;
/*!40000 ALTER TABLE `oauth_access_token_scopes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_access_token_scopes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `session_id` int(10) unsigned NOT NULL,
  `expire_time` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `oauth_access_tokens_id_session_id_unique` (`id`,`session_id`),
  KEY `oauth_access_tokens_session_id_index` (`session_id`),
  CONSTRAINT `oauth_access_tokens_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `oauth_sessions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_code_scopes`
--

DROP TABLE IF EXISTS `oauth_auth_code_scopes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_auth_code_scopes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `auth_code_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `scope_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `oauth_auth_code_scopes_auth_code_id_index` (`auth_code_id`),
  KEY `oauth_auth_code_scopes_scope_id_index` (`scope_id`),
  CONSTRAINT `oauth_auth_code_scopes_auth_code_id_foreign` FOREIGN KEY (`auth_code_id`) REFERENCES `oauth_auth_codes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `oauth_auth_code_scopes_scope_id_foreign` FOREIGN KEY (`scope_id`) REFERENCES `oauth_scopes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_code_scopes`
--

LOCK TABLES `oauth_auth_code_scopes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_code_scopes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_code_scopes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `session_id` int(10) unsigned NOT NULL,
  `redirect_uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expire_time` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_session_id_index` (`session_id`),
  CONSTRAINT `oauth_auth_codes_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `oauth_sessions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_client_endpoints`
--

DROP TABLE IF EXISTS `oauth_client_endpoints`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_client_endpoints` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `redirect_uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `oauth_client_endpoints_client_id_redirect_uri_unique` (`client_id`,`redirect_uri`),
  CONSTRAINT `oauth_client_endpoints_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `oauth_clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_client_endpoints`
--

LOCK TABLES `oauth_client_endpoints` WRITE;
/*!40000 ALTER TABLE `oauth_client_endpoints` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_client_endpoints` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_client_grants`
--

DROP TABLE IF EXISTS `oauth_client_grants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_client_grants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `grant_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `oauth_client_grants_client_id_index` (`client_id`),
  KEY `oauth_client_grants_grant_id_index` (`grant_id`),
  CONSTRAINT `oauth_client_grants_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `oauth_clients` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `oauth_client_grants_grant_id_foreign` FOREIGN KEY (`grant_id`) REFERENCES `oauth_grants` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_client_grants`
--

LOCK TABLES `oauth_client_grants` WRITE;
/*!40000 ALTER TABLE `oauth_client_grants` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_client_grants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_client_scopes`
--

DROP TABLE IF EXISTS `oauth_client_scopes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_client_scopes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `scope_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `oauth_client_scopes_client_id_index` (`client_id`),
  KEY `oauth_client_scopes_scope_id_index` (`scope_id`),
  CONSTRAINT `oauth_client_scopes_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `oauth_clients` (`id`) ON DELETE CASCADE,
  CONSTRAINT `oauth_client_scopes_scope_id_foreign` FOREIGN KEY (`scope_id`) REFERENCES `oauth_scopes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_client_scopes`
--

LOCK TABLES `oauth_client_scopes` WRITE;
/*!40000 ALTER TABLE `oauth_client_scopes` DISABLE KEYS */;
INSERT INTO `oauth_client_scopes` VALUES (1,'client1id','write-chamada','2015-07-20 18:45:03','2015-07-20 18:45:03'),(2,'client3id','write-chamada','2015-07-20 18:45:05','2015-07-20 18:45:05'),(3,'client4id','write-chamada','2015-07-20 18:45:06','2015-07-20 18:45:06'),(4,'client2id','read-agenda','2015-07-20 18:45:09','2015-07-20 18:45:09'),(5,'client2id','read-usuarios','2015-07-20 18:45:09','2015-07-20 18:45:09');
/*!40000 ALTER TABLE `oauth_client_scopes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_clients` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `secret` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tipo_dispositivo_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `oauth_clients_id_secret_unique` (`id`,`secret`),
  KEY `oauth_clients_tipo_dispositivo_id_foreign` (`tipo_dispositivo_id`),
  CONSTRAINT `oauth_clients_tipo_dispositivo_id_foreign` FOREIGN KEY (`tipo_dispositivo_id`) REFERENCES `tipos_dispositivos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` VALUES ('client1id','client1secret','client1','2015-07-20 18:45:03','2015-07-20 18:45:03',1),('client2id','client2secret','client2','2015-07-20 18:45:09','2015-07-20 18:45:09',2),('client3id','client3secret','client3','2015-07-20 18:45:05','2015-07-20 18:45:05',1),('client4id','client4secret','client4','2015-07-20 18:45:06','2015-07-20 18:45:06',1);
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_grant_scopes`
--

DROP TABLE IF EXISTS `oauth_grant_scopes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_grant_scopes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `grant_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `scope_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `oauth_grant_scopes_grant_id_index` (`grant_id`),
  KEY `oauth_grant_scopes_scope_id_index` (`scope_id`),
  CONSTRAINT `oauth_grant_scopes_grant_id_foreign` FOREIGN KEY (`grant_id`) REFERENCES `oauth_grants` (`id`) ON DELETE CASCADE,
  CONSTRAINT `oauth_grant_scopes_scope_id_foreign` FOREIGN KEY (`scope_id`) REFERENCES `oauth_scopes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_grant_scopes`
--

LOCK TABLES `oauth_grant_scopes` WRITE;
/*!40000 ALTER TABLE `oauth_grant_scopes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_grant_scopes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_grants`
--

DROP TABLE IF EXISTS `oauth_grants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_grants` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_grants`
--

LOCK TABLES `oauth_grants` WRITE;
/*!40000 ALTER TABLE `oauth_grants` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_grants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `access_token_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `expire_time` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`access_token_id`),
  UNIQUE KEY `oauth_refresh_tokens_id_unique` (`id`),
  CONSTRAINT `oauth_refresh_tokens_access_token_id_foreign` FOREIGN KEY (`access_token_id`) REFERENCES `oauth_access_tokens` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_scopes`
--

DROP TABLE IF EXISTS `oauth_scopes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_scopes` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_scopes`
--

LOCK TABLES `oauth_scopes` WRITE;
/*!40000 ALTER TABLE `oauth_scopes` DISABLE KEYS */;
INSERT INTO `oauth_scopes` VALUES ('read-agenda','Permissão para ler a agenda letiva','2015-07-20 18:45:02','2015-07-20 18:45:02'),('read-usuarios','Permissão para ler informações dos usuários','2015-07-20 18:45:02','2015-07-20 18:45:02'),('write-chamada','Permissão para escrever na chamada','2015-07-20 18:45:02','2015-07-20 18:45:02');
/*!40000 ALTER TABLE `oauth_scopes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_session_scopes`
--

DROP TABLE IF EXISTS `oauth_session_scopes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_session_scopes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` int(10) unsigned NOT NULL,
  `scope_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `oauth_session_scopes_session_id_index` (`session_id`),
  KEY `oauth_session_scopes_scope_id_index` (`scope_id`),
  CONSTRAINT `oauth_session_scopes_scope_id_foreign` FOREIGN KEY (`scope_id`) REFERENCES `oauth_scopes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `oauth_session_scopes_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `oauth_sessions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_session_scopes`
--

LOCK TABLES `oauth_session_scopes` WRITE;
/*!40000 ALTER TABLE `oauth_session_scopes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_session_scopes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_sessions`
--

DROP TABLE IF EXISTS `oauth_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_sessions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `owner_type` enum('client','user') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `owner_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_redirect_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `oauth_sessions_client_id_owner_type_owner_id_index` (`client_id`,`owner_type`,`owner_id`),
  CONSTRAINT `oauth_sessions_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `oauth_clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_sessions`
--

LOCK TABLES `oauth_sessions` WRITE;
/*!40000 ALTER TABLE `oauth_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (33,1),(36,1),(33,2),(34,2),(35,2),(36,2),(37,2),(38,2),(39,2),(40,2),(41,2),(42,2),(46,2),(47,2),(48,2),(49,2),(62,2),(66,2),(70,2),(71,2),(76,2),(77,2),(1,3),(2,3),(3,3),(4,3),(5,3),(6,3),(7,3),(8,3),(9,3),(10,3),(11,3),(12,3),(13,3),(14,3),(15,3),(16,3),(17,3),(18,3),(19,3),(20,3),(21,3),(22,3),(23,3),(24,3),(25,3),(26,3),(27,3),(28,3),(29,3),(30,3),(31,3),(32,3),(43,3),(44,3),(45,3),(49,3),(50,3),(51,3),(52,3),(53,3),(54,3),(55,3),(56,3),(57,3),(58,3),(59,3),(60,3),(61,3),(63,3),(64,3),(65,3),(70,3),(71,3),(76,3),(77,3),(1,4),(2,4),(3,4),(4,4),(5,4),(6,4),(7,4),(8,4),(9,4),(10,4),(11,4),(12,4),(13,4),(14,4),(15,4),(16,4),(17,4),(18,4),(19,4),(20,4),(21,4),(22,4),(23,4),(24,4),(25,4),(26,4),(27,4),(28,4),(29,4),(30,4),(31,4),(32,4),(43,4),(44,4),(45,4),(49,4),(50,4),(51,4),(52,4),(53,4),(54,4),(55,4),(56,4),(57,4),(58,4),(59,4),(60,4),(61,4),(63,4),(64,4),(65,4),(67,4),(68,4),(69,4),(70,4),(71,4),(72,4),(73,4),(74,4),(75,4),(76,4),(77,4),(78,4),(79,4),(80,4),(81,4),(82,4),(83,4),(84,4),(85,4),(86,4),(87,4),(88,4),(89,4),(90,4),(91,4),(92,4),(93,4),(94,4),(95,4),(96,4),(97,4),(98,4),(99,4),(100,4),(101,4),(102,4),(103,4),(104,4),(105,4),(106,4);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'create-aluno',NULL,NULL,'2015-07-20 18:45:16','2015-07-20 18:45:16'),(2,'edit-aluno',NULL,NULL,'2015-07-20 18:45:16','2015-07-20 18:45:16'),(3,'view-aluno',NULL,NULL,'2015-07-20 18:45:16','2015-07-20 18:45:16'),(4,'list-alunos',NULL,NULL,'2015-07-20 18:45:16','2015-07-20 18:45:16'),(5,'delete-aluno',NULL,NULL,'2015-07-20 18:45:16','2015-07-20 18:45:16'),(6,'create-professor',NULL,NULL,'2015-07-20 18:45:16','2015-07-20 18:45:16'),(7,'edit-professor',NULL,NULL,'2015-07-20 18:45:16','2015-07-20 18:45:16'),(8,'view-professor',NULL,NULL,'2015-07-20 18:45:16','2015-07-20 18:45:16'),(9,'delete-professor',NULL,NULL,'2015-07-20 18:45:16','2015-07-20 18:45:16'),(10,'list-professor',NULL,NULL,'2015-07-20 18:45:16','2015-07-20 18:45:16'),(11,'create-coordenador',NULL,NULL,'2015-07-20 18:45:17','2015-07-20 18:45:17'),(12,'edit-coordenador',NULL,NULL,'2015-07-20 18:45:17','2015-07-20 18:45:17'),(13,'view-coordenador',NULL,NULL,'2015-07-20 18:45:17','2015-07-20 18:45:17'),(14,'list-coordenador',NULL,NULL,'2015-07-20 18:45:17','2015-07-20 18:45:17'),(15,'create-unidade-curricular',NULL,NULL,'2015-07-20 18:45:17','2015-07-20 18:45:17'),(16,'edit-unidade-curricular',NULL,NULL,'2015-07-20 18:45:17','2015-07-20 18:45:17'),(17,'delete-unidade-curricular',NULL,NULL,'2015-07-20 18:45:17','2015-07-20 18:45:17'),(18,'view-unidade-curricular',NULL,NULL,'2015-07-20 18:45:17','2015-07-20 18:45:17'),(19,'list-unidade-curricular',NULL,NULL,'2015-07-20 18:45:18','2015-07-20 18:45:18'),(20,'create-turma',NULL,NULL,'2015-07-20 18:45:18','2015-07-20 18:45:18'),(21,'edit-turma',NULL,NULL,'2015-07-20 18:45:18','2015-07-20 18:45:18'),(22,'view-turma',NULL,NULL,'2015-07-20 18:45:18','2015-07-20 18:45:18'),(23,'delete-turma',NULL,NULL,'2015-07-20 18:45:18','2015-07-20 18:45:18'),(24,'list-turma',NULL,NULL,'2015-07-20 18:45:18','2015-07-20 18:45:18'),(25,'view-controle-faltas',NULL,NULL,'2015-07-20 18:45:18','2015-07-20 18:45:18'),(26,'create-aula',NULL,NULL,'2015-07-20 18:45:19','2015-07-20 18:45:19'),(27,'edit-aula',NULL,NULL,'2015-07-20 18:45:19','2015-07-20 18:45:19'),(28,'view-aula',NULL,NULL,'2015-07-20 18:45:19','2015-07-20 18:45:19'),(29,'delete-aula',NULL,NULL,'2015-07-20 18:45:19','2015-07-20 18:45:19'),(30,'list-aula',NULL,NULL,'2015-07-20 18:45:19','2015-07-20 18:45:19'),(31,'view-chamada',NULL,NULL,'2015-07-20 18:45:19','2015-07-20 18:45:19'),(32,'edit-chamada',NULL,NULL,'2015-07-20 18:45:19','2015-07-20 18:45:19'),(33,'view-own-turma',NULL,NULL,'2015-07-20 18:45:19','2015-07-20 18:45:19'),(34,'edit-own-turma',NULL,NULL,'2015-07-20 18:45:19','2015-07-20 18:45:19'),(35,'view-own-controle-faltas',NULL,NULL,'2015-07-20 18:45:19','2015-07-20 18:45:19'),(36,'view-own-aula',NULL,NULL,'2015-07-20 18:45:20','2015-07-20 18:45:20'),(37,'edit-own-aula',NULL,NULL,'2015-07-20 18:45:20','2015-07-20 18:45:20'),(38,'list-own-aulas',NULL,NULL,'2015-07-20 18:45:20','2015-07-20 18:45:20'),(39,'delete-own-aula',NULL,NULL,'2015-07-20 18:45:20','2015-07-20 18:45:20'),(40,'create-own-aula',NULL,NULL,'2015-07-20 18:45:20','2015-07-20 18:45:20'),(41,'view-own-chamada',NULL,NULL,'2015-07-20 18:45:20','2015-07-20 18:45:20'),(42,'edit-own-chamada',NULL,NULL,'2015-07-20 18:45:20','2015-07-20 18:45:20'),(43,'export-diario',NULL,NULL,'2015-07-20 18:45:20','2015-07-20 18:45:20'),(44,'send-diario',NULL,NULL,'2015-07-20 18:45:20','2015-07-20 18:45:20'),(45,'close-diario',NULL,NULL,'2015-07-20 18:45:20','2015-07-20 18:45:20'),(46,'export-own-diario',NULL,NULL,'2015-07-20 18:45:21','2015-07-20 18:45:21'),(47,'send-own-diario',NULL,NULL,'2015-07-20 18:45:21','2015-07-20 18:45:21'),(48,'close-own-diario',NULL,NULL,'2015-07-20 18:45:21','2015-07-20 18:45:21'),(49,'import-excel',NULL,NULL,'2015-07-20 18:45:21','2015-07-20 18:45:21'),(50,'create-curso',NULL,NULL,'2015-07-20 18:45:21','2015-07-20 18:45:21'),(51,'edit-curso',NULL,NULL,'2015-07-20 18:45:21','2015-07-20 18:45:21'),(52,'view-curso',NULL,NULL,'2015-07-20 18:45:21','2015-07-20 18:45:21'),(53,'delete-curso',NULL,NULL,'2015-07-20 18:45:21','2015-07-20 18:45:21'),(54,'list-cursos',NULL,NULL,'2015-07-20 18:45:21','2015-07-20 18:45:21'),(55,'attach-curso-uc',NULL,NULL,'2015-07-20 18:45:22','2015-07-20 18:45:22'),(56,'detach-curso-uc',NULL,NULL,'2015-07-20 18:45:22','2015-07-20 18:45:22'),(57,'list-cursos-uc',NULL,NULL,'2015-07-20 18:45:22','2015-07-20 18:45:22'),(58,'attach-aluno-turma',NULL,NULL,'2015-07-20 18:45:22','2015-07-20 18:45:22'),(59,'update-aluno-turma',NULL,NULL,'2015-07-20 18:45:22','2015-07-20 18:45:22'),(60,'detach-aluno-turma',NULL,NULL,'2015-07-20 18:45:22','2015-07-20 18:45:22'),(61,'list-alunos-turma',NULL,NULL,'2015-07-20 18:45:22','2015-07-20 18:45:22'),(62,'list-alunos-own-turma',NULL,NULL,'2015-07-20 18:45:23','2015-07-20 18:45:23'),(63,'attach-professor-turma',NULL,NULL,'2015-07-20 18:45:23','2015-07-20 18:45:23'),(64,'detach-professor-turma',NULL,NULL,'2015-07-20 18:45:23','2015-07-20 18:45:23'),(65,'list-professores-turma',NULL,NULL,'2015-07-20 18:45:23','2015-07-20 18:45:23'),(66,'list-professores-own-turma',NULL,NULL,'2015-07-20 18:45:23','2015-07-20 18:45:23'),(67,'create-ambiente',NULL,NULL,'2015-07-20 18:45:23','2015-07-20 18:45:23'),(68,'edit-ambiente',NULL,NULL,'2015-07-20 18:45:24','2015-07-20 18:45:24'),(69,'delete-ambiente',NULL,NULL,'2015-07-20 18:45:24','2015-07-20 18:45:24'),(70,'view-ambiente',NULL,NULL,'2015-07-20 18:45:24','2015-07-20 18:45:24'),(71,'list-ambientes',NULL,NULL,'2015-07-20 18:45:24','2015-07-20 18:45:24'),(72,'view-ambientes-page',NULL,NULL,'2015-07-20 18:45:24','2015-07-20 18:45:24'),(73,'create-tipo-ambiente',NULL,NULL,'2015-07-20 18:45:24','2015-07-20 18:45:24'),(74,'edit-tipo-ambiente',NULL,NULL,'2015-07-20 18:45:24','2015-07-20 18:45:24'),(75,'delete-tipo-ambiente',NULL,NULL,'2015-07-20 18:45:24','2015-07-20 18:45:24'),(76,'view-tipo-ambiente',NULL,NULL,'2015-07-20 18:45:24','2015-07-20 18:45:24'),(77,'list-tipos-ambiente',NULL,NULL,'2015-07-20 18:45:24','2015-07-20 18:45:24'),(78,'create-dispositivo',NULL,NULL,'2015-07-20 18:45:25','2015-07-20 18:45:25'),(79,'edit-dispositivo',NULL,NULL,'2015-07-20 18:45:25','2015-07-20 18:45:25'),(80,'delete-dispositivo',NULL,NULL,'2015-07-20 18:45:25','2015-07-20 18:45:25'),(81,'view-dispositivo',NULL,NULL,'2015-07-20 18:45:25','2015-07-20 18:45:25'),(82,'list-dispositivos',NULL,NULL,'2015-07-20 18:45:25','2015-07-20 18:45:25'),(83,'view-dispositivos-page',NULL,NULL,'2015-07-20 18:45:25','2015-07-20 18:45:25'),(84,'create-tipo-dispositivo',NULL,NULL,'2015-07-20 18:45:25','2015-07-20 18:45:25'),(85,'edit-tipo-dispositivo',NULL,NULL,'2015-07-20 18:45:25','2015-07-20 18:45:25'),(86,'delete-tipo-dispositivo',NULL,NULL,'2015-07-20 18:45:26','2015-07-20 18:45:26'),(87,'view-tipo-dispositivo',NULL,NULL,'2015-07-20 18:45:26','2015-07-20 18:45:26'),(88,'list-tipos-dispositivo',NULL,NULL,'2015-07-20 18:45:26','2015-07-20 18:45:26'),(89,'list-escopos',NULL,NULL,'2015-07-20 18:45:26','2015-07-20 18:45:26'),(90,'create-heartbeats',NULL,NULL,'2015-07-20 18:45:26','2015-07-20 18:45:26'),(91,'edit-heartbeats',NULL,NULL,'2015-07-20 18:45:26','2015-07-20 18:45:26'),(92,'delete-heartbeats',NULL,NULL,'2015-07-20 18:45:26','2015-07-20 18:45:26'),(93,'view-heartbeats',NULL,NULL,'2015-07-20 18:45:26','2015-07-20 18:45:26'),(94,'list-heartbeats',NULL,NULL,'2015-07-20 18:45:26','2015-07-20 18:45:26'),(95,'create-usuario',NULL,NULL,'2015-07-20 18:45:26','2015-07-20 18:45:26'),(96,'edit-usuario',NULL,NULL,'2015-07-20 18:45:26','2015-07-20 18:45:26'),(97,'delete-usuario',NULL,NULL,'2015-07-20 18:45:26','2015-07-20 18:45:26'),(98,'view-usuario',NULL,NULL,'2015-07-20 18:45:26','2015-07-20 18:45:26'),(99,'list-usuarios',NULL,NULL,'2015-07-20 18:45:26','2015-07-20 18:45:26'),(100,'view-usuarios-page',NULL,NULL,'2015-07-20 18:45:27','2015-07-20 18:45:27'),(101,'create-tipo-usuario',NULL,NULL,'2015-07-20 18:45:27','2015-07-20 18:45:27'),(102,'edit-tipo-usuario',NULL,NULL,'2015-07-20 18:45:27','2015-07-20 18:45:27'),(103,'delete-tipo-usuario',NULL,NULL,'2015-07-20 18:45:27','2015-07-20 18:45:27'),(104,'view-tipo-usuario',NULL,NULL,'2015-07-20 18:45:27','2015-07-20 18:45:27'),(105,'list-tipos-usuario',NULL,NULL,'2015-07-20 18:45:27','2015-07-20 18:45:27'),(106,'view-tipos-usuario-page',NULL,NULL,'2015-07-20 18:45:27','2015-07-20 18:45:27');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professores`
--

DROP TABLE IF EXISTS `professores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professores` (
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `curso_origem_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `professores_curso_origem_id_foreign` (`curso_origem_id`),
  CONSTRAINT `professores_curso_origem_id_foreign` FOREIGN KEY (`curso_origem_id`) REFERENCES `cursos` (`id`),
  CONSTRAINT `professores_id_foreign` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professores`
--

LOCK TABLES `professores` WRITE;
/*!40000 ALTER TABLE `professores` DISABLE KEYS */;
INSERT INTO `professores` VALUES (49,'2015-07-20 18:45:38','2015-07-20 18:45:38',2),(50,'2015-07-20 18:45:39','2015-07-20 18:45:39',2),(51,'2015-07-20 18:45:39','2015-07-20 18:45:39',2),(52,'2015-07-20 18:45:39','2015-07-20 18:45:39',3),(53,'2015-07-20 18:45:39','2015-07-20 18:45:39',2),(54,'2015-07-20 18:45:39','2015-07-20 18:45:39',5),(55,'2015-07-20 18:45:40','2015-07-20 18:45:40',1);
/*!40000 ALTER TABLE `professores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professores_turmas`
--

DROP TABLE IF EXISTS `professores_turmas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professores_turmas` (
  `professor_id` int(10) unsigned NOT NULL,
  `turma_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`professor_id`,`turma_id`),
  KEY `professores_turmas_turma_id_foreign` (`turma_id`),
  CONSTRAINT `professores_turmas_professor_id_foreign` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`),
  CONSTRAINT `professores_turmas_turma_id_foreign` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professores_turmas`
--

LOCK TABLES `professores_turmas` WRITE;
/*!40000 ALTER TABLE `professores_turmas` DISABLE KEYS */;
INSERT INTO `professores_turmas` VALUES (49,2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(49,4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(49,5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(50,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(50,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(50,6,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(51,1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `professores_turmas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1),(47,1),(48,1),(49,2),(50,2),(51,2),(52,2),(53,2),(54,2),(55,2),(49,3),(54,3),(55,3),(56,4);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'aluno','Aluno',NULL,'2015-07-20 18:45:15','2015-07-20 18:45:15'),(2,'professor','Professor',NULL,'2015-07-20 18:45:15','2015-07-20 18:45:15'),(3,'coordenador','Coordenador',NULL,'2015-07-20 18:45:16','2015-07-20 18:45:16'),(4,'admin','Administrador',NULL,'2015-07-20 18:45:16','2015-07-20 18:45:16');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_diarios`
--

DROP TABLE IF EXISTS `status_diarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_diarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `turma_id` int(10) unsigned NOT NULL,
  `professor_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `status_diarios_turma_id_foreign` (`turma_id`),
  KEY `status_diarios_professor_id_foreign` (`professor_id`),
  CONSTRAINT `status_diarios_professor_id_foreign` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`),
  CONSTRAINT `status_diarios_turma_id_foreign` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_diarios`
--

LOCK TABLES `status_diarios` WRITE;
/*!40000 ALTER TABLE `status_diarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `status_diarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_ambiente`
--

DROP TABLE IF EXISTS `tipos_ambiente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipos_ambiente` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_ambiente`
--

LOCK TABLES `tipos_ambiente` WRITE;
/*!40000 ALTER TABLE `tipos_ambiente` DISABLE KEYS */;
INSERT INTO `tipos_ambiente` VALUES (1,'sala de aula','2015-07-20 18:45:12','2015-07-20 18:45:12'),(2,'laboratório','2015-07-20 18:45:15','2015-07-20 18:45:15');
/*!40000 ALTER TABLE `tipos_ambiente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_dispositivos`
--

DROP TABLE IF EXISTS `tipos_dispositivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipos_dispositivos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_dispositivos`
--

LOCK TABLES `tipos_dispositivos` WRITE;
/*!40000 ALTER TABLE `tipos_dispositivos` DISABLE KEYS */;
INSERT INTO `tipos_dispositivos` VALUES (1,'arduino','2015-07-20 18:45:03','2015-07-20 18:45:03'),(2,'sistema','2015-07-20 18:45:09','2015-07-20 18:45:09'),(3,'RFID Card','2015-07-20 18:45:37','2015-07-20 18:45:37');
/*!40000 ALTER TABLE `tipos_dispositivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turmas`
--

DROP TABLE IF EXISTS `turmas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turmas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `unidade_curricular_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `turno` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Noite',
  `ambiente_default_id` int(10) unsigned DEFAULT NULL,
  `horario_inicio` time NOT NULL,
  `horario_fim` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `turmas_unidade_curricular_id_foreign` (`unidade_curricular_id`),
  KEY `turmas_ambiente_default_id_foreign` (`ambiente_default_id`),
  CONSTRAINT `turmas_ambiente_default_id_foreign` FOREIGN KEY (`ambiente_default_id`) REFERENCES `ambientes` (`id`),
  CONSTRAINT `turmas_unidade_curricular_id_foreign` FOREIGN KEY (`unidade_curricular_id`) REFERENCES `unidades_curriculares` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turmas`
--

LOCK TABLES `turmas` WRITE;
/*!40000 ALTER TABLE `turmas` DISABLE KEYS */;
INSERT INTO `turmas` VALUES (1,'S032N','2015-02-19','2015-07-14',3,'2015-07-20 18:45:40','2015-07-20 18:45:40','Noite',1,'18:30:00','22:50:00'),(2,'S049','2014-07-31','2014-12-18',1,'2015-07-20 18:45:40','2015-07-20 18:45:40','Noite',2,'18:30:00','22:50:00'),(3,'S049N','2015-02-19','2015-07-14',1,'2015-07-20 18:45:40','2015-07-20 18:45:40','Noite',3,'18:30:00','22:50:00'),(4,'S075N','2014-07-31','2014-12-18',5,'2015-07-20 18:45:40','2015-07-20 18:45:40','Noite',4,'18:30:00','22:50:00'),(5,'S087N','2014-02-17','2014-07-15',2,'2015-07-20 18:45:40','2015-07-20 18:45:40','Noite',12,'18:30:00','22:50:00'),(6,'S091N','2015-02-19','2015-07-14',4,'2015-07-20 18:45:40','2015-07-20 18:45:40','Noite',11,'18:30:00','22:50:00');
/*!40000 ALTER TABLE `turmas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidades_curriculares`
--

DROP TABLE IF EXISTS `unidades_curriculares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidades_curriculares` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `carga_horaria` int(11) NOT NULL,
  `sigla` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidades_curriculares`
--

LOCK TABLES `unidades_curriculares` WRITE;
/*!40000 ALTER TABLE `unidades_curriculares` DISABLE KEYS */;
INSERT INTO `unidades_curriculares` VALUES (1,'S049 - Modelagem de Banco de Dados',70,'S049','2015-07-20 18:45:40','2015-07-20 18:45:40'),(2,'S087- Sistemas Operacionais',70,'S087','2015-07-20 18:45:40','2015-07-20 18:45:40'),(3,'S032 - Fundamentos de Sistemas de Informação',70,'S032','2015-07-20 18:45:40','2015-07-20 18:45:40'),(4,'S091 - Técnicas de Programação',70,'S091','2015-07-20 18:45:40','2015-07-20 18:45:40'),(5,'S075 - Sistema de Gerenciamento de Banco de Dados',70,'S075','2015-07-20 18:45:40','2015-07-20 18:45:40');
/*!40000 ALTER TABLE `unidades_curriculares` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `matricula` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuarios_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'15726','ABNER BORDA FONSECA','abner_borda_fonseca@gmail.com','$2y$10$0EopQGmgPoQblQxIiONRIO4aK8xFczUkU2zPGhGa2Jq0rG1eESqgS',NULL,'2015-07-20 18:45:27','2015-07-20 18:45:27'),(2,'15722','ADRIAN RUBILAR LEMES CAETANO','adrian_rubilar_lemes_caetano@gmail.com','$2y$10$qRCLafA94RWDESeIgBYjHOXGQxeKywhnNaqnRWOoUSOkawHOBWOAu',NULL,'2015-07-20 18:45:27','2015-07-20 18:45:27'),(3,'20569','ALEXANDRE GABIATTI VIEIRA','alexandre_gabiatti_vieira@gmail.com','$2y$10$NpT4NcZrm2z/JV20VhuWiusUpQUR0cXbHOff.Vwj7d3m61SKRaSnC',NULL,'2015-07-20 18:45:27','2015-07-20 18:45:27'),(4,'16049','ALEXSANDRO GIOVANNI DA SILVA DIAS','alexsandro_giovanni_da_silva_dias@gmail.com','$2y$10$PLdGIBoXmcIJX2GAYpm09eCzs1444a..pRKya75LCbXXtclnNFW2u',NULL,'2015-07-20 18:45:28','2015-07-20 18:45:28'),(5,'20628','ANA CARLA MESSIAS DE MOURA','ana_carla_messias_de_moura@gmail.com','$2y$10$Tm1Y.f/kzyvt2m76bJ9xhenoPBbozolyi39XuYdNhdR.qT1XGlzgC',NULL,'2015-07-20 18:45:28','2015-07-20 18:45:28'),(6,'20531','ANGELO VICTOR ISRAEL MUNIZ','angelo_victor_israel_muniz@gmail.com','$2y$10$jjvDdeknlTNF8bJ6DJWN0eYKeKsYDMK02uRM4YPJqtp//ALMA4w4C',NULL,'2015-07-20 18:45:28','2015-07-20 18:45:28'),(7,'20579','BRUNO DA SILVA BRIXIUS','bruno_da_silva_brixius@gmail.com','$2y$10$YIFtt4508YQV/goo59myK.3Gj4XCEoPPmucP61LYfohJpZ2G.fjXq',NULL,'2015-07-20 18:45:28','2015-07-20 18:45:28'),(8,'17486','CRISTIANO DE MOURA','cristiano_de_moura@gmail.com','$2y$10$aTCQFAGh7uWp9ZwEO.gdfujqle8kvSgPlWRrnokFw9hbg5hNPeP5u',NULL,'2015-07-20 18:45:29','2015-07-20 18:45:29'),(9,'20624','DANIEL OLIVEIRA RODRIGUES','daniel_oliveira_rodrigues@gmail.com','$2y$10$0wyey6arFcANLjTCz5Xry.eSK0HEHCvSK9QESDHmEXSa9hNyqu5Ku',NULL,'2015-07-20 18:45:29','2015-07-20 18:45:29'),(10,'15717','DIONATA LEONEL MACHADO FERRAZ','dionata_leonel_machado_ferraz@gmail.com','$2y$10$9mc2yQlyjWONCOY5JhwmVux5YpP04phEeFlxPXpZA8DKSJIDAcI9G',NULL,'2015-07-20 18:45:29','2015-07-20 18:45:29'),(11,'14186','DOUGLAS COSTA DA ROCHA','douglas_costa_da_rocha@gmail.com','$2y$10$CPTSy1BOMW3YnZKqzP4k3.elly4txG5glDe1MafnB3ixD0eG6vc6e',NULL,'2015-07-20 18:45:29','2015-07-20 18:45:29'),(12,'17509','FABIANO BORBA VIANA FEIJÓ','fabiano_borba_viana_feijÓ@gmail.com','$2y$10$KWzy7iEaFPdwkOvmZh13JuwKnhUNsD2UyvG60WOFQSC5MjMlUcRSK',NULL,'2015-07-20 18:45:30','2015-07-20 18:45:30'),(13,'19024','FELIPE DA SILVA PACHECO','felipe_da_silva_pacheco@gmail.com','$2y$10$QPM20aJuZUCC3uGVLNOJmObiQ.NASmLv8aIZmmNz3abR8IGUFaxai',NULL,'2015-07-20 18:45:30','2015-07-20 18:45:30'),(14,'19026','FERNANDO LEITE SZEZECINSKI','fernando_leite_szezecinski@gmail.com','$2y$10$osd6.ObX0XtxHq7CM8wzwOPBIyoMRiTIaL1LUsaQsexX.EZfpZcde',NULL,'2015-07-20 18:45:30','2015-07-20 18:45:30'),(15,'15639','GUILHERME PEREIRA SILVEIRA','guilherme_pereira_silveira@gmail.com','$2y$10$Q0xe.uXQvc/PvOjUQ88bIuUwq/w9WuYhQX.V2I9uOI6Wc.e2Sz4Z6',NULL,'2015-07-20 18:45:30','2015-07-20 18:45:30'),(16,'19020','LEONARDO GOMES MONTEIRO MIGUEIS CERQUEIRA','leonardo_gomes_monteiro_migueis_cerqueira@gmail.com','$2y$10$3R/7gbKJ6ftaNFa7Qa59W.uDSyBtFF9pw5y7h100vlrGa/AMJtK8y',NULL,'2015-07-20 18:45:30','2015-07-20 18:45:30'),(17,'8059','LOGAN OLIVEIRA LOUREIRO','logan_oliveira_loureiro@gmail.com','$2y$10$RNH5sZeJC.YRXpoLPL7QAeapahdXeFZZ6D/NBukK5ju33rarFmGJO',NULL,'2015-07-20 18:45:30','2015-07-20 18:45:30'),(18,'15701','NÍKOLAS MARTINS VARGAS','nÍkolas_martins_vargas@gmail.com','$2y$10$QT8O5de3mnpA5dks0Cr3Fuvr80qKh10F6X67HcORXSDpDNXQPCcXm',NULL,'2015-07-20 18:45:31','2015-07-20 18:45:31'),(19,'15719','PEDRO LUIZ SROCZYNSKI','pedro_luiz_sroczynski@gmail.com','$2y$10$yyvWxQDhsVzd3EqR7MBzD.8S0Ss0k7TV/dvkTm2tMl98PRDRiVHdS',NULL,'2015-07-20 18:45:31','2015-07-20 18:45:31'),(20,'13886','RAFAEL LOPES SANTOS','rafael_lopes_santos@gmail.com','$2y$10$IN9j2kdqf1RW3lMbgW6xi.f2Un3XHmD6ggYh0vC40.npejZzt6vmy',NULL,'2015-07-20 18:45:31','2015-07-20 18:45:31'),(21,'17513','RENAN AGUIAR OLIVEIRA','renan_aguiar_oliveira@gmail.com','$2y$10$98EoCm55kv3Pcnkz2uM7bumOUUF6lO8HJS7ffwN9KujzC2YIW8Fvi',NULL,'2015-07-20 18:45:31','2015-07-20 18:45:31'),(22,'15737','STEFANI SILVA DE LIMA','stefani_silva_de_lima@gmail.com','$2y$10$NT97Yl9qpfVjR1cOyy.DSuqS3SFjfokS4w4ak9SxZr6ssnjW2d9vq',NULL,'2015-07-20 18:45:31','2015-07-20 18:45:31'),(23,'20619','VITHOR SAMPAIO MARQUES','vithor_sampaio_marques@gmail.com','$2y$10$nesxm12c3C1453skIX7qAuSV7KEaj1KcaAbNMcmNnnk2Mw.VR0AIi',NULL,'2015-07-20 18:45:32','2015-07-20 18:45:32'),(24,'20580','VITOR DA SILVA BRIXIUS','vitor_da_silva_brixius@gmail.com','$2y$10$4mqPbuIPmDTAsUSyr4rBQeURcylIlAG4z4KUkIaoS2aOQkr1/BW2q',NULL,'2015-07-20 18:45:32','2015-07-20 18:45:32'),(25,'16102','WELLYNTON LOPES TOZON','wellynton_lopes_tozon@gmail.com','$2y$10$l7Zo9.fNG9GLp.jCfaMzk.aur5e.2bj.d9uYT4QWtR0xI6wA/iQE.',NULL,'2015-07-20 18:45:32','2015-07-20 18:45:32'),(26,'20537','WILLIAN FERREIRA PEIXOTO','willian_ferreira_peixoto@gmail.com','$2y$10$FXx4UyynhWcQqVO4IUv/denPyXX1A1PYPNOA3oRO/fw/rgQhNIEcC',NULL,'2015-07-20 18:45:32','2015-07-20 18:45:32'),(27,'20525','ALAN PINHEIRO DOS SANTOS','alan_pinheiro_dos_santos@gmail.com','$2y$10$fbgG/YG.ybGcaKreZZBfYubk714h79dyOt92JE1HrI.eGaudyxzSu',NULL,'2015-07-20 18:45:32','2015-07-20 18:45:32'),(28,'20565','ANDERSON GUIMARAES MACHADO','anderson_guimaraes_machado@gmail.com','$2y$10$JIyuEggcgRJiL6Dj9Wd5Gu8NR196dZo03H0W5.cgM9Q0by43ZcH7u',NULL,'2015-07-20 18:45:33','2015-07-20 18:45:33'),(29,'20635','ARTHUR HENRIQUE MENDES BERTE','arthur_henrique_mendes_berte@gmail.com','$2y$10$gHQtHTQhn3pRCf3lznyN..5.N12aJm3EMZbr2KqVRW5nj1nT.ZfbW',NULL,'2015-07-20 18:45:33','2015-07-20 18:45:33'),(30,'20532','CASSIO LANGLOIS MACHADO','cassio_langlois_machado@gmail.com','$2y$10$E2i9.yMKwgcbxHgxvEaiOePrhRbkTqo8h24RR0F64kEMzn06LMJES',NULL,'2015-07-20 18:45:33','2015-07-20 18:45:33'),(31,'20562','DEIVIDI OLIVEIRA DA SILVA','deividi_oliveira_da_silva@gmail.com','$2y$10$vHWnh9Qsx5tQcfURbIUEfOEP2rf4uHMV/jMoo6QiwlAptAfLdR75u',NULL,'2015-07-20 18:45:33','2015-07-20 18:45:33'),(32,'20529','FRANCISCO PEDRO FERNANDES ALMEIDA','francisco_pedro_fernandes_almeida@gmail.com','$2y$10$uucyM8H8TuA8ENPILh65huNtaoZVEOwjeJKiAaUWiaWvIfFakpjuW',NULL,'2015-07-20 18:45:33','2015-07-20 18:45:33'),(33,'5901','GABRIEL GONÇALVES STANOSKI','gabriel_gonÇalves_stanoski@gmail.com','$2y$10$FeTNiqf4WEUYO90IimqoiO3lqLylGr5c2Aue1vX.aKANi/w8U6QZ.',NULL,'2015-07-20 18:45:34','2015-07-20 18:45:34'),(34,'20566','GUILHERME DOS SANTOS SILVA','guilherme_dos_santos_silva@gmail.com','$2y$10$9SuygQgwnq8l83cKzQt8ReGwjJQtLuzSc56PTnofi3xDIJWlIIkku',NULL,'2015-07-20 18:45:34','2015-07-20 18:45:34'),(35,'20522','JHONATAS DAVI DE SOUZA','jhonatas_davi_de_souza@gmail.com','$2y$10$isK0/DzavWLzGVIXPQ9goOIW9Cl4MeBSqSN1Lz/RuHKo9KWxRLhVm',NULL,'2015-07-20 18:45:34','2015-07-20 18:45:34'),(36,'20570','LEONARDO NUNES','leonardo_nunes@gmail.com','$2y$10$HOg4265jKh82uvePyYs.dOC.0nlLegOYlCGevyJFjnSEx8VmYy8H.',NULL,'2015-07-20 18:45:34','2015-07-20 18:45:34'),(37,'20519','LUCIANO GAMA MEDEIROS','luciano_gama_medeiros@gmail.com','$2y$10$bcuBKkRokpJpVPy15CnfPOBMx1zBgRKuBily9Wu7.CoNSrWybidna',NULL,'2015-07-20 18:45:34','2015-07-20 18:45:34'),(38,'20512','LUIZ CARLOS TORRES DE CASTILHOS','luiz_carlos_torres_de_castilhos@gmail.com','$2y$10$1ER7MhRWCMYMt1H4VsplwuOGO.golntiPVX5fcsHPHhl3p.6ZJQPO',NULL,'2015-07-20 18:45:34','2015-07-20 18:45:34'),(39,'20505','RAFAEL CAMMARANO GUGLIELMI','rafael_cammarano_guglielmi@gmail.com','$2y$10$zEQgTiu/MxmQClJteO1pIeJSoftCv94dLR6XlnO0oKDvsomPsiZ2a',NULL,'2015-07-20 18:45:35','2015-07-20 18:45:35'),(40,'21365','BEATRICE VICTORIA FERNANDES','beatrice_victoria_fernandes@gmail.com','$2y$10$yC5wR5qNTWypej7Kj.bS2Oehqqar1/bOrQfba6Mg7o8HFwPD/WdqG',NULL,'2015-07-20 18:45:35','2015-07-20 18:45:35'),(41,'21367','BRUNO PRATES BOFF','bruno_prates_boff@gmail.com','$2y$10$DBjuEjnbjiOM3SwxJGlHK.7Wo.zQFtvmYV3t/GOIgxUD1ucG.hK1u',NULL,'2015-07-20 18:45:35','2015-07-20 18:45:35'),(42,'258','FAGNER DAVID NUNES','fagner_david_nunes@gmail.com','$2y$10$fI6k3A2eU7D.mCPXYt/8peYRtz0Rfzr0fM4pLTJo51P.Ubr8m7eTC',NULL,'2015-07-20 18:45:35','2015-07-20 18:45:35'),(43,'21391','FELIPE AMANCIO VIEIRA','felipe_amancio_vieira@gmail.com','$2y$10$qSSfScPwFVVDeBiKjyyejOMhn.Jgqpz0nxLnHl9aZ5A1e9eFdcTyu',NULL,'2015-07-20 18:45:35','2015-07-20 18:45:35'),(44,'21364','GREGORY PITTOL BORIN','gregory_pittol_borin@gmail.com','$2y$10$/Cv0EuX3WSebiAJsEZ/K.ugbjJB9xPq2jQfiwMhbEvPAiojVOVM76',NULL,'2015-07-20 18:45:36','2015-07-20 18:45:36'),(45,'21393','GUILHERME NEUMANN','guilherme_neumann@gmail.com','$2y$10$1HN4v/CX5WHpgp.UuIT15ugJCJ.LYAe2WLu9g5u7ueeHcAS0WufCG',NULL,'2015-07-20 18:45:36','2015-07-20 18:45:36'),(46,'23090','JULIANO ANTÔNIO DA ROSA SOARES','juliano_antÔnio_da_rosa_soares@gmail.com','$2y$10$ORnHnM/iARwKpSUiEhuEcuuY4kY.5s.p0oyauV5AwLKklbOHshU5S',NULL,'2015-07-20 18:45:36','2015-07-20 18:45:36'),(47,'14216','ROBSON LUIS RAMOS','robson_luis_ramos@gmail.com','$2y$10$ulPu8LPLsbaH69tOpQ63Xed.eH/g9kKjcduve5WLB4Tk5ArcFmIMe',NULL,'2015-07-20 18:45:36','2015-07-20 18:45:36'),(48,'23301','NATANIEL LEONAM  DA COSTA GOMES','nataniel_leonam__da_costa_gomes@gmail.com','$2y$10$93kKmsRi8wpGBIc5wElHYeDB6SXUgFdwuoI6suX.WOMH4KOeiwhrC',NULL,'2015-07-20 18:45:37','2015-07-20 18:45:37'),(49,'1234','Valderi R. Q. Leithardt','valderi_r._q._leithardt@gmail.com','$2y$10$cCCER6CSFpWI3YTJevyhm.wRpTFrXZCZ52TFzoMUyG7VAsECPbQLm',NULL,'2015-07-20 18:45:37','2015-07-20 18:45:37'),(50,'31019','Gustavo B. Brand','gustavo_b._brand@gmail.com','$2y$10$L91oHnjyO5m2bdgqbHJnI.KpQcJwM9IcLvUAehyDSFj3L6qAlsA5O',NULL,'2015-07-20 18:45:37','2015-07-20 18:45:37'),(51,'3456','Dione Taschetto','dione_taschetto@gmail.com','$2y$10$bNIfE.g8qk/BljEiZqKegeiPeggiSD9sxSLpopQGo74.DOaJYFERe',NULL,'2015-07-20 18:45:38','2015-07-20 18:45:38'),(52,'4567','Terezinha I. M.Torres','terezinha_i._m.torres@gmail.com','$2y$10$55Wtwv7JQgb9DNpq8zT8au8/4RZIjHUERtOCI42LJbQEAxsTlqk.K',NULL,'2015-07-20 18:45:38','2015-07-20 18:45:38'),(53,'5678','Guilherme Dal Bianco','guilherme_dal_bianco@gmail.com','$2y$10$nCTA1z9PA5NpkVpaekddDeUGrBOq2r25zJLY2n5cp1OXoeIPrjxeO',NULL,'2015-07-20 18:45:38','2015-07-20 18:45:38'),(54,'7889','Leandro José Cassol','leandro_josé_cassol@gmail.com','$2y$10$lNazg7cixzHGpUGhaOxZweSNyTVtcKzTJzAHDGi9e1Ro9HOU5JgJ.',NULL,'2015-07-20 18:45:38','2015-07-20 18:45:38'),(55,'4844','Alexandre Gaspary Haupt','alexandre_gaspary_haupt@gmail.com','$2y$10$AuMLcB4Sy3uh6jesloouRuyke3JLJ82oFBnxna1DHL5vumLdFgETW',NULL,'2015-07-20 18:45:38','2015-07-20 18:45:38'),(56,'0000','Administrador','admin@sigai.org','$2y$10$tqLIRPEYUwoXiL8EeUKNWOcODSo7pIj17z2ecpjejftwVylxIFuj2',NULL,'2015-07-20 18:45:38','2015-07-20 18:45:38');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-07-20 12:47:13
