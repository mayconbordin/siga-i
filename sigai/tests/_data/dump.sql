-- MySQL dump 10.13  Distrib 5.5.43, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: sigai_test
-- ------------------------------------------------------
-- Server version	5.5.43-0+deb7u1

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
INSERT INTO `alunos` VALUES (1,'2015-06-30 02:34:48','2015-06-30 02:34:48'),(2,'2015-06-30 02:34:49','2015-06-30 02:34:49'),(3,'2015-06-30 02:34:49','2015-06-30 02:34:49'),(4,'2015-06-30 02:34:49','2015-06-30 02:34:49'),(5,'2015-06-30 02:34:49','2015-06-30 02:34:49'),(6,'2015-06-30 02:34:49','2015-06-30 02:34:49'),(7,'2015-06-30 02:34:50','2015-06-30 02:34:50'),(8,'2015-06-30 02:34:50','2015-06-30 02:34:50'),(9,'2015-06-30 02:34:50','2015-06-30 02:34:50'),(10,'2015-06-30 02:34:50','2015-06-30 02:34:50'),(11,'2015-06-30 02:34:51','2015-06-30 02:34:51'),(12,'2015-06-30 02:34:51','2015-06-30 02:34:51'),(13,'2015-06-30 02:34:51','2015-06-30 02:34:51'),(14,'2015-06-30 02:34:51','2015-06-30 02:34:51'),(15,'2015-06-30 02:34:52','2015-06-30 02:34:52'),(16,'2015-06-30 02:34:52','2015-06-30 02:34:52'),(17,'2015-06-30 02:34:52','2015-06-30 02:34:52'),(18,'2015-06-30 02:34:53','2015-06-30 02:34:53'),(19,'2015-06-30 02:34:54','2015-06-30 02:34:54'),(20,'2015-06-30 02:34:54','2015-06-30 02:34:54'),(21,'2015-06-30 02:34:54','2015-06-30 02:34:54'),(22,'2015-06-30 02:34:55','2015-06-30 02:34:55'),(23,'2015-06-30 02:34:55','2015-06-30 02:34:55'),(24,'2015-06-30 02:34:55','2015-06-30 02:34:55'),(25,'2015-06-30 02:34:55','2015-06-30 02:34:55'),(26,'2015-06-30 02:34:56','2015-06-30 02:34:56'),(27,'2015-06-30 02:34:56','2015-06-30 02:34:56'),(28,'2015-06-30 02:34:57','2015-06-30 02:34:57'),(29,'2015-06-30 02:34:57','2015-06-30 02:34:57'),(30,'2015-06-30 02:34:57','2015-06-30 02:34:57'),(31,'2015-06-30 02:34:58','2015-06-30 02:34:58'),(32,'2015-06-30 02:34:58','2015-06-30 02:34:58'),(33,'2015-06-30 02:34:58','2015-06-30 02:34:58'),(34,'2015-06-30 02:34:59','2015-06-30 02:34:59'),(35,'2015-06-30 02:34:59','2015-06-30 02:34:59'),(36,'2015-06-30 02:34:59','2015-06-30 02:34:59'),(37,'2015-06-30 02:34:59','2015-06-30 02:34:59'),(38,'2015-06-30 02:35:00','2015-06-30 02:35:00'),(39,'2015-06-30 02:35:00','2015-06-30 02:35:00'),(40,'2015-06-30 02:35:00','2015-06-30 02:35:00'),(41,'2015-06-30 02:35:00','2015-06-30 02:35:00'),(42,'2015-06-30 02:35:01','2015-06-30 02:35:01'),(43,'2015-06-30 02:35:01','2015-06-30 02:35:01'),(44,'2015-06-30 02:35:02','2015-06-30 02:35:02'),(45,'2015-06-30 02:35:02','2015-06-30 02:35:02'),(46,'2015-06-30 02:35:02','2015-06-30 02:35:02'),(47,'2015-06-30 02:35:02','2015-06-30 02:35:02'),(48,'2015-06-30 02:35:03','2015-06-30 02:35:03');
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
INSERT INTO `aulas` VALUES (1,'2014-08-05',0,'Introdução a disciplina. Plano de ensino. Situação do tema banco de dados dentro da computação. Arquivos convencionais, problemas; conceitos de banco de dados (BD) e SGBD: noções gerais de um sistema de BD; arquitetura de SGBD; gerência de bancos funções básicas de SGBD; usuários de BD;',2,'2015-06-30 02:35:22','2015-06-30 02:35:22',0,''),(2,'2014-08-12',0,'Abstração de dados.  Modelo conceitual; modelo lógico; modelo físico. Introdução a modelagem conceitual.  modelo de dados entidade relacionamento (ER)',2,'2015-06-30 02:35:22','2015-06-30 02:35:22',0,''),(3,'2014-08-19',0,'Modelagem conceitual: objetivos; propriedades de um modelo conceitual; notações. Estudo de caso.',2,'2015-06-30 02:35:22','2015-06-30 02:35:22',0,'NULL'),(4,'2014-08-26',0,'modelagem conceitual (mecanismos de abstração; classificação/instanciação; generalização/especialização;). Exercícios de fixação. Descrição do trabalho G1.',2,'2015-06-30 02:35:22','2015-06-30 02:35:22',0,'NULL'),(5,'2014-09-02',0,'Modelagem conceitual (restrições de integridade, construtores, notação diagramática, semelhanças e diferenças entre modelos conceituais).',2,'2015-06-30 02:35:22','2015-06-30 02:35:22',0,'NULL'),(6,'2014-09-09',0,'Projeto de banco de dados (transformação de diagramas  conceituais para modelos de banco de dados I ). Exercícios práticos.',2,'2015-06-30 02:35:22','2015-06-30 02:35:22',0,'NULL'),(7,'2014-09-16',0,'Projeto de banco de dados (transformação de diagramas conceituais para modelos de bancos de dados II). Exercícios práticos.',2,'2015-06-30 02:35:22','2015-06-30 02:35:22',0,'NULL'),(8,'2014-09-23',0,'Apresentação dos trabalhos. Revisão do conteúdo para a avaliação. Exercícios práticos.',2,'2015-06-30 02:35:22','2015-06-30 02:35:22',0,'NULL'),(9,'2014-09-30',0,'Avaliação teórica/prática grau 1.',2,'2015-06-30 02:35:23','2015-06-30 02:35:23',0,'NULL'),(10,'2014-10-07',0,'Entrega das notas e correção da prova. Descrição do trabalho.Introdução à normalização de modelos.',2,'2015-06-30 02:35:23','2015-06-30 02:35:23',0,'NULL'),(11,'2014-10-14',0,'Estudo de caso da normalização de modelos. Linguagem de definição de dados (DDL). Linguagem de modelagem de banco de dados.  Exercícios práticos.',2,'2015-06-30 02:35:23','2015-06-30 02:35:23',0,'NULL'),(12,'2014-10-21',0,'Manipulação de dados (DML). Andamento do trabalho.',2,'2015-06-30 02:35:23','2015-06-30 02:35:23',0,'NULL'),(13,'2014-10-28',0,'Restrições de integridade. Exercícios práticos.',2,'2015-06-30 02:35:23','2015-06-30 02:35:23',0,'NULL'),(14,'2014-11-04',0,'',2,'2015-06-30 02:35:23','2015-06-30 02:35:23',0,'NULL'),(15,'2014-11-11',0,'',2,'2015-06-30 02:35:24','2015-06-30 02:35:24',0,'NULL'),(16,'2014-11-18',0,'',2,'2015-06-30 02:35:25','2015-06-30 02:35:25',0,'NULL'),(17,'2014-11-25',0,'',2,'2015-06-30 02:35:25','2015-06-30 02:35:25',0,'NULL'),(18,'2014-12-02',0,'',2,'2015-06-30 02:35:25','2015-06-30 02:35:25',0,'NULL'),(19,'2014-12-09',0,'',2,'2015-06-30 02:35:25','2015-06-30 02:35:25',0,'NULL'),(20,'2014-12-16',0,'',2,'2015-06-30 02:35:25','2015-06-30 02:35:25',0,'NULL'),(21,'2014-02-20',0,'Introdução aos SO\'s: Apresentação da disciplina: conteúdo, metodologia de ensino, critérios de avaliação, cronograma, material apoio (livros).',5,'2015-06-30 02:35:25','2015-06-30 02:35:25',0,'NULL'),(22,'2014-02-27',0,'Introdução aos Sistemas Operacionais: Estudo das definições de sistema operacional (SO), objetivos, visões.',5,'2015-06-30 02:35:25','2015-06-30 02:35:25',0,'NULL'),(23,'2014-03-06',0,'Gerência de entrada e Saída: controle e gerenciamento realizado pelo sistema operacional: Multiprogramação.',5,'2015-06-30 02:35:25','2015-06-30 02:35:25',0,'NULL'),(24,'2014-03-13',0,'Estudo dos tipos de sistemas operacionais: monoprogramáveis, multiprogramaveis e sistemas com múltiplos processadores.',5,'2015-06-30 02:35:25','2015-06-30 02:35:25',0,'NULL'),(25,'2014-03-20',0,'Conceitos de Deadlock, prevenção e tratamento em Sistemas Operacionais.',5,'2015-06-30 02:35:25','2015-06-30 02:35:25',0,'NULL'),(26,'2014-03-27',0,'Estudo das estruturas de um sistema operacional: sistemas monolíticos, sistemas em camadas e cliente/servidor.',5,'2015-06-30 02:35:25','2015-06-30 02:35:25',0,'NULL'),(27,'2014-04-03',0,'Estudo dos sistemas multiprogramáveis: definição, conceitos, gerência de filas, tipos (cooperativa e preemptiva), proteção.',5,'2015-06-30 02:35:25','2015-06-30 02:35:25',0,'NULL'),(28,'2014-04-10',0,'Estudo de processos: modelos de processos, estados de um process, mudanças de estados entre processos, subprocessos e threads.',5,'2015-06-30 02:35:25','2015-06-30 02:35:25',0,'NULL'),(29,'2014-04-17',0,'Especificação de tarefas e prioridades.',5,'2015-06-30 02:35:25','2015-06-30 02:35:25',0,'NULL'),(30,'2014-04-23',0,'Introdução a escalonadores',5,'2015-06-30 02:35:25','2015-06-30 02:35:25',0,'NULL'),(31,'2014-04-24',0,'Atividades extraclasse: exercícios e trabalhos individuais.',5,'2015-06-30 02:35:26','2015-06-30 02:35:26',0,'NULL'),(32,'2014-05-08',0,'Correção de exercício, revisão de conteúdo.',5,'2015-06-30 02:35:26','2015-06-30 02:35:26',0,'NULL'),(33,'2014-05-15',0,'Avaliação de grau 1 (G1).',5,'2015-06-30 02:35:26','2015-06-30 02:35:26',0,'NULL'),(34,'2014-05-22',0,'Analisar os resultados da avaliação G1. Gerência de processos: introdução, descritor de processo, controle de processos, processos de sistema, escalonamento de processos',5,'2015-06-30 02:35:26','2015-06-30 02:35:26',0,'NULL'),(35,'2014-05-29',0,'Gerência de Memória: introdução, endereços lógicos e fisicos, formas de alicação, swapping.',5,'2015-06-30 02:35:26','2015-06-30 02:35:26',0,'NULL'),(36,'2014-06-05',0,'Memória virtual: funcionamento da paginação por demanda, substituição de páginas, algoritmos de substituição de páginas, alocação de quadros, trashing.',5,'2015-06-30 02:35:26','2015-06-30 02:35:26',0,'NULL'),(37,'2014-06-12',0,'Programação concorrente: definição, motivação, especificação de paralelismo, problema da seção crítica, semáforos, mensagens, visão geral e comparação, paralisação (deadlock).',5,'2015-06-30 02:35:26','2015-06-30 02:35:26',0,'NULL'),(38,'2014-06-26',0,'Elaboração de exercícios e correção.',5,'2015-06-30 02:35:26','2015-06-30 02:35:26',0,'NULL'),(39,'2014-07-03',0,'Sistema de Arquivos: Introdução, nomes de arquivos, comandos, árvore de diretórios do SO, discos (particionamento e formatação), acesso a arquivos, atributos, controle e gerenciamento.',5,'2015-06-30 02:35:26','2015-06-30 02:35:26',0,'NULL'),(40,'2014-07-04',0,'Apresentação de trabalhos (estudo de caso) de sistemas operacionais.',5,'2015-06-30 02:35:26','2015-06-30 02:35:26',0,'NULL'),(41,'2014-07-10',0,'Avaliação Grau 2. Divulgação de resultados parciais, revisão e prova de substituição.',5,'2015-06-30 02:35:26','2015-06-30 02:35:26',0,'NULL'),(42,'2015-02-20',0,'Introdução a disciplina. Plano de ensino. Situação do tema banco de dados dentro da computação. Arquivos convencionais, problemas; conceitos de banco de dados (BD) e SGBD: noções gerais de um sistema de BD;',3,'2015-06-30 02:35:26','2015-06-30 02:35:26',0,'NULL'),(43,'2015-02-27',0,'Arquitetura de SGBD; gerência de bancos funções básicas de SGBD; usuários de BD; Abstração de dados. modelo lógico; modelo físico.  Introdução a modelagem conceitual.  modelo de dados entidade relacionamento (ER). Processo de projeto e Implementação de BD.',3,'2015-06-30 02:35:26','2015-06-30 02:35:26',0,''),(44,'2015-03-06',0,'Modelos de dados; Modelagem conceitual: objetivos; propriedades de um modelo conceitual; notações. Modelo entidade relacionamento (ER); Agregação/Desagregação.  Estudo de caso.',3,'2015-06-30 02:35:26','2015-06-30 02:35:26',0,'NULL'),(45,'2015-03-13',0,'Modelo de dados orientado a objetos (OO) , Modelagem conceitual (mecanismos de abstração; classificação/instanciação; generalização/especialização;).  Exercícios de fixação.',3,'2015-06-30 02:35:26','2015-06-30 02:35:26',0,'NULL'),(46,'2015-03-20',0,'Restrições de integridade, Construtores, Notação diagramática, Semelhanças e diferenças entre modelos conceituais).',3,'2015-06-30 02:35:26','2015-06-30 02:35:26',0,'NULL'),(47,'2015-03-27',0,'Projeto de banco de dados (transformação de diagramas  conceituais para modelos de banco de dados I ). Exercícios práticos.',3,'2015-06-30 02:35:26','2015-06-30 02:35:26',0,'NULL'),(48,'2015-04-10',0,'Estudo de caso da normalização de modelos.',3,'2015-06-30 02:35:26','2015-06-30 02:35:26',0,''),(49,'2015-04-17',0,'Revisão do conteúdo para a avaliação. Exercícios práticos.',3,'2015-06-30 02:35:26','2015-06-30 02:35:26',0,''),(50,'2015-04-20',0,'Atividade Extraclasse:\".Exercícios de normalização e revisão para prova\"',3,'2015-06-30 02:35:26','2015-06-30 02:35:26',0,''),(51,'2015-04-24',0,'Avaliação teórica/prática grau 1.',3,'2015-06-30 02:35:26','2015-06-30 02:35:26',0,'NULL'),(52,'2015-05-08',0,'Entrega das notas e correção da prova. Descrição do trabalho. Linguagem de definição de dados (DDL). Linguagem de modelagem de banco de dados.',3,'2015-06-30 02:35:26','2015-06-30 02:35:26',0,'NULL'),(53,'2015-05-15',0,'Linguagem de manipulação de dados (DML)  interativa.',3,'2015-06-30 02:35:27','2015-06-30 02:35:27',0,'NULL'),(54,'2015-05-22',0,'Restrições de integridade. Exercícios práticos.',3,'2015-06-30 02:35:27','2015-06-30 02:35:27',0,'NULL'),(55,'2015-05-29',0,'Linguagem de manipulação de dados embutida, restrições de integridade. Exercícios práticos.',3,'2015-06-30 02:35:27','2015-06-30 02:35:27',0,'NULL'),(56,'2015-06-05',0,'Especificação de gatilhos, asserções e procedimentos. Exercícios práticos.',3,'2015-06-30 02:35:27','2015-06-30 02:35:27',0,'NULL'),(57,'2015-06-12',0,'Álgebra relacional.',3,'2015-06-30 02:35:27','2015-06-30 02:35:27',0,'NULL'),(58,'2015-06-19',0,'Revisão para prova G2.',3,'2015-06-30 02:35:27','2015-06-30 02:35:27',0,'NULL'),(59,'2015-06-26',0,'Avaliação teórica/prática grau 2.',3,'2015-06-30 02:35:27','2015-06-30 02:35:27',0,'NULL'),(60,'2015-07-03',0,'Entrega das notas e correção da prova.  Revisão para prova de substituição.',3,'2015-06-30 02:35:27','2015-06-30 02:35:27',0,'NULL'),(61,'2015-07-10',0,'Prova de substituição. Entrega das notas finais e correção da prova.',3,'2015-06-30 02:35:27','2015-06-30 02:35:27',0,'NULL'),(62,'2015-02-25',0,'Apresentação da disciplina. Introdução às técnicas de programação.',6,'2015-06-30 02:35:27','2015-06-30 02:35:27',0,'NULL'),(63,'2015-03-04',0,'Orientação para projeto de classes',6,'2015-06-30 02:35:27','2015-06-30 02:35:27',0,'NULL'),(64,'2015-03-11',0,'Programação por contratos ? parte 1: especificações de interface precisas e verificáveis dos componentes de desenvolvimento de software. Exercícios práticos.',6,'2015-06-30 02:35:27','2015-06-30 02:35:27',0,'NULL'),(65,'2015-03-18',0,'Programação por contratos ? parte 2: especificações de interface precisas e verificáveis dos componentes de desenvolvimento de software. Exercícios práticos.',6,'2015-06-30 02:35:27','2015-06-30 02:35:27',0,'NULL'),(66,'2015-03-25',0,'Introdução ao Teste do Software. Exercícios práticos.',6,'2015-06-30 02:35:27','2015-06-30 02:35:27',0,''),(67,'2015-04-01',0,'Teste de software: validação de comportamento e unidades de trabalho. Descrição do  trabalho a ser desenvolvido.',6,'2015-06-30 02:35:27','2015-06-30 02:35:27',0,''),(68,'2015-04-08',0,'Ferramentas de apoio ao teste unitário (Junit). Exercícios práticos.',6,'2015-06-30 02:35:27','2015-06-30 02:35:27',0,''),(69,'2015-04-15',0,'Apresentação do trabalho e realização de um simulado referente ao G1.',6,'2015-06-30 02:35:28','2015-06-30 02:35:28',0,''),(70,'2015-04-22',0,'Avaliação G1',6,'2015-06-30 02:35:29','2015-06-30 02:35:29',0,''),(71,'2015-04-29',0,'Entrega das avaliações G1. Discussão das questões da prova. Programação concorrente: modelagem, threads, sincronização. Exercícios práticos.',6,'2015-06-30 02:35:29','2015-06-30 02:35:29',0,'NULL'),(72,'2015-05-06',0,'Aula prática ? programação concorrente.',6,'2015-06-30 02:35:29','2015-06-30 02:35:29',0,'NULL'),(73,'2015-05-13',0,'Programação concorrente: vivacidade e métodos protegidos. Descrição do trabalho G2.',6,'2015-06-30 02:35:29','2015-06-30 02:35:29',0,'NULL'),(74,'2015-05-20',0,'Programação concorrente: objeto condição e propriedades de concorrência.',6,'2015-06-30 02:35:30','2015-06-30 02:35:30',0,'NULL'),(75,'2015-05-27',0,'Arquitetura de Software: componentes do sistema e suas propriedades externas e seus relacionamentos com outros softwares.',6,'2015-06-30 02:35:30','2015-06-30 02:35:30',0,'NULL'),(76,'2015-06-03',0,'Modelo de desenvolvimento em camadas: domínios.',6,'2015-06-30 02:35:30','2015-06-30 02:35:30',0,'NULL'),(77,'2015-06-10',0,'Modelo de desenvolvimento em camadas: persistência e apresentação.',6,'2015-06-30 02:35:30','2015-06-30 02:35:30',0,'NULL'),(78,'2015-06-17',0,'Apresentação do trabalho e revisão para a avaliação  referente ao G2',6,'2015-06-30 02:35:30','2015-06-30 02:35:30',0,'NULL'),(79,'2015-06-24',0,'Avaliação G2',6,'2015-06-30 02:35:30','2015-06-30 02:35:30',0,'NULL'),(80,'2015-07-01',0,'Entrega das notas G2. Revisão para prova de substituição.',6,'2015-06-30 02:35:30','2015-06-30 02:35:30',0,'NULL'),(81,'2015-07-08',0,'Aplicação da prova de substituição G1 ou G2. Entrega das notas.',6,'2015-06-30 02:35:30','2015-06-30 02:35:30',0,'NULL'),(82,'2015-02-19',0,'Plano de aula. Arquitetura de computadores. Conceitos de hardware e software. Sistemas numéricos de representação de dados e conversões. Exercícios',1,'2015-06-30 02:35:30','2015-06-30 02:35:30',0,'NULL'),(83,'2015-02-26',0,'Álgebra booleana. Contextualização do curso de ADS. Disciplinas que compõem a ciência da computação. Exercícios',1,'2015-06-30 02:35:30','2015-06-30 02:35:30',0,'NULL'),(84,'2015-03-05',0,'Conceitos e definições dos Sistemas de informação. Tipos de sistemas de informação. Exemplos de sistemas de informação.',1,'2015-06-30 02:35:30','2015-06-30 02:35:30',0,'NULL'),(85,'2015-03-12',0,'Introdução  à Abordagem sistêmica I.',1,'2015-06-30 02:35:30','2015-06-30 02:35:30',0,'NULL'),(86,'2015-03-19',0,'Abordagem sistêmica  I - Aula Prática.',1,'2015-06-30 02:35:30','2015-06-30 02:35:30',0,'NULL'),(87,'2015-03-26',0,'Conceitos da Abordagem sistêmica II',1,'2015-06-30 02:35:30','2015-06-30 02:35:30',0,'NULL'),(88,'2015-04-02',0,'Conceitos da Abordagem sistêmica II ? Aula Prática',1,'2015-06-30 02:35:30','2015-06-30 02:35:30',0,'NULL'),(89,'2015-04-09',0,'Revisão dos conteúdos (Exercícios).',1,'2015-06-30 02:35:30','2015-06-30 02:35:30',0,'NULL'),(90,'2015-04-16',0,'Avaliação Teórica ? G1 ? Individual.',1,'2015-06-30 02:35:31','2015-06-30 02:35:31',0,'NULL'),(91,'2015-04-23',0,'Correção avaliação e divulgação resultados, definição grupos de trabalho.  Estudo da aplicação da tecnologia da informação nas organizações  do papel da modelagem no desenvolvimento de SI.',1,'2015-06-30 02:35:31','2015-06-30 02:35:31',0,'NULL'),(92,'2015-04-30',0,'Sistemas de computação. Estudo de caso. Exercícios',1,'2015-06-30 02:35:31','2015-06-30 02:35:31',0,'NULL'),(93,'2015-05-07',0,'Sistema de gerenciamento de transação.',1,'2015-06-30 02:35:31','2015-06-30 02:35:31',0,'NULL'),(94,'2015-05-14',0,'Sistema de gerenciamento de transação -  Aula prática',1,'2015-06-30 02:35:31','2015-06-30 02:35:31',0,'NULL'),(95,'2015-05-21',0,'Sistemas de informação (Planejamento estratégico de TI), aplicação da tecnologia da informação.',1,'2015-06-30 02:35:31','2015-06-30 02:35:31',0,'NULL'),(96,'2015-05-28',0,'Gestão de sistemas de informação',1,'2015-06-30 02:35:31','2015-06-30 02:35:31',0,'NULL'),(97,'2015-06-11',0,'Modelagem no desenvolvimento de sistemas de informação.',1,'2015-06-30 02:35:31','2015-06-30 02:35:31',0,'NULL'),(98,'2015-06-18',0,'Seminários de apresentações. Exercícios de revisão',1,'2015-06-30 02:35:31','2015-06-30 02:35:31',0,'NULL'),(99,'2015-06-25',0,'Avaliação Teórica / prática ? G2.',1,'2015-06-30 02:35:31','2015-06-30 02:35:31',0,'NULL'),(100,'2015-07-02',0,'Revisão do conteúdo para a substituição de grau',1,'2015-06-30 02:35:31','2015-06-30 02:35:31',0,'NULL'),(101,'2015-07-09',0,'Divulgação de resultados parciais, substituição de grau e divulgação de resultados finais.',1,'2015-06-30 02:35:31','2015-06-30 02:35:31',0,'NULL'),(102,'2014-08-01',0,'Descrição do plano de ensino. Introdução à disciplina. Plano de ensino. Introdução a linguagem  SQL',4,'2015-06-30 02:35:31','2015-06-30 02:35:31',0,'NULL'),(103,'2014-08-08',0,'Consultas (SQL, linguagem de manipulação de dados). Exercícios de fixação',4,'2015-06-30 02:35:31','2015-06-30 02:35:31',0,'NULL'),(104,'2014-08-15',0,'Consultas (SQL, linguagem de definição de dados). Exercícios de fixação',4,'2015-06-30 02:35:31','2015-06-30 02:35:31',0,'NULL'),(105,'2014-08-22',0,'Consultas Avançadas (introdução a subselects).  Exercícios de fixação. Integração do SQL e com o  JAVA.  Exercícios de fixação',4,'2015-06-30 02:35:31','2015-06-30 02:35:31',0,'NULL'),(106,'2014-08-29',0,'Consultas Avançadas (subselects, group by).  Exercícios de fixação',4,'2015-06-30 02:35:31','2015-06-30 02:35:31',0,'NULL'),(107,'2014-09-05',0,'Triggers e Store. Exercícios de fixação',4,'2015-06-30 02:35:31','2015-06-30 02:35:31',0,'NULL'),(108,'2014-09-12',0,'Procedures. Exercícios de fixação',4,'2015-06-30 02:35:31','2015-06-30 02:35:31',0,'NULL'),(109,'2014-09-19',0,'Revisão para prova G1. Simulado',4,'2015-06-30 02:35:31','2015-06-30 02:35:31',0,'NULL'),(110,'2014-09-26',0,'Avaliação teórica prática referente ao G1',4,'2015-06-30 02:35:32','2015-06-30 02:35:32',0,'NULL'),(111,'2014-10-03',0,'Correção da prova. Cursores',4,'2015-06-30 02:35:32','2015-06-30 02:35:32',0,'NULL'),(112,'2014-10-10',0,'Cursores e Introdução a Transações',4,'2015-06-30 02:35:32','2015-06-30 02:35:32',0,'NULL'),(113,'2014-10-17',0,'Transação  (Recuperação de falhas, concorrência). Andamento do trabalho.',4,'2015-06-30 02:35:32','2015-06-30 02:35:32',0,'NULL'),(114,'2014-10-24',0,'Arquitetura de  Banco de Dados  Distribuídos; Gerência de Objetos;',4,'2015-06-30 02:35:32','2015-06-30 02:35:32',0,'NULL'),(115,'2014-10-31',0,'Semana acadêmica',4,'2015-06-30 02:35:32','2015-06-30 02:35:32',0,'NULL'),(116,'2014-11-07',0,'Otimização de Consultas.',4,'2015-06-30 02:35:32','2015-06-30 02:35:32',0,'NULL'),(117,'2014-11-14',0,'Introdução a  Data Warehouse  e Bussiness  Intelligence (Aplicações emergentes de banco de dados.)',4,'2015-06-30 02:35:32','2015-06-30 02:35:32',0,'NULL'),(118,'2014-11-21',0,'Apresentação do trabalho e revisão para prova G2',4,'2015-06-30 02:35:32','2015-06-30 02:35:32',0,'NULL'),(119,'2014-11-28',0,'Prova G2',4,'2015-06-30 02:35:32','2015-06-30 02:35:32',0,'NULL'),(120,'2014-12-05',0,'Revisão do conteúdo para substituição',4,'2015-06-30 02:35:32','2015-06-30 02:35:32',0,'NULL'),(121,'2014-12-12',0,'Prova de substituição',4,'2015-06-30 02:35:32','2015-06-30 02:35:32',0,'NULL');
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
INSERT INTO `chamadas` VALUES (1,1,21,1,1,1,1,'2015-06-30 02:35:32','2015-06-30 02:35:32'),(2,2,21,1,1,1,1,'2015-06-30 02:35:32','2015-06-30 02:35:32'),(3,27,21,1,1,1,1,'2015-06-30 02:35:32','2015-06-30 02:35:32'),(4,3,21,1,1,1,1,'2015-06-30 02:35:32','2015-06-30 02:35:32'),(5,5,21,1,1,1,1,'2015-06-30 02:35:32','2015-06-30 02:35:32'),(6,28,21,1,1,1,1,'2015-06-30 02:35:32','2015-06-30 02:35:32'),(7,6,21,1,1,1,1,'2015-06-30 02:35:33','2015-06-30 02:35:33'),(8,29,21,1,1,0,0,'2015-06-30 02:35:33','2015-06-30 02:35:33'),(9,30,21,1,1,1,0,'2015-06-30 02:35:33','2015-06-30 02:35:33'),(10,9,21,1,1,1,1,'2015-06-30 02:35:33','2015-06-30 02:35:33'),(11,31,21,1,1,1,1,'2015-06-30 02:35:33','2015-06-30 02:35:33'),(12,10,21,1,1,1,1,'2015-06-30 02:35:33','2015-06-30 02:35:33'),(13,11,21,1,1,1,1,'2015-06-30 02:35:33','2015-06-30 02:35:33'),(14,14,21,1,1,1,1,'2015-06-30 02:35:33','2015-06-30 02:35:33'),(15,32,21,1,1,1,1,'2015-06-30 02:35:33','2015-06-30 02:35:33'),(16,33,21,1,1,1,1,'2015-06-30 02:35:34','2015-06-30 02:35:34'),(17,34,21,1,1,1,0,'2015-06-30 02:35:34','2015-06-30 02:35:34'),(18,15,21,1,1,1,1,'2015-06-30 02:35:34','2015-06-30 02:35:34'),(19,35,21,0,0,0,0,'2015-06-30 02:35:34','2015-06-30 02:35:34'),(20,16,21,0,0,0,0,'2015-06-30 02:35:34','2015-06-30 02:35:34'),(21,36,21,1,1,1,1,'2015-06-30 02:35:34','2015-06-30 02:35:34'),(22,17,21,1,1,1,1,'2015-06-30 02:35:34','2015-06-30 02:35:34'),(23,37,21,1,1,1,1,'2015-06-30 02:35:34','2015-06-30 02:35:34'),(24,38,21,1,1,1,0,'2015-06-30 02:35:34','2015-06-30 02:35:34'),(25,18,21,1,1,1,1,'2015-06-30 02:35:35','2015-06-30 02:35:35'),(26,19,21,1,1,1,1,'2015-06-30 02:35:35','2015-06-30 02:35:35'),(27,39,21,1,1,1,1,'2015-06-30 02:35:35','2015-06-30 02:35:35'),(28,22,21,1,1,1,1,'2015-06-30 02:35:35','2015-06-30 02:35:35'),(29,25,21,1,1,1,1,'2015-06-30 02:35:35','2015-06-30 02:35:35'),(30,26,21,1,1,1,1,'2015-06-30 02:35:35','2015-06-30 02:35:35'),(31,1,23,1,1,1,1,'2015-06-30 02:35:35','2015-06-30 02:35:35'),(32,2,23,1,1,1,1,'2015-06-30 02:35:35','2015-06-30 02:35:35'),(33,27,23,1,1,1,1,'2015-06-30 02:35:35','2015-06-30 02:35:35'),(34,3,23,1,1,1,1,'2015-06-30 02:35:35','2015-06-30 02:35:35'),(35,5,23,0,1,1,1,'2015-06-30 02:35:35','2015-06-30 02:35:35'),(36,28,23,1,1,1,1,'2015-06-30 02:35:35','2015-06-30 02:35:35'),(37,6,23,1,1,1,1,'2015-06-30 02:35:35','2015-06-30 02:35:35'),(38,29,23,0,0,0,0,'2015-06-30 02:35:35','2015-06-30 02:35:35'),(39,30,23,1,1,1,1,'2015-06-30 02:35:35','2015-06-30 02:35:35'),(40,9,23,1,1,1,1,'2015-06-30 02:35:35','2015-06-30 02:35:35'),(41,31,23,1,1,1,1,'2015-06-30 02:35:36','2015-06-30 02:35:36'),(42,10,23,1,1,1,1,'2015-06-30 02:35:36','2015-06-30 02:35:36'),(43,11,23,1,1,1,1,'2015-06-30 02:35:36','2015-06-30 02:35:36'),(44,14,23,1,1,1,1,'2015-06-30 02:35:36','2015-06-30 02:35:36'),(45,32,23,0,0,0,0,'2015-06-30 02:35:36','2015-06-30 02:35:36'),(46,33,23,0,0,0,0,'2015-06-30 02:35:36','2015-06-30 02:35:36'),(47,34,23,0,1,1,1,'2015-06-30 02:35:36','2015-06-30 02:35:36'),(48,15,23,1,1,1,1,'2015-06-30 02:35:36','2015-06-30 02:35:36'),(49,35,23,0,0,0,0,'2015-06-30 02:35:36','2015-06-30 02:35:36'),(50,16,23,1,1,1,1,'2015-06-30 02:35:36','2015-06-30 02:35:36'),(51,36,23,1,1,1,1,'2015-06-30 02:35:36','2015-06-30 02:35:36'),(52,17,23,1,1,1,1,'2015-06-30 02:35:36','2015-06-30 02:35:36'),(53,37,23,0,0,0,0,'2015-06-30 02:35:36','2015-06-30 02:35:36'),(54,38,23,0,0,0,0,'2015-06-30 02:35:36','2015-06-30 02:35:36'),(55,18,23,1,1,1,1,'2015-06-30 02:35:36','2015-06-30 02:35:36'),(56,19,23,1,1,1,1,'2015-06-30 02:35:36','2015-06-30 02:35:36'),(57,39,23,0,1,1,1,'2015-06-30 02:35:36','2015-06-30 02:35:36'),(58,22,23,1,1,1,1,'2015-06-30 02:35:36','2015-06-30 02:35:36'),(59,25,23,1,1,1,1,'2015-06-30 02:35:36','2015-06-30 02:35:36'),(60,26,23,1,1,1,1,'2015-06-30 02:35:36','2015-06-30 02:35:36'),(61,1,24,1,1,1,1,'2015-06-30 02:35:36','2015-06-30 02:35:36'),(62,2,24,0,0,0,0,'2015-06-30 02:35:36','2015-06-30 02:35:36'),(63,27,24,1,1,1,1,'2015-06-30 02:35:37','2015-06-30 02:35:37'),(64,3,24,1,1,1,1,'2015-06-30 02:35:37','2015-06-30 02:35:37'),(65,5,24,1,1,1,1,'2015-06-30 02:35:37','2015-06-30 02:35:37'),(66,28,24,1,1,1,1,'2015-06-30 02:35:37','2015-06-30 02:35:37'),(67,6,24,1,1,1,1,'2015-06-30 02:35:37','2015-06-30 02:35:37'),(68,29,24,0,0,0,0,'2015-06-30 02:35:37','2015-06-30 02:35:37'),(69,30,24,1,1,1,1,'2015-06-30 02:35:37','2015-06-30 02:35:37'),(70,9,24,0,1,1,1,'2015-06-30 02:35:37','2015-06-30 02:35:37'),(71,31,24,1,1,1,1,'2015-06-30 02:35:37','2015-06-30 02:35:37'),(72,10,24,1,1,1,1,'2015-06-30 02:35:37','2015-06-30 02:35:37'),(73,11,24,1,1,1,1,'2015-06-30 02:35:37','2015-06-30 02:35:37'),(74,14,24,1,1,1,1,'2015-06-30 02:35:37','2015-06-30 02:35:37'),(75,32,24,0,0,0,0,'2015-06-30 02:35:37','2015-06-30 02:35:37'),(76,33,24,1,1,1,1,'2015-06-30 02:35:37','2015-06-30 02:35:37'),(77,34,24,1,1,1,1,'2015-06-30 02:35:37','2015-06-30 02:35:37'),(78,15,24,1,1,0,0,'2015-06-30 02:35:37','2015-06-30 02:35:37'),(79,35,24,0,0,0,0,'2015-06-30 02:35:37','2015-06-30 02:35:37'),(80,16,24,1,1,1,1,'2015-06-30 02:35:37','2015-06-30 02:35:37'),(81,36,24,1,1,1,1,'2015-06-30 02:35:37','2015-06-30 02:35:37'),(82,17,24,1,1,1,1,'2015-06-30 02:35:37','2015-06-30 02:35:37'),(83,37,24,0,0,0,0,'2015-06-30 02:35:37','2015-06-30 02:35:37'),(84,38,24,0,0,0,0,'2015-06-30 02:35:38','2015-06-30 02:35:38'),(85,18,24,1,1,1,1,'2015-06-30 02:35:38','2015-06-30 02:35:38'),(86,19,24,1,1,1,1,'2015-06-30 02:35:38','2015-06-30 02:35:38'),(87,39,24,0,1,1,1,'2015-06-30 02:35:38','2015-06-30 02:35:38'),(88,22,24,1,1,1,1,'2015-06-30 02:35:38','2015-06-30 02:35:38'),(89,25,24,1,1,1,1,'2015-06-30 02:35:38','2015-06-30 02:35:38'),(90,26,24,1,1,1,1,'2015-06-30 02:35:38','2015-06-30 02:35:38'),(91,1,25,1,1,1,1,'2015-06-30 02:35:38','2015-06-30 02:35:38'),(92,2,25,1,1,1,1,'2015-06-30 02:35:38','2015-06-30 02:35:38'),(93,27,25,1,1,1,1,'2015-06-30 02:35:38','2015-06-30 02:35:38'),(94,3,25,1,1,1,1,'2015-06-30 02:35:38','2015-06-30 02:35:38'),(95,5,25,1,1,1,1,'2015-06-30 02:35:38','2015-06-30 02:35:38'),(96,28,25,1,1,1,1,'2015-06-30 02:35:38','2015-06-30 02:35:38'),(97,6,25,1,1,1,1,'2015-06-30 02:35:38','2015-06-30 02:35:38'),(98,29,25,0,0,0,0,'2015-06-30 02:35:39','2015-06-30 02:35:39'),(99,30,25,1,1,1,1,'2015-06-30 02:35:39','2015-06-30 02:35:39'),(100,9,25,1,1,1,1,'2015-06-30 02:35:39','2015-06-30 02:35:39'),(101,31,25,1,1,1,1,'2015-06-30 02:35:39','2015-06-30 02:35:39'),(102,10,25,1,1,1,1,'2015-06-30 02:35:39','2015-06-30 02:35:39'),(103,11,25,1,1,1,1,'2015-06-30 02:35:39','2015-06-30 02:35:39'),(104,14,25,0,0,0,0,'2015-06-30 02:35:39','2015-06-30 02:35:39'),(105,32,25,0,0,0,0,'2015-06-30 02:35:39','2015-06-30 02:35:39'),(106,33,25,1,1,1,1,'2015-06-30 02:35:39','2015-06-30 02:35:39'),(107,34,25,0,0,0,0,'2015-06-30 02:35:39','2015-06-30 02:35:39'),(108,15,25,0,0,0,0,'2015-06-30 02:35:39','2015-06-30 02:35:39'),(109,35,25,0,0,0,0,'2015-06-30 02:35:39','2015-06-30 02:35:39'),(110,16,25,0,0,0,0,'2015-06-30 02:35:39','2015-06-30 02:35:39'),(111,36,25,1,1,1,1,'2015-06-30 02:35:39','2015-06-30 02:35:39'),(112,17,25,1,1,1,1,'2015-06-30 02:35:39','2015-06-30 02:35:39'),(113,37,25,0,0,0,0,'2015-06-30 02:35:39','2015-06-30 02:35:39'),(114,38,25,0,0,0,0,'2015-06-30 02:35:39','2015-06-30 02:35:39'),(115,18,25,1,1,1,1,'2015-06-30 02:35:39','2015-06-30 02:35:39'),(116,19,25,1,1,1,1,'2015-06-30 02:35:39','2015-06-30 02:35:39'),(117,39,25,0,0,1,1,'2015-06-30 02:35:39','2015-06-30 02:35:39'),(118,22,25,1,1,1,1,'2015-06-30 02:35:39','2015-06-30 02:35:39'),(119,25,25,1,1,1,1,'2015-06-30 02:35:39','2015-06-30 02:35:39'),(120,26,25,1,1,1,1,'2015-06-30 02:35:40','2015-06-30 02:35:40'),(121,1,26,1,1,1,1,'2015-06-30 02:35:40','2015-06-30 02:35:40'),(122,2,26,1,1,1,1,'2015-06-30 02:35:40','2015-06-30 02:35:40'),(123,27,26,0,0,0,0,'2015-06-30 02:35:41','2015-06-30 02:35:41'),(124,3,26,1,1,1,1,'2015-06-30 02:35:41','2015-06-30 02:35:41'),(125,5,26,1,1,1,1,'2015-06-30 02:35:41','2015-06-30 02:35:41'),(126,28,26,1,1,1,1,'2015-06-30 02:35:41','2015-06-30 02:35:41'),(127,6,26,1,1,1,1,'2015-06-30 02:35:41','2015-06-30 02:35:41'),(128,29,26,0,0,0,0,'2015-06-30 02:35:41','2015-06-30 02:35:41'),(129,30,26,0,0,0,0,'2015-06-30 02:35:41','2015-06-30 02:35:41'),(130,9,26,1,1,1,1,'2015-06-30 02:35:41','2015-06-30 02:35:41'),(131,31,26,0,0,0,0,'2015-06-30 02:35:41','2015-06-30 02:35:41'),(132,10,26,1,1,1,1,'2015-06-30 02:35:41','2015-06-30 02:35:41'),(133,11,26,1,1,1,1,'2015-06-30 02:35:41','2015-06-30 02:35:41'),(134,14,26,1,1,1,1,'2015-06-30 02:35:41','2015-06-30 02:35:41'),(135,32,26,0,0,0,0,'2015-06-30 02:35:41','2015-06-30 02:35:41'),(136,33,26,0,0,0,0,'2015-06-30 02:35:41','2015-06-30 02:35:41'),(137,34,26,0,0,0,0,'2015-06-30 02:35:41','2015-06-30 02:35:41'),(138,15,26,1,1,1,1,'2015-06-30 02:35:41','2015-06-30 02:35:41'),(139,35,26,0,0,0,0,'2015-06-30 02:35:41','2015-06-30 02:35:41'),(140,16,26,1,1,1,1,'2015-06-30 02:35:41','2015-06-30 02:35:41'),(141,36,26,1,1,1,1,'2015-06-30 02:35:41','2015-06-30 02:35:41'),(142,17,26,1,1,1,1,'2015-06-30 02:35:41','2015-06-30 02:35:41'),(143,37,26,0,0,0,0,'2015-06-30 02:35:42','2015-06-30 02:35:42'),(144,38,26,0,0,0,0,'2015-06-30 02:35:42','2015-06-30 02:35:42'),(145,18,26,1,1,1,1,'2015-06-30 02:35:42','2015-06-30 02:35:42'),(146,19,26,1,1,1,1,'2015-06-30 02:35:42','2015-06-30 02:35:42'),(147,39,26,1,1,1,1,'2015-06-30 02:35:42','2015-06-30 02:35:42'),(148,22,26,1,1,1,1,'2015-06-30 02:35:42','2015-06-30 02:35:42'),(149,25,26,1,1,1,1,'2015-06-30 02:35:42','2015-06-30 02:35:42'),(150,26,26,1,1,1,1,'2015-06-30 02:35:42','2015-06-30 02:35:42'),(151,1,27,1,1,0,0,'2015-06-30 02:35:42','2015-06-30 02:35:42'),(152,2,27,1,1,1,1,'2015-06-30 02:35:42','2015-06-30 02:35:42'),(153,27,27,1,1,0,0,'2015-06-30 02:35:42','2015-06-30 02:35:42'),(154,3,27,1,1,1,1,'2015-06-30 02:35:42','2015-06-30 02:35:42'),(155,5,27,1,1,1,1,'2015-06-30 02:35:42','2015-06-30 02:35:42'),(156,28,27,1,1,1,1,'2015-06-30 02:35:42','2015-06-30 02:35:42'),(157,6,27,0,0,1,1,'2015-06-30 02:35:42','2015-06-30 02:35:42'),(158,29,27,0,0,1,1,'2015-06-30 02:35:42','2015-06-30 02:35:42'),(159,30,27,0,0,1,1,'2015-06-30 02:35:42','2015-06-30 02:35:42'),(160,9,27,1,1,1,1,'2015-06-30 02:35:42','2015-06-30 02:35:42'),(161,31,27,0,0,0,0,'2015-06-30 02:35:42','2015-06-30 02:35:42'),(162,10,27,1,1,1,1,'2015-06-30 02:35:43','2015-06-30 02:35:43'),(163,11,27,1,1,0,0,'2015-06-30 02:35:43','2015-06-30 02:35:43'),(164,14,27,1,1,1,1,'2015-06-30 02:35:43','2015-06-30 02:35:43'),(165,32,27,0,0,0,0,'2015-06-30 02:35:43','2015-06-30 02:35:43'),(166,33,27,1,1,0,0,'2015-06-30 02:35:43','2015-06-30 02:35:43'),(167,34,27,0,0,0,0,'2015-06-30 02:35:43','2015-06-30 02:35:43'),(168,15,27,1,1,1,1,'2015-06-30 02:35:43','2015-06-30 02:35:43'),(169,35,27,0,0,0,0,'2015-06-30 02:35:43','2015-06-30 02:35:43'),(170,16,27,1,1,1,1,'2015-06-30 02:35:43','2015-06-30 02:35:43'),(171,36,27,1,1,1,1,'2015-06-30 02:35:43','2015-06-30 02:35:43'),(172,17,27,1,1,1,1,'2015-06-30 02:35:43','2015-06-30 02:35:43'),(173,37,27,0,0,0,0,'2015-06-30 02:35:43','2015-06-30 02:35:43'),(174,38,27,0,0,0,0,'2015-06-30 02:35:43','2015-06-30 02:35:43'),(175,18,27,1,1,1,1,'2015-06-30 02:35:43','2015-06-30 02:35:43'),(176,19,27,1,1,0,0,'2015-06-30 02:35:43','2015-06-30 02:35:43'),(177,39,27,1,1,0,0,'2015-06-30 02:35:43','2015-06-30 02:35:43'),(178,22,27,1,1,1,1,'2015-06-30 02:35:43','2015-06-30 02:35:43'),(179,25,27,1,1,0,0,'2015-06-30 02:35:44','2015-06-30 02:35:44'),(180,26,27,1,1,1,1,'2015-06-30 02:35:44','2015-06-30 02:35:44'),(181,1,28,1,1,1,1,'2015-06-30 02:35:44','2015-06-30 02:35:44'),(182,2,28,1,1,1,1,'2015-06-30 02:35:44','2015-06-30 02:35:44'),(183,27,28,1,1,1,1,'2015-06-30 02:35:44','2015-06-30 02:35:44'),(184,3,28,1,1,1,1,'2015-06-30 02:35:44','2015-06-30 02:35:44'),(185,5,28,1,1,1,1,'2015-06-30 02:35:44','2015-06-30 02:35:44'),(186,28,28,1,1,1,1,'2015-06-30 02:35:44','2015-06-30 02:35:44'),(187,6,28,1,1,1,1,'2015-06-30 02:35:44','2015-06-30 02:35:44'),(188,29,28,1,1,1,1,'2015-06-30 02:35:44','2015-06-30 02:35:44'),(189,30,28,1,1,1,1,'2015-06-30 02:35:44','2015-06-30 02:35:44'),(190,9,28,1,1,1,1,'2015-06-30 02:35:44','2015-06-30 02:35:44'),(191,31,28,0,0,0,0,'2015-06-30 02:35:44','2015-06-30 02:35:44'),(192,10,28,1,1,1,1,'2015-06-30 02:35:44','2015-06-30 02:35:44'),(193,11,28,1,1,1,0,'2015-06-30 02:35:44','2015-06-30 02:35:44'),(194,14,28,1,1,1,1,'2015-06-30 02:35:44','2015-06-30 02:35:44'),(195,32,28,0,0,0,0,'2015-06-30 02:35:44','2015-06-30 02:35:44'),(196,33,28,1,1,1,0,'2015-06-30 02:35:44','2015-06-30 02:35:44'),(197,34,28,0,0,0,0,'2015-06-30 02:35:44','2015-06-30 02:35:44'),(198,15,28,1,1,1,1,'2015-06-30 02:35:44','2015-06-30 02:35:44'),(199,35,28,0,0,0,0,'2015-06-30 02:35:44','2015-06-30 02:35:44'),(200,16,28,1,1,1,1,'2015-06-30 02:35:44','2015-06-30 02:35:44'),(201,36,28,0,0,0,0,'2015-06-30 02:35:44','2015-06-30 02:35:44'),(202,17,28,1,1,1,1,'2015-06-30 02:35:45','2015-06-30 02:35:45'),(203,37,28,0,0,0,0,'2015-06-30 02:35:45','2015-06-30 02:35:45'),(204,38,28,0,0,0,0,'2015-06-30 02:35:45','2015-06-30 02:35:45'),(205,18,28,1,1,1,1,'2015-06-30 02:35:45','2015-06-30 02:35:45'),(206,19,28,1,1,1,1,'2015-06-30 02:35:45','2015-06-30 02:35:45'),(207,39,28,1,1,1,1,'2015-06-30 02:35:45','2015-06-30 02:35:45'),(208,22,28,1,1,1,1,'2015-06-30 02:35:45','2015-06-30 02:35:45'),(209,25,28,1,1,1,1,'2015-06-30 02:35:45','2015-06-30 02:35:45'),(210,26,28,1,1,1,1,'2015-06-30 02:35:45','2015-06-30 02:35:45'),(211,1,29,0,0,0,0,'2015-06-30 02:35:45','2015-06-30 02:35:45'),(212,2,29,1,1,1,1,'2015-06-30 02:35:45','2015-06-30 02:35:45'),(213,27,29,1,1,1,1,'2015-06-30 02:35:45','2015-06-30 02:35:45'),(214,3,29,1,1,1,1,'2015-06-30 02:35:45','2015-06-30 02:35:45'),(215,5,29,1,1,1,1,'2015-06-30 02:35:45','2015-06-30 02:35:45'),(216,28,29,1,1,1,1,'2015-06-30 02:35:45','2015-06-30 02:35:45'),(217,6,29,1,1,1,1,'2015-06-30 02:35:45','2015-06-30 02:35:45'),(218,29,29,0,0,0,0,'2015-06-30 02:35:45','2015-06-30 02:35:45'),(219,30,29,0,0,0,0,'2015-06-30 02:35:45','2015-06-30 02:35:45'),(220,9,29,0,0,1,1,'2015-06-30 02:35:45','2015-06-30 02:35:45'),(221,31,29,0,0,0,0,'2015-06-30 02:35:45','2015-06-30 02:35:45'),(222,10,29,1,1,1,1,'2015-06-30 02:35:46','2015-06-30 02:35:46'),(223,11,29,0,0,0,1,'2015-06-30 02:35:46','2015-06-30 02:35:46'),(224,14,29,1,1,1,1,'2015-06-30 02:35:46','2015-06-30 02:35:46'),(225,32,29,0,0,0,0,'2015-06-30 02:35:46','2015-06-30 02:35:46'),(226,33,29,0,0,0,1,'2015-06-30 02:35:46','2015-06-30 02:35:46'),(227,34,29,0,0,0,0,'2015-06-30 02:35:46','2015-06-30 02:35:46'),(228,15,29,1,1,1,1,'2015-06-30 02:35:46','2015-06-30 02:35:46'),(229,35,29,0,0,0,0,'2015-06-30 02:35:46','2015-06-30 02:35:46'),(230,16,29,1,1,1,1,'2015-06-30 02:35:46','2015-06-30 02:35:46'),(231,36,29,0,0,0,0,'2015-06-30 02:35:46','2015-06-30 02:35:46'),(232,17,29,1,1,1,1,'2015-06-30 02:35:46','2015-06-30 02:35:46'),(233,37,29,0,0,0,0,'2015-06-30 02:35:46','2015-06-30 02:35:46'),(234,38,29,0,0,0,0,'2015-06-30 02:35:46','2015-06-30 02:35:46'),(235,18,29,1,1,1,1,'2015-06-30 02:35:46','2015-06-30 02:35:46'),(236,19,29,1,1,1,1,'2015-06-30 02:35:46','2015-06-30 02:35:46'),(237,39,29,0,0,0,0,'2015-06-30 02:35:46','2015-06-30 02:35:46'),(238,22,29,1,1,1,1,'2015-06-30 02:35:46','2015-06-30 02:35:46'),(239,25,29,0,0,0,0,'2015-06-30 02:35:46','2015-06-30 02:35:46'),(240,26,29,1,1,1,1,'2015-06-30 02:35:46','2015-06-30 02:35:46'),(241,1,30,1,1,1,1,'2015-06-30 02:35:46','2015-06-30 02:35:46'),(242,2,30,1,1,1,1,'2015-06-30 02:35:46','2015-06-30 02:35:46'),(243,27,30,1,1,1,1,'2015-06-30 02:35:46','2015-06-30 02:35:46'),(244,3,30,1,1,1,1,'2015-06-30 02:35:47','2015-06-30 02:35:47'),(245,5,30,1,1,1,1,'2015-06-30 02:35:47','2015-06-30 02:35:47'),(246,28,30,1,1,1,1,'2015-06-30 02:35:47','2015-06-30 02:35:47'),(247,6,30,1,1,1,1,'2015-06-30 02:35:47','2015-06-30 02:35:47'),(248,29,30,1,1,1,1,'2015-06-30 02:35:47','2015-06-30 02:35:47'),(249,30,30,1,1,1,1,'2015-06-30 02:35:47','2015-06-30 02:35:47'),(250,9,30,1,1,1,1,'2015-06-30 02:35:47','2015-06-30 02:35:47'),(251,31,30,0,0,0,0,'2015-06-30 02:35:47','2015-06-30 02:35:47'),(252,10,30,1,1,1,1,'2015-06-30 02:35:47','2015-06-30 02:35:47'),(253,11,30,1,1,1,1,'2015-06-30 02:35:47','2015-06-30 02:35:47'),(254,14,30,1,1,1,1,'2015-06-30 02:35:47','2015-06-30 02:35:47'),(255,32,30,0,0,0,0,'2015-06-30 02:35:47','2015-06-30 02:35:47'),(256,33,30,1,1,1,1,'2015-06-30 02:35:47','2015-06-30 02:35:47'),(257,34,30,0,0,0,0,'2015-06-30 02:35:47','2015-06-30 02:35:47'),(258,15,30,1,1,1,1,'2015-06-30 02:35:47','2015-06-30 02:35:47'),(259,35,30,0,0,0,0,'2015-06-30 02:35:47','2015-06-30 02:35:47'),(260,16,30,1,1,1,1,'2015-06-30 02:35:47','2015-06-30 02:35:47'),(261,36,30,1,1,1,1,'2015-06-30 02:35:47','2015-06-30 02:35:47'),(262,17,30,1,1,1,1,'2015-06-30 02:35:47','2015-06-30 02:35:47'),(263,37,30,0,0,0,0,'2015-06-30 02:35:47','2015-06-30 02:35:47'),(264,38,30,0,0,0,0,'2015-06-30 02:35:47','2015-06-30 02:35:47'),(265,18,30,1,1,1,1,'2015-06-30 02:35:47','2015-06-30 02:35:47'),(266,19,30,1,1,1,1,'2015-06-30 02:35:48','2015-06-30 02:35:48'),(267,39,30,1,1,1,1,'2015-06-30 02:35:48','2015-06-30 02:35:48'),(268,22,30,1,1,1,1,'2015-06-30 02:35:48','2015-06-30 02:35:48'),(269,25,30,1,1,1,1,'2015-06-30 02:35:48','2015-06-30 02:35:48'),(270,26,30,1,1,1,1,'2015-06-30 02:35:48','2015-06-30 02:35:48'),(271,1,31,1,1,1,1,'2015-06-30 02:35:48','2015-06-30 02:35:48'),(272,2,31,1,1,1,1,'2015-06-30 02:35:48','2015-06-30 02:35:48'),(273,27,31,1,1,1,1,'2015-06-30 02:35:48','2015-06-30 02:35:48'),(274,3,31,1,1,1,1,'2015-06-30 02:35:48','2015-06-30 02:35:48'),(275,5,31,1,1,1,1,'2015-06-30 02:35:48','2015-06-30 02:35:48'),(276,28,31,1,1,1,1,'2015-06-30 02:35:48','2015-06-30 02:35:48'),(277,6,31,1,1,1,1,'2015-06-30 02:35:48','2015-06-30 02:35:48'),(278,29,31,0,0,0,0,'2015-06-30 02:35:48','2015-06-30 02:35:48'),(279,30,31,0,0,0,0,'2015-06-30 02:35:49','2015-06-30 02:35:49'),(280,9,31,1,1,1,1,'2015-06-30 02:35:49','2015-06-30 02:35:49'),(281,31,31,0,0,0,0,'2015-06-30 02:35:49','2015-06-30 02:35:49'),(282,10,31,1,1,1,1,'2015-06-30 02:35:49','2015-06-30 02:35:49'),(283,11,31,1,1,1,1,'2015-06-30 02:35:49','2015-06-30 02:35:49'),(284,14,31,1,1,1,1,'2015-06-30 02:35:49','2015-06-30 02:35:49'),(285,32,31,0,0,0,0,'2015-06-30 02:35:49','2015-06-30 02:35:49'),(286,33,31,0,0,0,0,'2015-06-30 02:35:49','2015-06-30 02:35:49'),(287,34,31,0,0,0,0,'2015-06-30 02:35:49','2015-06-30 02:35:49'),(288,15,31,1,1,1,1,'2015-06-30 02:35:49','2015-06-30 02:35:49'),(289,35,31,0,0,0,0,'2015-06-30 02:35:49','2015-06-30 02:35:49'),(290,16,31,1,1,1,1,'2015-06-30 02:35:49','2015-06-30 02:35:49'),(291,36,31,0,0,0,0,'2015-06-30 02:35:50','2015-06-30 02:35:50'),(292,17,31,1,1,1,1,'2015-06-30 02:35:50','2015-06-30 02:35:50'),(293,37,31,0,0,0,0,'2015-06-30 02:35:50','2015-06-30 02:35:50'),(294,38,31,0,0,0,0,'2015-06-30 02:35:50','2015-06-30 02:35:50'),(295,18,31,1,1,1,1,'2015-06-30 02:35:50','2015-06-30 02:35:50'),(296,19,31,1,1,1,1,'2015-06-30 02:35:50','2015-06-30 02:35:50'),(297,39,31,1,1,1,1,'2015-06-30 02:35:50','2015-06-30 02:35:50'),(298,22,31,1,1,1,1,'2015-06-30 02:35:50','2015-06-30 02:35:50'),(299,25,31,1,1,1,1,'2015-06-30 02:35:50','2015-06-30 02:35:50'),(300,26,31,1,1,1,1,'2015-06-30 02:35:50','2015-06-30 02:35:50'),(301,1,32,1,1,1,1,'2015-06-30 02:35:50','2015-06-30 02:35:50'),(302,2,32,1,1,1,1,'2015-06-30 02:35:50','2015-06-30 02:35:50'),(303,27,32,1,1,1,1,'2015-06-30 02:35:51','2015-06-30 02:35:51'),(304,3,32,1,1,1,1,'2015-06-30 02:35:51','2015-06-30 02:35:51'),(305,5,32,1,1,1,1,'2015-06-30 02:35:51','2015-06-30 02:35:51'),(306,28,32,1,1,1,1,'2015-06-30 02:35:51','2015-06-30 02:35:51'),(307,6,32,1,1,1,1,'2015-06-30 02:35:51','2015-06-30 02:35:51'),(308,29,32,1,1,1,1,'2015-06-30 02:35:52','2015-06-30 02:35:52'),(309,30,32,1,1,1,1,'2015-06-30 02:35:52','2015-06-30 02:35:52'),(310,9,32,1,1,1,1,'2015-06-30 02:35:52','2015-06-30 02:35:52'),(311,31,32,0,0,0,0,'2015-06-30 02:35:52','2015-06-30 02:35:52'),(312,10,32,1,1,1,1,'2015-06-30 02:35:52','2015-06-30 02:35:52'),(313,11,32,1,1,1,1,'2015-06-30 02:35:52','2015-06-30 02:35:52'),(314,14,32,1,1,1,1,'2015-06-30 02:35:52','2015-06-30 02:35:52'),(315,32,32,0,0,0,0,'2015-06-30 02:35:52','2015-06-30 02:35:52'),(316,33,32,0,0,0,0,'2015-06-30 02:35:52','2015-06-30 02:35:52'),(317,34,32,0,0,0,0,'2015-06-30 02:35:52','2015-06-30 02:35:52'),(318,15,32,1,1,1,1,'2015-06-30 02:35:52','2015-06-30 02:35:52'),(319,35,32,0,0,0,0,'2015-06-30 02:35:53','2015-06-30 02:35:53'),(320,16,32,1,1,1,1,'2015-06-30 02:35:53','2015-06-30 02:35:53'),(321,36,32,1,1,1,1,'2015-06-30 02:35:53','2015-06-30 02:35:53'),(322,17,32,1,1,1,1,'2015-06-30 02:35:53','2015-06-30 02:35:53'),(323,37,32,0,0,0,0,'2015-06-30 02:35:53','2015-06-30 02:35:53'),(324,38,32,0,0,0,0,'2015-06-30 02:35:53','2015-06-30 02:35:53'),(325,18,32,1,1,1,1,'2015-06-30 02:35:53','2015-06-30 02:35:53'),(326,19,32,1,1,1,1,'2015-06-30 02:35:53','2015-06-30 02:35:53'),(327,39,32,1,1,1,1,'2015-06-30 02:35:53','2015-06-30 02:35:53'),(328,22,32,1,1,1,1,'2015-06-30 02:35:53','2015-06-30 02:35:53'),(329,25,32,1,1,1,1,'2015-06-30 02:35:53','2015-06-30 02:35:53'),(330,26,32,1,1,1,1,'2015-06-30 02:35:54','2015-06-30 02:35:54'),(331,1,33,1,1,1,1,'2015-06-30 02:35:54','2015-06-30 02:35:54'),(332,2,33,1,1,1,1,'2015-06-30 02:35:54','2015-06-30 02:35:54'),(333,27,33,1,1,1,1,'2015-06-30 02:35:54','2015-06-30 02:35:54'),(334,3,33,1,1,1,1,'2015-06-30 02:35:54','2015-06-30 02:35:54'),(335,5,33,1,1,1,1,'2015-06-30 02:35:54','2015-06-30 02:35:54'),(336,28,33,1,1,1,1,'2015-06-30 02:35:54','2015-06-30 02:35:54'),(337,6,33,1,1,1,1,'2015-06-30 02:35:54','2015-06-30 02:35:54'),(338,29,33,1,1,1,1,'2015-06-30 02:35:54','2015-06-30 02:35:54'),(339,30,33,1,1,1,1,'2015-06-30 02:35:54','2015-06-30 02:35:54'),(340,9,33,1,1,1,1,'2015-06-30 02:35:54','2015-06-30 02:35:54'),(341,31,33,0,0,0,0,'2015-06-30 02:35:55','2015-06-30 02:35:55'),(342,10,33,1,1,1,1,'2015-06-30 02:35:55','2015-06-30 02:35:55'),(343,11,33,1,1,1,1,'2015-06-30 02:35:55','2015-06-30 02:35:55'),(344,14,33,1,1,1,1,'2015-06-30 02:35:55','2015-06-30 02:35:55'),(345,32,33,0,0,0,0,'2015-06-30 02:35:55','2015-06-30 02:35:55'),(346,33,33,0,0,0,0,'2015-06-30 02:35:55','2015-06-30 02:35:55'),(347,34,33,0,0,0,0,'2015-06-30 02:35:55','2015-06-30 02:35:55'),(348,15,33,1,1,1,1,'2015-06-30 02:35:55','2015-06-30 02:35:55'),(349,35,33,0,0,0,0,'2015-06-30 02:35:55','2015-06-30 02:35:55'),(350,16,33,1,1,1,1,'2015-06-30 02:35:55','2015-06-30 02:35:55'),(351,36,33,1,1,1,1,'2015-06-30 02:35:55','2015-06-30 02:35:55'),(352,17,33,1,1,1,1,'2015-06-30 02:35:55','2015-06-30 02:35:55'),(353,37,33,0,0,0,0,'2015-06-30 02:35:56','2015-06-30 02:35:56'),(354,38,33,0,0,0,0,'2015-06-30 02:35:56','2015-06-30 02:35:56'),(355,18,33,1,1,1,1,'2015-06-30 02:35:56','2015-06-30 02:35:56'),(356,19,33,1,1,1,1,'2015-06-30 02:35:56','2015-06-30 02:35:56'),(357,39,33,1,1,1,1,'2015-06-30 02:35:56','2015-06-30 02:35:56'),(358,22,33,1,1,1,1,'2015-06-30 02:35:56','2015-06-30 02:35:56'),(359,25,33,1,1,1,1,'2015-06-30 02:35:56','2015-06-30 02:35:56'),(360,26,33,1,1,1,1,'2015-06-30 02:35:56','2015-06-30 02:35:56'),(361,1,34,1,1,1,1,'2015-06-30 02:35:56','2015-06-30 02:35:56'),(362,2,34,1,1,1,1,'2015-06-30 02:35:56','2015-06-30 02:35:56'),(363,27,34,0,0,0,0,'2015-06-30 02:35:56','2015-06-30 02:35:56'),(364,3,34,1,1,1,1,'2015-06-30 02:35:56','2015-06-30 02:35:56'),(365,5,34,1,1,1,1,'2015-06-30 02:35:57','2015-06-30 02:35:57'),(366,28,34,1,1,1,1,'2015-06-30 02:35:57','2015-06-30 02:35:57'),(367,6,34,1,1,1,1,'2015-06-30 02:35:57','2015-06-30 02:35:57'),(368,29,34,0,0,0,0,'2015-06-30 02:35:57','2015-06-30 02:35:57'),(369,30,34,0,0,0,0,'2015-06-30 02:35:57','2015-06-30 02:35:57'),(370,9,34,1,1,1,1,'2015-06-30 02:35:57','2015-06-30 02:35:57'),(371,31,34,0,0,0,0,'2015-06-30 02:35:57','2015-06-30 02:35:57'),(372,10,34,1,1,1,1,'2015-06-30 02:35:57','2015-06-30 02:35:57'),(373,11,34,1,1,1,1,'2015-06-30 02:35:57','2015-06-30 02:35:57'),(374,14,34,1,1,1,1,'2015-06-30 02:35:57','2015-06-30 02:35:57'),(375,32,34,0,0,0,0,'2015-06-30 02:35:58','2015-06-30 02:35:58'),(376,33,34,0,0,0,0,'2015-06-30 02:35:58','2015-06-30 02:35:58'),(377,34,34,0,0,0,0,'2015-06-30 02:35:58','2015-06-30 02:35:58'),(378,15,34,1,1,1,1,'2015-06-30 02:35:58','2015-06-30 02:35:58'),(379,35,34,0,0,0,0,'2015-06-30 02:35:58','2015-06-30 02:35:58'),(380,16,34,1,1,1,1,'2015-06-30 02:35:58','2015-06-30 02:35:58'),(381,36,34,0,0,0,0,'2015-06-30 02:35:58','2015-06-30 02:35:58'),(382,17,34,1,1,1,1,'2015-06-30 02:35:59','2015-06-30 02:35:59'),(383,37,34,0,0,0,0,'2015-06-30 02:35:59','2015-06-30 02:35:59'),(384,38,34,0,0,0,0,'2015-06-30 02:35:59','2015-06-30 02:35:59'),(385,18,34,1,1,1,1,'2015-06-30 02:35:59','2015-06-30 02:35:59'),(386,19,34,1,1,1,1,'2015-06-30 02:35:59','2015-06-30 02:35:59'),(387,39,34,1,1,1,1,'2015-06-30 02:35:59','2015-06-30 02:35:59'),(388,22,34,1,1,1,1,'2015-06-30 02:35:59','2015-06-30 02:35:59'),(389,25,34,1,1,1,1,'2015-06-30 02:35:59','2015-06-30 02:35:59'),(390,26,34,1,1,1,1,'2015-06-30 02:35:59','2015-06-30 02:35:59'),(391,1,35,1,1,0,0,'2015-06-30 02:35:59','2015-06-30 02:35:59'),(392,2,35,1,1,1,1,'2015-06-30 02:35:59','2015-06-30 02:35:59'),(393,27,35,0,0,0,0,'2015-06-30 02:35:59','2015-06-30 02:35:59'),(394,3,35,1,1,1,1,'2015-06-30 02:36:00','2015-06-30 02:36:00'),(395,5,35,1,1,1,1,'2015-06-30 02:36:00','2015-06-30 02:36:00'),(396,28,35,1,1,1,1,'2015-06-30 02:36:00','2015-06-30 02:36:00'),(397,6,35,1,1,1,1,'2015-06-30 02:36:00','2015-06-30 02:36:00'),(398,29,35,0,0,0,0,'2015-06-30 02:36:00','2015-06-30 02:36:00'),(399,30,35,0,0,0,0,'2015-06-30 02:36:00','2015-06-30 02:36:00'),(400,9,35,1,1,1,0,'2015-06-30 02:36:00','2015-06-30 02:36:00'),(401,31,35,0,0,0,0,'2015-06-30 02:36:00','2015-06-30 02:36:00'),(402,10,35,1,1,1,1,'2015-06-30 02:36:00','2015-06-30 02:36:00'),(403,11,35,0,0,0,0,'2015-06-30 02:36:00','2015-06-30 02:36:00'),(404,14,35,1,1,0,0,'2015-06-30 02:36:00','2015-06-30 02:36:00'),(405,32,35,0,0,0,0,'2015-06-30 02:36:00','2015-06-30 02:36:00'),(406,33,35,0,0,0,0,'2015-06-30 02:36:01','2015-06-30 02:36:01'),(407,34,35,0,0,0,0,'2015-06-30 02:36:01','2015-06-30 02:36:01'),(408,15,35,0,0,0,0,'2015-06-30 02:36:01','2015-06-30 02:36:01'),(409,35,35,0,0,0,0,'2015-06-30 02:36:01','2015-06-30 02:36:01'),(410,16,35,0,0,0,0,'2015-06-30 02:36:01','2015-06-30 02:36:01'),(411,36,35,0,0,0,0,'2015-06-30 02:36:01','2015-06-30 02:36:01'),(412,17,35,1,1,1,1,'2015-06-30 02:36:01','2015-06-30 02:36:01'),(413,37,35,0,0,0,0,'2015-06-30 02:36:01','2015-06-30 02:36:01'),(414,38,35,0,0,0,0,'2015-06-30 02:36:01','2015-06-30 02:36:01'),(415,18,35,0,0,0,0,'2015-06-30 02:36:01','2015-06-30 02:36:01'),(416,19,35,1,1,1,1,'2015-06-30 02:36:02','2015-06-30 02:36:02'),(417,39,35,0,0,0,0,'2015-06-30 02:36:02','2015-06-30 02:36:02'),(418,22,35,1,1,1,1,'2015-06-30 02:36:02','2015-06-30 02:36:02'),(419,25,35,1,1,1,1,'2015-06-30 02:36:02','2015-06-30 02:36:02'),(420,26,35,1,1,1,1,'2015-06-30 02:36:02','2015-06-30 02:36:02'),(421,1,36,1,1,1,1,'2015-06-30 02:36:02','2015-06-30 02:36:02'),(422,2,36,1,1,1,1,'2015-06-30 02:36:02','2015-06-30 02:36:02'),(423,27,36,1,1,1,1,'2015-06-30 02:36:02','2015-06-30 02:36:02'),(424,3,36,1,1,1,1,'2015-06-30 02:36:02','2015-06-30 02:36:02'),(425,5,36,1,1,1,1,'2015-06-30 02:36:03','2015-06-30 02:36:03'),(426,28,36,1,1,1,1,'2015-06-30 02:36:03','2015-06-30 02:36:03'),(427,6,36,1,1,1,1,'2015-06-30 02:36:03','2015-06-30 02:36:03'),(428,29,36,1,1,1,1,'2015-06-30 02:36:03','2015-06-30 02:36:03'),(429,30,36,0,0,0,0,'2015-06-30 02:36:03','2015-06-30 02:36:03'),(430,9,36,1,1,1,1,'2015-06-30 02:36:03','2015-06-30 02:36:03'),(431,31,36,0,0,0,0,'2015-06-30 02:36:03','2015-06-30 02:36:03'),(432,10,36,1,1,1,1,'2015-06-30 02:36:03','2015-06-30 02:36:03'),(433,11,36,1,1,1,1,'2015-06-30 02:36:03','2015-06-30 02:36:03'),(434,14,36,1,1,1,1,'2015-06-30 02:36:03','2015-06-30 02:36:03'),(435,32,36,0,0,0,0,'2015-06-30 02:36:03','2015-06-30 02:36:03'),(436,33,36,0,0,0,0,'2015-06-30 02:36:03','2015-06-30 02:36:03'),(437,34,36,0,0,0,0,'2015-06-30 02:36:03','2015-06-30 02:36:03'),(438,15,36,1,1,1,1,'2015-06-30 02:36:03','2015-06-30 02:36:03'),(439,35,36,0,0,0,0,'2015-06-30 02:36:03','2015-06-30 02:36:03'),(440,16,36,1,1,1,1,'2015-06-30 02:36:03','2015-06-30 02:36:03'),(441,36,36,0,0,0,0,'2015-06-30 02:36:03','2015-06-30 02:36:03'),(442,17,36,1,1,1,1,'2015-06-30 02:36:03','2015-06-30 02:36:03'),(443,37,36,0,0,0,0,'2015-06-30 02:36:03','2015-06-30 02:36:03'),(444,38,36,0,0,0,0,'2015-06-30 02:36:03','2015-06-30 02:36:03'),(445,18,36,1,1,1,1,'2015-06-30 02:36:04','2015-06-30 02:36:04'),(446,19,36,1,1,1,1,'2015-06-30 02:36:04','2015-06-30 02:36:04'),(447,39,36,0,0,0,0,'2015-06-30 02:36:04','2015-06-30 02:36:04'),(448,22,36,1,1,1,1,'2015-06-30 02:36:04','2015-06-30 02:36:04'),(449,25,36,1,1,1,1,'2015-06-30 02:36:04','2015-06-30 02:36:04'),(450,26,36,1,1,1,1,'2015-06-30 02:36:04','2015-06-30 02:36:04'),(451,1,37,1,1,1,1,'2015-06-30 02:36:04','2015-06-30 02:36:04'),(452,2,37,1,1,1,1,'2015-06-30 02:36:04','2015-06-30 02:36:04'),(453,27,37,0,0,0,0,'2015-06-30 02:36:04','2015-06-30 02:36:04'),(454,3,37,1,1,1,1,'2015-06-30 02:36:04','2015-06-30 02:36:04'),(455,5,37,1,1,1,1,'2015-06-30 02:36:05','2015-06-30 02:36:05'),(456,28,37,1,1,1,1,'2015-06-30 02:36:05','2015-06-30 02:36:05'),(457,6,37,1,1,1,1,'2015-06-30 02:36:05','2015-06-30 02:36:05'),(458,29,37,0,0,0,0,'2015-06-30 02:36:05','2015-06-30 02:36:05'),(459,30,37,0,0,0,0,'2015-06-30 02:36:05','2015-06-30 02:36:05'),(460,9,37,1,1,1,1,'2015-06-30 02:36:05','2015-06-30 02:36:05'),(461,31,37,0,0,0,0,'2015-06-30 02:36:05','2015-06-30 02:36:05'),(462,10,37,1,1,1,1,'2015-06-30 02:36:05','2015-06-30 02:36:05'),(463,11,37,1,1,1,1,'2015-06-30 02:36:05','2015-06-30 02:36:05'),(464,14,37,1,1,1,1,'2015-06-30 02:36:05','2015-06-30 02:36:05'),(465,32,37,0,0,0,0,'2015-06-30 02:36:05','2015-06-30 02:36:05'),(466,33,37,0,0,0,0,'2015-06-30 02:36:08','2015-06-30 02:36:08'),(467,34,37,0,0,0,0,'2015-06-30 02:36:08','2015-06-30 02:36:08'),(468,15,37,1,1,1,1,'2015-06-30 02:36:09','2015-06-30 02:36:09'),(469,35,37,0,0,0,0,'2015-06-30 02:36:09','2015-06-30 02:36:09'),(470,16,37,1,1,1,1,'2015-06-30 02:36:09','2015-06-30 02:36:09'),(471,36,37,0,0,0,0,'2015-06-30 02:36:09','2015-06-30 02:36:09'),(472,17,37,1,1,1,1,'2015-06-30 02:36:09','2015-06-30 02:36:09'),(473,37,37,0,0,0,0,'2015-06-30 02:36:09','2015-06-30 02:36:09'),(474,38,37,0,0,0,0,'2015-06-30 02:36:09','2015-06-30 02:36:09'),(475,18,37,1,1,1,1,'2015-06-30 02:36:09','2015-06-30 02:36:09'),(476,19,37,1,1,1,1,'2015-06-30 02:36:09','2015-06-30 02:36:09'),(477,39,37,0,0,0,0,'2015-06-30 02:36:09','2015-06-30 02:36:09'),(478,22,37,1,1,1,1,'2015-06-30 02:36:09','2015-06-30 02:36:09'),(479,25,37,1,1,1,1,'2015-06-30 02:36:09','2015-06-30 02:36:09'),(480,26,37,1,1,1,1,'2015-06-30 02:36:09','2015-06-30 02:36:09'),(481,1,38,1,1,1,1,'2015-06-30 02:36:09','2015-06-30 02:36:09'),(482,2,38,1,1,1,1,'2015-06-30 02:36:09','2015-06-30 02:36:09'),(483,27,38,0,0,0,0,'2015-06-30 02:36:09','2015-06-30 02:36:09'),(484,3,38,1,1,1,1,'2015-06-30 02:36:09','2015-06-30 02:36:09'),(485,5,38,0,0,0,0,'2015-06-30 02:36:09','2015-06-30 02:36:09'),(486,28,38,1,1,1,1,'2015-06-30 02:36:10','2015-06-30 02:36:10'),(487,6,38,1,1,1,1,'2015-06-30 02:36:10','2015-06-30 02:36:10'),(488,29,38,0,0,0,0,'2015-06-30 02:36:10','2015-06-30 02:36:10'),(489,30,38,0,0,0,0,'2015-06-30 02:36:10','2015-06-30 02:36:10'),(490,9,38,1,1,1,1,'2015-06-30 02:36:10','2015-06-30 02:36:10'),(491,31,38,0,0,0,0,'2015-06-30 02:36:10','2015-06-30 02:36:10'),(492,10,38,1,1,1,1,'2015-06-30 02:36:10','2015-06-30 02:36:10'),(493,11,38,1,1,1,1,'2015-06-30 02:36:10','2015-06-30 02:36:10'),(494,14,38,1,1,1,1,'2015-06-30 02:36:10','2015-06-30 02:36:10'),(495,32,38,0,0,0,0,'2015-06-30 02:36:10','2015-06-30 02:36:10'),(496,33,38,0,0,0,0,'2015-06-30 02:36:10','2015-06-30 02:36:10'),(497,34,38,0,0,0,0,'2015-06-30 02:36:10','2015-06-30 02:36:10'),(498,15,38,1,1,1,1,'2015-06-30 02:36:10','2015-06-30 02:36:10'),(499,35,38,0,0,0,0,'2015-06-30 02:36:10','2015-06-30 02:36:10'),(500,16,38,1,1,1,1,'2015-06-30 02:36:10','2015-06-30 02:36:10'),(501,36,38,0,0,0,0,'2015-06-30 02:36:10','2015-06-30 02:36:10'),(502,17,38,1,1,1,1,'2015-06-30 02:36:10','2015-06-30 02:36:10'),(503,37,38,0,0,0,0,'2015-06-30 02:36:10','2015-06-30 02:36:10'),(504,38,38,0,0,0,0,'2015-06-30 02:36:10','2015-06-30 02:36:10'),(505,18,38,1,1,1,1,'2015-06-30 02:36:10','2015-06-30 02:36:10'),(506,19,38,1,1,1,1,'2015-06-30 02:36:10','2015-06-30 02:36:10'),(507,39,38,0,0,0,0,'2015-06-30 02:36:10','2015-06-30 02:36:10'),(508,22,38,1,1,1,1,'2015-06-30 02:36:11','2015-06-30 02:36:11'),(509,25,38,1,1,1,1,'2015-06-30 02:36:11','2015-06-30 02:36:11'),(510,26,38,1,1,1,1,'2015-06-30 02:36:11','2015-06-30 02:36:11'),(511,1,39,0,0,0,0,'2015-06-30 02:36:11','2015-06-30 02:36:11'),(512,2,39,1,1,1,1,'2015-06-30 02:36:11','2015-06-30 02:36:11'),(513,27,39,0,0,0,0,'2015-06-30 02:36:11','2015-06-30 02:36:11'),(514,3,39,1,1,1,1,'2015-06-30 02:36:11','2015-06-30 02:36:11'),(515,5,39,1,1,1,1,'2015-06-30 02:36:11','2015-06-30 02:36:11'),(516,28,39,1,1,1,1,'2015-06-30 02:36:11','2015-06-30 02:36:11'),(517,6,39,1,1,1,1,'2015-06-30 02:36:11','2015-06-30 02:36:11'),(518,29,39,0,0,0,0,'2015-06-30 02:36:11','2015-06-30 02:36:11'),(519,30,39,0,0,0,0,'2015-06-30 02:36:11','2015-06-30 02:36:11'),(520,9,39,1,1,1,1,'2015-06-30 02:36:11','2015-06-30 02:36:11'),(521,31,39,0,0,0,0,'2015-06-30 02:36:11','2015-06-30 02:36:11'),(522,10,39,1,1,1,1,'2015-06-30 02:36:11','2015-06-30 02:36:11'),(523,11,39,1,1,1,1,'2015-06-30 02:36:11','2015-06-30 02:36:11'),(524,14,39,1,1,1,1,'2015-06-30 02:36:11','2015-06-30 02:36:11'),(525,32,39,0,0,0,0,'2015-06-30 02:36:11','2015-06-30 02:36:11'),(526,33,39,0,0,0,0,'2015-06-30 02:36:11','2015-06-30 02:36:11'),(527,34,39,0,0,0,0,'2015-06-30 02:36:11','2015-06-30 02:36:11'),(528,15,39,1,1,1,1,'2015-06-30 02:36:11','2015-06-30 02:36:11'),(529,35,39,0,0,0,0,'2015-06-30 02:36:11','2015-06-30 02:36:11'),(530,16,39,1,1,1,1,'2015-06-30 02:36:12','2015-06-30 02:36:12'),(531,36,39,0,0,0,0,'2015-06-30 02:36:12','2015-06-30 02:36:12'),(532,17,39,1,1,1,1,'2015-06-30 02:36:12','2015-06-30 02:36:12'),(533,37,39,0,0,0,0,'2015-06-30 02:36:12','2015-06-30 02:36:12'),(534,38,39,0,0,0,0,'2015-06-30 02:36:12','2015-06-30 02:36:12'),(535,18,39,1,1,1,1,'2015-06-30 02:36:12','2015-06-30 02:36:12'),(536,19,39,1,1,1,1,'2015-06-30 02:36:12','2015-06-30 02:36:12'),(537,39,39,0,0,0,0,'2015-06-30 02:36:12','2015-06-30 02:36:12'),(538,22,39,1,1,1,1,'2015-06-30 02:36:12','2015-06-30 02:36:12'),(539,25,39,0,0,0,0,'2015-06-30 02:36:12','2015-06-30 02:36:12'),(540,26,39,1,1,1,1,'2015-06-30 02:36:12','2015-06-30 02:36:12'),(541,1,40,1,1,1,1,'2015-06-30 02:36:12','2015-06-30 02:36:12'),(542,2,40,1,1,1,1,'2015-06-30 02:36:12','2015-06-30 02:36:12'),(543,27,40,0,0,0,0,'2015-06-30 02:36:12','2015-06-30 02:36:12'),(544,3,40,1,1,1,1,'2015-06-30 02:36:12','2015-06-30 02:36:12'),(545,5,40,1,1,1,1,'2015-06-30 02:36:12','2015-06-30 02:36:12'),(546,28,40,1,1,1,1,'2015-06-30 02:36:12','2015-06-30 02:36:12'),(547,6,40,1,1,1,1,'2015-06-30 02:36:12','2015-06-30 02:36:12'),(548,29,40,0,0,0,0,'2015-06-30 02:36:12','2015-06-30 02:36:12'),(549,30,40,0,0,0,0,'2015-06-30 02:36:12','2015-06-30 02:36:12'),(550,9,40,1,1,1,1,'2015-06-30 02:36:13','2015-06-30 02:36:13'),(551,31,40,0,0,0,0,'2015-06-30 02:36:13','2015-06-30 02:36:13'),(552,10,40,1,1,1,1,'2015-06-30 02:36:13','2015-06-30 02:36:13'),(553,11,40,1,1,1,1,'2015-06-30 02:36:13','2015-06-30 02:36:13'),(554,14,40,1,1,1,1,'2015-06-30 02:36:14','2015-06-30 02:36:14'),(555,32,40,0,0,0,0,'2015-06-30 02:36:14','2015-06-30 02:36:14'),(556,33,40,0,0,0,0,'2015-06-30 02:36:14','2015-06-30 02:36:14'),(557,34,40,0,0,0,0,'2015-06-30 02:36:16','2015-06-30 02:36:16'),(558,15,40,1,1,1,1,'2015-06-30 02:36:16','2015-06-30 02:36:16'),(559,35,40,0,0,0,0,'2015-06-30 02:36:16','2015-06-30 02:36:16'),(560,16,40,1,1,1,1,'2015-06-30 02:36:16','2015-06-30 02:36:16'),(561,36,40,0,0,0,0,'2015-06-30 02:36:16','2015-06-30 02:36:16'),(562,17,40,1,1,1,1,'2015-06-30 02:36:16','2015-06-30 02:36:16'),(563,37,40,0,0,0,0,'2015-06-30 02:36:16','2015-06-30 02:36:16'),(564,38,40,0,0,0,0,'2015-06-30 02:36:16','2015-06-30 02:36:16'),(565,18,40,1,1,1,1,'2015-06-30 02:36:17','2015-06-30 02:36:17'),(566,19,40,1,1,1,1,'2015-06-30 02:36:17','2015-06-30 02:36:17'),(567,39,40,0,0,0,0,'2015-06-30 02:36:17','2015-06-30 02:36:17'),(568,22,40,1,1,1,1,'2015-06-30 02:36:17','2015-06-30 02:36:17'),(569,25,40,0,0,0,0,'2015-06-30 02:36:17','2015-06-30 02:36:17'),(570,26,40,1,1,1,1,'2015-06-30 02:36:17','2015-06-30 02:36:17'),(571,1,41,1,1,1,1,'2015-06-30 02:36:17','2015-06-30 02:36:17'),(572,2,41,1,1,1,1,'2015-06-30 02:36:17','2015-06-30 02:36:17'),(573,27,41,0,0,0,0,'2015-06-30 02:36:17','2015-06-30 02:36:17'),(574,3,41,1,1,1,1,'2015-06-30 02:36:17','2015-06-30 02:36:17'),(575,5,41,1,1,1,1,'2015-06-30 02:36:17','2015-06-30 02:36:17'),(576,28,41,1,1,1,1,'2015-06-30 02:36:17','2015-06-30 02:36:17'),(577,6,41,1,1,1,1,'2015-06-30 02:36:17','2015-06-30 02:36:17'),(578,29,41,0,0,0,0,'2015-06-30 02:36:17','2015-06-30 02:36:17'),(579,30,41,0,0,0,0,'2015-06-30 02:36:17','2015-06-30 02:36:17'),(580,9,41,1,1,1,1,'2015-06-30 02:36:17','2015-06-30 02:36:17'),(581,31,41,0,0,0,0,'2015-06-30 02:36:17','2015-06-30 02:36:17'),(582,10,41,1,1,1,1,'2015-06-30 02:36:17','2015-06-30 02:36:17'),(583,11,41,1,1,1,1,'2015-06-30 02:36:17','2015-06-30 02:36:17'),(584,14,41,1,1,1,1,'2015-06-30 02:36:17','2015-06-30 02:36:17'),(585,32,41,0,0,0,0,'2015-06-30 02:36:17','2015-06-30 02:36:17'),(586,33,41,0,0,0,0,'2015-06-30 02:36:17','2015-06-30 02:36:17'),(587,34,41,0,0,0,0,'2015-06-30 02:36:18','2015-06-30 02:36:18'),(588,15,41,1,1,1,1,'2015-06-30 02:36:18','2015-06-30 02:36:18'),(589,35,41,0,0,0,0,'2015-06-30 02:36:18','2015-06-30 02:36:18'),(590,16,41,1,1,1,1,'2015-06-30 02:36:18','2015-06-30 02:36:18'),(591,36,41,0,0,0,0,'2015-06-30 02:36:18','2015-06-30 02:36:18'),(592,17,41,1,1,1,1,'2015-06-30 02:36:18','2015-06-30 02:36:18'),(593,37,41,0,0,0,0,'2015-06-30 02:36:18','2015-06-30 02:36:18'),(594,38,41,0,0,0,0,'2015-06-30 02:36:18','2015-06-30 02:36:18'),(595,18,41,1,1,1,1,'2015-06-30 02:36:18','2015-06-30 02:36:18'),(596,19,41,1,1,1,1,'2015-06-30 02:36:18','2015-06-30 02:36:18'),(597,39,41,0,0,0,0,'2015-06-30 02:36:18','2015-06-30 02:36:18'),(598,22,41,1,1,1,1,'2015-06-30 02:36:18','2015-06-30 02:36:18'),(599,25,41,0,0,0,0,'2015-06-30 02:36:18','2015-06-30 02:36:18'),(600,26,41,1,1,1,1,'2015-06-30 02:36:18','2015-06-30 02:36:18'),(601,1,102,1,1,1,1,'2015-06-30 02:36:18','2015-06-30 02:36:18'),(602,3,102,1,1,1,1,'2015-06-30 02:36:18','2015-06-30 02:36:18'),(603,5,102,1,1,1,1,'2015-06-30 02:36:19','2015-06-30 02:36:19'),(604,6,102,1,1,1,1,'2015-06-30 02:36:19','2015-06-30 02:36:19'),(605,9,102,1,1,1,1,'2015-06-30 02:36:19','2015-06-30 02:36:19'),(606,10,102,1,1,1,1,'2015-06-30 02:36:19','2015-06-30 02:36:19'),(607,14,102,1,1,1,1,'2015-06-30 02:36:19','2015-06-30 02:36:19'),(608,16,102,1,1,1,1,'2015-06-30 02:36:19','2015-06-30 02:36:19'),(609,18,102,1,1,1,1,'2015-06-30 02:36:19','2015-06-30 02:36:19'),(610,19,102,1,1,1,1,'2015-06-30 02:36:19','2015-06-30 02:36:19'),(611,22,102,1,1,1,1,'2015-06-30 02:36:19','2015-06-30 02:36:19'),(612,25,102,1,1,1,1,'2015-06-30 02:36:19','2015-06-30 02:36:19'),(613,1,1,0,0,0,0,'2015-06-30 02:36:19','2015-06-30 02:36:19'),(614,2,1,1,0,0,0,'2015-06-30 02:36:19','2015-06-30 02:36:19'),(615,3,1,1,0,0,0,'2015-06-30 02:36:19','2015-06-30 02:36:19'),(616,4,1,0,1,1,0,'2015-06-30 02:36:19','2015-06-30 02:36:19'),(617,5,1,0,0,0,1,'2015-06-30 02:36:19','2015-06-30 02:36:19'),(618,6,1,0,0,0,0,'2015-06-30 02:36:19','2015-06-30 02:36:19'),(619,7,1,1,1,1,1,'2015-06-30 02:36:19','2015-06-30 02:36:19'),(620,8,1,0,0,0,0,'2015-06-30 02:36:19','2015-06-30 02:36:19'),(621,9,1,0,0,0,0,'2015-06-30 02:36:19','2015-06-30 02:36:19'),(622,10,1,0,0,0,0,'2015-06-30 02:36:19','2015-06-30 02:36:19'),(623,11,1,0,0,0,0,'2015-06-30 02:36:20','2015-06-30 02:36:20'),(624,12,1,0,0,0,0,'2015-06-30 02:36:20','2015-06-30 02:36:20'),(625,13,1,0,0,0,0,'2015-06-30 02:36:20','2015-06-30 02:36:20'),(626,14,1,0,0,0,0,'2015-06-30 02:36:20','2015-06-30 02:36:20'),(627,15,1,0,0,0,0,'2015-06-30 02:36:20','2015-06-30 02:36:20'),(628,16,1,0,0,0,0,'2015-06-30 02:36:20','2015-06-30 02:36:20'),(629,17,1,0,0,0,0,'2015-06-30 02:36:20','2015-06-30 02:36:20'),(630,18,1,0,0,0,0,'2015-06-30 02:36:20','2015-06-30 02:36:20'),(631,19,1,0,0,0,0,'2015-06-30 02:36:20','2015-06-30 02:36:20'),(632,20,1,0,0,0,0,'2015-06-30 02:36:20','2015-06-30 02:36:20'),(633,21,1,0,0,0,0,'2015-06-30 02:36:20','2015-06-30 02:36:20'),(634,22,1,0,0,0,0,'2015-06-30 02:36:20','2015-06-30 02:36:20'),(635,23,1,0,0,0,0,'2015-06-30 02:36:20','2015-06-30 02:36:20'),(636,24,1,0,0,0,0,'2015-06-30 02:36:20','2015-06-30 02:36:20'),(637,25,1,0,0,0,0,'2015-06-30 02:36:20','2015-06-30 02:36:20'),(638,26,1,0,0,0,0,'2015-06-30 02:36:20','2015-06-30 02:36:20'),(639,1,103,1,1,1,1,'2015-06-30 02:36:20','2015-06-30 02:36:20'),(640,3,103,1,1,1,1,'2015-06-30 02:36:20','2015-06-30 02:36:20'),(641,5,103,1,1,1,1,'2015-06-30 02:36:20','2015-06-30 02:36:20'),(642,6,103,1,1,1,1,'2015-06-30 02:36:21','2015-06-30 02:36:21'),(643,9,103,0,0,0,0,'2015-06-30 02:36:21','2015-06-30 02:36:21'),(644,10,103,1,1,1,1,'2015-06-30 02:36:21','2015-06-30 02:36:21'),(645,14,103,1,1,1,1,'2015-06-30 02:36:21','2015-06-30 02:36:21'),(646,16,103,1,1,1,1,'2015-06-30 02:36:21','2015-06-30 02:36:21'),(647,18,103,1,1,1,1,'2015-06-30 02:36:21','2015-06-30 02:36:21'),(648,19,103,1,1,1,1,'2015-06-30 02:36:21','2015-06-30 02:36:21'),(649,22,103,1,1,1,1,'2015-06-30 02:36:21','2015-06-30 02:36:21'),(650,25,103,1,1,1,1,'2015-06-30 02:36:21','2015-06-30 02:36:21'),(651,1,2,1,1,1,1,'2015-06-30 02:36:21','2015-06-30 02:36:21'),(652,2,2,1,1,1,1,'2015-06-30 02:36:21','2015-06-30 02:36:21'),(653,3,2,1,1,1,1,'2015-06-30 02:36:21','2015-06-30 02:36:21'),(654,4,2,1,1,1,1,'2015-06-30 02:36:21','2015-06-30 02:36:21'),(655,5,2,1,1,1,1,'2015-06-30 02:36:21','2015-06-30 02:36:21'),(656,6,2,1,1,1,1,'2015-06-30 02:36:21','2015-06-30 02:36:21'),(657,7,2,1,1,1,1,'2015-06-30 02:36:21','2015-06-30 02:36:21'),(658,8,2,1,1,1,1,'2015-06-30 02:36:21','2015-06-30 02:36:21'),(659,9,2,1,1,1,1,'2015-06-30 02:36:21','2015-06-30 02:36:21'),(660,10,2,1,1,1,1,'2015-06-30 02:36:21','2015-06-30 02:36:21'),(661,11,2,1,1,1,1,'2015-06-30 02:36:21','2015-06-30 02:36:21'),(662,12,2,1,1,1,1,'2015-06-30 02:36:21','2015-06-30 02:36:21'),(663,13,2,1,1,1,1,'2015-06-30 02:36:21','2015-06-30 02:36:21'),(664,14,2,1,1,1,1,'2015-06-30 02:36:22','2015-06-30 02:36:22'),(665,15,2,1,1,1,1,'2015-06-30 02:36:22','2015-06-30 02:36:22'),(666,16,2,0,0,0,0,'2015-06-30 02:36:22','2015-06-30 02:36:22'),(667,17,2,1,1,1,1,'2015-06-30 02:36:22','2015-06-30 02:36:22'),(668,18,2,1,1,1,1,'2015-06-30 02:36:23','2015-06-30 02:36:23'),(669,19,2,1,1,1,1,'2015-06-30 02:36:23','2015-06-30 02:36:23'),(670,20,2,1,1,1,1,'2015-06-30 02:36:23','2015-06-30 02:36:23'),(671,21,2,1,1,1,1,'2015-06-30 02:36:23','2015-06-30 02:36:23'),(672,22,2,1,1,1,1,'2015-06-30 02:36:23','2015-06-30 02:36:23'),(673,23,2,1,1,1,1,'2015-06-30 02:36:23','2015-06-30 02:36:23'),(674,24,2,1,1,1,1,'2015-06-30 02:36:23','2015-06-30 02:36:23'),(675,25,2,1,1,1,1,'2015-06-30 02:36:23','2015-06-30 02:36:23'),(676,26,2,1,1,1,1,'2015-06-30 02:36:23','2015-06-30 02:36:23'),(677,1,104,0,0,0,0,'2015-06-30 02:36:23','2015-06-30 02:36:23'),(678,3,104,1,1,1,1,'2015-06-30 02:36:24','2015-06-30 02:36:24'),(679,5,104,1,1,1,1,'2015-06-30 02:36:24','2015-06-30 02:36:24'),(680,6,104,1,1,1,1,'2015-06-30 02:36:24','2015-06-30 02:36:24'),(681,9,104,1,1,1,1,'2015-06-30 02:36:24','2015-06-30 02:36:24'),(682,10,104,1,1,1,1,'2015-06-30 02:36:24','2015-06-30 02:36:24'),(683,14,104,1,1,1,1,'2015-06-30 02:36:24','2015-06-30 02:36:24'),(684,16,104,1,1,1,1,'2015-06-30 02:36:24','2015-06-30 02:36:24'),(685,18,104,1,1,1,1,'2015-06-30 02:36:24','2015-06-30 02:36:24'),(686,19,104,1,1,1,1,'2015-06-30 02:36:24','2015-06-30 02:36:24'),(687,22,104,1,1,1,1,'2015-06-30 02:36:24','2015-06-30 02:36:24'),(688,25,104,1,1,1,1,'2015-06-30 02:36:24','2015-06-30 02:36:24'),(689,1,3,0,0,0,0,'2015-06-30 02:36:25','2015-06-30 02:36:25'),(690,2,3,1,1,1,1,'2015-06-30 02:36:25','2015-06-30 02:36:25'),(691,3,3,1,1,1,1,'2015-06-30 02:36:25','2015-06-30 02:36:25'),(692,4,3,1,1,1,1,'2015-06-30 02:36:25','2015-06-30 02:36:25'),(693,5,3,1,1,1,1,'2015-06-30 02:36:26','2015-06-30 02:36:26'),(694,6,3,1,1,1,1,'2015-06-30 02:36:26','2015-06-30 02:36:26'),(695,7,3,0,0,0,0,'2015-06-30 02:36:26','2015-06-30 02:36:26'),(696,8,3,1,1,1,1,'2015-06-30 02:36:26','2015-06-30 02:36:26'),(697,9,3,0,0,0,0,'2015-06-30 02:36:26','2015-06-30 02:36:26'),(698,10,3,1,1,1,1,'2015-06-30 02:36:26','2015-06-30 02:36:26'),(699,11,3,0,0,0,0,'2015-06-30 02:36:27','2015-06-30 02:36:27'),(700,12,3,0,0,0,0,'2015-06-30 02:36:27','2015-06-30 02:36:27'),(701,13,3,1,1,1,1,'2015-06-30 02:36:27','2015-06-30 02:36:27'),(702,14,3,1,1,1,1,'2015-06-30 02:36:27','2015-06-30 02:36:27'),(703,15,3,1,1,1,1,'2015-06-30 02:36:27','2015-06-30 02:36:27'),(704,16,3,1,1,1,1,'2015-06-30 02:36:27','2015-06-30 02:36:27'),(705,17,3,0,0,0,0,'2015-06-30 02:36:27','2015-06-30 02:36:27'),(706,18,3,1,1,1,1,'2015-06-30 02:36:27','2015-06-30 02:36:27'),(707,19,3,1,1,1,1,'2015-06-30 02:36:27','2015-06-30 02:36:27'),(708,20,3,1,1,1,1,'2015-06-30 02:36:27','2015-06-30 02:36:27'),(709,21,3,1,1,1,1,'2015-06-30 02:36:27','2015-06-30 02:36:27'),(710,22,3,1,1,1,1,'2015-06-30 02:36:27','2015-06-30 02:36:27'),(711,23,3,1,1,1,1,'2015-06-30 02:36:27','2015-06-30 02:36:27'),(712,24,3,1,1,1,1,'2015-06-30 02:36:27','2015-06-30 02:36:27'),(713,25,3,1,1,1,1,'2015-06-30 02:36:27','2015-06-30 02:36:27'),(714,26,3,1,1,1,1,'2015-06-30 02:36:27','2015-06-30 02:36:27'),(715,1,105,0,0,0,0,'2015-06-30 02:36:27','2015-06-30 02:36:27'),(716,3,105,1,1,1,1,'2015-06-30 02:36:27','2015-06-30 02:36:27'),(717,5,105,1,1,1,1,'2015-06-30 02:36:27','2015-06-30 02:36:27'),(718,6,105,1,1,1,1,'2015-06-30 02:36:27','2015-06-30 02:36:27'),(719,9,105,0,0,0,0,'2015-06-30 02:36:27','2015-06-30 02:36:27'),(720,10,105,1,1,1,1,'2015-06-30 02:36:27','2015-06-30 02:36:27'),(721,14,105,1,1,1,1,'2015-06-30 02:36:28','2015-06-30 02:36:28'),(722,16,105,0,1,1,1,'2015-06-30 02:36:28','2015-06-30 02:36:28'),(723,18,105,1,1,1,1,'2015-06-30 02:36:28','2015-06-30 02:36:28'),(724,19,105,1,1,1,1,'2015-06-30 02:36:28','2015-06-30 02:36:28'),(725,22,105,1,1,1,1,'2015-06-30 02:36:28','2015-06-30 02:36:28'),(726,25,105,0,0,0,0,'2015-06-30 02:36:28','2015-06-30 02:36:28'),(727,1,4,0,0,0,0,'2015-06-30 02:36:28','2015-06-30 02:36:28'),(728,2,4,0,0,0,0,'2015-06-30 02:36:28','2015-06-30 02:36:28'),(729,3,4,1,1,1,1,'2015-06-30 02:36:28','2015-06-30 02:36:28'),(730,4,4,1,1,1,1,'2015-06-30 02:36:28','2015-06-30 02:36:28'),(731,5,4,0,0,0,0,'2015-06-30 02:36:28','2015-06-30 02:36:28'),(732,6,4,1,1,1,1,'2015-06-30 02:36:28','2015-06-30 02:36:28'),(733,7,4,1,1,1,1,'2015-06-30 02:36:28','2015-06-30 02:36:28'),(734,8,4,1,1,1,1,'2015-06-30 02:36:28','2015-06-30 02:36:28'),(735,9,4,1,1,1,1,'2015-06-30 02:36:28','2015-06-30 02:36:28'),(736,10,4,1,1,1,1,'2015-06-30 02:36:28','2015-06-30 02:36:28'),(737,11,4,1,1,1,1,'2015-06-30 02:36:28','2015-06-30 02:36:28'),(738,12,4,0,0,0,0,'2015-06-30 02:36:28','2015-06-30 02:36:28'),(739,13,4,1,1,1,1,'2015-06-30 02:36:28','2015-06-30 02:36:28'),(740,14,4,0,0,0,0,'2015-06-30 02:36:28','2015-06-30 02:36:28'),(741,15,4,0,0,0,0,'2015-06-30 02:36:28','2015-06-30 02:36:28'),(742,16,4,0,0,0,0,'2015-06-30 02:36:28','2015-06-30 02:36:28'),(743,17,4,1,1,1,1,'2015-06-30 02:36:29','2015-06-30 02:36:29'),(744,18,4,1,1,1,1,'2015-06-30 02:36:29','2015-06-30 02:36:29'),(745,19,4,1,1,1,1,'2015-06-30 02:36:29','2015-06-30 02:36:29'),(746,20,4,1,1,1,1,'2015-06-30 02:36:29','2015-06-30 02:36:29'),(747,21,4,1,1,1,1,'2015-06-30 02:36:29','2015-06-30 02:36:29'),(748,22,4,1,1,1,1,'2015-06-30 02:36:29','2015-06-30 02:36:29'),(749,23,4,1,1,1,1,'2015-06-30 02:36:29','2015-06-30 02:36:29'),(750,24,4,1,1,1,1,'2015-06-30 02:36:29','2015-06-30 02:36:29'),(751,25,4,1,1,1,1,'2015-06-30 02:36:29','2015-06-30 02:36:29'),(752,26,4,1,1,0,0,'2015-06-30 02:36:29','2015-06-30 02:36:29'),(753,1,106,0,0,0,0,'2015-06-30 02:36:29','2015-06-30 02:36:29'),(754,3,106,1,1,1,1,'2015-06-30 02:36:29','2015-06-30 02:36:29'),(755,5,106,1,1,1,1,'2015-06-30 02:36:29','2015-06-30 02:36:29'),(756,6,106,1,1,1,1,'2015-06-30 02:36:29','2015-06-30 02:36:29'),(757,9,106,1,1,1,1,'2015-06-30 02:36:29','2015-06-30 02:36:29'),(758,10,106,1,1,1,1,'2015-06-30 02:36:29','2015-06-30 02:36:29'),(759,14,106,0,0,0,0,'2015-06-30 02:36:29','2015-06-30 02:36:29'),(760,16,106,0,0,0,0,'2015-06-30 02:36:29','2015-06-30 02:36:29'),(761,18,106,0,0,0,0,'2015-06-30 02:36:29','2015-06-30 02:36:29'),(762,19,106,1,1,1,1,'2015-06-30 02:36:29','2015-06-30 02:36:29'),(763,22,106,0,0,0,0,'2015-06-30 02:36:29','2015-06-30 02:36:29'),(764,25,106,1,1,1,1,'2015-06-30 02:36:29','2015-06-30 02:36:29'),(765,1,5,0,0,0,0,'2015-06-30 02:36:30','2015-06-30 02:36:30'),(766,2,5,1,1,1,1,'2015-06-30 02:36:30','2015-06-30 02:36:30'),(767,3,5,1,1,1,1,'2015-06-30 02:36:30','2015-06-30 02:36:30'),(768,4,5,1,1,1,1,'2015-06-30 02:36:30','2015-06-30 02:36:30'),(769,5,5,1,1,1,1,'2015-06-30 02:36:30','2015-06-30 02:36:30'),(770,6,5,1,1,1,1,'2015-06-30 02:36:30','2015-06-30 02:36:30'),(771,7,5,1,1,1,1,'2015-06-30 02:36:30','2015-06-30 02:36:30'),(772,8,5,1,1,1,1,'2015-06-30 02:36:30','2015-06-30 02:36:30'),(773,9,5,1,1,1,1,'2015-06-30 02:36:30','2015-06-30 02:36:30'),(774,10,5,1,1,1,1,'2015-06-30 02:36:30','2015-06-30 02:36:30'),(775,11,5,1,1,1,1,'2015-06-30 02:36:30','2015-06-30 02:36:30'),(776,12,5,0,0,0,0,'2015-06-30 02:36:30','2015-06-30 02:36:30'),(777,13,5,0,0,0,0,'2015-06-30 02:36:30','2015-06-30 02:36:30'),(778,14,5,1,1,1,1,'2015-06-30 02:36:30','2015-06-30 02:36:30'),(779,15,5,1,1,1,1,'2015-06-30 02:36:30','2015-06-30 02:36:30'),(780,16,5,1,1,1,1,'2015-06-30 02:36:30','2015-06-30 02:36:30'),(781,17,5,1,1,1,1,'2015-06-30 02:36:30','2015-06-30 02:36:30'),(782,18,5,1,1,1,1,'2015-06-30 02:36:30','2015-06-30 02:36:30'),(783,19,5,1,1,1,1,'2015-06-30 02:36:30','2015-06-30 02:36:30'),(784,20,5,1,1,1,1,'2015-06-30 02:36:31','2015-06-30 02:36:31'),(785,21,5,1,1,1,1,'2015-06-30 02:36:31','2015-06-30 02:36:31'),(786,22,5,1,1,1,1,'2015-06-30 02:36:31','2015-06-30 02:36:31'),(787,23,5,1,1,1,1,'2015-06-30 02:36:31','2015-06-30 02:36:31'),(788,24,5,1,1,1,1,'2015-06-30 02:36:31','2015-06-30 02:36:31'),(789,25,5,1,1,1,1,'2015-06-30 02:36:31','2015-06-30 02:36:31'),(790,26,5,1,1,1,1,'2015-06-30 02:36:31','2015-06-30 02:36:31'),(791,1,107,0,0,0,0,'2015-06-30 02:36:31','2015-06-30 02:36:31'),(792,3,107,1,1,1,1,'2015-06-30 02:36:31','2015-06-30 02:36:31'),(793,5,107,1,1,1,1,'2015-06-30 02:36:31','2015-06-30 02:36:31'),(794,6,107,1,1,1,1,'2015-06-30 02:36:31','2015-06-30 02:36:31'),(795,9,107,0,0,0,0,'2015-06-30 02:36:31','2015-06-30 02:36:31'),(796,10,107,0,0,0,0,'2015-06-30 02:36:31','2015-06-30 02:36:31'),(797,14,107,1,1,1,1,'2015-06-30 02:36:31','2015-06-30 02:36:31'),(798,16,107,0,0,0,0,'2015-06-30 02:36:31','2015-06-30 02:36:31'),(799,18,107,1,1,1,1,'2015-06-30 02:36:32','2015-06-30 02:36:32'),(800,19,107,1,1,1,1,'2015-06-30 02:36:32','2015-06-30 02:36:32'),(801,22,107,1,1,1,1,'2015-06-30 02:36:32','2015-06-30 02:36:32'),(802,25,107,1,1,1,1,'2015-06-30 02:36:32','2015-06-30 02:36:32'),(803,1,6,0,0,0,0,'2015-06-30 02:36:32','2015-06-30 02:36:32'),(804,2,6,1,1,1,1,'2015-06-30 02:36:32','2015-06-30 02:36:32'),(805,3,6,1,1,1,1,'2015-06-30 02:36:32','2015-06-30 02:36:32'),(806,4,6,1,1,1,1,'2015-06-30 02:36:32','2015-06-30 02:36:32'),(807,5,6,1,1,1,1,'2015-06-30 02:36:32','2015-06-30 02:36:32'),(808,6,6,1,1,1,1,'2015-06-30 02:36:32','2015-06-30 02:36:32'),(809,7,6,1,1,1,1,'2015-06-30 02:36:32','2015-06-30 02:36:32'),(810,8,6,0,0,0,0,'2015-06-30 02:36:32','2015-06-30 02:36:32'),(811,9,6,0,0,0,0,'2015-06-30 02:36:32','2015-06-30 02:36:32'),(812,10,6,1,1,1,1,'2015-06-30 02:36:32','2015-06-30 02:36:32'),(813,11,6,1,1,1,1,'2015-06-30 02:36:32','2015-06-30 02:36:32'),(814,12,6,0,0,0,0,'2015-06-30 02:36:32','2015-06-30 02:36:32'),(815,13,6,1,1,1,1,'2015-06-30 02:36:32','2015-06-30 02:36:32'),(816,14,6,1,1,1,1,'2015-06-30 02:36:32','2015-06-30 02:36:32'),(817,15,6,1,1,1,1,'2015-06-30 02:36:32','2015-06-30 02:36:32'),(818,16,6,0,0,0,0,'2015-06-30 02:36:33','2015-06-30 02:36:33'),(819,17,6,0,0,0,0,'2015-06-30 02:36:33','2015-06-30 02:36:33'),(820,18,6,1,1,1,1,'2015-06-30 02:36:33','2015-06-30 02:36:33'),(821,19,6,1,1,1,1,'2015-06-30 02:36:33','2015-06-30 02:36:33'),(822,20,6,0,0,0,0,'2015-06-30 02:36:33','2015-06-30 02:36:33'),(823,21,6,1,1,1,1,'2015-06-30 02:36:33','2015-06-30 02:36:33'),(824,22,6,1,1,1,1,'2015-06-30 02:36:33','2015-06-30 02:36:33'),(825,23,6,1,1,1,1,'2015-06-30 02:36:33','2015-06-30 02:36:33'),(826,24,6,1,1,1,1,'2015-06-30 02:36:33','2015-06-30 02:36:33'),(827,25,6,1,1,1,1,'2015-06-30 02:36:33','2015-06-30 02:36:33'),(828,26,6,1,1,1,1,'2015-06-30 02:36:33','2015-06-30 02:36:33'),(829,1,108,0,0,0,0,'2015-06-30 02:36:33','2015-06-30 02:36:33'),(830,3,108,1,1,1,1,'2015-06-30 02:36:33','2015-06-30 02:36:33'),(831,5,108,0,0,0,0,'2015-06-30 02:36:33','2015-06-30 02:36:33'),(832,6,108,1,1,1,1,'2015-06-30 02:36:33','2015-06-30 02:36:33'),(833,9,108,1,1,1,1,'2015-06-30 02:36:33','2015-06-30 02:36:33'),(834,10,108,0,0,0,0,'2015-06-30 02:36:34','2015-06-30 02:36:34'),(835,14,108,1,1,1,1,'2015-06-30 02:36:34','2015-06-30 02:36:34'),(836,16,108,0,0,0,0,'2015-06-30 02:36:34','2015-06-30 02:36:34'),(837,18,108,1,1,1,1,'2015-06-30 02:36:34','2015-06-30 02:36:34'),(838,19,108,0,0,0,0,'2015-06-30 02:36:34','2015-06-30 02:36:34'),(839,22,108,1,1,1,1,'2015-06-30 02:36:34','2015-06-30 02:36:34'),(840,25,108,1,1,1,1,'2015-06-30 02:36:34','2015-06-30 02:36:34'),(841,1,7,0,0,0,0,'2015-06-30 02:36:34','2015-06-30 02:36:34'),(842,2,7,1,1,1,1,'2015-06-30 02:36:34','2015-06-30 02:36:34'),(843,3,7,1,1,1,1,'2015-06-30 02:36:34','2015-06-30 02:36:34'),(844,4,7,1,1,1,1,'2015-06-30 02:36:34','2015-06-30 02:36:34'),(845,5,7,1,1,1,1,'2015-06-30 02:36:34','2015-06-30 02:36:34'),(846,6,7,1,1,1,1,'2015-06-30 02:36:34','2015-06-30 02:36:34'),(847,7,7,1,1,1,1,'2015-06-30 02:36:34','2015-06-30 02:36:34'),(848,8,7,1,1,1,1,'2015-06-30 02:36:34','2015-06-30 02:36:34'),(849,9,7,0,0,0,0,'2015-06-30 02:36:34','2015-06-30 02:36:34'),(850,10,7,1,1,1,1,'2015-06-30 02:36:34','2015-06-30 02:36:34'),(851,11,7,1,1,1,1,'2015-06-30 02:36:34','2015-06-30 02:36:34'),(852,12,7,0,0,0,0,'2015-06-30 02:36:35','2015-06-30 02:36:35'),(853,13,7,1,1,1,1,'2015-06-30 02:36:35','2015-06-30 02:36:35'),(854,14,7,1,1,1,1,'2015-06-30 02:36:35','2015-06-30 02:36:35'),(855,15,7,1,1,1,1,'2015-06-30 02:36:35','2015-06-30 02:36:35'),(856,16,7,0,0,0,0,'2015-06-30 02:36:35','2015-06-30 02:36:35'),(857,17,7,1,1,1,1,'2015-06-30 02:36:35','2015-06-30 02:36:35'),(858,18,7,1,1,1,1,'2015-06-30 02:36:35','2015-06-30 02:36:35'),(859,19,7,1,1,1,1,'2015-06-30 02:36:35','2015-06-30 02:36:35'),(860,20,7,1,1,1,1,'2015-06-30 02:36:35','2015-06-30 02:36:35'),(861,21,7,1,1,1,1,'2015-06-30 02:36:35','2015-06-30 02:36:35'),(862,22,7,1,1,1,1,'2015-06-30 02:36:35','2015-06-30 02:36:35'),(863,23,7,1,1,1,1,'2015-06-30 02:36:35','2015-06-30 02:36:35'),(864,24,7,1,1,1,1,'2015-06-30 02:36:35','2015-06-30 02:36:35'),(865,25,7,1,1,1,1,'2015-06-30 02:36:36','2015-06-30 02:36:36'),(866,26,7,1,1,1,1,'2015-06-30 02:36:36','2015-06-30 02:36:36'),(867,1,109,0,0,0,0,'2015-06-30 02:36:36','2015-06-30 02:36:36'),(868,3,109,1,1,1,1,'2015-06-30 02:36:36','2015-06-30 02:36:36'),(869,5,109,1,1,1,1,'2015-06-30 02:36:36','2015-06-30 02:36:36'),(870,6,109,1,1,1,1,'2015-06-30 02:36:36','2015-06-30 02:36:36'),(871,9,109,1,1,0,0,'2015-06-30 02:36:36','2015-06-30 02:36:36'),(872,10,109,0,0,0,0,'2015-06-30 02:36:36','2015-06-30 02:36:36'),(873,14,109,0,0,0,0,'2015-06-30 02:36:36','2015-06-30 02:36:36'),(874,16,109,0,0,0,0,'2015-06-30 02:36:36','2015-06-30 02:36:36'),(875,18,109,1,1,1,1,'2015-06-30 02:36:36','2015-06-30 02:36:36'),(876,19,109,1,1,1,1,'2015-06-30 02:36:36','2015-06-30 02:36:36'),(877,22,109,1,1,1,1,'2015-06-30 02:36:36','2015-06-30 02:36:36'),(878,25,109,1,1,1,1,'2015-06-30 02:36:36','2015-06-30 02:36:36'),(879,1,8,0,0,0,0,'2015-06-30 02:36:36','2015-06-30 02:36:36'),(880,2,8,1,1,1,1,'2015-06-30 02:36:36','2015-06-30 02:36:36'),(881,3,8,1,1,1,1,'2015-06-30 02:36:36','2015-06-30 02:36:36'),(882,4,8,1,1,1,1,'2015-06-30 02:36:37','2015-06-30 02:36:37'),(883,5,8,1,1,1,1,'2015-06-30 02:36:37','2015-06-30 02:36:37'),(884,6,8,1,1,1,1,'2015-06-30 02:36:37','2015-06-30 02:36:37'),(885,7,8,1,1,1,1,'2015-06-30 02:36:37','2015-06-30 02:36:37'),(886,8,8,1,1,1,1,'2015-06-30 02:36:37','2015-06-30 02:36:37'),(887,9,8,0,0,0,0,'2015-06-30 02:36:37','2015-06-30 02:36:37'),(888,10,8,1,1,1,1,'2015-06-30 02:36:37','2015-06-30 02:36:37'),(889,11,8,1,1,1,1,'2015-06-30 02:36:37','2015-06-30 02:36:37'),(890,12,8,0,0,0,0,'2015-06-30 02:36:37','2015-06-30 02:36:37'),(891,13,8,0,0,0,0,'2015-06-30 02:36:37','2015-06-30 02:36:37'),(892,14,8,1,1,1,1,'2015-06-30 02:36:37','2015-06-30 02:36:37'),(893,15,8,1,1,1,1,'2015-06-30 02:36:37','2015-06-30 02:36:37'),(894,16,8,0,0,0,0,'2015-06-30 02:36:37','2015-06-30 02:36:37'),(895,17,8,1,1,1,1,'2015-06-30 02:36:37','2015-06-30 02:36:37'),(896,18,8,1,1,1,1,'2015-06-30 02:36:37','2015-06-30 02:36:37'),(897,19,8,1,1,1,1,'2015-06-30 02:36:37','2015-06-30 02:36:37'),(898,20,8,1,1,1,1,'2015-06-30 02:36:37','2015-06-30 02:36:37'),(899,21,8,1,1,1,1,'2015-06-30 02:36:37','2015-06-30 02:36:37'),(900,22,8,1,1,1,1,'2015-06-30 02:36:37','2015-06-30 02:36:37'),(901,23,8,1,1,1,1,'2015-06-30 02:36:38','2015-06-30 02:36:38'),(902,24,8,1,1,1,1,'2015-06-30 02:36:38','2015-06-30 02:36:38'),(903,25,8,1,1,1,1,'2015-06-30 02:36:38','2015-06-30 02:36:38'),(904,26,8,1,1,1,1,'2015-06-30 02:36:38','2015-06-30 02:36:38'),(905,1,110,0,0,0,0,'2015-06-30 02:36:38','2015-06-30 02:36:38'),(906,3,110,1,1,1,1,'2015-06-30 02:36:38','2015-06-30 02:36:38'),(907,5,110,1,1,1,1,'2015-06-30 02:36:38','2015-06-30 02:36:38'),(908,6,110,1,1,1,1,'2015-06-30 02:36:38','2015-06-30 02:36:38'),(909,9,110,0,0,0,0,'2015-06-30 02:36:38','2015-06-30 02:36:38'),(910,10,110,1,1,1,1,'2015-06-30 02:36:38','2015-06-30 02:36:38'),(911,14,110,1,1,1,1,'2015-06-30 02:36:38','2015-06-30 02:36:38'),(912,16,110,1,1,1,1,'2015-06-30 02:36:38','2015-06-30 02:36:38'),(913,18,110,1,1,1,1,'2015-06-30 02:36:38','2015-06-30 02:36:38'),(914,19,110,1,1,1,1,'2015-06-30 02:36:38','2015-06-30 02:36:38'),(915,22,110,1,1,1,1,'2015-06-30 02:36:38','2015-06-30 02:36:38'),(916,25,110,1,1,1,1,'2015-06-30 02:36:38','2015-06-30 02:36:38'),(917,1,9,0,0,0,0,'2015-06-30 02:36:38','2015-06-30 02:36:38'),(918,2,9,1,1,1,1,'2015-06-30 02:36:38','2015-06-30 02:36:38'),(919,3,9,1,1,1,1,'2015-06-30 02:36:38','2015-06-30 02:36:38'),(920,4,9,1,1,1,1,'2015-06-30 02:36:38','2015-06-30 02:36:38'),(921,5,9,1,1,1,1,'2015-06-30 02:36:39','2015-06-30 02:36:39'),(922,6,9,1,1,1,1,'2015-06-30 02:36:39','2015-06-30 02:36:39'),(923,7,9,1,1,1,1,'2015-06-30 02:36:39','2015-06-30 02:36:39'),(924,8,9,1,1,1,1,'2015-06-30 02:36:39','2015-06-30 02:36:39'),(925,9,9,1,1,1,1,'2015-06-30 02:36:39','2015-06-30 02:36:39'),(926,10,9,1,1,1,1,'2015-06-30 02:36:39','2015-06-30 02:36:39'),(927,11,9,1,1,1,1,'2015-06-30 02:36:39','2015-06-30 02:36:39'),(928,12,9,0,0,0,0,'2015-06-30 02:36:39','2015-06-30 02:36:39'),(929,13,9,1,1,1,1,'2015-06-30 02:36:39','2015-06-30 02:36:39'),(930,14,9,1,1,1,1,'2015-06-30 02:36:39','2015-06-30 02:36:39'),(931,15,9,1,1,1,1,'2015-06-30 02:36:39','2015-06-30 02:36:39'),(932,16,9,1,1,1,1,'2015-06-30 02:36:39','2015-06-30 02:36:39'),(933,17,9,1,1,1,1,'2015-06-30 02:36:39','2015-06-30 02:36:39'),(934,18,9,1,1,1,1,'2015-06-30 02:36:39','2015-06-30 02:36:39'),(935,19,9,1,1,1,1,'2015-06-30 02:36:39','2015-06-30 02:36:39'),(936,20,9,1,1,1,1,'2015-06-30 02:36:39','2015-06-30 02:36:39'),(937,21,9,1,1,1,1,'2015-06-30 02:36:39','2015-06-30 02:36:39'),(938,22,9,1,1,1,1,'2015-06-30 02:36:39','2015-06-30 02:36:39'),(939,23,9,1,1,1,1,'2015-06-30 02:36:39','2015-06-30 02:36:39'),(940,24,9,1,1,1,1,'2015-06-30 02:36:39','2015-06-30 02:36:39'),(941,25,9,1,1,1,1,'2015-06-30 02:36:39','2015-06-30 02:36:39'),(942,26,9,1,1,1,1,'2015-06-30 02:36:40','2015-06-30 02:36:40'),(943,1,111,0,0,0,0,'2015-06-30 02:36:40','2015-06-30 02:36:40'),(944,3,111,1,1,1,1,'2015-06-30 02:36:40','2015-06-30 02:36:40'),(945,5,111,1,1,1,1,'2015-06-30 02:36:40','2015-06-30 02:36:40'),(946,6,111,1,1,1,1,'2015-06-30 02:36:40','2015-06-30 02:36:40'),(947,9,111,0,0,0,0,'2015-06-30 02:36:40','2015-06-30 02:36:40'),(948,10,111,1,1,1,1,'2015-06-30 02:36:40','2015-06-30 02:36:40'),(949,14,111,0,0,0,0,'2015-06-30 02:36:40','2015-06-30 02:36:40'),(950,16,111,1,1,1,1,'2015-06-30 02:36:40','2015-06-30 02:36:40'),(951,18,111,1,1,1,1,'2015-06-30 02:36:40','2015-06-30 02:36:40'),(952,19,111,0,0,0,0,'2015-06-30 02:36:40','2015-06-30 02:36:40'),(953,22,111,1,1,1,1,'2015-06-30 02:36:40','2015-06-30 02:36:40'),(954,25,111,1,1,1,1,'2015-06-30 02:36:40','2015-06-30 02:36:40'),(955,1,10,0,0,0,0,'2015-06-30 02:36:40','2015-06-30 02:36:40'),(956,2,10,1,1,1,1,'2015-06-30 02:36:40','2015-06-30 02:36:40'),(957,3,10,1,1,1,1,'2015-06-30 02:36:40','2015-06-30 02:36:40'),(958,4,10,1,1,1,1,'2015-06-30 02:36:40','2015-06-30 02:36:40'),(959,5,10,0,0,0,0,'2015-06-30 02:36:40','2015-06-30 02:36:40'),(960,6,10,1,1,1,1,'2015-06-30 02:36:40','2015-06-30 02:36:40'),(961,7,10,1,1,1,1,'2015-06-30 02:36:40','2015-06-30 02:36:40'),(962,8,10,0,0,0,0,'2015-06-30 02:36:40','2015-06-30 02:36:40'),(963,9,10,0,0,0,0,'2015-06-30 02:36:40','2015-06-30 02:36:40'),(964,10,10,1,1,1,1,'2015-06-30 02:36:41','2015-06-30 02:36:41'),(965,11,10,1,1,1,1,'2015-06-30 02:36:41','2015-06-30 02:36:41'),(966,12,10,0,0,0,0,'2015-06-30 02:36:41','2015-06-30 02:36:41'),(967,13,10,0,0,0,0,'2015-06-30 02:36:41','2015-06-30 02:36:41'),(968,14,10,1,1,1,1,'2015-06-30 02:36:41','2015-06-30 02:36:41'),(969,15,10,1,1,1,1,'2015-06-30 02:36:41','2015-06-30 02:36:41'),(970,16,10,1,1,1,1,'2015-06-30 02:36:41','2015-06-30 02:36:41'),(971,17,10,1,1,1,1,'2015-06-30 02:36:41','2015-06-30 02:36:41'),(972,18,10,1,1,1,1,'2015-06-30 02:36:41','2015-06-30 02:36:41'),(973,19,10,0,0,0,0,'2015-06-30 02:36:41','2015-06-30 02:36:41'),(974,20,10,1,1,1,1,'2015-06-30 02:36:41','2015-06-30 02:36:41'),(975,21,10,1,1,1,1,'2015-06-30 02:36:41','2015-06-30 02:36:41'),(976,22,10,1,1,1,1,'2015-06-30 02:36:41','2015-06-30 02:36:41'),(977,23,10,1,1,1,1,'2015-06-30 02:36:41','2015-06-30 02:36:41'),(978,24,10,1,1,1,1,'2015-06-30 02:36:41','2015-06-30 02:36:41'),(979,25,10,1,1,1,1,'2015-06-30 02:36:41','2015-06-30 02:36:41'),(980,26,10,1,1,1,1,'2015-06-30 02:36:42','2015-06-30 02:36:42'),(981,1,112,0,0,0,0,'2015-06-30 02:36:42','2015-06-30 02:36:42'),(982,3,112,1,1,1,1,'2015-06-30 02:36:42','2015-06-30 02:36:42'),(983,5,112,1,1,1,1,'2015-06-30 02:36:42','2015-06-30 02:36:42'),(984,6,112,0,0,0,0,'2015-06-30 02:36:42','2015-06-30 02:36:42'),(985,9,112,0,0,0,0,'2015-06-30 02:36:42','2015-06-30 02:36:42'),(986,10,112,1,1,1,1,'2015-06-30 02:36:42','2015-06-30 02:36:42'),(987,14,112,1,1,1,1,'2015-06-30 02:36:42','2015-06-30 02:36:42'),(988,16,112,1,1,1,1,'2015-06-30 02:36:42','2015-06-30 02:36:42'),(989,18,112,1,1,1,1,'2015-06-30 02:36:42','2015-06-30 02:36:42'),(990,19,112,0,0,0,0,'2015-06-30 02:36:42','2015-06-30 02:36:42'),(991,22,112,1,1,1,1,'2015-06-30 02:36:42','2015-06-30 02:36:42'),(992,25,112,1,1,1,1,'2015-06-30 02:36:42','2015-06-30 02:36:42'),(993,1,11,0,0,0,0,'2015-06-30 02:36:43','2015-06-30 02:36:43'),(994,2,11,1,1,1,1,'2015-06-30 02:36:43','2015-06-30 02:36:43'),(995,3,11,1,1,1,1,'2015-06-30 02:36:43','2015-06-30 02:36:43'),(996,4,11,1,1,1,1,'2015-06-30 02:36:43','2015-06-30 02:36:43'),(997,5,11,1,1,1,1,'2015-06-30 02:36:43','2015-06-30 02:36:43'),(998,6,11,1,1,1,1,'2015-06-30 02:36:43','2015-06-30 02:36:43'),(999,7,11,1,1,1,1,'2015-06-30 02:36:43','2015-06-30 02:36:43'),(1000,8,11,1,1,1,1,'2015-06-30 02:36:43','2015-06-30 02:36:43');
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
INSERT INTO `cursos` VALUES (1,'AUTOMAÇÃO INDUSTRIAL','AI','2015-06-30 02:35:07','2015-06-30 02:35:07',55),(2,'ANÁLISE E DESENVOLVIMENTO DE SISTEMAS','ADS','2015-06-30 02:35:07','2015-06-30 02:35:07',49),(3,'REDES DE COMPUTADORES','RC','2015-06-30 02:35:07','2015-06-30 02:35:07',54),(4,'SISTEMAS EMBARCADOS','SE','2015-06-30 02:35:07','2015-06-30 02:35:07',55),(5,'SISTEMAS DE TELECOMUNICAÇÕES','ST','2015-06-30 02:35:07','2015-06-30 02:35:07',54);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_client_endpoints`
--

LOCK TABLES `oauth_client_endpoints` WRITE;
/*!40000 ALTER TABLE `oauth_client_endpoints` DISABLE KEYS */;
INSERT INTO `oauth_client_endpoints` VALUES (1,'client1id','http://example1.com/callback','2015-06-30 02:36:43','2015-06-30 02:36:43'),(2,'client2id','http://example2.com/callback','2015-06-30 02:36:43','2015-06-30 02:36:43');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_client_scopes`
--

LOCK TABLES `oauth_client_scopes` WRITE;
/*!40000 ALTER TABLE `oauth_client_scopes` DISABLE KEYS */;
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
INSERT INTO `oauth_clients` VALUES ('client1id','client1secret','client1','2015-06-30 02:36:43','2015-06-30 02:36:43'),('client2id','client2secret','client2','2015-06-30 02:36:43','2015-06-30 02:36:43');
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
INSERT INTO `permissions` VALUES (1,'create-aluno',NULL,NULL,'2015-06-30 02:34:42','2015-06-30 02:34:42'),(2,'edit-aluno',NULL,NULL,'2015-06-30 02:34:43','2015-06-30 02:34:43'),(3,'view-aluno',NULL,NULL,'2015-06-30 02:34:43','2015-06-30 02:34:43'),(4,'list-alunos',NULL,NULL,'2015-06-30 02:34:43','2015-06-30 02:34:43'),(5,'create-professor',NULL,NULL,'2015-06-30 02:34:43','2015-06-30 02:34:43'),(6,'edit-professor',NULL,NULL,'2015-06-30 02:34:43','2015-06-30 02:34:43'),(7,'view-professor',NULL,NULL,'2015-06-30 02:34:44','2015-06-30 02:34:44'),(8,'list-professor',NULL,NULL,'2015-06-30 02:34:45','2015-06-30 02:34:45'),(9,'create-coordenador',NULL,NULL,'2015-06-30 02:34:45','2015-06-30 02:34:45'),(10,'edit-coordenador',NULL,NULL,'2015-06-30 02:34:45','2015-06-30 02:34:45'),(11,'view-coordenador',NULL,NULL,'2015-06-30 02:34:45','2015-06-30 02:34:45'),(12,'list-coordenador',NULL,NULL,'2015-06-30 02:34:45','2015-06-30 02:34:45'),(13,'create-unidade-curricular',NULL,NULL,'2015-06-30 02:34:45','2015-06-30 02:34:45'),(14,'edit-unidade-curricular',NULL,NULL,'2015-06-30 02:34:45','2015-06-30 02:34:45'),(15,'view-unidade-curricular',NULL,NULL,'2015-06-30 02:34:46','2015-06-30 02:34:46'),(16,'list-unidade-curricular',NULL,NULL,'2015-06-30 02:34:46','2015-06-30 02:34:46'),(17,'create-turma',NULL,NULL,'2015-06-30 02:34:46','2015-06-30 02:34:46'),(18,'edit-turma',NULL,NULL,'2015-06-30 02:34:46','2015-06-30 02:34:46'),(19,'view-turma',NULL,NULL,'2015-06-30 02:34:46','2015-06-30 02:34:46'),(20,'list-turma',NULL,NULL,'2015-06-30 02:34:46','2015-06-30 02:34:46'),(21,'view-controle-faltas',NULL,NULL,'2015-06-30 02:34:46','2015-06-30 02:34:46'),(22,'create-aula',NULL,NULL,'2015-06-30 02:34:46','2015-06-30 02:34:46'),(23,'edit-aula',NULL,NULL,'2015-06-30 02:34:47','2015-06-30 02:34:47'),(24,'view-aula',NULL,NULL,'2015-06-30 02:34:47','2015-06-30 02:34:47'),(25,'list-aula',NULL,NULL,'2015-06-30 02:34:47','2015-06-30 02:34:47'),(26,'view-chamada',NULL,NULL,'2015-06-30 02:34:47','2015-06-30 02:34:47'),(27,'edit-chamada',NULL,NULL,'2015-06-30 02:34:47','2015-06-30 02:34:47'),(28,'view-own-turma',NULL,NULL,'2015-06-30 02:34:47','2015-06-30 02:34:47'),(29,'edit-own-turma',NULL,NULL,'2015-06-30 02:34:47','2015-06-30 02:34:47'),(30,'view-own-controle-faltas',NULL,NULL,'2015-06-30 02:34:47','2015-06-30 02:34:47'),(31,'view-own-aula',NULL,NULL,'2015-06-30 02:34:47','2015-06-30 02:34:47'),(32,'edit-own-aula',NULL,NULL,'2015-06-30 02:34:48','2015-06-30 02:34:48'),(33,'create-own-aula',NULL,NULL,'2015-06-30 02:34:48','2015-06-30 02:34:48'),(34,'view-own-chamada',NULL,NULL,'2015-06-30 02:34:48','2015-06-30 02:34:48'),(35,'edit-own-chamada',NULL,NULL,'2015-06-30 02:34:48','2015-06-30 02:34:48');
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
INSERT INTO `professores` VALUES (49,'2015-06-30 02:35:07','2015-06-30 02:35:07',2),(50,'2015-06-30 02:35:07','2015-06-30 02:35:07',2),(51,'2015-06-30 02:35:07','2015-06-30 02:35:07',2),(52,'2015-06-30 02:35:07','2015-06-30 02:35:07',3),(53,'2015-06-30 02:35:08','2015-06-30 02:35:08',2),(54,'2015-06-30 02:35:08','2015-06-30 02:35:08',5),(55,'2015-06-30 02:35:08','2015-06-30 02:35:08',1);
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
INSERT INTO `roles` VALUES (1,'aluno','Aluno',NULL,'2015-06-30 02:34:42','2015-06-30 02:34:42'),(2,'professor','Professor',NULL,'2015-06-30 02:34:42','2015-06-30 02:34:42'),(3,'coordenador','Coordenador',NULL,'2015-06-30 02:34:42','2015-06-30 02:34:42');
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
INSERT INTO `turmas` VALUES (1,'S032N','2015-02-19','2015-07-14',3,'2015-06-30 02:35:08','2015-06-30 02:35:08','Noite'),(2,'S049','2014-07-31','2014-12-18',1,'2015-06-30 02:35:08','2015-06-30 02:35:08','Noite'),(3,'S049N','2015-02-19','2015-07-14',1,'2015-06-30 02:35:08','2015-06-30 02:35:08','Noite'),(4,'S075N','2014-07-31','2014-12-18',5,'2015-06-30 02:35:08','2015-06-30 02:35:08','Noite'),(5,'S087N','2014-02-17','2014-07-15',2,'2015-06-30 02:35:09','2015-06-30 02:35:09','Noite'),(6,'S091N','2015-02-19','2015-07-14',4,'2015-06-30 02:35:09','2015-06-30 02:35:09','Noite');
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
INSERT INTO `unidades_curriculares` VALUES (1,'S049 - Modelagem de Banco de Dados',70,'S049','2015-06-30 02:35:08','2015-06-30 02:35:08'),(2,'S087- Sistemas Operacionais',70,'S087','2015-06-30 02:35:08','2015-06-30 02:35:08'),(3,'S032 - Fundamentos de Sistemas de Informação',70,'S032','2015-06-30 02:35:08','2015-06-30 02:35:08'),(4,'S091 - Técnicas de Programação',70,'S091','2015-06-30 02:35:08','2015-06-30 02:35:08'),(5,'S075 - Sistema de Gerenciamento de Banco de Dados',70,'S075','2015-06-30 02:35:08','2015-06-30 02:35:08');
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
INSERT INTO `usuarios` VALUES (1,'15726','ABNER BORDA FONSECA','abner_borda_fonseca@gmail.com','$2y$10$gqKG/6/H8SKdIZ8LmUS9ieZBiGo7yKl.khdLbOmkNWS3YNQ.B2hCS',NULL,'2015-06-30 02:34:48','2015-06-30 02:34:48'),(2,'15722','ADRIAN RUBILAR LEMES CAETANO','adrian_rubilar_lemes_caetano@gmail.com','$2y$10$3EXWL7jbk2z4HlZL32dkVed6IcFNHKc1fkdw/4Qxctonq/xIqrWza',NULL,'2015-06-30 02:34:48','2015-06-30 02:34:48'),(3,'20569','ALEXANDRE GABIATTI VIEIRA','alexandre_gabiatti_vieira@gmail.com','$2y$10$fqfOpDDD.3GpUpZjytItNOznWhSILiuoIDO1ZDDbY6vk9l.k0U89.',NULL,'2015-06-30 02:34:49','2015-06-30 02:34:49'),(4,'16049','ALEXSANDRO GIOVANNI DA SILVA DIAS','alexsandro_giovanni_da_silva_dias@gmail.com','$2y$10$3HG0bcMZHryAR4yKK/QOYOBB89qUqpGZGLijleYj.Hh447MoRPpjW',NULL,'2015-06-30 02:34:49','2015-06-30 02:34:49'),(5,'20628','ANA CARLA MESSIAS DE MOURA','ana_carla_messias_de_moura@gmail.com','$2y$10$nXPTP/AWBabpGhvY0IisG.odkyafCgXAqzjy0I2I.K3q.vEvjPKx6',NULL,'2015-06-30 02:34:49','2015-06-30 02:34:49'),(6,'20531','ANGELO VICTOR ISRAEL MUNIZ','angelo_victor_israel_muniz@gmail.com','$2y$10$Qg03bruB2kndxK.m0pyBN.il8.PUsesBA/JvpYqFqvoBc8MioGqem',NULL,'2015-06-30 02:34:49','2015-06-30 02:34:49'),(7,'20579','BRUNO DA SILVA BRIXIUS','bruno_da_silva_brixius@gmail.com','$2y$10$7/GNOMgTB.velHUrXo5DL.4s39v.A3SBNDT4Lp7MFzi.OPrbWQOw.',NULL,'2015-06-30 02:34:50','2015-06-30 02:34:50'),(8,'17486','CRISTIANO DE MOURA','cristiano_de_moura@gmail.com','$2y$10$QzflOlRXfqsNmQyduiRb/u5pRt/9L.eX6j6mrfelTXu79ZeXaAlly',NULL,'2015-06-30 02:34:50','2015-06-30 02:34:50'),(9,'20624','DANIEL OLIVEIRA RODRIGUES','daniel_oliveira_rodrigues@gmail.com','$2y$10$LpueUFT1EEJ1lNLXPSPyZ.paaUF3n4na86JTdp4rlmbyEHMF1VUcu',NULL,'2015-06-30 02:34:50','2015-06-30 02:34:50'),(10,'15717','DIONATA LEONEL MACHADO FERRAZ','dionata_leonel_machado_ferraz@gmail.com','$2y$10$RvKtBay/73SNJwMjF6Gm.uHpxxc34QnLPYyQOwMk/X7/lRm2/HIOm',NULL,'2015-06-30 02:34:50','2015-06-30 02:34:50'),(11,'14186','DOUGLAS COSTA DA ROCHA','douglas_costa_da_rocha@gmail.com','$2y$10$ZW3ZCml0pCvlL7j/LTh/Y.Rd1BzxHmYM23VLypJ6Cv.meAvsD/BJC',NULL,'2015-06-30 02:34:51','2015-06-30 02:34:51'),(12,'17509','FABIANO BORBA VIANA FEIJÓ','fabiano_borba_viana_feijÓ@gmail.com','$2y$10$L2yI9XXLbp/BV7UPhX3cFuHlDqg53MNV4JZeVUppo9eZVNK.KmCza',NULL,'2015-06-30 02:34:51','2015-06-30 02:34:51'),(13,'19024','FELIPE DA SILVA PACHECO','felipe_da_silva_pacheco@gmail.com','$2y$10$2vmJtdGrNDC0bAZuJnScCO0wCl6cA7VTFE7YfyxyzIXrCucm9NhFu',NULL,'2015-06-30 02:34:51','2015-06-30 02:34:51'),(14,'19026','FERNANDO LEITE SZEZECINSKI','fernando_leite_szezecinski@gmail.com','$2y$10$W0JJQoyk7NDgU1Mn1VRm9ej1LQK8xjAsv0pP4hzvHJOyNGAF6gbSu',NULL,'2015-06-30 02:34:51','2015-06-30 02:34:51'),(15,'15639','GUILHERME PEREIRA SILVEIRA','guilherme_pereira_silveira@gmail.com','$2y$10$scDSmhO0SOQgxmzLeRvayOKUcHCtRFwioickUDTsZaafKy1YD0cvy',NULL,'2015-06-30 02:34:52','2015-06-30 02:34:52'),(16,'19020','LEONARDO GOMES MONTEIRO MIGUEIS CERQUEIRA','leonardo_gomes_monteiro_migueis_cerqueira@gmail.com','$2y$10$SQ6aBEyZ.jQJ9mD04XidVOaIKY.DYFo37eBl9nO6pGEWBhZKRAI.G',NULL,'2015-06-30 02:34:52','2015-06-30 02:34:52'),(17,'8059','LOGAN OLIVEIRA LOUREIRO','logan_oliveira_loureiro@gmail.com','$2y$10$kGMwEVbAZg1NwERLcjpLb.SSipE.1Qql6WqWmKMa6udS5PouJpOje',NULL,'2015-06-30 02:34:52','2015-06-30 02:34:52'),(18,'15701','NÍKOLAS MARTINS VARGAS','nÍkolas_martins_vargas@gmail.com','$2y$10$m92mdhp7ZjO1Fenzvnx3wO4Ecsyk7/nDNy2D5LjH7JeJXij7SEOG2',NULL,'2015-06-30 02:34:53','2015-06-30 02:34:53'),(19,'15719','PEDRO LUIZ SROCZYNSKI','pedro_luiz_sroczynski@gmail.com','$2y$10$gNzrSE6iOTyenrO8Zu5onuEvfroDvR1/IGodkc6ojwSYuXmo/c6vS',NULL,'2015-06-30 02:34:54','2015-06-30 02:34:54'),(20,'13886','RAFAEL LOPES SANTOS','rafael_lopes_santos@gmail.com','$2y$10$RGYzNuvUcv6UP9fj4Dy13OvsVx4RIp.CHuH8QJqdGH8DZWnbyAg1m',NULL,'2015-06-30 02:34:54','2015-06-30 02:34:54'),(21,'17513','RENAN AGUIAR OLIVEIRA','renan_aguiar_oliveira@gmail.com','$2y$10$uwhv235nfvx3QB4hltgkH.GVXAplcERSxbZZE9TffkmyLnrLJqxFW',NULL,'2015-06-30 02:34:54','2015-06-30 02:34:54'),(22,'15737','STEFANI SILVA DE LIMA','stefani_silva_de_lima@gmail.com','$2y$10$6yIFT6rhfekCEB6Mk1jlVe5SFXF40NWEbgknCD7rVu7Za0Y.zBVeq',NULL,'2015-06-30 02:34:54','2015-06-30 02:34:54'),(23,'20619','VITHOR SAMPAIO MARQUES','vithor_sampaio_marques@gmail.com','$2y$10$nblomjz1Co61sqGRn3UMWer00vmBH18vIVYl2ghot.wKMw9fe5WX.',NULL,'2015-06-30 02:34:55','2015-06-30 02:34:55'),(24,'20580','VITOR DA SILVA BRIXIUS','vitor_da_silva_brixius@gmail.com','$2y$10$Pic0Lg8QV4Fo3fn8flbNJ.G91YhRCJzEaYjVmbeEN7PNrUXu8HxhW',NULL,'2015-06-30 02:34:55','2015-06-30 02:34:55'),(25,'16102','WELLYNTON LOPES TOZON','wellynton_lopes_tozon@gmail.com','$2y$10$yEveYnwHZJTmgL0H2w0bpem3ptk0bf0PFcZNXJsjKVD5PVcqcWSau',NULL,'2015-06-30 02:34:55','2015-06-30 02:34:55'),(26,'20537','WILLIAN FERREIRA PEIXOTO','willian_ferreira_peixoto@gmail.com','$2y$10$QE6rhBF2nRuqdXqC2yDR9e6CYWvPM5GK7Se1ZyKeXnIiiaTxU2N1i',NULL,'2015-06-30 02:34:56','2015-06-30 02:34:56'),(27,'20525','ALAN PINHEIRO DOS SANTOS','alan_pinheiro_dos_santos@gmail.com','$2y$10$9D01co6IWRqAczFhrVYGy.tDCNzpXSzeuB5owPl8fTTIx0OU45GYe',NULL,'2015-06-30 02:34:56','2015-06-30 02:34:56'),(28,'20565','ANDERSON GUIMARAES MACHADO','anderson_guimaraes_machado@gmail.com','$2y$10$ErGpIQkpsdGmouGqCYzAKucOmzTIneUHc5kZT1UrbcfSGdqHrL.gS',NULL,'2015-06-30 02:34:56','2015-06-30 02:34:56'),(29,'20635','ARTHUR HENRIQUE MENDES BERTE','arthur_henrique_mendes_berte@gmail.com','$2y$10$4ITSXkGIRPRdsnYgqogNLeCrH.wtnKWnLwdQ/ePnUFnatD7HcP.L.',NULL,'2015-06-30 02:34:57','2015-06-30 02:34:57'),(30,'20532','CASSIO LANGLOIS MACHADO','cassio_langlois_machado@gmail.com','$2y$10$nV1PrYnLoYVD5vSTcURjkOvMbu.FLOBa.Yr.ViT84gxclfNz7rp9u',NULL,'2015-06-30 02:34:57','2015-06-30 02:34:57'),(31,'20562','DEIVIDI OLIVEIRA DA SILVA','deividi_oliveira_da_silva@gmail.com','$2y$10$hXXRCEvlaBCFyMLrJT3bK.g2MrmYmnqZkyh5YjY/q8YDEN/c1ifWC',NULL,'2015-06-30 02:34:57','2015-06-30 02:34:57'),(32,'20529','FRANCISCO PEDRO FERNANDES ALMEIDA','francisco_pedro_fernandes_almeida@gmail.com','$2y$10$jZdFzsKUtPO4YcYgmE88I.dbX4OT1HBLrIvy0Pp2rEkilyJ12ht6i',NULL,'2015-06-30 02:34:58','2015-06-30 02:34:58'),(33,'5901','GABRIEL GONÇALVES STANOSKI','gabriel_gonÇalves_stanoski@gmail.com','$2y$10$6fKLlQUGHqKz4NMAkpQV8OCnkmohNgi1F.yA1ZDKHR6sNIAdP0zMu',NULL,'2015-06-30 02:34:58','2015-06-30 02:34:58'),(34,'20566','GUILHERME DOS SANTOS SILVA','guilherme_dos_santos_silva@gmail.com','$2y$10$7k7i6cLtu80MKXRK.Sd8auQmc.7Udy30xpHRrpUqm4W4.NodaP4mW',NULL,'2015-06-30 02:34:59','2015-06-30 02:34:59'),(35,'20522','JHONATAS DAVI DE SOUZA','jhonatas_davi_de_souza@gmail.com','$2y$10$eh0i0pftAiYG1Wm.tYcSu.Oe2Jgh0T9mjQtTIuGFb2fKHOgVcWVVG',NULL,'2015-06-30 02:34:59','2015-06-30 02:34:59'),(36,'20570','LEONARDO NUNES','leonardo_nunes@gmail.com','$2y$10$uQxAppTRAa0iV9CAzFS5iOr8RdWdKhvNgX9mQK.WynOPvk/5Z9OYO',NULL,'2015-06-30 02:34:59','2015-06-30 02:34:59'),(37,'20519','LUCIANO GAMA MEDEIROS','luciano_gama_medeiros@gmail.com','$2y$10$kqfVs/wONQ/VS7Zl.lZI.uUj1arlMEGi9c7xJoCrruauPXvFqThJm',NULL,'2015-06-30 02:34:59','2015-06-30 02:34:59'),(38,'20512','LUIZ CARLOS TORRES DE CASTILHOS','luiz_carlos_torres_de_castilhos@gmail.com','$2y$10$xqCOyf4Mf3yLYVX2xs3cMer.GQKLe9ny1IeVM1ZT8Mhkx9QY2fzP6',NULL,'2015-06-30 02:35:00','2015-06-30 02:35:00'),(39,'20505','RAFAEL CAMMARANO GUGLIELMI','rafael_cammarano_guglielmi@gmail.com','$2y$10$MwGObNnamU2QC0kRjWm3ies12HC5XJxLKQ/TumjQfnML1uo5yg5Xq',NULL,'2015-06-30 02:35:00','2015-06-30 02:35:00'),(40,'21365','BEATRICE VICTORIA FERNANDES','beatrice_victoria_fernandes@gmail.com','$2y$10$/Slqf3XYp63zqKj7nbJ/Te.FJIDvUDRHQ0lL.4syIhUcbGMRClmdO',NULL,'2015-06-30 02:35:00','2015-06-30 02:35:00'),(41,'21367','BRUNO PRATES BOFF','bruno_prates_boff@gmail.com','$2y$10$8uuCnQmJLcbZoFIRv4mENeeDBIjrU4xGcnrvk/gK9EGbl/M9rJSGK',NULL,'2015-06-30 02:35:00','2015-06-30 02:35:00'),(42,'258','FAGNER DAVID NUNES','fagner_david_nunes@gmail.com','$2y$10$N7qDSk80jnDJ3hKeSXnKuOyzfdE73LszcBiLp8pSq8PYaR3g5QAHq',NULL,'2015-06-30 02:35:00','2015-06-30 02:35:00'),(43,'21391','FELIPE AMANCIO VIEIRA','felipe_amancio_vieira@gmail.com','$2y$10$07/45YvUecGI6Y2x67DqFujCzC5uCMvgHw2YOZXSuGYtMg8dA35bu',NULL,'2015-06-30 02:35:01','2015-06-30 02:35:01'),(44,'21364','GREGORY PITTOL BORIN','gregory_pittol_borin@gmail.com','$2y$10$KMmZ.Rert8OzTjXin/tO5etJrz72xbYtvXp.aM19B8.SU324bLN6e',NULL,'2015-06-30 02:35:01','2015-06-30 02:35:01'),(45,'21393','GUILHERME NEUMANN','guilherme_neumann@gmail.com','$2y$10$0opcGvMt1xBSiBuTccWkOuiSIzUzsU0lVpZ/i63nNY2HQIpQzot2m',NULL,'2015-06-30 02:35:02','2015-06-30 02:35:02'),(46,'23090','JULIANO ANTÔNIO DA ROSA SOARES','juliano_antÔnio_da_rosa_soares@gmail.com','$2y$10$wKtNBKzZoaTv/q63Wuw1Y.UmoEfiB4A5N/6UvSFauV6RMMaqSIqOO',NULL,'2015-06-30 02:35:02','2015-06-30 02:35:02'),(47,'14216','ROBSON LUIS RAMOS','robson_luis_ramos@gmail.com','$2y$10$OoEVkLNI966pC7YlblQNMuPYMXGj6VgbN4vUvGff3aFDUD./z1/Ae',NULL,'2015-06-30 02:35:02','2015-06-30 02:35:02'),(48,'23301','NATANIEL LEONAM  DA COSTA GOMES','nataniel_leonam__da_costa_gomes@gmail.com','$2y$10$YV.JwDXHhKSxa44GCaVeueilfll/VU2UK5.Jecq4OWkoXLXrpTOkO',NULL,'2015-06-30 02:35:02','2015-06-30 02:35:02'),(49,'1234','Valderi R. Q. Leithardt','valderi_r._q._leithardt@gmail.com','$2y$10$xp41Bd6T3LGkyKLw8Qsq8uzAECACSPiE8MJu11LnVdL77VOxRstU2',NULL,'2015-06-30 02:35:03','2015-06-30 02:35:03'),(50,'2345','Gustavo B. Brand','gustavo_b._brand@gmail.com','$2y$10$0VC0tF4JIjnmFikesuVd8e8fQBbtcQjtcWqa6iIjQVuQPGuCJ8.Tm',NULL,'2015-06-30 02:35:03','2015-06-30 02:35:03'),(51,'3456','Dione Taschetto','dione_taschetto@gmail.com','$2y$10$CU1x8/dK0kpl.dSX/7z7VOgTBFsHmI9WKA.3KnOITA1W9M.0umwVW',NULL,'2015-06-30 02:35:05','2015-06-30 02:35:05'),(52,'4567','Terezinha I. M.Torres','terezinha_i._m.torres@gmail.com','$2y$10$/g0PiNiC7qEBvcEC3tcC8e..j6gkczeoIV3lr81vnVI3IF3Ksa4UC',NULL,'2015-06-30 02:35:06','2015-06-30 02:35:06'),(53,'5678','Guilherme Dal Bianco','guilherme_dal_bianco@gmail.com','$2y$10$fqVQrm4JhbVdvTIO3pusG.xQsp7vSXt8kvZLn4jZCWGzkQ90xqQzi',NULL,'2015-06-30 02:35:06','2015-06-30 02:35:06'),(54,'7889','Leandro José Cassol','leandro_josé_cassol@gmail.com','$2y$10$874JjaC1f.Pbf0Mz90hyBewrgdPAbI5G..eXr3kF2GxSsp1Yqwrdi',NULL,'2015-06-30 02:35:06','2015-06-30 02:35:06'),(55,'4844','Alexandre Gaspary Haupt','alexandre_gaspary_haupt@gmail.com','$2y$10$ljy9oyqTSunQ6DOr5/8oD.BkoMjnBx9jYEBisMTciTlW6McAejjam',NULL,'2015-06-30 02:35:07','2015-06-30 02:35:07');
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

-- Dump completed on 2015-06-29 20:37:14