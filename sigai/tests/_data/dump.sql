-- MySQL dump 10.13  Distrib 5.5.43, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: sigai_test
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
INSERT INTO `alunos` VALUES (1,'2015-06-30 14:55:59','2015-06-30 14:55:59'),(2,'2015-06-30 14:55:59','2015-06-30 14:55:59'),(3,'2015-06-30 14:55:59','2015-06-30 14:55:59'),(4,'2015-06-30 14:55:59','2015-06-30 14:55:59'),(5,'2015-06-30 14:55:59','2015-06-30 14:55:59'),(6,'2015-06-30 14:56:00','2015-06-30 14:56:00'),(7,'2015-06-30 14:56:00','2015-06-30 14:56:00'),(8,'2015-06-30 14:56:00','2015-06-30 14:56:00'),(9,'2015-06-30 14:56:00','2015-06-30 14:56:00'),(10,'2015-06-30 14:56:00','2015-06-30 14:56:00'),(11,'2015-06-30 14:56:00','2015-06-30 14:56:00'),(12,'2015-06-30 14:56:01','2015-06-30 14:56:01'),(13,'2015-06-30 14:56:01','2015-06-30 14:56:01'),(14,'2015-06-30 14:56:01','2015-06-30 14:56:01'),(15,'2015-06-30 14:56:01','2015-06-30 14:56:01'),(16,'2015-06-30 14:56:01','2015-06-30 14:56:01'),(17,'2015-06-30 14:56:02','2015-06-30 14:56:02'),(18,'2015-06-30 14:56:02','2015-06-30 14:56:02'),(19,'2015-06-30 14:56:02','2015-06-30 14:56:02'),(20,'2015-06-30 14:56:02','2015-06-30 14:56:02'),(21,'2015-06-30 14:56:02','2015-06-30 14:56:02'),(22,'2015-06-30 14:56:02','2015-06-30 14:56:02'),(23,'2015-06-30 14:56:03','2015-06-30 14:56:03'),(24,'2015-06-30 14:56:03','2015-06-30 14:56:03'),(25,'2015-06-30 14:56:03','2015-06-30 14:56:03'),(26,'2015-06-30 14:56:03','2015-06-30 14:56:03'),(27,'2015-06-30 14:56:03','2015-06-30 14:56:03'),(28,'2015-06-30 14:56:04','2015-06-30 14:56:04'),(29,'2015-06-30 14:56:04','2015-06-30 14:56:04'),(30,'2015-06-30 14:56:04','2015-06-30 14:56:04'),(31,'2015-06-30 14:56:04','2015-06-30 14:56:04'),(32,'2015-06-30 14:56:04','2015-06-30 14:56:04'),(33,'2015-06-30 14:56:04','2015-06-30 14:56:04'),(34,'2015-06-30 14:56:05','2015-06-30 14:56:05'),(35,'2015-06-30 14:56:05','2015-06-30 14:56:05'),(36,'2015-06-30 14:56:05','2015-06-30 14:56:05'),(37,'2015-06-30 14:56:06','2015-06-30 14:56:06'),(38,'2015-06-30 14:56:06','2015-06-30 14:56:06'),(39,'2015-06-30 14:56:06','2015-06-30 14:56:06'),(40,'2015-06-30 14:56:06','2015-06-30 14:56:06'),(41,'2015-06-30 14:56:07','2015-06-30 14:56:07'),(42,'2015-06-30 14:56:07','2015-06-30 14:56:07'),(43,'2015-06-30 14:56:07','2015-06-30 14:56:07'),(44,'2015-06-30 14:56:07','2015-06-30 14:56:07'),(45,'2015-06-30 14:56:07','2015-06-30 14:56:07'),(46,'2015-06-30 14:56:08','2015-06-30 14:56:08'),(47,'2015-06-30 14:56:08','2015-06-30 14:56:08'),(48,'2015-06-30 14:56:08','2015-06-30 14:56:08');
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
  PRIMARY KEY (`id`),
  KEY `aulas_turma_id_foreign` (`turma_id`),
  KEY `aulas_data_index` (`data`),
  CONSTRAINT `aulas_turma_id_foreign` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aulas`
--

LOCK TABLES `aulas` WRITE;
/*!40000 ALTER TABLE `aulas` DISABLE KEYS */;
INSERT INTO `aulas` VALUES (1,'2014-08-05',0,'Introdução a disciplina. Plano de ensino. Situação do tema banco de dados dentro da computação. Arquivos convencionais, problemas; conceitos de banco de dados (BD) e SGBD: noções gerais de um sistema de BD; arquitetura de SGBD; gerência de bancos funções básicas de SGBD; usuários de BD;',2,'2015-06-30 14:56:18','2015-06-30 14:56:18',0,''),(2,'2014-08-12',0,'Abstração de dados.  Modelo conceitual; modelo lógico; modelo físico. Introdução a modelagem conceitual.  modelo de dados entidade relacionamento (ER)',2,'2015-06-30 14:56:18','2015-06-30 14:56:18',0,''),(3,'2014-08-19',0,'Modelagem conceitual: objetivos; propriedades de um modelo conceitual; notações. Estudo de caso.',2,'2015-06-30 14:56:18','2015-06-30 14:56:18',0,'NULL'),(4,'2014-08-26',0,'modelagem conceitual (mecanismos de abstração; classificação/instanciação; generalização/especialização;). Exercícios de fixação. Descrição do trabalho G1.',2,'2015-06-30 14:56:18','2015-06-30 14:56:18',0,'NULL'),(5,'2014-09-02',0,'Modelagem conceitual (restrições de integridade, construtores, notação diagramática, semelhanças e diferenças entre modelos conceituais).',2,'2015-06-30 14:56:18','2015-06-30 14:56:18',0,'NULL'),(6,'2014-09-09',0,'Projeto de banco de dados (transformação de diagramas  conceituais para modelos de banco de dados I ). Exercícios práticos.',2,'2015-06-30 14:56:18','2015-06-30 14:56:18',0,'NULL'),(7,'2014-09-16',0,'Projeto de banco de dados (transformação de diagramas conceituais para modelos de bancos de dados II). Exercícios práticos.',2,'2015-06-30 14:56:18','2015-06-30 14:56:18',0,'NULL'),(8,'2014-09-23',0,'Apresentação dos trabalhos. Revisão do conteúdo para a avaliação. Exercícios práticos.',2,'2015-06-30 14:56:18','2015-06-30 14:56:18',0,'NULL'),(9,'2014-09-30',0,'Avaliação teórica/prática grau 1.',2,'2015-06-30 14:56:18','2015-06-30 14:56:18',0,'NULL'),(10,'2014-10-07',0,'Entrega das notas e correção da prova. Descrição do trabalho.Introdução à normalização de modelos.',2,'2015-06-30 14:56:18','2015-06-30 14:56:18',0,'NULL'),(11,'2014-10-14',0,'Estudo de caso da normalização de modelos. Linguagem de definição de dados (DDL). Linguagem de modelagem de banco de dados.  Exercícios práticos.',2,'2015-06-30 14:56:18','2015-06-30 14:56:18',0,'NULL'),(12,'2014-10-21',0,'Manipulação de dados (DML). Andamento do trabalho.',2,'2015-06-30 14:56:18','2015-06-30 14:56:18',0,'NULL'),(13,'2014-10-28',0,'Restrições de integridade. Exercícios práticos.',2,'2015-06-30 14:56:18','2015-06-30 14:56:18',0,'NULL'),(14,'2014-11-04',0,'',2,'2015-06-30 14:56:18','2015-06-30 14:56:18',0,'NULL'),(15,'2014-11-11',0,'',2,'2015-06-30 14:56:18','2015-06-30 14:56:18',0,'NULL'),(16,'2014-11-18',0,'',2,'2015-06-30 14:56:19','2015-06-30 14:56:19',0,'NULL'),(17,'2014-11-25',0,'',2,'2015-06-30 14:56:19','2015-06-30 14:56:19',0,'NULL'),(18,'2014-12-02',0,'',2,'2015-06-30 14:56:19','2015-06-30 14:56:19',0,'NULL'),(19,'2014-12-09',0,'',2,'2015-06-30 14:56:19','2015-06-30 14:56:19',0,'NULL'),(20,'2014-12-16',0,'',2,'2015-06-30 14:56:19','2015-06-30 14:56:19',0,'NULL'),(21,'2014-02-20',0,'Introdução aos SO\'s: Apresentação da disciplina: conteúdo, metodologia de ensino, critérios de avaliação, cronograma, material apoio (livros).',5,'2015-06-30 14:56:19','2015-06-30 14:56:19',0,'NULL'),(22,'2014-02-27',0,'Introdução aos Sistemas Operacionais: Estudo das definições de sistema operacional (SO), objetivos, visões.',5,'2015-06-30 14:56:19','2015-06-30 14:56:19',0,'NULL'),(23,'2014-03-06',0,'Gerência de entrada e Saída: controle e gerenciamento realizado pelo sistema operacional: Multiprogramação.',5,'2015-06-30 14:56:19','2015-06-30 14:56:19',0,'NULL'),(24,'2014-03-13',0,'Estudo dos tipos de sistemas operacionais: monoprogramáveis, multiprogramaveis e sistemas com múltiplos processadores.',5,'2015-06-30 14:56:19','2015-06-30 14:56:19',0,'NULL'),(25,'2014-03-20',0,'Conceitos de Deadlock, prevenção e tratamento em Sistemas Operacionais.',5,'2015-06-30 14:56:19','2015-06-30 14:56:19',0,'NULL'),(26,'2014-03-27',0,'Estudo das estruturas de um sistema operacional: sistemas monolíticos, sistemas em camadas e cliente/servidor.',5,'2015-06-30 14:56:19','2015-06-30 14:56:19',0,'NULL'),(27,'2014-04-03',0,'Estudo dos sistemas multiprogramáveis: definição, conceitos, gerência de filas, tipos (cooperativa e preemptiva), proteção.',5,'2015-06-30 14:56:19','2015-06-30 14:56:19',0,'NULL'),(28,'2014-04-10',0,'Estudo de processos: modelos de processos, estados de um process, mudanças de estados entre processos, subprocessos e threads.',5,'2015-06-30 14:56:19','2015-06-30 14:56:19',0,'NULL'),(29,'2014-04-17',0,'Especificação de tarefas e prioridades.',5,'2015-06-30 14:56:19','2015-06-30 14:56:19',0,'NULL'),(30,'2014-04-23',0,'Introdução a escalonadores',5,'2015-06-30 14:56:19','2015-06-30 14:56:19',0,'NULL'),(31,'2014-04-24',0,'Atividades extraclasse: exercícios e trabalhos individuais.',5,'2015-06-30 14:56:19','2015-06-30 14:56:19',0,'NULL'),(32,'2014-05-08',0,'Correção de exercício, revisão de conteúdo.',5,'2015-06-30 14:56:19','2015-06-30 14:56:19',0,'NULL'),(33,'2014-05-15',0,'Avaliação de grau 1 (G1).',5,'2015-06-30 14:56:19','2015-06-30 14:56:19',0,'NULL'),(34,'2014-05-22',0,'Analisar os resultados da avaliação G1. Gerência de processos: introdução, descritor de processo, controle de processos, processos de sistema, escalonamento de processos',5,'2015-06-30 14:56:19','2015-06-30 14:56:19',0,'NULL'),(35,'2014-05-29',0,'Gerência de Memória: introdução, endereços lógicos e fisicos, formas de alicação, swapping.',5,'2015-06-30 14:56:19','2015-06-30 14:56:19',0,'NULL'),(36,'2014-06-05',0,'Memória virtual: funcionamento da paginação por demanda, substituição de páginas, algoritmos de substituição de páginas, alocação de quadros, trashing.',5,'2015-06-30 14:56:19','2015-06-30 14:56:19',0,'NULL'),(37,'2014-06-12',0,'Programação concorrente: definição, motivação, especificação de paralelismo, problema da seção crítica, semáforos, mensagens, visão geral e comparação, paralisação (deadlock).',5,'2015-06-30 14:56:19','2015-06-30 14:56:19',0,'NULL'),(38,'2014-06-26',0,'Elaboração de exercícios e correção.',5,'2015-06-30 14:56:19','2015-06-30 14:56:19',0,'NULL'),(39,'2014-07-03',0,'Sistema de Arquivos: Introdução, nomes de arquivos, comandos, árvore de diretórios do SO, discos (particionamento e formatação), acesso a arquivos, atributos, controle e gerenciamento.',5,'2015-06-30 14:56:19','2015-06-30 14:56:19',0,'NULL'),(40,'2014-07-04',0,'Apresentação de trabalhos (estudo de caso) de sistemas operacionais.',5,'2015-06-30 14:56:19','2015-06-30 14:56:19',0,'NULL'),(41,'2014-07-10',0,'Avaliação Grau 2. Divulgação de resultados parciais, revisão e prova de substituição.',5,'2015-06-30 14:56:19','2015-06-30 14:56:19',0,'NULL'),(42,'2015-02-20',0,'Introdução a disciplina. Plano de ensino. Situação do tema banco de dados dentro da computação. Arquivos convencionais, problemas; conceitos de banco de dados (BD) e SGBD: noções gerais de um sistema de BD;',3,'2015-06-30 14:56:19','2015-06-30 14:56:19',0,'NULL'),(43,'2015-02-27',0,'Arquitetura de SGBD; gerência de bancos funções básicas de SGBD; usuários de BD; Abstração de dados. modelo lógico; modelo físico.  Introdução a modelagem conceitual.  modelo de dados entidade relacionamento (ER). Processo de projeto e Implementação de BD.',3,'2015-06-30 14:56:19','2015-06-30 14:56:19',0,''),(44,'2015-03-06',0,'Modelos de dados; Modelagem conceitual: objetivos; propriedades de um modelo conceitual; notações. Modelo entidade relacionamento (ER); Agregação/Desagregação.  Estudo de caso.',3,'2015-06-30 14:56:19','2015-06-30 14:56:19',0,'NULL'),(45,'2015-03-13',0,'Modelo de dados orientado a objetos (OO) , Modelagem conceitual (mecanismos de abstração; classificação/instanciação; generalização/especialização;).  Exercícios de fixação.',3,'2015-06-30 14:56:19','2015-06-30 14:56:19',0,'NULL'),(46,'2015-03-20',0,'Restrições de integridade, Construtores, Notação diagramática, Semelhanças e diferenças entre modelos conceituais).',3,'2015-06-30 14:56:19','2015-06-30 14:56:19',0,'NULL'),(47,'2015-03-27',0,'Projeto de banco de dados (transformação de diagramas  conceituais para modelos de banco de dados I ). Exercícios práticos.',3,'2015-06-30 14:56:20','2015-06-30 14:56:20',0,'NULL'),(48,'2015-04-10',0,'Estudo de caso da normalização de modelos.',3,'2015-06-30 14:56:20','2015-06-30 14:56:20',0,''),(49,'2015-04-17',0,'Revisão do conteúdo para a avaliação. Exercícios práticos.',3,'2015-06-30 14:56:20','2015-06-30 14:56:20',0,''),(50,'2015-04-20',0,'Atividade Extraclasse:\".Exercícios de normalização e revisão para prova\"',3,'2015-06-30 14:56:20','2015-06-30 14:56:20',0,''),(51,'2015-04-24',0,'Avaliação teórica/prática grau 1.',3,'2015-06-30 14:56:20','2015-06-30 14:56:20',0,'NULL'),(52,'2015-05-08',0,'Entrega das notas e correção da prova. Descrição do trabalho. Linguagem de definição de dados (DDL). Linguagem de modelagem de banco de dados.',3,'2015-06-30 14:56:20','2015-06-30 14:56:20',0,'NULL'),(53,'2015-05-15',0,'Linguagem de manipulação de dados (DML)  interativa.',3,'2015-06-30 14:56:20','2015-06-30 14:56:20',0,'NULL'),(54,'2015-05-22',0,'Restrições de integridade. Exercícios práticos.',3,'2015-06-30 14:56:20','2015-06-30 14:56:20',0,'NULL'),(55,'2015-05-29',0,'Linguagem de manipulação de dados embutida, restrições de integridade. Exercícios práticos.',3,'2015-06-30 14:56:20','2015-06-30 14:56:20',0,'NULL'),(56,'2015-06-05',0,'Especificação de gatilhos, asserções e procedimentos. Exercícios práticos.',3,'2015-06-30 14:56:20','2015-06-30 14:56:20',0,'NULL'),(57,'2015-06-12',0,'Álgebra relacional.',3,'2015-06-30 14:56:20','2015-06-30 14:56:20',0,'NULL'),(58,'2015-06-19',0,'Revisão para prova G2.',3,'2015-06-30 14:56:20','2015-06-30 14:56:20',0,'NULL'),(59,'2015-06-26',0,'Avaliação teórica/prática grau 2.',3,'2015-06-30 14:56:20','2015-06-30 14:56:20',0,'NULL'),(60,'2015-07-03',0,'Entrega das notas e correção da prova.  Revisão para prova de substituição.',3,'2015-06-30 14:56:20','2015-06-30 14:56:20',0,'NULL'),(61,'2015-07-10',0,'Prova de substituição. Entrega das notas finais e correção da prova.',3,'2015-06-30 14:56:20','2015-06-30 14:56:20',0,'NULL'),(62,'2015-02-25',0,'Apresentação da disciplina. Introdução às técnicas de programação.',6,'2015-06-30 14:56:20','2015-06-30 14:56:20',0,'NULL'),(63,'2015-03-04',0,'Orientação para projeto de classes',6,'2015-06-30 14:56:21','2015-06-30 14:56:21',0,'NULL'),(64,'2015-03-11',0,'Programação por contratos ? parte 1: especificações de interface precisas e verificáveis dos componentes de desenvolvimento de software. Exercícios práticos.',6,'2015-06-30 14:56:21','2015-06-30 14:56:21',0,'NULL'),(65,'2015-03-18',0,'Programação por contratos ? parte 2: especificações de interface precisas e verificáveis dos componentes de desenvolvimento de software. Exercícios práticos.',6,'2015-06-30 14:56:21','2015-06-30 14:56:21',0,'NULL'),(66,'2015-03-25',0,'Introdução ao Teste do Software. Exercícios práticos.',6,'2015-06-30 14:56:21','2015-06-30 14:56:21',0,''),(67,'2015-04-01',0,'Teste de software: validação de comportamento e unidades de trabalho. Descrição do  trabalho a ser desenvolvido.',6,'2015-06-30 14:56:21','2015-06-30 14:56:21',0,''),(68,'2015-04-08',0,'Ferramentas de apoio ao teste unitário (Junit). Exercícios práticos.',6,'2015-06-30 14:56:21','2015-06-30 14:56:21',0,''),(69,'2015-04-15',0,'Apresentação do trabalho e realização de um simulado referente ao G1.',6,'2015-06-30 14:56:21','2015-06-30 14:56:21',0,''),(70,'2015-04-22',0,'Avaliação G1',6,'2015-06-30 14:56:21','2015-06-30 14:56:21',0,''),(71,'2015-04-29',0,'Entrega das avaliações G1. Discussão das questões da prova. Programação concorrente: modelagem, threads, sincronização. Exercícios práticos.',6,'2015-06-30 14:56:21','2015-06-30 14:56:21',0,'NULL'),(72,'2015-05-06',0,'Aula prática ? programação concorrente.',6,'2015-06-30 14:56:21','2015-06-30 14:56:21',0,'NULL'),(73,'2015-05-13',0,'Programação concorrente: vivacidade e métodos protegidos. Descrição do trabalho G2.',6,'2015-06-30 14:56:21','2015-06-30 14:56:21',0,'NULL'),(74,'2015-05-20',0,'Programação concorrente: objeto condição e propriedades de concorrência.',6,'2015-06-30 14:56:21','2015-06-30 14:56:21',0,'NULL'),(75,'2015-05-27',0,'Arquitetura de Software: componentes do sistema e suas propriedades externas e seus relacionamentos com outros softwares.',6,'2015-06-30 14:56:21','2015-06-30 14:56:21',0,'NULL'),(76,'2015-06-03',0,'Modelo de desenvolvimento em camadas: domínios.',6,'2015-06-30 14:56:21','2015-06-30 14:56:21',0,'NULL'),(77,'2015-06-10',0,'Modelo de desenvolvimento em camadas: persistência e apresentação.',6,'2015-06-30 14:56:21','2015-06-30 14:56:21',0,'NULL'),(78,'2015-06-17',0,'Apresentação do trabalho e revisão para a avaliação  referente ao G2',6,'2015-06-30 14:56:21','2015-06-30 14:56:21',0,'NULL'),(79,'2015-06-24',0,'Avaliação G2',6,'2015-06-30 14:56:21','2015-06-30 14:56:21',0,'NULL'),(80,'2015-07-01',0,'Entrega das notas G2. Revisão para prova de substituição.',6,'2015-06-30 14:56:21','2015-06-30 14:56:21',0,'NULL'),(81,'2015-07-08',0,'Aplicação da prova de substituição G1 ou G2. Entrega das notas.',6,'2015-06-30 14:56:21','2015-06-30 14:56:21',0,'NULL'),(82,'2015-02-19',0,'Plano de aula. Arquitetura de computadores. Conceitos de hardware e software. Sistemas numéricos de representação de dados e conversões. Exercícios',1,'2015-06-30 14:56:21','2015-06-30 14:56:21',0,'NULL'),(83,'2015-02-26',0,'Álgebra booleana. Contextualização do curso de ADS. Disciplinas que compõem a ciência da computação. Exercícios',1,'2015-06-30 14:56:21','2015-06-30 14:56:21',0,'NULL'),(84,'2015-03-05',0,'Conceitos e definições dos Sistemas de informação. Tipos de sistemas de informação. Exemplos de sistemas de informação.',1,'2015-06-30 14:56:21','2015-06-30 14:56:21',0,'NULL'),(85,'2015-03-12',0,'Introdução  à Abordagem sistêmica I.',1,'2015-06-30 14:56:21','2015-06-30 14:56:21',0,'NULL'),(86,'2015-03-19',0,'Abordagem sistêmica  I - Aula Prática.',1,'2015-06-30 14:56:21','2015-06-30 14:56:21',0,'NULL'),(87,'2015-03-26',0,'Conceitos da Abordagem sistêmica II',1,'2015-06-30 14:56:21','2015-06-30 14:56:21',0,'NULL'),(88,'2015-04-02',0,'Conceitos da Abordagem sistêmica II ? Aula Prática',1,'2015-06-30 14:56:21','2015-06-30 14:56:21',0,'NULL'),(89,'2015-04-09',0,'Revisão dos conteúdos (Exercícios).',1,'2015-06-30 14:56:21','2015-06-30 14:56:21',0,'NULL'),(90,'2015-04-16',0,'Avaliação Teórica ? G1 ? Individual.',1,'2015-06-30 14:56:21','2015-06-30 14:56:21',0,'NULL'),(91,'2015-04-23',0,'Correção avaliação e divulgação resultados, definição grupos de trabalho.  Estudo da aplicação da tecnologia da informação nas organizações  do papel da modelagem no desenvolvimento de SI.',1,'2015-06-30 14:56:21','2015-06-30 14:56:21',0,'NULL'),(92,'2015-04-30',0,'Sistemas de computação. Estudo de caso. Exercícios',1,'2015-06-30 14:56:21','2015-06-30 14:56:21',0,'NULL'),(93,'2015-05-07',0,'Sistema de gerenciamento de transação.',1,'2015-06-30 14:56:22','2015-06-30 14:56:22',0,'NULL'),(94,'2015-05-14',0,'Sistema de gerenciamento de transação -  Aula prática',1,'2015-06-30 14:56:22','2015-06-30 14:56:22',0,'NULL'),(95,'2015-05-21',0,'Sistemas de informação (Planejamento estratégico de TI), aplicação da tecnologia da informação.',1,'2015-06-30 14:56:22','2015-06-30 14:56:22',0,'NULL'),(96,'2015-05-28',0,'Gestão de sistemas de informação',1,'2015-06-30 14:56:22','2015-06-30 14:56:22',0,'NULL'),(97,'2015-06-11',0,'Modelagem no desenvolvimento de sistemas de informação.',1,'2015-06-30 14:56:22','2015-06-30 14:56:22',0,'NULL'),(98,'2015-06-18',0,'Seminários de apresentações. Exercícios de revisão',1,'2015-06-30 14:56:22','2015-06-30 14:56:22',0,'NULL'),(99,'2015-06-25',0,'Avaliação Teórica / prática ? G2.',1,'2015-06-30 14:56:22','2015-06-30 14:56:22',0,'NULL'),(100,'2015-07-02',0,'Revisão do conteúdo para a substituição de grau',1,'2015-06-30 14:56:22','2015-06-30 14:56:22',0,'NULL'),(101,'2015-07-09',0,'Divulgação de resultados parciais, substituição de grau e divulgação de resultados finais.',1,'2015-06-30 14:56:22','2015-06-30 14:56:22',0,'NULL'),(102,'2014-08-01',0,'Descrição do plano de ensino. Introdução à disciplina. Plano de ensino. Introdução a linguagem  SQL',4,'2015-06-30 14:56:22','2015-06-30 14:56:22',0,'NULL'),(103,'2014-08-08',0,'Consultas (SQL, linguagem de manipulação de dados). Exercícios de fixação',4,'2015-06-30 14:56:22','2015-06-30 14:56:22',0,'NULL'),(104,'2014-08-15',0,'Consultas (SQL, linguagem de definição de dados). Exercícios de fixação',4,'2015-06-30 14:56:22','2015-06-30 14:56:22',0,'NULL'),(105,'2014-08-22',0,'Consultas Avançadas (introdução a subselects).  Exercícios de fixação. Integração do SQL e com o  JAVA.  Exercícios de fixação',4,'2015-06-30 14:56:22','2015-06-30 14:56:22',0,'NULL'),(106,'2014-08-29',0,'Consultas Avançadas (subselects, group by).  Exercícios de fixação',4,'2015-06-30 14:56:22','2015-06-30 14:56:22',0,'NULL'),(107,'2014-09-05',0,'Triggers e Store. Exercícios de fixação',4,'2015-06-30 14:56:22','2015-06-30 14:56:22',0,'NULL'),(108,'2014-09-12',0,'Procedures. Exercícios de fixação',4,'2015-06-30 14:56:22','2015-06-30 14:56:22',0,'NULL'),(109,'2014-09-19',0,'Revisão para prova G1. Simulado',4,'2015-06-30 14:56:22','2015-06-30 14:56:22',0,'NULL'),(110,'2014-09-26',0,'Avaliação teórica prática referente ao G1',4,'2015-06-30 14:56:22','2015-06-30 14:56:22',0,'NULL'),(111,'2014-10-03',0,'Correção da prova. Cursores',4,'2015-06-30 14:56:22','2015-06-30 14:56:22',0,'NULL'),(112,'2014-10-10',0,'Cursores e Introdução a Transações',4,'2015-06-30 14:56:22','2015-06-30 14:56:22',0,'NULL'),(113,'2014-10-17',0,'Transação  (Recuperação de falhas, concorrência). Andamento do trabalho.',4,'2015-06-30 14:56:22','2015-06-30 14:56:22',0,'NULL'),(114,'2014-10-24',0,'Arquitetura de  Banco de Dados  Distribuídos; Gerência de Objetos;',4,'2015-06-30 14:56:22','2015-06-30 14:56:22',0,'NULL'),(115,'2014-10-31',0,'Semana acadêmica',4,'2015-06-30 14:56:22','2015-06-30 14:56:22',0,'NULL'),(116,'2014-11-07',0,'Otimização de Consultas.',4,'2015-06-30 14:56:22','2015-06-30 14:56:22',0,'NULL'),(117,'2014-11-14',0,'Introdução a  Data Warehouse  e Bussiness  Intelligence (Aplicações emergentes de banco de dados.)',4,'2015-06-30 14:56:22','2015-06-30 14:56:22',0,'NULL'),(118,'2014-11-21',0,'Apresentação do trabalho e revisão para prova G2',4,'2015-06-30 14:56:22','2015-06-30 14:56:22',0,'NULL'),(119,'2014-11-28',0,'Prova G2',4,'2015-06-30 14:56:22','2015-06-30 14:56:22',0,'NULL'),(120,'2014-12-05',0,'Revisão do conteúdo para substituição',4,'2015-06-30 14:56:23','2015-06-30 14:56:23',0,'NULL'),(121,'2014-12-12',0,'Prova de substituição',4,'2015-06-30 14:56:23','2015-06-30 14:56:23',0,'NULL');
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
INSERT INTO `chamadas` VALUES (1,1,21,1,1,1,1,'2015-06-30 14:56:23','2015-06-30 14:56:23'),(2,2,21,1,1,1,1,'2015-06-30 14:56:23','2015-06-30 14:56:23'),(3,27,21,1,1,1,1,'2015-06-30 14:56:23','2015-06-30 14:56:23'),(4,3,21,1,1,1,1,'2015-06-30 14:56:23','2015-06-30 14:56:23'),(5,5,21,1,1,1,1,'2015-06-30 14:56:23','2015-06-30 14:56:23'),(6,28,21,1,1,1,1,'2015-06-30 14:56:23','2015-06-30 14:56:23'),(7,6,21,1,1,1,1,'2015-06-30 14:56:23','2015-06-30 14:56:23'),(8,29,21,1,1,0,0,'2015-06-30 14:56:23','2015-06-30 14:56:23'),(9,30,21,1,1,1,0,'2015-06-30 14:56:23','2015-06-30 14:56:23'),(10,9,21,1,1,1,1,'2015-06-30 14:56:23','2015-06-30 14:56:23'),(11,31,21,1,1,1,1,'2015-06-30 14:56:23','2015-06-30 14:56:23'),(12,10,21,1,1,1,1,'2015-06-30 14:56:23','2015-06-30 14:56:23'),(13,11,21,1,1,1,1,'2015-06-30 14:56:23','2015-06-30 14:56:23'),(14,14,21,1,1,1,1,'2015-06-30 14:56:23','2015-06-30 14:56:23'),(15,32,21,1,1,1,1,'2015-06-30 14:56:23','2015-06-30 14:56:23'),(16,33,21,1,1,1,1,'2015-06-30 14:56:23','2015-06-30 14:56:23'),(17,34,21,1,1,1,0,'2015-06-30 14:56:23','2015-06-30 14:56:23'),(18,15,21,1,1,1,1,'2015-06-30 14:56:23','2015-06-30 14:56:23'),(19,35,21,0,0,0,0,'2015-06-30 14:56:23','2015-06-30 14:56:23'),(20,16,21,0,0,0,0,'2015-06-30 14:56:23','2015-06-30 14:56:23'),(21,36,21,1,1,1,1,'2015-06-30 14:56:24','2015-06-30 14:56:24'),(22,17,21,1,1,1,1,'2015-06-30 14:56:24','2015-06-30 14:56:24'),(23,37,21,1,1,1,1,'2015-06-30 14:56:24','2015-06-30 14:56:24'),(24,38,21,1,1,1,0,'2015-06-30 14:56:24','2015-06-30 14:56:24'),(25,18,21,1,1,1,1,'2015-06-30 14:56:24','2015-06-30 14:56:24'),(26,19,21,1,1,1,1,'2015-06-30 14:56:24','2015-06-30 14:56:24'),(27,39,21,1,1,1,1,'2015-06-30 14:56:24','2015-06-30 14:56:24'),(28,22,21,1,1,1,1,'2015-06-30 14:56:24','2015-06-30 14:56:24'),(29,25,21,1,1,1,1,'2015-06-30 14:56:24','2015-06-30 14:56:24'),(30,26,21,1,1,1,1,'2015-06-30 14:56:24','2015-06-30 14:56:24'),(31,1,23,1,1,1,1,'2015-06-30 14:56:24','2015-06-30 14:56:24'),(32,2,23,1,1,1,1,'2015-06-30 14:56:24','2015-06-30 14:56:24'),(33,27,23,1,1,1,1,'2015-06-30 14:56:24','2015-06-30 14:56:24'),(34,3,23,1,1,1,1,'2015-06-30 14:56:24','2015-06-30 14:56:24'),(35,5,23,0,1,1,1,'2015-06-30 14:56:24','2015-06-30 14:56:24'),(36,28,23,1,1,1,1,'2015-06-30 14:56:24','2015-06-30 14:56:24'),(37,6,23,1,1,1,1,'2015-06-30 14:56:24','2015-06-30 14:56:24'),(38,29,23,0,0,0,0,'2015-06-30 14:56:24','2015-06-30 14:56:24'),(39,30,23,1,1,1,1,'2015-06-30 14:56:24','2015-06-30 14:56:24'),(40,9,23,1,1,1,1,'2015-06-30 14:56:24','2015-06-30 14:56:24'),(41,31,23,1,1,1,1,'2015-06-30 14:56:25','2015-06-30 14:56:25'),(42,10,23,1,1,1,1,'2015-06-30 14:56:25','2015-06-30 14:56:25'),(43,11,23,1,1,1,1,'2015-06-30 14:56:25','2015-06-30 14:56:25'),(44,14,23,1,1,1,1,'2015-06-30 14:56:25','2015-06-30 14:56:25'),(45,32,23,0,0,0,0,'2015-06-30 14:56:25','2015-06-30 14:56:25'),(46,33,23,0,0,0,0,'2015-06-30 14:56:25','2015-06-30 14:56:25'),(47,34,23,0,1,1,1,'2015-06-30 14:56:25','2015-06-30 14:56:25'),(48,15,23,1,1,1,1,'2015-06-30 14:56:25','2015-06-30 14:56:25'),(49,35,23,0,0,0,0,'2015-06-30 14:56:25','2015-06-30 14:56:25'),(50,16,23,1,1,1,1,'2015-06-30 14:56:25','2015-06-30 14:56:25'),(51,36,23,1,1,1,1,'2015-06-30 14:56:25','2015-06-30 14:56:25'),(52,17,23,1,1,1,1,'2015-06-30 14:56:25','2015-06-30 14:56:25'),(53,37,23,0,0,0,0,'2015-06-30 14:56:25','2015-06-30 14:56:25'),(54,38,23,0,0,0,0,'2015-06-30 14:56:25','2015-06-30 14:56:25'),(55,18,23,1,1,1,1,'2015-06-30 14:56:25','2015-06-30 14:56:25'),(56,19,23,1,1,1,1,'2015-06-30 14:56:25','2015-06-30 14:56:25'),(57,39,23,0,1,1,1,'2015-06-30 14:56:25','2015-06-30 14:56:25'),(58,22,23,1,1,1,1,'2015-06-30 14:56:25','2015-06-30 14:56:25'),(59,25,23,1,1,1,1,'2015-06-30 14:56:25','2015-06-30 14:56:25'),(60,26,23,1,1,1,1,'2015-06-30 14:56:25','2015-06-30 14:56:25'),(61,1,24,1,1,1,1,'2015-06-30 14:56:25','2015-06-30 14:56:25'),(62,2,24,0,0,0,0,'2015-06-30 14:56:25','2015-06-30 14:56:25'),(63,27,24,1,1,1,1,'2015-06-30 14:56:26','2015-06-30 14:56:26'),(64,3,24,1,1,1,1,'2015-06-30 14:56:26','2015-06-30 14:56:26'),(65,5,24,1,1,1,1,'2015-06-30 14:56:26','2015-06-30 14:56:26'),(66,28,24,1,1,1,1,'2015-06-30 14:56:26','2015-06-30 14:56:26'),(67,6,24,1,1,1,1,'2015-06-30 14:56:26','2015-06-30 14:56:26'),(68,29,24,0,0,0,0,'2015-06-30 14:56:26','2015-06-30 14:56:26'),(69,30,24,1,1,1,1,'2015-06-30 14:56:26','2015-06-30 14:56:26'),(70,9,24,0,1,1,1,'2015-06-30 14:56:26','2015-06-30 14:56:26'),(71,31,24,1,1,1,1,'2015-06-30 14:56:26','2015-06-30 14:56:26'),(72,10,24,1,1,1,1,'2015-06-30 14:56:26','2015-06-30 14:56:26'),(73,11,24,1,1,1,1,'2015-06-30 14:56:26','2015-06-30 14:56:26'),(74,14,24,1,1,1,1,'2015-06-30 14:56:26','2015-06-30 14:56:26'),(75,32,24,0,0,0,0,'2015-06-30 14:56:26','2015-06-30 14:56:26'),(76,33,24,1,1,1,1,'2015-06-30 14:56:26','2015-06-30 14:56:26'),(77,34,24,1,1,1,1,'2015-06-30 14:56:26','2015-06-30 14:56:26'),(78,15,24,1,1,0,0,'2015-06-30 14:56:26','2015-06-30 14:56:26'),(79,35,24,0,0,0,0,'2015-06-30 14:56:26','2015-06-30 14:56:26'),(80,16,24,1,1,1,1,'2015-06-30 14:56:26','2015-06-30 14:56:26'),(81,36,24,1,1,1,1,'2015-06-30 14:56:26','2015-06-30 14:56:26'),(82,17,24,1,1,1,1,'2015-06-30 14:56:26','2015-06-30 14:56:26'),(83,37,24,0,0,0,0,'2015-06-30 14:56:26','2015-06-30 14:56:26'),(84,38,24,0,0,0,0,'2015-06-30 14:56:26','2015-06-30 14:56:26'),(85,18,24,1,1,1,1,'2015-06-30 14:56:26','2015-06-30 14:56:26'),(86,19,24,1,1,1,1,'2015-06-30 14:56:26','2015-06-30 14:56:26'),(87,39,24,0,1,1,1,'2015-06-30 14:56:26','2015-06-30 14:56:26'),(88,22,24,1,1,1,1,'2015-06-30 14:56:26','2015-06-30 14:56:26'),(89,25,24,1,1,1,1,'2015-06-30 14:56:26','2015-06-30 14:56:26'),(90,26,24,1,1,1,1,'2015-06-30 14:56:27','2015-06-30 14:56:27'),(91,1,25,1,1,1,1,'2015-06-30 14:56:27','2015-06-30 14:56:27'),(92,2,25,1,1,1,1,'2015-06-30 14:56:27','2015-06-30 14:56:27'),(93,27,25,1,1,1,1,'2015-06-30 14:56:27','2015-06-30 14:56:27'),(94,3,25,1,1,1,1,'2015-06-30 14:56:27','2015-06-30 14:56:27'),(95,5,25,1,1,1,1,'2015-06-30 14:56:27','2015-06-30 14:56:27'),(96,28,25,1,1,1,1,'2015-06-30 14:56:27','2015-06-30 14:56:27'),(97,6,25,1,1,1,1,'2015-06-30 14:56:27','2015-06-30 14:56:27'),(98,29,25,0,0,0,0,'2015-06-30 14:56:28','2015-06-30 14:56:28'),(99,30,25,1,1,1,1,'2015-06-30 14:56:28','2015-06-30 14:56:28'),(100,9,25,1,1,1,1,'2015-06-30 14:56:28','2015-06-30 14:56:28'),(101,31,25,1,1,1,1,'2015-06-30 14:56:28','2015-06-30 14:56:28'),(102,10,25,1,1,1,1,'2015-06-30 14:56:28','2015-06-30 14:56:28'),(103,11,25,1,1,1,1,'2015-06-30 14:56:28','2015-06-30 14:56:28'),(104,14,25,0,0,0,0,'2015-06-30 14:56:28','2015-06-30 14:56:28'),(105,32,25,0,0,0,0,'2015-06-30 14:56:28','2015-06-30 14:56:28'),(106,33,25,1,1,1,1,'2015-06-30 14:56:28','2015-06-30 14:56:28'),(107,34,25,0,0,0,0,'2015-06-30 14:56:28','2015-06-30 14:56:28'),(108,15,25,0,0,0,0,'2015-06-30 14:56:28','2015-06-30 14:56:28'),(109,35,25,0,0,0,0,'2015-06-30 14:56:28','2015-06-30 14:56:28'),(110,16,25,0,0,0,0,'2015-06-30 14:56:28','2015-06-30 14:56:28'),(111,36,25,1,1,1,1,'2015-06-30 14:56:28','2015-06-30 14:56:28'),(112,17,25,1,1,1,1,'2015-06-30 14:56:28','2015-06-30 14:56:28'),(113,37,25,0,0,0,0,'2015-06-30 14:56:28','2015-06-30 14:56:28'),(114,38,25,0,0,0,0,'2015-06-30 14:56:28','2015-06-30 14:56:28'),(115,18,25,1,1,1,1,'2015-06-30 14:56:28','2015-06-30 14:56:28'),(116,19,25,1,1,1,1,'2015-06-30 14:56:28','2015-06-30 14:56:28'),(117,39,25,0,0,1,1,'2015-06-30 14:56:28','2015-06-30 14:56:28'),(118,22,25,1,1,1,1,'2015-06-30 14:56:28','2015-06-30 14:56:28'),(119,25,25,1,1,1,1,'2015-06-30 14:56:28','2015-06-30 14:56:28'),(120,26,25,1,1,1,1,'2015-06-30 14:56:28','2015-06-30 14:56:28'),(121,1,26,1,1,1,1,'2015-06-30 14:56:29','2015-06-30 14:56:29'),(122,2,26,1,1,1,1,'2015-06-30 14:56:29','2015-06-30 14:56:29'),(123,27,26,0,0,0,0,'2015-06-30 14:56:29','2015-06-30 14:56:29'),(124,3,26,1,1,1,1,'2015-06-30 14:56:29','2015-06-30 14:56:29'),(125,5,26,1,1,1,1,'2015-06-30 14:56:29','2015-06-30 14:56:29'),(126,28,26,1,1,1,1,'2015-06-30 14:56:29','2015-06-30 14:56:29'),(127,6,26,1,1,1,1,'2015-06-30 14:56:29','2015-06-30 14:56:29'),(128,29,26,0,0,0,0,'2015-06-30 14:56:29','2015-06-30 14:56:29'),(129,30,26,0,0,0,0,'2015-06-30 14:56:29','2015-06-30 14:56:29'),(130,9,26,1,1,1,1,'2015-06-30 14:56:29','2015-06-30 14:56:29'),(131,31,26,0,0,0,0,'2015-06-30 14:56:29','2015-06-30 14:56:29'),(132,10,26,1,1,1,1,'2015-06-30 14:56:29','2015-06-30 14:56:29'),(133,11,26,1,1,1,1,'2015-06-30 14:56:29','2015-06-30 14:56:29'),(134,14,26,1,1,1,1,'2015-06-30 14:56:29','2015-06-30 14:56:29'),(135,32,26,0,0,0,0,'2015-06-30 14:56:29','2015-06-30 14:56:29'),(136,33,26,0,0,0,0,'2015-06-30 14:56:29','2015-06-30 14:56:29'),(137,34,26,0,0,0,0,'2015-06-30 14:56:29','2015-06-30 14:56:29'),(138,15,26,1,1,1,1,'2015-06-30 14:56:29','2015-06-30 14:56:29'),(139,35,26,0,0,0,0,'2015-06-30 14:56:29','2015-06-30 14:56:29'),(140,16,26,1,1,1,1,'2015-06-30 14:56:29','2015-06-30 14:56:29'),(141,36,26,1,1,1,1,'2015-06-30 14:56:29','2015-06-30 14:56:29'),(142,17,26,1,1,1,1,'2015-06-30 14:56:29','2015-06-30 14:56:29'),(143,37,26,0,0,0,0,'2015-06-30 14:56:30','2015-06-30 14:56:30'),(144,38,26,0,0,0,0,'2015-06-30 14:56:30','2015-06-30 14:56:30'),(145,18,26,1,1,1,1,'2015-06-30 14:56:30','2015-06-30 14:56:30'),(146,19,26,1,1,1,1,'2015-06-30 14:56:30','2015-06-30 14:56:30'),(147,39,26,1,1,1,1,'2015-06-30 14:56:30','2015-06-30 14:56:30'),(148,22,26,1,1,1,1,'2015-06-30 14:56:30','2015-06-30 14:56:30'),(149,25,26,1,1,1,1,'2015-06-30 14:56:30','2015-06-30 14:56:30'),(150,26,26,1,1,1,1,'2015-06-30 14:56:30','2015-06-30 14:56:30'),(151,1,27,1,1,0,0,'2015-06-30 14:56:30','2015-06-30 14:56:30'),(152,2,27,1,1,1,1,'2015-06-30 14:56:30','2015-06-30 14:56:30'),(153,27,27,1,1,0,0,'2015-06-30 14:56:30','2015-06-30 14:56:30'),(154,3,27,1,1,1,1,'2015-06-30 14:56:30','2015-06-30 14:56:30'),(155,5,27,1,1,1,1,'2015-06-30 14:56:30','2015-06-30 14:56:30'),(156,28,27,1,1,1,1,'2015-06-30 14:56:30','2015-06-30 14:56:30'),(157,6,27,0,0,1,1,'2015-06-30 14:56:30','2015-06-30 14:56:30'),(158,29,27,0,0,1,1,'2015-06-30 14:56:30','2015-06-30 14:56:30'),(159,30,27,0,0,1,1,'2015-06-30 14:56:30','2015-06-30 14:56:30'),(160,9,27,1,1,1,1,'2015-06-30 14:56:30','2015-06-30 14:56:30'),(161,31,27,0,0,0,0,'2015-06-30 14:56:30','2015-06-30 14:56:30'),(162,10,27,1,1,1,1,'2015-06-30 14:56:30','2015-06-30 14:56:30'),(163,11,27,1,1,0,0,'2015-06-30 14:56:30','2015-06-30 14:56:30'),(164,14,27,1,1,1,1,'2015-06-30 14:56:30','2015-06-30 14:56:30'),(165,32,27,0,0,0,0,'2015-06-30 14:56:30','2015-06-30 14:56:30'),(166,33,27,1,1,0,0,'2015-06-30 14:56:30','2015-06-30 14:56:30'),(167,34,27,0,0,0,0,'2015-06-30 14:56:30','2015-06-30 14:56:30'),(168,15,27,1,1,1,1,'2015-06-30 14:56:30','2015-06-30 14:56:30'),(169,35,27,0,0,0,0,'2015-06-30 14:56:30','2015-06-30 14:56:30'),(170,16,27,1,1,1,1,'2015-06-30 14:56:31','2015-06-30 14:56:31'),(171,36,27,1,1,1,1,'2015-06-30 14:56:31','2015-06-30 14:56:31'),(172,17,27,1,1,1,1,'2015-06-30 14:56:31','2015-06-30 14:56:31'),(173,37,27,0,0,0,0,'2015-06-30 14:56:31','2015-06-30 14:56:31'),(174,38,27,0,0,0,0,'2015-06-30 14:56:31','2015-06-30 14:56:31'),(175,18,27,1,1,1,1,'2015-06-30 14:56:31','2015-06-30 14:56:31'),(176,19,27,1,1,0,0,'2015-06-30 14:56:31','2015-06-30 14:56:31'),(177,39,27,1,1,0,0,'2015-06-30 14:56:31','2015-06-30 14:56:31'),(178,22,27,1,1,1,1,'2015-06-30 14:56:31','2015-06-30 14:56:31'),(179,25,27,1,1,0,0,'2015-06-30 14:56:31','2015-06-30 14:56:31'),(180,26,27,1,1,1,1,'2015-06-30 14:56:31','2015-06-30 14:56:31'),(181,1,28,1,1,1,1,'2015-06-30 14:56:31','2015-06-30 14:56:31'),(182,2,28,1,1,1,1,'2015-06-30 14:56:31','2015-06-30 14:56:31'),(183,27,28,1,1,1,1,'2015-06-30 14:56:31','2015-06-30 14:56:31'),(184,3,28,1,1,1,1,'2015-06-30 14:56:31','2015-06-30 14:56:31'),(185,5,28,1,1,1,1,'2015-06-30 14:56:31','2015-06-30 14:56:31'),(186,28,28,1,1,1,1,'2015-06-30 14:56:31','2015-06-30 14:56:31'),(187,6,28,1,1,1,1,'2015-06-30 14:56:31','2015-06-30 14:56:31'),(188,29,28,1,1,1,1,'2015-06-30 14:56:31','2015-06-30 14:56:31'),(189,30,28,1,1,1,1,'2015-06-30 14:56:31','2015-06-30 14:56:31'),(190,9,28,1,1,1,1,'2015-06-30 14:56:31','2015-06-30 14:56:31'),(191,31,28,0,0,0,0,'2015-06-30 14:56:31','2015-06-30 14:56:31'),(192,10,28,1,1,1,1,'2015-06-30 14:56:32','2015-06-30 14:56:32'),(193,11,28,1,1,1,0,'2015-06-30 14:56:32','2015-06-30 14:56:32'),(194,14,28,1,1,1,1,'2015-06-30 14:56:32','2015-06-30 14:56:32'),(195,32,28,0,0,0,0,'2015-06-30 14:56:32','2015-06-30 14:56:32'),(196,33,28,1,1,1,0,'2015-06-30 14:56:32','2015-06-30 14:56:32'),(197,34,28,0,0,0,0,'2015-06-30 14:56:32','2015-06-30 14:56:32'),(198,15,28,1,1,1,1,'2015-06-30 14:56:32','2015-06-30 14:56:32'),(199,35,28,0,0,0,0,'2015-06-30 14:56:32','2015-06-30 14:56:32'),(200,16,28,1,1,1,1,'2015-06-30 14:56:32','2015-06-30 14:56:32'),(201,36,28,0,0,0,0,'2015-06-30 14:56:32','2015-06-30 14:56:32'),(202,17,28,1,1,1,1,'2015-06-30 14:56:32','2015-06-30 14:56:32'),(203,37,28,0,0,0,0,'2015-06-30 14:56:32','2015-06-30 14:56:32'),(204,38,28,0,0,0,0,'2015-06-30 14:56:32','2015-06-30 14:56:32'),(205,18,28,1,1,1,1,'2015-06-30 14:56:32','2015-06-30 14:56:32'),(206,19,28,1,1,1,1,'2015-06-30 14:56:32','2015-06-30 14:56:32'),(207,39,28,1,1,1,1,'2015-06-30 14:56:32','2015-06-30 14:56:32'),(208,22,28,1,1,1,1,'2015-06-30 14:56:32','2015-06-30 14:56:32'),(209,25,28,1,1,1,1,'2015-06-30 14:56:32','2015-06-30 14:56:32'),(210,26,28,1,1,1,1,'2015-06-30 14:56:32','2015-06-30 14:56:32'),(211,1,29,0,0,0,0,'2015-06-30 14:56:32','2015-06-30 14:56:32'),(212,2,29,1,1,1,1,'2015-06-30 14:56:32','2015-06-30 14:56:32'),(213,27,29,1,1,1,1,'2015-06-30 14:56:32','2015-06-30 14:56:32'),(214,3,29,1,1,1,1,'2015-06-30 14:56:32','2015-06-30 14:56:32'),(215,5,29,1,1,1,1,'2015-06-30 14:56:32','2015-06-30 14:56:32'),(216,28,29,1,1,1,1,'2015-06-30 14:56:33','2015-06-30 14:56:33'),(217,6,29,1,1,1,1,'2015-06-30 14:56:33','2015-06-30 14:56:33'),(218,29,29,0,0,0,0,'2015-06-30 14:56:33','2015-06-30 14:56:33'),(219,30,29,0,0,0,0,'2015-06-30 14:56:33','2015-06-30 14:56:33'),(220,9,29,0,0,1,1,'2015-06-30 14:56:33','2015-06-30 14:56:33'),(221,31,29,0,0,0,0,'2015-06-30 14:56:33','2015-06-30 14:56:33'),(222,10,29,1,1,1,1,'2015-06-30 14:56:33','2015-06-30 14:56:33'),(223,11,29,0,0,0,1,'2015-06-30 14:56:33','2015-06-30 14:56:33'),(224,14,29,1,1,1,1,'2015-06-30 14:56:33','2015-06-30 14:56:33'),(225,32,29,0,0,0,0,'2015-06-30 14:56:33','2015-06-30 14:56:33'),(226,33,29,0,0,0,1,'2015-06-30 14:56:33','2015-06-30 14:56:33'),(227,34,29,0,0,0,0,'2015-06-30 14:56:33','2015-06-30 14:56:33'),(228,15,29,1,1,1,1,'2015-06-30 14:56:33','2015-06-30 14:56:33'),(229,35,29,0,0,0,0,'2015-06-30 14:56:33','2015-06-30 14:56:33'),(230,16,29,1,1,1,1,'2015-06-30 14:56:33','2015-06-30 14:56:33'),(231,36,29,0,0,0,0,'2015-06-30 14:56:33','2015-06-30 14:56:33'),(232,17,29,1,1,1,1,'2015-06-30 14:56:33','2015-06-30 14:56:33'),(233,37,29,0,0,0,0,'2015-06-30 14:56:33','2015-06-30 14:56:33'),(234,38,29,0,0,0,0,'2015-06-30 14:56:33','2015-06-30 14:56:33'),(235,18,29,1,1,1,1,'2015-06-30 14:56:34','2015-06-30 14:56:34'),(236,19,29,1,1,1,1,'2015-06-30 14:56:34','2015-06-30 14:56:34'),(237,39,29,0,0,0,0,'2015-06-30 14:56:34','2015-06-30 14:56:34'),(238,22,29,1,1,1,1,'2015-06-30 14:56:34','2015-06-30 14:56:34'),(239,25,29,0,0,0,0,'2015-06-30 14:56:34','2015-06-30 14:56:34'),(240,26,29,1,1,1,1,'2015-06-30 14:56:34','2015-06-30 14:56:34'),(241,1,30,1,1,1,1,'2015-06-30 14:56:34','2015-06-30 14:56:34'),(242,2,30,1,1,1,1,'2015-06-30 14:56:34','2015-06-30 14:56:34'),(243,27,30,1,1,1,1,'2015-06-30 14:56:34','2015-06-30 14:56:34'),(244,3,30,1,1,1,1,'2015-06-30 14:56:34','2015-06-30 14:56:34'),(245,5,30,1,1,1,1,'2015-06-30 14:56:34','2015-06-30 14:56:34'),(246,28,30,1,1,1,1,'2015-06-30 14:56:34','2015-06-30 14:56:34'),(247,6,30,1,1,1,1,'2015-06-30 14:56:34','2015-06-30 14:56:34'),(248,29,30,1,1,1,1,'2015-06-30 14:56:34','2015-06-30 14:56:34'),(249,30,30,1,1,1,1,'2015-06-30 14:56:34','2015-06-30 14:56:34'),(250,9,30,1,1,1,1,'2015-06-30 14:56:34','2015-06-30 14:56:34'),(251,31,30,0,0,0,0,'2015-06-30 14:56:34','2015-06-30 14:56:34'),(252,10,30,1,1,1,1,'2015-06-30 14:56:34','2015-06-30 14:56:34'),(253,11,30,1,1,1,1,'2015-06-30 14:56:34','2015-06-30 14:56:34'),(254,14,30,1,1,1,1,'2015-06-30 14:56:34','2015-06-30 14:56:34'),(255,32,30,0,0,0,0,'2015-06-30 14:56:34','2015-06-30 14:56:34'),(256,33,30,1,1,1,1,'2015-06-30 14:56:34','2015-06-30 14:56:34'),(257,34,30,0,0,0,0,'2015-06-30 14:56:34','2015-06-30 14:56:34'),(258,15,30,1,1,1,1,'2015-06-30 14:56:35','2015-06-30 14:56:35'),(259,35,30,0,0,0,0,'2015-06-30 14:56:35','2015-06-30 14:56:35'),(260,16,30,1,1,1,1,'2015-06-30 14:56:35','2015-06-30 14:56:35'),(261,36,30,1,1,1,1,'2015-06-30 14:56:35','2015-06-30 14:56:35'),(262,17,30,1,1,1,1,'2015-06-30 14:56:35','2015-06-30 14:56:35'),(263,37,30,0,0,0,0,'2015-06-30 14:56:35','2015-06-30 14:56:35'),(264,38,30,0,0,0,0,'2015-06-30 14:56:35','2015-06-30 14:56:35'),(265,18,30,1,1,1,1,'2015-06-30 14:56:35','2015-06-30 14:56:35'),(266,19,30,1,1,1,1,'2015-06-30 14:56:35','2015-06-30 14:56:35'),(267,39,30,1,1,1,1,'2015-06-30 14:56:35','2015-06-30 14:56:35'),(268,22,30,1,1,1,1,'2015-06-30 14:56:35','2015-06-30 14:56:35'),(269,25,30,1,1,1,1,'2015-06-30 14:56:35','2015-06-30 14:56:35'),(270,26,30,1,1,1,1,'2015-06-30 14:56:35','2015-06-30 14:56:35'),(271,1,31,1,1,1,1,'2015-06-30 14:56:35','2015-06-30 14:56:35'),(272,2,31,1,1,1,1,'2015-06-30 14:56:35','2015-06-30 14:56:35'),(273,27,31,1,1,1,1,'2015-06-30 14:56:35','2015-06-30 14:56:35'),(274,3,31,1,1,1,1,'2015-06-30 14:56:35','2015-06-30 14:56:35'),(275,5,31,1,1,1,1,'2015-06-30 14:56:35','2015-06-30 14:56:35'),(276,28,31,1,1,1,1,'2015-06-30 14:56:35','2015-06-30 14:56:35'),(277,6,31,1,1,1,1,'2015-06-30 14:56:35','2015-06-30 14:56:35'),(278,29,31,0,0,0,0,'2015-06-30 14:56:35','2015-06-30 14:56:35'),(279,30,31,0,0,0,0,'2015-06-30 14:56:36','2015-06-30 14:56:36'),(280,9,31,1,1,1,1,'2015-06-30 14:56:36','2015-06-30 14:56:36'),(281,31,31,0,0,0,0,'2015-06-30 14:56:36','2015-06-30 14:56:36'),(282,10,31,1,1,1,1,'2015-06-30 14:56:36','2015-06-30 14:56:36'),(283,11,31,1,1,1,1,'2015-06-30 14:56:36','2015-06-30 14:56:36'),(284,14,31,1,1,1,1,'2015-06-30 14:56:36','2015-06-30 14:56:36'),(285,32,31,0,0,0,0,'2015-06-30 14:56:36','2015-06-30 14:56:36'),(286,33,31,0,0,0,0,'2015-06-30 14:56:36','2015-06-30 14:56:36'),(287,34,31,0,0,0,0,'2015-06-30 14:56:36','2015-06-30 14:56:36'),(288,15,31,1,1,1,1,'2015-06-30 14:56:36','2015-06-30 14:56:36'),(289,35,31,0,0,0,0,'2015-06-30 14:56:36','2015-06-30 14:56:36'),(290,16,31,1,1,1,1,'2015-06-30 14:56:36','2015-06-30 14:56:36'),(291,36,31,0,0,0,0,'2015-06-30 14:56:36','2015-06-30 14:56:36'),(292,17,31,1,1,1,1,'2015-06-30 14:56:36','2015-06-30 14:56:36'),(293,37,31,0,0,0,0,'2015-06-30 14:56:36','2015-06-30 14:56:36'),(294,38,31,0,0,0,0,'2015-06-30 14:56:36','2015-06-30 14:56:36'),(295,18,31,1,1,1,1,'2015-06-30 14:56:36','2015-06-30 14:56:36'),(296,19,31,1,1,1,1,'2015-06-30 14:56:36','2015-06-30 14:56:36'),(297,39,31,1,1,1,1,'2015-06-30 14:56:36','2015-06-30 14:56:36'),(298,22,31,1,1,1,1,'2015-06-30 14:56:36','2015-06-30 14:56:36'),(299,25,31,1,1,1,1,'2015-06-30 14:56:36','2015-06-30 14:56:36'),(300,26,31,1,1,1,1,'2015-06-30 14:56:36','2015-06-30 14:56:36'),(301,1,32,1,1,1,1,'2015-06-30 14:56:36','2015-06-30 14:56:36'),(302,2,32,1,1,1,1,'2015-06-30 14:56:36','2015-06-30 14:56:36'),(303,27,32,1,1,1,1,'2015-06-30 14:56:36','2015-06-30 14:56:36'),(304,3,32,1,1,1,1,'2015-06-30 14:56:37','2015-06-30 14:56:37'),(305,5,32,1,1,1,1,'2015-06-30 14:56:37','2015-06-30 14:56:37'),(306,28,32,1,1,1,1,'2015-06-30 14:56:37','2015-06-30 14:56:37'),(307,6,32,1,1,1,1,'2015-06-30 14:56:37','2015-06-30 14:56:37'),(308,29,32,1,1,1,1,'2015-06-30 14:56:37','2015-06-30 14:56:37'),(309,30,32,1,1,1,1,'2015-06-30 14:56:37','2015-06-30 14:56:37'),(310,9,32,1,1,1,1,'2015-06-30 14:56:37','2015-06-30 14:56:37'),(311,31,32,0,0,0,0,'2015-06-30 14:56:37','2015-06-30 14:56:37'),(312,10,32,1,1,1,1,'2015-06-30 14:56:37','2015-06-30 14:56:37'),(313,11,32,1,1,1,1,'2015-06-30 14:56:37','2015-06-30 14:56:37'),(314,14,32,1,1,1,1,'2015-06-30 14:56:37','2015-06-30 14:56:37'),(315,32,32,0,0,0,0,'2015-06-30 14:56:37','2015-06-30 14:56:37'),(316,33,32,0,0,0,0,'2015-06-30 14:56:37','2015-06-30 14:56:37'),(317,34,32,0,0,0,0,'2015-06-30 14:56:37','2015-06-30 14:56:37'),(318,15,32,1,1,1,1,'2015-06-30 14:56:37','2015-06-30 14:56:37'),(319,35,32,0,0,0,0,'2015-06-30 14:56:37','2015-06-30 14:56:37'),(320,16,32,1,1,1,1,'2015-06-30 14:56:37','2015-06-30 14:56:37'),(321,36,32,1,1,1,1,'2015-06-30 14:56:37','2015-06-30 14:56:37'),(322,17,32,1,1,1,1,'2015-06-30 14:56:37','2015-06-30 14:56:37'),(323,37,32,0,0,0,0,'2015-06-30 14:56:37','2015-06-30 14:56:37'),(324,38,32,0,0,0,0,'2015-06-30 14:56:37','2015-06-30 14:56:37'),(325,18,32,1,1,1,1,'2015-06-30 14:56:37','2015-06-30 14:56:37'),(326,19,32,1,1,1,1,'2015-06-30 14:56:37','2015-06-30 14:56:37'),(327,39,32,1,1,1,1,'2015-06-30 14:56:37','2015-06-30 14:56:37'),(328,22,32,1,1,1,1,'2015-06-30 14:56:37','2015-06-30 14:56:37'),(329,25,32,1,1,1,1,'2015-06-30 14:56:38','2015-06-30 14:56:38'),(330,26,32,1,1,1,1,'2015-06-30 14:56:38','2015-06-30 14:56:38'),(331,1,33,1,1,1,1,'2015-06-30 14:56:38','2015-06-30 14:56:38'),(332,2,33,1,1,1,1,'2015-06-30 14:56:38','2015-06-30 14:56:38'),(333,27,33,1,1,1,1,'2015-06-30 14:56:38','2015-06-30 14:56:38'),(334,3,33,1,1,1,1,'2015-06-30 14:56:39','2015-06-30 14:56:39'),(335,5,33,1,1,1,1,'2015-06-30 14:56:39','2015-06-30 14:56:39'),(336,28,33,1,1,1,1,'2015-06-30 14:56:39','2015-06-30 14:56:39'),(337,6,33,1,1,1,1,'2015-06-30 14:56:39','2015-06-30 14:56:39'),(338,29,33,1,1,1,1,'2015-06-30 14:56:39','2015-06-30 14:56:39'),(339,30,33,1,1,1,1,'2015-06-30 14:56:39','2015-06-30 14:56:39'),(340,9,33,1,1,1,1,'2015-06-30 14:56:39','2015-06-30 14:56:39'),(341,31,33,0,0,0,0,'2015-06-30 14:56:39','2015-06-30 14:56:39'),(342,10,33,1,1,1,1,'2015-06-30 14:56:39','2015-06-30 14:56:39'),(343,11,33,1,1,1,1,'2015-06-30 14:56:39','2015-06-30 14:56:39'),(344,14,33,1,1,1,1,'2015-06-30 14:56:39','2015-06-30 14:56:39'),(345,32,33,0,0,0,0,'2015-06-30 14:56:39','2015-06-30 14:56:39'),(346,33,33,0,0,0,0,'2015-06-30 14:56:39','2015-06-30 14:56:39'),(347,34,33,0,0,0,0,'2015-06-30 14:56:39','2015-06-30 14:56:39'),(348,15,33,1,1,1,1,'2015-06-30 14:56:39','2015-06-30 14:56:39'),(349,35,33,0,0,0,0,'2015-06-30 14:56:39','2015-06-30 14:56:39'),(350,16,33,1,1,1,1,'2015-06-30 14:56:39','2015-06-30 14:56:39'),(351,36,33,1,1,1,1,'2015-06-30 14:56:39','2015-06-30 14:56:39'),(352,17,33,1,1,1,1,'2015-06-30 14:56:39','2015-06-30 14:56:39'),(353,37,33,0,0,0,0,'2015-06-30 14:56:40','2015-06-30 14:56:40'),(354,38,33,0,0,0,0,'2015-06-30 14:56:40','2015-06-30 14:56:40'),(355,18,33,1,1,1,1,'2015-06-30 14:56:40','2015-06-30 14:56:40'),(356,19,33,1,1,1,1,'2015-06-30 14:56:40','2015-06-30 14:56:40'),(357,39,33,1,1,1,1,'2015-06-30 14:56:40','2015-06-30 14:56:40'),(358,22,33,1,1,1,1,'2015-06-30 14:56:40','2015-06-30 14:56:40'),(359,25,33,1,1,1,1,'2015-06-30 14:56:40','2015-06-30 14:56:40'),(360,26,33,1,1,1,1,'2015-06-30 14:56:40','2015-06-30 14:56:40'),(361,1,34,1,1,1,1,'2015-06-30 14:56:40','2015-06-30 14:56:40'),(362,2,34,1,1,1,1,'2015-06-30 14:56:40','2015-06-30 14:56:40'),(363,27,34,0,0,0,0,'2015-06-30 14:56:40','2015-06-30 14:56:40'),(364,3,34,1,1,1,1,'2015-06-30 14:56:40','2015-06-30 14:56:40'),(365,5,34,1,1,1,1,'2015-06-30 14:56:40','2015-06-30 14:56:40'),(366,28,34,1,1,1,1,'2015-06-30 14:56:40','2015-06-30 14:56:40'),(367,6,34,1,1,1,1,'2015-06-30 14:56:40','2015-06-30 14:56:40'),(368,29,34,0,0,0,0,'2015-06-30 14:56:40','2015-06-30 14:56:40'),(369,30,34,0,0,0,0,'2015-06-30 14:56:40','2015-06-30 14:56:40'),(370,9,34,1,1,1,1,'2015-06-30 14:56:40','2015-06-30 14:56:40'),(371,31,34,0,0,0,0,'2015-06-30 14:56:40','2015-06-30 14:56:40'),(372,10,34,1,1,1,1,'2015-06-30 14:56:40','2015-06-30 14:56:40'),(373,11,34,1,1,1,1,'2015-06-30 14:56:40','2015-06-30 14:56:40'),(374,14,34,1,1,1,1,'2015-06-30 14:56:40','2015-06-30 14:56:40'),(375,32,34,0,0,0,0,'2015-06-30 14:56:40','2015-06-30 14:56:40'),(376,33,34,0,0,0,0,'2015-06-30 14:56:40','2015-06-30 14:56:40'),(377,34,34,0,0,0,0,'2015-06-30 14:56:40','2015-06-30 14:56:40'),(378,15,34,1,1,1,1,'2015-06-30 14:56:40','2015-06-30 14:56:40'),(379,35,34,0,0,0,0,'2015-06-30 14:56:40','2015-06-30 14:56:40'),(380,16,34,1,1,1,1,'2015-06-30 14:56:40','2015-06-30 14:56:40'),(381,36,34,0,0,0,0,'2015-06-30 14:56:40','2015-06-30 14:56:40'),(382,17,34,1,1,1,1,'2015-06-30 14:56:41','2015-06-30 14:56:41'),(383,37,34,0,0,0,0,'2015-06-30 14:56:41','2015-06-30 14:56:41'),(384,38,34,0,0,0,0,'2015-06-30 14:56:41','2015-06-30 14:56:41'),(385,18,34,1,1,1,1,'2015-06-30 14:56:41','2015-06-30 14:56:41'),(386,19,34,1,1,1,1,'2015-06-30 14:56:41','2015-06-30 14:56:41'),(387,39,34,1,1,1,1,'2015-06-30 14:56:41','2015-06-30 14:56:41'),(388,22,34,1,1,1,1,'2015-06-30 14:56:41','2015-06-30 14:56:41'),(389,25,34,1,1,1,1,'2015-06-30 14:56:41','2015-06-30 14:56:41'),(390,26,34,1,1,1,1,'2015-06-30 14:56:41','2015-06-30 14:56:41'),(391,1,35,1,1,0,0,'2015-06-30 14:56:41','2015-06-30 14:56:41'),(392,2,35,1,1,1,1,'2015-06-30 14:56:41','2015-06-30 14:56:41'),(393,27,35,0,0,0,0,'2015-06-30 14:56:41','2015-06-30 14:56:41'),(394,3,35,1,1,1,1,'2015-06-30 14:56:41','2015-06-30 14:56:41'),(395,5,35,1,1,1,1,'2015-06-30 14:56:41','2015-06-30 14:56:41'),(396,28,35,1,1,1,1,'2015-06-30 14:56:41','2015-06-30 14:56:41'),(397,6,35,1,1,1,1,'2015-06-30 14:56:41','2015-06-30 14:56:41'),(398,29,35,0,0,0,0,'2015-06-30 14:56:41','2015-06-30 14:56:41'),(399,30,35,0,0,0,0,'2015-06-30 14:56:41','2015-06-30 14:56:41'),(400,9,35,1,1,1,0,'2015-06-30 14:56:41','2015-06-30 14:56:41'),(401,31,35,0,0,0,0,'2015-06-30 14:56:41','2015-06-30 14:56:41'),(402,10,35,1,1,1,1,'2015-06-30 14:56:41','2015-06-30 14:56:41'),(403,11,35,0,0,0,0,'2015-06-30 14:56:41','2015-06-30 14:56:41'),(404,14,35,1,1,0,0,'2015-06-30 14:56:41','2015-06-30 14:56:41'),(405,32,35,0,0,0,0,'2015-06-30 14:56:41','2015-06-30 14:56:41'),(406,33,35,0,0,0,0,'2015-06-30 14:56:41','2015-06-30 14:56:41'),(407,34,35,0,0,0,0,'2015-06-30 14:56:41','2015-06-30 14:56:41'),(408,15,35,0,0,0,0,'2015-06-30 14:56:42','2015-06-30 14:56:42'),(409,35,35,0,0,0,0,'2015-06-30 14:56:42','2015-06-30 14:56:42'),(410,16,35,0,0,0,0,'2015-06-30 14:56:42','2015-06-30 14:56:42'),(411,36,35,0,0,0,0,'2015-06-30 14:56:42','2015-06-30 14:56:42'),(412,17,35,1,1,1,1,'2015-06-30 14:56:42','2015-06-30 14:56:42'),(413,37,35,0,0,0,0,'2015-06-30 14:56:42','2015-06-30 14:56:42'),(414,38,35,0,0,0,0,'2015-06-30 14:56:42','2015-06-30 14:56:42'),(415,18,35,0,0,0,0,'2015-06-30 14:56:42','2015-06-30 14:56:42'),(416,19,35,1,1,1,1,'2015-06-30 14:56:42','2015-06-30 14:56:42'),(417,39,35,0,0,0,0,'2015-06-30 14:56:42','2015-06-30 14:56:42'),(418,22,35,1,1,1,1,'2015-06-30 14:56:42','2015-06-30 14:56:42'),(419,25,35,1,1,1,1,'2015-06-30 14:56:42','2015-06-30 14:56:42'),(420,26,35,1,1,1,1,'2015-06-30 14:56:42','2015-06-30 14:56:42'),(421,1,36,1,1,1,1,'2015-06-30 14:56:42','2015-06-30 14:56:42'),(422,2,36,1,1,1,1,'2015-06-30 14:56:42','2015-06-30 14:56:42'),(423,27,36,1,1,1,1,'2015-06-30 14:56:42','2015-06-30 14:56:42'),(424,3,36,1,1,1,1,'2015-06-30 14:56:42','2015-06-30 14:56:42'),(425,5,36,1,1,1,1,'2015-06-30 14:56:42','2015-06-30 14:56:42'),(426,28,36,1,1,1,1,'2015-06-30 14:56:42','2015-06-30 14:56:42'),(427,6,36,1,1,1,1,'2015-06-30 14:56:42','2015-06-30 14:56:42'),(428,29,36,1,1,1,1,'2015-06-30 14:56:42','2015-06-30 14:56:42'),(429,30,36,0,0,0,0,'2015-06-30 14:56:42','2015-06-30 14:56:42'),(430,9,36,1,1,1,1,'2015-06-30 14:56:42','2015-06-30 14:56:42'),(431,31,36,0,0,0,0,'2015-06-30 14:56:42','2015-06-30 14:56:42'),(432,10,36,1,1,1,1,'2015-06-30 14:56:42','2015-06-30 14:56:42'),(433,11,36,1,1,1,1,'2015-06-30 14:56:42','2015-06-30 14:56:42'),(434,14,36,1,1,1,1,'2015-06-30 14:56:42','2015-06-30 14:56:42'),(435,32,36,0,0,0,0,'2015-06-30 14:56:42','2015-06-30 14:56:42'),(436,33,36,0,0,0,0,'2015-06-30 14:56:43','2015-06-30 14:56:43'),(437,34,36,0,0,0,0,'2015-06-30 14:56:43','2015-06-30 14:56:43'),(438,15,36,1,1,1,1,'2015-06-30 14:56:43','2015-06-30 14:56:43'),(439,35,36,0,0,0,0,'2015-06-30 14:56:43','2015-06-30 14:56:43'),(440,16,36,1,1,1,1,'2015-06-30 14:56:43','2015-06-30 14:56:43'),(441,36,36,0,0,0,0,'2015-06-30 14:56:43','2015-06-30 14:56:43'),(442,17,36,1,1,1,1,'2015-06-30 14:56:43','2015-06-30 14:56:43'),(443,37,36,0,0,0,0,'2015-06-30 14:56:43','2015-06-30 14:56:43'),(444,38,36,0,0,0,0,'2015-06-30 14:56:43','2015-06-30 14:56:43'),(445,18,36,1,1,1,1,'2015-06-30 14:56:43','2015-06-30 14:56:43'),(446,19,36,1,1,1,1,'2015-06-30 14:56:43','2015-06-30 14:56:43'),(447,39,36,0,0,0,0,'2015-06-30 14:56:43','2015-06-30 14:56:43'),(448,22,36,1,1,1,1,'2015-06-30 14:56:43','2015-06-30 14:56:43'),(449,25,36,1,1,1,1,'2015-06-30 14:56:43','2015-06-30 14:56:43'),(450,26,36,1,1,1,1,'2015-06-30 14:56:43','2015-06-30 14:56:43'),(451,1,37,1,1,1,1,'2015-06-30 14:56:43','2015-06-30 14:56:43'),(452,2,37,1,1,1,1,'2015-06-30 14:56:43','2015-06-30 14:56:43'),(453,27,37,0,0,0,0,'2015-06-30 14:56:43','2015-06-30 14:56:43'),(454,3,37,1,1,1,1,'2015-06-30 14:56:43','2015-06-30 14:56:43'),(455,5,37,1,1,1,1,'2015-06-30 14:56:43','2015-06-30 14:56:43'),(456,28,37,1,1,1,1,'2015-06-30 14:56:43','2015-06-30 14:56:43'),(457,6,37,1,1,1,1,'2015-06-30 14:56:44','2015-06-30 14:56:44'),(458,29,37,0,0,0,0,'2015-06-30 14:56:44','2015-06-30 14:56:44'),(459,30,37,0,0,0,0,'2015-06-30 14:56:44','2015-06-30 14:56:44'),(460,9,37,1,1,1,1,'2015-06-30 14:56:44','2015-06-30 14:56:44'),(461,31,37,0,0,0,0,'2015-06-30 14:56:44','2015-06-30 14:56:44'),(462,10,37,1,1,1,1,'2015-06-30 14:56:44','2015-06-30 14:56:44'),(463,11,37,1,1,1,1,'2015-06-30 14:56:44','2015-06-30 14:56:44'),(464,14,37,1,1,1,1,'2015-06-30 14:56:44','2015-06-30 14:56:44'),(465,32,37,0,0,0,0,'2015-06-30 14:56:44','2015-06-30 14:56:44'),(466,33,37,0,0,0,0,'2015-06-30 14:56:44','2015-06-30 14:56:44'),(467,34,37,0,0,0,0,'2015-06-30 14:56:44','2015-06-30 14:56:44'),(468,15,37,1,1,1,1,'2015-06-30 14:56:44','2015-06-30 14:56:44'),(469,35,37,0,0,0,0,'2015-06-30 14:56:44','2015-06-30 14:56:44'),(470,16,37,1,1,1,1,'2015-06-30 14:56:44','2015-06-30 14:56:44'),(471,36,37,0,0,0,0,'2015-06-30 14:56:44','2015-06-30 14:56:44'),(472,17,37,1,1,1,1,'2015-06-30 14:56:44','2015-06-30 14:56:44'),(473,37,37,0,0,0,0,'2015-06-30 14:56:44','2015-06-30 14:56:44'),(474,38,37,0,0,0,0,'2015-06-30 14:56:44','2015-06-30 14:56:44'),(475,18,37,1,1,1,1,'2015-06-30 14:56:44','2015-06-30 14:56:44'),(476,19,37,1,1,1,1,'2015-06-30 14:56:44','2015-06-30 14:56:44'),(477,39,37,0,0,0,0,'2015-06-30 14:56:44','2015-06-30 14:56:44'),(478,22,37,1,1,1,1,'2015-06-30 14:56:44','2015-06-30 14:56:44'),(479,25,37,1,1,1,1,'2015-06-30 14:56:44','2015-06-30 14:56:44'),(480,26,37,1,1,1,1,'2015-06-30 14:56:44','2015-06-30 14:56:44'),(481,1,38,1,1,1,1,'2015-06-30 14:56:44','2015-06-30 14:56:44'),(482,2,38,1,1,1,1,'2015-06-30 14:56:44','2015-06-30 14:56:44'),(483,27,38,0,0,0,0,'2015-06-30 14:56:45','2015-06-30 14:56:45'),(484,3,38,1,1,1,1,'2015-06-30 14:56:45','2015-06-30 14:56:45'),(485,5,38,0,0,0,0,'2015-06-30 14:56:45','2015-06-30 14:56:45'),(486,28,38,1,1,1,1,'2015-06-30 14:56:45','2015-06-30 14:56:45'),(487,6,38,1,1,1,1,'2015-06-30 14:56:45','2015-06-30 14:56:45'),(488,29,38,0,0,0,0,'2015-06-30 14:56:45','2015-06-30 14:56:45'),(489,30,38,0,0,0,0,'2015-06-30 14:56:45','2015-06-30 14:56:45'),(490,9,38,1,1,1,1,'2015-06-30 14:56:45','2015-06-30 14:56:45'),(491,31,38,0,0,0,0,'2015-06-30 14:56:45','2015-06-30 14:56:45'),(492,10,38,1,1,1,1,'2015-06-30 14:56:45','2015-06-30 14:56:45'),(493,11,38,1,1,1,1,'2015-06-30 14:56:45','2015-06-30 14:56:45'),(494,14,38,1,1,1,1,'2015-06-30 14:56:45','2015-06-30 14:56:45'),(495,32,38,0,0,0,0,'2015-06-30 14:56:45','2015-06-30 14:56:45'),(496,33,38,0,0,0,0,'2015-06-30 14:56:45','2015-06-30 14:56:45'),(497,34,38,0,0,0,0,'2015-06-30 14:56:45','2015-06-30 14:56:45'),(498,15,38,1,1,1,1,'2015-06-30 14:56:45','2015-06-30 14:56:45'),(499,35,38,0,0,0,0,'2015-06-30 14:56:45','2015-06-30 14:56:45'),(500,16,38,1,1,1,1,'2015-06-30 14:56:45','2015-06-30 14:56:45'),(501,36,38,0,0,0,0,'2015-06-30 14:56:45','2015-06-30 14:56:45'),(502,17,38,1,1,1,1,'2015-06-30 14:56:45','2015-06-30 14:56:45'),(503,37,38,0,0,0,0,'2015-06-30 14:56:45','2015-06-30 14:56:45'),(504,38,38,0,0,0,0,'2015-06-30 14:56:45','2015-06-30 14:56:45'),(505,18,38,1,1,1,1,'2015-06-30 14:56:45','2015-06-30 14:56:45'),(506,19,38,1,1,1,1,'2015-06-30 14:56:45','2015-06-30 14:56:45'),(507,39,38,0,0,0,0,'2015-06-30 14:56:45','2015-06-30 14:56:45'),(508,22,38,1,1,1,1,'2015-06-30 14:56:46','2015-06-30 14:56:46'),(509,25,38,1,1,1,1,'2015-06-30 14:56:46','2015-06-30 14:56:46'),(510,26,38,1,1,1,1,'2015-06-30 14:56:46','2015-06-30 14:56:46'),(511,1,39,0,0,0,0,'2015-06-30 14:56:46','2015-06-30 14:56:46'),(512,2,39,1,1,1,1,'2015-06-30 14:56:46','2015-06-30 14:56:46'),(513,27,39,0,0,0,0,'2015-06-30 14:56:47','2015-06-30 14:56:47'),(514,3,39,1,1,1,1,'2015-06-30 14:56:47','2015-06-30 14:56:47'),(515,5,39,1,1,1,1,'2015-06-30 14:56:47','2015-06-30 14:56:47'),(516,28,39,1,1,1,1,'2015-06-30 14:56:47','2015-06-30 14:56:47'),(517,6,39,1,1,1,1,'2015-06-30 14:56:47','2015-06-30 14:56:47'),(518,29,39,0,0,0,0,'2015-06-30 14:56:47','2015-06-30 14:56:47'),(519,30,39,0,0,0,0,'2015-06-30 14:56:47','2015-06-30 14:56:47'),(520,9,39,1,1,1,1,'2015-06-30 14:56:47','2015-06-30 14:56:47'),(521,31,39,0,0,0,0,'2015-06-30 14:56:47','2015-06-30 14:56:47'),(522,10,39,1,1,1,1,'2015-06-30 14:56:47','2015-06-30 14:56:47'),(523,11,39,1,1,1,1,'2015-06-30 14:56:47','2015-06-30 14:56:47'),(524,14,39,1,1,1,1,'2015-06-30 14:56:47','2015-06-30 14:56:47'),(525,32,39,0,0,0,0,'2015-06-30 14:56:47','2015-06-30 14:56:47'),(526,33,39,0,0,0,0,'2015-06-30 14:56:47','2015-06-30 14:56:47'),(527,34,39,0,0,0,0,'2015-06-30 14:56:47','2015-06-30 14:56:47'),(528,15,39,1,1,1,1,'2015-06-30 14:56:47','2015-06-30 14:56:47'),(529,35,39,0,0,0,0,'2015-06-30 14:56:47','2015-06-30 14:56:47'),(530,16,39,1,1,1,1,'2015-06-30 14:56:47','2015-06-30 14:56:47'),(531,36,39,0,0,0,0,'2015-06-30 14:56:47','2015-06-30 14:56:47'),(532,17,39,1,1,1,1,'2015-06-30 14:56:47','2015-06-30 14:56:47'),(533,37,39,0,0,0,0,'2015-06-30 14:56:47','2015-06-30 14:56:47'),(534,38,39,0,0,0,0,'2015-06-30 14:56:47','2015-06-30 14:56:47'),(535,18,39,1,1,1,1,'2015-06-30 14:56:47','2015-06-30 14:56:47'),(536,19,39,1,1,1,1,'2015-06-30 14:56:47','2015-06-30 14:56:47'),(537,39,39,0,0,0,0,'2015-06-30 14:56:47','2015-06-30 14:56:47'),(538,22,39,1,1,1,1,'2015-06-30 14:56:47','2015-06-30 14:56:47'),(539,25,39,0,0,0,0,'2015-06-30 14:56:47','2015-06-30 14:56:47'),(540,26,39,1,1,1,1,'2015-06-30 14:56:47','2015-06-30 14:56:47'),(541,1,40,1,1,1,1,'2015-06-30 14:56:48','2015-06-30 14:56:48'),(542,2,40,1,1,1,1,'2015-06-30 14:56:48','2015-06-30 14:56:48'),(543,27,40,0,0,0,0,'2015-06-30 14:56:48','2015-06-30 14:56:48'),(544,3,40,1,1,1,1,'2015-06-30 14:56:48','2015-06-30 14:56:48'),(545,5,40,1,1,1,1,'2015-06-30 14:56:48','2015-06-30 14:56:48'),(546,28,40,1,1,1,1,'2015-06-30 14:56:48','2015-06-30 14:56:48'),(547,6,40,1,1,1,1,'2015-06-30 14:56:48','2015-06-30 14:56:48'),(548,29,40,0,0,0,0,'2015-06-30 14:56:48','2015-06-30 14:56:48'),(549,30,40,0,0,0,0,'2015-06-30 14:56:48','2015-06-30 14:56:48'),(550,9,40,1,1,1,1,'2015-06-30 14:56:48','2015-06-30 14:56:48'),(551,31,40,0,0,0,0,'2015-06-30 14:56:48','2015-06-30 14:56:48'),(552,10,40,1,1,1,1,'2015-06-30 14:56:48','2015-06-30 14:56:48'),(553,11,40,1,1,1,1,'2015-06-30 14:56:48','2015-06-30 14:56:48'),(554,14,40,1,1,1,1,'2015-06-30 14:56:48','2015-06-30 14:56:48'),(555,32,40,0,0,0,0,'2015-06-30 14:56:48','2015-06-30 14:56:48'),(556,33,40,0,0,0,0,'2015-06-30 14:56:48','2015-06-30 14:56:48'),(557,34,40,0,0,0,0,'2015-06-30 14:56:48','2015-06-30 14:56:48'),(558,15,40,1,1,1,1,'2015-06-30 14:56:48','2015-06-30 14:56:48'),(559,35,40,0,0,0,0,'2015-06-30 14:56:48','2015-06-30 14:56:48'),(560,16,40,1,1,1,1,'2015-06-30 14:56:48','2015-06-30 14:56:48'),(561,36,40,0,0,0,0,'2015-06-30 14:56:48','2015-06-30 14:56:48'),(562,17,40,1,1,1,1,'2015-06-30 14:56:48','2015-06-30 14:56:48'),(563,37,40,0,0,0,0,'2015-06-30 14:56:48','2015-06-30 14:56:48'),(564,38,40,0,0,0,0,'2015-06-30 14:56:48','2015-06-30 14:56:48'),(565,18,40,1,1,1,1,'2015-06-30 14:56:48','2015-06-30 14:56:48'),(566,19,40,1,1,1,1,'2015-06-30 14:56:48','2015-06-30 14:56:48'),(567,39,40,0,0,0,0,'2015-06-30 14:56:48','2015-06-30 14:56:48'),(568,22,40,1,1,1,1,'2015-06-30 14:56:48','2015-06-30 14:56:48'),(569,25,40,0,0,0,0,'2015-06-30 14:56:48','2015-06-30 14:56:48'),(570,26,40,1,1,1,1,'2015-06-30 14:56:49','2015-06-30 14:56:49'),(571,1,41,1,1,1,1,'2015-06-30 14:56:49','2015-06-30 14:56:49'),(572,2,41,1,1,1,1,'2015-06-30 14:56:49','2015-06-30 14:56:49'),(573,27,41,0,0,0,0,'2015-06-30 14:56:50','2015-06-30 14:56:50'),(574,3,41,1,1,1,1,'2015-06-30 14:56:50','2015-06-30 14:56:50'),(575,5,41,1,1,1,1,'2015-06-30 14:56:50','2015-06-30 14:56:50'),(576,28,41,1,1,1,1,'2015-06-30 14:56:50','2015-06-30 14:56:50'),(577,6,41,1,1,1,1,'2015-06-30 14:56:50','2015-06-30 14:56:50'),(578,29,41,0,0,0,0,'2015-06-30 14:56:50','2015-06-30 14:56:50'),(579,30,41,0,0,0,0,'2015-06-30 14:56:50','2015-06-30 14:56:50'),(580,9,41,1,1,1,1,'2015-06-30 14:56:50','2015-06-30 14:56:50'),(581,31,41,0,0,0,0,'2015-06-30 14:56:50','2015-06-30 14:56:50'),(582,10,41,1,1,1,1,'2015-06-30 14:56:50','2015-06-30 14:56:50'),(583,11,41,1,1,1,1,'2015-06-30 14:56:50','2015-06-30 14:56:50'),(584,14,41,1,1,1,1,'2015-06-30 14:56:50','2015-06-30 14:56:50'),(585,32,41,0,0,0,0,'2015-06-30 14:56:50','2015-06-30 14:56:50'),(586,33,41,0,0,0,0,'2015-06-30 14:56:50','2015-06-30 14:56:50'),(587,34,41,0,0,0,0,'2015-06-30 14:56:50','2015-06-30 14:56:50'),(588,15,41,1,1,1,1,'2015-06-30 14:56:50','2015-06-30 14:56:50'),(589,35,41,0,0,0,0,'2015-06-30 14:56:50','2015-06-30 14:56:50'),(590,16,41,1,1,1,1,'2015-06-30 14:56:50','2015-06-30 14:56:50'),(591,36,41,0,0,0,0,'2015-06-30 14:56:50','2015-06-30 14:56:50'),(592,17,41,1,1,1,1,'2015-06-30 14:56:50','2015-06-30 14:56:50'),(593,37,41,0,0,0,0,'2015-06-30 14:56:51','2015-06-30 14:56:51'),(594,38,41,0,0,0,0,'2015-06-30 14:56:51','2015-06-30 14:56:51'),(595,18,41,1,1,1,1,'2015-06-30 14:56:51','2015-06-30 14:56:51'),(596,19,41,1,1,1,1,'2015-06-30 14:56:51','2015-06-30 14:56:51'),(597,39,41,0,0,0,0,'2015-06-30 14:56:51','2015-06-30 14:56:51'),(598,22,41,1,1,1,1,'2015-06-30 14:56:51','2015-06-30 14:56:51'),(599,25,41,0,0,0,0,'2015-06-30 14:56:51','2015-06-30 14:56:51'),(600,26,41,1,1,1,1,'2015-06-30 14:56:51','2015-06-30 14:56:51'),(601,1,102,1,1,1,1,'2015-06-30 14:56:51','2015-06-30 14:56:51'),(602,3,102,1,1,1,1,'2015-06-30 14:56:51','2015-06-30 14:56:51'),(603,5,102,1,1,1,1,'2015-06-30 14:56:51','2015-06-30 14:56:51'),(604,6,102,1,1,1,1,'2015-06-30 14:56:51','2015-06-30 14:56:51'),(605,9,102,1,1,1,1,'2015-06-30 14:56:51','2015-06-30 14:56:51'),(606,10,102,1,1,1,1,'2015-06-30 14:56:51','2015-06-30 14:56:51'),(607,14,102,1,1,1,1,'2015-06-30 14:56:51','2015-06-30 14:56:51'),(608,16,102,1,1,1,1,'2015-06-30 14:56:51','2015-06-30 14:56:51'),(609,18,102,1,1,1,1,'2015-06-30 14:56:51','2015-06-30 14:56:51'),(610,19,102,1,1,1,1,'2015-06-30 14:56:51','2015-06-30 14:56:51'),(611,22,102,1,1,1,1,'2015-06-30 14:56:51','2015-06-30 14:56:51'),(612,25,102,1,1,1,1,'2015-06-30 14:56:51','2015-06-30 14:56:51'),(613,1,1,0,0,0,0,'2015-06-30 14:56:51','2015-06-30 14:56:51'),(614,2,1,1,0,0,0,'2015-06-30 14:56:51','2015-06-30 14:56:51'),(615,3,1,1,0,0,0,'2015-06-30 14:56:51','2015-06-30 14:56:51'),(616,4,1,0,1,1,0,'2015-06-30 14:56:51','2015-06-30 14:56:51'),(617,5,1,0,0,0,1,'2015-06-30 14:56:51','2015-06-30 14:56:51'),(618,6,1,0,0,0,0,'2015-06-30 14:56:51','2015-06-30 14:56:51'),(619,7,1,1,1,1,1,'2015-06-30 14:56:51','2015-06-30 14:56:51'),(620,8,1,0,0,0,0,'2015-06-30 14:56:51','2015-06-30 14:56:51'),(621,9,1,0,0,0,0,'2015-06-30 14:56:51','2015-06-30 14:56:51'),(622,10,1,0,0,0,0,'2015-06-30 14:56:51','2015-06-30 14:56:51'),(623,11,1,0,0,0,0,'2015-06-30 14:56:52','2015-06-30 14:56:52'),(624,12,1,0,0,0,0,'2015-06-30 14:56:52','2015-06-30 14:56:52'),(625,13,1,0,0,0,0,'2015-06-30 14:56:52','2015-06-30 14:56:52'),(626,14,1,0,0,0,0,'2015-06-30 14:56:52','2015-06-30 14:56:52'),(627,15,1,0,0,0,0,'2015-06-30 14:56:52','2015-06-30 14:56:52'),(628,16,1,0,0,0,0,'2015-06-30 14:56:52','2015-06-30 14:56:52'),(629,17,1,0,0,0,0,'2015-06-30 14:56:52','2015-06-30 14:56:52'),(630,18,1,0,0,0,0,'2015-06-30 14:56:52','2015-06-30 14:56:52'),(631,19,1,0,0,0,0,'2015-06-30 14:56:52','2015-06-30 14:56:52'),(632,20,1,0,0,0,0,'2015-06-30 14:56:52','2015-06-30 14:56:52'),(633,21,1,0,0,0,0,'2015-06-30 14:56:52','2015-06-30 14:56:52'),(634,22,1,0,0,0,0,'2015-06-30 14:56:52','2015-06-30 14:56:52'),(635,23,1,0,0,0,0,'2015-06-30 14:56:52','2015-06-30 14:56:52'),(636,24,1,0,0,0,0,'2015-06-30 14:56:52','2015-06-30 14:56:52'),(637,25,1,0,0,0,0,'2015-06-30 14:56:52','2015-06-30 14:56:52'),(638,26,1,0,0,0,0,'2015-06-30 14:56:52','2015-06-30 14:56:52'),(639,1,103,1,1,1,1,'2015-06-30 14:56:52','2015-06-30 14:56:52'),(640,3,103,1,1,1,1,'2015-06-30 14:56:52','2015-06-30 14:56:52'),(641,5,103,1,1,1,1,'2015-06-30 14:56:52','2015-06-30 14:56:52'),(642,6,103,1,1,1,1,'2015-06-30 14:56:52','2015-06-30 14:56:52'),(643,9,103,0,0,0,0,'2015-06-30 14:56:52','2015-06-30 14:56:52'),(644,10,103,1,1,1,1,'2015-06-30 14:56:52','2015-06-30 14:56:52'),(645,14,103,1,1,1,1,'2015-06-30 14:56:52','2015-06-30 14:56:52'),(646,16,103,1,1,1,1,'2015-06-30 14:56:52','2015-06-30 14:56:52'),(647,18,103,1,1,1,1,'2015-06-30 14:56:52','2015-06-30 14:56:52'),(648,19,103,1,1,1,1,'2015-06-30 14:56:52','2015-06-30 14:56:52'),(649,22,103,1,1,1,1,'2015-06-30 14:56:52','2015-06-30 14:56:52'),(650,25,103,1,1,1,1,'2015-06-30 14:56:52','2015-06-30 14:56:52'),(651,1,2,1,1,1,1,'2015-06-30 14:56:53','2015-06-30 14:56:53'),(652,2,2,1,1,1,1,'2015-06-30 14:56:53','2015-06-30 14:56:53'),(653,3,2,1,1,1,1,'2015-06-30 14:56:53','2015-06-30 14:56:53'),(654,4,2,1,1,1,1,'2015-06-30 14:56:53','2015-06-30 14:56:53'),(655,5,2,1,1,1,1,'2015-06-30 14:56:53','2015-06-30 14:56:53'),(656,6,2,1,1,1,1,'2015-06-30 14:56:53','2015-06-30 14:56:53'),(657,7,2,1,1,1,1,'2015-06-30 14:56:53','2015-06-30 14:56:53'),(658,8,2,1,1,1,1,'2015-06-30 14:56:53','2015-06-30 14:56:53'),(659,9,2,1,1,1,1,'2015-06-30 14:56:53','2015-06-30 14:56:53'),(660,10,2,1,1,1,1,'2015-06-30 14:56:53','2015-06-30 14:56:53'),(661,11,2,1,1,1,1,'2015-06-30 14:56:53','2015-06-30 14:56:53'),(662,12,2,1,1,1,1,'2015-06-30 14:56:53','2015-06-30 14:56:53'),(663,13,2,1,1,1,1,'2015-06-30 14:56:53','2015-06-30 14:56:53'),(664,14,2,1,1,1,1,'2015-06-30 14:56:53','2015-06-30 14:56:53'),(665,15,2,1,1,1,1,'2015-06-30 14:56:53','2015-06-30 14:56:53'),(666,16,2,0,0,0,0,'2015-06-30 14:56:53','2015-06-30 14:56:53'),(667,17,2,1,1,1,1,'2015-06-30 14:56:53','2015-06-30 14:56:53'),(668,18,2,1,1,1,1,'2015-06-30 14:56:53','2015-06-30 14:56:53'),(669,19,2,1,1,1,1,'2015-06-30 14:56:53','2015-06-30 14:56:53'),(670,20,2,1,1,1,1,'2015-06-30 14:56:53','2015-06-30 14:56:53'),(671,21,2,1,1,1,1,'2015-06-30 14:56:53','2015-06-30 14:56:53'),(672,22,2,1,1,1,1,'2015-06-30 14:56:53','2015-06-30 14:56:53'),(673,23,2,1,1,1,1,'2015-06-30 14:56:53','2015-06-30 14:56:53'),(674,24,2,1,1,1,1,'2015-06-30 14:56:53','2015-06-30 14:56:53'),(675,25,2,1,1,1,1,'2015-06-30 14:56:53','2015-06-30 14:56:53'),(676,26,2,1,1,1,1,'2015-06-30 14:56:53','2015-06-30 14:56:53'),(677,1,104,0,0,0,0,'2015-06-30 14:56:53','2015-06-30 14:56:53'),(678,3,104,1,1,1,1,'2015-06-30 14:56:54','2015-06-30 14:56:54'),(679,5,104,1,1,1,1,'2015-06-30 14:56:54','2015-06-30 14:56:54'),(680,6,104,1,1,1,1,'2015-06-30 14:56:54','2015-06-30 14:56:54'),(681,9,104,1,1,1,1,'2015-06-30 14:56:54','2015-06-30 14:56:54'),(682,10,104,1,1,1,1,'2015-06-30 14:56:54','2015-06-30 14:56:54'),(683,14,104,1,1,1,1,'2015-06-30 14:56:54','2015-06-30 14:56:54'),(684,16,104,1,1,1,1,'2015-06-30 14:56:54','2015-06-30 14:56:54'),(685,18,104,1,1,1,1,'2015-06-30 14:56:54','2015-06-30 14:56:54'),(686,19,104,1,1,1,1,'2015-06-30 14:56:54','2015-06-30 14:56:54'),(687,22,104,1,1,1,1,'2015-06-30 14:56:54','2015-06-30 14:56:54'),(688,25,104,1,1,1,1,'2015-06-30 14:56:54','2015-06-30 14:56:54'),(689,1,3,0,0,0,0,'2015-06-30 14:56:54','2015-06-30 14:56:54'),(690,2,3,1,1,1,1,'2015-06-30 14:56:54','2015-06-30 14:56:54'),(691,3,3,1,1,1,1,'2015-06-30 14:56:54','2015-06-30 14:56:54'),(692,4,3,1,1,1,1,'2015-06-30 14:56:54','2015-06-30 14:56:54'),(693,5,3,1,1,1,1,'2015-06-30 14:56:54','2015-06-30 14:56:54'),(694,6,3,1,1,1,1,'2015-06-30 14:56:54','2015-06-30 14:56:54'),(695,7,3,0,0,0,0,'2015-06-30 14:56:54','2015-06-30 14:56:54'),(696,8,3,1,1,1,1,'2015-06-30 14:56:54','2015-06-30 14:56:54'),(697,9,3,0,0,0,0,'2015-06-30 14:56:54','2015-06-30 14:56:54'),(698,10,3,1,1,1,1,'2015-06-30 14:56:54','2015-06-30 14:56:54'),(699,11,3,0,0,0,0,'2015-06-30 14:56:54','2015-06-30 14:56:54'),(700,12,3,0,0,0,0,'2015-06-30 14:56:54','2015-06-30 14:56:54'),(701,13,3,1,1,1,1,'2015-06-30 14:56:55','2015-06-30 14:56:55'),(702,14,3,1,1,1,1,'2015-06-30 14:56:55','2015-06-30 14:56:55'),(703,15,3,1,1,1,1,'2015-06-30 14:56:55','2015-06-30 14:56:55'),(704,16,3,1,1,1,1,'2015-06-30 14:56:55','2015-06-30 14:56:55'),(705,17,3,0,0,0,0,'2015-06-30 14:56:55','2015-06-30 14:56:55'),(706,18,3,1,1,1,1,'2015-06-30 14:56:55','2015-06-30 14:56:55'),(707,19,3,1,1,1,1,'2015-06-30 14:56:55','2015-06-30 14:56:55'),(708,20,3,1,1,1,1,'2015-06-30 14:56:55','2015-06-30 14:56:55'),(709,21,3,1,1,1,1,'2015-06-30 14:56:55','2015-06-30 14:56:55'),(710,22,3,1,1,1,1,'2015-06-30 14:56:55','2015-06-30 14:56:55'),(711,23,3,1,1,1,1,'2015-06-30 14:56:55','2015-06-30 14:56:55'),(712,24,3,1,1,1,1,'2015-06-30 14:56:55','2015-06-30 14:56:55'),(713,25,3,1,1,1,1,'2015-06-30 14:56:55','2015-06-30 14:56:55'),(714,26,3,1,1,1,1,'2015-06-30 14:56:55','2015-06-30 14:56:55'),(715,1,105,0,0,0,0,'2015-06-30 14:56:55','2015-06-30 14:56:55'),(716,3,105,1,1,1,1,'2015-06-30 14:56:55','2015-06-30 14:56:55'),(717,5,105,1,1,1,1,'2015-06-30 14:56:55','2015-06-30 14:56:55'),(718,6,105,1,1,1,1,'2015-06-30 14:56:55','2015-06-30 14:56:55'),(719,9,105,0,0,0,0,'2015-06-30 14:56:55','2015-06-30 14:56:55'),(720,10,105,1,1,1,1,'2015-06-30 14:56:55','2015-06-30 14:56:55'),(721,14,105,1,1,1,1,'2015-06-30 14:56:55','2015-06-30 14:56:55'),(722,16,105,0,1,1,1,'2015-06-30 14:56:56','2015-06-30 14:56:56'),(723,18,105,1,1,1,1,'2015-06-30 14:56:56','2015-06-30 14:56:56'),(724,19,105,1,1,1,1,'2015-06-30 14:56:56','2015-06-30 14:56:56'),(725,22,105,1,1,1,1,'2015-06-30 14:56:56','2015-06-30 14:56:56'),(726,25,105,0,0,0,0,'2015-06-30 14:56:56','2015-06-30 14:56:56'),(727,1,4,0,0,0,0,'2015-06-30 14:56:56','2015-06-30 14:56:56'),(728,2,4,0,0,0,0,'2015-06-30 14:56:56','2015-06-30 14:56:56'),(729,3,4,1,1,1,1,'2015-06-30 14:56:56','2015-06-30 14:56:56'),(730,4,4,1,1,1,1,'2015-06-30 14:56:56','2015-06-30 14:56:56'),(731,5,4,0,0,0,0,'2015-06-30 14:56:56','2015-06-30 14:56:56'),(732,6,4,1,1,1,1,'2015-06-30 14:56:56','2015-06-30 14:56:56'),(733,7,4,1,1,1,1,'2015-06-30 14:56:56','2015-06-30 14:56:56'),(734,8,4,1,1,1,1,'2015-06-30 14:56:56','2015-06-30 14:56:56'),(735,9,4,1,1,1,1,'2015-06-30 14:56:56','2015-06-30 14:56:56'),(736,10,4,1,1,1,1,'2015-06-30 14:56:56','2015-06-30 14:56:56'),(737,11,4,1,1,1,1,'2015-06-30 14:56:56','2015-06-30 14:56:56'),(738,12,4,0,0,0,0,'2015-06-30 14:56:56','2015-06-30 14:56:56'),(739,13,4,1,1,1,1,'2015-06-30 14:56:56','2015-06-30 14:56:56'),(740,14,4,0,0,0,0,'2015-06-30 14:56:56','2015-06-30 14:56:56'),(741,15,4,0,0,0,0,'2015-06-30 14:56:56','2015-06-30 14:56:56'),(742,16,4,0,0,0,0,'2015-06-30 14:56:56','2015-06-30 14:56:56'),(743,17,4,1,1,1,1,'2015-06-30 14:56:57','2015-06-30 14:56:57'),(744,18,4,1,1,1,1,'2015-06-30 14:56:57','2015-06-30 14:56:57'),(745,19,4,1,1,1,1,'2015-06-30 14:56:57','2015-06-30 14:56:57'),(746,20,4,1,1,1,1,'2015-06-30 14:56:57','2015-06-30 14:56:57'),(747,21,4,1,1,1,1,'2015-06-30 14:56:57','2015-06-30 14:56:57'),(748,22,4,1,1,1,1,'2015-06-30 14:56:57','2015-06-30 14:56:57'),(749,23,4,1,1,1,1,'2015-06-30 14:56:57','2015-06-30 14:56:57'),(750,24,4,1,1,1,1,'2015-06-30 14:56:57','2015-06-30 14:56:57'),(751,25,4,1,1,1,1,'2015-06-30 14:56:57','2015-06-30 14:56:57'),(752,26,4,1,1,0,0,'2015-06-30 14:56:57','2015-06-30 14:56:57'),(753,1,106,0,0,0,0,'2015-06-30 14:56:57','2015-06-30 14:56:57'),(754,3,106,1,1,1,1,'2015-06-30 14:56:57','2015-06-30 14:56:57'),(755,5,106,1,1,1,1,'2015-06-30 14:56:57','2015-06-30 14:56:57'),(756,6,106,1,1,1,1,'2015-06-30 14:56:57','2015-06-30 14:56:57'),(757,9,106,1,1,1,1,'2015-06-30 14:56:57','2015-06-30 14:56:57'),(758,10,106,1,1,1,1,'2015-06-30 14:56:57','2015-06-30 14:56:57'),(759,14,106,0,0,0,0,'2015-06-30 14:56:57','2015-06-30 14:56:57'),(760,16,106,0,0,0,0,'2015-06-30 14:56:57','2015-06-30 14:56:57'),(761,18,106,0,0,0,0,'2015-06-30 14:56:57','2015-06-30 14:56:57'),(762,19,106,1,1,1,1,'2015-06-30 14:56:57','2015-06-30 14:56:57'),(763,22,106,0,0,0,0,'2015-06-30 14:56:57','2015-06-30 14:56:57'),(764,25,106,1,1,1,1,'2015-06-30 14:56:57','2015-06-30 14:56:57'),(765,1,5,0,0,0,0,'2015-06-30 14:56:57','2015-06-30 14:56:57'),(766,2,5,1,1,1,1,'2015-06-30 14:56:57','2015-06-30 14:56:57'),(767,3,5,1,1,1,1,'2015-06-30 14:56:57','2015-06-30 14:56:57'),(768,4,5,1,1,1,1,'2015-06-30 14:56:57','2015-06-30 14:56:57'),(769,5,5,1,1,1,1,'2015-06-30 14:56:57','2015-06-30 14:56:57'),(770,6,5,1,1,1,1,'2015-06-30 14:56:58','2015-06-30 14:56:58'),(771,7,5,1,1,1,1,'2015-06-30 14:56:58','2015-06-30 14:56:58'),(772,8,5,1,1,1,1,'2015-06-30 14:56:58','2015-06-30 14:56:58'),(773,9,5,1,1,1,1,'2015-06-30 14:56:58','2015-06-30 14:56:58'),(774,10,5,1,1,1,1,'2015-06-30 14:56:58','2015-06-30 14:56:58'),(775,11,5,1,1,1,1,'2015-06-30 14:56:58','2015-06-30 14:56:58'),(776,12,5,0,0,0,0,'2015-06-30 14:56:58','2015-06-30 14:56:58'),(777,13,5,0,0,0,0,'2015-06-30 14:56:58','2015-06-30 14:56:58'),(778,14,5,1,1,1,1,'2015-06-30 14:56:58','2015-06-30 14:56:58'),(779,15,5,1,1,1,1,'2015-06-30 14:56:58','2015-06-30 14:56:58'),(780,16,5,1,1,1,1,'2015-06-30 14:56:58','2015-06-30 14:56:58'),(781,17,5,1,1,1,1,'2015-06-30 14:56:58','2015-06-30 14:56:58'),(782,18,5,1,1,1,1,'2015-06-30 14:56:58','2015-06-30 14:56:58'),(783,19,5,1,1,1,1,'2015-06-30 14:56:58','2015-06-30 14:56:58'),(784,20,5,1,1,1,1,'2015-06-30 14:56:58','2015-06-30 14:56:58'),(785,21,5,1,1,1,1,'2015-06-30 14:56:58','2015-06-30 14:56:58'),(786,22,5,1,1,1,1,'2015-06-30 14:56:58','2015-06-30 14:56:58'),(787,23,5,1,1,1,1,'2015-06-30 14:56:58','2015-06-30 14:56:58'),(788,24,5,1,1,1,1,'2015-06-30 14:56:58','2015-06-30 14:56:58'),(789,25,5,1,1,1,1,'2015-06-30 14:56:58','2015-06-30 14:56:58'),(790,26,5,1,1,1,1,'2015-06-30 14:56:58','2015-06-30 14:56:58'),(791,1,107,0,0,0,0,'2015-06-30 14:56:58','2015-06-30 14:56:58'),(792,3,107,1,1,1,1,'2015-06-30 14:56:58','2015-06-30 14:56:58'),(793,5,107,1,1,1,1,'2015-06-30 14:56:59','2015-06-30 14:56:59'),(794,6,107,1,1,1,1,'2015-06-30 14:56:59','2015-06-30 14:56:59'),(795,9,107,0,0,0,0,'2015-06-30 14:56:59','2015-06-30 14:56:59'),(796,10,107,0,0,0,0,'2015-06-30 14:56:59','2015-06-30 14:56:59'),(797,14,107,1,1,1,1,'2015-06-30 14:56:59','2015-06-30 14:56:59'),(798,16,107,0,0,0,0,'2015-06-30 14:56:59','2015-06-30 14:56:59'),(799,18,107,1,1,1,1,'2015-06-30 14:56:59','2015-06-30 14:56:59'),(800,19,107,1,1,1,1,'2015-06-30 14:56:59','2015-06-30 14:56:59'),(801,22,107,1,1,1,1,'2015-06-30 14:56:59','2015-06-30 14:56:59'),(802,25,107,1,1,1,1,'2015-06-30 14:56:59','2015-06-30 14:56:59'),(803,1,6,0,0,0,0,'2015-06-30 14:56:59','2015-06-30 14:56:59'),(804,2,6,1,1,1,1,'2015-06-30 14:56:59','2015-06-30 14:56:59'),(805,3,6,1,1,1,1,'2015-06-30 14:56:59','2015-06-30 14:56:59'),(806,4,6,1,1,1,1,'2015-06-30 14:56:59','2015-06-30 14:56:59'),(807,5,6,1,1,1,1,'2015-06-30 14:56:59','2015-06-30 14:56:59'),(808,6,6,1,1,1,1,'2015-06-30 14:56:59','2015-06-30 14:56:59'),(809,7,6,1,1,1,1,'2015-06-30 14:56:59','2015-06-30 14:56:59'),(810,8,6,0,0,0,0,'2015-06-30 14:56:59','2015-06-30 14:56:59'),(811,9,6,0,0,0,0,'2015-06-30 14:56:59','2015-06-30 14:56:59'),(812,10,6,1,1,1,1,'2015-06-30 14:57:00','2015-06-30 14:57:00'),(813,11,6,1,1,1,1,'2015-06-30 14:57:00','2015-06-30 14:57:00'),(814,12,6,0,0,0,0,'2015-06-30 14:57:00','2015-06-30 14:57:00'),(815,13,6,1,1,1,1,'2015-06-30 14:57:00','2015-06-30 14:57:00'),(816,14,6,1,1,1,1,'2015-06-30 14:57:00','2015-06-30 14:57:00'),(817,15,6,1,1,1,1,'2015-06-30 14:57:00','2015-06-30 14:57:00'),(818,16,6,0,0,0,0,'2015-06-30 14:57:00','2015-06-30 14:57:00'),(819,17,6,0,0,0,0,'2015-06-30 14:57:00','2015-06-30 14:57:00'),(820,18,6,1,1,1,1,'2015-06-30 14:57:00','2015-06-30 14:57:00'),(821,19,6,1,1,1,1,'2015-06-30 14:57:00','2015-06-30 14:57:00'),(822,20,6,0,0,0,0,'2015-06-30 14:57:00','2015-06-30 14:57:00'),(823,21,6,1,1,1,1,'2015-06-30 14:57:01','2015-06-30 14:57:01'),(824,22,6,1,1,1,1,'2015-06-30 14:57:01','2015-06-30 14:57:01'),(825,23,6,1,1,1,1,'2015-06-30 14:57:01','2015-06-30 14:57:01'),(826,24,6,1,1,1,1,'2015-06-30 14:57:01','2015-06-30 14:57:01'),(827,25,6,1,1,1,1,'2015-06-30 14:57:01','2015-06-30 14:57:01'),(828,26,6,1,1,1,1,'2015-06-30 14:57:01','2015-06-30 14:57:01'),(829,1,108,0,0,0,0,'2015-06-30 14:57:01','2015-06-30 14:57:01'),(830,3,108,1,1,1,1,'2015-06-30 14:57:01','2015-06-30 14:57:01'),(831,5,108,0,0,0,0,'2015-06-30 14:57:01','2015-06-30 14:57:01'),(832,6,108,1,1,1,1,'2015-06-30 14:57:01','2015-06-30 14:57:01'),(833,9,108,1,1,1,1,'2015-06-30 14:57:01','2015-06-30 14:57:01'),(834,10,108,0,0,0,0,'2015-06-30 14:57:01','2015-06-30 14:57:01'),(835,14,108,1,1,1,1,'2015-06-30 14:57:01','2015-06-30 14:57:01'),(836,16,108,0,0,0,0,'2015-06-30 14:57:01','2015-06-30 14:57:01'),(837,18,108,1,1,1,1,'2015-06-30 14:57:01','2015-06-30 14:57:01'),(838,19,108,0,0,0,0,'2015-06-30 14:57:01','2015-06-30 14:57:01'),(839,22,108,1,1,1,1,'2015-06-30 14:57:01','2015-06-30 14:57:01'),(840,25,108,1,1,1,1,'2015-06-30 14:57:01','2015-06-30 14:57:01'),(841,1,7,0,0,0,0,'2015-06-30 14:57:01','2015-06-30 14:57:01'),(842,2,7,1,1,1,1,'2015-06-30 14:57:01','2015-06-30 14:57:01'),(843,3,7,1,1,1,1,'2015-06-30 14:57:01','2015-06-30 14:57:01'),(844,4,7,1,1,1,1,'2015-06-30 14:57:02','2015-06-30 14:57:02'),(845,5,7,1,1,1,1,'2015-06-30 14:57:02','2015-06-30 14:57:02'),(846,6,7,1,1,1,1,'2015-06-30 14:57:02','2015-06-30 14:57:02'),(847,7,7,1,1,1,1,'2015-06-30 14:57:02','2015-06-30 14:57:02'),(848,8,7,1,1,1,1,'2015-06-30 14:57:02','2015-06-30 14:57:02'),(849,9,7,0,0,0,0,'2015-06-30 14:57:02','2015-06-30 14:57:02'),(850,10,7,1,1,1,1,'2015-06-30 14:57:02','2015-06-30 14:57:02'),(851,11,7,1,1,1,1,'2015-06-30 14:57:02','2015-06-30 14:57:02'),(852,12,7,0,0,0,0,'2015-06-30 14:57:02','2015-06-30 14:57:02'),(853,13,7,1,1,1,1,'2015-06-30 14:57:02','2015-06-30 14:57:02'),(854,14,7,1,1,1,1,'2015-06-30 14:57:02','2015-06-30 14:57:02'),(855,15,7,1,1,1,1,'2015-06-30 14:57:02','2015-06-30 14:57:02'),(856,16,7,0,0,0,0,'2015-06-30 14:57:02','2015-06-30 14:57:02'),(857,17,7,1,1,1,1,'2015-06-30 14:57:02','2015-06-30 14:57:02'),(858,18,7,1,1,1,1,'2015-06-30 14:57:02','2015-06-30 14:57:02'),(859,19,7,1,1,1,1,'2015-06-30 14:57:02','2015-06-30 14:57:02'),(860,20,7,1,1,1,1,'2015-06-30 14:57:02','2015-06-30 14:57:02'),(861,21,7,1,1,1,1,'2015-06-30 14:57:02','2015-06-30 14:57:02'),(862,22,7,1,1,1,1,'2015-06-30 14:57:02','2015-06-30 14:57:02'),(863,23,7,1,1,1,1,'2015-06-30 14:57:02','2015-06-30 14:57:02'),(864,24,7,1,1,1,1,'2015-06-30 14:57:02','2015-06-30 14:57:02'),(865,25,7,1,1,1,1,'2015-06-30 14:57:02','2015-06-30 14:57:02'),(866,26,7,1,1,1,1,'2015-06-30 14:57:02','2015-06-30 14:57:02'),(867,1,109,0,0,0,0,'2015-06-30 14:57:02','2015-06-30 14:57:02'),(868,3,109,1,1,1,1,'2015-06-30 14:57:03','2015-06-30 14:57:03'),(869,5,109,1,1,1,1,'2015-06-30 14:57:03','2015-06-30 14:57:03'),(870,6,109,1,1,1,1,'2015-06-30 14:57:03','2015-06-30 14:57:03'),(871,9,109,1,1,0,0,'2015-06-30 14:57:03','2015-06-30 14:57:03'),(872,10,109,0,0,0,0,'2015-06-30 14:57:03','2015-06-30 14:57:03'),(873,14,109,0,0,0,0,'2015-06-30 14:57:03','2015-06-30 14:57:03'),(874,16,109,0,0,0,0,'2015-06-30 14:57:03','2015-06-30 14:57:03'),(875,18,109,1,1,1,1,'2015-06-30 14:57:03','2015-06-30 14:57:03'),(876,19,109,1,1,1,1,'2015-06-30 14:57:03','2015-06-30 14:57:03'),(877,22,109,1,1,1,1,'2015-06-30 14:57:03','2015-06-30 14:57:03'),(878,25,109,1,1,1,1,'2015-06-30 14:57:03','2015-06-30 14:57:03'),(879,1,8,0,0,0,0,'2015-06-30 14:57:03','2015-06-30 14:57:03'),(880,2,8,1,1,1,1,'2015-06-30 14:57:03','2015-06-30 14:57:03'),(881,3,8,1,1,1,1,'2015-06-30 14:57:03','2015-06-30 14:57:03'),(882,4,8,1,1,1,1,'2015-06-30 14:57:03','2015-06-30 14:57:03'),(883,5,8,1,1,1,1,'2015-06-30 14:57:03','2015-06-30 14:57:03'),(884,6,8,1,1,1,1,'2015-06-30 14:57:03','2015-06-30 14:57:03'),(885,7,8,1,1,1,1,'2015-06-30 14:57:03','2015-06-30 14:57:03'),(886,8,8,1,1,1,1,'2015-06-30 14:57:03','2015-06-30 14:57:03'),(887,9,8,0,0,0,0,'2015-06-30 14:57:03','2015-06-30 14:57:03'),(888,10,8,1,1,1,1,'2015-06-30 14:57:03','2015-06-30 14:57:03'),(889,11,8,1,1,1,1,'2015-06-30 14:57:03','2015-06-30 14:57:03'),(890,12,8,0,0,0,0,'2015-06-30 14:57:03','2015-06-30 14:57:03'),(891,13,8,0,0,0,0,'2015-06-30 14:57:03','2015-06-30 14:57:03'),(892,14,8,1,1,1,1,'2015-06-30 14:57:03','2015-06-30 14:57:03'),(893,15,8,1,1,1,1,'2015-06-30 14:57:04','2015-06-30 14:57:04'),(894,16,8,0,0,0,0,'2015-06-30 14:57:04','2015-06-30 14:57:04'),(895,17,8,1,1,1,1,'2015-06-30 14:57:04','2015-06-30 14:57:04'),(896,18,8,1,1,1,1,'2015-06-30 14:57:04','2015-06-30 14:57:04'),(897,19,8,1,1,1,1,'2015-06-30 14:57:04','2015-06-30 14:57:04'),(898,20,8,1,1,1,1,'2015-06-30 14:57:04','2015-06-30 14:57:04'),(899,21,8,1,1,1,1,'2015-06-30 14:57:04','2015-06-30 14:57:04'),(900,22,8,1,1,1,1,'2015-06-30 14:57:04','2015-06-30 14:57:04'),(901,23,8,1,1,1,1,'2015-06-30 14:57:04','2015-06-30 14:57:04'),(902,24,8,1,1,1,1,'2015-06-30 14:57:04','2015-06-30 14:57:04'),(903,25,8,1,1,1,1,'2015-06-30 14:57:04','2015-06-30 14:57:04'),(904,26,8,1,1,1,1,'2015-06-30 14:57:04','2015-06-30 14:57:04'),(905,1,110,0,0,0,0,'2015-06-30 14:57:04','2015-06-30 14:57:04'),(906,3,110,1,1,1,1,'2015-06-30 14:57:04','2015-06-30 14:57:04'),(907,5,110,1,1,1,1,'2015-06-30 14:57:04','2015-06-30 14:57:04'),(908,6,110,1,1,1,1,'2015-06-30 14:57:04','2015-06-30 14:57:04'),(909,9,110,0,0,0,0,'2015-06-30 14:57:04','2015-06-30 14:57:04'),(910,10,110,1,1,1,1,'2015-06-30 14:57:04','2015-06-30 14:57:04'),(911,14,110,1,1,1,1,'2015-06-30 14:57:04','2015-06-30 14:57:04'),(912,16,110,1,1,1,1,'2015-06-30 14:57:04','2015-06-30 14:57:04'),(913,18,110,1,1,1,1,'2015-06-30 14:57:04','2015-06-30 14:57:04'),(914,19,110,1,1,1,1,'2015-06-30 14:57:04','2015-06-30 14:57:04'),(915,22,110,1,1,1,1,'2015-06-30 14:57:04','2015-06-30 14:57:04'),(916,25,110,1,1,1,1,'2015-06-30 14:57:04','2015-06-30 14:57:04'),(917,1,9,0,0,0,0,'2015-06-30 14:57:04','2015-06-30 14:57:04'),(918,2,9,1,1,1,1,'2015-06-30 14:57:05','2015-06-30 14:57:05'),(919,3,9,1,1,1,1,'2015-06-30 14:57:05','2015-06-30 14:57:05'),(920,4,9,1,1,1,1,'2015-06-30 14:57:05','2015-06-30 14:57:05'),(921,5,9,1,1,1,1,'2015-06-30 14:57:05','2015-06-30 14:57:05'),(922,6,9,1,1,1,1,'2015-06-30 14:57:05','2015-06-30 14:57:05'),(923,7,9,1,1,1,1,'2015-06-30 14:57:05','2015-06-30 14:57:05'),(924,8,9,1,1,1,1,'2015-06-30 14:57:05','2015-06-30 14:57:05'),(925,9,9,1,1,1,1,'2015-06-30 14:57:05','2015-06-30 14:57:05'),(926,10,9,1,1,1,1,'2015-06-30 14:57:05','2015-06-30 14:57:05'),(927,11,9,1,1,1,1,'2015-06-30 14:57:05','2015-06-30 14:57:05'),(928,12,9,0,0,0,0,'2015-06-30 14:57:05','2015-06-30 14:57:05'),(929,13,9,1,1,1,1,'2015-06-30 14:57:05','2015-06-30 14:57:05'),(930,14,9,1,1,1,1,'2015-06-30 14:57:05','2015-06-30 14:57:05'),(931,15,9,1,1,1,1,'2015-06-30 14:57:05','2015-06-30 14:57:05'),(932,16,9,1,1,1,1,'2015-06-30 14:57:05','2015-06-30 14:57:05'),(933,17,9,1,1,1,1,'2015-06-30 14:57:05','2015-06-30 14:57:05'),(934,18,9,1,1,1,1,'2015-06-30 14:57:05','2015-06-30 14:57:05'),(935,19,9,1,1,1,1,'2015-06-30 14:57:05','2015-06-30 14:57:05'),(936,20,9,1,1,1,1,'2015-06-30 14:57:05','2015-06-30 14:57:05'),(937,21,9,1,1,1,1,'2015-06-30 14:57:05','2015-06-30 14:57:05'),(938,22,9,1,1,1,1,'2015-06-30 14:57:05','2015-06-30 14:57:05'),(939,23,9,1,1,1,1,'2015-06-30 14:57:05','2015-06-30 14:57:05'),(940,24,9,1,1,1,1,'2015-06-30 14:57:05','2015-06-30 14:57:05'),(941,25,9,1,1,1,1,'2015-06-30 14:57:05','2015-06-30 14:57:05'),(942,26,9,1,1,1,1,'2015-06-30 14:57:05','2015-06-30 14:57:05'),(943,1,111,0,0,0,0,'2015-06-30 14:57:06','2015-06-30 14:57:06'),(944,3,111,1,1,1,1,'2015-06-30 14:57:06','2015-06-30 14:57:06'),(945,5,111,1,1,1,1,'2015-06-30 14:57:06','2015-06-30 14:57:06'),(946,6,111,1,1,1,1,'2015-06-30 14:57:06','2015-06-30 14:57:06'),(947,9,111,0,0,0,0,'2015-06-30 14:57:06','2015-06-30 14:57:06'),(948,10,111,1,1,1,1,'2015-06-30 14:57:06','2015-06-30 14:57:06'),(949,14,111,0,0,0,0,'2015-06-30 14:57:06','2015-06-30 14:57:06'),(950,16,111,1,1,1,1,'2015-06-30 14:57:06','2015-06-30 14:57:06'),(951,18,111,1,1,1,1,'2015-06-30 14:57:06','2015-06-30 14:57:06'),(952,19,111,0,0,0,0,'2015-06-30 14:57:06','2015-06-30 14:57:06'),(953,22,111,1,1,1,1,'2015-06-30 14:57:06','2015-06-30 14:57:06'),(954,25,111,1,1,1,1,'2015-06-30 14:57:06','2015-06-30 14:57:06'),(955,1,10,0,0,0,0,'2015-06-30 14:57:06','2015-06-30 14:57:06'),(956,2,10,1,1,1,1,'2015-06-30 14:57:06','2015-06-30 14:57:06'),(957,3,10,1,1,1,1,'2015-06-30 14:57:06','2015-06-30 14:57:06'),(958,4,10,1,1,1,1,'2015-06-30 14:57:06','2015-06-30 14:57:06'),(959,5,10,0,0,0,0,'2015-06-30 14:57:06','2015-06-30 14:57:06'),(960,6,10,1,1,1,1,'2015-06-30 14:57:06','2015-06-30 14:57:06'),(961,7,10,1,1,1,1,'2015-06-30 14:57:06','2015-06-30 14:57:06'),(962,8,10,0,0,0,0,'2015-06-30 14:57:06','2015-06-30 14:57:06'),(963,9,10,0,0,0,0,'2015-06-30 14:57:06','2015-06-30 14:57:06'),(964,10,10,1,1,1,1,'2015-06-30 14:57:06','2015-06-30 14:57:06'),(965,11,10,1,1,1,1,'2015-06-30 14:57:06','2015-06-30 14:57:06'),(966,12,10,0,0,0,0,'2015-06-30 14:57:06','2015-06-30 14:57:06'),(967,13,10,0,0,0,0,'2015-06-30 14:57:06','2015-06-30 14:57:06'),(968,14,10,1,1,1,1,'2015-06-30 14:57:07','2015-06-30 14:57:07'),(969,15,10,1,1,1,1,'2015-06-30 14:57:07','2015-06-30 14:57:07'),(970,16,10,1,1,1,1,'2015-06-30 14:57:07','2015-06-30 14:57:07'),(971,17,10,1,1,1,1,'2015-06-30 14:57:07','2015-06-30 14:57:07'),(972,18,10,1,1,1,1,'2015-06-30 14:57:07','2015-06-30 14:57:07'),(973,19,10,0,0,0,0,'2015-06-30 14:57:07','2015-06-30 14:57:07'),(974,20,10,1,1,1,1,'2015-06-30 14:57:07','2015-06-30 14:57:07'),(975,21,10,1,1,1,1,'2015-06-30 14:57:07','2015-06-30 14:57:07'),(976,22,10,1,1,1,1,'2015-06-30 14:57:07','2015-06-30 14:57:07'),(977,23,10,1,1,1,1,'2015-06-30 14:57:07','2015-06-30 14:57:07'),(978,24,10,1,1,1,1,'2015-06-30 14:57:07','2015-06-30 14:57:07'),(979,25,10,1,1,1,1,'2015-06-30 14:57:07','2015-06-30 14:57:07'),(980,26,10,1,1,1,1,'2015-06-30 14:57:07','2015-06-30 14:57:07'),(981,1,112,0,0,0,0,'2015-06-30 14:57:07','2015-06-30 14:57:07'),(982,3,112,1,1,1,1,'2015-06-30 14:57:07','2015-06-30 14:57:07'),(983,5,112,1,1,1,1,'2015-06-30 14:57:07','2015-06-30 14:57:07'),(984,6,112,0,0,0,0,'2015-06-30 14:57:07','2015-06-30 14:57:07'),(985,9,112,0,0,0,0,'2015-06-30 14:57:07','2015-06-30 14:57:07'),(986,10,112,1,1,1,1,'2015-06-30 14:57:07','2015-06-30 14:57:07'),(987,14,112,1,1,1,1,'2015-06-30 14:57:07','2015-06-30 14:57:07'),(988,16,112,1,1,1,1,'2015-06-30 14:57:07','2015-06-30 14:57:07'),(989,18,112,1,1,1,1,'2015-06-30 14:57:07','2015-06-30 14:57:07'),(990,19,112,0,0,0,0,'2015-06-30 14:57:07','2015-06-30 14:57:07'),(991,22,112,1,1,1,1,'2015-06-30 14:57:08','2015-06-30 14:57:08'),(992,25,112,1,1,1,1,'2015-06-30 14:57:08','2015-06-30 14:57:08'),(993,1,11,0,0,0,0,'2015-06-30 14:57:08','2015-06-30 14:57:08'),(994,2,11,1,1,1,1,'2015-06-30 14:57:08','2015-06-30 14:57:08'),(995,3,11,1,1,1,1,'2015-06-30 14:57:08','2015-06-30 14:57:08'),(996,4,11,1,1,1,1,'2015-06-30 14:57:08','2015-06-30 14:57:08'),(997,5,11,1,1,1,1,'2015-06-30 14:57:08','2015-06-30 14:57:08'),(998,6,11,1,1,1,1,'2015-06-30 14:57:08','2015-06-30 14:57:08'),(999,7,11,1,1,1,1,'2015-06-30 14:57:08','2015-06-30 14:57:08'),(1000,8,11,1,1,1,1,'2015-06-30 14:57:08','2015-06-30 14:57:08');
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
INSERT INTO `cursos` VALUES (1,'AUTOMAÇÃO INDUSTRIAL','AI','2015-06-30 14:56:09','2015-06-30 14:56:09',55),(2,'ANÁLISE E DESENVOLVIMENTO DE SISTEMAS','ADS','2015-06-30 14:56:09','2015-06-30 14:56:09',49),(3,'REDES DE COMPUTADORES','RC','2015-06-30 14:56:09','2015-06-30 14:56:09',54),(4,'SISTEMAS EMBARCADOS','SE','2015-06-30 14:56:09','2015-06-30 14:56:09',55),(5,'SISTEMAS DE TELECOMUNICAÇÕES','ST','2015-06-30 14:56:09','2015-06-30 14:56:09',54);
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
INSERT INTO `migrations` VALUES ('2014_04_24_110151_create_oauth_scopes_table',1),('2014_04_24_110304_create_oauth_grants_table',1),('2014_04_24_110403_create_oauth_grant_scopes_table',1),('2014_04_24_110459_create_oauth_clients_table',1),('2014_04_24_110557_create_oauth_client_endpoints_table',1),('2014_04_24_110705_create_oauth_client_scopes_table',1),('2014_04_24_110817_create_oauth_client_grants_table',1),('2014_04_24_111002_create_oauth_sessions_table',1),('2014_04_24_111109_create_oauth_session_scopes_table',1),('2014_04_24_111254_create_oauth_auth_codes_table',1),('2014_04_24_111403_create_oauth_auth_code_scopes_table',1),('2014_04_24_111518_create_oauth_access_tokens_table',1),('2014_04_24_111657_create_oauth_access_token_scopes_table',1),('2014_04_24_111810_create_oauth_refresh_tokens_table',1),('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2015_05_13_203712_create_tipos_usuarios_table',1),('2015_05_13_203905_add_tipo_usuario_id_to_usuarios',1),('2015_05_13_204103_create_professores_table',1),('2015_05_13_205424_create_alunos_table',1),('2015_05_13_205736_create_cursos_table',1),('2015_05_13_210102_create_unidades_curriculares_table',1),('2015_05_13_210222_create_turmas_table',1),('2015_05_13_210604_create_alunos_turmas_table',1),('2015_05_13_210808_create_cursos_unidades_curriculares_table',1),('2015_05_13_211235_create_professores_turmas_table',1),('2015_05_13_211408_create_cursos_alunos_table',1),('2015_05_13_211606_create_aulas_table',1),('2015_05_13_211945_create_chamadas_table',1),('2015_05_13_212447_create_status_diarios_table',1),('2015_05_14_180140_add_curso_origem_to_professores',1),('2015_05_15_115104_add_fields_to_aulas_table',1),('2015_05_22_122856_entrust_setup_tables',1),('2015_05_22_123044_remove_tipo_usuario_table',1),('2015_05_26_153726_add_curso_origem_alunos_turmas_table',1),('2015_05_26_154851_add_turno__column_to_turmas_table',1),('2015_05_26_155647_add_corrdenador_to_cursos_table',1),('2015_06_15_163041_create_diarios_envios_table',1),('2015_06_17_190218_change_professores_curso_origem_id',1),('2015_06_18_154537_change_cursos_coordenador_id',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_client_scopes`
--

LOCK TABLES `oauth_client_scopes` WRITE;
/*!40000 ALTER TABLE `oauth_client_scopes` DISABLE KEYS */;
INSERT INTO `oauth_client_scopes` VALUES (1,'client1id','write-chamada','2015-06-30 14:57:08','2015-06-30 14:57:08'),(2,'client2id','read-agenda','2015-06-30 14:57:08','2015-06-30 14:57:08'),(3,'client2id','read-usuarios','2015-06-30 14:57:08','2015-06-30 14:57:08');
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `oauth_clients_id_secret_unique` (`id`,`secret`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` VALUES ('client1id','client1secret','client1','2015-06-30 14:57:08','2015-06-30 14:57:08'),('client2id','client2secret','client2','2015-06-30 14:57:08','2015-06-30 14:57:08');
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
INSERT INTO `oauth_scopes` VALUES ('read-agenda','Permissão para ler a agenda letiva','2015-06-30 14:57:08','2015-06-30 14:57:08'),('read-usuarios','Permissão para ler informações dos usuários','2015-06-30 14:57:08','2015-06-30 14:57:08'),('write-chamada','Permissão para escrever na chamada','2015-06-30 14:57:08','2015-06-30 14:57:08');
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
INSERT INTO `permission_role` VALUES (28,1),(31,1),(28,2),(29,2),(30,2),(31,2),(32,2),(33,2),(34,2),(35,2),(1,3),(2,3),(3,3),(4,3),(5,3),(6,3),(7,3),(8,3),(9,3),(10,3),(11,3),(12,3),(13,3),(14,3),(15,3),(16,3),(17,3),(18,3),(19,3),(20,3),(21,3),(22,3),(23,3),(24,3),(25,3),(26,3),(27,3);
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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'create-aluno',NULL,NULL,'2015-06-30 14:55:55','2015-06-30 14:55:55'),(2,'edit-aluno',NULL,NULL,'2015-06-30 14:55:55','2015-06-30 14:55:55'),(3,'view-aluno',NULL,NULL,'2015-06-30 14:55:56','2015-06-30 14:55:56'),(4,'list-alunos',NULL,NULL,'2015-06-30 14:55:56','2015-06-30 14:55:56'),(5,'create-professor',NULL,NULL,'2015-06-30 14:55:56','2015-06-30 14:55:56'),(6,'edit-professor',NULL,NULL,'2015-06-30 14:55:56','2015-06-30 14:55:56'),(7,'view-professor',NULL,NULL,'2015-06-30 14:55:56','2015-06-30 14:55:56'),(8,'list-professor',NULL,NULL,'2015-06-30 14:55:56','2015-06-30 14:55:56'),(9,'create-coordenador',NULL,NULL,'2015-06-30 14:55:56','2015-06-30 14:55:56'),(10,'edit-coordenador',NULL,NULL,'2015-06-30 14:55:56','2015-06-30 14:55:56'),(11,'view-coordenador',NULL,NULL,'2015-06-30 14:55:56','2015-06-30 14:55:56'),(12,'list-coordenador',NULL,NULL,'2015-06-30 14:55:56','2015-06-30 14:55:56'),(13,'create-unidade-curricular',NULL,NULL,'2015-06-30 14:55:56','2015-06-30 14:55:56'),(14,'edit-unidade-curricular',NULL,NULL,'2015-06-30 14:55:57','2015-06-30 14:55:57'),(15,'view-unidade-curricular',NULL,NULL,'2015-06-30 14:55:57','2015-06-30 14:55:57'),(16,'list-unidade-curricular',NULL,NULL,'2015-06-30 14:55:57','2015-06-30 14:55:57'),(17,'create-turma',NULL,NULL,'2015-06-30 14:55:57','2015-06-30 14:55:57'),(18,'edit-turma',NULL,NULL,'2015-06-30 14:55:57','2015-06-30 14:55:57'),(19,'view-turma',NULL,NULL,'2015-06-30 14:55:57','2015-06-30 14:55:57'),(20,'list-turma',NULL,NULL,'2015-06-30 14:55:57','2015-06-30 14:55:57'),(21,'view-controle-faltas',NULL,NULL,'2015-06-30 14:55:57','2015-06-30 14:55:57'),(22,'create-aula',NULL,NULL,'2015-06-30 14:55:57','2015-06-30 14:55:57'),(23,'edit-aula',NULL,NULL,'2015-06-30 14:55:57','2015-06-30 14:55:57'),(24,'view-aula',NULL,NULL,'2015-06-30 14:55:57','2015-06-30 14:55:57'),(25,'list-aula',NULL,NULL,'2015-06-30 14:55:58','2015-06-30 14:55:58'),(26,'view-chamada',NULL,NULL,'2015-06-30 14:55:58','2015-06-30 14:55:58'),(27,'edit-chamada',NULL,NULL,'2015-06-30 14:55:58','2015-06-30 14:55:58'),(28,'view-own-turma',NULL,NULL,'2015-06-30 14:55:58','2015-06-30 14:55:58'),(29,'edit-own-turma',NULL,NULL,'2015-06-30 14:55:58','2015-06-30 14:55:58'),(30,'view-own-controle-faltas',NULL,NULL,'2015-06-30 14:55:58','2015-06-30 14:55:58'),(31,'view-own-aula',NULL,NULL,'2015-06-30 14:55:58','2015-06-30 14:55:58'),(32,'edit-own-aula',NULL,NULL,'2015-06-30 14:55:58','2015-06-30 14:55:58'),(33,'create-own-aula',NULL,NULL,'2015-06-30 14:55:58','2015-06-30 14:55:58'),(34,'view-own-chamada',NULL,NULL,'2015-06-30 14:55:58','2015-06-30 14:55:58'),(35,'edit-own-chamada',NULL,NULL,'2015-06-30 14:55:58','2015-06-30 14:55:58');
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
INSERT INTO `professores` VALUES (49,'2015-06-30 14:56:09','2015-06-30 14:56:09',2),(50,'2015-06-30 14:56:09','2015-06-30 14:56:09',2),(51,'2015-06-30 14:56:09','2015-06-30 14:56:09',2),(52,'2015-06-30 14:56:09','2015-06-30 14:56:09',3),(53,'2015-06-30 14:56:09','2015-06-30 14:56:09',2),(54,'2015-06-30 14:56:09','2015-06-30 14:56:09',5),(55,'2015-06-30 14:56:10','2015-06-30 14:56:10',1);
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
INSERT INTO `role_user` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1),(47,1),(48,1),(49,2),(50,2),(51,2),(52,2),(53,2),(54,2),(55,2),(49,3),(54,3),(55,3);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'aluno','Aluno',NULL,'2015-06-30 14:55:55','2015-06-30 14:55:55'),(2,'professor','Professor',NULL,'2015-06-30 14:55:55','2015-06-30 14:55:55'),(3,'coordenador','Coordenador',NULL,'2015-06-30 14:55:55','2015-06-30 14:55:55');
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
  PRIMARY KEY (`id`),
  KEY `turmas_unidade_curricular_id_foreign` (`unidade_curricular_id`),
  CONSTRAINT `turmas_unidade_curricular_id_foreign` FOREIGN KEY (`unidade_curricular_id`) REFERENCES `unidades_curriculares` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turmas`
--

LOCK TABLES `turmas` WRITE;
/*!40000 ALTER TABLE `turmas` DISABLE KEYS */;
INSERT INTO `turmas` VALUES (1,'S032N','2015-02-19','2015-07-14',3,'2015-06-30 14:56:10','2015-06-30 14:56:10','Noite'),(2,'S049','2014-07-31','2014-12-18',1,'2015-06-30 14:56:10','2015-06-30 14:56:10','Noite'),(3,'S049N','2015-02-19','2015-07-14',1,'2015-06-30 14:56:10','2015-06-30 14:56:10','Noite'),(4,'S075N','2014-07-31','2014-12-18',5,'2015-06-30 14:56:10','2015-06-30 14:56:10','Noite'),(5,'S087N','2014-02-17','2014-07-15',2,'2015-06-30 14:56:10','2015-06-30 14:56:10','Noite'),(6,'S091N','2015-02-19','2015-07-14',4,'2015-06-30 14:56:10','2015-06-30 14:56:10','Noite');
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
INSERT INTO `unidades_curriculares` VALUES (1,'S049 - Modelagem de Banco de Dados',70,'S049','2015-06-30 14:56:10','2015-06-30 14:56:10'),(2,'S087- Sistemas Operacionais',70,'S087','2015-06-30 14:56:10','2015-06-30 14:56:10'),(3,'S032 - Fundamentos de Sistemas de Informação',70,'S032','2015-06-30 14:56:10','2015-06-30 14:56:10'),(4,'S091 - Técnicas de Programação',70,'S091','2015-06-30 14:56:10','2015-06-30 14:56:10'),(5,'S075 - Sistema de Gerenciamento de Banco de Dados',70,'S075','2015-06-30 14:56:10','2015-06-30 14:56:10');
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
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'15726','ABNER BORDA FONSECA','abner_borda_fonseca@gmail.com','$2y$10$uxyxKzBm1aR6.vuEpzWOJ.3LatKwuUxy7Yv/wULDOZOZt4uYKbU.6',NULL,'2015-06-30 14:55:59','2015-06-30 14:55:59'),(2,'15722','ADRIAN RUBILAR LEMES CAETANO','adrian_rubilar_lemes_caetano@gmail.com','$2y$10$t1.ZFQkwOpT0AKJqaukDT.dhVDNztZMTsoc2eD39OF5siqCkWTch2',NULL,'2015-06-30 14:55:59','2015-06-30 14:55:59'),(3,'20569','ALEXANDRE GABIATTI VIEIRA','alexandre_gabiatti_vieira@gmail.com','$2y$10$/32nL1TlUybv0zlhzfIqKeBleZSGD5seft0Eis/pIrLp49mNdagAy',NULL,'2015-06-30 14:55:59','2015-06-30 14:55:59'),(4,'16049','ALEXSANDRO GIOVANNI DA SILVA DIAS','alexsandro_giovanni_da_silva_dias@gmail.com','$2y$10$3vE32NxBOdI1iJsr.rCFU.2ag75FDDxWNMzsf/xnkNfMz7.BdrZji',NULL,'2015-06-30 14:55:59','2015-06-30 14:55:59'),(5,'20628','ANA CARLA MESSIAS DE MOURA','ana_carla_messias_de_moura@gmail.com','$2y$10$RhO6oYCLPzfMaF0WGDeCrOMnSTcozwq576EfbvS3xAjmCWHYymzP.',NULL,'2015-06-30 14:55:59','2015-06-30 14:55:59'),(6,'20531','ANGELO VICTOR ISRAEL MUNIZ','angelo_victor_israel_muniz@gmail.com','$2y$10$s9WpY8fW3a1wRT7qF3Nqi.T1vUE3TOQg3TfHm/OaTyM1m2O5iOeDS',NULL,'2015-06-30 14:55:59','2015-06-30 14:55:59'),(7,'20579','BRUNO DA SILVA BRIXIUS','bruno_da_silva_brixius@gmail.com','$2y$10$Qx66SK6z3YmsjnPBEUh0quOfqcMbsm/3SS9qRGTn9Bx1BRTqgWWmm',NULL,'2015-06-30 14:56:00','2015-06-30 14:56:00'),(8,'17486','CRISTIANO DE MOURA','cristiano_de_moura@gmail.com','$2y$10$KBflVgdnUhBDBZ38VAh9/.6PiThae6T4NJ53p2pw1F6kLnjwNOQ.y',NULL,'2015-06-30 14:56:00','2015-06-30 14:56:00'),(9,'20624','DANIEL OLIVEIRA RODRIGUES','daniel_oliveira_rodrigues@gmail.com','$2y$10$QLJe3Aklwg6abtBkZt9ntuUfYtEgKmJZT/ubmJMTc6/FwYfI8uFD.',NULL,'2015-06-30 14:56:00','2015-06-30 14:56:00'),(10,'15717','DIONATA LEONEL MACHADO FERRAZ','dionata_leonel_machado_ferraz@gmail.com','$2y$10$Vt4yeugnyGfbiulQeY2WhOd4pSQrgg/o7d93Z8Jl64R.ip7uxmBam',NULL,'2015-06-30 14:56:00','2015-06-30 14:56:00'),(11,'14186','DOUGLAS COSTA DA ROCHA','douglas_costa_da_rocha@gmail.com','$2y$10$Z6nH2AiI5Kjmp9sYpwqA.e7GRE5awupofxYrQcCHAQcS3MnlBwL/u',NULL,'2015-06-30 14:56:00','2015-06-30 14:56:00'),(12,'17509','FABIANO BORBA VIANA FEIJÓ','fabiano_borba_viana_feijÓ@gmail.com','$2y$10$BKaAc9hGE5BixBFR8HLGq.UfJ1P5r6Y.0hCXKrHsAEHkeuzyUUhsK',NULL,'2015-06-30 14:56:01','2015-06-30 14:56:01'),(13,'19024','FELIPE DA SILVA PACHECO','felipe_da_silva_pacheco@gmail.com','$2y$10$HUUun0WR/Jk7QKPdO078NeJudrqosnOwK1iRd5Lpsm23TeLCWRa9O',NULL,'2015-06-30 14:56:01','2015-06-30 14:56:01'),(14,'19026','FERNANDO LEITE SZEZECINSKI','fernando_leite_szezecinski@gmail.com','$2y$10$kFetE3IA7Xzbxc93b0qnzOxK7VjGvaJh6Bc0ZnTLAo5/GLPtyuZxq',NULL,'2015-06-30 14:56:01','2015-06-30 14:56:01'),(15,'15639','GUILHERME PEREIRA SILVEIRA','guilherme_pereira_silveira@gmail.com','$2y$10$8HY1o892LZxy/qw5cwZEE.Qt9pixEGUwt4k4Zy8NbxF4MDf4PPFkW',NULL,'2015-06-30 14:56:01','2015-06-30 14:56:01'),(16,'19020','LEONARDO GOMES MONTEIRO MIGUEIS CERQUEIRA','leonardo_gomes_monteiro_migueis_cerqueira@gmail.com','$2y$10$Am53jNsx/3edFvAnX6Z7vuddwFPQRfAzcHI.yH2plwQw1seW8zdRW',NULL,'2015-06-30 14:56:01','2015-06-30 14:56:01'),(17,'8059','LOGAN OLIVEIRA LOUREIRO','logan_oliveira_loureiro@gmail.com','$2y$10$0S7uvzGn/34ZtfdcO/d97OOEysY3rX4mhgwTFt/bUE4uZn4y4iO8e',NULL,'2015-06-30 14:56:01','2015-06-30 14:56:01'),(18,'15701','NÍKOLAS MARTINS VARGAS','nÍkolas_martins_vargas@gmail.com','$2y$10$SNDufUWuHgnLXlZW/MRi8O305IwQcIN/8D7itbsguORr2tQcc1XtG',NULL,'2015-06-30 14:56:02','2015-06-30 14:56:02'),(19,'15719','PEDRO LUIZ SROCZYNSKI','pedro_luiz_sroczynski@gmail.com','$2y$10$E4z7Naoj.mp9dqpKL01xMOhqppAJ.DCxaIhODDMNP9A5GrjVjFtqa',NULL,'2015-06-30 14:56:02','2015-06-30 14:56:02'),(20,'13886','RAFAEL LOPES SANTOS','rafael_lopes_santos@gmail.com','$2y$10$U.iXPUH28JE0VY/57HIOkOFRQLQ3OwdjcqiGB80IcaGlqz/5eNHZu',NULL,'2015-06-30 14:56:02','2015-06-30 14:56:02'),(21,'17513','RENAN AGUIAR OLIVEIRA','renan_aguiar_oliveira@gmail.com','$2y$10$/11mDadH3LchOFlE2TXKAe0qrjTevAbtGel32DyJdaJigVv2WUEDi',NULL,'2015-06-30 14:56:02','2015-06-30 14:56:02'),(22,'15737','STEFANI SILVA DE LIMA','stefani_silva_de_lima@gmail.com','$2y$10$18/GtUZTFZ.myJpdaR4kROmQhGHlkA4tP1tXE7M6HmKGdvAli3rem',NULL,'2015-06-30 14:56:02','2015-06-30 14:56:02'),(23,'20619','VITHOR SAMPAIO MARQUES','vithor_sampaio_marques@gmail.com','$2y$10$axdQvPZtHRG6t1AKnwZcsOk.KRkj/fWZUsIxLfk76S0lDBAW4dwiu',NULL,'2015-06-30 14:56:03','2015-06-30 14:56:03'),(24,'20580','VITOR DA SILVA BRIXIUS','vitor_da_silva_brixius@gmail.com','$2y$10$4CnCmRrW.62/vKbftv8Vm.Bn3aIFchoVWKAd1C8wyFGLs/.l9zOF.',NULL,'2015-06-30 14:56:03','2015-06-30 14:56:03'),(25,'16102','WELLYNTON LOPES TOZON','wellynton_lopes_tozon@gmail.com','$2y$10$XBDkcS7U7NP6FWOJA4/ULe.h9OgzA9dUTQhU9ePmWIGxZOm3kfJ4m',NULL,'2015-06-30 14:56:03','2015-06-30 14:56:03'),(26,'20537','WILLIAN FERREIRA PEIXOTO','willian_ferreira_peixoto@gmail.com','$2y$10$ViODSFASaHX4coj.jHCkv.YJIbG/Q49crm3g4dveBAmb5XsawVUY2',NULL,'2015-06-30 14:56:03','2015-06-30 14:56:03'),(27,'20525','ALAN PINHEIRO DOS SANTOS','alan_pinheiro_dos_santos@gmail.com','$2y$10$7Kiwq.zJyM.icPuRNx7ckem64rK213g4y/4cVlKsDHSyGNGEy6tje',NULL,'2015-06-30 14:56:03','2015-06-30 14:56:03'),(28,'20565','ANDERSON GUIMARAES MACHADO','anderson_guimaraes_machado@gmail.com','$2y$10$/qcNzu2ZVQREO6.tjlTSuec9g.JKqAMjLucsprW1bV43h1aTJaxzq',NULL,'2015-06-30 14:56:04','2015-06-30 14:56:04'),(29,'20635','ARTHUR HENRIQUE MENDES BERTE','arthur_henrique_mendes_berte@gmail.com','$2y$10$zPC6E9AuSS8f4TpjjkaeZ.Y.m0K9D.H9AarDHZKbHLXse6zZ0XZ.C',NULL,'2015-06-30 14:56:04','2015-06-30 14:56:04'),(30,'20532','CASSIO LANGLOIS MACHADO','cassio_langlois_machado@gmail.com','$2y$10$DBXAl42LGjF3nsA7AfYuKuOC3K3BltBOP/hXhjaKGYau/ls5Hg1Di',NULL,'2015-06-30 14:56:04','2015-06-30 14:56:04'),(31,'20562','DEIVIDI OLIVEIRA DA SILVA','deividi_oliveira_da_silva@gmail.com','$2y$10$IQefiMzm3eO8nS/W/jau8OTUL3Nmaqd7eIneYM7FGwCsvfb5VJWXi',NULL,'2015-06-30 14:56:04','2015-06-30 14:56:04'),(32,'20529','FRANCISCO PEDRO FERNANDES ALMEIDA','francisco_pedro_fernandes_almeida@gmail.com','$2y$10$wWmlRkAgIP/dXAOXg9loY.2poHQ1OPzdj0ARrYVwJP4OuofJEv2AC',NULL,'2015-06-30 14:56:04','2015-06-30 14:56:04'),(33,'5901','GABRIEL GONÇALVES STANOSKI','gabriel_gonÇalves_stanoski@gmail.com','$2y$10$F3tAkp10xSi3gEpbnfHNQ.zMk..cFQrnmT3pCVo3NFIBkCW3Nyjxe',NULL,'2015-06-30 14:56:04','2015-06-30 14:56:04'),(34,'20566','GUILHERME DOS SANTOS SILVA','guilherme_dos_santos_silva@gmail.com','$2y$10$YLNt8g3u2/r6AYvAGa/yxutSLpXCoBaz/mzBuGpY1dfAxpIMuQ8I2',NULL,'2015-06-30 14:56:05','2015-06-30 14:56:05'),(35,'20522','JHONATAS DAVI DE SOUZA','jhonatas_davi_de_souza@gmail.com','$2y$10$43b8q.2FNO81KFnKR14APeOmdIrf3TAHan7Ij3UkE9drnt/846qKi',NULL,'2015-06-30 14:56:05','2015-06-30 14:56:05'),(36,'20570','LEONARDO NUNES','leonardo_nunes@gmail.com','$2y$10$riTQu8EnvZ6b/m3RVcLJ.esnCGVs45Zh5XiV98QRHsTRFaSOHoSAW',NULL,'2015-06-30 14:56:05','2015-06-30 14:56:05'),(37,'20519','LUCIANO GAMA MEDEIROS','luciano_gama_medeiros@gmail.com','$2y$10$6HaByzZSMA9VBFjYJ8pUK.zdcVYD3zHgtUEjO.Db9X7Zx6Ok5soHq',NULL,'2015-06-30 14:56:05','2015-06-30 14:56:05'),(38,'20512','LUIZ CARLOS TORRES DE CASTILHOS','luiz_carlos_torres_de_castilhos@gmail.com','$2y$10$cNuBznTOpkcj.75Hiv3Ziu9KidGpkduCiezXcb27QYmHGYXn5WPhi',NULL,'2015-06-30 14:56:06','2015-06-30 14:56:06'),(39,'20505','RAFAEL CAMMARANO GUGLIELMI','rafael_cammarano_guglielmi@gmail.com','$2y$10$05nZbMw7XVq/AvLB4hkZKuxjv0k2wt9sNHgK3RpDR2NUFOgimyy8S',NULL,'2015-06-30 14:56:06','2015-06-30 14:56:06'),(40,'21365','BEATRICE VICTORIA FERNANDES','beatrice_victoria_fernandes@gmail.com','$2y$10$jjzE2TAl/ATWTsJmVmqNIeUWBvcBz53BXVfwx4DhcOzJWSN/WDGbu',NULL,'2015-06-30 14:56:06','2015-06-30 14:56:06'),(41,'21367','BRUNO PRATES BOFF','bruno_prates_boff@gmail.com','$2y$10$LmpI.fYzAVNi4UrMzuUCb./nkZ/UhaT8GdjbA6eAzANBpMfDcqszK',NULL,'2015-06-30 14:56:07','2015-06-30 14:56:07'),(42,'258','FAGNER DAVID NUNES','fagner_david_nunes@gmail.com','$2y$10$oydtNuCrA0kr6xdWUrh5ouVQj7oawsW6KsYyO4QzFFzAQ7g91Ozm6',NULL,'2015-06-30 14:56:07','2015-06-30 14:56:07'),(43,'21391','FELIPE AMANCIO VIEIRA','felipe_amancio_vieira@gmail.com','$2y$10$P793spH5IU0EKkuhFfS9YefrXnLw8fPb9o2LGG7IJ161t2lnKKDB6',NULL,'2015-06-30 14:56:07','2015-06-30 14:56:07'),(44,'21364','GREGORY PITTOL BORIN','gregory_pittol_borin@gmail.com','$2y$10$nFdsoDoAdq0HuNRE9RHfFODNKhkaAnty0s75yfv0OwbVL7mdkbu/6',NULL,'2015-06-30 14:56:07','2015-06-30 14:56:07'),(45,'21393','GUILHERME NEUMANN','guilherme_neumann@gmail.com','$2y$10$cXa1Xl4m6dLST7FChJTTqOFVPfkWhOS5fQlM7nL/SFDykUA5qBgs2',NULL,'2015-06-30 14:56:07','2015-06-30 14:56:07'),(46,'23090','JULIANO ANTÔNIO DA ROSA SOARES','juliano_antÔnio_da_rosa_soares@gmail.com','$2y$10$q6bEw75x5aygMlGYUWeUt.4Wk6dzSB/zK0oLkMKWCGMVxMSSy02ui',NULL,'2015-06-30 14:56:07','2015-06-30 14:56:07'),(47,'14216','ROBSON LUIS RAMOS','robson_luis_ramos@gmail.com','$2y$10$02KfYmK0tRZTqoruSEUn3ejtswKtKFSZCuuoW44tdg8woFsNR8O3e',NULL,'2015-06-30 14:56:08','2015-06-30 14:56:08'),(48,'23301','NATANIEL LEONAM  DA COSTA GOMES','nataniel_leonam__da_costa_gomes@gmail.com','$2y$10$fkwJa31jO00Krjhlz5dxqORpQF5ftUrJI0nrPglnDnjW6GlbuaTW6',NULL,'2015-06-30 14:56:08','2015-06-30 14:56:08'),(49,'1234','Valderi R. Q. Leithardt','valderi_r._q._leithardt@gmail.com','$2y$10$AQd4a4f4PBNibS3GRxGu8urwTHJiYztFVknSwC4sB3ddxqrXu12qS',NULL,'2015-06-30 14:56:08','2015-06-30 14:56:08'),(50,'2345','Gustavo B. Brand','gustavo_b._brand@gmail.com','$2y$10$ORMY4qaFoe5jGMiGa5iciuTD9XxwVz15bOsMrZiwZ9AM45BL8NiFu',NULL,'2015-06-30 14:56:08','2015-06-30 14:56:08'),(51,'3456','Dione Taschetto','dione_taschetto@gmail.com','$2y$10$zZnG2GIpjkh05uzSsyvPd.0DAs6EX.Vcip3fFrLUd5EHIvr2yt2TC',NULL,'2015-06-30 14:56:08','2015-06-30 14:56:08'),(52,'4567','Terezinha I. M.Torres','terezinha_i._m.torres@gmail.com','$2y$10$pX8XUaEq9Hoci3UJF6KVt.rgqntEkouwviRY0R2E83Jq8yOAOoGrS',NULL,'2015-06-30 14:56:08','2015-06-30 14:56:08'),(53,'5678','Guilherme Dal Bianco','guilherme_dal_bianco@gmail.com','$2y$10$ArE74fuExelgXw5QgFZ5wuPMu3CUHCCYkeqaa5BIUZDGsLOjzl3au',NULL,'2015-06-30 14:56:08','2015-06-30 14:56:08'),(54,'7889','Leandro José Cassol','leandro_josé_cassol@gmail.com','$2y$10$nHZJqpYLVMW6ZrpMctYf5OP1SSp.IpLSOFFzXuF8T7P8ruHPrlCuG',NULL,'2015-06-30 14:56:08','2015-06-30 14:56:08'),(55,'4844','Alexandre Gaspary Haupt','alexandre_gaspary_haupt@gmail.com','$2y$10$ZNoLh3U/.YggJDOBMfiD6.I6eTL7V9VTpw/7qmr8IcyrbQgMyWZQm',NULL,'2015-06-30 14:56:08','2015-06-30 14:56:08');
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

-- Dump completed on 2015-06-30  8:58:31