-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 27/03/2024 às 00:15
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
-- Estrutura para tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome`, `email`, `telefone`) VALUES
(3, 'Fernando Aparecido Lopes da Silva', 'fnando0506@gmail.com', '(11) 99204-3469'),
(4, 'Fernando Aparecido Lopes da Silva', 'fnando0506@gmail.com', '(11) 99204-3469'),
(5, 'Fernando Aparecido Lopes da Silva', 'fnando0506@gmail.com', '(11) 99204-3469'),
(6, 'Fernando Aparecido Lopes da Silva', 'fnando0506@gmail.com', '(11) 99204-3469'),
(7, 'Fernando Aparecido Lopes da Silva', 'fnando0506@gmail.com', '(11) 99204-3469'),
(8, 'Fernando Aparecido Lopes da Silva', 'fnando0506@gmail.com', '(11) 99204-3469'),
(9, 'Fernando Aparecido Lopes da Silva', 'fnando0506@gmail.com', '(11) 99204-3469');

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `id_empresa` int NOT NULL AUTO_INCREMENT,
  `tel` varchar(30) NOT NULL,
  `celular` varchar(30) NOT NULL,
  `email` varchar(65) NOT NULL,
  `descricao` text NOT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `tel`, `celular`, `email`, `descricao`) VALUES
(1, '----', '----', '----', 'CONFINTER :)');

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
  `categoria` enum('Aposentado','Pensionista','Servidor Público','Outros') NOT NULL,
  `outros_info` varchar(200) DEFAULT NULL,
  `data_requisicao` date NOT NULL,
  PRIMARY KEY (`id_requisicao`),
  KEY `id_cliente` (`id_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `requisicoes`
--

INSERT INTO `requisicoes` (`id_requisicao`, `id_cliente`, `horario_contato`, `cotacao`, `contratacao`, `tipo`, `categoria`, `outros_info`, `data_requisicao`) VALUES
(1, 0, '18:32:00', 'Sim', 'Sim', 'teste', '', 'teste', '0000-00-00');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `email`, `senha`, `token`) VALUES
(1, 'Administrador do sistema', 'admin', '', '202cb962ac59075b964b07152d234b70', '1'),
(5, 'Fernando Lopes', 'fnando', '', '202cb962ac59075b964b07152d234b70', '34379be9211a56bddad0173205a5443e');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
