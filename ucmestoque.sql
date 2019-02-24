-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 13, 2019 at 01:56 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ucmestoque`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nomeCategoria` varchar(45) NOT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`idcategoria`, `nomeCategoria`) VALUES
(1, 'Papel A4'),
(2, 'Marcadores');

-- --------------------------------------------------------

--
-- Table structure for table `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
CREATE TABLE IF NOT EXISTS `departamentos` (
  `iddepartamento` int(11) NOT NULL AUTO_INCREMENT,
  `nomeDepartamento` varchar(100) NOT NULL,
  PRIMARY KEY (`iddepartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departamentos`
--

INSERT INTO `departamentos` (`iddepartamento`, `nomeDepartamento`) VALUES
(12, 'Admim Sistema'),
(13, 'ICT'),
(14, 'Gestao'),
(15, 'Secretaria');

-- --------------------------------------------------------

--
-- Table structure for table `fornecedores`
--

DROP TABLE IF EXISTS `fornecedores`;
CREATE TABLE IF NOT EXISTS `fornecedores` (
  `idfornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `nomeEmpresa` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idfornecedor`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fornecedores`
--

INSERT INTO `fornecedores` (`idfornecedor`, `nomeEmpresa`, `email`, `celular`, `endereco`) VALUES
(2, 'Horacio', 'juniorvilanculo.95@gmail.com', '848396068', 'Inhambane Province, Mozambique'),
(3, 'Sociedade Villa', 'juniorvilanculo.95@gmail.com', '848396068', 'Inhambane Province, Mozambique');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL,
  `id_Usuario` int(11) NOT NULL,
  `dataSessao` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_Usuario` (`id_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
CREATE TABLE IF NOT EXISTS `material` (
  `idmaterial` int(11) NOT NULL AUTO_INCREMENT,
  `nomeMaterial` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `quantidade` int(11) NOT NULL DEFAULT '0',
  `dataEntrada` date NOT NULL,
  `qtdSaida` int(11) DEFAULT '0',
  `qtdEstoque` int(11) DEFAULT '0',
  `novaqtd` int(11) DEFAULT '0',
  `dataSaida` date DEFAULT NULL,
  `categoria_idcategoria` int(11) NOT NULL,
  `fornecedor_idfornecedor` int(11) DEFAULT NULL,
  `estado` varchar(20) NOT NULL,
  PRIMARY KEY (`idmaterial`),
  KEY `categoria_fk` (`categoria_idcategoria`) USING BTREE,
  KEY `fornecedor_fk` (`fornecedor_idfornecedor`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`idmaterial`, `nomeMaterial`, `quantidade`, `dataEntrada`, `qtdSaida`, `qtdEstoque`, `novaqtd`, `dataSaida`, `categoria_idcategoria`, `fornecedor_idfornecedor`, `estado`) VALUES
(1, 'Papel A4', 300, '2018-11-09', 10, 290, 0, '2018-11-09', 1, 2, 'Atendida'),
(2, 'Marcadores', 360, '2018-11-09', 0, 0, 360, NULL, 2, 3, 'rejeitado');

-- --------------------------------------------------------

--
-- Table structure for table `requisicoes`
--

DROP TABLE IF EXISTS `requisicoes`;
CREATE TABLE IF NOT EXISTS `requisicoes` (
  `idrequisicao` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `estado` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comentario` text COLLATE utf8_unicode_ci,
  `comentarioGestor` mediumtext COLLATE utf8_unicode_ci,
  `fk_material` int(11) DEFAULT NULL,
  `fk_us` int(11) NOT NULL,
  PRIMARY KEY (`idrequisicao`),
  KEY `fk_material` (`fk_material`),
  KEY `fk_us` (`fk_us`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `requisicoes`
--

INSERT INTO `requisicoes` (`idrequisicao`, `quantidade`, `data`, `estado`, `comentario`, `comentarioGestor`, `fk_material`, `fk_us`) VALUES
(1, 10, '2018-11-09', 'Atendida', 'teste', NULL, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `apelido` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `nrcelular` int(13) NOT NULL,
  `bi` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `nrFuncionario` int(15) NOT NULL,
  `nivelAcesso` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `departamento_iddepartamento` int(11) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `departamento_iddepartamento` (`departamento_iddepartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nome`, `apelido`, `senha`, `email`, `nrcelular`, `bi`, `nrFuncionario`, `nivelAcesso`, `departamento_iddepartamento`) VALUES
(1, 'Horacio', 'Junior', '4e9d50e5e16e83e2a5895b2bddfccd8e', 'admin@gmail.com', 848396068, '111123888333J', 1200033, 'admin', 12),
(2, 'Secretaria', 'Departamento', '25f9e794323b453885f5181f1b624d0b', 'secretaria@gmail.com', 840000000, '177747474843J', 22222222, 'departamento', 15),
(3, 'Administrador', 'Faculdade', '25f9e794323b453885f5181f1b624d0b', 'faculdade@gmail.com', 844444444, '888888888888J', 2222222, 'administradorFacul', 14),
(4, 'Gestor', 'Armazem', '25f9e794323b453885f5181f1b624d0b', 'armazem@gmail.com', 860000000, '848484848889J', 88888888, 'gestor', 14);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `id_Usuario` FOREIGN KEY (`id_Usuario`) REFERENCES `usuarios` (`idUsuario`);

--
-- Constraints for table `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `categoria_idcategoria` FOREIGN KEY (`categoria_idcategoria`) REFERENCES `categorias` (`idcategoria`),
  ADD CONSTRAINT `fornecedor_idfornecedor` FOREIGN KEY (`fornecedor_idfornecedor`) REFERENCES `fornecedores` (`idfornecedor`);

--
-- Constraints for table `requisicoes`
--
ALTER TABLE `requisicoes`
  ADD CONSTRAINT `fk_material` FOREIGN KEY (`fk_material`) REFERENCES `material` (`idmaterial`),
  ADD CONSTRAINT `fk_us` FOREIGN KEY (`fk_us`) REFERENCES `usuarios` (`idUsuario`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`departamento_iddepartamento`) REFERENCES `departamentos` (`iddepartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
