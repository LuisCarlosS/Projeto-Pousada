-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 04-Fev-2022 às 12:06
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetopousada`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbacomodacao`
--

DROP TABLE IF EXISTS `tbacomodacao`;
CREATE TABLE IF NOT EXISTS `tbacomodacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_acom` varchar(45) DEFAULT NULL,
  `foto1` varchar(45) NOT NULL,
  `foto2` varchar(45) NOT NULL,
  `foto3` varchar(45) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbacomodacao`
--

INSERT INTO `tbacomodacao` (`id`, `nome_acom`, `foto1`, `foto2`, `foto3`, `valor`) VALUES
(10, 'Suite 01', 'suite01-foto1.jpg', 'suite01-foto2.jpeg', 'suite01-foto3.jpeg', '299.90'),
(12, 'Suite 02', 'suite02-foto1.jpg', 'suite02-foto2.jpg', 'suite02-foto3.jpg', '450.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcliente`
--

DROP TABLE IF EXISTS `tbcliente`;
CREATE TABLE IF NOT EXISTS `tbcliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `celular` varchar(45) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbcliente`
--

INSERT INTO `tbcliente` (`id`, `nome`, `email`, `telefone`, `celular`, `cpf`) VALUES
(1, 'Antonio Carlos', 'antoniocarlos13@gmail.com', '(51)6516-5165', '(65)16516-5165', '651.651.651-65');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfotos`
--

DROP TABLE IF EXISTS `tbfotos`;
CREATE TABLE IF NOT EXISTS `tbfotos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(70) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbfotos`
--

INSERT INTO `tbfotos` (`id`, `foto`, `status`) VALUES
(1, 'img2.jpg', 1),
(2, 'img3.jpg', 1),
(3, 'img4.jpg', 1),
(4, 'img5.jpg', 1),
(5, 'img6.jpg', 1),
(6, 'suite02-foto2.jpg', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbreserva`
--

DROP TABLE IF EXISTS `tbreserva`;
CREATE TABLE IF NOT EXISTS `tbreserva` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acomodacao_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `dt_inicio` date NOT NULL,
  `dt_fim` date NOT NULL,
  `status` varchar(30) DEFAULT NULL,
  `valor_total` decimal(10,2) NOT NULL,
  `desconto` decimal(10,2) NOT NULL,
  `forma_pagamento` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `reserva_acomodacao` (`acomodacao_id`),
  KEY `reserva_cliente` (`cliente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbreserva`
--

INSERT INTO `tbreserva` (`id`, `acomodacao_id`, `cliente_id`, `dt_inicio`, `dt_fim`, `status`, `valor_total`, `desconto`, `forma_pagamento`) VALUES
(4, 10, 1, '2022-01-28', '2022-01-31', 'Confirmado', '899.70', '0.00', 'vista');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuario`
--

DROP TABLE IF EXISTS `tbusuario`;
CREATE TABLE IF NOT EXISTS `tbusuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbusuario`
--

INSERT INTO `tbusuario` (`id`, `login`, `senha`) VALUES
(1, 'usuario01', '10oirausu');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbreserva`
--
ALTER TABLE `tbreserva`
  ADD CONSTRAINT `reserva_acomodacao` FOREIGN KEY (`acomodacao_id`) REFERENCES `tbacomodacao` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserva_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `tbcliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
