-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2023 at 05:01 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nfsw`
--

-- --------------------------------------------------------

--
-- Table structure for table `aeroportos`
--

CREATE TABLE `aeroportos` (
  `CODIGO` varchar(3) NOT NULL,
  `NOME` varchar(255) NOT NULL,
  `LATITUDE` float NOT NULL,
  `LONGITUDE` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aeroportos`
--

INSERT INTO `aeroportos` (`CODIGO`, `NOME`, `LATITUDE`, `LONGITUDE`) VALUES
('BSB', 'Aeroporto Internacional Juscelino Kubitschek', -15.8711, -47.9186),
('FOR', 'Aeroporto Internacional Pinto Martins', -3.77583, -38.5322),
('GRU', 'Aeroporto Internacional de Guarulhos', -23.4319, -46.4694),
('SDU', 'Aeroporto Santos Dumont', -22.91, -43.1625);

-- --------------------------------------------------------

--
-- Table structure for table `cadastros`
--

CREATE TABLE `cadastros` (
  `ID` bigint(20) NOT NULL,
  `EMAIL` varchar(150) NOT NULL,
  `SENHA` varchar(255) NOT NULL,
  `ADMINISTRADOR` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cadastros`
--

INSERT INTO `cadastros` (`ID`, `EMAIL`, `SENHA`, `ADMINISTRADOR`) VALUES
(1, 'admin@nfsw.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(2, 'pedro@gmail.com', '4410d99cefe57ec2c2cdbd3f1d5cf862bb4fb6f8', 0),
(3, 'john@gmail.com', 'a51dda7c7ff50b61eaea0444371f4a6a9301e501', 0),
(4, 'joao@gmail.com', 'c510cd8607f92e1e09fd0b0d0d035c16d2428fa4', 0),
(5, 'luigi@gmail.com', 'd1878f7213a7afa7d418ec69f4aed914c9e07d8d', 0),
(6, 'funcionario1@nfsw.com', '3802bbe7c14128ebd50dbfdd4db95c1ffdc8425b', 2);

-- --------------------------------------------------------

--
-- Table structure for table `distancia`
--

CREATE TABLE `distancia` (
  `ID` int(2) NOT NULL,
  `AEROPORTO_IDA` char(3) NOT NULL,
  `AEROPORTO_VOLTA` char(3) NOT NULL,
  `DISTANCIA_KM` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `distancia`
--

INSERT INTO `distancia` (`ID`, `AEROPORTO_IDA`, `AEROPORTO_VOLTA`, `DISTANCIA_KM`) VALUES
(1, 'GRU', 'SDU', 344),
(2, 'GRU', 'SDU', 344),
(3, 'GRU', 'BSB', 851),
(4, 'GRU', 'FOR', 2337),
(5, 'SDU', 'BSB', 926),
(6, 'SDU', 'FOR', 2175),
(7, 'BSB', 'FOR', 1687);

-- --------------------------------------------------------

--
-- Table structure for table `pessoas`
--

CREATE TABLE `pessoas` (
  `ID` bigint(20) NOT NULL,
  `CADASTRO_ID` bigint(20) DEFAULT NULL,
  `NOME` varchar(50) NOT NULL,
  `SOBRENOME` varchar(50) NOT NULL,
  `NASCIMENTO` date NOT NULL,
  `PAIS` varchar(3) NOT NULL DEFAULT 'BRA',
  `ENDERECO` varchar(255) DEFAULT NULL,
  `CPF` varchar(11) DEFAULT NULL,
  `RG` varchar(9) DEFAULT NULL,
  `CELULAR` varchar(20) DEFAULT NULL,
  `ACOMPANHANTE` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pessoas`
--

INSERT INTO `pessoas` (`ID`, `CADASTRO_ID`, `NOME`, `SOBRENOME`, `NASCIMENTO`, `PAIS`, `ENDERECO`, `CPF`, `RG`, `CELULAR`, `ACOMPANHANTE`) VALUES
(1, 1, 'admin', 'admin', '2000-01-01', 'BRA', '01001001 | Praça da Sé, 1 - Sé | São Paulo/SP', '10000000019', '000000001', '11999999999', NULL),
(2, 2, 'Pedro', 'Silva', '1993-04-03', 'BRA', '29156418 | Rua Rubem Braga, 10 - Vila Merlo | Cariacica/ES', '43878033044', '182391263', '13932482343', NULL),
(3, 3, 'John', 'Doe', '1999-08-01', 'USA', NULL, NULL, NULL, '3827428838', NULL),
(4, 4, 'João', 'Ferreira', '1995-12-23', 'BRA', '69303340 | Avenida Glaycon de Paiva, 23 - São Vicente | Boa Vista/RR', '96398920090', '896734943', '35913123123', NULL),
(5, 5, 'Luigi', 'Mario', '1983-05-13', 'ITA', NULL, NULL, NULL, '57834783438', NULL),
(6, NULL, 'Paul', 'Flinch', '1999-02-13', 'USA', NULL, NULL, NULL, NULL, 3),
(7, 6, 'funcionario', '1', '2000-01-02', 'BRA', '78555783 | Rua Bela Vista, 12 - Chácara de Lazer Boa Vista | Sinop/MT', '72389935036', '123812832', '66945435434', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aeroportos`
--
ALTER TABLE `aeroportos`
  ADD PRIMARY KEY (`CODIGO`);

--
-- Indexes for table `cadastros`
--
ALTER TABLE `cadastros`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- Indexes for table `distancia`
--
ALTER TABLE `distancia`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `AEROPORTO_IDA` (`AEROPORTO_IDA`),
  ADD KEY `AEROPORTO_VOLTA` (`AEROPORTO_VOLTA`);

--
-- Indexes for table `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CADASTRO_ID` (`CADASTRO_ID`),
  ADD KEY `ACOMPANHANTE` (`ACOMPANHANTE`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cadastros`
--
ALTER TABLE `cadastros`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `distancia`
--
ALTER TABLE `distancia`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `distancia`
--
ALTER TABLE `distancia`
  ADD CONSTRAINT `distancia_ibfk_1` FOREIGN KEY (`AEROPORTO_IDA`) REFERENCES `aeroportos` (`CODIGO`),
  ADD CONSTRAINT `distancia_ibfk_2` FOREIGN KEY (`AEROPORTO_VOLTA`) REFERENCES `aeroportos` (`CODIGO`);

--
-- Constraints for table `pessoas`
--
ALTER TABLE `pessoas`
  ADD CONSTRAINT `pessoas_ibfk_1` FOREIGN KEY (`CADASTRO_ID`) REFERENCES `cadastros` (`ID`),
  ADD CONSTRAINT `pessoas_ibfk_2` FOREIGN KEY (`ACOMPANHANTE`) REFERENCES `cadastros` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
