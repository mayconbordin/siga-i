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
INSERT INTO `alunos` VALUES (1,'2015-07-21 22:27:20','2015-07-21 22:27:20'),(2,'2015-07-21 22:27:20','2015-07-21 22:27:20'),(3,'2015-07-21 22:27:21','2015-07-21 22:27:21'),(4,'2015-07-21 22:27:21','2015-07-21 22:27:21'),(5,'2015-07-21 22:27:21','2015-07-21 22:27:21'),(6,'2015-07-21 22:27:21','2015-07-21 22:27:21'),(7,'2015-07-21 22:27:21','2015-07-21 22:27:21'),(8,'2015-07-21 22:27:22','2015-07-21 22:27:22'),(9,'2015-07-21 22:27:22','2015-07-21 22:27:22'),(10,'2015-07-21 22:27:22','2015-07-21 22:27:22'),(11,'2015-07-21 22:27:22','2015-07-21 22:27:22'),(12,'2015-07-21 22:27:23','2015-07-21 22:27:23'),(13,'2015-07-21 22:27:23','2015-07-21 22:27:23'),(14,'2015-07-21 22:27:23','2015-07-21 22:27:23'),(15,'2015-07-21 22:27:23','2015-07-21 22:27:23'),(16,'2015-07-21 22:27:23','2015-07-21 22:27:23'),(17,'2015-07-21 22:27:24','2015-07-21 22:27:24'),(18,'2015-07-21 22:27:24','2015-07-21 22:27:24'),(19,'2015-07-21 22:27:24','2015-07-21 22:27:24'),(20,'2015-07-21 22:27:24','2015-07-21 22:27:24'),(21,'2015-07-21 22:27:24','2015-07-21 22:27:24'),(22,'2015-07-21 22:27:25','2015-07-21 22:27:25'),(23,'2015-07-21 22:27:25','2015-07-21 22:27:25'),(24,'2015-07-21 22:27:25','2015-07-21 22:27:25'),(25,'2015-07-21 22:27:25','2015-07-21 22:27:25'),(26,'2015-07-21 22:27:25','2015-07-21 22:27:25'),(27,'2015-07-21 22:27:25','2015-07-21 22:27:25'),(28,'2015-07-21 22:27:26','2015-07-21 22:27:26'),(29,'2015-07-21 22:27:26','2015-07-21 22:27:26'),(30,'2015-07-21 22:27:26','2015-07-21 22:27:26'),(31,'2015-07-21 22:27:26','2015-07-21 22:27:26'),(32,'2015-07-21 22:27:27','2015-07-21 22:27:27'),(33,'2015-07-21 22:27:27','2015-07-21 22:27:27'),(34,'2015-07-21 22:27:28','2015-07-21 22:27:28'),(35,'2015-07-21 22:27:28','2015-07-21 22:27:28'),(36,'2015-07-21 22:27:28','2015-07-21 22:27:28'),(37,'2015-07-21 22:27:28','2015-07-21 22:27:28'),(38,'2015-07-21 22:27:28','2015-07-21 22:27:28'),(39,'2015-07-21 22:27:28','2015-07-21 22:27:28'),(40,'2015-07-21 22:27:29','2015-07-21 22:27:29'),(41,'2015-07-21 22:27:29','2015-07-21 22:27:29'),(42,'2015-07-21 22:27:29','2015-07-21 22:27:29'),(43,'2015-07-21 22:27:29','2015-07-21 22:27:29'),(44,'2015-07-21 22:27:29','2015-07-21 22:27:29'),(45,'2015-07-21 22:27:29','2015-07-21 22:27:29'),(46,'2015-07-21 22:27:30','2015-07-21 22:27:30'),(47,'2015-07-21 22:27:30','2015-07-21 22:27:30'),(48,'2015-07-21 22:27:30','2015-07-21 22:27:30');
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
  CONSTRAINT `alunos_turmas_curso_origem_id_foreign` FOREIGN KEY (`curso_origem_id`) REFERENCES `cursos` (`id`),
  CONSTRAINT `alunos_turmas_aluno_id_foreign` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`),
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
INSERT INTO `ambientes` VALUES (1,'sala 101',1,'2015-07-21 22:27:07','2015-07-21 22:27:07'),(2,'sala 102',1,'2015-07-21 22:27:07','2015-07-21 22:27:07'),(3,'sala 103',1,'2015-07-21 22:27:07','2015-07-21 22:27:07'),(4,'sala 104',1,'2015-07-21 22:27:07','2015-07-21 22:27:07'),(5,'sala 105',1,'2015-07-21 22:27:07','2015-07-21 22:27:07'),(6,'sala 201',1,'2015-07-21 22:27:07','2015-07-21 22:27:07'),(7,'sala 202',1,'2015-07-21 22:27:07','2015-07-21 22:27:07'),(8,'sala 203',1,'2015-07-21 22:27:07','2015-07-21 22:27:07'),(9,'sala 204',1,'2015-07-21 22:27:07','2015-07-21 22:27:07'),(10,'sala 205',1,'2015-07-21 22:27:07','2015-07-21 22:27:07'),(11,'lab 01',2,'2015-07-21 22:27:07','2015-07-21 22:27:07'),(12,'lab 02',2,'2015-07-21 22:27:07','2015-07-21 22:27:07'),(13,'lab 03',2,'2015-07-21 22:27:07','2015-07-21 22:27:07'),(14,'lab 04',2,'2015-07-21 22:27:07','2015-07-21 22:27:07'),(15,'lab 05',2,'2015-07-21 22:27:07','2015-07-21 22:27:07'),(16,'lab 06',2,'2015-07-21 22:27:07','2015-07-21 22:27:07');
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
  CONSTRAINT `aulas_professor_id_foreign` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`),
  CONSTRAINT `aulas_ambiente_id_foreign` FOREIGN KEY (`ambiente_id`) REFERENCES `ambientes` (`id`),
  CONSTRAINT `aulas_turma_id_foreign` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aulas`
--

LOCK TABLES `aulas` WRITE;
/*!40000 ALTER TABLE `aulas` DISABLE KEYS */;
INSERT INTO `aulas` VALUES (1,'2014-08-05',0,'Introdução a disciplina. Plano de ensino. Situação do tema banco de dados dentro da computação. Arquivos convencionais, problemas; conceitos de banco de dados (BD) e SGBD: noções gerais de um sistema de BD; arquitetura de SGBD; gerência de bancos funções básicas de SGBD; usuários de BD;',2,'2015-07-21 22:27:40','2015-07-21 22:27:40',0,'',NULL,'18:30:00','22:50:00',49),(2,'2014-08-12',0,'Abstração de dados.  Modelo conceitual; modelo lógico; modelo físico. Introdução a modelagem conceitual.  modelo de dados entidade relacionamento (ER)',2,'2015-07-21 22:27:41','2015-07-21 22:27:41',0,'',NULL,'18:30:00','22:50:00',49),(3,'2014-08-19',0,'Modelagem conceitual: objetivos; propriedades de um modelo conceitual; notações. Estudo de caso.',2,'2015-07-21 22:27:41','2015-07-21 22:27:41',0,'NULL',NULL,'18:30:00','22:50:00',49),(4,'2014-08-26',0,'modelagem conceitual (mecanismos de abstração; classificação/instanciação; generalização/especialização;). Exercícios de fixação. Descrição do trabalho G1.',2,'2015-07-21 22:27:41','2015-07-21 22:27:41',0,'NULL',NULL,'18:30:00','22:50:00',49),(5,'2014-09-02',0,'Modelagem conceitual (restrições de integridade, construtores, notação diagramática, semelhanças e diferenças entre modelos conceituais).',2,'2015-07-21 22:27:41','2015-07-21 22:27:41',0,'NULL',NULL,'18:30:00','22:50:00',49),(6,'2014-09-09',0,'Projeto de banco de dados (transformação de diagramas  conceituais para modelos de banco de dados I ). Exercícios práticos.',2,'2015-07-21 22:27:41','2015-07-21 22:27:41',0,'NULL',NULL,'18:30:00','22:50:00',49),(7,'2014-09-16',0,'Projeto de banco de dados (transformação de diagramas conceituais para modelos de bancos de dados II). Exercícios práticos.',2,'2015-07-21 22:27:41','2015-07-21 22:27:41',0,'NULL',NULL,'18:30:00','22:50:00',49),(8,'2014-09-23',0,'Apresentação dos trabalhos. Revisão do conteúdo para a avaliação. Exercícios práticos.',2,'2015-07-21 22:27:41','2015-07-21 22:27:41',0,'NULL',NULL,'18:30:00','22:50:00',49),(9,'2014-09-30',0,'Avaliação teórica/prática grau 1.',2,'2015-07-21 22:27:41','2015-07-21 22:27:41',0,'NULL',NULL,'18:30:00','22:50:00',49),(10,'2014-10-07',0,'Entrega das notas e correção da prova. Descrição do trabalho.Introdução à normalização de modelos.',2,'2015-07-21 22:27:41','2015-07-21 22:27:41',0,'NULL',NULL,'18:30:00','22:50:00',49),(11,'2014-10-14',0,'Estudo de caso da normalização de modelos. Linguagem de definição de dados (DDL). Linguagem de modelagem de banco de dados.  Exercícios práticos.',2,'2015-07-21 22:27:41','2015-07-21 22:27:41',0,'NULL',NULL,'18:30:00','22:50:00',49),(12,'2014-10-21',0,'Manipulação de dados (DML). Andamento do trabalho.',2,'2015-07-21 22:27:41','2015-07-21 22:27:41',0,'NULL',NULL,'18:30:00','22:50:00',49),(13,'2014-10-28',0,'Restrições de integridade. Exercícios práticos.',2,'2015-07-21 22:27:41','2015-07-21 22:27:41',0,'NULL',NULL,'18:30:00','22:50:00',49),(14,'2014-11-04',0,'',2,'2015-07-21 22:27:41','2015-07-21 22:27:41',0,'NULL',NULL,'18:30:00','22:50:00',49),(15,'2014-11-11',0,'',2,'2015-07-21 22:27:41','2015-07-21 22:27:41',0,'NULL',NULL,'18:30:00','22:50:00',49),(16,'2014-11-18',0,'',2,'2015-07-21 22:27:41','2015-07-21 22:27:41',0,'NULL',NULL,'18:30:00','22:50:00',49),(17,'2014-11-25',0,'',2,'2015-07-21 22:27:41','2015-07-21 22:27:41',0,'NULL',NULL,'18:30:00','22:50:00',49),(18,'2014-12-02',0,'',2,'2015-07-21 22:27:41','2015-07-21 22:27:41',0,'NULL',NULL,'18:30:00','22:50:00',49),(19,'2014-12-09',0,'',2,'2015-07-21 22:27:41','2015-07-21 22:27:41',0,'NULL',NULL,'18:30:00','22:50:00',49),(20,'2014-12-16',0,'',2,'2015-07-21 22:27:41','2015-07-21 22:27:41',0,'NULL',NULL,'18:30:00','22:50:00',49),(21,'2014-02-20',0,'Introdução aos SO\'s: Apresentação da disciplina: conteúdo, metodologia de ensino, critérios de avaliação, cronograma, material apoio (livros).',5,'2015-07-21 22:27:41','2015-07-21 22:27:41',0,'NULL',NULL,'18:30:00','22:50:00',49),(22,'2014-02-27',0,'Introdução aos Sistemas Operacionais: Estudo das definições de sistema operacional (SO), objetivos, visões.',5,'2015-07-21 22:27:41','2015-07-21 22:27:41',0,'NULL',NULL,'18:30:00','22:50:00',49),(23,'2014-03-06',0,'Gerência de entrada e Saída: controle e gerenciamento realizado pelo sistema operacional: Multiprogramação.',5,'2015-07-21 22:27:42','2015-07-21 22:27:42',0,'NULL',NULL,'18:30:00','22:50:00',49),(24,'2014-03-13',0,'Estudo dos tipos de sistemas operacionais: monoprogramáveis, multiprogramaveis e sistemas com múltiplos processadores.',5,'2015-07-21 22:27:42','2015-07-21 22:27:42',0,'NULL',NULL,'18:30:00','22:50:00',49),(25,'2014-03-20',0,'Conceitos de Deadlock, prevenção e tratamento em Sistemas Operacionais.',5,'2015-07-21 22:27:42','2015-07-21 22:27:42',0,'NULL',NULL,'18:30:00','22:50:00',49),(26,'2014-03-27',0,'Estudo das estruturas de um sistema operacional: sistemas monolíticos, sistemas em camadas e cliente/servidor.',5,'2015-07-21 22:27:42','2015-07-21 22:27:42',0,'NULL',NULL,'18:30:00','22:50:00',49),(27,'2014-04-03',0,'Estudo dos sistemas multiprogramáveis: definição, conceitos, gerência de filas, tipos (cooperativa e preemptiva), proteção.',5,'2015-07-21 22:27:42','2015-07-21 22:27:42',0,'NULL',NULL,'18:30:00','22:50:00',49),(28,'2014-04-10',0,'Estudo de processos: modelos de processos, estados de um process, mudanças de estados entre processos, subprocessos e threads.',5,'2015-07-21 22:27:42','2015-07-21 22:27:42',0,'NULL',NULL,'18:30:00','22:50:00',49),(29,'2014-04-17',0,'Especificação de tarefas e prioridades.',5,'2015-07-21 22:27:42','2015-07-21 22:27:42',0,'NULL',NULL,'18:30:00','22:50:00',49),(30,'2014-04-23',0,'Introdução a escalonadores',5,'2015-07-21 22:27:42','2015-07-21 22:27:42',0,'NULL',NULL,'18:30:00','22:50:00',49),(31,'2014-04-24',0,'Atividades extraclasse: exercícios e trabalhos individuais.',5,'2015-07-21 22:27:42','2015-07-21 22:27:42',0,'NULL',NULL,'18:30:00','22:50:00',49),(32,'2014-05-08',0,'Correção de exercício, revisão de conteúdo.',5,'2015-07-21 22:27:42','2015-07-21 22:27:42',0,'NULL',NULL,'18:30:00','22:50:00',49),(33,'2014-05-15',0,'Avaliação de grau 1 (G1).',5,'2015-07-21 22:27:42','2015-07-21 22:27:42',0,'NULL',NULL,'18:30:00','22:50:00',49),(34,'2014-05-22',0,'Analisar os resultados da avaliação G1. Gerência de processos: introdução, descritor de processo, controle de processos, processos de sistema, escalonamento de processos',5,'2015-07-21 22:27:42','2015-07-21 22:27:42',0,'NULL',NULL,'18:30:00','22:50:00',49),(35,'2014-05-29',0,'Gerência de Memória: introdução, endereços lógicos e fisicos, formas de alicação, swapping.',5,'2015-07-21 22:27:42','2015-07-21 22:27:42',0,'NULL',NULL,'18:30:00','22:50:00',49),(36,'2014-06-05',0,'Memória virtual: funcionamento da paginação por demanda, substituição de páginas, algoritmos de substituição de páginas, alocação de quadros, trashing.',5,'2015-07-21 22:27:42','2015-07-21 22:27:42',0,'NULL',NULL,'18:30:00','22:50:00',49),(37,'2014-06-12',0,'Programação concorrente: definição, motivação, especificação de paralelismo, problema da seção crítica, semáforos, mensagens, visão geral e comparação, paralisação (deadlock).',5,'2015-07-21 22:27:42','2015-07-21 22:27:42',0,'NULL',NULL,'18:30:00','22:50:00',49),(38,'2014-06-26',0,'Elaboração de exercícios e correção.',5,'2015-07-21 22:27:42','2015-07-21 22:27:42',0,'NULL',NULL,'18:30:00','22:50:00',49),(39,'2014-07-03',0,'Sistema de Arquivos: Introdução, nomes de arquivos, comandos, árvore de diretórios do SO, discos (particionamento e formatação), acesso a arquivos, atributos, controle e gerenciamento.',5,'2015-07-21 22:27:42','2015-07-21 22:27:42',0,'NULL',NULL,'18:30:00','22:50:00',49),(40,'2014-07-04',0,'Apresentação de trabalhos (estudo de caso) de sistemas operacionais.',5,'2015-07-21 22:27:42','2015-07-21 22:27:42',0,'NULL',NULL,'18:30:00','22:50:00',49),(41,'2014-07-10',0,'Avaliação Grau 2. Divulgação de resultados parciais, revisão e prova de substituição.',5,'2015-07-21 22:27:42','2015-07-21 22:27:42',0,'NULL',NULL,'18:30:00','22:50:00',49),(42,'2015-02-20',0,'Introdução a disciplina. Plano de ensino. Situação do tema banco de dados dentro da computação. Arquivos convencionais, problemas; conceitos de banco de dados (BD) e SGBD: noções gerais de um sistema de BD;',3,'2015-07-21 22:27:42','2015-07-21 22:27:42',0,'NULL',NULL,'18:30:00','22:50:00',50),(43,'2015-02-27',0,'Arquitetura de SGBD; gerência de bancos funções básicas de SGBD; usuários de BD; Abstração de dados. modelo lógico; modelo físico.  Introdução a modelagem conceitual.  modelo de dados entidade relacionamento (ER). Processo de projeto e Implementação de BD.',3,'2015-07-21 22:27:42','2015-07-21 22:27:42',0,'',NULL,'18:30:00','22:50:00',50),(44,'2015-03-06',0,'Modelos de dados; Modelagem conceitual: objetivos; propriedades de um modelo conceitual; notações. Modelo entidade relacionamento (ER); Agregação/Desagregação.  Estudo de caso.',3,'2015-07-21 22:27:42','2015-07-21 22:27:42',0,'NULL',NULL,'18:30:00','22:50:00',50),(45,'2015-03-13',0,'Modelo de dados orientado a objetos (OO) , Modelagem conceitual (mecanismos de abstração; classificação/instanciação; generalização/especialização;).  Exercícios de fixação.',3,'2015-07-21 22:27:43','2015-07-21 22:27:43',0,'NULL',NULL,'18:30:00','22:50:00',50),(46,'2015-03-20',0,'Restrições de integridade, Construtores, Notação diagramática, Semelhanças e diferenças entre modelos conceituais).',3,'2015-07-21 22:27:43','2015-07-21 22:27:43',0,'NULL',NULL,'18:30:00','22:50:00',50),(47,'2015-03-27',0,'Projeto de banco de dados (transformação de diagramas  conceituais para modelos de banco de dados I ). Exercícios práticos.',3,'2015-07-21 22:27:43','2015-07-21 22:27:43',0,'NULL',NULL,'18:30:00','22:50:00',50),(48,'2015-04-10',0,'Estudo de caso da normalização de modelos.',3,'2015-07-21 22:27:43','2015-07-21 22:27:43',0,'',NULL,'18:30:00','22:50:00',50),(49,'2015-04-17',0,'Revisão do conteúdo para a avaliação. Exercícios práticos.',3,'2015-07-21 22:27:43','2015-07-21 22:27:43',0,'',NULL,'18:30:00','22:50:00',50),(50,'2015-04-20',0,'Atividade Extraclasse:\".Exercícios de normalização e revisão para prova\"',3,'2015-07-21 22:27:43','2015-07-21 22:27:43',0,'',NULL,'18:30:00','22:50:00',50),(51,'2015-04-24',0,'Avaliação teórica/prática grau 1.',3,'2015-07-21 22:27:43','2015-07-21 22:27:43',0,'NULL',NULL,'18:30:00','22:50:00',50),(52,'2015-05-08',0,'Entrega das notas e correção da prova. Descrição do trabalho. Linguagem de definição de dados (DDL). Linguagem de modelagem de banco de dados.',3,'2015-07-21 22:27:43','2015-07-21 22:27:43',0,'NULL',NULL,'18:30:00','22:50:00',50),(53,'2015-05-15',0,'Linguagem de manipulação de dados (DML)  interativa.',3,'2015-07-21 22:27:43','2015-07-21 22:27:43',0,'NULL',NULL,'18:30:00','22:50:00',50),(54,'2015-05-22',0,'Restrições de integridade. Exercícios práticos.',3,'2015-07-21 22:27:43','2015-07-21 22:27:43',0,'NULL',NULL,'18:30:00','22:50:00',50),(55,'2015-05-29',0,'Linguagem de manipulação de dados embutida, restrições de integridade. Exercícios práticos.',3,'2015-07-21 22:27:43','2015-07-21 22:27:43',0,'NULL',NULL,'18:30:00','22:50:00',50),(56,'2015-06-05',0,'Especificação de gatilhos, asserções e procedimentos. Exercícios práticos.',3,'2015-07-21 22:27:43','2015-07-21 22:27:43',0,'NULL',NULL,'18:30:00','22:50:00',50),(57,'2015-06-12',0,'Álgebra relacional.',3,'2015-07-21 22:27:43','2015-07-21 22:27:43',0,'NULL',NULL,'18:30:00','22:50:00',50),(58,'2015-06-19',0,'Revisão para prova G2.',3,'2015-07-21 22:27:43','2015-07-21 22:27:43',0,'NULL',NULL,'18:30:00','22:50:00',50),(59,'2015-06-26',0,'Avaliação teórica/prática grau 2.',3,'2015-07-21 22:27:43','2015-07-21 22:27:43',0,'NULL',NULL,'18:30:00','22:50:00',50),(60,'2015-07-03',0,'Entrega das notas e correção da prova.  Revisão para prova de substituição.',3,'2015-07-21 22:27:43','2015-07-21 22:27:43',0,'NULL',NULL,'18:30:00','22:50:00',50),(61,'2015-07-10',0,'Prova de substituição. Entrega das notas finais e correção da prova.',3,'2015-07-21 22:27:43','2015-07-21 22:27:43',0,'NULL',NULL,'18:30:00','22:50:00',50),(62,'2015-02-25',0,'Apresentação da disciplina. Introdução às técnicas de programação.',6,'2015-07-21 22:27:43','2015-07-21 22:27:43',0,'NULL',NULL,'18:30:00','22:50:00',50),(63,'2015-03-04',0,'Orientação para projeto de classes',6,'2015-07-21 22:27:43','2015-07-21 22:27:43',0,'NULL',NULL,'18:30:00','22:50:00',50),(64,'2015-03-11',0,'Programação por contratos ? parte 1: especificações de interface precisas e verificáveis dos componentes de desenvolvimento de software. Exercícios práticos.',6,'2015-07-21 22:27:43','2015-07-21 22:27:43',0,'NULL',NULL,'18:30:00','22:50:00',50),(65,'2015-03-18',0,'Programação por contratos ? parte 2: especificações de interface precisas e verificáveis dos componentes de desenvolvimento de software. Exercícios práticos.',6,'2015-07-21 22:27:43','2015-07-21 22:27:43',0,'NULL',NULL,'18:30:00','22:50:00',50),(66,'2015-03-25',0,'Introdução ao Teste do Software. Exercícios práticos.',6,'2015-07-21 22:27:43','2015-07-21 22:27:43',0,'',NULL,'18:30:00','22:50:00',50),(67,'2015-04-01',0,'Teste de software: validação de comportamento e unidades de trabalho. Descrição do  trabalho a ser desenvolvido.',6,'2015-07-21 22:27:43','2015-07-21 22:27:43',0,'',NULL,'18:30:00','22:50:00',50),(68,'2015-04-08',0,'Ferramentas de apoio ao teste unitário (Junit). Exercícios práticos.',6,'2015-07-21 22:27:43','2015-07-21 22:27:43',0,'',NULL,'18:30:00','22:50:00',50),(69,'2015-04-15',0,'Apresentação do trabalho e realização de um simulado referente ao G1.',6,'2015-07-21 22:27:43','2015-07-21 22:27:43',0,'',NULL,'18:30:00','22:50:00',50),(70,'2015-04-22',0,'Avaliação G1',6,'2015-07-21 22:27:43','2015-07-21 22:27:43',0,'',NULL,'18:30:00','22:50:00',50),(71,'2015-04-29',0,'Entrega das avaliações G1. Discussão das questões da prova. Programação concorrente: modelagem, threads, sincronização. Exercícios práticos.',6,'2015-07-21 22:27:43','2015-07-21 22:27:43',0,'NULL',NULL,'18:30:00','22:50:00',50),(72,'2015-05-06',0,'Aula prática ? programação concorrente.',6,'2015-07-21 22:27:43','2015-07-21 22:27:43',0,'NULL',NULL,'18:30:00','22:50:00',50),(73,'2015-05-13',0,'Programação concorrente: vivacidade e métodos protegidos. Descrição do trabalho G2.',6,'2015-07-21 22:27:44','2015-07-21 22:27:44',0,'NULL',NULL,'18:30:00','22:50:00',50),(74,'2015-05-20',0,'Programação concorrente: objeto condição e propriedades de concorrência.',6,'2015-07-21 22:27:44','2015-07-21 22:27:44',0,'NULL',NULL,'18:30:00','22:50:00',50),(75,'2015-05-27',0,'Arquitetura de Software: componentes do sistema e suas propriedades externas e seus relacionamentos com outros softwares.',6,'2015-07-21 22:27:44','2015-07-21 22:27:44',0,'NULL',NULL,'18:30:00','22:50:00',50),(76,'2015-06-03',0,'Modelo de desenvolvimento em camadas: domínios.',6,'2015-07-21 22:27:44','2015-07-21 22:27:44',0,'NULL',NULL,'18:30:00','22:50:00',50),(77,'2015-06-10',0,'Modelo de desenvolvimento em camadas: persistência e apresentação.',6,'2015-07-21 22:27:44','2015-07-21 22:27:44',0,'NULL',NULL,'18:30:00','22:50:00',50),(78,'2015-06-17',0,'Apresentação do trabalho e revisão para a avaliação  referente ao G2',6,'2015-07-21 22:27:44','2015-07-21 22:27:44',0,'NULL',NULL,'18:30:00','22:50:00',50),(79,'2015-06-24',0,'Avaliação G2',6,'2015-07-21 22:27:44','2015-07-21 22:27:44',0,'NULL',NULL,'18:30:00','22:50:00',50),(80,'2015-07-01',0,'Entrega das notas G2. Revisão para prova de substituição.',6,'2015-07-21 22:27:44','2015-07-21 22:27:44',0,'NULL',NULL,'18:30:00','22:50:00',50),(81,'2015-07-08',0,'Aplicação da prova de substituição G1 ou G2. Entrega das notas.',6,'2015-07-21 22:27:44','2015-07-21 22:27:44',0,'NULL',NULL,'18:30:00','22:50:00',50),(82,'2015-02-19',0,'Plano de aula. Arquitetura de computadores. Conceitos de hardware e software. Sistemas numéricos de representação de dados e conversões. Exercícios',1,'2015-07-21 22:27:44','2015-07-21 22:27:44',0,'NULL',NULL,'18:30:00','22:50:00',50),(83,'2015-02-26',0,'Álgebra booleana. Contextualização do curso de ADS. Disciplinas que compõem a ciência da computação. Exercícios',1,'2015-07-21 22:27:44','2015-07-21 22:27:44',0,'NULL',NULL,'18:30:00','22:50:00',50),(84,'2015-03-05',0,'Conceitos e definições dos Sistemas de informação. Tipos de sistemas de informação. Exemplos de sistemas de informação.',1,'2015-07-21 22:27:44','2015-07-21 22:27:44',0,'NULL',NULL,'18:30:00','22:50:00',50),(85,'2015-03-12',0,'Introdução  à Abordagem sistêmica I.',1,'2015-07-21 22:27:44','2015-07-21 22:27:44',0,'NULL',NULL,'18:30:00','22:50:00',50),(86,'2015-03-19',0,'Abordagem sistêmica  I - Aula Prática.',1,'2015-07-21 22:27:44','2015-07-21 22:27:44',0,'NULL',NULL,'18:30:00','22:50:00',50),(87,'2015-03-26',0,'Conceitos da Abordagem sistêmica II',1,'2015-07-21 22:27:44','2015-07-21 22:27:44',0,'NULL',NULL,'18:30:00','22:50:00',50),(88,'2015-04-02',0,'Conceitos da Abordagem sistêmica II ? Aula Prática',1,'2015-07-21 22:27:44','2015-07-21 22:27:44',0,'NULL',NULL,'18:30:00','22:50:00',50),(89,'2015-04-09',0,'Revisão dos conteúdos (Exercícios).',1,'2015-07-21 22:27:44','2015-07-21 22:27:44',0,'NULL',NULL,'18:30:00','22:50:00',50),(90,'2015-04-16',0,'Avaliação Teórica ? G1 ? Individual.',1,'2015-07-21 22:27:44','2015-07-21 22:27:44',0,'NULL',NULL,'18:30:00','22:50:00',50),(91,'2015-04-23',0,'Correção avaliação e divulgação resultados, definição grupos de trabalho.  Estudo da aplicação da tecnologia da informação nas organizações  do papel da modelagem no desenvolvimento de SI.',1,'2015-07-21 22:27:44','2015-07-21 22:27:44',0,'NULL',NULL,'18:30:00','22:50:00',50),(92,'2015-04-30',0,'Sistemas de computação. Estudo de caso. Exercícios',1,'2015-07-21 22:27:44','2015-07-21 22:27:44',0,'NULL',NULL,'18:30:00','22:50:00',50),(93,'2015-05-07',0,'Sistema de gerenciamento de transação.',1,'2015-07-21 22:27:44','2015-07-21 22:27:44',0,'NULL',NULL,'18:30:00','22:50:00',50),(94,'2015-05-14',0,'Sistema de gerenciamento de transação -  Aula prática',1,'2015-07-21 22:27:44','2015-07-21 22:27:44',0,'NULL',NULL,'18:30:00','22:50:00',50),(95,'2015-05-21',0,'Sistemas de informação (Planejamento estratégico de TI), aplicação da tecnologia da informação.',1,'2015-07-21 22:27:44','2015-07-21 22:27:44',0,'NULL',NULL,'18:30:00','22:50:00',50),(96,'2015-05-28',0,'Gestão de sistemas de informação',1,'2015-07-21 22:27:44','2015-07-21 22:27:44',0,'NULL',NULL,'18:30:00','22:50:00',50),(97,'2015-06-11',0,'Modelagem no desenvolvimento de sistemas de informação.',1,'2015-07-21 22:27:44','2015-07-21 22:27:44',0,'NULL',NULL,'18:30:00','22:50:00',50),(98,'2015-06-18',0,'Seminários de apresentações. Exercícios de revisão',1,'2015-07-21 22:27:44','2015-07-21 22:27:44',0,'NULL',NULL,'18:30:00','22:50:00',50),(99,'2015-06-25',0,'Avaliação Teórica / prática ? G2.',1,'2015-07-21 22:27:44','2015-07-21 22:27:44',0,'NULL',NULL,'18:30:00','22:50:00',50),(100,'2015-07-02',0,'Revisão do conteúdo para a substituição de grau',1,'2015-07-21 22:27:45','2015-07-21 22:27:45',0,'NULL',NULL,'18:30:00','22:50:00',50),(101,'2015-07-09',0,'Divulgação de resultados parciais, substituição de grau e divulgação de resultados finais.',1,'2015-07-21 22:27:45','2015-07-21 22:27:45',0,'NULL',NULL,'18:30:00','22:50:00',50),(102,'2014-08-01',0,'Descrição do plano de ensino. Introdução à disciplina. Plano de ensino. Introdução a linguagem  SQL',4,'2015-07-21 22:27:45','2015-07-21 22:27:45',0,'NULL',NULL,'18:30:00','22:50:00',49),(103,'2014-08-08',0,'Consultas (SQL, linguagem de manipulação de dados). Exercícios de fixação',4,'2015-07-21 22:27:45','2015-07-21 22:27:45',0,'NULL',NULL,'18:30:00','22:50:00',49),(104,'2014-08-15',0,'Consultas (SQL, linguagem de definição de dados). Exercícios de fixação',4,'2015-07-21 22:27:45','2015-07-21 22:27:45',0,'NULL',NULL,'18:30:00','22:50:00',49),(105,'2014-08-22',0,'Consultas Avançadas (introdução a subselects).  Exercícios de fixação. Integração do SQL e com o  JAVA.  Exercícios de fixação',4,'2015-07-21 22:27:45','2015-07-21 22:27:45',0,'NULL',NULL,'18:30:00','22:50:00',49),(106,'2014-08-29',0,'Consultas Avançadas (subselects, group by).  Exercícios de fixação',4,'2015-07-21 22:27:45','2015-07-21 22:27:45',0,'NULL',NULL,'18:30:00','22:50:00',49),(107,'2014-09-05',0,'Triggers e Store. Exercícios de fixação',4,'2015-07-21 22:27:45','2015-07-21 22:27:45',0,'NULL',NULL,'18:30:00','22:50:00',49),(108,'2014-09-12',0,'Procedures. Exercícios de fixação',4,'2015-07-21 22:27:45','2015-07-21 22:27:45',0,'NULL',NULL,'18:30:00','22:50:00',49),(109,'2014-09-19',0,'Revisão para prova G1. Simulado',4,'2015-07-21 22:27:45','2015-07-21 22:27:45',0,'NULL',NULL,'18:30:00','22:50:00',49),(110,'2014-09-26',0,'Avaliação teórica prática referente ao G1',4,'2015-07-21 22:27:45','2015-07-21 22:27:45',0,'NULL',NULL,'18:30:00','22:50:00',49),(111,'2014-10-03',0,'Correção da prova. Cursores',4,'2015-07-21 22:27:45','2015-07-21 22:27:45',0,'NULL',NULL,'18:30:00','22:50:00',49),(112,'2014-10-10',0,'Cursores e Introdução a Transações',4,'2015-07-21 22:27:45','2015-07-21 22:27:45',0,'NULL',NULL,'18:30:00','22:50:00',49),(113,'2014-10-17',0,'Transação  (Recuperação de falhas, concorrência). Andamento do trabalho.',4,'2015-07-21 22:27:45','2015-07-21 22:27:45',0,'NULL',NULL,'18:30:00','22:50:00',49),(114,'2014-10-24',0,'Arquitetura de  Banco de Dados  Distribuídos; Gerência de Objetos;',4,'2015-07-21 22:27:45','2015-07-21 22:27:45',0,'NULL',NULL,'18:30:00','22:50:00',49),(115,'2014-10-31',0,'Semana acadêmica',4,'2015-07-21 22:27:45','2015-07-21 22:27:45',0,'NULL',NULL,'18:30:00','22:50:00',49),(116,'2014-11-07',0,'Otimização de Consultas.',4,'2015-07-21 22:27:45','2015-07-21 22:27:45',0,'NULL',NULL,'18:30:00','22:50:00',49),(117,'2014-11-14',0,'Introdução a  Data Warehouse  e Bussiness  Intelligence (Aplicações emergentes de banco de dados.)',4,'2015-07-21 22:27:45','2015-07-21 22:27:45',0,'NULL',NULL,'18:30:00','22:50:00',49),(118,'2014-11-21',0,'Apresentação do trabalho e revisão para prova G2',4,'2015-07-21 22:27:45','2015-07-21 22:27:45',0,'NULL',NULL,'18:30:00','22:50:00',49),(119,'2014-11-28',0,'Prova G2',4,'2015-07-21 22:27:45','2015-07-21 22:27:45',0,'NULL',NULL,'18:30:00','22:50:00',49),(120,'2014-12-05',0,'Revisão do conteúdo para substituição',4,'2015-07-21 22:27:45','2015-07-21 22:27:45',0,'NULL',NULL,'18:30:00','22:50:00',49),(121,'2014-12-12',0,'Prova de substituição',4,'2015-07-21 22:27:46','2015-07-21 22:27:46',0,'NULL',NULL,'18:30:00','22:50:00',49);
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
  CONSTRAINT `chamadas_aula_id_foreign` FOREIGN KEY (`aula_id`) REFERENCES `aulas` (`id`),
  CONSTRAINT `chamadas_aluno_id_foreign` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1001 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chamadas`
--

LOCK TABLES `chamadas` WRITE;
/*!40000 ALTER TABLE `chamadas` DISABLE KEYS */;
INSERT INTO `chamadas` VALUES (1,1,21,1,1,1,1,'2015-07-21 22:27:46','2015-07-21 22:27:46'),(2,2,21,1,1,1,1,'2015-07-21 22:27:46','2015-07-21 22:27:46'),(3,27,21,1,1,1,1,'2015-07-21 22:27:46','2015-07-21 22:27:46'),(4,3,21,1,1,1,1,'2015-07-21 22:27:46','2015-07-21 22:27:46'),(5,5,21,1,1,1,1,'2015-07-21 22:27:46','2015-07-21 22:27:46'),(6,28,21,1,1,1,1,'2015-07-21 22:27:46','2015-07-21 22:27:46'),(7,6,21,1,1,1,1,'2015-07-21 22:27:46','2015-07-21 22:27:46'),(8,29,21,1,1,0,0,'2015-07-21 22:27:46','2015-07-21 22:27:46'),(9,30,21,1,1,1,0,'2015-07-21 22:27:46','2015-07-21 22:27:46'),(10,9,21,1,1,1,1,'2015-07-21 22:27:46','2015-07-21 22:27:46'),(11,31,21,1,1,1,1,'2015-07-21 22:27:46','2015-07-21 22:27:46'),(12,10,21,1,1,1,1,'2015-07-21 22:27:46','2015-07-21 22:27:46'),(13,11,21,1,1,1,1,'2015-07-21 22:27:46','2015-07-21 22:27:46'),(14,14,21,1,1,1,1,'2015-07-21 22:27:46','2015-07-21 22:27:46'),(15,32,21,1,1,1,1,'2015-07-21 22:27:46','2015-07-21 22:27:46'),(16,33,21,1,1,1,1,'2015-07-21 22:27:47','2015-07-21 22:27:47'),(17,34,21,1,1,1,0,'2015-07-21 22:27:47','2015-07-21 22:27:47'),(18,15,21,1,1,1,1,'2015-07-21 22:27:47','2015-07-21 22:27:47'),(19,35,21,0,0,0,0,'2015-07-21 22:27:47','2015-07-21 22:27:47'),(20,16,21,0,0,0,0,'2015-07-21 22:27:47','2015-07-21 22:27:47'),(21,36,21,1,1,1,1,'2015-07-21 22:27:47','2015-07-21 22:27:47'),(22,17,21,1,1,1,1,'2015-07-21 22:27:47','2015-07-21 22:27:47'),(23,37,21,1,1,1,1,'2015-07-21 22:27:47','2015-07-21 22:27:47'),(24,38,21,1,1,1,0,'2015-07-21 22:27:47','2015-07-21 22:27:47'),(25,18,21,1,1,1,1,'2015-07-21 22:27:47','2015-07-21 22:27:47'),(26,19,21,1,1,1,1,'2015-07-21 22:27:47','2015-07-21 22:27:47'),(27,39,21,1,1,1,1,'2015-07-21 22:27:47','2015-07-21 22:27:47'),(28,22,21,1,1,1,1,'2015-07-21 22:27:47','2015-07-21 22:27:47'),(29,25,21,1,1,1,1,'2015-07-21 22:27:47','2015-07-21 22:27:47'),(30,26,21,1,1,1,1,'2015-07-21 22:27:47','2015-07-21 22:27:47'),(31,1,23,1,1,1,1,'2015-07-21 22:27:47','2015-07-21 22:27:47'),(32,2,23,1,1,1,1,'2015-07-21 22:27:47','2015-07-21 22:27:47'),(33,27,23,1,1,1,1,'2015-07-21 22:27:48','2015-07-21 22:27:48'),(34,3,23,1,1,1,1,'2015-07-21 22:27:48','2015-07-21 22:27:48'),(35,5,23,0,1,1,1,'2015-07-21 22:27:48','2015-07-21 22:27:48'),(36,28,23,1,1,1,1,'2015-07-21 22:27:48','2015-07-21 22:27:48'),(37,6,23,1,1,1,1,'2015-07-21 22:27:48','2015-07-21 22:27:48'),(38,29,23,0,0,0,0,'2015-07-21 22:27:48','2015-07-21 22:27:48'),(39,30,23,1,1,1,1,'2015-07-21 22:27:48','2015-07-21 22:27:48'),(40,9,23,1,1,1,1,'2015-07-21 22:27:48','2015-07-21 22:27:48'),(41,31,23,1,1,1,1,'2015-07-21 22:27:48','2015-07-21 22:27:48'),(42,10,23,1,1,1,1,'2015-07-21 22:27:48','2015-07-21 22:27:48'),(43,11,23,1,1,1,1,'2015-07-21 22:27:48','2015-07-21 22:27:48'),(44,14,23,1,1,1,1,'2015-07-21 22:27:48','2015-07-21 22:27:48'),(45,32,23,0,0,0,0,'2015-07-21 22:27:48','2015-07-21 22:27:48'),(46,33,23,0,0,0,0,'2015-07-21 22:27:48','2015-07-21 22:27:48'),(47,34,23,0,1,1,1,'2015-07-21 22:27:48','2015-07-21 22:27:48'),(48,15,23,1,1,1,1,'2015-07-21 22:27:49','2015-07-21 22:27:49'),(49,35,23,0,0,0,0,'2015-07-21 22:27:49','2015-07-21 22:27:49'),(50,16,23,1,1,1,1,'2015-07-21 22:27:49','2015-07-21 22:27:49'),(51,36,23,1,1,1,1,'2015-07-21 22:27:49','2015-07-21 22:27:49'),(52,17,23,1,1,1,1,'2015-07-21 22:27:49','2015-07-21 22:27:49'),(53,37,23,0,0,0,0,'2015-07-21 22:27:49','2015-07-21 22:27:49'),(54,38,23,0,0,0,0,'2015-07-21 22:27:49','2015-07-21 22:27:49'),(55,18,23,1,1,1,1,'2015-07-21 22:27:49','2015-07-21 22:27:49'),(56,19,23,1,1,1,1,'2015-07-21 22:27:49','2015-07-21 22:27:49'),(57,39,23,0,1,1,1,'2015-07-21 22:27:49','2015-07-21 22:27:49'),(58,22,23,1,1,1,1,'2015-07-21 22:27:49','2015-07-21 22:27:49'),(59,25,23,1,1,1,1,'2015-07-21 22:27:49','2015-07-21 22:27:49'),(60,26,23,1,1,1,1,'2015-07-21 22:27:49','2015-07-21 22:27:49'),(61,1,24,1,1,1,1,'2015-07-21 22:27:49','2015-07-21 22:27:49'),(62,2,24,0,0,0,0,'2015-07-21 22:27:49','2015-07-21 22:27:49'),(63,27,24,1,1,1,1,'2015-07-21 22:27:50','2015-07-21 22:27:50'),(64,3,24,1,1,1,1,'2015-07-21 22:27:50','2015-07-21 22:27:50'),(65,5,24,1,1,1,1,'2015-07-21 22:27:50','2015-07-21 22:27:50'),(66,28,24,1,1,1,1,'2015-07-21 22:27:50','2015-07-21 22:27:50'),(67,6,24,1,1,1,1,'2015-07-21 22:27:50','2015-07-21 22:27:50'),(68,29,24,0,0,0,0,'2015-07-21 22:27:50','2015-07-21 22:27:50'),(69,30,24,1,1,1,1,'2015-07-21 22:27:50','2015-07-21 22:27:50'),(70,9,24,0,1,1,1,'2015-07-21 22:27:50','2015-07-21 22:27:50'),(71,31,24,1,1,1,1,'2015-07-21 22:27:50','2015-07-21 22:27:50'),(72,10,24,1,1,1,1,'2015-07-21 22:27:50','2015-07-21 22:27:50'),(73,11,24,1,1,1,1,'2015-07-21 22:27:50','2015-07-21 22:27:50'),(74,14,24,1,1,1,1,'2015-07-21 22:27:50','2015-07-21 22:27:50'),(75,32,24,0,0,0,0,'2015-07-21 22:27:50','2015-07-21 22:27:50'),(76,33,24,1,1,1,1,'2015-07-21 22:27:50','2015-07-21 22:27:50'),(77,34,24,1,1,1,1,'2015-07-21 22:27:50','2015-07-21 22:27:50'),(78,15,24,1,1,0,0,'2015-07-21 22:27:50','2015-07-21 22:27:50'),(79,35,24,0,0,0,0,'2015-07-21 22:27:50','2015-07-21 22:27:50'),(80,16,24,1,1,1,1,'2015-07-21 22:27:50','2015-07-21 22:27:50'),(81,36,24,1,1,1,1,'2015-07-21 22:27:50','2015-07-21 22:27:50'),(82,17,24,1,1,1,1,'2015-07-21 22:27:50','2015-07-21 22:27:50'),(83,37,24,0,0,0,0,'2015-07-21 22:27:50','2015-07-21 22:27:50'),(84,38,24,0,0,0,0,'2015-07-21 22:27:50','2015-07-21 22:27:50'),(85,18,24,1,1,1,1,'2015-07-21 22:27:50','2015-07-21 22:27:50'),(86,19,24,1,1,1,1,'2015-07-21 22:27:51','2015-07-21 22:27:51'),(87,39,24,0,1,1,1,'2015-07-21 22:27:51','2015-07-21 22:27:51'),(88,22,24,1,1,1,1,'2015-07-21 22:27:51','2015-07-21 22:27:51'),(89,25,24,1,1,1,1,'2015-07-21 22:27:51','2015-07-21 22:27:51'),(90,26,24,1,1,1,1,'2015-07-21 22:27:51','2015-07-21 22:27:51'),(91,1,25,1,1,1,1,'2015-07-21 22:27:51','2015-07-21 22:27:51'),(92,2,25,1,1,1,1,'2015-07-21 22:27:51','2015-07-21 22:27:51'),(93,27,25,1,1,1,1,'2015-07-21 22:27:51','2015-07-21 22:27:51'),(94,3,25,1,1,1,1,'2015-07-21 22:27:51','2015-07-21 22:27:51'),(95,5,25,1,1,1,1,'2015-07-21 22:27:51','2015-07-21 22:27:51'),(96,28,25,1,1,1,1,'2015-07-21 22:27:51','2015-07-21 22:27:51'),(97,6,25,1,1,1,1,'2015-07-21 22:27:51','2015-07-21 22:27:51'),(98,29,25,0,0,0,0,'2015-07-21 22:27:51','2015-07-21 22:27:51'),(99,30,25,1,1,1,1,'2015-07-21 22:27:51','2015-07-21 22:27:51'),(100,9,25,1,1,1,1,'2015-07-21 22:27:51','2015-07-21 22:27:51'),(101,31,25,1,1,1,1,'2015-07-21 22:27:51','2015-07-21 22:27:51'),(102,10,25,1,1,1,1,'2015-07-21 22:27:51','2015-07-21 22:27:51'),(103,11,25,1,1,1,1,'2015-07-21 22:27:51','2015-07-21 22:27:51'),(104,14,25,0,0,0,0,'2015-07-21 22:27:51','2015-07-21 22:27:51'),(105,32,25,0,0,0,0,'2015-07-21 22:27:51','2015-07-21 22:27:51'),(106,33,25,1,1,1,1,'2015-07-21 22:27:51','2015-07-21 22:27:51'),(107,34,25,0,0,0,0,'2015-07-21 22:27:51','2015-07-21 22:27:51'),(108,15,25,0,0,0,0,'2015-07-21 22:27:51','2015-07-21 22:27:51'),(109,35,25,0,0,0,0,'2015-07-21 22:27:51','2015-07-21 22:27:51'),(110,16,25,0,0,0,0,'2015-07-21 22:27:51','2015-07-21 22:27:51'),(111,36,25,1,1,1,1,'2015-07-21 22:27:51','2015-07-21 22:27:51'),(112,17,25,1,1,1,1,'2015-07-21 22:27:51','2015-07-21 22:27:51'),(113,37,25,0,0,0,0,'2015-07-21 22:27:51','2015-07-21 22:27:51'),(114,38,25,0,0,0,0,'2015-07-21 22:27:51','2015-07-21 22:27:51'),(115,18,25,1,1,1,1,'2015-07-21 22:27:52','2015-07-21 22:27:52'),(116,19,25,1,1,1,1,'2015-07-21 22:27:53','2015-07-21 22:27:53'),(117,39,25,0,0,1,1,'2015-07-21 22:27:53','2015-07-21 22:27:53'),(118,22,25,1,1,1,1,'2015-07-21 22:27:53','2015-07-21 22:27:53'),(119,25,25,1,1,1,1,'2015-07-21 22:27:53','2015-07-21 22:27:53'),(120,26,25,1,1,1,1,'2015-07-21 22:27:53','2015-07-21 22:27:53'),(121,1,26,1,1,1,1,'2015-07-21 22:27:53','2015-07-21 22:27:53'),(122,2,26,1,1,1,1,'2015-07-21 22:27:53','2015-07-21 22:27:53'),(123,27,26,0,0,0,0,'2015-07-21 22:27:53','2015-07-21 22:27:53'),(124,3,26,1,1,1,1,'2015-07-21 22:27:53','2015-07-21 22:27:53'),(125,5,26,1,1,1,1,'2015-07-21 22:27:53','2015-07-21 22:27:53'),(126,28,26,1,1,1,1,'2015-07-21 22:27:53','2015-07-21 22:27:53'),(127,6,26,1,1,1,1,'2015-07-21 22:27:53','2015-07-21 22:27:53'),(128,29,26,0,0,0,0,'2015-07-21 22:27:54','2015-07-21 22:27:54'),(129,30,26,0,0,0,0,'2015-07-21 22:27:54','2015-07-21 22:27:54'),(130,9,26,1,1,1,1,'2015-07-21 22:27:54','2015-07-21 22:27:54'),(131,31,26,0,0,0,0,'2015-07-21 22:27:54','2015-07-21 22:27:54'),(132,10,26,1,1,1,1,'2015-07-21 22:27:54','2015-07-21 22:27:54'),(133,11,26,1,1,1,1,'2015-07-21 22:27:54','2015-07-21 22:27:54'),(134,14,26,1,1,1,1,'2015-07-21 22:27:54','2015-07-21 22:27:54'),(135,32,26,0,0,0,0,'2015-07-21 22:27:54','2015-07-21 22:27:54'),(136,33,26,0,0,0,0,'2015-07-21 22:27:54','2015-07-21 22:27:54'),(137,34,26,0,0,0,0,'2015-07-21 22:27:54','2015-07-21 22:27:54'),(138,15,26,1,1,1,1,'2015-07-21 22:27:54','2015-07-21 22:27:54'),(139,35,26,0,0,0,0,'2015-07-21 22:27:54','2015-07-21 22:27:54'),(140,16,26,1,1,1,1,'2015-07-21 22:27:54','2015-07-21 22:27:54'),(141,36,26,1,1,1,1,'2015-07-21 22:27:54','2015-07-21 22:27:54'),(142,17,26,1,1,1,1,'2015-07-21 22:27:54','2015-07-21 22:27:54'),(143,37,26,0,0,0,0,'2015-07-21 22:27:54','2015-07-21 22:27:54'),(144,38,26,0,0,0,0,'2015-07-21 22:27:54','2015-07-21 22:27:54'),(145,18,26,1,1,1,1,'2015-07-21 22:27:54','2015-07-21 22:27:54'),(146,19,26,1,1,1,1,'2015-07-21 22:27:55','2015-07-21 22:27:55'),(147,39,26,1,1,1,1,'2015-07-21 22:27:55','2015-07-21 22:27:55'),(148,22,26,1,1,1,1,'2015-07-21 22:27:55','2015-07-21 22:27:55'),(149,25,26,1,1,1,1,'2015-07-21 22:27:55','2015-07-21 22:27:55'),(150,26,26,1,1,1,1,'2015-07-21 22:27:55','2015-07-21 22:27:55'),(151,1,27,1,1,0,0,'2015-07-21 22:27:55','2015-07-21 22:27:55'),(152,2,27,1,1,1,1,'2015-07-21 22:27:55','2015-07-21 22:27:55'),(153,27,27,1,1,0,0,'2015-07-21 22:27:55','2015-07-21 22:27:55'),(154,3,27,1,1,1,1,'2015-07-21 22:27:55','2015-07-21 22:27:55'),(155,5,27,1,1,1,1,'2015-07-21 22:27:55','2015-07-21 22:27:55'),(156,28,27,1,1,1,1,'2015-07-21 22:27:55','2015-07-21 22:27:55'),(157,6,27,0,0,1,1,'2015-07-21 22:27:55','2015-07-21 22:27:55'),(158,29,27,0,0,1,1,'2015-07-21 22:27:55','2015-07-21 22:27:55'),(159,30,27,0,0,1,1,'2015-07-21 22:27:55','2015-07-21 22:27:55'),(160,9,27,1,1,1,1,'2015-07-21 22:27:55','2015-07-21 22:27:55'),(161,31,27,0,0,0,0,'2015-07-21 22:27:55','2015-07-21 22:27:55'),(162,10,27,1,1,1,1,'2015-07-21 22:27:55','2015-07-21 22:27:55'),(163,11,27,1,1,0,0,'2015-07-21 22:27:55','2015-07-21 22:27:55'),(164,14,27,1,1,1,1,'2015-07-21 22:27:55','2015-07-21 22:27:55'),(165,32,27,0,0,0,0,'2015-07-21 22:27:55','2015-07-21 22:27:55'),(166,33,27,1,1,0,0,'2015-07-21 22:27:55','2015-07-21 22:27:55'),(167,34,27,0,0,0,0,'2015-07-21 22:27:56','2015-07-21 22:27:56'),(168,15,27,1,1,1,1,'2015-07-21 22:27:56','2015-07-21 22:27:56'),(169,35,27,0,0,0,0,'2015-07-21 22:27:56','2015-07-21 22:27:56'),(170,16,27,1,1,1,1,'2015-07-21 22:27:56','2015-07-21 22:27:56'),(171,36,27,1,1,1,1,'2015-07-21 22:27:56','2015-07-21 22:27:56'),(172,17,27,1,1,1,1,'2015-07-21 22:27:56','2015-07-21 22:27:56'),(173,37,27,0,0,0,0,'2015-07-21 22:27:56','2015-07-21 22:27:56'),(174,38,27,0,0,0,0,'2015-07-21 22:27:56','2015-07-21 22:27:56'),(175,18,27,1,1,1,1,'2015-07-21 22:27:56','2015-07-21 22:27:56'),(176,19,27,1,1,0,0,'2015-07-21 22:27:56','2015-07-21 22:27:56'),(177,39,27,1,1,0,0,'2015-07-21 22:27:56','2015-07-21 22:27:56'),(178,22,27,1,1,1,1,'2015-07-21 22:27:56','2015-07-21 22:27:56'),(179,25,27,1,1,0,0,'2015-07-21 22:27:56','2015-07-21 22:27:56'),(180,26,27,1,1,1,1,'2015-07-21 22:27:56','2015-07-21 22:27:56'),(181,1,28,1,1,1,1,'2015-07-21 22:27:56','2015-07-21 22:27:56'),(182,2,28,1,1,1,1,'2015-07-21 22:27:56','2015-07-21 22:27:56'),(183,27,28,1,1,1,1,'2015-07-21 22:27:56','2015-07-21 22:27:56'),(184,3,28,1,1,1,1,'2015-07-21 22:27:56','2015-07-21 22:27:56'),(185,5,28,1,1,1,1,'2015-07-21 22:27:56','2015-07-21 22:27:56'),(186,28,28,1,1,1,1,'2015-07-21 22:27:56','2015-07-21 22:27:56'),(187,6,28,1,1,1,1,'2015-07-21 22:27:56','2015-07-21 22:27:56'),(188,29,28,1,1,1,1,'2015-07-21 22:27:56','2015-07-21 22:27:56'),(189,30,28,1,1,1,1,'2015-07-21 22:27:56','2015-07-21 22:27:56'),(190,9,28,1,1,1,1,'2015-07-21 22:27:56','2015-07-21 22:27:56'),(191,31,28,0,0,0,0,'2015-07-21 22:27:56','2015-07-21 22:27:56'),(192,10,28,1,1,1,1,'2015-07-21 22:27:56','2015-07-21 22:27:56'),(193,11,28,1,1,1,0,'2015-07-21 22:27:56','2015-07-21 22:27:56'),(194,14,28,1,1,1,1,'2015-07-21 22:27:56','2015-07-21 22:27:56'),(195,32,28,0,0,0,0,'2015-07-21 22:27:57','2015-07-21 22:27:57'),(196,33,28,1,1,1,0,'2015-07-21 22:27:57','2015-07-21 22:27:57'),(197,34,28,0,0,0,0,'2015-07-21 22:27:57','2015-07-21 22:27:57'),(198,15,28,1,1,1,1,'2015-07-21 22:27:57','2015-07-21 22:27:57'),(199,35,28,0,0,0,0,'2015-07-21 22:27:57','2015-07-21 22:27:57'),(200,16,28,1,1,1,1,'2015-07-21 22:27:57','2015-07-21 22:27:57'),(201,36,28,0,0,0,0,'2015-07-21 22:27:57','2015-07-21 22:27:57'),(202,17,28,1,1,1,1,'2015-07-21 22:27:57','2015-07-21 22:27:57'),(203,37,28,0,0,0,0,'2015-07-21 22:27:57','2015-07-21 22:27:57'),(204,38,28,0,0,0,0,'2015-07-21 22:27:57','2015-07-21 22:27:57'),(205,18,28,1,1,1,1,'2015-07-21 22:27:57','2015-07-21 22:27:57'),(206,19,28,1,1,1,1,'2015-07-21 22:27:57','2015-07-21 22:27:57'),(207,39,28,1,1,1,1,'2015-07-21 22:27:57','2015-07-21 22:27:57'),(208,22,28,1,1,1,1,'2015-07-21 22:27:57','2015-07-21 22:27:57'),(209,25,28,1,1,1,1,'2015-07-21 22:27:57','2015-07-21 22:27:57'),(210,26,28,1,1,1,1,'2015-07-21 22:27:57','2015-07-21 22:27:57'),(211,1,29,0,0,0,0,'2015-07-21 22:27:57','2015-07-21 22:27:57'),(212,2,29,1,1,1,1,'2015-07-21 22:27:57','2015-07-21 22:27:57'),(213,27,29,1,1,1,1,'2015-07-21 22:27:57','2015-07-21 22:27:57'),(214,3,29,1,1,1,1,'2015-07-21 22:27:57','2015-07-21 22:27:57'),(215,5,29,1,1,1,1,'2015-07-21 22:27:57','2015-07-21 22:27:57'),(216,28,29,1,1,1,1,'2015-07-21 22:27:57','2015-07-21 22:27:57'),(217,6,29,1,1,1,1,'2015-07-21 22:27:57','2015-07-21 22:27:57'),(218,29,29,0,0,0,0,'2015-07-21 22:27:58','2015-07-21 22:27:58'),(219,30,29,0,0,0,0,'2015-07-21 22:27:58','2015-07-21 22:27:58'),(220,9,29,0,0,1,1,'2015-07-21 22:27:58','2015-07-21 22:27:58'),(221,31,29,0,0,0,0,'2015-07-21 22:27:58','2015-07-21 22:27:58'),(222,10,29,1,1,1,1,'2015-07-21 22:27:58','2015-07-21 22:27:58'),(223,11,29,0,0,0,1,'2015-07-21 22:27:58','2015-07-21 22:27:58'),(224,14,29,1,1,1,1,'2015-07-21 22:27:58','2015-07-21 22:27:58'),(225,32,29,0,0,0,0,'2015-07-21 22:27:58','2015-07-21 22:27:58'),(226,33,29,0,0,0,1,'2015-07-21 22:27:58','2015-07-21 22:27:58'),(227,34,29,0,0,0,0,'2015-07-21 22:27:58','2015-07-21 22:27:58'),(228,15,29,1,1,1,1,'2015-07-21 22:27:58','2015-07-21 22:27:58'),(229,35,29,0,0,0,0,'2015-07-21 22:27:58','2015-07-21 22:27:58'),(230,16,29,1,1,1,1,'2015-07-21 22:27:58','2015-07-21 22:27:58'),(231,36,29,0,0,0,0,'2015-07-21 22:27:58','2015-07-21 22:27:58'),(232,17,29,1,1,1,1,'2015-07-21 22:27:58','2015-07-21 22:27:58'),(233,37,29,0,0,0,0,'2015-07-21 22:27:58','2015-07-21 22:27:58'),(234,38,29,0,0,0,0,'2015-07-21 22:27:58','2015-07-21 22:27:58'),(235,18,29,1,1,1,1,'2015-07-21 22:27:58','2015-07-21 22:27:58'),(236,19,29,1,1,1,1,'2015-07-21 22:27:58','2015-07-21 22:27:58'),(237,39,29,0,0,0,0,'2015-07-21 22:27:58','2015-07-21 22:27:58'),(238,22,29,1,1,1,1,'2015-07-21 22:27:58','2015-07-21 22:27:58'),(239,25,29,0,0,0,0,'2015-07-21 22:27:58','2015-07-21 22:27:58'),(240,26,29,1,1,1,1,'2015-07-21 22:27:58','2015-07-21 22:27:58'),(241,1,30,1,1,1,1,'2015-07-21 22:27:58','2015-07-21 22:27:58'),(242,2,30,1,1,1,1,'2015-07-21 22:27:58','2015-07-21 22:27:58'),(243,27,30,1,1,1,1,'2015-07-21 22:27:58','2015-07-21 22:27:58'),(244,3,30,1,1,1,1,'2015-07-21 22:27:59','2015-07-21 22:27:59'),(245,5,30,1,1,1,1,'2015-07-21 22:27:59','2015-07-21 22:27:59'),(246,28,30,1,1,1,1,'2015-07-21 22:27:59','2015-07-21 22:27:59'),(247,6,30,1,1,1,1,'2015-07-21 22:27:59','2015-07-21 22:27:59'),(248,29,30,1,1,1,1,'2015-07-21 22:27:59','2015-07-21 22:27:59'),(249,30,30,1,1,1,1,'2015-07-21 22:27:59','2015-07-21 22:27:59'),(250,9,30,1,1,1,1,'2015-07-21 22:27:59','2015-07-21 22:27:59'),(251,31,30,0,0,0,0,'2015-07-21 22:28:00','2015-07-21 22:28:00'),(252,10,30,1,1,1,1,'2015-07-21 22:28:00','2015-07-21 22:28:00'),(253,11,30,1,1,1,1,'2015-07-21 22:28:00','2015-07-21 22:28:00'),(254,14,30,1,1,1,1,'2015-07-21 22:28:00','2015-07-21 22:28:00'),(255,32,30,0,0,0,0,'2015-07-21 22:28:00','2015-07-21 22:28:00'),(256,33,30,1,1,1,1,'2015-07-21 22:28:00','2015-07-21 22:28:00'),(257,34,30,0,0,0,0,'2015-07-21 22:28:00','2015-07-21 22:28:00'),(258,15,30,1,1,1,1,'2015-07-21 22:28:00','2015-07-21 22:28:00'),(259,35,30,0,0,0,0,'2015-07-21 22:28:00','2015-07-21 22:28:00'),(260,16,30,1,1,1,1,'2015-07-21 22:28:00','2015-07-21 22:28:00'),(261,36,30,1,1,1,1,'2015-07-21 22:28:00','2015-07-21 22:28:00'),(262,17,30,1,1,1,1,'2015-07-21 22:28:00','2015-07-21 22:28:00'),(263,37,30,0,0,0,0,'2015-07-21 22:28:00','2015-07-21 22:28:00'),(264,38,30,0,0,0,0,'2015-07-21 22:28:00','2015-07-21 22:28:00'),(265,18,30,1,1,1,1,'2015-07-21 22:28:00','2015-07-21 22:28:00'),(266,19,30,1,1,1,1,'2015-07-21 22:28:00','2015-07-21 22:28:00'),(267,39,30,1,1,1,1,'2015-07-21 22:28:00','2015-07-21 22:28:00'),(268,22,30,1,1,1,1,'2015-07-21 22:28:00','2015-07-21 22:28:00'),(269,25,30,1,1,1,1,'2015-07-21 22:28:00','2015-07-21 22:28:00'),(270,26,30,1,1,1,1,'2015-07-21 22:28:00','2015-07-21 22:28:00'),(271,1,31,1,1,1,1,'2015-07-21 22:28:00','2015-07-21 22:28:00'),(272,2,31,1,1,1,1,'2015-07-21 22:28:00','2015-07-21 22:28:00'),(273,27,31,1,1,1,1,'2015-07-21 22:28:00','2015-07-21 22:28:00'),(274,3,31,1,1,1,1,'2015-07-21 22:28:00','2015-07-21 22:28:00'),(275,5,31,1,1,1,1,'2015-07-21 22:28:00','2015-07-21 22:28:00'),(276,28,31,1,1,1,1,'2015-07-21 22:28:01','2015-07-21 22:28:01'),(277,6,31,1,1,1,1,'2015-07-21 22:28:01','2015-07-21 22:28:01'),(278,29,31,0,0,0,0,'2015-07-21 22:28:01','2015-07-21 22:28:01'),(279,30,31,0,0,0,0,'2015-07-21 22:28:01','2015-07-21 22:28:01'),(280,9,31,1,1,1,1,'2015-07-21 22:28:01','2015-07-21 22:28:01'),(281,31,31,0,0,0,0,'2015-07-21 22:28:01','2015-07-21 22:28:01'),(282,10,31,1,1,1,1,'2015-07-21 22:28:01','2015-07-21 22:28:01'),(283,11,31,1,1,1,1,'2015-07-21 22:28:01','2015-07-21 22:28:01'),(284,14,31,1,1,1,1,'2015-07-21 22:28:01','2015-07-21 22:28:01'),(285,32,31,0,0,0,0,'2015-07-21 22:28:01','2015-07-21 22:28:01'),(286,33,31,0,0,0,0,'2015-07-21 22:28:01','2015-07-21 22:28:01'),(287,34,31,0,0,0,0,'2015-07-21 22:28:01','2015-07-21 22:28:01'),(288,15,31,1,1,1,1,'2015-07-21 22:28:01','2015-07-21 22:28:01'),(289,35,31,0,0,0,0,'2015-07-21 22:28:01','2015-07-21 22:28:01'),(290,16,31,1,1,1,1,'2015-07-21 22:28:01','2015-07-21 22:28:01'),(291,36,31,0,0,0,0,'2015-07-21 22:28:01','2015-07-21 22:28:01'),(292,17,31,1,1,1,1,'2015-07-21 22:28:01','2015-07-21 22:28:01'),(293,37,31,0,0,0,0,'2015-07-21 22:28:01','2015-07-21 22:28:01'),(294,38,31,0,0,0,0,'2015-07-21 22:28:01','2015-07-21 22:28:01'),(295,18,31,1,1,1,1,'2015-07-21 22:28:01','2015-07-21 22:28:01'),(296,19,31,1,1,1,1,'2015-07-21 22:28:01','2015-07-21 22:28:01'),(297,39,31,1,1,1,1,'2015-07-21 22:28:01','2015-07-21 22:28:01'),(298,22,31,1,1,1,1,'2015-07-21 22:28:01','2015-07-21 22:28:01'),(299,25,31,1,1,1,1,'2015-07-21 22:28:01','2015-07-21 22:28:01'),(300,26,31,1,1,1,1,'2015-07-21 22:28:01','2015-07-21 22:28:01'),(301,1,32,1,1,1,1,'2015-07-21 22:28:01','2015-07-21 22:28:01'),(302,2,32,1,1,1,1,'2015-07-21 22:28:01','2015-07-21 22:28:01'),(303,27,32,1,1,1,1,'2015-07-21 22:28:01','2015-07-21 22:28:01'),(304,3,32,1,1,1,1,'2015-07-21 22:28:01','2015-07-21 22:28:01'),(305,5,32,1,1,1,1,'2015-07-21 22:28:01','2015-07-21 22:28:01'),(306,28,32,1,1,1,1,'2015-07-21 22:28:02','2015-07-21 22:28:02'),(307,6,32,1,1,1,1,'2015-07-21 22:28:02','2015-07-21 22:28:02'),(308,29,32,1,1,1,1,'2015-07-21 22:28:02','2015-07-21 22:28:02'),(309,30,32,1,1,1,1,'2015-07-21 22:28:02','2015-07-21 22:28:02'),(310,9,32,1,1,1,1,'2015-07-21 22:28:02','2015-07-21 22:28:02'),(311,31,32,0,0,0,0,'2015-07-21 22:28:02','2015-07-21 22:28:02'),(312,10,32,1,1,1,1,'2015-07-21 22:28:02','2015-07-21 22:28:02'),(313,11,32,1,1,1,1,'2015-07-21 22:28:02','2015-07-21 22:28:02'),(314,14,32,1,1,1,1,'2015-07-21 22:28:02','2015-07-21 22:28:02'),(315,32,32,0,0,0,0,'2015-07-21 22:28:02','2015-07-21 22:28:02'),(316,33,32,0,0,0,0,'2015-07-21 22:28:02','2015-07-21 22:28:02'),(317,34,32,0,0,0,0,'2015-07-21 22:28:02','2015-07-21 22:28:02'),(318,15,32,1,1,1,1,'2015-07-21 22:28:02','2015-07-21 22:28:02'),(319,35,32,0,0,0,0,'2015-07-21 22:28:02','2015-07-21 22:28:02'),(320,16,32,1,1,1,1,'2015-07-21 22:28:02','2015-07-21 22:28:02'),(321,36,32,1,1,1,1,'2015-07-21 22:28:02','2015-07-21 22:28:02'),(322,17,32,1,1,1,1,'2015-07-21 22:28:02','2015-07-21 22:28:02'),(323,37,32,0,0,0,0,'2015-07-21 22:28:02','2015-07-21 22:28:02'),(324,38,32,0,0,0,0,'2015-07-21 22:28:02','2015-07-21 22:28:02'),(325,18,32,1,1,1,1,'2015-07-21 22:28:02','2015-07-21 22:28:02'),(326,19,32,1,1,1,1,'2015-07-21 22:28:02','2015-07-21 22:28:02'),(327,39,32,1,1,1,1,'2015-07-21 22:28:02','2015-07-21 22:28:02'),(328,22,32,1,1,1,1,'2015-07-21 22:28:03','2015-07-21 22:28:03'),(329,25,32,1,1,1,1,'2015-07-21 22:28:03','2015-07-21 22:28:03'),(330,26,32,1,1,1,1,'2015-07-21 22:28:03','2015-07-21 22:28:03'),(331,1,33,1,1,1,1,'2015-07-21 22:28:03','2015-07-21 22:28:03'),(332,2,33,1,1,1,1,'2015-07-21 22:28:03','2015-07-21 22:28:03'),(333,27,33,1,1,1,1,'2015-07-21 22:28:03','2015-07-21 22:28:03'),(334,3,33,1,1,1,1,'2015-07-21 22:28:03','2015-07-21 22:28:03'),(335,5,33,1,1,1,1,'2015-07-21 22:28:03','2015-07-21 22:28:03'),(336,28,33,1,1,1,1,'2015-07-21 22:28:03','2015-07-21 22:28:03'),(337,6,33,1,1,1,1,'2015-07-21 22:28:03','2015-07-21 22:28:03'),(338,29,33,1,1,1,1,'2015-07-21 22:28:03','2015-07-21 22:28:03'),(339,30,33,1,1,1,1,'2015-07-21 22:28:03','2015-07-21 22:28:03'),(340,9,33,1,1,1,1,'2015-07-21 22:28:03','2015-07-21 22:28:03'),(341,31,33,0,0,0,0,'2015-07-21 22:28:03','2015-07-21 22:28:03'),(342,10,33,1,1,1,1,'2015-07-21 22:28:03','2015-07-21 22:28:03'),(343,11,33,1,1,1,1,'2015-07-21 22:28:03','2015-07-21 22:28:03'),(344,14,33,1,1,1,1,'2015-07-21 22:28:03','2015-07-21 22:28:03'),(345,32,33,0,0,0,0,'2015-07-21 22:28:03','2015-07-21 22:28:03'),(346,33,33,0,0,0,0,'2015-07-21 22:28:03','2015-07-21 22:28:03'),(347,34,33,0,0,0,0,'2015-07-21 22:28:04','2015-07-21 22:28:04'),(348,15,33,1,1,1,1,'2015-07-21 22:28:04','2015-07-21 22:28:04'),(349,35,33,0,0,0,0,'2015-07-21 22:28:04','2015-07-21 22:28:04'),(350,16,33,1,1,1,1,'2015-07-21 22:28:04','2015-07-21 22:28:04'),(351,36,33,1,1,1,1,'2015-07-21 22:28:04','2015-07-21 22:28:04'),(352,17,33,1,1,1,1,'2015-07-21 22:28:04','2015-07-21 22:28:04'),(353,37,33,0,0,0,0,'2015-07-21 22:28:04','2015-07-21 22:28:04'),(354,38,33,0,0,0,0,'2015-07-21 22:28:04','2015-07-21 22:28:04'),(355,18,33,1,1,1,1,'2015-07-21 22:28:04','2015-07-21 22:28:04'),(356,19,33,1,1,1,1,'2015-07-21 22:28:04','2015-07-21 22:28:04'),(357,39,33,1,1,1,1,'2015-07-21 22:28:04','2015-07-21 22:28:04'),(358,22,33,1,1,1,1,'2015-07-21 22:28:04','2015-07-21 22:28:04'),(359,25,33,1,1,1,1,'2015-07-21 22:28:04','2015-07-21 22:28:04'),(360,26,33,1,1,1,1,'2015-07-21 22:28:04','2015-07-21 22:28:04'),(361,1,34,1,1,1,1,'2015-07-21 22:28:04','2015-07-21 22:28:04'),(362,2,34,1,1,1,1,'2015-07-21 22:28:04','2015-07-21 22:28:04'),(363,27,34,0,0,0,0,'2015-07-21 22:28:04','2015-07-21 22:28:04'),(364,3,34,1,1,1,1,'2015-07-21 22:28:04','2015-07-21 22:28:04'),(365,5,34,1,1,1,1,'2015-07-21 22:28:04','2015-07-21 22:28:04'),(366,28,34,1,1,1,1,'2015-07-21 22:28:04','2015-07-21 22:28:04'),(367,6,34,1,1,1,1,'2015-07-21 22:28:04','2015-07-21 22:28:04'),(368,29,34,0,0,0,0,'2015-07-21 22:28:04','2015-07-21 22:28:04'),(369,30,34,0,0,0,0,'2015-07-21 22:28:04','2015-07-21 22:28:04'),(370,9,34,1,1,1,1,'2015-07-21 22:28:04','2015-07-21 22:28:04'),(371,31,34,0,0,0,0,'2015-07-21 22:28:05','2015-07-21 22:28:05'),(372,10,34,1,1,1,1,'2015-07-21 22:28:05','2015-07-21 22:28:05'),(373,11,34,1,1,1,1,'2015-07-21 22:28:05','2015-07-21 22:28:05'),(374,14,34,1,1,1,1,'2015-07-21 22:28:05','2015-07-21 22:28:05'),(375,32,34,0,0,0,0,'2015-07-21 22:28:05','2015-07-21 22:28:05'),(376,33,34,0,0,0,0,'2015-07-21 22:28:05','2015-07-21 22:28:05'),(377,34,34,0,0,0,0,'2015-07-21 22:28:05','2015-07-21 22:28:05'),(378,15,34,1,1,1,1,'2015-07-21 22:28:05','2015-07-21 22:28:05'),(379,35,34,0,0,0,0,'2015-07-21 22:28:05','2015-07-21 22:28:05'),(380,16,34,1,1,1,1,'2015-07-21 22:28:05','2015-07-21 22:28:05'),(381,36,34,0,0,0,0,'2015-07-21 22:28:05','2015-07-21 22:28:05'),(382,17,34,1,1,1,1,'2015-07-21 22:28:05','2015-07-21 22:28:05'),(383,37,34,0,0,0,0,'2015-07-21 22:28:05','2015-07-21 22:28:05'),(384,38,34,0,0,0,0,'2015-07-21 22:28:05','2015-07-21 22:28:05'),(385,18,34,1,1,1,1,'2015-07-21 22:28:05','2015-07-21 22:28:05'),(386,19,34,1,1,1,1,'2015-07-21 22:28:05','2015-07-21 22:28:05'),(387,39,34,1,1,1,1,'2015-07-21 22:28:05','2015-07-21 22:28:05'),(388,22,34,1,1,1,1,'2015-07-21 22:28:05','2015-07-21 22:28:05'),(389,25,34,1,1,1,1,'2015-07-21 22:28:05','2015-07-21 22:28:05'),(390,26,34,1,1,1,1,'2015-07-21 22:28:05','2015-07-21 22:28:05'),(391,1,35,1,1,0,0,'2015-07-21 22:28:05','2015-07-21 22:28:05'),(392,2,35,1,1,1,1,'2015-07-21 22:28:05','2015-07-21 22:28:05'),(393,27,35,0,0,0,0,'2015-07-21 22:28:05','2015-07-21 22:28:05'),(394,3,35,1,1,1,1,'2015-07-21 22:28:05','2015-07-21 22:28:05'),(395,5,35,1,1,1,1,'2015-07-21 22:28:05','2015-07-21 22:28:05'),(396,28,35,1,1,1,1,'2015-07-21 22:28:05','2015-07-21 22:28:05'),(397,6,35,1,1,1,1,'2015-07-21 22:28:05','2015-07-21 22:28:05'),(398,29,35,0,0,0,0,'2015-07-21 22:28:06','2015-07-21 22:28:06'),(399,30,35,0,0,0,0,'2015-07-21 22:28:06','2015-07-21 22:28:06'),(400,9,35,1,1,1,0,'2015-07-21 22:28:06','2015-07-21 22:28:06'),(401,31,35,0,0,0,0,'2015-07-21 22:28:06','2015-07-21 22:28:06'),(402,10,35,1,1,1,1,'2015-07-21 22:28:06','2015-07-21 22:28:06'),(403,11,35,0,0,0,0,'2015-07-21 22:28:06','2015-07-21 22:28:06'),(404,14,35,1,1,0,0,'2015-07-21 22:28:06','2015-07-21 22:28:06'),(405,32,35,0,0,0,0,'2015-07-21 22:28:06','2015-07-21 22:28:06'),(406,33,35,0,0,0,0,'2015-07-21 22:28:06','2015-07-21 22:28:06'),(407,34,35,0,0,0,0,'2015-07-21 22:28:06','2015-07-21 22:28:06'),(408,15,35,0,0,0,0,'2015-07-21 22:28:06','2015-07-21 22:28:06'),(409,35,35,0,0,0,0,'2015-07-21 22:28:06','2015-07-21 22:28:06'),(410,16,35,0,0,0,0,'2015-07-21 22:28:06','2015-07-21 22:28:06'),(411,36,35,0,0,0,0,'2015-07-21 22:28:06','2015-07-21 22:28:06'),(412,17,35,1,1,1,1,'2015-07-21 22:28:06','2015-07-21 22:28:06'),(413,37,35,0,0,0,0,'2015-07-21 22:28:06','2015-07-21 22:28:06'),(414,38,35,0,0,0,0,'2015-07-21 22:28:06','2015-07-21 22:28:06'),(415,18,35,0,0,0,0,'2015-07-21 22:28:06','2015-07-21 22:28:06'),(416,19,35,1,1,1,1,'2015-07-21 22:28:06','2015-07-21 22:28:06'),(417,39,35,0,0,0,0,'2015-07-21 22:28:06','2015-07-21 22:28:06'),(418,22,35,1,1,1,1,'2015-07-21 22:28:06','2015-07-21 22:28:06'),(419,25,35,1,1,1,1,'2015-07-21 22:28:06','2015-07-21 22:28:06'),(420,26,35,1,1,1,1,'2015-07-21 22:28:06','2015-07-21 22:28:06'),(421,1,36,1,1,1,1,'2015-07-21 22:28:06','2015-07-21 22:28:06'),(422,2,36,1,1,1,1,'2015-07-21 22:28:06','2015-07-21 22:28:06'),(423,27,36,1,1,1,1,'2015-07-21 22:28:06','2015-07-21 22:28:06'),(424,3,36,1,1,1,1,'2015-07-21 22:28:06','2015-07-21 22:28:06'),(425,5,36,1,1,1,1,'2015-07-21 22:28:06','2015-07-21 22:28:06'),(426,28,36,1,1,1,1,'2015-07-21 22:28:06','2015-07-21 22:28:06'),(427,6,36,1,1,1,1,'2015-07-21 22:28:07','2015-07-21 22:28:07'),(428,29,36,1,1,1,1,'2015-07-21 22:28:07','2015-07-21 22:28:07'),(429,30,36,0,0,0,0,'2015-07-21 22:28:07','2015-07-21 22:28:07'),(430,9,36,1,1,1,1,'2015-07-21 22:28:07','2015-07-21 22:28:07'),(431,31,36,0,0,0,0,'2015-07-21 22:28:07','2015-07-21 22:28:07'),(432,10,36,1,1,1,1,'2015-07-21 22:28:07','2015-07-21 22:28:07'),(433,11,36,1,1,1,1,'2015-07-21 22:28:07','2015-07-21 22:28:07'),(434,14,36,1,1,1,1,'2015-07-21 22:28:07','2015-07-21 22:28:07'),(435,32,36,0,0,0,0,'2015-07-21 22:28:07','2015-07-21 22:28:07'),(436,33,36,0,0,0,0,'2015-07-21 22:28:07','2015-07-21 22:28:07'),(437,34,36,0,0,0,0,'2015-07-21 22:28:07','2015-07-21 22:28:07'),(438,15,36,1,1,1,1,'2015-07-21 22:28:07','2015-07-21 22:28:07'),(439,35,36,0,0,0,0,'2015-07-21 22:28:07','2015-07-21 22:28:07'),(440,16,36,1,1,1,1,'2015-07-21 22:28:07','2015-07-21 22:28:07'),(441,36,36,0,0,0,0,'2015-07-21 22:28:07','2015-07-21 22:28:07'),(442,17,36,1,1,1,1,'2015-07-21 22:28:07','2015-07-21 22:28:07'),(443,37,36,0,0,0,0,'2015-07-21 22:28:07','2015-07-21 22:28:07'),(444,38,36,0,0,0,0,'2015-07-21 22:28:07','2015-07-21 22:28:07'),(445,18,36,1,1,1,1,'2015-07-21 22:28:07','2015-07-21 22:28:07'),(446,19,36,1,1,1,1,'2015-07-21 22:28:07','2015-07-21 22:28:07'),(447,39,36,0,0,0,0,'2015-07-21 22:28:07','2015-07-21 22:28:07'),(448,22,36,1,1,1,1,'2015-07-21 22:28:07','2015-07-21 22:28:07'),(449,25,36,1,1,1,1,'2015-07-21 22:28:07','2015-07-21 22:28:07'),(450,26,36,1,1,1,1,'2015-07-21 22:28:07','2015-07-21 22:28:07'),(451,1,37,1,1,1,1,'2015-07-21 22:28:08','2015-07-21 22:28:08'),(452,2,37,1,1,1,1,'2015-07-21 22:28:08','2015-07-21 22:28:08'),(453,27,37,0,0,0,0,'2015-07-21 22:28:08','2015-07-21 22:28:08'),(454,3,37,1,1,1,1,'2015-07-21 22:28:08','2015-07-21 22:28:08'),(455,5,37,1,1,1,1,'2015-07-21 22:28:08','2015-07-21 22:28:08'),(456,28,37,1,1,1,1,'2015-07-21 22:28:08','2015-07-21 22:28:08'),(457,6,37,1,1,1,1,'2015-07-21 22:28:08','2015-07-21 22:28:08'),(458,29,37,0,0,0,0,'2015-07-21 22:28:08','2015-07-21 22:28:08'),(459,30,37,0,0,0,0,'2015-07-21 22:28:08','2015-07-21 22:28:08'),(460,9,37,1,1,1,1,'2015-07-21 22:28:08','2015-07-21 22:28:08'),(461,31,37,0,0,0,0,'2015-07-21 22:28:08','2015-07-21 22:28:08'),(462,10,37,1,1,1,1,'2015-07-21 22:28:08','2015-07-21 22:28:08'),(463,11,37,1,1,1,1,'2015-07-21 22:28:08','2015-07-21 22:28:08'),(464,14,37,1,1,1,1,'2015-07-21 22:28:08','2015-07-21 22:28:08'),(465,32,37,0,0,0,0,'2015-07-21 22:28:08','2015-07-21 22:28:08'),(466,33,37,0,0,0,0,'2015-07-21 22:28:08','2015-07-21 22:28:08'),(467,34,37,0,0,0,0,'2015-07-21 22:28:08','2015-07-21 22:28:08'),(468,15,37,1,1,1,1,'2015-07-21 22:28:08','2015-07-21 22:28:08'),(469,35,37,0,0,0,0,'2015-07-21 22:28:08','2015-07-21 22:28:08'),(470,16,37,1,1,1,1,'2015-07-21 22:28:08','2015-07-21 22:28:08'),(471,36,37,0,0,0,0,'2015-07-21 22:28:08','2015-07-21 22:28:08'),(472,17,37,1,1,1,1,'2015-07-21 22:28:08','2015-07-21 22:28:08'),(473,37,37,0,0,0,0,'2015-07-21 22:28:09','2015-07-21 22:28:09'),(474,38,37,0,0,0,0,'2015-07-21 22:28:09','2015-07-21 22:28:09'),(475,18,37,1,1,1,1,'2015-07-21 22:28:09','2015-07-21 22:28:09'),(476,19,37,1,1,1,1,'2015-07-21 22:28:09','2015-07-21 22:28:09'),(477,39,37,0,0,0,0,'2015-07-21 22:28:09','2015-07-21 22:28:09'),(478,22,37,1,1,1,1,'2015-07-21 22:28:09','2015-07-21 22:28:09'),(479,25,37,1,1,1,1,'2015-07-21 22:28:09','2015-07-21 22:28:09'),(480,26,37,1,1,1,1,'2015-07-21 22:28:09','2015-07-21 22:28:09'),(481,1,38,1,1,1,1,'2015-07-21 22:28:09','2015-07-21 22:28:09'),(482,2,38,1,1,1,1,'2015-07-21 22:28:09','2015-07-21 22:28:09'),(483,27,38,0,0,0,0,'2015-07-21 22:28:09','2015-07-21 22:28:09'),(484,3,38,1,1,1,1,'2015-07-21 22:28:09','2015-07-21 22:28:09'),(485,5,38,0,0,0,0,'2015-07-21 22:28:09','2015-07-21 22:28:09'),(486,28,38,1,1,1,1,'2015-07-21 22:28:09','2015-07-21 22:28:09'),(487,6,38,1,1,1,1,'2015-07-21 22:28:09','2015-07-21 22:28:09'),(488,29,38,0,0,0,0,'2015-07-21 22:28:09','2015-07-21 22:28:09'),(489,30,38,0,0,0,0,'2015-07-21 22:28:09','2015-07-21 22:28:09'),(490,9,38,1,1,1,1,'2015-07-21 22:28:09','2015-07-21 22:28:09'),(491,31,38,0,0,0,0,'2015-07-21 22:28:09','2015-07-21 22:28:09'),(492,10,38,1,1,1,1,'2015-07-21 22:28:09','2015-07-21 22:28:09'),(493,11,38,1,1,1,1,'2015-07-21 22:28:09','2015-07-21 22:28:09'),(494,14,38,1,1,1,1,'2015-07-21 22:28:09','2015-07-21 22:28:09'),(495,32,38,0,0,0,0,'2015-07-21 22:28:09','2015-07-21 22:28:09'),(496,33,38,0,0,0,0,'2015-07-21 22:28:09','2015-07-21 22:28:09'),(497,34,38,0,0,0,0,'2015-07-21 22:28:09','2015-07-21 22:28:09'),(498,15,38,1,1,1,1,'2015-07-21 22:28:09','2015-07-21 22:28:09'),(499,35,38,0,0,0,0,'2015-07-21 22:28:09','2015-07-21 22:28:09'),(500,16,38,1,1,1,1,'2015-07-21 22:28:09','2015-07-21 22:28:09'),(501,36,38,0,0,0,0,'2015-07-21 22:28:10','2015-07-21 22:28:10'),(502,17,38,1,1,1,1,'2015-07-21 22:28:10','2015-07-21 22:28:10'),(503,37,38,0,0,0,0,'2015-07-21 22:28:10','2015-07-21 22:28:10'),(504,38,38,0,0,0,0,'2015-07-21 22:28:10','2015-07-21 22:28:10'),(505,18,38,1,1,1,1,'2015-07-21 22:28:10','2015-07-21 22:28:10'),(506,19,38,1,1,1,1,'2015-07-21 22:28:10','2015-07-21 22:28:10'),(507,39,38,0,0,0,0,'2015-07-21 22:28:10','2015-07-21 22:28:10'),(508,22,38,1,1,1,1,'2015-07-21 22:28:10','2015-07-21 22:28:10'),(509,25,38,1,1,1,1,'2015-07-21 22:28:10','2015-07-21 22:28:10'),(510,26,38,1,1,1,1,'2015-07-21 22:28:10','2015-07-21 22:28:10'),(511,1,39,0,0,0,0,'2015-07-21 22:28:10','2015-07-21 22:28:10'),(512,2,39,1,1,1,1,'2015-07-21 22:28:10','2015-07-21 22:28:10'),(513,27,39,0,0,0,0,'2015-07-21 22:28:11','2015-07-21 22:28:11'),(514,3,39,1,1,1,1,'2015-07-21 22:28:11','2015-07-21 22:28:11'),(515,5,39,1,1,1,1,'2015-07-21 22:28:11','2015-07-21 22:28:11'),(516,28,39,1,1,1,1,'2015-07-21 22:28:11','2015-07-21 22:28:11'),(517,6,39,1,1,1,1,'2015-07-21 22:28:11','2015-07-21 22:28:11'),(518,29,39,0,0,0,0,'2015-07-21 22:28:11','2015-07-21 22:28:11'),(519,30,39,0,0,0,0,'2015-07-21 22:28:11','2015-07-21 22:28:11'),(520,9,39,1,1,1,1,'2015-07-21 22:28:11','2015-07-21 22:28:11'),(521,31,39,0,0,0,0,'2015-07-21 22:28:11','2015-07-21 22:28:11'),(522,10,39,1,1,1,1,'2015-07-21 22:28:11','2015-07-21 22:28:11'),(523,11,39,1,1,1,1,'2015-07-21 22:28:11','2015-07-21 22:28:11'),(524,14,39,1,1,1,1,'2015-07-21 22:28:11','2015-07-21 22:28:11'),(525,32,39,0,0,0,0,'2015-07-21 22:28:11','2015-07-21 22:28:11'),(526,33,39,0,0,0,0,'2015-07-21 22:28:11','2015-07-21 22:28:11'),(527,34,39,0,0,0,0,'2015-07-21 22:28:11','2015-07-21 22:28:11'),(528,15,39,1,1,1,1,'2015-07-21 22:28:11','2015-07-21 22:28:11'),(529,35,39,0,0,0,0,'2015-07-21 22:28:11','2015-07-21 22:28:11'),(530,16,39,1,1,1,1,'2015-07-21 22:28:11','2015-07-21 22:28:11'),(531,36,39,0,0,0,0,'2015-07-21 22:28:11','2015-07-21 22:28:11'),(532,17,39,1,1,1,1,'2015-07-21 22:28:11','2015-07-21 22:28:11'),(533,37,39,0,0,0,0,'2015-07-21 22:28:11','2015-07-21 22:28:11'),(534,38,39,0,0,0,0,'2015-07-21 22:28:11','2015-07-21 22:28:11'),(535,18,39,1,1,1,1,'2015-07-21 22:28:11','2015-07-21 22:28:11'),(536,19,39,1,1,1,1,'2015-07-21 22:28:11','2015-07-21 22:28:11'),(537,39,39,0,0,0,0,'2015-07-21 22:28:11','2015-07-21 22:28:11'),(538,22,39,1,1,1,1,'2015-07-21 22:28:11','2015-07-21 22:28:11'),(539,25,39,0,0,0,0,'2015-07-21 22:28:12','2015-07-21 22:28:12'),(540,26,39,1,1,1,1,'2015-07-21 22:28:12','2015-07-21 22:28:12'),(541,1,40,1,1,1,1,'2015-07-21 22:28:12','2015-07-21 22:28:12'),(542,2,40,1,1,1,1,'2015-07-21 22:28:12','2015-07-21 22:28:12'),(543,27,40,0,0,0,0,'2015-07-21 22:28:12','2015-07-21 22:28:12'),(544,3,40,1,1,1,1,'2015-07-21 22:28:12','2015-07-21 22:28:12'),(545,5,40,1,1,1,1,'2015-07-21 22:28:12','2015-07-21 22:28:12'),(546,28,40,1,1,1,1,'2015-07-21 22:28:12','2015-07-21 22:28:12'),(547,6,40,1,1,1,1,'2015-07-21 22:28:12','2015-07-21 22:28:12'),(548,29,40,0,0,0,0,'2015-07-21 22:28:12','2015-07-21 22:28:12'),(549,30,40,0,0,0,0,'2015-07-21 22:28:12','2015-07-21 22:28:12'),(550,9,40,1,1,1,1,'2015-07-21 22:28:12','2015-07-21 22:28:12'),(551,31,40,0,0,0,0,'2015-07-21 22:28:12','2015-07-21 22:28:12'),(552,10,40,1,1,1,1,'2015-07-21 22:28:12','2015-07-21 22:28:12'),(553,11,40,1,1,1,1,'2015-07-21 22:28:12','2015-07-21 22:28:12'),(554,14,40,1,1,1,1,'2015-07-21 22:28:12','2015-07-21 22:28:12'),(555,32,40,0,0,0,0,'2015-07-21 22:28:12','2015-07-21 22:28:12'),(556,33,40,0,0,0,0,'2015-07-21 22:28:12','2015-07-21 22:28:12'),(557,34,40,0,0,0,0,'2015-07-21 22:28:12','2015-07-21 22:28:12'),(558,15,40,1,1,1,1,'2015-07-21 22:28:12','2015-07-21 22:28:12'),(559,35,40,0,0,0,0,'2015-07-21 22:28:12','2015-07-21 22:28:12'),(560,16,40,1,1,1,1,'2015-07-21 22:28:12','2015-07-21 22:28:12'),(561,36,40,0,0,0,0,'2015-07-21 22:28:12','2015-07-21 22:28:12'),(562,17,40,1,1,1,1,'2015-07-21 22:28:12','2015-07-21 22:28:12'),(563,37,40,0,0,0,0,'2015-07-21 22:28:12','2015-07-21 22:28:12'),(564,38,40,0,0,0,0,'2015-07-21 22:28:12','2015-07-21 22:28:12'),(565,18,40,1,1,1,1,'2015-07-21 22:28:13','2015-07-21 22:28:13'),(566,19,40,1,1,1,1,'2015-07-21 22:28:13','2015-07-21 22:28:13'),(567,39,40,0,0,0,0,'2015-07-21 22:28:13','2015-07-21 22:28:13'),(568,22,40,1,1,1,1,'2015-07-21 22:28:13','2015-07-21 22:28:13'),(569,25,40,0,0,0,0,'2015-07-21 22:28:13','2015-07-21 22:28:13'),(570,26,40,1,1,1,1,'2015-07-21 22:28:13','2015-07-21 22:28:13'),(571,1,41,1,1,1,1,'2015-07-21 22:28:13','2015-07-21 22:28:13'),(572,2,41,1,1,1,1,'2015-07-21 22:28:13','2015-07-21 22:28:13'),(573,27,41,0,0,0,0,'2015-07-21 22:28:13','2015-07-21 22:28:13'),(574,3,41,1,1,1,1,'2015-07-21 22:28:13','2015-07-21 22:28:13'),(575,5,41,1,1,1,1,'2015-07-21 22:28:13','2015-07-21 22:28:13'),(576,28,41,1,1,1,1,'2015-07-21 22:28:13','2015-07-21 22:28:13'),(577,6,41,1,1,1,1,'2015-07-21 22:28:13','2015-07-21 22:28:13'),(578,29,41,0,0,0,0,'2015-07-21 22:28:13','2015-07-21 22:28:13'),(579,30,41,0,0,0,0,'2015-07-21 22:28:13','2015-07-21 22:28:13'),(580,9,41,1,1,1,1,'2015-07-21 22:28:13','2015-07-21 22:28:13'),(581,31,41,0,0,0,0,'2015-07-21 22:28:13','2015-07-21 22:28:13'),(582,10,41,1,1,1,1,'2015-07-21 22:28:13','2015-07-21 22:28:13'),(583,11,41,1,1,1,1,'2015-07-21 22:28:13','2015-07-21 22:28:13'),(584,14,41,1,1,1,1,'2015-07-21 22:28:13','2015-07-21 22:28:13'),(585,32,41,0,0,0,0,'2015-07-21 22:28:13','2015-07-21 22:28:13'),(586,33,41,0,0,0,0,'2015-07-21 22:28:13','2015-07-21 22:28:13'),(587,34,41,0,0,0,0,'2015-07-21 22:28:13','2015-07-21 22:28:13'),(588,15,41,1,1,1,1,'2015-07-21 22:28:13','2015-07-21 22:28:13'),(589,35,41,0,0,0,0,'2015-07-21 22:28:14','2015-07-21 22:28:14'),(590,16,41,1,1,1,1,'2015-07-21 22:28:14','2015-07-21 22:28:14'),(591,36,41,0,0,0,0,'2015-07-21 22:28:14','2015-07-21 22:28:14'),(592,17,41,1,1,1,1,'2015-07-21 22:28:14','2015-07-21 22:28:14'),(593,37,41,0,0,0,0,'2015-07-21 22:28:14','2015-07-21 22:28:14'),(594,38,41,0,0,0,0,'2015-07-21 22:28:14','2015-07-21 22:28:14'),(595,18,41,1,1,1,1,'2015-07-21 22:28:14','2015-07-21 22:28:14'),(596,19,41,1,1,1,1,'2015-07-21 22:28:14','2015-07-21 22:28:14'),(597,39,41,0,0,0,0,'2015-07-21 22:28:14','2015-07-21 22:28:14'),(598,22,41,1,1,1,1,'2015-07-21 22:28:14','2015-07-21 22:28:14'),(599,25,41,0,0,0,0,'2015-07-21 22:28:14','2015-07-21 22:28:14'),(600,26,41,1,1,1,1,'2015-07-21 22:28:14','2015-07-21 22:28:14'),(601,1,102,1,1,1,1,'2015-07-21 22:28:14','2015-07-21 22:28:14'),(602,3,102,1,1,1,1,'2015-07-21 22:28:14','2015-07-21 22:28:14'),(603,5,102,1,1,1,1,'2015-07-21 22:28:14','2015-07-21 22:28:14'),(604,6,102,1,1,1,1,'2015-07-21 22:28:14','2015-07-21 22:28:14'),(605,9,102,1,1,1,1,'2015-07-21 22:28:14','2015-07-21 22:28:14'),(606,10,102,1,1,1,1,'2015-07-21 22:28:14','2015-07-21 22:28:14'),(607,14,102,1,1,1,1,'2015-07-21 22:28:14','2015-07-21 22:28:14'),(608,16,102,1,1,1,1,'2015-07-21 22:28:15','2015-07-21 22:28:15'),(609,18,102,1,1,1,1,'2015-07-21 22:28:15','2015-07-21 22:28:15'),(610,19,102,1,1,1,1,'2015-07-21 22:28:15','2015-07-21 22:28:15'),(611,22,102,1,1,1,1,'2015-07-21 22:28:15','2015-07-21 22:28:15'),(612,25,102,1,1,1,1,'2015-07-21 22:28:15','2015-07-21 22:28:15'),(613,1,1,0,0,0,0,'2015-07-21 22:28:15','2015-07-21 22:28:15'),(614,2,1,1,0,0,0,'2015-07-21 22:28:15','2015-07-21 22:28:15'),(615,3,1,1,0,0,0,'2015-07-21 22:28:15','2015-07-21 22:28:15'),(616,4,1,0,1,1,0,'2015-07-21 22:28:15','2015-07-21 22:28:15'),(617,5,1,0,0,0,1,'2015-07-21 22:28:15','2015-07-21 22:28:15'),(618,6,1,0,0,0,0,'2015-07-21 22:28:15','2015-07-21 22:28:15'),(619,7,1,1,1,1,1,'2015-07-21 22:28:15','2015-07-21 22:28:15'),(620,8,1,0,0,0,0,'2015-07-21 22:28:15','2015-07-21 22:28:15'),(621,9,1,0,0,0,0,'2015-07-21 22:28:15','2015-07-21 22:28:15'),(622,10,1,0,0,0,0,'2015-07-21 22:28:15','2015-07-21 22:28:15'),(623,11,1,0,0,0,0,'2015-07-21 22:28:15','2015-07-21 22:28:15'),(624,12,1,0,0,0,0,'2015-07-21 22:28:15','2015-07-21 22:28:15'),(625,13,1,0,0,0,0,'2015-07-21 22:28:15','2015-07-21 22:28:15'),(626,14,1,0,0,0,0,'2015-07-21 22:28:15','2015-07-21 22:28:15'),(627,15,1,0,0,0,0,'2015-07-21 22:28:15','2015-07-21 22:28:15'),(628,16,1,0,0,0,0,'2015-07-21 22:28:15','2015-07-21 22:28:15'),(629,17,1,0,0,0,0,'2015-07-21 22:28:15','2015-07-21 22:28:15'),(630,18,1,0,0,0,0,'2015-07-21 22:28:15','2015-07-21 22:28:15'),(631,19,1,0,0,0,0,'2015-07-21 22:28:15','2015-07-21 22:28:15'),(632,20,1,0,0,0,0,'2015-07-21 22:28:15','2015-07-21 22:28:15'),(633,21,1,0,0,0,0,'2015-07-21 22:28:16','2015-07-21 22:28:16'),(634,22,1,0,0,0,0,'2015-07-21 22:28:16','2015-07-21 22:28:16'),(635,23,1,0,0,0,0,'2015-07-21 22:28:16','2015-07-21 22:28:16'),(636,24,1,0,0,0,0,'2015-07-21 22:28:16','2015-07-21 22:28:16'),(637,25,1,0,0,0,0,'2015-07-21 22:28:16','2015-07-21 22:28:16'),(638,26,1,0,0,0,0,'2015-07-21 22:28:16','2015-07-21 22:28:16'),(639,1,103,1,1,1,1,'2015-07-21 22:28:16','2015-07-21 22:28:16'),(640,3,103,1,1,1,1,'2015-07-21 22:28:16','2015-07-21 22:28:16'),(641,5,103,1,1,1,1,'2015-07-21 22:28:16','2015-07-21 22:28:16'),(642,6,103,1,1,1,1,'2015-07-21 22:28:16','2015-07-21 22:28:16'),(643,9,103,0,0,0,0,'2015-07-21 22:28:16','2015-07-21 22:28:16'),(644,10,103,1,1,1,1,'2015-07-21 22:28:16','2015-07-21 22:28:16'),(645,14,103,1,1,1,1,'2015-07-21 22:28:16','2015-07-21 22:28:16'),(646,16,103,1,1,1,1,'2015-07-21 22:28:16','2015-07-21 22:28:16'),(647,18,103,1,1,1,1,'2015-07-21 22:28:16','2015-07-21 22:28:16'),(648,19,103,1,1,1,1,'2015-07-21 22:28:16','2015-07-21 22:28:16'),(649,22,103,1,1,1,1,'2015-07-21 22:28:16','2015-07-21 22:28:16'),(650,25,103,1,1,1,1,'2015-07-21 22:28:17','2015-07-21 22:28:17'),(651,1,2,1,1,1,1,'2015-07-21 22:28:17','2015-07-21 22:28:17'),(652,2,2,1,1,1,1,'2015-07-21 22:28:17','2015-07-21 22:28:17'),(653,3,2,1,1,1,1,'2015-07-21 22:28:17','2015-07-21 22:28:17'),(654,4,2,1,1,1,1,'2015-07-21 22:28:17','2015-07-21 22:28:17'),(655,5,2,1,1,1,1,'2015-07-21 22:28:17','2015-07-21 22:28:17'),(656,6,2,1,1,1,1,'2015-07-21 22:28:17','2015-07-21 22:28:17'),(657,7,2,1,1,1,1,'2015-07-21 22:28:17','2015-07-21 22:28:17'),(658,8,2,1,1,1,1,'2015-07-21 22:28:17','2015-07-21 22:28:17'),(659,9,2,1,1,1,1,'2015-07-21 22:28:17','2015-07-21 22:28:17'),(660,10,2,1,1,1,1,'2015-07-21 22:28:17','2015-07-21 22:28:17'),(661,11,2,1,1,1,1,'2015-07-21 22:28:17','2015-07-21 22:28:17'),(662,12,2,1,1,1,1,'2015-07-21 22:28:17','2015-07-21 22:28:17'),(663,13,2,1,1,1,1,'2015-07-21 22:28:17','2015-07-21 22:28:17'),(664,14,2,1,1,1,1,'2015-07-21 22:28:17','2015-07-21 22:28:17'),(665,15,2,1,1,1,1,'2015-07-21 22:28:17','2015-07-21 22:28:17'),(666,16,2,0,0,0,0,'2015-07-21 22:28:18','2015-07-21 22:28:18'),(667,17,2,1,1,1,1,'2015-07-21 22:28:18','2015-07-21 22:28:18'),(668,18,2,1,1,1,1,'2015-07-21 22:28:18','2015-07-21 22:28:18'),(669,19,2,1,1,1,1,'2015-07-21 22:28:18','2015-07-21 22:28:18'),(670,20,2,1,1,1,1,'2015-07-21 22:28:18','2015-07-21 22:28:18'),(671,21,2,1,1,1,1,'2015-07-21 22:28:18','2015-07-21 22:28:18'),(672,22,2,1,1,1,1,'2015-07-21 22:28:18','2015-07-21 22:28:18'),(673,23,2,1,1,1,1,'2015-07-21 22:28:18','2015-07-21 22:28:18'),(674,24,2,1,1,1,1,'2015-07-21 22:28:18','2015-07-21 22:28:18'),(675,25,2,1,1,1,1,'2015-07-21 22:28:18','2015-07-21 22:28:18'),(676,26,2,1,1,1,1,'2015-07-21 22:28:18','2015-07-21 22:28:18'),(677,1,104,0,0,0,0,'2015-07-21 22:28:18','2015-07-21 22:28:18'),(678,3,104,1,1,1,1,'2015-07-21 22:28:18','2015-07-21 22:28:18'),(679,5,104,1,1,1,1,'2015-07-21 22:28:18','2015-07-21 22:28:18'),(680,6,104,1,1,1,1,'2015-07-21 22:28:18','2015-07-21 22:28:18'),(681,9,104,1,1,1,1,'2015-07-21 22:28:18','2015-07-21 22:28:18'),(682,10,104,1,1,1,1,'2015-07-21 22:28:18','2015-07-21 22:28:18'),(683,14,104,1,1,1,1,'2015-07-21 22:28:18','2015-07-21 22:28:18'),(684,16,104,1,1,1,1,'2015-07-21 22:28:18','2015-07-21 22:28:18'),(685,18,104,1,1,1,1,'2015-07-21 22:28:19','2015-07-21 22:28:19'),(686,19,104,1,1,1,1,'2015-07-21 22:28:19','2015-07-21 22:28:19'),(687,22,104,1,1,1,1,'2015-07-21 22:28:19','2015-07-21 22:28:19'),(688,25,104,1,1,1,1,'2015-07-21 22:28:19','2015-07-21 22:28:19'),(689,1,3,0,0,0,0,'2015-07-21 22:28:19','2015-07-21 22:28:19'),(690,2,3,1,1,1,1,'2015-07-21 22:28:19','2015-07-21 22:28:19'),(691,3,3,1,1,1,1,'2015-07-21 22:28:19','2015-07-21 22:28:19'),(692,4,3,1,1,1,1,'2015-07-21 22:28:19','2015-07-21 22:28:19'),(693,5,3,1,1,1,1,'2015-07-21 22:28:19','2015-07-21 22:28:19'),(694,6,3,1,1,1,1,'2015-07-21 22:28:19','2015-07-21 22:28:19'),(695,7,3,0,0,0,0,'2015-07-21 22:28:19','2015-07-21 22:28:19'),(696,8,3,1,1,1,1,'2015-07-21 22:28:19','2015-07-21 22:28:19'),(697,9,3,0,0,0,0,'2015-07-21 22:28:19','2015-07-21 22:28:19'),(698,10,3,1,1,1,1,'2015-07-21 22:28:19','2015-07-21 22:28:19'),(699,11,3,0,0,0,0,'2015-07-21 22:28:19','2015-07-21 22:28:19'),(700,12,3,0,0,0,0,'2015-07-21 22:28:19','2015-07-21 22:28:19'),(701,13,3,1,1,1,1,'2015-07-21 22:28:19','2015-07-21 22:28:19'),(702,14,3,1,1,1,1,'2015-07-21 22:28:20','2015-07-21 22:28:20'),(703,15,3,1,1,1,1,'2015-07-21 22:28:20','2015-07-21 22:28:20'),(704,16,3,1,1,1,1,'2015-07-21 22:28:20','2015-07-21 22:28:20'),(705,17,3,0,0,0,0,'2015-07-21 22:28:20','2015-07-21 22:28:20'),(706,18,3,1,1,1,1,'2015-07-21 22:28:20','2015-07-21 22:28:20'),(707,19,3,1,1,1,1,'2015-07-21 22:28:20','2015-07-21 22:28:20'),(708,20,3,1,1,1,1,'2015-07-21 22:28:20','2015-07-21 22:28:20'),(709,21,3,1,1,1,1,'2015-07-21 22:28:20','2015-07-21 22:28:20'),(710,22,3,1,1,1,1,'2015-07-21 22:28:20','2015-07-21 22:28:20'),(711,23,3,1,1,1,1,'2015-07-21 22:28:20','2015-07-21 22:28:20'),(712,24,3,1,1,1,1,'2015-07-21 22:28:20','2015-07-21 22:28:20'),(713,25,3,1,1,1,1,'2015-07-21 22:28:20','2015-07-21 22:28:20'),(714,26,3,1,1,1,1,'2015-07-21 22:28:20','2015-07-21 22:28:20'),(715,1,105,0,0,0,0,'2015-07-21 22:28:20','2015-07-21 22:28:20'),(716,3,105,1,1,1,1,'2015-07-21 22:28:20','2015-07-21 22:28:20'),(717,5,105,1,1,1,1,'2015-07-21 22:28:20','2015-07-21 22:28:20'),(718,6,105,1,1,1,1,'2015-07-21 22:28:21','2015-07-21 22:28:21'),(719,9,105,0,0,0,0,'2015-07-21 22:28:21','2015-07-21 22:28:21'),(720,10,105,1,1,1,1,'2015-07-21 22:28:21','2015-07-21 22:28:21'),(721,14,105,1,1,1,1,'2015-07-21 22:28:21','2015-07-21 22:28:21'),(722,16,105,0,1,1,1,'2015-07-21 22:28:21','2015-07-21 22:28:21'),(723,18,105,1,1,1,1,'2015-07-21 22:28:21','2015-07-21 22:28:21'),(724,19,105,1,1,1,1,'2015-07-21 22:28:21','2015-07-21 22:28:21'),(725,22,105,1,1,1,1,'2015-07-21 22:28:21','2015-07-21 22:28:21'),(726,25,105,0,0,0,0,'2015-07-21 22:28:21','2015-07-21 22:28:21'),(727,1,4,0,0,0,0,'2015-07-21 22:28:21','2015-07-21 22:28:21'),(728,2,4,0,0,0,0,'2015-07-21 22:28:21','2015-07-21 22:28:21'),(729,3,4,1,1,1,1,'2015-07-21 22:28:21','2015-07-21 22:28:21'),(730,4,4,1,1,1,1,'2015-07-21 22:28:21','2015-07-21 22:28:21'),(731,5,4,0,0,0,0,'2015-07-21 22:28:21','2015-07-21 22:28:21'),(732,6,4,1,1,1,1,'2015-07-21 22:28:21','2015-07-21 22:28:21'),(733,7,4,1,1,1,1,'2015-07-21 22:28:21','2015-07-21 22:28:21'),(734,8,4,1,1,1,1,'2015-07-21 22:28:21','2015-07-21 22:28:21'),(735,9,4,1,1,1,1,'2015-07-21 22:28:21','2015-07-21 22:28:21'),(736,10,4,1,1,1,1,'2015-07-21 22:28:21','2015-07-21 22:28:21'),(737,11,4,1,1,1,1,'2015-07-21 22:28:21','2015-07-21 22:28:21'),(738,12,4,0,0,0,0,'2015-07-21 22:28:22','2015-07-21 22:28:22'),(739,13,4,1,1,1,1,'2015-07-21 22:28:22','2015-07-21 22:28:22'),(740,14,4,0,0,0,0,'2015-07-21 22:28:22','2015-07-21 22:28:22'),(741,15,4,0,0,0,0,'2015-07-21 22:28:22','2015-07-21 22:28:22'),(742,16,4,0,0,0,0,'2015-07-21 22:28:22','2015-07-21 22:28:22'),(743,17,4,1,1,1,1,'2015-07-21 22:28:22','2015-07-21 22:28:22'),(744,18,4,1,1,1,1,'2015-07-21 22:28:22','2015-07-21 22:28:22'),(745,19,4,1,1,1,1,'2015-07-21 22:28:22','2015-07-21 22:28:22'),(746,20,4,1,1,1,1,'2015-07-21 22:28:22','2015-07-21 22:28:22'),(747,21,4,1,1,1,1,'2015-07-21 22:28:22','2015-07-21 22:28:22'),(748,22,4,1,1,1,1,'2015-07-21 22:28:22','2015-07-21 22:28:22'),(749,23,4,1,1,1,1,'2015-07-21 22:28:22','2015-07-21 22:28:22'),(750,24,4,1,1,1,1,'2015-07-21 22:28:22','2015-07-21 22:28:22'),(751,25,4,1,1,1,1,'2015-07-21 22:28:22','2015-07-21 22:28:22'),(752,26,4,1,1,0,0,'2015-07-21 22:28:22','2015-07-21 22:28:22'),(753,1,106,0,0,0,0,'2015-07-21 22:28:22','2015-07-21 22:28:22'),(754,3,106,1,1,1,1,'2015-07-21 22:28:23','2015-07-21 22:28:23'),(755,5,106,1,1,1,1,'2015-07-21 22:28:23','2015-07-21 22:28:23'),(756,6,106,1,1,1,1,'2015-07-21 22:28:23','2015-07-21 22:28:23'),(757,9,106,1,1,1,1,'2015-07-21 22:28:23','2015-07-21 22:28:23'),(758,10,106,1,1,1,1,'2015-07-21 22:28:23','2015-07-21 22:28:23'),(759,14,106,0,0,0,0,'2015-07-21 22:28:23','2015-07-21 22:28:23'),(760,16,106,0,0,0,0,'2015-07-21 22:28:23','2015-07-21 22:28:23'),(761,18,106,0,0,0,0,'2015-07-21 22:28:23','2015-07-21 22:28:23'),(762,19,106,1,1,1,1,'2015-07-21 22:28:23','2015-07-21 22:28:23'),(763,22,106,0,0,0,0,'2015-07-21 22:28:23','2015-07-21 22:28:23'),(764,25,106,1,1,1,1,'2015-07-21 22:28:23','2015-07-21 22:28:23'),(765,1,5,0,0,0,0,'2015-07-21 22:28:23','2015-07-21 22:28:23'),(766,2,5,1,1,1,1,'2015-07-21 22:28:23','2015-07-21 22:28:23'),(767,3,5,1,1,1,1,'2015-07-21 22:28:23','2015-07-21 22:28:23'),(768,4,5,1,1,1,1,'2015-07-21 22:28:23','2015-07-21 22:28:23'),(769,5,5,1,1,1,1,'2015-07-21 22:28:23','2015-07-21 22:28:23'),(770,6,5,1,1,1,1,'2015-07-21 22:28:24','2015-07-21 22:28:24'),(771,7,5,1,1,1,1,'2015-07-21 22:28:24','2015-07-21 22:28:24'),(772,8,5,1,1,1,1,'2015-07-21 22:28:24','2015-07-21 22:28:24'),(773,9,5,1,1,1,1,'2015-07-21 22:28:24','2015-07-21 22:28:24'),(774,10,5,1,1,1,1,'2015-07-21 22:28:24','2015-07-21 22:28:24'),(775,11,5,1,1,1,1,'2015-07-21 22:28:24','2015-07-21 22:28:24'),(776,12,5,0,0,0,0,'2015-07-21 22:28:24','2015-07-21 22:28:24'),(777,13,5,0,0,0,0,'2015-07-21 22:28:24','2015-07-21 22:28:24'),(778,14,5,1,1,1,1,'2015-07-21 22:28:24','2015-07-21 22:28:24'),(779,15,5,1,1,1,1,'2015-07-21 22:28:24','2015-07-21 22:28:24'),(780,16,5,1,1,1,1,'2015-07-21 22:28:24','2015-07-21 22:28:24'),(781,17,5,1,1,1,1,'2015-07-21 22:28:24','2015-07-21 22:28:24'),(782,18,5,1,1,1,1,'2015-07-21 22:28:24','2015-07-21 22:28:24'),(783,19,5,1,1,1,1,'2015-07-21 22:28:24','2015-07-21 22:28:24'),(784,20,5,1,1,1,1,'2015-07-21 22:28:24','2015-07-21 22:28:24'),(785,21,5,1,1,1,1,'2015-07-21 22:28:24','2015-07-21 22:28:24'),(786,22,5,1,1,1,1,'2015-07-21 22:28:24','2015-07-21 22:28:24'),(787,23,5,1,1,1,1,'2015-07-21 22:28:24','2015-07-21 22:28:24'),(788,24,5,1,1,1,1,'2015-07-21 22:28:24','2015-07-21 22:28:24'),(789,25,5,1,1,1,1,'2015-07-21 22:28:25','2015-07-21 22:28:25'),(790,26,5,1,1,1,1,'2015-07-21 22:28:25','2015-07-21 22:28:25'),(791,1,107,0,0,0,0,'2015-07-21 22:28:25','2015-07-21 22:28:25'),(792,3,107,1,1,1,1,'2015-07-21 22:28:25','2015-07-21 22:28:25'),(793,5,107,1,1,1,1,'2015-07-21 22:28:25','2015-07-21 22:28:25'),(794,6,107,1,1,1,1,'2015-07-21 22:28:25','2015-07-21 22:28:25'),(795,9,107,0,0,0,0,'2015-07-21 22:28:25','2015-07-21 22:28:25'),(796,10,107,0,0,0,0,'2015-07-21 22:28:25','2015-07-21 22:28:25'),(797,14,107,1,1,1,1,'2015-07-21 22:28:25','2015-07-21 22:28:25'),(798,16,107,0,0,0,0,'2015-07-21 22:28:25','2015-07-21 22:28:25'),(799,18,107,1,1,1,1,'2015-07-21 22:28:25','2015-07-21 22:28:25'),(800,19,107,1,1,1,1,'2015-07-21 22:28:25','2015-07-21 22:28:25'),(801,22,107,1,1,1,1,'2015-07-21 22:28:25','2015-07-21 22:28:25'),(802,25,107,1,1,1,1,'2015-07-21 22:28:25','2015-07-21 22:28:25'),(803,1,6,0,0,0,0,'2015-07-21 22:28:25','2015-07-21 22:28:25'),(804,2,6,1,1,1,1,'2015-07-21 22:28:26','2015-07-21 22:28:26'),(805,3,6,1,1,1,1,'2015-07-21 22:28:26','2015-07-21 22:28:26'),(806,4,6,1,1,1,1,'2015-07-21 22:28:26','2015-07-21 22:28:26'),(807,5,6,1,1,1,1,'2015-07-21 22:28:26','2015-07-21 22:28:26'),(808,6,6,1,1,1,1,'2015-07-21 22:28:26','2015-07-21 22:28:26'),(809,7,6,1,1,1,1,'2015-07-21 22:28:26','2015-07-21 22:28:26'),(810,8,6,0,0,0,0,'2015-07-21 22:28:26','2015-07-21 22:28:26'),(811,9,6,0,0,0,0,'2015-07-21 22:28:26','2015-07-21 22:28:26'),(812,10,6,1,1,1,1,'2015-07-21 22:28:26','2015-07-21 22:28:26'),(813,11,6,1,1,1,1,'2015-07-21 22:28:26','2015-07-21 22:28:26'),(814,12,6,0,0,0,0,'2015-07-21 22:28:26','2015-07-21 22:28:26'),(815,13,6,1,1,1,1,'2015-07-21 22:28:26','2015-07-21 22:28:26'),(816,14,6,1,1,1,1,'2015-07-21 22:28:26','2015-07-21 22:28:26'),(817,15,6,1,1,1,1,'2015-07-21 22:28:26','2015-07-21 22:28:26'),(818,16,6,0,0,0,0,'2015-07-21 22:28:26','2015-07-21 22:28:26'),(819,17,6,0,0,0,0,'2015-07-21 22:28:26','2015-07-21 22:28:26'),(820,18,6,1,1,1,1,'2015-07-21 22:28:26','2015-07-21 22:28:26'),(821,19,6,1,1,1,1,'2015-07-21 22:28:26','2015-07-21 22:28:26'),(822,20,6,0,0,0,0,'2015-07-21 22:28:26','2015-07-21 22:28:26'),(823,21,6,1,1,1,1,'2015-07-21 22:28:26','2015-07-21 22:28:26'),(824,22,6,1,1,1,1,'2015-07-21 22:28:26','2015-07-21 22:28:26'),(825,23,6,1,1,1,1,'2015-07-21 22:28:27','2015-07-21 22:28:27'),(826,24,6,1,1,1,1,'2015-07-21 22:28:27','2015-07-21 22:28:27'),(827,25,6,1,1,1,1,'2015-07-21 22:28:27','2015-07-21 22:28:27'),(828,26,6,1,1,1,1,'2015-07-21 22:28:27','2015-07-21 22:28:27'),(829,1,108,0,0,0,0,'2015-07-21 22:28:27','2015-07-21 22:28:27'),(830,3,108,1,1,1,1,'2015-07-21 22:28:27','2015-07-21 22:28:27'),(831,5,108,0,0,0,0,'2015-07-21 22:28:27','2015-07-21 22:28:27'),(832,6,108,1,1,1,1,'2015-07-21 22:28:27','2015-07-21 22:28:27'),(833,9,108,1,1,1,1,'2015-07-21 22:28:27','2015-07-21 22:28:27'),(834,10,108,0,0,0,0,'2015-07-21 22:28:27','2015-07-21 22:28:27'),(835,14,108,1,1,1,1,'2015-07-21 22:28:27','2015-07-21 22:28:27'),(836,16,108,0,0,0,0,'2015-07-21 22:28:27','2015-07-21 22:28:27'),(837,18,108,1,1,1,1,'2015-07-21 22:28:27','2015-07-21 22:28:27'),(838,19,108,0,0,0,0,'2015-07-21 22:28:27','2015-07-21 22:28:27'),(839,22,108,1,1,1,1,'2015-07-21 22:28:27','2015-07-21 22:28:27'),(840,25,108,1,1,1,1,'2015-07-21 22:28:27','2015-07-21 22:28:27'),(841,1,7,0,0,0,0,'2015-07-21 22:28:27','2015-07-21 22:28:27'),(842,2,7,1,1,1,1,'2015-07-21 22:28:27','2015-07-21 22:28:27'),(843,3,7,1,1,1,1,'2015-07-21 22:28:27','2015-07-21 22:28:27'),(844,4,7,1,1,1,1,'2015-07-21 22:28:27','2015-07-21 22:28:27'),(845,5,7,1,1,1,1,'2015-07-21 22:28:27','2015-07-21 22:28:27'),(846,6,7,1,1,1,1,'2015-07-21 22:28:27','2015-07-21 22:28:27'),(847,7,7,1,1,1,1,'2015-07-21 22:28:27','2015-07-21 22:28:27'),(848,8,7,1,1,1,1,'2015-07-21 22:28:27','2015-07-21 22:28:27'),(849,9,7,0,0,0,0,'2015-07-21 22:28:27','2015-07-21 22:28:27'),(850,10,7,1,1,1,1,'2015-07-21 22:28:28','2015-07-21 22:28:28'),(851,11,7,1,1,1,1,'2015-07-21 22:28:28','2015-07-21 22:28:28'),(852,12,7,0,0,0,0,'2015-07-21 22:28:28','2015-07-21 22:28:28'),(853,13,7,1,1,1,1,'2015-07-21 22:28:28','2015-07-21 22:28:28'),(854,14,7,1,1,1,1,'2015-07-21 22:28:28','2015-07-21 22:28:28'),(855,15,7,1,1,1,1,'2015-07-21 22:28:28','2015-07-21 22:28:28'),(856,16,7,0,0,0,0,'2015-07-21 22:28:28','2015-07-21 22:28:28'),(857,17,7,1,1,1,1,'2015-07-21 22:28:28','2015-07-21 22:28:28'),(858,18,7,1,1,1,1,'2015-07-21 22:28:28','2015-07-21 22:28:28'),(859,19,7,1,1,1,1,'2015-07-21 22:28:28','2015-07-21 22:28:28'),(860,20,7,1,1,1,1,'2015-07-21 22:28:29','2015-07-21 22:28:29'),(861,21,7,1,1,1,1,'2015-07-21 22:28:29','2015-07-21 22:28:29'),(862,22,7,1,1,1,1,'2015-07-21 22:28:29','2015-07-21 22:28:29'),(863,23,7,1,1,1,1,'2015-07-21 22:28:29','2015-07-21 22:28:29'),(864,24,7,1,1,1,1,'2015-07-21 22:28:29','2015-07-21 22:28:29'),(865,25,7,1,1,1,1,'2015-07-21 22:28:29','2015-07-21 22:28:29'),(866,26,7,1,1,1,1,'2015-07-21 22:28:29','2015-07-21 22:28:29'),(867,1,109,0,0,0,0,'2015-07-21 22:28:29','2015-07-21 22:28:29'),(868,3,109,1,1,1,1,'2015-07-21 22:28:29','2015-07-21 22:28:29'),(869,5,109,1,1,1,1,'2015-07-21 22:28:29','2015-07-21 22:28:29'),(870,6,109,1,1,1,1,'2015-07-21 22:28:29','2015-07-21 22:28:29'),(871,9,109,1,1,0,0,'2015-07-21 22:28:29','2015-07-21 22:28:29'),(872,10,109,0,0,0,0,'2015-07-21 22:28:29','2015-07-21 22:28:29'),(873,14,109,0,0,0,0,'2015-07-21 22:28:29','2015-07-21 22:28:29'),(874,16,109,0,0,0,0,'2015-07-21 22:28:29','2015-07-21 22:28:29'),(875,18,109,1,1,1,1,'2015-07-21 22:28:29','2015-07-21 22:28:29'),(876,19,109,1,1,1,1,'2015-07-21 22:28:29','2015-07-21 22:28:29'),(877,22,109,1,1,1,1,'2015-07-21 22:28:29','2015-07-21 22:28:29'),(878,25,109,1,1,1,1,'2015-07-21 22:28:29','2015-07-21 22:28:29'),(879,1,8,0,0,0,0,'2015-07-21 22:28:29','2015-07-21 22:28:29'),(880,2,8,1,1,1,1,'2015-07-21 22:28:29','2015-07-21 22:28:29'),(881,3,8,1,1,1,1,'2015-07-21 22:28:29','2015-07-21 22:28:29'),(882,4,8,1,1,1,1,'2015-07-21 22:28:29','2015-07-21 22:28:29'),(883,5,8,1,1,1,1,'2015-07-21 22:28:30','2015-07-21 22:28:30'),(884,6,8,1,1,1,1,'2015-07-21 22:28:30','2015-07-21 22:28:30'),(885,7,8,1,1,1,1,'2015-07-21 22:28:30','2015-07-21 22:28:30'),(886,8,8,1,1,1,1,'2015-07-21 22:28:30','2015-07-21 22:28:30'),(887,9,8,0,0,0,0,'2015-07-21 22:28:30','2015-07-21 22:28:30'),(888,10,8,1,1,1,1,'2015-07-21 22:28:30','2015-07-21 22:28:30'),(889,11,8,1,1,1,1,'2015-07-21 22:28:30','2015-07-21 22:28:30'),(890,12,8,0,0,0,0,'2015-07-21 22:28:30','2015-07-21 22:28:30'),(891,13,8,0,0,0,0,'2015-07-21 22:28:30','2015-07-21 22:28:30'),(892,14,8,1,1,1,1,'2015-07-21 22:28:30','2015-07-21 22:28:30'),(893,15,8,1,1,1,1,'2015-07-21 22:28:30','2015-07-21 22:28:30'),(894,16,8,0,0,0,0,'2015-07-21 22:28:30','2015-07-21 22:28:30'),(895,17,8,1,1,1,1,'2015-07-21 22:28:30','2015-07-21 22:28:30'),(896,18,8,1,1,1,1,'2015-07-21 22:28:30','2015-07-21 22:28:30'),(897,19,8,1,1,1,1,'2015-07-21 22:28:31','2015-07-21 22:28:31'),(898,20,8,1,1,1,1,'2015-07-21 22:28:31','2015-07-21 22:28:31'),(899,21,8,1,1,1,1,'2015-07-21 22:28:31','2015-07-21 22:28:31'),(900,22,8,1,1,1,1,'2015-07-21 22:28:31','2015-07-21 22:28:31'),(901,23,8,1,1,1,1,'2015-07-21 22:28:31','2015-07-21 22:28:31'),(902,24,8,1,1,1,1,'2015-07-21 22:28:31','2015-07-21 22:28:31'),(903,25,8,1,1,1,1,'2015-07-21 22:28:31','2015-07-21 22:28:31'),(904,26,8,1,1,1,1,'2015-07-21 22:28:31','2015-07-21 22:28:31'),(905,1,110,0,0,0,0,'2015-07-21 22:28:31','2015-07-21 22:28:31'),(906,3,110,1,1,1,1,'2015-07-21 22:28:32','2015-07-21 22:28:32'),(907,5,110,1,1,1,1,'2015-07-21 22:28:32','2015-07-21 22:28:32'),(908,6,110,1,1,1,1,'2015-07-21 22:28:32','2015-07-21 22:28:32'),(909,9,110,0,0,0,0,'2015-07-21 22:28:32','2015-07-21 22:28:32'),(910,10,110,1,1,1,1,'2015-07-21 22:28:32','2015-07-21 22:28:32'),(911,14,110,1,1,1,1,'2015-07-21 22:28:32','2015-07-21 22:28:32'),(912,16,110,1,1,1,1,'2015-07-21 22:28:32','2015-07-21 22:28:32'),(913,18,110,1,1,1,1,'2015-07-21 22:28:32','2015-07-21 22:28:32'),(914,19,110,1,1,1,1,'2015-07-21 22:28:32','2015-07-21 22:28:32'),(915,22,110,1,1,1,1,'2015-07-21 22:28:32','2015-07-21 22:28:32'),(916,25,110,1,1,1,1,'2015-07-21 22:28:32','2015-07-21 22:28:32'),(917,1,9,0,0,0,0,'2015-07-21 22:28:32','2015-07-21 22:28:32'),(918,2,9,1,1,1,1,'2015-07-21 22:28:32','2015-07-21 22:28:32'),(919,3,9,1,1,1,1,'2015-07-21 22:28:32','2015-07-21 22:28:32'),(920,4,9,1,1,1,1,'2015-07-21 22:28:32','2015-07-21 22:28:32'),(921,5,9,1,1,1,1,'2015-07-21 22:28:32','2015-07-21 22:28:32'),(922,6,9,1,1,1,1,'2015-07-21 22:28:32','2015-07-21 22:28:32'),(923,7,9,1,1,1,1,'2015-07-21 22:28:32','2015-07-21 22:28:32'),(924,8,9,1,1,1,1,'2015-07-21 22:28:32','2015-07-21 22:28:32'),(925,9,9,1,1,1,1,'2015-07-21 22:28:32','2015-07-21 22:28:32'),(926,10,9,1,1,1,1,'2015-07-21 22:28:32','2015-07-21 22:28:32'),(927,11,9,1,1,1,1,'2015-07-21 22:28:32','2015-07-21 22:28:32'),(928,12,9,0,0,0,0,'2015-07-21 22:28:32','2015-07-21 22:28:32'),(929,13,9,1,1,1,1,'2015-07-21 22:28:32','2015-07-21 22:28:32'),(930,14,9,1,1,1,1,'2015-07-21 22:28:32','2015-07-21 22:28:32'),(931,15,9,1,1,1,1,'2015-07-21 22:28:33','2015-07-21 22:28:33'),(932,16,9,1,1,1,1,'2015-07-21 22:28:33','2015-07-21 22:28:33'),(933,17,9,1,1,1,1,'2015-07-21 22:28:33','2015-07-21 22:28:33'),(934,18,9,1,1,1,1,'2015-07-21 22:28:33','2015-07-21 22:28:33'),(935,19,9,1,1,1,1,'2015-07-21 22:28:33','2015-07-21 22:28:33'),(936,20,9,1,1,1,1,'2015-07-21 22:28:33','2015-07-21 22:28:33'),(937,21,9,1,1,1,1,'2015-07-21 22:28:33','2015-07-21 22:28:33'),(938,22,9,1,1,1,1,'2015-07-21 22:28:33','2015-07-21 22:28:33'),(939,23,9,1,1,1,1,'2015-07-21 22:28:33','2015-07-21 22:28:33'),(940,24,9,1,1,1,1,'2015-07-21 22:28:33','2015-07-21 22:28:33'),(941,25,9,1,1,1,1,'2015-07-21 22:28:33','2015-07-21 22:28:33'),(942,26,9,1,1,1,1,'2015-07-21 22:28:33','2015-07-21 22:28:33'),(943,1,111,0,0,0,0,'2015-07-21 22:28:33','2015-07-21 22:28:33'),(944,3,111,1,1,1,1,'2015-07-21 22:28:33','2015-07-21 22:28:33'),(945,5,111,1,1,1,1,'2015-07-21 22:28:33','2015-07-21 22:28:33'),(946,6,111,1,1,1,1,'2015-07-21 22:28:33','2015-07-21 22:28:33'),(947,9,111,0,0,0,0,'2015-07-21 22:28:33','2015-07-21 22:28:33'),(948,10,111,1,1,1,1,'2015-07-21 22:28:33','2015-07-21 22:28:33'),(949,14,111,0,0,0,0,'2015-07-21 22:28:33','2015-07-21 22:28:33'),(950,16,111,1,1,1,1,'2015-07-21 22:28:33','2015-07-21 22:28:33'),(951,18,111,1,1,1,1,'2015-07-21 22:28:33','2015-07-21 22:28:33'),(952,19,111,0,0,0,0,'2015-07-21 22:28:34','2015-07-21 22:28:34'),(953,22,111,1,1,1,1,'2015-07-21 22:28:34','2015-07-21 22:28:34'),(954,25,111,1,1,1,1,'2015-07-21 22:28:34','2015-07-21 22:28:34'),(955,1,10,0,0,0,0,'2015-07-21 22:28:34','2015-07-21 22:28:34'),(956,2,10,1,1,1,1,'2015-07-21 22:28:34','2015-07-21 22:28:34'),(957,3,10,1,1,1,1,'2015-07-21 22:28:34','2015-07-21 22:28:34'),(958,4,10,1,1,1,1,'2015-07-21 22:28:34','2015-07-21 22:28:34'),(959,5,10,0,0,0,0,'2015-07-21 22:28:34','2015-07-21 22:28:34'),(960,6,10,1,1,1,1,'2015-07-21 22:28:34','2015-07-21 22:28:34'),(961,7,10,1,1,1,1,'2015-07-21 22:28:34','2015-07-21 22:28:34'),(962,8,10,0,0,0,0,'2015-07-21 22:28:34','2015-07-21 22:28:34'),(963,9,10,0,0,0,0,'2015-07-21 22:28:34','2015-07-21 22:28:34'),(964,10,10,1,1,1,1,'2015-07-21 22:28:34','2015-07-21 22:28:34'),(965,11,10,1,1,1,1,'2015-07-21 22:28:34','2015-07-21 22:28:34'),(966,12,10,0,0,0,0,'2015-07-21 22:28:34','2015-07-21 22:28:34'),(967,13,10,0,0,0,0,'2015-07-21 22:28:34','2015-07-21 22:28:34'),(968,14,10,1,1,1,1,'2015-07-21 22:28:34','2015-07-21 22:28:34'),(969,15,10,1,1,1,1,'2015-07-21 22:28:34','2015-07-21 22:28:34'),(970,16,10,1,1,1,1,'2015-07-21 22:28:34','2015-07-21 22:28:34'),(971,17,10,1,1,1,1,'2015-07-21 22:28:34','2015-07-21 22:28:34'),(972,18,10,1,1,1,1,'2015-07-21 22:28:34','2015-07-21 22:28:34'),(973,19,10,0,0,0,0,'2015-07-21 22:28:34','2015-07-21 22:28:34'),(974,20,10,1,1,1,1,'2015-07-21 22:28:34','2015-07-21 22:28:34'),(975,21,10,1,1,1,1,'2015-07-21 22:28:34','2015-07-21 22:28:34'),(976,22,10,1,1,1,1,'2015-07-21 22:28:34','2015-07-21 22:28:34'),(977,23,10,1,1,1,1,'2015-07-21 22:28:34','2015-07-21 22:28:34'),(978,24,10,1,1,1,1,'2015-07-21 22:28:35','2015-07-21 22:28:35'),(979,25,10,1,1,1,1,'2015-07-21 22:28:35','2015-07-21 22:28:35'),(980,26,10,1,1,1,1,'2015-07-21 22:28:35','2015-07-21 22:28:35'),(981,1,112,0,0,0,0,'2015-07-21 22:28:35','2015-07-21 22:28:35'),(982,3,112,1,1,1,1,'2015-07-21 22:28:35','2015-07-21 22:28:35'),(983,5,112,1,1,1,1,'2015-07-21 22:28:35','2015-07-21 22:28:35'),(984,6,112,0,0,0,0,'2015-07-21 22:28:35','2015-07-21 22:28:35'),(985,9,112,0,0,0,0,'2015-07-21 22:28:35','2015-07-21 22:28:35'),(986,10,112,1,1,1,1,'2015-07-21 22:28:35','2015-07-21 22:28:35'),(987,14,112,1,1,1,1,'2015-07-21 22:28:35','2015-07-21 22:28:35'),(988,16,112,1,1,1,1,'2015-07-21 22:28:35','2015-07-21 22:28:35'),(989,18,112,1,1,1,1,'2015-07-21 22:28:35','2015-07-21 22:28:35'),(990,19,112,0,0,0,0,'2015-07-21 22:28:35','2015-07-21 22:28:35'),(991,22,112,1,1,1,1,'2015-07-21 22:28:35','2015-07-21 22:28:35'),(992,25,112,1,1,1,1,'2015-07-21 22:28:35','2015-07-21 22:28:35'),(993,1,11,0,0,0,0,'2015-07-21 22:28:35','2015-07-21 22:28:35'),(994,2,11,1,1,1,1,'2015-07-21 22:28:36','2015-07-21 22:28:36'),(995,3,11,1,1,1,1,'2015-07-21 22:28:36','2015-07-21 22:28:36'),(996,4,11,1,1,1,1,'2015-07-21 22:28:36','2015-07-21 22:28:36'),(997,5,11,1,1,1,1,'2015-07-21 22:28:36','2015-07-21 22:28:36'),(998,6,11,1,1,1,1,'2015-07-21 22:28:36','2015-07-21 22:28:36'),(999,7,11,1,1,1,1,'2015-07-21 22:28:36','2015-07-21 22:28:36'),(1000,8,11,1,1,1,1,'2015-07-21 22:28:36','2015-07-21 22:28:36');
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
INSERT INTO `cursos` VALUES (1,'AUTOMAÇÃO INDUSTRIAL','AI','2015-07-21 22:27:32','2015-07-21 22:27:32',55),(2,'ANÁLISE E DESENVOLVIMENTO DE SISTEMAS','ADS','2015-07-21 22:27:32','2015-07-21 22:27:32',49),(3,'REDES DE COMPUTADORES','RC','2015-07-21 22:27:32','2015-07-21 22:27:32',54),(4,'SISTEMAS EMBARCADOS','SE','2015-07-21 22:27:32','2015-07-21 22:27:32',55),(5,'SISTEMAS DE TELECOMUNICAÇÕES','ST','2015-07-21 22:27:32','2015-07-21 22:27:32',54);
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
  CONSTRAINT `cursos_unidades_curriculares_uni_curr_id_foreign` FOREIGN KEY (`uni_curr_id`) REFERENCES `unidades_curriculares` (`id`),
  CONSTRAINT `cursos_unidades_curriculares_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`)
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
  CONSTRAINT `diarios_envios_professor_id_foreign` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`),
  CONSTRAINT `diarios_envios_diario_id_foreign` FOREIGN KEY (`diario_id`) REFERENCES `status_diarios` (`id`)
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
-- Table structure for table `dispositivos`
--

DROP TABLE IF EXISTS `dispositivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dispositivos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_dispositivo_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `usuario_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dispositivos_aluno_id_codigo_unique` (`id`,`codigo`),
  KEY `dispositivos_aluno_tipo_dispositivo_id_foreign` (`tipo_dispositivo_id`),
  KEY `dispositivos_usuario_id_foreign` (`usuario_id`),
  CONSTRAINT `dispositivos_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `dispositivos_aluno_tipo_dispositivo_id_foreign` FOREIGN KEY (`tipo_dispositivo_id`) REFERENCES `tipos_dispositivos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dispositivos`
--

LOCK TABLES `dispositivos` WRITE;
/*!40000 ALTER TABLE `dispositivos` DISABLE KEYS */;
INSERT INTO `dispositivos` VALUES (1,'111111',3,'2015-07-21 22:27:30','2015-07-21 22:27:30',1),(2,'222222',3,'2015-07-21 22:27:30','2015-07-21 22:27:30',2),(3,'333333',3,'2015-07-21 22:27:30','2015-07-21 22:27:30',3),(4,'444444',3,'2015-07-21 22:27:30','2015-07-21 22:27:30',4),(5,'555555',3,'2015-07-21 22:27:30','2015-07-21 22:27:30',5),(6,'666666',3,'2015-07-21 22:27:31','2015-07-21 22:27:31',6),(7,'777777',3,'2015-07-21 22:27:31','2015-07-21 22:27:31',7),(8,'888888',3,'2015-07-21 22:27:31','2015-07-21 22:27:31',8),(9,'999999',3,'2015-07-21 22:27:31','2015-07-21 22:27:31',9);
/*!40000 ALTER TABLE `dispositivos` ENABLE KEYS */;
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
  CONSTRAINT `dispositivos_ambiente_oauth_client_id_foreign` FOREIGN KEY (`oauth_client_id`) REFERENCES `oauth_clients` (`id`),
  CONSTRAINT `dispositivos_ambiente_ambiente_id_foreign` FOREIGN KEY (`ambiente_id`) REFERENCES `ambientes` (`id`)
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
INSERT INTO `migrations` VALUES ('2014_04_24_110151_create_oauth_scopes_table',1),('2014_04_24_110304_create_oauth_grants_table',1),('2014_04_24_110403_create_oauth_grant_scopes_table',1),('2014_04_24_110459_create_oauth_clients_table',1),('2014_04_24_110557_create_oauth_client_endpoints_table',1),('2014_04_24_110705_create_oauth_client_scopes_table',1),('2014_04_24_110817_create_oauth_client_grants_table',1),('2014_04_24_111002_create_oauth_sessions_table',1),('2014_04_24_111109_create_oauth_session_scopes_table',1),('2014_04_24_111254_create_oauth_auth_codes_table',1),('2014_04_24_111403_create_oauth_auth_code_scopes_table',1),('2014_04_24_111518_create_oauth_access_tokens_table',1),('2014_04_24_111657_create_oauth_access_token_scopes_table',1),('2014_04_24_111810_create_oauth_refresh_tokens_table',1),('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2015_05_13_203712_create_tipos_usuarios_table',1),('2015_05_13_203905_add_tipo_usuario_id_to_usuarios',1),('2015_05_13_204103_create_professores_table',1),('2015_05_13_205424_create_alunos_table',1),('2015_05_13_205736_create_cursos_table',1),('2015_05_13_210102_create_unidades_curriculares_table',1),('2015_05_13_210222_create_turmas_table',1),('2015_05_13_210604_create_alunos_turmas_table',1),('2015_05_13_210808_create_cursos_unidades_curriculares_table',1),('2015_05_13_211235_create_professores_turmas_table',1),('2015_05_13_211408_create_cursos_alunos_table',1),('2015_05_13_211606_create_aulas_table',1),('2015_05_13_211945_create_chamadas_table',1),('2015_05_13_212447_create_status_diarios_table',1),('2015_05_14_180140_add_curso_origem_to_professores',1),('2015_05_15_115104_add_fields_to_aulas_table',1),('2015_05_22_122856_entrust_setup_tables',1),('2015_05_22_123044_remove_tipo_usuario_table',1),('2015_05_26_153726_add_curso_origem_alunos_turmas_table',1),('2015_05_26_154851_add_turno__column_to_turmas_table',1),('2015_05_26_155647_add_corrdenador_to_cursos_table',1),('2015_06_15_163041_create_diarios_envios_table',1),('2015_06_17_190218_change_professores_curso_origem_id',1),('2015_06_18_154537_change_cursos_coordenador_id',1),('2015_06_30_123217_create_tipos_ambiente_table',1),('2015_06_30_123225_create_ambientes_table',1),('2015_06_30_123313_create_tipos_dispositivos_aluno_table',1),('2015_06_30_123320_create_dispositivos_aluno_table',1),('2015_06_30_123332_create_dispositivos_ambiente_table',1),('2015_06_30_123907_add_column_ambiente_default_turmas_table',1),('2015_06_30_123933_add_column_ambiente_aulas_table',1),('2015_06_30_123955_add_column_horario_turmas_table',1),('2015_06_30_142653_add_columns_horario_aula_table',1),('2015_07_09_120957_rename_tipos_dispositivos_aluno_table',1),('2015_07_09_124241_create_heartbeats_dispositivo_table',1),('2015_07_09_124308_add_tipo_dispositivo_field_to_oauth_clients_table',1),('2015_07_15_123933_add_column_professor_aulas_table',1),('2015_07_21_130728_change_dispositivos_usuario_table',1);
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
  CONSTRAINT `oauth_access_token_scopes_scope_id_foreign` FOREIGN KEY (`scope_id`) REFERENCES `oauth_scopes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `oauth_access_token_scopes_access_token_id_foreign` FOREIGN KEY (`access_token_id`) REFERENCES `oauth_access_tokens` (`id`) ON DELETE CASCADE
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
  CONSTRAINT `oauth_auth_code_scopes_scope_id_foreign` FOREIGN KEY (`scope_id`) REFERENCES `oauth_scopes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `oauth_auth_code_scopes_auth_code_id_foreign` FOREIGN KEY (`auth_code_id`) REFERENCES `oauth_auth_codes` (`id`) ON DELETE CASCADE
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
  CONSTRAINT `oauth_client_grants_grant_id_foreign` FOREIGN KEY (`grant_id`) REFERENCES `oauth_grants` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `oauth_client_grants_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `oauth_clients` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
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
  CONSTRAINT `oauth_client_scopes_scope_id_foreign` FOREIGN KEY (`scope_id`) REFERENCES `oauth_scopes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `oauth_client_scopes_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `oauth_clients` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_client_scopes`
--

LOCK TABLES `oauth_client_scopes` WRITE;
/*!40000 ALTER TABLE `oauth_client_scopes` DISABLE KEYS */;
INSERT INTO `oauth_client_scopes` VALUES (1,'client1id','write-chamada','2015-07-21 22:26:56','2015-07-21 22:26:56'),(2,'client3id','write-chamada','2015-07-21 22:26:58','2015-07-21 22:26:58'),(3,'client4id','write-chamada','2015-07-21 22:27:00','2015-07-21 22:27:00'),(4,'client2id','read-agenda','2015-07-21 22:27:04','2015-07-21 22:27:04'),(5,'client2id','read-usuarios','2015-07-21 22:27:04','2015-07-21 22:27:04');
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
INSERT INTO `oauth_clients` VALUES ('client1id','client1secret','client1','2015-07-21 22:26:56','2015-07-21 22:26:56',1),('client2id','client2secret','client2','2015-07-21 22:27:04','2015-07-21 22:27:04',2),('client3id','client3secret','client3','2015-07-21 22:26:58','2015-07-21 22:26:58',1),('client4id','client4secret','client4','2015-07-21 22:27:00','2015-07-21 22:27:00',1);
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
  CONSTRAINT `oauth_grant_scopes_scope_id_foreign` FOREIGN KEY (`scope_id`) REFERENCES `oauth_scopes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `oauth_grant_scopes_grant_id_foreign` FOREIGN KEY (`grant_id`) REFERENCES `oauth_grants` (`id`) ON DELETE CASCADE
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
INSERT INTO `oauth_scopes` VALUES ('read-agenda','Permissão para ler a agenda letiva','2015-07-21 22:26:55','2015-07-21 22:26:55'),('read-usuarios','Permissão para ler informações dos usuários','2015-07-21 22:26:55','2015-07-21 22:26:55'),('write-chamada','Permissão para escrever na chamada','2015-07-21 22:26:55','2015-07-21 22:26:55');
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
INSERT INTO `permission_role` VALUES (33,1),(36,1),(33,2),(34,2),(35,2),(36,2),(37,2),(38,2),(39,2),(40,2),(41,2),(42,2),(46,2),(47,2),(48,2),(49,2),(62,2),(66,2),(70,2),(71,2),(76,2),(77,2),(1,3),(2,3),(3,3),(4,3),(5,3),(6,3),(7,3),(8,3),(9,3),(10,3),(11,3),(12,3),(13,3),(14,3),(15,3),(16,3),(17,3),(18,3),(19,3),(20,3),(21,3),(22,3),(23,3),(24,3),(25,3),(26,3),(27,3),(28,3),(29,3),(30,3),(31,3),(32,3),(43,3),(44,3),(45,3),(49,3),(50,3),(51,3),(52,3),(53,3),(54,3),(55,3),(56,3),(57,3),(58,3),(59,3),(60,3),(61,3),(63,3),(64,3),(65,3),(70,3),(71,3),(76,3),(77,3),(1,4),(2,4),(3,4),(4,4),(5,4),(6,4),(7,4),(8,4),(9,4),(10,4),(11,4),(12,4),(13,4),(14,4),(15,4),(16,4),(17,4),(18,4),(19,4),(20,4),(21,4),(22,4),(23,4),(24,4),(25,4),(26,4),(27,4),(28,4),(29,4),(30,4),(31,4),(32,4),(43,4),(44,4),(45,4),(49,4),(50,4),(51,4),(52,4),(53,4),(54,4),(55,4),(56,4),(57,4),(58,4),(59,4),(60,4),(61,4),(63,4),(64,4),(65,4),(67,4),(68,4),(69,4),(70,4),(71,4),(72,4),(73,4),(74,4),(75,4),(76,4),(77,4),(78,4),(79,4),(80,4),(81,4),(82,4),(83,4),(84,4),(85,4),(86,4),(87,4),(88,4),(89,4),(90,4),(91,4),(92,4),(93,4),(94,4),(95,4),(96,4),(97,4),(98,4),(99,4),(100,4),(101,4),(102,4),(103,4),(104,4),(105,4),(106,4),(107,4),(108,4),(109,4),(110,4),(111,4),(112,4);
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
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'create-aluno',NULL,NULL,'2015-07-21 22:27:08','2015-07-21 22:27:08'),(2,'edit-aluno',NULL,NULL,'2015-07-21 22:27:08','2015-07-21 22:27:08'),(3,'view-aluno',NULL,NULL,'2015-07-21 22:27:08','2015-07-21 22:27:08'),(4,'list-alunos',NULL,NULL,'2015-07-21 22:27:08','2015-07-21 22:27:08'),(5,'delete-aluno',NULL,NULL,'2015-07-21 22:27:08','2015-07-21 22:27:08'),(6,'create-professor',NULL,NULL,'2015-07-21 22:27:08','2015-07-21 22:27:08'),(7,'edit-professor',NULL,NULL,'2015-07-21 22:27:08','2015-07-21 22:27:08'),(8,'view-professor',NULL,NULL,'2015-07-21 22:27:09','2015-07-21 22:27:09'),(9,'delete-professor',NULL,NULL,'2015-07-21 22:27:09','2015-07-21 22:27:09'),(10,'list-professor',NULL,NULL,'2015-07-21 22:27:09','2015-07-21 22:27:09'),(11,'create-coordenador',NULL,NULL,'2015-07-21 22:27:09','2015-07-21 22:27:09'),(12,'edit-coordenador',NULL,NULL,'2015-07-21 22:27:09','2015-07-21 22:27:09'),(13,'view-coordenador',NULL,NULL,'2015-07-21 22:27:09','2015-07-21 22:27:09'),(14,'list-coordenador',NULL,NULL,'2015-07-21 22:27:09','2015-07-21 22:27:09'),(15,'create-unidade-curricular',NULL,NULL,'2015-07-21 22:27:10','2015-07-21 22:27:10'),(16,'edit-unidade-curricular',NULL,NULL,'2015-07-21 22:27:10','2015-07-21 22:27:10'),(17,'delete-unidade-curricular',NULL,NULL,'2015-07-21 22:27:10','2015-07-21 22:27:10'),(18,'view-unidade-curricular',NULL,NULL,'2015-07-21 22:27:10','2015-07-21 22:27:10'),(19,'list-unidade-curricular',NULL,NULL,'2015-07-21 22:27:10','2015-07-21 22:27:10'),(20,'create-turma',NULL,NULL,'2015-07-21 22:27:10','2015-07-21 22:27:10'),(21,'edit-turma',NULL,NULL,'2015-07-21 22:27:11','2015-07-21 22:27:11'),(22,'view-turma',NULL,NULL,'2015-07-21 22:27:11','2015-07-21 22:27:11'),(23,'delete-turma',NULL,NULL,'2015-07-21 22:27:11','2015-07-21 22:27:11'),(24,'list-turma',NULL,NULL,'2015-07-21 22:27:11','2015-07-21 22:27:11'),(25,'view-controle-faltas',NULL,NULL,'2015-07-21 22:27:11','2015-07-21 22:27:11'),(26,'create-aula',NULL,NULL,'2015-07-21 22:27:11','2015-07-21 22:27:11'),(27,'edit-aula',NULL,NULL,'2015-07-21 22:27:12','2015-07-21 22:27:12'),(28,'view-aula',NULL,NULL,'2015-07-21 22:27:12','2015-07-21 22:27:12'),(29,'delete-aula',NULL,NULL,'2015-07-21 22:27:12','2015-07-21 22:27:12'),(30,'list-aula',NULL,NULL,'2015-07-21 22:27:12','2015-07-21 22:27:12'),(31,'view-chamada',NULL,NULL,'2015-07-21 22:27:12','2015-07-21 22:27:12'),(32,'edit-chamada',NULL,NULL,'2015-07-21 22:27:12','2015-07-21 22:27:12'),(33,'view-own-turma',NULL,NULL,'2015-07-21 22:27:12','2015-07-21 22:27:12'),(34,'edit-own-turma',NULL,NULL,'2015-07-21 22:27:12','2015-07-21 22:27:12'),(35,'view-own-controle-faltas',NULL,NULL,'2015-07-21 22:27:12','2015-07-21 22:27:12'),(36,'view-own-aula',NULL,NULL,'2015-07-21 22:27:12','2015-07-21 22:27:12'),(37,'edit-own-aula',NULL,NULL,'2015-07-21 22:27:13','2015-07-21 22:27:13'),(38,'list-own-aulas',NULL,NULL,'2015-07-21 22:27:13','2015-07-21 22:27:13'),(39,'delete-own-aula',NULL,NULL,'2015-07-21 22:27:13','2015-07-21 22:27:13'),(40,'create-own-aula',NULL,NULL,'2015-07-21 22:27:13','2015-07-21 22:27:13'),(41,'view-own-chamada',NULL,NULL,'2015-07-21 22:27:13','2015-07-21 22:27:13'),(42,'edit-own-chamada',NULL,NULL,'2015-07-21 22:27:13','2015-07-21 22:27:13'),(43,'export-diario',NULL,NULL,'2015-07-21 22:27:13','2015-07-21 22:27:13'),(44,'send-diario',NULL,NULL,'2015-07-21 22:27:13','2015-07-21 22:27:13'),(45,'close-diario',NULL,NULL,'2015-07-21 22:27:13','2015-07-21 22:27:13'),(46,'export-own-diario',NULL,NULL,'2015-07-21 22:27:13','2015-07-21 22:27:13'),(47,'send-own-diario',NULL,NULL,'2015-07-21 22:27:13','2015-07-21 22:27:13'),(48,'close-own-diario',NULL,NULL,'2015-07-21 22:27:13','2015-07-21 22:27:13'),(49,'import-excel',NULL,NULL,'2015-07-21 22:27:13','2015-07-21 22:27:13'),(50,'create-curso',NULL,NULL,'2015-07-21 22:27:14','2015-07-21 22:27:14'),(51,'edit-curso',NULL,NULL,'2015-07-21 22:27:14','2015-07-21 22:27:14'),(52,'view-curso',NULL,NULL,'2015-07-21 22:27:14','2015-07-21 22:27:14'),(53,'delete-curso',NULL,NULL,'2015-07-21 22:27:14','2015-07-21 22:27:14'),(54,'list-cursos',NULL,NULL,'2015-07-21 22:27:14','2015-07-21 22:27:14'),(55,'attach-curso-uc',NULL,NULL,'2015-07-21 22:27:14','2015-07-21 22:27:14'),(56,'detach-curso-uc',NULL,NULL,'2015-07-21 22:27:14','2015-07-21 22:27:14'),(57,'list-cursos-uc',NULL,NULL,'2015-07-21 22:27:15','2015-07-21 22:27:15'),(58,'attach-aluno-turma',NULL,NULL,'2015-07-21 22:27:15','2015-07-21 22:27:15'),(59,'update-aluno-turma',NULL,NULL,'2015-07-21 22:27:15','2015-07-21 22:27:15'),(60,'detach-aluno-turma',NULL,NULL,'2015-07-21 22:27:15','2015-07-21 22:27:15'),(61,'list-alunos-turma',NULL,NULL,'2015-07-21 22:27:15','2015-07-21 22:27:15'),(62,'list-alunos-own-turma',NULL,NULL,'2015-07-21 22:27:15','2015-07-21 22:27:15'),(63,'attach-professor-turma',NULL,NULL,'2015-07-21 22:27:15','2015-07-21 22:27:15'),(64,'detach-professor-turma',NULL,NULL,'2015-07-21 22:27:15','2015-07-21 22:27:15'),(65,'list-professores-turma',NULL,NULL,'2015-07-21 22:27:16','2015-07-21 22:27:16'),(66,'list-professores-own-turma',NULL,NULL,'2015-07-21 22:27:16','2015-07-21 22:27:16'),(67,'create-ambiente',NULL,NULL,'2015-07-21 22:27:16','2015-07-21 22:27:16'),(68,'edit-ambiente',NULL,NULL,'2015-07-21 22:27:16','2015-07-21 22:27:16'),(69,'delete-ambiente',NULL,NULL,'2015-07-21 22:27:16','2015-07-21 22:27:16'),(70,'view-ambiente',NULL,NULL,'2015-07-21 22:27:16','2015-07-21 22:27:16'),(71,'list-ambientes',NULL,NULL,'2015-07-21 22:27:17','2015-07-21 22:27:17'),(72,'view-ambientes-page',NULL,NULL,'2015-07-21 22:27:17','2015-07-21 22:27:17'),(73,'create-tipo-ambiente',NULL,NULL,'2015-07-21 22:27:17','2015-07-21 22:27:17'),(74,'edit-tipo-ambiente',NULL,NULL,'2015-07-21 22:27:17','2015-07-21 22:27:17'),(75,'delete-tipo-ambiente',NULL,NULL,'2015-07-21 22:27:17','2015-07-21 22:27:17'),(76,'view-tipo-ambiente',NULL,NULL,'2015-07-21 22:27:17','2015-07-21 22:27:17'),(77,'list-tipos-ambiente',NULL,NULL,'2015-07-21 22:27:17','2015-07-21 22:27:17'),(78,'create-dispositivo',NULL,NULL,'2015-07-21 22:27:17','2015-07-21 22:27:17'),(79,'edit-dispositivo',NULL,NULL,'2015-07-21 22:27:17','2015-07-21 22:27:17'),(80,'delete-dispositivo',NULL,NULL,'2015-07-21 22:27:17','2015-07-21 22:27:17'),(81,'view-dispositivo',NULL,NULL,'2015-07-21 22:27:17','2015-07-21 22:27:17'),(82,'list-dispositivos',NULL,NULL,'2015-07-21 22:27:17','2015-07-21 22:27:17'),(83,'view-dispositivos-page',NULL,NULL,'2015-07-21 22:27:17','2015-07-21 22:27:17'),(84,'create-tipo-dispositivo',NULL,NULL,'2015-07-21 22:27:18','2015-07-21 22:27:18'),(85,'edit-tipo-dispositivo',NULL,NULL,'2015-07-21 22:27:18','2015-07-21 22:27:18'),(86,'delete-tipo-dispositivo',NULL,NULL,'2015-07-21 22:27:18','2015-07-21 22:27:18'),(87,'view-tipo-dispositivo',NULL,NULL,'2015-07-21 22:27:18','2015-07-21 22:27:18'),(88,'list-tipos-dispositivo',NULL,NULL,'2015-07-21 22:27:18','2015-07-21 22:27:18'),(89,'list-escopos',NULL,NULL,'2015-07-21 22:27:18','2015-07-21 22:27:18'),(90,'create-heartbeats',NULL,NULL,'2015-07-21 22:27:18','2015-07-21 22:27:18'),(91,'edit-heartbeats',NULL,NULL,'2015-07-21 22:27:18','2015-07-21 22:27:18'),(92,'delete-heartbeats',NULL,NULL,'2015-07-21 22:27:18','2015-07-21 22:27:18'),(93,'view-heartbeats',NULL,NULL,'2015-07-21 22:27:18','2015-07-21 22:27:18'),(94,'list-heartbeats',NULL,NULL,'2015-07-21 22:27:18','2015-07-21 22:27:18'),(95,'create-usuario',NULL,NULL,'2015-07-21 22:27:19','2015-07-21 22:27:19'),(96,'edit-usuario',NULL,NULL,'2015-07-21 22:27:19','2015-07-21 22:27:19'),(97,'delete-usuario',NULL,NULL,'2015-07-21 22:27:19','2015-07-21 22:27:19'),(98,'view-usuario',NULL,NULL,'2015-07-21 22:27:19','2015-07-21 22:27:19'),(99,'list-usuarios',NULL,NULL,'2015-07-21 22:27:19','2015-07-21 22:27:19'),(100,'view-usuarios-page',NULL,NULL,'2015-07-21 22:27:19','2015-07-21 22:27:19'),(101,'create-tipo-usuario',NULL,NULL,'2015-07-21 22:27:19','2015-07-21 22:27:19'),(102,'edit-tipo-usuario',NULL,NULL,'2015-07-21 22:27:19','2015-07-21 22:27:19'),(103,'delete-tipo-usuario',NULL,NULL,'2015-07-21 22:27:19','2015-07-21 22:27:19'),(104,'view-tipo-usuario',NULL,NULL,'2015-07-21 22:27:19','2015-07-21 22:27:19'),(105,'list-tipos-usuario',NULL,NULL,'2015-07-21 22:27:19','2015-07-21 22:27:19'),(106,'view-tipos-usuario-page',NULL,NULL,'2015-07-21 22:27:19','2015-07-21 22:27:19'),(107,'create-dispositivo-usuario',NULL,NULL,'2015-07-21 22:27:19','2015-07-21 22:27:19'),(108,'edit-dispositivo-usuario',NULL,NULL,'2015-07-21 22:27:19','2015-07-21 22:27:19'),(109,'delete-dispositivo-usuario',NULL,NULL,'2015-07-21 22:27:20','2015-07-21 22:27:20'),(110,'view-dispositivo-usuario',NULL,NULL,'2015-07-21 22:27:20','2015-07-21 22:27:20'),(111,'list-dispositivos-usuario',NULL,NULL,'2015-07-21 22:27:20','2015-07-21 22:27:20'),(112,'view-dispositivos-usuario-page',NULL,NULL,'2015-07-21 22:27:20','2015-07-21 22:27:20');
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
INSERT INTO `professores` VALUES (49,'2015-07-21 22:27:32','2015-07-21 22:27:32',2),(50,'2015-07-21 22:27:32','2015-07-21 22:27:32',2),(51,'2015-07-21 22:27:32','2015-07-21 22:27:32',2),(52,'2015-07-21 22:27:32','2015-07-21 22:27:32',3),(53,'2015-07-21 22:27:32','2015-07-21 22:27:32',2),(54,'2015-07-21 22:27:32','2015-07-21 22:27:32',5),(55,'2015-07-21 22:27:33','2015-07-21 22:27:33',1);
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
  CONSTRAINT `professores_turmas_turma_id_foreign` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`),
  CONSTRAINT `professores_turmas_professor_id_foreign` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`)
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
INSERT INTO `roles` VALUES (1,'aluno','Aluno',NULL,'2015-07-21 22:27:08','2015-07-21 22:27:08'),(2,'professor','Professor',NULL,'2015-07-21 22:27:08','2015-07-21 22:27:08'),(3,'coordenador','Coordenador',NULL,'2015-07-21 22:27:08','2015-07-21 22:27:08'),(4,'admin','Administrador',NULL,'2015-07-21 22:27:08','2015-07-21 22:27:08');
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
INSERT INTO `tipos_ambiente` VALUES (1,'sala de aula','2015-07-21 22:27:07','2015-07-21 22:27:07'),(2,'laboratório','2015-07-21 22:27:07','2015-07-21 22:27:07');
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
INSERT INTO `tipos_dispositivos` VALUES (1,'arduino','2015-07-21 22:26:56','2015-07-21 22:26:56'),(2,'sistema','2015-07-21 22:27:04','2015-07-21 22:27:04'),(3,'RFID Card','2015-07-21 22:27:30','2015-07-21 22:27:30');
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
INSERT INTO `turmas` VALUES (1,'S032N','2015-02-19','2015-07-14',3,'2015-07-21 22:27:33','2015-07-21 22:27:33','Noite',1,'18:30:00','22:50:00'),(2,'S049','2014-07-31','2014-12-18',1,'2015-07-21 22:27:33','2015-07-21 22:27:33','Noite',2,'18:30:00','22:50:00'),(3,'S049N','2015-02-19','2015-07-14',1,'2015-07-21 22:27:33','2015-07-21 22:27:33','Noite',3,'18:30:00','22:50:00'),(4,'S075N','2014-07-31','2014-12-18',5,'2015-07-21 22:27:33','2015-07-21 22:27:33','Noite',4,'18:30:00','22:50:00'),(5,'S087N','2014-02-17','2014-07-15',2,'2015-07-21 22:27:33','2015-07-21 22:27:33','Noite',12,'18:30:00','22:50:00'),(6,'S091N','2015-02-19','2015-07-14',4,'2015-07-21 22:27:33','2015-07-21 22:27:33','Noite',11,'18:30:00','22:50:00');
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
INSERT INTO `unidades_curriculares` VALUES (1,'S049 - Modelagem de Banco de Dados',70,'S049','2015-07-21 22:27:33','2015-07-21 22:27:33'),(2,'S087- Sistemas Operacionais',70,'S087','2015-07-21 22:27:33','2015-07-21 22:27:33'),(3,'S032 - Fundamentos de Sistemas de Informação',70,'S032','2015-07-21 22:27:33','2015-07-21 22:27:33'),(4,'S091 - Técnicas de Programação',70,'S091','2015-07-21 22:27:33','2015-07-21 22:27:33'),(5,'S075 - Sistema de Gerenciamento de Banco de Dados',70,'S075','2015-07-21 22:27:33','2015-07-21 22:27:33');
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
INSERT INTO `usuarios` VALUES (1,'15726','ABNER BORDA FONSECA','abner_borda_fonseca@gmail.com','$2y$10$gnZwANUk9UbbYVdGn8z5g.q9GF4hebV5HAz0i.qEOCW.PuBCkeBzy',NULL,'2015-07-21 22:27:20','2015-07-21 22:27:20'),(2,'15722','ADRIAN RUBILAR LEMES CAETANO','adrian_rubilar_lemes_caetano@gmail.com','$2y$10$BKCvtpaa6dDcnYNx4fbb5.QmfSS7s94bgCHhXS6SPttfxEZVwlk5O',NULL,'2015-07-21 22:27:20','2015-07-21 22:27:20'),(3,'20569','ALEXANDRE GABIATTI VIEIRA','alexandre_gabiatti_vieira@gmail.com','$2y$10$4HAP1phxyIgIiLDPVfPF4ONYHOZYIkT5VFv.W/Xl9WZOESyeqRqpi',NULL,'2015-07-21 22:27:21','2015-07-21 22:27:21'),(4,'16049','ALEXSANDRO GIOVANNI DA SILVA DIAS','alexsandro_giovanni_da_silva_dias@gmail.com','$2y$10$PCylRF5n7agAVu/FfBiyDe1pHP.4JUrgSvHlfuE/1k.5./NplPukK',NULL,'2015-07-21 22:27:21','2015-07-21 22:27:21'),(5,'20628','ANA CARLA MESSIAS DE MOURA','ana_carla_messias_de_moura@gmail.com','$2y$10$2XAetkGR5t4mN1kjJShwEO/MGT4qz0jSWBVyOdS50gXG/5xcZej6y',NULL,'2015-07-21 22:27:21','2015-07-21 22:27:21'),(6,'20531','ANGELO VICTOR ISRAEL MUNIZ','angelo_victor_israel_muniz@gmail.com','$2y$10$K16QiP7de0Bb3IvxV.JDnunHn1AmidyFWFW7lSyOskgQxXT9zetPC',NULL,'2015-07-21 22:27:21','2015-07-21 22:27:21'),(7,'20579','BRUNO DA SILVA BRIXIUS','bruno_da_silva_brixius@gmail.com','$2y$10$HLRECvw1Ur/CQXDF2Fhynu5r5QSEFgmisGba6g2cmE2YQt2Q8dc9e',NULL,'2015-07-21 22:27:21','2015-07-21 22:27:21'),(8,'17486','CRISTIANO DE MOURA','cristiano_de_moura@gmail.com','$2y$10$Ejg4ptanydtY2cr5W4.4M.KbjMjBaIRppQEu6OnsYAuun6srXPy46',NULL,'2015-07-21 22:27:22','2015-07-21 22:27:22'),(9,'20624','DANIEL OLIVEIRA RODRIGUES','daniel_oliveira_rodrigues@gmail.com','$2y$10$nAjQqCGBZ07EUSN./vhjr.K.07Tahvg8S5KOh0aG8UVXv1SRpaer6',NULL,'2015-07-21 22:27:22','2015-07-21 22:27:22'),(10,'15717','DIONATA LEONEL MACHADO FERRAZ','dionata_leonel_machado_ferraz@gmail.com','$2y$10$8c1E7Mn6YVFGHOEMez3W2eiLvHu5IFph96PCVRRj6p9AFiO/O4fNO',NULL,'2015-07-21 22:27:22','2015-07-21 22:27:22'),(11,'14186','DOUGLAS COSTA DA ROCHA','douglas_costa_da_rocha@gmail.com','$2y$10$6svu5MlfBlc6D6v/0ThIlOraGh8u2EKW7j7HZ3YPp6erg2Agqm6d6',NULL,'2015-07-21 22:27:22','2015-07-21 22:27:22'),(12,'17509','FABIANO BORBA VIANA FEIJÓ','fabiano_borba_viana_feijÓ@gmail.com','$2y$10$elqg8L71WW8MYOK.Q.9d6OWZhFbQV.XHYFWyrtJ5YKizm/Nw508Ee',NULL,'2015-07-21 22:27:23','2015-07-21 22:27:23'),(13,'19024','FELIPE DA SILVA PACHECO','felipe_da_silva_pacheco@gmail.com','$2y$10$iHGF30Jo4NOyigHG/BvNn.OTSxNltKEsJOjtlTuinmKYvJiuPgMXG',NULL,'2015-07-21 22:27:23','2015-07-21 22:27:23'),(14,'19026','FERNANDO LEITE SZEZECINSKI','fernando_leite_szezecinski@gmail.com','$2y$10$IcX8U9v6lfUrFrrlLf9NlOv6sRxtez8pZUkFzUzo0cummdw81yU5K',NULL,'2015-07-21 22:27:23','2015-07-21 22:27:23'),(15,'15639','GUILHERME PEREIRA SILVEIRA','guilherme_pereira_silveira@gmail.com','$2y$10$/ZtOxwYAr7QhKsyzlFqNgePV6qB5RW1/K./4QzGUfC6EKBtu2FDZ6',NULL,'2015-07-21 22:27:23','2015-07-21 22:27:23'),(16,'19020','LEONARDO GOMES MONTEIRO MIGUEIS CERQUEIRA','leonardo_gomes_monteiro_migueis_cerqueira@gmail.com','$2y$10$JmShUboeON50SEGri89v9.bX2Tl5D6.egHNfqLHXv4m97gZ9r5WFi',NULL,'2015-07-21 22:27:23','2015-07-21 22:27:23'),(17,'8059','LOGAN OLIVEIRA LOUREIRO','logan_oliveira_loureiro@gmail.com','$2y$10$Mr/eqKtvCVCH5G1.ClvP6e5HLxP64I1c5xz.bX5S7nXAtxq3VfNsS',NULL,'2015-07-21 22:27:23','2015-07-21 22:27:23'),(18,'15701','NÍKOLAS MARTINS VARGAS','nÍkolas_martins_vargas@gmail.com','$2y$10$/e5TogogyxBI0Qths2DhnONvXsK5.Z7N40vtdGi8xVjFG5pn4X3Ve',NULL,'2015-07-21 22:27:24','2015-07-21 22:27:24'),(19,'15719','PEDRO LUIZ SROCZYNSKI','pedro_luiz_sroczynski@gmail.com','$2y$10$U2eXL3b9I0LWOMO4YLwk3OKqu7RPRHyTnFdnplO9uIwSdf7tpBLDe',NULL,'2015-07-21 22:27:24','2015-07-21 22:27:24'),(20,'13886','RAFAEL LOPES SANTOS','rafael_lopes_santos@gmail.com','$2y$10$TH.zjxeu.BlAeLr.10SToOhDHYtujONYGrFiACTjmGVLI9ly7PB62',NULL,'2015-07-21 22:27:24','2015-07-21 22:27:24'),(21,'17513','RENAN AGUIAR OLIVEIRA','renan_aguiar_oliveira@gmail.com','$2y$10$8SqNRyYex6dKYB8zqO2eOu7yu/L7VIQBBxZLEXg6DTzdHnEQ2nZ6K',NULL,'2015-07-21 22:27:24','2015-07-21 22:27:24'),(22,'15737','STEFANI SILVA DE LIMA','stefani_silva_de_lima@gmail.com','$2y$10$PMFaMC2qAVRSXJFEw.GKHOymSxoeeGs3oGg2GR42LeQeyfaXQHuUK',NULL,'2015-07-21 22:27:25','2015-07-21 22:27:25'),(23,'20619','VITHOR SAMPAIO MARQUES','vithor_sampaio_marques@gmail.com','$2y$10$NXBlr3f0c8cjXDxGHu8gbuNZFtrM4e9ljkO1CVhcB94vKlFLEg9uW',NULL,'2015-07-21 22:27:25','2015-07-21 22:27:25'),(24,'20580','VITOR DA SILVA BRIXIUS','vitor_da_silva_brixius@gmail.com','$2y$10$uc03QzZvqSQ0AyYPAzRL2.LeYQGOTQQiE/uF1ENVITCJj7aDNDSG2',NULL,'2015-07-21 22:27:25','2015-07-21 22:27:25'),(25,'16102','WELLYNTON LOPES TOZON','wellynton_lopes_tozon@gmail.com','$2y$10$JMHz5r36JqOilOA3LGw0XuVbR9KleJGPXQjSPBpMQ9WYEG5FXVTVS',NULL,'2015-07-21 22:27:25','2015-07-21 22:27:25'),(26,'20537','WILLIAN FERREIRA PEIXOTO','willian_ferreira_peixoto@gmail.com','$2y$10$HHILY9nvKrVkSWesV8y79uCnlSCVm4D8YdYH3gjjpfYqhnBoqqZie',NULL,'2015-07-21 22:27:25','2015-07-21 22:27:25'),(27,'20525','ALAN PINHEIRO DOS SANTOS','alan_pinheiro_dos_santos@gmail.com','$2y$10$z8C6xVUXD.M0CD0GSsGn3ugIsnIx9sapSR0nKmINkGOt4hvxxGbPe',NULL,'2015-07-21 22:27:25','2015-07-21 22:27:25'),(28,'20565','ANDERSON GUIMARAES MACHADO','anderson_guimaraes_machado@gmail.com','$2y$10$9ylg3qwisthVNqkTZQHLkeX2/CEXPRcfcPFyK7jnCLtFAXal7USsi',NULL,'2015-07-21 22:27:25','2015-07-21 22:27:25'),(29,'20635','ARTHUR HENRIQUE MENDES BERTE','arthur_henrique_mendes_berte@gmail.com','$2y$10$tW6GhweGCs4gGA5AZBLEgeEoI5l2Xb62iVezEUQQ5YEAwMugA4bSC',NULL,'2015-07-21 22:27:26','2015-07-21 22:27:26'),(30,'20532','CASSIO LANGLOIS MACHADO','cassio_langlois_machado@gmail.com','$2y$10$ECJSbtv0cNGCpXu5EoQq/.ooqoX7n3IAoK22RUdhvELgIRXUd0bx6',NULL,'2015-07-21 22:27:26','2015-07-21 22:27:26'),(31,'20562','DEIVIDI OLIVEIRA DA SILVA','deividi_oliveira_da_silva@gmail.com','$2y$10$Q46glza6CvNA0Yq/j8J6tuI4B.TioPZXUs5shMF7K/6.Tm1sk5B8i',NULL,'2015-07-21 22:27:26','2015-07-21 22:27:26'),(32,'20529','FRANCISCO PEDRO FERNANDES ALMEIDA','francisco_pedro_fernandes_almeida@gmail.com','$2y$10$bZ5bNU70HftvMmZ7D3ewUuN9fEqLdn/BKe10LgwSqHruhyLfsjCNW',NULL,'2015-07-21 22:27:26','2015-07-21 22:27:26'),(33,'5901','GABRIEL GONÇALVES STANOSKI','gabriel_gonÇalves_stanoski@gmail.com','$2y$10$hv5xOcIFIu85kf20A6gowOBuQ87njLAYvfL/c7el0q7Avc742nQLO',NULL,'2015-07-21 22:27:27','2015-07-21 22:27:27'),(34,'20566','GUILHERME DOS SANTOS SILVA','guilherme_dos_santos_silva@gmail.com','$2y$10$lnhE5qbsTMkWwFw.Gsurx.GW81.5huOLiqesLAZZodUdhwp7HuvUy',NULL,'2015-07-21 22:27:28','2015-07-21 22:27:28'),(35,'20522','JHONATAS DAVI DE SOUZA','jhonatas_davi_de_souza@gmail.com','$2y$10$dwZ5oR0kcIm4Lmyr3pZqkurNOav.I46SJ2w.AmEJUxuSalkAenX/e',NULL,'2015-07-21 22:27:28','2015-07-21 22:27:28'),(36,'20570','LEONARDO NUNES','leonardo_nunes@gmail.com','$2y$10$OmfSNCX.Rzrdkkiu9e6Am.MkR64vAeFrCYw1fRJD.94CKbYJ.pD4a',NULL,'2015-07-21 22:27:28','2015-07-21 22:27:28'),(37,'20519','LUCIANO GAMA MEDEIROS','luciano_gama_medeiros@gmail.com','$2y$10$13hS3zNcaZ3b2s32j7vLaup3Tr7b4jUMvRlorBZoJ0gCV9Wzrjnhi',NULL,'2015-07-21 22:27:28','2015-07-21 22:27:28'),(38,'20512','LUIZ CARLOS TORRES DE CASTILHOS','luiz_carlos_torres_de_castilhos@gmail.com','$2y$10$0S08IlO7K3ctymlHSG4nFeIBlAbiCh51WVskfkDA2ImFCAlXjpAl.',NULL,'2015-07-21 22:27:28','2015-07-21 22:27:28'),(39,'20505','RAFAEL CAMMARANO GUGLIELMI','rafael_cammarano_guglielmi@gmail.com','$2y$10$f42j8NV0lOcxmsq3llbPK.URUQux3t5BIKtBMPesDtV5vTqvOyB.e',NULL,'2015-07-21 22:27:28','2015-07-21 22:27:28'),(40,'21365','BEATRICE VICTORIA FERNANDES','beatrice_victoria_fernandes@gmail.com','$2y$10$C9knLeCR/3/igppdOoUenOTWtCGikmYjvDVw99S3qoFAYENsf/Vzm',NULL,'2015-07-21 22:27:29','2015-07-21 22:27:29'),(41,'21367','BRUNO PRATES BOFF','bruno_prates_boff@gmail.com','$2y$10$y1x4C0uTiQRWsO6cn8Tmb.4m2Zr92okqDkpvm5k.Js9TxT3U2uVwi',NULL,'2015-07-21 22:27:29','2015-07-21 22:27:29'),(42,'258','FAGNER DAVID NUNES','fagner_david_nunes@gmail.com','$2y$10$9R6U5evd0RffFGc41aJk3OJ5tUfBJIbPXvaHomgDcxIrZ3E0pxsL.',NULL,'2015-07-21 22:27:29','2015-07-21 22:27:29'),(43,'21391','FELIPE AMANCIO VIEIRA','felipe_amancio_vieira@gmail.com','$2y$10$DniD8fHTAsxeDcAMlY0MF.5kzJd8e6TYXbE6EPg5er.32Ku7nXnSq',NULL,'2015-07-21 22:27:29','2015-07-21 22:27:29'),(44,'21364','GREGORY PITTOL BORIN','gregory_pittol_borin@gmail.com','$2y$10$b0OwsJC/ESoKTQeO6/SVrOVzlRIedYnCIAfAFgn2Zegzjx20B8v36',NULL,'2015-07-21 22:27:29','2015-07-21 22:27:29'),(45,'21393','GUILHERME NEUMANN','guilherme_neumann@gmail.com','$2y$10$PRFUiZykKuOElhecUsac7uGUSh/465aWu94ALGvRTIMcM.FZksawu',NULL,'2015-07-21 22:27:29','2015-07-21 22:27:29'),(46,'23090','JULIANO ANTÔNIO DA ROSA SOARES','juliano_antÔnio_da_rosa_soares@gmail.com','$2y$10$cObovCDYmqJlXyvtCBpdnuTqkYq/F8YhVEavtiRzvbVp2pXMYK2lq',NULL,'2015-07-21 22:27:30','2015-07-21 22:27:30'),(47,'14216','ROBSON LUIS RAMOS','robson_luis_ramos@gmail.com','$2y$10$LsP5/hbbwl2b2v8VnRD.NORzJXnuxgSpg5L8j6k8Impdtz7jjfM8W',NULL,'2015-07-21 22:27:30','2015-07-21 22:27:30'),(48,'23301','NATANIEL LEONAM  DA COSTA GOMES','nataniel_leonam__da_costa_gomes@gmail.com','$2y$10$0crDAkkWCOAWS/ILbaTHkOET5esHeKJYwTsqtEp8UsIRgZGW7QI2q',NULL,'2015-07-21 22:27:30','2015-07-21 22:27:30'),(49,'1234','Valderi R. Q. Leithardt','valderi_r._q._leithardt@gmail.com','$2y$10$/iApvglC0i80xAtWaqMF8ODMIVm7PTeUAqxnnjUOoc4Yd0iUBAzhK',NULL,'2015-07-21 22:27:31','2015-07-21 22:27:31'),(50,'31019','Gustavo B. Brand','gustavo_b._brand@gmail.com','$2y$10$DH.s.0lSjwpYKjMjC9Nb1uojJkQhBRhmQ4TmsDYHYdU9cN1rPinAG',NULL,'2015-07-21 22:27:31','2015-07-21 22:27:31'),(51,'3456','Dione Taschetto','dione_taschetto@gmail.com','$2y$10$PLmPRUF87YwnzKKysTZ0BerxFz7kMhVu28ZJbTlIKo9jqE.p.ZoNK',NULL,'2015-07-21 22:27:31','2015-07-21 22:27:31'),(52,'4567','Terezinha I. M.Torres','terezinha_i._m.torres@gmail.com','$2y$10$y3uj9q/TcFbsqMiND/oAaeyQk0z/W2gxn8rUgVll3lS/hAexZGX06',NULL,'2015-07-21 22:27:31','2015-07-21 22:27:31'),(53,'5678','Guilherme Dal Bianco','guilherme_dal_bianco@gmail.com','$2y$10$tEt8FqbL/rY3XUmTUjnLaOoxgof6AGBgJtdNvV9W.pYVjOhTVsAEa',NULL,'2015-07-21 22:27:31','2015-07-21 22:27:31'),(54,'7889','Leandro José Cassol','leandro_josé_cassol@gmail.com','$2y$10$94urDvTQC1EkjmYJ/h/FWeeJKpYfpbhz8WPWKPkIcKMqanJ7Kekz.',NULL,'2015-07-21 22:27:31','2015-07-21 22:27:31'),(55,'4844','Alexandre Gaspary Haupt','alexandre_gaspary_haupt@gmail.com','$2y$10$uoYxeSK.mdKMM0xmNC8ZbeNMupquPd4UESKQG65QX.Kx6FTFWv3F.',NULL,'2015-07-21 22:27:31','2015-07-21 22:27:31'),(56,'0000','Administrador','admin@sigai.org','$2y$10$/efSv2mkj6mCddEhqA3O6emM/YcGAkqKAJqX/hMHlzAizn1cNZVSW',NULL,'2015-07-21 22:27:31','2015-07-21 22:27:31');
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

-- Dump completed on 2015-07-21 16:29:13