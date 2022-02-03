-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2020 at 06:31 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paulosantos`
--

-- --------------------------------------------------------

--
-- Table structure for table `consulta`
--

CREATE TABLE `consulta` (
  `idConsulta` int(11) NOT NULL,
  `dataConsulta` datetime NOT NULL,
  `userPaciente` varchar(11) NOT NULL,
  `userMedico` varchar(11) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consulta`
--

INSERT INTO `consulta` (`idConsulta`, `dataConsulta`, `userPaciente`, `userMedico`, `descricao`) VALUES
(1, '0000-00-00 00:00:00', 'teste', 'Medico', '1'),
(2, '0000-00-00 00:00:00', 'teste', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tipoutilizador`
--

CREATE TABLE `tipoutilizador` (
  `idTipoUtilizador` int(11) NOT NULL,
  `nomeTipoUtilizador` varchar(100) NOT NULL,
  `descricaoTipoUtilizador` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='TipoUtilizador';

--
-- Dumping data for table `tipoutilizador`
--

INSERT INTO `tipoutilizador` (`idTipoUtilizador`, `nomeTipoUtilizador`, `descricaoTipoUtilizador`) VALUES
(1, 'ADMINISTRADOR', 'ADMINISTRADOR DO SITE'),
(2, 'MEDICO', 'MEMBRO COM O RANK DE MEDICO'),
(3, 'ENFERMEIRO', 'MEMBRO COM O RANK DE ENFERMEIRO'),
(4, 'UTILIZADOR', 'MEMBRO COM O RANK DE UTILIZADOR APROVADO'),
(5, 'UTILIZADOR_NAO_APROVADO', 'MEMBRO COM O RANK DE UTILIZADOR MAS POR APROVAR'),
(6, 'DESATIVADO', 'MEMBRO COM A CONTA DESATIVADA');

-- --------------------------------------------------------

--
-- Table structure for table `tratamento`
--

CREATE TABLE `tratamento` (
  `idTratamento` int(11) NOT NULL,
  `dataTratamento` datetime NOT NULL,
  `userPaciente` varchar(11) NOT NULL,
  `userEnfermeiro` varchar(11) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tratamento`
--

INSERT INTO `tratamento` (`idTratamento`, `dataTratamento`, `userPaciente`, `userEnfermeiro`, `descricao`) VALUES
(4, '0000-00-00 00:00:00', 'teste', 'Enfermeiro', '1');

-- --------------------------------------------------------

--
-- Table structure for table `utilizador`
--

CREATE TABLE `utilizador` (
  `utilizador` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` int(9) NOT NULL,
  `morada` varchar(100) NOT NULL,
  `tipoUtilizador` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabela de Utilizadores';

--
-- Dumping data for table `utilizador`
--

INSERT INTO `utilizador` (`utilizador`, `password`, `email`, `telefone`, `morada`, `tipoUtilizador`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@saude.pt', 0, '', 1),
('enfermeiro', 'c1781193b2477e2ed5e61c35a4dddb24', 'enfermeiro@saude.pt', 0, '', 3),
('medico', '652044ac6e008761b3e6141748a99880', 'medico@saude.pt', 999999999, 'rua dos medicos', 2),
('teste', '698dc19d489c4e4db73e28a713eab07b', 'test@test.com', 999999999, 'rua teste', 4),
('utente', '3ce98305181b1bac59d024a49b0ffd73', 'utente@saude.pt', 0, '', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`idConsulta`),
  ADD KEY `medico` (`userMedico`),
  ADD KEY `paciente` (`userPaciente`);

--
-- Indexes for table `tipoutilizador`
--
ALTER TABLE `tipoutilizador`
  ADD PRIMARY KEY (`idTipoUtilizador`);

--
-- Indexes for table `tratamento`
--
ALTER TABLE `tratamento`
  ADD PRIMARY KEY (`idTratamento`),
  ADD KEY `enfermeiro` (`userEnfermeiro`),
  ADD KEY `pacienteTratamento` (`userPaciente`);

--
-- Indexes for table `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`utilizador`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `tipoUtilizador` (`tipoUtilizador`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consulta`
--
ALTER TABLE `consulta`
  MODIFY `idConsulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tratamento`
--
ALTER TABLE `tratamento`
  MODIFY `idTratamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `paciente` FOREIGN KEY (`userPaciente`) REFERENCES `utilizador` (`utilizador`);

--
-- Constraints for table `tratamento`
--
ALTER TABLE `tratamento`
  ADD CONSTRAINT `pacienteTratamento` FOREIGN KEY (`userPaciente`) REFERENCES `utilizador` (`utilizador`);

--
-- Constraints for table `utilizador`
--
ALTER TABLE `utilizador`
  ADD CONSTRAINT `utilizador_ibfk_1` FOREIGN KEY (`tipoUtilizador`) REFERENCES `tipoutilizador` (`idTipoUtilizador`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
