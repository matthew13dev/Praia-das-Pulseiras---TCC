-- MySQL dump 10.13  Distrib 8.0.41, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: praia_das_pulseiras
-- ------------------------------------------------------
-- Server version	8.0.41
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
-- Table structure for table `produto`
--
DROP TABLE IF EXISTS `produto`;

/*!40101 SET @saved_cs_client     = @@character_set_client */;

/*!50503 SET character_set_client = utf8mb4 */;

CREATE TABLE
  `produto` (
    `id` int NOT NULL AUTO_INCREMENT,
    `nome` varchar(100) NOT NULL,
    `descricao` text,
    `preco` decimal(10, 2) NOT NULL,
    `quantidade_estoque` int NOT NULL DEFAULT '0',
    `imagem` varchar(255) DEFAULT NULL,
    `ativo` tinyint (1) DEFAULT '1',
    `data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `categoria` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE = InnoDB AUTO_INCREMENT = 46 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;

/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--
LOCK TABLES `produto` WRITE;

/*!40000 ALTER TABLE `produto` DISABLE KEYS */;

INSERT INTO
  produto (
    nome,
    descricao,
    preco,
    quantidade_estoque,
    imagem,
    ativo,
    categoria
  )
VALUES
  -- Bijuteria 1 (Pulseira)
  (
    'Pulseira de Prata Tibetana',
    'Pulseira artesanal com detalhes em prata e pedras turquesa',
    89.90,
    30,
    './images/p1.jpg',
    1,
    'Pulseiras'
  ),
  -- Bijuteria 2 (Brincos)
  (
    'Brincos Folheados a Ouro',
    'Brincos delicados com folheado a ouro 18k e pérolas',
    65.50,
    45,
    './images/p2.jpg',
    1,
    'Brincos'
  ),
  -- Bijuteria 3 (Anel)
  (
    'Anel de Ágata Fire',
    'Anel artesanal com ágata fire e banho em prata',
    120.00,
    20,
    './images/p3.jpg',
    1,
    'Anéis'
  ),
  -- Bijuteria 4 (Colar)
  (
    'Colar Boho de Seda',
    'Colar longo com contas de madeira e fio de seda',
    55.00,
    50,
    './images/p4.jpg',
    1,
    'Colares'
  ),
  -- Bijuteria 5 (Conjunto)
  (
    'Kit Pulseira + Anel',
    'Conjunto harmonizado em tons terrosos com miçangas',
    110.00,
    15,
    './images/p5.jpg',
    1,
    'Conjuntos'
  ),
  -- Bijuteria 6 (Brincos)
  (
    'Brincos de Resina Florais',
    'Brincos artesanais com flores preservadas em resina',
    75.00,
    40,
    './images/p6.jpg',
    1,
    'Brincos'
  ),
  -- Bijuteria 7 (Pulseira)
  (
    'Pulseira de Quartzo Rosa',
    'Pulseira energética com contas de quartzo rosa',
    45.90,
    60,
    './images/p7.jpg',
    1,
    'Pulseiras'
  ),
  -- Bijuteria 8 (Anel)
  (
    'Anel de Lua e Estrelas',
    'Anel banhado a prata com detalhes celestes',
    95.00,
    25,
    './images/p8.jpg',
    1,
    'Anéis'
  ),
  -- Bijuteria 9 (Colar)
  (
    'Colar Choker de Veludo',
    'Choker ajustável com pingente de cristal',
    38.00,
    70,
    './images/p9.jpg',
    1,
    'Colares'
  ),
  -- Bijuteria 10 (Tornozeleira)
  (
    'Tornozeleira de Prata',
    'Tornozeleira fina com charm de flor',
    42.50,
    35,
    './images/p10.jpg',
    1,
    'Acessórios'
  ),
  -- Bijuteria 11 (Brincos)
  (
    'Brincos de Argola Minimalistas',
    'Argolas pequenas em prata 925',
    58.00,
    55,
    './images/p11.jpg',
    1,
    'Brincos'
  ),
  -- Bijuteria 12 (Pulseira)
  (
    'Pulseira de Couro e Metal',
    'Pulseira masculina em couro e detalhes em metal',
    79.90,
    20,
    './images/p12.jpg',
    1,
    'Pulseiras'
  ),
  -- Bijuteria 13 (Anel)
  (
    'Anel de Opala Negra',
    'Anel statement com opala negra e banho de ródio',
    150.00,
    10,
    './images/p13.jpg',
    1,
    'Anéis'
  ),
  -- Bijuteria 14 (Colar)
  (
    'Colar de Âmbar Báltico',
    'Colar com contas naturais de âmbar e fecho de prata',
    210.00,
    12,
    './images/p14.jpg',
    1,
    'Colares'
  );

/*!40000 ALTER TABLE `produto` ENABLE KEYS */;

UNLOCK TABLES;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;

/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-01  1:19:42