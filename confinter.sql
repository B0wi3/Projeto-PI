-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 29/03/2024 às 00:51
-- Versão do servidor: 8.2.0
-- Versão do PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `confinter`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aprovado`
--

DROP TABLE IF EXISTS `aprovado`;
CREATE TABLE IF NOT EXISTS `aprovado` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(100) DEFAULT NULL,
  `mensagem` text,
  `nome` varchar(255) DEFAULT NULL,
  `status_mod` varchar(20) DEFAULT NULL,
  `aprovado` tinyint(1) DEFAULT '1',
  `reprovado` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `aprovado`
--

INSERT INTO `aprovado` (`id`, `nome_cliente`, `mensagem`, `nome`, `status_mod`, `aprovado`, `reprovado`) VALUES
(12, 'dasdsada', 'asdasdasd', 'Anônimo', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome`, `data_nascimento`, `email`, `telefone`) VALUES
(35, 'Fernando Aparecido Lopes da Silva', '1970-01-01', 'fnando0506@gmail.com', '(55) 11992-0434'),
(36, 'Fernando Aparecido Lopes da Silva', '1970-01-01', 'fnando0506@gmail.com', '(55) 11992-0434'),
(26, 'Fernando Aparecido Lopes da Silva', '0000-00-00', 'fnando0506@gmail.com', '(55) 11992-0434'),
(30, 'Fernando Aparecido Lopes da Silva', '1970-01-01', 'fnando0506@gmail.com', '(55) 11992-0434'),
(31, 'Fernando Aparecido Lopes da Silva', '1970-01-01', 'fnando0506@gmail.com', '(11) 99204-3469');

-- --------------------------------------------------------

--
-- Estrutura para tabela `depoimentos`
--

DROP TABLE IF EXISTS `depoimentos`;
CREATE TABLE IF NOT EXISTS `depoimentos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(100) DEFAULT NULL,
  `mensagem` text,
  `status_mod` varchar(20) DEFAULT 'pendente',
  `nome` varchar(255) DEFAULT 'Anônimo',
  `aprovado` tinyint(1) DEFAULT '0',
  `reprovado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `depoimentos`
--

INSERT INTO `depoimentos` (`id`, `nome_cliente`, `mensagem`, `status_mod`, `nome`, `aprovado`, `reprovado`) VALUES
(14, 'Fernando', 'Muito bom, recomendo!!!', 'aprovado', 'Anônimo', 1, 0),
(13, 'dasdsada', 'asdasdasd', 'reprovado', 'Anônimo', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `id_empresa` int NOT NULL AUTO_INCREMENT,
  `nome_empresa` varchar(100) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `celular` varchar(30) NOT NULL,
  `email` varchar(65) NOT NULL,
  `descricao` text NOT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nome_empresa`, `tel`, `celular`, `email`, `descricao`) VALUES
(1, 'CONFINTER', '----', '----', '----', 'CONFINTER :)');

-- --------------------------------------------------------

--
-- Estrutura para tabela `enderecos`
--

DROP TABLE IF EXISTS `enderecos`;
CREATE TABLE IF NOT EXISTS `enderecos` (
  `id_endereco` int NOT NULL AUTO_INCREMENT,
  `id_empresa` int NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cep` varchar(10) NOT NULL,
  PRIMARY KEY (`id_endereco`),
  KEY `id_empresa` (`id_empresa`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `enderecos`
--

INSERT INTO `enderecos` (`id_endereco`, `id_empresa`, `logradouro`, `numero`, `bairro`, `cidade`, `estado`, `cep`) VALUES
(1, 1, 'Marina La Regina', '203', 'Centro', 'Poá', 'SP', '08550-210');

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagens_carrossel`
--

DROP TABLE IF EXISTS `imagens_carrossel`;
CREATE TABLE IF NOT EXISTS `imagens_carrossel` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_arquivo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `imagens_carrossel`
--

INSERT INTO `imagens_carrossel` (`id`, `nome_arquivo`) VALUES
(4, 'slide-01.jpg'),
(5, 'slide-02.jpg'),
(6, 'slide-03.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `requisicoes`
--

DROP TABLE IF EXISTS `requisicoes`;
CREATE TABLE IF NOT EXISTS `requisicoes` (
  `id_requisicao` int NOT NULL AUTO_INCREMENT,
  `id_cliente` int NOT NULL,
  `horario_contato` time NOT NULL,
  `cotacao` enum('Sim','Não') NOT NULL,
  `contratacao` enum('Sim','Não') NOT NULL,
  `tipo` varchar(250) DEFAULT NULL,
  `categoria` enum('Aposentado','Pensionista','Servidor Público') NOT NULL,
  `outros_info` varchar(200) DEFAULT NULL,
  `data_requisicao` date NOT NULL,
  PRIMARY KEY (`id_requisicao`),
  KEY `id_cliente` (`id_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `requisicoes`
--

INSERT INTO `requisicoes` (`id_requisicao`, `id_cliente`, `horario_contato`, `cotacao`, `contratacao`, `tipo`, `categoria`, `outros_info`, `data_requisicao`) VALUES
(17, 25, '07:26:00', 'Sim', 'Sim', 'Teste', '', 'Teste', '2024-03-27'),
(18, 26, '08:00:00', 'Sim', 'Sim', 'teste', '', 'Teste', '2024-03-27'),
(19, 29, '09:00:00', 'Sim', 'Sim', 'teste', '', '', '0000-00-00'),
(20, 30, '09:00:00', 'Sim', 'Sim', 'asaS', 'Aposentado', 'asdsdsads', '0000-00-00'),
(21, 31, '08:53:00', 'Sim', 'Sim', 'ssaasdasdasd', '', 'sdasdasdas', '0000-00-00'),
(22, 32, '06:55:00', 'Sim', 'Sim', 'tretree', '', 'ytyyttyrryt', '0000-00-00'),
(23, 33, '04:56:00', 'Sim', 'Sim', 'tfrytrt', '', '', '0000-00-00'),
(24, 34, '09:00:00', 'Sim', 'Sim', 'eqwewq', '', 'wewewqeewqe', '0000-00-00'),
(25, 35, '05:04:00', 'Sim', 'Sim', 'asdsadsad', '', 'sdsadsda', '0000-00-00'),
(26, 36, '09:00:00', 'Sim', 'Sim', 'sdfsdfdfsdf', 'Pensionista', '', '0000-00-00'),
(27, 37, '04:06:00', 'Sim', 'Sim', 'ASdasdsa', '', 'asassas', '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `usuario` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(300) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `token` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `email`, `senha`, `token`) VALUES
(1, 'Administrador do sistema', 'admin', 'fnando0506@gmail.com', '$2y$10$9mlUMpO8La5lJ86M/cQntuAeKf8sAa/kikZA/d0KSDlTx.d9tYG3S', '1'),
(5, 'Fernando Lopes', 'fnando', 'fnando0506@gmail.com', '$2y$10$4oWMDwFCD0E/2jIv.rJd..L4/M53xo/miyDCIA4P6UwJF0J2lI/aK', '34379be9211a56bddad0173205a5443e');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
