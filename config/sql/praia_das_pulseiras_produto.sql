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
CREATE TABLE `produto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` text,
  `preco` decimal(10,2) NOT NULL,
  `quantidade_estoque` int NOT NULL DEFAULT '0',
  `imagem` varchar(255) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  `data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `categoria` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (2,'Produto 2','Descrio do produto 2',29.99,30,NULL,1,'2025-05-21 05:21:36',NULL),(3,'Produto 3','Descrio do produto 3',39.99,20,NULL,1,'2025-05-21 05:21:36',NULL),(4,'Pulseira de Miangas Coloridas','Pulseira artesanal feita  mo com miangas coloridas. Ideal para looks casuais.',19.90,50,'imagens/pulseira_micangas.jpg',1,'2025-05-21 05:46:27',NULL),(5,'Colar com Pingente de Concha','Colar com cordo de couro e pingente natural de concha. Estilo praiano.',29.90,30,'imagens/colar_concha.jpg',1,'2025-05-21 05:46:27',NULL),(6,'Brinco de Argola com Pedras Naturais','Argolas com detalhes em pedras naturais, elegncia com toque rstico.',24.90,40,'imagens/brinco_pedras.jpg',1,'2025-05-21 05:46:27',NULL),(7,'Tornozeleira Tranada','Tornozeleira artesanal tranada em fios coloridos. Leve e charmosa.',14.90,60,'imagens/tornozeleira_trancada.jpg',1,'2025-05-21 05:46:27',NULL),(8,'Pulseira com Pingente de Estrela-do-Mar','Pulseira em corda com pingente de estrela-do-mar. Inspirada no vero.',22.50,45,'imagens/pulseira_estrela.jpg',1,'2025-05-21 05:46:27',NULL),(9,'Colar Longo de Madeira','Colar feito com contas de madeira naturais. Look rstico e elegante.',34.90,25,'imagens/colar_madeira.jpg',1,'2025-05-21 05:46:27',NULL),(10,'Brinco de Penas Artesanal','Brinco leve com penas coloridas e miangas. Estilo boho chic.',17.90,35,'imagens/brinco_penas.jpg',1,'2025-05-21 05:46:27',NULL),(11,'Kit de Pulseiras tnicas','Conjunto com 3 pulseiras inspiradas em padres tnicos. Feitas  mo.',39.90,20,'imagens/kit_pulseiras.jpg',1,'2025-05-21 05:46:27',NULL),(12,'Colar com Pedra Turquesa','Cordo ajustvel com pedra turquesa central. Visual natural e vibrante.',27.90,30,'imagens/colar_turquesa.jpg',1,'2025-05-21 05:46:27',NULL),(13,'Brinco de Croch Artesanal','Brinco feito em croch com linha de algodo. Delicado e exclusivo.',21.50,38,'imagens/brinco_croche.jpg',1,'2025-05-21 05:46:27',NULL),(14,'Pulseira de Couro com Tranas','Pulseira em couro legtimo com detalhes tranados. Masculina ou unissex.',32.00,28,'imagens/pulseira_couro.jpg',1,'2025-05-21 05:46:27',NULL),(15,'Colar com Contas de Coco','Colar feito com contas de coco natural. Sustentvel e estiloso.',26.90,22,'imagens/colar_coco.jpg',1,'2025-05-21 05:46:27',NULL),(16,'Pulseira Macramê Rosa','Pulseira artesanal feita com técnica de macramê em fios rosa.',25.90,10,'macrame1.jpg',1,'2025-06-01 03:11:48','macrame'),(17,'Colar Nó Duplo','Colar de macramê com nó duplo, ideal para looks boho.',32.00,5,'macrame2.jpg',1,'2025-06-01 03:11:48','macrame'),(18,'Brinco Trançado Bege','Brinco leve feito com fio natural trançado em macramê.',18.50,15,'macrame3.jpg',1,'2025-06-01 03:11:48','macrame'),(19,'Tornozeleira Summer','Tornozeleira com padrão floral em macramê colorido.',21.00,8,'macrame4.jpg',1,'2025-06-01 03:11:48','macrame'),(20,'Colar Longo Gaia','Colar longo com pedra natural e fios de macramê.',39.99,4,'macrame5.jpg',1,'2025-06-01 03:11:48','macrame'),(21,'Pulseira Color Beads','Pulseira com miçangas coloridas, alegre e vibrante.',16.50,12,'beads1.jpg',1,'2025-06-01 03:11:48','beads'),(22,'Colar de Miçangas Azul','Colar curto feito com miçangas azuis e fecho magnético.',19.90,9,'beads2.jpg',1,'2025-06-01 03:11:48','beads'),(23,'Brinco Beads Tribal','Brinco artesanal com padrão tribal em miçangas.',22.00,7,'beads3.jpg',1,'2025-06-01 03:11:48','beads'),(24,'Pulseira Dupla Beads','Pulseira dupla com combinação de tons pastel em beads.',17.75,6,'beads4.jpg',1,'2025-06-01 03:11:48','beads'),(25,'Tornozeleira Beads Love','Tornozeleira com beads em formato de coração.',15.00,11,'beads5.jpg',1,'2025-06-01 03:11:48','beads'),(26,'Pulseira Couro Rústico','Pulseira ajustável feita em couro legítimo rústico.',29.90,14,'leather1.jpg',1,'2025-06-01 03:11:48','leather'),(27,'Colar Couro Tribal','Colar com pingente de osso e cordão de couro.',33.00,6,'leather2.jpg',1,'2025-06-01 03:11:48','leather'),(28,'Brinco Couro Trançado','Brinco artesanal com tiras de couro trançadas.',27.50,3,'leather3.jpg',1,'2025-06-01 03:11:48','leather'),(29,'Pulseira Masculina Couro Preto','Pulseira masculina feita em couro preto com fecho de aço.',34.90,10,'leather4.jpg',1,'2025-06-01 03:11:48','leather'),(30,'Colar Couro e Madeira','Colar com detalhes em madeira e couro natural.',30.00,5,'leather5.jpg',1,'2025-06-01 03:11:48','leather'),(31,'Colar Natureza Viva','Colar feito com sementes naturais e fio de algodão.',26.90,8,'natural1.jpg',1,'2025-06-01 03:11:48','natural'),(32,'Pulseira de Sementes Amazônicas','Pulseira com sementes da Amazônia e acabamento artesanal.',28.00,7,'natural2.jpg',1,'2025-06-01 03:11:48','natural'),(33,'Brinco de Casca de Coco','Brinco leve feito com casca de coco polida.',23.90,9,'natural3.jpg',1,'2025-06-01 03:11:48','natural'),(34,'Tornozeleira Natural Zen','Tornozeleira com pedras naturais e contas de madeira.',20.00,6,'natural4.jpg',1,'2025-06-01 03:11:48','natural'),(35,'Colar Bambu e Semente','Colar com detalhe em bambu e sementes esculpidas.',31.50,4,'natural5.jpg',1,'2025-06-01 03:11:48','natural'),(36,'Bracelete Arco-Íris','Bracelete colorido feito com técnica de macramê.',24.00,13,'macrame6.jpg',1,'2025-06-01 03:11:48','macrame'),(37,'Brinco Miçangas Douradas','Brinco elegante com miçangas douradas e pretas.',21.50,5,'beads6.jpg',1,'2025-06-01 03:11:48','beads'),(38,'Choker Couro e Metal','Choker em couro com detalhe de pingente metálico.',36.90,6,'leather6.jpg',1,'2025-06-01 03:11:48','leather'),(39,'Colar Pedra da Lua','Colar com pedra da lua e detalhes em fios naturais.',42.00,3,'natural6.jpg',1,'2025-06-01 03:11:48','natural'),(40,'Pulseira Macramê Azul Marinho','Pulseira com design náutico em azul marinho.',26.00,9,'macrame7.jpg',1,'2025-06-01 03:11:48','macrame'),(41,'Colar Beads Love','Colar delicado com beads rosa e lilás.',19.00,7,'beads7.jpg',1,'2025-06-01 03:11:48','beads'),(42,'Pulseira Couro Escuro','Pulseira robusta com tiras de couro escuro.',33.00,5,'leather7.jpg',1,'2025-06-01 03:11:48','leather'),(43,'Brinco Folha Natural','Brinco feito com folha real prensada e resina.',24.00,6,'natural7.jpg',1,'2025-06-01 03:11:48','natural'),(44,'Tornozeleira Beads Estrela','Tornozeleira com beads e pingente de estrela.',17.90,8,'beads8.jpg',1,'2025-06-01 03:11:48','beads'),(45,'Colar Macramê Sol','Colar de macramê com pingente em forma de sol.',28.90,4,'macrame8.jpg',1,'2025-06-01 03:11:48','macrame');
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
